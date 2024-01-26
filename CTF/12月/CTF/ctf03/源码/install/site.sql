-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2023 年 12 月 08 日
-- 服务器版本: 5.5.8
-- PHP 版本: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `site`
--

-- --------------------------------------------------------

--
-- 表的结构 `down_flag`
--

CREATE TABLE IF NOT EXISTS `down_flag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `pl_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `down_flag`
--

INSERT INTO `down_flag` (`id`, `content`, `pl_id`) VALUES
(2, '下载flag1', 2),
(3, '下载flag2', 3),
(6, '666C61677B32383335396A6B6664736A6630336A666B6473397D', 4),
(7, '下载flag4', 5);

-- --------------------------------------------------------

--
-- 表的结构 `manage_user`
--

CREATE TABLE IF NOT EXISTS `manage_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(255) NOT NULL,
  `m_pwd` varchar(255) NOT NULL,
  `c_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `manage_user`
--

INSERT INTO `manage_user` (`id`, `m_name`, `m_pwd`, `c_date`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2023-12-08');

-- --------------------------------------------------------

--
-- 表的结构 `pro`
--

CREATE TABLE IF NOT EXISTS `pro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `info_from` varchar(255) NOT NULL,
  `info_auth` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `p_id` int(11) NOT NULL,
  `c_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `pro`
--

INSERT INTO `pro` (`id`, `title`, `keywords`, `descriptions`, `img`, `info_from`, `info_auth`, `content`, `p_id`, `c_date`) VALUES
(1, '我是flag', '1', '2', '/uploadfile/image/20231219/click.jpg', '本站', 'admin', '', 2, '2023-12-14 07:47:31'),
(2, '我是flag ', '1', '2', '/uploadfile/image/20231219/click.jpg', '本站', 'admin', '', 2, '2023-23-14 08:33:12'),
(3, '我是flag', '1', '2', '/uploadfile/image/20231219/click.jpg', '本站', 'admin', '', 1, '2023-23-14 08:35:52'),
(4, '我是flag', '1', '2', '/uploadfile/image/20231219/click.jpg', '本站', 'admin', '', 1, '2023-23-14 08:37:33'),
(5, '我是flag', '1', '2', '/uploadfile/image/20231219/click.jpg', '本站', 'admin', '', 6, '2023-23-14 08:39:13'),
(6, '我是flag', '1', '2', '/uploadfile/image/20231219/click.jpg', '本站', 'admin', '', 3, '2023-23-14 08:40:53'),
(7, '我是flag', '1', '2', '/uploadfile/image/20231219/click.jpg', '本站', 'admin', '', 7, '2023-23-14 08:42:08'),
(8, '我是flag', '1', '2', '/uploadfile/image/20231219/click.jpg', '本站', 'admin', '', 1, '2023-23-25 18:39:56');
