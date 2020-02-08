-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2020 at 09:56 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sf_wedding`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `booking_cus_id` varchar(200) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `admin_stat` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `booking_cus_id`, `event_id`, `status`, `admin_stat`) VALUES
(8, '20200127123024', 32, 1, 1),
(9, '20200128025842', 33, 1, 1),
(10, '20200128044369', 34, 0, 0),
(11, '20200128045051', 35, 0, 0),
(14, '20200128121236', 45, 0, 0),
(15, '20200128121366', 46, 0, 0),
(16, '20200129033858', 47, 1, 1),
(17, '20200129040541', 48, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bride`
--

CREATE TABLE `bride` (
  `id` int(11) NOT NULL,
  `couple_id` int(11) DEFAULT NULL,
  `path` varchar(25) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ch_logo`
--

CREATE TABLE `ch_logo` (
  `id` int(11) NOT NULL,
  `site_fk` int(11) NOT NULL,
  `path` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ch_logo`
--

INSERT INTO `ch_logo` (`id`, `site_fk`, `path`, `status`) VALUES
(1, 1, 'flat-mockup.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ch_site`
--

CREATE TABLE `ch_site` (
  `id` int(11) NOT NULL,
  `site_name` varchar(50) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ch_site`
--

INSERT INTO `ch_site` (`id`, `site_name`, `timestamp`) VALUES
(1, 'Wedding Planner', '2019-11-19 13:17:43');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `couple_front`
--

CREATE TABLE `couple_front` (
  `id` int(11) NOT NULL,
  `front_id` int(11) DEFAULT NULL,
  `couple_text` text,
  `groom_text` text,
  `bride_text` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `groom` varchar(200) NOT NULL,
  `bride` varchar(200) NOT NULL,
  `location` varchar(250) DEFAULT NULL,
  `budget` varchar(250) DEFAULT NULL,
  `title` varchar(250) NOT NULL,
  `forCountDown` varchar(200) NOT NULL,
  `start` varchar(200) DEFAULT NULL,
  `end` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `user_id`, `groom`, `bride`, `location`, `budget`, `title`, `forCountDown`, `start`, `end`) VALUES
(32, 8, 'Richard Anderson', 'KC Iglesias', 'Tacluban City', 'P20,000-P50,000', 'KC Iglesias & Richard Anderson', 'Fri Mar 13 2020 07:00:00 GMT-0700', '2020-03-13', ''),
(33, 15, 'Anthony Ong', 'Sofia Andres', 'Dumaguete City', 'P50,000-P100,000', 'Sofia Andres & Anthony Ong', 'Fri Jan 10 2020 02:00:00 GMT+0800', '2020-01-10', ''),
(45, 19, 'Diomar Panchu', 'Diomar Panchu', 'ghj', 'P20,000-P50,000', 'Diomar Panchu & Diomar Panchu', '2020-1-31', '2020-1-31', ''),
(47, 20, 'John Smith', 'Jane Smoth', 'Dumaguete City', 'P20,000-P50,000', 'Jane Smoth & John Smith', '2019-12-30', '2019-12-30', ''),
(48, 21, 'Johnny Depp', 'Jenny Dew', 'Valencia', 'P50,000-P100,000', 'Jenny Dew & Johnny Depp', '2020-6-25', '2020-6-25', '');

-- --------------------------------------------------------

--
-- Table structure for table `front_end`
--

CREATE TABLE `front_end` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groom`
--

CREATE TABLE `groom` (
  `id` int(11) NOT NULL,
  `couple_id` int(11) DEFAULT NULL,
  `path` varchar(25) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hero_front`
--

CREATE TABLE `hero_front` (
  `id` int(11) NOT NULL,
  `front_id` int(11) DEFAULT NULL,
  `hero_text` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hero_image`
--

CREATE TABLE `hero_image` (
  `id` int(11) NOT NULL,
  `hero_id` int(11) DEFAULT NULL,
  `path` varchar(25) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_receiver_id` int(11) DEFAULT NULL,
  `user_sender_id` int(11) DEFAULT NULL,
  `msg_content` text,
  `msg_time` varchar(50) NOT NULL,
  `msg_date` varchar(50) DEFAULT NULL,
  `delivered_status` tinyint(1) DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_receiver_id`, `user_sender_id`, `msg_content`, `msg_time`, `msg_date`, `delivered_status`, `timestamp`) VALUES
(1, 2, 1, 'Hello', '', NULL, 0, '2019-11-21 03:53:18'),
(2, 1, 2, 'How are you?', '', NULL, 0, '2019-11-21 03:54:01'),
(3, 2, 1, 'Great, hw\'bout you?', '', NULL, 0, '2019-11-21 04:40:45'),
(7, 1, 3, 'Hello sir', '', NULL, 0, '2019-11-21 05:46:54'),
(8, 1, 2, 'Hello john.', '', NULL, 0, '2019-11-21 07:40:15'),
(9, 2, 1, 'He its me', '', NULL, 0, '2019-11-21 07:41:19'),
(10, 1, 3, 're you available?', '', NULL, 0, '2019-11-21 07:43:29'),
(11, 1, 2, 're you available???????', '', NULL, 0, '2019-11-21 08:05:25'),
(12, 1, 3, 'Hello sir i just wan to confirm my appointment', '', NULL, 0, '2019-11-21 08:50:51'),
(13, 1, 2, 'Are you available this sat?', '', NULL, 0, '2019-11-21 08:52:16'),
(14, 1, 3, 'hellloooo?', '', NULL, 0, '2019-11-21 08:57:17'),
(15, 1, 3, 'gf', '', NULL, 0, '2019-11-21 09:04:48'),
(16, 1, 2, 'hesssllloooo?', '', NULL, 0, '2019-11-21 08:58:52'),
(17, 8, 2, 'hessslwqwlloooo?', '', NULL, 0, '2020-01-24 05:19:49'),
(18, 1, 2, 'Hope this work', '', NULL, 0, '2019-11-21 09:08:35'),
(19, 2, 8, 'Hello', '07:03 pm', 'Nov. 21, 2019', 0, '2020-01-24 05:19:44'),
(20, 8, 1, 'are you sure?', '07:14 pm', 'Nov. 21, 2019', 0, '2020-01-24 04:57:15'),
(21, 2, 8, 'this one', '07:14 pm', 'Nov. 21, 2019', 0, '2020-01-24 04:57:08'),
(22, 2, 1, 'this one yess', '07:15 pm', 'Nov. 21, 2019', 0, '2019-11-21 11:15:00'),
(23, 8, 1, 'this one yess', '07:15 pm', 'Nov. 21, 2019', 0, '2020-01-24 04:57:22'),
(24, 2, 1, 'this one yess', '07:15 pm', 'Nov. 21, 2019', 0, '2019-11-21 11:15:13'),
(25, 2, 8, 'asdasdsad', '07:25 pm', 'Nov. 21, 2019', 0, '2020-01-24 04:57:27'),
(26, 2, 1, 'sdfsdf', '07:30 pm', 'Nov. 21, 2019', 0, '2019-11-21 11:30:23'),
(27, 2, 1, 'sddsfwww', '07:32 pm', 'Nov. 21, 2019', 0, '2019-11-21 11:32:39'),
(28, 2, 1, 'asdx', '07:35 pm', 'Nov. 21, 2019', 0, '2019-11-21 11:35:36'),
(29, 2, 1, 'asds', '07:35 pm', 'Nov. 21, 2019', 0, '2019-11-21 11:35:59'),
(30, 2, 1, 'You my man!!!', '07:36 pm', 'Nov. 21, 2019', 0, '2019-11-21 11:36:41'),
(31, 2, 1, 'Hello?', '07:54 pm', 'Nov. 21, 2019', 0, '2019-11-21 11:54:03'),
(32, 2, 1, 'are there?', '07:54 pm', 'Nov. 21, 2019', 0, '2019-11-21 11:54:56'),
(33, 2, 1, 'is she?', '07:55 pm', 'Nov. 21, 2019', 0, '2019-11-21 11:55:07'),
(34, 2, 1, 'No way..', '07:55 pm', 'Nov. 21, 2019', 0, '2019-11-21 11:55:49'),
(35, 2, 1, 'No way hahha', '07:55 pm', 'Nov. 21, 2019', 0, '2019-11-21 11:55:57'),
(36, 2, 1, 'dfds', '07:57 pm', 'Nov. 21, 2019', 0, '2019-11-21 11:57:05'),
(37, 2, 1, 's', '07:58 pm', 'Nov. 21, 2019', 0, '2019-11-21 11:58:06'),
(38, 2, 1, 'asdsad rtet', '08:01 pm', 'Nov. 21, 2019', 0, '2019-11-21 12:01:13'),
(39, 2, 1, 'asd', '08:02 pm', 'Nov. 21, 2019', 0, '2019-11-21 12:02:06'),
(40, 2, 1, 'is that is?', '08:05 pm', 'Nov. 21, 2019', 0, '2019-11-21 12:05:35'),
(41, 2, 1, 'marry one.', '08:06 pm', 'Nov. 21, 2019', 0, '2019-11-21 12:06:42'),
(42, 2, 1, 'marry one.', '08:06 pm', 'Nov. 21, 2019', 0, '2019-11-21 12:06:52'),
(43, 2, 1, 'sdd sdf', '08:07 pm', 'Nov. 21, 2019', 0, '2019-11-21 12:07:34'),
(44, 2, 1, 'jjajaja', '08:08 pm', 'Nov. 21, 2019', 0, '2019-11-21 12:08:43'),
(45, 3, 1, 'hey', '08:08 pm', 'Nov. 21, 2019', 0, '2019-11-21 12:08:57'),
(46, 1, 2, 'Holar', '', NULL, 0, '2019-11-22 00:05:55'),
(47, 2, 1, 'musta?', '08:06 am', 'Nov. 22, 2019', 0, '2019-11-22 00:06:13'),
(48, 1, 2, 'great', '', NULL, 0, '2019-11-22 00:06:22'),
(49, 1, 2, 'mungaw', '', NULL, 0, '2019-11-22 00:28:41'),
(50, 8, 1, 'Welcome.', '', NULL, 0, '2019-11-23 12:08:19'),
(51, 8, 1, 'Welcome', '', NULL, 0, '2019-11-23 12:10:14'),
(52, 1, 8, 'Hello Admin', '08:15 pm', 'Nov. 23, 2019', 0, '2019-11-23 12:15:22'),
(53, 1, 8, 'sad', '08:20 pm', 'Nov. 23, 2019', 0, '2019-11-23 12:20:49'),
(54, 1, 8, 'asd', '08:25 pm', 'Nov. 23, 2019', 0, '2019-11-23 12:25:45'),
(55, 8, 1, 'hello', '08:27 pm', 'Nov. 23, 2019', 0, '2019-11-23 12:27:00'),
(56, 1, 8, 'this really works.', '08:27 pm', 'Nov. 23, 2019', 0, '2019-11-23 12:27:18'),
(57, 1, 8, 'dont know why. hahaha', '08:27 pm', 'Nov. 23, 2019', 0, '2019-11-23 12:27:34'),
(58, 1, 8, 'you good in there?', '08:28 pm', 'Nov. 23, 2019', 0, '2019-11-23 12:28:08'),
(59, 8, 1, 'Yeah, I&#39;am', '08:28 pm', 'Nov. 23, 2019', 0, '2019-11-23 12:28:28'),
(60, 3, 1, 'd', '05:10 am', 'Jan. 13, 2020', 0, '2020-01-12 21:10:23'),
(61, 2, 8, 'hhjjvv', '01:18 pm', 'Jan. 24, 2020', 0, '2020-01-24 05:18:46'),
(62, 1, 8, 'hi clint', '03:24 pm', 'Jan. 24, 2020', 0, '2020-01-24 07:24:38'),
(63, 1, 8, 'gg', '03:24 pm', 'Jan. 24, 2020', 0, '2020-01-24 07:24:54'),
(64, 2, 1, 'ihouiyudyr', '03:25 pm', 'Jan. 24, 2020', 0, '2020-01-24 07:25:21'),
(65, 1, 8, 'dfgh', '03:25 pm', 'Jan. 24, 2020', 0, '2020-01-24 07:25:53'),
(66, 1, 8, 'dcbb', '03:26 pm', 'Jan. 24, 2020', 0, '2020-01-24 07:26:07'),
(67, 2, 8, 'hiiiiyoo', '10:11 am', 'Jan. 28, 2020', 0, '2020-01-28 02:11:17'),
(68, 2, 1, 'khdsjdh', '10:11 am', 'Jan. 28, 2020', 0, '2020-01-28 02:11:55'),
(69, 1, 8, 'are you good?', '10:12 am', 'Jan. 28, 2020', 0, '2020-01-28 02:12:39'),
(70, 8, 1, 'oajQKHDSJK', '10:32 am', 'Jan. 28, 2020', 0, '2020-01-28 02:32:21'),
(71, 1, 8, 'hi wazzzup', '10:45 am', 'Jan. 28, 2020', 0, '2020-01-28 02:45:39'),
(72, 1, 8, 'jsjsj', '10:59 am', 'Jan. 28, 2020', 0, '2020-01-28 02:59:25'),
(73, 1, 8, 'how are you?', '11:53 am', 'Jan. 28, 2020', 0, '2020-01-28 03:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `profile_photo`
--

CREATE TABLE `profile_photo` (
  `photo_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image_path` varchar(250) DEFAULT NULL,
  `image_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `service_type` int(5) DEFAULT NULL,
  `price` int(250) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `vendor_id`, `name`, `service_type`, `price`, `timestamp`) VALUES
(1, 1, 'Mike', 1, 234444, '2019-11-21 02:10:17'),
(2, 2, 'John', 1, 7888, '2019-11-21 02:10:17'),
(3, 3, 'asad', 1, 43, '2019-11-21 02:10:17'),
(4, 4, 'J&J Beatuty Shop', 1, 34323, '2019-11-21 02:10:17'),
(5, 5, 'Johnny Beauty Shop', 2, 40000, '2019-11-21 02:10:17'),
(6, 6, 'Linda&#39;s', 3, 35000, '2019-11-21 02:10:17'),
(7, 7, 'Flowering', 4, 34000, '2019-11-21 02:10:17'),
(11, 11, 'Gamon', 1, 69000, '2020-01-24 07:20:12'),
(12, 12, 'Vincent&#39;s Catering Services', 3, 0, '2020-01-28 02:37:11'),
(13, 13, 'Sunrise Flower Shop', 4, 0, '2020-01-28 02:38:29'),
(14, 14, 'Jame&#39;s Photography', 1, 0, '2020-01-28 02:39:17'),
(18, 18, 'Jayden&#39;s  Wedding Attire', 2, 0, '2020-01-28 02:52:32'),
(19, 19, 'Jax wedding attire', 2, 0, '2020-01-28 02:53:19'),
(20, 20, 'hayley&#39;s wedding attire', 2, 0, '2020-01-28 02:54:15'),
(21, 21, 'Jona&#39;s wedding supply', 4, 0, '2020-01-28 02:55:43'),
(22, 22, 'jhgkjh', 3, 756, '2020-01-28 02:57:42'),
(23, 23, 'lkijuug', 3, 989876, '2020-01-28 02:58:08'),
(24, 22, 'Catering on', 3, 0, '2020-01-29 15:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `service_photo`
--

CREATE TABLE `service_photo` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `image_path` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_photo`
--

INSERT INTO `service_photo` (`id`, `vendor_id`, `image_path`) VALUES
(1, 1, '61d3bbcb52f9fc13b8aa208d8c757ac6.jpg'),
(2, 1, '096df0eb195b8f0d9475924f9a1e9425.jpg'),
(3, 1, '912d37287a3f2734ff5f5094fc7bb58f121b3b96_00.jpg'),
(4, 1, '51661729_1411132349023276_8325639407163932672_n.png'),
(5, 1, '51703066_1411132419023269_3504737663368298496_n.png'),
(6, 1, '51765538_1411132242356620_4200077496902746112_n.png'),
(7, 1, '52014033_1411132285689949_8566248903924514816_n.png'),
(8, 1, '52113293_1411131972356647_6526408792903516160_n.png'),
(9, 2, 'toma ikuta.jpg'),
(10, 2, 'Uo0eAES.jpg'),
(11, 2, 'Usui-Takumi-usui-takumi-33026452-500-481.png'),
(12, 2, 'zess luka.jpg'),
(13, 2, 'zess.png'),
(14, 3, '21687752_969189383221276_6016191352084089377_n.jpg'),
(15, 3, '21765189_969191406554407_4926811156542243633_n.jpg'),
(16, 4, 'evely.jpg'),
(17, 4, 'gra.jpg'),
(18, 5, 'Group 1.png'),
(19, 5, 'Group 3.png'),
(20, 6, '0.jpg'),
(21, 6, '4.jpg'),
(22, 6, '5.jpg'),
(23, 6, '6.jpg'),
(24, 6, '7.jpg'),
(25, 6, '10.jpg'),
(26, 7, 'IMG_20190612_163647.jpg'),
(27, 7, 'IMG_20190620_071906.jpg'),
(28, 9, 'IMG_20190620_071924.jpg'),
(29, 10, '16347-landscape-water-trees-swamp.jpg'),
(30, 11, '16347-landscape-water-trees-swamp.jpg'),
(31, 11, '206162-nature-swamp-trees-water.jpg'),
(32, 11, '31000000000264170_1920x1080.jpg'),
(33, 15, '5.jpg'),
(34, 16, '4.jpg'),
(35, 17, 'IMG_20190619_073620.jpg'),
(36, 22, 'IMG_20181110_111708.jpg'),
(37, 23, 'IMG_20190610_201619.jpg'),
(38, 22, 'hardwood-1851071__340.jpg'),
(39, 22, 'background-9120.jpg'),
(40, 22, 'ai-faces-01.jpg'),
(41, 22, 'Moganasundaram_001-750x0-c-default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slider_front`
--

CREATE TABLE `slider_front` (
  `id` int(11) NOT NULL,
  `front_id` int(11) DEFAULT NULL,
  `slider_text` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slide_image`
--

CREATE TABLE `slide_image` (
  `id` int(11) NOT NULL,
  `slider_id` int(11) DEFAULT NULL,
  `path` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `story_front`
--

CREATE TABLE `story_front` (
  `id` int(11) NOT NULL,
  `front_id` int(11) DEFAULT NULL,
  `story_text` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `story_image`
--

CREATE TABLE `story_image` (
  `id` int(11) NOT NULL,
  `hero_id` int(11) DEFAULT NULL,
  `path` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_cus_id` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `firstname` varchar(200) DEFAULT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `user_pass` varchar(250) DEFAULT NULL,
  `user_type` tinyint(1) DEFAULT NULL,
  `is_client` tinyint(1) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `user_availability` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_cus_id`, `username`, `firstname`, `lastname`, `gender`, `user_pass`, `user_type`, `is_client`, `is_admin`, `user_availability`) VALUES
(1, NULL, 'Planner', 'Wedding', 'Planner', NULL, '$2y$10$IcyEXHC/I5gYwLCS2fYEN.59hzVTfLl1Fum3oUW6aYvyeDT8kDoC2', 1, NULL, 1, NULL),
(2, NULL, 'johnny', 'john', 'salbador', 1, '$2y$10$IcyEXHC/I5gYwLCS2fYEN.59hzVTfLl1Fum3oUW6aYvyeDT8kDoC2', 1, 1, 0, 1),
(3, NULL, 'wserdt', 'asrdtgt', 'tdg', NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, 'Mike', 'Rodriguez', NULL, '$2y$10$IcyEXHC/I5gYwLCS2fYEN.59hzVTfLl1Fum3oUW6aYvyeDT8kDoC2', NULL, 1, 0, NULL),
(5, '20191123040626', NULL, 'Clint Anthony', 'Abueva', NULL, '$2y$10$KUOGw88dSHw7.5pPe0UvjusZ1a5icuY0XdlL5dogXGEv.X31XY6oG', NULL, 1, 0, NULL),
(6, '201911230425', NULL, 'Budoy', 'Caledo', NULL, '$2y$10$ebcdcuKvuDqMgE/iKlIFJ.eO984cAqPb.0OwXXiZNr9p6gRIfWlXC', NULL, 1, 0, NULL),
(7, '201911230434', NULL, 'Ronnel', 'rodriguez', NULL, '$2y$10$zdeFDoRmdDrHe7H977KtkuhwxiDwbvNqr0SUZvXlia2K43fVDQX1C', NULL, 1, 0, NULL),
(8, '201911230437', NULL, 'james', 'escond', NULL, '$2y$10$C9aQbYMMCZrRfWLa1.DDFuaEifvuUWl4kevBJQPwij5FZtvou/Nze', NULL, 1, 0, NULL),
(9, '201911230441', NULL, 'emely', 'endino', NULL, '$2y$10$0xpbFb7ndCudxMaFXAsqCOg/NxsC/x..ncEepv0thZkAp18w1uAhi', NULL, 1, 0, NULL),
(10, '201911230443', NULL, 'Elvis', 'Lee', NULL, '$2y$10$waPzvukQieGbVtUwYHKFveWAhVByUlF8NtmafFdmYyCL9uEO1CIqS', NULL, 1, 0, NULL),
(11, '201911230445', NULL, 'jo', 'jo', NULL, '$2y$10$LE/ckmnlfYJmrOW7cIgG7uBzfj5O8Ac1FODKuSz6qO7VcJB.5cY3O', NULL, 1, 0, NULL),
(12, '201911230448', NULL, 'asd', 'asd', NULL, '$2y$10$Ll22CX0RG04X/L0wzNHSEOx6.yQjiq8R/4A1HDMZTTVvVqYEN0TZy', NULL, 1, 0, NULL),
(13, '202001240820', NULL, 'Feel', 'Deposoy', NULL, '$2y$10$KmLqqHQNnOibwCGmRkzpUOQg6kpjbHVmR7U26DlfjtOExaaxMlreK', NULL, 1, 0, NULL),
(14, '202001240955', NULL, 'jer', 'tag', NULL, '$2y$10$UZxCmSLDaWCC9XwrwAklWOKrIqHspcKW2qe6k.KVc3O9VZhvZvvfW', NULL, 1, 0, NULL),
(15, '202001280265', NULL, 'merry', 'feel', NULL, '$2y$10$beFsiw2Edcg9XLz28N/goujWNIquW6kjygbP0zAfD79QepS12d3AC', NULL, 1, 0, NULL),
(16, '202001280448', NULL, 'jax', 'ren', NULL, '$2y$10$RPuJZ2.1yUxe.Pmrb7WV.eoeAlWI7ETHyJj2MtCbX8lS4tBLbPX2q', NULL, 1, 0, NULL),
(17, '202001280464', NULL, 'jay', 'tags', NULL, '$2y$10$nC77Lmdb59tE47dsaxC6r.xXK2xICdrWk5bdYtkEcBLb9rblqFzEu', NULL, 1, 0, NULL),
(18, '202001280519', NULL, 'jer', 'bul', NULL, '$2y$10$sWn8g4zJ1TTvnYrd.gDkFenGIz4XHDcMexvAmkWC0XGPMui//Eh2m', NULL, 1, 0, NULL),
(19, '202001281051', NULL, 'ji', 'ji', NULL, '$2y$10$X/YOeY3rXVwMUrMwM9DTGe3JQUCAegJsGm7FYSWW06RMA0M3kThhW', NULL, 1, 0, NULL),
(20, '202001290357', NULL, 'john', 'john', NULL, '$2y$10$IuKFcofkfnDzEV0pHgmQr.0a8LE1XxrzMnjJaMhZHaqfzHiUvNSCK', NULL, 1, 0, NULL),
(21, '202001290368', NULL, 'jas', 'josh', NULL, '$2y$10$u0eAd4yQRHMoOdL0ajsjVe0kdhBUXjovALFL/MiO04o/Hb4jhHIVi', NULL, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_email`
--

CREATE TABLE `user_email` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email_add` varchar(250) DEFAULT NULL,
  `email_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_email`
--

INSERT INTO `user_email` (`id`, `user_id`, `email_add`, `email_status`) VALUES
(1, 1, 'root@gmail.com', 1),
(2, 2, 'john@gmail.com', 1),
(3, 4, 'mike@gmail.com', 1),
(4, 5, 'clin@gmail.com', 1),
(5, 6, 'buds@gmail.com', 1),
(6, 7, 'ronn@gmail.com', 1),
(7, 8, 'linux@gmail.com', 1),
(8, 9, 'ems@gmail.com', 1),
(9, 10, 'lee@gmail.com', 1),
(10, 11, 'linuxs@gmail.com', 1),
(11, 12, 'linsux@gmail.com', 1),
(12, 13, 'deps@gmail.com', 1),
(13, 14, 'jer@gmail.com', 1),
(14, 15, 'merry@gmail.com', 1),
(15, 16, 'jax@gmail.com', 1),
(16, 17, 'jay@gmail.com', 1),
(17, 18, 'bul@gmail.com', 1),
(18, 19, 'ji@gmail.com', 1),
(19, 20, 'john1@gmail.com', 1),
(20, 21, 'jas@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `img_path` varchar(250) DEFAULT NULL,
  `profile_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `vendor_name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_name`) VALUES
(1, 'Mike cruz\'s Photography'),
(4, 'J&J Beatuty Shop'),
(5, 'Johnny Beauty Shop'),
(6, 'Linda&#39;s'),
(7, 'Flowering'),
(11, 'Gamon Beauty Shop'),
(12, 'Vincent&#39;s Catering Services'),
(13, 'Sunrise Flower Shop'),
(14, 'Jame&#39;s Photography'),
(18, 'Jayden&#39;s  Wedding Attire'),
(19, 'Jax wedding attire'),
(20, 'hayley&#39;s wedding attire'),
(21, 'Jona&#39;s wedding supply'),
(22, 'Catering on');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_booking`
--

CREATE TABLE `vendor_booking` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_booking`
--

INSERT INTO `vendor_booking` (`id`, `vendor_id`, `user_id`, `status`) VALUES
(18, 4, 8, 1),
(22, 0, 8, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`event_id`);

--
-- Indexes for table `bride`
--
ALTER TABLE `bride`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`couple_id`);

--
-- Indexes for table `ch_logo`
--
ALTER TABLE `ch_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_site`
--
ALTER TABLE `ch_site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `FK` (`user_id`);

--
-- Indexes for table `couple_front`
--
ALTER TABLE `couple_front`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`front_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`user_id`);

--
-- Indexes for table `front_end`
--
ALTER TABLE `front_end`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`client_id`);

--
-- Indexes for table `groom`
--
ALTER TABLE `groom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`couple_id`);

--
-- Indexes for table `hero_front`
--
ALTER TABLE `hero_front`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`front_id`);

--
-- Indexes for table `hero_image`
--
ALTER TABLE `hero_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`hero_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_photo`
--
ALTER TABLE `profile_photo`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `FK` (`user_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `FK` (`vendor_id`);

--
-- Indexes for table `service_photo`
--
ALTER TABLE `service_photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`vendor_id`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_front`
--
ALTER TABLE `slider_front`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`front_id`);

--
-- Indexes for table `slide_image`
--
ALTER TABLE `slide_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`slider_id`);

--
-- Indexes for table `story_front`
--
ALTER TABLE `story_front`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`front_id`);

--
-- Indexes for table `story_image`
--
ALTER TABLE `story_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`hero_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_email`
--
ALTER TABLE `user_email`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`user_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `vendor_booking`
--
ALTER TABLE `vendor_booking`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `bride`
--
ALTER TABLE `bride`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ch_logo`
--
ALTER TABLE `ch_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ch_site`
--
ALTER TABLE `ch_site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `couple_front`
--
ALTER TABLE `couple_front`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `front_end`
--
ALTER TABLE `front_end`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groom`
--
ALTER TABLE `groom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hero_front`
--
ALTER TABLE `hero_front`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hero_image`
--
ALTER TABLE `hero_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `profile_photo`
--
ALTER TABLE `profile_photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `service_photo`
--
ALTER TABLE `service_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `service_type`
--
ALTER TABLE `service_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider_front`
--
ALTER TABLE `slider_front`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slide_image`
--
ALTER TABLE `slide_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `story_front`
--
ALTER TABLE `story_front`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `story_image`
--
ALTER TABLE `story_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_email`
--
ALTER TABLE `user_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vendor_booking`
--
ALTER TABLE `vendor_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
