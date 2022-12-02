-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2022 at 02:26 AM
-- Server version: 5.7.39-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flutter_key_test` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flutter_secret_test` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flutter_key` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flutter_secret` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sitename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `flutter_key_test`, `flutter_secret_test`, `flutter_key`, `flutter_secret`, `sitename`, `created_at`, `updated_at`) VALUES
(1, 'FLWPUBK_TEST-54dafcfc4d1439dbeddafa1d68a4f63b-X', 'FLWSECK_TEST-f918939659bd03f568fa7db85f2e6ae9-X', 'FLWPUBK-1d222380fb103bb81ebd09648ed592c7-X', 'FLWSECK-8abf8321b955b488727ccd55597bac76-X', 'Victotorspredict', '2022-11-01 09:58:17', '2022-11-01 09:58:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
