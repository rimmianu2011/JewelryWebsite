-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2019 at 05:41 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slit_pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `meminfo`
--

CREATE TABLE `meminfo` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(20) NOT NULL,
  `USERNAME` varchar(15) NOT NULL,
  `CONTACT` int(10) NOT NULL,
  `ADDRESS` varchar(80) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `HASH` varchar(255) NOT NULL,
  `SALT` varchar(255) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ACTIVATION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meminfo`
--

INSERT INTO `meminfo` (`ID`, `NAME`, `USERNAME`, `CONTACT`, `ADDRESS`, `PASSWORD`, `HASH`, `SALT`, `DATE`, `ACTIVATION`) VALUES
(3, 'anushka', 'anushka@gmail.c', 2147483647, '', '123', '53bfab8e783e4e0b098e049ee9a85eb50c96d0e0a4fb5159f0c1c76bab280e1f', '41eb82b7368bfd9d', '2019-02-04 14:22:13', 0),
(6, 'anushka', 'anushka1@gmail.', 1199223344, 'vashi mumb', 'qwerty', '2f153f15def96ba5a66ce3581a64ba32a12ff02dcf19b2144b4704863ee4d7cb', '1139e34915be6476', '2019-03-05 14:27:48', 0),
(7, 'Huda', 'huda@abc.com', 2147483647, 'navimumbai', '147', 'f7ef5a18f6ac37827adb466edb0aa68b338a65f49f63947500c3bd82182b014b', '4ebd89d84438cbef', '2019-10-19 16:02:43', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meminfo`
--
ALTER TABLE `meminfo`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meminfo`
--
ALTER TABLE `meminfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
