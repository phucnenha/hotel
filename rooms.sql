-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th4 09, 2025 lúc 03:08 PM
-- Phiên bản máy phục vụ: 8.3.0
-- Phiên bản PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `rooms`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `capacity`
--

DROP TABLE IF EXISTS `capacity`;
CREATE TABLE IF NOT EXISTS `capacity` (
  `room_id` int NOT NULL,
  `max_capacity` int NOT NULL,
  PRIMARY KEY (`room_id`,`max_capacity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `capacity`
--

INSERT INTO `capacity` (`room_id`, `max_capacity`) VALUES
(1, 2),
(2, 4),
(3, 5),
(4, 3),
(5, 4),
(6, 6),
(7, 2),
(8, 3),
(9, 4),
(10, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `room_id` int NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `adults` int NOT NULL DEFAULT '1',
  `children` int NOT NULL DEFAULT '0',
  `quantity` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `room_id` (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nationality` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `full_name`, `email`, `phone`, `nationality`) VALUES
(1, 'Nguyen Van A', 'nguyenvana@example.com', '0909123456', 'Vietnam'),
(2, 'Tran Thi B', 'tranthib@example.com', '0912233445', 'Vietnam'),
(3, 'Le Hoang C', 'lehoangc@example.com', '0988776655', 'Vietnam'),
(4, 'Smith John', 'smithjohn@example.com', '1234567890', 'USA'),
(5, 'Maria Garcia', 'maria.garcia@example.com', '9876543210', 'Spain'),
(6, 'Pham Minh Tuan', 'tuanpm@example.com', '0909000001', 'Vietnam'),
(7, 'Nguyen Thi Lan', 'lannt@example.com', '0909000002', 'Vietnam'),
(8, 'Dang Hoang Long', 'longdh@example.com', '0909000003', 'Vietnam'),
(9, 'Vo Thi Thu', 'thuvt@example.com', '0909000004', 'Vietnam'),
(10, 'Phan Quoc Bao', 'baopq@example.com', '0909000005', 'Vietnam'),
(11, 'Doan Ngoc Anh', 'anhdn@example.com', '0909000006', 'Vietnam'),
(12, 'Le Van Nam', 'namlv@example.com', '0909000007', 'Vietnam'),
(13, 'Nguyen Hong Ha', 'hahg@example.com', '0909000008', 'Vietnam'),
(14, 'Tran Van Thanh', 'thanhtv@example.com', '0909000009', 'Vietnam'),
(15, 'Ngo Thi Huong', 'huongnt@example.com', '0909000010', 'Vietnam'),
(16, 'Nguyen Van Tinh', 'tinhnv@example.com', '0909000011', 'Vietnam'),
(17, 'Pham Thi Mai', 'maipt@example.com', '0909000012', 'Vietnam'),
(18, 'Bui Hoang Son', 'sonbh@example.com', '0909000013', 'Vietnam'),
(19, 'Tran Thi Cam', 'camtt@example.com', '0909000014', 'Vietnam'),
(20, 'Do Thi Hoa', 'hoadt@example.com', '0909000015', 'Vietnam'),
(21, 'Le Quang Hieu', 'hieulq@example.com', '0909000016', 'Vietnam'),
(22, 'Hoang Minh Phat', 'phathm@example.com', '0909000017', 'Vietnam'),
(23, 'Ly Bao Chau', 'chaulb@example.com', '0909000018', 'Vietnam'),
(24, 'Nguyen Tuan Kiet', 'kietnt@example.com', '0909000019', 'Vietnam'),
(25, 'Vo Minh Quan', 'quanvm@example.com', '0909000020', 'Vietnam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount`
--

DROP TABLE IF EXISTS `discount`;
CREATE TABLE IF NOT EXISTS `discount` (
  `id` int NOT NULL AUTO_INCREMENT,
  `room_id` int NOT NULL,
  `discount_percent` decimal(5,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `room_id` (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `discount`
--

INSERT INTO `discount` (`id`, `room_id`, `discount_percent`, `start_date`, `end_date`) VALUES
(1, 1, 10.00, '2025-04-01', '2025-05-01'),
(2, 2, 15.50, '2025-04-10', '2025-04-20'),
(3, 3, 20.00, '2025-05-01', '2025-05-10'),
(4, 4, 10.00, '2025-04-10', '2025-04-20'),
(5, 5, 15.00, '2025-05-05', '2025-05-15'),
(6, 6, 20.00, '2025-06-01', '2025-06-10'),
(7, 7, 12.00, '2025-07-07', '2025-07-17'),
(8, 8, 18.00, '2025-04-25', '2025-05-05'),
(9, 9, 25.00, '2025-06-15', '2025-06-25'),
(10, 10, 30.00, '2025-07-01', '2025-07-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `booking_id` int NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_method` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Bank Transfer',
  PRIMARY KEY (`id`),
  UNIQUE KEY `booking_id` (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`id`, `booking_id`, `amount`, `tax`, `total_amount`, `payment_date`, `payment_method`) VALUES
(1, 4, 600000.00, 0.00, 600000.00, '2025-01-12 06:08:45', 'Bank Transfer'),
(2, 5, 600000.00, 0.00, 600000.00, '2025-01-12 06:08:49', 'Bank Transfer'),
(3, 6, 600000.00, 0.00, 600000.00, '2025-01-12 06:33:08', 'Bank Transfer'),
(5, 8, 600000.00, 0.00, 600000.00, '2025-01-12 06:41:42', 'Bank Transfer'),
(9, 12, 1000000.00, 0.00, 1000000.00, '2025-01-13 06:20:45', 'Bank Transfer'),
(10, 13, 500000.00, 0.00, 500000.00, '2025-01-13 06:53:02', 'Bank Transfer'),
(11, 14, 800000.00, 0.00, 800000.00, '2025-01-15 01:56:52', 'Bank Transfer'),
(12, 15, 800000.00, 0.00, 800000.00, '2025-01-15 01:58:56', 'Bank Transfer'),
(13, 16, 600000.00, 0.00, 600000.00, '2025-01-15 01:59:29', 'Bank Transfer'),
(14, 17, 1500000.00, 0.00, 1500000.00, '2025-01-15 07:16:17', 'Bank Transfer'),
(15, 18, 300000.00, 0.00, 300000.00, '2025-01-21 07:15:13', 'Bank Transfer'),
(16, 19, 3500000.00, 0.00, 3500000.00, '2025-03-02 14:38:39', 'Bank Transfer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_booking`
--

DROP TABLE IF EXISTS `room_booking`;
CREATE TABLE IF NOT EXISTS `room_booking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `booking_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` int NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'đang xử lý',
  PRIMARY KEY (`id`),
  KEY `fk_booking_customer` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `room_booking`
--

INSERT INTO `room_booking` (`id`, `check_in`, `check_out`, `booking_date`, `customer_id`, `status`) VALUES
(1, '2025-04-15', '2025-04-17', '2025-03-05 08:30:00', 1, 'đã xác nhận'),
(2, '2025-04-20', '2025-04-22', '2025-03-08 15:20:00', 2, 'đang xử lý'),
(3, '2025-04-10', '2025-04-12', '2025-03-15 11:45:00', 3, 'hủy'),
(4, '2025-05-01', '2025-05-03', '2025-03-20 09:10:00', 4, 'đã xác nhận'),
(5, '2025-04-25', '2025-04-28', '2025-03-22 14:35:00', 5, 'đang xử lý'),
(6, '2025-04-12', '2025-04-14', '2025-03-30 10:25:00', 6, 'đã xác nhận'),
(7, '2025-04-15', '2025-04-17', '2025-04-01 09:00:00', 7, 'đang xử lý'),
(8, '2025-04-18', '2025-04-20', '2025-04-02 18:45:00', 8, 'hủy'),
(9, '2025-04-21', '2025-04-23', '2025-04-03 14:10:00', 9, 'đã xác nhận'),
(10, '2025-04-24', '2025-04-26', '2025-04-04 16:30:00', 10, 'đang xử lý'),
(11, '2025-04-27', '2025-04-29', '2025-04-05 20:15:00', 11, 'hủy'),
(12, '2025-04-30', '2025-05-02', '2025-04-06 08:50:00', 12, 'đã xác nhận'),
(13, '2025-05-03', '2025-05-05', '2025-04-06 11:05:00', 13, 'đang xử lý'),
(14, '2025-05-06', '2025-05-08', '2025-04-07 13:30:00', 14, 'hủy'),
(15, '2025-05-09', '2025-05-11', '2025-04-07 17:00:00', 15, 'đã xác nhận'),
(16, '2025-05-12', '2025-05-14', '2025-04-08 09:25:00', 16, 'đang xử lý'),
(17, '2025-05-15', '2025-05-17', '2025-04-08 15:15:00', 17, 'hủy'),
(18, '2025-05-18', '2025-05-20', '2025-04-09 08:00:00', 18, 'đã xác nhận'),
(19, '2025-05-21', '2025-05-23', '2025-04-09 12:45:00', 19, 'đang xử lý'),
(20, '2025-05-24', '2025-05-26', '2025-04-09 20:30:00', 20, 'hủy'),
(21, '2025-05-27', '2025-05-29', '2025-04-10 07:20:00', 21, 'đã xác nhận'),
(22, '2025-05-30', '2025-06-01', '2025-04-10 09:10:00', 22, 'hủy'),
(23, '2025-06-02', '2025-06-04', '2025-04-10 13:45:00', 23, 'Đã huỷ'),
(24, '2025-06-05', '2025-06-07', '2025-04-10 16:00:00', 24, 'Đã xác nhận'),
(25, '2025-06-08', '2025-06-10', '2025-04-10 21:45:00', 25, 'đang xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_booking_detail`
--

DROP TABLE IF EXISTS `room_booking_detail`;
CREATE TABLE IF NOT EXISTS `room_booking_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `booking_id` int NOT NULL,
  `room_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_id` (`booking_id`),
  KEY `room_id` (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `room_booking_detail`
--

INSERT INTO `room_booking_detail` (`id`, `booking_id`, `room_id`) VALUES
(1, 1, 2),
(2, 2, 5),
(3, 3, 3),
(4, 4, 1),
(5, 5, 7),
(6, 6, 4),
(7, 7, 6),
(8, 8, 8),
(9, 9, 2),
(10, 10, 9),
(11, 11, 10),
(12, 12, 1),
(13, 13, 5),
(14, 14, 3),
(15, 15, 6),
(16, 16, 7),
(17, 17, 8),
(18, 18, 4),
(19, 19, 9),
(20, 20, 2),
(21, 21, 3),
(23, 23, 10),
(24, 24, 6),
(26, 25, 5),
(27, 22, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_detail`
--

DROP TABLE IF EXISTS `room_detail`;
CREATE TABLE IF NOT EXISTS `room_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `room_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bed_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `area` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `view` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price_per_night` decimal(10,0) NOT NULL,
  `remaining_rooms` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `file_anh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `room_detail`
--

INSERT INTO `room_detail` (`id`, `room_type`, `bed_type`, `area`, `view`, `price_per_night`, `remaining_rooms`, `description`, `file_anh`) VALUES
(1, 'Standard', 'vip', '25', 'Garden View', 500000, 2, 'Phòng Standard với thiết kế tối giản nhưng tinh tế, phù hợp với khách du lịch hoặc công tác. Phòng rộng 25m², có giường VIP thoải mái, tầm nhìn ra khu vườn xanh mát giúp tạo cảm giác thư giãn. Trang bị đầy đủ tiện nghi: TV màn hình phẳng, điều hòa, minibar, bàn làm việc và WiFi tốc độ cao.', 'standard.jpg'),
(2, 'Deluxe', 'King', '35', 'Sea View', 800000, 3, 'Phòng Deluxe rộng rãi với diện tích 35m², giường King cỡ lớn mang lại giấc ngủ thoải mái. Tầm nhìn hướng biển tuyệt đẹp, lý tưởng cho các cặp đôi hoặc kỳ nghỉ thư giãn. Phòng được trang bị phòng tắm riêng với bồn tắm sang trọng, TV 50 inch, minibar, máy pha cà phê và khu vực tiếp khách.', 'deluxe.jpg'),
(3, 'Superior', 'Twin', '30', 'Mountain View', 600000, 8, 'Phòng Superior rộng 30m², thiết kế hiện đại với hai giường đơn, phù hợp cho nhóm bạn hoặc gia đình nhỏ. Hướng nhìn ra núi tạo không gian yên bình, thư giãn. Phòng có đầy đủ tiện ích: điều hòa, TV truyền hình cáp, minibar, két an toàn, bàn làm việc và phòng tắm riêng với vòi sen cao cấp.', 'superior.jpg'),
(4, 'Suite', 'King', '42', 'Ocean View', 1100000, 5, 'Phòng Suite cao cấp, rộng rãi với tầm nhìn hướng biển.', 'suite.jpg'),
(5, 'Grand Deluxe', 'Queen', '38', 'City View', 950000, 4, 'Phòng Grand Deluxe sang trọng, đầy đủ tiện nghi.', 'grand_deluxe.jpg'),
(6, 'Family', 'Double', '40', 'Pool View', 900000, 4, 'Phòng Family rộng rãi, phù hợp cho gia đình.', 'family.jpg'),
(7, 'Presidential Suite', 'King', '50', 'Ocean View', 1500000, 2, 'Phòng Tổng thống sang trọng, view biển.', 'presidential.jpg'),
(8, 'Executive', 'Queen', '32', 'City View', 700000, 6, 'Phòng Executive hiện đại, tiện nghi cao cấp.', 'executive.jpg'),
(9, 'Classic', 'Twin', '28', 'Garden View', 550000, 5, 'Phòng Classic có thiết kế ấm cúng, gần gũi.', 'classic.jpg'),
(10, 'Luxury', 'King', '45', 'Sea View', 1300000, 3, 'Phòng Luxury đẳng cấp với không gian rộng rãi.', 'luxury.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room_discount`
--

DROP TABLE IF EXISTS `room_discount`;
CREATE TABLE IF NOT EXISTS `room_discount` (
  `id` int NOT NULL AUTO_INCREMENT,
  `room_id` int NOT NULL,
  `discount_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `room_id` (`room_id`),
  KEY `discount_id` (`discount_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `searching`
--

DROP TABLE IF EXISTS `searching`;
CREATE TABLE IF NOT EXISTS `searching` (
  `id` int NOT NULL AUTO_INCREMENT,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `adults` int NOT NULL,
  `children` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slideshow`
--

DROP TABLE IF EXISTS `slideshow`;
CREATE TABLE IF NOT EXISTS `slideshow` (
  `S_ID` int NOT NULL AUTO_INCREMENT,
  `S_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `S_file` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `caption1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `caption2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`S_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `slideshow`
--

INSERT INTO `slideshow` (`S_ID`, `S_img`, `S_file`, `caption1`, `caption2`) VALUES
(15, 'img/slide1.jpg', 'slideshow/slide1.jpg', 'Spend Your Holiday', 'Explore new experience with Golden Tree Hotel'),
(16, 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/416159326.jpg?k=49f57d2e204ca8f77529318a830f5f61b9d36c0de02c1da88bd232898c9736d2&o=&hp=1', 'slideshow/slide3.jpg', 'Nature meets Comfort', 'Explore new experience with Golden Tree Hotel'),
(17, 'https://images.trvl-media.com/lodging/1000000/10000/9100/9100/e6ebefae.jpg?impolicy=resizecrop&rw=1200&ra=fit', 'slideshow/slide4.jpg', 'Unwind with Us', 'Explore new experience with Golden Tree Hotel'),
(18, 'img/banner_bed.jpg', 'slideshow/slide3.jpg', 'Feel at Home', 'Explore new experience with Golden Tree Hotel');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `id_taikhoan` int NOT NULL AUTO_INCREMENT,
  `ten` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_taikhoan`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_taikhoan`, `ten`, `email`, `password`, `is_admin`) VALUES
(1, 'Admin1', 'phuc08@gmail.com', '6c722b61037af619c6441b0d73f5d2d8', 1),
(4, 'Admin', 'admin@gmail.com', '$2y$10$TRI/nQOtj6rj/itqywxw7eY0jh88u.uypidjoKNASHXv0eJYKc7.C', 1),
(6, 'phuc', 'phuc1310@gmail.com', '$2y$10$wJ1GMXwQHuLDK1OIwFBBheOU9cLoqSTdlti2KbxfjDWcDaNbyGSCO', 0),
(7, 'ha', 'giaoha@gmail.com', '$2y$10$n0tqfYXv2PeNbtS1EWdQUuWdJZeLyXooAhvimYiyq7mLmJ2AEdo0e', 0);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `capacity`
--
ALTER TABLE `capacity`
  ADD CONSTRAINT `fk_capacity_room` FOREIGN KEY (`room_id`) REFERENCES `room_detail` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room_detail` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `discount`
--
ALTER TABLE `discount`
  ADD CONSTRAINT `discount_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room_detail` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_booking` FOREIGN KEY (`booking_id`) REFERENCES `room_booking` (`id`);

--
-- Các ràng buộc cho bảng `room_booking`
--
ALTER TABLE `room_booking`
  ADD CONSTRAINT `fk_booking_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `room_booking_detail`
--
ALTER TABLE `room_booking_detail`
  ADD CONSTRAINT `room_booking_detail_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `room_booking` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `room_booking_detail_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room_detail` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `room_discount`
--
ALTER TABLE `room_discount`
  ADD CONSTRAINT `room_discount_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room_detail` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `room_discount_ibfk_2` FOREIGN KEY (`discount_id`) REFERENCES `discount` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
