-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-11 17:40:21
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
-- 表的结构 `api`
--

CREATE TABLE IF NOT EXISTS `api` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `json` text NOT NULL,
  `time` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `api`
--

INSERT INTO `api` (`id`, `title`, `description`, `json`, `time`) VALUES
(3, 'test', '1', '{"status":1,"msg":"ok","data":[{"id":1,"logo":".\\/demo\\/img\\/club_01.jpg","name":"昆山勇者无畏","star":0,"people":1542},{"id":2,"logo":".\\/demo\\/img\\/club_01.jpg","name":"昆山勇者无畏","star":1,"people":1542}]}', '1478829283'),
(4, '1111', '11111', '{"status":1,"msg":"ok","data":[{"id":1,"logo":".\\/demo\\/img\\/club_01.jpg","name":"昆山勇者无畏","star":0,"people":1542},{"id":2,"logo":".\\/demo\\/img\\/club_01.jpg","name":"昆山勇者无畏","star":1,"people":1542}]}', '1478830953'),
(6, '2', '1', '{"status":1,"msg":"ok","data":{"status":1,"msg":"ok","data":[{"id":1,"logo":".\\/demo\\/img\\/club_01.jpg","name":"昆山勇者无畏","star":0,"people":1542},{"id":2,"logo":".\\/demo\\/img\\/club_01.jpg","name":"昆山勇者无畏","star":1,"people":1542}]}}', '1478831079'),
(8, '1', '1', '{"status":1,"msg":"ok","data":[{"id":1,"logo":"什么是logo","name":"昆山勇者无畏","star":0,"people":1542},{"id":2,"logo":".\\/demo\\/img\\/club_01.jpg","name":"昆山勇者无畏","star":1,"people":1542}]}', '1478835824');

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `time` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `time`) VALUES
(1, '带我去1', '\n          \n          \n          \n          \n          \n          \n          七味都气丸抢我的                        ', '1478251657'),
(2, '带我去1', '\n          \n          \n          \n          \n          \n          \n          七味都气丸抢我的                        ', '1478251852'),
(3, '带我去1', '\n          \n          \n          \n          \n          \n          \n          七味都气丸抢我的                        ', '1478251882'),
(4, '带我去1', '\n          \n          \n          \n          \n          \n          \n          七味都气丸抢我的                        ', '1478251947'),
(5, '带我去1', '\n          \n          \n          \n          \n          \n          \n          七味都气丸抢我的                        ', '1478252479'),
(6, '带我去1', '\n          \n          \n          \n          \n          \n          \n          七味都气丸抢我的                        ', '1478252561'),
(7, '带我去1', '\n          \n          \n          \n          \n          \n          \n          七味都气丸抢我的                        ', '1478252609'),
(8, '带我去1', '\n          \n          \n          \n          \n          \n          \n          七味都气丸抢我的                        ', '1478677795'),
(10, '带我去1', '\n          \n          \n          \n          \n          \n          \n          七味都气丸抢我的                        ', '1478678958');

-- --------------------------------------------------------

--
-- 表的结构 `menu_permission`
--

CREATE TABLE IF NOT EXISTS `menu_permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `json` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='左侧菜单权限分配' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `identity` varchar(20) NOT NULL COMMENT '{超级管理员:root} {普通用户:user}     ',
  `time` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `identity`, `time`) VALUES
(1, 'root', 'root', 'root', '1478829283');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
