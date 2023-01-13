<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Profile_m extends CI_Model
{
  public function getData()
  {
    $no = 1;
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('id_user', $no);
    $res = $this->db->get()->row();
    return $res;
  }

  public function getDataId($id)
  {
    $this->db->select('id_user, nama_user, notelp, username, user_img');
    $this->db->from('user');
    $this->db->where('id_user', $id);
    $res = $this->db->get()->row();
    return $res;
  }

  public function updateData($id)
  {
    $this->db->select('id_user, password');
    $this->db->from('user');
    $this->db->where('id_user', $id);
    $result = $this->db->get()->row();

    $datapass     = $result->password;

    $nama         = $this->input->post('namauser');
    $notelp       = $this->input->post('notelp');
    $username     = $this->input->post('username');
    $oldpass      = $this->input->post('currentpassword');
    $newpass      = $this->input->post('newpassword');

    $where = array(
      'id_user'    => $id
    );

    if ($oldpass == "") {
      $data = array(
        'nama_user'   => $nama,
        'notelp'      => $notelp,
        'username'    => $username,
        'userUpdate'  => date('Y-m-d H:i:s'),
      );

      $this->db->update('user', $data, $where);

      $this->session->set_flashdata('updated', 'Data berhasil diubah!');
      redirect('admin/profile');
    } else {
      if (md5($oldpass) != $datapass) {
        $this->session->set_flashdata('failed', 'Password saat ini tidak sesuai!');
        redirect('admin/profile');
      } else {
        if ($oldpass == $newpass) {
          $this->session->set_flashdata('samefailed', 'Password baru tidak boleh sama dengan password saat ini!');
          redirect('admin/profile');
        } else {
          $hash = md5($newpass);

          $data = array(
            'nama_user' => $nama,
            'notelp'    => $notelp,
            'username'  => $username,
            'password'  => $hash,
            'userUpdate'  => date('Y-m-d H:i:s'),
          );

          $this->db->update('user', $data, $where);

          $this->session->set_flashdata('updated', 'Data berhasil diubah!');
          redirect('admin/profile');
        }
      }
    }
  }

  public function deleteData($id)
  {
    $this->db->select('id_product, product_img');
    $this->db->from('product');
    $this->db->where('id_product', $id);
    $res = $this->db->get()->row();

    $img = $res->product_img;

    unlink(FCPATH . 'assets/admin/assets/img/upload/' . $img);

    return $this->db->delete('product', ['id_product' => $id]);
  }
}
