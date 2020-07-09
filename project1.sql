-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 09, 2020 lúc 04:09 AM
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
-- Cấu trúc bảng cho bảng `image_library`
--

CREATE TABLE `image_library` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `price` float NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id_order`, `id_product`, `price`, `amount`) VALUES
(57, 1, 10999, 1),
(69, 1, 10999, 2),
(70, 1, 10999, 2),
(71, 1, 10999, 2),
(72, 1, 10999, 2),
(73, 1, 10999, 2),
(74, 1, 10999, 2),
(75, 1, 10999, 2);

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
  `payment_method` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_list`
--

INSERT INTO `order_list` (`username`, `id_order`, `status`, `total_price`, `address`, `payment_method`) VALUES
('khanhnhu2', 57, 0, 13646, '', 0),
('khanhnhu2', 60, 0, 2647, 'dadsad', 1),
('khanhnhu2', 61, 0, 2647, 'dadsad', 1),
('khanhnhu2', 62, 0, 2647, 'dadsad', 1),
('khanhnhu2', 63, 0, 2647, 'dadsad', 1),
('khanhnhu2', 64, 0, 2647, 'dadsad', 1),
('khanhnhu2', 65, 0, 2647, '', 0),
('khanhnhu2', 66, 0, 22397, 'test case', 1),
('khanhnhu2', 67, 0, 22397, 'test case', 1),
('khanhnhu2', 68, 0, 22397, 'test case', 1),
('khanhnhu2', 69, 0, 22397, 'test case', 1),
('khanhnhu2', 70, 0, 22397, 'test case', 1),
('khanhnhu2', 71, 0, 22397, 'asdasd', 0),
('khanhnhu2', 72, 0, 22397, 'asdasd', 0),
('khanhnhu2', 73, 0, 22397, 'asdasd', 0),
('khanhnhu2', 74, 0, 22397, 'asdasd', 0),
('khanhnhu2', 75, 0, 23696, '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_airpod`
--

CREATE TABLE `product_airpod` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `price` float NOT NULL,
  `content` varchar(256) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_ipad`
--

CREATE TABLE `product_ipad` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `price` float NOT NULL,
  `content` varchar(256) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_iphone`
--

CREATE TABLE `product_iphone` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `amount` int(11) NOT NULL,
  `content` text NOT NULL,
  `create_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_iphone`
--

INSERT INTO `product_iphone` (`id`, `name`, `image`, `price`, `amount`, `content`, `create_time`, `last_updated`) VALUES
(1, 'Iphone 11 Pro Max', 'ip12-1.jpg', 10999, 1, 'Triple-camera system (Ultra Wide, Wide, Telephoto)<br>    Up to 20 hours of video playback1    Water resistant to a depth of 4 meters for up to 30 minutes    5.8” or 6.5” Super Retina XDR display', 16062020, 16062020),
(2, 'iPhone XS Max', 'ip12-2.jpg', 1249, 0, '\r\n    Dual-camera system (Ultra Wide, Wide)\r\n    Up to 17 hours of video playback1\r\n    Water resistant to a depth of 2 meters for up to 30 minutes\r\n    6.1” Liquid Retina HD display\r\n', 16062020, 16062020),
(3, 'iPhone 11', 'ip12-3.jpg', 599, 0, '\r\n    \r\n    Dual-camera system (Ultra Wide, Wide)\r\n    Up to 17 hours of video playback1\r\n    Water resistant to a depth of 2 meters for up to 30 minutes\r\n    6.1” Liquid Retina HD display\r\n\r\n', 16062020, 16062020),
(4, 'iPhone SE', 'ip12-4.jpg', 399, 0, '\r\n    Single-camera system\r\n    (Wide)\r\n    Up to 13 hours of video playback1\r\n    Water resistant to a depth of 1 meter for up to 30 minutes\r\n    4.7” Retina HD display\r\n', 16062020, 16062020),
(20, 'iPhone 11 Pro Max', 'iphone-11-pro-max-midnight-green-select-2019.png', 1499, 4, 'Best', 0, 0),
(21, 'iPhone 11 Pro Max', 'iphone-11-pro-max-silver-select-2019.png', 1499, 2, 'Best', 0, 0),
(22, 'iPhone 11 Pro Max', 'iphone-11-pro-max-silver-select-2019.png', 1299, 2, 'Best', 0, 0),
(23, 'iPhone', '600_ip_X_gray_800x800_2.jpg', 999, 2, 'Best', 0, 0),
(24, 'iPhone', '600_ip_X_white_800x800_3.jpg', 999, 2, 'Best', 0, 0),
(25, 'iPhone 11', 'iphone-11-pro-max-silver-select-2019.png', 998, 11, 'abc', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(100) NOT NULL,
  `lv` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `create_time` date NOT NULL,
  `last_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `email`, `password`, `lv`, `birthday`, `create_time`, `last_updated`) VALUES
(1, 'admin', 'Luong Van Nhu', 'luongvannhu@gmail.com', 'abc123', 1, '0000-00-00', '0000-00-00', '0000-00-00'),
(2, 'khanhnhu2', 'Luong Khanh Nhu', 'luongkhanhnhu@gmail.com', '251201', 2, '0000-00-00', '0000-00-00', '0000-00-00'),
(5, 'thinhu123', 'Lương Thị Như', 'luongthinhu@gmail.com', '789', 2, '0000-00-00', '0000-00-00', '0000-00-00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `image_library`
--
ALTER TABLE `image_library`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_order`);

--
-- Chỉ mục cho bảng `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id_order`);

--
-- Chỉ mục cho bảng `product_airpod`
--
ALTER TABLE `product_airpod`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_ipad`
--
ALTER TABLE `product_ipad`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_iphone`
--
ALTER TABLE `product_iphone`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `image_library`
--
ALTER TABLE `image_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `product_airpod`
--
ALTER TABLE `product_airpod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_ipad`
--
ALTER TABLE `product_ipad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_iphone`
--
ALTER TABLE `product_iphone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
