<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaAngsuran extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelAngsuran", "angsuran");
  }
  
  //  Method untuk menampilkan data
	public function daftar($no_registrasi)
	{
    $this->_dts['data_list'] = $this->angsuran->angsuranBeradasarkanTransaksi($no_registrasi); // Proses pengambilan data dari database
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
    $this->angsuran->tambah($this->input->post(NULL, true));
    header("Location: ".site_url("angsuran")."?no_registrasi=".$this->input->post("no_registrasi")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk menampilkan form edit
  public function edit()
  {
    $this->_dts['detail'] = $this->angsuran->data($this->input->get('id_angsuran')); // Ambil data yang akan diedit berdasarkan ID
    $this->view('admin.angsuran.edit', $this->_dts); // Oper data ke view
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->angsuran->edit($this->input->post("id_angsuran"));
    header("Location: ".site_url("angsuran")."?no_registrasi=".$this->input->post("no_registrasi")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->angsuran->hapus($this->input->get('id_angsuran')); // Proses hapus data
    header("Location: ".site_url("angsuran")); // // Arahkan user kembali ke halaman daftar
  }
}
