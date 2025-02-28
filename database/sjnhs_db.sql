-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2025 at 06:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `track` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `current_company_bus` varchar(255) NOT NULL,
  `marital_stat` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `user_status` varchar(255) NOT NULL,
  `is_online` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'o=false, 1=true',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `alumni_jhs`
--

INSERT INTO `alumni_jhs` (`id`, `alumni_id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `phone_num`, `year_graduated`, `section`, `track`, `profession`, `current_company_bus`, `marital_stat`, `address`, `profile_picture`, `user_status`, `is_online`, `date_created`) VALUES
(1, 'ALUM65d4226839559', 'Juan', 'Buena', 'Dela Cruz', 'juandc@gmail.com', '$2y$10$44clnUCFFD9PL3fEqxRNRuEJy2heY3jYQL2D9.TIoOc9eNCO.kPwq', '091265488795', '2020', 'A', 'JHS', 'Freelancer', 'VA Advertising Agency', 'Single', 'Oton, Iloilo City', 'uploads/JHS/ALUM65d4226839559_team-3.jpg', '1', 0, '2024-02-20 03:54:16'),
(2, 'ALUM65d4a8e3ab34b', 'Jane Joane', 'Angeles', 'Elizalde', 'jj.angeles@gmail.com', '$2y$10$QGIU2jyNhFT.5YZhqHdEw.P7D7Bjgnmp4UXGZizul6I9XzlsGjwqa', '09456775634', '2020', 'C', 'JHS', 'Business Analyst', 'Corporate Bank Inc.', 'Married', 'Quezon City, Manila', 'uploads/JHS/ALUM65d4a8e3ab34b_team-2.jpg', '1', 0, '2024-02-20 13:28:03'),
(3, 'ALUM663e1624a07e7', 'Lucas Marvin', 'Quinto', 'Angel', 'lm.angel@gmail.com', '$2y$10$IZdGUrLAoI8Dt2bAwO2TsOGURE7Iky3wmzd9dl6Wg.YEk/k5eMhHa', 'N/A', '2020', '', 'JHS', 'Nurse', '', 'Single', 'Tibiao, Antique', NULL, '', 0, '2024-05-10 12:42:12'),
(4, 'ALUM663fb429b3579', 'Herman John', 'Wentar', 'Polio', 'hjpolio@gmail.com', '$2y$10$2aDRnkN5wGuN4GLa17/MZevZpkfrj1UfTKDwkAYgGboP62Ey/jntS', 'N/A', '2020', '', 'JHS', 'Pharmacist', '', 'Divorced', 'Tibiao, Antique', NULL, '', 0, '2024-05-11 18:08:41');

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
  `section` varchar(100) NOT NULL,
  `track` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `current_company_bus` varchar(255) NOT NULL,
  `marital_stat` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `user_status` varchar(255) NOT NULL,
  `is_online` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=false, 1=true',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `alumni_shs`
--

INSERT INTO `alumni_shs` (`id`, `alumni_id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `phone_num`, `year_graduated`, `section`, `track`, `profession`, `current_company_bus`, `marital_stat`, `address`, `profile_picture`, `user_status`, `is_online`, `date_created`) VALUES
(1, 'ALUM65d44e8664057', 'Feliza Marie', 'Pedro', 'Lacson', 'felizmarie.lacson@gmail.com', '$2y$10$SgD2AY58hGMh2zo096IAB..LHx30j88Hxn6mdWoefCXyobqSRvX.G', '9798642852', '2020', 'A', 'STEM', 'Mechanical Engineer', 'ABC Robotech Inc.', 'Married', 'Tibao, Antique', 'uploads/SHS/ALUM65d44e8664057_team-4.jpg', '1', 0, '2024-02-20 07:02:30'),
(2, 'ALUM65d4a9b6191e2', 'Angelo', 'Wences', 'Kim', 'angelokim@gmail.com', '$2y$10$CquYqaV4IhVYNjUCjYMjn.F/0312CC0.ECCQ2tVo4n366soEIwpHW', '548747324324', '2020', 'A', 'GAS', 'Teacher', 'Hello World School', 'Widowed', 'Tibiao, Antique', 'uploads/SHS/ALUM65d4a9b6191e2_team-1.jpg', '1', 0, '2024-02-20 13:31:34'),
(3, 'ALUM663e1691703db', 'Jenny Anne', 'Rosario', 'Moscoso', 'jennyanne.r@gmail.com', '$2y$10$PZ5otLf.78PMtMTf2OG6f.p6AJowR6xdJMTHacD1.JCRIWXoQxpZ6', 'N/A', '2020', '', 'STEM', 'Civil Engineer', '', 'Married', 'Tibiao, Antique', '', '', 0, '2024-05-10 12:44:01'),
(4, 'ALUM663e19dd87119', 'Marcus Jey', 'Kalanin', 'Ongsa', 'mjongsa@gmail.com', '$2y$10$85pUGx5HG0mlFrubth2pquJQqUlluORbz/2izFxKYn56MUQPtRdAW', 'N/A', '2021', '', 'SPORTS', 'Teacher', '', 'Single', 'Tibiao, Antique', '', '', 0, '2024-05-10 12:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `batchyear`
--

CREATE TABLE `batchyear` (
  `id` int(11) NOT NULL,
  `batch_year` year(4) NOT NULL,
  `hs_type` varchar(50) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batchyear`
--

INSERT INTO `batchyear` (`id`, `batch_year`, `hs_type`, `date_created`) VALUES
(1, '2020', 'SHS', '2024-02-19'),
(2, '2021', 'SHS', '2024-05-07'),
(3, '2020', 'JHS', '2025-02-06'),
(4, '2021', 'JHS', '2025-02-06');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `msg_id` int(11) NOT NULL,
  `conversationID` varchar(255) NOT NULL,
  `outgoing_msg_id` varchar(255) NOT NULL,
  `msg_content` varchar(1000) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`msg_id`, `conversationID`, `outgoing_msg_id`, `msg_content`, `timestamp`) VALUES
(1, '3', 'ALUM65d4226839559', 'ajdjsad', '2025-02-06 15:41:44'),
(2, '3', 'ALUM65d4226839559', 'jadjjad', '2025-02-06 15:42:11'),
(3, '1', 'ALUM65d44e8664057', 'ahjdhad', '2025-02-06 15:42:45'),
(4, '1', 'ALUM65d44e8664057', 'dajda', '2025-02-06 15:43:04'),
(5, '1', 'ALUM65d4a9b6191e2', 'askdjad', '2025-02-06 15:43:53'),
(6, '1', 'ALUM65d4a9b6191e2', 'Testing', '2025-02-06 15:44:02'),
(7, '1', 'ALUM65d44e8664057', 'nice', '2025-02-06 15:44:17');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventsCode`, `eventName`, `eventDate`, `eventStatus`, `eventLocation`, `eventDescription`, `eventPicture`, `date_created`) VALUES
(1, 'EVENT65d465059f14f', 'Alumni Socials', '2024-10-05', 2, 'School Campus', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', 'uploads/events/tabs-3.jpg', '2024-02-20'),
(2, 'EVENT65d4a67f85d2d', 'Araw ng Parangal', '2024-06-29', 1, 'School Campus', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', 'uploads/events/tabs-4.jpg', '2024-02-20'),
(3, 'EVENT65d4a6c8e573d', 'Friendly Sports Game', '2024-06-19', 2, 'School Grounds', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', 'uploads/events/tabs-2.jpg', '2024-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `event_participants`
--

CREATE TABLE `event_participants` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_code` varchar(50) NOT NULL,
  `joined_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `firstname`, `middlename`, `lastname`, `email`, `phone_num`, `designation`, `hs_type`, `grade`, `sect_subj`, `profile_picture`, `date_created`) VALUES
(1, 'Juana', 'Reyes', 'Dela Cruz', 'juanadc@gmail.com', '09123456789', 'Teacher III', 'SHS', 11, 'A', 'uploads/SHS/team-4.jpg', '2024-02-18'),
(2, 'Marc John', 'Alejandro', 'Martinez', 'marcjohn_martinez@gmail.com', '09234567890', 'Teacher I', 'JHS', 7, 'A', 'uploads/JHS/team-1.jpg', '2024-02-18'),
(3, 'Phil Ernest', 'Nietes', 'Luces', 'penietes@gmail.com', '091232455657', 'Master Teacher I', 'SHS', 12, 'Mathematics', 'uploads/SHS/team-3.jpg', '2024-02-19'),
(4, 'Jessica Marie', 'Buena', 'Robles', 'jmbuena@gmail.com', '09874563241', 'Master Teacher I', 'SHS', 11, 'A / Science', 'uploads/SHS/team-2.jpg', '2024-02-19'),
(5, 'Louise Anne', 'Kim', 'Hernandez', 'louiseann.h@gmail.com', '09163578566', 'Master Teacher I', 'JHS', 9, 'A / Psychology', 'uploads/JHS/team-2.jpg', '2024-02-19'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `newsCode`, `title`, `content`, `publication_date`, `newsStatus`, `newsPicture`, `date_created`) VALUES
(1, 'NEWS65d48cb4a1f52', 'New School Website is Coming!!!', 'We are thrilled to announce the upcoming launch of our new school website dedicated to our esteemed alumni! This platform has been meticulously crafted to serve as a vibrant hub for our alumni community, fostering connections, and celebrating achievements.\r\n\r\nFeaturing a modern design and user-friendly interface, the website will offer a range of exciting features, including:\r\n\r\n-Alumni Directory: Easily connect with fellow alumni and expand your professional network.\r\n-Events and News: Stay updated with the latest news, events, and happenings within the school and alumni community.\r\n-Alumni Stories: Share your success stories and stay inspired by the accomplishments of your peers.\r\n-Exclusive Benefits: Access special alumni benefits, discounts, and services.\r\n\r\nWe invite you to join us for the official launch event, where you can explore the website, reconnect with old friends, and embark on a journey down memory lane. Stay tuned for more details on the launch date and how you can be a part of this exciting new chapter in our alumni community!', '2024-02-20', 1, 'uploads/news/tabs-1.jpg', '2024-02-20 11:27:48'),
(2, 'NEWS65d4a7109812d', 'School Library to be Renovated', 'Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \\\"de Finibus Bonorum et Malorum\\\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \\\"Lorem ipsum dolor sit amet..\\\", comes from a line in section 1.10.32.', '2024-02-08', 1, 'uploads/news/blog-recent-4.jpg', '2024-02-20 13:20:16'),
(3, 'NEWS65d4a73ae3da1', 'Artist ng Eskwelahan!', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \\\"de Finibus Bonorum et Malorum\\\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2024-02-14', 1, 'uploads/news/blog-recent-3.jpg', '2024-02-20 13:20:58'),
(4, 'NEWS6639b51f77010', 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2024-05-07', 1, 'uploads/news/undraw_special_event_4aj8.png', '2024-05-07 04:59:11');

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
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_participants`
--
ALTER TABLE `event_participants`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `alumni_shs`
--
ALTER TABLE `alumni_shs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `batchyear`
--
ALTER TABLE `batchyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_participants`
--
ALTER TABLE `event_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
