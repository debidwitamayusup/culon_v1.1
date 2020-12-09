-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.10-MariaDB - Source distribution
-- Server OS:                    Linux
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for culon
CREATE DATABASE IF NOT EXISTS `culon` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `culon`;

-- Dumping structure for table culon.jabatan
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatann` varchar(5) NOT NULL,
  `nama_jabatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jabatann`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table culon.jabatan: ~13 rows (approximately)
DELETE FROM `jabatan`;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` (`id_jabatann`, `nama_jabatan`) VALUES
	('ADMD', 'Admin Departement'),
	('ASM', 'Asistem Manager'),
	('HRD', 'Human Resource Departement'),
	('MNG', 'Manager'),
	('OPR', 'Operator'),
	('SPI', 'Super Intendent'),
	('SPL1', 'Specialist 1'),
	('SPL2', 'Specialist 2'),
	('SPL3', 'Specialist 3'),
	('SPL4', 'Specialist 4'),
	('STA', 'Staff A'),
	('STB', 'Staff B'),
	('TMB', 'Team Member');
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;

-- Dumping structure for table culon.jenis_cuti
CREATE TABLE IF NOT EXISTS `jenis_cuti` (
  `id_cuti` char(5) NOT NULL,
  `desc_cuti` varchar(100) DEFAULT NULL,
  `limit_cuti` int(11) DEFAULT NULL,
  `jenis_kelamin_cuti` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_cuti`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table culon.jenis_cuti: ~11 rows (approximately)
DELETE FROM `jenis_cuti`;
/*!40000 ALTER TABLE `jenis_cuti` DISABLE KEYS */;
INSERT INTO `jenis_cuti` (`id_cuti`, `desc_cuti`, `limit_cuti`, `jenis_kelamin_cuti`) VALUES
	('a', 'Cuti Tahunan', 12, 'u'),
	('b', 'Istirahat Haid', 2, 'w'),
	('c', 'Melahirkan / Keguguran', 45, 'w'),
	('d', 'Sakit', 2, 'u'),
	('e1', 'Pekerja Sendiri Menikah', 3, 'u'),
	('e2', 'Pekerja Menikahkan Anak', 2, 'w'),
	('e3', 'Istri Melahirkan / Gugur Kandungan', 2, 'p'),
	('e4', 'Pekerja Menyunatkan / Membaptiskan Anak', 2, 'u'),
	('e5', 'Keluarga Pekerja (istri, suami, anak, orang tua/mertua, menantu) meninggal dunia', 2, 'u'),
	('e6', 'Anggota Keluarga dalam Satu Rumah Meninggal Dunia', 1, 'u'),
	('e7', 'Lainnya', 2, 'u');
/*!40000 ALTER TABLE `jenis_cuti` ENABLE KEYS */;

-- Dumping structure for table culon.karyawan
CREATE TABLE IF NOT EXISTS `karyawan` (
  `nomor_induk` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `id_jabatan` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `id_leader` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `no_kk` varchar(50) DEFAULT NULL,
  `kwn` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `alamat_ktp` text DEFAULT NULL,
  `alamat_sekarang` text DEFAULT NULL,
  `no_telp` varchar(14) DEFAULT NULL,
  `no_bpjstk` varchar(50) DEFAULT NULL,
  `no_bpjskes` varchar(50) DEFAULT NULL,
  `no_npwp` varchar(50) DEFAULT NULL,
  `tgl_gabung` date DEFAULT NULL,
  PRIMARY KEY (`nomor_induk`),
  KEY `tempat_lahir` (`tempat_lahir`),
  KEY `FK_karyawan_jabatan` (`id_jabatan`),
  KEY `id_leader` (`id_leader`),
  CONSTRAINT `FK_karyawan_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatann`),
  CONSTRAINT `FK_karyawan_karyawan` FOREIGN KEY (`id_leader`) REFERENCES `karyawan` (`nomor_induk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table culon.karyawan: ~5 rows (approximately)
DELETE FROM `karyawan`;
/*!40000 ALTER TABLE `karyawan` DISABLE KEYS */;
INSERT INTO `karyawan` (`nomor_induk`, `nama`, `id_jabatan`, `tempat_lahir`, `id_leader`, `tgl_lahir`, `jenis_kelamin`, `agama`, `nik`, `no_kk`, `kwn`, `status`, `alamat_ktp`, `alamat_sekarang`, `no_telp`, `no_bpjstk`, `no_bpjskes`, `no_npwp`, `tgl_gabung`) VALUES
	('000000', 'admin', 'ADMD', NULL, '000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	('000001', 'Debi Dwitama Yusup', 'STA', NULL, 'KRY000002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-29'),
	('000002', 'Willi Arya Galih F', 'HRD', 'Lebak', '000001', NULL, 'L', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-21'),
	('KRY000001', 'Debi Dwitama Yusup', 'STA', 'Lebak', 'KRY000002', '1996-09-08', 'L', 'Islam', '3602020809960001', '3602020809960001', 'Indonesia', 'Belum Kawin', 'Kp. Cisiih RT 02/02', 'Jl. Sawo Kebayoran Baru', '087718938581', '98798998', '98709879', '98798789', '2019-07-23'),
	('KRY000002', 'Firlan Juliansyah', 'MNG', 'lebak', NULL, '1993-07-14', 'L', 'Islam', '3602021407930001', '3602021407930001', 'Indonesia', 'Belum Kawin', 'Kp. Cisiih', 'Bintaro', '087898798798', '9898', '98798', '9879', '2019-07-28');
/*!40000 ALTER TABLE `karyawan` ENABLE KEYS */;

-- Dumping structure for table culon.karyawan_cuti_historis
CREATE TABLE IF NOT EXISTS `karyawan_cuti_historis` (
  `idHistoris` int(11) NOT NULL AUTO_INCREMENT,
  `id_cuti` char(50) NOT NULL,
  `nomor_induk` varchar(50) NOT NULL,
  `desc_cuti` varchar(100) NOT NULL,
  `banyak_pengajuan` int(11) DEFAULT NULL,
  `tgl_pengajuan` date DEFAULT curdate(),
  PRIMARY KEY (`idHistoris`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table culon.karyawan_cuti_historis: ~9 rows (approximately)
DELETE FROM `karyawan_cuti_historis`;
/*!40000 ALTER TABLE `karyawan_cuti_historis` DISABLE KEYS */;
INSERT INTO `karyawan_cuti_historis` (`idHistoris`, `id_cuti`, `nomor_induk`, `desc_cuti`, `banyak_pengajuan`, `tgl_pengajuan`) VALUES
	(1, 'a', 'KRY000001', 'Cuti Tahuan', 3, '2020-07-05'),
	(2, 'e4', 'KRY000001', 'Pekerja Membaptiskan anak', 2, '2020-08-05'),
	(3, 'e5', 'KRY000001', 'Pilih Jenis CutiCuti TahunanSakitPekerja Sendiri MenikahPekerja Menyunatkan / Membaptiskan AnakKelua', 2, '2020-08-05'),
	(4, 'a', 'KRY000001', 'Cuti Tahunan', 4, '2020-08-05'),
	(5, 'e1', 'KRY000001', 'Pekerja Sendiri Menikah', 3, '2020-08-13'),
	(6, 'a', '000001', 'Cuti Tahunan', 0, '2020-08-29'),
	(7, 'a', '000001', 'Cuti Tahunan', 0, '2020-08-29'),
	(8, 'd', '000001', 'Sakit', 2, '2020-11-14'),
	(9, 'e5', '000001', 'Keluarga Pekerja (istri, suami, anak, orang tua/mertua, menantu) meninggal dunia', 1, '2020-11-14'),
	(10, 'e4', '000001', 'Pekerja Menyunatkan / Membaptiskan Anak', 1, '2020-11-14'),
	(11, 'e7', '000001', 'Lainnya', 2, '2020-11-14');
/*!40000 ALTER TABLE `karyawan_cuti_historis` ENABLE KEYS */;

-- Dumping structure for table culon.karyawan_saldo_cuti
CREATE TABLE IF NOT EXISTS `karyawan_saldo_cuti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_induk` varchar(50) NOT NULL,
  `tahun` varchar(5) DEFAULT NULL,
  `saldo` decimal(10,0) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `create_date` datetime DEFAULT current_timestamp(),
  `create_id` varchar(50) DEFAULT NULL,
  `modify_date` datetime DEFAULT current_timestamp(),
  `modify_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `karyawan_cuti_FK` (`nomor_induk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table culon.karyawan_saldo_cuti: ~0 rows (approximately)
DELETE FROM `karyawan_saldo_cuti`;
/*!40000 ALTER TABLE `karyawan_saldo_cuti` DISABLE KEYS */;
/*!40000 ALTER TABLE `karyawan_saldo_cuti` ENABLE KEYS */;

-- Dumping structure for table culon.pengajuan_cuti
CREATE TABLE IF NOT EXISTS `pengajuan_cuti` (
  `id_pengajuan_cuti` int(11) NOT NULL AUTO_INCREMENT,
  `id_cuti` char(5) NOT NULL,
  `nomor_induk` varchar(50) NOT NULL,
  `tgl_pengajuan` datetime DEFAULT current_timestamp(),
  `alasan_pengajuan` text DEFAULT NULL,
  `durasi_pengajuan` int(11) DEFAULT NULL,
  `dari_tanggal` date DEFAULT NULL,
  `dari_jam` time DEFAULT NULL,
  `ke_tanggal` date DEFAULT NULL,
  `ke_jam` time DEFAULT NULL,
  `id_karyawan_pengganti` varchar(50) DEFAULT NULL,
  `nama_karyawan_pengganti` varchar(50) DEFAULT NULL,
  `approve_pemohon` enum('Y','N') DEFAULT 'Y',
  `approve_pekerja_pengganti` enum('Y','N') DEFAULT 'N',
  `approve_leader` enum('Y','N') DEFAULT 'N',
  `approve_kepala_bagian` enum('Y','N') DEFAULT 'N',
  `approve_hrd` enum('Y','N') DEFAULT 'N',
  `keterangan` text DEFAULT NULL,
  `tgl_approve_leader` date DEFAULT NULL,
  `tgl_approve_pekerja_pengganti` date DEFAULT NULL,
  `tgl_approve_kepala_bagian` date DEFAULT NULL,
  `tgl_approve_hrd` date NOT NULL,
  `id_approve_pengganti` varchar(10) DEFAULT NULL,
  `id_approve_leader` varchar(10) DEFAULT NULL,
  `id_approve_hrd` varchar(10) DEFAULT NULL,
  `id_approve_kepala_bagian` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_pengajuan_cuti`),
  KEY `id_cuti` (`id_cuti`),
  KEY `nomor_indurk` (`nomor_induk`) USING BTREE,
  KEY `id_pengajuan_cuti` (`id_pengajuan_cuti`),
  CONSTRAINT `FK_pengajuan_cuti_culon.karyawan` FOREIGN KEY (`nomor_induk`) REFERENCES `karyawan` (`nomor_induk`),
  CONSTRAINT `FK_pengajuan_cuti_jenis_cuti` FOREIGN KEY (`id_cuti`) REFERENCES `jenis_cuti` (`id_cuti`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table culon.pengajuan_cuti: ~8 rows (approximately)
DELETE FROM `pengajuan_cuti`;
/*!40000 ALTER TABLE `pengajuan_cuti` DISABLE KEYS */;
INSERT INTO `pengajuan_cuti` (`id_pengajuan_cuti`, `id_cuti`, `nomor_induk`, `tgl_pengajuan`, `alasan_pengajuan`, `durasi_pengajuan`, `dari_tanggal`, `dari_jam`, `ke_tanggal`, `ke_jam`, `id_karyawan_pengganti`, `nama_karyawan_pengganti`, `approve_pemohon`, `approve_pekerja_pengganti`, `approve_leader`, `approve_kepala_bagian`, `approve_hrd`, `keterangan`, `tgl_approve_leader`, `tgl_approve_pekerja_pengganti`, `tgl_approve_kepala_bagian`, `tgl_approve_hrd`, `id_approve_pengganti`, `id_approve_leader`, `id_approve_hrd`, `id_approve_kepala_bagian`) VALUES
	(2, 'd', 'KRY000001', '2020-08-04 00:00:00', 'Demam', 2, '0000-00-00', NULL, '2020-08-05', NULL, '2020-08-06', 'Firlan Juliansyah', 'Y', 'Y', 'Y', 'Y', 'Y', NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL),
	(4, 'a', 'KRY000001', '2020-08-04 00:00:00', 'Liburan dong', 4, '0000-00-00', NULL, '2020-08-07', NULL, 'KRY000002', 'Firlan Juliansyah', 'Y', 'Y', 'Y', 'Y', 'Y', NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL),
	(6, 'e1', 'KRY000001', '2020-08-04 00:00:00', 'Lejuss', 3, '0000-00-00', NULL, '2020-08-07', NULL, 'KRY000002', 'Firlan Juliansyah', 'Y', 'Y', 'Y', 'Y', 'Y', NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL),
	(10, 'e5', 'KRY000001', '2020-08-04 00:00:00', 'Berduka', 2, '2020-08-05', NULL, '2020-08-06', NULL, 'KRY000002', 'Firlan Juliansyah', 'Y', 'Y', 'Y', 'Y', 'Y', NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL),
	(11, 'a', 'KRY000001', '2020-08-12 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', 'N', 'N', 'N', 'N', NULL, '2020-11-21', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL),
	(14, 'e1', 'KRY000001', '2020-08-13 00:00:00', '', 3, '2020-08-14', NULL, '2020-08-14', NULL, 'KRY000002', 'Firlan Juliansyah', 'Y', 'N', 'N', 'N', 'N', NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL),
	(15, 'd', '000001', '2020-11-14 00:00:00', 'ya pengen weeeh', 2, '2020-11-17', NULL, '2020-11-18', NULL, 'KRY000002', 'Firlan Juliansyah', 'Y', 'N', 'Y', 'N', 'Y', NULL, '2020-11-21', NULL, NULL, '2020-11-21', NULL, 'KRY000002', '000002', NULL),
	(16, 'e5', '000001', '2020-11-14 00:00:00', 'mertua meninggal dong', 1, '2020-11-19', NULL, '2020-11-19', NULL, 'KRY000002', 'Firlan Juliansyah', 'Y', 'N', 'N', 'N', 'N', NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL),
	(17, 'e4', '000001', '2020-11-14 00:00:00', 'anak saya di baptis dong', 1, '2020-11-26', NULL, '2020-11-26', NULL, 'KRY000002', 'Firlan Juliansyah', 'Y', 'N', 'N', 'N', 'N', NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL),
	(18, 'e7', '000001', '2020-11-14 12:44:42', 'kepo deh loo', 2, '2020-11-23', NULL, '2020-11-24', NULL, 'KRY000002', 'Firlan Juliansyah', 'Y', 'N', 'N', 'N', 'N', NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `pengajuan_cuti` ENABLE KEYS */;

-- Dumping structure for table culon.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(50) NOT NULL,
  `nomor_induk` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `create_date` datetime DEFAULT current_timestamp(),
  `update_pwd` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_user`),
  KEY `nomor_induk` (`nomor_induk`),
  CONSTRAINT `FK_user_karyawan` FOREIGN KEY (`nomor_induk`) REFERENCES `karyawan` (`nomor_induk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table culon.user: ~1 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `nomor_induk`, `password`, `create_date`, `update_pwd`) VALUES
	('admin', '000000', 'admin', '2020-11-22 10:56:04', '2020-11-22 10:56:04'),
	('debi', '000001', 'debi', '2020-08-29 17:35:41', '2020-08-29 17:35:43'),
	('firlan', 'KRY000002', 'firlan', '2020-11-14 15:11:52', '2020-11-14 15:11:52'),
	('willy', '000002', 'willy', '2020-11-21 20:56:53', '2020-11-21 20:56:53');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
