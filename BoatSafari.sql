-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 07, 2024 at 08:16 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BoatSafari`
--

-- --------------------------------------------------------

--
-- Table structure for table `Boat`
--

CREATE TABLE `Boat` (
  `Boat_ID` varchar(5) NOT NULL,
  `Boat_status` tinyint(1) DEFAULT NULL,
  `Name` varchar(10) NOT NULL,
  `Capacity` int(2) DEFAULT NULL,
  `Type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Inquiry`
--

CREATE TABLE `Inquiry` (
  `Inquiry_ID` varchar(6) NOT NULL,
  `User_name` varchar(40) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Issue` varchar(300) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `Payment_ID` varchar(10) NOT NULL,
  `User_name` varchar(5) DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Payment_date` date NOT NULL,
  `Payment_method` varchar(10) NOT NULL,
  `Payment_Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Plan`
--

CREATE TABLE `Plan` (
  `Plan_ID` varchar(5) NOT NULL,
  `Catering` tinyint(1) DEFAULT NULL,
  `Camping` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Plan`
--

INSERT INTO `Plan` (`Plan_ID`, `Catering`, `Camping`) VALUES
('PLN01', 0, 0),
('PLN02', 0, 1),
('PLN03', 1, 0),
('PLN04', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Reservation`
--

CREATE TABLE `Reservation` (
  `Booking_ID` varchar(6) NOT NULL,
  `Plan_ID` varchar(5) NOT NULL,
  `User_name` varchar(40) NOT NULL,
  `Number_of_guest` int(2) DEFAULT NULL,
  `Booking_date` date DEFAULT NULL,
  `Total_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

CREATE TABLE `Staff` (
  `Staff_ID` varchar(5) NOT NULL,
  `username` varchar(40) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Salary` decimal(10,2) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Position` varchar(20) NOT NULL,
  `Hire_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Staff`
--

INSERT INTO `Staff` (`Staff_ID`, `username`, `Password`, `Salary`, `Email`, `Position`, `Hire_Date`) VALUES
('SF001', 'Arun', 'Arun123', 100.00, 'arun@gmail.com', 'admin', '2024-10-06'),
('SF002', 'arun', '$2y$10$Z5WY2M./9U8FnjpWQiNvwO7YjNsg.Z/G9BMztz0hbG/E0mLn7kc6y', 123.00, 'ARUN@GMAIL.COM', 'SUPPORT', '2024-10-07');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `User_name` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `First_Name` varchar(40) NOT NULL,
  `Last_Name` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `phoneNumber` int(10) NOT NULL,
  `Registration_Date` date NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Age` int(3) NOT NULL,
  `Active_Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`User_name`, `Password`, `First_Name`, `Last_Name`, `Email`, `phoneNumber`, `Registration_Date`, `Date_of_Birth`, `Age`, `Active_Status`) VALUES
('Adshaya', '$2y$10$8b1MLbRfIqzZmJH8yw2Fm.YS.D3jRCw4YJWmJRwG54tjqu0HFUIL.', 'Adshaya', 'seelan', 'adshaya@gmail.com', 740187981, '2024-10-07', '2003-02-13', 21, 1),
('arun123', '$2y$10$vLLdai9Fqwd.z3VyfZj1aeRPyZN6UUST1ZxGn7/EiUS39LwN7IBfW', 'qwe', 'qwe', 'asd@gmail.s', 1231, '2024-10-06', '2006-01-03', 18, 1),
('asdasd', '$2y$10$8qDlBaagXJffr3b1iBLV9O..AybzlYNMaXJNbBVxz/0RoIu5sktbW', 'asd', 'asdsad', 'asd@asd', 123123, '2024-10-07', '2024-10-01', 0, 1),
('dfgdfg', '$2y$10$cUIrtptJedy4RbtSR73qeO9GOVAjtCp.MgldoN8P0bneNbY4RJYXO', 'dfg', 'dfg', 'dfg@sdf', 123213, '2024-10-07', '2024-10-01', 0, 1),
('qwe', '$2y$10$0qUSMBUBteNfMQeqANEfaue.Es4rzqVVozJuQF0F714ZRsnIliYxS', 'qwe', 'qwe', 'wqe@gmail.com', 1231231231, '2024-10-07', '1997-10-02', 27, 1),
('qweqwe', '$2y$10$BK4RM5t.v3fSjmXue5agHe/H5g6sBkMbcEVwakWG.7nuQ22o0xzB.', 'qwe', 'qwe', 'qwe@gmail.com', 1231231231, '2024-10-07', '1982-10-06', 42, 1),
('tester', '$2y$10$n08L4lbggkMNk6yXLbwckeZOTYRdTVMM5pw9ZiqMWjNTRImhYDW3e', 'test', 'checker', 'tester@gmail.com', 987654321, '2024-10-07', '2002-02-06', 22, 1),
('tester2', '$2y$10$r2Z.mQVBqbvxDu5JgUNHqe1md/4yWzSRRUvGjMh7c13Ko4Tgu83sW', 'tester', 'check', 'tester@gmail.com', 987654321, '2024-10-07', '2002-05-08', 22, 1),
('testing', '$2y$10$uT6zq0OmXpgqEI/DbGHKee75Y5yZ8fvjbUaaieNeSzUvqgjecM7vG', '123', '123', '123@g', 123, '2024-10-06', '2024-10-01', 0, 1),
('tharmini', '$2y$10$3mnhAv78m2X2v1hA9y26kun8hAerNUntNSOwjOKz1345w.uEGfuSa', 'kenuja sarwes', 'jasmina sarwes', 'kenu@gmail.com', 786883966, '2024-10-07', '1990-10-25', 33, 1),
('vivi', '$2y$10$rGVrNex.2aldHfADoRnH2ut25jMscKjTOkOABeY2YP1LnXlfkNlqC', 'vivi', 'yan', 'vivi@yan.com', 1231231231, '2024-10-07', '1969-10-01', 55, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Boat`
--
ALTER TABLE `Boat`
  ADD PRIMARY KEY (`Boat_ID`);

--
-- Indexes for table `Inquiry`
--
ALTER TABLE `Inquiry`
  ADD PRIMARY KEY (`Inquiry_ID`),
  ADD KEY `User_name` (`User_name`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `User_name` (`User_name`);

--
-- Indexes for table `Plan`
--
ALTER TABLE `Plan`
  ADD PRIMARY KEY (`Plan_ID`);

--
-- Indexes for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`Booking_ID`),
  ADD KEY `User_name` (`User_name`),
  ADD KEY `reservation_ibfk_4` (`Plan_ID`);

--
-- Indexes for table `Staff`
--
ALTER TABLE `Staff`
  ADD PRIMARY KEY (`Staff_ID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`User_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Inquiry`
--
ALTER TABLE `Inquiry`
  ADD CONSTRAINT `inquiry_ibfk_1` FOREIGN KEY (`User_name`) REFERENCES `User` (`User_name`) ON DELETE CASCADE;

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`User_name`) REFERENCES `User` (`User_name`) ON DELETE CASCADE;

--
-- Constraints for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`User_name`) REFERENCES `User` (`User_name`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_4` FOREIGN KEY (`Plan_ID`) REFERENCES `Plan` (`Plan_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
