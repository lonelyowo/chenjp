-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-09-20 09:05:02
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chenjp`
--

-- --------------------------------------------------------

--
-- 表的结构 `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(300) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `account`
--

INSERT INTO `account` (`id`, `description`, `name`, `password`) VALUES
(1, 'test', 'test', 'test'),
(2, 'test', 'test', 'test'),
(3, 'test', 'test', 'test'),
(4, 'test', 'test', 'test'),
(5, 'test', 'test', 'test'),
(6, 'test', 'test', 'test'),
(7, 'test', 'test', 'test'),
(8, 'test', 'test', 'test'),
(9, 'test', 'test', 'test'),
(10, 'test', 'test', 'test'),
(11, 'test', 'test', 'test'),
(12, 'test', 'test', 'test'),
(13, 'test', 'test', 'test'),
(14, 'test', 'test', 'test'),
(15, 'test', 'test', 'test'),
(16, 'test', 'test', 'test'),
(17, 'test', 'test', 'test'),
(18, 'test', 'test', 'test'),
(19, 'test', 'test', 'test'),
(20, 'test', 'test', 'test'),
(21, 'test', 'test', 'test'),
(22, 'test', 'test', 'test'),
(23, 'test', 'test', 'test'),
(24, 'test', 'test', 'test'),
(25, 'test', 'test', 'test'),
(26, 'test', 'test', 'test'),
(27, 'test', 'test', 'test'),
(28, 'test', 'test', 'test'),
(29, 'test', 'test', 'test'),
(30, 'test', 'test', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
