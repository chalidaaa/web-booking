-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 06, 2025 at 02:27 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bilik_foto`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `booking_datetime` datetime NOT NULL,
  `note` text NOT NULL,
  `status` enum('pending','cancelled','confirmed','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `user_id`, `booking_datetime`, `note`, `status`) VALUES
(2, 10, '2024-12-28 17:56:00', 'bagus', 'confirmed'),
(4, 1, '2025-01-01 14:01:00', 'gercep', 'confirmed'),
(8, 9, '2025-01-06 00:44:00', 'order yaaaa', 'pending'),
(9, 8, '2025-01-06 00:45:00', 'yy', 'pending'),
(10, 18, '2025-01-06 18:56:00', 'Order ya kak', 'pending'),
(12, 25, '2025-01-06 19:45:00', 'Order ya kak', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cust',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `no_hp`, `role`, `password`) VALUES
(1, 'Admin', 'admin@admin.com', '08123456789', 'admin', '$2y$12$QcQKxukMZ/3Dc9PbEY7gtuMQ45CJrJqFIBYzcQS3pU00vICO58oCq'),
(8, 'Dion gils', 'dionuhuy@gmail.com', '0123456789', 'user', '$2y$10$bmgSesHbY/kVymSYUtfK9uqbQEeHtpKi2AyKYlolKGQh27qLarKd.'),
(9, 'wahyu asolole', 'wahyu123@gmail.com', '0101010101', 'user', '$2y$10$D67Hi3iM66nw0JKcDWSV4uDxVy69sLfya5ZwWO53YBfd1pJ3tD8Qa'),
(10, 'caca yali', 'cacahehe@gmail.com', '0891111', 'user', '$2y$10$TZ1M5HM9W6SrEdCXya0Hc.j35b.XVd/foDGBjIC1iS/EQBhP1qrzO'),
(16, 'Puri', 'puri@gmail.com', '091363768453', 'user', '$2y$10$xBZNGNsKsS6YHXCvGl9A.ujky6TlnO7kYUqnXxI0j9vcHMiABRIUS'),
(17, 'Rani ', 'rannimimiperi@gmail.com', '088888888888888', 'user', '$2y$10$J4A.HaLny5/3N0XrK8fH4e.vGOUdL2mYgiInV3zykZNIkK6MlvjTS'),
(18, 'Wahyu', 'Wahyu@gmail.com', '011111111111', 'user', '$2y$10$bgHeRlBfX0ky2ZrHHE22..T6jyicjE9cbL8qZ2zLv2bR4fWnTIISa'),
(25, 'jesicca', 'jesi@gmail.com', '0655555555', 'user', '$2y$10$1pAXghg9F7I5zzHYsKaVzupfuyRWqde7dfX85UG9ZKZ9Gwdqv.IkK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_no_hp_unique` (`no_hp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
