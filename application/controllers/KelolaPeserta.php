<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaPeserta extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelPengguna", "pengguna");
    $this->load->model("ModelPeserta", "peserta");
    $this->load->model("ModelKota", "kota");
  }
  
  //  Method untuk menampilkan data
	public function daftar()
	{
    $this->_dts['data_list'] =   $this->peserta->ambilData() ;// Proses pengambilan data dari database
    $this->_dts['data_pengguna'] = $this->pengguna->ambilData();
    $this->_dts['data_kota'] = $this->kota->ambilData();
		$this->view('admin.pelanggan.daftar', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk menampilkan form tambah data
  public function tambahData()
  {
    $this->_dts['data_pengguna'] = $this->pengguna->ambilData();
    $this->_dts['data_kota'] = $this->kota->ambilData();
    $this->view('admin.pelanggan.tambah', $this->_dts); // Langsung tampilkan view tambah data
  }
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->peserta->tambahData($this->input->post(NULL, TRUE));
    header("Location: ".site_url("admin/peserta")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk menampilkan form edit
  public function ubahData()
  {
    $this->_dts['data_pengguna'] = $this->pengguna->ambilData();
    $this->_dts['data_kota'] = $this->kota->ambilData();
    $this->_dts['detail'] = $this->peserta->ambilData($this->input->get('id')); // Ambil data yang akan diedit berdasarkan ID
    $this->view('admin.pelanggan.edit', $this->_dts); // Oper data ke view
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->peserta->ubahData($this->input->post("id"), $this->input->post(NULL, TRUE));
    header("Location: ".site_url("admin/peserta")); // Arahkan user kembali ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->peserta->hapusData($this->input->get('id')); // Proses hapus data
    header("Location: ".site_url("admin/peserta")); // // Arahkan user kembali ke halaman daftar
  }
}
