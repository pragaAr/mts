<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hero extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Hero_m', 'Hero');

    if (empty($this->session->userdata('id_user'))) {
      $this->session->set_flashdata('flashrole', 'Silahkan Login terlebih dahulu!');
      redirect('admin/auth');
    }
  }

  public function index()
  {
    $data['title']  = 'Hero';
    $data['hero']   = $this->Hero->getData();

    $this->form_validation->set_rules('heroheading', 'Heading', 'trim|strtolower');
    $this->form_validation->set_rules('herocontent', 'Konten', 'trim|strtolower');

    if ($this->form_validation->run() == false) {
      $this->load->view('admin/layout/admin-header', $data);
      $this->load->view('admin/layout/admin-navbar');
      $this->load->view('admin/layout/admin-sidebar');
      $this->load->view('admin/pages/hero', $data);
      $this->load->view('admin/layout/admin-footer');
    } else {
      $this->Hero->addData();
      $this->session->set_flashdata('inserted', 'Data berhasil ditambahkan!');
      redirect('admin/hero');
    }
  }

  public function getId()
  {
    $id   = $this->input->post('id_hero');
    $data = $this->Hero->getId($id);

    echo json_encode($data);
  }

  public function update()
  {
    $id = $this->input->post('idhero');

    $this->Hero->updateData($id);
    $this->session->set_flashdata('updated', 'Data berhasil diubah!');
    redirect('admin/hero');
  }

  public function delete($id)
  {
    $this->Hero->deleteData($id);
    $this->session->set_flashdata('deleted', 'Data berhasil dihapus!');
    redirect('admin/hero');
  }
}
