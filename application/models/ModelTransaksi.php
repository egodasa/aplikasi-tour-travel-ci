<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTransaksi extends MY_Model {
  function __construct()
  {
    $this->tabel = "tb_transaksi";
    $this->primaryKey = "id";
    $this->relasiTabel = [
      "[><]tb_jenis_program" => ["id_jenis" => "id"],
      "[><]tb_program" => ["tb_jenis_program.id_program" => "id"],
      "[><]tb_group_peserta" => ["id_transaksi" => "id"],
      "[><]tb_pengguna" => ["id_pengguna" => "id"]
    ];
    $this->kolomBawaanCrud = [
      "id_jenis"  =>  $this->data["id_jenis"],  
      "dp"  =>  $this->data["dp"],  
      "id_pengguna"  =>  $this->data["id_pengguna"],  
      "status"  =>  $this->data["status"]  
    ];
  }
  public function batalkanTransaksi($idTransaksi)
  {
    $this->db->update($this->tabel, ["status" => "Dibatalkan"], [$this->primaryKey => $idTransaksi]);
  }
}
