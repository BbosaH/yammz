-- phpMyAdmin SQL Dump
-- version 4.4.0
-- http://www.phpmyadmin.net
--
-- Host: MYSQL5014
-- Generation Time: Nov 15, 2016 at 02:23 AM
-- Server version: 5.6.26-log
-- PHP Version: 5.5.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_9eb574_yammzit`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE IF NOT EXISTS `account_type` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`id`, `name`, `description`, `other`) VALUES
(3, 'Supervisor', 'Department Supervisor', ''),
(2, 'Manager', 'Department manager', ''),
(1, 'Executive', 'Yammzit Executives', ''),
(4, 'Operator', 'Department Operatot', ''),
(6, 'General', 'General Manager', ''),
(7, 'Agent', 'Marketing agent', ''),
(8, 'I.T technical', 'It account', '');

-- --------------------------------------------------------

--
-- Table structure for table `adds`
--

CREATE TABLE IF NOT EXISTS `adds` (
  `id` int(11) NOT NULL,
  `add_type_id` int(11) NOT NULL,
  `add_title` text NOT NULL,
  `caption` text NOT NULL,
  `min_age` int(11) NOT NULL,
  `max_age` int(11) NOT NULL,
  `add_description` text NOT NULL,
  `ad_url` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL DEFAULT 'All',
  `currency` varchar(10) NOT NULL,
  `timezone` varchar(50) NOT NULL,
  `account_country` int(11) NOT NULL COMMENT 'country_id for the country of that account',
  `marketing_agent_code` varchar(20) NOT NULL,
  `folder_id` int(20) NOT NULL,
  `call_to_action_id` int(11) NOT NULL,
  `no_of_weeks` int(11) NOT NULL,
  `cost_per_week` varchar(20) NOT NULL COMMENT 'counted in Us dollars',
  `exchange_rate` varchar(20) NOT NULL COMMENT 'The exchange rate used to compute the budget ',
  `total_budget_cost` varchar(20) NOT NULL COMMENT 'Total advert cost for the specified weeks in the selected currency,counted in Us dollar',
  `status` varchar(15) NOT NULL,
  `business_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `assigned` varchar(10) NOT NULL DEFAULT 'no',
  `start_date` int(11) NOT NULL,
  `end_dte` int(11) NOT NULL,
  `reg_date` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adds`
--

INSERT INTO `adds` (`id`, `add_type_id`, `add_title`, `caption`, `min_age`, `max_age`, `add_description`, `ad_url`, `gender`, `currency`, `timezone`, `account_country`, `marketing_agent_code`, `folder_id`, `call_to_action_id`, `no_of_weeks`, `cost_per_week`, `exchange_rate`, `total_budget_cost`, `status`, `business_id`, `branch_id`, `assigned`, `start_date`, `end_dte`, `reg_date`) VALUES
(134, 1, '20% off every product', '', 18, 100, 'What a time to be alive with Yammzit. shop now with Trinity twin traders and get 20% off every ad you buy NOW', 'uploads/4085113552287381479198799.jpg', 'All', 'USD', '', 3, '', 9, 1, 1, '19.99', '1', '19.99', 'Pending', 43, 1, 'no', 0, 0, 1479198808);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `avatar` varchar(60) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `account_type_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `company_id` varchar(20) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'enabled',
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `permanent_adress` text NOT NULL,
  `city_id` int(11) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `private_email` text NOT NULL,
  `work_email` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `avatar`, `username`, `password`, `account_type_id`, `department_id`, `company_id`, `branch_id`, `status`, `first_name`, `last_name`, `permanent_adress`, `city_id`, `phone_number`, `private_email`, `work_email`, `gender`, `dob`) VALUES
(1, '', 'admin', 'open', 3, 1, 'UG2/3/AD3', 1, 'enabled', 'Nomis', 'Wilson', '', 18, '', '', 'nomiswilsk3@gmail.com', '', '0000-00-00'),
(2, '', 'gasta', 'yammzit', 6, 3, 'UG1/4/AD3', 1, 'enabled', 'Kevin', 'Gasta', '', 19, '', '', 'kevingasta@gmail.com', '', '0000-00-00'),
(3, 'uploads/IMG_4965.jpg', 'Steven', 'yammzit', 6, 3, 'UG1/2/AD2', 1, 'enabled', 'Steven', 'Byamugisha', 'Nsambya Estate', 20, '078785785', 'byamugisha@hotmail.com', 'sbyamugisha@yammzit.com', 'male', '1990-05-08'),
(4, NULL, 'micheal', 'qwerty', 3, 1, 'UG1/3/AD3', 1, 'enabled', 'Nyola', 'Micheal', 'Nakulabye', 2, '0788899615', '', 'nyola@yammzit.com', 'male', '1990-05-09'),
(5, NULL, 'yammzit', 'yammzit', 6, 3, 'UG3/6/GE4', 1, 'enabled', 'Yammzit', 'Manager', '', 0, '', '', 'ketty@yammzit.com', '', '0000-00-00'),
(6, NULL, 'technical', 'technical', 8, 5, 'UG/6/8IT', 1, 'enabled', 'IT', 'Technical', 'Nsambya', 18, '0750723856', 'nomiswilsk3@gmail.com', 'nomis@yammzit', 'male', '0000-00-00'),
(7, 'uploads/7741186096075671479194083.jpg', 'BlackNinja1', 'qwerty', 2, 1, 'UG/7/2AD', 1, 'enabled', 'adDude', 'TopManager', 'mukono 25th street ', 18, '12345678910', 'blackninja1@yammzit.com', 'blackninja1@yammzit.com', 'male', '0000-00-00'),
(8, 'uploads/7741186096075671479194672.', 'Ninja202', 'qwerty', 3, 1, 'UG/8/3AD', 1, 'enabled', 'AdMan1', 'Supervis', 'Nakasero 76th street ', 18, '55638778278782', 'adman1@yammzit.com', 'adman1@yammzit.com', 'male', '0000-00-00'),
(9, 'uploads/7741186096075671479195122.jpg', 'Ninja3', 'qwerty', 4, 1, 'UG/9/4AD', 1, 'enabled', 'Adperson1', 'UnderSupervisor', 'Entebbe road ', 18, '673487928499305', 'Ninja3@yammzit.com', 'Ninja3@yammzit.com', 'male', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_goal`
--

CREATE TABLE IF NOT EXISTS `admin_goal` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `goal` int(11) NOT NULL,
  `ads_worked_on_number` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_notification`
--

CREATE TABLE IF NOT EXISTS `admin_notification` (
  `id` int(11) NOT NULL,
  `admin_work_log_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_work_log`
--

CREATE TABLE IF NOT EXISTS `admin_work_log` (
  `id` int(11) NOT NULL,
  `work_log_owner_id` int(11) NOT NULL,
  `log_name` text NOT NULL,
  `log_performer_id` int(11) NOT NULL,
  `business_Affected` int(11) NOT NULL,
  `time_updated` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_work_log`
--

INSERT INTO `admin_work_log` (`id`, `work_log_owner_id`, `log_name`, `log_performer_id`, `business_Affected`, `time_updated`) VALUES
(1, 5, 'Yammzit Manager logged in', 5, 0, 1471190760),
(2, 5, 'Yammzit Manager logged in', 5, 0, 1471191943),
(3, 2, 'Kevin Gasta logged in', 2, 0, 1471193638),
(4, 3, 'Steven Byamugisha logged in', 3, 0, 1471193661),
(5, 3, 'Steven Byamugisha logged in', 3, 0, 1471198638),
(6, 3, 'Steven Byamugisha logged in', 3, 0, 1471244929),
(7, 3, 'Steven Byamugisha logged in', 3, 0, 1471255086),
(8, 2, 'Kevin Gasta logged in', 2, 0, 1471260058),
(9, 5, 'Yammzit Manager logged in', 5, 0, 1471262007),
(10, 2, 'Kevin Gasta logged in', 2, 0, 1471262487),
(11, 5, 'Yammzit Manager logged in', 5, 0, 1471263787),
(12, 2, 'Kevin Gasta logged in', 2, 0, 1471270502),
(13, 3, 'Steven Byamugisha logged in', 3, 0, 1471280538),
(14, 3, 'Steven Byamugisha logged in', 3, 0, 1471332149),
(15, 5, 'Yammzit Manager logged in', 5, 0, 1471350590),
(16, 5, 'Yammzit Manager logged in', 5, 0, 1471350668),
(17, 2, 'Kevin Gasta logged in', 2, 0, 1471355355),
(18, 2, 'Kevin Gasta logged in', 2, 0, 1471360994),
(19, 3, 'Steven Byamugisha logged in', 3, 0, 1471421560),
(20, 3, 'Steven Byamugisha logged in', 3, 0, 1471530151),
(21, 3, 'Steven Byamugisha logged in', 3, 0, 1471588480),
(22, 3, 'Steven Byamugisha logged in', 3, 0, 1471610010),
(23, 2, 'Kevin Gasta logged in', 2, 0, 1471610905),
(24, 5, 'Yammzit Manager logged in', 5, 0, 1471674387),
(25, 3, 'Steven Byamugisha logged in', 3, 0, 1471801589),
(26, 3, 'Steven Byamugisha logged in', 3, 0, 1472119142),
(27, 2, 'Kevin Gasta logged in', 2, 0, 1472119639),
(28, 3, 'Steven Byamugisha logged in', 3, 0, 1472212218),
(29, 3, 'Steven Byamugisha logged in', 3, 0, 1472285000),
(30, 5, 'Yammzit Manager logged in', 5, 0, 1472306961),
(31, 3, 'Steven Byamugisha logged in', 3, 0, 1472486214),
(32, 2, 'Kevin Gasta logged in', 2, 0, 1472561248),
(33, 3, 'Steven Byamugisha logged in', 3, 0, 1472821142),
(34, 3, 'Steven Byamugisha logged in', 3, 0, 1472834067),
(35, 3, 'Steven Byamugisha logged in', 3, 0, 1472890169),
(36, 3, 'Steven Byamugisha logged in', 3, 0, 1473453126),
(37, 3, 'Steven Byamugisha logged in', 3, 0, 1473924081),
(38, 3, 'Steven Byamugisha logged in', 3, 0, 1474035542),
(39, 3, 'Steven Byamugisha logged in', 3, 0, 1474551403),
(40, 3, 'Steven Byamugisha logged in', 3, 0, 1474625268),
(41, 3, 'Steven Byamugisha logged in', 3, 0, 1474633769),
(42, 3, 'Steven Byamugisha logged in', 3, 0, 1475050638),
(43, 3, 'Steven Byamugisha logged in', 3, 0, 1476175686),
(44, 3, 'Steven Byamugisha logged in', 3, 0, 1476186278),
(45, 1, 'Nomis Wilson logged in', 1, 0, 1477080880),
(46, 0, 'Nomis Wilson logged in', 1, 0, 1477080880),
(47, 3, 'Steven Byamugisha logged in', 3, 0, 1477139644),
(48, 1, 'Nomis Wilson logged in', 1, 0, 1477376245),
(49, 0, 'Nomis Wilson logged in', 1, 0, 1477376245),
(50, 3, 'Steven Byamugisha logged in', 3, 0, 1477924228),
(51, 3, 'Steven Byamugisha logged in', 3, 0, 1478333883),
(52, 3, 'Steven Byamugisha logged in', 3, 0, 1478344989),
(53, 1, 'Nomis Wilson logged in', 1, 0, 1478509583),
(54, 0, 'Nomis Wilson logged in', 1, 0, 1478509583),
(55, 3, 'Steven Byamugisha logged in', 3, 0, 1478594856),
(56, 3, 'Steven Byamugisha logged in', 3, 0, 1478595837),
(57, 3, 'Steven Byamugisha logged in', 3, 0, 1478677076),
(58, 3, 'Steven Byamugisha logged in', 3, 0, 1478679777),
(59, 3, 'Steven Byamugisha logged in', 3, 0, 1478761983),
(60, 3, 'Steven Byamugisha logged in', 3, 0, 1478783448),
(61, 1, 'Nomis Wilson logged in', 1, 0, 1479129180),
(62, 0, 'Nomis Wilson logged in', 1, 0, 1479129180),
(63, 6, 'IT Technical logged in', 6, 0, 1479130432),
(64, 6, 'IT Technical logged in', 6, 0, 1479130896),
(65, 6, 'IT Technical logged in', 6, 0, 1479193508),
(66, 6, 'IT Technical logged in', 6, 0, 1479193650),
(67, 8, 'AdMan1 Supervis logged in', 8, 0, 1479195518),
(68, 0, 'AdMan1 Supervis logged in', 8, 0, 1479195518),
(69, 3, 'Steven Byamugisha logged in', 3, 0, 1479198599),
(70, 1, 'Nomis Wilson logged in', 1, 0, 1479198641),
(71, 0, 'Nomis Wilson logged in', 1, 0, 1479198641),
(72, 9, 'Adperson1 UnderSupervisor logged in', 9, 0, 1479198947),
(73, 8, 'Adperson1 UnderSupervisor logged in', 9, 0, 1479198947),
(74, 7, 'adDude TopManager logged in', 7, 0, 1479199154),
(75, 3, 'Steven Byamugisha logged in', 3, 0, 1479202201),
(76, 6, 'IT Technical logged in', 6, 0, 1479204072),
(77, 7, 'adDude TopManager logged in', 7, 0, 1479204135),
(78, 8, 'AdMan1 Supervis logged in', 8, 0, 1479204327),
(79, 0, 'AdMan1 Supervis logged in', 8, 0, 1479204327),
(80, 8, 'AdMan1 Supervis logged in', 8, 0, 1479204609),
(81, 0, 'AdMan1 Supervis logged in', 8, 0, 1479204609),
(82, 7, 'adDude TopManager logged in', 7, 0, 1479204763),
(83, 7, 'adDude TopManager logged in', 7, 0, 1479204900);

-- --------------------------------------------------------

--
-- Table structure for table `advert_category`
--

CREATE TABLE IF NOT EXISTS `advert_category` (
  `id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `advert_city`
--

CREATE TABLE IF NOT EXISTS `advert_city` (
  `id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `advert_country`
--

CREATE TABLE IF NOT EXISTS `advert_country` (
  `id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advert_country`
--

INSERT INTO `advert_country` (`id`, `ad_id`, `country_id`) VALUES
(1, 134, 3);

-- --------------------------------------------------------

--
-- Table structure for table `advert_sub_category`
--

CREATE TABLE IF NOT EXISTS `advert_sub_category` (
  `id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL COMMENT 'Id for the placed advert',
  `sub_category_id` int(11) NOT NULL COMMENT 'Id for the selected sub category'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Advert and sub category relationship table';

--
-- Dumping data for table `advert_sub_category`
--

INSERT INTO `advert_sub_category` (`id`, `ad_id`, `sub_category_id`) VALUES
(1, 134, 279);

-- --------------------------------------------------------

--
-- Table structure for table `ad_type`
--

CREATE TABLE IF NOT EXISTS `ad_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cost_per_week` varchar(15) NOT NULL COMMENT 'Cost in US Dollar',
  `url` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_type`
--

INSERT INTO `ad_type` (`id`, `name`, `cost_per_week`, `url`) VALUES
(1, 'Right Hand Side Ad Desktop', '19.99', 'uploads/righ_ hand side_1.png'),
(2, 'Search engine Ad (Highly Recommended)', '17.99', 'uploads/search_ad_1.png'),
(3, 'News feed Ads (Recommended)', '14.99', 'uploads/Newsfeed_ad1.png'),
(4, 'Mobile Side Ad', '11.99', 'uploads/Mobile_slide_ad.png'),
(5, 'A Desktop Advertising before Login', '9.99', 'uploads/desktop_ad_1.png');

-- --------------------------------------------------------

--
-- Table structure for table `agent_commission`
--

CREATE TABLE IF NOT EXISTS `agent_commission` (
  `id` int(11) NOT NULL,
  `agent_code` varchar(15) NOT NULL COMMENT 'Identification code for the marketing agen',
  `commision` double NOT NULL COMMENT 'Commission in %'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `age_group`
--

CREATE TABLE IF NOT EXISTS `age_group` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `app_setting`
--

CREATE TABLE IF NOT EXISTS `app_setting` (
  `id` int(11) NOT NULL,
  `newsfeed_chunk` int(11) NOT NULL DEFAULT '5' COMMENT 'the maximum number of news feeds  returned  per request',
  `newsfeed_comments_chunk` int(30) NOT NULL DEFAULT '5' COMMENT 'the maximum number of comments of a news feed returnable per request ',
  `notifications_chunk` int(30) NOT NULL DEFAULT '5' COMMENT 'the maximum number of notifications returnable per request ',
  `sponsored_search_results_chunk` int(30) NOT NULL DEFAULT '6' COMMENT 'the maximun number of adds for a search result'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_setting`
--

INSERT INTO `app_setting` (`id`, `newsfeed_chunk`, `newsfeed_comments_chunk`, `notifications_chunk`, `sponsored_search_results_chunk`) VALUES
(1, 5, 5, 10, 6);

-- --------------------------------------------------------

--
-- Table structure for table `attendency_group`
--

CREATE TABLE IF NOT EXISTS `attendency_group` (
  `id` int(30) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city_id` int(11) NOT NULL,
  `initial` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `city_id`, `initial`, `date`) VALUES
(1, 'Yammzit Main', 18, 'Ug01', '0000-00-00'),
(2, 'Mbarara ', 19, 'Ug02', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE IF NOT EXISTS `business` (
  `id` int(11) NOT NULL,
  `user_id` int(30) NOT NULL COMMENT 'the person who added this business',
  `owner_id` int(30) DEFAULT NULL COMMENT 'the person who rightfully claims for this business',
  `date_created` int(50) NOT NULL,
  `date_claimed` int(50) DEFAULT '0',
  `country_id` int(30) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city_id` int(30) NOT NULL,
  `phone_1` varchar(30) DEFAULT NULL,
  `phone_2` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `website` varchar(30) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `logo` text,
  `banner` text,
  `good` int(11) NOT NULL DEFAULT '0',
  `cost` int(11) NOT NULL DEFAULT '0',
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=245 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `user_id`, `owner_id`, `date_created`, `date_claimed`, `country_id`, `name`, `address`, `city_id`, `phone_1`, `phone_2`, `email`, `website`, `location`, `logo`, `banner`, `good`, `cost`, `description`) VALUES
(1, 1, NULL, 1471183501, 0, 50, '#@#', '#@#', 50, '#@#', NULL, NULL, '#@#', NULL, NULL, 'uploads/defbanner.png', 0, 0, NULL),
(6, 2, NULL, 1471198137, 0, 3, 'Trinity Twin Traders', 'G/D 09 Mukwano Shopping Center', 18, '', '+256772428988', '', '  ', NULL, '', 'uploads/banner7311117084843161478762761.jpg', 0, 0, 'All parents only want the very best for their children. Trinity Twin Traders is the one-stop concept store for kids of all ages: from newborns and toddlers to tweens and teens up to the age of 16. Babyshop also offers a range of products for mothers and moms-to-be. Products from different parts of the world like China, Thailand and India  '),
(7, 2, NULL, 1471199068, 0, 3, 'Aristoc Booklex Garden City ', '23 Garden City Complex Yusuf Lule Road', 18, '041344381', '0312264409', '', 'www.aristocbooklex.com', NULL, 'uploads/7739167694184531471199068.png', 'uploads/banner7739167694184531471199068.png', 0, 0, 'Founded in 1991, Aristoc Booklex Ltd is the leading bookstore in Uganda today.'),
(8, 2, NULL, 1471200031, 0, 3, ' Bookpoint  Village Mall', '1st Floor Village mall, Bugolobi', 18, '0790915737', '', 'info@bookpoint.co.ug', 'www.bookpoint.co.ug', NULL, 'uploads/7739167694184531471200031.png', 'uploads/banner7739167694184531471200031.jpg', 0, 0, 'We offer titles across a broad spectrum of subject areas, with thriving and growing lists in business and management, religion, education, sociology and public policy and lots more. We are located at The Village Mall in Bugolobi, Second floor opposite the food court.'),
(9, 2, NULL, 1471200240, 0, 3, 'Fareeds Bookstore', 'Shop C44 Ntinda Shopping Centre, Ntinda', 18, '', '', '', '', NULL, 'uploads/7739167694184531471200240.', 'uploads/banner7739167694184531471200240.', 0, 0, 'Book store in Uganda '),
(10, 2, NULL, 1471200497, 0, 3, 'Milestones', '1,Cooper Road, Kisementi ', 18, '', '0414 235846', '', '', NULL, 'uploads/7739167694184531471200497.', 'uploads/banner7739167694184531471200497.', 0, 0, 'CAFE, BAKERY, BOOKS'),
(11, 2, NULL, 1471200677, 0, 3, 'New Day Bookshops', 'Acacia Mall Kisementi', 18, '+256 777 874 204', '+265 772 621362', 'sales@newdayuganda.com', '', NULL, 'uploads/7739167694184531471200677.', 'uploads/banner7739167694184531471200677.', 0, 0, 'Book Store'),
(12, 2, NULL, 1471200906, 0, 3, 'The Bookend ', 'plot 32 Bandali Rise Bugolobi, (inside Asiana Restaurant)', 18, '0774169978', '', '', '', NULL, 'uploads/7739167694184531471200906.', 'uploads/banner7739167694184531471200906.', 0, 0, 'All books at 8,000ugsh Proceeds go to help fund Grassroots Uganda'),
(13, 2, NULL, 1471201440, 0, 3, 'Makindye Country Club', 'Plot 59, Mobutu Road, Makindye Hill', 18, '0414510290.', '', 'info@makindyecountryclub.com', 'makindyecountryclub.com', NULL, 'uploads/7739167694184531471201440.jpg', 'uploads/banner7739167694184531471201440.jpg', 0, 0, 'Makindye Country Club MCC is a family-orientated members club that offers Accommodation, Sports and Leisure. Previously: American Recreation Association. ( Every 3rd Saturday of the month we have a Flea Market. ) '),
(14, 2, NULL, 1471205979, 0, 3, 'Embassy super market', '1470 Nsambya Ggaba Road', 18, '', '0414268837', '', '', NULL, 'uploads/7739167694184531471205979.', 'uploads/banner7739167694184531471205979.png', 0, 0, 'Supermarket'),
(15, 2, NULL, 1471207585, 0, 3, 'Game Lugogo Mall', 'Lugogo Shopping Mall Jinja road ', 18, '', '0312350400 ', '', 'www.game.co.za', NULL, 'uploads/7739167694184531471207584.jpg', 'uploads/banner7739167694184531471207584.jpg', 0, 0, ''),
(16, 2, NULL, 1471208008, 0, 3, 'Millenium Supermarket', '23 cooper road, Kisementi, P.O.Box 24608,', 18, '', '04144233495', '', '', NULL, 'uploads/7739167694184531471208008.', 'uploads/banner7739167694184531471208008.jpg', 0, 0, 'Supermarket'),
(17, 2, NULL, 1471208232, 0, 3, 'Nakumat Oasis Mall ', 'Yusuf Lule Road, Kampala, Uganda', 18, '', '0414668818', '', '', NULL, 'uploads/7739167694184531471208232.jpg', 'uploads/banner7739167694184531471208232.jpg', 0, 0, ''),
(18, 2, NULL, 1471208738, 0, 3, 'Shoprite - Clock Tower', 'Ben Kiwanuka Street, Kampala, Uganda', 18, '', '03122228100', '', '', NULL, 'uploads/7739167694184531471208738.png', 'uploads/banner7739167694184531471208738.jpg', 0, 0, ''),
(19, 2, NULL, 1471245451, 0, 3, 'Banana boat - Garden City', 'Garden City, Yusuf Lule Road', 18, '', '0414222363', 'crafts@bananaboat.co.ug', 'www.bananaboat.co.ug', NULL, 'uploads/2246113733863431471245451.jpg', 'uploads/banner2246113733863431471245451.jpg', 0, 0, 'Banana Boat has three exciting shops in Kampala, Uganda, selling beautiful African crafts and tribal art sourced from all over the African continent.'),
(20, 2, NULL, 1471245611, 0, 3, 'Banana Boat - Lugogo  Shopping Mall', 'Lugogo Shopping Mall, Jinja Road.', 18, '', '0414222363', 'crafts@bananaboat.co.ug', 'www.bananaboat.co.ug', NULL, 'uploads/2246113733863431471245611.jpg', 'uploads/banner2246113733863431471245611.jpg', 0, 0, 'Banana Boat has three exciting shops in Kampala, Uganda, selling beautiful African crafts and tribal art sourced from all over the African continent.'),
(21, 2, NULL, 1471245741, 0, 3, 'Banana boat - Kisementi ', 'Kisementi (next to Endiro and Acacia Mall)', 18, '', '0414222363', 'crafts@bananaboat.co.ug', 'www.bananaboat.co.ug', NULL, 'uploads/2246113733863431471245740.jpg', 'uploads/banner2246113733863431471245740.jpg', 0, 0, 'Banana Boat has three exciting shops in Kampala, Uganda, selling beautiful African crafts and tribal art sourced from all over the African continent.'),
(22, 2, NULL, 1471246162, 0, 3, 'MishMash', '28 Acacia Avenue, Kampala, Uganda', 18, '0794 010101', '', 'info@mishmashuganda.com', ' http://www.mishmashuganda.com', NULL, 'uploads/2246113733863431471246162.jpg', 'uploads/banner2246113733863431471246162.jpg', 0, 0, 'Art . Culture . Life . Gallery . Cafe . Lounge . Bar .'),
(23, 2, NULL, 1471247170, 0, 3, 'OP Clothing Ug', 'Acacia Mall Kisementi', 18, '0702747355', '+256701769606', 'patriciaotoa@gmail.com', 'http://www.opuganda.com', NULL, 'uploads/2246113733863431471247170.jpg', 'uploads/banner2246113733863431471247170.jpg', 0, 0, 'For originally made Kitenge - African clothing, you just found the right crew. Visit any of our stores today & lets rock African print '),
(24, 2, NULL, 1471247480, 0, 3, 'Toloso Workshop', 'Plot 15 Luthuli Avenue, Bugolobi', 18, '+256 779 920 285  ', '', 'info@talosoworkshop.com ', 'www.talosoworkshop.com', NULL, 'uploads/2246113733863431471247480.png', 'uploads/banner2246113733863431471247480.png', 0, 0, 'Craft'),
(25, 2, NULL, 1471248401, 0, 3, 'La Ville Wines and Spirits', 'Makindye, Kampala', 18, ' 0712925172 ', '', 'lavillewinesandspirits@gmail.c', '', NULL, 'uploads/2246113733863431471248401.jpg', 'uploads/banner2246113733863431471248401.jpg', 0, 0, 'Village Shopping Mall, Bugolobi'),
(26, 2, NULL, 1471248611, 0, 3, 'Uganda Wine', '49 Luthuli Avenue, Bugolobi', 18, '0759499463', '', 'wines@eqcatering.co.ug', '', NULL, 'uploads/2246113733863431471248611.', 'uploads/banner2246113733863431471248611.', 0, 0, ''),
(27, 2, NULL, 1471248865, 0, 3, 'The Wine Garage', 'Plot 2133 Tank Hill Road, Muyenga next to Oxfam, 25 Kampala, Uganda', 18, '', '041 4578353', 'info@winegarage.co.ug', 'http://www.winegarage.co.ug', NULL, 'uploads/2246113733863431471248865.png', 'uploads/banner2246113733863431471248865.jpg', 0, 0, 'We import and sell a large selection of Quality Wines and Spirits. Our customers can either buy and take home our quality products or choose to enjoy our relaxing and genuinely hospitable environment.'),
(28, 2, NULL, 1471248993, 0, 3, 'The Wines Shop', '1A - 1C Acacia Avenue ', 18, '', '0414 257145', 'sales@udfs.co.ug', '', NULL, 'uploads/2246113733863431471248993.', 'uploads/banner2246113733863431471248993.', 0, 0, ''),
(29, 2, NULL, 1471249699, 0, 3, 'Bubbles O”Leary', '19 Acacia Ave, Kololo', 18, '', '0312263815', 'bubblesoleary@gmail.com', 'http://bubblesolearys.com', NULL, 'uploads/2246113733863431471249699.png', 'uploads/banner2246113733863431471249699.jpg', 0, 0, 'Lunch, Dinner and Drinks'),
(30, 2, NULL, 1471250064, 0, 3, 'Cafe Ballet', '34c Kyadondo Rd, Nakasero P.O.box.7612 Kampala, Uganda\r\n', 18, '', '0414234190', 'cafeballet@one2netmail.co.ug', 'www.cafeballet.co.ug', NULL, 'uploads/2246113733863431471250064.jpg', 'uploads/banner2246113733863431471250064.jpg', 0, 0, 'Takes bookings, Walk-ins welcome, Good for groups or parties, Good for children, Takeaway, Delivery, Catering, Table service and Outdoor seating'),
(31, 2, NULL, 1471250685, 0, 3, 'Cafe Javas Kampala Boulevard', 'Kampala Boulevard, Kampala Road', 18, '', '+256 39 2177284', '', '', NULL, 'uploads/2246113733863431471250685.jpg', 'uploads/banner2246113733863431471250684.jpg', 0, 0, 'Breakfast, Lunch, Dinner, Coffee and Drinks'),
(32, 2, NULL, 1471251285, 0, 3, 'Cafe Javas - Oasis Mall', 'Nakumatt Oasis Mall, Kampala, Uganda', 18, '', '+256 393 106502', '', 'http://cafejavas.co.ug', NULL, 'uploads/2246113733863431471251285.jpg', 'uploads/banner2246113733863431471251285.jpg', 0, 0, 'Breakfast, Lunch, Dinner, Coffee and Drinks'),
(33, 2, NULL, 1471251704, 0, 3, 'Casablanca Pub & Restaurant', 'Plot 26 Acacia Avenue, Kololo', 18, '0782 748840', '', 'thespace2008@yahoo.com', '', NULL, 'uploads/2246113733863431471251704.jpg', 'uploads/banner2246113733863431471251704.jpg', 0, 0, 'Restaurant'),
(34, 2, NULL, 1471251926, 0, 3, 'Cee Cee’s Restaurant & Coffee Bar', 'Royal Palms Arcade, Butabika', 18, '0751300565', '', 'cee.cees.ug@gmail.com', '', NULL, 'uploads/8612129099056401471530964.jpg', 'uploads/banner8612129099056401471530964.jpg', 0, 0, ''),
(35, 2, NULL, 1471252117, 0, 3, 'Cafe LATTE', 'Coral Crescent Plot 1-3 below Lower Kololo Terrace Road, ', 18, '', ' 0794 505750', '', '', NULL, 'uploads/2246113733863431471252117.', 'uploads/banner2246113733863431471252117.jpg', 0, 0, 'If you are looking for a nice and quiet place to have breakfast, light lunch, home bakes, at Cafe LATTE we offer all in our lovely gardens.'),
(36, 2, NULL, 1471252463, 0, 3, 'Caffesserie', 'Acacia Mall', 18, '0787968080', '', 'shpak@cafesserie.com', 'www.cafesserie.com', NULL, 'uploads/2246113733863431471252463.png', 'uploads/banner2246113733863431471252463.jpg', 0, 0, 'Our Concept, Italian coffee , French Bakery and continental cuisine'),
(37, 2, NULL, 1471252632, 0, 3, 'Caffe Roma', 'Quality Shopping Mall, Lubowa', 18, '0791698330', '', 'cafferomauganda@hotmail.com', '', NULL, 'uploads/2246113733863431471252632.jpg', 'uploads/banner2246113733863431471252632.jpg', 0, 0, 'Charming Italian-owned cafe that serves really delicious, authentic Italian food and gelato. Has a cute play area for kids and a very nice gift shop'),
(38, 2, NULL, 1471252985, 0, 3, 'Cafe Mebanas', 'Plot 10, TWED Towers, Kafu Road, P.O. Box No.: 1786 Kampala, Uganda', 18, '0756 322627', '', '', 'www.cafemebanas.co.ug', NULL, 'uploads/2246113733863431471252985.jpg', 'uploads/banner2246113733863431471252985.jpg', 0, 0, ''),
(39, 2, NULL, 1471253356, 0, 3, 'Cafe Pap', '3b Parliament Avenue', 18, '+256 393 233 727', '+256 414 254 570', 'jolly@cafepap.com', 'www.cafepap.com', NULL, 'uploads/2246113733863431471253356.jpg', 'uploads/banner2246113733863431471253356.jpg', 0, 0, 'Experience The Capital of Happiness! \r\nFeel the Passion and Love away from your home and work. Great Coffee and Scrumptious Meals'),
(40, 2, NULL, 1471253652, 0, 3, 'Cayenne Restaurant ', 'Bukoto-Ntinda route after Kabira', 18, '0792200555', '+256 700. 200.555', 'cayennekampala@gmail.com', 'www.cayennekampala.com', NULL, 'uploads/2246113733863431471253652.jpg', 'uploads/banner2246113733863431471253652.jpg', 0, 0, 'A premier restaurant offering the finest dining experience, and bar offering one of Kampalas most celebrated night experiences.\r\nCayenne...it rocks'),
(41, 2, NULL, 1471253986, 0, 3, 'Chopsticks', 'Equatori Hotel, William St.', 18, '0414250781', '', '', '', NULL, 'uploads/2246113733863431471253986.', 'uploads/banner2246113733863431471253986.', 0, 0, ''),
(42, 2, NULL, 1471254629, 0, 3, 'Crocodile Bar + Restaurant ', 'Cooper Rd, Kisementi', 18, '', '041425486630', '', 'www.thecrocdilekampala.com', NULL, 'uploads/8612129099056401471531528.jpg', 'uploads/banner8612129099056401471531528.jpg', 0, 0, ''),
(43, 2, NULL, 1471255316, 0, 3, 'Yammzit', '1st Floor 115, Tirupati Mazima Mall, Ggaba Road', 18, '+25670557 7708', '+256775995738', '', 'www.yammzit.com', NULL, 'uploads/2246113733863431471255316.jpg', 'uploads/banner2246113733863431471255316.jpg', 0, 0, 'Business Ratings and Reviews'),
(44, 2, NULL, 1471256001, 0, 3, 'Dancing Cup', 'Plot 15, Luthuli Avenue, Bugolobi, Kampala, Uganda', 18, '0772 477005', '', 'dancingcup@yahoo.com', '', NULL, 'uploads/2246113733863431471256001.png', 'uploads/banner2246113733863431471256001.jpg', 0, 0, 'Restaurant, coffee shop and bar with childrens play areas, free WiFi and creative, delicious menus.'),
(45, 2, NULL, 1471256148, 0, 3, 'Deuces Bar & Lounge', 'Ggaba Rd, Kansanga', 18, '0772581518', '', '', '', NULL, 'uploads/2246113733863431471256148.jpg', 'uploads/banner2246113733863431471256148.jpg', 0, 0, 'Deuces Bar & Lounge is a brand new Bar And Lounge with Good Music... #BestFoodExperience #BestDamnDrinksPeriod #HomeOfTheJollyJuice'),
(46, 2, NULL, 1471256456, 0, 3, 'Drew & Jacs', 'Forest Mall Lugogo', 18, '0712 867 629', '039 2175043', 'drewandjacs@gmail.com', '', NULL, 'uploads/2246113733863431471256456.jpg', 'uploads/banner2246113733863431471256456.jpg', 0, 0, 'This is Drew & Jacs official Facebook Page. Drew & Jacs is the Kampalas leading Patisserie & Cafe.'),
(47, 2, NULL, 1471257113, 0, 3, 'Endiro Coffee', 'Plot 23B Cooper Road, Kisementi', 18, '', '031 2515322', '', '', NULL, 'uploads/2246113733863431471257113.png', 'uploads/banner2246113733863431471257113.jpg', 0, 0, 'Brewing a Better World - Together" '),
(48, 2, NULL, 1471258211, 0, 3, 'Fez Brasserie ', 'Emin Pasha, 27 Akii Bua Road, Nakasero, Kampala, Uganda', 18, '', '0414236977', 'info@eminpasha.com', '', NULL, 'uploads/2246113733863431471258211.', 'uploads/banner2246113733863431471258211.jpg', 0, 0, ''),
(49, 2, NULL, 1471258717, 0, 3, 'Fang Fang Chinese Restaurant', '1 Colville St, Roof Terrace', 18, '', '0414344806', 'fangfanghotel@yahoo.com', '', NULL, 'uploads/2246113733863431471258717.jpg', 'uploads/banner2246113733863431471258717.', 0, 0, ''),
(50, 2, NULL, 1471261327, 0, 3, 'Faze 2', '10 Nakasero Rd', 18, '0772345808', '0392700815', '', '', NULL, '', '', 0, 0, ''),
(51, 2, NULL, 1471261528, 0, 3, 'Great Burgers and GB Cafe', 'Kings Gate Bldg, Ggaba Rd', 18, '0755649050', '', 'info@greatburgersug.com', 'www.greatburgers.com', NULL, 'uploads/2246113733863431471261528.jpg', 'uploads/banner2246113733863431471261528.jpg', 0, 0, 'GREAT BURGERS WE DO BURGERS RIGHT WITH AMERICA''S TASTE'),
(52, 2, NULL, 1471261626, 0, 3, 'Great Wall', '29 Kampala Rd', 18, '', '0414230064', '', '', NULL, '', '', 0, 0, ''),
(53, 2, NULL, 1471261719, 0, 3, 'Golden Fish ', 'Spring Road, Bugolobi', 18, '', '0414222040', '', '', NULL, '', '', 0, 0, ''),
(54, 2, NULL, 1471262073, 0, 3, 'Golden Fish ', 'Spring Road, Bugolobi', 18, '', '0414222040', '', '', NULL, '', '', 0, 0, ''),
(55, 2, NULL, 1471262901, 0, 3, 'African Hotel LTD', '2-4 Wampewo Avenue, Kololo', 18, '256752748080', '0414777000', 'africana@hotelafricana.com', 'hotelafricana.com', NULL, '', '', 0, 0, ''),
(56, 2, NULL, 1471263759, 0, 3, 'Guvnor Club', ' Plot 77, 1st Street,, Kampala, Uganda', 18, '+256414230190', '', '', 'http://www.guvnoruganda.com', NULL, 'uploads/2246113733863431471263759.png', 'uploads/banner2246113733863431471263759.jpg', 0, 0, ''),
(57, 2, NULL, 1471263888, 0, 3, 'Angenoir', '1st industrial area, 256 Kampala, Uganda', 18, '', '041 4230190', '', 'www.angenoir.net', NULL, 'uploads/2246113733863431471263926.jpg', '', 0, 0, ''),
(58, 2, NULL, 1471264018, 0, 3, 'Rouge Lounge ', 'Plot 2-2B, EM Plaza, Kampala Road Kampala Road ', 18, '', '+256 772 961918', '', '', NULL, '', '', 0, 0, ''),
(59, 2, NULL, 1471264141, 0, 3, 'Haandi Kampala Ltd (Restaurant)', ' Plot 7, Commercial Plaza ,1st Floor, Kampala Road, Above KCB Bank, Kampala, Uganda', 18, '', '+256 701 411221', '', '', NULL, '', '', 0, 0, ''),
(60, 2, NULL, 1471264299, 0, 3, 'Iguana Bar and Restaurant', '8 Bukoto St, Kamwokya ', 18, '+256782374667', '', '', '', NULL, 'uploads/2246113733863431471264299.jpeg', 'uploads/banner2246113733863431471264299.jpg', 0, 0, ''),
(61, 2, NULL, 1471264399, 0, 3, 'Capitol Palace Hotel', '26-2 Katalima Crescent', 18, '071400078', '0414289344', 'reservations#capitolpalace.ug', 'www.capitolpalace.ug', NULL, 'uploads/5938169576356191471264399.png', 'uploads/banner5938169576356191471264399.jpg', 0, 0, 'Capitol palace hotel is a 22 roomed boutique hotel that has a reflection of the African court yard and each village represents the African kingdom.'),
(62, 2, NULL, 1471264520, 0, 3, 'Cookie Couturier Uganda', 'P.O. Box 5303, Kampala, Uganda', 18, '+256772 421186', '', '', '', NULL, 'uploads/2246113733863431471264520.jpg', 'uploads/banner2246113733863431471264520.jpg', 0, 0, ''),
(63, 2, NULL, 1471264785, 0, 3, 'Jazzville', 'Bandali Rise, Kampala, Uganda', 18, '+256 777 999887', '', '', '', NULL, '', '', 0, 0, ''),
(64, 2, NULL, 1471264876, 0, 3, 'Centenary Park Chinese Restaurant', '34 Yusuf', 18, '', '0312888669', '', '', NULL, '', '', 0, 0, ''),
(65, 2, NULL, 1471265004, 0, 3, 'China Palace', ' P.O.Box 12185, Kampala Portal Ave, Kampala, Uganda', 18, '', '+256 41 4250888', '', '', NULL, '', '', 0, 0, ''),
(66, 2, NULL, 1471265094, 0, 3, 'China Plate', '11 Cooper Rd, Kisemente', 18, '', '0414233888', '', '', NULL, '', '', 0, 0, ''),
(67, 2, NULL, 1471265322, 0, 3, 'Coffee At Last	', 'Unit H1, Mobutu Road, Makindye, Kampala', 18, '', '+256704 263333', 'shop@coffeeug.com', '', NULL, 'uploads/2246113733863431471265322.png', 'uploads/banner2246113733863431471265322.png', 0, 0, 'Cafe | Lounge | Outside Catering ::: Welcome to the Coffee at Last. Keep up to date with the latest news, specials and deals, engage with us and fellow customers.'),
(68, 2, NULL, 1471265726, 0, 3, 'The Emin Pasha Hotel', '27 Akii Bua Road, Nakasero', 18, '256312264712', '0414236977', 'info@eminpasha.com', 'www.eminpasha.com', NULL, 'uploads/5938169576356191471265726.png', 'uploads/banner5938169576356191471265726.jpg', 0, 0, ''),
(69, 2, NULL, 1471266242, 0, 3, 'Excellent Hotel ', '81 Kamapala Road, EM Plaza', 18, '', '256454436367', 'excellenthotelug@hotmail.com', '', NULL, 'uploads/5938169576356191471266242.png', 'uploads/banner5938169576356191471266242.jpg', 0, 0, ''),
(70, 2, NULL, 1471266830, 0, 3, 'Club Silk ', '132 Beyers naude street, 0300 Rustenburg', 18, '+27786283958', '', 'aron@clubsilk.co.za', 'http://www.clubsilk.co.za', NULL, '', '', 0, 0, 'Bar,Restaurant and Night Club'),
(71, 2, NULL, 1471266844, 0, 3, 'Fairway Hotel & Spa', '1-2 Kafu Road, Nakasero', 18, '', '256454436367', 'info@fairwayhotel.co.ug', 'www.fairwayhotel.com', NULL, 'uploads/5938169576356191471266844.jpeg', 'uploads/banner5938169576356191471266844.jpg', 0, 0, ''),
(72, 2, NULL, 1471267029, 0, 3, 'Choma Bar + Restaurant', 'Centenary Park, Jinja Rd', 18, '+256777104463', '', '', '', NULL, '', '', 0, 0, ''),
(73, 2, NULL, 1471267153, 0, 3, 'Coconut Shack', 'Muyenga, next to Disney Kindergarten & Day Care.', 18, '+256712723412', '', '', '', NULL, '', '', 0, 0, ''),
(74, 2, NULL, 1471267658, 0, 3, 'Chong Qing', 'Simbamanyo House, 2 Lumumba Ave, Nakasero', 18, '', '0414250242', '', '', NULL, '', '', 0, 0, ''),
(75, 2, NULL, 1471268155, 0, 3, 'Khana Khazana', 'Tank Hill, Muyenga.', 18, '', '+256 41 4233049', 'khan@khanakhazana.co.ug', '', NULL, 'uploads/2246113733863431471268155.png', 'uploads/banner2246113733863431471268155.jpg', 0, 0, ''),
(76, 2, NULL, 1471268182, 0, 3, 'Fang Fang Hotel', '9 Ssezibwa Road, Nakasero', 18, '256414233115', '256414235828', 'fangfanghotel@yahoo.com', 'www.fangfang.co.ug', NULL, '', '', 0, 0, ''),
(77, 2, NULL, 1471268499, 0, 3, 'Le Chateau ', '142 Ggaba Rd, Kabalagala', 18, '+256791 572701', '0414510404', 'lechateau@qualitycuts.net', 'http://www.lechateaurestaurant', NULL, 'uploads/2246113733863431471268499.jpg', 'uploads/banner2246113733863431471268499.jpg', 0, 0, 'Experience the best of culinary delights in a typical African decor and ambience specially prepared by our Beligian cuisine trained chef.'),
(78, 2, NULL, 1471269128, 0, 3, 'Little Donkey', 'Dotta House, 5554 Bukasa Rd, Kampala, Uganda', 18, '+256787 077 156', '0414692827', 'thelittledonkeykampala@gmail.c', '', NULL, 'uploads/2246113733863431471269128.jpg', 'uploads/banner2246113733863431471269128.jpg', 0, 0, 'Kampala''s only authentic Mexican restaurant'),
(79, 2, NULL, 1471269687, 0, 3, 'Mama Ashanti', 'Plot 20 Kyadondo Rd, Nakasero', 18, '+256 774 542 855', '+256 772 223 999', 'mama.ashanti@gmail.com', 'http://www.mama-ashanti.co.ug', NULL, 'uploads/2246113733863431471269687.png', 'uploads/banner2246113733863431471269687.jpg', 0, 0, ' West African Cuisine '),
(80, 2, NULL, 1471270264, 0, 3, 'Forest Cottages ', '17/18 Upper Naguru, Old Kira Road', 18, '256752711746', '256414287308', 'info@forest-cottages.com', 'www.forest-cottages..com', NULL, 'uploads/5938169576356191471270264.png', 'uploads/banner5938169576356191471270264.jpg', 0, 0, ''),
(81, 2, NULL, 1471270474, 0, 3, 'Nanjing Restaurant and Motel', '15 Impala Ave, Kololo', 18, '', '+256 414 340 928', '', '', NULL, 'uploads/2246113733863431471270474.jpg', 'uploads/banner2246113733863431471270474.jpg', 0, 0, ''),
(82, 2, NULL, 1471270884, 0, 3, 'Golf Course Hotel', '64-88 Yusuf Lule Road ', 18, '', '256414563500', 'reservations@golfcoursehotel.c', 'www.golfcoureshotel.com', NULL, 'uploads/98151425112426751471270884.', 'uploads/banner98151425112426751471270884.jpg', 0, 0, ''),
(83, 2, NULL, 1471270956, 0, 3, 'Mantra Gourmet Indian', '8 Kintu Rd', 18, '+256759 806446', '0414342810', 'info@mantrakampala.com', 'http://mantrakampala.com/', NULL, 'uploads/2246113733863431471270956.png', 'uploads/banner2246113733863431471270956.png', 0, 0, 'Mantra strives to provide an unforgettable fine dining experience in Kampala'),
(84, 2, NULL, 1471271159, 0, 3, 'Mediterraneo Restaurant & Villa Kololo', '31 John Babiha (Acacia) Ave, Kampala, Uganda', 18, '+256701098732', '0414500533', 'info@villakololo.com', ' http://www.villakololo.com', NULL, 'uploads/2246113733863431471271159.jpg', 'uploads/banner2246113733863431471271159.jpg', 0, 0, 'Breakfast, Diners, Italian and Seafood'),
(85, 2, NULL, 1471271362, 0, 3, 'Grand Global Hotel', 'Makerere Hill', 18, '', '256414531836', 'manager@grandglobalhotel.co.ug', 'www.grandglobalhotel.co.ug', NULL, 'uploads/98151425112426751471271362.png', 'uploads/banner98151425112426751471271362.png', 0, 0, ''),
(86, 2, NULL, 1471271557, 0, 3, 'Mythos Greek Taverna + Lounge', '18 Impala Rd', 18, '+256793999666', '+256790 916183', 'info@mythosuganda.co.ug', 'http://mythosuganda.co.ug', NULL, 'uploads/2246113733863431471271557.png', 'uploads/banner2246113733863431471271557.png', 0, 0, 'Bring a loved one or the whole family to enjoy the tastes of delicious Greek and Mediterranean cuisine.'),
(87, 2, NULL, 1471271970, 0, 3, 'New Delhi Restaurant', 'Plot 8 Windsor Loop | Kololo, Kampala, Uganda', 18, '+256782755201 ', '+256715881644', '', '', NULL, 'uploads/2246113733863431471271970.jpg', 'uploads/banner2246113733863431471271970.jpg', 0, 0, ''),
(88, 2, NULL, 1471272020, 0, 3, 'Grand Imperial Hotel', 'Nile Avenue', 18, '', '256414250681', 'grsndimperisl@starcom.co.ug', '', NULL, 'uploads/98151425112426751471272020.jpg', 'uploads/banner98151425112426751471272020.jpg', 0, 0, ''),
(89, 2, NULL, 1471272278, 0, 3, 'FoodHour', '634, Kampala Road', 18, '+256704006114', '+256700957223', 'foodhour@gmail.com', 'foodhour.webs.com', NULL, 'uploads/1004172227292441471802898.jpg', 'uploads/banner1004172227292441471802898.jpg', 0, 0, 'FoodHour, Food at your door step. Order by placing your call on 0754006114 and tell us what you would like to eat.\r\n\r\nWe currently deliver within Kampala.\r\n'),
(90, 2, NULL, 1471272305, 0, 3, 'Open House', '38 Buganda Rd,(next to KPC)', 18, '+256718421772', '+256712578676', 'openhousekampala@gmail.com', '', NULL, 'uploads/2246113733863431471272305.jpg', 'uploads/banner2246113733863431471272305.jpg', 0, 0, 'Amani Banquet & Conference Hall\r\n\r\nThe Amani Banquet and Conference Hall offers Businesses and Individuals, facilities for all occasions, birthdays, conventions, conferences, corporate meetings, wedding celebrations and private parties. With ample parking within our grounds, it really is a unique venue in the heart of Kampala.\r\n\r\nThe Lounge\r\nBAR~ LOUNGE ~ CAF?\r\n\r\nWith the newly opened lounge Bar, it is a perfect space for guests to relax before or after a meal. We offer an excellent selection of wines, beers and spirits. It is a great spot for after work drinks and cocktails. For Coffee Lovers the Lounge is a comfortable and relaxing space with Coffee and a selection of fresh pastries and Cakes available every day. Come relax, indulge and play.'),
(91, 2, NULL, 1471272393, 0, 3, 'Hotel Triangle', '16 Buganda Road', 18, '', '256414231747', 'reservations@hoteltriangle.co.', 'www.hoteltriangle.co.ug', NULL, '', '', 0, 0, ''),
(92, 2, NULL, 1471272787, 0, 3, 'Piato', '20 Lumumba Ave, Nakasero', 18, '', '0312516388', 'info@piatokampala.com', '', NULL, 'uploads/2246113733863431471272787.jpg', 'uploads/banner2246113733863431471272787.jpg', 0, 0, 'A restaurant based in Kampala, Uganda serving different cuisines. Conference, private dining & meeting rooms are also available.'),
(93, 2, NULL, 1471272823, 0, 3, 'Hotel Ruch', '3 Kintu Road', 18, '256702820100', '256312210110', 'reservations@hotelruch.co.ug', 'www.hotelruch.com', NULL, 'uploads/98151425112426751471272823.png', 'uploads/banner98151425112426751471272823.jpg', 0, 0, ''),
(94, 2, NULL, 1471273704, 0, 3, 'Humura Resorts', '3 Kitante Close, Nakasero', 18, '', '256414700400', 'reservtions@humura.or.ug', 'www.humura.org', NULL, 'uploads/98151425112426751471274040.jpeg', 'uploads/banner98151425112426751471273704.jpg', 0, 0, ''),
(95, 2, NULL, 1471274633, 0, 3, 'Imperial Royal Hotel', '7 Kintu Road, Central', 18, '', '256417111001', 'information@irh.co.ug', 'www.imperialhotel.co.ug', NULL, 'uploads/98151425112426751471274633.jpg', 'uploads/banner98151425112426751471274633.jpg', 0, 0, ''),
(96, 2, NULL, 1471276540, 0, 3, 'Kabira Country Club', '63 Old Kira Road, Bukoto', 18, '', '256312227222', 'kabiracountryclub@kabiracountr', 'www.kabiracountryclub.com', NULL, 'uploads/98151425112426751471276540.png', 'uploads/banner98151425112426751471276540.jpg', 0, 0, ''),
(97, 2, NULL, 1471276862, 0, 3, 'Prunes', 'Plot 8, Wampewo Avenue, Kampala, Uganda', 18, '+256772 712002', '', 'info@prunes-ug.com', '', NULL, 'uploads/2246113733863431471278679.jpg', 'uploads/banner2246113733863431471277383.jpg', 0, 0, 'Prunes is a concept store and eatery designed by DGT Architects in Paris. It offers home-made healthy sandwiches, salads, breakfast, dinner as well as brunches for the weekends; along with the best quality of house coffee blend roasted to perfection. Don''t forget our speciality sweets and bread! Wifi is also available.'),
(98, 2, NULL, 1471277984, 0, 3, 'Metropole Hotel', '51-53 Windsor Crescent, Kololo', 18, '', '256414391000', 'reservations@metropolekampala.', 'www.metropolekampala.co.ug', NULL, 'uploads/98151425112426751471277984.jpg', 'uploads/banner98151425112426751471277984.jpg', 0, 0, ''),
(99, 2, NULL, 1471280372, 0, 3, 'Quepasa', '21 Cooper Road Kisementi', 18, '+256783874469', '', 'quepasakampala@gmail.com', ' http://quepasakampala.co.ug', NULL, 'uploads/2246113733863431471280372.jpg', 'uploads/banner2246113733863431471280372.jpg', 0, 0, 'New Mexican Bar in the happening area of Kisementi, next to Acacia Mall. Great food and drinks in a lively atmosphere.'),
(100, 2, NULL, 1471280640, 0, 3, 'Raves Cafe', 'Plot 67B Kanjokya Street, Kamwokya ', 18, '+256 312261266 ', '+256782837606', 'service@ravescafe.com', 'http://www.ravescafe.com', NULL, 'uploads/2246113733863431471280640.jpg', 'uploads/banner2246113733863431471280640.jpg', 0, 0, 'Raves Cafe & Lounge is a coffee shop that offers; Fine dining, Pizzeria, Bakery & Pastries, and Lounge.'),
(101, 2, NULL, 1471280997, 0, 3, 'Sky Lounge   ', '11 Cooper Rd, Kisementi, Opposite Acacia Mall', 18, '+25671411132', '+256 414 259377', 'skylounge@gmail.com', '', NULL, 'uploads/2246113733863431471280997.png', 'uploads/banner2246113733863431471280997.jpg', 0, 0, 'Lounge & Rooftop, Conveniently located in the heart of Kampala’s restaurant & lounge scene. Great Food & Cocktails'),
(102, 2, NULL, 1471281318, 0, 3, 'IL Patio', 'Kisozi Close, Kyagwe Rd, Kampala, Uganda', 18, '', '+256414258448', '', '', NULL, 'uploads/2246113733863431471281318.jpg', 'uploads/banner2246113733863431471281318.jpg', 0, 0, ''),
(103, 2, NULL, 1471281940, 0, 3, 'Paradiso', 'Tank Hill Road - Muyenga, Kampala, Uganda', 18, '+25677778282', '+256711 77 82 82', 'alemdrar@yahoo.com', 'http://www.il-paradiso.net', NULL, 'uploads/2246113733863431471281940.jpg', 'uploads/banner2246113733863431471281940.jpg', 0, 0, 'Italian Cusine and Pizza, Ethio - Eritrean Dishes, Sauna & Steam Bath, Shisha'),
(104, 2, NULL, 1471282220, 0, 3, '1000Cups Coffee', 'Plot 18 Buganda Road', 18, '+256772 505619', '+256782 544313', 'coffeestm@hotmail.com', 'www.iooocupscoffee.com ', NULL, 'uploads/2246113733863431471282354.jpg', 'uploads/banner2246113733863431471282354.jpg', 0, 0, 'Coffee Shop'),
(105, 2, NULL, 1471283046, 0, 3, '4 Points LTD', 'Centenary Park, Jinja Rd', 18, '+256702377866', '+2560414378826', '', '', NULL, '', '', 0, 0, ''),
(106, 2, NULL, 1471283659, 0, 3, 'Le Patisserie ', 'Acacia Mall, Kampala, Uganda', 18, '+256794571827', '', 'info@lapatisserie.biz', 'http://lapatisserie.biz/', NULL, 'uploads/2246113733863431471283659.jpg', 'uploads/banner2246113733863431471283659.jpg', 0, 0, 'The famous Le Chateau restaurant now @ La Patisserie Acacia Mall'),
(107, 2, NULL, 1471283974, 0, 3, 'Milestone Bakery', '1 Cooper road kisementi', 18, '', '041 4235846', '', '', NULL, '', '', 0, 0, 'fresh bread coffee and ather eats at an affordable! Fresh ever'),
(108, 2, NULL, 1471284153, 0, 3, 'New Day Coffee Shop', 'Metroplex Shopping Mall, Naalya', 18, '+256777 874204', '', 'newday@africaonline.co.ke', '', NULL, '', '', 0, 0, ''),
(109, 2, NULL, 1471284564, 0, 3, 'Red Chilli Hideaway', '13-23 Bukasa Hill View Road, Butabika', 18, '+256772509150', '0312202903', 'reservations@redchillihideaway', 'www.redchillihideaway.com', NULL, 'uploads/2246113733863431471284564.png', 'uploads/banner2246113733863431471284564.jpg', 0, 0, 'Friends and guests of Red Chilli Hideaway, Kampala and Red Chilli Rest Camp, Murchison Falls National Park\r\n'),
(110, 2, NULL, 1471285039, 0, 3, 'Shanghai Restaurant ', '8-10 Ternan Ave, Nakasero', 0, '', '0414250366', 'hotel@shangri-la.co.ug', '', NULL, '', '', 0, 0, ''),
(111, 2, NULL, 1471285336, 0, 3, 'Tamarai', 'Plot 14 Lower Kololo Terace, Kampala, Uganda', 18, '+256755794958', '+256755794960', 'tamaraithai@gmail.com', 'http://www.tamarai.restaurant.', NULL, 'uploads/2246113733863431471285336.jpg', 'uploads/banner2246113733863431471285336.jpg', 0, 0, 'Pan-Asian restaurant specializing in Thai Cuisine. East Africa''s only Tea Bar boasting over 15 flavors.'),
(112, 2, NULL, 1471285598, 0, 3, 'The Bistro', '15 Cooper road, kisementi, P.o box 2550 Kampala, Uganda', 18, '+256757247876', '', '', 'http://www.thebistro.ug', NULL, 'uploads/2246113733863431471285598.jpg', 'uploads/banner2246113733863431471285598.jpg', 0, 0, 'Cafe, bistro, bar in the heart of Kololo serving a variety of coffees, tapas, and favorites from the world.'),
(113, 2, NULL, 1471287457, 0, 3, 'The Lawns', 'Plot 3A, Lower Kololo Terrace, Kololo, 70881 Kampala, Uganda', 18, '', '0414250337', 'reservations@thelawns.co.ug', 'http://www.thelawns.co.ug', NULL, 'uploads/2246113733863431471287457.png', 'uploads/banner2246113733863431471287457.jpg', 0, 0, 'The Lawns Restaurant offers:\r\nCasual Lunch: From 11 AM to 4 PM\r\nFine Dining: 6 PM to 12 AM\r\nTapas Bar: 4 PM to 2 AM\r\nBanquet Functions\r\nConference Room'),
(114, 2, NULL, 1471287631, 0, 3, 'The Park Square Cafe', 'Sheraton Hotel, Ternan Avenue, Nakasero', 18, '0414344590', '0414344596', '', '', NULL, '', '', 0, 0, ''),
(115, 2, NULL, 1471287940, 0, 3, 'The Sound Cup', 'Bugolobi, bandali close, plot 9,', 18, '+256776 480111', '', 'thesoundcup@gmail.com', '', NULL, 'uploads/2246113733863431471287940.jpg', 'uploads/banner2246113733863431471287940.jpg', 0, 0, 'Breakfast, Brunch, Burgers, Diners, Fast Food, Sandwiches, Vegan and Vegetarian'),
(116, 2, NULL, 1471288235, 0, 3, 'The Woods', '107 Tankhill Road, Muyenga', 18, '+256788 011223', '', '', '', NULL, 'uploads/2246113733863431471288235.jpg', 'uploads/banner2246113733863431471288235.jpg', 0, 0, 'The Woods in Muyenga is A restaurant, Lounge and Bar set on the Hill of Muyenga amongest many trees and views of Lake Victoria with a constant breeze of calm and relaxation.'),
(117, 2, NULL, 1471288498, 0, 3, 'The Mist Bar ', 'Knit Road, Kampala Serena Hotel, Nakasero', 18, '', '+256312309000', '', '', NULL, 'uploads/2246113733863431471288498.png', 'uploads/banner2246113733863431471288498.jpg', 0, 0, ''),
(118, 2, NULL, 1471288780, 0, 3, 'White Rose ', 'Plot 996 Lumumba Close, Lubowa, Kampala, Uganda', 18, '+256776999900	', '', '', 'whiterosebistro@gmail.com', NULL, 'uploads/2246113733863431471288780.jpg', 'uploads/banner2246113733863431471288780.jpg', 0, 0, 'An intimate fresh space that serves home cooked food and cold drinks in a relaxing atmosphere. Each day a different menu will be set for you to enjoy.'),
(119, 2, NULL, 1471289088, 0, 3, 'Yasigi Beer Garden ', '40 A & B, Windsor Cresent Kampala', 18, '+256703502776', '+256 414661110', 'yasigibeergardens@gmail.com', '', NULL, 'uploads/2246113733863431471289088.jpg', 'uploads/banner2246113733863431471289088.jpg', 0, 0, 'YASIGI, the Malian goddess of beer, dance, and masks welcomes you to discover the world of micro-brewed beer at the first beer garden in Kampala.'),
(120, 4, NULL, 1471290696, 0, 3, 'Mega Standard Supermarket', 'Burton Street', 18, '  ', NULL, NULL, '  ', NULL, NULL, '', 0, 0, NULL),
(121, 2, NULL, 1471334912, 0, 3, 'ABC Capital Bank', '4 Pilkington Road, Colline House', 18, '', '+256414345200', '', 'http://www.abccapitalbank.co.u', NULL, 'uploads/6088131374045171471334912.jpg', 'uploads/banner6088131374045171471334912.jpg', 0, 0, 'ABC Capital Bank, Playing to the beat of East Africa.'),
(122, 2, NULL, 1471335346, 0, 3, 'Bank of Africa ', 'Plot 45, Jinja Road, Kampala, Uganda', 18, '', '0800 100140', 'feedback@boauganda.com', 'http://www.boauganda.com', NULL, 'uploads/6088131374045171471335346.png', 'uploads/banner6088131374045171471335346.png', 0, 0, 'Bank Of Africa provides a full range products and services to large corporate companies, retail clientele, as well as Small and Medium Enterprises.'),
(123, 2, NULL, 1471337865, 0, 3, 'Bank of Baroda Head Office', '18, Kampala Road, P.O. Box 7197, Kampala, Uganda', 18, '+256414345196', '+256414233680', 'bobho@dmail.ug', 'http://www.bankofbaroda.ug', NULL, 'uploads/6088131374045171471337865.jpg', 'uploads/banner6088131374045171471337865.png', 0, 0, ''),
(124, 2, NULL, 1471338077, 0, 3, 'Bank of Baroda Kabale Branch ', 'Plot 94 Kabale Road, Kabale - Uganda', 27, '', '+256486422087', 'kabale@bankofbaroda.com', '', NULL, 'uploads/6088131374045171471338077.jpg', 'uploads/banner6088131374045171471338306.jpg', 0, 0, ''),
(125, 2, NULL, 1471338255, 0, 3, 'Bank of Baroda Mbarara Branch', '11 Masaka Road, P.O. Box 1517, Mbarara - Uganda\r\n', 19, '', '+256485 421330', '', '', NULL, 'uploads/6088131374045171471338255.jpg', 'uploads/banner6088131374045171471338255.jpg', 0, 0, ''),
(126, 2, NULL, 1471338511, 0, 3, 'Bank of Baroda Mbale Branch', '3, Palls Road, Baroda House, P.O. Box 971, Mbale - Uganda', 20, '+256454432817 ', '+256454433583', 'mbale@bankofbaroda.com ', '', NULL, 'uploads/6088131374045171471338511.jpg', 'uploads/banner6088131374045171471338511.jpg', 0, 0, ''),
(127, 4, NULL, 1471338806, 0, 3, 'One Global', 'Ntinda Complex, Plot 33', 18, '256414280586', NULL, NULL, 'www.oneglobal.co', NULL, NULL, '', 0, 0, NULL),
(128, 2, NULL, 1471338841, 0, 3, 'Bank of Baroda Jinja Branch ', '16 a & b Iganga Road, P.O. Box 1102, Jinja - Uganda', 21, '+256434123162', '+256434120478', ' jinja@bankofbaroda.com ', '', NULL, 'uploads/6088131374045171471338841.jpg', 'uploads/banner6088131374045171471338841.jpg', 0, 0, ''),
(129, 2, NULL, 1471339094, 0, 3, 'Bank of Baroda Mukono Branch ', 'Plot No 59-67, Jinja Road, P. O. Box 122, Mukono -Uganda\r\n', 28, '', '+256414291990', ' mukono@bankofbaroda.com', '', NULL, 'uploads/6088131374045171471339094.jpg', 'uploads/banner6088131374045171471339094.jpg', 0, 0, ''),
(130, 2, NULL, 1471339296, 0, 3, 'Bank of Baroda Entebbe Branch ', 'Plot No. 24, Building of M/s Victoria Medical Services, Gower''s Road,', 23, '', '+256414323155', '', '', NULL, 'uploads/6088131374045171471339296.jpg', 'uploads/banner6088131374045171471339296.jpg', 0, 0, ''),
(131, 2, NULL, 1471342070, 0, 3, 'Barclays Bank	Main Branch', 'PLOT 2 HANNINGTON ROAD KAMPALA', 18, '', '0417122506', 'barclays.uganda@barclays.com', 'http://www.barclays.co.ug', NULL, 'uploads/6088131374045171471342070.png', 'uploads/banner6088131374045171471342070.jpg', 0, 0, ''),
(132, 2, NULL, 1471342247, 0, 3, 'Barclays Bank	Logogo Branch', 'PLOT 2-8 LUGOGO BYPASS ROAD, LUGOGO,KAMPALA. -LUGOGO BR.', 18, '', '0417125078', 'barclays.uganda@barclays.com', '', NULL, 'uploads/6088131374045171471342247.png', 'uploads/banner6088131374045171471342247.jpg', 0, 0, ''),
(133, 2, NULL, 1471342445, 0, 3, 'Barclays Bank Garden City Branch', 'LRV 2528 FOLIO 24,PLOT 64-86, YUSUF LULE ROAD KAMPALA-GARDEN CITY PRESTIGE', 18, '', '0417125141', 'barclays.uganda@barclays.com', 'http://www.barclays.co.ug', NULL, 'uploads/6088131374045171471342507.png', 'uploads/banner6088131374045171471342507.jpg', 0, 0, ''),
(134, 2, NULL, 1471342647, 0, 3, 'Barclays Bank	Entebbe Branch', 'PLOT 8 KITORO ROAD,BLOCK/ LRV 2544, BOX 239 ENTEBBE KITOORO', 23, '', '0417125114', 'barclays.uganda@barclays.com', 'http://www.barclays.co.ug', NULL, 'uploads/6088131374045171471342647.png', 'uploads/banner6088131374045171471342647.jpg', 0, 0, ''),
(135, 2, NULL, 1471342844, 0, 3, 'Barclays Bank Kampala Road Branch', 'PLOT 16, KAMPALA RD, P.O BOX.2971 KAMPALA', 18, '', '0417125291', 'barclays.uganda@barclays.com', 'http://www.barclays.co.ug', NULL, 'uploads/6088131374045171471342844.png', 'uploads/banner6088131374045171471342844.jpg', 0, 0, ''),
(136, 2, NULL, 1471342955, 0, 3, 'Barclays Bank Kansanga Branch', 'BLOCK 254,PLOT 546 KANSANGA	', 18, '', '0417125066', 'barclays.uganda@barclays.com', 'http://www.barclays.co.ug', NULL, 'uploads/6088131374045171471342955.png', 'uploads/banner6088131374045171471342955.jpg', 0, 0, ''),
(137, 2, NULL, 1471343220, 0, 3, 'Barclays Bank Acacia Mall Branch', 'ACACIA MALL PLOT 8A-12A, STURROCK RD-KOLOLO,KISEMENTI', 18, '', '0417122393', 'barclays.uganda@barclays.com', 'http://www.barclays.co.ug', NULL, 'uploads/6088131374045171471343220.png', 'uploads/banner6088131374045171471343220.jpg', 0, 0, ''),
(138, 2, NULL, 1471343361, 0, 3, 'Barclays Bank Jinja Branch', 'PLOT 81 A/B MAIN STREET JINJA', 21, '', '0417125316', 'barclays.uganda@barclays.com', 'http://www.barclays.co.ug', NULL, 'uploads/6088131374045171471343361.png', 'uploads/banner6088131374045171471343361.jpg', 0, 0, ''),
(139, 2, NULL, 1471343479, 0, 3, 'Barclays Bank Mbale Branch', 'PLOT 56/58 REPUBLIC STREET KITUNTU HOUSE', 27, '', '0417125397', 'barclays.uganda@barclays.com', 'http://www.barclays.co.ug', NULL, 'uploads/6088131374045171471343479.png', 'uploads/banner6088131374045171471343479.jpg', 0, 0, ''),
(140, 2, NULL, 1471343592, 0, 3, 'Barclays Bank Mukono Branch', 'PLOT 41 JINJA ROAD,MUKONO BOX 225', 28, '', '0417125026', 'barclays.uganda@barclays.com', 'http://www.barclays.co.ug', NULL, 'uploads/6088131374045171471343592.png', 'uploads/banner6088131374045171471343592.jpg', 0, 0, ''),
(141, 2, NULL, 1471343791, 0, 3, 'Barclays Bank Arua Branch', 'Plot 1D,Transport Road,Arua', 553, '', '0417125274', 'barclays.uganda@barclays.com', 'http://www.barclays.co.ug', NULL, 'uploads/6088131374045171471343791.png', 'uploads/banner6088131374045171471343791.jpg', 0, 0, ''),
(142, 2, NULL, 1471343951, 0, 3, 'Barclays Bank Gulu Branch', 'Plot 32,Gulu Avenue', 22, '', '0417125283', 'barclays.uganda@barclays.com', '', NULL, 'uploads/6088131374045171471343951.png', 'uploads/banner6088131374045171471343951.jpg', 0, 0, ''),
(143, 2, NULL, 1471347136, 0, 3, 'Barclays Bank Fort Portal Branch', 'Plot 14,Bwamba Road,Fort Portal', 29, '', '0417125226', 'barclays.uganda@barclays.com', 'http://www.barclays.co.ug', NULL, 'uploads/6088131374045171471347136.png', 'uploads/banner6088131374045171471347136.jpg', 0, 0, ''),
(144, 2, NULL, 1471347298, 0, 3, 'Barclays Bank Kabale Branch', 'Vol 2996 Folio 14,Plot 90 ,Kabale Road', 27, '', '0417125706', 'barclays.uganda@barclays.com', 'http://www.barclays.co.ug', NULL, 'uploads/6088131374045171471347298.png', 'uploads/banner6088131374045171471347298.jpg', 0, 0, ''),
(145, 2, NULL, 1471347418, 0, 3, 'Barclays Bank Kasese Branch', 'Volume 2050,Folio 25,Plot 68,Rwenzori Road.- Kasese', 26, '', '0417125726', '', '', NULL, 'uploads/6088131374045171471347418.png', 'uploads/banner6088131374045171471347418.jpg', 0, 0, ''),
(146, 2, NULL, 1471347577, 0, 3, 'Barclays Bank Masaka Branch', 'Plot 2B, Broadway Street,Masaka', 25, '', '0417125455', 'barclays.uganda@barclays.com', 'http://www.barclays.co.ug', NULL, 'uploads/6088131374045171471347577.png', 'uploads/banner6088131374045171471347577.jpg', 0, 0, ''),
(147, 2, NULL, 1471347777, 0, 3, 'Barclays Bank Mbarara Branch', 'Mbarara Br. Plot 2 Bulemba Rd, Mbarara', 19, '', '0417125376', 'barclays.uganda@barclays.com', 'http://www.barclays.co.ug', NULL, 'uploads/6088131374045171471347777.png', 'uploads/banner6088131374045171471347777.jpg', 0, 0, ''),
(148, 2, NULL, 1471348069, 0, 3, 'Bank of India (Uganda)', '37 Jinja Road', 18, '+256313400400 ', '+256414341880', 'BOI.Uganda@bankofindia.co.in', '', NULL, '', '', 0, 0, ''),
(149, 2, NULL, 1471348543, 0, 3, 'Cairo International Bank Uganda HQ', '30 Kampala Road, Greenland Towers', 18, '0414230141', '0414230136', 'cibug@infocom.co.ug', 'www.cairointernationalbank.co.', NULL, 'uploads/6088131374045171471348543.jpg', 'uploads/banner6088131374045171471348543.jpg', 0, 0, ''),
(150, 2, NULL, 1471349122, 0, 3, 'CBA Bank Uganda ', '10 Kafu Road, Twed Towers, Nakasero', 18, '', '0312188400', '', 'www.cbagroup.com', NULL, 'uploads/6088131374045171471349122.jpg', 'uploads/banner6088131374045171471349122.jpg', 0, 0, ''),
(151, 2, NULL, 1471349368, 0, 3, 'Centenary Bank HQ', '44/46 Kampala Road, Mapeera House', 18, '0414232 393', '0414346 856', 'info@centenarybank.co.ug', 'www.centenarybank.co.ug', NULL, 'uploads/6088131374045171471349368.png', 'uploads/banner6088131374045171471349368.png', 0, 0, 'Centenary Rural Development Bank is the leading Commercial Microfinance Bank in Uganda'),
(152, 2, NULL, 1471349809, 0, 3, 'Crane Bank Ltd HQ', 'Crane Chambers, 38 Kampala Road', 18, '0414345345 ', '0414341403', 'cranebank@cranebanklimited.com', 'www.cranebanklimited.com', NULL, 'uploads/6088131374045171471349809.png', 'uploads/banner6088131374045171471349809.jpg', 0, 0, ''),
(153, 2, NULL, 1471352420, 0, 3, 'Citibank ', '4 Ternan Avenue, Centre Court', 18, '+256414305500', '+256312305500', '', 'www.citigroup.com', NULL, 'uploads/6088131374045171471352846.png', 'uploads/banner6088131374045171471352846.png', 0, 0, ''),
(154, 2, NULL, 1471353471, 0, 3, 'DFCU', '2 Jinja Road', 18, '0414346497', '0414351000', 'customerservice@dfcugroup.com', 'www.dfcugroup.com', NULL, 'uploads/6088131374045171471353471.png', 'uploads/banner6088131374045171471353471.jpg', 0, 0, ''),
(155, 2, NULL, 1471355303, 0, 3, 'Diamond Trust Bank ', '17-19 Kampala Road', 18, '+256414387000 ', '+256312261167', 'dtbu@spacenetuganda.com', 'www.diamondtrust-bank.com	', NULL, 'uploads/6088131374045171471355303.png', 'uploads/banner6088131374045171471355303.png', 0, 0, ''),
(156, 2, NULL, 1471355794, 0, 3, 'East African Development Bank', '4 Nile Avenue', 18, '', '0414230021', '', '', NULL, 'uploads/6088131374045171471355794.jpg', 'uploads/banner6088131374045171471355794.jpg', 0, 0, ''),
(157, 2, NULL, 1471356036, 0, 3, 'Eco Bank Uganda Ltd', '4 parliamentary Avenue', 18, '', '0312266078', 'ecobankug@ecobank.com', 'www.ecobank.com', NULL, 'uploads/6088131374045171471356036.jpg', 'uploads/banner6088131374045171471356036.jpg', 0, 0, ''),
(158, 2, NULL, 1471356040, 0, 3, 'Kampala Serena Hotel', '6 - 8 Nile Avenue, Nakasero', 18, '', '256414309000', 'Kampala@serena.co.ug', 'www.serenahotel.com', NULL, 'uploads/98681699115697581471356040.jpeg', 'uploads/banner98681699115697581471356040.jpeg', 0, 0, ''),
(159, 2, NULL, 1471356187, 0, 3, 'Nob View Hotel', 'Commercial Road', 18, '', '2564142866376', 'info@nobviewhotel.com', 'www.nobviewhotel.com', NULL, 'uploads/98681699115697581471356661.png', 'uploads/banner98681699115697581471356661.jpeg', 0, 0, ''),
(160, 2, NULL, 1471356253, 0, 3, 'Equity Bank', '390 Mutesa 1 Road, katwe', 18, '0312262437', '0414531377', 'info@equitybank.co.ug', 'www.equity bank.co.ug', NULL, 'uploads/6088131374045171471356253.jpg', 'uploads/banner6088131374045171471356253.jpg', 0, 0, ''),
(161, 2, NULL, 1471356518, 0, 3, 'GT Bank ', '56 Kira Road', 18, '', '+256414233824', 'bankingug@finabank.com', 'www.finabank.com', NULL, 'uploads/6088131374045171471356518.png', 'uploads/banner6088131374045171471356518.jpg', 0, 0, ''),
(162, 2, NULL, 1471357341, 0, 3, 'Protea Hotel Kampala', '4 Elgon Terrace, Kololo', 18, '', '256312550000', 'res@protekla.co.ug', 'www.proteahotels.com', NULL, 'uploads/98681699115697581471357341.png', 'uploads/banner98681699115697581471357341.jpeg', 0, 0, ''),
(163, 2, NULL, 1471357353, 0, 3, 'Housing Finance Bank ', '4 Wampewo Avenue Kololo, Investment House', 18, '', '0414259652', 'info@housingfinance.co.ug', 'http://www.housingfinance.co.u', NULL, 'uploads/6088131374045171471357353.jpg', 'uploads/banner6088131374045171471357353.jpg', 0, 0, ''),
(164, 2, NULL, 1471357618, 0, 3, 'Taj Mahal Hotel & Casino', '75 First Street, Industrial Area', 18, '', '256417716600', 'gm@tajmahal.co.ug', 'www.tajmahal.co.ug', NULL, 'uploads/84801863103457681471361729.jpeg', 'uploads/banner84801863103457681471361729.jpeg', 0, 0, ''),
(165, 2, NULL, 1471357689, 0, 3, 'Imperial Bank ', '6 Hannington Road', 18, '0312320409', '0312320400', 'info@imperialbank.co.ug', 'www.imperialbankgroup.com', NULL, 'uploads/6088131374045171471357689.png', 'uploads/banner6088131374045171471357689.png', 0, 0, 'The premier banking and finance institution in Kenya and Uganda.'),
(166, 2, NULL, 1471357902, 0, 3, 'KCB Bank ', 'Plot 7 Commercial Plaza, Kampala Road', 18, '', '+256417118200', 'kcbugandaho@kcb.co.ug', 'www.kcbbankgroup.com', NULL, 'uploads/6088131374045171471357902.jpg', 'uploads/banner6088131374045171471357902.jpg', 0, 0, ''),
(167, 2, NULL, 1471358186, 0, 3, 'NC Bank ', 'Plot 4/6, Nakasero Road, Rwenzori Towers', 18, '0312388000', '0417337000', 'info@nc-bank.com', 'www.nic-bank.com', NULL, 'uploads/6088131374045171471358186.png', 'uploads/banner6088131374045171471358186.jpg', 0, 0, ''),
(168, 2, NULL, 1471358326, 0, 3, 'Orient Bank Ltd', 'Plot 6/6A Kampala Road', 18, '', '0800144551', 'mail@orient-bank.com', 'www.orient-bank.com', NULL, 'uploads/6088131374045171471358326.jpg', 'uploads/banner6088131374045171471358326.jpg', 0, 0, ''),
(169, 2, NULL, 1471358705, 0, 3, 'Stannic Bank HQ', '17 Hannington Road, P.O. Box 7131 Kampala, Uganda', 18, '0417154600', '0800250250', 'CCCUG@stanbic.com', 'http://www.stanbicbank.co.ug', NULL, 'uploads/6088131374045171471358705.png', 'uploads/banner6088131374045171471358705.jpg', 0, 0, ''),
(170, 2, NULL, 1471358790, 0, 3, 'Shangri- La Nyonyi Gardens Hotel & Apartments ', 'Kololo Hill', 18, '', '256772222622', 'nyonyi@hotel-apartment-Uganda.', 'www.hotel-apartment-uganda.com', NULL, 'uploads/98681699115697581471358790.', 'uploads/banner98681699115697581471358790.jpeg', 0, 0, ''),
(171, 2, NULL, 1471358913, 0, 3, 'Standard Chartered Bank HQ', '5 Speke Road', 18, '0414258 211', '0414 349 505', 'scb_uganda@ug.standardchartere', 'www.standardchartered.com', NULL, 'uploads/6088131374045171471358913.jpg', 'uploads/banner6088131374045171471358913.jpg', 0, 0, ''),
(172, 2, NULL, 1471359042, 0, 3, 'Mr Delivery U Ltd ', 'Kololo Hill', 18, '+256773765327', '0417744900', '', 'http://www.mrdug.com', NULL, 'uploads/1004172227292441471803333.jpg', 'uploads/banner1004172227292441471803333.jpg', 0, 0, 'MR Delivery Uganda is Uganda’s premier provider of real-time food and beverages delivery services across the country.'),
(173, 2, NULL, 1471359309, 0, 3, 'Sheraton Hotel Kampala ', 'Tar nana Avenue, Nakasero ', 18, '', '256414220000', '', 'www.sheratonkampala.com', NULL, 'uploads/98681699115697581471359309.jpeg', 'uploads/banner98681699115697581471359309.jpeg', 0, 0, ''),
(174, 2, NULL, 1471359476, 0, 3, 'Tropical Bank HQ', '27 Kampala Road', 18, '', '0414313100', 'admin@trobank.com', 'www.trobank.com', NULL, 'uploads/6088131374045171471359476.png', 'uploads/banner6088131374045171471359476.jpg', 0, 0, ''),
(175, 2, NULL, 1471359853, 0, 3, 'United Bank for Africa HQ', '22 Jinja Road, Spear House', 18, '0417715100', '0417715122', 'ubauganda@ubagroup.com', 'www.ubagroup.com', NULL, 'uploads/6088131374045171471359853.png', 'uploads/banner6088131374045171471359853.jpg', 0, 0, ''),
(176, 2, NULL, 1471360191, 0, 3, 'Chips n Wines', 'Kansanga, KCCA Rd, Male parish, Makindye division,', 18, '+256775982893', '+256706103736', '', '', NULL, 'uploads/1004172227292441471802472.jpg', 'uploads/banner1004172227292441471802472.jpg', 0, 0, ''),
(177, 2, NULL, 1471360420, 0, 3, 'Speke Hotel', '7/9 Nile Avenue', 18, '', '256414259221', 'spekehotel@spekehotel.com', 'www.spekehotel.com', NULL, 'uploads/98681699115697581471360420.png', 'uploads/banner98681699115697581471360420.jpeg', 0, 0, '');
INSERT INTO `business` (`id`, `user_id`, `owner_id`, `date_created`, `date_claimed`, `country_id`, `name`, `address`, `city_id`, `phone_1`, `phone_2`, `email`, `website`, `location`, `logo`, `banner`, `good`, `cost`, `description`) VALUES
(178, 2, NULL, 1471360744, 0, 3, 'Mihingo Lodge ', 'Lake Mburo National Park', 18, '+256752410509', '', 'reservations@mihingolodge.com ', 'www.mihingolodge.com', NULL, 'uploads/6088131374045171471364485.jpg', 'uploads/banner6088131374045171471364485.jpg', 0, 0, ''),
(179, 2, NULL, 1471366760, 0, 3, 'Rwakobo Lodge', 'Lake Nabugabo Sand Beach Resort', 18, '+256755211771', '', 'info@rwakoborock.com', 'http://www.rwakoborock.com', NULL, 'uploads/6088131374045171471366760.png', 'uploads/banner6088131374045171471366760.jpg', 0, 0, 'Only 3 and a half hours from Kampala. Take the first exit towards Lake Mburo National Park when travelling west on the main road between Kampala and Mbarara.\r\n\r\nWe are situated about 8km from the main road and 1.5 km from the Nshara park gate.\r\n\r\nPublic Transport: Buses from Kampala – towards Mbarara\r\n\r\nBuses leave regularly from Central Bus Park.  We advise choosing a full bus, as buses leave once they are full.\r\n\r\nGet off about 15km after Lyantonde at a charcoal trading centre called Akageti.  From Akageti a special hire taxi (approx 30,000UGX) or boda (approx 7,000UGX) can bring you to Rwakobo Rock (8km).  Alternatively a lodge vehicle can pick you up if previously arranged (approx 30,000UGX).\r\nFrom Mbarara – towards Kampala\r\n\r\nAkageti is about 50km from Mbarara.  Do not take the first turn towards Lake Mburo at Sanga.  Take the second turning on the right.'),
(180, 2, NULL, 1471423377, 0, 3, 'AAR Healthcare Head Office', '6 Makindu Close, Kololo,', 18, '', '0414258527', 'info@aar.co.ug', 'http://www.aarhealth.com', NULL, 'uploads/99301324112574021471423377.jpg', 'uploads/banner99301324112574021471423377.png', 0, 0, 'Official page for AAR Acacia Healthcentre providing 24/7 services from a Qualified Medical Team at the lowest prices in town, reach us on 0716-155512.'),
(181, 2, NULL, 1471423804, 0, 3, 'AAR Healthcare Acacia Mall', 'Acacia Ave, Kololo, Kampala, Uganda', 18, '', '0414258527', 'info@aar.co.ug', 'http://www.aarhealth.com', NULL, 'uploads/99301324112574021471423804.jpg', 'uploads/banner99301324112574021471423804.png', 0, 0, ''),
(182, 2, NULL, 1471424252, 0, 3, 'Case Medical Clinic', 'Plot 69-7 1 Buganda Road,Kampala Uganda', 18, '0312261123', '0414250362', 'casemedcare@casemedcare.org', 'http://casemedcare.org', NULL, 'uploads/99301324112574021471424252.png', 'uploads/banner99301324112574021471424252.jpg', 0, 0, 'Case Medical Centre is a private hospital located on Buganda Road in Central Kampala. The Centre started in 1995 as a small Clinic on Bombo Road. With the years the Centre''s clientele and reputation grew until the need to expand became overwhelming'),
(183, 2, NULL, 1471424834, 0, 3, 'Kampala International Hospital', 'Plot 4686 St Barnabas Rd, Kisugu - Namuwongo.', 18, '+256312200400', '+256414309800', 'ihk@img.co.ug', 'http://ihk.img.co.ug', NULL, 'uploads/99301324112574021471424834.jpg', 'uploads/banner99301324112574021471424834.jpg', 0, 0, 'We are committed to improving standards of healthcare in Uganda through innovation, applied research, education and community-based services.'),
(184, 2, NULL, 1471425309, 0, 3, 'Nakasero Hospital', 'Plot 14, Akii-Bua Road, Nakasero, ', 18, '0414346150', '+256 312 346152', 'info@nhl.co.ug', 'www.nakaserohospital.com', NULL, 'uploads/99301324112574021471425309.png', 'uploads/banner99301324112574021471425309.jpg', 0, 0, 'We are a private hospital situated in the heart of Kampala, on Nakasero Hill,offering specialised outpatient and inpatient medical services.'),
(185, 2, NULL, 1471425553, 0, 3, 'Victorial University Health Centre', '548 Kira Road ', 18, '', '0417727100', 'info@vuhc.ug', 'www.vuhc.ug ', NULL, '', '', 0, 0, ''),
(186, 2, NULL, 1471426257, 0, 3, 'Acacia Classical Academy ', 'Kisugi Church Rd, Kampala, Uganda', 18, '', '0752403961', 'admin@acacia.co.ug', 'www.acacia.co.ug', NULL, 'uploads/99301324112574021471426257.jpg', 'uploads/banner99301324112574021471426257.jpg', 0, 0, 'Acacia International School is an independent Christian day school located in Muyenga, Kampala.'),
(187, 2, NULL, 1471426968, 0, 3, 'Kissyfur Kampala', 'Plot 1 Bandali Rise', 18, '+256782801407', '+256414222095', 'kissyfur@nca.co.ug', 'http://kissyfuruganda.com/', NULL, '', '', 0, 0, 'Kissyfur Pre Kindergarten & Day Care Centre'),
(188, 2, NULL, 1471427417, 0, 0, 'The English Pre-School ', '182 Ggaba Road ', 0, '+256782597629 ', '', 'theenglishpreschool@yahoo.com', '', NULL, '', '', 0, 0, 'The English Preschool was set up in August 2006. It takes children of all nationalities. \r\nWe as well take children from 18 months to 6 years. \r\n'),
(189, 2, NULL, 1471427499, 0, 3, 'Tom and Jerry ', 'Lugogo Bypass', 18, '+256712550786', '', '', '', NULL, '', '', 0, 0, ''),
(190, 2, NULL, 1471427627, 0, 3, 'Wellspring Nursery and Primary School', 'Bweyogerere', 18, '+256782307218', '0414505771 ', 'admin@wellspring.or.ug', '', NULL, '', '', 0, 0, ''),
(191, 2, NULL, 1471446251, 0, 3, 'Apfront Ventures', 'First floor 109, Mazima Mall, Ggaba Road', 18, '+256752600124', '', '', '  ', NULL, 'uploads/1518116926906371478680292.jpg', 'uploads/banner1518116926906371478680292.jpg', 0, 0, ''),
(192, 2, NULL, 1471591036, 0, 3, 'Uganda National Cultural Centre', 'Plot 2, 4 & 6 De-Winton Road, P. O Kampala, Uganda', 18, '0414254567', '', 'culture@uncc.co.ug', 'http://www.uncc.co.ug', NULL, 'uploads/83061907102168421471591036.jpg', 'uploads/banner83061907102168421471591036.jpg', 0, 0, 'The Uganda National Cultural Centre whose official acronym is UNCC, is a Ugandan statutory body that was established on the 8th October 1959.'),
(193, 2, NULL, 1471591775, 0, 3, 'Ndere Centre ', 'Plot 4505 Butuukirwa, Kisaasi-Kira Rd, P.O. Box 11353 Kisasi, Kampala, Uganda', 18, '+256414597704', '+256312291936', 'info@ndere.com', 'http://www.ndere.com', NULL, 'uploads/83061907102168421471591775.jpg', 'uploads/banner83061907102168421471591775.jpg', 0, 0, 'Where Culture, Entertainment, Dinning, and Never Ending '),
(194, 2, NULL, 1471611808, 0, 3, 'Arcadia Suites', '54A Kira Road', 18, '+25675355377', '+256417333400', 'gm@arcadiakampala.com', 'www.arcadiakampala.com', NULL, 'uploads/1745193436817751471611808.jpeg', 'uploads/banner1745193436817751471611807.jpg', 0, 0, ''),
(195, 2, NULL, 1471612626, 0, 3, 'Afrique Suites Hotel', '95 Circular Road, Mutungo Hill', 18, '+256772469880', '+256414223385', 'info@afriquesuiteshotel.co.ug', '', NULL, 'uploads/1745193436817751471612626.jpg', 'uploads/banner1745193436817751471612626.jpg', 0, 0, ''),
(196, 2, NULL, 1471612961, 0, 3, 'The Bar', '95 Circular Road, Mutungo Hill ', 18, '+256772469880', '+256414223385', 'info@afriquesuiteshotel.co.ug', 'www.afriquesuiteshotel.co.ug', NULL, 'uploads/1745193436817751471612961.jpg', 'uploads/banner1745193436817751471612961.jpg', 0, 0, ''),
(197, 19, NULL, 1471777013, 0, 3, 'PHONE CLINIC UGANDA', 'Mutasa kafero', 18, '  ', NULL, NULL, '  ', NULL, NULL, '', 0, 0, NULL),
(198, 2, NULL, 1472121521, 0, 3, 'Hotel Diplomate', 'Diplomate Road, Tank Hill', 18, '256414267655', '256414572828', 'diplomatekampala@hotmail.com', 'www.diplomatekampala.com', NULL, '', '', 0, 0, ''),
(199, 2, NULL, 1472123343, 0, 3, 'Royal Suites', '18-20 Binayomba Road, off Luthuli Avenue, Bugolobi', 18, '256312263816', '256772506752', 'royal@royalsuites.co.ug', 'www.royalsuites.com', NULL, 'uploads/7763133691017131472123343.jpg', 'uploads/banner7763133691017131472123343.jpg', 0, 0, ''),
(200, 2, NULL, 1472124436, 0, 3, 'Hotel Kenrock', 'Muyenga, Kampala.', 18, '256752333377', '25641401501889', 'hotelkenrock@yahoo.com', '', NULL, '', '', 0, 0, ''),
(201, 2, NULL, 1472125679, 0, 3, 'Royal Suites', '18-20 Binayomba Road, off Luthuli Avenue, Bugolobi', 18, '256312263816', '256772506752', 'royal@royalsuites.co.ug', 'www.royalsuites.com', NULL, 'uploads/7763133691017131472125679.jpg', 'uploads/banner7763133691017131472125679.jpg', 0, 0, ''),
(202, 4, NULL, 1472130318, 0, 3, 'Afro-American Restaurant', 'Bukoto', 18, '  ', NULL, NULL, '  ', NULL, NULL, 'uploads/img4on1472130318.jpg', 0, 0, NULL),
(203, 4, NULL, 1472193529, 0, 3, 'B.SOUG Craft Shop', 'Nakasero (Same building with Talent Africa)', 18, '  ', NULL, NULL, '  ', NULL, NULL, 'uploads/img4on1472193529.jpg', 0, 0, NULL),
(204, 33, NULL, 1472199353, 0, 3, 'Arbur Africa LTD', 'Nasser Road, Printer''s Miracle Center', 18, '+256751490123', NULL, NULL, '  ', NULL, NULL, 'uploads/img33on1472199353.jpg', 0, 0, NULL),
(205, 2, NULL, 1472285422, 0, 3, 'Tirupati Mazima Mall ', 'Ggaba Road, Kampala, Uganda', 18, '', '+256754300306', '', '', NULL, 'uploads/6096158776863011472285422.jpg', 'uploads/banner6096158776863011472285422.jpg', 0, 0, ''),
(206, 36, NULL, 1472393216, 0, 3, 'CDiC program', 'Nsambya hospital kampala', 18, '+256774424537', NULL, NULL, '  ', NULL, NULL, '', 0, 0, NULL),
(207, 36, NULL, 1472393835, 0, 3, 'Indingo sports bar', 'William street above old taxi park', 18, '  ', NULL, NULL, '  ', NULL, NULL, '', 0, 0, NULL),
(208, 2, NULL, 1472486755, 0, 3, 'Doctors Plaza (U) LTD', 'Plot 1470, Nsambya-Gaba Road, P.O. Box 32297, Kampala, Uganda', 18, '+256312278760', '+256414501744', 'doctors.plaza@gmail.com', '', NULL, 'uploads/5346144367924571472486755.jpg', 'uploads/banner5346144367924571472486754.jpg', 0, 0, ''),
(209, 4, NULL, 1472626551, 0, 3, 'Roitcs Unlock Shop', 'Yamaha Centre Luwum Street Shop LB40, Burton Street', 18, '+256752647403', NULL, NULL, '  ', NULL, NULL, 'uploads/img4on1472626551.jpg', 0, 0, NULL),
(210, 4, NULL, 1472659018, 0, 3, 'Jim Communication', 'Namirembe Road, New Taxi Park', 18, '+256774294094', NULL, NULL, '  ', NULL, NULL, 'uploads/img4on1472659018.jpg', 0, 0, NULL),
(211, 2, NULL, 1472821633, 0, 3, 'Shaka Tours & Travel ', 'Plot 4 Entebbe, Elder SSetimba Road', 18, '+256751182034', '+256784276221', ' info@shakatoursug.com', 'www.shakatoursug.com', NULL, 'uploads/93381966113076881472821633.png', 'uploads/banner93381966113076881472821633.jpg', 0, 0, 'We offer safaris , gorilla trekking, mountain hiking, chimpanzee tracking, bird watching, city tours, hotel & lodge bookings, airport transfers etc'),
(212, 2, NULL, 1472822215, 0, 3, 'Impala fitness center Hotel International Muyenga ', 'Tank Hill Road, Kampala, Uganda', 18, '+256701828789', '', '', '', NULL, 'uploads/93381966113076881472823438.jpeg', 'uploads/banner93381966113076881472823438.jpg', 0, 0, 'look good while naked. fitness and health'),
(213, 2, NULL, 1472835026, 0, 3, 'Aga Khan University Hospital Kampala Medical Center', '17/19 Kampala road Diamond trust building', 18, '', '0414259186', 'kampala.reception@aku.edu', '', NULL, 'uploads/7020118282055241472835305.jpeg', '', 0, 0, ''),
(214, 2, NULL, 1472835146, 0, 3, 'Agakhan University Hospital Bugolobi Medical Center', 'Spring Rd, Kampala, Uganda', 18, '', '0414259186', '', '', NULL, 'uploads/7020118282055241472835325.jpeg', '', 0, 0, ''),
(215, 2, NULL, 1472835480, 0, 3, 'Children Clinic Kampala', '40 Kyadondo Road, Nakasero ', 18, '', '', '', '', NULL, '', '', 0, 0, ''),
(216, 2, NULL, 1472835892, 0, 3, 'Sas Clinic', 'Plot 76 Shoal House, Kampala Road', 18, '', '0414345325', 'sasclinic@sasprojects.co.ug', 'www.sasclinic.co.ug', NULL, 'uploads/7020118282055241472835892.jpg', 'uploads/banner7020118282055241472835892.jpg', 0, 0, 'SAS CLINIC is a private health care provider dedicated to satisfying the communities’ health care needs through affordable, accessible and quality medical services. Registered on 22 August 1994 as SAVANNAH SUNRISE MEDICAL CENTRE LIMITED in Kampala, Uganda’s capital and largest city , it started operations in March 1998 trading as SAS Clinic.'),
(217, 2, NULL, 1472890848, 0, 3, 'Elephin Orthodontics & Dental Care', '13-15 Faraday Road, Bugolobi', 18, '+256794512123', '0414505655', 'elephindental@gmail.com', '', NULL, '', '', 0, 0, 'Dr Kaval (BDS (Lond), MDS (Singapore),RCS Eng, MOrth)'),
(218, 2, NULL, 1472890948, 0, 3, 'The Dental Studio', '14 bukoto Street, kamwokya', 18, '0414531259', '0312262357', 'dkalanzi@yahoo.com', '', NULL, '', '', 0, 0, 'Dr Paul Okello Aliker'),
(219, 2, NULL, 1472891150, 0, 3, 'Pan Dental Surgery', '67 Buganda Road, Kampala', 18, '0414251525', '0414347608', '', '', NULL, '', '', 0, 0, ''),
(220, 2, NULL, 1472891591, 0, 3, 'City Optics & Contact Lens Centre', 'Shop 11 Pioneer Mall, Kampala Road', 18, '+256772501255', '0414233327', '', '', NULL, '', '', 0, 0, ''),
(221, 2, NULL, 1472892189, 0, 3, 'Eye Care Centre - Garden City', 'Garden City 2nd Floor, Yusuf Lule Road, Kampala, Uganda', 18, '+256782947300', '0312272280', 'sales@ eyecareug.com', ' www.eyecareug.com', NULL, 'uploads/6709125179633231472892189.jpg', 'uploads/banner6709125179633231472892189.jpg', 0, 0, 'Garden City Branch'),
(222, 2, NULL, 1472892371, 0, 3, 'Eye Care Centre - Lugogo Mall', 'Shop No. 9, Lugogo Mall, P.O. Box 9342', 18, '', '+256414220780', 'sales@eyecareug.com', 'www.eyecareug.com', NULL, 'uploads/6709125179633231472892371.jpg', 'uploads/banner6709125179633231472892371.jpg', 0, 0, ''),
(223, 2, NULL, 1472893030, 0, 3, 'Afk Beauty Clinic', '142 Ggaba Road, Kasanga', 18, '+256772503630', '', 'gertrudekatatumba@gmail.com', '', NULL, 'uploads/6709125179633231472893030.jpg', 'uploads/banner6709125179633231472893030.jpg', 0, 0, 'Afk Beauty clinic provides services related to skin health, facial aesthetic, foot care, nail manicures, aromatherapy among others\r\n\r\nMake up\r\nBridal Make up\r\nfacial\r\nManicure\r\nPedicure\r\naroma therapy\r\nSwedish massage'),
(224, 2, NULL, 1472893275, 0, 3, 'Beauty Tips Spa & Salon', '13 Mukwano Courts Buganda Road', 18, '+256772492940', '+256752492940', 'ndiwalanaflorence@gmail.com', '', NULL, '', '', 0, 0, ''),
(225, 2, NULL, 1472893503, 0, 3, 'Greener spa and fitness studio', 'Plot 4. K.A.R ,Off Wampewo Avenue, Kololo ', 18, '+256782 335455', '', '', '', NULL, 'uploads/6709125179633231472893503.jpg', 'uploads/banner6709125179633231472893503.jpg', 0, 0, ''),
(226, 2, NULL, 1472893939, 0, 3, 'J&V Spa', '2nd Floor, Village mall. ', 18, '+256759899814', '0392176474', '', '', NULL, 'uploads/6709125179633231472893939.jpg', 'uploads/banner6709125179633231472893939.jpg', 0, 0, ''),
(227, 2, NULL, 1472894277, 0, 3, 'Aisha Beauty Parlour', '3 cooper Road , Kisementi, kampala', 18, '0414344366', '0414254526', '', '', NULL, '', '', 0, 0, ''),
(228, 2, NULL, 1472894361, 0, 3, 'Khoobsurat Indian Beauty Salon', '304 Equitorial Hotel, Bombo Road', 18, '+256712786606', '', '', '', NULL, '', '', 0, 0, ''),
(229, 2, NULL, 1472894723, 0, 3, 'Mira’s Salon', 'Kabira Country Club, Bukoto ', 18, '+256774047200', '0312227222', '', '', NULL, 'uploads/6709125179633231472894723.jpg', 'uploads/banner6709125179633231472894723.jpg', 0, 0, 'Mira''Salon is the place for amazing hairstyles. Unisex hair styling salon with add-ons like massage, manicure, pedicure, facial treatments, body waxing and much more.'),
(230, 2, NULL, 1472894911, 0, 3, 'Oasis Health Spa ', '45 Luthuli Avenue, Bugolobi', 18, '+256782952305', '0414223602', '', '', NULL, '', '', 0, 0, ''),
(231, 2, NULL, 1472895089, 0, 3, 'Scissor sage unisex Hair & Beauty Salon', 'Tank hill parade, Muyega, kampala', 18, '+256526457414', '', '', '', NULL, '', '', 0, 0, 'above Italian Supermarket'),
(232, 2, NULL, 1472895433, 0, 3, 'Sparkles Salon Garden City ', 'Garden City Shopping Mall, P.O.Box 29452, Kampala, Uganda', 18, '', '+256200906413', 'care@sparklessalon.com', 'www.sparklessalon.com', NULL, 'uploads/6709125179633231472895433.jpg', 'uploads/banner6709125179633231472895433.jpg', 0, 0, 'Sparkles Salon is a unisex establishment with exceptional services across its sites and locations.'),
(233, 2, NULL, 1472895724, 0, 3, 'Sparkles Salon Acacia Mall  ', 'Acacia Mall, Ave, Kampala, Uganda', 18, '', '+256200906417', 'care@sparklessalon.com', ' http://www.sparklessalon.com', NULL, 'uploads/6709125179633231472895724.jpg', 'uploads/banner6709125179633231472895724.jpg', 0, 0, 'Sparkles Salon is a unisex establishment with exceptional services across its sites and locations.'),
(234, 2, NULL, 1472896020, 0, 3, 'sparkles Salon Forest Mall ', 'Forest Mall, Lugogo By-Pass', 18, '', '+256200906415', 'care@sparklessalon.com', 'http://www.sparklessalon.com', NULL, 'uploads/6709125179633231472896020.jpg', 'uploads/banner6709125179633231472896020.jpg', 0, 0, 'Sparkles Salon is a unisex establishment with exceptional services across its sites and locations.'),
(235, 2, NULL, 1472896253, 0, 3, 'sparkles Salon Oasis Mall', 'Oasis  Mall, Yusuf Lule Road, Kampala, Uganda', 18, '', '+256200906414 ', 'care@sparklessalon.com', 'http://www.sparklessalon.com', NULL, 'uploads/6709125179633231472896253.jpg', 'uploads/banner6709125179633231472896253.jpg', 0, 0, 'Sparkles Salon is a unisex establishment with exceptional services across its sites and locations.'),
(236, 2, NULL, 1472896540, 0, 3, 'sparkles Salon Lugogo Mall', 'Lugogo Mall, Lugogo By-Pass Road', 18, '', '+256200906412', 'care@sparklessalon.com', 'http://www.sparklessalon.com', NULL, 'uploads/6709125179633231472896540.jpg', 'uploads/banner6709125179633231472896540.jpg', 0, 0, 'Sparkles Salon is a unisex establishment with exceptional services across its sites and locations.'),
(237, 2, NULL, 1473453940, 0, 3, 'Hotel International Muyenga ', 'Plot 3209 Tank Hill Road Muyenga, P.O. Box 37625', 18, '+256794998080', '+256414510204', 'hotelinternational2000ltd@gmai', 'www.hotelinternational2000.co.', NULL, 'uploads/2268181040819121473453940.jpeg', 'uploads/banner2268181040819121473453940.jpg', 0, 0, ''),
(238, 2, NULL, 1474036477, 0, 3, 'City Royal kampala', 'Plot 8-10- Kataza Close 1, Opposite Shell Bugolobi', 18, '', '+256414258037', '', 'cityroyalkampala.com', NULL, 'uploads/4044150455512941474036477.jpg', 'uploads/banner4044150455512941474036477.jpg', 0, 0, ''),
(239, 2, NULL, 1474625836, 0, 3, 'Torino Restaurant and Bar', 'Plot 9B Park Lane Kololo, Kampala, Uganda', 18, '', '', '', '', NULL, 'uploads/3401113745413751474625836.jpg', 'uploads/banner3401113745413751474625836.jpg', 0, 0, 'TORINO is an exquisite bar and restaurant located in Kololo serving authentic Eritrean/ Ethiopian food and continental dishes '),
(240, 0, NULL, 1474880850, 0, 3, 'Design Modulus Architects', 'Kampala uganda', 18, '256779448309', NULL, NULL, '  ', NULL, NULL, 'uploads/img0on1474880850.jpg', 0, 0, NULL),
(241, 0, NULL, 1474880876, 0, 3, 'Design Modulus Architects', 'Kampala uganda', 18, '256779448309', NULL, NULL, '  ', NULL, NULL, 'uploads/img0on1474880876.jpg', 0, 0, NULL),
(242, 2, NULL, 1475052117, 0, 3, 'Cassia Lodge ', 'Plot 15, Buziga, Buziga Rd, Kampala, Uganda', 18, '', '+256755777002', '', 'http://www.cassialodge.com', NULL, 'uploads/2717165843782461478678747.jpg', 'uploads/banner2717165843782461478678747.jpg', 0, 0, 'Cassia Lodge is located on Buziga Hill, one of the highest hills of Kampala,\r\nclose to Lake Victoria. The environment is cool with few mosquitoes and\r\nan astonishing view of the lake as well as the city.\r\n\r\nWe offer excellent international cuisine in a serene environment.\r\nIn addition, we have conference facilities, a business centre,\r\nwireless Internet connection, a large swimming pool and\r\n20 luxurious rooms with satelite television, bar and balcony overlooking the lake.'),
(243, 2, NULL, 1476200363, 0, 3, '3D Cinema Magic', 'Naalya Spine Road Plot 2112, Block 220', 18, '+256392176093', '+256414240090', 'cinemamagic@metroplexmall.com', 'www.metroplexmall.com', NULL, 'uploads/2717165843782461478677189.png', 'uploads/banner2717165843782461478677189.jpg', 0, 0, 'CINEMA MAGIC: Uganda''s 1st BIGGEST 3D Cinema located at Metroplex Shopping Mall Naalya'),
(244, 2, NULL, 1478334308, 0, 3, 'Century Cinemax Acacia Mall', 'Acacia Mall, Kisementi, Kololo', 18, '', '+256414660415', 'satish.guna@gmail.com', 'www.centurycinemaxea.com/ugand', NULL, 'uploads/2717165843782461478678960.jpg', 'uploads/banner2717165843782461478678960.jpg', 0, 0, 'An all 3D Cinema located on Acacia Mall, Kisementi, Kololo that boasts multiple screens & the latest in HD Surround Sound');

-- --------------------------------------------------------

--
-- Table structure for table `business_category`
--

CREATE TABLE IF NOT EXISTS `business_category` (
  `id` int(30) NOT NULL,
  `sub_category_id` int(30) NOT NULL,
  `business_id` int(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=535 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_category`
--

INSERT INTO `business_category` (`id`, `sub_category_id`, `business_id`) VALUES
(1, 357, 2),
(2, 357, 2),
(3, 511, 2),
(4, 379, 3),
(5, 356, 4),
(6, 346, 4),
(7, 511, 5),
(8, 200, 5),
(9, 124, 5),
(15, 259, 8),
(16, 258, 8),
(17, 259, 9),
(18, 259, 10),
(19, 19, 10),
(20, 561, 10),
(21, 259, 11),
(22, 256, 12),
(23, 281, 13),
(24, 162, 13),
(25, 158, 13),
(26, 590, 14),
(27, 567, 14),
(28, 590, 15),
(29, 275, 15),
(30, 567, 15),
(31, 590, 16),
(32, 590, 17),
(33, 343, 17),
(34, 567, 17),
(35, 590, 18),
(36, 567, 18),
(37, 254, 19),
(38, 254, 20),
(39, 254, 21),
(40, 254, 22),
(41, 252, 22),
(42, 19, 22),
(43, 279, 23),
(44, 342, 23),
(45, 254, 24),
(46, 591, 25),
(47, 119, 26),
(48, 591, 26),
(49, 591, 27),
(50, 119, 27),
(51, 591, 28),
(53, 17, 30),
(54, 566, 30),
(55, 17, 30),
(56, 566, 30),
(57, 17, 31),
(58, 16, 31),
(59, 566, 31),
(60, 17, 32),
(61, 566, 32),
(62, 18, 32),
(65, 17, 35),
(66, 566, 35),
(67, 36, 36),
(68, 566, 36),
(69, 36, 37),
(70, 154, 37),
(71, 17, 38),
(72, 566, 38),
(73, 15, 39),
(74, 566, 39),
(75, 18, 40),
(76, 16, 40),
(77, 16, 41),
(85, 17, 47),
(86, 566, 47),
(87, 158, 48),
(88, 25, 48),
(89, 22, 49),
(90, 27, 50),
(91, 17, 51),
(92, 566, 51),
(93, 22, 52),
(94, 27, 53),
(95, 27, 54),
(98, 158, 55),
(102, 600, 58),
(103, 35, 59),
(104, 603, 60),
(105, 27, 60),
(106, 158, 61),
(107, 561, 62),
(109, 22, 64),
(110, 22, 65),
(111, 22, 66),
(112, 27, 67),
(113, 158, 68),
(114, 254, 68),
(115, 158, 69),
(116, 27, 70),
(117, 596, 70),
(118, 158, 71),
(120, 27, 72),
(121, 27, 73),
(122, 596, 57),
(123, 27, 74),
(124, 35, 75),
(125, 158, 76),
(126, 40, 77),
(127, 17, 77),
(128, 43, 78),
(129, 36, 78),
(130, 35, 78),
(131, 27, 79),
(132, 158, 80),
(133, 22, 81),
(134, 158, 81),
(135, 154, 81),
(136, 158, 82),
(137, 35, 83),
(138, 17, 84),
(139, 36, 84),
(140, 50, 84),
(141, 17, 84),
(142, 36, 84),
(143, 50, 84),
(144, 158, 85),
(145, 44, 86),
(146, 566, 86),
(147, 35, 87),
(148, 158, 88),
(150, 600, 90),
(151, 35, 90),
(152, 46, 90),
(153, 158, 91),
(154, 17, 92),
(155, 158, 93),
(160, 158, 95),
(161, 158, 96),
(162, 420, 96),
(163, 388, 96),
(173, 158, 98),
(180, 17, 97),
(181, 566, 97),
(182, 36, 97),
(189, 259, 7),
(190, 258, 7),
(191, 43, 99),
(195, 594, 101),
(196, 27, 101),
(197, 600, 101),
(198, 36, 102),
(199, 36, 103),
(200, 47, 103),
(203, 566, 104),
(204, 19, 104),
(205, 27, 105),
(208, 19, 107),
(209, 566, 107),
(210, 19, 108),
(211, 566, 108),
(212, 43, 100),
(213, 36, 100),
(214, 35, 100),
(215, 27, 109),
(216, 154, 109),
(217, 22, 110),
(218, 27, 111),
(219, 19, 112),
(220, 597, 112),
(221, 27, 113),
(222, 386, 113),
(223, 19, 114),
(224, 17, 115),
(225, 18, 115),
(226, 49, 115),
(227, 600, 116),
(228, 27, 116),
(229, 597, 116),
(230, 600, 117),
(231, 27, 117),
(232, 594, 117),
(233, 27, 118),
(234, 566, 118),
(235, 597, 119),
(237, 590, 120),
(238, 345, 121),
(239, 345, 122),
(240, 351, 122),
(241, 353, 122),
(242, 345, 123),
(244, 345, 125),
(245, 345, 124),
(246, 345, 126),
(247, 204, 127),
(248, 345, 128),
(249, 345, 129),
(276, 345, 142),
(280, 345, 134),
(281, 347, 134),
(282, 345, 132),
(283, 353, 132),
(284, 345, 131),
(285, 351, 131),
(286, 353, 131),
(287, 345, 137),
(288, 353, 137),
(289, 347, 137),
(290, 345, 141),
(291, 345, 138),
(292, 345, 135),
(293, 346, 135),
(294, 345, 136),
(295, 349, 136),
(296, 345, 139),
(297, 351, 139),
(298, 345, 140),
(299, 345, 143),
(300, 345, 144),
(301, 345, 145),
(302, 345, 146),
(303, 345, 147),
(304, 345, 133),
(305, 351, 133),
(306, 348, 133),
(307, 345, 148),
(308, 345, 149),
(309, 345, 150),
(310, 345, 151),
(311, 345, 152),
(313, 345, 153),
(314, 345, 154),
(315, 345, 155),
(316, 345, 156),
(317, 345, 157),
(318, 353, 157),
(319, 158, 158),
(321, 345, 160),
(322, 345, 161),
(323, 158, 159),
(324, 158, 162),
(325, 345, 163),
(327, 345, 165),
(328, 345, 166),
(329, 345, 167),
(330, 345, 168),
(331, 345, 169),
(332, 353, 169),
(333, 158, 170),
(334, 345, 171),
(335, 351, 171),
(337, 158, 173),
(338, 17, 173),
(339, 345, 174),
(340, 345, 175),
(343, 158, 177),
(344, 606, 177),
(345, 594, 177),
(349, 158, 164),
(350, 594, 164),
(351, 430, 164),
(355, 158, 178),
(356, 594, 178),
(357, 403, 179),
(358, 158, 179),
(359, 502, 180),
(360, 466, 180),
(361, 467, 181),
(362, 466, 182),
(363, 502, 182),
(364, 466, 183),
(365, 502, 183),
(366, 466, 184),
(367, 502, 184),
(368, 455, 185),
(369, 467, 185),
(371, 502, 186),
(372, 91, 186),
(373, 502, 187),
(374, 91, 187),
(375, 91, 188),
(376, 91, 189),
(377, 91, 190),
(379, 16, 29),
(380, 603, 29),
(381, 16, 33),
(382, 603, 33),
(383, 27, 34),
(386, 15, 42),
(387, 597, 42),
(388, 16, 44),
(389, 566, 44),
(390, 597, 44),
(391, 562, 45),
(392, 597, 45),
(393, 600, 45),
(394, 580, 46),
(395, 27, 46),
(396, 598, 63),
(397, 594, 63),
(398, 442, 192),
(399, 434, 192),
(400, 442, 193),
(401, 434, 193),
(402, 158, 194),
(403, 354, 194),
(404, 158, 195),
(405, 597, 196),
(412, 517, 197),
(413, 230, 197),
(417, 158, 94),
(418, 162, 94),
(419, 591, 176),
(420, 573, 89),
(421, 573, 172),
(422, 193, 43),
(423, 158, 198),
(424, 158, 199),
(425, 158, 200),
(426, 158, 201),
(427, 16, 202),
(428, 47, 202),
(432, 254, 203),
(433, 524, 204),
(434, 494, 204),
(435, 201, 204),
(439, 608, 205),
(440, 479, 206),
(441, 605, 207),
(442, 603, 207),
(443, 597, 207),
(444, 467, 208),
(445, 474, 208),
(446, 517, 209),
(447, 513, 209),
(448, 306, 210),
(449, 168, 211),
(451, 388, 212),
(456, 467, 213),
(457, 87, 213),
(458, 466, 214),
(459, 87, 214),
(460, 474, 215),
(461, 467, 216),
(462, 455, 217),
(463, 455, 218),
(464, 455, 219),
(466, 610, 220),
(467, 610, 221),
(468, 610, 222),
(469, 547, 223),
(470, 554, 223),
(471, 545, 223),
(472, 545, 224),
(473, 541, 225),
(474, 545, 225),
(475, 541, 226),
(476, 545, 227),
(477, 545, 228),
(478, 545, 229),
(479, 560, 229),
(480, 548, 229),
(481, 541, 230),
(482, 545, 230),
(483, 545, 231),
(484, 545, 232),
(485, 550, 232),
(486, 539, 232),
(487, 545, 233),
(488, 539, 233),
(489, 550, 233),
(490, 539, 234),
(491, 545, 234),
(492, 547, 234),
(496, 545, 235),
(497, 550, 235),
(498, 542, 235),
(499, 545, 236),
(500, 539, 236),
(501, 550, 236),
(503, 158, 237),
(504, 154, 237),
(505, 345, 130),
(506, 158, 238),
(507, 31, 106),
(508, 600, 106),
(509, 26, 239),
(510, 597, 239),
(511, 27, 239),
(512, 207, 240),
(513, 194, 240),
(514, 140, 240),
(515, 207, 241),
(516, 194, 241),
(517, 140, 241),
(521, 596, 56),
(525, 433, 243),
(526, 158, 242),
(527, 27, 242),
(528, 420, 242),
(529, 433, 244),
(531, 214, 191),
(532, 263, 6),
(533, 279, 6),
(534, 303, 6);

-- --------------------------------------------------------

--
-- Table structure for table `business_favorite`
--

CREATE TABLE IF NOT EXISTS `business_favorite` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `business_id` int(30) NOT NULL,
  `date_created` int(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='users who follow a business will be notified when things happens to the business';

--
-- Dumping data for table `business_favorite`
--

INSERT INTO `business_favorite` (`id`, `user_id`, `business_id`, `date_created`) VALUES
(1, 20, 197, 1471777632),
(2, 4, 211, 1474549910),
(3, 5, 242, 1475052270),
(4, 5, 243, 1476949932);

-- --------------------------------------------------------

--
-- Table structure for table `business_folder`
--

CREATE TABLE IF NOT EXISTS `business_folder` (
  `id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `folder_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_folder`
--

INSERT INTO `business_folder` (`id`, `business_id`, `folder_name`) VALUES
(1, 75, 'DIFRA'),
(2, 29, 'Afric'),
(3, 35, 'Afri'),
(4, 209, 'Mumbejja'),
(5, 70, 'Community'),
(6, 204, 'nomis'),
(7, 63, 'KISU'),
(8, 85, 'Makerere'),
(9, 43, 'New ad yammzit');

-- --------------------------------------------------------

--
-- Table structure for table `business_follower`
--

CREATE TABLE IF NOT EXISTS `business_follower` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `business_id` int(30) NOT NULL,
  `date_created` int(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1 COMMENT='users who follow a business will be notified when things happens to the business';

--
-- Dumping data for table `business_follower`
--

INSERT INTO `business_follower` (`id`, `user_id`, `business_id`, `date_created`) VALUES
(1, 3, 6, 1471198137),
(2, 4, 8, 1471243570),
(3, 4, 15, 1471259453),
(4, 4, 96, 1471276823),
(5, 4, 97, 1471277434),
(6, 5, 43, 1471290501),
(7, 4, 120, 1471290696),
(8, 4, 127, 1471338806),
(18, 4, 191, 1471446251),
(19, 5, 6, 1471447418),
(20, 19, 197, 1471777013),
(21, 20, 197, 1471777608),
(22, 21, 6, 1471864779),
(23, 5, 106, 1471984357),
(24, 4, 106, 1472032474),
(25, 4, 202, 1472130318),
(26, 8, 6, 1472140395),
(27, 8, 7, 1472140397),
(28, 8, 8, 1472140398),
(29, 11, 6, 1472162337),
(30, 4, 15, 1472192818),
(31, 4, 203, 1472193529),
(32, 33, 204, 1472199353),
(33, 35, 6, 1472380106),
(34, 36, 6, 1472392904),
(35, 36, 206, 1472393216),
(36, 36, 207, 1472393835),
(37, 5, 208, 1472505236),
(38, 4, 208, 1472527458),
(39, 4, 209, 1472626551),
(40, 4, 210, 1472659018),
(41, 5, 212, 1472822427),
(42, 28, 6, 1473319119),
(43, 28, 7, 1473319145),
(44, 28, 8, 1473319148),
(45, 42, 32, 1473356336),
(46, 4, 51, 1474292267),
(47, 50, 7, 1474811445),
(48, 0, 240, 1474880850),
(49, 0, 241, 1474880876),
(50, 4, 211, 1474921615),
(51, 50, 211, 1475130283),
(52, 4, 243, 1476200363),
(53, 43, -211, 1476541921),
(54, 0, 2147483647, 1476938564),
(55, 5, 243, 1476949971),
(56, 61, 43, 1477132270),
(57, 19, 2147483647, 1477836343),
(58, 4, 242, 1477906014),
(59, 72, 244, 1478344088),
(60, 5, 244, 1478344752);

-- --------------------------------------------------------

--
-- Table structure for table `business_message`
--

CREATE TABLE IF NOT EXISTS `business_message` (
  `id` int(30) NOT NULL,
  `business_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `details` text NOT NULL,
  `date_created` int(60) NOT NULL,
  `status` int(3) NOT NULL,
  `is_from_user` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `business_photo`
--

CREATE TABLE IF NOT EXISTS `business_photo` (
  `id` int(30) NOT NULL,
  `business_id` int(30) NOT NULL,
  `user_id` int(30) DEFAULT NULL,
  `photo` text NOT NULL,
  `date_created` int(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_photo`
--

INSERT INTO `business_photo` (`id`, `business_id`, `user_id`, `photo`, `date_created`) VALUES
(1, 43, 5, 'uploads/img5on1471447749.jpg', 1471447749),
(2, 106, 5, 'uploads/img5on1471984133.jpg', 1471984133),
(3, 202, 4, 'uploads/img4on1472132927.jpg', 1472132927),
(4, 33, 4, 'uploads/img4on1472141871.jpg', 1472141871),
(5, 6, 5, 'uploads/img5on1472154698.jpg', 1472154698),
(6, 203, 4, 'uploads/img4on1472193825.jpg', 1472193825),
(7, 241, 7, 'uploads/Design Modulus Architects1478511970.png', 1478511970);

-- --------------------------------------------------------

--
-- Table structure for table `call_to_action`
--

CREATE TABLE IF NOT EXISTS `call_to_action` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `call_to_action`
--

INSERT INTO `call_to_action` (`id`, `name`) VALUES
(1, 'Shop Now'),
(2, 'Book Now'),
(3, 'Call'),
(4, 'Message'),
(5, 'Rate'),
(6, 'Review'),
(7, 'Visit Website'),
(8, 'Install Now');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `icon`, `description`) VALUES
(7, 'Restaurant', 'meal2', ' '),
(8, 'Automotive', 'car82', ' '),
(9, 'Shopping', 'marker20', ' '),
(10, 'Beauty', 'hair73', ' '),
(11, 'Education', 'college1', ' '),
(12, 'Event Planning & Services', 'carnival48', ' '),
(13, 'Mass Media', 'tv41', ' '),
(14, 'Manufacturing', 'factory6', ' '),
(15, 'Home Services', 'home168', ' '),
(16, 'Hotels & Travel', 'pass3', ' '),
(17, 'Professional Services', 'businessman254', ' '),
(18, 'Art & Entertainment', 'quaver11', ' '),
(19, 'Health & Medical', 'medical109', ' '),
(20, 'Financials Services', 'coins15', ' '),
(21, 'Real Estate', 'rent4', ' '),
(22, 'Local Services', 'call37', ' '),
(23, 'Active Life', 'silhouette66', ' '),
(24, 'Food', 'hot51', ' '),
(25, 'Night Life', 'beer', '');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `country_id` int(30) NOT NULL,
  `other` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1074 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `country_id`, `other`) VALUES
(18, 'Kampala', 3, ''),
(19, 'Mbarara', 3, ' '),
(20, 'Mbale', 3, ' '),
(21, 'Jinjia', 3, ' '),
(22, 'Gulu', 3, ' '),
(23, 'Entebbe', 3, ' '),
(25, 'Masaka', 3, 'ok'),
(26, 'Kasese', 3, ' '),
(27, 'Kabale', 3, ' '),
(28, 'Mukono Town', 3, ' '),
(29, 'Fort Portal', 3, ' '),
(30, 'Kisoro', 3, ' '),
(31, 'Nairobi', 4, ' '),
(32, 'Garissa', 4, ' '),
(33, 'Kabarnet', 4, ' '),
(34, 'Kisumu', 4, ' '),
(35, 'Lamu', 4, ' '),
(36, 'Lodwar', 4, ' '),
(37, 'Malindi', 4, ' '),
(38, 'Mombasa', 4, ' '),
(39, 'Nakuru', 4, ' '),
(40, 'Kigali', 5, ' '),
(41, 'Byumba', 5, ' '),
(42, 'Gisenyi', 5, ' '),
(43, 'Gitarama', 5, ' '),
(44, 'Huye', 5, ' '),
(45, 'Kibungo', 5, ' '),
(46, 'Kibuye', 5, ' '),
(47, 'Kibuye', 5, ' '),
(48, 'Dar es Salaam', 6, ' '),
(49, 'Arusha', 6, ' '),
(50, 'Dodoma', 6, ' '),
(51, 'Geita', 6, ' '),
(52, 'Iringa', 6, ' '),
(53, 'Kagera', 6, ' '),
(54, 'Katavi', 6, ' '),
(55, 'Kigoma', 6, ' '),
(56, 'Kilimanjaro', 6, ' '),
(57, 'Lindi', 6, ' '),
(58, 'Mara', 6, ' '),
(59, 'Mbeya', 6, ' '),
(60, 'Moshi', 6, ' '),
(61, 'Morogoro', 6, ' '),
(62, 'Mwanza', 6, ' '),
(63, 'Mtwara', 6, ' '),
(64, 'Njombe', 6, ' '),
(65, 'Pwani', 6, ' '),
(66, 'Rukwa', 6, ' '),
(67, 'Ruvuma', 6, ' '),
(68, 'Simiyu', 6, ' '),
(69, 'Singida', 6, ' '),
(70, 'Songea', 6, ' '),
(71, 'Tabora', 6, ' '),
(72, 'Tanga', 6, ' '),
(73, 'Addis Ababa', 7, ' '),
(74, 'Adama', 7, ' '),
(75, 'Aksum', 7, ' '),
(76, 'Bahir Dar', 7, ' '),
(77, 'Dire Dawa', 7, ' '),
(78, 'Gondar', 7, ' '),
(79, 'Harar', 7, ' '),
(80, 'Lalibela', 7, ' '),
(81, 'Mekele', 7, ' '),
(82, 'Hawassa', 7, ' '),
(83, 'Jimma', 7, ' '),
(84, 'Asmara', 8, ' '),
(85, 'Keren', 8, ' '),
(86, 'Massawa', 8, ' '),
(87, 'Tessenei', 8, ' '),
(88, 'Assab', 8, ' '),
(89, 'Djibouti', 9, ' '),
(90, 'Ali Sabieh', 9, ' '),
(91, 'Balho', 9, ' '),
(92, 'Dikhil', 9, ' '),
(93, 'Khor Angar', 9, ' '),
(94, 'Obock', 9, ' '),
(95, 'Tadjoura', 9, ' '),
(96, 'Yoboki', 9, ' '),
(97, 'Bujumbura', 10, ' '),
(98, 'Bururi', 10, ' '),
(99, 'Cibitoke', 10, ' '),
(100, 'Geitega', 10, ' '),
(101, 'Muyinga', 10, ' '),
(102, 'Ngozi', 10, ' '),
(103, 'Johannesburg (Gauteng)', 11, ''),
(104, 'Pretoria (Gauteng)', 11, ''),
(105, 'Vereeniging', 11, ' '),
(106, 'Krugersdorp (Gauteng)', 11, ''),
(107, 'Carltonville (Gauteng)', 11, ''),
(108, 'Cape Town (Western Cape)', 11, ''),
(109, 'Stellenbosch (Western Cape)', 11, ''),
(110, 'Paarl (Western Cape)', 11, ''),
(111, 'George (Western Cape)', 11, ''),
(112, 'Knysna (Western Cape)', 11, ''),
(113, 'Mossel Bay (Western Cape)', 11, ''),
(114, 'Oudtshoorn (Western Cape)', 11, ''),
(115, 'Plerrenberg Bay (Western Cape)', 11, ''),
(116, 'Bhisho (Eastern Cape)', 11, ''),
(117, 'Port Elizabeth (Eastern Cape)', 11, ''),
(118, 'East London (Eastern Cape)', 11, ''),
(119, 'Grahamstown (Eastern Cape)', 11, ''),
(120, 'Mthatha (Eastern Cape)', 11, ''),
(121, 'Graaff-Reinet (Eastern Cape)', 11, ''),
(122, 'Kimberley (Northern Cape)', 11, ''),
(123, 'Upington (Northern Cape)', 11, ''),
(124, 'Kuruman (Northern Cape)', 11, ''),
(125, 'Springbok (Northern Cape)', 11, ''),
(126, 'Colesberg (Northern Cape)', 11, ''),
(127, 'Orania (Northern Cape)', 11, ''),
(128, 'Bloemfontein', 11, ' '),
(129, 'Harrismith', 11, ' '),
(130, 'Parys', 11, ' '),
(131, 'Vredefort', 11, ' '),
(132, 'Ladybrand', 11, ' '),
(133, 'Clarens', 11, ' '),
(134, 'Durban', 11, ' '),
(135, 'Dundee', 11, ' '),
(136, 'Eshowe', 11, ' '),
(137, 'Pietermaritzburg', 11, ' '),
(138, 'Howick', 11, ' '),
(139, 'Bloemhof', 11, ' '),
(140, 'Heartheespoort', 11, ' '),
(141, 'Klerksdrop', 11, ' '),
(142, 'Mafikeng', 11, ' '),
(143, 'Potchefstroom', 11, ' '),
(144, 'Rustenburg', 11, ' '),
(145, 'Vryburg', 11, ' '),
(146, 'Zeerust', 11, ' '),
(147, 'Nelspruit', 11, ' '),
(148, 'Barberton', 11, ' '),
(149, 'Sabie', 11, ' '),
(150, 'Witbank', 11, ' '),
(151, 'Hazyview', 11, ' '),
(152, 'Lydenburg', 11, ' '),
(153, 'Belfast', 11, ' '),
(154, 'Dullstroom', 11, ' '),
(155, 'Graskop', 11, ' '),
(156, 'Malalane', 11, ' '),
(157, 'Komatipoort', 11, ' '),
(158, 'Kaapsehoop', 11, ' '),
(159, 'Schoemanskloof', 11, ' '),
(160, 'Polokwane', 11, ' '),
(161, 'Bela-Bela', 11, ' '),
(162, 'Giyani', 11, ' '),
(163, 'Haenertsburg', 11, ' '),
(164, 'Hoedspruit', 11, ' '),
(165, 'Lephalale', 11, ' '),
(166, 'Makhado', 11, ' '),
(167, 'Modimolle', 11, ' '),
(168, 'Mokopane', 11, ' '),
(169, 'Musina', 11, ' '),
(170, 'Northam', 11, ' '),
(171, 'Phalaborwa', 11, ' '),
(172, 'Thabazimbi', 11, ' '),
(173, 'Thohoyandou', 11, ' '),
(174, 'Tzaneen', 11, ' '),
(175, 'Vaalwater', 11, ' '),
(176, 'Binga', 12, ' '),
(177, 'Bulawayo', 12, ' '),
(178, 'Victoria Falls', 12, ' '),
(179, 'Chirundu', 12, ' '),
(180, 'Kariba', 12, ' '),
(181, 'Harare', 12, ' '),
(182, 'Chinhoyi', 12, ' '),
(183, 'Marondera', 12, ' '),
(184, 'Mutare', 12, ' '),
(185, 'Rusape', 12, ' '),
(186, 'Gweru', 12, ' '),
(187, 'Kwekwe', 12, ' '),
(188, 'Masvingo', 12, ' '),
(189, 'Windhoek', 13, ' '),
(190, 'Keetmanshoop', 13, ' '),
(191, 'Luderitz', 13, ' '),
(192, 'Ondangwa', 13, ' '),
(193, 'Outjo', 13, ' '),
(194, 'Swakapmund', 13, ' '),
(195, 'Tsumkwe', 13, ' '),
(196, 'Wallis Bay', 13, ' '),
(197, 'Warmquelle', 13, ' '),
(198, 'Maputo', 14, ' '),
(199, 'Maputo', 14, ' '),
(200, 'Beira', 14, ' '),
(201, 'Vilanculos', 14, ' '),
(202, 'Inhambane', 14, ' '),
(203, 'Nampula', 14, ' '),
(204, 'Lilongwe', 15, ' '),
(205, 'Blantyre', 15, ' '),
(206, 'Limbe', 15, ' '),
(207, 'Mzuzu', 15, ' '),
(208, 'Karonga', 15, ' '),
(209, 'Mangochi', 15, ' '),
(210, 'Monkey Bay', 15, ' '),
(211, 'Nkhata Bay', 15, ' '),
(212, 'Nkhotakota', 15, ' '),
(213, 'Zomba', 15, ' '),
(214, 'Gaborone', 16, ' '),
(215, 'Francistown', 16, ' '),
(216, 'Ghanzi', 16, ' '),
(217, 'Kasane', 16, ' '),
(218, 'Maun', 16, ' '),
(219, 'Nata', 16, ' '),
(220, 'Gweta', 16, ' '),
(221, 'Kanye', 16, ' '),
(222, 'Tsabong', 16, ' '),
(223, 'Maseru', 17, ' '),
(224, 'Hlotse', 17, ' '),
(225, 'Mafeteng', 17, ' '),
(226, 'Maputsoe', 17, ' '),
(227, 'Mohale’s Hoek', 17, ' '),
(228, 'Mokhotlong', 17, ' '),
(229, 'Qacha’s Nek', 17, ' '),
(230, 'Quthing', 17, ' '),
(231, 'Teyateyaneng ( TY )', 17, ' '),
(232, 'Thaba-Tseka', 17, ' '),
(233, 'Mbabane', 18, ' '),
(234, 'Lobamba', 18, ' '),
(235, 'Manzini', 18, ' '),
(236, 'Big Bend', 18, ' '),
(237, 'Lusaka', 19, ' '),
(238, 'Chingola', 19, ' '),
(239, 'Chipata', 19, ' '),
(240, 'Kabwe', 19, ' '),
(241, 'Kasama', 19, ' '),
(242, 'Kitwe', 19, ' '),
(243, 'Livingstone', 19, ' '),
(244, 'Mufulira', 19, ' '),
(245, 'Ndola', 19, ' '),
(246, 'Luanda', 20, ' '),
(247, 'Benguela', 20, ' '),
(248, 'Huambo', 20, ' '),
(249, 'Lobito', 20, ' '),
(250, 'Lubango', 20, ' '),
(251, 'Namibe', 20, ' '),
(252, 'Kuito', 20, ' '),
(253, 'Menonugue', 20, ' '),
(255, 'Yaounde', 21, 'French speaking'),
(256, 'Bamenda', 21, 'English speaking'),
(257, 'Buea', 21, 'English speaking'),
(258, 'Douala', 21, 'French speaking'),
(259, 'Ebolowa', 21, 'French speaking'),
(260, 'Garoua', 21, 'French speaking'),
(261, 'Kribi', 21, 'French speaking'),
(262, 'Limbe', 21, 'English Speaking'),
(263, 'Ngaoundere', 21, 'French speaking'),
(264, 'Bangui', 22, ' '),
(265, 'Bambari', 22, ' '),
(266, 'Bangassou', 22, ' '),
(267, 'Birao', 22, ' '),
(268, 'Bossangoa', 22, ' '),
(269, 'Bouar', 22, ' '),
(270, 'Bria', 22, ' '),
(271, 'Mbaiki', 22, ' '),
(272, 'Nola', 22, ' '),
(273, 'Sibut', 22, ' '),
(274, 'Kinshasa', 23, ' '),
(275, 'Bukavu', 23, ' '),
(276, 'Goma', 23, ' '),
(277, 'Kananga', 23, ' '),
(278, 'Kisangani', 23, ' '),
(279, 'Kidu', 23, ' '),
(280, 'Lubumbashi', 23, ' '),
(281, 'Matadi', 23, ' '),
(282, 'Mbandaka', 23, ' '),
(283, 'Malabo', 24, ' '),
(284, 'Acalayong', 24, ' '),
(285, 'Bata', 24, ' '),
(286, 'Ebebiyin', 24, ' '),
(287, 'Evinayong', 24, ' '),
(288, 'Luba', 24, ' '),
(289, 'Mbini', 24, ' '),
(290, 'Mongomo', 24, ' '),
(291, 'Libreville', 25, ' '),
(292, 'Cap Lopez', 25, ' '),
(293, 'Franceville', 25, ' '),
(294, 'Gamba', 25, ' '),
(295, 'Kango', 25, ' '),
(296, 'Lambarene', 25, ' '),
(297, 'Mayumba', 25, ' '),
(298, 'Owendo', 25, ' '),
(299, 'Port-Gentil', 25, ' '),
(300, 'Brazzaville', 26, ' '),
(301, 'Abala-Ndolo', 26, ' '),
(302, 'Djambala', 26, ' '),
(303, 'Dolisie', 26, ' '),
(304, 'Kayes (Congo)', 26, ' '),
(305, 'Kinkala', 26, ' '),
(306, 'Madingo-Kayes', 26, ' '),
(307, 'Mossendjo', 26, ' '),
(308, 'Ouesso', 26, ' '),
(309, 'Owando', 26, ' '),
(310, 'Pointe Noire', 26, ' '),
(311, 'Sao Tome', 27, 'Capital city and largest city in the country'),
(312, 'Santo Antonio', 27, 'The capital of Principle Island'),
(313, 'Juba', 28, ' '),
(314, 'Aweil', 28, ' '),
(315, 'Bentiu', 28, ' '),
(316, 'Bor', 28, ' '),
(317, 'Malakal', 28, ' '),
(318, 'Yei', 28, ' '),
(319, 'Rumbek', 28, ' '),
(320, 'Torit', 28, ' '),
(321, 'Yambio', 28, ' '),
(322, 'Porto-Novo', 29, ' '),
(323, 'Abomey', 29, ' '),
(324, 'Cotonou', 29, ' '),
(325, 'Grand Pop', 29, ' '),
(326, 'Ketou', 29, ' '),
(327, 'Parakou', 29, ' '),
(328, 'Malanville', 29, ' '),
(329, 'Natitingou', 29, ' '),
(330, 'Tanguieta', 29, ' '),
(331, 'Ouagadougou', 30, ' '),
(332, 'Banfora', 30, ' '),
(333, 'Bobo-Dioulasso', 30, ' '),
(334, 'Dedougou', 30, ' '),
(335, 'Gaoua', 30, ' '),
(336, 'Koudougou', 30, ' '),
(337, 'Ouahigouya', 30, ' '),
(338, 'Paria', 31, ' '),
(339, 'Mindelo', 31, ' '),
(340, 'Cidade Velha', 31, ' '),
(341, 'Espargos', 31, ' '),
(342, 'Assomanda', 31, ' '),
(343, 'Santa Maria', 31, ' '),
(344, 'Sao Filipe', 31, ' '),
(345, 'Abidjan', 32, ' '),
(346, 'Korhogo', 32, ' '),
(347, 'Aboisso', 32, ' '),
(348, 'Bouake', 32, ' '),
(349, 'Dabou', 32, ' '),
(350, 'San Pedro', 32, ' '),
(351, 'Yamoussoukro', 32, ' '),
(352, 'Grand-Bassam', 32, ' '),
(353, 'Man', 32, ' '),
(363, 'Accra', 34, ' '),
(364, 'Bolgatanga', 34, ' '),
(365, 'Cape Coast', 34, ' '),
(366, 'Elmina', 34, ' '),
(367, 'Koforidua', 34, ' '),
(368, 'Kumasi', 34, ' '),
(369, 'Obuasi', 34, ' '),
(370, 'Sekondi-Takoradi', 34, ' '),
(371, 'Tamale', 34, ' '),
(372, 'Conakry', 35, ' '),
(373, 'Kankan', 35, ' '),
(374, 'Beyla', 35, ' '),
(375, 'Kindia', 35, ' '),
(376, 'Forecariah', 35, ' '),
(377, 'Labe', 35, ' '),
(378, 'Bake’ / kamsar', 35, ' '),
(379, 'Mamou', 35, ' '),
(380, 'Faranha', 35, ' '),
(381, 'Kissidougou', 35, ' '),
(382, 'N’zerekore', 35, ' '),
(383, 'Lola', 35, ' '),
(384, 'Gueckekedou', 35, ' '),
(385, 'Dalaba', 35, ' '),
(386, 'Dabola', 35, ' '),
(387, 'Banjul', 33, ' '),
(388, 'Bansang', 33, ' '),
(389, 'Bakau', 33, ' '),
(390, 'Brikama', 33, ' '),
(391, 'Gunjur', 33, ' '),
(392, 'Janjanbureh', 33, ' '),
(393, 'Lamin', 33, ' '),
(394, 'Serrakunda', 33, ' '),
(395, 'Tanji', 33, ' '),
(396, 'Bissau', 36, ' '),
(397, 'Bafata', 36, ' '),
(398, 'Bissora', 36, ' '),
(399, 'Bolama', 36, ' '),
(400, 'Buba', 36, ' '),
(401, 'Bubaque', 36, ' '),
(402, 'Cacheu', 36, ' '),
(403, 'Catio', 36, ' '),
(404, 'Farim', 36, ' '),
(405, 'Gabu', 36, ' '),
(406, 'Monrovia', 37, ' '),
(407, 'Greenville', 37, ' '),
(408, 'Harper', 37, ' '),
(409, 'Paynesville', 37, ' '),
(410, 'Buchanan', 37, ' '),
(411, 'Abuja', 38, ' '),
(412, 'Benin City', 38, ' '),
(413, 'Calabar', 38, ' '),
(414, 'Ibadan', 38, ' '),
(415, 'Jos', 38, ' '),
(416, 'Kano', 38, ' '),
(417, 'lagos', 38, ' '),
(418, 'Osogbo', 38, ' '),
(419, 'Owerri', 38, ' '),
(420, 'Port Harcourt', 38, ' '),
(421, 'Warri', 38, ' '),
(422, 'Enugu', 38, ' '),
(423, 'Uyo', 38, ' '),
(424, 'Makurdi', 38, ' '),
(425, 'Dakar', 39, ' '),
(426, 'Saint-Louis', 39, ' '),
(427, 'Thies', 39, ' '),
(428, 'Kaolack', 39, ' '),
(429, 'Ziguinchor', 39, ' '),
(430, 'Tambacounda', 39, ' '),
(431, 'Touba', 39, ' '),
(432, 'Kafountine', 39, ' '),
(433, 'Kedougou', 39, ' '),
(434, 'Freetown', 40, ' '),
(435, 'Bo', 40, ' '),
(436, 'Bonthe', 40, ' '),
(437, 'Kabala', 40, ' '),
(438, 'Kenema', 40, ' '),
(439, 'Koidu', 40, ' '),
(440, 'Makeni', 40, ' '),
(441, 'Maguraka', 40, ' '),
(442, 'Lome', 41, ' '),
(443, 'Atakpame', 41, ' '),
(444, 'Kpalime', 41, ' '),
(445, 'Badou', 41, ' '),
(446, 'Aneho', 41, ' '),
(447, 'Kara', 41, ' '),
(448, 'Dapaong', 41, ' '),
(449, 'Sokode', 41, ' '),
(450, 'N’Djamena', 42, ' '),
(451, 'Moundou', 42, ' '),
(452, 'Abeche', 42, ' '),
(453, 'Faya', 42, ' '),
(454, 'Bamako', 43, ' '),
(455, 'Gao', 43, ' '),
(456, 'Kayes', 43, ' '),
(457, 'Kidal', 43, ' '),
(458, 'Mopti', 43, ' '),
(459, 'Segou', 43, ' '),
(460, 'Sikasso', 43, ' '),
(461, 'Timbuktu', 43, ' '),
(462, 'Nouakchott', 44, ' '),
(463, 'Atar', 44, ' '),
(464, 'Chinguetti', 44, ' '),
(465, 'Nouadhibou', 44, ' '),
(466, 'Tichit', 44, ' '),
(467, 'Niamey', 45, ' '),
(468, 'Agadez', 45, ' '),
(469, 'Ayorou', 45, ' '),
(470, 'Diffa', 45, ' '),
(471, 'Dosso', 45, ' '),
(472, 'Tahoua', 45, ' '),
(473, 'Zinder', 45, ' '),
(474, 'Khartoum', 46, ' '),
(475, 'Madani', 46, ' '),
(476, 'Al Ubayyid', 46, ' '),
(477, 'Gedaref', 46, ' '),
(478, 'Kassala', 46, ' '),
(479, 'Meroe', 46, ' '),
(480, 'Nyala', 46, ' '),
(481, 'Port Sudan', 46, ' '),
(482, 'Addamer', 46, ' '),
(483, 'Algiers', 47, ' '),
(484, 'Annaba', 47, ' '),
(485, 'Batna', 47, ' '),
(486, 'Bechar', 47, ' '),
(487, 'Constantine', 47, ' '),
(488, 'Oran', 47, ' '),
(489, 'Setif', 47, ' '),
(490, 'Tamanrasset', 47, ' '),
(491, 'Bejaia', 47, ' '),
(492, 'Ghardaia', 47, ' '),
(493, 'Tipaza', 47, ' '),
(494, 'Mostaganem', 47, ' '),
(495, 'Tlemcen', 47, ' '),
(496, 'Cairo', 48, ' '),
(497, 'Alexandria', 48, ' '),
(498, 'Port Said', 48, ' '),
(499, 'Aswan', 48, ' '),
(500, 'Luxor', 48, ' '),
(501, 'Hurghada', 48, ' '),
(502, 'Tripoli', 49, ' '),
(503, 'Benghazi', 49, ' '),
(504, 'Gharyan', 49, ' '),
(505, 'Ghadamis', 49, ' '),
(506, 'Misratah', 49, ' '),
(507, 'Sabha', 49, ' '),
(508, 'Shuhhat', 49, ' '),
(509, 'Surt', 49, ' '),
(510, 'Tobruk', 49, ' '),
(511, 'Darna', 49, ' '),
(512, 'Rabat', 50, ' '),
(513, 'Casablanca', 50, ' '),
(514, 'Fez', 50, ' '),
(515, 'Marrakech', 50, ' '),
(516, 'Meknes', 50, ' '),
(517, 'Ouarzazate', 50, ' '),
(518, 'Tangier', 50, ' '),
(519, 'Taroudannt', 50, ' '),
(520, 'Tetouan', 50, ' '),
(521, 'Al Hoceima', 50, ' '),
(522, 'Tunis', 51, ' '),
(523, 'Djerba', 51, ' '),
(524, 'Gabes', 51, ' '),
(525, 'Kairouan', 51, ' '),
(526, 'El Kef', 51, ' '),
(527, 'Monastir', 51, ' '),
(528, 'Sfax', 51, ' '),
(529, 'Sousse', 51, ' '),
(530, 'Tozeur', 51, ' '),
(531, 'El Aaiun', 52, ' '),
(532, 'Dakhla', 52, ' '),
(533, 'Smara', 52, ' '),
(534, 'Cape Bojador', 52, ' '),
(535, 'El Marsa', 52, ' '),
(536, 'Haouza', 52, ' '),
(537, 'Al Mahbass', 52, ' '),
(538, 'Guelta Zemmur', 52, ' '),
(539, 'Bir Anzarane', 52, ' '),
(540, 'Tichla', 52, ' '),
(541, 'Auserd', 52, ' '),
(542, 'El Aargub', 52, ' '),
(543, 'Bir Gandus', 52, ' '),
(544, 'Bou Craa', 52, ' '),
(545, 'Lemseid', 52, ' '),
(546, 'Bir Lehlou', 52, ' '),
(547, 'Tifariti', 52, ' '),
(548, 'Agwanit', 52, ' '),
(549, 'Zoug', 52, ' '),
(550, 'Meharrize', 52, ' '),
(551, 'Dougaj', 52, ' '),
(552, 'Lagouira (La Guera)', 52, ' '),
(553, 'Arua', 3, ' '),
(554, 'Karachi (Sindh)', 56, ''),
(555, 'Lahore (Punjab) ', 56, ''),
(556, 'Faisalabad (Punjab)', 56, ''),
(557, 'Rawalpindi (Punjab)', 56, ''),
(558, 'Multan (Punjab)', 56, ''),
(559, 'Hyderabad (Sindh)', 56, ''),
(560, 'Gujranwala (Punjab)', 56, ''),
(561, 'Peshawar (Khyber Pakhtunkhwa)', 56, ''),
(562, 'Quetta (Balochistan)', 56, ''),
(563, 'Muzaffarabad (Azad Kashmir)', 56, ''),
(564, 'Kota Bharu (Kelantan)', 97, ''),
(565, 'Kuala Lumpur', 97, ''),
(566, 'Klang (Selangor)', 97, ''),
(567, 'Kampung Baru Subang (Selangor)', 97, ''),
(568, 'Johor Bahru (Johor)', 97, ''),
(569, 'Subang Jaya (Selangor)', 97, ''),
(570, 'Ipoh (Perak)', 97, ''),
(571, 'Kuching (Sarawak)', 97, ''),
(572, 'Petaling Jaya (Selangor)', 97, ''),
(573, 'Shah Alam (Selangor)', 97, ''),
(574, 'Mumbai  (Maharashtra)', 58, ''),
(575, 'Delhi (NCT)', 58, ''),
(576, 'Bengaluru (Karnataka)', 58, ''),
(577, 'Kolkata (West Bengal)', 58, ''),
(578, 'Chennai (Tamil Nadu)', 58, ''),
(579, 'Ahmedabad (Gujarat)', 58, ''),
(580, 'Hyderabad (Telangana)', 58, ''),
(581, 'Pune (Maharashtra)', 58, ''),
(582, 'Surat (Gujarat)', 58, ''),
(583, 'Kanpur (Uttar Pradesh)', 58, ''),
(584, 'Dhaka', 69, ''),
(585, 'Chittagong ', 69, ''),
(586, 'Khulna', 69, ''),
(587, 'Rajshahi', 69, ''),
(588, 'Comilla (Chittagong)', 69, ''),
(589, 'Rangpur City ', 69, ''),
(590, 'Tongi (Dhaka)', 69, ''),
(591, 'Narsingdi (Dhaka)', 69, ''),
(592, 'Cox’s Bazar (Chittagong)', 69, ''),
(593, 'Jessore (Khulna)', 69, ''),
(594, 'Tirana  (Tiranë)', 98, ''),
(595, 'Durrës  ', 98, ''),
(596, 'Elbasan ', 98, ''),
(597, 'Vlorë', 98, ''),
(598, 'Shkodër', 98, ''),
(599, 'Fier-Çifçi (Fier)', 98, ''),
(600, 'Korçë', 98, ''),
(601, 'Fier', 98, ''),
(602, 'Berat', 98, ''),
(603, 'Lushnjë, (Fier)', 98, ''),
(604, 'Vienna (Capital)', 99, ''),
(605, 'Graz  (Styria)', 99, ''),
(606, 'Linz  (Upper Austria)', 99, ''),
(607, 'Salzburg ', 99, ''),
(608, 'Innsbruck  (Tyrol)', 99, ''),
(609, 'Klagenfurt  (Carinthia)', 99, ''),
(610, 'Villach  (Carinthia)', 99, ''),
(611, 'Wels  (Upper Austria)', 99, ''),
(612, 'St. Pölten  (Lower Austria)', 99, ''),
(613, 'Dornbirn  (Vorarlberg)', 99, ''),
(614, 'Babijn', 100, ''),
(615, 'Oranjestad', 100, ''),
(616, 'Angochi', 100, ''),
(617, 'Arasji', 100, ''),
(618, 'Mariehamn (Capital) ', 101, ''),
(619, 'Jomala (Ålands landsbygd)', 101, ''),
(620, 'Finström  (Ålands landsbygd)', 101, ''),
(621, 'Lemland (Ålands landsbygd)', 101, ''),
(622, 'Saltvik  (Ålands landsbygd)', 101, ''),
(623, 'Hammarland  (Ålands landsbygd)', 101, ''),
(624, 'Sund  (Ålands landsbygd)', 101, ''),
(625, 'Eckerö  (Ålands landsbygd)', 101, ''),
(626, 'Föglö  (Ålands skärgård)', 101, ''),
(627, 'Brändö  (Ålands skärgård)', 101, ''),
(628, 'Sarajevo (Capital) ', 102, ''),
(629, 'Banja Luka (Republika Srpska)', 102, ''),
(630, 'Zenica ', 102, 'Federation of Bosnia and Herzegovina'),
(631, 'Tuzla', 102, 'Federation of Bosnia and Herzegovina'),
(632, 'Mostar ', 102, 'Federation of Bosnia and Herzegovina'),
(633, 'Bugojno', 102, ''),
(634, 'Bijeljina (Republika Srpska)', 102, ''),
(635, 'Prijedor  (Republika Srpska)', 102, ''),
(636, 'Brcko', 102, ''),
(637, 'Brussels (Capital)', 103, ''),
(638, 'Antwerp  (Flanders)', 103, ''),
(639, 'Ghent  (Flanders)', 103, ''),
(640, 'Charleroi  (Wallonia)', 103, ''),
(641, 'Liège  (Wallonia)', 103, ''),
(642, 'Bruges  (Flanders)', 103, ''),
(643, 'Namur  (Wallonia)', 103, ''),
(644, 'Leuven, (Flanders)', 103, ''),
(645, 'Mons  (Wallonia	)', 103, ''),
(646, 'Aalst, (Flanders)', 103, ''),
(647, 'Sofia  (Capital)', 104, ''),
(648, 'Plovdiv', 104, ''),
(649, 'Varna', 104, ''),
(650, 'Burgas', 104, ''),
(651, 'Rousse  (Ruse)', 104, ''),
(652, 'Stara Zagora', 104, ''),
(653, 'Pleven', 104, ''),
(654, 'Sliven', 104, ''),
(655, 'Dobrich', 104, ''),
(656, 'Shumen', 104, ''),
(657, 'Minsk  (Capital)', 105, ''),
(658, 'Gomel', 105, ''),
(659, 'Mogilev ', 105, ''),
(660, 'Vitebsk', 105, ''),
(661, 'Hrodna, (Grodnenskaya	)', 105, ''),
(662, 'Brest', 105, ''),
(663, 'Babruysk  (Mogilev)', 105, ''),
(664, 'Baranovichi  (Brest)', 105, ''),
(665, 'Pinsk  (Brest)', 105, ''),
(666, 'Orsha  (Vitebsk)', 105, ''),
(667, 'Zurich', 106, ''),
(668, 'Geneva', 106, ''),
(669, 'Basel (Basel City)', 106, ''),
(670, 'Bern', 106, ''),
(671, 'Lausanne (Vaud)', 106, ''),
(672, 'Winterthur  (Zurich)', 106, ''),
(673, 'St. Gallen ', 106, ''),
(674, 'Lucerne', 106, ''),
(675, 'Zürich (Kreis 11)', 106, ''),
(676, 'Biel/Bienne  (Bern)', 106, ''),
(677, 'Dubai', 95, ''),
(678, 'Abu Dhabi  ', 95, ''),
(679, 'Sharjah  (Ash Shariqah)', 95, ''),
(680, 'Al Ain  (Abu Dhabi)', 95, ''),
(681, 'Ajman', 95, ''),
(682, 'Ras al-Khaimah', 95, ''),
(683, 'Fujairah (Al Fujayrah)', 95, ''),
(684, 'Umm al-Quwain  (Umm al Qaywayn)', 95, ''),
(685, 'Dibba Al-Fujairah  (Al Fujayrah)', 95, ''),
(686, 'Sanaa (Capital)', 107, ''),
(687, 'Al Hudaydah  (Muhafazat al Hudaydah)', 107, ''),
(688, 'Taizz', 107, ''),
(689, 'Aden', 107, ''),
(690, 'Al Mukalla  (Muhafazat Hadramawt)', 107, ''),
(691, 'Ibb', 107, ''),
(692, 'Dhamar', 107, ''),
(693, 'Amran  (Omran)', 107, ''),
(694, 'Sayyan  (Sanaa)', 107, ''),
(695, 'Zabid   (Muhafazat al Hudaydah)	', 107, ''),
(696, 'Almaty  (Almaty Qalasy)', 59, ''),
(697, 'Karagandy  (Qaraghandy)', 59, ''),
(698, 'Shymkent  (Ongtüstik Qazaqstan)', 59, ''),
(699, 'Taraz   (Zhambyl)', 59, ''),
(700, 'Astana  (Captial)  (Astana Qalasy)	', 59, ''),
(701, 'Pavlodar  ', 59, ''),
(702, 'Ust-Kamenogorsk  (East Kazakhstan)', 59, ''),
(703, 'Kyzylorda   (Qyzylorda)', 59, ''),
(704, 'Semey  (East Kazakhstan)', 59, ''),
(705, 'Bishkek  (Capital)', 60, ''),
(706, 'Osh City', 60, ''),
(707, 'Osh', 60, ''),
(708, 'Jalal-Abad', 60, ''),
(709, 'Karakol  (Ysyk-Kol)', 60, ''),
(710, 'Tokmok  (Chuy)', 60, ''),
(711, 'Kara-Balta  (Chuy)', 60, ''),
(712, 'Naryn', 60, ''),
(713, 'Uzgen  (Osh)', 60, ''),
(714, 'Balykchy  (Ysyk-Kol)', 60, ''),
(715, 'Dushanbe (Capital)', 61, ''),
(716, 'Khujand   (Viloyati Sughd)', 61, ''),
(717, 'Kulob (Khatlon)', 61, ''),
(718, 'Kurgan-Tyube  (Khatlon)', 61, ''),
(719, 'Istaravshan  (Viloyati Sughd)', 61, ''),
(720, 'Konibodom  (Viloyati Sughd)', 61, ''),
(721, 'Vahdat  (Republican Subordination)', 61, ''),
(722, 'Tursunzoda  (Republican Subordination)', 61, ''),
(723, 'Isfara   (Viloyati Sughd)', 61, ''),
(724, 'Panjakent  (Viloyati Sughd)', 61, ''),
(725, 'Ashgabat (Capital) (Ahal)', 62, ''),
(726, 'Turkmenabat  (Lebap)', 62, ''),
(727, 'Dashoguz', 62, ''),
(728, 'Mary', 62, ''),
(729, 'Balkanabat  (Balkan)', 62, ''),
(730, 'Bayramaly (Mary)', 62, ''),
(731, 'Turkmenbasy  (Balkan)', 62, ''),
(732, 'Tejen  (Ahal)', 62, ''),
(733, 'Abadan  (Ahal)', 62, ''),
(734, 'Yoloten  (Mary)', 62, ''),
(735, 'Tashkent  (Capital)', 63, ''),
(736, 'Namangan ', 63, ''),
(737, 'Samarkand  (Samarqand)', 63, ''),
(738, 'Andijan  (Andijon)', 63, ''),
(739, 'Bukhara ', 63, ''),
(740, 'Nukus   (Karakalpakstan)', 63, ''),
(741, 'Qarshi  (Qashqadaryo)', 63, ''),
(742, 'Kokand  (Fergana)', 63, ''),
(743, 'Chirchiq  (Toshkent)', 63, ''),
(744, 'Fergana  (Fergana)', 63, ''),
(745, 'Tokyo (Capital)', 65, ''),
(746, 'Yokohama  (Kanagawa)', 65, ''),
(747, 'Osaka', 65, ''),
(748, 'Nagoya  (Aichi)', 65, ''),
(749, 'Sapporo   (Hokkaido)', 65, ''),
(750, 'Kobe  (Hyogo)', 65, ''),
(751, 'Kyoto ', 65, ''),
(752, 'Fukuoka ', 65, ''),
(753, 'Kawasaki   (Kanagawa)', 65, ''),
(754, 'Saitama', 65, ''),
(755, 'Seoul (Capital)', 66, ''),
(756, 'Busan ', 66, ''),
(757, 'Incheon ', 66, ''),
(758, 'Daegu ', 66, ''),
(759, 'Quezon City  (Metro Manila)', 79, ''),
(760, 'Manila  (Capital)', 79, ''),
(761, 'Budta  (Muslim Mindanao)', 79, ''),
(762, 'Davao City  (Davao)', 79, ''),
(763, 'Malingao  (Soccsksargen)', 79, ''),
(764, 'Cebu City  (Central Visayas)', 79, ''),
(765, 'General Santos  (Soccsksargen)', 79, ''),
(766, 'Taguig  (Calabarzon)', 79, ''),
(767, 'Pasig   (Metro Manila)', 79, ''),
(768, 'Antipolo  (Calabarzon)', 79, ''),
(769, 'Singapore ', 80, ''),
(770, 'St. Johns (Capital)', 108, ''),
(771, 'All Saints   (Saint Peter)', 108, ''),
(772, 'Piggotts   (Saint George)', 108, ''),
(773, 'Liberta   (Saint Paul)', 108, ''),
(774, 'Bolands  (Saint Mary)', 108, ''),
(775, 'Potters Village  (Saint John)', 108, ''),
(776, 'Codrington  (Barbuda)', 108, ''),
(777, 'Parham  (Saint Peter)', 108, ''),
(778, 'Carlisle  (Saint George)', 108, ''),
(779, 'Cedar Grove  (Saint John)', 108, ''),
(780, 'Nassau (Capital)', 109, ''),
(781, 'Lucaya  (Freeport)', 109, ''),
(782, 'Freeport', 109, ''),
(783, 'West End  (West Grand Bahama)', 109, ''),
(784, 'Cooper’s Town  (North Abaco)', 109, ''),
(785, 'San Andros  (North Andros)', 109, ''),
(786, 'George Town  (Exuma)', 109, ''),
(787, 'Marsh Harbour  (Central Abaco)', 109, ''),
(788, 'High Rock  (East Grand Bahama)', 109, ''),
(789, 'Andros Town  (North Andros)', 109, ''),
(790, 'Bridgetown (Capital)', 110, ''),
(791, 'Speightstown  (Saint Peter)', 110, ''),
(792, 'Oistins  (Christ Church)', 110, ''),
(793, 'Bathsheba  (Saint Joseph)', 110, ''),
(794, 'Holetown  (Saint James)', 110, ''),
(795, 'Crane  (Saint Philip)', 110, ''),
(796, 'Crab Hill  (Saint Lucy)', 110, ''),
(797, 'Blackmans  (Saint Joseph)', 110, ''),
(798, 'Greenland  (Saint Andrew)', 110, ''),
(799, 'Hillaby  (Saint Andrew)', 110, ''),
(800, 'Roseau  (Capital)', 111, ''),
(801, 'Portsmouth   (Saint John)', 111, ''),
(802, 'Marigot  (Saint Andrew)', 111, ''),
(803, 'Berekua  (Saint Patrick)', 111, ''),
(804, 'Mahaut  (Saint Paul)', 111, ''),
(805, 'Saint Joseph  (Saint Joseph)', 111, ''),
(806, 'Wesley  (Saint Andrew)', 111, ''),
(807, 'Soufriere (Saint Mark)', 111, ''),
(808, 'Salisbury  (Saint Joseph)', 111, ''),
(809, 'Castle Bruce (Saint David)', 111, ''),
(810, 'St. Georges  (Capital)', 112, ''),
(811, 'Gouyave  (Saint John)', 112, ''),
(812, 'Grenville  (Saint Andrew)', 112, ''),
(813, 'Victoria  (Saint Mark)', 112, ''),
(814, 'Saint David’s  (Saint David)', 112, ''),
(815, 'Sauteurs   (Saint Patrick)', 112, ''),
(816, 'Hillsborough   (Carriacou)', 112, ''),
(817, 'Dublin  (Capital)', 113, ''),
(818, 'Cork  (Munster)', 113, ''),
(819, 'Dun Laoghaire   (Leinster)', 113, ''),
(820, 'Limerick  (Munster)', 113, ''),
(821, 'Galway  (Connaught)', 113, ''),
(822, 'Tallaght  (Leinster)', 113, ''),
(823, 'Waterford  (Munster)', 113, ''),
(824, 'Swords  (Leinster)', 113, ''),
(825, 'Drogheda  (Leinster)', 113, ''),
(826, 'Dundalk  (Leinster)', 113, ''),
(827, 'Birkirkara ', 114, ''),
(828, 'Qormi', 114, ''),
(829, 'Mosta  (Il-Mosta)', 114, ''),
(830, 'Zabbar   Haz-Zabbar', 114, ''),
(831, 'San Pawl il-Bahar  (Saint Pauls Bay	)', 114, ''),
(832, 'Saint John', 114, ''),
(833, 'Fgura  (Il-Fgura)', 114, ''),
(834, 'Zejtun  (Iz-Zejtun)', 114, ''),
(835, 'Sliema  (Tas-Sliema)', 114, ''),
(836, 'Haz-Zebbug   (Haz-Zebbug)', 114, ''),
(837, 'Toronto (Ontario)', 115, ''),
(838, 'Montreal   (Quebec)', 115, ''),
(839, 'Calgary  (Alberta)', 115, ''),
(840, 'Ottawa (Capital)', 115, ''),
(841, 'Edmonton  (Alberta)', 115, ''),
(842, 'Mississauga (Ontario)', 115, ''),
(843, 'North York (Ontario)', 115, ''),
(844, 'Winnipeg   (Manitoba)', 115, ''),
(845, 'Vancouver  (British Columbia)', 115, ''),
(846, 'Scarborough  (Ontario)', 115, ''),
(847, 'Jerusalem (Capital)', 87, ''),
(848, 'West Jerusalem   (Jerusalem)', 87, ''),
(849, 'Haifa', 87, ''),
(850, 'Tel Aviv ', 87, ''),
(851, 'Ashdod  (Southern District)', 87, ''),
(852, 'Rishon LeZion   (Central District)', 87, ''),
(853, 'Petah Tikva  (Central District)', 87, ''),
(854, 'Beersheba  (Southern District)', 87, ''),
(855, 'Netanya  (Central District)', 87, ''),
(856, 'Holon (Tel Aviv)', 87, ''),
(857, 'Sydney  (Capital)', 116, ''),
(858, 'Melbourne  (Victoria)', 116, ''),
(859, 'Brisbane (Queensland)', 116, ''),
(860, 'Colombo (Capital)', 73, ''),
(861, 'Perth  (Western Australia)', 116, ''),
(862, 'Adelaide  (South Australia)', 116, ''),
(863, 'Gold Coast (Queensland)', 116, ''),
(864, 'Dehiwala-Mount Lavinia, Western', 73, ''),
(865, 'Canberra ', 116, ''),
(866, 'Newcastle  (New South Wales)', 116, ''),
(867, 'Wollongong  (New South Wales)', 116, ''),
(868, 'Logan City   (Queensland)', 116, ''),
(869, 'Galkissa, Western', 73, ''),
(870, 'Auckland ', 117, ''),
(871, 'Wellington (Capital)', 117, ''),
(872, 'Christchurch  (Canterbury)', 117, ''),
(873, 'Manukau  (Auckland)', 117, ''),
(874, 'Waitakere  (Auckland)', 117, ''),
(875, 'North Shore  (Auckland)', 117, ''),
(876, 'Moratuwa (Western)', 73, ''),
(877, 'Hamilton  (Waikato)', 117, ''),
(878, 'Dunedin (Otago)', 117, ''),
(879, 'Jaffna, Northern Province', 73, ''),
(880, 'Tauranga  (Plenty Region)', 117, ''),
(881, 'Lower Hutt  (Wellington)', 117, ''),
(882, 'Negombo (Western)', 73, ''),
(883, 'Pita Kotte (Western)', 73, ''),
(884, 'Sri Jayewardenepura Kotte', 110, ''),
(885, 'Kandy', 73, ''),
(886, 'City of London', 119, ''),
(887, 'London (Capital)', 119, ''),
(888, 'Birmingham  (England)', 119, ''),
(889, 'Glasgow  (Scotland)', 119, ''),
(890, 'Liverpool  (England)', 119, ''),
(891, 'Leeds (England)', 119, ''),
(892, 'Sheffield  (England)', 119, ''),
(893, 'Edinburgh  (Scotland)', 119, ''),
(894, 'Bristol (England)', 119, ''),
(895, 'Manchester  (England)', 119, ''),
(896, 'New York (New York)', 118, ''),
(897, 'Los Angeles (California)', 118, ''),
(898, 'Chicago (Illinois)', 118, ''),
(899, 'Brooklyn (New York)', 118, ''),
(900, 'Borough of Queens (New York)', 118, ''),
(901, 'Houston (Texas)', 118, ''),
(902, 'Abilene	(Texas)', 118, ''),
(903, 'Albuquerque (New Mexico)', 118, ''),
(904, 'Philadelphia (Pennsylvania)', 118, ''),
(905, 'Manhattan (New York)', 118, ''),
(906, 'Phoenix (Arizona)', 118, ''),
(907, 'Bronx (New York)', 118, ''),
(908, 'Amarillo (Texas)', 118, ''),
(909, 'Bangkok (Bangkok)', 81, ''),
(910, 'Arlington  (Texas)', 118, ''),
(911, 'Austin  (Texas)', 118, ''),
(912, 'Mubangizi ', 110, ''),
(913, 'Beaumont  (Texas)', 118, ''),
(914, 'Brownsville	 (Texas)', 118, ''),
(915, 'Corpus Christi	(Texas)', 118, ''),
(916, 'Dallas  (Texas)', 118, ''),
(917, 'Mueang Samut Prakan (Samut Prakan)', 81, ''),
(918, 'El Paso	(Texas)', 118, ''),
(919, 'Fort Worth	(Texas)', 118, ''),
(920, 'Grand Prairie  (Texas)', 118, ''),
(922, 'Laredo	(Texas)', 118, ''),
(923, 'Lubbock (Texas)', 118, ''),
(924, 'Plano (Texas)', 118, ''),
(925, 'Port Arthur	(Texas)', 118, ''),
(926, 'San Antonio  (Texas)', 118, ''),
(927, 'Waco  (Texas)', 118, ''),
(928, 'Wichita Falls  (Texas)', 118, ''),
(929, 'Salt Lake City  (Utah)', 118, ''),
(930, 'Chesapeake  (Virginia)', 118, ''),
(931, 'Suffolk	(Virginia)', 118, ''),
(932, 'Virginia Beach  (Virginia)', 118, ''),
(933, 'Nonthaburi (Nonthaburi)', 118, ''),
(934, 'Seattle	(Washington)', 118, ''),
(935, 'Milwaukee	(Wisconsin)', 118, ''),
(936, 'Chattanooga  (Tennessee)', 118, ''),
(937, 'Udon (Changwat Udon Thani)', 81, ''),
(938, 'Clarksville	(Tennessee)', 118, ''),
(939, 'Knoxville  (Tennessee)', 118, ''),
(940, 'Chon Buri (Chon Buri)', 81, ''),
(941, 'Lynchburg	(Tennessee)', 118, ''),
(942, 'Nakhon Ratchasima', 81, ''),
(943, 'Chiangmai (Chiangmai)', 81, ''),
(944, 'Memphis  (Tennessee)', 118, ''),
(945, 'Hat Yai (Songkhla)', 81, ''),
(946, 'Nashville  (Tennessee)', 118, ''),
(947, 'Oak Ridge  (Tennessee)', 118, ''),
(948, 'Pak Kret (Nonthaburi)', 81, ''),
(949, 'Columbia	(South Carolina)', 118, ''),
(950, 'Si Racha (Chon Buri)', 81, ''),
(951, 'Charleston	(South Carolina)', 118, ''),
(952, 'St. Marys  (Pennsylvania)', 118, ''),
(954, 'Portland  (Oregon)', 118, ''),
(955, 'Tulsa  (Oklahoma)', 118, ''),
(956, 'Oklahoma City', 118, ''),
(957, 'Norman  (Oklahoma)', 118, ''),
(958, 'Lawton	(Oklahoma)', 118, ''),
(959, 'Enid  (Oklahoma)', 118, ''),
(960, 'El Reno	 (Oklahoma)', 118, ''),
(961, 'Edmond  (Oklahoma)', 118, ''),
(962, 'Toledo	(Ohio)', 118, ''),
(963, 'Columbus	(Ohio)', 118, ''),
(964, 'Cleveland	(Ohio)', 118, ''),
(965, 'Cincinnati	(Ohio)', 118, ''),
(966, 'Winston-Salem	(North Carolina)', 118, ''),
(967, 'Raleigh	 (North Carolina)', 118, ''),
(968, 'Greensboro	  (North Carolina)', 118, ''),
(969, 'Fayetteville	  (North Carolina)', 118, ''),
(970, 'Durham  (North Carolina)', 118, ''),
(971, 'Charlotte  (North Carolina)', 118, ''),
(972, 'Rome	(New York)', 118, ''),
(973, 'Rio Rancho	 (New Mexico)', 118, ''),
(974, 'Las Cruces	(New Mexico)', 118, ''),
(975, 'North Las Vegas  (Nevada)', 118, ''),
(976, 'Las Vegas	(Nevada)', 118, ''),
(977, 'Henderson	(Nevada)', 118, ''),
(978, 'Carson City   (Nevada)', 118, ''),
(979, 'Boulder City  (Nevada)', 118, ''),
(980, 'Omaha	(Nebraska)', 118, ''),
(981, 'Lincoln	(Nebraska)', 118, ''),
(982, 'Butte  (Montana)', 118, ''),
(983, 'Anaconda  (Montana)', 118, ''),
(984, 'Springfield	(Missouri)', 118, ''),
(985, 'Kansas City	 (Missouri)', 118, ''),
(986, 'Independence	(Missouri)', 118, ''),
(987, 'Jackson	  (Mississippi)', 118, ''),
(988, 'Hibbing	  (Minnesota)', 118, ''),
(989, 'Babbitt	(Minnesota)', 118, ''),
(990, 'Detroit	(Michigan)', 118, ''),
(991, 'Plymouth  (Massachusetts)', 118, ''),
(992, 'Baltimore	(Maryland)', 118, ''),
(993, 'Presque Isle  (Maine)', 118, ''),
(994, 'Ellsworth	(Maine)', 118, ''),
(995, 'Caribou	  (Maine)', 118, ''),
(996, 'Shreveport	(Louisiana)', 118, ''),
(997, 'New Orleans  (Louisiana)', 118, ''),
(998, 'Baton Rouge  (Louisiana)', 118, ''),
(999, 'Louisville  (Kentucky)', 118, ''),
(1000, 'Lexington (Kentucky)', 118, ''),
(1001, 'Wichita	 (Kansas)', 118, ''),
(1002, 'Kansas City', 118, ''),
(1003, 'Des Moines	 (Iowa)', 118, ''),
(1004, 'Indianapolis  (Indiana)', 118, ''),
(1005, 'Fort Wayne	(Indiana)', 118, ''),
(1007, 'Savannah	(Georgia)', 118, ''),
(1008, 'Preston	  (Georgia)', 118, ''),
(1009, 'Macon	(Georgia)', 118, ''),
(1010, 'Georgetown', 118, ''),
(1011, 'Cusseta  (Georgia)', 118, ''),
(1012, 'Columbus  (Georgia)', 118, ''),
(1013, 'Augusta  (Georgia)', 118, ''),
(1014, 'Atlanta	(Georgia)', 118, ''),
(1015, 'Athens	(Georgia)', 118, ''),
(1016, 'Tampa	(Florida)', 118, ''),
(1017, 'Tallahassee	  (Florida)', 118, ''),
(1018, 'Port St. Lucie  (Florida)', 118, ''),
(1019, 'Orlando  (Florida)', 118, ''),
(1020, 'North Port	(Florida)', 118, ''),
(1021, 'Jacksonville  (Florida)', 118, ''),
(1022, 'Cape Coral	(Florida)', 118, ''),
(1023, 'Bunnell	  (Florida)', 118, ''),
(1024, 'Denver	(Colorado)', 118, ''),
(1025, 'Colorado Springs  (Colorado)', 118, ''),
(1026, 'Aurora	(Colorado)', 118, ''),
(1027, 'Victorville (California)', 118, ''),
(1028, 'San Jose (California)', 118, ''),
(1029, 'San Diego (California)', 118, ''),
(1030, 'Sacramento (California)', 118, ''),
(1031, 'Riverside (California)', 118, ''),
(1032, 'Palmdale (California)', 118, ''),
(1033, 'Palm Springs (California)', 118, ''),
(1035, 'Lancaster (California)', 118, ''),
(1036, 'Fresno (California)', 118, ''),
(1037, 'Fremont (California)', 118, ''),
(1038, 'California City (California)', 118, ''),
(1039, 'Bakersfield	(California)', 118, ''),
(1040, 'Apple Valley	 (California)', 118, ''),
(1041, 'Little Rock (Arkansas)', 118, ''),
(1042, 'Jonesboro (Arkansas)', 118, ''),
(1043, 'Yuma (Arizona)', 118, ''),
(1044, 'Tucson	(Arizona)', 118, ''),
(1045, 'Surprise (Arizona)', 118, ''),
(1046, 'Sierra Vista	(Arizona)', 118, ''),
(1047, 'Scottsdale	(Arizona)', 118, ''),
(1048, 'Peoria	(Arizona)', 118, ''),
(1049, 'Mesa (Arizona)', 118, ''),
(1050, 'Marana	 (Arizona)', 118, ''),
(1051, 'Goodyear (Arizona)', 118, ''),
(1052, 'Eloy (Arizona)', 118, ''),
(1053, 'Buckeye (Arizona)', 118, ''),
(1054, 'Wrangell (Alaska)', 118, ''),
(1055, 'Valdez (Alaska)', 118, ''),
(1056, 'Unalaska (Alaska)', 118, ''),
(1057, 'Sitka (Alaska)', 118, ''),
(1058, 'Nightmute	(Alaska)', 118, ''),
(1059, 'Juneau	(Alaska)', 118, ''),
(1060, 'Anchorage	(Alaska)', 118, ''),
(1061, 'Montgomery (Alabama)', 118, ''),
(1062, 'Mobile	(Alabama)', 118, ''),
(1063, 'Huntsville	(Alabama)', 118, ''),
(1064, 'Dothan	(Alabama)', 118, ''),
(1065, 'Birmingham (Alabama)', 118, ''),
(1066, 'Victoria  (Capital)', 120, ''),
(1067, 'Anse Boileau (Anse Boileau)', 120, ''),
(1068, 'Bel Ombre (Bel Ombre)', 120, ''),
(1069, 'Beau Vallon', 120, ''),
(1070, 'Cascade', 120, ''),
(1071, 'Anse Royale', 120, ''),
(1072, 'Takamaka ', 120, ''),
(1073, 'Port Glaud ', 120, '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `review_id` int(30) NOT NULL,
  `kind` varchar(30) NOT NULL COMMENT 'normal iss for reviews, and event is for events',
  `details` text NOT NULL,
  `date_created` int(50) NOT NULL,
  `commenTo` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `review_id`, `kind`, `details`, `date_created`, `commenTo`) VALUES
(1, 5, 48, 'normal', 'Ooohhhh yeah and they got a few things for the mothers too.', 1471447484, 0),
(2, 21, 51, 'normal', 'Nice phito', 1471864589, 0),
(3, 21, 98, 'normal', 'This is a nice place with good customer care', 1471864851, 0),
(4, 4, 54, 'normal', 'my comment is fine', 1471868311, 0),
(5, 4, 51, 'normal', 'As in nice photo', 1471876192, 0),
(6, 4, 51, 'normal', 'As in nice photo', 1471876237, 0),
(7, 4, 51, 'normal', 'As in nice photo', 1471876490, 0),
(8, 4, 51, 'normal', 'As in nice photo', 1471876802, 0),
(9, 4, 51, 'normal', 'As in nice photo', 1471881440, 0),
(10, 4, 148, 'normal', 'I agree. The seats are very uncomfortable.', 1472141550, 0),
(11, 36, 196, 'normal', 'This where I go for good stuff', 1472393496, 0),
(12, 43, 544, 'normal', 'what a time to be alive', 2, 0),
(13, 43, 550, 'normal', 'what about comments', 4, 0),
(14, 25, 550, 'normal', 'what the fuck is going on', 6, 0),
(15, 43, 550, 'normal', 'commensssss', 8, 0),
(16, 43, 550, 'normal', 'what happened to the rest', 8, 0),
(17, 25, 550, 'normal', 'comment on this bitch', 12, 0),
(18, 25, 550, 'normal', 'where do the comments go bro', 12, 0),
(19, 25, 551, 'normal', 'what of the comments', 0, 0),
(20, 40, 555, 'normal', 'trying to like this comment on stevens post', 1, 0),
(21, 43, 555, 'normal', 'yep comments dont show', 1, 0),
(22, 43, 555, 'normal', 'what the fuck, what happened to my name', 1, 0),
(23, 25, 555, 'normal', 'does it show a name', 2, 0),
(24, 40, 555, 'normal', 'name', 7, 0),
(25, 25, 555, 'normal', 'crak', 11, 0),
(26, 25, 555, 'normal', 'no nmae', 11, 0),
(27, 40, 555, 'normal', 'what the fucl', 10, 0),
(28, 40, 555, 'normal', 'what the fucl', 10, 0),
(29, 40, 555, 'normal', 'what the fucl', 10, 0),
(30, 40, 555, 'normal', 'what the fucl', 10, 0),
(31, 40, 555, 'normal', 'what the fucl', 10, 0),
(32, 43, 559, 'normal', 'coment 2222', 0, 0),
(33, 43, 559, 'normal', 'commmnet', 17, 0),
(34, 43, 559, 'normal', 'jjjsjdjsd', 17, 0),
(35, 43, 559, 'normal', 'hi', 15, 0),
(36, 5, 246, 'normal', 'Welcome to yammzit T.K', 1472849577, 0),
(37, 43, 574, 'normal', 'this should show 1 comment', 1, 0),
(38, 4, 257, 'normal', 'Don''t rob the bank Abra', 1473145679, 0),
(39, 5, 269, 'normal', 'We did tell management about what hsppened. He did apologiz and gave me and ice cream but we still had to pay for the food', 1473457968, 0),
(40, 5, 269, 'normal', 'They really need to improve on the customer care ASAP', 1473458109, 0),
(41, 4, 269, 'normal', 'That''s a terrible experience...', 1473668472, 0),
(42, 4, 133, 'normal', 'Dude this business is great. I like their food', 1474551333, 0),
(43, 4, 131, 'normal', 'Dude La Patisserie is a very nice place. You should bring your girlfriend out here for dinner sometime.', 1474551880, 0),
(44, 5, 296, 'normal', 'Hello Kevin, you should try the Veg rice with cheese and it''s not expensive at all. Only 18,000/= Ugshs', 1474719784, 0),
(45, 5, 317, 'normal', 'Welcome to Yammzit Alex.', 1474983899, 0);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `other` varchar(50) DEFAULT NULL,
  `flag` varchar(60) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `code`, `other`, `flag`) VALUES
(3, 'Uganda', '256', ' ', 'uploads/ug.png'),
(4, 'Kenya', '+254', ' ', 'uploads/ke.png'),
(5, 'Rwanda', '+250', ' ', 'uploads/rw.png'),
(6, 'Tanzania', '+255', ' ', 'uploads/tz.png'),
(7, 'Ethiopia', '+251', ' ', 'uploads/et.png'),
(8, 'Eritrea', '+291', ' ', 'uploads/er.png'),
(9, 'Djibouti', '+253', ' ', 'uploads/dj.png'),
(10, 'Burundi', '+257', ' ', 'uploads/bi.png'),
(11, 'South Africa', '+27', ' ', 'uploads/za.png'),
(12, 'Zimbabwe', '+263', ' ', 'uploads/zw.png'),
(13, 'Namibia', '+264', ' ', 'uploads/na.png'),
(14, 'Mozambique', '+258', ' ', 'uploads/mz.png'),
(15, 'Malawi', '+265', ' ', 'uploads/mw.png'),
(16, 'Botswana', '+267', ' ', 'uploads/bw.png'),
(17, 'Lesotho', '+266', ' ', 'uploads/ls.png'),
(18, 'Swaziland', '+268', ' ', 'uploads/sz.png'),
(19, 'Zambia', '+255', ' ', 'uploads/zm.png'),
(20, 'Angola', '+244', ' ', 'uploads/ao.png'),
(21, 'Cameroon', '+237', ' ', 'uploads/cm.png'),
(22, 'Central African Republic', '+236', ' ', 'uploads/cf.png'),
(23, 'Democratic Republic of Congo', '+1 809, +1', ' ', 'uploads/cd.png'),
(24, 'Equatorial Guinea', '+240', ' ', 'uploads/gq.png'),
(25, 'Gabon', '+241', ' ', 'uploads/ga.png'),
(26, 'Republic of the Congo', '+242', ' ', 'uploads/cg.png'),
(27, 'Sao Tome and Principe', '+239', ' ', 'uploads/st.png'),
(28, 'South Sudan', '+211', ' ', 'uploads/Flag_of_South_Sudan.svg.png'),
(29, 'Benin', '+229', ' ', 'uploads/bj.png'),
(30, 'Burkina Faso', '+226', ' ', 'uploads/bf.png'),
(31, 'Cape Verde', '+238', ' ', 'uploads/cv.png'),
(32, 'Ivory Coast  { Cote D’Ivoire }', '+225', ' ', 'uploads/ci.png'),
(33, 'Gambia', '+220', ' ', 'uploads/gm.png'),
(34, 'Ghana', '+233', ' ', 'uploads/gh.png'),
(35, 'Guinea', '+224', ' ', 'uploads/gn.png'),
(36, 'Guinea-Bissau', '+245', ' ', 'uploads/gw.png'),
(37, 'Liberia', '+231', ' ', 'uploads/lr.png'),
(38, 'Nigeria', '+234', ' ', 'uploads/ng.png'),
(39, 'Senegal', '+221', ' ', 'uploads/sn.png'),
(40, 'Sierra Leone', '+232', ' ', 'uploads/sl.png'),
(41, 'Togo', '+228', ' ', 'uploads/tg.png'),
(42, 'Chad', '+235', ' ', 'uploads/ro.png'),
(43, 'Mali', '+223', ' ', 'uploads/ml.png'),
(44, 'Mauritania', '+222', ' ', 'uploads/mr.png'),
(45, 'Niger', '+227', ' ', 'uploads/ne.png'),
(46, 'Sudan', '+249', ' ', 'uploads/sd.png'),
(47, 'Algeria', '+213', ' ', 'uploads/dz.png'),
(48, 'Egypt', '+20', ' ', 'uploads/eg.png'),
(49, 'Libya', '+218', ' ', 'uploads/ly.png'),
(50, 'Morocco', '+212', ' ', 'uploads/ma.png'),
(51, 'Tunisia', '+216', ' ', 'uploads/tn.png'),
(52, 'Western Sahara', '+212', ' ', 'uploads/eh.png'),
(56, 'Pakistan', '+92', '', 'uploads/pk.png'),
(58, 'India ', '+91 ', '', 'uploads/in.png'),
(59, 'Kazakhstan', '+7 ', '', 'uploads/kz.png'),
(60, 'Kyrgyzstan', '+996', '', 'uploads/kg.png'),
(61, 'Tajikistan', '+992', '', 'uploads/tj.png'),
(62, 'Turkmenistan', '+993', '', 'uploads/tm.png'),
(63, 'Uzbekistan', '+998', '', 'uploads/uz.png'),
(64, 'China', '+86', '', 'uploads/cn.png'),
(65, 'Japan', '+81', '', 'uploads/jp.png'),
(66, 'South Korea', '+82', '', 'uploads/kr.png'),
(67, 'Mongolia', '+976', '', 'uploads/mn.png'),
(68, 'Afghanistan', '+93', '', 'uploads/af.png'),
(69, 'Bangladesh', '+880', '', 'uploads/bd.png'),
(70, 'Bhutan', '+975', '', 'uploads/bt.png'),
(71, 'Maldives', '+960', '', 'uploads/mv.png'),
(72, ' Nepal', '+977', '', 'uploads/np.png'),
(73, 'Sri Lanka', '+94', '', 'uploads/lk.png'),
(74, 'Brunei', '+673', '', 'uploads/bn.png'),
(75, 'Myanmar', '+95', '', 'uploads/imgres.png'),
(76, 'Cambodia', '+855', '', 'uploads/kh.png'),
(77, 'Indonesia', '+62', '', 'uploads/id.png'),
(78, 'Laos', '+856', '', 'uploads/la.png'),
(79, 'Philippines', '+63', '', 'uploads/ph.png'),
(80, 'Singapore', '+65', '', 'uploads/sg.png'),
(81, 'Thailand', '+66', '', 'uploads/th.png'),
(82, 'Timor-Leste', '+670', '', 'uploads/tl.png'),
(83, 'Vietnam', '+84', '', 'uploads/vn.png'),
(84, 'Bahrain', '+973', '', 'uploads/bh.png'),
(85, 'Iran', '+98', '', 'uploads/ir.png'),
(86, 'Iraq', '+964', '', 'uploads/iq.png'),
(87, 'Israel', '+972', '', 'uploads/il.png'),
(88, 'Jordan', '+962', '', 'uploads/jo.png'),
(89, 'Kuwait', '+965', '', 'uploads/kw.png'),
(90, 'Lebanon', '+961', '', 'uploads/lb.png'),
(91, 'Oman', '+968', '', 'uploads/om.png'),
(92, 'Qatar', '+974', '', 'uploads/qa.png'),
(93, 'Saudi Arabia', '+966', '', 'uploads/sa.png'),
(94, 'Syria', '+963', '', 'uploads/sy.png'),
(95, 'United Arab Emirates', '+971', '', 'uploads/ae.png'),
(97, 'Malaysia', '+60', '', 'uploads/my.png'),
(98, 'Albania', '+355', '', 'uploads/al.png'),
(99, 'Austria', '+43', '', 'uploads/at.png'),
(100, 'Aruba', '+297', '', 'uploads/url.png'),
(101, 'Åland', '+358', '', 'uploads/url-1.png'),
(102, 'Bosnia and Herzegovina', '+387', '', 'uploads/ba.png'),
(103, 'Belgium', '+32', '', 'uploads/be.png'),
(104, 'Bulgaria', '+359', '', 'uploads/bg.png'),
(105, 'Belarus ', '+375', '', 'uploads/by.png'),
(106, 'Switzerland', '+41', '', 'uploads/ch.png'),
(107, 'Yemen', '+967', '', 'uploads/ye.png'),
(108, 'Antigua and Barbuda', '+1', '', 'uploads/ag.png'),
(109, 'Bahamas', '+1', '', 'uploads/bs.png'),
(110, ' Barbados', '+1', '', 'uploads/bb.png'),
(111, 'Dominica', '+1 ', '', 'uploads/dm.png'),
(112, 'Grenada', '+1', '', 'uploads/gd.png'),
(113, 'Ireland', '+353', '', 'uploads/ie.png'),
(114, 'Malta', '+356', '', 'uploads/mt.png'),
(115, 'Canada', '+1 ', '', 'uploads/ca.png'),
(116, 'Australia', '+61', '', 'uploads/au.png'),
(117, 'New Zealand', '+64', '', 'uploads/nz.png'),
(118, 'United States of America', '+1', '', 'uploads/us.png'),
(119, 'United Kingdom ', '+44', '', 'uploads/gb.png'),
(120, 'Seychelles ', '+248', '', 'uploads/sc.png');

-- --------------------------------------------------------

--
-- Table structure for table `country_code`
--

CREATE TABLE IF NOT EXISTS `country_code` (
  `id` int(11) NOT NULL,
  `code` varchar(2) DEFAULT NULL,
  `name` varchar(44) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=255 DEFAULT CHARSET=utf8 COMMENT='contains all countries and their codes for getting timezones';

--
-- Dumping data for table `country_code`
--

INSERT INTO `country_code` (`id`, `code`, `name`) VALUES
(1, 'A1', 'Anonymous Proxy'),
(2, 'A2', 'Satellite Provider'),
(3, 'O1', 'Other Country'),
(4, 'AD', 'Andorra'),
(5, 'AE', 'United Arab Emirates'),
(6, 'AF', 'Afghanistan'),
(7, 'AG', 'Antigua and Barbuda'),
(8, 'AI', 'Anguilla'),
(9, 'AL', 'Albania'),
(10, 'AM', 'Armenia'),
(11, 'AO', 'Angola'),
(12, 'AP', 'Asia/Pacific Region'),
(13, 'AQ', 'Antarctica'),
(14, 'AR', 'Argentina'),
(15, 'AS', 'American Samoa'),
(16, 'AT', 'Austria'),
(17, 'AU', 'Australia'),
(18, 'AW', 'Aruba'),
(19, 'AX', 'Aland Islands'),
(20, 'AZ', 'Azerbaijan'),
(21, 'BA', 'Bosnia and Herzegovina'),
(22, 'BB', 'Barbados'),
(23, 'BD', 'Bangladesh'),
(24, 'BE', 'Belgium'),
(25, 'BF', 'Burkina Faso'),
(26, 'BG', 'Bulgaria'),
(27, 'BH', 'Bahrain'),
(28, 'BI', 'Burundi'),
(29, 'BJ', 'Benin'),
(30, 'BL', 'Saint Bartelemey'),
(31, 'BM', 'Bermuda'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BO', 'Bolivia'),
(34, 'BQ', 'Bonaire, Saint Eustatius and Saba'),
(35, 'BR', 'Brazil'),
(36, 'BS', 'Bahamas'),
(37, 'BT', 'Bhutan'),
(38, 'BV', 'Bouvet Island'),
(39, 'BW', 'Botswana'),
(40, 'BY', 'Belarus'),
(41, 'BZ', 'Belize'),
(42, 'CA', 'Canada'),
(43, 'CC', 'Cocos (Keeling) Islands'),
(44, 'CD', 'Congo, The Democratic Republic of the'),
(45, 'CF', 'Central African Republic'),
(46, 'CG', 'Congo'),
(47, 'CH', 'Switzerland'),
(48, 'CI', 'Cote d''Ivoire'),
(49, 'CK', 'Cook Islands'),
(50, 'CL', 'Chile'),
(51, 'CM', 'Cameroon'),
(52, 'CN', 'China'),
(53, 'CO', 'Colombia'),
(54, 'CR', 'Costa Rica'),
(55, 'CU', 'Cuba'),
(56, 'CV', 'Cape Verde'),
(57, 'CW', 'Curacao'),
(58, 'CX', 'Christmas Island'),
(59, 'CY', 'Cyprus'),
(60, 'CZ', 'Czech Republic'),
(61, 'DE', 'Germany'),
(62, 'DJ', 'Djibouti'),
(63, 'DK', 'Denmark'),
(64, 'DM', 'Dominica'),
(65, 'DO', 'Dominican Republic'),
(66, 'DZ', 'Algeria'),
(67, 'EC', 'Ecuador'),
(68, 'EE', 'Estonia'),
(69, 'EG', 'Egypt'),
(70, 'EH', 'Western Sahara'),
(71, 'ER', 'Eritrea'),
(72, 'ES', 'Spain'),
(73, 'ET', 'Ethiopia'),
(74, 'EU', 'Europe'),
(75, 'FI', 'Finland'),
(76, 'FJ', 'Fiji'),
(77, 'FK', 'Falkland Islands (Malvinas)'),
(78, 'FM', 'Micronesia, Federated States of'),
(79, 'FO', 'Faroe Islands'),
(80, 'FR', 'France'),
(81, 'GA', 'Gabon'),
(82, 'GB', 'United Kingdom'),
(83, 'GD', 'Grenada'),
(84, 'GE', 'Georgia'),
(85, 'GF', 'French Guiana'),
(86, 'GG', 'Guernsey'),
(87, 'GH', 'Ghana'),
(88, 'GI', 'Gibraltar'),
(89, 'GL', 'Greenland'),
(90, 'GM', 'Gambia'),
(91, 'GN', 'Guinea'),
(92, 'GP', 'Guadeloupe'),
(93, 'GQ', 'Equatorial Guinea'),
(94, 'GR', 'Greece'),
(95, 'GS', 'South Georgia and the South Sandwich Islands'),
(96, 'GT', 'Guatemala'),
(97, 'GU', 'Guam'),
(98, 'GW', 'Guinea-Bissau'),
(99, 'GY', 'Guyana'),
(100, 'HK', 'Hong Kong'),
(101, 'HM', 'Heard Island and McDonald Islands'),
(102, 'HN', 'Honduras'),
(103, 'HR', 'Croatia'),
(104, 'HT', 'Haiti'),
(105, 'HU', 'Hungary'),
(106, 'ID', 'Indonesia'),
(107, 'IE', 'Ireland'),
(108, 'IL', 'Israel'),
(109, 'IM', 'Isle of Man'),
(110, 'IN', 'India'),
(111, 'IO', 'British Indian Ocean Territory'),
(112, 'IQ', 'Iraq'),
(113, 'IR', 'Iran, Islamic Republic of'),
(114, 'IS', 'Iceland'),
(115, 'IT', 'Italy'),
(116, 'JE', 'Jersey'),
(117, 'JM', 'Jamaica'),
(118, 'JO', 'Jordan'),
(119, 'JP', 'Japan'),
(120, 'KE', 'Kenya'),
(121, 'KG', 'Kyrgyzstan'),
(122, 'KH', 'Cambodia'),
(123, 'KI', 'Kiribati'),
(124, 'KM', 'Comoros'),
(125, 'KN', 'Saint Kitts and Nevis'),
(126, 'KP', 'Korea, Democratic People''s Republic of'),
(127, 'KR', 'Korea, Republic of'),
(128, 'KW', 'Kuwait'),
(129, 'KY', 'Cayman Islands'),
(130, 'KZ', 'Kazakhstan'),
(131, 'LA', 'Lao People''s Democratic Republic'),
(132, 'LB', 'Lebanon'),
(133, 'LC', 'Saint Lucia'),
(134, 'LI', 'Liechtenstein'),
(135, 'LK', 'Sri Lanka'),
(136, 'LR', 'Liberia'),
(137, 'LS', 'Lesotho'),
(138, 'LT', 'Lithuania'),
(139, 'LU', 'Luxembourg'),
(140, 'LV', 'Latvia'),
(141, 'LY', 'Libyan Arab Jamahiriya'),
(142, 'MA', 'Morocco'),
(143, 'MC', 'Monaco'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'ME', 'Montenegro'),
(146, 'MF', 'Saint Martin'),
(147, 'MG', 'Madagascar'),
(148, 'MH', 'Marshall Islands'),
(149, 'MK', 'Macedonia'),
(150, 'ML', 'Mali'),
(151, 'MM', 'Myanmar'),
(152, 'MN', 'Mongolia'),
(153, 'MO', 'Macao'),
(154, 'MP', 'Northern Mariana Islands'),
(155, 'MQ', 'Martinique'),
(156, 'MR', 'Mauritania'),
(157, 'MS', 'Montserrat'),
(158, 'MT', 'Malta'),
(159, 'MU', 'Mauritius'),
(160, 'MV', 'Maldives'),
(161, 'MW', 'Malawi'),
(162, 'MX', 'Mexico'),
(163, 'MY', 'Malaysia'),
(164, 'MZ', 'Mozambique'),
(165, 'NA', 'Namibia'),
(166, 'NC', 'New Caledonia'),
(167, 'NE', 'Niger'),
(168, 'NF', 'Norfolk Island'),
(169, 'NG', 'Nigeria'),
(170, 'NI', 'Nicaragua'),
(171, 'NL', 'Netherlands'),
(172, 'NO', 'Norway'),
(173, 'NP', 'Nepal'),
(174, 'NR', 'Nauru'),
(175, 'NU', 'Niue'),
(176, 'NZ', 'New Zealand'),
(177, 'OM', 'Oman'),
(178, 'PA', 'Panama'),
(179, 'PE', 'Peru'),
(180, 'PF', 'French Polynesia'),
(181, 'PG', 'Papua New Guinea'),
(182, 'PH', 'Philippines'),
(183, 'PK', 'Pakistan'),
(184, 'PL', 'Poland'),
(185, 'PM', 'Saint Pierre and Miquelon'),
(186, 'PN', 'Pitcairn'),
(187, 'PR', 'Puerto Rico'),
(188, 'PS', 'Palestinian Territory'),
(189, 'PT', 'Portugal'),
(190, 'PW', 'Palau'),
(191, 'PY', 'Paraguay'),
(192, 'QA', 'Qatar'),
(193, 'RE', 'Reunion'),
(194, 'RO', 'Romania'),
(195, 'RS', 'Serbia'),
(196, 'RU', 'Russian Federation'),
(197, 'RW', 'Rwanda'),
(198, 'SA', 'Saudi Arabia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SC', 'Seychelles'),
(201, 'SD', 'Sudan'),
(202, 'SE', 'Sweden'),
(203, 'SG', 'Singapore'),
(204, 'SH', 'Saint Helena'),
(205, 'SI', 'Slovenia'),
(206, 'SJ', 'Svalbard and Jan Mayen'),
(207, 'SK', 'Slovakia'),
(208, 'SL', 'Sierra Leone'),
(209, 'SM', 'San Marino'),
(210, 'SN', 'Senegal'),
(211, 'SO', 'Somalia'),
(212, 'SR', 'Suriname'),
(213, 'SS', 'South Sudan'),
(214, 'ST', 'Sao Tome and Principe'),
(215, 'SV', 'El Salvador'),
(216, 'SX', 'Sint Maarten'),
(217, 'SY', 'Syrian Arab Republic'),
(218, 'SZ', 'Swaziland'),
(219, 'TC', 'Turks and Caicos Islands'),
(220, 'TD', 'Chad'),
(221, 'TF', 'French Southern Territories'),
(222, 'TG', 'Togo'),
(223, 'TH', 'Thailand'),
(224, 'TJ', 'Tajikistan'),
(225, 'TK', 'Tokelau'),
(226, 'TL', 'Timor-Leste'),
(227, 'TM', 'Turkmenistan'),
(228, 'TN', 'Tunisia'),
(229, 'TO', 'Tonga'),
(230, 'TR', 'Turkey'),
(231, 'TT', 'Trinidad and Tobago'),
(232, 'TV', 'Tuvalu'),
(233, 'TW', 'Taiwan'),
(234, 'TZ', 'Tanzania, United Republic of'),
(235, 'UA', 'Ukraine'),
(236, 'UG', 'Uganda'),
(237, 'UM', 'United States Minor Outlying Islands'),
(238, 'US', 'United States'),
(239, 'UY', 'Uruguay'),
(240, 'UZ', 'Uzbekistan'),
(241, 'VA', 'Holy See (Vatican City State)'),
(242, 'VC', 'Saint Vincent and the Grenadines'),
(243, 'VE', 'Venezuela'),
(244, 'VG', 'Virgin Islands, British'),
(245, 'VI', 'Virgin Islands, U.S.'),
(246, 'VN', 'Vietnam'),
(247, 'VU', 'Vanuatu'),
(248, 'WF', 'Wallis and Futuna'),
(249, 'WS', 'Samoa'),
(250, 'YE', 'Yemen'),
(251, 'YT', 'Mayotte'),
(252, 'ZA', 'South Africa'),
(253, 'ZM', 'Zambia'),
(254, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(30) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `label` varchar(30) NOT NULL,
  `icon` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `initial` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `initial`, `date`) VALUES
(1, 'Advertising', 'AD', '0000-00-00'),
(2, 'Data Entry', 'DE', '0000-00-00'),
(3, 'Yammzit', 'GE', '0000-00-00'),
(4, 'Accounting', 'AC', '0000-00-00'),
(5, 'I.T Technical', 'IT', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(30) NOT NULL,
  `tittle` text NOT NULL,
  `city_id` int(30) NOT NULL,
  `date_created` int(60) NOT NULL,
  `start_time` int(60) NOT NULL,
  `end_time` int(60) NOT NULL,
  `venue` text NOT NULL,
  `details` text NOT NULL,
  `image` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `business_id` int(30) DEFAULT NULL,
  `good_rate` int(30) NOT NULL,
  `price_rate` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `phone_1` text NOT NULL,
  `address` text NOT NULL,
  `price` int(30) NOT NULL DEFAULT '0',
  `ticket` text NOT NULL,
  `kind_int` int(30) NOT NULL,
  `currency_id` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_age_group`
--

CREATE TABLE IF NOT EXISTS `event_age_group` (
  `id` int(30) NOT NULL,
  `event_id` int(30) NOT NULL,
  `age_group_id` int(30) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_attendency_group`
--

CREATE TABLE IF NOT EXISTS `event_attendency_group` (
  `id` int(30) NOT NULL,
  `event_id` int(30) NOT NULL,
  `attendency_group_id` int(30) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_comment`
--

CREATE TABLE IF NOT EXISTS `event_comment` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `event_id` int(30) NOT NULL,
  `kind` varchar(30) NOT NULL COMMENT 'normal iss for reviews, and event is for events',
  `details` text NOT NULL,
  `date_created` int(50) NOT NULL,
  `commenTo` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_kind`
--

CREATE TABLE IF NOT EXISTS `event_kind` (
  `id` int(30) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_like`
--

CREATE TABLE IF NOT EXISTS `event_like` (
  `id` int(100) NOT NULL,
  `user_id` int(30) NOT NULL,
  `newsfeed_id` int(30) DEFAULT NULL,
  `comment_id` int(30) DEFAULT NULL,
  `date_created` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_price_group`
--

CREATE TABLE IF NOT EXISTS `event_price_group` (
  `id` int(30) NOT NULL,
  `event_id` int(30) NOT NULL,
  `price_group_id` int(30) NOT NULL,
  `amount` double NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_requirement`
--

CREATE TABLE IF NOT EXISTS `event_requirement` (
  `id` int(30) NOT NULL,
  `event_id` int(30) NOT NULL,
  `details` text NOT NULL,
  `date_created` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gossip`
--

CREATE TABLE IF NOT EXISTS `gossip` (
  `id` int(30) NOT NULL,
  `tittle` text NOT NULL,
  `city_id` int(30) NOT NULL,
  `date_created` int(60) NOT NULL,
  `details` text NOT NULL,
  `image` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `gossip_category_id` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gossip_category`
--

CREATE TABLE IF NOT EXISTS `gossip_category` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gossip_like`
--

CREATE TABLE IF NOT EXISTS `gossip_like` (
  `id` int(30) NOT NULL,
  `gossip_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` int(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gossip_post`
--

CREATE TABLE IF NOT EXISTS `gossip_post` (
  `id` int(30) NOT NULL,
  `gossip_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `details` text NOT NULL,
  `date_created` int(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gossip_review`
--

CREATE TABLE IF NOT EXISTS `gossip_review` (
  `id` int(30) NOT NULL,
  `gossip_post_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `details` text NOT NULL,
  `date_created` int(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE IF NOT EXISTS `like` (
  `id` int(100) NOT NULL,
  `user_id` int(30) NOT NULL,
  `newsfeed_id` int(30) DEFAULT NULL,
  `comment_id` int(30) DEFAULT NULL,
  `date_created` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`id`, `user_id`, `newsfeed_id`, `comment_id`, `date_created`) VALUES
(1, 4, 15, 0, 1471278666),
(2, 4, 16, 0, 1471278670),
(3, 4, 18, 0, 1471278672),
(4, 4, 19, 0, 1471278676),
(10, 4, 27, 0, 1471291629),
(11, 5, 29, 0, 1471292252),
(15, 2, 36, 0, 1471351917),
(38, 4, 36, 0, 1471402788),
(40, 4, 46, 0, 1471402792),
(43, 4, 28, 0, 1471403343),
(44, 5, 46, 0, 1471433011),
(45, 5, 36, 0, 1471444718),
(46, 5, 28, 0, 1471444920),
(47, 5, 47, 0, 1471446596),
(48, 5, 48, 0, 1471447393),
(49, 5, 54, 0, 1471801195),
(50, 5, 57, 0, 1471801221),
(51, 3, 98, 0, 1471889966),
(52, 4, 58, 0, 1471966979),
(53, 4, 53, 0, 1471966987),
(54, 4, 133, 0, 1472029734),
(55, 4, 132, 0, 1472029748),
(56, 4, 30, 0, 1472029832),
(59, 4, 148, 0, 1472141686),
(60, 4, 151, 0, 1472153131),
(61, 5, 151, 0, 1472154253),
(62, 5, 0, 10, 1472155026),
(63, 4, 165, 0, 1472192850),
(64, 4, 170, 0, 1472195098),
(65, 4, 169, 0, 1472195102),
(66, 4, 168, 0, 1472283568),
(67, 35, 163, 0, 1472375463),
(68, 35, 163, 0, 1472375464),
(69, 36, 28, 0, 1472392748),
(70, 36, 196, 0, 1472392883),
(71, 36, 163, 0, 1472392891),
(72, 5, 208, 0, 1472394146),
(73, 5, 136, 0, 1472506728),
(74, 4, 217, 0, 1472527456),
(75, 4, 229, 0, 1472626627),
(76, 25, 549, 0, 1472628676),
(77, 25, 549, 0, 1472628678),
(78, 25, 549, 0, 1472628731),
(79, 43, 549, 0, 1472628761),
(80, 40, 549, 0, 1472628768),
(81, 40, 549, 0, 1472628769),
(82, 40, 549, 0, 1472628772),
(102, 25, 550, 0, 1472629330),
(103, 25, 550, 0, 1472629331),
(107, 43, 550, 0, 1472629356),
(108, 43, 0, 13, 1472629485),
(111, 4, 230, 0, 1472631049),
(112, 4, 222, 0, 1472631060),
(113, 4, 221, 0, 1472631063),
(114, 4, 220, 0, 1472631066),
(115, 4, 219, 0, 1472631069),
(116, 35, 217, 0, 1472659121),
(117, 4, 232, 0, 1472659139),
(118, 4, 233, 0, 1472659349),
(119, 4, 234, 0, 1472659351),
(124, 43, 559, 0, 1472715544),
(125, 43, 0, 35, 1472716450),
(126, 5, 234, 0, 1472849407),
(127, 5, 220, 0, 1473004864),
(128, 10, 250, 0, 1473086142),
(129, 4, 257, 0, 1473145591),
(130, 4, 254, 0, 1473145595),
(131, 4, 246, 0, 1473145604),
(132, 28, 260, 0, 1473319141),
(133, 4, 262, 0, 1473327366),
(134, 4, 245, 0, 1473771398),
(135, 35, 269, 0, 1474352875),
(136, 11, 293, 0, 1474365545),
(137, 11, 161, 0, 1474365549),
(138, 4, 210, 0, 1474366037),
(139, 4, 290, 0, 1474638525),
(140, 4, 296, 0, 1474639886),
(142, 5, 294, 0, 1474719688),
(143, 4, 327, 0, 1475680986),
(144, 50, 328, 0, 1476684865),
(145, 5, 344, 0, 1476694211),
(146, 5, 356, 0, 1476949835),
(147, 60, 356, 0, 1476972080),
(148, 4, 351, 0, 1477903320),
(149, 5, 385, 0, 1478344036);

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed`
--

CREATE TABLE IF NOT EXISTS `newsfeed` (
  `id` int(11) NOT NULL,
  `date_created` int(50) NOT NULL,
  `user_id` int(30) NOT NULL COMMENT 'the creator of this news feed',
  `kind` varchar(30) NOT NULL,
  `cost` int(10) DEFAULT NULL,
  `good` int(10) DEFAULT NULL,
  `details` text NOT NULL,
  `business_id` int(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=401 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsfeed`
--

INSERT INTO `newsfeed` (`id`, `date_created`, `user_id`, `kind`, `cost`, `good`, `details`, `business_id`) VALUES
(1, 1471183501, 1, 'tip_welcome', 0, 0, '...', 1),
(2, 1471197631, 3, 'tip_welcome', 0, 0, '...', 1),
(3, 1471198137, 3, 'add_business', 0, 0, '...', 6),
(4, 1471198275, 3, 'tip_search_friends', 0, 0, '...', 1),
(5, 1471198585, 3, 'tip_follow_businesses', 0, 0, '...', 1),
(6, 1471199088, 3, 'tip_follow_people', 0, 0, '...', 1),
(7, 1471199150, 3, 'tip_add_business', 0, 0, '...', 1),
(8, 1471200584, 3, 'tip_support', 0, 0, '...', 1),
(9, 1471238715, 4, 'tip_welcome', 0, 0, '...', 1),
(10, 1471239028, 4, 'tip_search_friends', 0, 0, '...', 1),
(11, 1471242276, 4, 'tip_follow_businesses', 0, 0, '...', 1),
(12, 1471242516, 4, 'tip_follow_people', 0, 0, '...', 1),
(13, 1471242576, 4, 'tip_add_business', 0, 0, '...', 1),
(14, 1471242755, 4, 'tip_support', 0, 0, '...', 1),
(15, 1471243570, 4, 'business_follow', 0, 0, '', 8),
(16, 1471259453, 4, 'business_follow', 0, 0, '', 15),
(18, 1471276823, 4, 'business_follow', 0, 0, '', 96),
(19, 1471277434, 4, 'business_follow', 0, 0, '', 97),
(20, 1471279230, 4, 'rate', 4, 3, '...', 39),
(21, 1471279391, 4, 'rate', 1, 1, '...', 46),
(23, 1471290367, 5, 'tip_welcome', 0, 0, '...', 1),
(24, 1471290501, 5, 'business_follow', 0, 0, '', 43),
(25, 1471290595, 5, 'rate', 1, 5, '...', 43),
(26, 1471290640, 5, 'tip_search_friends', 0, 0, '...', 1),
(27, 1471290696, 4, 'add_business', 0, 0, '...', 120),
(28, 1471290831, 4, 'review', -1, -1, 'Worst customer care ever. Plus these people cheat. They have a lot of fake Chinese things. Buying electronics from this place is as good as throwing your money away.', 120),
(29, 1471290863, 4, 'rate', 0, 1, '...', 120),
(30, 1471291336, 4, 'business_edit_some_info', 0, 0, '...', 120),
(31, 1471292119, 5, 'tip_follow_businesses', 0, 0, '...', 1),
(32, 1471292428, 5, 'tip_follow_people', 0, 0, '...', 1),
(33, 1471292522, 5, 'tip_add_business', 0, 0, '...', 1),
(34, 1471292726, 5, 'tip_support', 0, 0, '...', 1),
(35, 1471338806, 4, 'add_business', 0, 0, '...', 127),
(36, 1471338856, 4, 'review', -1, -1, 'Pay for a wide range of services and goods using this awesome service. Download from Google Play Stote', 127),
(46, 1471374302, 4, 'new_friend', 0, 0, '...', 5),
(47, 1471446251, 4, 'add_business', 0, 0, '...', 191),
(48, 1471446892, 5, 'review', -1, -1, 'They have some of the best first hand clothes for kids in Uganda. They have items from Thailand, China and India with affordable prices. 100% Good customer care', 6),
(49, 1471446951, 5, 'rate', 1, 5, '...', 6),
(50, 1471447418, 5, 'business_follow', 0, 0, '', 6),
(51, 1471447749, 5, 'review_photo', 0, 0, 'A step.........--->', 43),
(52, 1471454777, 4, 'new_friend', 0, 0, '...', 8),
(53, 1471534321, 4, 'new_friend', 0, 0, '...', 9),
(54, 1471555279, 10, 'review', -1, -1, 'Pretty cool place. I mean I had a meal during kampala restaurant week and my pick of the day was the lamb meatballs and also grilled prawns l. I so recommend this ????', 112),
(55, 1471555412, 10, 'rate', 3, 4, '...', 112),
(56, 1471559422, 10, 'review', -1, -1, 'Really amazing steak. Best served medium done  with black pepper sauce ????', 32),
(57, 1471559424, 10, 'review', -1, -1, 'Really amazing steak. Best served medium done  with black pepper sauce ????', 32),
(58, 1471629793, 4, 'new_friend', 0, 0, '...', 12),
(59, 1471766788, 17, 'tip_welcome', 0, 0, '...', 1),
(60, 1471766906, 17, 'check_in', 0, 0, 'Making the way right', 43),
(61, 1471766906, 17, 'tip_search_friends', 0, 0, '...', 1),
(62, 1471767006, 17, 'tip_follow_businesses', 0, 0, '...', 1),
(63, 1471767692, 17, 'tip_follow_people', 0, 0, '...', 1),
(64, 1471767994, 17, 'tip_add_business', 0, 0, '...', 1),
(65, 1471768710, 17, 'tip_support', 0, 0, '...', 1),
(66, 1471776455, 18, 'tip_welcome', 0, 0, '...', 1),
(67, 1471776768, 19, 'tip_welcome', 0, 0, '...', 1),
(68, 1471776983, 19, 'tip_search_friends', 0, 0, '...', 1),
(69, 1471777013, 19, 'add_business', 0, 0, '...', 197),
(70, 1471777302, 19, 'tip_follow_businesses', 0, 0, '...', 1),
(71, 1471777538, 20, 'tip_welcome', 0, 0, '...', 1),
(72, 1471777572, 20, 'tip_search_friends', 0, 0, '...', 1),
(73, 1471777607, 20, 'tip_follow_businesses', 0, 0, '...', 1),
(74, 1471777608, 20, 'business_follow', 0, 0, '', 197),
(75, 1471777632, 20, 'business_favourite', 0, 0, '', 197),
(76, 1471777746, 20, 'tip_follow_people', 0, 0, '...', 1),
(77, 1471777747, 20, 'business_edit_some_info', 0, 0, '...', 197),
(78, 1471777844, 20, 'business_edit_some_info', 0, 0, '...', 197),
(79, 1471777890, 20, 'business_edit_some_info', 0, 0, '...', 197),
(80, 1471777908, 20, 'tip_add_business', 0, 0, '...', 1),
(81, 1471777965, 20, 'tip_support', 0, 0, '...', 1),
(82, 1471788099, 21, 'tip_welcome', 0, 0, '...', 1),
(83, 1471791011, 21, 'tip_search_friends', 0, 0, '...', 1),
(84, 1471791141, 21, 'tip_follow_businesses', 0, 0, '...', 1),
(85, 1471791378, 21, 'tip_follow_people', 0, 0, '...', 1),
(86, 1471791556, 21, 'tip_add_business', 0, 0, '...', 1),
(87, 1471791713, 21, 'tip_support', 0, 0, '...', 1),
(88, 1471801043, 5, 'new_friend', 0, 0, '...', 10),
(89, 1471801046, 5, 'new_friend', 0, 0, '...', 8),
(90, 1471805468, 3, 'new_friend', 0, 0, '...', 5),
(91, 1471805472, 3, 'new_friend', 0, 0, '...', 8),
(92, 1471844359, 14, 'tip_welcome', 0, 0, '...', 1),
(93, 1471849714, 9, 'tip_welcome', 0, 0, '...', 1),
(94, 1471849803, 9, 'tip_search_friends', 0, 0, '...', 1),
(95, 1471849962, 9, 'tip_follow_businesses', 0, 0, '...', 1),
(96, 1471850104, 9, 'tip_follow_people', 0, 0, '...', 1),
(97, 1471850159, 9, 'tip_add_business', 0, 0, '...', 1),
(98, 1471864779, 21, 'business_follow', 0, 0, '', 6),
(99, 1471881478, 27, 'tip_welcome', 0, 0, '...', 1),
(100, 1471881509, 28, 'tip_welcome', 0, 0, '...', 1),
(101, 1471898241, 11, 'tip_welcome', 0, 0, '...', 1),
(102, 1471902142, 10, 'tip_welcome', 0, 0, '...', 1),
(103, 1471902294, 10, 'tip_search_friends', 0, 0, '...', 1),
(104, 1471902325, 10, 'tip_follow_businesses', 0, 0, '...', 1),
(105, 1471902415, 10, 'tip_follow_people', 0, 0, '...', 1),
(106, 1471902654, 10, 'tip_add_business', 0, 0, '...', 1),
(107, 1471902774, 10, 'tip_support', 0, 0, '...', 1),
(108, 1471964074, 29, 'tip_welcome', 0, 0, '...', 1),
(109, 1471964591, 30, 'tip_welcome', 0, 0, '...', 1),
(110, 1471964730, 30, 'tip_search_friends', 0, 0, '...', 1),
(111, 1471964730, 30, 'tip_search_friends', 0, 0, '...', 1),
(112, 1471964790, 30, 'tip_follow_businesses', 0, 0, '...', 1),
(113, 1471964850, 30, 'tip_follow_people', 0, 0, '...', 1),
(114, 1471965001, 30, 'tip_add_business', 0, 0, '...', 1),
(115, 1471965150, 30, 'tip_support', 0, 0, '...', 1),
(116, 1471965385, 31, 'tip_welcome', 0, 0, '...', 1),
(117, 1471965598, 31, 'tip_search_friends', 0, 0, '...', 1),
(118, 1471965598, 31, 'tip_search_friends', 0, 0, '...', 1),
(119, 1471965658, 31, 'tip_follow_businesses', 0, 0, '...', 1),
(120, 1471965752, 31, 'tip_follow_people', 0, 0, '...', 1),
(121, 1471965839, 31, 'tip_add_business', 0, 0, '...', 1),
(122, 1471965839, 31, 'tip_add_business', 0, 0, '...', 1),
(123, 1471965871, 31, 'tip_support', 0, 0, '...', 1),
(124, 1471965871, 31, 'tip_support', 0, 0, '...', 1),
(125, 1471966714, 4, 'new_friend', 0, 0, '...', 31),
(126, 1471967028, 4, 'business_edit_all', 0, 0, '...', 43),
(127, 1471973795, 14, 'tip_search_friends', 0, 0, '...', 1),
(128, 1471973843, 14, 'new_friend', 0, 0, '...', 5),
(129, 1471975059, 14, 'tip_follow_businesses', 0, 0, '...', 1),
(130, 1471975211, 14, 'tip_follow_people', 0, 0, '...', 1),
(131, 1471983355, 5, 'rate', 4, 5, '...', 106),
(132, 1471984133, 5, 'review_photo', 0, 0, 'Very fancy restaurant with really good service. We had brunch with the family last week and we had a really good time. They even have waffles. :)', 106),
(133, 1471984357, 5, 'business_follow', 0, 0, '', 106),
(134, 1471984559, 5, 'new_friend', 0, 0, '...', 31),
(135, 1472032474, 4, 'business_follow', 0, 0, '', 106),
(136, 1472129271, 4, 'review', -1, -1, 'I''ve been here for coffee... Nice place, good customer care, always smiling.', 106),
(137, 1472130318, 4, 'add_business', 0, 0, '...', 202),
(138, 1472132927, 4, 'review_photo', 0, 0, 'Although hidde, this restaurant is surely amazing. Good ambiance.\nIf you''re ever around Bukoto, this is a place to check out.', 202),
(139, 1472132977, 4, 'rate', 2, 3, '...', 202),
(140, 1472140229, 8, 'tip_welcome', 0, 0, '...', 1),
(141, 1472140287, 8, 'check_in', 0, 0, 'Awesome environment here', 7),
(142, 1472140289, 8, 'tip_search_friends', 0, 0, '...', 1),
(143, 1472140302, 8, 'rate', 2, 0, '...', 7),
(144, 1472140308, 8, 'rate', 2, 0, '...', 7),
(145, 1472140347, 8, 'review', -1, -1, 'Nice place to pick up whats life motivating', 7),
(146, 1472140379, 8, 'tip_follow_businesses', 0, 0, '...', 1),
(147, 1472140395, 8, 'business_follow', 0, 0, '', 6),
(148, 1472140395, 5, 'review', -1, -1, 'Nice place to relax with your friends over the weekends. I liked the outdoor theme they have going on. \n\nIf only they could improve on the outdoor seats. That would be great.', 33),
(149, 1472140397, 8, 'business_follow', 0, 0, '', 7),
(150, 1472140398, 8, 'business_follow', 0, 0, '', 8),
(151, 1472141871, 4, 'review_photo', 0, 0, 'Casablanca aka Casa is a nice place. I have had crazy nights here. The best nights are usually Wednesday and Friday. Saturday is over crowded so its a no go for me on Saturday. Sunday is very chill and calm if you''re with Friends.', 33),
(152, 1472144323, 32, 'tip_welcome', 0, 0, '...', 1),
(153, 1472144462, 32, 'tip_search_friends', 0, 0, '...', 1),
(154, 1472154698, 5, 'review_photo', 0, 0, 'Just bought my niece a birthday gift from Trinity Twin Traders. Love the quality of the products this people have.', 6),
(155, 1472154889, 5, 'business_edit_banner', 0, 0, '', 6),
(156, 1472158097, 11, 'tip_search_friends', 0, 0, '...', 1),
(157, 1472158278, 11, 'new_friend', 0, 0, '...', 31),
(158, 1472158281, 11, 'new_friend', 0, 0, '...', 31),
(159, 1472158284, 11, 'new_friend', 0, 0, '...', 5),
(160, 1472162312, 11, 'tip_follow_businesses', 0, 0, '...', 1),
(161, 1472162337, 11, 'business_follow', 0, 0, '', 6),
(162, 1472162373, 11, 'rate', 3, 5, '...', 6),
(163, 1472162409, 11, 'review', -1, -1, 'Best place to get quality clothes', 6),
(164, 1472185582, 8, 'tip_follow_people', 0, 0, '...', 1),
(165, 1472185669, 8, 'check_in', 0, 0, 'Early shopping', 15),
(166, 1472185674, 8, 'tip_add_business', 0, 0, '...', 1),
(167, 1472185690, 8, 'rate', 3, 4, '...', 15),
(168, 1472192818, 4, 'business_follow', 0, 0, '', 15),
(169, 1472193529, 4, 'add_business', 0, 0, '...', 203),
(170, 1472193825, 4, 'review_photo', 0, 0, 'This is one of the most awesome Craft shops I know. Basically they can customize and blend anything for you with the African feel.', 203),
(171, 1472198696, 33, 'tip_welcome', 0, 0, '...', 1),
(172, 1472198792, 33, 'tip_search_friends', 0, 0, '...', 1),
(173, 1472198825, 33, 'tip_follow_businesses', 0, 0, '...', 1),
(174, 1472198953, 33, 'tip_follow_people', 0, 0, '...', 1),
(175, 1472199014, 33, 'tip_add_business', 0, 0, '...', 1),
(176, 1472199014, 33, 'tip_add_business', 0, 0, '...', 1),
(177, 1472199194, 33, 'tip_support', 0, 0, '...', 1),
(178, 1472199194, 33, 'tip_support', 0, 0, '...', 1),
(179, 1472199353, 33, 'add_business', 0, 0, '...', 204),
(180, 1472199421, 4, 'new_friend', 0, 0, '...', 33),
(181, 1472216113, 9, 'tip_support', 0, 0, '...', 1),
(182, 1472283456, 4, 'business_edit_name', 0, 0, 'Apront Ventures', 191),
(183, 1472293181, 11, 'tip_follow_people', 0, 0, '...', 1),
(184, 1472293208, 11, 'new_friend', 0, 0, '...', 8),
(185, 1472293209, 11, 'new_friend', 0, 0, '...', 33),
(186, 1472293210, 11, 'new_friend', 0, 0, '...', 33),
(187, 1472293293, 11, 'tip_add_business', 0, 0, '...', 1),
(188, 1472293293, 11, 'tip_add_business', 0, 0, '...', 1),
(189, 1472321040, 8, 'tip_support', 0, 0, '...', 1),
(190, 1472373315, 35, 'tip_welcome', 0, 0, '...', 1),
(191, 1472373471, 35, 'tip_search_friends', 0, 0, '...', 1),
(192, 1472373507, 35, 'tip_follow_businesses', 0, 0, '...', 1),
(193, 1472373592, 35, 'tip_follow_people', 0, 0, '...', 1),
(194, 1472373625, 35, 'tip_add_business', 0, 0, '...', 1),
(195, 1472374109, 35, 'tip_support', 0, 0, '...', 1),
(196, 1472380106, 35, 'business_follow', 0, 0, '', 6),
(197, 1472385628, 11, 'tip_support', 0, 0, '...', 1),
(198, 1472385667, 11, 'new_friend', 0, 0, '...', 35),
(199, 1472385669, 11, 'new_friend', 0, 0, '...', 35),
(200, 1472392413, 36, 'tip_welcome', 0, 0, '...', 1),
(201, 1472392630, 36, 'tip_search_friends', 0, 0, '...', 1),
(202, 1472392845, 36, 'tip_follow_businesses', 0, 0, '...', 1),
(203, 1472392845, 36, 'tip_follow_businesses', 0, 0, '...', 1),
(204, 1472392876, 36, 'tip_follow_people', 0, 0, '...', 1),
(205, 1472392904, 36, 'business_follow', 0, 0, '', 6),
(206, 1472392939, 36, 'tip_add_business', 0, 0, '...', 1),
(207, 1472392979, 36, 'tip_support', 0, 0, '...', 1),
(208, 1472393216, 36, 'add_business', 0, 0, '...', 206),
(209, 1472393835, 36, 'add_business', 0, 0, '...', 207),
(210, 1472393999, 36, 'review', -1, -1, 'It feels good catching a football match while in town', 207),
(211, 1472394066, 5, 'new_friend', 0, 0, '...', 36),
(212, 1472394068, 5, 'new_friend', 0, 0, '...', 35),
(213, 1472394072, 5, 'new_friend', 0, 0, '...', 33),
(214, 1472394075, 5, 'new_friend', 0, 0, '...', 33),
(215, 1472476313, 37, 'tip_welcome', 0, 0, '...', 1),
(216, 1472505225, 5, 'review', -1, -1, 'Anyone staying around this area should go to this clinic. I don''t think you can find any other clinic in this area with really good Doctors and good stuff memberes that care. Can''t say the same for most clinics in the city .', 208),
(217, 1472505236, 5, 'business_follow', 0, 0, '', 208),
(218, 1472506199, 5, 'review', -1, -1, 'Only thing I like in this place is Cafe Javas, the supermarket ( Nakumat ) and last but not lisy. They have got enough parking so that you and your family can park your car''s and do some grocery shopping.', 17),
(219, 1472506275, 5, 'rate', 1, 3, '...', 17),
(220, 1472527458, 4, 'business_follow', 0, 0, '', 208),
(221, 1472561611, 4, 'new_friend', 0, 0, '...', 36),
(222, 1472561613, 4, 'new_friend', 0, 0, '...', 11),
(223, 1472561613, 4, 'new_friend', 0, 0, '...', 11),
(224, 1472562653, 38, 'tip_welcome', 0, 0, '...', 1),
(225, 1472592552, 39, 'tip_welcome', 0, 0, '...', 1),
(226, 1472619683, 40, 'tip_welcome', 0, 0, '...', 1),
(227, 1472619789, 40, 'tip_search_friends', 0, 0, '...', 1),
(228, 1472619881, 39, 'tip_search_friends', 0, 0, '...', 1),
(229, 1472626551, 4, 'add_business', 0, 0, '...', 209),
(230, 1472626728, 4, 'rate', 0, 5, '...', 209),
(231, 1472640346, 28, 'tip_search_friends', 0, 0, '...', 1),
(232, 1472659018, 4, 'add_business', 0, 0, '...', 210),
(233, 1472659129, 4, 'rate', 1, 4, '...', 210),
(234, 1472659243, 4, 'review', -1, -1, 'Jim has some of the best and affordable phones in town. Plus you get a guarantee.', 210),
(235, 1472713725, 41, 'tip_welcome', 0, 0, '...', 1),
(236, 1472713848, 41, 'tip_search_friends', 0, 0, '...', 1),
(237, 1472820627, 42, 'tip_welcome', 0, 0, '...', 1),
(238, 1472820824, 42, 'tip_search_friends', 0, 0, '...', 1),
(239, 1472820945, 42, 'tip_follow_businesses', 0, 0, '...', 1),
(240, 1472821112, 42, 'tip_follow_people', 0, 0, '...', 1),
(241, 1472821112, 42, 'tip_follow_people', 0, 0, '...', 1),
(242, 1472821203, 42, 'tip_add_business', 0, 0, '...', 1),
(243, 1472821322, 42, 'tip_support', 0, 0, '...', 1),
(244, 1472822427, 5, 'business_follow', 0, 0, '', 212),
(245, 1472822903, 5, 'review', -1, -1, 'Love this gym and the people that work there. Really great and friendly trainers.', 212),
(246, 1472822950, 5, 'new_friend', 0, 0, '...', 41),
(247, 1472836526, 38, 'tip_search_friends', 0, 0, '...', 1),
(248, 1472836738, 38, 'tip_follow_businesses', 0, 0, '...', 1),
(249, 1472836827, 38, 'tip_follow_people', 0, 0, '...', 1),
(250, 1472849680, 5, 'rate', 2, 4, '...', 212),
(251, 1472909503, 43, 'tip_welcome', 0, 0, '...', 1),
(252, 1472909545, 44, 'tip_welcome', 0, 0, '...', 1),
(253, 1472969837, 13, 'tip_welcome', 0, 0, '...', 1),
(254, 1472969901, 13, 'new_friend', 0, 0, '...', 28),
(255, 1472969928, 13, 'tip_search_friends', 0, 0, '...', 1),
(256, 1472970077, 13, 'tip_follow_businesses', 0, 0, '...', 1),
(257, 1473081354, 8, 'check_in', 0, 0, 'AMAzing atmosphere right here...Excellent banking', 146),
(258, 1473283906, 45, 'tip_welcome', 0, 0, '...', 1),
(259, 1473319092, 28, 'tip_follow_businesses', 0, 0, '...', 1),
(260, 1473319119, 28, 'business_follow', 0, 0, '', 6),
(261, 1473319145, 28, 'business_follow', 0, 0, '', 7),
(262, 1473319148, 28, 'business_follow', 0, 0, '', 8),
(263, 1473319452, 28, 'tip_follow_people', 0, 0, '...', 1),
(264, 1473319513, 28, 'tip_add_business', 0, 0, '...', 1),
(265, 1473319573, 28, 'tip_support', 0, 0, '...', 1),
(266, 1473329718, 4, 'new_friend', 0, 0, '...', 38),
(267, 1473356336, 42, 'business_follow', 0, 0, '', 32),
(268, 1473356480, 42, 'review', -1, -1, 'Nice place .  really good food', 32),
(269, 1473457798, 5, 'review', -1, -1, 'If you are thinking of having dinner at this hotel. Don''t waste your time and Money. \nMe and the family had dinner at this hotel on the 7th September 2016 and it was the worst dinner we ever had \n\nThey have super poor service. They take way to long to serve your food and if your lucky , they will bring you the wrong thing you asked for . \n\nWe placed an order for food and as we waited, we asked them to bring us drinks. Guess what, we didn''t get the drinks. We waited for over 35min for the drinks to arrive but still got nothing. We had to remind the waitress to bring us our drinks. After waiting for over 1 hour and 30 minutes, we finally got our food. The sad part was that some of us didn''t get what we had asked for. \n\nWe had no choice but to eat what we can and paid for the shitty food they gave us. And we left.  So don''t waste your money at this hotel if your looking for food. You can visit the gym but not have dinner or anything to do with eating at this hotel', 237),
(270, 1473466794, 46, 'tip_welcome', 0, 0, '...', 1),
(271, 1473521450, 14, 'tip_add_business', 0, 0, '...', 1),
(272, 1473521482, 14, 'tip_support', 0, 0, '...', 1),
(273, 1473742618, 39, 'tip_follow_businesses', 0, 0, '...', 1),
(274, 1473742687, 39, 'tip_follow_people', 0, 0, '...', 1),
(275, 1473742743, 39, 'tip_add_business', 0, 0, '...', 1),
(276, 1473770933, 4, 'business_favourite', 0, 0, '', 237),
(277, 1473881103, 5, 'rate', 3, 5, '...', 51),
(278, 1474023642, 47, 'tip_welcome', 0, 0, '...', 1),
(279, 1474023883, 47, 'tip_search_friends', 0, 0, '...', 1),
(280, 1474026201, 47, 'tip_follow_businesses', 0, 0, '...', 1),
(281, 1474026263, 47, 'tip_follow_people', 0, 0, '...', 1),
(282, 1474026352, 47, 'tip_add_business', 0, 0, '...', 1),
(283, 1474026441, 47, 'tip_support', 0, 0, '...', 1),
(284, 1474043316, 19, 'new_friend', 0, 0, '...', 20),
(285, 1474044935, 19, 'tip_follow_people', 0, 0, '...', 1),
(286, 1474045415, 19, 'tip_add_business', 0, 0, '...', 1),
(287, 1474045685, 19, 'tip_support', 0, 0, '...', 1),
(288, 1474146175, 39, 'tip_support', 0, 0, '...', 1),
(289, 1474283864, 13, 'tip_follow_people', 0, 0, '...', 1),
(290, 1474283939, 13, 'new_friend', 0, 0, '...', 5),
(291, 1474283984, 13, 'tip_add_business', 0, 0, '...', 1),
(292, 1474284016, 13, 'tip_support', 0, 0, '...', 1),
(293, 1474292267, 4, 'business_follow', 0, 0, '', 51),
(294, 1474292708, 4, 'review', -1, -1, 'Nice cafe... I love the crowd, mostly for cooperates I think because of the location being around offices. Their prices won''t also leave your pockets crying.', 39),
(295, 1474292831, 4, 'review', -1, -1, 'High society. We had a crazy night here. Though don''t wear shorts or open shoes if you''re going to Sky, you''ll be bounced.', 101),
(296, 1474292888, 4, 'review', -1, -1, 'My friend told me about this place. I need to taste their burgers.', 51),
(297, 1474353161, 35, 'new_friend', 0, 0, '...', 36),
(298, 1474399915, 5, 'new_friend', 0, 0, '...', 13),
(299, 1474549910, 4, 'business_favourite', 0, 0, '', 211),
(300, 1474553187, 49, 'tip_welcome', 0, 0, '...', 1),
(301, 1474553249, 49, 'tip_search_friends', 0, 0, '...', 1),
(302, 1474553637, 49, 'rate', 3, 4, '...', 39),
(303, 1474553674, 49, 'review', -1, -1, 'Really good service. If you have some free time, you should checkout this place', 39),
(304, 1474553713, 49, 'tip_follow_businesses', 0, 0, '...', 1),
(305, 1474719134, 49, 'tip_follow_people', 0, 0, '...', 1),
(306, 1474719183, 49, 'new_friend', 0, 0, '...', 5),
(307, 1474719224, 49, 'tip_add_business', 0, 0, '...', 1),
(308, 1474807621, 50, 'tip_welcome', 0, 0, '...', 1),
(309, 1474810662, 50, 'tip_search_friends', 0, 0, '...', 1),
(310, 1474810722, 50, 'tip_follow_businesses', 0, 0, '...', 1),
(311, 1474810722, 50, 'tip_follow_businesses', 0, 0, '...', 1),
(312, 1474810819, 50, 'tip_follow_people', 0, 0, '...', 1),
(313, 1474810819, 50, 'tip_follow_people', 0, 0, '...', 1),
(314, 1474810971, 50, 'tip_add_business', 0, 0, '...', 1),
(315, 1474811002, 50, 'tip_support', 0, 0, '...', 1),
(316, 1474811445, 50, 'business_follow', 0, 0, '', 7),
(317, 1474812251, 4, 'new_friend', 0, 0, '...', 50),
(318, 1474880247, 51, 'tip_welcome', 0, 0, '...', 1),
(321, 1474921615, 4, 'business_follow', 0, 0, '', 211),
(322, 1475003540, 53, 'tip_welcome', 0, 0, '...', 1),
(323, 1475003726, 53, 'tip_search_friends', 0, 0, '...', 1),
(324, 1475003767, 53, 'tip_follow_businesses', 0, 0, '...', 1),
(325, 1475003851, 53, 'tip_follow_people', 0, 0, '...', 1),
(326, 1475052194, 5, 'rate', 4, 5, '...', 242),
(327, 1475052270, 5, 'business_favourite', 0, 0, '', 242),
(328, 1475130283, 50, 'business_follow', 0, 0, '', 211),
(329, 1475139662, 54, 'tip_welcome', 0, 0, '...', 1),
(330, 1475139996, 54, 'tip_search_friends', 0, 0, '...', 1),
(331, 1475139996, 54, 'tip_search_friends', 0, 0, '...', 1),
(332, 1475140063, 54, 'tip_follow_businesses', 0, 0, '...', 1),
(333, 1475140097, 54, 'tip_follow_people', 0, 0, '...', 1),
(334, 1475140199, 54, 'tip_add_business', 0, 0, '...', 1),
(335, 1475140199, 54, 'tip_add_business', 0, 0, '...', 1),
(336, 1475140332, 54, 'tip_support', 0, 0, '...', 1),
(337, 1475314843, 4, 'rate', 5, 5, '...', 242),
(343, 1475325194, 4, 'review', -1, -1, '.', 31),
(344, 1476192027, 4, 'review', -1, -1, 'Travel Uganda with Shaka Tours.', 211),
(345, 1476200364, 4, 'add_business', 0, 0, '...', 243),
(346, 1476541918, 43, 'business_follow', -1, -1, 'add_to_followed', -211),
(347, 1476548987, 5, 'review', -1, -1, 'I like shopping from the place its cheap and has nice things', 2147483647),
(348, 1476549039, 5, 'review', -1, -1, 'Man i just like this', 2147483647),
(349, 1476549224, 5, 'review', -1, -1, 'hello', 2147483647),
(350, 1476549263, 5, 'review', -1, -1, 'good business', 2147483647),
(351, 1476549525, 5, 'review', -1, -1, 'good business', 243),
(352, 1476626261, 58, 'tip_welcome', 0, 0, '...', 1),
(353, 1476626552, 58, 'tip_search_friends', 0, 0, '...', 1),
(354, 1476626732, 58, 'tip_follow_businesses', 0, 0, '...', 1),
(355, 1476627122, 58, 'tip_follow_people', 0, 0, '...', 1),
(356, 1476786850, 4, 'review', -1, -1, 'Biggest screen in the city. I love this place. They had me at free soda. Hahaha....', 243),
(357, 1476894294, 11, 'new_friend', 0, 0, '...', 50),
(358, 1476938564, 0, 'business_follow', -1, -1, 'add_to_followed', 2147483647),
(359, 1476949896, 5, 'new_friend', -1, -1, 'friends', 50),
(360, 1476949932, 5, 'business_favourite', -1, -1, 'add_to_favourites', 243),
(361, 1476949971, 5, 'business_follow', -1, -1, 'add_to_followed', 243),
(362, 1476971859, 60, 'rate', 0, 5, '', 56),
(363, 1476971921, 60, 'review', -1, -1, 'Pleasant experience it was hanging at GUVNOR!', 56),
(364, 1477131761, 61, 'review', -1, -1, 'Tirupati Mazima Mall has become more of an office mall than a shopping mall', 184),
(365, 1477132270, 61, 'business_follow', -1, -1, 'add_to_followed', 43),
(366, 1477132399, 61, 'business_follow', -1, -1, 'add_to_followed', 4),
(367, 1477132936, 61, 'business_follow', -1, -1, 'add_to_followed', 5),
(368, 1477475600, 62, 'review', -1, -1, 'Cnt imagine How the business world is changing to monopolism  slowly by slowly', 50),
(369, 1477475736, 5, 'new_friend', -1, -1, 'friends', 62),
(370, 1477475860, 5, 'new_friend', -1, -1, 'friends', 61),
(371, 1477670181, 4, 'new_friend', 0, 0, '...', 61),
(372, 1477836233, 19, 'rate', 4, 0, '', 32),
(373, 1477836330, 19, 'review', -1, -1, 'i wanna visit it coz some friend also recommended it to me', 32),
(374, 1477836343, 19, 'business_follow', -1, -1, 'add_to_followed', 2147483647),
(375, 1477901818, 4, 'review', -1, -1, 'This place needs some life.. it used to be a nice place.', 205),
(376, 1477903098, 4, 'review', -1, -1, 'Love the inside. Looks like i will have lunch from this place today', 51),
(377, 1477904349, 4, 'review', -1, -1, 'Goid service', 51),
(378, 1477904472, 4, 'review', -1, -1, 'Good place to have lunch', 51),
(379, 1477904547, 4, 'review', -1, -1, 'Good place to have lunch with friends', 51),
(380, 1477905118, 4, 'review', -1, -1, 'Really nice view for a sunset', 242),
(381, 1477905940, 4, 'review', -1, -1, 'Really nice place to see the sunset', 242),
(382, 1477906014, 4, 'business_follow', 0, 0, '', 242),
(383, 1477906143, 4, 'review', -1, -1, 'Does they have room service. And how good is the service in this place', 30),
(384, 1478243275, 71, 'tip_welcome', 0, 0, '...', 1),
(385, 1478339028, 61, 'review', -1, -1, 'Awesome experience for the 5pm showings on weekdays. It almost feels like VIP treatment unlike on weekends and showings of 7pm and 10pm where it feels like downtown owino with too much KAVUYO!!', 244),
(386, 1478343565, 72, 'tip_welcome', 0, 0, '...', 1),
(387, 1478343646, 72, 'tip_search_friends', 0, 0, '...', 1),
(388, 1478343681, 72, 'tip_follow_businesses', 0, 0, '...', 1),
(389, 1478343796, 72, 'tip_follow_people', 0, 0, '...', 1),
(390, 1478343857, 72, 'tip_add_business', 0, 0, '...', 1),
(391, 1478343975, 72, 'tip_support', 0, 0, '...', 1),
(392, 1478344088, 72, 'business_follow', 0, 0, '', 244),
(393, 1478344671, 5, 'review', -1, -1, 'Three things i luv about this Cinema.  it has Amazing 3D sound, the picture quality is awesome too and how confutable the seats are. enough legroom between the seats for you to stretch your legs', 244),
(394, 1478344753, 5, 'business_follow', -1, -1, 'add_to_followed', 244),
(395, 1478345138, 72, 'review', -1, -1, 'Century Cinemax is back yet again as usual with Dr Strange, awesome movie. Crystal clear picture, a perfect 3D system and the 3D surround sound is incredible.\nThe place to watch movies.', 244),
(396, 1478345636, 61, 'business_follow', -1, -1, 'add_to_followed', 72),
(397, 1478511893, 7, 'review_photo', -1, -1, 'Creating a house like this one?', 241),
(398, 1479128416, 80, 'tip_welcome', 0, 0, '...', 1),
(399, 1479128541, 80, 'tip_search_friends', 0, 0, '...', 1),
(400, 1479128574, 80, 'tip_follow_businesses', 0, 0, '...', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed_photo`
--

CREATE TABLE IF NOT EXISTS `newsfeed_photo` (
  `id` int(30) NOT NULL,
  `newsfeed_id` int(30) NOT NULL,
  `photo` text NOT NULL,
  `date_created` int(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsfeed_photo`
--

INSERT INTO `newsfeed_photo` (`id`, `newsfeed_id`, `photo`, `date_created`) VALUES
(1, 51, 'uploads/img5on1471447749.jpg', 1471447749),
(2, 132, 'uploads/img5on1471984133.jpg', 1471984133),
(3, 138, 'uploads/img4on1472132927.jpg', 1472132927),
(4, 151, 'uploads/img4on1472141871.jpg', 1472141871),
(5, 154, 'uploads/img5on1472154698.jpg', 1472154698),
(6, 170, 'uploads/img4on1472193825.jpg', 1472193825),
(7, 397, 'uploads/Design Modulus Architects1478511970.png', 1478511970);

-- --------------------------------------------------------

--
-- Table structure for table `operator_ads_assigned`
--

CREATE TABLE IF NOT EXISTS `operator_ads_assigned` (
  `id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `date_assigned` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `price_group`
--

CREATE TABLE IF NOT EXISTS `price_group` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `push_user`
--

CREATE TABLE IF NOT EXISTS `push_user` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `push_user_id` text NOT NULL,
  `decive_id` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `push_user`
--

INSERT INTO `push_user` (`id`, `user_id`, `push_user_id`, `decive_id`) VALUES
(1, 3, 'bd8de651-9947-40f5-95ba-ef98f308179a', 'cYKqmVl72eo:APA91bG-osmaqfL9kzq9CPFTga6x6fKBkKdc3oDEp6idxNxDtp5E7oj9V0K-EFf5MeSL_5IccJXU3kMAtMyvCYKEFvL9RUSyIk7flqGFtWMAAgJt-1aBgrl-I1jELV4e28Hl5bSxy8wG'),
(2, 4, 'f9e81d81-8d58-44ca-8d29-bc1aa744d70b', 'undefined'),
(3, 4, 'f9e81d81-8d58-44ca-8d29-bc1aa744d70b', 'czL6mDp_uGw:APA91bHM4v6dBn0kYL2rUvKvI-BzxpakD7u04wCfiiedvaif-oohWeaMk-o2HTOKlZ8d-7OKOigiW1XITsKSBwc7-Z4S2vVHXefJewk08vNKnzYVnxTBh1azgzaR2P4JxbTOT2YdXAs1'),
(4, 4, 'f9e81d81-8d58-44ca-8d29-bc1aa744d70b', 'dK7DJlunSe4:APA91bHvjG28a6v5GNtDHMt1FumsURGVkSeakMIbzu26B3qdxGMPWvQfiWDg6T6nHNYv43-f4VEvuZG4LxI4cmGhvSnGDsL3Tqd4nLLbotWVlYwbua4ZsDWHdSDi28pObjqZClxSPzEU'),
(5, 4, 'f9e81d81-8d58-44ca-8d29-bc1aa744d70b', 'eAsSjTzHJ4M:APA91bHjW6TpPw7N7v64k59G_9hs_21u_lON1fSFvE0wmzyguV8T1kPMSwck3Z6L5XERDgnE8ftMtVJCDpoxblntX2Cy2Pmbu9mxSmSv5x13nyzno4SMhHcqjf2GaHNLERDWzttdrJS0'),
(6, 3, 'bd8de651-9947-40f5-95ba-ef98f308179a', 'cI8CH8CuRcE:APA91bFvr1VsIXAqX6ctvLUd7ZS5bJQA5GXxcPkG853k0Pc0fnh5D5lWzFDZ6H1lxmCUiNftl38pu2AzNSEJCBtG8nnBZg7MeVSE_4OmBAMx9luSStMY5--1uvKMy7A6P8ztWvQTh6DT'),
(7, 5, 'a849aacf-2883-4016-b7c0-5b8e5af43a62', 'cI8CH8CuRcE:APA91bFvr1VsIXAqX6ctvLUd7ZS5bJQA5GXxcPkG853k0Pc0fnh5D5lWzFDZ6H1lxmCUiNftl38pu2AzNSEJCBtG8nnBZg7MeVSE_4OmBAMx9luSStMY5--1uvKMy7A6P8ztWvQTh6DT'),
(8, 3, 'bd8de651-9947-40f5-95ba-ef98f308179a', 'undefined'),
(9, 2, '1b644ae6-64d4-4a59-ae7a-f879451ba569', 'undefined'),
(10, 5, 'a849aacf-2883-4016-b7c0-5b8e5af43a62', 'undefined'),
(11, 5, 'a849aacf-2883-4016-b7c0-5b8e5af43a62', 'eAsSjTzHJ4M:APA91bHjW6TpPw7N7v64k59G_9hs_21u_lON1fSFvE0wmzyguV8T1kPMSwck3Z6L5XERDgnE8ftMtVJCDpoxblntX2Cy2Pmbu9mxSmSv5x13nyzno4SMhHcqjf2GaHNLERDWzttdrJS0'),
(12, 4, 'f9e81d81-8d58-44ca-8d29-bc1aa744d70b', 'cXfXgGuHacU:APA91bHdXkR08IEe1RsZYmWpeTmeyyF9Ttm_I98mlNWOgeWC6Z-XXJHyx1b6Ki4Ekim59q3O5MaupexPapMMFo028Hp40aRAOdnoMc66p3LZv1nKuwsHObsnTLZw3wWfe0NEmllWQqBa'),
(13, 5, 'a849aacf-2883-4016-b7c0-5b8e5af43a62', 'cXfXgGuHacU:APA91bHdXkR08IEe1RsZYmWpeTmeyyF9Ttm_I98mlNWOgeWC6Z-XXJHyx1b6Ki4Ekim59q3O5MaupexPapMMFo028Hp40aRAOdnoMc66p3LZv1nKuwsHObsnTLZw3wWfe0NEmllWQqBa'),
(14, 4, 'f9e81d81-8d58-44ca-8d29-bc1aa744d70b', 'cxAdG43LIdE:APA91bE28aPE4i_8xwEYIcwtD9JtwUyjD8sKuDlLcLiBX50sXzlRAhw3o0p0lykPKjYlJzaCSMV-5fMlTPFn7cXJpoH16YVf7sIXRWXnuOk0qP3As6Gi_6kO7Cxhw2S9TS1-QzCnEqL2'),
(15, 5, 'a849aacf-2883-4016-b7c0-5b8e5af43a62', 'cxAdG43LIdE:APA91bE28aPE4i_8xwEYIcwtD9JtwUyjD8sKuDlLcLiBX50sXzlRAhw3o0p0lykPKjYlJzaCSMV-5fMlTPFn7cXJpoH16YVf7sIXRWXnuOk0qP3As6Gi_6kO7Cxhw2S9TS1-QzCnEqL2'),
(16, 5, 'a849aacf-2883-4016-b7c0-5b8e5af43a62', 'cn8CfAdYLas:APA91bEhqismVTsmz8R-ujluUepz7Ly2B9-OWkfemN_KCCZ3zSp0Mhlxzdi5rfF4uhfrZJSKCWphVUyjWOlUS1qsrSE9_fd2JDb1kfHojoV6j6koU95nWgNjTh51klncg2CmImttGMJY'),
(17, 4, 'f9e81d81-8d58-44ca-8d29-bc1aa744d70b', 'eKFtLCRaZ-U:APA91bGZGtUGb7BjUiuUkPvZXMHU1eoj3BZZ1fwIBb6f0UvgWtIiUBr0MLKE1di2ndTPayOJEIVC0a9eMqS9b65IzQsRMW0w4XD6xtbbuhejva5WjafQL8cS9VDzjyiFbRaSVHw--PVk'),
(18, 4, 'f9e81d81-8d58-44ca-8d29-bc1aa744d70b', 'd-rm7wGeMuI:APA91bFQn9AgKJp0c1D3HxYuzz8yoCVnCYfmJeYVq2bYZODWycnZMo-g76mVHxbWoMCxoeKWvGG4mp7quw_yx0ZljjtGdELAaw7YxNuK-5M_9qBQLVEIglVHKf8KM5WvZo3w7LsViEvP'),
(19, 4, 'f9e81d81-8d58-44ca-8d29-bc1aa744d70b', 'fi7eStl0UOQ:APA91bH-kc-aSAZ0JCgzm6od4v7f30n_hoHtJNBCD2zf-T_No2iPSHE-y96_rYQdYM1SyahwI1nGSzLVcj6Y1ubRPQPB9vlMg6fnprumdD4EaYDN1HE1ER3XfCu8WjQ-Yp0lISq2YG1i'),
(20, 4, 'f9e81d81-8d58-44ca-8d29-bc1aa744d70b', 'dVGXXgNbT0g:APA91bFDPPmCQTJr2NwTbSepymZs2aZzTY8pUdoZppoR_JHf5smtOTx8zT5YweFoK9g02CvnwYMqoWTjzKQzeWtf506Yqa5N4HDQ9i5eHplZ6CjxomnCX247jItYIWCBlVE7Whi0lliB'),
(21, 4, 'f9e81d81-8d58-44ca-8d29-bc1aa744d70b', 'eqV86yGXyEY:APA91bHpyGp_es4xPiJy9QRvb2adD2rtRTWfJ-wVcs1iHXI4KsjKA_XPUb9Liu0MnDUjhaYi7rZ1d9aouE7qSgncs2B_U5ApMBXp__1dyvx4TaNk0r-AoX-Q6n_Cyzzgm_SX1L76zZYB'),
(22, 19, 'f52e5295-296b-4a8f-8a8d-c9328248ca2a', 'epZ-Y_BPFBQ:APA91bEmuKSek7fcar0slkMdFRc7HlfqrOjnDBjl98zPVoPIn0wlQ-8hKEkWNmVnqTO3j4NF3Oi1bmVvKggLU_sQ2ijMmnnz0NYSzfpoZM6rczSRUrvN3b3kwB0WAbnOzQSi0hvMNRld'),
(23, 4, 'f9e81d81-8d58-44ca-8d29-bc1aa744d70b', 'dp18SKxZ53s:APA91bG9a8VchgBzLIv-mRYGnlUDU6XKRH00XwhUPzHT2foHvqgPe1o5t1IUmTXoHXurn9NOrfhwCRLZyOB-EK_z22SBjPNCPs8gI3uw4xCuXWPaCVLYQk19JRK_NdvN3xioLOxz_cUD'),
(24, 5, 'a849aacf-2883-4016-b7c0-5b8e5af43a62', 'fqwFdWZeOmo:APA91bE-xycMnzyR0YscdsKvScf8RYhJYQ82H534-ND_d4BSyO9OjM7E5r25CTi3FmHSVqAR7oExTWAGA9wTmq7YCDkF5PrVTbE8ZSId2WMmbNPmsrrMY_TFc2vacSg0WU6xN01QZZs2'),
(25, 4, 'f9e81d81-8d58-44ca-8d29-bc1aa744d70b', 'fqwFdWZeOmo:APA91bE-xycMnzyR0YscdsKvScf8RYhJYQ82H534-ND_d4BSyO9OjM7E5r25CTi3FmHSVqAR7oExTWAGA9wTmq7YCDkF5PrVTbE8ZSId2WMmbNPmsrrMY_TFc2vacSg0WU6xN01QZZs2'),
(26, 5, 'a849aacf-2883-4016-b7c0-5b8e5af43a62', 'dp18SKxZ53s:APA91bG9a8VchgBzLIv-mRYGnlUDU6XKRH00XwhUPzHT2foHvqgPe1o5t1IUmTXoHXurn9NOrfhwCRLZyOB-EK_z22SBjPNCPs8gI3uw4xCuXWPaCVLYQk19JRK_NdvN3xioLOxz_cUD'),
(27, 49, '0559b3a1-b574-42b4-ad68-27060326b701', 'dp18SKxZ53s:APA91bG9a8VchgBzLIv-mRYGnlUDU6XKRH00XwhUPzHT2foHvqgPe1o5t1IUmTXoHXurn9NOrfhwCRLZyOB-EK_z22SBjPNCPs8gI3uw4xCuXWPaCVLYQk19JRK_NdvN3xioLOxz_cUD'),
(28, 53, '27f5c278-4909-4e7e-b4ce-15a1ede771ce', 'undefined'),
(29, 4, 'f9e81d81-8d58-44ca-8d29-bc1aa744d70b', 'cb9Bu-Aox6s:APA91bFjf4d1qr-58X9KFLmBhVeZlAiFbTBoTyty-tvkGOectmM1UQDrCVco6enC9kJ7eJHYg1VbV9TYEogwZxl--bZxfuD0Fk0eGReSaY8Zu_LF3JzEl0t4R1HZcrClJYlzGnPemBlE'),
(30, 21, '1fd3fa39-e403-46a9-b28f-d729f5992549', 'undefined'),
(31, 4, 'f9e81d81-8d58-44ca-8d29-bc1aa744d70b', 'fGqBbBPtg08:APA91bEfDOaUOFLLrIlbpxjLQUhZcjiQa-Km1L2TUHIdTP36CKLFLrHJa23b8EhGQazjom3nBimAvYH_rWtyr3r6XJS87PEZOTMkoiHGzwuIbIp28cv--8LcFqhVF1m57JT1K5Ai-a6h'),
(32, 11, '1a56be38-09b5-41ab-b420-dc75f6068167', 'fqwFdWZeOmo:APA91bE-xycMnzyR0YscdsKvScf8RYhJYQ82H534-ND_d4BSyO9OjM7E5r25CTi3FmHSVqAR7oExTWAGA9wTmq7YCDkF5PrVTbE8ZSId2WMmbNPmsrrMY_TFc2vacSg0WU6xN01QZZs2'),
(33, 4, 'f9e81d81-8d58-44ca-8d29-bc1aa744d70b', 'eT54uIO379s:APA91bEoJ-9tg7lfoCCkMcg4nztLUQgPEmW9aEDS-UJKajw-UtnUCHEVVDD6b3fOdh3bqmfxnjuAIjaWcSAmtg6h7o0o2YSllIJ26gXtAJSGhx3n6andsqBJcKGVno8DctBhx7TTOvGm'),
(34, 5, 'a849aacf-2883-4016-b7c0-5b8e5af43a62', 'eT54uIO379s:APA91bEoJ-9tg7lfoCCkMcg4nztLUQgPEmW9aEDS-UJKajw-UtnUCHEVVDD6b3fOdh3bqmfxnjuAIjaWcSAmtg6h7o0o2YSllIJ26gXtAJSGhx3n6andsqBJcKGVno8DctBhx7TTOvGm'),
(35, 4, 'f9e81d81-8d58-44ca-8d29-bc1aa744d70b', 'erkNmDB8vQ8:APA91bEEIqwgoG9tjNCHVjk0l3Q2XmJjswne9cV-XA0gTpKTtBOXTd7FdIUqPZIkH-5Mzuf4cIBmspH_6AX_uMeHBZDRiG_Yem1HrZ3Bqxrx558iGbrHczKQZRpBzRMjWAiXaTqFkQcc'),
(36, 4, 'f9e81d81-8d58-44ca-8d29-bc1aa744d70b', 'egjbzMRDwlI:APA91bFIGQ2GWRVQCGfRLHojv9E_YmJqrs2SN8Iqnm7jWDzQ4SxdxwdEbvZc_HAoAjcHWCk7asXbepktzZ7MGabJ6YH2myOfxX8oMQhMSPoFk_NanDndFWffM3WEUWG1chAwKdV01Qud');

-- --------------------------------------------------------

--
-- Table structure for table `rating_rule`
--

CREATE TABLE IF NOT EXISTS `rating_rule` (
  `id` int(30) NOT NULL,
  `star_number` int(30) NOT NULL,
  `min_rule` int(30) NOT NULL,
  `max_rule` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `side_add`
--

CREATE TABLE IF NOT EXISTS `side_add` (
  `id` int(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `business_id` varchar(30) NOT NULL,
  `date_created` int(60) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(30) NOT NULL,
  `slide_image` varchar(100) NOT NULL,
  `business_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sponsored_search_results`
--

CREATE TABLE IF NOT EXISTS `sponsored_search_results` (
  `id` int(30) NOT NULL,
  `business_id` int(30) NOT NULL,
  `slide_image` text NOT NULL,
  `strength` int(30) NOT NULL DEFAULT '0',
  `date_created` int(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category_id` int(30) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=612 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `name`, `category_id`, `description`, `icon`) VALUES
(15, 'British', 7, ' ', 'restaurant23'),
(16, 'American ', 7, '', ' '),
(17, 'Breakfast and Brunch', 7, ' ', ' '),
(18, 'Burges', 7, ' ', ' '),
(19, 'Cafes', 7, ' ', ' '),
(20, 'Caribbean', 7, ' ', ' '),
(21, 'Chicken shop', 7, ' ', ' '),
(22, 'Chinese', 7, ' ', ' '),
(23, 'Cuban', 7, ' ', ' '),
(24, 'Delis', 7, ' ', ' '),
(25, 'Diners', 7, ' ', ' '),
(26, 'Ethiopian', 7, ' ', ' '),
(27, 'Fast Food', 7, ' ', ' '),
(28, 'Filipino', 7, ' ', ' '),
(29, 'Fish & Chips', 7, ' ', ' '),
(30, 'Food Stands', 7, ' ', ' '),
(31, 'French', 7, ' ', ' '),
(32, 'German', 7, ' ', ' '),
(33, 'Hot dogs', 7, ' ', ' '),
(34, 'Hot pot', 7, ' ', ' '),
(35, 'Indian', 7, ' ', ' '),
(36, 'Italian', 7, ' ', ' '),
(37, 'Japanese', 7, ' ', ' '),
(38, 'Kebab', 7, ' ', ' '),
(39, 'Korean', 7, ' ', ' '),
(40, 'African cuisine', 7, '', ' '),
(41, 'Latin American', 7, ' ', ' '),
(42, 'Food court', 7, ' ', ' '),
(43, 'Mexican', 7, ' ', ' '),
(44, 'Middle Eastern', 7, ' ', ' '),
(45, 'Modern European', 7, ' ', ' '),
(46, 'Pakistani', 7, ' ', ' '),
(47, 'Pizza', 7, ' ', ' '),
(48, 'Salad', 7, ' ', ' '),
(49, 'Sandwiches', 7, ' ', ' '),
(50, 'Seafood', 7, ' ', ' '),
(51, 'Soup', 7, ' ', ' '),
(52, 'Steakhouses', 7, ' ', ' '),
(53, 'Sushi bars', 7, ' ', ' '),
(54, 'Auto Detailing', 8, ' ', ' '),
(55, 'Auto Glass Services', 8, ' ', ' '),
(56, 'Auto Parts & Supplies', 8, ' ', ' '),
(57, 'Auto Repair', 8, ' ', ' '),
(58, 'Body Shops', 8, ' ', ' '),
(59, 'Car Dealers', 8, ' ', ' '),
(60, 'Car Stereo Installation', 8, ' ', ' '),
(61, 'Car Wash', 8, ' ', ' '),
(62, 'Gas & Service Stations', 8, ' ', ' '),
(63, 'Motorcycle Dealers', 8, ' ', ' '),
(64, 'Motorcycle Repair', 8, ' ', ' '),
(65, 'Oil Change Stations', 8, ' ', ' '),
(66, 'Parking', 8, ' ', ' '),
(67, 'Smog Check Stations', 8, ' ', ' '),
(68, 'Tires', 8, ' ', ' '),
(69, 'Towing', 8, ' ', ' '),
(70, 'Vehicle Shipping', 8, ' ', ' '),
(71, 'Windshield Installation & Repair', 8, ' ', ' '),
(72, 'Adult Education', 11, ' ', ' '),
(73, 'Art Classes', 11, ' ', ' '),
(74, 'Art Schools', 11, ' ', ' '),
(75, 'Cheese Tasting classes', 11, ' ', ' '),
(76, 'Cooking Schools', 11, ' ', ' '),
(77, 'Cosmetology', 11, ' ', ' '),
(78, 'Schools', 11, ' ', ' '),
(79, 'Dance Schools', 11, ' ', ' '),
(80, 'Driving Schools', 11, ' ', ' '),
(81, 'Educational Services', 11, ' ', ' '),
(82, 'Elementary Schools', 11, ' ', ' '),
(83, 'First Aid Classes', 11, ' ', ' '),
(84, 'High Schools & Middle Schools', 11, ' ', ' '),
(85, 'Language Schools', 11, ' ', ' '),
(86, 'Massage Schools', 11, ' ', ' '),
(87, 'Medical School', 11, ' ', ' '),
(88, 'Nursing Schools', 11, ' ', ' '),
(89, 'Parenting Classes', 11, ' ', ' '),
(90, 'Pole Dancing Classes', 11, ' ', ' '),
(91, 'Preschools', 11, ' ', ' '),
(92, 'Private Tutors', 11, ' ', ' '),
(93, 'Special Schools', 11, ' ', ' '),
(94, 'Specialty Schools', 11, ' ', ' '),
(95, 'Tasting Classes', 11, ' ', ' '),
(96, 'Test Preparation', 11, ' ', ' '),
(97, 'Universities & Colleges', 11, ' ', ' '),
(98, 'Tutoring Centres', 11, ' ', ' '),
(99, 'Vocational & Technical School', 11, ' ', ' '),
(100, 'Wine Tasting Classes', 11, '', ' '),
(101, 'Cards & Stationery', 12, ' ', ' '),
(102, 'Caterers', 12, ' ', ' '),
(103, 'Clowns', 12, ' ', ' '),
(104, 'DJs', 12, ' ', ' '),
(105, 'Print Media ', 13, '', ' '),
(106, 'Musicians', 12, ' ', ' '),
(107, 'Party & Event Planning', 12, ' ', ' '),
(108, 'Party Characters', 12, ' ', ' '),
(109, 'Party Supplies', 12, ' ', ' '),
(110, 'Personal Chefs', 12, ' ', ' '),
(111, 'Photo Booth Rentals', 12, ' ', ' '),
(112, 'Radio Stations', 13, ' ', ' '),
(113, 'Photographers', 12, ' ', ' '),
(114, 'Rest Stops', 12, ' ', ' '),
(115, 'Venues & Event Spaces', 12, ' ', ' '),
(116, 'Television Stations', 13, ' ', ' '),
(117, 'Videographers', 12, ' ', ' '),
(118, 'Wedding Planning', 12, ' ', ' '),
(119, 'Alcohol', 14, ' ', ' '),
(120, 'Body care products', 14, ' ', ' '),
(121, 'Construction material', 14, ' ', ' '),
(122, 'Detergents', 14, ' ', ' '),
(123, 'Energy', 14, ' ', ' '),
(124, 'Food', 14, ' ', ' '),
(125, 'Furniture', 14, ' ', ' '),
(126, 'Plastics', 14, ' ', ' '),
(127, 'Paper manufacturing', 14, ' ', ' '),
(128, 'Pharmaceutical', 14, ' ', ' '),
(129, 'Soft drinks', 14, ' ', ' '),
(130, 'Apartments', 15, ' ', ' '),
(131, 'Textile', 14, ' ', ' '),
(132, 'Building Supplies', 15, ' ', ' '),
(133, 'Cabinetry', 15, ' ', ' '),
(134, 'Carpenters', 15, ' ', ' '),
(135, 'Airlines', 16, ' ', ' '),
(136, 'Carpet Installation', 15, ' ', ' '),
(137, 'Airport Shuttles', 16, ' ', ' '),
(138, 'Carpeting', 15, ' ', ' '),
(139, 'Airports', 16, ' ', ' '),
(140, 'Architectural Tours', 16, ' ', ' '),
(141, 'Chimney Sweeps', 15, ' ', ' '),
(142, 'Art Tours', 16, ' ', ' '),
(143, 'Bed & Breakfast', 16, ' ', ' '),
(144, 'Contractors', 15, ' ', ' '),
(145, 'Bike Sharing', 16, ' ', ' '),
(146, 'Concrete', 15, ' ', ' '),
(147, 'Bus Tours / Bike Tours', 16, ' ', ' '),
(148, 'Buses', 16, ' ', ' '),
(149, 'Campgrounds', 16, ' ', ' '),
(150, 'Car Rentals', 16, ' ', ' '),
(151, 'Countertop Installation', 15, ' ', ' '),
(152, 'Food Tours', 16, ' ', ' '),
(153, 'Electricians', 15, ' ', ' '),
(154, 'Guest Houses', 16, ' ', ' '),
(155, 'Health Retreats', 16, ' ', ' '),
(156, 'Historical Tours', 16, ' ', ' '),
(157, 'Estate Liquidation', 15, ' ', ' '),
(158, 'Hotels', 16, ' ', ' '),
(159, 'Hostels', 16, ' ', ' '),
(160, 'Public Transportation', 16, ' ', ' '),
(161, 'RV Rentals', 16, ' ', ' '),
(162, 'Resorts', 16, ' ', ' '),
(163, 'Fire Protection Services', 15, ' ', ' '),
(164, 'Rest Stops', 16, ' ', ' '),
(165, 'Ski Resorts', 16, ' ', ' '),
(166, 'Taxis', 16, ' ', ' '),
(167, 'Fireplace Services', 15, ' ', ' '),
(168, 'Tours', 16, ' ', ' '),
(169, 'Train Stations', 16, ' ', ' '),
(170, 'Flooring', 15, ' ', ' '),
(171, 'Travel Services', 16, ' ', ' '),
(172, 'Vacation Rental Agents', 16, ' ', ' '),
(173, 'Vacation Rentals', 16, ' ', ' '),
(174, 'Walking Tours', 16, ' ', ' '),
(175, 'Furniture Assembly', 15, ' ', ' '),
(176, 'Wine Tours', 16, ' ', ' '),
(177, 'Gardeners', 15, ' ', ' '),
(178, 'Glass & Mirrors', 15, ' ', ' '),
(179, 'Gutter Services', 15, ' ', ' '),
(180, 'Handyman', 15, ' ', ' '),
(181, 'Heating & Air conditioning', 15, ' ', ' '),
(182, 'Home Cleaning', 15, ' ', ' '),
(183, 'Home Inspectors', 15, ' ', ' '),
(184, 'Accountants', 17, ' ', ' '),
(185, 'Advertising', 17, ' ', ' '),
(186, 'Archaising', 17, ' ', ' '),
(187, 'Home Staging', 15, ' ', ' '),
(188, 'Bankruptcy Law', 17, ' ', ' '),
(189, 'Boat Repair', 17, ' ', ' '),
(190, 'Career Counselling', 17, ' ', ' '),
(191, 'Home Theatre Installation', 15, ' ', ' '),
(192, 'Criminal Defence Law', 17, ' ', ' '),
(193, 'Directory', 17, ' ', ' '),
(194, 'Interior Design', 15, ' ', ' '),
(195, 'Divorce & Family Law', 17, ' ', ' '),
(196, 'Employment Agencies', 17, ' ', ' '),
(197, 'Employment Law', 17, ' ', ' '),
(198, 'Internet Service Providers', 15, ' ', ' '),
(199, 'Estate Planning Law', 17, ' ', ' '),
(200, 'General Litigation', 17, ' ', ' '),
(201, 'Graphic Design', 17, ' ', ' '),
(202, 'Keys & Locksmiths', 15, ' ', ' '),
(203, 'Immigration Law', 17, ' ', ' '),
(204, 'Internet Service Providers', 17, ' ', ' '),
(205, 'Lawyers', 17, ' ', ' '),
(206, 'Life Coach', 17, ' ', ' '),
(207, 'Landscape Architects', 15, ' ', ' '),
(208, 'Marketing', 17, ' ', ' '),
(209, 'Music Production Services', 17, ' ', ' '),
(210, 'Landscaping', 15, ' ', ' '),
(211, 'Office Cleaning', 17, ' ', ' '),
(212, 'Personal Injury Law', 17, ' ', ' '),
(213, 'Private Investigation', 17, ' ', ' '),
(214, 'Public Relations', 17, ' ', ' '),
(215, 'Lightening Fixtures & Equipment', 15, ' ', ' '),
(216, 'Real Estate Law', 17, ' ', ' '),
(217, 'Security Services', 17, ' ', ' '),
(218, 'Software Development', 17, ' ', ' '),
(219, 'Mobile Home Dealers', 15, ' ', ' '),
(220, 'Talent Agencies', 17, ' ', ' '),
(221, 'Video/Film Production', 17, ' ', ' '),
(222, 'Mortgage Brokers', 15, ' ', ' '),
(223, 'Web Design', 17, ' ', ' '),
(224, 'Painters', 15, ' ', ' '),
(225, 'Manufacture', 17, ' ', ' '),
(226, 'Movers', 15, ' ', ' '),
(227, 'Plumbing', 15, ' ', ' '),
(228, 'Pool & Hot tub Services', 15, ' ', ' '),
(229, 'Pressure washers', 15, ' ', ' '),
(230, 'Accessories', 9, ' ', ' '),
(231, 'Adult Education', 9, ' ', ' '),
(232, 'Property Management', 15, ' ', ' '),
(233, 'Real Estate', 15, ' ', ' '),
(234, 'Real Estate Agents', 15, ' ', ' '),
(235, 'Real Estate Services', 15, ' ', ' '),
(236, 'Refurnishing Services', 15, ' ', ' '),
(237, 'Roofing', 15, ' ', ' '),
(238, 'Security Systems', 15, ' ', ' '),
(239, 'Shades & Blinds', 15, ' ', ' '),
(240, 'Shutters', 15, ' ', ' '),
(241, 'Solar Installation', 15, ' ', ' '),
(242, 'Structural Engineers', 15, ' ', ' '),
(243, 'Tree Services', 15, ' ', ' '),
(244, 'University Housing', 15, ' ', ' '),
(245, 'Water Heater Installation/ Repair', 15, ' ', ' '),
(246, 'Water Purification Services', 15, ' ', ' '),
(247, 'Window Washing', 15, ' ', ' '),
(248, 'Window Installation', 15, ' ', ' '),
(249, 'Adult', 9, ' ', ' '),
(250, 'Antiques', 9, ' ', ' '),
(251, 'Appliances', 9, ' ', ' '),
(252, 'Art Galleries', 9, ' ', ' '),
(253, 'Art Supplies', 9, ' ', ' '),
(254, 'Arts & Crafts', 9, ' ', ' '),
(255, 'Baby Gear & Furniture', 9, ' ', ' '),
(256, 'Battery Stores', 9, ' ', ' '),
(257, 'Bikes', 9, ' ', ' '),
(258, 'Books, Mags, Music & Video', 9, ' ', ' '),
(259, 'Book Stores', 9, '', ' '),
(260, 'Brewing Supplies', 9, ' ', ' '),
(261, 'Bridal', 9, ' ', ' '),
(262, 'Cards & Stationery', 9, ' ', ' '),
(263, 'Children’s Clothing', 9, ' ', ' '),
(264, 'Christmas Trees', 9, ' ', ' '),
(265, 'Clothing Rental', 9, ' ', ' '),
(266, 'Comic Books', 9, ' ', ' '),
(267, 'Computers', 9, ' ', ' '),
(268, 'Concept Shops', 9, ' ', ' '),
(269, 'Cooking Classes', 9, ' ', ' '),
(270, 'Cosmetics & Beauty Supply', 9, ' ', ' '),
(271, 'Costumes', 9, ' ', ' '),
(272, 'Customised Merchandise', 9, ' ', ' '),
(273, 'Department Stores', 9, ' ', ' '),
(274, 'Drugstores', 9, ' ', ' '),
(275, 'Electronics', 9, ' ', ' '),
(276, 'Eyewear & Opticians', 9, ' ', ' '),
(277, 'Fabric Stores', 9, ' ', ' '),
(278, 'Faming Equipment', 9, ' ', ' '),
(279, 'Fashion', 9, ' ', ' '),
(280, 'Fitness/Exercise Equipment', 9, ' ', ' '),
(281, 'Flea Market', 9, ' ', ' '),
(282, 'Florists', 9, ' ', ' '),
(283, 'Flowers & Gifts', 9, ' ', ' '),
(284, 'Framing', 9, ' ', ' '),
(285, 'Furniture Stores', 9, ' ', ' '),
(286, 'Gift Equipment Shops', 9, ' ', ' '),
(287, 'Hardware Stores', 9, ' ', ' '),
(288, 'Hats', 9, ' ', ' '),
(289, 'Head Shops', 9, ' ', ' '),
(290, 'High Fidelity Audio Equipment', 9, ' ', ' '),
(291, 'Hobby Shops', 9, ' ', ' '),
(292, 'Home & Garden', 9, ' ', ' '),
(293, 'Home Decor', 9, ' ', ' '),
(294, 'Hot Tub & Pool', 9, ' ', ' '),
(295, 'Jewellery', 9, ' ', ' '),
(296, 'Kiosk', 9, ' ', ' '),
(297, 'Kitchen & Bath', 9, ' ', ' '),
(298, 'Knitting Supplies', 9, ' ', ' '),
(299, 'Leather Goods', 9, ' ', ' '),
(300, 'Lingerie', 9, ' ', ' '),
(301, 'Livestock Freed & Supply', 9, ' ', ' '),
(302, 'Luggage', 9, ' ', ' '),
(303, 'Maternity Wear', 9, ' ', ' '),
(304, 'Marttresses', 9, ' ', ' '),
(305, 'Men’s clothing', 9, ' ', ' '),
(306, 'Mobile Phones', 9, ' ', ' '),
(307, 'Motorcycle Gear', 9, ' ', ' '),
(308, 'Music & DVDs', 9, ' ', ' '),
(309, 'Musical Instruments & Teaches', 9, ' ', ' '),
(310, 'Newspapers & Magazines', 9, ' ', ' '),
(311, 'Nurseries & Gardening', 9, ' ', ' '),
(312, 'Office Equipment', 9, ' ', ' '),
(313, 'Outdoor Gear', 9, ' ', ' '),
(314, 'Outlet Stores', 9, ' ', ' '),
(315, 'Pawn Shops', 9, ' ', ' '),
(316, 'Perfume', 9, ' ', ' '),
(317, 'Personal Shopping', 9, ' ', ' '),
(318, 'Photography Stores & Services', 9, ' ', ' '),
(319, 'Plus Size Fashion', 9, ' ', ' '),
(320, 'Pool & Billiards', 9, ' ', ' '),
(321, 'Pop-up Shops', 9, ' ', ' '),
(322, 'Rugs', 9, ' ', ' '),
(323, 'Shoe Stores', 9, ' ', ' '),
(324, 'Skate Shops', 9, ' ', ' '),
(325, 'Souvenir Shops', 9, ' ', ' '),
(326, 'Spiritual Shop', 9, ' ', ' '),
(327, 'Sporting Goods', 9, ' ', ' '),
(328, 'Sports Wear', 9, ' ', ' '),
(329, 'Surf Shops', 9, ' ', ' '),
(330, 'Swimwear', 9, ' ', ' '),
(331, 'Thrift Shops', 9, ' ', ' '),
(332, 'Tobacco Shops', 9, ' ', ' '),
(333, 'Toy Stores', 9, ' ', ' '),
(334, 'Uniforms', 9, ' ', ' '),
(335, 'Used Book Stores', 9, '', ' '),
(336, 'Used, Vintage & Consignment', 9, ' ', ' '),
(337, 'Vape Shops', 9, ' ', ' '),
(338, 'Video Game Stores', 9, ' ', ' '),
(339, 'Vinyl Records', 9, ' ', ' '),
(340, 'Watches', 9, ' ', ' '),
(341, 'Wholesale Stores', 9, ' ', ' '),
(342, 'Women’s Clothing', 9, ' ', ' '),
(343, 'Shopping Mall', 9, ' ', ' '),
(344, 'Shopping Arcades', 9, ' ', ' '),
(345, 'Banks & credit Unions', 20, ' ', ' '),
(346, 'Checks Cashing/Payday Loans', 20, ' ', ' '),
(347, 'Currency Exchanges', 20, ' ', ' '),
(348, 'Financial Advising', 20, ' ', ' '),
(349, 'Home & Rental Insurance', 20, ' ', ' '),
(350, 'Insurance', 20, ' ', ' '),
(351, 'Investing', 20, ' ', ' '),
(352, 'Tax Services', 20, ' ', ' '),
(353, 'Money Transfer & Remittances', 20, ' ', ' '),
(354, 'Apartments', 21, ' ', ' '),
(355, 'Estate Liquidation', 21, ' ', ' '),
(356, 'Home Staging', 21, ' ', ' '),
(357, 'Mobile Home Dealers', 21, ' ', ' '),
(358, 'Mortgage Brokers', 21, ' ', ' '),
(359, 'Property Management', 21, ' ', ' '),
(360, 'Real Estate Agents', 21, ' ', ' '),
(361, 'Real Estate Services', 21, ' ', ' '),
(362, 'Shared office Spaces', 21, ' ', ' '),
(363, 'University Housing', 21, ' ', ' '),
(364, 'Amateur Sports Teams', 23, ' ', ' '),
(365, 'Amusement Parts', 23, ' ', ' '),
(366, 'Aquariums', 23, ' ', ' '),
(367, 'Archery', 23, ' ', ' '),
(368, 'Badminton', 23, ' ', ' '),
(369, 'Basketball Courts', 23, ' ', ' '),
(370, 'Beaches', 23, ' ', ' '),
(371, 'Bike Rentals', 23, ' ', ' '),
(372, 'Boating', 23, ' ', ' '),
(373, 'Bowling', 23, ' ', ' '),
(374, 'Boxing', 23, ' ', ' '),
(375, 'Cardio Classes', 23, ' ', ' '),
(376, 'Climbing', 23, ' ', ' '),
(377, 'Cycling Classes', 23, ' ', ' '),
(378, 'Dance Studios', 23, ' ', ' '),
(379, 'Day Camps', 23, ' ', ' '),
(380, 'Disc Golf', 23, ' ', ' '),
(381, 'Escape Games', 23, ' ', ' '),
(382, 'Fencing Clubs', 23, ' ', ' '),
(383, 'Fishing', 23, ' ', ' '),
(384, 'Fitness & Instructions', 23, ' ', ' '),
(385, 'GO Karts', 23, ' ', ' '),
(386, 'Golf', 23, ' ', ' '),
(387, 'Gun/Rifle Ranges', 23, ' ', ' '),
(388, 'Gyms', 23, ' ', ' '),
(389, 'Hiking', 23, ' ', ' '),
(390, 'Horseback Riding', 23, ' ', ' '),
(391, 'Hot Air Balloons', 23, ' ', ' '),
(392, 'Jet Skis', 23, ' ', ' '),
(393, 'Kids Activities', 23, ' ', ' '),
(394, 'Kiteboarding', 23, ' ', ' '),
(395, 'Lakes', 23, ' ', ' '),
(396, 'laser Tag', 23, ' ', ' '),
(397, 'Leisure Centres', 23, ' ', ' '),
(398, 'Martial Arts', 23, ' ', ' '),
(399, 'Meditation Centres', 23, ' ', ' '),
(400, 'Mini Golf', 23, ' ', ' '),
(401, 'Mountain Biking', 23, ' ', ' '),
(402, 'Paintball', 23, ' ', ' '),
(403, 'Parks', 23, ' ', ' '),
(404, 'Pilates', 23, ' ', ' '),
(405, 'Playgrounds', 23, ' ', ' '),
(406, 'Public plazas', 23, ' ', ' '),
(407, 'Rafting / Kayaking', 23, ' ', ' '),
(408, 'Recreation Centres', 23, ' ', ' '),
(409, 'Sailing', 23, ' ', ' '),
(410, 'Scuba Diving', 23, ' ', ' '),
(411, 'Skate Parks', 23, ' ', ' '),
(412, 'Skating Rinks', 23, ' ', ' '),
(413, 'Skydiving', 23, ' ', ' '),
(414, 'Snorkeling', 23, ' ', ' '),
(415, 'Soccer', 23, ' ', ' '),
(416, 'Sports Clubs', 23, ' ', ' '),
(417, 'Squash', 23, ' ', ' '),
(418, 'Summer Camps', 23, ' ', ' '),
(419, 'Swimming Lessons/Schools', 23, ' ', ' '),
(420, 'Swimming Pools', 23, ' ', ' '),
(421, 'Tennis', 23, ' ', ' '),
(422, 'Trainers', 23, ' ', ' '),
(423, 'Yoga', 23, ' ', ' '),
(424, 'Zoos', 23, ' ', ' '),
(425, 'Arcades', 18, ' ', ' '),
(426, 'Art Galleries', 18, ' ', ' '),
(427, 'Betting Centres', 18, ' ', ' '),
(428, 'Botanical Gardens', 18, ' ', ' '),
(429, 'Cabaret', 18, ' ', ' '),
(430, 'Casinos', 18, ' ', ' '),
(431, 'Choirs', 18, ' ', ' '),
(432, 'Christmas Markets', 18, ' ', ' '),
(433, 'Cinema', 18, ' ', ' '),
(434, 'Cultural Center', 18, ' ', ' '),
(435, 'Farms', 18, ' ', ' '),
(436, 'Festivals', 18, ' ', ' '),
(437, 'Jazz & Blues', 18, ' ', ' '),
(438, 'Museums', 18, ' ', ' '),
(439, 'Music Venues', 18, ' ', ' '),
(440, 'Observatories', 18, ' ', ' '),
(441, 'Opera & Ballet', 18, ' ', ' '),
(442, 'Performing Arts', 18, ' ', ' '),
(443, 'Planetarium Professional Sports Teams', 18, ' ', ' '),
(444, 'Psychics & Astrologers', 18, ' ', ' '),
(445, 'Race Tracks', 18, ' ', ' '),
(446, 'Social Clubs', 18, ' ', ' '),
(447, 'Stadiums & Arenas', 18, ' ', ' '),
(448, 'Wine Tasting Room', 18, ' ', ' '),
(449, 'Wineries', 18, ' ', ' '),
(450, 'Acupuncture', 19, ' ', ' '),
(451, 'Cardiologists', 19, ' ', ' '),
(452, 'Cosmetic Dentists', 19, ' ', ' '),
(453, 'Cosmetic Surgeons', 19, ' ', ' '),
(454, 'Counselling & mental Health', 19, ' ', ' '),
(455, 'Dentists', 19, ' ', ' '),
(456, 'Dermatologists', 19, ' ', ' '),
(457, 'Diagnostic services', 19, ' ', ' '),
(458, 'Doctors', 19, ' ', ' '),
(459, 'Ear Nose & Throat Specialist', 19, ' ', ' '),
(460, 'Family Practice', 19, ' ', ' '),
(461, 'Fertility', 19, ' ', ' '),
(462, 'General Dentistry', 19, ' ', ' '),
(463, 'Gerontologists', 19, ' ', ' '),
(464, 'Habilitation Services', 19, ' ', ' '),
(465, 'Hearing Aid Providers', 19, ' ', ' '),
(466, 'Hospitals', 19, ' ', ' '),
(467, 'Medical Centres', 19, ' ', ' '),
(468, 'Pharmacy', 19, ' ', ' '),
(469, 'Physical Therapy', 19, ' ', ' '),
(470, 'Sport Medicine', 19, ' ', ' '),
(471, 'Tattoo Removal', 19, ' ', ' '),
(472, 'Weight Loss Centres', 19, ' ', ' '),
(473, 'General Physician', 19, ' ', ' '),
(474, 'Paediatrician', 19, ' ', ' '),
(475, 'Gynaecologist', 19, ' ', ' '),
(476, 'Audiologist', 19, ' ', ' '),
(477, 'Allergist', 19, ' ', ' '),
(478, 'Anesthesiologist', 19, ' ', ' '),
(479, 'Endocrinologist', 19, ' ', ' '),
(480, 'Epidemiologist', 19, ' ', ' '),
(481, 'Immunologist', 19, ' ', ' '),
(482, 'Infectious Disease Specialist', 19, ' ', ' '),
(483, 'Internal Medicine Specialist', 19, ' ', ' '),
(484, 'Neonatologist', 19, ' ', ' '),
(485, 'Neurologist', 19, ' ', ' '),
(486, 'Neurosurgeon', 19, ' ', ' '),
(487, 'Obstetrician', 19, ' ', ' '),
(488, 'Oncologist', 19, ' ', ' '),
(489, 'Orthopaedic Surgeon', 19, ' ', ' '),
(490, 'Radiologist', 19, ' ', ' '),
(491, 'Rheumatologist', 19, ' ', ' '),
(492, 'Surgeon', 19, ' ', ' '),
(493, 'Urologist', 19, ' ', ' '),
(494, '3D Printing', 22, ' ', ' '),
(495, 'Adoption Services', 22, ' ', ' '),
(496, 'Appliances & Repairs', 22, ' ', ' '),
(497, 'Appraisal Services', 22, ' ', ' '),
(498, 'Art Restoration', 22, ' ', ' '),
(499, 'Bike Repair/Maintenance', 22, ' ', ' '),
(500, 'Bookbinding', 22, ' ', ' '),
(501, 'Carpet Cleaning', 22, ' ', ' '),
(502, 'Child Care & Day Care', 22, ' ', ' '),
(503, 'Community Services / Non-Profit', 22, ' ', ' '),
(504, 'Couriers & Delivery Services', 22, ' ', ' '),
(505, 'Dry Cleaning & Laundry', 22, ' ', ' '),
(506, 'Electronics Repair', 22, ' ', ' '),
(507, 'Engraving', 22, ' ', ' '),
(508, 'Farm Equipment Repair', 22, ' ', ' '),
(509, 'Funeral Services & Cemeteries', 22, ' ', ' '),
(510, 'Furniture Repairs', 22, ' ', ' '),
(511, 'Furniture Reupholstery', 22, ' ', ' '),
(512, 'Guitar Stores', 22, ' ', ' '),
(513, 'IT Services & Computer Repairs', 22, ' ', ' '),
(514, 'Junk Removal & Hauling', 22, ' ', ' '),
(515, 'Machine & Tool Rental', 22, ' ', ' '),
(516, 'Metal Fabrications', 22, ' ', ' '),
(517, 'Mobile Phone Repair', 22, ' ', ' '),
(518, 'Musical Instruments Services', 22, ' ', ' '),
(519, 'Nanny Services', 22, ' ', ' '),
(520, 'Notaries', 22, ' ', ' '),
(521, 'Pest Control', 22, ' ', ' '),
(522, 'Piano Services', 22, ' ', ' '),
(523, 'Piano Stores', 22, ' ', ' '),
(524, 'Printing Services', 22, ' ', ' '),
(525, 'Propane', 22, ' ', ' '),
(526, 'Recording & Rehearsal Studios', 22, ' ', ' '),
(527, 'Recycling Center', 22, ' ', ' '),
(528, 'Screen Printing', 22, ' ', ' '),
(529, 'Self Storage', 22, ' ', ' '),
(530, 'Sewing & Alterations', 22, ' ', ' '),
(531, 'Shipping Centres', 22, ' ', ' '),
(532, 'Shoe Repair', 22, ' ', ' '),
(533, 'Snow Removal', 22, ' ', ' '),
(534, 'Telecommunications', 22, ' ', ' '),
(535, 'Watch Repair', 22, ' ', ' '),
(536, 'Energy', 22, ' ', ' '),
(537, 'Construction material', 22, ' ', ' '),
(538, 'Transportation', 22, ' ', ' '),
(539, 'Barbers', 10, ' ', ' '),
(540, 'Cosmetics & Beauty Supply', 10, ' ', ' '),
(541, 'Day Spas', 10, ' ', ' '),
(542, 'Eyelash Service', 10, ' ', ' '),
(543, 'Hair Extensions', 10, ' ', ' '),
(544, 'Hair Removal', 10, ' ', ' '),
(545, 'Salons', 10, '', ' '),
(546, 'Last Hair Removal', 10, ' ', ' '),
(547, 'Makeup Artistis', 10, ' ', ' '),
(548, 'Massage', 10, '', ' '),
(549, 'Medical Spas', 10, ' ', ' '),
(550, 'Nail Salons', 10, ' ', ' '),
(551, 'Perfume', 10, ' ', ' '),
(552, 'Paramagnet Makeup', 10, ' ', ' '),
(553, 'Piercing', 10, ' ', ' '),
(554, 'Skins Care', 10, ' ', ' '),
(555, 'Spray Tanning', 10, ' ', ' '),
(556, 'Tanning', 10, ' ', ' '),
(557, 'Tanning Beds', 10, ' ', ' '),
(558, 'Tattoo Removal', 10, ' ', ' '),
(559, 'Teeth Whitening', 10, ' ', ' '),
(560, 'Waxing', 10, ' ', ' '),
(561, 'Bakeries', 24, ' ', ' '),
(562, 'Beer, Wine & Spirits', 24, ' ', ' '),
(563, 'Candy Stores', 24, ' ', ' '),
(564, 'Cheese Shops', 24, ' ', ' '),
(565, 'Chocolatiers & Shops', 24, ' ', ' '),
(566, 'Coffee & Tea', 24, ' ', ' '),
(567, 'Convenience Stores', 24, ' ', ' '),
(568, 'Cupcakes', 24, ' ', ' '),
(569, 'Delicatessen', 24, ' ', ' '),
(570, 'Desserts', 24, ' ', ' '),
(571, 'Donuts', 24, ' ', ' '),
(572, 'Farmers Market', 24, ' ', ' '),
(573, 'Food Delivery Services', 24, ' ', ' '),
(574, 'Fruits & Veggies', 24, ' ', ' '),
(575, 'Grocery', 24, ' ', ' '),
(576, 'Ice Cream & Frozen Yogurt', 24, ' ', ' '),
(577, 'Internet Cafes', 24, ' ', ' '),
(578, 'Juice Bars & Smoothies', 24, ' ', ' '),
(579, 'Meat Shops', 24, ' ', ' '),
(580, 'Patisserie/Cake Shop', 24, ' ', ' '),
(581, 'Seafood Markets', 24, ' ', ' '),
(582, 'Street Vendors', 24, ' ', ' '),
(583, 'Tea Rooms', 24, ' ', ' '),
(584, 'Wine Tasting Room', 24, ' ', ' '),
(585, 'Wineries', 24, ' ', ' '),
(586, 'Food Court', 24, ' ', ' '),
(587, 'International Schools', 11, ' ', ' '),
(588, 'Belgian', 7, ' ', ' '),
(589, 'Kamuli', 3, 'Its in Eastern region', ''),
(590, 'Supermarkets', 9, '', ''),
(591, 'Wines and Alcohols', 9, '', ''),
(592, 'Adult Entertainment ', 25, '', ''),
(593, 'Champagne Bars ', 25, '', ''),
(594, 'Cocktail Bars ', 25, '', ''),
(595, 'Comedy Clubs ', 25, '', ''),
(596, 'Clubs', 25, '', ''),
(597, 'Dive Bars  ', 25, '', ''),
(598, 'Live Music', 25, '', ''),
(599, 'Karaoke', 25, '', ''),
(600, 'Lounges', 25, '', ''),
(601, 'Piano Bars ', 25, '', ''),
(602, 'Pool Halls ', 25, '', ''),
(603, 'Pubs', 25, '', ''),
(604, 'Shisha / Hookah Bars', 25, '', ''),
(605, ' Sports Bars ', 25, '', ''),
(606, 'Wine Bars ', 25, '', ''),
(607, 'Stadium', 23, '', ''),
(608, 'Office Space', 21, '', ''),
(609, 'Rolex Joint', 24, '', ''),
(610, 'Eye doctor', 19, '', ''),
(611, 'Business Consulting', 17, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_ads_assigned`
--

CREATE TABLE IF NOT EXISTS `supervisor_ads_assigned` (
  `id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `date_assigned` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `assigned` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_team`
--

CREATE TABLE IF NOT EXISTS `supervisor_team` (
  `id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor_team`
--

INSERT INTO `supervisor_team` (`id`, `supervisor_id`, `operator_id`, `date`) VALUES
(1, 8, 9, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE IF NOT EXISTS `support` (
  `id` int(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `details` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reply` text,
  `reply_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `replied_by` int(30) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `email`, `title`, `details`, `date_created`, `reply`, `reply_date`, `replied_by`) VALUES
(1, 'skumar@sdsoftware.in', '', 'Hi', '2016-11-04 07:08:44', NULL, '2016-11-04 07:08:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(30) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `avatar` text,
  `login_status` int(11) NOT NULL,
  `last_login_date` int(50) DEFAULT NULL,
  `is_authorised` tinyint(1) NOT NULL DEFAULT '0',
  `email` text NOT NULL,
  `password` text NOT NULL,
  `city_id` int(30) NOT NULL DEFAULT '0',
  `reviews_count` int(30) NOT NULL DEFAULT '0',
  `date_of_birth` int(60) DEFAULT NULL,
  `sex` varchar(30) DEFAULT NULL,
  `social` varchar(30) NOT NULL DEFAULT 'yammzit',
  `alternative_email` varchar(60) DEFAULT NULL,
  `phone_number` varchar(30) DEFAULT NULL,
  `social_id` varchar(100) DEFAULT NULL,
  `facebook_link` varchar(300) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `about_me` varchar(300) DEFAULT NULL,
  `twitter_link` varchar(300) DEFAULT NULL,
  `instagram_link` varchar(300) DEFAULT NULL,
  `youtube_link` varchar(300) DEFAULT NULL,
  `website_link` varchar(200) NOT NULL DEFAULT '',
  `tip_number` int(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `avatar`, `login_status`, `last_login_date`, `is_authorised`, `email`, `password`, `city_id`, `reviews_count`, `date_of_birth`, `sex`, `social`, `alternative_email`, `phone_number`, `social_id`, `facebook_link`, `address`, `about_me`, `twitter_link`, `instagram_link`, `youtube_link`, `website_link`, `tip_number`) VALUES
(1, '#', '#', '', 0, 0, 0, '#@#.com', '#', 0, 0, NULL, NULL, 'yammzit', NULL, NULL, '###', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(2, 'Yammzit', 'Official', '', 1, 1471351381, 1, 'yammmzit@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0, 0, 13, 'male', 'yammzit', NULL, ' 256775995738', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(3, 'Lydia', 'Twinomugisha', '', 1, 1471983119, 1, 'twino.lydia@gmail.com', 'efaeddb4d834cf6432c634be5a9b4fb7', 18, 0, -57600, 'female', 'yammzit', NULL, '0772428988', '6342', NULL, '', NULL, NULL, NULL, NULL, '', 6),
(4, 'Kevin', 'Gasta', 'uploads/img4on1471449221.jpg', 1, 1478606653, 1, 'kevingasta@gmail.com', '41b394758330c83757856aa482c79977', 18, 11, 628848000, '', 'yammzit', NULL, '787564903', '7841', 'Facebook.com/gastakevin', '', '', '', '', '', '', 6),
(5, 'Steven', 'Byamugisha II', 'uploads/StevenByamugisha II.png', 1, 1478553049, 1, 'steveb17@rocketmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 18, 6, 675932400, 'male', 'yammzit', 'null', '+256775995738', 'null', '', '', '', '', '', '', '', 6),
(6, 'Henry', 'Bbosa', '', 0, NULL, 0, 'bbosa.henry1@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0, 0, 22, 'male', 'yammzit', NULL, ' 256777777557', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(7, 'Lujja', 'Henry', 'uploads/LujjaHenry.png', 0, NULL, 0, 'henrybbosa@rocketmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0, 0, 22, 'male', 'yammzit', 'null', ' 256777777557', 'null', 'www.facebook.com/henry.bbosa.1', NULL, NULL, 'www.twitter.com/henry.bbosa.1', 'www.instagram.com/henry.bbosa.1', 'www.fyoutube.com/henry.bbosa.1', '', 0),
(8, 'Abraham', 'Kasule', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/13680815_10202264490969869_5968647203817091728_n.jpg?oh=9bf525d0a202d1fea7823b07cea2285a&oe=5853E53B', 1, 1473081482, 1, 'abrahamkasule@ymail.com', '19a70247a6d037135522c8dc490eda81', 0, 0, 788947200, 'male', 'facebook', NULL, NULL, '10202321880484571', NULL, NULL, NULL, NULL, NULL, NULL, '', 6),
(9, 'Cynthia', 'Gloria', 'uploads/img9on1471849844.jpg', 0, 1472219683, 0, 'nyachwocute@gmail.com', '6d78adbbc7263f2be5cb3613d7371455', 0, 0, -57600, '', 'yammzit', NULL, '', '2712', '', '', '', '', '', '', '', 6),
(10, 'Faith', 'Kisa', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/12743743_10208756651859824_2585770655041034522_n.jpg?oh=be6e0d549c98c7fa53c88f5950a5cf42&oe=584BB000', 1, 1474302029, 1, 'sassykisa@yahoo.com', '7481a601dc234feecaecfadd91eef2e9', 0, 0, 788947200, 'female', 'facebook', NULL, NULL, '10210277340596092', NULL, NULL, NULL, NULL, NULL, NULL, '', 6),
(11, 'Marcel', 'Us68', 'uploads/img11on1471558492.jpg', 1, 1478106046, 1, 'marrcel25@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 18, 0, 847872000, 'male', 'yammzit', NULL, '0777732783', '2154', '', '', '????Fresh', '', 'a_m_marcel', '', '', 6),
(13, 'Daisy', 'Treasure', '', 0, 1474284021, 0, 'treasurejes@yammzit.com', '9e7e0340438096c4b801924d5b769039', 0, 0, NULL, NULL, 'yammzit', NULL, NULL, '4562', NULL, NULL, NULL, NULL, NULL, NULL, '', 6),
(14, 'Madiha', 'Hassan', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xfp1/v/t1.0-1/p50x50/14039880_10155145590782738_5334211594545903966_n.jpg?oh=53d4091629bd9b36e049f02cbd672016&oe=585B9E75&__gda__=1480596766_d862ec14a8bea581af616cca680fc740', 1, 1478107695, 1, 'madiha.hassan89@hotmail.com', '08091994', 0, 0, 788947200, 'female', 'facebook', NULL, NULL, '10154692640677738', NULL, NULL, NULL, NULL, NULL, NULL, '', 6),
(17, 'Nyola', 'Mike', '', 0, 1471863732, 0, 'nyolamike@live.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0, 0, NULL, NULL, 'yammzit', NULL, NULL, '9395', NULL, NULL, NULL, NULL, NULL, NULL, '', 6),
(18, 'Busoga', 'Niffe', 'https://scontent.xx.fbcdn.net/v/t1.0-1/c15.0.50.50/p50x50/10354686_10150004552801856_220367501106153455_n.jpg?oh=f518a1d4d5a6b640944e8e6f8395e5d6&oe=584B932F', 0, 1471776455, 0, '', '108396299612466', 0, 0, 788947200, 'male', 'facebook', NULL, NULL, '108396299612466', NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(19, 'Nomis', 'Wilson', '', 1, 1475683213, 1, 'nomiswilsk3@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0, 0, NULL, NULL, 'yammzit', NULL, NULL, '4596', NULL, NULL, NULL, NULL, NULL, NULL, '', 6),
(20, 'Prince', 'Geofrey', '', 0, 1475078118, 0, 'geofreyprince@gmail.com', 'c80e23679235ace67b5bc6e8c322d9f9', 0, 0, NULL, NULL, 'yammzit', NULL, NULL, '7876', NULL, NULL, NULL, NULL, NULL, NULL, '', 6),
(21, 'Gasta', 'Opondo', '', 1, 1475682915, 1, 'realbaus256@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0, 2, NULL, NULL, 'yammzit', NULL, NULL, '4011', NULL, NULL, NULL, NULL, NULL, NULL, '', 6),
(22, 'KITIMBO', 'ANGELLA', '', 0, NULL, 0, 'akitimbo@ymail.com', 'fbf64088e3520f9d65cd41cee30beece', 0, 0, 18, 'female', 'yammzit', NULL, '0785619639', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(27, 'Moses', 'Echodu', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/11069504_877421928965996_1361928292938102942_n.jpg?oh=a25919c6aa8a7503c7e4a3f0cfe0e2c5&oe=584717A6', 0, 1471881478, 0, 'mosesechodu@ymail.com', '1179393958768790', 0, 0, 788947200, 'male', 'facebook', NULL, NULL, '1179393958768790', NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(28, 'Echodu Moses', '.', 'https://lh5.googleusercontent.com/-OsLGOI8oNEw/AAAAAAAAAAI/AAAAAAAABag/TNhO7_-HBwA/photo.jpg?sz=50', 1, 1473319632, 1, 'mosechodu@gmail.com', '82d3dc9463afc97a12a01f0c37a9e23f', 0, 0, 788947200, 'male', 'google', NULL, NULL, '113797306740237347852', NULL, NULL, NULL, NULL, NULL, NULL, '', 6),
(29, 'Nathan', 'K', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/12644979_10201539025634204_7472673547359203493_n.jpg?oh=4a2ff9c14f7f07ff52d4c9b9af3ff671&oe=584024B9', 0, 1471964074, 0, 'kagshoud@yahoo.com', '10202280730056351', 0, 0, 788947200, 'male', 'facebook', NULL, NULL, '10202280730056351', NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(30, 'Nathan Houd', '.', 'https://lh5.googleusercontent.com/-BShE8YMO9no/AAAAAAAAAAI/AAAAAAAAACU/SPPFsFPsbTA/photo.jpg?sz=50', 1, 1471965721, 1, 'nathankhoud@gmail.com', 'ec5161856ee88026c659cf1d84c13fae', 0, 0, 788947200, 'male', 'google', NULL, NULL, '113082359586769977416', NULL, NULL, NULL, NULL, NULL, NULL, '', 6),
(31, 'Dokole', 'Elias', 'uploads/img31on1471966190.jpg', 0, 1474990744, 0, 'dokoleelias2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, -57600, '', 'yammzit', NULL, '', '5886', '', '', '', '', '', '', '', 6),
(32, 'Isaac', 'I', '', 0, 1472144494, 0, 'isaacbarugahare18@gmail.com', 'b492de4277bf6af4c70e92d60eea0b89', 0, 0, NULL, NULL, 'yammzit', NULL, NULL, '6177', NULL, NULL, NULL, NULL, NULL, NULL, '', 2),
(33, 'Eryq', 'L Sermon', 'uploads/img33on1472199789.jpg', 1, 1472200849, 1, 'ritahsermon@gmail.com', 'd5bf5a3f0aac7e79f7afa859cdfa10e4', 0, 0, 788947200, 'male', 'facebook', NULL, '', '10209291845403116', '', '', '', '', '', '', '', 6),
(34, 'muhwezi', 'hillary', '', 0, NULL, 0, 'hmuhwezi5@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 0, 0, 0, 'male', 'yammzit', NULL, '0704410955', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(35, 'ONESMUS', 'AHIMBISIBWE', '', 0, 1474828408, 0, 'aonesmus10@gmail.com', 'a219d5bdf8085ce8e8a321bff04f586e', 0, 0, NULL, NULL, 'yammzit', NULL, NULL, '5412', NULL, NULL, NULL, NULL, NULL, NULL, '', 6),
(36, 'Denis', 'Mubangizi', 'uploads/img36on1472392582.jpg', 0, 1473695401, 0, 'denis.mubangizi@outlook.com', '02735d11f247e88c483244a17b496412', 18, 1, -57600, '', 'yammzit', NULL, '', '8629', '', '', '', '', '', '', '', 6),
(37, 'Hope', 'Tweenie', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xat1/v/t1.0-1/p50x50/13335921_10206732334933125_4536566340040235488_n.jpg?oh=c380f4e75045a3594da1ccbe4a8402b8&oe=58575B76&__gda__=1482031185_f1b9203e5227ba0b7933fdc9943ce57f', 0, 1472476313, 0, '', '10206539492392182', 0, 0, 788947200, 'female', 'facebook', NULL, NULL, '10206539492392182', NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(38, 'Kajuura', 'Kyambu', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/13254215_994423113987805_6898248935055658550_n.jpg?oh=6cace4e6a7fc1888b549cba74d0b0d88&oe=5842AAF8', 1, 1472836915, 1, 'kkajuura@yahoo.com', '85ce21347d14a3348723631aa8f927b4', 0, 0, 788947200, 'male', 'facebook', NULL, NULL, '1061781107252005', NULL, NULL, NULL, NULL, NULL, NULL, '', 4),
(39, 'luke', 'wadika', '', 0, 1477157351, 0, 'luke.wadika@gmail.com', '3964f4fca332fac3e013cdbc39bfbabc', 0, 0, NULL, NULL, 'yammzit', NULL, NULL, '8718', NULL, NULL, NULL, NULL, NULL, NULL, '', 6),
(40, 'Siobhan Nankunda', '.', 'https://lh6.googleusercontent.com/-mNoLgbzjoD0/AAAAAAAAAAI/AAAAAAAAANo/f2dvN3lZD2g/photo.jpg?sz=50', 1, 1472619846, 1, 'nankundas@gmail.com', 'e3dc2a3cc40364c33ecef5bbc210e7eb', 0, 0, 788947200, 'female', 'google', NULL, NULL, '115660109013126141558', NULL, NULL, NULL, NULL, NULL, NULL, '', 2),
(41, 'Talha', 'K', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/13901349_10209137101001078_4904199143686339787_n.jpg?oh=d8ced9d7fdf80de385df3aee85f5e5f8&oe=58488F36', 1, 1472714451, 1, 'punk_rockkss@windowslive.com', '3d532e6ae7251b4d2126f7e81b7269df', 0, 0, 788947200, 'male', 'facebook', NULL, NULL, '10209432757312301', NULL, NULL, NULL, NULL, NULL, NULL, '', 2),
(42, 'Ninsiima', 'Norman', '', 0, 1473356512, 0, 'Norbrok2012@gmail.com', 'e34b4aabf6b41496aee1f3f3a119c40a', 0, 0, NULL, NULL, 'yammzit', NULL, NULL, '7332', NULL, NULL, NULL, NULL, NULL, NULL, '', 6),
(43, 'Nsereko', 'Louis', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xla1/v/t1.0-1/p50x50/12313944_1229650867050898_8192432799069943282_n.jpg?oh=3521d4e014de5a8e820b28697ecf6a38&oe=58537B08&__gda__=1481646106_6238ab926ce4642613f5785f9d1e1e3d', 0, 1472909503, 0, 'louisnsereko7@gmail.com', '1429904497025533', 0, 0, 788947200, 'male', 'facebook', NULL, NULL, '1429904497025533', NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(44, 'Nsereko Louis', '.', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=50', 1, 1472912205, 1, 'nserekolouis@gmail.com', '6fb42da0e32e07b61c9f0251fe627a9c', 0, 0, 788947200, 'male', 'google', NULL, NULL, '103031633442757518711', NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(45, 'Felix', 'Mugisha', '', 0, 1473283947, 0, 'felixyoung17@gmail.com', '4c24ab2b681acc6fadf83a416190b412', 0, 0, NULL, NULL, 'yammzit', NULL, NULL, '3314', NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(46, 'manish', 'kumar', '', 0, 1473466888, 0, 'manishkumarp81320@gmail.com', '4062eb141470c2eb1e0d7fda5205902f', 0, 0, NULL, NULL, 'yammzit', NULL, NULL, '2954', NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(47, 'Arnold', 'Kirk', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/11703074_981760771858113_680285651756283958_n.jpg?oh=e936e2238953c4ca8d5f6a2b5426b693&oe=586ED007', 1, 1476187639, 1, 'kirk_kanold@yahoo.com', 'e86226fa85413939fea90b7763f34ca2', 0, 0, 788947200, 'male', 'facebook', NULL, NULL, '1249512598416261', NULL, NULL, NULL, NULL, NULL, NULL, '', 6),
(48, 'Derrick', 'Ogwal', '', 0, NULL, 0, 'ogwaldee@gmail.com', 'befd392de8864532ce57e7648eb8de8c', 0, 0, 21, 'male', 'yammzit', NULL, '0793514167', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(49, 'Jerry', 'Opondo', 'uploads/img49on1474553289.jpg', 1, 1474719224, 1, 'jerryopondo@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 18, 0, -57600, '', 'yammzit', NULL, '', '2546', '', '', '', '', '', '', '', 5),
(50, 'Duncan Alex', 'Olengo', '', 0, 1476686417, 0, 'olengoad@yahoo.com', '1e0d27b1de91f50bb3707d674e1600fc', 0, 0, NULL, NULL, 'yammzit', NULL, NULL, '6741', NULL, NULL, NULL, NULL, NULL, NULL, '', 6),
(51, 'Lawrence Sentamu', '.', 'https://lh5.googleusercontent.com/-3KeOEEl6aLc/AAAAAAAAAAI/AAAAAAAABEY/emQvrrt3k8Y/photo.jpg?sz=50', 0, 1474880247, 0, 'sentamulawrence@gmail.com', '115935895454778358866', 0, 0, 788947200, 'male', 'google', NULL, NULL, '115935895454778358866', NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(52, '', '', '', 0, 0, 0, '', 'd41d8cd98f00b204e9800998ecf8427e', 0, 0, NULL, NULL, 'yammzit', NULL, NULL, '4854', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(53, 'Hussein', 'Twinomugisha', '', 1, 1475004002, 1, 'husseintwinomugisha@gmail.com', '50572dec71b7242224b7db488768e6f5', 0, 0, NULL, NULL, 'yammzit', NULL, NULL, '4738', NULL, NULL, NULL, NULL, NULL, NULL, '', 4),
(54, 'Rejini S S', '.', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=50', 1, 1475145159, 1, 'rejiniafricana@gmail.com', 'cc66276579df3066477e5db798b75a29', 0, 0, 788947200, 'male', 'google', NULL, NULL, '109555858282477516443', NULL, NULL, NULL, NULL, NULL, NULL, '', 6),
(55, 'Hotel', 'Africana', '', 0, NULL, 0, 'rejiniafricana@gmail.com', 'cc66276579df3066477e5db798b75a29', 0, 0, 17, 'male', 'yammzit', NULL, ' 256750500156', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(56, 'hotel', 'africana', '', 0, NULL, 0, 'rejiniafricana@gmail.com', 'cc66276579df3066477e5db798b75a29', 18, 0, 17, 'male', 'yammzit', NULL, ' 256750500156', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(57, 'hotel', 'africana', '', 0, NULL, 0, 'rejiniafricana@gmail.com', 'e919c49d5f0cd737285367810a3394d0', 18, 0, 17, 'null', 'yammzit', NULL, '0750500156', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(58, 'victor ddamulira', '.', 'https://lh6.googleusercontent.com/-_PRFwtZGhOo/AAAAAAAAAAI/AAAAAAAAAcw/Qam56boEA_8/photo.jpg?sz=50', 1, 1476627151, 1, 'ddamulirav@gmail.com', '211d0431ccace2bc3ec51f311c7bf532', 0, 0, 788947200, 'male', 'google', NULL, NULL, '116521280292973464557', NULL, NULL, NULL, NULL, NULL, NULL, '', 4),
(59, 'muhwezi', 'hillary', '', 0, NULL, 0, 'hmuhwezi5@gmail.com', '2b249ad9a92b04f7e89e42ad4d22d4b1', 27, 0, 3, '', 'yammzit', NULL, '', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(60, 'Ronnie', 'Ssekabunga', '', 0, NULL, 0, 'seron2001@yahoo.co.uk', 'f27eed3a39e411cad6d8de862a8c83ef', 0, 0, 10, 'male', 'yammzit', NULL, ' 256704980423', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(61, 'derrick', 'ogwal', '', 0, NULL, 0, 'ogwaldee@gmail.com', '160906beafcffe1989e3a59f2c229640', 0, 0, 21, 'male', 'yammzit', NULL, '0793514167', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(62, 'Tariiq', 'Henry Bbosa', '', 0, NULL, 0, 'henrybbosa@rocketmail.com', 'bc73b87e5b85cf9434103e0f7d80d798', 18, 0, 665481600, 'male', '', NULL, '0777777557', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(63, 'Faizal', 'Nalumenya', '', 0, NULL, 0, 'faizal.nalumenya@gmail.com', '2755bae1a1b27b736670a00963b05e44', 18, 0, 506505600, 'male', '', NULL, '0774051227', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(64, 'Nasser', 'Konde', '', 0, NULL, 0, 'kondenasser@gmail.com', '3cb1ef0ef26b70b445befcab13bb85c2', 18, 0, 709714800, 'male', '', NULL, '0774593208', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(65, 'Violette', 'Mahoro', '', 0, NULL, 0, 'blueviolets1@gmail.com', '6268f448ba4e394e2e0075ba644312f3', 40, 0, 0, '', '', NULL, '+250736111173', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(66, 'Violette', 'Mahoro', '', 0, NULL, 0, 'blueviolets1@gmail.com', '6268f448ba4e394e2e0075ba644312f3', 40, 0, 745311600, 'female', '', NULL, '+250736111173', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(67, 'Nasser', 'Konde', '', 0, NULL, 0, 'kondenasser@gmail.com', '3cb1ef0ef26b70b445befcab13bb85c2', 18, 0, 709714800, '', '', NULL, '0774593208', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(68, 'Paru', 'Thapa', '', 0, NULL, 0, 'aliyah87@hotmail.com', 'e0868c75453ca45f24fa9b8a1b9a50a7', 565, 0, 547542000, 'female', '', NULL, '+60182292847', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(69, 'Paru', 'Thapa', '', 0, NULL, 0, 'aliyah87@hotmail.com', 'e0868c75453ca45f24fa9b8a1b9a50a7', 565, 0, 547542000, 'female', '', NULL, '+60182292847', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(70, 'arnold', 'pettersson', '', 0, NULL, 0, 'arnold.pettersson@gmail.com', '9dd39d7f4ca8331eb428a8a8dad4f0ef', 658, 0, 760176000, 'male', '', NULL, '790164259', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(71, 'Suraj', 'Kumar', '', 0, 1478243372, 0, 'skumar@sdsoftware.in', 'd29a272a93cedca42846a02c98313d23', 0, 0, NULL, NULL, 'yammzit', NULL, NULL, '1201', NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(72, 'Abima', 'Deogratius', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn2/v/t1.0-1/c0.3.50.50/p50x50/562876_240482832736478_450262110_n.jpg?oh=eff4877faa27d46cb2721cb56e6746e6&oe=58CDCA2B&__gda__=1486117966_37c2e593e23b3c3341a129bb11fe9eb4', 1, 1479055512, 1, 'abimadeo91@yahoo.com', '3b502918cdc797930e12a6103239556e', 0, 0, 788947200, 'male', 'facebook', NULL, NULL, '1060558094062277', NULL, NULL, NULL, NULL, NULL, NULL, '', 6),
(73, 'Peter', 'Kisadha', '', 0, NULL, 0, 'peterkisadha@gmail.com', '7d16b83134bb9162c544ec8948ad5fb1', 18, 0, 737881200, 'male', '', NULL, '0772628151', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(74, 'Peter', 'Kisadha', '', 0, NULL, 0, 'peterkisadha@gmail.com', '7d16b83134bb9162c544ec8948ad5fb1', 18, 0, 737881200, 'male', '', NULL, '0772628151', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(75, 'Peter', 'Kisadha', '', 0, NULL, 0, 'peterkisadha@gmail.com', '7d16b83134bb9162c544ec8948ad5fb1', 18, 0, 737881200, 'male', '', NULL, '0772628151', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(76, 'Peter', 'Kisadha', '', 0, NULL, 0, 'peterkisadha@gmail.com', '7d16b83134bb9162c544ec8948ad5fb1', 18, 0, 737881200, 'male', '', NULL, '0772628151', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(77, 'Peter', 'Kisadha', '', 0, NULL, 0, 'peterkisadha@gmail.com', '7d16b83134bb9162c544ec8948ad5fb1', 18, 0, 737881200, 'male', '', NULL, '0772628151', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(78, 'Peter', 'Kisadha', '', 0, NULL, 0, 'peterkisadha@gmail.com', '7d16b83134bb9162c544ec8948ad5fb1', 18, 0, 737881200, 'male', '', NULL, '0772628151', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(79, 'Karama', 'Farid', '', 0, NULL, 0, 'faridkaramas@gmail.com', '9a8834af0f1338ca629887aabba446cf', 18, 0, 495270000, 'male', '', NULL, '+256774584069', 'null', NULL, NULL, NULL, NULL, NULL, NULL, '', 0),
(80, 'Kalumba jonathan', '.', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=50', 1, 1479128574, 1, 'kalumba.peter12@gmail.com', '95e9907cee21b68a4bb91e22f3bd6e1c', 0, 0, 1451635200, 'male', 'google', NULL, NULL, '110288649240224906236', NULL, NULL, NULL, NULL, NULL, NULL, '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_business_claim`
--

CREATE TABLE IF NOT EXISTS `user_business_claim` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `business_id` int(30) NOT NULL,
  `phone_1` varchar(30) NOT NULL,
  `phone_2` varchar(30) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `position` text NOT NULL,
  `banner_web` text NOT NULL,
  `banner_mobile` text NOT NULL,
  `logo_web` text NOT NULL,
  `logo_mobile` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(30) DEFAULT 'submitted',
  `other` text,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `category1_id` int(30) NOT NULL,
  `category2_id` int(30) NOT NULL,
  `category3_id` int(30) NOT NULL,
  `monday_open` varchar(30) DEFAULT NULL,
  `monday_close` varchar(30) DEFAULT NULL,
  `tuesday_open` varchar(30) DEFAULT NULL,
  `tuesday_close` varchar(30) DEFAULT NULL,
  `wednesday_open` varchar(30) DEFAULT NULL,
  `wednesday_close` varchar(30) DEFAULT NULL,
  `thursday_open` varchar(30) DEFAULT NULL,
  `thursday_close` varchar(30) DEFAULT NULL,
  `friday_open` varchar(30) DEFAULT NULL,
  `friday_close` varchar(30) DEFAULT NULL,
  `saturday_open` varchar(30) DEFAULT NULL,
  `saturday_close` varchar(30) DEFAULT NULL,
  `sunday_open` varchar(30) DEFAULT NULL,
  `sunday_close` varchar(30) DEFAULT NULL,
  `website` varchar(200) NOT NULL,
  `facebook_link` text NOT NULL,
  `twitter_link` text NOT NULL,
  `instagram_link` text NOT NULL,
  `youtube_link` text NOT NULL,
  `other_take_away` varchar(30) DEFAULT NULL,
  `other_accepts_credit_card` varchar(30) DEFAULT NULL,
  `other_good_for_children` varchar(30) DEFAULT NULL,
  `other_good_for_groups` varchar(30) DEFAULT NULL,
  `other_music` varchar(30) DEFAULT NULL,
  `other_good_for_dancing` varchar(30) DEFAULT NULL,
  `other_alcohol` varchar(30) DEFAULT NULL,
  `other_happy_hour` varchar(30) DEFAULT NULL,
  `other_best_night` varchar(30) DEFAULT NULL,
  `other_outdoor_seating` varchar(30) DEFAULT NULL,
  `other_has_wi_fi` varchar(30) DEFAULT NULL,
  `other_has_tv` varchar(30) DEFAULT NULL,
  `other_delivery` int(30) NOT NULL,
  `other_take_reservation` int(30) NOT NULL,
  `other_waiter_service` varchar(30) DEFAULT NULL,
  `other_has_pool_table` varchar(30) DEFAULT NULL,
  `date_approved` int(30) DEFAULT NULL,
  `code` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_business_rating`
--

CREATE TABLE IF NOT EXISTS `user_business_rating` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `business_id` int(30) NOT NULL,
  `good` int(30) NOT NULL DEFAULT '0',
  `cost` int(30) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_business_rating`
--

INSERT INTO `user_business_rating` (`id`, `user_id`, `business_id`, `good`, `cost`) VALUES
(1, 4, 39, 3, 4),
(2, 4, 46, 1, 1),
(3, 5, 43, 5, 1),
(4, 4, 120, 1, 0),
(5, 5, 6, 5, 1),
(6, 10, 112, 4, 3),
(7, 5, 106, 5, 4),
(8, 4, 202, 3, 2),
(9, 8, 7, 0, 2),
(10, 11, 6, 5, 3),
(11, 8, 15, 4, 3),
(12, 5, 17, 3, 1),
(13, 4, 209, 5, 0),
(14, 4, 210, 4, 1),
(15, 5, 212, 4, 2),
(16, 5, 51, 5, 3),
(17, 49, 39, 4, 3),
(18, 5, 242, 5, 4),
(19, 4, 242, 5, 5),
(20, 43, -211, -1, -1),
(21, 5, 2147483647, -1, -1),
(22, 5, 2147483647, -1, -1),
(23, 5, 2147483647, -1, -1),
(24, 5, 2147483647, -1, -1),
(25, 5, 243, -1, -1),
(26, 0, 2147483647, -1, -1),
(27, 5, 50, -1, -1),
(28, 0, 56, 5, 0),
(29, 60, 56, -1, -1),
(30, 61, 184, -1, -1),
(31, 61, 43, -1, -1),
(32, 61, 4, -1, -1),
(33, 61, 5, -1, -1),
(34, 62, 50, -1, -1),
(35, 5, 62, -1, -1),
(36, 5, 61, -1, -1),
(37, 0, 32, 0, 4),
(38, 19, 32, -1, -1),
(39, 19, 2147483647, -1, -1),
(40, 61, 244, -1, -1),
(41, 5, 244, -1, -1),
(42, 61, 72, -1, -1),
(43, 7, 241, -1, -1);

-- --------------------------------------------------------

--
-- Table structure for table `user_chunk`
--

CREATE TABLE IF NOT EXISTS `user_chunk` (
  `id` int(11) NOT NULL,
  `user_id` int(30) NOT NULL,
  `chunk` text NOT NULL,
  `num` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_event_going`
--

CREATE TABLE IF NOT EXISTS `user_event_going` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `event_id` int(30) NOT NULL,
  `date_created` int(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_event_interested`
--

CREATE TABLE IF NOT EXISTS `user_event_interested` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `event_id` int(30) NOT NULL,
  `date_created` int(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_follower`
--

CREATE TABLE IF NOT EXISTS `user_follower` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL COMMENT 'the person being followed',
  `follower_id` int(30) NOT NULL COMMENT 'the person whois following',
  `date_created` int(60) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_follower`
--

INSERT INTO `user_follower` (`id`, `user_id`, `follower_id`, `date_created`) VALUES
(2, 14, 4, 1472129356),
(3, 4, 61, 1477132400),
(4, 5, 61, 1477132936),
(5, 72, 61, 1478345637);

-- --------------------------------------------------------

--
-- Table structure for table `user_friend`
--

CREATE TABLE IF NOT EXISTS `user_friend` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL COMMENT 'the person being requested',
  `friend_id` int(30) NOT NULL COMMENT 'the person who is requesting for this friend ship',
  `date_created` int(60) NOT NULL,
  `status` int(30) NOT NULL,
  `date_last_modified` int(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_friend`
--

INSERT INTO `user_friend` (`id`, `user_id`, `friend_id`, `date_created`, `status`, `date_last_modified`) VALUES
(1, 4, 5, 1471292151, 2, 1471292151),
(2, 3, 5, 1471448455, 2, 1471448455),
(3, 4, 8, 1471454633, 2, 1471454633),
(4, 5, 8, 1471454645, 2, 1471454645),
(5, 3, 8, 1471454662, 2, 1471454662),
(6, 4, 9, 1471534222, 2, 1471534222),
(7, 5, 10, 1471554804, 2, 1471554804),
(8, 13, 12, 1471596541, 1, 1471596541),
(9, 4, 13, 1471596643, 2, 1471596643),
(10, 5, 12, 1471596653, 1, 1471596653),
(11, 19, 20, 1471778166, 2, 1471778166),
(12, 14, 5, 1471801358, 2, 1471801358),
(13, 11, 5, 1471801372, 2, 1471801372),
(14, 4, 31, 1471966090, 2, 1471966090),
(15, 3, 31, 1471966091, 1, 1471966091),
(16, 5, 31, 1471966093, 2, 1471966093),
(17, 11, 31, 1471966096, 2, 1471966096),
(18, 11, 31, 1471966097, 2, 1471966097),
(19, 14, 4, 1472129347, 1, 1472129347),
(20, 14, 4, 1472129353, 1, 1472129353),
(21, 20, 4, 1472133660, 1, 1472133660),
(22, 11, 8, 1472185608, 2, 1472185608),
(23, 4, 33, 1472199373, 2, 1472199373),
(24, 3, 33, 1472199373, 1, 1472199373),
(25, 5, 33, 1472199375, 2, 1472199375),
(26, 11, 33, 1472199377, 2, 1472199377),
(27, 5, 33, 1472199628, 2, 1472199628),
(28, 11, 33, 1472199632, 2, 1472199632),
(29, 3, 33, 1472199634, 1, 1472199634),
(30, 3, 11, 1472293189, 1, 1472293189),
(31, 4, 11, 1472293190, 2, 1472293190),
(32, 3, 35, 1472375320, 1, 1472375320),
(33, 11, 35, 1472375402, 2, 1472375402),
(34, 34, 35, 1472376230, 1, 1472376230),
(35, 5, 35, 1472380076, 2, 1472380076),
(36, 11, 35, 1472380081, 2, 1472380081),
(37, 3, 35, 1472380094, 1, 1472380094),
(38, 5, 36, 1472392686, 2, 1472392686),
(39, 4, 36, 1472392758, 2, 1472392758),
(40, 3, 36, 1472392784, 1, 1472392784),
(41, 35, 36, 1472393463, 2, 1472393463),
(42, 36, 11, 1472402886, 1, 1472402886),
(43, 36, 11, 1472490838, 1, 1472490838),
(44, 4, 11, 1472490842, 2, 1472490842),
(45, 3, 11, 1472490845, 1, 1472490845),
(46, 37, 5, 1472506617, 1, 1472506617),
(47, 13, 28, 1472640422, 2, 1472640422),
(48, 5, 41, 1472713982, 2, 1472713982),
(49, 4, 38, 1472836604, 2, 1472836604),
(50, 42, 5, 1472930098, 1, 1472930098),
(51, 13, 5, 1473694606, 2, 1473694606),
(52, 5, 13, 1474283882, 2, 1474283882),
(53, 9, 11, 1474365476, 1, 1474365476),
(54, 34, 11, 1474365498, 1, 1474365498),
(55, 32, 11, 1474365510, 1, 1474365510),
(56, 49, 5, 1474554015, 2, 1474554015),
(57, 4, 50, 1474811429, 2, 1474811429),
(58, 32, 5, 1474983812, 1, 1474983812),
(59, 3, 50, 1476685372, 1, 1476685372),
(60, 5, 50, 1476685375, 2, 1476685375),
(61, 11, 50, 1476685376, 2, 1476685376),
(63, 4, 61, 1477132489, 2, 1477132489),
(64, 5, 61, 1477132937, 2, 1477132937),
(65, 5, 62, 1477475649, 2, 1477475649),
(66, 72, 61, 1478345635, 1, 1478345635);

-- --------------------------------------------------------

--
-- Table structure for table `user_message`
--

CREATE TABLE IF NOT EXISTS `user_message` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `sender_id` int(30) NOT NULL,
  `details` text NOT NULL,
  `date_created` int(60) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_message`
--

INSERT INTO `user_message` (`id`, `user_id`, `sender_id`, `details`, `date_created`, `status`) VALUES
(1, 4, 5, 'Sup fool.', 1471448701, 2),
(2, 4, 5, 'Fuck bitches and get money', 1471448717, 2),
(3, 5, 4, 'Major Key alert bro', 1471448904, 2),
(4, 8, 4, 'Hi blood...', 1471454797, 0),
(5, 4, 5, 'hahahaaahahaaaaaa major bro Major', 1471801112, 2),
(6, 5, 4, 'Major What is thaaat', 1472287659, 2),
(7, 34, 35, 'hi', 1472376273, 0),
(8, 34, 35, 'hi', 1472376274, 0),
(9, 5, 35, 'thax for the work done', 1472406367, 2),
(10, 35, 5, 'your welcome. please tell your friends about it', 1472505543, 0),
(11, 35, 5, 'have them download it discover new businesses', 1472505584, 0),
(12, 35, 5, 'have them download it discover new businesses', 1472505584, 0),
(13, 35, 5, 'have them download it discover new businesses', 1472505585, 0),
(14, 38, 4, 'Yooo', 1473329751, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE IF NOT EXISTS `user_notification` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `details_a` varchar(100) DEFAULT '  ',
  `details_b` varchar(100) DEFAULT '   ',
  `date_created` int(60) NOT NULL,
  `type` varchar(60) NOT NULL,
  `type_group` varchar(100) DEFAULT NULL,
  `victim1_id` int(30) DEFAULT NULL,
  `victim2_id` int(30) DEFAULT NULL,
  `victim3_id` int(30) DEFAULT NULL,
  `status` int(30) NOT NULL DEFAULT '0',
  `notification_id` int(30) DEFAULT NULL,
  `mobile_href` varchar(100) DEFAULT '#',
  `web_href` varchar(100) DEFAULT '#'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_notification`
--

INSERT INTO `user_notification` (`id`, `user_id`, `details_a`, `details_b`, `date_created`, `type`, `type_group`, `victim1_id`, `victim2_id`, `victim3_id`, `status`, `notification_id`, `mobile_href`, `web_href`) VALUES
(1, 10, ' Commented on your Review on ', ' ', 1471868312, 'review_comment', 'newsfeed_owner', 4, 112, NULL, 1, 54, '#/tab/notifications/view/54', '#'),
(2, 5, ' Commented on your Review on ', ' ', 1472141550, 'review_comment', 'newsfeed_owner', 4, 33, NULL, 1, 148, '#/tab/notifications/view/148', '#'),
(3, 5, ' Commented on your Review on ', ' ', 1473668472, 'review_comment', 'newsfeed_owner', 4, 237, NULL, 1, 269, '#/tab/notifications/view/269', '#'),
(4, 4, ' Commented on your Review on ', ' ', 1474719785, 'review_comment', 'newsfeed_owner', 5, 51, NULL, 1, 296, '#/tab/notifications/view/296', '#');

-- --------------------------------------------------------

--
-- Table structure for table `user_wall`
--

CREATE TABLE IF NOT EXISTS `user_wall` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `review_id` int(30) NOT NULL,
  `date_created` int(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1367 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_wall`
--

INSERT INTO `user_wall` (`id`, `user_id`, `review_id`, `date_created`) VALUES
(2, 3, 2, 1471197631),
(3, 3, 3, 1471198137),
(4, 3, 4, 1471198275),
(5, 3, 5, 1471198585),
(6, 3, 6, 1471199088),
(7, 3, 7, 1471199150),
(8, 3, 8, 1471200584),
(9, 4, 9, 1471238715),
(10, 4, 10, 1471239028),
(11, 4, 11, 1471242276),
(12, 4, 12, 1471242516),
(13, 4, 13, 1471242576),
(14, 4, 14, 1471242755),
(15, 4, 15, 1471243570),
(16, 4, 16, 1471259453),
(18, 4, 18, 1471276823),
(19, 4, 19, 1471277434),
(20, 4, 20, 1471279230),
(21, 4, 21, 1471279391),
(23, 5, 23, 1471290367),
(24, 5, 24, 1471290501),
(25, 5, 25, 1471290595),
(26, 5, 26, 1471290640),
(27, 4, 27, 1471290696),
(28, 4, 28, 1471290831),
(29, 4, 29, 1471290863),
(30, 4, 30, 1471291336),
(31, 5, 31, 1471292119),
(32, 5, 32, 1471292428),
(33, 5, 33, 1471292522),
(34, 5, 34, 1471292726),
(35, 4, 35, 1471338806),
(36, 4, 36, 1471338856),
(37, 4, 46, 1471374302),
(38, 5, 46, 1471374302),
(39, 4, 47, 1471446251),
(40, 5, 47, 1471446251),
(41, 5, 48, 1471446892),
(42, 4, 48, 1471446892),
(43, 3, 48, 1471446892),
(44, 5, 49, 1471446951),
(45, 4, 49, 1471446951),
(46, 3, 49, 1471446951),
(47, 5, 50, 1471447418),
(48, 4, 50, 1471447418),
(49, 3, 50, 1471447418),
(50, 5, 51, 1471447749),
(51, 4, 51, 1471447749),
(52, 4, 52, 1471454777),
(53, 5, 52, 1471454777),
(54, 8, 52, 1471454777),
(55, 4, 53, 1471534321),
(56, 5, 53, 1471534321),
(57, 8, 53, 1471534321),
(58, 9, 53, 1471534321),
(59, 10, 54, 1471555279),
(60, 10, 55, 1471555412),
(61, 10, 56, 1471559422),
(62, 10, 57, 1471559424),
(63, 4, 58, 1471629793),
(64, 5, 58, 1471629793),
(65, 8, 58, 1471629793),
(66, 9, 58, 1471629793),
(67, 12, 58, 1471629793),
(68, 17, 59, 1471766788),
(69, 17, 60, 1471766906),
(70, 5, 60, 1471766906),
(71, 17, 61, 1471766906),
(72, 17, 62, 1471767006),
(73, 17, 63, 1471767692),
(74, 17, 64, 1471767995),
(75, 17, 65, 1471768710),
(76, 18, 66, 1471776455),
(77, 19, 67, 1471776768),
(78, 19, 68, 1471776983),
(79, 19, 69, 1471777013),
(80, 19, 70, 1471777302),
(81, 20, 71, 1471777538),
(82, 20, 72, 1471777572),
(83, 20, 73, 1471777607),
(84, 20, 74, 1471777608),
(85, 19, 74, 1471777608),
(86, 20, 75, 1471777632),
(87, 20, 76, 1471777746),
(88, 20, 77, 1471777747),
(89, 19, 77, 1471777747),
(90, 20, 78, 1471777844),
(91, 19, 78, 1471777844),
(92, 20, 79, 1471777890),
(93, 19, 79, 1471777890),
(94, 20, 80, 1471777908),
(95, 20, 81, 1471777965),
(96, 21, 82, 1471788099),
(97, 21, 83, 1471791011),
(98, 21, 84, 1471791141),
(99, 21, 85, 1471791378),
(100, 21, 86, 1471791556),
(101, 21, 87, 1471791713),
(102, 5, 88, 1471801043),
(103, 10, 88, 1471801043),
(104, 4, 88, 1471801043),
(105, 5, 89, 1471801046),
(106, 8, 89, 1471801046),
(107, 10, 89, 1471801046),
(108, 4, 89, 1471801046),
(109, 3, 90, 1471805468),
(110, 5, 90, 1471805468),
(111, 8, 90, 1471805468),
(112, 10, 90, 1471805468),
(113, 4, 90, 1471805468),
(114, 3, 91, 1471805472),
(115, 5, 91, 1471805472),
(116, 8, 91, 1471805472),
(117, 4, 91, 1471805472),
(118, 14, 92, 1471844359),
(119, 9, 93, 1471849714),
(120, 9, 94, 1471849803),
(121, 9, 95, 1471849962),
(122, 9, 96, 1471850104),
(123, 9, 97, 1471850159),
(124, 21, 98, 1471864779),
(125, 3, 98, 1471864779),
(126, 5, 98, 1471864779),
(127, 27, 99, 1471881478),
(128, 28, 100, 1471881509),
(129, 11, 101, 1471898241),
(130, 10, 102, 1471902142),
(131, 10, 103, 1471902294),
(132, 10, 104, 1471902325),
(133, 10, 105, 1471902415),
(134, 10, 106, 1471902654),
(135, 10, 107, 1471902774),
(136, 29, 108, 1471964074),
(137, 30, 109, 1471964591),
(138, 30, 110, 1471964730),
(139, 30, 111, 1471964730),
(140, 30, 112, 1471964790),
(141, 30, 113, 1471964850),
(142, 30, 114, 1471965001),
(143, 30, 115, 1471965150),
(144, 31, 116, 1471965385),
(145, 31, 118, 1471965598),
(146, 31, 117, 1471965598),
(147, 31, 119, 1471965658),
(148, 31, 120, 1471965752),
(149, 31, 121, 1471965839),
(150, 31, 122, 1471965839),
(151, 31, 123, 1471965871),
(152, 31, 124, 1471965871),
(153, 4, 125, 1471966714),
(154, 5, 125, 1471966714),
(155, 8, 125, 1471966714),
(156, 9, 125, 1471966714),
(157, 13, 125, 1471966714),
(158, 31, 125, 1471966714),
(159, 4, 126, 1471967028),
(160, 5, 126, 1471967028),
(161, 14, 127, 1471973795),
(162, 14, 128, 1471973844),
(163, 5, 128, 1471973844),
(164, 8, 128, 1471973844),
(165, 10, 128, 1471973844),
(166, 4, 128, 1471973844),
(167, 3, 128, 1471973844),
(168, 14, 129, 1471975059),
(169, 14, 130, 1471975211),
(170, 5, 131, 1471983355),
(171, 8, 131, 1471983355),
(172, 10, 131, 1471983355),
(173, 4, 131, 1471983355),
(174, 3, 131, 1471983355),
(175, 14, 131, 1471983355),
(176, 5, 132, 1471984133),
(177, 8, 132, 1471984133),
(178, 10, 132, 1471984133),
(179, 4, 132, 1471984133),
(180, 3, 132, 1471984133),
(181, 14, 132, 1471984133),
(182, 5, 133, 1471984357),
(183, 8, 133, 1471984357),
(184, 10, 133, 1471984357),
(185, 4, 133, 1471984357),
(186, 3, 133, 1471984357),
(187, 14, 133, 1471984357),
(188, 5, 134, 1471984559),
(189, 8, 134, 1471984559),
(190, 10, 134, 1471984559),
(191, 31, 134, 1471984559),
(192, 4, 134, 1471984559),
(193, 3, 134, 1471984559),
(194, 14, 134, 1471984559),
(195, 4, 135, 1472032474),
(196, 5, 135, 1472032474),
(197, 8, 135, 1472032474),
(198, 9, 135, 1472032474),
(199, 13, 135, 1472032474),
(200, 31, 135, 1472032474),
(201, 4, 136, 1472129272),
(202, 5, 136, 1472129272),
(203, 8, 136, 1472129272),
(204, 9, 136, 1472129272),
(205, 13, 136, 1472129272),
(206, 31, 136, 1472129272),
(207, 4, 137, 1472130318),
(208, 5, 137, 1472130318),
(209, 8, 137, 1472130318),
(210, 9, 137, 1472130318),
(211, 13, 137, 1472130318),
(212, 31, 137, 1472130318),
(213, 4, 138, 1472132927),
(214, 5, 138, 1472132927),
(215, 8, 138, 1472132927),
(216, 9, 138, 1472132927),
(217, 13, 138, 1472132927),
(218, 31, 138, 1472132927),
(219, 4, 139, 1472132977),
(220, 5, 139, 1472132977),
(221, 8, 139, 1472132977),
(222, 9, 139, 1472132977),
(223, 13, 139, 1472132977),
(224, 31, 139, 1472132977),
(225, 8, 140, 1472140229),
(226, 8, 141, 1472140287),
(227, 4, 141, 1472140287),
(228, 5, 141, 1472140287),
(229, 3, 141, 1472140287),
(230, 8, 142, 1472140289),
(231, 8, 143, 1472140302),
(232, 4, 143, 1472140302),
(233, 5, 143, 1472140302),
(234, 3, 143, 1472140302),
(235, 8, 144, 1472140308),
(236, 4, 144, 1472140308),
(237, 5, 144, 1472140308),
(238, 3, 144, 1472140308),
(239, 8, 145, 1472140347),
(240, 4, 145, 1472140347),
(241, 5, 145, 1472140347),
(242, 3, 145, 1472140347),
(243, 8, 146, 1472140379),
(244, 8, 147, 1472140395),
(245, 4, 147, 1472140395),
(246, 5, 147, 1472140395),
(247, 3, 147, 1472140395),
(248, 21, 147, 1472140395),
(249, 5, 148, 1472140395),
(250, 8, 148, 1472140395),
(251, 10, 148, 1472140395),
(252, 31, 148, 1472140395),
(253, 4, 148, 1472140395),
(254, 3, 148, 1472140395),
(255, 14, 148, 1472140395),
(256, 8, 149, 1472140397),
(257, 4, 149, 1472140397),
(258, 5, 149, 1472140397),
(259, 3, 149, 1472140397),
(260, 8, 150, 1472140398),
(261, 4, 150, 1472140398),
(262, 5, 150, 1472140398),
(263, 3, 150, 1472140398),
(264, 4, 151, 1472141871),
(265, 5, 151, 1472141871),
(266, 8, 151, 1472141871),
(267, 9, 151, 1472141871),
(268, 13, 151, 1472141871),
(269, 31, 151, 1472141871),
(270, 32, 152, 1472144323),
(271, 32, 153, 1472144462),
(272, 5, 154, 1472154698),
(273, 8, 154, 1472154698),
(274, 10, 154, 1472154698),
(275, 31, 154, 1472154698),
(276, 4, 154, 1472154698),
(277, 3, 154, 1472154698),
(278, 14, 154, 1472154698),
(279, 21, 154, 1472154698),
(280, 5, 155, 1472154889),
(281, 3, 155, 1472154889),
(282, 21, 155, 1472154889),
(283, 8, 155, 1472154889),
(284, 11, 156, 1472158097),
(285, 11, 157, 1472158278),
(286, 31, 157, 1472158278),
(287, 4, 157, 1472158278),
(288, 5, 157, 1472158278),
(289, 11, 158, 1472158281),
(290, 31, 158, 1472158281),
(291, 4, 158, 1472158281),
(292, 5, 158, 1472158281),
(293, 11, 159, 1472158284),
(294, 5, 159, 1472158284),
(295, 31, 159, 1472158284),
(296, 8, 159, 1472158284),
(297, 10, 159, 1472158284),
(298, 4, 159, 1472158284),
(299, 3, 159, 1472158284),
(300, 14, 159, 1472158284),
(301, 11, 160, 1472162312),
(302, 11, 161, 1472162337),
(303, 5, 161, 1472162337),
(304, 31, 161, 1472162337),
(305, 3, 161, 1472162337),
(306, 21, 161, 1472162337),
(307, 8, 161, 1472162337),
(308, 11, 162, 1472162373),
(309, 5, 162, 1472162373),
(310, 31, 162, 1472162373),
(311, 3, 162, 1472162373),
(312, 21, 162, 1472162373),
(313, 8, 162, 1472162373),
(314, 11, 163, 1472162409),
(315, 5, 163, 1472162409),
(316, 31, 163, 1472162409),
(317, 3, 163, 1472162409),
(318, 21, 163, 1472162409),
(319, 8, 163, 1472162409),
(320, 8, 164, 1472185582),
(321, 8, 165, 1472185669),
(322, 4, 165, 1472185669),
(323, 5, 165, 1472185669),
(324, 3, 165, 1472185669),
(325, 8, 166, 1472185674),
(326, 8, 167, 1472185690),
(327, 4, 167, 1472185690),
(328, 5, 167, 1472185690),
(329, 3, 167, 1472185690),
(330, 4, 168, 1472192818),
(331, 5, 168, 1472192818),
(332, 8, 168, 1472192818),
(333, 9, 168, 1472192818),
(334, 13, 168, 1472192818),
(335, 31, 168, 1472192818),
(336, 4, 169, 1472193529),
(337, 5, 169, 1472193529),
(338, 8, 169, 1472193529),
(339, 9, 169, 1472193529),
(340, 13, 169, 1472193529),
(341, 31, 169, 1472193529),
(342, 4, 170, 1472193825),
(343, 5, 170, 1472193825),
(344, 8, 170, 1472193825),
(345, 9, 170, 1472193825),
(346, 13, 170, 1472193825),
(347, 31, 170, 1472193825),
(348, 33, 171, 1472198696),
(349, 33, 172, 1472198792),
(350, 33, 173, 1472198825),
(351, 33, 174, 1472198953),
(352, 33, 175, 1472199014),
(353, 33, 176, 1472199014),
(354, 33, 177, 1472199194),
(355, 33, 178, 1472199194),
(356, 33, 179, 1472199353),
(357, 4, 180, 1472199421),
(358, 5, 180, 1472199421),
(359, 8, 180, 1472199421),
(360, 9, 180, 1472199421),
(361, 13, 180, 1472199421),
(362, 31, 180, 1472199421),
(363, 33, 180, 1472199421),
(364, 9, 181, 1472216113),
(365, 4, 182, 1472283456),
(366, 11, 183, 1472293181),
(367, 11, 184, 1472293208),
(368, 5, 184, 1472293208),
(369, 31, 184, 1472293208),
(370, 8, 184, 1472293208),
(371, 4, 184, 1472293208),
(372, 3, 184, 1472293208),
(373, 11, 185, 1472293209),
(374, 5, 185, 1472293209),
(375, 31, 185, 1472293209),
(376, 8, 185, 1472293209),
(377, 33, 185, 1472293209),
(378, 4, 185, 1472293209),
(379, 11, 186, 1472293210),
(380, 5, 186, 1472293210),
(381, 31, 186, 1472293210),
(382, 8, 186, 1472293210),
(383, 33, 186, 1472293210),
(384, 4, 186, 1472293210),
(385, 11, 187, 1472293293),
(386, 11, 188, 1472293293),
(387, 8, 189, 1472321040),
(388, 35, 190, 1472373315),
(389, 35, 191, 1472373471),
(390, 35, 192, 1472373507),
(391, 35, 193, 1472373592),
(392, 35, 194, 1472373625),
(393, 35, 195, 1472374109),
(394, 35, 196, 1472380106),
(395, 3, 196, 1472380106),
(396, 5, 196, 1472380106),
(397, 21, 196, 1472380106),
(398, 8, 196, 1472380106),
(399, 11, 196, 1472380106),
(400, 11, 197, 1472385628),
(401, 11, 198, 1472385667),
(402, 5, 198, 1472385667),
(403, 31, 198, 1472385667),
(404, 8, 198, 1472385667),
(405, 33, 198, 1472385667),
(406, 35, 198, 1472385667),
(407, 11, 199, 1472385669),
(408, 5, 199, 1472385669),
(409, 31, 199, 1472385669),
(410, 8, 199, 1472385669),
(411, 33, 199, 1472385669),
(412, 35, 199, 1472385669),
(413, 36, 200, 1472392413),
(414, 36, 201, 1472392630),
(415, 36, 202, 1472392845),
(416, 36, 203, 1472392845),
(417, 36, 204, 1472392876),
(418, 36, 205, 1472392904),
(419, 3, 205, 1472392904),
(420, 5, 205, 1472392904),
(421, 21, 205, 1472392904),
(422, 8, 205, 1472392904),
(423, 11, 205, 1472392904),
(424, 35, 205, 1472392904),
(425, 36, 206, 1472392939),
(426, 36, 207, 1472392979),
(427, 36, 208, 1472393216),
(428, 36, 209, 1472393835),
(429, 36, 210, 1472393999),
(430, 5, 211, 1472394066),
(431, 8, 211, 1472394066),
(432, 10, 211, 1472394066),
(433, 31, 211, 1472394066),
(434, 36, 211, 1472394066),
(435, 4, 211, 1472394066),
(436, 3, 211, 1472394066),
(437, 14, 211, 1472394066),
(438, 11, 211, 1472394066),
(439, 5, 212, 1472394068),
(440, 8, 212, 1472394068),
(441, 10, 212, 1472394068),
(442, 31, 212, 1472394068),
(443, 35, 212, 1472394068),
(444, 36, 212, 1472394068),
(445, 4, 212, 1472394068),
(446, 3, 212, 1472394068),
(447, 14, 212, 1472394068),
(448, 11, 212, 1472394068),
(449, 5, 213, 1472394072),
(450, 8, 213, 1472394072),
(451, 10, 213, 1472394072),
(452, 31, 213, 1472394072),
(453, 33, 213, 1472394072),
(454, 35, 213, 1472394072),
(455, 36, 213, 1472394072),
(456, 4, 213, 1472394072),
(457, 3, 213, 1472394072),
(458, 14, 213, 1472394072),
(459, 11, 213, 1472394072),
(460, 5, 214, 1472394075),
(461, 8, 214, 1472394075),
(462, 10, 214, 1472394075),
(463, 31, 214, 1472394075),
(464, 33, 214, 1472394075),
(465, 35, 214, 1472394075),
(466, 36, 214, 1472394075),
(467, 4, 214, 1472394075),
(468, 3, 214, 1472394075),
(469, 14, 214, 1472394075),
(470, 11, 214, 1472394075),
(471, 37, 215, 1472476313),
(472, 5, 216, 1472505225),
(473, 8, 216, 1472505225),
(474, 10, 216, 1472505225),
(475, 31, 216, 1472505225),
(476, 33, 216, 1472505225),
(477, 35, 216, 1472505225),
(478, 36, 216, 1472505225),
(479, 4, 216, 1472505225),
(480, 3, 216, 1472505225),
(481, 14, 216, 1472505225),
(482, 11, 216, 1472505225),
(483, 5, 217, 1472505236),
(484, 8, 217, 1472505236),
(485, 10, 217, 1472505236),
(486, 31, 217, 1472505236),
(487, 33, 217, 1472505236),
(488, 35, 217, 1472505236),
(489, 36, 217, 1472505236),
(490, 4, 217, 1472505236),
(491, 3, 217, 1472505236),
(492, 14, 217, 1472505236),
(493, 11, 217, 1472505236),
(494, 5, 218, 1472506199),
(495, 8, 218, 1472506199),
(496, 10, 218, 1472506199),
(497, 31, 218, 1472506199),
(498, 33, 218, 1472506199),
(499, 35, 218, 1472506199),
(500, 36, 218, 1472506199),
(501, 4, 218, 1472506199),
(502, 3, 218, 1472506199),
(503, 14, 218, 1472506199),
(504, 11, 218, 1472506199),
(505, 5, 219, 1472506275),
(506, 8, 219, 1472506275),
(507, 10, 219, 1472506275),
(508, 31, 219, 1472506275),
(509, 33, 219, 1472506275),
(510, 35, 219, 1472506275),
(511, 36, 219, 1472506275),
(512, 4, 219, 1472506275),
(513, 3, 219, 1472506275),
(514, 14, 219, 1472506275),
(515, 11, 219, 1472506275),
(516, 4, 220, 1472527458),
(517, 5, 220, 1472527458),
(518, 8, 220, 1472527458),
(519, 9, 220, 1472527458),
(520, 13, 220, 1472527458),
(521, 31, 220, 1472527458),
(522, 33, 220, 1472527458),
(523, 4, 221, 1472561611),
(524, 5, 221, 1472561611),
(525, 8, 221, 1472561611),
(526, 9, 221, 1472561611),
(527, 13, 221, 1472561611),
(528, 31, 221, 1472561611),
(529, 33, 221, 1472561611),
(530, 36, 221, 1472561611),
(531, 4, 222, 1472561613),
(532, 5, 222, 1472561613),
(533, 8, 222, 1472561613),
(534, 9, 222, 1472561613),
(535, 13, 222, 1472561613),
(536, 31, 222, 1472561613),
(537, 33, 222, 1472561613),
(538, 11, 222, 1472561613),
(539, 36, 222, 1472561613),
(540, 35, 222, 1472561613),
(541, 4, 223, 1472561614),
(542, 5, 223, 1472561614),
(543, 8, 223, 1472561614),
(544, 9, 223, 1472561614),
(545, 13, 223, 1472561614),
(546, 31, 223, 1472561614),
(547, 33, 223, 1472561614),
(548, 11, 223, 1472561614),
(549, 36, 223, 1472561614),
(550, 35, 223, 1472561614),
(551, 38, 224, 1472562653),
(552, 39, 225, 1472592552),
(553, 40, 226, 1472619683),
(554, 40, 227, 1472619789),
(555, 39, 228, 1472619881),
(556, 4, 229, 1472626551),
(557, 5, 229, 1472626551),
(558, 8, 229, 1472626551),
(559, 9, 229, 1472626551),
(560, 13, 229, 1472626551),
(561, 31, 229, 1472626551),
(562, 33, 229, 1472626551),
(563, 11, 229, 1472626551),
(564, 36, 229, 1472626551),
(565, 4, 230, 1472626728),
(566, 5, 230, 1472626728),
(567, 8, 230, 1472626728),
(568, 9, 230, 1472626728),
(569, 13, 230, 1472626728),
(570, 31, 230, 1472626728),
(571, 33, 230, 1472626728),
(572, 11, 230, 1472626728),
(573, 36, 230, 1472626728),
(574, 28, 231, 1472640346),
(575, 4, 232, 1472659019),
(576, 5, 232, 1472659019),
(577, 8, 232, 1472659019),
(578, 9, 232, 1472659019),
(579, 13, 232, 1472659019),
(580, 31, 232, 1472659019),
(581, 33, 232, 1472659019),
(582, 11, 232, 1472659019),
(583, 36, 232, 1472659019),
(584, 4, 233, 1472659129),
(585, 5, 233, 1472659129),
(586, 8, 233, 1472659129),
(587, 9, 233, 1472659129),
(588, 13, 233, 1472659129),
(589, 31, 233, 1472659129),
(590, 33, 233, 1472659129),
(591, 11, 233, 1472659129),
(592, 36, 233, 1472659129),
(593, 4, 234, 1472659243),
(594, 5, 234, 1472659243),
(595, 8, 234, 1472659243),
(596, 9, 234, 1472659243),
(597, 13, 234, 1472659243),
(598, 31, 234, 1472659243),
(599, 33, 234, 1472659243),
(600, 11, 234, 1472659243),
(601, 36, 234, 1472659243),
(602, 41, 235, 1472713725),
(603, 41, 236, 1472713848),
(604, 42, 237, 1472820627),
(605, 42, 238, 1472820824),
(606, 42, 239, 1472820945),
(607, 42, 240, 1472821112),
(608, 42, 241, 1472821112),
(609, 42, 242, 1472821203),
(610, 42, 243, 1472821322),
(611, 5, 244, 1472822427),
(612, 8, 244, 1472822427),
(613, 10, 244, 1472822427),
(614, 31, 244, 1472822427),
(615, 33, 244, 1472822427),
(616, 35, 244, 1472822427),
(617, 36, 244, 1472822427),
(618, 4, 244, 1472822427),
(619, 3, 244, 1472822427),
(620, 14, 244, 1472822427),
(621, 11, 244, 1472822427),
(622, 5, 245, 1472822903),
(623, 8, 245, 1472822903),
(624, 10, 245, 1472822903),
(625, 31, 245, 1472822903),
(626, 33, 245, 1472822903),
(627, 35, 245, 1472822903),
(628, 36, 245, 1472822903),
(629, 4, 245, 1472822903),
(630, 3, 245, 1472822903),
(631, 14, 245, 1472822903),
(632, 11, 245, 1472822903),
(633, 5, 246, 1472822950),
(634, 8, 246, 1472822950),
(635, 10, 246, 1472822950),
(636, 31, 246, 1472822950),
(637, 33, 246, 1472822950),
(638, 35, 246, 1472822950),
(639, 36, 246, 1472822950),
(640, 41, 246, 1472822950),
(641, 4, 246, 1472822950),
(642, 3, 246, 1472822950),
(643, 14, 246, 1472822950),
(644, 11, 246, 1472822950),
(645, 38, 247, 1472836526),
(646, 38, 248, 1472836738),
(647, 38, 249, 1472836827),
(648, 5, 250, 1472849680),
(649, 8, 250, 1472849680),
(650, 10, 250, 1472849680),
(651, 31, 250, 1472849680),
(652, 33, 250, 1472849680),
(653, 35, 250, 1472849680),
(654, 36, 250, 1472849680),
(655, 41, 250, 1472849680),
(656, 4, 250, 1472849680),
(657, 3, 250, 1472849680),
(658, 14, 250, 1472849680),
(659, 11, 250, 1472849680),
(660, 43, 251, 1472909503),
(661, 44, 252, 1472909545),
(662, 13, 253, 1472969837),
(663, 13, 254, 1472969901),
(664, 28, 254, 1472969901),
(665, 4, 254, 1472969901),
(666, 13, 255, 1472969928),
(667, 13, 256, 1472970077),
(668, 8, 257, 1473081354),
(669, 4, 257, 1473081354),
(670, 5, 257, 1473081354),
(671, 3, 257, 1473081354),
(672, 11, 257, 1473081354),
(673, 45, 258, 1473283906),
(674, 28, 259, 1473319092),
(675, 28, 260, 1473319119),
(676, 13, 260, 1473319119),
(677, 3, 260, 1473319119),
(678, 5, 260, 1473319119),
(679, 21, 260, 1473319120),
(680, 8, 260, 1473319120),
(681, 11, 260, 1473319120),
(682, 35, 260, 1473319120),
(683, 36, 260, 1473319120),
(684, 28, 261, 1473319145),
(685, 13, 261, 1473319145),
(686, 8, 261, 1473319145),
(687, 28, 262, 1473319148),
(688, 13, 262, 1473319148),
(689, 4, 262, 1473319148),
(690, 8, 262, 1473319148),
(691, 28, 263, 1473319452),
(692, 28, 264, 1473319513),
(693, 28, 265, 1473319573),
(694, 4, 266, 1473329718),
(695, 5, 266, 1473329718),
(696, 8, 266, 1473329718),
(697, 9, 266, 1473329718),
(698, 13, 266, 1473329718),
(699, 31, 266, 1473329718),
(700, 33, 266, 1473329718),
(701, 11, 266, 1473329718),
(702, 36, 266, 1473329718),
(703, 38, 266, 1473329718),
(704, 42, 267, 1473356336),
(705, 42, 268, 1473356480),
(706, 5, 269, 1473457798),
(707, 8, 269, 1473457798),
(708, 10, 269, 1473457798),
(709, 31, 269, 1473457798),
(710, 33, 269, 1473457798),
(711, 35, 269, 1473457798),
(712, 36, 269, 1473457798),
(713, 41, 269, 1473457798),
(714, 4, 269, 1473457798),
(715, 3, 269, 1473457798),
(716, 14, 269, 1473457798),
(717, 11, 269, 1473457798),
(718, 46, 270, 1473466794),
(719, 14, 271, 1473521450),
(720, 14, 272, 1473521482),
(721, 39, 273, 1473742618),
(722, 39, 274, 1473742687),
(723, 39, 275, 1473742743),
(724, 4, 276, 1473770934),
(725, 5, 276, 1473770934),
(726, 8, 276, 1473770934),
(727, 9, 276, 1473770934),
(728, 13, 276, 1473770934),
(729, 31, 276, 1473770934),
(730, 33, 276, 1473770934),
(731, 11, 276, 1473770934),
(732, 36, 276, 1473770934),
(733, 38, 276, 1473770934),
(734, 5, 277, 1473881103),
(735, 8, 277, 1473881103),
(736, 10, 277, 1473881103),
(737, 31, 277, 1473881103),
(738, 33, 277, 1473881103),
(739, 35, 277, 1473881103),
(740, 36, 277, 1473881103),
(741, 41, 277, 1473881103),
(742, 4, 277, 1473881103),
(743, 3, 277, 1473881103),
(744, 14, 277, 1473881103),
(745, 11, 277, 1473881103),
(746, 47, 278, 1474023642),
(747, 47, 279, 1474023883),
(748, 47, 280, 1474026201),
(749, 47, 281, 1474026263),
(750, 47, 282, 1474026352),
(751, 47, 283, 1474026441),
(752, 19, 284, 1474043316),
(753, 20, 284, 1474043316),
(754, 19, 285, 1474044935),
(755, 19, 286, 1474045415),
(756, 19, 287, 1474045685),
(757, 39, 288, 1474146175),
(758, 13, 289, 1474283864),
(759, 13, 290, 1474283939),
(760, 28, 290, 1474283939),
(761, 5, 290, 1474283939),
(762, 4, 290, 1474283939),
(763, 8, 290, 1474283939),
(764, 10, 290, 1474283939),
(765, 31, 290, 1474283939),
(766, 33, 290, 1474283939),
(767, 35, 290, 1474283939),
(768, 36, 290, 1474283939),
(769, 41, 290, 1474283939),
(770, 3, 290, 1474283939),
(771, 14, 290, 1474283939),
(772, 11, 290, 1474283939),
(773, 13, 291, 1474283984),
(774, 13, 292, 1474284016),
(775, 4, 293, 1474292268),
(776, 5, 293, 1474292268),
(777, 8, 293, 1474292268),
(778, 9, 293, 1474292268),
(779, 13, 293, 1474292268),
(780, 31, 293, 1474292268),
(781, 33, 293, 1474292268),
(782, 11, 293, 1474292268),
(783, 36, 293, 1474292268),
(784, 38, 293, 1474292268),
(785, 4, 294, 1474292708),
(786, 5, 294, 1474292708),
(787, 8, 294, 1474292708),
(788, 9, 294, 1474292708),
(789, 13, 294, 1474292708),
(790, 31, 294, 1474292708),
(791, 33, 294, 1474292708),
(792, 11, 294, 1474292708),
(793, 36, 294, 1474292708),
(794, 38, 294, 1474292708),
(795, 4, 295, 1474292831),
(796, 5, 295, 1474292831),
(797, 8, 295, 1474292831),
(798, 9, 295, 1474292831),
(799, 13, 295, 1474292831),
(800, 31, 295, 1474292831),
(801, 33, 295, 1474292831),
(802, 11, 295, 1474292831),
(803, 36, 295, 1474292831),
(804, 38, 295, 1474292831),
(805, 4, 296, 1474292888),
(806, 5, 296, 1474292888),
(807, 8, 296, 1474292888),
(808, 9, 296, 1474292888),
(809, 13, 296, 1474292888),
(810, 31, 296, 1474292888),
(811, 33, 296, 1474292888),
(812, 11, 296, 1474292888),
(813, 36, 296, 1474292889),
(814, 38, 296, 1474292889),
(815, 35, 297, 1474353161),
(816, 36, 297, 1474353161),
(817, 11, 297, 1474353161),
(818, 5, 297, 1474353161),
(819, 4, 297, 1474353161),
(820, 5, 298, 1474399916),
(821, 8, 298, 1474399916),
(822, 10, 298, 1474399916),
(823, 31, 298, 1474399916),
(824, 33, 298, 1474399916),
(825, 35, 298, 1474399916),
(826, 36, 298, 1474399916),
(827, 41, 298, 1474399916),
(828, 13, 298, 1474399916),
(829, 4, 298, 1474399916),
(830, 3, 298, 1474399916),
(831, 14, 298, 1474399916),
(832, 11, 298, 1474399916),
(833, 28, 298, 1474399916),
(834, 4, 299, 1474549910),
(835, 5, 299, 1474549910),
(836, 8, 299, 1474549910),
(837, 9, 299, 1474549910),
(838, 13, 299, 1474549910),
(839, 31, 299, 1474549910),
(840, 33, 299, 1474549910),
(841, 11, 299, 1474549910),
(842, 36, 299, 1474549910),
(843, 38, 299, 1474549910),
(844, 49, 300, 1474553187),
(845, 49, 301, 1474553249),
(846, 49, 302, 1474553637),
(847, 49, 303, 1474553674),
(848, 49, 304, 1474553713),
(849, 49, 305, 1474719134),
(850, 49, 306, 1474719183),
(851, 5, 306, 1474719183),
(852, 8, 306, 1474719183),
(853, 10, 306, 1474719183),
(854, 31, 306, 1474719183),
(855, 33, 306, 1474719183),
(856, 35, 306, 1474719183),
(857, 36, 306, 1474719183),
(858, 41, 306, 1474719183),
(859, 13, 306, 1474719183),
(860, 4, 306, 1474719183),
(861, 3, 306, 1474719183),
(862, 14, 306, 1474719183),
(863, 11, 306, 1474719183),
(864, 49, 307, 1474719224),
(865, 50, 308, 1474807621),
(866, 50, 309, 1474810662),
(867, 50, 310, 1474810722),
(868, 50, 311, 1474810722),
(869, 50, 312, 1474810819),
(870, 50, 313, 1474810819),
(871, 50, 314, 1474810971),
(872, 50, 315, 1474811002),
(873, 50, 316, 1474811445),
(874, 8, 316, 1474811445),
(875, 28, 316, 1474811445),
(876, 4, 317, 1474812251),
(877, 5, 317, 1474812251),
(878, 8, 317, 1474812251),
(879, 9, 317, 1474812251),
(880, 13, 317, 1474812251),
(881, 31, 317, 1474812251),
(882, 33, 317, 1474812251),
(883, 11, 317, 1474812251),
(884, 36, 317, 1474812251),
(885, 38, 317, 1474812251),
(886, 50, 317, 1474812251),
(887, 51, 318, 1474880247),
(888, 4, 321, 1474921615),
(889, 5, 321, 1474921615),
(890, 8, 321, 1474921615),
(891, 9, 321, 1474921615),
(892, 13, 321, 1474921615),
(893, 31, 321, 1474921615),
(894, 33, 321, 1474921615),
(895, 11, 321, 1474921615),
(896, 36, 321, 1474921615),
(897, 38, 321, 1474921615),
(898, 50, 321, 1474921615),
(899, 53, 322, 1475003540),
(900, 53, 323, 1475003726),
(901, 53, 324, 1475003767),
(902, 53, 325, 1475003851),
(903, 5, 326, 1475052194),
(904, 8, 326, 1475052194),
(905, 10, 326, 1475052194),
(906, 31, 326, 1475052194),
(907, 33, 326, 1475052194),
(908, 35, 326, 1475052194),
(909, 36, 326, 1475052194),
(910, 41, 326, 1475052194),
(911, 13, 326, 1475052194),
(912, 4, 326, 1475052194),
(913, 3, 326, 1475052194),
(914, 14, 326, 1475052194),
(915, 11, 326, 1475052194),
(916, 49, 326, 1475052194),
(917, 5, 327, 1475052270),
(918, 8, 327, 1475052270),
(919, 10, 327, 1475052270),
(920, 31, 327, 1475052270),
(921, 33, 327, 1475052270),
(922, 35, 327, 1475052270),
(923, 36, 327, 1475052270),
(924, 41, 327, 1475052270),
(925, 13, 327, 1475052270),
(926, 4, 327, 1475052270),
(927, 3, 327, 1475052270),
(928, 14, 327, 1475052270),
(929, 11, 327, 1475052270),
(930, 49, 327, 1475052270),
(931, 50, 328, 1475130283),
(932, 4, 328, 1475130283),
(933, 54, 329, 1475139662),
(934, 54, 331, 1475139996),
(935, 54, 330, 1475139996),
(936, 54, 332, 1475140063),
(937, 54, 333, 1475140097),
(938, 54, 334, 1475140200),
(939, 54, 335, 1475140200),
(940, 54, 336, 1475140332),
(941, 4, 337, 1475314843),
(942, 5, 337, 1475314843),
(943, 8, 337, 1475314843),
(944, 9, 337, 1475314843),
(945, 13, 337, 1475314843),
(946, 31, 337, 1475314843),
(947, 33, 337, 1475314843),
(948, 11, 337, 1475314843),
(949, 36, 337, 1475314843),
(950, 38, 337, 1475314843),
(951, 50, 337, 1475314843),
(952, 4, 343, 1475325194),
(953, 5, 343, 1475325194),
(954, 8, 343, 1475325194),
(955, 9, 343, 1475325194),
(956, 13, 343, 1475325194),
(957, 31, 343, 1475325194),
(958, 33, 343, 1475325194),
(959, 11, 343, 1475325194),
(960, 36, 343, 1475325194),
(961, 38, 343, 1475325194),
(962, 50, 343, 1475325194),
(963, 4, 344, 1476192027),
(964, 5, 344, 1476192027),
(965, 8, 344, 1476192027),
(966, 9, 344, 1476192027),
(967, 13, 344, 1476192027),
(968, 31, 344, 1476192027),
(969, 33, 344, 1476192027),
(970, 11, 344, 1476192027),
(971, 36, 344, 1476192027),
(972, 38, 344, 1476192027),
(973, 50, 344, 1476192027),
(974, 4, 345, 1476200364),
(975, 5, 345, 1476200364),
(976, 8, 345, 1476200364),
(977, 9, 345, 1476200364),
(978, 13, 345, 1476200364),
(979, 31, 345, 1476200364),
(980, 33, 345, 1476200364),
(981, 11, 345, 1476200364),
(982, 36, 345, 1476200364),
(983, 38, 345, 1476200364),
(984, 50, 345, 1476200364),
(985, 43, 346, 1476541918),
(986, 5, 0, 1476548987),
(987, 4, 0, 1476548987),
(988, 3, 0, 1476548987),
(989, 8, 0, 1476548987),
(990, 10, 0, 1476548987),
(991, 14, 0, 1476548987),
(992, 11, 0, 1476548987),
(993, 31, 0, 1476548987),
(994, 33, 0, 1476548987),
(995, 33, 0, 1476548987),
(996, 35, 0, 1476548987),
(997, 36, 0, 1476548987),
(998, 41, 0, 1476548987),
(999, 13, 0, 1476548987),
(1000, 13, 0, 1476548987),
(1001, 49, 0, 1476548987),
(1002, 5, 0, 1476549039),
(1003, 4, 0, 1476549039),
(1004, 3, 0, 1476549039),
(1005, 8, 0, 1476549039),
(1006, 10, 0, 1476549039),
(1007, 14, 0, 1476549039),
(1008, 11, 0, 1476549039),
(1009, 31, 0, 1476549039),
(1010, 33, 0, 1476549039),
(1011, 33, 0, 1476549039),
(1012, 35, 0, 1476549039),
(1013, 36, 0, 1476549039),
(1014, 41, 0, 1476549039),
(1015, 13, 0, 1476549039),
(1016, 13, 0, 1476549039),
(1017, 49, 0, 1476549039),
(1018, 5, 0, 1476549224),
(1019, 4, 0, 1476549224),
(1020, 3, 0, 1476549224),
(1021, 8, 0, 1476549224),
(1022, 10, 0, 1476549224),
(1023, 14, 0, 1476549224),
(1024, 11, 0, 1476549224),
(1025, 31, 0, 1476549224),
(1026, 33, 0, 1476549224),
(1027, 33, 0, 1476549224),
(1028, 35, 0, 1476549224),
(1029, 36, 0, 1476549224),
(1030, 41, 0, 1476549224),
(1031, 13, 0, 1476549224),
(1032, 13, 0, 1476549224),
(1033, 49, 0, 1476549224),
(1034, 5, 0, 1476549263),
(1035, 4, 0, 1476549263),
(1036, 3, 0, 1476549263),
(1037, 8, 0, 1476549263),
(1038, 10, 0, 1476549263),
(1039, 14, 0, 1476549263),
(1040, 11, 0, 1476549263),
(1041, 31, 0, 1476549263),
(1042, 33, 0, 1476549263),
(1043, 33, 0, 1476549263),
(1044, 35, 0, 1476549263),
(1045, 36, 0, 1476549263),
(1046, 41, 0, 1476549263),
(1047, 13, 0, 1476549263),
(1048, 13, 0, 1476549263),
(1049, 49, 0, 1476549263),
(1050, 5, 351, 1476549525),
(1051, 4, 351, 1476549525),
(1052, 3, 351, 1476549525),
(1053, 8, 351, 1476549525),
(1054, 10, 351, 1476549525),
(1055, 14, 351, 1476549525),
(1056, 11, 351, 1476549525),
(1057, 31, 351, 1476549525),
(1058, 33, 351, 1476549525),
(1059, 33, 351, 1476549525),
(1060, 35, 351, 1476549525),
(1061, 36, 351, 1476549525),
(1062, 41, 351, 1476549525),
(1063, 13, 351, 1476549525),
(1064, 13, 351, 1476549525),
(1065, 49, 351, 1476549525),
(1066, 58, 352, 1476626261),
(1067, 58, 353, 1476626552),
(1068, 58, 354, 1476626732),
(1069, 58, 355, 1476627122),
(1070, 4, 356, 1476786850),
(1071, 5, 356, 1476786850),
(1072, 8, 356, 1476786850),
(1073, 9, 356, 1476786850),
(1074, 13, 356, 1476786850),
(1075, 31, 356, 1476786850),
(1076, 33, 356, 1476786850),
(1077, 11, 356, 1476786850),
(1078, 36, 356, 1476786850),
(1079, 38, 356, 1476786850),
(1080, 50, 356, 1476786850),
(1081, 11, 357, 1476894294),
(1082, 5, 357, 1476894294),
(1083, 31, 357, 1476894294),
(1084, 8, 357, 1476894294),
(1085, 33, 357, 1476894294),
(1086, 35, 357, 1476894294),
(1087, 50, 357, 1476894294),
(1088, 4, 357, 1476894294),
(1089, 0, 0, 1476938564),
(1090, 5, 359, 1476949896),
(1091, 4, 359, 1476949896),
(1092, 3, 359, 1476949896),
(1093, 8, 359, 1476949896),
(1094, 10, 359, 1476949896),
(1095, 14, 359, 1476949896),
(1096, 11, 359, 1476949896),
(1097, 31, 359, 1476949896),
(1098, 33, 359, 1476949896),
(1099, 33, 359, 1476949896),
(1100, 35, 359, 1476949896),
(1101, 36, 359, 1476949896),
(1102, 41, 359, 1476949896),
(1103, 13, 359, 1476949896),
(1104, 13, 359, 1476949896),
(1105, 49, 359, 1476949896),
(1106, 5, 360, 1476949932),
(1107, 4, 360, 1476949932),
(1108, 3, 360, 1476949932),
(1109, 8, 360, 1476949932),
(1110, 10, 360, 1476949932),
(1111, 14, 360, 1476949932),
(1112, 11, 360, 1476949932),
(1113, 31, 360, 1476949932),
(1114, 33, 360, 1476949932),
(1115, 33, 360, 1476949932),
(1116, 35, 360, 1476949932),
(1117, 36, 360, 1476949932),
(1118, 41, 360, 1476949932),
(1119, 13, 360, 1476949932),
(1120, 13, 360, 1476949932),
(1121, 49, 360, 1476949932),
(1122, 50, 360, 1476949932),
(1123, 5, 361, 1476949971),
(1124, 4, 361, 1476949971),
(1125, 3, 361, 1476949971),
(1126, 8, 361, 1476949971),
(1127, 10, 361, 1476949971),
(1128, 14, 361, 1476949971),
(1129, 11, 361, 1476949971),
(1130, 31, 361, 1476949971),
(1131, 33, 361, 1476949971),
(1132, 33, 361, 1476949971),
(1133, 35, 361, 1476949971),
(1134, 36, 361, 1476949971),
(1135, 41, 361, 1476949971),
(1136, 13, 361, 1476949971),
(1137, 13, 361, 1476949971),
(1138, 49, 361, 1476949971),
(1139, 50, 361, 1476949971),
(1140, 60, 362, 1476971859),
(1141, 60, 363, 1476971921),
(1142, 61, 364, 1477131761),
(1143, 61, 365, 1477132270),
(1144, 61, 366, 1477132399),
(1145, 61, 367, 1477132936),
(1146, 62, 368, 1477475600),
(1147, 5, 369, 1477475736),
(1148, 4, 369, 1477475736),
(1149, 3, 369, 1477475736),
(1150, 8, 369, 1477475736),
(1151, 10, 369, 1477475736),
(1152, 14, 369, 1477475736),
(1153, 11, 369, 1477475736),
(1154, 31, 369, 1477475736),
(1155, 33, 369, 1477475736),
(1156, 33, 369, 1477475736),
(1157, 35, 369, 1477475736),
(1158, 36, 369, 1477475736),
(1159, 41, 369, 1477475736),
(1160, 13, 369, 1477475736),
(1161, 13, 369, 1477475736),
(1162, 49, 369, 1477475736),
(1163, 50, 369, 1477475736),
(1164, 62, 369, 1477475736),
(1165, 5, 370, 1477475860),
(1166, 4, 370, 1477475860),
(1167, 3, 370, 1477475860),
(1168, 8, 370, 1477475860),
(1169, 10, 370, 1477475860),
(1170, 14, 370, 1477475860),
(1171, 11, 370, 1477475860),
(1172, 31, 370, 1477475860),
(1173, 33, 370, 1477475860),
(1174, 33, 370, 1477475860),
(1175, 35, 370, 1477475860),
(1176, 36, 370, 1477475860),
(1177, 41, 370, 1477475860),
(1178, 13, 370, 1477475860),
(1179, 13, 370, 1477475860),
(1180, 49, 370, 1477475860),
(1181, 50, 370, 1477475860),
(1182, 61, 370, 1477475860),
(1183, 62, 370, 1477475860),
(1184, 4, 371, 1477670181),
(1185, 5, 371, 1477670181),
(1186, 8, 371, 1477670181),
(1187, 9, 371, 1477670181),
(1188, 13, 371, 1477670181),
(1189, 31, 371, 1477670181),
(1190, 33, 371, 1477670181),
(1191, 11, 371, 1477670181),
(1192, 36, 371, 1477670181),
(1193, 38, 371, 1477670181),
(1194, 50, 371, 1477670181),
(1195, 61, 371, 1477670181),
(1196, 19, 372, 1477836233),
(1197, 19, 373, 1477836330),
(1198, 20, 373, 1477836330),
(1199, 19, 0, 1477836343),
(1200, 20, 0, 1477836343),
(1201, 4, 375, 1477901818),
(1202, 5, 375, 1477901818),
(1203, 8, 375, 1477901818),
(1204, 9, 375, 1477901818),
(1205, 13, 375, 1477901818),
(1206, 31, 375, 1477901818),
(1207, 33, 375, 1477901818),
(1208, 11, 375, 1477901818),
(1209, 36, 375, 1477901818),
(1210, 38, 375, 1477901818),
(1211, 50, 375, 1477901818),
(1212, 61, 375, 1477901818),
(1213, 4, 376, 1477903098),
(1214, 5, 376, 1477903098),
(1215, 8, 376, 1477903098),
(1216, 9, 376, 1477903098),
(1217, 13, 376, 1477903098),
(1218, 31, 376, 1477903098),
(1219, 33, 376, 1477903098),
(1220, 11, 376, 1477903098),
(1221, 36, 376, 1477903098),
(1222, 38, 376, 1477903098),
(1223, 50, 376, 1477903098),
(1224, 61, 376, 1477903098),
(1225, 4, 377, 1477904349),
(1226, 5, 377, 1477904349),
(1227, 8, 377, 1477904349),
(1228, 9, 377, 1477904349),
(1229, 13, 377, 1477904349),
(1230, 31, 377, 1477904349),
(1231, 33, 377, 1477904349),
(1232, 11, 377, 1477904349),
(1233, 36, 377, 1477904349),
(1234, 38, 377, 1477904349),
(1235, 50, 377, 1477904349),
(1236, 61, 377, 1477904349),
(1237, 4, 378, 1477904473),
(1238, 5, 378, 1477904473),
(1239, 8, 378, 1477904473),
(1240, 9, 378, 1477904473),
(1241, 13, 378, 1477904473),
(1242, 31, 378, 1477904473),
(1243, 33, 378, 1477904473),
(1244, 11, 378, 1477904473),
(1245, 36, 378, 1477904473),
(1246, 38, 378, 1477904473),
(1247, 50, 378, 1477904473),
(1248, 61, 378, 1477904473),
(1249, 4, 379, 1477904547),
(1250, 5, 379, 1477904547),
(1251, 8, 379, 1477904547),
(1252, 9, 379, 1477904547),
(1253, 13, 379, 1477904547),
(1254, 31, 379, 1477904547),
(1255, 33, 379, 1477904547),
(1256, 11, 379, 1477904547),
(1257, 36, 379, 1477904547),
(1258, 38, 379, 1477904547),
(1259, 50, 379, 1477904547),
(1260, 61, 379, 1477904547),
(1261, 4, 380, 1477905118),
(1262, 5, 380, 1477905118),
(1263, 8, 380, 1477905118),
(1264, 9, 380, 1477905118),
(1265, 13, 380, 1477905118),
(1266, 31, 380, 1477905118),
(1267, 33, 380, 1477905118),
(1268, 11, 380, 1477905118),
(1269, 36, 380, 1477905118),
(1270, 38, 380, 1477905118),
(1271, 50, 380, 1477905118),
(1272, 61, 380, 1477905118),
(1273, 4, 381, 1477905940),
(1274, 5, 381, 1477905940),
(1275, 8, 381, 1477905940),
(1276, 9, 381, 1477905940),
(1277, 13, 381, 1477905940),
(1278, 31, 381, 1477905940),
(1279, 33, 381, 1477905940),
(1280, 11, 381, 1477905940),
(1281, 36, 381, 1477905940),
(1282, 38, 381, 1477905940),
(1283, 50, 381, 1477905940),
(1284, 61, 381, 1477905940),
(1285, 4, 382, 1477906014),
(1286, 5, 382, 1477906014),
(1287, 8, 382, 1477906014),
(1288, 9, 382, 1477906014),
(1289, 13, 382, 1477906014),
(1290, 31, 382, 1477906014),
(1291, 33, 382, 1477906014),
(1292, 11, 382, 1477906014),
(1293, 36, 382, 1477906014),
(1294, 38, 382, 1477906014),
(1295, 50, 382, 1477906014),
(1296, 61, 382, 1477906014),
(1297, 4, 383, 1477906143),
(1298, 5, 383, 1477906143),
(1299, 8, 383, 1477906143),
(1300, 9, 383, 1477906143),
(1301, 13, 383, 1477906143),
(1302, 31, 383, 1477906143),
(1303, 33, 383, 1477906143),
(1304, 11, 383, 1477906144),
(1305, 36, 383, 1477906144),
(1306, 38, 383, 1477906144),
(1307, 50, 383, 1477906144),
(1308, 61, 383, 1477906144),
(1309, 71, 384, 1478243275),
(1310, 61, 385, 1478339028),
(1311, 4, 385, 1478339028),
(1312, 5, 385, 1478339028),
(1313, 72, 386, 1478343565),
(1314, 72, 387, 1478343646),
(1315, 72, 388, 1478343681),
(1316, 72, 389, 1478343796),
(1317, 72, 390, 1478343857),
(1318, 72, 391, 1478343975),
(1319, 72, 392, 1478344088),
(1320, 5, 393, 1478344671),
(1321, 4, 393, 1478344671),
(1322, 3, 393, 1478344671),
(1323, 8, 393, 1478344671),
(1324, 10, 393, 1478344671),
(1325, 14, 393, 1478344671),
(1326, 11, 393, 1478344671),
(1327, 31, 393, 1478344671),
(1328, 33, 393, 1478344671),
(1329, 33, 393, 1478344671),
(1330, 35, 393, 1478344671),
(1331, 36, 393, 1478344671),
(1332, 41, 393, 1478344671),
(1333, 13, 393, 1478344671),
(1334, 13, 393, 1478344671),
(1335, 49, 393, 1478344671),
(1336, 50, 393, 1478344671),
(1337, 61, 393, 1478344671),
(1338, 62, 393, 1478344671),
(1339, 5, 394, 1478344753),
(1340, 4, 394, 1478344753),
(1341, 3, 394, 1478344753),
(1342, 8, 394, 1478344753),
(1343, 10, 394, 1478344753),
(1344, 14, 394, 1478344753),
(1345, 11, 394, 1478344753),
(1346, 31, 394, 1478344753),
(1347, 33, 394, 1478344753),
(1348, 33, 394, 1478344753),
(1349, 35, 394, 1478344753),
(1350, 36, 394, 1478344753),
(1351, 41, 394, 1478344753),
(1352, 13, 394, 1478344753),
(1353, 13, 394, 1478344753),
(1354, 49, 394, 1478344753),
(1355, 50, 394, 1478344753),
(1356, 61, 394, 1478344753),
(1357, 62, 394, 1478344753),
(1358, 72, 395, 1478345138),
(1359, 5, 395, 1478345138),
(1360, 61, 396, 1478345636),
(1361, 4, 396, 1478345636),
(1362, 5, 396, 1478345636),
(1363, 7, 397, 1478511893),
(1364, 80, 398, 1479128416),
(1365, 80, 399, 1479128541),
(1366, 80, 400, 1479128574);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adds`
--
ALTER TABLE `adds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_goal`
--
ALTER TABLE `admin_goal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_work_log`
--
ALTER TABLE `admin_work_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advert_category`
--
ALTER TABLE `advert_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advert_city`
--
ALTER TABLE `advert_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advert_country`
--
ALTER TABLE `advert_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advert_sub_category`
--
ALTER TABLE `advert_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_type`
--
ALTER TABLE `ad_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_commission`
--
ALTER TABLE `agent_commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `age_group`
--
ALTER TABLE `age_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_setting`
--
ALTER TABLE `app_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendency_group`
--
ALTER TABLE `attendency_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_category`
--
ALTER TABLE `business_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_favorite`
--
ALTER TABLE `business_favorite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_folder`
--
ALTER TABLE `business_folder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_follower`
--
ALTER TABLE `business_follower`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_message`
--
ALTER TABLE `business_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_photo`
--
ALTER TABLE `business_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `call_to_action`
--
ALTER TABLE `call_to_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_code`
--
ALTER TABLE `country_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_age_group`
--
ALTER TABLE `event_age_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_attendency_group`
--
ALTER TABLE `event_attendency_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_comment`
--
ALTER TABLE `event_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_kind`
--
ALTER TABLE `event_kind`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_like`
--
ALTER TABLE `event_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_price_group`
--
ALTER TABLE `event_price_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_requirement`
--
ALTER TABLE `event_requirement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gossip`
--
ALTER TABLE `gossip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gossip_category`
--
ALTER TABLE `gossip_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gossip_like`
--
ALTER TABLE `gossip_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gossip_post`
--
ALTER TABLE `gossip_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gossip_review`
--
ALTER TABLE `gossip_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsfeed`
--
ALTER TABLE `newsfeed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsfeed_photo`
--
ALTER TABLE `newsfeed_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator_ads_assigned`
--
ALTER TABLE `operator_ads_assigned`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_group`
--
ALTER TABLE `price_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `push_user`
--
ALTER TABLE `push_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_rule`
--
ALTER TABLE `rating_rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `side_add`
--
ALTER TABLE `side_add`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsored_search_results`
--
ALTER TABLE `sponsored_search_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor_ads_assigned`
--
ALTER TABLE `supervisor_ads_assigned`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor_team`
--
ALTER TABLE `supervisor_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_business_claim`
--
ALTER TABLE `user_business_claim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_business_rating`
--
ALTER TABLE `user_business_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_chunk`
--
ALTER TABLE `user_chunk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_event_going`
--
ALTER TABLE `user_event_going`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_event_interested`
--
ALTER TABLE `user_event_interested`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_follower`
--
ALTER TABLE `user_follower`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_friend`
--
ALTER TABLE `user_friend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_message`
--
ALTER TABLE `user_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_wall`
--
ALTER TABLE `user_wall`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `adds`
--
ALTER TABLE `adds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `admin_goal`
--
ALTER TABLE `admin_goal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin_work_log`
--
ALTER TABLE `admin_work_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `advert_category`
--
ALTER TABLE `advert_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `advert_city`
--
ALTER TABLE `advert_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `advert_country`
--
ALTER TABLE `advert_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `advert_sub_category`
--
ALTER TABLE `advert_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ad_type`
--
ALTER TABLE `ad_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `agent_commission`
--
ALTER TABLE `agent_commission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `age_group`
--
ALTER TABLE `age_group`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `app_setting`
--
ALTER TABLE `app_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `attendency_group`
--
ALTER TABLE `attendency_group`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=245;
--
-- AUTO_INCREMENT for table `business_category`
--
ALTER TABLE `business_category`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=535;
--
-- AUTO_INCREMENT for table `business_favorite`
--
ALTER TABLE `business_favorite`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `business_folder`
--
ALTER TABLE `business_folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `business_follower`
--
ALTER TABLE `business_follower`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `business_message`
--
ALTER TABLE `business_message`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `business_photo`
--
ALTER TABLE `business_photo`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `call_to_action`
--
ALTER TABLE `call_to_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1074;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `country_code`
--
ALTER TABLE `country_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=255;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event_age_group`
--
ALTER TABLE `event_age_group`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event_attendency_group`
--
ALTER TABLE `event_attendency_group`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event_comment`
--
ALTER TABLE `event_comment`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event_kind`
--
ALTER TABLE `event_kind`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event_like`
--
ALTER TABLE `event_like`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event_price_group`
--
ALTER TABLE `event_price_group`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event_requirement`
--
ALTER TABLE `event_requirement`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gossip`
--
ALTER TABLE `gossip`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gossip_category`
--
ALTER TABLE `gossip_category`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gossip_like`
--
ALTER TABLE `gossip_like`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gossip_post`
--
ALTER TABLE `gossip_post`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gossip_review`
--
ALTER TABLE `gossip_review`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=150;
--
-- AUTO_INCREMENT for table `newsfeed`
--
ALTER TABLE `newsfeed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=401;
--
-- AUTO_INCREMENT for table `newsfeed_photo`
--
ALTER TABLE `newsfeed_photo`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `operator_ads_assigned`
--
ALTER TABLE `operator_ads_assigned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `price_group`
--
ALTER TABLE `price_group`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `push_user`
--
ALTER TABLE `push_user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `rating_rule`
--
ALTER TABLE `rating_rule`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `side_add`
--
ALTER TABLE `side_add`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sponsored_search_results`
--
ALTER TABLE `sponsored_search_results`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=612;
--
-- AUTO_INCREMENT for table `supervisor_ads_assigned`
--
ALTER TABLE `supervisor_ads_assigned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supervisor_team`
--
ALTER TABLE `supervisor_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `user_business_claim`
--
ALTER TABLE `user_business_claim`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_business_rating`
--
ALTER TABLE `user_business_rating`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `user_chunk`
--
ALTER TABLE `user_chunk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_event_going`
--
ALTER TABLE `user_event_going`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_event_interested`
--
ALTER TABLE `user_event_interested`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_follower`
--
ALTER TABLE `user_follower`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_friend`
--
ALTER TABLE `user_friend`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `user_message`
--
ALTER TABLE `user_message`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_notification`
--
ALTER TABLE `user_notification`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_wall`
--
ALTER TABLE `user_wall`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1367;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
