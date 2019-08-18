<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelProgram extends MY_Model {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tb_program";
    $this->primaryKey = "id";
    $this->relasiTabel = null;
    $this->kolomBawaanCrud = ["nama_program", "kuota"];
  }
}
