<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelProgram extends MY_Model {
  function __construct()
  {
    $this->tabel = "tb_jenis_program";
    $this->primaryKey = "id";
    $this->relasiTabel = null;
    $this->kolomBawaanCrud = [
      "nama_program" => $this->data["nama_program"]
    ];
  }
}
