<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTransaksi extends MY_Model {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tb_transaksi";
    $this->primaryKey = "id";
    $this->kolomBawaanCrud = [
      "id_jenis" ,  
      "dp" ,  
      "id_pengguna" ,  
      "status"   
    ];
    $this->view = "data_transaksi";
  }
  public function batalkanTransaksi($idTransaksi)
  {
    $this->db->update($this->tabel, ["status" => "Dibatalkan"], [$this->primaryKey => $idTransaksi]);
  }
}
