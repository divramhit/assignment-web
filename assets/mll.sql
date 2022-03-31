-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 01:29 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mll`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ClientID` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `phonenum` int(11) NOT NULL,
  `dob` date NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ClientID`, `fname`, `lname`, `phonenum`, `dob`, `email`, `password`, `street`, `city`) VALUES
(1, 'Paul', 'Smith', 12345342, '1992-03-12', 'psmith1992@gmail.com', 'paulsmith1234', 'Berthaud Street', 'Curepipe'),
(2, 'Cecilia ', 'Fletcher', 3454353, '1997-03-06', 'cecialia06@gmail.com', 'ceciliafletcher1234', 'Paratin St', 'Vacoas'),
(3, 'Tara ', 'Willis', 87856454, '1999-03-03', 'tarawillis@gmail.com', 'tarawillis1234', 'Pelican Street', 'Floreal'),
(4, 'Reuben ', 'Mcghee', 546874589, '1997-03-21', 'reubsmcghee97@gmail.com', 'reubenmcghee1234', 'Stork Lane', 'Port Louis'),
(5, 'Mack ', 'Robson', 849830405, '1998-09-17', 'mackrobbs1998@gmail.com', 'mackrobson1234', 'Dr Ferriere Avenue', 'Quatre Bornes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ClientID`),
  ADD UNIQUE KEY `phonenum` (`phonenum`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
