-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2014 at 03:16 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fora`
--
CREATE DATABASE IF NOT EXISTS `fora` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fora`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
`comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(400) NOT NULL,
  `upvotes` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `comment`, `upvotes`) VALUES
(15, 39, 1, 'Congrats on making the first post. Your admin/mod.', 0),
(17, 37, 1, 'Congrats on making the first post. Your admin/mod.', 0),
(59, 37, 2, 'making comments on this', 0),
(60, 37, 2, 'is it feasible?', 0),
(61, 39, 2, 'Chava samaj raha khud ko latin marke?', 0),
(62, 46, 1, 'What are you trying to say?', 0),
(64, 46, 9, 'Hey Sam', 0),
(65, 46, 9, 'Why isnt the comments happening', 0),
(66, 46, 9, 'cant type with htmlentities', 0),
(67, 46, 9, '"So I cannot quote and shit?"', 0),
(68, 46, 9, 'Cant put single quotes apparently', 0),
(69, 47, 9, '''does it work now?''', 0),
(70, 47, 9, 'Oh my god! Thanks. I''ll be grateful!', 0),
(71, 48, 1, 'Welcome to yabb, @sarahsamuel. Your admin, Sam.', 0),
(72, 40, 1, 'Yes, either that or a unicorn.', 0),
(73, 48, 5, 'Puny, muggle.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
`post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post` varchar(2048) NOT NULL,
  `upvotes` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post`, `upvotes`) VALUES
(37, 3, 'This is the very FIRST post on FORA!', 0),
(38, 3, 'This is the second post on FORA.', 0),
(39, 1, 'Cogito ergo sum.', 0),
(40, 6, 'Do androids really dream of electric sheep?', 0),
(41, 1, 'Making this post yo', 0),
(46, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0),
(47, 9, '''can I make posts using single quotes?''', 0),
(48, 10, 'My first post on yabb! Hurray!', 0),
(49, 5, 'Now that I have assembled all the muggles together on yabb. \r\nAvada Kedavra (x-infinity)', 0),
(50, 8, 'Nothing exists except atom and empty-space, everything else is opinion.', 0),
(51, 5, '"Ph''nglui mglw''nafh Cthulhu R''lyeh wgah''nagl fhtagn"', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email_id` varchar(32) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email_id`, `firstname`, `lastname`) VALUES
(1, 'samzabdiel', '7c6a180b36896a0a8c02787eeafb0e4c', 'samzabdiel@gmail.com', 'Sam', 'Zabdiel'),
(2, 'shubhamraj', '6cb75f652a9b52798eb6cf2201057c73', 'shubhamraj@gmail.com', 'Shubham', 'Raj'),
(3, 'nikethraja', '819b0643d6b89dc9b579fdfc9094f28e', 'nikethraja@disney.com', 'Niketh', 'Raja'),
(5, 'voldemort', '34cc93ece0ba9e3f6f235d4af979b16c', 'lordvoldemort@deatheaters.org', 'Tom', 'Riddle'),
(6, 'rickdeckard', 'db0edd04aaac4506f7edab03ac855d56', 'rickdeckard@bladerunners.org', 'Rick', 'Deckard'),
(7, 'alexdelarge', '218dd27aebeccecae69ad8408d9a36bf', 'alexanderthelarge@droogs,com', 'Alex', 'DeLarge'),
(8, 'rustcohle', '00cdb7bb942cf6b290ceb97d6aca64a3', 'rustcohle@nihilistsunite.com', 'Rustin', 'Cohle'),
(9, 'aprilludgate', '62a0b1ef5e74766dfa9eaa85f8498ad0', 'aprilludgate@murderersunite.org', 'April', 'Ludgate'),
(10, 'sarahsamuel', '1dee1365a9f936a80ea4c1f2b69b2cf7', 'sarahsamuel@gmail.com', 'Sarah', 'Samuel'),
(11, 'delta', '63bcabf86a9a991864777c631c5b7617', 'delta@a1.com', 'delta', 'tribe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`comment_id`), ADD KEY `post_id` (`post_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`post_id`), ADD KEY `user_id` (`user_id`), ADD KEY `post` (`post`(767));

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE,
ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
