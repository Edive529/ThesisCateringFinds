-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 08:04 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Block, 0 = Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_rating`
--

INSERT INTO `item_rating` (`ratingId`, `itemId`, `userId`, `ratingNumber`, `title`, `comments`, `created`, `modified`, `status`) VALUES
(14, 12345678, 1, 2, 'its awesome', 'It\'s awesome!!!', '2018-08-19 09:13:01', '2018-08-19 09:13:01', 1),
(15, 12345678, 2, 5, 'Nice product', 'Really quality product!', '2018-08-19 09:13:37', '2018-08-19 09:13:37', 1),
(16, 12345678, 3, 1, 'best buy', 'its\'s best but item.', '2018-08-19 09:14:19', '2018-08-19 09:14:19', 1),
(17, 12345678, 4, 1, 'super awesome ', 'i think its supper products', '2018-08-19 09:18:00', '2018-08-19 09:18:00', 1),
(22, 12345679, 5, 1, 'adada', 'daDad', '2019-01-20 17:00:58', '2019-01-20 17:00:58', 1),
(23, 12345678, 5, 5, 'Nice product', 'this is nice!', '2019-01-20 17:01:37', '2019-01-20 17:01:37', 1),
(24, 12345679, 3, 1, 'really nice', 'Good!', '2019-01-20 21:06:48', '2019-01-20 21:06:48', 1),
(31, 1, 2, 1, 'hays', 'thesis defended cutiee', '2023-06-13 05:40:22', '2023-06-13 05:40:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_users`
--

CREATE TABLE `item_users` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_users`
--

INSERT INTO `item_users` (`userid`, `username`, `password`, `avatar`) VALUES
(1, 'rose', '123', 'user1.jpg'),
(2, 'smith', '123', 'user2.jpg'),
(3, 'adam', '123', 'user3.jpg'),
(4, 'merry', '123', 'user4.jpg'),
(5, 'katrina', '123', 'user5.jpg'),
(6, 'rhodes', '123', 'user6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` varchar(20) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `foodid` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `qty` varchar(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `userid`, `foodid`, `price`, `qty`) VALUES
('7iqmFREVTuy3rv6tICCP', 'aq2DSEwsYarVnGXj7RZi', '3', '212', '3');

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
(5, 'Salad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catering_order_details`
--

CREATE TABLE `tbl_catering_order_details` (
  `catering_id` int(11) NOT NULL,
  `order_list_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `foodid` int(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `phonenum` varchar(10) NOT NULL,
  `saleprice` varchar(10) NOT NULL,
  `qty` varchar(2) NOT NULL,
  `package` varchar(255) NOT NULL,
  `restaurant` varchar(255) NOT NULL,
  `event_address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Not yet approved',
  `address_type` varchar(255) NOT NULL,
  `catering_style` varchar(255) NOT NULL,
  `payment_status` varchar(12) NOT NULL,
  `date_of_reservation` datetime NOT NULL DEFAULT current_timestamp(),
  `date_to_be_delivered` date NOT NULL,
  `time_to_be_delivered` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_catering_order_details`
--

INSERT INTO `tbl_catering_order_details` (`catering_id`, `order_list_id`, `cart_id`, `payment_type`, `userid`, `user`, `foodid`, `useremail`, `phonenum`, `saleprice`, `qty`, `package`, `restaurant`, `event_address`, `status`, `address_type`, `catering_style`, `payment_status`, `date_of_reservation`, `date_to_be_delivered`, `time_to_be_delivered`) VALUES
(1, 1, 1, 'gcash', '', 'kyle', 0, '', '', '', '', 'bday', 'jackskainan', 'san_roque', '', '', 'buffet', 'not done', '2023-04-11 07:21:21', '2023-04-11', '00:00:00'),
(2, 0, 0, 'cash on delivery', 'aq2DSEwsYarVnGXj7RZi', '23', 1, '23@gmail.com', '23', '58', '30', '', '', 'dsfdsf, dfdf, dubaaaai, 1231', 'in progres', 'home', '', '', '2023-06-08 16:16:13', '2023-07-06', '16:12:00'),
(3, 0, 0, 'cash on delivery', 'aq2DSEwsYarVnGXj7RZi', '23', 2, '23@gmail.com', '23', '23123', '44', '', '', 'dsfdsf, dfdf, dubaaaai, 1231', '', 'home', '', '', '2023-06-08 16:16:13', '2023-07-06', '16:12:00'),
(4, 0, 0, 'cash on delivery', 'aq2DSEwsYarVnGXj7RZi', 'Kyle', 1, '32@gmail.com', '0997605585', '58', '1', '', '', 'Sanroque, Phase 1, Iligan, Philippines', '', 'home', '', '', '2023-06-08 17:10:47', '2023-06-09', '18:10:00'),
(5, 0, 0, 'cash on delivery', 'aq2DSEwsYarVnGXj7RZi', 'Kyle', 1, 'yogi@gmail.com', '111231', '58', '1', '', '', 'Brgy. San Roque, Phase 1, , ', '', 'office', '', '', '2023-06-08 17:19:17', '2023-06-22', '19:19:00'),
(6, 0, 0, 'cash on delivery', 'aq2DSEwsYarVnGXj7RZi', 'Kyle', 1, '32@gmail.com', '032231', '58', '4', '', '', '231, 232, , ', 'canceled', 'office', '', '', '2023-06-08 17:21:01', '2023-06-29', '19:21:00'),
(7, 0, 0, 'cash on delivery', 'aq2DSEwsYarVnGXj7RZi', 'Kyle', 2, '32@gmail.com', '032231', '23123', '3', '', '', '231, 232, , ', '', 'office', '', '', '2023-06-08 17:21:01', '2023-06-29', '19:21:00'),
(8, 0, 0, 'cash on delivery', 'aq2DSEwsYarVnGXj7RZi', 'Kyle', 1, '23@gmail.com', '23131', '58', '1', '', '', '213, 232, , ', 'Not yet approved', 'home', '', '', '2023-06-08 17:22:22', '2023-06-13', '17:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_foodmenu`
--

CREATE TABLE `tbl_foodmenu` (
  `foodid` int(11) NOT NULL,
  `food` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `saleprice` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_foodmenu`
--

INSERT INTO `tbl_foodmenu` (`foodid`, `food`, `category`, `saleprice`, `description`, `image`) VALUES
(1, 'leche flan', 'dessert', 58, '232', 'leche flan.png'),
(2, 'uhmm', 'dessert', 23123, '123123', 'kyle.png'),
(3, 'Fried Chicken', 'Main Dish', 212, 'ChickenJoy', 'chimken.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `packageid` int(11) NOT NULL,
  `package` varchar(255) NOT NULL,
  `food` varchar(255) NOT NULL,
  `saleprice` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`packageid`, `package`, `food`, `saleprice`, `description`, `image`) VALUES
(1, 'dessert package', 'leche,', 1233, '23', '641fd343e7813.png'),
(2, 'dessert package', 'leche,', 23, '2323', '641fd35ec37f9.png'),
(3, '', '', 0, '', ''),
(4, 'dessert package', 'leche,', 123, 'jkhkhj', '643e4770bc3eb.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(12) NOT NULL DEFAULT 'Seller',
  `restaurant` varchar(40) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'not approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `password`, `useremail`, `username`, `role`, `restaurant`, `address`, `image`, `latitude`, `longitude`, `status`) VALUES
(1, '$2y$10$7lvTpsP1o2L3iK1jTHbRZuRUyNzZ0cD.cpTIN9QdHyA/U9YnCnLji', 'test@gmail.com', 'test', 'Admin', '0', '', '', 0, 0, 'approved'),
(3, '$2y$10$jXAvtn62cs/b1Ev1aqql7.K1U2nOvWmWaLDM7q7LTq7U/lIkYPsfK', 'admin@gmail.com', 'Admin', 'Admin', '', '', '', 0, 0, 'approved'),
(4, '$2y$10$ZoXr6VyYREM9SpfVon65/.mRjKFtgYwc5W8WBFUj0QW6/VVOKefya', 'admin1@gmail.com', 'kyle', '', '', '', '', 0, 0, 'approved'),
(6, '$2y$10$NOe5luMVQ9ge450eWf6iBeeZZSF.XihW4ap/I38wyGzo70ZH.Y8Ta', 'kyle@gmail.com', 'kyleee', 'Seller', 'jacks', 'san roque Iligan City', '643e579a3a5d4.png', 544321, 234562, 'not approved'),
(7, '$2y$10$UD03HZ/NrnvOXMckPSdM5OvY0ERsaCVZa0T34t9pvRP.blnpe2wgG', 'kyle@gmail.com', 'kyleee', 'Seller', 'jacks', 'san roque Iligan City', '643e57e165551.png', 544321, 234562, 'not approved'),
(8, '$2y$10$M1PmoIXNBcT1tajwz6x73OFIvWXQ.PHJZN.3Q.u7LnteQgPUCgubu', 'kyle@gmail.com', 'kyleee', 'Seller', 'jacks', 'san roque Iligan City', '643e5818f0f92.png', 544321, 234562, 'not approved'),
(9, '$2y$10$d41fbSJzLr46KB75b4.D8Osc0fjIrfhUCBV7R9G4y/HUjScI8rb16', 'kyle@gmail.com', 'kyleee', 'Seller', 'jacks', 'san roque Iligan City', '643e583121120.png', 544321, 234562, 'not approved'),
(10, '$2y$10$tgN4qIWoir7NM51YQKugdOfG06d8MBarp1mB3/JLy80nDqByMb8j2', 'dano@gmail.com', 'kyleee', 'Seller', 'danobeats', 'sadasdsa', '643e598a69737.png', 3265548, 5497513, 'not approved'),
(11, '$2y$10$L1vFs8SB03ASMMmbNv3TOejVuJx/.zt9QxzWorq1jlxneEPNMjNdm', 'kyle@gmail.com', 'kyleee', 'Seller', 'jacks', 'san roque Iligan City', '643e5a58015de.png', 544321, 5497513, 'not approved'),
(12, '$2y$10$a.aB5Zr0cyhT0mkIJeTf4u2L708AFhXLUrlfwSftFOEOEQTQhhIyC', 'kyle@gmail.com', 'kyleee', 'Seller', 'jacks', 'san roque Iligan City', '643e5b0fbc30a.png', 544321, 5497513, 'not approved'),
(13, '$2y$10$zxJbB1roUdAO0.qohMwO4OPV2gnwmjPk8.DLiQ.kihFlrTYeDO9MO', 'kyle@gmail.com', 'sdsdsd', 'Seller', 'wwds', 'sdsad', '643e5b2b5adba.png', 123213, 233123, 'not approved'),
(14, '$2y$10$hPq.gLcox8i/BpUsQw4Nzu6x0C5S1gqKQtyXAQKxoCY8KPG1nAalu', 'kyle@gmail.com', 'sdsdsd', 'Seller', 'wwds', 'sdsad', '643e5b828b285.png', 123213, 233123, 'not approved'),
(15, '$2y$10$3r1CobCD2gxGZlbZDM090O8MDtpBxRcjIi0Dj67HnA7qRvnXmzOXa', 'yogi@gmail.com', 'yogi', 'Admin', '', '', '', 0, 0, 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item_rating`
--
ALTER TABLE `item_rating`
  ADD PRIMARY KEY (`ratingId`);

--
-- Indexes for table `item_users`
--
ALTER TABLE `item_users`
  ADD PRIMARY KEY (`userid`);

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
-- Indexes for table `tbl_foodmenu`
--
ALTER TABLE `tbl_foodmenu`
  ADD PRIMARY KEY (`foodid`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`packageid`);

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
  MODIFY `ratingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `item_users`
--
ALTER TABLE `item_users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_catering_order_details`
--
ALTER TABLE `tbl_catering_order_details`
  MODIFY `catering_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_foodmenu`
--
ALTER TABLE `tbl_foodmenu`
  MODIFY `foodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `packageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
