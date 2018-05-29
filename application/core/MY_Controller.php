<?php
use Philo\Blade\Blade; // Register blade template engine
use Illuminate\Database\Capsule\Manager as DB; //register eloquent

class MY_Controller extends CI_Controller {
	protected $views = 'application/views'; //Lokasi views
	protected $cache = 'application/cache'; //lokasi cache views
	protected $blade;
	protected $capsule;
	protected $db;
	
    function __construct()
    {
        parent::__construct();
        $this->blade = new Blade($this->views, $this->cache);  //buat objek blade
        $this->capsule = new DB;
		$this->capsule->addConnection([ //pengaturan database
		    'driver'    => 'mysql',
		    'host'      => '127.0.0.1',
		    'database'  => 'dbmevit',
		    'username'  => 'root',
		    'password'  => '',
		    'charset'   => 'utf8',
		    'collation' => 'utf8_unicode_ci',
		    'prefix'    => ''
		]);
		$this->capsule->setAsGlobal();
		$this->capsule->bootEloquent();
    }
    public function view($name, $data = []){
		return $this->blade->view()->make($name, $data)->render();
	}
}
