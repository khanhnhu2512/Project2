-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 10, 2020 lúc 10:11 AM
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
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_product`, `price`, `qty`) VALUES
(57, 107, 1, 10999, 1),
(58, 107, 2, 1249, 1),
(59, 108, 1, 10999, 1),
(60, 108, 2, 1249, 1),
(63, 110, 1, 10999, 5),
(64, 110, 2, 1249, 4),
(65, 111, 3, 599, 2),
(66, 111, 26, 1299, 1),
(67, 112, 2, 1249, 1),
(68, 112, 1, 1099, 1),
(71, 114, 2, 1249, 1),
(72, 114, 1, 1099, 1);

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
('khanhnhu', 107, 1, 12248, 'nhu3', 0),
('khanhnhu', 108, 1, 12248, 'nhu3', 0),
('khanhnhu', 110, 1, 59991, 'test', 0),
('khanhnhu', 111, 1, 2497, 'test', 1),
('khanhnhu', 112, 1, 2348, 'Ha Noi', 0),
('khanhnhu', 114, 0, 2348, '12', 0),
('khanhnhu', 115, 0, 1998, 'Ha Noi', 0),
('khanhnhu', 116, 0, 1998, 'Ha Noi', 0),
('khanhnhu', 117, 0, 2099, 'Cầu Giấy', 0),
('khanhnhu', 118, 0, 3997, 'chùa ngòi hà đông', 0),
('khanhnhu', 119, 0, 898, 'Test', 0),
('khanhnhu', 120, 0, 898, 'Test', 0),
('khanhnhu', 121, 0, 898, 'Test', 0),
('khanhnhu', 122, 0, 898, 'Test', 0),
('khanhnhu', 123, 0, 2548, 'chua ngoi ha dong ', 0);

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
  `create_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `type`, `image`, `price`, `qty`, `description`, `create_time`, `last_updated`) VALUES
(1, 'Iphone 11 Pro Max', 1, 'ip12-1.jpg', 1099, 7, 'Triple-camera system (Ultra Wide, Wide, Telephoto)<br>    Up to 20 hours of video playback1    Water resistant to a depth of 4 meters for up to 30 minutes    5.8” or 6.5” Super Retina XDR display', 16062020, 16062020),
(2, 'iPhone XS Max', 1, 'ip12-2.jpg', 1249, 0, '\r\n    Dual-camera system (Ultra Wide, Wide)\r\n    Up to 17 hours of video playback1\r\n    Water resistant to a depth of 2 meters for up to 30 minutes\r\n    6.1” Liquid Retina HD display\r\n', 16062020, 16062020),
(3, 'iPhone 11', 1, 'ip12-3.jpg', 599, 0, '\r\n    \r\n    Dual-camera system (Ultra Wide, Wide)\r\n    Up to 17 hours of video playback1\r\n    Water resistant to a depth of 2 meters for up to 30 minutes\r\n    6.1” Liquid Retina HD display\r\n\r\n', 16062020, 16062020),
(29, 'Macbook', 3, 'macbook-pro-2018-2.jpeg', 2099, 100, 'abc', 0, 0),
(30, 'Iphone 11 Pro Max', 1, 'ip12-3.jpg', 999, 20, 'abc', 0, 0),
(31, 'iPhone 11', 1, 'ip12-4.jpg', 999, 11, 'abc', 0, 0),
(32, 'iPhone 11', 2, 'ip12-4.jpg', 999, 11, 'abc', 0, 0),
(33, 'Macbook 2', 3, '4477207_tinhte_tren_tay_apple_macbook_air_2018_2.jpg', 1499, 10, 'abc', 0, 0),
(34, 'iPhone 12', 1, 'ip12-3.jpg', 1999, 50, 'zxc', 0, 0),
(35, 'iPhone 7', 1, 'ip7-32.jpg', 399, 50, 'zxc', 0, 0),
(36, 'iPhone X', 1, 'ip12-2.jpg', 899, 100, 'asd', 0, 0),
(37, 'iPhone X black', 1, '600_ip_X_gray_800x800_2.jpg', 899, 100, 'asd', 0, 0),
(38, 'iPhone 11 Pro Max midnight green', 2, 'iphone-11-pro-max-midnight-green-select-2019.png', 1299, 100, 'zxc', 0, 0),
(39, 'iPhone 11 Pro Max silver ', 1, 'iphone-11-pro-max-silver-select-2019.png', 1299, 50, 'asd', 0, 0),
(40, 'iPhone 7 plus', 1, 'ip7p-32.jpg', 499, 200, 'abc', 0, 0),
(41, 'iPhone 12', 1, 'ip12-1.jpg', 1599, 50, 'abc', 0, 0),
(42, 'Air Pod 1', 4, 'ITunes_12.2_logo.png', 199, 1000, 'abbbcc', 0, 0),
(43, 'Air Pod 2', 4, 'ITunes_12.2_logo.png', 259, 1000, 'abbbss', 0, 0),
(44, 'ipad 2', 1, 'ip12-5.jpg', 799, 100, 'abc', 0, 0),
(46, 'ipad 2', 2, '4477207_tinhte_tren_tay_apple_macbook_air_2018_2.jpg', 899, 100, 'sadsdaas', 0, 0),
(47, 'ipad 1', 2, 'ip12-1.jpg', 699, 100, 'sadsdaas', 0, 0),
(48, 'iPhone', 1, 'ip12-1.jpg', 9999, 100, 'test', 0, 0);

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
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_category`
--
ALTER TABLE `product_category`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
