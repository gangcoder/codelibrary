-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-01-20 14:32:47
-- 服务器版本： 5.5.24
-- PHP Version: 5.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xg`
--

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `xueli` enum('专科','本科','硕士','博士') DEFAULT NULL,
  `xingqu` set('排球','篮球','足球','中国足球','地球') DEFAULT NULL,
  `laizi` enum('东北','华北','西北','华东','华南','华西') DEFAULT NULL,
  `regtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `age`, `xueli`, `xingqu`, `laizi`, `regtime`) VALUES
(1, 'xg', '123', 24, '本科', '排球,足球', '东北', '2015-01-20 04:56:02'),
(2, 'xg2', '123', 26, '本科', '排球,中国足球', '华东', '2015-01-19 12:05:36'),
(3, 'xg3', '123', 27, '本科', '篮球,足球,中国足球,地球', '东北', '2015-01-20 05:09:15'),
(5, 'xg15', '12312', 23, '博士', '排球,篮球,足球,中国足球,地球', '华北', '2015-01-20 04:34:25'),
(7, 'xg6', '123', 24, '本科', '排球,篮球,足球', '东北', '2015-01-20 05:09:29'),
(9, 'xg8', '123', 24, '本科', NULL, '东北', '2015-01-20 01:50:36'),
(14, 'xg11', '123', 23, '本科', '排球,中国足球,地球', '东北', '2015-01-20 04:45:36'),
(16, 'xg14', '123', 35, '本科', NULL, '东北', '2015-01-20 04:50:15'),
(20, 'xg16', '123', 36, '本科', NULL, '东北', '2015-01-20 04:57:56'),
(21, 'xg17', '123', 36, '本科', NULL, '东北', '2015-01-20 04:58:14'),
(22, 'xg18', '234', 21, '硕士', '中国足球,地球', '华南', '2015-01-20 04:59:41'),
(23, 'xg19', '234', 21, '本科', '篮球,足球,中国足球', '东北', '2015-01-20 05:00:30'),
(24, 'xg20', '234', 21, '本科', NULL, '东北', '2015-01-20 05:01:21'),
(27, 'xg21', '123', 32, '本科', '排球', '东北', '2015-01-20 05:03:44'),
(28, 'xg23', '123', 32, '本科', NULL, '东北', '2015-01-20 05:05:02'),
(29, 'xg22', '112', 12, '专科', '篮球', '东北', '2015-01-20 05:05:30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
