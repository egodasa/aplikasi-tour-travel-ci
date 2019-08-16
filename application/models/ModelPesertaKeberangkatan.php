<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPesertaKeberangkatan extends MY_Model {
  function __construct()
  {
    $this->tabel = "tb_peserta_keberangkatan";
    $this->primaryKey = "id";
    $this->relasiTabel = [
      "[><]tb_transaksi" => ["id_transaksi" => "id"],
      "[><]tb_keberangkatan" => ["id_keberangkatan" => "id"],
      "[><]tb_peserta" => ["tb_transaksi.id_peserta" => "id"],
      "[><]tb_jenis_program" => ["tb_transaksi.id_jenis" => "id"],
      "[><]tb_program" => ["tb_jenis_program.id_program" => "id"]
    ];
    $this->kolomBawaanCrud = [
      "tgl_berangkat"  =>  $this->data["tgl_berangkat"],  
      "nama_maskapai"  =>  $this->data["nama_maskapai"],  
      "id_jenis"  =>  $this->data["id_jenis"],  
      "keterangan"  =>  $this->data["keterangan"],  
      "status"  =>  $this->data["status"]  
    ];
  } 
}
