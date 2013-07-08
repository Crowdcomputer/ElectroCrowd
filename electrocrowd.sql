-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2013 at 12:26 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `electrocrowd`
--

-- --------------------------------------------------------

--
-- Table structure for table `annotation`
--

CREATE TABLE `annotation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1024) NOT NULL,
  `validated` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `annotation`
--

INSERT INTO `annotation` (`id`, `title`, `validated`) VALUES
(1, 'my face', 0),
(2, 'Bolzano museum', 0),
(3, '', 0),
(4, '', 0),
(5, 'MART', 0),
(6, 'FORD CAR', 0),
(7, '', 0),
(8, 'FORD CAR', 0),
(9, 'PAVEL IN MART', 0),
(10, 'Scooter in MART', 0),
(11, 'BOLZANO MUSEUM', 0),
(12, 'MART', 0),
(13, 'ME', 0),
(14, 'BOLZANO MUSEUM 2', 0),
(15, 'MART 2', 0),
(16, 'UNIVERSITY OF BOLZANO', 0),
(17, 'WATER', 0),
(18, 'FORD', 0),
(19, 'ME IN MART', 0),
(20, 'SCOOTER', 0),
(21, '', 0),
(22, 'due', 0),
(23, 'tre', 0),
(24, 'quatro', 0),
(25, 'cunqua', 0),
(26, 'say', 0),
(27, 'setta', 0),
(28, 'otto', 0),
(29, '', 0),
(30, '', 0),
(31, '', 0),
(32, '', 0),
(33, '', 0),
(34, '', 0),
(35, '', 0),
(36, '', 0),
(37, '', 0),
(38, '', 0),
(39, 'Museum Bolzano', 0),
(40, 'MART Rovereto', 0),
(41, 'Universtiy', 0),
(42, 'moped', 0),
(43, 'museum', 0),
(44, 'square', 0);

-- --------------------------------------------------------

--
-- Table structure for table `annotation_resource`
--

CREATE TABLE `annotation_resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `annotation_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `annotation_resource`
--

INSERT INTO `annotation_resource` (`id`, `annotation_id`, `resource_id`) VALUES
(1, 1, 18),
(2, 2, 19),
(3, 3, 18),
(4, 4, 19),
(5, 5, 20),
(6, 6, 21),
(7, 7, 20),
(8, 8, 21),
(9, 9, 22),
(10, 10, 23),
(11, 11, 56),
(12, 12, 57),
(13, 13, 58),
(14, 14, 59),
(15, 15, 60),
(16, 16, 61),
(17, 17, 62),
(18, 18, 63),
(19, 19, 64),
(20, 20, 65),
(21, 21, 56),
(22, 22, 57),
(23, 23, 58),
(24, 24, 59),
(25, 25, 60),
(26, 26, 61),
(27, 27, 62),
(28, 28, 63),
(29, 29, 64),
(30, 30, 65),
(31, 31, 66),
(32, 32, 67),
(33, 33, 68),
(34, 34, 69),
(35, 35, 70),
(36, 36, 71),
(37, 37, 72),
(38, 38, 73),
(39, 39, 77),
(40, 40, 78),
(41, 41, 79),
(42, 42, 80),
(43, 43, 81),
(44, 44, 82);

-- --------------------------------------------------------

--
-- Table structure for table `bucket`
--

CREATE TABLE `bucket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `bucket`
--

INSERT INTO `bucket` (`id`, `title`) VALUES
(1, '1234'),
(2, 'new_bucket'),
(3, '1324'),
(4, '1234'),
(5, 'Software Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'Man/Woman'),
(2, 'Nature'),
(3, 'Space'),
(4, 'Techno');

-- --------------------------------------------------------

--
-- Table structure for table `category_resource`
--

CREATE TABLE `category_resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `category_resource`
--

INSERT INTO `category_resource` (`id`, `category_id`, `resource_id`) VALUES
(1, 2, 18),
(2, 4, 19),
(3, 4, 20),
(4, 4, 21),
(5, 1, 22),
(6, 4, 23),
(7, 4, 24),
(8, 4, 25),
(9, 4, 26),
(10, 3, 56),
(11, 3, 57),
(12, 1, 58),
(13, 3, 59),
(14, 3, 60),
(15, 3, 61),
(16, 1, 62),
(17, 4, 63),
(18, 1, 64),
(19, 4, 65),
(20, 3, 56),
(21, 3, 57),
(22, 1, 58),
(23, 3, 59),
(24, 3, 60),
(25, 3, 61),
(26, 1, 62),
(27, 4, 63),
(28, 1, 64),
(29, 4, 65),
(30, 3, 77),
(31, 3, 78),
(32, 2, 79),
(33, 4, 80);

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1024) NOT NULL,
  `url` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`id`, `title`, `url`) VALUES
(1, '5x8d8g3x75hamf56jg96', 'static/files/5x8d8g3x75hamf56jg96'),
(2, '6w3wf1yk4spdl1cyjjol', 'static/files/6w3wf1yk4spdl1cyjjol'),
(3, 'i12asbz6djrm1uflon8o', 'static/files/i12asbz6djrm1uflon8o'),
(4, '0cbxoqvx8p4q1fv92dh7', 'static/files/0cbxoqvx8p4q1fv92dh7'),
(5, 'tixg4kpk73icehxtenkz', 'static/files/tixg4kpk73icehxtenkz'),
(6, 'w5pms7l85dxj472sz8ll', 'static/files/w5pms7l85dxj472sz8ll'),
(7, '8er8j34p337wlx313707', 'static/files/8er8j34p337wlx313707'),
(8, 'h3xez37gk5u0w9g7k0vx', 'static/files/h3xez37gk5u0w9g7k0vx'),
(9, 'om1gdzldrce2jjas8q0h', 'static/files/om1gdzldrce2jjas8q0h'),
(10, '01lvl95zw7acgiw38p1n', 'static/files/01lvl95zw7acgiw38p1n'),
(11, 'd7gtpw6n82ii5mvu2ifr', 'static/files/d7gtpw6n82ii5mvu2ifr'),
(12, '5kqlh738yf1uzhk268xl', 'static/files/5kqlh738yf1uzhk268xl'),
(13, 't89i4c8tm8nc3eeomw6g', 'static/files/t89i4c8tm8nc3eeomw6g'),
(14, 'lsluxlqp6agk062zffl2', 'static/files/lsluxlqp6agk062zffl2'),
(15, 'mrbvqla0k4rmycdrv6na', 'static/files/mrbvqla0k4rmycdrv6na'),
(16, 'vypjpkgbtjxvuqfslf5u', 'static/files/vypjpkgbtjxvuqfslf5u'),
(17, 'yfq5dcb154cou9smcqdc', 'static/files/yfq5dcb154cou9smcqdc'),
(18, '0a722hfruwigoshswnkv', 'static/files/0a722hfruwigoshswnkv'),
(19, 'yvi3bee5acp5jz41rd19', 'static/files/yvi3bee5acp5jz41rd19'),
(20, 'pc79vjqgqm4kidi65i1x', 'static/files/pc79vjqgqm4kidi65i1x'),
(21, 'dr85vepu4omdk6fjv2ta', 'static/files/dr85vepu4omdk6fjv2ta'),
(22, 'zayzvwyqolbeebfjaikd', 'static/files/zayzvwyqolbeebfjaikd'),
(23, 'v4rzm100fcnx57949x6b', 'static/files/v4rzm100fcnx57949x6b'),
(24, 'rx3obsh8rhenrma5ybtl', 'static/files/rx3obsh8rhenrma5ybtl'),
(25, 'ep6ubrv19lb1zoa7a7v1', 'static/files/ep6ubrv19lb1zoa7a7v1'),
(26, '3qvujj2n1ll4afcjmr2w', 'static/files/3qvujj2n1ll4afcjmr2w'),
(27, 'l71g7tseyplr8rhini6z', 'static/files/l71g7tseyplr8rhini6z'),
(28, 'kbrczk5k0iz53pv6akf2', 'static/files/kbrczk5k0iz53pv6akf2'),
(29, 'hulhywgbib1wna2576lt', 'static/files/hulhywgbib1wna2576lt'),
(30, '6tg6r0mjj8vajghfrgyq', 'static/files/6tg6r0mjj8vajghfrgyq'),
(31, '8muxc60qj1365ckkg04p', 'static/files/8muxc60qj1365ckkg04p'),
(32, '72exxhzvhyfwmu6xtyxt', 'static/files/72exxhzvhyfwmu6xtyxt'),
(33, 's5ikk0aj8ioo4xetpaju', 'static/files/s5ikk0aj8ioo4xetpaju'),
(34, 'qqlr4jqmjh0np4uu38y4', 'static/files/qqlr4jqmjh0np4uu38y4'),
(35, 'asrqy21fzcitkj9jwn0u', 'static/files/asrqy21fzcitkj9jwn0u'),
(36, 'dbqado1oqtnbr3ei6btw', 'static/files/dbqado1oqtnbr3ei6btw'),
(37, 'cz81s0z83w4ojgfbpv7o', 'static/files/cz81s0z83w4ojgfbpv7o'),
(38, '6uvsfpa8y6oh17bfot1u', 'static/files/6uvsfpa8y6oh17bfot1u'),
(39, 'orm0zz21fierlbf8q4ik', 'static/files/orm0zz21fierlbf8q4ik'),
(40, 'ccbame2b79d5smbdtx44', 'static/files/ccbame2b79d5smbdtx44'),
(41, 'me9o4eugdaje982zvmbr', 'static/files/me9o4eugdaje982zvmbr'),
(42, 'j21ztto4ztmyl2ov2rnb', 'static/files/j21ztto4ztmyl2ov2rnb'),
(43, 'mj1n6wl435kn1h5gyocb', 'static/files/mj1n6wl435kn1h5gyocb'),
(44, 'tbz6hup3gntdnkw73jlt', 'static/files/tbz6hup3gntdnkw73jlt'),
(45, 'qjzgd6bf3itz57257wbc', 'static/files/qjzgd6bf3itz57257wbc'),
(46, '928a3ztdvcbadpjv51k5', 'static/files/928a3ztdvcbadpjv51k5'),
(47, '8fnczio5ep4w2yorw78o', 'static/files/8fnczio5ep4w2yorw78o'),
(48, 'lytvu556772cxfj5ewjc', 'static/files/lytvu556772cxfj5ewjc'),
(49, 'a5jny1mlqgn1y3x2fxqc', 'static/files/a5jny1mlqgn1y3x2fxqc'),
(50, 'xos2440gxg4ryvw40ij3', 'static/files/xos2440gxg4ryvw40ij3'),
(51, 'zbo9hbuycy91zkvtpq7f', 'static/files/zbo9hbuycy91zkvtpq7f'),
(52, 'lgstkt6jic3guaj1y63z', 'static/files/lgstkt6jic3guaj1y63z'),
(53, '74rosjm537ix745k0vhw', 'static/files/74rosjm537ix745k0vhw'),
(54, 'jcrflwdfefuyekrbk3d2', 'static/files/jcrflwdfefuyekrbk3d2'),
(55, '7y9nxwcbyuvie22tmx10', 'static/files/7y9nxwcbyuvie22tmx10'),
(56, '2jwgo50pj2jef3ifq7g5', 'static/files/2jwgo50pj2jef3ifq7g5'),
(57, '7td21viia50kkx2gcua7', 'static/files/7td21viia50kkx2gcua7'),
(58, 'wmvia1p8e9wc0q7xtcfn', 'static/files/wmvia1p8e9wc0q7xtcfn'),
(59, 'zcnrv090t47bv8nusvjb', 'static/files/zcnrv090t47bv8nusvjb'),
(60, 'wvblbagao04ta0hsbxna', 'static/files/wvblbagao04ta0hsbxna'),
(61, 'z1y5js3zloyqrimreirc', 'static/files/z1y5js3zloyqrimreirc'),
(62, '041kt6fg4has3khlrdea', 'static/files/041kt6fg4has3khlrdea'),
(63, 'mt5ihbyjv0q978q1cqtn', 'static/files/mt5ihbyjv0q978q1cqtn'),
(64, '3iv9qo5qnv4j2zb2ng63', 'static/files/3iv9qo5qnv4j2zb2ng63'),
(65, 'dkc6edrbi1e0vexz5p7y', 'static/files/dkc6edrbi1e0vexz5p7y'),
(66, '36z9fljn7u74vkpuokxr', 'static/files/36z9fljn7u74vkpuokxr'),
(67, 'kxijvkfoduatdnma5t83', 'static/files/kxijvkfoduatdnma5t83'),
(68, 'g9l2tdzf5zdntx98kv26', 'static/files/g9l2tdzf5zdntx98kv26'),
(69, 'l98tfpy3wj4jpp4szvqv', 'static/files/l98tfpy3wj4jpp4szvqv'),
(70, 'ailc3kpf3fpser66k2d6', 'static/files/ailc3kpf3fpser66k2d6'),
(71, 'gqppe7akh5qgehwlhuvp', 'static/files/gqppe7akh5qgehwlhuvp'),
(72, 'ua19zfcw25zn9ylitnel', 'static/files/ua19zfcw25zn9ylitnel'),
(73, 'kio32cr70q9vd8zza1hx', 'static/files/kio32cr70q9vd8zza1hx'),
(74, 'm78x8u3jn1lo382x0091', 'static/files/m78x8u3jn1lo382x0091'),
(75, 't92zhkmlhez2m3nslyf5', 'static/files/t92zhkmlhez2m3nslyf5'),
(76, 'e00rnc6klupoob8rra7x', 'static/files/e00rnc6klupoob8rra7x'),
(77, '17czl7jete1xfxxhajd8', 'static/files/17czl7jete1xfxxhajd8'),
(78, 'bnov9qx77janriumqlud', 'static/files/bnov9qx77janriumqlud'),
(79, 'kvum0rjcds7ymwv3gmxg', 'static/files/kvum0rjcds7ymwv3gmxg'),
(80, 'iz6kpgmftzr18nra5syz', 'static/files/iz6kpgmftzr18nra5syz'),
(81, 'cugzi1dqcya1pn0emqih', 'static/files/cugzi1dqcya1pn0emqih'),
(82, 'dev7xwi0hpy2z5hk0cvm', 'static/files/dev7xwi0hpy2z5hk0cvm'),
(83, 'jwrkxtod97qs0ibrr51g', 'static/files/jwrkxtod97qs0ibrr51g'),
(84, 'zv5jziobp22o9b9lsriv', 'static/files/zv5jziobp22o9b9lsriv'),
(85, '90amitlm6qtr8gpyn3vm', 'static/files/90amitlm6qtr8gpyn3vm'),
(86, 'tvclk6x788j1ihj1pqyx', 'static/files/tvclk6x788j1ihj1pqyx'),
(87, '1q0wqyu2e3rzmbjh2u9r', 'static/files/1q0wqyu2e3rzmbjh2u9r'),
(88, '50zznm1edippvqg8zx0k', 'static/files/50zznm1edippvqg8zx0k'),
(89, 'byea08muk5cqocubeugh', 'static/files/byea08muk5cqocubeugh'),
(90, 'b0o3e7j808uzns93kb9x', 'static/files/b0o3e7j808uzns93kb9x'),
(91, '0wvh2b6i9pqsr8mwnxlk', 'static/files/0wvh2b6i9pqsr8mwnxlk'),
(92, 'je1ix6su57opzgv0rbkf', 'static/files/je1ix6su57opzgv0rbkf'),
(93, 'zp9fh3gr3tkdznncfefx', 'static/files/zp9fh3gr3tkdznncfefx'),
(94, 'lbsq2hbwdzhbck9bevce', 'static/files/lbsq2hbwdzhbck9bevce'),
(95, 'lt6kxyim6tjj0kjomvsw', 'static/files/lt6kxyim6tjj0kjomvsw'),
(96, '84mjl1g62f7tswx0kony', 'static/files/84mjl1g62f7tswx0kony'),
(97, 'xvyq505mqpfey0np3twi', 'static/files/xvyq505mqpfey0np3twi'),
(98, 'mjynnijx54idccfkz7xu', 'static/files/mjynnijx54idccfkz7xu'),
(99, 'bpaovvc4okg2sa8gkmgm', 'static/files/bpaovvc4okg2sa8gkmgm'),
(100, '83b55guy2k66u9wx6463', 'static/files/83b55guy2k66u9wx6463'),
(101, 'nk5f2foirce9tq1414h0', 'static/files/nk5f2foirce9tq1414h0'),
(102, '3aehaihdtgsdup3ejup5', 'static/files/3aehaihdtgsdup3ejup5'),
(103, 'edv4b9sw9h6e7fw7960e', 'static/files/edv4b9sw9h6e7fw7960e'),
(104, 'j18nbvvll3c5tdezkqo7', 'static/files/j18nbvvll3c5tdezkqo7'),
(105, 'tfi7n5ow4u8me8x1evcm', 'static/files/tfi7n5ow4u8me8x1evcm'),
(106, 'uzgvfj13k1s4pad2zw0c', 'static/files/uzgvfj13k1s4pad2zw0c'),
(107, 'iigl12xzx7ai7ddwymex', 'static/files/iigl12xzx7ai7ddwymex'),
(108, '01j4r68d8kfe2nmryyab', 'static/files/01j4r68d8kfe2nmryyab');

-- --------------------------------------------------------

--
-- Table structure for table `resource_bucket`
--

CREATE TABLE `resource_bucket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resource_id` int(11) NOT NULL,
  `bucket_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `resource_bucket`
--

INSERT INTO `resource_bucket` (`id`, `resource_id`, `bucket_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 2),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 9, 2),
(10, 10, 2),
(11, 11, 2),
(12, 12, 2),
(13, 13, 2),
(14, 14, 2),
(15, 15, 2),
(16, 16, 2),
(17, 17, 2),
(18, 18, 2),
(19, 19, 2),
(20, 20, 2),
(21, 21, 2),
(22, 22, 2),
(23, 23, 2),
(24, 24, 2),
(25, 25, 2),
(26, 26, 2),
(27, 27, 2),
(28, 28, 2),
(29, 29, 2),
(30, 30, 2),
(31, 31, 2),
(32, 32, 2),
(33, 33, 2),
(34, 34, 2),
(35, 35, 4),
(36, 36, 4),
(37, 37, 4),
(38, 38, 4),
(39, 39, 4),
(40, 40, 4),
(41, 41, 4),
(42, 42, 4),
(43, 43, 4),
(44, 44, 4),
(45, 45, 4),
(46, 46, 4),
(47, 47, 4),
(48, 48, 4),
(49, 49, 4),
(50, 50, 4),
(51, 51, 4),
(52, 52, 4),
(53, 53, 4),
(54, 54, 4),
(55, 55, 4),
(56, 56, 4),
(57, 57, 4),
(58, 58, 4),
(59, 59, 4),
(60, 60, 4),
(61, 61, 4),
(62, 62, 4),
(63, 63, 4),
(64, 64, 4),
(65, 65, 4),
(66, 66, 4),
(67, 67, 4),
(68, 68, 4),
(69, 69, 4),
(70, 70, 4),
(71, 71, 4),
(72, 72, 4),
(73, 73, 4),
(74, 74, 4),
(75, 75, 4),
(76, 76, 4),
(77, 77, 4),
(78, 78, 4),
(79, 79, 4),
(80, 80, 4),
(81, 81, 4),
(82, 82, 4),
(83, 83, 5),
(84, 84, 5),
(85, 85, 5),
(86, 86, 5),
(87, 87, 5),
(88, 88, 5),
(89, 89, 5),
(90, 90, 5),
(91, 91, 5),
(92, 92, 5),
(93, 93, 5),
(94, 94, 5),
(95, 95, 5),
(96, 96, 5),
(97, 97, 5),
(98, 98, 5),
(99, 99, 5),
(100, 100, 5),
(101, 101, 5),
(102, 102, 2),
(103, 103, 2),
(104, 104, 2),
(105, 105, 2),
(106, 106, 5),
(107, 107, 5),
(108, 108, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
