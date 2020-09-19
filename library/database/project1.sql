-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 19, 2020 lúc 05:15 AM
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
-- Cấu trúc bảng cho bảng `custom`
--

CREATE TABLE `custom` (
  `logo_brand` varchar(256) NOT NULL,
  `name_brand` varchar(256) NOT NULL,
  `title_website` varchar(256) NOT NULL,
  `footer_information` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `custom_image-banner`
--

CREATE TABLE `custom_image-banner` (
  `id` int(11) NOT NULL,
  `url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_list`
--

CREATE TABLE `order_list` (
  `username` varchar(256) NOT NULL,
  `id_order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `address` varchar(256) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `create_time` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `view` int(11) NOT NULL,
  `selled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `type`, `image`, `price`, `qty`, `description`, `create_time`, `last_updated`, `view`, `selled`) VALUES
(1, 'Iphone 11 Pro Max', 1, 'ip12-1.jpg', 1099, 7, 'Triple-camera system (Ultra Wide, Wide, Telephoto)<br>    Up to 20 hours of video playback1    Water resistant to a depth of 4 meters for up to 30 minutes    5.8” or 6.5” Super Retina XDR display', '0000-00-00 00:00:00', '2020-09-12 11:33:21', 0, 0),
(2, 'iPhone XS Max', 1, 'ip12-2.jpg', 1249, 0, '\r\n    Dual-camera system (Ultra Wide, Wide)\r\n    Up to 17 hours of video playback1\r\n    Water resistant to a depth of 2 meters for up to 30 minutes\r\n    6.1” Liquid Retina HD display\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 0),
(3, 'iPhone 11', 1, 'ip12-3.jpg', 599, 0, '\r\n    \r\n    Dual-camera system (Ultra Wide, Wide)\r\n    Up to 17 hours of video playback1\r\n    Water resistant to a depth of 2 meters for up to 30 minutes\r\n    6.1” Liquid Retina HD display\r\n\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(29, 'Macbook', 3, 'macbook-pro-2018-2.jpeg', 2099, 100, 'abc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(30, 'Iphone 11 Pro Max', 1, 'ip12-3.jpg', 999, 20, 'abc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(31, 'iPhone 11', 1, 'ip12-4.jpg', 999, 11, 'abc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(32, 'iPhone 11', 2, 'ip12-4.jpg', 999, 11, 'abc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(33, 'Macbook 2', 3, '4477207_tinhte_tren_tay_apple_macbook_air_2018_2.jpg', 1499, 10, 'abc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(34, 'iPhone 12', 1, 'ip12-3.jpg', 1999, 50, 'zxc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(35, 'iPhone 7', 1, 'ip7-32.jpg', 399, 50, 'zxc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(36, 'iPhone X', 1, 'ip12-2.jpg', 899, 100, 'asd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(37, 'iPhone X black', 1, '600_ip_X_gray_800x800_2.jpg', 899, 100, 'asd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(38, 'iPhone 11 Pro Max midnight green', 2, 'iphone-11-pro-max-midnight-green-select-2019.png', 1299, 100, 'zxc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(39, 'iPhone 11 Pro Max silver ', 1, 'iphone-11-pro-max-silver-select-2019.png', 1299, 50, 'asd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(40, 'iPhone 7 plus', 1, 'ip7p-32.jpg', 499, 200, 'abc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(41, 'iPhone 12', 1, 'ip12-1.jpg', 1599, 50, 'abc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(42, 'Air Pod 1', 4, 'ITunes_12.2_logo.png', 199, 1000, 'abbbcc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(43, 'Air Pod 2', 4, 'ITunes_12.2_logo.png', 259, 1000, 'abbbss', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(44, 'ipad 2', 1, 'ip12-5.jpg', 799, 100, 'abc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(46, 'ipad 2', 2, '4477207_tinhte_tren_tay_apple_macbook_air_2018_2.jpg', 899, 100, 'sadsdaas', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(47, 'ipad 1', 2, 'ip12-1.jpg', 699, 100, 'sadsdaas', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(48, 'iPhone', 1, 'ip12-1.jpg', 9999, 100, 'test', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

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
(2, 'khanhnhu', 'Luong Khanh Nhu', 'khanhnhu@gmail.com', '1', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'thinhu123', 'Lương Thị Như', 'luongthinhu@gmail.com', '789', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Nhu', 'Như', 'nhu@gmail.com', 'nhu123456', 2, '0000-00-00 00:00:00', '2020-09-12 11:51:17', '0000-00-00 00:00:00');

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
(2, 'user');

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
  `user_edit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `custom_image-banner`
--
ALTER TABLE `custom_image-banner`
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
  ADD PRIMARY KEY (`id_order`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`);

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
-- AUTO_INCREMENT cho bảng `custom_image-banner`
--
ALTER TABLE `custom_image-banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_lv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Các ràng buộc cho bảng `order_list`
--
ALTER TABLE `order_list`
  ADD CONSTRAINT `order_list_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`type`) REFERENCES `product_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`lv`) REFERENCES `user_level` (`id_lv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD CONSTRAINT `user_permissions_ibfk_1` FOREIGN KEY (`id_lv`) REFERENCES `user_level` (`id_lv`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
