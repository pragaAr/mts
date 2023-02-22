<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Category_m extends CI_Model
{
  public function getData()
  {
    $this->db->select('*');
    $this->db->from('category');
    $res = $this->db->get()->result();
    return $res;
  }

  public function getRows()
  {
    return $this->db->get('category')->num_rows();
  }

  public function getProductCategoryRows($id)
  {
    return $this->db->get_where('product', ['category_id' => $id])->num_rows();
  }

  public function getDataProductCategory($id, $limit, $start, $keyword = null)
  {
    // if ($keyword) {
    //   $this->db->where('category_id', $id);
    //   $this->db->like('category_name', $keyword);
    //   $this->db->or_like('product_name', $keyword);
    // }

    // $this->db->select('a.id_category, a.category_name, b.id_product, b.product_type, b.product_name, b.product_img, b.category_id');
    // $this->db->from('category a');
    // $this->db->join('product b', 'b.category_id = a.id_category');
    // $this->db->where('a.id_category', $id);
    // $this->db->limit($limit, $start);
    // $res = $this->db->get()->result();
    // return $res;

    if ($keyword) {
      $this->db->where('category_id', $id);
      $this->db->like('product_name', $keyword);
      $this->db->or_like('nama_merk', $keyword);
    }
    $this->db->select('product.id_product, product.product_type, product.product_name, product.merk_id, product.category_id, product.product_img, category.id_category, category.category_name, merk.id_merk, merk.nama_merk');
    $this->db->from('product');
    $this->db->where('product.category_id', $id);
    $this->db->join('category', 'category.id_category = product.category_id', 'left');
    $this->db->join('merk', 'merk.id_merk = product.merk_id');
    $this->db->limit($limit, $start);
    $res = $this->db->get()->result();
    return $res;
  }

  public function getLimitDataCategory($limit, $start, $keyword = null)
  {
    if ($keyword) {
      $this->db->like('category_name', $keyword);
    }
    return $this->db->get('category', $limit, $start)->result();
  }

  public function getLimitData()
  {
    $this->db->select('*');
    $this->db->from('category');
    $this->db->limit(12);
    $res = $this->db->get()->result();
    return $res;
  }

  public function getDataCategory()
  {
    $this->db->select('id_category, category_name');
    $this->db->from('category');
    $res = $this->db->get()->result();
    return $res;
  }

  public function countData()
  {
    return $this->db->count_all('category');
  }

  public function getCategory()
  {
    $this->db->select('category_name');
    $this->db->from('category');
    $res = $this->db->get()->result();
    return $res;
  }

  public function getDataCategoryUri($id)
  {
    $this->db->select('id_category');
    $this->db->from('category');
    $this->db->where('id_category', $id);
    $res = $this->db->get()->row();
    return $res;
  }

  public function getDataSubcategoryUri($id)
  {
    $this->db->select('id_category');
    $this->db->from('category');
    $this->db->where('id_category', $id);
    $res = $this->db->get()->row();
    return $res;
  }

  public function getDataCategoryName($id)
  {
    $this->db->select('category_name');
    $this->db->from('category');
    $this->db->where('id_category', $id);
    $res = $this->db->get()->row();
    return $res;
  }

  public function getDataSubcategoryName($id)
  {
    $this->db->select('category_name');
    $this->db->from('category');
    $this->db->where('id_category', $id);
    $res = $this->db->get()->row();
    return $res;
  }

  public function getDataProductSubcategory($id, $limit, $start, $keyword = null)
  {
    if ($keyword) {
      $this->db->where('subcategory_id', $id);
      $this->db->like('product_name', $keyword);
      $this->db->or_like('nama_merk', $keyword);
    }
    $this->db->select('product.id_product, product.product_type, product.product_name, product.merk_id, product.category_id, product.subcategory_id, product.satuan, product.jumlah, product.product_img, product.keterangan, sub_category.id_subcategory, sub_category.sub_name, merk.id_merk, merk.nama_merk');
    $this->db->from('product');
    $this->db->where('product.subcategory_id', $id);
    $this->db->join('sub_category', 'sub_category.id_subcategory = product.subcategory_id', 'left');
    $this->db->join('merk', 'merk.id_merk = product.merk_id');
    $this->db->limit($limit, $start);
    $res = $this->db->get()->result();
    return $res;
  }

  public function getId($id)
  {
    $this->db->select('*');
    $this->db->from('category');
    $this->db->where('id_category', $id);
    $res = $this->db->get()->row();
    return $res;
  }

  public function addData()
  {
    $kategori = $this->input->post('category');

    $uploadimg = $_FILES['gambarkategori']['name'];

    if ($uploadimg) {
      $config['upload_path']    = './assets/upload/category/';
      $config['allowed_types'] = 'jpeg|jpg|png';
      $config['max_size']       = 2048;

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambarkategori')) {
        $gambar = $this->upload->data('file_name');

        $data = array(
          'category_name'   => $kategori,
          'category_img'    => $gambar,
          'categoryAdd'     => date('Y-m-d H:i:s')
        );

        $this->db->insert('category', $data);
      } else {
        $this->session->set_flashdata('failedupload', 'Foto Gagal di Upload!' . $this->upload->display_errors());
        redirect('admin/category');
      }
    }
  }

  public function updateData($id)
  {
    $kategori = strtolower($this->input->post('categoryname'));

    $where = array(
      'id_category'   => $id
    );

    $uploadimgnew = $_FILES['gambarnew']['name'];

    if ($uploadimgnew) {
      $config['upload_path']    = './assets/upload/category/';
      $config['allowed_types']  = 'jpeg|jpg|png';
      $config['max_size']       = 2048;

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambarnew')) {

        $oldgambar = $this->input->post('oldcategoryimg');

        unlink(FCPATH . 'assets/upload/category/' . $oldgambar);

        $newgambar = $this->upload->data('file_name');

        $data = array(
          'category_name'   => $kategori,
          'category_img'    => $newgambar,
        );

        $this->db->update('category', $data, $where);
      } else {
        $this->session->set_flashdata('failedupload', 'Foto Gagal di Upload!' . $this->upload->display_errors());
        redirect('admin/category');
      }
    }
    $data = array(
      'category_name'   => $kategori,
    );

    $this->db->update('category', $data, $where);
  }

  public function deleteData($id)
  {
    $this->db->select('id_category, category_img');
    $this->db->from('category');
    $this->db->where('id_category', $id);
    $res = $this->db->get()->row();

    $img = $res->category_img;

    unlink(FCPATH . 'assets/upload/category/' . $img);

    return $this->db->delete('category', ['id_category' => $id]);
  }
}
