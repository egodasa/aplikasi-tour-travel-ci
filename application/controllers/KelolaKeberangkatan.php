<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaKeberangkatan extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelProgram", "master_program");
    $this->load->model("ModelJenisProgram", "program");
    $this->load->model("ModelKeberangkatan", "keberangkatan");
    $this->load->model("ModelPesertaKeberangkatan", "peserta_keberangkatan");
  }
  
  //  Method untuk menampilkan data
	public function daftar()
	{
    $this->_dts['data_list'] = $this->keberangkatan->ambilData();  // Proses pengambilan data dari database
    $this->_dts['data_master_program'] = $this->program->ambilData();
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
  public function daftarPesertaKeberangkatan()
  {
    $id_keberangkatan = $this->input->get('id_keberangkatan');
    $this->_dts['data_list'] = $this->peserta_keberangkatan->ambilDataDenganKondisi(["id_keberangkatan" => $id_keberangkatan]);
    $this->_dts['detail_keberangkatan'] = $this->keberangkatan->ambilData($id_keberangkatan);
    $this->_dts['data_peserta'] = $this->peserta_keberangkatan->dataPesertaBelumBerangkat($this->_dts['detail_keberangkatan']['id_jenis']);
    $this->view('pesertakeberangkatan', $this->_dts); // Oper data dari database ke view
  }
  
  public function tambahDataPesertaKeberangkatan()
  {
    $data = $this->input->post(NULL, true);
    $data_keberangkatan = $this->keberangkatan->ambilData($data['id_keberangkatan']);
    $data_peserta_keberangkatan = $this->peserta_keberangkatan->ambilDataDenganKondisi(["id_keberangkatan" => $data['id_keberangkatan']]);
    $kuota = $data_keberangkatan['kuota'];
    $total_peserta = count($data_peserta_keberangkatan) + count($data['id_peserta_transaksi']);
    
    if($total_peserta > $kuota)
    {
    	notifikasi("Peringatan", "Data peserta melebihi kuota keberangkatan", "warning");
    }
    else
    {
  		foreach($data['id_peserta_transaksi'] AS $id)
	    {
	      $this->peserta_keberangkatan->tambahData([
	        "id_peserta_transaksi" => $id,
	        "id_keberangkatan" => $data['id_keberangkatan']
	      ]);
	    }
	    notifikasi("Pesan", "Data peserta berhasil ditambahkan", "success");
    }
    header("Location: ".site_url("peserta-keberangkatan?id_keberangkatan=".$data['id_keberangkatan']));
  }
  public function hapusPesertaKeberangkatan()
  {
    $data = $this->input->get(NULL, true);
    $this->peserta_keberangkatan->hapusData($data['id']);
    notifikasi("Pesan", "Data peserta berhasil dihapus", "success");
    header("Location: ".site_url("peserta-keberangkatan?id_keberangkatan=".$data['id_keberangkatan']));
    
  }
}
