-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 04:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `egway`
--

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `guardian_natid` varchar(30) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `natid` varchar(30) DEFAULT NULL,
  `age` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `who` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`date`, `who`, `action`, `description`) VALUES
('2022-06-12 02:14:24', 'nasr', 'update', 'nasr updated mohamed data');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `name` varchar(200) NOT NULL,
  `rev_num` int(25) NOT NULL,
  `f_code` varchar(15) NOT NULL,
  `f_code2` varchar(15) NOT NULL,
  `f_code3` varchar(15) NOT NULL,
  `rate` int(1) DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL,
  `cancel` tinyint(1) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `Price` int(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `edit` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`name`, `rev_num`, `f_code`, `f_code2`, `f_code3`, `rate`, `comment`, `cancel`, `date`, `Price`, `status`, `edit`) VALUES
('Guest', 53, 'LO0001PA', 'PA0001CA', '', NULL, NULL, NULL, '2022-06-11 14:08:19', 7900, 'Ordered', 0),
('Guest', 54, 'LO0001PA', 'PA0001CA', '', NULL, NULL, NULL, '2022-06-11 14:08:19', 7900, 'Ordered', 0),
('Guest', 55, 'LO0001PA', 'PA0001CA', '', NULL, NULL, NULL, '2022-06-11 14:08:19', 7900, 'Ordered', 0),
('Guest', 5447, 'LO0001PA', 'PA0001CA', '', 3, 'bad staff', 2, '2022-06-11 14:08:19', 7900, 'Ordered', 0),
('Guest', 11111, 'LO0001PA', 'PA0001CA', '', 4, 'nice', NULL, '2022-06-11 14:08:19', 7900, 'Ordered', 0),
('Guest', 424011, 'LO0001PA', 'PA0001CA', '', 1, 'could not open emergency exit for air', 1, '2022-06-11 14:08:19', 7900, 'Ordered', 0);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `FlightCode` varchar(10) NOT NULL,
  `FromAirPort` varchar(10) NOT NULL,
  `Destination` varchar(10) NOT NULL,
  `f_date` date NOT NULL DEFAULT current_timestamp(),
  `price` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`FlightCode`, `FromAirPort`, `Destination`, `f_date`, `price`) VALUES
('CA0001LO', 'Cairo', 'London', '2022-06-06', '8800'),
('CA0001PA', 'Cairo', 'Paris', '2022-06-06', '8700'),
('CA0002LO', 'Cairo', 'London', '2022-06-06', '7000'),
('CA0003LO', 'Cairo', 'London', '2022-06-09', '6500'),
('LO0001CA', 'London', 'Cairo', '2022-06-08', '5500'),
('LO0001PA', 'London', 'Paris', '2022-06-15', '3500'),
('LO0004CA', 'London', 'Cairo', '2022-06-30', '5500'),
('PA0001CA', 'Paris', 'Cairo', '2022-06-23', '4400');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `natid` varchar(14) NOT NULL,
  `phone_num` varchar(11) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `postal_code` varchar(7) DEFAULT NULL,
  `country` varchar(30) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `cs_status` tinyint(1) DEFAULT NULL,
  `cs_comment` varchar(100) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Name`, `Email`, `Password`, `natid`, `phone_num`, `address`, `postal_code`, `country`, `nationality`, `role`, `cs_status`, `cs_comment`, `status`, `date_time`) VALUES
('aaaaaaa', 'aaa@mi.com', 'asdskaldksladalk', '458745245', '423445', '44545 anklaskln', '646246', 'eg', 'eg', 'cs', 0, '', NULL, '2022-06-12 14:43:33'),
('fas', 'afss@mm.commmm', 'fsss', '01530540', '454564684', 'a', 'fa', 'f', 'af', 'cs', 0, '', NULL, '2022-06-12 13:29:10'),
('bate5', 'bte5@farm.com', '', '301547990', '10101013045', '141 farm', '306010', 'cc', 'cc', 'cs', NULL, '', NULL, '2022-06-12 04:39:00'),
('ffrggrdg', 'dhjjf@ukftd.com', '454866', '0023648641', '4606', 'hvjhbjn', '54541.2', 'eg', 'gg', 'cs', 1, '', NULL, '2022-06-12 13:22:34'),
('sdsda', 'dwdwdsd@mm.com', 'ajflkasfkl', '511100', '04543541', 'askslncaklsn', '2043512', 'cc', 'cc', 'cs', 1, 'hgjhgj', NULL, '2022-06-12 13:26:18'),
('sdsdaasascasc', 'dwdwsxaxdsd@mmmmm.com', 'ajflkxasxasxasfkl', '51110000', '04543541235', 'askslncaklsn', '2043512', 'cc', 'cc', 'cs', 0, '', NULL, '2022-06-12 13:27:09'),
('klhlihl', 'hkhkjh@jhkg.com', 'basdmgsamhds', '5065456431', '0530651', 'kjckahk 056', '0656', 'eg', 'eg', 'cs', 0, '', NULL, '2022-06-12 13:16:03'),
('uggjyg', 'jhkjhkuh@mmm.com', 'gkgkuhlkn', '446848611', '021021540', ' vnvvnbv', '05454', 'eg', 'eg', 'cs', 1, '', NULL, '2022-06-12 13:23:28'),
('mmmm', 'kjhkhg@egg.com', 'nmjgkjgkg', '564531231', '21654864', 'bgkjjkbj', '5656', 'eg', 'eg', 'cs', 0, '', NULL, '2022-06-12 13:21:27'),
('mohamed ', 'mohamed@egway.com', 'password', '10101010303030', '10020147952', '031561 mmmm', '3050406', 'eg', 'eg', 'cs', 0, '', NULL, '2022-06-12 13:08:29'),
('nasr', 'nasr@egway.com', 'sadjklsadklsandkl', '131513', '535115440', 'dasdasdasd', '4335135', 'eg', 'eg', 'cs', 0, '', NULL, '2022-06-12 13:57:55'),
('mmmmm', 'njkhkjhkh@eg.com', '1010101010', '30540500530', '456460451', '4054+605 bj gkjhnh', '212654', 'eggg', 'eggg', 'cs', 0, '', NULL, '2022-06-12 13:11:01'),
('Samuel n Wasfy Zakhary', 'samuel200284212@miuegypt.edu.eg', 'samuelzakhary', '30209278800074', NULL, NULL, NULL, '', '', 'qc', 0, '', 0, '2022-05-21 16:38:11'),
('Samuel n Wasfy Zakhary', 'samuel20028422@miuegypt.edu.eg', 'samuelzakhary', '30209278800075', NULL, NULL, NULL, '', '', 'user', NULL, '', 0, '2022-05-21 16:38:11'),
('Samuel Nabil Wasfy Zakhary', 'samuel2002842@miuegypt.edu.eg', 'samuelzakhary', '30209278800076', NULL, NULL, NULL, '', '', 'user', NULL, '', 0, '2022-05-21 16:38:11'),
('Samuel Nabil Wasfy Zakhary', 'samuel20028442@miuegypt.edu.eg', 'samuelzakhary', '3020927880045', NULL, NULL, NULL, '', '', 'cs', 1, 'ggtytyj', 1, '2022-05-21 16:38:11'),
('samuel', 'samuel@egway.com', 'l;dalksjdklaskdln', '360465430', '1546541165', '1321313 hslkahdkshd', '254654', 'eg', 'eg', 'cs', 0, '', NULL, '2022-06-12 13:43:44'),
('fasaaa', 'sssssasdsaafss@mm.commmm', 'asdsadsad', '01530540468864', '5066505', 'a', '000', 'eg', 'af', 'cs', 0, '', NULL, '2022-06-12 13:42:12'),
('btates afndy', 'yousseef20021113@miuegypt.edu.eg', '202002130', '30106030103276', NULL, NULL, NULL, '', '', 'user', NULL, '', NULL, '2022-05-21 16:38:11'),
('youssef m aly saleh', 'yousseef200213@miuegypt.edu.eg', '202002130', '30106030103293', NULL, NULL, NULL, '', '', 'user', NULL, '', 1, '2022-05-21 16:38:11'),
('youssef m aly saleh', 'yousseef2002213@miuegypt.edu.eg', '202002130', '30106030103291', NULL, NULL, NULL, '', '', 'qc', 1, '', 0, '2022-05-21 16:38:11'),
('youssef mohamed aly saleh', 'youssef2002113@miuegypt.edu.eg', '202002130', '30106030103269', NULL, NULL, NULL, '', '', 'cs', 0, '', 0, '2022-05-21 16:38:11'),
('youssef mohamed aly saleh', 'youssef200213@miuegypt.edu.eg', '202002130', '30106030103294', NULL, NULL, NULL, '', '', 'user', NULL, '', NULL, '2022-05-21 16:38:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`guardian_natid`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`rev_num`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`FlightCode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `NatID` (`natid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `rev_num` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424012;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
