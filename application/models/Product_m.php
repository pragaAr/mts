<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Product_m extends CI_Model
{
  public function getRows()
  {
    return $this->db->get('product')->num_rows();
  }

  public function getProductData($limit, $start, $keyword  = null)
  {
    if ($keyword) {
      $this->db->like('product_name', $keyword)->or_like('nama_merk', $keyword);
    }
    $this->db->select('product.id_product, product.product_type, product.product_name, product.merk_id, product.category_id, product.product_img, category.id_category, category.category_name, merk.id_merk, merk.nama_merk');
    $this->db->from('product');
    $this->db->join('category', 'category.id_category = product.category_id', 'left');
    $this->db->join('merk', 'merk.id_merk = product.merk_id');
    $this->db->limit($limit, $start);
    $res = $this->db->get()->result();
    return $res;
  }

  public function getProductRows($id)
  {
    return $this->db->get_where('product', ['subcategory_id' => $id])->num_rows();
  }

  public function getData()
  {
    $this->db->select('product.id_product, product.product_type, product.product_name, product.merk_id, product.category_id, product.product_img, product.productAdd, merk.id_merk, merk.nama_merk, category.id_category, category.category_name');
    $this->db->from('product');
    $this->db->join('merk', 'merk.id_merk = product.merk_id', 'left');
    $this->db->join('category', 'category.id_category = product.category_id', 'left');
    $res = $this->db->get()->result();
    return $res;
  }

  public function getLimitData()
  {
    $this->db->select('product.id_product, product.product_type, product.product_name, product.merk_id, product.category_id, product.product_img, product.productAdd, merk.id_merk, merk.nama_merk, category.id_category, category.category_name');
    $this->db->from('product');
    $this->db->join('merk', 'merk.id_merk = product.merk_id', 'left');
    $this->db->join('category', 'category.id_category = product.category_id', 'left');
    $this->db->limit(12);
    $res = $this->db->get()->result();
    return $res;
  }

  public function getProduct()
  {
    $this->db->select('product.id_product, product.product_type, product.product_name, product.merk_id, product.category_id, product.product_img, product.productAdd, merk.id_merk, merk.nama_merk, category.id_category, category.category_name');
    $this->db->from('product');
    $this->db->join('merk', 'merk.id_merk = product.merk_id', 'left');
    $this->db->join('category', 'category.id_category = product.category_id', 'left');
    $res = $this->db->get()->result();
    return $res;
  }

  public function getDataProductMerk($id)
  {
    $this->db->select('product.id_product, product.product_type, product.product_name, product.merk_id, product.category_id, product.product_img, product.productAdd, merk.id_merk, merk.nama_merk, merk.merk_img, category.id_category, category.category_name');
    $this->db->from('product');
    $this->db->where('product.merk_id', $id);
    $this->db->join('merk', 'merk.id_merk = product.merk_id', 'left');
    $this->db->join('category', 'category.id_category = product.category_id', 'left');
    $res = $this->db->get()->result();
    return $res;
  }

  public function getDataMerkUri($id)
  {
    $this->db->select('merk_id');
    $this->db->from('product');
    $this->db->where('merk_id', $id);
    $res = $this->db->get()->row();
    return $res;
  }

  public function countData()
  {
    return $this->db->count_all('product');
  }

  public function getDataId($id)
  {
    $this->db->select('product.id_product, product.product_type, product.product_name, product.merk_id, product.category_id, product.product_img, product.productAdd, merk.id_merk, merk.nama_merk, category.id_category, category.category_name');
    $this->db->from('product');
    $this->db->where('product.id_product', $id);
    $this->db->join('merk', 'merk.id_merk = product.merk_id', 'left');
    $this->db->join('category', 'category.id_category = product.category_id', 'left');
    $res = $this->db->get()->row();
    return $res;
  }

  public function addData()
  {
    $tipe     = $this->input->post('tipeproduk');
    $nama     = $this->input->post('namaproduk');
    $merk     = $this->input->post('merkproduk');
    $kategori = $this->input->post('kategoriproduk');
    $date     = date('Y-m-d H:i:s');

    $uploadimg = $_FILES['gambarproduk']['name'];

    if ($uploadimg) {
      $config['upload_path']    = './assets/upload/product/';
      $config['allowed_types']  = 'jpeg|jpg|png';
      $config['max_size']       = 2048;

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambarproduk')) {
        $gambar = $this->upload->data('file_name');

        $data = array(
          'product_type'    => $tipe,
          'product_name'    => $nama,
          'merk_id'         => $merk,
          'category_id'     => $kategori,
          'product_img'     => $gambar,
          'productAdd'      => $date
        );

        $this->db->insert('product', $data);
      } else {
        $this->session->set_flashdata('failedupload', 'Foto Gagal di Upload!' . $this->upload->display_errors());
        redirect('admin/product');
      }
    }
  }

  public function updateData($id)
  {
    $tipe     = $this->input->post('tipeprodukedit');
    $nama     = $this->input->post('namaprodukedit');
    $merk     = $this->input->post('merkprodukedit');
    $kategori = $this->input->post('kategoriprodukedit');

    $where = array(
      'id_product'    => $id
    );

    $uploadimgnew = $_FILES['gambarprodnew']['name'];

    if ($uploadimgnew) {
      $config['upload_path']    = './assets/upload/product/';
      $config['allowed_types']  = 'jpeg|jpg|png';
      $config['max_size']       = 5000;

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambarprodnew')) {

        $oldgambar = $this->input->post('oldprodimg');

        unlink(FCPATH . 'assets/upload/product/' . $oldgambar);

        $newgambar = $this->upload->data('file_name');

        $data = array(
          'product_type'    => $tipe,
          'product_name'    => $nama,
          'merk_id'         => $merk,
          'category_id'     => $kategori,
          'product_img'     => $newgambar,
        );

        $this->db->update('product', $data, $where);
      } else {
        $this->session->set_flashdata('failedupload', 'Foto Gagal di Upload!' . $this->upload->display_errors());
        redirect('admin/product');
      }
    }

    $data = array(
      'product_type'    => $tipe,
      'product_name'    => $nama,
      'merk_id'         => $merk,
      'category_id'     => $kategori,
    );

    $this->db->update('product', $data, $where);
  }

  public function deleteData($id)
  {
    $this->db->select('id_product, product_img');
    $this->db->from('product');
    $this->db->where('id_product', $id);
    $res = $this->db->get()->row();

    $img = $res->product_img;

    unlink(FCPATH . 'assets/upload/product/' . $img);

    return $this->db->delete('product', ['id_product' => $id]);
  }
}
