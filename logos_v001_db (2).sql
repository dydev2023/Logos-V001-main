-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 08:22 AM
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
-- Table structure for table `classgroups`
--

CREATE TABLE `classgroups` (
  `id` int(15) NOT NULL,
  `class_group_id` varchar(15) NOT NULL,
  `t_id` varchar(15) DEFAULT NULL,
  `std_id` varchar(15) DEFAULT NULL,
  `program` varchar(50) DEFAULT NULL,
  `season` varchar(15) DEFAULT NULL,
  `year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classgroups`
--

INSERT INTO `classgroups` (`id`, `class_group_id`, `t_id`, `std_id`, `program`, `season`, `year`) VALUES
(5, 'aaa001', 't001', '2324BM00001', 'Bachelor Degree', '2022-2023', '1'),
(6, 'aaa001', 't001', '2324BM00002', 'Bachelor Degree', '2022-2023', '1'),
(7, 'aaa001', 't001', '2324BM00003', 'Bachelor Degree', '2022-2023', '1'),
(8, 'aaa001', 't001', '2324BM00004', 'Bachelor Degree', '2022-2023', '1'),
(9, 'aaa001', 't001', '2324BM00005', 'Bachelor Degree', '2022-2023', '1'),
(10, 'aaa001', 't001', '2324BM00006', 'Bachelor Degree', '2022-2023', '1'),
(11, 'aaa001', 't001', '2324BM00007', 'Bachelor Degree', '2022-2023', '1'),
(12, 'aaa001', 't001', '2324BM00008', 'Bachelor Degree', '2022-2023', '1'),
(13, 'aaa001', 't001', '2324BM00009', 'Bachelor Degree', '2022-2023', '1'),
(14, 'aaa001', 't001', '2324BM00010', 'Bachelor Degree', '2022-2023', '1');

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` int(11) NOT NULL,
  `classroom` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `classroom`, `created_at`, `updated_at`) VALUES
(3, 'B301', '2023-06-26 01:48:31', '2023-06-26 01:48:31'),
(4, 'B302', '2023-06-26 01:48:33', '2023-06-26 01:48:33'),
(5, 'B303', '2023-06-26 01:48:36', '2023-06-26 01:48:36'),
(6, 'B304', '2023-06-26 01:48:39', '2023-06-26 01:48:39'),
(7, 'B305', '2023-06-26 01:48:41', '2023-06-26 01:48:41');

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
('off001', 'off001', 'Officer001', 'Officer', 'Female', 'Officer001', 'Officer', 'Officer001', 'Officer', '01-06-2023', 'Lao', 'Buddhism', 'e', '02077777777', '02077777777', 'off001@gmail.com', '02072777777', 'Mom', 'v', 'd', 'p', 'c', 'c', 'c', '', '', 'Deploma College', 'GG', 'UU', 'U_D', 'U_P', 'h', '', '', '', '', '', '', '', '', '', '', '', 'Cat_profile.jpg', '2023-06-21 07:43:53', '2023-06-26 07:24:28');

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
  `season_start` varchar(15) DEFAULT NULL,
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
  `group_status` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`std_id`, `u_id`, `fname_en`, `lname_en`, `gender`, `fname_la`, `lname_la`, `program`, `season_start`, `fname_ch`, `lname_ch`, `dob`, `part`, `nation`, `religion`, `ethnicity`, `tel`, `whatsapp`, `email`, `guardian_tel`, `village_birth`, `district_birth`, `province_birth`, `village_current`, `district_current`, `province_current`, `house_unit`, `house_no`, `highschool`, `season_hsc`, `district_study`, `province_study`, `employment_history`, `language_proficiency`, `talent`, `familymatters`, `plansforthefuture`, `image`, `std_status`, `group_status`, `created_at`, `updated_at`) VALUES
('2324BE00001', '2324BE00001', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Evening', NULL, NULL, NULL, '02050100001', NULL, 'stdBE001@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:44:21'),
('2324BE00002', '2324BE00002', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Evening', NULL, NULL, NULL, '02050200002', NULL, 'stdBE002@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:45:51'),
('2324BE00003', '2324BE00003', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Evening', NULL, NULL, NULL, '02050300003', NULL, 'stdBE003@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:45:51'),
('2324BE00004', '2324BE00004', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Evening', NULL, NULL, NULL, '02050400004', NULL, 'stdBE004@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:45:51'),
('2324BE00005', '2324BE00005', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Evening', NULL, NULL, NULL, '02050500005', NULL, 'stdBE005@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:45:51'),
('2324BE00006', '2324BE00006', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Evening', NULL, NULL, NULL, '02050600006', NULL, 'stdBE006@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:45:51'),
('2324BE00007', '2324BE00007', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Evening', NULL, NULL, NULL, '02050700007', NULL, 'stdBE007@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:45:51'),
('2324BE00008', '2324BE00008', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Evening', NULL, NULL, NULL, '02050800008', NULL, 'stdBE008@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:45:51'),
('2324BE00009', '2324BE00009', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Evening', NULL, NULL, NULL, '02050900009', NULL, 'stdBE009@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:45:51'),
('2324BE00010', '2324BE00010', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Evening', NULL, NULL, NULL, '02051000010', NULL, 'stdBE010@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:45:51'),
('2324BE00011', '2324BE00011', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Evening', NULL, NULL, NULL, '02051100011', NULL, 'stdBE011@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:45:51'),
('2324BE00012', '2324BE00012', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Evening', NULL, NULL, NULL, '02051200012', NULL, 'stdBE012@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:45:51'),
('2324BE00013', '2324BE00013', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Evening', NULL, NULL, NULL, '02051300013', NULL, 'stdBE013@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:45:52'),
('2324BE00014', '2324BE00014', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Evening', NULL, NULL, NULL, '02051400014', NULL, 'stdBE014@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:45:52'),
('2324BE00015', '2324BE00015', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Evening', NULL, NULL, NULL, '02051500015', NULL, 'stdBE015@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:45:52'),
('2324BE00016', '2324BE00016', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Evening', NULL, NULL, NULL, '02051600016', NULL, 'stdBE016@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:45:52'),
('2324BM00001', '2324BM00001', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Morning', NULL, NULL, NULL, '02050000001', NULL, 'stdBM001@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', 'aaa001', '2023-06-26 07:29:21', '2023-06-27 03:39:19'),
('2324BM00002', '2324BM00002', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Morning', NULL, NULL, NULL, '02050000002', NULL, 'stdBM002@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', 'aaa001', '2023-06-26 07:29:21', '2023-06-27 03:39:19'),
('2324BM00003', '2324BM00003', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Morning', NULL, NULL, NULL, '02050000003', NULL, 'stdBM003@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', 'aaa001', '2023-06-26 07:29:21', '2023-06-27 03:39:19'),
('2324BM00004', '2324BM00004', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Morning', NULL, NULL, NULL, '02050000004', NULL, 'stdBM004@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', 'aaa001', '2023-06-26 07:29:21', '2023-06-27 03:39:19'),
('2324BM00005', '2324BM00005', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Morning', NULL, NULL, NULL, '02050000005', NULL, 'stdBM005@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', 'aaa001', '2023-06-26 07:29:21', '2023-06-27 03:39:19'),
('2324BM00006', '2324BM00006', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Morning', NULL, NULL, NULL, '02050000006', NULL, 'stdBM006@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', 'aaa001', '2023-06-26 07:29:21', '2023-06-27 03:39:19'),
('2324BM00007', '2324BM00007', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Morning', NULL, NULL, NULL, '02050000007', NULL, 'stdBM007@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', 'aaa001', '2023-06-26 07:29:21', '2023-06-27 04:31:48'),
('2324BM00008', '2324BM00008', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Morning', NULL, NULL, NULL, '02050000008', NULL, 'stdBM008@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', 'aaa001', '2023-06-26 07:29:21', '2023-06-27 04:31:48'),
('2324BM00009', '2324BM00009', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Morning', NULL, NULL, NULL, '02050000009', NULL, 'stdBM009@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', 'aaa001', '2023-06-26 07:29:21', '2023-06-27 04:31:48'),
('2324BM00010', '2324BM00010', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Morning', NULL, NULL, NULL, '02050000010', NULL, 'stdBM010@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', 'aaa001', '2023-06-26 07:29:21', '2023-06-27 04:31:48'),
('2324BM00011', '2324BM00011', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Morning', NULL, NULL, NULL, '02050000011', NULL, 'stdB011@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:15:25'),
('2324BM00012', '2324BM00012', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Morning', NULL, NULL, NULL, '02050000012', NULL, 'stdBM012@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:15:25'),
('2324BM00013', '2324BM00013', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Morning', NULL, NULL, NULL, '02050000013', NULL, 'stdBM013@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:15:25'),
('2324BM00014', '2324BM00014', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Morning', NULL, NULL, NULL, '02050000014', NULL, 'stdBM014@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:15:25'),
('2324BM00015', '2324BM00015', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Morning', NULL, NULL, NULL, '02050000015', NULL, 'stdB015@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:15:25'),
('2324BM00016', '2324BM00016', 'std', 'Student', 'Male', 'std', 'Student', 'Bachelor Degree', '2022-2023', NULL, NULL, NULL, 'Morning', NULL, NULL, NULL, '02050000016', NULL, 'stdBM016@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Studying', NULL, '2023-06-26 07:29:21', '2023-06-26 08:15:25');

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
('subB001', 't001', 'Writing', 'Bachelor Degree', '2022-2023', 1, 1, '2023-06-22 11:10:56', '2023-06-26 01:24:58'),
('subB002', 't001', 'Comprehensive Chinese 1', 'Bachelor Degree', '2022-2023', 2, 1, '2023-06-22 11:11:20', '2023-06-26 01:25:08'),
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
('t001', 't001', 'Teacher001', 'Teacher', 'Male', 'Teacher001', 'Teacher', 'Regular Teacher', 'Teacher001', 'Teacher', '01-06-2023', 'Lao', 'Buddhism', 'aa', '02088888888', '02088888888', 't001@gmail.com', '02081888888', 'Mom', 'v7', 'd', 'p', 'c', 'c', 'c', '', '', 'Master Univercity', 'GG', 'UU', 'U_D', 'U_P', '2015-2016', '', '', '', '', '', '', '', '', '', '', '', 'Done_profile - Copy.jpg', 'Working', '2023-06-21 08:48:43', '2023-06-26 07:25:39'),
('t002', 't002', 'Teacher002', 'Teacher', 'Female', 'Teacher002', 'Teacher', 'Invited Teacher', 'Teacher002', 'Teacher', '01-06-2023', 'Lao', 'Buddhism', 'e', '02088888882', '02088888882', 't002@gmail.com', '02082888888', 'Dad', 'v', 'd', 'p', 'c', 'c', 'c', '', '', 'Master Univercity', 'GG', 'UU', 'U_D', 'U_P', '2015-2016', '', '', '', '', '', '', '', '', '', '', '', NULL, 'Working', '2023-06-21 08:52:00', '2023-06-26 07:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `id` int(15) NOT NULL,
  `sub1_id` varchar(15) DEFAULT NULL,
  `sub2_id` varchar(15) DEFAULT NULL,
  `class_group_id` varchar(15) DEFAULT NULL,
  `classroom` varchar(15) DEFAULT NULL,
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
('2324BE00001', 'stdBE001@gmail.com', '02050100001', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:34'),
('2324BE00002', 'stdBE002@gmail.com', '02050200002', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:34'),
('2324BE00003', 'stdBE003@gmail.com', '02050300003', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:34'),
('2324BE00004', 'stdBE004@gmail.com', '02050400004', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:34'),
('2324BE00005', 'stdBE005@gmail.com', '02050500005', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:34'),
('2324BE00006', 'stdBE006@gmail.com', '02050600006', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:34'),
('2324BE00007', 'stdBE007@gmail.com', '02050700007', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:34'),
('2324BE00008', 'stdBE008@gmail.com', '02050800008', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:34'),
('2324BE00009', 'stdBE009@gmail.com', '02050900009', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:35'),
('2324BE00010', 'stdBE010@gmail.com', '02051000010', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:35'),
('2324BE00011', 'stdBE011@gmail.com', '02051100011', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:35'),
('2324BE00012', 'stdBE012@gmail.com', '02051200012', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:35'),
('2324BE00013', 'stdBE013@gmail.com', '02051300013', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:35'),
('2324BE00014', 'stdBE014@gmail.com', '02051400014', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:35'),
('2324BE00015', 'stdBE015@gmail.com', '02051500015', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:35'),
('2324BE00016', 'stdBE016@gmail.com', '02051600016', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:35'),
('2324BM00001', 'stdBM001@gmail.com', '02050000001', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:34'),
('2324BM00002', 'stdBM002@gmail.com', '02050000002', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:34'),
('2324BM00003', 'stdBM003@gmail.com', '02050000003', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:34'),
('2324BM00004', 'stdBM004@gmail.com', '02050000004', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:34'),
('2324BM00005', 'stdBM005@gmail.com', '02050000005', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:34'),
('2324BM00006', 'stdBM006@gmail.com', '02050000006', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:34'),
('2324BM00007', 'stdBM007@gmail.com', '02050000007', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:34'),
('2324BM00008', 'stdBM008@gmail.com', '02050000008', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:34'),
('2324BM00009', 'stdBM009@gmail.com', '02050000009', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:35'),
('2324BM00010', 'stdBM010@gmail.com', '02050000010', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:35'),
('2324BM00011', 'stdBM011@gmail.com', '02050000011', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:35'),
('2324BM00012', 'stdBM012@gmail.com', '02050000012', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:35'),
('2324BM00013', 'stdBM013@gmail.com', '02050000013', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:35'),
('2324BM00014', 'stdBM014@gmail.com', '02050000014', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:35'),
('2324BM00015', 'stdBM015@gmail.com', '02050000015', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:35'),
('2324BM00016', 'stdBM016@gmail.com', '02050000016', '$2y$10$I5w9RS7OVucYykt98wSrcO9t2GGLq16oBPULj6y4RZ4TgrGKjXs.u', 'Student', '2023-06-26 07:29:21', '2023-06-26 07:57:35'),
('am001', 'oudone@gmail.com', '02096942533', '$2y$10$fVh40xxZOrO1gMcWvq9dw.iuMb4im5AC.Fw1zkrNmgEYfce3PBWFq', 'Admin', '2023-06-20 07:52:53', '2023-06-21 09:50:45'),
('off001', 'off001@gmail.com', '02077777777', '$2y$10$.1ML8MJQ8Dm/SWCE2k3usuutGBKPk67XzAG00f7akX6zWDWD.YtDe', 'Officer', '2023-06-21 07:43:53', '2023-06-26 07:23:23'),
('t001', 't001@gmail.com', '02088888888', '$2y$10$b5p4Z8yFyIYvSRc4a8/Hs.9IhufTna9/PvyubgTtn4QV1IaI6tAQy', 'Teacher', '2023-06-21 08:48:43', '2023-06-26 07:22:58'),
('t002', 't002@gmail.com', '02088888881', '$2y$10$mkL3NbGXO6t3yFraK/cPceDB9qEPG9VZJn9iMBXOHurGLaA9HQMPq', 'Teacher', '2023-06-21 08:52:00', '2023-06-26 07:23:11');

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
-- Indexes for table `classgroups`
--
ALTER TABLE `classgroups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_class_id` (`t_id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `season` (`season`),
  ADD KEY `program` (`program`),
  ADD KEY `class_group_id` (`class_group_id`) USING BTREE;

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`classroom`) USING BTREE,
  ADD KEY `id` (`id`);

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
  ADD KEY `program` (`program`),
  ADD KEY `season_start` (`season_start`);

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
  ADD KEY `sub1_id` (`sub1_id`,`sub2_id`,`classroom`),
  ADD KEY `classroom_id` (`classroom`),
  ADD KEY `class_group_id` (`class_group_id`),
  ADD KEY `season` (`season`),
  ADD KEY `sub2_id` (`sub2_id`);

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
-- AUTO_INCREMENT for table `classgroups`
--
ALTER TABLE `classgroups`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Constraints for table `classgroups`
--
ALTER TABLE `classgroups`
  ADD CONSTRAINT `classgroups_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `teachers` (`t_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `classgroups_ibfk_2` FOREIGN KEY (`program`) REFERENCES `programs` (`program`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `classgroups_ibfk_3` FOREIGN KEY (`std_id`) REFERENCES `students` (`std_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `classgroups_ibfk_4` FOREIGN KEY (`season`) REFERENCES `seasons` (`season`) ON DELETE SET NULL ON UPDATE CASCADE;

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
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`program`) REFERENCES `programs` (`program`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`season_start`) REFERENCES `seasons` (`season`) ON DELETE SET NULL ON UPDATE CASCADE;

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
  ADD CONSTRAINT `timetables_ibfk_3` FOREIGN KEY (`classroom`) REFERENCES `classrooms` (`classroom`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `timetables_ibfk_4` FOREIGN KEY (`class_group_id`) REFERENCES `classgroups` (`class_group_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `timetables_ibfk_5` FOREIGN KEY (`season`) REFERENCES `seasons` (`season`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `timetables_ibfk_6` FOREIGN KEY (`sub2_id`) REFERENCES `subjects` (`sub_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
