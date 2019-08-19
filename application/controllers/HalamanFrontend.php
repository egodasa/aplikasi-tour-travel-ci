<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class HalamanFrontend extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
  }
  
  public function home()
  {
    $this->view("frontend.index");
  }
  public function haji()
  {
    $this->view("frontend.haji");
  }
  public function umroh()
  {
    $this->view("frontend.umroh");
  }
  public function wisata()
  {
    $this->view("frontend.wisata");
  }
  
}
