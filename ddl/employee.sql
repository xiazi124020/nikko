-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: mysql7006.xserver.jp
-- Generation Time: Jul 06, 2019 at 09:35 PM
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
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` varchar(10) COLLATE utf8_bin NOT NULL,
  `password` varchar(16) COLLATE utf8_bin NOT NULL,
  `name` varchar(16) COLLATE utf8_bin NOT NULL,
  `kana` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `birthday` date NOT NULL,
  `sex` int(1) DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `tel` varchar(15) COLLATE utf8_bin DEFAULT '000-0000-0000',
  `language` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `dept` int(11) DEFAULT NULL,
  `title` int(11) DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `webchat` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(40) COLLATE utf8_bin NOT NULL,
  `education` int(11) DEFAULT NULL,
  `major` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `project_Id` int(11) DEFAULT NULL,
  `permission` int(11) NOT NULL,
  `comment` varchar(200) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='日興テクノロジー社員テーブル';

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `password`, `name`, `kana`, `birthday`, `sex`, `mobile`, `tel`, `language`, `dept`, `title`, `address`, `webchat`, `email`, `education`, `major`, `project_Id`, `permission`, `comment`) VALUES
('admin', 'adminadmin', 'admin', 'admin', '1900-00-00', 9, '070-369--9653', '0445898268', '0', 9, 0, '桜本1-20-3-502', '11111111111111111111', 'info@nikko-technology.co.jp', 1, '1', 1, 0, 'admin'),
('nk0001', 'zaq12wsx!', '成煒', NULL, '1981-03-21', 1, NULL, '070-3961-4452', NULL, 0, 1, '江戸川区清新町１－２－２－８０８', NULL, 'wei.cheng@nikko-technology.co.jp', 2, '2', 1, 0, 'test'),
('nk0002', 'zaq12wsx!', '張建厚', NULL, '1985-03-21', 1, NULL, '080-1234-5678', NULL, 0, 1, '江戸川区清新町１－２－２－８０８', NULL, 'jianhou.zhang@nikko-technology.co.jp', 1, '1', 2, 0, 'test'),
('nk0003', 'zaq12wsx!', '菊地瑞希', NULL, '1982-01-01', 0, NULL, '090-1234-5678', NULL, 0, 0, '川崎', NULL, 'mizuki.kikuchi@nikko-technology.co.jp', 1, '2', 2, 0, 'test'),
('nk0004', 'zaq12wsx!', '趙超', NULL, '1981-03-21', 1, NULL, '070-4569-9632', NULL, 0, 1, '江戸川区清新町１－２－２－８０８', NULL, 'chao.zhao@nikko-technology.co.jp', 2, '2', 2, 0, 'test'),
('nk0005', 'yueyue', '張月月', NULL, '1981-03-21', 1, NULL, '090-3698-9632', NULL, 0, 3, '江戸川区清新町１－２－２－８０８', NULL, 'yueyue.zhang@nikko-technology.co.jp', 1, '2', 2, 0, 'test'),
('nk0020', 'fanglei123', '方磊', NULL, '1981-03-21', 1, NULL, '090-3265-4563', NULL, 0, 2, '江戸川区清新町１－２－２－８０８', NULL, 'lei.fang@nikko-technology.co.jp', 2, '1', 2, 0, 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_Id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`project_Id`) REFERENCES `project` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
