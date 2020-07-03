-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2019 at 07:03 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsaas`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_delete_user`
--

CREATE TABLE `log_delete_user` (
  `id` int(11) NOT NULL,
  `del_penjual` varchar(50) DEFAULT NULL,
  `del_pelanggan` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_delete_user`
--

INSERT INTO `log_delete_user` (`id`, `del_penjual`, `del_pelanggan`, `first_name`, `last_name`, `waktu`) VALUES
(8, '', 'dimana', 'ramdani', 'kemana', '2019-05-04 05:23:45'),
(9, '', 'mramdani', 'muhamad', 'ramdani', '2019-05-04 05:24:39'),
(10, 'hena', '', '', '', '2019-05-04 05:28:54'),
(11, NULL, '70', '90', '80', '2019-05-04 05:33:38'),
(12, 'hena', '', '', '', '2019-05-04 05:34:08'),
(13, 'hena', NULL, NULL, NULL, '2019-05-04 05:35:50'),
(14, NULL, '89098', '898', '809', '2019-05-04 06:12:06'),
(15, NULL, '79878', '7898', '7897', '2019-05-04 06:22:20'),
(16, NULL, '98908', '990809', '9', '2019-05-04 06:23:07'),
(17, NULL, 'mramdani', 'muhamad', 'ramdani', '2019-05-04 06:23:11'),
(18, NULL, '40', '20', '30', '2019-05-04 18:47:42'),
(19, NULL, '098', '098', '09', '2019-05-04 18:48:54'),
(20, NULL, '80', '80', '80', '2019-05-21 01:42:52'),
(21, NULL, 'poi', 'iop', 'iop', '2019-05-21 01:42:56'),
(22, NULL, 'mramdani', 'Muhamad', 'Ramdani', '2019-05-21 01:43:00'),
(23, NULL, 'neng', 'Neng', 'Juwainah', '2019-06-12 11:01:26'),
(24, NULL, 'gilang', 'Gilang', 'Ramdhani', '2019-06-12 11:01:31'),
(25, 'admin1', NULL, NULL, NULL, '2019-06-12 11:02:32'),
(26, 'baru', NULL, NULL, NULL, '2019-06-12 11:02:38'),
(27, NULL, 'naufal', 'Muhamad', 'Naufal', '2019-06-13 11:10:05'),
(28, 'user', NULL, NULL, NULL, '2019-06-14 02:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `log_saldo`
--

CREATE TABLE `log_saldo` (
  `id` int(11) NOT NULL,
  `penjual` varchar(50) DEFAULT NULL,
  `pelanggan` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `add_saldo` int(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_saldo`
--

INSERT INTO `log_saldo` (`id`, `penjual`, `pelanggan`, `first_name`, `last_name`, `add_saldo`, `waktu`) VALUES
(2, NULL, '40', '20', '30', 9000, '2019-05-04 06:01:47'),
(3, 'babeh', NULL, NULL, NULL, 200000, '2019-05-04 06:03:36'),
(4, NULL, 'mramdani551', 'Muhamad', 'Ramdani', 55500, '2019-06-14 08:55:06'),
(5, NULL, 'mramdani551', 'Muhamad', 'Ramdani', 10000, '2019-06-14 08:55:06'),
(6, NULL, 'nande', 'Nande', 'Monaya', 5000, '2019-06-12 11:03:20'),
(7, NULL, 'siti', 'Siti', 'Nurjannah', 2000, '2019-06-13 11:11:26'),
(8, NULL, 'mramdani551', 'Muhamad', 'Ramdani', 1000, '2019-06-14 08:55:06'),
(9, NULL, 'mramdani551', 'Muhamad', 'Ramdani', 2000, '2019-06-14 08:55:06'),
(10, NULL, 'mramdani551', 'Muhamad', 'Ramdani', 1000, '2019-06-14 08:55:06'),
(11, NULL, 'mramdani551', 'Muhamad', 'Ramdani', 2000, '2019-06-14 08:55:06'),
(12, NULL, 'mramdani551', 'Muhamad', 'Ramdani', 1000, '2019-06-14 08:55:06'),
(13, NULL, 'alif', 'Alifya', 'Diva', 1000, '2019-06-14 02:52:41'),
(14, NULL, 'farhan', 'Farhan', 'Iqbal', 2000, '2019-06-14 02:55:49'),
(15, NULL, 'farhan', 'Farhan', 'Iqbal', 0, '2019-06-14 02:55:50'),
(16, NULL, 'alif', 'Alifya', 'Diva', 5000, '2019-06-14 02:56:17'),
(17, NULL, 'mramdani551', 'Muhamad', 'Ramdani', 5000, '2019-06-14 08:55:06'),
(18, NULL, 'siti', 'Siti', 'Nurjannah', 2000, '2019-06-14 02:56:52'),
(19, NULL, 'farhan', 'Farhan', 'Iqbal', 1000, '2019-06-14 02:56:59'),
(20, NULL, 'farhan', 'Farhan', 'Iqbal', 7000, '2019-06-14 02:58:44'),
(21, NULL, 'mramdani551', 'Muhamad', 'Ramdani', 1000, '2019-06-14 08:55:06'),
(22, NULL, 'mramdani551', 'Muhamad', 'Ramdani', 5000, '2019-06-14 08:55:06'),
(23, NULL, 'lesa', 'Lesa', 'H', 2000, '2019-06-14 06:45:39'),
(24, NULL, 'mramdani551', 'Muhamad', 'Ramdani', 30000, '2019-06-14 08:55:06'),
(25, NULL, 'mramdani551', 'Muhamad', 'Ramdani', 5000, '2019-06-14 08:55:06'),
(26, NULL, 'siti', 'Siti', 'Nurjannah', 100000, '2019-06-14 09:34:14'),
(27, NULL, 'mramdani551', 'Muhamad', 'Ramdani', 2000, '2019-06-15 02:54:19'),
(28, NULL, 'mramdani551', 'Muhamad', 'Ramdani', 1000, '2019-06-15 03:33:28'),
(29, NULL, 'mramdani551', 'Muhamad', 'Ramdani', 1000, '2019-06-15 03:33:51'),
(30, NULL, 'mramdani551', 'Muhamad', 'Ramdani', 1000, '2019-06-15 04:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `log_update_user`
--

CREATE TABLE `log_update_user` (
  `id` int(11) NOT NULL,
  `up_penjual` varchar(50) DEFAULT NULL,
  `up_pelanggan` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_update_user`
--

INSERT INTO `log_update_user` (`id`, `up_penjual`, `up_pelanggan`, `first_name`, `last_name`, `waktu`) VALUES
(1, '', 'ramen', 'ram', 'men', '2019-05-03 18:51:07'),
(2, '', 'ramdani', 'ramdani', 'ramdani', '2019-05-03 18:54:11'),
(3, '', 'rara', 'ramdani', 'ramdani', '2019-05-03 18:54:40'),
(4, 'hehe', '', '', '', '2019-05-03 18:56:00'),
(5, 'hera', NULL, NULL, NULL, '2019-05-04 05:42:36'),
(6, NULL, '40', '20', '30', '2019-05-04 05:43:05'),
(7, NULL, 'mramdani551', 'muhamad', 'ramdani', '2019-05-21 06:46:21'),
(8, NULL, 'mramdani551', 'muhamad', 'ramdani', '2019-05-21 06:47:08'),
(9, NULL, 'mramdani551', 'muhamad', 'ramdani', '2019-05-21 07:05:24'),
(10, NULL, 'mramdani551', 'muhamad', 'ramdani', '2019-05-21 07:05:45'),
(11, 'baru', NULL, NULL, NULL, '2019-05-21 22:57:19'),
(12, 'hera', NULL, NULL, NULL, '2019-05-21 23:00:59'),
(13, 'hera', NULL, NULL, NULL, '2019-05-21 23:01:09'),
(14, NULL, 'ryouri', 'Ryouri', 'Ga', '2019-05-21 23:06:37'),
(15, 'admin1', NULL, NULL, NULL, '2019-05-23 12:58:17'),
(16, 'admin1', NULL, NULL, NULL, '2019-05-23 13:06:46'),
(17, 'admin1', NULL, NULL, NULL, '2019-05-23 13:07:17'),
(18, NULL, 'nande', 'Nande', 'Monaya', '2019-06-12 11:02:16'),
(19, NULL, 'ahmad', 'Ahmad', 'Dahlan', '2019-06-13 05:31:04'),
(20, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-13 05:31:27'),
(21, NULL, 'farhan', 'Farhan', 'Iqbal', '2019-06-13 06:39:39'),
(22, NULL, 'ahmad', 'Ahmad', 'Nurhadi', '2019-06-13 08:11:01'),
(23, NULL, 'dahlan', 'Ahmad', 'Dahlan', '2019-06-13 08:12:07'),
(24, NULL, 'ahmad', 'Ahmad', 'Nurhadi', '2019-06-13 08:12:26'),
(25, NULL, 'ahmad', 'Ahmad', 'Nurhadi', '2019-06-13 08:12:46'),
(26, NULL, 'ahmad', 'nurhadi', 'ahmad', '2019-06-13 08:13:15'),
(27, NULL, 'fiki', 'Fiki', 'Ferdiansyah', '2019-06-13 08:35:56'),
(28, NULL, 'alif', 'Alifya', 'Diva', '2019-06-13 08:41:15'),
(29, NULL, 'siti', 'Siti', 'Nurjannah', '2019-06-13 11:10:58'),
(30, NULL, 'mramdani552', 'Muhamad', 'Ramdani', '2019-06-13 11:56:00'),
(31, NULL, 'mramdani553', 'Muhamad', 'Ramdani', '2019-06-13 12:04:12'),
(32, NULL, 'mramdani550', 'Muhamad', 'Ramdani', '2019-06-13 12:07:37'),
(33, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-13 12:08:11'),
(34, NULL, 'mramdani552', 'Muhamad', 'Ramdani', '2019-06-13 12:08:35'),
(35, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-13 12:09:51'),
(36, NULL, 'mramdani552', 'Muhamad', 'Ramdani', '2019-06-13 12:28:22'),
(37, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-13 12:28:49'),
(38, NULL, 'mramdani553', 'Muhamad', 'Ramdani', '2019-06-13 12:29:04'),
(39, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-13 12:38:48'),
(40, NULL, 'mramdani552', 'Muhamad', 'Ramdani', '2019-06-13 12:42:14'),
(41, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-13 12:43:31'),
(42, NULL, 'mramdani553', 'Muhamad', 'Ramdani', '2019-06-13 12:44:04'),
(43, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-13 13:01:34'),
(44, NULL, 'mramdani999', 'Muhamad', 'Rararara', '2019-06-13 13:03:34'),
(45, NULL, 'ramen', 'ramen', '123', '2019-06-13 13:17:50'),
(46, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-13 13:21:11'),
(47, NULL, 'ramen', 'ramen', 'enak', '2019-06-13 13:21:53'),
(48, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-13 13:23:01'),
(49, NULL, 'mramdani552', 'Muhamad', 'Ramdani', '2019-06-13 13:28:43'),
(50, NULL, 'mramdani553', 'Muhamad', 'Ramdani', '2019-06-13 16:08:03'),
(51, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-13 16:08:45'),
(52, NULL, 'mramdani552', 'Muhamad', 'Ramdani', '2019-06-13 16:08:57'),
(53, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-13 16:09:47'),
(54, NULL, 'mramdani552', 'Muhamad', 'Ramdani', '2019-06-13 16:09:55'),
(55, NULL, 'mramdani553', 'Muhamad', 'Ramdani', '2019-06-13 16:12:04'),
(56, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-13 16:12:12'),
(57, NULL, 'mramdani553', 'Muhamad', 'Ramdani', '2019-06-13 16:12:16'),
(58, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-13 16:12:48'),
(59, NULL, 'mramdani555', 'Muhamad', 'Ramdani', '2019-06-13 16:12:53'),
(60, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-13 16:15:08'),
(61, NULL, 'mramdani555', 'Muhamad', 'Ramdani', '2019-06-13 16:15:17'),
(62, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-13 16:17:27'),
(63, NULL, 'mramdani552', 'Muhamad', 'Ramdani', '2019-06-13 16:41:14'),
(64, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-13 16:43:07'),
(65, NULL, 'mramdani552', 'Muhamad', 'Ramdani', '2019-06-13 16:43:13'),
(66, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-13 16:44:09'),
(67, NULL, 'mramdani552', 'Muhamad', 'Ramdani', '2019-06-13 16:44:14'),
(68, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-13 16:45:22'),
(69, NULL, 'mramdani552', 'Muhamad', 'Ramdani', '2019-06-13 16:45:33'),
(70, NULL, 'mramdani551', 'muha', 'ramdani', '2019-06-13 17:21:32'),
(71, NULL, 'mramdani552', 'Muhamad', 'Ramdani', '2019-06-13 17:24:47'),
(72, 'admin2', NULL, NULL, NULL, '2019-06-14 07:05:45'),
(73, 'babeh', NULL, NULL, NULL, '2019-06-14 07:18:55'),
(74, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-14 08:36:50'),
(75, NULL, 'mramdani552', 'Muhamad', 'Ramdani', '2019-06-14 08:46:30'),
(76, NULL, 'mramdani559', 'Muhamad', 'Ramdani', '2019-06-14 08:46:43'),
(77, NULL, 'mramdani552', 'Muhamad', 'Ramdani', '2019-06-14 08:49:04'),
(78, NULL, 'mramdani559', 'Muhamad', 'Ramdani', '2019-06-14 08:49:35'),
(79, NULL, 'mramdani510', 'Muhamad', 'Ramdani', '2019-06-14 08:49:58'),
(80, NULL, 'mramdani559', 'Muhamad', 'Ramdani', '2019-06-14 08:51:02'),
(81, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-14 08:51:41'),
(82, NULL, 'mramdani098', 'Muhamad', 'Ramdani', '2019-06-14 08:52:13'),
(83, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-14 08:53:15'),
(84, NULL, 'mramdani520', 'Muhamad', 'Ramdani', '2019-06-14 08:54:24'),
(85, NULL, 'mramdani551', 'Muhamad', 'Ramdani', '2019-06-14 08:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nis` int(3) UNSIGNED ZEROFILL NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `saldo` int(255) NOT NULL,
  `qrname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nis`, `first_name`, `last_name`, `username`, `password`, `kelas`, `telepon`, `saldo`, `qrname`) VALUES
(17, 171113274, 'Muhamad', 'Ramdani', 'mramdani551', '$2y$10$qHc/2bS4L27Ailc5n8LA3.0k0C./lxIbhpeJlcIOtwIxfjTVsAPBq', 'XI', '081324321234', 45000, 'update_nis/171113274-Muhamad_Ramdani.png'),
(18, 171113279, 'Alifya', 'Diva', 'alif', '$2y$10$AQ1dK38zGkZocvPYBhw74OR7PZBipTzoE0GcQkT2XusoAAMFn6Dx6', 'XI IOP A', '081212321245', 26000, 'update_nis/171113279-Ahmad_Dahlan.png'),
(21, 171113267, 'Farhan', 'Iqbal', 'farhan', '$2y$10$REHYHkMpkWk7hjPLuqChYeJn83QpfXuygb05mHpFSZ4me6XCGY80a', 'XI TPTU A', '081283819289', 29000, 'update_nis/171113267-Farhan_Iqbal.png'),
(22, 171113278, 'Siti', 'Nurjannah', 'siti', '$2y$10$5nlbMX5.CwJZdX42t1ySWevthpWgFEhvin/byFSu7Lcyk5XeOSIaa', 'XI TPTU B', '081921212', 0, 'update_nis/171113278-Siti_Nurjannah.png'),
(23, 12129119, 'Fitria', 'A', 'fitria', '$2y$10$cFi9CThC/BVEGanhMBIpo.f0JByog2EQEoF9wER930iqS19B032dG', 'XI SIJA B', '081324356541', 5000, 'nis/12129119-Fitria_A.png'),
(24, 8080, 'Farhan', 'Iqbal', 'iqbal', '$2y$10$gykLjje7D.fxpBpEbPejEOjfAIS/yymLJ2cagzcyluQzywJPYpUhW', 'XI SIJA B', '081232182810', 2000, 'nis/8080-Farhan_Iqbal.png'),
(25, 80801313, 'saya', 'anda', 'anda', '$2y$10$ua54myJbSWRlnXyvqWofxORUG5maest0V25Tz07G9Tyjj8byz/sfi', 'XI SIJA A', '08102909128', 20000, 'nis/80801313-saya_anda.png'),
(26, 171113221, 'Lesa', 'H', 'lesa', '$2y$10$N7CZIW9lpz.95GuNkEIVF.jjs8AQ6m2wfd/allW2xGdU.s2OGcfLW', 'XI SIJA B', '08121992109', 7000, 'nis/171113221-Lesa_H.png'),
(27, 171119880, 'rahma', 'diki', 'rahma', '$2y$10$p/SekGtFRPfw2TWanEg2KeCkzX1FU2nnKlNGalWtWCVc0dotujTD6', 'XI SIJA B', '0812342312', 10000, 'nis/171119880-rahma_diki.png'),
(28, 181127631, 'Nasta', 'Ainun', 'nastaainun', '$2y$10$t998Mn66m6XtLTp.O.9bnu9yo/dQeHz3cwfKyargGV4.f4a54wB9m', 'X SIJA A', '08995018307', 50000, 'nis/181127631-Nasta_Ainun.png'),
(29, 171113233, 'ram', 'dani', 'ramdani', '$2y$10$vuImk2z4xRXJpNHxGj6RmunmioB8trgmC2jb3TtVTRwAg/xGoo16u', 'XI SIJA A', '08128128901', 20000, 'nis/171113233-ram_dani.png'),
(30, 1789871278, 'iop', 'poi', 'iop', '$2y$10$AOQuQGEiKQ6ip3.xjtuKPes81CPCbgPhBhKd7C6knkvHj5ZVNj8s2', 'iop', '12121289', 20000, 'nis/1789871278-iop_poi.png'),
(31, 1789871271, 'ooo', 'ppp', 'qqq', '$2y$10$9D/SAS1UbCEdPafmq.gNo.A7RwU82a0MCAAj4N8gIOFzs9n1MQ0Je', 'iop', '12121289', 20000, 'nis/1789871271-ooo_ppp.png'),
(32, 999, '890', '90', '890', '$2y$10$JE5X8iXCZMi42vbIca46UevkPLH5KDxsI9HAZ/budsiXr2cu9ekQq', 'XI', '890989', 8298393, 'nis/999-890_90.png'),
(33, 89102, '89098', '89098', '121', '$2y$10$Hqi43QWFW55KOD7mD2IYGemSJTWp7rdvpVQFPWhNfYxIaWMFIyO6y', 'xii', '8909890', 199999, 'nis/89102-89098_89098.png'),
(34, 829182, '891028', '28918291', '89281928', '$2y$10$Ta5atc2LDxaRNVMN2CgKjuDmYD6ptQP43vfeoyiTtet50YoIN3HrK', '12189', '2980198219', 821092, 'nis/829182-891028_28918291.png'),
(35, 912019, '91829', '9218928', '1289210', '$2y$10$CFl5rr6Hj/etDfXpOA8Ua.UPQYoHwFDuh9pJ0j4ZPAokfmH/fbsV2', '192819', '192819', 2989098, 'nis/912019-91829_9218928.png'),
(36, 89098, '909890', '890989', '0898909', '$2y$10$4pEV3kAwLbBwK0mzIXvCwON4RLQ9j.H9fla9IlG1R6Mp53V934Qty', '0881920', '98192098', 9019210, 'nis/89098-909890_890989.png'),
(37, 1290, '1290', '90', '19201', '$2y$10$Kw6C/TPYdzpX6WELimFSiui4tipSn37Sr6vDFlfbf18b5Di0NnXF6', '2910', '9210', 92109, 'nis/1290-1290_90.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nis` int(3) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `penjual` varchar(255) NOT NULL,
  `saldo` int(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `nis`, `username`, `first_name`, `last_name`, `penjual`, `saldo`, `waktu`) VALUES
(40, 171113275, 'mramdani', 'Muhamad', 'Ramdani', 'babeh', 2000, '2019-05-03 07:19:21'),
(41, 171113275, 'mramdani', 'Muhamad', 'Ramdani', 'hera', 10000, '2019-05-03 07:22:36'),
(42, 171113275, 'mramdani', 'Muhamad', 'Ramdani', 'hera', 100000, '2019-05-03 07:23:05'),
(43, 171113275, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 2000, '2019-06-14 08:55:05'),
(44, 171232123, 'ryouri', 'Ryouri', 'Ga Suki Desu', 'hera', 3000, '2019-05-21 23:05:32'),
(45, 171113275, 'mramdani551', 'Muhamad', 'Ramdani', 'hera', 8000, '2019-06-14 08:55:05'),
(46, 171113275, 'mramdani551', 'Muhamad', 'Ramdani', 'hera', 3000, '2019-06-14 08:55:05'),
(47, 171232123, 'ryouri', 'Ryouri', 'Ga', 'babeh', 5000, '2019-05-22 02:33:10'),
(48, 171113275, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 1000, '2019-06-14 08:55:05'),
(49, 171112233, 'neng', 'Neng', 'Juwainah', 'babeh', 2000, '2019-06-12 03:28:58'),
(50, 171112233, 'neng', 'Neng', 'Juwainah', 'babeh', 1000, '2019-06-12 03:29:20'),
(51, 171112233, 'neng', 'Neng', 'Juwainah', 'hera', 2000, '2019-06-12 03:29:43'),
(52, 171232123, 'ryouri', 'Ryouri', 'Ga', 'babeh', 2000, '2019-06-12 11:04:36'),
(53, 70707070, 'nande', 'Nande', 'Monaya', 'babeh', 2000, '2019-06-13 04:58:22'),
(54, 171232123, 'ryouri', 'Ryouri', 'Ga', 'hera', 3000, '2019-06-13 04:59:14'),
(55, 70707070, 'nande', 'Nande', 'Monaya', 'babeh', 2000, '2019-06-13 05:11:29'),
(56, 70707070, 'nande', 'Nande', 'Monaya', 'babeh', 1000, '2019-06-13 05:11:58'),
(57, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 1000, '2019-06-14 08:55:05'),
(58, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 2000, '2019-06-14 08:55:05'),
(59, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 2000, '2019-06-14 08:55:05'),
(60, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 1000, '2019-06-14 08:55:05'),
(61, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 1000, '2019-06-14 08:55:05'),
(62, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 1000, '2019-06-14 08:55:05'),
(63, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 2000, '2019-06-14 08:55:05'),
(64, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 1000, '2019-06-14 08:55:05'),
(65, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 1000, '2019-06-14 08:55:05'),
(66, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 0, '2019-06-14 08:55:05'),
(67, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 1000, '2019-06-14 08:55:05'),
(68, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 1000, '2019-06-14 08:55:05'),
(69, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 1000, '2019-06-14 08:55:05'),
(70, 171113278, 'ramdan', 'Ram', 'Dan', 'babeh', 1000, '2019-06-13 07:00:00'),
(71, 171113279, 'ahmad', 'Ahmad', 'Dahlan', 'babeh', 5000, '2019-06-13 07:06:52'),
(72, 171113278, 'ramdan', 'Ram', 'Dan', 'babeh', 1000, '2019-06-13 08:37:29'),
(73, 171113279, 'alif', 'Alifya', 'Diva', 'hera', 1000, '2019-06-13 08:41:15'),
(74, 171113278, 'ramdan', 'Ram', 'Dan', 'hera', 2000, '2019-06-13 08:41:52'),
(75, 171113278, 'ramdan', 'Ram', 'Dan', 'hera', 1000, '2019-06-13 08:44:55'),
(76, 171113278, 'ramdan', 'Ram', 'Dan', 'hera', 5000, '2019-06-13 08:45:09'),
(77, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 2000, '2019-06-14 08:55:05'),
(78, 171113267, 'farhan', 'Farhan', 'Iqbal', 'babeh', 1000, '2019-06-13 15:40:58'),
(79, 171113278, 'siti', 'Siti', 'Nurjannah', 'babeh', 5000, '2019-06-14 02:17:50'),
(80, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 2000, '2019-06-14 08:55:05'),
(81, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 1000, '2019-06-14 08:55:05'),
(82, 171113279, 'alif', 'Alifya', 'Diva', 'babeh', 2000, '2019-06-14 02:26:28'),
(83, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 1000, '2019-06-14 08:55:05'),
(84, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 1000, '2019-06-14 08:55:05'),
(85, 171113278, 'siti', 'Siti', 'Nurjannah', 'babeh', 2000, '2019-06-14 06:16:51'),
(86, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 1000, '2019-06-14 08:55:05'),
(87, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 1000, '2019-06-14 08:55:05'),
(88, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'hera', 2000, '2019-06-14 08:55:05'),
(89, 171113279, 'alif', 'Alifya', 'Diva', 'hera', 1000, '2019-06-14 06:33:36'),
(90, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 6000, '2019-06-14 08:55:05'),
(91, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'hera', 12000, '2019-06-14 08:55:05'),
(92, 171113279, 'alif', 'Alifya', 'Diva', 'hera', 1000, '2019-06-14 06:51:40'),
(93, 171113279, 'alif', 'Alifya', 'Diva', 'babeh', 2000, '2019-06-14 06:53:22'),
(94, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'admin2', 2000, '2019-06-14 08:55:05'),
(95, 171113278, 'siti', 'Siti', 'Nurjannah', 'babeh', 1000, '2019-06-14 08:23:53'),
(96, 171113278, 'siti', 'Siti', 'Nurjannah', 'babeh', 1000, '2019-06-14 08:24:15'),
(97, 171113279, 'alif', 'Alifya', 'Diva', 'hera', 5000, '2019-06-14 08:43:52'),
(98, 171113278, 'siti', 'Siti', 'Nurjannah', 'hera', 3000, '2019-06-14 08:44:06'),
(99, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 5000, '2019-06-14 09:24:02'),
(100, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 12000, '2019-06-14 09:25:51'),
(101, 171113278, 'siti', 'Siti', 'Nurjannah', 'babeh', 1000, '2019-06-14 09:32:49'),
(102, 171113278, 'siti', 'Siti', 'Nurjannah', 'babeh', 101000, '2019-06-14 09:35:05'),
(103, 171113274, 'mramdani551', 'Muhamad', 'Ramdani', 'babeh', 4000, '2019-06-14 11:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(50) NOT NULL,
  `saldo` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `saldo`) VALUES
(1, 'admin', '$2y$10$493G2DxN9lWf0.Q7yfNvu.59kMuIhVoU0KGZzvTLRvcO94nTM7VR2', 1, 0),
(2, 'babeh', '$2y$10$Kgr6oD6C2PiZ07qhtqkoG.3.llgeEUWxAlktqYt7QPtlCTiVXvaRq', 2, 1392000),
(3, 'hera', '$2y$10$A9DS.thtM0zlJ0jcMVf7auyycTHF3rye/QK8RC3Gb91dgEN8RCNVC', 2, 2332000),
(7, 'admin2', '$2y$10$9NKJunciYVQucKsQhGLnZep0vyjMI/Uu/evff4dgWhgBVnUeMJkUW', 2, 2000),
(8, 'ika', '$2y$10$gL4W8X9G7P08T7ErIRSHi.27OKlLLB0Bq1BTJEQFnI/SukzSnVg7C', 2, 0),
(9, 'koko', '$2y$10$JYh.jYltL0dHW.Fk2z12IOoi0jY5UQUvomRO4qL4eN4b2BupaUMPy', 2, 0),
(10, 'iop', '$2y$10$mxYkjc2JZuKFnOaMGX30hOOAZRzSfdr0Kgm58cftXlNgOsntXbbvW', 2, 0),
(11, 'ikada', '$2y$10$/pXDeMq3MqhUdqkB4IZScePjtcuAoaEYFaL1hA1ykbxqOc1voosO6', 2, 0),
(12, 'kokon', '$2y$10$Vw17zQRwdVm5NUJjbFvn2.FMkuSQ5vbFKOtNA2hgDa.m7ET6F5m66', 2, 0),
(13, 'iiio', '$2y$10$u6uejtvyuok62Txrv8TcieTcblBuaVUxifAiihcaQs6oIyUFxoq3i', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_delete_user`
--
ALTER TABLE `log_delete_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_saldo`
--
ALTER TABLE `log_saldo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_update_user`
--
ALTER TABLE `log_update_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_delete_user`
--
ALTER TABLE `log_delete_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `log_saldo`
--
ALTER TABLE `log_saldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `log_update_user`
--
ALTER TABLE `log_update_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
