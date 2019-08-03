<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaTransaksi extends MY_Controller {
  // Nama Tabel
  private $table = "tb_transaksi";
  
  //  Method untuk menampilkan data
	public function daftar()
	{
    $this->_dts['data_list'] = $this->db->select($this->table, "*");  // Proses pengambilan data dari database
		$this->view('admin.transaksi.daftar', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk menampilkan form tambah data
  public function tambah()
  {
    $this->view('admin.transaksi.tambah'); // Langsung tampilkan view tambah data
  }
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->db->insert($this->table, [
      "id_jenis"  =>  $this->input->post("id_jenis"),  // Proses penambahan data (insert)
      "id_pelanggan"  =>  $this->input->post("id_pelanggan"),  // Proses penambahan data (insert)
      "status"  =>  $this->input->post("status"),  // Proses penambahan data (insert)
      "dp"  =>  $this->input->post("dp")  // Proses penambahan data (insert)
    ]);
    header("Location: ".site_url("admin/transaksi")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk menampilkan form edit
  public function edit()
  {
    $this->_dts['detail'] = $this->db->get($this->table, "*", ['no_registrasi' => $this->input->get('no_registrasi')]); // Ambil data yang akan diedit berdasarkan ID
    $this->view('admin.transaksi.edit', $this->_dts); // Oper data ke view
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->db->update($this->table, 
    [
     "id_jenis"  =>  $this->input->post("id_jenis"),  // Proses penambahan data (edit)
      "id_pelanggan"  =>  $this->input->post("id_pelanggan"),  // Proses penambahan data (insert)
      "status"  =>  $this->input->post("status"),  // Proses penambahan data (insert)
      "dp"  =>  $this->input->post("dp")  // Proses penambahan data (insert)
    ],
    [
      "no_registrasi" => $this->input->post("no_registrasi") // ID data yang akan diedit
    ]);
    header("Location: ".site_url("admin/transaksi")); // Arahkan user kembali ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->db->delete($this->table, ['no_registrasi' => $this->input->get('no_registrasi')]); // Proses hapus data
    header("Location: ".site_url("admin/transaksi")); // // Arahkan user kembali ke halaman daftar
  }
}
