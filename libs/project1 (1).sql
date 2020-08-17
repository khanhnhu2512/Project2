-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 04, 2020 lúc 03:37 AM
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
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `price` float NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_product`, `price`, `amount`) VALUES
(48, 104, 1, 10999, 1),
(49, 104, 2, 1249, 1),
(50, 104, 3, 599, 1),
(51, 105, 1, 10999, 1),
(52, 105, 2, 1249, 1),
(53, 105, 3, 599, 1),
(54, 106, 1, 10999, 1),
(55, 106, 2, 1249, 1),
(56, 106, 3, 599, 1),
(57, 107, 1, 10999, 1),
(58, 107, 2, 1249, 1),
(59, 108, 1, 10999, 1),
(60, 108, 2, 1249, 1),
(61, 109, 1, 10999, 2),
(62, 109, 2, 1249, 1),
(63, 110, 1, 10999, 5),
(64, 110, 2, 1249, 4),
(65, 111, 3, 599, 2),
(66, 111, 26, 1299, 1);

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
('khanhnhu2', 104, 1, 12847, '', 0),
('khanhnhu2', 105, 1, 12847, '', 0),
('khanhnhu2', 106, 1, 12847, '', 0),
('khanhnhu', 107, 1, 12248, 'nhu3', 0),
('khanhnhu', 108, 0, 12248, 'nhu3', 0),
('khanhnhu', 109, 0, 23247, '', 0),
('khanhnhu', 110, 0, 59991, 'test', 0),
('khanhnhu', 111, 0, 2497, 'test', 1);

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
(26, 'iPhone 11 Pro Max', 'iphone-11-pro-max-silver-select-2019.png', 1299, 10, 'Best', 0, 0),
(27, 'a', '600_ip_X_white_800x800_3.jpg', 100, 10, 'abc', 0, 0),
(28, '1', '600_ip_X_white_800x800_3.jpg', 10, 4, 'asdsdas', 0, 0);

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
(1, 'admin', 'Luong Van Nhu', 'luongvannhu@gmail.com', '1', 1, '0000-00-00', '0000-00-00', '0000-00-00'),
(2, 'khanhnhu', 'Luong Khanh Nhu', 'khanhnhu@gmail.com', '1', 2, '0000-00-00', '0000-00-00', '0000-00-00'),
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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
