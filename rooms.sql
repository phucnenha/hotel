-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th3 24, 2025 lúc 01:49 PM
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
(3, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
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
(1, 'Nguyen Van A', '0987654300', 'user1@example.c', 'South Korea'),
(2, 'Tran Thi B', '0987654301', 'user2@example.c', 'Việt Nam'),
(3, 'Le Van C', '0987654302', 'user3@example.c', 'Việt Nam'),
(4, 'Pham Thi D', '0987654303', 'user4@example.c', 'Việt Nam'),
(5, 'Hoang Van E', '0987654304', 'user5@example.c', 'Việt Nam'),
(6, 'Vo Thi F', '0987654305', 'user6@example.c', 'Japan'),
(7, 'Dang Van G', '0987654306', 'user7@example.c', 'Việt Nam'),
(8, 'Bui Thi H', '0987654307', 'user8@example.c', 'Việt Nam'),
(9, 'Do Van I', '0987654308', 'user9@example.c', 'Việt Nam'),
(10, 'Ngo Thi J', '0987654309', 'user10@example.', 'France'),
(11, 'Dinh Van K', '0987654310', 'user11@example.', 'Việt Nam'),
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
(46, 'nhi', 'nhinhi004@gmail.com', '0828594345', 'VN');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `room_booking`
--

INSERT INTO `room_booking` (`id`, `check_in`, `check_out`, `booking_date`, `customer_id`, `status`) VALUES
(1, '2024-12-20', '2024-12-30', '2024-12-27 09:02:58', 1, 'đã xác nhận'),
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
(19, '2025-03-05', '2025-03-12', '2025-03-02 14:38:39', 46, 'đang xử lý');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `room_booking_detail`
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
(15, 18, 5),
(16, 19, 1);

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
  `image_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `file_anh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `room_detail`
--

INSERT INTO `room_detail` (`id`, `room_type`, `bed_type`, `area`, `view`, `price_per_night`, `remaining_rooms`, `image_url`, `description`, `file_anh`) VALUES
(1, 'Standard', 'vip', '25', 'Garden View', 500000, 2, 'https://pix8.agoda.net/hotelImages/32821722/533710535/ceb1a26569f81c18217b0b943b607c3c.jpg?ce=0&s=1024x', 'Phòng Standard với thiết kế tối giản nhưng tinh tế, phù hợp với khách du lịch hoặc công tác. Phòng rộng 25m², có giường VIP thoải mái, tầm nhìn ra khu vườn xanh mát giúp tạo cảm giác thư giãn. Trang bị đầy đủ tiện nghi: TV màn hình phẳng, điều hòa, minibar, bàn làm việc và WiFi tốc độ cao.', NULL),
(2, 'Deluxe', 'King', '35', 'Sea View', 800000, 3, 'https://pix8.agoda.net/property/902/612888323/4b5b42cefda33de4fb6b580c0ddd503c.jpeg?s=1024x', 'Phòng Deluxe rộng rãi với diện tích 35m², giường King cỡ lớn mang lại giấc ngủ thoải mái. Tầm nhìn hướng biển tuyệt đẹp, lý tưởng cho các cặp đôi hoặc kỳ nghỉ thư giãn. Phòng được trang bị phòng tắm riêng với bồn tắm sang trọng, TV 50 inch, minibar, máy pha cà phê và khu vực tiếp khách.', NULL),
(3, 'Superior', 'Twin', '30', 'Mountain View', 600000, 8, 'https://pix8.agoda.net/property/902/0/d212993ef90fa024e37b9370dc97fae4.jpeg?ce=0&s=1024x', 'Phòng Superior rộng 30m², thiết kế hiện đại với hai giường đơn, phù hợp cho nhóm bạn hoặc gia đình nhỏ. Hướng nhìn ra núi tạo không gian yên bình, thư giãn. Phòng có đầy đủ tiện ích: điều hòa, TV truyền hình cáp, minibar, két an toàn, bàn làm việc và phòng tắm riêng với vòi sen cao cấp.', NULL),
(5, 'vip', 'king', '22', 'núi', 300000, 4, 'https://ak-d.tripcdn.com/images/0221212000en8x4f14B50_R_600_400_R5.webp', 'Phòng VIP đẳng cấp với diện tích 22m², giường King cao cấp, thiết kế sang trọng với nội thất gỗ cao cấp và không gian ấm cúng. Tầm nhìn hướng núi, mang lại cảm giác thư giãn tuyệt đối. Phòng có khu vực tiếp khách riêng, minibar, TV 55 inch, hệ thống âm thanh chất lượng cao, bồn tắm sục và dịch vụ phòng 24/7.', NULL);

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
  `S_img` text COLLATE utf8mb4_general_ci NOT NULL,
  `caption1` text COLLATE utf8mb4_general_ci NOT NULL,
  `caption2` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`S_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `slideshow`
--

INSERT INTO `slideshow` (`S_ID`, `S_img`, `caption1`, `caption2`) VALUES
(15, 'img/goden_banner.jpg', 'Spend Your Holiday', 'Explore new experience with Golden Tree Hotel'),
(16, 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/416159326.jpg?k=49f57d2e204ca8f77529318a830f5f61b9d36c0de02c1da88bd232898c9736d2&o=&hp=1', 'Nature meets Comfort', 'Explore new experience with Golden Tree Hotel'),
(17, 'https://images.trvl-media.com/lodging/1000000/10000/9100/9100/e6ebefae.jpg?impolicy=resizecrop&rw=1200&ra=fit', 'Unwind with Us', 'Explore new experience with Golden Tree Hotel'),
(18, 'img/banner_bed.jpg', 'Feel at Home', 'Explore new experience with Golden Tree Hotel'),
(19, 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/354661255.jpg?k=c3e75d3bc28b232bc41f4295e28f39d214794b2621babeae2e465c11bcea71af&o=&hp=1', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `id_taikhoan` int NOT NULL AUTO_INCREMENT,
  `ten` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id_taikhoan`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_taikhoan`, `ten`, `email`, `password`) VALUES
(1, 'Admin1', 'phuc08@gmail.com', '6c722b61037af619c6441b0d73f5d2d8');

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
