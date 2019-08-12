<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPelanggan extends MY_Model {
  // Nama Tabel
  private $table = "tb_pelanggan";      // nama tabelnya
  private $primaryKey = "id_pelanggan"; // primary keynya
  
  
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
      return $this->db->query("SELECT a.*, b.username, c.nm_kota FROM tb_pelanggan a JOIN tb_pengguna b ON a.id_pengguna = b.id_pengguna JOIN tb_kota c ON a.tempat_lahir = c.id_kota")->fetchAll(PDO::FETCH_ASSOC);
    }
	}
  
  // method untuk menambah data
  public function tambah($data)
  {
    $this->db->insert($this->table, [
      "nama_lengkap"  =>  $data["nama_lengkap"],  // Proses penambahan data (insert)
      "nama_panggilan"  =>  $data["nama_panggilan"],  // Proses penambahan data (insert)
      "jenis_kelamin"  =>  $data["jenis_kelamin"],  // Proses penambahan data (insert)
      "id_pengguna"  =>  $data["id_pengguna"],  // Proses penambahan data (insert)
      "no_identitas"  =>  $data["no_identitas"],  // Proses penambahan data (insert)
      "tempat_lahir"  =>  $data["tempat_lahir"],  // Proses penambahan data (insert)
      "tgl_lahir"  =>  $data["tgl_lahir"],  // Proses penambahan data (insert)
      "alamat"  =>  $data["alamat"],  // Proses penambahan data (insert)
      "kel"  =>  $data["kel"],  // Proses penambahan data (insert)
      "tlp_rumah"  =>  $data["tlp_rumah"],  // Proses penambahan data (insert)
      "tlp_kantor"  =>  $data["tlp_kantor"],  // Proses penambahan data (insert)
      "nohp"  =>  $data["nohp"],  // Proses penambahan data (insert)
      "email"  =>  $data["email"],  // Proses penambahan data (insert)
      "warga_negara"  =>  $data["warga_negara"],  // Proses penambahan data (insert)
      "pekerjaan"  =>  $data["pekerjaan"],  // Proses penambahan data (insert)
      "ukuran_baju"  =>  $data["ukuran_baju"],  // Proses penambahan data (insert)
      "nama_ahliwaris"  =>  $data["nama_ahliwaris"],  // Proses penambahan data (insert)
      "hubungan_ahliwaris"  =>  $data["hubungan_ahliwaris"],  // Proses penambahan data (insert)
      "jk_ahliwaris"  =>  $data["jk_ahliwaris"],  // Proses penambahan data (insert)
      "kode_pos"  =>  $data["kode_pos"],  // Proses penambahan data (insert)
      "rt"  =>  $data["rt"], // Proses penambahan data (insert)
      "rw"  =>  $data["rw"]  // Proses penambahan data (insert)
    ]);
    
    return true;
  }
  
  // method untuk edit data
  public function edit($id, $data)
  {
    $this->db->update($this->table, [
      "nama_lengkap"  =>  $data["nama_lengkap"],  // Proses penambahan data (insert)
      "nama_panggilan"  =>  $data["nama_panggilan"],  // Proses penambahan data (insert)
      "jenis_kelamin"  =>  $data["jenis_kelamin"],  // Proses penambahan data (insert)
      "id_pengguna"  =>  $data["id_pengguna"],  // Proses penambahan data (insert)
      "no_identitas"  =>  $data["no_identitas"],  // Proses penambahan data (insert)
      "tempat_lahir"  =>  $data["tempat_lahir"],  // Proses penambahan data (insert)
      "tgl_lahir"  =>  $data["tgl_lahir"],  // Proses penambahan data (insert)
      "alamat"  =>  $data["alamat"],  // Proses penambahan data (insert)
      "kel"  =>  $data["kel"],  // Proses penambahan data (insert)
      "tlp_rumah"  =>  $data["tlp_rumah"],  // Proses penambahan data (insert)
      "tlp_kantor"  =>  $data["tlp_kantor"],  // Proses penambahan data (insert)
      "nohp"  =>  $data["nohp"],  // Proses penambahan data (insert)
      "email"  =>  $data["email"],  // Proses penambahan data (insert)
      "warga_negara"  =>  $data["warga_negara"],  // Proses penambahan data (insert)
      "pekerjaan"  =>  $data["pekerjaan"],  // Proses penambahan data (insert)
      "ukuran_baju"  =>  $data["ukuran_baju"],  // Proses penambahan data (insert)
      "nama_ahliwaris"  =>  $data["nama_ahliwaris"],  // Proses penambahan data (insert)
      "hubungan_ahliwaris"  =>  $data["hubungan_ahliwaris"],  // Proses penambahan data (insert)
      "jk_ahliwaris"  =>  $data["jk_ahliwaris"],  // Proses penambahan data (insert)
      "kode_pos"  =>  $data["kode_pos"],  // Proses penambahan data (insert)
      "rt"  =>  $data["rt"], // Proses penambahan data (insert)
      "rw"  =>  $data["rw"]  // Proses penambahan data (insert)
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
  
 
}
