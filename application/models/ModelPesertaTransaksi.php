<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTransaksi extends MY_Model {
  function __construct()
  {
    $this->tabel = "tb_peserta_transaksi";
    $this->primaryKey = "id";
    $this->relasiTabel = [
      "[><]tb_transaksi" => ["id_transaksi" => "id"],
      "[><]tb_peserta" => ["id_peserta" => "id"]
    ];
    $this->kolomBawaanCrud = [
      "id_peserta"  =>  $this->data["id_peserta"], 
      "id_transaksi"  =>  $this->data["id_transaksi"],  
      "status"  =>  $this->data["status"],  
      "keterangan"  =>  $this->data["keterangan"]  
    ];
  }
  public function batalkanTransaksi($idTransaksi)
  {
    $this->db->update($this->tabel, ["status" => "Dibatalkan"], [$this->primaryKey => $idTransaksi]);
  }
}
