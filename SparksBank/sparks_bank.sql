-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 12:48 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparks_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(5) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `sender_acc_no` int(10) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `receiver_acc_no` int(10) NOT NULL,
  `amount` int(20) NOT NULL,
  `date_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `sender`, `sender_acc_no`, `receiver`, `receiver_acc_no`, `amount`, `date_time`) VALUES
(1, 'Deepthi', 1006, 'Anjali V R', 1001, 100, '2021-07-04 18:19:15'),
(2, 'Pratham', 1008, 'Sushanth', 1010, 3000, '2021-07-04 18:25:26'),
(3, 'Pratiksha', 1003, 'Hamsika', 1004, 500, '2021-07-04 18:27:10'),
(4, 'Anjali V R', 1001, 'Rakshit', 1005, 2100, '2021-07-04 18:29:19'),
(5, 'Ananya Shetty', 1009, 'Arjun S', 1002, 2000, '2021-07-04 18:31:03'),
(6, 'Rakshit', 1005, 'Sushanth', 1010, 100, '2021-07-04 18:32:53'),
(7, 'Sushanth', 1010, 'Ananya Shetty', 1009, 600, '2021-07-05 12:00:49'),
(8, 'Deepthi', 1006, 'Rakshit', 1005, 100, '2021-07-05 19:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `account_no` int(10) NOT NULL,
  `balance_amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `account_no`, `balance_amount`) VALUES
(1, 'Anjali V R', 'anjali@gmail.com', 1001, 48000),
(2, 'Arjun S', 'arjun@gmail.com', 1002, 37000),
(3, 'Pratiksha', 'pratiksha@gmail.com', 1003, 44500),
(4, 'Hamsika', 'hamsika@gmail.com', 1004, 26000),
(5, 'Rakshit', 'rakshit@gmail.com', 1005, 17100),
(6, 'Deepthi', 'deepthi@gmail.com', 1006, 59900),
(7, 'Gowtham', 'gowtham@gmail.com', 1007, 12500),
(8, 'Pratham', 'pratham@gmail.com', 1008, 60000),
(9, 'Ananya Shetty', 'ananya@gmail.com', 1009, 41600),
(10, 'Sushanth', 'sushanth@gmail.com', 1010, 30000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_no` (`account_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
