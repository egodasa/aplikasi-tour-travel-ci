<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPengguna extends MY_Model {
  
  function __construct()
  {
    parent::__construct();
    $this->tabel = "tb_pengguna";
    $this->primaryKey = "id";
    $this->relasiTabel = null;
    $this->kolomBawaanCrud = [
      "username" ,
      "password" ,
      "email" ,
      "nohp" ,
      "level"
    ];
  }
  public function register($data)
  {
    $this->db->insert($this->tabel, [
      "username"  =>  $data["username"],
      "password"  =>  $data["password"],
      "email"  =>  $data["email"], 
      "nohp"  =>  $data["nohp"],  
      "level"  => "Member" 
    ]);
    return $this->db->id();
  }
}
