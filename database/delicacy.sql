-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1:3306
-- 生成日期: 2016 年 06 月 13 日 12:21
-- 服务器版本: 5.1.28
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `delicacy`
--

-- --------------------------------------------------------

--
-- 表的结构 `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `num` varchar(20) CHARACTER SET gbk NOT NULL,
  `name` varchar(20) CHARACTER SET gbk DEFAULT 'admin',
  `password` varchar(10) CHARACTER SET gbk NOT NULL,
  `gender` varchar(10) CHARACTER SET gbk DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  PRIMARY KEY (`num`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 导出表中的数据 `administrators`
--

INSERT INTO `administrators` (`num`, `name`, `password`, `gender`, `birthday`) VALUES
('admin', 'admin', 'admin', 'female', '1995-05-05'),
('ngwinglam', 'ngwinglam', 'wuyinglin', 'female', '1996-06-06');

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `com_id` int(10) NOT NULL AUTO_INCREMENT,
  `post_id` int(10) NOT NULL,
  `content` varchar(500) CHARACTER SET gbk NOT NULL,
  `user` varchar(20) CHARACTER SET gbk NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- 导出表中的数据 `comments`
--

INSERT INTO `comments` (`com_id`, `post_id`, `content`, `user`, `date`, `time`) VALUES
(1, 1, '好期待啊，好想快点看到呢。', 'user1', '2016-04-29', '20:10:00'),
(2, 1, '作为顺德人，肯定要支持啊。', 'user2', '2016-04-29', '20:11:00'),
(3, 1, '听说顺德是世界美食之都啊，等我看一下顺德有什么好吃的，有机会去吃吃吃。', 'user3', '2016-04-29', '22:00:00'),
(5, 1, '啊啊啊啊啊啊啊啊啊', 'ngwinglam', '2016-06-12', '21:25:00'),
(6, 1, '想看想看！！！', 'ngwinglam', '2016-06-12', '13:31:37'),
(7, 1, '啊啊啊啊啊好想看啊！', 'ngwinglam', '2016-06-12', '13:32:38'),
(8, 1, '我也要看我也要看！！！', 'ngwinglam', '2016-06-12', '13:36:32'),
(9, 1, '啊啊啊啊好激动！！！', 'ngwinglam', '2016-06-12', '13:37:40'),
(10, 3, '啊啊啊啊双皮奶啊超喜欢', 'user', '2016-06-06', '12:00:00'),
(11, 1, '深夜放毒...', 'test1', '2016-06-13', '06:21:18'),
(33, 2, '哇厉害', 'test1', '2016-06-13', '20:04:44');

-- --------------------------------------------------------

--
-- 表的结构 `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET gbk NOT NULL,
  `content` varchar(5000) CHARACTER SET gbk NOT NULL,
  `user` varchar(20) CHARACTER SET gbk NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `num_com` int(5) NOT NULL DEFAULT '0',
  `pic1` varchar(500) CHARACTER SET gbk DEFAULT NULL,
  `pic2` varchar(500) CHARACTER SET gbk DEFAULT NULL,
  `pic3` varchar(500) CHARACTER SET gbk DEFAULT NULL,
  `pic4` varchar(500) CHARACTER SET gbk DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- 导出表中的数据 `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `content`, `user`, `date`, `time`, `num_com`, `pic1`, `pic2`, `pic3`, `pic4`) VALUES
(1, '三集美食纪录片《寻味顺德》', '从美食出发，讲述顺德人的故事，展示这方水土的过去和现在。节目介绍了顺德人在美食之上和美食之外的功夫，在无数顺德传奇背后蕴含着顺德人的工匠精神。通过这里的人们对期待一顿普通家常饭菜的态度，看到他们的生活观、价值观。《寻味顺德》由创作《舌尖上的中国》的主力团队担纲制作，《舌尖》系列片总导演、央视纪录频道项目运营部主任陈晓卿担任该片总顾问，《舌尖》第二季之《秘境》的导演刘硕和费牖明共同执导；著名配音表演艺术家、《舌尖》系列片解说李立宏担任解说；国内一流的文化学、人类学等诸多领域的专家学者和美食达人组成庞大的顾问团队，为该片奉献了绝佳的创意和专业的支持。', 'ngwinglam', '2016-04-29', '20:00:00', 9, '71ef3885jw1f42q82sog6j20mw24sjwc.jpg', NULL, '', NULL),
(2, '《寻味顺德》第一集：《乡土之源》', '这是一个古老和现代奇妙交融的地方。千年围垦孕育出丰饶的桑基鱼塘，一百年前缫丝业的繁盛让它富甲一方，今天这里出产的家电用品改变着全球数十亿人的生活。然而，这片土地最富盛名的，永远是美食。顺德，以食物为遗传密码，让自己区别于世界上任何一个地方。', 'ngwinglam', '2016-04-30', '20:00:00', 1, '71ef3885jw1f3ehyjx05xj21943ikk0o.jpg', '71ef3885jw1f3eitfy5elj21943ikn6z.jpg', '71ef3885jw1f3et8bulg3j21943iktj2.jpg', '71ef3885jw1f3eu2v22u5j21943ik4fn.jpg'),
(3, '《寻味顺德》第二集：《匠心独运》', '一方水土，一方食味。顺德人孜孜不倦地追求着味道的极致。他们可以发掘出鱼的上百种吃法，也能花费半年时间只为制作一道佳肴。很多游客来顺德不单为欣赏水乡风貌，更要品尝这里的美味。', 'ngwinglam', '2016-05-01', '20:00:00', 1, '71ef3885jw1f3fofqq37aj219447sk0b.jpg', '71ef3885jw1f3fpapb027j21943ikdp2.jpg', '71ef3885jw1f3fyuqg3urj219447stm8.jpg', '71ef3885jw1f3fzpu4456j21943ik0zx.jpg'),
(4, '《寻味顺德》第三集：《美味相传》', '总有一些味道，跨越地域，为四方的人们喜爱。中国粤菜，不仅是一种烹饪风格，更是对食物的态度。顺德，粤菜的重要发源地，美食是代代相传的共同基因。顺德人走到哪里，哪里就有最好的味道。', 'ngwinglam', '2016-05-02', '20:00:00', 0, '71ef3885jw1f3grgt0u28j219447s7jh.jpg', '71ef3885jw1f3gt6y1yh1j21943ikqby.jpg', '71ef3885jw1f3gu1uswsij21943ikth6.jpg', '71ef3885jw1f3h4gomx86j21943ikgy7.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `num` varchar(20) CHARACTER SET gbk NOT NULL,
  `name` varchar(20) CHARACTER SET gbk DEFAULT 'user',
  `password` varchar(10) CHARACTER SET gbk NOT NULL,
  `gender` varchar(10) CHARACTER SET gbk DEFAULT NULL,
  `birthday` date DEFAULT '0000-00-00',
  `introduction` varchar(100) CHARACTER SET gbk DEFAULT NULL,
  PRIMARY KEY (`num`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 导出表中的数据 `users`
--

INSERT INTO `users` (`num`, `name`, `password`, `gender`, `birthday`, `introduction`) VALUES
('ngwinglam', 'ngwinglam', 'wuyinglin', 'female', '1996-06-06', NULL),
('test1', 'test1', 'test', 'female', '1997-10-10', '                              '),
('test2', 'test2', 'test', 'male', '1995-04-10', '        aaaabbbbba    ');
