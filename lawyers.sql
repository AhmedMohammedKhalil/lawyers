-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2022 at 08:38 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lawyers`
--
CREATE DATABASE IF NOT EXISTS `lawyers` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `lawyers`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `image`, `created_at`, `updated_at`) VALUES
(1, 'الأدمن', 'admin@lawyers.com', '$2y$10$WLSAB2reolOlDCSKBA1RaumByy6tTCfHXXSphMKaySPUccn37RrYS', NULL, '2022-04-14 15:18:12', '2022-04-14 15:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `book_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'wait',
  `lawyer_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bookings_lawyer_id_foreign` (`lawyer_id`),
  KEY `bookings_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consulations`
--

DROP TABLE IF EXISTS `consulations`;
CREATE TABLE IF NOT EXISTS `consulations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `lawyer_id` int(10) UNSIGNED NOT NULL,
  `spec_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `consulations_user_id_foreign` (`user_id`),
  KEY `consulations_lawyer_id_foreign` (`lawyer_id`),
  KEY `consulations_spec_id_foreign` (`spec_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consulations`
--

INSERT INTO `consulations` (`id`, `details`, `user_id`, `lawyer_id`, `spec_id`, `created_at`, `updated_at`) VALUES
(5, 'اريد استشارة قانونية خاصة بالقانون الزراعى', 1, 4, 7, '2022-04-30 01:38:27', '2022-04-30 01:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `lawyers`
--

DROP TABLE IF EXISTS `lawyers`;
CREATE TABLE IF NOT EXISTS `lawyers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lawyers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawyers`
--

INSERT INTO `lawyers` (`id`, `name`, `email`, `password`, `phone`, `gender`, `job_title`, `image`, `address`, `created_at`, `updated_at`) VALUES
(3, 'فهد العميرى', 'fahd@gmail.com', '$2y$10$d1p3cG7x.0ioA3yIWWGTeubki4x5TrHHnFuJKxVipM0UCEcat5GC6', '69532581', 'ذكر', 'محامى', NULL, 'الكويت', '2022-04-14 19:10:23', '2022-04-16 07:11:31'),
(4, 'طلال عبدالله', 'talal@gmail.com', '$2y$10$d1p3cG7x.0ioA3yIWWGTeubki4x5TrHHnFuJKxVipM0UCEcat5GC6', '65932514', 'ذكر', 'محامى', NULL, 'الجهراء', '2022-04-14 19:10:23', '2022-04-14 20:25:22'),
(5, 'حمد العنيزى', 'hamad@gmail.com', '$2y$10$d1p3cG7x.0ioA3yIWWGTeubki4x5TrHHnFuJKxVipM0UCEcat5GC6', '69538451', 'ذكر', 'محامى', NULL, 'صبية', '2022-04-14 19:10:23', '2022-04-14 20:25:22'),
(6, 'سلمان السويلم', 'salman@gmail.com', '$2y$10$d1p3cG7x.0ioA3yIWWGTeubki4x5TrHHnFuJKxVipM0UCEcat5GC6', '69532145', 'ذكر', 'محامى', NULL, 'الفحيحيل', '2022-04-14 19:10:23', '2022-04-14 20:25:22');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_specializations`
--

DROP TABLE IF EXISTS `lawyer_specializations`;
CREATE TABLE IF NOT EXISTS `lawyer_specializations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lawyer_id` int(10) UNSIGNED NOT NULL,
  `spec_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lawyer_specializations_lawyer_id_foreign` (`lawyer_id`),
  KEY `lawyer_specializations_spec_id_foreign` (`spec_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawyer_specializations`
--

INSERT INTO `lawyer_specializations` (`id`, `lawyer_id`, `spec_id`, `created_at`, `updated_at`) VALUES
(1, 3, 6, '2022-04-14 19:10:23', '2022-04-14 19:10:23'),
(3, 4, 7, '2022-04-15 19:40:42', '2022-04-15 19:40:42'),
(4, 5, 5, '2022-04-15 19:40:42', '2022-04-15 19:40:42'),
(5, 6, 8, '2022-04-15 19:40:42', '2022-04-15 19:40:42'),
(6, 3, 5, '2022-04-16 07:11:31', '2022-04-16 07:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_04_07_011220_create_specializations_table', 1),
(4, '2022_04_07_011234_create_admins_table', 1),
(5, '2022_04_07_011302_create_lawyers_table', 1),
(6, '2022_04_07_011328_create_services_table', 1),
(7, '2022_04_07_011425_create_consulations_table', 1),
(8, '2022_04_07_011632_create_replies_table', 1),
(9, '2022_04_07_012023_create_bookings_table', 1),
(10, '2022_04_07_012039_create_rates_table', 1),
(11, '2022_04_14_165638_create_lawyer_specializations_table', 1),
(12, '2022_04_29_220458_create_notifications_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `read_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `lawyer_id` int(10) UNSIGNED DEFAULT NULL,
  `auth_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_user_id_foreign` (`user_id`),
  KEY `notifications_lawyer_id_foreign` (`lawyer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `data`, `read_at`, `user_id`, `lawyer_id`, `auth_type`, `created_at`, `updated_at`) VALUES
(8, 'cosulation', '{\"consulations\":{\"details\":\"\\u0627\\u0631\\u064A\\u062F \\u0627\\u0633\\u062A\\u0634\\u0627\\u0631\\u0629 \\u0642\\u0627\\u0646\\u0648\\u0646\\u064A\\u0629 \\u062E\\u0627\\u0635\\u0629 \\u0628\\u0627\\u0644\\u0642\\u0627\\u0646\\u0648\\u0646 \\u0627\\u0644\\u0632\\u0631\\u0627\\u0639\\u0649\",\"spec_id\":\"7\",\"lawyer_id\":4,\"user_id\":1,\"updated_at\":\"2022-04-30T00:38:27.000000Z\",\"created_at\":\"2022-04-30T00:38:27.000000Z\",\"id\":5},\"cons_id\":5}', NULL, NULL, 4, 'lawyer', '2022-04-30 01:38:27', '2022-04-30 01:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

DROP TABLE IF EXISTS `rates`;
CREATE TABLE IF NOT EXISTS `rates` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rate` double NOT NULL,
  `lawyer_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rates_lawyer_id_foreign` (`lawyer_id`),
  KEY `rates_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `rate`, `lawyer_id`, `user_id`, `created_at`, `updated_at`) VALUES
(48, 4, 3, 1, '2022-04-27 06:37:37', '2022-04-27 06:37:37'),
(49, 3, 4, 1, '2022-04-29 01:02:09', '2022-04-29 01:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
CREATE TABLE IF NOT EXISTS `replies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reply_id` int(11) NOT NULL,
  `reply_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cons_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `replies_cons_id_foreign` (`cons_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `spec_id` int(10) UNSIGNED NOT NULL,
  `lawyer_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_spec_id_foreign` (`spec_id`),
  KEY `services_lawyer_id_foreign` (`lawyer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `details`, `spec_id`, `lawyer_id`, `created_at`, `updated_at`) VALUES
(7, 'خدمة 1', 'كل ما يتعلق بقانون علاقات العمل', 5, 5, '2022-05-03 18:32:23', '2022-05-03 18:32:23'),
(8, 'خدمة 1', 'كل ما يتعلق بالقانون الإدارى', 6, 3, '2022-05-03 18:32:23', '2022-05-03 18:32:23'),
(9, 'خدمة 1', 'كل ما يتعلق بقانون الزراعى', 7, 4, '2022-05-03 18:32:23', '2022-05-03 18:32:23'),
(10, 'خدمة 1', 'كل ما يتعلق بالقانون العام', 8, 6, '2022-05-03 18:32:23', '2022-05-03 18:32:23');

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

DROP TABLE IF EXISTS `specializations`;
CREATE TABLE IF NOT EXISTS `specializations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `title`, `created_at`, `updated_at`) VALUES
(5, 'علاقات العمل والتأمينات الإجتماعية', '2022-04-14 16:44:17', '2022-04-14 16:44:17'),
(6, 'القانون الإدارى', '2022-04-14 16:44:31', '2022-04-14 16:44:31'),
(7, 'القانون الزراعى', '2022-04-14 16:44:45', '2022-04-14 16:44:45'),
(8, 'قانون عام', '2022-04-15 20:38:17', '2022-04-15 20:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `gender`, `image`, `address`, `created_at`, `updated_at`) VALUES
(1, 'طلال عابد', 'talal@gmail.com', '$2y$10$mIpgMR7hhjTvPAM3DGmBiuTHGcK5LTBEVHsHFxo3QKzSAko089Wo6', '69532581', 'ذكر', NULL, 'الكويت', '2022-04-17 01:59:09', '2022-04-17 01:59:09'),
(2, 'تيم حسن', 'teem@gmail.com', '$2y$10$mIpgMR7hhjTvPAM3DGmBiuTHGcK5LTBEVHsHFxo3QKzSAko089Wo6', '69532561', 'ذكر', NULL, 'الجهراء', '2022-04-17 01:59:09', '2022-04-17 01:59:09'),
(3, 'إياد إيلاف', 'eiad@gmail.com', '$2y$10$mIpgMR7hhjTvPAM3DGmBiuTHGcK5LTBEVHsHFxo3QKzSAko089Wo6', '69537615', 'ذكر', NULL, 'سلوى', '2022-04-17 01:59:09', '2022-04-17 01:59:09'),
(4, 'بلال اشرف', 'blal@gmail.com', '$2y$10$mIpgMR7hhjTvPAM3DGmBiuTHGcK5LTBEVHsHFxo3QKzSAko089Wo6', '69532168', 'ذكر', NULL, 'صبية', '2022-04-17 01:59:09', '2022-04-17 01:59:09');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_lawyer_id_foreign` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consulations`
--
ALTER TABLE `consulations`
  ADD CONSTRAINT `consulations_lawyer_id_foreign` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consulations_spec_id_foreign` FOREIGN KEY (`spec_id`) REFERENCES `specializations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consulations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lawyer_specializations`
--
ALTER TABLE `lawyer_specializations`
  ADD CONSTRAINT `lawyer_specializations_lawyer_id_foreign` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lawyer_specializations_spec_id_foreign` FOREIGN KEY (`spec_id`) REFERENCES `specializations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_lawyer_id_foreign` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_lawyer_id_foreign` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_cons_id_foreign` FOREIGN KEY (`cons_id`) REFERENCES `consulations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_lawyer_id_foreign` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `services_spec_id_foreign` FOREIGN KEY (`spec_id`) REFERENCES `specializations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
