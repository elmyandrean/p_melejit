-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2019 at 05:55 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_melejit`
--

-- --------------------------------------------------------

--
-- Table structure for table `fundings`
--

CREATE TABLE `fundings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deposit` decimal(15,2) NOT NULL,
  `other` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_03_20_061604_create_product_holdings_table', 2),
(12, '2019_03_20_082524_create_product_contents_table', 3),
(15, '2019_03_21_135743_create_fundings_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_contents`
--

CREATE TABLE `product_contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_holding_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` int(11) NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_contents`
--

INSERT INTO `product_contents` (`id`, `product_holding_id`, `name`, `point`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tabungan Mandiri', 5, 'active', '2019-03-20 19:37:32', '2019-03-20 19:37:32'),
(2, 1, 'MTR (Mandiri Tabungan Rencana)', 10, 'active', '2019-03-20 19:37:32', '2019-03-20 19:37:32'),
(3, 1, 'MTB (Mandiri Tabungan Bisnis)', 10, 'active', '2019-03-20 19:37:32', '2019-03-20 19:37:32'),
(4, 5, '-', 15, 'active', '2019-03-20 20:00:11', '2019-03-20 20:00:11'),
(13, 9, '-', 1, 'deactive', '2019-03-21 00:42:43', '2019-03-21 01:12:13'),
(16, 9, 'aaa', 1, 'deactive', '2019-03-21 00:47:23', '2019-03-21 01:12:13'),
(17, 9, 'bbb', 2, 'deactive', '2019-03-21 00:47:23', '2019-03-21 01:12:13'),
(18, 9, 'aaa', 1, 'deactive', '2019-03-21 01:03:52', '2019-03-21 01:12:13'),
(19, 9, 'ccc', 3, 'deactive', '2019-03-21 01:03:52', '2019-03-21 01:12:13'),
(20, 10, '-', 5, 'active', '2019-03-21 07:00:11', '2019-03-21 07:00:11'),
(21, 11, '-', 10, 'active', '2019-03-21 07:00:34', '2019-03-21 07:00:34'),
(22, 12, 'Kredit Kendaraan Bermotor', 5, 'active', '2019-03-21 07:04:54', '2019-03-21 07:04:54'),
(23, 13, 'Kredit Kendaraan Bermotor', 5, 'active', '2019-03-21 07:05:16', '2019-03-21 07:05:16'),
(24, 14, '-', 10, 'active', '2019-03-21 07:05:45', '2019-03-21 07:05:45'),
(25, 15, '-', 10, 'active', '2019-03-21 07:06:12', '2019-03-21 07:06:12'),
(26, 16, 'Referal KPR', 10, 'active', '2019-03-21 07:06:48', '2019-03-21 07:06:48'),
(27, 17, 'Referal KPR', 10, 'deactive', '2019-03-21 07:06:49', '2019-03-21 07:07:02'),
(28, 18, '-', 5, 'active', '2019-03-21 07:07:26', '2019-03-21 07:07:26'),
(29, 19, '-', 5, 'active', '2019-03-21 07:07:40', '2019-03-21 07:07:40'),
(30, 20, 'Incoming', 5, 'active', '2019-03-21 07:07:59', '2019-03-21 07:07:59'),
(31, 21, '-', 5, 'active', '2019-03-21 07:08:14', '2019-03-21 07:08:14'),
(32, 22, '-', 5, 'active', '2019-03-21 07:08:29', '2019-03-21 07:08:29'),
(33, 23, 'Akuisisi & Aktivasi', 1, 'active', '2019-03-21 07:08:56', '2019-03-21 07:08:56'),
(34, 24, 'Akuisisi & Aktivasi', 2, 'active', '2019-03-21 07:09:13', '2019-03-21 07:09:13'),
(35, 25, 'Akuisisi & Aktivasi', 5, 'active', '2019-03-21 07:09:40', '2019-03-21 07:09:40'),
(36, 26, 'Akuisisi & Aktivasi', 5, 'active', '2019-03-21 07:10:02', '2019-03-21 07:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `product_holdings`
--

CREATE TABLE `product_holdings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_holdings`
--

INSERT INTO `product_holdings` (`id`, `name`, `menu`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tabungan', 'Funding', 'active', '2019-03-20 19:37:32', '2019-03-20 19:37:32'),
(5, 'New Payroll', 'Funding', 'active', '2019-03-20 20:00:11', '2019-03-20 20:00:11'),
(9, 'test', 'Funding', 'deactive', '2019-03-21 00:42:43', '2019-03-21 01:12:13'),
(10, 'Deposito', 'Funding', 'active', '2019-03-21 07:00:11', '2019-03-21 07:00:11'),
(11, 'GIRO', 'Funding', 'active', '2019-03-21 07:00:34', '2019-03-21 07:00:34'),
(12, 'MTF', 'KKB', 'active', '2019-03-21 07:04:54', '2019-03-21 07:04:54'),
(13, 'MUF', 'KKB', 'active', '2019-03-21 07:05:16', '2019-03-21 07:05:16'),
(14, 'AXA', 'KKB', 'active', '2019-03-21 07:05:45', '2019-03-21 07:05:45'),
(15, 'SME', 'Kredit Retail', 'active', '2019-03-21 07:06:12', '2019-03-21 07:06:12'),
(16, 'Consumer Loan', 'Kredit Retail', 'active', '2019-03-21 07:06:48', '2019-03-21 07:06:48'),
(17, 'Consumer Loan', 'Kredit Retail', 'deactive', '2019-03-21 07:06:49', '2019-03-21 07:07:02'),
(18, 'KUM', 'Kredit Retail', 'active', '2019-03-21 07:07:26', '2019-03-21 07:07:26'),
(19, 'KSM', 'Kredit Retail', 'active', '2019-03-21 07:07:40', '2019-03-21 07:07:40'),
(20, 'CC', 'Kredit Retail', 'active', '2019-03-21 07:07:59', '2019-03-21 07:07:59'),
(21, 'KUR', 'Kredit Retail', 'active', '2019-03-21 07:08:14', '2019-03-21 07:08:14'),
(22, 'EDC', 'Transactional', 'active', '2019-03-21 07:08:29', '2019-03-21 07:08:29'),
(23, 'Mandiri Online', 'Transactional', 'active', '2019-03-21 07:08:56', '2019-03-21 07:08:56'),
(24, 'Mandiri Internet Bisnis', 'Transactional', 'active', '2019-03-21 07:09:13', '2019-03-21 07:09:13'),
(25, 'Mandiri Cash Management', 'Transactional', 'active', '2019-03-21 07:09:40', '2019-03-21 07:09:40'),
(26, 'Branchless Banking', 'Transactional', 'active', '2019-03-21 07:10:02', '2019-03-21 07:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `name`, `email`, `phone`, `password`, `position`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '123456', 'Admin', 'admin@gmail.com', 'admin phone', '$2y$10$hX5WODeJlIpfc2BYlg0J.ebquQ4EDeax8Tn5omMHVZtefh/3G4Bou', 'admin', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fundings`
--
ALTER TABLE `fundings`
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
-- Indexes for table `product_contents`
--
ALTER TABLE `product_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_contents_product_holding_id_foreign` (`product_holding_id`);

--
-- Indexes for table `product_holdings`
--
ALTER TABLE `product_holdings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fundings`
--
ALTER TABLE `fundings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_contents`
--
ALTER TABLE `product_contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product_holdings`
--
ALTER TABLE `product_holdings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_contents`
--
ALTER TABLE `product_contents`
  ADD CONSTRAINT `product_contents_product_holding_id_foreign` FOREIGN KEY (`product_holding_id`) REFERENCES `product_holdings` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
