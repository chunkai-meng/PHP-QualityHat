-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2017 at 09:45 AM
-- Server version: 5.7.9-log
-- PHP Version: 5.6.0



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mengc06mysql3`
--
-- --------------------------------------------------------
-- Connect Root
mysql -uroot
CREATE USER 'mengc06'@'localhost' IDENTIFIED BY '05011981';
CREATE DATABASE mengc06mysql3;
USE mengc06mysql3;
GRANT ALL PRIVILEGES ON *.* TO 'mengc06'@'localhost';
exit;

--- Connect mengc06
mysql -umengc06 -p05011981
use mengc06mysql3;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+13:00";

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Email` varchar(255) NOT NULL,
  `PasswordHash` varchar(255) NOT NULL,
  `EmailConfirmed` tinyint(1) DEFAULT '0',
  `PhoneNumber` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `CustomerName` varchar(255) DEFAULT NULL,
  `Enabled` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `hats`
--
CREATE TABLE `hats` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`);
  `CategoryID` int(11) NOT NULL,
  `SupplierID` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(3000) NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `hats` CHANGE `Price` `Price` DECIMAL(10,2) NOT NULL;

-- Dumping data for table `hats`
INSERT INTO `hats` (`CategoryID`, `SupplierID`, `Name`, `Description`, `Price`, `Image`) VALUES
(1, '4', 'f2f323f2323', '3f23fee2', '333', 'QQ20171014-131230.png'),
(1, '1', 'asdf', 'asdf', '23', 'Halloween.jpg');

--
-- Table structure for table `categories`
--
CREATE TABLE `categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (ID),
  `Name` varchar(255) NOT NULL,
  `Description` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `suppliers`
--
CREATE TABLE `suppliers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (ID),
  `Name` varchar(255) NOT NULL,
  `Description` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `suppliers`
--
CREATE TABLE `orderdetails` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (ID),
  `Quantity` int(11) NOT NULL,
  `UnitPrice` decimal(10,2) NOT NULL,
  `HatID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `ModifiedTimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `suppliers`
--
CREATE TABLE `orders` (
  `ID` int(11) NOT NULL PRIMARY KEY  AUTO_INCREMENT,
  `Status` enum('Submitted','Shipped','Delivered') DEFAULT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Address1` varchar(1000) NOT NULL,
  `Address2` varchar(1000) DEFAULT NULL,
  `City` varchar(255) NOT NULL,
  `State` varchar(255) DEFAULT NULL,
  `Country` varchar(255) NOT NULL,
  `PostalCode` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) NOT NULL,
  `GST` decimal(10,2) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ModifiedTimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
