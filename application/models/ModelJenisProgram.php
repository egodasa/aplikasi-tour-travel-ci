<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelJenisProgram extends MY_Model {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tb_jenis_program";
    $this->primaryKey = "id";
    $this->kolomBawaanCrud = ["nm_jenis", "id_program", "harga"];
    $this->view = "data_jenis_program";
  }
}
