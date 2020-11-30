-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2020 at 01:26 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(18, 'crime and punishment', '1234567890', '/images/appukuttan/5fc33818d83e04.54430594.jpg', 'Crime and Punishment (pre-reform Russian: Преступленіе и наказаніе; post-reform Russian: Преступление и наказание, tr. Prestupléniye i nakazániye, IPA: [prʲɪstʊˈplʲenʲɪje ɪ nəkɐˈzanʲɪje]) is a novel by the Russian author Fyodor Dostoevsky. It was first published in the literary journal The Russian Messenger in twelve monthly installments during 1866.[1] It was later published in a single volume. It is the second of Dostoevsky\'s full-length novels following his return from ten years of exile in Siberia. Crime and Punishment is considered the first great novel of his \"mature\" period of writing.[2] The novel is often cited as one of the supreme achievements in literature.[3][4][5][6]\r\n\r\nCrime and Punishment focuses on the mental anguish and moral dilemmas of Rodion Raskolnikov, an impoverished ex-student in Saint Petersburg who formulates a plan to kill an unscrupulous pawnbroker for her money. Before the killing, Raskolnikov believes that with the money he could liberate himself from pov', 23, 232, 10, 'thriller', 1895, 'fyodor dostoevsky'),
(22, 'sun and steel', '1234567890', '/images/alwin123/5fc4df6ac01684.86715935.jpg', 'ggggggggg', 5, 5, 14, 'fantasy', 5555, '55');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `bid`, `uid`, `pincode`, `addr`, `city`, `dist`, `state`, `status`) VALUES
(1, 10, 6, 686651, 'pattimavil h ullandu po prvithanm', 'pala', 'kottayam', 'kerala', 'delivered'),
(2, 11, 6, 686651, ' pattimavil (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'confirmed'),
(3, 4, 6, 686651, 'pattimavil (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'shipped'),
(4, 12, 6, 686651, 'pattimavil (h) ullanadu p.o pravithanam', 'pala', 'kottayam', 'kerala', 'cancelled'),
(5, 12, 12, 686651, 'mankaat (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'confirmed'),
(6, 19, 12, 686651, 'pattimavil (h) ullanadu p,o pravithanam', 'pala', 'kottayam', 'kerala', 'confirmed');

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `username`, `fname`, `lname`, `email`, `phoneno`, `userpass`, `auth`) VALUES
(6, 'alwin007', 'alwin', 'mathew', 'alwinmathew4@gmail.com', '9446547305', '$2y$10$.j4Ibcjk655CV6Bt9iXcQO41DqDwPRb0JcdZL//6xEy36UcFVVhxq', 2),
(7, 'celine44', 'celine', 'mathew', 'celine42@gmail.com', '9496966305', '$2y$10$hqHvihF3Bpd0ECLTZx.Jo.g4..yxPwtTJi8TCE81Qgf3.Sjp16N.S', 2),
(8, 'admin', 'admin', 'admin', 'admin@mail.com', '0000000000', '$2y$10$U65DHqckehaAGN4URYy/7.jewDLP4XBY4UGkGM7P/3CbX4rWdTEIi', 0),
(10, 'appukuttan', 'appu', 'kuttan', 'appu@gmail.com', '9446547305', '$2y$10$0OIGxx8/fugMn3t/OZm24Op0f.wKYMHvqT8PhUQwIYyNdpvlA9DCe', 1),
(11, 'celinestores', 'celine', 'mathew', 'celine66@gmail.com', '9446547305', '$2y$10$vtWdScdEirjHceX779waE.v/Rt3THT0XhOtYsjilubgCyLKfDkHS2', 1),
(12, 'ammu44', 'ammu', 'kutty', 'ammu44@gmail.com', '9447539083', '$2y$10$l9CuuIRNN9SSPHCX1oWXBeiEkzKCWSh3QoZ5hP8NB6hzsPZsEDWqS', 2),
(14, 'alwin123', 'alwin', 'mathew', 'alwinmathew4@hotmail.com', '9446547305', '$2y$10$cRywUxXgmwTjYd9CsVYczuHIU6I1DnzWVY0I2/sMzf2xkwEdGmfui', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
