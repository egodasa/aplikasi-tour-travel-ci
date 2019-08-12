<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelProvinsi extends MY_Model {
  // Nama Tabel
  private $table = "tb_provinsi";      // nama tabelnya
  private $primaryKey = "id_provinsi"; // primary keynya
  
  
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
      "nm_provinsi" => $data["nama_provinsi"]
    ]);
    
    return true;
  }
  
  // method untuk edit data
  public function edit($id, $data)
  {
    $this->db->update($this->table, [
      "nm_provinsi" => $data["nama_provinsi"]
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
