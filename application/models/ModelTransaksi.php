<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTransaksi extends MY_Model {
  function __construct()
  {
    $this->tabel = "tb_transaksi";
    $this->primaryKey = "id";
    $this->relasi_tabel = [
      "[><]tb_jenis_program" => ["id_jenis" => "id"],
      "[><]tb_program" => ["tb_jenis_program.id_program" => "id"],
      "[><]tb_peserta" => ["id_peserta" => "id"],
      "[><]tb_pengguna" => ["tb_peserta.id_peserta" => "id"]
    ];
    $this->kolom_bawaan_crud = [
      "id_jenis"  =>  $this->data["id_jenis"],  
      "id_peserta"  =>  $this->data["id_jenis"],  
      "dp"  =>  $this->data["dp"],  
      "status"  =>  $this->data["status"]  
    ];
  }
}
