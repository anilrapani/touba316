-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2017 at 06:30 PM
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
(1, 'Test1', 6, 1, 2, 1, 1, '2017-12-04 16:09:18', '2017-12-04 16:31:00'),
(2, '0', 6, 1, 1, 1, 1, '2017-12-04 16:09:55', '2017-12-04 16:35:20'),
(3, '0', 6, 1, 1, 1, 1, '2017-12-04 16:11:42', '2017-12-04 16:35:25'),
(4, '0', 6, 1, 1, 1, 1, '2017-12-04 16:15:08', '2017-12-04 16:35:32'),
(5, 'Test2', 6, 1, 2, 1, 1, '2017-12-04 16:16:03', '2017-12-04 16:35:42');

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
(1, 'India', 1, 2, 1, 1, '2017-12-03 17:46:25', '2017-12-04 15:07:28'),
(2, 'Usa', 1, 2, 1, 0, '2017-12-03 17:47:38', '0000-00-00 00:00:00'),
(3, 'Bangla', 1, 2, 1, 0, '2017-12-03 17:56:57', '0000-00-00 00:00:00'),
(4, 'Russia', 1, 2, 1, 0, '2017-12-03 18:02:42', '0000-00-00 00:00:00'),
(5, 'Africa', 1, 2, 1, 0, '2017-12-03 18:02:48', '0000-00-00 00:00:00'),
(6, 'Jamaica1', 1, 1, 1, 1, '2017-12-03 18:02:53', '2017-12-04 06:13:02'),
(7, 'Myanmar', 1, 1, 1, 1, '2017-12-03 18:05:49', '2017-12-04 06:12:41'),
(8, 'Country6', 1, 1, 1, 1, '2017-12-04 06:13:38', '2017-12-04 06:13:45'),
(9, 'Country7', 1, 1, 1, 1, '2017-12-04 06:13:54', '2017-12-04 06:42:23'),
(10, 'C1', 1, 2, 1, 0, '2017-12-04 07:19:50', '0000-00-00 00:00:00'),
(11, 'C4', 1, 2, 1, 1, '2017-12-04 07:19:53', '2017-12-04 15:18:26');

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
(1, 'Test2', 0, 1, 1, 1, 1, '2017-12-04 17:16:03', '2017-12-04 17:16:21'),
(2, 'Discipline1', 0, 1, 2, 1, 0, '2017-12-04 17:16:38', '0000-00-00 00:00:00'),
(3, 'Discipline2', 0, 1, 2, 1, 0, '2017-12-04 17:16:44', '0000-00-00 00:00:00'),
(4, 'Discipline3', 0, 1, 2, 1, 0, '2017-12-04 17:16:55', '0000-00-00 00:00:00'),
(5, 'Discipline4', 0, 1, 2, 1, 0, '2017-12-04 17:16:58', '0000-00-00 00:00:00'),
(6, 'Discipline5', 0, 1, 2, 1, 0, '2017-12-04 17:17:01', '0000-00-00 00:00:00'),
(7, 'Discipline7', 0, 1, 2, 1, 0, '2017-12-04 17:17:07', '0000-00-00 00:00:00'),
(8, 'Test', 0, 1, 1, 2, 2, '2017-12-05 11:25:32', '2017-12-05 11:26:29');

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
(2, 'Job 2', 4, 5, 1, 1, 1, 1, '2017-12-05 14:17:10', '2017-12-05 15:11:52'),
(3, 'Job3', 2, 4, 1, 2, 1, 1, '2017-12-05 15:12:03', '2017-12-05 15:16:29');

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
(1, 4, 3, 0, 1, 2, 4, 0, '2017-12-05 18:29:28', '0000-00-00 00:00:00');

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
(1, '0', 1, 1, 1, 1, '2017-12-05 12:14:49', '2017-12-05 14:14:06'),
(2, 'Temporary1', 1, 1, 1, 1, '2017-12-05 14:08:31', '2017-12-05 14:13:57'),
(3, 'Full Time', 1, 1, 1, 1, '2017-12-05 14:14:19', '2017-12-05 15:10:04'),
(4, 'Part Time', 1, 2, 1, 1, '2017-12-05 14:14:44', '2017-12-05 15:14:30');

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

--
-- Dumping data for table `t_state`
--

INSERT INTO `t_state` (`id`, `name`, `country_id`, `status`, `deleted`, `created_by`, `updated_by`, `create_time`, `update_time`) VALUES
(3, 'Testw', 2, 1, 1, 1, 1, '2017-12-04 13:47:48', '2017-12-04 15:05:13'),
(4, 'Test1', 3, 1, 1, 1, 1, '2017-12-04 15:05:26', '2017-12-04 15:06:36'),
(5, 'Test2', 4, 1, 1, 1, 1, '2017-12-04 15:05:40', '2017-12-04 15:05:47'),
(6, 'Maharastra', 1, 1, 2, 1, 1, '2017-12-04 15:10:37', '2017-12-04 15:55:57');

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
(1, 'Dsad', 'admin', 'admin@touba.com', '', '$2y$10$.vh0nF8hsjiKGms8sRC1fewLlj5JEyFBs.XqN94TvzQmyODcSWpgO', 1, 1, 2, 1, 1, '0000-00-00 00:00:00', '2017-12-04 04:14:06'),
(2, 'Dasdasd', '', 'jobprovider@touba.com', '1234567891', '$2y$10$nbtypL49eO.BqGbts3oZeu/c/zTc5GhOpB/Gmq5lE4UWoBcvyM1jG', 2, 1, 2, 1, 1, '2017-12-02 15:39:38', '2017-12-02 16:01:51'),
(3, 'Test1', '', 'jobseeker@touba.com', '1234567891', '$2y$10$b4l13VXp/dlOTPbB2phvW.EgUiG/JJFQKJ40dFPHayq.DySCPTRua', 3, 1, 2, 1, 1, '2017-12-02 16:02:20', '2017-12-04 04:02:57'),
(4, 'Test2', '', 'jobseeker@touba.com', '1234567891', '$2y$10$i1ksEF1ynObyRGWJ.Iw6ku9MkKgTen4nxRnzjKNX1Eh99IzhZn.Ye', 3, 1, 2, 1, 1, '2017-12-02 16:19:06', '2017-12-03 12:05:06'),
(5, 'Test', '', 'test.webap3@gmail.com', '1234567891', '$2y$10$UE5faz6xdq8C5j1uLdgcfOJfzOCoH1r0v58CyUi/AcngYZk5wGjQq', 2, 1, 1, 1, 1, '2017-12-02 17:24:00', '2017-12-05 15:27:43'),
(6, 'Anil', '', 'anil@mail.com', '1234567891', '$2y$10$hzgUiQnfweHpU1cGfQ7e0.YpkjX/WxqiXlUlC9QSSeihH/7ZJcOU6', 2, 1, 1, 0, 1, '2017-12-03 13:28:50', '2017-12-04 04:16:30'),
(7, 'Dsada', '', 'adsada@dsfs.com', '1234567891', '$2y$10$OVcWyDMp0DUKx7PLKQqXR.pJu0fzAvBIjml3zzXJk/vN8Oguuofe.', 2, 1, 1, 0, 1, '2017-12-03 13:33:02', '2017-12-04 06:10:29'),
(8, 'Anil', '', 'test@mail.com', '1234567891', '$2y$10$xGDbUZ2eKzPRcy3Wx0FiCOMB9QRsSOBcZyhV.ETPMbLHTpJ/pc9Im', 2, 1, 1, 0, 1, '2017-12-03 13:33:57', '2017-12-04 04:16:47'),
(9, 'Dasdas', '', 'dasda@dsada.com', '1234567891', '$2y$10$xy5PZYchw55UZStufZHav.egjumXLcyJRsX8A4s7.QRgbNm.peDye', 3, 1, 1, 0, 1, '2017-12-03 13:34:24', '2017-12-05 15:26:13'),
(10, 'Dsadas', '', 't1@mail.com', '1234567891', '$2y$10$xy5PZYchw55UZStufZHav.egjumXLcyJRsX8A4s7.QRgbNm.peDye', 2, 1, 1, 0, 1, '2017-12-03 13:37:56', '2017-12-05 15:26:29'),
(14, 'U1', '', 'u1@mail.com', '1234567891', '$2y$10$4z.7Sjy4jn.u1Sjw.b.mN.7ffYL7w9cJLfJSmR6Or8/OXPUalp48e', 2, 1, 1, 1, 1, '2017-12-04 07:26:42', '2017-12-05 15:26:40');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_country`
--
ALTER TABLE `t_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t_discipline`
--
ALTER TABLE `t_discipline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_job`
--
ALTER TABLE `t_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_jobseeker_saved_applied_jobs`
--
ALTER TABLE `t_jobseeker_saved_applied_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_job_type`
--
ALTER TABLE `t_job_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
