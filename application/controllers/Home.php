<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('About_m', 'About');
    $this->load->model('Category_m', 'Category');
    $this->load->model('Hero_m', 'Hero');
    $this->load->model('Merk_m', 'Merk');
    $this->load->model('Product_m', 'Product');
  }

  public function index()
  {
    $data['about']    = $this->About->getLatestData();
    $data['category'] = $this->Category->getData();
    $data['hero']     = $this->Hero->getLatestData();
    $data['merk']     = $this->Merk->getData();
    $data['merks']     = $this->Merk->getData();

    $this->load->view('public/layout/header');
    $this->load->view('public/pages/index', $data);
    $this->load->view('public/layout/footer');
  }

  public function products()
  {
    $this->load->library('pagination');

    if ($this->input->post('submit')) {
      $keyword = $this->input->post('product-name');
    } else {
      $keyword = null;
    }

    $config['base_url']     = 'http://localhost/mts/home/products';

    $config['total_rows']   = $this->Product->getRows();
    $config['per_page']     = 8;
    $config['uri_segment']  = 3;


    $this->pagination->initialize($config);

    $start            = $this->uri->segment(3);
    $data['product']  = $this->Product->getProductData($config['per_page'], $start, $keyword);

    $this->load->view('public/layout/header');
    $this->load->view('public/pages/product', $data);
    $this->load->view('public/layout/footer');
  }

  public function productcategories($id)
  {
    $this->load->library('pagination');

    if ($this->input->post('submit')) {
      $keyword = $this->input->post('category-name');
    } else {
      $keyword = null;
    }

    $config['base_url']     = 'http://localhost/mts/home/productcategories/' . $id;

    $config['total_rows']   = $this->Category->getProductCategoryRows($id);
    $config['per_page']     = 8;
    $config['uri_segment']  = 4;


    $this->pagination->initialize($config);

    $start              = $this->uri->segment(4);
    $data['id']         = $id;
    $data['iduri']      = $this->Category->getDataCategoryUri($id);
    $data['name']       = $this->Category->getDataCategoryName($id);
    $data['category']   = $this->Category->getDataProductCategory($id, $config['per_page'], $start, $keyword);

    $this->load->view('public/layout/header');
    $this->load->view('public/pages/productcategories', $data);
    $this->load->view('public/layout/footer');
  }

  public function sendMail()
  {
    $config = [
      'protocol'    => 'smtp',
      'smtp_crypto' => 'ssl',
      'smtp_host'   => 'smtp.gmail.com',
      'smtp_user'   => 'yourmail@gmail.com',
      'smtp_pass'   => 'yourappmailpass',
      'smtp_port'   => 465,
      'mailtype'    => 'text',
      'charset'     => 'iso-8859-1',
      'newline'     => "\r\n",
      'crlf'        => "\r\n",
      'wordwrap'    => true
    ];

    $this->form_validation->set_rules('yourname', 'Your Name', 'required');
    $this->form_validation->set_rules('yourmail', 'Your Email', 'required|valid_email');
    $this->form_validation->set_rules('yoursubject', 'Subject', 'required');
    $this->form_validation->set_rules('yourmessage', 'Message', 'required');

    if ($this->form_validation->run() == true) {

      $nama   = $this->input->post('yourname');
      $sender = $this->input->post('yourmail');
      $subyek = $this->input->post('yoursubject');
      $pesan  = $this->input->post('yourmessage');

      $this->email->initialize($config);
      $this->email->from($sender, $nama);
      $this->email->to('mtekniksejati@gmail.com');

      $this->email->subject($subyek);

      $this->email->message($pesan);

      if ($this->email->send()) {
        $this->session->set_flashdata('mailsuccess', 'Message sent!');
        redirect('home#contact');
      } else {
        $this->session->set_flashdata('mailfailed', 'Message not send!');
        redirect('home#contact');
      }
    }
  }
}
