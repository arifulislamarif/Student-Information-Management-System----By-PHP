-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 08:13 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `name`, `email`, `password`, `position`, `status`) VALUES
(1, 'Arif', 'arif@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Super Admin', 0),
(5, 'Hossain', 'hossain@gmail.com', 'c33367701511b4f6020ec61ded352059', 'Admin', 0),
(7, 'aaa', 'aa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Teacher', 1),
(8, 'cc', 'cc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Teacher', 1),
(9, 'Abbas', 'abbas@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Teacher', 0),
(10, 'Mahin', 'mahin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Teacher', 0),
(11, 'Hasan', 'hasan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Teacher', 0),
(12, 'Munna', 'munna@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', 1),
(13, 'Admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', 0),
(14, 'Teacher', 'teacher@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Teacher', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_img` varchar(150) NOT NULL,
  `s_class` varchar(10) NOT NULL,
  `s_roll` int(10) NOT NULL,
  `s_age` int(5) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`s_id`, `s_name`, `s_img`, `s_class`, `s_roll`, `s_age`, `status`) VALUES
(1, 'Rahat Hasan', 'mywork08.jpg', 'Three', 654321, 11, 1),
(20, 'Naim', 'Chrysanthemum.jpg', 'Two', 123456, 18, 0),
(23, 'Rafiq Hossain', 'Penguins.jpg', 'Five', 123456, 11, 0),
(24, 'Rahim Hossain', 'Desert.jpg', 'Four', 456123, 16, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
