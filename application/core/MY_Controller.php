<?php
use Philo\Blade\Blade; // Register blade template engine
use Medoo\Medoo;

class MY_Controller extends CI_Controller {
	protected $views = 'application/views'; //Lokasi views
	protected $cache = 'application/cache'; //lokasi cache views
	protected $blade;
	protected $db;
	protected $_dts;
  function __construct()
  {
    parent::__construct();
    $this->_dts = [];
    $this->blade = new Blade($this->views, $this->cache);  //buat objek blade
    $this->db = new Medoo([
      'database_type' => 'mysql',
      'database_name' => 'db_travel',
      'server' => 'localhost',
      'username' => 'root',
      'password' => 'mysql'
    ]);
  }
  public function view($name, $data = [])
  {
    echo $this->blade->view()->make($name, $data)->render();
  }
}
