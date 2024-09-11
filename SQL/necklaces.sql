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
-- Table structure for table `necklaces`
--

CREATE TABLE `necklaces` (
  `PRO_ID` int(10) NOT NULL,
  `IMAGE` varchar(70) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `PRICE` int(10) NOT NULL,
  `METAL` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `necklaces`
--

INSERT INTO `necklaces` (`PRO_ID`, `IMAGE`, `TITLE`, `PRICE`, `METAL`) VALUES
(1, 'ng1.png', '', 2000, 'g'),
(2, 'ng2.png', '', 3500, 'g'),
(3, 'ng3.png', '', 2000, 'g'),
(4, 'ng4.png', '', 4000, 'g'),
(5, 'ns1.png', '', 6000, 's'),
(6, 'ns2.png', '', 7000, 's'),
(7, 'ns3.png', '', 6000, 's'),
(8, 'ns4.png', '', 5000, 's');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `necklaces`
--
ALTER TABLE `necklaces`
  ADD PRIMARY KEY (`PRO_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `necklaces`
--
ALTER TABLE `necklaces`
  MODIFY `PRO_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
