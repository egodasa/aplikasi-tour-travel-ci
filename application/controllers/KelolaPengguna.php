<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaPengguna extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelPengguna", "pengguna");
  }
  
  //  Method untuk menampilkan data
	public function daftar()
	{
    $this->_dts['data_list'] = $this->pengguna->data();  // Proses pengambilan data dari database
		$this->view('admin.pengguna.daftar', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk menampilkan form tambah data
  public function tambah()
  {
    $this->view('admin.pengguna.tambah'); // Langsung tampilkan view tambah data
  }
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->pengguna->tambah($this->input->post(NULL, TRUE));
    header("Location: ".site_url("pengguna")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk menampilkan form edit
  public function edit()
  {
    $this->_dts['detail'] = $this->pengguna->data($this->input->get('id_pengguna')); // Ambil data yang akan diedit berdasarkan ID
    $this->view('admin.pengguna.edit', $this->_dts); // Oper data ke view
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->pengguna->edit($this->input->post("id_pengguna"), $this->input->post(NULL, TRUE));
    header("Location: ".site_url("pengguna")); // Arahkan user kembali ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->pengguna->hapus($this->input->get('id_pengguna')); // Proses hapus data
    header("Location: ".site_url("pengguna")); // // Arahkan user kembali ke halaman daftar
  }
}
