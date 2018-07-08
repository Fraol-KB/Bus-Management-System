-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2018 at 09:36 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

DROP TABLE IF EXISTS `actions`;
CREATE TABLE IF NOT EXISTS `actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(100) NOT NULL,
  `type` varchar(25) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `action`, `type`, `date`) VALUES
(1, 'User - 12reserve Seat ID - 118 on Journey ID - 13', 'reserve', '1530204280'),
(2, 'User - 12reserve Seat ID - 119 on Journey ID - 13', 'reserve', '1530204280'),
(3, 'User - 12reserve Seat ID - 120 on Journey ID - 13', 'reserve', '1530204280');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'sam1', 'sam1');

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

DROP TABLE IF EXISTS `balances`;
CREATE TABLE IF NOT EXISTS `balances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balances`
--

INSERT INTO `balances` (`id`, `user_id`, `amount`) VALUES
(2, 12, 525),
(3, 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

DROP TABLE IF EXISTS `buses`;
CREATE TABLE IF NOT EXISTS `buses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plate_number` varchar(25) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `number_of_seats` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `driver_id` (`driver_id`),
  KEY `route_id` (`route_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `plate_number`, `driver_id`, `route_id`, `number_of_seats`) VALUES
(19, 'A01020', 0, 7, 10),
(20, 'A00100', 0, 6, 10),
(21, '89000', 0, 1, 20),
(22, 'A55555', 0, 7, 50);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(25) NOT NULL,
  `comment` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user`, `comment`) VALUES
(1, 'sadsadsad', 'sadasdsad'),
(2, 'abebe', 'you are awesome'),
(3, 'Abebe Kebede', 'Hi how are you?'),
(4, 'Abebe Kebede', ''),
(5, 'sdasd', ''),
(6, 'sdasd', ''),
(7, 'sdasd', 'asdsda'),
(8, 'sdasd', ''),
(9, 'sdasd', 'asdasd'),
(10, 'Abebe Kebede', 'HI'),
(11, 'Sam Sam', 'asdasffds'),
(12, ' ', 'dfafsdsfa'),
(13, 'sdfsdf', 'sddsdfsd'),
(14, 'sdfsdf', 'sddsdfsd'),
(15, 'asdasd sadsad', 'safsaffs'),
(16, 'asdasd sadsad', 'safsaffs'),
(17, 'dasfdsaf', 'adsfadsf');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(25) NOT NULL,
  `value` int(11) NOT NULL,
  `is_redeemed` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1052 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `value`, `is_redeemed`) VALUES
(987, 'QWE465597', 1000, 'used'),
(988, 'QWE140759', 1000, 'used'),
(989, 'QWE663076', 1000, 'used'),
(990, 'QWE431622', 1000, 'used'),
(991, 'QWE220272', 1000, 'used'),
(1040, 'ACB503198', 10, 'used'),
(1041, 'ACB850173', 10, 'used'),
(1042, 'JCF211071', 10, 'used'),
(1043, 'JCF227139', 10, 'used'),
(1044, 'JCF614434', 10, 'not_used'),
(1045, 'JCF346835', 10, 'used'),
(1046, 'JCF751928', 10, 'used'),
(1047, 'MK830920', 500, 'used'),
(1048, 'MK628140', 500, 'used'),
(1049, 'MK111041', 500, 'not_used'),
(1050, 'MK714437', 500, 'not_used'),
(1051, 'MK208105', 500, 'not_used');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

DROP TABLE IF EXISTS `destinations`;
CREATE TABLE IF NOT EXISTS `destinations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`) VALUES
(1, 'Dire Dawa'),
(2, 'Arba Minch'),
(4, 'Dessie');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
CREATE TABLE IF NOT EXISTS `drivers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `is_assigned` varchar(25) NOT NULL DEFAULT 'not_assigned',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `phone_number`, `is_assigned`) VALUES
(8, 'Aman', '091554433', 'assigned');

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

DROP TABLE IF EXISTS `informations`;
CREATE TABLE IF NOT EXISTS `informations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `img` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `title`, `description`, `img`) VALUES
(4, 'Welcome ', 'Welcome to Our site (Ethio Bus online Site).', '');

-- --------------------------------------------------------

--
-- Table structure for table `journeys`
--

DROP TABLE IF EXISTS `journeys`;
CREATE TABLE IF NOT EXISTS `journeys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bus_id` int(11) NOT NULL,
  `starting_date` varchar(25) NOT NULL,
  `starting_time` varchar(25) NOT NULL,
  `arrival_time` varchar(25) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journeys`
--

INSERT INTO `journeys` (`id`, `bus_id`, `starting_date`, `starting_time`, `arrival_time`, `price`) VALUES
(12, 19, '2016-04-22', '15:52', '20:52', 50),
(13, 21, '2016-01-25', '03:50', '04:50', 50),
(14, 22, '2016-02-25', '05:59', '07:57', 50);

-- --------------------------------------------------------

--
-- Table structure for table `origins`
--

DROP TABLE IF EXISTS `origins`;
CREATE TABLE IF NOT EXISTS `origins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `origins`
--

INSERT INTO `origins` (`id`, `name`) VALUES
(1, 'Addis Ababa'),
(3, 'Bahir Dar'),
(4, 'Dire Dawa'),
(5, 'Adama'),
(6, 'Mekele'),
(7, 'Harer'),
(8, 'Gonder'),
(9, 'Hawassa'),
(10, 'Assosa');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `journey_id` int(11) NOT NULL,
  `seat_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `journey_id`, `seat_id`, `date`) VALUES
(2, 0, 0, 0, ''),
(3, 0, 0, 0, ''),
(18, 12, 12, 89, ''),
(19, 12, 12, 90, ''),
(20, 12, 12, 91, ''),
(21, 12, 13, 112, ''),
(22, 12, 13, 113, ''),
(23, 12, 13, 114, ''),
(24, 12, 13, 115, ''),
(25, 12, 13, 116, ''),
(26, 12, 13, 117, ''),
(27, 12, 13, 118, '1530204279'),
(28, 12, 13, 119, '1530204280'),
(29, 12, 13, 120, '1530204280');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

DROP TABLE IF EXISTS `routes`;
CREATE TABLE IF NOT EXISTS `routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `origin_id`, `destination_id`, `length`) VALUES
(1, 1, 2, 200),
(6, 1, 1, 500),
(7, 3, 4, 270);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

DROP TABLE IF EXISTS `seats`;
CREATE TABLE IF NOT EXISTS `seats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bus_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `occupied` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `bus_id`, `number`, `user_id`, `occupied`) VALUES
(1, 1, 24, 13, 'unoccupied'),
(2, 1, 24, 0, 'occupied'),
(3, 0, 1, 12, 'occupied'),
(4, 0, 1, 12, 'unoccupied'),
(5, 11, 1, 0, 'unoccupied'),
(6, 12, 1, 0, 'unoccupied'),
(7, 13, 1, 0, 'unoccupied'),
(8, 14, 1, 0, 'unoccupied'),
(9, 15, 1, 0, 'unoccupied'),
(10, 15, 2, 0, 'unoccupied'),
(11, 15, 3, 0, 'unoccupied'),
(12, 15, 4, 0, 'unoccupied'),
(13, 15, 5, 0, 'unoccupied'),
(14, 15, 6, 0, 'unoccupied'),
(15, 15, 7, 0, 'unoccupied'),
(16, 15, 8, 0, 'unoccupied'),
(17, 15, 9, 0, 'unoccupied'),
(18, 15, 10, 0, 'unoccupied'),
(19, 16, 1, 12, 'occupied'),
(20, 16, 2, 12, 'occupied'),
(21, 16, 3, 12, 'unoccupied'),
(22, 16, 4, 12, 'unoccupied'),
(23, 16, 5, 0, 'unoccupied'),
(24, 16, 6, 0, 'unoccupied'),
(25, 16, 7, 0, 'unoccupied'),
(26, 16, 8, 0, 'unoccupied'),
(27, 16, 9, 0, 'unoccupied'),
(28, 16, 10, 0, 'unoccupied'),
(29, 16, 11, 0, 'unoccupied'),
(30, 16, 12, 0, 'unoccupied'),
(31, 16, 13, 0, 'unoccupied'),
(32, 16, 14, 0, 'unoccupied'),
(33, 16, 15, 0, 'unoccupied'),
(34, 16, 16, 0, 'unoccupied'),
(35, 16, 17, 0, 'unoccupied'),
(36, 16, 18, 0, 'unoccupied'),
(37, 16, 19, 0, 'unoccupied'),
(38, 16, 20, 0, 'unoccupied'),
(39, 16, 21, 0, 'unoccupied'),
(40, 16, 22, 0, 'unoccupied'),
(41, 16, 23, 0, 'unoccupied'),
(42, 16, 24, 0, 'unoccupied'),
(43, 16, 25, 0, 'unoccupied'),
(44, 16, 26, 0, 'unoccupied'),
(45, 16, 27, 0, 'unoccupied'),
(46, 16, 28, 0, 'unoccupied'),
(47, 16, 29, 0, 'unoccupied'),
(48, 16, 30, 0, 'unoccupied'),
(49, 16, 31, 0, 'unoccupied'),
(50, 16, 32, 0, 'unoccupied'),
(51, 16, 33, 0, 'unoccupied'),
(52, 16, 34, 0, 'unoccupied'),
(53, 16, 35, 0, 'unoccupied'),
(54, 16, 36, 0, 'unoccupied'),
(55, 16, 37, 0, 'unoccupied'),
(56, 16, 38, 0, 'unoccupied'),
(57, 16, 39, 0, 'unoccupied'),
(58, 16, 40, 0, 'unoccupied'),
(59, 16, 41, 0, 'unoccupied'),
(60, 16, 42, 0, 'unoccupied'),
(61, 16, 43, 0, 'unoccupied'),
(62, 16, 44, 0, 'unoccupied'),
(63, 16, 45, 0, 'unoccupied'),
(64, 16, 46, 0, 'unoccupied'),
(65, 16, 47, 0, 'unoccupied'),
(66, 16, 48, 0, 'unoccupied'),
(67, 16, 49, 0, 'unoccupied'),
(68, 16, 50, 0, 'unoccupied'),
(69, 17, 1, 0, 'unoccupied'),
(70, 17, 2, 0, 'unoccupied'),
(71, 17, 3, 0, 'unoccupied'),
(72, 17, 4, 0, 'unoccupied'),
(73, 17, 5, 0, 'unoccupied'),
(74, 17, 6, 0, 'unoccupied'),
(75, 17, 7, 0, 'unoccupied'),
(76, 17, 8, 0, 'unoccupied'),
(77, 17, 9, 0, 'unoccupied'),
(78, 17, 10, 0, 'unoccupied'),
(79, 18, 1, 0, 'unoccupied'),
(80, 18, 2, 0, 'unoccupied'),
(81, 18, 3, 0, 'unoccupied'),
(82, 18, 4, 0, 'unoccupied'),
(83, 18, 5, 0, 'unoccupied'),
(84, 18, 6, 0, 'unoccupied'),
(85, 18, 7, 0, 'unoccupied'),
(86, 18, 8, 0, 'unoccupied'),
(87, 18, 9, 0, 'unoccupied'),
(88, 18, 10, 0, 'unoccupied'),
(89, 19, 1, 12, 'occupied'),
(90, 19, 2, 12, 'occupied'),
(91, 19, 3, 12, 'occupied'),
(92, 19, 4, 0, 'unoccupied'),
(93, 19, 5, 0, 'unoccupied'),
(94, 19, 6, 0, 'unoccupied'),
(95, 19, 7, 0, 'unoccupied'),
(96, 19, 8, 0, 'unoccupied'),
(97, 19, 9, 0, 'unoccupied'),
(98, 19, 10, 0, 'unoccupied'),
(99, 20, 1, 0, 'unoccupied'),
(100, 20, 2, 0, 'unoccupied'),
(101, 20, 3, 0, 'unoccupied'),
(102, 20, 4, 0, 'unoccupied'),
(103, 20, 5, 0, 'unoccupied'),
(104, 20, 6, 0, 'unoccupied'),
(105, 20, 7, 0, 'unoccupied'),
(106, 20, 8, 0, 'unoccupied'),
(107, 20, 9, 0, 'unoccupied'),
(108, 20, 10, 0, 'unoccupied'),
(109, 21, 1, 0, 'unoccupied'),
(110, 21, 2, 0, 'unoccupied'),
(111, 21, 3, 0, 'unoccupied'),
(112, 21, 4, 12, 'occupied'),
(113, 21, 5, 12, 'occupied'),
(114, 21, 6, 12, 'occupied'),
(115, 21, 7, 12, 'occupied'),
(116, 21, 8, 12, 'occupied'),
(117, 21, 9, 12, 'occupied'),
(118, 21, 10, 12, 'occupied'),
(119, 21, 11, 12, 'occupied'),
(120, 21, 12, 12, 'occupied'),
(121, 21, 13, 0, 'unoccupied'),
(122, 21, 14, 0, 'unoccupied'),
(123, 21, 15, 0, 'unoccupied'),
(124, 21, 16, 0, 'unoccupied'),
(125, 21, 17, 0, 'unoccupied'),
(126, 21, 18, 0, 'unoccupied'),
(127, 21, 19, 0, 'unoccupied'),
(128, 21, 20, 0, 'unoccupied'),
(129, 22, 1, 0, 'unoccupied'),
(130, 22, 2, 0, 'unoccupied'),
(131, 22, 3, 0, 'unoccupied'),
(132, 22, 4, 0, 'unoccupied'),
(133, 22, 5, 0, 'unoccupied'),
(134, 22, 6, 0, 'unoccupied'),
(135, 22, 7, 0, 'unoccupied'),
(136, 22, 8, 0, 'unoccupied'),
(137, 22, 9, 0, 'unoccupied'),
(138, 22, 10, 0, 'unoccupied'),
(139, 22, 11, 0, 'unoccupied'),
(140, 22, 12, 0, 'unoccupied'),
(141, 22, 13, 0, 'unoccupied'),
(142, 22, 14, 0, 'unoccupied'),
(143, 22, 15, 0, 'unoccupied'),
(144, 22, 16, 0, 'unoccupied'),
(145, 22, 17, 0, 'unoccupied'),
(146, 22, 18, 0, 'unoccupied'),
(147, 22, 19, 0, 'unoccupied'),
(148, 22, 20, 0, 'unoccupied'),
(149, 22, 21, 0, 'unoccupied'),
(150, 22, 22, 0, 'unoccupied'),
(151, 22, 23, 0, 'unoccupied'),
(152, 22, 24, 0, 'unoccupied'),
(153, 22, 25, 0, 'unoccupied'),
(154, 22, 26, 0, 'unoccupied'),
(155, 22, 27, 0, 'unoccupied'),
(156, 22, 28, 0, 'unoccupied'),
(157, 22, 29, 0, 'unoccupied'),
(158, 22, 30, 0, 'unoccupied'),
(159, 22, 31, 0, 'unoccupied'),
(160, 22, 32, 0, 'unoccupied'),
(161, 22, 33, 0, 'unoccupied'),
(162, 22, 34, 0, 'unoccupied'),
(163, 22, 35, 0, 'unoccupied'),
(164, 22, 36, 0, 'unoccupied'),
(165, 22, 37, 0, 'unoccupied'),
(166, 22, 38, 0, 'unoccupied'),
(167, 22, 39, 0, 'unoccupied'),
(168, 22, 40, 0, 'unoccupied'),
(169, 22, 41, 0, 'unoccupied'),
(170, 22, 42, 0, 'unoccupied'),
(171, 22, 43, 0, 'unoccupied'),
(172, 22, 44, 0, 'unoccupied'),
(173, 22, 45, 0, 'unoccupied'),
(174, 22, 46, 0, 'unoccupied'),
(175, 22, 47, 0, 'unoccupied'),
(176, 22, 48, 0, 'unoccupied'),
(177, 22, 49, 0, 'unoccupied'),
(178, 22, 50, 0, 'unoccupied');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `kebele_id_number` varchar(50) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `kebele_id_number`, `gender`, `username`, `password`, `email`, `phone_number`, `status`) VALUES
(11, 'asdasd', 'sadsad', 'ABC2005', 'Male', 'q', 'q', 'sam@sam.com', 'q', 'not_active'),
(12, 'Sam', 'Sam', 'ABC2005', 'Male', 'beso', 'q', 'sam@sam.com', '0911010203', 'active'),
(13, 'beki', 'beki', 'harar', 'Male', 'beki', 'beki1234', 'beki@gmail.com', '0912342345', 'active'),
(14, 'asdasd', 'sadsad', 'ABC2006', 'Male', 'e', '12345678', 'sam@sam.com', '0922030406', 'active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
