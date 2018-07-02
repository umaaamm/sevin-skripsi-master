-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 24, 2018 at 05:02 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sevin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`) VALUES
(1, 'umam', 'umam', 'admin'),
(2, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `jml_angsuran`
--

CREATE TABLE `jml_angsuran` (
  `id` int(11) NOT NULL,
  `jml_angsuran` varchar(100) NOT NULL,
  `nama_angsuran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jml_angsuran`
--

INSERT INTO `jml_angsuran` (`id`, `jml_angsuran`, `nama_angsuran`) VALUES
(1, '6', '6 Bulan'),
(2, '12', '12 Bulan'),
(3, '18', '18 Bulan'),
(4, '24', '24 Bulan');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `nama_konsumen` varchar(100) NOT NULL,
  `no_ktp` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` varchar(100) NOT NULL,
  `merk_unit` varchar(100) NOT NULL,
  `tipe_motor` varchar(100) NOT NULL,
  `tahun_motor` varchar(100) NOT NULL,
  `warna_motor` varchar(100) NOT NULL,
  `no_bpkb` varchar(100) NOT NULL,
  `nama_bpkb` varchar(100) NOT NULL,
  `alamat_bpkb` text NOT NULL,
  `no_polisi` varchar(100) NOT NULL,
  `no_rangka` varchar(100) NOT NULL,
  `no_mesin` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `nama_konsumen`, `no_ktp`, `alamat`, `no_telpon`, `merk_unit`, `tipe_motor`, `tahun_motor`, `warna_motor`, `no_bpkb`, `nama_bpkb`, `alamat_bpkb`, `no_polisi`, `no_rangka`, `no_mesin`, `level`) VALUES
(1, 'Kurniawan Gigih Lutfi Umam', '12345', 'fsfsd', '32323', 'fdsfs', 'fsdf', 'fsfd', 'fsdffs', 'fsfds', 'fsf', 'fsdfds', 'fdsfsd', 'fsdf', 'fsf', 'konsumen'),
(3, 'umam ganteng', '333', 'ffdf', 'dfdf', 'dfdf', 'ff', 'fdf', 'fdf', 'fdf', 'fdf', 'fdfd', 'fdf', 'fdf', 'fdf', 'konsumen');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `pembayaran_pinjaman` varchar(100) NOT NULL,
  `angsuran_ke` varchar(11) NOT NULL,
  `tanggal_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_konsumen`, `id_transaksi`, `pembayaran_pinjaman`, `angsuran_ke`, `tanggal_pembayaran`) VALUES
(28, 1, 5, '1000000', '1', '06/12/2018'),
(29, 1, 5, '1000000', '2', '07/04/2018'),
(30, 1, 5, '1000000', '3', '07/04/2018'),
(31, 1, 5, '1000000', '4', '06/26/2018'),
(39, 3, 6, '500000', '1', '06/19/2018'),
(48, 1, 5, '1000000', '5', '07/02/2018'),
(49, 1, 5, '1000000', '6', '07/04/2018'),
(51, 3, 6, '500000', '2', '07/02/2018'),
(52, 3, 6, '500000', '3', '07/06/2018'),
(53, 3, 6, '500000', '4', '06/29/2018'),
(54, 3, 6, '500000', '5', '06/27/2018'),
(55, 1, 8, '50000', '1', '06/26/2018');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `jumlah_pinjaman` varchar(100) NOT NULL,
  `jumlah_angsuran` int(11) NOT NULL,
  `angsuran` varchar(100) NOT NULL,
  `tanggal_jatuh_tempo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_konsumen`, `jumlah_pinjaman`, `jumlah_angsuran`, `angsuran`, `tanggal_jatuh_tempo`) VALUES
(5, 1, '10000000', 6, '1000000', '07/02/2018'),
(6, 3, '5000000', 12, '500000', '06/05/2018'),
(7, 3, '5000000', 18, '500000', '06/30/2018'),
(8, 1, '5000000', 24, '50000', '06/27/2018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `jml_angsuran`
--
ALTER TABLE `jml_angsuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jml_angsuran`
--
ALTER TABLE `jml_angsuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
