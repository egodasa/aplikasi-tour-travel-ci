-- Adminer 4.7.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP VIEW IF EXISTS `angsuran_sudah_dibayar`;
CREATE TABLE `angsuran_sudah_dibayar` (`id_transaksi` int(11), `sudah_dibayar` decimal(32,0));


DROP VIEW IF EXISTS `banyak_peserta_transaksi`;
CREATE TABLE `banyak_peserta_transaksi` (`id_transaksi` int(11), `banyak_peserta` bigint(21));


DROP VIEW IF EXISTS `data_angsuran`;
CREATE TABLE `data_angsuran` (`id_jenis` int(11), `dp` int(11), `status` enum('Aktif','Dibatalkan'), `id_pengguna` int(11), `username` varchar(20), `email` varchar(50), `nohp` varchar(15), `tgl_bayar` date, `juml_bayar` int(11), `id_transaksi` int(11), `jenis_pembayaran` enum('DP','Angsuran'), `keterangan` varchar(255), `id` int(11));


DROP VIEW IF EXISTS `data_jenis_program`;
CREATE TABLE `data_jenis_program` (`nama_program` varchar(101), `kuota` int(11), `id` int(11), `id_program` int(11), `harga` int(11), `nm_jenis` varchar(50), `dp` int(11));


DROP VIEW IF EXISTS `data_keberangkatan`;
CREATE TABLE `data_keberangkatan` (`id` int(11), `tgl_berangkat` date, `nama_maskapai` varchar(50), `id_jenis` int(11), `status` varchar(50), `keterangan` text, `nama_program` varchar(50), `nm_jenis` varchar(50), `id_program` int(11));


DROP VIEW IF EXISTS `data_peserta`;
CREATE TABLE `data_peserta` (`nama_lengkap` varchar(100), `nama_panggilan` varchar(50), `jenis_kelamin` varchar(20), `id_pengguna` int(11), `no_identitas` varchar(20), `tempat_lahir` int(11), `tgl_lahir` date, `alamat` varchar(255), `kel` varchar(100), `tlp_rumah` varchar(20), `tlp_kantor` varchar(20), `nohp` varchar(20), `email` varchar(50), `warga_negara` varchar(50), `pekerjaan` varchar(50), `ukuran_baju` varchar(20), `nama_ahliwaris` varchar(50), `hubungan_ahliwaris` varchar(50), `jk_ahliwaris` varchar(20), `kode_pos` varchar(20), `rt` varchar(10), `rw` varchar(10), `nm_kota` varchar(255), `id` int(11));


DROP VIEW IF EXISTS `data_peserta_keberangkatan`;
CREATE TABLE `data_peserta_keberangkatan` (`id` int(11), `nama_lengkap` varchar(100), `nama_panggilan` varchar(50), `jenis_kelamin` varchar(20), `no_identitas` varchar(20), `tempat_lahir` int(11), `tgl_lahir` date, `alamat` varchar(255), `kel` varchar(100), `tlp_rumah` varchar(20), `tlp_kantor` varchar(20), `nohp` varchar(20), `email` varchar(50), `warga_negara` varchar(50), `pekerjaan` varchar(50), `ukuran_baju` varchar(20), `nama_ahliwaris` varchar(50), `hubungan_ahliwaris` varchar(50), `jk_ahliwaris` varchar(20), `kode_pos` varchar(20), `rt` varchar(10), `rw` varchar(10), `nm_kota` varchar(255), `id_keberangkatan` int(11), `id_peserta_transaksi` int(11), `nama_program` varchar(50), `nm_jenis` varchar(50), `id_transaksi` int(11));


DROP VIEW IF EXISTS `data_peserta_transaksi`;
CREATE TABLE `data_peserta_transaksi` (`id_jenis` int(11), `total_bayar` bigint(22), `sudah_dibayar` decimal(32,0), `id` int(11), `id_peserta` int(11), `id_transaksi` int(11), `status` varchar(50), `keterangan` varchar(50), `nama_lengkap` varchar(100), `nama_panggilan` varchar(50), `jenis_kelamin` varchar(20), `no_identitas` varchar(20), `tempat_lahir` int(11), `tgl_lahir` date, `alamat` varchar(255), `kel` varchar(100), `tlp_rumah` varchar(20), `tlp_kantor` varchar(20), `nohp` varchar(20), `email` varchar(50), `warga_negara` varchar(50), `pekerjaan` varchar(50), `ukuran_baju` varchar(20), `nama_ahliwaris` varchar(50), `hubungan_ahliwaris` varchar(50), `jk_ahliwaris` varchar(20), `kode_pos` varchar(20), `rt` varchar(10), `rw` varchar(10), `nm_kota` varchar(255));


DROP VIEW IF EXISTS `data_transaksi`;
CREATE TABLE `data_transaksi` (`id` int(11), `id_jenis` int(11), `dp` int(11), `status` enum('Aktif','Dibatalkan'), `id_pengguna` int(11), `sudah_dibayar` decimal(32,0), `total_peserta` bigint(21), `harga` int(11), `nm_jenis` varchar(50), `kuota` int(11), `nama_program` varchar(50), `username` varchar(20), `email` varchar(50), `nohp` varchar(15), `total_bayar` bigint(22));


DROP TABLE IF EXISTS `tb_angsuran`;
CREATE TABLE `tb_angsuran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_bayar` date NOT NULL,
  `juml_bayar` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `jenis_pembayaran` enum('DP','Angsuran') NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `no_registrasi` (`id_transaksi`),
  CONSTRAINT `tb_angsuran_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_angsuran` (`id`, `tgl_bayar`, `juml_bayar`, `id_transaksi`, `jenis_pembayaran`, `keterangan`) VALUES
(1,	'2019-01-01',	100000,	13,	'Angsuran',	'sadad'),
(2,	'2019-01-01',	123123,	13,	'Angsuran',	''),
(3,	'2019-01-02',	321123,	13,	'Angsuran',	''),
(4,	'2019-01-01',	100000,	13,	'Angsuran',	''),
(5,	'1982-09-21',	43,	11,	'Angsuran',	'Nihil velit nostrud '),
(6,	'1992-12-21',	10000000,	14,	'Angsuran',	'Soluta officia minim'),
(7,	'1971-11-10',	4900000,	14,	'Angsuran',	'Perferendis reprehen');

DROP TABLE IF EXISTS `tb_jenis_program`;
CREATE TABLE `tb_jenis_program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_program` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `nm_jenis` varchar(50) NOT NULL,
  `kuota` int(11) NOT NULL,
  `dp` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_program` (`id_program`),
  CONSTRAINT `tb_jenis_program_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `tb_program` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_jenis_program` (`id`, `id_program`, `harga`, `nm_jenis`, `kuota`, `dp`) VALUES
(2,	4,	14000000,	'12 Hari',	1,	1200000),
(3,	6,	13000000,	'9 Hari',	1,	1900000);

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

INSERT INTO `tb_keberangkatan` (`id`, `tgl_berangkat`, `nama_maskapai`, `id_jenis`, `status`, `keterangan`) VALUES
(2,	'2014-11-08',	'Eiusmod perferendis ',	2,	'Sudah Sampai Tujuan',	'Consectetur veniam '),
(3,	'1996-06-21',	'Fugiat nemo et tene',	3,	'Sudah Kembali',	'Consectetur qui in '),
(4,	'1998-01-21',	'Minim optio quibusd',	3,	'Sudah Kembali',	'Eos corporis quo ea ');

DROP TABLE IF EXISTS `tb_kota`;
CREATE TABLE `tb_kota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_provinsi` int(11) NOT NULL,
  `nm_kota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `regencies_province_id_index` (`id_provinsi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tb_kota` (`id`, `id_provinsi`, `nm_kota`) VALUES
(1,	1,	'dsas'),
(2,	2,	'sdsad');

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

INSERT INTO `tb_pengguna` (`id`, `username`, `password`, `email`, `nohp`, `level`) VALUES
(1,	'admin',	'admin',	'admin',	'admin',	'Admin'),
(3,	'mandan',	'qwe123',	'egodasa@gmail.com',	'12345',	'Member');

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

INSERT INTO `tb_peserta` (`id`, `nama_lengkap`, `nama_panggilan`, `jenis_kelamin`, `id_pengguna`, `no_identitas`, `tempat_lahir`, `tgl_lahir`, `alamat`, `kel`, `tlp_rumah`, `tlp_kantor`, `nohp`, `email`, `warga_negara`, `pekerjaan`, `ukuran_baju`, `nama_ahliwaris`, `hubungan_ahliwaris`, `jk_ahliwaris`, `kode_pos`, `rt`, `rw`) VALUES
(2,	'Est porro excepturi ',	'Autem fugit quae te',	'Perempuan',	3,	'Proident nobis cumq',	2,	'2001-03-12',	'Deserunt velit vero',	'Non aut vel omnis ex',	'Sit fugiat rerum sae',	'Officiis nemo modi e',	'Ut distinctio Quod ',	'jazo@mailinator.net',	'Nisi vitae occaecat ',	'Quisquam velit qui ',	'Voluptate vel non ad',	'Dolorum dignissimos ',	'Dolor quo est ea do',	'Perempuan',	'Quis natus ullam est',	'Excepturi ',	'Sed tempor'),
(3,	'Ipsum at laboriosam',	'Aperiam et modi ut q',	'Perempuan',	3,	'Quo magna saepe susc',	2,	'1990-12-23',	'Nulla velit et lore',	'Doloremque eiusmod a',	'Officia laudantium ',	'Ex quisquam aliqua ',	'Dolor est voluptatem',	'nule@mailinator.com',	'Ex voluptas et vitae',	'Molestias magni labo',	'Sed consequat Fugit',	'Aliquid consequuntur',	'Non accusamus possim',	'Perempuan',	'Mollitia voluptas si',	'Quasi debi',	'Suscipit d'),
(4,	'Veniam excepteur de',	'Sunt aliqua Accusam',	'Perempuan',	1,	'Consectetur laborum ',	2,	'2001-02-28',	'Omnis molestias dolo',	'Repudiandae quos ips',	'Autem fugit cupidit',	'Delectus beatae eiu',	'Ut similique aut fug',	'badixude@mailinator.com',	'Consequatur delectu',	'Voluptas soluta volu',	'Sunt incididunt tem',	'Illo incididunt beat',	'Sint ut at laboris c',	'Perempuan',	'Nesciunt dolore tem',	'Aut nostru',	'Quas facil'),
(5,	'Ex aliquid nisi mini',	'Harum tenetur illo q',	'Perempuan',	1,	'Omnis inventore mole',	2,	'2010-02-02',	'Numquam sed veniam ',	'Dolor possimus opti',	'Culpa aut occaecat ',	'Sequi aute qui moles',	'Labore iure minim pe',	'gobilyl@mailinator.com',	'Quisquam molestiae e',	'Quisquam libero solu',	'Quo est quo ut culpa',	'Officia commodi quod',	'Rem qui id voluptatu',	'Perempuan',	'Sit deleniti sunt au',	'A tempore ',	'Et proiden'),
(7,	'Aut voluptate cupida',	'Ipsam magnam ipsam i',	'Perempuan',	1,	'Maiores in non minus',	2,	'1997-04-22',	'Elit ut soluta dolo',	'Reprehenderit exerc',	'At adipisicing quibu',	'Ut elit doloremque ',	'Magni amet fugit d',	'riju@mailinator.net',	'Quas non pariatur T',	'Proident duis velit',	'Dolore est ab elige',	'Incididunt mollit do',	'Excepturi ad aliquid',	'Perempuan',	'Odit sed molestiae l',	'Non nesciu',	'Soluta qua'),
(8,	'Optio enim est quo',	'Voluptatem rerum am',	'Perempuan',	1,	'Incididunt amet in ',	2,	'2017-04-18',	'Eligendi ut nulla el',	'Eos pariatur Enim d',	'Veniam reiciendis e',	'Aut iure expedita ut',	'Voluptatem Velit su',	'kizujoqi@mailinator.net',	'Nesciunt excepteur ',	'Ipsum esse molestia',	'Unde recusandae Ad ',	'Dolorem ratione laud',	'Molestiae ipsa mini',	'Perempuan',	'Ut ut mollitia eiusm',	'Voluptate ',	'Dignissimo'),
(9,	'Quas voluptatem quae',	'Dolor id earum error',	'Perempuan',	3,	'Ipsum pariatur Id',	2,	'1999-06-09',	'Soluta voluptatibus ',	'Commodo pariatur Qu',	'Eveniet velit non a',	'Cupidatat optio qui',	'Omnis vel deserunt v',	'vekis@mailinator.net',	'Quas veniam do sit ',	'Ex quaerat modi dese',	'Velit sit iste dele',	'Ullamco rem aut et d',	'Aliquip molestiae ut',	'Perempuan',	'Qui repellendus Ips',	'Minus adip',	'Maxime qui'),
(10,	'Nulla itaque cupidit',	'Autem non eum except',	'Perempuan',	1,	'Ea explicabo Dolore',	2,	'2017-12-14',	'Distinctio Voluptas',	'Ut voluptatem evenie',	'Quia sed non earum v',	'Est quae do qui cons',	'Quibusdam irure simi',	'tymuw@mailinator.com',	'Aspernatur distincti',	'Ullamco ut in et ven',	'Atque ipsum rerum et',	'Ipsum ut deleniti of',	'Quam quibusdam exerc',	'Perempuan',	'Elit et et vero et ',	'Dolore ame',	'A aute ass'),
(11,	'Facere dicta eum ips',	'Eum ipsum nisi cupid',	'Perempuan',	1,	'Deserunt consequuntu',	2,	'1976-05-08',	'Saepe saepe pariatur',	'Est necessitatibus v',	'Rerum ut velit dolor',	'Voluptatum enim fuga',	'Magnam distinctio B',	'zyfe@mailinator.net',	'Et est eum maiores p',	'Voluptas quo quo arc',	'Est expedita ducimu',	'Reprehenderit volupt',	'Culpa fugit rem ab ',	'Perempuan',	'Voluptatem ut earum ',	'Ullamco il',	'Vero moles');

DROP TABLE IF EXISTS `tb_peserta_keberangkatan`;
CREATE TABLE `tb_peserta_keberangkatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_peserta_transaksi` int(11) NOT NULL,
  `id_keberangkatan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `no_registrasi` (`id_peserta_transaksi`),
  KEY `id_jadwal` (`id_keberangkatan`),
  CONSTRAINT `tb_peserta_keberangkatan_ibfk_2` FOREIGN KEY (`id_keberangkatan`) REFERENCES `tb_keberangkatan` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tb_peserta_keberangkatan_ibfk_4` FOREIGN KEY (`id_peserta_transaksi`) REFERENCES `tb_peserta_transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_peserta_transaksi`;
CREATE TABLE `tb_peserta_transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_peserta` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_peserta_transaksi` (`id`, `id_peserta`, `id_transaksi`, `status`, `keterangan`) VALUES
(4,	9,	5,	'',	'Soluta possimus sed'),
(5,	10,	6,	'Deserunt quaerat sit',	'Sint dolore laborum'),
(6,	9,	13,	'',	''),
(7,	10,	13,	NULL,	NULL),
(8,	11,	14,	'Libero quo ad rerum ',	'Quasi est molestiae');

DROP TABLE IF EXISTS `tb_program`;
CREATE TABLE `tb_program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_program` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_program` (`id`, `nama_program`) VALUES
(4,	'Haji'),
(6,	'Umrah'),
(7,	'Wisata Muslim');

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
  `status` enum('Aktif','Dibatalkan') NOT NULL DEFAULT 'Aktif',
  `id_pengguna` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_jenis` (`id_jenis`),
  KEY `id_pengguna` (`id_pengguna`),
  CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis_program` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_transaksi` (`id`, `id_jenis`, `dp`, `status`, `id_pengguna`) VALUES
(11,	3,	99,	'Dibatalkan',	1),
(12,	3,	0,	'Dibatalkan',	1),
(13,	2,	1200000,	'Aktif',	1),
(14,	3,	1900000,	'Aktif',	1);

DROP TABLE IF EXISTS `angsuran_sudah_dibayar`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `angsuran_sudah_dibayar` AS select `tb_angsuran`.`id_transaksi` AS `id_transaksi`,sum(`tb_angsuran`.`juml_bayar`) AS `sudah_dibayar` from `tb_angsuran` group by `tb_angsuran`.`id_transaksi`;

DROP TABLE IF EXISTS `banyak_peserta_transaksi`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `banyak_peserta_transaksi` AS select `tb_peserta_transaksi`.`id_transaksi` AS `id_transaksi`,ifnull(count(`tb_peserta_transaksi`.`id`),0) AS `banyak_peserta` from `tb_peserta_transaksi` group by `tb_peserta_transaksi`.`id_transaksi`;

DROP TABLE IF EXISTS `data_angsuran`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `data_angsuran` AS select `tb_transaksi`.`id_jenis` AS `id_jenis`,`tb_transaksi`.`dp` AS `dp`,`tb_transaksi`.`status` AS `status`,`tb_transaksi`.`id_pengguna` AS `id_pengguna`,`tb_pengguna`.`username` AS `username`,`tb_pengguna`.`email` AS `email`,`tb_pengguna`.`nohp` AS `nohp`,`tb_angsuran`.`tgl_bayar` AS `tgl_bayar`,`tb_angsuran`.`juml_bayar` AS `juml_bayar`,`tb_angsuran`.`id_transaksi` AS `id_transaksi`,`tb_angsuran`.`jenis_pembayaran` AS `jenis_pembayaran`,`tb_angsuran`.`keterangan` AS `keterangan`,`tb_angsuran`.`id` AS `id` from ((`tb_transaksi` join `tb_pengguna` on((`tb_transaksi`.`id_pengguna` = `tb_pengguna`.`id`))) join `tb_angsuran` on((`tb_angsuran`.`id_transaksi` = `tb_transaksi`.`id`)));

DROP TABLE IF EXISTS `data_jenis_program`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `data_jenis_program` AS select concat(`tb_program`.`nama_program`,' ',`tb_jenis_program`.`nm_jenis`) AS `nama_program`,`tb_jenis_program`.`kuota` AS `kuota`,`tb_jenis_program`.`id` AS `id`,`tb_jenis_program`.`id_program` AS `id_program`,`tb_jenis_program`.`harga` AS `harga`,`tb_jenis_program`.`nm_jenis` AS `nm_jenis`,`tb_jenis_program`.`dp` AS `dp` from (`tb_program` join `tb_jenis_program` on((`tb_jenis_program`.`id_program` = `tb_program`.`id`)));

DROP TABLE IF EXISTS `data_keberangkatan`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `data_keberangkatan` AS select `tb_keberangkatan`.`id` AS `id`,`tb_keberangkatan`.`tgl_berangkat` AS `tgl_berangkat`,`tb_keberangkatan`.`nama_maskapai` AS `nama_maskapai`,`tb_keberangkatan`.`id_jenis` AS `id_jenis`,`tb_keberangkatan`.`status` AS `status`,`tb_keberangkatan`.`keterangan` AS `keterangan`,`tb_program`.`nama_program` AS `nama_program`,`tb_jenis_program`.`nm_jenis` AS `nm_jenis`,`tb_jenis_program`.`id_program` AS `id_program` from ((`tb_keberangkatan` join `tb_jenis_program` on((`tb_keberangkatan`.`id_jenis` = `tb_jenis_program`.`id`))) join `tb_program` on((`tb_jenis_program`.`id_program` = `tb_program`.`id`)));

DROP TABLE IF EXISTS `data_peserta`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `data_peserta` AS select `tb_peserta`.`nama_lengkap` AS `nama_lengkap`,`tb_peserta`.`nama_panggilan` AS `nama_panggilan`,`tb_peserta`.`jenis_kelamin` AS `jenis_kelamin`,`tb_peserta`.`id_pengguna` AS `id_pengguna`,`tb_peserta`.`no_identitas` AS `no_identitas`,`tb_peserta`.`tempat_lahir` AS `tempat_lahir`,`tb_peserta`.`tgl_lahir` AS `tgl_lahir`,`tb_peserta`.`alamat` AS `alamat`,`tb_peserta`.`kel` AS `kel`,`tb_peserta`.`tlp_rumah` AS `tlp_rumah`,`tb_peserta`.`tlp_kantor` AS `tlp_kantor`,`tb_peserta`.`nohp` AS `nohp`,`tb_peserta`.`email` AS `email`,`tb_peserta`.`warga_negara` AS `warga_negara`,`tb_peserta`.`pekerjaan` AS `pekerjaan`,`tb_peserta`.`ukuran_baju` AS `ukuran_baju`,`tb_peserta`.`nama_ahliwaris` AS `nama_ahliwaris`,`tb_peserta`.`hubungan_ahliwaris` AS `hubungan_ahliwaris`,`tb_peserta`.`jk_ahliwaris` AS `jk_ahliwaris`,`tb_peserta`.`kode_pos` AS `kode_pos`,`tb_peserta`.`rt` AS `rt`,`tb_peserta`.`rw` AS `rw`,`tb_kota`.`nm_kota` AS `nm_kota`,`tb_peserta`.`id` AS `id` from (`tb_peserta` join `tb_kota` on((`tb_peserta`.`tempat_lahir` = `tb_kota`.`id`)));

DROP TABLE IF EXISTS `data_peserta_keberangkatan`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `data_peserta_keberangkatan` AS select `tb_peserta_keberangkatan`.`id` AS `id`,`data_peserta`.`nama_lengkap` AS `nama_lengkap`,`data_peserta`.`nama_panggilan` AS `nama_panggilan`,`data_peserta`.`jenis_kelamin` AS `jenis_kelamin`,`data_peserta`.`no_identitas` AS `no_identitas`,`data_peserta`.`tempat_lahir` AS `tempat_lahir`,`data_peserta`.`tgl_lahir` AS `tgl_lahir`,`data_peserta`.`alamat` AS `alamat`,`data_peserta`.`kel` AS `kel`,`data_peserta`.`tlp_rumah` AS `tlp_rumah`,`data_peserta`.`tlp_kantor` AS `tlp_kantor`,`data_peserta`.`nohp` AS `nohp`,`data_peserta`.`email` AS `email`,`data_peserta`.`warga_negara` AS `warga_negara`,`data_peserta`.`pekerjaan` AS `pekerjaan`,`data_peserta`.`ukuran_baju` AS `ukuran_baju`,`data_peserta`.`nama_ahliwaris` AS `nama_ahliwaris`,`data_peserta`.`hubungan_ahliwaris` AS `hubungan_ahliwaris`,`data_peserta`.`jk_ahliwaris` AS `jk_ahliwaris`,`data_peserta`.`kode_pos` AS `kode_pos`,`data_peserta`.`rt` AS `rt`,`data_peserta`.`rw` AS `rw`,`data_peserta`.`nm_kota` AS `nm_kota`,`tb_peserta_keberangkatan`.`id_keberangkatan` AS `id_keberangkatan`,`tb_peserta_keberangkatan`.`id_peserta_transaksi` AS `id_peserta_transaksi`,`data_transaksi`.`nama_program` AS `nama_program`,`data_transaksi`.`nm_jenis` AS `nm_jenis`,`tb_peserta_transaksi`.`id_transaksi` AS `id_transaksi` from (((`tb_peserta_keberangkatan` join `tb_peserta_transaksi` on((`tb_peserta_keberangkatan`.`id_peserta_transaksi` = `tb_peserta_transaksi`.`id`))) join `data_peserta` on((`data_peserta`.`id` = `tb_peserta_transaksi`.`id_peserta`))) join `data_transaksi` on((`data_transaksi`.`id` = `tb_peserta_transaksi`.`id_transaksi`)));

DROP TABLE IF EXISTS `data_peserta_transaksi`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `data_peserta_transaksi` AS select `data_transaksi`.`id_jenis` AS `id_jenis`,`data_transaksi`.`total_bayar` AS `total_bayar`,`data_transaksi`.`sudah_dibayar` AS `sudah_dibayar`,`tb_peserta_transaksi`.`id` AS `id`,`tb_peserta_transaksi`.`id_peserta` AS `id_peserta`,`tb_peserta_transaksi`.`id_transaksi` AS `id_transaksi`,`tb_peserta_transaksi`.`status` AS `status`,`tb_peserta_transaksi`.`keterangan` AS `keterangan`,`tb_peserta`.`nama_lengkap` AS `nama_lengkap`,`tb_peserta`.`nama_panggilan` AS `nama_panggilan`,`tb_peserta`.`jenis_kelamin` AS `jenis_kelamin`,`tb_peserta`.`no_identitas` AS `no_identitas`,`tb_peserta`.`tempat_lahir` AS `tempat_lahir`,`tb_peserta`.`tgl_lahir` AS `tgl_lahir`,`tb_peserta`.`alamat` AS `alamat`,`tb_peserta`.`kel` AS `kel`,`tb_peserta`.`tlp_rumah` AS `tlp_rumah`,`tb_peserta`.`tlp_kantor` AS `tlp_kantor`,`tb_peserta`.`nohp` AS `nohp`,`tb_peserta`.`email` AS `email`,`tb_peserta`.`warga_negara` AS `warga_negara`,`tb_peserta`.`pekerjaan` AS `pekerjaan`,`tb_peserta`.`ukuran_baju` AS `ukuran_baju`,`tb_peserta`.`nama_ahliwaris` AS `nama_ahliwaris`,`tb_peserta`.`hubungan_ahliwaris` AS `hubungan_ahliwaris`,`tb_peserta`.`jk_ahliwaris` AS `jk_ahliwaris`,`tb_peserta`.`kode_pos` AS `kode_pos`,`tb_peserta`.`rt` AS `rt`,`tb_peserta`.`rw` AS `rw`,`tb_kota`.`nm_kota` AS `nm_kota` from (((`tb_peserta_transaksi` join `tb_peserta` on((`tb_peserta`.`id` = `tb_peserta_transaksi`.`id_peserta`))) join `tb_kota` on((`tb_peserta`.`tempat_lahir` = `tb_kota`.`id`))) join `data_transaksi` on((`tb_peserta_transaksi`.`id_transaksi` = `data_transaksi`.`id`)));

DROP TABLE IF EXISTS `data_transaksi`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `data_transaksi` AS select `tb_transaksi`.`id` AS `id`,`tb_transaksi`.`id_jenis` AS `id_jenis`,`tb_transaksi`.`dp` AS `dp`,`tb_transaksi`.`status` AS `status`,`tb_transaksi`.`id_pengguna` AS `id_pengguna`,ifnull(`angsuran_sudah_dibayar`.`sudah_dibayar`,0) AS `sudah_dibayar`,ifnull(`banyak_peserta_transaksi`.`banyak_peserta`,0) AS `total_peserta`,`tb_jenis_program`.`harga` AS `harga`,`tb_jenis_program`.`nm_jenis` AS `nm_jenis`,`tb_jenis_program`.`kuota` AS `kuota`,`tb_program`.`nama_program` AS `nama_program`,`tb_pengguna`.`username` AS `username`,`tb_pengguna`.`email` AS `email`,`tb_pengguna`.`nohp` AS `nohp`,((`tb_jenis_program`.`kuota` * `tb_jenis_program`.`harga`) + `tb_transaksi`.`dp`) AS `total_bayar` from (((((`tb_transaksi` left join `angsuran_sudah_dibayar` on((`angsuran_sudah_dibayar`.`id_transaksi` = `tb_transaksi`.`id`))) left join `banyak_peserta_transaksi` on((`banyak_peserta_transaksi`.`id_transaksi` = `tb_transaksi`.`id`))) join `tb_jenis_program` on((`tb_transaksi`.`id_jenis` = `tb_jenis_program`.`id`))) join `tb_program` on((`tb_jenis_program`.`id_program` = `tb_program`.`id`))) join `tb_pengguna` on((`tb_transaksi`.`id_pengguna` = `tb_pengguna`.`id`)));

-- 2019-08-25 17:01:26
