-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: mysql7006.xserver.jp
-- Generation Time: Jul 06, 2019 at 09:36 PM
-- Server version: 5.7.16
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nikkotech_wp5`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `customerId` int(11) DEFAULT NULL,
  `comment1` varchar(1) DEFAULT NULL,
  `comment2` varchar(1) DEFAULT NULL,
  `comment3` varchar(1) DEFAULT NULL,
  `comment4` varchar(11) DEFAULT NULL,
  `comment5` varchar(1) DEFAULT NULL,
  `comment6` varchar(1) NOT NULL,
  `comment7` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='日興テクノロジープロジェクトテーブル';

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `startDate`, `endDate`, `customerId`, `comment1`, `comment2`, `comment3`, `comment4`, `comment5`, `comment6`, `comment7`) VALUES
(1, 'テストプロジェクト', '2019-05-01', NULL, 1, NULL, NULL, NULL, NULL, NULL, '', ''),
(2, 'テストプロジェクト111', '2019-05-01', NULL, 1, NULL, NULL, NULL, NULL, NULL, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
