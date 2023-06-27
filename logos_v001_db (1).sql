-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 02:30 PM
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
-- Database: `logos_v001_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `am_id` varchar(15) NOT NULL,
  `u_id` varchar(15) NOT NULL,
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

INSERT INTO `admins` (`am_id`, `u_id`, `fname_en`, `lname_en`, `gender`, `tel`, `email`, `image`, `created_at`, `updated_at`) VALUES
('am001', 'am001', 'Oudone', 'PHENGKHAMLAR', 'Male', '02050000001', 'oudone@gmail.com', 'Cat_profile.jpg', '2023-06-20 07:52:53', '2023-06-20 07:52:53');

-- --------------------------------------------------------

--
-- Table structure for table `bechelor_students`
--

CREATE TABLE `bechelor_students` (
  `std_id` varchar(15) NOT NULL,
  `u_id` varchar(15) NOT NULL,
  `fname_en` varchar(50) NOT NULL,
  `lname_en` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `fname_la` varchar(50) NOT NULL,
  `lname_la` varchar(50) NOT NULL,
  `program` varchar(50) NOT NULL,
  `fname_ch` varchar(50) NOT NULL,
  `lname_ch` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `part` varchar(50) NOT NULL,
  `nation` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `ethnicity` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `guardian_tel` varchar(15) NOT NULL,
  `village_birth` varchar(50) NOT NULL,
  `district_birth` varchar(50) NOT NULL,
  `province_birth` varchar(50) NOT NULL,
  `village_current` varchar(50) NOT NULL,
  `district_current` varchar(50) NOT NULL,
  `province_current` varchar(50) NOT NULL,
  `house_unit` varchar(10) DEFAULT NULL,
  `house_no` varchar(10) DEFAULT NULL,
  `highschool` varchar(50) NOT NULL,
  `season_hsc` varchar(15) NOT NULL,
  `district_study` varchar(50) NOT NULL,
  `province_study` varchar(50) NOT NULL,
  `employment_history` varchar(255) DEFAULT NULL,
  `language_proficiency` varchar(255) DEFAULT NULL,
  `talent` varchar(50) DEFAULT NULL,
  `familymatters` varchar(255) DEFAULT NULL,
  `plansforthefuture` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `std_status` varchar(50) NOT NULL DEFAULT 'Studying',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `classroom_id` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `class_groups`
--

CREATE TABLE `class_groups` (
  `class_group_id` varchar(15) NOT NULL,
  `t_id` varchar(15) NOT NULL,
  `std_id` varchar(15) DEFAULT NULL,
  `season` varchar(15) NOT NULL,
  `year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `diploma_students`
--

CREATE TABLE `diploma_students` (
  `std_id` varchar(15) NOT NULL,
  `u_id` varchar(15) NOT NULL,
  `fname_en` varchar(50) NOT NULL,
  `lname_en` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `fname_la` varchar(50) NOT NULL,
  `lname_la` varchar(50) NOT NULL,
  `program` varchar(50) NOT NULL,
  `fname_ch` varchar(50) NOT NULL,
  `lname_ch` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `part` varchar(50) NOT NULL,
  `nation` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `ethnicity` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `guardian_tel` varchar(15) NOT NULL,
  `village_birth` varchar(50) NOT NULL,
  `district_birth` varchar(50) NOT NULL,
  `province_birth` varchar(50) NOT NULL,
  `village_current` varchar(50) NOT NULL,
  `district_current` varchar(50) NOT NULL,
  `province_current` varchar(50) NOT NULL,
  `house_unit` varchar(10) DEFAULT NULL,
  `house_no` varchar(10) DEFAULT NULL,
  `highschool` varchar(50) NOT NULL,
  `season_hsc` varchar(15) NOT NULL,
  `district_study` varchar(50) NOT NULL,
  `province_study` varchar(50) NOT NULL,
  `employment_history` varchar(255) DEFAULT NULL,
  `language_proficiency` varchar(255) DEFAULT NULL,
  `talent` varchar(50) DEFAULT NULL,
  `familymatters` varchar(255) DEFAULT NULL,
  `plansforthefuture` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `std_status` varchar(50) NOT NULL DEFAULT 'Studying',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `director_id` varchar(15) NOT NULL,
  `u_id` varchar(15) NOT NULL,
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
  `ethnicity` varchar(50) NOT NULL,
  `deploma_amout` int(10) NOT NULL,
  `deploma_college` varchar(100) NOT NULL,
  `undergraduate_amount` int(10) NOT NULL,
  `undergraduate_university` varchar(100) NOT NULL,
  `master_university` varchar(100) NOT NULL,
  `Doctorate_university` varchar(100) NOT NULL,
  `gratuation_year` varchar(50) NOT NULL,
  `employment_history` varchar(255) NOT NULL,
  `language_proficiency` varchar(255) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `off_id` varchar(15) NOT NULL,
  `u_id` varchar(15) NOT NULL,
  `fname_en` varchar(50) NOT NULL,
  `lname_en` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `fname_la` varchar(50) NOT NULL,
  `lname_la` varchar(50) NOT NULL,
  `fname_ch` varchar(50) DEFAULT NULL,
  `lname_ch` varchar(50) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `nation` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `ethnicity` varchar(50) DEFAULT NULL,
  `tel` varchar(15) NOT NULL,
  `whatsapp` varchar(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `emergency_tel` varchar(15) DEFAULT NULL,
  `emergency_name` varchar(50) DEFAULT NULL,
  `village_birth` varchar(50) DEFAULT NULL,
  `district_birth` varchar(50) DEFAULT NULL,
  `province_birth` varchar(50) DEFAULT NULL,
  `village_current` varchar(50) DEFAULT NULL,
  `district_current` varchar(50) DEFAULT NULL,
  `province_current` varchar(50) DEFAULT NULL,
  `house_unit` varchar(10) DEFAULT NULL,
  `house_no` varchar(10) DEFAULT NULL,
  `edu_level1` varchar(100) DEFAULT NULL,
  `edu_branch1` varchar(100) DEFAULT NULL,
  `univ_name1` varchar(100) DEFAULT NULL,
  `edu_district1` varchar(50) DEFAULT NULL,
  `edu_province1` varchar(50) DEFAULT NULL,
  `edu_season1` varchar(15) DEFAULT NULL,
  `edu_level2` varchar(100) DEFAULT NULL,
  `edu_branch2` varchar(100) DEFAULT NULL,
  `univ_name2` varchar(100) DEFAULT NULL,
  `edu_district2` varchar(50) DEFAULT NULL,
  `edu_province2` varchar(50) DEFAULT NULL,
  `edu_season2` varchar(15) DEFAULT NULL,
  `employment_history` varchar(255) DEFAULT NULL,
  `language_proficiency` varchar(255) DEFAULT NULL,
  `talent` varchar(50) DEFAULT NULL,
  `familymatters` varchar(255) DEFAULT NULL,
  `plansforthefuture` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`off_id`, `u_id`, `fname_en`, `lname_en`, `gender`, `fname_la`, `lname_la`, `fname_ch`, `lname_ch`, `dob`, `nation`, `religion`, `ethnicity`, `tel`, `whatsapp`, `email`, `emergency_tel`, `emergency_name`, `village_birth`, `district_birth`, `province_birth`, `village_current`, `district_current`, `province_current`, `house_unit`, `house_no`, `edu_level1`, `edu_branch1`, `univ_name1`, `edu_district1`, `edu_province1`, `edu_season1`, `edu_level2`, `edu_branch2`, `univ_name2`, `edu_district2`, `edu_province2`, `edu_season2`, `employment_history`, `language_proficiency`, `talent`, `familymatters`, `plansforthefuture`, `image`, `created_at`, `updated_at`) VALUES
('off001', 'off001', 'Officer001', 'Officer', 'Female', 'Officer001', 'Officer', 'Officer001', 'Officer', '01-06-2023', 'Lao', 'Buddhism', 'e', '02070000001', '02070000001', 'off001@gmail.com', '02071000001', 'Mom', 'v', 'd', 'p', 'c', 'c', 'c', '', '', 'Deploma College', 'GG', 'UU', 'U_D', 'U_P', 'h', '', '', '', '', '', '', '', '', '', '', '', 'Cat_profile.jpg', '2023-06-21 07:43:53', '2023-06-21 09:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(15) NOT NULL,
  `program` varchar(50) NOT NULL,
  `total_year` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `program`, `total_year`, `created_at`, `updated_at`) VALUES
(3, 'Bachelor Degree', 4, '2023-06-19 12:09:55', '2023-06-22 12:27:35'),
(5, 'Diploma Degree', 3, '2023-06-19 12:22:03', '2023-06-22 11:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `id` int(15) NOT NULL,
  `season` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `season`, `created_at`, `updated_at`) VALUES
(11, '2021-2022', '2023-06-12 03:34:28', '2023-06-12 03:34:28'),
(13, '2022-2023', '2023-06-12 03:35:16', '2023-06-22 11:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `std_id` varchar(15) NOT NULL,
  `u_id` varchar(15) NOT NULL,
  `fname_en` varchar(50) NOT NULL,
  `lname_en` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `fname_la` varchar(50) NOT NULL,
  `lname_la` varchar(50) NOT NULL,
  `program` varchar(50) DEFAULT NULL,
  `fname_ch` varchar(50) DEFAULT NULL,
  `lname_ch` varchar(50) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `part` varchar(50) NOT NULL,
  `nation` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `ethnicity` varchar(50) DEFAULT NULL,
  `tel` varchar(15) NOT NULL,
  `whatsapp` varchar(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `guardian_tel` varchar(15) DEFAULT NULL,
  `village_birth` varchar(50) DEFAULT NULL,
  `district_birth` varchar(50) DEFAULT NULL,
  `province_birth` varchar(50) DEFAULT NULL,
  `village_current` varchar(50) DEFAULT NULL,
  `district_current` varchar(50) DEFAULT NULL,
  `province_current` varchar(50) DEFAULT NULL,
  `house_unit` varchar(10) DEFAULT NULL,
  `house_no` varchar(10) DEFAULT NULL,
  `highschool` varchar(50) DEFAULT NULL,
  `season_hsc` varchar(15) DEFAULT NULL,
  `district_study` varchar(50) DEFAULT NULL,
  `province_study` varchar(50) DEFAULT NULL,
  `employment_history` varchar(255) DEFAULT NULL,
  `language_proficiency` varchar(255) DEFAULT NULL,
  `talent` varchar(50) DEFAULT NULL,
  `familymatters` varchar(255) DEFAULT NULL,
  `plansforthefuture` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `std_status` varchar(50) NOT NULL DEFAULT 'Studying',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`std_id`, `u_id`, `fname_en`, `lname_en`, `gender`, `fname_la`, `lname_la`, `program`, `fname_ch`, `lname_ch`, `dob`, `part`, `nation`, `religion`, `ethnicity`, `tel`, `whatsapp`, `email`, `guardian_tel`, `village_birth`, `district_birth`, `province_birth`, `village_current`, `district_current`, `province_current`, `house_unit`, `house_no`, `highschool`, `season_hsc`, `district_study`, `province_study`, `employment_history`, `language_proficiency`, `talent`, `familymatters`, `plansforthefuture`, `image`, `std_status`, `created_at`, `updated_at`) VALUES
('std001', 'std001', 'Student001', 'Student', 'Female', 'Student001', 'Student', 'Diploma Degree', 'Student001', 'Student', '01-06-2023', 'Morning', 'Lao', 'Buddhism', 'aa', '02050000001', '02050000001', 'std001@gmail.com', '02051000001', 'v', 'd', 'p', 'c', 'c', 'c', 'aa', 'aa', 'h', '2018-2019', 'D', 'p', 'aa', 'aa', 'aa', 'aa', 'aa', NULL, 'Studying', '2023-06-20 08:02:05', '2023-06-21 09:20:08'),
('std002', 'std002', 'Student002', 'Student', 'Male', 'Student002', 'Student', 'Bachelor Degree', 'Student002', 'Student', '01-06-2023', 'Morning', 'Lao', 'Buddhism', 'aa', '02050000002', '02050000002', 'std002@gmail.com', '02052000002', 'v', 'd', 'p', 'c', 'c', 'c', '', '', 'SMK', '2018-2019', 'i', 'p', '', '', '', '', '', NULL, 'Studying', '2023-06-20 08:04:39', '2023-06-21 09:53:23'),
('std003', 'std003', 'Student003', 'Student', 'Female', 'Student003', 'Student', 'Bachelor Degree', NULL, NULL, NULL, 'Evening', NULL, NULL, NULL, '02050000003', NULL, 'std003@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', '2023-06-20 08:05:07', '2023-06-20 08:05:07'),
('std004', 'std004', 'Student004', 'Student', 'Female', 'Student004', 'Student', 'Diploma Degree', 'Student004', 'Student', '02-06-2023', 'Evening', 'Lao', 'Buddhism', 'e', '02050000004', '02050000004', 'std004@gmail.com', '02054000004', 'v', 'd', 'd', 'c', 'c', 'c', '', '', 'h', '2018-2019', 'f', 'p', '', '', '', '', '', 'Done_profile - Copy.jpg', 'Studying', '2023-06-20 08:10:23', '2023-06-21 09:49:53'),
('std005', 'std005', 'Student005', 'Student', 'Male', 'Student005', 'Student', 'Diploma Degree', 'Student005', 'Student', '01-06-2023', 'Morning', 'Lao', 'Buddhism', 'aa', '02050000005', '02050000005', 'std005@gmail.com', '02055000005', 'v', 'd', 'p', 'c', 'c', 'c', 'aa9', 'aa9', 'h', '2018-2019', 'D', 'p', 'aa9', 'aa9', 'aa9', 'aa9', 'aa9', 'Cat_profile.jpg', 'Studying', '2023-06-21 06:48:34', '2023-06-21 06:57:00'),
('std006', 'std006', 'Student006', 'Student', 'Male', 'Student006', 'Student', 'Diploma Degree', NULL, NULL, NULL, 'Morning', NULL, NULL, NULL, '02050000006', NULL, 'std006@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', '2023-06-22 12:20:48', '2023-06-22 12:20:48'),
('std007', 'std007', 'Student007', 'Student', 'Male', 'Student007', 'Student', 'Bachelor Degree', 'Student007', 'Student', '01-06-2023', 'Morning', 'Lao', 'Buddhism', 'aa', '02050000007', '02050000007', 'std007@gmail.com', '02057000007', 'v', 'd', 'p', 'c', 'c', 'c', '', '', 'h', '2018-2019', 'D', 'p', '', '', '', '', '', NULL, 'Studying', '2023-06-22 12:21:17', '2023-06-22 12:23:05'),
('std008', 'std008', 'Student008', 'Student', 'Male', 'Student008', 'Student', 'Bachelor Degree', 'Student008', 'Student', '01-06-2023', 'Morning', 'Lao2', 'Buddhism', 'aa', '02050000008', '02050000008', 'std008@gmail.com', '02058000008', 'v', 'd', 'p', 'c', 'c', 'c', '', '', 'h', '2018-2019', 'D', 'p', '', '', '', '', '', NULL, 'Studying', '2023-06-22 12:21:44', '2023-06-22 12:24:25'),
('std009', 'std009', 'Student009', 'Student', 'Male', 'Student009', 'Student', 'Bachelor Degree', NULL, NULL, NULL, 'Evening', NULL, NULL, NULL, '02050000009', NULL, 'std009@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', '2023-06-22 12:26:36', '2023-06-22 12:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `student_scores`
--

CREATE TABLE `student_scores` (
  `score_id` varchar(15) NOT NULL,
  `class_group_id` varchar(15) NOT NULL,
  `sub_id` varchar(15) NOT NULL,
  `season` varchar(15) NOT NULL,
  `part` varchar(50) NOT NULL,
  `attending` int(10) DEFAULT NULL,
  `behavire` int(10) DEFAULT NULL,
  `activities` int(10) DEFAULT NULL,
  `midterm_ex` int(10) DEFAULT NULL,
  `final_ex` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sub_id` varchar(15) NOT NULL,
  `t_id` varchar(15) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `program` varchar(50) DEFAULT NULL,
  `season` varchar(15) DEFAULT NULL,
  `credit` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sub_id`, `t_id`, `name`, `program`, `season`, `credit`, `semester`, `created_at`, `updated_at`) VALUES
('subB001', 't001', 'Writing', 'Bachelor Degree', '2022-2023', 3, 1, '2023-06-22 11:10:56', '2023-06-22 12:01:37'),
('subB002', 't002', 'Comprehensive Chinese 1', 'Bachelor Degree', '2022-2023', 2, 1, '2023-06-22 11:11:20', '2023-06-22 11:11:20'),
('subD001', 't002', 'Writing', 'Diploma Degree', '2022-2023', 2, 1, '2023-06-21 12:06:13', '2023-06-21 12:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `t_id` varchar(15) NOT NULL,
  `u_id` varchar(15) NOT NULL,
  `fname_en` varchar(50) NOT NULL,
  `lname_en` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `fname_la` varchar(50) NOT NULL,
  `lname_la` varchar(50) NOT NULL,
  `t_type` varchar(50) DEFAULT NULL,
  `fname_ch` varchar(50) DEFAULT NULL,
  `lname_ch` varchar(50) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `nation` varchar(50) NOT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `ethnicity` varchar(50) DEFAULT NULL,
  `tel` varchar(15) NOT NULL,
  `whatsapp` varchar(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `emergency_tel` varchar(15) DEFAULT NULL,
  `emergency_name` varchar(50) DEFAULT NULL,
  `village_birth` varchar(50) DEFAULT NULL,
  `district_birth` varchar(50) DEFAULT NULL,
  `province_birth` varchar(50) DEFAULT NULL,
  `village_current` varchar(50) DEFAULT NULL,
  `district_current` varchar(50) DEFAULT NULL,
  `province_current` varchar(50) DEFAULT NULL,
  `house_unit` varchar(10) DEFAULT NULL,
  `house_no` varchar(10) DEFAULT NULL,
  `edu_level1` varchar(100) DEFAULT NULL,
  `edu_branch1` varchar(100) DEFAULT NULL,
  `univ_name1` varchar(100) DEFAULT NULL,
  `edu_district1` varchar(50) DEFAULT NULL,
  `edu_province1` varchar(50) DEFAULT NULL,
  `edu_season1` varchar(15) DEFAULT NULL,
  `edu_level2` varchar(100) DEFAULT NULL,
  `edu_branch2` varchar(100) DEFAULT NULL,
  `univ_name2` varchar(100) DEFAULT NULL,
  `edu_district2` varchar(50) DEFAULT NULL,
  `edu_province2` varchar(50) DEFAULT NULL,
  `edu_season2` varchar(15) DEFAULT NULL,
  `employment_history` varchar(255) DEFAULT NULL,
  `language_proficiency` varchar(255) DEFAULT NULL,
  `talent` varchar(50) DEFAULT NULL,
  `familymatters` varchar(255) DEFAULT NULL,
  `plansforthefuture` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `t_status` varchar(50) NOT NULL DEFAULT 'Working',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`t_id`, `u_id`, `fname_en`, `lname_en`, `gender`, `fname_la`, `lname_la`, `t_type`, `fname_ch`, `lname_ch`, `dob`, `nation`, `religion`, `ethnicity`, `tel`, `whatsapp`, `email`, `emergency_tel`, `emergency_name`, `village_birth`, `district_birth`, `province_birth`, `village_current`, `district_current`, `province_current`, `house_unit`, `house_no`, `edu_level1`, `edu_branch1`, `univ_name1`, `edu_district1`, `edu_province1`, `edu_season1`, `edu_level2`, `edu_branch2`, `univ_name2`, `edu_district2`, `edu_province2`, `edu_season2`, `employment_history`, `language_proficiency`, `talent`, `familymatters`, `plansforthefuture`, `image`, `t_status`, `created_at`, `updated_at`) VALUES
('t001', 't001', 'Teacher001', 'Teacher', 'Male', 'Teacher001', 'Teacher', 'Regular Teacher', 'Teacher001', 'Teacher', '01-06-2023', 'Lao', 'Buddhism', 'aa', '02080000001', '02080000001', 't001@gmail.com', '02081000001', 'Mom', 'v7', 'd', 'p', 'c', 'c', 'c', '', '', 'Master Univercity', 'GG', 'UU', 'U_D', 'U_P', '2015-2016', '', '', '', '', '', '', '', '', '', '', '', 'Done_profile - Copy.jpg', 'Working', '2023-06-21 08:48:43', '2023-06-21 09:41:57'),
('t002', 't002', 'Teacher002', 'Teacher', 'Female', 'Teacher002', 'Teacher', 'Invited Teacher', 'Teacher002', 'Teacher', '01-06-2023', 'Lao', 'Buddhism', 'e', '02080000002', '02080000002', 't002@gmail.com', '02082000002', 'Dad', 'v', 'd', 'p', 'c', 'c', 'c', '', '', 'Master Univercity', 'GG', 'UU', 'U_D', 'U_P', '2015-2016', '', '', '', '', '', '', '', '', '', '', '', NULL, 'Working', '2023-06-21 08:52:00', '2023-06-21 09:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `id` int(15) NOT NULL,
  `sub1_id` varchar(15) DEFAULT NULL,
  `sub2_id` varchar(15) DEFAULT NULL,
  `class_group_id` varchar(15) NOT NULL,
  `classroom_id` varchar(15) DEFAULT NULL,
  `season` varchar(15) DEFAULT NULL,
  `year` int(5) NOT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `days` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `u_pass` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `email`, `tel`, `u_pass`, `status`, `created_at`, `updated_at`) VALUES
('am001', 'oudone@gmail.com', '02096942533', '$2y$10$fVh40xxZOrO1gMcWvq9dw.iuMb4im5AC.Fw1zkrNmgEYfce3PBWFq', 'Admin', '2023-06-20 07:52:53', '2023-06-21 09:50:45'),
('off001', 'off001@gmail.com', '02070000001', '$2y$10$.1ML8MJQ8Dm/SWCE2k3usuutGBKPk67XzAG00f7akX6zWDWD.YtDe', 'Officer', '2023-06-21 07:43:53', '2023-06-21 09:54:00'),
('std001', 'std001@gmail.com', '02050000001', '$2y$10$zPczIZLi55VPuxxFU1LqReipwwyWbuvswoZHSvkAJCKQIcq1p6R6i', 'Student', '2023-06-20 08:02:05', '2023-06-21 09:20:08'),
('std002', 'std002@gmail.com', '02050000002', '$2y$10$UImmWfegZ97oX0QokfJGAuVjAzj5kfxUzFic4AEW/I9iapxzQku0W', 'Student', '2023-06-20 08:04:39', '2023-06-21 09:53:23'),
('std003', 'std003@gmail.com', '02050000003', '$2y$10$4ixLRqTC8PZPH29sNn8fh.PHlrKo4AANZPaTW2He9x4is7gc4p0SW', 'Student', '2023-06-20 08:05:07', '2023-06-20 08:05:07'),
('std004', 'std004@gmail.com', '02050000004', '$2y$10$AdiEO3Gw7h28qtpVGkXuyulC9.MrBPgYm1EvJs/6AczE0A1wpEOwu', 'Student', '2023-06-20 08:10:23', '2023-06-20 08:10:23'),
('std005', 'std005@gmail.com', '02050000005', '$2y$10$.G1D/biUkkuBnkYOxTUUdOWG/FmZ3ajYnXzhye.1KsOBUWp30z.f6', 'Student', '2023-06-21 06:48:34', '2023-06-21 09:18:11'),
('std006', 'std006@gmail.com', '02050000006', '$2y$10$RSF6UpqY1Wik96r3qRRiceoIs7PsroBSA9UJ3FKXUQ.YVtQsnqCJ2', 'Student', '2023-06-22 12:20:48', '2023-06-22 12:20:48'),
('std007', 'std007@gmail.com', '02050000007', '$2y$10$SEqsKvY76iAf8IvdUY78E.81nXi9iH3jD/73GZU8swUCiTO11Cuum', 'Student', '2023-06-22 12:21:17', '2023-06-22 12:23:05'),
('std008', 'std008@gmail.com', '02050000008', '$2y$10$UOM4cZGEFz9hsBtu8/LUvOSdWB5dNgN3z6nV3kzpa6ZW0IGqlg1Mi', 'Student', '2023-06-22 12:21:44', '2023-06-22 12:21:44'),
('std009', 'std009@gmail.com', '02050000009', '$2y$10$j4e.GMlAhv7mRdBPDvUebOqS8MRp1ijhLgqEc4IW5CPPzrCd.QJza', 'Student', '2023-06-22 12:26:36', '2023-06-22 12:26:36'),
('t001', 't001@gmail.com', '02080000001', '$2y$10$b5p4Z8yFyIYvSRc4a8/Hs.9IhufTna9/PvyubgTtn4QV1IaI6tAQy', 'Teacher', '2023-06-21 08:48:43', '2023-06-21 08:48:43'),
('t002', 't002@gmail.com', '02080000002', '$2y$10$mkL3NbGXO6t3yFraK/cPceDB9qEPG9VZJn9iMBXOHurGLaA9HQMPq', 'Teacher', '2023-06-21 08:52:00', '2023-06-21 08:52:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`am_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phonenumber` (`tel`),
  ADD UNIQUE KEY `u_id` (`u_id`) USING BTREE;

--
-- Indexes for table `bechelor_students`
--
ALTER TABLE `bechelor_students`
  ADD PRIMARY KEY (`std_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `whatsappnumber` (`whatsapp`),
  ADD UNIQUE KEY `phonenumber` (`tel`),
  ADD UNIQUE KEY `u_id` (`u_id`) USING BTREE,
  ADD UNIQUE KEY `guardian_tel` (`guardian_tel`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`classroom_id`) USING BTREE;

--
-- Indexes for table `class_groups`
--
ALTER TABLE `class_groups`
  ADD UNIQUE KEY `class_group_id` (`class_group_id`),
  ADD KEY `t_class_id` (`t_id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `season` (`season`);

--
-- Indexes for table `diploma_students`
--
ALTER TABLE `diploma_students`
  ADD PRIMARY KEY (`std_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `whatsappnumber` (`whatsapp`),
  ADD UNIQUE KEY `phonenumber` (`tel`),
  ADD UNIQUE KEY `u_id` (`u_id`) USING BTREE,
  ADD UNIQUE KEY `guardian_tel` (`guardian_tel`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`director_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `whatsappnumber` (`whatsapp`),
  ADD UNIQUE KEY `phonenumber` (`tel`),
  ADD UNIQUE KEY `u_id` (`u_id`) USING BTREE;

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`off_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `whatsappnumber` (`whatsapp`),
  ADD UNIQUE KEY `phonenumber` (`tel`),
  ADD UNIQUE KEY `u_id` (`u_id`) USING BTREE,
  ADD UNIQUE KEY `emergency_tel` (`emergency_tel`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`season`) USING BTREE,
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`std_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phonenumber` (`tel`),
  ADD UNIQUE KEY `u_id` (`u_id`) USING BTREE,
  ADD UNIQUE KEY `whatsappnumber` (`whatsapp`),
  ADD UNIQUE KEY `guardian_tel` (`guardian_tel`),
  ADD KEY `program` (`program`);

--
-- Indexes for table `student_scores`
--
ALTER TABLE `student_scores`
  ADD PRIMARY KEY (`score_id`),
  ADD KEY `class_group_id` (`class_group_id`,`sub_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `season` (`season`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `season` (`season`),
  ADD KEY `program` (`program`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `whatsappnumber` (`whatsapp`),
  ADD UNIQUE KEY `phonenumber` (`tel`),
  ADD UNIQUE KEY `u_id` (`u_id`) USING BTREE,
  ADD UNIQUE KEY `emergency_tel` (`emergency_tel`);

--
-- Indexes for table `timetables`
--
ALTER TABLE `timetables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub1_id` (`sub1_id`,`sub2_id`,`classroom_id`),
  ADD KEY `sub2_id` (`sub2_id`),
  ADD KEY `classroom_id` (`classroom_id`),
  ADD KEY `class_group_id` (`class_group_id`),
  ADD KEY `season` (`season`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `tel` (`tel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bechelor_students`
--
ALTER TABLE `bechelor_students`
  ADD CONSTRAINT `bechelor_students_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `diploma_students`
--
ALTER TABLE `diploma_students`
  ADD CONSTRAINT `diploma_students_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `directors`
--
ALTER TABLE `directors`
  ADD CONSTRAINT `directors_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `officers`
--
ALTER TABLE `officers`
  ADD CONSTRAINT `officers_ibfk_3` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`program`) REFERENCES `programs` (`program`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `student_scores`
--
ALTER TABLE `student_scores`
  ADD CONSTRAINT `student_scores_ibfk_3` FOREIGN KEY (`season`) REFERENCES `seasons` (`season`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `teachers` (`t_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `subjects_ibfk_2` FOREIGN KEY (`season`) REFERENCES `seasons` (`season`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `subjects_ibfk_3` FOREIGN KEY (`program`) REFERENCES `programs` (`program`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_3` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timetables`
--
ALTER TABLE `timetables`
  ADD CONSTRAINT `timetables_ibfk_1` FOREIGN KEY (`sub1_id`) REFERENCES `subjects` (`sub_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `timetables_ibfk_3` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`classroom_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `timetables_ibfk_4` FOREIGN KEY (`class_group_id`) REFERENCES `class_groups` (`class_group_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `timetables_ibfk_5` FOREIGN KEY (`season`) REFERENCES `seasons` (`season`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
