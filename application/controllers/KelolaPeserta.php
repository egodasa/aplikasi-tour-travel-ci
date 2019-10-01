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
    $this->load->model("ModelJenisProgram", "jenis_program");
    $this->load->model("ModelProgram", "program");
  }
  
  //  Method untuk menampilkan data
	public function daftar()
	{
    $this->_dts['data_list'] =   $this->peserta->ambilData() ;// Proses pengambilan data dari database
    $this->_dts['data_program'] = $this->jenis_program->ambilData();
    $this->_dts['data_pengguna'] = $this->pengguna->ambilData();
    $this->_dts['data_kota'] = $this->kota->ambilData();
		$this->view('peserta', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->peserta->tambahData($this->input->post(NULL, TRUE));
    header("Location: ".site_url("peserta")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->peserta->ubahData($this->input->post("id"), $this->input->post(NULL, TRUE));
    header("Location: ".site_url("peserta")); // Arahkan user kembali ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->peserta->hapusData($this->input->get('id')); // Proses hapus data
    header("Location: ".site_url("peserta")); // // Arahkan user kembali ke halaman daftar
  }
}
