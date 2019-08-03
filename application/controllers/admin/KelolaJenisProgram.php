<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaJenisProgram extends MY_Controller {
  // Nama Tabel
  private $table = "tb_jenisprogram";
  
  //  Method untuk menampilkan data
	public function daftar()
	{
    $this->_dts['data_list'] = $this->db->query("SELECT a.*, b.nama_program FROM tb_jenisprogram a JOIN tb_program b ON a.id_program = b.id_program")->fetchAll(PDO::FETCH_ASSOC);  // Proses pengambilan data dari database
		$this->view('admin.jenisprogram.daftar', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk menampilkan form tambah data
  public function tambah()
  {
    $this->_dts['data_program'] = $this->db->select("tb_program", "*");
    $this->view('admin.jenisprogram.tambah', $this->_dts); // Langsung tampilkan view tambah data
  }
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->db->insert($this->table, [
      "nm_jenis"  =>  $this->input->post("nm_jenis"),  // Proses penambahan data (insert)
      "id_program"  =>  $this->input->post("id_program"),  // Proses penambahan data (insert)
      "harga"  =>  $this->input->post("harga")  // Proses penambahan data (insert)
    ]);
    header("Location: ".site_url("admin/jenisprogram")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk menampilkan form edit
  public function edit()
  {
    $this->_dts['data_program'] = $this->db->select("tb_program", "*");
    $this->_dts['detail'] = $this->db->get($this->table, "*", ['id_jenis' => $this->input->get('id_jenis')]); // Ambil data yang akan diedit berdasarkan ID
    $this->view('admin.jenisprogram.edit', $this->_dts); // Oper data ke view
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->db->update($this->table, 
    [
      "nm_jenis"  =>  $this->input->post("nm_jenis"),
      "id_program"  =>  $this->input->post("id_program"),  // Proses edit data (edit)
      "harga"  =>  $this->input->post("harga")  // Proses edit data (edit)
    ],
    [
      "id_jenis" => $this->input->post("id_jenis") // ID data yang akan diedit
    ]);
    header("Location: ".site_url("admin/jenisprogram")); // Arahkan user kembali ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->db->delete($this->table, ['id_jenis' => $this->input->get('id_jenis')]); // Proses hapus data
    header("Location: ".site_url("admin/jenisprogram")); // // Arahkan user kembali ke halaman daftar
  }
}
