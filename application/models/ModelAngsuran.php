<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAngsuran extends MY_Model {
  // Nama Tabel
  private $table = "tb_angsuran";      // nama tabelnya
  private $primaryKey = "id_angsuran"; // primary keynya
  
  
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
      return $this->db->select($this->table, "*", [$this->primaryKey => $id]);
    }
	}
  
  // method untuk menambah data
  public function tambah($data)
  {
    $this->db->insert($this->table, [
      "no_registrasi"  =>  $data["no_registrasi"],  // Proses penambahan data (insert)
      "tgl_bayar"  =>  $data["tgl_bayar"],  // Proses penambahan data (insert)
      "juml_bayar"  =>  $data["juml_bayar"],  // Proses penambahan data (insert)
      "jenis_pembayaran"  =>  $data["jenis_pembayaran"],  // Proses penambahan data (insert)
      "keterangan"  =>  $data["keterangan"],  // Proses penambahan data (insert)
      "status_pembayaran"  =>  $data["status_pembayaran"]  // Proses penambahan data (insert)
    ]);
    
    return true;
  }
  
  // method untuk edit data
  public function edit($id, $data)
  {
    $this->db->update($this->table, [
      "no_registrasi"  =>  $data["no_registrasi"],  // Proses penambahan data (insert)
      "tgl_bayar"  =>  $data["tgl_bayar"],  // Proses penambahan data (insert)
      "juml_bayar"  =>  $data["juml_bayar"],  // Proses penambahan data (insert)
      "jenis_pembayaran"  =>  $data["jenis_pembayaran"],  // Proses penambahan data (insert)
      "keterangan"  =>  $data["keterangan"],  // Proses penambahan data (insert)
      "status_pembayaran"  =>  $data["status_pembayaran"]  // Proses penambahan data (insert)
    ], [
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
  
  public function angsuranBeradasarkanTransaksi($no_registrasi)
  {
    return $this->db->select($this->table, "*", ["no_registrasi" => $no_registrasi]);
  }
  
  public function updateStatusPembayaran($id, $status_pembayaran)
  {
    $this->db->update($this->table, [
      "status_pembayaran"  =>  $status_pembayaran  // Proses penambahan data (insert)
    ], [
      $this->primaryKey => $id
    ]);
    return true;
  }
 
}
