<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contoh extends MY_Controller {

	public function index()
	{
		$this->view('components.contoh_halaman_admin');
	}
}
