-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2019 at 05:42 PM
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
-- Table structure for table `ring`
--

CREATE TABLE `ring` (
  `PRO_ID` int(10) NOT NULL,
  `IMAGE` varchar(70) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `PRICE` int(10) NOT NULL,
  `METAL` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ring`
--

INSERT INTO `ring` (`PRO_ID`, `IMAGE`, `TITLE`, `PRICE`, `METAL`) VALUES
(1, 'rg1.jpg', 'Diamond Studded Thin Band Gold Ring', 20000, 'g'),
(2, 'rg2.jpg', 'Quartz Embellished Gold Ring', 10000, 'g'),
(3, 'rg3.jpg', 'Diamond Studded Thick Band Gold Ring', 4000, 'g'),
(4, 'rg4.jpg', 'Square Shaped Diamond Studded Gold Ring', 3000, 'g'),
(5, 'rs1.jpg', 'Ruby Studded Silver Ring', 5000, 's'),
(6, 'rs2.jpg', 'Diamond Studded Ring', 4000, 's'),
(7, 'rs3.jpg', 'Simplistic Thin Band Silver Ring', 3000, 's'),
(8, 'rs4.jpg', 'Delicate Ruby Studded Silver Ring', 4000, 's');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ring`
--
ALTER TABLE `ring`
  ADD PRIMARY KEY (`PRO_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ring`
--
ALTER TABLE `ring`
  MODIFY `PRO_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
