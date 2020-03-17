-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2020 at 02:13 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlibanhang_offical`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `real_name` varchar(100) NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `privilege` int(1) NOT NULL,
  `avatar` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `first_name`, `last_name`, `real_name`, `password`, `email`, `privilege`, `avatar`) VALUES
(23, 'admin', 'Dung', 'Nguyen', 'Nguyen Dung', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'nguyendung261294@gmail.com', 2, 'profile-pic.jpg'),
(25, 'user', 'Hieu', 'Nguyen', 'Nguyen Trung Hieu', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dung1111061@gmail.com', 1, ''),
(27, 'user_testing', 'Hau', 'Nguyen', 'Nguyen Trung Hau', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'nguyendung261295@gmail.com', 0, ''),
(28, 'admin_testing', '', '', 'Nguyen Cuong', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'nguyendung261296@gmail.com', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent_id` int(5) DEFAULT NULL COMMENT 'indicator category inside parent category '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`) VALUES
(1, 'Laptop', 8),
(2, 'Điện Thoại', NULL),
(3, 'Máy Ảnh', 12),
(4, 'Phụ Kiện', NULL),
(6, 'Máy Quay Phim', 12),
(7, 'PC', 8),
(8, 'Máy Tính', NULL),
(9, 'Tablet', 2),
(10, 'SmartPhone', 2),
(12, 'Máy Ảnh - Máy Quay Phim', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `bodymsg` varchar(500) NOT NULL,
  `user` varchar(20) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`id`, `bodymsg`, `user`, `time`) VALUES
(72, 'new comment', 'admin', '2020-01-09 21:32:03'),
(77, '@Hieu add 10 new product to database', 'admin', '2020-01-10 16:21:36'),
(78, '@Cuong develope manufacture manegement page', 'admin', '2020-01-10 16:22:40'),
(79, 'pro', 'admin', '2020-01-10 17:01:12'),
(80, '@Dung Done', 'user', '2020-01-10 17:02:06'),
(81, 'test enter event', 'admin', '2020-01-10 19:10:09'),
(82, 'test enter event 2', 'admin', '2020-01-10 19:12:09'),
(83, 'test enter event 2', 'admin', '2020-01-10 19:13:44'),
(84, 'again', 'admin', '2020-01-10 19:17:56'),
(85, 'sdf', 'admin', '2020-01-10 19:18:04'),
(86, 'again', 'admin', '2020-01-10 19:18:56'),
(87, 'again', 'admin', '2020-01-10 19:19:01'),
(88, 'afs', 'admin', '2020-01-10 19:23:25'),
(89, 'sdf', 'admin', '2020-01-10 19:23:33'),
(90, 'tester', 'admin', '2020-01-10 19:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `code` varchar(3) NOT NULL,
  `symbol` varchar(12) NOT NULL,
  `decimal_place` char(1) NOT NULL,
  `value` double(15,8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(96) NOT NULL,
  `telephone` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cart` text NOT NULL,
  `wishlist` text NOT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `firstname`, `lastname`, `email`, `telephone`, `password`, `cart`, `wishlist`, `newsletter`, `date_added`) VALUES
(1, 'Nguyen ', 'Dung', 'dung1111061@gmail.com', '', '', '', '', 0, '0000-00-00 00:00:00'),
(2, 'test time stamp', '', '', '', '', '', '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE `description` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `description` varchar(255) NOT NULL DEFAULT 'Not description yet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`id`, `language_id`, `description`) VALUES
(0, 1, ''),
(0, 2, 'Not description yet'),
(1, 1, 'Smart Phong dong trung'),
(1, 2, 'Not description yet'),
(2, 1, 'Laptop tam trung');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `code` varchar(5) NOT NULL,
  `image` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0: not support yet, 1: available to use'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `name`, `code`, `image`, `status`) VALUES
(1, 'vietnamese', '', '', 1),
(2, 'english', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `manufacturer_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`manufacturer_id`, `name`, `image`) VALUES
(1, 'Apple', '1580900153_apple_logo-100x100.jpg'),
(3, 'Dell', '1578740103_dell-logo.jpg'),
(5, 'Sony', '1578740185_sony_logo-100x100.jpg'),
(7, 'HP', '1580900185_HP-100x100.png'),
(8, 'canon', '1580900213_canon_logo-100x100.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `payment_firstname` varchar(32) NOT NULL,
  `payment_lastname` varchar(32) NOT NULL,
  `payment_company` varchar(60) NOT NULL,
  `payment_address_1` varchar(128) NOT NULL,
  `payment_address_2` varchar(128) NOT NULL,
  `payment_city` varchar(128) NOT NULL,
  `payment_postcode` varchar(10) NOT NULL,
  `payment_country` varchar(128) NOT NULL,
  `payment_method` varchar(128) NOT NULL,
  `shipping_firstname` varchar(32) NOT NULL,
  `shipping_lastname` varchar(32) NOT NULL,
  `shipping_company` varchar(60) NOT NULL,
  `shipping_address_1` varchar(128) NOT NULL,
  `shipping_address_2` varchar(128) NOT NULL,
  `shipping_city` varchar(128) NOT NULL,
  `shipping_postcode` varchar(10) NOT NULL,
  `shipping_country` varchar(128) NOT NULL,
  `shipping_method` varchar(128) NOT NULL,
  `comment` text NOT NULL,
  `total` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `order_status_id` int(11) NOT NULL DEFAULT '0',
  `language_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `order_status_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `privilege` int(1) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`privilege`, `description`) VALUES
(0, 'No Active'),
(1, 'demonstrator'),
(2, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(3) DEFAULT NULL,
  `description_id` int(11) NOT NULL DEFAULT '0',
  `description` varchar(500) DEFAULT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `product_name` varchar(255) NOT NULL,
  `model` varchar(64) NOT NULL,
  `quantity` int(4) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `shipping` tinyint(1) NOT NULL DEFAULT '1',
  `price` decimal(6,3) DEFAULT NULL COMMENT 'ex: 500,5 mean 500 500 VND, maximum 999 000 000 VND',
  `date_available` date DEFAULT NULL,
  `weight` decimal(15,8) DEFAULT NULL,
  `length` decimal(15,8) DEFAULT NULL,
  `width` decimal(15,8) DEFAULT NULL,
  `height` decimal(15,8) NOT NULL DEFAULT '0.00000000',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `viewed` int(5) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `new_flag` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 new product',
  `top_selling_flag` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 top selling product',
  `percentage_discount` int(3) NOT NULL DEFAULT '0' COMMENT '10 = discount 10%',
  `rank` int(1) DEFAULT NULL COMMENT 'rank product 1 -> 5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `description_id`, `description`, `language_id`, `product_name`, `model`, `quantity`, `image`, `manufacturer_id`, `shipping`, `price`, `date_available`, `weight`, `length`, `width`, `height`, `status`, `viewed`, `created_at`, `updated_at`, `new_flag`, `top_selling_flag`, `percentage_discount`, `rank`) VALUES
(40, 2, 0, '<p>pseudo description</p>\r\n', 1, 'Iphone 11 Promax 64GB', '', 0, '1578998053_default_smartphone.png', 1, 1, '999.999', '0000-00-00', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 0, 0, '2020-03-18 00:00:00', '0000-00-00 00:00:00', 1, 1, 10, 0),
(50, 4, 0, '', 1, 'head phone 1', '', 0, '1580902633_default_laptop_5.png', 1, 1, '100.000', '0000-00-00', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 5, 0),
(52, 3, 0, '', 1, 'canon 1', '', 0, '1580902652_default_product_3.png', NULL, 1, '0.000', '0000-00-00', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 0),
(58, NULL, 0, '<p>pseudo description</p>\r\n', 1, 'hot product', '', 0, '1580902665_1578992919_default_laptop.png', NULL, 1, '0.000', '0000-00-00', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 0),
(66, 1, 0, '<p>pseudo description</p>\r\n', 1, 'laptop 2', '', 0, '1578993008_default_laptop_2.png', NULL, 1, '500.000', '0000-00-00', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, 0),
(67, 1, 0, '<p>pseudo description</p>\r\n', 1, 'laptop 3', '', 0, '1578993156_default_product_3.png', NULL, 1, '0.000', '0000-00-00', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 0),
(68, 1, 0, '<p>pseudo description</p>\r\n', 1, 'laptop 4', '', 0, '1578993178_default_product_4.png', NULL, 1, NULL, '0000-00-00', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 0),
(70, 2, 0, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 1, 'Product Details Sample', 'Sample', 0, '1581585055_default_smartphone.png', 1, 1, '999.999', '2020-01-28', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 10, 0),
(101, NULL, 0, '<p>pseudo description</p>\r\n', 1, 'dell vostro', '', 0, NULL, NULL, 1, '0.000', '0000-00-00', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, 0),
(143, NULL, 0, '<p>pseudo description</p>\r\n', 1, 'testImage', '', NULL, '1583154303_ErrorNavicat.PNG', NULL, 1, '0.000', '0000-00-00', NULL, NULL, NULL, '0.00000000', 0, 0, '2020-03-02 20:05:03', '0000-00-00 00:00:00', 1, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `related_product`
--

CREATE TABLE `related_product` (
  `product_id` int(11) NOT NULL,
  `related_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `related_product`
--

INSERT INTO `related_product` (`product_id`, `related_id`) VALUES
(40, 66),
(40, 67),
(50, 52),
(50, 58),
(70, 50),
(70, 52);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `rating` int(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `product_id`, `name`, `email`, `description`, `rating`, `status`, `date_added`) VALUES
(3, 52, 'rejected', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', NULL, 0, '2020-02-04 00:00:00'),
(8, 52, 'pending', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', NULL, 1, '2020-02-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `assigned_admin_id` int(5) NOT NULL,
  `text` varchar(200) NOT NULL,
  `status_id` int(1) NOT NULL,
  `created_admin_id` int(5) NOT NULL,
  `title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_status`
--

CREATE TABLE `ticket_status` (
  `id` int(1) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_status`
--

INSERT INTO `ticket_status` (`id`, `name`) VALUES
(1, 'OPEN'),
(2, 'IN PROGRESS'),
(3, 'RESOLVED'),
(4, 'REOPENED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `privilege` (`privilege`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`id`,`language_id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `order_status_id` (`order_status_id`),
  ADD KEY `currency_id` (`currency_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`order_status_id`,`language_id`);

--
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`privilege`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `fk_manufacture` (`manufacturer_id`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `description_id` (`description_id`),
  ADD KEY `product_ibfk_3` (`category_id`);

--
-- Indexes for table `related_product`
--
ALTER TABLE `related_product`
  ADD UNIQUE KEY `unique_index` (`product_id`,`related_id`),
  ADD KEY `related_product_ibfk_2` (`related_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `assigned_admin_id` (`assigned_admin_id`),
  ADD KEY `created_admin_id` (`created_admin_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `ticket_status`
--
ALTER TABLE `ticket_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `description`
--
ALTER TABLE `description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `order_status_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`privilege`) REFERENCES `privilege` (`privilege`) ON UPDATE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `conversation_ibfk_1` FOREIGN KEY (`user`) REFERENCES `admin` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `description`
--
ALTER TABLE `description`
  ADD CONSTRAINT `description_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`) ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`order_status_id`) REFERENCES `order_status` (`order_status_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`currency_id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_manufacture` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`manufacturer_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`description_id`) REFERENCES `description` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `related_product`
--
ALTER TABLE `related_product`
  ADD CONSTRAINT `related_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `related_product_ibfk_2` FOREIGN KEY (`related_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`assigned_admin_id`) REFERENCES `admin` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`created_admin_id`) REFERENCES `admin` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `ticket_status` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
