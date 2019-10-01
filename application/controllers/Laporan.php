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
    $bulan = $this->input->get("bulan");
    $tahun = $this->input->get("tahun");
    $waktu = $tahun."-".$bulan;
    $this->_dts['data_list'] = $this->db->query("SELECT * FROM data_peserta_keberangkatan WHERE
    LEFT(tgl_berangkat, 7) = :waktu AND id_jenis = :id_program", [":waktu" => $waktu, "id_program" => $id_program])->fetchAll(PDO::FETCH_ASSOC);
		
		$this->_dts['judul'] = strtoupper(bulanIndo($bulan)." ".$tahun);
		
		$data_jenis = $this->db->get("data_jenis_program", "*", ["id" => $id_program]);
    $this->_dts['jenis'] = strtoupper($data_jenis['nama_program']);
    
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
    $bulan = $this->input->get("bulan");
    $tahun = $this->input->get("tahun");
    $waktu = $tahun."-".$bulan;
    $this->_dts['data_list'] = $this->db->query("SELECT * FROM data_peserta_transaksi WHERE
    LEFT(tgl_daftar, 7) = :waktu AND id_jenis = :id_program", [":waktu" => $waktu, "id_program" => $id_program])->fetchAll(PDO::FETCH_ASSOC);
		
		$this->_dts['judul'] = strtoupper(bulanIndo($bulan)." ".$tahun);
     
    $data_jenis = $this->db->get("data_jenis_program", "*", ["id" => $id_program]);
    $this->_dts['jenis'] = strtoupper($data_jenis['nama_program']);
     
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
    $bulan = $this->input->get("bulan");
    $tahun = $this->input->get("tahun");
    $waktu = $tahun."-".$bulan;
    $this->_dts['data_list'] = $this->db->query("SELECT * FROM laporan_data_transaksi WHERE
    LEFT(tgl_bayar, 7) = :waktu AND id_jenis = :id_program", [":waktu" => $waktu, "id_program" => $id_program])->fetchAll(PDO::FETCH_ASSOC);
		
		$this->_dts['judul'] = strtoupper(bulanIndo($bulan)." ".$tahun);
		
		$data_jenis = $this->db->get("data_jenis_program", "*", ["id" => $id_program]);
    $this->_dts['jenis'] = strtoupper($data_jenis['nama_program']);
		
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
