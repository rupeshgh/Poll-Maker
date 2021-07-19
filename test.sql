-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 03:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `SN` int(6) NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `Lastname` varchar(30) NOT NULL,
  `Poll_Name` varchar(30) NOT NULL,
  `poll_pass` varchar(500) NOT NULL,
  `admin_pass` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`SN`, `Firstname`, `Lastname`, `Poll_Name`, `poll_pass`, `admin_pass`) VALUES
(95, 'rupesh', 'ghorashainee', 'Best_Sports', '$2y$10$jYKSF4WXMg90Odrstb087OEEI4tyz8hf/NO/0GGMDzLmrebQnUe4S', '$2y$10$6uB6nmsveZQD.duDASFsDu9L4MzVgolBea3yVZRERornoxwXLFTpe'),
(96, 'rizuta', 'pokhrel', 'photo_of_the_year', '$2y$10$l8Bbf3XKbDX5DfJH2J9.DuyB/zcvHdrPlpwVl9gzLplywM0PEuDUC', '$2y$10$1YYRdxp6aoUf5kVIRIM1OutbeWRRrfA0trk9Alym.kfzaS0krg3Wi');

-- --------------------------------------------------------

--
-- Table structure for table `best_sports`
--

CREATE TABLE `best_sports` (
  `Id` int(11) DEFAULT NULL,
  `votername` varchar(30) DEFAULT NULL,
  `voterlastname` varchar(30) DEFAULT NULL,
  `vote_status` tinyint(1) DEFAULT 0,
  `ban_status` tinyint(1) DEFAULT 0,
  `active_status` tinyint(1) DEFAULT 0,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `best_sports`
--

INSERT INTO `best_sports` (`Id`, `votername`, `voterlastname`, `vote_status`, `ban_status`, `active_status`, `last_activity`) VALUES
(99, 'asmin', 'thapa', 1, 0, 0, '2021-02-25 04:39:29'),
(96, 'rizuta', 'pokhrel', 1, 0, 0, '2021-02-25 02:05:36'),
(97, 'shreya', 'shrestha', 1, 0, 0, '2021-02-25 02:06:44'),
(98, 'samip', 'khanal', 1, 0, 0, '2021-02-25 02:07:37'),
(101, 'saugat', 'acharya', 1, 0, 0, '2021-02-25 04:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photo_of_the_year`
--

CREATE TABLE `photo_of_the_year` (
  `Id` int(11) DEFAULT NULL,
  `votername` varchar(30) DEFAULT NULL,
  `voterlastname` varchar(30) DEFAULT NULL,
  `vote_status` tinyint(1) DEFAULT 0,
  `ban_status` tinyint(1) DEFAULT 0,
  `active_status` tinyint(1) DEFAULT 0,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo_of_the_year`
--

INSERT INTO `photo_of_the_year` (`Id`, `votername`, `voterlastname`, `vote_status`, `ban_status`, `active_status`, `last_activity`) VALUES
(101, 'saugat', 'acharya', 0, 0, 0, '2021-02-25 05:07:42'),
(98, 'samip', 'khanal', 0, 0, 0, '2021-02-25 05:08:25'),
(97, 'shreya', 'shrestha', 0, 0, 0, '2021-02-25 05:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `id` int(11) NOT NULL,
  `Poll_Name` varchar(255) NOT NULL,
  `Poll_Type` varchar(255) NOT NULL,
  `Total_Entries` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `c1` varchar(250) NOT NULL,
  `c2` varchar(250) NOT NULL,
  `c3` varchar(250) DEFAULT NULL,
  `c4` varchar(250) DEFAULT NULL,
  `c5` varchar(250) DEFAULT NULL,
  `c1_value` int(11) NOT NULL,
  `c2_value` int(11) NOT NULL,
  `c3_value` int(11) NOT NULL,
  `c4_value` int(11) NOT NULL,
  `c5_value` int(11) NOT NULL,
  `c1_image` varchar(255) NOT NULL,
  `c2_image` varchar(255) NOT NULL,
  `c3_image` varchar(255) NOT NULL,
  `c4_image` varchar(255) NOT NULL,
  `c5_image` varchar(255) NOT NULL,
  `Creation_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Reg_deadline` timestamp NOT NULL DEFAULT current_timestamp(),
  `poll_start` timestamp NOT NULL DEFAULT current_timestamp(),
  `poll_end` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`id`, `Poll_Name`, `Poll_Type`, `Total_Entries`, `Password`, `c1`, `c2`, `c3`, `c4`, `c5`, `c1_value`, `c2_value`, `c3_value`, `c4_value`, `c5_value`, `c1_image`, `c2_image`, `c3_image`, `c4_image`, `c5_image`, `Creation_time`, `Reg_deadline`, `poll_start`, `poll_end`) VALUES
(1, 'Best_Sports', 'Free', 5, '$2y$10$jYKSF4WXMg90Odrstb087OEEI4tyz8hf/NO/0GGMDzLmrebQnUe4S', 'football', 'cricket', 'tennis', 'rugby', 'golf', 5, 0, 0, 0, 0, 'football.jpg', 'cricket.jpg', 'tennis.jpg', 'rugby.jpg', 'golf.jpg', '2021-02-25 04:47:01', '2021-02-25 04:35:00', '2021-02-25 04:40:00', '2021-02-25 05:00:00'),
(3, 'photo_of_the_year', 'Free', 5, '$2y$10$l8Bbf3XKbDX5DfJH2J9.DuyB/zcvHdrPlpwVl9gzLplywM0PEuDUC', 'By_sushan', 'By_rizuta', 'By_Ram', 'By_shreya', 'By_Asmin', 0, 0, 0, 0, 0, '1.jpeg', '2.jpg', '3.jpg', '4.png', '5.jpg', '2021-02-25 05:06:54', '2021-02-25 05:10:00', '2021-02-25 05:18:00', '2021-02-25 07:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `otp` varchar(500) NOT NULL,
  `verification` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `firstname`, `lastname`, `email`, `password`, `otp`, `verification`) VALUES
(95, 'rupesh', 'ghorashainee', 'rupeshghorashainee@gmail.com', '$2y$10$.12JCaFSB3i..NuZGR7RAODqlrxE604C1qiD59VLTeucU8MErhjCO', '900535', 1),
(96, 'rizuta', 'pokhrel', 'rshiju11@gmail.com', '$2y$10$NAtfa7i5yDFyMO2Fti1Xk.keJRsBcZbKvjT.GWZV/lKwxWRb2nEfa', '752856', 1),
(97, 'shreya', 'shrestha', 'shreya.shrestha1999@gmail.com', '$2y$10$pPCwcFAlzc5LF/SmXrSBP.LIyws96nFDuOD17z/nfcNHXLxYp29Jm', '963429', 1),
(98, 'samip', 'khanal', 'Sameepkhanal77@gmail.com', '$2y$10$9T4wn5ZWunSHh.q3sCvjYOL1UFYnAuIAbpdCfm0crS6gXnSAdFQUe', '882874', 1),
(99, 'asmin', 'thapa', 'thapa27asmin@gmail.com', '$2y$10$OqHoYPcDXDi3CtMQRvwOO..EykZ0izrK7hde8MKbcXprMW45bYb/G', '$2y$10$tM8dViRszG9crezZo/3LW.C5VbWtaOzOzyd4RLIYaS0dwAj9dRtwO', 1),
(101, 'saugat', 'acharya', 'saugatacharya789@gmail.com', '$2y$10$DOCMNN5nc3zg4RgBBw5QKuHt2Ty58RMgiXfqjsKD6u.E4HO5s7Tkq', '$2y$10$zOYSLjXtcYAtjQ5/M5ctU.ooiejasS7EEkYApUKI8oMHkDht7NoVW', 1),
(102, 'sulav', 'regmi', 'sulav.regmi44@gmail.com', '$2y$10$p4zKVBObJ5vxmno6IZ3m6.N67ucptaVnv6vAPl9LJ3iVpYMn6tWZm', '$2y$10$iQ.3tcJNf0Y/kXmON4HdruJUvrD33IpENiht/zqYBkE1XnX0aozbq', 1),
(103, 'sapana', 'thakulla', 'drmsapana026@gmail.com', '$2y$10$Lwd40928Vs2DHtE.89QRauorhz2DA5/TaSLhLDSYrHy/5hJalxoi6', '$2y$10$e8k5C76n0dHLCsJ/tPz4E.s11T6Awpms2GrfAxVA18dEDj4RJkoFq', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Poll_Name`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
