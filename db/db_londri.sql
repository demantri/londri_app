-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 09, 2022 at 11:16 AM
-- Server version: 5.7.32
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_londri`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `id_detail` int(11) DEFAULT NULL,
  `member_id` varchar(50) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `join_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `id_detail`, `member_id`, `point`, `join_date`) VALUES
(1, 1, '311922', 2, '2022-02-05 14:25:22');

-- --------------------------------------------------------

--
-- Table structure for table `member_detail`
--

CREATE TABLE `member_detail` (
  `id` int(11) NOT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `min_poin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_detail`
--

INSERT INTO `member_detail` (`id`, `deskripsi`, `min_poin`) VALUES
(1, 'Easy', 0),
(2, 'Medium', 100);

-- --------------------------------------------------------

--
-- Table structure for table `paket_londri`
--

CREATE TABLE `paket_londri` (
  `id` int(11) NOT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  `harga_paket` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_londri`
--

INSERT INTO `paket_londri` (`id`, `deskripsi`, `durasi`, `harga_paket`) VALUES
(1, 'test paket', 0, 500000),
(2, 'Regular', 3, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `parfum`
--

CREATE TABLE `parfum` (
  `id` int(11) NOT NULL,
  `nama_parfum` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `member_id` varchar(50) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `member_id`, `nama`, `alamat`, `no_telp`, `is_deleted`, `created_at`) VALUES
(1, '311922', 'Test Nama ', 'Jl Alamat', '087877472663', 0, '2022-02-05 14:25:22'),
(2, '', 'Test Non Member', 'Test', '1231231231', 0, '2022-02-05 14:28:32'),
(3, '', 'Test Non Member', 'Bekasi Selatan', '1239123', 0, '2022-02-05 14:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `create` int(11) DEFAULT NULL,
  `update` int(11) DEFAULT NULL,
  `delete` int(11) DEFAULT NULL,
  `modul_transaksi` int(11) DEFAULT NULL,
  `laporan_pendapatan` int(11) DEFAULT NULL,
  `jurnal` int(11) DEFAULT NULL,
  `bb` int(11) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `deskripsi`, `create`, `update`, `delete`, `modul_transaksi`, `laporan_pendapatan`, `jurnal`, `bb`, `is_deleted`) VALUES
(1, 'superadmin', 1, 1, 0, 0, 0, 0, 1, 0),
(2, 'keuangan', 0, 0, 0, 0, 1, 1, 1, 0),
(3, 'kasir', 0, 0, 0, 0, 0, 0, 1, 0),
(4, 'testing', 1, 1, 0, 0, 0, 0, 1, 1),
(5, 'Testing data 2', 1, 1, 0, 0, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `username`, `email`, `password`, `is_active`, `created_at`) VALUES
(1, 1, 'admin', 'admin@londri.id', '$2a$12$vDJM1Z.3Y5mXDglbHxA3m.2GElOP0vDVco2iOQrY55mJFQUitcTyK', 1, '2022-02-01 06:59:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_detail`
--
ALTER TABLE `member_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_londri`
--
ALTER TABLE `paket_londri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parfum`
--
ALTER TABLE `parfum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member_detail`
--
ALTER TABLE `member_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paket_londri`
--
ALTER TABLE `paket_londri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parfum`
--
ALTER TABLE `parfum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
