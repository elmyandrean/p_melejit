-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 10:02 AM
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
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_content_id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `source_customer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initial_deposit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pks_payroll` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_employee` int(11) NOT NULL,
  `limit_payroll` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
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
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2019_03_13_064402_create_product_holdings_table', 1),
(20, '2019_03_13_064447_create_product_contents_table', 1),
(21, '2019_03_13_064828_create_branches_table', 1),
(22, '2019_03_13_070406_create_fundings_table', 1),
(23, '2019_03_13_102554_create_transactionals_table', 1),
(24, '2019_03_13_103034_create_retail_credits_table', 1),
(25, '2019_03_13_103730_create_vehicle_loans_table', 1);

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
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_holdings`
--

CREATE TABLE `product_holdings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `retail_credits`
--

CREATE TABLE `retail_credits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_content_id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `source_customer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_credit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `follow_up_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactionals`
--

CREATE TABLE `transactionals` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_content_id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `source_customer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_limit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transportation_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ksm_limit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `follow_up_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `email`, `name`, `password`, `position`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, '123456789', 'asfasfasf', 'asfasf', '$2y$10$zOOoe8p2rq5MHvdPDYTjne6e9SebnnDXfYWtjI.D4OjXwTIKx/C8y', 'admin', 'taJjor4rUZGtMjVJd9Ffb0hJ9xeCCIS3CmlM9c3lOlVB16hX2sTeOGhYq0Ka', NULL, '2019-03-18 01:38:30'),
(4, 'axvzxa', 'dgadasd', 'asgqwsdasd', '$2y$10$McjMI3hwsYhJsuRgYvpZvuzhOpYXRBWAV/5s0FLNoFf8/lVytsvo2', '2222', NULL, '2019-03-18 00:50:36', '2019-03-18 01:38:42'),
(5, 'test', 'test', 'test', '$2y$10$uxsqfv5jIEvSazBxMrmH8OnThCYr4U5hGO/N86oJ.RtDk8KDkwO0W', 'test', NULL, '2019-03-18 00:52:23', '2019-03-18 00:52:23'),
(7, 'test1', 'test1', 'test1', '$2y$10$Ew9gVvDzLKSe32FXljReCu8BBn2JyJF7VJoquhhQWtqLvGTcom7ci', 'test1', NULL, '2019-03-18 00:53:32', '2019-03-18 00:53:32'),
(8, 'asd', 'asd', 'asd', '$2y$10$h3LM4ekw0OvquA1B/C/zOu8pFrBzIbZ77Ol76Yl9YujgahCWo4Z5a', 'asd', NULL, '2019-03-18 00:53:54', '2019-03-18 00:53:54'),
(9, 'qweqw', 'qweqw', 'qweqw', '$2y$10$QA9kUGgqEFCbFQ77rGrT7eCPgOK3ZwsBlbcsmyHja0Xa9q.wt1JCK', 'sfqfq', NULL, '2019-03-18 00:54:47', '2019-03-18 00:54:47'),
(10, 'zxczxc', 'zxczxc', 'zxczxc', '$2y$10$OmuVTZpMRNwq2boklyybwep1dGMWAslFE3ryDU3qTR5u81EQsCR5C', 'zxczxc', NULL, '2019-03-18 00:55:47', '2019-03-18 00:55:47'),
(11, 'qwe', 'qwe', 'qwe', '$2y$10$f8xSG7auKdofVQyf6D/Mh.9NOliaY276n8uPYPKBbNkhZJuTrwGLO', 'sfsad', NULL, '2019-03-18 00:57:22', '2019-03-18 00:57:22'),
(12, 'fasfasd', 'fasfasd', 'fasfasd', '$2y$10$S2tbqX16IS1nLqAQyokAtuKG5Kdcl13/YSLhgjFK8MtUWk3.qElXO', 'asgsg', NULL, '2019-03-18 00:58:22', '2019-03-18 00:58:22'),
(14, 'zxczxc3123', 'zxczxc3123', 'zxczxc3123', '$2y$10$BezndqDoEkpUEePUJLGQvOoX0GK4B.0.WHs1th1oJhwdjZMhceBLi', 'xxvxcxc', NULL, '2019-03-18 00:59:24', '2019-03-18 00:59:24'),
(15, 'sdgsdfs', 'sdgsdfs', 'sdgsdfs', '$2y$10$MP4lIWDvZA/rcC4s0uEBd.KuR6HLV66RWIUconXh14mS1ldPfbB7a', 'sdgsdg', NULL, '2019-03-18 00:59:57', '2019-03-18 00:59:57'),
(16, 'asasgdsg', 'asasgdsg', 'asasgdsg', '$2y$10$XSap4lQepTRzJqNIL49SY.rLS5vGDQR1GWXuKj2ycP432oinITwzS', 'hfhfhf', NULL, '2019-03-18 01:00:20', '2019-03-18 01:00:20'),
(17, 'hdfhdfh', 'hdfhdfh', 'hdfhdfh', '$2y$10$4ZyFnYg4KbUeX06ZkSlqeO7QiPmY8OeU0ty0N.cbepr/oo8.2.c2q', 'fhfh', NULL, '2019-03-18 01:01:46', '2019-03-18 01:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_loans`
--

CREATE TABLE `vehicle_loans` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_content_id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `source_customer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_credit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `follow_up_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  ADD KEY `fundings_product_content_id_foreign` (`product_content_id`),
  ADD KEY `fundings_branch_id_foreign` (`branch_id`);

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
  ADD KEY `retail_credits_product_content_id_foreign` (`product_content_id`),
  ADD KEY `retail_credits_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `transactionals`
--
ALTER TABLE `transactionals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactionals_user_id_foreign` (`user_id`),
  ADD KEY `transactionals_product_content_id_foreign` (`product_content_id`),
  ADD KEY `transactionals_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`);

--
-- Indexes for table `vehicle_loans`
--
ALTER TABLE `vehicle_loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_loans_user_id_foreign` (`user_id`),
  ADD KEY `vehicle_loans_product_content_id_foreign` (`product_content_id`),
  ADD KEY `vehicle_loans_branch_id_foreign` (`branch_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_contents`
--
ALTER TABLE `product_contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_holdings`
--
ALTER TABLE `product_holdings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `retail_credits`
--
ALTER TABLE `retail_credits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactionals`
--
ALTER TABLE `transactionals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `vehicle_loans`
--
ALTER TABLE `vehicle_loans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fundings`
--
ALTER TABLE `fundings`
  ADD CONSTRAINT `fundings_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `fundings_product_content_id_foreign` FOREIGN KEY (`product_content_id`) REFERENCES `product_contents` (`id`),
  ADD CONSTRAINT `fundings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `product_contents`
--
ALTER TABLE `product_contents`
  ADD CONSTRAINT `product_contents_product_holding_id_foreign` FOREIGN KEY (`product_holding_id`) REFERENCES `product_holdings` (`id`);

--
-- Constraints for table `retail_credits`
--
ALTER TABLE `retail_credits`
  ADD CONSTRAINT `retail_credits_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `retail_credits_product_content_id_foreign` FOREIGN KEY (`product_content_id`) REFERENCES `product_contents` (`id`),
  ADD CONSTRAINT `retail_credits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactionals`
--
ALTER TABLE `transactionals`
  ADD CONSTRAINT `transactionals_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `transactionals_product_content_id_foreign` FOREIGN KEY (`product_content_id`) REFERENCES `product_contents` (`id`),
  ADD CONSTRAINT `transactionals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `vehicle_loans`
--
ALTER TABLE `vehicle_loans`
  ADD CONSTRAINT `vehicle_loans_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `vehicle_loans_product_content_id_foreign` FOREIGN KEY (`product_content_id`) REFERENCES `product_contents` (`id`),
  ADD CONSTRAINT `vehicle_loans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
