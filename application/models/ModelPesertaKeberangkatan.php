<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPesertaKeberangkatan extends MY_Model {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tb_peserta_keberangkatan";
    $this->primaryKey = "id";
    $this->kolomBawaanCrud = [
      "id_peserta_transaksi",
      "id_keberangkatan"
    ];
    $this->view = "data_peserta_keberangkatan";
  } 
  public function dataPesertaBelumBerangkat($id_jenis)
  {
    return $this->db->query("SELECT * FROM data_peserta_transaksi WHERE id_jenis = ".$id_jenis." AND total_bayar = sudah_dibayar AND id NOT IN (SELECT id_peserta_transaksi FROM data_peserta_keberangkatan)")->fetchAll(PDO::FETCH_ASSOC);
  }
}
