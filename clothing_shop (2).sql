-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th9 28, 2018 lúc 05:10 PM
-- Phiên bản máy phục vụ: 10.1.35-MariaDB
-- Phiên bản PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `clothing_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `cat_name`) VALUES
(1, 'Shirt'),
(2, 'Jacket'),
(3, 'Accessories');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_des` text NOT NULL,
  `product_cat` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_reduce` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_dateCreate` date NOT NULL,
  `product_dateUpdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_des`, `product_cat`, `product_image`, `product_price`, `product_reduce`, `product_quantity`, `product_dateCreate`, `product_dateUpdate`) VALUES
(20, 'Chiffon Double Pocket Shirt', '    Chiffon Double Pocket Shirt    ', '1', '5baba9175cdc4_shirt.jpg', 490, 0, 5, '2018-09-26', '2018-09-28'),
(21, 'V-neck long-sleeved shirt', ' V-neck long-sleeved shirt - female ( Dark green -S)  ', '1', '5baba9d722beb_shirt_3739201_500.jpg', 590, 1.25, 5, '2018-09-26', '2018-09-26'),
(22, 'Black spots on white', '   Print Short Sleeve Shirt - Female   ', '1', '5babaae9777b5_blackDot3495301_500.jpg', 295, 0, 3, '2018-09-26', '2018-09-26'),
(23, 'Open collar cropped sleeve shirt', ' Open collar cropped sleeve shirt - female ( Tibetan- -M ) ', '1', '5babace695eb1_collar_3495604_500.jpg', 390, 0, 4, '2018-09-26', '2018-09-28'),
(24, 'Linen Sleeveless Shirt', ' Linen Sleeveless Shirt - Female ( Shuilv -L )  ', '2', '5babad3506da3_LinenSleevelessShirt_3406204_500.jpg', 245, 0, 3, '2018-09-26', '2018-09-26'),
(25, 'Flannel Plaid Shirt', ' Flannel Plaid Shirt - Female ( Red Black - -S ) ', '1', '5bac3dcc76aef_redblack3734207_500.jpg', 350, 0, 2, '2018-09-27', '2018-09-28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_pass`, `user_gender`, `user_birthday`) VALUES
(2, 'MaiKhanh', 'maikhanh@gmail.com', '$2y$10$8pUfQ//BLLMFCNyQNTneGOGzykaPf/gCfVUJg3AY5Lwr4pDli37ja', 'male', '2018-09-06'),
(3, 'vantuan', 'vantuan@gmail.com', '$2y$10$8mJrZFYfcmpvN3fZ17VMZO6CtdyXsiqJ8G4cVI.my7xRTmCmfmaDm', 'male', '2018-08-29');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
