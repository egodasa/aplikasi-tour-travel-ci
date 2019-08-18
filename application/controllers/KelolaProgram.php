<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaProgram extends MY_Controller {
  // Nama Tabel
  private $table = "tb_program";
  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelProgram", "program");
  }
  //  Method untuk menampilkan data
	public function daftar()
	{
    $this->_dts['data_list'] = $this->program->ambilData();  // Proses pengambilan data dari database
		$this->view('admin.program.daftar', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->program->tambahData($this->input->post(NULL, TRUE));
    
    header("Location: ".site_url("admin/program")); // Arahkan kembali user ke halaman daftar
  }
  
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->program->ubahData($this->input->post("id"), $this->input->post(NULL, TRUE));
    
    header("Location: ".site_url("admin/program")); // Arahkan user kembali ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->program->hapusData($this->input->get('id')); // Proses hapus data
    
    header("Location: ".site_url("admin/program")); // // Arahkan user kembali ke halaman daftar
  }
}
