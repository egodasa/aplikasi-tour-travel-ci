<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaProgram extends MY_Controller {
  // Nama Tabel
  private $table = "tb_program";
  
  //  Method untuk menampilkan data
	public function daftar()
	{
    $this->_dts['data_list'] = $this->db->select($this->table, "*");  // Proses pengambilan data dari database
		$this->view('admin.program.daftar', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk menampilkan form tambah data
  public function tambah()
  {
    $this->view('admin.program.tambah'); // Langsung tampilkan view tambah data
  }
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->db->insert($this->table, [
      "nama_program"  =>  $this->input->post("nama_program")  // Proses penambahan data (insert)
    ]);
    header("Location: ".site_url("admin/program")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk menampilkan form edit
  public function edit()
  {
    $this->_dts['detail'] = $this->db->get('tb_program', "*", ['id_program' => $this->input->get('id_program')]); // Ambil data yang akan diedit berdasarkan ID
    $this->view('admin.program.edit', $this->_dts); // Oper data ke view
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->db->update($this->table, 
    [
      "nama_program"  =>  $this->input->post("nama_program") // Proses data diedit
    ],
    [
      "id_program" => $this->input->post("id_program") // ID data yang akan diedit
    ]);
    header("Location: ".site_url("admin/program")); // Arahkan user kembali ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->db->delete($this->table, ['id_program' => $this->input->get('id_program')]); // Proses hapus data
    header("Location: ".site_url("admin/program")); // // Arahkan user kembali ke halaman daftar
  }
}
