-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 14, 2024 at 09:10 AM
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
-- Database: `db_sembako`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_04_091426_tb_kategori', 1),
(6, '2024_07_04_091434_tb_barang', 1),
(7, '2024_07_04_091439_tb_gudang', 1),
(8, '2024_07_04_091452_tb_stokbarang', 1),
(9, '2024_07_04_091504_tb_outlet', 1),
(10, '2024_07_04_091509_tb_truk', 1),
(11, '2024_07_04_091520_tb_pegawai', 1),
(12, '2024_07_04_091526_tb_pengguna', 1),
(13, '2024_07_04_091533_tb_rute', 1),
(14, '2024_07_04_091537_tb_supir', 1),
(15, '2024_07_04_091543_tb_pengiriman', 1),
(16, '2024_07_04_091551_tb_jadwal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` bigint UNSIGNED NOT NULL,
  `id_kategori` bigint UNSIGNED DEFAULT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `id_kategori`, `nama_barang`, `nama_kategori`, `satuan_barang`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`) VALUES
(1, 1, 'Roti Sisir', 'Makanan', 'Dus', 11111, 12222, '2024-07-14 02:10:02', '2024-07-14 02:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gudang`
--

CREATE TABLE `tb_gudang` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_gudang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_gudang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas_gudang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` bigint UNSIGNED NOT NULL,
  `id_outlet` bigint UNSIGNED DEFAULT NULL,
  `id_truk` bigint UNSIGNED DEFAULT NULL,
  `id_supir` bigint UNSIGNED DEFAULT NULL,
  `nama_outlet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_plat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_supir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jadwal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Makanan', '2024-07-14 02:09:49', '2024-07-14 02:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_outlet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_outlet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id`, `nama_pegawai`, `jabatan`, `alamat_pegawai`, `telp_pegawai`, `created_at`, `updated_at`) VALUES
(1, 'Rahman', 'pegawai_gudang', 'Malang', '085274196325', '2024-07-04 22:43:09', '2024-07-04 15:45:03'),
(2, 'Ical', 'pegawai_penjadwalan', 'Sidoarjo', '085274196325', '2024-07-04 15:46:57', '2024-07-04 19:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` bigint UNSIGNED NOT NULL,
  `id_pegawai` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hak_akses` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `id_pegawai`, `email`, `username`, `password`, `hak_akses`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'tocaga3397@nmaller.com', 'ibnu', '$2y$12$eO9I815OzGFoSAtQi1QGzORvhdB4vGp1EkLf.RS.OAD6s19L8T5/G', 'admin', 'QQsetYUUHiZRJqBs37NzoBl0jm6WaJTc8ut87GNjYPxRmwYel6lckQZqHf50', '2024-07-04 15:43:47', '2024-07-05 20:58:32'),
(3, 2, 'ibnu.septian123@gmail.com', 'a', '$2y$12$YFZFKjdfuLI3wnRX1rVCkuYw5wXc8tYYNCmUTnOEWfgHfdqxNraou', 'admin', NULL, '2024-07-04 16:13:27', '2024-07-05 20:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengiriman`
--

CREATE TABLE `tb_pengiriman` (
  `id` bigint UNSIGNED NOT NULL,
  `id_outlet` bigint UNSIGNED DEFAULT NULL,
  `id_truk` bigint UNSIGNED DEFAULT NULL,
  `id_supir` bigint UNSIGNED DEFAULT NULL,
  `nama_outlet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_plat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_supir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rute`
--

CREATE TABLE `tb_rute` (
  `id` bigint UNSIGNED NOT NULL,
  `id_gudang` bigint UNSIGNED DEFAULT NULL,
  `nama_gudang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daftar_titik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_stokbarang`
--

CREATE TABLE `tb_stokbarang` (
  `id` bigint UNSIGNED NOT NULL,
  `id_barang` bigint UNSIGNED DEFAULT NULL,
  `id_gudang` bigint UNSIGNED DEFAULT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_gudang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_stok` int NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_kadaluarsa` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_supir`
--

CREATE TABLE `tb_supir` (
  `id` bigint UNSIGNED NOT NULL,
  `id_rute` bigint UNSIGNED DEFAULT NULL,
  `nama_rute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_supir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_supir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp_supir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_truk`
--

CREATE TABLE `tb_truk` (
  `id` bigint UNSIGNED NOT NULL,
  `nomor_plat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas_truk` int NOT NULL,
  `kondisi_truk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_barang_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_jadwal_id_outlet_foreign` (`id_outlet`),
  ADD KEY `tb_jadwal_id_truk_foreign` (`id_truk`),
  ADD KEY `tb_jadwal_id_supir_foreign` (`id_supir`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_pengguna_id_pegawai_foreign` (`id_pegawai`);

--
-- Indexes for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_pengiriman_id_outlet_foreign` (`id_outlet`),
  ADD KEY `tb_pengiriman_id_truk_foreign` (`id_truk`),
  ADD KEY `tb_pengiriman_id_supir_foreign` (`id_supir`);

--
-- Indexes for table `tb_rute`
--
ALTER TABLE `tb_rute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_rute_id_gudang_foreign` (`id_gudang`);

--
-- Indexes for table `tb_stokbarang`
--
ALTER TABLE `tb_stokbarang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_stokbarang_id_barang_foreign` (`id_barang`),
  ADD KEY `tb_stokbarang_id_gudang_foreign` (`id_gudang`);

--
-- Indexes for table `tb_supir`
--
ALTER TABLE `tb_supir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_supir_id_rute_foreign` (`id_rute`);

--
-- Indexes for table `tb_truk`
--
ALTER TABLE `tb_truk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rute`
--
ALTER TABLE `tb_rute`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_stokbarang`
--
ALTER TABLE `tb_stokbarang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_supir`
--
ALTER TABLE `tb_supir`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_truk`
--
ALTER TABLE `tb_truk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id`);

--
-- Constraints for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `tb_jadwal_id_outlet_foreign` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id`),
  ADD CONSTRAINT `tb_jadwal_id_supir_foreign` FOREIGN KEY (`id_supir`) REFERENCES `tb_supir` (`id`),
  ADD CONSTRAINT `tb_jadwal_id_truk_foreign` FOREIGN KEY (`id_truk`) REFERENCES `tb_truk` (`id`);

--
-- Constraints for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD CONSTRAINT `tb_pengguna_id_pegawai_foreign` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  ADD CONSTRAINT `tb_pengiriman_id_outlet_foreign` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id`),
  ADD CONSTRAINT `tb_pengiriman_id_supir_foreign` FOREIGN KEY (`id_supir`) REFERENCES `tb_supir` (`id`),
  ADD CONSTRAINT `tb_pengiriman_id_truk_foreign` FOREIGN KEY (`id_truk`) REFERENCES `tb_truk` (`id`);

--
-- Constraints for table `tb_rute`
--
ALTER TABLE `tb_rute`
  ADD CONSTRAINT `tb_rute_id_gudang_foreign` FOREIGN KEY (`id_gudang`) REFERENCES `tb_gudang` (`id`);

--
-- Constraints for table `tb_stokbarang`
--
ALTER TABLE `tb_stokbarang`
  ADD CONSTRAINT `tb_stokbarang_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id`),
  ADD CONSTRAINT `tb_stokbarang_id_gudang_foreign` FOREIGN KEY (`id_gudang`) REFERENCES `tb_gudang` (`id`);

--
-- Constraints for table `tb_supir`
--
ALTER TABLE `tb_supir`
  ADD CONSTRAINT `tb_supir_id_rute_foreign` FOREIGN KEY (`id_rute`) REFERENCES `tb_rute` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
