-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 22, 2017 at 04:20 PM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id1493115_share`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `userid` int(11) DEFAULT NULL,
  `articleid` int(11) NOT NULL,
  `article_title` varchar(10000) CHARACTER SET latin1 DEFAULT NULL,
  `article_content` varchar(30000) CHARACTER SET latin1 DEFAULT NULL,
  `article_like` int(11) NOT NULL DEFAULT '0',
  `current` varchar(100) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`userid`, `articleid`, `article_title`, `article_content`, `article_like`, `current`) VALUES
(8, 1, 'Fucking ass hole', 'You you bitch ,\r\nyou are asshole (2)\r\nYou you bitch', 2, '2017-06-22 10:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `followerid` int(2) DEFAULT NULL,
  `followingid` int(2) DEFAULT NULL,
  `followername` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `followid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`followerid`, `followingid`, `followername`, `followid`) VALUES
(2, 1, 'meet', 1),
(1, 2, 'hardik', 2),
(1, 3, 'hardik', 3),
(1, 4, 'hardik', 4),
(1, 5, 'hardik', 5);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `articleid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `userid`, `articleid`) VALUES
(1, 8, 1),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `mailid` int(11) NOT NULL,
  `send` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recieve` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seen` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`mailid`, `send`, `recieve`, `message`, `seen`) VALUES
(1, 'meet@gmail.com', 'hmodi97122@yahoo.in', 'first trial message', 1),
(2, 'artijane497@gmail.com', 'hmodi97122@yahoo.in ', 'sorry for this profile pic but how should I change my phone munber. Bloody shit.', 1),
(3, 'artijane497@gmail.com', 'Hshdjdj', 'Hey fool', 0),
(4, 'hmodi97122@yahoo.in', 'artijane497@gmail.com', 'Sorry for your inconvenience but I will try to upgrade my website as soon as possible. It is only for trial and now I have again started working on this project and promise you to come up with the best website.\r\n\r\nthanks for your valuable feedback.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `occur` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `place` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `current` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`occur`, `place`, `news`, `userid`, `current`, `subject`) VALUES
('३१/५.२०१७', 'केरल', 'केरल यूथ कांग्रेस दवरा किया गया एक और कृत्य जिससे लोगो को पता चला की कांग्रेस को वोट क्यों नहीं देना चाहिए.', 1, '2017-05-31 05:54:42', 'गाय हत्या प्रतिबंध कानून'),
('15/62017', 'bermingham(england)', 'India is celebrating giant victory over Bangladesh. now ready to face its arch enemy in finals on 18 June.', 1, '2017-06-16 05:36:39', 'vistory celebration');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(255) NOT NULL,
  `firstname` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` mediumtext COLLATE utf8_unicode_ci,
  `contactnumber` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `firstname`, `lastname`, `email`, `password`, `contactnumber`, `country`, `image`, `current`) VALUES
(1, 'hardik', 'modi', 'hmodi97122@yahoo.in', '827ccb0eea8a706c4c34a16891f84e7b', '9712298463', 'india', '', NULL),
(3, 'patel', 'krunal', 'krunal432@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '9687523781', 'india', '', NULL),
(4, 'Vishal', 'Senma', 'vishalsenma784@gmail.com', '3f04be51698d83ad7938b7153058aba8', '7778897360', 'India', NULL, NULL),
(5, 'Piyushkumar', 'Patel', 'Piyushpatel3135@gmail.com', '2399e865d5cd152c9a8c5c762f08b8fd', '09586329731', 'India', 'IMG-20170425-WA0007.jpg', NULL),
(6, 'Jane', 'austen', 'h715967@mvrht.net', 'f44980db7b68c11814776bd5a89e1b88', '4357314634', 'British', NULL, NULL),
(7, 'Jane', 'arti', 'artijane497@gamil.com', '6cc07e9803f8c4dd3fc21340a860396c', '4253684550', 'British', NULL, NULL),
(8, 'Jane', 'arti', 'artijane497@gmail.com', '6cc07e9803f8c4dd3fc21340a860396c', '9099217462', 'India', '', NULL),
(9, 'yauvan', 'modi', 'yauvanmodi@gamil.com', '25f9e794323b453885f5181f1b624d0b', '9537928768', 'India', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`articleid`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`followid`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`mailid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `articleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `followid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `mailid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
