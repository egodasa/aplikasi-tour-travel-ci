<?php
session_start();
use Dompdf\Dompdf;
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
    
    $content = $this->renderView('laporan_peserta_keberangkatan', $this->_dts);
    $dompdf = new Dompdf();
    $dompdf->loadHtml($content);
    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');
    
    // Render the HTML as PDF
    $dompdf->render();
    
    $dompdf->stream("laporan_peserta_keberangkatan.pdf", array("Attachment" => false));
    exit(0);
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
     
    $content = $this->renderView('laporan_peserta', $this->_dts);
    $dompdf = new Dompdf();
    $dompdf->loadHtml($content);
    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');
    
    // Render the HTML as PDF
    $dompdf->render();
    
    $dompdf->stream("laporan_peserta.pdf", array("Attachment" => false));
    exit(0);
    
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
    
    $content = $this->renderView('laporan_transaksi', $this->_dts);
    
    $dompdf = new Dompdf();
    $dompdf->loadHtml($content);
    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');
    
    // Render the HTML as PDF
    $dompdf->render();
    
    $dompdf->stream("laporan_transaksi.pdf", array("Attachment" => false));
    exit(0);
    
	}
  public function buktiAngsuran()
  {
    $id_transaksi = $this->input->get("id_transaksi");
    $this->_dts['detail_transaksi'] = $this->transaksi->ambilData($id_transaksi); 
    $this->_dts['data_list'] = $this->angsuran->ambilDataDenganKondisi(["id_transaksi" => $id_transaksi]); 
    
    $content = $this->renderView('bukti_angsuran', $this->_dts);
    $dompdf = new Dompdf();
    $dompdf->loadHtml($content);
    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');
    
    // Render the HTML as PDF
    $dompdf->render();
    
    $dompdf->stream("bukti_angsuran.pdf", array("Attachment" => false));
    exit(0);
  }
}
