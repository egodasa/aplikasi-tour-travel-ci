<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelPesertaKeberangkatan", "peserta_keberangkatan");
    $this->load->model("ModelPesertaTransaksi", "peserta_transaksi");
    $this->load->model("ModelTransaksi", "transaksi");
    $this->load->model("ModelAngsuran", "angsuran");
  }
  
	public function laporanPesertaKeberangkatan()
	{
    $id_program = $this->input->get("id_program");
    if($id_program)
    {
      $this->_dts['data_list'] = $this->peserta_keberangkatan->ambilDataDenganKondisi(['id_program' => $id_program]);
    }
    else
    {
      $this->_dts['data_list'] = $this->peserta_keberangkatan->ambilData();
    }
		$this->view('laporan_peserta_keberangkatan', $this->_dts); // Oper data dari database ke view
	}
	public function laporanPeserta()
	{
    $id_program = $this->input->get("id_program");
    if($id_program)
    {
      $this->_dts['data_list'] = $this->peserta_transaksi->ambilDataDenganKondisi(['id_program' => $id_program]);
    }
    else
    {
      $this->_dts['data_list'] = $this->peserta_transaksi->ambilData();
    }
     
		$this->view('laporan_peserta', $this->_dts); // Oper data dari database ke view
	}
	public function laporanTransaksi()
	{
    $id_program = $this->input->get("id_program");
    if($id_program)
    {
      $this->_dts['data_list'] = $this->transaksi->ambilDataDenganKondisi(['id_program' => $id_program]);
    }
    else
    {
      $this->_dts['data_list'] = $this->transaksi->ambilData();
    }
     
		$this->view('laporan_transaksi', $this->_dts); // Oper data dari database ke view
	}
  public function buktiAngsuran()
  {
    $id_transaksi = $this->input->get("id_transaksi");
    $this->_dts['detail_transaksi'] = $this->transaksi->ambilData($id_transaksi); 
    $this->_dts['data_list'] = $this->angsuran->ambilDataDenganKondisi(["id_transaksi" => $id_transaksi]); 
		$this->view('bukti_angsuran', $this->_dts); // Oper data dari database ke view
  }
}
