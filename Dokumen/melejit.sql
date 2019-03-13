-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2019 at 11:38 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `melejit`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` int(30) NOT NULL,
  `id_user` int(30) NOT NULL,
  `nama_cabang` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `funding`
--

CREATE TABLE `funding` (
  `id_funding` int(30) NOT NULL,
  `id_user` int(30) NOT NULL,
  `nama_funding` varchar(50) NOT NULL,
  `nasabah_funding` varchar(50) NOT NULL,
  `rekening_funding` int(20) NOT NULL,
  `nominal_funding` int(100) NOT NULL,
  `setoran_funding` int(100) NOT NULL,
  `tgl_funding` datetime NOT NULL,
  `bobot_funding` varchar(5) NOT NULL,
  `status_funding` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kkb`
--

CREATE TABLE `kkb` (
  `id_kkb` int(30) NOT NULL,
  `id_user` int(30) NOT NULL,
  `nama_kkb` varchar(50) NOT NULL,
  `nasabah_kkb` varchar(50) NOT NULL,
  `rekening_kkb` int(20) NOT NULL,
  `nominal_kkb` int(100) NOT NULL,
  `unit_kkb` varchar(15) NOT NULL,
  `tgl_kkb` datetime NOT NULL,
  `bobot_kkb` varchar(5) NOT NULL,
  `status_kkb` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kredit_retail`
--

CREATE TABLE `kredit_retail` (
  `id_kr` int(30) NOT NULL,
  `id_user` int(30) NOT NULL,
  `nama_kr` varchar(50) NOT NULL,
  `nasabah_kr` int(50) NOT NULL,
  `rekening_kr` int(20) NOT NULL,
  `nominal_kr` int(100) NOT NULL,
  `pic_kr` varchar(20) NOT NULL,
  `tgl_kr` datetime NOT NULL,
  `bobot_kr` varchar(5) NOT NULL,
  `status_kr` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactional`
--

CREATE TABLE `transactional` (
  `id_ts` int(30) NOT NULL,
  `id_user` int(30) NOT NULL,
  `nama_ts` varchar(50) NOT NULL,
  `nasabah_ts` varchar(50) NOT NULL,
  `rekening_ts` int(20) NOT NULL,
  `tgl_ts` datetime NOT NULL,
  `bobot_ts` varchar(5) NOT NULL,
  `status_ts` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(30) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `nip` int(10) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id_cabang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `funding`
--
ALTER TABLE `funding`
  ADD PRIMARY KEY (`id_funding`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kkb`
--
ALTER TABLE `kkb`
  ADD PRIMARY KEY (`id_kkb`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kredit_retail`
--
ALTER TABLE `kredit_retail`
  ADD PRIMARY KEY (`id_kr`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transactional`
--
ALTER TABLE `transactional`
  ADD PRIMARY KEY (`id_ts`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id_cabang` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funding`
--
ALTER TABLE `funding`
  MODIFY `id_funding` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kkb`
--
ALTER TABLE `kkb`
  MODIFY `id_kkb` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kredit_retail`
--
ALTER TABLE `kredit_retail`
  MODIFY `id_kr` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactional`
--
ALTER TABLE `transactional`
  MODIFY `id_ts` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(30) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cabang`
--
ALTER TABLE `cabang`
  ADD CONSTRAINT `usercab` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `funding`
--
ALTER TABLE `funding`
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `kkb`
--
ALTER TABLE `kkb`
  ADD CONSTRAINT `users` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `kredit_retail`
--
ALTER TABLE `kredit_retail`
  ADD CONSTRAINT `kredit_retail_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `transactional`
--
ALTER TABLE `transactional`
  ADD CONSTRAINT `userts` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
