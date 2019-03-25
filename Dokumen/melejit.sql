-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2019 at 02:11 AM
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
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fundings`
--

CREATE TABLE `fundings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_content_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` text COLLATE utf8mb4_unicode_ci,
  `deposit` decimal(15,2) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkbs`
--

CREATE TABLE `kkbs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_content_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal` decimal(15,2) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
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
(34, '2019_03_21_135743_create_fundings_table', 4),
(35, '2019_03_23_123058_create_branches_table', 4),
(36, '2019_03_23_123624_add_branch_on_user', 4),
(37, '2019_03_23_131321_create_kkbs_table', 4),
(38, '2019_03_24_093401_create_retail_credits_table', 5),
(39, '2019_03_24_110859_create_transactionals_table', 6);

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
-- Table structure for table `retail_credits`
--

CREATE TABLE `retail_credits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_content_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal` decimal(15,2) DEFAULT NULL,
  `limit` decimal(15,2) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `retail_credits`
--

INSERT INTO `retail_credits` (`id`, `user_id`, `product_content_id`, `customer_name`, `account_number`, `nominal`, `limit`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 28, 'test', NULL, '123.00', NULL, 'approved', '2019-03-24 04:16:13', '2019-03-24 04:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `transactionals`
--

CREATE TABLE `transactionals` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_content_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merchant_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal` decimal(15,2) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(10) UNSIGNED DEFAULT NULL,
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

INSERT INTO `users` (`id`, `branch_id`, `nip`, `name`, `email`, `phone`, `password`, `position`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, '123456', 'Admin', 'admin@gmail.com', 'admin phone', '$2y$10$hX5WODeJlIpfc2BYlg0J.ebquQ4EDeax8Tn5omMHVZtefh/3G4Bou', 'admin', 'bFOysYzTdsPmc0hhUa9g33eJqPQFn9jI7GsvUWZz8DU09bfgWijic8y8lDuA', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fundings`
--
ALTER TABLE `fundings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fundings_user_id_foreign` (`user_id`),
  ADD KEY `fundings_product_content_id_foreign` (`product_content_id`);

--
-- Indexes for table `kkbs`
--
ALTER TABLE `kkbs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kkbs_user_id_foreign` (`user_id`),
  ADD KEY `kkbs_product_content_id_foreign` (`product_content_id`);

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
-- Indexes for table `retail_credits`
--
ALTER TABLE `retail_credits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `retail_credits_user_id_foreign` (`user_id`),
  ADD KEY `retail_credits_product_content_id_foreign` (`product_content_id`);

--
-- Indexes for table `transactionals`
--
ALTER TABLE `transactionals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactionals_user_id_foreign` (`user_id`),
  ADD KEY `transactionals_product_content_id_foreign` (`product_content_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`),
  ADD KEY `users_branch_id_foreign` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fundings`
--
ALTER TABLE `fundings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kkbs`
--
ALTER TABLE `kkbs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
-- AUTO_INCREMENT for table `retail_credits`
--
ALTER TABLE `retail_credits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactionals`
--
ALTER TABLE `transactionals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fundings`
--
ALTER TABLE `fundings`
  ADD CONSTRAINT `fundings_product_content_id_foreign` FOREIGN KEY (`product_content_id`) REFERENCES `product_contents` (`id`),
  ADD CONSTRAINT `fundings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `kkbs`
--
ALTER TABLE `kkbs`
  ADD CONSTRAINT `kkbs_product_content_id_foreign` FOREIGN KEY (`product_content_id`) REFERENCES `product_contents` (`id`),
  ADD CONSTRAINT `kkbs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `product_contents`
--
ALTER TABLE `product_contents`
  ADD CONSTRAINT `product_contents_product_holding_id_foreign` FOREIGN KEY (`product_holding_id`) REFERENCES `product_holdings` (`id`);

--
-- Constraints for table `retail_credits`
--
ALTER TABLE `retail_credits`
  ADD CONSTRAINT `retail_credits_product_content_id_foreign` FOREIGN KEY (`product_content_id`) REFERENCES `product_contents` (`id`),
  ADD CONSTRAINT `retail_credits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactionals`
--
ALTER TABLE `transactionals`
  ADD CONSTRAINT `transactionals_product_content_id_foreign` FOREIGN KEY (`product_content_id`) REFERENCES `product_contents` (`id`),
  ADD CONSTRAINT `transactionals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
