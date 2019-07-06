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
-- Table structure for table `code`
--

CREATE TABLE IF NOT EXISTS `code` (
  `code_Id` int(9) NOT NULL COMMENT 'コード番号',
  `code_Index` int(11) NOT NULL COMMENT 'インデックス',
  `code_Name` varchar(80) DEFAULT NULL COMMENT '名称',
  `comment` varchar(20) NOT NULL COMMENT 'コメント'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`code_Id`, `code_Index`, `code_Name`, `comment`) VALUES
(4, 0, '日本語母語', ''),
(4, 2, '日本語N1', ''),
(4, 1, '日本語ネイティブ', ''),
(1, 9, '--', ''),
(2, 0, '社長', ''),
(3, 0, '大学院', ''),
(1, 0, '女性', ''),
(2, 1, '副社長', ''),
(3, 2, '専門学校', ''),
(2, 2, '部長', ''),
(2, 3, '一般社員', ''),
(1, 1, '男性', ''),
(4, 3, '日本語N2', ''),
(4, 4, '日本語N3', ''),
(4, 5, '日本語N4', ''),
(4, 6, '日本語N6', ''),
(5, 0, 'コンピューター技術', ''),
(5, 1, 'ソフトウェア', ''),
(5, 2, '日本語', ''),
(5, 3, 'その他', ''),
(3, 1, '大学', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`code_Id`,`code_Index`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
