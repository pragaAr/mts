<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Merk_m extends CI_Model
{
  public function getData()
  {
    $this->db->select('*');
    $this->db->from('merk');
    $res = $this->db->get()->result();
    return $res;
  }

  public function getDataMerk()
  {
    $this->db->select('id_merk, nama_merk');
    $this->db->from('merk');
    $res = $this->db->get()->result();
    return $res;
  }

  public function getDataMerkName($id)
  {
    $this->db->select('nama_merk');
    $this->db->from('merk');
    $this->db->where('id_merk', $id);
    $res = $this->db->get()->row();
    return $res;
  }

  public function countData()
  {
    return $this->db->count_all('merk');
  }

  public function getMerk()
  {
    $this->db->select('nama_merk');
    $this->db->from('merk');
    $res = $this->db->get()->result();
    return $res;
  }

  public function getId($id)
  {
    $this->db->select('*');
    $this->db->from('merk');
    $this->db->where('id_merk', $id);
    $res = $this->db->get()->row();
    return $res;
  }

  public function addData()
  {
    $merk = $this->input->post('merk');

    $uploadimg = $_FILES['gambarmerk']['name'];

    if ($uploadimg) {
      $config['upload_path']    = './assets/upload/merk/';
      $config['allowed_types']  = 'jpeg|jpg|png';
      $config['max_size']       = 2048;

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambarmerk')) {
        $gambar = $this->upload->data('file_name');

        $data = array(
          'nama_merk'   => $merk,
          'merk_img'    => $gambar,
          'merkAdd'     => date('Y-m-d H:i:s')
        );

        $this->db->insert('merk', $data);
      } else {
        $this->session->set_flashdata('failedupload', 'Foto Gagal di Upload!' . $this->upload->display_errors());
        redirect('admin/merk');
      }
    }
  }

  public function updateData($id)
  {
    $merk     = $this->input->post('merkname');

    $where = array(
      'id_merk'   => $id
    );

    $uploadimgnew = $_FILES['gambarnew']['name'];

    if ($uploadimgnew) {
      $config['upload_path']    = './assets/upload/merk/';
      $config['allowed_types']  = 'jpeg|jpg|png';
      $config['max_size']       = 2048;

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambarnew')) {

        $oldgambar = $this->input->post('oldmerkimg');

        unlink(FCPATH . 'assets/upload/merk/' . $oldgambar);

        $newgambar = $this->upload->data('file_name');

        $data = array(
          'nama_merk'   => $merk,
          'merk_img'    => $newgambar,
        );

        $this->db->update('merk', $data, $where);
      } else {
        $this->session->set_flashdata('failedupload', 'Foto Gagal di Upload!' . $this->upload->display_errors());
        redirect('admin/merk');
      }
    }

    $data = array(
      'nama_merk' => $merk,
    );

    $this->db->update('merk', $data, $where);
  }

  public function deleteData($id)
  {
    $this->db->select('id_merk, merk_img');
    $this->db->from('merk');
    $this->db->where('id_merk', $id);
    $res = $this->db->get()->row();

    $img = $res->merk_img;

    unlink(FCPATH . 'assets/upload/merk/' . $img);

    return $this->db->delete('merk', ['id_merk' => $id]);
  }
}
