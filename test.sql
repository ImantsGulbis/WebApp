-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2014 at 06:30 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `message`, `date`) VALUES
(1, 1, 'User1 was here', '2014-04-27 09:06:38'),
(2, 1, 'It is working!!', '2014-04-27 09:06:59'),
(3, 2, 'Great!', '2014-04-27 09:07:26'),
(4, 2, 'What?', '2014-04-27 09:10:04'),
(5, 3, 'So what now! Im ready for some action', '2014-04-27 09:10:53'),
(6, 3, 'wwwwwwwwwwwwwwwwwwaaaaaaaaaaaaaaaaaaaaaaaaaaaatttttttttttttttttttttttttttttttttttttt?', '2014-04-27 09:12:09'),
(7, 4, 'Im also here! User4', '2014-04-27 09:12:54'),
(8, 1, 'dont know what to do next, but im sure im gona think of something!!', '2014-04-27 09:13:43'),
(9, 1, '=}', '2014-04-27 09:13:59'),
(10, 2, 'haaaa', '2014-04-27 09:14:24'),
(11, 4, 'user3! Are you still here?', '2014-04-27 09:15:13'),
(12, 3, 'im here!', '2014-04-27 09:16:00'),
(13, 3, 'what do you whant user4?', '2014-04-27 09:16:22'),
(14, 4, 'just whanted to say hhhhhhhhhhhhhhhhhhhhhhhhhiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii!', '2014-04-27 09:16:53'),
(15, 2, 'im also here!!', '2014-04-27 09:17:45'),
(16, 1, 'message1', '2014-04-27 09:18:42'),
(17, 1, 'message2', '2014-04-27 09:18:50'),
(18, 1, 'message3', '2014-04-27 09:18:56'),
(19, 1, 'message4', '2014-04-27 09:19:03'),
(20, 4, 'great webapp!!', '2014-04-27 09:19:55'),
(21, 3, 'I agree user41 Still need some improvment! But not bad!', '2014-04-27 09:21:05'),
(22, 3, 'user3 out!', '2014-04-27 09:21:18'),
(23, 2, 'me too!', '2014-04-27 09:21:53'),
(24, 1, 'goodby user3! Lets meet someday!', '2014-04-27 09:23:29'),
(25, 4, 'Hu!!=)', '2014-04-27 09:24:05'),
(26, 1, 'mmmmmmmmmmmmmmmmm', '2014-04-27 09:24:22'),
(27, 1, 'user1 out!!', '2014-04-27 09:24:55'),
(28, 4, 'im all alone!', '2014-04-27 09:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `email`, `password`) VALUES
(1, 'user1', 'user1@inbox.lv', '3091f821f21a9dca59f6d1e3eb6052fa'),
(2, 'user2', 'user2@inbox.lv', 'd4919e0f3b7dc2087cc630cc7da62f47'),
(3, 'user3', 'user3@inbox.lv', '5460c35e182bd6bc03ccaa201af2f5ba'),
(4, 'user4', 'user4@inbox.lv', 'f78bcee06effcc013c2fb270c494e016');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
