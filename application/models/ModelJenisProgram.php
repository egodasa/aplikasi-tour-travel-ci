<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelJenisProgram extends MY_Model {
  function __construct()
  {
    $this->tabel = "tb_jenis_program";
    $this->primaryKey = "id";
    $this->relasi_tabel = "[><]tb_program" => ["id_program" => "id"];
    $this->kolom_bawaan_crud = [
      "nm_jenis"  =>  $this->data["nm_jenis"],
      "id_program"  =>  $this->data["id_program"],
      "harga"  =>  $this->data["harga"]
    ];
  }
}
