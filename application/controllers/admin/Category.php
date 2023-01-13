<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Category_m', 'Category');

    if (empty($this->session->userdata('id_user'))) {
      $this->session->set_flashdata('flashrole', 'Silahkan Login terlebih dahulu!');
      redirect('admin/auth');
    }
  }

  public function index()
  {
    $data['title']    = 'Category';
    $data['category'] = $this->Category->getData();

    $this->form_validation->set_rules('category', 'Kategori', 'trim|strtolower');

    if ($this->form_validation->run() == false) {
      $this->load->view('admin/layout/admin-header', $data);
      $this->load->view('admin/layout/admin-navbar');
      $this->load->view('admin/layout/admin-sidebar');
      $this->load->view('admin/pages/category', $data);
      $this->load->view('admin/layout/admin-footer');
    } else {
      $this->Category->addData();
      $this->session->set_flashdata('inserted', 'Data berhasil ditambahkan!');
      redirect('admin/category');
    }
  }

  public function getId()
  {
    $id   = $this->input->post('id_category');
    $data = $this->Category->getId($id);

    echo json_encode($data);
  }

  public function update()
  {
    $id = $this->input->post('idcategory');

    $this->Category->updateData($id);
    $this->session->set_flashdata('updated', 'Data berhasil diubah!');
    redirect('admin/category');
  }

  public function delete($id)
  {
    $this->Category->deleteData($id);
    $this->session->set_flashdata('deleted', 'Data berhasil dihapus!');
    redirect('admin/category');
  }
}
