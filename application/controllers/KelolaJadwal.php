<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaJadwal extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelJadwal", "jadwal");
  }
  
  //  Method untuk menampilkan data
	public function daftar($id_jadwal)
	{
    $this->_dts['data_list'] = $this->jadwal->daftarJemaah($id_jadwal); // Proses pengambilan data dari database
		$this->view('jadwal', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk menampilkan form tambah data
  public function tambahData()
  {
    $this->view('admin.jadwal.tambah'); // Langsung tampilkan view tambah data
  }
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->jadwal->tambahData($this->input->post(NULL, true));
    header("Location: ".site_url("jadwal")."?id_jadwal=".$this->input->post("id_jadwal")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk menampilkan form edit
  public function ubahData()
  {
    $this->_dts['detail'] = $this->jadwal->ambilData($this->input->get('id_keberangkatan')); // Ambil data yang akan diedit berdasarkan ID
    $this->view('admin.jadwal.edit', $this->_dts); // Oper data ke view
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->jadwal->ubahData($this->input->post("id_keberangkatan"));
    header("Location: ".site_url("jadwal")."?id_jadwal=".$this->input->post("id_jadwal")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->jadwal->hapusData($this->input->get('id_keberangkatan')); // Proses hapus data
    header("Location: ".site_url("jadwal")."?id_jadwal=".$this->input->post("id_jadwal")); // Arahkan kembali user ke halaman daftar
  }
}
