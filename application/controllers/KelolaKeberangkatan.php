<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaKeberangkatan extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelJenisProgram", "program");
    $this->load->model("ModelKeberangkatan", "keberangkatan");
  }
  
  //  Method untuk menampilkan data
	public function daftar()
	{
    $this->_dts['data_list'] = $this->keberangkatan->ambilData();  // Proses pengambilan data dari database
    $this->_dts['data_program'] = $this->program->ambilData();
		$this->view('keberangkatan', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->keberangkatan->tambahData($this->input->post(NULL, TRUE));
    header("Location: ".site_url("keberangkatan")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->keberangkatan->ubahData($this->input->post("id"), $this->input->post(NULL, TRUE));
    header("Location: ".site_url("keberangkatan")); // Arahkan user kembali ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->keberangkatan->hapusData($this->input->get('id')); // Proses hapus data
    header("Location: ".site_url("keberangkatan")); // // Arahkan user kembali ke halaman daftar
  }
}
