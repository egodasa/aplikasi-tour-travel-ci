<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaPengguna extends MY_Controller {
  // Nama Tabel
  private $table = "tb_pengguna";
  
  //  Method untuk menampilkan data
	public function daftar()
	{
    $this->_dts['data_list'] = $this->db->select($this->table, "*");  // Proses pengambilan data dari database
		$this->view('admin.pengguna.daftar', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk menampilkan form tambah data
  public function tambah()
  {
    $this->view('admin.pengguna.tambah'); // Langsung tampilkan view tambah data
  }
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->db->insert($this->table, [
      "username"  =>  $this->input->post("username"),  // Proses penambahan data (insert)
      "password"  =>  $this->input->post("password"),  // Proses penambahan data (insert)
      "email"  =>  $this->input->post("email"),  // Proses penambahan data (insert)
      "nohp"  =>  $this->input->post("nohp"),  // Proses penambahan data (insert)
      "level"  =>  $this->input->post("level")  // Proses penambahan data (insert)
    ]);
    header("Location: ".site_url("admin/pengguna")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk menampilkan form edit
  public function edit()
  {
    $this->_dts['detail'] = $this->db->get($this->table, "*", ['id_pengguna' => $this->input->get('id_pengguna')]); // Ambil data yang akan diedit berdasarkan ID
    $this->view('admin.pengguna.edit', $this->_dts); // Oper data ke view
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->db->update($this->table, 
    [
      "username"  =>  $this->input->post("username"),  // Proses edit data (edit)
      "password"  =>  $this->input->post("password"),  // Proses edit data (edit)
      "email"  =>  $this->input->post("email"),  // Proses edit data (edit)
      "nohp"  =>  $this->input->post("nohp"),  // Proses edit data (edit)
      "level"  =>  $this->input->post("level")  // Proses edit data (edit)
    ],
    [
      "id_pengguna" => $this->input->post("id_pengguna") // ID data yang akan diedit
    ]);
    header("Location: ".site_url("admin/pengguna")); // Arahkan user kembali ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->db->delete($this->table, ['id_pengguna' => $this->input->get('id_pengguna')]); // Proses hapus data
    header("Location: ".site_url("admin/pengguna")); // // Arahkan user kembali ke halaman daftar
  }
}
