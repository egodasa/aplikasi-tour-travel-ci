<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaTransaksi extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelJenisProgram", "program");
    $this->load->model("ModelProgram", "master_program");
    $this->load->model("ModelTransaksi", "transaksi");
  }
  
  //  Method untuk menampilkan data
	public function daftar()
	{
    $this->_dts['data_program'] = $this->program->ambilData();
    $this->_dts['data_master_program'] = $this->program->ambilData();
    if($_SESSION['level'] == "Admin" || $_SESSION['level'] == "Direktur")
    {
      $this->_dts['data_list'] = $this->transaksi->ambilData();
    }
    else
    {
      $this->_dts['data_list'] = $this->transaksi->ambilDataDenganKondisi(["id_pengguna" => $_SESSION['id']]);
    }
		$this->view('transaksi', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->transaksi->tambahData($this->input->post(NULL, true));
    header("Location: ".site_url("transaksi")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->transaksi->ubahData($this->input->post("id"), $this->input->post(NULL, true));
    header("Location: ".site_url("transaksi")); // Arahkan user kembali ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->transaksi->hapusData($this->input->get('id')); // Proses hapus data
    header("Location: ".site_url("transaksi")); // // Arahkan user kembali ke halaman daftar
  }
}
