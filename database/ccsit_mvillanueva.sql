-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 09:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccsit_mvillanueva`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `roomid` int(11) NOT NULL,
  `total_payment` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `userid`, `name`, `address`, `phone`, `checkin`, `checkout`, `roomid`, `total_payment`, `status`, `created_at`, `updated_at`) VALUES
(7, 3, 'Arnel Hinay', 'Sogod Southern Leyte', '09661195690', '2023-06-28', '2023-07-03', 4, '41000.00', 2, '2023-06-24 08:01:47', '2023-06-24 08:01:47'),
(8, 4, 'Anthony Abreo', 'Padre Burgos Southern Leyte', '09355209089', '2023-06-26', '2023-06-28', 3, '27200.00', 2, '2023-06-24 08:27:25', '2023-06-24 08:27:25'),
(9, 2, 'Jemuel Cadayona', 'San Vicente Bontoc Southern Leyte', '09061958437', '2023-07-03', '2023-07-05', 7, '22800.00', 2, '2023-06-24 09:12:25', '2023-06-24 09:12:25'),
(10, 4, 'Anthony Abreo', 'Padre Burgos Southern Leyte', '09661195680', '2023-06-25', '2023-06-26', 6, '5600.00', 2, '2023-06-24 10:40:46', '2023-06-24 10:40:46'),
(12, 5, 'Jaysan Ompod', 'Libagon Southern Leyte', '09192497065', '2023-06-27', '2023-06-29', 12, '9000.00', 2, '2023-06-25 00:27:14', '2023-06-25 00:27:14'),
(13, 3, 'Arnel Hinay', 'Concepcion Sogod Southern Leyte', '09552497087', '2023-06-28', '2023-07-01', 4, '24600.00', 2, '2023-06-25 00:47:49', '2023-06-25 00:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL,
  `maxguest` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `checkout` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room`, `description`, `price`, `status`, `maxguest`, `picture`, `checkout`, `created_at`, `updated_at`) VALUES
(1, 'Room 1 (Medium)', 'Malapascua Exotic Island Dive and Beach Resort', '15000.00', 1, 3, '2023-06-24-05-21-53-MEIR-deluxe-1.jpg', NULL, '2023-06-24 03:21:53', '2023-06-24 03:21:53'),
(2, 'Room 2 (Large)', 'Blanco Beach Resort Malapascua, Malapascua Island – Updated 2023 Prices', '9700.00', 1, 4, '2023-06-24-05-36-15-243064588.jpg', NULL, '2023-06-24 03:36:15', '2023-06-24 03:36:15'),
(3, 'Room 3 (Special)', 'MALAPASCUA LEGEND WATER SPORTS AND RESORT, MALAPASCUA ISLAND', '13600.00', 1, 5, '2023-06-24-05-47-13-malapascua-legend-water-sport-and-resort-malapascua-island-img-20.jpeg', NULL, '2023-06-24 03:47:13', '2023-06-24 03:47:13'),
(4, 'Room 4', 'Malapascua Exotic Island Dive and Beach Resort', '8200.00', 1, 6, '2023-06-24-06-47-45-59b2547b9bdfa1912a08b14b716af4e1.jpg', NULL, '2023-06-24 04:47:45', '2023-06-24 04:47:45'),
(5, 'Room 5 (For Family Use)', 'Staying on Malapascua Island The Evolution Diving Resort - Evolution Diving Resort Malapascua', '15600.00', 1, 10, '2023-06-24-08-06-34-garden-fan-room-evolution-diving-resort-malapascua-2-800x600.jpg', NULL, '2023-06-24 06:06:34', '2023-06-24 06:06:34'),
(6, 'Room 6', 'Malapascua Exotic Island Dive and Beach Resort Reviews & Specials - Bluewater Dive Travel', '5600.00', 1, 3, '2023-06-24-09-39-53-MEIR-super-deluxe-1.jpg', NULL, '2023-06-24 07:39:53', '2023-06-24 07:39:53'),
(7, 'Room 7 (Seaside)', 'MALAPASCUA LEGEND WATER SPORTS AND RESORT, MALAPASCUA ISLAND', '11400.00', 1, 7, '2023-06-24-11-02-42-malapascua-legend-water-sport-and-resort-malapascua-island-img-15.jpeg', NULL, '2023-06-24 09:02:42', '2023-06-24 09:02:42'),
(8, 'Room 8', 'MALAPASCUA ISLAND, CEBU: TOP 5 BEACH AND DIVE RESORTS - Philippine Beach Guide', '7600.00', 1, 8, '2023-06-25-01-58-18-Exotic-Dive.jpg', NULL, '2023-06-24 10:17:27', '2023-06-24 10:17:27'),
(11, 'Room 9', 'D Avilas Horizon Malapascua-Daanbantayan Updated 2023 Room Price-Reviews & Deals', '6800.00', 1, 5, '2023-06-25-03-13-21-020371200089zvt7z8C82.jpg', NULL, '2023-06-25 00:12:49', '2023-06-25 00:12:49'),
(12, 'Room 10 (Medium)', 'HOTEL HIPPOCAMPUS BEACH RESORT MALAPASCUA ISLAND (Philippines)', '4500.00', 1, 5, '2023-06-25-02-19-19-Hippocampus-Beach-Resort-Malapascua-Island-Exterior.jpeg', NULL, '2023-06-25 00:19:19', '2023-06-25 00:19:19'),
(13, 'Room 11 (Blue)', 'HOTEL OYO 853 MALAPASCUA BEACH AND DIVE RESORT MALAPASCUA ISLAND ', '2300.00', 1, 4, '2023-06-25-02-50-00-Oyo-853-Malapascua-Beach-And-Dive-Resort-Exterior.jpeg', NULL, '2023-06-25 00:50:00', '2023-06-25 00:50:00'),
(14, 'Room 12', 'HOTEL BLUE CORALS BEACH RESORT MALAPASCUA ISLAND', '2100.00', 1, 3, '2023-06-25-03-14-57-Blue-Corals-Beach-Resort-Malapascua-Island-Exterior.jpeg', '2023-06-27', '2023-06-25 01:14:57', '2023-06-25 01:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Marjurie Villanueva', 'admin', 'admin', 'admin', '2023-06-24 00:31:56', '2023-06-24 00:31:56'),
(2, 'Jemuel Cadayona', 'jem', '12345', 'guest', '2023-06-24 01:55:17', '2023-06-24 01:55:17'),
(3, 'Arnel Hinay', 'arnel', '12345', 'guest', '2023-06-24 06:54:39', '2023-06-24 06:54:39'),
(4, 'Anthony Abreo', 'abreo', '12345', 'guest', '2023-06-24 08:25:42', '2023-06-24 08:25:42'),
(5, 'Jaysan Ompod', 'jaysan', '12345', 'guest', '2023-06-24 09:57:26', '2023-06-24 09:57:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
