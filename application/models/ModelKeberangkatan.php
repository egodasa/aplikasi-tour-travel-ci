<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelKeberangkatan extends MY_Model {
  
  function __construct()
  {
    $this->tabel = "tb_keberangkatan";
    $this->primaryKey = "id";
    $this->relasiTabel = [
      "[><]tb_jenis_program" => ["id_jenis" => "id"]
    ];
    $this->kolomBawaanCrud = [
      "tgl_berangkat"  =>  $this->data["tgl_berangkat"],  // Proses penambahan data (insert)
      "nama_maskapai"  =>  $this->data["nama_maskapai"],  // Proses penambahan data (insert)
      "id_jenis"  =>  $this->data["id_jenis"]
      "status"  =>  $this->data["status"]
      "keterangan"  =>  $this->data["keterangan"]
    ];
  }
}
