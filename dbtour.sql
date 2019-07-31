-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2019 at 06:35 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtour`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_angsuran`
--

CREATE TABLE `tb_angsuran` (
  `id_angsuran` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `juml_bayar` int(11) NOT NULL,
  `no_registrasi` int(11) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwalkeberangkatan`
--

CREATE TABLE `tb_jadwalkeberangkatan` (
  `id_jadwal` int(11) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `nama_maskapai` varchar(50) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenisprogram`
--

CREATE TABLE `tb_jenisprogram` (
  `id_jenis` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nama_panggilan` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `tempat_lahir` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kel` int(11) NOT NULL,
  `tlp_rumah` varchar(20) NOT NULL,
  `tlp_kantor` varchar(20) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `warga_negara` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `ukuran_baju` varchar(20) NOT NULL,
  `nama_ahliwaris` varchar(50) NOT NULL,
  `hubungan_ahliwaris` varchar(50) NOT NULL,
  `jk_ahliwaris` varchar(20) NOT NULL,
  `kode_pos` varchar(20) NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_program`
--

CREATE TABLE `tb_program` (
  `id_program` int(11) NOT NULL,
  `nama_program` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `no_registrasi` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `dp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  ADD PRIMARY KEY (`id_angsuran`);

--
-- Indexes for table `tb_jadwalkeberangkatan`
--
ALTER TABLE `tb_jadwalkeberangkatan`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tb_jenisprogram`
--
ALTER TABLE `tb_jenisprogram`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_program`
--
ALTER TABLE `tb_program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`no_registrasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  MODIFY `id_angsuran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jadwalkeberangkatan`
--
ALTER TABLE `tb_jadwalkeberangkatan`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jenisprogram`
--
ALTER TABLE `tb_jenisprogram`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_program`
--
ALTER TABLE `tb_program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `no_registrasi` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
