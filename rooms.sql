-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 08, 2025 at 11:45 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `work_project_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `capacity`
--

CREATE TABLE `capacity` (
  `room_id` int NOT NULL,
  `max_capacity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `capacity`
--

INSERT INTO `capacity` (`room_id`, `max_capacity`) VALUES
(1, 2),
(2, 5),
(3, 5),
(4, 3),
(5, 4),
(6, 6),
(7, 2),
(8, 3),
(9, 6),
(20, 6);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `session_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `room_id` int NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `adults` int NOT NULL DEFAULT '1',
  `children` int NOT NULL DEFAULT '0',
  `quantity` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `session_id`, `room_id`, `check_in`, `check_out`, `adults`, `children`, `quantity`, `created_at`) VALUES
(31, 'FgPEaRioZ1EJQq6SmIDGD8aBytKfp2zCzNNyO8DR', 2, '2025-03-31', '2025-04-01', 1, 0, 1, '2025-03-31 04:23:46'),
(36, 'CLoT7av5phAURwZ9cHupJCevZQ1pQuylYwLtQDDG', 1, '2025-04-01', '2025-04-02', 1, 0, 1, '2025-03-31 08:43:50'),
(37, 'ftiuzqbq2V36uApITMxTT6IxuhRTdypMWU4KHOhM', 2, '2025-04-06', '2025-04-07', 1, 0, 1, '2025-04-05 00:19:18'),
(38, 'ftiuzqbq2V36uApITMxTT6IxuhRTdypMWU4KHOhM', 1, '2025-04-06', '2025-04-07', 1, 0, 1, '2025-04-05 00:24:43'),
(39, '9q6mYsWgmALMhbbOL9S2Cc4sweAUFCw0vAZKyLue', 1, '2025-04-05', '2025-04-06', 1, 0, 1, '2025-04-05 07:48:25'),
(40, '5emno7Wex0SgD6DlYgwg1m6aFtcth80cujmEPJXY', 1, '2025-04-06', '2025-04-07', 1, 0, 1, '2025-04-05 15:38:20'),
(41, 'oKRVdrwen1yrLufHANMSa80loc5DfAapKCxunvYT', 2, '2025-04-06', '2025-04-07', 1, 0, 1, '2025-04-06 00:21:40'),
(42, 'NjRlxSmY0BVcufYlGOQYUMa8c9McyCrj2DJ5HtYC', 1, '2025-04-06', '2025-04-07', 1, 0, 1, '2025-04-06 00:30:08'),
(43, 'tlOSeX8iDGjtqUkPc2X28NGG0FWxYA32cqBSnwV7', 1, '2025-04-06', '2025-04-07', 1, 0, 1, '2025-04-06 00:46:32'),
(44, 'mW6hnlVvGUTrib9ebXl06UfJQpE4O7KH9CjlI38k', 2, '2025-04-07', '2025-04-08', 1, 0, 1, '2025-04-07 20:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nationality` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `full_name`, `email`, `phone`, `nationality`) VALUES
(2, 'Tran Thi A', 'user2@example.c', '0347661538', 'Việt Nam'),
(3, 'Le Van C', '0987654302', 'user3@example.c', 'Việt Nam'),
(4, 'Pham Thi D', '0987654303', 'user4@example.c', 'Việt Nam'),
(5, 'Hoang Van E', '0987654304', 'user5@example.c', 'Việt Nam'),
(6, 'Vo Thi F', '0987654305', 'user6@example.c', 'Japan'),
(7, 'Dang Van G', '0987654306', 'user7@example.c', 'Việt Nam'),
(8, 'Bui Thi H', '0987654307', 'user8@example.c', 'Việt Nam'),
(12, 'Phan Thi L', '0987654311', 'user12@example.', 'Việt Nam'),
(13, 'Vu Van M', '0987654312', 'user13@example.', 'Việt Nam'),
(14, 'Ly Thi N', '0987654313', 'user14@example.', 'Việt Nam'),
(15, 'Quach Van O', '0987654314', 'user15@example.', 'Việt Nam'),
(16, 'Chu Thi P', '0987654315', 'user16@example.', 'Canada'),
(17, 'La Van Q', '0987654316', 'user17@example.', 'Việt Nam'),
(18, 'Trinh Thi R', '0987654317', 'user18@example.', 'Việt Nam'),
(19, 'Duong Van S', '0987654318', 'user19@example.', 'Việt Nam'),
(20, 'Mac Thi T', '0987654319', 'user20@example.', 'Singapore'),
(21, 'aaaaaa', 'nhinhi004@gmail.com', '0828594345', 'ss'),
(22, 'aaaaaa', 'nhinhi051004@gmail.com', '0828594345', 'ss'),
(23, 'aaaaaa', 'nhinhi051004@gmail.com', '0828594345', 'ss'),
(24, 'aaaaaa', 'nhinhi051004@gmail.com', '0828594345', 'ss'),
(25, 'nhi', 'nhinhi004@gmail.com', '0828594345', 'ss'),
(26, 'qqqqq', 'nhinhi004@gmail.com', '1111111', 'ss'),
(27, 'qqqqq', 'nhinhi004@gmail.com', '1111111', 'ss'),
(28, 'qqqqq', 'nhinhi004@gmail.com', '1111111', 'ss'),
(29, 'qqqqq', 'nhinhi004@gmail.com', '1111111', 'ss'),
(30, 'qqqqq', 'nhinhi004@gmail.com', '1111111', 'ss'),
(31, 'qqqqq', 'nhinhi004@gmail.com', '1111111', 'ss'),
(32, 'helloo', 'phuc08@gmail.com', '0828594', 'VN'),
(33, 'helloo', 'phuc08@gmail.com', '0828594', 'VN'),
(34, 'aaaaaa', 'phuc08@gmail.com', '1111111', 'TQ'),
(35, 'aaaaaa', 'phuc08@gmail.com', '1111111', 'TQ'),
(36, 'aaaaaa', 'phuc08@gmail.com', '1111111', 'TQ'),
(37, 'aaaaaa', 'phuc08@gmail.com', '1111111', 'TQ'),
(38, 'aaaaaa', 'phuc08@gmail.com', '1111111', 'TQ'),
(39, 'aaaaaa', 'phuc08@gmail.com', '1111111', 'TQ'),
(40, 'aaaaaa', 'phuc08@gmail.com', '1111111', 'TQ'),
(41, 'test', 'phuc08@gmail.com', '1111111', 'TQ'),
(42, 'test', 'phuc08@gmail.com', '1111111', 'TQ'),
(43, 'qqqqq', 'phuc08@gmail.com', '1111111', 'TQ'),
(44, 'qqqqq', 'phuc08@gmail.com', '1111111', 'TQ'),
(45, 'nhi', 'phuc08@gmail.com', '1111111', 'TQ'),
(46, 'nhi', 'nhinhi004@gmail.com', '0828594345', 'VN'),
(47, 'Khách vãng lai', 'hoainamchu@gmail.com', '03476643423', 'Khách vãng lai'),
(48, 'Khách vãng lai', 'hoainamchu@gmail.com', '03476643423', 'Khách vãng lai'),
(49, 'Khách vãng lai', 'hoainamchu@gmail.com', '03476643423', 'Khách vãng lai'),
(50, 'Khách vãng lai', 'hoainamchu@gmail.com', '03476643423', 'Khách vãng lai'),
(51, 'Khách vãng lai', 'hoainamchu@gmail.com', '03476643423', 'Khách vãng lai'),
(52, 'Khách vãng lai', 'hoainamchu@gmail.com', '03476643423', 'Khách vãng lai'),
(53, 'chu hoai nam', 'hoainamchu@gmail.com', '03684645656', 'Viet nam'),
(54, 'chu hoai nam', 'hoainamchu@gmail.com', '03684645656', 'Viet nam'),
(55, 'chu hoai nam', 'hoainamchu@gmail.com', '03684645656', 'Viet nam'),
(56, 'Chu Hoài Nam', 'chunam2606@gmail.com', '34535335', 'Viet nam'),
(57, 'chu hoai nam', 'chunam2606@gmail.com', '03684645656', 'Viet nam'),
(58, 'sfghcfgb', 'chunam2606@gmail.com', '03684645656', 'Viet nam'),
(59, 'chu hoai nam', 'chunam2606@gmail.com', '03684645656', 'Viet nam'),
(60, 'chu hoai nam', 'chunam2606@gmail.com', '03684645656', 'Viet nam'),
(61, 'chu hoai nam', 'chunam2606@gmail.com', '03684645656', 'Viet nam'),
(62, 'chu hoai nam', 'chunam2606@gmail.com', '03684645656', 'Việt Nam'),
(63, 'chu hoai nam', 'chunam2606@gmail.com', '03684645656', 'Việt Nam'),
(64, 'chu hoai nam', 'chunam2606@gmail.com', '03684645656', 'Viet nam');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int NOT NULL,
  `room_id` int NOT NULL,
  `discount_percent` decimal(5,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `room_id`, `discount_percent`, `start_date`, `end_date`) VALUES
(1, 1, '10.00', '2025-04-01', '2025-05-01'),
(2, 2, '15.50', '2025-04-10', '2025-04-20'),
(3, 3, '20.00', '2025-05-01', '2025-05-10'),
(4, 4, '10.00', '2025-04-10', '2025-04-20'),
(5, 5, '15.00', '2025-05-05', '2025-05-15'),
(6, 6, '20.00', '2025-06-01', '2025-06-10'),
(7, 7, '12.00', '2025-07-07', '2025-07-17'),
(8, 8, '18.00', '2025-04-25', '2025-05-05'),
(9, 9, '25.00', '2025-06-15', '2025-06-25'),
(26, 1, '10.00', '2025-04-01', '2025-05-01'),
(27, 2, '15.50', '2025-04-10', '2025-04-20'),
(28, 3, '20.00', '2025-05-01', '2025-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int NOT NULL,
  `booking_id` int NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_method` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Bank Transfer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `booking_id`, `amount`, `tax`, `total_amount`, `payment_date`, `payment_method`) VALUES
(1, 4, '600000.00', '0.00', '600000.00', '2025-01-12 06:08:45', 'Bank Transfer'),
(2, 5, '600000.00', '0.00', '600000.00', '2025-01-12 06:08:49', 'Bank Transfer'),
(3, 6, '600000.00', '0.00', '600000.00', '2025-01-12 06:33:08', 'Bank Transfer'),
(5, 8, '600000.00', '0.00', '600000.00', '2025-01-12 06:41:42', 'Bank Transfer'),
(9, 12, '1000000.00', '0.00', '1000000.00', '2025-01-13 06:20:45', 'Bank Transfer'),
(10, 13, '500000.00', '0.00', '500000.00', '2025-01-13 06:53:02', 'Bank Transfer'),
(11, 14, '800000.00', '0.00', '800000.00', '2025-01-15 01:56:52', 'Bank Transfer'),
(12, 15, '800000.00', '0.00', '800000.00', '2025-01-15 01:58:56', 'Bank Transfer'),
(13, 16, '600000.00', '0.00', '600000.00', '2025-01-15 01:59:29', 'Bank Transfer'),
(14, 17, '1500000.00', '0.00', '1500000.00', '2025-01-15 07:16:17', 'Bank Transfer'),
(15, 18, '300000.00', '0.00', '300000.00', '2025-01-21 07:15:13', 'Bank Transfer'),
(16, 19, '3500000.00', '0.00', '3500000.00', '2025-03-02 14:38:39', 'Bank Transfer'),
(18, 23, '500000.00', '0.00', '500000.00', '2025-04-05 00:48:45', 'CASH'),
(19, 24, '500000.00', '0.00', '500000.00', '2025-04-05 00:50:04', 'VNPAY'),
(20, 25, '500000.00', '0.00', '500000.00', '2025-04-05 00:51:58', 'VNPAY'),
(21, 26, '1000000.00', '0.00', '1000000.00', '2025-04-05 00:52:21', 'VNPAY'),
(22, 27, '450000.00', '0.00', '450000.00', '2025-04-05 19:02:59', 'VNPAY'),
(23, 28, '800000.00', '0.00', '800000.00', '2025-04-05 19:02:59', 'VNPAY'),
(25, 30, '800000.00', '0.00', '800000.00', '2025-04-05 19:04:25', 'VNPAY'),
(26, 31, '800000.00', '0.00', '800000.00', '2025-04-05 19:04:25', 'VNPAY'),
(28, 33, '800000.00', '0.00', '800000.00', '2025-04-07 12:57:11', 'CASH'),
(29, 34, '800000.00', '0.00', '800000.00', '2025-04-07 12:57:11', 'CASH'),
(30, 35, '800000.00', '0.00', '800000.00', '2025-04-07 12:57:48', 'CASH'),
(31, 36, '800000.00', '0.00', '800000.00', '2025-04-07 12:58:21', 'CASH'),
(32, 37, '800000.00', '0.00', '800000.00', '2025-04-07 12:58:21', 'CASH'),
(33, 38, '450000.00', '0.00', '450000.00', '2025-04-07 14:35:53', 'CASH'),
(34, 39, '450000.00', '0.00', '450000.00', '2025-04-07 14:36:18', 'CASH'),
(35, 40, '450000.00', '0.00', '450000.00', '2025-04-07 14:36:19', 'CASH'),
(36, 41, '600000.00', '0.00', '600000.00', '2025-04-07 14:48:56', 'CASH'),
(37, 42, '600000.00', '0.00', '600000.00', '2025-04-07 14:49:12', 'CASH');

-- --------------------------------------------------------

--
-- Table structure for table `room_booking`
--

CREATE TABLE `room_booking` (
  `id` int NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `booking_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` int DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'đang xử lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_booking`
--

INSERT INTO `room_booking` (`id`, `check_in`, `check_out`, `booking_date`, `customer_id`, `status`) VALUES
(2, '2024-12-21', '2024-12-31', '2024-12-27 09:02:58', 2, 'đã xác nhận'),
(3, '2024-12-22', '2024-12-25', '2024-12-27 09:02:58', 3, 'đã xác nhận'),
(4, '2025-01-12', '2025-01-13', '2025-01-12 06:08:45', 23, 'đã xác nhận'),
(5, '2025-01-12', '2025-01-13', '2025-01-12 06:08:49', 24, 'huỷ'),
(6, '2025-01-12', '2025-01-13', '2025-01-12 06:33:08', 25, 'huỷ'),
(7, '2025-01-12', '2025-01-13', '2025-01-12 06:37:39', 26, 'huỷ'),
(8, '2025-01-12', '2025-01-13', '2025-01-12 06:41:42', 27, 'đã xác nhận'),
(12, '2025-01-15', '2025-01-17', '2025-01-13 06:20:45', 32, 'đã xác nhận'),
(13, '2025-01-13', '2025-01-14', '2025-01-13 06:53:02', 34, 'huỷ'),
(14, '2025-01-15', '2025-01-16', '2025-01-15 01:56:52', 36, 'đang xử lý'),
(15, '2025-01-15', '2025-01-16', '2025-01-15 01:58:56', 39, 'đang xử lý'),
(16, '2025-01-15', '2025-01-16', '2025-01-15 01:59:29', 41, 'đã xác nhận'),
(17, '2025-01-17', '2025-01-20', '2025-01-15 07:16:17', 43, 'đang xử lý'),
(18, '2025-01-21', '2025-01-22', '2025-01-21 07:15:12', 45, 'đang xử lý'),
(19, '2025-03-05', '2025-03-12', '2025-03-02 14:38:39', 46, 'đang xử lý'),
(21, '2025-04-05', '2025-04-08', '2025-04-05 00:46:35', 47, 'đang xử lý'),
(23, '2025-04-05', '2025-04-06', '2025-04-05 00:48:45', 49, 'đang xử lý'),
(24, '2025-04-05', '2025-04-06', '2025-04-05 00:50:04', 50, 'đang xử lý'),
(25, '2025-04-05', '2025-04-06', '2025-04-05 00:51:58', 51, 'đang xử lý'),
(26, '2025-04-05', '2025-04-07', '2025-04-05 00:52:21', 52, 'đang xử lý'),
(27, '2025-04-06', '2025-04-07', '2025-04-05 19:02:59', 53, 'đang xử lý'),
(28, '2025-04-06', '2025-04-07', '2025-04-05 19:02:59', 53, 'đang xử lý'),
(30, '2025-04-06', '2025-04-07', '2025-04-05 19:04:25', 54, 'đang xử lý'),
(31, '2025-04-06', '2025-04-07', '2025-04-05 19:04:25', 54, 'đang xử lý'),
(33, '2025-04-07', '2025-04-08', '2025-04-07 12:57:11', 57, 'đang xử lý'),
(34, '2025-04-07', '2025-04-08', '2025-04-07 12:57:11', 57, 'đang xử lý'),
(35, '2025-04-07', '2025-04-08', '2025-04-07 12:57:48', 58, 'đang xử lý'),
(36, '2025-04-07', '2025-04-08', '2025-04-07 12:58:21', 59, 'đã xác nhận'),
(37, '2025-04-07', '2025-04-08', '2025-04-07 12:58:21', 59, 'đang xử lý'),
(38, '2025-04-07', '2025-04-08', '2025-04-07 14:35:53', 60, 'đang xử lý'),
(39, '2025-04-07', '2025-04-08', '2025-04-07 14:36:18', 61, 'đã xác nhận'),
(40, '2025-04-07', '2025-04-08', '2025-04-07 14:36:18', 61, 'đang xử lý'),
(41, '2025-04-07', '2025-04-08', '2025-04-07 14:48:56', 62, 'đang xử lý'),
(42, '2025-04-07', '2025-04-08', '2025-04-07 14:49:12', 63, 'đang xử lý');

-- --------------------------------------------------------

--
-- Table structure for table `room_booking_detail`
--

CREATE TABLE `room_booking_detail` (
  `id` int NOT NULL,
  `booking_id` int NOT NULL,
  `room_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_booking_detail`
--

INSERT INTO `room_booking_detail` (`id`, `booking_id`, `room_id`) VALUES
(1, 4, 3),
(2, 5, 3),
(3, 6, 3),
(4, 7, 3),
(5, 8, 3),
(9, 12, 1),
(10, 13, 1),
(11, 14, 2),
(12, 15, 2),
(13, 16, 3),
(14, 17, 1),
(16, 19, 1),
(17, 21, 2),
(19, 23, 1),
(20, 24, 1),
(21, 25, 1),
(22, 26, 1),
(23, 27, 1),
(24, 28, 2),
(26, 30, 2),
(27, 31, 2),
(29, 33, 2),
(30, 34, 2),
(31, 35, 2),
(32, 36, 2),
(33, 37, 2),
(34, 38, 1),
(35, 39, 1),
(36, 40, 1),
(37, 41, 3),
(38, 42, 3);

-- --------------------------------------------------------

--
-- Table structure for table `room_detail`
--

CREATE TABLE `room_detail` (
  `id` int NOT NULL,
  `room_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bed_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `area` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `view` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price_per_night` decimal(10,0) NOT NULL,
  `remaining_rooms` int DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `file_anh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_detail`
--

INSERT INTO `room_detail` (`id`, `room_type`, `bed_type`, `area`, `view`, `price_per_night`, `remaining_rooms`, `description`, `file_anh`) VALUES
(1, 'Standard', 'vip', '25', 'Garden View', '500000', -1, 'Phòng Standard với thiết kế tối giản nhưng tinh tế, phù hợp với khách du lịch hoặc công tác. Phòng rộng 25m², có giường VIP thoải mái, tầm nhìn ra khu vườn xanh mát giúp tạo cảm giác thư giãn. Trang bị đầy đủ tiện nghi: TV màn hình phẳng, điều hòa, minibar, bàn làm việc và WiFi tốc độ cao.', 'rooms/bmTwOFkNRamMtE2tuhaWZ7gb49WgnX9Q7HtYtAXY.png'),
(2, 'Deluxe', 'King', '35', 'Sea View', '800000', 0, 'Phòng Deluxe rộng rãi với diện tích 35m², giường King cỡ lớn mang lại giấc ngủ thoải mái. Tầm nhìn hướng biển tuyệt đẹp, lý tưởng cho các cặp đôi hoặc kỳ nghỉ thư giãn. Phòng được trang bị phòng tắm riêng với bồn tắm sang trọng, TV 50 inch, minibar, máy pha cà phê và khu vực tiếp khách.', 'deluxe.jpg'),
(3, 'Superior', 'Twin', '30', 'Mountain View', '600000', 6, 'Phòng Superior rộng 30m², thiết kế hiện đại với hai giường đơn, phù hợp cho nhóm bạn hoặc gia đình nhỏ. Hướng nhìn ra núi tạo không gian yên bình, thư giãn. Phòng có đầy đủ tiện ích: điều hòa, TV truyền hình cáp, minibar, két an toàn, bàn làm việc và phòng tắm riêng với vòi sen cao cấp.', 'superior.jpg'),
(4, 'Suite', 'King', '42', 'Ocean View', '1100000', 5, 'Phòng Suite cao cấp, rộng rãi với tầm nhìn hướng biển.', 'suite.jpg'),
(5, 'Grand Deluxe', 'Queen', '38', 'City View', '950000', 4, 'Phòng Grand Deluxe sang trọng, đầy đủ tiện nghi.', 'grand_deluxe.jpg'),
(6, 'Family', 'Double', '40', 'Pool View', '900000', 4, 'Phòng Family rộng rãi, phù hợp cho gia đình.', 'family.jpg'),
(7, 'Presidential Suite', 'King', '50', 'Ocean View', '1500000', 2, 'Phòng Tổng thống sang trọng, view biển.', 'presidential.jpg'),
(8, 'Executive', 'Queen', '32', 'City View', '700000', 6, 'Phòng Executive hiện đại, tiện nghi cao cấp.', 'executive.jpg'),
(9, 'Classic', 'Twin', '28', 'Garden View', '550000', 6, 'Phòng Classic có thiết kế ấm cúng, gần gũi.', 'classic.jpg'),
(20, 'VIP', 'VIP', '35', 'Mountain', '600000', 6, 'dfgdfg', 'rooms/qn1DH3k7FlAfAJCfr3xANlyHYnlmMtq1D5Fum6MJ.png');

-- --------------------------------------------------------

--
-- Table structure for table `room_discount`
--

CREATE TABLE `room_discount` (
  `id` int NOT NULL,
  `room_id` int NOT NULL,
  `discount_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `searching`
--

CREATE TABLE `searching` (
  `id` int NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `adults` int NOT NULL,
  `children` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `S_ID` int NOT NULL,
  `S_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `S_file` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `caption1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `caption2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`S_ID`, `S_img`, `S_file`, `caption1`, `caption2`) VALUES
(15, 'img/slide1.jpg', 'slideshow/slide1.jpg', 'Spend Your Holiday', 'Explore new experience with Golden Tree Hotel'),
(16, 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/416159326.jpg?k=49f57d2e204ca8f77529318a830f5f61b9d36c0de02c1da88bd232898c9736d2&o=&hp=1', 'slideshow/slide3.jpg', 'Nature meets Comfort', 'Explore new experience with Golden Tree Hotel'),
(17, 'https://images.trvl-media.com/lodging/1000000/10000/9100/9100/e6ebefae.jpg?impolicy=resizecrop&rw=1200&ra=fit', 'slideshow/slide4.jpg', 'Unwind with Us', 'Explore new experience with Golden Tree Hotel'),
(18, 'img/banner_bed.jpg', 'slideshow/slide3.jpg', 'Feel at Home', 'Explore new experience with Golden Tree Hotel'),
(19, 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/354661255.jpg?k=c3e75d3bc28b232bc41f4295e28f39d214794b2621babeae2e465c11bcea71af&o=&hp=1', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_taikhoan` int NOT NULL,
  `ten` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_vietnamese_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id_taikhoan`, `ten`, `email`, `password`, `is_admin`) VALUES
(1, 'Admin1', 'phuc08@gmail.com', '6c722b61037af619c6441b0d73f5d2d8', 1),
(4, 'Admin', 'admin@gmail.com', '$2y$10$TRI/nQOtj6rj/itqywxw7eY0jh88u.uypidjoKNASHXv0eJYKc7.C', 1),
(6, 'Chu Hoài Nam 1', 'chunam2606@gmail.com', '$2y$10$wJ1GMXwQHuLDK1OIwFBBheOU9cLoqSTdlti2KbxfjDWcDaNbyGSCO', 0),
(7, 'Chu Hoài Nam 2', 'hoainamchu@gmail.com', '$2y$10$n0tqfYXv2PeNbtS1EWdQUuWdJZeLyXooAhvimYiyq7mLmJ2AEdo0e', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `capacity`
--
ALTER TABLE `capacity`
  ADD PRIMARY KEY (`room_id`,`max_capacity`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `booking_id` (`booking_id`);

--
-- Indexes for table `room_booking`
--
ALTER TABLE `room_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_booking_customer` (`customer_id`);

--
-- Indexes for table `room_booking_detail`
--
ALTER TABLE `room_booking_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `room_detail`
--
ALTER TABLE `room_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_discount`
--
ALTER TABLE `room_discount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `discount_id` (`discount_id`);

--
-- Indexes for table `searching`
--
ALTER TABLE `searching`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`S_ID`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_taikhoan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `room_booking`
--
ALTER TABLE `room_booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `room_booking_detail`
--
ALTER TABLE `room_booking_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `room_detail`
--
ALTER TABLE `room_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `room_discount`
--
ALTER TABLE `room_discount`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `searching`
--
ALTER TABLE `searching`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `S_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_taikhoan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `capacity`
--
ALTER TABLE `capacity`
  ADD CONSTRAINT `fk_capacity_room` FOREIGN KEY (`room_id`) REFERENCES `room_detail` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room_detail` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `discount`
--
ALTER TABLE `discount`
  ADD CONSTRAINT `discount_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room_detail` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_booking` FOREIGN KEY (`booking_id`) REFERENCES `room_booking` (`id`);

--
-- Constraints for table `room_booking`
--
ALTER TABLE `room_booking`
  ADD CONSTRAINT `fk_booking_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Constraints for table `room_booking_detail`
--
ALTER TABLE `room_booking_detail`
  ADD CONSTRAINT `room_booking_detail_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `room_booking` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `room_booking_detail_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room_detail` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `room_discount`
--
ALTER TABLE `room_discount`
  ADD CONSTRAINT `room_discount_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room_detail` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `room_discount_ibfk_2` FOREIGN KEY (`discount_id`) REFERENCES `discount` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
