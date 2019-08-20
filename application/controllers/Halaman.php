<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman extends MY_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model("ModelPengguna", "pengguna");
  }
  
  public function beranda()
  {
    $this->view("beranda");
  }
  
  public function login()
  {
    cekLogin();
    $this->view('login');
  }
  public function prosesLogin()
  {
    $cek = $this->pengguna->ambilDataDenganKondisi(["username" => $this->input->post('username'), "password" => $this->input->post('password')]);
    if(count($cek) == 0)
    {
      notifikasi("Peringatan", "Username atau password salah!", "danger");
      header('Location: '.site_url('login'));
    }
    else
    {
      $_SESSION = $cek[0];
      header('Location: '.site_url('beranda'));
      notifikasi("Pesan", "Anda berhasil login", "success");
      
    }
  }
  public function register()
  {
    cekLogin();
    $this->view('register');
  }
  public function prosesRegister()
  {
    $cek = $this->pengguna->ambilDataDenganKondisi(["OR" => ["email" => $this->input->post("email"), "username" => $this->input->post("username")]]);
    if(count($cek) > 0)
    {
      notifikasi("Registrasi gagal!", "Username atau email sudah pernah digunakan!", "warning");
      header("Location: ".site_url("register"));
    }
    else
    {
      $this->pengguna->register($this->input->post(NULL, TRUE));
      notifikasi("Registrasi berhasil.", "Anda sudah bisa login sekarang.", "success");
      header("Location: ".site_url("login"));
    }
  }
  public function prosesLogout()
  {
    unset($_SESSION['username']);
    notifikasi("Pesan", "Anda berhasil logout", "success");
    header('Location: '.site_url('login'));
  }
  public function dilarang()
  {
    $this->view('dilarang');
  }
}
