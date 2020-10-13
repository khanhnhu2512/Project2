-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2020 lúc 11:00 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logs`
--

CREATE TABLE `logs` (
  `username` varchar(256) NOT NULL,
  `action` varchar(256) NOT NULL,
  `lv` int(11) NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `management_image_banner`
--

CREATE TABLE `management_image_banner` (
  `id` int(11) NOT NULL,
  `url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `management_image_banner`
--

INSERT INTO `management_image_banner` (`id`, `url`) VALUES
(1, 'bg1.jpg'),
(5, 'bg2.jpg'),
(6, 'bg3.jpg'),
(7, 'bg4.jpg'),
(8, 'bg5.jpg'),
(9, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `management_site`
--

CREATE TABLE `management_site` (
  `logo_brand` varchar(256) NOT NULL,
  `name_brand` varchar(256) NOT NULL,
  `title_website` varchar(256) NOT NULL,
  `logo_website` varchar(256) NOT NULL,
  `footer_information_left` varchar(256) NOT NULL,
  `footer_information_center` varchar(256) NOT NULL,
  `footer_information_right` varchar(256) NOT NULL,
  `footer_information_bottom` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `management_site`
--

INSERT INTO `management_site` (`logo_brand`, `name_brand`, `title_website`, `logo_website`, `footer_information_left`, `footer_information_center`, `footer_information_right`, `footer_information_bottom`) VALUES
('LogoN-White.png', 'My store', 'My store', 'LogoN-Black.png', 'a', 'a', 'a', 'Copyright © 2020 KhanhNhu\'s N-BUY. All rights reserved.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `content` varchar(256) NOT NULL,
  `lv` int(11) NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `notifications`
--

INSERT INTO `notifications` (`id`, `content`, `lv`, `create_time`) VALUES
(2, 'test2', 1, '2020-10-12 14:56:36'),
(3, 'test2', 15, '2020-10-12 14:56:36'),
(4, 'test3', 1, '2020-10-12 14:56:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_product`, `price`, `qty`) VALUES
(90, 139, 40, 499, 2),
(91, 139, 39, 1299, 3),
(92, 140, 47, 699, 3),
(93, 140, 41, 1599, 4),
(94, 141, 47, 699, 3),
(95, 141, 41, 1599, 4),
(96, 142, 47, 699, 3),
(97, 142, 41, 1599, 4),
(98, 143, 47, 699, 3),
(99, 143, 41, 1599, 4),
(100, 144, 1, 1099, 3),
(101, 144, 37, 899, 4),
(102, 145, 1, 1099, 3),
(103, 145, 37, 899, 4),
(104, 146, 1, 1099, 3),
(105, 146, 37, 899, 4),
(106, 147, 1, 1099, 3),
(107, 147, 37, 899, 4),
(108, 148, 29, 2099, 1),
(109, 148, 42, 199, 1),
(110, 149, 29, 2099, 4),
(111, 149, 31, 999, 1),
(112, 150, 42, 199, 1),
(115, 152, 55, 699, 1),
(116, 152, 54, 699, 1),
(117, 153, 55, 699, 1),
(118, 153, 54, 699, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_list`
--

CREATE TABLE `order_list` (
  `username` varchar(256) NOT NULL,
  `id_order` int(11) NOT NULL,
  `fullname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `address` varchar(256) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_list`
--

INSERT INTO `order_list` (`username`, `id_order`, `fullname`, `email`, `phone_number`, `status`, `total_price`, `address`, `payment_method`, `create_time`) VALUES
('khanhnhu', 138, '', '', 0, 0, 999, 'aaa', 0, '2020-09-19 11:32:51'),
('khanhnhu', 139, '', '', 0, 0, 4895, 'abc', 0, '2020-09-19 11:33:03'),
('khanhnhu', 140, '', '', 0, 0, 8493, 'aaaaaaaaa', 0, '2020-09-19 11:35:21'),
('khanhnhu', 141, '', '', 0, 0, 8493, 'aaaaaaaaa', 0, '2020-09-19 11:35:49'),
('khanhnhu', 142, '', '', 0, 0, 8493, 'aaaaaaaaa', 0, '2020-09-19 11:36:51'),
('khanhnhu', 143, '', '', 0, 0, 8493, 'aaaaaaaaa', 0, '2020-09-19 11:37:51'),
('khanhnhu', 144, '', '', 0, 0, 6893, 'Ha Noi', 1, '2020-09-21 16:43:32'),
('khanhnhu', 145, '', '', 0, 0, 6893, 'Ha Noi', 1, '2020-09-21 16:47:54'),
('khanhnhu', 146, '', '', 0, 0, 6893, 'Ha Noi', 1, '2020-09-21 17:20:51'),
('khanhnhu', 147, '', '', 0, 0, 6893, 'Ha Noi', 1, '2020-09-21 17:23:25'),
('khanhnhu', 148, '', '', 0, 1, 2298, 'aaa', 0, '2020-09-22 10:26:57'),
('khanhnhu', 149, '', '', 0, 0, 9395, 'test', 0, '2020-09-29 09:49:30'),
('khanhnhu', 150, '', '', 0, 0, 199, 'Test', 0, '2020-09-29 10:57:50'),
('khanhnhu', 152, 'Lương Văn Như 2', '', 123456789, 0, 1398, 'Ha Noi', 0, '2020-10-12 12:24:47'),
('khanhnhu', 153, 'Lương Văn Như 2', 'luongvannhu2512@gmail.com', 123456789, 0, 1398, 'Ha Noi', 0, '2020-10-12 12:26:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` int(11) NOT NULL COMMENT 'category',
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 la hidden, 1 la show',
  `create_time` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `view` int(11) NOT NULL,
  `sold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `type`, `image`, `price`, `qty`, `description`, `status`, `create_time`, `last_updated`, `view`, `sold`) VALUES
(1, 'Iphone 11 Pro Max', 1, 'ip12-1.jpg', 1099, 7, 'Triple-camera system (Ultra Wide, Wide, Telephoto)<br>    Up to 20 hours of video playback1    Water resistant to a depth of 4 meters for up to 30 minutes    5.8” or 6.5” Super Retina XDR display', 0, '0000-00-00 00:00:00', '2020-09-12 11:33:21', 85, 0),
(2, 'iPhone XS Max', 1, 'ip12-2.jpg', 1249, 0, '\r\n    Dual-camera system (Ultra Wide, Wide)\r\n    Up to 17 hours of video playback1\r\n    Water resistant to a depth of 2 meters for up to 30 minutes\r\n    6.1” Liquid Retina HD display\r\n', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 0),
(3, 'iPhone 11', 1, 'ip12-3.jpg', 599, 0, '\r\n    \r\n    Dual-camera system (Ultra Wide, Wide)\r\n    Up to 17 hours of video playback1\r\n    Water resistant to a depth of 2 meters for up to 30 minutes\r\n    6.1” Liquid Retina HD display\r\n\r\n', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, 0),
(29, 'Macbook', 3, 'macbook-pro-2018-2.jpeg', 2099, 95, 'abc', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 5),
(30, 'Iphone 11 Pro Max', 1, 'ip12-3.jpg', 999, 20, 'abc', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(31, 'iPhone 11', 1, 'ip12-4.jpg', 999, 10, 'abc', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 1),
(32, 'iPhone 11', 2, 'ip12-4.jpg', 999, 11, 'abc', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, 0),
(33, 'Macbook 2', 3, '4477207_tinhte_tren_tay_apple_macbook_air_2018_2.jpg', 1499, 10, 'abc', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(34, 'iPhone 12', 1, 'ip12-3.jpg', 1999, 50, 'zxc', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(35, 'iPhone 7', 1, 'ip7-32.jpg', 399, 50, 'zxc', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(36, 'iPhone X', 1, 'ip12-2.jpg', 899, 100, 'asd', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(37, 'iPhone X black', 1, '600_ip_X_gray_800x800_2.jpg', 899, 100, 'asd', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 0),
(38, 'iPhone 11 Pro Max midnight green', 2, 'iphone-11-pro-max-midnight-green-select-2019.png', 1299, 100, 'zxc', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(39, 'iPhone 11 Pro Max silver ', 1, 'iphone-11-pro-max-silver-select-2019.png', 1299, 50, 'asd', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(40, 'iPhone 7 plus', 1, 'ip7p-32.jpg', 499, 200, 'abc', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(41, 'iPhone 12', 1, 'ip12-1.jpg', 1599, 50, 'abc', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(42, 'Air Pod 1', 4, 'ITunes_12.2_logo.png', 199, 998, 'abbbcc', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 2),
(44, 'ipad 2', 1, 'ip12-5.jpg', 799, 100, 'abc', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(46, 'ipad 2', 2, '4477207_tinhte_tren_tay_apple_macbook_air_2018_2.jpg', 899, 100, 'sadsdaas', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(47, 'ipad 1', 2, 'ip12-1.jpg', 699, 100, 'sadsdaas', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(48, 'iPhone', 1, 'ip12-1.jpg', 9999, 100, 'test', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(49, 'AirPods 2020', 4, 'ITunes_12.2_logo.png', 699, 10, 'Very Good', 0, '2020-10-12 10:08:45', '0000-00-00 00:00:00', 0, 0),
(50, 'AirPods 2020', 4, 'ITunes_12.2_logo.png', 699, 10, 'Very Good', 0, '2020-10-12 10:10:17', '0000-00-00 00:00:00', 0, 0),
(51, 'AirPods 2020', 4, 'ITunes_12.2_logo.png', 699, 10, 'Very Good', 0, '2020-10-12 10:10:39', '0000-00-00 00:00:00', 0, 0),
(52, 'AirPods 2020', 4, 'ITunes_12.2_logo.png', 699, 10, 'Very Good', 0, '2020-10-12 10:11:09', '0000-00-00 00:00:00', 0, 0),
(53, 'AirPods 2020', 4, 'ITunes_12.2_logo.png', 699, 10, 'Very Good', 1, '2020-10-12 10:13:54', '0000-00-00 00:00:00', 0, 0),
(54, 'AirPods 2020', 4, 'ITunes_12.2_logo.png', 699, 7, 'Very Good', 1, '2020-10-12 10:14:08', '0000-00-00 00:00:00', 0, 3),
(55, 'AirPods 2020', 4, 'ITunes_12.2_logo.png', 699, 7, 'Very Good', 1, '2020-10-12 10:18:01', '0000-00-00 00:00:00', 0, 3),
(58, 'Macbook 2020', 3, '4477207_tinhte_tren_tay_apple_macbook_air_2018_2.jpg', 1099, 20, 'Good', 1, '2020-10-13 02:16:39', '0000-00-00 00:00:00', 51, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_category`
--

INSERT INTO `product_category` (`id`, `name`) VALUES
(1, 'iPhone'),
(2, 'iPad'),
(3, 'Macbook'),
(4, 'Airpods');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category_information`
--

CREATE TABLE `product_category_information` (
  `id_category` int(11) NOT NULL,
  `display` int(11) NOT NULL COMMENT 'Màn hình',
  `operating_system` int(11) NOT NULL COMMENT 'Hệ điều hành',
  `front_camera` int(11) NOT NULL COMMENT 'Cam trước',
  `rear_camera` int(11) NOT NULL COMMENT 'Cam sau',
  `cpu` int(11) NOT NULL COMMENT 'CPU',
  `ram` int(11) NOT NULL COMMENT 'RAM',
  `rom` int(11) NOT NULL COMMENT 'ROM',
  `battery` int(11) NOT NULL COMMENT 'Pin',
  `security` int(11) NOT NULL COMMENT 'Bảo mật',
  `charging_port` int(11) NOT NULL COMMENT 'Cổng sạc',
  `compatible` int(11) NOT NULL COMMENT 'Tương thích',
  `sound_technology` int(11) NOT NULL COMMENT 'Công nghệ âm thnah',
  `used_time` int(11) NOT NULL COMMENT 'Thời gian sử dụng',
  `connect` int(11) NOT NULL COMMENT 'Kết nối',
  `weight` int(11) NOT NULL COMMENT 'Trọng lượng',
  `brand` int(11) NOT NULL COMMENT 'Thương hiệu',
  `made_in` int(11) NOT NULL COMMENT 'Sản xuất tại',
  `hard_drive` int(11) NOT NULL COMMENT 'Ổ cứng',
  `graphic_card` int(11) NOT NULL COMMENT 'Card đồ hoạ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_category_information`
--

INSERT INTO `product_category_information` (`id_category`, `display`, `operating_system`, `front_camera`, `rear_camera`, `cpu`, `ram`, `rom`, `battery`, `security`, `charging_port`, `compatible`, `sound_technology`, `used_time`, `connect`, `weight`, `brand`, `made_in`, `hard_drive`, `graphic_card`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category_name`
--

CREATE TABLE `product_category_name` (
  `display` varchar(256) NOT NULL COMMENT 'Màn hình',
  `operating_system` varchar(256) NOT NULL COMMENT 'Hệ điều hành',
  `front_camera` varchar(256) NOT NULL COMMENT 'Cam trước',
  `rear_camera` varchar(256) NOT NULL COMMENT 'Cam sau',
  `cpu` varchar(256) NOT NULL COMMENT 'CPU',
  `ram` varchar(256) NOT NULL COMMENT 'RAM',
  `rom` varchar(256) NOT NULL COMMENT 'ROM',
  `battery` varchar(256) NOT NULL COMMENT 'Pin',
  `security` varchar(256) NOT NULL COMMENT 'Bảo mật',
  `charging_port` varchar(256) NOT NULL COMMENT 'Cổng sạc',
  `compatible` varchar(256) NOT NULL COMMENT 'Tương thích',
  `sound_technology` varchar(256) NOT NULL COMMENT 'Công nghệ âm thnah',
  `used_time` varchar(256) NOT NULL COMMENT 'Thời gian sử dụng',
  `connect` varchar(256) NOT NULL COMMENT 'Kết nối',
  `weight` varchar(256) NOT NULL COMMENT 'Trọng lượng',
  `brand` varchar(256) NOT NULL COMMENT 'Thương hiệu',
  `made_in` varchar(256) NOT NULL COMMENT 'Sản xuất tại',
  `hard_drive` varchar(256) NOT NULL COMMENT 'Ổ cứng',
  `graphic_card` varchar(256) NOT NULL COMMENT 'Card đồ hoạ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_category_name`
--

INSERT INTO `product_category_name` (`display`, `operating_system`, `front_camera`, `rear_camera`, `cpu`, `ram`, `rom`, `battery`, `security`, `charging_port`, `compatible`, `sound_technology`, `used_time`, `connect`, `weight`, `brand`, `made_in`, `hard_drive`, `graphic_card`) VALUES
('Display', 'OS', 'Front camera', 'Rear camera', 'CPU', 'RAM', 'ROM', 'Battery', 'Security', 'Charging port', 'Compatible', 'Sound technology', 'Used time', 'Connect', 'Weight', 'Brand', 'Made in', 'Hard drive', 'Graphic card');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id_product` int(11) NOT NULL,
  `url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id_product`, `url`) VALUES
(58, 'icon.png'),
(58, 'macbook-pro-2018-2.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_information`
--

CREATE TABLE `product_information` (
  `id_product` int(11) NOT NULL,
  `display` varchar(256) NOT NULL COMMENT 'Màn hình',
  `operating_system` varchar(256) NOT NULL COMMENT 'Hệ điều hành',
  `front_camera` varchar(256) NOT NULL COMMENT 'Cam trước',
  `rear_camera` varchar(256) NOT NULL COMMENT 'Cam sau',
  `cpu` varchar(256) NOT NULL COMMENT 'CPU',
  `ram` varchar(256) NOT NULL COMMENT 'RAM',
  `rom` varchar(256) NOT NULL COMMENT 'ROM',
  `battery` varchar(256) NOT NULL COMMENT 'Pin',
  `security` varchar(256) NOT NULL COMMENT 'Bảo mật',
  `charging_port` varchar(256) NOT NULL COMMENT 'Cổng sạc',
  `compatible` varchar(256) NOT NULL COMMENT 'Tương thích',
  `sound_technology` varchar(256) NOT NULL COMMENT 'Công nghệ âm thnah',
  `used_time` varchar(256) NOT NULL COMMENT 'Thời gian sử dụng',
  `connect` varchar(256) NOT NULL COMMENT 'Kết nối',
  `weight` varchar(256) NOT NULL COMMENT 'Trọng lượng',
  `brand` varchar(256) NOT NULL COMMENT 'Thương hiệu',
  `made_in` varchar(256) NOT NULL COMMENT 'Sản xuất tại',
  `hard_drive` varchar(256) NOT NULL COMMENT 'Ổ cứng',
  `graphic_card` varchar(256) NOT NULL COMMENT 'Card đồ hoạ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_information`
--

INSERT INTO `product_information` (`id_product`, `display`, `operating_system`, `front_camera`, `rear_camera`, `cpu`, `ram`, `rom`, `battery`, `security`, `charging_port`, `compatible`, `sound_technology`, `used_time`, `connect`, `weight`, `brand`, `made_in`, `hard_drive`, `graphic_card`) VALUES
(58, '16 Inch', '11', '8 MP', '11 MP', 'i9 9900K', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `fullname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(100) NOT NULL,
  `lv` int(11) NOT NULL,
  `birthday` datetime NOT NULL,
  `create_time` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `email`, `password`, `lv`, `birthday`, `create_time`, `last_updated`) VALUES
(1, 'admin', 'Luong Van Nhu', 'luongvannhu@gmail.com', '1', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'khanhnhu', 'Luong Khanh Nhu', 'khanhnhu@gmail.com', '1', 100, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-10-12 14:24:55'),
(5, 'thinhu123', 'Lương Thị Như', 'luongthinhu@gmail.com', '789', 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-10-12 14:30:13'),
(7, 'Nhu', 'Như', 'nhu@gmail.com', 'nhu123456', 15, '0000-00-00 00:00:00', '2020-09-12 11:51:17', '2020-10-12 14:32:11'),
(8, 'nhu123', 'nhu', 'nhu123@gmail.com', '123456789', 15, '0000-00-00 00:00:00', '2020-09-25 02:41:12', '2020-10-12 14:32:47'),
(9, 'khanhnhu123', 'Nhu', 'luongvannhu2512@gmail.com', 'khanhnhu2', 15, '0000-00-00 00:00:00', '2020-09-29 09:25:02', '2020-10-12 14:33:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_level`
--

CREATE TABLE `user_level` (
  `id_lv` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user_level`
--

INSERT INTO `user_level` (`id_lv`, `name`) VALUES
(1, 'admin'),
(15, 'Staff'),
(100, 'Customers');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id_lv` int(11) NOT NULL,
  `dashboard` int(11) NOT NULL,
  `product_see` int(11) NOT NULL,
  `product_add` int(11) NOT NULL,
  `product_edit` int(11) NOT NULL,
  `product_delete` int(11) NOT NULL,
  `order_see` int(11) NOT NULL,
  `order_confirm` int(11) NOT NULL,
  `order_delete` int(11) NOT NULL,
  `user_see` int(11) NOT NULL,
  `user_edit` int(11) NOT NULL,
  `permission` int(11) NOT NULL,
  `notifications` int(11) NOT NULL,
  `management` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user_permissions`
--

INSERT INTO `user_permissions` (`id_lv`, `dashboard`, `product_see`, `product_add`, `product_edit`, `product_delete`, `order_see`, `order_confirm`, `order_delete`, `user_see`, `user_edit`, `permission`, `notifications`, `management`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(15, 1, 1, 1, 1, 0, 1, 1, 0, 0, 0, 0, 1, 0),
(100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `management_image_banner`
--
ALTER TABLE `management_image_banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_ibfk_1` (`lv`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_ibfk_1` (`id_order`),
  ADD KEY `order_detail_ibfk_2` (`id_product`);

--
-- Chỉ mục cho bảng `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id_order`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ibfk_1` (`type`);

--
-- Chỉ mục cho bảng `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_category_information`
--
ALTER TABLE `product_category_information`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `product_information`
--
ALTER TABLE `product_information`
  ADD PRIMARY KEY (`id_product`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_ibfk_1` (`lv`);

--
-- Chỉ mục cho bảng `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_lv`);

--
-- Chỉ mục cho bảng `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id_lv`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `management_image_banner`
--
ALTER TABLE `management_image_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT cho bảng `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_lv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`lv`) REFERENCES `user_level` (`id_lv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order_list` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`type`) REFERENCES `product_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_category_information`
--
ALTER TABLE `product_category_information`
  ADD CONSTRAINT `product_category_information_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `product_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_information`
--
ALTER TABLE `product_information`
  ADD CONSTRAINT `product_information_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD CONSTRAINT `user_permissions_ibfk_1` FOREIGN KEY (`id_lv`) REFERENCES `user_level` (`id_lv`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;