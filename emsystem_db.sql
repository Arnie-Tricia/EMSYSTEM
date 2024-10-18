-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2024 at 10:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
  `empId` int(11) NOT NULL,
  `empUsername` varchar(64) NOT NULL,
  `empPassword` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`empId`, `empUsername`, `empPassword`) VALUES
(2, 'ar', 'bed4eb698c6eeea7f1ddf5397d480d3f2c0fb938'),
(3, 'qq', 'bed4eb698c6eeea7f1ddf5397d480d3f2c0fb938'),
(4, 'cc', 'bdb480de655aa6ec75ca058c849c4faf3c0f75b1'),
(5, 'bbb', '5cb138284d431abd6a053a56625ec088bfb88912');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `reg_date`) VALUES
(3, 'dummy3', 'dummy4', 'hjh', '$2y$10$Rk1hXzmEtIRi9XHlMA4GyO0l2embk1fNGw.kZJZIwgr', 'hjhjhjhjhj@gmail.com', '2024-10-17 14:02:15'),
(9, '11ddrrthj', '11', '11', '$2y$10$T0P9qyD40wP1C1O1zSNeA.pPUhk3zwkvhg6NCeUsnt8H2IGAmPx9C', '11@dgf', '2024-10-18 06:26:51'),
(10, 'aass', 'qaq', 'qq', '$2y$10$8w5zl8d.zAE/3uL/VdcbhONVx0HbLoJyg1.INsxGqCz1E8MaMUr4O', 'qq@gmail', '2024-10-18 06:39:01'),
(12, 'xx', 'xx', 'xx', '$2y$10$jDQnp0RGFdxb1rhrw4OEMeH0l7dIFcREgvlGjehUv1X/scUCKeo0C', 'xx@ss', '2024-10-18 07:58:52'),
(13, 'vvfg', 'vv', 'vv', '$2y$10$G23cQLfeWN6bIfduN15MWeBK6lEoVxDQXZCmA1R2gL/3ZpuApvyza', 'vv@gmail.com', '2024-10-18 08:05:03');

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
  MODIFY `empId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
