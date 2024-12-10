-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 04:14 PM
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
-- Database: `happy_milk`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image_url`, `name`, `weight`, `price`) VALUES
(3, 'images/product3.jpg', 'Sữa đậu nành hữu cơ', 1000, 30.00),
(4, 'images/product4.jpg', 'Sữa hạnh nhân', 500, 40.00),
(5, 'images/product5.jpg', 'Sữa tươi ít béo', 1000, 28.50),
(6, 'images/product6.jpg', 'Sữa yến mạch', 1000, 35.00),
(7, 'images/product7.jpg', 'Sữa đặc có đường', 380, 20.00),
(8, 'images/product8.jpg', 'Sữa chua dâu', 200, 18.00),
(9, 'images/product9.jpg', 'Sữa tươi không đường', 500, 24.00),
(10, 'images/product10.jpg', 'Sữa chua việt quất', 200, 19.50),
(13, 'uploads/BookStrore_logo.png', 'dat2000', 213, 123.00),
(14, 'uploads/BookStrore_logo.png', 'dat2000', 123, 123.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
