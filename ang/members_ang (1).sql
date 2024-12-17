-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2024 at 05:47 AM
-- Server version: 8.0.36
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `members_ang`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` mediumint UNSIGNED NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `psword` char(40) NOT NULL,
  `registration_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `psword`, `registration_date`) VALUES
(13, 'aeron', 'valzado', 'aeronvalzado@gmail.com', 'cf8c9be2a4508a24ae92c9d3d379131d', '2024-10-30 12:02:38'),
(14, 'abe', 'ete', 'abe@gmail.com', 'df6d2338b2b8fce1ec2f6dda0a630eb0', '2024-10-30 12:06:13'),
(15, 'erron', 'salonga', 'erron@gmail.com', 'c6f057b86584942e415435ffb1fa93d4', '2024-10-30 12:06:35'),
(16, 'alzarouni', 'yosh', 'yosh@gmail.com', 'b706835de79a2b4e80506f582af3676a', '2024-10-30 12:07:04'),
(17, 'dom', 'torres', 'dom@gmail.com', '0a113ef6b61820daa5611c870ed8d5ee', '2024-10-30 12:07:23'),
(19, 'shane', 'dy', 'shane@gmail.com', 'fae0b27c451c728867a567e8c1bb4e53', '2024-10-30 12:07:53'),
(20, 'louise', 'maralit', 'louise@gmail.com', '15de21c670ae7c3f6f3f1f37029303c9', '2024-10-30 12:08:22'),
(21, 'kenjie', 'nebril', 'kenjie@gmail.com', '550a141f12de6341fba65b0ad0433500', '2024-10-30 12:08:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
