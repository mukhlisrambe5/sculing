-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 04, 2023 at 01:48 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sculink`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_boscu`
--

DROP TABLE IF EXISTS `tbl_boscu`;
CREATE TABLE IF NOT EXISTS `tbl_boscu` (
  `id_boscu` int NOT NULL AUTO_INCREMENT,
  `kuartal` varchar(25) NOT NULL,
  `tahun` varchar(25) NOT NULL,
  `kandidat` varchar(200) NOT NULL,
  `terpilih` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kep` varchar(225) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id_boscu`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_boscu`
--

INSERT INTO `tbl_boscu` (`id_boscu`, `kuartal`, `tahun`, `kandidat`, `terpilih`, `kep`, `ket`) VALUES
(48, 'I', '2023', '123451,123452,123453', '123451', '1693556937_aff78f40fa1ef409ea86.pdf', 'detail');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data`
--

DROP TABLE IF EXISTS `tbl_data`;
CREATE TABLE IF NOT EXISTS `tbl_data` (
  `id_data` int NOT NULL AUTO_INCREMENT,
  `elemenVar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `elemenNum` int NOT NULL,
  `elementSelect` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `elementRadio` int NOT NULL,
  `elementCheck` varchar(225) NOT NULL,
  `elementTextArea` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `elementDate` date NOT NULL,
  `elementImg` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `elementFile` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_data`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

DROP TABLE IF EXISTS `tbl_pegawai`;
CREATE TABLE IF NOT EXISTS `tbl_pegawai` (
  `id_pegawai` int NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(100) NOT NULL,
  `nipp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nama_pegawai`, `nipp`, `jabatan`, `status`) VALUES
(5, 'Andi', '123451', 'Fungsional', 'Aktif'),
(4, 'Badu', '123452', 'Pelaksana', 'Tidak Aktif'),
(6, 'Cita', '123453', 'Fungsional', 'Aktif'),
(7, 'Dani', '123454', 'Pelaksana', 'Tidak Aktif'),
(8, 'Emi', '123455', 'Fungsional', 'Aktif'),
(9, 'Fikri', '123456', 'Pelaksana', 'Tidak Aktif'),
(10, 'Gea', '123457', 'Fungsional', 'Aktif'),
(11, 'Husni', '123458', 'Pelaksana', 'Tidak Aktif'),
(12, 'Indra', '123459', 'Fungsional', 'Aktif'),
(13, 'Jose', '123460', 'Pelaksana', 'Tidak Aktif'),
(14, 'Kuma', '123461', 'Fungsional', 'Aktif'),
(15, 'Leni', '123462', 'Pelaksana', 'Tidak Aktif'),
(16, 'Mia', '123463', 'Fungsional', 'Aktif'),
(18, 'Nani', '123464', 'Fungsional', 'Aktif'),
(19, 'Omar', '123465', 'Pelaksana', 'Aktif'),
(20, 'Pasa', '123466', 'Pelaksana', 'Aktif'),
(21, 'Queq', '123467', 'Fungsional', 'Aktif'),
(22, 'Rasudi', '123468', 'Pelaksana', 'Aktif'),
(23, 'Salma', '123469', 'Fungsional', 'Aktif'),
(24, 'Tira', '123470', 'Fungsional', 'Aktif'),
(25, 'Umar', '123471', 'Fungsional', 'Aktif'),
(26, 'Viaas', '123472', 'Fungsional', 'Aktif'),
(27, 'Wano', '123473', 'Pelaksana', 'Aktif'),
(28, 'Xavi', '123474', 'Fungsional', 'Aktif'),
(29, 'Yati', '123475', 'Pelaksana', 'Aktif'),
(30, 'Zoro', '567567', 'Pelaksana', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penempatan`
--

DROP TABLE IF EXISTS `tbl_penempatan`;
CREATE TABLE IF NOT EXISTS `tbl_penempatan` (
  `id_penempatan` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(16) NOT NULL,
  `unit_now` int NOT NULL,
  `kep` varchar(225) NOT NULL,
  `tmt` date NOT NULL,
  PRIMARY KEY (`id_penempatan`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_penempatan`
--

INSERT INTO `tbl_penempatan` (`id_penempatan`, `nip`, `unit_now`, `kep`, `tmt`) VALUES
(95, '123453', 5, '1693555829_8edcf2c7d49a71b2387f.pdf', '2022-09-01'),
(94, '123452', 4, '1693541252_deef8080406f2337b9e3.pdf', '2023-09-01'),
(93, '123451', 3, '1693540814_e466b96b952f51f1aa8c.pdf', '2023-01-01'),
(92, '123452', 3, '1693472079_337c20d434c675c9e8be.pdf', '2022-01-01'),
(91, '123451', 1, '1693472050_3d65f3606502ce126898.pdf', '2022-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skill`
--

DROP TABLE IF EXISTS `tbl_skill`;
CREATE TABLE IF NOT EXISTS `tbl_skill` (
  `id_skill` int NOT NULL AUTO_INCREMENT,
  `nama_skill` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_skill`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_skill`
--

INSERT INTO `tbl_skill` (`id_skill`, `nama_skill`) VALUES
(1, 'Music'),
(7, 'Fotography'),
(3, 'Bahasa Mandarin'),
(5, 'Bahasa Inggris'),
(6, 'Desain Grafis'),
(8, 'Video Editing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skill_pegawai`
--

DROP TABLE IF EXISTS `tbl_skill_pegawai`;
CREATE TABLE IF NOT EXISTS `tbl_skill_pegawai` (
  `id_skill_pegawai` int NOT NULL AUTO_INCREMENT,
  `nip_skill` int NOT NULL,
  `keahlian` int NOT NULL,
  `file_keahlian` varchar(200) NOT NULL,
  `detail` text NOT NULL,
  PRIMARY KEY (`id_skill_pegawai`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_skill_pegawai`
--

INSERT INTO `tbl_skill_pegawai` (`id_skill_pegawai`, `nip_skill`, `keahlian`, `file_keahlian`, `detail`) VALUES
(14, 123451, 7, '1693557232_3d8aceba84b6e96c4615.pdf', 'detail');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

DROP TABLE IF EXISTS `tbl_unit`;
CREATE TABLE IF NOT EXISTS `tbl_unit` (
  `id_unit` int NOT NULL AUTO_INCREMENT,
  `nama_unit` varchar(100) NOT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`id_unit`, `nama_unit`) VALUES
(1, 'Subbagian Umum'),
(3, 'Seksi Perbendaharaan'),
(4, 'Seksi Penindakan dan Penyidikan '),
(5, 'Seksi Kepatuhan Internal dan Penyuluhan'),
(6, 'Seksi Pelayanan Kepabeanan dan Cukai dan Dukungan Teknis');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int NOT NULL,
  `status` varchar(25) NOT NULL,
  `info` varchar(225) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `level`, `status`, `info`) VALUES
(33, 'Mukhlis', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 'Aktif', ''),
(36, 'Admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 'Tidak Aktif', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
