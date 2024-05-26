-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2024 at 12:58 AM
-- Server version: 8.0.35
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_sembako`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int NOT NULL,
  `id_kategori` int NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `satuan_barang` varchar(20) NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gudang`
--

CREATE TABLE `tb_gudang` (
  `id_gudang` int NOT NULL,
  `nama_gudang` varchar(20) NOT NULL,
  `alamat_gudang` varchar(50) NOT NULL,
  `kapasitas_gudang` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwalpengiriman`
--

CREATE TABLE `tb_jadwalpengiriman` (
  `id_jadwal` int NOT NULL,
  `id_outlet` int NOT NULL,
  `id_truk` int NOT NULL,
  `id_supir` int NOT NULL,
  `tgl_rencanaPengiriman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `id_outlet` int NOT NULL,
  `nama_outlet` varchar(20) NOT NULL,
  `alamat_outlet` varchar(50) NOT NULL,
  `telp_outlet` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int NOT NULL,
  `nama_pegawai` varchar(20) NOT NULL,
  `jabatan` varchar(10) NOT NULL,
  `alamat_pegawai` varchar(50) NOT NULL,
  `telp_pegawai` varchar(15) NOT NULL,
  `hakAkses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int NOT NULL,
  `id_pegawai` int NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hakAkses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengiriman`
--

CREATE TABLE `tb_pengiriman` (
  `id_pengiriman` int NOT NULL,
  `id_outlet` int NOT NULL,
  `id_truk` int NOT NULL,
  `id_supir` int NOT NULL,
  `id_gudang` int NOT NULL,
  `status_pengiriman` varchar(20) NOT NULL,
  `tgl_pengiriman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rute`
--

CREATE TABLE `tb_rute` (
  `id_rute` int NOT NULL,
  `nama_rute` varchar(20) NOT NULL,
  `daftar_titik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_stokbarang`
--

CREATE TABLE `tb_stokbarang` (
  `id_stok` int NOT NULL,
  `id_barang` int NOT NULL,
  `id_gudang` int NOT NULL,
  `jumlah_stok` int NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_supir`
--

CREATE TABLE `tb_supir` (
  `id_supir` int NOT NULL,
  `id_rute` int NOT NULL,
  `nama_supir` varchar(20) NOT NULL,
  `alamat_supir` varchar(50) NOT NULL,
  `telp_supir` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_truk`
--

CREATE TABLE `tb_truk` (
  `id_truk` int NOT NULL,
  `nomor_plat` varchar(10) NOT NULL,
  `kapasitas_truk` int NOT NULL,
  `kondisi_truk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indexes for table `tb_jadwalpengiriman`
--
ALTER TABLE `tb_jadwalpengiriman`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_outlet` (`id_outlet`),
  ADD KEY `id_truk` (`id_truk`),
  ADD KEY `id_supir` (`id_supir`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_outlet` (`id_outlet`),
  ADD KEY `id_truk` (`id_truk`),
  ADD KEY `id_supir` (`id_supir`),
  ADD KEY `id_gudang` (`id_gudang`);

--
-- Indexes for table `tb_rute`
--
ALTER TABLE `tb_rute`
  ADD PRIMARY KEY (`id_rute`);

--
-- Indexes for table `tb_stokbarang`
--
ALTER TABLE `tb_stokbarang`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_gudang` (`id_gudang`);

--
-- Indexes for table `tb_supir`
--
ALTER TABLE `tb_supir`
  ADD PRIMARY KEY (`id_supir`),
  ADD KEY `id_rute` (`id_rute`);

--
-- Indexes for table `tb_truk`
--
ALTER TABLE `tb_truk`
  ADD PRIMARY KEY (`id_truk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  MODIFY `id_gudang` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jadwalpengiriman`
--
ALTER TABLE `tb_jadwalpengiriman`
  MODIFY `id_jadwal` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `id_outlet` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  MODIFY `id_pengiriman` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rute`
--
ALTER TABLE `tb_rute`
  MODIFY `id_rute` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_stokbarang`
--
ALTER TABLE `tb_stokbarang`
  MODIFY `id_stok` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_supir`
--
ALTER TABLE `tb_supir`
  MODIFY `id_supir` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_truk`
--
ALTER TABLE `tb_truk`
  MODIFY `id_truk` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  ADD CONSTRAINT `tb_gudang_ibfk_1` FOREIGN KEY (`id_gudang`) REFERENCES `tb_stokbarang` (`id_gudang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD CONSTRAINT `tb_outlet_ibfk_1` FOREIGN KEY (`id_outlet`) REFERENCES `tb_jadwalpengiriman` (`id_outlet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD CONSTRAINT `tb_pengguna_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  ADD CONSTRAINT `tb_pengiriman_ibfk_1` FOREIGN KEY (`id_gudang`) REFERENCES `tb_gudang` (`id_gudang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengiriman_ibfk_2` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id_outlet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengiriman_ibfk_3` FOREIGN KEY (`id_truk`) REFERENCES `tb_truk` (`id_truk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengiriman_ibfk_4` FOREIGN KEY (`id_supir`) REFERENCES `tb_supir` (`id_supir`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_stokbarang`
--
ALTER TABLE `tb_stokbarang`
  ADD CONSTRAINT `tb_stokbarang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_supir`
--
ALTER TABLE `tb_supir`
  ADD CONSTRAINT `tb_supir_ibfk_1` FOREIGN KEY (`id_supir`) REFERENCES `tb_jadwalpengiriman` (`id_supir`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_supir_ibfk_2` FOREIGN KEY (`id_rute`) REFERENCES `tb_rute` (`id_rute`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_truk`
--
ALTER TABLE `tb_truk`
  ADD CONSTRAINT `tb_truk_ibfk_1` FOREIGN KEY (`id_truk`) REFERENCES `tb_jadwalpengiriman` (`id_truk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
