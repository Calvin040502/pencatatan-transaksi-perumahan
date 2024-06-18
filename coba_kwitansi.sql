-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 05:33 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coba_kwitansi`
--

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
-- Table structure for table `kwitansis`
--

CREATE TABLE `kwitansis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nomor_kwitansi` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `terbilang` text NOT NULL,
  `pembayaran` text NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `lokasi` text NOT NULL,
  `no_kavling` varchar(255) NOT NULL,
  `type` text NOT NULL,
  `jumlah` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kwitansis`
--

INSERT INTO `kwitansis` (`id`, `user_id`, `nomor_kwitansi`, `nama_lengkap`, `alamat`, `no_hp`, `terbilang`, `pembayaran`, `keterangan`, `lokasi`, `no_kavling`, `type`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 'SMS-00001', 'Calvin Nugraha', 'Majalengka', '085220190601', 'Dua Juta Rupiah', 'Booking', NULL, 'Cirebon', '3dsv', '30/60', 'Rp 2.000.000', '2023-11-23 04:59:43', '2023-11-23 04:59:43'),
(2, 1, 'SMS-00002', 'Calvin Nugraha', 'Majalengka', '085220190601', 'Dua Juta Rupiah', 'Booking', NULL, 'Cirebon', 'wefwszfv', '30/60', 'Rp 2.000.000', '2023-11-23 05:13:10', '2023-11-23 05:13:10'),
(3, 1, 'SMS-00003', 'Calvin Nugraha', 'Majalengka', '085220190601', 'Dua Juta Rupiah', 'Booking', NULL, 'Cirebon', 'wefwszfv', '30/60', 'Rp 2.000.000', '2023-11-23 05:18:09', '2023-11-23 05:18:09'),
(4, 1, 'SMS-00004', 'Calvin Nugraha', 'Majalengka', '085220190601', 'Dua Juta Rupiah', 'Booking', NULL, 'Cirebon', 'wefwszfv', '30/60', 'Rp 324.234', '2023-11-23 05:18:29', '2023-11-23 05:18:29'),
(5, 1, 'SMS-00005', 'Calvin Nugraha', 'Majalengka', '085220190601', 'Dua Juta Rupiah', 'Booking', NULL, 'Cirebon', 'wefwszfv', '30/60', 'Rp 2.000.000', '2023-11-23 05:18:47', '2023-11-23 05:18:47'),
(6, 1, 'SMS-00006', 'Calvin Nugraha', 'Majalengka', '085220190601', 'Dua Juta Rupiah', 'Booking', NULL, 'wetewf', '3dsv', '30/60', 'Rp 2.000.000', '2023-11-23 05:19:06', '2023-11-23 05:19:06'),
(7, 1, 'SMS-00007', 'Asrof', 'Majalengka', '085220190601', 'Dua Juta Rupiah', 'DP', NULL, 'Cirebon', 'qwq2r', '30/60', 'Rp 2.000.000', '2023-11-23 05:19:26', '2023-11-23 05:19:26'),
(8, 1, 'SMS-00008', 'asdf', 'Majalengka', '23423532532', 'Dua Juta Rupiah', 'Booking', NULL, 'Grand Taman Anggrek Suci', 'wefwszfv', '30/60', 'Rp 2.000.000', '2023-11-23 05:19:43', '2023-11-23 05:19:43'),
(9, 1, 'SMS-00009', 'Calvin Nugraha', 'Majalengka', '085220190601', 'Dua Juta Rupiah', 'Booking', NULL, 'Cirebon', 'wefwszfv', '30/60', 'Rp 2.000.000', '2023-11-23 05:20:21', '2023-11-23 05:20:21'),
(10, 1, 'SMS-00010', 'Calvin Nugraha', 'aescf', '085220190601', 'Dua Juta Rupiah', 'Booking', NULL, 'Cirebon', 'wefwszfv', '30/60', 'Rp 2.000.000', '2023-11-23 05:20:43', '2023-11-23 05:20:43'),
(11, 1, 'SMS-00011', 'Calvin Nugraha', 'Majalengka', '085220190601', 'Dua Juta Rupiah', 'Booking', NULL, 'Cirebon', 'wefwszfv', '30/60', 'Rp 2.000.000', '2023-11-23 05:21:02', '2023-11-23 05:21:02'),
(12, 1, 'SMS-00012', 'Calvin Nugraha', 'Majalengka', '085220190601', 'Dua Juta Rupiah', 'Booking', NULL, 'Cirebon', 'wefwszfv', '30/60', 'Rp 2.000.000', '2023-11-23 05:22:21', '2023-11-23 05:22:21'),
(13, 1, 'SMS-00013', 'Calvin Nugraha', 'Majalengka', '23423532532', 'Dua Juta Rupiah', 'DP', NULL, 'wetewf', 'wefwszfv', '30/60', 'Rp 2.000.000', '2023-12-07 03:57:30', '2023-12-07 03:57:30');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_11_085857_create_kwitansis_table', 1),
(6, '2023_09_27_203051_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 1);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'web', '2023-11-23 04:59:08', '2023-11-23 04:59:08'),
(2, 'admin', 'web', '2023-11-23 04:59:08', '2023-11-23 04:59:08');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-11-23 04:59:08', '2023-11-23 04:59:08'),
(2, 'super_admin', 'web', '2023-11-23 04:59:08', '2023-11-23 04:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin', 'superadmin@gmail.com', '2023-11-23 04:59:08', '$2y$10$GK/JtUVYGFCZlHzVvpz33Ou4yyHeXNGmf84nJFlLwSyT0zB3FpcfC', 'C29uao1lp9yaqh2TLYFiuFbSQZeARFCzxR7OD3tEjlQXXDgXprtBra41AGjm', '2023-11-23 04:59:08', '2023-11-23 04:59:08'),
(2, 'Admin A', 'admina', 'admina@gmail.com', '2023-11-23 04:59:08', '$2y$10$GK/JtUVYGFCZlHzVvpz33Ou4yyHeXNGmf84nJFlLwSyT0zB3FpcfC', 'ebeFIWGeVCLu3s5ltkEA7lKIWj9IFqV9cKITurGyctHN1JBNuW8WlRQKDTNx', '2023-11-23 04:59:08', '2023-11-23 04:59:08'),
(3, 'Admin B', 'adminb', 'adminb@gmail.com', '2023-11-23 04:59:08', '$2y$10$GK/JtUVYGFCZlHzVvpz33Ou4yyHeXNGmf84nJFlLwSyT0zB3FpcfC', 'MgYMMfIdIU', '2023-11-23 04:59:08', '2023-11-23 04:59:08');

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
-- Indexes for table `kwitansis`
--
ALTER TABLE `kwitansis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kwitansis`
--
ALTER TABLE `kwitansis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
