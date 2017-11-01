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
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (ID),
  `Email` varchar(256) NOT NULL,
  `PasswordHash` varchar(256) NOT NULL,
  `EmailConfirmed` tinyint(1) NOT NULL,
  `PhoneNumber` varchar(256) NOT NULL,
  `UserName` varchar(256) NOT NULL,
  `Address` varchar(256) NOT NULL,
  `CustomerName` varchar(256) NOT NULL,
  `Enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`Email`, `PasswordHash`, `EmailConfirmed`, `PhoneNumber`, `UserName`, `Address`, `CustomerName`, `Enabled`) VALUES
('admin@email.com', 'AQAAAAEAACcQAAAAEGt6T1qkdeJrm1vOCon/mjRZUvMxZVSWL4mrenW0kmrAQDdUY2iZUDW9v7ldY6qAiw==', 1, '021-2200888', 'Admin', 'Auckland', 'Administrator', 1),
('test@me.com', 'AQAAAAEAACcQAAAAEGt6T1qkdeJrm1vOCon/mjRZUvMxZVSWL4mrenW0kmrAQDdUY2iZUDW9v7ldY6qAiw==', 1, '021-558899', 'Tester', 'Auckland', 'Tester', 1);


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

-- Dumping data for table `hats`
INSERT INTO `hats` (`CategoryID`, `SupplierID`, `Name`, `Description`, `Price`, `Image`) VALUES
(1, '1', 'asdf', 'asdf', '0', 'asdf'),
(1, '1', 'One', 'asdf', '0', 'asdf'),
(1, '1', 'One', 'DESC', '0', 'logo-2017.png'),
(1, '1', 'asfd', 'asdfsdf', '234', 'QQ20171014-131433.png'),
(1, '4', 'f2f323f2323', '3f23fee2', '333', 'QQ20171014-131230.png'),
(1, '4', 'f2f323f2323', '3f23fee2', '333', 'QQ20171014-131230.png'),
(1, '1', 'asfdfffff', 'fffff', '2', 'QQ20171014-131433.png'),
(4, '1', 'asfd', 'asdf', '6543', ''),
(1, '1', '22', '33', '3333', '640.jpg'),
(1, '1', 'asdf', 'jhgfds', '65432', 'QQ20171014-131230.png'),
(1, '1', 'f', 'fffff', '2', 'QQ20171014-131433.png'),
(1, '1', '23', '23', '23', 'QQ20171014-131433.png'),
(4, '1', 'fda', 'asdfsdf', '23452', 'Unitec-logo.png'),
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
