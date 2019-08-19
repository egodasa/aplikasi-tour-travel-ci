<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaAngsuran extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelAngsuran", "angsuran");
  }
  
  //  Method untuk menampilkan data
	public function daftar()
	{
    if(!empty($this->input->get("id_transaksi")))
    {
      $_SESSION['id_transaksi_terpilih'] = $this->input->get("id_transaksi");
    }
    $this->_dts['data_list'] = $this->angsuran->ambilDataDenganKondisi(["id_transaksi" => $_SESSION['id_transaksi_terpilih']]); // Proses pengambilan data dari database
		$this->view('angsuran', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->angsuran->tambahData($this->input->post(NULL, true));
    header("Location: ".site_url("admin/angsuran")."?no_registrasi=".$this->input->post("no_registrasi")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->angsuran->ubahData($this->input->post("id"), $this->input->post(NULL, true));
    header("Location: ".site_url("admin/angsuran")."?no_registrasi=".$this->input->post("no_registrasi")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->angsuran->hapusData($this->input->get('id')); // Proses hapus data
    header("Location: ".site_url("admin/angsuran")); // // Arahkan user kembali ke halaman daftar
  }
}
