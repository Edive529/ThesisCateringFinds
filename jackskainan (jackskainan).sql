-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 03:06 AM
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

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `customerid`, `restaurant`, `foodid`, `price`, `qty`) VALUES
(210, '1', 'dave`s restaurant', '14', '2323', '1');

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
(103, ' beef menudo: ₱500x4= ₱2000,chicken kebab: ₱500x3= ₱1500,Total = ₱3500', 'credit card', '1', 'test', 'test@gmail.com', 3500, '0997605585', 'Pumice Food and Catering Services', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'full_payment', 'Party Tray', '2023-05-16 14:46:30', '2023-06-20', '14:49:00'),
(104, ' chicken curry: ₱500x1= ₱500,Total = ₱500', 'credit card', '1', 'test', 'test@gmail.com', 500, '0997605585', 'Pumice Food and Catering Services', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'full_payment', 'Party Tray', '2023-04-09 14:47:33', '2023-06-19', '14:49:00'),
(105, ' chicken kebab: ₱500x1= ₱500,Total = ₱500', 'credit card', '1', 'test', 'test@gmail.com', 500, '0997605585', 'Pumice Food and Catering Services', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'full_payment', 'Party Tray', '2023-07-14 14:51:00', '2023-07-20', '16:50:00'),
(106, ' chicken curry: ₱500x1= ₱500,Total = ₱500', 'credit card', '1', 'test', 'test@gmail.com', 500, '0997605585', 'Pumice Food and Catering Services', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'full_payment', 'Party Tray', '2023-03-13 14:57:48', '2023-06-20', '16:57:00'),
(107, ' Roasted beef: ₱500x1= ₱500,Total = ₱500', 'credit card', '1', 'test', 'test@gmail.com', 500, '0997605585', 'Pumice Food and Catering Services', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'full_payment', 'Party Tray', '2023-02-16 14:59:51', '2023-06-26', '16:59:00'),
(108, ' chicken kebab: ₱500x1= ₱500,Total = ₱500', 'credit card', '1', 'test', 'test@gmail.com', 500, '0997605585', 'Pumice Food and Catering Services', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'Delivered', 'Party Tray', '2023-06-30 17:45:30', '2023-06-19', '17:01:00'),
(109, ' lechon baboy: ₱123x1= ₱123,Total = ₱123', 'credit card', '1', 'test', 'test@gmail.com', 123, '0997605585', 'dave`s restaurant', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'full_payment', 'Party Tray', '2023-06-18 17:59:53', '2023-06-20', '19:59:00');

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
(1, '$2y$10$mOV3j4STRCB7NslGaKw7XuFID6.OYdnct9Es109tGlTC7D4QaZhzu', 'test@gmail.com', 'test', '09976055855', 'Brgy. San Roque, Iligan City, Lanao del Norte', 'credit card', 'customer', '648ea8085c97b.jpg'),
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
(18, 'lkl', 33, 'dave`s restaurant', 'Main Dish', 3513540, '213\r\n3113', '', '64868a2930603.png'),
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
(29, 'pumice ceasar salad', 33, 'Pumice Food and Catering Services', 'Salad', 500, 'Good for 4-6 pax', '', '648d75bbf180a.jpg'),
(30, 'Fiesta 1', 33, 'Pumice Food and Catering Services', 'Package', 5000, 'chicken, chicken, Garlic, pumice, pumice', 'Good for you!', '648ead49cab50.jpg'),
(32, 'Fiesta 1', 34, 'Raquels Bakeshop', 'Package', 2500, 'Good for 10-15 pax', 'roast beef, chicken cordon bleu, potato croquetes, Fresh green salad, carbonara, chocolate cake', 'package 3.jpg'),
(33, 'Fiesta 2', 34, 'Raquels Bakeshop', 'Package', 2500, 'Good for 10-15 pax', 'kare-kare, grilled fish, fresh lumpia, Sotanghon Guisado, ube cake', 'package 3.jpg'),
(34, 'Fiesta 3', 34, 'Raquels Bakeshop', 'Package', 2600, 'Good for 10-15 pax', 'Lechon Belly, Fried Chicken, Kinilaw, Bam-e, Buko Pandan, Cholocate Creme Cake', 'package 3.jpg'),
(35, 'Porkchop', 35, 'Hazries Kitchen Catering Services', 'Main Dish', 600, 'Good for 5-6 pax', '', 'PorkChop.jpg'),
(36, 'Lechon Belly', 35, 'Hazries Kitchen Catering Services', 'Main Dish', 600, 'Good for 5-6 pax', '', 'LechonBelly.jpg'),
(37, 'Chicken Cordon Bleu', 35, 'Hazries Kitchen Catering Services', 'Main Dish', 650, 'Good for 5-6 pax', '', 'ChickenCordonBleu.jpg'),
(38, 'Bistek', 35, 'Hazries Kitchen Catering Services', 'Main Dish', 670, 'Good for 5-6 pax', '', 'Bistek.jpg'),
(39, 'Fiesta A', 35, 'Hazries Kitchen Catering Services', 'Package', 5500, 'Good for 30 pax', 'Lechon Belly,Chicken Cordon Bleau, Beef Rendang, Fish Millet, Fruit Salad ', 'hz.jpg'),
(40, 'Fiesta B', 35, 'Hazries Kitchen Catering Services', 'Package', 4200, 'Good for 20  pax', 'Lechon Belly, Pork Rib Calderetam, Chicken Cordon Bleu, Fish Millet, Fruit Salad', 'hz.jpg'),
(41, 'Fiesta C', 35, 'Hazries Kitchen Catering Services', 'Package', 3800, 'Good for 20 pax', 'Lechon Belly,Chicken Cordon Bleau, Beef Rendang, Fish Fillet ', 'hz.jpg'),
(42, 'Nuggets', 36, 'Appetina Modern Filipino Cuisine', 'Appetizer', 500, 'Good for 3-5 pax', '', 'Nuggets.jpg'),
(43, 'Menudo', 36, 'Appetina Modern Filipino Cuisine', 'Main Dish', 500, 'Good for 3-5 pax', '', 'Menudo.jpg'),
(44, 'Fried Chicken', 36, 'Appetina Modern Filipino Cuisine', 'Main Dish', 600, 'Good for 5-6 pax', '', 'FriedChicken.jpg'),
(45, 'Crabs', 36, 'Appetina Modern Filipino Cuisine', 'Main Dish', 550, 'Good for 5-6 pax', '', 'Crabs.jpg'),
(46, 'Chicken Curry', 36, 'Appetina Modern Filipino Cuisine', 'Main Dish', 650, 'Good for 5-6 pax', '', 'ChickenCurry.jpg'),
(47, 'Set A', 37, 'Frostybites Garden Hall', 'Package', 2000, 'Good for 8-10 pax', 'Chicken Ala King, Beef Estofada, Chicken Sotanghon, Four Seasons, Steamed Rice, Soft Drinks, Assorted Fruits, Maja Blanca', 'Pack 1.jpg'),
(48, 'Set 	B', 37, 'Frostybites Garden Hall', 'Package', 1800, 'Good for 8-10 pax', 'Chicken Teriyaki, Beef Caldereta, Fettuccine Alfredo, Lumpia Shanghai, Steamed Rice, Soft Drinks, Assorted Fruits, Cassava', 'Pack 1.jpg'),
(49, 'Set C', 37, 'Frostybites Garden Hall', 'Package', 2600, 'Good for 8-10 pax', 'Lemon Chicken, Beef Brisket, Carbonara, Spring Egg Rolls, Steamed Rice, Soft Drinks, Assorted Fruits, Pianono', 'Pack 1.jpg'),
(50, 'Set D', 37, 'Frostybites Garden Hall', 'Package', 2400, 'Good for 8-10 pax', 'Fried Chicken, Roast Beef, Rice Noodles, Fresh Lumpia, Steamed Rice, Soft Drinks, Assorted Fruits, Brownies', 'Pack 1.jpg');

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
(55, 1, 'test', 'Pumice Food and Catering Services', 'test@gmail.com', 23, '500', '4', 1, 'ewww', 'Already Rated!', '2023-06-18 14:46:30'),
(56, 1, 'test', 'Pumice Food and Catering Services', 'test@gmail.com', 21, '500', '3', 1, 'very tasty', 'Already Rated!', '2023-06-18 14:46:30'),
(57, 1, 'test', 'Pumice Food and Catering Services', 'test@gmail.com', 20, '500', '1', 5, 'VEryy tasty!!!', 'Already Rated!', '2023-06-18 14:47:33'),
(58, 1, 'test', 'Pumice Food and Catering Services', 'test@gmail.com', 21, '500', '1', 5, 'yummmyy', 'Already Rated!', '2023-06-18 14:51:00'),
(59, 1, 'test', 'Pumice Food and Catering Services', 'test@gmail.com', 20, '500', '1', 0, '', 'Rate me?', '2023-06-18 14:57:48'),
(60, 1, 'test', 'Pumice Food and Catering Services', 'test@gmail.com', 24, '500', '1', 0, '', 'Rate me?', '2023-06-18 14:59:51'),
(61, 1, 'test', 'Pumice Food and Catering Services', 'test@gmail.com', 22, '500', '1', 0, '', 'Rate me?', '2023-06-18 17:00:34');

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
(32, 98, 'Pumice Food and Catering Services', 'test', 'down_payment', 'Updated', '2023-06-17 17:01:29'),
(33, 99, 'Pumice Food and Catering Services', 'Pumice', 'Not yet approved', 'Updated', '2023-06-17 17:26:11'),
(34, 100, 'Pumice Food and Catering Services', 'test', 'Not yet approved', 'Updated', '2023-06-18 10:06:24'),
(35, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 10:07:43'),
(36, 100, 'Pumice Food and Catering Services', 'test', 'down_payment', 'Updated', '2023-06-18 10:40:42'),
(37, 100, 'Pumice Food and Catering Services', 'test', 'Not yet approved', 'Updated', '2023-06-18 10:47:33'),
(38, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 10:47:50'),
(39, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 11:13:08'),
(40, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 11:13:55'),
(41, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 11:13:59'),
(42, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 11:14:39'),
(43, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 11:14:42'),
(44, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 11:16:37'),
(45, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 11:16:40'),
(46, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 11:20:23'),
(47, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 11:24:32'),
(48, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 11:24:51'),
(49, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 11:24:53'),
(50, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 11:31:40'),
(51, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 11:31:44'),
(52, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 11:39:18'),
(53, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 11:39:22'),
(54, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 11:39:45'),
(55, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 11:39:53'),
(56, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 11:43:56'),
(57, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 11:44:00'),
(58, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 11:44:43'),
(59, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 11:44:51'),
(60, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 11:45:37'),
(61, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 11:45:42'),
(62, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 11:50:19'),
(63, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 11:50:25'),
(64, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 11:57:16'),
(65, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 11:57:19'),
(66, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 12:01:00'),
(67, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 12:09:45'),
(68, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 12:11:50'),
(69, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 12:25:36'),
(70, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 12:26:23'),
(71, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 12:26:24'),
(72, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 12:27:51'),
(73, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 12:29:04'),
(74, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 12:29:05'),
(75, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 12:29:06'),
(76, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 12:29:06'),
(77, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 12:29:07'),
(78, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 12:29:07'),
(79, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 12:29:08'),
(80, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 12:29:08'),
(81, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 12:30:22'),
(82, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 12:30:25'),
(83, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 12:30:50'),
(84, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 12:32:15'),
(85, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 12:32:36'),
(86, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 12:34:21'),
(87, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 12:40:54'),
(88, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 12:41:01'),
(89, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 12:41:44'),
(90, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 12:44:33'),
(91, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 12:46:36'),
(92, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 12:47:21'),
(93, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 12:49:26'),
(94, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 12:49:36'),
(95, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 13:17:37'),
(96, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 14:02:20'),
(97, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 14:02:55'),
(98, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 14:04:05'),
(99, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 14:04:18'),
(100, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 14:04:31'),
(101, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 14:08:01'),
(102, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 14:08:14'),
(103, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 14:09:48'),
(104, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 14:09:59'),
(105, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 14:10:24'),
(106, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 14:15:36'),
(107, 100, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 14:16:41'),
(108, 100, 'Pumice Food and Catering Services', 'test', 'Full_payment', 'Updated', '2023-06-18 14:18:51'),
(109, 101, 'Pumice Food and Catering Services', 'test', 'full_payment', 'Updated', '2023-06-18 14:34:04'),
(110, 102, 'Pumice Food and Catering Services', 'test', 'full_payment', 'Updated', '2023-06-18 14:36:25'),
(111, 103, 'Pumice Food and Catering Services', 'test', 'full_payment', 'Updated', '2023-06-18 14:46:30'),
(112, 104, 'Pumice Food and Catering Services', 'test', 'full_payment', 'Updated', '2023-06-18 14:47:33'),
(113, 105, 'Pumice Food and Catering Services', 'test', 'full_payment', 'Updated', '2023-06-18 14:51:00'),
(114, 106, 'Pumice Food and Catering Services', 'test', 'full_payment', 'Updated', '2023-06-18 14:57:48'),
(115, 107, 'Pumice Food and Catering Services', 'test', 'full_payment', 'Updated', '2023-06-18 14:59:51'),
(116, 108, 'Pumice Food and Catering Services', 'test', 'full_payment', 'Updated', '2023-06-18 17:00:34'),
(117, 108, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 17:21:30'),
(118, 108, 'Pumice Food and Catering Services', 'test', 'approved', 'Updated', '2023-06-18 17:22:25'),
(119, 108, 'Pumice Food and Catering Services', 'test', 'Delivered', 'Updated', '2023-06-18 17:22:28'),
(120, 108, 'Pumice Food and Catering Services', 'test', 'Delivered', 'Updated', '2023-06-18 17:22:57'),
(121, 105, 'Pumice Food and Catering Services', 'test', 'full_payment', 'Updated', '2023-06-18 17:43:44'),
(122, 105, 'Pumice Food and Catering Services', 'test', 'full_payment', 'Updated', '2023-06-18 17:44:12'),
(123, 103, 'Pumice Food and Catering Services', 'test', 'full_payment', 'Updated', '2023-06-18 17:44:50'),
(124, 104, 'Pumice Food and Catering Services', 'test', 'full_payment', 'Updated', '2023-06-18 17:44:55'),
(125, 106, 'Pumice Food and Catering Services', 'test', 'full_payment', 'Updated', '2023-06-18 17:45:01'),
(126, 107, 'Pumice Food and Catering Services', 'test', 'full_payment', 'Updated', '2023-06-18 17:45:05'),
(127, 108, 'Pumice Food and Catering Services', 'test', 'Delivered', 'Updated', '2023-06-18 17:45:12'),
(128, 108, 'Pumice Food and Catering Services', 'test', 'Delivered', 'Updated', '2023-06-18 17:45:37'),
(129, 109, 'dave`s restaurant', 'test', 'full_payment', 'Updated', '2023-06-18 17:59:53');

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
(33, '$2y$10$0UsIrMFlFM29HtyymqUCWe.5uU7muUjm584HCWgOVGOHcY6OTaXKq', 'pumicefood@gmail.com', 'Pumice', '09976055855', 'Seller', 'Pumice Food and Catering Services', 'Second Floor, Trophix Building, Gregorio LLUCH ST., PALA-O ILIGAN CITY', '64855baf2fbf0.jpg', '6487f32657f44.jpg', 8.23195, 124.32, 'approved'),
(34, '$2y$10$Q6zPla.dccXkJrSfhVTnKeepefhSH9SUpAq5UslCX5uBEitrdLC0y', 'Raquels.bakeshop@gmail.com', 'Raquel`s Bakeshop', '09976055855', 'Seller', 'Raquel`s Bakeshop', 'Raquel house', '648ed9c031fe8.png', '', 8.24954, 124.32, 'approved');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_catering_order_details`
--
ALTER TABLE `tbl_catering_order_details`
  MODIFY `catering_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_foodmenu`
--
ALTER TABLE `tbl_foodmenu`
  MODIFY `foodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_order_logs`
--
ALTER TABLE `tbl_order_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
