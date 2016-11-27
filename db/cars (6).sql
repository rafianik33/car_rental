-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2016 at 08:30 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
`car_id` int(11) NOT NULL,
  `car_name` varchar(255) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `hire_cost` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `car_type`, `image`, `hire_cost`, `capacity`, `status`) VALUES
(1, 'Corolla', 'Toyota', '2014_Toyota_Corolla_(ZRE172R)_Ascent_sedan_(2014-04-11).jpg', 2000, 5, 'Available'),
(8, 'Pajero', 'Mitsubishi', 'pajero indian car photo.JPG', 5000, 7, 'Available'),
(10, 'Harrier', 'Toyota', 'Toyota_Harrier_Myanmar.jpg', 6000, 7, 'Available'),
(12, 'Creta', 'Hundai', 'o-HYUNDAI-CRETA-facebook.jpg', 4500, 7, 'Available'),
(13, 'Nano', 'Tata', 'tata-nano-1.jpg', 1500, 4, 'Available'),
(14, 'LiteAce', 'Toyota', '2005_Toyota_TownAce_01.jpg', 2500, 11, 'Available'),
(15, 'Allion', 'Toyota', 'allion_A9I_PakWheels(com).jpg', 5000, 5, 'Available'),
(17, 'Noah', 'Toyota', 'toyota_liteace_noah_blue_front_1997.jpg', 4000, 12, 'Available'),
(19, 'Hiace', 'Toyota', 'van-wars-toyota-hiace-vs-nissan-urvan-wrong-car.jpg', 4500, 14, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `hire`
--

CREATE TABLE IF NOT EXISTS `hire` (
`hire_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `Rent` double NOT NULL,
  `bkash_tran_id` varchar(32) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `Datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phoneno` varchar(16) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hire`
--

INSERT INTO `hire` (`hire_id`, `client_id`, `car_id`, `Rent`, `bkash_tran_id`, `status`, `Datetime`, `phoneno`) VALUES
(10, 12, 13, 1500, '54768', 1, '2016-05-02 12:29:48', '6586589'),
(19, 14, 15, 5000, '1234', 1, '2016-05-04 18:21:29', '1234'),
(20, 14, 17, 4000, '1234', 1, '2016-05-04 18:25:52', '123456'),
(22, 14, 13, 1500, '55', 0, '2016-05-04 18:29:11', '66');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
`msg_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `client_id`, `message`, `status`, `time`) VALUES
(9, 10, 'Good Afternoon', 'Unread', '2016-05-02 19:31:01'),
(10, 6, 'Hello', 'Unread', '2016-05-02 19:53:37'),
(11, 12, 'Hi', 'Unread', '2016-05-03 21:55:06'),
(12, 8, 'Nano rent', 'Unread', '2016-05-04 23:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`client_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_no` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `access_level` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`client_id`, `fname`, `email`, `id_no`, `phone`, `location`, `gender`, `status`, `access_level`) VALUES
(5, 'Rafi Anik', 'rafi.anik33@gmail.com', 1234, 1712904107, 'Nikunjo-2', 'Male', 'Approved', 9),
(6, 'Naima', 'naima@gmail.com', 1234, 123456789, 'Komlapur', 'Female', 'Approved', 0),
(7, 'Setu', 'setu_93@hotmail.com', 12345, 2147483647, 'Dhaka', 'Male', 'Approved', 0),
(8, 'mizan', 'mizan@gmail.com', 1234, 123456789, 'Nikunjo-2', 'Male', 'Approved', 0),
(9, 'Nafiz', 'nafiz@gmail.com', 1234, 123456789, 'rajshahi', 'Male', 'Pending', 0),
(10, 'Hasib', 'hasib@gmail.com', 1234, 123456789, 'Narangong', 'Male', 'Approved', 0),
(11, 'Zahid', 'zahid@gmail.com', 1234, 123456789, 'Nikunjo-2', 'Male', 'Approved', 0),
(12, 'Monija', 'monija@gmail.com', 1234, 123456789, 'Mohammadpur', 'Female', 'Approved', 0),
(13, 'Jony', 'jony@gmail.com', 1234, 123456789, 'Rajpara', 'Female', 'Approved', 0),
(14, 'mostofa', 'mostofa@gmail.com', 1234, 123456789, 'Shamoly', 'Male', 'Approved', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
 ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `hire`
--
ALTER TABLE `hire`
 ADD PRIMARY KEY (`hire_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`client_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `hire`
--
ALTER TABLE `hire`
MODIFY `hire_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
