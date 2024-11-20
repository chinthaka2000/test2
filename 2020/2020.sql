-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 08:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `created_date`) VALUES
(1, 'De Silva', 'silva@gmail.com', 'Urgent ', 'This is just a trial', '2024-11-20 15:50:46'),
(2, 'Philips', 'philips@gmail.com', 'Emergency', 'Just a way ', '2024-11-20 15:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullName`, `email`, `gender`, `password`, `address`, `mobile`, `role`, `created_date`) VALUES
(1, 'Thiwanka Chanditha', 'thiwankasinhalage@ieee.org', 'Male', '12345678', 'jaffna', '0112563652', 'operator', '2024-11-20 15:55:14'),
(3, 'Pete Smith', 'petersmith@gmail.com', 'Male', '$2y$10$D0kph2dPf/KioatekTbpIOVOOL4pk1AaR93TbIwPk2jDzthqCY67m', 'Colombo', '021458693', 'user', '2024-11-20 15:55:14'),
(7, 'Chanditha Sinhalage', 'chanditha@gmail.com', 'Male', '$2y$10$G19Y98IqAJ1RzcDbS2KuWu7m9ldJX45MEKDjtiPm41TZd49VcVc/u', 'Colombo 5', '56214535263345', 'user', '2024-11-20 15:55:14'),
(8, 'Pete Smith', 'peter@gmail.com', 'Female', '$2y$10$VMgmOo6IMS8qrKkowTN6TOMXl0vjFmqH3IuUKOllUyKdhhRrkl3x.', 'America', '785421369685', 'user', '2024-11-20 18:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `userproject`
--

CREATE TABLE `userproject` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `project_idea` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userproject`
--

INSERT INTO `userproject` (`id`, `userId`, `project_title`, `project_idea`, `image`) VALUES
(1, 7, 'project 1', 'this is just a test project', ''),
(2, 3, 'Water distribution', 'to distribute water', '');

-- --------------------------------------------------------

--
-- Table structure for table `usersupport`
--

CREATE TABLE `usersupport` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `support_type` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usersupport`
--

INSERT INTO `usersupport` (`id`, `userId`, `title`, `support_type`, `details`, `created_at`) VALUES
(3, 7, 'technical assistance', 'Technical Support', 'urgent assisstance needed', '2024-11-20 16:22:32'),
(5, 7, 'Need materials', 'Material Support', 'this is a request for materials', '2024-11-20 16:22:32'),
(6, 3, 'Just trying', 'Financial Support', 'I need money', '2024-11-20 18:35:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userproject`
--
ALTER TABLE `userproject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersupport`
--
ALTER TABLE `usersupport`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `userproject`
--
ALTER TABLE `userproject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usersupport`
--
ALTER TABLE `usersupport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
