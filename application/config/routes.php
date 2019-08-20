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
$route['default_controller'] = 'HalamanFrontend/home';
$route['404_override'] = 'Autentikasi/dilarang';
$route['translate_uri_dashes'] = FALSE;


// Route admin

// Kelola Data program
$route['program']['GET'] = 'KelolaProgram/daftar';                // Lihat Data
$route['program/tambah']['POST'] = 'KelolaProgram/prosesTambah';  // Proses Tambah Data
$route['program/edit']['POST'] = 'KelolaProgram/prosesEdit';             // Proses Edit Data
$route['program/hapus']['GET'] = 'KelolaProgram/prosesHapus';     // Hapus Data
// EOF Kelola Data program

// Kelola Data jenisprogram
$route['jenisprogram']['GET'] = 'KelolaJenisProgram/daftar';                // Lihat Data
$route['jenisprogram/tambah']['POST'] = 'KelolaJenisProgram/prosesTambah';  // Proses Tambah Data
$route['jenisprogram/edit']['POST'] = 'KelolaJenisProgram/prosesEdit';             // Proses Edit Data
$route['jenisprogram/hapus']['GET'] = 'KelolaJenisProgram/prosesHapus';     // Hapus Data
// EOF Kelola Data jenisprogram

// Kelola Data pengguna
$route['pengguna']['GET'] = 'KelolaPengguna/daftar';                // Tambah Data
$route['pengguna/tambah']['POST'] = 'KelolaPengguna/prosesTambah';  // Proses Tambah Data
$route['pengguna/edit']['POST'] = 'KelolaPengguna/prosesEdit';             // Proses Edit Data
$route['pengguna/hapus']['GET'] = 'KelolaPengguna/prosesHapus';     // Hapus Data
// EOF Kelola Data pengguna


// Kelola Data peserta
$route['peserta']['GET'] = 'KelolaPeserta/daftar';                // Lihat Data
$route['peserta/tambah']['POST'] = 'KelolaPeserta/prosesTambah';  // Proses Tambah Data
$route['peserta/edit']['POST'] = 'KelolaPeserta/prosesEdit';             // Proses Edit Data
$route['peserta/hapus']['GET'] = 'KelolaPeserta/prosesHapus';     // Hapus Data
// EOF Kelola Data pelanggan


// Kelola Data jadwalkeberangkatan
$route['keberangkatan']['GET'] = 'KelolaKeberangkatan/daftar';                // Lihat Data
$route['keberangkatan/tambah']['POST'] = 'KelolaKeberangkatan/prosesTambah';  // Proses Tambah Data
$route['keberangkatan/edit']['POST'] = 'KelolaKeberangkatan/prosesEdit';             // Proses Edit Data
$route['keberangkatan/hapus']['GET'] = 'KelolaKeberangkatan/prosesHapus';     // Hapus Data
// EOF Kelola Data jadwalkeberangkatan


// Kelola Data transaksi
$route['transaksi']['GET'] = 'KelolaTransaksi/daftar';                // Lihat Data
$route['transaksi/tambah']['POST'] = 'KelolaTransaksi/prosesTambah';  // Proses Tambah Data
$route['transaksi/edit']['POST'] = 'KelolaTransaksi/prosesEdit';             // Proses Edit Data
$route['transaksi/hapus']['GET'] = 'KelolaTransaksi/prosesHapus';     // Hapus Data
// EOF Kelola Data transaksi

// Kelola Data peserta-transaksi
$route['peserta-transaksi']['GET'] = 'KelolaPesertaTransaksi/daftar';                // Lihat Data
$route['peserta-transaksi/tambah']['POST'] = 'KelolaPesertaTransaksi/prosesTambah';  // Proses Tambah Data
$route['peserta-transaksi/edit']['POST'] = 'KelolaPesertaTransaksi/prosesEdit';             // Proses Edit Data
$route['peserta-transaksi/hapus']['GET'] = 'KelolaPesertaTransaksi/prosesHapus';     // Hapus Data
// EOF Kelola Data peserta-transaksi

// Kelola Data angsuran
$route['angsuran']['GET'] = 'KelolaAngsuran/daftar';                // Lihat Data
$route['angsuran/tambah']['POST'] = 'KelolaAngsuran/prosesTambah';  // Proses Tambah Data
$route['angsuran/edit']['POST'] = 'KelolaAngsuran/prosesEdit';             // Proses Edit Data
$route['angsuran/hapus']['GET'] = 'KelolaAngsuran/prosesHapus';     // Hapus Data


// Route untuk login, register dsm
$route['login']['GET'] = 'Halaman/login'; 
$route['login']['POST'] = 'Halaman/prosesLogin'; 
$route['register']['GET'] = 'Halaman/register'; 
$route['register']['POST'] = 'Halaman/prosesRegister'; 
$route['logout']['GET'] = 'Halaman/prosesLogout'; 
$route['beranda']['GET'] = 'Halaman/beranda';


$route['cara-haji'] = 'HalamanFrontend/caraHaji';
$route['cara-umroh'] = 'HalamanFrontend/caraUmroh';
$route['info-wisata'] = 'HalamanFrontend/infoWisata';

$route['pendaftaran-haji'] = 'HalamanFrontend/pendaftaranHaji';
$route['pendaftaran-umroh'] = 'HalamanFrontend/pendaftaranUmroh';
$route['pendaftaran-wisata'] = 'HalamanFrontend/pendaftaranWisata';

$route['persyaratan-haji'] = 'HalamanFrontend/persyaratanHaji';
$route['persyaratan-umroh'] = 'HalamanFrontend/persyaratanUmroh';
$route['persyaratan-wisata'] = 'HalamanFrontend/persyaratanWisata';


$route['404']['GET'] = 'Autentikasi/dilarang'; 


// EOF Route admin
