<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaTransaksi extends MY_Controller {
  // Nama Tabel
  private $table = "tb_transaksi";
  
  //  Method untuk menampilkan data
	public function daftar()
	{
    $this->_dts['data_list'] = $this->db->query("SELECT a.*, CONCAT(e.nama_program, ' ', b.nm_jenis) AS nama_program, c.nama_lengkap, (b.harga - SUM(IFNULL(d.juml_bayar, 0))) AS sisa_pembayaran  
                                                      FROM tb_transaksi a 
                                                      JOIN tb_jenisprogram b ON a.id_jenis = b.id_jenis 
                                                      JOIN tb_pelanggan c ON a.id_pelanggan = c.id_pelanggan 
                                                      JOIN tb_program e ON b.id_program = e.id_program 
                                                      LEFT JOIN tb_angsuran d ON a.no_registrasi = d.no_registrasi AND d.status_pembayaran = 'Sudah Bayar' 
                                                      GROUP BY a.no_registrasi")->fetchAll(PDO::FETCH_ASSOC);  // Proses pengambilan data dari database
		$this->view('admin.transaksi.daftar', $this->_dts); // Oper data dari database ke view
	}
  
  // Method untuk menampilkan form tambah data
  public function tambah()
  {
    $this->_dts['data_program'] = $this->db->query("SELECT CONCAT(a.nama_program, ' ', b.nm_jenis) AS nm_program, b.id_jenis FROM tb_program a JOIN tb_jenisprogram b ON a.id_program = b.id_program")->fetchAll(PDO::FETCH_ASSOC);
    $this->_dts['data_pelanggan'] = $this->db->select("tb_pelanggan", "*");
    $this->view('admin.transaksi.tambah', $this->_dts); // Langsung tampilkan view tambah data
  }
  
  // Method untuk memproses penambahan data
  // Method diakses dalam metode POST
  public function prosesTambah()
  {
    $this->db->insert($this->table, [
      "id_jenis"  =>  $this->input->post("id_jenis"),  // Proses penambahan data (insert)
      "id_pelanggan"  =>  $this->input->post("id_pelanggan"),  // Proses penambahan data (insert)
      "status"  =>  $this->input->post("status"),  // Proses penambahan data (insert)
      "dp"  =>  $this->input->post("dp")  // Proses penambahan data (insert)
    ]);
    header("Location: ".site_url("admin/transaksi")); // Arahkan kembali user ke halaman daftar
  }
  
  // Method untuk menampilkan form edit
  public function edit()
  {
    $this->_dts['data_program'] = $this->db->query("SELECT CONCAT(a.nama_program, ' ', b.nm_jenis) AS nm_program, b.id_jenis FROM tb_program a JOIN tb_jenisprogram b ON a.id_program = b.id_program")->fetchAll(PDO::FETCH_ASSOC);
    $this->_dts['data_pelanggan'] = $this->db->select("tb_pelanggan", "*");
    $this->_dts['detail'] = $this->db->get($this->table, "*", ['no_registrasi' => $this->input->get('no_registrasi')]); // Ambil data yang akan diedit berdasarkan ID
    $this->view('admin.transaksi.edit', $this->_dts); // Oper data ke view
  }
  
  // Method untuk memproses data yang akan diedit
  public function prosesEdit()
  {
    $this->db->update($this->table, 
    [
      "id_jenis"  =>  $this->input->post("id_jenis"),  // Proses penambahan data (edit)
      "id_pelanggan"  =>  $this->input->post("id_pelanggan"),  // Proses penambahan data (insert)
      "status"  =>  $this->input->post("status"),  // Proses penambahan data (insert)
      "dp"  =>  $this->input->post("dp")  // Proses penambahan data (insert)
    ],
    [
      "no_registrasi" => $this->input->post("no_registrasi") // ID data yang akan diedit
    ]);
    header("Location: ".site_url("admin/transaksi")); // Arahkan user kembali ke halaman daftar
  }
  
  // Method untuk menghapus data
  public function prosesHapus()
  {
    $this->db->delete($this->table, ['no_registrasi' => $this->input->get('no_registrasi')]); // Proses hapus data
    header("Location: ".site_url("admin/transaksi")); // // Arahkan user kembali ke halaman daftar
  }
}
