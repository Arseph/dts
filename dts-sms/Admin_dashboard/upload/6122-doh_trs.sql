-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2022 at 02:27 AM
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
-- Database: `doh_trs`
--

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `login` datetime NOT NULL,
  `logout` datetime DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `user_id`, `login`, `logout`, `status`, `token`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-12-28 07:43:33', '2021-12-29 06:54:45', 'login', NULL, '2021-12-27 23:43:33', '2021-12-28 22:54:45'),
(2, 1, '2021-12-28 07:44:42', NULL, 'login', NULL, '2021-12-27 23:44:42', '2021-12-27 23:44:42'),
(3, 1, '2021-12-28 07:45:11', NULL, 'login', NULL, '2021-12-27 23:45:11', '2021-12-27 23:45:11'),
(4, 1, '2021-12-28 07:48:33', NULL, 'login', NULL, '2021-12-27 23:48:33', '2021-12-27 23:48:33'),
(5, 1, '2021-12-28 07:49:40', NULL, 'login', NULL, '2021-12-27 23:49:40', '2021-12-27 23:49:40'),
(6, 1, '2021-12-28 07:50:02', NULL, 'login', NULL, '2021-12-27 23:50:02', '2021-12-27 23:50:02'),
(7, 1, '2021-12-28 07:50:25', NULL, 'login', NULL, '2021-12-27 23:50:25', '2021-12-27 23:50:25'),
(8, 1, '2021-12-28 07:52:30', NULL, 'login', NULL, '2021-12-27 23:52:30', '2021-12-27 23:52:30'),
(9, 1, '2021-12-28 07:53:31', NULL, 'login', NULL, '2021-12-27 23:53:31', '2021-12-27 23:53:31'),
(10, 1, '2021-12-28 08:18:06', NULL, 'login', NULL, '2021-12-28 00:18:06', '2021-12-28 00:18:06'),
(11, 1, '2021-12-29 00:48:47', NULL, 'login', NULL, '2021-12-28 16:48:47', '2021-12-28 16:48:47'),
(12, 1, '2021-12-29 02:20:30', NULL, 'login', NULL, '2021-12-28 18:20:30', '2021-12-28 18:20:30'),
(13, 1, '2021-12-29 05:20:29', NULL, 'login', NULL, '2021-12-28 21:20:29', '2021-12-28 21:20:29'),
(14, 1, '2021-12-29 05:26:25', '2021-12-29 06:49:47', 'login_off', NULL, '2021-12-28 21:26:25', '2021-12-28 22:49:47'),
(15, 1, '2021-12-29 06:49:47', NULL, 'login', NULL, '2021-12-28 22:49:47', '2021-12-28 22:49:47'),
(16, 1, '2021-12-29 06:54:45', '2021-12-29 07:00:41', 'login_off', NULL, '2021-12-28 22:54:45', '2021-12-28 23:00:41'),
(17, 1, '2021-12-29 07:00:41', '2021-12-29 07:13:39', 'login_off', NULL, '2021-12-28 23:00:41', '2021-12-28 23:13:39'),
(18, 1, '2021-12-29 07:13:39', '2021-12-29 07:39:29', 'login_off', NULL, '2021-12-28 23:13:39', '2021-12-28 23:39:29'),
(19, 1, '2021-12-29 07:39:29', '2021-12-29 08:35:06', 'login_off', NULL, '2021-12-28 23:39:29', '2021-12-29 00:35:06'),
(20, 1, '2021-12-29 08:35:06', NULL, 'login', NULL, '2021-12-29 00:35:06', '2021-12-29 00:35:06'),
(21, 1, '2022-01-03 00:55:31', NULL, 'login', NULL, '2022-01-02 16:55:31', '2022-01-02 16:55:31');

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
(3, '2021_12_28_064242_create_logins_table', 2),
(4, '2021_12_29_075836_create_trainings_table', 3);

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
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_training` date NOT NULL,
  `training_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `user_id`, `date_training`, `training_subject`, `venue`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-12-31', 'Training with my pet', 'Hotel', '2021-12-29 02:13:00', '2021-12-28 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `facility_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accrediation_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accrediation_validity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `void` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `facility_id`, `username`, `password`, `level`, `fname`, `mname`, `lname`, `title`, `contact`, `email`, `accrediation_no`, `accrediation_validity`, `license_no`, `prefix`, `picture`, `designation`, `status`, `last_login`, `login_status`, `void`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 63, 'admin_doh1', '$2y$10$ZZNL17FgXbUKM1KICiZmEuMVsSfqfnelrlpgaI.qrA1j.XVATJZJi', 'admin', 'Admin', 'RO XII', 'DOH', '', '', 'helpdeskro12@gmail.com', '', '', '', '', '', 'CP I', '', '2022-01-03 00:55:31', 'login', 0, NULL, NULL, NULL, '2022-01-02 16:55:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
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
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
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
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
