-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 10:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduanmila`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_masyarakat`
--

CREATE TABLE `tb_masyarakat` (
  `id_masyarakat` int(11) NOT NULL,
  `nik` char(16) DEFAULT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_masyarakat`
--

INSERT INTO `tb_masyarakat` (`id_masyarakat`, `nik`, `nama`, `username`, `password`, `telp`, `deleted_at`) VALUES
(10, '766', 'pp', 'pp', '$2y$10$mYM2rGls7w0kZwW0VVpC/utCgpIgvZnxxXOVK6cCum70721lDV8jW', '078997', NULL),
(12, '0897', 'masy', 'masy', '$2y$10$5Rn372Emw6BFA.edyH5Sfe3zSGphekxTNRHE1PP5ET5c2eo6BoA3a', '099789', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaduan`
--

CREATE TABLE `tb_pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date DEFAULT NULL,
  `nik` char(16) DEFAULT NULL,
  `isi_laporan` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('0','proses','selesai') DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengaduan`
--

INSERT INTO `tb_pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`, `deleted_at`) VALUES
(8, '2023-02-28', '766', 'Jalan desa rusak tolong dibenahi pak', '1677555533_db58ff0f60d64508fb43.jpg', 'selesai', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `level` enum('admin','petugas') DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`, `deleted_at`) VALUES
(1, 'pet', 'pet', '$2y$10$CoZ.92vhnvPJOoWovrh78ucWp8QUmFQPloLR1kF7UpjaViBx6orv.', '06768', 'petugas', NULL),
(3, 'admin', 'admin', '$2y$10$JOpFebuFUJA.dj7JtPK5x.OoohwHt8nsc.Gi2XxgJ1QW414qj3Hk6', '079875', 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tanggapan`
--

CREATE TABLE `tb_tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) DEFAULT NULL,
  `tgl_tanggapan` date DEFAULT NULL,
  `tanggapan` text DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tanggapan`
--

INSERT INTO `tb_tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`, `deleted_at`) VALUES
(6, 8, '2023-02-28', 'Baik akan segera diperbaiki', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`);

--
-- Indexes for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_tanggapan`
--
ALTER TABLE `tb_tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  MODIFY `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_tanggapan`
--
ALTER TABLE `tb_tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
