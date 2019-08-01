<?php
use Medoo\Medoo;

class MY_Controller extends CI_Controller {
	protected $db;
  function __construct()
  {
    parent::__construct();
    $this->dbs = new Medoo([
      'database_type' => 'mysql',
      'database_name' => 'db_travel',
      'server' => 'localhost',
      'username' => 'root',
      'password' => 'mysql'
    ]);
  }
}
