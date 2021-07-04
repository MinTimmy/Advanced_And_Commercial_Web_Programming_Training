-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2021 at 01:10 PM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `board_id` int NOT NULL,
  `message` varchar(100) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`board_id`, `message`, `post_time`, `user_id`) VALUES
(1, 'ssss', '2021-07-01 13:08:05', 1),
(3, '2222', '2021-07-01 13:16:38', 2),
(4, 'sss', '2021-07-01 13:16:58', 1),
(5, 'ggggg', '2021-07-01 13:17:10', 1),
(6, 'ggggg', '2021-07-01 13:17:52', 1),
(7, 'aa', '2021-07-01 13:17:58', 1),
(8, 'aa', '2021-07-01 13:18:16', 1),
(9, 'aa', '2021-07-01 13:18:24', 1),
(10, 'aa', '2021-07-01 13:18:36', 1),
(11, 'qqq', '2021-07-01 13:18:39', 1),
(12, 'qqq', '2021-07-01 13:19:05', 1),
(13, 'qqq', '2021-07-01 13:19:51', 1),
(14, 'qqq', '2021-07-01 13:20:11', 1),
(15, 'qqq', '2021-07-01 13:21:09', 1),
(16, 'qqq', '2021-07-01 13:21:22', 1),
(17, 'qqq', '2021-07-01 13:21:37', 1),
(18, 'qqq', '2021-07-01 13:22:16', 1),
(19, 'sss', '2021-07-01 13:22:20', 1),
(20, 'sss', '2021-07-01 13:22:58', 1),
(127, 'dd', '2021-07-02 04:54:42', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`board_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `board_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
