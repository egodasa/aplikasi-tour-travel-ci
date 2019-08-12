<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelKeberangkatan extends MY_Model {
  // Nama Tabel
  private $table = "tb_keberangkatan";      // nama tabelnya
  private $primaryKey = "id_keberangkatan"; // primary keynya
  
  
  //  Method untuk menampilkan data
  // kalau idnya tidak diatur alias kosong data() , maka ambil semua data
  // kalau idnya diatur data("P0001") maka data P0001 yang akan diambil
	public function data($id = null)
	{
    if($id != null)
    {
      return $this->db->query("Select
                                    tb_keberangkatan.id_keberangkatan,
                                    tb_keberangkatan.no_registrasi,
                                    tb_keberangkatan.status,
                                    tb_pelanggan.nama_lengkap,
                                    tb_pelanggan.jenis_kelamin,
                                    tb_pelanggan.tempat_lahir,
                                    tb_jenisprogram.nm_jenis,
                                    tb_program.nama_program
                                From
                                    tb_keberangkatan Inner Join
                                    tb_transaksi On tb_keberangkatan.no_registrasi = tb_transaksi.no_registrasi Inner Join
                                    tb_pelanggan On tb_transaksi.id_pelanggan = tb_pelanggan.id_pelanggan Inner Join
                                    tb_jenisprogram On tb_transaksi.id_jenis = tb_jenisprogram.id_jenis Inner Join
                                    tb_program On tb_jenisprogram.id_program = tb_program.id_program WHERE tb_keberangkatan.id_keberangkatan = :id_keberangkatan", [$this->primaryKey => $id])->fetch(PDO::FETCH_ASSOC);
    }
    else
    {
      return $this->db->query("Select
                                    tb_keberangkatan.id_keberangkatan,
                                    tb_keberangkatan.no_registrasi,
                                    tb_keberangkatan.status,
                                    tb_pelanggan.nama_lengkap,
                                    tb_pelanggan.jenis_kelamin,
                                    tb_pelanggan.tempat_lahir,
                                    tb_jenisprogram.nm_jenis,
                                    tb_program.nama_program
                                From
                                    tb_keberangkatan Inner Join
                                    tb_transaksi On tb_keberangkatan.no_registrasi = tb_transaksi.no_registrasi Inner Join
                                    tb_pelanggan On tb_transaksi.id_pelanggan = tb_pelanggan.id_pelanggan Inner Join
                                    tb_jenisprogram On tb_transaksi.id_jenis = tb_jenisprogram.id_jenis Inner Join
                                    tb_program On tb_jenisprogram.id_program = tb_program.id_program")->fetchAll(PDO::FETCH_ASSOC);
    }
	}
  
  // method untuk menambah data
  public function tambah($data)
  {
    $this->db->insert($this->table, [
      "no_registrasi"  =>  $data["no_registrasi"],  // Proses penambahan data (insert)
      "id_jadwal"  =>  $data["id_jadwal"],  // Proses penambahan data (insert)
      "status"  =>  $data["status"]
    ]);
    
    return true;
  }
  
  // method untuk edit data
  public function edit($id, $data)
  {
    $this->db->update($this->table, [
      "no_registrasi"  =>  $data["no_registrasi"],  // Proses penambahan data (insert)
      "id_jadwal"  =>  $data["id_jadwal"],  // Proses penambahan data (insert)
      "status"  =>  $data["status"]
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
  
  public function daftarJemaah($id_jadwal)
  {
    $data = $this->db->query("Select
                                    tb_keberangkatan.id_keberangkatan,
                                    tb_keberangkatan.no_registrasi,
                                    tb_keberangkatan.status,
                                    tb_pelanggan.nama_lengkap,
                                    tb_pelanggan.jenis_kelamin,
                                    tb_pelanggan.tempat_lahir,
                                    tb_jenisprogram.nm_jenis,
                                    tb_program.nama_program
                                From
                                    tb_keberangkatan Inner Join
                                    tb_transaksi On tb_keberangkatan.no_registrasi = tb_transaksi.no_registrasi Inner Join
                                    tb_pelanggan On tb_transaksi.id_pelanggan = tb_pelanggan.id_pelanggan Inner Join
                                    tb_jenisprogram On tb_transaksi.id_jenis = tb_jenisprogram.id_jenis Inner Join
                                    tb_program On tb_jenisprogram.id_program = tb_program.id_program WHERE tb_keberangkatan.id_jadwal = :id_jadwal", ["id_jadwal" => $id_jadwal])->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  
 
}
