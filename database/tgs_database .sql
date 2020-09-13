-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2020 at 12:15 PM
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
-- Database: `tgs_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tgs_customer`
--

CREATE TABLE `tgs_customer` (
  `cus_id` varchar(5) NOT NULL,
  `cus_email` varchar(20) NOT NULL,
  `cus_phone` varchar(20) NOT NULL,
  `cus_lname` varchar(50) NOT NULL,
  `cus_fname` varchar(50) NOT NULL,
  `cus_initial` varchar(20) NOT NULL,
  `cus_type` int(11) NOT NULL,
  `cus_company` varchar(50) NOT NULL,
  `rg_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tgs_package`
--

CREATE TABLE `tgs_package` (
  `package_type` varchar(5) NOT NULL,
  `package_name` varchar(50) NOT NULL,
  `package_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tgs_pakage_detail`
--

CREATE TABLE `tgs_pakage_detail` (
  `package_id` varchar(50) NOT NULL,
  `package_weight` int(11) NOT NULL,
  `package_lenght` int(11) NOT NULL,
  `package_width` int(11) NOT NULL,
  `package_height` int(11) NOT NULL,
  `package_quantity` int(11) NOT NULL,
  `package_type` varchar(50) NOT NULL,
  `shipment_num` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tgs_region`
--

CREATE TABLE `tgs_region` (
  `rg_code` varchar(5) NOT NULL,
  `rg_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tgs_shipment`
--

CREATE TABLE `tgs_shipment` (
  `SHIPMENT_NUM` varchar(50) NOT NULL,
  `CUS_ID_SENDER` varchar(50) NOT NULL,
  `CUS_ID_RECEIVER` varchar(50) NOT NULL,
  `SHIPMENT_DESCRIPTION` varchar(100) NOT NULL,
  `SHIPMENT_ESTIMATED_COST` date NOT NULL,
  `SHIPMENT_ACTUAL_COST` date NOT NULL,
  `SHIPMENT_DESTINATION` varchar(50) NOT NULL,
  `SHIPMENT_ORDER_DAY` date NOT NULL,
  `SHIPMENT_ORDER_TIME` date NOT NULL,
  `SHIPMENT_CONFIRMATION_PRIORITY` int(11) NOT NULL,
  `SHIPMENT_STATUS` int(11) NOT NULL,
  `SHIPMENT_SIGNED_DATE` int(11) NOT NULL,
  `SHIPMENT_START_DATE` date NOT NULL,
  `SHIPMENT_END_DATE` date NOT NULL,
  `SHIPMENT_ACTUAL_START_DATE` date NOT NULL,
  `SHIPMENT_ACTUAL_END_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tgs_users`
--

CREATE TABLE `tgs_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(255) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_activation_key` varchar(255) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT 0,
  `display_name` varchar(250) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tgs_customer`
--
ALTER TABLE `tgs_customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `tgs_package`
--
ALTER TABLE `tgs_package`
  ADD PRIMARY KEY (`package_type`);

--
-- Indexes for table `tgs_region`
--
ALTER TABLE `tgs_region`
  ADD PRIMARY KEY (`rg_code`),
  ADD UNIQUE KEY `rg_code` (`rg_code`);

--
-- Indexes for table `tgs_shipment`
--
ALTER TABLE `tgs_shipment`
  ADD PRIMARY KEY (`SHIPMENT_NUM`);

--
-- Indexes for table `tgs_users`
--
ALTER TABLE `tgs_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tgs_users`
--
ALTER TABLE `tgs_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
