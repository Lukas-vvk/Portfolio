-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 07:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `vardas` varchar(50) DEFAULT NULL,
  `pavarde` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `slaptazodis` varchar(255) DEFAULT NULL,
  `useris` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `vardas`, `pavarde`, `email`, `slaptazodis`, `useris`) VALUES
(1, 'Lukas', 'Žukauskas', 'Lukas@gmail.com', 'c938489ddb8330955c187d62e032bb43', 'Lukas admin'),
(2, 'Viktorija', 'Denisevičiūtė', 'Viktorija@gmail.com', '19255aa9ddc7d190edc5c2a3387040de', 'Viktorija admin'),
(3, 'Ronaldas', 'Laurinėnas', 'ronaldas@gmail.com', '04c195a4c3548959baedc044556b041f', 'Ronaldas admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `vardas` varchar(50) DEFAULT NULL,
  `pavarde` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `slaptazodis` varchar(255) DEFAULT NULL,
  `useris` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `vardas`, `pavarde`, `email`, `slaptazodis`, `useris`) VALUES
(23, 'Lukas', 'Luks', 'lukas.test@gmail.com', '$2y$10$XtK5HLPxmIa.Z7cefO54PupFaLdcde349JRQQW49yzq3gntmd.t6G', 'Lukas');

-- --------------------------------------------------------

--
-- Table structure for table `user_comments`
--

CREATE TABLE `user_comments` (
  `id` int(11) NOT NULL,
  `comment_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `approved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_replies`
--

CREATE TABLE `user_replies` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `reply_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `approved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_comments`
--
ALTER TABLE `user_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_replies`
--
ALTER TABLE `user_replies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_comments`
--
ALTER TABLE `user_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `user_replies`
--
ALTER TABLE `user_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
