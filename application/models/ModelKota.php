<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelKota extends MY_Model {
  function __construct()
  {
    $this->tabel = "tb_kota";
    $this->primaryKey = "id";
    parent::__construct();
  }
}
