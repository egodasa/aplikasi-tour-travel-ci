<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function beranda()
	{
		return $this->view('beranda');
	}
}
