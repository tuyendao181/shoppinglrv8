-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220605.3bb0712d47
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 06, 2022 lúc 06:52 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoppinglrv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `name`, `email`, `avatar`, `password`, `role`, `status`, `remember_token`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'tuyen', 'tuyendao181@gmail.com', NULL, '1', 0, 0, NULL, '0345851156', '2022-05-04 13:09:41', '2022-05-04 06:09:49'),
(2, 'tuyen dap', 'tuyendao180@gmail.com', NULL, '$2y$10$NgcvJmWbcDPNSJcPvbV2SePIJvbv7UKZww0/5Be.xHA2Exl2.ZQIS', 0, 0, NULL, '0345851156', '2022-05-30 23:23:29', '2022-05-30 23:23:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `image`, `created_at`, `updated_at`) VALUES
(4, '2022/05/1653896145.png', '2022-05-30', '2022-05-30'),
(7, '2022/05/1653896181.jpg', '2022-05-30', '2022-05-30'),
(8, '2022/05/1653896548.png', '2022-05-30', '2022-05-30'),
(9, '2022/05/1653896581.jpg', '2022-05-30', '2022-05-30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `name`, `image`, `content`, `description`, `created_at`, `updated_at`) VALUES
(2, 'tuyen dao', '2022/05/1653897535.jpg', 'Fresh review of coming trends for Summer', 'You can remember what your childhood bedroom is like, right? That is your imagination doing that. You know the sound that your feet make when you walk across gravel don\'t you? You can imagine it, but you are not hearing it in your ears, are you? Just imagine these things as best as you can.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipiscing aptent taciti sociosqu ad litora torquent.', '2022-05-29 21:26:33', '2022-05-30 00:58:55'),
(3, 'tuyen dao', '2022/05/1653897779.jpg', 'New Lunched Vintage Collaction', 'You can remember what your childhood bedroom is like, right? That is your imagination doing that. You know the sound that your feet make when you walk across gravel don\'t you? You can imagine it, but you are not hearing it in your ears, are you? Just imagine these things as best as you can.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipiscing aptent taciti sociosqu ad litora torquent.', '2022-05-29 21:53:54', '2022-05-30 01:02:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Men\'s pants', '2022/05/1653990792.jpg', 0, '2022-05-31 02:52:11', '2022-05-31 23:15:57'),
(11, 'Women\'s shirts', '2022/05/1653990841.jpg', 0, '2022-05-31 02:54:01', '2022-05-31 23:49:23'),
(18, 'Men\'s jackets & coats', '2022/06/1654074197.jpg', 0, '2022-06-01 02:03:17', '2022-06-01 02:03:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name_color` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id`, `name_color`, `created_at`, `updated_at`) VALUES
(7, 'Violet', '2022-05-31 03:02:00', '2022-05-31 03:02:00'),
(8, 'DarkBlue', '2022-05-31 03:02:48', '2022-05-31 03:02:48'),
(9, 'Chocolate', '2022-05-31 03:02:59', '2022-05-31 03:02:59'),
(10, 'Orange', '2022-05-31 23:12:36', '2022-05-31 23:12:36'),
(11, 'Indigo', '2022-05-31 23:18:09', '2022-05-31 23:18:09'),
(12, 'Black', '2022-05-31 23:18:14', '2022-05-31 23:18:14'),
(13, 'Red', '2022-05-31 23:18:19', '2022-05-31 23:18:19'),
(14, 'Bisque', '2022-05-31 23:33:02', '2022-05-31 23:33:02'),
(15, 'White', '2022-05-31 23:41:37', '2022-05-31 23:41:37'),
(16, 'Grey', '2022-06-01 00:18:02', '2022-06-01 00:18:02'),
(17, 'Khaki', '2022-06-01 00:42:38', '2022-06-01 00:42:38'),
(18, 'LavenderBlush', '2022-06-01 00:47:47', '2022-06-01 00:47:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `content`, `customer_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'fdfdf', 2, 1, '2022-05-30 23:54:25', '2022-05-30 23:54:25'),
(2, 'san pham tot', 2, 1, '2022-05-31 00:07:24', '2022-05-31 00:07:24'),
(3, 'okee', 2, 1, '2022-05-31 00:13:59', '2022-05-31 00:13:59'),
(4, 'okkk nhe', 2, 1, '2022-05-31 00:14:47', '2022-05-31 00:14:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` float NOT NULL,
  `payment` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total`, `payment`, `name`, `email`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(37, 2, 117.03, 0, 'tuyen dap', 'tuyendao181@gmail.com', 'me tri', '0345851156', '2022-06-02 03:11:51', '2022-06-02 03:11:51'),
(38, 2, 117.03, 0, 'tuyen dap', 'tuyendao181@gmail.com', 'me tri', '0345851156', '2022-06-02 03:12:43', '2022-06-02 03:12:43'),
(39, 2, 117.03, 0, 'tuyen dap', 'tuyendao181@gmail.com', 'me tri', '0345851156', '2022-06-02 03:13:34', '2022-06-02 03:13:34'),
(40, 2, 117.03, 0, 'tuyen dap', 'tuyendao181@gmail.com', 'me tri', '0345851156', '2022-06-02 03:18:31', '2022-06-02 03:18:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `color` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` float NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `order_id`, `product_id`, `quantity`, `color`, `size`, `price`, `created_at`, `updated_at`) VALUES
(50, 37, 42, 1, 'L', 'Black', 39.01, '2022-06-02', '2022-06-02'),
(52, 40, 42, 1, 'L', 'Black', 39.01, '2022-06-02', '2022-06-02'),
(53, 40, 43, 2, 'M', 'Black', 39.01, '2022-06-02', '2022-06-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `sale_price` float DEFAULT NULL,
  `descriptions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `sale_price`, `descriptions`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(14, 'Cargo Joggers', 38.98, 39.01, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 9, '2022-05-31 23:14:51', '2022-05-31 23:38:28'),
(15, 'Relaxed Fit Cargo Pants', 39.99, 40.01, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 9, '2022-05-31 23:37:55', '2022-05-31 23:39:21'),
(21, 'Slim Fit Cotton Chinos', 34.99, 35.01, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 9, '2022-06-01 00:01:46', '2022-06-01 00:01:46'),
(22, 'Denim Overalls', 49.09, 57.01, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 9, '2022-06-01 00:05:27', '2022-06-01 00:13:36'),
(23, 'Relaxed Fit Linen-blend Joggers', 45.02, 46.03, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 9, '2022-06-01 00:09:36', '2022-06-01 00:13:45'),
(24, 'Slim Fit Suit Pants', 56.02, 55.77, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 9, '2022-06-01 00:15:00', '2022-06-01 00:15:00'),
(25, 'Slim Fit Cotton Chinos', 44.87, 50.01, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 9, '2022-06-01 00:19:30', '2022-06-01 00:19:30'),
(26, 'Slim Fit Crop Slacks', 34.76, 44.06, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 9, '2022-06-01 00:22:49', '2022-06-01 00:22:49'),
(27, 'Oversized Cotton Shirt', 33.02, 35.04, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 11, '2022-06-01 00:27:20', '2022-06-01 00:27:20'),
(28, 'Cotton Shirt', 23.01, 25.04, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 11, '2022-06-01 00:31:54', '2022-06-01 00:31:54'),
(29, 'Oversized Cotton Shirt', 13.03, 20.01, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 11, '2022-06-01 00:37:43', '2022-06-01 00:37:43'),
(30, 'Poplin Shirt', 32.01, 44.02, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 11, '2022-06-01 00:40:10', '2022-06-01 00:40:10'),
(31, 'Cotton Shirt', 12.09, 13.55, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 11, '2022-06-01 00:43:37', '2022-06-01 00:43:37'),
(32, 'Crêped Blouse with Tie Detail', 32.56, 55.01, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 11, '2022-06-01 00:46:03', '2022-06-01 00:46:03'),
(33, 'Fitted Shirt', 44.33, 55.87, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 11, '2022-06-01 00:48:51', '2022-06-01 00:48:51'),
(34, 'V-neck Blouse', 33.87, 44.06, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 11, '2022-06-01 00:52:36', '2022-06-01 00:52:36'),
(35, 'Bomber Jacket', 45.76, 47.65, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 18, '2022-06-01 02:04:53', '2022-06-01 02:04:53'),
(36, 'Shirt Jacket', 56.99, 66.76, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 18, '2022-06-01 02:07:42', '2022-06-01 02:07:42'),
(37, 'Linen Bomber Jacket', 16.09, 18.99, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 18, '2022-06-01 02:09:21', '2022-06-01 02:09:21'),
(38, 'Nylon Windbreaker', 44.99, 56.87, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 18, '2022-06-01 02:11:30', '2022-06-01 02:11:30'),
(39, 'Wool-blend Jacket', 67.98, 69.99, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 18, '2022-06-01 02:14:48', '2022-06-01 02:14:48'),
(40, 'Nylon Bomber Jacket', 66.99, 76.89, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 18, '2022-06-01 02:17:26', '2022-06-01 02:17:26'),
(41, 'Wool-blend Shacket', 66.98, 68.88, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 18, '2022-06-01 02:18:52', '2022-06-01 02:18:52'),
(42, 'Bomber Jacket', 55.99, 60.99, 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic remaining essentially unchanged.', 0, 18, '2022-06-01 02:20:44', '2022-06-01 02:20:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id_atrr` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_color` int(11) DEFAULT NULL,
  `id_size` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_attributes`
--

INSERT INTO `product_attributes` (`id_atrr`, `image`, `id_product`, `id_color`, `id_size`, `created_at`, `updated_at`) VALUES
(42, '2022/06/1654065209.jpg', 14, 12, 10, '2022-05-31 23:33:29', '2022-05-31 23:33:29'),
(43, '2022/06/1654065212.jpg', 14, 12, 11, '2022-05-31 23:33:32', '2022-05-31 23:33:32'),
(44, '2022/06/1654065214.jpg', 14, 12, 12, '2022-05-31 23:33:34', '2022-05-31 23:33:34'),
(45, '2022/06/1654065223.jpg', 14, 14, 12, '2022-05-31 23:33:43', '2022-05-31 23:33:43'),
(46, '2022/06/1654065225.jpg', 14, 14, 11, '2022-05-31 23:33:45', '2022-05-31 23:33:45'),
(47, '2022/06/1654065236.jpg', 14, 9, 10, '2022-05-31 23:33:56', '2022-05-31 23:33:56'),
(48, '2022/06/1654065238.jpg', 14, 9, 11, '2022-05-31 23:33:58', '2022-05-31 23:33:58'),
(52, '2022/06/1654065736.jpg', 15, 15, 10, '2022-05-31 23:42:16', '2022-05-31 23:42:16'),
(53, '2022/06/1654065738.jpg', 15, 15, 11, '2022-05-31 23:42:18', '2022-05-31 23:42:18'),
(54, '2022/06/1654065740.jpg', 15, 15, 12, '2022-05-31 23:42:20', '2022-05-31 23:42:20'),
(55, '2022/06/1654065746.jpg', 15, 12, 12, '2022-05-31 23:42:26', '2022-05-31 23:42:26'),
(56, '2022/06/1654065749.jpg', 15, 12, 11, '2022-05-31 23:42:29', '2022-05-31 23:42:29'),
(57, '2022/06/1654067010.jpg', 21, 12, 12, '2022-06-01 00:03:30', '2022-06-01 00:03:30'),
(58, '2022/06/1654067011.jpg', 21, 12, 10, '2022-06-01 00:03:31', '2022-06-01 00:03:31'),
(59, '2022/06/1654067014.jpg', 21, 12, 11, '2022-06-01 00:03:34', '2022-06-01 00:03:34'),
(60, '2022/06/1654067028.jpg', 21, 14, 10, '2022-06-01 00:03:48', '2022-06-01 00:03:48'),
(61, '2022/06/1654067032.jpg', 21, 14, 11, '2022-06-01 00:03:52', '2022-06-01 00:03:52'),
(62, '2022/06/1654067045.jpg', 21, 15, 11, '2022-06-01 00:04:05', '2022-06-01 00:04:05'),
(63, '2022/06/1654067296.jpg', 22, 12, 10, '2022-06-01 00:08:16', '2022-06-01 00:08:16'),
(64, '2022/06/1654067298.jpg', 22, 12, 11, '2022-06-01 00:08:18', '2022-06-01 00:08:18'),
(65, '2022/06/1654067300.jpg', 22, 12, 12, '2022-06-01 00:08:20', '2022-06-01 00:08:20'),
(66, '2022/06/1654067316.jpg', 22, 8, 12, '2022-06-01 00:08:36', '2022-06-01 00:08:36'),
(67, '2022/06/1654067318.jpg', 22, 8, 11, '2022-06-01 00:08:38', '2022-06-01 00:08:38'),
(68, '2022/06/1654067498.jpg', 23, 14, 10, '2022-06-01 00:11:38', '2022-06-01 00:11:38'),
(69, '2022/06/1654067500.jpg', 23, 14, 12, '2022-06-01 00:11:40', '2022-06-01 00:11:40'),
(70, '2022/06/1654067510.jpg', 23, 12, 10, '2022-06-01 00:11:50', '2022-06-01 00:11:50'),
(71, '2022/06/1654067513.jpg', 23, 12, 12, '2022-06-01 00:11:53', '2022-06-01 00:11:53'),
(74, '2022/06/1654067808.jpg', 24, 8, 10, '2022-06-01 00:16:48', '2022-06-01 00:16:48'),
(75, '2022/06/1654067809.jpg', 24, 8, 12, '2022-06-01 00:16:49', '2022-06-01 00:16:49'),
(76, '2022/06/1654067852.jpg', 24, 12, 10, '2022-06-01 00:17:32', '2022-06-01 00:17:32'),
(77, '2022/06/1654067854.jpg', 24, 12, 11, '2022-06-01 00:17:34', '2022-06-01 00:17:34'),
(78, '2022/06/1654068075.jpg', 25, 12, 10, '2022-06-01 00:21:15', '2022-06-01 00:21:15'),
(79, '2022/06/1654068077.jpg', 25, 12, 12, '2022-06-01 00:21:17', '2022-06-01 00:21:17'),
(80, '2022/06/1654068088.jpg', 25, 11, 10, '2022-06-01 00:21:28', '2022-06-01 00:21:28'),
(81, '2022/06/1654068090.jpg', 25, 11, 11, '2022-06-01 00:21:30', '2022-06-01 00:21:30'),
(82, '2022/06/1654068098.jpg', 25, 14, 11, '2022-06-01 00:21:38', '2022-06-01 00:21:38'),
(83, '2022/06/1654068100.jpg', 25, 14, 10, '2022-06-01 00:21:40', '2022-06-01 00:21:40'),
(84, '2022/06/1654068231.jpg', 26, 12, 10, '2022-06-01 00:23:51', '2022-06-01 00:23:51'),
(85, '2022/06/1654068233.jpg', 26, 12, 11, '2022-06-01 00:23:53', '2022-06-01 00:23:53'),
(86, '2022/06/1654068240.jpg', 26, 15, 11, '2022-06-01 00:24:00', '2022-06-01 00:24:00'),
(87, '2022/06/1654068242.jpg', 26, 15, 10, '2022-06-01 00:24:02', '2022-06-01 00:24:02'),
(88, '2022/06/1654068527.jpg', 27, 12, 10, '2022-06-01 00:28:47', '2022-06-01 00:28:47'),
(89, '2022/06/1654068529.jpg', 27, 12, 12, '2022-06-01 00:28:49', '2022-06-01 00:28:49'),
(90, '2022/06/1654068538.jpg', 27, 15, 10, '2022-06-01 00:28:58', '2022-06-01 00:28:58'),
(91, '2022/06/1654068540.jpg', 27, 15, 11, '2022-06-01 00:29:00', '2022-06-01 00:29:00'),
(92, '2022/06/1654068782.jpg', 28, 14, 10, '2022-06-01 00:33:02', '2022-06-01 00:33:02'),
(93, '2022/06/1654068785.jpg', 28, 14, 11, '2022-06-01 00:33:05', '2022-06-01 00:33:05'),
(94, '2022/06/1654068795.jpg', 28, 8, 12, '2022-06-01 00:33:15', '2022-06-01 00:33:15'),
(95, '2022/06/1654068797.jpg', 28, 8, 10, '2022-06-01 00:33:17', '2022-06-01 00:33:17'),
(96, '2022/06/1654069140.jpg', 29, 12, 10, '2022-06-01 00:39:00', '2022-06-01 00:39:00'),
(97, '2022/06/1654069143.jpg', 29, 12, 11, '2022-06-01 00:39:03', '2022-06-01 00:39:03'),
(98, '2022/06/1654069286.jpg', 30, 15, 10, '2022-06-01 00:41:26', '2022-06-01 00:41:26'),
(99, '2022/06/1654069290.jpg', 30, 15, 11, '2022-06-01 00:41:31', '2022-06-01 00:41:31'),
(100, '2022/06/1654069297.jpg', 30, 12, 11, '2022-06-01 00:41:37', '2022-06-01 00:41:37'),
(101, '2022/06/1654069299.jpg', 30, 12, 10, '2022-06-01 00:41:39', '2022-06-01 00:41:39'),
(102, '2022/06/1654069464.jpg', 31, 7, 10, '2022-06-01 00:44:24', '2022-06-01 00:44:24'),
(103, '2022/06/1654069465.jpg', 31, 7, 11, '2022-06-01 00:44:25', '2022-06-01 00:44:25'),
(104, '2022/06/1654069591.jpg', 32, 17, 10, '2022-06-01 00:46:31', '2022-06-01 00:46:31'),
(105, '2022/06/1654069593.jpg', 32, 17, 11, '2022-06-01 00:46:33', '2022-06-01 00:46:33'),
(106, '2022/06/1654069600.jpg', 32, 13, 11, '2022-06-01 00:46:40', '2022-06-01 00:46:40'),
(107, '2022/06/1654069601.jpg', 32, 13, 10, '2022-06-01 00:46:41', '2022-06-01 00:46:41'),
(108, '2022/06/1654069748.jpg', 33, 18, 10, '2022-06-01 00:49:08', '2022-06-01 00:49:08'),
(109, '2022/06/1654069750.jpg', 33, 18, 11, '2022-06-01 00:49:10', '2022-06-01 00:49:10'),
(110, '2022/06/1654070012.jpg', 34, 15, 10, '2022-06-01 00:53:32', '2022-06-01 00:53:32'),
(111, '2022/06/1654070014.jpg', 34, 15, 11, '2022-06-01 00:53:34', '2022-06-01 00:53:34'),
(112, '2022/06/1654074365.jpg', 35, 13, 10, '2022-06-01 02:06:05', '2022-06-01 02:06:05'),
(113, '2022/06/1654074367.jpg', 35, 13, 11, '2022-06-01 02:06:07', '2022-06-01 02:06:07'),
(114, '2022/06/1654074374.jpg', 35, 14, 11, '2022-06-01 02:06:14', '2022-06-01 02:06:14'),
(115, '2022/06/1654074376.jpg', 35, 14, 13, '2022-06-01 02:06:16', '2022-06-01 02:06:16'),
(116, '2022/06/1654074382.jpg', 35, 12, 13, '2022-06-01 02:06:22', '2022-06-01 02:06:22'),
(117, '2022/06/1654074384.jpg', 35, 12, 10, '2022-06-01 02:06:24', '2022-06-01 02:06:24'),
(118, '2022/06/1654074504.jpg', 36, 12, 10, '2022-06-01 02:08:24', '2022-06-01 02:08:24'),
(119, '2022/06/1654074507.jpg', 36, 12, 12, '2022-06-01 02:08:27', '2022-06-01 02:08:27'),
(120, '2022/06/1654074615.jpg', 37, 15, 10, '2022-06-01 02:10:15', '2022-06-01 02:10:15'),
(121, '2022/06/1654074617.jpg', 37, 15, 12, '2022-06-01 02:10:17', '2022-06-01 02:10:17'),
(122, '2022/06/1654074632.jpg', 37, 14, 12, '2022-06-01 02:10:32', '2022-06-01 02:10:32'),
(123, '2022/06/1654074634.jpg', 37, 14, 11, '2022-06-01 02:10:34', '2022-06-01 02:10:34'),
(124, '2022/06/1654074758.jpg', 38, 15, 10, '2022-06-01 02:12:38', '2022-06-01 02:12:38'),
(125, '2022/06/1654074761.jpg', 38, 15, 12, '2022-06-01 02:12:41', '2022-06-01 02:12:41'),
(126, '2022/06/1654074769.jpg', 38, 16, 10, '2022-06-01 02:12:49', '2022-06-01 02:12:49'),
(127, '2022/06/1654074771.jpg', 38, 16, 11, '2022-06-01 02:12:51', '2022-06-01 02:12:51'),
(128, '2022/06/1654074778.jpg', 38, 12, 11, '2022-06-01 02:12:58', '2022-06-01 02:12:58'),
(129, '2022/06/1654074780.jpg', 38, 12, 10, '2022-06-01 02:13:00', '2022-06-01 02:13:00'),
(130, '2022/06/1654074964.jpg', 39, 12, 10, '2022-06-01 02:16:04', '2022-06-01 02:16:04'),
(131, '2022/06/1654074966.jpg', 39, 12, 11, '2022-06-01 02:16:06', '2022-06-01 02:16:06'),
(132, '2022/06/1654075090.jpg', 40, 12, 10, '2022-06-01 02:18:10', '2022-06-01 02:18:10'),
(133, '2022/06/1654075092.jpg', 40, 12, 12, '2022-06-01 02:18:12', '2022-06-01 02:18:12'),
(134, '2022/06/1654075094.jpg', 40, 12, 11, '2022-06-01 02:18:14', '2022-06-01 02:18:14'),
(135, '2022/06/1654075189.jpg', 41, 12, 10, '2022-06-01 02:19:49', '2022-06-01 02:19:49'),
(136, '2022/06/1654075192.jpg', 41, 12, 12, '2022-06-01 02:19:52', '2022-06-01 02:19:52'),
(137, '2022/06/1654075194.jpg', 41, 12, 11, '2022-06-01 02:19:54', '2022-06-01 02:19:54'),
(138, '2022/06/1654075294.jpg', 42, 13, 10, '2022-06-01 02:21:34', '2022-06-01 02:21:34'),
(139, '2022/06/1654075296.jpg', 42, 13, 12, '2022-06-01 02:21:36', '2022-06-01 02:21:36'),
(140, '2022/06/1654075298.jpg', 42, 13, 11, '2022-06-01 02:21:38', '2022-06-01 02:21:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `name_size` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `name_size`, `created_at`, `updated_at`) VALUES
(10, 'L', '2022-05-31 23:11:50', '2022-05-31 23:11:50'),
(11, 'M', '2022-05-31 23:11:53', '2022-05-31 23:11:53'),
(12, 'S', '2022-05-31 23:11:54', '2022-05-31 23:11:54'),
(13, 'XL', '2022-05-31 23:11:58', '2022-05-31 23:11:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `descriptions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `heading` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `descriptions`, `heading`, `created_at`, `updated_at`) VALUES
(7, '2022/05/1653892230.jpg', 'What\'s Tranding Fashion?', 'New Look 2022', '2022-05-30', '2022-05-30'),
(8, '2022/05/1653892289.jpg', 'The Bag for Summer', 'Sale 20% Off', '2022-05-30', '2022-05-30');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `orders_detail_ibfk_2` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id_atrr`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `id_size` (`id_size`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id_atrr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orders_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_attributes` (`id_atrr`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `product_attributes_ibfk_1` FOREIGN KEY (`id_color`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `product_attributes_ibfk_2` FOREIGN KEY (`id_size`) REFERENCES `size` (`id`),
  ADD CONSTRAINT `product_attributes_ibfk_3` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



