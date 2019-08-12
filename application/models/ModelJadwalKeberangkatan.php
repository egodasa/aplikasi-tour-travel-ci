<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelJadwalKeberangkatan extends MY_Model {
  // Nama Tabel
  private $table = "tb_jadwalkeberangkatan";      // nama tabelnya
  private $primaryKey = "id_jadwal"; // primary keynya
  
  
  //  Method untuk menampilkan data
  // kalau idnya tidak diatur alias kosong data() , maka ambil semua data
  // kalau idnya diatur data("P0001") maka data P0001 yang akan diambil
	public function data($id = null)
	{
    if($id != null)
    {
      return $this->db->query("SELECT a.*, b.nm_jenis, c.nama_program FROM tb_jadwalkeberangkatan a JOIN tb_jenisprogram b ON a.id_jenis = b.id_jenis JOIN tb_program c ON b.id_program = c.id_program WHERE a.id_jadwal = :id_jadwal", ["id_jadwal" => $id])->fetch(PDO::FETCH_ASSOC);
    }
    else
    {
      return $this->db->query("SELECT a.*, b.nm_jenis, c.nama_program FROM tb_jadwalkeberangkatan a JOIN tb_jenisprogram b ON a.id_jenis = b.id_jenis JOIN tb_program c ON b.id_program = c.id_program")->fetchAll(PDO::FETCH_ASSOC);
    }
	}
  
  // method untuk menambah data
  public function tambah($data)
  {
    $this->db->insert($this->table, [
      "tgl_berangkat"  =>  $data["tgl_berangkat"],  // Proses penambahan data (insert)
      "nama_maskapai"  =>  $data["nama_maskapai"],  // Proses penambahan data (insert)
      "id_jenis"  =>  $data["id_jenis"],  // Proses penambahan data (insert)
      "keterangan"  =>  $data["keterangan"],  // Proses penambahan data (insert)
      "status"  =>  $data["status"]  // Proses penambahan data (insert)
    ]);
    
    return true;
  }
  
  // method untuk edit data
  public function edit($id, $data)
  {
    $this->db->update($this->table, [
      "tgl_berangkat"  =>  $data["tgl_berangkat"],  // Proses penambahan data (insert)
      "nama_maskapai"  =>  $data["nama_maskapai"],  // Proses penambahan data (insert)
      "id_jenis"  =>  $data["id_jenis"],  // Proses penambahan data (insert)
      "keterangan"  =>  $data["keterangan"],  // Proses penambahan data (insert)
      "status"  =>  $data["status"]  // Proses penambahan data (insert)
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
  
 
}
