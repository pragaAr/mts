<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merk extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Merk_m', 'Merk');

    if (empty($this->session->userdata('id_user'))) {
      $this->session->set_flashdata('flashrole', 'Silahkan Login terlebih dahulu!');
      redirect('admin/auth');
    }
  }

  public function index()
  {
    $data['title']  = 'Merk';
    $data['merk']   = $this->Merk->getData();

    $this->form_validation->set_rules('merk', 'Merk', 'trim|strtolower');

    if ($this->form_validation->run() == false) {
      $this->load->view('admin/layout/admin-header', $data);
      $this->load->view('admin/layout/admin-navbar');
      $this->load->view('admin/layout/admin-sidebar');
      $this->load->view('admin/pages/merk', $data);
      $this->load->view('admin/layout/admin-footer');
    } else {
      $this->Merk->addData();
      $this->session->set_flashdata('inserted', 'Data berhasil ditambahkan!');
      redirect('admin/merk');
    }
  }

  public function getId()
  {
    $id   = $this->input->post('id_merk');
    $data = $this->Merk->getId($id);

    echo json_encode($data);
  }

  public function update()
  {
    $id = $this->input->post('idmerk');

    $this->Merk->updateData($id);
    $this->session->set_flashdata('updated', 'Data berhasil diubah!');
    redirect('admin/merk');
  }

  public function delete($id)
  {
    $this->Merk->deleteData($id);
    $this->session->set_flashdata('deleted', 'Data berhasil dihapus!');
    redirect('admin/merk');
  }
}
