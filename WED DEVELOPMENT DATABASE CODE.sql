-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2021 at 01:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockbroking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(5) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
('EC006', 'sujith', 'sujithshetty');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `CARID` varchar(10) DEFAULT NULL,
  `USERID` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`CARID`, `USERID`) VALUES
('1', '1'),
('5', '3'),
('3', '4'),
('6', '7');

-- --------------------------------------------------------

--
-- Table structure for table `cardetails`
--

CREATE TABLE `cardetails` (
  `CARID` varchar(10) NOT NULL,
  `CARNAME` varchar(255) DEFAULT NULL,
  `CARMODEL` varchar(255) DEFAULT NULL,
  `OWNERNAME` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `PRICE` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cardetails`
--

INSERT INTO `cardetails` (`CARID`, `CARNAME`, `CARMODEL`, `OWNERNAME`, `EMAIL`, `PRICE`) VALUES
('1', 'BUGATI', '2014', 'SANATH', 'sanath@gmail.com', 500000),
('2', ' LAMBORGHINI', '2018', 'YOGITH', 'yogith@gmail.com', 10000000),
('3', 'ROLLS ROYCE', '2019', 'PRATHAM', 'pratham@gmail.com', 20000000),
('4', 'JAGUAR', '2015', 'KOUSHIK', 'koushik@gmail.com', 500000),
('5', 'BENZ', '2014', 'SHASHIDHAR', 'shashidhar@gmail.com', 5000000),
('6', 'FERRARi', '2013', 'SHAHID', 'shahid@gmail.com', 30000000);

-- --------------------------------------------------------

--
-- Table structure for table `confirm`
--

CREATE TABLE `confirm` (
  `CARID` varchar(10) DEFAULT NULL,
  `USERID` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `confirm`
--

INSERT INTO `confirm` (`CARID`, `USERID`) VALUES
('1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USERID` varchar(10) NOT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `PHONE` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USERID`, `NAME`, `EMAIL`, `PASSWORD`, `PHONE`) VALUES
('1', 'SANATH', 'sanath@gmail.com', 'sanath', 9008578270),
('2', 'YOGITH', 'yogith@gmail.com', 'yogith', 8296513219),
('3', 'PRATHAM', 'pratham@gmail.com', 'pratham', 6363754830),
('4', 'KOUSHIK', 'koushik@gmail.com', 'koushik', 9481971123),
('5', 'SHASHIDHAR', 'shashidhar@gmail.com', 'shashidhar', 7899485898),
('6', 'SHAHID', 'shahid@gmail.com', 'shahid', 9901978292),
('7', 'SUJITH', 'sujith@gmail.com', 'sujith', 8296636293);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD KEY `CARID` (`CARID`),
  ADD KEY `USERID` (`USERID`);

--
-- Indexes for table `cardetails`
--
ALTER TABLE `cardetails`
  ADD PRIMARY KEY (`CARID`);

--
-- Indexes for table `confirm`
--
ALTER TABLE `confirm`
  ADD KEY `CARID` (`CARID`),
  ADD KEY `USERID` (`USERID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USERID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyers`
--
ALTER TABLE `buyers`
  ADD CONSTRAINT `buyers_ibfk_1` FOREIGN KEY (`CARID`) REFERENCES `cardetails` (`CARID`),
  ADD CONSTRAINT `buyers_ibfk_2` FOREIGN KEY (`USERID`) REFERENCES `users` (`USERID`);

--
-- Constraints for table `confirm`
--
ALTER TABLE `confirm`
  ADD CONSTRAINT `confirm_ibfk_1` FOREIGN KEY (`CARID`) REFERENCES `cardetails` (`CARID`),
  ADD CONSTRAINT `confirm_ibfk_2` FOREIGN KEY (`USERID`) REFERENCES `users` (`USERID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
