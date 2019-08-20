<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaPesertaTransaksi extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelPeserta", "peserta");
    $this->load->model("ModelTransaksi", "transaksi");
    $this->load->model("ModelPesertaTransaksi", "peserta_transaksi");
    $this->load->model("ModelKota", "kota");
  }
  
  //  Method untuk menampilkan data
	public function daftar()
	{
    if(!empty($this->input->get("id_transaksi")))
    {
      $_SESSION['id_transaksi_terpilih'] = $this->input->get("id_transaksi");
    }
    $this->_dts['data_transaksi'] =   $this->transaksi->ambilData($_SESSION['id_transaksi_terpilih']);
    $this->_dts['data_list'] =   $this->peserta_transaksi->ambilDataDenganKondisi(["id_transaksi" => $_SESSION['id_transaksi_terpilih']]);
    $this->_dts['data_kota'] = $this->kota->ambilData();
		$this->view('pesertatransaksi', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $data = $this->input->post(NULL, TRUE);
    // masukkan data peserta ke tabel peserta terlebih dahulu dan ambil idnya
    $id_peserta = $this->peserta->tambahData($data);
    $data['id_peserta'] = $id_peserta;
    $this->peserta_transaksi->tambahData($data);
    header("Location: ".site_url("peserta-transaksi")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->peserta->ubahData($this->input->post("id_peserta"), $this->input->post(NULL, TRUE));
    $this->peserta_transaksi->ubahData($this->input->post("id"), $this->input->post(NULL, TRUE));
    header("Location: ".site_url("peserta-transaksi")); // Arahkan user kembali ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->peserta->hapusData($this->input->get('id_peserta')); // Proses hapus data
    header("Location: ".site_url("peserta-transaksi")); // // Arahkan user kembali ke halaman daftar
  }
}
