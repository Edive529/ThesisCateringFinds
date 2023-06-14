-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 03:36 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jackskainan`
--

-- --------------------------------------------------------

--
-- Table structure for table `item_rating`
--

CREATE TABLE `item_rating` (
  `ratingId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `ratingNumber` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `customerid` varchar(20) NOT NULL,
  `restaurant` varchar(100) NOT NULL,
  `foodid` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `qty` varchar(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `customerid`, `restaurant`, `foodid`, `price`, `qty`) VALUES
(4, '3', '0', '3', '212', '1'),
(6, '19', '0', '3', '212', '1'),
(7, 'aq2DSEwsYarVnGXj7RZi', '0', '3', '212', '3'),
(8, 'uLgddsqRM7MX2noH23EN', '0', '1', '58', '1'),
(9, '19', '0', '2', '23123', '1'),
(10, '2', '0', '3', '212', '1'),
(11, 'uLgddsqRM7MX2noH23EN', '0', '3', '212', '1'),
(12, 'uLgddsqRM7MX2noH23EN', '0', '2', '23123', '1'),
(13, '25', '0', '3', '212', '1'),
(147, '1', 'Pumice Food and Catering Services', '5', '123', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catid` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catid`, `category`) VALUES
(1, 'Dessert'),
(2, 'Main Dish'),
(3, 'Appetizer'),
(4, 'Soup'),
(5, 'Salad'),
(6, 'Pasta'),
(7, 'Package');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catering_order_details`
--

CREATE TABLE `tbl_catering_order_details` (
  `catering_id` int(11) NOT NULL,
  `order_list` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `phonenum` varchar(10) NOT NULL,
  `restaurant` varchar(255) NOT NULL,
  `event_address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Not yet approved',
  `catering_style` varchar(255) NOT NULL,
  `payment_status` varchar(12) NOT NULL,
  `date_of_reservation` datetime NOT NULL DEFAULT current_timestamp(),
  `date_to_be_delivered` date NOT NULL,
  `time_to_be_delivered` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_catering_order_details`
--

INSERT INTO `tbl_catering_order_details` (`catering_id`, `order_list`, `payment_type`, `userid`, `user`, `useremail`, `phonenum`, `restaurant`, `event_address`, `status`, `catering_style`, `payment_status`, `date_of_reservation`, `date_to_be_delivered`, `time_to_be_delivered`) VALUES
(82, ' lechon baboy: ₱123x1= ₱123,\r\nteriyaki: ₱2777x1= ₱2777,\r\nbulalo: ₱2999x1= ₱2999,\r\nWedding: ₱6000x1= ₱6000,\r\nB-day: ₱6000x1= ₱6000,\r\n Total = ₱17899', 'GCASH', '1', 'test', 'test@gmail.com', '0997605585', 'dave`s restaurant', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'canceled', '', '', '2023-06-11 22:59:51', '2023-06-04', '14:59:00'),
(83, ' lechon baboy: ₱123x1= ₱123,teriyaki: ₱2777x1= ₱2777,fruit salad: ₱699x1= ₱699,Total = ₱3599', 'GCASH', '1', 'test', 'test@gmail.com', '0997605585', 'dave`s restaurant', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'canceled', '', '', '2023-06-12 02:48:43', '2023-06-14', '05:48:00'),
(84, ' lechon baboy: ₱123x1= ₱123,Total = ₱123', 'GCASH', '1', 'test', 'test@gmail.com', '0997605585', 'dave`s restaurant', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'not approved', '', '', '2023-06-12 02:54:43', '2023-05-29', '08:54:00'),
(85, ' lechon baboy: ₱123x1= ₱123,lechon baboy: ₱2323x1= ₱2323,Total = ₱2446', 'GCASH', '1', 'test', 'test@gmail.com', '0997605585', 'dave`s restaurant', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'Not yet approved', '', '', '2023-06-14 08:54:23', '2023-06-15', '08:56:00'),
(86, ' lechon baboy: ₱123x1= ₱123,lechon baboy: ₱2323x1= ₱2323,lechon baboy: ₱1221x1= ₱1221,bulalo: ₱2999x1= ₱2999,Wedding: ₱6000x1= ₱6000,Total = ₱12666', 'GCASH', '1', 'test', 'test@gmail.com', '0997605585', 'dave`s restaurant', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'Not yet approved', '', '', '2023-06-14 08:57:03', '2023-06-16', '08:59:00'),
(87, ' lechon baboy: ₱123x1= ₱123,Total = ₱123', 'GCASH', '1', 'test', 'test@gmail.com', '0997605585', 'dave`s restaurant', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'Not yet approved', '', '', '2023-06-14 09:06:15', '2023-06-13', '09:09:00');

--
-- Triggers `tbl_catering_order_details`
--
DELIMITER $$
CREATE TRIGGER `UpdateOrderLogs` AFTER UPDATE ON `tbl_catering_order_details` FOR EACH ROW INSERT INTO tbl_order_logs VALUES(null, NEW.catering_id, NEW.restaurant, NEW.user, NEW.status, 'Updated', NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `orderlogs` AFTER INSERT ON `tbl_catering_order_details` FOR EACH ROW INSERT INTO tbl_order_logs VALUES(null, NEW.catering_id, NEW.restaurant, NEW.user, NEW.status, 'Updated', NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customerid` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phonenum` varchar(11) NOT NULL,
  `event_address` varchar(255) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `role` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customerid`, `password`, `useremail`, `username`, `phonenum`, `event_address`, `payment_type`, `role`) VALUES
(1, '$2y$10$mOV3j4STRCB7NslGaKw7XuFID6.OYdnct9Es109tGlTC7D4QaZhzu', 'test@gmail.com', 'test', '09976055855', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'GCASH', 'customer'),
(2, '$2y$10$QEtd3Qlw8KcT2c5keSrP/u0L/14UPQRg4gRAf80uuZivQPDd44DWu', 'test1@gmail.com', 'test1', '09976055855', '', 'cash on delivery', 'customer'),
(3, '$2y$10$gK2Ukzs/yNSiMWegjeoSgu1SVcq8/nmp1v0nTZ3fR8ClL/snCTV5q', 'test2@gmail.com', 'test2', '99976055855', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'cash on delivery', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_foodmenu`
--

CREATE TABLE `tbl_foodmenu` (
  `foodid` int(11) NOT NULL,
  `food` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `restaurant` varchar(100) NOT NULL,
  `category` varchar(255) NOT NULL,
  `saleprice` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `package_description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_foodmenu`
--

INSERT INTO `tbl_foodmenu` (`foodid`, `food`, `userid`, `restaurant`, `category`, `saleprice`, `description`, `package_description`, `image`) VALUES
(1, 'leche flan', 31, '23232', 'dessert', 58, '232', '', '641fd1e91f66c.png'),
(2, 'uhmm', 31, '23232', 'dessert', 23123, '123123', '', '642fc7e36d18e.png'),
(3, 'Fried Chicken', 31, '23232', 'Main Dish', 212, 'ChickenJoy', '', '6481b029b3f3e.png'),
(4, 'fried baboy', 1, 'Dano', 'Main Dish', 2000, 'krispy kaau', '', '648555221be74.png'),
(5, 'lechon baboy', 33, 'dave`s restaurant', 'Main Dish', 123, 'Krispy kaau', '', '64856a1024cd3.jpg'),
(6, 'sundae', 33, 'dave`s restaurant', 'Dessert', 2323, '2323', '', '6485d30bc068f.png'),
(7, 'spaghetti', 33, 'dave`s restaurant', 'Pasta', 220, '2323', '', '6485d31e13c09.jpg'),
(8, 'fruit salad', 33, 'dave`s restaurant', 'Salad', 699, 'good for everyone', '', '6485d3348e63d.jpg'),
(9, 'bulalo', 33, 'dave`s restaurant', 'Soup', 2999, 'sdasd', '', '6485d34bc8503.jpg'),
(10, 'teriyaki', 33, 'dave`s restaurant', 'Appetizer', 2777, 'sadsd', '', '6485d37c0f4d0.jpg'),
(12, 'Wedding', 33, 'dave`s restaurant', 'Package', 6000, 'teriyaki,leche,Fried,fried,spaghetti,fruit,bulalo,', 'sadasd', '6485d882f21ac.png'),
(13, 'B-day', 33, 'dave`s restaurant', 'Package', 6000, 'teriyaki, leche, uhmm, Fried, fried, spaghetti, fruit, bulalo', 'www', '6485dc9498a19.png'),
(14, 'lechon baboy', 33, 'dave`s restaurant', 'Main Dish', 2323, '232', '', '648689d60ce54.png'),
(15, 'lechon baboy', 33, 'dave`s restaurant', 'Main Dish', 1221, '2123', '', '648689f76a2d5.jpg'),
(16, 'lechon baboy323', 33, 'dave`s restaurant', 'Main Dish', 213213, '2132', '', '64868a0ac4bb0.jpg'),
(17, 'lechon baboy323313', 33, 'dave`s restaurant', 'Main Dish', 2131320, '2213132321', '', '64868a1a90fb2.jpg'),
(18, 'lkl', 33, 'dave`s restaurant', 'Main Dish', 3513540, '213\r\n3113', '', '64868a2930603.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `restaurant` varchar(100) NOT NULL,
  `email` varchar(199) NOT NULL,
  `foodid` int(11) NOT NULL,
  `price` varchar(10) NOT NULL,
  `qty` varchar(2) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `user_id`, `name`, `restaurant`, `email`, `foodid`, `price`, `qty`, `date`) VALUES
(1, 1, 'test', '', 'test@gmail.com', 5, '123', '1', '0000-00-00 00:00:00'),
(2, 1, 'test', '', 'test@gmail.com', 14, '2323', '1', '0000-00-00 00:00:00'),
(3, 1, 'test', '', 'test@gmail.com', 15, '1221', '1', '0000-00-00 00:00:00'),
(4, 1, 'test', '', 'test@gmail.com', 5, '123', '1', '0000-00-00 00:00:00'),
(5, 1, 'test', '', 'test@gmail.com', 14, '2323', '1', '0000-00-00 00:00:00'),
(6, 1, 'test', '', 'test@gmail.com', 15, '1221', '1', '0000-00-00 00:00:00'),
(7, 1, 'test', '', 'test@gmail.com', 5, '123', '1', '0000-00-00 00:00:00'),
(8, 1, 'test', '', 'test@gmail.com', 14, '2323', '1', '0000-00-00 00:00:00'),
(9, 1, 'test', '', 'test@gmail.com', 15, '1221', '1', '0000-00-00 00:00:00'),
(10, 1, 'test', '', 'test@gmail.com', 5, '123', '1', '0000-00-00 00:00:00'),
(11, 1, 'test', '', 'test@gmail.com', 14, '2323', '1', '0000-00-00 00:00:00'),
(12, 1, 'test', '', 'test@gmail.com', 5, '123', '1', '0000-00-00 00:00:00'),
(13, 1, 'test', '', 'test@gmail.com', 14, '2323', '1', '0000-00-00 00:00:00'),
(14, 1, 'test', '', 'test@gmail.com', 5, '123', '1', '0000-00-00 00:00:00'),
(15, 1, 'test', '', 'test@gmail.com', 14, '2323', '1', '0000-00-00 00:00:00'),
(16, 1, 'test', '', 'test@gmail.com', 5, '123', '1', '0000-00-00 00:00:00'),
(17, 1, 'test', '', 'test@gmail.com', 14, '2323', '1', '0000-00-00 00:00:00'),
(18, 1, 'test', '', 'test@gmail.com', 5, '123', '1', '2023-06-14 08:57:03'),
(19, 1, 'test', '', 'test@gmail.com', 14, '2323', '1', '2023-06-14 08:57:03'),
(20, 1, 'test', '', 'test@gmail.com', 15, '1221', '1', '2023-06-14 08:57:03'),
(21, 1, 'test', '', 'test@gmail.com', 9, '2999', '1', '2023-06-14 08:57:03'),
(22, 1, 'test', '', 'test@gmail.com', 12, '6000', '1', '2023-06-14 08:57:03'),
(23, 1, 'test', 'dave`s restaurant', 'test@gmail.com', 5, '123', '1', '2023-06-14 09:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_logs`
--

CREATE TABLE `tbl_order_logs` (
  `id` int(11) NOT NULL,
  `catering_id` int(11) NOT NULL,
  `restaurant` varchar(100) NOT NULL,
  `user` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `action` varchar(20) NOT NULL,
  `cdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_logs`
--

INSERT INTO `tbl_order_logs` (`id`, `catering_id`, `restaurant`, `user`, `status`, `action`, `cdate`) VALUES
(1, 84, 'dave`s restaurant', 'test', 'not approved', 'Updated', '2023-06-13 14:19:44'),
(2, 85, 'dave`s restaurant', 'test', 'Not yet approved', 'Updated', '2023-06-14 08:54:23'),
(3, 86, 'dave`s restaurant', 'test', 'Not yet approved', 'Updated', '2023-06-14 08:57:03'),
(4, 87, 'dave`s restaurant', 'test', 'Not yet approved', 'Updated', '2023-06-14 09:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phonenum` varchar(11) NOT NULL,
  `role` varchar(12) NOT NULL DEFAULT 'Seller',
  `restaurant` varchar(40) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'not approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `password`, `useremail`, `username`, `phonenum`, `role`, `restaurant`, `address`, `image`, `banner`, `latitude`, `longitude`, `status`) VALUES
(1, '$2y$10$7lvTpsP1o2L3iK1jTHbRZuRUyNzZ0cD.cpTIN9QdHyA/U9YnCnLji', 'test@gmail.com', 'test', '', 'Admin', 'jacks', 'san roque Iligan City', '', '', 0, 0, 'approved'),
(3, '$2y$10$jXAvtn62cs/b1Ev1aqql7.K1U2nOvWmWaLDM7q7LTq7U/lIkYPsfK', 'admin@gmail.com', 'Admin', '', 'Admin', 'jackies', 'san roque Iligan City', '', '', 0, 0, 'approved'),
(7, '$2y$10$UD03HZ/NrnvOXMckPSdM5OvY0ERsaCVZa0T34t9pvRP.blnpe2wgG', 'kyle@gmail.com', 'kyleee', '', 'Seller', 'jacks', 'san roque Iligan City', '643e57e165551.png', '', 544321, 234562, 'not approved'),
(8, '$2y$10$M1PmoIXNBcT1tajwz6x73OFIvWXQ.PHJZN.3Q.u7LnteQgPUCgubu', 'kyle@gmail.com', 'kyleee', '', 'Seller', 'jacks', 'san roque Iligan City', '643e5818f0f92.png', '', 544321, 234562, 'not approved'),
(9, '$2y$10$d41fbSJzLr46KB75b4.D8Osc0fjIrfhUCBV7R9G4y/HUjScI8rb16', 'kyle@gmail.com', 'kyleee', '', 'Seller', 'jacks', 'san roque Iligan City', '643e583121120.png', '', 544321, 234562, 'Not approved'),
(10, '$2y$10$tgN4qIWoir7NM51YQKugdOfG06d8MBarp1mB3/JLy80nDqByMb8j2', 'dano@gmail.com', 'kyleee', '', 'Seller', 'danobeats', 'sadasdsa', '643e598a69737.png', '', 3265550, 5497510, 'not approved'),
(11, '$2y$10$L1vFs8SB03ASMMmbNv3TOejVuJx/.zt9QxzWorq1jlxneEPNMjNdm', 'kyle@gmail.com', 'kyleee', '', 'Seller', 'jacks', 'san roque Iligan City', '643e5a58015de.png', '', 544321, 5497510, 'not approved'),
(31, '$2y$10$lIqvjAtgvTL9ekKTB5396.K6xoZCwT/T4rBmBcBbJer5L/yl20IH2', 'kylevillz6@gmail.com', 'tette', '', 'Seller', '23232', '123213', '6483fd756c2c1.png', '', 8.23195, 124.32, 'approved'),
(32, '$2y$10$GWQCvY1qK7LhpRQBgkZONu4Ldud5mRmAalrsrNdBrfpTVDDURQLPu', 'dano12331232@gmail.com', 'dano', '', 'Seller', 'dano`s restaurant', 'brgy dano', '64846a1fc5c71.png', '', 8.24195, 124.32, 'approved'),
(33, '$2y$10$0UsIrMFlFM29HtyymqUCWe.5uU7muUjm584HCWgOVGOHcY6OTaXKq', 'dave@gmail.com', 'Dave', '09976055855', 'Seller', 'Pumice Food and Catering Services', 'Second Floor, Trophix Building, Gregorio LLUCH ST., PALA-O ILIGAN CITY', '64855baf2fbf0.jpg', '6487f32657f44.jpg', 8.23195, 124.32, 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item_rating`
--
ALTER TABLE `item_rating`
  ADD PRIMARY KEY (`ratingId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `tbl_catering_order_details`
--
ALTER TABLE `tbl_catering_order_details`
  ADD PRIMARY KEY (`catering_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `tbl_foodmenu`
--
ALTER TABLE `tbl_foodmenu`
  ADD PRIMARY KEY (`foodid`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_logs`
--
ALTER TABLE `tbl_order_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_rating`
--
ALTER TABLE `item_rating`
  MODIFY `ratingId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_catering_order_details`
--
ALTER TABLE `tbl_catering_order_details`
  MODIFY `catering_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_foodmenu`
--
ALTER TABLE `tbl_foodmenu`
  MODIFY `foodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_order_logs`
--
ALTER TABLE `tbl_order_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
