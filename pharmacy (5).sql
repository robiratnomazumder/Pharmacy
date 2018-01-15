-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2017 at 10:16 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `pharmacy_id` int(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`pharmacy_id`, `email`, `password`, `name`) VALUES
(101, 'robi11@gmail.com', '11', 'Green Pharma'),
(102, 'robi12@gmail.com', '12', 'Jomuna Pharma'),
(103, 'robi13@gmail.com', '13', 'Nikunjo Pharma'),
(104, 'robi14@gmail.com', '14', 'Balughat Pharma'),
(1000, 'robi@gmail.com', '1000', 'admin page');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(200) NOT NULL,
  `lat` float NOT NULL,
  `lon` float NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pharmacy_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `lat`, `lon`, `name`, `address`, `pharmacy_id`) VALUES
(1, 23.8217, 90.4446, 'JOMUNA PHARMA', 'boshundhora ', 102),
(2, 23.825, 90.4152, 'GREEN PHARMA', 'jamtola road', 101),
(3, 23.8333, 90.4167, 'NIKUNJO PHARMA', 'Nikunjo 1', 103),
(4, 23.8294, 90.3904, 'BALUGHAT PHARMA', 'balughat', 104);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `pharmacy_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `name`, `category`, `price`, `quantity`, `path`, `pharmacy_id`) VALUES
(5, 'napa', 'fever', 4, 16, 'picture/napa.jpg', 101),
(6, 'napa extra', 'fever', 5, 18, 'picture/Napa-Extra.jpg', 101),
(8, 'ace plus', 'fever', 5, 12, 'picture/ACE-PLUS.jpg', 101),
(9, 'ciprocin', 'fever', 18, 14, 'picture/Ciprocin 500.jpg', 102),
(10, 'opcol', 'eye_drop', 55, 9, 'picture/eye2.jpg', 101),
(11, 'xibrofen', 'eye_drop', 70.5, 5, 'picture/eye3.jpg', 101),
(12, 'lomeflox', 'eye_drop', 60, 20, 'picture/eye4.png', 101),
(14, 'entacyd plus', 'gastric', 12, 33, 'picture/ENTACYD-PLUS.jpg', 102),
(17, 'aristocal m', 'vitamin', 80, 10, 'picture/Aristocal-M.jpg', 101),
(18, 'aristovit m', 'vitamin', 85, 12, 'picture/Aristovit-M.jpg', 103),
(19, 'syskem', 'eye_drop', 85.75, 6, 'picture/eye5.jpg', 103),
(23, 'oval', 'eye_drop', 12, 23, 'picture/eye6.png', 101),
(24, 'domperidone', 'gastric', 4, 34, 'picture/65db2353-12dd-40bd-a3e2-0084e844a2bc.png', 104),
(25, 'ace', 'fever', 5, 34, 'picture/ACE-125.jpg', 104),
(26, 'calcium D3', 'calcium', 45, 6, 'picture/xenion-19020350.jpg', 104),
(27, 'calcium m', 'calcium', 40, 8, 'picture/cal m.jpg', 104),
(28, 'ace plus', 'fever', 4, 33, 'picture/ACE-PLUS - 104.jpg', 104),
(30, 'neotack', 'gastric', 7, 23, 'picture/Neotack 300 - 104.jpg', 104),
(31, 'seclo', 'gastric', 8, 20, 'picture/SECLO-40-INJECTION - 102.jpg', 102),
(32, 'basok', 'cough', 55, 5, 'picture/basok.jpg', 102),
(35, 'opcol', 'eye_drop', 45, 23, 'picture/eye2 - 102.jpg', 104);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `datecreation` varchar(100) NOT NULL,
  `pharmacy_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `delivery` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `datecreation`, `pharmacy_id`, `username`, `firstname`, `lastname`, `phone`, `address`, `delivery`) VALUES
(1, 'new order', '2017-11-07', 0, 'acc2', '', '', 0, '', ''),
(4, 'new order', '2017-11-07', 0, 'acc2', '', '', 0, '', ''),
(7, 'new order', '2017-11-27', 0, 'acc2', '', '', 0, '', ''),
(8, 'new order', '2017-11-27', 0, 'acc2', '', '', 0, '', ''),
(9, 'new order', '2017-11-28', 0, 'acc2', '', '', 0, '', ''),
(10, 'new order', '2017-11-28', 0, 'acc2', '', '', 0, '', ''),
(13, 'new order', '2017-11-29 19:05:30', 101, 'acc2', '', '', 0, '', ''),
(15, 'new order', '2017-12-02 16:06:29', 101, 'acc2', '', '', 0, '', 'done'),
(19, 'new order', '2017-12-02 23:48:22', 102, 'acc2', '', '', 0, '', ''),
(21, 'new order', '2017-12-03 21:01:07', 101, 'acc2', 'robi', '', 0, '', 'done'),
(23, 'new order', '2017-12-03 22:00:54', 101, 'acc2', '', '', 0, '', ''),
(25, 'new order', '2017-12-03 22:02:24', 103, 'acc2', '', '', 0, '', ''),
(27, 'new order', '555', 0, 'acc2', 'firstname', 'lastname', 0, 'phone', ''),
(29, 'new order', '2017-12-04 20:11:28', 104, 'acc2', 'robi', 'mazumder', 0, '1758112484', ''),
(30, 'new order', '2017-12-04 20:12:23', 104, 'acc2', 'robi', 'mazumder', 1758112484, 'nikunjo', ''),
(34, 'new order', '2017-12-04 20:17:54', 103, 'acc2', 'robi', 'mazumder', 1758112484, 'nikunjo', ''),
(35, 'new order', '2017-12-04 20:18:57', 104, 'acc2', 'robi', 'ratno', 1758112484, 'mirpur 2', ''),
(36, 'new order', '2017-12-04 20:19:55', 104, 'acc2', 'robi', 'ratno', 1758112484, 'mirpur 2', ''),
(37, 'new order', '2017-12-04 20:20:59', 104, 'acc2', 'robi', 'ratno', 1758112484, 'mirpur 2', ''),
(38, 'new order', '2017-12-04 20:22:01', 104, 'acc2', 'robi', 'ratno', 1758112484, 'mirpur 2', ''),
(39, 'new order', '2017-12-04 20:24:20', 104, 'acc2', 'robi', 'ratno', 1758112484, 'mirpur 2', ''),
(40, 'new order', '2017-12-04 20:25:36', 103, 'acc2', 'robi', 'ratno', 1758112484, 'mirpur 2', ''),
(41, 'new order', '2017-12-04 20:26:19', 104, 'acc2', 'robi', 'mazumder', 1758112484, 'nikunjo', ''),
(43, 'new order', '2017-12-04 21:14:23', 104, 'acc2', 'robi', 'mazumder', 1758112484, 'nikunjo', ''),
(44, 'new order', '2017-12-04 21:14:54', 104, 'acc2', 'robi', 'mazumder', 1758112484, 'nikunjo', ''),
(45, 'new order', '2017-12-04 21:15:28', 104, 'acc2', 'robi', 'mazumder', 1758112484, 'nikunjo', ''),
(52, 'new order', '2017-12-04 23:38:59', 101, 'acc2', 'robi', 'mazumder', 1758112484, 'nikunjo', 'done'),
(53, 'new order', '2017-12-04 23:40:35', 101, 'acc2', 'robi', 'mazumder', 1758112484, 'nikunjo', 'done'),
(54, 'new order', '2017-12-04 23:50:11', 102, 'acc2', 'robi', 'mazumder', 1758112484, 'nikunjo', ''),
(55, 'new order', '2017-12-04 23:55:02', 102, 'acc2', 'robi', 'mazumder', 1758112484, 'nikunjo', ''),
(56, 'new order', '2017-12-04 23:58:15', 101, 'acc2', 'robi', 'mazumder', 1758112484, 'nikunjo', 'done'),
(57, 'new order', '2017-12-05 02:52:24', 101, 'acc2', 'robi', 'ratno', 1758112484, 'mirpur 2', ''),
(58, 'new order', '2017-12-05 02:53:33', 102, 'acc2', 'robi', 'ratno', 1758112484, 'mirpur 2', ''),
(59, 'new order', '2017-12-05 11:20:45', 101, 'acc2', 'jahid', 'hasan', 1789989898, 'nikunjo', ''),
(60, 'new order', '2017-12-05 11:21:13', 103, 'acc2', 'jahid', 'hasan', 1789989898, 'nikunjo', ''),
(61, 'new order', '2017-12-05 11:21:33', 101, 'acc2', 'jahid', 'hasan', 1789989898, 'nikunjo', 'done'),
(62, 'new order', '2017-12-05 11:23:38', 101, 'acc2', 'jahid', 'hasan', 1789989898, 'nikunjo', 'done'),
(63, 'new order', '2017-12-05 13:13:24', 101, 'acc2', 'robi', 'mazumder', 1758112484, 'nikunjo', ''),
(64, 'new order', '2017-12-05 13:17:23', 101, 'acc2', 'robi', 'mazumder', 1758112484, 'nikunjo', ''),
(65, 'new order', '2017-12-05 14:01:44', 102, 'acc2', 'robi', 'mazumder', 1758112484, 'nikunjo', ''),
(66, 'new order', '2017-12-05 14:32:00', 101, 'acc2', 'jahid', 'hasan', 1789989898, 'nikunjo', 'done'),
(67, 'new order', '2017-12-05 14:38:19', 101, 'acc2', 'jahid', 'hasan', 1789989898, 'nikunjo', 'done'),
(68, 'new order', '2017-12-05 15:28:16', 101, 'acc2', 'jahid', 'hasan', 1789989898, 'nikunjo', ''),
(69, 'new order', '2017-12-05 15:54:14', 101, 'acc2', 'robi', 'mazumder', 1758112484, 'nikunjo', ''),
(71, 'new order', '2017-12-11 23:45:07', 101, 'acc2', 'robi', 'mazumder', 1758112484, 'nikunjo', 'not sent'),
(72, 'new order', '2017-12-11 23:45:37', 101, 'acc2', 'robi', 'mazumder', 1758112484, 'nikunjo', 'not sent');

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetail`
--

CREATE TABLE `ordersdetail` (
  `ordersid` int(200) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `productid` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordersdetail`
--

INSERT INTO `ordersdetail` (`ordersid`, `price`, `quantity`, `productid`) VALUES
(1, 4, 1, 5),
(1, 15, 2, 15),
(4, 5, 12, 6),
(4, 15, 10, 13),
(7, 5, 2, 8),
(8, 5, 1, 8),
(9, 5, 1, 6),
(9, 55, 1, 10),
(10, 5, 19, 6),
(13, 60, 1, 12),
(13, 55, 1, 10),
(15, 5, 1, 6),
(19, 12, 1, 14),
(20, 4, 1, 5),
(21, 5, 1, 6),
(21, 55, 1, 10),
(22, 4, 1, 5),
(23, 60, 1, 12),
(23, 4, 1, 5),
(25, 106, 1, 19),
(29, 4, 1, 28),
(34, 86, 1, 19),
(35, 45, 1, 26),
(36, 40, 1, 27),
(37, 45, 1, 26),
(38, 40, 1, 27),
(39, 45, 1, 26),
(40, 86, 1, 19),
(41, 4, 1, 28),
(51, 80, 1, 17),
(52, 4, 1, 5),
(53, 4, 4, 5),
(53, 5, 1, 6),
(54, 18, 16, 9),
(55, 18, 1, 9),
(56, 80, 1, 17),
(57, 5, 3, 6),
(57, 4, 1, 5),
(58, 8, 1, 31),
(59, 4, 3, 5),
(59, 60, 1, 12),
(60, 86, 1, 19),
(61, 4, 1, 5),
(62, 4, 1, 5),
(63, 4, 2, 5),
(63, 5, 1, 6),
(64, 4, 2, 5),
(64, 55, 1, 10),
(65, 4, 1, 5),
(65, 80, 1, 17),
(66, 4, 1, 5),
(67, 4, 3, 5),
(68, 5, 1, 6),
(68, 5, 1, 8),
(69, 5, 2, 6),
(69, 4, 9, 5),
(71, 5, 1, 6),
(72, 55, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(200) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `day` int(100) NOT NULL,
  `month` int(100) NOT NULL,
  `year` int(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `conf_password` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `fname`, `lname`, `day`, `month`, `year`, `gender`, `phone`, `email`, `username`, `password`, `conf_password`, `address`) VALUES
(1, 'jahid', 'hasan', 13, 8, 1981, 'male', 1789989898, 'robi21@gmail.com', '21', '12345', '12345', 'nikunjo'),
(2, 'robi', 'mazumder', 21, 9, 1996, 'male', 1758112484, 'robi22@gmail.com', '22', '12345', '12345', 'nikunjo'),
(3, 'robi', 'ratno', 0, 0, 0, 'male', 1758112484, 'robi23@gmail.com', '23', '12345', '12345', 'mirpur 2'),
(4, 'tamim', 'rahman', 0, 0, 0, '', 1758112499, 'tamim@gmail.com', '', '12345', '12345', 'dhanmondi'),
(9, 'mushfiq', 'rahman', 0, 0, 0, 'male', 1999999999, 'mushfiq@gmail.com', '', '333333333', '333333333', 'mirpur 2 ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`pharmacy_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `pharmacy_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
