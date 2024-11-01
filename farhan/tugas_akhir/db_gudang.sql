-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2024 at 03:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `suplier_id` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `suplier_id` (`suplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `barang`
--

TRUNCATE TABLE `barang`;
--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `suplier_id`, `nama`, `deskripsi`, `satuan`, `stock`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Komputer AIO', 'Komputer AIO Merek Advan dengan Spek Ram 8GB', 'unit', 1, '2024-10-21 08:13:34', '2024-10-21 07:49:44', '2024-10-21 08:13:34'),
(2, 1, 'Komputer AIO Advance 10016', 'Test', 'unit', 10, NULL, '2024-10-21 08:12:40', '2024-10-21 08:12:40'),
(5, 1, 'Laptop Asus G140', 'Laptop Asus Vivobook Ram 8GB', 'unit', 1, NULL, '2024-10-22 04:50:31', '2024-10-22 05:01:14'),
(6, 1, 'Laptop Asus Ababa', 'Test', 'unit', 5, '2024-10-22 06:02:05', '2024-10-22 05:01:26', '2024-10-22 06:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE IF NOT EXISTS `barang_keluar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barang_id` int(11) DEFAULT NULL,
  `pengambil` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `barang_id` (`barang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `barang_keluar`
--

TRUNCATE TABLE `barang_keluar`;
--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id`, `barang_id`, `pengambil`, `stock`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'Farhan MS', 3, '2024-10-21 08:33:42', '2024-10-21 08:31:08', '2024-10-21 08:33:42'),
(2, 5, 'Farhan MS', 2, NULL, '2024-10-22 06:26:22', '2024-10-22 06:26:22'),
(3, 5, 'Septifaniy asa', 2, NULL, '2024-10-22 06:27:04', '2024-10-22 06:27:18'),
(4, 2, 'Farhan MS', 10, NULL, '2024-10-30 03:57:54', '2024-10-30 03:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE IF NOT EXISTS `barang_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barang_id` int(11) DEFAULT NULL,
  `penerima` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `barang_id` (`barang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `barang_masuk`
--

TRUNCATE TABLE `barang_masuk`;
--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `barang_id`, `penerima`, `stock`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'Udin', 10, '2024-10-21 08:26:47', '2024-10-21 08:19:16', '2024-10-21 08:26:47'),
(2, 5, 'Udin Namjudin', 5, NULL, '2024-10-22 06:22:47', '2024-10-22 06:23:01'),
(3, 2, 'Kadis', 5, '2024-10-22 06:23:25', '2024-10-22 06:23:23', '2024-10-22 06:23:25'),
(4, 5, 'Udin', 10, NULL, '2024-10-30 04:46:03', '2024-10-30 04:46:03');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE IF NOT EXISTS `suplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `suplier`
--

TRUNCATE TABLE `suplier`;
--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id`, `nama`, `kontak`, `alamat`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Farhan Mohaemin S', '08979060191', 'Gagak', NULL, '2024-10-21 07:27:33', '2024-10-21 07:45:51'),
(2, 'Farhan MS', '564646466', 'Lalala\r\n', '2024-10-21 08:00:52', '2024-10-21 07:58:33', '2024-10-21 08:00:59'),
(3, 'Pt. Tirta Anugrah Jaya', '625987123580', 'Sekelimus', '2024-10-22 06:13:18', '2024-10-22 06:11:01', '2024-10-22 06:13:18'),
(4, 'Pt. Tirta Anugrah', '45687521', 'Jl. Jaek', NULL, '2024-10-22 07:44:18', '2024-10-22 07:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','User') NOT NULL,
  `banned` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `user`
--

TRUNCATE TABLE `user`;
--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `role`, `banned`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '$2y$10$3qsDepTQXpg9CPSKtysP4.KIv22RkUr9yaq0rxq1enBGOC3bajrQ.', 'Admin', 0, '2024-10-21 06:48:21', '2024-10-21 06:48:21'),
(2, 'Farhan Mhaemin S', 'farhanms', 'farhanms@gmail.com', '$2y$10$3qsDepTQXpg9CPSKtysP4.KIv22RkUr9yaq0rxq1enBGOC3bajrQ.', 'User', 1, '2024-10-21 09:32:58', '2024-10-22 07:04:25'),
(3, 'udin sedrajat acep', 'udiiin', 'udin@gmail.com', '$2y$10$3qsDepTQXpg9CPSKtysP4.KIv22RkUr9yaq0rxq1enBGOC3bajrQ.', 'Admin', 1, '2024-10-22 06:51:56', '2024-10-28 02:50:00'),
(4, '', '', '', '$2y$10$rFb9uD3nETeCyq7Ep5enzeycbFF8djxcDzz92T5LvDyY49mKrawOm', '', 1, '2024-10-22 07:54:24', '2024-10-22 07:54:26'),
(5, 'Farhan MS', 'farhanmsaaa', 'farhanmsaa@gmail.com', '$2y$10$3qsDepTQXpg9CPSKtysP4.KIv22RkUr9yaq0rxq1enBGOC3bajrQ.', 'User', 0, '2024-10-22 07:55:11', '2024-10-28 02:50:30');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `foreign_suplier_id_table_barang` FOREIGN KEY (`suplier_id`) REFERENCES `suplier` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `foreign_barang_id_table_barang_keluar` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `foreign_barang_id_table_barang_masuk` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
