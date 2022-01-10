-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2021 at 05:10 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busreservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `BusId` int(11) NOT NULL,
  `BusNo` varchar(10) NOT NULL,
  `BusType` varchar(50) NOT NULL,
  `TotalSeats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`BusId`, `BusNo`, `BusType`, `TotalSeats`) VALUES
(5, 'VHR2019', 'Small', 40),
(6, 'VVL345', 'Small', 40),
(7, 'QUT7895', 'Large', 72),
(8, 'GHY8923', 'Large', 72),
(9, 'HGY9384', 'Small', 40),
(10, 'KRW7866', 'Large', 72),
(11, 'VKL651', 'Small', 40),
(12, 'VRM2341', 'Small', 40),
(13, 'QWT4090', 'Large', 72),
(14, 'VVR6751', 'Small', 40);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `ReservationId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ScheduleId` int(11) NOT NULL,
  `SeatNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`ReservationId`, `UserId`, `ScheduleId`, `SeatNo`) VALUES
(23, 52, 26, 1),
(24, 52, 30, 1),
(25, 52, 37, 1),
(26, 51, 31, 1),
(27, 51, 31, 2),
(28, 51, 34, 1),
(29, 51, 34, 2),
(30, 49, 27, 1),
(31, 49, 38, 1),
(32, 50, 26, 2),
(33, 50, 26, 3),
(34, 50, 26, 4),
(35, 50, 35, 1),
(36, 50, 35, 2),
(37, 50, 35, 3),
(38, 53, 33, 1),
(39, 53, 26, 5),
(40, 52, 35, 4);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `ScheduleId` int(11) NOT NULL,
  `Origin` varchar(50) NOT NULL,
  `Destination` varchar(50) NOT NULL,
  `Departure_time` time NOT NULL,
  `Fare` int(11) NOT NULL,
  `BusId` int(11) NOT NULL,
  `Dep_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`ScheduleId`, `Origin`, `Destination`, `Departure_time`, `Fare`, `BusId`, `Dep_Date`) VALUES
(26, 'Multan', 'Burewala', '08:00:00', 210, 5, '2021-08-17'),
(27, 'Burewala', 'Multan', '13:30:00', 210, 5, '2021-08-17'),
(28, 'Multan', 'Burewala', '18:30:00', 210, 6, '2021-08-17'),
(30, 'Burewala', 'Multan', '21:00:00', 210, 6, '2021-08-17'),
(31, 'Multan', 'Rawalpindi', '15:00:00', 1700, 7, '2021-08-17'),
(32, 'Rawalpindi', 'Multan', '12:30:00', 1700, 7, '2021-08-18'),
(33, 'Multan', 'Rawalpindi', '21:00:00', 1700, 8, '2021-08-17'),
(34, 'Rawalpindi', 'Multan', '22:00:00', 1700, 8, '2021-08-18'),
(35, 'Burewala', 'Rawalpindi', '08:00:00', 1600, 10, '2021-08-17'),
(36, 'Rawalpindi', 'Burewala', '14:00:00', 1600, 10, '2021-08-18'),
(37, 'Burewala', 'Rawalpindi', '21:30:00', 1600, 13, '2021-08-17'),
(38, 'Rawalpindi', 'Burewala', '17:00:00', 1600, 13, '2021-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(20) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Pin` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `UserName`, `Pin`, `Email`) VALUES
(1, 'admin', 'admin', 'admin@admin.com'),
(49, 'Umaid Khalid', '123', 'Umaidkhalid85@gmail.com'),
(50, 'Ubaid Akmal', '123', 'baidakmal20@gmail.com'),
(51, 'Fahad Naeem', '123', 'fahadnaeem424@gmail.com'),
(52, 'Talha Sajid', '123', 'talhasajid048@gmail.com'),
(53, 'Owais', '123', 'MOwaisch@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`BusId`),
  ADD UNIQUE KEY `BusNo` (`BusNo`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ReservationId`),
  ADD KEY `ScheduleId` (`ScheduleId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`ScheduleId`),
  ADD KEY `BusId` (`BusId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `BusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ReservationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `ScheduleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`ScheduleId`) REFERENCES `schedule` (`ScheduleId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`BusId`) REFERENCES `bus` (`BusId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
