-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 02, 2020 at 12:19 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moniwyse`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `GetCurrencies`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCurrencies` ()  NO SQL
SELECT * FROM currencies$$

DROP PROCEDURE IF EXISTS `GetExpenseCategories`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetExpenseCategories` ()  NO SQL
SELECT * FROM categories WHERE Type = 'Expense'$$

DROP PROCEDURE IF EXISTS `GetIncomeCategories`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetIncomeCategories` ()  NO SQL
SELECT * FROM categories WHERE Type = 'Income'$$

DROP PROCEDURE IF EXISTS `GetSubCategories`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetSubCategories` (IN `category_id` INT(11))  NO SQL
SELECT * FROM sub_categories WHERE CategoryId = category_id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `base_currency_converions`
--

DROP TABLE IF EXISTS `base_currency_converions`;
CREATE TABLE IF NOT EXISTS `base_currency_converions` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Base` varchar(20) NOT NULL,
  `USD` double NOT NULL,
  `EUR` double NOT NULL,
  `GBP` double NOT NULL,
  `NGN` double NOT NULL,
  `CrDate` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `base_currency_converions`
--

INSERT INTO `base_currency_converions` (`Id`, `Base`, `USD`, `EUR`, `GBP`, `NGN`, `CrDate`) VALUES
(1, 'USD', 1, 0.9, 0.8, 387, '2020-05-03 12:25:25'),
(2, 'EUR', 1.11, 1, 0.89, 430.48, '2020-05-03 12:25:25'),
(3, 'GBP', 1.25, 1.12, 1, 482.44, '2020-05-03 12:25:25'),
(4, 'NGN', 0.0026, 0.0023, 0.0021, 1, '2020-05-03 12:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `Id` int(255) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `CrDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SortingOrder` int(11) NOT NULL DEFAULT '1',
  `Type` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Id`, `Name`, `CrDate`, `SortingOrder`, `Type`) VALUES
(1, 'Salaries', '2020-05-27 20:20:02', 2, 'Income'),
(2, 'Rent Income', '2020-05-27 20:20:02', 1, 'Income'),
(3, 'Investment Earnings', '2020-05-27 20:20:02', 2, 'Income'),
(4, 'Other Income', '2020-05-27 20:20:02', 1, 'Income'),
(5, 'Housing and Utilities', '2020-05-27 20:20:02', 2, 'Expense'),
(6, 'Transport', '2020-05-27 20:20:02', 1, 'Expense'),
(7, 'Insurance', '2020-05-27 20:20:02', 2, 'Expense'),
(8, 'Daily Living', '2020-05-27 20:20:02', 1, 'Expense'),
(9, 'Children', '2020-05-27 20:20:02', 2, 'Expense'),
(10, 'Entertainment', '2020-05-27 20:20:02', 1, 'Expense'),
(11, 'Family Care', '2020-05-27 20:20:02', 2, 'Expense'),
(12, 'Vacation', '2020-05-27 20:20:02', 1, 'Expense'),
(13, 'Giving', '2020-05-27 20:20:02', 1, 'Expense'),
(14, 'Obligations', '2020-05-27 20:20:02', 2, 'Expense'),
(15, 'Savings and Investments', '2020-05-27 20:20:02', 1, 'Expense'),
(16, 'Self Development', '2020-05-27 20:20:02', 2, 'Expense'),
(17, 'Miscellaneous', '2020-05-27 20:20:02', 1, 'Expense');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE IF NOT EXISTS `currencies` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(10) NOT NULL,
  `CrDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Symbol` varchar(10) NOT NULL,
  `Code` varchar(10) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`Id`, `Name`, `CrDate`, `Symbol`, `Code`) VALUES
(1, 'USD', '2020-05-27 19:40:06', '$', 'USD'),
(2, 'EURO', '2020-05-27 19:40:06', '€', 'EUR'),
(3, 'POUND', '2020-05-27 19:43:03', '£', 'GBP'),
(4, 'NEIRA', '2020-05-27 19:43:03', '₦', 'NGN');

-- --------------------------------------------------------

--
-- Table structure for table `estimations`
--

DROP TABLE IF EXISTS `estimations`;
CREATE TABLE IF NOT EXISTS `estimations` (
  `Id` int(255) NOT NULL AUTO_INCREMENT,
  `CategoryId` int(11) NOT NULL,
  `SubCategoryId` int(11) NOT NULL,
  `Type` text NOT NULL,
  `Amount` double NOT NULL,
  `CurrencyType` text NOT NULL,
  `RenewPeriod` text NOT NULL,
  `USD` double NOT NULL,
  `EUR` double NOT NULL,
  `GBP` double NOT NULL,
  `NGN` double NOT NULL,
  `CrDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `RenewDays` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estimations`
--

INSERT INTO `estimations` (`Id`, `CategoryId`, `SubCategoryId`, `Type`, `Amount`, `CurrencyType`, `RenewPeriod`, `USD`, `EUR`, `GBP`, `NGN`, `CrDate`, `RenewDays`, `UserId`) VALUES
(9, 3, 14, 'cr', 100000, '4', '6 months', 260, 230, 210, 100000, '2020-06-01 15:55:39', 180, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Icon` text NOT NULL,
  `CrDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`Id`, `CategoryId`, `Name`, `Icon`, `CrDate`) VALUES
(1, 1, 'Salary 1', 'icon-wallet', '2020-05-27 20:21:05'),
(2, 1, 'Salary 2', 'icon-wallet', '2020-05-27 20:21:05'),
(3, 1, 'Salary 3', 'icon-wallet', '2020-05-27 20:21:05'),
(4, 1, 'Salary 4', 'icon-wallet', '2020-05-27 20:21:05'),
(5, 1, 'Salary 5', 'icon-wallet', '2020-05-27 20:21:05'),
(6, 2, 'Property 1', 'icon-wallet', '2020-05-27 20:21:05'),
(7, 2, 'Property 2', 'icon-wallet', '2020-05-27 20:21:05'),
(8, 2, 'Property 3', 'icon-wallet', '2020-05-27 20:21:05'),
(9, 2, 'Property 4', 'icon-wallet', '2020-05-27 20:21:05'),
(10, 2, 'Property 5', 'icon-wallet', '2020-05-27 20:21:05'),
(11, 3, 'Investment 1', 'icon-wallet', '2020-05-27 20:21:05'),
(12, 3, 'Investment 2', 'icon-wallet', '2020-05-27 20:21:05'),
(13, 3, 'Investment 3', 'icon-wallet', '2020-05-27 20:21:05'),
(14, 3, 'Investment 4', 'icon-wallet', '2020-05-27 20:21:05'),
(15, 3, 'Investment 5', 'icon-wallet', '2020-05-27 20:21:05'),
(16, 4, 'Other Income 1', 'icon-wallet', '2020-05-27 20:21:05'),
(17, 4, 'Other Income 2', 'icon-wallet', '2020-05-27 20:21:05'),
(18, 4, 'Other Income 3', 'icon-wallet', '2020-05-27 20:21:05'),
(19, 4, 'Other Income 4', 'icon-wallet', '2020-05-27 20:21:05'),
(20, 4, 'Other Income 5', 'icon-wallet', '2020-05-27 20:21:05'),
(21, 5, 'Mortgage / Rent', 'icon-wallet', '2020-05-27 20:21:05'),
(22, 5, 'Telephone, TV & Internet', 'icon-wallet', '2020-05-27 20:21:05'),
(23, 5, 'Utilities & Services', 'icon-wallet', '2020-05-27 20:21:05'),
(24, 5, 'Home Security', 'icon-wallet', '2020-05-27 20:21:05'),
(25, 5, 'Home Maintenance & Repairs', 'icon-wallet', '2020-05-27 20:21:05'),
(26, 5, 'Mobile Phone', 'icon-wallet', '2020-05-27 20:21:05'),
(27, 5, 'Other Services & items', 'icon-wallet', '2020-05-27 20:21:05'),
(28, 5, 'Furniture & Fittings', 'icon-wallet', '2020-05-27 20:21:05'),
(29, 5, 'Gardening & Cleaning', 'icon-wallet', '2020-05-27 20:21:05'),
(30, 6, 'Vehicle 1', 'icon-wallet', '2020-05-27 20:21:05'),
(31, 6, 'Vehicle 2', 'icon-wallet', '2020-05-27 20:21:05'),
(32, 6, 'Public transportation', 'icon-wallet', '2020-05-27 20:21:05'),
(33, 6, 'Fuel & Wash', 'icon-wallet', '2020-05-27 20:21:05'),
(34, 6, 'Insurance', 'icon-wallet', '2020-05-27 20:21:05'),
(35, 6, 'Maintenance', 'icon-wallet', '2020-05-27 20:21:05'),
(36, 6, 'Licensing', 'icon-wallet', '2020-05-27 20:21:05'),
(37, 6, 'Parking', 'icon-wallet', '2020-05-27 20:21:05'),
(38, 6, 'Fines', 'icon-wallet', '2020-05-27 20:21:05'),
(39, 7, 'Home', 'icon-wallet', '2020-05-27 20:21:05'),
(40, 7, 'Health', 'icon-wallet', '2020-05-27 20:21:05'),
(41, 7, 'Life', 'icon-wallet', '2020-05-27 20:21:05'),
(42, 7, 'Mortgage', 'icon-wallet', '2020-05-27 20:21:05'),
(43, 8, 'Groceries & Supplies', 'icon-wallet', '2020-05-27 20:21:05'),
(44, 8, 'Dry cleaning', 'icon-wallet', '2020-05-27 20:21:05'),
(45, 8, 'Dining out', 'icon-wallet', '2020-05-27 20:21:05'),
(46, 9, 'Medical', 'icon-wallet', '2020-05-27 20:21:05'),
(47, 9, 'School tuition', 'icon-wallet', '2020-05-27 20:21:05'),
(48, 9, 'School supplies', 'icon-wallet', '2020-05-27 20:21:05'),
(49, 9, 'Lunch/Pocket money', 'icon-wallet', '2020-05-27 20:21:05'),
(50, 9, 'Child care', 'icon-wallet', '2020-05-27 20:21:05'),
(51, 9, 'Toys/games', 'icon-wallet', '2020-05-27 20:21:05'),
(52, 9, 'After School Activities', 'icon-wallet', '2020-05-27 20:21:05'),
(53, 10, 'Netflix', 'icon-wallet', '2020-05-27 20:21:05'),
(54, 10, 'Cinema', 'icon-wallet', '2020-05-27 20:21:05'),
(55, 10, 'Concerts & Events', 'icon-wallet', '2020-05-27 20:21:05'),
(56, 11, 'Medical', 'icon-wallet', '2020-05-27 20:21:05'),
(57, 11, 'Grooming', 'icon-wallet', '2020-05-27 20:21:05'),
(58, 11, 'Clothing', 'icon-wallet', '2020-05-27 20:21:05'),
(59, 11, 'Gym Membership', 'icon-wallet', '2020-05-27 20:21:05'),
(60, 11, 'Birthday Parties & Presents', 'icon-wallet', '2020-05-27 20:21:05'),
(61, 12, 'Travel - Family', 'icon-wallet', '2020-05-27 20:21:05'),
(62, 12, 'Accommodation', 'icon-wallet', '2020-05-27 20:21:05'),
(63, 12, 'Mobility', 'icon-wallet', '2020-05-27 20:21:05'),
(64, 12, 'Shopping', 'icon-wallet', '2020-05-27 20:21:05'),
(65, 12, 'Sponsored vacation', 'icon-wallet', '2020-05-27 20:21:05'),
(66, 13, 'Gifts', 'icon-wallet', '2020-05-27 20:21:05'),
(67, 13, 'Tithes & Offerings', 'icon-wallet', '2020-05-27 20:21:05'),
(68, 13, 'Parents Upkeep', 'icon-wallet', '2020-05-27 20:21:05'),
(69, 13, 'Charity', 'icon-wallet', '2020-05-27 20:21:05'),
(70, 14, 'Loans', 'icon-wallet', '2020-05-27 20:21:05'),
(71, 14, 'Credit Card 1', 'icon-wallet', '2020-05-27 20:21:05'),
(72, 14, 'Credit Card 2', 'icon-wallet', '2020-05-27 20:21:05'),
(73, 14, 'Credit Card 3', 'icon-wallet', '2020-05-27 20:21:05'),
(74, 14, 'Income Tax', 'icon-wallet', '2020-05-27 20:21:05'),
(75, 14, 'Property Tax', 'icon-wallet', '2020-05-27 20:21:05'),
(76, 14, 'Other tax / levies', 'icon-wallet', '2020-05-27 20:21:05'),
(77, 15, 'Retirement Savings', 'icon-wallet', '2020-05-27 20:21:05'),
(78, 15, 'College Funds', 'icon-wallet', '2020-05-27 20:21:05'),
(79, 15, 'Long term investments', 'icon-wallet', '2020-05-27 20:21:05'),
(80, 15, 'Short term investments', 'icon-wallet', '2020-05-27 20:21:05'),
(81, 15, 'Personal savings', 'icon-wallet', '2020-05-27 20:21:05'),
(82, 16, 'Professional Certification', 'icon-wallet', '2020-05-27 20:21:05'),
(83, 16, 'Higher education', 'icon-wallet', '2020-05-27 20:21:05'),
(84, 16, 'Training', 'icon-wallet', '2020-05-27 20:21:05'),
(85, 17, 'Professional Consultation Fees', 'icon-wallet', '2020-05-27 20:21:05'),
(86, 17, 'Online services', 'icon-wallet', '2020-05-27 20:21:05'),
(87, 17, 'Other Services', 'icon-wallet', '2020-05-27 20:21:05'),
(88, 17, 'Bank Charges', 'icon-wallet', '2020-05-27 20:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `Id` int(255) NOT NULL AUTO_INCREMENT,
  `CategoryId` int(11) NOT NULL,
  `SubCategoryId` int(11) NOT NULL,
  `Type` varchar(5) NOT NULL,
  `Amount` double NOT NULL,
  `CurrencyType` text NOT NULL,
  `USD` double NOT NULL,
  `EUR` double NOT NULL,
  `GBP` double NOT NULL,
  `NGN` double NOT NULL,
  `CrDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UserId` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`Id`, `CategoryId`, `SubCategoryId`, `Type`, `Amount`, `CurrencyType`, `USD`, `EUR`, `GBP`, `NGN`, `CrDate`, `UserId`) VALUES
(14, 9, 48, 'cr', 255, '2', 283.05, 255, 226.95, 109772.4, '2020-06-01 16:14:45', 1),
(13, 2, 7, 'cr', 500, '2', 555, 500, 445, 215240, '2020-06-01 16:14:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Id` int(255) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(50) NOT NULL,
  `EmailId` varchar(50) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Country` varchar(10) NOT NULL,
  `VerifyStataus` int(11) NOT NULL,
  `EmployementType` varchar(50) NOT NULL,
  `JoiningDate` varchar(20) NOT NULL,
  `CrDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ProfileImageUrl` varchar(200) NOT NULL DEFAULT 'http://localhost/moniwyse/uploads/users/default_user.jpg',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `FullName`, `EmailId`, `Password`, `Country`, `VerifyStataus`, `EmployementType`, `JoiningDate`, `CrDate`, `ProfileImageUrl`) VALUES
(1, 'siva prasad', 'sprasad96@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'INDIA', 1, 'IT', '2020-05-30', '2020-05-30 06:36:48', 'http://localhost/moniwyse/uploads/users/default_user1590996762.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
