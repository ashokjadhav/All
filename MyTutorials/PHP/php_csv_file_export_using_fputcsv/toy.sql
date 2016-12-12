-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2014 at 04:05 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phppot_examples`
--

-- --------------------------------------------------------

--
-- Table structure for table `toy`
--

CREATE TABLE IF NOT EXISTS `toy` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(20) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `stock_count` bigint(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `toy`
--

INSERT INTO `toy` (`id`, `name`, `code`, `category`, `price`, `stock_count`) VALUES
(9, 'Music Aeroplane', 'TOY#MA01', 'Music Toys', 250, 500),
(10, 'Power Rangers', 'TOY#BT01', 'Battery Toys', 1000, 100),
(11, 'Remote Car', 'TOY#RMT01', 'Remote Control Toys', 280, 800),
(12, 'Bubbles', 'TOY#WT01', 'Water Games', 100, 1000),
(13, 'Cricket Cards', 'TOY#CD01', 'Card Games', 200, 80),
(14, 'Basket Ball', 'TOY#BB01', 'Outdoor Toys', 2000, 500),
(15, 'Word Puzzles', 'TOY#PZ01', 'Puzzles', 200, 200),
(16, 'Water Gun', 'TOY#WG01', 'Water Games', 100, 1000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
