-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 04:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carousel`
--

CREATE TABLE `tbl_carousel` (
  `carouselID` int(11) NOT NULL,
  `image` varchar(5000) NOT NULL,
  `link` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_carousel`
--

INSERT INTO `tbl_carousel` (`carouselID`, `image`, `link`) VALUES
(2, 'toshiba-dynabook-b85EP.jpeg', 'http://localhost/5kgadget/item.php?id=48'),
(3, 'lenovo-thinkpad-e525.jpeg', 'http://localhost/5kgadget/item.php?id=47'),
(4, 'Dell-latitude-e6230jpeg.jpeg', 'http://localhost/5kgadget/item.php?id=46'),
(5, '5k_banner.jpeg', 'https://www.facebook.com/5kOnlineshop.laptop');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartID` int(11) NOT NULL,
  `UserID` int(255) NOT NULL,
  `ProductID` int(255) NOT NULL,
  `ProductImage` varchar(1000) NOT NULL,
  `ProductName` varchar(1000) NOT NULL,
  `Quantity` int(255) NOT NULL,
  `Price` varchar(1000) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `Time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `actionID` int(11) NOT NULL,
  `Action` varchar(5000) NOT NULL,
  `Name` varchar(1000) NOT NULL,
  `UserType` varchar(255) NOT NULL,
  `DateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `CustomerName` varchar(1000) NOT NULL,
  `Email` varchar(1000) NOT NULL,
  `order` varchar(5000) NOT NULL,
  `Total` varchar(1000) NOT NULL,
  `Method` varchar(1000) NOT NULL,
  `Contact` varchar(13) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `DateTime` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`orderID`, `userID`, `CustomerName`, `Email`, `order`, `Total`, `Method`, `Contact`, `address`, `Status`, `DateTime`) VALUES
(53, 49, 'ROBY RALPH BELON', 'robybelon@gmail.com', 'TOSHIBA DYNABOOK B65/EP(1) | ', '4990', 'COD', '09473241643', 'LOT 93 CLUSTER K BAGONG NAYON 1, ANTIPOLO CITY, RIZAL', 'Delivered', 'December 4 2023 07:21:22 PM'),
(54, 54, 'ASDJFASJ RASJDFJL', 'DSFKA@GMAIL.COM', 'LENOVO THINKPAD E525(1) | ', '6990', 'COD', '09452124', 'LOT 93 CLUSTER K BAGONG NAYON 1, ANTIPOLO CITY, RIZAL', 'Delivered', 'December 13 2023 10:55:34 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_items`
--

CREATE TABLE `tbl_order_items` (
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(1000) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `DateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_order_items`
--

INSERT INTO `tbl_order_items` (`UserID`, `ProductID`, `ProductName`, `Quantity`, `DateTime`) VALUES
(44, 3, 'Flossin Kapow 3mg 250ml', 1, '2022-06-06 22:04:45'),
(44, 8, 'Aspire PockeX Box', 1, '2022-06-06 22:04:45'),
(47, 17, 'Muji organic Cotton unbleach', 1, '2022-06-14 18:10:46'),
(47, 6, 'Aspire Flexus Blok', 1, '2022-06-14 19:50:41'),
(47, 4, 'atomizers', 1, '2022-06-14 19:50:41'),
(44, 24, 'Drag S mod Pod kit', 1, '2022-06-14 21:33:32'),
(44, 22, 'Yakult blue', 1, '2022-06-14 21:33:32'),
(44, 14, 'Cheese cake 60ml', 1, '2022-06-14 21:33:32'),
(44, 20, 'Mango Strawberry 60ml', 1, '2022-06-14 21:33:32'),
(44, 13, 'Aegis X', 1, '2022-06-14 21:33:32'),
(49, 48, 'TOSHIBA DYNABOOK B65/EP', 1, '2023-12-04 19:21:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ourshop`
--

CREATE TABLE `tbl_ourshop` (
  `data` int(11) NOT NULL,
  `ourshop` varchar(255) NOT NULL,
  `text` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_ourshop`
--

INSERT INTO `tbl_ourshop` (`data`, `ourshop`, `text`) VALUES
(1, 'MISSION', 'Our mission is to establish a vape shop in Rizal that will offer all brands of electronic cigarettes, accessories, and E-liquid vape juice to our valued customers at all times, as well as a place where people can socialize.'),
(2, 'VISION', 'Our goal is to open a safe and secured vape shop in Antipolo, Rizal, that will serve as a gathering place for fans of electronic cigarettes.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `ProductID` int(11) NOT NULL,
  `ProductImage` varchar(1000) NOT NULL,
  `Name` varchar(1000) NOT NULL,
  `Description` varchar(5000) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` varchar(20) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Created` datetime NOT NULL,
  `Status` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`ProductID`, `ProductImage`, `Name`, `Description`, `Quantity`, `Price`, `Category`, `Created`, `Status`) VALUES
(46, 'product-images/Dell-latitude-e6230.jpeg', 'DELL LATITUDE E6230', ' Intel Core i3-3130M\r\n4GB RAM DDR3\r\n320GB SATA HDD\r\nINTEL HD GRAPHICS\r\n12.5 INCHES WIDE\r\nWi-Fi READY ', 6, '6990', 'Laptops', '2023-12-04 18:31:51', 'Active'),
(47, 'product-images/lenovo-thinkpad-e525.jpg', 'LENOVO THINKPAD E525', 'AMD E2-3000m\r\n4GB RAM DDR3\r\n320 SATA HDD\r\nRadeon HD Graphics\r\n15.6 Inches Wide\r\nWi-Fi Ready', 6, '6990', 'Laptops', '2023-12-04 18:38:23', 'Active'),
(48, 'product-images/TOSHIBA_DYNABOOK_B65_EP.jpg', 'TOSHIBA DYNABOOK B65/EP', '2nd Gen INTEL CELERON \n\r\n4GB RAM DDR3 \n\r\n250GB SATA HDD \n\r\nINTEL HD GRAPHICS \n\r\n15.6 Inches Wide \n\r\nWi-Fi READY', 2, '4990', 'Laptops', '2023-12-04 19:03:21', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE `tbl_sales` (
  `salesID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `CustomerName` varchar(1000) NOT NULL,
  `Email` varchar(1000) NOT NULL,
  `orders` varchar(5000) NOT NULL,
  `total` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`salesID`, `orderID`, `userID`, `CustomerName`, `Email`, `orders`, `total`, `status`, `Date`) VALUES
(9, 53, 49, 'ROBY RALPH BELON', 'robybelon@gmail.com', 'TOSHIBA DYNABOOK B65/EP(1) | ', '4990', 'Refunded', '2023-12-04'),
(10, 54, 54, 'ASDJFASJ RASJDFJL', 'DSFKA@GMAIL.COM', 'LENOVO THINKPAD E525(1) | ', '6990', 'Delivered', '2023-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `UserID` int(11) NOT NULL,
  `Firstname` varchar(1000) NOT NULL,
  `Lastname` varchar(1000) NOT NULL,
  `Email` varchar(1000) NOT NULL,
  `Password` varchar(1000) NOT NULL,
  `vkey` varchar(1000) NOT NULL,
  `verified` int(2) NOT NULL,
  `Type` varchar(1000) NOT NULL,
  `Status` varchar(1000) NOT NULL,
  `Created` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`UserID`, `Firstname`, `Lastname`, `Email`, `Password`, `vkey`, `verified`, `Type`, `Status`, `Created`) VALUES
(37, 'admin', '', 'admin', 'admin123', '', 1, 'Admin', 'Active', 'April 24 2022'),
(42, 'manager', '', 'manager', '123', ' ', 1, 'Manager', 'Active', 'May 01 2022 '),
(48, 'employee', '', 'employee1', '123', ' ', 1, 'Employee', 'Active', 'June 13 2022 '),
(49, 'ROBY RALPH', 'BELON', 'robybelon@gmail.com', '1234', '0199e3181b807c5895546a28449a99ab', 1, 'Customer', 'Active', 'October 24 2023 '),
(53, 'MARK DANIEL', 'DOLLENTAS', 'DOLLENTAS7@GMAIL.COM', '123', '07f0132cd73d3b44043e16bed8ad8d3a', 0, 'Customer', 'Active', 'December 04 2023 '),
(54, 'ASDJFASJ', 'RASJDFJL', 'DSFKA@GMAIL.COM', '123', '3f7dfaabc9145162c7650fb88a487223', 0, 'Customer', 'Active', 'December 13 2023 ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_carousel`
--
ALTER TABLE `tbl_carousel`
  ADD PRIMARY KEY (`carouselID`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`actionID`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `tbl_ourshop`
--
ALTER TABLE `tbl_ourshop`
  ADD PRIMARY KEY (`data`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD PRIMARY KEY (`salesID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_carousel`
--
ALTER TABLE `tbl_carousel`
  MODIFY `carouselID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `actionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_ourshop`
--
ALTER TABLE `tbl_ourshop`
  MODIFY `data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `salesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
