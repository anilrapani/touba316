-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2017 at 09:37 AM
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
  `role_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1- active, 2-inactive',
  `deleted` tinyint(1) NOT NULL COMMENT '1-deleted, 2-not deleted ',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- AUTO_INCREMENT for table `t_role`
--
ALTER TABLE `t_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_state`
--
ALTER TABLE `t_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
