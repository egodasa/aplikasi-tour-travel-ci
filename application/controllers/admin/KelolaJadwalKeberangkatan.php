<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaJadwalKeberangkatan extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelJenisProgram", "program");
    $this->load->model("ModelJadwalKeberangkatan", "jadwal_keberangkatan");
  }
  
  //  Method untuk menampilkan data
	public function daftar()
	{
    $this->_dts['data_list'] = $this->jadwal_keberangkatan->data();  // Proses pengambilan data dari database
		$this->view('admin.jadwalkeberangkatan.daftar', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk menampilkan form tambah data
  public function tambah()
  {
    $this->_dts['data_program'] = $this->program->data();
    $this->view('admin.jadwalkeberangkatan.tambah', $this->_dts); // Langsung tampilkan view tambah data
  }
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->jadwal_keberangkatan->tambah($this->input->post(NULL, TRUE));
    header("Location: ".site_url("jadwalkeberangkatan")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk menampilkan form edit
  public function edit()
  {
    $this->_dts['data_program'] = $this->program->data();
    $this->_dts['detail'] = $this->jadwal_keberangkatan->data($this->input->get('id_jadwal')); // Ambil data yang akan diedit berdasarkan ID
    $this->view('admin.jadwalkeberangkatan.edit', $this->_dts); // Oper data ke view
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->jadwal_keberangkatan->edit($this->input->post("id_jadwal"), $this->input->post(NULL, TRUE));
    header("Location: ".site_url("jadwalkeberangkatan")); // Arahkan user kembali ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->jadwal_keberangkatan->hapus($this->input->get('id_jadwal')); // Proses hapus data
    header("Location: ".site_url("jadwalkeberangkatan")); // // Arahkan user kembali ke halaman daftar
  }
}
