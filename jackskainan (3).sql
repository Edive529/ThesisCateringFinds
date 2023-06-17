-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 11:07 AM
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
  `grand_total` float NOT NULL,
  `phonenum` varchar(10) NOT NULL,
  `restaurant` varchar(255) NOT NULL,
  `event_address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Not yet approved',
  `catering_style` varchar(255) NOT NULL,
  `date_of_reservation` datetime NOT NULL DEFAULT current_timestamp(),
  `date_to_be_delivered` date NOT NULL,
  `time_to_be_delivered` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_catering_order_details`
--

INSERT INTO `tbl_catering_order_details` (`catering_id`, `order_list`, `payment_type`, `userid`, `user`, `useremail`, `grand_total`, `phonenum`, `restaurant`, `event_address`, `status`, `catering_style`, `date_of_reservation`, `date_to_be_delivered`, `time_to_be_delivered`) VALUES
(82, ' lechon baboy: ₱123x1= ₱123,\r\nteriyaki: ₱2777x1= ₱2777,\r\nbulalo: ₱2999x1= ₱2999,\r\nWedding: ₱6000x1= ₱6000,\r\nB-day: ₱6000x1= ₱6000,\r\n Total = ₱17899', 'GCASH', '1', 'test', 'test@gmail.com', 17899, '0997605585', 'dave`s restaurant', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'canceled', '', '2023-06-11 22:59:51', '2023-06-04', '14:59:00'),
(83, ' lechon baboy: ₱123x1= ₱123,teriyaki: ₱2777x1= ₱2777,fruit salad: ₱699x1= ₱699,Total = ₱3599', 'GCASH', '1', 'test', 'test@gmail.com', 3599, '0997605585', 'dave`s restaurant', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'canceled', '', '2023-06-12 02:48:43', '2023-06-14', '05:48:00'),
(84, ' lechon baboy: ₱123x1= ₱123,Total = ₱123', 'GCASH', '1', 'test', 'test@gmail.com', 123, '0997605585', 'dave`s restaurant', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'not approved', '', '2023-06-12 02:54:43', '2023-05-29', '08:54:00'),
(85, ' lechon baboy: ₱123x1= ₱123,lechon baboy: ₱2323x1= ₱2323,Total = ₱2446', 'GCASH', '1', 'test', 'test@gmail.com', 2446, '0997605585', 'dave`s restaurant', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'Not yet approved', '', '2023-06-14 08:54:23', '2023-06-15', '08:56:00'),
(86, ' lechon baboy: ₱123x1= ₱123,lechon baboy: ₱2323x1= ₱2323,lechon baboy: ₱1221x1= ₱1221,bulalo: ₱2999x1= ₱2999,Wedding: ₱6000x1= ₱6000,Total = ₱12666', 'GCASH', '1', 'test', 'test@gmail.com', 12666, '0997605585', 'dave`s restaurant', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'Not yet approved', '', '2023-06-14 08:57:03', '2023-06-16', '08:59:00'),
(87, ' lechon baboy: ₱123x1= ₱123,Total = ₱123', 'GCASH', '1', 'test', 'test@gmail.com', 123, '0997605585', 'dave`s restaurant', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'Not yet approved', '', '2023-06-14 09:06:15', '2023-06-13', '09:09:00'),
(88, ' lechon baboy: ₱123x1= ₱123,Total = ₱123', 'GCASH', '1', 'test', 'test@gmail.com', 123, '0997605585', 'dave`s restaurant', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'Not yet approved', '', '2023-06-14 12:03:02', '2023-06-05', '12:05:00'),
(89, ' lechon baboy: ₱123x1= ₱123,lechon baboy: ₱2323x1= ₱2323,Total = ₱2446', 'GCASH', '1', 'test', 'test@gmail.com', 2446, '0997605585', 'dave`s restaurant', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'Not yet approved', '', '2023-06-14 12:14:42', '2023-05-31', '14:14:00'),
(90, ' Fried Chicken: ₱212x1= ₱212,leche flan: ₱58x1= ₱58,uhmm: ₱23123x1= ₱23123,Total = ₱23393', 'GCASH', '1', 'test', 'test@gmail.com', 23393, '0997605585', '23232', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'full_payment', '', '2023-06-14 12:17:14', '2023-06-09', '15:16:00'),
(91, ' lechon baboy: ₱2323x23= ₱53429,Total = ₱53429', 'GCASH', '1', 'test', 'test@gmail.com', 53429, '0997605585', 'dave`s restaurant', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'Not yet approved', 'Plated', '2023-06-16 14:15:23', '2023-06-02', '14:16:00'),
(92, ' lechon baboy: ₱1221x1= ₱1221,Total = ₱1221', 'GCASH', '1', 'test', 'test@gmail.com', 1221, '0997605585', 'dave`s restaurant', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'Not yet approved', 'Plated', '2023-06-17 12:01:32', '2023-06-15', '12:03:00'),
(93, ' Fried Chicken: ₱212x5= ₱1060,leche flan: ₱58x4= ₱232,uhmm: ₱23123x5= ₱115615,Total = ₱116907', 'GCASH', '1', 'test', 'test@gmail.com', 116907, '0997605585', '23232', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'Not yet approved', 'Party Tray', '2023-06-17 15:08:35', '2023-07-17', '20:08:00'),
(94, ' leche flan: ₱58x1= ₱58,Total = ₱58', 'GCASH', '1', 'test', 'test@gmail.com', 58, '0997605585', '23232', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'Not yet approved', 'Party Tray', '2023-06-17 15:09:04', '2023-01-17', '15:14:00'),
(95, ' Fried Chicken: ₱212x1= ₱212,Total = ₱212', 'GCASH', '1', 'test', 'test@gmail.com', 212, '0997605585', '23232', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'Not yet approved', 'Party Tray', '2023-06-17 15:09:34', '2023-02-17', '20:09:00'),
(96, ' leche flan: ₱58x1= ₱58,Total = ₱58', 'GCASH', '1', 'test', 'test@gmail.com', 58, '0997605585', '23232', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'Not yet approved', 'Party Tray', '2023-06-17 15:10:00', '2023-03-17', '15:15:00'),
(97, ' lechon baboy: ₱123x1= ₱123,lechon baboy: ₱1221x1= ₱1221,lkl: ₱3513540x1= ₱3513540,Total = ₱3514884', 'GCASH', '1', 'test', 'test@gmail.com', 3514880, '0997605585', 'dave`s restaurant', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'Not yet approved', 'Party Tray', '2023-06-17 16:09:57', '2023-04-17', '21:09:00'),
(98, ' Chicken cordon bleu: ₱500x1= ₱500,Total = ₱500', 'GCASH', '1', 'test', 'test@gmail.com', 500, '0997605585', 'Pumice Food and Catering Services', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'down_payment', 'Party Tray', '2023-06-17 17:00:07', '2023-06-16', '21:00:00');

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
  `role` varchar(12) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customerid`, `password`, `useremail`, `username`, `phonenum`, `event_address`, `payment_type`, `role`, `image`) VALUES
(1, '$2y$10$mOV3j4STRCB7NslGaKw7XuFID6.OYdnct9Es109tGlTC7D4QaZhzu', 'test@gmail.com', 'test', '09976055855', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'GCASH', 'customer', '648c4f611a791.jpg'),
(2, '$2y$10$QEtd3Qlw8KcT2c5keSrP/u0L/14UPQRg4gRAf80uuZivQPDd44DWu', 'test1@gmail.com', 'test1', '09976055855', '', 'cash on delivery', 'customer', ''),
(3, '$2y$10$gK2Ukzs/yNSiMWegjeoSgu1SVcq8/nmp1v0nTZ3fR8ClL/snCTV5q', 'test2@gmail.com', 'test2', '99976055855', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'cash on delivery', 'customer', '');

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
(19, 'Chicken cordon bleu', 33, 'Pumice Food and Catering Services', 'Main Dish', 500, 'Party Tray : Good for 4-6 pax', '', '648d713aa43e8.jpg'),
(20, 'chicken curry', 33, 'Pumice Food and Catering Services', 'Main Dish', 500, 'Good for 4-6 pax', '', '648d71a24119b.jpg'),
(21, 'chicken kebab', 33, 'Pumice Food and Catering Services', 'Main Dish', 500, 'Good for 4-6 pax', '', '648d72222a8a1.jpg'),
(22, 'chicken kebab', 33, 'Pumice Food and Catering Services', 'Main Dish', 500, 'Good for 4-6 pax', '', '648d74106f2b7.jpg'),
(23, 'beef menudo', 33, 'Pumice Food and Catering Services', 'Main Dish', 500, 'Good for 4-6 pax', '', '648d742ee639d.jpg'),
(24, 'Roasted beef', 33, 'Pumice Food and Catering Services', 'Main Dish', 500, 'Good for 4-6 pax', '', '648d743f159a6.jpg'),
(25, 'Garlic prawn/ shrimp', 33, 'Pumice Food and Catering Services', 'Main Dish', 500, 'Good for 4-6 pax', '', '648d74bc01b7b.jpg'),
(26, 'Sweet and sour Fish fillet', 33, 'Pumice Food and Catering Services', 'Main Dish', 500, 'Good for 4-6 pax', '', '648d74d4419c2.jpg'),
(27, 'pumice fettucine carbonara', 33, 'Pumice Food and Catering Services', 'Pasta', 500, 'Good for 4-6 pax', '', '648d750dd1725.jpg'),
(28, 'pumice spaghetti balognes w/ meatballs', 33, 'Pumice Food and Catering Services', 'Pasta', 500, 'Good for 4-6 pax', '', '648d75412e413.jpg'),
(29, 'pumice ceasar salad', 33, 'Pumice Food and Catering Services', 'Salad', 500, 'Good for 4-6 pax', '', '648d75bbf180a.jpg');

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
  `rating` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Rate me?',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `user_id`, `name`, `restaurant`, `email`, `foodid`, `price`, `qty`, `rating`, `review`, `status`, `date`) VALUES
(47, 1, 'test', 'Pumice Food and Catering Services', 'test@gmail.com', 19, '500', '1', 0, '', 'Rate me?', '2023-06-17 17:00:08');

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
(4, 87, 'dave`s restaurant', 'test', 'Not yet approved', 'Updated', '2023-06-14 09:06:15'),
(5, 82, 'dave`s restaurant', 'test', 'canceled', 'Updated', '2023-06-14 11:56:08'),
(6, 88, 'dave`s restaurant', 'test', 'Not yet approved', 'Updated', '2023-06-14 12:03:02'),
(7, 89, 'dave`s restaurant', 'test', 'Not yet approved', 'Updated', '2023-06-14 12:14:42'),
(8, 87, 'dave`s restaurant', 'test', 'Not yet approved', 'Updated', '2023-06-14 12:15:03'),
(9, 86, 'dave`s restaurant', 'test', 'Not yet approved', 'Updated', '2023-06-14 12:15:16'),
(10, 85, 'dave`s restaurant', 'test', 'Not yet approved', 'Updated', '2023-06-14 12:15:28'),
(11, 84, 'dave`s restaurant', 'test', 'not approved', 'Updated', '2023-06-14 12:15:35'),
(12, 83, 'dave`s restaurant', 'test', 'canceled', 'Updated', '2023-06-14 12:15:43'),
(13, 82, 'dave`s restaurant', 'test', 'canceled', 'Updated', '2023-06-14 12:15:49'),
(14, 82, 'dave`s restaurant', 'test', 'canceled', 'Updated', '2023-06-14 12:15:54'),
(15, 82, 'dave`s restaurant', 'test', 'canceled', 'Updated', '2023-06-14 12:16:00'),
(16, 90, '23232', 'test', 'Not yet approved', 'Updated', '2023-06-14 12:17:14'),
(17, 91, 'dave`s restaurant', 'test', 'Not yet approved', 'Updated', '2023-06-16 14:15:23'),
(18, 92, 'dave`s restaurant', 'test', 'Not yet approved', 'Updated', '2023-06-17 12:01:32'),
(19, 90, '23232', 'test', 'approved', 'Updated', '2023-06-17 12:16:29'),
(20, 90, '23232', 'test', 'down_payment', 'Updated', '2023-06-17 12:40:31'),
(21, 90, '23232', 'test', 'Not yet approved', 'Updated', '2023-06-17 13:22:21'),
(22, 90, '23232', 'test', 'down_payment', 'Updated', '2023-06-17 13:24:52'),
(23, 90, '23232', 'test', 'full_payment', 'Updated', '2023-06-17 15:00:26'),
(24, 90, '23232', 'test', 'full_payment', 'Updated', '2023-06-17 15:00:39'),
(25, 93, '23232', 'test', 'Not yet approved', 'Updated', '2023-06-17 15:08:35'),
(26, 94, '23232', 'test', 'Not yet approved', 'Updated', '2023-06-17 15:09:04'),
(27, 95, '23232', 'test', 'Not yet approved', 'Updated', '2023-06-17 15:09:34'),
(28, 96, '23232', 'test', 'Not yet approved', 'Updated', '2023-06-17 15:10:00'),
(29, 97, 'dave`s restaurant', 'test', 'Not yet approved', 'Updated', '2023-06-17 16:09:57'),
(30, 98, 'Pumice Food and Catering Services', 'test', 'Not yet approved', 'Updated', '2023-06-17 17:00:07'),
(31, 98, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-17 17:01:08'),
(32, 98, 'Pumice Food and Catering Services', 'test', 'down_payment', 'Updated', '2023-06-17 17:01:29');

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
(33, '$2y$10$0UsIrMFlFM29HtyymqUCWe.5uU7muUjm584HCWgOVGOHcY6OTaXKq', 'pumicefood@gmail.com', 'Pumice', '09976055855', 'Seller', 'Pumice Food and Catering Services', 'Second Floor, Trophix Building, Gregorio LLUCH ST., PALA-O ILIGAN CITY', '64855baf2fbf0.jpg', '6487f32657f44.jpg', 8.23195, 124.32, 'approved');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_catering_order_details`
--
ALTER TABLE `tbl_catering_order_details`
  MODIFY `catering_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_foodmenu`
--
ALTER TABLE `tbl_foodmenu`
  MODIFY `foodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_order_logs`
--
ALTER TABLE `tbl_order_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
