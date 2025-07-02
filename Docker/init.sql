-- -- Added by Bilal
-- CREATE DATABASE IF NOT EXISTS ms-client-carfiy;
-- USE ms-client-carfiy

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2025 at 08:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ms-client-carfiy`
--

-- --------------------------------------------------------

--
-- Table structure for table `firebase`
--

CREATE TABLE `firebase` (
  `uid` int(10) UNSIGNED DEFAULT NULL,
  `localId` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(300) NOT NULL,
  `refreshToken` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `fiverr_data`
--

CREATE TABLE `fiverr_data` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `fiverr_id` varchar(300) NOT NULL,
  `fiverr_email` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `uid` int(10) UNSIGNED NOT NULL,
  `plan` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `vin` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `amount` mediumint(8) UNSIGNED DEFAULT NULL,
  `payment_status` tinyint(3) UNSIGNED NOT NULL,
  `payment_method` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Payment pending...',
  `payment_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `purchase_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `delivery_status` tinyint(3) UNSIGNED NOT NULL,
  `time` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(300) NOT NULL,
  `enc_key` varbinary(1000) DEFAULT NULL,
  `pass_hash` binary(32) DEFAULT NULL,
  `session_id` binary(32) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `credit` int(10) UNSIGNED DEFAULT 0,
  `registeration_time` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `firebase`
--
ALTER TABLE `firebase`
  ADD UNIQUE KEY `Local id firebase` (`localId`),
  ADD KEY `Firebase users` (`uid`);

--
-- Indexes for table `fiverr_data`
--
ALTER TABLE `fiverr_data`
  ADD KEY `Fiverr to orders` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `Payment id for orders` (`payment_id`,`purchase_id`),
  ADD KEY `Order users` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `Carfiy email system` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `firebase`
--
ALTER TABLE `firebase`
  ADD CONSTRAINT `Firebase users` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);

--
-- Constraints for table `fiverr_data`
--
ALTER TABLE `fiverr_data`
  ADD CONSTRAINT `Fiverr to orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `Order users` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
