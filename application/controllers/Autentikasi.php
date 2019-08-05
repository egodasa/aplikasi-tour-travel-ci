<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentikasi extends MY_Controller {
  public function login()
  {
    if(isset($_SESSION['username']))
    {
      header('Location: '.site_url('transaksi'));
    }
    else
    {
      $this->view('login');
    }
  }
  public function prosesLogin()
  {
    $cek = $this->db->get("tb_pengguna", ['username', 'level', 'email', 'nohp'], ['username' => $this->input->post('username'), 'password' => $this->input->post('password')]);
    if(empty($cek))
    {
      header('Location: '.site_url('login?salah=true'));
    }
    else
    {
      $_SESSION = $cek;
      header('Location: '.site_url('transaksi'));
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
    $cek = $this->db->get('tb_pengguna', "username", ['username' => $this->input->post('username'), ["OR" => ['email' => $this->input->post('email')]]]);
    if(!empty($cek))
    {
      header("Location: ".site_url("register?username=false"));
    }
    else
    {
      $this->db->insert("tb_pengguna", [
        "username" => $this->input->post('username'),
        "password" => $this->input->post('password'),
        "email" => $this->input->post('email'),
        "nohp" => $this->input->post('nohp'),
        "level" => "Member"
      ]);
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
