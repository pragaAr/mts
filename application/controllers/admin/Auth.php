<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Auth_m', 'Auth');
  }

  public function index()
  {
    $data['title'] = "Login";

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('pass', 'Password', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('admin/pages/auth', $data);
    } else {
      $uname  = $this->input->post('username');
      $pass   = md5($this->input->post('pass'));

      $cek = $this->Auth->cekLogin($uname, $pass);

      if ($cek == false) {
        $this->session->set_flashdata('wrongdata', 'Username atau Password salah!');
        redirect('admin/auth');
      } else {
        $this->session->set_userdata('id_user', $cek->id_user);
        $this->session->set_userdata('nama_user', $cek->nama_user);
        $this->session->set_userdata('notelp', $cek->notelp);
        $this->session->set_userdata('username', $cek->username);

        $this->session->set_flashdata('userlogin', 'Selamat Datang ' . ucwords($this->session->userdata('username')));
        redirect('admin/dashboard');
      }
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('id_user');
    $this->session->unset_userdata('nama_user');
    $this->session->unset_userdata('notelp');
    $this->session->unset_userdata('username');
    $this->session->set_flashdata('userlogout', 'Sampai jumpa kembali!');
    redirect('admin/auth');
  }
}
