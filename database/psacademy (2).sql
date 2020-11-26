-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2020 at 10:55 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spaacademy`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminmenus`
--

CREATE TABLE `adminmenus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menutitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentid` bigint(20) UNSIGNED NOT NULL,
  `showinnav` tinyint(1) DEFAULT NULL,
  `setasdefault` tinyint(1) DEFAULT NULL,
  `iconclass` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urllink` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `displayorder` int(11) DEFAULT NULL,
  `mselect` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apply_courses`
--

CREATE TABLE `apply_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `is_new` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apply_courses`
--

INSERT INTO `apply_courses` (`id`, `user_id`, `course_id`, `description`, `created_at`, `updated_at`, `is_deleted`, `is_new`) VALUES
(1, 2, 1, 'i have submiited fee already', '2020-08-14 13:44:12', '2020-08-15 10:43:57', 1, 0),
(2, 2, 2, 'zcvsfsf', '2020-08-14 14:13:29', '2020-08-15 10:53:39', 1, 0),
(3, 2, 1, NULL, '2020-08-15 10:36:56', '2020-08-15 10:53:34', 1, 0),
(4, 2, 1, NULL, '2020-08-15 10:57:00', '2020-08-15 10:58:41', 1, 0),
(5, 2, 1, NULL, '2020-08-15 10:58:50', '2020-08-25 00:21:16', 1, 0),
(6, 6, 5, NULL, '2020-08-17 01:26:38', '2020-08-25 00:21:57', 1, 0),
(7, 7, 1, NULL, '2020-08-17 01:39:19', '2020-08-25 00:21:55', 1, 0),
(8, 7, 2, NULL, '2020-08-17 01:39:23', '2020-08-25 00:21:11', 1, 0),
(9, 7, 1, NULL, '2020-08-17 01:39:30', '2020-08-25 00:21:07', 1, 0),
(10, 7, 1, NULL, '2020-08-17 01:48:44', '2020-08-25 00:21:02', 1, 0),
(11, 9, 2, NULL, '2020-08-17 19:07:04', '2020-08-25 00:20:57', 1, 0),
(12, 9, 1, NULL, '2020-08-17 19:07:18', '2020-08-25 00:20:53', 1, 0),
(13, 10, 1, NULL, '2020-09-14 01:50:36', '2020-10-01 13:03:22', 1, 0),
(14, 11, 5, NULL, '2020-09-28 01:03:12', '2020-10-01 13:03:29', 1, 0),
(15, 11, 6, NULL, '2020-09-28 01:03:12', '2020-10-01 13:04:01', 1, 0),
(16, 12, 1, NULL, '2020-11-22 21:32:31', '2020-11-25 14:15:20', 0, 0),
(17, 12, 2, NULL, '2020-11-22 21:32:31', '2020-11-25 14:15:20', 0, 0),
(18, 13, 7, NULL, '2020-11-25 10:41:15', '2020-11-25 14:15:20', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `instructor_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `code`, `price`, `description`, `user_id`, `grade_id`, `status`, `created_at`, `updated_at`, `instructor_id`, `deleted_at`) VALUES
(1, 'English', NULL, 2500, NULL, 1, 1, 1, '2020-08-14 04:17:34', '2020-08-17 01:51:43', 8, NULL),
(2, 'Mathematics', NULL, 2500, NULL, 1, 1, 1, '2020-08-14 04:17:47', '2020-08-14 04:17:47', 3, NULL),
(3, 'Urdu', NULL, 2500, NULL, 1, 2, 1, '2020-08-14 04:18:00', '2020-08-14 04:18:00', 3, NULL),
(5, 'Physics', NULL, 2000, NULL, 1, 2, 1, '2020-08-16 12:53:41', '2020-08-16 12:53:41', 3, NULL),
(6, 'Chemistry', NULL, 2500, NULL, 1, 2, 1, '2020-08-17 01:42:11', '2020-08-17 01:42:11', 3, NULL),
(7, 'English', NULL, 25000, NULL, 1, 4, 1, '2020-11-09 17:05:44', '2020-11-09 17:05:44', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `course_id`, `user_id`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 1, 1, '2020-08-14 04:45:23', '2020-08-14 04:45:23'),
(7, 2, 2, 1, 1, '2020-08-15 10:53:39', '2020-08-15 10:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `name`, `code`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '9th Grade', '9th', 1, 1, '2020-08-14 04:14:06', '2020-08-14 04:14:43'),
(2, '10th Grade', '10th', 1, 1, '2020-08-14 04:14:53', '2020-08-14 04:14:53'),
(3, '11th Grade', '11th', 1, 1, '2020-08-14 04:15:10', '2020-08-14 04:15:10'),
(4, '12th Grade', '12th', 1, 1, '2020-08-14 04:15:21', '2020-08-14 04:15:21'),
(5, 'i.com', '11th', 1, 1, '2020-10-01 12:56:53', '2020-10-01 12:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_09_072406_create_adminmenus_table', 1),
(5, '2020_06_09_072620_create_roles_table', 1),
(6, '2020_06_29_000001_create_grades_table', 1),
(7, '2020_06_29_120824_create_courses_table', 1),
(8, '2020_06_29_121652_create_enrollments_table', 1),
(9, '2020_07_19_190805_create_periods_table', 1),
(10, '2020_08_14_094718_add_grade_id_to_users', 2),
(11, '2020_08_14_183457_create_course_apply_table', 3),
(12, '2020_08_14_184528_add_is_deleted_to_applycourse', 4),
(13, '2020_08_14_185518_add_is_new__to_applycourse', 5),
(14, '2020_08_16_172301_add_instructor_id_to_courses', 6),
(15, '2020_11_08_164541_make_grade_id_nullable_in_users', 7),
(16, '2020_11_08_171442_add_two_columns_to_users', 8),
(17, '2020_11_26_094904_soft_delete_courses', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `periods`
--

CREATE TABLE `periods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_done` int(11) NOT NULL DEFAULT 0,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period_at` datetime NOT NULL,
  `period_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periods`
--

INSERT INTO `periods` (`id`, `user_id`, `course_id`, `grade_id`, `status`, `is_done`, `link`, `period_at`, `period_time`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 'https://www.daterangepicker.com/#example4', '1970-01-01 00:00:00', NULL, '2020-08-14 12:57:20', '2020-11-26 16:17:50'),
(2, 1, 1, 1, 1, 1, 'https://www.daterangepicker.com/#example4', '2020-07-24 11:00:00', NULL, '2020-08-14 12:59:18', '2020-11-26 16:17:50'),
(3, 1, 1, 1, 1, 1, 'https://www.daterangepicker.com/#example4', '1970-01-01 00:00:00', NULL, '2020-08-14 13:02:35', '2020-11-26 16:17:50'),
(4, 1, 1, 1, 1, 1, 'https://www.daterangepicker.com/#example4', '2020-08-24 11:00:00', NULL, '2020-08-14 13:02:58', '2020-11-26 16:17:50'),
(5, 1, 2, 1, 1, 1, 'https://www.daterangepicker.com/#example4', '2020-08-15 11:00:00', NULL, '2020-08-14 13:04:26', '2020-11-26 16:17:50'),
(6, 1, 1, 1, 1, 1, 'https://www.daterangepicker.com/#example4', '2020-07-16 11:00:00', NULL, '2020-08-15 10:35:56', '2020-11-26 16:17:50'),
(7, 1, 3, 2, 1, 1, 'https://www.daterangepicker.com/#example4', '2020-08-24 11:00:00', NULL, '2020-08-15 10:36:12', '2020-11-26 16:17:50'),
(8, 1, 6, 2, 1, 1, 'https://www.daterangepicker.com/#example4', '2020-08-16 15:00:00', NULL, '2020-08-17 01:43:29', '2020-11-26 16:17:50'),
(9, 1, 1, 1, 1, 1, 'https://www.daterangepicker.com/#example4', '2020-08-16 15:00:00', NULL, '2020-08-17 01:44:24', '2020-11-26 16:17:50'),
(10, 1, 1, 1, 1, 1, 'https://www.youtube.com/watch?v=8irSFvoyLHQ', '2020-08-17 17:00:00', NULL, '2020-08-17 19:10:46', '2020-11-26 16:17:50'),
(11, 1, 1, 1, 1, 1, 'https://www.daterangepicker.com/#example4', '2020-11-11 20:30:00', NULL, '2020-11-09 16:49:27', '2020-11-26 16:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `lastname`, `email`, `phone`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `grade_id`) VALUES
(1, NULL, 'admin', 'admin', 'admin@psacademy.com', NULL, NULL, '$2y$10$gJN.HVJSwUCQFyI8oAwIR.9.Ge3mcfvctJ/VF/T3UVQcJMTxWZ5.e', 'admin', NULL, '2020-08-14 08:42:37', '2020-08-14 08:42:37', 0),
(2, NULL, 'student', 'std 1', 'student@gmail.com', NULL, NULL, '$2y$10$vQtS//TmjqYv4TRDuVFrl.0OODgkMewgCP.2B7IhSBn7xALlCmEn2', 'student', NULL, '2020-08-14 04:41:49', '2020-08-14 04:41:49', 1),
(3, NULL, 'Raheel', 'Khan', 'raheel@naizindagi.com', NULL, NULL, '$2y$10$GPNGbcdM5imfuPpZSBUvHeyK2CxCOga9oxQx.kydX3ak7spfEt6oy', 'instructor', NULL, '2020-08-16 12:36:47', '2020-08-16 12:36:47', 0),
(4, NULL, 'Muhammad', 'Raheel Khan', 'admin@psacademyonline.com', NULL, NULL, '$2y$10$/Rk3popKDcjkF50JcqwzCekHuyXzJJTQZhLG07hnJPKAkp99mbPWa', 'admin', NULL, '2020-08-16 12:37:11', '2020-08-16 12:37:11', 0),
(6, NULL, 'saif', 'jadoon', 'saif.4843@gmail.com', NULL, NULL, '$2y$10$lNQEFCJMwHbwsrjJ13ZGPO7iECYEyEFnzZMSJ8E7vo.d9VBhIPCF6', 'student', NULL, '2020-08-17 01:24:39', '2020-08-17 01:24:39', 2),
(7, NULL, 'ali', 'ahmad', 'ali@gmail.com', NULL, NULL, '$2y$10$dlYb/OHX.T6vsMNnU2c0puA5O4nHBGVsme51eTZ2LYEvC9bO2e.9.', 'student', NULL, '2020-08-17 01:38:35', '2020-08-17 01:38:35', 1),
(8, NULL, 'tauseef', 'khan', 'khan@gmail.com', NULL, NULL, '$2y$10$ifptTKoNiwN2/Oug81.Z.OZbXLU6lNE0y8AhAoTiZhaGOD1Wr/rQa', 'instructor', NULL, '2020-08-17 01:51:21', '2020-08-17 01:51:21', 0),
(9, NULL, 'saif', 'jadoon', 'saif.48@gmail.com', NULL, NULL, '$2y$10$nMSeCfvqsnt4L.fRYQJjG.d49xOAOvG6yKKB8yx/pn.sTuKB7zCMS', 'student', NULL, '2020-08-17 19:06:39', '2020-08-17 19:06:39', 1),
(10, NULL, 'saif', 'jadoon', 'saif.48431@gmail.com', NULL, NULL, '$2y$10$UZD/OkINn5WJ3Pb6wMYSyezEUOm1A6IB2nmIHpU5ZPrF75jXG0BZ.', 'student', NULL, '2020-09-14 01:48:26', '2020-09-14 01:48:26', 1),
(11, NULL, 'test', 'raheel', 'test@raheel.com', NULL, NULL, '$2y$10$ivIB4vT5ezW7OqSD/O26Hu.oAruP2fzFnHolFheExTotjlPNfsyf2', 'student', NULL, '2020-09-28 01:02:54', '2020-09-28 01:02:54', 2),
(12, 'Saif', 'Saif', 'Saif', 'saif.rehman@es.uol.edu.pk', '03314197999', NULL, '$2y$10$Pencs8z3nasZn7OZ0vDvK.0TP.X08WUeKXeZD8ZC.p9AFuxNz86bC', 'student', NULL, '2020-11-22 21:29:29', '2020-11-22 21:29:29', 1),
(13, 'Saif', 'Saif', 'Saif', 'saifjust4u@msn.com', '03314197999', NULL, '$2y$10$hbOw4jIkFI5OTounscZ4GOd22P5I7uhD1vRrN/1rI7r3AyWlnFnQ.', 'student', NULL, '2020-11-25 10:40:51', '2020-11-25 10:40:51', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminmenus`
--
ALTER TABLE `adminmenus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminmenus_parentid_foreign` (`parentid`);

--
-- Indexes for table `apply_courses`
--
ALTER TABLE `apply_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apply_courses_user_id_foreign` (`user_id`),
  ADD KEY `apply_courses_course_id_foreign` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_user_id_foreign` (`user_id`),
  ADD KEY `courses_grade_id_foreign` (`grade_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enrollments_course_id_foreign` (`course_id`),
  ADD KEY `enrollments_user_id_foreign` (`user_id`),
  ADD KEY `enrollments_created_by_foreign` (`created_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grades_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `periods_user_id_foreign` (`user_id`),
  ADD KEY `periods_course_id_foreign` (`course_id`),
  ADD KEY `periods_grade_id_foreign` (`grade_id`);

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
-- AUTO_INCREMENT for table `adminmenus`
--
ALTER TABLE `adminmenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apply_courses`
--
ALTER TABLE `apply_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminmenus`
--
ALTER TABLE `adminmenus`
  ADD CONSTRAINT `adminmenus_parentid_foreign` FOREIGN KEY (`parentid`) REFERENCES `adminmenus` (`id`);

--
-- Constraints for table `apply_courses`
--
ALTER TABLE `apply_courses`
  ADD CONSTRAINT `apply_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `apply_courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`),
  ADD CONSTRAINT `courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `enrollments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `enrollments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `periods`
--
ALTER TABLE `periods`
  ADD CONSTRAINT `periods_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `periods_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`),
  ADD CONSTRAINT `periods_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
