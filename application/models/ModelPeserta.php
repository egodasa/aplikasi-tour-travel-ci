<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPeserta extends MY_Model {
  function __construct()
  {
    $this->tabel = "tb_peserta";
    $this->primaryKey = "id";
    $this->relasiTabel = null;
    $this->kolomBawaanCrud = [
      "nama_lengkap"   ,
      "nama_panggilan" ,
      "jenis_kelamin"  ,
      "id_pengguna"    ,
      "no_identitas"   ,
      "tempat_lahir"   ,
      "tgl_lahir"      ,
      "alamat"         ,
      "kel"            ,
      "tlp_rumah"      ,
      "tlp_kantor"     ,
      "nohp"           ,
      "email"          ,
      "warga_negara"   ,
      "pekerjaan"      ,
      "ukuran_baju"    ,
      "nama_ahliwaris" ,
      "hubungan_ahliwaris" ,
      "jk_ahliwaris"       ,
      "kode_pos"           ,
      "rt"                 ,
      "rw"                 
    ];
    $this->view = "data_peserta";
    parent::__construct();
  }
  
}
