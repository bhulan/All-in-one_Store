-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Mar 14, 2023 at 02:17 PM
-- Server version: 5.0.27
-- PHP Version: 5.2.1
-- 
-- Database: `mystore`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `admin_table`
-- 
-- Creation: Aug 08, 2022 at 02:25 PM
-- 

DROP TABLE IF EXISTS `admin_table`;
CREATE TABLE IF NOT EXISTS `admin_table` (
  `admin_id` int(11) NOT NULL auto_increment,
  `adminname` varchar(200) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_ip` varchar(100) NOT NULL,
  `admin_address` varchar(200) NOT NULL,
  `admin_mobile` varchar(20) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
-- Creation: Aug 01, 2022 at 07:35 PM
-- 

DROP TABLE IF EXISTS `cart_details`;
CREATE TABLE IF NOT EXISTS `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(250) NOT NULL,
  `quantity` int(100) NOT NULL,
  PRIMARY KEY  (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `cart_details`
-- 

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES 
(16, '127.0.0.1', 0),
(17, '127.0.0.1', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `catagories`
-- 
-- Creation: Jul 28, 2022 at 06:47 PM
-- 

DROP TABLE IF EXISTS `catagories`;
CREATE TABLE IF NOT EXISTS `catagories` (
  `catagory_id` int(11) NOT NULL auto_increment,
  `catagory_title` varchar(100) NOT NULL,
  PRIMARY KEY  (`catagory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `catagories`
-- 

INSERT INTO `catagories` (`catagory_id`, `catagory_title`) VALUES 
(5, 'books'),
(6, 'rice'),
(7, 'Shoes'),
(8, 'lemon');

-- --------------------------------------------------------

-- 
-- Table structure for table `products`
-- 
-- Creation: Jul 29, 2022 at 03:26 PM
-- 

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL auto_increment,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `product_keywords` varchar(200) NOT NULL,
  `catagory_id` int(11) NOT NULL,
  `product_image1` varchar(200) NOT NULL,
  `product_image2` varchar(200) NOT NULL,
  `product_image3` varchar(200) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY  (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- 
-- Dumping data for table `products`
-- 

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `catagory_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES 
(10, 'yu9', 'uyu', 'jhghu', 5, 'bhulan.jpg', '', '', '100', '2022-08-18 20:00:19', 'true'),
(13, 'lemon', 'rtyjhkl', 'https://www.paytm.com', 0, 'rimpic.jpg', '', '', '789', '2023-03-11 11:40:01', 'true'),
(16, 'nit', 'nit aa', 'https://nita.ac.in/', 0, 'payment.jpg', '', '', '999', '2023-03-14 19:45:17', 'true'),
(17, 'Dairy milk', 'kjcd', 'get', 8, 'dairymilk.jpg', '', '', '46', '2023-03-14 19:32:44', 'true');

-- --------------------------------------------------------

-- 
-- Table structure for table `user_table`
-- 
-- Creation: Aug 03, 2022 at 12:01 AM
-- 

DROP TABLE IF EXISTS `user_table`;
CREATE TABLE IF NOT EXISTS `user_table` (
  `user_id` int(11) NOT NULL auto_increment,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(260) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(200) NOT NULL,
  `user_mobile` varchar(20) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
