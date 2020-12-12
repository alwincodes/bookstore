-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2020 at 02:02 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `book_name`, `book_isbn`, `book_img`, `book_desc`, `book_stock`, `book_price`, `seller_id`, `category`, `book_year`, `book_author`) VALUES
(4, 'The god of small things', '9780007258024', '/images/appukuttan/5fc10c3b4d9ae1.14372942.jpg', 'The God of Small Things is the debut novel of Indian writer Arundhati Roy. It is a story about the childhood experiences of fraternal twins whose lives are destroyed by the \"Love Laws\" that lay down \"who should be loved, and how. And how much.\" The book explores how the small things affect people\'s behavior and their lives. The book also reflects its irony against casteism, which is a major discrimination that prevails in India. It won the Booker Prize in 1997.\r\n\r\nThe God of Small Things was Roy\'s first book and only novel until the 2017 publication of The Ministry of Utmost Happiness twenty years later. She began writing the manuscript for The God of Small Things in 1992 and finished four years later, in 1996. It was published the following year. The potential of the story was first recognized by Pankaj Mishra, an editor with HarperCollins, who sent it to three British publishers. Roy received £500,000 in advance and rights to the book were sold in 21 countries. ', 100, 399, 10, 'fantasy', 2010, 'arundhati roy'),
(11, 'sun and steel', '9780870114250', '/images/appukuttan/5fc1d70ed49d65.80860252.jpg', '\"Sun and Steel\" is about Mishima\'s search for personal identity during the last ten years of his life. The book traces the personal evolution of Yukio Mishima from the introverted adolecent recreated in his novel \"Confessions of a Mask\" into the man that he would eventually become by the end of his life.The book relates Mishima\'s desire and pursuit to become a \"man of action\".This idea resurfaces in much of Mishima\'s writing and activities during the last years of his life.Mishima had a strong desire to be known and regarded as a \"man of action\"', 22, 300, 10, 'humour', 2006, 'yukio mishima'),
(12, 'dune', '9780870114250', '/images/appukuttan/5fc1da1477d122.61048211.jpg', 'Dune is a 1965 science-fiction novel by American author Frank Herbert, originally published as two separate serials in Analog magazine. It tied with Roger Zelazny\'s This Immortal for the Hugo Award in 1966,[2] and it won the inaugural Nebula Award for Best Novel.[3] It is the first installment of the Dune saga, and in 2003 it was cited as the world\'s best-selling science fiction novel.[4][5]\r\n\r\nDune is set in the distant future amidst a feudal interstellar society in which various noble houses control planetary fiefs. It tells the story of young Paul Atreides, whose family accepts the stewardship of the planet Arrakis. While the planet is an inhospitable and sparsely populated desert wasteland, it is the only source of melange, or \"the spice,\" a drug that extends life and enhances mental abilities. Melange is also necessary for space navigation, which requires a kind of multidimensional awareness and foresight that only the drug provides.[6] As melange can only be produced on Arrakis, ', 33, 234, 10, 'fantasy', 1965, 'frank herbert'),
(15, 'spring snow', '1234567890', '/images/appukuttan/5fc1fd3742dff5.56732209.jpg', 'The first novel of Mishima\'s landmark tetralogy, The Sea of fertility\r\nSpring Snow is set in Tokyo in 1912, when the hermetic world of the ancient aristocracy is being breached for the first time by outsiders -- rich provincial families unburdened by tradition, whose money and vitality make them formidable contenders for social and political power.\r\nAmong this rising new elite are the ambitious Matsugae, whose son has been raised in a family of the waning aristocracy, the elegant and attenuated Ayakura. Coming of age, he is caught up in the tensions between old and new -- fiercely loving and hating the exquisite, spirited Ayakura Satoko. He suffers in psychic paralysis until the shock of her engagement to a royal prince shows him the magnitude of his passion, and leads to a love affair that is as doomed as it was inevitable.  ', 23, 322, 10, 'thriller', 1987, 'yukio mishima'),
(10, 'Woman in the dunes', '9780679733782', '/images/appukuttan/5fc1d5c44a8c38.85700202.jpg', ' In 1955,[1] Jumpei Niki,[2] a schoolteacher from Tokyo, visits a fishing village to collect insects. After missing the last bus, he is led by the villagers, in an act of apparent hospitality, to a house in the dunes that can be reached only by rope ladder. The next morning the ladder is gone and he finds he is expected to keep the house clear of sand with the woman living there, with whom he is also to produce children. He ultimately finds a way to collect water which gives him a purpose and a sense of liberty. He also wants to share the knowledge of his technique of water collection with the villagers someday. He eventually gives up trying to escape when he comes to realize that returning to his old life would give him no more liberty. He accepts his new identity and family. After seven years, he is proclaimed officially dead.', 50, 200, 10, 'thriller', 1999, 'kobo abe'),
(17, 'A mans search for meaining', '080701429X', '/images/appukuttan/5fc3208e5759b2.47235883.jpg', 'Man\'s Search for Meaning is a 1946 book by Viktor Frankl chronicling his experiences as a prisoner in Nazi concentration camps during World War II, and describing his psychotherapeutic method, which involved identifying a purpose in life to feel positive about, and then immersively imagining that outcome. According to Frankl, the way a prisoner imagined the future affected his longevity. The book intends to answer the question \"How was everyday life in a concentration camp reflected in the mind of the average prisoner?\" Part One constitutes Frankl\'s analysis of his experiences in the concentration camps, while Part Two introduces his ideas of meaning and his theory called logotherapy.', 33, 455, 10, 'other', 1965, 'Victor E frankyl'),
(16, 'The time machine', '9781936594115', '/images/appukuttan/5fc26ed0cf95e9.18039392.jpg', 'The Time Machine is a science fiction novella by H. G. Wells, published in 1895 and written as a frame narrative. The work is generally credited with the popularization of the concept of time travel by using a vehicle or device to travel purposely and selectively forward or backward through time. The term \"time machine\", coined by Wells, is now almost universally used to refer to such a vehicle or device.[1]\r\n\r\nThe Time Machine has been adapted into three feature films of the same name, as well as two television versions and many comic book adaptations. It has also indirectly inspired many more works of fiction in many media productions.', 33, 999, 10, 'scifi', 1895, 'H.G wells'),
(23, 'The alchemist', '1234567890', '/images/appukuttan/5fc9d8acdc6f59.70606023.jpg', 'something random af', 22, 22, 10, 'adventure', 3323, 'paulo coehelo');

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
  `c_fname` varchar(120) DEFAULT NULL,
  `c_ph` varchar(20) DEFAULT NULL,
  `c_email` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`oid`),
  KEY `bid` (`bid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `bid`, `uid`, `pincode`, `addr`, `city`, `dist`, `state`, `status`, `c_fname`, `c_ph`, `c_email`) VALUES
(2, 11, 6, 686651, ' pattimavil (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'confirmed', NULL, NULL, NULL),
(3, 4, 6, 686651, 'pattimavil (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'shipped', NULL, NULL, NULL),
(4, 12, 6, 686651, 'pattimavil (h) ullanadu p.o pravithanam', 'pala', 'kottayam', 'kerala', 'cancelled', NULL, NULL, NULL),
(5, 12, 12, 686651, 'mankaat (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'shipped', NULL, NULL, NULL),
(7, 12, 6, 686651, 'pattimavil (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'pending', 'alwin mathew', '9446547305', 'alwinmathew4@gmail.com'),
(8, 12, 6, 686651, 'pattimavil (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'pending', 'alwin mathew', '9446547305', 'alwinmathew4@gmail.com'),
(9, 12, 6, 686651, 'pattimavil (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'pending', 'alwin mathew', '9446547305', 'alwinmathew4@gmail.com'),
(10, 12, 6, 686651, 'pattimavil (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'pending', 'alwin mathew', '9446547305', 'alwinmathew4@gmail.com'),
(11, 12, 6, 686651, 'pattimavil (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'pending', 'alwin mathew', '9446547305', 'alwinmathew4@gmail.com'),
(12, 12, 6, 686651, 'pattimavil (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'pending', 'alwin mathew', '9446547305', 'alwinmathew4@gmail.com'),
(13, 15, 6, 686651, 'pattimavil (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'pending', 'alwin mathew', '9446547305', 'alwinmathew4@gmail.com'),
(14, 12, 6, 686651, 'pattimavil (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'pending', 'alwin mathew', '9446547305', 'alwinmathew4@gmail.com'),
(15, 11, 6, 686651, 'pattimavil (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'pending', 'alwin mathew', '9446547305', 'alwinmathew4@gmail.com'),
(16, 4, 6, 686651, 'pattimavil (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'pending', 'alwin mathew', '9446547305', 'alwinmathew4@gmail.com'),
(17, 15, 6, 686651, 'pattimavil (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'pending', 'alwin mathew', '9446547305', 'alwinmathew4@gmail.com'),
(18, 12, 6, 686651, 'pattimavil (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'pending', 'alwin mathew', '9446547305', 'alwinmathew4@gmail.com'),
(19, 11, 6, 686651, 'pattimavil (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'cancelled', 'alwin mathew', '9446547305', 'alwinmathew4@gmail.com'),
(20, 4, 6, 686651, 'pattimavil (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'cancelled', 'alwin mathew', '9446547305', 'alwinmathew4@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `rid` int NOT NULL AUTO_INCREMENT,
  `bid` int DEFAULT NULL,
  `uid` int DEFAULT NULL,
  `book_review` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`rid`),
  KEY `bid` (`bid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`rid`, `bid`, `uid`, `book_review`) VALUES
(1, 4, 6, 'really good book'),
(2, 4, 6, 'best book ever to exist here'),
(3, 15, 17, 'really a great book by yukio mishima one of my favourites of his'),
(4, 11, 17, 'great book by yukio mishima great read recommended 100'),
(5, 11, 17, 'great book by yukio mishima great read recommended 100'),
(6, 17, 17, 'great book highly recommended'),
(9, 10, 17, 'hehehehehehehheheheheheehehhehehhe lol'),
(10, 23, 17, 'addddddddddddddddddddddddddddddddddddddd'),
(11, 16, 17, 'ddddddddddddddddddddddddddd'),
(12, NULL, 17, 'also a very good book written by aruthati roy\r\n'),
(13, 4, 17, 'also a very good book written by aruthati roy\r\n'),
(17, 12, 6, 'very good by a good author\r\n'),
(15, 17, 6, 'great book highly recommended'),
(16, 11, 6, 'yukio mismimas all time best \r\n');

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `username`, `fname`, `lname`, `email`, `phoneno`, `userpass`, `auth`) VALUES
(6, 'alwin007', 'alwin', 'mathew', 'alwinmathew4@gmail.com', '9446547305', '$2y$10$.j4Ibcjk655CV6Bt9iXcQO41DqDwPRb0JcdZL//6xEy36UcFVVhxq', 2),
(7, 'celine44', 'celine', 'mathew', 'celine42@gmail.com', '9496966305', '$2y$10$hqHvihF3Bpd0ECLTZx.Jo.g4..yxPwtTJi8TCE81Qgf3.Sjp16N.S', 2),
(8, 'admin', 'admin', 'admin', 'admin@mail.com', '0000000000', '$2y$10$U65DHqckehaAGN4URYy/7.jewDLP4XBY4UGkGM7P/3CbX4rWdTEIi', 0),
(10, 'appukuttan', 'appu', 'kuttan', 'appu@gmail.com', '9446547305', '$2y$10$0OIGxx8/fugMn3t/OZm24Op0f.wKYMHvqT8PhUQwIYyNdpvlA9DCe', 1),
(17, 'ammukutty', 'ammu', 'kutty', 'ammukutty@gmail.com', '9446547305', '$2y$10$dNo0S.yemOIJ.aick9ZwRuFV.QYu4taP7wzxAWhiEX0AD7bmt/onu', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
