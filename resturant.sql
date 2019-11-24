-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2019 at 04:01 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resturant`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2019-11-23 15:28:19', '2019-11-23 15:29:46', '2019-11-23 15:29:46'),
(2, 1, '2019-11-23 15:30:16', '2019-11-23 15:30:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories_translations`
--

CREATE TABLE `categories_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories_translations`
--

INSERT INTO `categories_translations` (`id`, `category_id`, `name`, `locale`) VALUES
(1, 1, 'meet', 'en'),
(2, 1, 'لحوم', 'ar'),
(3, 2, 'meet', 'en'),
(4, 2, 'لحوم', 'ar');

-- --------------------------------------------------------

--
-- Table structure for table `coupones`
--

CREATE TABLE `coupones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupones`
--

INSERT INTO `coupones` (`id`, `title`, `code`, `value`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'first', 'MMAAXX', 50, 1, '2019-11-23 20:09:09', '2019-11-23 20:11:37', '2019-11-23 20:11:37'),
(2, 'first', 'XXCCVV', 50, 1, '2019-11-23 20:12:55', '2019-11-23 20:12:55', NULL),
(4, 'first', 'MMIINN', 50, 1, '2019-11-24 11:13:06', '2019-11-24 11:59:15', '2019-11-24 11:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_13_151710_create_products_table', 1),
(4, '2019_04_17_145935_create_categories_table', 1),
(5, '2019_05_06_103634_create_orders_table', 1),
(6, '2019_05_06_105155_create_order_products_table', 1),
(7, '2019_07_13_184652_create_coupones_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` double(8,2) NOT NULL,
  `long` double(8,2) NOT NULL,
  `code` int(10) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `phone`, `address`, `lat`, `long`, `code`, `status`, `total_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1021221211, 'masged elsalhin -sha2et l zohor', 22.23, 22.23, NULL, 1, 1800, '2019-11-24 11:30:32', '2019-11-24 11:30:32', NULL),
(3, 1021221211, 'masged elsalhin -sha2et l zohor', 22.23, 22.23, NULL, 1, 1800, '2019-11-24 11:30:51', '2019-11-24 11:30:51', NULL),
(4, 1021221211, 'masged elsalhin -sha2et l zohor', 22.23, 22.23, NULL, 1, 1800, '2019-11-24 11:32:06', '2019-11-24 11:32:06', NULL),
(5, 1021221211, 'masged elsalhin -sha2et l zohor', 22.23, 22.23, NULL, 1, 1800, '2019-11-24 11:32:39', '2019-11-24 11:32:39', NULL),
(6, 1021221211, 'masged elsalhin -sha2et l zohor', 22.23, 22.23, NULL, 1, 900, '2019-11-24 11:33:16', '2019-11-24 11:33:17', NULL),
(7, 1021221211, 'masged elsalhin -sha2et l zohor', 22.23, 22.23, NULL, 1, 900, '2019-11-24 11:33:41', '2019-11-24 11:33:42', NULL),
(8, 1021221211, 'masged elsalhin -sha2et l zohor', 22.23, 22.23, NULL, 1, 1800, '2019-11-24 11:34:34', '2019-11-24 11:34:34', NULL),
(9, 1021221211, 'masged elsalhin -sha2et l zohor', 22.23, 22.23, NULL, 1, 1800, '2019-11-24 11:34:38', '2019-11-24 11:34:38', NULL),
(10, 1021221211, 'masged elsalhin -sha2et l zohor', 22.23, 22.23, NULL, 1, 1800, '2019-11-24 11:35:11', '2019-11-24 11:35:11', NULL),
(11, 1021221211, 'masged elsalhin -sha2et l zohor', 22.23, 22.23, NULL, 1, 1800, '2019-11-24 11:35:38', '2019-11-24 11:35:38', NULL),
(12, 1021221211, 'masged elsalhin -sha2et l zohor', 22.23, 22.23, NULL, 1, 1800, '2019-11-24 11:37:02', '2019-11-24 11:37:02', NULL),
(13, 1021221211, 'masged elsalhin -sha2et l zohor', 22.23, 22.23, NULL, 1, 1800, '2019-11-24 11:37:09', '2019-11-24 11:37:10', NULL),
(14, 1021221211, 'masged elsalhin -sha2et l zohor', 22.23, 22.23, NULL, 1, 1800, '2019-11-24 11:38:44', '2019-11-24 11:38:44', NULL),
(15, 1021221211, 'masged elsalhin -sha2et l zohor', 22.23, 22.23, NULL, 1, 1800, '2019-11-24 11:38:46', '2019-11-24 11:38:46', NULL),
(16, 1021221211, 'masged elsalhin -sha2et l zohor', 22.23, 22.23, NULL, 1, 1800, '2019-11-24 11:42:03', '2019-11-24 11:42:03', NULL),
(17, 1021221211, 'xx elsalhin -sha2et l zohor', 22.23, 22.23, NULL, 1, 1800, '2019-11-24 11:49:09', '2019-11-24 11:49:10', NULL),
(18, 1021221211, 'xx elsalhin -sha2et l zohor', 22.23, 22.23, NULL, 1, 1800, '2019-11-24 11:58:19', '2019-11-24 11:58:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `quantity` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `category_id`, `price`, `quantity`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 2, 1, 1, 200, 3, 600, '2019-11-24 11:30:32', '2019-11-24 11:30:32', NULL),
(4, 2, 2, 2, 300, 4, 1200, '2019-11-24 11:30:32', '2019-11-24 11:30:32', NULL),
(5, 3, 1, 1, 200, 3, 600, '2019-11-24 11:30:51', '2019-11-24 11:30:51', NULL),
(6, 3, 2, 2, 300, 4, 1200, '2019-11-24 11:30:51', '2019-11-24 11:30:51', NULL),
(7, 4, 1, 1, 200, 3, 600, '2019-11-24 11:32:06', '2019-11-24 11:32:06', NULL),
(8, 4, 2, 2, 300, 4, 1200, '2019-11-24 11:32:06', '2019-11-24 11:32:06', NULL),
(9, 5, 1, 1, 200, 3, 600, '2019-11-24 11:32:39', '2019-11-24 11:32:39', NULL),
(10, 5, 2, 2, 300, 4, 1200, '2019-11-24 11:32:39', '2019-11-24 11:32:39', NULL),
(11, 6, 1, 1, 200, 3, 600, '2019-11-24 11:33:16', '2019-11-24 11:33:16', NULL),
(12, 6, 2, 2, 300, 4, 1200, '2019-11-24 11:33:17', '2019-11-24 11:33:17', NULL),
(13, 7, 1, 1, 200, 3, 600, '2019-11-24 11:33:42', '2019-11-24 11:33:42', NULL),
(14, 7, 2, 2, 300, 4, 1200, '2019-11-24 11:33:42', '2019-11-24 11:33:42', NULL),
(15, 8, 1, 1, 200, 3, 600, '2019-11-24 11:34:34', '2019-11-24 11:34:34', NULL),
(16, 8, 2, 2, 300, 4, 1200, '2019-11-24 11:34:34', '2019-11-24 11:34:34', NULL),
(17, 9, 1, 1, 200, 3, 600, '2019-11-24 11:34:38', '2019-11-24 11:34:38', NULL),
(18, 9, 2, 2, 300, 4, 1200, '2019-11-24 11:34:38', '2019-11-24 11:34:38', NULL),
(19, 10, 1, 1, 200, 3, 600, '2019-11-24 11:35:11', '2019-11-24 11:35:11', NULL),
(20, 10, 2, 2, 300, 4, 1200, '2019-11-24 11:35:11', '2019-11-24 11:35:11', NULL),
(21, 11, 1, 1, 200, 3, 600, '2019-11-24 11:35:38', '2019-11-24 11:35:38', NULL),
(22, 11, 2, 2, 300, 4, 1200, '2019-11-24 11:35:38', '2019-11-24 11:35:38', NULL),
(23, 12, 1, 1, 200, 3, 600, '2019-11-24 11:37:02', '2019-11-24 11:37:02', NULL),
(24, 12, 2, 2, 300, 4, 1200, '2019-11-24 11:37:02', '2019-11-24 11:37:02', NULL),
(25, 13, 1, 1, 200, 3, 600, '2019-11-24 11:37:09', '2019-11-24 11:37:09', NULL),
(26, 13, 2, 2, 300, 4, 1200, '2019-11-24 11:37:10', '2019-11-24 11:37:10', NULL),
(27, 14, 1, 1, 200, 3, 600, '2019-11-24 11:38:44', '2019-11-24 11:38:44', NULL),
(28, 14, 2, 2, 300, 4, 1200, '2019-11-24 11:38:44', '2019-11-24 11:38:44', NULL),
(29, 15, 1, 1, 200, 3, 600, '2019-11-24 11:38:46', '2019-11-24 11:38:46', NULL),
(30, 15, 2, 2, 300, 4, 1200, '2019-11-24 11:38:46', '2019-11-24 11:38:46', NULL),
(31, 16, 1, 1, 200, 3, 600, '2019-11-24 11:42:03', '2019-11-24 11:42:03', NULL),
(32, 16, 2, 2, 300, 4, 1200, '2019-11-24 11:42:03', '2019-11-24 11:42:03', NULL),
(33, 17, 1, 1, 200, 3, 600, '2019-11-24 11:49:09', '2019-11-24 11:49:09', NULL),
(34, 17, 2, 2, 300, 4, 1200, '2019-11-24 11:49:09', '2019-11-24 11:49:09', NULL),
(35, 18, 1, 1, 200, 3, 600, '2019-11-24 11:58:20', '2019-11-24 11:58:20', NULL),
(36, 18, 2, 2, 300, 4, 1200, '2019-11-24 11:58:20', '2019-11-24 11:58:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `image`, `price`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '/assets/uploads/product_image/2019/11/23/201911231722241900179262_product_image.jpeg', 200, 1, '2019-11-23 15:22:24', '2019-11-23 15:23:10', '2019-11-23 15:23:10'),
(2, 1, '/assets/uploads/product_image/2019/11/23/20191123172346410174851_product_image.jpeg', 300, 0, '2019-11-23 15:23:46', '2019-11-23 15:23:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_translations`
--

CREATE TABLE `products_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_translations`
--

INSERT INTO `products_translations` (`id`, `product_id`, `name`, `description`, `locale`) VALUES
(1, 1, 'kaboria', 'aslyyyyyyyyyyy', 'en'),
(2, 1, 'كابوريا', 'اصلىىىى', 'ar'),
(3, 2, 'kaboria', 'aslyyyyyyyyyyy', 'en'),
(4, 2, 'كابوريا', 'اصلىىىى', 'ar');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_translations`
--
ALTER TABLE `categories_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_translations_category_id_locale_unique` (`category_id`,`locale`),
  ADD KEY `categories_translations_locale_index` (`locale`);

--
-- Indexes for table `coupones`
--
ALTER TABLE `coupones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupones_code_unique` (`code`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_translations`
--
ALTER TABLE `products_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_translations_product_id_locale_unique` (`product_id`,`locale`),
  ADD KEY `products_translations_locale_index` (`locale`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories_translations`
--
ALTER TABLE `categories_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `coupones`
--
ALTER TABLE `coupones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products_translations`
--
ALTER TABLE `products_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
