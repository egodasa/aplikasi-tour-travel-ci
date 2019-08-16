<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaPelanggan extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelPengguna", "pengguna");
    $this->load->model("ModelPelanggan", "pelanggan");
    $this->load->model("ModelKota", "kota");
  }
  
  //  Method untuk menampilkan data
	public function daftar()
	{
    $this->_dts['data_list'] =   $this->pelanggan->data() ;// Proses pengambilan data dari database
		$this->view('admin.pelanggan.daftar', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk menampilkan form tambah data
  public function tambah()
  {
    $this->_dts['data_pengguna'] = $this->pengguna->data();
    $this->_dts['data_kota'] = $this->kota->data();
    $this->view('admin.pelanggan.tambah', $this->_dts); // Langsung tampilkan view tambah data
  }
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->pelanggan->tambah($this->input->post(NULL, TRUE));
    header("Location: ".site_url("pelanggan")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk menampilkan form edit
  public function edit()
  {
    $this->_dts['data_pengguna'] = $this->pengguna->data();
    $this->_dts['data_kota'] = $this->kota->data();
    $this->_dts['detail'] = $this->pelanggan->data($this->input->get('id_pelanggan')); // Ambil data yang akan diedit berdasarkan ID
    $this->view('admin.pelanggan.edit', $this->_dts); // Oper data ke view
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->pelanggan->edit($this->input->post("id_pelanggan"), $this->input->post(NULL, TRUE));
    header("Location: ".site_url("pelanggan")); // Arahkan user kembali ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->pelanggan->hapus($this->input->get('id_pelanggan')); // Proses hapus data
    header("Location: ".site_url("pelanggan")); // // Arahkan user kembali ke halaman daftar
  }
}
