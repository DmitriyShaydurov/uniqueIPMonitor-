-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 25, 2020 at 09:26 AM
-- Server version: 5.7.29
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filkos`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_ip`
--

CREATE TABLE `user_ip` (
  `id` int(11) NOT NULL,
  `ip` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_ip`
--

INSERT INTO `user_ip` (`id`, `ip`, `date_added`) VALUES
(1, '127.0.0.3', '2020-08-25 02:57:23'),
(2, '171.6.240.122', '2020-08-25 02:57:23'),
(3, '127.0.0.2', '2020-08-25 02:57:30'),
(4, '171.6.240.123', '2020-08-25 02:57:30'),
(10, '127.0.0.1', '2020-08-25 04:16:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_ip`
--
ALTER TABLE `user_ip`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_ip`
--
ALTER TABLE `user_ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
