<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Hero_m extends CI_Model
{
  public function getData()
  {
    $this->db->select('*');
    $this->db->from('hero');
    $res = $this->db->get()->result();
    return $res;
  }

  public function getLatestData()
  {
    $this->db->select('*');
    $this->db->from('hero');
    $this->db->order_by('id_hero', 'desc');
    $this->db->limit('1');
    $res = $this->db->get()->row();
    return $res;
  }

  public function getId($id)
  {
    $this->db->select('*');
    $this->db->from('hero');
    $this->db->where('id_hero', $id);
    $res = $this->db->get()->row();
    return $res;
  }

  public function addData()
  {
    $heading  = $this->input->post('heroheading');
    $content  = $this->input->post('herocontent');

    $img1 = $_FILES['hero1']['name'];
    $img2 = $_FILES['hero2']['name'];
    $img3 = $_FILES['hero3']['name'];

    if ($img1) {
      $config['upload_path']    = './assets/upload/web-img/hero/';
      $config['allowed_types']  = 'jpeg|jpg|png';
      $config['max_size']       = 2048;

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('hero1')) {
        $gambar1 = $this->upload->data('file_name');
      } else {
        $this->session->set_flashdata('failedupload', 'Foto Gagal di Upload!' . $this->upload->display_errors());
        redirect('admin/hero');
      }
    }

    if ($img2) {
      $config['upload_path']    = './assets/upload/web-img/hero/';
      $config['allowed_types']  = 'jpeg|jpg|png';
      $config['max_size']       = 2048;

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('hero2')) {
        $gambar2 = $this->upload->data('file_name');
      } else {
        $this->session->set_flashdata('failedupload', 'Foto Gagal di Upload!' . $this->upload->display_errors());
        redirect('admin/hero');
      }
    }

    if ($img3) {
      $config['upload_path']    = './assets/upload/web-img/hero/';
      $config['allowed_types']  = 'jpeg|jpg|png';
      $config['max_size']       = 2048;

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('hero3')) {
        $gambar3 = $this->upload->data('file_name');
      } else {
        $this->session->set_flashdata('failedupload', 'Foto Gagal di Upload!' . $this->upload->display_errors());
        redirect('admin/hero');
      }
    }

    $data = array(
      'hero_heading'   => $heading,
      'hero_content'   => $content,
      'hero_img_1'     => $gambar1,
      'hero_img_2'     => $gambar2,
      'hero_img_3'     => $gambar3,
      'heroAdd'        => date('Y-m-d H:i:s')
    );

    $this->db->insert('hero', $data);
  }

  public function updateData($id)
  {
    $heading  = $this->input->post('heroheadingedit');
    $content  = $this->input->post('herocontentedit');

    $where = array(
      'id_hero'   => $id
    );

    $hero1new = $_FILES['hero1edit']['name'];
    $hero2new = $_FILES['hero2edit']['name'];
    $hero3new = $_FILES['hero3edit']['name'];

    $config['upload_path']    = './assets/upload/web-img/hero/';
    $config['allowed_types']  = 'jpeg|jpg|png';
    $config['max_size']       = 2048;

    if ($hero1new) {

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('hero1edit')) {

        $oldhero1 = $this->input->post('oldhero1');

        unlink(FCPATH . 'assets/upload/web-img/hero/' . $oldhero1);

        $newhero1 = $this->upload->data('file_name');

        $data = array(
          'hero_heading'   => $heading,
          'hero_content'   => $content,
          'hero_img_1'     => $newhero1,
        );

        $this->db->update('hero', $data, $where);
      } else {
        $this->session->set_flashdata('failedupload', 'Foto Gagal di Upload!' . $this->upload->display_errors());
        redirect('admin/hero');
      }
    }

    if ($hero2new) {

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('hero2edit')) {

        $oldhero2 = $this->input->post('oldhero2');

        unlink(FCPATH . 'assets/upload/web-img/hero/' . $oldhero2);

        $newhero2 = $this->upload->data('file_name');

        $data = array(
          'hero_heading'   => $heading,
          'hero_content'   => $content,
          'hero_img_2'     => $newhero2,
        );

        $this->db->update('hero', $data, $where);
      } else {
        $this->session->set_flashdata('failedupload', 'Foto Gagal di Upload!' . $this->upload->display_errors());
        redirect('admin/hero');
      }
    }

    if ($hero3new) {

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('hero3edit')) {

        $oldhero3 = $this->input->post('oldhero3');

        unlink(FCPATH . 'assets/upload/web-img/hero/' . $oldhero3);

        $newhero3 = $this->upload->data('file_name');

        $data = array(
          'hero_heading'   => $heading,
          'hero_content'   => $content,
          'hero_img_3'     => $newhero3,
        );

        $this->db->update('hero', $data, $where);
      } else {
        $this->session->set_flashdata('failedupload', 'Foto Gagal di Upload!' . $this->upload->display_errors());
        redirect('admin/hero');
      }
    }

    $data = array(
      'hero_heading'   => $heading,
      'hero_content'   => $content,
    );

    $this->db->update('hero', $data, $where);
  }

  public function deleteData($id)
  {
    $this->db->select('id_hero, hero_img_1, hero_img_2, hero_img_3');
    $this->db->from('hero');
    $this->db->where('id_hero', $id);
    $res = $this->db->get()->row();

    $img1 = $res->hero_img_1;
    $img2 = $res->hero_img_2;
    $img3 = $res->hero_img_3;

    unlink(FCPATH . 'assets/upload/web-img/hero/' . $img1);
    unlink(FCPATH . 'assets/upload/web-img/hero/' . $img2);
    unlink(FCPATH . 'assets/upload/web-img/hero/' . $img3);

    return $this->db->delete('hero', ['id_hero' => $id]);
  }
}
