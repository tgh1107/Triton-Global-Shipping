-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2021 at 11:55 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shipment_managment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `admin_contact_no` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `admin_profile` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin_type` enum('Master','User') COLLATE utf8_unicode_ci NOT NULL,
  `admin_created_on` datetime NOT NULL,
  `admin_status` enum('Enable','Disable') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_contact_no`, `admin_email`, `admin_password`, `admin_profile`, `admin_type`, `admin_created_on`, `admin_status`) VALUES
(1, 'johnsmith', '8569874587', 'johnsmith@gmail.com', '$2y$10$SY7Mc5BZsLlTjvNl70xhIOCyIVF9G7Xc1xqMzPmaSYTCrH.LG545q', 'images/22041.jpg', 'Master', '2020-11-06 14:17:27', 'Enable'),
(2, 'donnahuber', '8523698520', 'donnahuber@gmail.com', '$2y$10$2H2wHdkV8GJrV30TouhkXuTcP1gQeAY1rp7EGM4fYzOf/mibjzEg.', 'images/22308.jpg', 'User', '2020-11-08 09:08:33', 'Enable'),
(3, 'colinnewton', '7453952852', 'colinnewton@gmail.com', '$2y$10$O.7mlW5/JC5ji5nF5YHDfuTFphnSbpsNN7FaQoG1BHEIEg4TVbLKW', 'images/31598.jpg', 'User', '2020-11-09 12:44:57', 'Enable'),
(4, 'carlmeza', '9632585203', 'carlmeza@gmail.com', '$2y$10$gyv/CokUtimUAdXlQt9aRO8UBTnjSz.FqQQEk24vfQjgTppkFSz4q', 'images/1604922343.png', 'User', '2020-11-09 12:45:44', 'Enable'),
(5, 'tyronstein', '96369852635', 'tyronstein@gmail.com', '$2y$10$WIHtgnX5EqrKuruE31exGeZv.CLIHm52CggX1/vn.vr1d4tceFtsq', 'images/1604922395.png', 'User', '2020-11-09 12:46:35', 'Enable'),
(6, 'peterparker', '8569852632', 'peterparker@gmail.com', '$2y$10$uBTtPvR0YLH9f4FZt5uumeDz3HOmO8W2c.sNy8pvm7zvo8LHQ5zh.', 'images/6614.jpg', 'User', '2020-11-11 14:00:27', 'Enable'),
(7, 'admin', '0481272472', 'tgh1107@gmail.com', '$2y$10$SY7Mc5BZsLlTjvNl70xhIOCyIVF9G7Xc1xqMzPmaSYTCrH.LG545q', '', 'Master', '2020-11-23 00:00:00', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `department_table`
--

CREATE TABLE `department_table` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `department_contact_person` text COLLATE utf8_unicode_ci NOT NULL,
  `department_created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department_table`
--

INSERT INTO `department_table` (`department_id`, `department_name`, `department_contact_person`, `department_created_on`) VALUES
(3, 'Marketing', 'Leon Batz, Dessie Labadie, Jayda Keebler', '2020-11-07 08:07:09'),
(4, 'HR', 'Peter Parker', '2020-11-07 08:08:47'),
(5, 'Production', 'Aubrey Nelson, Zayan Humphrey, Harris Lowe, Imaan Villa', '2020-11-09 12:41:59'),
(6, 'Accounting', 'Youssef Hook, Yousef Haigh, Marlie Booker', '2020-11-09 12:42:43'),
(7, 'Purchase', 'Harlee Murillo, Helena Lloyd, Kairon Bauer', '2020-11-09 12:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `tgs_customer`
--

CREATE TABLE `tgs_customer` (
  `cus_id` int(5) NOT NULL,
  `cus_email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cus_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cus_lname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cus_fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cus_initial` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cus_type` int(11) NOT NULL,
  `cus_company` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rg_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tgs_customer`
--

INSERT INTO `tgs_customer` (`cus_id`, `cus_email`, `cus_phone`, `cus_lname`, `cus_fname`, `cus_initial`, `cus_type`, `cus_company`, `rg_code`) VALUES
(1, '1@gmail.com', '0481272471', 'tran 1', 'hoi 1', 'g', 1, 'triton', 0),
(2, '2@gmail.com', '0481272472', 'tran 2', 'hoi 2', 'g', 1, 'triton', 0),
(3, '3@gmail.com', '0481272473', 'tran 3', 'hoi 3', 'g', 1, 'triton', 0),
(4, '4@gmail.com', '0481272474', 'tran 4', 'hoi 4', 'g', 1, 'triton', 0),
(5, '5@gmail.com', '0481272475', 'tran 5', 'hoi 5', 'g', 1, 'triton', 0),
(6, '6@gmail.com', '0481272476', 'tran 6', 'hoi 6', 'g', 1, 'triton', 0),
(7, '1@gmail.com', '0481272471', 'tran 1', 'hoi 1', 'g', 1, 'triton', 0),
(8, '1@gmail.com', '0481272471', 'tran 1', 'hoi 1', 'g', 1, 'triton', 0),
(9, '1@gmail.com', '0481272471', 'tran 1', 'hoi 1', 'g', 1, 'triton', 0),
(10, '1@gmail.com', '0481272471', 'tran 1', 'hoi 1', 'g', 1, 'triton', 0),
(11, '1@gmail.com', '0481272471', 'tran 1', 'hoi 1', 'g', 1, 'triton', 0),
(12, '10@gmail.com', '0481272471', 'tran 10', 'hoi 10', 'g', 1, 'triton', 0),
(13, '10@gmail.com', '0481272471', 'tran 10', 'hoi 10', 'g', 1, 'triton', 0),
(14, '10@gmail.com', '0481272471', 'tran 10', 'hoi 10', 'g', 1, 'triton', 0),
(15, '10@gmail.com', '0481272471', 'tran 10', 'hoi 10', 'g', 1, 'triton', 0),
(16, '10@gmail.com', '0481272471', 'tran 10', 'hoi 10', 'g', 1, 'triton', 0),
(17, '10@gmail.com', '0481272471', 'tran 10', 'hoi 10', 'g', 1, 'triton', 0),
(18, 'tgh1107@gmail.com', '0481272472', 'hoi eeeee', 'hoi qqq', 'g', 1, 'triton', 0),
(19, 'tgh1107@gmail.com', '0481272472', 'hoi rrrrr', 'hoi rrrr', 'g', 1, 'triton', 0),
(20, 'tgh1107@gmail.com', '0481272472', 'hoi wwwww', 'hoi ttt', 'g', 1, 'triton', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tgs_shipment`
--

CREATE TABLE `tgs_shipment` (
  `SHIPMENT_NUM` int(11) NOT NULL,
  `CUS_ID_SENDER` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CUS_ID_RECEIVER` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SHIPMENT_DESCRIPTION` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SHIPMENT_ESTIMATED_COST` decimal(10,0) NOT NULL,
  `SHIPMENT_ACTUAL_COST` decimal(10,0) NOT NULL,
  `SHIPMENT_SOURCE` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SHIPMENT_DESTINATION` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SHIPMENT_ORDER_DAY` datetime NOT NULL,
  `SHIPMENT_CONFIRMATION_PRIORITY` int(11) NOT NULL,
  `SHIPMENT_STATUS` enum('Pending','Confirmed','On Ship','Done') COLLATE utf8_unicode_ci NOT NULL,
  `SHIPMENT_SIGNED_DATE` int(11) NOT NULL,
  `SHIPMENT_START_DATE` datetime NOT NULL,
  `SHIPMENT_END_DATE` datetime NOT NULL,
  `SHIPMENT_ACTUAL_START_DATE` datetime NOT NULL,
  `SHIPMENT_ACTUAL_END_DATE` datetime NOT NULL,
  `SHIPMENT_PACKAGE_TYPE` int(10) NOT NULL,
  `SHIPMENT_PACKAGE_WEIGHT` float(10,0) NOT NULL,
  `SHIPMENT_PACKAGE_LENGTH` decimal(10,0) NOT NULL,
  `SHIPMENT_PACKAGE_WIDTH` decimal(10,0) NOT NULL,
  `SHIPMENT_PACKAGE_HEIGHT` decimal(10,0) NOT NULL,
  `SHIPMENT_PACKAGE_QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tgs_shipment`
--

INSERT INTO `tgs_shipment` (`SHIPMENT_NUM`, `CUS_ID_SENDER`, `CUS_ID_RECEIVER`, `SHIPMENT_DESCRIPTION`, `SHIPMENT_ESTIMATED_COST`, `SHIPMENT_ACTUAL_COST`, `SHIPMENT_SOURCE`, `SHIPMENT_DESTINATION`, `SHIPMENT_ORDER_DAY`, `SHIPMENT_CONFIRMATION_PRIORITY`, `SHIPMENT_STATUS`, `SHIPMENT_SIGNED_DATE`, `SHIPMENT_START_DATE`, `SHIPMENT_END_DATE`, `SHIPMENT_ACTUAL_START_DATE`, `SHIPMENT_ACTUAL_END_DATE`, `SHIPMENT_PACKAGE_TYPE`, `SHIPMENT_PACKAGE_WEIGHT`, `SHIPMENT_PACKAGE_LENGTH`, `SHIPMENT_PACKAGE_WIDTH`, `SHIPMENT_PACKAGE_HEIGHT`, `SHIPMENT_PACKAGE_QUANTITY`) VALUES
(1, '1', '2', 'DESCRIPTION', '50', '50', '', 'Viet Nam', '2020-11-11 00:00:00', 1, 'Pending', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 2, '0', '0', '0', 0),
(2, '3', '4', 'DESCRIPTION', '60', '60', 'Viet Nam', 'Australia', '2020-11-10 00:00:00', 2, 'Confirmed', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 1, '0', '0', '0', 0),
(3, '5', '6', 'DESCRIPTION', '70', '70', 'Australia', 'Viet Nam', '2020-11-18 00:00:00', 3, 'Pending', 0, '2020-11-26 00:00:00', '2020-11-26 00:00:00', '2020-11-30 00:00:00', '2020-11-30 00:00:00', 0, 1, '0', '0', '0', 0),
(4, '1', '2', 'DESCRIPTION', '50', '50', '', 'Viet Nam', '2020-11-11 00:00:00', 1, 'Pending', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(5, '3', '4', 'DESCRIPTION', '60', '60', 'Viet Nam', 'Australia', '2020-11-10 00:00:00', 2, 'Pending', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(6, '5', '6', 'DESCRIPTION', '70', '70', 'Australia', 'Viet Nam', '2020-11-18 00:00:00', 3, 'Pending', 0, '2020-11-26 00:00:00', '2020-11-26 00:00:00', '2020-11-30 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(7, '1', '2', 'DESCRIPTION', '50', '50', '', 'Viet Nam', '2020-11-11 00:00:00', 1, 'Pending', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(8, '3', '4', 'DESCRIPTION', '60', '60', 'Viet Nam', 'Australia', '2020-11-10 00:00:00', 2, 'Pending', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(9, '5', '6', 'DESCRIPTION', '70', '70', 'Australia', 'Viet Nam', '2020-11-18 00:00:00', 3, 'Pending', 0, '2020-11-26 00:00:00', '2020-11-26 00:00:00', '2020-11-30 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(10, '1', '2', 'DESCRIPTION', '50', '50', '', 'Viet Nam', '2020-11-11 00:00:00', 1, 'Pending', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(11, '3', '4', 'DESCRIPTION', '60', '60', 'Viet Nam', 'Australia', '2020-11-10 00:00:00', 2, 'Pending', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(12, '5', '6', 'DESCRIPTION', '70', '70', 'Australia', 'Viet Nam', '2020-11-18 00:00:00', 3, 'Pending', 0, '2020-11-26 00:00:00', '2020-11-26 00:00:00', '2020-11-30 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(13, '1', '2', 'DESCRIPTION', '50', '50', '', 'Viet Nam', '2020-11-11 00:00:00', 1, 'Pending', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(14, '3', '4', 'DESCRIPTION', '60', '60', 'Viet Nam', 'Australia', '2020-11-10 00:00:00', 2, 'Pending', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(15, '5', '6', 'DESCRIPTION', '70', '70', 'Australia', 'Viet Nam', '2020-11-18 00:00:00', 3, 'Pending', 0, '2020-11-26 00:00:00', '2020-11-26 00:00:00', '2020-11-30 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(16, '1', '2', 'DESCRIPTION', '50', '50', '', 'Viet Nam', '2020-11-11 00:00:00', 1, 'Pending', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(17, '3', '4', 'DESCRIPTION', '60', '60', 'Viet Nam', 'Australia', '2020-11-10 00:00:00', 2, 'Pending', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(18, '5', '6', 'DESCRIPTION', '70', '70', 'Australia', 'Viet Nam', '2020-11-18 00:00:00', 3, 'Pending', 0, '2020-11-26 00:00:00', '2020-11-26 00:00:00', '2020-11-30 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(19, '1', '2', 'DESCRIPTION', '50', '50', '', 'Viet Nam', '2020-11-11 00:00:00', 1, 'Pending', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(20, '3', '4', 'DESCRIPTION', '60', '60', 'Viet Nam', 'Australia', '2020-11-10 00:00:00', 2, 'Pending', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(21, '5', '6', 'DESCRIPTION', '70', '70', 'Australia', 'Viet Nam', '2020-11-18 00:00:00', 3, 'Pending', 0, '2020-11-26 00:00:00', '2020-11-26 00:00:00', '2020-11-30 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(22, '1', '2', 'DESCRIPTION', '50', '50', '', 'Viet Nam', '2020-11-11 00:00:00', 1, 'Pending', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(23, '3', '4', 'DESCRIPTION', '60', '60', 'Viet Nam', 'Australia', '2020-11-10 00:00:00', 2, 'Pending', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(24, '5', '6', 'DESCRIPTION', '70', '70', 'Australia', 'Viet Nam', '2020-11-18 00:00:00', 3, 'Pending', 0, '2020-11-26 00:00:00', '2020-11-26 00:00:00', '2020-11-30 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(25, '1', '2', 'DESCRIPTION', '50', '50', '', 'Viet Nam', '2020-11-11 00:00:00', 1, 'Pending', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(26, '3', '4', 'DESCRIPTION', '60', '60', 'Viet Nam', 'Australia', '2020-11-10 00:00:00', 2, 'Pending', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(27, '5', '6', 'DESCRIPTION', '70', '70', 'Australia', 'Viet Nam', '2020-11-18 00:00:00', 3, 'Pending', 0, '2020-11-26 00:00:00', '2020-11-26 00:00:00', '2020-11-30 00:00:00', '2020-11-30 00:00:00', 0, 0, '0', '0', '0', 0),
(28, '1', '2', 'DESCRIPTION', '50', '50', 'Australia', 'Viet Nam', '2020-11-11 00:00:00', 1, 'Pending', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 2, '0', '0', '0', 0),
(29, '1', '2', 'DESCRIPTION', '50', '50', 'Australia', 'Viet Nam', '2020-11-11 00:00:00', 1, 'Pending', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 2, '0', '0', '0', 0),
(30, '1', '2', 'DESCRIPTION', '50', '50', 'Australia', 'Viet Nam', '2020-11-11 00:00:00', 1, 'Pending', 0, '2020-11-28 00:00:00', '2020-11-30 00:00:00', '2020-11-28 00:00:00', '2020-11-30 00:00:00', 0, 2, '0', '0', '0', 0),
(31, '1', '2', 'DESCRIPTION', '16', '16', 'Australia', 'Viet Nam', '2021-01-10 00:52:55', 1, 'Pending', 2021, '2021-01-10 00:00:00', '2021-01-10 00:00:00', '2021-01-11 00:00:00', '2021-01-11 00:00:00', 0, 1, '1', '1', '1', 1),
(32, '1', '2', 'DESCRIPTION', '17', '17', 'Australia', 'Viet Nam', '2021-01-10 00:54:35', 1, 'Pending', 2021, '2021-01-10 00:00:00', '2021-01-10 00:00:00', '2021-01-11 00:00:00', '2021-01-11 00:00:00', 0, 1, '1', '1', '1', 1),
(33, '1', '2', 'DESCRIPTION', '18', '18', 'Australia', 'Viet Nam', '2021-01-10 07:51:41', 1, 'Pending', 2021, '2021-01-10 00:00:00', '2021-01-10 00:00:00', '2021-01-11 00:00:00', '2021-01-11 00:00:00', 0, 1, '1', '1', '1', 1),
(34, '19', '20', 'DESCRIPTION', '19', '20', 'Australia', 'Viet Nam', '2021-01-10 07:56:01', 1, 'Pending', 2021, '2021-01-11 00:00:00', '2021-01-11 00:00:00', '2021-01-11 00:00:00', '2021-01-11 00:00:00', 0, 1, '1', '1', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `twilio_service`
--

CREATE TABLE `twilio_service` (
  `USER_ID` int(11) NOT NULL,
  `ACCOUNT_SID` varchar(64) NOT NULL,
  `AUTH_TOKEN` varchar(64) NOT NULL,
  `PHONE_NUMBER` varchar(64) NOT NULL,
  `ADMIN_PHONE_NUMBER` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `twilio_service`
--

INSERT INTO `twilio_service` (`USER_ID`, `ACCOUNT_SID`, `AUTH_TOKEN`, `PHONE_NUMBER`, `ADMIN_PHONE_NUMBER`) VALUES
(1, 'AC3ade4674ed858c35870efd8a9791cca3', 'ec9e3d07aea6162d998f359b8014f588', '+12029534948', '+61481272472');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_table`
--

CREATE TABLE `visitor_table` (
  `visitor_id` int(11) NOT NULL,
  `visitor_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `visitor_email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `visitor_mobile_no` int(12) NOT NULL,
  `visitor_address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `visitor_meet_person_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `visitor_department` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `visitor_reason_to_meet` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `visitor_enter_time` datetime NOT NULL,
  `visitor_outing_remark` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `visitor_out_time` datetime NOT NULL,
  `visitor_status` enum('In','Out') COLLATE utf8_unicode_ci NOT NULL,
  `visitor_enter_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `visitor_table`
--

INSERT INTO `visitor_table` (`visitor_id`, `visitor_name`, `visitor_email`, `visitor_mobile_no`, `visitor_address`, `visitor_meet_person_name`, `visitor_department`, `visitor_reason_to_meet`, `visitor_enter_time`, `visitor_outing_remark`, `visitor_out_time`, `visitor_status`, `visitor_enter_by`) VALUES
(1, 'Jenny Titus', 'jennytitus@mailinator.com', 2147483647, '1693 Isaacs Creek Road, Decatur, Illinois - 62522', 'Peter Parker', 'HR', 'For Job Interview', '2020-11-02 13:27:44', 'Inteview Completed111', '2020-12-04 07:28:02', 'Out', 5),
(2, 'Mary Washington', 'marywashington@gmail.com', 2147483647, '1308 Hornor Avenue, Bartlesville, 74003 Oklahoma', 'Yousef Haigh', 'Accounting', 'For get pending due check...', '2020-11-09 13:29:28', 'This person leave office, without get his due amount.', '2020-11-09 13:34:30', 'Out', 4),
(3, 'Francisco Moyer', 'franciscomoyer@gmail.com', 2147483647, '1256 Ross Street, Metropolis, 62960 - Illinois', 'Jayda Keebler', 'Marketing', 'For get the sample of product.', '2020-11-09 13:31:11', 'Take product and leave our facility.', '2020-11-09 13:33:47', 'Out', 2),
(4, 'Jennifer Brown', 'jenniferbrown@gmail.com', 2147483647, '3870 Summit Park Avenue, Southfield, 48075 Michigan', 'Peter Parker', 'HR', 'For Job Interview...', '2020-11-09 13:33:13', 'Interview Completed..', '2020-11-09 13:35:02', 'Out', 3),
(5, 'Benny Cochran', 'bennycochran@gmail.com', 2147483647, '1930 Seneca Drive, Portland, 97225 Oregon', 'Harris Lowe', 'Production', 'Deliver inventory item like nuts &amp; bolts.', '2020-11-09 13:36:43', 'After deliver item he leave this place.', '2020-11-09 14:39:04', 'Out', 4),
(6, 'Kristina Johnston', 'kristinajohnson@gmail.com', 2147483647, '2730 Felosa Drive, Brownwood, 76801, Texas', 'Kairon Bauer', 'Purchase', 'Give sample product catalog.', '2020-11-09 13:38:21', 'He received our product cataclog from Mr. Kairon', '2020-11-09 14:37:11', 'Out', 5),
(7, 'William Sherrill', 'williamsherrill@gmail.com', 2147483647, '2852 Alfred Drive, Bayside 11361, New York', 'Peter Parker', 'HR', 'For Job Inteview.', '2020-11-09 13:39:58', 'Leave office after completing his inteview.', '2020-11-09 14:34:47', 'Out', 2),
(8, 'Chuck Stjohn', 'chuckstjohn@gmail.com', 2147483647, '3855 Fincham Road, San Diego 92103, California', 'Aubrey Nelson', 'Production', 'For Repair Machine', '2020-11-09 14:14:56', 'After repair machine of production department, he leave this place.', '2020-11-09 14:39:29', 'Out', 4),
(9, 'Francesca Holland', 'francesca_holland@gmail.com', 2147483647, '3944 Hillhaven Drive, Mira Loma 91752, California', 'Peter Parker', 'HR', 'For Job Interview.', '2020-11-09 14:16:11', 'He completed job interview and leave our place.', '2020-11-09 14:37:29', 'Out', 5),
(10, 'Florence Linn', 'florencelinn@yahoo.com', 2147483647, '2920 Valley Drive, Philadelphia 19146, Pennsylvania', 'Harlee Murillo', 'Purchase', 'For give product quote price.', '2020-11-09 14:17:46', 'He give quote price to Mr. Harlee.', '2020-11-09 14:35:18', 'Out', 2),
(11, 'Christa Castaneda', 'chirsta_castaneda@gmail.com', 2147483647, '3377 Smith Road, Hampton 30228, Georgia', 'Marlie Booker', 'Accounting', 'For get the last stationary bill amount', '2020-11-09 14:19:40', 'He received bill amount and leave office.', '2020-11-09 14:33:15', 'Out', 3),
(12, 'Lisa Tschida', 'lisatschida@mail.com', 2147483647, '986 Bassel Street, Metairie 70001, Louisiana', 'Peter Parker', 'HR', 'For Receptionist Post job interview.', '2020-11-09 14:21:03', 'Interview completed', '2020-11-09 14:33:31', 'Out', 3),
(13, 'Anthony Justice', 'anthony.justice@ymail.com', 2147483647, '964 Pointe Lane, Hollywood 33023, Florida', 'Dessie Labadie', 'Marketing', 'For Received new product sample.', '2020-11-09 14:22:35', 'Ms. Dessie give product sample to Anthony and after this he leave this place.', '2020-11-09 14:40:09', 'Out', 4),
(14, 'William McClure', 'williammcclure@gmail.com', 2147483647, '1411 Elsie Drive, Sergeant Bluff 51054, South Dakota', 'Peter Parker', 'HR', 'For attend Junior Assistance post interview.', '2020-11-09 14:24:11', 'Completed Job Interview.', '2020-11-09 14:37:51', 'Out', 5),
(15, 'Kevin Greene', 'kevingreene@gmail.com', 2147483647, '2786 Armbrester Drive, Rancho Dominguez 90220, California', 'Jayda Keebler', 'Marketing', 'For repair office AC.', '2020-11-09 14:25:33', 'Kevin complete working on repairing of Marketing department AC.', '2020-11-09 14:35:57', 'Out', 2),
(16, 'Misty Pedersen', 'mistypedersen@gmail.com', 2147483647, '4975 Sardis Station, Minneapolis 55402, Minnesota', 'Harlee Murillo', 'Purchase', 'For deliver courier.', '2020-11-09 14:26:59', 'Send courier to Harlee and leave our place.', '2020-11-09 14:34:02', 'Out', 3),
(17, 'Kevin Fenner', 'kevinfenner@gmail.com', 2147483647, '1329 Ray Court, Rockingham 28379, North Carolina', 'Yousef Haigh', 'Accounting', 'Deliver Lunch Tiffin.', '2020-11-09 14:28:19', 'Kevein deliver tiffin to Youset and leave this place.', '2020-11-09 14:40:35', 'Out', 4),
(18, 'Ray McGee', 'raymcgee@gmail.com', 2147483647, '2620 Vineyard Drive, Garfield Heights\r\n 44128, Ohio', 'Youssef Hook', 'Accounting', 'Give us our electricity bill', '2020-11-09 14:29:48', 'Give electricity bill to Youssef of Accounting department and then after leave our place.', '2020-11-09 14:38:32', 'Out', 5),
(19, 'Antonio Krouse', 'antoniokrouse@gmail.com', 2147483647, '414 Hilltop Haven Drive, Rochelle Park 07662, New Jersey', 'Harris Lowe', 'Production', 'For deliver new electrical motor.', '2020-11-09 14:31:22', 'Mr. Harris has received electrical motor from Antonio and and Mr. Antonio leave our office.', '2020-11-09 14:36:40', 'Out', 2),
(20, 'Florence Graham', 'florencegraham@gmail.com', 2147483647, '4441 Patton Lane, Garner 27529, North Carolina', 'Peter Parker', 'HR', 'For Attend receptionist job interview.', '2020-11-09 14:32:47', 'Interview Completed.', '2020-11-09 14:34:18', 'Out', 3),
(21, 'Eliana Martinez', 'elianamartinez@gmail.com', 2147483647, '1137 Nash Street Northbrook, IL 60062', 'Peter Parker', 'HR', 'For Job Interview', '2020-11-11 06:09:55', 'Interview completed and leave our premises.', '2020-11-11 06:19:44', 'Out', 2),
(22, 'Andru Symonds', 'andrusymonds@gmail.com', 2147483647, '1881 Progress Way Cedar Rapids, IA 52401', 'Youssef Hook', 'Accounting', 'Amazon Delivery boy for deliver item of Youssef Hook', '2020-11-11 10:29:29', 'He gave parcel to Youset Hook and leave our facility.', '2020-11-11 10:29:58', 'Out', 3),
(23, 'Adam Smith', 'adamsmith@gmail.com', 2147483647, '964 Pointe Lane, Hollywood 33023, Florida', 'Peter Parker', 'HR', 'For Job Interview.', '2020-11-11 14:24:58', 'Job Interview Completed.', '2020-11-11 14:26:48', 'Out', 6),
(24, 'Jenny Titus', 'jennytitus@mailinator.com', 2147483647, '1693 Isaacs Creek Road, Decatur, Illinois - 62522', 'Peter Parker', 'HR', 'For Job Interview', '2020-11-02 13:27:44', 'Inteview Completed111', '2020-12-04 07:28:02', 'Out', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `department_table`
--
ALTER TABLE `department_table`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `tgs_customer`
--
ALTER TABLE `tgs_customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `tgs_shipment`
--
ALTER TABLE `tgs_shipment`
  ADD PRIMARY KEY (`SHIPMENT_NUM`);

--
-- Indexes for table `visitor_table`
--
ALTER TABLE `visitor_table`
  ADD PRIMARY KEY (`visitor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department_table`
--
ALTER TABLE `department_table`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tgs_customer`
--
ALTER TABLE `tgs_customer`
  MODIFY `cus_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tgs_shipment`
--
ALTER TABLE `tgs_shipment`
  MODIFY `SHIPMENT_NUM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `visitor_table`
--
ALTER TABLE `visitor_table`
  MODIFY `visitor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
