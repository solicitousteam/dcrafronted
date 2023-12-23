-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 23, 2023 at 08:21 PM
-- Server version: 5.7.37
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appsolicitous_dcra`
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
  `state` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `event_time` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weather_phenomena` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weather_phenomena_commnet` longtext COLLATE utf8mb4_unicode_ci,
  `flood_reason` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `flood_reason_comment` longtext COLLATE utf8mb4_unicode_ci,
  `damage_cause` longtext COLLATE utf8mb4_unicode_ci,
  `damage_cause_comment` longtext COLLATE utf8mb4_unicode_ci,
  `additional_damage_details` longtext COLLATE utf8mb4_unicode_ci,
  `questions_to_manager` longtext COLLATE utf8mb4_unicode_ci,
  `damge_images` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `damge_video` longtext COLLATE utf8mb4_unicode_ci,
  `location` geometry DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crowd_sourcings`
--

INSERT INTO `crowd_sourcings` (`id`, `user_id`, `cyclone_name`, `state`, `district`, `date`, `event_time`, `weather_phenomena`, `weather_phenomena_commnet`, `flood_reason`, `flood_reason_comment`, `damage_cause`, `damage_cause_comment`, `additional_damage_details`, `questions_to_manager`, `damge_images`, `damge_video`, `location`, `created_at`, `updated_at`) VALUES
(49, 1, 'Test123', NULL, NULL, '2023-05-31', '05:35', '1', NULL, '3', NULL, '', NULL, NULL, NULL, 'uploads/crowd_sourcing/damge_images/rn_image_picker_lib_temp_fa09c9f8-f125-42dc-bfdb-d4eb1b8d9f32.jpg', '', 0x000000000101000000a2fea30437545340031f496a1d943c40, '2023-05-31 06:37:04', '2023-05-31 06:37:04'),
(50, 1, 'Biparjoy', NULL, NULL, '2023-06-15', '17:23', '1|1', NULL, '1', NULL, '', NULL, NULL, NULL, 'uploads/crowd_sourcing/damge_images/rn_image_picker_lib_temp_6e148019-fdcf-46d9-84cb-0c6035466e80.jpg', '', 0x000000000101000000afa8147d36545340f52d94c815943c40, '2023-06-15 06:24:58', '2023-06-15 06:24:58'),
(51, 28, 'Aa test', NULL, NULL, '2023-07-05', '15:41', '1', NULL, '1', NULL, '', NULL, NULL, NULL, 'uploads/crowd_sourcing/damge_images/rn_image_picker_lib_temp_75633be8-51ea-4971-97dc-b5d30ff17ff8.jpg', '', 0x000000000101000000c6efd8953754534056ffb5f61d943c40, '2023-07-05 04:43:54', '2023-07-05 04:43:54'),
(52, 32, 'Bipajoy', NULL, NULL, '2023-06-06', '12:25', '1', NULL, '1', NULL, '', NULL, NULL, NULL, 'uploads/crowd_sourcing/damge_images/rn_image_picker_lib_temp_6c3e1c05-8ff3-4929-a0e3-6c90ff034969.jpg', '', 0x000000000101000000d60fc48c0358534000bbc0d2e6a93c40, '2023-07-06 01:30:27', '2023-07-06 01:30:27'),
(53, 28, 'TestData', NULL, NULL, '2023-08-03', '15:07', '1|1', NULL, '1', NULL, '', NULL, NULL, NULL, 'uploads/crowd_sourcing/damge_images/rn_image_picker_lib_temp_b1b4347e-cd07-4be9-9199-be55a0669451.jpg', '', 0x0000000001010000002b70cbaa3c54534087abc1031c943c40, '2023-08-03 04:08:42', '2023-08-03 04:08:42');

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
  `push_token` longtext COLLATE utf8mb4_unicode_ci,
  `type` enum('android','ios') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'android',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `device_tokens`
--

INSERT INTO `device_tokens` (`id`, `user_id`, `device_id`, `token`, `push_token`, `type`, `created_at`, `updated_at`) VALUES
(35, 1, '987654321', 'ip3XbU4d5JtHSeHibYmniaUM4bxo1g2fHfHRsKOhBczOppDUegrZYydKK6rciUxDSP1d1O8d5k25onroNyeVsZFhVO5OjMTof20T', NULL, 'android', '2023-02-16 04:11:04', '2023-02-16 04:11:04'),
(41, 1, 'KHNBJKL', 'yVA5NTcD4idS68lp5OPh8scumaVyoOvGiXEVe43lj7a3nt6m5dEMDD6xkVgNdG7UvZgFRuiiLrri0MI4mjop0kDF4zPkkYNglLoR', NULL, 'android', '2023-02-17 01:32:49', '2023-02-17 01:32:49'),
(44, 1, '1234', 'fDZ4GR3XBZrN8OKEMam1nFMlRCekt5EhBvlTHTFpnxMAy7CTMUd9Yuxd1pR2P6HpihHJ7CGpyUGHiLDlM12OP50zJpUe59dxLmXP', NULL, 'android', '2023-02-17 03:41:03', '2023-02-17 03:41:03'),
(47, 1, '1234567', 'Kn5sPsTDxK8PnVVVbo4CSEV4CaJlEJhDY29IZkMVmT4kCinpJfBgt5o2x7xHoly4SbaIr6mXSULVaVi8LuCuiDMMKE7o5ft5P1tj', NULL, 'android', '2023-02-17 05:08:22', '2023-02-17 05:08:22'),
(68, 10, 'k6877v1_64', 'Cgxn9YUJEbjhCyNn8cAvUk9vVxm2GcLoG0gXz6xLIs4k7Pk1HlJSEKjsk1NmVxIbysUTc82G2or6rBKOVehgReSXYYBT8XjziS8O', 'cOlSSmpzThm6OQTzAXyX3e:APA91bFo5-2CFM4oVMm6WD1mVGkuQmTzmSJp4O89kgdS45mKBphAC-X4iGvf35krN13lyeh40_bj48GdKHjHz7H_65LoRoBtOGWhX8IS2lulqcWA7aCcoc4fUgKoBBTNjwyemofVsCRr', 'android', '2023-02-20 01:40:11', '2023-02-20 01:40:11'),
(171, 12, 'exynos7885', 'jPhkldCtNCcczoD8sGpH5rLsmuKS4TrTy2P3mgJHm1v6kFi8RkgvvnKTBIEzpzJM9HtAmkRnvx3EsPAAUvNfzZkCDc7RkiSJYl45', 'fTKbKohNTmWOO-pEkJRxJ7:APA91bGvgOyShNDizC_pFqLmHwXkpYs59VGFcR7j1PqPy_JzWvlwJjunaEcLJ1ICHduMxjBnggEHW3ilwLmyhO5LVQPUwWmOwuErf4pfG-HFppwXOi03dg1XPDjSTQsN7iRi_NMszXM1', 'android', '2023-02-28 05:32:45', '2023-02-28 05:32:45'),
(196, 1, 'sdm660', '2fo9fr7oE3hbppgDzgr35m72Dh5laYtsUn4VVpUbMtYI3ikaDDs6Fpd1Gi1mryNTmIucs6NDDgbzPsoC9TtCHEHcxDcUAvg3Yx8a', 'dmtMqCeiQh6jV0vmwnkcGH:APA91bHOgpL5Wb2WL9T4clM4vXCSZU0gPZeaD6zURJC6ghCOl0efefYmYw6VcKZaqj-0LYMhWWE3n_oh1QxhwLJ1ViHcoz_UxTQabvYpsmUA8Bnady5ZO_ZgtwHGL1hbQa7xuuz4hYEE', 'android', '2023-03-01 00:23:01', '2023-03-01 00:23:01'),
(228, 1, 'bengal', 'UH6TE1BnXvgRszr0lc2SHUdGk6sLgd4GyFgsuk61a8NhDgzFOEZE0jyLuIcssMvcK74EDYEsyhNrY1gBjCM08P8npklb4NGJJbMh', 'fVyv74wqTUiCgVL1rxUAz5:APA91bEHu8v2dItDqI2_7Krw_JzapQFm_OKhHqdlWbJSLRt38yGwFQp6TlAfXZBUdh4S9dzDhqy3vZ0jKE9ErzyYbPx8hpISZwfRTJX7xpYvLn2MIXggbXAmbTCSW1vKfBD6omF7UObh', 'android', '2023-04-29 04:52:27', '2023-04-29 04:52:27'),
(230, 1, 'ginkgo', '2rlOt26POSoJFpUOU30iojG1UogEJopdsKBsDHadfn4aFiUKUYHK7e9TVc3aOeXZ4G5L9Uj4VAutye3pZctvlKrKejk5yzhD5chY', 'fccWeLGGTeiuDG4ywkbY_j:APA91bHdU7Dw2RuRey9IGTOsU4XCfu0-oFpDqqVOUKES5I0fU9UX0g47dx5s_jSxu9HIJR1js1NSPL1Bp0gf_-_hR5KJ2ikNTpH_uSxSGd16KTzyJAAP9lSJDcrIOW8U8Sdj8WmWqeTp', 'android', '2023-04-29 23:37:35', '2023-04-29 23:37:35'),
(233, 1, 'QC_Reference_Phone', 'l45f80UkYnrzlKm65LKLMjorXP42PVhfUoijmzaxtytDMppsfpijK8SSgYIYF2MH3FJ2KRTXoaDZyzssFLXArILsSRnAI6MS1SoV', 'eFYL60dCTRi-XPTCAJSsa5:APA91bHgq82r2Xeg9ejYWdH37djeHCHJyIK6VyBMakOtlriaVV-tKRWvA9d3SxB6PovE9UmnmpOa7eh9Be9dEkj3i9AL0u0ZSkQicFl_-CCUyGJIdWMmsC9T92l37bBQmodn3evfx9DL', 'android', '2023-05-03 02:51:59', '2023-05-03 02:51:59'),
(234, 1, 'k62v1_64_bsp', 'a7ucT5O4YjfI1AoDnbCcXdXxMmF2OJSNanbgjbnRd5u5Btb2DfpRB5XX3Z42a2S4XuXSsYPAN5i1rsv4a6ARErOXVMaXTcb5kUrp', 'cTUB1CD_RYiP9mz1Uc8NHQ:APA91bFAqn8P0vk8mZTYGGzEdxDfUfQrrZRJTis-SfggKmrUYpxM5XqEakLnQGvjG8mJHSEfYMdD5gwWmQCrkcZokDn7EbFXEmP-qoTPGCOb03V43-RbPrNbpN1UXXtzFzhJZbcfXw8W', 'android', '2023-05-03 05:51:07', '2023-05-03 05:51:07'),
(242, 1, 'panther', 'x5lbP1gZOsfHO0MzgpEpIYl10pt0GZxRErVDbZ00mlpdC6zYgjKNnFbJZefFCp9L9zS81AHDvg5FPru29kIiejg2bpm7D5aodA2R', 'eWghaefeQammOrZxw8QHwn:APA91bHbSc_gIUX2Ik2vmDZ19iRq-UB0JrbT2WVRPcssOY2nxvoea_4IgD36xn4SoeFZZ6m0itdrWT38y1RIUdTpxn9ujPKOuW8Sly8gvD8J0nhAlOgG1m5FEm1OncDSmeNg5-C3MzUT', 'android', '2023-05-05 06:13:41', '2023-05-05 06:13:41'),
(304, 1, 'vili', 'mR8fJ3tdZHo58FOLcssbDd6uDrT5m0oEFZNsJHrPFPmuEAIMkur21541ujSHNBp4yhDr5FfV50lZIP9mDBtc0yUeai8BxAlI8BoU', 'eoXmum3AQeCy5MB0TcyJ6R:APA91bHCijg7c_hmHuut3raVdVyz-uODLDZ4vjiumADcX6p_YwoXTOlBoYdqsjN380Uanm-jrjXdsXOEjkhN0sJL4sKdlvHxXMowoJdLeLP2un8UwLD-G24PbYx4g3YmO6yraT9_WuLK', 'android', '2023-05-11 02:57:56', '2023-05-11 02:57:56'),
(311, 1, 'lito', 'CDJ0nnyMFs9jx7s37z3VjO4a4UFVd669EP0pmfTHrfBb7TmXdTIyGRJsHLeXavobVg7bMjfEfKzN1lFS7jZJm3yoopt5KEujBeMI', 'e2uB5uRNQKCQmXT08qn8FM:APA91bHLpa-vfOz7TvFYa3SLDMF7XufJsf8zv66byOuwkLbB_HZDXWgZ_U92_X_C2RfgzhLBWyu64wrtF0V9Boha8kBYBPRRAoQ4eXxQWyCA4Y5tQGoTmHYcOYU-vjh-JjUO2sR9utYX', 'android', '2023-05-11 20:57:16', '2023-05-11 20:57:16'),
(361, 1, '123', 'jSKEjCGSppLTJmEUiHLMYaiDMB4OYMzmmSkb4zoA7tcUu8ZIbxOvaKSMilDHtls0ZlzE6kAKP2xPxIIhHMvATteLrLU7MbiCVczf', NULL, 'android', '2023-05-23 01:30:39', '2023-05-23 01:30:39'),
(393, 28, 'excalibur', 'Vmk5Vpit05L9PUupxsLdUXGsLUr1iMrIgvK5dA2pioAMZTXkVDlz1oM9JtfBj9gMUYm5M6gnSs04EuArpIys15aa7jeCvxsI8chZ', 'd0AVW_IBSAipdD-n_l6A9L:APA91bEnvFAUqm3Q6gRvmxipRPdwqDK79Tl9EucqoC1re6-NKEyRi7B6fx7R4OdfZQUWfLSK_YpCCf3xY3M2KtLlLORZyu3_wqwXxmAKq1h9h1Teh7zzeU8RRjyVsWXFle2Af5pNnOL_', 'android', '2023-07-06 01:19:42', '2023-07-06 01:19:42'),
(394, 28, 'k79v1_64', 'GpsExrC1Hui5G4ihAAdAM1jRTxlNTty4M3LF2dJvm0H8feazXI1dU3JSNKE7RKLOj4PmCGkBJ0BtFkOE9CTl1yorG5eJ3gPJdpK5', 'eFmNVE2gSAWx6vsvm8c8V8:APA91bFwDfQr2DWy6wKdIOkcvj_ApoYW0e0y58D-eTIsaPvl4Vv4arYCeCulNKhUHEmHlTvX3YXPaBuzANd-D4v54cAgF2XkmWfi8CxdlAUro-gYZwJxKFYrFmKaCHsceCEWqoJeCQ5X', 'android', '2023-07-06 01:20:28', '2023-07-06 01:20:28'),
(395, 32, 'k6877v1_64_k419', 'hjTjCIIFaA6R4Z6s3EHOdU6BI6ZZNRnpoKoDje9toTTO0853FomO9eX4XgtlFYJdj9vBaVceRns0bgBJk4z7s279cYkeOMj2xMLE', 'eAma5lXKT8u5ZL8mI5PPg1:APA91bGQao2fDk0qxAMt8pvCdn5E_Dd9uBMgsPBFFBaiY6Rh_55nyPwkuV1owMGxYUScjghMxoOx8iP6t-7HCvTQc-72arEDhwAf0T11_sUVBoXqxM0_Xnl9ATmnIymWOEhPLvrgRE69', 'android', '2023-07-06 01:23:47', '2023-07-06 01:23:47'),
(514, 1, 'RMX3231', 'x8Ipocs41E25m7uZUhaIYShLfLP2o3DMYOuxdfcsZCIpVoG8TPmA5frAfPf3BCIPaGmO28ixbd3YPOOFrpBAs7sCBtBrxFLfXJBb', 'eChdMU4RRq2ajEj9_PlNJM:APA91bGjiXt_4aDbVnLpPnOwiZf3ZC4jm9nZDxQBRzA-wJLsGDB_EM0esJwwI_LJDFoCk_U2NVVERlw6sG1hLYOUp5kybAA6c9gP3XehuQsvF54m3Mnrqtk-SdSYMAlQLsOLwhqpm2xH', 'android', '2023-08-21 10:11:22', '2023-08-21 10:11:22'),
(518, 12, 'holi', 'GpXllKl6auhuv24ad2sFnT8R5mCk0CBhT7kMJmpGC4ZIVeJxfbuhfIYd5n01tvRDMLu5FGZHMAoAj0slNMCHTkzjf7l7CZkTjVGi', 'd5l1_Qr-TYuSpmXAOd6chQ:APA91bFffjeyz3iRs_KUjTmuX-yinxFylKxSQ_BAw5WiJP6X1qEgzehf4XIz9HWsaIyfcdpcy3S56s2xzMHte40urE4WoAgU2bWwjKhGXJ99nWW8JH2-NaqwkUMb7LCoqjlPBXD2n_Zy', 'android', '2023-08-21 23:31:08', '2023-08-21 23:31:08'),
(527, 38, 'ums512', 'FKBLPdep7sgJ59snFFY1LLbA3C4xDEXXF3F4PTIl8A3rKvyC1djIP8N6Lz9cBalHTp314K8PTHnHG6cBgDKKXHFD9Gd0nBYUN2JZ', 'fRIpeCtKRmmGZ7z7CSAtDZ:APA91bENUorGTf8E2h4CKvJuaB7l0wqzpnOcCvbkdgGqY-Q7vb8PAMXwmY-PvpFXlzUHxMD5Hh5u7T9cVOhcbUn2oTTWZ01BOT1iZVD5ZH7mZOVS7zAU8kBtQcKn-81XNey5f6TOAgcu', 'android', '2023-12-07 11:52:39', '2023-12-07 11:52:39'),
(531, 1, 'k6895v1_64', 'pBDTsck9PYM1vcjeXiP4FkUJZUEEbJZu0IIo7VB1efjeC3JVLTTJ1hSph1KfeE3HM6DmJMZmsCVKPD3skI2PSfCh9IN2aVRyO481', 'dKVV_EEZQyi9YRV9LVYbt3:APA91bFVCe8TRgUWv-CPzauhLuW5YIoGKMK3AhefFYX2WJMJ-f_VdDQqb5EyyTIaIh2AWOiAOFGm33AJmVUdDF6IGK90XTwmPcDY_Wii4aX3394G7vb_ifYzmrKruq8Z4t33a0c-MmvY', 'android', '2023-12-12 17:29:53', '2023-12-12 17:29:53');

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
  `type` text COLLATE utf8mb4_unicode_ci,
  `category` text COLLATE utf8mb4_unicode_ci,
  `condition` text COLLATE utf8mb4_unicode_ci,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` longtext COLLATE utf8mb4_unicode_ci,
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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `type`, `description`, `name`, `email`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'question', 'type', 'tester', 'test@gmail.com', '1', NULL, NULL),
(3, 'question', 'type', 'tester', 'test@gmail.com', '1', NULL, NULL),
(4, 'comment', 'Hh', 'Nn', 'zadanerohit143@gmail.com', '1', NULL, NULL),
(5, 'comment', 'Hello', 'Rohit Zadane', 'rohitzadane7888@gmail.com', '1', NULL, NULL),
(6, 'comment', 'Hello', 'Ayushman', 'ayushman00sri@gmail.com', '28', NULL, NULL);

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

--
-- Dumping data for table `feeds`
--

INSERT INTO `feeds` (`id`, `user_id`, `state`, `district`, `feed_text`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Andhra Pradesh', 'East Godavari', 'Testing feedback', '2023-02-17 05:19:34', '2023-02-17 05:19:34', NULL),
(2, 1, 'Andhra Pradesh', 'East Godavari', 'Testing feedback', '2023-02-17 05:19:34', '2023-02-17 05:19:34', NULL),
(3, 1, 'Andhra Pradesh', 'East Godavari', 'Hi', '2023-02-28 12:52:31', '2023-02-28 12:52:31', NULL),
(4, 1, 'Gujarat', 'Amreli', 'Sdfjms', '2023-04-29 23:41:25', '2023-04-29 23:41:25', NULL),
(5, 28, 'Andaman & Nicobar Islands', 'North & Middle Andaman', 'Testing today', '2023-05-16 01:46:35', '2023-05-16 01:46:35', NULL),
(6, 1, 'Puducherry', 'Puducherry', 'H', '2023-05-16 03:34:58', '2023-05-16 03:34:58', NULL);

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

--
-- Dumping data for table `feed_comments`
--

INSERT INTO `feed_comments` (`id`, `user_id`, `feed_id`, `comment_text`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, 'Hello', '2023-02-28 12:52:54', '2023-02-28 12:52:54', NULL);

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
  `order_number` int(11) NOT NULL DEFAULT '0',
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
  `skills` text COLLATE utf8mb4_unicode_ci,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` longtext COLLATE utf8mb4_unicode_ci,
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
  `push_type` int(11) NOT NULL DEFAULT '0',
  `message` longtext CHARACTER SET utf8mb4,
  `push_data` longtext CHARACTER SET utf8mb4,
  `firebase_log` longtext CHARACTER SET utf8mb4,
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
  `location` geometry DEFAULT NULL,
  `reason` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `type` enum('safe','unsafe') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'safe',
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recording` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `safe_users`
--

INSERT INTO `safe_users` (`id`, `user_id`, `location`, `reason`, `type`, `mobile`, `recording`, `created_at`, `updated_at`) VALUES
(15, 1, 0x000000000101000000fcbe92be2349534055d97745f0bf3c40, 'test', 'unsafe', NULL, '', '2023-02-17 05:00:04', '2023-02-17 05:00:04'),
(16, 1, 0x000000000101000000fcbe92be2349534055d97745f0bf3c40, 'I am not safe', 'unsafe', NULL, '', '2023-02-17 05:04:52', '2023-02-17 05:04:52'),
(17, 1, 0x000000000101000000fcbe92be2349534055d97745f0bf3c40, 'I am safe', 'unsafe', NULL, '', '2023-02-17 05:06:13', '2023-02-17 05:06:13'),
(19, 1, 0x000000000101000000fcbe92be2349534055d97745f0bf3c40, 'testing with team', 'unsafe', NULL, '', '2023-02-17 05:18:37', '2023-02-17 05:18:37'),
(20, 1, 0x000000000101000000fcbe92be2349534055d97745f0bf3c40, 'test', 'unsafe', NULL, '', '2023-02-17 06:14:58', '2023-02-17 06:14:58'),
(21, 1, 0x000000000101000000fcbe92be2349534055d97745f0bf3c40, 'I am safe', 'unsafe', NULL, '', '2023-02-17 06:17:19', '2023-02-17 06:17:19'),
(22, 1, 0x000000000101000000fcbe92be2349534055d97745f0bf3c40, 'I am not safe with All Krishna', 'unsafe', NULL, '', '2023-02-17 06:17:43', '2023-02-17 06:17:43'),
(23, 1, 0x0000000001010000005a42a11255f95240cd8c86a5e4873f40, 'Test', 'unsafe', NULL, '', '2023-02-17 06:25:29', '2023-02-17 06:25:29'),
(24, 1, 0x0000000001010000005a42a11255f95240cd8c86a5e4873f40, 'Testing to check on backend', 'unsafe', NULL, '', '2023-02-17 06:26:03', '2023-02-17 06:26:03'),
(25, 1, 0x0000000001010000005a42a11255f95240cd8c86a5e4873f40, 'Safe 1', 'unsafe', NULL, '', '2023-02-17 06:26:26', '2023-02-17 06:26:26'),
(26, 1, 0x000000000101000000fcbe92be2349534055d97745f0bf3c40, 'I am safe', 'unsafe', NULL, '', '2023-02-17 06:50:49', '2023-02-17 06:50:49'),
(27, 1, 0x000000000101000000fcbe92be2349534055d97745f0bf3c40, 'I am safe', 'unsafe', NULL, '', '2023-02-17 06:59:56', '2023-02-17 06:59:56'),
(28, 1, 0x000000000101000000fcbe92be2349534055d97745f0bf3c40, 'Not safe', 'unsafe', NULL, '', '2023-02-17 07:00:54', '2023-02-17 07:00:54'),
(29, 1, 0x000000000101000000c0804bed327a52409ce1067c7e703240, 'Hello', 'unsafe', NULL, '', '2023-02-17 07:29:33', '2023-02-17 07:29:33'),
(30, 1, 0x000000000101000000c0804bed327a52409ce1067c7e703240, 'Hello', 'unsafe', NULL, '', '2023-02-17 07:37:32', '2023-02-17 07:37:32'),
(31, 1, 0x000000000101000000c0804bed327a52409ce1067c7e703240, 'Hii', 'unsafe', NULL, '', '2023-02-17 07:37:46', '2023-02-17 07:37:46'),
(32, 1, 0x000000000101000000c0804bed327a52409ce1067c7e703240, 'Unsafe', 'unsafe', NULL, '', '2023-02-17 07:39:23', '2023-02-17 07:39:23'),
(33, 1, 0x000000000101000000c0804bed327a52409ce1067c7e703240, 'Safe', 'unsafe', NULL, '', '2023-02-17 07:39:29', '2023-02-17 07:39:29'),
(34, 1, 0x000000000101000000c0804bed327a52409ce1067c7e703240, 'Im safe', 'unsafe', NULL, '', '2023-02-17 07:39:55', '2023-02-17 07:39:55'),
(35, 1, 0x000000000101000000c0804bed327a52409ce1067c7e703240, 'Not', 'unsafe', NULL, '', '2023-02-17 07:40:03', '2023-02-17 07:40:03'),
(36, 1, 0x000000000101000000f156c822ae7352401bd72216ef813240, 'Dragon ball', 'unsafe', NULL, '', '2023-02-17 07:43:47', '2023-02-17 07:43:47'),
(37, 1, 0x000000000101000000f156c822ae7352401bd72216ef813240, 'Goat', 'unsafe', NULL, '', '2023-02-17 07:44:29', '2023-02-17 07:44:29'),
(38, 1, 0x000000000101000000f156c822ae7352401bd72216ef813240, 'Too nice', 'unsafe', NULL, '', '2023-02-17 07:44:51', '2023-02-17 07:44:51'),
(39, 1, 0x000000000101000000c0804bed327a52409ce1067c7e703240, 'New', 'unsafe', NULL, '', '2023-02-17 08:01:31', '2023-02-17 08:01:31'),
(40, 1, 0x000000000101000000c0804bed327a52409ce1067c7e703240, 'Yes', 'unsafe', NULL, '', '2023-02-17 08:01:39', '2023-02-17 08:01:39'),
(41, 1, 0x000000000101000000c0804bed327a52409ce1067c7e703240, 'Hii', 'unsafe', NULL, '', '2023-02-17 08:03:49', '2023-02-17 08:03:49'),
(42, 1, 0x000000000101000000c0804bed327a52409ce1067c7e703240, 'Vv', 'unsafe', NULL, '', '2023-02-17 08:04:15', '2023-02-17 08:04:15'),
(43, 1, 0x000000000101000000c0804bed327a52409ce1067c7e703240, 'Bb', 'safe', NULL, '', '2023-02-17 08:05:58', '2023-02-17 08:05:58'),
(44, 1, 0x000000000101000000c0804bed327a52409ce1067c7e703240, 'Vc', 'unsafe', NULL, '', '2023-02-17 08:06:21', '2023-02-17 08:06:21'),
(45, 1, 0x00000000010100000097a6cec4705c5340273f1492ed963c40, 'Test', 'unsafe', NULL, '', '2023-02-18 05:26:37', '2023-02-18 05:26:37'),
(46, 1, 0x000000000101000000d5802e07677b5240d3c93f20bd8e3240, 'Rohan sage', 'safe', NULL, '', '2023-02-20 00:50:48', '2023-02-20 00:50:48'),
(47, 1, 0x000000000101000000fcbe92be2349534055d97745f0bf3c40, 'test', 'unsafe', NULL, '', '2023-02-27 05:36:06', '2023-02-27 05:36:06'),
(48, 1, 0x000000000101000000fcbe92be2349534055d97745f0bf3c40, '123', 'unsafe', '7589002883', '', '2023-02-27 05:38:58', '2023-02-27 05:38:58'),
(49, 1, 0x000000000101000000fcbe92be2349534055d97745f0bf3c40, '2233', 'safe', '7589002883', '', '2023-02-27 05:39:59', '2023-02-27 05:39:59'),
(50, 1, 0x000000000101000000fcbe92be2349534055d97745f0bf3c40, 'safe with no.', 'unsafe', '7589002883', '', '2023-02-27 05:42:44', '2023-02-27 05:42:44'),
(51, 1, 0x000000000101000000fcbe92be2349534055d97745f0bf3c40, 'unsafe with no.', 'unsafe', '7589002883', '', '2023-02-27 05:42:51', '2023-02-27 05:42:51'),
(52, 1, 0x000000000101000000ead18efa6f5c5340fc219111ab963c40, 'Need help', 'unsafe', '7589002883', '', '2023-02-27 06:08:44', '2023-02-27 06:08:44'),
(53, 1, 0x000000000101000000ead18efa6f5c5340fc219111ab963c40, 'I am safe', 'safe', '7589002883', '', '2023-02-27 06:08:56', '2023-02-27 06:08:56'),
(54, 1, 0x00000000010100000049e3c4159f5b53406c18b278b9933c40, 'Hello', 'unsafe', '7589002883', '', '2023-02-28 01:10:19', '2023-02-28 01:10:19'),
(55, 12, 0x000000000101000000c009850838545340843abf3b0c943c40, 'Flood', 'unsafe', '8847096695', '', '2023-02-28 01:25:00', '2023-02-28 01:25:00'),
(56, 12, 0x000000000101000000c009850838545340843abf3b0c943c40, 'I am not safe due to the high flood water in our house.', 'unsafe', '8847096695', '', '2023-02-28 01:26:17', '2023-02-28 01:26:17'),
(57, 12, 0x000000000101000000c009850838545340843abf3b0c943c40, 'I am in safe shelter', 'safe', '8847096695', '', '2023-02-28 01:28:22', '2023-02-28 01:28:22'),
(58, 12, 0x0000000001010000003ca257a09d555340810a8e6593943c40, 'Fgg', 'safe', '8847096695', '', '2023-02-28 05:58:40', '2023-02-28 05:58:40'),
(59, 13, 0x0000000001010000001164b10b0e4e5340a8927d67e69f3c40, 'Hello', 'unsafe', '8920606537', '', '2023-03-26 22:58:53', '2023-03-26 22:58:53'),
(60, 13, 0x0000000001010000001164b10b0e4e5340a8927d67e69f3c40, 'Hello', 'unsafe', '8920606537', '', '2023-03-26 23:04:27', '2023-03-26 23:04:27'),
(61, 13, 0x0000000001010000001164b10b0e4e5340a8927d67e69f3c40, 'Ok', 'safe', '8920606537', '', '2023-03-26 23:04:55', '2023-03-26 23:04:55'),
(62, 1, 0x000000000101000000eb6f09c07f595340beb1359524893c40, 'Hi', 'unsafe', '7589002883', '', '2023-03-30 04:18:55', '2023-03-30 04:18:55'),
(63, 1, 0x0000000001010000001cd3139678da5340e9c9223af15e3c40, 'T', 'unsafe', '7589002883', '', '2023-04-28 00:30:11', '2023-04-28 00:30:11'),
(64, 1, 0x0000000001010000002a1dacff73da5340202c5078f65e3c40, 'V', 'safe', '7589002883', '', '2023-04-28 04:49:06', '2023-04-28 04:49:06'),
(65, 1, 0x000000000101000000118dee2076da5340af84dbc7f75e3c40, 'A', 'safe', '7589002883', '', '2023-04-28 10:44:00', '2023-04-28 10:44:00'),
(66, 1, 0x000000000101000000118dee2076da5340af84dbc7f75e3c40, 'Hi', 'unsafe', '7589002883', '', '2023-04-28 11:25:58', '2023-04-28 11:25:58'),
(67, 1, 0x000000000101000000eeb60bcd75da53400db6ebb8f45e3c40, 'A', 'safe', '7589002883', '', '2023-04-29 02:10:48', '2023-04-29 02:10:48'),
(68, 1, 0x000000000101000000eeb60bcd75da53400db6ebb8f45e3c40, 'Werdsdg', 'unsafe', '7589002883', '', '2023-04-29 02:19:49', '2023-04-29 02:19:49'),
(69, 1, 0x00000000010100000053f518d2cedc534040fb912232603c40, 'Test', 'unsafe', '7589002883', '', '2023-04-29 02:28:35', '2023-04-29 02:28:35'),
(70, 1, 0x00000000010100000050d3783374da5340cab5b28ef45e3c40, 'A', 'unsafe', '7589002883', '', '2023-04-29 04:52:59', '2023-04-29 04:52:59'),
(71, 1, 0x00000000010100000071c971a774da53408dc4de9efa5e3c40, 'A', 'safe', '7589002883', '', '2023-04-29 23:40:25', '2023-04-29 23:40:25'),
(72, 1, 0x00000000010100000071c971a774da53408dc4de9efa5e3c40, 'Test', 'unsafe', '7589002883', '', '2023-04-29 23:43:37', '2023-04-29 23:43:37'),
(73, 1, 0x00000000010100000071c971a774da53408dc4de9efa5e3c40, 'T', 'unsafe', '7589002883', '', '2023-04-29 23:44:26', '2023-04-29 23:44:26'),
(74, 1, 0x0000000001010000004c37894160855ec00c51980a04b64240, 'ABC', 'unsafe', '7589002883', '', '2023-05-05 05:55:09', '2023-05-05 05:55:09'),
(75, 1, 0x000000000101000000ff36bb25da705240c099111eb9f93340, 'Hy', 'unsafe', '7589002883', '', '2023-05-05 06:13:54', '2023-05-05 06:13:54'),
(76, 1, 0x000000000101000000c0124018555c534000f487a8ba943c40, 'Tr', 'safe', '7589002883', '', '2023-05-07 03:08:36', '2023-05-07 03:08:36'),
(77, 1, 0x000000000101000000c0124018555c534000f487a8ba943c40, 'Test', 'unsafe', '7589002883', '', '2023-05-07 03:08:48', '2023-05-07 03:08:48'),
(78, 1, 0x000000000101000000e9aaede41b5a53405eb2b7b501893c40, 'Ryt', 'unsafe', '7589002883', '', '2023-05-08 01:30:00', '2023-05-08 01:30:00'),
(79, 1, 0x000000000101000000f35c3a4136545340261bac8b1d943c40, 'Rt', 'safe', '7589002883', '', '2023-05-10 09:52:15', '2023-05-10 09:52:15'),
(80, 1, 0x000000000101000000f35c3a4136545340261bac8b1d943c40, 'Ut', 'unsafe', '7589002883', '', '2023-05-10 09:52:32', '2023-05-10 09:52:32'),
(81, 1, 0x000000000101000000065f3d93e23b5440edae9a845ec83a40, 'Safe', 'safe', '7589002883', '', '2023-05-11 21:10:41', '2023-05-11 21:10:41'),
(82, 1, 0x000000000101000000065f3d93e23b5440edae9a845ec83a40, 'Not safe', 'unsafe', '7589002883', '', '2023-05-11 21:11:09', '2023-05-11 21:11:09'),
(83, 1, 0x000000000101000000065f3d93e23b5440edae9a845ec83a40, 'Ae', 'safe', '7589002883', '', '2023-05-11 21:11:24', '2023-05-11 21:11:24'),
(84, 1, 0x0000000001010000004b8e01fa395453408fec214c17943c40, 'Na', 'unsafe', '7589002883', '', '2023-05-15 04:57:21', '2023-05-15 04:57:21'),
(85, 28, 0x0000000001010000001cd24596ce555340879cc60ff8973c40, 'No danger', 'safe', '7905893540', '', '2023-05-16 01:45:47', '2023-05-16 01:45:47'),
(86, 1, 0x0000000001010000004961a438835c53406ba10148af963c40, 'Ok', 'unsafe', '7589002883', '', '2023-05-19 03:21:30', '2023-05-19 03:21:30'),
(87, 1, 0x0000000001010000004961a438835c53406ba10148af963c40, 'Ok', 'safe', '7589002883', '', '2023-05-19 03:21:37', '2023-05-19 03:21:37'),
(88, 1, 0x0000000001010000004961a438835c53406ba10148af963c40, 'Not dafe', 'unsafe', '7589002883', '', '2023-05-19 03:51:03', '2023-05-19 03:51:03'),
(89, 1, 0x0000000001010000004961a438835c53406ba10148af963c40, 'We', 'safe', '7589002883', '', '2023-05-19 03:51:14', '2023-05-19 03:51:14'),
(90, 1, 0x0000000001010000002e14d99c3d5453403e22a64412943c40, 'Ok', 'unsafe', '7589002883', '', '2023-05-19 04:11:52', '2023-05-19 04:11:52'),
(91, 1, 0x0000000001010000002e14d99c3d5453403e22a64412943c40, 'Ok', 'unsafe', '7589002883', '', '2023-05-19 04:12:35', '2023-05-19 04:12:35'),
(92, 1, 0x0000000001010000002e14d99c3d5453403e22a64412943c40, 'Safe', 'safe', '7589002883', '', '2023-05-19 04:13:12', '2023-05-19 04:13:12'),
(93, 1, 0x000000000101000000f048a39ffc855240e77417309ab13a40, 'Yuuuu', 'safe', '7589002883', '', '2023-05-22 09:39:58', '2023-05-22 09:39:58'),
(94, 1, 0x000000000101000000f048a39ffc855240e77417309ab13a40, 'Gggyyyyy', 'unsafe', '7589002883', '', '2023-05-22 09:40:19', '2023-05-22 09:40:19'),
(95, 1, NULL, 'tester tester', 'safe', '987654321', '1684827126.mp3', '2023-05-23 02:02:06', '2023-05-23 02:02:06'),
(96, 1, NULL, 'tester tester', 'safe', '987654321', '1684827271.mp3', '2023-05-23 02:04:31', '2023-05-23 02:04:31'),
(98, 1, NULL, 'tester tester', 'safe', '987654321', 'https://app.solicitous.cloud/dcra/uploads/recording/1684827583.mp3', '2023-05-23 02:09:43', '2023-05-23 02:09:43'),
(99, 1, 0x000000000101000000b84d650ffc855240188d63c150b13a40, 'Vjvjvjvv', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-05-25 07:19:36', '2023-05-25 07:19:36'),
(100, 1, 0x000000000101000000be70427cfb8552403fe1ecd632b13a40, 'Ncjcj', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-05-25 08:18:51', '2023-05-25 08:18:51'),
(101, 1, 0x000000000101000000be70427cfb8552403fe1ecd632b13a40, 'Fire in House Ncjcj', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-05-25 08:18:51', '2023-05-25 08:18:51'),
(102, 1, 0x000000000101000000be70427cfb8552403fe1ecd632b13a40, 'Hchcjc', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-05-25 08:19:52', '2023-05-25 08:19:52'),
(103, 1, 0x000000000101000000be70427cfb8552403fe1ecd632b13a40, 'Fire in House Hchcjc', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-05-25 08:20:24', '2023-05-25 08:20:24'),
(104, 1, 0x000000000101000000be70427cfb8552403fe1ecd632b13a40, 'Hello', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-05-25 08:21:34', '2023-05-25 08:21:34'),
(105, 1, 0x000000000101000000be70427cfb8552403fe1ecd632b13a40, 'Fire in House Hello', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-05-25 08:21:34', '2023-05-25 08:21:34'),
(106, 1, 0x000000000101000000be70427cfb8552403fe1ecd632b13a40, 'Cbf fb', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-05-25 08:24:48', '2023-05-25 08:24:48'),
(107, 1, 0x000000000101000000be70427cfb8552403fe1ecd632b13a40, 'Fire in House Cbf fb', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-05-25 08:25:08', '2023-05-25 08:25:08'),
(108, 1, 0x000000000101000000be70427cfb8552403fe1ecd632b13a40, 'Hhhhhhg', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-05-25 08:25:52', '2023-05-25 08:25:52'),
(109, 1, 0x0000000001010000009623852ef8855240e603029d49b13a40, 'Haysywyw', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-05-26 05:21:19', '2023-05-26 05:21:19'),
(110, 1, 0x0000000001010000009623852ef8855240e603029d49b13a40, 'Bsbshhsgs', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-05-26 05:27:52', '2023-05-26 05:27:52'),
(111, 1, 0x0000000001010000009623852ef8855240e603029d49b13a40, 'Hshshdh', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/1685098896.mp4', '2023-05-26 05:31:36', '2023-05-26 05:31:36'),
(112, 1, 0x0000000001010000009623852ef8855240e603029d49b13a40, 'Hahahha', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/1685098986.mp4', '2023-05-26 05:33:06', '2023-05-26 05:33:06'),
(113, 1, 0x000000000101000000b714255bfc8552400d017e9595b13a40, 'Ziaulhaqdeshwali', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/1685173909.mp4', '2023-05-27 02:21:49', '2023-05-27 02:21:49'),
(114, 1, 0x000000000101000000f0e4ec00fc855240c6aba4fc41b13a40, 'Reason', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/1685363558.mp4', '2023-05-29 07:02:38', '2023-05-29 07:02:38'),
(115, 1, 0x000000000101000000f0e4ec00fc855240c6aba4fc41b13a40, 'Reason', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/1685363920.mp4', '2023-05-29 07:08:40', '2023-05-29 07:08:40'),
(116, 1, 0x000000000101000000f0e4ec00fc855240c6aba4fc41b13a40, 'Reason', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/1685363952.mp4', '2023-05-29 07:09:12', '2023-05-29 07:09:12'),
(117, 1, 0x000000000101000000f0e4ec00fc855240c6aba4fc41b13a40, 'Reason', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/1685364489.mp4', '2023-05-29 07:18:09', '2023-05-29 07:18:09'),
(118, 1, 0x000000000101000000f0e4ec00fc855240c6aba4fc41b13a40, 'Gahababa', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/1685364513.mp4', '2023-05-29 07:18:33', '2023-05-29 07:18:33'),
(119, 1, 0x00000000010100000085c3da3118545340a3a025d934943c40, 'Ok', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/1685534229.mp4', '2023-05-31 06:27:10', '2023-05-31 06:27:10'),
(120, 1, 0x00000000010100000085c3da3118545340a3a025d934943c40, 'Hello', 'safe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-05-31 06:27:31', '2023-05-31 06:27:31'),
(121, 1, 0x000000000101000000437be22690785240174850fc18933240, 'Reason', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-06-15 03:17:58', '2023-06-15 03:17:58'),
(122, 1, 0x000000000101000000437be22690785240174850fc18933240, 'Water Entered in House Reason', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-06-15 03:18:01', '2023-06-15 03:18:01'),
(123, 1, 0x000000000101000000437be22690785240174850fc18933240, 'Water Entered in House  Water Entered in House Reason', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-06-15 03:18:01', '2023-06-15 03:18:01'),
(124, 1, 0x000000000101000000437be22690785240174850fc18933240, 'Water Entered in House  Water Entered in House  Water Ent', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-06-15 03:18:05', '2023-06-15 03:18:05'),
(125, 1, 0x000000000101000000437be22690785240174850fc18933240, 'Water Entered in House  Water Entered in House  Water Entered in House  Water Ent', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-06-15 03:18:05', '2023-06-15 03:18:05'),
(126, 1, 0x000000000101000000437be22690785240174850fc18933240, 'Water Entered in House  Water Entered in House  Water Entered in House  Water Entered in House  Water Ent', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-06-15 03:18:06', '2023-06-15 03:18:06'),
(127, 1, 0x0000000001010000006eb32569c6855240574a09a09cb13a40, 'Hello', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/1686823076.mp4', '2023-06-15 04:27:56', '2023-06-15 04:27:56'),
(128, 1, 0x0000000001010000006eb32569c6855240574a09a09cb13a40, 'Helo', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/1686823099.mp4', '2023-06-15 04:28:19', '2023-06-15 04:28:19'),
(129, 1, 0x0000000001010000006eb32569c6855240574a09a09cb13a40, 'Hello', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/1686823726.mp4', '2023-06-15 04:38:46', '2023-06-15 04:38:46'),
(130, 1, 0x00000000010100000091427a06e4535340604368eb7d943c40, 'Ok', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-06-15 06:22:16', '2023-06-15 06:22:16'),
(131, 1, 0x00000000010100000091427a06e4535340604368eb7d943c40, 'Tree fallen in front of my house Ok', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/1686829943.mp4', '2023-06-15 06:22:23', '2023-06-15 06:22:23'),
(132, 1, 0x00000000010100000091427a06e4535340604368eb7d943c40, 'I m safe', 'safe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-06-15 06:22:39', '2023-06-15 06:22:39'),
(133, 1, 0x0000000001010000006eb32569c6855240574a09a09cb13a40, 'Hello', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/1686843431.mp4', '2023-06-15 10:07:11', '2023-06-15 10:07:11'),
(134, 1, 0x0000000001010000006eb32569c6855240574a09a09cb13a40, 'Bnmbb', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/1686843564.mp4', '2023-06-15 10:09:24', '2023-06-15 10:09:24'),
(135, 1, 0x0000000001010000006eb32569c6855240574a09a09cb13a40, 'Hsgsv', 'safe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-06-15 10:09:32', '2023-06-15 10:09:32'),
(136, 1, 0x0000000001010000006eb32569c6855240574a09a09cb13a40, 'Hello', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/1686843652.mp4', '2023-06-15 10:10:52', '2023-06-15 10:10:52'),
(137, 1, 0x0000000001010000006eb32569c6855240574a09a09cb13a40, 'Hello', 'safe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-06-15 10:11:02', '2023-06-15 10:11:02'),
(138, 1, 0x0000000001010000006eb32569c6855240574a09a09cb13a40, 'Rohit hit men', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/1686843840.mp4', '2023-06-15 10:14:00', '2023-06-15 10:14:00'),
(139, 1, 0x0000000001010000006eb32569c6855240574a09a09cb13a40, 'Rohit sir', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/1686844010.mp4', '2023-06-15 10:16:50', '2023-06-15 10:16:50'),
(140, 1, 0x000000000101000000437be22690785240174850fc18933240, 'Hejrj', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-06-15 10:21:05', '2023-06-15 10:21:05'),
(141, 1, 0x000000000101000000437be22690785240174850fc18933240, 'Tree fallen in front of my house Hejrj', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-06-15 10:21:07', '2023-06-15 10:21:07'),
(142, 1, 0x000000000101000000437be22690785240174850fc18933240, 'Tree fallen in front of my house  Tree fallen in front of my house  Tree fallen in front of my house Hejrj', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-06-15 10:21:08', '2023-06-15 10:21:08'),
(143, 1, 0x000000000101000000437be22690785240174850fc18933240, 'Tree fallen in front of my house  Tree fallen in front of my house Hejrj', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-06-15 10:21:08', '2023-06-15 10:21:08'),
(144, 1, 0x000000000101000000437be22690785240174850fc18933240, 'Tree fallen in front of my house  Tree fallen in front of my house  Tree fallen in front of my house  Tree fallen in front of my house Hejrj', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-06-15 10:21:09', '2023-06-15 10:21:09'),
(145, 1, 0x000000000101000000437be22690785240174850fc18933240, 'Tree fallen in front of my house  Tree fallen in front of my house  Tree fallen in front of my house  Tree fallen in front of my house  Tree fallen in front of my house Hejrj', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-06-15 10:21:09', '2023-06-15 10:21:09'),
(146, 1, 0x000000000101000000437be22690785240174850fc18933240, 'Tree fallen in front of my house  Tree fallen in front of my house  Tree fallen in front of my house  Tree fallen in front of my house  Tree fallen in front of my house  Tree fallen in front of my house Hejrj', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-06-15 10:21:09', '2023-06-15 10:21:09'),
(147, 1, 0x000000000101000000437be22690785240174850fc18933240, 'Tree fallen in front of my house  Tree fallen in front of my house  Tree fallen in front of my house  Tree fallen in front of my house  Tree fallen in front of my house  Tree fallen in front of my house  Tree fallen in front of my house Hejrj', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-06-15 10:21:09', '2023-06-15 10:21:09'),
(148, 28, 0x000000000101000000c443d6223b5453404b4fa26f1c943c40, 'I\'m safe here', 'safe', '7905893540', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-06-22 04:08:05', '2023-06-22 04:08:05'),
(149, 28, 0x000000000101000000e68c516cbf55534027827a2bf9983c40, 'Gg', 'unsafe', '7905893540', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-07-05 04:41:36', '2023-07-05 04:41:36'),
(150, 1, 0x0000000001010000009db7772e485b53405b6c07e1d9933c40, 'Test', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-08-21 09:33:51', '2023-08-21 09:33:51'),
(151, 1, 0x0000000001010000009db7772e485b53405b6c07e1d9933c40, 'Hi', 'safe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-08-21 09:33:59', '2023-08-21 09:33:59'),
(152, 1, 0x0000000001010000009db7772e485b53405b6c07e1d9933c40, 'Hi', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/1692634307.mp4', '2023-08-21 10:41:47', '2023-08-21 10:41:47'),
(153, 12, 0x000000000101000000cc885e880d4e5340b5579bd6d89f3c40, 'Hi', 'safe', '8847096695', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-08-21 23:35:35', '2023-08-21 23:35:35'),
(154, 12, 0x000000000101000000cc885e880d4e5340b5579bd6d89f3c40, 'H', 'unsafe', '8847096695', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-08-21 23:36:21', '2023-08-21 23:36:21'),
(155, 12, 0x000000000101000000cc885e880d4e5340b5579bd6d89f3c40, 'Water Entered in House Tree fallen in front of my house Fire in House H', 'unsafe', '8847096695', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-08-21 23:36:34', '2023-08-21 23:36:34'),
(156, 12, 0x000000000101000000cc885e880d4e5340b5579bd6d89f3c40, 'Water Entered in House Tree fallen in front of my house Fire in House  Water Entered in House Tree fallen in front of my house Fire in House H', 'unsafe', '8847096695', 'http://app.solicitous.cloud/dcra/uploads/recording/', '2023-08-21 23:36:35', '2023-08-21 23:36:35'),
(157, 12, 0x000000000101000000cc885e880d4e5340b5579bd6d89f3c40, 'Water Entered in House Tree fallen in front of my house Fire in House  Water Entered in House Tree fallen in front of my house Fire in House  Water Entered in House Tree fallen in front of my house Fire in House H', 'unsafe', '8847096695', 'http://app.solicitous.cloud/dcra/uploads/recording/1692680801.mp4', '2023-08-21 23:36:41', '2023-08-21 23:36:41'),
(158, 1, 0x0000000001010000007000474c5aef52409ac0632e5ff23a40, 'Xgxgxxtx', 'unsafe', '7589002883', 'http://app.solicitous.cloud/dcra/uploads/recording/1695280746.mp4', '2023-09-21 01:49:06', '2023-09-21 01:49:06');

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mpin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative1_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative2_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative_mobile_number_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative_mobile_number_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative_mobile_number_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative_mobile_number_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative_mobile_number_5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `reset_token` longtext COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `exptime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authy_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `type` enum('admin','user','state_user','disaster_manager') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `name`, `username`, `password`, `country_code`, `mobile`, `mobile2`, `profile_image`, `email`, `mpin`, `date_of_birth`, `state`, `district`, `gender`, `address`, `relative1_name`, `relative2_name`, `relative_mobile_number_1`, `relative_mobile_number_2`, `relative_mobile_number_3`, `relative_mobile_number_4`, `relative_mobile_number_5`, `status`, `is_verified`, `reset_token`, `remember_token`, `otp`, `exptime`, `authy_id`, `created_at`, `updated_at`, `deleted_at`, `type`) VALUES
(1, NULL, NULL, 'admin', 'admin', '$2y$10$KgnoufJXP22mqPkBwdrEDefl4CyYcv1Ak83vDxfqKNnvXHV5AWL2m', '+91', '7589002883', '', 'uploads/user/user.png', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, NULL, NULL, 839493, '2023-12-12 23:03:53', NULL, NULL, '2023-12-12 17:28:53', NULL, 'admin'),
(2, 'prem limbachiya', 'prem limbachiya', 'prem limbachiya', 'prem', '$2y$10$nnX/yyEvErHMAx5ad8zGj.7VLx8mOFcTvpos4zTDaEtpFwLyvxRbC', '+91', '9773239952', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '1993-12-09', NULL, NULL, NULL, NULL, NULL, NULL, '8988689878', '8988689879', '8988689870', '8988689871', NULL, 'active', 1, NULL, NULL, NULL, NULL, NULL, '2021-10-28 07:45:39', '2021-11-10 01:54:05', NULL, 'user'),
(6, 'Arjun', 'Arjun', 'Arjun', 'arjun', '$2y$10$i5FDVrO4j.W0YSTmPxZ9tecUo28rFyjZ.T8LTN0SY2zvhpbKmLOqq', '+91', '9773239953', '', '', '', NULL, '1997-07-01', 'Gujarat', 'Patan', NULL, NULL, NULL, NULL, '876547888', '676767677', '565675776', NULL, NULL, 'active', 0, NULL, NULL, NULL, NULL, NULL, '2021-11-01 04:19:58', '2023-02-20 01:05:45', '2023-02-20 01:05:45', 'state_user'),
(7, 'Prem', 'Prem', 'Prem', '', NULL, '+91', '9773239954', '', '', '', NULL, NULL, 'Gujarat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, NULL, NULL, NULL, NULL, NULL, '2021-11-01 08:22:25', '2023-02-20 01:05:57', '2023-02-20 01:05:57', 'disaster_manager'),
(8, NULL, NULL, 'admin', 'admin2', '$2y$10$xSE0bKpmdgEHEe0rjpudB.3NiTFBnHqOW/0/EvvKpaY7Fx5nldgfq', '+91', '', '', 'uploads/user/user.png', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin'),
(9, NULL, NULL, 'Admin', 'sub_admin', '$2y$10$qm9nmjiBiaKBOdbuVUMYGuqteBv57ASEbtILat9VbjUWSrOdDnqeC', '+91', '', '', '', 'a@a.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, NULL, NULL, NULL, NULL, NULL, '2022-09-19 06:45:34', '2022-09-19 06:45:34', NULL, 'admin'),
(10, 'Krishna', 'Krishna', 'Krishna', 'krishnaglodha', '$2y$10$1CVXBhpvRFnalV5BCVM3bOkaFKr2iN67RBC2gKmtmK7vewdHCphz6', '+91', '7743880438', '', '', 'krishnaglodha@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1994-08-02', NULL, NULL, NULL, NULL, NULL, NULL, '9921888375', NULL, NULL, NULL, NULL, 'active', 1, NULL, NULL, NULL, NULL, NULL, '2023-02-18 06:30:29', '2023-02-20 01:11:51', NULL, 'user'),
(11, 'Sourabh', 'Sourabh', 'Sourabh', 'Dev', '$2y$10$m0foT02GsGSXqNz1W/IPQOeqV2QPv/rjEPyDigcgsIJn/zkaj02WK', '+91', '9354558529', '', '', 'Sourabh.dev@rmsi.com', NULL, '2022-06-22', NULL, NULL, NULL, NULL, NULL, NULL, '8979383633', NULL, NULL, NULL, NULL, 'active', 1, NULL, NULL, NULL, NULL, NULL, '2023-02-20 01:06:13', '2023-02-20 01:09:38', NULL, 'user'),
(12, 'Aditya', 'Aditya', 'Aditya', 'Aditya', '$2y$10$Ttoeu.1.FlzCqLEzI4ydg.jkfF.MWiBmhhaRjUPgl1J7WgL/B/Wja', '+91', '8847096695', '', '', 'Aditya@rmsi.com', '81dc9bdb52d04dc20036dbd8313ed055', '1998-03-24', NULL, NULL, NULL, NULL, NULL, NULL, '9354558529', NULL, NULL, NULL, NULL, 'active', 1, NULL, NULL, 281051, '2023-12-07 16:56:28', NULL, '2023-02-27 23:50:14', '2023-12-07 11:21:28', NULL, 'user'),
(13, 'Lokendra', 'Lokendra', 'Lokendra', 'user', '$2y$10$pA1hb0R6ZYI7r1BYT2L74.Auxd96SisRAWLmUVGZ2pNXzOpcw6j8e', '+91', '8920606537', '', '', 'lokendradixit49@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2023-01-30', NULL, NULL, NULL, NULL, NULL, NULL, '8802810151', NULL, NULL, NULL, NULL, 'active', 1, NULL, NULL, NULL, NULL, NULL, '2023-02-28 12:33:49', '2023-02-28 12:39:33', NULL, 'user'),
(14, 'Amit Saxena', 'Amit Saxena', 'Amit Saxena', 'tonysaxena18', '$2y$10$1rMx8xgp1vIJr4srqqEYreiJYIR8HJAaNRrwrU/4HgxGA3mUavmTq', '+91', '9917566999', '', '', 'tonysaxena18@gmail.com', NULL, '2006-04-28', NULL, NULL, NULL, NULL, NULL, NULL, '9917566999', NULL, NULL, NULL, NULL, 'active', 2, NULL, NULL, NULL, NULL, NULL, '2023-04-27 23:58:19', '2023-05-16 01:12:37', NULL, 'user'),
(15, 'Amit', 'Amit', 'Amit', 'Amit', '$2y$10$aHKB5.35W4ppu4ctGK0tleVHsDNIzVw13AaWrBMFsTYK93m02FO66', '+91', '991756699.', '', '', 'tonysaxena18@gmail.com', NULL, '2023-05-01', NULL, NULL, NULL, NULL, NULL, NULL, '9917566999', '9917566999', NULL, NULL, NULL, 'active', 2, NULL, NULL, NULL, NULL, NULL, '2023-05-02 04:06:31', '2023-05-16 01:12:40', NULL, 'user'),
(16, 'Amit', 'Amit', 'Amit', 'Amit', '$2y$10$bEgXcfO/YVsaq9zn7A4hPuCiKk4gxOAGpwiL.CpOUGa/Cs2ukACai', '+91', '991756699.', '', '', 'tonysaxena18@gmail.com', NULL, '2023-05-01', NULL, NULL, NULL, NULL, NULL, NULL, '9917566999', '9917566999', NULL, NULL, NULL, 'active', 2, NULL, NULL, NULL, NULL, NULL, '2023-05-02 04:41:08', '2023-05-16 01:12:44', NULL, 'user'),
(17, 'Amit', 'Amit', 'Amit', 'Amit', '$2y$10$QMfLLpwDQfOyiV1s3tQp3ezihtXO.JKLEfQhKfMe7UNWd7wqofZai', '+91', '991756699.', '', '', 'tonysaxena18@gmail.com', NULL, '2023-05-01', NULL, NULL, 'Male', NULL, NULL, NULL, '9917566999', '9917566999', NULL, NULL, NULL, 'active', 2, NULL, NULL, NULL, NULL, NULL, '2023-05-02 23:34:31', '2023-05-16 01:12:47', NULL, 'user'),
(18, 'Test', 'Test', 'Test', 'Test', '$2y$10$r5qZAyrimQuAZbLkzyBVB.FPOA2EzFmkCnfsjDJv0g9bGfkEDkAT6', '+91', '9999999999', '', '', 'Test@mail.com', NULL, '2000-05-01', NULL, NULL, NULL, NULL, NULL, NULL, '9999999999', '9999999999', '9999999999', '9999999999', '9999999999', 'active', 2, NULL, NULL, NULL, NULL, NULL, '2023-05-06 07:35:42', '2023-05-16 01:14:25', NULL, 'user'),
(19, 'Test', 'Test', 'Test', 'Test', '$2y$10$TbUcqyE4I65NrbybtjsM8OvVd61vXFszSnUSuYWOerBRz3YTqi/pC', '+91', '8888888888', '', '', 'testone@mail.com', NULL, '1989-05-07', NULL, NULL, NULL, NULL, NULL, NULL, '8888888888', '8888888888', NULL, NULL, NULL, 'active', 2, NULL, NULL, NULL, NULL, NULL, '2023-05-07 09:21:48', '2023-05-16 01:14:22', NULL, 'user'),
(20, 'test', 'test', 'test', 'test', '$2y$10$iuM0.pawvPWUGfvUrwJj6OscTfsuD5BzGWO9eHZpThZlRYwrK4bwO', '+91', '8888888889', '', '', 'testt@mail.com', NULL, '2023-05-01', NULL, NULL, NULL, NULL, NULL, NULL, '8888888888', '8888888888', NULL, NULL, NULL, 'active', 2, NULL, NULL, NULL, NULL, NULL, '2023-05-07 09:34:18', '2023-05-16 01:14:19', NULL, 'user'),
(21, 'test', 'test', 'test', 'test', '$2y$10$mmI47shIQlim3cpuyJq46OqXhv8Nvo2h2keYOAus87kzwLFs6EwRC', '+91', '9999999999', '', '', 'test@mail.com', NULL, '2023-05-01', NULL, NULL, NULL, NULL, NULL, NULL, '9999999999', '9999999999', NULL, NULL, NULL, 'active', 2, NULL, NULL, NULL, NULL, NULL, '2023-05-07 09:40:38', '2023-05-16 01:14:12', NULL, 'user'),
(22, 'test', 'test', 'test', 'test', '$2y$10$18LtGX7nmOUjDz.YXSgzROTeVrnIpyavwYAAVsi9urUomt4bzsMIa', '+91', '9999999999', '', '', 'test', NULL, '2023-05-01', NULL, NULL, NULL, NULL, NULL, NULL, '9999999999', '9999999999', NULL, NULL, NULL, 'active', 2, NULL, NULL, NULL, NULL, NULL, '2023-05-07 09:46:07', '2023-05-16 01:13:01', NULL, 'user'),
(23, 'test', 'test', 'test', 'test', '$2y$10$XVCd1AEBxUrEYPRYFhtQj.XIqaFWBzty2mn1XJUVGpyLhK0pKAne2', '+91', '9999999999', '', '', 'test', NULL, '2023-04-18', NULL, NULL, NULL, NULL, NULL, NULL, '9999999999', '9999999999', NULL, NULL, NULL, 'active', 2, NULL, NULL, NULL, NULL, NULL, '2023-05-07 09:54:00', '2023-05-16 01:13:05', NULL, 'user'),
(24, 'test', 'test', 'test', 'test', '$2y$10$luKWWYSBniJ/w.0XygItNON3.VSJHOwIILm/WszNTgBPDg8JBxDM6', '+91', '9999999999', '', '', 'test', NULL, '2023-04-03', NULL, NULL, NULL, NULL, NULL, NULL, '9999999999', '9999999999', NULL, NULL, NULL, 'active', 2, NULL, NULL, NULL, NULL, NULL, '2023-05-07 09:58:41', '2023-05-16 01:13:09', NULL, 'user'),
(25, 'test', 'test', 'test', 'test', '$2y$10$cUXPRDsmZJjcjQ5ULlWE5OkOMfqu/cs54TN6TWQUBR5JgEnRdj5X.', '+91', '7300169798', '', '', 'test', NULL, '1993-05-07', NULL, NULL, NULL, NULL, NULL, NULL, '9999999999', '9999999999', NULL, NULL, NULL, 'active', 2, NULL, NULL, 358770, '2023-09-30 17:00:07', NULL, '2023-05-07 11:27:34', '2023-09-30 11:25:07', NULL, 'user'),
(26, 'test', 'test', 'test', 'test', '$2y$10$VH46pGMPCZIO31jRaAT8KO0hlW6HcaCi.m2SD68lulxNgQnt54n9O', '+91', '6377667088', '', '', 'test', NULL, '2023-05-01', NULL, NULL, NULL, NULL, NULL, NULL, '9999999999', '9999999999', NULL, NULL, NULL, 'active', 2, NULL, NULL, NULL, NULL, NULL, '2023-05-07 12:26:50', '2023-10-17 05:30:22', NULL, 'user'),
(27, 'Kunal', 'Kunal', 'Kunal', 'kunal@test.com', '$2y$10$y71urnvgLAHDaOZ.hxQICOzU.73ZF6Q.q9qLoGCSZjePYx8yxfi62', '+91', 'sharma', '', '', 'kunal@test.com', NULL, '1976-05-08', NULL, NULL, 'male', NULL, NULL, NULL, '1234567890', '1234567890', NULL, NULL, NULL, 'active', 2, NULL, NULL, NULL, NULL, NULL, '2023-05-08 04:29:12', '2023-05-16 01:12:53', NULL, 'user'),
(28, 'Ayushman Srivastava', 'Ayushman Srivastava', 'Ayushman Srivastava', 'Ayushman00sri', '$2y$10$HJD9JgOzDYF9Seiv4yOC7eMn1S4nXVbsLSaE5lp9ODIz1X2rEXim2', '+91', '7905893540', NULL, '', 'ayushman00sri@gmail.com', '89c86ad4bb118af4b7d49925b1b319e1', '2000-12-04', NULL, NULL, 'male', NULL, NULL, NULL, '7068663323', NULL, NULL, NULL, NULL, 'active', 1, NULL, NULL, NULL, NULL, NULL, '2023-05-16 01:10:44', '2023-12-18 05:00:16', NULL, 'user'),
(29, 'lokendra dixit', 'lokendra dixit', 'lokendra dixit', 'rmsinoida', NULL, '+91', '8802810151', NULL, '', 'dixit.lokendra@gmail.com', NULL, '1985-10-10', NULL, NULL, NULL, NULL, NULL, NULL, '9646592458', NULL, NULL, NULL, NULL, 'active', 2, NULL, NULL, NULL, NULL, NULL, '2023-05-16 01:10:50', '2023-05-16 01:13:35', NULL, 'user'),
(30, 'Ziya', 'Ziya', 'Ziya', 'Admin', '$2y$10$eaD.biidGHFoAM8ftkndkuMT0F/pfgvBs2PVHvSqFwk50gyO3FZ5a', '+91', '6377667088', NULL, '', 'Ziaulhaq.deshwali786@gmail.com', NULL, '2023-05-16', NULL, NULL, 'male', NULL, NULL, NULL, '6377667088', '6377667088', NULL, NULL, NULL, 'active', 0, NULL, NULL, NULL, NULL, NULL, '2023-05-16 04:37:32', '2023-05-16 04:37:32', NULL, 'user'),
(31, 'Ziya', 'Ziya', 'Ziya', 'Admin1', '$2y$10$jjeMimNZREwFNSyozS8z6e1gFcQQbzE0lVwQroZyoNKBgPQj4rjaq', '+91', '6377667088', NULL, '', 'Ziaulhaq@gmail.com', NULL, '2023-05-16', NULL, NULL, 'male', NULL, NULL, NULL, '6377667088', '6377667088', NULL, NULL, NULL, 'active', 0, NULL, NULL, NULL, NULL, NULL, '2023-05-16 04:56:23', '2023-05-16 04:56:23', NULL, 'user'),
(32, 'Sourabh Dev', 'Sourabh Dev', 'Sourabh Dev', 'Devsourabh', '$2y$10$OZsBHlI9Ws1xY6HCNQIezej8HJK6AnlX6UrYcr4hKaVti7SVwJ42q', '+91', '7436891426', NULL, '', 'Pratyush.senapati@rmsi.com', '81dc9bdb52d04dc20036dbd8313ed055', '1996-03-19', NULL, NULL, 'male', NULL, NULL, NULL, '8979383633', NULL, NULL, NULL, NULL, 'active', 1, NULL, NULL, NULL, NULL, NULL, '2023-07-05 03:49:46', '2023-07-05 04:36:16', NULL, 'user'),
(33, NULL, NULL, NULL, NULL, NULL, '+91', '8107180635', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, NULL, NULL, 829108, '2023-09-27 17:21:13', NULL, '2023-09-27 04:42:17', '2023-09-27 11:46:13', NULL, 'user'),
(34, NULL, NULL, NULL, NULL, NULL, '+91', '9509555981', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, NULL, NULL, NULL, NULL, NULL, '2023-09-27 10:32:32', '2023-09-27 13:25:07', NULL, 'user'),
(35, NULL, NULL, NULL, NULL, NULL, '+91', '7888286744', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, NULL, NULL, NULL, NULL, NULL, '2023-09-30 11:53:52', '2023-12-18 10:56:38', NULL, 'user'),
(36, NULL, NULL, NULL, NULL, NULL, '+91', '64646464', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, NULL, NULL, 784065, '2023-10-01 12:46:30', NULL, '2023-10-01 07:11:30', '2023-10-01 07:11:30', NULL, 'user'),
(37, NULL, NULL, NULL, NULL, NULL, '+91', '64646', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, NULL, NULL, 882860, '2023-10-11 12:51:31', NULL, '2023-10-11 07:16:31', '2023-10-11 07:16:31', NULL, 'user'),
(38, 'Mithilesh Yadav', 'Mithilesh Yadav', 'Mithilesh Yadav', 'Mithilesh', '$2y$10$Csjn533rz2oNMyWAH3YXv.d4ad8Fk0TyWcXV6PKSg9dibK84nyafS', '+91', '9140072616', NULL, '', 'Mithilesh.Yadav@rmsi.com', NULL, '1995-07-03', NULL, NULL, 'male', NULL, NULL, NULL, '9140072616', NULL, NULL, NULL, NULL, 'active', 0, NULL, NULL, 350444, '2023-12-07 17:29:04', NULL, '2023-12-07 11:18:37', '2023-12-07 11:54:04', NULL, 'user'),
(39, NULL, NULL, NULL, NULL, NULL, '+91', '9033343516', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, NULL, NULL, NULL, NULL, NULL, '2023-12-16 09:33:04', '2023-12-16 10:46:30', NULL, 'user'),
(40, NULL, NULL, NULL, NULL, NULL, '+91', '9890112041', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, NULL, NULL, NULL, NULL, NULL, '2023-12-17 07:43:28', '2023-12-17 07:45:09', NULL, 'user'),
(41, NULL, NULL, NULL, NULL, NULL, '+91', '7499525727', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, NULL, NULL, NULL, NULL, NULL, '2023-12-18 04:47:34', '2023-12-18 10:58:45', NULL, 'user');

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
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `damage_causes`
--
ALTER TABLE `damage_causes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `device_tokens`
--
ALTER TABLE `device_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=532;

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
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feeds`
--
ALTER TABLE `feeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feed_comments`
--
ALTER TABLE `feed_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `man_powers`
--
ALTER TABLE `man_powers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
