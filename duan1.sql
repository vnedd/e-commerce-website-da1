-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 02:03 AM
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
(7, 'Apple iphone 14 Promax', ' Pay monthly with 1.67% effective interest, after ', '654f0918c500c1.jpg'),
(8, 'iPhone 15: The Ultimate Advanc', 'Experience advanced 5G technology and a groundbrea', '654c6f8b1f8e5ip15.jpg'),
(10, 'AirPods Max', ' Get 6 months of free Apple Music when you buy Air', '655101cacb1d63.png'),
(11, 'Apple Watch Series 9', 'Silver Stainless Steel with Chain Link Strap', '6551023ce29d5apple-w1.jpg');

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
  `image_url` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `image_url`, `description`, `parent_id`) VALUES
(2, 'Laptop', '655187f9ae104laptoo.jpg', 'A laptop', 0),
(3, 'Smartphone', '655410d0409ebphone.jpg', 'A mobile phone', 0),
(6, 'Tablets', '6551781a20ee7tablet.png', 'Tablets', 0),
(7, 'Earphone', '6551899b4ccefearphone.jpg', 'earphone', 0),
(8, 'Accessories', '655178cb870d6pk.jpg', 'Accessories', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) NOT NULL,
  `content` varchar(255) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `product_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `content`, `parent_id`, `created_at`, `product_id`, `user_id`) VALUES
(94, 'xin giá', 0, '2023-11-26', 23, 14),
(95, '666\n', 94, '2023-11-26', 23, 14);

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
(47, '6556322948e65_1.jpg', 19),
(48, '655632294c66a_2.jpg', 19),
(49, '65563229502d2_3.jpg', 19),
(50, '65563a903a943_1.jpg', 20),
(51, '65563a903c021_2.jpg', 20),
(52, '65563a903dd11_3.jpg', 20),
(53, '6556b7645a190_1.jpg', 21),
(54, '6556b7645f4c3_2.jpg', 21),
(55, '6556b764633f8_3.jpg', 21),
(56, '6556b76465cf5_4.jpg', 21),
(57, '6556b7e2a05b8_1.jpg', 22),
(58, '6556b7e2a2223_2.jpg', 22),
(59, '6556b7e2a3cca_3.jpg', 22),
(60, '6556b7e2a56cd_4.jpg', 22),
(61, '6556b8a87303f_1.png', 23),
(62, '6556b8a87447b_2.png', 23),
(63, '6556b8a87a884_samsung-galaxy-z-flip5-tim-3_2.png', 23),
(64, '6556b98d1106e_s23-ultra-xanh.png', 24),
(65, '6556b98d12b7a_s23-ultra-xanh-1.png', 24),
(66, '6556b98d13ea5_s23-ultra-xanh-3.png', 24),
(67, '6556b98d150fd_s23-ultra-xanh-4.png', 24),
(68, '6556bb53e61cc__0000_macbook-air-gallery1-20201110_geo_us.jpg', 25),
(69, '6556bb53f1fda__0003_macbook-air-gallery4-20201110.jpg', 25),
(70, '6556bb5406faf_1 macbookm1.jpg', 25);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `order_username` varchar(50) NOT NULL,
  `order_user_email` varchar(100) NOT NULL,
  `order_tel` varchar(13) NOT NULL,
  `order_note` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  `total_amount` float NOT NULL,
  `shipping_address` varchar(100) NOT NULL,
  `shipping_type_id` int(10) NOT NULL,
  `order_status` enum('Processing','In Transit','Delivered','Cancelled') NOT NULL,
  `payment_methods` enum('payment on delivery','online payment') NOT NULL,
  `payment_status` enum('Processing','Succeeded','Return','') NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_username`, `order_user_email`, `order_tel`, `order_note`, `created_at`, `total_amount`, `shipping_address`, `shipping_type_id`, `order_status`, `payment_methods`, `payment_status`, `user_id`) VALUES
(39, 'Vu Van Thang', 'thangvu2098@gmail.com', '0376548451', '', '2023-11-26', 2016.99, 'Lao Cai', 2, 'Processing', 'online payment', 'Succeeded', 14);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price_per_unit` float NOT NULL,
  `image` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `order_id` int(10) NOT NULL,
  `variant_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `quantity`, `price_per_unit`, `image`, `product_name`, `order_id`, `variant_id`, `product_id`) VALUES
(44, 1, 2010, '6556b8a87303f_1.png', ' Samsung Galaxy Z Fold5 5G 1T', 39, 29, 23);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `discount` float NOT NULL DEFAULT 0,
  `views` int(10) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `brand_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `discount`, `views`, `is_featured`, `brand_id`, `category_id`) VALUES
(19, 'Apple iphone13', '<h3>Trong khi sức h&uacute;t đến từ bộ 4 phi&ecirc;n bản&nbsp;iPhone 12&nbsp;vẫn chưa nguội đi, th&igrave;&nbsp;<a href=\"https://www.thegioididong.com/dtdd-apple-iphone\" target=\"_blank\">h&atilde;ng điện thoại&nbsp;Apple</a>&nbsp;đ&atilde; mang đến cho người d&ugrave;ng một si&ecirc;u phẩm mới iPhone 13 với&nbsp;nhiều cải tiến th&uacute; vị sẽ mang lại những trải nghiệm hấp dẫn nhất cho người d&ugrave;ng.</h3>\r\n\r\n<h3>Hiệu năng vượt trội nhờ chip Apple A15 Bionic</h3>\r\n\r\n<p>Con chip&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-chip-apple-a15-bionic-suc-manh-cuc-khung-duoc-he-1339072\" target=\"_blank\">Apple A15 Bionic</a>&nbsp;si&ecirc;u mạnh được sản xuất tr&ecirc;n quy tr&igrave;nh 5 nm gi&uacute;p&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-13\" target=\"_blank\">iPhone 13</a>&nbsp;đạt hiệu năng ấn tượng, với CPU nhanh hơn 50%,&nbsp;GPU nhanh hơn 30% so với c&aacute;c đối thủ trong c&ugrave;ng ph&acirc;n kh&uacute;c.</p>\r\n\r\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-1-1.jpg\" onclick=\"return false;\"><img alt=\"Chip Apple A15 Bionic mạnh mẽ - iPhone 13 128GB\" src=\"https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-1-1.jpg\" /></a></p>\r\n\r\n<p>Nhờ hiệu năng được cải tiến, người d&ugrave;ng c&oacute; được những trải nghiệm tốt hơn tr&ecirc;n điện thoại khi d&ugrave;ng c&aacute;c ứng dụng chỉnh sửa ảnh hay chiến c&aacute;c tựa game đồ họa cao mượt m&agrave;.</p>\r\n\r\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-2.jpg\" onclick=\"return false;\"><img alt=\"Đồ họa mượt mà - iPhone 13 128GB\" src=\"https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-2.jpg\" /></a></p>\r\n\r\n<p>iPhone 13 trang bị&nbsp;bộ nhớ trong 128 GB&nbsp;dung lượng l&yacute; tưởng&nbsp;cho ph&eacute;p bạn thỏa th&iacute;ch lưu trữ mọi nội dung theo &yacute; muốn m&agrave; kh&ocirc;ng lo nhanh đầy bộ nhớ.</p>\r\n\r\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-19.jpg\" onclick=\"return false;\"><img alt=\"Dung lượng bộ nhớ - iPhone 13 128GB\" src=\"https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-19.jpg\" /></a></p>\r\n\r\n<h3>Tốc độ 5G tốt hơn&nbsp;</h3>\r\n\r\n<p>Mạng 5G được cải thiện chất lượng với nhiều băng tần hơn, với 5G gi&uacute;p điện thoại xem trực tuyến hay tải xuống c&aacute;c ứng dụng v&agrave; t&agrave;i liệu đều đạt tốc độ nhanh ch&oacute;ng. Kh&ocirc;ng chỉ vậy, si&ecirc;u phẩm mới n&agrave;y c&ograve;n c&oacute; chế độ dữ liệu th&ocirc;ng minh, tự động ph&aacute;t hiện v&agrave; giảm tải tốc độ mạng để tiết kiệm năng lượng khi kh&ocirc;ng cần d&ugrave;ng tốc độ cao.</p>\r\n\r\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-4.jpg\" onclick=\"return false;\"><img alt=\"Hỗ trợ kết nối 5G hiện đại - iPhone 13 128GB\" src=\"https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-4.jpg\" /></a></p>\r\n\r\n<h3>M&agrave;n h&igrave;nh Super Retina XDR độ s&aacute;ng cao, tiết kiệm pin</h3>\r\n\r\n<p>iPhone 13 sử dụng tấm nền OLED với k&iacute;ch thước m&agrave;n h&igrave;nh 6.1 inch&nbsp;cho chất lượng m&agrave;u sắc v&agrave; chi tiết h&igrave;nh ảnh sắc n&eacute;t, sống động, độ ph&acirc;n giải đạt 1170 x 2532 Pixels.</p>\r\n', 10, 64, 1, 6, 3),
(20, 'Apple iphone14', '<h3><a href=\"https://www.thegioididong.com/dtdd/iphone-14\" target=\"_blank\">iPhone 14 128GB</a>&nbsp;được xem l&agrave; mẫu smartphone b&ugrave;ng nổ của nh&agrave; t&aacute;o trong năm 2022, ấn tượng với ngoại h&igrave;nh trẻ trung, m&agrave;n h&igrave;nh chất lượng đi k&egrave;m với những cải tiến về hệ điều h&agrave;nh v&agrave; thuật to&aacute;n xử l&yacute; h&igrave;nh ảnh, gi&uacute;p m&aacute;y trở th&agrave;nh c&aacute;i t&ecirc;n thu h&uacute;t được đ&ocirc;ng đảo người d&ugrave;ng quan t&acirc;m tại thời điểm ra mắt.</h3>\r\n\r\n<h3>iPhone 14 sở hữu thiết kế cao cấp</h3>\r\n\r\n<p>Với phi&ecirc;n bản&nbsp;ti&ecirc;u chuẩn th&igrave; nh&agrave; Apple vẫn giữ nguy&ecirc;n kiểu d&aacute;ng thiết kế so với thế hệ tiền nhiệm, vẫn l&agrave; mặt lưng phẳng c&ugrave;ng bộ khung vu&ocirc;ng gi&uacute;p m&aacute;y trở n&ecirc;n hiện đại hơn.</p>\r\n\r\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-100323-101502.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế hiện đại - iPhone 14 128GB\" src=\"https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-100323-101502.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/dtdd-apple-iphone-14-series\" target=\"_blank\">iPhone 14</a>&nbsp;c&oacute; k&iacute;ch thước chiều ngang l&agrave; 71.5 mm n&ecirc;n m&aacute;y c&oacute; thể dễ d&agrave;ng nằm gọn trong l&ograve;ng b&agrave;n tay mỗi khi sử dụng, điều n&agrave;y l&agrave;m cho&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\">điện thoại</a>&nbsp;trở n&ecirc;n ph&ugrave; hợp hơn với nhiều đối tượng người d&ugrave;ng hơn, kể cả những bạn nữ c&oacute; b&agrave;n tay nhỏ nhắn.</p>\r\n\r\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-camera.jpg\" onclick=\"return false;\"><img alt=\"Camera - iPhone 14 128GB\" src=\"https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-camera.jpg\" /></a></p>\r\n\r\n<p>Mặt lưng của điện thoại được thiết kế từ k&iacute;nh cường lực v&agrave; ho&agrave;n thiện theo kiểu nhẵn b&oacute;ng, theo m&igrave;nh th&igrave; c&aacute;ch l&agrave;m n&agrave;y gi&uacute;p cho iPhone 14 tr&ocirc;ng cuốn h&uacute;t hơn, b&ecirc;n cạnh đ&oacute; n&oacute; m&aacute;y cũng kh&aacute; bền bỉ c&oacute; thể mang lại khả năng chống chịu c&aacute;c vết xước được tốt hơn.</p>\r\n\r\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-261222-100027.jpg\" onclick=\"return false;\"><img alt=\"Mặt lưng kính cường lực - iPhone 14 128GB\" src=\"https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-261222-100027.jpg\" /></a></p>\r\n\r\n<p>C&oacute; một lưu &yacute; nhỏ ở phần thiết kế l&agrave; m&aacute;y kh&aacute; dễ b&aacute;m dấu v&acirc;n tay, điều n&agrave;y c&agrave;ng th&ecirc;m lộ r&otilde; ở những phi&ecirc;n bản c&oacute; m&agrave;u đậm như đen v&agrave; đỏ, c&ograve;n ở c&aacute;c phi&ecirc;n bản m&agrave;u s&aacute;ng như xanh dương, trắng v&agrave; t&iacute;m nhạt th&igrave; điều n&agrave;y cũng được cải thiện.</p>\r\n\r\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-261222-100029.jpg\" onclick=\"return false;\"><img alt=\"Hạn chế vết bám - iPhone 14 128GB\" src=\"https://cdn.tgdd.vn/Products/Images/42/240259/iphone-14-261222-100029.jpg\" /></a></p>\r\n\r\n<p>Tuy nhi&ecirc;n đ&acirc;y cũng l&agrave; điều thường gặp tr&ecirc;n c&aacute;c mẫu điện thoại c&oacute; mặt lưng k&iacute;nh n&ecirc;n m&igrave;nh cũng kh&ocirc;ng xem đ&acirc;y l&agrave; điểm trừ d&agrave;nh cho iPhone 14, bằng c&aacute;ch trang bị th&ecirc;m ốp lưng l&agrave; ta đ&atilde; c&oacute; thể khắc phục ho&agrave;n to&agrave;n t&igrave;nh trạng tr&ecirc;n v&agrave; c&ograve;n tăng th&ecirc;m độ bền cho điện thoại.</p>\r\n\r\n<p>Năm nay Apple cho ra mắt hai phi&ecirc;n bản c&oacute; m&agrave;u mới d&agrave;nh cho iPhone 14 l&agrave; t&iacute;m nhạt v&agrave; xanh dương, theo m&igrave;nh thấy th&igrave; m&agrave;u xanh n&agrave;y c&oacute; m&agrave;u dịu nhẹ hơn so với iPhone 13. Vậy n&ecirc;n nhờ m&agrave;u sắc m&agrave; m&igrave;nh c&oacute; thể dễ d&agrave;ng ph&acirc;n biệt giữa hai d&ograve;ng điện thoại, nếu muốn mọi người xung quanh biết được rằng bạn đang sở hữu iPhone 14 th&igrave; hai m&agrave;u sắc n&agrave;y sẽ l&agrave; sự lựa chọn rất ph&ugrave; hợp.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 15, 239, 1, 6, 3),
(21, 'Apple iphone14 Plus', '<h3>Sau nhiều thế hệ điện thoại của Apple th&igrave; c&aacute;i t&ecirc;n &ldquo;Plus&rdquo; cũng đ&atilde; ch&iacute;nh thức trở lại v&agrave;o năm 2022 v&agrave; xuất hiện tr&ecirc;n chiếc iPhone 14 Plus 128GB, nổi trội với ngoại h&igrave;nh bắt trend c&ugrave;ng m&agrave;n h&igrave;nh k&iacute;ch thước lớn để đem đến kh&ocirc;ng gian hiển thị tốt hơn c&ugrave;ng cấu h&igrave;nh mạnh mẽ kh&ocirc;ng đổi so với bản ti&ecirc;u chuẩn.</h3>\r\n\r\n<h3>Th&acirc;n h&igrave;nh thanh mảnh c&ugrave;ng ngoại h&igrave;nh g&oacute;c cạnh</h3>\r\n\r\n<p>Giống như những thế hệ &ldquo;Plus&rdquo; trước đ&acirc;y, iPhone 14 Plus vẫn sẽ l&agrave; phi&ecirc;n bản ph&oacute;ng to từ&nbsp;<a href=\"https://www.thegioididong.com/dtdd-apple-iphone-14-series\" target=\"_blank\">iPhone 14</a>&nbsp;với ng&ocirc;n ngữ thiết kế kh&ocirc;ng đổi, vẫn sẽ l&agrave; cạnh viền vu&ocirc;ng vức đi k&egrave;m với mặt lưng phẳng để tạo n&ecirc;n c&aacute;i nh&igrave;n bắt trend v&agrave; đặc trưng.</p>\r\n\r\n<p><img alt=\"Thiết kế thời thượng - iPhone 14 Plus 128GB\" src=\"https://lh6.googleusercontent.com/uFkCH7w2YQ23NGogMNZ5iztW88sH3e8pJFentXJ1gAB-f8p1g4y8kA-b0UzSN0V1Uaifr3cTIlj_DW9au2m_tsekvdK_O4FCmzK9ZPVEvF9fwbGMi9JMDqV8j109DODHaYI4-aikdtS_Y4BeNB8jbnq8jtqQQ7ySe8XpEC_x7avEonLpAaznbaeWPZWT\" /></p>\r\n\r\n<p>Về phần chế t&aacute;c th&igrave; m&aacute;y sẽ được bao bọc bởi một bộ khung l&agrave;m từ nh&ocirc;m, vừa tối ưu được khối lượng vừa mang đến một độ bền kh&aacute; tốt. Phần n&agrave;y được l&agrave;m theo kiểu nh&aacute;m nhẹ n&ecirc;n cảm gi&aacute;c khi cầm nắm l&agrave; rất tốt.</p>\r\n\r\n<p>C&ograve;n ở mặt lưng th&igrave; h&atilde;ng đ&atilde; sử dụng ho&agrave;n to&agrave;n từ k&iacute;nh cường lực, bộ phận n&agrave;y được l&agrave;m theo kiểu nhẵn b&oacute;ng n&ecirc;n m&aacute;y sẽ trở n&ecirc;n rất bắt mắt v&agrave; mới mẻ, tạo cho m&igrave;nh cảm gi&aacute;c sang trọng hơn khi sử dụng.</p>\r\n\r\n<p><img alt=\"Thiết kế thời thượng - iPhone 14 Plus 128GB\" src=\"https://lh4.googleusercontent.com/i5GTP0k39aWeOxRyqzevWYE2njiApi8C4N_lxP75b-Yh4dffB90LzZXPftD7Fy_NwNJH87SOgpfSOmr035zzZ5JYB810Ul_2kxeSDaJDEYK9f6U5ZiELWWx3V8JlCZoKfd8tVIgir1NjTw5zrAYGh8dQzm2Mq_KBdy2tIvCkp_zEdtyNtTzGsnM2Hs2Q\" /></p>\r\n\r\n<p>Theo m&igrave;nh thấy th&igrave; iPhone 14 Plus mang một c&aacute;i nh&igrave;n rất thanh mảnh bởi độ mỏng của m&aacute;y nằm ở mức 7.8 mm. Đối với chiều ngang của&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\">điện thoại</a>&nbsp;sẽ l&agrave; 78.1 mm, đ&acirc;y được xem l&agrave; con số vừa phải chứ kh&ocirc;ng thực sự &ldquo;qu&aacute; cỡ&rdquo; như bao lời đồn đo&aacute;n.</p>\r\n\r\n<p><img alt=\"Dễ dàng bỏ túi - iPhone 14 Plus 128GB\" src=\"https://lh3.googleusercontent.com/kkAjeuYG9GiJOxQO3DOePiRlNiI2CPrZeynbsN4xIYssG-6-3O42Cy9EuokpiYM7Mvbw0MfCK0Uu03yVVDz7Kks5Fr-q4DNWw9PAIj120w7AO-NB1lGsB8jaSm7hwt9ZLX3llqKxb0GqkYHsSTstUDxQxZeiNJdw1bMPA7WL1Fk2cWEE-6wGBTa6WsTl\" /></p>\r\n\r\n<p>Kiểu thiết kế camera năm nay Apple vẫn giữ nguy&ecirc;n c&aacute;ch sắp xếp v&agrave; bố tr&iacute; so với&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-13\" target=\"_blank\">iPhone 13</a>, vẫn l&agrave; bộ đ&ocirc;i camera xếp ch&eacute;o lạ mắt, đi k&egrave;m đ&egrave;n LED đặt b&ecirc;n tr&ecirc;n.&nbsp;</p>\r\n', 10, 41, 1, 6, 3),
(22, 'Apple iphone15 Promax', '<h3>iPhone 15 Pro Max&nbsp;mẫu điện thoại mới nhất của Apple cuối c&ugrave;ng cũng đ&atilde; ch&iacute;nh thức được ra mắt v&agrave;o th&aacute;ng 09/2023. Mẫu điện thoại n&agrave;y sở hữu một con chip với hiệu năng mạnh mẽ Apple A17 Pro, m&agrave;n h&igrave;nh đẹp mắt v&agrave; cụm camera v&ocirc; c&ugrave;ng chất lượng.</h3>\r\n\r\n<h3>Diện mạo đẳng cấp v&agrave; cực kỳ sang trọng</h3>\r\n\r\n<p>iPhone 15 Pro Max tiếp tục sẽ l&agrave; một chiếc điện thoại c&oacute; m&agrave;n h&igrave;nh v&agrave; mặt lưng phẳng đặc trưng đến từ nh&agrave; Apple, mang lại vẻ đẹp thanh lịch v&agrave; sang trọng.</p>\r\n\r\n<p>Chất liệu chủ đạo của iPhone 15 Pro Max vẫn l&agrave; khung kim loại v&agrave; mặt lưng k&iacute;nh cường lực, tạo n&ecirc;n sự bền bỉ v&agrave; chắc chắn. Tuy nhi&ecirc;n, với c&ocirc;ng nghệ ti&ecirc;n tiến, khung n&agrave;y đ&atilde; được n&acirc;ng cấp th&agrave;nh chất liệu titanium thay v&igrave; th&eacute;p kh&ocirc;ng gỉ hay nh&ocirc;m ở những thế hệ trước.</p>\r\n\r\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/42/299033/iphone-15-pro-130923-102854.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế điện thoại - iPhone 15 Pro Max\" src=\"https://cdn.tgdd.vn/Products/Images/42/299033/iphone-15-pro-130923-102854.jpg\" /></a></p>\r\n\r\n<p><em>Nguồn: Ảnh được tr&iacute;ch từ Apple.com</em></p>\r\n\r\n<p>Năm nay c&oacute; một ch&uacute;t thay đổi về phần thiết kế bộ khung nhờ c&aacute;ch tạo viền mới, phần viền giờ đ&acirc;y đ&atilde; &iacute;t phẳng đi một ch&uacute;t để tạo sự bo cong nhẹ gi&uacute;p mang lại cảm gi&aacute;c cầm nắm tuyệt vời hơn, sử dụng điện thoại trong thời gian d&agrave;i v&igrave; thế cũng trở n&ecirc;n dễ chịu.</p>\r\n\r\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-290923-030416.jpg\" onclick=\"return false;\"><img alt=\"Bộ khung điện thoại - iPhone 15 Pro Max\" src=\"https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-290923-030416.jpg\" /></a></p>\r\n\r\n<p><em>Nguồn: Ảnh được tr&iacute;ch từ Apple.com</em></p>\r\n\r\n<p>Thiết kế h&igrave;nh notch dạng vi&ecirc;n thuốc tiếp tục xuất hiện tr&ecirc;n iPhone 15 Pro Max, gi&uacute;p mang đến trải nghiệm sử dụng th&uacute; vị hơn bao giờ hết v&agrave; đặc biệt hơn khi đi k&egrave;m với t&iacute;nh năng Dynamic Island.</p>\r\n\r\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/42/299033/iphone-15-pro-130923-103025.jpg\" onclick=\"return false;\"><img alt=\"Hình noch điện thoại - iPhone 15 Pro Max\" src=\"https://cdn.tgdd.vn/Products/Images/42/299033/iphone-15-pro-130923-103025.jpg\" /></a></p>\r\n\r\n<p><em>Nguồn: Ảnh được tr&iacute;ch từ Apple.com</em></p>\r\n\r\n<h3>Trang bị kiểu h&igrave;nh notch dạng Dynamic Island</h3>\r\n\r\n<p>Dynamic Island l&agrave; một t&iacute;nh năng độc đ&aacute;o m&agrave; iPhone 15 Pro Max mang đến. Đ&acirc;y l&agrave; một phần của m&agrave;n h&igrave;nh d&agrave;nh ri&ecirc;ng cho th&ocirc;ng b&aacute;o v&agrave; tương t&aacute;c nhanh ch&oacute;ng m&agrave; kh&ocirc;ng l&agrave;m gi&aacute;n đoạn trải nghiệm xem nội dung ch&iacute;nh. Dynamic Island gi&uacute;p bạn dễ d&agrave;ng kiểm tra th&ocirc;ng b&aacute;o, kiểm so&aacute;t &acirc;m nhạc, v&agrave; thậm ch&iacute; l&agrave; xem bản đồ m&agrave; kh&ocirc;ng cần tho&aacute;t khỏi ứng dụng bạn đang sử dụng.</p>\r\n', 5, 7, 1, 6, 3),
(23, ' Samsung Galaxy Z Fold5 5G', '<h3>Thiết kế gập mở linh hoạt</h3>\r\n\r\n<p>Samsung Galaxy Z Fold5 vẫn tiếp tục giữ nguy&ecirc;n thiết kế gập độc đ&aacute;o dạng ngang của d&ograve;ng Galaxy Z Fold trước đ&oacute;. Với k&iacute;ch thước nhỏ gọn khi gập lại,&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\">điện thoại</a>&nbsp;n&agrave;y trở n&ecirc;n dễ d&agrave;ng mang theo v&agrave; cất giữ trong t&uacute;i &aacute;o hay t&uacute;i x&aacute;ch của bạn. Khi mở ra, Galaxy Z Fold5 trở th&agrave;nh một chiếc điện thoại th&ocirc;ng thường với m&agrave;n h&igrave;nh lớn hơn, mang đến trải nghiệm sử dụng rộng lớn v&agrave; ấn tượng.</p>\r\n\r\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/42/301608/samsung-galaxy-z-fold5-260723-095313.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế điện thoại - Samsung Galaxy Z Fold5\" src=\"https://cdn.tgdd.vn/Products/Images/42/301608/samsung-galaxy-z-fold5-260723-095313.jpg\" /></a></p>\r\n\r\n<p>Samsung lu&ocirc;n hướng đến chất lượng v&agrave; đẳng cấp trong việc chọn chất liệu cho sản phẩm của m&igrave;nh. Với Galaxy Z Fold5, khung b&ecirc;n ngo&agrave;i của m&aacute;y được l&agrave;m từ hợp kim nh&ocirc;m Armor Aluminum, mang đến cảm gi&aacute;c cứng c&aacute;p v&agrave; đẳng cấp trong việc cầm nắm.</p>\r\n\r\n<p>Bản lề của Samsung Galaxy Z Fold5 được thiết kế đặc biệt để đảm bảo t&iacute;nh ổn định v&agrave; sự mở đ&oacute;ng mượt m&agrave;. Đ&acirc;y l&agrave; một phần quan trọng trong thiết kế của điện thoại gập, v&igrave; thế Samsung đ&atilde; đầu tư nghi&ecirc;n cứu v&agrave; ph&aacute;t triển để cải thiện, tối ưu bản lề v&agrave; cho ra c&ocirc;ng nghệ r&atilde;nh k&eacute;p, n&oacute; gi&uacute;p gập mở dễ d&agrave;ng v&agrave; tối ưu được độ mờ nếp gấp.</p>\r\n\r\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/42/301608/samsung-galaxy-z-fold5-260723-095317.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế điện thoại - Samsung Galaxy Z Fold5\" src=\"https://cdn.tgdd.vn/Products/Images/42/301608/samsung-galaxy-z-fold5-260723-095317.jpg\" /></a></p>\r\n\r\n<p>Với sự ph&aacute;t triển của c&ocirc;ng nghệ linh hoạt v&agrave; tiến bộ trong vật liệu, Samsung đ&atilde; thể hiện sự ch&uacute; trọng đ&aacute;ng kể v&agrave;o việc l&agrave;m cho Galaxy Z Fold5 trở n&ecirc;n cực kỳ mỏng. Với độ mỏng chỉ 13.4 mm khi gập lại v&agrave; 6.1 mm khi mở rộng (&iacute;t hơn 2.4 mm so với đời trước), điện thoại mang lại một cảm gi&aacute;c tinh tế v&agrave; thanh lịch cho người d&ugrave;ng.</p>\r\n\r\n<p>Tuy d&aacute;ng mỏng nhưng Galaxy Z Fold5 kh&ocirc;ng gặp phải vấn đề về độ bền v&agrave; ổn định nhờ v&agrave;o sự t&iacute;ch hợp cẩn thận của bản lề c&ugrave;ng chất liệu chắc chắn gi&uacute;p người d&ugrave;ng c&oacute; thể tự tin v&agrave; y&ecirc;n t&acirc;m khi sử dụng.</p>\r\n\r\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/42/301608/samsung-galaxy-z-fold5-260723-095321.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế điện thoại - Samsung Galaxy Z Fold5\" src=\"https://cdn.tgdd.vn/Products/Images/42/301608/samsung-galaxy-z-fold5-260723-095321.jpg\" /></a></p>\r\n\r\n<p>Ngo&agrave;i ra, Samsung cũng đ&atilde; t&iacute;ch hợp c&ocirc;ng nghệ kh&aacute;ng nước IPX8 ti&ecirc;n tiến v&agrave;o thiết kế của Galaxy Z Fold5. Bằng c&aacute;ch sử dụng c&aacute;c kỹ thuật chống thấm nước ti&ecirc;n tiến v&agrave; độ bền cao, chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd-samsung-galaxy-z\" target=\"_blank\">điện thoại Samsung d&ograve;ng gập</a>&nbsp;n&agrave;y c&oacute; thể chịu được tiếp x&uacute;c với nước khi đi mưa trong một thời gian ngắn m&agrave; kh&ocirc;ng ảnh hưởng đến hoạt động b&ecirc;n trong.</p>\r\n\r\n<h3>N&acirc;ng cao trải nghiệm với m&agrave;n h&igrave;nh chất lượng</h3>\r\n\r\n<p>M&agrave;n h&igrave;nh của Samsung Galaxy Z Fold5 l&agrave; một trong những yếu tố quan trọng l&agrave;m n&ecirc;n sự th&agrave;nh c&ocirc;ng v&agrave; đẳng cấp của chiếc điện thoại n&agrave;y. Với sự ph&aacute;t triển của c&ocirc;ng nghệ m&agrave;n h&igrave;nh, Galaxy Z Fold5 mang đến những trải nghiệm hiển thị đ&aacute;ng kinh ngạc v&agrave; ti&ecirc;n tiến cho người d&ugrave;ng.</p>\r\n\r\n<p>Samsung Galaxy Z Fold5 sử dụng tấm nền Dynamic AMOLED 2X đa điểm với khả năng hiển thị m&agrave;u sắc v&ocirc; c&ugrave;ng sắc n&eacute;t, ch&acirc;n thực v&agrave; rực rỡ. Tấm nền n&agrave;y cho ph&eacute;p t&aacute;i tạo độ ph&acirc;n giải cao v&agrave; độ tương phản đ&aacute;ng kể, gi&uacute;p h&igrave;nh ảnh, video v&agrave; nội dung tr&ecirc;n m&agrave;n h&igrave;nh trở n&ecirc;n sống động v&agrave; ch&acirc;n thực.&nbsp;</p>\r\n', 0, 2, 1, 7, 3),
(24, 'Samsung Galaxy S23 Ultra 5G', '<h3><a href=\"https://www.thegioididong.com/dtdd/samsung-galaxy-s23-ultra\" target=\"_blank\">Samsung Galaxy S23 Ultra 5G 256GB</a>&nbsp;l&agrave; chiếc smartphone cao cấp nhất của nh&agrave; Samsung, sở hữu cấu h&igrave;nh kh&ocirc;ng tưởng với con chip khủng được&nbsp;Qualcomm tối ưu ri&ecirc;ng cho d&ograve;ng Galaxy&nbsp;v&agrave; camera l&ecirc;n đến 200 MP, xứng danh l&agrave; chiếc flagship Android được mong đợi nhất trong năm 2023.</h3>\r\n\r\n<h3>Tạo h&igrave;nh sang trọng đầy tinh tế</h3>\r\n\r\n<p>Về thiết kế th&igrave; Samsung Galaxy S23 Ultra sẽ tiếp tục thừa hưởng kiểu d&aacute;ng sang trọng đến từ thế hệ trước, vẫn l&agrave; bộ khung kim loại, mặt lưng k&iacute;nh c&ugrave;ng kiểu tạo h&igrave;nh bo cong nhẹ ở cạnh b&ecirc;n v&agrave; m&agrave;n h&igrave;nh.</p>\r\n\r\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/42/249948/samsung-galaxy-s23-ultra-150423-020326.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế sang trọng - Samsung Galaxy S23 Ultra 5G 256GB\" src=\"https://cdn.tgdd.vn/Products/Images/42/249948/samsung-galaxy-s23-ultra-150423-020326.jpg\" /></a></p>\r\n\r\n<p>Tuy nhi&ecirc;n kiểu bo cong n&agrave;y sẽ hơi thi&ecirc;n hướng phẳng một ch&uacute;t so với S22 Ultra, điều n&agrave;y mang đến cho m&igrave;nh trải nghiệm cầm nắm chắc tay hơn, song cũng mang lại cảm gi&aacute;c dễ chịu cho những l&uacute;c sử dụng li&ecirc;n tục trong thời gian d&agrave;i.</p>\r\n\r\n<p>Về m&agrave;u sắc, năm nay Samsung cũng đ&atilde; cho ra c&aacute;c phi&ecirc;n bản m&agrave;u như: T&iacute;m, kem, xanh v&agrave; đen. Nh&igrave;n chung th&igrave; đ&acirc;y l&agrave; những m&agrave;u sắc cực kỳ sang trọng v&agrave; lịch l&atilde;m, ph&ugrave; hợp cho c&aacute;c bạn trẻ năng động, mạnh mẽ v&agrave; đặc biệt l&agrave; những kh&aacute;ch h&agrave;ng đang l&agrave; doanh nh&acirc;n bởi ngoại h&igrave;nh đẳng cấp v&agrave; thanh lịch.</p>\r\n\r\n<p>Hiện tr&ecirc;n tay m&igrave;nh l&agrave; bản m&agrave;u xanh đặc trưng của Samsung, m&agrave;u n&agrave;y vừa đem đến sự trẻ trung tươi mới v&agrave; cũng vừa mang tr&ecirc;n m&igrave;nh một gam m&agrave;u tối để c&oacute; thể giữ được vẻ huyền b&iacute; đầy m&ecirc; hoặc.</p>\r\n\r\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/42/249948/samsung-galaxy-s23-ultra-150423-020336.jpg\" onclick=\"return false;\"><img alt=\"Màu sắc mê hoặc - Samsung Galaxy S23 Ultra 5G 256GB\" src=\"https://cdn.tgdd.vn/Products/Images/42/249948/samsung-galaxy-s23-ultra-150423-020336.jpg\" /></a></p>\r\n\r\n<p>Ở mặt lưng ta c&oacute; thể thấy Samsung trang bị cho m&aacute;y một lớp k&iacute;nh cường lực c&oacute; khả năng chống va đập tốt, được l&agrave;m theo kiểu nh&aacute;m nhẹ gi&uacute;p cho việc b&aacute;m dấu v&acirc;n tay gần như kh&ocirc;ng thấy xuất hiện trong qu&aacute; tr&igrave;nh m&igrave;nh trải nghiệm.</p>\r\n\r\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/42/249948/samsung-galaxy-s23-ultra-150423-020340.jpg\" onclick=\"return false;\"><img alt=\"Mặt lưng kính nhám - Samsung Galaxy S23 Ultra 5G 256GB\" src=\"https://cdn.tgdd.vn/Products/Images/42/249948/samsung-galaxy-s23-ultra-150423-020340.jpg\" /></a></p>\r\n\r\n<p>Về phần thiết kế camera th&igrave; năm nay h&atilde;ng gần như kh&ocirc;ng c&oacute; sự thay đổi g&igrave; so với Galaxy S22 Ultra, vẫn l&agrave; cụm camera được bố tr&iacute; ri&ecirc;ng lẻ v&agrave; được l&agrave;m nh&ocirc; l&ecirc;n kh&aacute; cao.</p>\r\n\r\n<p>Tuy nhi&ecirc;n xung quanh c&aacute;c ống k&iacute;nh sẽ được th&ecirc;m một lớp viền cao hơn so với bề mặt camera, điều n&agrave;y gi&uacute;p hạn chế việc trầy xước bề mặt ống k&iacute;nh rất tốt n&ecirc;n m&igrave;nh cũng y&ecirc;n t&acirc;m hơn trong l&uacute;c d&ugrave;ng.</p>\r\n\r\n<p><a href=\"https://cdn.tgdd.vn/Products/Images/42/249948/samsung-galaxy-s23-ultra-150423-020347.jpg\" onclick=\"return false;\"><img alt=\"Vị trí camera - Samsung Galaxy S23 Ultra 5G 256GB\" src=\"https://cdn.tgdd.vn/Products/Images/42/249948/samsung-galaxy-s23-ultra-150423-020347.jpg\" /></a></p>\r\n\r\n<p>C&ograve;n về viền xung quanh m&aacute;y, Galaxy S23 Ultra được bao bọc bởi bộ khung l&agrave;m từ nh&ocirc;m với đặc t&iacute;nh bền bỉ, chắc chắn c&ugrave;ng trọng lượng được tối ưu cực kỳ hiệu quả.</p>\r\n\r\n<p>Bộ khung n&agrave;y được l&agrave;m theo kiểu b&oacute;ng lo&aacute;ng gi&uacute;p m&aacute;y c&oacute; th&ecirc;m một điểm nhấn đầy nổi bật về thiết kế. Cảm gi&aacute;c khi sờ v&agrave;o bộ khung như được phủ một lớp mạ b&oacute;ng xung quanh, v&igrave; thế đ&acirc;y sẽ kh&ocirc;ng phải l&agrave; vị tr&iacute; dễ xước như một bộ phận người người d&ugrave;ng ho&agrave;i nghi.&nbsp;</p>\r\n', 0, 0, 1, 7, 3),
(25, 'Apple MacBook Air M1 2020', '<h3><strong>Thiết kế tinh tế, chất liệu nh&ocirc;m bền bỉ</strong></h3>\r\n\r\n<p>Macbook Air 2020 M1 mới vẫn lu&ocirc;n tu&acirc;n thủ triết l&yacute; thiết kế với những đường n&eacute;t đơn nhưng v&ocirc; c&ugrave;ng sang trọng. M&aacute;y c&oacute; độ mỏng nhẹ chỉ 1,29kg v&agrave; c&aacute;c cạnh tr&agrave;n viền khiến thiết bị trở n&ecirc;n đẹp hơn v&agrave; cao cấp hơn.</p>\r\n\r\n<p><img alt=\"Thiết kế tinh tế, chất liệu nhôm bền bỉ\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:80/plain/https://cellphones.com.vn/media/wysiwyg/laptop/macbook/Air/M1-2020/macbook-air-2020-m1-4.jpg\" /></p>\r\n\r\n<p>Vỏ nh&ocirc;m b&ecirc;n ngo&agrave;i mang đến sự bền bỉ vượt trội theo thời gian. C&aacute;c cổng vẫn được thiết kế tương tự như phi&ecirc;n bản trước đ&oacute; được ra mắt hồi th&aacute;ng 3 năm 2020.</p>\r\n\r\n<p><em>&gt;&gt;&gt;&nbsp;<strong>T&igrave;m hiểu th&ecirc;m</strong>:&nbsp;<a href=\"https://cellphones.com.vn/macbook-air-2022.html\" target=\"_blank\">Macbook Air 2022</a>&nbsp;thiết kế mỏng nhẹ v&ocirc; c&ugrave;ng ấn tượng</em></p>\r\n\r\n<h3><strong>M&agrave;n h&igrave;nh Retina 13.3 inch tr&aacute;ng gương</strong></h3>\r\n\r\n<p>MacBook Air M1 256GB 2020&nbsp;được trang bị m&agrave;n h&igrave;nh Retina IPS 13.3 inch mang đến nhiều m&agrave;u sắc hơn l&ecirc;n đến 48% so với những thế hệ trước đ&oacute;. B&ecirc;n cạnh đ&oacute;, m&agrave;n h&igrave;nh tr&aacute;ng gương tr&agrave;n viền khiến viền gi&uacute;p mỏng hơn 50% so với trước đ&acirc;y.</p>\r\n\r\n<p><img alt=\"Màn hình Retina 13.3 inch tráng gương\" src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:80/plain/https://cellphones.com.vn/media/wysiwyg/laptop/macbook/Air/M1-2020/macbook-air-2020-m1-6.jpg\" /></p>\r\n\r\n<p>Với độ ph&acirc;n giải 2560 x 1600 v&agrave; tỉ lệ khung h&igrave;nh 16:10 với 227 ppi gi&uacute;p h&igrave;nh ảnh trở n&ecirc;n r&otilde; n&eacute;t v&agrave; sống động hơn bao giờ hết. Ngo&agrave;i ra, c&ocirc;ng nghệ True Tone tr&ecirc;n m&aacute;y tự động điều chỉnh c&acirc;n bằng trắng gi&uacute;p ph&ugrave; hợp với nhiệt độ m&agrave;u của &aacute;nh s&aacute;ng xung quanh v&agrave; mang đến kh&ocirc;ng gian m&agrave;u rộng hơn 25% so với sRGB.</p>\r\n\r\n<h3><strong>Chip M1, hiệu năng cực đỉnh</strong></h3>\r\n\r\n<p>Điểm nhấn của&nbsp;MacBook Air M1 256GB 2020&nbsp;ch&iacute;nh l&agrave; con chip M1. CPU của chip M1 sẽ c&oacute; 8 nh&acirc;n, bao gồm 4 nh&acirc;n hiệu suất cao v&agrave; 4 nh&acirc;n hiệu suất thấp mang đến sức mạnh vượt trội cho thiết bị rất. Sức mạnh tr&ecirc;n M1 256GB hơn 98% so với c&aacute;c laptop Windows v&agrave; hiệu năng vượt trội hơn so với c&aacute;c phi&ecirc;n bản Air sử dụng chip Intel.</p>\r\n', 0, 0, 0, 6, 2);

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
-- Table structure for table `shipping_types`
--

CREATE TABLE `shipping_types` (
  `shipping_type_id` int(10) NOT NULL,
  `shipping_type_name` varchar(50) NOT NULL,
  `shipping_type_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_types`
--

INSERT INTO `shipping_types` (`shipping_type_id`, `shipping_type_name`, `shipping_type_price`) VALUES
(1, 'Standard shipping(7-10 days)', 6.99),
(2, 'Fast shipping(3-5 days)', 9.99);

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
(10, 'admin', 'admin@gmail.com', '1', '', '27,261,09388', '6554e3daa798d6.jpg', 1),
(14, 'Vu Van Thang', 'thangvu2098@gmail.com', 'Admin123@', '0376548451', '27,263,09490', '65632a1be23749.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `variant_id` int(10) NOT NULL,
  `variant_name` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`variant_id`, `variant_name`, `quantity`, `price`, `product_id`) VALUES
(18, '8G RAM - 128G ROM', 19, 860.00, 20),
(19, '8G RAM - 256G ROM', 40, 900.00, 20),
(20, '8G RAM - 512G ROM', 64, 1200.00, 20),
(21, '8G RAM - 128G ROM', 20, 900.00, 21),
(22, '8G RAM - 256G ROM', 60, 1200.00, 21),
(23, '8G RAM - 512G ROM', 70, 1350.00, 21),
(24, '8G RAM - 128G ROM', 10, 1500.00, 22),
(25, '8G RAM - 256G ROM', 20, 1650.00, 22),
(26, '8G RAM - 512G ROM', 40, 1780.00, 22),
(27, '256G', 50, 1700.00, 23),
(28, '512G', 9, 1820.00, 23),
(29, '1T', 40, 2010.00, 23),
(30, '8G RAM - 128G ROM', 50, 1100.00, 24),
(31, '8G RAM - 256G ROM', 60, 1200.00, 24),
(32, '8G RAM - 512G ROM', 70, 1400.00, 24),
(39, '8G RAM - 128G ROM', 17, 650.00, 19),
(40, '8G RAM - 256G ROM', 39, 766.00, 19),
(41, '8G RAM - 512G ROM', 0, 910.00, 19),
(42, '8G RAM - 128G SSD', 50, 1600.00, 25),
(43, '16G RAM - 256G SSD', 100, 1700.00, 25),
(44, '16G RAM - 512G SSD', 100, 1900.00, 25);

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
  ADD KEY `fk_order_to_user` (`user_id`),
  ADD KEY `fk_shipping_type` (`shipping_type_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `fk_order_detail_to_order` (`order_id`),
  ADD KEY `fk_product_id` (`product_id`),
  ADD KEY `fk_variant` (`variant_id`);

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
-- Indexes for table `shipping_types`
--
ALTER TABLE `shipping_types`
  ADD PRIMARY KEY (`shipping_type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_roleid_userid` (`role_id`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`variant_id`),
  ADD KEY `fk_product_to_variant` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billboard`
--
ALTER TABLE `billboard`
  MODIFY `billboard_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_types`
--
ALTER TABLE `shipping_types`
  MODIFY `shipping_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `variant_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
  ADD CONSTRAINT `fk_order_to_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk_shipping_type` FOREIGN KEY (`shipping_type_id`) REFERENCES `shipping_types` (`shipping_type_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_detail_to_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `fk_variant` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`variant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `variants`
--
ALTER TABLE `variants`
  ADD CONSTRAINT `fk_product_to_variant` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
