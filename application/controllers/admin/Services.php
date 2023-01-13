<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends CI_Controller
{

  public function index()
  {
    $data['title']  = 'Services';
    $this->load->view('admin/admin-header', $data);
    $this->load->view('admin/admin-navbar');
    $this->load->view('admin/admin-sidebar');
    $this->load->view('admin/services');
    $this->load->view('admin/admin-footer');
  }
}
