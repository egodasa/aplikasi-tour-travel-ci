<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelProvinsi extends MY_Model {
  function __construct()
  {
    $this->tabel = "tb_provinsi";
    $this->primaryKey = "id";
    parent::__construct();
  }
}
