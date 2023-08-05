-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 26, 2023 at 03:06 AM
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
-- Database: `db_template`
--

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
  `status` int NOT NULL,
  `info` varchar(225) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `level`, `status`, `info`) VALUES
(1, 'Admin', '123456', 1, 1, ''),
(2, 'Mukhlis', '123456', 1, 0, ''),
(3, 'Mukhlis2', '123456', 1, 0, ''),
(4, 'Admin', '123456', 1, 1, ''),
(5, 'Mukhlis', '123456', 1, 0, ''),
(6, 'Mukhlis2', '123456', 1, 0, ''),
(7, 'Admin', '123456', 1, 1, ''),
(8, 'Mukhlis', '123456', 1, 0, ''),
(9, 'Mukhlis2', '123456', 1, 0, ''),
(10, 'Admin', '123456', 1, 1, ''),
(11, 'Mukhlis', '123456', 1, 0, ''),
(12, 'Mukhlis2', '123456', 1, 0, ''),
(13, 'Admin', '123456', 1, 1, ''),
(14, 'Mukhlis', '123456', 1, 0, ''),
(15, 'Mukhlis2', '123456', 1, 0, ''),
(16, 'Admin', '123456', 1, 1, ''),
(17, 'Mukhlis', '123456', 1, 0, ''),
(18, 'Mukhlis2', '123456', 1, 0, ''),
(19, 'Admin', '123456', 1, 1, ''),
(20, 'Mukhlis', '123456', 1, 0, ''),
(21, 'Mukhlis2', '123456', 1, 0, ''),
(22, 'Admin', '123456', 1, 1, ''),
(23, 'Mukhlis', '123456', 1, 0, ''),
(24, 'Mukhlis2', '123456', 1, 0, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
