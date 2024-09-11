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
-- Table structure for table `ear_ring`
--

CREATE TABLE `ear_ring` (
  `PRO_ID` int(10) NOT NULL,
  `IMAGE` varchar(70) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `PRICE` int(10) NOT NULL,
  `METAL` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ear_ring`
--

INSERT INTO `ear_ring` (`PRO_ID`, `IMAGE`, `TITLE`, `PRICE`, `METAL`) VALUES
(1, 'eg1.jpg', '', 2000, 'g'),
(2, 'eg2.jpg', '', 10000, 'g'),
(3, 'eg3.jpg', '', 30000, 'g'),
(4, 'eg4.jpg', '', 40000, 'g'),
(5, 'es1.jpg', '', 35000, 's'),
(6, 'es2.png', '', 40000, 's'),
(7, 'es3.png', '', 25000, 's'),
(8, 'es4.png', '', 50000, 's');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ear_ring`
--
ALTER TABLE `ear_ring`
  ADD PRIMARY KEY (`PRO_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ear_ring`
--
ALTER TABLE `ear_ring`
  MODIFY `PRO_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
