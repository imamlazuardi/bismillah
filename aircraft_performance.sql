-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2017 at 02:44 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aircraft_performance`
--

-- --------------------------------------------------------

--
-- Table structure for table `landing_weight`
--

CREATE TABLE `landing_weight` (
  `id` int(11) UNSIGNED NOT NULL,
  `weight` double(5,0) NOT NULL,
  `distance` double(5,0) NOT NULL,
  `altitude` double(5,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `landing_weight`
--

INSERT INTO `landing_weight` (`id`, `weight`, `distance`, `altitude`) VALUES
(1, 10000, 200, 200),
(2, 20000, 400, 600),
(3, 30000, 600, 800),
(4, 40000, 802, 980),
(5, 41000, 817, 992),
(6, 42000, 832, 1004),
(7, 43000, 840, 1016),
(8, 44000, 850, 1028),
(9, 45000, 863, 1040),
(10, 46000, 879, 1052),
(11, 47000, 890, 1064),
(12, 48000, 901, 1072),
(13, 49000, 911, 1084),
(14, 50000, 922, 1096);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `landing_weight`
--
ALTER TABLE `landing_weight`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `landing_weight`
--
ALTER TABLE `landing_weight`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
