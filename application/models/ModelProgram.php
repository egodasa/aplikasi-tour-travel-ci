<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelProgram extends MY_Model {
  function __construct()
  {
    $this->tabel = "tb_jenis_program";
    $this->primaryKey = "id";
    $this->relasi_tabel = null;
    $this->kolom_bawaan_crud = [
      "nama_program" => $this->data["nama_program"]
    ];
  }
}
