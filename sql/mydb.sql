-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 20, 2020 at 03:52 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

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
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('STILL','ON_FOOT','RUNNING','ON_BICYCLE','IN_VEHICLE','TILTING','UNKNOWN','WALKING','EXITING_VEHICLE') NOT NULL,
  `confidence` int(11) NOT NULL,
  `activities_id` int(11) NOT NULL,
  PRIMARY KEY (`type_id`),
  KEY `activities_id` (`activities_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6212 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity_type`
--

INSERT INTO `activity_type` (`type_id`, `type`, `confidence`, `activities_id`) VALUES
(6090, 'STILL', 100, 4295),
(6091, 'STILL', 100, 4296),
(6092, 'STILL', 100, 4297),
(6093, 'STILL', 100, 4298),
(6094, 'STILL', 100, 4299),
(6095, 'STILL', 100, 4300),
(6096, 'STILL', 100, 4301),
(6097, 'IN_VEHICLE', 100, 4302),
(6098, 'STILL', 100, 4303),
(6099, 'STILL', 100, 4304),
(6100, 'STILL', 100, 4305),
(6101, 'STILL', 100, 4306),
(6102, 'STILL', 100, 4307),
(6103, 'STILL', 100, 4308),
(6104, 'STILL', 100, 4309),
(6105, 'STILL', 100, 4310),
(6106, 'STILL', 100, 4311),
(6107, 'STILL', 100, 4312),
(6108, 'STILL', 100, 4313),
(6109, 'STILL', 100, 4314),
(6110, 'STILL', 100, 4315),
(6111, 'STILL', 100, 4316),
(6112, 'STILL', 100, 4317),
(6113, 'STILL', 100, 4318),
(6114, 'STILL', 100, 4319),
(6115, 'STILL', 100, 4320),
(6116, 'STILL', 100, 4321),
(6117, 'STILL', 100, 4322),
(6118, 'STILL', 100, 4323),
(6119, 'STILL', 100, 4324),
(6120, 'STILL', 100, 4325),
(6121, 'STILL', 100, 4326),
(6122, 'STILL', 100, 4327),
(6123, 'STILL', 100, 4328),
(6124, 'STILL', 100, 4329),
(6125, 'STILL', 100, 4330),
(6126, 'STILL', 100, 4331),
(6127, 'STILL', 100, 4332),
(6128, 'STILL', 100, 4333),
(6129, 'STILL', 100, 4334),
(6130, 'STILL', 100, 4335),
(6131, 'STILL', 100, 4336),
(6132, 'STILL', 100, 4337),
(6133, 'STILL', 100, 4338),
(6134, 'STILL', 100, 4339),
(6135, 'STILL', 100, 4340),
(6136, 'STILL', 100, 4341),
(6137, 'STILL', 100, 4342),
(6138, 'STILL', 100, 4343),
(6139, 'STILL', 100, 4344),
(6140, 'STILL', 100, 4345),
(6141, 'STILL', 100, 4346),
(6142, 'STILL', 100, 4347),
(6143, 'STILL', 100, 4348),
(6144, 'STILL', 100, 4349),
(6145, 'STILL', 100, 4350),
(6146, 'STILL', 100, 4351),
(6147, 'STILL', 100, 4352),
(6148, 'STILL', 100, 4353),
(6149, 'STILL', 100, 4354),
(6150, 'STILL', 100, 4355),
(6151, 'STILL', 100, 4356),
(6152, 'STILL', 100, 4357),
(6153, 'STILL', 100, 4358),
(6154, 'STILL', 100, 4359),
(6155, 'STILL', 100, 4360),
(6156, 'STILL', 100, 4361),
(6157, 'STILL', 100, 4362),
(6158, 'UNKNOWN', 46, 4363),
(6159, 'STILL', 29, 4363),
(6160, 'IN_VEHICLE', 10, 4363),
(6161, 'ON_BICYCLE', 8, 4363),
(6162, 'ON_FOOT', 8, 4363),
(6163, 'WALKING', 8, 4363),
(6164, 'ON_FOOT', 92, 4364),
(6165, 'WALKING', 92, 4364),
(6166, 'UNKNOWN', 8, 4364),
(6167, 'ON_FOOT', 69, 4365),
(6168, 'WALKING', 69, 4365),
(6169, 'STILL', 15, 4365),
(6170, 'UNKNOWN', 15, 4365),
(6171, 'TILTING', 100, 4366),
(6172, 'UNKNOWN', 39, 4367),
(6173, 'STILL', 33, 4367),
(6174, 'IN_VEHICLE', 23, 4367),
(6175, 'ON_FOOT', 6, 4367),
(6176, 'WALKING', 6, 4367),
(6177, 'STILL', 100, 4368),
(6178, 'STILL', 100, 4369),
(6179, 'STILL', 92, 4370),
(6180, 'IN_VEHICLE', 8, 4370),
(6181, 'STILL', 62, 4371),
(6182, 'IN_VEHICLE', 38, 4371),
(6183, 'STILL', 100, 4372),
(6184, 'STILL', 100, 4373),
(6185, 'STILL', 100, 4374),
(6186, 'STILL', 100, 4375),
(6187, 'STILL', 100, 4376),
(6188, 'STILL', 100, 4377),
(6189, 'STILL', 100, 4378),
(6190, 'STILL', 100, 4379),
(6191, 'STILL', 100, 4380),
(6192, 'STILL', 100, 4381),
(6193, 'STILL', 100, 4382),
(6194, 'STILL', 100, 4383),
(6195, 'STILL', 100, 4384),
(6196, 'STILL', 100, 4385),
(6197, 'STILL', 100, 4386),
(6198, 'STILL', 100, 4387),
(6199, 'STILL', 100, 4388),
(6200, 'STILL', 100, 4389),
(6201, 'STILL', 100, 4390),
(6202, 'STILL', 85, 4391),
(6203, 'IN_VEHICLE', 13, 4391),
(6204, 'ON_FOOT', 3, 4391),
(6205, 'WALKING', 3, 4391),
(6206, 'STILL', 100, 4392),
(6207, 'STILL', 100, 4393),
(6208, 'STILL', 100, 4394),
(6209, 'STILL', 100, 4395),
(6210, 'STILL', 100, 4396),
(6211, 'STILL', 100, 4397);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`) VALUES
(1, 'karma', 'Hello1!');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `loc_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `latE7` decimal(10,8) NOT NULL,
  `longE7` decimal(11,8) NOT NULL,
  `accuracy` int(11) NOT NULL,
  `velocity` int(11) DEFAULT NULL,
  `altitude` int(11) DEFAULT NULL,
  `heading` int(11) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`location_id`),
  KEY `user_id` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=5676 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `loc_timestamp`, `latE7`, `longE7`, `accuracy`, `velocity`, `altitude`, `heading`, `userid`) VALUES
(5495, '2013-05-31 22:38:59', '38.22832190', '21.74574640', 97, NULL, NULL, NULL, 5),
(5496, '2013-05-31 22:49:59', '38.22841360', '21.74595380', 45, NULL, NULL, NULL, 5),
(5497, '2013-05-31 23:06:59', '38.22839660', '21.74573660', 37, NULL, NULL, NULL, 5),
(5498, '2013-05-31 23:35:22', '38.22839660', '21.74573660', 37, NULL, NULL, NULL, 5),
(5499, '2013-05-31 23:44:22', '38.22839660', '21.74573660', 37, NULL, NULL, NULL, 5),
(5500, '2013-06-01 00:15:25', '38.22839410', '21.74581230', 37, NULL, NULL, NULL, 5),
(5501, '2013-06-01 00:28:25', '38.22839670', '21.74578950', 40, NULL, NULL, NULL, 5),
(5502, '2013-06-01 00:30:25', '38.22840290', '21.74586600', 37, NULL, NULL, NULL, 5),
(5503, '2013-06-01 00:52:59', '38.22840870', '21.74586240', 37, NULL, NULL, NULL, 5),
(5504, '2013-06-01 00:54:59', '38.22840870', '21.74586240', 37, NULL, NULL, NULL, 5),
(5505, '2013-06-01 01:27:06', '38.22838560', '21.74580780', 34, NULL, NULL, NULL, 5),
(5506, '2013-06-01 01:54:03', '38.22838560', '21.74580780', 34, NULL, NULL, NULL, 5),
(5507, '2013-06-01 01:58:02', '38.23244340', '21.74125600', 1748, NULL, NULL, NULL, 5),
(5508, '2013-06-01 02:08:33', '38.22517630', '21.74911410', 27, NULL, NULL, NULL, 5),
(5509, '2013-06-01 02:18:35', '38.24106020', '21.73123390', 2344, NULL, NULL, NULL, 5),
(5510, '2013-06-01 02:27:36', '38.25866200', '21.74374740', 1826, NULL, NULL, NULL, 5),
(5511, '2013-06-01 03:08:59', '38.23244340', '21.74125600', 1748, NULL, NULL, NULL, 5),
(5512, '2013-06-01 03:13:59', '38.23244340', '21.74125600', 1748, NULL, NULL, NULL, 5),
(5513, '2013-06-01 03:30:59', '38.23244340', '21.74125600', 1748, NULL, NULL, NULL, 5),
(5514, '2013-06-01 03:34:59', '38.23244340', '21.74125600', 1748, NULL, NULL, NULL, 5),
(5515, '2013-06-01 04:49:21', '38.22833850', '21.74577340', 45, NULL, NULL, NULL, 5),
(5516, '2013-06-01 05:05:21', '38.22838220', '21.74593300', 37, NULL, NULL, NULL, 5),
(5517, '2013-06-01 05:07:21', '38.22838220', '21.74593300', 37, NULL, NULL, NULL, 5),
(5518, '2013-06-01 05:17:22', '38.22837280', '21.74588530', 36, NULL, NULL, NULL, 5),
(5519, '2013-06-01 05:28:28', '38.22839900', '21.74591740', 34, NULL, NULL, NULL, 5),
(5520, '2013-06-01 05:32:00', '38.22839900', '21.74591740', 34, NULL, NULL, NULL, 5),
(5521, '2013-06-01 05:42:00', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5522, '2013-06-01 05:59:01', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5523, '2013-06-01 06:08:07', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5524, '2013-06-01 06:09:07', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5525, '2013-06-01 06:21:02', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5526, '2013-06-01 06:24:02', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5527, '2013-06-01 06:27:02', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5528, '2013-06-01 06:31:02', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5529, '2013-06-01 06:35:03', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5530, '2013-06-01 06:48:09', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5531, '2013-06-01 06:49:09', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5532, '2013-06-01 06:54:09', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5533, '2013-06-01 06:55:09', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5534, '2013-06-01 06:57:10', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5535, '2013-06-01 07:09:05', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5536, '2013-06-01 07:10:05', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5537, '2013-06-01 07:27:05', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5538, '2013-06-01 07:38:12', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5539, '2013-06-01 07:41:12', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5540, '2013-06-01 07:44:06', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5541, '2013-06-01 07:55:07', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5542, '2013-06-01 08:03:07', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5543, '2013-06-01 08:27:14', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5544, '2013-06-01 08:29:59', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5545, '2013-06-01 08:30:59', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5546, '2013-06-01 08:38:00', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5547, '2013-06-01 08:39:00', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5548, '2013-06-01 08:40:00', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5549, '2013-06-01 08:41:00', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5550, '2013-06-01 08:43:00', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5551, '2013-06-01 08:50:00', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5552, '2013-06-01 08:51:00', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5553, '2013-06-01 08:55:00', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5554, '2013-06-01 08:59:06', '38.22841160', '21.74580180', 34, NULL, NULL, NULL, 5),
(5555, '2013-06-02 09:51:08', '38.22831530', '21.74581710', 33, NULL, NULL, NULL, 5),
(5556, '2013-06-01 22:03:21', '38.22831530', '21.74581710', 33, NULL, NULL, NULL, 5),
(5557, '2013-06-01 22:07:21', '38.22831530', '21.74581710', 33, NULL, NULL, NULL, 5),
(5558, '2013-06-01 22:44:24', '38.22831530', '21.74581710', 33, NULL, NULL, NULL, 5),
(5559, '2013-06-01 23:04:24', '38.22831530', '21.74581710', 33, NULL, NULL, NULL, 5),
(5560, '2013-06-01 23:05:24', '38.22831530', '21.74581710', 33, NULL, NULL, NULL, 5),
(5561, '2013-06-01 23:50:26', '38.22831530', '21.74581710', 33, NULL, NULL, NULL, 5),
(5562, '2013-06-02 00:07:54', '38.22831530', '21.74581710', 33, NULL, NULL, NULL, 5),
(5563, '2013-06-02 00:10:54', '38.22831530', '21.74581710', 33, NULL, NULL, NULL, 5),
(5564, '2013-06-02 00:18:54', '38.22831530', '21.74581710', 33, NULL, NULL, NULL, 5),
(5565, '2013-06-02 00:44:01', '38.22831530', '21.74581710', 33, NULL, NULL, NULL, 5),
(5566, '2013-06-02 00:46:01', '38.22831530', '21.74581710', 33, NULL, NULL, NULL, 5),
(5567, '2013-06-02 00:50:56', '38.22831530', '21.74581710', 33, NULL, NULL, NULL, 5),
(5568, '2013-06-02 01:05:57', '38.22831530', '21.74581710', 33, NULL, NULL, NULL, 5),
(5569, '2013-06-02 01:07:57', '38.22831530', '21.74581710', 33, NULL, NULL, NULL, 5),
(5570, '2013-06-02 01:13:57', '38.22831530', '21.74581710', 33, NULL, NULL, NULL, 5),
(5571, '2013-06-02 01:30:04', '38.22831950', '21.74582560', 31, NULL, NULL, NULL, 5),
(5572, '2013-06-02 01:50:10', '38.22831950', '21.74582560', 31, NULL, NULL, NULL, 5),
(5573, '2013-06-02 02:25:12', '38.22831950', '21.74582560', 31, NULL, NULL, NULL, 5),
(5574, '2013-06-02 02:30:12', '38.22831950', '21.74582560', 31, NULL, NULL, NULL, 5),
(5575, '2013-06-02 02:38:13', '38.22831950', '21.74582560', 31, NULL, NULL, NULL, 5),
(5576, '2013-06-02 02:41:13', '38.22831950', '21.74582560', 31, NULL, NULL, NULL, 5),
(5577, '2013-06-02 02:42:13', '38.22831950', '21.74582560', 31, NULL, NULL, NULL, 5),
(5578, '2013-06-02 02:45:13', '38.22831950', '21.74582560', 31, NULL, NULL, NULL, 5),
(5579, '2013-06-02 02:58:19', '38.22831950', '21.74582560', 31, NULL, NULL, NULL, 5),
(5580, '2013-06-02 03:05:14', '38.22831950', '21.74582560', 31, NULL, NULL, NULL, 5),
(5581, '2013-06-02 03:12:14', '38.22831950', '21.74582560', 31, NULL, NULL, NULL, 5),
(5582, '2013-06-02 03:17:14', '38.22831950', '21.74582560', 31, NULL, NULL, NULL, 5),
(5583, '2013-06-02 03:20:14', '38.22831950', '21.74582560', 31, NULL, NULL, NULL, 5),
(5584, '2013-06-02 03:43:01', '38.22831950', '21.74582560', 31, NULL, NULL, NULL, 5),
(5585, '2013-06-02 03:57:17', '38.22831950', '21.74582560', 31, NULL, NULL, NULL, 5),
(5586, '2013-06-02 04:09:17', '38.22831950', '21.74582560', 31, NULL, NULL, NULL, 5),
(5587, '2013-06-02 04:16:13', '38.22831950', '21.74582560', 31, NULL, NULL, NULL, 5),
(5588, '2013-06-02 04:24:13', '38.22831950', '21.74582560', 31, NULL, NULL, NULL, 5),
(5589, '2013-06-02 04:43:20', '38.22836220', '21.74593630', 30, NULL, NULL, NULL, 5),
(5590, '2013-06-02 04:51:20', '38.22836220', '21.74593630', 30, NULL, NULL, NULL, 5),
(5591, '2013-06-02 05:05:16', '38.22836220', '21.74593630', 30, NULL, NULL, NULL, 5),
(5592, '2013-06-02 05:11:16', '38.22836220', '21.74593630', 30, NULL, NULL, NULL, 5),
(5593, '2013-06-02 05:18:16', '38.22836220', '21.74593630', 30, NULL, NULL, NULL, 5),
(5594, '2013-06-02 05:22:17', '38.22836220', '21.74593630', 30, NULL, NULL, NULL, 5),
(5595, '2013-06-02 05:38:40', '38.25539320', '21.74501320', 111, NULL, NULL, NULL, 5),
(5596, '2013-06-02 05:55:29', '38.25670180', '21.74342890', 123, NULL, NULL, NULL, 5),
(5597, '2013-06-02 06:33:31', '38.25678350', '21.74392180', 23, NULL, NULL, NULL, 5),
(5598, '2013-06-02 06:40:31', '38.25678350', '21.74392180', 23, NULL, NULL, NULL, 5),
(5599, '2013-06-02 06:42:31', '38.25682460', '21.74415330', 26, NULL, NULL, NULL, 5),
(5600, '2013-06-02 06:46:31', '38.25674060', '21.74405180', 25, NULL, NULL, NULL, 5),
(5601, '2013-06-02 06:47:31', '38.25674060', '21.74405180', 25, NULL, NULL, NULL, 5),
(5602, '2013-06-02 07:08:38', '38.25671060', '21.74341610', 44, NULL, NULL, NULL, 5),
(5603, '2013-06-02 07:31:59', '38.27604000', '21.76413180', 51, NULL, NULL, NULL, 5),
(5604, '2013-06-02 07:54:31', '38.27411490', '21.76612650', 22, NULL, NULL, NULL, 5),
(5605, '2013-06-02 08:05:32', '38.27411490', '21.76612650', 22, NULL, NULL, NULL, 5),
(5606, '2013-06-02 08:14:38', '38.27411490', '21.76612650', 22, NULL, NULL, NULL, 5),
(5607, '2013-06-02 08:23:33', '38.27411350', '21.76612730', 24, NULL, NULL, NULL, 5),
(5608, '2013-06-02 08:37:33', '38.27411250', '21.76612580', 27, NULL, NULL, NULL, 5),
(5609, '2013-06-02 08:55:40', '38.27411350', '21.76612730', 24, NULL, NULL, NULL, 5),
(5610, '2013-06-02 09:11:38', '38.27411350', '21.76612610', 25, NULL, NULL, NULL, 5),
(5611, '2013-06-02 09:15:38', '38.27440940', '21.76577270', 34, NULL, NULL, NULL, 5),
(5612, '2013-06-02 09:21:38', '38.27440940', '21.76577270', 34, NULL, NULL, NULL, 5),
(5613, '2013-06-02 09:24:38', '38.27432580', '21.76592800', 33, NULL, NULL, NULL, 5),
(5614, '2013-06-02 09:28:39', '38.27439460', '21.76577600', 30, NULL, NULL, NULL, 5),
(5615, '2013-06-02 09:36:49', '38.27439460', '21.76577600', 30, NULL, NULL, NULL, 5),
(5616, '2013-06-01 22:04:40', '38.27421030', '21.76596510', 42, NULL, NULL, NULL, 5),
(5617, '2013-06-01 22:14:41', '38.27438310', '21.76579340', 32, NULL, NULL, NULL, 5),
(5618, '2013-06-01 22:16:41', '38.27438310', '21.76579340', 32, NULL, NULL, NULL, 5),
(5619, '2013-06-01 22:29:47', '38.27429590', '21.76584640', 32, NULL, NULL, NULL, 5),
(5620, '2013-06-02 00:56:11', '38.22823170', '21.74497690', 45, NULL, NULL, NULL, 5),
(5621, '2013-06-02 01:11:11', '38.22822930', '21.74493230', 45, NULL, NULL, NULL, 5),
(5622, '2013-06-02 01:14:11', '38.22764600', '21.74470060', 12, NULL, NULL, NULL, 5),
(5623, '2013-06-02 01:17:11', '38.22822920', '21.74493500', 40, NULL, NULL, NULL, 5),
(5624, '2013-06-02 02:30:43', '38.22831930', '21.74584500', 39, NULL, NULL, NULL, 5),
(5625, '2013-06-02 02:31:43', '38.22831930', '21.74584500', 39, NULL, NULL, NULL, 5),
(5626, '2013-06-02 02:53:43', '38.22829890', '21.74562370', 97, NULL, NULL, NULL, 5),
(5627, '2013-06-02 03:04:50', '38.22833440', '21.74590320', 67, NULL, NULL, NULL, 5),
(5628, '2013-06-02 03:21:59', '38.22824000', '21.74499980', 70, NULL, NULL, NULL, 5),
(5629, '2013-06-02 03:30:42', '38.22842280', '21.74592050', 39, NULL, NULL, NULL, 5),
(5630, '2013-06-02 03:38:42', '38.22838310', '21.74578160', 42, NULL, NULL, NULL, 5),
(5631, '2013-06-02 03:58:49', '38.22842510', '21.74589410', 37, NULL, NULL, NULL, 5),
(5632, '2013-06-02 03:59:49', '38.22842510', '21.74589410', 37, NULL, NULL, NULL, 5),
(5633, '2013-06-02 04:01:49', '38.22842510', '21.74589410', 37, NULL, NULL, NULL, 5),
(5634, '2013-06-02 04:16:00', '38.22842510', '21.74589410', 37, NULL, NULL, NULL, 5),
(5635, '2013-06-02 04:24:00', '38.22842510', '21.74589410', 37, NULL, NULL, NULL, 5),
(5636, '2013-06-02 04:26:00', '38.22842510', '21.74589410', 37, NULL, NULL, NULL, 5),
(5637, '2013-06-02 04:29:00', '38.22842510', '21.74589410', 37, NULL, NULL, NULL, 5),
(5638, '2013-06-03 03:07:13', '38.25306120', '21.74194820', 1553, NULL, NULL, NULL, 5),
(5639, '2013-06-03 03:08:13', '38.25306120', '21.74194820', 1553, NULL, NULL, NULL, 5),
(5640, '2013-06-03 03:11:13', '38.25862750', '21.74155820', 1514, NULL, NULL, NULL, 5),
(5641, '2013-06-03 03:35:07', '38.21699720', '21.74796470', 2267, NULL, NULL, NULL, 5),
(5642, '2013-06-03 03:49:14', '38.23223400', '21.74130470', 2085, NULL, NULL, NULL, 5),
(5643, '2013-06-02 23:00:30', '38.22838460', '21.74575620', 43, NULL, NULL, NULL, 5),
(5644, '2013-06-02 23:03:31', '38.22838460', '21.74575620', 43, NULL, NULL, NULL, 5),
(5645, '2013-06-02 23:12:31', '38.22838460', '21.74575620', 43, NULL, NULL, NULL, 5),
(5646, '2013-06-02 23:31:37', '38.22834550', '21.74583000', 43, NULL, NULL, NULL, 5),
(5647, '2013-06-03 01:15:54', '38.21699720', '21.74796470', 2267, NULL, NULL, NULL, 5),
(5648, '2013-06-03 01:21:54', '38.21673690', '21.74848180', 2936, NULL, NULL, NULL, 5),
(5649, '2013-06-03 01:33:54', '38.22778790', '21.74165660', 40, NULL, NULL, NULL, 5),
(5650, '2015-09-24 01:12:42', '38.24547780', '21.73474000', 23, NULL, NULL, NULL, 5),
(5651, '2015-09-24 01:23:52', '38.24545120', '21.73583730', 51, NULL, NULL, NULL, 5),
(5652, '2015-09-24 01:25:10', '38.24545120', '21.73583730', 1055, NULL, NULL, NULL, 5),
(5653, '2015-09-24 01:44:24', '38.24519430', '21.73636180', 1756, NULL, NULL, NULL, 5),
(5654, '2015-09-24 02:10:23', '38.23156000', '21.75553120', 24, NULL, NULL, NULL, 5),
(5655, '2015-09-24 02:29:11', '38.23156010', '21.75553200', 24, NULL, NULL, NULL, 5),
(5656, '2015-09-24 03:25:38', '38.23156040', '21.75553170', 23, NULL, NULL, NULL, 5),
(5657, '2015-09-24 03:33:43', '38.23153520', '21.75556060', 52, NULL, NULL, NULL, 5),
(5658, '2015-09-24 03:56:35', '38.23156040', '21.75553170', 23, NULL, NULL, NULL, 5),
(5659, '2015-09-24 04:54:51', '38.23156000', '21.75553150', 24, NULL, NULL, NULL, 5),
(5660, '2015-09-24 04:56:51', '38.23161480', '21.75550910', 37, NULL, NULL, NULL, 5),
(5661, '2015-09-24 05:17:28', '38.23159330', '21.75555580', 57, NULL, NULL, NULL, 5),
(5662, '2015-09-24 06:29:13', '38.23155890', '21.75553280', 24, NULL, NULL, NULL, 5),
(5663, '2015-09-24 08:07:18', '38.23156000', '21.75553150', 24, NULL, NULL, NULL, 5),
(5664, '2015-09-25 09:42:53', '38.23156000', '21.75553150', 24, NULL, NULL, NULL, 5),
(5665, '2015-09-24 22:07:58', '38.23156000', '21.75553150', 24, NULL, NULL, NULL, 5),
(5666, '2015-09-24 22:27:05', '38.23156000', '21.75553150', 24, NULL, NULL, NULL, 5),
(5667, '2015-09-24 23:10:08', '38.23156000', '21.75553150', 24, NULL, NULL, NULL, 5),
(5668, '2015-09-25 01:07:33', '38.23155980', '21.75553170', 25, NULL, NULL, NULL, 5),
(5669, '2015-09-25 02:10:19', '38.23155980', '21.75553170', 25, NULL, NULL, NULL, 5),
(5670, '2015-09-25 05:10:01', '38.23155890', '21.75553280', 24, NULL, NULL, NULL, 5),
(5671, '2015-09-25 05:25:05', '38.23155890', '21.75553280', 24, NULL, NULL, NULL, 5),
(5672, '2015-09-25 05:34:38', '38.23155890', '21.75553280', 24, NULL, NULL, NULL, 5),
(5673, '2015-09-25 06:45:03', '38.23155960', '21.75553120', 25, NULL, NULL, NULL, 5),
(5674, '2015-09-25 07:08:42', '38.23155960', '21.75553120', 25, NULL, NULL, NULL, 5),
(5675, '2020-02-14 18:44:04', '38.22832190', '21.74574640', 97, NULL, NULL, NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `location_activities`
--

DROP TABLE IF EXISTS `location_activities`;
CREATE TABLE IF NOT EXISTS `location_activities` (
  `loc_act_id` int(11) NOT NULL AUTO_INCREMENT,
  `l_acc_timestampMs` timestamp NOT NULL DEFAULT current_timestamp(),
  `loc_id` int(11) NOT NULL,
  PRIMARY KEY (`loc_act_id`),
  KEY `location_id` (`loc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4398 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location_activities`
--

INSERT INTO `location_activities` (`loc_act_id`, `l_acc_timestampMs`, `loc_id`) VALUES
(4295, '2013-05-31 23:06:38', 5497),
(4296, '2013-05-31 23:35:28', 5498),
(4297, '2013-05-31 23:44:28', 5499),
(4298, '2013-06-01 00:15:50', 5500),
(4299, '2013-06-01 00:30:51', 5502),
(4300, '2013-06-01 00:53:53', 5503),
(4301, '2013-06-01 01:58:34', 5507),
(4302, '2013-06-01 02:08:44', 5508),
(4303, '2013-06-01 02:26:10', 5510),
(4304, '2013-06-01 03:29:28', 5513),
(4305, '2013-06-01 03:35:28', 5514),
(4306, '2013-06-01 05:29:14', 5519),
(4307, '2013-06-01 06:49:30', 5531),
(4308, '2013-06-01 06:55:30', 5533),
(4309, '2013-06-01 06:58:12', 5534),
(4310, '2013-06-01 07:10:12', 5536),
(4311, '2013-06-01 08:03:33', 5542),
(4312, '2013-06-01 08:29:35', 5544),
(4313, '2013-06-01 08:38:35', 5547),
(4314, '2013-06-01 08:41:35', 5549),
(4315, '2013-06-01 08:50:36', 5552),
(4316, '2013-06-02 09:51:29', 5555),
(4317, '2013-06-01 22:03:30', 5556),
(4318, '2013-06-01 23:04:51', 5559),
(4319, '2013-06-01 23:51:53', 5561),
(4320, '2013-06-02 00:08:54', 5562),
(4321, '2013-06-02 00:11:54', 5563),
(4322, '2013-06-02 00:46:22', 5566),
(4323, '2013-06-02 01:30:24', 5571),
(4324, '2013-06-02 02:26:38', 5573),
(4325, '2013-06-02 02:38:39', 5575),
(4326, '2013-06-02 02:41:39', 5576),
(4327, '2013-06-02 02:58:40', 5579),
(4328, '2013-06-02 03:19:07', 5583),
(4329, '2013-06-02 03:44:11', 5584),
(4330, '2013-06-02 03:58:37', 5585),
(4331, '2013-06-02 04:10:38', 5586),
(4332, '2013-06-02 04:16:38', 5587),
(4333, '2013-06-02 04:43:41', 5589),
(4334, '2013-06-02 05:12:15', 5592),
(4335, '2013-06-02 05:23:25', 5594),
(4336, '2013-06-02 06:33:34', 5597),
(4337, '2013-06-02 06:40:35', 5598),
(4338, '2013-06-02 06:42:35', 5599),
(4339, '2013-06-02 06:47:35', 5601),
(4340, '2013-06-02 07:55:35', 5604),
(4341, '2013-06-02 08:13:26', 5606),
(4342, '2013-06-02 08:23:37', 5607),
(4343, '2013-06-02 09:15:42', 5611),
(4344, '2013-06-02 09:21:42', 5612),
(4345, '2013-06-02 09:25:42', 5613),
(4346, '2013-06-02 09:28:42', 5614),
(4347, '2013-06-02 09:38:06', 5615),
(4348, '2013-06-01 22:11:55', 5617),
(4349, '2013-06-01 22:16:44', 5618),
(4350, '2013-06-02 01:15:38', 5622),
(4351, '2013-06-02 01:18:38', 5623),
(4352, '2013-06-02 02:32:56', 5625),
(4353, '2013-06-02 02:53:57', 5626),
(4354, '2013-06-02 03:05:11', 5627),
(4355, '2013-06-02 04:17:22', 5634),
(4356, '2013-06-02 04:23:41', 5635),
(4357, '2013-06-02 04:30:28', 5637),
(4358, '2013-06-03 03:09:37', 5639),
(4359, '2013-06-02 23:00:52', 5643),
(4360, '2013-06-02 23:03:59', 5644),
(4361, '2013-06-02 23:12:59', 5645),
(4362, '2013-06-02 23:31:58', 5646),
(4363, '2015-09-24 01:13:19', 5650),
(4364, '2015-09-24 01:23:01', 5651),
(4365, '2015-09-24 01:45:19', 5653),
(4366, '2015-09-24 02:07:28', 5654),
(4367, '2015-09-24 02:08:11', 5654),
(4368, '2015-09-24 02:27:18', 5655),
(4369, '2015-09-24 02:29:11', 5655),
(4370, '2015-09-24 03:25:12', 5656),
(4371, '2015-09-24 03:34:09', 5657),
(4372, '2015-09-24 03:55:10', 5658),
(4373, '2015-09-24 03:58:11', 5658),
(4374, '2015-09-24 04:56:28', 5660),
(4375, '2015-09-24 06:27:13', 5662),
(4376, '2015-09-24 06:29:13', 5662),
(4377, '2015-09-24 08:05:43', 5663),
(4378, '2015-09-24 08:07:18', 5663),
(4379, '2015-09-25 09:41:00', 5664),
(4380, '2015-09-25 09:42:40', 5664),
(4381, '2015-09-24 22:05:58', 5665),
(4382, '2015-09-24 22:07:58', 5665),
(4383, '2015-09-24 22:25:33', 5666),
(4384, '2015-09-24 22:27:19', 5666),
(4385, '2015-09-24 23:08:24', 5667),
(4386, '2015-09-24 23:10:08', 5667),
(4387, '2015-09-25 01:05:53', 5668),
(4388, '2015-09-25 01:07:33', 5668),
(4389, '2015-09-25 02:08:55', 5669),
(4390, '2015-09-25 02:12:07', 5669),
(4391, '2015-09-25 05:09:16', 5670),
(4392, '2015-09-25 05:24:05', 5671),
(4393, '2015-09-25 05:27:26', 5671),
(4394, '2015-09-25 05:33:05', 5672),
(4395, '2015-09-25 05:34:38', 5672),
(4396, '2015-09-25 06:43:05', 5673),
(4397, '2015-09-25 06:44:51', 5673);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `userid` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`u_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `password`, `email`, `userid`) VALUES
(5, 'karmalis', 'ebdaa6d426e6aa925561e2faba84d1bf', 'nintendo64@hotmail.com', '3PBlMPCzW5jZVibnLHmhhCmX0uSXiTg424NFliHZ4Io='),
(6, 'evris', 'eed3ff0d48a495ebf9a8a0dfa863352b', 'e@g.com', '6xuvaxO6o3L0zR58viKIaw==');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_type`
--
ALTER TABLE `activity_type`
  ADD CONSTRAINT `activities_id` FOREIGN KEY (`activities_id`) REFERENCES `location_activities` (`loc_act_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`userid`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `location_activities`
--
ALTER TABLE `location_activities`
  ADD CONSTRAINT `location_id` FOREIGN KEY (`loc_id`) REFERENCES `locations` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
