<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPesertaTransaksi extends MY_Model {
  function __construct()
  {
    parent::__construct(); 
    $this->tabel = "tb_peserta_transaksi";
    $this->primaryKey = "id";
    $this->kolomBawaanCrud = [
      "id_peserta"   ,
      "id_transaksi" ,  
      "status"       ,
      "keterangan"  
    ];
    $this->view = "data_peserta_transaksi"; 
  }
}
