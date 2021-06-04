-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2021 at 12:33 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faculty_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `Fac_ID` varchar(10) NOT NULL,
  `apply_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` varchar(1000) NOT NULL,
  `type` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`Fac_ID`, `apply_date`, `start_date`, `end_date`, `reason`, `type`, `status`) VALUES
('FAC0035', '2020-09-07', '2020-09-09', '2020-09-11', 'Have to attend the marriage of my cousin.', 'Casual Leave', 'Accepted'),
('FAC0035', '2020-10-19', '2020-10-20', '2020-10-23', 'Got into a small accident and fractured my leg.So requesting a few days off for resting.', 'Sick Leave', 'Accepted'),
('FAC0035', '2021-01-22', '2020-01-25', '2020-01-29', 'I would like to use my paid leave quota to take a few weeks off.', 'Paid Leave', 'Accepted'),
('FAC0035', '2021-04-01', '2021-04-02', '2021-04-20', 'uhhiugii', 'On Duty', 'Accepted'),
('FAC0035', '2021-04-01', '2021-03-03', '2021-03-04', 'gvju', 'Paid leave', 'Pending'),
('FAC0036', '2020-07-03', '2020-07-22', '2021-02-22', 'My due date is in August.', 'Maternity Leave', 'Accepted'),
('FAC0036', '2020-10-21', '2020-10-22', '2020-10-22', 'Incharge faculty for students representing in Honeywell Hackathon in the intercollege meet taking place in PSG college.', 'On Duty', 'Accepted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`Fac_ID`,`apply_date`,`type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
