-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2016 at 05:33 PM
-- Server version: 5.5.48-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nucniyex_bills`
--

-- --------------------------------------------------------

--
-- Table structure for table `BillDueType`
--

CREATE TABLE IF NOT EXISTS `BillDueType` (
  `type_id` int(11) NOT NULL,
  `bill_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`type_id`),
  KEY `bill_id` (`bill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `UserBills`
--

CREATE TABLE IF NOT EXISTS `UserBills` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) NOT NULL,
  `is_gain` bit(1) NOT NULL,
  `bill_name` varchar(55) NOT NULL,
  `frequency` enum('single','weekly','bi-weekly','monthly','yearly') NOT NULL,
  `due_period` enum('eom','bom') DEFAULT NULL,
  `every_x_days` int(11) DEFAULT NULL,
  `on_the_x` int(11) DEFAULT NULL,
  `amount` decimal(8,2) NOT NULL,
  PRIMARY KEY (`bill_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=116 ;

--
-- Dumping data for table `UserBills`
--

INSERT INTO `UserBills` (`bill_id`, `user_id`, `is_gain`, `bill_name`, `frequency`, `due_period`, `every_x_days`, `on_the_x`, `amount`) VALUES
(112, 1, b'0', 'test bill', 'weekly', '', 10, 0, '500.50'),
(113, 1, b'1', 'Radleys Bill', 'weekly', '', 10, 0, '10.50'),
(114, 1, b'1', 'Amandas Bill', 'weekly', '', 10, 0, '500.50'),
(115, 1, b'1', 'Amandas Bill', 'weekly', '', 10, 0, '500.50');

-- --------------------------------------------------------

--
-- Table structure for table `UserName`
--

CREATE TABLE IF NOT EXISTS `UserName` (
  `user_id` int(9) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `UserName`
--

INSERT INTO `UserName` (`user_id`, `email`, `password`, `first_name`, `last_name`) VALUES
(1, 'radmation@yahoo.com', 'radley123', 'Radley', 'Anaya'),
(2, 'brad.furg@gmail.com', 'brad123', 'Brad', 'Furgeson'),
(4, 'test@test.com', 'joe123', 'Joe', 'Smoe'),
(5, 'Jddh', '1', 'Hdh', 'Jsheh');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `user_info_id` int(70) NOT NULL AUTO_INCREMENT,
  `user_id_fk` int(70) NOT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `user_location` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_info_id`),
  UNIQUE KEY `user_id_fk_UNIQUE` (`user_id_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `user_id` int(70) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(45) NOT NULL,
  `user_password` varchar(45) DEFAULT NULL,
  `user_join_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email_UNIQUE` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE IF NOT EXISTS `user_status` (
  `user_status_id` int(70) NOT NULL AUTO_INCREMENT,
  `user_id_fk` int(70) NOT NULL,
  `status_text` text,
  `status_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_status_id`),
  UNIQUE KEY `user_id_fk_UNIQUE` (`user_id_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BillDueType`
--
ALTER TABLE `BillDueType`
  ADD CONSTRAINT `BillDueType_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `UserBills` (`bill_id`);

--
-- Constraints for table `UserBills`
--
ALTER TABLE `UserBills`
  ADD CONSTRAINT `UserBills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `UserName` (`user_id`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_foreign_key` FOREIGN KEY (`user_id_fk`) REFERENCES `user_login` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_status`
--
ALTER TABLE `user_status`
  ADD CONSTRAINT `user_status_foreign_key` FOREIGN KEY (`user_id_fk`) REFERENCES `user_login` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
