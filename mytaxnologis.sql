-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 09:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mytaxnologis`
--

-- --------------------------------------------------------

--
-- Table structure for table `absens`
--

CREATE TABLE `absens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu_masuk` time DEFAULT NULL,
  `waktu_keluar` time DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `terlambat` int(11) DEFAULT NULL,
  `sakit` int(11) DEFAULT NULL,
  `izin` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absens`
--

INSERT INTO `absens` (`id`, `user_id`, `name`, `tanggal`, `waktu_masuk`, `waktu_keluar`, `barcode`, `terlambat`, `sakit`, `izin`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 2, 'Masdirah', '2023-10-05', '13:26:43', '14:10:40', 'AONLmPqHbN', 1, NULL, NULL, NULL, '2023-10-04 23:26:45', '2023-10-05 00:10:40'),
(2, 2, 'Masdirah', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'ADA KEPERLUAN MENDADAK', '2023-10-05 00:29:06', '2023-10-05 00:29:06'),
(3, 2, 'Masdirah', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'sakit kepala', '2023-10-05 00:34:06', '2023-10-05 00:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `divisi_id` int(11) NOT NULL,
  `jenis_item` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `barang1` varchar(255) DEFAULT NULL,
  `harga1` bigint(20) DEFAULT NULL,
  `barang2` varchar(255) DEFAULT NULL,
  `harga2` bigint(20) DEFAULT NULL,
  `barang3` varchar(255) DEFAULT NULL,
  `harga3` bigint(20) DEFAULT NULL,
  `barang4` varchar(255) DEFAULT NULL,
  `harga4` bigint(20) DEFAULT NULL,
  `total_harga` bigint(20) DEFAULT NULL,
  `diketahui` varchar(255) DEFAULT NULL,
  `disetujui` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `budgets`
--

INSERT INTO `budgets` (`id`, `user_id`, `divisi_id`, `jenis_item`, `tanggal`, `barang1`, `harga1`, `barang2`, `harga2`, `barang3`, `harga3`, `barang4`, `harga4`, `total_harga`, `diketahui`, `disetujui`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'barang', '2023-10-10', 'keperluan1', 200000, 'keperluan11', 400000, NULL, NULL, NULL, NULL, 600000, NULL, NULL, 'diterima', '2023-10-09 19:40:24', '2023-10-09 20:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `cutis`
--

CREATE TABLE `cutis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `divisi_id` int(11) NOT NULL,
  `hak_cuti` int(11) NOT NULL,
  `ambil_cuti` int(11) NOT NULL,
  `sisa_cuti` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `alasan_cuti` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cutis`
--

INSERT INTO `cutis` (`id`, `user_id`, `divisi_id`, `hak_cuti`, `ambil_cuti`, `sisa_cuti`, `tanggal_mulai`, `tanggal_selesai`, `alasan_cuti`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 20, 5, 15, '2023-10-09', '2023-10-15', 'keluarga', 'diterima', '2023-10-09 00:10:18', '2023-10-09 00:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `divisis`
--

CREATE TABLE `divisis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_divisi` varchar(255) DEFAULT NULL,
  `nama_divisi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisis`
--

INSERT INTO `divisis` (`id`, `kode_divisi`, `nama_divisi`, `created_at`, `updated_at`) VALUES
(1, 'MT-01', 'IT-TEKNOLOGI', '2023-10-04 19:28:01', '2023-10-04 19:28:01'),
(2, 'MT-02', 'ACCOUNTING', '2023-10-10 00:54:42', '2023-10-10 00:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasis`
--

CREATE TABLE `evaluasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `divisi_id` bigint(20) UNSIGNED NOT NULL,
  `lama_percobaan` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `mulai_kerja` varchar(255) NOT NULL,
  `faktor_penilaian` varchar(255) NOT NULL,
  `catatan_atasan` varchar(255) NOT NULL,
  `catatan_hrd` varchar(255) DEFAULT NULL,
  `dievaluasi_oleh` varchar(255) DEFAULT NULL,
  `disetujui_oleh` varchar(255) DEFAULT NULL,
  `status_evaluasi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history_bayars`
--

CREATE TABLE `history_bayars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pinjam_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `jumlah_bayar_sekarang` bigint(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `history_bayars`
--

INSERT INTO `history_bayars` (`id`, `pinjam_id`, `user_id`, `tanggal_pinjam`, `tanggal_bayar`, `jumlah_bayar_sekarang`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2023-10-10', '2023-10-11', 2500000, '1696955786_KTP.jpeg', '2023-10-10 09:36:26', '2023-10-10 09:36:26'),
(2, 1, 2, '2023-10-10', '2023-10-21', 7500000, '1696993023_KTP.jpeg', '2023-10-10 19:57:03', '2023-10-10 19:57:03');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_29_102836_create_divisis_table', 1),
(6, '2023_10_04_102409_create_users_table', 1),
(7, '2023_10_04_102700_create_evaluasis_table', 1),
(8, '2023_10_05_033238_create_absens_table', 2),
(9, '2023_10_05_062437_update_kolom_tabel', 3),
(10, '2023_10_06_025948_create_inventaris_table', 4),
(11, '2023_10_06_044909_create_shiffs_table', 5),
(12, '2023_10_06_085928_create_perjalanan_dinas_table', 6),
(13, '2023_10_06_104840_create_update_kolom_tabel', 7),
(14, '2023_10_07_163119_create_update_kolom_tabel', 8),
(15, '2023_10_09_030525_create_cutis_table', 9),
(16, '2023_10_09_042143_create_update_kolom_table', 10),
(17, '2023_10_09_061803_create_update_kolom_table', 11),
(18, '2023_10_09_062056_create_update_kolom_table', 12),
(19, '2023_10_09_074103_create_budgets_table', 13),
(20, '2023_10_09_085822_create_update_kolom_tabel', 14),
(21, '2023_10_09_110101_create_pinjamen_table', 15),
(22, '2023_10_10_023705_create_budgets_table', 16),
(23, '2023_10_10_023836_create_budgets_table', 17),
(24, '2023_10_10_044225_create_update_kolom_table', 18),
(25, '2023_10_10_072515_create_history_bayars_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perjalanan_dinas`
--

CREATE TABLE `perjalanan_dinas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `divisi_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `project` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `jumlah_personel` varchar(255) NOT NULL,
  `nama_personel` varchar(255) NOT NULL,
  `jenis_perjalanan` varchar(255) NOT NULL,
  `kota_tujuan` varchar(255) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `tanggal_pulang` date NOT NULL,
  `kota_pulang` varchar(255) NOT NULL,
  `transportasi` varchar(255) NOT NULL,
  `hotel` varchar(255) NOT NULL,
  `bagasi` varchar(255) NOT NULL,
  `cash_advance` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `diminta_oleh` varchar(255) DEFAULT NULL,
  `diketahui_oleh` varchar(255) DEFAULT NULL,
  `disetujui_oleh` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perjalanan_dinas`
--

INSERT INTO `perjalanan_dinas` (`id`, `user_id`, `divisi_id`, `type`, `project`, `tujuan`, `jumlah_personel`, `nama_personel`, `jenis_perjalanan`, `kota_tujuan`, `tanggal_berangkat`, `tanggal_pulang`, `kota_pulang`, `transportasi`, `hotel`, `bagasi`, `cash_advance`, `keterangan`, `diminta_oleh`, `diketahui_oleh`, `disetujui_oleh`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'manager', 'HIPPO', 'pengecekan website hippo di bali', '2', 'irahan dan irfan', 'perjalanan luar kota', 'BALI', '2023-10-01', '2023-10-08', 'CIKARANG', 'Disiapkan Perusahaan', 'Disiapkan Perusahaan', '10 KG', '2.000.000 / ORANG', 'testing', 'Bang Dira', 'HRD INDRY', 'Merry Yaw', 'diterima', '2023-10-07 10:24:47', '2023-10-08 19:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pinjamen`
--

CREATE TABLE `pinjamen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `mulai_kerja` date NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL,
  `jangka_pelunasan` int(11) NOT NULL,
  `jumlah_cicilan` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `pelunasan_terakhir` date NOT NULL,
  `gaji` int(11) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `disetujui` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pinjamen`
--

INSERT INTO `pinjamen` (`id`, `user_id`, `mulai_kerja`, `jumlah_pinjam`, `jangka_pelunasan`, `jumlah_cicilan`, `tanggal_pinjam`, `pelunasan_terakhir`, `gaji`, `keperluan`, `disetujui`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '2023-10-03', 10000000, 4, 2500000, '2023-10-10', '2023-12-10', 4000000, 'bantuan beasiswa kampus amikom yogyakarta', 'merry yaw', 'diterima', '2023-10-09 21:43:46', '2023-10-09 23:47:32'),
(2, 5, '2023-10-10', 10000000, 2, 5000000, '2023-10-10', '2023-12-10', 4000000, 'MENGHITUNG DATA website', NULL, 'diproses', '2023-10-10 01:26:45', '2023-10-10 01:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `shiffs`
--

CREATE TABLE `shiffs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `shiff` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shiffs`
--

INSERT INTO `shiffs` (`id`, `user_id`, `shiff`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2023-10-05 23:48:42', '2023-10-06 00:56:10'),
(2, 2, 0, '2023-10-05 23:52:21', '2023-10-06 00:56:38'),
(3, 5, 0, '2023-10-10 00:56:03', '2023-10-10 00:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `divisi_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `nomor_induk` bigint(20) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat_ktp` varchar(255) DEFAULT NULL,
  `alamat_domisili` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `no_ktp` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `gol_darah` varchar(255) DEFAULT NULL,
  `status_pernikahan` varchar(255) DEFAULT NULL,
  `status_karyawan` enum('aktif','nonaktif') DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `foto_karyawan` varchar(255) DEFAULT NULL,
  `gaji` bigint(20) DEFAULT NULL,
  `uang_makan` bigint(20) DEFAULT NULL,
  `uang_transport` bigint(20) DEFAULT NULL,
  `mulai_kerja` date DEFAULT NULL,
  `akhir_kerja` date DEFAULT NULL,
  `kontrak_kerja` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `divisi_id`, `nomor_induk`, `name`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat_ktp`, `alamat_domisili`, `no_hp`, `no_ktp`, `agama`, `gol_darah`, `status_pernikahan`, `status_karyawan`, `email`, `email_verified_at`, `password`, `type`, `foto_karyawan`, `gaji`, `uang_makan`, `uang_transport`, `mulai_kerja`, `akhir_kerja`, `kontrak_kerja`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 1, 36367887, 'Masdirah', 'laki-laki', 'temanggung', '2023-10-04', 'temanggung', 'cikarang jawa barat', '081398760598', '9271030105970003', 'islam', 'o', 'Menikah', 'aktif', 'dira@gmail.com', NULL, '$2y$10$FEgeTbO.gm6LSexuaroOweQbWqccnvLa91hx0vjGGW56V7a1zw98q', 2, '1696472953_user.png', 4000000, 1500000, 500000, '2023-10-03', '2023-10-26', '1696472953_CV_Henri Herdiyanto_Programming_2023.pdf', NULL, '2023-10-04 19:29:13', '2023-10-04 19:29:13'),
(3, 1, 346365, 'indra sukma', 'laki-laki', 'temanggung', '2023-10-05', 'temanggung', 'cikarang jawa barat', '085345357667', '34566678675438', 'islam', 'o', 'Menikah', 'aktif', 'indra@gmail.com', NULL, '$2y$10$vLXWKKCYxumY2H.A9mjKoe1HDueUtSZZbQIBxzy4e38nOkTew00Iy', 0, '1696473005_user.png', 4000000, 1500000, 500000, '2023-10-05', '2023-10-26', '1696473005_CV_Henri Herdiyanto_Programming_2023.pdf', NULL, '2023-10-04 19:30:05', '2023-10-04 19:30:05'),
(4, 0, NULL, 'henri herdiyanto', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'henry.herdiyanto123@gmail.com', NULL, '$2y$10$RMt.s/mU14fz6YjhDJ4O8ORp.1w9z2VRPJcPBoqXqJbJz9F.6i8kS', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-05 21:15:22', '2023-10-05 21:15:22'),
(5, 2, 36367887, 'fajar', 'laki-laki', 'palembang', '2023-10-10', 'temanggung', 'cikarang jawa barat', '085216359893', '87656434567968', 'islam', 'o', 'Menikah', 'aktif', 'fajar@gmail.com', NULL, '$2y$10$VuJS9ZLeBynv7YsBJQKKn.lRKzybbLHjxKDNI35h57/ErYIJJLmle', 2, '1696924540_user.png', 4000000, 1500000, 500000, '2023-10-10', '2023-10-28', '1696924540_CV_Henri Herdiyanto_Programming_2023.pdf', NULL, '2023-10-10 00:55:40', '2023-10-10 00:55:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absens`
--
ALTER TABLE `absens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absens_user_id_foreign` (`user_id`);

--
-- Indexes for table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cutis`
--
ALTER TABLE `cutis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisis`
--
ALTER TABLE `divisis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluasis`
--
ALTER TABLE `evaluasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluasis_user_id_foreign` (`user_id`),
  ADD KEY `evaluasis_divisi_id_foreign` (`divisi_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `history_bayars`
--
ALTER TABLE `history_bayars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `perjalanan_dinas`
--
ALTER TABLE `perjalanan_dinas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pinjamen`
--
ALTER TABLE `pinjamen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shiffs`
--
ALTER TABLE `shiffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shiffs_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `absens`
--
ALTER TABLE `absens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cutis`
--
ALTER TABLE `cutis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `divisis`
--
ALTER TABLE `divisis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `evaluasis`
--
ALTER TABLE `evaluasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_bayars`
--
ALTER TABLE `history_bayars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `perjalanan_dinas`
--
ALTER TABLE `perjalanan_dinas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pinjamen`
--
ALTER TABLE `pinjamen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shiffs`
--
ALTER TABLE `shiffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absens`
--
ALTER TABLE `absens`
  ADD CONSTRAINT `absens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `evaluasis`
--
ALTER TABLE `evaluasis`
  ADD CONSTRAINT `evaluasis_divisi_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `divisis` (`id`),
  ADD CONSTRAINT `evaluasis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `shiffs`
--
ALTER TABLE `shiffs`
  ADD CONSTRAINT `shiffs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
