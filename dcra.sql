-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 07:23 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcra`
--

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title`, `slug`, `content`, `created_at`, `updated_at`) VALUES
(1, 'faq', 'faq', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL),
(2, 'term condition', 'term_condition', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL),
(3, 'faq', 'faq', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL),
(4, 'term condition', 'term_condition', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `crowd_sourcings`
--

CREATE TABLE `crowd_sourcings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `cyclone_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `event_time` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weather_phenomena` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weather_phenomena_commnet` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `flood_reason` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `flood_reason_comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `damage_cause` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `damage_cause_comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_damage_details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `questions_to_manager` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `damge_images` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `damge_video` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crowd_sourcings`
--

INSERT INTO `crowd_sourcings` (`id`, `user_id`, `cyclone_name`, `state`, `district`, `date`, `event_time`, `weather_phenomena`, `weather_phenomena_commnet`, `flood_reason`, `flood_reason_comment`, `damage_cause`, `damage_cause_comment`, `additional_damage_details`, `questions_to_manager`, `damge_images`, `damge_video`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lela', 'Gujarat', 'Amreli, Somnath', '2021-12-31', 'Evening (1730-2030 Hrs)', 'Gusty Wind (>62 KM/H)', 'Some comment is here check.', 'Rainfall', 'Some comment is here check.', 'Small tree uprooting', 'Some comment is here check.', 'Some comment is here check.', 'Some question here.', '', '', '2022-07-18 04:07:46', '2022-07-18 04:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `damage_causes`
--

CREATE TABLE `damage_causes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cause_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `device_tokens`
--

CREATE TABLE `device_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `push_token` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('android','ios') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'android',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `device_tokens`
--

INSERT INTO `device_tokens` (`id`, `user_id`, `device_id`, `token`, `push_token`, `type`, `created_at`, `updated_at`) VALUES
(29, 1, 'KHNBJKL', '9j6Igg5RPTEXaaGTcsXY5NbpeNe0Hp0ufMia6ZSRjzJDRe1rsikZmTCsZuEMYFccEtuKUbrYTYXf0U7euLkmA4SEcFO6M08GVpOy', NULL, 'android', '2022-09-19 06:44:59', '2022-09-19 06:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `district_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equipment_availabilities`
--

CREATE TABLE `equipment_availabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipment_availabilities`
--

INSERT INTO `equipment_availabilities` (`id`, `name`, `department_type`, `department_name`, `type`, `category`, `condition`, `year`, `remark`, `created_at`, `updated_at`) VALUES
(2, 'Y Machine', 'Govt', 'SDRF', 'A', 'B', 'C', '2022', 'hows', '2022-07-19 00:49:03', '2022-07-19 00:49:50');

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
-- Table structure for table `feeds`
--

CREATE TABLE `feeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `state` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feed_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feed_comments`
--

CREATE TABLE `feed_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `feed_id` bigint(20) NOT NULL,
  `comment_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'form-control',
  `extra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `order_number` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `label`, `unique_name`, `type`, `value`, `options`, `class`, `extra`, `hint`, `status`, `order_number`, `created_at`, `updated_at`) VALUES
(1, 'Site Name', 'site_name', 'text', 'name', NULL, 'form-control', '{\"required\":\"required\"}', 'Please Enter Site name', 'active', 0, NULL, NULL),
(2, 'Site Logo', 'site_logo', 'file', '', NULL, 'form-control', '{\"accept\":\"image\\/*\"}', 'Site Logo Main', 'active', 0, NULL, NULL),
(3, 'Small Site Logo', 'small_site_logo', 'file', '', NULL, 'form-control', '{\"accept\":\"image\\/*\"}', 'Site Small Logo Main', 'active', 0, NULL, NULL),
(4, 'Fav Icon', 'Favicon', 'file', '', NULL, 'form-control', '{\"accept\":\"image\\/*\"}', 'Fav Icon for Site', 'active', 0, NULL, NULL),
(5, 'Footer Text', 'footer_text', 'textarea', 'Footer Text', NULL, 'form-control', '{\"maxlength\":\"255\",\"required\":\"required\"}', 'Please Enter Site footer text', 'active', 0, NULL, NULL),
(6, 'Admin Email', 'ADMIN_EMAIL', 'email', 'admin@gmail.com', NULL, 'form-control', '{\"maxlength\":\"255\",\"required\":\"required\"}', 'Please Enter Email Address For Admin', 'active', 0, NULL, NULL),
(7, 'Android Version', 'Android_Version', 'number', '1', NULL, 'form-control', '{\"step\":\"0.01\",\"required\":\"required\",\"min\":1}', 'Please Enter Android Current Version', 'active', 0, NULL, NULL),
(8, 'Android Force Update', 'Android_Force_Update', 'select', '0', '[{\"name\":\"Yes\",\"value\":1},{\"name\":\"No\",\"value\":0}]', 'form-control', NULL, 'is android update is forced', 'active', 0, NULL, NULL),
(9, 'Ios Version', 'IOS_Version', 'number', '1', NULL, 'form-control', '{\"step\":\"0.01\",\"required\":\"required\",\"min\":1}', 'Please Enter Ios Current Version', 'active', 0, NULL, NULL),
(10, 'Ios Force Update', 'IOS_Force_Update', 'select', '0', '[{\"name\":\"Yes\",\"value\":1},{\"name\":\"No\",\"value\":0}]', 'form-control', NULL, 'is Ios update is forced', 'active', 0, NULL, NULL),
(11, 'Site Name', 'site_name', 'text', 'name', NULL, 'form-control', '{\"required\":\"required\"}', 'Please Enter Site name', 'active', 0, NULL, NULL),
(12, 'Site Logo', 'site_logo', 'file', '', NULL, 'form-control', '{\"accept\":\"image\\/*\"}', 'Site Logo Main', 'active', 0, NULL, NULL),
(13, 'Small Site Logo', 'small_site_logo', 'file', '', NULL, 'form-control', '{\"accept\":\"image\\/*\"}', 'Site Small Logo Main', 'active', 0, NULL, NULL),
(14, 'Fav Icon', 'Favicon', 'file', '', NULL, 'form-control', '{\"accept\":\"image\\/*\"}', 'Fav Icon for Site', 'active', 0, NULL, NULL),
(15, 'Footer Text', 'footer_text', 'textarea', 'Footer Text', NULL, 'form-control', '{\"maxlength\":\"255\",\"required\":\"required\"}', 'Please Enter Site footer text', 'active', 0, NULL, NULL),
(16, 'Admin Email', 'ADMIN_EMAIL', 'email', 'admin@gmail.com', NULL, 'form-control', '{\"maxlength\":\"255\",\"required\":\"required\"}', 'Please Enter Email Address For Admin', 'active', 0, NULL, NULL),
(17, 'Android Version', 'Android_Version', 'number', '1', NULL, 'form-control', '{\"step\":\"0.01\",\"required\":\"required\",\"min\":1}', 'Please Enter Android Current Version', 'active', 0, NULL, NULL),
(18, 'Android Force Update', 'Android_Force_Update', 'select', '0', '[{\"name\":\"Yes\",\"value\":1},{\"name\":\"No\",\"value\":0}]', 'form-control', NULL, 'is android update is forced', 'active', 0, NULL, NULL),
(19, 'Ios Version', 'IOS_Version', 'number', '1', NULL, 'form-control', '{\"step\":\"0.01\",\"required\":\"required\",\"min\":1}', 'Please Enter Ios Current Version', 'active', 0, NULL, NULL),
(20, 'Ios Force Update', 'IOS_Force_Update', 'select', '0', '[{\"name\":\"Yes\",\"value\":1},{\"name\":\"No\",\"value\":0}]', 'form-control', NULL, 'is Ios update is forced', 'active', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `man_powers`
--

CREATE TABLE `man_powers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `man_powers`
--

INSERT INTO `man_powers` (`id`, `name`, `department_type`, `department_name`, `designation`, `skills`, `age`, `mobile`, `status`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'Prem', 'Govt', 'SDRF', 'DEVLOPER', '1', '27', '7643556757', 'In Process', NULL, '2022-07-16 05:14:11', '2022-07-16 05:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_12_07_063304_create_device_tokens_table', 1),
(4, '2021_02_09_115131_create_general_settings_table', 1),
(5, '2021_02_09_134140_create_contents_table', 1),
(6, '2021_09_08_064650_create_push_logs_table', 1),
(7, '2021_10_28_112033_add_remaining_field_user_table', 2),
(8, '2021_11_01_060834_add_state_disaster_type_in_user_table', 3),
(9, '2021_11_09_132626_add_is_verified_in_users_table', 4),
(10, '2021_12_20_104246_create_weather_table', 5),
(11, '2021_12_20_114153_create_crowd_sourcings_table', 5),
(12, '2021_12_20_114255_create_damage_causes_table', 5),
(13, '2021_12_21_045228_create_states_table', 5),
(14, '2021_12_21_045246_create_districts_table', 5),
(15, '2021_12_21_053944_create_feeds_table', 5),
(16, '2021_12_21_054004_create_feed_comments_table', 5),
(17, '2022_01_10_132006_create_safe_users_table', 5),
(18, '2022_07_16_101627_create_man_powers_table', 6),
(19, '2022_07_19_054437_create_equipment_availabilities_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `push_logs`
--

CREATE TABLE `push_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `push_type` int(11) NOT NULL DEFAULT 0,
  `message` longtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `push_data` longtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `firebase_log` longtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `safe_users`
--

CREATE TABLE `safe_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('safe','unsafe') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'safe',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `safe_users`
--

INSERT INTO `safe_users` (`id`, `user_id`, `type`, `created_at`, `updated_at`) VALUES
(4, 1, 'safe', '2022-01-12 06:34:43', '2022-01-12 06:34:43'),
(5, 1, 'safe', '2022-01-12 06:34:54', '2022-01-12 06:34:54'),
(6, 1, 'safe', '2022-01-12 06:35:09', '2022-01-12 06:35:09'),
(7, 1, 'safe', '2022-01-12 06:35:27', '2022-01-12 06:35:27'),
(8, 1, 'safe', '2022-01-12 06:35:47', '2022-01-12 06:35:47'),
(9, 1, 'safe', '2022-01-12 06:39:16', '2022-01-12 06:39:16'),
(10, 1, 'safe', '2022-01-12 06:39:45', '2022-01-12 06:39:45'),
(11, 1, 'safe', '2022-01-12 06:40:04', '2022-01-12 06:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mpin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative_mobile_number_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative_mobile_number_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative_mobile_number_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative_mobile_number_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative_mobile_number_5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `reset_token` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `type` enum('admin','user','state_user','disaster_manager') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `name`, `username`, `password`, `country_code`, `mobile`, `profile_image`, `email`, `mpin`, `date_of_birth`, `state`, `district`, `relative_mobile_number_1`, `relative_mobile_number_2`, `relative_mobile_number_3`, `relative_mobile_number_4`, `relative_mobile_number_5`, `status`, `is_verified`, `reset_token`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `type`) VALUES
(1, NULL, NULL, 'admin', 'admin', '$2y$10$xSE0bKpmdgEHEe0rjpudB.3NiTFBnHqOW/0/EvvKpaY7Fx5nldgfq', '+91', '', 'uploads/user/user.png', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, NULL, NULL, NULL, NULL, NULL, 'admin'),
(2, 'prem limbachiya', 'prem limbachiya', 'prem limbachiya', 'prem', '$2y$10$nnX/yyEvErHMAx5ad8zGj.7VLx8mOFcTvpos4zTDaEtpFwLyvxRbC', '+91', '9773239952', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '1993-12-09', NULL, NULL, '8988689878', '8988689879', '8988689870', '8988689871', NULL, 'active', 1, NULL, NULL, '2021-10-28 07:45:39', '2021-11-10 01:54:05', NULL, 'user'),
(6, 'Arjun', 'Arjun', 'Arjun', 'arjun', '$2y$10$i5FDVrO4j.W0YSTmPxZ9tecUo28rFyjZ.T8LTN0SY2zvhpbKmLOqq', '+91', '9773239953', '', '', NULL, '1997-07-01', 'Gujarat', 'Patan', '876547888', '676767677', '565675776', NULL, NULL, 'active', 0, NULL, NULL, '2021-11-01 04:19:58', '2021-11-01 04:23:14', NULL, 'state_user'),
(7, 'Prem', 'Prem', 'Prem', '', NULL, '+91', '9773239954', '', '', NULL, NULL, 'Gujarat', NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, NULL, NULL, '2021-11-01 08:22:25', '2021-11-01 08:34:40', NULL, 'disaster_manager'),
(8, NULL, NULL, 'admin', 'admin', '$2y$10$xSE0bKpmdgEHEe0rjpudB.3NiTFBnHqOW/0/EvvKpaY7Fx5nldgfq', '+91', '', 'uploads/user/user.png', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, NULL, NULL, NULL, NULL, NULL, 'admin'),
(9, NULL, NULL, 'Admin', 'sub_admin', '$2y$10$qm9nmjiBiaKBOdbuVUMYGuqteBv57ASEbtILat9VbjUWSrOdDnqeC', '+91', '', '', 'a@a.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, NULL, NULL, '2022-09-19 06:45:34', '2022-09-19 06:45:34', NULL, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `weather`
--

CREATE TABLE `weather` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crowd_sourcings`
--
ALTER TABLE `crowd_sourcings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `damage_causes`
--
ALTER TABLE `damage_causes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_tokens`
--
ALTER TABLE `device_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `device_tokens_device_id_unique` (`device_id`),
  ADD KEY `device_tokens_user_id_foreign` (`user_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_availabilities`
--
ALTER TABLE `equipment_availabilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feeds`
--
ALTER TABLE `feeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feed_comments`
--
ALTER TABLE `feed_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `man_powers`
--
ALTER TABLE `man_powers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `push_logs`
--
ALTER TABLE `push_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `safe_users`
--
ALTER TABLE `safe_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `safe_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weather`
--
ALTER TABLE `weather`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `crowd_sourcings`
--
ALTER TABLE `crowd_sourcings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `damage_causes`
--
ALTER TABLE `damage_causes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `device_tokens`
--
ALTER TABLE `device_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipment_availabilities`
--
ALTER TABLE `equipment_availabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feeds`
--
ALTER TABLE `feeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feed_comments`
--
ALTER TABLE `feed_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `man_powers`
--
ALTER TABLE `man_powers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `push_logs`
--
ALTER TABLE `push_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `safe_users`
--
ALTER TABLE `safe_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `weather`
--
ALTER TABLE `weather`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `device_tokens`
--
ALTER TABLE `device_tokens`
  ADD CONSTRAINT `device_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `safe_users`
--
ALTER TABLE `safe_users`
  ADD CONSTRAINT `safe_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
