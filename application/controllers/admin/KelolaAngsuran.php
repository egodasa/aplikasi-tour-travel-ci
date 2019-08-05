<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaAngsuran extends MY_Controller {
  // Nama Tabel
  private $table = "tb_angsuran";
  
  //  Method untuk menampilkan data
	public function daftar()
	{
    $this->_dts['data_list'] = $this->db->select($this->table, "*");  // Proses pengambilan data dari database
		$this->view('admin.angsuran.daftar', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk menampilkan form tambah data
  public function tambah()
  {
    $this->view('admin.angsuran.tambah'); // Langsung tampilkan view tambah data
  }
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->db->insert($this->table, [
      "tgl_bayar"  =>  $this->input->post("tgl_bayar"),  // Proses penambahan data (insert)
      "juml_bayar"  =>  $this->input->post("juml_bayar"),  // Proses penambahan data (insert)
      "no_registrasi"  =>  $this->input->post("no_registrasi"),  // Proses penambahan data (insert)
      "status_pembayaran"  =>  $this->input->post("status_pembayaran")  // Proses penambahan data (insert)
    ]);
    header("Location: ".site_url("admin/angsuran")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk menampilkan form edit
  public function edit()
  {
    $this->_dts['detail'] = $this->db->get($this->table, "*", ['id_angsuran' => $this->input->get('id_angsuran')]); // Ambil data yang akan diedit berdasarkan ID
    $this->view('admin.angsuran.edit', $this->_dts); // Oper data ke view
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->db->update($this->table, 
    [
      "tgl_bayar"  =>  $this->input->post("tgl_bayar"),  // Proses penambahan data (edit)
      "juml_bayar"  =>  $this->input->post("juml_bayar"),  // Proses penambahan data (insert)
      "no_registrasi"  =>  $this->input->post("no_registrasi"),  // Proses penambahan data (insert)
      "status_pembayaran"  =>  $this->input->post("status_pembayaran")  // Proses penambahan data (insert)
    ],
    [
      "id_angsuran" => $this->input->post("id_angsuran") // ID data yang akan diedit
    ]);
    header("Location: ".site_url("admin/angsuran")); // Arahkan user kembali ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->db->delete($this->table, ['id_angsuran' => $this->input->get('id_angsuran')]); // Proses hapus data
    header("Location: ".site_url("admin/angsuran")); // // Arahkan user kembali ke halaman daftar
  }
}
