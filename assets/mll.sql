-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 01:45 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` varchar(15) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `sex` set('M','F') NOT NULL,
  `dob` date NOT NULL,
  `email` text NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admincell`
--

CREATE TABLE `admincell` (
  `AdminID` varchar(15) NOT NULL,
  `phoneNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `ProductID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `Ordered_Price` double NOT NULL,
  `OrderDate` date NOT NULL,
  `ItemQty` tinyint(4) NOT NULL,
  `Order_Status` set('Cancelled','Successful','','') NOT NULL,
  `Coupon_Code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `OrderID` int(11) NOT NULL,
  `PaymentID` int(11) NOT NULL,
  `PaymentType` set('Credit','Debit','','') NOT NULL,
  `PaymentDate` int(11) NOT NULL,
  `cardNo` bigint(20) NOT NULL,
  `cardExpYear` tinyint(4) NOT NULL,
  `cardExpMonth` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ReviewID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Prod_Brand` text NOT NULL,
  `Prod_Desc` longtext NOT NULL,
  `category` text NOT NULL,
  `imgpath` varchar(255) NOT NULL,
  `ListPrice` int(11) NOT NULL,
  `UnitInStock` tinyint(4) NOT NULL,
  `UnitInOrder` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ReviewID`, `ProductID`, `Prod_Brand`, `Prod_Desc`, `category`, `imgpath`, `ListPrice`, `UnitInStock`, `UnitInOrder`) VALUES
(1, 2, 'Logitech', 'Logitech M220 Silent Wireless Mouse', 'Computer Accessories', 'assets/categories/04 910-004878.jpg', 800, 5, NULL),
(2, 3, 'Acer', 'Acer QHD Webcam with Built-in Omnidirectional Noise-Reducing Digital Microphone', 'Computer Accessories', 'assets/categories/41SpDKDfGZL._AC_SL1000___60860.1640161566.jpg', 3000, 4, NULL),
(3, 4, 'GoPro', 'GoPro HERO10 Black - Waterproof Action Camera with Front LCD and Touch Rear Screens', 'Camera & Drones', 'assets/categories/61k-BCnVBJL._AC_SL1500___80371.1637336787.jpg', 25000, 7, NULL),
(4, 5, 'Apple', 'MacBook Pro with Apple M1 Chip (13-inch, 8GB RAM, 512GB SSD Storage) - Silver ‎', 'Laptop & PCs', 'assets/categories/71gD8WdSlaL._AC_SL1500___03984.1640971617.jpg', 75000, 3, NULL),
(5, 6, 'Logitech ', 'Logitech G923 Racing Wheel and Pedals for Playstation 4 and PC featuring TRUEFORCE up to 1000 Hz Force Feedback, Responsive Pedal, Dual Clutch Launch Control, and Genuine Leather Wheel Cover', 'Games & Consoles', 'assets/categories/priceguru-Logitech-941-000124_02.jpg', 22000, 13, NULL),
(6, 7, 'MSI', 'MSI MPG X570 Gaming Plus Motherboard (AMD AM4, PCIe 4.0, DDR4, SATA 6Gb/s, M.2, USB 3.2 Gen 2, HDMI, ATX)', 'Computer Hardwares', 'assets/categories/priceguru-msi-msi-z270-gaming-m5-socket-.jpg', 10500, 13, NULL),
(7, 8, 'Sony', 'Sony PS5 Console (Disc Version)', 'Games & Consoles', 'assets/categories/priceguru-playstation-5-console-_with-drive__2.jpg', 50000, 9, NULL),
(8, 9, 'Samsung', 'Note 10 Lite Silver', 'Phones', 'assets/categories/samsung-galaxy-note-10-lite-128gb6gb-n770-dual-sim-silver__52669.1588833503.jpg', 15000, 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ClientID` int(11) NOT NULL,
  `ReviewID` int(11) NOT NULL,
  `Rating` set('0','1','2','3','4','5') NOT NULL,
  `CustomerReview` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ClientID`, `ReviewID`, `Rating`, `CustomerReview`) VALUES
(1, 1, '4', 'Good product'),
(1, 2, '5', 'Satisfied'),
(2, 3, '3', 'Good product'),
(3, 4, '5', 'Company sells the best product'),
(4, 5, '4', 'Good service'),
(4, 6, '5', 'Product is awesome'),
(5, 7, '5', 'Product fully new and functional'),
(2, 8, '4', 'Phone in excellent condition');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `ClientID` int(11) NOT NULL,
  `ShoppingID` int(11) NOT NULL,
  `qty_wish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `admincell`
--
ALTER TABLE `admincell`
  ADD PRIMARY KEY (`phoneNum`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ClientID`),
  ADD UNIQUE KEY `phonenum` (`phonenum`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `ReviewID` (`ReviewID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `ClientID` (`ClientID`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`ShoppingID`),
  ADD KEY `ClientID` (`ClientID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `ShoppingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admincell`
--
ALTER TABLE `admincell`
  ADD CONSTRAINT `admincell_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`);

--
-- Constraints for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD CONSTRAINT `ordertable_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `ordertable` (`OrderID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`ReviewID`) REFERENCES `review` (`ReviewID`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ClientID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ClientID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
