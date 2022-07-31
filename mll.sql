-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 31, 2022 at 10:29 PM
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
(6, 'Phones'),
(7, 'TV & Sound');

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
(1, 2, '2022-07-25', 1, 'Mcb', 0),
(2, 1, '2022-07-25', 1, 'Mcb', 1),
(3, 2, '2022-08-01', 0, 'Sbm', 0),
(4, 5, '2022-07-24', 1, 'Mcb', 0),
(5, 4, '2022-07-27', 1, 'Sbm', 1),
(6, 4, '2022-08-01', 0, 'Mcb', 0),
(7, 1, '2022-07-30', 0, 'Mcb', 0),
(8, 3, '2022-08-01', 1, 'Sbm', 1),
(9, 5, '2022-07-30', 0, 'Sbm', 0);

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
(1, 3, 1, 1, 3000),
(2, 21, 2, 1, 65000),
(3, 36, 3, 2, 22000),
(4, 5, 4, 3, 200000),
(5, 40, 5, 1, 75990),
(6, 14, 6, 1, 13500),
(7, 12, 7, 1, 25000),
(8, 4, 8, 2, 50000),
(9, 61, 9, 1, 1250);

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
(9, 6, 'Samsung', 'Note 10 Lite Silver', 'assets/categories/samsung-galaxy-note-10-lite-128gb6gb-n770-dual-sim-silver__52669.1588833503.jpg', 15000, 6),
(10, 3, 'Microsoft', 'NEW Microsoft Surface Duo 128GB (Unlocked) - Glacier', 'assets/categories/1.jpg', 45000, 4),
(11, 3, 'Acer', 'Acer Aspire Vero AV15-51-5155 Green PC | 15.6\" FHD IPS Display | 11th Gen Intel Core i5-1155G7 | Intel Iris Xe Graphics | 8GB DDR4 | 256GB SSD | Wi-Fi 6 | PCR Materials | Windows 11 Home', 'assets/categories/2.jpg', 40000, 3),
(12, 5, 'ZOTAC', 'ZOTAC Gaming GeForce RTX™ 3080 Trinity OC LHR 10GB GDDR6X 320-bit 19 Gbps PCIE 4.0 Gaming Graphics Card, IceStorm 2.0 Advanced Cooling, Spectra 2.0 RGB Lighting, ZT-A30800J-10PLHR', 'assets/categories/3.jpg', 25000, 5),
(13, 5, 'MSI', 'MSI Gaming GeForce RTX 3070 Ti SUPRIM X 8GB GDRR6X 256-Bit HDMI/DP Nvlink Torx Fan 4 RGB Ampere Architecture Graphics Card (RTX 3070 Ti Suprim X 8G)', 'assets/categories/4.jpg', 18500, 3),
(14, 5, 'Intel', 'Intel Core i5-12400 Desktop Processor 18M Cache, up to 4.40 GHz BX8071512400', 'assets/categories/5.jpg', 13500, 6),
(15, 1, 'Logitech', 'Logitech Wireless Combo MK345 with Full-Size Keyboard and Right-Handed Mouse', 'assets/categories/6.jpg', 475, 14),
(16, 1, 'Universal', 'USB TYPE-C to Lightning Cable', 'assets/categories/7.jpg', 200, 20),
(17, 7, 'ViewSonic', 'ViewSonic VX2476-SMHD 24-inch IPS Full HD Monitor with 75Hz, VGA, HDMI, Display port Frameless Bezel\r\nViewsonic', 'assets/categories/8.jpg', 11990, 5),
(18, 3, 'Coolermaster', 'COOLERMASTER MASTERBOX MB540 (w/o PSU) ARGB Ether Front Panel The I/O panel comes with a USB 3.2 (Gen 2) Type-C port, two additional USB 3.2 (Gen 1) ports, and one 3.5mm (audio + mic) headset jack', 'assets/categories/9.jpg', 6490, 6),
(19, 7, 'HyperX', 'HyperX Cloud Stinger – Gaming Headset, Lightweight, Comfortable Memory Foam, Swivel to Mute Noise-Cancellation Mic, Works on PC, PS4, PS5, Xbox One, Xbox Series X|S, Nintendo Switch and Mobile ,Black ', 'assets/categories/10.jpg', 5500, 7),
(20, 6, 'Apple', 'APPLE IPHONE 12 / 128GB / WHITE', 'assets/categories/11.jpg', 32000, 8),
(21, 6, 'Apple', 'APPLE IPHONE13 128 GB STARLIGHT', 'assets/categories/12.jpg', 65000, 8),
(22, 6, 'Huawei', 'HUAWEI P50 POCKET PE PREMIUM GOLD', 'assets/categories/13.jpg', 77000, 6),
(23, 6, 'Huawei', 'HUAWEI NOVA Y70 / MID BLACK', 'assets/categories/14.jpg', 9750, 6),
(24, 7, 'Panasonic', 'PANASONIC Blu-Ray Player BLACK', 'assets/categories/15.jpg', 2990, 8),
(25, 7, 'Panasonic', 'PANASONIC HOME THEATER SYSTEM BLACK', 'assets/categories/16.jpg', 14990, 6),
(26, 7, 'Panasonic', 'PANASONIC SOUND SYSTEM / SC-MAX3500GS BLACK', 'assets/categories/17.jpg', 14990, 9),
(27, 7, 'Panasonic', 'PANASONIC HOME THEATER SYSTEM/SC-XH166GS-K BLACK', 'assets/categories/18.jpg', 6990, 8),
(28, 7, 'JBL', 'JBL BLUETOOTH SPEAKER / BOOMBOX2 BLACK', 'assets/categories/19.jpg', 23500, 6),
(29, 7, 'JBL', 'JBL BLUETOOTH SPEAKER XTREME 3 BLUE', 'assets/categories/20.jpg', 14500, 7),
(32, 7, 'JBL', 'JBL WIRELESS EARPHONES / TUNE225 TWS BLACK', 'assets/categories/21.jpg', 4500, 8),
(33, 7, 'Panasonic', 'PANASONIC 43″ FHD ANDROID LED TV / TH-43GS655M', 'assets/categories/22.jpg', 21000, 7),
(34, 7, 'Panasonic', 'PANASONIC 65″ UHD SMART LED TV / TH-65HX750M FRAMELESS DESIGN', 'assets/categories/23.jpg', 38990, 5),
(35, 7, 'LG', 'LG 55″ SMART UHD LED TV / 55UP7500PVG BLACK', 'assets/categories/24.jpg', 34500, 6),
(36, 2, 'D-LINK', 'D-LINK SECURITY CAMERA / DCS-P8', 'assets/categories/25.jpg', 11000, 8),
(37, 2, 'EZVIZ ', 'EZVIZ OUTDOOR WIFI-CAMERA / CS-C3N WHITE', 'assets/categories/26.jpg', 2590, 11),
(38, 4, 'PlayStation', 'DualShock 4 Wireless Controller for PlayStation 4 - Jet Black ', 'assets/categories/27.jpg', 1590, 12),
(39, 3, 'Sager', '2022 Sager NP7860P Gaming Laptop, 15.6 Inch Thin Bezel FHD 144Hz, Intel i7-12700H, RTX 3060 6GB, 32GB RAM, 1TB Gen4 NVMe SSD, TBT 4, Win 11', 'assets/categories/28.jpg', 65990, 6),
(40, 3, 'ASUS', 'ASUS ROG Strix Scar 15 (2022) Gaming Laptop, 15.6” 300Hz IPS FHD Display, NVIDIA GeForce RTX 3070 Ti,Intel Core i9 12900H, 16GB DDR5, 1TB SSD, Per-Key RGB Keyboard, Windows 11 Home, G533ZW-AS94 ', 'assets/categories/29.jpg', 75990, 7),
(41, 7, 'Dragon Touch', 'Dragon Touch 4K Portable Monitor - 15.6 Inch IPS HDR Gaming Monitor 100% sRGB FreeSync with Speakers VESA Compatible for Xbox PS4 Nintendo Switch Laptop PC Phone Mac Surface', 'assets/categories/30.jpg', 14500, 6),
(42, 3, 'CHUWI', 'CHUWI HeroBook Pro 14.1\'\' Laptop Computer, 8GB RAM 256GB SSD, Windows 10 Laptop, Intel Celeron N4020 Processor, 1920x1080 FHD Display, Ultra Slim Notebook PC, WiFi, BT4.2 (Support Windows 11)', 'assets/categories/31.jpg', 52990, 3),
(43, 1, 'HUANUO', 'Monitor Stand, Monitor Stand with Drawer, Monitor Riser Mesh Metal, Desk Organizer, Monitor Stand with Storage, Desktop Computer Stand for PC, Laptop, Printer - HUANUO', 'assets/categories/32.jpg', 1000, 12),
(44, 1, 'ATEBOUNER', 'ATEBOUNER USB C Hub,6 in 1 USB C to HDMI Multiport Adapter with 4K HDMI, USB 3.0 / USB 2.0,USB C 100W PD Charging and Micro SD/SD Card Reader for MacBook, iPad Pro, XPS, Samsung Phones and More', 'assets/categories/33.jpg', 550, 13),
(45, 1, 'Soundance', 'Soundance Laptop Stand, Aluminum Computer Riser, Ergonomic Laptops Elevator for Desk, Metal Holder Compatible with 10 to 15.6 Inches Notebook Computer, Silver', 'assets/categories/34.jpg', 425, 18),
(46, 7, 'Universal', 'USB Microphone, TONOR Computer Cardioid Condenser PC Gaming Mic with Tripod Stand & Pop Filter for Streaming, Podcasting, Vocal Recording, Compatible...', 'assets/categories/35.jpg', 800, 15),
(47, 1, 'Verbatim', 'Verbatim Slimline Full Size Wired Keyboard USB Plug-and-Play Compatible with PC, Laptop - Frustration Free Packaging Black', 'assets/categories/36.jpg', 550, 20),
(48, 1, 'Razer', 'Razer DeathAdder Essential Gaming Mouse: 6400 DPI Optical Sensor - 5 Programmable Buttons - Mechanical Switches - Rubber Side Grips - Classic Black ', 'assets/categories/37.jpg', 1590, 16),
(49, 1, 'EVGA', 'EVGA Z12 RGB Gaming Keyboard, RGB Backlit LED, 5 Programmable Macro Keys, Dedicated Media Keys, Water Resistant, 834-W0-12US-KR', 'assets/categories/38.jpg', 2200, 21),
(50, 3, 'Thermaltake', 'Thermaltake Glacier 360 Liquid-Cooled PC (AMD Ryzen 5 5600X, RTX 3060, 16GB RGB 3600Mhz DDR4 ToughRAM RGB Memory, 1TB NVMe M.2, WiFi, Win 10 Home) Gaming Desktop Computer S3WT-B550-G36-LCS ', 'assets/categories/39.jpg', 55000, 10),
(51, 3, 'MSI', 'MSI Trident X (SFF) Gaming Desktop, Intel Core i9-11900K, GeForce RTX 3090, 64GB Memory, 2TB SSD + 2TB HDD, WiFi 6E, USB Type-C, Thunderbolt 4, VR-Ready, Windows 10 PRO (11TJ-1869US) ', 'assets/categories/40.jpg', 45990, 12),
(52, 3, 'Skytech', 'Skytech Prism II Gaming PC Desktop – AMD Ryzen 7 5800X 3.8GHz, RTX 3080 10G GDDR6X, 1TB Gen4 SSD, 16G DDR4 3200, 750W Gold PSU, 360mm AIO, AC Wi-Fi, Windows 10 Home 64-bit \r\n', 'assets/categories/41.jpg', 47500, 12),
(53, 2, 'Canon', 'Canon EOS Rebel T8i DSLR Camera with 18-55mm & 75-300mm Lens Bundle + 420-800mm MF Zoom Lens + 2X 32GB Sandisk Memory + Accessory Bundle Including Auxiliary Lenses, Tripod, Camera case & More ', 'assets/categories/42.jpg', 35000, 8),
(54, 2, 'Canon', 'Canon EOS 6D Mark II DSLR Camera with EF 24-105mm USM Lens, WiFi Enabled', 'assets/categories/43.jpg', 41500, 6),
(55, 2, 'Canon', 'Canon DSLR Camera [EOS 90D] with Built-in Wi-Fi, Bluetooth, DIGIC 8 Image Processor, 4K Video, Dual Pixel CMOS AF, and 3.0 Inch Vari-Angle Touch LCD Screen, [Body Only], Black ', 'assets/categories/44.jpg', 50000, 9),
(56, 4, 'Microsoft', 'Microsoft Xbox One X 1TB Console with Wireless Controller: Xbox One X Enhanced, HDR, Native 4K, Ultra HD (2017 Model) (Renewed)', 'assets/categories/45.jpg', 32500, 10),
(57, 4, 'Lego', 'Lego Star Wars: The Skywalker Saga (Nintendo Switch) ', 'assets/categories/46.jpg', 1400, 15),
(58, 4, 'The Witcher', 'The Witcher 3 Complete Edition Switch (Nintendo Switch) ', 'assets/categories/47.jpg', 1400, 10),
(59, 4, 'FIFA', 'FIFA 22 Legacy Edition (Nintendo Switch)', 'assets/categories/48.jpg', 1400, 12),
(60, 4, 'The Walking Dead', 'The Walking Dead: The Telltale Definitive Series (PS4) ', 'assets/categories/49.jpg', 1250, 18),
(61, 4, 'The Last Of Us ', 'The Last Of Us Part II - PlayStation 4 ', 'assets/categories/50.jpg', 1250, 15);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

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
