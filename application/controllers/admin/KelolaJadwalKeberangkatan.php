<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaJadwalKeberangkatan extends MY_Controller {
  // Nama Tabel
  private $table = "tb_jadwalkeberangkatan";
  
  //  Method untuk menampilkan data
	public function daftar()
	{
    $this->_dts['data_list'] = $this->db->select($this->table, "*");  // Proses pengambilan data dari database
		$this->view('admin.jadwalkeberangkatan.daftar', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk menampilkan form tambah data
  public function tambah()
  {
    $this->view('admin.jadwalkeberangkatan.tambah'); // Langsung tampilkan view tambah data
  }
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->db->insert($this->table, [
      "tgl_berangkat"  =>  $this->input->post("tgl_berangkat"),  // Proses penambahan data (insert)
      "nama_maskapai"  =>  $this->input->post("nama_maskapai"),  // Proses penambahan data (insert)
      "id_jenis"  =>  $this->input->post("id_jenis"),  // Proses penambahan data (insert)
      "status"  =>  $this->input->post("status")  // Proses penambahan data (insert)
    ]);
    header("Location: ".site_url("admin/jadwalkeberangkatan")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk menampilkan form edit
  public function edit()
  {
    $this->_dts['detail'] = $this->db->get($this->table, "*", ['id_jadwal' => $this->input->get('id_jadwal')]); // Ambil data yang akan diedit berdasarkan ID
    $this->view('admin.jadwalkeberangkatan.edit', $this->_dts); // Oper data ke view
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->db->update($this->table, 
    [
     "tgl_berangkat"  =>  $this->input->post("tgl_berangkat"),  // Proses penambahan data (edit)
      "nama_maskapai"  =>  $this->input->post("nama_maskapai"),  // Proses penambahan data (insert)
      "id_jenis"  =>  $this->input->post("id_jenis"),  // Proses penambahan data (insert)
      "status"  =>  $this->input->post("status")  // Proses penambahan data (insert)
    ],
    [
      "id_jadwal" => $this->input->post("id_jadwal") // ID data yang akan diedit
    ]);
    header("Location: ".site_url("admin/jadwalkeberangkatan")); // Arahkan user kembali ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->db->delete($this->table, ['id_jadwal' => $this->input->get('id_jadwal')]); // Proses hapus data
    header("Location: ".site_url("admin/jadwalkeberangkatan")); // // Arahkan user kembali ke halaman daftar
  }
}
