<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPengguna extends MY_Model {
  // Nama Tabel
  private $table = "tb_pengguna";      // nama tabelnya
  private $primaryKey = "id_pengguna"; // primary keynya
  
  
  //  Method untuk menampilkan data
  // kalau idnya tidak diatur alias kosong data() , maka ambil semua data
  // kalau idnya diatur data("P0001") maka data P0001 yang akan diambil
	public function data($id = null)
	{
    if($id != null)
    {
      return $this->db->get($this->table, "*", [$this->primaryKey => $id]);
    }
    else
    {
      return $this->db->select($this->table, "*");
    }
	}
  
  // method untuk menambah data
  public function tambah($data)
  {
    $this->db->insert($this->table, [
      "username"  =>  $data["username"],  // Proses penambahan data (insert)
      "password"  =>  $data["password"],  // Proses penambahan data (insert)
      "email"  =>  $data["email"],  // Proses penambahan data (insert)
      "nohp"  =>  $data["nohp"],  // Proses penambahan data (insert)
      "level"  =>  $data["level"]  // Proses penambahan data (insert)
    ]);
    
    return true;
  }
  
  // method untuk edit data
  public function edit($id, $data)
  {
    $this->db->update($this->table, [
      "username"  =>  $data["username"],  // Proses penambahan data (insert)
      "password"  =>  $data["password"],  // Proses penambahan data (insert)
      "email"  =>  $data["email"],  // Proses penambahan data (insert)
      "nohp"  =>  $data["nohp"],  // Proses penambahan data (insert)
      "level"  =>  $data["level"]  // Proses penambahan data (insert)
    ],[
      $this->primaryKey => $id
    ]);
    return true;
  }
  
  // method untuk hapus data
  public function hapus($id)
  {
    $this->db->delete($this->table, [ $this->primaryKey => $id]);
    return true;
  }
  
  public function gantiProfil($id, $data)
  {
    $this->db->update($this->table, [
      "email"  =>  $data["email"],  // Proses penambahan data (insert)
      "nohp"  =>  $data["nohp"],  // Proses penambahan data (insert)
    ],[
      $this->primaryKey => $id
    ]);
    return true;
  }
  public function gantiPassword($id, $password_lama, $password_baru)
  {
    // cek kesamaan password terlebih dahulu
    $hasil_cek = $this->db->get($this->table, ["password"], [$this->primaryKey => $id, "password" => $password_lama]);
    if(empty($hasil_cek))
    {
      // password lama tidak cocok
      return false;
    }
    else
    {
      $this->db->update($this->table, [
        "password"  =>  $password_baru
      ],[
        $this->primaryKey => $id
      ]);
      return true;
    }
  }
  
  public function cekLogin($username, $password)
  {
    $hasil = $this->db->get($this->table, ['id_pengguna','username', 'level', 'email', 'nohp'], ["username" => $username, "password" => $password]);
    return $hasil;
  }
  
  public function register($data)
  {
    $cek = $this->db->get($this->table, "username", ['username' => $data['username'], ["OR" => ['email' => $data['email']]]]);
    if(!empty($cek))
    {
      return false;
    }
    else
    {
      $this->db->insert("tb_pengguna", [
        "username" => $data['username'],
        "password" => $data['password'],
        "email" => $data['email'],
        "nohp" => $data['nohp'],
        "level" => "Member"
      ]);
      return true;
    }
  }
  
  
}
