<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPengguna extends MY_Model {
  
  function __construct()
  {
    $this->tabel = "tb_pengguna";
    $this->primaryKey = "id";
    $this->relasiTabel = null;
    $this->kolomBawaanCrud = [
      "username"  =>  $this->data["username"],
      "password"  =>  $this->data["password"],
      "email"  =>  $this->data["email"], 
      "nohp"  =>  $this->data["nohp"],  
      "level"  =>  $this->data["level"] 
    ];
  }
}
