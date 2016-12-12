-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2015 at 06:22 PM
-- Server version: 5.1.73-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nexusphp_ci_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `apointments`
--

CREATE TABLE IF NOT EXISTS `apointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_name` varchar(255) NOT NULL,
  `to_name` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `reason` varchar(1000) NOT NULL,
  `appointment_date` date NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `apointments`
--

INSERT INTO `apointments` (`id`, `from_name`, `to_name`, `contact`, `reason`, `appointment_date`, `from_time`, `to_time`, `status`, `created_date`, `modified_date`) VALUES
(42, '449', '338', '9767897777', 'twt', '2015-05-18', '17:20:00', '00:00:00', 0, '2015-05-14 20:51:21', '2015-05-14 15:21:21'),
(41, '449', '372', '7894', 'Nothing Serious', '2015-05-07', '13:00:00', '23:00:00', 1, '2015-05-06 21:05:31', '2015-05-06 15:35:31'),
(39, '449', '400', '546456', 'szfgsdfg', '2015-05-13', '16:00:00', '17:00:00', 1, '2015-05-06 21:31:14', '2015-05-06 16:01:14'),
(38, '449', '389', '5464346', '3456345654', '2015-05-07', '19:00:00', '23:00:00', 1, '2015-05-05 18:19:19', '2015-05-05 12:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `Articles`
--

CREATE TABLE IF NOT EXISTS `Articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `sub_category` varchar(300) NOT NULL,
  `author` varchar(200) NOT NULL,
  `publisher` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `dop` date NOT NULL,
  `code` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `borrow_status` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Audio_cd`
--

CREATE TABLE IF NOT EXISTS `Audio_cd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `sub_category` varchar(300) NOT NULL,
  `author` varchar(200) NOT NULL,
  `publisher` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `dop` date NOT NULL,
  `code` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `borrow_status` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Audio_cd`
--

INSERT INTO `Audio_cd` (`id`, `name`, `sub_category`, `author`, `publisher`, `price`, `dop`, `code`, `status`, `borrow_status`, `created_date`, `modified_date`) VALUES
(1, 'roy', 'bollywood', 'cvhfgh', 'jjjgh', '87876', '2014-12-22', '788', 1, '', '2015-02-27 18:38:10', '2015-02-27 13:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE IF NOT EXISTS `Book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `sub_category` varchar(300) NOT NULL,
  `author` varchar(200) NOT NULL,
  `publisher` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `dop` date NOT NULL,
  `code` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `borrow_status` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`id`, `name`, `sub_category`, `author`, `publisher`, `price`, `dop`, `code`, `status`, `borrow_status`, `created_date`, `modified_date`) VALUES
(1, '7 HABITS OF HIGHLY EFFECTIVE PEOPLE', 'PERSONAL DEVELOPMENT', 'STEPHEN COVEY', 'Steph', '545', '2015-02-17', '56354', 1, 'pending', '2015-02-27 16:11:16', '2015-02-27 10:41:16'),
(2, 'PRINCIPLES OF MANAGEMENT', 'PERSONAL DEVELOPMENT', 'XYZ', 'Rowling', '551', '2015-02-08', '56354', 1, '', '2015-02-27 16:12:25', '2015-02-27 16:00:50'),
(3, 'HR SCORECARD', 'HR TRAINING', 'Armstrong', 'ASTD', '542', '2015-02-11', 'sdg56sg', 1, '', '2015-02-28 15:58:03', '2015-05-07 10:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `book_guesthouse`
--

CREATE TABLE IF NOT EXISTS `book_guesthouse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stayplace` varchar(300) NOT NULL,
  `checkin_date` varchar(20) NOT NULL,
  `checkout_date` varchar(20) NOT NULL,
  `ticket_number` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `instructions` varchar(500) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `book_guesthouse`
--

INSERT INTO `book_guesthouse` (`id`, `stayplace`, `checkin_date`, `checkout_date`, `ticket_number`, `status`, `user_id`, `instructions`, `created_date`, `modified_date`) VALUES
(23, 'Chennai', '2015-05-19', '2015-05-29', '7456', 1, 448, 'cvcvcxvxcv', '2015-05-13 14:36:57', '2015-05-13 09:49:55'),
(22, 'Delhi', '2015-05-19', '2015-12-01', '9877', 1, 448, 'fdgfdgfd', '2015-05-13 14:33:20', '2015-05-13 09:56:39'),
(21, 'Delhi', '2015-09-07', '2015-09-01', '789654', 1, 449, 'No', '2015-05-12 14:02:53', '2015-05-12 10:22:07');

-- --------------------------------------------------------

--
-- Table structure for table `book_hotel`
--

CREATE TABLE IF NOT EXISTS `book_hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stayplace` varchar(300) NOT NULL,
  `checkin_date` varchar(20) NOT NULL,
  `checkout_date` varchar(20) NOT NULL,
  `ticket_number` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `instructions` varchar(500) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `book_hotel`
--

INSERT INTO `book_hotel` (`id`, `stayplace`, `checkin_date`, `checkout_date`, `ticket_number`, `status`, `user_id`, `instructions`, `created_date`, `modified_date`) VALUES
(53, 'Mumbai', '2015-05-12', '2015-05-19', '4578', 1, 448, 'fggdf', '2015-05-13 14:33:20', '2015-05-13 09:56:39'),
(54, 'Kolkata', '2015-05-19', '2015-05-22', '987', 1, 448, 'dxcxzcvzxczx', '2015-05-13 14:34:52', '2015-05-13 09:05:37'),
(51, 'Mumbai', '2015-05-13', '2015-05-28', '4789', 1, 448, 'dfasdfadfsf', '2015-05-11 20:33:43', '2015-05-11 17:03:00'),
(52, 'Mumbai', '2015-05-12', '2015-05-22', '4578', 1, 448, 'dxcxzcvzxczx', '2015-05-13 14:07:45', '2015-05-13 08:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `branding_template`
--

CREATE TABLE IF NOT EXISTS `branding_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(200) NOT NULL,
  `Resize` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `branding_template`
--

INSERT INTO `branding_template` (`id`, `img`, `Resize`, `status`, `created_date`, `modified_date`) VALUES
(1, 'Carnival_Group_logo_bigfile.jpg', 'Carnival_Group_logo_bigfile_thumb.jpg', 1, '2015-02-18 16:51:03', '2015-02-18 11:21:03'),
(11, 'abc.jpg', 'abc_thumb.jpg', 1, '2015-03-12 19:39:17', '2015-03-12 14:09:17'),
(12, 'aopl_entertainment.jpg', 'aopl_entertainment_thumb.jpg', 1, '2015-03-12 19:43:37', '2015-03-12 14:13:37'),
(13, 'carnival_cinemas.jpg', 'carnival_cinemas_thumb.jpg', 1, '2015-03-12 19:47:04', '2015-03-12 14:17:04'),
(14, 'carnival_court.jpg', 'carnival_court_thumb.jpg', 1, '2015-03-12 19:47:51', '2015-03-12 14:17:51'),
(15, 'carnival_films.jpg', 'carnival_films_thumb.jpg', 1, '2015-03-12 19:48:17', '2015-03-12 14:18:17'),
(16, 'carnival_media.jpg', 'carnival_media_thumb.jpg', 1, '2015-03-12 19:48:48', '2015-03-12 14:18:48'),
(17, 'dbell.jpg', 'dbell_thumb.jpg', 1, '2015-03-12 19:49:06', '2015-03-12 14:19:06'),
(18, 'aopl_oils.png', 'aopl_oils_thumb.png', 1, '2015-03-12 20:39:21', '2015-03-12 15:09:21'),
(19, 'aopl._.jpg', 'aopl.__thumb.jpg', 1, '2015-03-12 20:40:45', '2015-03-12 15:10:45'),
(20, 'gbc.jpg', 'gbc_thumb.jpg', 1, '2015-03-12 20:42:17', '2015-03-12 15:12:17'),
(21, 'cat.jpg', 'cat_thumb.jpg', 1, '2015-03-12 20:43:00', '2015-03-12 15:13:00'),
(24, 'abc_pvt_ltd.jpg', 'abc_pvt_ltd_thumb.jpg', 1, '2015-03-13 14:51:05', '2015-03-13 09:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `Case_studies`
--

CREATE TABLE IF NOT EXISTS `Case_studies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `sub_category` varchar(300) NOT NULL,
  `author` varchar(200) NOT NULL,
  `publisher` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `dop` date NOT NULL,
  `code` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `borrow_status` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Case_studies`
--

INSERT INTO `Case_studies` (`id`, `name`, `sub_category`, `author`, `publisher`, `price`, `dop`, `code`, `status`, `borrow_status`, `created_date`, `modified_date`) VALUES
(1, 'EFFECTIVE PEOPLE', 'TRAINING', 'XYZ', 'gfhfg', '547', '2014-11-10', '5656', 0, '', '2015-02-27 18:37:30', '2015-02-27 13:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `created_date`, `modified_date`) VALUES
(29, 'dvd', 1, '2015-02-27 16:10:17', '2015-02-27 10:40:17'),
(28, 'Audio_cd', 1, '2015-02-27 16:10:11', '2015-02-27 10:40:11'),
(27, 'Case_studies', 1, '2015-02-27 16:10:04', '2015-02-27 10:40:04'),
(26, 'Book', 1, '2015-02-27 16:09:56', '2015-02-27 10:39:56'),
(39, 'Articles', 1, '2015-04-15 19:51:10', '2015-04-15 14:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `from`, `to`, `message`, `sent`, `recd`) VALUES
(1, 'javed', 'demo_1', 'hii', '2015-05-04 15:56:29', 1),
(2, 'demo_1', 'PN', 'hello', '2015-05-06 11:08:35', 1),
(3, 'demo_1', 'demo_2', 'fzgf', '2015-05-06 19:08:44', 1),
(4, 'demo_1', 'demo_2', 'zdfsg', '2015-05-06 19:08:44', 1),
(5, 'demo_1', 'demo_2', 'zfg', '2015-05-06 19:08:45', 1),
(6, 'demo_1', 'demo_2', 'zfdg', '2015-05-06 19:08:46', 1),
(7, 'demo_1', 'demo_2', 'zfdsgf', '2015-05-06 19:08:46', 1),
(8, 'demo_1', 'javed', 'hii', '2015-05-08 15:29:04', 1),
(9, 'demo_1', 'demo_2', 'hii', '2015-05-08 15:29:49', 1),
(10, 'demo_1', 'demo_2', 'hii', '2015-05-08 15:33:55', 1),
(11, 'demo_2', 'demo_1', 'sdasd', '2015-05-08 15:48:42', 1),
(12, 'demo_1', 'PN', 'hmj', '2015-05-08 18:48:05', 1),
(13, 'demo_1', 'demo_2', 'sda', '2015-05-11 10:27:51', 1),
(14, 'demo_1', 'Mayank Ranka', 'hi', '2015-05-14 17:52:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dvd`
--

CREATE TABLE IF NOT EXISTS `dvd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `sub_category` varchar(300) NOT NULL,
  `author` varchar(200) NOT NULL,
  `publisher` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `dop` date NOT NULL,
  `code` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `borrow_status` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `elearning_articles`
--

CREATE TABLE IF NOT EXISTS `elearning_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `desc` text NOT NULL,
  `img` varchar(200) NOT NULL,
  `Resize` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `elearning_articles`
--

INSERT INTO `elearning_articles` (`id`, `title`, `categoryid`, `desc`, `img`, `Resize`, `status`, `created_date`, `modified_date`) VALUES
(1, 'Article1', 1, '<ol>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px">Habitual late coming</span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px">Misuse / Unauthorized use of Office Equipment /Facilities</span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px">Willful damage/vandalizing property</span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px">Consuming Alcohol&nbsp; / Drugs on duty and/or in company premises</span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px">Tampering / Falsification of Documents or Information</span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px">Rude / Violent /Aggressive behavior towards colleagues and/or customers</span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px">Dress / attire in violation of company policy</span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px">Plagiarizing / theft / misuse of intellectual property</span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px">Refusal to allow security personnel to inspect one&rsquo;s work space, baggage or belongingness at the security gate.</span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px">Not swiping / punching biometric attendance system.</span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px">Making negative statements about the company , one&rsquo;s superiors or management in private or public.</span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px">Casual attitude at workplace causing undue delay, cost escalation or loss of productivity.</span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px">Misplacing / losing company&rsquo;s properties due to carelessness.</span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px">Involvement in any proven criminal charges by the polices.</span></span></li>\n</ol>\n', '', '', 1, '2015-03-26', '2015-04-09'),
(2, 'a1', 1, '<p><strong>International marketing</strong><span style="color:rgb(34, 34, 34); font-family:arial,sans-serif; font-size:16px">&nbsp;is simply the application of&nbsp;</span><strong>marketing</strong><span style="color:rgb(34, 34, 34); font-family:arial,sans-serif; font-size:16px">&nbsp;principles to more than one country. However, there is a crossover between what is commonly expressed as</span><strong>international marketing</strong><span style="color:rgb(34, 34, 34); font-family:arial,sans-serif; font-size:16px">&nbsp;and global&nbsp;</span><strong>marketing</strong><span style="color:rgb(34, 34, 34); font-family:arial,sans-serif; font-size:16px">, which is a similar term.</span></p>\n\n<p><span style="color:rgb(84, 84, 84); font-family:arial,sans-serif; font-size:small">Also, the threat of competition from companies in countries such as India, China, Malaysia, and Brazil is on the rise, as their own domestic markets are opening up to foreign competition, stimulating greater awareness of&nbsp;</span><strong>international market</strong><span style="color:rgb(84, 84, 84); font-family:arial,sans-serif; font-size:small">&nbsp;opportunities and of the need to be&nbsp;</span><strong>internationally</strong><span style="color:rgb(84, 84, 84); font-family:arial,sans-serif; font-size:small">&nbsp;competitive.</span></p>\n', '', '', 0, '2015-04-06', '2015-04-06'),
(3, 'International Marketing', 11, '<p><strong>International marketing</strong> is simply the application of <strong>marketing</strong> principles to more than one country. However, there is a crossover between what is commonly expressed as <strong>international marketing</strong> and global <strong>marketing</strong>, which is a similar term.</p>\n\n<p><strong>International marketing</strong> is simply the application of marketing principles to more than one country. However, there is a crossover between what is commonly expressed as <u>international marketing</u> and <u>global marketing</u>, which is a similar term. For the purposes of this lesson on international marketing and those that follow it, international marketing and global marketing are interchangeable.</p>\n', '', '', 1, '2015-04-13', '2015-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `elearning_category`
--

CREATE TABLE IF NOT EXISTS `elearning_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `elearning_category`
--

INSERT INTO `elearning_category` (`id`, `name`, `status`, `created_date`, `modified_date`) VALUES
(1, 'HR', 1, '2015-03-25 21:47:11', '2015-03-25 16:17:11'),
(2, 'FINANCE & ACCOUNTS', 1, '2015-03-25 21:47:31', '2015-03-25 16:17:31'),
(3, 'SALES & MARKETING', 1, '2015-03-25 21:47:55', '2015-03-25 16:17:55'),
(4, 'FOOD & BEVERAGES', 1, '2015-03-25 21:48:09', '2015-03-25 16:18:09'),
(5, 'TRADING', 1, '2015-03-25 21:48:20', '2015-03-25 16:18:20'),
(6, 'FILMS & MULTIPLEX', 1, '2015-03-25 21:48:33', '2015-04-10 16:42:26'),
(7, 'TRAVEL & TOURISM', 1, '2015-03-25 21:48:56', '2015-03-25 16:18:56'),
(8, 'INFOTECH', 1, '2015-03-25 21:49:12', '2015-03-28 09:18:44'),
(9, 'MATERIALS MANAGEMENT', 1, '2015-03-25 21:49:26', '2015-03-25 16:19:26'),
(10, 'PURCHASE', 1, '2015-03-25 21:49:41', '2015-03-25 16:19:41'),
(11, 'INTERNATIONAL MARKETING', 1, '2015-03-25 21:49:53', '2015-03-25 16:19:53'),
(12, 'SOFT SKILLS', 1, '2015-03-25 21:50:10', '2015-03-25 16:20:10'),
(13, 'LEADERSHIP & MANAGEMENT', 1, '2015-03-25 21:50:21', '2015-03-25 16:20:21'),
(14, 'OIL & ALLIED INDUSTRIES', 1, '2015-03-25 21:50:32', '2015-03-25 16:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `elearning_files`
--

CREATE TABLE IF NOT EXISTS `elearning_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `sub_category` varchar(300) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `copyrights` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `elearning_files`
--

INSERT INTO `elearning_files` (`id`, `title`, `categoryid`, `sub_category`, `file_name`, `copyrights`, `status`, `created_date`, `modified_date`) VALUES
(5, 'PPT', 2, 'MUST STUDY', 'INTRANET_NEXUS_PHASE1_MODEL_LAUNCH_15_JAN2015.pptx', 0, 1, '2015-03-27 14:16:37', '0000-00-00 00:00:00'),
(6, 'MANAGEMENT BASICS', 1, 'MUST STUDY', 'management-basics.pdf', 0, 1, '2015-03-28 19:06:07', '2015-05-08 13:01:45'),
(9, 'Demo1', 1, 'ARTICLES & SLIDES', 'ABOUT_US_CORRECTION_10_FEB2015.pptx', 0, 1, '2015-04-14 16:36:42', '2015-04-29 08:48:57');

-- --------------------------------------------------------

--
-- Table structure for table `elearning_quiz`
--

CREATE TABLE IF NOT EXISTS `elearning_quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryid` int(11) NOT NULL,
  `sub_category` varchar(300) NOT NULL,
  `question` text NOT NULL,
  `answer1` varchar(70) NOT NULL,
  `answer2` varchar(70) NOT NULL,
  `answer3` varchar(70) NOT NULL,
  `answer4` varchar(70) NOT NULL,
  `answer` varchar(70) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `elearning_quiz`
--

INSERT INTO `elearning_quiz` (`id`, `categoryid`, `sub_category`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `answer`, `status`, `created_date`, `modified_date`) VALUES
(8, 1, 'policies', 'what is quiz?', 'a', 'b', 'c', 'd', '4', 0, '2015-04-20', '2015-04-20 10:20:22'),
(7, 1, 'policies', 'Sachin Tendulkar belongs to', 'Football', 'Hockey', 'Cricket', 'Tennis', '3', 1, '2015-04-01', '2015-04-06 17:03:18'),
(3, 1, 'policies', 'Who is hr??', 'rakesh', 'ashok', 'sagar', 'ketan', '3', 1, '2015-03-30', '2015-03-30 15:32:07'),
(4, 1, 'policies', 'Who is Manager?', 'ramesh', 'mukesh', 'rajesh', 'javed', '4', 1, '2015-03-30', '2015-04-06 17:03:29'),
(5, 1, 'policies', 'What is Policiy of Timing?', 'a1', 'a2', 'a3', 'a4', '3', 1, '2015-03-30', '2015-03-30 10:23:47');

-- --------------------------------------------------------

--
-- Table structure for table `elearning_spenttime`
--

CREATE TABLE IF NOT EXISTS `elearning_spenttime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `h` int(11) NOT NULL,
  `i` int(11) NOT NULL,
  `s` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `login_date` date NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `elearning_spenttime`
--

INSERT INTO `elearning_spenttime` (`id`, `user_id`, `h`, `i`, `s`, `status`, `login_date`, `modified_date`) VALUES
(37, 448, 0, 25, 42, 0, '2015-04-28', '2015-04-28 05:02:44'),
(20, 449, 0, 1, 27, 1, '2015-04-07', '2015-04-07 12:09:20'),
(27, 448, 2, 46, 14, 1, '2015-04-13', '2015-04-13 04:47:40'),
(22, 449, 2, 23, 16, 1, '2015-04-09', '2015-04-09 05:27:22'),
(39, 449, 0, 52, 53, 1, '2015-04-28', '2015-04-28 11:13:07'),
(24, 449, 5, 40, 3, 1, '2015-04-10', '2015-04-10 07:59:45'),
(25, 448, 4, 25, 28, 1, '2015-04-10', '2015-04-10 10:46:47'),
(36, 449, 0, 0, 16, 1, '2015-04-27', '2015-04-27 07:56:10'),
(35, 449, 0, 4, 45, 1, '2015-04-23', '2015-04-23 05:19:23'),
(30, 448, 4, 11, 6, 1, '2015-04-14', '2015-04-14 12:03:47'),
(31, 0, 0, 10, 56, 0, '2015-04-15', '2015-04-15 03:33:11'),
(38, 0, 0, 9, 40, 0, '2015-04-28', '2015-04-28 10:44:25'),
(33, 449, 0, 58, 10, 1, '2015-04-16', '2015-04-16 07:07:27'),
(34, 449, 0, 7, 49, 1, '2015-04-20', '2015-04-20 05:16:52'),
(40, 449, 6, 25, 46, 1, '2015-04-29', '2015-04-29 05:23:19'),
(41, 448, 4, 38, 46, 0, '2015-04-29', '2015-04-29 09:43:14'),
(42, 720, 1, 52, 38, 0, '2015-04-29', '2015-04-29 09:48:38'),
(43, 449, 0, 54, 53, 1, '2015-05-06', '2015-05-06 06:23:43'),
(44, 328, 1, 1, 34, 1, '2015-05-06', '2015-05-06 08:01:32'),
(45, 449, 1, 29, 49, 1, '2015-05-08', '2015-05-08 07:31:20'),
(46, 448, 3, 1, 3, 0, '2015-05-11', '2015-05-11 09:58:48'),
(47, 449, 0, 3, 27, 1, '2015-05-11', '2015-05-11 10:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `elearning_subcategory`
--

CREATE TABLE IF NOT EXISTS `elearning_subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(200) NOT NULL,
  `sub_category` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `elearning_summaries`
--

CREATE TABLE IF NOT EXISTS `elearning_summaries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `sub_category` varchar(300) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `elearning_summaries`
--

INSERT INTO `elearning_summaries` (`id`, `title`, `categoryid`, `sub_category`, `description`, `status`, `created_date`, `modified_date`) VALUES
(1, 'Book1', 1, 'BOOK SUMMARY', '<p><span style="color:#00FFFF"><span style="font-size:16px"><span style="font-family:lucida sans unicode,lucida grande,sans-serif">A book is a set of written, printed, illustrated, or blank sheets, made of ink, paper, parchment, or other materials, usually fastened together to hinge at one side. A single sheet within a book is called a leaf, and each side of a leaf is called a page. A set of text-filled or illustrated pages produced in electronic format is known as an electronic book, or e-book. Books may also refer to works of literature, or a main division of such a work. In library and information science, a book is called a monograph, to distinguish it from serial periodicals such as magazines, journals or newspapers. The body of all written works including books is literature. In novels and sometimes other types of books (for example, biographies), a book may be divided into several large sections, also called books (Book 1, Book 2, Book 3, and so on). An avid reader of books is a', 1, '2015-03-27', '2015-05-11 10:43:03'),
(2, 'TRAVEL1', 7, 'BOOK SUMMARY', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. N', 0, '2015-03-28', '2015-03-28 14:46:11'),
(3, 'a1', 11, 'MUST STUDY', '<p><em><span style="font-family:comic sans ms,cursive">Also, the threat of competition from companies in countries such as India, China, Malaysia, and Brazil is on the rise, as their own domestic markets are opening up to foreign competition, stimulating greater awareness of international market opportunities and of the need to be internationally competitive.</span></em></p>\n', 1, '2015-04-03', '2015-04-15 10:36:26'),
(4, 'Book', 1, 'BOOK SUMMARY', '<p><span style="color:#FFFF00"><span style="font-family:comic sans ms,cursive"><span style="font-size:12px"><strong>A book is a set of written, printed, illustrated, or blank sheets, made of ink, paper, parchment, or other materials, usually fastened together to hinge at one side. A single sheet within a book is called a leaf, and each side of a leaf is called a page. A set of text-filled or illustrated pages produced in electronic format is known as an electronic book, or e-book.</strong></span></span></span></p>\n\n<p><span style="color:#FFFF00"><span style="font-family:comic sans ms,cursive"><span style="font-size:12px"><strong>Books may also refer to works of literature, or a main division of such a work. In library and information science, a book is called a monograph, to distinguish it from serial periodicals such as magazines, journals or newspapers. The body of all written works including books is literature.&nbsp;</strong></span></span></span></p>\n', 1, '2015-04-09', '2015-05-11 10:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `elearning_videos`
--

CREATE TABLE IF NOT EXISTS `elearning_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `sub_category` varchar(300) NOT NULL,
  `type` varchar(20) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `code` varchar(500) NOT NULL,
  `copyrights` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `elearning_videos`
--

INSERT INTO `elearning_videos` (`id`, `title`, `categoryid`, `sub_category`, `type`, `file_name`, `code`, `copyrights`, `status`, `created_date`, `modified_date`) VALUES
(9, 'Tester', 1, 'MUST STUDY', 'Embed', '', 'https://www.youtube.com/v/XGSy3_Czz8k', 0, 1, '2015-03-30 17:11:08', '2015-05-06 09:12:39'),
(11, 'demo', 1, 'VIDEOS', 'Upload', 'test_final.mp4', '', 0, 1, '2015-04-09 21:25:07', '0000-00-00 00:00:00'),
(15, 'leadership', 13, 'VIDEOS', 'Embed', 'A_Must_See_Motivational_Video!.mp4', 'https://www.youtube.com/v/fh1uff62SO8', 1, 1, '2015-04-10 19:06:56', '2015-04-14 13:39:16'),
(17, 'Dtr', 1, 'VIDEOS', 'Embed', '', 'https://www.youtube.com/v/KtPv7IEhWRA', 1, 1, '2015-04-14 15:08:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(300) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `department` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `company` varchar(40) NOT NULL,
  `floor` varchar(20) NOT NULL,
  `extn` int(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `location` varchar(11) NOT NULL,
  `joining_date` date NOT NULL,
  `type` varchar(11) NOT NULL,
  `tl_id` int(11) NOT NULL,
  `authority_status` int(1) NOT NULL,
  `img` varchar(200) NOT NULL,
  `Resize` varchar(300) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `online` int(5) NOT NULL,
  `address` varchar(500) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=730 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_id`, `name`, `username`, `email`, `dob`, `department`, `designation`, `company`, `floor`, `extn`, `password`, `location`, `joining_date`, `type`, `tl_id`, `authority_status`, `img`, `Resize`, `contact`, `online`, `address`, `token`, `status`, `created_date`, `modified_date`) VALUES
(434, '434', 'Prakash Patil', 'prakash.patil', 'prakash.patil@carnivalcinemas.in', '1982-03-01', 'IT', 'IT Executive', 'Carnival Films Pvt. Ltd.', '8th Floor', 354, '73803249c6667c5af2d51c0dedfae487', 'Mumbai', '2015-04-25', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-05-07 14:00:54'),
(435, '435', 'Prem Tewari', 'prem.tewari', 'prem.tewari@carnivalcinemas.in', '1980-05-03', 'IT', 'Group Head- Technology & VAS', 'Carnival Films Pvt. Ltd.', '8th Floor', 306, '', 'Mumbai', '2015-05-09', 'Existing', -1, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-05-09 15:16:44'),
(56, '', 'Geemon Varghese', '', '', '', 'Legal', '', 'Carnival Films Pvt Ltd', 'Ist Floor', 223, '', 'Kerala', '2015-04-22', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 0, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(389, '389', 'Rashi Shah', 'rashi.shah', 'rashi.shah@aoplcinema.com', '1988-05-11', 'HRD', 'Sr. Executive- Content & Marketing', 'AOPL  Entertainment Pvt. Ltd. ', '8th Floor', 129, '', 'Mumbai', '2015-05-09', 'Existing', 7, 0, 'form_field-1680x1050.jpg', 'form_field-1680x1050_thumb.jpg', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-05-11 16:30:59'),
(388, '388', 'R.Kalpana', 'R.Kalpana', 'r.kalpana@aoploverseas.com', '1975-05-25', 'HRD', 'Executive- Group HR & Admin', 'Advantage Overseas Pvt. Ltd.', '8th Floor', 163, '', 'Mumbai', '2015-05-09', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-05-09 15:17:23'),
(387, '', 'Prakash Pendurkar', 'prakash.pendurkar', 'prakash.pendurkar@carnivalcinemas.in', '8-Aug-74', 'Operations ', 'Operations-Manager-Inventory', 'Carnival Films Pvt. Ltd.', '8th Floor', 318, '', 'Mumbai', '2015-04-24', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 0, '0000-00-00 00:00:00', '2015-03-16 19:49:00'),
(59, '', 'Linu P Raju', '', '', '', 'Operations', '', 'Carnival Films Pvt Ltd', 'Ist Floor', 220, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(60, '', 'Reshmi Nair', '', '', '', 'Admin', '', 'Global Business Conexxtions PVT LTD', 'Ist Floor', 229, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(61, '', 'Manu Shankar G Menon', '', '', '', 'Admin', '', 'Global Business Conexxtions PVT LTD', 'Ist Floor', 229, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(62, '', 'Akhil Antu', '', '', '', 'Admin', '', 'Carnival Films Pvt Ltd', 'Ist Floor', 229, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(64, '', 'Bibin Mohan', '', '', '', 'Admin', '', 'Carnival Films Pvt Ltd', 'Ist Floor', 229, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(63, '', 'Suresh Kumar', '', '', '', 'Admin', '', 'Carnival Films Pvt Ltd', 'Ist Floor', 229, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(65, '', 'Board Room', '', '', '', 'Admin', '', 'Carnival Films Pvt Ltd', 'Ist Floor', 235, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(66, '', 'Pantry', '', '', '', 'Admin', '', 'Carnival Films Pvt Ltd', 'Ground Floor', 236, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(323, '', 'A.C. Dinesh ', 'Dinesh.A.C.', 'acdinesh@aoploverseas.com', '8-Apr-70', 'Group Finance & Accounts', 'Director & CFO – Carnival Group', ' Group CFO', '11th Floor', 122, '', 'Mumbai', '0000-00-00', 'Existing', 17, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-20 21:14:17'),
(324, '', 'Arun Tyagi', '', 'arun@abcentertainment.co.in', '27-Sep-75', 'Management Committee', 'Director', 'ABC Entertainment Pvt. Ltd.', '4th Floor', 130, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:03:52'),
(325, '', 'Gagan Sharma ', '', 'gagan.sharma@carnivalmedia.in', '23-Apr-80', 'Management Committee', 'Director', 'ABC Entertainment Pvt. Ltd.', '5th Floor', 102, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:11:42'),
(326, '', 'Jijo John ', '', 'jijo.john@aoploverseas.com', '22-Jun-73', 'Management Committee', 'Director AOPL', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 150, '', 'Mumbai', '0000-00-00', 'Existing', 7, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:12:21'),
(327, '', 'Maneesh Singh ', '', 'maneesh.singh@aoploverseas.com', '28-Dec-66', 'Management Committee', 'Group MD & CEO -  AOPL ', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 151, '', 'Mumbai', '0000-00-00', 'Existing', 7, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:12:54'),
(328, '789', 'Prasanth Narayanan', 'PN', 'prasanth.narayanan@aoplcinema.com', '1996-05-11', 'Management Committee', 'Director & CHRO  - Carnival Group  Director  & CEO – Carnival Motion Pictures', 'Group Head- HRD & Admin', '8th Floor', 108, '27a8d7656659415782b730af50f99aa3', 'Mumbai', '0000-00-00', 'Existing', -1, 0, 'Prasanth_intranet_9feb15.jpg', 'Prasanth_intranet_9feb15_thumb.jpg', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-05-11 16:28:11'),
(329, '', 'Vaishali Sarwankar   ', '', 'vaishali.sarwankar@atlanticgroup.com.sg', '12-Jul-78', 'Management Committee', 'Business Head - AOPL', 'Group Head- HRD & Admin', '11th Floor', 123, '', 'Mumbai', '0000-00-00', 'Existing', 7, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:15:09'),
(330, '', 'Aarti Rathi', '', 'arti.rath@aoploverseas.com', '1996-03-05', 'Accounts', 'Executive-Accounts', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 169, '', 'Mumbai', '0000-00-00', 'Existing', 7, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:15:37'),
(331, '', 'Abhishek Vyas ', '', 'abhishek.vyas@aoploverseas.com', '16-Oct-89', 'Accounts', 'Asst. Manager,Finance', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 184, '', 'Mumbai', '0000-00-00', 'Existing', 7, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:18:50'),
(332, '', 'Alok Kushwaha ', '', 'alok.kushwaha@aoploverseas.com ', '15-Apr-68', 'Accounts', 'General Manager-Finance & Accounts  ', 'Advantage Overseas Pvt. Ltd.', '8th Floor', 302, '', 'Mumbai', '0000-00-00', 'Existing', 7, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:19:44'),
(333, '', 'Amit Minare', '', 'amit.minare@gbcindia.in', '8-Jul-78', 'Accounts', 'Executive-Accounts', 'Global Business Conexxtions Pvt.Ltd. ', '11th Floor', 110, '', 'Mumbai', '0000-00-00', 'Existing', 17, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:23:17'),
(334, '', 'Amruta Thakur ', '', 'amruta.thakur@aoploverseas.com', '6-Jan-90', 'TSF', 'Executive-TFS', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 164, '', 'Mumbai', '0000-00-00', 'Existing', 7, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:27:30'),
(335, '', 'Ankesh  Mehra', '', 'ankesh.mehra@aoploverseas.com', '20-Jan-83', 'TSF', 'Manager-Forex', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 178, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:27:52'),
(336, '', 'Anil Bhansali', '', 'anil.bhansali@AoplOverseas.com', '31-Mar-64', 'TSF', 'AGM- Treasury & Trade Operations', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 191, '', 'Mumbai', '0000-00-00', 'Existing', 7, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:28:08'),
(337, '10045', 'Dinesh Walvalkar', 'dinesh', 'dinesh.walavalkar@AoplOverseas.com', '1993-05-16', 'TSF', 'Trainee - TFS', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 137, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-05-12 22:06:16'),
(338, '', 'Dilip Agarwal ', '', 'dilip.agarwal@aoploverseas.com', '12-May-63', 'Physical Trade', 'Asst. Vice President- Agri Division', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 153, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:29:52'),
(339, '', 'Disha Parasrampuria', '', 'disha.puria@aoploverseas.com', '25-Sep-91', 'Projects', 'Assistant Manager-Projects', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 146, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:36:25'),
(340, '', 'Jamir Shaikh', '', 'jamir.shaikh@aoploverseas.com', '20-May-86', 'Physical Trade', 'Executive- Operations & Logistics', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 142, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:36:54'),
(341, '', 'Jay Golam', '', 'jay.golam@AoplOverseas.com', '30-Nov-92', 'Accounts', 'Accounts Executive', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 140, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:37:30'),
(342, '', 'Jyotika Kapoor', '', 'jyotika.kapoor@aoploverseas.com', '24-Mar-87', 'Treasury', 'Manager- Treasury Operations', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 154, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:37:58'),
(343, '', 'Jyoti Chikhalkar', 'Jyoti', 'jyoti.chikhalkar@gbcindia.in', '12-Jul-94', 'Accounts', 'Accounts Assistant', 'Global Business Conexxtions Pvt.Ltd. ', '11th Floor', 124, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 18:53:42'),
(344, '', 'Jyoti Singh', '', 'jyoti.singh@aoploverseas.com', '8-Jun-80', 'Physical Trade', 'Executive-Operations', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 174, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:38:58'),
(345, '', 'Macy Almeida', '', 'macy.almeida@atlanticgroup.com.sg', '16-Aug-87', 'TSF', 'Assistant- Trade Execution and Coordination ', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 105, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:39:26'),
(346, '', 'Murali Krishna', '', 'murali.krishna@aoploverseas.com', '21-Feb-83', 'TSF', 'AGM- Trade Operations', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 148, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:40:02'),
(348, '', 'Ranjeet Yadav', '', 'ranjeet.yadav@aoplcinema.com', '10-Apr-90', 'Accounts', 'Executive-Accounts', 'AOPL  Entertainment Pvt Ltd ', '11th Floor', 109, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:41:04'),
(349, '', 'Ravindra Maski', '', 'ravindra.maski@atlanticgroup.com.sg', '26-Mar-83', 'TSF', 'Manager –  Trade  Finance', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 115, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:41:42'),
(350, '', 'Sanjeev Dubey', '', 'sanjeev.dubey@gbcindia.in', '9-Jan-76', 'Accounts', 'Assistant General Manager -Finance & Accounts', 'Global Business Conexxtions Pvt.Ltd. ', '11th Floor', 107, '', 'Mumbai', '0000-00-00', 'Existing', 7, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:55:02'),
(351, '', 'Sanjiv Singh', '', 'sanjiv.singh@aoploverseas.com', '9-Apr-87', 'Accounts', 'Manager-Finance', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 175, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:42:56'),
(352, '', 'Shibu Abraham', '', 'shibu.abraham@aoploverseas.com', '2-Dec-68', 'TSF', 'AGM- Trade Operations', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 127, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 15:55:38'),
(353, '', 'Shilpa Parab', 'shilpa', 'shilpa.parab@gbcindia.in', '11-Sep-77', 'TSF', 'Senior Executive', 'Global Business Conexxtions Pvt.Ltd. ', '11th Floor', 114, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 18:52:25'),
(354, '', 'Shruti Joijode', '', 'shruti.joijode@atlanticgroup.com.sg', '6-Oct-87', 'TSF', 'Executive – Execution and Co-ordination ', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 106, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 16:05:00'),
(355, '', 'Snehal Deshmukh', '', 'snehal.deshmukh@AoplOverseas.com', '22-Dec-86', 'TSF', 'Trainee - TFS', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 139, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 16:05:54'),
(356, '', 'Srirama Chinchalkar', '', 'sri.chinchalkar@aoploverseas.com', '27-Oct-48', 'Physical Trade', 'Asst. Mgr, Agri Division', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 171, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 16:06:51'),
(357, '', 'Vaibhav Parmar', '', 'vaibhav.parmar@AoplOverseas.com', '', 'Accounts', 'Accounts Executive', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 138, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:51:47'),
(358, '', 'Vandana Kotian', 'Vandana', 'vandana.kotian@aoploverseas.com', '30-Jan-88', 'Physical Trade', 'Executive-Physical Trade', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 170, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 18:58:02'),
(359, '', 'Vijith Ravindran', 'Vijith', 'vijith.ravindran@AoplOverseas.com', '27-Aug-86', 'Projects', 'Assistant Manager-Projects', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 186, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 18:58:55'),
(360, '', 'V.V. Sunil', 'Sunil', 'sunil.vv@aoploverseas.com', '28-May-68', 'Physical Trade', 'Manager-Operations ', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 173, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 18:59:54'),
(361, '', 'P.V. Sunil', 'Sunil', 'sunil.vv@aoploverseas.com', '23-01', 'CEO', 'Director & CEO – Cranival  Films ', 'Carnival Films Pvt. Ltd.', '8th Floor', 305, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:00:29'),
(362, '', 'Adarsh Thettayil', 'Adarsh', 'Adarsh.Thettayil@gbcmegamotels.com', '21-Aug-85', 'HRD', 'Manager-  Group HR & Admin', 'GBC Mega Motels Pvt. Ltd.', '8th Floor', 179, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:02:20'),
(363, '', 'Amrita Ganguly', 'Amrita', 'amrita.ganguly@carnivalcinemas.in', '3-Mar-85', 'Sales & Marketing ', 'Senior Manager - Sales & Marketing', 'Carnival Films Pvt. Ltd.', '8th Floor', 332, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:18:06'),
(364, '', 'Alok Kushwaha ', 'Alok', 'alok.kushwaha@aoploverseas.com ', '15-Apr-68', 'Accounts  ', 'General Manager-Finance & Accounts  ', 'Advantage Overseas Pvt. Ltd.', '8th Floor', 302, '', 'Mumbai', '0000-00-00', 'Existing', 7, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:18:45'),
(365, '', 'Ashish Saxena', '', 'alok.kushwaha@aoploverseas.com ', '', 'Operations', 'COO', 'Advantage Overseas Pvt. Ltd.', '8th Floor', 304, '', 'Mumbai', '0000-00-00', 'Existing', 7, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:51:47'),
(366, '', 'Aleem Velaskar', 'Aleem', 'aleem.velaskar@carnivalcinemas.in', '22-Nov-77', 'Projects', 'Senior Manager- Projects', 'Carnival Films Pvt. Ltd.', '8th Floor', 331, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:19:24'),
(367, '', 'Ashok Kavthankar', 'Ashok', 'ashok.kavthankar@carnivalcinemas.in', '5-May-78', 'Operations', 'OPERATIONS-ASSISTANT MANAGER-Programming', 'Carnival Films Pvt. Ltd.', '8th Floor', 342, 'bb2d1a99fc70551dab323d042deb6843', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-04-13 15:37:05'),
(368, '', 'Chaitali Gurav', 'Chaitali', 'chaitali.gurav@carnivalcinemas.in', '30-Jul-91', 'HRD', 'HR-Executive', 'Carnival Films Pvt. Ltd.', '8th Floor', 368, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:20:50'),
(369, '', 'Girish Nair', 'Girish', 'girish.nair@carnivalcinemas.in', '24-Jun-73', 'Accounts  ', 'Accounts-Assistant General Manager', 'Carnival Films Pvt. Ltd.', '8th Floor', 316, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:21:32'),
(370, '', 'Harshad Parmar', 'Harshad', 'harshad.parmar@carnivalcinemas.in', '14-Apr-74', 'Programming ', 'Senior Manager- Programming', 'Carnival Films Pvt. Ltd.', '8th Floor', 339, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:22:30'),
(371, '', 'Jayesh Dave', 'Jayesh', 'jayesh.dave@carnivalcinemas.in', '12-Dec-85', 'Accounts  ', 'Accounts Executive', 'Carnival Films Pvt. Ltd.', '8th Floor', 371, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:23:07'),
(372, '', 'Jitendra Dhanawade', 'Jitendra', 'jitendra.dhanawade@carnivalcinemas.in', '20-Feb-81', 'Projects', 'Project-Manager', 'Carnival Films Pvt. Ltd.', '8th Floor', 330, '', 'Mumbai', '0000-00-00', 'Existing', 7, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:23:54'),
(373, '', 'kunal', 'Kunal Sawhney', 'kunal.s@carnivalcinemas.in', '29-Dec-82', 'Operations', 'Associate Vice President- Multiplex Operations', 'Carnival Films Pvt. Ltd.', '8th Floor', 308, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-05-06 22:04:58'),
(374, '', 'Lalit Bajaj', 'Lalit Bajaj', 'lalit.bajaj@carnivalcinemas.in', '28-Feb-82', 'Operations', 'General Manager- Food & Beverages', 'Carnival Films Pvt. Ltd.', '8th Floor', 311, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:25:36'),
(375, '', 'Mahesh Bhonde', 'Mahesh Bhonde', 'mahesh.bhonde@carnivalcinemas.in    ', '23-Oct-89', 'Creative ', 'Senior Creative Designer', 'Carnival Films Pvt. Ltd.', '8th Floor', 362, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:26:48'),
(376, '', 'Mangesh Gothankar', 'Mangesh Gothankar', 'mangesh.gothankar@carnivalcinemas.in', '10-Nov-65', 'Projects', 'Project-Assistant Manager', 'Carnival Films Pvt. Ltd.', '8th Floor', 344, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:27:29'),
(377, '', 'Mayank Garg', 'Mayank Garg', 'mayank.garg@aoploverseas.com', '9-Mar-80', 'Admin', 'Manager-HR &Admin', 'Advantage Overseas Pvt. Ltd.', '8th Floor', 144, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:29:40'),
(378, '', 'Monita Nair', 'Monita Nair', 'monita.nair@carnivalcinemas.in', '20-Apr-81', 'Business Coordination', 'Business Coordinator', 'Carnival Films Pvt. Ltd.', '8th Floor', 312, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:30:36'),
(379, '', 'Milind More', 'Milind More', 'milind.more@carnivalcinemas.in', '25-Sep-80', 'Accounts  ', 'Accounts-Manager', 'Carnival Films Pvt. Ltd.', '8th Floor', 377, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:31:03'),
(380, '', 'Naresh More', 'Naresh More', 'naresh.more@carnivalcinemas.in', '14-May-79', 'Projects', 'Manager- Technical', 'Carnival Films Pvt. Ltd.', '8th Floor', 320, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:32:17'),
(381, '', 'Neha Belnekar', 'Neha Belnekar', 'Neha.belnekar@gbcmegamotels.com', '22-Oct-88', 'HRD', 'Executive-Human Resources', 'GBC Mega Motels Pvt. Ltd.', '8th Floor', 126, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:32:59'),
(382, '', 'Neha Jain', 'Neha Jain', 'neha.jain@aoplcinema.com', '29-Aug-90', 'Creative & Content ', 'Sr. Manager Creative & Content ', 'AOPL  Entertainment Pvt. Ltd. ', '8th Floor', 119, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:33:46'),
(383, '', 'Nitin Mhatre', 'Nitin Mhatre', 'nitin.mhatre@carnivalcinemas.in', '9-Nov-73', 'Accounts  ', 'Accounts-Executive', 'Carnival Films Pvt. Ltd.', '8th Floor', 372, '', 'Mumbai', '0000-00-00', 'Existing', -1, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:34:47'),
(384, '', 'Nitin Odak', 'Nitin Odak', 'nitin.odak@carnivalcinemas.in', '2-Mar-81', 'HRD', 'HR & Admin-Manager', 'Carnival Films Pvt. Ltd.', '8th Floor', 333, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:35:25'),
(390, '', 'Rajesh Makhija', 'Rajesh Makhija', 'rajesh@carnivalcinemas.in', '10-Jan-76', 'Sales & Marketing', 'Associate Vice President- Sales & Marketing', 'Carnival Films Pvt. Ltd.', '8th Floor', 307, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:51:34'),
(391, '', 'Rohan Sharma', 'Rohan Sharma', 'rohan.sharma@carnivalcinemas.in', '18-Apr-86', 'Legal', 'Manager - Legal', 'Carnival Films Pvt. Ltd.', '8th Floor', 270, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:52:26'),
(394, '', 'Sachin Nakate', 'Sachin Nakate', 'sachin.nakate@carnivalcinemas.in', '31-Jul-86', 'Projects', 'Site Supervisor', 'Carnival Films Pvt. Ltd.', '8th Floor', 348, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:55:09'),
(407, '', 'Shishir Sharma', '', 'shishir.sharma@gbcmegamotels.com', '', 'Marketing', 'Marketing & Brand Managing', 'GBC Mega Motels Pvt. Ltd.', '6th Floor', 183, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:51:47'),
(392, '', 'Ruchira Malgaonkar', 'Ruchira Malgaonkar', 'ruchira.malgaonkar@carnivalcinemas.in', '10-May-91', 'Accounts  ', 'Accounts-Executive', 'Carnival Films Pvt. Ltd.', '8th Floor', 370, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:53:10'),
(393, '', 'Rupinder Kaur', 'Rupinder Kaur', 'rupinder.kaur@carnivalcinemas.in', '23-Feb-87', ' Operations & Marketing', 'Accounts-Executive', 'Carnival Films Pvt. Ltd.', '8th Floor', 321, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:54:26'),
(7, '', 'Nanda Kumar ( Col Sir)', '', '', '', 'Projects', '', 'Global Business Conexxtions PVT LTD', 'Ground Floor', 206, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(6, '', 'Daisy Davis', '', '', '', 'Front Office ', '', 'Carnival Films Pvt Ltd', 'Ground Floor', 9200, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(8, '', 'Linson Augustin', '', '', '', 'Projects', '', 'Travancore Foods India Pvt Ltd', 'Ground Floor', 240, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(10, '', 'Anil Kumar K C', '', '', '', 'Projects', '', 'Global Business Conexxtions PVT LTD', 'Ground Floor', 258, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(11, '', 'Sindo Gopi', '', '', '', 'Projects', '', 'Travancore Foods India Pvt Ltd', 'Ground Floor', 258, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(12, '', 'Renjith V', '', '', '', 'Projects', '', 'Travancore Foods India Pvt Ltd', 'Ground Floor', 258, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(13, '', 'Harisankar Mohan', '', '', '', 'Projects', '', 'Travancore Foods India Pvt Ltd', 'Ground Floor', 258, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(15, '', 'Sreenath S', '', '', '', 'Projects', '', 'Carnival Films Pvt Ltd', 'Ground Floor', 258, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(16, '', 'Nikhil C John', '', '', '', 'Projects', '', 'Carnival Films Pvt Ltd', 'Ground Floor', 258, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(18, '', 'Jose Kurian', '', '', '', 'Operations', '', 'Carnival Films Pvt Ltd', 'Ist Floor', 209, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(17, '', 'Madhu K R', '', '', '', 'Projects', '', 'Travancore Foods India Pvt Ltd', 'Ground Floor', 258, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(19, '', 'Reni Varughese', '', '', '', 'Operations', '', 'Carnival Films Pvt Ltd', 'Ist Floor', 215, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(20, '', 'Ullas Verghese', '', '', '', 'Operations', '', 'Travancore Foods India Pvt Ltd', 'Ground Floor', 210, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(22, '', 'Girish Nair', '', 'girish.nair@carnivalcinemas.in', '24-Jun-73', 'Operations', 'Accounts-Assistant General Manager', 'CARNIVAL FILMS ENTERTAINMENT PVT. LTD.', 'Ist Floor', 246, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 14:58:35'),
(24, '', 'Nimesh Gopinath', '', '', '', 'HR', '', 'Carnival Films Pvt Ltd', 'Ground Floor', 233, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(25, '', 'Vidya Narayanan', '', '', '', 'HR', '', 'Global Business Conexxtions PVT LTD', 'Ist Floor', 216, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(27, '', 'Sandhya  Hari', '', '', '', 'HR', '', 'Carnival Films Pvt Ltd', 'Ist Floor', 268, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(26, '', 'Srinath N', '', '', '', 'HR', '', 'Carnival Films Pvt Ltd', 'Ist Floor', 227, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(29, '', 'Vinitha K V', '', '', '', 'HR', '', 'Carnival Films Pvt Ltd', 'Ist Floor', 216, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(28, '', 'Jubin Cheriyan', '', '', '', 'HR', '', 'Travancore Foods India Pvt Ltd', 'Ist Floor', 227, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(32, '', 'Manoj Nair', '', '', '', 'Trading', '', 'Global Business Conexxtions PVT LTD', 'Ist Floor', 261, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(31, '', 'Mohan Babu ', '', '', '', 'Marketing', '', 'Carnival Films Pvt Ltd', 'Ground Floor', 239, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(36, '', 'Rejitha S Nair', '', '', '', 'Accounts', '', 'Carnival Films Pvt Ltd', 'Ist Floor', 213, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(34, '', 'Joy Renjith', '', '', '', 'Accounts', '', 'Global Business Conexxtions PVT LTD', 'Ist Floor', 230, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(37, '', 'Smitha Baiju', '', '', '', 'Accounts', '', 'Global Business Conexxtions PVT LTD', 'Ist Floor', 217, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(38, '', 'Soumya Sijin', '', '', '', 'Accounts', '', 'Global Business Conexxtions PVT LTD', 'Ist Floor', 217, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(40, '', 'Rakesh V B', '', '', '', 'Accounts', '', 'Carnival Films Pvt Ltd', 'Ist Floor', 249, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(39, '', 'Srinath Ravindran', '', '', '', 'Accounts', '', 'Travancore Foods India Pvt Ltd', 'Ist Floor', 260, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(41, '', 'Varghese Edayadi', '', '', '', 'Accounts', '', 'Carnival Films Pvt Ltd', 'Ist Floor', 248, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(44, '', 'Reshma Sony', 'Reshma Sony', 'reshma.sony@AoplOverseas.com     ', '2-Sep-88', 'Operations', 'TSF', 'Advantage Overseas Pvt Ltd', '11th Floor', 116, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-17 15:22:50'),
(46, '', 'Soorya Krishna Kaimal', '', '', '', 'Operations', '', 'Carnival Media Pvt Ltd', 'Ist Floor', 252, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(45, '', 'Solomon John', '', '', '', 'Operations', '', 'Carnival Media Pvt Ltd', 'Ist Floor', 256, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(47, '', 'Nithin Jolly', '', '', '', 'Operations', '', 'Carnival Media Pvt Ltd', 'Ist Floor', 252, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(48, '', 'Anuraj T R', '', '', '', 'Operations', '', 'Carnival Media Pvt Ltd', 'Ist Floor', 252, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(49, '', 'Basil Kuriakose', '', '', '', 'IT', '', 'Global Business Conexxtions PVT LTD', 'Ground Floor', 222, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(50, '', 'Biju Sakariya', '', '', '', 'IT', '', 'Travancore Foods India Pvt Ltd', 'Ground Floor', 222, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(51, '', 'Afsal M', '', '', '', 'IT', '', 'Carnival Films Pvt Ltd', 'Ground Floor', 222, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(52, '', 'Sunish Kumar M S', '', '', '', 'IT', '', 'Carnival Films Pvt Ltd', 'Ground Floor', 241, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(53, '', 'Sanoop P. K', '', '', '', 'IT', '', 'Carnival Films Pvt Ltd', 'Ground Floor', 333, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(54, '', 'Sain Sabu', '', '', '', 'IT', '', 'Travancore Foods India Pvt Ltd', 'Ground Floor', 333, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(55, '', 'Madhu J R', '', '', '', 'Operations', '', 'Carnival Films Pvt Ltd', 'Ist Floor', 224, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(57, '', 'Soorajmon R S', '', '', '', 'Operations', '', 'Travancore Foods India Pvt Ltd', 'Ist Floor', 220, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(409, '', 'Remya Menon', 'Remya Menon', 'remya.menon@gbcindia.in', '22-Sep-80', 'Executive Assistant', 'Executive Assistant', 'Global Business Conexxtions Pvt.Ltd. ', '5th Floor', 104, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 20:14:19'),
(395, '', 'Sandeep Sherlekar', 'Sandeep Sherlekar', 'sandeep.sherlekar@carnivalcinemas.in', '1-Apr-84', 'Inventory', 'Assistant Manager-Inventory', 'Carnival Films Pvt. Ltd.', '8th Floor', 343, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:55:47'),
(396, '', 'Sandeep Singh', '', 'sandeep.singh@carnivalcinemas.in', '', ' Operations & Marketing', 'Manager- Sales Operations', 'Carnival Films Pvt. Ltd.', '8th Floor', 322, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:51:47'),
(413, '', 'Amol Gavali', 'Amol Gavali', 'amol.gavali@carnivalmedia.in', '15-Mar-76', 'Operations ', 'Executive-Events ', 'Carnival Media Pvt. Ltd. ', '4th Floor', 117, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 20:18:02'),
(412, '', 'Akbar Shaikh', 'Akbar Shaikh', 'akbar@abcentertainment.co.in', '1-Feb-81', 'Operations ', 'Revenue Manager', 'ABC Entertainment Pvt. Ltd.', '4th Floor', 165, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 20:16:46'),
(411, '', 'Abhay Kshirsagar', 'Abhay Kshirsagar', 'abhay.k@carnivalmedia.in', '30-Jul-80', 'Events Management', 'Head- Events & Production', 'Carnival Media Pvt. Ltd. ', '4th Floor', 176, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 20:15:54'),
(397, '', 'Sandeep Nagarkar', 'Sandeep Nagarkar', 'sandeep.nagarkar@carnivalcinemas.in', '9-Feb-71', 'Liasioning', 'Liasioning-Executive', 'Carnival Films Pvt. Ltd.', '8th Floor', 349, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:56:21'),
(398, '', 'Sanjay Dalia', 'Sanjay Dalia', 'sanjay.dalia@carnivalcinemas.in', '13-Dec-61', 'Business Development, Projects & Programming', 'President- Business Development, Projects & Programming', 'Carnival Films Pvt. Ltd.', '8th Floor', 303, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:57:20'),
(399, '', 'Shashank Mudiraj', 'Shashank Mudiraj', 'shashank.mudiraj@carnivalcinemas.in', '28-Dec-81', 'Sales & Marketing', 'Senior Manager- Sales & Marketing', 'Carnival Films Pvt. Ltd.', '8th Floor', 313, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:58:17'),
(400, '', 'Sonam Kargutkar', 'Sonam Kargutkar', 'sonam.kargutkar@aoploverseas.com', '4-12-87', 'HRD', 'Assistant Manager- HR &Admin', 'Advantage Overseas Pvt. Ltd.', '8th Floor', 131, '', 'Mumbai', '0000-00-00', 'Existing', 7, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-05-06 21:50:23'),
(403, '', 'Vinod Nair', 'Vinod Nair', 'vinod.nair@carnivalcinemas.in', '27-Jun-76', 'Projects', 'Senior Manager-Projects', 'GBC Mega Motels Pvt. Ltd.', '6th Floor', 133, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 20:02:30'),
(402, '', 'Sony Ravindranath', 'Sony Ravindranath', 'sony.ravindranth@gbcindia.in', '20-Oct-81', 'Director ', 'Director & CEO (Food  Business) – Cranival Group. ', 'GBC Mega Motels Pvt. Ltd.', '6th Floor', 166, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 20:00:57'),
(401, '', 'Sumeet Thakurdesai', 'Sumeet Thakurdesai', 'sumit.thakurdesai@carnivalcinemas.in', '28-Jan-15', 'Food & Beverages', 'Manager- Food & Beverages', 'Carnival Films Pvt. Ltd.', '8th Floor', 341, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 20:00:20'),
(720, '257', 'javed', 'javed', 'ketan.sangani@wwindia.com', '2015-05-06', 'cxvc', 'fgfdg', 'dsdsdf', 'dgdf', 646, '8be30a0fd1151a70c152e889954c1a8e', 'Mumbai', '0000-00-00', 'New', 9, 0, '', '', '', 0, '0', '', 1, '0000-00-00 00:00:00', '2015-05-08 14:04:01'),
(721, '', 'mohan', 'mohan', 'sdfsdf@cc.com', '', 'sdfsdf', 'dfsdfsdf', 'dsdsdf', 'hjhj', 965, 'e9206237def4b4ef46fd933ed0f5a08f', 'ghfgh', '0000-00-00', 'fdgg', 0, 0, '', '', '', 0, '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(423, '', 'Roopa Remesh', 'Roopa Remesh', 'info@catleisures.com', '5-Apr-86', ' Aviation & Travel ', 'Asst. Manager- Reservation', 'CAT Leisures Pvt. Ltd.', '4th Floor', 196, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-28 19:44:55'),
(422, '', 'Rupal Patel', 'Rupal Patel', 'rupal.patel@carnivalmedia.in', '13-Jul-89', 'Business Development & Client Servicing', 'Senior Executive- Business Development & Client Servicing', 'Carnival Media Pvt. Ltd. ', '4th Floor', 366, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 22:16:12'),
(419, '', 'Neeraj Singhal', 'Neeraj Singhal', 'neeraj@catleisures.com', '5-Jan-78', ' Aviation &Travel ', 'Director', 'CAT Leisures Pvt. Ltd.', '4th Floor', 189, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 22:13:40'),
(418, '', 'Mayank Ranka', 'Mayank Ranka', 'mayank.ranka@carnivalmedia.in', '7-Apr-90', 'Client Servicing', 'Senior Executive - Client Sevicing', 'Carnival Media Pvt. Ltd. ', '4th Floor', 156, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 22:13:04'),
(417, '', 'Mangesh Tambe', 'Mangesh Tambe', 'mangesh.tambe@carnivalmedia.in', '18-Mar-78', 'Production ', 'Senior Production Manager   ', 'Carnival Media Pvt. Ltd. ', '4th Floor', 120, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 22:12:18'),
(416, '', 'Ishita Bhatnagar', 'Ishita Bhatnagar', 'ishita@abcentertainment.co.in', '30-Mar-83', 'Operations ', 'Head - Operation & Strategy', 'ABC Entertainment Pvt. Ltd.', '4th Floor', 159, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 22:11:28'),
(415, '', 'Bhavana Tekam', 'Bhavana Tekam', 'bhavna.tekam@aoploverseas.com', '14-Dec-85', ' Aviation & Travel ', 'Asst. Manager- Reservation', 'CAT Leisures Pvt. Ltd.', '4th Floor', 194, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 20:19:23'),
(433, '', 'Nisha Piwhal', 'Nisha Piwhal', 'ligi.bipin@carnivalcinemas.in', '9-Jul-87', 'Front Desk', 'Front Desk Executive', 'Advantage Overseas Pvt Ltd', '4th Floor', 180, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-17 15:11:13'),
(432, '', 'Paresh', '', 'ligi.bipin@carnivalcinemas.in', '2014-10-06', 'Front Desk', 'Executive- Front Office', 'Advantage Overseas Pvt Ltd', '6th Floor (609)', 145, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 19:49:38'),
(431, '', 'Prakash', 'prakash', 'ligi.bipin@carnivalcinemas.in', '1979-01-17', 'Front Desk', 'Executive- Front Office', 'Advantage Overseas Pvt Ltd', '6th Floor (610)', 222, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-04-23 19:23:37'),
(430, '', 'Ligi Bipin', 'Ligi Bipin', 'ligi.bipin@carnivalcinemas.in', '31-Dec-91', 'Front Desk', 'Executive- Front Office', 'Advantage Overseas Pvt Ltd', '8th Floor', 300, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-17 15:09:48'),
(429, '', 'Susan Dsouza ', 'Susan Dsouza ', 'susan.dsouza@AoplOverseas.com', '27-Nov-88', 'Front Desk', 'Executive- Front Office', 'Advantage Overseas Pvt Ltd', '11thFloor', 100, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-17 15:09:16'),
(428, '', 'Shraddha Mishra', 'Shraddha.Mishra', 'shraddha@abcentertainment.co.in', '2015-04-29', 'Accounts', 'Executive-Accounts', 'ABC Entertainment Pvt. Ltd.', '4th Floor', 161, '', 'Mumbai', '2015-04-24', 'New', 0, 0, 'dashboard-image.png', 'dashboard-image_thumb.png', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-05-06 22:05:50'),
(427, '', 'Shivraj Patil', 'Shivraj.Patil', 'shivraj.patil@carnivalmedia.in', '4-Dec-86', ' Production & Operations', 'Senior Executive- Production & Operations', 'Carnival Media Pvt. Ltd. ', '4th Floor', 326, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-17 15:07:38'),
(426, '', 'Shashank Kumar', 'Shashank.Kumar1', 'shashank.kumar@abcentertainment.co.in', '1-Oct-76', 'Sales', 'General Manager- Sales', 'ABC Entertainment Pvt. Ltd.', '4th Floor', 157, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-17 15:04:25'),
(405, '', 'Shraddha Pawar', 'Shraddha.Pawar', 'aditya.ranjan@gbcmegamotels.com', '2015-03-15', 'Creative', 'Site Engineer ', 'GBC Mega Motels Pvt. Ltd.', '6th Floor', 156, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 20:04:23'),
(406, '406', 'Sonali Parulekar', 'Sonali.Parulekar', 'pssonali@gmail.com', '1989-06-24', 'Marketing', 'SR. Executive Brand Managment & Marketing', 'GBC Mega Motels Pvt. Ltd.', '6th Floor', 183, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-05-06 22:12:00'),
(425, '', 'Shailendra Mishra', 'Shailendra.Mishra', 'shailendra.mishra@catleisures.com', '23-Apr-71', ' Aviation & Travel ', 'National Sales Manager', 'CAT Leisures Pvt. Ltd.', '4th Floor', 135, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-17 15:03:13'),
(424, '', 'Roopanjali Amin', 'Roopanjali.Amin', 'roopanjali@abcentertainment.co.in', '4-May-79', 'Operations ', 'Manager Operation & Strategy', 'ABC Entertainment Pvt. Ltd.', '4th Floor', 160, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-17 15:02:28'),
(2, '', 'P V Sunil ', '', '', '', 'CEO', '', 'Global Business Conexxtions PVT LTD', 'Top  Floor', 202, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(4, '', 'Sasi Kumar K S', '', '', '', 'Director', '', 'Global Business Conexxtions PVT LTD', 'Top  Floor', 204, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(5, '', 'Varsha K R', '', '', '', 'Business Co- ordinator', '', 'Travancore Foods India Pvt Ltd', 'Ist Floor', 208, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(9, '', 'Rahul Dinesh', '', '', '', 'Projects', '', 'Carnival Films Pvt Ltd', 'Ground Floor', 258, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(14, '', 'Sajeesh C', '', '', '', 'Projects', '', 'Travancore Foods India Pvt Ltd', 'Ground Floor', 258, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(21, '', 'Makesh  V Raj', '', '', '', 'Operations', '', 'Travancore Foods India Pvt Ltd', 'Ist Floor', 232, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(23, '', 'Sreeja Bappuji', '', '', '', 'Operations', '', 'Travancore Foods India Pvt Ltd', 'Ist Floor', 246, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08');
INSERT INTO `employees` (`id`, `emp_id`, `name`, `username`, `email`, `dob`, `department`, `designation`, `company`, `floor`, `extn`, `password`, `location`, `joining_date`, `type`, `tl_id`, `authority_status`, `img`, `Resize`, `contact`, `online`, `address`, `token`, `status`, `created_date`, `modified_date`) VALUES
(30, '', 'Sapana Mohan Babu', '', '', '', 'HR', '', 'Travancore Foods India Pvt Ltd', 'Ist Floor', 216, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(33, '', 'Albin Varghese', '', '', '', 'Trading', '', 'Global Business Conexxtions PVT LTD', 'Ist Floor', 261, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(35, '', 'Dipin Divakaran', '', '', '', 'Accounts', '', 'Global Business Conexxtions PVT LTD', 'Ist Floor', 211, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(43, '', 'Tintu Rajesh', '', '', '', 'Accounts', '', 'Travancore Foods India Pvt Ltd', 'Ist Floor', 248, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(42, '', 'Robert George', '', '', '', 'Accounts', '', 'Travancore Foods India Pvt Ltd', 'Ist Floor', 248, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(408, '', 'Ruchi Shah', 'ruchi.shah', 'ruchi.shah@gbcmegamotels.com', '12-Apr-90', 'Business Development ', 'Asst. Manager- Business Development', 'GBC Mega Motels Pvt. Ltd.', '6th Floor', 198, '996c43b3df35048358e637b5f80e9954', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-04-09 18:13:24'),
(58, '', 'Hema Nair', '', '', '', 'Operations', '', 'Travancore Foods India Pvt Ltd', 'Ist Floor', 220, '', 'Kerala', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 15:49:08'),
(410, '', 'Meghali Sankholkar', 'Meghali Sankholkar', 'meghali.sankholkar@gbcindia.in', '13-Nov-79', 'Head Analyst', 'Head Analyst', 'Global Business Conexxtions Pvt.Ltd. ', '5th Floor', 275, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 20:15:19'),
(414, '', 'Arun Agrawal ', 'Arun Agrawal ', 'arun.agrawal@aoploverseas.com', '27-Jul-61', 'Equity Trading', 'Head- Equity Trading', 'Advantage Overseas Pvt. Ltd.', '4th Floor', 155, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 20:18:47'),
(404, '', 'Aditya Ranjan', 'Aditya Ranjan', 'aditya.ranjan@gbcmegamotels.com', '13-Dec-84', 'Projects', 'Site Engineer ', 'GBC Mega Motels Pvt. Ltd.', '6th Floor', 188, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 20:03:11'),
(385, '', 'Nivika Karvirkar', 'Nivika Karvirkar', 'nivika.karvirkar@carnivalcinemas.in', '12-Feb-88', 'Creative ', 'HR & Admin-Manager', 'Carnival Films Pvt. Ltd.', '8th Floor', 361, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-16 19:36:33'),
(436, '', 'Sarvesh Belose ', 'Sarvesh Belose ', 'sarvesh.belose@gbcmegamotels.com', '28-Feb-87', 'IT', 'Executive - IT', 'GBC Mega Motels Pvt. Ltd.', '8th Floor', 355, '', 'Mumbai', '0000-00-00', 'Existing', 17, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-17 15:16:15'),
(437, '', 'Shailesh Dhagavkar', 'Shailesh Dhagavkar', 'shailesh.dhagavkar@carnivalcinemas.in', '1-Oct-61', 'IT', 'IT-ASSISTANT GENERAL MANAGER', 'Carnival Films Pvt. Ltd.', '8th Floor', 314, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-17 15:17:43'),
(438, '', 'Shailesh Sawant ', 'Shailesh Sawant ', 'shailesh.sawant@carnivalcinemas.in', '13-Oct-80', 'IT', 'IT-ASSISTANT MANAGER', 'Carnival Films Pvt. Ltd.', '8th Floor', 356, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-17 15:18:22'),
(439, '', 'Bhavin', '', 'shailesh.sawant@carnivalcinemas.in', '2004-11-22', 'Pantry', 'IT-ASSISTANT MANAGER', 'Carnival Films Pvt. Ltd.', '11thFloor', 200, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 19:45:40'),
(440, '', 'Jaydeep', '', 'shailesh.sawant@carnivalcinemas.in', '2014-08-03', 'Pantry', 'IT-ASSISTANT MANAGER', 'Carnival Films Pvt. Ltd.', '8th Floor', 242, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 19:46:13'),
(441, '', 'Sameer', '', 'shailesh.sawant@carnivalcinemas.in', '1992-11-12', 'Pantry', 'IT-ASSISTANT MANAGER', 'Carnival Films Pvt. Ltd.', '5th Floor', 369, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 19:46:41'),
(442, '', 'Piyush', '', 'shailesh.sawant@carnivalcinemas.in', '2007-10-09', 'Pantry', 'IT-ASSISTANT MANAGER', 'Carnival Films Pvt. Ltd.', '4th Floor', 367, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 19:47:16'),
(443, '', 'Rajesh', '', 'shailesh.sawant@carnivalcinemas.in', '2014-12-09', 'Conference', 'IT-ASSISTANT MANAGER', 'Carnival Films Pvt. Ltd.', '11thFloor', 132, '', 'Mumbai', '0000-00-00', 'Existing', 0, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-13 19:47:32'),
(444, '', 'Rakesh', 'rakesh', 'shailesh.sawant@carnivalcinemas.in', '2014-11-03', 'Conference', 'IT-ASSISTANT MANAGER', 'Carnival Films Pvt. Ltd.', '8th Floor', 0, '67', 'Mumbai', '2015-03-13', 'Existing', 2, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-03-19 21:15:25'),
(445, '', 'Subin Thomas', 'subin.thomas', 'subin@demo.com', '1993-04-16', 'Conference', 'Senior Manager - Business Development', 'Carnival Films Pvt. Ltd.', '5th Floor', 197, '969', 'Mumbai', '2015-03-24', 'New', 2, 0, 'de.jpg', 'de_thumb.jpg', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-04-16 17:58:49'),
(446, '', 'Shraddha Gotad', 'shraddha.gotad', 'shraddha.gotad@carnivalcinemas.in', '1995-03-06', 'Conference', 'Manager – Training & Performance Management', 'Carnival Films Pvt. Ltd.', '4th Floor', 325, '1', 'Mumbai', '2015-03-17', 'Existing', 7, 0, 'shraddha.jpg', 'shraddha_thumb.jpg', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '0000-00-00 00:00:00', '2015-05-04 21:17:35'),
(448, '', 'demo 2', 'demo.2', 'ketansangani12@gmail.com', '1995-04-16', 'php', 'developer', 'neosoft', '4TH floor', 985, '2543ba5d2f955621e65408e5d5dbbe64', 'Mumbai', '0000-00-00', 'New', 8, 0, '', '', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '2015-03-19 20:40:07', '2015-04-30 18:42:54'),
(449, '', 'demo 1', 'demo.1', 'jadhavashok470@gmail.com', '1993-04-16', 'php', 'designer', 'neosoft', '4TH floor', 985, 'e368b9938746fa090d6afd3628355133', 'Mumbai', '2015-03-25', 'New', 0, 0, '', '', '', 1, '0', '', 1, '2015-03-19 20:42:11', '2015-05-05 14:13:33'),
(451, '', 'Maneesh Kumar Singh', 'mks', 'narayanan.prasanth@gmail.com', '2006-03-06', 'Group MD & CEO ', 'MD', 'AOPL', '', 0, 'ab93f5e5cb6e1e08174e05bc4c2ed597', 'Mumbai', '0000-00-00', 'New', 0, 0, 'Mr.Maneesh__.jpg', 'Mr.Maneesh___thumb.jpg', '', 0, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '2015-03-23 21:01:57', '2015-05-04 21:29:33'),
(452, '', 'Priyanka Mane', 'admin', 'priyanka.mane@AoplOverseas.com', '30-Jan-93', 'Accounts', 'Accounts Executive', 'Advantage Overseas Pvt. Ltd.', '11th Floor', 140, '0f359740bd1cda994f8b55330c86d845', 'Mumbai', '0000-00-00', 'New', 0, 0, '', '', '', 1, '0', 'd8d69ef83aaca07a06d6e2139c3bebf7', 1, '2015-04-07 21:36:24', '2015-04-07 21:36:47'),
(453, '', 'Devanand Tare', 'admin', 'devanand.tare@aoploverseas.com', '07-07-74', 'Admin', 'Executive - Record Keeping', 'Advantage Overseas Pvt. Ltd.', '3rd Floor', 190, '0f359740bd1cda994f8b55330c86d845', 'mumbai', '2010-03-15', 'new', 0, 0, '', '', '', 1, '', 'd8d69ef83aaca07a06d6e2139c3bebf7', 0, '2015-04-07 21:39:02', '2015-04-07 21:39:02'),
(725, '', 'mohan', 'mohanyadav', 'sdfsdf@cc.com', '', 'sdfsdf', 'dfsdfsdf', 'dsdsdf', 'hjhj', 965, 'mohan', 'ghfgh', '0000-00-00', 'fdgg', 0, 0, '', '', '', 0, '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(729, '500', 'rockey', 'rockey', 'rockey@wwindia.com', '2015-05-03', 'dsfds', 'dfzgfdg', 'fdsfdz', 'sfdgfszg', 75524, '5a4e714edfbdb0990ba9402c556a2edd', 'mumbai', '2015-05-18', 'new', 0, 0, 'coldplay07.jpg', 'coldplay07_thumb.jpg', '', 0, '', '', 1, '2015-05-09 16:39:44', '2015-05-09 16:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(300) NOT NULL,
  `answer` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_date`, `modified_date`) VALUES
(2, 'How to avail ESIC?', '<ol>\n	<li style="text-align:justify">\n	<p><span style="font-size:14px">The insured person[IP] shall approach the ESI Dispensary to which he/she is attached, and the Medical Officer shall issue a referral letter to the person to approach the concerned empanelled medical institution.</span></p>\n	</li>\n	<li style="text-align:justify">\n	<p><span style="font-size:14px">If the person needs medical attention during the non-working hours of the concerned ESI Dispensary, they may directly approach the nearest ESI Hospital for getting referral letter. If there is no ESI Hospital nearer to the person&rsquo;s place of living, he/she can approach the nearest Govt. Hospital for getting referral letter.</span></p>\n	</li>\n	<li style="text-align:justify">\n	<p><span style="font-size:14px">In the case of an emergency the insured person can get Medical attention just by producing his/her ESI identity card at the designated private medical institution. He can produce necessary referral letter and other relevant documents within 48 hours. (If any case referral letter is a must to avail treatment under package deal</span><br />\n	&nbsp;</p>\n	</li>\n	<li style="text-align:justify">\n	<p><span style="font-size:14px">The IP can produce the referral letter and the ESI Identity Card at the designated private medical institution and avail the treatment without paying any amount from out of his/her pocket. However any facility, other than the items included in the package deal shall be borne by the IP/beneficiary.</span><br />\n	&nbsp;</p>\n	</li>\n	<li style="text-align:justify">\n	<p><span style="font-size:14px">The IP shall produce all the relevant documents demanded by the designated hospital and extend his/her co-operation to the hospital authorities.&nbsp;</span><br />\n	&nbsp;</p>\n	</li>\n	<li style="text-align:justify">\n	<p><span style="font-size:14px">The designated hospital after imparting treatment to the IP/beneficiary shall raise the claim bill directly to the Directorate where it will be settled.&nbsp;</span></p>\n	</li>\n</ol>\n', 1, '2015-02-20 14:33:49', '2015-02-25 15:26:55'),
(3, 'How many leaves am I entitled for in a year?', '<p>Please read the policy on leaves in the main Policy Session.</p>\n', 1, '2015-02-20 14:37:52', '2015-02-20 09:07:52'),
(4, 'What is the cut-off date to submit outdoor travelling details for attendance?', '<ul>\n	<li><span style="font-size:14px">On or before 21<sup>st</sup> of every month.</span></li>\n</ul>\n', 1, '2015-02-20 14:38:13', '2015-02-23 16:58:44'),
(5, 'Will I get paid leaves during probation period?', '<ul>\n	<li>Yes, after 3 months. Please read the relevant policy under leaves in Policy Session.</li>\n</ul>\n', 1, '2015-02-20 14:38:38', '2015-02-20 09:08:38'),
(6, 'How to avail Mediclaim facility and what diseases are covered?', '<ul>\n	<li>Click the Mediclaim Link herewith.</li>\n</ul>\n', 1, '2015-02-20 14:38:58', '2015-02-20 09:08:58'),
(7, 'Which hospitals are covered under cashless facility?', '<table border="0" cellpadding="0" cellspacing="0" style="width:1213px">\n	<tbody>\n		<tr>\n			<td style="height:20px; width:257px">Company Name on the Card</td>\n			<td style="width:291px">Link to view the list of Hospitals&nbsp;</td>\n			<td style="width:284px">Insurance Company&nbsp;</td>\n			<td style="width:199px">Toll Free No&nbsp;</td>\n			<td style="width:183px">TPA&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="height:20px">Advanrage Overseas Pvt Ltd</td>\n			<td><a href="https://www.paramounttpa.com/ProviderNetwork/ProviderNetwork.aspx">https://www.paramounttpa.com/ProviderNetwork/ProviderNetwork.aspx</a></td>\n			<td>BhartI AXA&nbsp; General Insurance Co. Ltd</td>\n			<td><a href="https://www.mediassistindia.com/Index.html">1800-226-655</a></td>\n			<td>Paramount</td>\n		</tr>\n		<tr>\n			<td style="height:20px">Carnival Films Pvt Ltd</td>\n			<td><a href="https://www.rakshatpa.com/SearchHospital_Sapient.jsp">https://www.rakshatpa.com/SearchHospital_Sapient.jsp</a></td>\n			<td>The New India Assurance Co . Ltd</td>\n			<td><a href="https://www.rakshatpa.com/SearchHospital_Sapient.jsp">02026058125/26</a></td>\n			<td>Raksha&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="height:20px">HDIL Entertainment Pvt Ltd</td>\n			<td><a href="https://mdindiaonline.com/ProviderList.aspx">https://mdindiaonline.com/ProviderList.aspx</a></td>\n			<td>The New India Assurance Co . Ltd</td>\n			<td><a href="https://www.rakshatpa.com/SearchHospital_Sapient.jsp">1860-233-4446,&nbsp;1860-233-4448</a></td>\n			<td>MDIndia&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="height:20px">Global Business Conexxtions Pvt Ltd</td>\n			<td><a href="https://www.paramounttpa.com/ProviderNetwork/ProviderNetwork.aspx">https://www.paramounttpa.com/ProviderNetwork/ProviderNetwork.aspx</a></td>\n			<td>The New India Assurance Co . Ltd</td>\n			<td><a href="https://mdindiaonline.com/ProviderList.aspx">1800-226-655</a></td>\n			<td>Paramount</td>\n		</tr>\n		<tr>\n			<td style="height:20px">Travancore Foods India Pvt Ltd&nbsp;</td>\n			<td><a href="https://www.mediassistindia.com/Index.html">https://www.mediassistindia.com/Index.html</a></td>\n			<td>BhartI AXA&nbsp; General Insurance Co. Ltd</td>\n			<td><a href="https://www.paramounttpa.com/ProviderNetwork/ProviderNetwork.aspx">1800-425-9449</a></td>\n			<td>Medi Assist&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="height:20px">Metro Vaarta Pvt Ltd&nbsp;</td>\n			<td><a href="https://www.mediassistindia.com/Index.html">https://www.mediassistindia.com/Index.html</a></td>\n			<td>BhartI AXA&nbsp; General Insurance Co. Ltd</td>\n			<td><a href="https://www.mediassistindia.com/Index.html">1800-425-9449</a></td>\n			<td>Medi Assist&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="height:20px">GBC Mega Motels Pvt Ltd</td>\n			<td><a href="https://www.paramounttpa.com/ProviderNetwork/ProviderNetwork.aspx">https://www.paramounttpa.com/ProviderNetwork/ProviderNetwork.aspx</a></td>\n			<td>BhartI AXA&nbsp; General Insurance Co. Ltd</td>\n			<td><a href="https://www.mediassistindia.com/Index.html">1800-226-655</a></td>\n			<td>Paramount</td>\n		</tr>\n		<tr>\n			<td style="height:20px">Advanrage Oils Pvt Ltd&nbsp;</td>\n			<td><a href="https://mdindiaonline.com/ProviderList.aspx">https://mdindiaonline.com/ProviderList.aspx</a></td>\n			<td>Orientnal Insurance Co. Ltd</td>\n			<td><a href="https://www.paramounttpa.com/ProviderNetwork/ProviderNetwork.aspx">1860-233-4446,&nbsp;1860-233-4448</a></td>\n			<td>MD INDIA&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="height:20px">Carnival Soft Pvt Ltd&nbsp;</td>\n			<td>https://www.mediassistindia.com/Index.html</td>\n			<td>BhartI AXA&nbsp; General Insurance Co. Ltd</td>\n			<td><a href="https://www.mediassistindia.com/Index.html">1800-425-9449</a></td>\n			<td>Medi Assist&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n', 1, '2015-02-20 14:39:18', '2015-03-09 11:07:53'),
(8, ' Mode of travel entitlement and eligibility?', '<ul>\n	<li>Please read the travel policy in the main Policy Session.</li>\n</ul>\n', 1, '2015-02-20 14:39:42', '2015-02-20 09:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `group_companies`
--

CREATE TABLE IF NOT EXISTS `group_companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `group_companies`
--

INSERT INTO `group_companies` (`id`, `name`, `contact`, `address`, `status`, `created_date`, `modified_date`) VALUES
(1, 'Global Business conexxtions Pvt. Ltd', ' 022 61983100', '609,A-Wing,6th floor, Express Zone Off. Western Express Highway Malad(E),Mumbai -400097,India', 1, '2015-02-11 18:56:33', '2015-02-11 13:26:33'),
(2, 'Advantage Overseas Pvt. Ltd.', ' 022-61983100', ' A - 1101, Express Zone, off Western Express Highway, Malad (E), Mumbai - 400097', 1, '2015-02-11 18:57:38', '2015-02-11 13:27:38'),
(3, 'AOPL Entertainment Pvt. Ltd.', '2261983180', 'A/414, Express Zone, Near Patel Industries, Western Express Highway, Malad East, Mumbai - 400097,', 1, '2015-02-11 18:58:35', '2015-02-24 17:32:29'),
(4, 'Carnival Media Pvt. Ltd.', '022-61983180', 'Carnival Media Pvt. Ltd. A/414, Express Zone, Western express highway, Malad East, Mumbai 400097', 1, '2015-02-11 18:59:37', '2015-03-13 13:24:15'),
(6, 'Carnival Food Court - Travancore Foods India Pvt.Ltd.', '081130 70707', '9-418-A3, Infopark Road, Near Olive Courtyard, Logistic Park, Edachira, Kakkanad, Kochi, Kerala 682030,  CN 10, Church Nager, Angamaly P O.Ernakulum Dist,Kerala-683572.', 1, '2015-02-11 19:02:39', '2015-03-13 13:21:50'),
(7, 'Carnival Films Pvt. Ltd.', '022 67886100', ' A-801, Express Zone, Off Western Express Highway, Malad (E), Mumbai - 400097', 1, '2015-02-11 19:03:31', '2015-02-11 13:33:31'),
(8, 'ABC Entertainment Pvt. Ltd.', '022 61983180', 'A/414, Express Zone, Near Patel Industries, Western Express Highway, Malad East, Mumbai - 400097', 1, '2015-02-11 19:04:32', '2015-02-11 13:34:32'),
(9, 'Red Bubble Cafe', ' 0484 2233254', 'CN 10, Church Nagar,Angamaly P.O,Ernakulam.\nKerala - 683572', 1, '2015-02-11 19:05:31', '2015-02-24 17:27:41'),
(10, 'D bell', '022 6537 4666', 'Tower 2A, Lobby Level, One Indiabulls Center, Jupiter Mills Compound, Senapati Bapat Marg, Lower Parel West, Mumbai, Maharashtra 400073', 1, '2015-02-11 19:16:11', '2015-02-24 17:16:05'),
(11, 'Advantage Oils Pvt. Ltd.', '022-61983100', 'A - 1101, Express Zone, off Western Express Highway, Malad (E), Mumbai - 400097', 1, '2015-02-11 19:17:34', '2015-02-11 13:47:34'),
(12, 'CAT Leisures Pvt. Ltd.', '022-61983180', 'A/414, Express Zone, Opp. Oberio Mall, Off Western Express Highway, Malad (E), Mumbai - 400097', 1, '2015-02-11 19:18:53', '2015-02-24 17:23:17'),
(13, 'Carnival Motion Pictures Pvt. Ltd', '022 67886100', 'Mumbai', 1, '2015-02-11 19:22:08', '2015-02-24 17:21:57'),
(14, 'Cafe Sabrosa', '022 60600757 ', 'Bandra Kurla Complex › Lobby Level, The Capital Building, Plot 70, Block G,  Mumbai-400051', 1, '2015-02-11 19:22:43', '2015-02-24 15:12:40'),
(15, 'M/s. Metro Vaartha Pvt. Ltd.', '0484 3060888', 'PB No.2544, 4th floor, Shenoy Chambers, Shanmugham Road PO, Marine Drive, Ernakulam - 682031', 1, '2015-02-11 19:23:55', '2015-02-11 13:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `guesthouse_locations`
--

CREATE TABLE IF NOT EXISTS `guesthouse_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `guesthouse_locations`
--

INSERT INTO `guesthouse_locations` (`id`, `name`, `status`, `created_date`, `modified_date`) VALUES
(2, 'Delhi', 1, '2015-04-17 20:49:29', '2015-04-17 15:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `holiday_list`
--

CREATE TABLE IF NOT EXISTS `holiday_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(200) NOT NULL,
  `holiday_date` date NOT NULL,
  `desc` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `holiday_list`
--

INSERT INTO `holiday_list` (`id`, `city`, `holiday_date`, `desc`, `status`, `created_date`, `modified_date`) VALUES
(4, 'COCHIN', '2015-01-26', 'Republic Day ', 1, '2015-02-16 16:27:15', '2015-02-16 10:57:15'),
(5, 'COCHIN', '2015-04-03', 'Good Friday', 1, '2015-02-16 16:28:09', '2015-02-16 10:58:09'),
(6, 'COCHIN', '2015-04-15', ' Vishu', 1, '2015-02-16 16:28:34', '2015-02-16 10:58:34'),
(7, 'COCHIN', '2015-05-01', 'May Day', 1, '2015-02-16 16:28:54', '2015-02-16 10:58:54'),
(8, 'COCHIN', '2015-07-18', 'Id-Ul-Fitar', 1, '2015-02-16 16:29:18', '2015-02-16 10:59:18'),
(9, 'COCHIN', '2015-08-15', ' Independence Day', 1, '2015-02-16 16:29:41', '2015-02-16 10:59:41'),
(10, 'COCHIN', '2015-08-27', 'First ONAM', 1, '2015-02-16 16:30:05', '2015-02-16 11:00:05'),
(11, 'COCHIN', '2015-08-28', 'Thiruvonam', 1, '2015-02-16 16:30:35', '2015-02-16 11:00:35'),
(12, 'COCHIN', '2015-10-02', 'Gandhijayanti', 1, '2015-02-16 16:31:27', '2015-02-16 11:01:27'),
(13, 'COCHIN', '2015-12-25', 'Christmas', 1, '2015-02-16 16:31:58', '2015-02-16 11:01:58'),
(14, 'COCHIN', '2015-10-22', 'Mahanavami', 1, '2015-02-16 16:47:25', '2015-02-16 11:17:25'),
(15, 'COCHIN', '2015-10-23', 'Vijayadasami', 1, '2015-02-16 16:48:05', '2015-02-16 11:18:05'),
(16, 'COCHIN', '2015-11-10', 'Diwali', 1, '2015-02-16 16:48:28', '2015-02-16 11:18:28'),
(17, 'MUMBAI', '2015-01-26', 'Republic Day', 1, '2015-02-16 16:58:32', '2015-02-16 11:28:32'),
(18, 'MUMBAI', '2015-03-06', 'Holi', 1, '2015-02-16 16:58:55', '2015-02-16 11:28:55'),
(19, 'MUMBAI', '2015-03-21', 'Gudi Padwa', 1, '2015-02-16 16:59:21', '2015-02-16 11:29:21'),
(20, 'MUMBAI', '2015-04-03', 'Good Friday', 1, '2015-02-16 16:59:39', '2015-02-16 11:29:39'),
(21, 'MUMBAI', '2015-05-01', 'Maharashtra Day', 1, '2015-02-16 16:59:58', '2015-02-16 13:20:59'),
(22, 'MUMBAI', '2015-08-15', 'Independence Day', 1, '2015-02-16 17:00:23', '2015-02-16 11:30:23'),
(23, 'MUMBAI', '2015-09-05', 'Janmashtami', 1, '2015-02-16 17:56:29', '2015-03-09 10:51:05'),
(24, 'MUMBAI', '2015-09-17', 'Ganesh Chaturthi', 1, '2015-02-16 17:56:52', '2015-02-16 12:26:52'),
(25, 'MUMBAI', '2015-10-02', 'Gandhijayanti', 1, '2015-02-16 17:57:13', '2015-02-16 12:27:13'),
(26, 'MUMBAI', '2015-10-22', 'Dussehra', 1, '2015-02-16 17:58:25', '2015-02-16 12:28:25'),
(27, 'MUMBAI', '2015-11-11', 'Diwali (Lakshmi Puja)', 1, '2015-02-16 17:58:48', '2015-02-16 12:28:48'),
(28, 'MUMBAI', '2015-11-12', 'Diwali (Balipratipada)', 1, '2015-02-16 17:59:12', '2015-02-16 12:29:12'),
(29, 'MUMBAI', '2015-12-25', 'Christmas', 1, '2015-02-16 17:59:35', '2015-02-16 12:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_locations`
--

CREATE TABLE IF NOT EXISTS `hotel_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hotel_locations`
--

INSERT INTO `hotel_locations` (`id`, `name`, `status`, `created_date`, `modified_date`) VALUES
(3, 'Mumbai', 1, '2015-04-17 20:48:40', '2015-04-17 15:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `hr_forms`
--

CREATE TABLE IF NOT EXISTS `hr_forms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `form` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hr_forms`
--

INSERT INTO `hr_forms` (`id`, `name`, `form`, `status`, `created_date`, `modified_date`) VALUES
(1, 'Form 1', 'Address_of_Sites.docx', 1, '2015-03-18 18:03:36', '2015-03-18 13:18:37'),
(2, 'Form 2', 'Available_Devices.doc', 1, '2015-03-18 18:48:13', '2015-03-18 13:18:13'),
(3, 'Carnival is a Mumbai based conglomerate with branch offices', 'Feedback_for_the_website(1).docx', 1, '2015-04-10 14:20:59', '2015-04-15 11:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `hr_help_desk`
--

CREATE TABLE IF NOT EXISTS `hr_help_desk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `designation` varchar(300) NOT NULL,
  `contactfor` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `hr_help_desk`
--

INSERT INTO `hr_help_desk` (`id`, `user_id`, `designation`, `contactfor`, `status`, `created_date`, `modified_date`) VALUES
(2, 328, 'Director & CHRO  - Carnival Group ', 'For unresolved issues / policy decisions & approvals', 1, '2015-02-11 15:30:35', '2015-02-25 07:47:12'),
(3, 377, 'MANAGER - GROUP ADMIN', 'Admin related activities for ABC group companies. ', 1, '2015-02-11 15:36:43', '2015-02-11 04:36:43'),
(14, 0, 'EXECUTIVE - HRD', 'Leave Management, Bank account opening,Corelation of attandence for entire group.', 1, '2015-03-12 15:30:23', '2015-05-04 16:43:05'),
(6, 388, 'EXECUTIVE - HRD', 'PF,ESIC and Insurance for the group. ', 1, '2015-02-11 15:42:02', '2015-05-05 09:19:41'),
(7, 362, 'MANAGER - HR & ADMIN', ' HR & Admin matters related to GBC Megamotels. ', 1, '2015-02-11 15:43:32', '2015-03-20 11:15:45'),
(8, 381, 'ASST. MANAGER - HR', 'HR & Admin matters related to GBC Megamotels -1st point of contact.', 1, '2015-02-11 15:45:06', '2015-02-24 13:06:20'),
(9, 384, ' MANAGER -HRD & ADMIN', 'HR & Admin matters related to Carnival Films ', 1, '2015-02-11 15:46:12', '2015-02-24 13:05:44'),
(10, 368, 'EXECUTIVE - HRD', ' PF & ESIC matters related to Carnival Films entertainment Pvt. Ltd. Issuing datacards and simcards to employees at Carnival films. Staff Joining Formalities.Coordination with vendors for Name tags and ID cards. ', 1, '2015-02-11 15:47:23', '2015-05-04 17:27:06'),
(13, 400, 'Assistant Manager- Group HR & Admin', 'Recruitment, Issuing of Offer Letters,Appointment Letter, Confirmation, Joining Formalities, Official Announcements, Employee Data, Grievance handling, Admin Assistance, Employee Engagement Activities', 1, '2015-03-12 15:28:08', '2015-03-12 06:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `it_help_desk`
--

CREATE TABLE IF NOT EXISTS `it_help_desk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `contactfor` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `it_help_desk`
--

INSERT INTO `it_help_desk` (`id`, `user_id`, `contactfor`, `status`, `created_date`, `modified_date`) VALUES
(1, 435, 'Unresolved issues after attempts at lower levels ', 1, '2015-02-11 16:38:41', '2015-02-11 11:08:41'),
(2, 437, ' First point of escalation ', 1, '2015-02-11 16:40:01', '2015-02-11 11:10:01'),
(3, 438, ' For routine trouble shooting ', 1, '2015-02-11 16:40:55', '2015-02-11 11:10:55'),
(4, 436, 'For routine trouble shooting ', 1, '2015-02-11 16:42:04', '2015-05-05 09:22:06'),
(5, 434, ' For routine trouble shooting ', 1, '2015-02-11 16:42:56', '2015-05-05 08:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `it_policies`
--

CREATE TABLE IF NOT EXISTS `it_policies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `desc` blob NOT NULL,
  `img` varchar(200) NOT NULL,
  `Resize` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `it_policies`
--

INSERT INTO `it_policies` (`id`, `title`, `desc`, `img`, `Resize`, `status`, `created_date`, `modified_date`) VALUES
(1, 'demo', 0x3c6f6c3e0a093c6c693e3c7370616e207374796c653d22636f6c6f723a23464646463030223e3c7370616e207374796c653d22666f6e742d66616d696c793a636f6d69632073616e73206d732c63757273697665223e3c7370616e207374796c653d22666f6e742d73697a653a31347078223e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e73656374657475722061646970697363696e6720656c69742e3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f6c693e0a093c6c693e3c7370616e207374796c653d22636f6c6f723a23464646463030223e3c7370616e207374796c653d22666f6e742d66616d696c793a636f6d69632073616e73206d732c63757273697665223e3c7370616e207374796c653d22666f6e742d73697a653a31347078223e4d616563656e617320657520747572706973206e6563206a7573746f20736f64616c657320636f6e73656374657475722061742065742073656d2e3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f6c693e0a093c6c693e3c7370616e207374796c653d22636f6c6f723a23464646463030223e3c7370616e207374796c653d22666f6e742d66616d696c793a636f6d69632073616e73206d732c63757273697665223e3c7370616e207374796c653d22666f6e742d73697a653a31347078223e4d6f7262692073697420616d6574206d617373612061632074656c6c75732074726973746971756520636f6e7365717561742e3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f6c693e0a093c6c693e3c7370616e207374796c653d22636f6c6f723a23464646463030223e3c7370616e207374796c653d22666f6e742d66616d696c793a636f6d69632073616e73206d732c63757273697665223e3c7370616e207374796c653d22666f6e742d73697a653a31347078223e496e746567657220617563746f72206e657175652069642076656e656e6174697320696d706572646965742e3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f6c693e0a093c6c693e3c7370616e207374796c653d22636f6c6f723a23464646463030223e3c7370616e207374796c653d22666f6e742d66616d696c793a636f6d69632073616e73206d732c63757273697665223e3c7370616e207374796c653d22666f6e742d73697a653a31347078223e566573746962756c756d20636f6e7365717561742064756920736564206a7573746f2067726176696461207472697374697175652e3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f6c693e0a093c6c693e3c7370616e207374796c653d22636f6c6f723a23464646463030223e3c7370616e207374796c653d22666f6e742d66616d696c793a636f6d69632073616e73206d732c63757273697665223e3c7370616e207374796c653d22666f6e742d73697a653a31347078223e496e7465676572206964206e756c6c61207072657469756d2c207665686963756c61206c61637573206d6f6c65737469652c20626c616e646974206d617373612e3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f6c693e0a093c6c693e3c7370616e207374796c653d22636f6c6f723a23464646463030223e3c7370616e207374796c653d22666f6e742d66616d696c793a636f6d69632073616e73206d732c63757273697665223e3c7370616e207374796c653d22666f6e742d73697a653a31347078223e4e756c6c6120757420656c69742076656c206572617420626962656e64756d20706f72747469746f72206e6f6e20616c6971756574206d61757269732e3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f6c693e0a093c6c693e3c7370616e207374796c653d22636f6c6f723a23464646463030223e3c7370616e207374796c653d22666f6e742d66616d696c793a636f6d69632073616e73206d732c63757273697665223e3c7370616e207374796c653d22666f6e742d73697a653a31347078223e5365642065752076656c6974207072657469756d2c20666175636962757320657261742061742c207661726975732061756775652e3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f6c693e0a093c6c693e3c7370616e207374796c653d22636f6c6f723a23464646463030223e3c7370616e207374796c653d22666f6e742d66616d696c793a636f6d69632073616e73206d732c63757273697665223e3c7370616e207374796c653d22666f6e742d73697a653a31347078223e3c7370616e207374796c653d22666f6e742d66616d696c793a636f6d69632073616e73206d732c63757273697665223e3c7370616e207374796c653d22666f6e742d73697a653a31347078223e53757370656e6469737365206163206d617373612073697420616d657420656e696d207361676974746973206d6178696d75732e3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f6c693e0a093c6c693e3c7370616e207374796c653d22636f6c6f723a23464646463030223e3c7370616e207374796c653d22666f6e742d66616d696c793a636f6d69632073616e73206d732c63757273697665223e3c7370616e207374796c653d22666f6e742d73697a653a31347078223e50686173656c6c7573206964206d6175726973206120656e696d20657569736d6f6420626c616e6469742e3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f6c693e0a093c6c693e3c7370616e207374796c653d22636f6c6f723a23464646463030223e3c7370616e207374796c653d22666f6e742d66616d696c793a636f6d69632073616e73206d732c63757273697665223e3c7370616e207374796c653d22666f6e742d73697a653a31347078223e447569732073616769747469732065726f73207175697320646f6c6f7220656c656966656e642c207365642072686f6e637573206f64696f20656765737461732e3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f6c693e0a093c6c693e3c7370616e207374796c653d22636f6c6f723a23464646463030223e3c7370616e207374796c653d22666f6e742d66616d696c793a636f6d69632073616e73206d732c63757273697665223e3c7370616e207374796c653d22666f6e742d73697a653a31347078223e51756973717565207375736369706974206d6173736120696e206d6173736120616c697175616d20696d706572646965742e3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f6c693e0a093c6c693e3c7370616e207374796c653d22636f6c6f723a23464646463030223e3c7370616e207374796c653d22666f6e742d66616d696c793a636f6d69632073616e73206d732c63757273697665223e3c7370616e207374796c653d22666f6e742d73697a653a31347078223e536564206163206f726369207365642065726f7320766f6c75747061742073757363697069742e3c2f7370616e3e3c2f7370616e3e3c2f7370616e3e3c2f6c693e0a3c2f6f6c3e0a, '', '', 1, '2015-03-17', '2015-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `jobopenings`
--

CREATE TABLE IF NOT EXISTS `jobopenings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `jobopenings`
--

INSERT INTO `jobopenings` (`id`, `title`, `description`, `status`, `created_date`, `modified_date`) VALUES
(12, 'MANAGER - MARKETING', 'CARNIVAL MEDIA NEEDS MANAGER MARKETING', 1, '2015-03-02 21:09:19', '2015-03-02 10:09:19'),
(14, 'Book1', '<ol>\n	<li><span style="font-size:14px">Domestic Travel means travelling outside the limits of one&rsquo;s HQ within India.</span></li>\n	<li><span style="font-size:14px">Local Travel means traveling within the limits of one&rsquo;s HQ city/town/place of work.</span></li>\n	<li><span style="font-size:14px">All travel, hotel and ticketing related jobs will be handled by the &lsquo;travel desk&rsquo; of the company in compliance with the policies given herewith. Make use of the system in the intranet.</span></li>\n</ol>\n', 1, '2015-05-08 22:43:41', '2015-05-08 17:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `kpi`
--

CREATE TABLE IF NOT EXISTS `kpi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `details` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `kpi`
--

INSERT INTO `kpi` (`id`, `user_id`, `details`, `status`, `created_date`, `modified_date`) VALUES
(10, 448, '<ol>\n	<li><span style="font-size:14px">Domestic Travel means travelling outside the limits of one&rsquo;s HQ within India.</span></li>\n	<li><span style="font-size:14px">Local Travel means traveling within the limits of one&rsquo;s HQ city/town/place of work.</span></li>\n	<li><span style="font-size:14px">All travel, hotel and ticketing related jobs will be handled by the &lsquo;travel desk&rsquo; of the company in compliance with the policies given herewith. Make use of the system in the intranet.</span></li>\n	<li><span style="font-size:14px">Approval of&nbsp; Directors or CEO must be obtained for air travel.</span></li>\n	<li><span style="font-size:14px">Tours need to be planned at least 15 days in advance. To avail of maximum cost benefit in ticketing, company suggests advanced planning beyond 30 days. Plan firmly and clearly to avoid last-minute cancellations and related loss to the company.</span></li>\n	<li><span style="font-size:14px">Unjustifiable cancellation cost will be debited to the employee&rsquo;s account. Director &amp; CHRO is authorized to determine the validity of the cancellation and the cost recovery.</span></li>\n	<li><span style="font-size:14px">For emergency tours by air (less than 3 days&rsquo; notice), valid reasons must be presented along with approval from a Director or CEO.</span></li>\n	<li><span style="font-size:14px">Air travel is allowed for journeys taking more than 12 hours by train or road. The HOD and the travelling employee should always use discretion to choose the most cost-effective option wherever possible.</span></li>\n	<li><span style="font-size:14px">Air travel is permitted only for employees from AGM and above category in the corporate office and L band employees at all other locations. Exception to this clause is management&rsquo;s discretion.</span></li>\n	<li><span style="font-size:14px">&nbsp;All air travels should be made by economy class. Business Class travel is permitted for Directors only in exceptional cases where economy class ticket is not available.</span></li>\n	<li><span style="font-size:14px">In places where company has guest house, employees will&nbsp; strictly make use of the same instead of hotels.</span></li>\n</ol>\n', 1, '2015-05-08 21:57:15', '2015-05-08 16:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `kra`
--

CREATE TABLE IF NOT EXISTS `kra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `details` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `kra`
--

INSERT INTO `kra` (`id`, `user_id`, `details`, `status`, `created_date`, `modified_date`) VALUES
(14, 448, '<ol>\n	<li><span style="font-size:14px">In all cases of discipline and behavior norms, the company&rsquo;s policy is based on self-discipline and self-regulation. Those who follow this dictum need not worry about punitive measures. &nbsp;</span></li>\n	<li><span style="font-size:14px">Report any violations or malpractices to the management without hesitation or fear.</span></li>\n	<li><span style="font-size:14px">Never be a silent spectator of unethical practices.</span></li>\n	<li><span style="font-size:14px">Discourage unethical and illegal tendencies in the budding stage itself.</span></li>\n	<li><span style="font-size:14px">A manager is duty bound to note any aberration/noncompliance and instruct the Staff Members to correct the course immediately.</span></li>\n</ol>\n', 1, '2015-05-08 21:52:02', '2015-05-08 16:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `leaders`
--

CREATE TABLE IF NOT EXISTS `leaders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post` varchar(300) NOT NULL,
  `img` varchar(200) NOT NULL,
  `Resize` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `leaders`
--

INSERT INTO `leaders` (`id`, `user_id`, `post`, `img`, `Resize`, `status`, `created_date`, `modified_date`) VALUES
(2, 451, 'Group MD & CEO - AOPL', 'Mr.Maneesh_.jpg', 'Mr.Maneesh__thumb.jpg', 1, '2015-02-17 21:54:34', '2015-05-06 16:08:09'),
(3, 328, 'Director & CHRO  - Carnival Group , CEO – Carnival Motion Pictures', 'Prasanth_intranet_9feb15.jpg', 'Prasanth_intranet_9feb15_thumb.jpg', 1, '2015-02-17 21:55:41', '2015-05-05 09:01:25'),
(4, 323, 'Director& CFO Carnival Group', 'MrACDinesh.jpg', 'MrACDinesh_thumb.jpg', 1, '2015-02-17 21:56:17', '2015-02-17 16:26:17'),
(5, 326, 'Director AOPL', 'MrJijo.jpg', 'MrJijo_thumb.jpg', 1, '2015-02-17 21:56:47', '2015-02-17 16:26:47'),
(6, 361, 'Director & CEO – Cranival  Films ', 'MrPVSunil.jpg', 'MrPVSunil_thumb.jpg', 1, '2015-02-17 21:57:17', '2015-02-24 18:32:11'),
(7, 4, 'Director MetroVartha & Head HR (South)', 'MrSasi.jpg', 'MrSasi_thumb.jpg', 1, '2015-02-17 21:57:57', '2015-02-24 18:20:25'),
(14, 402, 'DIRECTOR & COO (FOOD BUSINESS CARNIVAL GROUP)', 'MrSonyRavindranath.jpg', '', 1, '2015-05-04 18:21:49', '2015-05-04 12:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `lending_management`
--

CREATE TABLE IF NOT EXISTS `lending_management` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(200) NOT NULL,
  `resource_id` int(5) NOT NULL,
  `user_id` int(20) NOT NULL,
  `dos` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `borrow_status` varchar(10) NOT NULL,
  `returned_date` datetime NOT NULL,
  `fine` int(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=161 ;

--
-- Dumping data for table `lending_management`
--

INSERT INTO `lending_management` (`id`, `category`, `resource_id`, `user_id`, `dos`, `due_date`, `borrow_status`, `returned_date`, `fine`, `created_date`, `modified_date`) VALUES
(160, 'Book', 1, 448, '2015-05-18', '2015-05-11', 'pending', '0000-00-00 00:00:00', 0, '2015-05-13 21:11:54', '2015-05-13 15:42:12'),
(159, 'Case_studies', 1, 449, '2015-05-03', '2015-05-11', 'lost', '0000-00-00 00:00:00', 0, '2015-05-11 20:35:16', '2015-05-11 15:14:59'),
(158, 'Book', 1, 449, '2015-05-03', '2015-05-11', 'return', '2015-05-08 13:14:46', 0, '2015-05-07 21:21:24', '2015-05-08 10:14:08'),
(157, 'Book', 1, 448, '2015-05-01', '2015-05-08', 'lost', '0000-00-00 00:00:00', 0, '2015-05-07 15:21:34', '2015-05-07 09:51:47'),
(156, 'Book', 1, 448, '2015-05-01', '2015-05-06', 'return', '2015-05-07 11:51:26', 0, '2015-05-07 15:21:10', '2015-05-07 09:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `contact`, `city`, `address`, `status`, `created_date`, `modified_date`) VALUES
(3, 'Kunal Chawariya', '9619665205', 'Bhandup', ' Dreams the Mall, L.B.S. Marg, Near Bhandup Railway Station, Bhandup (West), Mumbai &ndash; 400 078', 1, '2015-02-10 23:14:26', '2015-02-10 17:44:26'),
(2, 'Kishore Kumar ', '09620960005', 'Bangalore', ' Carnival Films Pvt ltd,Rockline Mall No.08,Katha No.320,Jalahalli cross,Tumkur Road, Chokkasandra,Bangalore-560057', 1, '2015-02-10 23:13:35', '2015-02-10 17:43:35'),
(4, 'Nikunj Patel', '9619665204', 'Borivali', ' Annex Mall, Near Prithvi Enclave, Off. Western Express Highway,Borivali (East), Mumbai &ndash; 400 066.', 1, '2015-02-10 23:15:07', '2015-02-10 17:45:07'),
(5, 'Srinath K', '09787620777', 'Dindigul', ' Carnival Films pvt ltd,Aarthi grand No.15A,Aarthi theatre road, Dindigul-624001', 1, '2015-02-10 23:15:56', '2015-02-10 17:45:56'),
(6, 'Ashish Kansal', '7389900296', 'Indore', ' Malhar mega mall, Plot no.304, pu-4, Near C-21Mall, A.B. Road, INDORE (M.P.) - 452010.', 1, '2015-02-10 23:16:35', '2015-02-10 17:46:35'),
(7, 'Kabi Bannerji', '9830760060', 'Kolkata', ' Down Town Mall, IB-177 & 178, Sector III, Salt Lake, Near Columbia Asia Hospital, Kolkata –700 091', 1, '2015-02-10 23:17:25', '2015-02-16 15:05:14'),
(8, 'Renu Mohan', '08943333276', ' Kollam', 'Carnival Films Pvt ltd,Level 5,RP mall Kollam-691001', 1, '2015-02-13 20:30:59', '2015-02-13 15:00:59'),
(9, 'Vinod Vijayan', '8745997444', ' Sahibabad', 'Euro Park, Plot No. 39, Site IV, Sahibabad Industrial Area, Near Country Inn Hotel , District Ghaziabad, U.P. – 201012', 1, '2015-02-13 20:32:08', '2015-02-13 15:02:08'),
(10, 'Jiju Alexander', '08943354657', ' Thalayolaparambu', 'Carnival Films Pvt ltd,Aashirvad cineplex,Thalayolaparambu,Kottayam (dist)-686605', 1, '2015-02-13 20:33:11', '2015-02-13 15:03:11'),
(11, 'Deenanath Kannojia', '9619665203', ' Vasai', 'Dreams the Mall, Opp. Holy Family School,Evershine City, Vasai (East) District Thane.', 1, '2015-02-13 20:34:13', '2015-02-13 15:04:13'),
(12, 'Shihab M', '08943333523', 'Angamally', 'Carnival Films Pvt ltd,Anthapilly plantation 5th floor,KSRTC building,Angamally-683572', 1, '2015-02-16 14:24:39', '2015-02-25 15:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `medals`
--

CREATE TABLE IF NOT EXISTS `medals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `gold` int(5) NOT NULL,
  `silver` int(5) NOT NULL,
  `bronze` int(5) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `dop` date NOT NULL,
  `medalfor` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `medals`
--

INSERT INTO `medals` (`id`, `user_id`, `gold`, `silver`, `bronze`, `from_date`, `to_date`, `dop`, `medalfor`, `status`, `created_date`, `modified_date`) VALUES
(14, 400, 5, 5, 2, '0000-00-00', '0000-00-00', '2015-05-15', 'Good Work', 1, '0000-00-00 00:00:00', '2015-05-07 10:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE IF NOT EXISTS `noticeboard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `from_date` varchar(20) NOT NULL,
  `to_date` date NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `noticeboard`
--

INSERT INTO `noticeboard` (`id`, `title`, `description`, `from_date`, `to_date`, `status`, `created_date`, `modified_date`) VALUES
(22, 'Narendra Modi lauds Shashi Kapoor on getting Dadasaheb Phalke', '<ul>\n	<li><strong><span style="color:#AFEEEE"><span style="font-family:roboto,helvetica,sans-serif; font-size:15.6000003814697px">The 77-year-old Shashi Kapoor was on Sunday conferred the Dadasaheb Phalke Award, the highest honour in Indian cinema, by information and broadcasting minister Arun Jaitley at the iconic Prithvi Theatre in Mumbai.</span></span></strong></li>\n	<li><strong><span style="color:#AFEEEE"><span style="font-family:roboto,helvetica,sans-serif; font-size:15.6000003814697px">The event was attended by the entire Kapoor family besides several celebrities from the film industry. Spotted at the event were actors Amitabh Bachchan, Ranbir Kapoor, Rishi Kapoor, Abhishek Bachchan, Saif Ali Khan, Karisma Kapoor, among others.</span></span></strong></li>\n	<li><strong><span style="color:#AFEEEE"><span style="font-family:roboto,helvetica,sans-serif; font-size:15.6000003814697px">The actor could not travel to New Delhi when the National Awards were presented by President Pranab Mukherjee on May 3, because of ill health. Hence, he was awarded at the function in suburban Mumbai.</span></span></strong></li>\n</ul>\n', '2015-05-08', '2015-05-12', 1, '2015-05-11', '2015-05-11 10:12:18'),
(23, 'The tech business week: Google is Ireland''s most trusted firm and Uber bids for HERE', '<ul>\n	<li>\n	<h2><span style="color:#ADD8E6"><span style="font-size:12px"><span style="font-family:comic sans ms,cursive"><strong>Google has emerged as the most reputable organisation in Ireland, according to the annual Ireland RepTrak 2015 study. Unsurprisingly, the banks and Irish Water failed to make a dent in the survey.</strong></span></span></span></h2>\n	</li>\n	<li><span style="color:#ADD8E6"><span style="font-size:12px"><span style="font-family:comic sans ms,cursive"><strong>The other four organisations ranked in the top five were: Boots (2nd); Kellogg&rsquo;s (3rd); Bord Bia (4th), which was ranked for the first time this year; and last year&rsquo;s winner Volkswagen, ranked fifth.</strong></span></span></span></li>\n	<li><span style="color:#ADD8E6"><span style="font-size:12px"><span style="font-family:comic sans ms,cursive"><strong>Indigenous Irish organisations were also well represented in the top rankings, with five listed in coveted top 10&nbsp;positions. Bord Bia was the best-placed Irish organisation, with Irish League of Credit Unions (6th), Irish Rugby Football Union (7th), Smyth&#39;s&nbsp;Toys (9th) and An Post (10th) all making the top 10.</strong></span></span></span></li>\n	<li>\n	<h2><span style="color:#ADD8E6"><span style="font-size:12px"><span style="font-family:comic sans ms,cursive"><strong>Taxi-hailing app player Uber has submitted a bid for Nokia&rsquo;s HERE mapping service in a move that could see it reduce its dependence on Google.</strong></span></span></span></h2>\n	</li>\n	<li><span style="color:#ADD8E6"><span style="font-size:12px"><span style="font-family:comic sans ms,cursive"><strong>Uber, which is currently valued at more than&nbsp;US$41bn, is increasingly morphing into being a competitor of Google, which ironically owns a share in the company.</strong></span></span></span></li>\n	<li><span style="color:#ADD8E6"><span style="font-size:12px"><span style="font-family:comic sans ms,cursive"><strong>Uber is currently looking at making self-driving cars, while at the same time Google is looking at developing a driverless taxi service.</strong></span></span></span></li>\n	<li><span style="font-size:12px"><span style="font-family:comic sans ms,cursive"><strong><span style="color:#ADD8E6">Uber has submitted a bid for Here for as much as US$3bn, according to&nbsp;</span><em><a href="http://www.nytimes.com/2015/05/08/business/uber-joins-the-bidding-for-here-nokias-digital-mapping-service.html?_r=0" style="padding: 0px; margin: 0px; color: rgb(17, 85, 204); outline: none; text-decoration: none; font-weight: bold;" title="New York Times"><span style="color:#ADD8E6">The New York Times</span></a></em><span style="color:#ADD8E6">.</span></strong></span></span></li>\n</ul>\n', '2015-05-09', '2015-05-13', 1, '2015-05-11', '2015-05-11 10:55:30'),
(24, 'Live: Sensex jumps 370 points, public sector banks gain', '<ul>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>12:37pm:&nbsp;</strong>The S&amp;P BSE Sensex is now trading at 27,473.97, up 368.58 points, or +1.36%.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>12:01pm:&nbsp;</strong>Indian bonds advanced, pushing the 10-year sovereign yield down by the most in two months, on speculation that slowing inflation will allow RBI to add to two interest-rate cuts this year. The yield on the 8.4% notes due July 2024 fell 6 basis points, or 0.06 percentage point, to 7.92%.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>11:45am:&nbsp;</strong>The CNX PSU Bank Index gains 5% on the back of higher volume. Bank of Baroda is up 13.4%, Bank of India 5.2%, State Bank of India 4.6%, Oriental Bank of Commerce 4.5%, Union Bank of India 4%, Syndicate Bank 4%, Canara Bank 3.8%, IDBI Bank Ltd 3.7%, Andhra Bank 2.8% and Allahabad Bank 2.7%.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>11:23am:&nbsp;</strong>The BSE Sensex index jumps over 350 points, or 1.3%, after the Bank of Baroda shares jumped over 12%.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>11:05am:&nbsp;</strong>The S&amp;P BSE Sensex rises further to 27,409.74, up 304.35 points, or 1.12%.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>11:00am:&nbsp;</strong>Bank of Baroda shares are trading at&nbsp;Rs.161 on BSE, up 10.9% from their previous close, after the bank announced its March quarter results. Gross NPAs for the March quarter stood at 3.72% as against 2.94% in the same quarter last year. Net profit for the quarter fell 48.3% to&nbsp;Rs.598.35 crore compared with&nbsp;Rs.1,157.27 crore in the year-ago quarter.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>10:34am:&nbsp;</strong>The S&amp;P BSE Sensex is up 277.75 points, or 1.02%, to 27,383.14, while the Nifty is up 76.70 points, or 0.94%, to 8,268.20.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>10:33am:&nbsp;</strong>metal stocks are among the top gainers in the Sensex. Vedanta Ltd rises 3.5% to&nbsp;Rs.225.80, Hindalco Industries Ltd jumps 3.3% to&nbsp;Rs.143.60, while Tata Steel Ltd climbs 2.8% to&nbsp;Rs.377 as investors expect that there may be the higher demand for metals after China announced a cut in interest rates for the third time since November.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>10:30am:&nbsp;</strong>Investors will be looking forward to the Index of Industrial Production (IIP) data for March and consumer price inflation data for April to be released tomorrow. A&nbsp;<em>Bloomberg&nbsp;</em>poll estimates that the IIP will grow 2.9% in March as compared with 5% in February, while consumer price index-based inflation will stand at 4.9% in April compared with 5.17% in March.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>10:25am:&nbsp;</strong>Steel Authority of India Ltd (SAIL) rises 2.5% to&nbsp;Rs.69 after the news report said that the company has charted investment of&nbsp;Rs.1.5 trillion till 2025 to ramp up steel production from 24 million tonnes to 50 million tonnes.&nbsp;</span><a href="http://www.livemint.com/Companies/nC6DYHoEZmXz6fTE1HNUpI/SAIL-to-invest-Rs15-trillion-by-2025.html" style="color: rgb(241, 89, 42); text-decoration: none;" target="_blank"><span style="color:#ADD8E6">Read more</span></a><span style="color:#ADD8E6">.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>10:20am:&nbsp;</strong>Kansai Nerolac Paints Ltd is trading up 4.2% after the company reported a 34.6% increase in its net profit to&nbsp;Rs.60.37 crore in the March quarter compared with&nbsp;Rs.44.85 crore in the same quarter last year.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>10:15am:&nbsp;</strong>Orient Cement Ltd advances 4.5% to&nbsp;Rs.180 after the company reported a 224% jump in its net profit to&nbsp;Rs.85.47 crore against&nbsp;Rs.26.34 crore a year ago.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>10:07am:&nbsp;</strong>Syndicate Bank jumps 4.5% to&nbsp;Rs.107 after the lender reported a marginal 2% growth in net profit to&nbsp;Rs.417 crore in the March quarter as compared with&nbsp;Rs.409.3 crore a year ago.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>10:02am:&nbsp;</strong>Relaxo Footwears Ltd surges 7.2% to&nbsp;Rs.759 after the company said in a notice to BSE that its board has approved issuing 1:1 bonus share and a dividend of&nbsp;Rs.1 per share.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>10:00am:&nbsp;</strong>Gillette India Ltd climbs 5.7% to&nbsp;Rs.4,797.20 after the company reported a 260% jump in its net profit in the March quarter to&nbsp;Rs.30.76 crore as compared with&nbsp;Rs.8.48 crore a year ago.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>9:58am:&nbsp;</strong>Federal Bank Ltd rises 3.4% to&nbsp;Rs.135.65 after the company said in a notice to BSE that it will consider bonus issue on 16 May.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>9:55am:&nbsp;</strong>Bank of Baroda is trading down 0.17% ahead of its March quarter earnings due later today. According to estimates of 30&nbsp;<em>Bloomberg&nbsp;</em>analysts, the bank may post a net profit at&nbsp;Rs.948.50 crore.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>9:53am:&nbsp;</strong>The S&amp;P BSE Sensex is trading up 239.79 points, or 0.88%, to 27,345.18.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>9:47am:&nbsp;</strong>Earnings today&mdash;Adani Power Ltd, Den Networks Ltd, Electrosteel Steels Ltd, Havells India Ltd, Orient Paper and Industries Ltd, Phoenix Mills Ltd and SRF Ltd.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>9:45am:&nbsp;</strong>Hindalco Industries Ltd jumps 2.8% to&nbsp;Rs.142.90, while Hero MotoCorp Ltd is trading up 2% to&nbsp;Rs.2,347.70.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>9:44am:&nbsp;</strong>Sensex losers&mdash;Hindustan Unilever Ltd falls 1.7% to&nbsp;Rs.879.55, while HDFC Bank Ltd is down 0.5% to&nbsp;Rs.978.25.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>9:42am:&nbsp;</strong>Sectoral indices&mdash;The BSE realty index is the top gainer, up 1.6%, followed by metal and auto indices, up 1.5% and 1.3%, respectively. The BSE consumer durables and FMCG indices were top losers, down 0.2% each.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>9:40am:&nbsp;</strong>The Sensex is trading higher by 0.86%, or 233.87 points, at 27,339.26, while the 50-share CNX Nifty of the National Stock Exchange is up 0.77%, or 63.15 points, to 8,254.65.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>9:30am:&nbsp;</strong>Macquarie today said that Indian markets are trading closer to the lower end of long-term historical valuation band at 12.8x FY17 earnings, adding that similar-sized corrections have been seen in previous bull cycles and have been good entry points.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6">Macquarie said top stocks that have fallen more than 15% and look attractive include ITC, Sun Pharmaceutical Industries and Asian Paints.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>9:20am:&nbsp;</strong>The markets open on a srong note, with the key indices up as much as 0.8%, as China&rsquo;s cut in interest rates spurred gains in Asian equities.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>9:15am:&nbsp;</strong>The Indian rupee strengthens for a second consecutive session to 63.87 per dollar compared with its previous close of 63.94.&nbsp;</span><a href="http://www.livemint.com/Money/9l4YAmKaC3kqUhv1KNx3UI/Rupee-opens-higher-at-6387-per-dollar.html" style="color: rgb(241, 89, 42); text-decoration: none;" target="_blank"><span style="color:#ADD8E6">Read more</span></a><span style="color:#ADD8E6">.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>9:14am:&ensp;</strong>The dollar strengthens to 119.87 yen from 119.79 in late trading on Friday. The euro slips to $1.1155 from $1.1223.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>9:10am:&nbsp;</strong>Benchmark US crude slips 4 cents to $59.35 a barrel in electronic trading on the New York Mercantile Exchange. Brent crude edges up 4 cents to $66.20 in London.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>9:05am:&nbsp;</strong>Japan&rsquo;s Nikkei 225 rises 1.3% to 19,625.20 and South Korea&rsquo;s Kospi gains 0.9% to 2,103.93. Hong Kong&rsquo;s Hang Seng adds 0.7% to 27,761.96 and the Shanghai Composite Index in mainland China advances 1.2% to 4,255.73. Australia&rsquo;s S&amp;P/ASX 200 is up 0.2% to 5,646.60. Markets in Southeast Asia also rise.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>9:00am:&nbsp;</strong>Asian shares jump as investors cheered China&rsquo;s latest cut to interest rates to bolster its flagging economy. The People&rsquo;s Bank of China cut its benchmark one-year lending rate by 25 basis points to 5.1% from Monday, and its benchmark deposit rate by the same amount to 2.25%.</span></span></span></li>\n	<li><span style="font-family:courier new,courier,monospace"><span style="font-size:14px"><span style="color:#ADD8E6"><strong>8:55am:&nbsp;</strong>The US stock market ended last week with its best day in two months on good news about the job market. The Dow Jones industrial average jumped 1.5% to close at 18,191.11 while the Standard and Poor&rsquo;s 500 added 1.4% to 2,116.10, its biggest gain since mid-March. The Nasdaq composite rose 1.2% to 5,003.55.</span></span></span></li>\n</ul>\n', '2015-05-11', '2015-05-11', 1, '2015-05-11', '2015-05-11 10:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE IF NOT EXISTS `policies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `desc` text NOT NULL,
  `img` varchar(200) NOT NULL,
  `Resize` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `title`, `desc`, `img`, `Resize`, `status`, `created_date`, `modified_date`) VALUES
(14, '1. ETHICS POLICIES & CODE OF CONDUCT', '<ol>\n	<li><span style="font-size:14px">Follow company rules and policies completely and willingly.</span></li>\n	<li><span style="font-size:14px">Respect everyone and earn respect in return.</span></li>\n	<li><span style="font-size:14px">Honesty and integrity are sacrosanct; any violation is never compromised.</span></li>\n	<li><span style="font-size:14px">No employee shall receive any gifts, cuts, financial help including loans or any kind of enticements from vendors / service providers / business&nbsp; partners.</span></li>\n	<li><span style="font-size:14px">Copying and sharing company&rsquo;s files/data/information in any form with a third party is prohibited.</span></li>\n	<li><span style="font-size:14px">Sharing of company&rsquo;s strategies and business initiatives with anybody else other than those officially approved by the management is disallowed.</span></li>\n	<li><span style="font-size:14px">No personal / private jobs are to be done at company premises during office hours.</span></li>\n	<li><span style="font-size:14px">Allegations or accusations against anybody, complaints without sufficient proof or evidence, will not be entertained.</span></li>\n	<li><span style="font-size:14px">Women employees are to be treated honorably to avoid any kind of sexual embarrassments to them.</span></li>\n	<li><span style="font-size:14px">Self-discipline in terms of reaching office in time, attending meetings on time, keeping timelines, entering data in official forms fully and clearly, responding to official communications and observing rules and regulations are always appreciated.</span></li>\n	<li><span style="font-size:14px">No social media indulgence, unless part of permitted&nbsp; official duty, during office hours -&nbsp; facebook, twitter, linkedin, and the likes.</span></li>\n	<li><span style="font-size:14px">No absence from work without intimation / approved leave.</span></li>\n</ol>\n', '', '', 1, '2015-02-17', '2015-02-18'),
(15, 'Unacceptables', '<ol>\n	<li><span style="font-size:14px">Habitual late coming</span></li>\n	<li><span style="font-size:14px">Misuse / Unauthorized use of Office Equipment /Facilities</span></li>\n	<li><span style="font-size:14px">Willful damage/vandalizing property</span></li>\n	<li><span style="font-size:14px">Consuming Alcohol&nbsp; / Drugs on duty and/or in company premises</span></li>\n	<li><span style="font-size:14px">Tampering / Falsification of Documents or Information</span></li>\n	<li><span style="font-size:14px">Rude / Violent /Aggressive behavior towards colleagues and/or customers</span></li>\n	<li><span style="font-size:14px">Dress / attire in violation of company policy</span></li>\n	<li><span style="font-size:14px">Plagiarizing / theft / misuse of intellectual property</span></li>\n	<li><span style="font-size:14px">Refusal to allow security personnel to inspect one&rsquo;s work space, baggage or belongingness at the security gate.</span></li>\n	<li><span style="font-size:14px">Not swiping / punching biometric attendance system.</span></li>\n	<li><span style="font-size:14px">Making negative statements about the company , one&rsquo;s superiors or management in private or public.</span></li>\n	<li><span style="font-size:14px">Casual attitude at workplace causing undue delay, cost escalation or loss of productivity.</span></li>\n	<li><span style="font-size:14px">Misplacing / losing company&rsquo;s properties due to carelessness.</span></li>\n	<li><span style="font-size:14px">Involvement in any proven criminal charges by the police.</span></li>\n</ol>\n', '', '', 1, '2015-02-17', '2015-02-18'),
(16, '2. EMPLOYEE OBLIGATIONS ON ETHICS', '<ol>\n	<li><span style="font-size:14px">In all cases of discipline and behavior norms, the company&rsquo;s policy is based on self-discipline and self-regulation. Those who follow this dictum need not worry about punitive measures. &nbsp;</span></li>\n	<li><span style="font-size:14px">Report any violations or malpractices to the management without hesitation or fear.</span></li>\n	<li><span style="font-size:14px">Never be a silent spectator of unethical practices.</span></li>\n	<li><span style="font-size:14px">Discourage unethical and illegal tendencies in the budding stage itself.</span></li>\n	<li><span style="font-size:14px">A manager is duty bound to note any aberration/noncompliance and instruct the Staff Members to correct the course immediately.</span></li>\n</ol>\n', '', '', 1, '2015-02-17', '2015-02-18'),
(17, '3.	OFFICE TIMINGS & ATTENDANCE', '<ol>\n	<li><span style="font-size:14px">CORPORATE OFFICE TIMING&nbsp; - 10.00 AM TO 6.00 PM MONDAY TO FRIDAY. ALL SATURDAYS ARE HOLIDAYS.</span></li>\n	<li><span style="font-size:14px">Timings of Branch Offices and Multiplexes are published at the respective venues.</span></li>\n	<li><span style="font-size:14px">Under extremely unmanageable situations, 3 late comings not later than 15 minutes will be ignored.</span></li>\n	<li><span style="font-size:14px">Beyond 3 days, any late coming will&nbsp; invite deduction of half day leave from NPL.</span></li>\n	<li><span style="font-size:14px">Habitual late coming will invite disciplinary actions from the management.</span></li>\n	<li><span style="font-size:14px">Attendance for Salary will be accounted from 23rd of the month to 22nd of the next month. &nbsp;</span></li>\n	<li><span style="font-size:14px">Attendance must be recorded by swiping/punching the biometric machines wherever present. In places where biometric machines are not present, attendance must be registered by signing the muster.</span></li>\n	<li><span style="font-size:14px">Lunch time duration: 30 minutes&nbsp; between 1.00 pm and 2.30 pm. &nbsp;</span></li>\n</ol>\n', '', '', 1, '2015-02-17', '2015-02-28'),
(18, '4. PAID HOLIDAYS', '<ol>\n	<li><span style="font-size:14px">The Management in the beginning of the year declares and&nbsp; circulates a list of holidays among all employees at all Establishments and Corporate office.</span></li>\n	<li><span style="font-size:14px">Mandatory national holidays are 26 Jan, 15 August and 2 October. Additionally 1 May is observed as a holiday in Maharashtra.</span></li>\n	<li><span style="font-size:14px">Any employees in bands S and O working on any of the above 4&nbsp; holidays, would be entitled to one day&rsquo;s salary extra and a compensatory holiday.</span></li>\n</ol>\n', '', '', 1, '2015-02-17', '2015-02-18'),
(19, '5. DRESS CODE', '<ul>\n	<li><span style="font-size:14px">The dress code at the<strong> Corporate office</strong> and <strong>Branch Offices</strong> will be as follows&hellip;</span></li>\n</ul>\n\n<p><span style="font-size:14px">&nbsp;<strong><span style="color:#000000">&nbsp; &nbsp;Monday to Thursday -</span></strong><br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;Female Employees&nbsp; - Formals (Salwar Kamiz, Western, Sari, etc. )<br />\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;Male Employees &ndash; Formals with Leather Shoes as footwear.<br />\n&nbsp;&nbsp; &nbsp;<strong>On Friday &amp; Saturday &ndash;</strong> Semi Casuals, Smart Casuals. &nbsp;</span></p>\n\n<ul>\n	<li><span style="font-size:14px">Office boys and Chauffeurs will wear official uniforms given by the company.</span></li>\n	<li><span style="font-size:14px">Senior Managers and Directors are advised to wear formal suits while meeting important clients, attending&nbsp; seminars or business conferences</span></li>\n</ul>\n\n<p><strong><span style="font-size:14px">Multiplex</span></strong></p>\n\n<ul>\n	<li><span style="font-size:14px; line-height:1.6">Specified categories of employees are entitled for 2 / 3 pairs of uniforms every year.</span></li>\n	<li><span style="font-size:14px">&nbsp;<strong><span style="color:rgb(255, 0, 0)">All employees provided with uniforms are required to wear the uniform while on duty.</span></strong></span></li>\n</ul>\n', '', '', 1, '2015-02-17', '2015-03-13'),
(20, '6. TRAVEL, BOARDING & LODGING POLICIES', '<ol>\n	<li><span style="font-size:14px">Domestic Travel means travelling outside the limits of one&rsquo;s HQ within India.</span></li>\n	<li><span style="font-size:14px">Local Travel means traveling within the limits of one&rsquo;s HQ city/town/place of work.</span></li>\n	<li><span style="font-size:14px">All travel, hotel and ticketing related jobs will be handled by the &lsquo;travel desk&rsquo; of the company in compliance with the policies given herewith. Make use of the system in the intranet.</span></li>\n	<li><span style="font-size:14px">Approval of&nbsp; Directors or CEO must be obtained for air travel.</span></li>\n	<li><span style="font-size:14px">Tours need to be planned at least 15 days in advance. To avail of maximum cost benefit in ticketing, company suggests advanced planning beyond 30 days. Plan firmly and clearly to avoid last-minute cancellations and related loss to the company.</span></li>\n	<li><span style="font-size:14px">Unjustifiable cancellation cost will be debited to the employee&rsquo;s account. Director &amp; CHRO is authorized to determine the validity of the cancellation and the cost recovery.</span></li>\n	<li><span style="font-size:14px">For emergency tours by air (less than 3 days&rsquo; notice), valid reasons must be presented along with approval from a Director or CEO.</span></li>\n	<li><span style="font-size:14px">Air travel is allowed for journeys taking more than 12 hours by train or road. The HOD and the travelling employee should always use discretion to choose the most cost-effective option wherever possible.</span></li>\n	<li><span style="font-size:14px">Air travel is permitted only for employees from AGM and above category in the corporate office and L band employees at all other locations. Exception to this clause is management&rsquo;s discretion.</span></li>\n	<li><span style="font-size:14px">&nbsp;All air travels should be made by economy class. Business Class travel is permitted for Directors only in exceptional cases where economy class ticket is not available.</span></li>\n	<li><span style="font-size:14px">In places where company has guest house, employees will&nbsp; strictly make use of the same instead of hotels.</span></li>\n</ol>\n', '', '', 1, '2015-02-17', '2015-02-23'),
(21, '7. TRAVEL ADVANCE AND EXPENSE SETTLEMENT', '<div>a. Employees going on tour can take a cash advance to meet the cash expenses calculated on the basis of daily average and duration of tour.</div>\n\n<div>&nbsp;</div>\n\n<div>b. Most hotel bills will be settled on &lsquo;Bill to Company&rsquo; basis. Have clarity about mode of payment before starting the journey.</div>\n\n<div>&nbsp;</div>\n\n<div>c. To avoid the risk of carrying too much cash, the employee can use own credit/debit card and claim the amount spent on return.</div>\n\n<div>&nbsp;</div>\n\n<div>d. Travel expense settlement should be done within 3 days from the date&nbsp; of return with all supporting bills/invoices/ticket copies.</div>\n\n<div>&nbsp;</div>\n\n<div>e. If an employee has pending travel expense settlement, no fresh advance is paid unless the previous account is fully settled.</div>\n\n<p>Unsubstantiated claims or claims above one&rsquo;s limits will be deducted without any debate.</p>\n', '', '', 1, '2015-02-23', '2015-03-13'),
(22, '8. BOARDING & LODGING LIMITS FOR CORPORATE EMPLOYEES', '<table border="0" cellpadding="0" cellspacing="0" style="width:808px">\n	<tbody>\n		<tr>\n			<td rowspan="2" style="height:106px; width:127px">\n			<p>Band</p>\n			</td>\n			<td rowspan="2" style="width:291px">\n			<p>CITIES</p>\n			</td>\n			<td colspan="2" style="width:391px">\n			<p>Maximum limit per day (Rs.)</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:76px; width:188px">\n			<p>Lodging &amp; Boarding / Total Accommodation &amp; Food Expense Limits</p>\n			</td>\n			<td style="width:203px">\n			<p>Local Conveyance&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan="2" style="height:75px; width:127px">\n			<p>CM</p>\n			</td>\n			<td style="width:291px">\n			<p>MUM, DEL, KOL, BLR, HYD, CHEN, GOA</p>\n			</td>\n			<td style="width:188px">\n			<p>4000</p>\n			</td>\n			<td rowspan="2" style="width:203px">\n			<p>Taxi</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:40px; width:291px">\n			<p>OTHER CITIES</p>\n			</td>\n			<td style="width:188px">\n			<p>3000</p>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan="2" style="height:70px; width:127px">\n			<p>CE</p>\n			</td>\n			<td style="width:291px">\n			<p>MUM, DEL, KOL, BLR, HYD, CHEN, GOA</p>\n			</td>\n			<td style="width:188px">\n			<p>2000</p>\n			</td>\n			<td rowspan="2" style="width:203px">\n			<p>Taxi/Auto</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:35px; width:291px">\n			<p>OTHER CITIES</p>\n			</td>\n			<td style="width:188px">\n			<p>1500</p>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan="2" style="height:54px; width:127px">\n			<p>CO</p>\n			</td>\n			<td style="width:291px">\n			<p>MUM, DEL, KOL, BLR, HYD, CHEN, GOA</p>\n			</td>\n			<td style="width:188px">\n			<p>1500</p>\n			</td>\n			<td rowspan="2" style="width:203px">\n			<p>Auto</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:19px; width:291px">\n			<p>OTHER CITIES</p>\n			</td>\n			<td style="width:188px">\n			<p>1000</p>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan="2" style="height:55px; width:127px">\n			<p>CS</p>\n			</td>\n			<td style="width:291px">\n			<p>MUM, DEL, KOL, BLR, HYD, CHEN, GOA</p>\n			</td>\n			<td style="width:188px">\n			<p>1300</p>\n			</td>\n			<td rowspan="2" style="width:203px">\n			<p>Auto</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:19px; width:291px">\n			<p>OTHER CITIES</p>\n			</td>\n			<td style="width:188px">\n			<p>1000</p>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan="2" style="height:55px; width:127px">\n			<p>CT</p>\n			</td>\n			<td style="width:291px">\n			<p>MUM, DEL, KOL, BLR, HYD, CHEN, GOA</p>\n			</td>\n			<td style="width:188px">\n			<p>1500</p>\n			</td>\n			<td rowspan="2" style="width:203px">\n			<p>Auto</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:19px; width:291px">\n			<p>OTHER CITIES</p>\n			</td>\n			<td style="width:188px">\n			<p>1000</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>Please note : the company has identified a set of hotels in most cities for its employees at negotiated rates. Please contact Travel Desk or HR-Admin for knowing these hotels as per one&rsquo;s eligibility. The above limits cover total expenditure on account of room rent, food, laundry and other incidentals except local conveyance.</p>\n\n<hr />\n<p>&nbsp;</p>\n', '', '', 1, '2015-02-23', '2015-02-23'),
(24, '10.	LOCAL TRAVEL WITHIN HQ CITY/TOWN', '<table border="0" cellpadding="0" cellspacing="0" style="width:808px">\n	<tbody>\n		<tr>\n			<td style="height:106px; width:127px">\n			<p>Band</p>\n			</td>\n			<td colspan="2" style="width:681px">\n			<p style="text-align: center;">MODES of TRAVEL &amp; ELIGIBILITY</p>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan="2" style="height:66px; width:127px">\n			<p><strong>L</strong></p>\n			</td>\n			<td rowspan="2" style="width:321px">\n			<p>&nbsp;</p>\n\n			<p>RENT A CAR / HIRED CAB / COMPANY VEHICLE</p>\n\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:360px">\n			<p>SELF-OWNED &nbsp;4-WHEELER</p>\n\n			<p>Rs.8 per KM.</p>\n\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:31px; width:360px">\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan="2" style="height:75px; width:127px">\n			<p>ALL</p>\n\n			<p>OTHER</p>\n\n			<p>BANDS</p>\n			</td>\n			<td rowspan="2" style="width:321px">\n			<p>TAXI / AUTO / BUS / LOCAL TRAIN depending on the context and&nbsp; time</p>\n			</td>\n			<td style="width:360px">\n			<p>SELF-OWNED 4-WHEELER&ndash; Rs.8 / KM</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:40px; width:360px">\n			<p>TWO-WHEELER &ndash; Rs.3 per KM</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n', '', '', 1, '2015-02-24', '2015-02-24'),
(25, '11.  PC/LAPTOP POLICY', '<div>&bull; The PC/Laptop must be Company owned if it is to be used inside the Company premises&nbsp;&nbsp; by employees.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull; Only IT department staff will be allowed to load software on the Company owned laptops.&nbsp;</div>\n\n<div>&nbsp;</div>\n\n<div>&bull; Laptop being company property, in case of loss or theft, the employee will bear the full cost.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull; Any damage or repair charges paid by the company in the event of &lsquo;mishandling&rsquo; of the laptop whilst the laptop was in possession of the employee can be recovered from the employee&rsquo;s salary. This does not apply to normal hardware/software malfunctions or manufacturing defect.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull; As soon as the employee terminates his or her services from the company the laptop should be handed over to the IT department.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull; The IT department reserves the right to check the contents of the laptop any time during the period of employment of the employee.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull; Under no circumstances should the laptop be left unattended in public, in a hotel room or checked in as &lsquo;registered baggage&rsquo; when traveling.</div>\n', '', '', 1, '2015-02-24', '2015-03-13'),
(23, '9. BOARDING & LODGING LIMITS FOR MULTIPLEX & FOOD OUTLET EMPLOYEES', '<table border="0" cellpadding="0" cellspacing="0" style="width:808px">\n	<tbody>\n		<tr>\n			<td rowspan="2" style="height:116px; width:184px">\n			<p>Band</p>\n			</td>\n			<td rowspan="2" style="width:233px">\n			<p>CITIES</p>\n			</td>\n			<td colspan="2" style="width:391px">\n			<p>Maximum limit per day (Rs.)</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:84px; width:188px">\n			<p>Lodging &amp; Boarding / Total Accommodation &amp; Food Expense Limits</p>\n			</td>\n			<td style="width:203px">\n			<p>Local Conveyance</p>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan="2" style="height:72px; width:184px">\n			<p>L- GM/DGM/</p>\n\n			<p>AGM/Sr. Mgr</p>\n			</td>\n			<td style="width:233px">\n			<p>MUM, DEL, KOL, BLR, HYD, CHEN, GOA</p>\n			</td>\n			<td style="width:188px">\n			<p>3500</p>\n			</td>\n			<td style="width:203px">\n			<p>Taxi</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:34px; width:233px">\n			<p>OTHER CITIES</p>\n			</td>\n			<td style="width:188px">\n			<p>2500</p>\n			</td>\n			<td style="width:203px">\n			<p>Taxi</p>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan="2" style="height:83px; width:184px">\n			<p>M - Business Head/Cinema Mgr</p>\n			</td>\n			<td style="width:233px">\n			<p>MUM, DEL, KOL, BLR, HYD, CHEN, GOA</p>\n			</td>\n			<td style="width:188px">\n			<p>2500</p>\n			</td>\n			<td rowspan="2" style="width:203px">\n			<p>Taxi/Auto</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:44px; width:233px">\n			<p>OTHER CITIES</p>\n			</td>\n			<td style="width:188px">\n			<p>2000</p>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan="2" style="height:57px; width:184px">\n			<p>E - Duty Manager/</p>\n\n			<p>Sr. Captain</p>\n			</td>\n			<td style="width:233px">\n			<p>MUM, DEL, KOL, BLR, HYD, CHEN, GOA</p>\n			</td>\n			<td style="width:188px">\n			<p>2000</p>\n			</td>\n			<td style="width:203px">\n			<p>Taxi/Auto</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:21px; width:233px">\n			<p>OTHER CITIES</p>\n			</td>\n			<td style="width:188px">\n			<p>1500</p>\n			</td>\n			<td style="width:203px">\n			<p>Taxi/Auto</p>\n\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n', '', '', 1, '2015-02-23', '2015-02-23'),
(26, '12.	SIM CARD POLICY', '<div>&bull; Cellular phone SIM card will be allotted for official &amp; personal use on need basis to employees of certain departments as decided by the management .</div>\n\n<div>&nbsp;</div>\n\n<div>&bull; All bills of cellular phones usage should be checked and signed by the user and routed through the Admin Dept. for payment.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull; In case the Employee to whom the SIM card is allotted leaves the services he/she should surrender the SIM card back and the same shall be re-allotted to another eligible Employee.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull; All employees who fall under this scheme are required to keep their Mobile phones on the &ldquo;ON&rdquo; mode 24 hrs a day.</div>\n', '', '', 1, '2015-02-24', '2015-03-13'),
(27, '13.  REIMBURSEMENT OF MOBILE BILL', '<div>&bull;&nbsp;<u>REIMBURSEMENT OF MOBILE BILL</u></div>\n\n<div>&bull; Cost of mobile calls made for official purpose would be reimbursed to employees on submission of the original bill.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull; The limits above Rs.1000 per month are usage based and hence individual. The management will sanction the limits on a case to case to basis and document the same for reimbursement.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull; All employees in the bands of M will be eligible for a maximum limit of Rs.750/- p.m. and others in the bands of E, O, S and T are eligible for Rs.500/- p.m. as reimbursement against submission of original&nbsp; bill.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull; On overseas travel Sim cards from Matrix could be used for reduced expenses on mobile.</div>\n', '', '', 1, '2015-02-24', '2015-03-13'),
(28, '14. CAPITAL EXPENDITURE POLICY', '<div>&bull; Incase there arises the need to purchase / replace any equipment in a property, a Capex form needs to be filled by the &nbsp;head of the property / department and submitted to the CEO. Approval of Regional and National Head of Operations must be obtained before presenting the proposal to CEO.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull; Quotations from minimum three vendors to a maximum five vendors must be collected by the purchasing department/manager before deciding the final purchase. A comparison report needs to be prepared and presented to the CFO.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull; Any expenditure above Rs. 5 Lakhs will be decided by a purchase committee comprising of Director, CEO, CFO, COO &amp; Functional Head with the Chairman as the final approving authority.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull; Purchases between Rs.50,000 and 500,000/-&nbsp; will be decided by the CEO and CFO jointly.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull; Purchases below 50,000/- will be decided by the CEO and COO jointly.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull; On selection of the&nbsp; vendor, the purchase department will issue a PO to the vendor with the required terms &amp; conditions of procurement of the said equipment/work.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull; The Cost of the new / replaceable equipments needs to be accounted in Capital expenditure in the book of records and assets within the company.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull; After procurement the asset coding should be done.</div>\n', '', '', 1, '2015-02-24', '2015-03-13'),
(29, '15. MEDIA MANAGEMENT', '<div>&bull;All media matters relating to the group will be discussed by the Chairman or those deputed by the Chairman with a specific brief.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull;No employee should discuss or a answer any query from the Media &ndash; print, electronic, digital &ndash; about the company.</div>\n', '', '', 1, '2015-02-24', '2015-02-24'),
(30, '16. BAND & GRADES - CORPORATE', '<div>&bull;The company follows a band and grade structure with the following objectives:</div>\n\n<div style="margin-left:1.1in;">&bull; Parity in designation, qualification, experience and compensation</div>\n\n<div style="margin-left:1.1in;">&bull; Planning and deciding designation, salary structure and training</div>\n\n<div style="margin-left:1.1in;">&bull;&nbsp;Rewarding good performance by granting grade promotion within a band</div>\n\n<div style="margin-left:1.1in;">&bull;&nbsp;To give clarity on career path to all employees</div>\n\n<p style="margin-left:1.1in; text-align:center">&nbsp;</p>\n\n<p style="margin-left:1.1in; text-align:center"><span style="color:#FF0000"><span style="font-size:14px"><strong>The band and grade structure for corporate office is shown below:</strong></span></span></p>\n\n<table border="0" cellpadding="0" cellspacing="0" style="width:880px">\n	<tbody>\n		<tr>\n			<td style="height:25px; width:161px">\n			<p style="text-align:center">ROLES</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">BANDS</p>\n			</td>\n			<td style="width:220px">\n			<p style="text-align:center">DESIGNATIONS</p>\n			</td>\n			<td colspan="9" style="width:441px">\n			<p style="text-align:center">GRADES</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:43px; width:161px">\n			<p style="text-align:center">LEADERSHIP/PLANNING/ DIRECTION/DECISIONS</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">CL</p>\n			</td>\n			<td style="width:220px">\n			<p style="text-align:center">AVP, VP, Sr VP, PRESIDENT, CFO, CHRO, CMO, COO, CEO excluding directors</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">L1</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">L2</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">L3</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">L4</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">L5</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">L6</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">L7</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">L8</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">L9</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:29px; width:161px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:220px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:40px; width:161px">\n			<p>MANAGEMENT &amp; EXECUTION PLANNING/ACCOUNTABILITY/ SUPERVISION</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">CM</p>\n			</td>\n			<td style="width:220px">\n			<p style="text-align:center">ASST. MGR, MGR, SR.MGR, AGM, DGM, GM, SR.GM</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">M1</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">M2</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">M3</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">M4</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">M5</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">M6</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">M7</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">M8</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">M9</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:22px; width:161px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:220px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:52px; width:161px">\n			<p style="text-align:center">ASSISTING THE MANAGEMENT, SEMI-SUPERVISORY &amp; EXECUTION</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">CE</p>\n			</td>\n			<td style="width:220px">\n			<p style="text-align:center">EXE. ASST / EXECUTIVE, SR. EXECUTIVE, ASST. MGR</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">E1</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">E2</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">E3</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">E4</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">E5</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">E6</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">E7</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">E8</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">E9</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:20px; width:161px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:220px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:43px; width:161px">\n			<p style="text-align:center">EXECUTION / PROCESS RUNNING&nbsp; / SUPPORTING JOBS</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">CO</p>\n			</td>\n			<td style="width:220px">\n			<p style="text-align:center">OFFICER, SR OFFICER</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">O1</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">O2</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">O3</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">O4</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">O5</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">O6</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">O7</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">O8</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">O9</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:17px; width:161px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:220px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:55px; width:161px">\n			<p style="text-align:center">EXECUTION / WORKERS/ GENERAL STAFF</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">CS</p>\n			</td>\n			<td style="width:220px">\n			<p style="text-align:center">&nbsp;OFFICE BOYS / CHAUFFERS/FRONT DESK EXE / RECEPTIONIST</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">S1</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">S2</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">S3</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">S4</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">S5</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">S6</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">S7</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">S8</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">S9</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:19px; width:161px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:220px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:38px; width:161px">\n			<p style="text-align:center">FUTURE TALENTS</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">CT</p>\n			</td>\n			<td style="width:220px">\n			<p style="text-align:center">GRADUTE / TECHNICAL / MBA-MANAGEMENT</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">T1</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">T2</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">T3</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">T4</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">T5</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">T6</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">T7</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">T8</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">T9</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:26px; width:161px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:220px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p style="text-align:center">&nbsp;</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<p style="margin-left:1.1in">&nbsp;</p>\n', '', '', 1, '2015-02-24', '2015-03-10'),
(31, '17. BAND & GRADES - MULTIPLEX', '<div style="text-align: center;"><span style="font-size:16px"><span style="color:#FF0000"><strong>&bull; Band and Grade Structure for Multiplex</strong></span></span></div>\n\n<div style="text-align: center;">&nbsp;</div>\n\n<div style="text-align: center;">\n<table border="0" cellpadding="0" cellspacing="0" style="width:824px">\n	<tbody>\n		<tr>\n			<td style="height:4px; width:59px">\n			<p>BANDS</p>\n			</td>\n			<td style="width:316px">\n			<p>DESIGNATIONS</p>\n			</td>\n			<td colspan="9" style="width:449px">\n			<p>GRADES</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:37px; width:59px">\n			<p>ML</p>\n			</td>\n			<td style="width:316px">\n			<p>GM/DGM [REGIONAL BUSINESS HEAD], MULTIPLEX BUSINESS HEAD</p>\n			</td>\n			<td style="width:59px">\n			<p>L1</p>\n			</td>\n			<td style="width:47px">\n			<p>L2</p>\n			</td>\n			<td style="width:47px">\n			<p>L3</p>\n			</td>\n			<td style="width:47px">\n			<p>L4</p>\n			</td>\n			<td style="width:47px">\n			<p>L5</p>\n			</td>\n			<td style="width:47px">\n			<p>L6</p>\n			</td>\n			<td style="width:47px">\n			<p>L7</p>\n			</td>\n			<td style="width:47px">\n			<p>L8</p>\n			</td>\n			<td style="width:59px">\n			<p>L9</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:31px; width:59px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:316px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:34px; width:59px">\n			<p>MM</p>\n			</td>\n			<td style="width:316px">\n			<p>Duty Manager, Cinema Manager, Theatre Manager,&nbsp; Sr. Theatre Manager,</p>\n			</td>\n			<td style="width:59px">\n			<p>M1</p>\n			</td>\n			<td style="width:47px">\n			<p>M2</p>\n			</td>\n			<td style="width:47px">\n			<p>M3</p>\n			</td>\n			<td style="width:47px">\n			<p>M4</p>\n			</td>\n			<td style="width:47px">\n			<p>M5</p>\n			</td>\n			<td style="width:47px">\n			<p>M6</p>\n			</td>\n			<td style="width:47px">\n			<p>M7</p>\n			</td>\n			<td style="width:47px">\n			<p>M8</p>\n			</td>\n			<td style="width:59px">\n			<p>M9</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:34px; width:59px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:316px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:34px; width:59px">\n			<p>ME</p>\n			</td>\n			<td style="width:316px">\n			<p>Asst. Manager, Sr. Executive, Sr. Engineer, Sr. Accountant, Guest Relations Exe</p>\n			</td>\n			<td style="width:59px">\n			<p>E1</p>\n			</td>\n			<td style="width:47px">\n			<p>E2</p>\n			</td>\n			<td style="width:47px">\n			<p>E3</p>\n			</td>\n			<td style="width:47px">\n			<p>E4</p>\n			</td>\n			<td style="width:47px">\n			<p>E5</p>\n			</td>\n			<td style="width:47px">\n			<p>E6</p>\n			</td>\n			<td style="width:47px">\n			<p>E7</p>\n			</td>\n			<td style="width:47px">\n			<p>E8</p>\n			</td>\n			<td style="width:59px">\n			<p>E9</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:25px; width:59px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:316px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:33px; width:59px">\n			<p>MO</p>\n			</td>\n			<td style="width:316px">\n			<p>Accountant, IT Engineer,</p>\n			</td>\n			<td style="width:59px">\n			<p>O1</p>\n			</td>\n			<td style="width:47px">\n			<p>O2</p>\n			</td>\n			<td style="width:47px">\n			<p>O3</p>\n			</td>\n			<td style="width:47px">\n			<p>O4</p>\n			</td>\n			<td style="width:47px">\n			<p>O5</p>\n			</td>\n			<td style="width:47px">\n			<p>O6</p>\n			</td>\n			<td style="width:47px">\n			<p>O7</p>\n			</td>\n			<td style="width:47px">\n			<p>O8</p>\n			</td>\n			<td style="width:59px">\n			<p>O9</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:34px; width:59px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:316px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:136px; width:59px">\n			<p>MS</p>\n			</td>\n			<td style="width:316px">\n			<p>Head Projectionist, Projection Supervisor, Security Supervisor, Security Officer,Maintainance Supervisor, Sr Supervisor, Team Leader, Store Incharge, HSK Supervisor, Security Officer,Back Office Exe, Brew Master, Sr.Brew Master Electrician/Projection Operator, Plumber, Carpenter, Housekeeping, Maintainance, Driver, Kitchen Helper, Office Boy, CCE, Sr.CCE, Parking Attendant, Technician, Jr.Accountant,</p>\n			</td>\n			<td style="width:59px">\n			<p>S1</p>\n			</td>\n			<td style="width:47px">\n			<p>S2</p>\n			</td>\n			<td style="width:47px">\n			<p>S3</p>\n			</td>\n			<td style="width:47px">\n			<p>S4</p>\n			</td>\n			<td style="width:47px">\n			<p>S5</p>\n			</td>\n			<td style="width:47px">\n			<p>S6</p>\n			</td>\n			<td style="width:47px">\n			<p>S7</p>\n			</td>\n			<td style="width:47px">\n			<p>S8</p>\n			</td>\n			<td style="width:59px">\n			<p>S9</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:28px; width:59px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:316px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:47px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:59px">\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:51px; width:59px">\n			<p>MT</p>\n			</td>\n			<td style="width:316px">\n			<p>Management Trainee (Trainee Duty Manager),Graduate/ Diploma Trainee (Trainee Store Inc, Trainee Team Leader, Traine Brew Master)</p>\n			</td>\n			<td style="width:59px">\n			<p>T1</p>\n			</td>\n			<td style="width:47px">\n			<p>T2</p>\n			</td>\n			<td style="width:47px">\n			<p>T3</p>\n			</td>\n			<td style="width:47px">\n			<p>T4</p>\n			</td>\n			<td style="width:47px">\n			<p>T5</p>\n			</td>\n			<td style="width:47px">\n			<p>T6</p>\n			</td>\n			<td style="width:47px">\n			<p>T7</p>\n			</td>\n			<td style="width:47px">\n			<p>T8</p>\n			</td>\n			<td style="width:59px">\n			<p>T9</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n</div>\n', '', '', 1, '2015-02-24', '2015-03-10');
INSERT INTO `policies` (`id`, `title`, `desc`, `img`, `Resize`, `status`, `created_date`, `modified_date`) VALUES
(32, '18. BAND & GRADES - FOOD', '<div style="text-align: center;"><span style="font-size:16px"><span style="color:#FF0000"><strong>&bull; Band and Grade Structure for Food Outlets</strong></span></span></div>\n\n<div style="text-align: center;">&nbsp;</div>\n\n<div style="text-align: center;">\n<table border="0" cellpadding="0" cellspacing="0" style="width:736px">\n	<tbody>\n		<tr>\n			<td style="height:30px; width:60px">\n			<p>BANDS</p>\n			</td>\n			<td style="width:225px">\n			<p>DESIGNATIONS</p>\n			</td>\n			<td colspan="9" style="width:452px">\n			<p>GRADES</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:29px; width:60px">\n			<p>FL</p>\n			</td>\n			<td style="width:225px">\n			<p>SR. MANAGER/AGM/DGM/GM</p>\n			</td>\n			<td style="width:60px">\n			<p>L1</p>\n			</td>\n			<td style="width:48px">\n			<p>L2</p>\n			</td>\n			<td style="width:48px">\n			<p>L3</p>\n			</td>\n			<td style="width:48px">\n			<p>L4</p>\n			</td>\n			<td style="width:48px">\n			<p>L5</p>\n			</td>\n			<td style="width:48px">\n			<p>L6</p>\n			</td>\n			<td style="width:48px">\n			<p>L7</p>\n			</td>\n			<td style="width:48px">\n			<p>L8</p>\n			</td>\n			<td style="width:60px">\n			<p>L9</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:48px; width:60px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:225px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:60px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:60px">\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:29px; width:60px">\n			<p>FM</p>\n			</td>\n			<td style="width:225px">\n			<p>ASST. MANAGER, MANAGER,</p>\n			</td>\n			<td style="width:60px">\n			<p>M1</p>\n			</td>\n			<td style="width:48px">\n			<p>M2</p>\n			</td>\n			<td style="width:48px">\n			<p>M3</p>\n			</td>\n			<td style="width:48px">\n			<p>M4</p>\n			</td>\n			<td style="width:48px">\n			<p>M5</p>\n			</td>\n			<td style="width:48px">\n			<p>M6</p>\n			</td>\n			<td style="width:48px">\n			<p>M7</p>\n			</td>\n			<td style="width:48px">\n			<p>M8</p>\n			</td>\n			<td style="width:60px">\n			<p>M9</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:29px; width:60px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:225px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:60px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:60px">\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:29px; width:60px">\n			<p>FE</p>\n			</td>\n			<td style="width:225px">\n			<p>CAPTAIN, SENIOR CAPTAINS</p>\n			</td>\n			<td style="width:60px">\n			<p>E1</p>\n			</td>\n			<td style="width:48px">\n			<p>E2</p>\n			</td>\n			<td style="width:48px">\n			<p>E3</p>\n			</td>\n			<td style="width:48px">\n			<p>E4</p>\n			</td>\n			<td style="width:48px">\n			<p>E5</p>\n			</td>\n			<td style="width:48px">\n			<p>E6</p>\n			</td>\n			<td style="width:48px">\n			<p>E7</p>\n			</td>\n			<td style="width:48px">\n			<p>E8</p>\n			</td>\n			<td style="width:60px">\n			<p>E9</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:29px; width:60px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:225px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:60px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:60px">\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:29px; width:60px">\n			<p>FO</p>\n			</td>\n			<td style="width:225px">\n			<p>SR. STEWARDS/CAPTAIN</p>\n			</td>\n			<td style="width:60px">\n			<p>O1</p>\n			</td>\n			<td style="width:48px">\n			<p>O2</p>\n			</td>\n			<td style="width:48px">\n			<p>O3</p>\n			</td>\n			<td style="width:48px">\n			<p>O4</p>\n			</td>\n			<td style="width:48px">\n			<p>O5</p>\n			</td>\n			<td style="width:48px">\n			<p>O6</p>\n			</td>\n			<td style="width:48px">\n			<p>O7</p>\n			</td>\n			<td style="width:48px">\n			<p>O8</p>\n			</td>\n			<td style="width:60px">\n			<p>O9</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:29px; width:60px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:225px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:60px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:60px">\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:56px; width:60px">\n			<p>FS</p>\n			</td>\n			<td style="width:225px">\n			<p>SR. STEWARDS / STEWARDS / TRAINEE STEWARDS</p>\n			</td>\n			<td style="width:60px">\n			<p>S1</p>\n			</td>\n			<td style="width:48px">\n			<p>S2</p>\n			</td>\n			<td style="width:48px">\n			<p>S3</p>\n			</td>\n			<td style="width:48px">\n			<p>S4</p>\n			</td>\n			<td style="width:48px">\n			<p>S5</p>\n			</td>\n			<td style="width:48px">\n			<p>S6</p>\n			</td>\n			<td style="width:48px">\n			<p>S7</p>\n			</td>\n			<td style="width:48px">\n			<p>S8</p>\n			</td>\n			<td style="width:60px">\n			<p>S9</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:29px; width:60px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:225px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:60px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:60px">\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:56px; width:60px">\n			<p>FT</p>\n			</td>\n			<td style="width:225px">\n			<p>GRADUTE/TECHNICAL/MANAGEMENT</p>\n			</td>\n			<td style="width:60px">\n			<p>T1</p>\n			</td>\n			<td style="width:48px">\n			<p>T2</p>\n			</td>\n			<td style="width:48px">\n			<p>T3</p>\n			</td>\n			<td style="width:48px">\n			<p>T4</p>\n			</td>\n			<td style="width:48px">\n			<p>T5</p>\n			</td>\n			<td style="width:48px">\n			<p>T6</p>\n			</td>\n			<td style="width:48px">\n			<p>T7</p>\n			</td>\n			<td style="width:48px">\n			<p>T8</p>\n			</td>\n			<td style="width:60px">\n			<p>T9</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="height:29px; width:60px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:225px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:60px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:48px">\n			<p>&nbsp;</p>\n			</td>\n			<td style="width:60px">\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n</div>\n', '', '', 1, '2015-02-24', '2015-03-10'),
(33, '19.	LEAVE POLICY ( w. e. f.  Jan 2015)', '<p style="margin-left: 0.67in;">&nbsp;</p>\n\n<div><span style="color:#FF0000"><strong>PRIVILEGE LEAVE (PL):</strong></span></div>\n\n<div><span style="line-height:1.6">a.Every employee will be entitled for </span><strong style="line-height:1.6">21 days</strong><span style="line-height:1.6"> PL. The leave is credited on 1st January of each year or on pro rata basis only after completing </span><strong style="line-height:1.6">240 days of continuous service</strong><span style="line-height:1.6"> from the date of appointment.</span></div>\n\n<div>b.Any kind of paid leave is granted only on completion of 3 months&nbsp; of service since joining. The maximum paid leave granted is 5 days for 3 months completed.</div>\n\n<div>c.PL can be accumulated up to a<strong> maximum of 42 days</strong>. Any accumulation over and above 42 days will be treated invalid.</div>\n\n<div>d.<strong>Company recommends healthy consumption of</strong> PL by every employee.</div>\n\n<div>e.Granting PL at a stretch of more than 7 days for employees in band<strong> M and L</strong> is subject to the exigencies of work and discretion of management.</div>\n\n<div>&nbsp;</div>\n\n<div><span style="color:#FF0000"><strong><span style="line-height:1.6">NON PRIVILEGE LEAVE (NPL):</span></strong></span></div>\n\n<div><span style="line-height:1.6">a.Every</span><strong style="line-height:1.6"> confirmed employee</strong><span style="line-height:1.6"> is entitled to a maximum of 9 days of NPL in a year after completing </span><strong style="line-height:1.6">180 days of continuous service</strong><span style="line-height:1.6"> from the date of joining. The NPL includes both Casual and Sick leaves.</span></div>\n\n<div>b.NPL cannot be clubbed with PL.&nbsp; Eg: 3 days of casual leave and 3 days of PL together cannot be granted. It has to be 6 days of PL.</div>\n\n<div>c.Half day leave is permitted.</div>\n', '', '', 1, '2015-02-24', '2015-02-24'),
(34, '20. LEAVE POLICY (2015) contd.', '<p style="margin-left:.67in"><span style="font-size:16px"><strong><span style="color:#FF0000">MATERNITY LEAVE:</span></strong></span></p>\n\n<p style="margin-left:.67in"><span style="font-size:14px">&bull;<span style="font-size:12px"> <span style="font-size:14px">All married female employees (permanent, temporary or probationary) are entitled for a maximum of 90 days Maternity Leave. Employee is free to decide the commencement of the leave with a 15 days notice to HOD.</span></span></span></p>\n\n<div style="margin-left:.67in;"><span style="font-size:14px; line-height:1.6">&bull; The leave will be granted on production of a medical certificate from a registered medical practitioner.&nbsp;</span></div>\n\n<div style="margin-left:.67in;">&nbsp;</div>\n\n<div style="margin-left:.67in;"><span style="font-size:14px">&bull; Extension of leave for another 30 days after the expiry of 90 days is permitted without pay. A request must be sent to the HOD for granting extension.</span></div>\n\n<div style="margin-left:.67in;">&nbsp;</div>\n\n<p style="margin-left:.67in"><span style="font-size:16px"><strong><span style="color:#FF0000">COMPASSIONATE LEAVES:</span></strong></span></p>\n\n<div style="margin-left:.67in;"><span style="font-size:14px">&bull;This is a very special kind of leave sanctioned in an unfortunate situation where one&rsquo;s parents/children or a sole dependent&nbsp; is admitted in a hospital or an employee loses a close member of the family.</span></div>\n\n<div style="margin-left:.67in;"><span style="font-size:14px; line-height:1.6">2 days of leave in addition to the PL and NPL are granted here at the discretion of the management.</span></div>\n\n<p style="margin-left:.67in">&nbsp;</p>\n\n<p style="margin-left:.67in"><span style="font-size:16px"><strong><span style="color:#FF0000">Unpaid Leave of Absence</span>:</strong></span></p>\n\n<div style="margin-left:.67in;"><span style="font-size:14px">&bull; In exceptional cases, an employee who has no PL or NPL to his/her credit can apply for LEAVE WITHOUT PAY [LWP] if the reasons for the leave are justified. But granting such a leave will <strong>be the sole discretion of management</strong>.</span></div>\n\n<div style="margin-left:.67in;">&nbsp;</div>\n\n<div style="margin-left:.67in;"><span style="font-size:14px">&bull; Unpaid leaves are sanctioned to the extent of maximum 30 days.</span></div>\n', '', '', 1, '2015-02-24', '2015-02-24'),
(35, '21. LEAVE POLICY (2015) contd.', '<p style="margin-left:0.67in; text-align:center"><span style="font-size:16px"><span style="color:#000000"><strong>IMPORTANT LEAVE RULES</strong></span></span></p>\n\n<p style="margin-left:0.67in; text-align:center">&nbsp;</p>\n\n<div>&bull;During notice period after tendering resignation letter, no paid leaves are allowed. Any absence &nbsp; &nbsp;from work during this period will be treated leave without pay.</div>\n\n<div>&nbsp;</div>\n\n<div>&nbsp;</div>\n\n<div>&bull;Leave deduction on salary is calculated on gross amount.</div>\n\n<div>&nbsp;</div>\n\n<div>&nbsp;</div>\n\n<div>&bull;Absence from work without authorized leave for more than 6 working days shall result in disciplinary actions including termination of services.</div>\n', '', '', 1, '2015-02-24', '2015-02-24'),
(36, '22.	COMPENSATORY OFF', '<p>&bull; The compensatory off rules &nbsp;or payment in lieu of extra hours / overtime are applicable only to <strong>employees</strong> in band S and O</p>\n\n<div>&nbsp;</div>\n\n<div>&bull; The person will have to avail the compensatory off within following 6 working days. &nbsp;This means if someone works on a Sunday, s/he has to avail the &lsquo;off&rsquo; by the coming &nbsp;Saturday.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull; For all other bands granting compensatory off lies within the discretion of the &nbsp;management.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull; <strong>L band</strong> employees are exempted from compensatory off.</div>\n', '', '', 1, '2015-02-24', '2015-05-11'),
(37, '23. RECRUITMENT POLICY', '<div>a.Manpower Requisition Form[MRF] is required to be filled in and submitted to HR department for all recruitments at all Bands/Levels at all locations.</div>\n\n<div>&nbsp;</div>\n\n<div>b.There are two kinds of recruitments :</div>\n\n<div>&nbsp; &nbsp; a.filling up a vacancy arising out of attrition</div>\n\n<div>&nbsp; &nbsp; b.filling up a new position that is freshly created.</div>\n\n<div>&nbsp;</div>\n\n<div>c.In the first kind of recruitment[A], the head of the department or location should authorize the MRF under intimation to HR.</div>\n\n<div>&nbsp;</div>\n\n<div>d.In the second kind of recruitment[B], the authorization has to come from Head of HR/CHRO &nbsp; &nbsp; &nbsp; &nbsp; who in turn would obtain permission from top management before starting the recruitment &nbsp; &nbsp; &nbsp;process.</div>\n\n<div>&nbsp;</div>\n\n<div>e.Ideally every department should plan and budget their new financial year&rsquo;s manpower needs in the beginning of the year and submit it to top management for approval. HR will comply with &nbsp; &nbsp; &nbsp; &nbsp; the approved plan vis-&agrave;-vis the MRF submitted.</div>\n\n<div>&nbsp;</div>\n\n<div>f.The HR department or its representatives are responsible for recruitment. The line managers, &nbsp;however, can gather and forward appropriate CVs to HR to aid the process in the interest of the &nbsp; &nbsp;company.</div>\n\n<div>&nbsp;</div>\n\n<div>g.For multiplex locations, the head of the multiplex in co-ordination with HR representative can &nbsp;initiate recruitment for essential workers in the interest of the location under intimation to HR &nbsp; &nbsp; &nbsp; &nbsp;head. &nbsp; &nbsp;&nbsp;</div>\n', '', '', 1, '2015-02-24', '2015-02-24'),
(38, '24. RECRUITMENT  - EXPENSE REIMBURSMENT FOR CANDIDATES FROM OUTSTATION', '<div>a.Candidates called for Interview&nbsp; from a place more than 200 KMs away from the place of interview will be reimbursed travel expenses as per the following guidelines:</div>\n\n<div>&nbsp;</div>\n\n<div>b.For Bands T, S, O and E,&nbsp; to and fro 3-tier Train Fare or Normal Bus Fare as per the prevailing&nbsp; rates plus an allowance of Rs.100 for local conveyance will be reimbursed without any proof. This reimbursement will be done by cash by the person in charge of the recruitment. A signed receipt from the candidate will be ensured and submitted to accounts dept.</div>\n\n<div>&nbsp;</div>\n\n<div>c.For Bands M and L instead of 3-Tier train fare, 2nd AC train fare/Bus fare and actual local conveyance expenses [auto/taxi ]will be reimbursed.</div>\n\n<div>&nbsp;</div>\n\n<div>d.In exceptional cases when candidates in L Band has to take a flight to the place of interview, the air ticket will be provided by HR dept with due permission from CHRO/Top Management.</div>\n\n<div>&nbsp;</div>\n\n<div>e.All outstation candidates coming for interview will be provided with food / snacks / refreshments at the discretion of the interviewer<span style="line-height:1.6">.</span></div>\n\n<div>&nbsp;</div>\n\n<div>f. Respect timings given and treat all candidates courteously, in view of the fact that this has a correlation with &ldquo;Employer Branding&rdquo;&nbsp;&nbsp; -&nbsp; in short, avoid making any candidate wait at the reception for a long time.</div>\n', '', '', 1, '2015-02-24', '2015-02-24'),
(39, '25. SELECTION & APPOINTMENT', '<div>a.For all bands minimum 5 suitable CVs should be screened and shortlisted for interview.</div>\n\n<div>&nbsp;</div>\n\n<div>b.Interview of minimum 3 candidates for any position is mandatory</div>\n\n<div>&nbsp;</div>\n\n<div>c.The interview ratings should be recorded by all interviewers on the interview assessment form.</div>\n\n<div>&nbsp;</div>\n\n<div>d.A satisfactory&nbsp; interview should consume minimum 45 minutes.</div>\n\n<div>&nbsp;</div>\n\n<div>e.Apart from the icebreakers and pleasantries, the core questions should focus on specific achievements and the capabilities behind it matching with the needs of our job, and also the level of knowledge, skills and behavioral traits matching with competencies mentioned in the position profile[PP].</div>\n\n<div>&nbsp;</div>\n\n<div>f.HR should provide the relevant competency spec from PP to the interviewer.&nbsp;</div>\n\n<div>&nbsp;</div>\n\n<div>g.For S, O and E band selection, apart from personal interview, assessment of basic computer skills and general intelligence is essential.</div>\n\n<div>&nbsp;</div>\n\n<div>h.For S, O and E band selection, there will be 2 to 3 levels of interview &ndash; level-1 by HR and level-2 by reporting manager and level-3 by respective director or head of the function / department.</div>\n\n<div>&nbsp;</div>\n\n<div>i.All selections must be made after conducting thorough antecedents checking</div>\n\n<div>&nbsp;</div>\n\n<div>j.For selection of level M and L employees,&nbsp; appropriate psychometric assessments will be employed as a reference tool.</div>\n\n<div>&nbsp;</div>\n\n<div>k.Final approval for selection:</div>\n\n<div>1.Band L&nbsp; by Chairman</div>\n\n<div>2.All other bands by respective directors / head of the department in concurrence with HR department.</div>\n\n<div>&nbsp;</div>\n', '', '', 1, '2015-02-24', '2015-02-24'),
(40, '25. Selection & Appointment (contd…)', '<div>l.Offer Letter / Letter of Intent&nbsp; must be issued by HR department under all circumstances.</div>\n\n<div>&nbsp;</div>\n\n<div>m.While handing over the offer letter, the would-be employee should be briefed about producing all the required documents in original. The candidate should also be told that the appointment letter will be issued only on production of all the required documents.</div>\n\n<div>&nbsp;</div>\n\n<div>n.Before issuing appointment letter, verification of all previous employment records, service documents and educational&nbsp; certificates must be carried out by HR department.</div>\n\n<div>&nbsp;</div>\n\n<div>o.Health certificate from a reputed hospital or testing institution is mandatory for all regular employees on payroll.</div>\n\n<div>&nbsp;</div>\n\n<div>p. Issuance of appointment letter is subject to the above verification and cent percent compliance.</div>\n\n<div>&nbsp;</div>\n\n<div>q.Appointment letter&nbsp; will be issued after the physical joining of the new employee within 3 days of</div>\n\n<div>joining.</div>\n\n<div>&nbsp;</div>\n\n<div>r.Appointment letter will be signed by CHRO or an authorized HR manager.&nbsp;&nbsp;</div>\n', '', '', 1, '2015-02-24', '2015-02-24'),
(41, '26. INDUCTION POLICY', '<div><span style="line-height:1.6">&bull;Induction of new employees&nbsp; would take place every Monday at the corporate office.</span></div>\n\n<div>&nbsp;</div>\n\n<div>&bull;For other locations, HR recommends a fixed day for new employee induction.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull;HR would welcome the new member and initiate the preliminary documentation process.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull;Upon completion of the documentation process, HR induction in-charge would start the formal induction process in line with the approved agenda.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull;After completing the HR induction process, the induction in-charge would introduce the employee to his/her reporting boss and other related seniors and peers.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull;Post the above, departmental induction would start.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull;Either the HOD or a designated senior colleague would drive the departmental induction process.</div>\n\n<div>The HOD would also assign a &ldquo;buddy role&rdquo; to a senior colleague. The &lsquo;buddy&rsquo; would hand-hold the new member for a period of 30 days in all matters at workplace .</div>\n\n<div>&nbsp;</div>\n\n<div>&bull;HR would collect an &lsquo;induction feedback&rsquo; from the new employee after 30 days.</div>\n', '', '', 1, '2015-02-24', '2015-02-24'),
(42, '27. PROBATION & REGULARISATION POLICY', '<div>a.Employees in T band will be on probation for a period of one year from the date of appointment. Reducing the probation and regularizing the employment falls within the discretion of management.</div>\n\n<div>&nbsp;</div>\n\n<div>b.Band O &amp; E employees will be on probation for a period of 6 months.</div>\n\n<div>&nbsp;</div>\n\n<div>c.Band M employees will be on probation for 3 months.</div>\n\n<div>&nbsp;</div>\n\n<div>d.There is no probationary period for band L employees.</div>\n\n<div>&nbsp;</div>\n\n<div>e.The Manager in charge of Performance Management from HR would collect feedback from the reporting bosses every month about the progress of new employees. The confirmation of employment is subject to monthly as well as end-of-probation assessment jointly done HOD and HR department.</div>\n\n<div>&nbsp;</div>\n\n<div>f.There is no financial increment in compensation upon confirmation under normal circumstances. However, if there is a written commitment on the same at the time of joining, it will be complied by HR.&nbsp;</div>\n', '', '', 1, '2015-02-24', '2015-02-24'),
(43, '28. TRAINING & DEVELOPMENT POLICY', '<div>&bull;The objective of this policy is to develop functional competencies, right attitudes and values, and leadership qualities in employees.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull;1. TRAINING NEEDS IDENTIFICATION : Training needs arise continuously. The identification of training needs will be done at three levels as follows :</div>\n\n<div>&bull;1.1]&nbsp; AT ORGANISATIONAL LEVEL : by the Top Management, Board of Directors, HR Team, Organization and Business Development Consultants,&nbsp;&nbsp; in sync with the changing environment and emerging challenges.</div>\n\n<div><span style="line-height:1.6">&bull;1.2]&nbsp; AT DEPARTMENT LEVEL : by HODs in consultation with team, HR / Consultants</span></div>\n\n<div><span style="line-height:1.6">&bull;1.3] AT INDIVIDUAL LEVEL : through quarterly/biannual/annual PMS, Performance Review</span></div>\n\n<div>Meetings, Critical Incidents and&nbsp; request from the employee)</div>\n\n<div>&nbsp;</div>\n\n<div>&bull;2. The learning need identification process is crucial to the effectiveness of the training programs. Hence more stress will be given on proper identification of needs.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull;3. Training investment will be done only after establishing its benefit and value to the organization.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull;4. TYPES OF TRAINING PROGRAMS : Program planning will be done keeping the 5 categories below in mind:</div>\n\n<div>&ndash;Induction Training &ndash; core values, operating systems, policies, SOPs</div>\n\n<div>&ndash;Refresher Courses&nbsp; - technical skills, functional skills</div>\n\n<div>&ndash;Personal Development Programs [Knowledge / Skills/Attitudes]</div>\n\n<div>&ndash;Management Development Programs [for managerial skills]</div>\n\n<div>&ndash; Leadership Development Programs [ for leadership development]</div>\n\n<div>&nbsp;</div>\n\n<div>&bull;&nbsp;5. TIME COMMITMENT:</div>\n\n<div>&bull;All employees shall invest at least 24 Hours during a year [2 hours a month] in self-learning through e-Learning portal. Additionally, they also undergo 16 hours of company sponsored training programs in a year<u> apart from the induction training at the time of joining.</u></div>\n\n<div>&bull;&nbsp;<u>Multiplex and food business employees should undergo short refresher sessions every week under a separate SOP.</u></div>\n\n<div>&bull;&nbsp;Employees in M &amp; L band may be required to attend strategically important training programs as and when decided by the company. This is over and above the mandatory 16 hours.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull;6. TRAINING BUDGET will be planned and administered by HR department.</div>\n\n<div>&nbsp;</div>\n', '', '', 1, '2015-02-24', '2015-02-24'),
(44, '29. PERFORMANCE MANAGEMENT [PMS] POLICIES', '<div>\n<div>a. PMS policies stand at the heart of all business management policies. After all business success is the outcome of top performance.</div>\n\n<div>&nbsp;</div>\n\n<div>b.All employees must have clarity about his/her specific Key Result Areas and Key Performance Indicators. Additionally in the beginning of the year, every manager sits with juniors and sets specific performance-linked goals.</div>\n\n<div>&nbsp;</div>\n\n<div>c.Performance Review is done on an annual basis in the month of April. The KRAs and Goals are assessed against the Performance Indicators. Additionally behavioral norms and potential for promotion and high responsibilities will be assessed.</div>\n\n<div>&nbsp;</div>\n\n<div>d.HR will drive this initiative with the support of HODs.</div>\n\n<div>&nbsp;</div>\n\n<div>e. The scores of the annual assessment will be used for deciding the increment, variable pay and promotion of the employee.</div>\n\n<div>&nbsp;</div>\n\n<div>f.The assessment will also lead to training and development needs identification, career counseling and&nbsp; corrective measures wherever needed.</div>\nApart from the annual appraisal, there will be quarterly review meetings and feedback sessions aimed at performance improvement.</div>\n', '', '', 1, '2015-02-24', '2015-02-24'),
(45, '30. TRANSFER POLICY', '<div>a.<strong>Employees could be transferred</strong> from one place to another <strong>as per the need of the company or the Group</strong> and these transfers shall become <strong>effective through&nbsp;</strong>a<strong> communication initiated by </strong>the<strong> HR department .</strong></div>\n\n<div>&nbsp;</div>\n\n<div>b.<strong>All statutory dues</strong> shall be<strong> taken over by</strong> the <strong>new company in case the transfer is to a different&nbsp; company within the group.</strong></div>\n\n<div>&nbsp;</div>\n\n<div>c<strong>.Date of joining</strong> shall <strong>remain</strong> the original date of joining the group for gratuity calculation.</div>\n\n<div>&nbsp;</div>\n\n<div>d.Employees can apply to HR head for transfer within the group. If there are vacancies or possibilities, HR head will try to accommodate the request on merit.</div>\n\n<div>&nbsp;</div>\n', '', '', 1, '2015-02-24', '2015-02-24'),
(46, '31. EXPENSE REIMBURSEMENT ON TRANSFER', '<div>a. Cost of transporting household goods to a different location will be borne by the company subject to the following conditions:</div>\n\n<div>&nbsp;</div>\n\n<div>b. Employee has to submit three quotations from three different surface transporting or packing &amp; moving&nbsp; companies to the Admin Head with a copy to HR Department.</div>\n\n<div>&nbsp;</div>\n\n<div>c. Admin head will verify and approve the most appropriate quotation.</div>\n\n<div>&nbsp;</div>\n\n<div>d. Reimbursement of the final amount will be subject to submitting the supporting bills / documents.</div>\n\n<div>&nbsp;</div>\n\n<div>e.No extra payment will be done with regard to transfer of residence.</div>\n', '', '', 1, '2015-02-24', '2015-02-24'),
(47, '32.	BOND POLICY', '<div>&bull;Objective : <strong>To ensure</strong> that the Employer gets a <strong>fair return on the financial and other resources invested in the development of its employees.</strong></div>\n\n<div>&nbsp;</div>\n\n<div>&bull;To <strong>retain and nurture talents</strong> for mutually beneficial relationship.</div>\n\n<p>&nbsp;</p>\n\n<p><strong>CONTEXT OF THE BOND</strong></p>\n\n<p>&nbsp;</p>\n\n<div>&bull;Employer <strong>sponsors studies</strong> abroad or in India at the request of the employee at a substantial cost and time.</div>\n\n<p><strong>NATURE OF THE BOND :</strong> Written commitment from the employee to work in the company for a minimum period of 3 to 5 years post training. The tenure is decided on the basis of cost incurred.</p>\n\n<p><strong>AMOUNT AND PERIOD FOR THE BOND</strong></p>\n\n<p>&nbsp;</p>\n\n<div>&bull;The<strong> amount</strong> of the bond is <strong>decided based on the total expenses incurred</strong> on the employee for the training. This includes cost of travel, training, boarding, lodging and salary of the employee for the period which he / she is going for the course plus any other incidental expenses.</div>\n\n<p><strong>BOND PERIOD AND&nbsp; RECOVERY CLAUSE</strong></p>\n\n<p>&nbsp;</p>\n\n<div><strong>&bull;If the bond is broken by the employee, then the bond amount will be recovered from the employee on pro-rata basis.</strong></div>\n', '', '', 1, '2015-02-24', '2015-02-24'),
(48, '33.	  EXIT POLICY', '<p><strong>RESIGNATION</strong></p>\n\n<p>&bull; Any employee leaving the services of ABC group is required to give his / her resignation letter in writing as per the terms of one&rsquo;s appointment letter.</p>\n\n<p>&bull; To relieve an employee during notice period after submission of resignation is the prerogative of the employer. Regarding compensation,&nbsp; clauses in the appointment letter are binding for both.</p>\n\n<p>&bull; Full and final settlement of accounts will be done within 60 days from the date of relieving subject to clearance of all dues.</p>\n\n<p>&bull; Termination of employment is subject to the conditions in the appointment letter.</p>\n\n<div>&nbsp;</div>\n\n<div><strong>RETIREMENT AGE</strong></div>\n\n<div>&bull; An employee on attaining the age of 60 years retires from the permanent services of the company.</div>\n\n<p>&bull;&nbsp;Extension of services on retainer basis is solely the prerogative of the employer</p>\n', '', '', 1, '2015-02-24', '2015-02-24'),
(49, '34. 	GRIEVANCE MANAGEMENT', '<p><span style="font-size:14px">An employee is entitled to raise a grievance without fear of retaliation or victimisation, if he/she has a genuine reasons behind it.</span></p>\n\n<div>&nbsp;</div>\n\n<div><strong>&bull;INFORMAL WAYS OF RESOLVING A GRIEVANCE</strong></div>\n\n<div>&nbsp;</div>\n\n<div>&ndash;Since most work-related complaints and disputes can be settled through conversation, members are encouraged to present the issue orally as soon as possible to the reporting manager, who in turn should facilitate an unbiased conversation.</div>\n\n<div>&nbsp;</div>\n\n<div><strong>&bull;ROLE OF HUMAN RESOURCE DEPT IN GRIEVANCE MANAGEMENT</strong></div>\n\n<div>&nbsp;</div>\n\n<div>&ndash;The role of HR comes only when the attempts at the above level fail. In this case, the aggrieved employee can approach the CHRO directly through a mail first marking copy to his/her immediate superior and HOD.</div>\n\n<div>&ndash;The CHRO depending on the merits of the case will intervene and resolve the matter in line with the policies of the company.</div>\n\n<div>&nbsp;</div>\n\n<div><strong>&bull;Escalation of Policy</strong></div>\n\n<div>&nbsp;</div>\n\n<div>&ndash;In a rarest of the rare case where the employee feels that justice has not been done, he or she can approach the Chairman of the Company or his deputed representative with prior permission.&nbsp;&nbsp;</div>\n', '', '', 1, '2015-02-24', '2015-02-24'),
(51, '35. EMPOYEE WELFARE POLICIES', '<div>&bull;<strong>Mediclaim</strong> cover is available for all regular employees on payroll.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull;Insurance Premium would be borne by the company under group mediclaim.</div>\n\n<div>&nbsp;</div>\n\n<div>&bull;<strong>Executive Health Check-up :</strong> &nbsp;Employees above the age of 40 yrs would be eligible for Executive Health Check-up at a reputed hospital.&nbsp; An amount of Rs 4,000/- would be reimbursed on submission of bills and supporting documents. This amount would be paid once a year.</div>\n\n<div>&nbsp;</div>\n\n<div><strong>&bull;Indoor Games Facility :</strong> Badminton Court is accessible on the terrace for those interested&nbsp; in improving their physical fitness level.</div>\n\n<div>&nbsp;</div>\n\n<div><strong>&bull;First Aid Box :</strong>&nbsp; Every location shall maintain a first aid box containing essential medicines and dressing material.</div>\n\n<div>&nbsp;</div>\n\n<div><strong>&bull;PROVIDENT FUND :</strong> As of now 12% of the basic pay will be deducted as employee&rsquo;s contribution and <strong>equivalent amount will be contributed by the company to PF</strong>.</div>\n\n<p>PF Account&nbsp; can be transferred or encashed by the employee post separation</p>\n', '', '', 1, '2015-02-24', '2015-03-12'),
(52, '36.	DEATH RELIEF FUND', '<p style="margin-left:.38in"><span style="font-size:16px">1. In case of death of any member of the group, all employees can make a voluntary contribution to a common relief fund and donate the amount to the spouse or parents of thedeceased person.</span></p>\n\n<p style="margin-left:.38in"><span style="font-size:16px">2. An HR representative will initiate and close the collection drive within 45 days</span></p>\n\n<p style="margin-left:.38in"><span style="font-size:16px">3. Other aids are subject to the discretion of the&nbsp; management and prevailing policies. &nbsp;</span></p>\n', '', '', 1, '2015-02-24', '2015-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_scores`
--

CREATE TABLE IF NOT EXISTS `quiz_scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryid` varchar(11) NOT NULL,
  `subcategory` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `time_spent` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `quiz_scores`
--

INSERT INTO `quiz_scores` (`id`, `categoryid`, `subcategory`, `user_id`, `score`, `time_spent`, `status`, `created_date`) VALUES
(14, '1', 'policies', 448, 2, '', 0, '2015-05-11 15:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_subcategory`
--

CREATE TABLE IF NOT EXISTS `quiz_subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryid` varchar(11) NOT NULL,
  `sub_category` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `quiz_subcategory`
--

INSERT INTO `quiz_subcategory` (`id`, `categoryid`, `sub_category`, `status`, `created_date`, `modified_date`) VALUES
(1, '2', 'Quiz1', 1, '2015-03-27 18:51:56', '2015-03-27 13:21:56'),
(2, '1', 'hrquiz', 1, '2015-03-28 13:54:18', '2015-03-28 08:24:18'),
(6, '3', 'marketing', 1, '2015-03-28 13:55:44', '2015-03-28 08:25:44'),
(5, '1', 'policies', 1, '2015-03-28 13:55:25', '2015-03-28 08:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `resource_management`
--

CREATE TABLE IF NOT EXISTS `resource_management` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `sub_category` varchar(300) NOT NULL,
  `author` varchar(200) NOT NULL,
  `publisher` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `dop` date NOT NULL,
  `code` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `resource_management`
--

INSERT INTO `resource_management` (`id`, `name`, `category`, `sub_category`, `author`, `publisher`, `price`, `dop`, `code`, `status`, `created_date`, `modified_date`) VALUES
(11, ' Harry Potter and the Goblet of Fire', 'Books', 'Novels', ' J.K. Rowling', 'listopia', '500', '2015-01-11', '789456', 0, '2015-02-13 14:18:18', '2015-02-13 08:48:18'),
(10, ' Do Androids Dream of Electric Sheep? ', 'Books', 'Android Technology', ' Philip K. Dick', 'listopia', '300', '2015-02-09', '123456', 0, '2015-02-13 14:16:51', '2015-02-13 08:46:51'),
(12, ' Jane Eyre', 'Books', 'Novels', ' Charlotte Brontë', 'listopia', '200', '2015-01-30', '445256', 0, '2015-02-13 14:19:27', '2015-02-13 08:49:27'),
(13, ' The Hunger Games ', 'Books', 'Novels', ' Suzanne Collins', 'listopia', '450', '2015-02-08', '654565', 0, '2015-02-13 14:21:43', '2015-02-13 08:51:43'),
(14, 'Board Leadership', 'Periodicals', ' Management Magazines', 'John C. Maxwell', 'Inc', '150', '2015-01-21', '647976', 0, '2015-02-13 14:31:14', '2015-02-13 09:01:14'),
(15, 'Corporate Board Member', 'Periodicals', 'Management Magazines', 'J.K. Rowling', 'Inc', '125', '2015-01-04', '656835', 0, '2015-02-13 14:32:03', '2015-02-13 09:02:03'),
(16, 'Architectural Digest', 'Periodicals', 'Real Estate', 'Marshall Goldsmith', 'Inc', '110', '2015-02-09', '656532', 0, '2015-02-13 14:33:12', '2015-02-13 09:03:12'),
(17, 'Consumer Reports', 'Periodicals', 'Finance', 'Philip K. Dick', 'Inc', '200', '2015-01-27', '545485', 0, '2015-02-13 14:34:22', '2015-02-13 09:04:22'),
(18, 'Rudderless', 'DVD''s', 'Hollywood', ' William H. Macy', 'Samuel Goldwyn Company', '400', '2015-02-06', '484854', 0, '2015-02-13 14:38:48', '2015-02-13 09:08:48'),
(19, 'John Wick', 'DVD''s', 'Hollywood', 'Chad Stahelski', 'Lionsgate Films', '550', '2015-02-01', '545487', 0, '2015-02-13 14:41:04', '2015-02-13 09:11:04'),
(20, 'Lust For Life', 'Other Articles', 'Fiction', 'Vangog', 'With Anita', '290', '2015-01-19', '891759', 0, '2015-02-13 14:43:22', '2015-02-13 09:13:22'),
(21, 'National Geographic', 'Other Articles', 'Wild Life', 'Keanu Reeves', 'National Geographic', '220', '2014-12-08', '966565', 0, '2015-02-13 14:45:38', '2015-02-13 09:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  `privileges` text NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `privileges`, `status`, `created`) VALUES
(4, 'HR', 'a:34:{s:17:"branding_template";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:18:"employee_directory";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:3:"faq";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:15:"group_companies";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:12:"holiday_list";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:8:"hr_forms";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:12:"hr_help_desk";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:12:"it_help_desk";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:11:"it_policies";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:11:"jobopenings";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:10:"leadership";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:8:"location";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:11:"noticeboard";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:8:"policies";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:8:"settings";a:1:{i:0;s:1:"0";}s:12:"team_leaders";a:3:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"3";}s:7:"thought";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:10:"what_is_on";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:8:"borrowed";a:2:{i:0;s:1:"0";i:1;s:1:"3";}s:8:"category";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:18:"lending_management";a:3:{i:0;s:1:"0";i:1;s:1:"2";i:2;s:1:"3";}s:4:"lost";a:2:{i:0;s:1:"0";i:1;s:1:"3";}s:19:"resource_management";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:8:"returned";a:2:{i:0;s:1:"0";i:1;s:1:"3";}s:12:"sub_category";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:8:"articles";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:12:"book_summary";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:18:"elearning_category";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:14:"elearning_quiz";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:16:"elearning_slides";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:19:"elearning_totaltime";a:1:{i:0;s:1:"0";}s:16:"elearning_videos";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:11:"quiz_scores";a:2:{i:0;s:1:"0";i:1;s:1:"3";}s:16:"quiz_subcategory";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}}', 1, '2015-05-11 16:22:28'),
(5, 'Librarian', 'a:7:{s:8:"borrowed";a:2:{i:0;s:1:"0";i:1;s:1:"3";}s:8:"category";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:18:"lending_management";a:3:{i:0;s:1:"0";i:1;s:1:"2";i:2;s:1:"3";}s:4:"lost";a:2:{i:0;s:1:"0";i:1;s:1:"3";}s:19:"resource_management";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}s:8:"returned";a:2:{i:0;s:1:"0";i:1;s:1:"3";}s:12:"sub_category";a:4:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"2";i:3;s:1:"3";}}', 1, '2015-05-11 16:20:54'),
(7, 'test', 'a:18:{s:17:"branding_template";a:1:{i:0;s:1:"0";}s:18:"employee_directory";a:1:{i:0;s:1:"0";}s:3:"faq";a:1:{i:0;s:1:"0";}s:15:"group_companies";a:1:{i:0;s:1:"0";}s:12:"holiday_list";a:1:{i:0;s:1:"0";}s:8:"hr_forms";a:1:{i:0;s:1:"0";}s:12:"hr_help_desk";a:1:{i:0;s:1:"0";}s:12:"it_help_desk";a:1:{i:0;s:1:"0";}s:11:"it_policies";a:1:{i:0;s:1:"0";}s:11:"jobopenings";a:1:{i:0;s:1:"0";}s:10:"leadership";a:1:{i:0;s:1:"0";}s:8:"location";a:2:{i:0;s:1:"0";i:1;s:1:"1";}s:11:"noticeboard";a:2:{i:0;s:1:"0";i:1;s:1:"1";}s:8:"policies";a:2:{i:0;s:1:"0";i:1;s:1:"1";}s:8:"settings";a:1:{i:0;s:1:"0";}s:12:"team_leaders";a:1:{i:0;s:1:"0";}s:7:"thought";a:1:{i:0;s:1:"0";}s:10:"what_is_on";a:1:{i:0;s:1:"0";}}', 1, '2015-05-11 16:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `special_assignments`
--

CREATE TABLE IF NOT EXISTS `special_assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `comments` varchar(1000) NOT NULL,
  `status` int(1) NOT NULL,
  `deadline` date NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `special_assignments`
--

INSERT INTO `special_assignments` (`id`, `user_id`, `subject`, `details`, `comments`, `status`, `deadline`, `created_date`, `modified_date`) VALUES
(18, 400, 'HR', 'Here''s a quick example of a table within a table, with cellpadding, cellspacing and the table border set so you can easily see what''s going on within the table: ', 'Good Work', 1, '2015-05-03', '2015-05-11 21:25:28', '2015-05-11 15:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(200) NOT NULL,
  `sub_category` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `category`, `sub_category`, `status`, `created_date`, `modified_date`) VALUES
(9, 'Book', 'PERSONAL DEVELOPMENT', 1, '2015-02-27 21:05:28', '2015-02-27 15:35:28'),
(10, 'Book', 'HR TRAINING', 1, '2015-02-27 21:05:51', '2015-02-28 09:57:14'),
(12, 'dvd', 'TRAINING', 1, '2015-02-27 21:07:33', '2015-02-27 15:37:33'),
(16, 'Audio_cd', 'bollywood', 1, '2015-02-28 15:32:37', '2015-02-28 10:04:30'),
(17, 'Case_studies', 'TRAINING', 1, '2015-02-28 15:35:17', '2015-02-28 10:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `subuser`
--

CREATE TABLE IF NOT EXISTS `subuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `subuser`
--

INSERT INTO `subuser` (`id`, `username`, `password`, `role_id`, `employee_id`, `status`, `created`) VALUES
(9, 'sonam', '2dfadf1c87039ffa7beca3f732d544c4', 4, 400, 0, '2015-05-11 16:35:20'),
(8, 'shraddha ', '2e9993829549cb3969986608c1b54c0d', 5, 446, 0, '2015-05-11 16:29:14'),
(5, 'prem      ', '367251ea82a468e242253207e2c98f27', 5, 435, 0, '2015-05-06 05:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `team_leaders`
--

CREATE TABLE IF NOT EXISTS `team_leaders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `team_leaders`
--

INSERT INTO `team_leaders` (`id`, `name`, `user_id`, `username`, `password`, `status`, `created_date`, `modified_date`) VALUES
(7, 'prasanth.narayanan@aoplcinema.com', 328, 'PN', '27a8d7656659415782b730af50f99aa3', 1, '2015-03-24 18:16:05', '2015-03-24 12:46:05'),
(17, 'prem.tewari@carnivalcinemas.in', 435, 'prem', '367251ea82a468e242253207e2c98f27', 1, '2015-05-11 14:21:03', '2015-05-11 08:51:03'),
(15, 'nitin.mhatre@carnivalcinemas.in', 383, 'nitin', 'b585c4415b1fe50f2c31fa1698b271b7', 1, '2015-05-09 15:34:58', '2015-05-09 10:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `thought`
--

CREATE TABLE IF NOT EXISTS `thought` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(300) NOT NULL,
  `writer` varchar(1000) NOT NULL,
  `img` varchar(200) NOT NULL,
  `Resize` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `thought`
--

INSERT INTO `thought` (`id`, `description`, `writer`, `img`, `Resize`, `status`, `created_date`, `modified_date`) VALUES
(4, 'We don''t get a chance to do that many things, and every one should be really excellent. Because this is our life. Life is brief, and then you die, you know? And we''ve all chosen to do this with our lives. So it better be damn good. It better be worth it', 'Steve Jobs', 'thought-image-1.png', 'thought-image-1_thumb.png', 0, '2015-01-31 14:51:06', '2015-02-03 10:32:24'),
(12, 'Technology is just a tool. In terms of getting the kids working together and motivating them, the teacher is the most important.', 'Bill Gates', 'images.jpg', 'images_thumb.jpg', 0, '2015-02-04 16:53:11', '2015-03-02 15:43:52'),
(14, '"Any intelligent fool can make things bigger, more complex, and more violent. It takes a touch of genius -- and a lot of courage -- to move in the opposite direction.', 'Albert Einstein', 'albert.jpg', 'albert_thumb.jpg', 1, '2015-05-13 14:04:57', '2015-05-13 08:36:37'),
(13, '"Do not wait; the time will never be ''just  right.'' Start where you stand, and work with whatever tools you may have at your command, and better tools will be found as you go along."\n', 'Napoleon Hill ', 'Napoleon_Hill_headshot.jpg', 'Napoleon_Hill_headshot_thumb.jpg', 0, '2015-05-12 16:35:24', '2015-05-12 11:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `training_programs`
--

CREATE TABLE IF NOT EXISTS `training_programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `programname` varchar(255) NOT NULL,
  `learning_areas` varchar(500) NOT NULL,
  `importance_level` varchar(255) NOT NULL,
  `process` varchar(1000) NOT NULL,
  `start_date` date NOT NULL,
  `deadline` date NOT NULL,
  `total_hours` int(2) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `training_programs`
--

INSERT INTO `training_programs` (`id`, `user_id`, `programname`, `learning_areas`, `importance_level`, `process`, `start_date`, `deadline`, `total_hours`, `status`, `created_date`, `modified_date`) VALUES
(7, 400, 'Demo', 'IT,ACCOUNT', 'HIGH', 'LONG', '2015-05-04', '2015-05-13', 10, 1, '2015-05-11 21:17:26', '2015-05-11 15:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `travel_airlines`
--

CREATE TABLE IF NOT EXISTS `travel_airlines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `type` varchar(200) NOT NULL,
  `url` varchar(400) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `travel_airlines`
--

INSERT INTO `travel_airlines` (`id`, `name`, `type`, `url`, `status`, `created_date`, `modified_date`) VALUES
(35, 'Delta', 'international', 'https://www.delta.com/', 1, '2015-04-03 18:15:40', '2015-04-10 09:36:15'),
(34, 'Malaysia Airlines', 'international', 'http://www.malaysiaairlines.com/my/en.html', 1, '2015-04-03 18:14:45', '2015-04-10 09:36:27'),
(33, 'Swiss', 'international', 'http://www.swiss.com/in/en?WT.mc_id=SEA_IN&WT.srch=1&tmad=c&tmcampid=140', 1, '2015-04-03 18:14:01', '2015-04-10 09:36:34'),
(32, 'British', 'international', 'http://www.britishairways.com/travel/home/public/en_us', 1, '2015-04-03 18:13:01', '2015-04-10 09:36:43'),
(31, 'Etihad', 'international', 'http://www.etihad.com/en-in/', 1, '2015-04-03 18:12:24', '2015-04-10 09:36:50'),
(19, 'Spicejet', 'domestic', 'http://www.spicejet.com/', 1, '2015-04-03 16:47:36', '2015-04-07 05:26:29'),
(20, 'Goair', 'domestic', 'https://www.goair.in/', 1, '2015-04-03 16:49:20', '2015-04-07 05:25:53'),
(21, 'Airvistara', 'domestic', 'https://www.airvistara.com/', 1, '2015-04-03 16:50:00', '2015-04-07 05:28:25'),
(22, 'Air Asia', 'domestic', 'http://www.airasia.com', 1, '2015-04-03 16:51:31', '2015-04-07 05:21:32'),
(23, 'Air India', 'international', 'http://www.airindia.in/', 1, '2015-04-03 16:56:10', '2015-04-07 05:20:36'),
(24, 'Indigo', 'international', 'https://book.goindigo.in/', 1, '2015-04-03 16:57:02', '2015-04-03 05:57:02'),
(25, 'Jet', 'international', 'https://www.jetairways.com', 1, '2015-04-03 16:57:44', '2015-04-07 05:18:44'),
(26, 'Emirates', 'international', 'http://www.emirates.com/in/', 1, '2015-04-03 16:59:01', '2015-04-07 05:18:11'),
(27, 'Kuwait Airways', 'international', 'https://www.kuwaitairways.com/', 1, '2015-04-03 17:00:43', '2015-04-03 06:00:43'),
(28, 'Air Arabia', 'international', 'http://www.airarabia.com/en', 1, '2015-04-03 17:01:28', '2015-04-10 09:37:17'),
(29, 'Saudia', 'international', 'http://www.saudiairlines.com/portal/saudiairlines/Welcome', 1, '2015-04-03 18:10:06', '2015-04-10 09:37:06'),
(30, 'Qatar airways', 'international', 'http://www.qatarairways.com/in/', 1, '2015-04-03 18:10:51', '2015-04-10 09:36:57'),
(16, 'Air India', 'domestic', 'http://www.airindia.in/ ', 1, '2015-04-03 16:44:46', '2015-04-07 05:26:55'),
(18, 'Jet', 'domestic', 'https://www.jetairways.com', 1, '2015-04-03 16:46:26', '2015-04-07 05:08:35'),
(17, 'Indigo', 'domestic', 'https://book.goindigo.in/', 1, '2015-04-03 16:45:23', '2015-04-03 05:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `travel_authorities`
--

CREATE TABLE IF NOT EXISTS `travel_authorities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `travel_authorities`
--

INSERT INTO `travel_authorities` (`id`, `user_id`, `status`, `created_date`, `modified_date`) VALUES
(26, 449, 1, '2015-05-11 19:19:08', '2015-05-11 13:49:08'),
(23, 724, 1, '2015-05-07 14:08:21', '2015-05-07 08:38:21'),
(27, 448, 1, '2015-05-11 19:19:15', '2015-05-11 13:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `travel_desk`
--

CREATE TABLE IF NOT EXISTS `travel_desk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mode` varchar(100) NOT NULL,
  `from` varchar(500) NOT NULL,
  `to` varchar(500) NOT NULL,
  `travel_date` varchar(20) NOT NULL,
  `return_date` varchar(20) NOT NULL,
  `travel_time` varchar(20) NOT NULL,
  `travelt_time` varchar(20) NOT NULL,
  `airlines_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `authority` varchar(200) NOT NULL,
  `PNR` varchar(500) NOT NULL,
  `band_grade` varchar(200) NOT NULL,
  `purpose` blob NOT NULL,
  `approved_status` int(1) NOT NULL,
  `request_status` int(1) NOT NULL,
  `reason_modify` blob NOT NULL,
  `reason_cancel` blob NOT NULL,
  `instructions` blob NOT NULL,
  `hotel` int(11) NOT NULL,
  `guesthouse` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `travel_desk`
--

INSERT INTO `travel_desk` (`id`, `mode`, `from`, `to`, `travel_date`, `return_date`, `travel_time`, `travelt_time`, `airlines_id`, `user_id`, `authority`, `PNR`, `band_grade`, `purpose`, `approved_status`, `request_status`, `reason_modify`, `reason_cancel`, `instructions`, `hotel`, `guesthouse`, `created_date`, `modified_date`) VALUES
(85, 'AIR', 'Ahmedabad', 'Chennai', '2015-05-21', '', '19:00', '21:00', 19, 449, '449', '', '', '', 0, 0, '', '', '', 0, 0, '2015-05-14', '2015-05-14 12:24:05'),
(83, 'AIR', 'Bhubaneswar', 'Bengaluru', '2015-05-21', '', '15:00', '16:00', 20, 448, '449', '8888', 'dfgfg', 0x6667666467666467, 1, 0, '', '', '', 53, 22, '2015-05-13', '2015-05-13 09:56:39'),
(82, 'AIR', 'Agatti', 'Allahabad', '2015-05-27', '', '15:00', '16:00', 19, 448, '449', '1234', 'dfvsdfsf', 0x6378766376637678, 1, 2, 0x617364617364617364, 0x68656c6c6f2e2e2e, '', 0, 23, '2015-05-13', '2015-05-13 09:49:55'),
(84, 'AIR', 'Agartala', 'Agatti', '2015-10-14', '', '20:00', '22:00', 19, 449, '449', '', '', 0x6869756869, 0, 0, '', '', '', 0, 0, '2015-05-14', '2015-05-14 11:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `travel_locations`
--

CREATE TABLE IF NOT EXISTS `travel_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `travel_locations`
--

INSERT INTO `travel_locations` (`id`, `name`, `status`, `created_date`, `modified_date`) VALUES
(13, 'Tuticorin', 1, '2015-04-14 14:28:38', '2015-04-14 08:58:38'),
(12, 'Udaipur', 1, '2015-04-14 14:28:30', '2015-04-14 08:58:30'),
(11, 'Vadodara', 1, '2015-04-14 14:28:21', '2015-04-14 08:58:21'),
(10, 'Varanasi', 1, '2015-04-14 14:27:47', '2015-04-14 08:57:47'),
(9, 'Vijayawada', 1, '2015-04-14 14:27:38', '2015-04-14 08:57:38'),
(8, 'Visakhapatnam', 1, '2015-04-14 14:27:29', '2015-04-14 08:57:29'),
(14, 'Tirupati', 1, '2015-04-14 14:28:46', '2015-04-14 08:58:46'),
(15, 'Tiruchirapalli', 1, '2015-04-14 14:28:57', '2015-04-14 08:58:57'),
(16, 'Thiruvananthapuram', 1, '2015-04-14 14:29:06', '2015-04-14 08:59:06'),
(17, 'Thanjavur', 1, '2015-04-14 14:29:27', '2015-04-14 08:59:27'),
(18, 'Srinagar', 1, '2015-04-14 14:29:37', '2015-04-14 08:59:37'),
(19, 'Siliguri', 1, '2015-04-14 14:29:45', '2015-04-14 08:59:45'),
(20, 'Shillong', 1, '2015-04-14 14:30:10', '2015-04-14 09:00:10'),
(21, 'Salem', 1, '2015-04-14 14:35:00', '2015-04-14 09:05:00'),
(22, 'Rourkela', 1, '2015-04-14 14:35:11', '2015-04-14 09:05:11'),
(23, 'Ranchi', 1, '2015-04-14 14:35:19', '2015-04-14 09:05:19'),
(24, 'Rajkot', 1, '2015-04-14 14:35:32', '2015-04-14 09:05:32'),
(25, 'Rajahmundry', 1, '2015-04-14 14:35:40', '2015-04-14 09:05:40'),
(26, 'Raipur', 1, '2015-04-14 14:35:49', '2015-04-14 09:05:49'),
(27, 'Porbandar', 1, '2015-04-14 14:35:56', '2015-04-14 09:05:56'),
(28, 'Patna', 1, '2015-04-14 14:36:04', '2015-04-14 09:06:04'),
(29, 'Pantnagar', 1, '2015-04-14 14:36:12', '2015-04-14 09:06:12'),
(30, 'North Lakhimpur', 1, '2015-04-14 14:36:25', '2015-04-14 09:06:25'),
(31, 'New Delhi', 1, '2015-04-14 14:36:35', '2015-04-14 09:06:35'),
(32, 'Nanded', 1, '2015-04-14 14:36:44', '2015-04-14 09:06:44'),
(33, 'Nagpur', 1, '2015-04-14 14:36:54', '2015-04-14 09:06:54'),
(34, 'Mysore', 1, '2015-04-14 14:37:02', '2015-04-14 09:07:02'),
(35, 'Mumbai', 1, '2015-04-14 14:37:11', '2015-04-14 09:07:11'),
(36, 'Mangalore', 1, '2015-04-14 14:37:18', '2015-04-14 09:07:18'),
(37, 'Madurai', 1, '2015-04-14 14:37:26', '2015-04-14 09:07:26'),
(38, 'Lucknow', 1, '2015-04-14 14:37:44', '2015-04-14 09:07:44'),
(39, 'Leh', 1, '2015-04-14 14:38:00', '2015-04-14 09:08:00'),
(40, 'Kozhikode', 1, '2015-04-14 14:38:09', '2015-04-14 09:08:09'),
(41, 'Kolkata', 1, '2015-04-14 14:38:42', '2015-04-14 09:08:42'),
(42, 'Kochi', 1, '2015-04-14 14:38:51', '2015-04-14 09:08:51'),
(43, 'Khajuraho', 1, '2015-04-14 14:38:59', '2015-04-14 09:08:59'),
(44, 'Kandla', 1, '2015-04-14 14:39:12', '2015-04-14 09:09:12'),
(45, 'Jodhpur', 1, '2015-04-14 14:39:23', '2015-04-14 09:09:23'),
(46, 'Jharsuguda', 1, '2015-04-14 14:39:36', '2015-04-14 09:09:36'),
(47, 'Jamshedpur', 1, '2015-04-14 14:39:46', '2015-04-14 09:09:46'),
(48, 'Jamnagar', 1, '2015-04-14 14:39:55', '2015-04-14 09:09:55'),
(49, 'Jammu', 1, '2015-04-14 14:42:09', '2015-04-14 09:12:09'),
(50, 'Jaisalmer', 1, '2015-04-14 14:42:18', '2015-04-14 09:12:18'),
(51, 'Jaipur', 1, '2015-04-14 14:42:26', '2015-04-14 09:12:26'),
(52, 'Jabalpur', 1, '2015-04-14 14:42:33', '2015-04-14 09:12:33'),
(53, 'Indore', 1, '2015-04-14 14:42:40', '2015-04-14 09:12:40'),
(54, 'Imphal', 1, '2015-04-14 14:42:57', '2015-04-14 09:12:57'),
(55, 'Hyderabad', 1, '2015-04-14 14:43:24', '2015-04-14 09:13:24'),
(56, 'Hubli', 1, '2015-04-14 14:43:32', '2015-04-14 09:13:32'),
(57, 'Hosur', 1, '2015-04-14 14:43:41', '2015-04-14 09:13:41'),
(58, 'Gwalior', 1, '2015-04-14 14:44:12', '2015-04-14 09:14:12'),
(59, 'Guwahati', 1, '2015-04-14 14:44:25', '2015-04-14 09:14:25'),
(60, 'Gorakhpur', 1, '2015-04-14 14:44:33', '2015-04-14 09:14:33'),
(61, 'Goa', 1, '2015-04-14 14:45:34', '2015-04-14 09:15:34'),
(62, 'Diu', 1, '2015-04-14 14:45:45', '2015-04-14 09:15:45'),
(63, 'Dimapur', 1, '2015-04-14 14:45:52', '2015-04-14 09:15:52'),
(64, 'Dibrugarh', 1, '2015-04-14 14:46:00', '2015-04-14 09:16:00'),
(65, 'Dehradun', 1, '2015-04-14 14:46:07', '2015-04-14 09:16:07'),
(66, 'Cuttack', 1, '2015-04-14 14:46:15', '2015-04-14 09:16:15'),
(67, 'Coimbatore', 1, '2015-04-14 14:46:24', '2015-04-14 09:16:24'),
(68, 'Chennai', 1, '2015-04-14 14:46:32', '2015-04-14 09:16:32'),
(69, 'Chandigarh', 1, '2015-04-14 14:46:40', '2015-04-14 09:16:40'),
(70, 'Bhuj', 1, '2015-04-14 14:46:50', '2015-04-14 09:16:50'),
(71, 'Bhubaneswar', 1, '2015-04-14 14:46:57', '2015-04-14 09:16:57'),
(72, 'Bhopal', 1, '2015-04-14 14:47:07', '2015-04-14 09:17:07'),
(73, 'Bhavnagar', 1, '2015-04-14 14:47:15', '2015-04-14 09:17:15'),
(74, 'Bengaluru', 1, '2015-04-14 14:47:24', '2015-04-14 09:17:24'),
(75, 'Belgaum', 1, '2015-04-14 14:47:32', '2015-04-14 09:17:32'),
(76, 'Baroda', 1, '2015-04-14 14:47:56', '2015-04-14 09:17:56'),
(77, 'Aurangabad', 1, '2015-04-14 14:48:03', '2015-04-14 09:18:03'),
(78, 'Arakkonam', 1, '2015-04-14 14:48:11', '2015-04-14 09:18:11'),
(79, 'Amritsar', 1, '2015-04-14 14:48:19', '2015-04-14 09:18:19'),
(80, 'Allahabad', 1, '2015-04-14 14:48:29', '2015-04-14 09:18:29'),
(81, 'Aizawl', 1, '2015-04-14 14:48:38', '2015-04-14 09:18:38'),
(82, 'Ahmedabad', 1, '2015-04-14 14:48:46', '2015-04-14 09:18:46'),
(83, 'Agra', 1, '2015-04-14 14:48:55', '2015-04-14 09:18:55'),
(84, 'Agatti', 1, '2015-04-14 14:49:03', '2015-04-14 09:19:03'),
(85, 'Agartala', 1, '2015-04-14 14:49:14', '2015-04-14 09:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_master2`
--

CREATE TABLE IF NOT EXISTS `user_master2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_master2`
--

INSERT INTO `user_master2` (`id`, `username`, `password`) VALUES
(1, 'administrator', '0f359740bd1cda994f8b55330c86d845'),
(2, 'test_admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `what_is_on`
--

CREATE TABLE IF NOT EXISTS `what_is_on` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `Resize` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `what_is_on`
--

INSERT INTO `what_is_on` (`id`, `from_date`, `to_date`, `description`, `img`, `Resize`, `status`, `created_date`, `modified_date`) VALUES
(10, '2015-05-07', '2015-05-20', 'Carnival Sports Day', 'event-2.jpg', 'event-2_thumb.jpg', 1, '2015-02-03 16:33:18', '2015-05-07 08:39:36'),
(14, '2015-05-05', '2015-05-15', 'WOMEN''S DAY ON  5 MAY.', 'butterfly.jpg', 'butterfly_thumb.jpg', 1, '2015-03-02 21:05:03', '2015-05-07 08:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `who_is_where`
--

CREATE TABLE IF NOT EXISTS `who_is_where` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `from` varchar(20) NOT NULL,
  `to` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `who_is_where`
--

INSERT INTO `who_is_where` (`id`, `user_id`, `status`, `from`, `to`, `created_date`, `modified_date`) VALUES
(25, 449, 'In Office', '', '', '2015-05-11 22:12:13', '2015-05-11 16:42:13'),
(26, 448, 'Travel', '2015-05-12', '2015-05-14', '2015-05-07 15:42:04', '2015-05-07 10:12:04'),
(27, 720, 'Travel', '2015-05-12', '2015-05-16', '2015-05-07 16:20:04', '2015-05-07 10:50:04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
