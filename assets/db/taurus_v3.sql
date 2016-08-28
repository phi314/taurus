-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 29, 2016 at 01:25 
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taurus`
--
CREATE DATABASE IF NOT EXISTS `taurus` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `taurus`;

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `id_dosen_mata_kuliah` int(11) NOT NULL,
  `id_laboratorium` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `absensi_rfid_mahasiswa`
--

CREATE TABLE `absensi_rfid_mahasiswa` (
  `id` int(11) NOT NULL,
  `id_absensi` int(11) NOT NULL,
  `id_rfid_mahasiswa` int(11) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nip`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(115, '10109333', '2016-08-25 21:42:52', '2016-08-25 14:42:52', 1, 0),
(116, '10108522', '2016-08-25 21:43:47', '2016-08-25 14:43:47', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dosen_mata_kuliah`
--

CREATE TABLE `dosen_mata_kuliah` (
  `id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `mata_kuliah_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='dosen mengajar mata kuliah';

--
-- Dumping data for table `dosen_mata_kuliah`
--

INSERT INTO `dosen_mata_kuliah` (`id`, `dosen_id`, `mata_kuliah_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 115, 2, '2016-08-25 21:45:37', '2016-08-25 14:45:37', 1, 0),
(2, 116, 1, '2016-08-25 21:45:43', '2016-08-25 14:45:43', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'dosen', 'Dosen'),
(3, 'mahasiswa', 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium`
--

CREATE TABLE `laboratorium` (
  `id` int(11) NOT NULL,
  `nama_laboratorium` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorium`
--

INSERT INTO `laboratorium` (`id`, `nama_laboratorium`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, 'TELEKOMUNIKASI', '2016-08-25 21:44:23', '2016-08-25 14:44:23', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `kode_rfid` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `kode_rfid`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(117, '123456789', NULL, '2016-08-29 01:15:52', '2016-08-28 18:15:52', 1, 0),
(9, '1300316', 0002055848, '2016-08-25 21:35:41', '2016-08-28 18:08:56', 1, 1),
(10, '1300506', 0008569586, '2016-08-25 21:35:41', '2016-08-28 18:09:03', 1, 1),
(11, '1300858', 0008574702, '2016-08-25 21:35:41', '2016-08-28 18:09:10', 1, 1),
(12, '1301422', 0008579197, '2016-08-25 21:35:41', '2016-08-28 17:55:43', 1, 1),
(13, '1301502', 0008618587, '2016-08-25 21:35:41', '2016-08-28 17:55:53', 1, 1),
(14, '1301528', NULL, '2016-08-25 21:35:41', '2016-08-28 18:07:45', 1, 1),
(15, '1301540', NULL, '2016-08-25 21:35:41', '2016-08-28 17:51:58', 1, 0),
(16, '1301636', NULL, '2016-08-25 21:35:41', '2016-08-28 18:09:26', 1, 1),
(17, '1301644', NULL, '2016-08-25 21:35:41', '2016-08-28 17:51:58', 1, 0),
(18, '1301688', NULL, '2016-08-25 21:35:42', '2016-08-28 17:51:58', 1, 0),
(19, '1301702', NULL, '2016-08-25 21:35:42', '2016-08-28 17:51:58', 1, 0),
(20, '1301754', NULL, '2016-08-25 21:35:42', '2016-08-28 17:51:58', 1, 0),
(21, '1301836', NULL, '2016-08-25 21:35:42', '2016-08-28 17:51:58', 1, 0),
(22, '1301872', NULL, '2016-08-25 21:35:42', '2016-08-28 17:51:58', 1, 0),
(23, '1301924', NULL, '2016-08-25 21:35:42', '2016-08-28 17:51:58', 1, 0),
(24, '1302022', NULL, '2016-08-25 21:35:42', '2016-08-28 18:09:38', 1, 1),
(25, '1302072', NULL, '2016-08-25 21:35:42', '2016-08-28 18:11:06', 1, 1),
(26, '1303560', NULL, '2016-08-25 21:35:42', '2016-08-28 18:12:10', 1, 1),
(27, '1303582', NULL, '2016-08-25 21:35:43', '2016-08-28 17:51:58', 1, 0),
(28, '1303984', NULL, '2016-08-25 21:35:43', '2016-08-28 17:51:58', 1, 0),
(29, '1304072', NULL, '2016-08-25 21:35:43', '2016-08-28 17:51:58', 1, 0),
(30, '1304138', NULL, '2016-08-25 21:35:43', '2016-08-28 17:51:58', 1, 0),
(31, '1304386', NULL, '2016-08-25 21:35:43', '2016-08-28 18:12:20', 1, 1),
(32, '1304566', NULL, '2016-08-25 21:35:43', '2016-08-28 18:12:28', 1, 1),
(33, '1304694', NULL, '2016-08-25 21:35:44', '2016-08-28 17:51:58', 1, 0),
(34, '1304698', NULL, '2016-08-25 21:35:44', '2016-08-28 18:12:39', 1, 1),
(35, '1304810', NULL, '2016-08-25 21:35:44', '2016-08-28 18:12:46', 1, 1),
(50, '1304884', NULL, '2016-08-25 21:35:47', '2016-08-28 17:51:58', 1, 0),
(51, '1304886', NULL, '2016-08-25 21:35:48', '2016-08-28 18:12:52', 1, 1),
(52, '1304888', NULL, '2016-08-25 21:35:48', '2016-08-28 17:51:58', 1, 0),
(53, '1304890', NULL, '2016-08-25 21:35:48', '2016-08-28 17:51:58', 1, 0),
(54, '1304924', NULL, '2016-08-25 21:35:49', '2016-08-28 18:13:01', 1, 1),
(36, '1305154', NULL, '2016-08-25 21:35:44', '2016-08-28 17:51:58', 1, 0),
(37, '1305232', NULL, '2016-08-25 21:35:44', '2016-08-28 17:51:58', 1, 0),
(38, '1305348', NULL, '2016-08-25 21:35:44', '2016-08-28 17:51:58', 1, 0),
(39, '1305478', NULL, '2016-08-25 21:35:45', '2016-08-28 17:51:58', 1, 0),
(40, '1305808', NULL, '2016-08-25 21:35:45', '2016-08-28 18:13:10', 1, 1),
(41, '1306108', NULL, '2016-08-25 21:35:45', '2016-08-28 18:13:16', 1, 1),
(42, '1306122', NULL, '2016-08-25 21:35:45', '2016-08-28 17:51:58', 1, 0),
(43, '1306150', NULL, '2016-08-25 21:35:46', '2016-08-28 17:51:58', 1, 0),
(44, '1306644', NULL, '2016-08-25 21:35:46', '2016-08-28 17:51:58', 1, 0),
(45, '1306686', NULL, '2016-08-25 21:35:46', '2016-08-28 17:51:58', 1, 0),
(46, '1306984', NULL, '2016-08-25 21:35:46', '2016-08-28 17:51:58', 1, 0),
(47, '1307050', NULL, '2016-08-25 21:35:47', '2016-08-28 18:13:29', 1, 1),
(55, '1307440', NULL, '2016-08-25 21:35:49', '2016-08-28 18:13:46', 1, 1),
(48, '1307640', NULL, '2016-08-25 21:35:47', '2016-08-28 17:51:58', 1, 0),
(49, '1307762', NULL, '2016-08-25 21:35:47', '2016-08-28 17:51:58', 1, 0),
(86, '1400047', NULL, '2016-08-25 21:40:55', '2016-08-28 17:51:58', 1, 0),
(87, '1400275', NULL, '2016-08-25 21:40:55', '2016-08-28 18:13:57', 1, 1),
(88, '1400576', NULL, '2016-08-25 21:40:55', '2016-08-28 18:14:04', 1, 1),
(89, '1400717', NULL, '2016-08-25 21:40:56', '2016-08-28 18:14:12', 1, 1),
(90, '1400833', NULL, '2016-08-25 21:40:56', '2016-08-28 18:14:19', 1, 1),
(91, '1400975', NULL, '2016-08-25 21:40:56', '2016-08-28 17:51:58', 1, 0),
(92, '1401162', NULL, '2016-08-25 21:40:56', '2016-08-28 17:51:58', 1, 0),
(93, '1401407', NULL, '2016-08-25 21:40:56', '2016-08-28 17:51:58', 1, 0),
(94, '1401535', NULL, '2016-08-25 21:40:56', '2016-08-28 17:51:58', 1, 0),
(95, '1401687', NULL, '2016-08-25 21:40:56', '2016-08-28 17:51:58', 1, 0),
(96, '1401970', NULL, '2016-08-25 21:40:56', '2016-08-28 17:51:58', 1, 0),
(97, '1403121', NULL, '2016-08-25 21:40:56', '2016-08-28 18:14:31', 1, 1),
(98, '1403141', NULL, '2016-08-25 21:40:56', '2016-08-28 18:14:38', 1, 1),
(99, '1403506', NULL, '2016-08-25 21:40:57', '2016-08-28 17:51:58', 1, 0),
(100, '1403899', NULL, '2016-08-25 21:40:57', '2016-08-28 17:51:58', 1, 0),
(101, '1404245', NULL, '2016-08-25 21:40:57', '2016-08-28 18:14:45', 1, 1),
(102, '1404660', NULL, '2016-08-25 21:40:57', '2016-08-28 17:51:58', 1, 0),
(103, '1404662', NULL, '2016-08-25 21:40:57', '2016-08-28 17:51:58', 1, 0),
(104, '1404663', NULL, '2016-08-25 21:40:57', '2016-08-28 17:51:58', 1, 0),
(105, '1404793', NULL, '2016-08-25 21:40:57', '2016-08-28 18:14:57', 1, 1),
(106, '1405018', NULL, '2016-08-25 21:40:57', '2016-08-28 18:15:03', 1, 1),
(107, '1405891', NULL, '2016-08-25 21:40:57', '2016-08-28 18:15:11', 1, 1),
(108, '1406141', NULL, '2016-08-25 21:40:57', '2016-08-28 17:51:58', 1, 0),
(109, '1406409', NULL, '2016-08-25 21:40:57', '2016-08-28 18:15:24', 1, 1),
(110, '1407024', NULL, '2016-08-25 21:40:57', '2016-08-28 17:51:58', 1, 0),
(111, '1407271', NULL, '2016-08-25 21:40:57', '2016-08-28 18:15:32', 1, 1),
(112, '1407275', NULL, '2016-08-25 21:40:57', '2016-08-28 18:15:40', 1, 1),
(113, '1407289', NULL, '2016-08-25 21:40:58', '2016-08-28 17:51:58', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_rfid`
--

CREATE TABLE `mahasiswa_rfid` (
  `id` int(11) NOT NULL,
  `rfid_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='rfid mewakili siswa';

--
-- Dumping data for table `mahasiswa_rfid`
--

INSERT INTO `mahasiswa_rfid` (`id`, `rfid_id`, `mahasiswa_id`, `is_active`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, 2, 9, 0, '2016-08-26 10:40:48', '2016-08-26 03:40:48', 1, 0),
(3, 2, 11, 0, '2016-08-26 17:56:01', '2016-08-26 10:56:01', 1, 0),
(4, 2, 10, 0, '2016-08-26 17:57:27', '2016-08-26 10:57:27', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` int(11) NOT NULL,
  `nama_mata_kuliah` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `nama_mata_kuliah`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'PRAKTIKUM SISTEM SALURAN TRANSMISI', '2016-08-25 21:44:51', '2016-08-25 14:44:51', 0, 0),
(2, 'PRAKTIKUM SISTEM KOMUNIKASI DIGITAL', '2016-08-25 21:45:12', '2016-08-25 14:45:12', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(2);

-- --------------------------------------------------------

--
-- Table structure for table `rfid`
--

CREATE TABLE `rfid` (
  `id` int(11) NOT NULL,
  `kode_rfid` int(10) UNSIGNED ZEROFILL NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rfid`
--

INSERT INTO `rfid` (`id`, `kode_rfid`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 0008574702, '2016-08-25 23:09:05', '2016-08-25 16:09:05', 0, 0),
(2, 0002055848, '2016-08-26 08:51:17', '2016-08-26 01:51:17', 1, 0),
(3, 0008579197, '2016-08-26 18:15:41', '2016-08-26 11:15:41', 1, 0),
(4, 0008618587, '2016-08-26 18:15:46', '2016-08-26 11:15:46', 1, 0),
(5, 0008569586, '2016-08-26 18:16:00', '2016-08-26 11:16:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `name`, `gender`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1472392212, 1, 'Admin', 'laki-laki'),
(8, '', '1300316', '1300316', '', '1300316@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'NURUL WAHIDAH', 'laki-laki'),
(9, '', '1300316', '1300316', '', '1300316@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'NURUL WAHIDAH', 'perempuan'),
(10, '', '1300506', '1300506', '', '1300506@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'ISMA RIHADATUL AISY', 'perempuan'),
(11, '', '1300858', '1300858', '', '1300858@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'ARCHELIA MAWARNI', 'perempuan'),
(12, '', '1301422', '1301422', '', '1301422@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'RIZKI FEBRIANTO', 'laki-laki'),
(13, '', '1301502', '1301502', '', '1301502@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'RUDI FATAHUDIN', 'laki-laki'),
(14, '', '1301528', '1301528', '', '1301528@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'ABDUL GHANI ASRA', 'laki-laki'),
(15, '', '1301540', '1301540', '', '1301540@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'BRAMA SAPUTERA', 'laki-laki'),
(16, '', '1301636', '1301636', '', '1301636@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'MAULIDA DWI GUSTIANY', 'perempuan'),
(17, '', '1301644', '1301644', '', '1301644@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'MOHAMAD ZULKIFLI', 'laki-laki'),
(18, '', '1301688', '1301688', '', '1301688@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'AGUNG RISMAWAN', 'laki-laki'),
(19, '', '1301702', '1301702', '', '1301702@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'NURKHALIM', 'laki-laki'),
(20, '', '1301754', '1301754', '', '1301754@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'MOCHAMMAD REKSZA', 'laki-laki'),
(21, '', '1301836', '1301836', '', '1301836@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'DIKI SUDHARMONO', 'laki-laki'),
(22, '', '1301872', '1301872', '', '1301872@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'IMZAL MUHTAR NURFARI', 'laki-laki'),
(23, '', '1301924', '1301924', '', '1301924@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'ANDRE DWI JANUAR', 'laki-laki'),
(24, '', '1302022', '1302022', '', '1302022@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'IRMA MELATI', 'perempuan'),
(25, '', '1302072', '1302072', '', '1302072@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'ROSALIA YERICA', 'perempuan'),
(26, '', '1303560', '1303560', '', '1303560@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'SITI HIZAZIAH', 'perempuan'),
(27, '', '1303582', '1303582', '', '1303582@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'DEMAR CHAIRIL', 'laki-laki'),
(28, '', '1303984', '1303984', '', '1303984@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'TITO SATRYA KAMIL', 'laki-laki'),
(29, '', '1304072', '1304072', '', '1304072@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'RIYADHI ABDURRAHMAN', 'laki-laki'),
(30, '', '1304138', '1304138', '', '1304138@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'MOHAMAD SYAMSUL M', 'laki-laki'),
(31, '', '1304386', '1304386', '', '1304386@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'AJENG TAMARA', 'perempuan'),
(32, '', '1304566', '1304566', '', '1304566@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'ZAINAB FAUZIYYAH R', 'perempuan'),
(33, '', '1304694', '1304694', '', '1304694@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'FAUZI SAKTI M', 'laki-laki'),
(34, '', '1304698', '1304698', '', '1304698@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'NUR RIZKI AFRISYA P', 'perempuan'),
(35, '', '1304810', '1304810', '', '1304810@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'REYNA RINDI ASTUTI', 'perempuan'),
(36, '', '1305154', '1305154', '', '1305154@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'SANDI RAMDANI', 'laki-laki'),
(37, '', '1305232', '1305232', '', '1305232@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'CARTIM', 'laki-laki'),
(38, '', '1305348', '1305348', '', '1305348@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'WAROH', 'laki-laki'),
(39, '', '1305478', '1305478', '', '1305478@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'HASAN BASRI UDIN', 'laki-laki'),
(40, '', '1305808', '1305808', '', '1305808@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'DHIYA NAJMAH PRATIWI', 'perempuan'),
(41, '', '1306108', '1306108', '', '1306108@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'CICI SUMINAR', 'perempuan'),
(42, '', '1306122', '1306122', '', '1306122@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'MARDINA', 'laki-laki'),
(43, '', '1306150', '1306150', '', '1306150@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'HERRY SISWANTO', 'laki-laki'),
(44, '', '1306644', '1306644', '', '1306644@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'HILDAN AMARZEIN', 'laki-laki'),
(45, '', '1306686', '1306686', '', '1306686@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'DEAN AMILUSH MAJID', 'laki-laki'),
(46, '', '1306984', '1306984', '', '1306984@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'AGUNG RIZALDY', 'laki-laki'),
(47, '', '1307050', '1307050', '', '1307050@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'ILFA NURLATIFAH', 'perempuan'),
(48, '', '1307640', '1307640', '', '1307640@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'MUNASIR', 'laki-laki'),
(49, '', '1307762', '1307762', '', '1307762@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'DENI KURNIAWAN', 'laki-laki'),
(50, '', '1304884', '1304884', '', '1304884@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'INDRA YANTOMO', 'laki-laki'),
(51, '', '1304886', '1304886', '', '1304886@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'YURIKA ISLAMIATI', 'perempuan'),
(52, '', '1304888', '1304888', '', '1304888@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'SATRIA HAYATULLAH', 'laki-laki'),
(53, '', '1304890', '1304890', '', '1304890@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'AFRIZAL', 'laki-laki'),
(54, '', '1304924', '1304924', '', '1304924@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'T. NADILA SASKYA', 'perempuan'),
(55, '', '1307440', '1307440', '', '1307440@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'KHOIRUN NISA', 'perempuan'),
(86, '', '1400047', '1400047', '', '1400047@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Irfan Nuroni', 'laki-laki'),
(87, '', '1400275', '1400275', '', '1400275@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Chindy Berliananda', 'perempuan'),
(88, '', '1400576', '1400576', '', '1400576@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Laras Anjani', 'perempuan'),
(89, '', '1400717', '1400717', '', '1400717@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Hanopa A H', 'perempuan'),
(90, '', '1400833', '1400833', '', '1400833@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Gina Safarina M', 'perempuan'),
(91, '', '1400975', '1400975', '', '1400975@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Deni Listyanto', 'laki-laki'),
(92, '', '1401162', '1401162', '', '1401162@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Jonathan', 'laki-laki'),
(93, '', '1401407', '1401407', '', '1401407@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Karim A', 'laki-laki'),
(94, '', '1401535', '1401535', '', '1401535@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Cecep Muhamad N', 'laki-laki'),
(95, '', '1401687', '1401687', '', '1401687@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Divia Isnin N', 'laki-laki'),
(96, '', '1401970', '1401970', '', '1401970@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Dicky Mardiansyah', 'laki-laki'),
(97, '', '1403121', '1403121', '', '1403121@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Irna Wahyuningsih', 'perempuan'),
(98, '', '1403141', '1403141', '', '1403141@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Asri Gania', 'perempuan'),
(99, '', '1403506', '1403506', '', '1403506@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Ghelar S P', 'laki-laki'),
(100, '', '1403899', '1403899', '', '1403899@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Egi Sunardi', 'laki-laki'),
(101, '', '1404245', '1404245', '', '1404245@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Annisa Utami', 'perempuan'),
(102, '', '1404660', '1404660', '', '1404660@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Furqon Andika', 'laki-laki'),
(103, '', '1404662', '1404662', '', '1404662@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Angger W P', 'laki-laki'),
(104, '', '1404663', '1404663', '', '1404663@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Andika Syaputra', 'laki-laki'),
(105, '', '1404793', '1404793', '', '1404793@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Karlin K', 'perempuan'),
(106, '', '1405018', '1405018', '', '1405018@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Karwati', 'perempuan'),
(107, '', '1405891', '1405891', '', '1405891@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Alya Rozana', 'perempuan'),
(108, '', '1406141', '1406141', '', '1406141@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Fauzi Nugroho', 'laki-laki'),
(109, '', '1406409', '1406409', '', '1406409@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Agustin Tia Suryani', 'perempuan'),
(110, '', '1407024', '1407024', '', '1407024@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Azhar Ibnush S H', 'laki-laki'),
(111, '', '1407271', '1407271', '', '1407271@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Intan Ruana Putri', 'perempuan'),
(112, '', '1407275', '1407275', '', '1407275@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Fitra Nopri S', 'perempuan'),
(113, '', '1407289', '1407289', '', '1407289@gmail.com', NULL, NULL, NULL, NULL, 1268889823, NULL, 1, 'Deni Susanto', 'laki-laki'),
(115, '127.0.0.1', '10109333', '$2y$08$0H.cjItSYUjAsVRYClmtkOjqFIonO9OWJvMGHp2ibBiA.gjSux6TK', '', '10109333@email.com', NULL, NULL, NULL, NULL, 1472136172, NULL, 1, 'TOMMI HARIYADI, MT', 'laki-laki'),
(116, '127.0.0.1', '10108522', '$2y$08$B9QZ7NG7cvyMK.V5evRX3uxIPI3s57hfzpBqk0zD6KF6fbqylkjo2', '', '10108522@email.com', NULL, NULL, NULL, NULL, 1472136227, NULL, 1, 'AGUS HERI SETYA BUDI, ST, M.T', 'laki-laki'),
(117, '127.0.0.1', '123456789', '$2y$08$TkKz6UhEyqISddLpHO03J..BzZHCdBbTyCdetVUcxSKICNGlP9D2i', '', '123456789@email.com', NULL, NULL, NULL, NULL, 1472408152, NULL, 1, 'demo', 'laki-laki');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(8, 115, 2),
(9, 116, 2),
(10, 117, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dosen_mata_kuliah` (`id_dosen_mata_kuliah`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `id_laboratorium` (`id_laboratorium`);

--
-- Indexes for table `absensi_rfid_mahasiswa`
--
ALTER TABLE `absensi_rfid_mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_absensi` (`id_absensi`),
  ADD KEY `id_rfid_mahasiswa` (`id_rfid_mahasiswa`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `dosen_mata_kuliah`
--
ALTER TABLE `dosen_mata_kuliah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dosen` (`dosen_id`),
  ADD KEY `id_mata_kuliah` (`mata_kuliah_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD UNIQUE KEY `nim` (`nim`),
  ADD UNIQUE KEY `kode_rfid` (`kode_rfid`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `mahasiswa_rfid`
--
ALTER TABLE `mahasiswa_rfid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `id_rfid` (`rfid_id`),
  ADD KEY `id_mahasiswa` (`mahasiswa_id`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `rfid`
--
ALTER TABLE `rfid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_rfid` (`kode_rfid`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `absensi_rfid_mahasiswa`
--
ALTER TABLE `absensi_rfid_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `dosen_mata_kuliah`
--
ALTER TABLE `dosen_mata_kuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `laboratorium`
--
ALTER TABLE `laboratorium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mahasiswa_rfid`
--
ALTER TABLE `mahasiswa_rfid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rfid`
--
ALTER TABLE `rfid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_dosen_mata_kuliah`) REFERENCES `dosen_mata_kuliah` (`id`);

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dosen_mata_kuliah`
--
ALTER TABLE `dosen_mata_kuliah`
  ADD CONSTRAINT `dosen_mata_kuliah_ibfk_1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `dosen_mata_kuliah_ibfk_2` FOREIGN KEY (`mata_kuliah_id`) REFERENCES `mata_kuliah` (`id`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa_rfid`
--
ALTER TABLE `mahasiswa_rfid`
  ADD CONSTRAINT `mahasiswa_rfid_ibfk_1` FOREIGN KEY (`rfid_id`) REFERENCES `rfid` (`id`),
  ADD CONSTRAINT `mahasiswa_rfid_ibfk_2` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
