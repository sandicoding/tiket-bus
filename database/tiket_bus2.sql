-- phpMyAdmin SQL Dump
-- version 5.0.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2020 at 05:09 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiket_bus2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id_bus` int(20) NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `id_berangkat` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id_bus`, `kelas`, `harga`, `id_berangkat`) VALUES
(1, 'Ekonomi', '75000', 1),
(2, 'Patas Non AC', '100000', 2),
(3, 'Ekonomi AC', '85000', 8),
(4, 'AC Non Toilet', '100000', 0),
(5, 'AC Toilet', '120000', 0),
(6, 'Ekonomi', '85000', 0),
(7, 'Patas Non AC', '125000', 0),
(8, 'Ekonomi AC', '100000', 0),
(9, 'AC Non Toilet', '135000', 0),
(10, 'AC Toilet', '160000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `keberangkatan`
--

CREATE TABLE `keberangkatan` (
  `id_berangkat` int(20) NOT NULL,
  `tujuan` varchar(40) NOT NULL,
  `jadwal` varchar(10) NOT NULL,
  `rute` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keberangkatan`
--

INSERT INTO `keberangkatan` (`id_berangkat`, `tujuan`, `jadwal`, `rute`) VALUES
(1, 'Purwokerto', '16:00 WIB', 'Bekasi - Purwokerto'),
(2, 'Purwokerto', '17:00 WIB', 'Bekasi - Purwokerto'),
(8, 'Purwokerto', '18:30 WIB', 'Bekasi - Purwokerto'),
(9, 'Purwokerto', '19:00 WIB', 'Bekasi - Purwokerto'),
(10, 'Purwokerto', '19:30 WIB', 'Bekasi - Purwokerto');

-- --------------------------------------------------------

--
-- Table structure for table `kursi`
--

CREATE TABLE `kursi` (
  `id` int(10) NOT NULL,
  `id_bus` int(10) NOT NULL,
  `kode_kursi` varchar(20) NOT NULL,
  `urutan` int(20) NOT NULL,
  `id_pesan` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursi`
--

INSERT INTO `kursi` (`id`, `id_bus`, `kode_kursi`, `urutan`, `id_pesan`) VALUES
(1, 1, 'A01', 1, 0),
(2, 1, 'A02', 2, 0),
(3, 1, 'A03', 3, 51),
(4, 1, 'A04', 4, 58),
(5, 1, 'A05', 5, 0),
(6, 1, 'A06', 6, 0),
(7, 1, 'A07', 7, 0),
(8, 1, 'A08', 8, 49),
(9, 1, 'A09', 9, 0),
(10, 1, 'A10', 10, 0),
(11, 1, 'B01', 11, 0),
(12, 1, 'B02', 12, 46),
(13, 1, 'B03', 13, 0),
(14, 1, 'B04', 14, 0),
(15, 1, 'B05', 15, 0),
(16, 1, 'B06', 16, 46),
(17, 1, 'B07', 17, 0),
(18, 1, 'B08', 18, 0),
(19, 1, 'B09', 19, 0),
(20, 1, 'B10', 20, 45),
(21, 1, 'C01', 21, 0),
(22, 1, 'C02', 22, 0),
(23, 1, 'C03', 23, 0),
(24, 1, 'C04', 24, 45),
(25, 1, 'C05', 25, 0),
(26, 2, 'A01', 1, 56),
(27, 2, 'A02', 2, 43),
(28, 2, 'A03', 3, 44),
(29, 2, 'A04', 4, 52),
(30, 2, 'A05', 5, 56),
(31, 2, 'A06', 6, 56),
(32, 2, 'A07', 7, 0),
(33, 2, 'A08', 8, 57),
(34, 2, 'A09', 9, 55),
(35, 2, 'A10', 10, 55),
(36, 2, 'B01', 11, 47),
(37, 2, 'B02', 12, 0),
(38, 2, 'B03', 13, 53),
(39, 2, 'B04', 14, 0),
(40, 2, 'B05', 15, 48),
(41, 2, 'B06', 16, 0),
(42, 2, 'B07', 17, 0),
(43, 2, 'B08', 18, 0),
(44, 2, 'B09', 19, 0),
(45, 2, 'B10', 20, 0),
(46, 2, 'C01', 21, 0),
(47, 2, 'C02', 22, 0),
(48, 2, 'C03', 23, 0),
(49, 2, 'C04', 24, 0),
(50, 2, 'C05', 25, 0),
(51, 3, 'A01', 1, 0),
(52, 3, 'A02', 2, 0),
(53, 3, 'A03', 3, 0),
(54, 3, 'A04', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kursi_pesanan`
--

CREATE TABLE `kursi_pesanan` (
  `id_kursi` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `kode_kursi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursi_pesanan`
--

INSERT INTO `kursi_pesanan` (`id_kursi`, `id_pesan`, `kode_kursi`) VALUES
(1, 27, '3'),
(2, 27, '4'),
(3, 27, '8'),
(4, 27, '8'),
(5, 28, '8'),
(6, 28, '8'),
(7, 28, '8'),
(8, 28, '8'),
(9, 29, '12'),
(10, 29, '12'),
(11, 30, '3'),
(12, 30, '3'),
(13, 30, '4'),
(14, 30, '4'),
(17, 33, '4'),
(18, 33, '7'),
(19, 33, '2'),
(20, 34, '5'),
(21, 34, '5'),
(22, 34, '5'),
(23, 35, '06A'),
(26, 36, '01A'),
(27, 36, '01B'),
(28, 37, '04C'),
(29, 37, '07C'),
(30, 41, '01A'),
(31, 41, '01B'),
(32, 43, '07C'),
(33, 44, '07D'),
(34, 45, '06D'),
(35, 45, '05D'),
(36, 46, '04D'),
(37, 46, '03D'),
(38, 47, '09D'),
(39, 48, '10D'),
(40, 49, '02D'),
(41, 50, '01D'),
(42, 51, '01C'),
(43, 52, 'A04'),
(44, 53, ''),
(45, 55, ''),
(46, 55, ''),
(47, 56, ''),
(48, 56, ''),
(49, 56, ''),
(50, 57, ''),
(51, 58, '');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(10) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `nmr_rekening` varchar(30) NOT NULL,
  `atas_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `bank`, `nmr_rekening`, `atas_nama`) VALUES
(5, 'mandiri', '1421424', 'irfan hakiki'),
(6, 'BCa', '18238239', 'DIKA'),
(7, 'DKI', '1241284', 'kodris');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesan` int(20) NOT NULL,
  `id_bus` int(20) NOT NULL,
  `id_berangkat` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nik` bigint(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `qty` int(20) NOT NULL,
  `total` varchar(30) NOT NULL,
  `fixed` int(2) NOT NULL,
  `invoice` int(20) NOT NULL,
  `konfirm` int(11) NOT NULL,
  `respons` varchar(50) NOT NULL,
  `pembayaran` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesan`, `id_bus`, `id_berangkat`, `id_user`, `nik`, `nama`, `alamat`, `tgl_pesan`, `tgl_berangkat`, `qty`, `total`, `fixed`, `invoice`, `konfirm`, `respons`, `pembayaran`) VALUES
(43, 2, 2, 0, 12343, 'jakung', 'pamulang', '2020-02-01', '2020-02-05', 1, '65000', 1, 65, 1, 'uploads/edit nilai.JPG', 1),
(44, 1, 1, 0, 171011401799, 'sandi kantona', 'ciputat', '2020-02-02', '2020-02-05', 1, '65000', 1, 297, 0, 'uploads/346-blog.png', 0),
(45, 1, 9, 0, 41098, 'apri', 'pamulang', '2020-02-06', '2020-02-07', 2, '130000', 1, 134, 1, 'uploads/361-blog.png', 1),
(46, 10, 8, 0, 171011401789, 'purnama', 'serua', '2020-02-07', '2020-02-13', 2, '320000', 1, 900, 1, '', 0),
(47, 9, 1, 0, 17101130, 'purnama', 'serua ciputat', '2020-02-10', '2020-02-11', 1, '135000', 1, 90, 1, 'uploads/701-blog.png', 1),
(48, 1, 1, 0, 1234, 'yohan', 'pamulang', '2020-02-10', '2020-02-12', 1, '65000', 1, 565, 0, '', 0),
(49, 7, 8, 0, 424252, 'doni', 'pamulang', '2020-02-14', '2020-02-12', 1, '125000', 1, 443, 0, '', 0),
(50, 2, 1, 3, 1710114021, 'sandi sandoro', 'pamulang', '2020-02-14', '2020-02-15', 1, '100000', 1, 460, 0, '', 0),
(51, 1, 1, 3, 21212, 'doni irawan', 'pamualng', '2020-02-14', '2020-02-15', 1, '65000', 1, 616, 0, '', 0),
(52, 2, 1, 3, 2412, 'aji hidayat', 'pamulang', '2020-02-16', '2020-02-17', 1, '100000', 1, 473, 1, 'uploads/640-blog.png', 1),
(53, 2, 1, 3, 17101122, 'saipul indra', 'pamulang', '2020-02-16', '2020-02-18', 1, '100000', 1, 892, 1, 'uploads/559-blog.png', 1),
(54, 3, 8, 3, 1232, 'adni rijal', 'ciputat', '2020-02-16', '2020-02-19', 2, '170000', 0, 418, 0, '', 0),
(55, 2, 9, 3, 1232, 'adni rijal', 'ciputat', '2020-02-16', '2020-02-19', 2, '', 1, 622, 1, 'uploads/37-blog.png', 1),
(56, 2, 2, 3, 202019, 'andi irawam', 'lampung', '2020-02-16', '2020-02-18', 3, '300000', 1, 575, 1, 'uploads/615-blog.png', 1),
(57, 2, 2, 3, 41098, 'dika', 'pamulang', '2020-02-18', '2020-02-20', 1, '100000', 1, 783, 0, '', 0),
(58, 1, 1, 4, 17101212, 'irfan', 'jombang', '2020-02-20', '2020-02-21', 1, '75000', 1, 880, 1, 'uploads/215-blog.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `level`) VALUES
(1, 'admin', '', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'sandicoding', 'codekita@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(3, 'sandidigdo', 'coding@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(4, 'irfan', 'irfan@gmail.com', '24b90bc48a67ac676228385a7c71a119', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id_bus`,`id_berangkat`);

--
-- Indexes for table `keberangkatan`
--
ALTER TABLE `keberangkatan`
  ADD PRIMARY KEY (`id_berangkat`);

--
-- Indexes for table `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kursi_pesanan`
--
ALTER TABLE `kursi_pesanan`
  ADD PRIMARY KEY (`id_kursi`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id_bus` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `keberangkatan`
--
ALTER TABLE `keberangkatan`
  MODIFY `id_berangkat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kursi`
--
ALTER TABLE `kursi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `kursi_pesanan`
--
ALTER TABLE `kursi_pesanan`
  MODIFY `id_kursi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

