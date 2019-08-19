<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAngsuran extends MY_Model {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tb_angsuran";
    $this->primaryKey = "id";
    $this->kolomBawaanCrud = [
      "id_transaksi"     ,
      "tgl_bayar"        ,
      "juml_bayar"       ,
      "jenis_pembayaran" ,
      "keterangan"       ,
      "status_pembayaran"
    ];
    $this->view = "data_angsuran";
  }
}
