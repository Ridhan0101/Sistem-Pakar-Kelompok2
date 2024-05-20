-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 03:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mabac`
--

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `ID` int(10) NOT NULL,
  `Peringkat` int(10) NOT NULL,
  `Nama` varchar(1000) NOT NULL,
  `Harga` int(255) NOT NULL,
  `Jarak` int(255) NOT NULL,
  `Jumlah_Lapangan` int(255) NOT NULL,
  `Persediaan` int(255) NOT NULL,
  `Lahan_Parkir` int(255) NOT NULL,
  `Kebersihan` int(255) NOT NULL,
  `Hasil` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`ID`, `Peringkat`, `Nama`, `Harga`, `Jarak`, `Jumlah_Lapangan`, `Persediaan`, `Lahan_Parkir`, `Kebersihan`, `Hasil`) VALUES
(1, 4, 'Seven Sport', 65000, 10, 4, 2, 3, 3, 0.087381),
(2, 1, 'Alvino', 50000, 10, 1, 1, 1, 2, 0.00790476),
(3, 10, 'Cemerlang', 60000, 9, 5, 2, 3, 3, 0.204619),
(4, 8, 'Sakti', 75000, 9, 1, 2, 1, 2, 0.174095),
(5, 9, 'Agung Jaya', 50000, 7, 2, 2, 1, 1, 0.189095),
(6, 3, 'Victory', 85000, 1, 4, 2, 1, 3, 0.0330952),
(7, 2, 'Naga Jaya', 67000, 7, 4, 1, 1, 2, 0.0310476),
(8, 7, 'Radja', 60000, 8, 3, 2, 2, 2, 0.122286),
(9, 6, 'gor', 67000, 2, 2, 1, 3, 3, 0.113286),
(10, 5, 'Union Badminton Club', 66000, 7, 6, 1, 3, 1, 0.0896667),
(0, 100, 'user', 80000, 5, 4, 2, 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mabac_alternatives`
--

CREATE TABLE `mabac_alternatives` (
  `id_alternative` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mabac_alternatives`
--

INSERT INTO `mabac_alternatives` (`id_alternative`, `name`) VALUES
(1, 'Seven Sport'),
(2, 'Alvino'),
(3, 'Cemerlang'),
(4, 'Sakti'),
(5, 'Agung Jaya'),
(6, 'Victory'),
(7, 'Naga Jaya'),
(8, 'Radja'),
(9, 'Gor'),
(10, 'Union Badminton Club');

-- --------------------------------------------------------

--
-- Table structure for table `mabac_criterias`
--

CREATE TABLE `mabac_criterias` (
  `id_criteria` tinyint(3) UNSIGNED NOT NULL,
  `criteria` varchar(100) NOT NULL,
  `weight` float NOT NULL,
  `attribute` set('benefit','cost') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mabac_criterias`
--

INSERT INTO `mabac_criterias` (`id_criteria`, `criteria`, `weight`, `attribute`) VALUES
(1, 'Harga', 0.41, 'cost'),
(2, 'Jarak', 0.24, 'cost'),
(3, 'Jumlah Lapangan', 0.16, 'benefit'),
(4, 'Persedian alat', 0.1, 'benefit'),
(5, 'Lahan Parkir', 0.06, 'benefit'),
(6, 'Kebersihan', 0.03, 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `mabac_users`
--

CREATE TABLE `mabac_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mabac_users`
--

INSERT INTO `mabac_users` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mabac_alternatives`
--
ALTER TABLE `mabac_alternatives`
  ADD PRIMARY KEY (`id_alternative`);

--
-- Indexes for table `mabac_criterias`
--
ALTER TABLE `mabac_criterias`
  ADD PRIMARY KEY (`id_criteria`);

--
-- Indexes for table `mabac_users`
--
ALTER TABLE `mabac_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mabac_alternatives`
--
ALTER TABLE `mabac_alternatives`
  MODIFY `id_alternative` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mabac_users`
--
ALTER TABLE `mabac_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
