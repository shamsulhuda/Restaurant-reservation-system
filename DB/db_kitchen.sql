-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2019 at 01:37 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kitchen`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(6, 'Breakfast', 'breakfast', '2019-11-07 13:22:17', '2019-11-07 13:22:17'),
(7, 'Special', 'special', '2019-11-07 13:22:35', '2019-11-07 13:22:35'),
(8, 'Desert', 'desert', '2019-11-07 13:22:53', '2019-11-07 13:22:53'),
(9, 'Dinner', 'dinner', '2019-11-07 13:23:07', '2019-11-07 13:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(2, 'shamsul huda', 'shamsulhuda310@gmail.com', 'Need a reservation', 'Message here........', '2019-11-09 08:18:28', '2019-11-09 08:18:28'),
(3, 'Alomgir Kabir', 'alomgirkabir@gmail.com', 'Request for home delivery', 'Hi there,\r\nCan you please give a home delivery with fresh Special dish tonight at 10 PM. I would be very grateful for that.\r\nSo, I waiting for home delivery.\r\nRegards,\r\nAlomgir\r\ncontact: 0198575498\r\nAddress: 1/A, 1 Mirpur-2, Dhaka-1216', '2019-11-13 04:22:09', '2019-11-13 04:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(4, 'Bread', 'bread', '2019-11-11 03:48:49', '2019-11-11 03:48:49'),
(5, 'Drinks', 'drinks', '2019-11-11 03:49:02', '2019-11-11 03:49:02'),
(6, 'Meat', 'meat', '2019-11-11 03:49:13', '2019-11-11 03:49:13'),
(7, 'Special', 'special', '2019-11-11 03:49:24', '2019-11-11 03:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `dishitems`
--

CREATE TABLE `dishitems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dish_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dishitems`
--

INSERT INTO `dishitems` (`id`, `dish_id`, `name`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
(3, 4, 'French Bread', 'Lorem Ipsum is simply dummying text of the printing and typesetting industry.', '80', 'french-bread-2019-11-11-5dc92f77643a4.jpg', '2019-11-11 03:52:55', '2019-11-11 03:52:55'),
(4, 4, 'Italian Bread', 'Italian breads are available here in our restuarent.', '48', 'italian-bread-2019-11-11-5dc92fda58f1f.png', '2019-11-11 03:54:34', '2019-11-11 03:54:34'),
(5, 4, 'Regular Bread', 'Most precious regular bread', '30', 'regular-bread-2019-11-11-5dc9300feb323.png', '2019-11-11 03:55:27', '2019-11-11 03:55:27'),
(6, 5, 'Regular Tea', 'We are very good at tea', '20', 'regular-tea-2019-11-11-5dc930a9e248d.jpg', '2019-11-11 03:58:01', '2019-11-11 03:58:01'),
(7, 5, 'Green tea', 'Green tea is available here', '50', 'green-tea-2019-11-11-5dc9310f486cc.jpg', '2019-11-11 03:59:43', '2019-11-11 03:59:43'),
(8, 5, 'Black coffee', 'Master of black coffee', '80', 'black-coffee-2019-11-11-5dc93223aa7b7.jpg', '2019-11-11 04:04:19', '2019-11-11 04:04:19'),
(9, 6, 'Bacon', 'Beast Bacon Ever you found', '250', 'bacon-2019-11-11-5dc932f240e27.jpg', '2019-11-11 04:07:46', '2019-11-11 04:07:46'),
(10, 6, 'Sausage', 'Sausage also available here for you.', '60', 'sausage-2019-11-11-5dc93373a6414.jpg', '2019-11-11 04:09:55', '2019-11-11 04:09:55'),
(11, 6, 'Chicken Balls', 'Yammy Chicken Balls', '350', 'chicken-balls-2019-11-11-5dc933c2819cd.png', '2019-11-11 04:11:14', '2019-11-11 04:11:14'),
(12, 7, 'Chicken Balls', 'Yammy Chicken Balls', '350', 'chicken-balls-2019-11-11-5dc934a6b1f48.png', '2019-11-11 04:15:02', '2019-11-11 04:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `category_id`, `name`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 9, 'Tomato curry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '120', 'tomato-curry-2019-11-07-5dc4753503d16.jpg', '2019-11-07 13:49:09', '2019-11-07 13:49:09'),
(2, 9, 'Chiken Dish', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '320', 'chiken-dish-2019-11-07-5dc47582f2e46.jpg', '2019-11-07 13:50:26', '2019-11-07 13:50:26'),
(3, 9, 'Speacial salad', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '60', 'speacial-salad-2019-11-07-5dc475a6d0081.jpg', '2019-11-07 13:51:02', '2019-11-07 13:51:02'),
(4, 8, 'Salad Dish', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '70', 'salad-dish-2019-11-07-5dc4760c5df66.jpg', '2019-11-07 13:52:44', '2019-11-07 13:52:44'),
(5, 8, 'Vegitable noodles', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '180', 'vegitable-noodles-2019-11-07-5dc4764a25c3c.jpg', '2019-11-07 13:53:46', '2019-11-07 13:53:46'),
(6, 8, 'Ice-cream', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '50', 'ice-cream-2019-11-07-5dc47686592a8.jpg', '2019-11-07 13:54:46', '2019-11-07 13:54:46'),
(7, 7, 'Prawn Dish', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '380', 'prawn-dish-2019-11-07-5dc47725db827.jpg', '2019-11-07 13:57:25', '2019-11-07 13:57:25'),
(8, 6, 'Vegitable Dish', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '350', 'vegitable-dish-2019-11-07-5dc4778a1caf7.jpg', '2019-11-07 13:59:06', '2019-11-07 13:59:06');

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
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_11_05_165914_create_sliders_table', 1),
(13, '2019_11_06_174826_create_categories_table', 1),
(14, '2019_11_07_040708_create_items_table', 1),
(15, '2019_11_08_054231_create_reservations_table', 2),
(16, '2019_11_09_091131_create_contacts_table', 3),
(17, '2019_11_10_095311_create_dishes_table', 4),
(19, '2019_11_10_122615_create_dishitems_table', 5),
(20, '2019_11_12_062731_create_sitegalleries_table', 6),
(21, '2019_11_12_092809_create_siteinformations_table', 7);

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
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_and_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `phone`, `email`, `date_and_time`, `message`, `status`, `created_at`, `updated_at`) VALUES
(6, 'shamsul huda', '01797703131', 'shamsulhuda310@gmail.com', '09 Nov 2019 - 09:00 PM', 'Here I\'m comming...', 1, '2019-11-09 01:47:20', '2019-11-10 12:40:24'),
(7, 'Rahim mia', '01387464823', 'rahim@d.com', '10 Nov 2019 - 02:20 AM', 'Message here...', 1, '2019-11-09 14:24:34', '2019-11-10 02:51:34'),
(8, 'Richman', '984759854', 'ras@gmail.com', '11 Nov 2019 - 09:00 AM', 'Hi there... idsfl gdf;lhg', 1, '2019-11-09 15:04:55', '2019-11-10 02:53:20'),
(9, 'Habib', '087564655345', 'habibrayan71@gmail.com', '11 Nov 2019 - 12:35 AM', 'tututut', 1, '2019-11-10 12:36:58', '2019-11-10 12:37:16'),
(10, 'Karim vau', '0183547387', 'habibrayan71@gmail.com', '12 Nov 2019 - 01:35 AM', 'description message', 1, '2019-11-10 12:43:35', '2019-11-10 12:44:00'),
(11, 'Habib', '0995843432', 'habibrayan71@gmail.com', '11 Nov 2019 - 12:45 AM', 'Hi there, i\'m comming', 1, '2019-11-10 12:47:57', '2019-11-10 12:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `sitegalleries`
--

CREATE TABLE `sitegalleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sitegalleries`
--

INSERT INTO `sitegalleries` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(2, 'About us', 'about-us-2019-11-12-5dca7a0a31789.jpg', '2019-11-12 03:23:22', '2019-11-12 03:23:22'),
(3, 'Our Beer', 'our-beer-2019-11-13-5dcbcee4504b0.png', '2019-11-12 05:03:22', '2019-11-13 03:37:40'),
(4, 'Our Bread', 'our-bread-2019-11-12-5dca94619f12e.png', '2019-11-12 05:15:45', '2019-11-12 05:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `siteinformations`
--

CREATE TABLE `siteinformations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siteinformations`
--

INSERT INTO `siteinformations` (`id`, `gallery_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 'Update Astronomy compels the soul to look upward, and leads us from this world to another. Curious that we spend more time congratulating people who have succeeded than encouraging people who have not. As we got further and further away, it [the Earth] diminished in size.\r\n\r\nbeautiful, warm, living object looked so fragile, so delicate, that if you touched it with a finger it would crumble and fall apart. Seeing this has to change a man. Where ignorance lurks, so too do the frontiers of discovery and imagination.', '2019-11-12 04:26:40', '2019-11-12 05:12:06'),
(4, 3, 'Astronomy compels the soul to look upward, and leads us from this world to another. Curious that we spend more time congratulating people who have succeeded than encouraging people who have not. As we got further and further away, it [the Earth] diminished in size.\r\n\r\nbeautiful, warm, living object looked so fragile, so delicate, that if you touched it with a finger it would crumble and fall apart. Seeing this has to change a man. Where ignorance lurks, so too do the frontiers of discovery and imagination.Astronomy compels the soul to look upward, and leads us from this world to another. Curious that we spend more time congratulating people who have succeeded than encouraging people who have not. As we got further and further away, it [the Earth] diminished in size.', '2019-11-12 05:14:51', '2019-11-12 05:14:51'),
(5, 4, 'Astronomy compels the soul to look upward, and leads us from this world to another. Curious that we spend more time congratulating people who have succeeded than encouraging people who have not. As we got further and further away, it [the Earth] diminished in size.\r\n\r\nbeautiful, warm, living object looked so fragile, so delicate, that if you touched it with a finger it would crumble and fall apart. Seeing this has to change a man. Where ignorance lurks, so too do the frontiers of discovery and imagination.', '2019-11-12 05:18:14', '2019-11-12 05:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `sub_title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Dinner Special', 'our dinner food collections', 'dinner-special-2019-11-07-5dc3f38b60bbb.jpg', '2019-11-07 04:35:55', '2019-11-07 04:35:55'),
(2, 'Morning Snacks', 'Morning snacks speacials', 'morning-snacks-2019-11-07-5dc3f3d01f0a3.jpg', '2019-11-07 04:37:04', '2019-11-07 04:37:04'),
(3, 'Lunch Speacials', 'Speacials for lunch collections', 'lunch-speacials-2019-11-07-5dc3f4032c697.jpg', '2019-11-07 04:37:55', '2019-11-07 04:37:55');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'shamsul huda', 'shamsulhuda310@gmail.com', NULL, '$2y$10$cC5PlhzrueWrFvlH8.ZmeuxiESoinWzRG.1wpivw3g9JWkOhHzF6K', NULL, '2019-11-07 04:09:00', '2019-11-07 04:09:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dishitems`
--
ALTER TABLE `dishitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dishitems_dish_id_foreign` (`dish_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_category_id_foreign` (`category_id`);

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
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitegalleries`
--
ALTER TABLE `sitegalleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siteinformations`
--
ALTER TABLE `siteinformations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siteinformations_gallery_id_foreign` (`gallery_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dishitems`
--
ALTER TABLE `dishitems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sitegalleries`
--
ALTER TABLE `sitegalleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siteinformations`
--
ALTER TABLE `siteinformations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dishitems`
--
ALTER TABLE `dishitems`
  ADD CONSTRAINT `dishitems_dish_id_foreign` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siteinformations`
--
ALTER TABLE `siteinformations`
  ADD CONSTRAINT `siteinformations_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `sitegalleries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
