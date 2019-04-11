-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2019 at 09:17 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_holdings`
--
ALTER TABLE `product_holdings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_holdings`
--
ALTER TABLE `product_holdings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
