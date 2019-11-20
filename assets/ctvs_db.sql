-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2019 at 10:56 AM
-- Server version: 10.3.10-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `ctvs`
--

CREATE TABLE `ctvs` (
  `id` int(11) NOT NULL,
  `period` varchar(50) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `phone_no` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cell_allocated` varchar(30) DEFAULT NULL,
  `residence` varchar(250) DEFAULT NULL,
  `village` varchar(250) DEFAULT NULL,
  `zone` varchar(25) DEFAULT NULL,
  `follow_up_status` varchar(25) DEFAULT NULL,
  `cell_status` varchar(25) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ctvs`
--
ALTER TABLE `ctvs`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
