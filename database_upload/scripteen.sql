-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2013 at 03:47 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imageupload`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imageID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) NOT NULL,
  `image_user` int(11) NOT NULL DEFAULT '0',
  `image_date` int(11) NOT NULL,
  `image_srv` int(11) NOT NULL DEFAULT '1',
  `image_views` int(11) NOT NULL DEFAULT '0',
  `show_in_gallery` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`imageID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

CREATE TABLE `servers` (
  `serverID` int(11) NOT NULL AUTO_INCREMENT,
  `server` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `server_path` varchar(255) NOT NULL,
  `server_url` varchar(255) NOT NULL,
  PRIMARY KEY (`serverID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `servers`
--

INSERT INTO `servers` (`serverID`, `server`, `username`, `password`, `server_path`, `server_url`) VALUES
(1, 'local', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `the_options`
--

CREATE TABLE `the_options` (
  `optionID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(255) NOT NULL,
  `option_value` text NOT NULL,
  PRIMARY KEY (`optionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `the_options`
--

INSERT INTO `the_options` (`optionID`, `option_name`, `option_value`) VALUES
(1, 'nav_link_color', '#ffffff'),
(2, 'nav_link_hover_color', '#333444'),
(3, 'site_title_link_color', '#333444'),
(4, 'site_title_hover_color', '#666666'),
(5, 'header_border_size', '5px'),
(6, 'header_border_color', '#999999'),
(7, 'header_headings_color', '#f2f2f2'),
(8, 'header_font_color', 'white'),
(9, 'site_headings_color', '#333444'),
(10, 'site_font_color', '#333333'),
(11, 'site_font', '''Open Sans'', sans-serif'),
(12, 'site_links_color', '#333444'),
(13, 'site_links_hover_color', 'black'),
(14, 'site_bg_color', 'white'),
(15, 'google_css', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,300,700'),
(16, 'header_gradient_1', '#333444'),
(17, 'header_gradient_2', '#666666'),
(18, 'site_title', 'Scripteen Free Image Hosting Script'),
(19, 'site_tos', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla\r\n<h3>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h3>\r\nQuia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat \r\n\r\nNew Line Bottom'),
(22, 'banned_ip', '0.0.0.0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `date_joined` int(11) NOT NULL,
  `fb_token` text NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
