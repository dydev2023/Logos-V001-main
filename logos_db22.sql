-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 03:09 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logos_db22`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(15) NOT NULL,
  `am_id` varchar(50) NOT NULL,
  `fname_en` varchar(50) NOT NULL,
  `lname_en` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `am_id`, `fname_en`, `lname_en`, `gender`, `tel`, `email`, `image`, `created_at`, `updated_at`) VALUES
(19, 'am001', 'Oudone', 'PHENGKHAMLAR', 'Male', '2096942533', 'oudone@gmail.com', 'Cat_profile.jpg', '2023-05-27 13:46:45', '2023-05-27 13:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(15) NOT NULL,
  `room` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room`, `created_at`, `updated_at`) VALUES
(9, 'CH001', '2023-05-23 09:03:46', '2023-05-23 09:03:46'),
(11, 'CH002', '2023-05-23 09:04:45', '2023-05-23 09:04:45'),
(12, 'CH003', '2023-05-23 09:04:49', '2023-05-23 09:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `id` int(15) NOT NULL,
  `season` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `season`, `created_at`, `updated_at`) VALUES
(6, '2019-2020', '2023-05-22 08:00:15', '2023-05-22 08:00:15'),
(7, '2020-2021', '2023-05-22 08:00:20', '2023-05-22 08:00:20'),
(8, '2021-2022', '2023-05-22 08:00:22', '2023-05-22 08:00:22'),
(9, '2022-2023', '2023-05-28 03:48:42', '2023-05-28 03:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(15) NOT NULL,
  `std_id` varchar(50) NOT NULL,
  `fname_la` varchar(50) NOT NULL,
  `fname_en` varchar(50) NOT NULL,
  `fname_ch` varchar(50) NOT NULL,
  `lname_la` varchar(50) NOT NULL,
  `lname_en` varchar(50) NOT NULL,
  `lname_ch` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `village` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `nation` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `highschool` varchar(50) NOT NULL,
  `middleschool` varchar(50) NOT NULL,
  `elementaryschool` varchar(50) NOT NULL,
  `familymatters` varchar(255) NOT NULL,
  `plansforthefuture` varchar(255) NOT NULL,
  `season` varchar(50) NOT NULL,
  `part` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `std_id`, `fname_la`, `fname_en`, `fname_ch`, `lname_la`, `lname_en`, `lname_ch`, `gender`, `dob`, `tel`, `whatsapp`, `email`, `village`, `district`, `province`, `nation`, `religion`, `highschool`, `middleschool`, `elementaryschool`, `familymatters`, `plansforthefuture`, `season`, `part`, `image`, `created_at`, `updated_at`) VALUES
(23, 'std001', 'Student001', 'Student001', 'Student001', 'Student', 'Student', 'Student', 'Male', '02-05-2023', '2055555511', '2055555511', 'std001@gmail.com', 'Donkoune', 'LuangNamTha', 'LuangNamTha', 'Lao', 'Christianity', 'KKK', 'KKK', 'KKK', '', '', '2019-2020', 'Morning', 'Cat_profile.jpg', '2023-05-27 14:34:08', '2023-05-28 00:10:28'),
(24, 'std002', 'Student002', 'Student002', 'Student002', 'Student', 'Student', 'Student', 'Female', '01-05-2023', '2055555512', '2055555512', 'std002@gmail.com', 'lll', 'lll', 'lll', 'Lao', 'Islam', 'lll', 'lll', 'lll', 'ddd', 'ddd', '2019-2020', 'Morning', 'Cat_profile.jpg', '2023-05-28 00:57:08', '2023-05-28 03:22:53'),
(30, 'std003', 'Student003', 'Student003', 'Student003', 'Student', 'Student', 'Student', 'Male', '02-05-2023', '2055555513', '2055555513', 'std003@gmail.com', 'Donkoune', 'LuangNamTha', 'LuangNamTha', 'Lao', 'Christianity', 'KKK', 'KKK', 'KKK', '', '', '2019-2020', 'Morning', 'Cat_profile.jpg', '2023-05-27 14:34:08', '2023-05-28 00:10:28'),
(31, 'std004', 'Student004', 'Student004', 'Student004', 'Student', 'Student', 'Student', 'Female', '01-05-2023', '2055555514', '2055555514', 'std004@gmail.com', 'lll', 'lll', 'lll', 'Lao', 'Islam', 'lll', 'lll', 'lll', 'ddd', 'ddd', '2019-2020', 'Morning', 'Cat_profile.jpg', '2023-05-28 00:57:08', '2023-05-28 03:23:04'),
(36, 'std005', 'Student005', 'Student005', 'Student005', 'Student', 'Student', 'Student', 'Male', '02-05-2023', '2055555515', '2055555515', 'std005@gmail.com', 'Donkoune', 'LuangNamTha', 'LuangNamTha', 'Lao', 'Christianity', 'KKK', 'KKK', 'KKK', '', '', '2019-2020', 'Evening', 'Cat_profile.jpg', '2023-05-27 14:34:08', '2023-05-28 00:10:28'),
(37, 'std006', 'Student006', 'Student006', 'Student006', 'Student', 'Student', 'Student', 'Female', '01-05-2023', '2055555516', '2055555516', 'std006@gmail.com', 'lll', 'lll', 'lll', 'Lao', 'Islam', 'lll', 'lll', 'lll', 'ddd', 'ddd', '2019-2020', 'Evening', 'Cat_profile.jpg', '2023-05-28 00:57:08', '2023-05-28 03:22:53'),
(38, 'std007', 'Student007', 'Student007', 'Student007', 'Student', 'Student', 'Student', 'Male', '02-05-2023', '2055555517', '2055555517', 'std007@gmail.com', 'Donkoune', 'LuangNamTha', 'LuangNamTha', 'Lao', 'Christianity', 'KKK', 'KKK', 'KKK', '', '', '2019-2020', 'Evening', 'Cat_profile.jpg', '2023-05-27 14:34:08', '2023-05-28 00:10:28'),
(39, 'std008', 'Student008', 'Student008', 'Student008', 'Student', 'Student', 'Student', 'Female', '01-05-2023', '2055555518', '2055555518', 'std008@gmail.com', 'lll', 'lll', 'lll', 'Lao', 'Islam', 'lll', 'lll', 'lll', 'ddd', 'ddd', '2019-2020', 'Evening', 'Cat_profile.jpg', '2023-05-28 00:57:08', '2023-05-28 03:23:04'),
(40, 'std009', 'Student009', 'Student009', 'Student009', 'Student', 'Student', 'Student', 'Female', '01-05-2023', '2055555519', '2055555519', 'std009@gmail.com', 'lll', 'lll', 'lll', 'Lao', 'Islam', 'lll', 'lll', 'lll', 'ddd', 'ddd', '2020-2021', 'Morning', 'Cat_profile.jpg', '2023-05-28 00:57:08', '2023-05-28 03:22:53'),
(41, 'std0010', 'Student0010', 'Student0010', 'Student0010', 'Student', 'Student', 'Student', 'Male', '02-05-2023', '2050000010', '2050000010', 'std0010@gmail.com', 'Donkoune', 'LuangNamTha', 'LuangNamTha', 'Lao', 'Christianity', 'KKK', 'KKK', 'KKK', '', '', '2020-2021', 'Morning', 'Cat_profile.jpg', '2023-05-27 14:34:08', '2023-05-28 00:10:28'),
(50, 'std0013', 'Student0013', 'Student0013', 'Student0013', 'Student', 'Student', 'Student', 'Male', '01-05-2023', '20555555113', '20555555113', '20555555113', 'aa', 'bb', 'cc', 'Lao', 'Islam', 'ff', 'lll', 'eee', 'ddd', 'ddd', '2022-2023', 'Morning', 'Done02.jpg', '2023-05-28 05:00:10', '2023-05-28 05:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `student_scores`
--

CREATE TABLE `student_scores` (
  `id` int(15) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `season` varchar(100) NOT NULL,
  `part` varchar(30) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `attending` int(10) NOT NULL,
  `behavire` int(10) NOT NULL,
  `activities` int(10) NOT NULL,
  `midterm_ex` int(10) NOT NULL,
  `final_ex` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_scores`
--

INSERT INTO `student_scores` (`id`, `student_id`, `season`, `part`, `subject`, `attending`, `behavire`, `activities`, `midterm_ex`, `final_ex`, `created_at`, `updated_at`) VALUES
(1, 'std001', '2019-2020', 'Morning', 'Chines Writing', 0, 0, 0, 18, 0, '2023-05-22 12:00:33', '2023-05-22 12:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `teacher_id` int(15) NOT NULL,
  `season` varchar(50) NOT NULL,
  `credit` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `teacher_id`, `season`, `credit`, `semester`, `created_at`, `updated_at`) VALUES
(12, 'Writing', 47, '2019-2020', 2, 1, '2023-05-28 08:20:40', '2023-05-28 08:58:16'),
(13, 'Speaking', 46, '2019-2020', 2, 1, '2023-05-28 08:20:40', '2023-05-28 08:58:16'),
(14, 'Grammar', 44, '2019-2020', 2, 1, '2023-05-28 08:20:40', '2023-05-28 08:58:16'),
(15, 'General', 43, '2019-2020', 2, 1, '2023-05-28 08:20:40', '2023-05-28 08:58:16'),
(16, 'Chines Couture', 44, '2019-2020', 2, 1, '2023-05-28 09:05:41', '2023-05-28 09:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(15) NOT NULL,
  `t_id` varchar(50) NOT NULL,
  `fname_la` varchar(50) NOT NULL,
  `fname_en` varchar(50) NOT NULL,
  `fname_ch` varchar(50) NOT NULL,
  `lname_la` varchar(50) NOT NULL,
  `lname_en` varchar(50) NOT NULL,
  `lname_ch` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `village` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `nation` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `university` varchar(50) NOT NULL,
  `highschool` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `t_id`, `fname_la`, `fname_en`, `fname_ch`, `lname_la`, `lname_en`, `lname_ch`, `gender`, `dob`, `tel`, `whatsapp`, `email`, `village`, `district`, `province`, `nation`, `religion`, `university`, `highschool`, `image`, `created_at`, `updated_at`) VALUES
(29, 't001', 'Teacher001', 'Teacher001', 'Teacher001', 'Teacher', 'Teacher', 'Teacher', 'Female', '02-05-2023', '2077777711', '2077777711', 't001@gmail.com', 'aa', 'bb', 'cc', 'Lao', 'Buddhism', 'ee', 'ff', 'Done07.jpg', '2023-05-28 01:25:31', '2023-05-28 03:14:11'),
(43, 't002', 'Teacher002', 'Teacher002', 'Teacher002', 'Teacher', 'Teacher', 'Teacher', 'Female', '02-05-2023', '2077777712', '2077777712', 't002@gmail.com', 'aa', 'bb', 'cc', 'Lao', 'Buddhism', 'ee', 'ff', 'Done07.jpg', '2023-05-28 01:25:31', '2023-05-28 03:14:11'),
(44, 't003', 'Teacher003', 'Teacher003', 'Teacher003', 'Teacher', 'Teacher', 'Teacher', 'Female', '02-05-2023', '2077777713', '2077777713', 't003@gmail.com', 'aa', 'bb', 'cc', 'Lao', 'Buddhism', 'ee', 'ff', 'Done07.jpg', '2023-05-28 01:25:31', '2023-05-28 03:14:11'),
(45, 't004', 'Teacher004', 'Teacher004', 'Teacher004', 'Teacher', 'Teacher', 'Teacher', 'Female', '02-05-2023', '2077777714', '2077777714', 't004@gmail.com', 'aa', 'bb', 'cc', 'Lao', 'Buddhism', 'ee', 'ff', 'Done07.jpg', '2023-05-28 01:25:31', '2023-05-28 03:14:11'),
(46, 't005', 'Teacher005', 'Teacher005', 'Teacher005', 'Teacher', 'Teacher', 'Teacher', 'Female', '02-05-2023', '2077777715', '2077777715', 't005@gmail.com', 'aa', 'bb', 'cc', 'Lao', 'Buddhism', 'ee', 'ff', 'Done07.jpg', '2023-05-28 01:25:31', '2023-05-28 03:14:11'),
(47, 't06', 'Teacher006', 'Teacher006', 'Teacher006', 'Teacher', 'Teacher', 'Teacher', 'Female', '02-05-2023', '2077777716', '2077777716', 't006@gmail.com', 'aa', 'bb', 'cc', 'Lao', 'Buddhism', 'ee', 'ff', 'Done07.jpg', '2023-05-28 01:25:31', '2023-05-28 03:14:11'),
(48, 't007', 'Teacher007', 'Teacher007', 'Teacher007', 'Teacher', 'Teacher', 'Teacher', 'Female', '02-05-2023', '2077777717', '2077777717', 't007@gmail.com', 'aa', 'bb', 'cc', 'Lao', 'Buddhism', 'ee', 'ff', 'Done07.jpg', '2023-05-28 01:25:31', '2023-05-28 03:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `id` int(15) NOT NULL,
  `subject_id` int(15) DEFAULT NULL,
  `classroom` varchar(15) DEFAULT NULL,
  `season` varchar(50) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `days` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timetables`
--

INSERT INTO `timetables` (`id`, `subject_id`, `classroom`, `season`, `semester`, `days`, `created_at`, `updated_at`) VALUES
(61, 15, 'CH001', '2019-2020', '1', 'Monday', '2023-05-28 10:11:41', '2023-05-28 10:11:41'),
(62, 13, 'CH001', '2019-2020', '1', 'Tusday', '2023-05-28 10:11:41', '2023-05-28 10:11:41'),
(63, 16, 'CH001', '2019-2020', '1', 'Wednesday', '2023-05-28 10:11:41', '2023-05-28 10:11:41'),
(64, 16, 'CH003', '2019-2020', '1', 'Thursday', '2023-05-28 10:11:41', '2023-05-28 10:11:41'),
(65, 14, 'CH001', '2019-2020', '1', 'Friday', '2023-05-28 10:11:41', '2023-05-28 10:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `u_id` varchar(50) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_pass` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `u_id`, `u_email`, `u_pass`, `status`, `created_at`, `updated_at`) VALUES
(19, 'am001', 'oudone@gmail.com', '$2y$10$MsbydNNLi8xFMhZWmX14nuRCYIgN1chhvLP5dvAsirZ5Q1Ew5tLAi', 'Admin', '2023-05-27 13:46:45', '2023-05-27 13:55:16'),
(23, 'std001', 'std001@gmail.com', '$2y$10$AqLCUo4NwfTjCqthg88g7ODQUwf98vvUz/gfq.gLWKQuU81bI3oWu', 'Student', '2023-05-27 14:34:08', '2023-05-28 00:54:45'),
(24, 'std002', 'std002@gmail.com', '$2y$10$4SiMn.r54QslURpZKWnEOe0ADQS2m/JVDCM4TbyMJE40v.iF7LJLG', 'Student', '2023-05-28 00:57:08', '2023-05-28 00:57:08'),
(29, 't001', 't001@gmail.com', '$2y$10$efQtSs7al/4aJEQ6A2wHpubvTlvd7rSklSX88jehjiVM6Giu1OLrC', 'Teacher', '2023-05-28 01:25:31', '2023-05-28 03:15:13'),
(30, 'std003', 'std003@gmail.com', '$2y$10$AqLCUo4NwfTjCqthg88g7ODQUwf98vvUz/gfq.gLWKQuU81bI3oWu', 'Student', '2023-05-27 14:34:08', '2023-05-28 00:54:45'),
(31, 'std004', 'std004@gmail.com', '$2y$10$4SiMn.r54QslURpZKWnEOe0ADQS2m/JVDCM4TbyMJE40v.iF7LJLG', 'Student', '2023-05-28 00:57:08', '2023-05-28 00:57:08'),
(36, 'std005', 'std005@gmail.com', '$2y$10$AqLCUo4NwfTjCqthg88g7ODQUwf98vvUz/gfq.gLWKQuU81bI3oWu', 'Student', '2023-05-27 14:34:08', '2023-05-28 00:54:45'),
(37, 'std006', 'std006@gmail.com', '$2y$10$4SiMn.r54QslURpZKWnEOe0ADQS2m/JVDCM4TbyMJE40v.iF7LJLG', 'Student', '2023-05-28 00:57:08', '2023-05-28 00:57:08'),
(38, 'std007', 'std007@gmail.com', '$2y$10$AqLCUo4NwfTjCqthg88g7ODQUwf98vvUz/gfq.gLWKQuU81bI3oWu', 'Student', '2023-05-27 14:34:08', '2023-05-28 00:54:45'),
(39, 'std008', 'std008@gmail.com', '$2y$10$4SiMn.r54QslURpZKWnEOe0ADQS2m/JVDCM4TbyMJE40v.iF7LJLG', 'Student', '2023-05-28 00:57:08', '2023-05-28 00:57:08'),
(40, 'std009', 'std009@gmail.com', '$2y$10$AqLCUo4NwfTjCqthg88g7ODQUwf98vvUz/gfq.gLWKQuU81bI3oWu', 'Student', '2023-05-27 14:34:08', '2023-05-28 00:54:45'),
(41, 'std0010', 'std0010@gmail.com', '$2y$10$4SiMn.r54QslURpZKWnEOe0ADQS2m/JVDCM4TbyMJE40v.iF7LJLG', 'Student', '2023-05-28 00:57:08', '2023-05-28 00:57:08'),
(43, 't002', 't002@gmail.com', '$2y$10$efQtSs7al/4aJEQ6A2wHpubvTlvd7rSklSX88jehjiVM6Giu1OLrC', 'Teacher', '2023-05-28 01:25:31', '2023-05-28 03:15:13'),
(44, 't003', 't003@gmail.com', '$2y$10$efQtSs7al/4aJEQ6A2wHpubvTlvd7rSklSX88jehjiVM6Giu1OLrC', 'Teacher', '2023-05-28 01:25:31', '2023-05-28 03:15:13'),
(45, 't004', 't004@gmail.com', '$2y$10$efQtSs7al/4aJEQ6A2wHpubvTlvd7rSklSX88jehjiVM6Giu1OLrC', 'Teacher', '2023-05-28 01:25:31', '2023-05-28 03:15:13'),
(46, 't005', 't005@gmail.com', '$2y$10$efQtSs7al/4aJEQ6A2wHpubvTlvd7rSklSX88jehjiVM6Giu1OLrC', 'Teacher', '2023-05-28 01:25:31', '2023-05-28 03:15:13'),
(47, 't006', 't006@gmail.com', '$2y$10$efQtSs7al/4aJEQ6A2wHpubvTlvd7rSklSX88jehjiVM6Giu1OLrC', 'Teacher', '2023-05-28 01:25:31', '2023-05-28 03:15:13'),
(48, 't007', 't007@gmail.com', '$2y$10$efQtSs7al/4aJEQ6A2wHpubvTlvd7rSklSX88jehjiVM6Giu1OLrC', 'Teacher', '2023-05-28 01:25:31', '2023-05-28 03:15:13'),
(50, 'std0013', '20555555113', '$2y$10$.sFedazK4EJnkmL82whiLunAEa8mI07y0Pvfl4XmTyHdQdjCPxYeS', 'Student', '2023-05-28 05:00:10', '2023-05-28 05:00:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_id` (`am_id`),
  ADD UNIQUE KEY `phonenumber` (`tel`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `season` (`season`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`std_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `whatsappnumber` (`whatsapp`),
  ADD UNIQUE KEY `phonenumber` (`tel`);

--
-- Indexes for table `student_scores`
--
ALTER TABLE `student_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teacher_id` (`t_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `whatsappnumber` (`whatsapp`),
  ADD UNIQUE KEY `phonenumber` (`tel`);

--
-- Indexes for table `timetables`
--
ALTER TABLE `timetables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`u_id`),
  ADD UNIQUE KEY `email` (`u_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `student_scores`
--
ALTER TABLE `student_scores`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
