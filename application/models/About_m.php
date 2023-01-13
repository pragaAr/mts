<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class About_m extends CI_Model
{
  public function getData()
  {
    $this->db->select('*');
    $this->db->from('about');
    $res = $this->db->get()->result();
    return $res;
  }

  public function getLatestData()
  {
    $this->db->select('*');
    $this->db->from('about');
    $this->db->order_by('id_about', 'desc');
    $this->db->limit('1');
    $res = $this->db->get()->row();
    return $res;
  }

  public function getId($id)
  {
    $this->db->select('*');
    $this->db->from('about');
    $this->db->where('id_about', $id);
    $res = $this->db->get()->row();
    return $res;
  }

  public function addData()
  {
    $heading  = $this->input->post('heading');
    $content  = $this->input->post('content');
    $desc1    = $this->input->post('desc1');
    $desc2    = $this->input->post('desc2');
    $desc3    = $this->input->post('desc3');
    $desc4    = $this->input->post('desc4');
    $desc5    = $this->input->post('desc5');
    $desc6    = $this->input->post('desc6');

    $uploadimg = $_FILES['gambarabout']['name'];

    if ($uploadimg) {
      $config['upload_path']    = './assets/upload/web-img/about/';
      $config['allowed_types']  = 'jpeg|jpg|png';
      $config['max_size']       = 2048;

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambarabout')) {
        $gambar = $this->upload->data('file_name');

        $data = array(
          'about_heading'   => $heading,
          'about_content'   => $content,
          'desc_1'          => $desc1,
          'desc_2'          => $desc2,
          'desc_3'          => $desc3,
          'desc_4'          => $desc4,
          'desc_5'          => $desc5,
          'desc_6'          => $desc6,
          'about_img'       => $gambar,
          'aboutAdd'        => date('Y-m-d H:i:s')
        );

        $this->db->insert('about', $data);
      } else {
        $this->session->set_flashdata('failedupload', 'Foto Gagal di Upload!' . $this->upload->display_errors());
        redirect('admin/about');
      }
    }
  }

  public function updateData($id)
  {
    $heading  = $this->input->post('headingedit');
    $content  = $this->input->post('contentedit');
    $desc1    = $this->input->post('desc1edit');
    $desc2    = $this->input->post('desc2edit');
    $desc3    = $this->input->post('desc3edit');
    $desc4    = $this->input->post('desc4edit');
    $desc5    = $this->input->post('desc5edit');
    $desc6    = $this->input->post('desc6edit');

    $where = array(
      'id_about'   => $id
    );

    $uploadimgnew = $_FILES['gambarnew']['name'];

    if ($uploadimgnew) {
      $config['upload_path']    = './assets/upload/web-img/about/';
      $config['allowed_types']  = 'jpeg|jpg|png';
      $config['max_size']       = 2048;

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambarnew')) {

        $oldgambar = $this->input->post('oldaboutimg');

        unlink(FCPATH . 'assets/upload/web-img/about/' . $oldgambar);

        $newgambar = $this->upload->data('file_name');

        $data = array(
          'about_heading'   => $heading,
          'about_content'   => $content,
          'desc_1'          => $desc1,
          'desc_2'          => $desc2,
          'desc_3'          => $desc3,
          'desc_4'          => $desc4,
          'desc_5'          => $desc5,
          'desc_6'          => $desc6,
          'about_img'       => $newgambar,
        );

        $this->db->update('about', $data, $where);
      } else {
        $this->session->set_flashdata('failedupload', 'Foto Gagal di Upload!' . $this->upload->display_errors());
        redirect('admin/about');
      }
    }

    $data = array(
      'about_heading'   => $heading,
      'about_content'   => $content,
      'desc_1'          => $desc1,
      'desc_2'          => $desc2,
      'desc_3'          => $desc3,
      'desc_4'          => $desc4,
      'desc_5'          => $desc5,
      'desc_6'          => $desc6,
    );

    $this->db->update('about', $data, $where);
  }

  public function deleteData($id)
  {
    $this->db->select('id_about, about_img');
    $this->db->from('about');
    $this->db->where('id_about', $id);
    $res = $this->db->get()->row();

    $img = $res->about_img;

    unlink(FCPATH . 'assets/upload/web-img/about/' . $img);

    return $this->db->delete('about', ['id_about' => $id]);
  }
}
