-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 02:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

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
  `Price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Full Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `natid` varchar(14) NOT NULL,
  `phone_num` varchar(11) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `postal_code` varchar(7) DEFAULT NULL,
  `country` varchar(30) NOT NULL,
  `passport_num` varchar(25) NOT NULL,
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

INSERT INTO `users` (`Full Name`, `Email`, `Password`, `natid`, `phone_num`, `address`, `postal_code`, `country`, `passport_num`, `nationality`, `role`, `cs_status`, `cs_comment`, `status`, `date_time`) VALUES
('Samuel n Wasfy Zakhary', 'samuel20028422@miuegypt.edu.eg', 'samuelzakhary', '30209278800075', NULL, NULL, NULL, '', '', '', 'user', NULL, '', 0, '2022-05-21 16:38:11'),
('Samuel Nabil Wasfy Zakhary', 'samuel2002842@miuegypt.edu.eg', 'samuelzakhary', '30209278800076', NULL, NULL, NULL, '', '', '', 'user', NULL, '', NULL, '2022-05-21 16:38:11'),
('youssef m aly saleh', 'yousseef200213@miuegypt.edu.eg', '202002130', '30106030103293', NULL, NULL, NULL, '', '', '', 'user', NULL, '', 1, '2022-05-21 16:38:11'),
('youssef mohamed aly saleh', 'youssef200213@miuegypt.edu.eg', '202002130', '30106030103294', NULL, NULL, NULL, '', '', '', 'user', NULL, '', NULL, '2022-05-21 16:38:11');

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
  MODIFY `rev_num` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
