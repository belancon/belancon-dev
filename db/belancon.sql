-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 28, 2016 at 03:54 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belancon`
--

-- --------------------------------------------------------

--
-- Table structure for table `bugs`
--

CREATE TABLE IF NOT EXISTS `bugs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contributors`
--

CREATE TABLE IF NOT EXISTS `contributors` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `send_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'Rizqi Maulana', 'sakukode@gmail.com', 'perbanyak koleksi ikon nya', '2016-07-19 07:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL,
  `icon_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=364 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `icon_id`, `type`, `filename`, `created_at`, `created_by`) VALUES
(1, 1, 'png', 'add.png', '2016-07-24 10:09:31', 1),
(2, 1, 'psd', 'add.psd', '2016-07-24 10:09:31', 1),
(3, 1, 'ai', 'add.eps', '2016-07-24 10:09:31', 1),
(4, 2, 'png', 'bar-chart.png', '2016-07-24 10:09:31', 1),
(5, 2, 'psd', 'bar-chart.psd', '2016-07-24 10:09:31', 1),
(6, 2, 'ai', 'bar-chart.eps', '2016-07-24 10:09:31', 1),
(7, 3, 'png', 'binoculars.png', '2016-07-24 10:09:31', 1),
(8, 3, 'psd', 'binoculars.psd', '2016-07-24 10:09:31', 1),
(9, 3, 'ai', 'binoculars.eps', '2016-07-24 10:09:31', 1),
(10, 4, 'png', 'browser.png', '2016-07-24 10:09:31', 1),
(11, 4, 'psd', 'browser.psd', '2016-07-24 10:09:31', 1),
(12, 4, 'ai', 'browser.eps', '2016-07-24 10:09:31', 1),
(13, 5, 'png', 'bug.png', '2016-07-24 10:09:31', 1),
(14, 5, 'psd', 'bug.psd', '2016-07-24 10:09:31', 1),
(15, 5, 'ai', 'bug.eps', '2016-07-24 10:09:31', 1),
(16, 6, 'png', 'chat-1.png', '2016-07-24 10:09:31', 1),
(17, 6, 'psd', 'chat-1.psd', '2016-07-24 10:09:31', 1),
(18, 6, 'ai', 'chat-1.eps', '2016-07-24 10:09:31', 1),
(19, 7, 'png', 'chat-2.png', '2016-07-24 10:09:31', 1),
(20, 7, 'psd', 'chat-2.psd', '2016-07-24 10:09:31', 1),
(21, 7, 'ai', 'chat-2.eps', '2016-07-24 10:09:31', 1),
(22, 8, 'png', 'chat.png', '2016-07-24 10:09:31', 1),
(23, 8, 'psd', 'chat.psd', '2016-07-24 10:09:31', 1),
(24, 8, 'ai', 'chat.eps', '2016-07-24 10:09:31', 1),
(25, 9, 'png', 'cloud-computing-1.png', '2016-07-24 10:09:31', 1),
(26, 9, 'psd', 'cloud-computing-1.psd', '2016-07-24 10:09:31', 1),
(27, 9, 'ai', 'cloud-computing-1.eps', '2016-07-24 10:09:31', 1),
(28, 10, 'png', 'cloud-computing.png', '2016-07-24 10:09:31', 1),
(29, 10, 'psd', 'cloud-computing.psd', '2016-07-24 10:09:31', 1),
(30, 10, 'ai', 'cloud-computing.eps', '2016-07-24 10:09:31', 1),
(31, 11, 'png', 'compass-1.png', '2016-07-24 10:09:31', 1),
(32, 11, 'psd', 'compass-1.psd', '2016-07-24 10:09:31', 1),
(33, 11, 'ai', 'compass-1.eps', '2016-07-24 10:09:31', 1),
(34, 12, 'png', 'compass.png', '2016-07-24 10:09:31', 1),
(35, 12, 'psd', 'compass.psd', '2016-07-24 10:09:31', 1),
(36, 12, 'ai', 'compass.eps', '2016-07-24 10:09:31', 1),
(37, 13, 'png', 'computer-1.png', '2016-07-24 10:09:31', 1),
(38, 13, 'psd', 'computer-1.psd', '2016-07-24 10:09:31', 1),
(39, 13, 'ai', 'computer-1.eps', '2016-07-24 10:09:31', 1),
(40, 14, 'png', 'computer.png', '2016-07-24 10:09:31', 1),
(41, 14, 'psd', 'computer.psd', '2016-07-24 10:09:31', 1),
(42, 14, 'ai', 'computer.eps', '2016-07-24 10:09:31', 1),
(43, 15, 'png', 'connection-1.png', '2016-07-24 10:09:31', 1),
(44, 15, 'psd', 'connection-1.psd', '2016-07-24 10:09:31', 1),
(45, 15, 'ai', 'connection-1.eps', '2016-07-24 10:09:31', 1),
(46, 16, 'png', 'connection.png', '2016-07-24 10:09:31', 1),
(47, 16, 'psd', 'connection.psd', '2016-07-24 10:09:31', 1),
(48, 16, 'ai', 'connection.eps', '2016-07-24 10:09:31', 1),
(49, 17, 'png', 'desk.png', '2016-07-24 10:09:31', 1),
(50, 17, 'psd', 'desk.psd', '2016-07-24 10:09:31', 1),
(51, 17, 'ai', 'desk.eps', '2016-07-24 10:09:31', 1),
(52, 18, 'png', 'directions.png', '2016-07-24 10:09:31', 1),
(53, 18, 'psd', 'directions.psd', '2016-07-24 10:09:31', 1),
(54, 18, 'ai', 'directions.eps', '2016-07-24 10:09:31', 1),
(55, 19, 'png', 'dislike.png', '2016-07-24 10:09:31', 1),
(56, 19, 'psd', 'dislike.psd', '2016-07-24 10:09:31', 1),
(57, 19, 'ai', 'dislike.eps', '2016-07-24 10:09:31', 1),
(58, 20, 'png', 'dollar-symbol-1.png', '2016-07-24 10:09:31', 1),
(59, 20, 'psd', 'dollar-symbol-1.psd', '2016-07-24 10:09:31', 1),
(60, 20, 'ai', 'dollar-symbol-1.eps', '2016-07-24 10:09:31', 1),
(61, 21, 'png', 'dollar-symbol.png', '2016-07-24 10:09:31', 1),
(62, 21, 'psd', 'dollar-symbol.psd', '2016-07-24 10:09:31', 1),
(63, 21, 'ai', 'dollar-symbol.eps', '2016-07-24 10:09:31', 1),
(64, 22, 'png', 'email.png', '2016-07-24 10:09:31', 1),
(65, 22, 'psd', 'email.psd', '2016-07-24 10:09:31', 1),
(66, 22, 'ai', 'email.eps', '2016-07-24 10:09:31', 1),
(67, 23, 'png', 'group-1.png', '2016-07-24 10:09:31', 1),
(68, 23, 'psd', 'group-1.psd', '2016-07-24 10:09:31', 1),
(69, 23, 'ai', 'group-1.eps', '2016-07-24 10:09:31', 1),
(70, 24, 'png', 'group-2.png', '2016-07-24 10:09:31', 1),
(71, 24, 'psd', 'group-2.psd', '2016-07-24 10:09:31', 1),
(72, 24, 'ai', 'group-2.eps', '2016-07-24 10:09:31', 1),
(73, 25, 'png', 'group.png', '2016-07-24 10:09:31', 1),
(74, 25, 'psd', 'group.psd', '2016-07-24 10:09:31', 1),
(75, 25, 'ai', 'group.eps', '2016-07-24 10:09:31', 1),
(76, 26, 'png', 'handshake.png', '2016-07-24 10:09:31', 1),
(77, 26, 'psd', 'handshake.psd', '2016-07-24 10:09:31', 1),
(78, 26, 'ai', 'handshake.eps', '2016-07-24 10:09:31', 1),
(79, 27, 'png', 'head.png', '2016-07-24 10:09:31', 1),
(80, 27, 'psd', 'head.psd', '2016-07-24 10:09:31', 1),
(81, 27, 'ai', 'head.eps', '2016-07-24 10:09:31', 1),
(82, 28, 'png', 'hierarchical-structure.png', '2016-07-24 10:09:31', 1),
(83, 28, 'psd', 'hierarchical-structure.psd', '2016-07-24 10:09:31', 1),
(84, 28, 'ai', 'hierarchical-structure.eps', '2016-07-24 10:09:31', 1),
(85, 29, 'png', 'invoice.png', '2016-07-24 10:09:31', 1),
(86, 29, 'psd', 'invoice.psd', '2016-07-24 10:09:31', 1),
(87, 29, 'ai', 'invoice.eps', '2016-07-24 10:09:31', 1),
(88, 30, 'png', 'laptop-1.png', '2016-07-24 10:09:31', 1),
(89, 30, 'psd', 'laptop-1.psd', '2016-07-24 10:09:31', 1),
(90, 30, 'ai', 'laptop-1.eps', '2016-07-24 10:09:31', 1),
(91, 31, 'png', 'laptop-2.png', '2016-07-24 10:09:31', 1),
(92, 31, 'psd', 'laptop-2.psd', '2016-07-24 10:09:31', 1),
(93, 31, 'ai', 'laptop-2.eps', '2016-07-24 10:09:31', 1),
(94, 32, 'png', 'laptop.png', '2016-07-24 10:09:31', 1),
(95, 32, 'psd', 'laptop.psd', '2016-07-24 10:09:31', 1),
(96, 32, 'ai', 'laptop.eps', '2016-07-24 10:09:31', 1),
(97, 33, 'png', 'like-1.png', '2016-07-24 10:09:31', 1),
(98, 33, 'psd', 'like-1.psd', '2016-07-24 10:09:31', 1),
(99, 33, 'ai', 'like-1.eps', '2016-07-24 10:09:31', 1),
(100, 34, 'png', 'like-2.png', '2016-07-24 10:09:31', 1),
(101, 34, 'psd', 'like-2.psd', '2016-07-24 10:09:31', 1),
(102, 34, 'ai', 'like-2.eps', '2016-07-24 10:09:31', 1),
(103, 35, 'png', 'like-3.png', '2016-07-24 10:09:31', 1),
(104, 35, 'psd', 'like-3.psd', '2016-07-24 10:09:31', 1),
(105, 35, 'ai', 'like-3.eps', '2016-07-24 10:09:31', 1),
(106, 36, 'png', 'like-4.png', '2016-07-24 10:09:31', 1),
(107, 36, 'psd', 'like-4.psd', '2016-07-24 10:09:31', 1),
(108, 36, 'ai', 'like-4.eps', '2016-07-24 10:09:31', 1),
(109, 37, 'png', 'like-5.png', '2016-07-24 10:09:31', 1),
(110, 37, 'psd', 'like-5.psd', '2016-07-24 10:09:31', 1),
(111, 37, 'ai', 'like-5.eps', '2016-07-24 10:09:31', 1),
(112, 38, 'png', 'like.png', '2016-07-24 10:09:31', 1),
(113, 38, 'psd', 'like.psd', '2016-07-24 10:09:31', 1),
(114, 38, 'ai', 'like.eps', '2016-07-24 10:09:31', 1),
(115, 39, 'png', 'list-1.png', '2016-07-24 10:09:31', 1),
(116, 39, 'psd', 'list-1.psd', '2016-07-24 10:09:31', 1),
(117, 39, 'ai', 'list-1.eps', '2016-07-24 10:09:31', 1),
(118, 40, 'png', 'list.png', '2016-07-24 10:09:31', 1),
(119, 40, 'psd', 'list.psd', '2016-07-24 10:09:31', 1),
(120, 40, 'ai', 'list.eps', '2016-07-24 10:09:31', 1),
(121, 41, 'png', 'money-1.png', '2016-07-24 10:09:31', 1),
(122, 41, 'psd', 'money-1.psd', '2016-07-24 10:09:31', 1),
(123, 41, 'ai', 'money-1.eps', '2016-07-24 10:09:31', 1),
(124, 42, 'png', 'money.png', '2016-07-24 10:09:31', 1),
(125, 42, 'psd', 'money.psd', '2016-07-24 10:09:31', 1),
(126, 42, 'ai', 'money.eps', '2016-07-24 10:09:31', 1),
(127, 43, 'png', 'mouse-1.png', '2016-07-24 10:09:31', 1),
(128, 43, 'psd', 'mouse-1.psd', '2016-07-24 10:09:31', 1),
(129, 43, 'ai', 'mouse-1.eps', '2016-07-24 10:09:31', 1),
(130, 44, 'png', 'mouse-2.png', '2016-07-24 10:09:31', 1),
(131, 44, 'psd', 'mouse-2.psd', '2016-07-24 10:09:31', 1),
(132, 44, 'ai', 'mouse-2.eps', '2016-07-24 10:09:31', 1),
(133, 45, 'png', 'mouse.png', '2016-07-24 10:09:31', 1),
(134, 45, 'psd', 'mouse.psd', '2016-07-24 10:09:31', 1),
(135, 45, 'ai', 'mouse.eps', '2016-07-24 10:09:31', 1),
(136, 46, 'png', 'network-1.png', '2016-07-24 10:09:31', 1),
(137, 46, 'psd', 'network-1.psd', '2016-07-24 10:09:31', 1),
(138, 46, 'ai', 'network-1.eps', '2016-07-24 10:09:31', 1),
(139, 47, 'png', 'network.png', '2016-07-24 10:09:31', 1),
(140, 47, 'psd', 'network.psd', '2016-07-24 10:09:31', 1),
(141, 47, 'ai', 'network.eps', '2016-07-24 10:09:31', 1),
(142, 48, 'png', 'networking-1.png', '2016-07-24 10:09:31', 1),
(143, 48, 'psd', 'networking-1.psd', '2016-07-24 10:09:31', 1),
(144, 48, 'ai', 'networking-1.eps', '2016-07-24 10:09:31', 1),
(145, 49, 'png', 'networking-2.png', '2016-07-24 10:09:31', 1),
(146, 49, 'psd', 'networking-2.psd', '2016-07-24 10:09:31', 1),
(147, 49, 'ai', 'networking-2.eps', '2016-07-24 10:09:31', 1),
(148, 50, 'png', 'networking-3.png', '2016-07-24 10:09:31', 1),
(149, 50, 'psd', 'networking-3.psd', '2016-07-24 10:09:31', 1),
(150, 50, 'ai', 'networking-3.eps', '2016-07-24 10:09:31', 1),
(151, 51, 'png', 'networking-4.png', '2016-07-24 10:09:31', 1),
(152, 51, 'psd', 'networking-4.psd', '2016-07-24 10:09:31', 1),
(153, 51, 'ai', 'networking-4.eps', '2016-07-24 10:09:31', 1),
(154, 52, 'png', 'networking-5.png', '2016-07-24 10:09:31', 1),
(155, 52, 'psd', 'networking-5.psd', '2016-07-24 10:09:31', 1),
(156, 52, 'ai', 'networking-5.eps', '2016-07-24 10:09:31', 1),
(157, 53, 'png', 'networking.png', '2016-07-24 10:09:31', 1),
(158, 53, 'psd', 'networking.psd', '2016-07-24 10:09:31', 1),
(159, 53, 'ai', 'networking.eps', '2016-07-24 10:09:31', 1),
(160, 54, 'png', 'padlock-1.png', '2016-07-24 10:09:31', 1),
(161, 54, 'psd', 'padlock-1.psd', '2016-07-24 10:09:31', 1),
(162, 54, 'ai', 'padlock-1.eps', '2016-07-24 10:09:31', 1),
(163, 55, 'png', 'padlock.png', '2016-07-24 10:09:31', 1),
(164, 55, 'psd', 'padlock.psd', '2016-07-24 10:09:31', 1),
(165, 55, 'ai', 'padlock.eps', '2016-07-24 10:09:31', 1),
(166, 56, 'png', 'pencil.png', '2016-07-24 10:09:31', 1),
(167, 56, 'psd', 'pencil.psd', '2016-07-24 10:09:31', 1),
(168, 56, 'ai', 'pencil.eps', '2016-07-24 10:09:31', 1),
(169, 57, 'png', 'people.png', '2016-07-24 10:09:31', 1),
(170, 57, 'psd', 'people.psd', '2016-07-24 10:09:31', 1),
(171, 57, 'ai', 'people.eps', '2016-07-24 10:09:31', 1),
(172, 58, 'png', 'pie-chart-1.png', '2016-07-24 10:09:31', 1),
(173, 58, 'psd', 'pie-chart-1.psd', '2016-07-24 10:09:31', 1),
(174, 58, 'ai', 'pie-chart-1.eps', '2016-07-24 10:09:31', 1),
(175, 59, 'png', 'pie-chart.png', '2016-07-24 10:09:31', 1),
(176, 59, 'psd', 'pie-chart.psd', '2016-07-24 10:09:31', 1),
(177, 59, 'ai', 'pie-chart.eps', '2016-07-24 10:09:31', 1),
(178, 60, 'png', 'piggy-bank-1.png', '2016-07-24 10:09:31', 1),
(179, 60, 'psd', 'piggy-bank-1.psd', '2016-07-24 10:09:31', 1),
(180, 60, 'ai', 'piggy-bank-1.eps', '2016-07-24 10:09:31', 1),
(181, 61, 'png', 'piggy-bank.png', '2016-07-24 10:09:31', 1),
(182, 61, 'psd', 'piggy-bank.psd', '2016-07-24 10:09:31', 1),
(183, 61, 'ai', 'piggy-bank.eps', '2016-07-24 10:09:31', 1),
(184, 62, 'png', 'placeholder.png', '2016-07-24 10:09:31', 1),
(185, 62, 'psd', 'placeholder.psd', '2016-07-24 10:09:31', 1),
(186, 62, 'ai', 'placeholder.eps', '2016-07-24 10:09:31', 1),
(187, 63, 'png', 'printer.png', '2016-07-24 10:09:31', 1),
(188, 63, 'psd', 'printer.psd', '2016-07-24 10:09:31', 1),
(189, 63, 'ai', 'printer.eps', '2016-07-24 10:09:31', 1),
(190, 64, 'png', 'route.png', '2016-07-24 10:09:31', 1),
(191, 64, 'psd', 'route.psd', '2016-07-24 10:09:31', 1),
(192, 64, 'ai', 'route.eps', '2016-07-24 10:09:31', 1),
(193, 65, 'png', 'search.png', '2016-07-24 10:09:31', 1),
(194, 65, 'psd', 'search.psd', '2016-07-24 10:09:31', 1),
(195, 65, 'ai', 'search.eps', '2016-07-24 10:09:31', 1),
(196, 66, 'png', 'security.png', '2016-07-24 10:09:31', 1),
(197, 66, 'psd', 'security.psd', '2016-07-24 10:09:31', 1),
(198, 66, 'ai', 'security.eps', '2016-07-24 10:09:31', 1),
(199, 67, 'png', 'server.png', '2016-07-24 10:09:31', 1),
(200, 67, 'psd', 'server.psd', '2016-07-24 10:09:31', 1),
(201, 67, 'ai', 'server.eps', '2016-07-24 10:09:31', 1),
(202, 68, 'png', 'settings-1.png', '2016-07-24 10:09:31', 1),
(203, 68, 'psd', 'settings-1.psd', '2016-07-24 10:09:31', 1),
(204, 68, 'ai', 'settings-1.eps', '2016-07-24 10:09:31', 1),
(205, 69, 'png', 'settings-2.png', '2016-07-24 10:09:31', 1),
(206, 69, 'psd', 'settings-2.psd', '2016-07-24 10:09:31', 1),
(207, 69, 'ai', 'settings-2.eps', '2016-07-24 10:09:31', 1),
(208, 70, 'png', 'settings.png', '2016-07-24 10:09:31', 1),
(209, 70, 'psd', 'settings.psd', '2016-07-24 10:09:31', 1),
(210, 70, 'ai', 'settings.eps', '2016-07-24 10:09:31', 1),
(211, 71, 'png', 'sharing.png', '2016-07-24 10:09:31', 1),
(212, 71, 'psd', 'sharing.psd', '2016-07-24 10:09:31', 1),
(213, 71, 'ai', 'sharing.eps', '2016-07-24 10:09:31', 1),
(214, 72, 'png', 'shopping-bag.png', '2016-07-24 10:09:31', 1),
(215, 72, 'psd', 'shopping-bag.psd', '2016-07-24 10:09:31', 1),
(216, 72, 'ai', 'shopping-bag.eps', '2016-07-24 10:09:31', 1),
(217, 73, 'png', 'smartphone-1.png', '2016-07-24 10:09:31', 1),
(218, 73, 'psd', 'smartphone-1.psd', '2016-07-24 10:09:31', 1),
(219, 73, 'ai', 'smartphone-1.eps', '2016-07-24 10:09:31', 1),
(220, 74, 'png', 'smartphone.png', '2016-07-24 10:09:31', 1),
(221, 74, 'psd', 'smartphone.psd', '2016-07-24 10:09:31', 1),
(222, 74, 'ai', 'smartphone.eps', '2016-07-24 10:09:31', 1),
(223, 75, 'png', 'startup.png', '2016-07-24 10:09:31', 1),
(224, 75, 'psd', 'startup.psd', '2016-07-24 10:09:31', 1),
(225, 75, 'ai', 'startup.eps', '2016-07-24 10:09:31', 1),
(226, 76, 'png', 'strategy.png', '2016-07-24 10:09:31', 1),
(227, 76, 'psd', 'strategy.psd', '2016-07-24 10:09:31', 1),
(228, 76, 'ai', 'strategy.eps', '2016-07-24 10:09:31', 1),
(229, 77, 'png', 'teamwork.png', '2016-07-24 10:09:31', 1),
(230, 77, 'psd', 'teamwork.psd', '2016-07-24 10:09:31', 1),
(231, 77, 'ai', 'teamwork.eps', '2016-07-24 10:09:31', 1),
(232, 78, 'png', 'transfer-1.png', '2016-07-24 10:09:31', 1),
(233, 78, 'psd', 'transfer-1.psd', '2016-07-24 10:09:31', 1),
(234, 78, 'ai', 'transfer-1.eps', '2016-07-24 10:09:31', 1),
(235, 79, 'png', 'transfer-2.png', '2016-07-24 10:09:31', 1),
(236, 79, 'psd', 'transfer-2.psd', '2016-07-24 10:09:31', 1),
(237, 79, 'ai', 'transfer-2.eps', '2016-07-24 10:09:31', 1),
(238, 80, 'png', 'transfer.png', '2016-07-24 10:09:31', 1),
(239, 80, 'psd', 'transfer.psd', '2016-07-24 10:09:31', 1),
(240, 80, 'ai', 'transfer.eps', '2016-07-24 10:09:31', 1),
(241, 81, 'png', 'user-1.png', '2016-07-24 10:09:31', 1),
(242, 81, 'psd', 'user-1.psd', '2016-07-24 10:09:31', 1),
(243, 81, 'ai', 'user-1.eps', '2016-07-24 10:09:31', 1),
(244, 82, 'png', 'user-10.png', '2016-07-24 10:09:31', 1),
(245, 82, 'psd', 'user-10.psd', '2016-07-24 10:09:31', 1),
(246, 82, 'ai', 'user-10.eps', '2016-07-24 10:09:31', 1),
(247, 83, 'png', 'user-11.png', '2016-07-24 10:09:31', 1),
(248, 83, 'psd', 'user-11.psd', '2016-07-24 10:09:31', 1),
(249, 83, 'ai', 'user-11.eps', '2016-07-24 10:09:31', 1),
(250, 84, 'png', 'user-12.png', '2016-07-24 10:09:31', 1),
(251, 84, 'psd', 'user-12.psd', '2016-07-24 10:09:31', 1),
(252, 84, 'ai', 'user-12.eps', '2016-07-24 10:09:31', 1),
(253, 85, 'png', 'user-13.png', '2016-07-24 10:09:31', 1),
(254, 85, 'psd', 'user-13.psd', '2016-07-24 10:09:31', 1),
(255, 85, 'ai', 'user-13.eps', '2016-07-24 10:09:31', 1),
(256, 86, 'png', 'user-14.png', '2016-07-24 10:09:31', 1),
(257, 86, 'psd', 'user-14.psd', '2016-07-24 10:09:31', 1),
(258, 86, 'ai', 'user-14.eps', '2016-07-24 10:09:31', 1),
(259, 87, 'png', 'user-2.png', '2016-07-24 10:09:31', 1),
(260, 87, 'psd', 'user-2.psd', '2016-07-24 10:09:31', 1),
(261, 87, 'ai', 'user-2.eps', '2016-07-24 10:09:31', 1),
(262, 88, 'png', 'user-3.png', '2016-07-24 10:09:31', 1),
(263, 88, 'psd', 'user-3.psd', '2016-07-24 10:09:31', 1),
(264, 88, 'ai', 'user-3.eps', '2016-07-24 10:09:31', 1),
(265, 89, 'png', 'user-4.png', '2016-07-24 10:09:31', 1),
(266, 89, 'psd', 'user-4.psd', '2016-07-24 10:09:31', 1),
(267, 89, 'ai', 'user-4.eps', '2016-07-24 10:09:31', 1),
(268, 90, 'png', 'user-5.png', '2016-07-24 10:09:31', 1),
(269, 90, 'psd', 'user-5.psd', '2016-07-24 10:09:31', 1),
(270, 90, 'ai', 'user-5.eps', '2016-07-24 10:09:31', 1),
(271, 91, 'png', 'user-6.png', '2016-07-24 10:09:31', 1),
(272, 91, 'psd', 'user-6.psd', '2016-07-24 10:09:31', 1),
(273, 91, 'ai', 'user-6.eps', '2016-07-24 10:09:31', 1),
(274, 92, 'png', 'user-7.png', '2016-07-24 10:09:31', 1),
(275, 92, 'psd', 'user-7.psd', '2016-07-24 10:09:31', 1),
(276, 92, 'ai', 'user-7.eps', '2016-07-24 10:09:31', 1),
(277, 93, 'png', 'user-8.png', '2016-07-24 10:09:31', 1),
(278, 93, 'psd', 'user-8.psd', '2016-07-24 10:09:31', 1),
(279, 93, 'ai', 'user-8.eps', '2016-07-24 10:09:31', 1),
(280, 94, 'png', 'user-9.png', '2016-07-24 10:09:31', 1),
(281, 94, 'psd', 'user-9.psd', '2016-07-24 10:09:31', 1),
(282, 94, 'ai', 'user-9.eps', '2016-07-24 10:09:31', 1),
(283, 95, 'png', 'user.png', '2016-07-24 10:09:31', 1),
(284, 95, 'psd', 'user.psd', '2016-07-24 10:09:31', 1),
(285, 95, 'ai', 'user.eps', '2016-07-24 10:09:31', 1),
(286, 96, 'png', 'worldwide-1.png', '2016-07-24 10:09:31', 1),
(287, 96, 'psd', 'worldwide-1.psd', '2016-07-24 10:09:31', 1),
(288, 96, 'ai', 'worldwide-1.eps', '2016-07-24 10:09:31', 1),
(289, 97, 'png', 'worldwide-2.png', '2016-07-24 10:09:31', 1),
(290, 97, 'psd', 'worldwide-2.psd', '2016-07-24 10:09:31', 1),
(291, 97, 'ai', 'worldwide-2.eps', '2016-07-24 10:09:31', 1),
(292, 98, 'png', 'worldwide.png', '2016-07-24 10:09:31', 1),
(293, 98, 'psd', 'worldwide.psd', '2016-07-24 10:09:31', 1),
(294, 98, 'ai', 'worldwide.eps', '2016-07-24 10:09:31', 1),
(295, 99, 'png', 'wrench.png', '2016-07-24 10:09:31', 1),
(296, 99, 'psd', 'wrench.psd', '2016-07-24 10:09:31', 1),
(297, 99, 'ai', 'wrench.eps', '2016-07-24 10:09:31', 1),
(298, 100, 'png', 'wristwatch.png', '2016-07-24 10:09:31', 1),
(299, 100, 'psd', 'wristwatch.psd', '2016-07-24 10:09:31', 1),
(300, 100, 'ai', 'wristwatch.eps', '2016-07-24 10:09:31', 1),
(361, 123, 'png', 'd49b33bf58e03b9e51358be1bec9e0da.png', '2016-07-28 11:14:10', 10),
(362, 123, 'psd', 'c7caed3744d0a7bf2aa743fb85e768f0.psd', '2016-07-28 11:14:10', 10),
(363, 123, 'ai', 'f2c41d67dfd54a5ca5c5d9174717c8df.eps', '2016-07-28 11:14:10', 10);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE IF NOT EXISTS `icons` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `type` varchar(30) NOT NULL,
  `price` decimal(20,0) NOT NULL,
  `url` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `default_image` varchar(255) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `downloads` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `name`, `category`, `tags`, `type`, `price`, `url`, `created_at`, `created_by`, `default_image`, `views`, `downloads`, `deleted`) VALUES
(1, 'Add ', 'Business', ' add, sign, math', 'free', '0', 'add', '2016-07-24 10:09:31', 1, 'add.png', 0, 0, 0),
(2, 'Bar Chart ', 'Business', 'bar, chart', 'free', '0', 'bar-chart', '2016-07-24 10:09:31', 1, 'bar-chart.png', 0, 0, 0),
(3, 'Binoculars ', 'Business', 'business', 'free', '0', 'binoculars', '2016-07-24 10:09:31', 1, 'binoculars.png', 0, 0, 0),
(4, 'Browser ', 'Business', 'browser, web, internet', 'free', '0', 'browser ', '2016-07-24 10:09:31', 1, 'browser.png', 0, 0, 0),
(5, 'Bug ', 'Business', 'bug, apps, software, insect', 'free', '0', 'bug ', '2016-07-24 10:09:31', 1, 'bug.png', 0, 0, 0),
(6, 'Chat 1 ', 'Business', 'chat, apps, bubble', 'free', '0', 'chat-1 ', '2016-07-24 10:09:31', 1, 'chat-1.png', 0, 0, 0),
(7, 'Chat 2 ', 'Business', 'chat, apps, bubble', 'free', '0', 'chat-2 ', '2016-07-24 10:09:31', 1, 'chat-2.png', 0, 0, 0),
(8, 'Chat ', 'Business', 'chat, apps, bubble', 'free', '0', 'chat ', '2016-07-24 10:09:31', 1, 'chat.png', 0, 0, 0),
(9, 'Cloud Computing 1 ', 'Business', 'cloud, computing, internet, web', 'free', '0', 'cloud-computing-1 ', '2016-07-24 10:09:31', 1, 'cloud-computing-1.png', 0, 0, 0),
(10, 'Cloud Computing ', 'Business', 'cloud, computing, internet, web', 'free', '0', 'cloud-computing ', '2016-07-24 10:09:31', 1, 'cloud-computing.png', 0, 0, 0),
(11, 'Compass 1 ', 'Business', 'compass, wind, tools', 'free', '0', 'compass-1', '2016-07-24 10:09:31', 1, 'compass-1.png', 0, 0, 0),
(12, 'Compass ', 'Business', 'compass, wind, tools', 'free', '0', 'compass ', '2016-07-24 10:09:31', 1, 'compass.png', 0, 0, 0),
(13, 'Computer 1 ', 'Business', 'computer, technology', 'free', '0', 'computer-1 ', '2016-07-24 10:09:31', 1, 'computer-1.png', 0, 0, 0),
(14, 'Computer ', 'Business', 'computer, technology', 'free', '0', 'computer ', '2016-07-24 10:09:31', 1, 'computer.png', 0, 0, 0),
(15, 'Connection 1 ', 'Business', 'connection, internet', 'free', '0', 'connection-1 ', '2016-07-24 10:09:31', 1, 'connection-1.png', 0, 0, 0),
(16, 'Connection ', 'Business', 'connection, internet', 'free', '0', 'connection ', '2016-07-24 10:09:31', 1, 'connection.png', 0, 0, 0),
(17, 'Desk ', 'Business', 'desk, table, office', 'free', '0', 'desk ', '2016-07-24 10:09:31', 1, 'desk.png', 0, 0, 0),
(18, 'Directions ', 'Business', 'direction, sign', 'free', '0', 'directions ', '2016-07-24 10:09:31', 1, 'directions.png', 0, 0, 0),
(19, 'Dislike ', 'Business', 'dislike, social media', 'free', '0', 'dislike ', '2016-07-24 10:09:31', 1, 'dislike.png', 0, 0, 0),
(20, 'Dollar Symbol 1 ', 'Business', 'dollar, symbol, currency', 'free', '0', 'dollar-symbol-1 ', '2016-07-24 10:09:31', 1, 'dollar-symbol-1.png', 0, 0, 0),
(21, 'Dollar Symbol ', 'Business', 'dollar, symbol, currency', 'free', '0', 'dollar-symbol ', '2016-07-24 10:09:31', 1, 'dollar-symbol.png', 0, 0, 0),
(22, 'Email ', 'Business', 'email, apps, internet,web', 'free', '0', 'email ', '2016-07-24 10:09:31', 1, 'email.png', 0, 0, 0),
(23, 'Group 1 ', 'Business', 'group, peoples', 'free', '0', 'group-1 ', '2016-07-24 10:09:31', 1, 'group-1.png', 0, 0, 0),
(24, 'Group 2 ', 'Business', 'group, peoples', 'free', '0', 'group-2 ', '2016-07-24 10:09:31', 1, 'group-2.png', 0, 0, 0),
(25, 'Group ', 'Business', 'group, peoples', 'free', '0', 'group ', '2016-07-24 10:09:31', 1, 'group.png', 0, 0, 0),
(26, 'Handshake ', 'Business', 'hand, shake, people, relationship', 'free', '0', 'handshake ', '2016-07-24 10:09:31', 1, 'handshake.png', 0, 0, 0),
(27, 'Head ', 'Business', 'head, people', 'free', '0', 'head ', '2016-07-24 10:09:31', 1, 'head.png', 0, 0, 0),
(28, 'Hierarchical Structure ', 'Business', 'hierarchical, structure, organization', 'free', '0', 'hierarchical-structure ', '2016-07-24 10:09:31', 1, 'hierarchical-structure.png', 0, 0, 0),
(29, 'Invoice ', 'Business', 'invoice, market, sales', 'free', '0', 'invoice ', '2016-07-24 10:09:31', 1, 'invoice.png', 0, 0, 0),
(30, 'Laptop 1 ', 'Business', 'laptop, computer, pc', 'free', '0', 'laptop-1 ', '2016-07-24 10:09:31', 1, 'laptop-1.png', 0, 0, 0),
(31, 'Laptop 2 ', 'Business', 'laptop, computer, pc', 'free', '0', 'laptop 2 ', '2016-07-24 10:09:31', 1, 'laptop-2.png', 0, 0, 0),
(32, 'Laptop ', 'Business', 'laptop, computer, pc', 'free', '0', 'laptop ', '2016-07-24 10:09:31', 1, 'laptop.png', 0, 0, 0),
(33, 'Like 1 ', 'Business', 'like, social media', 'free', '0', 'like-1 ', '2016-07-24 10:09:31', 1, 'like-1.png', 0, 0, 0),
(34, 'Like 2 ', 'Business', 'like, social media', 'free', '0', 'like-2 ', '2016-07-24 10:09:31', 1, 'like-2.png', 0, 0, 0),
(35, 'Like 3 ', 'Business', 'like, social media', 'free', '0', 'like-3 ', '2016-07-24 10:09:31', 1, 'like-3.png', 0, 0, 0),
(36, 'Like 4 ', 'Business', 'like, social media', 'free', '0', 'like-4 ', '2016-07-24 10:09:31', 1, 'like-4.png', 0, 0, 0),
(37, 'Like 5 ', 'Business', 'like, social media', 'free', '0', 'like-5 ', '2016-07-24 10:09:31', 1, 'like-5.png', 0, 0, 0),
(38, 'Like ', 'Business', 'like, social media', 'free', '0', 'like ', '2016-07-24 10:09:31', 1, 'like.png', 0, 0, 0),
(39, 'List 1 ', 'Business', 'list, structure', 'free', '0', 'list-1 ', '2016-07-24 10:09:31', 1, 'list-1.png', 0, 0, 0),
(40, 'List ', 'Business', 'list, structure', 'free', '0', 'list ', '2016-07-24 10:09:31', 1, 'list.png', 0, 0, 0),
(41, 'Money 1 ', 'Business', 'money, dollar, economy', 'free', '0', 'money-1 ', '2016-07-24 10:09:31', 1, 'money-1.png', 0, 0, 0),
(42, 'Money ', 'Business', 'money, dollar, economy', 'free', '0', 'money ', '2016-07-24 10:09:31', 1, 'money.png', 0, 0, 0),
(43, 'Mouse 1 ', 'Business', 'mouse, accesoris', 'free', '0', 'mouse-1 ', '2016-07-24 10:09:31', 1, 'mouse-1.png', 0, 0, 0),
(44, 'Mouse 2 ', 'Business', 'mouse, accesoris', 'free', '0', 'mouse-2 ', '2016-07-24 10:09:31', 1, 'mouse-2.png', 0, 0, 0),
(45, 'Mouse ', 'Business', 'mouse, accesoris', 'free', '0', 'mouse ', '2016-07-24 10:09:31', 1, 'mouse.png', 0, 0, 0),
(46, 'Network 1 ', 'Business', 'network, organization, structure', 'free', '0', 'network-1 ', '2016-07-24 10:09:31', 1, 'network-1.png', 0, 0, 0),
(47, 'Network ', 'Business', 'network, organization, structure', 'free', '0', 'network ', '2016-07-24 10:09:31', 1, 'network.png', 0, 0, 0),
(48, 'Networking 1 ', 'Business', 'network, organization, structure', 'free', '0', 'networking-1 ', '2016-07-24 10:09:31', 1, 'networking-1.png', 0, 0, 0),
(49, 'Networking 2 ', 'Business', 'network, organization, structure', 'free', '0', 'networking-2 ', '2016-07-24 10:09:31', 1, 'networking-2.png', 0, 0, 0),
(50, 'Networking 3 ', 'Business', 'network, organization, structure', 'free', '0', 'networking-3 ', '2016-07-24 10:09:31', 1, 'networking-3.png', 0, 0, 0),
(51, 'Networking 4 ', 'Business', 'network, organization, structure', 'free', '0', 'networking-4 ', '2016-07-24 10:09:31', 1, 'networking-4.png', 0, 0, 0),
(52, 'Networking 5 ', 'Business', 'network, organization, structure', 'free', '0', 'networking-5 ', '2016-07-24 10:09:31', 1, 'networking-5.png', 0, 0, 0),
(53, 'Networking ', 'Business', 'network, organization, structure', 'free', '0', 'networking ', '2016-07-24 10:09:31', 1, 'networking.png', 0, 0, 0),
(54, 'Padlock 1 ', 'Business', 'padlock, lock', 'free', '0', 'padlock-1 ', '2016-07-24 10:09:31', 1, 'padlock-1.png', 0, 0, 0),
(55, 'Padlock ', 'Business', 'padlock, lock', 'free', '0', 'padlock ', '2016-07-24 10:09:31', 1, 'padlock.png', 0, 0, 0),
(56, 'Pencil ', 'Business', 'pencil, tools, office, writing', 'free', '0', 'pencil ', '2016-07-24 10:09:31', 1, 'pencil.png', 0, 0, 0),
(57, 'People ', 'Business', 'people, human, man, woman', 'free', '0', 'people ', '2016-07-24 10:09:31', 1, 'people.png', 0, 0, 0),
(58, 'Pie Chart 1 ', 'Business', 'pie, chart', 'free', '0', 'pie-chart-1 ', '2016-07-24 10:09:31', 1, 'pie-chart-1.png', 0, 0, 0),
(59, 'Pie Chart ', 'Business', 'pie, chart', 'free', '0', 'pie-chart ', '2016-07-24 10:09:31', 1, 'pie-chart.png', 0, 0, 0),
(60, 'Piggy Bank 1 ', 'Business', 'piggy, bank', 'free', '0', 'piggy-bank-1 ', '2016-07-24 10:09:31', 1, 'piggy-bank-1.png', 0, 0, 0),
(61, 'Piggy Bank ', 'Business', 'piggy, bank', 'free', '0', 'piggy-bank ', '2016-07-24 10:09:31', 1, 'piggy-bank.png', 0, 0, 0),
(62, 'Placeholder ', 'Business', 'placeholder', 'free', '0', 'placeholder ', '2016-07-24 10:09:31', 1, 'placeholder.png', 0, 0, 0),
(63, 'Printer ', 'Business', 'printer, accesoris, printing', 'free', '0', 'printer ', '2016-07-24 10:09:31', 1, 'printer.png', 0, 0, 0),
(64, 'Route ', 'Business', 'route, communication', 'free', '0', 'route ', '2016-07-24 10:09:31', 1, 'route.png', 0, 0, 0),
(65, 'Search ', 'Business', 'search, sign', 'free', '0', 'search ', '2016-07-24 10:09:31', 1, 'search.png', 0, 0, 0),
(66, 'Security ', 'Business', 'security, lock, authorized', 'free', '0', 'security ', '2016-07-24 10:09:31', 1, 'security.png', 0, 0, 0),
(67, 'Server ', 'Business', 'server, cloud', 'free', '0', 'server ', '2016-07-24 10:09:31', 1, 'server.png', 0, 0, 0),
(68, 'Settings 1 ', 'Business', 'setting, gear', 'free', '0', 'settings-1 ', '2016-07-24 10:09:31', 1, 'settings-1.png', 0, 0, 0),
(69, 'Settings 2 ', 'Business', 'setting, gear', 'free', '0', 'settings-2 ', '2016-07-24 10:09:31', 1, 'settings-2.png', 0, 0, 0),
(70, 'Settings ', 'Business', 'setting, gear', 'free', '0', 'settings ', '2016-07-24 10:09:31', 1, 'settings.png', 0, 0, 0),
(71, 'Sharing ', 'Business', 'sharing, social media, people, communication', 'free', '0', 'sharing ', '2016-07-24 10:09:31', 1, 'sharing.png', 0, 0, 0),
(72, 'Shopping Bag ', 'Business', 'shopping, bag, sales, market, ecommerce', 'free', '0', 'shopping-bag ', '2016-07-24 10:09:31', 1, 'shopping-bag.png', 0, 0, 0),
(73, 'Smartphone 1 ', 'Business', 'smartphone, phone, mobile phone', 'free', '0', 'smartphone-1 ', '2016-07-24 10:09:31', 1, 'smartphone-1.png', 0, 0, 0),
(74, 'Smartphone ', 'Business', 'smartphone, phone, mobile phone', 'free', '0', 'smartphone ', '2016-07-24 10:09:31', 1, 'smartphone.png', 0, 0, 0),
(75, 'Startup ', 'Business', 'startup, business, enterpreneur', 'free', '0', 'startup ', '2016-07-24 10:09:31', 1, 'startup.png', 0, 0, 0),
(76, 'Strategy ', 'Business', 'strategy', 'free', '0', 'strategy ', '2016-07-24 10:09:31', 1, 'strategy.png', 0, 0, 0),
(77, 'Teamwork ', 'Business', 'teamwork, team, organization', 'free', '0', 'teamwork ', '2016-07-24 10:09:31', 1, 'teamwork.png', 0, 0, 0),
(78, 'Transfer 1 ', 'Business', 'transfer, communication', 'free', '0', 'transfer-1 ', '2016-07-24 10:09:31', 1, 'transfer-1.png', 0, 0, 0),
(79, 'Transfer 2 ', 'Business', 'transfer, communication', 'free', '0', 'transfer-2 ', '2016-07-24 10:09:31', 1, 'transfer-2.png', 0, 0, 0),
(80, 'Transfer ', 'Business', 'transfer, communication', 'free', '0', 'transfer ', '2016-07-24 10:09:31', 1, 'transfer.png', 0, 0, 0),
(81, 'User 1 ', 'Business', 'user, people, man, woman', 'free', '0', 'user-1 ', '2016-07-24 10:09:31', 1, 'user-1.png', 0, 0, 0),
(82, 'User 10 ', 'Business', 'user, people, man, woman', 'free', '0', 'user-10 ', '2016-07-24 10:09:31', 1, 'user-10.png', 0, 0, 0),
(83, 'User 11 ', 'Business', 'user, people, man, woman', 'free', '0', 'user-11 ', '2016-07-24 10:09:31', 1, 'user-11.png', 0, 0, 0),
(84, 'User 12 ', 'Business', 'user, people, man, woman', 'free', '0', 'user-12 ', '2016-07-24 10:09:31', 1, 'user-12.png', 0, 0, 0),
(85, 'User 13 ', 'Business', 'user, people, man, woman', 'free', '0', 'user-13 ', '2016-07-24 10:09:31', 1, 'user-13.png', 0, 0, 0),
(86, 'User 14 ', 'Business', 'user, people, man, woman', 'free', '0', 'user-14 ', '2016-07-24 10:09:31', 1, 'user-14.png', 0, 0, 0),
(87, 'User 2 ', 'Business', 'user, people, man, woman', 'free', '0', 'user-2 ', '2016-07-24 10:09:31', 1, 'user-2.png', 0, 0, 0),
(88, 'User 3 ', 'Business', 'user, people, man, woman', 'free', '0', 'user-3 ', '2016-07-24 10:09:31', 1, 'user-3.png', 0, 0, 0),
(89, 'User 4 ', 'Business', 'user, people, man, woman', 'free', '0', 'user-4 ', '2016-07-24 10:09:31', 1, 'user-4.png', 0, 0, 0),
(90, 'User 5 ', 'Business', 'user, people, man, woman', 'free', '0', 'user-5 ', '2016-07-24 10:09:31', 1, 'user-5.png', 0, 0, 0),
(91, 'User 6 ', 'Business', 'user, people, man, woman', 'free', '0', 'user 6 ', '2016-07-24 10:09:31', 1, 'user-6.png', 0, 0, 0),
(92, 'User 7 ', 'Business', 'user, people, man, woman', 'free', '0', 'user-7 ', '2016-07-24 10:09:31', 1, 'user-7.png', 0, 0, 0),
(93, 'User 8 ', 'Business', 'user, people, man, woman', 'free', '0', 'user-8 ', '2016-07-24 10:09:31', 1, 'user-8.png', 0, 0, 0),
(94, 'User 9 ', 'Business', 'user, people, man, woman', 'free', '0', 'user-9 ', '2016-07-24 10:09:31', 1, 'user-9.png', 0, 0, 0),
(95, 'User ', 'Business', 'user, people, man, woman', 'free', '0', 'user ', '2016-07-24 10:09:31', 1, 'user.png', 0, 0, 0),
(96, 'Worldwide 1 ', 'Business', 'worldwide, www, web, internet', 'free', '0', 'worldwide-1 ', '2016-07-24 10:09:31', 1, 'worldwide-1.png', 0, 0, 0),
(97, 'Worldwide 2 ', 'Business', 'worldwide, www, web, internet', 'free', '0', 'worldwide-2 ', '2016-07-24 10:09:31', 1, 'worldwide-2.png', 0, 0, 0),
(98, 'Worldwide ', 'Business', 'worldwide, www, web, internet', 'free', '0', 'worldwide ', '2016-07-24 10:09:31', 1, 'worldwide.png', 0, 0, 0),
(99, 'Wrench ', 'Business', 'wrench, setting, tools', 'free', '0', 'wrench ', '2016-07-24 10:09:31', 1, 'wrench.png', 0, 0, 0),
(100, 'Wristwatch ', 'Business', 'wristwatch, watch', 'free', '0', 'wristwatch ', '2016-07-24 10:09:31', 1, 'wristwatch.png', 0, 0, 0),
(123, 'Add User', 'Line', 'add,user,people', 'free', '0', 'add-user_1783194721', '2016-07-28 11:14:10', 10, 'd49b33bf58e03b9e51358be1bec9e0da.png', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1469150750, 1, 'Admin', 'Belancon', 'ADMIN', '0'),
(10, '127.0.0.1', 'belancon', '$2y$08$41ZBLf55dduFcEeafBukRO3Te7.aqhR2gos9ugUlYBFwoZVCk7YQm', NULL, 'belancon.dev@gmail.com', NULL, NULL, NULL, NULL, 1469079323, 1469693791, 1, 'Belancon', 'Team', NULL, ''),
(12, '127.0.0.1', 'testmember', '$2y$08$RqAHJAKnICzMhi5.jOXy3OS58QOo87t4oor9FAjMkxxPhosW1S0bW', NULL, 'testmember@belancon.com', NULL, NULL, NULL, NULL, 1469090996, 1469091009, 1, 'Test', 'Member', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(11, 10, 1),
(13, 12, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bugs`
--
ALTER TABLE `bugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contributors`
--
ALTER TABLE `contributors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `url` (`url`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bugs`
--
ALTER TABLE `bugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contributors`
--
ALTER TABLE `contributors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=364;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
