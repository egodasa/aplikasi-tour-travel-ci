<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelJenisProgram extends MY_Model {
  // Nama Tabel
  private $table = "tb_jenisprogram";      // nama tabelnya
  private $primaryKey = "id_jenis"; // primary keynya
  
  
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
      return $this->db->query("SELECT a.*, b.nama_program FROM tb_jenisprogram a JOIN tb_program b ON a.id_program = b.id_program")->fetchAll(PDO::FETCH_ASSOC);
    }
	}
  
  // method untuk menambah data
  public function tambah($data)
  {
    $this->db->insert($this->table, [
      "nm_jenis"  =>  $data["nm_jenis"],  // Proses penambahan data (insert)
      "id_program"  =>  $data["id_program"],  // Proses penambahan data (insert)
      "harga"  =>  $data["harga"]  // Proses penambahan data (insert)
    ]);
    
    return true;
  }
  
  // method untuk edit data
  public function edit($id, $data)
  {
    $this->db->update($this->table, [
      "nm_jenis"  =>  $data["nm_jenis"],  // Proses penambahan data (insert)
      "id_program"  =>  $data["id_program"],  // Proses penambahan data (insert)
      "harga"  =>  $data["harga"]  // Proses penambahan data (insert)
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
