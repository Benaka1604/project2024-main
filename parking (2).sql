-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 07:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `basic`
--

CREATE TABLE `basic` (
  `sl` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(20) NOT NULL,
  `VNo` varchar(10) NOT NULL,
  `VType` varchar(10) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `T_hrs` tinyint(1) DEFAULT 0,
  `Payment` tinyint(1) DEFAULT NULL,
  `OTP` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basic`
--

INSERT INTO `basic` (`sl`, `Name`, `VNo`, `VType`, `Email`, `Password`, `T_hrs`, `Payment`, `OTP`) VALUES
(1, 'A', 'KA00AA0000', 'Bike', 'A@gmail.com', '123', 0, NULL, NULL),
(2, 'Murthy', 'KA01MN0123', 'Bike', 'm@gmail.com', '123', 0, 1, 3581),
(3, 'Channakeshava B S', 'KA01HU0410', 'Bike', 'channa16@gmail.com', '123', 0, NULL, 6094),
(4, 'Benaka', 'KA01AA0123', 'Bike', 'benaka@gmail.com', '123', 0, 1, 4517),
(5, 'safana', 'KA02AA1452', 'Bike', 'safana@gmail.com', '123', 0, NULL, 3828),
(6, 'Guru', 'KA05GG1234', 'Bike', 'guru@gmail.com', '123', 0, 1, 7980),
(7, 'Yaseen', 'KA13EH3287', 'Bike', 'yaseen@gmail.com', '123', 0, 1, 9418),
(8, 'Jayanna', 'KA01JJ123', 'Bike', 'j@gmail.com', '123', 0, 1, 3363),
(9, 'trail', 'KA01TR0123', 'Bike', 'trail@gmail.com', '123', 0, 1, 8146),
(11, 'Vinay', 'KA46L1541', 'Bike', 'vinay@gmail.com', '123', 0, NULL, NULL),
(14, 'Nagaraj', 'KA13NR3210', 'Car', 'nr@gmail.com', '123', 0, 1, 6670),
(15, 'Benaka', 'KA16CA2001', 'Car', 'ben@gmail.com', '123', 0, NULL, NULL),
(16, 'vajra', 'KA120503', 'Bike', 'vajra@gmail.com', '123', 0, NULL, NULL),
(17, 'jay', 'KA18123', 'Car', 'jk@gmail.com', '123', 0, 1, 8967),
(18, 'nagu', 'KA02NG9547', 'Car', 'nn@gmail.com', '123', 0, NULL, NULL),
(19, 'Akash', 'KA50A1234', 'Car', 'Ak@gmail.com', '123', 0, NULL, 1198);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `sl` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(5) NOT NULL,
  `c_name` varchar(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `c_city` varchar(20) NOT NULL,
  `c_place` varchar(20) NOT NULL,
  `b_slots` int(2) DEFAULT NULL,
  `c_slots` int(2) DEFAULT NULL,
  `b_rate` int(2) NOT NULL DEFAULT 10,
  `c_rate` int(2) NOT NULL DEFAULT 15,
  `Temp` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`sl`, `p_id`, `c_name`, `Email`, `c_city`, `c_place`, `b_slots`, `c_slots`, `b_rate`, `c_rate`, `Temp`) VALUES
(1, 95461, 'Benaka', 'b@gmail.com', 'Hassan', 'Udayagiri', 30, 20, 10, 15, 0),
(2, 50935, 'Nagu', 'N@gmail.com', 'Hassan', 'VIJAYANAGAR', 20, 18, 10, 15, 0),
(3, 78581, 'Jayanna', 'J@gmail.com', 'Hassan', 'MG Road', 20, 10, 10, 15, 1),
(4, 16003, 'Murthy', 'Mn@gmail.com', 'Hassan', 'NR Cirle', 20, 0, 10, 15, 1),
(5, 35334, 'Jayanna', 'jay@gmail.com', 'Hassan', 'MG Road', 15, 10, 10, 15, 1),
(6, 41712, 'Jayanna', 'jay@gmail.com', 'Hassan', 'MG Road', 20, 10, 10, 15, 0),
(7, 95081, 'Vinay', 'Vi@gmail.com', 'Hassan', 'NR Circle', 20, 10, 10, 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `sl` bigint(20) UNSIGNED NOT NULL,
  `Email` text NOT NULL,
  `v_no` varchar(10) DEFAULT NULL,
  `VNo` varchar(10) NOT NULL,
  `VType` varchar(4) NOT NULL,
  `InTime` datetime NOT NULL,
  `OutTime` datetime NOT NULL DEFAULT current_timestamp(),
  `Totalhrs` int(11) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Payment` tinyint(1) DEFAULT NULL,
  `p_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`sl`, `Email`, `v_no`, `VNo`, `VType`, `InTime`, `OutTime`, `Totalhrs`, `Price`, `Payment`, `p_id`) VALUES
(1, 'm@gmail.com', 'KA01MN0123', '', 'Bike', '2024-05-21 10:49:00', '2024-05-21 11:05:28', 1, 10, 1, 95461),
(2, 'channa16@gmail.com', 'KA01HU0410', '', 'Bike', '2024-05-21 11:03:58', '2024-06-03 20:13:10', 322, 270, 1, 95461),
(3, 'benaka@gmail.com', 'KA01AA0123', 'KA01AA0123', 'Bike', '2024-05-21 11:04:00', '2024-06-04 10:49:39', 336, 280, 0, 95461),
(4, 'm@gmail.com', 'KA01MN0123', 'KA01MN0123', 'Bike', '2024-05-21 11:05:53', '2024-06-04 10:49:40', 336, 280, 0, 95461),
(5, 'yaseen@gmail.com', 'KA13EH3287', '', 'Bike', '2024-05-22 10:07:31', '2024-05-22 10:09:48', 1, 10, 1, 95461),
(6, 'safana@gmail.com', 'KA02AA1452', '', 'Bike', '2024-05-22 10:36:08', '2024-05-22 10:38:49', 1, 10, 1, 95461),
(7, 'j@gmail.com', 'KA01jj123', 'KA01jj123', 'Bike', '2024-05-23 16:02:14', '2024-06-04 10:49:40', 283, 240, 0, 95461),
(8, 'nr@gmail.com', 'KA13NR3210', '', 'Car', '2024-05-24 08:02:40', '2024-06-02 10:57:59', 219, 190, 1, 95461),
(9, 'jk@gmail.com', 'KA18123', 'KA18123', 'Car', '2024-05-24 12:02:31', '2024-06-04 10:49:40', 263, 220, 0, 95461),
(10, 'safana@gmail.com', 'KA02AA1452', '', 'Bike', '2024-05-26 07:20:58', '2024-06-03 23:22:06', 209, 180, 1, 95461),
(11, 'guru@gmail.com', 'KA05GG1234', 'KA05GG1234', 'Bike', '2024-05-26 07:20:59', '2024-06-04 10:49:40', 220, 190, 0, 95461),
(12, 'trail@gmail.com', 'ka01tr0123', 'ka01tr0123', 'Bike', '2024-05-31 23:24:04', '2024-06-04 10:49:40', 84, 70, 0, 50935),
(13, 'yaseen@gmail.com', 'KA13EH3287', 'KA13EH3287', 'Bike', '2024-05-31 23:41:19', '2024-06-04 10:49:40', 84, 70, 0, 50935),
(19, 'nr@gmail.com', 'ka13nr3210', '', 'Car', '2024-06-03 22:52:00', '2024-06-03 22:54:59', 1, 10, 1, 95461),
(20, 'nr@gmail.com', 'KA13NR3210', '', 'Car', '2024-06-03 22:56:17', '2024-06-03 23:12:52', 1, 10, 1, 95461),
(21, 'nr@gmail.com', 'KA13NR3210', '', 'Car', '2024-06-03 23:14:10', '2024-06-03 23:15:51', 1, 10, 1, 95461),
(22, 'nr@gmail.com', 'KA13NR3210', '', 'Car', '2024-06-03 23:16:33', '2024-06-03 23:19:57', 1, 10, 1, 95461),
(23, 'nr@gmail.com', 'KA13NR3210', 'KA13NR3210', 'Car', '2024-06-03 23:59:42', '2024-06-04 10:49:40', 11, 10, 0, 95461),
(24, 'safana@gmail.com', 'KA02AA1452', '', 'Bike', '2024-06-04 10:50:02', '2024-06-04 10:54:16', 1, 10, 1, 95081),
(25, 'Ak@gmail.com', 'KA50A1234', '', 'Car', '2024-06-04 11:06:49', '2024-06-04 11:08:56', 1, 10, 1, 95081);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `sl` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `temp` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`sl`, `email`, `pass`, `temp`) VALUES
(1, 'b@gmail.com', '1234', 2),
(2, 'A@gmail.com', '123', 1),
(3, 'm@gmail.com', '123', 1),
(4, 'channa16@gmail.com', '123', 1),
(5, 'benaka@gmail.com', '123', 1),
(6, 'safana@gmail.com', '123', 1),
(7, 'guru@gmail.com', '123', 1),
(8, 'yaseen@gmail.com', '123', 1),
(10, 'trail@gmail.com', '123', 1),
(11, 'vinay@gmail.com', '123', 1),
(12, 'nr@gmail.com', '123', 3),
(13, 'ben@gmail.com', '123', 3),
(14, 'vajra@gmail.com', '123', 1),
(15, 'jk@gmail.com', '123', 1),
(16, 'N@gmail.com', '1234', 2),
(20, 'nn@gmail.com', '123', 3),
(22, 'jay@gmail.com', '1234', 2),
(23, 'Vi@gmail.com', '1234', 2),
(24, 'Ak@gmail.com', '123', 3);

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `slot` bigint(20) UNSIGNED NOT NULL,
  `Vi@gmail.com` varchar(15) NOT NULL DEFAULT 'Available',
  `95081` varchar(10) DEFAULT NULL,
  `N@gmail.com` varchar(15) NOT NULL DEFAULT 'Available',
  `50935` varchar(10) DEFAULT NULL,
  `jay@gmail.com` varchar(15) NOT NULL DEFAULT 'Available',
  `41712` varchar(10) DEFAULT NULL,
  `95461` varchar(10) DEFAULT NULL,
  `b@gmail.com` varchar(15) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`slot`, `Vi@gmail.com`, `95081`, `N@gmail.com`, `50935`, `jay@gmail.com`, `41712`, `95461`, `b@gmail.com`) VALUES
(0, 'Unavailable', NULL, 'skip', NULL, 'skip', NULL, NULL, 'skip'),
(1, 'Parked', 'KA50A1234', 'Available', NULL, 'Available', NULL, 'KA13NR3210', 'Parked'),
(2, 'Available', NULL, 'Available', NULL, 'Available', NULL, NULL, 'Available'),
(3, 'Available', NULL, 'Available', NULL, 'Available', NULL, NULL, 'Available'),
(4, 'Available', NULL, 'Available', NULL, 'Available', NULL, NULL, 'Available'),
(5, 'Available', NULL, 'Available', NULL, 'Available', NULL, NULL, 'Available'),
(6, 'Available', NULL, 'Available', NULL, 'Available', NULL, NULL, 'Available'),
(7, 'Available', NULL, 'Available', NULL, 'Available', NULL, NULL, 'Available'),
(8, 'Available', NULL, 'Available', NULL, 'Available', NULL, NULL, 'Available'),
(9, 'Available', NULL, 'Available', NULL, 'Available', NULL, NULL, 'Available'),
(10, 'Available', NULL, 'Available', NULL, 'Available', NULL, NULL, 'Available'),
(11, 'Unavailable', NULL, 'Available', NULL, 'Unavailable', NULL, NULL, 'Available'),
(12, 'Unavailable', NULL, 'Available', NULL, 'Unavailable', NULL, NULL, 'Available'),
(13, 'Unavailable', NULL, 'Available', NULL, 'Unavailable', NULL, NULL, 'Available'),
(14, 'Unavailable', NULL, 'Available', NULL, 'Unavailable', NULL, NULL, 'Available'),
(15, 'Unavailable', NULL, 'Available', NULL, 'Unavailable', NULL, NULL, 'Available'),
(16, 'Unavailable', NULL, 'Available', NULL, 'Unavailable', NULL, NULL, 'Available'),
(17, 'Unavailable', NULL, 'Available', NULL, 'Unavailable', NULL, NULL, 'Available'),
(18, 'Unavailable', NULL, 'Available', NULL, 'Unavailable', NULL, NULL, 'Available'),
(19, 'Unavailable', NULL, 'Unavailable', NULL, 'Unavailable', NULL, NULL, 'Available'),
(20, 'Unavailable', NULL, 'Unavailable', NULL, 'Unavailable', NULL, NULL, 'Available'),
(21, 'Unavailable', NULL, 'Unavailable', NULL, 'Unavailable', NULL, NULL, 'Unavailable'),
(22, 'Unavailable', NULL, 'Unavailable', NULL, 'Unavailable', NULL, NULL, 'Unavailable'),
(23, 'Unavailable', NULL, 'Unavailable', NULL, 'Unavailable', NULL, NULL, 'Unavailable'),
(24, 'Unavailable', NULL, 'Unavailable', NULL, 'Unavailable', NULL, NULL, 'Unavailable'),
(25, 'Unavailable', NULL, 'Unavailable', NULL, 'Unavailable', NULL, NULL, 'Unavailable'),
(26, 'Unavailable', NULL, 'Unavailable', NULL, 'Unavailable', NULL, NULL, 'Unavailable'),
(27, 'Unavailable', NULL, 'Unavailable', NULL, 'Unavailable', NULL, NULL, 'Unavailable'),
(28, 'Unavailable', NULL, 'Unavailable', NULL, 'Unavailable', NULL, NULL, 'Unavailable'),
(29, 'Unavailable', NULL, 'Unavailable', NULL, 'Unavailable', NULL, NULL, 'Unavailable'),
(30, 'Unavailable', NULL, 'Unavailable', NULL, 'Unavailable', NULL, NULL, 'Unavailable'),
(31, 'Unavailable', NULL, 'Unavailable', NULL, 'Unavailable', NULL, NULL, 'Unavailable'),
(32, 'Unavailable', NULL, 'Unavailable', NULL, 'Unavailable', NULL, NULL, 'Unavailable'),
(33, 'Unavailable', NULL, 'Unavailable', NULL, 'Unavailable', NULL, NULL, 'Unavailable'),
(34, 'Unavailable', NULL, 'Unavailable', NULL, 'Unavailable', NULL, NULL, 'Unavailable'),
(35, 'Unavailable', NULL, 'Unavailable', NULL, 'Unavailable', NULL, NULL, 'Unavailable');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basic`
--
ALTER TABLE `basic`
  ADD UNIQUE KEY `sl` (`sl`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD UNIQUE KEY `sl` (`sl`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD UNIQUE KEY `sl` (`sl`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `sl` (`sl`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD UNIQUE KEY `slot` (`slot`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basic`
--
ALTER TABLE `basic`
  MODIFY `sl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `sl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `sl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `sl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `slot` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
