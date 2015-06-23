-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2015 at 11:38 AM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kiriket_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `score_master`
--

CREATE TABLE IF NOT EXISTS `score_master` (
  `score_id` int(11) NOT NULL AUTO_INCREMENT,
  `match_name` varchar(100) NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `runs` int(11) NOT NULL,
  `overs` int(11) NOT NULL,
  `wickets` int(11) NOT NULL,
  `entry_time` datetime NOT NULL,
  `entry_by` varchar(100) NOT NULL,
  PRIMARY KEY (`score_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `score_master`
--

INSERT INTO `score_master` (`score_id`, `match_name`, `team_name`, `runs`, `overs`, `wickets`, `entry_time`, `entry_by`) VALUES
(1, 'Faizal Than Dhoni VS Spring Bloom', 'Faizal Than Dhoni', 12, 5, 2, '2015-06-18 09:55:42', 'anirbanb2004'),
(2, 'Faizal Than Dhoni VS Spring Bloom', 'Spring Bloom', 120, 2, 1, '2015-06-18 09:57:59', 'anirbanb2004'),
(3, 'Faizal Than Dhoni VS Spring Bloom', 'Spring Bloom', 122, 3, 4, '2015-06-18 09:58:12', 'anirbanb2004'),
(4, 'Knights VS Wipro Chargers', 'Knights', 5, 3, 1, '2015-06-18 11:27:47', 'anirbanb2004'),
(5, 'Knights VS Wipro Chargers', 'Wipro Chargers', 10, 4, 2, '2015-06-18 11:29:31', 'anirbanb2004');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`uid`, `uname`, `password`, `state`) VALUES
(1, 'anirbanb2004', 'abcd1234', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
