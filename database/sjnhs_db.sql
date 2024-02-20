-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 03:32 PM
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
-- Table structure for table `alumni_jhs`
--

CREATE TABLE `alumni_jhs` (
  `id` int(11) NOT NULL,
  `alumni_id` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `year_graduated` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `marital_stat` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `user_status` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni_jhs`
--

INSERT INTO `alumni_jhs` (`id`, `alumni_id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `phone_num`, `year_graduated`, `section`, `profession`, `marital_stat`, `address`, `profile_picture`, `user_status`, `date_created`) VALUES
(1, 'ALUM65d4226839559', 'Juan', 'Buena', 'Dela Cruz', 'juandc@gmail.com', '12345678', '091265488795', '1990', 'A', 'Doctor', 'Single', 'Tibiao, Antique', 'uploads/JHSAlumni/team-3.jpg', '0', '2024-02-20 03:54:16'),
(2, 'ALUM65d4a8e3ab34b', 'Jane Joane', 'Angeles', 'Elizalde', 'jj.angeles@gmail.com', 'Welcome123!', '09786378127', '1990', 'A', 'Business Analyst', 'Married', 'Alegre Road, Tibiao, Antique', 'uploads/JHSAlumni/team-4.jpg', '0', '2024-02-20 13:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `alumni_shs`
--

CREATE TABLE `alumni_shs` (
  `id` int(11) NOT NULL,
  `alumni_id` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `year_graduated` year(4) NOT NULL,
  `track` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `marital_stat` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `user_status` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni_shs`
--

INSERT INTO `alumni_shs` (`id`, `alumni_id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `phone_num`, `year_graduated`, `track`, `profession`, `marital_stat`, `address`, `profile_picture`, `user_status`, `date_created`) VALUES
(1, 'ALUM65d44e8664057', 'Feliza Marie', 'Pedro', 'Lacson', 'felizmarie.lacson@gmail.com', 'Welcome123!', '09123478648', 2018, 'STEM', 'Civil Engineer', 'Married', 'Tibiao, Antique', 'uploads/SHSAlumni/team-2.jpg', '0', '2024-02-20 07:02:30'),
(2, 'ALUM65d4a9b6191e2', 'Angelo', 'Wences', 'Kim', 'angelokim@gmail.com', 'Welcome123!', '097638173642', 2018, 'GAS', 'Professor', 'Widowed', 'Barbaza, Antique', 'uploads/SHSAlumni/team-1.jpg', '0', '2024-02-20 13:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `batchyear`
--

CREATE TABLE `batchyear` (
  `id` int(11) NOT NULL,
  `batch_year` year(4) NOT NULL,
  `hs_type` varchar(50) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batchyear`
--

INSERT INTO `batchyear` (`id`, `batch_year`, `hs_type`, `date_created`) VALUES
(1, 2018, 'SHS', '2024-02-18'),
(2, 2019, 'SHS', '2024-02-19'),
(3, 2018, 'JHS', '2024-02-19'),
(4, 1990, 'JHS', '2024-02-19'),
(5, 2020, 'SHS', '2024-02-19'),
(6, 1999, 'JHS', '2024-02-19'),
(7, 1991, 'JHS', '2024-02-20'),
(8, 1992, 'JHS', '2024-02-20'),
(9, 1993, 'JHS', '2024-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) UNSIGNED NOT NULL,
  `eventsCode` varchar(255) NOT NULL,
  `eventName` varchar(255) NOT NULL,
  `eventDate` date NOT NULL,
  `eventStatus` int(11) NOT NULL,
  `eventLocation` varchar(255) NOT NULL,
  `eventDescription` text NOT NULL,
  `eventPicture` varchar(255) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventsCode`, `eventName`, `eventDate`, `eventStatus`, `eventLocation`, `eventDescription`, `eventPicture`, `date_created`) VALUES
(1, 'EVENT65d465059f14f', 'Alumni Socials', '2024-04-20', 2, 'School Campus', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', 'uploads/events/tabs-3.jpg', '2024-02-20'),
(2, 'EVENT65d4a67f85d2d', 'Araw ng Parangal', '2024-03-23', 1, 'School Campus', 'It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'uploads/events/tabs-4.jpg', '2024-02-20'),
(3, 'EVENT65d4a6c8e573d', 'Friendly Sports Game', '2024-06-19', 2, 'School Grounds', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', 'uploads/events/tabs-2.jpg', '2024-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone_num` varchar(50) NOT NULL,
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

INSERT INTO `faculty` (`id`, `firstname`, `middlename`, `lastname`, `email`, `phone_num`, `designation`, `hs_type`, `grade`, `sect_subj`, `profile_picture`, `date_created`) VALUES
(1, 'Juana', 'Reyes', 'Dela Cruz', 'juanadc@gmail.com', '09123456789', 'Teacher III', 'SHS', 11, 'A', 'uploads/SHS/team-4.jpg', '2024-02-18'),
(2, 'Marc John', 'Alejandro', 'Martinez', 'marcjohn_martinez@gmail.com', '09234567890', 'Teacher I', 'JHS', 7, 'A', 'uploads/JHS/team-1.jpg', '2024-02-18'),
(3, 'Phil Ernest', 'Nietes', 'Luces', 'penietes@gmail.com', '09123245565', 'Master Teacher I', 'SHS', 12, 'Mathematics', 'uploads/SHS/team-3.jpg', '2024-02-19'),
(4, 'Jessica Marie', 'Buena', 'Robles', 'jmbuena@gmail.com', '09874563241', 'Master Teacher I', 'SHS', 11, 'A / Science', 'uploads/SHS/team-2.jpg', '2024-02-19'),
(5, 'Louise Anne', 'Kim', 'Hernandez', 'louiseann.h@gmail.com', '09163578564', 'Master Teacher I', 'JHS', 9, 'A / Psychology', 'uploads/JHS/team-2.jpg', '2024-02-19'),
(6, 'Bryan', 'Dela Cruz', 'Manalo', 'bryanmanalo@gmail.com', '09464793342', 'Master Teacher II', 'JHS', 10, 'Programming', 'uploads/JHS/team-3.jpg', '2024-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `newsCode` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `publication_date` date NOT NULL,
  `newsStatus` int(11) NOT NULL,
  `newsPicture` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `newsCode`, `title`, `content`, `publication_date`, `newsStatus`, `newsPicture`, `date_created`) VALUES
(1, 'NEWS65d48cb4a1f52', 'New School Website is Coming!!!', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2024-02-20', 1, 'uploads/news/tabs-1.jpg', '2024-02-20 11:27:48'),
(2, 'NEWS65d4a7109812d', 'School Library to be Renovated', 'Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \\\"de Finibus Bonorum et Malorum\\\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \\\"Lorem ipsum dolor sit amet..\\\", comes from a line in section 1.10.32.', '2024-02-08', 1, 'uploads/news/blog-recent-4.jpg', '2024-02-20 13:20:16'),
(3, 'NEWS65d4a73ae3da1', 'Artist ng Eskwelahan!', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \\\"de Finibus Bonorum et Malorum\\\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2024-02-14', 1, 'uploads/news/blog-recent-3.jpg', '2024-02-20 13:20:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni_jhs`
--
ALTER TABLE `alumni_jhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumni_shs`
--
ALTER TABLE `alumni_shs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batchyear`
--
ALTER TABLE `batchyear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni_jhs`
--
ALTER TABLE `alumni_jhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alumni_shs`
--
ALTER TABLE `alumni_shs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `batchyear`
--
ALTER TABLE `batchyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
