<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPeserta extends MY_Model {
  function __construct()
  {
    $this->tabel = "tb_peserta";
    $this->primaryKey = "id";
    $this->relasi_tabel = [
      "[><]tb_pengguna" => ["id_pengguna" => "id"],
      "[><]tb_kota" => ["tempat_lahir" => "id"]
    ];
    $this->kolom_bawaan_crud = [
      "nama_lengkap"  =>  $this->data["nama_lengkap"],  
      "nama_panggilan"  =>  $this->data["nama_panggilan"], 
      "jenis_kelamin"  =>  $this->data["jenis_kelamin"],  
      "id_pengguna"  =>  $this->data["id_pengguna"],  
      "no_identitas"  =>  $this->data["no_identitas"],  
      "tempat_lahir"  =>  $this->data["tempat_lahir"],  
      "tgl_lahir"  =>  $this->data["tgl_lahir"],  
      "alamat"  =>  $this->data["alamat"],  
      "kel"  =>  $this->data["kel"],  
      "tlp_rumah"  =>  $this->data["tlp_rumah"],  
      "tlp_kantor"  =>  $this->data["tlp_kantor"],  
      "nohp"  =>  $this->data["nohp"],  
      "email"  =>  $this->data["email"],  
      "warga_negara"  =>  $this->data["warga_negara"],  
      "pekerjaan"  =>  $this->data["pekerjaan"],  
      "ukuran_baju"  =>  $this->data["ukuran_baju"],  
      "nama_ahliwaris"  =>  $this->data["nama_ahliwaris"],  
      "hubungan_ahliwaris"  =>  $this->data["hubungan_ahliwaris"],  
      "jk_ahliwaris"  =>  $this->data["jk_ahliwaris"],  
      "kode_pos"  =>  $this->data["kode_pos"],  
      "rt"  =>  $this->data["rt"], 
      "rw"  =>  $this->data["rw"]  
    ];
  }
  
}
