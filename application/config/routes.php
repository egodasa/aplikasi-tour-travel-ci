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
$route['default_controller'] = 'contoh';
$route['404_override'] = 'Autentikasi/dilarang';
$route['translate_uri_dashes'] = FALSE;


// Route admin

// Kelola Data program
$route['program']['GET'] = 'admin/KelolaProgram/daftar';                // Lihat Data
$route['program/tambah']['GET'] = 'admin/KelolaProgram/tambah';         // Tambah Data
$route['program/tambah']['POST'] = 'admin/KelolaProgram/prosesTambah';  // Proses Tambah Data
$route['program/edit']['GET'] = 'admin/KelolaProgram/edit';             // Edit Data
$route['program/edit']['POST'] = 'admin/KelolaProgram/prosesEdit';             // Proses Edit Data
$route['program/hapus']['GET'] = 'admin/KelolaProgram/prosesHapus';     // Hapus Data
// EOF Kelola Data program

// Kelola Data jenisprogram
$route['jenisprogram']['GET'] = 'admin/KelolaJenisProgram/daftar';                // Lihat Data
$route['jenisprogram/tambah']['GET'] = 'admin/KelolaJenisProgram/tambah';         // Tambah Data
$route['jenisprogram/tambah']['POST'] = 'admin/KelolaJenisProgram/prosesTambah';  // Proses Tambah Data
$route['jenisprogram/edit']['GET'] = 'admin/KelolaJenisProgram/edit';             // Edit Data
$route['jenisprogram/edit']['POST'] = 'admin/KelolaJenisProgram/prosesEdit';             // Proses Edit Data
$route['jenisprogram/hapus']['GET'] = 'admin/KelolaJenisProgram/prosesHapus';     // Hapus Data
// EOF Kelola Data jenisprogram

// Kelola Data pengguna
$route['pengguna']['GET'] = 'admin/KelolaPengguna/daftar';                // Lihat Data
$route['pengguna/tambah']['GET'] = 'admin/KelolaPengguna/tambah';         // Tambah Data
$route['pengguna/tambah']['POST'] = 'admin/KelolaPengguna/prosesTambah';  // Proses Tambah Data
$route['pengguna/edit']['GET'] = 'admin/KelolaPengguna/edit';             // Edit Data
$route['pengguna/edit']['POST'] = 'admin/KelolaPengguna/prosesEdit';             // Proses Edit Data
$route['pengguna/hapus']['GET'] = 'admin/KelolaPengguna/prosesHapus';     // Hapus Data
// EOF Kelola Data pengguna


// Kelola Data pelanggan
$route['pelanggan']['GET'] = 'admin/KelolaPelanggan/daftar';                // Lihat Data
$route['pelanggan/tambah']['GET'] = 'admin/KelolaPelanggan/tambah';         // Tambah Data
$route['pelanggan/tambah']['POST'] = 'admin/KelolaPelanggan/prosesTambah';  // Proses Tambah Data
$route['pelanggan/edit']['GET'] = 'admin/KelolaPelanggan/edit';             // Edit Data
$route['pelanggan/edit']['POST'] = 'admin/KelolaPelanggan/prosesEdit';             // Proses Edit Data
$route['pelanggan/hapus']['GET'] = 'admin/KelolaPelanggan/prosesHapus';     // Hapus Data
// EOF Kelola Data pelanggan


// Kelola Data jadwalkeberangkatan
$route['jadwalkeberangkatan']['GET'] = 'admin/KelolaJadwalKeberangkatan/daftar';                // Lihat Data
$route['jadwalkeberangkatan/tambah']['GET'] = 'admin/KelolaJadwalKeberangkatan/tambah';         // Tambah Data
$route['jadwalkeberangkatan/tambah']['POST'] = 'admin/KelolaJadwalKeberangkatan/prosesTambah';  // Proses Tambah Data
$route['jadwalkeberangkatan/edit']['GET'] = 'admin/KelolaJadwalKeberangkatan/edit';             // Edit Data
$route['jadwalkeberangkatan/edit']['POST'] = 'admin/KelolaJadwalKeberangkatan/prosesEdit';             // Proses Edit Data
$route['jadwalkeberangkatan/hapus']['GET'] = 'admin/KelolaJadwalKeberangkatan/prosesHapus';     // Hapus Data
// EOF Kelola Data jadwalkeberangkatan


// Kelola Data transaksi
$route['transaksi']['GET'] = 'admin/KelolaTransaksi/daftar';                // Lihat Data
$route['transaksi/tambah']['GET'] = 'admin/KelolaTransaksi/tambah';         // Tambah Data
$route['transaksi/tambah']['POST'] = 'admin/KelolaTransaksi/prosesTambah';  // Proses Tambah Data
$route['transaksi/edit']['GET'] = 'admin/KelolaTransaksi/edit';             // Edit Data
$route['transaksi/edit']['POST'] = 'admin/KelolaTransaksi/prosesEdit';             // Proses Edit Data
$route['transaksi/hapus']['GET'] = 'admin/KelolaTransaksi/prosesHapus';     // Hapus Data
// EOF Kelola Data transaksi

// Kelola Data angsuran
$route['angsuran']['GET'] = 'admin/KelolaAngsuran/daftar';                // Lihat Data
$route['angsuran/tambah']['GET'] = 'admin/KelolaAngsuran/tambah';         // Tambah Data
$route['angsuran/tambah']['POST'] = 'admin/KelolaAngsuran/prosesTambah';  // Proses Tambah Data
$route['angsuran/edit']['GET'] = 'admin/KelolaAngsuran/edit';             // Edit Data
$route['angsuran/edit']['POST'] = 'admin/KelolaAngsuran/prosesEdit';             // Proses Edit Data
$route['angsuran/hapus']['GET'] = 'admin/KelolaAngsuran/prosesHapus';     // Hapus Data
// EOF Kelola Data angsuran

// Route untuk login, register dsm
$route['login']['GET'] = 'Autentikasi/login'; 
$route['login']['POST'] = 'Autentikasi/prosesLogin'; 
$route['register']['GET'] = 'Autentikasi/register'; 
$route['register']['POST'] = 'Autentikasi/prosesRegister'; 
$route['logout']['GET'] = 'Autentikasi/prosesLogout'; 

$route['404']['GET'] = 'Autentikasi/dilarang'; 


// EOF Route admin
