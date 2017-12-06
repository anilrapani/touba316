-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2017 at 07:41 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `touba316`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_city`
--

CREATE TABLE `t_city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1- active, 2-inactive',
  `deleted` tinyint(1) NOT NULL COMMENT '1-deleted, 2-not deleted ',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_city`
--

INSERT INTO `t_city` (`id`, `name`, `state_id`, `status`, `deleted`, `created_by`, `updated_by`, `create_time`, `update_time`) VALUES
(6, 'Hyderabad', 9, 1, 2, 1, 1, '2017-12-06 19:17:46', '2017-12-06 19:18:19'),
(7, 'Ranga Reddy', 9, 1, 2, 1, 0, '2017-12-06 19:18:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_country`
--

CREATE TABLE `t_country` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1- active, 2-inactive',
  `deleted` tinyint(1) NOT NULL COMMENT '1-deleted, 2-not deleted ',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_country`
--

INSERT INTO `t_country` (`id`, `name`, `status`, `deleted`, `created_by`, `updated_by`, `create_time`, `update_time`) VALUES
(12, 'India', 1, 2, 1, 0, '2017-12-06 19:12:30', '0000-00-00 00:00:00'),
(13, 'Usa', 1, 2, 1, 0, '2017-12-06 19:12:38', '0000-00-00 00:00:00'),
(14, 'Australia', 1, 2, 1, 0, '2017-12-06 19:12:43', '0000-00-00 00:00:00'),
(15, 'Sri Lanka', 1, 2, 1, 0, '2017-12-06 19:12:48', '0000-00-00 00:00:00'),
(16, 'South Africa', 1, 2, 1, 0, '2017-12-06 19:12:56', '0000-00-00 00:00:00'),
(17, 'China', 1, 2, 1, 0, '2017-12-06 19:13:01', '0000-00-00 00:00:00'),
(18, 'Russia', 1, 2, 1, 0, '2017-12-06 19:13:04', '0000-00-00 00:00:00'),
(19, 'Newzeland', 1, 2, 1, 0, '2017-12-06 19:13:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_discipline`
--

CREATE TABLE `t_discipline` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1- active, 2-inactive',
  `deleted` tinyint(1) NOT NULL COMMENT '1-deleted, 2-not deleted ',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_discipline`
--

INSERT INTO `t_discipline` (`id`, `name`, `parent_id`, `status`, `deleted`, `created_by`, `updated_by`, `create_time`, `update_time`) VALUES
(11, 'Computer Science Engineering', 0, 1, 2, 1, 0, '2017-12-06 19:10:48', '0000-00-00 00:00:00'),
(12, 'Manufacturing', 0, 1, 2, 1, 0, '2017-12-06 19:11:03', '0000-00-00 00:00:00'),
(13, 'Human Resources', 0, 1, 2, 1, 0, '2017-12-06 19:11:13', '0000-00-00 00:00:00'),
(14, 'Heath Care', 0, 1, 2, 1, 0, '2017-12-06 19:11:22', '0000-00-00 00:00:00'),
(15, 'Finance', 0, 1, 2, 1, 0, '2017-12-06 19:11:25', '0000-00-00 00:00:00'),
(16, 'Government', 0, 1, 2, 1, 0, '2017-12-06 19:11:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_job`
--

CREATE TABLE `t_job` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `job_type_id` int(11) NOT NULL,
  `discipline_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1- active, 2-inactive',
  `deleted` tinyint(1) NOT NULL COMMENT '1-deleted, 2-not deleted ',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_job`
--

INSERT INTO `t_job` (`id`, `name`, `job_type_id`, `discipline_id`, `status`, `deleted`, `created_by`, `updated_by`, `create_time`, `update_time`) VALUES
(11, 'Software Engineer', 6, 11, 1, 2, 2, 0, '2017-12-06 19:21:22', '0000-00-00 00:00:00'),
(12, 'Senior Software Engineer', 6, 11, 1, 2, 2, 0, '2017-12-06 19:21:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_jobseeker_saved_applied_jobs`
--

CREATE TABLE `t_jobseeker_saved_applied_jobs` (
  `id` int(11) NOT NULL,
  `user_id_jobseeker` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1-saved 2-applied',
  `status` tinyint(1) NOT NULL COMMENT '1- active, 2-inactive',
  `deleted` tinyint(1) NOT NULL COMMENT '1-deleted, 2-not deleted ',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_jobseeker_saved_applied_jobs`
--

INSERT INTO `t_jobseeker_saved_applied_jobs` (`id`, `user_id_jobseeker`, `job_id`, `type`, `status`, `deleted`, `created_by`, `updated_by`, `create_time`, `update_time`) VALUES
(21, 3, 11, 1, 1, 2, 3, 0, '2017-12-06 19:32:07', '0000-00-00 00:00:00'),
(22, 3, 11, 2, 1, 2, 3, 0, '2017-12-06 19:32:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_job_type`
--

CREATE TABLE `t_job_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1- active, 2-inactive',
  `deleted` tinyint(1) NOT NULL COMMENT '1-deleted, 2-not deleted ',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_job_type`
--

INSERT INTO `t_job_type` (`id`, `name`, `status`, `deleted`, `created_by`, `updated_by`, `create_time`, `update_time`) VALUES
(5, 'Temporary', 1, 2, 1, 0, '2017-12-06 19:18:51', '0000-00-00 00:00:00'),
(6, 'Permanent', 1, 2, 1, 0, '2017-12-06 19:18:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_recruiter_save_jobseeker`
--

CREATE TABLE `t_recruiter_save_jobseeker` (
  `id` int(11) NOT NULL,
  `user_id_recruiter` int(11) NOT NULL,
  `user_id_jobseeker` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1- active, 2-inactive',
  `deleted` tinyint(1) NOT NULL COMMENT '1-deleted, 2-not deleted ',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_recruiter_save_jobseeker`
--

INSERT INTO `t_recruiter_save_jobseeker` (`id`, `user_id_recruiter`, `user_id_jobseeker`, `status`, `deleted`, `created_by`, `updated_by`, `create_time`, `update_time`) VALUES
(5, 2, 18, 1, 2, 2, 0, '2017-12-06 19:26:11', '0000-00-00 00:00:00'),
(6, 2, 15, 1, 2, 2, 0, '2017-12-06 19:28:04', '0000-00-00 00:00:00'),
(7, 2, 17, 1, 2, 2, 0, '2017-12-06 19:29:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_reset_password`
--

CREATE TABLE `t_reset_password` (
  `id` bigint(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` int(11) NOT NULL DEFAULT '2',
  `created_by` bigint(20) NOT NULL,
  `create_time` datetime NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_role`
--

CREATE TABLE `t_role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1- active, 2-inactive',
  `deleted` tinyint(1) NOT NULL COMMENT '1-deleted, 2-not deleted ',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_role`
--

INSERT INTO `t_role` (`id`, `name`, `status`, `deleted`, `created_by`, `updated_by`, `create_time`, `update_time`) VALUES
(1, 'admin', 1, 2, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'recruiter', 1, 2, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'jobseeker', 1, 2, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_state`
--

CREATE TABLE `t_state` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `country_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1- active, 2-inactive',
  `deleted` tinyint(1) NOT NULL COMMENT '1-deleted, 2-not deleted ',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_state`
--

INSERT INTO `t_state` (`id`, `name`, `country_id`, `status`, `deleted`, `created_by`, `updated_by`, `create_time`, `update_time`) VALUES
(8, 'Andhra Pradesh', 12, 1, 2, 1, 1, '2017-12-06 19:16:16', '2017-12-06 19:17:09'),
(9, 'Telangana', 12, 1, 2, 1, 0, '2017-12-06 19:16:23', '0000-00-00 00:00:00'),
(10, 'Delhi', 12, 1, 2, 1, 0, '2017-12-06 19:16:31', '0000-00-00 00:00:00'),
(11, 'Karnataka', 12, 1, 2, 1, 0, '2017-12-06 19:16:39', '0000-00-00 00:00:00'),
(12, 'Tamilnadu', 12, 1, 2, 1, 0, '2017-12-06 19:16:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(128) CHARACTER SET utf8 NOT NULL COMMENT 'login email',
  `mobile` varchar(20) NOT NULL,
  `password` varchar(128) CHARACTER SET utf8 NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1- active, 2-inactive',
  `deleted` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1-deleted, 2-not deleted ',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `name`, `user_name`, `email`, `mobile`, `password`, `role_id`, `status`, `deleted`, `created_by`, `updated_by`, `create_time`, `update_time`) VALUES
(1, 'Admin', 'admin', 'admin@touba.com', '9014608228', '$2y$10$.vh0nF8hsjiKGms8sRC1fewLlj5JEyFBs.XqN94TvzQmyODcSWpgO', 1, 1, 2, 1, 1, '0000-00-00 00:00:00', '2017-12-04 04:14:06'),
(2, 'Job Provider', '', 'jobprovider@touba.com', '1234567891', '$2y$10$nbtypL49eO.BqGbts3oZeu/c/zTc5GhOpB/Gmq5lE4UWoBcvyM1jG', 2, 1, 2, 1, 1, '2017-12-02 15:39:38', '2017-12-02 16:01:51'),
(3, 'Job Seeker', '', 'jobseeker@touba.com', '1234567891', '$2y$10$b4l13VXp/dlOTPbB2phvW.EgUiG/JJFQKJ40dFPHayq.DySCPTRua', 3, 1, 2, 1, 1, '2017-12-02 16:02:20', '2017-12-04 04:02:57'),
(15, 'User1', '', 'user1@touba.com', '1234567891', '$2y$10$uS8BnlZ3F.XP9O15GBXsIunEXVOnzdMg1im8w.KmY.FMBEp3ewKQG', 3, 1, 2, 1, 0, '2017-12-06 19:07:06', '0000-00-00 00:00:00'),
(16, 'User2', '', 'user2@touba.com', '1234567891', '$2y$10$mZ87xZB.zsrjjthvX0w0D.LvVm8GM6jZjo6vjYSjnqsjACIALmWA.', 2, 1, 2, 1, 0, '2017-12-06 19:08:11', '0000-00-00 00:00:00'),
(17, 'User3', '', 'user3@touba.com', '1234567891', '$2y$10$ensjw/xqQpgyFcDBfaxt2uIZ3iuC4z5DSKNWLIpEYbYh5XjOzMnrS', 3, 1, 2, 1, 0, '2017-12-06 19:08:30', '0000-00-00 00:00:00'),
(18, 'User4', '', 'user4@touba.com', '1234567891', '$2y$10$rPYCQ3CsTrzrgjxglSWi6uOSaLY9M1IcfumaIvTZMcHG9U.00EO2O', 3, 1, 2, 1, 0, '2017-12-06 19:09:14', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_city`
--
ALTER TABLE `t_city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_City` (`state_id`);

--
-- Indexes for table `t_country`
--
ALTER TABLE `t_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_discipline`
--
ALTER TABLE `t_discipline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`(30));

--
-- Indexes for table `t_job`
--
ALTER TABLE `t_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Discipline` (`discipline_id`),
  ADD KEY `FK_CreatedBy` (`created_by`),
  ADD KEY `FK_JobType` (`job_type_id`);
ALTER TABLE `t_job` ADD FULLTEXT KEY `name` (`name`);

--
-- Indexes for table `t_jobseeker_saved_applied_jobs`
--
ALTER TABLE `t_jobseeker_saved_applied_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_id_jobseeker` (`user_id_jobseeker`),
  ADD KEY `FK_job_id` (`job_id`);

--
-- Indexes for table `t_job_type`
--
ALTER TABLE `t_job_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_recruiter_save_jobseeker`
--
ALTER TABLE `t_recruiter_save_jobseeker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_RecruiterID` (`user_id_recruiter`),
  ADD KEY `FK_JobseekerID` (`user_id_jobseeker`);

--
-- Indexes for table `t_reset_password`
--
ALTER TABLE `t_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_role`
--
ALTER TABLE `t_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_state`
--
ALTER TABLE `t_state`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Country` (`country_id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `FK_UserRole` (`role_id`);
ALTER TABLE `t_user` ADD FULLTEXT KEY `name_3` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_city`
--
ALTER TABLE `t_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_country`
--
ALTER TABLE `t_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `t_discipline`
--
ALTER TABLE `t_discipline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `t_job`
--
ALTER TABLE `t_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_jobseeker_saved_applied_jobs`
--
ALTER TABLE `t_jobseeker_saved_applied_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `t_job_type`
--
ALTER TABLE `t_job_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_recruiter_save_jobseeker`
--
ALTER TABLE `t_recruiter_save_jobseeker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_reset_password`
--
ALTER TABLE `t_reset_password`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `t_role`
--
ALTER TABLE `t_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_state`
--
ALTER TABLE `t_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_city`
--
ALTER TABLE `t_city`
  ADD CONSTRAINT `FK_City` FOREIGN KEY (`state_id`) REFERENCES `t_state` (`id`);

--
-- Constraints for table `t_job`
--
ALTER TABLE `t_job`
  ADD CONSTRAINT `FK_CreatedBy` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`id`),
  ADD CONSTRAINT `FK_Discipline` FOREIGN KEY (`discipline_id`) REFERENCES `t_discipline` (`id`),
  ADD CONSTRAINT `FK_JobType` FOREIGN KEY (`job_type_id`) REFERENCES `t_job_type` (`id`);

--
-- Constraints for table `t_jobseeker_saved_applied_jobs`
--
ALTER TABLE `t_jobseeker_saved_applied_jobs`
  ADD CONSTRAINT `FK_job_id` FOREIGN KEY (`job_id`) REFERENCES `t_job` (`id`),
  ADD CONSTRAINT `FK_user_id_jobseeker` FOREIGN KEY (`user_id_jobseeker`) REFERENCES `t_user` (`id`);

--
-- Constraints for table `t_recruiter_save_jobseeker`
--
ALTER TABLE `t_recruiter_save_jobseeker`
  ADD CONSTRAINT `FK_JobseekerID` FOREIGN KEY (`user_id_jobseeker`) REFERENCES `t_user` (`id`),
  ADD CONSTRAINT `FK_RecruiterID` FOREIGN KEY (`user_id_recruiter`) REFERENCES `t_user` (`id`);

--
-- Constraints for table `t_state`
--
ALTER TABLE `t_state`
  ADD CONSTRAINT `FK_Country` FOREIGN KEY (`country_id`) REFERENCES `t_country` (`id`);

--
-- Constraints for table `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `FK_UserRole` FOREIGN KEY (`role_id`) REFERENCES `t_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
