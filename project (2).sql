-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2021 at 11:58 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `otp`) VALUES
(1, 'admin', '$2y$10$mRCVWIuN/Gr.7bxIzqzsLuLgAid61dGCBiHqWqVohzwrzKpDTE.LO', 'sajankhad2@gmail.com', 235336);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `customer_id`, `qty`) VALUES
(1, 32, 1, 1),
(2, 32, 1, 5),
(3, 36, 1, 3),
(4, 35, 1, 1),
(5, 32, 2, 5),
(6, 32, 2, 1),
(7, 32, 1, 1),
(8, 37, 14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ct_id` bigint(20) NOT NULL,
  `ct_name` varchar(255) NOT NULL,
  `ct_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ct_id`, `ct_name`, `ct_desc`) VALUES
(16, 'Rice Cooker', 'Contains rice cooker of various brands.'),
(18, 'IRON', 'Contains irons of various brands.'),
(20, 'MIXER-Grinder', 'Contains mixer and grinders of various brands.');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `login_type` varchar(255) NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `email`, `password`, `name`, `login_type`, `contact`) VALUES
(1, 'sajankhad1@gmail.com', '$2y$10$obEmTRHHjTWJkE1LlZgxve25CWsYfGkB4ZRLZU11tpV.DnO1VZMP2', 'Ryan Jordan', 'custom', '9865284390'),
(2, 'sajankhad2@gmail.com', '$2y$10$FpxO1WJqz6qGttqdjbzlAebXjvzhKrrZi3Ua3bWOcGFb0IGPipBP.', 'Sajan Khadka', 'custom', '9865284390'),
(14, 'store.homeappliance@gmail.com', 'qwertyuiop', 'Home Appliance Store', 'gmail', '5435643534');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pr_id` bigint(20) NOT NULL,
  `pr_name` varchar(255) NOT NULL,
  `pr_desc` varchar(255) NOT NULL,
  `pr_img` varchar(255) NOT NULL,
  `pr_price` decimal(10,2) NOT NULL,
  `pr_qty` int(10) NOT NULL,
  `cat_id` bigint(20) NOT NULL,
  `pr_brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pr_id`, `pr_name`, `pr_desc`, `pr_img`, `pr_price`, `pr_qty`, `cat_id`, `pr_brand`) VALUES
(31, 'PinkFloyd', 'Rice Cooker 220V-50Hz 2.8Ltr', '6173bcebd767c1.23250235.png', '3743.00', 10, 16, 'Baltra'),
(32, 'Cuckoo', 'Cuckoo Rice cooker 3ltrs', '61739377739746.47834196.png', '4000.00', 20, 16, 'Cucckooo'),
(33, 'Pigeon Cooker', 'Volume: 2Ltrs\r\nVoltage: 220V - 50Hz.', '617395003043b8.09776234.jpg', '2578.00', 34, 16, 'Pigeon'),
(34, 'Multi Mixture', 'Grinder Mixture with 3 different sizes of mixture cups.', '61739582043542.02911359.png', '2500.00', 23, 20, 'Bajaj'),
(35, 'Havels Mixture', 'Warranty: 1 yrs warranty\r\nVoltge: 220V - 50Hz\r\n\r\n\r\n', '61739622039b99.48772257.jpg', '1400.00', 23, 20, 'Havels'),
(36, 'Iron', 'Usha Iron \r\nRating: 1500W', '617396be7e1ba5.55034550.jpg', '2000.00', 3, 18, 'Usha'),
(37, 'Matte Iron', 'Color : Matte Black\r\nRating : 2000W\r\nWarranty : 1yrs', '61739715329be7.18514449.jpeg', '3000.00', 4, 18, 'Usha');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` bigint(20) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `rate_points` int(1) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `product_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `customer_id`, `rate_points`, `feedback`, `product_id`) VALUES
(1, 1, 5, 'This shit is good', 32),
(2, 2, 4, 'Excellent product', 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pr_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ct_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pr_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`ct_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
