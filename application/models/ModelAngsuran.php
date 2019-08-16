<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAngsuran extends MY_Model {
  function __construct()
  {
    $this->tabel = "tb_angsuran";
    $this->primaryKey = "id";
    $this->relasiTabel = [
      "[><]tb_transaksi" => ["id_transaksi" => "id"],
      "[><]tb_peserta" => ["id_peserta" => "id"],
      "[><]tb_pengguna" => ["tb_peserta.id_peserta" => "id"]
    ];
    $this->kolomBawaanCrud = [
      "id_transaksi"  =>  $this->["id_transaksi"], 
      "tgl_bayar"  =>  $this->["tgl_bayar"], 
      "juml_bayar"  =>  $this->["juml_bayar"], 
      "jenis_pembayaran"  =>  $this->["jenis_pembayaran"], 
      "keterangan"  =>  $this->["keterangan"], 
      "status_pembayaran"  =>  $this->["status_pembayaran"] 
    ];
  }
}
