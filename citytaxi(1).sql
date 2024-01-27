-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 27, 2024 at 06:07 PM
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
-- Database: `citytaxi`
--

-- --------------------------------------------------------

--
-- Table structure for table `hire`
--

CREATE TABLE `hire` (
  `clientuuid` varchar(250) NOT NULL,
  `driverid` varchar(250) NOT NULL,
  `locationid` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `uuid` varchar(250) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hire`
--

INSERT INTO `hire` (`clientuuid`, `driverid`, `locationid`, `price`, `status`, `uuid`, `id`) VALUES
('e61ad7a8-938e-4c45-a628-b82849846cc6', '1', '1', '33', 'done', '', 6),
('e61ad7a8-938e-4c45-a628-b82849846cc6', '1', '1', '33', 'done', '3ebf5595-03a7-4685-b56e-3a260f566ff5', 7),
('e61ad7a8-938e-4c45-a628-b82849846cc6', '1', '1', '33', 'done', '6f4d7867-933f-4515-8a4b-ed19d0d28c74', 8),
('e61ad7a8-938e-4c45-a628-b82849846cc6', '1', '1', '33', 'done', '46bd87e6-4254-4d9c-a5a2-96e0e7e87c2e', 9),
('e61ad7a8-938e-4c45-a628-b82849846cc6', '1', '1', '33', 'active', '58dfa7fb-b142-4789-9cd6-cd71e86db960', 10),
('e61ad7a8-938e-4c45-a628-b82849846cc6', '1', '1', '33', 'active', 'c2cb54a3-c015-4495-a86c-a2d47098ee5a', 11),
('e61ad7a8-938e-4c45-a628-b82849846cc6', '1', '1', '33', 'active', '2caea1e0-6bf7-4398-85e5-48ea7b970172', 12);

-- --------------------------------------------------------

--
-- Table structure for table `km`
--

CREATE TABLE `km` (
  `froml` varchar(100) NOT NULL,
  `tol` varchar(100) NOT NULL,
  `distance` int(100) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `km`
--

INSERT INTO `km` (`froml`, `tol`, `distance`, `id`) VALUES
('', '', 0, 0),
('[value-1]', '[value-2]', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `driverid` varchar(250) NOT NULL,
  `rate` varchar(250) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`driverid`, `rate`, `id`) VALUES
('1', '0', 0),
('1', '0', 0),
('1', '0', 0),
('1', '0', 0),
('1', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `taxi`
--

CREATE TABLE `taxi` (
  `driver` varchar(250) NOT NULL,
  `model` varchar(250) NOT NULL,
  `availability` varchar(250) NOT NULL,
  `price` int(100) NOT NULL,
  `uuid` varchar(250) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taxi`
--

INSERT INTO `taxi` (`driver`, `model`, `availability`, `price`, `uuid`, `id`) VALUES
('[value-1]', '[value-2]', 'Active', 11, 'e62ad7a8-938e-4c45-a628-b82849846cc6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(250) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uname`, `password`, `email`, `role`, `uuid`, `id`) VALUES
('test', 'test', 'test@yahoo.com', 'client', 'e61ad7a8-938e-4c45-a628-b82849846cc6', 2),
('taxi', 'taxi', 'taxi@yahoo.com', 'taxi', 'e62ad7a8-938e-4c45-a628-b82849846cc6', 3),
('tel', 'tel', 'taxi@yahoo.com', 'telphone', 'e62ad7a8-938e-4c45-a628-b82849846cc2', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hire`
--
ALTER TABLE `hire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `km`
--
ALTER TABLE `km`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxi`
--
ALTER TABLE `taxi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hire`
--
ALTER TABLE `hire`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `taxi`
--
ALTER TABLE `taxi`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
