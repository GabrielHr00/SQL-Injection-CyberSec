-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 11, 2021 at 04:24 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `log_in`
--

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(15) NOT NULL,
  `address` varchar(30) NOT NULL,
  `creditCardType` varchar(20) NOT NULL,
  `creditCardNumber` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `username`, `password`, `name`, `address`, `creditCardType`, `creditCardNumber`) VALUES
(10101, 'Hoenix', 'hoenix123', 'Hoenix Roof', 'obere Augartenstrasse 18B', 'Master Card', '12045-746-3473232-23'),
(10102, 'Elias', 'elias123', 'Elias Moormeier', 'Stuwerstraße 47', 'Visa', '45120-746-3464532-23'),
(10103, 'Raphael', 'raphael123', 'Raphael Isabell', 'Türkenstraße 82A', 'American Express', '07335-746-3474532-23'),
(10104, 'Damian', 'damian123', 'Damian Oliver', 'Westbahnstraße 37D', 'Maestro', '45743-453-3473232-23'),
(10105, 'Kevin', 'kevin123', 'Kevin Paris', 'Triesterstraße 143', 'Rutex', '82135-711-3474832-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
