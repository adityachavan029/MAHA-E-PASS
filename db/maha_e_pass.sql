-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 10, 2024 at 07:38 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maha_e_pass`
--

-- --------------------------------------------------------

--
-- Table structure for table `passapplication`
--

DROP TABLE IF EXISTS `passapplication`;
CREATE TABLE IF NOT EXISTS `passapplication` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `profile_photo` varchar(400) NOT NULL,
  `InstituteName` varchar(100) NOT NULL,
  `InstituteAddress` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sign-up`
--

DROP TABLE IF EXISTS `sign-up`;
CREATE TABLE IF NOT EXISTS `sign-up` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Login-First-Name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Login-Last-Name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Login-Email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Password-2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sign-up`
--

INSERT INTO `sign-up` (`id`, `Login-First-Name`, `Login-Last-Name`, `Login-Email`, `Password-2`) VALUES
(1, 'niket', 'nannavare', 'niketnannaware703@gm', '1234'),
(2, 'aditya', 'chavan', 'dsfsadf@gami.com', '123'),
(3, 'athrav', 'bobe', 'athrav@gmail.com', '1234567'),
(4, 'mauli', 'more', 'mauli@gamail.com', '1234'),
(5, 'mauli', 'more', 'mauli@gamail.com', '1234'),
(6, 'a', 'dsf', 'dsfsadf@gami.ckm', '1223'),
(7, 'b', 'a', 'dsfsadf@gami.com', '12'),
(8, 'niket', 'nannavare', 'dsfsadf@gami.com', '1122'),
(9, 'niket', 'nannavare', 'dsfsadf@gami.ckm', '122'),
(10, 'niket', 'nannavare', 'niketnannaware703@gm', '123456'),
(11, 'nik', 'n', 'dsfsadf@gami.ckm', '0909'),
(12, 'sadfsfadf', 'more', 'niketnannaware703@gm', '1123565767'),
(13, 'a', 'dsf', 'niketnannaware703@gm', '667890'),
(14, 'ab', 'ab', 'niket@gmail.com', '$2b$10$l7xnpem9n2v79Qdqdv/tBuQ'),
(16, 'niket', 'nannavare', 'niketnannaware703@gm', '\'\'\''),
(17, 'niket', 'nannavare', 'niketnannaware703@gm', '\'\''),
(18, 'a', 'dsf', 'dsfsadf@gami.ckm', '$2b$10$MiCwCWOCLl00a3GwhRLwM.S'),
(19, 'niket', 'nannavare', 'niketnannaware703@gm', '$2b$10$dM2QtKopNQXSyiOxHGXK6.S'),
(20, 'pranav', 'kulkarni', 'pranav@gmail.com', '$2b$10$/6fkGhO/TVWjyCTe9.qLS.z'),
(21, 'amit', 'l', 'amit@123gmail.com', '$2b$10$WYngUTNbLI77FBSAApTk4e3'),
(22, 'om', 'korke', 'om@gmail.com', '$2b$10$bTJj5nAdKuU.hvQgN6QD/eK'),
(23, 'sadfsfadf', 'dsf', 'niketnannaware703@gm', '132323'),
(24, 'aditya', 'patil', 'aditya@gmail.com', '$2b$10$cby2k6fG84aOH2V8QvO7MeN'),
(25, 'rushi', 'qwqw', 'ruhsi@gmail.com', '$2b$10$iYAKam9rhP6aPAQSYEVPHOX3Sn3XLUtEZ1/d4vlWdxwpspkCS7gAa');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
