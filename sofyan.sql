-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 07:17 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sofyan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(255) DEFAULT NULL,
  `role_admin` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tanggal_dibuat` date DEFAULT NULL,
  `tanggal_diupdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`, `nama_admin`, `role_admin`, `username`, `password`, `status`, `tanggal_dibuat`, `tanggal_diupdate`) VALUES
(1, 'Rafi', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'aktif', '2021-06-07', '2021-06-07'),
(2, 'Sofyan', 'studio', 'studio', 'c944634550c698febdd9c868db908d9d', 'aktif', '2021-06-07', '2021-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `studio`
--

CREATE TABLE `studio` (
  `id_studio` int(11) NOT NULL,
  `nama_studio` varchar(255) DEFAULT NULL,
  `harga_studio` varchar(255) DEFAULT NULL,
  `ket_studio` varchar(255) DEFAULT NULL,
  `foto_studio` varchar(255) DEFAULT NULL,
  `status_studio` varchar(255) DEFAULT NULL,
  `tanggal_dibuat` date DEFAULT NULL,
  `tanggal_diupdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studio`
--

INSERT INTO `studio` (`id_studio`, `nama_studio`, `harga_studio`, `ket_studio`, `foto_studio`, `status_studio`, `tanggal_dibuat`, `tanggal_diupdate`) VALUES
(23, 'Studio Satu', ' 80000', 'Studio dengan gitar bass tanpa ac', '1695368816_photo1.png', 'aktif', '2021-06-06', '2021-06-06'),
(24, 'Studio Dua', ' 120000', 'Studio dengan Gitar bass dan drum tanpa ac', '1412925417_photo2.png', 'aktif', '2021-06-06', '2021-06-06'),
(25, 'Studio Tiga', ' 200000', 'Studio full ac dengan full perlengkapan', '187156021_photo4.jpg', 'aktif', '2021-06-06', '2021-06-06'),
(26, 'Studio Premium', ' 400000', 'Studio untuk artis biasanya', '1358399818_bdbdbd.jpg', 'aktif', '2021-06-06', '2021-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_studio` int(11) NOT NULL,
  `nama_customer` varchar(255) DEFAULT NULL,
  `tgl_book` date DEFAULT NULL,
  `jam_book` varchar(255) DEFAULT NULL,
  `total_bayar` varchar(255) DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tanggal_dibuat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_studio`, `nama_customer`, `tgl_book`, `jam_book`, `total_bayar`, `bukti`, `status`, `tanggal_dibuat`) VALUES
(5, 1, 24, 'Muhammad Ilham Rafiannandha', '2021-06-06', '3', ' 360000', '1868471544_IMG_20210529_210533.jpg', 'aktif', '2021-06-06'),
(6, 1, 23, 'Muhammad Ilham Rafiannandha', '2021-06-06', '3', ' 240000', '484870842_IMG_20210529_210533.jpg', 'aktif', '2021-06-06'),
(9, 3, 24, 'alby syawal', '2021-06-27', '2', ' 240000', '1747419248_IMG_20210529_210533.jpg', 'aktif', '2021-06-07'),
(10, 2, 24, 'Ilham Rafi', '2021-06-11', '5', ' 600000', '1226502986_IMG_20210529_210533.jpg', 'aktif', '2021-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `band` varchar(255) DEFAULT NULL,
  `personil` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` enum('0','1','','') DEFAULT NULL,
  `tanggal_dibuat` date DEFAULT NULL,
  `tanggal_diupdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nik`, `nama`, `email`, `band`, `personil`, `username`, `password`, `token`, `tanggal_dibuat`, `tanggal_diupdate`) VALUES
(2, '3174082905001003', 'Ilham Rafi', 'ilhamrafi44@gmail.com', 'Bandage', '12', 'rafi', '21232f297a57a5a743894a0e4a801fc3', '1', '2021-06-06', '0000-00-00 00:00:00'),
(3, '3174082905001003', 'alby syawal', 'ilhamrafi44@gmail.com', 'Bandageddd', '12', 'alby', '4e22d85ac6c328be1716f5489eea41a5', '1', '2021-06-06', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`id_studio`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studio`
--
ALTER TABLE `studio`
  MODIFY `id_studio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
