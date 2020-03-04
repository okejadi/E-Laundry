-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2020 at 03:34 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elaundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(16) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL DEFAULT '$2y$10$5TdcxU7iiaCTFF.y7zz8SeVu/HvLt9tpbhEXeYG6t0HkeHBGRInUO',
  `level` varchar(8) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `is_active` varchar(3) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `email`, `password`, `level`, `nama`, `alamat`, `no_telepon`, `is_active`) VALUES
(2, 'admin@elaundry.com', '$2y$10$nMT/KzMHiUGOwsUvVGQCwe.UNHJl0zcYfw7M7p300eO5K0bgXuGba', 'admeen', 'Admin', 'Jl. Budi Gg. H. Subhan II No. 9B', '0812381233', 'yes'),
(3, 'rizkirahmat@gmail.com', '$2y$10$xtw.zEtKgULi36Mciw.nkuJRRI01tJofok4UwXCJiEjnqK/rWWq.u', 'customer', 'Rizki', 'Jl. Pojok Selatan No. 45 B RT 01 RW 03 Cimahi Tengah ', '085155058090', 'yes'),
(4, 'fajri.siddiq17@gmail.com', '$2y$10$nWyzCvJX.e3CGlfYG93Iyu5QYzJ4LO0GGUmG3gc9KkgYlZlJ6vhVG', 'customer', 'Fajri', 'Jl. Budi Gg. H. Subhan II No. 9B', '085155058090', 'no'),
(5, 'davaagustiani@gmail.com', '$2y$10$5TdcxU7iiaCTFF.y7zz8SeVu/HvLt9tpbhEXeYG6t0HkeHBGRInUO', 'customer', 'Dava Agustiani', 'Jl. Terusan, Cimahi Tengah', '6283190031940', 'no'),
(6, 'muhammadfarhanmadani248@gmail.com', '$2y$10$5TdcxU7iiaCTFF.y7zz8SeVu/HvLt9tpbhEXeYG6t0HkeHBGRInUO', 'customer', 'Muhammad Farhan Madani', 'Jl. Cihanjuang No.9 Kec. Parongpong', '628812219356', 'no'),
(7, 'faisal2001@gmail.com', '$2y$10$.Vg8jHS.zyK.sU/rqu97luqw4cNs7Mj4oIHpDN8sBIuNyMyzMu6JC', 'customer', 'Faisal Hafidz', 'Jl. Raya Ciburuy No.5 Kabupaten Bandung Barat', '6289677396780', 'yes'),
(8, 'mzidane943@gmail.com', '$2y$10$5TdcxU7iiaCTFF.y7zz8SeVu/HvLt9tpbhEXeYG6t0HkeHBGRInUO', 'customer', 'M Zidane Alfarel', 'Jl. Cibereum No. 24 Cimahi Selatan', '6287724595911', 'no'),
(9, 'aurelldhiendra@gmail.com', '$2y$10$5TdcxU7iiaCTFF.y7zz8SeVu/HvLt9tpbhEXeYG6t0HkeHBGRInUO', 'customer', 'Aurell Dhiendra', 'Jl. Domiri No. 4 Cimahi Tengah', '62895400363406', 'no'),
(10, 'femmymarisa606@gmail.com', '$2y$10$5TdcxU7iiaCTFF.y7zz8SeVu/HvLt9tpbhEXeYG6t0HkeHBGRInUO', 'customer', 'Femmy Marisa', 'Jl. Cibeber No. 12 Cimahi Selatan', '628889399576', 'yes'),
(11, 'dio@gmail.com', '$2y$10$5TdcxU7iiaCTFF.y7zz8SeVu/HvLt9tpbhEXeYG6t0HkeHBGRInUO', 'customer', 'Dio Juniar', 'Jl. Mahar Martanegara No. 9 Kec. Utama ', '6285846438771', 'no'),
(12, 'idam@gmail.com', '$2y$10$5TdcxU7iiaCTFF.y7zz8SeVu/HvLt9tpbhEXeYG6t0HkeHBGRInUO', 'customer', 'Idam Setia', 'Jl. Babakan Cigugur Girang No. 91 Kec. Parongpong', '6282317724874', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(5) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `tarif_paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `tarif_paket`) VALUES
(1, 'Cuci Setrika (Reguler)', 5000),
(2, 'Cuci Spring Bed', 8000),
(5, 'Cuci Setrika (Kilat)', 8000),
(6, 'Cuci Karpet', 25000),
(7, 'Cuci Selimut', 15000),
(8, 'Cuci Jas', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(5) NOT NULL,
  `id_paket` int(5) NOT NULL,
  `total_cucian` int(2) DEFAULT '0',
  `tarif` int(100) DEFAULT '0',
  `hargaantar` int(5) DEFAULT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_ambil` date DEFAULT NULL,
  `berat` int(11) DEFAULT '0',
  `id_customer` int(16) DEFAULT NULL,
  `pick_up` char(3) NOT NULL DEFAULT 'no',
  `status_ambil` char(6) NOT NULL DEFAULT 'tidak',
  `status_kirim` char(8) NOT NULL DEFAULT 'tidak',
  `status_order` varchar(30) NOT NULL DEFAULT 'Proses',
  `status_bayar` char(5) NOT NULL,
  `ket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_paket`, `total_cucian`, `tarif`, `hargaantar`, `tgl_transaksi`, `tgl_ambil`, `berat`, `id_customer`, `pick_up`, `status_ambil`, `status_kirim`, `status_order`, `status_bayar`, `ket`) VALUES
(1, 1, 0, 5000, NULL, '2020-02-19 02:33:00', NULL, 1, 3, 'no', 'tidak', 'belum', 'Diambil', 'Lunas', NULL),
(8, 1, 0, 18000, NULL, '2020-02-24 12:18:49', NULL, 3, 4, 'no', 'tidak', 'tidak', 'Selesai', 'Lunas', NULL),
(9, 6, 0, 50000, NULL, '2020-02-26 01:22:09', NULL, 2, 7, 'no', 'tidak', 'tidak', 'Diambil', 'Lunas', NULL),
(10, 1, 0, 12000, NULL, '2020-02-27 13:56:38', NULL, 2, 5, 'no', 'tidak', 'tidak', 'Diambil', 'Lunas', NULL),
(13, 1, 0, 22000, 10000, '2020-02-27 14:22:12', NULL, 2, 9, 'yes', 'tidak', 'tidak', 'Selesai', 'Belum', NULL),
(14, 1, 0, 18000, NULL, '2020-02-28 14:26:30', '2020-03-02', 3, 10, 'no', 'tidak', 'tidak', 'Selesai', 'Belum', NULL),
(15, 1, 0, 30000, 5000, '2020-03-01 06:46:16', '2020-03-03', 5, 5, 'yes', 'tidak', 'tidak', 'Proses', 'Belum', NULL),
(17, 6, 0, 270000, 20000, '2020-03-01 11:20:45', '2020-03-05', 10, 6, 'yes', 'tidak', 'tidak', 'Proses', 'Lunas', NULL),
(18, 5, 0, 24000, NULL, '2020-03-03 13:38:42', '2020-03-04', 3, 8, 'no', 'tidak', 'tidak', 'Selesai', 'Lunas', NULL),
(19, 7, 0, 85000, 10000, '2020-03-03 13:39:31', '2020-03-05', 5, 3, 'yes', 'tidak', 'tidak', 'Proses', 'Belum', NULL),
(21, 1, 0, 10000, NULL, '2020-03-03 13:44:10', '2020-03-04', 2, 9, 'no', 'tidak', 'tidak', 'Proses', 'Belum', NULL),
(22, 6, 0, 140000, 15000, '2020-03-03 13:44:55', '2020-03-06', 5, 4, 'yes', 'tidak', 'tidak', 'Selesai', 'Lunas', NULL),
(23, 1, 0, 15000, NULL, '2020-03-04 00:52:53', '2020-03-06', 3, 11, 'no', 'tidak', 'tidak', 'Diambil', 'Lunas', NULL),
(24, 7, 0, 30000, NULL, '2020-03-04 01:10:48', '2020-03-10', 2, 12, 'no', 'tidak', 'tidak', 'Diambil', 'Lunas', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
