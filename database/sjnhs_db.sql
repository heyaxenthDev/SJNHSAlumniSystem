-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2024 at 05:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sjnhs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` int(11) NOT NULL,
  `alumni_id` varchar(100) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `hs_type` varchar(50) NOT NULL,
  `year_graduated` year(4) NOT NULL,
  `section` varchar(50) NOT NULL,
  `profession` varchar(72) NOT NULL,
  `martital_stat` varchar(50) NOT NULL,
  `mobile_num` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(250) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `alumni_id`, `firstname`, `middlename`, `lastname`, `hs_type`, `year_graduated`, `section`, `profession`, `martital_stat`, `mobile_num`, `email`, `address`, `date_created`) VALUES
(1, '', 'Juan', 'Reyes', 'Dela Cruz', 'SHS', 2018, 'A', 'Teacher', 'Single', '09123456789', 'juandc@gmail.com', 'Sta. Justa, Tibiao, Antique', '2024-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `batchyear`
--

CREATE TABLE `batchyear` (
  `batch_year` year(4) NOT NULL,
  `hs_type` varchar(50) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batchyear`
--

INSERT INTO `batchyear` (`batch_year`, `hs_type`, `date_created`) VALUES
(2018, 'SHS', '2024-02-18'),
(2019, 'SHS', '2024-02-19'),
(2018, 'JHS', '2024-02-19'),
(1990, 'JHS', '2024-02-19'),
(1996, 'SHS', '2024-02-19'),
(1999, 'JHS', '2024-02-19');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `hs_type` varchar(50) NOT NULL,
  `grade` int(11) NOT NULL,
  `sect_subj` varchar(50) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `firstname`, `middlename`, `lastname`, `designation`, `hs_type`, `grade`, `sect_subj`, `profile_picture`, `date_created`) VALUES
(1, 'Juana', 'Reyes', 'Dela Cruz', 'Teacher III', 'SHS', 11, 'A', 'uploads/SHS/team-4.jpg', '2024-02-18'),
(2, 'Marc John', 'Alejandro', 'Martinez', 'Teacher I', 'JHS', 12, 'A', 'uploads/JHS/team-1.jpg', '2024-02-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
