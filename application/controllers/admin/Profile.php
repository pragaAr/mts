<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Profile_m', 'Profile');

    if (empty($this->session->userdata('id_user'))) {
      $this->session->set_flashdata('flashrole', 'Silahkan Login terlebih dahulu!');
      redirect('auth');
    }
  }

  public function index()
  {
    $data['title']    = 'Profile';
    $data['profile']  = $this->Profile->getData();

    $this->load->view('admin/layout/admin-header', $data);
    $this->load->view('admin/layout/admin-navbar');
    $this->load->view('admin/layout/admin-sidebar');
    $this->load->view('admin/pages/profile', $data);
    $this->load->view('admin/layout/admin-footer');
  }

  public function getId()
  {
    $id   = $this->input->post('id_user');
    $data = $this->Profile->getDataId($id);

    echo json_encode($data);
  }

  public function update()
  {
    $id = $this->input->post('iduser');

    $this->Profile->updateData($id);
  }
}
