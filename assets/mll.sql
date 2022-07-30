-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 30, 2022 at 05:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mll2`
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Computer Accessories'),
(2, 'Camera & Drones'),
(3, 'Laptop & PCs'),
(4, 'Games & Consoles'),
(5, 'Computer Hardwares'),
(6, 'Phones');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ClientID` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `dob` date NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `date_joined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ClientID`, `fname`, `lname`, `dob`, `email`, `password`, `street`, `city`, `date_joined`) VALUES
(1, 'Paul', 'Smith', '1992-03-12', 'psmith1992@gmail.com', 'paulsmith1234', 'Berthaud Street', 'Curepipe', '2021-07-15'),
(2, 'Cecilia ', 'Fletcher', '1997-03-06', 'cecialia06@gmail.com', 'ceciliafletcher1234', 'Paratin St', 'Vacoas', '2022-07-04'),
(3, 'Tara ', 'Willis', '1999-03-03', 'tarawillis@gmail.com', 'tarawillis1234', 'Pelican Street', 'Floreal', '2021-11-11'),
(4, 'Reuben ', 'Mcghee', '1997-03-21', 'reubsmcghee97@gmail.com', 'reubenmcghee1234', 'Stork Lane', 'Port Louis', '2022-05-09'),
(5, 'Mack ', 'Robson', '1998-09-17', 'mackrobbs1998@gmail.com', 'mackrobson1234', 'Dr Ferriere Avenue', 'Quatre Bornes', '2022-02-08'),
(6, 'Divankar', 'Ramhit', '0000-00-00', 'ramhit828@gmail.com', 'shreedhar12', 'Crysand lane,', 'Rose-Belle', '2021-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `order_id` int(11) NOT NULL,
  `clientID` int(11) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `order_status` int(11) NOT NULL,
  `pay_method` varchar(50) NOT NULL,
  `pay_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`order_id`, `clientID`, `order_date`, `order_status`, `pay_method`, `pay_status`) VALUES
(1, 2, '2022-07-25', 1, 'Mcb', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`detail_id`, `product_id`, `order_id`, `quantity`, `price`) VALUES
(1, 3, 1, 1, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `Prod_Brand` text NOT NULL,
  `Prod_Desc` longtext NOT NULL,
  `imgpath` varchar(255) NOT NULL,
  `ListPrice` int(11) NOT NULL,
  `UnitInStock` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `category_id`, `Prod_Brand`, `Prod_Desc`, `imgpath`, `ListPrice`, `UnitInStock`) VALUES
(2, 1, 'Logitech', 'Logitech M220 Silent Wireless Mouse', 'assets/categories/04 910-004878.jpg', 800, 5),
(3, 1, 'Acer', 'Acer QHD Webcam with Built-in Omnidirectional Noise-Reducing Digital Microphone', 'assets/categories/41SpDKDfGZL._AC_SL1000___60860.1640161566.jpg', 3000, 4),
(4, 2, 'GoPro', 'GoPro HERO10 Black - Waterproof Action Camera with Front LCD and Touch Rear Screens', 'assets/categories/61k-BCnVBJL._AC_SL1500___80371.1637336787.jpg', 25000, 7),
(5, 3, 'Apple', 'MacBook Pro with Apple M1 Chip (13-inch, 8GB RAM, 512GB SSD Storage) - Silver ‎', 'assets/categories/71gD8WdSlaL._AC_SL1500___03984.1640971617.jpg', 75000, 3),
(6, 4, 'Logitech ', 'Logitech G923 Racing Wheel and Pedals for Playstation 4 and PC featuring TRUEFORCE up to 1000 Hz Force Feedback, Responsive Pedal, Dual Clutch Launch Control, and Genuine Leather Wheel Cover', 'assets/categories/priceguru-Logitech-941-000124_02.jpg', 22000, 13),
(7, 5, 'MSI', 'MSI MPG X570 Gaming Plus Motherboard (AMD AM4, PCIe 4.0, DDR4, SATA 6Gb/s, M.2, USB 3.2 Gen 2, HDMI, ATX)', 'assets/categories/priceguru-msi-msi-z270-gaming-m5-socket-.jpg', 10500, 13),
(8, 4, 'Sony', 'Sony PS5 Console (Disc Version)', 'assets/categories/priceguru-playstation-5-console-_with-drive__2.jpg', 50000, 9),
(9, 6, 'Samsung', 'Note 10 Lite Silver', 'assets/categories/samsung-galaxy-note-10-lite-128gb6gb-n770-dual-sim-silver__52669.1588833503.jpg', 15000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ClientID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `ReviewID` int(11) NOT NULL,
  `Rating` set('0','1','2','3','4','5') NOT NULL,
  `CustomerReview` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ClientID`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `clientID` (`clientID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `ClientID` (`ClientID`),
  ADD KEY `ProductID` (`ProductID`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD CONSTRAINT `ordertable_ibfk_1` FOREIGN KEY (`clientID`) REFERENCES `client` (`ClientID`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `ordertable` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`ProductID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ClientID`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ClientID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
