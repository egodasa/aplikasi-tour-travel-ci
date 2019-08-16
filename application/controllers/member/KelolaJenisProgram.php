<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaJenisProgram extends MY_Controller {
  // Nama Tabel
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelJenisProgram", "jenis_program");
    $this->load->model("ModelProgram", "program");
  }
  //  Method untuk menampilkan data
	public function daftar()
	{
    $this->_dts['data_list'] = $this->jenis_program->data();  // Proses pengambilan data dari database
		$this->view('admin.jenisprogram.daftar', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk menampilkan form tambah data
  public function tambah()
  {
    $this->_dts['data_program'] = $this->program->data();
    $this->view('admin.jenisprogram.tambah', $this->_dts); // Langsung tampilkan view tambah data
  }
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->jenis_program->tambah($this->input->post(NULL,TRUE));
    header("Location: ".site_url("jenisprogram")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk menampilkan form edit
  public function edit()
  {
    $this->_dts['data_program'] = $this->program->data();
    $this->_dts['detail'] = $this->jenis_program->data($this->input->get('id_jenis')); // Ambil data yang akan diedit berdasarkan ID
    $this->view('admin.jenisprogram.edit', $this->_dts); // Oper data ke view
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->jenis_program->edit($this->input->post("id_jenis"), $this->input->post(NULL,TRUE));
    header("Location: ".site_url("jenisprogram")); // Arahkan user kembali ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->jenis_program->hapus($this->input->get('id_jenis')); // Proses hapus data
    header("Location: ".site_url("jenisprogram")); // // Arahkan user kembali ke halaman daftar
  }
}
