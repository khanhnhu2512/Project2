-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2020 lúc 11:25 AM
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

--
-- Đang đổ dữ liệu cho bảng `logs`
--

INSERT INTO `logs` (`username`, `action`, `lv`, `create_time`) VALUES
('admin', 'View detail order', 1, '2020-10-19 07:17:27'),
('admin', 'Edit Category', 1, '2020-10-19 08:26:48'),
('admin', 'Edit Category', 1, '2020-10-19 08:27:30'),
('admin', 'Edit Category', 1, '2020-10-19 08:28:50'),
('admin', 'Edit Category', 1, '2020-10-19 08:29:43'),
('admin', 'Add product', 1, '2020-10-19 08:59:28'),
('admin', 'Add product', 1, '2020-10-19 09:04:49'),
('admin', 'Add product', 1, '2020-10-19 09:13:03'),
('admin', 'Add product', 1, '2020-10-19 09:16:50'),
('admin', 'Add product', 1, '2020-10-19 09:20:21'),
('admin', 'Add product', 1, '2020-10-19 09:24:11'),
('admin', 'Add product', 1, '2020-10-19 09:26:42'),
('admin', 'Add product', 1, '2020-10-19 09:30:10'),
('admin', 'Add product', 1, '2020-10-19 09:32:59'),
('admin', 'Add product', 1, '2020-10-19 09:36:02'),
('admin', 'Add product', 1, '2020-10-19 09:40:25'),
('admin', 'Add product', 1, '2020-10-19 09:44:03'),
('admin', 'Add product', 1, '2020-10-19 09:46:46'),
('admin', 'Add product', 1, '2020-10-19 09:49:29'),
('admin', 'Edit product', 1, '2020-10-19 09:50:07'),
('admin', 'Edit product', 1, '2020-10-19 09:50:35'),
('admin', 'Edit product', 1, '2020-10-19 09:52:02'),
('admin', 'Accept order', 1, '2020-10-19 09:59:51'),
('admin', 'View detail order', 1, '2020-10-19 09:59:58'),
('admin', 'View detail order', 1, '2020-10-19 10:00:08'),
('admin', 'Completed order', 1, '2020-10-19 10:07:58'),
('admin', 'View detail order', 1, '2020-10-19 10:08:02'),
('admin', 'View detail order', 1, '2020-10-19 10:11:41'),
('admin', 'View detail order', 1, '2020-10-19 10:11:48'),
('admin', 'Completed order', 1, '2020-10-19 10:11:53'),
('admin', 'View detail order', 1, '2020-10-19 10:12:53'),
('admin', 'Completed order', 1, '2020-10-19 10:13:02'),
('admin', 'View detail order', 1, '2020-10-19 10:13:04'),
('admin', 'View detail order', 1, '2020-10-19 10:13:47'),
('admin', 'Accept order', 1, '2020-10-19 10:13:53'),
('admin', 'View detail order', 1, '2020-10-19 10:15:53'),
('admin', 'View detail order', 1, '2020-10-19 10:15:59'),
('admin', 'Add notifications', 1, '2020-10-19 10:16:23'),
('admin', 'Add notifications', 1, '2020-10-19 10:16:23'),
('admin', 'Add notifications', 1, '2020-10-19 10:16:23'),
('admin', 'Accept order', 1, '2020-10-19 10:33:38'),
('admin', 'Completed order', 1, '2020-10-19 10:33:40'),
('admin', 'View detail order', 1, '2020-10-19 10:33:45'),
('admin', 'Add Category', 1, '2020-10-19 10:34:28'),
('admin', 'Add product', 1, '2020-10-19 10:36:04');

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
('LogoN-White.png', 'My store', 'My store', 'LogoN-Black.png', 'a', 'a', 'a', 'Copyright © 2020 KhanhNhu\'s N-BUY. All rights reserved.'),
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
(5, 'New order fromLương Văn Như', 1, '2020-10-19 02:02:48'),
(6, 'New order fromLương Văn Như', 15, '2020-10-19 02:02:48'),
(7, 'New order from Lương Văn Như', 1, '2020-10-19 09:53:51'),
(8, 'New order from Lương Văn Như', 15, '2020-10-19 09:53:51'),
(9, 'New order from Lương Văn Như', 1, '2020-10-19 09:57:51'),
(10, 'New order from Lương Văn Như', 15, '2020-10-19 09:57:51'),
(11, 'New order from Lương Văn Như', 1, '2020-10-19 10:13:38'),
(12, 'New order from Lương Văn Như', 15, '2020-10-19 10:13:38'),
(13, 'Test', 1, '2020-10-19 10:16:23'),
(14, 'Test', 15, '2020-10-19 10:16:23'),
(15, 'Test', 100, '2020-10-19 10:16:23'),
(16, 'New order from Lương Văn Như', 1, '2020-10-19 10:32:16'),
(17, 'New order from Lương Văn Như', 15, '2020-10-19 10:32:16'),
(18, 'New order from Lương Văn Như', 1, '2020-10-19 10:32:22'),
(19, 'New order from Lương Văn Như', 15, '2020-10-19 10:32:22');

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
(120, 155, 64, 499, 2),
(121, 155, 69, 3499, 1),
(122, 155, 66, 2099, 1),
(123, 156, 69, 3499, 1),
(124, 156, 71, 499, 1),
(125, 157, 71, 499, 1),
(126, 158, 66, 2099, 1),
(127, 158, 71, 499, 1),
(128, 159, 66, 2099, 1),
(129, 159, 71, 499, 1);

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
('khanhnhu', 155, 'Lương Văn Như', 'luongvannhu2512@gmail.com', 338638736, 2, 6596, 'Ha Noi', 0, '2020-10-19 09:53:50'),
('khanhnhu', 156, 'Lương Văn Như', 'luongvannhu2512@gmail.com', 338638736, 1, 3998, 'Ha Noi', 0, '2020-10-19 09:57:51'),
('khanhnhu', 157, 'Lương Văn Như', 'luongvannhu2512@gmail.com', 338638736, 0, 499, 'Ha Noi', 0, '2020-10-19 10:13:38'),
('khanhnhu', 158, 'Lương Văn Như', 'luongvannhu2512@gmail.com', 338638736, 0, 2598, 'Ha Noi', 0, '2020-10-19 10:32:16'),
('khanhnhu', 159, 'Lương Văn Như', 'luongvannhu2512@gmail.com', 338638736, 2, 2598, 'Ha Noi', 0, '2020-10-19 10:32:22');

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
(59, 'iPhone 11 64GB', 1, 'ip12-3.jpg', 899, 200, 'Made in Viet Nam', 1, '2020-10-19 08:59:28', '0000-00-00 00:00:00', 0, 0),
(60, 'Iphone 11 Pro Max', 1, '637037687763926758_11-pro-max-xanh.png', 1099, 200, 'Made in Viet Nam', 1, '2020-10-19 09:04:49', '0000-00-00 00:00:00', 1, 0),
(61, 'iPhone 12', 1, 'iPhone-12-concept-conceptes-iphone.jpg', 1599, 200, 'Made in Viet Nam', 1, '2020-10-19 09:13:02', '2020-10-19 09:50:35', 1, 0),
(62, 'iPhone X', 1, 'iphone-x-1-min-compressor.jpg', 599, 0, 'OK', 1, '2020-10-19 09:16:50', '2020-10-19 09:52:02', 1, 0),
(63, 'iPhone XS Max', 1, 'xs-max-trang-cd80a8a5-8d7c-42ec-9e1d-eafee23470a4.png', 799, 200, 'OK', 1, '2020-10-19 09:20:21', '0000-00-00 00:00:00', 0, 0),
(64, 'iPhone 8 Plus', 1, 'iphone-8-plus-red_0ef9f18c7adc499a82af3cdbc45b9ecc_grande.jpg', 499, 198, 'OK', 1, '2020-10-19 09:24:10', '0000-00-00 00:00:00', 0, 2),
(65, 'iPhone 7 Plus', 1, '10035346-dien-thoai-iphone-7-plus-128gb-black-1.jpg', 399, 200, 'OK', 1, '2020-10-19 09:26:42', '0000-00-00 00:00:00', 0, 0),
(66, 'iPad Air 4', 2, 'air_2_silver_master.jpg', 2099, 97, 'ok', 1, '2020-10-19 09:30:10', '0000-00-00 00:00:00', 0, 3),
(67, 'iPad Pro 2020', 2, 'ipad-pro-12-select-wifi-silver-202003_FMT_WHH.png', 3000, 100, 'ok', 1, '2020-10-19 09:32:58', '0000-00-00 00:00:00', 0, 0),
(68, 'iPad Mini 2020', 2, '34921_ipad_mini_5_gold_1.png', 1299, 100, 'ok', 1, '2020-10-19 09:36:02', '0000-00-00 00:00:00', 1, 0),
(69, 'Macbook Pro', 3, '01.jpg', 3499, 98, 'ok', 1, '2020-10-19 09:40:25', '0000-00-00 00:00:00', 0, 2),
(70, 'Macbook Air', 3, 'mbp16touch-space-select-201911.jpg', 3599, 100, 'ok', 1, '2020-10-19 09:44:02', '0000-00-00 00:00:00', 0, 0),
(71, 'AirPods Pro', 4, 'MWP22.jpg', 499, 496, 'ok', 1, '2020-10-19 09:46:46', '2020-10-19 09:50:06', 1, 4),
(72, 'AirPods 2', 4, 'tai-nghe-bluetooth-airpods-2-apple-mv7n2-trang-avatar-1-600x600.jpg', 299, 500, 'ok', 1, '2020-10-19 09:49:29', '0000-00-00 00:00:00', 0, 0),
(73, 'iPhone', 1, '6ad8968a4381df1db9ee7a5fda58eec7.jpg', 999, 100, 'ok', 1, '2020-10-19 10:36:04', '0000-00-00 00:00:00', 0, 0);

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
(4, 'Airpods'),
(12, 'Apple Watch');

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
(1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 1, 0, 1, 0, 0),
(2, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 1, 1, 1, 0, 1, 1, 0, 1, 0, 1, 0, 0, 0, 1, 1, 0, 0, 1, 1),
(4, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0),
(12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
('Display', 'OS', 'Front camera', 'Rear camera', 'CPU', 'RAM', 'ROM', 'Battery', 'Security', 'Charging port', 'Compatible', 'Sound technology', 'Used time', 'Connect', 'Weight', 'Brand', 'Made in', 'Hard drive', 'Graphic card'),
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
(59, '11-green.jpg'),
(59, '36944_iphone11_white_select_2019.jpg'),
(59, '637037652457717299_11-den.png'),
(60, '637037652457717299_11-den.png'),
(60, '637037687763926758_11-pro-max-xanh.png'),
(61, 'iphone-11-pro-hai-phong-01.jpg'),
(62, '4512fe9898661b5f3746f91370a22158.jpg'),
(62, 'ip12-6.jpg'),
(62, 'iphone-x-silver-2.jpg'),
(63, '4512fe9898661b5f3746f91370a22158.jpg'),
(63, 'ip12-2.jpg'),
(63, 'xs-max-vang-86d20f37-92ab-4803-9b02-1ba2726618bf.png'),
(64, 'iphone-8-plus-128gb-082720-052716-600x600.jpg'),
(64, 'iphone-8-plus-red_0ef9f18c7adc499a82af3cdbc45b9ecc_grande.jpg'),
(65, '636836609818617272_ip7-plus-hong-1.png'),
(65, 'ip7p-32.jpg'),
(66, '61AK3IeXApL._AC_SX466_.jpg'),
(66, '61is5y-+MeL._AC_SL1500_.jpg'),
(67, '61AK3IeXApL._AC_SX466_.jpg'),
(67, '61is5y-+MeL._AC_SL1500_.jpg'),
(68, 'ipadmini5-jpeg-e0657da8-586e-4978-bd63-12022162a565.jpg'),
(68, 'silver_wifi.png'),
(69, '1573663014_1520445.jpg'),
(69, 'apple-macbook-air-2020-vântay-220173-600x600.jpg'),
(70, '726b328e-be3b-4df3-8f27-339819336fb6.jpg'),
(70, '38257_apple_macbook_air_mvh52_1_1.jpg'),
(70, 'apple-macbook-air-2020-vântay-220173-600x600.jpg'),
(71, '600_thumb_airpodpro.jpg'),
(71, 'MWP22.jpg'),
(72, 'apple-airpods-2-with-wireless-charging-case-mrxj2zm-a-white-21032019-01-p.jpg'),
(72, 'MWP22.jpg'),
(71, ''),
(61, 'ip12-4 (1).jpg'),
(62, ''),
(73, '6ad8968a4381df1db9ee7a5fda58eec7.jpg'),
(73, '11-green.jpg'),
(73, '600_ip_X_gray_800x800_2.jpg');

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
(59, 'IPS LCD, 6.1\", Liquid Retina ', 'iOS 13', '12 MP', '2 Camera 12MP', 'Apple A13', '4GB', '64GB', '3110 mAh', '0', 'Lightning', '0', '0', '0', '0', '194 g', '0', 'Viet Nam', '0', '0'),
(60, 'OLED, 6.5\" Super Retina XDR', 'iOS 13', '12 MP', '3 Camera 12 MP', 'Apple A13', '4GB', '256GB', '3969 mAh', '0', 'Lightning', '0', '0', '0', '0', '226g', '0', 'Viet Nam', '0', '0'),
(61, '6.1', 'iOS 13', '12 MP', '2 camera 12 MP', 'Apple A14', '6GB', '128GB', '4000 mAh', '0', 'Lightning', '0', '0', '0', '0', '200g', '0', 'Viet Nam', '0', '0'),
(62, 'OLED 5.1\" Super Retina', 'iOS 12', '7MP', '2 camera 12MP', 'Apple A12', '4GB', '64GB', '2658 mAh', '0', 'Lightning', '0', '0', '0', '0', '177g', '0', 'Viet Nam', '0', '0'),
(63, 'OLED 6.4\" Super Retina', 'iOS 12', '7MP', '2 camera 12MP', 'Apple A12', '4GB', '128GB', '3128 mAh', '0', 'Lightning', '0', '0', '0', '0', '261g', '0', 'Viet Nam', '0', '0'),
(64, 'OLED 5.5\" Retina HD', 'iOS 13', '7MP', '2 camera 12MP', 'Apple A11', '3GB', '128GB', '2691 mAh', '0', 'Lightning', '0', '0', '0', '0', '202g', '0', 'Viet Nam', '0', '0'),
(65, 'OLED 5.5\" Retina HD', 'iOS 13', '7MP', '2 camera 12MP', 'Apple A10', '3GB', '32GB', '2900 mAh', '0', 'Lightning', '0', '0', '0', '0', '201g', '0', 'Viet Nam', '0', '0'),
(66, 'Liquid Retina 10.8\"', 'iPadOS 14', '7MP', '12MP', 'Apple A14', '6GB', '256GB', '3000 mAh', '0', 'Type-C', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(67, 'Liquid Retina 11\"', 'iPadOS 13', '7MP', '12MP', 'Apple A12Z', '6GB', '128GB', '7600 mAh', '0', 'Type-C', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(68, 'LCD 7.9\"', 'iPadOS 13', '7MP', '8MP', 'Apple A12', '3GB', '64GB', '5124 mAh', '0', 'Type-C', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(69, '13.3 Super Retina', 'Mac OS', '10MP', '0', 'Intel Core i5 8th', '8GB LPDDR3', '0', '10000 mAh', '0', 'Lightning', '0', '0', '0', '2 x USB-C', '1.4Kg', '0', '0', 'SSD 256GB', 'Intel Iris Plus Graphics 645'),
(70, '13.3\" Retina', 'Mac OS', '12MP', '0', 'Intel Core i5 10th', '8GB LPDDR4X', '0', '15000 mAh', '0', 'Lightning', '0', '0', '0', '2 x USB-C', '1.29Kg', '0', '0', 'SSD 256GB', 'Intel Iris Plus Graphics'),
(71, '0', '0', '0', '0', '0', '0', '0', '5000 mAh', '0', 'Lightning', 'MacOS, iOS', 'Active Noise Cancelling', '4.5h', '1 device', '0', '0', '0', '0', '0'),
(72, '0', '0', '0', '0', '0', '0', '0', '3000 mAh', '0', 'Lightning', 'Android, iOS', 'Active Noise Pro', '5h', '1 device', '0', '0', '0', '0', '0'),
(73, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '0', 'a', '0', '0', '0', '0', 'a', '0', 'a', '0', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `site_mail`
--

CREATE TABLE `site_mail` (
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `site_mail`
--

INSERT INTO `site_mail` (`username`, `password`) VALUES
('test.khanhnhu25@gmail.com', 'Test44448888');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT cho bảng `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
