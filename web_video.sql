-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2020 at 05:09 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_video`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_tb`
--

CREATE TABLE `category_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_tb`
--

INSERT INTO `category_tb` (`id`, `name`) VALUES
(1, 'Komedi'),
(2, 'Action'),
(3, 'Lifestyle'),
(4, 'Vlog'),
(5, 'Short Film'),
(6, 'Education'),
(7, 'Musik'),
(8, 'Apa Aja');

-- --------------------------------------------------------

--
-- Table structure for table `video_tb`
--

CREATE TABLE `video_tb` (
  `id` int(5) NOT NULL,
  `title` text NOT NULL,
  `category_id` int(5) NOT NULL,
  `attache` text NOT NULL,
  `thumbnail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_tb`
--

INSERT INTO `video_tb` (`id`, `title`, `category_id`, `attache`, `thumbnail`) VALUES
(1, 'Fintech - Agung Hapsah', 6, 'upload/video/agung_hapsah_fintech.mp4', 'upload/thumbnail/2.jpg'),
(2, 'Indra Jegel: Di Telepon Emak (Grand Final SUCI 7)', 1, 'upload/video/indra_suci_ditelepon_emak.mp4', 'upload/thumbnail/4.jpg'),
(3, 'Room Tour - Agung Hapsah', 4, 'upload/video/agung_hapsah_roomtour.mp4', 'upload/thumbnail/6.jpg'),
(4, 'Indra Jegel: Di Telepon Emak (Grand Final SUCI 7)', 1, 'upload/video/indra_suci_ditelepon_emak.mp4', 'upload/thumbnail/4.jpg'),
(5, 'Indra Jegel: Masa Kecil Yang Asyik (SUCI 6 Show 6)', 1, 'upload/video/indra_suci_masakecil.mp4', 'upload/thumbnail/hqdefault.jpg'),
(6, 'SALAH SIAPA - Short Film (Based on true mahasiswa story)', 1, 'upload/video/salah_siapa_shortfilm.mp4', 'upload/thumbnail/3.jpg'),
(7, 'Short Escape To Jogja - Hizkia Reynald', 4, 'upload/video/short_escape_to_jogja_hizkia.mp4', 'upload/thumbnail/5.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_tb`
--
ALTER TABLE `category_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_tb`
--
ALTER TABLE `video_tb`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
