-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2019 at 09:18 AM
-- Server version: 10.1.38-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `argrmele_melejit`
--

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_contents`
--
ALTER TABLE `product_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_contents_product_holding_id_foreign` (`product_holding_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_contents`
--
ALTER TABLE `product_contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
