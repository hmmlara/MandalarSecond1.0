-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2023 at 02:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mandalar`
--

-- --------------------------------------------------------

--
-- Table structure for table `noti`
--

CREATE TABLE `noti` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `noti`
--

INSERT INTO `noti` (`id`, `content`, `is_read`, `link`) VALUES
(1, '0', 0, ''),
(2, '0', 0, ''),
(3, '0', 0, ''),
(4, '0', 0, ''),
(5, ' is folling You', 0, ''),
(6, 'Sai Htoo Lwin is folling You', 0, ''),
(0, 'sd NayMyoThant is folling You', 0, ''),
(0, 'sd NayMyoThant is folling You', 0, ''),
(0, 'sd NayMyoThant is folling You', 0, ''),
(0, 'sd NayMyoThant is folling You', 0, ''),
(0, 'sd NayMyoThant is folling You', 0, ''),
(0, ' is folling You', 0, 'asdfasd'),
(0, ' is folling You', 0, 'asdfasd'),
(0, ' is folling You', 0, 'asdfasd'),
(0, ' is folling You', 0, 'asdfasd'),
(0, ' is folling You', 0, 'asdfasd'),
(0, ' is folling You', 0, 'asdfasd'),
(0, ' is folling You', 0, 'asdfasd'),
(0, ' is folling You', 0, 'asdfasd'),
(0, ' is folling You', 0, 'asdfasd'),
(0, ' is folling You', 0, 'asdfasd'),
(0, ' is folling You', 0, 'asdfasd'),
(0, ' is folling You', 0, 'asdfasd');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
