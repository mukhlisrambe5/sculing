-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 21, 2023 at 12:33 AM
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
  PRIMARY KEY (`id_boscu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

--
-- Dumping data for table `tbl_data`
--

INSERT INTO `tbl_data` (`id_data`, `elemenVar`, `elemenNum`, `elementSelect`, `elementRadio`, `elementCheck`, `elementTextArea`, `elementDate`, `elementImg`, `elementFile`) VALUES
(4, 'Tes 1', 123456, '1', 1, '1<br>3', 'asdsfsdfdsf', '2023-08-05', '1691191774_59edc21277b4666c18ec.png', '1691191774_177925051fb74582cf58.pdf');

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(17, 'Nani', '123464', 'Pelaksana', 'Tidak Aktif');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_penempatan`
--

INSERT INTO `tbl_penempatan` (`id_penempatan`, `nip`, `unit_now`, `kep`, `tmt`) VALUES
(1, '123451', 1, 'kep1.pdf', '2023-01-02'),
(3, '123452', 3, 'kep2.pdf', '2022-09-01'),
(5, '123452', 1, 'kep3.pdf', '2023-08-01'),
(4, '123452', 4, 'kep4.pdf', '2023-08-02'),
(6, '123451', 1, 'kep5.pdf', '2023-03-01'),
(7, '123457', 3, 'kep6.pdf', '2023-08-02'),
(9, '123458', 4, 'kep7.pdf', '2023-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penempatancopy`
--

DROP TABLE IF EXISTS `tbl_penempatancopy`;
CREATE TABLE IF NOT EXISTS `tbl_penempatancopy` (
  `id_penempatan` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(16) NOT NULL,
  `masa_kerja` varchar(50) NOT NULL,
  `unit_now` int NOT NULL,
  `lama_unit_now` varchar(50) NOT NULL,
  `status_warning` int NOT NULL,
  `kep` varchar(225) NOT NULL,
  `tmt` date NOT NULL,
  PRIMARY KEY (`id_penempatan`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_penempatancopy`
--

INSERT INTO `tbl_penempatancopy` (`id_penempatan`, `nip`, `masa_kerja`, `unit_now`, `lama_unit_now`, `status_warning`, `kep`, `tmt`) VALUES
(1, '12312002', '-', 1, '-', 0, 'kep.pdf', '2023-01-02'),
(2, '123123', '', 3, '', 0, '', '0000-00-00'),
(3, '123123', '', 1, '', 0, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rolling`
--

DROP TABLE IF EXISTS `tbl_rolling`;
CREATE TABLE IF NOT EXISTS `tbl_rolling` (
  `id_rolling` int NOT NULL,
  `nip` varchar(16) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `unit` int NOT NULL,
  `tmt` date NOT NULL,
  `kep` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skill`
--

DROP TABLE IF EXISTS `tbl_skill`;
CREATE TABLE IF NOT EXISTS `tbl_skill` (
  `id_skill` int NOT NULL AUTO_INCREMENT,
  `nama_skill` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_skill`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_skill`
--

INSERT INTO `tbl_skill` (`id_skill`, `nama_skill`) VALUES
(1, 'Music'),
(4, 'Programming'),
(3, 'Bahasa Mandarin'),
(5, 'Bahasa Inggris');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_skill_pegawai`
--

INSERT INTO `tbl_skill_pegawai` (`id_skill_pegawai`, `nip_skill`, `keahlian`, `file_keahlian`, `detail`) VALUES
(1, 123451, 1, 'file1.pdf', 'detail keahlian'),
(2, 123451, 3, 'file2.pdf', 'detail keahlian 2'),
(3, 123453, 4, 'file3.pdf', 'detail keahlian '),
(4, 123453, 5, 'file4.pdf', 'detail keahlian 2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

DROP TABLE IF EXISTS `tbl_unit`;
CREATE TABLE IF NOT EXISTS `tbl_unit` (
  `id_unit` int NOT NULL AUTO_INCREMENT,
  `nama_unit` varchar(100) NOT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`id_unit`, `nama_unit`) VALUES
(1, 'Subbagian Umum'),
(3, 'Seksi Perbendaharaan'),
(4, 'Seksi Penindakan dan Penyidikan ');

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
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `level`, `status`, `info`) VALUES
(33, 'Mukhlis', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 'Aktif', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
