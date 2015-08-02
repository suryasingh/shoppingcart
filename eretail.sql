-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 03, 2015 at 12:04 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `eretail`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(10, 'Laptop'),
(9, 'Shoes'),
(8, 'Clothes'),
(7, 'Watches'),
(6, 'Mobile'),
(11, 'fgfg'),
(12, 'dhdhdh'),
(13, 'aahahahah');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(60) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `phone`, `address`, `product_id`, `quantity`) VALUES
(41, 's', '+91 98-45-757278', 'Vaishali Enclave, Sector 9, Indira Nagar', 17, 1),
(40, 's', '+91 98-45-757278', 'Vaishali Enclave, Sector 9, Indira Nagar', 14, 2),
(39, 's', '+91 98-45-757278', 'Vaishali Enclave, Sector 9, Indira Nagar', 8, 13),
(38, 's', '+91 98-45-757278', 'Vaishali Enclave, Sector 9, Indira Nagar', 7, 17),
(37, 's', '+91 98-45-757278', 'Vaishali Enclave, Sector 9, Indira Nagar', 6, 50),
(36, 'surya', '464664', 'ssss', 7, 1),
(35, 'surya', '464664', 'ssss', 6, 1),
(34, 'du', '2222', 'ddd', 16, 1),
(33, 'surya', '73737', 'dhhdhdh', 11, 1),
(32, 'surya', '73737', 'dhhdhdh', 8, 1),
(31, 'shshshs', '3626262', 'sgsgsgsgs', 7, 1),
(30, 'shshshs', '3626262', 'sgsgsgsgs', 8, 4),
(42, 's', '+91 98-45-757278', 'Vaishali Enclave, Sector 9, Indira Nagar', 23, 1),
(43, 's', '+91 98-45-757278', 'Vaishali Enclave, Sector 9, Indira Nagar', 21, 1),
(44, 's', '+91 98-45-757278', 'Vaishali Enclave, Sector 9, Indira Nagar', 9, 1),
(45, 's', '+91 98-45-757278', 'Vaishali Enclave, Sector 9, Indira Nagar', 11, 20),
(46, 's', '+91 98-45-757278', 'Vaishali Enclave, Sector 9, Indira Nagar', 10, 1),
(47, 'Surya Singh', '+919845757278', 'Vaishali Enclave', 8, 1),
(48, 'Surya Singh', '+919845757278', 'Vaishali Enclave', 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `filename` varchar(150) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `quantity`, `category_id`, `filename`) VALUES
(6, 'Apple', 5000, '13.3-inch (diagonal) high-resolution LED-backlit glossy widescreen display 3rd Gen Intel Core i5 pro', 30, 10, 'uploads/apple-macbook-air-notebook-400x400-imadwdzswggdyva6.jpeg'),
(7, 'Dell 1', 3444, '13.3-inch (diagonal) high-resolution LED-backlit glossy widescreen display 3rd Gen Intel Core i5 pro', 32, 10, 'uploads/dell-inspiron-notebook-400x400-imadwescm4yqy7qv.jpeg'),
(8, 'dell 2', 5677, '13.3-inch (diagonal) high-resolution LED-backlit glossy widescreen display 3rd Gen Intel Core i5 pro', 33, 10, 'uploads/dell-v3540-notebook-400x400-imaey2xqbzgzghvz.jpeg'),
(9, 'Hp Note', 4566, '13.3-inch (diagonal) high-resolution LED-backlit glossy widescreen display 3rd Gen Intel Core i5 pro', 444, 10, 'uploads/hp-notebook-15-r022tx-400x400-imadxsz9fgkskzma.jpeg'),
(10, 'Hp Note 2', 222, '13.3-inch (diagonal) high-resolution LED-backlit glossy widescreen display 3rd Gen Intel Core i5 pro', 444, 10, 'uploads/hp-notebook-15-s003tu-400x400-imaeyf6e5cgmhn9r.jpeg'),
(11, 'Cloth 1', 345, '100% cotton\r\nMachine wash cold', 22, 8, 'uploads/14a4l23r2118i901-united-colors-of-benetton-32-400x400-imaeyfyzre6yzpq2.jpeg'),
(12, 'Cloth 2', 322, '100% cotton\r\nMachine wash cold', 345, 8, 'uploads/14auk11916-77442-aurelia-s-400x400-imaefxxfy9eudwy5.jpeg'),
(13, 'Cloth 3', 324, '100% cotton\r\nMachine wash cold', 23, 8, 'uploads/83278102white-black-puma-m-400x400-imadyqcgc7wux3uh.jpeg'),
(14, 'Cloth 4', 325, '100% cotton\r\nMachine wash cold', 22, 8, 'uploads/s145dnm03a01-zovi-30-400x400-imadx5buvtgntpwy.jpeg'),
(15, 'Cloth 5', 567, '100% cotton\r\nMachine wash cold', 33, 8, 'uploads/wrjn1166blue-wrangler-32-400x400-imadkmmrsea2xkan.jpeg'),
(16, 'Shoe 1', 222, 'Material: Fabric\r\nLifestyle: Casual', 22, 9, 'uploads/ntnavy-syello-hellion-m-adidas-8-400x400-imadzmksnmnzxmad.jpeg'),
(17, 'Shoe 2', 345, 'Material: Fabric\r\nLifestyle: Casual', 56, 9, 'uploads/soblme-triblu-runwht-marathon-tr-10-m-adidas-9-400x400-imadtzddmjjpayhn.jpeg'),
(18, 'Shoe 3', 655, 'Material: Fabric\r\nLifestyle: Casual', 66, 9, 'uploads/urbsky-metsil-vivyel-impulse-1-m-adidas-9-400x400-imadwaqrwp7bysuz.jpeg'),
(19, 'Watch 1', 3456, 'Material: Fabric\r\nLifestyle: Casual', 22, 7, 'uploads/bs062-casio-400x400-imadduy8hv6mj7kc.jpeg'),
(20, 'Watch 2', 2222, 'Material: Fabric\r\nLifestyle: Casual', 45, 7, 'uploads/bs124-casio-400x400-imadzhhebghtdpku.jpeg'),
(21, 'Watch 3', 4444, 'Material: Fabric\r\nLifestyle: Casual', 3333, 7, 'uploads/ex167-casio-400x400-imaeym2f3g9yuhhc.jpeg'),
(22, 'Mobile 1', 2340, 'gf shhhshs shshhs', 34, 6, 'uploads/apple-iphone-5s-400x400-imadpppc9k3gzdjz.jpeg'),
(23, 'dhdhd', 4646, 'djdjdjdj', 45, 12, 'uploads/24012010080.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `admin` tinyint(4) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `email`, `password`, `address`, `city`, `state`, `country`, `admin`) VALUES
(1, 'admin', '9928066073', 'admin@gmail.com', 'admin', 'vaishali', 'lucknow', 'u.p', 'india', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;