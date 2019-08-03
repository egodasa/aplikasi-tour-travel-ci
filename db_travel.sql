-- Adminer 4.7.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tb_angsuran`;
CREATE TABLE `tb_angsuran` (
  `id_angsuran` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_bayar` date NOT NULL,
  `juml_bayar` int(11) NOT NULL,
  `no_registrasi` int(11) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL,
  PRIMARY KEY (`id_angsuran`),
  KEY `no_registrasi` (`no_registrasi`),
  CONSTRAINT `tb_angsuran_ibfk_1` FOREIGN KEY (`no_registrasi`) REFERENCES `tb_transaksi` (`no_registrasi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_jadwalkeberangkatan`;
CREATE TABLE `tb_jadwalkeberangkatan` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_berangkat` date NOT NULL,
  `nama_maskapai` varchar(50) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `id_jenis` (`id_jenis`),
  CONSTRAINT `tb_jadwalkeberangkatan_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenisprogram` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_jenisprogram`;
CREATE TABLE `tb_jenisprogram` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `id_program` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_jenis`),
  KEY `id_program` (`id_program`),
  CONSTRAINT `tb_jenisprogram_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `tb_program` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_keberangkatan`;
CREATE TABLE `tb_keberangkatan` (
  `id_keberangkatan` int(11) NOT NULL AUTO_INCREMENT,
  `no_registrasi` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id_keberangkatan`),
  KEY `no_registrasi` (`no_registrasi`),
  KEY `id_jadwal` (`id_jadwal`),
  CONSTRAINT `tb_keberangkatan_ibfk_1` FOREIGN KEY (`no_registrasi`) REFERENCES `tb_transaksi` (`no_registrasi`) ON DELETE CASCADE,
  CONSTRAINT `tb_keberangkatan_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `tb_jadwalkeberangkatan` (`id_jadwal`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_pelanggan`;
CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
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
  `rw` varchar(10) NOT NULL,
  PRIMARY KEY (`id_pelanggan`),
  KEY `id_pengguna` (`id_pengguna`),
  CONSTRAINT `tb_pelanggan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_pengguna`;
CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_program`;
CREATE TABLE `tb_program` (
  `id_program` int(11) NOT NULL AUTO_INCREMENT,
  `nama_program` varchar(50) NOT NULL,
  PRIMARY KEY (`id_program`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_transaksi`;
CREATE TABLE `tb_transaksi` (
  `no_registrasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `dp` int(11) NOT NULL,
  PRIMARY KEY (`no_registrasi`),
  KEY `id_jenis` (`id_jenis`),
  KEY `id_pelanggan` (`id_pelanggan`),
  CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenisprogram` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2019-08-01 03:58:57
