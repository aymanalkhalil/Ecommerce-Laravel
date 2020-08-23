-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 23, 2020 at 04:39 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommmerce-laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `admin_password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_name`, `admin_email`, `email_verified_at`, `admin_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ayman', 'aymanalkhalil12@gmail.com', NULL, '$2y$10$/f/ZoEULHjDakwo6XHosn.gPmTDD5xxVvI/4Lcy5J02aGlPTBqYmm', NULL, '2020-06-27 23:00:26', '2020-06-27 23:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `category_image` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`, `created_at`, `updated_at`) VALUES
(2, 'Laptops', 'category-image-1593232403.jpeg', '2020-06-27 00:33:23', '2020-06-27 00:33:23'),
(3, 'Mobiles', 'category-image-1593232436.jpeg', '2020-06-27 00:33:56', '2020-06-27 00:33:56'),
(5, 'Televisions', 'category-image-1593239998.jpg', '2020-06-27 02:17:00', '2020-06-27 02:40:07'),
(8, 'Small Appliances', 'category-image-1595960329.jpeg', '2020-07-28 14:18:49', '2020-07-28 14:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_06_26_210727_create_categories_table', 1),
(4, '2020_06_26_210741_create_admins_table', 1),
(5, '2020_06_27_021036_create_products_table', 1),
(6, '2020_06_28_022849_create_admins_table', 2),
(7, '2020_06_28_023828_create_admins_table', 3),
(8, '2020_08_03_141612_add_mobile_no_columns_to_users_table', 4),
(9, '2020_08_14_175823_add_verified_column_to_users', 5),
(10, '2020_08_14_180450_create_verify_users_table', 5),
(11, '2020_08_14_181022_remove_email_verified', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prod_name` varchar(150) NOT NULL,
  `prod_price` varchar(150) NOT NULL,
  `prod_desc` text NOT NULL,
  `prod_image` varchar(150) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `prod_name`, `prod_price`, `prod_desc`, `prod_image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'MacBook Pro', '1000', 'Designed for those who defy limits and change the world, the new MacBook Pro is by far the most powerful notebook we’ve ever made. With an immersive 16-inch Retina display, superfast processors, next-generation graphics, the largest battery capacity ever in a MacBook Pro, a new Magic Keyboard, and massive storage, it’s the ultimate pro notebook for the ultimate user.', 'product-image-1593308165.jpeg', 2, '2020-06-27 04:23:27', '2020-06-27 21:36:05'),
(2, 'Iphone 11 PRO Max', '4500', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis velit minus pariatur alias, excepturi officiis molestiae cupiditate aut reiciendis. Animi?', 'product-image-1595946298.jpeg', 3, '2020-07-28 10:24:58', '2020-07-29 10:23:12'),
(3, 'test3', '9999', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis velit minus pariatur alias, excepturi officiis molestiae cupiditate aut reiciendis. Animi?', 'product-image-1595946754.jpeg', 2, '2020-07-28 10:32:34', '2020-07-28 10:38:50'),
(4, 'test2', '500', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis velit minus pariatur alias, excepturi officiis molestiae cupiditate aut reiciendis. Animi?', 'product-image-1595947039.jpeg', 5, '2020-07-28 10:37:19', '2020-07-28 10:38:44'),
(5, 'tv 50 inch', '800', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis velit minus pariatur alias, excepturi officiis molestiae cupiditate aut reiciendis. Animi?', 'product-image-1595947105.jpeg', 5, '2020-07-28 10:38:25', '2020-07-28 10:38:25'),
(6, 'test4', '1000', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis velit minus pariatur alias, excepturi officiis molestiae cupiditate aut reiciendis. Animi?', 'product-image-1595947168.jpeg', 2, '2020-07-28 10:39:28', '2020-07-28 10:39:28'),
(7, 'test5', '2500', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis velit minus pariatur alias, excepturi officiis molestiae cupiditate aut reiciendis. Animi?', 'product-image-1595947947.jpeg', 3, '2020-07-28 10:52:27', '2020-07-28 10:52:38'),
(8, 'DELL', '1200', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis velit minus pariatur alias, excepturi officiis molestiae cupiditate aut reiciendis. Animi?', 'product-image-1595948142.jpeg', 2, '2020-07-28 10:55:42', '2020-07-28 10:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `mobile_no`, `address`, `verified`, `created_at`, `updated_at`) VALUES
(29, 'ayman', 'aa@gmail.com', '$2y$10$3s2dW0sNmghmaUfl0J3ateS7PwNcqNYnjzG.N6XV8eL0aF494hy22', NULL, '1112222', 'Amman', 1, '2020-08-14 20:26:52', '2020-08-14 21:27:46'),
(30, 'ayman tariq alkhalil', 'test@tesddt.com', '$2y$10$YpRgzj6Z/TXGE.Modh5BqO9wo7898REez5bHNdZ.kL5lPyVSRM6Wa', NULL, '32312123123', 'oman,muscat', 1, '2020-08-14 20:58:52', '2020-08-14 21:23:04'),
(31, 'sa3di', 'sa3di@gmail.com', '$2y$10$MZwYhODJKMA1YNyMoX0xOuIBUyAeNbk/hLX.xulferrKBkm3cMEhq', NULL, '1234', 'amman', 1, '2020-08-15 14:43:28', '2020-08-15 18:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `verify_users`
--

CREATE TABLE `verify_users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `verify_users`
--

INSERT INTO `verify_users` (`user_id`, `token`, `created_at`, `updated_at`) VALUES
(29, '1a073eef6456d41ae20e593479629506bb69c39e', '2020-08-14 20:26:52', '2020-08-14 20:26:52'),
(30, 'f0a6c8104871a096a1d431354401670f558220f6', '2020-08-14 20:58:52', '2020-08-14 20:58:52'),
(31, '4268be3b2d587e33971ace895da3e6ab8bdb0d3d', '2020-08-15 14:43:28', '2020-08-15 14:43:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_admin_email_unique` (`admin_email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verify_users`
--
ALTER TABLE `verify_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `verify_users`
--
ALTER TABLE `verify_users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
