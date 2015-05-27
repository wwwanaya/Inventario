-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2015 at 06:30 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `invt`
--
CREATE DATABASE IF NOT EXISTS `invt` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `invt`;

-- --------------------------------------------------------

--
-- Table structure for table `invt_brands`
--

CREATE TABLE IF NOT EXISTS `invt_brands` (
  `brand_id` int(2) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(25) NOT NULL,
  `brand_addedBy` int(3) NOT NULL COMMENT 'UserID',
  `brand_addedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `invt_brands`
--

INSERT INTO `invt_brands` (`brand_id`, `brand_name`, `brand_addedBy`, `brand_addedDate`) VALUES
(1, 'HP', 1, '2015-05-25 00:40:08'),
(2, 'Generic', 1, '2015-05-25 04:39:07');

-- --------------------------------------------------------

--
-- Table structure for table `invt_cpu`
--

CREATE TABLE IF NOT EXISTS `invt_cpu` (
  `cpu_id` int(4) NOT NULL AUTO_INCREMENT,
  `cpu_lic` varchar(30) NOT NULL,
  `cpu_sn` varchar(12) NOT NULL,
  `cpu_ram` int(3) NOT NULL COMMENT 'GB',
  `cpu_hd` int(3) NOT NULL COMMENT 'GB',
  `cpu_brand` int(2) NOT NULL COMMENT 'BrandID',
  `cpu_model` int(2) NOT NULL COMMENT 'ModelID',
  `cpu_addedBy` int(3) NOT NULL COMMENT 'UserID',
  `cpu_addedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cpu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `invt_cpu`
--

INSERT INTO `invt_cpu` (`cpu_id`, `cpu_lic`, `cpu_sn`, `cpu_ram`, `cpu_hd`, `cpu_brand`, `cpu_model`, `cpu_addedBy`, `cpu_addedDate`) VALUES
(2, '26Q7R-GWGFQ-BFH3M-4Q24R-79XQR', 'MXL0492PSX', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(3, '7TVC2-X364B-CH23B-C9GD8-496DY', 'MXL0492MVS', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(4, 'GXXH9-JP9YV-DVPQ7-C449G-VF2F6', 'MXL0492MSJ', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(5, 'TT28R-DVGP7-8K8XQ-TQ4DB-44YGB', '2UA05008JZ', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(6, '7Q32B-PQH64-VVQBJ-FQR6P-WRFRF', 'MXL0492MW8', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(7, 'BPQKC-GQDWF-T3C2K-64PVB-H4RMW', 'MXL0492MV9', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(8, '26K33-26G7H-MK44K-6JG4J-Y27WM', 'MXL04825Q1', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(9, 'BD94B-TRBYF-DHFYF-36R8K-F36BJ', 'MXL0492MT1', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(10, '4JKM4-TCK73-RT8Q9-WGRYW-K67W4', 'MXL1140G1Q', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(11, 'PWMTJ-YBJPG-TQ2J8-8MF92-M9JT3', 'MXL0492ML3', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(12, '7XKPT-YP4VC-B9WC7-GTWM4-6FJMR', 'MXL0492MTR', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(13, '73GQF-YBRXM-62KCV-7YTT9-PXCP8', 'MXL0090G6R', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(14, 'DX8GD-JH92R-2BVTX-CDWRV-VP3YX', 'MXL0492PTQ', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(15, 'D27MX-QDR27-6G2TH-YF8F7-VGFBC', '2UA050081B', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(16, 'PRH94-TY87W-6T82Y-YKYPF-DCX9P', 'MXL0492ML7', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(17, 'HPW3Y-2GGBF-28V37-BDBJM-K22RC', 'MXL0492MMX', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(18, 'GJQFD-7WQF8-7G2DX-DXJPD-T2KRQ', 'MXL0492VPG', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(19, '6MP3-9PY2R-9DB2G-C3X6M-GX2GG,', 'MXL0420MYG', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(20, '2QG7Y-DP6QP-46QX9-6D6RM-8CCFH', 'MXL0492MM4', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(21, 'PM8GH-WM39M-DR2GG-2MWGR-BCYR7', 'MXL0492ML1', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(22, 'QYYTY-TRPBY-B9MQM-K6MQM-CXKF8', '2UA05008F', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(23, 'MKQ22-3YP89-H3HYC-J7R6H-KJMXC', '2UA1390B02', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(24, 'Q44B4-FF6G2-FRXRH-PCQBY-86K8Q', 'MXL0492MTX', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(25, '6KTYB-JMCR8-WTFJW-RY48M-3J7GR', 'MXL092ML4', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(26, '2247C-KYK2V-P8QK7-HM8TW-F4JYW', 'MXL0492MTP', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(27, 'TKDQT-DP6X6-GRGYR-T24FV-CQRMV', '2UA11515YF', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(28, 'P68X9-26WJV-92WXJ-MM28Y-GJFPK', 'MXL2361HRC', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(29, 'J8T79-XTKY9-KBKBR-VQ9WW-83RKQ', 'MXL224174T', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(30, 'YTQTW-V6QHV-FMK6X-2J6KP-X7D2Q', 'MXL20620YG', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(31, 'YRFM8-6VTFT-JG2RC-MJBMR-Q4BMX', 'MXL0942MVG', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(32, 'GRR78-QWHY3-DRQ7P-F2MCV-M93VF', 'MXL2061Y5N', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(33, 'TWKYB-VVHVDR-KQTP2-M9QGG-KBWC7', 'MXL0492MSZ', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(34, 'W38WJ-X3J2K-TWHTC-KY3VH-BFYRK', '2UA050097Z', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(35, 'GRHW9-KG3K2-P3G8P-B39BM-PG7X2', 'MXL0492MLR', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(36, 'W848G-WX664-MVB47-RQMVQ-X3FRX', 'MXL1331CZG', 2, 0, 0, 0, 1, '0000-00-00 00:00:00'),
(37, 'W84QJ-KKK46-7GXBB-R6PFJ-FR4GK', 'ASDFGHJKL1', 2, 0, 0, 0, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `invt_models`
--

CREATE TABLE IF NOT EXISTS `invt_models` (
  `model_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_name` varchar(50) NOT NULL,
  `model_brand` int(2) NOT NULL COMMENT 'BrandID',
  `model_addedBy` int(3) NOT NULL COMMENT 'UserID',
  `mode_addedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `invt_models`
--

INSERT INTO `invt_models` (`model_id`, `model_name`, `model_brand`, `model_addedBy`, `mode_addedDate`) VALUES
(1, 'HP PRO 6005 SFF', 1, 1, '2015-05-25 00:42:47'),
(2, 'H61MHB', 2, 1, '2015-05-26 04:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `invt_users`
--

CREATE TABLE IF NOT EXISTS `invt_users` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_name` varchar(50) NOT NULL,
  `usr_login` varchar(12) NOT NULL,
  `usr_pass` varchar(150) NOT NULL,
  `usr_addedBy` int(3) NOT NULL,
  `usr_addedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `invt_users`
--

INSERT INTO `invt_users` (`usr_id`, `usr_name`, `usr_login`, `usr_pass`, `usr_addedBy`, `usr_addedDate`) VALUES
(1, 'System', 'sys', 'Bug.$%10', 1, '2015-05-25 00:38:28');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
