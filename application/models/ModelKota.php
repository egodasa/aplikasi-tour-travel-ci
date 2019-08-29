<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelKota extends MY_Model {
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tb_kota";
    $this->primaryKey = "id";
  }
}
