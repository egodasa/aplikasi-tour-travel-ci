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
		$this->view('admin.keberangkatan.daftar', $this->_dts); // Oper data dari database ke view
	}
  
  public function daftarJadwalKeberangkatan()
  {
    $this->_dts['data_list'] = $this->keberangkatan->ambilData();  // Proses pengambilan data dari database
    $this->_dts['data_program'] = $this->program->ambilData();
		$this->view('member.keberangkatan.daftar', $this->_dts); // Oper data dari database ke view
  }
  
  // Method untuk menampilkan form tambah data
  public function tambahData()
  {
    $this->_dts['data_program'] = $this->program->ambilData();
    $this->view('admin.keberangkatan.tambah', $this->_dts); // Langsung tampilkan view tambah data
  }
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->keberangkatan->tambahData($this->input->post(NULL, TRUE));
    header("Location: ".site_url("admin/keberangkatan")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk menampilkan form edit
  public function ubahData()
  {
    $this->_dts['data_program'] = $this->program->ambilData();
    $this->_dts['detail'] = $this->keberangkatan->ambilData($this->input->get('id')); // Ambil data yang akan diedit berdasarkan ID
    $this->view('admin.keberangkatan.edit', $this->_dts); // Oper data ke view
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->keberangkatan->ubahData($this->input->post("id"), $this->input->post(NULL, TRUE));
    header("Location: ".site_url("admin/keberangkatan")); // Arahkan user kembali ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->keberangkatan->hapusData($this->input->get('id')); // Proses hapus data
    header("Location: ".site_url("admin/keberangkatan")); // // Arahkan user kembali ke halaman daftar
  }
  
  public function pesertaKeberangkatan()
  {
    $this->_dts['detail_jadwal'] = $this->keberangkatan->ambilData($this->input->get('id')); // Proses hapus data
    $this->_dts['data_list'] = $this->jadwal->pesertaKeberangkatan($this->input->get('id')); // Proses hapus data
    $this->view('member.keberangkatan.pesertakeberangkatan', $this->_dts);
  }
  
  public function kelolaPesertaKeberangkatan()
  {
    $this->_dts['detail_jadwal'] = $this->keberangkatan->ambilData($this->input->get('id')); // Proses hapus data
    $this->_dts['data_list'] = $this->jadwal->pesertaKeberangkatan($this->input->get('id')); // Proses hapus data
    $this->view('admin.keberangkatan.pesertakeberangkatan', $this->_dts);
  }
  
  public function hapusPesertaKeberangkatan()
  {
    $this->jadwal->hapusData($this->input->get('keberangkatan_keberangkatan'));
    header("Location: ".site_url("admin/keberangkatan/peserta?id=".$this->input->get('id')));
  }
}
