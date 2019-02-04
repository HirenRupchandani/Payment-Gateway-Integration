-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 04, 2019 at 02:03 PM
-- Server version: 5.7.21
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsf1`
--

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

DROP TABLE IF EXISTS `donors`;
CREATE TABLE IF NOT EXISTS `donors` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `amount` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE IF NOT EXISTS `people` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `credit` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1011 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `name`, `email`, `credit`) VALUES
(1001, 'Hiren R', 'hiren1499@gmail.com', 1200),
(1002, 'Mehul R', 'mehul.rupchandani@gmail.com', 1100),
(1003, 'Arun S', 'aries@gmail.com', 900),
(1004, 'Abhishek M', 'amul@gmail.com', 1000),
(1005, 'Dolly T', 'dollyt@yahoo.com', 1000),
(1006, 'Lavina T', 'lavinat@yahoo.com', 2000),
(1007, 'Bony S', 'bonys@gmail.com', 1000),
(1008, 'Simrin S', 'simrins@yahoo.com', 1000),
(1009, 'Shweta H', 'sh@gmail.com', 1800),
(1010, 'Sagar K', 'sk@gmail.com', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int(255) NOT NULL AUTO_INCREMENT,
  `sender` varchar(255) NOT NULL,
  `sender_id` int(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `receiver_id` int(255) NOT NULL,
  `credit_transferred` int(255) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `sender`, `sender_id`, `receiver`, `receiver_id`, `credit_transferred`) VALUES
(1, 'Lavina T', 1006, 'Hiren R', 1001, 500),
(2, 'Lavina T', 1006, 'Hiren R', 1001, 100),
(3, 'Hiren R', 1001, 'Mehul R', 1002, 50),
(4, 'Lavina T', 1006, 'Dolly T', 1005, 200),
(23, 'Lavina T', 1006, 'Dolly T', 1005, 99),
(24, 'Dolly T', 1005, 'Lavina T', 1006, 99),
(25, 'Arun S', 1003, 'Hiren R', 1001, 200),
(26, 'Hiren R', 1001, 'Arun S', 1003, 100),
(27, 'Mehul R', 1002, 'Hiren R', 1001, 700),
(28, 'Hiren R', 1001, 'Mehul R', 1002, 250),
(29, 'Hiren R', 1001, 'Mehul R', 1002, 500);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
