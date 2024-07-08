-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2024 at 11:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `username` varchar(355) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`username`, `activity`, `description`, `timestamp`) VALUES
('ChinnuMac', 'admin logout', 'admin logged out', '2024-07-03 18:17:31'),
('RohithMac', 'login', 'Admin logged in', '2024-07-03 18:17:45'),
('RohithMac', 'login', 'Admin logged in', '2024-07-03 22:15:22'),
('RohithMac', 'login', 'Admin logged in', '2024-07-03 22:59:38'),
('ChinnuMac', 'login', 'Admin logged in', '2024-07-04 12:14:31'),
('RohithMac', 'login', 'Admin logged in', '2024-07-04 15:38:57'),
('RohithMac', 'admin logout', 'admin logged out', '2024-07-04 15:49:18'),
('RohithMac', 'login', 'Admin logged in', '2024-07-04 15:49:30'),
('RohithMac', 'login', 'Admin logged in', '2024-07-05 09:56:58'),
('RohithMac', 'admin logout', 'admin logged out', '2024-07-05 10:17:39'),
('RohithMac', 'login', 'Admin logged in', '2024-07-05 10:18:00'),
('RohithMac', 'admin logout', 'admin logged out', '2024-07-05 10:19:04'),
('ChinnuMac', 'admin logout', 'admin logged out', '2024-07-05 10:20:59'),
('ChinnuMac', 'login', 'Admin logged in', '2024-07-05 10:41:35'),
('ChinnuMac', 'admin logout', 'admin logged out', '2024-07-05 10:43:27'),
('admin', 'login', 'Admin logged in', '2024-07-05 13:53:54'),
('admin', 'login', 'Admin logged in', '2024-07-05 14:00:55'),
('admin', 'login', 'Admin logged in', '2024-07-05 15:45:43'),
('admin', 'login', 'Admin logged in', '2024-07-06 09:58:12'),
('admin', 'login', 'Admin logged in', '2024-07-06 10:04:37'),
('admin', 'admin logout', 'admin logged out', '2024-07-06 10:05:02'),
('admin', 'login', 'Admin logged in', '2024-07-06 10:05:37'),
('admin', 'admin logout', 'admin logged out', '2024-07-06 10:08:38'),
('admin', 'login', 'Admin logged in', '2024-07-06 10:39:04'),
('admin', 'admin logout', 'admin logged out', '2024-07-06 10:44:33'),
('admin', 'login', 'Admin logged in', '2024-07-06 10:45:38'),
('admin', 'admin logout', 'admin logged out', '2024-07-06 10:50:40'),
('admin', 'login', 'Admin logged in', '2024-07-08 10:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `admin_register`
--

CREATE TABLE `admin_register` (
  `id` int(11) NOT NULL,
  `admin_username` varchar(225) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_register`
--

INSERT INTO `admin_register` (`id`, `admin_username`, `email`, `phone`, `password`) VALUES
(1, 'admin', 'macharlarohith111@gmail.com', '8555073838', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `booking_type` varchar(50) DEFAULT NULL,
  `pickup` varchar(100) DEFAULT NULL,
  `dropoff` varchar(100) DEFAULT NULL,
  `pickup_date` date DEFAULT NULL,
  `pickup_time` time DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `airport_type` varchar(255) NOT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `created_time` time NOT NULL DEFAULT current_timestamp(),
  `booking_status` varchar(50) NOT NULL DEFAULT 'not_booked',
  `car_details_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_type`, `pickup`, `dropoff`, `pickup_date`, `pickup_time`, `return_date`, `airport_type`, `UserName`, `created_at`, `created_time`, `booking_status`, `car_details_id`) VALUES
(237, 'One Way', 'wgl', 'hyd', '2024-09-09', '09:09:00', '0000-00-00', '', 'RohithMac', '2024-07-08', '13:38:40', 'not_booked', 227),
(238, 'One Way', 'sdc', 'cvxvs', '2024-06-11', '07:00:00', '0000-00-00', '', 'RohithMac', '2024-07-08', '14:16:00', 'booked', 228);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `details` text DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `license_number` varchar(10) NOT NULL,
  `car_owner` varchar(255) NOT NULL,
  `car_status` varchar(15) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `title`, `year`, `price`, `details`, `images`, `license_number`, `car_owner`, `car_status`) VALUES
(3, 'BMW Car 2', 2020, 9500.00, '[\"5 people\",\"Electric\", \"Automatic\",\"AC\"]', '[\"css/images/car-2.jpg\", \"css/images/car-3.jpg\", \"css/images/car-4.jpg\"]', 'TS36AE9895', 'RohithMac', 'active'),
(4, 'Mercedes Car 3', 2021, 5000.00, '[\"4 people\",\"Electric\",\"Automatic\",\"AC\",\"6 people\"]', '[\"css/images/car-1.jpg\",\"css/images/car-8.jpg\",\"css/images/car-9.jpg\",\"css/images/car-6.jpg\"]', 'TS26TG8978', 'Dheeraj', 'active'),
(5, 'Tesla Car 4', 2022, 6500.00, '[\"5 people\",\"Electric\", \"Automatic\",\"AC\"]', '[\"css/images/car-10.jpg\", \"css/images/car-1.jpg\", \"css/images/car-2.jpg\"]', 'TS34FG8937', 'Akhil', 'not-active'),
(6, 'Honda Car 5', 2018, 4999.00, '[\"4 people\",\"Gasoline\", \"Manual\",\"AC\"]', '[\"css/images/car-3.jpg\", \"css/images/car-4.jpg\", \"css/images/car-5.jpg\"]', 'AP32DF1234', 'Kailash', 'active'),
(8, 'Ford Car 7', 2020, 7500.00, '[\"5 people\",\"Gasoline\", \"Automatic\",\"AC\"]', '[\"css/images/car-9.jpg\", \"css/images/car-2.jpg\", \"css/images/car-1.jpg\"]', 'TS89TR1267', 'Shiva', 'not-active'),
(9, 'Chevrolet Car 8', 2021, 6999.00, '[\"5 people\",\"Diesel\", \"Manual\",\"AC\"]', '[\"css/images/car-2.jpg\", \"css/images/car-3.jpg\", \"css/images/car-4.jpg\"]', 'AP34RF5748', 'Sunil', 'active'),
(10, 'Nissan Car 9', 2018, 6799.00, '[\"4 people\",\"Gasoline\", \"Automatic\",\"AC\"]', '[\"css/images/car-5.jpg\", \"css/images/car-6.jpg\", \"css/images/car-7.jpg\"]', 'TS10WS5490', 'Sunny', 'active'),
(11, 'Hyundai Car 10', 2022, 5899.00, '[\"5 people\",\"Gasoline\",\"Automatic\",\"AC\"]', '[\"css/images/car-8.jpg\",\"css/images/car-9.jpg\",\"css/images/car-3.jpg\"]', 'TS76YS4562', 'Chaithanya', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `car_details`
--

CREATE TABLE `car_details` (
  `detail_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `images` text DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `booking_date` date NOT NULL DEFAULT current_timestamp(),
  `no_of_days` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_details`
--

INSERT INTO `car_details` (`detail_id`, `car_id`, `title`, `year`, `price`, `details`, `images`, `username`, `booking_date`, `no_of_days`, `total_amount`) VALUES
(227, 3, 'BMW Car 2', 2020, 9500.00, '[', '[', 'RohithMac', '2024-07-08', 0, 0),
(228, 4, 'Mercedes Car 3', 2021, 5000.00, '[', '[', 'RohithMac', '2024-07-08', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `FullName` varchar(40) NOT NULL,
  `UserName` varchar(40) NOT NULL,
  `EMail` varchar(50) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Password` char(255) NOT NULL,
  `profile_photo` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`FullName`, `UserName`, `EMail`, `Phone`, `Password`, `profile_photo`) VALUES
('AKhil', 'Akhil12', 'akhil@gmail.com', '5435612783', '$2y$10$2uN5AyP4HdPa4Hve0Jq71.RhL9zX1hcgH4NCBr/zT4MbeI0VKRo1O', ''),
('Rohith Macharla', 'RohithMac', 'macharlarohith111@gmail.com', '7780598470', '$2y$10$Tjd4.4lPy65WTEPKleTu2.U7.WoS0aMTzQNZ7w4ZJN/VxDMj1OHHG', 0x75706c6f6164732f526f686974684d61636861726c612d496d6743726561746f7241492e706e67);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_register`
--
ALTER TABLE `admin_register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `admin_username` (`admin_username`),
  ADD UNIQUE KEY `admin_username_2` (`admin_username`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`UserName`),
  ADD KEY `fk_booking` (`car_details_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD UNIQUE KEY `license_number` (`license_number`);

--
-- Indexes for table `car_details`
--
ALTER TABLE `car_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `car_id` (`car_id`);
ALTER TABLE `car_details` ADD FULLTEXT KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserName`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `EMail` (`EMail`),
  ADD UNIQUE KEY `UserName_2` (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_register`
--
ALTER TABLE `admin_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `car_details`
--
ALTER TABLE `car_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`UserName`),
  ADD CONSTRAINT `fk_booking` FOREIGN KEY (`car_details_id`) REFERENCES `car_details` (`detail_id`);

--
-- Constraints for table `car_details`
--
ALTER TABLE `car_details`
  ADD CONSTRAINT `car_details_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`),
  ADD CONSTRAINT `car_details_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`UserName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
