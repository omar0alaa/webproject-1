-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 10:58 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` varchar(8) NOT NULL,
  `lecturer_name` varchar(100) DEFAULT NULL,
  `roomnumber` varchar(8) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `purpose` varchar(600) DEFAULT NULL,
  `comment` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `lecturer_name`, `roomnumber`, `status`, `time_start`, `time_end`, `purpose`, `comment`) VALUES
('L001', 'Dr. Syed Madani', 'BK7', 'Pending', '12:00:00', '14:00:00', 'Class SECJ3645', ''),
('L002', 'Dr. Lizawati', 'NGA-28', 'Pending', '12:00:00', '14:00:00', 'Class SECJ1452', ''),
('L003', 'Dr. Sahidah', 'BK3', 'Pending', '14:00:00', '16:00:00', 'Class SECJ3452', ''),
('L004', 'Dr. Lee Chan', 'BK9', 'Pending', '18:00:00', '20:00:00', 'Class SECJ5685', ''),
('L005', 'Dr. Rohani', 'BK2', 'Pending', '08:00:00', '12:00:00', 'Class SECJ5685', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `smatric` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` int(13) DEFAULT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `smatric`, `email`, `phone`, `level`) VALUES
(1, 'admin', 'admin', 'A19EC8823', 'admin@gmail.com', 1163251045, 'Admin'),
(2, 'laiza', 'laiza', 'A19EC9623', 'laiza@athena.com', 1163251685, 'Lecturer'),
(3, 'syid', 'syid', 'A19EC8966', 'syid@hotmail.com', 1163259826, 'Space Manager'),
(27, 'Zhang', '2345', 'A123CS592', 'zhang@gmail.com', 13413421, 'Admin'),
(29, 'Omar', '1234', 'A19ES1110', 'omar@gmail.com', 123199120, 'Space Manager'),
(30, 'Elinor', '011231', 'S13CS0119', 'elinor@gamil.com', 121912421, 'Admin'),
(31, 'Salem', 'ab121', 'A19EC2001', 'salem@gmail.com', 191134101, 'Lecturer'),
(32, 'Mohammed', 'mohammed', 'A19EC5962', 'mohammed@gmail.com', 114562892, 'Lecturer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
