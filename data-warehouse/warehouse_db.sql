-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2023 at 03:08 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehouse_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`) VALUES
(2, 'Apple', 1),
(3, 'HP', 1),
(4, 'Samsung', 1),
(5, 'Sony', 1),
(6, 'Intel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `user_id`, `product_id`, `quantity`) VALUES
(1, 12, 5, 2),
(2, 12, 3, 2),
(3, 12, 6, 2),
(4, 12, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1, 'Mobile Devices', 1),
(2, 'TVs and Monitors', 1),
(3, 'Appliances', 1),
(5, 'Audio Devices', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `gstn` varchar(255) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `client_name`, `client_contact`, `sub_total`, `vat`, `total_amount`, `discount`, `grand_total`, `paid`, `due`, `payment_type`, `payment_status`, `gstn`, `order_status`) VALUES
(2, '2022-12-07', 'John', '079 6856 6235', '1279.00', '230.22', '1509.22', '9', '1500.22', '1200', '300.22', 2, 2, '230.22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_item_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `rate`, `total`, `order_item_status`) VALUES
(18, 2, 6, '1', '1099', '1099.00', 1),
(19, 2, 4, '1', '180', '180.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `product_image` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `transaction_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `product_image`, `category_id`, `brand_id`, `quantity`, `rate`, `status`, `transaction_time`) VALUES
(1, '55\" QN90B Neo QLED 4K HDR Smart TV', 'Super-focused lights, epic blacks and a brilliantly intense picture\r\nCatch all the action from any angle and see every brilliant detail, without distracting glare.Exceptional detail unveiled with bright colour and rich contrast\r\nAs quick as a flash, ready for your next-gen console\r\nThe brilliance of AI-powered 4K TV viewing', 'led.png', 2, 4, '25', '1050', 1, '2023-01-02 11:07:46'),
(3, 'SRS-XG300', 'IP67 water resistant and rustproof\r\n25 hours of battery life and Quick charging\r\nRetractable handle', 'speaker.jpg', 5, 5, '50', '185', 1, '2023-01-02 11:07:57'),
(4, 'Samsung Galaxy S21 5G', '151.7 x 71.2 x 7.9 mm (5.97 x 2.80 x 0.31 in)\r\nDynamic AMOLED 2X, 120Hz, HDR10+, 1300 nits (peak)\r\nAndroid 11, upgradable to Android 13, One UI 5', 'mobile.jpg', 1, 4, '8', '350', 1, '2023-01-02 11:08:06'),
(5, 'Samsung WW90T554DAN/S1 9KG Addwash Washing Machine Graphite', 'Samsung WW90T554DAN/S1 washing machine with ecobubble and AddWash. A large 9kg capacity, 1400rpm spin and A energy rating. Added convenience with features like Smart Control + and Hygiene Steam.', 'machine.jpg', 3, 4, '32', '439', 1, '2023-01-02 11:08:16'),
(6, 'iPhone 14 Pro ', '147.5 x 71.5 x 7.9 mm (5.81 x 2.81 x 0.31 in)\r\nLTPO Super Retina XDR OLED, 120Hz, HDR10, Dolby Vision, 1000 nits (typ), 2000 nits (HBM)\r\niOS 16, upgradable to iOS 16.1', 'iphone.jpg', 1, 2, '59', '1150', 1, '2023-01-02 11:08:26'),
(7, 'Sony Wh-Ch510 Bluetooth Wireless On Ear Headphones', 'Comfort : Lightweight, all-day listening with quality sound\r\nBluetooth : Listen to your favourite tracks wirelessly with a Bluetooth wireless technology by pairing your smartphone or tablet.', 'headphone.jpg', 5, 5, '50', '55', 1, '2023-01-02 11:08:36');

--
-- Triggers `products`
--
DELIMITER $$
CREATE TRIGGER `delete` AFTER DELETE ON `products` FOR EACH ROW INSERT INTO temporal_products VALUES (null,OLD.product_id,OLD.quantity,OLD.product_name,OLD.category_id,OLD.brand_id,OLD.description,OLD.rate,OLD.product_image,OLD.status,"Deleted",Now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert` AFTER INSERT ON `products` FOR EACH ROW INSERT INTO temporal_products VALUES (null,NEW.product_id,NEW.quantity,NEW.product_name,NEW.category_id,NEW.brand_id,NEW.description,NEW.rate,NEW.product_image,NEW.status,"New Product Added",Now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update` AFTER UPDATE ON `products` FOR EACH ROW INSERT INTO temporal_products VALUES (null,OLD.product_id,OLD.quantity,OLD.product_name,OLD.category_id,OLD.brand_id,OLD.description,OLD.rate,OLD.product_image,OLD.status,"Updated",Now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `temporal_products`
--

CREATE TABLE `temporal_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `brand_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `rate` decimal(11,2) DEFAULT NULL,
  `product_image` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temporal_products`
--

INSERT INTO `temporal_products` (`id`, `product_id`, `quantity`, `product_name`, `categories_id`, `brand_id`, `description`, `rate`, `product_image`, `status`, `action`, `timestamp`) VALUES
(1, 1, '30', '55\" QN90B Neo QLED 4K HDR Smart TV', 2, 4, 'Super-focused lights, epic blacks and a brilliantly intense picture\nCatch all the action from any angle and see every brilliant detail, without distracting glare.Exceptional detail unveiled with bright colour and rich contrast\nAs quick as a flash, ready for your next-gen console\nThe brilliance of AI-powered 4K TV viewing', '1100.00', 'led.png', 1, 'New Product Added', '2022-11-28 08:49:23'),
(4, 3, '50', 'SRS-XG300', 5, 5, '0', '170.00', 'speaker.jpg', 1, 'New Product Added', '2022-11-28 09:47:30'),
(5, 4, '20', 'Samsung Galaxy S21 5G', 1, 4, '152', '180.00', 'mobile.jpg', 1, 'New Product Added', '2022-11-28 09:51:03'),
(6, 5, '40', 'Samsung WW90T554DAN/S1 9KG Addwash Washing Machine Graphite', 3, 4, '0', '490.00', 'machine.jpg', 1, 'New Product Added', '2022-11-28 09:54:38'),
(7, 6, '60', 'iPhone 14 Pro ', 1, 2, '148', '1099.00', 'iphone.jpg', 1, 'New Product Added', '2022-11-28 09:58:03'),
(9, 1, '30', '55\" QN90B Neo QLED 4K HDR Smart TV', 2, 4, 'Super-focused lights, epic blacks and a brilliantly intense picture\nCatch all the action from any angle and see every brilliant detail, without distracting glare.Exceptional detail unveiled with bright colour and rich contrast\nAs quick as a flash, ready for your next-gen console\nThe brilliance of AI-powered 4K TV viewing', '1200.00', 'led.png', 1, 'Updated', '2022-11-28 10:27:49'),
(12, 3, '50', 'SRS-XG300', 5, 5, 'IP67 water resistant and rustproof\r\n25 hours of battery life and Quick charging\r\nRetractable handle', '170.00', 'speaker.jpg', 1, 'Updated', '2022-11-28 10:36:09'),
(13, 1, '30', '55\" QN90B Neo QLED 4K HDR Smart TV', 2, 4, 'Super-focused lights, epic blacks and a brilliantly intense picture\r\nCatch all the action from any angle and see every brilliant detail, without distracting glare.Exceptional detail unveiled with bright colour and rich contrast\r\nAs quick as a flash, ready for your next-gen console\r\nThe brilliance of AI-powered 4K TV viewing', '1200.00', 'led.png', 1, 'Updated', '2022-11-28 11:40:45'),
(14, 4, '20', 'Samsung Galaxy S21 5G', 1, 4, '151.7 x 71.2 x 7.9 mm (5.97 x 2.80 x 0.31 in)\r\nDynamic AMOLED 2X, 120Hz, HDR10+, 1300 nits (peak)\r\nAndroid 11, upgradable to Android 13, One UI 5', '180.00', 'mobile.jpg', 1, 'Updated', '2022-11-28 11:40:45'),
(15, 5, '40', 'Samsung WW90T554DAN/S1 9KG Addwash Washing Machine Graphite', 3, 4, 'Samsung WW90T554DAN/S1 washing machine with ecobubble and AddWash. A large 9kg capacity, 1400rpm spin and A energy rating. Added convenience with features like Smart Control + and Hygiene Steam.', '490.00', 'machine.jpg', 1, 'Updated', '2022-11-28 11:40:45'),
(16, 1, '29', '55\" QN90B Neo QLED 4K HDR Smart TV', 2, 4, 'Super-focused lights, epic blacks and a brilliantly intense picture\r\nCatch all the action from any angle and see every brilliant detail, without distracting glare.Exceptional detail unveiled with bright colour and rich contrast\r\nAs quick as a flash, ready for your next-gen console\r\nThe brilliance of AI-powered 4K TV viewing', '1200.00', 'led.png', 1, 'Updated', '2022-11-28 11:40:55'),
(17, 4, '19', 'Samsung Galaxy S21 5G', 1, 4, '151.7 x 71.2 x 7.9 mm (5.97 x 2.80 x 0.31 in)\r\nDynamic AMOLED 2X, 120Hz, HDR10+, 1300 nits (peak)\r\nAndroid 11, upgradable to Android 13, One UI 5', '180.00', 'mobile.jpg', 1, 'Updated', '2022-11-28 11:40:56'),
(18, 5, '38', 'Samsung WW90T554DAN/S1 9KG Addwash Washing Machine Graphite', 3, 4, 'Samsung WW90T554DAN/S1 washing machine with ecobubble and AddWash. A large 9kg capacity, 1400rpm spin and A energy rating. Added convenience with features like Smart Control + and Hygiene Steam.', '490.00', 'machine.jpg', 1, 'Updated', '2022-11-28 11:40:56'),
(19, 1, '28', '55\" QN90B Neo QLED 4K HDR Smart TV', 2, 4, 'Super-focused lights, epic blacks and a brilliantly intense picture\r\nCatch all the action from any angle and see every brilliant detail, without distracting glare.Exceptional detail unveiled with bright colour and rich contrast\r\nAs quick as a flash, ready for your next-gen console\r\nThe brilliance of AI-powered 4K TV viewing', '1200.00', 'led.png', 1, 'Updated', '2022-11-28 11:42:39'),
(20, 4, '18', 'Samsung Galaxy S21 5G', 1, 4, '151.7 x 71.2 x 7.9 mm (5.97 x 2.80 x 0.31 in)\r\nDynamic AMOLED 2X, 120Hz, HDR10+, 1300 nits (peak)\r\nAndroid 11, upgradable to Android 13, One UI 5', '180.00', 'mobile.jpg', 1, 'Updated', '2022-11-28 11:42:39'),
(21, 5, '36', 'Samsung WW90T554DAN/S1 9KG Addwash Washing Machine Graphite', 3, 4, 'Samsung WW90T554DAN/S1 washing machine with ecobubble and AddWash. A large 9kg capacity, 1400rpm spin and A energy rating. Added convenience with features like Smart Control + and Hygiene Steam.', '490.00', 'machine.jpg', 1, 'Updated', '2022-11-28 11:42:40'),
(22, 1, '27', '55\" QN90B Neo QLED 4K HDR Smart TV', 2, 4, 'Super-focused lights, epic blacks and a brilliantly intense picture\r\nCatch all the action from any angle and see every brilliant detail, without distracting glare.Exceptional detail unveiled with bright colour and rich contrast\r\nAs quick as a flash, ready for your next-gen console\r\nThe brilliance of AI-powered 4K TV viewing', '1200.00', 'led.png', 1, 'Updated', '2022-11-28 11:51:02'),
(23, 4, '17', 'Samsung Galaxy S21 5G', 1, 4, '151.7 x 71.2 x 7.9 mm (5.97 x 2.80 x 0.31 in)\r\nDynamic AMOLED 2X, 120Hz, HDR10+, 1300 nits (peak)\r\nAndroid 11, upgradable to Android 13, One UI 5', '180.00', 'mobile.jpg', 1, 'Updated', '2022-11-28 11:51:02'),
(24, 5, '34', 'Samsung WW90T554DAN/S1 9KG Addwash Washing Machine Graphite', 3, 4, 'Samsung WW90T554DAN/S1 washing machine with ecobubble and AddWash. A large 9kg capacity, 1400rpm spin and A energy rating. Added convenience with features like Smart Control + and Hygiene Steam.', '490.00', 'machine.jpg', 1, 'Updated', '2022-11-28 11:51:03'),
(25, 1, '26', '55\" QN90B Neo QLED 4K HDR Smart TV', 2, 4, 'Super-focused lights, epic blacks and a brilliantly intense picture\r\nCatch all the action from any angle and see every brilliant detail, without distracting glare.Exceptional detail unveiled with bright colour and rich contrast\r\nAs quick as a flash, ready for your next-gen console\r\nThe brilliance of AI-powered 4K TV viewing', '1200.00', 'led.png', 1, 'Updated', '2022-11-28 12:04:40'),
(26, 4, '15', 'Samsung Galaxy S21 5G', 1, 4, '151.7 x 71.2 x 7.9 mm (5.97 x 2.80 x 0.31 in)\r\nDynamic AMOLED 2X, 120Hz, HDR10+, 1300 nits (peak)\r\nAndroid 11, upgradable to Android 13, One UI 5', '180.00', 'mobile.jpg', 1, 'Updated', '2022-11-28 12:04:40'),
(27, 5, '33', 'Samsung WW90T554DAN/S1 9KG Addwash Washing Machine Graphite', 3, 4, 'Samsung WW90T554DAN/S1 washing machine with ecobubble and AddWash. A large 9kg capacity, 1400rpm spin and A energy rating. Added convenience with features like Smart Control + and Hygiene Steam.', '490.00', 'machine.jpg', 1, 'Updated', '2022-11-28 12:04:40'),
(28, 1, '25', '55\" QN90B Neo QLED 4K HDR Smart TV', 2, 4, 'Super-focused lights, epic blacks and a brilliantly intense picture\r\nCatch all the action from any angle and see every brilliant detail, without distracting glare.Exceptional detail unveiled with bright colour and rich contrast\r\nAs quick as a flash, ready for your next-gen console\r\nThe brilliance of AI-powered 4K TV viewing', '1200.00', 'led.png', 1, 'Updated', '2022-11-28 12:05:37'),
(29, 4, '13', 'Samsung Galaxy S21 5G', 1, 4, '151.7 x 71.2 x 7.9 mm (5.97 x 2.80 x 0.31 in)\r\nDynamic AMOLED 2X, 120Hz, HDR10+, 1300 nits (peak)\r\nAndroid 11, upgradable to Android 13, One UI 5', '180.00', 'mobile.jpg', 1, 'Updated', '2022-11-28 12:05:37'),
(30, 5, '32', 'Samsung WW90T554DAN/S1 9KG Addwash Washing Machine Graphite', 3, 4, 'Samsung WW90T554DAN/S1 washing machine with ecobubble and AddWash. A large 9kg capacity, 1400rpm spin and A energy rating. Added convenience with features like Smart Control + and Hygiene Steam.', '490.00', 'machine.jpg', 1, 'Updated', '2022-11-28 12:05:37'),
(31, 1, '26', '55\" QN90B Neo QLED 4K HDR Smart TV', 2, 4, 'Super-focused lights, epic blacks and a brilliantly intense picture\r\nCatch all the action from any angle and see every brilliant detail, without distracting glare.Exceptional detail unveiled with bright colour and rich contrast\r\nAs quick as a flash, ready for your next-gen console\r\nThe brilliance of AI-powered 4K TV viewing', '1200.00', 'led.png', 1, 'Updated', '2022-11-28 12:05:38'),
(32, 4, '14', 'Samsung Galaxy S21 5G', 1, 4, '151.7 x 71.2 x 7.9 mm (5.97 x 2.80 x 0.31 in)\r\nDynamic AMOLED 2X, 120Hz, HDR10+, 1300 nits (peak)\r\nAndroid 11, upgradable to Android 13, One UI 5', '180.00', 'mobile.jpg', 1, 'Updated', '2022-11-28 12:05:38'),
(33, 5, '33', 'Samsung WW90T554DAN/S1 9KG Addwash Washing Machine Graphite', 3, 4, 'Samsung WW90T554DAN/S1 washing machine with ecobubble and AddWash. A large 9kg capacity, 1400rpm spin and A energy rating. Added convenience with features like Smart Control + and Hygiene Steam.', '490.00', 'machine.jpg', 1, 'Updated', '2022-11-28 12:05:38'),
(34, 1, '25', '55\" QN90B Neo QLED 4K HDR Smart TV', 2, 4, 'Super-focused lights, epic blacks and a brilliantly intense picture\r\nCatch all the action from any angle and see every brilliant detail, without distracting glare.Exceptional detail unveiled with bright colour and rich contrast\r\nAs quick as a flash, ready for your next-gen console\r\nThe brilliance of AI-powered 4K TV viewing', '1200.00', 'led.png', 1, 'Updated', '2022-11-28 12:05:57'),
(35, 4, '12', 'Samsung Galaxy S21 5G', 1, 4, '151.7 x 71.2 x 7.9 mm (5.97 x 2.80 x 0.31 in)\r\nDynamic AMOLED 2X, 120Hz, HDR10+, 1300 nits (peak)\r\nAndroid 11, upgradable to Android 13, One UI 5', '180.00', 'mobile.jpg', 1, 'Updated', '2022-11-28 12:05:58'),
(36, 5, '32', 'Samsung WW90T554DAN/S1 9KG Addwash Washing Machine Graphite', 3, 4, 'Samsung WW90T554DAN/S1 washing machine with ecobubble and AddWash. A large 9kg capacity, 1400rpm spin and A energy rating. Added convenience with features like Smart Control + and Hygiene Steam.', '490.00', 'machine.jpg', 1, 'Updated', '2022-11-28 12:05:58'),
(37, 1, '26', '55\" QN90B Neo QLED 4K HDR Smart TV', 2, 4, 'Super-focused lights, epic blacks and a brilliantly intense picture\r\nCatch all the action from any angle and see every brilliant detail, without distracting glare.Exceptional detail unveiled with bright colour and rich contrast\r\nAs quick as a flash, ready for your next-gen console\r\nThe brilliance of AI-powered 4K TV viewing', '1200.00', 'led.png', 1, 'Updated', '2022-11-28 12:05:58'),
(38, 4, '13', 'Samsung Galaxy S21 5G', 1, 4, '151.7 x 71.2 x 7.9 mm (5.97 x 2.80 x 0.31 in)\r\nDynamic AMOLED 2X, 120Hz, HDR10+, 1300 nits (peak)\r\nAndroid 11, upgradable to Android 13, One UI 5', '180.00', 'mobile.jpg', 1, 'Updated', '2022-11-28 12:05:58'),
(39, 5, '33', 'Samsung WW90T554DAN/S1 9KG Addwash Washing Machine Graphite', 3, 4, 'Samsung WW90T554DAN/S1 washing machine with ecobubble and AddWash. A large 9kg capacity, 1400rpm spin and A energy rating. Added convenience with features like Smart Control + and Hygiene Steam.', '490.00', 'machine.jpg', 1, 'Updated', '2022-11-28 12:05:58'),
(40, 1, '25', '55\" QN90B Neo QLED 4K HDR Smart TV', 2, 4, 'Super-focused lights, epic blacks and a brilliantly intense picture\r\nCatch all the action from any angle and see every brilliant detail, without distracting glare.Exceptional detail unveiled with bright colour and rich contrast\r\nAs quick as a flash, ready for your next-gen console\r\nThe brilliance of AI-powered 4K TV viewing', '1200.00', 'led.png', 1, 'Updated', '2022-11-28 12:06:13'),
(41, 4, '11', 'Samsung Galaxy S21 5G', 1, 4, '151.7 x 71.2 x 7.9 mm (5.97 x 2.80 x 0.31 in)\r\nDynamic AMOLED 2X, 120Hz, HDR10+, 1300 nits (peak)\r\nAndroid 11, upgradable to Android 13, One UI 5', '180.00', 'mobile.jpg', 1, 'Updated', '2022-11-28 12:06:13'),
(42, 5, '32', 'Samsung WW90T554DAN/S1 9KG Addwash Washing Machine Graphite', 3, 4, 'Samsung WW90T554DAN/S1 washing machine with ecobubble and AddWash. A large 9kg capacity, 1400rpm spin and A energy rating. Added convenience with features like Smart Control + and Hygiene Steam.', '490.00', 'machine.jpg', 1, 'Updated', '2022-11-28 12:06:14'),
(43, 1, '26', '55\" QN90B Neo QLED 4K HDR Smart TV', 2, 4, 'Super-focused lights, epic blacks and a brilliantly intense picture\r\nCatch all the action from any angle and see every brilliant detail, without distracting glare.Exceptional detail unveiled with bright colour and rich contrast\r\nAs quick as a flash, ready for your next-gen console\r\nThe brilliance of AI-powered 4K TV viewing', '1200.00', 'led.png', 1, 'Updated', '2022-11-28 12:06:14'),
(44, 4, '12', 'Samsung Galaxy S21 5G', 1, 4, '151.7 x 71.2 x 7.9 mm (5.97 x 2.80 x 0.31 in)\r\nDynamic AMOLED 2X, 120Hz, HDR10+, 1300 nits (peak)\r\nAndroid 11, upgradable to Android 13, One UI 5', '180.00', 'mobile.jpg', 1, 'Updated', '2022-11-28 12:06:14'),
(45, 5, '33', 'Samsung WW90T554DAN/S1 9KG Addwash Washing Machine Graphite', 3, 4, 'Samsung WW90T554DAN/S1 washing machine with ecobubble and AddWash. A large 9kg capacity, 1400rpm spin and A energy rating. Added convenience with features like Smart Control + and Hygiene Steam.', '490.00', 'machine.jpg', 1, 'Updated', '2022-11-28 12:06:14'),
(46, 1, '25', '55\" QN90B Neo QLED 4K HDR Smart TV', 2, 4, 'Super-focused lights, epic blacks and a brilliantly intense picture\r\nCatch all the action from any angle and see every brilliant detail, without distracting glare.Exceptional detail unveiled with bright colour and rich contrast\r\nAs quick as a flash, ready for your next-gen console\r\nThe brilliance of AI-powered 4K TV viewing', '1200.00', 'led.png', 1, 'Updated', '2022-11-28 12:06:43'),
(47, 4, '10', 'Samsung Galaxy S21 5G', 1, 4, '151.7 x 71.2 x 7.9 mm (5.97 x 2.80 x 0.31 in)\r\nDynamic AMOLED 2X, 120Hz, HDR10+, 1300 nits (peak)\r\nAndroid 11, upgradable to Android 13, One UI 5', '180.00', 'mobile.jpg', 1, 'Updated', '2022-11-28 12:06:43'),
(48, 1, '26', '55\" QN90B Neo QLED 4K HDR Smart TV', 2, 4, 'Super-focused lights, epic blacks and a brilliantly intense picture\r\nCatch all the action from any angle and see every brilliant detail, without distracting glare.Exceptional detail unveiled with bright colour and rich contrast\r\nAs quick as a flash, ready for your next-gen console\r\nThe brilliance of AI-powered 4K TV viewing', '1200.00', 'led.png', 1, 'Updated', '2022-11-28 12:06:43'),
(49, 4, '11', 'Samsung Galaxy S21 5G', 1, 4, '151.7 x 71.2 x 7.9 mm (5.97 x 2.80 x 0.31 in)\r\nDynamic AMOLED 2X, 120Hz, HDR10+, 1300 nits (peak)\r\nAndroid 11, upgradable to Android 13, One UI 5', '180.00', 'mobile.jpg', 1, 'Updated', '2022-11-28 12:06:43'),
(50, 6, '60', 'iPhone 14 Pro ', 1, 2, '147.5 x 71.5 x 7.9 mm (5.81 x 2.81 x 0.31 in)\r\nLTPO Super Retina XDR OLED, 120Hz, HDR10, Dolby Vision, 1000 nits (typ), 2000 nits (HBM)\r\niOS 16, upgradable to iOS 16.1', '1099.00', 'iphone.jpg', 1, 'Updated', '2022-11-28 12:15:33'),
(51, 6, '60', 'iPhone 14 Pro ', 1, 2, '147.5 x 71.5 x 7.9 mm (5.81 x 2.81 x 0.31 in)\r\nLTPO Super Retina XDR OLED, 120Hz, HDR10, Dolby Vision, 1000 nits (typ), 2000 nits (HBM)\r\niOS 16, upgradable to iOS 16.1', '1099.00', 'iphone.jpg', 1, 'Updated', '2022-11-28 12:16:18'),
(52, 4, '9', 'Samsung Galaxy S21 5G', 1, 4, '151.7 x 71.2 x 7.9 mm (5.97 x 2.80 x 0.31 in)\r\nDynamic AMOLED 2X, 120Hz, HDR10+, 1300 nits (peak)\r\nAndroid 11, upgradable to Android 13, One UI 5', '180.00', 'mobile.jpg', 1, 'Updated', '2022-11-28 12:16:18'),
(53, 7, '50', 'Sony Wh-Ch510 Bluetooth Wireless On Ear Headphones', 5, 5, 'Comfort : Lightweight, all-day listening with quality sound\r\nBluetooth : Listen to your favourite tracks wirelessly with a Bluetooth wireless technology by pairing your smartphone or tablet.', '59.00', 'headphone.jpg', 1, 'New Product Added', '2022-12-30 06:31:06'),
(85, 1, '25', '55\" QN90B Neo QLED 4K HDR Smart TV', 2, 4, 'Super-focused lights, epic blacks and a brilliantly intense picture\r\nCatch all the action from any angle and see every brilliant detail, without distracting glare.Exceptional detail unveiled with bright colour and rich contrast\r\nAs quick as a flash, ready for your next-gen console\r\nThe brilliance of AI-powered 4K TV viewing', '1200.00', 'led.png', 1, 'Updated', '2023-01-02 11:06:43'),
(86, 3, '50', 'SRS-XG300', 5, 5, 'IP67 water resistant and rustproof\r\n25 hours of battery life and Quick charging\r\nRetractable handle', '175.00', 'speaker.jpg', 1, 'Updated', '2023-01-02 11:06:54'),
(87, 4, '8', 'Samsung Galaxy S21 5G', 1, 4, '151.7 x 71.2 x 7.9 mm (5.97 x 2.80 x 0.31 in)\r\nDynamic AMOLED 2X, 120Hz, HDR10+, 1300 nits (peak)\r\nAndroid 11, upgradable to Android 13, One UI 5', '180.00', 'mobile.jpg', 1, 'Updated', '2023-01-02 11:07:12'),
(88, 5, '32', 'Samsung WW90T554DAN/S1 9KG Addwash Washing Machine Graphite', 3, 4, 'Samsung WW90T554DAN/S1 washing machine with ecobubble and AddWash. A large 9kg capacity, 1400rpm spin and A energy rating. Added convenience with features like Smart Control + and Hygiene Steam.', '490.00', 'machine.jpg', 1, 'Updated', '2023-01-02 11:07:22'),
(89, 6, '59', 'iPhone 14 Pro ', 1, 2, '147.5 x 71.5 x 7.9 mm (5.81 x 2.81 x 0.31 in)\r\nLTPO Super Retina XDR OLED, 120Hz, HDR10, Dolby Vision, 1000 nits (typ), 2000 nits (HBM)\r\niOS 16, upgradable to iOS 16.1', '1099.00', 'iphone.jpg', 1, 'Updated', '2023-01-02 11:07:30'),
(90, 7, '50', 'Sony Wh-Ch510 Bluetooth Wireless On Ear Headphones', 5, 5, 'Comfort : Lightweight, all-day listening with quality sound\r\nBluetooth : Listen to your favourite tracks wirelessly with a Bluetooth wireless technology by pairing your smartphone or tablet.', '59.00', 'headphone.jpg', 1, 'Updated', '2023-01-02 11:07:37'),
(91, 1, '25', '55\" QN90B Neo QLED 4K HDR Smart TV', 2, 4, 'Super-focused lights, epic blacks and a brilliantly intense picture\r\nCatch all the action from any angle and see every brilliant detail, without distracting glare.Exceptional detail unveiled with bright colour and rich contrast\r\nAs quick as a flash, ready for your next-gen console\r\nThe brilliance of AI-powered 4K TV viewing', '1129.00', 'led.png', 1, 'Updated', '2023-01-02 11:07:46'),
(92, 3, '50', 'SRS-XG300', 5, 5, 'IP67 water resistant and rustproof\r\n25 hours of battery life and Quick charging\r\nRetractable handle', '210.00', 'speaker.jpg', 1, 'Updated', '2023-01-02 11:07:57'),
(93, 4, '8', 'Samsung Galaxy S21 5G', 1, 4, '151.7 x 71.2 x 7.9 mm (5.97 x 2.80 x 0.31 in)\r\nDynamic AMOLED 2X, 120Hz, HDR10+, 1300 nits (peak)\r\nAndroid 11, upgradable to Android 13, One UI 5', '280.00', 'mobile.jpg', 1, 'Updated', '2023-01-02 11:08:06'),
(94, 5, '32', 'Samsung WW90T554DAN/S1 9KG Addwash Washing Machine Graphite', 3, 4, 'Samsung WW90T554DAN/S1 washing machine with ecobubble and AddWash. A large 9kg capacity, 1400rpm spin and A energy rating. Added convenience with features like Smart Control + and Hygiene Steam.', '549.00', 'machine.jpg', 1, 'Updated', '2023-01-02 11:08:16'),
(95, 6, '59', 'iPhone 14 Pro ', 1, 2, '147.5 x 71.5 x 7.9 mm (5.81 x 2.81 x 0.31 in)\r\nLTPO Super Retina XDR OLED, 120Hz, HDR10, Dolby Vision, 1000 nits (typ), 2000 nits (HBM)\r\niOS 16, upgradable to iOS 16.1', '999.00', 'iphone.jpg', 1, 'Updated', '2023-01-02 11:08:26'),
(96, 7, '50', 'Sony Wh-Ch510 Bluetooth Wireless On Ear Headphones', 5, 5, 'Comfort : Lightweight, all-day listening with quality sound\r\nBluetooth : Listen to your favourite tracks wirelessly with a Bluetooth wireless technology by pairing your smartphone or tablet.', '39.00', 'headphone.jpg', 1, 'Updated', '2023-01-02 11:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `contact` char(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` enum('admin','user') NOT NULL,
  `joined_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `contact`, `email`, `password`, `user_role`, `joined_at`) VALUES
(1, 'admin', '', 'admin@gmail.com', 'MTIzNDU2', 'admin', '2022-11-28 05:09:23'),
(11, 'Alexander Pritchard', '079 6542 9524', 'AlexanderPritchard@rhyta.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', '2022-12-30 09:33:49'),
(12, 'Alfie Abbott', '070 5367 6657', 'AlfieAbbott@dayrep.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', '2022-12-30 13:12:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `temporal_products`
--
ALTER TABLE `temporal_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `temporal_products`
--
ALTER TABLE `temporal_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
