-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 27, 2023 at 06:18 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_boscu`
--

INSERT INTO `tbl_boscu` (`id_boscu`, `kuartal`, `tahun`, `kandidat`, `terpilih`, `kep`, `ket`) VALUES
(1, 'I', '2023', '123451,123455,123458', '123458', 'kep.pdf', ''),
(2, 'II', '2023', '123458,123456,123459', '123456', 'kep.pdf', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nama_pegawai`, `nipp`, `jabatan`, `status`) VALUES
(5, 'Andi', '123451', 'Fungsional', 'Aktif'),
(4, 'Badu', '123452', 'Pelaksana', 'Tidak Aktif'),
(6, 'Cita', '123453', 'Fungsional', ''),
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
(18, 'Nani', '1234564', 'Fungsional', 'Aktif'),
(19, 'Omar', '1234565', 'Pelaksana', 'Aktif'),
(20, 'Pasa', '12312345', 'Pelaksana', 'Aktif'),
(21, 'Queq', '321321', 'Fungsional', 'Aktif'),
(22, 'Rasudi', '345345', 'Pelaksana', 'Aktif'),
(23, 'Salma', '45645', 'Fungsional', 'Aktif'),
(24, 'Tira', '231231', 'Fungsional', 'Aktif'),
(25, 'Umar', '456456', 'Fungsional', 'Aktif'),
(26, 'Viaas', '4564563', 'Fungsional', 'Aktif'),
(27, 'Wano', '567567', 'Pelaksana', 'Aktif'),
(28, 'Xavi', '2343456', 'Fungsional', 'Aktif'),
(29, 'Yati', '345346', 'Pelaksana', 'Aktif'),
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
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_penempatan`
--

INSERT INTO `tbl_penempatan` (`id_penempatan`, `nip`, `unit_now`, `kep`, `tmt`) VALUES
(49, '123453', 1, '1692932395_ca5830bd7369911a78bf.jpg', '2023-08-01'),
(48, '123460', 1, '1692931989_0b730405b145e1ed9dd0.docx', '2023-08-01'),
(47, '123452', 1, '1692931844_b6640a3e6351e3eeff2f.xlsx', '2023-08-01'),
(46, '123458', 3, '1692931752_070697dad49512c6f7ca.exe', '2023-08-01'),
(45, '123457', 4, '1692931679_d5fec97e5d32fe27e779.exe', '2023-08-01'),
(44, '123456', 3, '1692931653_1e402f693b553e379508.xlsx', '2023-08-03'),
(43, '123451', 4, '1692867126_dce6090bf12affc4f74c.csv', '2023-08-18'),
(42, '123455', 3, '1692866770_9524a6c91aa6df6858c2.pdf', '2023-08-03'),
(41, '123454', 4, '1692866171_a497f9878a868c6ce493.bat', '2023-08-09'),
(40, '123451', 5, '1692932824_7719866abd89ac8f195f.xlsx', '2023-08-25'),
(39, '123451', 3, '1692931106_344093653a86a852f9dc.docx', '2023-08-01'),
(38, '123453', 3, '1692865620_be1107eebad8f320ced4.xlsx', '2023-08-01'),
(37, '123451', 3, '1692864492_a3eb2f1420fe88a2b35b.jpg', '2023-08-03'),
(36, '123452', 4, '1692771393_c9fd6174dd9aadd61676.pdf', '2022-06-09'),
(35, '123452', 6, '1692771371_776ed060b7eb7b00b8a9.pdf', '2022-01-01'),
(34, '123451', 6, '1692846091_f981deeefbdeea884fbd.pdf', '2023-08-01'),
(33, '123451', 3, '1692932811_c1013823f74c31103008.pdf', '2023-08-01'),
(32, '123451', 5, '1693034015_23c2cce0d13a2fd7ef64.pdf', '2022-08-01'),
(50, '123459', 1, '1692932846_719cfb6431dcfbbccc9a.xlsx', '2023-08-01'),
(51, '123461', 1, '1692933201_35cb609f865f2e27609c.jpg', '2023-08-01'),
(52, '123462', 1, '1692933228_aa75784f842d64067482.xlsx', '2023-08-01'),
(53, '1234564', 1, '1692933499_6ab76e83c6bf408bbba6.jpg', '2023-08-01'),
(54, '1234565', 1, '1692933623_5bf72441f44956cd80fa.xlsx', '2023-08-01'),
(55, '123463', 3, '1692934137_e8a25b336842c6fada62.xlsx', '2023-08-01'),
(56, '12312345', 1, '1692937487_274793542c0c9bdab04b.jpg', '2023-08-01'),
(76, '123451', 3, '1692952998_9c6fb11d84ec3553476e.exe', '2023-08-12'),
(75, '456456', 1, '1692952874_e22008691d30ea91599e.xlsx', '2023-08-10'),
(74, '123451', 4, '1692952713_d1409a3cf791ce7968d0.exe', '2023-08-04'),
(73, '123451', 3, '1693034071_1da2b02535ec4f125359.pdf', '2023-08-04'),
(90, '123451', 5, '1693031130_19e15eead17859c4f2ca.pdf', '2023-08-03'),
(89, '123457', 3, '1693031010_768b08dee6d4dce163c9.pdf', '2023-08-09'),
(88, '345346', 5, '1693019514_753a6b1976bea5b529c5.pdf', '2023-08-11'),
(87, '2343456', 4, '1693019332_112518a449c95991c85f.docx', '2023-08-01'),
(86, '567567', 1, '1693019028_134cca4c0609b64214e5.exe', '2023-08-01'),
(85, '4564563', 1, '1693009410_e97d072a6c70762f113d.exe', '2023-08-01'),
(84, '231231', 4, '1693009292_843449c76840e0a03a36.exe', '2023-08-01'),
(83, '321321', 1, '1692954282_f04582898a12e2b74586.exe', '2023-08-01'),
(82, '345345', 3, '1692953746_dcaf6f48583e4f19d32f.exe', '2023-08-01');

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_skill_pegawai`
--

INSERT INTO `tbl_skill_pegawai` (`id_skill_pegawai`, `nip_skill`, `keahlian`, `file_keahlian`, `detail`) VALUES
(1, 123451, 1, '1693035591_4ebf18a6d6817277ac23.exe', 'detail keahlian edit mandarin-grafis edit'),
(2, 123451, 5, '1692858725_359f1680d5b27db5150e.pdf', 'detail keahlian 2'),
(3, 123453, 3, 'file3.pdf', 'detail keahlian '),
(4, 123453, 6, 'file4.pdf', 'detail keahlian 2'),
(5, 123451, 6, '1693036842_72300beedf121b8cf0a4.pdf', 'detail '),
(6, 123453, 5, '1692858819_f1db43116d8fba796ce2.pdf', 'Speaking and Listening ok'),
(7, 123451, 3, '1692924041_4fd2d4c15ca6d31201a5.pdf', 'detail bahasa mandarin'),
(8, 123451, 1, '1693035710_e0492e2df12b7f14ab3d.pdf', 'update'),
(9, 123451, 7, '1693034455_70dd4a918e3e0745b537.pdf', 'detail fotography'),
(10, 123453, 7, '1693035854_bd6d81fc36288b795ce0.pdf', 'update fg'),
(11, 123453, 8, '1693035787_27c2d085409b575d8025.exe', ''),
(12, 123453, 6, '1693036804_346e0f204fdedcdf7a22.pdf', 'uji coba');

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
(36, 'Admin', '60149a289a3623cd214943af2892e103f4bddafb', 1, 'Tidak Aktif', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
