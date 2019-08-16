<?php
use Medoo\Medoo;

class MY_Model extends CI_Model {
	protected $db;
  protected $tabel;      // nama tabelnya
  protected $primaryKey; // primary keynya
  protected $relasiTabel; // relasi tabel array
  protected $kolomBawaanCrud; // kolom bawaan crud array
  private $data;
  function __construct()
  {
    parent::__construct();
      $this->db = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'db_travel',
        'server' => 'localhost',
        'username' => 'root',
        'password' => 'mysql'
      ]);
  }
  
  
  // id = pilih data berdasarkan id
  // kolom = daftar kolom yang ingin ditampilkan, berupa array
  public function ambilData($id = null, $kolom = "*")
	{
    if($id != null)
    {
      return $this->db->get($this->tabel, $this->relasiTabel, $kolom, [$this->primaryKey => $id]);
    }
    else
    {
      return $this->db->select($this->tabel, $this->relasiTabel, $kolom);
    }
	}
  
  // $where = ambil data dengan kondisi tertentu. array assosiatif
  // kolom = kolom yang ingin ditampilkan
	public function ambilDataDenganKondisi($where, $kolom = "*")
	{
    return $this->db->select($this->tabel, $this->relasiTabel, $kolom, $where);
	}
  
  // method untuk menambah data
  public function tambahData($data)
  {
    $this->db->insert($this->tabel, $this->kolomBawaanCrud);
    
    return $this->db->id();
  }
  
  // method untuk edit data
  public function ubahData($id, $data)
  {
    $this->db->update($this->tabel, $this->kolomBawaanCrud,[$this->primaryKey => $id]);
    return true;
  }
  
  // method untuk hapus data
  public function hapusData($id)
  {
    $this->db->delete($this->tabel, [$this->primaryKey => $id]);
    return true;
  }
}
