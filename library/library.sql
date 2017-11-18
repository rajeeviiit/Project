-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2016 at 07:57 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(100) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `gender` text NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `admin_pic` varchar(100) NOT NULL DEFAULT 'no-img.png',
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `first_name`, `last_name`, `email`, `gender`, `contact_no`, `admin_pic`, `address`) VALUES
(1, 'pcsaini', '37a7e2cf07ff08f43e5cd844e567a23f', 'Prem Chand', 'Saini', 'premchandsaini779@gmail.com', 'Male', 9887554425, 'no-img.png', 'Ahmedabad');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(100) NOT NULL,
  `book_name` varchar(64) NOT NULL,
  `isbn_no` varchar(10) NOT NULL,
  `author` varchar(32) NOT NULL,
  `edition` int(10) NOT NULL,
  `no_of_copies` int(10) DEFAULT NULL,
  `book_category_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `isbn_no`, `author`, `edition`, `no_of_copies`, `book_category_id`) VALUES
(1, 'HTML5', '1234567', 'Prem', 2, 0, 1),
(2, 'HTML Learn', 'HTML111', 'pcsaini', 2, 0, 1),
(3, 'Quantum Physics', '123456789', 'pcsaini', 2, 0, 2),
(4, 'data str', '98875544', 'pcsaini', 2, 1, 3),
(5, 'CSS', '12345678', 'Prem', 2, 0, 4),
(6, 'php mysql', '554425', 'pcsaini', 1, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE IF NOT EXISTS `book_category` (
  `book_category_id` int(100) NOT NULL,
  `book_category_name` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`book_category_id`, `book_category_name`) VALUES
(1, 'HTML'),
(2, 'Physics'),
(3, 'Computer Science'),
(4, 'CSS'),
(5, 'C Programming');

-- --------------------------------------------------------

--
-- Table structure for table `book_code`
--

CREATE TABLE IF NOT EXISTS `book_code` (
  `book_id` int(100) NOT NULL,
  `book_category_id` int(10) NOT NULL,
  `book_code` varchar(32) NOT NULL,
  `register_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_code`
--

INSERT INTO `book_code` (`book_id`, `book_category_id`, `book_code`, `register_status`) VALUES
(1, 1, 'IIITV1232', 1),
(1, 1, 'IIITV123A', 1),
(1, 1, 'IIITV123B', 1),
(4, 3, 'IIITV123C', 0),
(3, 2, 'IIITV123p', 1),
(5, 4, 'IIITV123PAA', 1),
(2, 1, 'IIITV123PH', 1),
(6, 5, 'IIITVHT11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE IF NOT EXISTS `issue_book` (
  `user_id` int(100) NOT NULL,
  `book_id` int(100) NOT NULL,
  `book_code` varchar(32) NOT NULL,
  `issue_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `return_date` int(32) NOT NULL,
  `issue_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`user_id`, `book_id`, `book_code`, `issue_date`, `return_date`, `issue_status`) VALUES
(1, 1, 'IIITV123A', '2016-11-13 18:22:48', 0, 0),
(3, 3, 'IIITV123p', '2016-11-13 18:55:32', 0, 0),
(2, 5, 'IIITV123PAA', '2016-11-13 18:55:35', 0, 0),
(3, 1, 'IIITV123B', '2016-11-13 18:55:50', 0, 1),
(2, 2, 'IIITV123PH', '2016-11-13 18:55:51', 0, 1),
(1, 1, 'IIITV1232', '2016-11-13 18:55:52', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `register_book`
--

CREATE TABLE IF NOT EXISTS `register_book` (
  `user_id` int(100) NOT NULL,
  `book_id` int(100) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `register_status` int(10) DEFAULT NULL,
  `book_code` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_book`
--

INSERT INTO `register_book` (`user_id`, `book_id`, `register_date`, `register_status`, `book_code`) VALUES
(1, 1, '2016-11-13 18:15:29', 0, 'IIITV1232'),
(1, 1, '2016-11-13 18:15:35', 0, 'IIITV123A'),
(2, 5, '2016-11-13 18:54:39', 0, 'IIITV123PAA'),
(2, 2, '2016-11-13 18:54:44', 0, 'IIITV123PH'),
(3, 1, '2016-11-13 18:55:09', 0, 'IIITV123B'),
(3, 3, '2016-11-13 18:55:14', 0, 'IIITV123p'),
(3, 1, '2016-11-13 18:56:02', 1, 'IIITV123A'),
(1, 3, '2016-11-13 18:56:21', 1, 'IIITV123p'),
(2, 5, '2016-11-13 18:56:44', 1, 'IIITV123PAA');

-- --------------------------------------------------------

--
-- Table structure for table `return_book`
--

CREATE TABLE IF NOT EXISTS `return_book` (
  `user_id` int(100) NOT NULL,
  `book_id` int(100) NOT NULL,
  `book_code` varchar(32) NOT NULL,
  `issue_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `returned_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return_book`
--

INSERT INTO `return_book` (`user_id`, `book_id`, `book_code`, `issue_date`, `returned_date`) VALUES
(1, 1, 'IIITV123A', '2016-11-13 18:35:35', '2016-11-13 18:35:35'),
(2, 5, 'IIITV123PAA', '2016-11-13 18:55:45', '2016-11-13 18:55:45'),
(3, 3, 'IIITV123p', '2016-11-13 18:55:46', '2016-11-13 18:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(100) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact_number` bigint(20) DEFAULT NULL,
  `profile_pic` varchar(32) NOT NULL DEFAULT 'no-img.png',
  `address` varchar(100) NOT NULL,
  `batch` int(10) NOT NULL,
  `stream` varchar(32) NOT NULL,
  `registered_book` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `gender`, `contact_number`, `profile_pic`, `address`, `batch`, `stream`, `registered_book`) VALUES
(1, '201452019', '8075820b23d068e27198fa51ad94a56c', 'Prem Chand', 'Saini', '201452019@iiitvadodara.ac.in', 'Male', 9887554425, 'a97dac59.jpg', 'IIIT Vadodara', 2014, 'Information Technology', 2),
(2, '201452042', '2ced291583eec021ab9253e78a798a17', 'Anjali Kumari', 'Soni', '201452042@iiitvadodara.ac.in', 'Female', NULL, 'no-img.png', '', 2014, 'Information Technology', 2),
(3, '201452003', 'b9eb0c8c933996e2fdb3228b58806b72', 'Vishal Kumar', 'Raman', '201452003@iiitvadodara.ac.in', 'Male', NULL, 'no-img.png', '', 2014, 'Information Technology', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`book_category_id`);

--
-- Indexes for table `book_code`
--
ALTER TABLE `book_code`
  ADD PRIMARY KEY (`book_code`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`issue_date`);

--
-- Indexes for table `register_book`
--
ALTER TABLE `register_book`
  ADD PRIMARY KEY (`register_date`);

--
-- Indexes for table `return_book`
--
ALTER TABLE `return_book`
  ADD PRIMARY KEY (`returned_date`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `book_category`
--
ALTER TABLE `book_category`
  MODIFY `book_category_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
