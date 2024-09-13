-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2024 at 04:24 PM
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
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `code` varchar(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sks` int(2) NOT NULL,
  `hours` int(2) NOT NULL,
  `meeting` int(11) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `code`, `name`, `sks`, `hours`, `meeting`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '123', 'Ana Febri Salusi', 2, 1, 8, '2024-09-13 03:33:17', '2024-09-13 03:33:17', '2024-09-13 03:33:17'),
(2, '234', 'Yana Aprilia', 2, 1, 8, '2024-09-13 03:34:58', '2024-09-13 03:34:58', '2024-09-13 03:34:58'),
(3, '456', 'Nina Karlina', 4, 2, 6, '2024-09-13 13:33:52', '2024-09-13 13:33:52', '2024-09-13 13:33:52'),
(4, '567', 'Prayoga Junianto', 2, 1, 8, '2024-09-13 13:36:31', '2024-09-13 13:36:31', '2024-09-13 13:36:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
