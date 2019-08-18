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
    $this->_dts['data_program'] = $this->program->ambilData();
    $this->_dts['data_list'] = $this->jenis_program->ambilData();  // Proses pengambilan data dari database
		$this->view('admin.jenisprogram.daftar', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->jenis_program->tambahData($this->input->post(NULL,TRUE));
    header("Location: ".site_url("admin/jenisprogram")); // Arahkan kembali user ke halaman daftar
  }

  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->jenis_program->ubahData($this->input->post("id"), $this->input->post(NULL,TRUE));
    header("Location: ".site_url("admin/jenisprogram")); // Arahkan user kembali ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->jenis_program->hapusData($this->input->get('id')); // Proses hapus data
    header("Location: ".site_url("admin/jenisprogram")); // // Arahkan user kembali ke halaman daftar
  }
}
