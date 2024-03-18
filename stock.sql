-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 07:42 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `unit_price` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `prod_name`, `user_id`, `quantity`, `unit_price`, `total`, `created_at`, `updated_at`) VALUES
(19, 'isombe', 20, '10', '100', '1000', '2024-01-30', '2024-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `product_supplier`
--

CREATE TABLE `product_supplier` (
  `id` int(11) NOT NULL,
  `supplier` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `quantity_ordered` int(11) NOT NULL,
  `quantity_received` int(11) NOT NULL,
  `quantity_remaining` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock_out`
--

CREATE TABLE `stock_out` (
  `id` int(11) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `total` varchar(200) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_out`
--

INSERT INTO `stock_out` (`id`, `pro_name`, `quantity`, `total`, `created_at`) VALUES
(1, '', '18', '18000', '2024-01-30'),
(2, 'isombe', '96', '96000', '2024-01-30'),
(3, 'isombe', '92', '92000', '2024-01-30'),
(4, 'isombe', '1', '91000', '2024-01-30'),
(5, 'isombe', '1', '90000', '2024-01-30'),
(6, 'isombe', '1', '1000', '2024-01-30'),
(7, 'isombe', '2', '200', '2024-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_location` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `supplier_location`, `email`, `created_by`, `created_at`, `updated_at`) VALUES
(4, 'eric', ' kayonza', 'er@gmail.com', 20, '2024-01-30', '2024-01-30'),
(5, 'we', ' qeqw', 'qwjdojdjqdo@gmail.com', 20, '2024-01-10', '2024-01-28'),
(6, 'we', ' qeqw', 'wertyutrgdfs@gmail.com', 20, '2024-01-01', '2024-01-30'),
(7, 'we', ' qeqw', 'wertyutrgdfs@gmail.com', 20, '2024-01-30', '2024-01-28'),
(8, '', ' ', 'rttyyfyyftyfyftft@gmail.com', 20, '2024-01-30', '2024-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `username`, `password`, `created_at`, `updated_at`) VALUES
(20, 'nizeyimana', 'eric', 'ericnizeyimana435@gmail.com', 'umuntu', '321', '2024-01-15 09:30:00', '2024-01-25 09:30:00'),
(21, 'honore', 'shema', 'qwertyu@gmail.com', 'eric', 'eric', '2024-01-23 16:32:00', '2024-01-24 16:32:00'),
(22, 'pasi', 'byuku', 'wertyutrgdfs@gmail.com', 'sam', '1', '2024-01-24 10:34:00', '2024-01-24 10:34:00'),
(23, 'SILVA', 'SIL', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'nizeyimana', 'eric', 'ericnizeyimana435@gmail.com', 'SILVA', 'SILVA', '2024-01-24 12:06:00', '2024-01-24 12:06:00'),
(25, 'mbarushimana', ' gad', 'rttyyfyyftyfyftft@gmail.com', 'umuntu', '', '2024-01-30 00:00:00', '2024-01-30 00:00:00'),
(26, 'hitiman', ' samuel', 'wertyutrgdfs@gmail.com', 'sam', '12', '2024-01-30 00:00:00', '2024-01-30 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1` (`user_id`);

--
-- Indexes for table `product_supplier`
--
ALTER TABLE `product_supplier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk2` (`created_by`),
  ADD KEY `fk7` (`product`),
  ADD KEY `fk8` (`supplier`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk3` (`created_by`),
  ADD KEY `fk5` (`product_id`);

--
-- Indexes for table `stock_out`
--
ALTER TABLE `stock_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk4` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_supplier`
--
ALTER TABLE `product_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_out`
--
ALTER TABLE `stock_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_supplier`
--
ALTER TABLE `product_supplier`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk7` FOREIGN KEY (`product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk8` FOREIGN KEY (`supplier`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_5` FOREIGN KEY (`id`) REFERENCES `products` (`id`);

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
