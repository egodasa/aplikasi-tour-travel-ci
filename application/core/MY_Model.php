<?php
use Medoo\Medoo;

class MY_Model extends CI_Model {
	protected $db;
  public $tabel;      // nama tabelnya
  protected $primaryKey; // primary keynya
  protected $relasiTabel; // relasi tabel array
  public $kolomBawaanCrud; // kolom bawaan crud array
  public $data = [];
  public $view = null;
  function __construct()
  {
    parent::__construct();
    $this->db = new Medoo([
      'database_type' => 'mysql',
      'database_name' => 'mandanon_travel',
      'server' => 'localhost',
      'username' => 'mandanon_travel',
      'password' => 'qwe123*IOP'
    ]);
  }
  
  
  // id = pilih data berdasarkan id
  // kolom = daftar kolom yang ingin ditampilkan, berupa array
  public function ambilData($id = null, $kolom = "*")
	{
    if(!empty($this->view))
    {
      $this->tabel = $this->view;
    }
    if(!is_null($id))
    {
      return $this->db->get($this->tabel, $kolom, [$this->primaryKey => $id]);
    }
    else
    {
      return $this->db->select($this->tabel, $kolom);
    }
	}
  
  // $where = ambil data dengan kondisi tertentu. array assosiatif
  // kolom = kolom yang ingin ditampilkan
	public function ambilDataDenganKondisi($where, $kolom = "*")
	{
    if(!empty($this->view))
    {
      $this->tabel = $this->view;
    }
    return $this->db->select($this->tabel, $kolom, $where);
	}
  
  // method untuk menambah data
  public function tambahData($data)
  {
    foreach($this->kolomBawaanCrud as $d)
    {
      $this->data[$d] = $data[$d];
    }
    $this->db->insert($this->tabel, $this->data);
    notifikasi("Pesan!", "Data berhasil ditambahkan", "primary");
    return $this->db->id();
  }
  
  // method untuk edit data
  public function ubahData($id, $data)
  {
    foreach($this->kolomBawaanCrud as $d)
    {
      $this->data[$d] = $data[$d];
    }
    $this->db->update($this->tabel, $this->data, [$this->primaryKey => $id]);
    notifikasi("Pesan!", "Data berhasil diedit", "primary");
    return true;
  }
  
  // method untuk hapus data
  public function hapusData($id)
  {
    $this->db->delete($this->tabel, [$this->primaryKey => $id]);
    notifikasi("Pesan!", "Data berhasil dihapus", "primary");
    return true;
  }
}
