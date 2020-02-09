-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 09, 2020 at 04:29 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_type`
--

DROP TABLE IF EXISTS `activity_type`;
CREATE TABLE IF NOT EXISTS `activity_type` (
  `type_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `confidence` varchar(255) NOT NULL,
  `activities_id` int(11) NOT NULL,
  PRIMARY KEY (`type_id`),
  KEY `activities_id` (`activities_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `location_id` int(11) NOT NULL,
  `loc_timestamp` timestamp NOT NULL,
  `latE7` varchar(255) NOT NULL,
  `longE7` varchar(255) NOT NULL,
  `accuracy` varchar(255) NOT NULL,
  `velocity` int(11) NOT NULL,
  `altitude` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `location_activities`
--

DROP TABLE IF EXISTS `location_activities`;
CREATE TABLE IF NOT EXISTS `location_activities` (
  `id` int(11) NOT NULL,
  `timestampMs` timestamp NULL DEFAULT NULL,
  `loc_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `location_id` (`loc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `userid` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `userid`) VALUES
(4, 'karmalis', 'ebdaa6d426e6aa925561e2faba84d1bf', 'nintendo64@hotmail.com', '3PBlMPCzW5jZVibnLHmhhCmX0uSXiTg424NFliHZ4Io=');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_type`
--
ALTER TABLE `activity_type`
  ADD CONSTRAINT `activities_id` FOREIGN KEY (`activities_id`) REFERENCES `location_activities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`location_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `location_activities`
--
ALTER TABLE `location_activities`
  ADD CONSTRAINT `location_id` FOREIGN KEY (`loc_id`) REFERENCES `locations` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
