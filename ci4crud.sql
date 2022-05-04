-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 10:36 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bidang` enum('Finance','Marketing','HR') NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `email`, `bidang`, `alamat`) VALUES
(6, 'Adyuta', 'Yuta@gmail.com', 'Marketing', 'Jakarta'),
(7, 'Budi Kusuma', 'Yuta@gmail.com', 'Finance', 'Jakarta'),
(8, 'Perkasa', 'Yuta@gmail.com', 'HR', 'Jakarta'),
(9, 'Asakusa K', 'Yuta@gmail.com', 'Marketing', 'Jakarta'),
(10, 'Alan Budi Kusuma', 'Yuta@gmail.com', 'Finance', 'Jakarta'),
(11, 'Yuta Watanabe', 'Yuta@gmail.com', 'HR', 'Jakarta'),
(12, 'Dewangga', 'Yuta@gmail.com', 'HR', 'Jakarta'),
(13, 'Gilang R', 'Yuta@gmail.com', 'Marketing', 'Jakarta'),
(14, 'Widi PK', 'Yuta@gmail.com', 'Finance', 'Jakarta'),
(15, 'Zee', 'Yuta@gmail.com', 'Finance', 'Denpasar'),
(16, 'Yudistira', 'Yuta@gmail.com', 'Marketing', 'Jakarta'),
(17, 'Indrawan', 'Yuta@gmail.com', 'Marketing', 'Jakarta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
