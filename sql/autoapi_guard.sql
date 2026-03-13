-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2026 at 10:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autoapi guard`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `review`, `rating`, `review_date`) VALUES
(1, 'pravin', 'very good', 5, '2026-03-13 09:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `scan_results`
--

CREATE TABLE `scan_results` (
  `id` int(11) NOT NULL,
  `api_url` varchar(255) DEFAULT NULL,
  `vulnerabilities` text DEFAULT NULL,
  `risk_score` int(11) DEFAULT NULL,
  `scan_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scan_results`
--

INSERT INTO `scan_results` (`id`, `api_url`, `vulnerabilities`, `risk_score`, `scan_date`) VALUES
(1, '/api/login', '2', 60, '2026-03-13 05:45:11'),
(2, '/api/users', '0', 20, '2026-03-13 05:45:11'),
(3, '/api/payment', '3', 80, '2026-03-13 05:45:11'),
(4, '/api/products', '1', 40, '2026-03-13 05:45:11'),
(5, 'https://www.merriam-webster.com/dictionary/compilation', '', 45, '2026-03-13 08:41:54'),
(6, 'https://maps.google.com/', 'Missing Authentication, ', 45, '2026-03-13 08:43:56'),
(7, 'https://maps.google.com/', 'Missing Authentication, ', 45, '2026-03-13 08:47:51'),
(8, 'https://www.merriam-webster.com/dictionary/compilation', '', 45, '2026-03-13 09:11:04'),
(9, 'https://www.merriam-webster.com/dictionary/compilation', 'Missing Authentication, ', 75, '2026-03-13 09:42:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scan_results`
--
ALTER TABLE `scan_results`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scan_results`
--
ALTER TABLE `scan_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
