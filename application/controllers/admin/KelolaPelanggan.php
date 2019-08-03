<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaPelanggan extends MY_Controller {
  // Nama Tabel
  private $table = "tb_pelanggan";
  
  //  Method untuk menampilkan data
	public function daftar()
	{
    $this->_dts['data_list'] = $this->db->query("SELECT a.*, b.username, c.nm_kota FROM tb_pelanggan a JOIN tb_pengguna b ON a.id_pengguna = b.id_pengguna JOIN tb_kota c ON a.tempat_lahir = c.id_kota")->fetchAll(PDO::FETCH_ASSOC);  // Proses pengambilan data dari database
		$this->view('admin.pelanggan.daftar', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk menampilkan form tambah data
  public function tambah()
  {
    $this->_dts['data_pengguna'] = $this->db->select("tb_pengguna", "*");
    $this->_dts['data_kota'] = $this->db->select("tb_kota", "*");
    $this->view('admin.pelanggan.tambah', $this->_dts); // Langsung tampilkan view tambah data
  }
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->db->insert($this->table, [
      "nama_lengkap"  =>  $this->input->post("nama_lengkap"),  // Proses penambahan data (insert)
      "nama_panggilan"  =>  $this->input->post("nama_panggilan"),  // Proses penambahan data (insert)
      "jenis_kelamin"  =>  $this->input->post("jenis_kelamin"),  // Proses penambahan data (insert)
      "id_pengguna"  =>  $this->input->post("id_pengguna"),  // Proses penambahan data (insert)
      "no_identitas"  =>  $this->input->post("no_identitas"),  // Proses penambahan data (insert)
      "tempat_lahir"  =>  $this->input->post("tempat_lahir"),  // Proses penambahan data (insert)
      "tgl_lahir"  =>  $this->input->post("tgl_lahir"),  // Proses penambahan data (insert)
      "alamat"  =>  $this->input->post("alamat"),  // Proses penambahan data (insert)
      "kel"  =>  $this->input->post("kel"),  // Proses penambahan data (insert)
      "tlp_rumah"  =>  $this->input->post("tlp_rumah"),  // Proses penambahan data (insert)
      "tlp_kantor"  =>  $this->input->post("tlp_kantor"),  // Proses penambahan data (insert)
      "nohp"  =>  $this->input->post("nohp"),  // Proses penambahan data (insert)
      "email"  =>  $this->input->post("email"),  // Proses penambahan data (insert)
      "warga_negara"  =>  $this->input->post("warga_negara"),  // Proses penambahan data (insert)
      "pekerjaan"  =>  $this->input->post("pekerjaan"),  // Proses penambahan data (insert)
      "ukuran_baju"  =>  $this->input->post("ukuran_baju"),  // Proses penambahan data (insert)
      "nama_ahliwaris"  =>  $this->input->post("nama_ahliwaris"),  // Proses penambahan data (insert)
      "hubungan_ahliwaris"  =>  $this->input->post("hubungan_ahliwaris"),  // Proses penambahan data (insert)
      "jk_ahliwaris"  =>  $this->input->post("jk_ahliwaris"),  // Proses penambahan data (insert)
      "kode_pos"  =>  $this->input->post("kode_pos"),  // Proses penambahan data (insert)
      "rt"  =>  $this->input->post("rt"), // Proses penambahan data (insert)
      "rw"  =>  $this->input->post("rw")  // Proses penambahan data (insert)
    ]);
    header("Location: ".site_url("admin/pelanggan")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk menampilkan form edit
  public function edit()
  {
    $this->_dts['data_pengguna'] = $this->db->select("tb_pengguna", "*");
    $this->_dts['data_kota'] = $this->db->select("tb_kota", "*");
    $this->_dts['detail'] = $this->db->get($this->table, "*", ['id_pelanggan' => $this->input->get('id_pelanggan')]); // Ambil data yang akan diedit berdasarkan ID
    $this->view('admin.pelanggan.edit', $this->_dts); // Oper data ke view
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->db->update($this->table, 
    [
      "nama_lengkap"  =>  $this->input->post("nama_lengkap"),  // Proses penambahan data (insert)
      "nama_panggilan"  =>  $this->input->post("nama_panggilan"),  // Proses penambahan data (insert)
      "jenis_kelamin"  =>  $this->input->post("jenis_kelamin"),  // Proses penambahan data (insert)
      "id_pengguna"  =>  $this->input->post("id_pengguna"),  // Proses penambahan data (insert)
      "no_identitas"  =>  $this->input->post("no_identitas"),  // Proses penambahan data (insert)
      "tempat_lahir"  =>  $this->input->post("tempat_lahir"),  // Proses penambahan data (insert)
      "tgl_lahir"  =>  $this->input->post("tgl_lahir"),  // Proses penambahan data (insert)
      "alamat"  =>  $this->input->post("alamat"),  // Proses penambahan data (insert)
      "kel"  =>  $this->input->post("kel"),  // Proses penambahan data (insert)
      "tlp_rumah"  =>  $this->input->post("tlp_rumah"),  // Proses penambahan data (insert)
      "tlp_kantor"  =>  $this->input->post("tlp_kantor"),  // Proses penambahan data (insert)
      "nohp"  =>  $this->input->post("nohp"),  // Proses penambahan data (insert)
      "email"  =>  $this->input->post("email"),  // Proses penambahan data (insert)
      "warga_negara"  =>  $this->input->post("warga_negara"),  // Proses penambahan data (insert)
      "pekerjaan"  =>  $this->input->post("pekerjaan"),  // Proses penambahan data (insert)
      "ukuran_baju"  =>  $this->input->post("ukuran_baju"),  // Proses penambahan data (insert)
      "nama_ahliwaris"  =>  $this->input->post("nama_ahliwaris"),  // Proses penambahan data (insert)
      "hubungan_ahliwaris"  =>  $this->input->post("hubungan_ahliwaris"),  // Proses penambahan data (insert)
      "jk_ahliwaris"  =>  $this->input->post("jk_ahliwaris"),  // Proses penambahan data (insert)
      "kode_pos"  =>  $this->input->post("kode_pos"),  // Proses penambahan data (insert)
      "rt"  =>  $this->input->post("rt"),  // Proses penambahan data (insert)
      "rw"  =>  $this->input->post("rw")  // Proses penambahan data (insert)
    ],
    [
      "id_pelanggan" => $this->input->post("id_pelanggan") // ID data yang akan diedit
    ]);
    header("Location: ".site_url("admin/pelanggan")); // Arahkan user kembali ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->db->delete($this->table, ['id_pelanggan' => $this->input->get('id_pelanggan')]); // Proses hapus data
    header("Location: ".site_url("admin/pelanggan")); // // Arahkan user kembali ke halaman daftar
  }
}
