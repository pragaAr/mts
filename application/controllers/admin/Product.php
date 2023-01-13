<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Category_m', 'Category');
    $this->load->model('Merk_m', 'Merk');
    $this->load->model('Product_m', 'Product');
    $this->load->model('Subcategory_m', 'Subcategory');

    if (empty($this->session->userdata('id_user'))) {
      $this->session->set_flashdata('flashrole', 'Silahkan Login terlebih dahulu!');
      redirect('admin/auth');
    }
  }

  public function index()
  {
    $data['title']      = 'Product';
    $data['cat']        = $this->Category->getDataCategory();
    $data['editcat']    = $this->Category->getDataCategory();
    $data['merk']       = $this->Merk->getDataMerk();
    $data['editmerk']   = $this->Merk->getDataMerk();
    $data['sub']        = $this->Subcategory->getDataSub();
    $data['editsub']    = $this->Subcategory->getDataSub();
    $data['product']    = $this->Product->getProduct();

    $this->form_validation->set_rules('tipeproduk', 'Tipe Produk', 'trim|strtolower');
    $this->form_validation->set_rules('namaproduk', 'Nama Produk', 'trim|strtolower');
    $this->form_validation->set_rules('merkproduk', 'Merk Produk', 'trim|strtolower');
    $this->form_validation->set_rules('kategoriproduk', 'Kategori Produk', 'trim|strtolower');
    $this->form_validation->set_rules('subkategoriproduk', 'Kategori Produk', 'trim|strtolower');
    $this->form_validation->set_rules('satuanproduk', 'Tipe Produk', 'trim|strtolower');
    $this->form_validation->set_rules('jumlahproduk', 'Jumlah Produk', 'trim|strtolower');

    if ($this->form_validation->run() == false) {
      $this->load->view('admin/layout/admin-header', $data);
      $this->load->view('admin/layout/admin-navbar');
      $this->load->view('admin/layout/admin-sidebar');
      $this->load->view('admin/pages/product', $data);
      $this->load->view('admin/layout/admin-footer');
    } else {
      $this->Product->addData();
      $this->session->set_flashdata('inserted', 'Data berhasil ditambahkan!');
      redirect('admin/product');
    }
  }

  public function getId()
  {
    $id = $this->input->post('id_product');
    $data = $this->Product->getDataId($id);
    echo json_encode($data);
  }

  public function update()
  {
    $id = $this->input->post('idproduk');

    $this->Product->updateData($id);
    $this->session->set_flashdata('updated', 'Data berhasil diubah!');
    redirect('admin/product');
  }

  public function delete($id)
  {
    $this->Product->deleteData($id);
    $this->session->set_flashdata('deleted', 'Data berhasil dihapus!');
    redirect('admin/product');
  }
}
