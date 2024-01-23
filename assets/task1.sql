-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 23, 2024 at 12:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task1`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `date` date DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `salary` float DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `surname`, `date`, `role_id`, `salary`, `updated_at`, `deleted_at`, `created_at`) VALUES
(1, 'Simral', 'Ismayilov', '2024-01-19', 2, 3000, NULL, NULL, '2024-01-20 14:01:30'),
(2, 'Orxan', 'Ismayilov', '2024-01-20', 1, 2000, NULL, NULL, '2024-01-20 14:03:50'),
(3, 'Test', 'Test', '2024-01-24', 1, 12123, NULL, NULL, '2024-01-20 11:41:22'),
(4, 'Test2', 'Test2', '2024-01-18', 2, 288, NULL, NULL, '2024-01-20 13:00:03'),
(5, 'Tahmina', 'Bagirova', '2024-01-12', 2, 323, NULL, NULL, '2024-01-20 13:01:09'),
(6, 'Tahmina', 'Bagirova', '2024-01-12', 2, 323, NULL, NULL, '2024-01-20 13:01:32'),
(7, 'tst', 'tst', '2024-01-26', 2, 2323, NULL, NULL, '2024-01-20 14:23:52'),
(8, 'Orxan', 'Ismayilov', '2024-01-19', 1, 12, NULL, NULL, '2024-01-20 14:30:55'),
(9, 'asdasd', 'asdsd', '2024-01-26', 1, 21, NULL, NULL, '2024-01-20 14:33:06'),
(10, 'asds', 'asdsd', '2024-01-25', 1, 3434, NULL, NULL, '2024-01-20 14:34:53'),
(11, 'Flup', 'Agency', '2024-01-23', 3, 12123, NULL, NULL, '2024-01-22 11:17:17'),
(12, 'Test', 'Testov', '2024-01-15', 2, 8, NULL, NULL, '2024-01-22 12:23:06'),
(30, 'Henry Harvey', 'Roman', '1995-05-19', 3, 0, NULL, NULL, '2024-01-23 07:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `keywords`, `updated_at`, `deleted_at`, `created_at`) VALUES
(1, 'Orxan', NULL, NULL, '2024-01-20 00:00:00'),
(2, 'Orxan', NULL, NULL, '2024-01-20 00:00:00'),
(3, 'Simral', NULL, NULL, '2024-01-20 00:00:00'),
(4, 'Simral', NULL, NULL, '2024-01-20 12:36:31'),
(5, 'Test', NULL, NULL, '2024-01-20 12:36:36'),
(6, 'orxan', NULL, NULL, '2024-01-20 13:05:40'),
(7, 'orxan', NULL, NULL, '2024-01-20 13:05:53'),
(8, 'Test', NULL, NULL, '2024-01-20 13:11:28'),
(9, 'test123', NULL, NULL, '2024-01-22 11:16:35'),
(10, 'test123', NULL, NULL, '2024-01-22 11:16:37'),
(11, 'tahmina', NULL, NULL, '2024-01-22 12:02:48'),
(12, 'tahmina', NULL, NULL, '2024-01-22 12:02:52'),
(13, 'Orxan', NULL, NULL, '2024-01-22 13:37:03'),
(14, 'Orxan', NULL, NULL, '2024-01-22 14:36:52'),
(15, 'test test', NULL, NULL, '2024-01-23 07:56:44'),
(16, 'Logs Test', NULL, NULL, '2024-01-23 08:25:01'),
(17, 'Logs Test', '2024-01-23 11:36:38', NULL, '2024-01-23 08:35:54'),
(18, 'Ismayilov', NULL, NULL, '2024-01-23 08:37:07'),
(19, 'Orxafsdw', NULL, NULL, '2024-01-23 09:07:28'),
(20, 'asd', NULL, NULL, '2024-01-23 09:08:42'),
(21, 'Orxan', NULL, NULL, '2024-01-23 09:08:48'),
(22, 'orxan', NULL, NULL, '2024-01-23 09:09:01'),
(23, 'orxan', NULL, NULL, '2024-01-23 09:09:03'),
(24, 'orxan', NULL, NULL, '2024-01-23 09:16:10'),
(25, 'Flup', NULL, NULL, '2024-01-23 09:16:43'),
(26, 'Flup', NULL, NULL, '2024-01-23 09:34:17'),
(27, 'Flup', NULL, NULL, '2024-01-23 09:34:17'),
(28, 'Orxan', NULL, NULL, '2024-01-23 09:38:37'),
(29, 'Orxan', NULL, NULL, '2024-01-23 09:41:30'),
(30, 'Orxan', NULL, NULL, '2024-01-23 09:44:13'),
(31, 'Orxan', NULL, NULL, '2024-01-23 09:46:20'),
(32, 'Orxan', NULL, NULL, '2024-01-23 09:50:20'),
(33, 'Orxan', NULL, NULL, '2024-01-23 09:50:21'),
(34, 'Orxan', NULL, NULL, '2024-01-23 09:50:21'),
(35, 'Orxan', NULL, NULL, '2024-01-23 09:50:22'),
(36, 'Orxan', NULL, NULL, '2024-01-23 09:50:22'),
(37, 'Orxan', NULL, NULL, '2024-01-23 09:51:13'),
(38, 'Orxan', NULL, NULL, '2024-01-23 09:51:14'),
(39, 'Orxan', NULL, NULL, '2024-01-23 09:51:17'),
(40, 'Orxan', NULL, NULL, '2024-01-23 09:51:23'),
(41, 'Orxan', NULL, NULL, '2024-01-23 09:51:24'),
(42, 'Orxan', NULL, NULL, '2024-01-23 09:51:24'),
(43, 'Orxan', NULL, NULL, '2024-01-23 09:51:24'),
(44, 'orxan', NULL, NULL, '2024-01-23 10:07:14'),
(45, 'XYZ', NULL, NULL, '2024-01-23 11:34:31'),
(46, 'lala', NULL, NULL, '2024-01-23 11:45:21'),
(47, 'lala', NULL, NULL, '2024-01-23 11:45:24'),
(48, 'lala', NULL, NULL, '2024-01-23 11:45:25'),
(49, 'lala', NULL, NULL, '2024-01-23 11:45:25'),
(50, 'lale', NULL, NULL, '2024-01-23 11:45:27'),
(51, 'lalə', NULL, NULL, '2024-01-23 11:45:32'),
(52, 'tah', NULL, NULL, '2024-01-23 11:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `updated_at`, `deleted_at`, `created_at`) VALUES
(1, 'Backend Developer', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-01-22 16:58:48'),
(2, 'Frontend Developer', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-01-22 16:58:48'),
(3, 'Web Designer', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-01-22 16:58:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
