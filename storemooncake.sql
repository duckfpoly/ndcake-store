-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 15, 2022 lúc 04:05 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `storemooncake`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `duty` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `usernameadmin` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `id_kontrak` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `employee`
--

INSERT INTO `employee` (`id`, `duty`, `fullname`, `gender`, `address`, `usernameadmin`, `password`, `email`, `phone`, `image`, `id_kontrak`) VALUES
(1, 'manager', 'Nguyễn Đức', 'Nam', 'Hà Nội', 'ndcake', '$2y$10$.ZEQjdudgQ8S2B/bId8pre3Yb/Hi5eAwJOqINfc/gGQeK82azIep2', 'nd.mooncake@gmail.com', '1900 9001', 'https://cdn.glitch.global/82c99cc1-f007-4cbf-915e-1983c3041857/duc.png?v=1653459311977', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kontrak`
--

CREATE TABLE `kontrak` (
  `id` int(11) NOT NULL,
  `time_start_work` date DEFAULT NULL,
  `time_end_work` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `kontrak`
--

INSERT INTO `kontrak` (`id`, `time_start_work`, `time_end_work`) VALUES
(1, '2022-06-10', '2023-06-10'),
(2, '2022-07-10', '2023-07-10'),
(3, '2022-05-10', '2023-05-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_guest` int(11) DEFAULT NULL,
  `ordermethod` varchar(255) NOT NULL,
  `orderDate` datetime DEFAULT NULL,
  `received_date` datetime DEFAULT NULL,
  `note` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `id_guest`, `ordermethod`, `orderDate`, `received_date`, `note`, `status`) VALUES
(25, 6, 'Thanh toán khi nhận hàng', '2022-07-15 10:22:31', NULL, '', 'Đơn hàng mới ! - Chờ duyệt'),
(26, 6, 'Thanh toán khi nhận hàng', '2022-07-15 10:32:40', NULL, 'giao nhanh', 'Đơn hàng mới ! - Chờ duyệt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ordersdetail`
--

CREATE TABLE `ordersdetail` (
  `orderid` int(11) NOT NULL,
  `id_prd` int(11) NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ordersdetail`
--

INSERT INTO `ordersdetail` (`orderid`, `id_prd`, `quantity`, `price`) VALUES
(25, 1, 2, 45),
(26, 1, 1, 45),
(26, 2, 1, 50);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES
('nguyenduc10603@gmail.com', '768e78024aa8fdb9b8fe87be86f6474572b24de5af', '2022-07-16 16:01:00'),
('nguyenduc10603@gmail.com', '768e78024aa8fdb9b8fe87be86f64745f23398adb0', '2022-07-16 16:02:57'),
('nguyenduc10603@gmail.com', '768e78024aa8fdb9b8fe87be86f64745819078744e', '2022-07-16 16:04:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `fill` varchar(100) DEFAULT NULL,
  `mota` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `type`, `fill`, `mota`, `image`) VALUES
(1, 'Nhân Đậu xanh - 150gr', '45', 'Khối lượng: 150gr', 'Đậu xanh', '...', 'https://cdn.glitch.global/e4e5a7c2-c10e-4ecd-b570-505542b6edc1/49275c6a54f597abcee47.jpg?v=1657290443766'),
(2, 'Nhân cốm dừa - 150gr', '50', 'Khối lượng: 150gr', 'Cốm dừa', '...', 'https://cdn.glitch.global/e4e5a7c2-c10e-4ecd-b570-505542b6edc1/89df33693bf6f8a8a1e78.jpg?v=1657290442221'),
(3, 'Nhân thập cẩm gà quay - 150gr', '55', 'Khối lượng: 150gr', 'Thập cẩm gà quay', '...', 'https://cdn.glitch.global/e4e5a7c2-c10e-4ecd-b570-505542b6edc1/16adf10ef9913acf638010.jpg?v=1657290439381'),
(4, 'Nhân mơ tây cao cấp - 150gr', '55', 'Khối lượng: 150gr', 'Mơ tây cao cấp', '...', 'https://cdn.glitch.global/e4e5a7c2-c10e-4ecd-b570-505542b6edc1/dcd3e808-50d7-4acb-bc83-6740b7b2c8c2.IMG_1657278944340_1657599312087.jpg?v=1657599967141'),
(5, 'Nhân cốm dừa - 150gr', '50', 'Khối lượng: 150gr', 'Cốm dừa', '...', 'https://cdn.glitch.global/e4e5a7c2-c10e-4ecd-b570-505542b6edc1/dcd3e808-50d7-4acb-bc83-6740b7b2c8c2.IMG_1657278944340_1657599312087.jpg?v=1657599967141'),
(6, 'Nhân hồng trà phô mai - 150gr', '50', 'Khối lượng: 150gr', 'Hồng trà phô mai', '...', 'https://cdn.glitch.global/e4e5a7c2-c10e-4ecd-b570-505542b6edc1/2546f873-9c56-4754-92f0-8a690ecedfe9.IMG_1657278944339_1657599312029.jpg?v=1657599966849'),
(7, 'Nhân trà xanh - 150gr', '45', 'Khối lượng: 150gr', 'Trà xanh', '...', 'https://cdn.glitch.global/e4e5a7c2-c10e-4ecd-b570-505542b6edc1/394c55e0-39a8-48da-a6f0-722eeb3a471c.IMG_1657278944341_1657599312130.jpg?v=1657599968677'),
(8, 'Nhân khoai môn - 150gr', '45', 'Khối lượng: 150gr', 'Khoai môn', '...', 'https://cdn.glitch.global/e4e5a7c2-c10e-4ecd-b570-505542b6edc1/a84e7368-16cc-4a64-96a9-8062d6339104.IMG_1657278944342_1657599312213.jpg?v=1657599970861'),
(9, 'Nhân sầu riêng - 150gr', '50', 'Khối lượng: 150gr', 'Sầu riêng', '...', 'https://cdn.glitch.global/e4e5a7c2-c10e-4ecd-b570-505542b6edc1/3d10161d-7aaa-4ac0-9344-622a63bdfec9.received_662857951781285.jpeg?v=1657599959209'),
(10, 'Hộp bánh trung thu cao cấp - Màu đỏ', '60', 'Màu đỏ', 'Màu đỏ', '...', 'https://cdn.glitch.global/e4e5a7c2-c10e-4ecd-b570-505542b6edc1/z3552415168068_239cb138b96ebd2576544a129e70237f.jpg?v=1657604957318'),
(11, 'Hộp bánh trung thu cao cấp - Màu tím', '60', 'Màu tím', 'Màu tím', '...', 'https://cdn.glitch.global/e4e5a7c2-c10e-4ecd-b570-505542b6edc1/z3552415164273_f7d425316fc772d721aa29eed0294e05.jpg?v=1657604957768');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_comment`
--

CREATE TABLE `products_comment` (
  `id` int(11) NOT NULL,
  `id_user_guest` int(11) DEFAULT NULL,
  `id_products` int(11) DEFAULT NULL,
  `content_cmt` varchar(255) DEFAULT NULL,
  `cmt_date` datetime DEFAULT NULL,
  `ratingstar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_guest`
--

CREATE TABLE `user_guest` (
  `id` int(10) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `url_image` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user_guest`
--

INSERT INTO `user_guest` (`id`, `fullname`, `username`, `password`, `phone`, `email`, `address`, `url_image`) VALUES
(6, 'Nguyễn Đức', 'ntduc', '$2y$10$.ZEQjdudgQ8S2B/bId8pre3Yb/Hi5eAwJOqINfc/gGQeK82azIep2', '038 400 973', 'nguyenduc10603@gmail.com', '120 - Hoàng Quốc Việt - Phường Nghĩa Đô - Quận Cầu Giấy - Thành Phố Hà Nội', 'https://www.pngitem.com/pimgs/m/576-5768680_avatar-png-icon-person-icon-png-free-transparent.png'),
(7, 'Bùi Huy', 'duc', '$2y$10$cuiIU/8/d5RkQigLfVDVKeG1SfY5T6tSsrPqYCaDOnhVjf8UrdKs6', '0868400973', 'thienduc.nguyen098@gmail.com', 'Số nhà 100 - Tổ 53 - Khu dân cư Quang Trung - Phường Âu Cơ - Thị xã Phú Thọ - Tỉnh Phú Thọ', 'https://www.pngitem.com/pimgs/m/576-5768680_avatar-png-icon-person-icon-png-free-transparent.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_kontrak` (`id_kontrak`);

--
-- Chỉ mục cho bảng `kontrak`
--
ALTER TABLE `kontrak`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD PRIMARY KEY (`orderid`,`id_prd`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products_comment`
--
ALTER TABLE `products_comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_guest`
--
ALTER TABLE `user_guest`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `kontrak`
--
ALTER TABLE `kontrak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `products_comment`
--
ALTER TABLE `products_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `user_guest`
--
ALTER TABLE `user_guest`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_id_kontrak` FOREIGN KEY (`id_kontrak`) REFERENCES `kontrak` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_id_guest` FOREIGN KEY (`id_guest`) REFERENCES `user_guest` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
