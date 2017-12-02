-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2017 at 05:41 PM
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
  `name` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1- active, 2-inactive',
  `deleted` tinyint(1) NOT NULL COMMENT '1-deleted, 2-not deleted ',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `t_job_type`
--

CREATE TABLE `t_job_type` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1- active, 2-inactive',
  `deleted` tinyint(1) NOT NULL COMMENT '1-deleted, 2-not deleted ',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Dumping data for table `t_reset_password`
--

INSERT INTO `t_reset_password` (`id`, `email`, `activation_id`, `agent`, `client_ip`, `status`, `deleted`, `created_by`, `create_time`, `updated_by`, `update_time`) VALUES
(5, 'test.webap3@gmail.com', 'pc32mETyMrA4DZf', 'Chrome 62.0.3202.94', '::1', 1, 2, 0, '2017-12-02 17:26:50', NULL, NULL),
(6, 'test.webap3@gmail.com', 'qJNayMfFsOYDBuX', 'Chrome 62.0.3202.94', '::1', 1, 2, 0, '2017-12-02 17:27:18', NULL, NULL),
(7, 'test.webap3@gmail.com', 'Q2t8g0IfPlKBz1O', 'Chrome 62.0.3202.94', '::1', 1, 2, 0, '2017-12-02 17:27:23', NULL, NULL),
(8, 'test.webap@gmail.com', 'RGrMnoTyBLjJx78', 'Chrome 62.0.3202.94', '::1', 1, 2, 0, '2017-12-02 17:31:24', NULL, NULL),
(9, 'test.webap@gmail.com', '1Z26Y7a8WoSEzpN', 'Chrome 62.0.3202.94', '::1', 1, 2, 0, '2017-12-02 17:31:40', NULL, NULL),
(10, 'test.webap@gmail.com', 't1qechZHg9JvOTs', 'Chrome 62.0.3202.94', '::1', 1, 2, 0, '2017-12-02 17:32:10', NULL, NULL),
(11, 'test.webap@gmail.com', 'c7OxV6rkfdWXEo9', 'Chrome 62.0.3202.94', '::1', 1, 2, 0, '2017-12-02 17:34:35', NULL, NULL),
(12, 'test.webap@gmail.com', 'pBcszdChgrV43kA', 'Chrome 62.0.3202.94', '::1', 1, 2, 0, '2017-12-02 17:35:29', NULL, NULL),
(13, 'test.webap@gmail.com', 'b32wkACLvNj7QnJ', 'Chrome 62.0.3202.94', '::1', 1, 2, 0, '2017-12-02 17:36:49', NULL, NULL),
(14, 'test.webap@gmail.com', 'ckyT0IrdhqZbLXt', 'Chrome 62.0.3202.94', '::1', 1, 2, 0, '2017-12-02 17:37:12', NULL, NULL),
(15, 'test.webap@gmail.com', '5uJCIWLbQ3gYRex', 'Chrome 62.0.3202.94', '::1', 1, 2, 0, '2017-12-02 17:37:18', NULL, NULL),
(16, 'test.webap@gmail.com', 'OJgVzn8tjKwLYhU', 'Chrome 62.0.3202.94', '::1', 1, 2, 0, '2017-12-02 17:37:37', NULL, NULL),
(17, 'test.webap@gmail.com', 'OdDN7ckHhJWfRaz', 'Chrome 62.0.3202.94', '::1', 1, 2, 0, '2017-12-02 17:37:57', NULL, NULL);

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
(1, 'admin', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'recruiter', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'jobseeker', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  `status` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1- active, 2-inactive',
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
(1, 'admin', 'admin', 'admin@kastech.com', '', '$2y$10$WQQRBQDkxV/98bqK.24Dp.uMVS6KcztVqdwwTrOBLIWLSeSqE2gii', 1, 1, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Dasdasd', '', 'test.webap1@gmail.com', '1234567891', '$2y$10$nbtypL49eO.BqGbts3oZeu/c/zTc5GhOpB/Gmq5lE4UWoBcvyM1jG', 2, 2, 1, 1, 1, '2017-12-02 15:39:38', '2017-12-02 16:01:51'),
(3, 'Test', '', 'test.webap@gmail.com', '22', '$2y$10$b4l13VXp/dlOTPbB2phvW.EgUiG/JJFQKJ40dFPHayq.DySCPTRua', 2, 2, 2, 1, 0, '2017-12-02 16:02:20', '0000-00-00 00:00:00'),
(4, 'Test', '', 'jobseeker@touba.com', '1234567891', '$2y$10$i1ksEF1ynObyRGWJ.Iw6ku9MkKgTen4nxRnzjKNX1Eh99IzhZn.Ye', 3, 2, 2, 1, 0, '2017-12-02 16:19:06', '0000-00-00 00:00:00'),
(5, 'Test', '', 'test.webap3@gmail.com', '1234567891', '$2y$10$UE5faz6xdq8C5j1uLdgcfOJfzOCoH1r0v58CyUi/AcngYZk5wGjQq', 2, 2, 2, 1, 5, '2017-12-02 17:24:00', '2017-12-02 17:25:12');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_country`
--
ALTER TABLE `t_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_discipline`
--
ALTER TABLE `t_discipline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_job`
--
ALTER TABLE `t_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_jobseeker_saved_applied_jobs`
--
ALTER TABLE `t_jobseeker_saved_applied_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_job_type`
--
ALTER TABLE `t_job_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_recruiter_save_jobseeker`
--
ALTER TABLE `t_recruiter_save_jobseeker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
