-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 05:41 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_dpw`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `tipe_akun` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`tipe_akun`, `nama`, `nik`, `alamat`, `jenis_kelamin`, `tanggal_lahir`, `email`, `password`) VALUES
('Admin', 'Admin', '', '', '', '0000-00-00', 'Admin', 'Admin'),
('Covid Ranger', 'Rohfi', '1402019076', 'Jl Perintis No 37', 'Laki-Laki', '2021-04-29', 'muhammadrohfi39@gmail.com', 'YukBisaYuk'),
('Pengunjung', 'Nurul Alawiah', '14232411', 'Jl jalan aja', 'perempuan', '2021-04-29', 'nurul@masukin', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `penyebaran_covid`
--

CREATE TABLE `penyebaran_covid` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `jumlah_positif` int(11) NOT NULL,
  `jumlah_sembuh` int(11) NOT NULL,
  `jumlah_meninggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyebaran_covid`
--

INSERT INTO `penyebaran_covid` (`id`, `tanggal`, `provinsi`, `jumlah_positif`, `jumlah_sembuh`, `jumlah_meninggal`) VALUES
(1, '2021-04-20', 'DKI JAKARTA', 121, 50, 5),
(2, '2021-02-11', 'BENGKULU', 98, 12, 1),
(3, '2020-09-11', 'JAWA BARAT', 107, 23, 10),
(4, '2021-02-11', 'JAWA TIMUR', 209, 56, 90),
(5, '2021-02-11', 'BALI', 77, 46, 9),
(6, '2021-04-21', 'DKI JAKARTA', 58, 77, 6),
(7, '2021-04-22', 'DKI JAKARTA', 21, 52, 12),
(8, '2021-04-23', 'DKI JAKARTA', 44, 23, 26),
(9, '2021-04-24', 'DKI JAKARTA', 19, 45, 10),
(10, '2020-09-12', 'JAWA BARAT', 90, 73, 88),
(11, '2020-09-13', 'JAWA BARAT', 203, 32, 72),
(12, '2020-09-14', 'JAWA BARAT', 102, 49, 21),
(13, '2020-09-15', 'JAWA BARAT', 144, 50, 45),
(14, '2021-02-07', 'JAWA TIMUR', 58, 77, 6),
(15, '2021-02-08', 'JAWA TIMUR', 87, 33, 10),
(16, '2021-02-09', 'JAWA TIMUR', 64, 21, 12);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(30) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`) VALUES
(11, 'ACEH'),
(12, 'SUMATERA UTARA'),
(13, 'SUMATERA BARAT'),
(14, 'RIAU'),
(15, 'JAMBI'),
(16, 'SUMATERA SELATAN'),
(17, 'BENGKULU'),
(18, 'LAMPUNG'),
(19, 'KEPULAUAN BANGKA BELITUNG'),
(21, 'KEPULAUAN RIAU'),
(31, 'DKI JAKARTA'),
(32, 'JAWA BARAT'),
(33, 'JAWA TENGAH'),
(34, 'DI YOGYAKARTA'),
(35, 'JAWA TIMUR'),
(36, 'BANTEN'),
(51, 'BALI'),
(52, 'NUSA TENGGARA BARAT'),
(53, 'NUSA TENGGARA TIMUR'),
(61, 'KALIMANTAN BARAT'),
(62, 'KALIMANTAN TENGAH'),
(63, 'KALIMANTAN SELATAN'),
(64, 'KALIMANTAN TIMUR'),
(65, 'KALIMANTAN UTARA'),
(71, 'SULAWESI UTARA'),
(72, 'SULAWESI TENGAH'),
(73, 'SULAWESI SELATAN'),
(74, 'SULAWESI TENGGARA'),
(75, 'GORONTALO'),
(76, 'SULAWESI BARAT'),
(81, 'MALUKU'),
(82, 'MALUKU UTARA'),
(91, 'PAPUA BARAT'),
(94, 'PAPUA');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_akun`
--

CREATE TABLE `tipe_akun` (
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_akun`
--

INSERT INTO `tipe_akun` (`nama`) VALUES
('Admin'),
('Covid Ranger'),
('Pengunjung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `fk1` (`tipe_akun`);

--
-- Indexes for table `penyebaran_covid`
--
ALTER TABLE `penyebaran_covid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_akun`
--
ALTER TABLE `tipe_akun`
  ADD PRIMARY KEY (`nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penyebaran_covid`
--
ALTER TABLE `penyebaran_covid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`tipe_akun`) REFERENCES `tipe_akun` (`nama`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
