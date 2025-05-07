-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 05:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aethe166_logcat`
--

-- --------------------------------------------------------

--
-- Table structure for table `amss-adps`
--

CREATE TABLE `amss-adps` (
  `id` int(11) NOT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `judul` text NOT NULL,
  `shift` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bangunan`
--

CREATE TABLE `bangunan` (
  `id` int(11) NOT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `judul` text NOT NULL,
  `shift` int(11) NOT NULL,
  `atasan` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_1`
--

CREATE TABLE `content_1` (
  `no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `no_report` int(11) NOT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `peralatan` varchar(50) NOT NULL,
  `uraian` text NOT NULL,
  `teknisi` varchar(50) NOT NULL,
  `mulai` datetime DEFAULT NULL,
  `selesai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content_1`
--

INSERT INTO `content_1` (`no`, `id`, `no_report`, `tanggal_kegiatan`, `peralatan`, `uraian`, `teknisi`, `mulai`, `selesai`) VALUES
(1, 1, 1, NULL, '', 'Edit me to start', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `content_2`
--

CREATE TABLE `content_2` (
  `no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `no_report` int(11) NOT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `peralatan` varchar(50) NOT NULL,
  `uraian` text NOT NULL,
  `teknisi` varchar(50) NOT NULL,
  `mulai` datetime DEFAULT NULL,
  `selesai` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_3`
--

CREATE TABLE `content_3` (
  `no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `no_report` int(11) NOT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `peralatan` varchar(50) NOT NULL,
  `uraian` text NOT NULL,
  `teknisi` varchar(50) NOT NULL,
  `mulai` datetime DEFAULT NULL,
  `selesai` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_4`
--

CREATE TABLE `content_4` (
  `no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `no_report` int(11) NOT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `peralatan` varchar(50) NOT NULL,
  `uraian` text NOT NULL,
  `teknisi` varchar(50) NOT NULL,
  `mulai` datetime DEFAULT NULL,
  `selesai` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_5`
--

CREATE TABLE `content_5` (
  `no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `no_report` int(11) NOT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `peralatan` varchar(50) NOT NULL,
  `uraian` text NOT NULL,
  `teknisi` varchar(50) NOT NULL,
  `mulai` datetime DEFAULT NULL,
  `selesai` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_6`
--

CREATE TABLE `content_6` (
  `no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `no_report` int(11) NOT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `peralatan` varchar(50) NOT NULL,
  `uraian` text NOT NULL,
  `teknisi` varchar(50) NOT NULL,
  `mulai` datetime DEFAULT NULL,
  `selesai` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_7`
--

CREATE TABLE `content_7` (
  `no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `no_report` int(11) NOT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `peralatan` varchar(50) NOT NULL,
  `uraian` text NOT NULL,
  `teknisi` varchar(50) NOT NULL,
  `mulai` datetime DEFAULT NULL,
  `selesai` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_8`
--

CREATE TABLE `content_8` (
  `no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `no_report` int(11) NOT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `peralatan` varchar(50) NOT NULL,
  `uraian` text NOT NULL,
  `teknisi` varchar(50) NOT NULL,
  `mulai` datetime DEFAULT NULL,
  `selesai` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_9`
--

CREATE TABLE `content_9` (
  `no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `no_report` int(11) NOT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `peralatan` varchar(50) NOT NULL,
  `uraian` text NOT NULL,
  `teknisi` varchar(50) NOT NULL,
  `mulai` datetime DEFAULT NULL,
  `selesai` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data-kerusakan`
--

CREATE TABLE `data-kerusakan` (
  `id` int(11) NOT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `judul` text NOT NULL,
  `shift` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fdps-rdps`
--

CREATE TABLE `fdps-rdps` (
  `id` int(11) NOT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `judul` text NOT NULL,
  `shift` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `author_id` int(11) NOT NULL,
  `approve_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fdps-rdps`
--

INSERT INTO `fdps-rdps` (`id`, `tanggal_kegiatan`, `judul`, `shift`, `status`, `author_id`, `approve_id`) VALUES
(1, '2024-11-14', 'Sistem Recording, Switching & Jaringan', 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `listrik`
--

CREATE TABLE `listrik` (
  `id` int(11) NOT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `judul` text NOT NULL,
  `shift` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `id` int(11) NOT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `judul` text NOT NULL,
  `shift` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL DEFAULT -1,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL,
  `profile` varchar(255) NOT NULL DEFAULT 'default.png',
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `author_id`, `title`, `body`, `date`, `profile`, `link`) VALUES
(1, 1, 'New Logbook', 'Haikal Reihan has added new logbook on FDPS-RDPS with title \"Sistem Recording, Switching & Jaringan\"', '2024-11-14 12:36:25', 'default.png', '../../logbook/1/dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `peralatan`
--

CREATE TABLE `peralatan` (
  `no` int(11) NOT NULL,
  `peralatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peralatan`
--

INSERT INTO `peralatan` (`no`, `peralatan`) VALUES
(8, 'VCS 3020X'),
(9, 'Radio Link 720 - Tower'),
(10, 'Voice Recorder (FREQUENTIS)'),
(11, 'VHF - ADC Secondary Tower South'),
(12, 'VHF - ACC Primary UJKT'),
(13, 'VHF - APP Secondary Lower East (LE)'),
(14, 'VHF - APP Primary Terminal South (TS)'),
(15, 'VHF - APP Secondary Terminal South (TS)'),
(16, 'VHF - APP Primary Departure West (DW)'),
(17, 'VHF - APP Secondary Departure West (DW)'),
(18, 'VHF - APP Primary Departure East (DE)'),
(19, 'VHF - APP Secondary Departure East (DE)'),
(20, 'VHF - APP Primary Arrival East (AE)'),
(21, 'GP - Primary'),
(22, 'VHF - SECONDARY ARRIVAL EAST'),
(23, 'VHF - ACC Primary UPLB'),
(24, 'VHF - ADC Primary Tower South'),
(25, 'VHF - ACC Primary UBND'),
(26, 'HF-RDARA'),
(27, 'ATIS'),
(28, 'VCS (Frequentis)'),
(29, 'Voice Recorder (VERSADIAL)'),
(30, 'VHF - Emergency'),
(31, 'VHF - ADC Back Up Tower South'),
(32, 'VHF - Ground Control South Back Up'),
(33, 'VHF - ADC Back Up Tower North'),
(34, 'VHF - Ground Control North Back Up'),
(35, 'VHF - Ground Control North Back Up'),
(36, 'HF-MWARA FSS I'),
(37, 'VHF - APP Secondary Lower North (LN)'),
(38, 'VHF - Ground Control South Primary'),
(39, 'VHF - Ground Control South Secondary'),
(41, 'VHF - Ground Control 3'),
(42, 'VHF - Ground Control 3'),
(43, 'VHF - ADC Primary Tower North'),
(44, 'VHF - ADC Secondary Tower North'),
(45, 'VHF - Ground Control North Primary'),
(46, 'VHF - Ground Control North Secondary'),
(47, 'VHF - Delivery North Primary'),
(48, 'VHF - Delivery North Secondary'),
(49, 'VHF - APP Secondary Terminal West (TW)'),
(50, 'VHF - APP Primary Terminal East (TE)'),
(51, 'VHF - APP Secondary Terminal East (TE)'),
(52, 'VHF - APP Primary Lower Center (LC)'),
(53, 'VHF - APP Secondary Lower Center (LC)'),
(54, 'VHF - APP Primary Arrival North (AN)'),
(55, 'VHF - APP Secondary Arrival North (AN)'),
(56, 'VHF - APP Primary Lower North (LN)'),
(57, 'VHF - APP Primary Lower East (LE)'),
(58, 'VHF - APP Primary Terminal West (TW)'),
(139, 'EJAATS'),
(140, 'JAATS'),
(141, 'PRISMA'),
(142, 'ARTAS');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `no` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`no`, `name`) VALUES
(4, 'Karyawan'),
(6, 'Junior Manager'),
(7, 'Manager'),
(8, 'Deputy General Manager'),
(9, 'General Manager');

-- --------------------------------------------------------

--
-- Table structure for table `radio_komunikasi`
--

CREATE TABLE `radio_komunikasi` (
  `id` int(11) NOT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `judul` text NOT NULL,
  `shift` int(11) NOT NULL,
  `atasan` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recent_devices`
--

CREATE TABLE `recent_devices` (
  `id` int(11) NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `device_type` varchar(50) NOT NULL,
  `os` varchar(50) NOT NULL,
  `browser` varchar(50) NOT NULL,
  `user_agent` text NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  `time` datetime NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `recent_devices`
--

INSERT INTO `recent_devices` (`id`, `device_name`, `device_type`, `os`, `browser`, `user_agent`, `ip_address`, `country`, `time`, `last_login`) VALUES
(1, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '112.215.252.139', 'Indonesia', '2024-07-22 09:05:07', '2024-07-22 09:05:07'),
(2, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '103.168.190.9', 'Indonesia', '2024-07-22 12:43:16', '2024-07-29 19:11:33'),
(3, 'Unknown Device', 'Mobile', 'Linux', 'Chrome', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36', '103.168.190.9', 'Indonesia', '2024-07-22 12:44:47', '2024-07-22 12:44:47'),
(4, 'Unknown Device', 'Desktop', 'Windows', 'Firefox', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:128.0) Gecko/20100101 Firefox/128.0', '112.215.231.152', 'Indonesia', '2024-07-24 04:38:12', '2024-07-24 04:38:12'),
(5, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '97.74.85.86', 'Singapore', '2024-07-24 12:49:14', '2024-07-24 13:55:28'),
(11, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', '140.213.129.189', 'Indonesia', '2024-07-25 03:47:16', '2024-07-25 03:47:16'),
(14, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '103.168.136.2', 'Indonesia', '2024-07-26 02:03:21', '2024-07-26 06:42:14'),
(32, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', '103.168.190.9', 'Indonesia', '2024-07-26 14:44:45', '2024-07-26 14:47:16'),
(34, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '140.213.129.19', 'Indonesia', '2024-07-29 01:49:16', '2024-07-29 03:09:43'),
(36, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '2400:9800:322:200d:b02a:fcc3:64db:6a9c', 'Indonesia', '2024-07-29 13:41:42', '2024-07-29 13:43:34'),
(39, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', '2400:9800:380:3827:d87e:731b:79a7:5f31', 'Indonesia', '2024-07-29 14:37:19', '2024-07-29 15:02:36'),
(41, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '2400:9800:380:3827:183f:4e9b:16cd:8886', 'Indonesia', '2024-07-29 15:39:03', '2024-07-29 15:39:03'),
(42, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '2400:9800:361:d6bf:811:3750:1ca4:2497', 'Indonesia', '2024-07-30 08:19:24', '2024-07-30 08:19:24'),
(43, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', '140.213.21.35', 'Indonesia', '2024-07-30 09:12:42', '2024-07-30 09:12:42'),
(44, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '2400:9800:312:8396:811:3750:1ca4:2497', 'Indonesia', '2024-07-30 10:54:40', '2024-07-30 10:54:40'),
(45, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '2400:9800:312:8396:b904:c9a0:ddb3:f2d3', 'Indonesia', '2024-07-30 11:54:31', '2024-07-30 11:54:31'),
(46, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '2400:9800:4c1:6dfe:79c6:872:9705:ee19', 'Indonesia', '2024-07-30 12:42:23', '2024-07-30 12:42:23'),
(47, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', '2400:9800:4c0:917a:79c6:872:9705:ee19', 'Indonesia', '2024-07-30 14:28:40', '2024-07-30 14:54:48'),
(48, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '103.168.190.9', 'Indonesia', '2024-07-30 19:23:30', '2024-08-02 18:58:44'),
(49, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', '103.168.190.9', 'Indonesia', '2024-07-30 19:33:09', '2024-08-01 23:05:18'),
(50, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '2400:9800:331:a64d:ec7d:4847:8fb9:905', 'Indonesia', '2024-07-31 08:09:59', '2024-07-31 08:10:09'),
(51, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '2a09:bac1:3480:18::38:2a', 'Singapore', '2024-07-31 09:13:52', '2024-07-31 09:13:52'),
(52, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', '2a09:bac5:3a23:15f::23:3c9', 'Singapore', '2024-07-31 10:30:33', '2024-07-31 10:30:42'),
(54, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '2a09:bac5:3a23:15f::23:3c9', 'Singapore', '2024-07-31 10:31:57', '2024-07-31 10:37:29'),
(55, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '2400:9800:3b1:2468:50a4:5975:4079:3bee', 'Indonesia', '2024-08-01 07:56:45', '2024-08-01 07:56:45'),
(56, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '2400:9800:4d2:4710:50a4:5975:4079:3bee', 'Indonesia', '2024-08-01 10:02:41', '2024-08-01 10:02:41'),
(57, 'Unknown Device', 'Mobile', 'Linux', 'Chrome', 'Mozilla/5.0 (Linux; Android 10; YAL-L21) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', '91.192.81.88', 'Singapore', '2024-08-01 12:56:45', '2024-08-01 12:56:45'),
(58, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '2400:9800:341:2efd:8c85:f9a0:74bb:a167', 'Indonesia', '2024-08-01 14:34:35', '2024-08-01 14:34:35'),
(59, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', '2400:9800:341:2efd:8c85:f9a0:74bb:a167', 'Indonesia', '2024-08-01 14:39:52', '2024-08-01 14:39:52'),
(60, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '2400:9800:4d0:26cf:5818:e6bd:7946:1952', 'Indonesia', '2024-08-02 07:38:14', '2024-08-02 07:38:14'),
(61, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '2400:9800:350:648b:5818:e6bd:7946:1952', 'Indonesia', '2024-08-02 09:36:11', '2024-08-02 09:36:11'),
(62, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', '2400:9800:320:d36a:5818:e6bd:7946:1952', 'Indonesia', '2024-08-02 10:24:42', '2024-08-02 10:24:42'),
(63, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '2400:9800:d:a4f7:d8ab:a881:3b07:e5ee', 'Indonesia', '2024-08-02 12:53:48', '2024-08-02 12:53:48'),
(64, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', '2400:9800:d:a4f7:d8ab:a881:3b07:e5ee', 'Indonesia', '2024-08-02 13:00:06', '2024-08-02 14:01:57'),
(65, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 Edg/127.0.0.0', '2400:9800:4e0:7f51:d8ab:a881:3b07:e5ee', 'Indonesia', '2024-08-02 14:36:53', '2024-08-02 15:52:54'),
(69, 'Unknown Device', 'Desktop', 'Windows', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', '127.0.0.1', 'Unknown Country', '2024-11-14 06:34:08', '2024-11-14 06:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `srjj`
--

CREATE TABLE `srjj` (
  `id` int(11) NOT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `judul` text NOT NULL,
  `shift` int(11) NOT NULL,
  `atasan` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surveillance`
--

CREATE TABLE `surveillance` (
  `id` int(11) NOT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `judul` text NOT NULL,
  `shift` int(11) NOT NULL,
  `atasan` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gelar` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `access_level` enum('0','1','2') NOT NULL DEFAULT '0',
  `profile_picture` varchar(255) NOT NULL DEFAULT 'default.png',
  `position` varchar(255) NOT NULL DEFAULT 'Karyawan',
  `technician` int(11) NOT NULL DEFAULT 0,
  `signature` text NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `joined` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gelar`, `username`, `email`, `password`, `access_level`, `profile_picture`, `position`, `technician`, `signature`, `country`, `phone_number`, `address`, `city`, `state`, `zip_code`, `joined`) VALUES
(1, 'Haikal Reihan', 'S.Kom.', 'admin', 'admin@haikal.engineer', '$argon2id$v=19$m=65536,t=4,p=1$TXpRaG0zaktOeS5LbnlmLg$Xy+aYbP68EBiG+WvLpAZmdm4AoHK0StAwfOdoBipNTw', '2', 'default.png', 'General Manager', 1, 'data:image/png;base64,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', 'Indonesia', '+62812345678', 'Merdeka Square', 'Jakarta', 'Central Jakarta City', 10110, '2024-07-31'),
(2, 'Dava Syahputra', '', 'davasyahputra', 'dava@haikal.engineer', '$argon2id$v=19$m=65536,t=4,p=1$dlc4YXdQbzJXNjRVcU1uSw$vAPNfWGUyuJR/tpMTVdPhQXvWXhImxyf3kh/B1Uvl+U', '1', 'default.png', 'Manager', 1, 'data:image/png;base64,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', 'Indonesia', '+62812345678', 'Jl. Medan Merdeka Tim. No.1', 'Makassar', 'Central Jakarta City', 10110, '2024-07-31'),
(4, 'Raihan Antoni', '', 'raihanantoni', 'raihan@haikal.engineer', '$argon2id$v=19$m=65536,t=4,p=1$TXpRaG0zaktOeS5LbnlmLg$Xy+aYbP68EBiG+WvLpAZmdm4AoHK0StAwfOdoBipNTw', '0', 'default.png', 'Karyawan', 1, 'data:image/png;base64,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', 'Indonesia', '+6212345786', 'Merdeka Square Monas Street Square', 'Jakarta', 'Central Jakarta City', 10110, '2024-08-01'),
(7, 'Fani Pebrianto', '', 'fanipebrianto', 'fani@haikal.engineer', '$argon2id$v=19$m=65536,t=4,p=1$R2cvRS9BU2ZqSUJRaUVZUA$34dRnNzp8B8cHdchVLo9Fq786FhCOwEGm0DxUuwTrbU', '0', 'default.png', 'Karyawan', 1, 'data:image/png;base64,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', 'Indonesia', '+6285691187625', 'Jl Pramuka ', 'Bandar Lampung', 'Lampung', 110102, '2024-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_notifications`
--

INSERT INTO `user_notifications` (`id`, `user_id`, `notification_id`, `status`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 0),
(3, 4, 1, 0),
(4, 7, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amss-adps`
--
ALTER TABLE `amss-adps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bangunan`
--
ALTER TABLE `bangunan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_1`
--
ALTER TABLE `content_1`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `content_2`
--
ALTER TABLE `content_2`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `content_3`
--
ALTER TABLE `content_3`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `content_4`
--
ALTER TABLE `content_4`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `content_5`
--
ALTER TABLE `content_5`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `content_6`
--
ALTER TABLE `content_6`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `content_7`
--
ALTER TABLE `content_7`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `content_8`
--
ALTER TABLE `content_8`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `content_9`
--
ALTER TABLE `content_9`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `data-kerusakan`
--
ALTER TABLE `data-kerusakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdps-rdps`
--
ALTER TABLE `fdps-rdps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listrik`
--
ALTER TABLE `listrik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `radio_komunikasi`
--
ALTER TABLE `radio_komunikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recent_devices`
--
ALTER TABLE `recent_devices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_device` (`user_agent`,`ip_address`) USING HASH;

--
-- Indexes for table `srjj`
--
ALTER TABLE `srjj`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surveillance`
--
ALTER TABLE `surveillance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `notification_id` (`notification_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amss-adps`
--
ALTER TABLE `amss-adps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bangunan`
--
ALTER TABLE `bangunan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `content_1`
--
ALTER TABLE `content_1`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `content_2`
--
ALTER TABLE `content_2`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_3`
--
ALTER TABLE `content_3`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_4`
--
ALTER TABLE `content_4`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_5`
--
ALTER TABLE `content_5`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_6`
--
ALTER TABLE `content_6`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_7`
--
ALTER TABLE `content_7`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_8`
--
ALTER TABLE `content_8`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_9`
--
ALTER TABLE `content_9`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data-kerusakan`
--
ALTER TABLE `data-kerusakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fdps-rdps`
--
ALTER TABLE `fdps-rdps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `listrik`
--
ALTER TABLE `listrik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `radio_komunikasi`
--
ALTER TABLE `radio_komunikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recent_devices`
--
ALTER TABLE `recent_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `srjj`
--
ALTER TABLE `srjj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surveillance`
--
ALTER TABLE `surveillance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD CONSTRAINT `user_notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
