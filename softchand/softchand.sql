-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2023 at 06:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softchand`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE `adminusers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `pro` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`id`, `username`, `email`, `mobile`, `pro`, `city`) VALUES
(1, 'Chandini Panigrahy', 'chand@gmail.com', '8887919632', '8', 'Lucknow'),
(2, 'Chandan Panigrahy', 'user@gmail.com', '8887919632', '6', 'mumbai'),
(3, 'Suraj Panigrahy', 'chandini@gmail.com', '8887919632', '10', 'navimumbai'),
(4, 'Suraj Vijaya', 'suraj@gmail.com', '4343346655', '14', 'mumbai'),
(5, 'Aditya Padhi', 'padhi@gmail.com', '4343348855', '20', 'mumbai'),
(6, 'Ramesh Panigrahy', 'admin@Gmail.com', '9966332255', '18', 'mumbai'),
(21, 'Mamata Panigrahy', 'mamata@gmail.com', '9988776655', '9', 'Mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'ANGULAR'),
(2, 'PHP'),
(3, 'HTML'),
(4, 'CSS'),
(5, 'JAVASCRIPT'),
(6, 'JQUERY'),
(7, 'SHEMATIC UI '),
(8, 'BOOTSTRAP');

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE `developers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `pro` varchar(20) NOT NULL,
  `procust` varchar(20) NOT NULL,
  `cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `developers`
--

INSERT INTO `developers` (`id`, `username`, `email`, `mobile`, `pro`, `procust`, `cat`) VALUES
(3, 'Chandini Panigrahy', 'crpanigrahy97@gmail.com', '9967054070', '50', '200', 2),
(4, 'Karishma Padhi', 'karishma@gmail.com', '9988776655', '35', '200', 2),
(5, 'Suraj Padhi', 'suraj@gmail.com', '99988877', '60', '100', 3),
(7, 'Ramesh Panda', 'ramesh@gmail.com', '9874563217', '70', '150', 6),
(8, 'Shreedhar Panigrahy', 'shr@gmail.com', '6655447788', '63', '150', 7),
(9, 'Kriyansh Sing', 'krish@gmail.com', '5566778899', '78', '200', 8),
(10, 'Sonam Tripathi', 'sonam@gmail.com', '5588996677', '90', '100', 3),
(11, 'OM Padhi', 'om@gmail.com', '5588226644', '50', '120', 1),
(12, 'Aditya Sahu', 'aditya@gmail.com', '6655889977', '53', '600', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `srno` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(23) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`srno`, `username`, `password`, `date`) VALUES
(1, 'admin', 'admin', '2023-07-09 00:23:54'),
(19, 'chand', 'chand', '2023-07-09 02:04:51'),
(20, '111', '111', '2023-07-09 02:12:26'),
(21, 'user', 'user@123', '2023-07-09 16:13:21'),
(22, 'user', 'user@123', '2023-07-09 16:15:02'),
(23, 'u', 'u', '2023-07-09 16:19:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_fk` (`cat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`srno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminusers`
--
ALTER TABLE `adminusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `developers`
--
ALTER TABLE `developers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `developers`
--
ALTER TABLE `developers`
  ADD CONSTRAINT `cat_fk` FOREIGN KEY (`cat`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
