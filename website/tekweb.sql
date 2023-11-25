-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2023 at 05:04 AM
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
-- Database: `tekweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `birth` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `nama_lengkap`, `email`, `phone`, `birth`, `address`, `password`) VALUES
('xneine', 'Alan Jonathan Raharjo', 'c14220291@john.petra.ac.id', '12345', '2023-12-12', 'siwalan', '$2y$10$AYqWsV1mNVaLB0MTaHGzwe7n9SAJoaGF8hhAx/mKIZZehcocCNsCa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `NRP` varchar(12) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`NRP`, `nama`, `email`, `password`) VALUES
('C14220036', 'Eric Yoel', 'c14220036@john.petra.ac.id', '$2y$10$fTsH8.yFmF1KzZ9rngymqez2dCLZiGk.7Dok0q8Mv0Aj1AokpogJq'),
('c14220249', 'Fong Fong', 'c14220249@john.petra.ac.id', '$2y$10$gTJ8MBsAa0nSFfcrHpSqe.ShWYLwcjH0jh.s6TWPCtYKjFs6vnxqe'),
('c14220291', 'Alan Jonathan Raharjo', 'c14220291@john.petra.ac.id', '$2y$10$rsgfU1YNEQ3.y31dxoMFYuXePTZor7ZLE9zLpltMtACGuuOvXBvpu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`NRP`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
