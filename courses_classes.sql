-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2024 at 04:27 PM
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
-- Database: `tugas2_pweb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses_classes`
--

CREATE TABLE `courses_classes` (
  `id` int(11) NOT NULL,
  `student_class_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses_classes`
--

INSERT INTO `courses_classes` (`id`, `student_class_id`, `course_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(11, 11, 1, '2024-09-13 03:39:34', '2024-09-13 03:39:34', '2024-09-13 03:39:34'),
(12, 12, 2, '2024-09-13 03:40:55', '2024-09-13 03:40:55', '2024-09-13 03:40:55'),
(13, 13, 3, '2024-09-13 13:35:27', '2024-09-13 13:35:27', '2024-09-13 13:35:27'),
(14, 14, 4, '2024-09-13 13:36:58', '2024-09-13 13:36:58', '2024-09-13 13:36:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses_classes`
--
ALTER TABLE `courses_classes`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
