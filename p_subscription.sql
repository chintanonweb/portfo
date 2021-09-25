-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2020 at 08:07 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `p_subscription`
--

CREATE TABLE `p_subscription` (
  `ps_id` int(11) NOT NULL COMMENT '(Backend Purpose)',
  `pp_id` int(11) NOT NULL COMMENT '(Backend Purpose)',
  `pt_id` int(11) NOT NULL COMMENT '(Backend Purpose)',
  `pt_refid` int(11) NOT NULL COMMENT 'reference id',
  `pu_accno` varchar(6) NOT NULL COMMENT '(Backend Purpose)',
  `ps_package_startdate` date NOT NULL COMMENT 'Starting Date of Package',
  `ps_package_enddate` date NOT NULL COMMENT 'Ending Date of Package',
  `ps_flag` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Status of account',
  `ps_created_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '(Backend Purpose)',
  `ps_updated_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '(Backend Purpose)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_subscription`
--

INSERT INTO `p_subscription` (`ps_id`, `pp_id`, `pt_id`, `pt_refid`, `pu_accno`, `ps_package_startdate`, `ps_package_enddate`, `ps_flag`, `ps_created_stamp`, `ps_updated_stamp`) VALUES
(1, 3, 0, 1, '10003', '0000-00-00', '0000-00-00', 0, '2020-02-28 08:06:12', '2020-02-28 08:06:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `p_subscription`
--
ALTER TABLE `p_subscription`
  ADD UNIQUE KEY `ps_id` (`ps_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `p_subscription`
--
ALTER TABLE `p_subscription`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '(Backend Purpose)', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
