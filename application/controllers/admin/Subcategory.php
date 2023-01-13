<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subcategory extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Category_m', 'Category');
    $this->load->model('Subcategory_m', 'Subcategory');

    if (empty($this->session->userdata('id_user'))) {
      $this->session->set_flashdata('flashrole', 'Silahkan Login terlebih dahulu!');
      redirect('admin/auth');
    }
  }

  public function index()
  {
    $data['title']    = 'SubCategory';
    $data['cat']      = $this->Category->getData();
    $data['catedit']  = $this->Category->getData();
    $data['sub']      = $this->Subcategory->getData();

    $this->form_validation->set_rules('categoryid', 'Kategori', 'trim|strtolower');
    $this->form_validation->set_rules('subcategory', 'Sub Kateggori', 'trim|strtolower');

    if ($this->form_validation->run() == false) {
      $this->load->view('admin/layout/admin-header', $data);
      $this->load->view('admin/layout/admin-navbar');
      $this->load->view('admin/layout/admin-sidebar');
      $this->load->view('admin/pages/sub-category', $data);
      $this->load->view('admin/layout/admin-footer');
    } else {
      $this->Subcategory->addData();
      $this->session->set_flashdata('inserted', 'Data berhasil ditambahkan!');
      redirect('admin/subcategory');
    }
  }

  public function getId()
  {
    $id   = $this->input->post('id_subcategory');
    $data = $this->Subcategory->getId($id);

    echo json_encode($data);
  }

  public function update()
  {
    $id = $this->input->post('subid');

    $this->Subcategory->updateData($id);
    $this->session->set_flashdata('updated', 'Data berhasil diubah!');
    redirect('admin/subcategory');
  }

  public function delete($id)
  {
    $this->Subcategory->deleteData($id);
    $this->session->set_flashdata('deleted', 'Data berhasil dihapus!');
    redirect('admin/subcategory');
  }
}
