-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2022 at 08:05 AM
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
-- Database: `drp`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(255) NOT NULL,
  `f_pre` varchar(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` varchar(11) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `checkup_no` int(11) DEFAULT NULL,
  `rdate` varchar(25) NOT NULL,
  `payment` varchar(7) NOT NULL,
  `chno` varchar(15) NOT NULL,
  `fee` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `f_pre`, `name`, `dob`, `gender`, `checkup_no`, `rdate`, `payment`, `chno`, `fee`) VALUES
(1, 'smt.', 'Manu sharma', '2003-12-11', 'M', NULL, '2022-06-29', 'cash', '', 300),
(2, 'Shri', 'harshit varshney', '2003-12-11', 'M', NULL, '2022-06-29', 'cash', '', 300),
(8, '', 'harshit varshney', '2003-12-11', 'M', NULL, '2022-07-02', 'cash', '', 300),
(9, '', 'harshit varshney', '2003-12-11', 'M', NULL, '2022-07-02', 'cash', '', 300),
(10, '', 'HARSHIT VARSHNEY S/O GOPAL SHANKAR VARSHNEY', '2003-12-11', 'M', NULL, '2022-07-06', 'cash', '', 300),
(11, '', 'Aryan Shivhare', '2000-12-11', 'M', NULL, '2022-07-06', 'cheque', '123456789521471', 300),
(12, 'ku.', 'vaishnavi dubey', '2003-12-11', 'F', NULL, '2022-07-06', 'cheque', '123456789521471', 300),
(13, '', 'aaravardhan singh rajawat', '2002-05-04', 'O', NULL, '2022-07-06', 'cash', '', 300),
(14, '', 'yuvraj singh', '2000-12-10', 'F', NULL, '2022-07-06', 'cheque', '123456789521471', 300),
(15, '', 'dep singh', '1962-01-22', 'O', NULL, '2022-07-06', 'cheque', '123456789521471', 300),
(16, '', 'harsh raj', '2002-12-11', 'M', NULL, '2022-07-06', 'cash', '', 300),
(111111115, '', 'harshit varshney', '2003-12-11', 'M', NULL, '2022-07-05', 'cheque', '123456789521471', 300),
(111111116, '', 'aravardhan singh rajawat', '2002-12-11', 'O', NULL, '2022-07-05', 'cheque', '123456789521471', 300),
(111111117, '', 'Aryan Shivhare', '2000-12-11', 'M', NULL, '2022-07-10', 'cash', '', 300),
(111111118, '', 'harshit', '2003-11-12', 'M', NULL, '2002-11-10', 'cheque', '123456789521471', 300),
(111111119, '', 'harsh', '2003-11-12', 'M', NULL, '2022-07-06', 'cash', '', 300),
(111111120, '', 'Krishna Varshney', '2000-12-11', 'M', NULL, '2022-07-11', 'cash', '', 300),
(111111121, '', 'Aryan Shivhare', '2000-12-11', 'O', NULL, '2022-07-11', 'cheque', '123456789521471', 300),
(111111122, '', 'Krishna Varshney', '2003-12-11', 'M', NULL, '2022-07-11', 'cash', '', 300),
(111111123, '', 'Aryan Shivhare', '2000-12-11', 'F', NULL, '2022-07-11', 'cash', '', 300),
(111111124, 'shri', 'Aryan Shivhare', '1971-12-11', 'M', 5, '2022-07-11', 'cash', '', 300),
(111111127, 'Shri', 'HARSHIT VARSHNEY S/O GOPAL SHANKAR VARSHNEY', '2000-12-11', 'M', 1, '2022-07-21', 'cash', '', 300),
(111111130, 'Shri', 'harshit', '2000-12-11', 'M', 1, '2022-07-28', 'cash', '', 300),
(111111131, 'Shri', 'HARSHIT VARSHNEY S/O GOPAL SHANKAR VARSHNEY', '2003-12-11', 'M', 1, '2022-08-20', 'cash', '', 300),
(111111132, 'Shri', 'HARSHIT VARSHNEY S/O GOPAL SHANKAR VARSHNEY', '2003-12-11', 'M', 1, '2022-08-21', 'cash', '', 0),
(111111133, 'Shri', 'HARSHIT VARSHNEY S/O GOPAL SHANKAR VARSHNEY', '2000-12-11', 'M', 2, '2022-08-21', 'cash', '', 0),
(111111134, 'Shri', 'Krishna Varshney', '2003-12-11', 'M', 3, '2022-08-21', 'cash', '', 300),
(111111135, 'Shri', 'HARSHIT VARSHNEY ', '2003-12-11', 'M', 4, '2022-08-21', 'cheque', '123456789', 500);

-- --------------------------------------------------------

--
-- Table structure for table `patient_treatment`
--

CREATE TABLE `patient_treatment` (
  `id` int(255) NOT NULL,
  `f_pre` varchar(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` varchar(11) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `checkup_no` int(11) DEFAULT NULL,
  `rdate` varchar(25) NOT NULL,
  `payment` varchar(7) NOT NULL,
  `chno` varchar(15) NOT NULL,
  `oct` varchar(7) NOT NULL,
  `ffa` varchar(7) NOT NULL,
  `prp` varchar(7) NOT NULL,
  `noprp` int(1) DEFAULT NULL,
  `sectoral` varchar(7) NOT NULL,
  `nosectoral` int(1) DEFAULT NULL,
  `barrage` varchar(7) NOT NULL,
  `nobarrage` int(1) DEFAULT NULL,
  `yaglaser` varchar(7) NOT NULL,
  `bscan` varchar(7) NOT NULL,
  `fphoto` varchar(7) NOT NULL,
  `cct` varchar(7) NOT NULL,
  `perimetry` varchar(7) NOT NULL,
  `yagpi` varchar(7) NOT NULL,
  `antivegf` varchar(5) NOT NULL,
  `ranieyeinj` varchar(7) NOT NULL,
  `rajumabinj` varchar(7) NOT NULL,
  `glaucomaworkup` varchar(7) NOT NULL,
  `iolworkup` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_treatment`
--

INSERT INTO `patient_treatment` (`id`, `f_pre`, `name`, `dob`, `gender`, `checkup_no`, `rdate`, `payment`, `chno`, `oct`, `ffa`, `prp`, `noprp`, `sectoral`, `nosectoral`, `barrage`, `nobarrage`, `yaglaser`, `bscan`, `fphoto`, `cct`, `perimetry`, `yagpi`, `antivegf`, `ranieyeinj`, `rajumabinj`, `glaucomaworkup`, `iolworkup`) VALUES
(111111148, 'Shri', 'Harshit Varshney', '2003-12-11', 'M', 1, '2022-07-27', 'cash', '', '1600', '1000', '1500', 2, '3000', 1, '3000', 1, '1600', '600', '500', '300', '1000', '2000', '', '7000', '16000', '3000', '3000'),
(111111149, 'Shri', 'harsh Varshney', '2003-12-11', 'M', 2, '2022-07-27', 'cash', '', '1600', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', ''),
(111111150, 'Smt.', 'Krishna Varshney', '1971-09-04', 'F', 1, '2022-07-28', 'cash', '', '', '', '', 0, '', 0, '', 0, '', '', '', '', '', '', '7000', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `sno` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `rate` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`sno`, `name`, `rate`) VALUES
(1, 'oct', 1600),
(2, 'ffa', 1000),
(3, ' green laser prp', 1500),
(4, ' green laser sectoral laser', 3000),
(5, 'yag laser', 1600),
(6, 'b scan', 600),
(7, 'f. photo', 500),
(8, 'cct', 300),
(9, 'perimetory', 1000),
(10, 'yag pi', 2000),
(11, 'RANIEYE INJ.', 7000),
(12, 'glaucoma work up', 3000),
(13, 'iol workup', 3000),
(14, 'RAJUMAB INJ', 16000),
(15, 'barrage', 3000),
(16, 'ANTIVEGF INJ', 7000),
(17, 'checkup', 500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `access_level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `password`, `emailid`, `access_level`) VALUES
(1, 'admin', 'Harshit Varshney', '0044deeec43ded19b952125079eb1781', 'harshitvarshney39@gmail.com', 'admin'),
(2, 'shiv', '', '0044deeec43ded19b952125079eb1781', 'shivvardhan53@gmail.com', 'admin'),
(3, 'harsh', '', '0044deeec43ded19b952125079eb1781', 'harsh@gmail.com', 'user'),
(17, 'heeru', 'heeru', '571f40019883d9e6a3c92003aba8706a', 'heeru@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_treatment`
--
ALTER TABLE `patient_treatment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111111136;

--
-- AUTO_INCREMENT for table `patient_treatment`
--
ALTER TABLE `patient_treatment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111111151;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
