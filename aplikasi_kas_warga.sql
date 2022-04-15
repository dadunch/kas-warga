-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 08:50 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_kas_warga`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_warga`
--

CREATE TABLE `tb_data_warga` (
  `id` int(11) NOT NULL,
  `nik_warga` varchar(8) NOT NULL,
  `nama_warga` varchar(64) NOT NULL,
  `nomor_warga` varchar(12) NOT NULL,
  `alamat_warga` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_data_warga`
--

INSERT INTO `tb_data_warga` (`id`, `nik_warga`, `nama_warga`, `nomor_warga`, `alamat_warga`) VALUES
(8, '08060102', 'MAMAT', '081215144884', 'PAPAN MAS BLOK F 01  NO 02'),
(9, '08060101', 'GIFFARI', '084651122551', 'PAPAN MAS BLOK F 01 NO 01'),
(10, '08060103', 'DEDDY', '088811233321', 'PAPAN MAS BLOK F 01 NO 03'),
(13, '08060104', 'CORBUZIER', '087777666677', 'PAPAN MAS BLOK F 01 NO 04'),
(14, '08060105', 'BAMBANG', '088899990112', 'PAPAN MAS BLOK F 01 NO 05'),
(15, '08060201', 'SUKIJAN', '087667766444', 'PAPAN MAS BLOK F 02 NO 01'),
(16, '08060202', 'RENDY', '081266541123', 'PAPAN MAS BLOK F 02 NO 02'),
(17, '08060203', 'DAVID', '086412626359', 'PAPAN MAS BLOK F 02 NO 03'),
(18, '08060204', 'GALANG', '081222666678', 'PAPAN MAS BLOK F 02 NO 04'),
(19, '08060205', 'GUNAWAN', '085611238847', 'PAPAN MAS BLOK F 02 NO 05'),
(20, '08060301', 'HADI', '081777221121', 'PAPAN MAS BLOK F 03 NO 01'),
(21, '08060302', 'BAYU', '084411215448', 'PAPAN MAS BLOK F 03 NO 02'),
(22, '08060303', 'ANNISA', '089655411558', 'PAPAN MAS BLOK F 03 NO 03'),
(23, '08060304', 'FAJAR', '084511221144', 'PAPAN MAS BLOK F 03 NO 04'),
(24, '08060305', 'NURUL', '081233551144', 'PAPAN MAS BLOK F 03 NO 05'),
(25, '08060401', 'RIZKI', '081415161718', 'PAPAN MAS BLOK F 04 NO 01'),
(26, '08060402', 'ANDRE', '085662635992', 'PAPAN MAS BLOK F 04 NO 02'),
(27, '08060403', 'ARI', '085665562332', 'PAPAN MAS BLOK F 04 NO 03'),
(28, '08060404', 'MARIA', '081466555566', 'PAPAN MAS BLOK F 04 NO 04'),
(29, '08060405', 'WAHYU', '088844356655', 'PAPAN MAS BLOK F 04 NO 05'),
(30, '08060501', 'JAMES', '081251344112', 'PAPAN MAS BLOK F 04 NO 01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_tagihan`
--

CREATE TABLE `tb_detail_tagihan` (
  `nik_warga` varchar(8) NOT NULL,
  `januari` int(32) NOT NULL,
  `februari` int(32) NOT NULL,
  `maret` int(32) NOT NULL,
  `april` int(32) NOT NULL,
  `mei` int(32) NOT NULL,
  `juni` int(32) NOT NULL,
  `juli` int(32) NOT NULL,
  `agustus` int(32) NOT NULL,
  `september` int(32) NOT NULL,
  `oktober` int(32) NOT NULL,
  `november` int(32) NOT NULL,
  `desember` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_tagihan`
--

INSERT INTO `tb_detail_tagihan` (`nik_warga`, `januari`, `februari`, `maret`, `april`, `mei`, `juni`, `juli`, `agustus`, `september`, `oktober`, `november`, `desember`) VALUES
('08060101', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('08060102', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('08060103', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('08060104', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('08060105', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('08060201', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('08060202', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('08060203', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('08060204', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('08060205', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('08060301', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50000, 0),
('08060302', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('08060303', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('08060304', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50000, 0),
('08060305', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50000, 0),
('08060401', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50000, 0),
('08060402', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50000, 0),
('08060403', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50000, 0),
('08060404', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50000, 0),
('08060405', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('08060501', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan_bulan`
--

CREATE TABLE `tb_laporan_bulan` (
  `id` int(11) NOT NULL,
  `bulan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_laporan_bulan`
--

INSERT INTO `tb_laporan_bulan` (`id`, `bulan`) VALUES
(3, 'oktober'),
(34, 'november');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan_keterangan`
--

CREATE TABLE `tb_laporan_keterangan` (
  `id` int(11) NOT NULL,
  `id_keterangan` int(11) NOT NULL,
  `bulan_keterangan` varchar(32) NOT NULL,
  `tanggal` varchar(16) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `saldo` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_laporan_keterangan`
--

INSERT INTO `tb_laporan_keterangan` (`id`, `id_keterangan`, `bulan_keterangan`, `tanggal`, `keterangan`, `saldo`) VALUES
(3, 3, '', '25', 'Bayar Sampah', 500000),
(4, 3, '', '27', 'Bantuan Kelahiran', 250000),
(5, 3, '', '27', 'Bayar Keamanan', 500000),
(6, 3, '', '27', 'Pembelian Stempel RT', 50000),
(7, 3, '', '27', 'Bayar Air', 120000),
(8, 3, '', '28', 'Rukun Kematian', 150000),
(9, 3, '', '29', 'Dana Sosial', 430000),
(96, 34, 'november', '24', 'Bayar Sampah', 250000),
(97, 34, 'november', '25', 'Bayar Keamanan', 50000),
(100, 34, 'november', '26', 'Pembelian Stempel', 200000),
(104, 34, 'november', '27', 'Santunan', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `id_user` varchar(32) NOT NULL,
  `nama_user` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `id_user`, `nama_user`, `password`) VALUES
(4, 'bendahara', '', '$2y$10$UgEdtX1hGX.AvuBa8o5p7efoDfy8/XO/sLf.ggcftQAdtHO6Q8c5a');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat`
--

CREATE TABLE `tb_riwayat` (
  `no` int(11) NOT NULL,
  `nik_warga` varchar(8) NOT NULL,
  `nama_warga` varchar(32) NOT NULL,
  `bulan` varchar(16) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_riwayat`
--

INSERT INTO `tb_riwayat` (`no`, `nik_warga`, `nama_warga`, `bulan`, `waktu`) VALUES
(92, '08060405', 'WAHYU', 'oktober', '2021-11-23 17:31:55'),
(93, '08060102', 'MAMAT', 'oktober', '2021-11-23 17:32:02'),
(95, '08060101', 'GIFFARI APRILLIANTO', 'oktober', '2021-11-23 17:32:13'),
(97, '08060104', 'CORBUZIER', 'oktober', '2021-11-23 17:32:20'),
(99, '08060103', 'DEDDY', 'oktober', '2021-11-23 17:32:42'),
(100, '08060203', 'DAVID', 'oktober', '2021-11-23 17:32:55'),
(101, '08060105', 'BAMBANG', 'oktober', '2021-11-23 17:32:59'),
(102, '08060201', 'SUKIJAN', 'oktober', '2021-11-23 17:33:33'),
(103, '08060202', 'RENDY', 'oktober', '2021-11-23 17:33:43'),
(104, '08060204', 'GALANG', 'oktober', '2021-11-23 17:33:59'),
(105, '08060302', 'BAYU', 'oktober', '2021-11-23 17:34:21'),
(106, '08060205', 'GUNAWAN', 'oktober', '2021-11-23 17:34:41'),
(107, '08060303', 'ANNISA', 'oktober', '2021-11-23 17:35:02'),
(108, '08060304', 'FAJAR', 'oktober', '2021-11-23 17:35:11'),
(109, '08060305', 'NURUL', 'oktober', '2021-11-23 17:35:26'),
(110, '08060403', 'ARI', 'oktober', '2021-11-23 17:35:32'),
(111, '08060401', 'RIZKI', 'oktober', '2021-11-23 17:35:42'),
(112, '08060301', 'HADI', 'oktober', '2021-11-23 17:36:04'),
(113, '08060402', 'ANDRE', 'oktober', '2021-11-23 17:36:15'),
(114, '08060404', 'MARIA', 'oktober', '2021-11-23 17:36:22'),
(137, '08060405', 'WAHYU', 'november', '2021-12-01 21:49:58'),
(138, '08060201', 'SUKIJAN', 'november', '2021-12-01 21:50:01'),
(139, '08060104', 'CORBUZIER', 'november', '2021-12-01 21:50:03'),
(140, '08060204', 'GALANG', 'november', '2021-12-02 12:55:01'),
(154, '08060302', 'BAYU', 'november', '2021-12-04 11:20:58'),
(155, '08060102', 'MAMAT', 'november', '2021-12-04 12:04:20'),
(156, '08060101', 'GIFFARI', 'november', '2021-12-05 09:57:45'),
(163, '08060205', 'GUNAWAN', 'november', '2021-12-06 10:33:26'),
(164, '08060303', 'ANNISA', 'november', '2021-12-06 13:51:50'),
(165, '08060203', 'DAVID', 'november', '2021-12-06 13:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_uang`
--

CREATE TABLE `tb_uang` (
  `id` int(11) NOT NULL,
  `bulan` varchar(64) NOT NULL,
  `nominal` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_uang`
--

INSERT INTO `tb_uang` (`id`, `bulan`, `nominal`) VALUES
(1, 'januari', 0),
(2, 'februari', 0),
(3, 'maret', 0),
(4, 'april', 0),
(5, 'mei', 0),
(6, 'juni', 0),
(7, 'juli', 0),
(8, 'agustus', 0),
(9, 'september', 0),
(10, 'oktober', 2000000),
(11, 'november', 650000),
(12, 'desember', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_data_warga`
--
ALTER TABLE `tb_data_warga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik_warga` (`nik_warga`);

--
-- Indexes for table `tb_detail_tagihan`
--
ALTER TABLE `tb_detail_tagihan`
  ADD PRIMARY KEY (`nik_warga`),
  ADD KEY `nik_warga` (`nik_warga`);

--
-- Indexes for table `tb_laporan_bulan`
--
ALTER TABLE `tb_laporan_bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_laporan_keterangan`
--
ALTER TABLE `tb_laporan_keterangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_keterangan` (`id_keterangan`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD PRIMARY KEY (`no`),
  ADD KEY `nik_warga` (`nik_warga`);

--
-- Indexes for table `tb_uang`
--
ALTER TABLE `tb_uang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bulan` (`bulan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_data_warga`
--
ALTER TABLE `tb_data_warga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_laporan_bulan`
--
ALTER TABLE `tb_laporan_bulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_laporan_keterangan`
--
ALTER TABLE `tb_laporan_keterangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `tb_uang`
--
ALTER TABLE `tb_uang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_tagihan`
--
ALTER TABLE `tb_detail_tagihan`
  ADD CONSTRAINT `tb_detail_tagihan_ibfk_1` FOREIGN KEY (`nik_warga`) REFERENCES `tb_data_warga` (`nik_warga`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
