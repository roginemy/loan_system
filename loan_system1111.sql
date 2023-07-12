-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 04:02 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loan_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `ID` int(20) NOT NULL,
  `USER_ID` int(20) NOT NULL,
  `BALANCE` int(100) NOT NULL,
  `TOTAL_BALANCE` int(100) NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `ID` int(20) NOT NULL,
  `USER_ID` int(20) NOT NULL,
  `FNAME` varchar(50) NOT NULL,
  `LNAME` varchar(50) NOT NULL,
  `MIDDLE` varchar(50) NOT NULL,
  `AGE` varchar(50) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `OCCUPATION` varchar(100) NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `AMOUNT` int(50) NOT NULL,
  `WORD` varchar(100) NOT NULL,
  `DATE` date NOT NULL,
  `LOAN_USED` varchar(100) NOT NULL,
  `INTEREST` varchar(20) NOT NULL,
  `AGREEMENT_1` text NOT NULL,
  `AGREEMENT_2` text NOT NULL,
  `AGREEMENT_3` text NOT NULL,
  `AGREEMENT_4` text NOT NULL,
  `AGREEMENT_5` text NOT NULL,
  `VALID_ID` varchar(255) NOT NULL,
  `STATUS` text NOT NULL,
  `DATE_SUBMITTED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`ID`, `USER_ID`, `FNAME`, `LNAME`, `MIDDLE`, `AGE`, `ADDRESS`, `OCCUPATION`, `PHONE`, `EMAIL`, `AMOUNT`, `WORD`, `DATE`, `LOAN_USED`, `INTEREST`, `AGREEMENT_1`, `AGREEMENT_2`, `AGREEMENT_3`, `AGREEMENT_4`, `AGREEMENT_5`, `VALID_ID`, `STATUS`, `DATE_SUBMITTED`) VALUES
(1, 3, 'jerold', 'quiamco', 's', '21', 'Mancilang Madridejos Cebu', 'fisherman', '90911230912', 'jeroldquiamco@gmail.com', 20000, 'twenty thousand', '2023-07-15', 'Motorbike Repair', 'Agree', 'Agree', 'Agree', '', '', '', 'brusko.webp', 'paid', '2023-07-09 07:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `loan_infos`
--

CREATE TABLE `loan_infos` (
  `ID` int(11) NOT NULL,
  `agreement_1` varchar(255) NOT NULL,
  `agreement_2` varchar(255) NOT NULL,
  `agreement_3` varchar(255) NOT NULL,
  `agreement_4` varchar(255) NOT NULL,
  `agreement_5` varchar(255) NOT NULL,
  `interest` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_infos`
--

INSERT INTO `loan_infos` (`ID`, `agreement_1`, `agreement_2`, `agreement_3`, `agreement_4`, `agreement_5`, `interest`) VALUES
(1, 'To pay the money i borrow is my obligation, I will pay the 20% interest inside a week on 6weeks long.', 'I agree that this agreement will reach the legal talks (Barangay),(Court), if I don\'t fulfill the day we agreed.', '', '', '', '0.20');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `ID` int(20) NOT NULL,
  `USER_ID` int(20) NOT NULL,
  `AMOUNT` int(100) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`ID`, `USER_ID`, `AMOUNT`, `DATE`) VALUES
(1, 3, 4000, '2023-07-08 18:36:05'),
(2, 3, 4000, '2023-07-09 05:25:45'),
(3, 3, 4000, '2023-07-09 06:15:16'),
(4, 3, 4000, '2023-07-09 10:17:39'),
(5, 3, 4000, '2023-07-09 13:32:01'),
(6, 3, 4000, '2023-07-09 13:46:42'),
(7, 3, 4000, '2023-07-09 14:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_ID` int(20) NOT NULL,
  `LEVEL` int(10) NOT NULL,
  `FNAME` text NOT NULL,
  `LNAME` text NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `PROFILE_IMG` varchar(255) NOT NULL,
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `LEVEL`, `FNAME`, `LNAME`, `EMAIL`, `PASSWORD`, `PROFILE_IMG`, `CREATED`) VALUES
(1, 1, 'ADMIN', 'ADMIN', 'admin@gmail.com', 'admin123', 'brusko.webp', '2023-07-08 05:38:34'),
(2, 2, 'jerold', 'quiamco', 'jeroldquiamco02@gmail.com', 'JEROLD123', 'brusko.webp', '2023-07-07 13:42:59'),
(3, 2, 'jerold', 'quiamco', 'jeroldquiamco@gmail.com', 'jeroldquiamco', 'brusko.webp', '2023-07-07 13:41:36'),
(4, 2, 'jerold', 'quiamco', 'jerold@gmail.com', 'jerold123', 'brusko.webp', '2023-07-08 12:21:34'),
(5, 2, 'Jerold', 'Quiamco ', 'jeroldquiamco23@gmail.com', 'jjmonka123', 'inbound1078964287284338169.jpg', '2023-07-09 07:30:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `loan_infos`
--
ALTER TABLE `loan_infos`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `loan_infos`
--
ALTER TABLE `loan_infos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
