-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2025 at 03:48 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lumine-hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `bayar_id` int NOT NULL,
  `pesan_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `total` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `waktu_pembayaran` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`bayar_id`, `pesan_id`, `user_id`, `total`, `metode_pembayaran`, `status`, `waktu_pembayaran`) VALUES
(1, 107, 4, '1000000', 'debit', 'lunas', '2025-10-23 18:20:51'),
(2, 107, NULL, NULL, 'debit', 'lunas', '2025-10-23 18:29:52'),
(3, 107, NULL, NULL, 'kartu kredit', 'lunas', '2025-10-23 18:29:56'),
(4, 107, NULL, NULL, 'debit', 'gagal', '2025-10-23 18:30:29'),
(5, 107, NULL, NULL, 'debit', 'lunas', '2025-10-23 18:31:10'),
(6, 107, NULL, NULL, 'tunai', 'lunas', '2025-10-23 18:31:24'),
(7, 108, NULL, NULL, '', 'gagal', '2025-10-23 20:52:09'),
(8, 109, NULL, NULL, '', 'gagal', '2025-10-23 20:55:21'),
(9, 110, NULL, NULL, '', 'lunas', '2025-10-23 20:56:46'),
(10, 111, NULL, NULL, '', 'lunas', '2025-10-23 20:57:18'),
(11, 111, NULL, NULL, '', 'gagal', '2025-10-23 20:57:50'),
(12, 111, NULL, NULL, '', 'gagal', '2025-10-23 20:57:53'),
(13, 111, NULL, NULL, '', 'gagal', '2025-10-23 20:57:55'),
(14, 112, NULL, NULL, '', 'lunas', '2025-10-23 20:58:20'),
(16, 114, NULL, NULL, '', 'lunas', '2025-10-23 21:00:30'),
(17, 115, 4, '700000', '', 'lunas', '2025-10-23 21:06:42'),
(18, 116, 4, '1750000', '', 'lunas', '2025-10-23 21:27:19'),
(19, 117, 4, '500000', '', 'lunas', '2025-10-23 21:34:19'),
(21, 119, 4, '5000000', '', 'gagal', '2025-10-23 22:01:23'),
(22, 120, 4, '500000', '', 'lunas', '2025-10-23 22:01:43'),
(23, 122, 4, '700000', '', 'lunas', '2025-10-23 22:17:50'),
(24, 122, 4, '700000', '', 'gagal', '2025-10-23 22:18:11'),
(25, 122, 4, '700000', '', 'gagal', '2025-10-23 22:18:16'),
(28, 124, 4, '500000', '', 'lunas', '2025-10-23 22:22:33'),
(31, 127, 4, '16020000', '', 'lunas', '2025-10-23 23:53:02'),
(37, 134, 5, '70000000', '', 'lunas', '2025-10-24 20:43:00'),
(38, 135, 4, '156000000', '', 'lunas', '2025-10-24 21:15:27'),
(39, 136, 4, '57600000', '', 'lunas', '2025-10-24 21:16:11'),
(40, 137, 4, '13200000', '', 'lunas', '2025-10-24 21:16:30'),
(41, 138, 4, '7200000', '', 'lunas', '2025-10-24 21:16:46'),
(42, 139, 7, '4000000', '', 'lunas', '2025-10-24 22:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `foto_kamar`
--

CREATE TABLE `foto_kamar` (
  `id` int NOT NULL,
  `kamar_id` int NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `foto_kamar`
--

INSERT INTO `foto_kamar` (`id`, `kamar_id`, `foto`) VALUES
(25, 8, 'upload/Screenshot 2025-10-09 103929.png'),
(26, 8, 'upload/Screenshot 2025-10-09 103932.png'),
(27, 8, 'upload/Screenshot 2025-10-09 104002.png'),
(28, 8, 'upload/Screenshot 2025-10-09 104024.png'),
(29, 8, 'upload/Screenshot 2025-10-09 104032.png'),
(30, 9, 'upload/Screenshot 2025-10-09 104210.png'),
(31, 9, 'upload/Screenshot 2025-10-09 104216.png'),
(32, 9, 'upload/Screenshot 2025-10-09 104230.png'),
(33, 9, 'upload/Screenshot 2025-10-09 104237.png'),
(34, 9, 'upload/Screenshot 2025-10-09 104411.png'),
(35, 10, 'upload/Screenshot 2025-10-09 103633.png'),
(36, 10, 'upload/Screenshot 2025-10-09 103811.png'),
(37, 10, 'upload/Screenshot 2025-10-09 103822.png'),
(38, 10, 'upload/Screenshot 2025-10-09 103829.png'),
(39, 10, 'upload/Screenshot 2025-10-09 104426.png'),
(45, 12, 'upload/Screenshot 2025-10-09 103822.png'),
(46, 12, 'upload/Screenshot 2025-10-09 103834.png'),
(47, 12, 'upload/Screenshot 2025-10-09 103850.png'),
(48, 12, 'upload/Screenshot 2025-10-09 103913.png'),
(49, 12, 'upload/Screenshot 2025-10-09 103929.png'),
(60, 15, 'upload/Screenshot 2025-10-09 103913 - Copy.png'),
(61, 15, 'upload/Screenshot 2025-10-09 103913.png'),
(62, 15, 'upload/Screenshot 2025-10-09 103918.png'),
(63, 15, 'upload/Screenshot 2025-10-09 103932.png'),
(64, 15, 'upload/Screenshot 2025-10-09 104002.png'),
(65, 7, 'upload/Screenshot 2025-10-09 103913 - Copy.png'),
(66, 7, 'upload/Screenshot 2025-10-09 103913.png'),
(67, 7, 'upload/Screenshot 2025-10-09 103918.png'),
(68, 7, 'upload/Screenshot 2025-10-09 104002.png'),
(69, 7, 'upload/Screenshot 2025-10-09 104024.png'),
(70, 11, 'upload/Screenshot 2025-10-09 104032.png'),
(71, 11, 'upload/Screenshot 2025-10-09 104210.png'),
(72, 11, 'upload/Screenshot 2025-10-09 104216.png'),
(73, 11, 'upload/Screenshot 2025-10-09 104411.png'),
(74, 11, 'upload/Screenshot 2025-10-09 104426.png'),
(75, 13, 'upload/Screenshot 2025-10-09 103929.png'),
(76, 13, 'upload/Screenshot 2025-10-09 104002 - Copy.png'),
(77, 13, 'upload/Screenshot 2025-10-09 104024.png'),
(78, 13, 'upload/Screenshot 2025-10-09 104032.png'),
(79, 13, 'upload/Screenshot 2025-10-09 104230.png'),
(80, 14, 'upload/Screenshot 2025-10-09 103811.png'),
(81, 14, 'upload/Screenshot 2025-10-09 103834.png'),
(82, 14, 'upload/Screenshot 2025-10-09 103844.png'),
(83, 14, 'upload/Screenshot 2025-10-09 103850.png'),
(84, 14, 'upload/Screenshot 2025-10-09 103858.png'),
(85, 16, 'upload/Screenshot 2025-10-09 103822.png'),
(86, 16, 'upload/Screenshot 2025-10-09 103829.png'),
(87, 16, 'upload/Screenshot 2025-10-09 103834.png'),
(88, 16, 'upload/Screenshot 2025-10-09 103850.png'),
(89, 16, 'upload/Screenshot 2025-10-09 103929.png');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `kamar_id` int NOT NULL,
  `nama_kamar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tipe_kamar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `kapasitas` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fasilitas` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` enum('tersedia','penuh') DEFAULT NULL,
  `alamat` varchar(255) NOT NULL,
  `rating` decimal(2,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`kamar_id`, `nama_kamar`, `tipe_kamar`, `harga`, `kapasitas`, `fasilitas`, `foto`, `status`, `alamat`, `rating`) VALUES
(7, 'Lumine Semarang', 'Deluxe', 1000000, '4', 'Tv,Ac,Wifi,Shower,Balkon,Sarapan ', 'upload/Screenshot 2025-10-09 103913 - Copy.png', 'tersedia', 'Jl. Gajah Mada No.59-61, Kembangsari, Semarang Tengah, Semarang 50134', '5.0'),
(8, 'Lumine Depok', 'Standar', 100000, '2', 'Tv,Ac,Wifi,Shower', 'upload/Screenshot 2025-10-09 103929.png', 'penuh', 'Jl. Margonda Raya No.28, Pondok Cina, Kec. Beji, Kota Depok, Jawa Barat 16424', '4.3'),
(9, 'Lumine Jogja', 'VIP', 1200000, '4', 'Tv,Ac,Wifi,Shower,Balkon,Sarapan ', 'upload/Screenshot 2025-10-09 104210.png', 'tersedia', 'Jl. Affandi – Gejayan, Kompleks Colombo, Yogyakarta 55281', '5.0'),
(10, 'Lumine Bali', 'Deluxe', 1000000, '2', 'Tv,Ac,Wifi,Shower,Balkon,Sarapan ', 'upload/Screenshot 2025-10-09 103633.png', 'tersedia', 'Jl. Raya Nusa Dua Selatan, Kawasan Pariwisata Nusa Dua, Bali 80363\r\n', '4.9'),
(11, 'Lumine Jakarta', 'Standar', 100000, '2', 'Tv,Ac,Wifi,Shower', 'upload/Screenshot 2025-10-09 104032.png', 'penuh', 'Jl. Lingkar Mega Kuningan Kav. E1.2 No. 1 & 2, Jakarta 12950', '3.4'),
(12, 'Lumine Serang', 'Standar', 450000, '2', 'Tv,Ac,Wifi,Shower', 'upload/Screenshot 2025-10-09 103822.png', 'penuh', 'Jl. Syekh Nawawi Al Bantani No.29, Pakupatan, Serang, Banten 42171', '4.4'),
(13, 'Lumine Surabaya', 'Deluxe', 1000000, '2', 'Tv,Ac,Wifi,Shower,Balkon,Sarapan ', 'upload/Screenshot 2025-10-09 103929.png', 'tersedia', 'Jl. Gubernur Suryo No.1-3, Surabaya 60275', '4.5'),
(14, 'Lumine Cinere', 'Standar', 350000, '2', 'Tv,Ac,Wifi,Shower', 'upload/Screenshot 2025-10-09 103811.png', 'penuh', 'Jl. Cinere Raya Blok NB 13, RT.1/RW.14, Cinere, Depok, Jawa Barat 16514', '5.4'),
(15, 'Lumine Bandung', 'Deluxe', 890000, '3', 'Tv,Ac,Wifi,Shower,Balkon,Sarapan ', 'upload/Screenshot 2025-10-09 103913 - Copy.png', 'tersedia', 'Jl. Ranca Bentang No.56-58, Ciumbuleuit, Kec. Cidadap, Kota Bandung, Jawa Barat', '3.2'),
(16, 'Lumine Australia', 'VIP', 5000000, '4', 'Tv,Ac,Wifi,Shower,Balkon,Sarapan,Mobil pribadi', 'upload/Screenshot 2025-10-09 103822.png', 'tersedia', '488 George Street, Sydney NSW 2000, Australia.', '5.0');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `pesan_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `kamar_id` int DEFAULT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  `tanggal_buat` datetime DEFAULT CURRENT_TIMESTAMP,
  `jumlah_kamar` int DEFAULT NULL,
  `jumlah_tamu` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`pesan_id`, `user_id`, `kamar_id`, `check_in`, `check_out`, `total_harga`, `tanggal_buat`, `jumlah_kamar`, `jumlah_tamu`) VALUES
(6, 4, 11, NULL, NULL, 0, '2025-10-20 03:40:56', 0, 0),
(7, 4, 11, NULL, NULL, 0, '2025-10-20 03:41:05', 0, 0),
(8, 4, 11, NULL, NULL, 0, '2025-10-20 03:41:06', 0, 0),
(9, 4, 11, NULL, NULL, 0, '2025-10-20 03:41:07', 0, 0),
(10, 4, 11, NULL, NULL, 0, '2025-10-20 03:41:07', 0, 0),
(11, 4, 11, NULL, NULL, 0, '2025-10-20 03:41:14', 0, 0),
(12, 4, 11, NULL, NULL, 0, '2025-10-20 03:41:15', 0, 0),
(13, 4, 11, NULL, NULL, 0, '2025-10-20 03:41:16', 0, 0),
(14, 4, 11, NULL, NULL, 0, '2025-10-20 03:41:16', 0, 0),
(15, 4, 11, NULL, NULL, 0, '2025-10-20 03:41:22', 0, 0),
(16, 4, 11, NULL, NULL, 0, '2025-10-20 03:41:25', 0, 0),
(25, 4, 9, NULL, NULL, 0, '2025-10-20 03:43:08', 0, 0),
(33, NULL, 11, NULL, NULL, 0, '2025-10-23 02:27:42', 0, 0),
(45, 4, NULL, '2025-10-23', '2025-10-25', 240000, '2025-10-23 03:16:53', 1, 0),
(46, 4, NULL, '2025-10-23', '2025-10-28', 1200000, '2025-10-23 03:17:05', 2, 1),
(48, 4, NULL, '2025-10-23', '2025-10-28', 1200000, '2025-10-23 03:20:05', 2, 1),
(49, 4, NULL, '2025-10-23', '2025-10-28', 1200000, '2025-10-23 03:20:09', 2, 1),
(62, 4, 11, '2025-10-23', '2025-10-29', 1200000, '2025-10-23 03:52:07', 2, 1),
(63, 4, 11, '2025-10-23', '2025-10-29', 1200000, '2025-10-23 04:07:37', 2, 1),
(64, 4, 11, '2025-10-23', '2025-10-29', 1200000, '2025-10-23 04:07:44', 2, 1),
(65, 4, 11, '2025-10-23', '2025-10-29', 1200000, '2025-10-23 04:08:11', 2, 1),
(66, 4, 11, '2025-10-23', '2025-10-29', 1200000, '2025-10-23 04:08:21', 2, 1),
(67, 4, 11, '2025-10-23', '2025-10-29', 1200000, '2025-10-23 04:09:01', 2, 1),
(68, 4, 11, '2025-10-23', '2025-10-29', 1200000, '2025-10-23 04:09:24', 2, 1),
(69, 4, 11, '2025-10-23', '2025-10-29', 1200000, '2025-10-23 04:09:39', 2, 1),
(70, 4, 11, '2025-10-23', '2025-10-29', 1200000, '2025-10-23 04:09:46', 2, 1),
(71, 4, 11, '2025-10-23', '2025-10-29', 1200000, '2025-10-23 04:10:31', 2, 1),
(72, 4, 11, '2025-10-23', '2025-10-30', 1400000, '2025-10-23 04:10:41', 2, 1),
(73, 4, 11, '2025-10-23', '2025-10-30', 1400000, '2025-10-23 04:11:25', 2, 1),
(74, 4, 11, '2025-10-23', '2025-10-28', 1000000, '2025-10-23 04:11:35', 2, 1),
(79, 4, 8, '2025-10-23', '2025-10-28', 1000000, '2025-10-23 04:53:28', 2, 2),
(80, 4, 8, '2025-10-23', '2025-10-28', 1000000, '2025-10-23 04:53:49', 2, 2),
(81, 4, 8, '2025-10-23', '2025-10-28', 1000000, '2025-10-23 04:54:07', 2, 2),
(82, 4, 11, '2025-10-23', '2025-10-28', 1000000, '2025-10-23 04:54:24', 2, 1),
(83, 4, 11, '2025-10-23', '2025-10-27', 800000, '2025-10-23 04:59:00', 2, 2),
(84, 4, 11, '2025-10-23', '2025-10-28', 1000000, '2025-10-23 05:06:10', 2, 2),
(85, 4, 11, '2025-10-23', '2025-10-28', 100000, '2025-10-23 05:07:06', 2, 2),
(86, 4, 11, '2025-10-23', '2025-10-28', 100000, '2025-10-23 05:07:27', 2, 2),
(87, 4, 11, '2025-10-23', '2025-10-29', 1200000, '2025-10-23 05:07:37', 2, 1),
(88, 4, 11, '2025-10-23', '2025-10-29', 1200000, '2025-10-23 05:10:16', 2, 1),
(89, 4, 11, '2025-10-23', '2025-10-28', 1000000, '2025-10-23 05:10:27', 2, 1),
(90, 4, 11, '2025-10-23', '2025-10-29', 1200000, '2025-10-23 05:10:37', 2, 2),
(91, 4, 11, '2025-10-23', '2025-10-29', 1200000, '2025-10-23 05:10:46', 2, 2),
(92, 4, 11, '2025-10-23', '2025-10-29', 1200000, '2025-10-23 05:10:57', 2, 2),
(93, 4, 11, '2025-10-23', '2025-10-29', 1200000, '2025-10-23 05:13:52', 2, 2),
(94, 4, 11, '2025-10-23', '2025-10-28', 1000000, '2025-10-23 05:14:01', 2, 2),
(95, 4, 11, '2025-10-23', '2025-10-28', 1000000, '2025-10-23 05:14:10', 2, 2),
(96, 4, 11, '2025-10-23', '2025-10-28', 1000000, '2025-10-23 05:14:17', 2, 2),
(97, 4, 11, '2025-10-23', '2025-10-28', 1000000, '2025-10-23 05:18:48', 2, 2),
(98, 4, 11, '2025-10-23', '2025-10-29', 1200000, '2025-10-23 05:18:58', 2, 2),
(99, 4, 11, '2025-10-23', '2025-10-29', 1200000, '2025-10-23 05:19:19', 2, 2),
(100, 4, 11, '2025-10-23', '2025-10-28', 1000000, '2025-10-23 05:19:27', 2, 2),
(104, 4, 11, '2025-10-23', '2025-10-29', 600000, '2025-10-23 16:03:37', 1, 1),
(105, 4, 11, '2025-10-23', '2025-10-28', 500000, '2025-10-23 16:04:36', 1, 1),
(106, 4, 11, '2025-10-23', '2025-10-28', 1000000, '2025-10-23 16:10:01', 2, 1),
(107, 4, 11, '2025-10-23', '2025-10-28', 1000000, '2025-10-23 17:37:17', 2, 1),
(108, 4, 8, '2025-10-23', '2025-10-29', 600000, '2025-10-23 20:43:52', 1, 1),
(109, 4, 8, '2025-10-23', '2025-10-29', 600000, '2025-10-23 20:55:20', 1, 1),
(110, 4, 8, '2025-10-23', '2025-10-29', 600000, '2025-10-23 20:56:42', 1, 1),
(111, 4, 8, '2025-10-23', '2025-10-29', 600000, '2025-10-23 20:57:15', 1, 1),
(112, 4, 11, '2025-10-23', '2025-10-28', 1000000, '2025-10-23 20:58:15', 2, 1),
(114, 4, 8, '2025-10-23', '2025-10-26', 300000, '2025-10-23 21:00:11', 1, 1),
(115, 4, 8, '2025-10-23', '2025-10-30', 700000, '2025-10-23 21:06:40', 1, 1),
(116, 4, 14, '2025-10-23', '2025-10-28', 1750000, '2025-10-23 21:26:56', 1, 1),
(117, 4, 11, '2025-10-23', '2025-10-28', 500000, '2025-10-23 21:34:16', 1, 1),
(119, 4, 10, '2025-10-23', '2025-10-28', 5000000, '2025-10-23 22:01:15', 1, 1),
(120, 4, 11, '2025-10-23', '2025-10-28', 500000, '2025-10-23 22:01:41', 1, 1),
(121, 4, 11, '2025-10-23', '2025-10-30', 700000, '2025-10-23 22:17:24', 1, 1),
(122, 4, 11, '2025-10-23', '2025-10-30', 700000, '2025-10-23 22:17:48', 1, 1),
(124, 4, 11, '2025-10-23', '2025-10-28', 500000, '2025-10-23 22:22:30', 1, 1),
(127, 4, 15, '2025-10-23', '2025-10-29', 16020000, '2025-10-23 23:52:58', 3, 1),
(134, 5, 16, '2025-10-24', '2025-10-31', 70000000, '2025-10-24 20:42:55', 2, 4),
(135, 4, 9, '2025-10-24', '2025-10-29', 156000000, '2025-10-24 21:15:23', 26, 1),
(136, 4, 9, '2025-10-24', '2025-10-28', 57600000, '2025-10-24 21:16:09', 12, 1),
(137, 4, 9, '2025-10-24', '2025-11-04', 13200000, '2025-10-24 21:16:28', 1, 1),
(138, 4, 9, '2025-10-24', '2025-10-30', 7200000, '2025-10-24 21:16:44', 1, 1),
(139, 7, 7, '2025-10-24', '2025-10-28', 4000000, '2025-10-24 22:20:07', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `ulasan_id` int NOT NULL,
  `pesan_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `komen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tanggal-buat` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`ulasan_id`, `pesan_id`, `user_id`, `rating`, `komen`, `tanggal-buat`) VALUES
(4, 124, 4, 5, 'yayaya ', '2025-10-23 22:22:37'),
(5, 124, 4, 5, '', '2025-10-23 22:22:39'),
(6, 124, 4, 4, 'sdf', '2025-10-23 22:27:30'),
(10, 127, 4, 5, 'sangat bags', '2025-10-23 23:53:10'),
(14, 134, 5, 5, 'sangat bagus ', '2025-10-24 20:43:07'),
(15, 135, 4, 5, 'bagus banget', '2025-10-24 21:15:35'),
(16, 136, 4, 5, 's', '2025-10-24 21:16:14'),
(17, 137, 4, 5, 'ssss', '2025-10-24 21:16:32'),
(18, 138, 4, 5, 'fff', '2025-10-24 21:16:48'),
(19, 139, 7, 5, 'f', '2025-10-24 22:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nmr_telpon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `email`, `nmr_telpon`, `foto`, `password`, `role`) VALUES
(4, 'Ariandi saputra', 'sule@gmail.com', '', '1760861688_aerger.jpg', '$2y$10$HRCoDQjpLxeztJs5EreXBO3/3n.o2V/yYgAgz1TUVSEBBlrHFcKMa', 'user'),
(5, 'indomie', 'p@gmail.com', '', '1760866833_Screenshot 2025-10-09 073408.png', '$2y$10$drggthWiVfetlrCQgXHUCeN6pFqpy6ZFN2jA0F8VlwvoKVaHpiPaG', 'admin'),
(6, 'gabriella', 'ikan@gmail.com', '', '1761238434_elasdlasd.jpg', '$2y$10$49PwjaAxvMBTwM14jEPIkehklpZSUrM9Cjc68M1.9xxJOPow12InW', 'user'),
(7, 'intan', 'sungut.lele897@gmail.com', '', '1761319171_cscsc.jpeg', '$2y$10$qC4jBafMaKH7c1ZV.t2hiO7tO2PLQ99mZraLa5lbXXAYmjHrF6.Ci', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`bayar_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `bayar_ibfk_1` (`pesan_id`);

--
-- Indexes for table `foto_kamar`
--
ALTER TABLE `foto_kamar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kamar_id` (`kamar_id`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`kamar_id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`pesan_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pesan_ibfk_3` (`kamar_id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`ulasan_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ulasan_ibfk_1` (`pesan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `bayar_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `foto_kamar`
--
ALTER TABLE `foto_kamar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `kamar_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `pesan_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `ulasan_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bayar`
--
ALTER TABLE `bayar`
  ADD CONSTRAINT `bayar_ibfk_1` FOREIGN KEY (`pesan_id`) REFERENCES `pesan` (`pesan_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `bayar_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `foto_kamar`
--
ALTER TABLE `foto_kamar`
  ADD CONSTRAINT `foto_kamar_ibfk_1` FOREIGN KEY (`kamar_id`) REFERENCES `kamar` (`kamar_id`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `pesan_ibfk_3` FOREIGN KEY (`kamar_id`) REFERENCES `kamar` (`kamar_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`pesan_id`) REFERENCES `pesan` (`pesan_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `ulasan_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
