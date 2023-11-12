-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2023 at 02:33 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `billboard`
--

CREATE TABLE `billboard` (
  `billboard_id` int(5) NOT NULL,
  `title` varchar(30) NOT NULL,
  `subtitle` varchar(50) DEFAULT NULL,
  `image_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billboard`
--

INSERT INTO `billboard` (`billboard_id`, `title`, `subtitle`, `image_url`) VALUES
(7, 'Apple Watch Series 9', ' Pay monthly with 1.67% effective interest, after ', '654f0918c500c1.jpg'),
(8, 'iPhone 15: The Ultimate Advanc', 'Experience advanced 5G technology and a groundbrea', '654c6f8b1f8e5ip15.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `name`, `description`) VALUES
(2, 'Dell', 'Dell Inc. is an American based technology company. It develops, sells, repairs, and supports compute'),
(3, 'Asus', 'ASUS is a Taiwan-based, multinational computer hardware and consumer electronics company that was es'),
(4, 'Vivo', 'vivo is a global smartphone manufacturer with production facilities and R&D centers in China (Donggu'),
(5, 'Xiaomi', 'Xiaomi is a consumer electronics and smart manufacturing company with smartphones and smart hardware'),
(6, 'Apple', 'Apple Inc (Apple) designs, manufactures, and markets smartphones, tablets, personal computers, and w'),
(7, 'Samsung', 'Samsung, South Korean company that is one of the world\'s largest producers of electronic devices. Sa');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `description`, `parent_id`) VALUES
(2, 'Laptop', 'Laptop', 0),
(3, 'Apple', 'apple', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) NOT NULL,
  `content` varchar(255) NOT NULL,
  `parrent_id` int(10) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `product_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(10) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_url`, `product_id`) VALUES
(11, '654e4d3e35caa_1.jpg', 8),
(12, '654e4d3e373ab_2.jpg', 8),
(13, '654e4d3e387b7_3.jpg', 8),
(14, '654e4d77c16b0_1.jpg', 9),
(15, '654e4d77c728b_2.jpg', 9),
(16, '654e4d77c850b_3.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `order_note` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `total_amount` float NOT NULL,
  `shipping_address` varchar(100) NOT NULL,
  `order_status` enum('Cancelled','Delivered','Payment Due','Processing') NOT NULL,
  `payment_status` enum('payment on delivery','online payment') NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price_per_unit` float NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `discount` float NOT NULL DEFAULT 0,
  `views` int(10) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `brand_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `quantity`, `description`, `discount`, `views`, `is_featured`, `brand_id`, `category_id`) VALUES
(8, 'iphone 13 - 512G', 12006, 10, 'Super Retina XDR display\r\n6.1‑inch (diagonal) all‑screen OLED display\r\n2532‑by‑1170-pixel resolution at 460 ppi\r\nHDR display\r\nTrue Tone\r\nWide color (P3)\r\nHaptic Touch\r\n2,000,000:1 contrast ratio (typical)\r\n800 nits max brightness (typical); 1200 nits peak', 15, 0, 1, 6, 3),
(9, 'iphone 14 - 512G', 1500, 10, 'Super Retina XDR display\r\n6.1‑inch (diagonal) all‑screen OLED display\r\n2532‑by‑1170-pixel resolution at 460 ppi\r\nHDR display\r\nTrue Tone\r\nWide color (P3)\r\nHaptic Touch\r\n2,000,000:1 contrast ratio (typical)\r\n800 nits max brightness (typical); 1200 nits peak', 0, 0, 0, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(10) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `image_url` varchar(100) DEFAULT NULL,
  `role_id` int(10) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `phone`, `address`, `image_url`, `role_id`) VALUES
(6, 'admin', 'admin@gmail.com', '1', NULL, NULL, NULL, 1),
(7, 'Blazes', 'thangvu123@gmail.com', '1', '', '24,215,07279', '654fa3a7d18792.jpg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billboard`
--
ALTER TABLE `billboard`
  ADD PRIMARY KEY (`billboard_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `fk_comment_to_user` (`user_id`),
  ADD KEY `fk_comment_to_product` (`product_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `fk_image_to_product` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_order_to_user` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `fk_order_detail_to_order` (`order_id`),
  ADD KEY `fk_order_detail_to_product` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_to_brand` (`brand_id`),
  ADD KEY `fk_product_to_category` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_roleid_userid` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billboard`
--
ALTER TABLE `billboard`
  MODIFY `billboard_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comment_to_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `fk_comment_to_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_image_to_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_to_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_detail_to_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `fk_order_detail_to_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_to_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
  ADD CONSTRAINT `fk_product_to_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_roleid_userid` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
