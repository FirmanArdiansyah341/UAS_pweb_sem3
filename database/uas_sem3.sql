-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 05:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_sem3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `phone`, `email`, `password`) VALUES
('Firman Ardiansyah ', '082283094836', '1@y.com', '$2y$10$j1IJFeEE5GYlnEFTBFjaButZhMdb3teg5g/ipaHjEaRRgMZFXGOd6');

-- --------------------------------------------------------

--
-- Table structure for table `informasi_kamar`
--

CREATE TABLE `informasi_kamar` (
  `nomor_kamar` int(11) NOT NULL,
  `jenis_kamar` varchar(50) DEFAULT NULL,
  `foto_kamar` text DEFAULT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `informasi_kamar`
--

INSERT INTO `informasi_kamar` (`nomor_kamar`, `jenis_kamar`, `foto_kamar`, `harga`) VALUES
(101, 'Economy', '65a0c24719dcf_economy-hotel.jpg', 1000000),
(202, 'Bisnis', '65a0c21b0835c_441aa8322965bd926a742b4c0464079f.jpg', 2000000),
(301, 'VIP', '65a04487968d8_1.jpeg', 3000000);

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `nomor_faktur` int(11) NOT NULL,
  `nama_pemesan` varchar(50) DEFAULT NULL,
  `jenis_kamar` varchar(50) DEFAULT NULL,
  `nomor_kamar` int(11) DEFAULT NULL,
  `tgl_pesan` date DEFAULT NULL,
  `tgl_habis` date DEFAULT NULL,
  `lama` int(11) DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`nomor_faktur`, `nama_pemesan`, `jenis_kamar`, `nomor_kamar`, `tgl_pesan`, `tgl_habis`, `lama`, `diskon`, `harga`, `total`) VALUES
(110, 'Annisa', 'Bisnis', 103, '2024-01-10', '2024-01-13', 3, 200000, 100000, 100000),
(112, 'Annisa', 'Bisnis', 201, '2024-01-12', '2024-01-15', 3, 200000, 2000000, 5800000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `informasi_kamar`
--
ALTER TABLE `informasi_kamar`
  ADD PRIMARY KEY (`nomor_kamar`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`nomor_faktur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `nomor_faktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
