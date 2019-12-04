-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Apr 11, 2011 at 09:05 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `gikomba`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `account`
-- 

CREATE TABLE `account` (
  `user_id` int(3) NOT NULL auto_increment,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `account`
-- 

INSERT INTO `account` (`user_id`, `firstname`, `lastname`, `address`, `telephone`, `email`, `city`, `country`, `username`, `password`, `confirm_password`) VALUES 
(1, 'Evans', 'Githinji', '62000', '0722471224', 'dreamIT@newdream.co.ke', 'Nairobi', 'Kenya', 'evanoskill', 'skills', 'skills');

-- --------------------------------------------------------

-- 
-- Table structure for table `forum_posts`
-- 

CREATE TABLE `forum_posts` (
  `post_id` int(11) NOT NULL auto_increment,
  `topic_id` int(11) NOT NULL,
  `post_text` varchar(255) NOT NULL,
  `post_create_time` varchar(255) NOT NULL,
  `post_owner` varchar(255) NOT NULL,
  PRIMARY KEY  (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `forum_posts`
-- 

INSERT INTO `forum_posts` (`post_id`, `topic_id`, `post_text`, `post_create_time`, `post_owner`) VALUES 
(1, 14, 'Cool products available?', '2011-04-03 12:59:00', 'evanoskillz@newdream.com'),
(2, 14, 'gfhfjfjy', '2011-04-08 13:54:35', 'mikey@gmail.com'),
(3, 14, 'gfhfjfjy', '2011-04-08 13:54:50', 'mikey@gmail.com');

-- --------------------------------------------------------

-- 
-- Table structure for table `forum_topics`
-- 

CREATE TABLE `forum_topics` (
  `topic_id` int(3) NOT NULL auto_increment,
  `topic_title` varchar(255) NOT NULL,
  `topic_create_time` date NOT NULL,
  `topic_owner` varchar(255) NOT NULL,
  PRIMARY KEY  (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- 
-- Dumping data for table `forum_topics`
-- 

INSERT INTO `forum_topics` (`topic_id`, `topic_title`, `topic_create_time`, `topic_owner`) VALUES 
(13, 'New arrivals', '2011-04-02', 'essyrinds@yahoo.com'),
(14, 'Products', '2011-04-03', 'evanoskillz@newdream.com');

-- --------------------------------------------------------

-- 
-- Table structure for table `store_categories`
-- 

CREATE TABLE `store_categories` (
  `id` int(3) NOT NULL auto_increment,
  `cat_title` varchar(50) NOT NULL,
  `cat_desc` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `store_categories`
-- 

INSERT INTO `store_categories` (`id`, `cat_title`, `cat_desc`) VALUES 
(1, 'African Curios', 'Artifacts with rich african content'),
(2, 'Children and Fashion', 'Clothes and adult wear'),
(3, 'Jewellery', 'Jewels and jewellery'),
(4, 'Casual wear', 'Fit for all men and women'),
(5, 'Footwear', 'Fitting shoes for both men and women');

-- --------------------------------------------------------

-- 
-- Table structure for table `store_items`
-- 

CREATE TABLE `store_items` (
  `id` int(3) NOT NULL auto_increment,
  `cat_id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `store_items`
-- 

INSERT INTO `store_items` (`id`, `cat_id`, `title`, `price`, `description`, `image`) VALUES 
(1, 1, 'Leso', '37', 'Traditional african wear made for african women', ''),
(2, 1, 'Ushanga', '50', 'Necklace for women', ''),
(3, 2, 'Boots', '120', 'Children foot wear', ''),
(4, 3, 'Gold chain', '45000', '5 carat gold chain', ''),
(5, 2, 'Kid hats', '650', 'Warm and comfy for babies under 5 years', 'hat.jpg'),
(6, 3, 'Diamond ring', '2300', 'Brand new from South Africa', 'diamong.jpg');

-- --------------------------------------------------------

-- 
-- Table structure for table `store_item_color`
-- 

CREATE TABLE `store_item_color` (
  `item_id` int(3) NOT NULL auto_increment,
  `item_color` varchar(255) NOT NULL,
  PRIMARY KEY  (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `store_item_color`
-- 

INSERT INTO `store_item_color` (`item_id`, `item_color`) VALUES 
(1, 'Blue'),
(2, 'Red'),
(3, 'Yellow');

-- --------------------------------------------------------

-- 
-- Table structure for table `store_item_size`
-- 

CREATE TABLE `store_item_size` (
  `item_id` int(3) NOT NULL auto_increment,
  `item_size` varchar(255) NOT NULL,
  PRIMARY KEY  (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `store_item_size`
-- 

INSERT INTO `store_item_size` (`item_id`, `item_size`) VALUES 
(1, 'Small'),
(2, 'Large'),
(3, 'Extra large');

-- --------------------------------------------------------

-- 
-- Table structure for table `store_orders`
-- 

CREATE TABLE `store_orders` (
  `id` int(3) NOT NULL auto_increment,
  `order_date` datetime NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `order_address` varchar(255) NOT NULL,
  `order_city` varchar(255) NOT NULL,
  `order_state` varchar(255) NOT NULL,
  `order_zip` varchar(255) NOT NULL,
  `order_tel` varchar(255) NOT NULL,
  `order_email` varchar(255) NOT NULL,
  `item_total` varchar(255) NOT NULL,
  `shipping_total` varchar(255) NOT NULL,
  `authorization` varchar(255) NOT NULL,
  `status` enum('processed','pending') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `store_orders`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `store_orders_itemmap`
-- 

CREATE TABLE `store_orders_itemmap` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `sel_item_id` smallint(6) NOT NULL,
  `sel_item_qty` varchar(255) NOT NULL,
  `sel_item_size` varchar(255) NOT NULL,
  `sel_item_color` varchar(255) NOT NULL,
  `sel_item_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `store_orders_itemmap`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `store_shoppertrack`
-- 

CREATE TABLE `store_shoppertrack` (
  `id` int(3) NOT NULL auto_increment,
  `session_id` varchar(255) NOT NULL,
  `sel_item_id` int(3) NOT NULL,
  `sel_item_qty` smallint(255) NOT NULL,
  `sel_item_size` varchar(255) NOT NULL,
  `sel_item_color` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `store_shoppertrack`
-- 

INSERT INTO `store_shoppertrack` (`id`, `session_id`, `sel_item_id`, `sel_item_qty`, `sel_item_size`, `sel_item_color`, `date_added`) VALUES 
(5, '', 2, 1, 'Small', 'Blue', '2011-04-11 12:39:05'),
(6, '', 3, 1, 'Small', 'Blue', '2011-04-11 12:47:37'),
(7, '', 6, 1, 'Small', 'Blue', '2011-04-11 20:03:11');
