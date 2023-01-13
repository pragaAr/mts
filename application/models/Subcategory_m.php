<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Subcategory_m extends CI_Model
{
  public function getData()
  {
    $this->db->select('sub_category.id_subcategory, sub_category.category_id, sub_category.sub_name, sub_category.sub_img, sub_category.subAdd, category.id_category, category.category_name');
    $this->db->from('sub_category');
    $this->db->join('category', 'category.id_category = sub_category.category_id');
    $res = $this->db->get()->result();
    return $res;
  }

  public function getDataSub()
  {
    $this->db->select('id_subcategory, sub_name');
    $this->db->from('sub_category');
    $res = $this->db->get()->result();
    return $res;
  }

  public function countData()
  {
    return $this->db->count_all('sub_category');
  }

  public function getSubcategory()
  {
    $this->db->select('sub_name');
    $this->db->from('sub_category');
    $res = $this->db->get()->result();
    return $res;
  }

  public function getId($id)
  {
    $this->db->select('sub_category.id_subcategory, sub_category.category_id, sub_category.sub_name, sub_category.sub_img, sub_category.subAdd, category.id_category, category.category_name');
    $this->db->from('sub_category');
    $this->db->where('id_subcategory', $id);
    $this->db->join('category', 'category.id_category = sub_category.category_id');
    $res = $this->db->get()->row();
    return $res;
  }

  public function addData()
  {
    $kategori     = $this->input->post('categoryid');
    $subkategori  = $this->input->post('subcategory');

    $uploadimg = $_FILES['gambarsub']['name'];

    if ($uploadimg) {
      $config['upload_path']    = './assets/upload/sub-category/';
      $config['allowed_types'] = 'jpeg|jpg|png';
      $config['max_size']       = 2048;

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambarsub')) {
        $gambar = $this->upload->data('file_name');

        $data = array(
          'category_id' => $kategori,
          'sub_name'    => $subkategori,
          'sub_img'     => $gambar,
          'subAdd'      => date('Y-m-d H:i:s')
        );

        $this->db->insert('sub_category', $data);
      } else {
        $this->session->set_flashdata('failedupload', 'Foto Gagal di Upload!' . $this->upload->display_errors());
        redirect('admin/subcategory');
      }
    }
  }

  public function updateData($id)
  {
    $kategori     = $this->input->post('categoryidedit');
    $subkategori  = $this->input->post('subname');

    $where = array(
      'id_subcategory'   => $id
    );

    $uploadimgnew = $_FILES['gambarnew']['name'];

    if ($uploadimgnew) {
      $config['upload_path']    = './assets/upload/sub-category/';
      $config['allowed_types']  = 'jpeg|jpg|png';
      $config['max_size']       = 2048;

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambarnew')) {

        $oldgambar = $this->input->post('oldsubimg');

        unlink(FCPATH . 'assets/upload/sub-category/' . $oldgambar);

        $newgambar = $this->upload->data('file_name');

        $data = array(
          'category_id' => $kategori,
          'sub_name'    => $subkategori,
          'sub_img'     => $newgambar,
        );

        $this->db->update('sub_category', $data, $where);
      } else {
        $this->session->set_flashdata('failedupload', 'Foto Gagal di Upload!' . $this->upload->display_errors());
        redirect('admin/subcategory');
      }
    }

    $data = array(
      'category_id' => $kategori,
      'sub_name'    => $subkategori,
    );

    $this->db->update('sub_category', $data, $where);
  }

  public function deleteData($id)
  {
    $this->db->select('id_subcategory, sub_img');
    $this->db->from('sub_category');
    $this->db->where('id_subcategory', $id);
    $res = $this->db->get()->row();

    $img = $res->sub_img;

    unlink(FCPATH . 'assets/upload/sub-category/' . $img);

    return $this->db->delete('sub_category', ['id_subcategory' => $id]);
  }
}
