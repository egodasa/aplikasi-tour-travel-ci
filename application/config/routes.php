<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Halaman/login';
$route['404_override'] = 'Autentikasi/dilarang';
$route['translate_uri_dashes'] = FALSE;


// Route admin

// Kelola Data program
$route['admin/program']['GET'] = 'KelolaProgram/daftar';                // Lihat Data
$route['admin/program/tambah']['POST'] = 'KelolaProgram/prosesTambah';  // Proses Tambah Data
$route['admin/program/edit']['POST'] = 'KelolaProgram/prosesEdit';             // Proses Edit Data
$route['admin/program/hapus']['GET'] = 'KelolaProgram/prosesHapus';     // Hapus Data
// EOF Kelola Data program

// Kelola Data jenisprogram
$route['admin/jenisprogram']['GET'] = 'KelolaJenisProgram/daftar';                // Lihat Data
$route['admin/jenisprogram/tambah']['POST'] = 'KelolaJenisProgram/prosesTambah';  // Proses Tambah Data
$route['admin/jenisprogram/edit']['POST'] = 'KelolaJenisProgram/prosesEdit';             // Proses Edit Data
$route['admin/jenisprogram/hapus']['GET'] = 'KelolaJenisProgram/prosesHapus';     // Hapus Data
// EOF Kelola Data jenisprogram

// Kelola Data pengguna
$route['admin/pengguna']['GET'] = 'KelolaPengguna/daftar';                // Lihat Data
$route['admin/pengguna/tambah']['GET'] = 'KelolaPengguna/tambah';         // Tambah Data
$route['admin/pengguna/tambah']['POST'] = 'KelolaPengguna/prosesTambah';  // Proses Tambah Data
$route['admin/pengguna/edit']['GET'] = 'KelolaPengguna/edit';             // Edit Data
$route['admin/pengguna/edit']['POST'] = 'KelolaPengguna/prosesEdit';             // Proses Edit Data
$route['admin/pengguna/hapus']['GET'] = 'KelolaPengguna/prosesHapus';     // Hapus Data
// EOF Kelola Data pengguna


// Kelola Data peserta
$route['admin/peserta']['GET'] = 'KelolaPeserta/daftar';                // Lihat Data
$route['admin/peserta/tambah']['GET'] = 'KelolaPeserta/tambah';         // Tambah Data
$route['admin/peserta/tambah']['POST'] = 'KelolaPeserta/prosesTambah';  // Proses Tambah Data
$route['admin/peserta/edit']['GET'] = 'KelolaPeserta/edit';             // Edit Data
$route['admin/peserta/edit']['POST'] = 'KelolaPeserta/prosesEdit';             // Proses Edit Data
$route['admin/peserta/hapus']['GET'] = 'KelolaPeserta/prosesHapus';     // Hapus Data
// EOF Kelola Data pelanggan


// Kelola Data jadwalkeberangkatan
$route['admin/keberangkatan']['GET'] = 'KelolaKeberangkatan/daftar';                // Lihat Data
$route['admin/keberangkatan/tambah']['GET'] = 'KelolaKeberangkatan/tambah';         // Tambah Data
$route['admin/keberangkatan/tambah']['POST'] = 'KelolaKeberangkatan/prosesTambah';  // Proses Tambah Data
$route['admin/keberangkatan/edit']['GET'] = 'KelolaKeberangkatan/edit';             // Edit Data
$route['admin/keberangkatan/edit']['POST'] = 'KelolaKeberangkatan/prosesEdit';             // Proses Edit Data
$route['admin/keberangkatan/hapus']['GET'] = 'KelolaKeberangkatan/prosesHapus';     // Hapus Data
$route['admin/keberangkatan/peserta']['GET'] = 'KelolaKeberangkatan/kelolaPesertaKeberangkatan';     // Hapus Data
$route['admin/keberangkatan/peserta/hapus']['GET'] = 'KelolaKeberangkatan/hapusPesertaKeberangkatan';     // Hapus Data
// EOF Kelola Data jadwalkeberangkatan


// Kelola Data transaksi
$route['admin/transaksi']['GET'] = 'KelolaTransaksi/daftar';                // Lihat Data
$route['admin/transaksi/tambah']['POST'] = 'KelolaTransaksi/prosesTambah';  // Proses Tambah Data
$route['admin/transaksi/edit']['POST'] = 'KelolaTransaksi/prosesEdit';             // Proses Edit Data
$route['admin/transaksi/hapus']['GET'] = 'KelolaTransaksi/prosesHapus';     // Hapus Data
// EOF Kelola Data transaksi

// Kelola Data peserta-transaksi
$route['admin/peserta-transaksi']['GET'] = 'KelolaPesertaTransaksi/daftar';                // Lihat Data
$route['admin/peserta-transaksi/tambah']['POST'] = 'KelolaPesertaTransaksi/prosesTambah';  // Proses Tambah Data
$route['admin/peserta-transaksi/edit']['POST'] = 'KelolaPesertaTransaksi/prosesEdit';             // Proses Edit Data
$route['admin/peserta-transaksi/hapus']['GET'] = 'KelolaPesertaTransaksi/prosesHapus';     // Hapus Data
// EOF Kelola Data peserta-transaksi

// Kelola Data angsuran
$route['admin/angsuran']['GET'] = 'KelolaAngsuran/daftar';                // Lihat Data
$route['admin/angsuran/tambah']['POST'] = 'KelolaAngsuran/prosesTambah';  // Proses Tambah Data
$route['admin/angsuran/edit']['POST'] = 'KelolaAngsuran/prosesEdit';             // Proses Edit Data
$route['admin/angsuran/hapus']['GET'] = 'KelolaAngsuran/prosesHapus';     // Hapus Data

// Kelola Data jadwal
$route['admin/jadwal/(:num)']['GET'] = 'KelolaJadwal/daftar/$1';                // Lihat Data
$route['admin/jadwal/tambah']['GET'] = 'KelolaJadwal/tambah';         // Tambah Data
$route['admin/jadwal/tambah']['POST'] = 'KelolaJadwal/prosesTambah';  // Proses Tambah Data
$route['admin/jadwal/edit']['GET'] = 'KelolaJadwal/edit';             // Edit Data
$route['admin/jadwal/edit']['POST'] = 'KelolaJadwal/prosesEdit';             // Proses Edit Data
$route['admin/jadwal/hapus']['GET'] = 'KelolaJadwal/prosesHapus';     // Hapus Data
// EOF Kelola Data angsuran



// Halaman khusus member
$route['jadwalkeberangkatan']['GET'] = 'KelolaJadwalKeberangkatan/daftarJadwalKeberangkatan';
$route['jadwalkeberangkatan/peserta']['GET'] = 'KelolaJadwalKeberangkatan/pesertaKeberangkatan';
// EOF Halaman khusus member


// Route untuk login, register dsm
$route['login']['GET'] = 'Halaman/login'; 
$route['login']['POST'] = 'Halaman/prosesLogin'; 
$route['register']['GET'] = 'Halaman/register'; 
$route['register']['POST'] = 'Halaman/prosesRegister'; 
$route['logout']['GET'] = 'Halaman/prosesLogout'; 
$route['beranda']['GET'] = 'Halaman/beranda';

$route['404']['GET'] = 'Autentikasi/dilarang'; 


// EOF Route admin
