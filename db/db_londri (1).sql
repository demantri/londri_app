-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2022 at 05:03 PM
-- Server version: 5.7.33
-- PHP Version: 7.3.33

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
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `invoice` varchar(255) DEFAULT NULL,
  `parfum` varchar(50) DEFAULT NULL,
  `paket` varchar(50) DEFAULT NULL,
  `harga_perkilo` varchar(50) DEFAULT NULL,
  `berat` varchar(50) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `status_londri` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `invoice`, `parfum`, `paket`, `harga_perkilo`, `berat`, `subtotal`, `status_londri`) VALUES
(1, 'INV20220210001', 'jasmine', 'test paket', '15000', '1', 15000, 'dalam proses'),
(2, 'INV20220210001', 'jasmine', 'Regular', '6000', '2', 12000, 'dalam proses'),
(3, 'INV20220210002', 'jasmine', 'Regular', '6000', '2', 12000, 'dalam proses'),
(4, 'INV20220210003', 'jasmine', 'test paket', '15000', '2', 30000, 'dalam proses'),
(5, 'INV20220214004', 'jasmine', 'test paket', '15000', '2', 30000, 'dalam proses'),
(6, 'INV20220214005', 'hugo boss', 'Regular', '6000', '5', 30000, 'dalam proses');

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
(1, 1, '311922', 2, '2022-02-05 14:25:22'),
(2, 1, '316364', 2, '2022-02-10 14:31:29');

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
(1, 'test paket', 0, 15000),
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

--
-- Dumping data for table `parfum`
--

INSERT INTO `parfum` (`id`, `nama_parfum`, `deskripsi`) VALUES
(1, 'jasmine', 'bau melati'),
(2, 'lavender', 'parfum lavender'),
(3, 'hugo boss', 'parfum hugo boss');

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
(3, '', 'Test Non Member 2', 'Bekasi Selatan', '1239123', 0, '2022-02-05 14:42:35'),
(4, '316364', 'Dede S', 'BEkasi Selatan', '08312391923', 0, '2022-02-10 14:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `no_invoice` varchar(255) DEFAULT NULL,
  `nominal` int(20) DEFAULT NULL,
  `selisih` int(20) DEFAULT NULL,
  `diskon` int(20) DEFAULT NULL,
  `kembalian` int(20) DEFAULT NULL,
  `total_pembayaran` int(20) DEFAULT NULL,
  `metode_pembayaran` varchar(255) DEFAULT NULL,
  `status_pembayaran` varchar(255) DEFAULT NULL,
  `tgl_pembayaran` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `no_invoice`, `nominal`, `selisih`, `diskon`, `kembalian`, `total_pembayaran`, `metode_pembayaran`, `status_pembayaran`, `tgl_pembayaran`, `img`) VALUES
(1, 'INV20220210001', 27000, 0, 0, 0, 27000, 'tunai', 'lunas', '2022-02-10 12:10:03', NULL),
(2, 'INV20220210002', 12000, -12000, 0, 0, 12000, 'kredit', 'lunas', '2022-02-10 12:11:07', NULL),
(3, 'INV20220210003', 30000, 0, 0, 0, 30000, 'tunai', 'lunas', '2022-02-10 14:32:45', NULL),
(4, 'INV20220214004', 35000, -15000, 0, 5000, 30000, 'kredit', 'lunas', '2022-02-14 07:49:46', NULL),
(5, 'INV20220214005', 60000, -20000, 0, 30000, 30000, 'kredit', 'lunas', '2022-02-14 08:47:25', NULL);

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
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `invoice` varchar(255) DEFAULT NULL,
  `pelanggan` varchar(255) DEFAULT NULL,
  `total` int(20) DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `invoice`, `pelanggan`, `total`, `tgl_transaksi`, `status`) VALUES
(1, 'INV20220210001', 'Test Nama ', 27000, '2022-02-10', 'telah melakukan pembayaran'),
(2, 'INV20220210002', 'Test Non Member', 12000, '2022-02-10', 'telah melakukan pembayaran'),
(3, 'INV20220210003', 'Dede S', 30000, '2022-02-10', 'telah melakukan pembayaran'),
(4, 'INV20220214004', 'Test Nama ', 30000, '2022-02-14', 'telah melakukan pembayaran'),
(5, 'INV20220214005', 'Dede S', 30000, '2022-02-14', 'telah melakukan pembayaran');

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
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
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
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
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
