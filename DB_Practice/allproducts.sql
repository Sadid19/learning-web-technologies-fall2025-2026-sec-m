-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2026 at 10:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `authentication`
--

-- --------------------------------------------------------

--
-- Table structure for table `allproducts`
--

CREATE TABLE `allproducts` (
  `productID` int(11) NOT NULL,
  `productName` varchar(40) NOT NULL,
  `category` varchar(40) NOT NULL,
  `price` double NOT NULL,
  `stock` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `image` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allproducts`
--

INSERT INTO `allproducts` (`productID`, `productName`, `category`, `price`, `stock`, `status`, `image`) VALUES
(3, 'Rice', 'Crop', 65, 50, 'Acitve', 0x313736373239363434372e6a7067),
(4, 'Cauliflower', 'Veg', 20, 20, 'Acitve', 0x313736373239363836342e6a7067),
(5, 'Tomato', 'Veg', 100, 15, 'Acitve', 0x313736373239373532382e6a7067),
(6, 'Onion', 'Crop', 40, 0, 'Out-Of-Stock', 0x313736373239393132362e6a666966);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allproducts`
--
ALTER TABLE `allproducts`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allproducts`
--
ALTER TABLE `allproducts`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
