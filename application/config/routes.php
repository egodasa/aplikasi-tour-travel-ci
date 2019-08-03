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
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// Route admin

// Kelola Data program
$route['admin/program']['GET'] = 'admin/KelolaProgram/daftar';                // Lihat Data
$route['admin/program/tambah']['GET'] = 'admin/KelolaProgram/tambah';         // Tambah Data
$route['admin/program/tambah']['POST'] = 'admin/KelolaProgram/prosesTambah';  // Proses Tambah Data
$route['admin/program/edit']['GET'] = 'admin/KelolaProgram/edit';             // Edit Data
$route['admin/program/edit']['POST'] = 'admin/KelolaProgram/prosesEdit';             // Proses Edit Data
$route['admin/program/hapus']['GET'] = 'admin/KelolaProgram/prosesHapus';     // Hapus Data
// EOF Kelola Data program

// Kelola Data jenisprogram
$route['admin/jenisprogram']['GET'] = 'admin/KelolaJenisProgram/daftar';                // Lihat Data
$route['admin/jenisprogram/tambah']['GET'] = 'admin/KelolaJenisProgram/tambah';         // Tambah Data
$route['admin/jenisprogram/tambah']['POST'] = 'admin/KelolaJenisProgram/prosesTambah';  // Proses Tambah Data
$route['admin/jenisprogram/edit']['GET'] = 'admin/KelolaJenisProgram/edit';             // Edit Data
$route['admin/jenisprogram/edit']['POST'] = 'admin/KelolaJenisProgram/prosesEdit';             // Proses Edit Data
$route['admin/jenisprogram/hapus']['GET'] = 'admin/KelolaJenisProgram/prosesHapus';     // Hapus Data
// EOF Kelola Data jenisprogram

// Kelola Data pengguna
$route['admin/pengguna']['GET'] = 'admin/KelolaPengguna/daftar';                // Lihat Data
$route['admin/pengguna/tambah']['GET'] = 'admin/KelolaPengguna/tambah';         // Tambah Data
$route['admin/pengguna/tambah']['POST'] = 'admin/KelolaPengguna/prosesTambah';  // Proses Tambah Data
$route['admin/pengguna/edit']['GET'] = 'admin/KelolaPengguna/edit';             // Edit Data
$route['admin/pengguna/edit']['POST'] = 'admin/KelolaPengguna/prosesEdit';             // Proses Edit Data
$route['admin/pengguna/hapus']['GET'] = 'admin/KelolaPengguna/prosesHapus';     // Hapus Data
// EOF Kelola Data pengguna


// Kelola Data pelanggan
$route['admin/pelanggan']['GET'] = 'admin/KelolaPelanggan/daftar';                // Lihat Data
$route['admin/pelanggan/tambah']['GET'] = 'admin/KelolaPelanggan/tambah';         // Tambah Data
$route['admin/pelanggan/tambah']['POST'] = 'admin/KelolaPelanggan/prosesTambah';  // Proses Tambah Data
$route['admin/pelanggan/edit']['GET'] = 'admin/KelolaPelanggan/edit';             // Edit Data
$route['admin/pelanggan/edit']['POST'] = 'admin/KelolaPelanggan/prosesEdit';             // Proses Edit Data
$route['admin/pelanggan/hapus']['GET'] = 'admin/KelolaPelanggan/prosesHapus';     // Hapus Data
// EOF Kelola Data pelanggan


// Kelola Data jadwalkeberangkatan
$route['admin/jadwalkeberangkatan']['GET'] = 'admin/KelolaJadwalKeberangkatan/daftar';                // Lihat Data
$route['admin/jadwalkeberangkatan/tambah']['GET'] = 'admin/KelolaJadwalKeberangkatan/tambah';         // Tambah Data
$route['admin/jadwalkeberangkatan/tambah']['POST'] = 'admin/KelolaJadwalKeberangkatan/prosesTambah';  // Proses Tambah Data
$route['admin/jadwalkeberangkatan/edit']['GET'] = 'admin/KelolaJadwalKeberangkatan/edit';             // Edit Data
$route['admin/jadwalkeberangkatan/edit']['POST'] = 'admin/KelolaJadwalKeberangkatan/prosesEdit';             // Proses Edit Data
$route['admin/jadwalkeberangkatan/hapus']['GET'] = 'admin/KelolaJadwalKeberangkatan/prosesHapus';     // Hapus Data
// EOF Kelola Data jadwalkeberangkatan


// Kelola Data transaksi
$route['admin/transaksi']['GET'] = 'admin/KelolaTransaksi/daftar';                // Lihat Data
$route['admin/transaksi/tambah']['GET'] = 'admin/KelolaTransaksi/tambah';         // Tambah Data
$route['admin/transaksi/tambah']['POST'] = 'admin/KelolaTransaksi/prosesTambah';  // Proses Tambah Data
$route['admin/transaksi/edit']['GET'] = 'admin/KelolaTransaksi/edit';             // Edit Data
$route['admin/transaksi/edit']['POST'] = 'admin/KelolaTransaksi/prosesEdit';             // Proses Edit Data
$route['admin/transaksi/hapus']['GET'] = 'admin/KelolaTransaksi/prosesHapus';     // Hapus Data
// EOF Kelola Data transaksi

// Kelola Data angsuran
$route['admin/angsuran']['GET'] = 'admin/KelolaAngsuran/daftar';                // Lihat Data
$route['admin/angsuran/tambah']['GET'] = 'admin/KelolaAngsuran/tambah';         // Tambah Data
$route['admin/angsuran/tambah']['POST'] = 'admin/KelolaAngsuran/prosesTambah';  // Proses Tambah Data
$route['admin/angsuran/edit']['GET'] = 'admin/KelolaAngsuran/edit';             // Edit Data
$route['admin/angsuran/edit']['POST'] = 'admin/KelolaAngsuran/prosesEdit';             // Proses Edit Data
$route['admin/angsuran/hapus']['GET'] = 'admin/KelolaAngsuran/prosesHapus';     // Hapus Data
// EOF Kelola Data angsuran




// EOF Route admin
/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/

$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
