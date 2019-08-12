<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentikasi extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelPengguna", "pengguna");
  }
  
  public function login()
  {
    if(isset($_SESSION['username']))
    {
      header('Location: '.site_url('beranda'));
    }
    else
    {
      $this->view('login');
    }
  }
  public function prosesLogin()
  {
    $cek = $this->pengguna->cekLogin($this->input->post('username'), $this->input->post('password'));
    if(empty($cek))
    {
      header('Location: '.site_url('login?salah=true'));
    }
    else
    {
      $_SESSION = $cek;
      header('Location: '.site_url('beranda'));
    }
  }
  public function register()
  {
    if(isset($_SESSION['username']))
    {
      header('Location: '.site_url('transaksi'));
    }
    else
    {
      $this->view('register');
    }
  }
  public function prosesRegister()
  {
    $proses = $this->pengguna->register($this->input->post(NULL, TRUE));
    if(!$proses)
    {
      header("Location: ".site_url("register?username=false"));
    }
    else
    {
      header("Location: ".site_url("login?login=true"));
    }
  }
  public function prosesLogout()
  {
    session_destroy();
    header('Location: '.site_url('login?logout=true'));
  }
  public function dilarang()
  {
    $this->view('dilarang');
  }
}
