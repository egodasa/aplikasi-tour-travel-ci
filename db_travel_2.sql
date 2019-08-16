-- Adminer 4.7.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tb_angsuran`;
CREATE TABLE `tb_angsuran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_bayar` date NOT NULL,
  `juml_bayar` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `status_pembayaran` enum('Sedang Diproses','Sudah Bayar','Ditolak') NOT NULL DEFAULT 'Sedang Diproses',
  `jenis_pembayaran` enum('DP','Angsuran') NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `no_registrasi` (`id_transaksi`),
  CONSTRAINT `tb_angsuran_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_jenis_program`;
CREATE TABLE `tb_jenis_program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_program` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `nm_jenis` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_program` (`id_program`),
  CONSTRAINT `tb_jenis_program_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `tb_program` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_keberangkatan`;
CREATE TABLE `tb_keberangkatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_berangkat` date NOT NULL,
  `nama_maskapai` varchar(50) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`),
  KEY `id_jenis` (`id_jenis`),
  CONSTRAINT `tb_keberangkatan_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis_program` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_kota`;
CREATE TABLE `tb_kota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_provinsi` int(11) NOT NULL,
  `nm_kota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `regencies_province_id_index` (`id_provinsi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `tb_pengguna`;
CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_peserta`;
CREATE TABLE `tb_peserta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) NOT NULL,
  `nama_panggilan` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `tempat_lahir` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kel` varchar(100) NOT NULL,
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
  `rw` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pengguna` (`id_pengguna`),
  KEY `tempat_lahir` (`tempat_lahir`),
  CONSTRAINT `tb_peserta_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_peserta_ibfk_2` FOREIGN KEY (`tempat_lahir`) REFERENCES `tb_kota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_peserta_keberangkatan`;
CREATE TABLE `tb_peserta_keberangkatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) NOT NULL,
  `id_keberangkatan` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `no_registrasi` (`id_transaksi`),
  KEY `id_jadwal` (`id_keberangkatan`),
  CONSTRAINT `tb_peserta_keberangkatan_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tb_peserta_keberangkatan_ibfk_2` FOREIGN KEY (`id_keberangkatan`) REFERENCES `tb_keberangkatan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_peserta_transaksi`;
CREATE TABLE `tb_peserta_transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_peserta` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_program`;
CREATE TABLE `tb_program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_program` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_provinsi`;
CREATE TABLE `tb_provinsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_provinsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `tb_transaksi`;
CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis` int(11) NOT NULL,
  `dp` int(11) NOT NULL,
  `status` enum('Aktif','Dibatalkan') NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_jenis` (`id_jenis`),
  KEY `id_pengguna` (`id_pengguna`),
  CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis_program` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2019-08-16 17:21:20
