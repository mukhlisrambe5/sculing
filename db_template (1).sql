-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 31, 2023 at 03:12 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_data`
--

INSERT INTO `tbl_data` (`id_data`, `elemenVar`, `elemenNum`, `elementSelect`, `elementRadio`, `elementCheck`, `elementTextArea`, `elementDate`, `elementImg`, `elementFile`) VALUES
(1, 'var', 123123, '1', 1, '1,2,3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-07-30', 'image.jpg', 'filepdf.pdf'),
(2, 'var2', 1231232, '2', 2, '2,3', '2Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-07-30', 'image2.jpg', 'filepdf2.pdf');

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
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `level`, `status`, `info`) VALUES
(1, 'Admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, ''),
(2, 'Mukhlis', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 0, ''),
(4, 'Admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, ''),
(5, 'Mukhlis', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 0, ''),
(7, 'Admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, ''),
(10, 'Admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, ''),
(13, 'Admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, ''),
(32, 'tessha', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 1, ''),
(16, 'Admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, ''),
(18, 'Mukhlis2', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 0, ''),
(19, 'Admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, ''),
(22, 'Admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, ''),
(27, 'qwerasdedit', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, ''),
(31, '1aasd1', 'a19549e4bed474b8091839e4bcccae0efa73320a', 2, 0, ''),
(29, 'asdfzxc', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 0, ''),
(30, 'qwead', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 1, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
