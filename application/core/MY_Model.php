<?php
use Medoo\Medoo;

class MY_Model extends CI_Model {
	protected $db;
  function __construct()
  {
    parent::__construct();
    $this->db = new Medoo([
      'database_type' => 'mysql',
      'database_name' => 'db_travel',
      'server' => 'localhost',
      'username' => 'root',
      'password' => 'mysql'
    ]);
  }
}
