<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');
use Coreproc\CryptoGuard\CryptoGuard;

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
    	$data_pengguna = $cek[0];
    	if($data_pengguna['status'] != "Aktif")
    	{
    		notifikasi("Login gagal", "Akun Anda belum aktif. Silahkan lakukan konfirmasi registrasi terlebih dahulu", "warning");
    		header('Location: '.site_url('login'));
    	}
    	else
    	{
    		$_SESSION = $data_pengguna;
    		notifikasi("Pesan", "Anda berhasil login", "success");
	      header('Location: '.site_url('beranda'));	
    	}
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
    	$data_pengguna = $this->input->post(NULL, TRUE);
    	$data_pengguna['status'] = "Tidak Aktif";
    	
      $this->pengguna->register($data_pengguna);

			$cryptoGuard = new CryptoGuard(base_url().site_url());

			$token = $cryptoGuard->encrypt($this->input->post('username'));

			// echo $cryptoGuard->decrypt($token);

       //kode untuk mengirim konfirmasi email
    	$from = "noreply@aisyah-travel-tour.dafma.id";
    	$to = $this->input->post("email");
    	$subject = "Konfirmasi Registrasi";
    	$message = "Silahkan klik atau akses URL BERIKUT ".site_url('registrasi/konfirmasi?token='.$token)." untuk melakukan konfirmasi registrasi pada website Aisyah Tour & Travel";
    	$headers = "From:" . $from;
    	mail($to,$subject,$message, $headers);	
    	
      notifikasi("Registrasi berhasil.", "Silahkan cek email Anda untuk melakukan konfirmasi registrasi", "success");
      header("Location: ".site_url("login"));
    }
  }
  public function konfirmasiRegistrasi()
  {
  	if(isset($_GET['token']))
  	{
  		$token = $_GET['token'];
  		$cryptoGuard = new CryptoGuard(base_url().site_url());
			$username = $cryptoGuard->decrypt($token);
			$data_pengguna = $this->pengguna->ambilDataDenganKondisi(["username" => $username]);
			
			if(empty($data_pengguna))
			{
				notifikasi("Konfirmasi Registrasi Gagal", "Token konfirmasi registrasi Anda salah", "danger");
				header("Location: ".site_url());
			}
			else
			{
				$this->pengguna->konfirmasiRegistrasi($username);
				notifikasi("Konfirmasi Registrasi Berhasil.", "Anda sudah bisa login sekarang", "success");
				header("Location: ".site_url("login"));
			}	
  	}
  	else
  	{
  		header("Location: ".site_url());
  	}
  }
  public function prosesLogout()
  {
    unset($_SESSION['username']);
    notifikasi("Pesan", "Anda berhasil logout", "success");
    header('Location: '.site_url('/'));
  }
  public function dilarang()
  {
    $this->view('dilarang');
  }
}
