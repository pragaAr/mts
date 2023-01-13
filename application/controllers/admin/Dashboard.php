<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
    $data['title']    = 'Dashboard';
    $data['merk']     = $this->Merk->countData();
    $data['category'] = $this->Category->countData();
    $data['product']  = $this->Product->countData();

    $this->load->view('admin/layout/admin-header', $data);
    $this->load->view('admin/layout/admin-navbar');
    $this->load->view('admin/layout/admin-sidebar');
    $this->load->view('admin/pages/dashboard', $data);
    $this->load->view('admin/layout/admin-footer');
  }
}
