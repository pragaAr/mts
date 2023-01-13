<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('About_m', 'About');

    if (empty($this->session->userdata('id_user'))) {
      $this->session->set_flashdata('flashrole', 'Silahkan Login terlebih dahulu!');
      redirect('admin/auth');
    }
  }

  public function index()
  {
    $data['title']  = 'About';
    $data['about']   = $this->About->getData();

    $this->form_validation->set_rules('heading', 'Heading', 'trim|strtolower');
    $this->form_validation->set_rules('content', 'Konten', 'trim|strtolower');

    if ($this->form_validation->run() == false) {
      $this->load->view('admin/layout/admin-header', $data);
      $this->load->view('admin/layout/admin-navbar');
      $this->load->view('admin/layout/admin-sidebar');
      $this->load->view('admin/pages/about', $data);
      $this->load->view('admin/layout/admin-footer');
    } else {
      $this->About->addData();
      $this->session->set_flashdata('inserted', 'Data berhasil ditambahkan!');
      redirect('admin/about');
    }
  }

  public function getId()
  {
    $id   = $this->input->post('id_about');
    $data = $this->About->getId($id);

    echo json_encode($data);
  }

  public function update()
  {
    $id = $this->input->post('idabout');

    $this->About->updateData($id);
    $this->session->set_flashdata('updated', 'Data berhasil diubah!');
    redirect('admin/about');
  }

  public function delete($id)
  {
    $this->About->deleteData($id);
    $this->session->set_flashdata('deleted', 'Data berhasil dihapus!');
    redirect('admin/about');
  }
}
