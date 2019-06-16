-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 16, 2019 at 10:15 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2019-06-12 18:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `diem`
--

CREATE TABLE `diem` (
  `id` int(11) NOT NULL,
  `stid` int(11) NOT NULL,
  `mahk` varchar(50) NOT NULL,
  `scode` varchar(50) NOT NULL,
  `lop` int(50) NOT NULL,
  `midterm` int(11) NOT NULL,
  `final` int(11) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diem`
--

INSERT INTO `diem` (`id`, `stid`, `mahk`, `scode`, `lop`, `midterm`, `final`, `mark`) VALUES
(1, 1001, '1', 'MAT', 1, 9, 9, 10),
(2, 1001, '1', 'ECO', 1, 7, 9, 80),
(3, 1001, '1', 'PHP1', 1, 7, 9, 80),
(4, 1002, '1', 'MAT', 2, 7, 9, 6),
(5, 1009, '1', 'ECO', 1, 9, 10, 10),
(12, 1009, '1', 'mieco', 1, 8, 10, 10),
(13, 1009, '1', 'MAT', 1, 1, 10, 7),
(14, 1001, '1', 'ECO', 1, 9, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `hocki`
--

CREATE TABLE `hocki` (
  `id` int(100) NOT NULL,
  `tenhk` varchar(50) NOT NULL,
  `mahk` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hocki`
--

INSERT INTO `hocki` (`id`, `tenhk`, `mahk`) VALUES
(2, 'học kì hè 2017-2018', 1),
(4, 'học kì 2 - 2015-2016', 2),
(5, 'học kì 1 - 2016-2017', 3),
(7, 'học kì 2 - 2016-2017', 4),
(9, 'học kì 1 - 2017-2018', 5),
(11, 'học kì 2 - 2017-2018', 6),
(12, 'học kì hè - 2016-2017', 7),
(15, 'học kì hè - 2018-2019', 8),
(16, 'kì 1 - 2018-2019', 9),
(17, 'kì 2 - 2018-2019', 10);

-- --------------------------------------------------------

--
-- Table structure for table `hsinh`
--

CREATE TABLE `hsinh` (
  `id` int(100) NOT NULL,
  `stid` int(100) NOT NULL,
  `stname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `classid` int(100) NOT NULL,
  `khoahoc` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tinhtrang` int(100) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hsinh`
--

INSERT INTO `hsinh` (`id`, `stid`, `stname`, `email`, `gender`, `classid`, `khoahoc`, `password`, `tinhtrang`, `birthday`) VALUES
(1, 1001, 'abc ac', 'abc@gmail.com', 'female', 1, '2015-2020', 'e10adc3949ba59abbe56e057f20f883e', 1, '2019-04-03'),
(2, 1002, 'abc abc', 'aa@gmail.com', 'male', 2, '2015-2021', 'e10adc3949ba59abbe56e057f20f883e', 1, '0000-00-00'),
(9, 1008, 'abc ac', 'phamdund2597@gmail.com', 'male', 1, '', '1008', 1, '0000-00-00'),
(10, 1009, 'Pham The Du', 'phamdund2597@gmail.com', 'female', 1, '', '31b3b31a1c2f8a370206f111127c0dbd', 1, '1997-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `id` int(100) NOT NULL,
  `tenlop` varchar(50) NOT NULL,
  `malop` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`id`, `tenlop`, `malop`) VALUES
(1, 'MIS2015A', 1),
(2, 'IB2015A', 2);

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `id` int(100) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `scode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`id`, `sname`, `scode`) VALUES
(1, 'Toán cao cấp', 'MAT'),
(3, 'Kinh Tế Học', 'ECO'),
(5, 'Kinh tế vĩ mô', 'mieco'),
(6, 'Thiết kế đa phương tiện', 'PHP1'),
(7, 'Java Web', 'Jv'),
(8, 'Thể Dục', 'HIS1020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diem`
--
ALTER TABLE `diem`
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `hocki`
--
ALTER TABLE `hocki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hsinh`
--
ALTER TABLE `hsinh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diem`
--
ALTER TABLE `diem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hocki`
--
ALTER TABLE `hocki`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hsinh`
--
ALTER TABLE `hsinh`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
