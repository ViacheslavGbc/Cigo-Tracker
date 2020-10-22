-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2020 at 01:51 AM
-- Server version: 5.7.32
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s9gbcevt_gbcevents`
--

-- --------------------------------------------------------

--
-- Table structure for table `cigos`
--

CREATE TABLE `cigos` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(191) NOT NULL,
  `lname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `sdate` date NOT NULL,
  `address` varchar(191) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `country` varchar(191) NOT NULL,
  `status` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cigos`
--

INSERT INTO `cigos` (`id`, `fname`, `lname`, `email`, `phone`, `sdate`, `address`, `city`, `state`, `zip`, `country`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Slava', 'Neo', 'neo@gmail.com', '1-647-322-2233', '2020-10-20', '71-who knows where ct.', 'Montreal', 'QC', 'L4HF4G', 'Canada', 0, '2020-10-21 06:31:22', '2020-10-21 10:31:22'),
(4, 'First Name', 'Last Name', 'youremail@sample.com', '+1(647)647-1234', '2020-07-31', '33-205 BARSUDA DRIVE', 'MISSISSAUGA', 'ONTARIO', 'L5J 1V8', 'Canada', 1, '2020-10-21 06:33:00', '2020-10-21 10:33:00'),
(6, 'Albert', 'Camus', 'acamus@sample.ca', '+1(647)647-1234', '2020-10-22', '33-205 BARSUDA DRIVE', 'Puerto Rico', 'ONTARIO', 'L5J 1X3', 'Canada', 3, '2020-10-21 09:43:09', '2020-10-21 12:02:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cigos`
--
ALTER TABLE `cigos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cigos`
--
ALTER TABLE `cigos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
