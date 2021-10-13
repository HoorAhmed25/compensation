-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2021 at 05:25 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compensation`
--

-- --------------------------------------------------------

--
-- Table structure for table `deathinfo`
--

CREATE TABLE `deathinfo` (
  `ID` int(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `nationalId` varchar(100) NOT NULL,
  `uname` varchar(200) NOT NULL,
  `dateofdeath` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `workingplace` varchar(200) NOT NULL,
  `workingname` varchar(200) NOT NULL,
  `governorates` varchar(200) NOT NULL,
  `question` varchar(100) NOT NULL,
  `questiond` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `landnum` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `cert` varchar(200) NOT NULL,
  `report` varchar(200) NOT NULL,
  `tests` varchar(200) NOT NULL,
  `medradio` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `governorate` varchar(200) DEFAULT NULL,
  `follow` varchar(200) DEFAULT NULL,
  `hospital` varchar(200) DEFAULT NULL,
  `certDate` date NOT NULL,
  `transferNum` varchar(200) DEFAULT NULL,
  `bank` varchar(200) DEFAULT NULL,
  `transDate` date DEFAULT NULL,
  `certph` varchar(200) DEFAULT NULL,
  `attcert` varchar(200) DEFAULT NULL,
  `rname` varchar(200) DEFAULT NULL,
  `rID` varchar(200) DEFAULT NULL,
  `rrelation` varchar(200) DEFAULT NULL,
  `rnumber` varchar(200) DEFAULT NULL,
  `raddress` varchar(200) DEFAULT NULL,
  `rname1` varchar(200) DEFAULT NULL,
  `rID1` varchar(200) DEFAULT NULL,
  `rrelation1` varchar(200) DEFAULT NULL,
  `rnumber1` varchar(200) DEFAULT NULL,
  `raddress1` varchar(200) DEFAULT NULL,
  `rname2` varchar(200) NOT NULL,
  `rID2` varchar(200) NOT NULL,
  `rrelation2` varchar(200) NOT NULL,
  `rnumber2` varchar(200) NOT NULL,
  `raddress2` varchar(200) NOT NULL,
  `rname3` varchar(200) NOT NULL,
  `rID3` varchar(200) NOT NULL,
  `rrelations3` varchar(200) NOT NULL,
  `rnumber3` varchar(200) NOT NULL,
  `raddress3` varchar(200) NOT NULL,
  `rname4` varchar(200) DEFAULT NULL,
  `rID4` varchar(200) DEFAULT NULL,
  `rrelation4` varchar(200) DEFAULT NULL,
  `rnumber4` varchar(200) DEFAULT NULL,
  `raddress4` varchar(200) DEFAULT NULL,
  `rname5` varchar(200) DEFAULT NULL,
  `rID5` varchar(200) DEFAULT NULL,
  `rrelation5` varchar(200) DEFAULT NULL,
  `rnumber5` varchar(200) DEFAULT NULL,
  `raddress5` varchar(200) DEFAULT NULL,
  `date` date NOT NULL,
  `reportin` varchar(200) DEFAULT NULL,
  `datej` date DEFAULT NULL,
  `perc` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `governorate`
--

CREATE TABLE `governorate` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `governorate`
--

INSERT INTO `governorate` (`id`, `name`) VALUES
(1, 'القاهره'),
(2, 'الاسكندرية'),
(3, 'بورسعيد'),
(4, 'السويس'),
(11, 'دمياط'),
(12, 'الدقهلية'),
(13, 'الشرقية'),
(14, 'القليوبية'),
(15, 'كفر الشيخ'),
(16, 'الغربية'),
(17, 'المنوفية'),
(18, 'البحيرة'),
(19, 'الاسماعيلية'),
(21, 'الجيزه'),
(22, 'بنى سويف'),
(23, 'الفيوم'),
(24, 'المنيا'),
(25, 'اسيوط'),
(26, 'سوهاج'),
(27, 'قنا'),
(28, 'اسوان'),
(29, 'الاقصر'),
(31, 'البحر الاحمر'),
(32, 'الوادى الجديد'),
(33, 'مرسى مطروح'),
(34, 'شمال سيناء'),
(35, 'جنوب سيناء');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `permission` int(100) NOT NULL,
  `gov` varchar(200) NOT NULL,
  `hospital` varchar(200) NOT NULL,
  `follow` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `permission`, `gov`, `hospital`, `follow`) VALUES
(1, 'nora', '1234', 1, 'الاسكندرية', 'ابو قير', 'التأمين الصحى'),
(2, 'mod', '1234', 2, 'الاسكندرية', '', ''),
(3, 'insurance', '1234', 3, '', '', ''),
(4, 'magles', '1234', 4, '', '', ''),
(5, 'admin', '1234', 6, '', '', ''),
(6, 'fund', '1234', 5, '', '', ''),
(12, 'mode', '1234', 2, 'القاهرة', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deathinfo`
--
ALTER TABLE `deathinfo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `governorate`
--
ALTER TABLE `governorate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deathinfo`
--
ALTER TABLE `deathinfo`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
