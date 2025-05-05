-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2025 at 05:01 PM
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
-- Database: `gaming_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `price`, `stock`, `image`) VALUES
(1, 'Logitech G502 Gaming Mouse', 'Cost-efficient gaming mouse with adjustable DPI.', 44.99, 40, 'logitech-mouse.jpg'),
(2, 'HyperX Cloud III', 'Wireless noise-cancelling headphones.', 89.99, 20, 'hyperx-cloud-3.jpg'),
(4, 'SCUF ENVISION Wireless Controller', 'PC Gaming Controller with five remappable keys.', 152.99, 11, 'controller1.jpg'),
(5, 'SCUF INSTINCT Pro Controller', 'More comfortable, functional and professional with a series of designs to choose from.', 249.99, 8, 'controller2.jpg'),
(6, 'SCUF Charging Cable', 'Our universally compatible braided charging cables, optimized for gaming.', 9.99, 35, 'cable.jpg'),
(7, 'Mouse Mat', 'Ergonomic mouse mat with support for wrist.', 6.99, 50, 'mat.jpg'),
(8, 'Keyboard (Coca-Cola Collaboration)', 'Slim mechanical keyboard, in collaboration with Coca-Cola.', 64.99, 14, 'keyboard.jpg'),
(9, 'SCUF Valor Pro Controller', 'Affordable and functional gaming controller.', 55.99, 27, 'controller3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
pgaming_storeproductsproductsroducts