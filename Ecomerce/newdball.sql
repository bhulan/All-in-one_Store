-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql105.byetcluster.com
-- Generation Time: Mar 14, 2023 at 11:39 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_33796416_mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_ip` varchar(100) NOT NULL,
  `admin_address` varchar(200) NOT NULL,
  `admin_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `adminname`, `admin_email`, `admin_password`, `admin_ip`, `admin_address`, `admin_mobile`) VALUES
(1, 'bhulan', 'bhbuhbdw@gmail.com', '1234', '127.0.0.1', 'uuhh', '56876'),
(2, 'bhul', 'bhbuhtbdw@gmail.com', '12345', '127.0.0.1', 'dgddg', '23456');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(250) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `catagory_id` int(11) NOT NULL,
  `catagory_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`catagory_id`, `catagory_title`) VALUES
(5, 'Books'),
(6, 'Chocolates'),
(7, 'Fashion'),
(8, 'Oil'),
(9, 'Soap');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `product_keywords` varchar(200) NOT NULL,
  `catagory_id` int(11) NOT NULL,
  `product_image1` varchar(200) NOT NULL,
  `product_image2` varchar(200) NOT NULL,
  `product_image3` varchar(200) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `catagory_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(13, '5 Star', 'This smooth milk chocolate bar is packed with crunchy biscuit bits and a chewy caramel centre â€“ all the ingredients you need to give you energy to get....', '', 6, '5.jpg', '', '', '49', '2023-03-14 14:35:09', 'true'),
(17, 'Dairy milk', 'Our classic bar of deliciously creamy Cadbury Dairy Milk milk chocolate, made with fresh milk from the British Isles and Ireland. A mouthful of â€œmmmmâ€ in ...', '', 0, 'dairymilk.jpg', '', '', '46', '2023-03-14 14:41:13', 'true'),
(18, 'Cadbury ', 'Deciding on gifts for an upcoming event? Check out the bestsellers at cadburygifting.in. Our bestsellers will charm your loved ones on every occasion', '', 6, 'cadburry.jpg', '', '', '89', '2023-03-14 14:25:50', 'true'),
(19, 'Saffola', 'Saffola multisource blended oil is among the best refined oil for heart. Our heart-healthy oils lower cholesterol, aid fitness efforts, & add na....', '', 8, 'Saffola.jpg', '', '', '249', '2023-03-14 14:37:16', 'true'),
(20, 'Fortune', 'Be it a healthy lifestyle, a special dinner or your daily dose of flavour, Fortune foods can cater to every Indian tastebud. Buy Fortune products ...', '', 8, 'fortunt.jpg', '', '', '259', '2023-03-14 14:38:13', 'true'),
(21, 'Nihar', 'Created with the goodness of Coconut and methi, this oil nourishes hair from root to tip. ', '', 8, 'ne.jpg', '', '', '50', '2023-03-14 15:17:56', 'true'),
(22, 'Olay', 'Fight dark circles, wrinkles and puffy eyes in an instant with Olay Eyes Ultimate Eye Perfecting Cream. ', '', 9, 'olay.jpg', '', '', '99', '2023-03-14 15:19:36', 'true'),
(23, 'Cadburry Clebration', 'Kuch Miths hoo jaye', '', 6, 'cadbury.webp', '', '', '450', '2023-03-14 15:20:35', 'true'),
(24, 'Dove', 'Looking for hair products, skin care and deodorant to leave you looking and feeling beautiful? With tricks, tips, and products built on expert care, D...', '', 9, 'dove.jpg', '', '', '149', '2023-03-14 15:21:23', 'true'),
(25, 'Kitkat', 'CRAVING DELICIOUS CRISPY KitKatÂ® FINGERS ? Â· Life Hai, KitKatÂ® Break Banta Hai', '', 6, 'kitkat.jpg', '', '', '45', '2023-03-14 15:22:36', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(260) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(200) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, 'rimli de', 'bhulandeb6@gmail.com', '4567', '127.0.0.1', 'hbhhjb hbud', '1234567899'),
(2, 'rimli dey', 'bhulandeb6@gmail.com', '4567', '127.0.0.1', 'hbhhjb hbud', '546778388'),
(3, 'hgvg', 'bhulandeb6@gmail.com', 'jni', '127.0.0.1', 'jbi', '908008'),
(4, 'iuyt', 'bhulanuuudeb6@gmail.com', '5678', '127.0.0.1', 'dghbjn', '56789'),
(5, '435', 'bhularrerndeb6@gmail.com', 'r4t', '127.0.0.1', 'rtwr', '435678'),
(6, 'trew', 'bhulanu6uud99eb6@gmail.com', '1234', '127.0.0.1', 'ghdb', '4675'),
(7, 'trtyui', 'bhulanuuude9b6@gmail.com', '123e', '127.0.0.1', 'hjk', '6568'),
(8, 'abc', 'bhulanuudeb6@gmail.com', '123', '127.0.0.1', 'hhhjhj', '23'),
(9, 'bbb', 'ejjej@gmail.com', '123', '127.0.0.1', 'hjc', '24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`catagory_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `catagory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
