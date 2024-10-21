-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20230127.4260efdc58
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 01:20 PM
-- Server version: 8.0.28
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emsystem_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `empId` int NOT NULL,
  `empFirstName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `empSurname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `empUsername` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `empPassword` varchar(512) COLLATE utf8mb4_general_ci NOT NULL,
  `empEmail` varchar(65) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`empId`, `empFirstName`, `empSurname`, `empUsername`, `empPassword`, `empEmail`) VALUES
(1, 'John', 'Doe', 'John.Doe', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'john.doe@example.com'),
(2, 'Doe', 'John', 'Doe.John', '6c7ca345f63f835cb353ff15bd6c5e052ec08e7a', 'doe.john@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `reg_date`) VALUES
(3, 'dummy3', 'dummy4', 'hjh', '$2y$10$Rk1hXzmEtIRi9XHlMA4GyO0l2embk1fNGw.kZJZIwgr', 'hjhjhjhjhj@gmail.com', '2024-10-17 14:02:15'),
(9, '11ddrrthj', '11', '11', '$2y$10$T0P9qyD40wP1C1O1zSNeA.pPUhk3zwkvhg6NCeUsnt8H2IGAmPx9C', '11@dgf', '2024-10-18 06:26:51'),
(10, 'aass', 'qaq', 'qq', '$2y$10$8w5zl8d.zAE/3uL/VdcbhONVx0HbLoJyg1.INsxGqCz1E8MaMUr4O', 'qq@gmail', '2024-10-18 06:39:01'),
(12, 'xx', 'xx', 'xx', '$2y$10$jDQnp0RGFdxb1rhrw4OEMeH0l7dIFcREgvlGjehUv1X/scUCKeo0C', 'xx@ss', '2024-10-18 07:58:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`empId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `empId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
