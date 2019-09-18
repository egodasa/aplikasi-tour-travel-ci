<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelKeberangkatan extends MY_Model {
  
  function __construct()
  {
    $this->tabel = "tb_keberangkatan";
    $this->primaryKey = "id";
    $this->kolomBawaanCrud = [
      "tgl_berangkat"  ,
      "nama_maskapai"  ,
      "id_jenis"  ,
      "status"  ,
      "keterangan",
      "kuota"
    ];
    $this->view = "data_keberangkatan";
    parent::__construct();
  }
}
