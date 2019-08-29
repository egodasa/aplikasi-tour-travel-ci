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
  public function caraHaji()
  {
    $this->view("frontend.carahaji");
  }
  public function caraUmroh()
  {
    $this->view("frontend.caraumroh");
  }
  
  public function infoWisata()
  {
    $this->view("frontend.infowisata");
  }
  
  public function persyaratanHaji()
  {
    $this->view("frontend.persyaratanhaji");
  }
  public function persyaratanUmroh()
  {
    $this->view("frontend.persyaratanumroh");
  }
  public function persyaratanWisata()
  {
    $this->view("frontend.persyaratanwisata");
  }
  
  public function pendaftaranHaji()
  {
    $this->view("frontend.pendaftaranhaji");
  }
  public function pendaftaranUmroh()
  {
    $this->view("frontend.pendaftaranumroh");
  }
  public function pendaftaranWisata()
  {
    $this->view("frontend.pendaftaranwisata");
  }
  
}
