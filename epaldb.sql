-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2025 at 08:13 AM
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
-- Database: `epaldb`
--
CREATE DATABASE IF NOT EXISTS `epaldb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `epaldb`;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` varchar(10) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `quantity` int(3) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` double(6,2) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `quantity`, `image`, `price`, `description`) VALUES
('EPA00001', 'Epal Aifon 14', 50, 'aifon14.jpg', 999.00, 'Colour: White\r\nDisplay Dimension: 6.2 inch\r\nOS: EA-OS 14\r\nStorage: 128GB\r\nMemory: 6GB\r\nWeight: 180g\r\nCamera: 12MP\r\nBattery: 3500mAh'),
('EPA00002', 'Epal Aifon 15', 500, 'aifon15.jpg', 1899.00, 'Colour: Pink\r\nDisplay Dimension: 6.5 inch\r\nOS: EA-OS 15\r\nStorage: 128GB\r\nMemory: 8GB\r\nWeight: 170g\r\nCamera: 48MP\r\nBattery: 3500mAh'),
('EPA00003', 'Epal Aifon 15 Pro', 150, 'aifon15pro.jpg', 2299.00, 'Colour: Purple\r\nDisplay Dimension: 6.5 inch\r\nOS: EA-OS 15\r\nStorage: 256GB\r\nMemory: 8GB\r\nWeight: 170g\r\nCamera: 60MP\r\nBattery: 4000mAh'),
('EPA00004', 'Epal Aifon SE', 50, 'aifonse.png', 699.00, 'Colour: White\r\nDisplay Dimension: 4.0 inch\r\nOS: EA-OS 12\r\nStorage: 128GB\r\nMemory: 4GB\r\nWeight: 120g\r\nCamera: 18MP\r\nBattery: 3200mAh'),
('EPA00005', 'Epal Aifon 16', 900, 'aifon16.jpg', 4099.00, 'Colour: Green\r\nDisplay Dimension: 6.5 inch\r\nOS: EA-OS 16\r\nStorage: 256GB\r\nMemory: 8GB\r\nWeight: 170g\r\nCamera: 72MP\r\nBattery: 5000mAh'),
('EPA00006', 'Epal Aifon 16 Pro', 900, 'aifon16pro.jpg', 5299.00, 'Colour: Brown\r\nDisplay Dimension: 6.8 inch\r\nOS: EA-OS 16\r\nStorage: 1TB\r\nMemory: 8GB\r\nWeight: 170g\r\nCamera: 72MP\r\nBattery: 6000mAh');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `point` int(11) NOT NULL DEFAULT 0,
  `profilepic` varchar(100) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'MEMBER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `email`, `point`, `profilepic`, `status`) VALUES
(1, 'admin', 'Admin-123', 'admin@epal.com', 999, NULL, 'ADMIN'),
(2, 'YanKang', 'Liang-123', 'ykliang1027@gmail.com', 0, NULL, 'MEMBER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
