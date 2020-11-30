-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2020 at 09:22 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `bid` int NOT NULL AUTO_INCREMENT,
  `book_name` varchar(120) NOT NULL,
  `book_isbn` varchar(120) NOT NULL,
  `book_img` varchar(120) NOT NULL,
  `book_desc` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `book_stock` int DEFAULT NULL,
  `book_price` int DEFAULT NULL,
  `seller_id` int DEFAULT NULL,
  `category` varchar(120) DEFAULT NULL,
  `book_year` int NOT NULL,
  `book_author` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`bid`),
  KEY `seller_id` (`seller_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `book_name`, `book_isbn`, `book_img`, `book_desc`, `book_stock`, `book_price`, `seller_id`, `category`, `book_year`, `book_author`) VALUES
(4, 'The god of small things', '9780007258024', '/images/5fc10c3b4d9ae1.14372942.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Commodo ullamcorper a lacus vestibulum sed arcu. Congue nisi vitae suscipit tellus mauris a diam maecenas. Ut eu sem integer vitae justo eget. Fusce ut placerat orci nulla pellentesque dignissim enim. Vestibulum sed arcu non odio euismod lacinia at quis risus. Integer quis auctor elit sed vulputate mi sit amet. Dolor sit amet consectetur adipiscing elit pellentesque habitant. In fermentum posuere urna nec tincidunt. Duis convallis convallis tellus id. Hac habitasse platea dictumst quisque sagittis purus. Suspendisse in est ante in nibh mauris. Elementum sagittis vitae et leo duis ut diam quam. Pellentesque adipiscing commodo elit at imperdiet dui accumsan. Diam quam nulla porttitor massa id neque aliquam vestibulum morbi. Et sollicitudin ac orci phasellus egestas tellus. Non odio euismod lacinia at quis risus. Eget nunc lobortis mattis aliquam.\r\n\r\nLacinia quis vel', 100, 399, 10, 'fantasy', 2010, 'aruthati roy'),
(11, 'sun and steel', '9780870114250', '/images/5fc1d70ed49d65.80860252.jpg', 'A book by yukiyo mishima\r\nabout sun and steel     ', 22, 300, 10, 'humour', 2006, 'yukio mishima'),
(12, 'dune', '9780870114250', '/images/5fc1da1477d122.61048211.jpg', 'in a planet far far away humans battle against monsters in the dunes for resources', 33, 234, 10, 'fantasy', 1965, 'frank herbert'),
(15, 'spring snow', '1234567890', '/images/5fc1fd3742dff5.56732209.jpg', '  yukio mishima \'s best books and my favourit   ', 23, 322, 10, 'thriller', 1987, 'yukio mishima'),
(10, 'Woman in the dunes', '9780679733782', '/images/5fc1d5c44a8c38.85700202.jpg', ' a man gets trapped in a village and is refused to leave by the villagers  yeah', 50, 200, 10, 'thriller', 1999, 'kobo abe'),
(17, 'A mans search for meaining', '080701429X', '/images/5fc3208e5759b2.47235883.jpg', 'a holocaust story of a man and his search for meaning in life', 33, 455, 10, 'other', 1965, 'Victor E frankyl'),
(16, 'The time machine', '9781936594115', '/images/5fc26ed0cf95e9.18039392.jpg', '   the time machine by hg wells written in 1895  .', 33, 999, 10, 'scifi', 1895, 'H.G wells'),
(18, 'crime and punishment', '1234567890', '/images/5fc33818d83e04.54430594.jpg', 'a book by flyor dostesvoky', 23, 232, 10, 'thriller', 1895, 'fyodor dostoevsky');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `oid` int NOT NULL AUTO_INCREMENT,
  `bid` int NOT NULL,
  `uid` int NOT NULL,
  `pincode` int NOT NULL,
  `addr` varchar(128) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `dist` varchar(64) DEFAULT NULL,
  `state` varchar(24) DEFAULT NULL,
  `status` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `bid`, `uid`, `pincode`, `addr`, `city`, `dist`, `state`, `status`) VALUES
(1, 10, 6, 686651, 'pattimavil h ullandu po prvithanm', 'pala', 'kottayam', 'kerala', 'delivered'),
(2, 11, 6, 686651, ' pattimavil (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'confirmed'),
(3, 4, 6, 686651, 'pattimavil (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'shipped'),
(4, 12, 6, 686651, 'pattimavil (h) ullanadu p.o pravithanam', 'pala', 'kottayam', 'kerala', 'cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `usersId` int NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `fname` varchar(128) NOT NULL,
  `lname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phoneno` varchar(128) NOT NULL,
  `userpass` varchar(200) NOT NULL,
  `auth` int DEFAULT '2',
  PRIMARY KEY (`usersId`),
  UNIQUE KEY `userpass` (`userpass`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `username`, `fname`, `lname`, `email`, `phoneno`, `userpass`, `auth`) VALUES
(6, 'alwin007', 'alwin', 'mathew', 'alwinmathew4@gmail.com', '9446547305', '$2y$10$.j4Ibcjk655CV6Bt9iXcQO41DqDwPRb0JcdZL//6xEy36UcFVVhxq', 2),
(7, 'celine44', 'celine', 'mathew', 'celine42@gmail.com', '9496966305', '$2y$10$hqHvihF3Bpd0ECLTZx.Jo.g4..yxPwtTJi8TCE81Qgf3.Sjp16N.S', 2),
(8, 'admin', 'admin', 'admin', 'admin@mail.com', '0000000000', '$2y$10$U65DHqckehaAGN4URYy/7.jewDLP4XBY4UGkGM7P/3CbX4rWdTEIi', 0),
(10, 'appukuttan', 'appu', 'kuttan', 'appu@gmail.com', '9446547305', '$2y$10$0OIGxx8/fugMn3t/OZm24Op0f.wKYMHvqT8PhUQwIYyNdpvlA9DCe', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
