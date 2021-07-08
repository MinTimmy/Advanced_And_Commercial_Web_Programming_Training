-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 08, 2021 at 12:16 PM
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
  `id` int NOT NULL,
  `message` varchar(100) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`id`, `message`, `post_time`, `user_id`) VALUES
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
(127, 'dd', '2021-07-02 04:54:42', 1),
(128, 'ss', '2021-07-03 02:18:39', 1),
(129, '555555', '2021-07-04 15:18:32', 1),
(130, '555555', '2021-07-04 15:19:16', 1),
(131, 'Hello', '2021-07-04 15:19:16', 1),
(132, 'ss', '2021-07-04 15:41:27', 1),
(133, 'ss', '2021-07-04 15:44:40', 1),
(134, 'ssss', '2021-07-06 12:33:53', 1),
(135, 'ssss', '2021-07-06 12:34:34', 1),
(136, 'ssss', '2021-07-06 12:34:42', 1),
(137, 'ssss', '2021-07-06 12:34:50', 1),
(138, 'ssss', '2021-07-06 12:35:25', 1),
(139, 'ssss', '2021-07-06 12:35:33', 1),
(140, 'ssss', '2021-07-06 12:35:45', 1),
(141, 'ssss', '2021-07-06 12:36:06', 1),
(142, 'ssss', '2021-07-06 12:37:17', 1),
(143, 'ssss', '2021-07-06 12:38:34', 1),
(144, 'ssss', '2021-07-06 12:39:14', 1),
(145, 'ssss', '2021-07-06 12:39:27', 1),
(146, 'ssss', '2021-07-06 12:39:39', 1),
(147, 'ssss', '2021-07-06 12:39:44', 1),
(148, '8888', '2021-07-08 03:39:19', 1),
(149, '8888', '2021-07-08 03:42:15', 1),
(150, '8888', '2021-07-08 03:45:24', 1),
(151, '8888', '2021-07-08 03:46:08', 1),
(152, '8888', '2021-07-08 03:46:23', 1),
(153, '33\r\n', '2021-07-08 03:46:54', 1),
(154, '33\r\n', '2021-07-08 03:49:46', 1),
(155, '9999', '2021-07-08 03:49:49', 1),
(156, '9999', '2021-07-08 03:50:17', 1),
(157, '9999', '2021-07-08 03:50:46', 1),
(158, 'ddd', '2021-07-08 03:59:12', 2),
(159, 'ddd', '2021-07-08 03:59:34', 2),
(160, 'ddd', '2021-07-08 03:59:54', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'anonymous', 'anonymous'),
(2, 'timmy', '$2y$10$9ZrWVLPpZh86yJr78xxAUupToTEkLMzJi/cjQE4xcl1UuFAGOKfsG'),
(3, 'timmy2', '$2y$10$3rqOtOyVPcb2/ZNfI02Ud.pa7IKGoWbOKC/j0B9tlPhrTM.xumCH6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
