-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2019 at 09:30 AM
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
  `type` int(11) NOT NULL DEFAULT '1',
  `position` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `branch_id`, `nip`, `name`, `email`, `phone`, `password`, `type`, `position`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, '123456', 'Admin', 'admin@gmail.com', 'admin phone', '$2y$10$hX5WODeJlIpfc2BYlg0J.ebquQ4EDeax8Tn5omMHVZtefh/3G4Bou', 3, 'admin', 'mrRBZur0hjnHSMIOOGDaE5TQaZtvnS11gdQPDGEwsAOFteqGj1CWfShxeGMP', NULL, NULL),
(9, 2, '1111', 'Arizal', 'arizalazhfahani@gmail.com', '081230896568', '$2y$10$Y9car//ibfd4SkmUc4.dU.M0BxR.PtgMbLJjold0PM9wdjTrkMyLO', 1, 'Teller', 'wqLQ319Hn5hJkiU9QiwH4wQvMQlewmyPoyjeffteReNsZ9pEZvE7gn5X8b10', '2019-03-26 20:36:27', '2019-03-26 20:36:27'),
(10, 1, '1289486706', 'Widhi P Hardianto', 'widhi.hardianto@yahoo.com', '08113105532', '$2y$10$Vw5gHicyCP/UYXZ6nATRyu8vNa5gA6dyzQuGWHc/Op8S8Lc2oA4pC', 1, 'MKA/BO/SPV/OFFICER', NULL, '2019-03-27 01:01:15', '2019-03-27 01:01:15'),
(11, 1, '1794171848', 'Arizal Azhfahani', 'arizalazhfahani@gamil.com', '081234567890', '$2y$10$Wgck3iZZgnJHqmH6AA5WteZhIUWd95ZOuRgdxQcgMclTfULIwWK6G', 1, 'Teller', 'dBM0FQux871BovQuRBPXEm8QeRTmVDVv9G1M2A4meUOUwe1zDOKCJi4GmkfR', '2019-04-01 01:41:23', '2019-04-01 01:41:23'),
(12, 11, '12345678', 'Jaenudin Ngaciro', 'cakjancuk@gmail.com', '123456', '$2y$10$izM0vLMF10iP3R0QmTuBx.KZwavlJ3JgT1ZuYnKcFudEr48Voclcq', 1, 'Security', 'PfXNxTo9PnEvxPB3pDiar7uJ9DYFDCE4Mn2KmTOt3LIDs29eA6yLwZI2aiPa', '2019-04-01 03:44:22', '2019-04-01 03:44:22'),
(13, 2, '098765', 'poi', 'poi@gmail.com', '098765543', '$2y$10$X5VakKFpiOC7ZpE77vhL/uT10yLvVim2piwl03CsIEEpskMZUDtBC', 2, 'Kepala Cabang', 'KFzf6T77XLRr9K3G2BUc5nX0JTdjZibDXtBqtg5N0gm1RhXAMsogjomIFvwt', '2019-04-01 19:11:48', '2019-04-01 19:11:48'),
(14, 11, '010101', 'qwerty', 'qwerty@gmail.com', '086123456', '$2y$10$IzuT2KraBsUXKO/CtJ7Mzemhf.AJlCJIuCWkpg0BPiivOK12OovO6', 1, 'Teller', 'uj4kj0SjXgtasn0wLZ4wupzoc4rwvhhcNiUz8prd8TQ9bbELfCL7gWCdIRj5', '2019-04-02 02:42:11', '2019-04-02 02:42:11'),
(15, 1, '987654', 'Elmy Andrean', 'elmy.andrean@gmail.com', '08985553268', '$2y$10$a80jnVB/xgmdfxfI3I0CXuBFf7gyPH6E1cO0SAiJ9zXJQyRCz5yje', 1, 'MKA/BO/SPV/OFFICER', 'cpEaVHhqEvgxk75LXYVZCTtjtv1CFNxqG2rqNzOxsN0mXkvIfQRTjw9WjUvf', '2019-04-03 17:59:30', '2019-04-03 17:59:30'),
(16, 1, '654321', 'Andrean Elmy', 'andrea.elmy@gmail.com', '089610009486', '$2y$10$.EUaQnMMhDC1MECO.EEXzeuUsSW4IUDUraJyMTb57fXkeREUO/arG', 2, 'Kepala Cabang', 'Noo3CMjMkd7CCNqD7CG49JJ0H7wLPri0hye3JhRFYW4ty3RH3nB3AfIQCb7Q', '2019-04-03 18:01:43', '2019-04-03 18:01:43');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
