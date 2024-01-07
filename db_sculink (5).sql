-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 07, 2024 at 06:22 AM
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
  `terpilih` varchar(100) NOT NULL,
  `kep` varchar(225) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id_boscu`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

DROP TABLE IF EXISTS `tbl_pegawai`;
CREATE TABLE IF NOT EXISTS `tbl_pegawai` (
  `id_pegawai` int NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(100) NOT NULL,
  `nipp` varchar(18) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nama_pegawai`, `nipp`, `jabatan`, `status`) VALUES
(1, 'Alfi Adrian', '199904132022011002', 'Pelaksana', 'Aktif'),
(2, 'Valentinus Ezra Rizky Cakasana', '199902102022011001', 'Pelaksana', 'Aktif'),
(3, 'Jose Holy Marbun ', '199811212018011001', 'Pelaksana', 'Aktif'),
(4, 'Bangun Muda Siregar', '199202202012101001', 'Pelaksana', 'Aktif'),
(5, 'Bani Bramenda Girsang', '199808012018011002', 'Pelaksana', 'Aktif'),
(6, 'Fayruza Prabandari', '200103312019122001', 'Pelaksana', 'Aktif'),
(8, 'Hanida Salma', '199908072019122001', 'Pelaksana', 'Aktif'),
(9, 'Josep Renhard Moris Zai', '199902162021011003', 'Pelaksana', 'Aktif'),
(10, 'Kevin Immanuel Christoffel Panggabean', '199709262018011003', 'Pelaksana', 'Aktif'),
(11, 'Khan Artawiatna', '199805162018121002', 'Pelaksana', 'Aktif'),
(12, 'Muhammad Iqbal Antaridha Mukhti', '199802142021011002', 'Pelaksana', 'Aktif'),
(13, 'Muhammad Bangsawan', '199205142013101002', 'Pelaksana', 'Aktif'),
(14, 'Muhammad Dimas Maulana Putra', '200007142022011001', 'Pelaksana', 'Aktif'),
(15, 'Muhammad Ikhsan Maulana', '199103282012101002', 'Pelaksana', 'Aktif'),
(16, 'Muhammad Rezza Priyandi', '199606162015021001', 'Pelaksana', 'Aktif'),
(17, 'Nopa Hatta Saputra', '200007122019121001', 'Pelaksana', 'Aktif'),
(18, 'Rialdi Ahmad Sazali Sipayung', '199807252018121001', 'Pelaksana', 'Aktif'),
(19, 'Rikardo Pakpahan ', '199211082012101001', 'Pelaksana', 'Aktif'),
(20, 'Tengku Muhammad Erzan Almansyah', '197909022000121001', 'Pelaksana', 'Aktif'),
(21, 'Willy Istananda', '199008202010011002', 'Pelaksana', 'Aktif'),
(22, 'Yosafat Haloho', '199407142016121001', 'Pelaksana', 'Aktif'),
(23, 'Zacky Azhari Fatur Rahman', '200008272019121001', 'Pelaksana', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penempatan`
--

DROP TABLE IF EXISTS `tbl_penempatan`;
CREATE TABLE IF NOT EXISTS `tbl_penempatan` (
  `id_penempatan` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(18) NOT NULL,
  `unit_now` int NOT NULL,
  `kep` varchar(225) NOT NULL,
  `tmt` date NOT NULL,
  `durasi` int NOT NULL,
  PRIMARY KEY (`id_penempatan`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penempatan`
--

INSERT INTO `tbl_penempatan` (`id_penempatan`, `nip`, `unit_now`, `kep`, `tmt`, `durasi`) VALUES
(6, '199902102022011001', 2, '1698287696_2322f96736040fee162d.pdf', '2022-04-05', 21),
(5, '199904132022011002', 1, '1698287632_5b965d35e9a89e8939ca.pdf', '2022-04-05', 21),
(8, '199202202012101001', 5, '1698288080_9f81389b5fc6db1e47bc.pdf', '2020-01-06', 48),
(9, '199808012018011002', 5, '1698288148_e1ade4be0710658f10ca.pdf', '2023-01-16', 11),
(10, '197909022000121001', 3, '1698288185_2383e62df206486e0e53.pdf', '2023-01-16', 11),
(11, '199407142016121001', 5, '1698288204_32fbb7d1f4fd16d7f0b3.pdf', '2023-01-16', 11),
(12, '199709262018011003', 5, '1698288250_2a2af2c69d4f872eb14e.pdf', '2023-01-16', 11),
(13, '199205142013101002', 5, '1698288328_ee4129a73e37d9c5b88d.pdf', '2022-09-01', 16),
(14, '199811212018011001', 3, '1698288360_b612f377fd4b20cf735a.pdf', '2022-09-01', 16),
(15, '199103282012101002', 4, '1698288391_dd69bc34bdaaf1f3f2e4.pdf', '2022-09-01', 16),
(16, '200103312019122001', 5, '1698288969_2c9a47f06e09ca1a659a.pdf', '2020-10-07', 39),
(17, '200009202019121001', 4, '1698289041_769767fe42b73e5039a7.pdf', '2020-10-07', 39),
(18, '199908072019122001', 4, '1698289085_f7e9ed515b94479aae81.pdf', '2020-10-07', 39),
(19, '199902162021011003', 2, '1698289217_0536b51d496010517e5e.pdf', '2021-04-01', 33),
(20, '199802142021011002', 1, '1698289246_c02d2f798c95ce62b3a5.pdf', '2021-04-01', 33),
(21, '199805162018121002', 5, '1698289393_635bc6cad68ba47dd67a.pdf', '2019-03-26', 57),
(22, '199807252018121001', 4, '1698289444_2f6fe0fd17c897d5c080.pdf', '2019-03-26', 57),
(23, '199606162015021001', 1, '1698289752_dea04e5658eeebfbe394.pdf', '2020-02-10', 46),
(24, '200007122019121001', 5, '1698289913_4e9c3384b55d5d4b6baa.pdf', '2020-10-07', 39),
(25, '199211082012101001', 2, '1698290019_66f47ce6e602b50e0e03.pdf', '2021-09-20', 27),
(26, '199008202010011002', 1, '1698290090_a183d013c8f76476e09c.pdf', '2023-06-05', 7),
(27, '200008272019121001', 4, '1698290210_635e1409f8a275143063.pdf', '2020-10-07', 39),
(28, '200007142022011001', 4, '1698298599_5316a8b55dc82e2548ae.pdf', '2022-04-05', 21),
(29, '199904132022011002', 4, '1699169066_c1cfc910da77a032f634.pdf', '2023-07-01', 6),
(30, '199202202012101001', 3, '1699169282_a10fb8b7c25e5fcac754.jpg', '2020-07-01', 42),
(31, '199202202012101001', 4, '1699169369_aaef2af7a50e15a73b7d.pdf', '2022-01-01', 24),
(32, '199202202012101001', 1, '1699169407_7a7293af1c36fb9a6e4c.pdf', '2023-07-01', 6),
(33, '200103312019122001', 1, '1699169540_0d67053926b4795ca86f.pdf', '2022-01-01', 24),
(34, '200103312019122001', 4, '1699169616_752e5a9225be0d1134e9.pdf', '2023-01-02', 12),
(35, '200009202019121001', 3, '1699169669_cddf42b6256635ab265f.pdf', '2022-01-01', 24),
(36, '199908072019122001', 3, '1699169751_b6b010395750a860be29.pdf', '2022-01-01', 24),
(37, '199811212018011001', 5, '1699169826_54dc10c0f89555f10486.pdf', '2023-01-02', 12),
(38, '199902162021011003', 1, '1699169886_41bade7507f51725d08a.pdf', '2022-07-04', 18),
(39, '199805162018121002', 1, '1699170013_b96a0e4642cd92351435.pdf', '2020-07-01', 42),
(40, '199805162018121002', 4, '1699170073_a85d8304da05c15745ee.pdf', '2022-01-01', 24),
(41, '199805162018121002', 3, '1699170098_c658f40355ca94373f28.pdf', '2023-01-02', 12),
(42, '199205142013101002', 4, '1699170150_cabc8bc6648069b9e6af.pdf', '2023-01-16', 11),
(43, '200007142022011001', 1, '1699170216_39ce39ea3d5f6344f67e.pdf', '2023-07-01', 6),
(44, '199802142021011002', 2, '1699170296_9ab40deeeaf7ef402588.pdf', '2022-07-04', 18),
(45, '199802142021011002', 3, '1699170333_134cb6d9fbdbb38302a9.pdf', '2023-09-01', 4),
(46, '199606162015021001', 4, '1699170420_52c05dda4044ff5698e8.jpg', '2020-07-01', 42),
(47, '199606162015021001', 5, '1699170455_a4640f6faa5a5c9ea1a0.pdf', '2020-01-01', 48),
(48, '199606162015021001', 3, '1699170485_06bc8184eb6a2a18404b.pdf', '2023-01-02', 12),
(49, '200007122019121001', 3, '1699170530_8df5cb1006c8480be84a.pdf', '2022-01-01', 24),
(50, '200007122019121001', 5, '1699170627_03b094e47653a277b20f.pdf', '2023-09-04', 4),
(51, '199807252018121001', 1, '1699170678_76f6be4d4bfaa22d3a2f.jpg', '2020-07-01', 42),
(52, '199807252018121001', 5, '1699170709_fb21136826ff2c61fcff.pdf', '2022-01-01', 24),
(53, '199807252018121001', 3, '1699170736_4c02884cd3809219c89d.pdf', '2023-01-02', 12),
(54, '199211082012101001', 4, '1699170794_a062c43090ccfe7e66dc.pdf', '2022-01-01', 24),
(55, '199211082012101001', 3, '1699170877_c345252986d70f9507e6.jpg', '2022-01-17', 23),
(56, '199211082012101001', 2, '1699170918_5635a491f908aab871df.pdf', '2023-09-01', 4),
(57, '197909022000121001', 2, '1699170949_52f833c6f968a00bdef3.pdf', '2023-09-01', 4),
(58, '199902102022011001', 5, '1699171017_1d18e136258acadab25e.pdf', '2022-04-26', 20),
(59, '200008272019121001', 3, '1699171065_6afecccddc474fae4d3c.pdf', '2021-07-01', 30),
(60, '200008272019121001', 5, '1699171105_bf1f4bf824e096755d91.pdf', '2023-01-01', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skill`
--

DROP TABLE IF EXISTS `tbl_skill`;
CREATE TABLE IF NOT EXISTS `tbl_skill` (
  `id_skill` int NOT NULL AUTO_INCREMENT,
  `nama_skill` varchar(100) NOT NULL,
  PRIMARY KEY (`id_skill`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_skill`
--

INSERT INTO `tbl_skill` (`id_skill`, `nama_skill`) VALUES
(1, 'Bahasa Inggris'),
(2, 'Music'),
(3, 'Tenis Lapangan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skill_pegawai`
--

DROP TABLE IF EXISTS `tbl_skill_pegawai`;
CREATE TABLE IF NOT EXISTS `tbl_skill_pegawai` (
  `id_skill_pegawai` int NOT NULL AUTO_INCREMENT,
  `nip_skill` varchar(18) NOT NULL,
  `keahlian` int NOT NULL,
  `file_keahlian` varchar(200) NOT NULL,
  `detail` text NOT NULL,
  PRIMARY KEY (`id_skill_pegawai`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_skill_pegawai`
--

INSERT INTO `tbl_skill_pegawai` (`id_skill_pegawai`, `nip_skill`, `keahlian`, `file_keahlian`, `detail`) VALUES
(5, '199904132022011002', 1, '1697621276_2004342bba695c66ca92.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

DROP TABLE IF EXISTS `tbl_unit`;
CREATE TABLE IF NOT EXISTS `tbl_unit` (
  `id_unit` int NOT NULL AUTO_INCREMENT,
  `nama_unit` varchar(100) NOT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`id_unit`, `nama_unit`) VALUES
(1, 'Seksi Pelayanan Kepabeanan dan Cukai dan Dukungan Teknis'),
(2, 'Seksi Perbendaharaan'),
(3, 'Seksi Penindakan dan Penyidikan'),
(4, 'Seksi Kepatuhan Internal dan Penyuluhan'),
(5, 'Subbagian umum');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `level`, `status`, `info`) VALUES
(1, 'Admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 'Aktif', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
