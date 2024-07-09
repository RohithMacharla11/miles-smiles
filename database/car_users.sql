-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 01:43 PM
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
('admin', 'login', 'Admin logged in', '2024-07-08 10:03:57'),
('admin', 'login', 'Admin logged in', '2024-07-09 11:56:02'),
('admin', 'login', 'Admin logged in', '2024-07-09 13:44:29'),
('admin', 'login', 'Admin logged in', '2024-07-09 16:24:20');

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
(247, 'One Way', 'Warangal', 'hyderabad', '2024-07-09', '07:00:00', '0000-00-00', '', 'RohithMac', '2024-07-09', '16:15:49', 'booked', 233),
(248, 'One Way', 'delhi', 'Mumbai', '2024-07-17', '07:00:00', '0000-00-00', '', 'RohithMac', '2024-07-09', '16:47:47', 'not_booked', NULL);

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
(4, 'TATA NEXON', 2021, 5000.00, '[\"2021 Model\",\"Manual\",\"  2 Large bags\",\" 1 Small bag\",\"5 Persons\",\"Petrol Vehicle\",\"  8.5km/L\"]', '[\"css/images/nexon/car1.jpg\",\"css/images/nexon/car2.jpg\",\"css/images/nexon/car3.jpg\",\"css/images/nexon/car4.jpg\",\"css/images/nexon/car5.jpg\"]', 'TS26TG8978', 'Dheeraj', 'active'),
(5, 'maruti-Eeco', 2022, 6500.00, '[\"2022 Model\",\"Manual\",\"2 Large bag\",\"3 Small bags\",\"5 Persons\",\"diesel Vehicle\",\"11km/L\"]', '[\"css/images/maruti-Eeco/car1.jpg\",\"css/images/maruti-Eeco/car2.jpg\",\"css/images/maruti-Eeco/car3.jpg\",\"css/images/maruti-Eeco/car4.jpg\",\"css/images/maruti-Eeco/car5.jpg\"]', 'TS34FG8937', 'Akhil', 'active'),
(6, 'RENAULT', 2018, 4999.00, '[\"2018 Model \",\"Manual\",\"2 Large bags\",\"1 Small bag\",\"5 Persons\",\"Petrol Vehicle\",\"9km/L\",\"\"]', '[\"css/images/renault/car1.jpg\",\"css/images/renault/car2.jpg\",\"css/images/renault/car3.jpg\",\"css/images/renault/car4.jpg\",\"css/images/renault/car5.jpg\"]', 'AP32DF1234', 'Kailash', 'active'),
(8, 'Ford Car 7', 2020, 7500.00, '[\"5 people\",\"Gasoline\", \"Automatic\",\"AC\"]', '[\"css/images/car-9.jpg\", \"css/images/car-2.jpg\", \"css/images/car-1.jpg\"]', 'TS89TR1267', 'Shiva', 'not-active'),
(9, 'TATA ALTROZ', 2021, 6999.00, '[\"2021 Model\",\"Automatic\",\"1 Large bags\",\"1 Small bag\",\"5 Persons\",\"EV Vehicle\",\"320km/charge\",\"\"]', '[\"css/images/tata/car1.jpg\",\"css/images/tata/car2.jpg\",\"css/images/tata/car3.jpg\",\"css/images/tata/car4.jpg\",\"css/images/tata/car5.jpg\"]', 'AP34RF5748', 'Sunil', 'active'),
(10, 'TATA PUNCH', 2019, 6799.00, '[\"2019 Model\",\"Automatic\",\"1 Large bag\",\"1 Small bag\",\"5 Persons\",\"petrol Vehicle\",\"13km/L\",\"\"]', '[\"css/images/punch/car1.jpg\",\"css/images/punch/car2.jpg\",\"css/images/punch/car3.jpg\",\"css/images/punch/car4.jpg\",\"css/images/punch/car5.jpg\"]', 'TS10WS5490', 'Sunny', 'active'),
(11, 'Hyundai Car 10', 2022, 5899.00, '[\"2022 Model\",\"Automatic\",\"2 Large bags\",\"1 Small bag\",\"5 Persons\",\"Petrol Vehicle\",\"10km/L\",\"\"]', '[\"css/images/hyundai/car1.jpg\",\"css/images/hyundai/car2.jpg\",\"css/images/hyundai/car3.jpg\",\"css/images/hyundai/car4.jpg\",\"css/images/hyundai/car5.jpg\"]', 'TS76YS4562', 'Chaithanya', 'active');

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
(233, 4, 'TATA NEXON', 2021, 5000.00, '[', '[', 'RohithMac', '2024-07-09', 2, 10000);

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
('mitta.dheeraj33@gmail.com', 'dheeraj55', '2203A52161@gmail.com', '7989481578', '$2y$10$oBGEXY5LflvUAjaSqnX8auCjPKDfEq7WyQazL96.fUjHAggTOtuga', 0x75706c6f6164732f6e65786f6e2d666163656c6966742d6578746572696f722d72696768742d66726f6e742d74687265652d717561727465722d36392e77656270),
('Rohith Macharla', 'RohithMac', 'macharlarohith111@gmail.com', '7780598470', '$2y$10$iQlrRZSV.zrIzqUS62vXg.lMgMhUUi4Nvo.gnx1UfZKKI43kTEEvW', 0x75706c6f6164732f526f686974684d61636861726c612d496d6743726561746f7241492e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `username`, `car_id`) VALUES
(23, 'RohithMac', 3),
(24, 'demo3', 3);

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
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `username` (`username`),
  ADD KEY `car_id` (`car_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `car_details`
--
ALTER TABLE `car_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`UserName`) REFERENCES `users` (`UserName`),
  ADD CONSTRAINT `fk_booking` FOREIGN KEY (`car_details_id`) REFERENCES `car_details` (`detail_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
