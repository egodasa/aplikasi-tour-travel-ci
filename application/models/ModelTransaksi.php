<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTransaksi extends MY_Model {
  // Nama Tabel
  private $table = "tb_transaksi";      // nama tabelnya
  private $primaryKey = "no_registrasi"; // primary keynya
  
  
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
      return $this->db->query("SELECT a.*, CONCAT(e.nama_program, ' ', b.nm_jenis) AS nama_program, c.nama_lengkap, (b.harga - SUM(IFNULL(d.juml_bayar, 0))) AS sisa_pembayaran  
                                                      FROM tb_transaksi a 
                                                      JOIN tb_jenisprogram b ON a.id_jenis = b.id_jenis 
                                                      JOIN tb_pelanggan c ON a.id_pelanggan = c.id_pelanggan 
                                                      JOIN tb_program e ON b.id_program = e.id_program 
                                                      JOIN tb_pengguna f ON c.id_pengguna = f.id_pengguna 
                                                      LEFT JOIN tb_angsuran d ON a.no_registrasi = d.no_registrasi   
                                                      GROUP BY a.no_registrasi")->fetchAll(PDO::FETCH_ASSOC);
    }
	}
  
  // method untuk menambah data
  public function tambah($data)
  {
    $this->db->insert($this->table, [
      "id_jenis"  =>  $data["id_jenis"],  // Proses penambahan data (insert)
      "id_pelanggan"  =>  $data["id_pelanggan"],  // Proses penambahan data (insert)
      "dp"  =>  $data["dp"]  // Proses penambahan data (insert)
    ]);
    
    return true;
  }
  
  // method untuk edit data
  public function edit($id, $data)
  {
    $this->db->update($this->table, [
      "id_jenis"  =>  $data["id_jenis"],  // Proses penambahan data (insert)
      "id_pelanggan"  =>  $data["id_pelanggan"],  // Proses penambahan data (insert)
      "dp"  =>  $data["dp"]  // Proses penambahan data (insert)
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
  
  public function transaksiBerdasarkanPengguna($id_pengguna)
  {
    $data = return $this->db->query("SELECT a.*, CONCAT(e.nama_program, ' ', b.nm_jenis) AS nama_program, c.nama_lengkap, (b.harga - SUM(IFNULL(d.juml_bayar, 0))) AS sisa_pembayaran  
                                                      FROM tb_transaksi a 
                                                      JOIN tb_jenisprogram b ON a.id_jenis = b.id_jenis 
                                                      JOIN tb_pelanggan c ON a.id_pelanggan = c.id_pelanggan 
                                                      JOIN tb_program e ON b.id_program = e.id_program 
                                                      JOIN tb_pengguna f ON c.id_pengguna = f.id_pengguna 
                                                      LEFT JOIN tb_angsuran d ON a.no_registrasi = d.no_registrasi WHERE a.id_pengguna = :id_pengguna
                                                      GROUP BY a.no_registrasi", ["id_pengguna" => $id_pengguna])->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  
  public function tambahTransaksi($data)
  {
    // Tambah dulu data pelanggan baru dan kemudian ambil ID pelanggan untuk dimasukkan kedalam tabel transaksi
    $this->db->insert("tb_pelanggan", [
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
    
    // ambil id dari data pelanggan diatas
    $id_pelanggan = $this->db->id();
    
    // Kemudian tambahkan data ke tabel transaksi
    $this->db->insert($this->table, [
      "id_jenis"  =>  $data["id_jenis"],  // Proses penambahan data (insert)
      "id_pelanggan"  =>  $id_pelanggan,  // Proses penambahan data (insert)
      "dp"  =>  $data["dp"]  // Proses penambahan data (insert)
    ]);
    return true;
  }
  
  public function editTransaksi($id, $data)
  {
    // Tambah dulu data pelanggan baru dan kemudian ambil ID pelanggan untuk dimasukkan kedalam tabel transaksi
    $this->db->update("tb_pelanggan", [
      "nama_lengkap"  =>  $data["nama_lengkap"],  // Proses penambahan data (insert)
      "nama_panggilan"  =>  $data["nama_panggilan"],  // Proses penambahan data (insert)
      "jenis_kelamin"  =>  $data["jenis_kelamin"],  // Proses penambahan data (insert)
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
    ], [
      "id_pelanggan" => $data["id_pelanggan"]
    ]);
    $this->db->update($this->table, 
    [
      "id_jenis"  =>  $data["id_jenis"],  // Proses penambahan data (edit)
      "dp"  =>  $data["dp"]  // Proses penambahan data (insert)
    ],
    [
      "no_registrasi" => $id // ID data yang akan diedit
    ]);
    return true;
  }
  
 
}
