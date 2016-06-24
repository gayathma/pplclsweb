-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 24, 2016 at 09:18 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pplcls`
--

-- --------------------------------------------------------

--
-- Table structure for table `employeeapparel`
--

CREATE TABLE `employeeapparel` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `salary` decimal(10,0) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employeeit`
--

CREATE TABLE `employeeit` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `salary` decimal(10,0) NOT NULL,
  `role_id` int(11) NOT NULL,
  `experience` int(11) NOT NULL,
  `experience_current_job` int(11) NOT NULL,
  `performance_index` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employeeit_technology`
--

CREATE TABLE `employeeit_technology` (
  `id` int(11) NOT NULL,
  `employeeit_id` int(11) NOT NULL,
  `technology_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_05_18_055202_create_session_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `start_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL,
  `project_type_id` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `start_date`, `end_date`, `project_type_id`, `description`, `updated_at`, `created_at`) VALUES
(1, 'Softlogic Project', '06/22/2016', '07/22/2016', '1', '', '2016-06-22 06:43:37', '2016-06-22 06:43:37'),
(2, 'CRM Project', '07/01/2016', '10/29/2016', '3', '', '2016-06-22 23:27:42', '2016-06-22 23:27:42'),
(3, 'vcv', '06/23/2016', '07/23/2016', '3', '', '2016-06-23 04:55:14', '2016-06-23 04:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `project_prphase`
--

CREATE TABLE `project_prphase` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `prphase_id` int(11) NOT NULL,
  `start_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_prphase`
--

INSERT INTO `project_prphase` (`id`, `project_id`, `prphase_id`, `start_date`, `end_date`, `updated_at`, `created_at`) VALUES
(1, 14, 1, '', '', '2016-06-20 07:15:47', '0000-00-00 00:00:00'),
(2, 14, 3, '', '', '2016-06-20 07:15:47', '0000-00-00 00:00:00'),
(3, 15, 1, '', '', '2016-06-20 08:46:55', '0000-00-00 00:00:00'),
(4, 15, 3, '', '', '2016-06-20 08:46:55', '0000-00-00 00:00:00'),
(5, 16, 1, '', '', '2016-06-20 09:38:40', '0000-00-00 00:00:00'),
(6, 16, 3, '', '', '2016-06-20 09:38:40', '0000-00-00 00:00:00'),
(7, 16, 4, '', '', '2016-06-20 09:38:40', '0000-00-00 00:00:00'),
(8, 17, 1, '', '', '2016-06-21 06:13:15', '0000-00-00 00:00:00'),
(9, 17, 2, '', '', '2016-06-21 06:13:15', '0000-00-00 00:00:00'),
(10, 18, 10, '', '', '2016-06-22 06:19:44', '0000-00-00 00:00:00'),
(11, 19, 11, '', '', '2016-06-22 07:52:51', '0000-00-00 00:00:00'),
(12, 19, 12, '', '', '2016-06-22 07:52:51', '0000-00-00 00:00:00'),
(13, 19, 13, '', '', '2016-06-22 07:52:51', '0000-00-00 00:00:00'),
(14, 1, 13, '', '', '2016-06-22 12:13:37', '0000-00-00 00:00:00'),
(15, 2, 13, '', '', '2016-06-23 04:57:42', '0000-00-00 00:00:00'),
(16, 2, 14, '', '', '2016-06-23 04:57:42', '0000-00-00 00:00:00'),
(17, 2, 15, '', '', '2016-06-23 04:57:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_role`
--

CREATE TABLE `project_role` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `employee_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_type`
--

CREATE TABLE `project_type` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_type`
--

INSERT INTO `project_type` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Agile', '2016-06-21 15:16:27', '0000-00-00 00:00:00'),
(2, 'Iterative', '2016-06-21 15:16:35', '0000-00-00 00:00:00'),
(3, 'Internal', '2016-06-21 15:16:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `prphase`
--

CREATE TABLE `prphase` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prphase`
--

INSERT INTO `prphase` (`id`, `name`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Development', '2016-06-21 10:08:48', '2016-06-21 10:02:52', '2016-06-21 10:08:48'),
(2, 'hkv', '2016-06-21 10:07:48', '2016-06-21 10:05:53', '2016-06-21 10:07:48'),
(4, 'vjhvhjv', '2016-06-21 10:07:30', '2016-06-21 10:07:25', '2016-06-21 10:07:30'),
(5, 'bmnbbn', '2016-06-21 10:11:14', '2016-06-21 10:09:25', '2016-06-21 10:11:14'),
(6, 'mbm', '2016-06-21 10:13:53', '2016-06-21 10:10:53', '2016-06-21 10:13:53'),
(7, 'hkkhk', '2016-06-21 10:19:46', '2016-06-21 10:17:53', '2016-06-21 10:19:46'),
(8, 'gkgk', '2016-06-21 10:21:06', '2016-06-21 10:20:59', '2016-06-21 10:21:06'),
(9, 'vnmvmmn', '2016-06-21 10:21:24', '2016-06-21 10:21:18', '2016-06-21 10:21:24'),
(10, 'Development', '2016-06-22 02:20:21', '2016-06-22 00:46:02', '2016-06-22 02:20:21'),
(11, 'Initiation', '2016-06-22 05:21:25', '2016-06-22 02:21:59', '2016-06-22 05:21:25'),
(12, 'Design', '2016-06-22 05:23:25', '2016-06-22 02:22:11', '2016-06-22 05:23:25'),
(13, 'Development', '2016-06-22 02:22:18', '2016-06-22 02:22:18', NULL),
(14, 'Initiation', '2016-06-22 06:42:57', '2016-06-22 06:42:57', NULL),
(15, 'Design', '2016-06-22 06:43:06', '2016-06-22 06:43:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Business Analyst'),
(2, 'Project Manager');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `payload`, `last_activity`) VALUES
('8ce654b32c6e4f622f61d5d860077449dcffb98a', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiR1Q1VDlKc2ZUSUQ5NHNZRWNxRnh2S2hNYlZhNFcwREtIYlJGT1lPdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoL2dlbmVyYWwtc2V0dGluZy9lZGl0Ijt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM4OiJsb2dpbl84MmU1ZDJjNTZiZGQwODExMzE4ZjBjZjA3OGI3OGJmYyI7aToxO3M6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDY2NzUyMTg0O3M6MToiYyI7aToxNDY2NzUxOTkzO3M6MToibCI7czoxOiIwIjt9fQ==', 1466752184);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `setting` varchar(300) NOT NULL,
  `value` varchar(300) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `setting`, `value`, `updated_at`, `created_at`) VALUES
(1, 'system_type', 'it', '2016-06-23 23:43:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team_employee`
--

CREATE TABLE `team_employee` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `success_rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `technology`
--

CREATE TABLE `technology` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technology`
--

INSERT INTO `technology` (`id`, `name`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Jquery', '2016-06-22 11:44:55', '2016-06-22 02:15:31', NULL),
(3, 'PHP', '2016-06-22 04:56:44', '2016-06-22 04:56:44', NULL),
(4, 'JAVA', '2016-06-22 04:56:51', '2016-06-22 04:56:51', NULL),
(5, 'Oracle', '2016-06-22 04:57:00', '2016-06-22 04:57:00', NULL),
(6, 'Mysql', '2016-06-22 04:57:17', '2016-06-22 04:57:17', NULL),
(7, 'Hadoop', '2016-06-22 04:57:58', '2016-06-22 04:57:58', NULL),
(8, 'Magento', '2016-06-22 04:58:08', '2016-06-22 04:58:08', NULL),
(9, 'Codeigniter', '2016-06-22 04:58:16', '2016-06-22 04:58:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'gayathma3@gmail.com', '$2y$10$m2gb2u11ZQCLbjylTd5zxuXVrumhT4lQdONH8cLUlgPZyXu9OUSk.', 'o38oAK2yAEyP87xe7m9pJpCMgtCz65G7RsIAfMb5X7XXPPE4OX7M801F4Oi4', '1', '2016-06-24 01:36:03', '2016-06-24 01:38:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employeeapparel`
--
ALTER TABLE `employeeapparel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeeit`
--
ALTER TABLE `employeeit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeeit_technology`
--
ALTER TABLE `employeeit_technology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_prphase`
--
ALTER TABLE `project_prphase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_role`
--
ALTER TABLE `project_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_type`
--
ALTER TABLE `project_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prphase`
--
ALTER TABLE `prphase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_employee`
--
ALTER TABLE `team_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technology`
--
ALTER TABLE `technology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeeapparel`
--
ALTER TABLE `employeeapparel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employeeit`
--
ALTER TABLE `employeeit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employeeit_technology`
--
ALTER TABLE `employeeit_technology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `project_prphase`
--
ALTER TABLE `project_prphase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `project_role`
--
ALTER TABLE `project_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_type`
--
ALTER TABLE `project_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `prphase`
--
ALTER TABLE `prphase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `team_employee`
--
ALTER TABLE `team_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `technology`
--
ALTER TABLE `technology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
