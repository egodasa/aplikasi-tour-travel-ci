<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaTransaksi extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelJenisProgram", "program");
    $this->load->model("ModelKota", "kota");
    $this->load->model("ModelTransaksi", "transaksi");
    $this->load->model("ModelPelanggan", "pelanggan");
  }
  
  //  Method untuk menampilkan data
	public function daftar()
	{
    $this->_dts['data_list'] = $this->transaksi->data();
		$this->view('admin.transaksi.daftar', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk menampilkan form tambah data
  public function tambah()
  {
    $this->_dts['data_kota'] = $this->kota->data();
    $this->_dts['data_program'] = $this->program->data();
    $this->view('admin.transaksi.tambah', $this->_dts); // Langsung tampilkan view tambah data
  }
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->transaksi->tambahTransaksi($this->input->post(NULL, true));
    header("Location: ".site_url("transaksi")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk menampilkan form edit
  public function edit()
  {
    $this->_dts['data_kota'] = $this->kota->data();
    $this->_dts['data_program'] = $this->program->data();
    $detail_transaksi = $this->transaksi->data($this->input->get('no_registrasi'));
    $detail_pelanggan = $this->pelanggan->data($detail_transaksi['id_pelanggan']);
    $this->_dts['detail'] = array_merge($detail_pelanggan, $detail_transaksi);
    $this->view('admin.transaksi.edit', $this->_dts); // Oper data ke view
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->transaksi->editTransaksi($this->input->post("no_registrasi"), $this->input->post(NULL, true));
    header("Location: ".site_url("transaksi")); // Arahkan user kembali ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->transaksi->hapus($this->input->get('no_registrasi')); // Proses hapus data
    header("Location: ".site_url("transaksi")); // // Arahkan user kembali ke halaman daftar
  }
}
