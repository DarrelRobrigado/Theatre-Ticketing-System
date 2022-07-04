-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2020 at 10:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tts_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(11) NOT NULL,
  `admin_user` varchar(20) NOT NULL,
  `admin_pass` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `admin_user`, `admin_pass`) VALUES
(1, 'admin', 1111);

-- --------------------------------------------------------

--
-- Table structure for table `cust_tbl`
--

CREATE TABLE `cust_tbl` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(25) NOT NULL,
  `cust_date` date NOT NULL,
  `cust_status` tinyint(1) NOT NULL,
  `play_id` int(11) NOT NULL,
  `cust_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cust_tbl`
--

INSERT INTO `cust_tbl` (`cust_id`, `cust_name`, `cust_date`, `cust_status`, `play_id`, `cust_count`) VALUES
(1, 'Xavier Reyes', '2020-12-15', 1, 1, 1),
(2, 'Darrel Robrigado', '2020-12-15', 1, 1, 2),
(3, 'Angelica Sargan', '2020-12-16', 1, 2, 1),
(4, 'Simon Gerard Granil', '2020-12-17', 1, 1, 3),
(5, 'Shermayne OOI Francisco', '2020-12-19', 1, 1, 4),
(6, 'Melmark Dela Cruz', '2020-12-19', 1, 1, 5),
(7, 'Fatrizha Boongaling', '2020-12-19', 1, 1, 6),
(8, 'Earvin Arsua', '2020-12-19', 1, 2, 2),
(9, 'Andrew Osila', '2020-12-19', 1, 2, 3),
(10, 'Klaire Dela Cruz', '2020-12-19', 1, 2, 4),
(11, 'Harbey Calica', '2020-12-19', 1, 2, 5),
(12, 'Red Falcutila', '2020-12-19', 1, 1, 7),
(13, 'Neo Morales', '2020-12-19', 1, 1, 8),
(14, 'Justin Reyes', '2020-12-19', 1, 1, 9),
(15, 'Vincent Jordan', '2020-12-19', 1, 1, 10),
(16, 'Andrew Garfield', '2020-12-19', 1, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `play_tbl`
--

CREATE TABLE `play_tbl` (
  `play_id` int(11) NOT NULL,
  `play_title` varchar(25) NOT NULL,
  `play_price` int(11) NOT NULL,
  `play_start` int(11) NOT NULL,
  `play_ticket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `play_tbl`
--

INSERT INTO `play_tbl` (`play_id`, `play_title`, `play_price`, `play_start`, `play_ticket`) VALUES
(1, 'Sawakas Meet n Greet', 50, 1, 200),
(2, 'kqueen production', 50, 1, 100),
(14, 'Christmas Party', 45, 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cust_tbl`
--
ALTER TABLE `cust_tbl`
  ADD PRIMARY KEY (`cust_id`),
  ADD KEY `play_id` (`play_id`);

--
-- Indexes for table `play_tbl`
--
ALTER TABLE `play_tbl`
  ADD PRIMARY KEY (`play_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cust_tbl`
--
ALTER TABLE `cust_tbl`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `play_tbl`
--
ALTER TABLE `play_tbl`
  MODIFY `play_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cust_tbl`
--
ALTER TABLE `cust_tbl`
  ADD CONSTRAINT `cust_tbl_ibfk_1` FOREIGN KEY (`play_id`) REFERENCES `play_tbl` (`play_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
