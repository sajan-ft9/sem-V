-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2021 at 09:27 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `semfive`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Mobile', 'This category has mobile', '2021-06-10 13:01:30', '2021-06-10 13:01:30'),
(2, 'Laptop', 'This category has laptop', '2021-06-10 13:02:20', '2021-06-10 13:02:20'),
(3, 'Accessories', 'This category has mobile accessories', '2021-06-10 13:05:32', '2021-06-10 13:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_desc`, `image`, `old_price`, `category_id`, `created_at`, `updated_at`, `price`) VALUES
(1, 'blanditiis', 'Ea voluptatem reprehenderit similique ut nulla velit. Deleniti et doloribus dolorum itaque iure. Esse dolor expedita impedit. Qui debitis neque sint qui aut rerum perferendis dolores. Dolorem nobis ea praesentium voluptatum.', '', NULL, 1, '2021-06-10 13:02:20', '2021-06-10 13:02:20', '10000'),
(2, 'aut', 'Quia iusto dolor et officiis. Facilis dolorem voluptatem explicabo assumenda consequuntur velit. Dolor quod enim molestias tempora maiores molestiae officia.', '', NULL, 1, '2021-06-10 13:02:20', '2021-06-10 13:02:20', '10000'),
(3, 'ut', 'Autem ut assumenda perspiciatis iusto voluptatem quo. Quia voluptatum corporis nihil in ad. Quisquam odit doloribus autem ut velit consequatur. Consequatur laudantium expedita beatae blanditiis dignissimos illo et officia.', '', NULL, 1, '2021-06-10 13:02:20', '2021-06-10 13:02:20', '10000'),
(4, 'labore', 'Aspernatur vel blanditiis recusandae deserunt non nihil quia. Nihil id nihil harum sunt accusantium ad rem qui. Et accusamus quaerat et cupiditate doloribus molestiae.', '', NULL, 1, '2021-06-10 13:02:20', '2021-06-10 13:02:20', '10000'),
(5, 'ea', 'Earum temporibus et sed quisquam. Quaerat sint nulla voluptas fuga. Et nisi a est quae sed.', '', NULL, 1, '2021-06-10 13:02:20', '2021-06-10 13:02:20', '10000'),
(6, 'doloribus', 'Laborum sed error est hic quis aut voluptates. Et qui nobis nihil saepe dolor. Quo quos consectetur cumque illum expedita labore et amet. A aperiam dolor sunt et voluptatibus.', '', NULL, 2, '2021-06-10 13:05:32', '2021-06-10 13:05:32', '10000'),
(7, 'sit', 'Sit laboriosam odio dolorum provident eveniet aut vel. Vel non voluptas porro. Vero veniam ut molestias voluptatem qui fuga. Ipsum incidunt velit sunt.', '', NULL, 2, '2021-06-10 13:05:32', '2021-06-10 13:05:32', '10000'),
(8, 'molestias', 'Perspiciatis in libero non sunt nemo. Accusantium eligendi similique natus. Dolores laborum pariatur iure. Sapiente dicta architecto magnam.', '', NULL, 2, '2021-06-10 13:05:32', '2021-06-10 13:05:32', '10000'),
(9, 'aut', 'Et praesentium et vitae architecto molestiae. Et hic placeat vel iure harum sed consequuntur ullam. Quia repellendus ipsa est perferendis odio eos aut. Sit sit provident tenetur quidem explicabo temporibus libero.', '', NULL, 2, '2021-06-10 13:05:32', '2021-06-10 13:05:32', '10000'),
(10, 'reiciendis', 'Aut molestias facilis perferendis laborum. Dolores consequatur fugit quia amet. Necessitatibus qui dolores qui ut. Sunt voluptatem maxime velit laboriosam praesentium qui exercitationem.', '', NULL, 2, '2021-06-10 13:05:32', '2021-06-10 13:05:32', '10000'),
(11, 'tempora', 'Rerum asperiores aut odit quos corrupti delectus quod. Ea voluptatem dolor adipisci hic. Porro ea minus ex qui.', '', NULL, 3, '2021-06-10 13:06:20', '2021-06-10 13:06:20', '10000'),
(12, 'aliquid', 'Aspernatur magni est asperiores aspernatur aut et. Ut illum corporis laborum et est at cum ea. Consectetur laboriosam unde consequatur aliquid in ratione pariatur aliquid. Dicta et ipsum quo et.', '', NULL, 3, '2021-06-10 13:06:20', '2021-06-10 13:06:20', '10000'),
(13, 'possimus', 'Tenetur at illum repellendus alias aperiam. Enim corrupti odit voluptatem et dolore. Reiciendis dolorem maxime et qui minus corrupti laboriosam.', '', NULL, 3, '2021-06-10 13:06:20', '2021-06-10 13:06:20', '10000'),
(14, 'et', 'Sit illo hic natus necessitatibus. Dolores non et aut odio. Qui sed quasi quis rerum. Sequi voluptatem et dolores vel id sed molestias. Consequatur officia similique error aut molestiae accusamus qui.', '', NULL, 3, '2021-06-10 13:06:20', '2021-06-10 13:06:20', '10000'),
(15, 'aut', 'Dolorem autem aliquid ipsam atque. Dolorem fugit eveniet et dolorum ea at maiores. Animi dolores similique illo labore optio ut. Et aut et et ut vel deserunt.', '', NULL, 3, '2021-06-10 13:06:20', '2021-06-10 13:06:20', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `created_at`) VALUES
(1, 'Sajan Khadka', 'sajankhad1@gmail.com', '2021-06-23 12:29:51', 'sajan999', '2021-06-24 12:29:51'),
(2, 'Sajita Khadka', 'sajankhad2@gmail.com', '2021-06-23 12:29:51', 'sajan999', '2021-06-24 12:29:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
