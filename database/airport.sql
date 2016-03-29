-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2016 at 05:49 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airport`
--

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE `airports` (
  `id` int(10) NOT NULL COMMENT 'id as a primary key',
  `airport_code` int(10) NOT NULL COMMENT 'this is unique integer field for the airport number or code',
  `airport_name` varchar(100) NOT NULL,
  `city` varchar(150) NOT NULL,
  `country` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated` varchar(100) NOT NULL,
  `added_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`id`, `airport_code`, `airport_name`, `city`, `country`, `user_id`, `deleted`, `updated`, `added_datetime`) VALUES
(1, 101, 'Gorgia Land Mark', 'LA', 'USA', 1, 0, '2016-03-28 04:03:19', '2016-03-28 17:12:11'),
(2, 102, 'Karachi Airport', 'Karachi', 'Pakistan', 2, 0, '', '2016-03-28 18:07:05'),
(3, 100, 'Gorgia Land Mark', 'LA', 'USA', 1, 0, '', '2016-03-28 20:02:07'),
(5, 103, 'Gorgia Land Mark', 'LA', 'USA', 1, 0, '', '2016-03-28 20:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `session` varchar(50) NOT NULL,
  `lastvisit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `session`, `lastvisit`, `role`) VALUES
(1, 'shahbaz-admin', '', '2016-03-28 17:09:53', 1),
(2, 'shahbaz-user', '', '2016-03-28 17:10:31', 2),
(3, 'shahbaz-guest', '', '2016-03-28 17:10:45', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `airport_code` (`airport_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airports`
--
ALTER TABLE `airports`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id as a primary key', AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
