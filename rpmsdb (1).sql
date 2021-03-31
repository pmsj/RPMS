-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 31, 2021 at 09:29 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ministry_id` bigint(20) UNSIGNED DEFAULT NULL,
  `institution_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parish_id` bigint(20) UNSIGNED DEFAULT NULL,
  `designation_id` int(10) UNSIGNED DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `community_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `appointments_user_id_foreign` (`user_id`),
  KEY `appointments_ministry_id_foreign` (`ministry_id`),
  KEY `appointments_institution_id_foreign` (`institution_id`),
  KEY `appointments_parish_id_foreign` (`parish_id`),
  KEY `appointments_designation_id_foreign` (`designation_id`),
  KEY `appointments_community_id_foreign` (`community_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `ministry_id`, `institution_id`, `parish_id`, `designation_id`, `start_date`, `end_date`, `remarks`, `community_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 4, NULL, 7, '2021-01-12', '2022-02-13', NULL, 1, '2021-03-29 09:06:59', '2021-03-29 09:06:59'),
(2, 1, 7, NULL, 8, 8, '2022-01-14', '2024-01-14', 'Excellent.', 4, '2021-03-29 09:08:08', '2021-03-29 09:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

DROP TABLE IF EXISTS `community`;
CREATE TABLE IF NOT EXISTS `community` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `community_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number_community` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number_authority` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `village_town_colony` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block_subDivision` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` int(10) UNSIGNED DEFAULT NULL,
  `state_id` int(10) UNSIGNED DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `addressline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `community_community_name_unique` (`community_name`),
  KEY `community_district_id_foreign` (`district_id`),
  KEY `community_state_id_foreign` (`state_id`),
  KEY `community_country_id_foreign` (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`id`, `community_name`, `mobile_number_community`, `mobile_number_authority`, `pincode`, `village_town_colony`, `block_subDivision`, `district_id`, `state_id`, `country_id`, `addressline`, `created_at`, `updated_at`) VALUES
(1, 'Ashirvad', '1234567890', '1234567890', '835207', 'Patratoli', 'Patratoli', 1, 1, 1, 'Ashirvad, patratoli, namkum', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(2, 'Sitagar', '1234567890', '1234567890', '835270', 'Sitagar', 'Hazaribag', 2, 2, 1, 'Sitagar, hazaribag, murfi-street3', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(3, 'Berchmans ILlam', '1234567890', '1234567890', '600034', 'Nungambakkam', 'Nungambakkam', 3, 3, 1, 'Berchmans Illam, NUngambakkam, Loyola college', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(4, 'JDV', '1234567890', '1234567890', '600034', 'Pune', 'Pune', 7, 5, 1, 'JDV, NUngambakkam, Pune', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(5, 'Bundu', 'kequvekan', 'wekiq', 'nesory', 'Odio aliquid hic com', 'Ea sed quia deserunt', 3, 1, 1, 'Qui voluptatem et e', '2021-03-16 12:51:40', '2021-03-16 12:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `country_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_abbreviation` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `country_country_name_unique` (`country_name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_name`, `country_abbreviation`, `created_at`, `updated_at`) VALUES
(1, 'India', 'IND', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(2, 'France', 'FRA', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(3, 'China', 'CHN', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(4, 'Germany', 'GER', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(5, 'Afganistan', 'AFG', '2021-03-16 11:56:22', '2021-03-16 11:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

DROP TABLE IF EXISTS `designations`;
CREATE TABLE IF NOT EXISTS `designations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `designation_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation_abbreviation` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `designations_designation_name_unique` (`designation_name`),
  UNIQUE KEY `designations_designation_abbreviation_unique` (`designation_abbreviation`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `district_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `district_district_name_unique` (`district_name`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 'Gumla', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(2, 'Simdega', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(3, 'Khunti', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(4, 'Lohardaga', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(5, 'Chennai', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(6, 'Trichy', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(7, 'Kazakuttam', '2021-03-16 05:21:36', '2021-03-16 05:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_description`, `created_at`, `updated_at`) VALUES
(1, 'Diconate', 'One is ordained Dicon', '2021-03-23 06:05:12', '2021-03-23 06:05:12'),
(2, 'Priestly Ordination', 'One is ordained Priest. A Minister of the Church.', '2021-03-23 06:05:12', '2021-03-23 06:05:12'),
(3, 'Final Vows', 'A priest is fully accepted by Society of Jesus.', '2021-03-23 06:05:12', '2021-03-23 06:05:12'),
(4, 'Fourth Vow', 'A Special Vow to the Pope.', '2021-03-23 06:05:12', '2021-03-23 01:16:24'),
(5, 'Final Event', 'Coming soon in near future.', '2021-03-23 06:30:51', '2021-03-23 01:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `event_transactions`
--

DROP TABLE IF EXISTS `event_transactions`;
CREATE TABLE IF NOT EXISTS `event_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `held_on` date DEFAULT NULL,
  `presided_over_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `community_id` bigint(20) UNSIGNED DEFAULT NULL,
  `place` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `event_transactions_event_id_foreign` (`event_id`),
  KEY `event_transactions_user_id_foreign` (`user_id`),
  KEY `event_transactions_community_id_foreign` (`community_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_transactions`
--

INSERT INTO `event_transactions` (`id`, `event_id`, `user_id`, `held_on`, `presided_over_by`, `community_id`, `place`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2029-06-20', 'Bishop Paul Lakra', 4, 'MajhaToli, Gumla', '2021-03-23 10:28:21', '2021-03-23 10:28:21'),
(3, 1, 2, '2026-06-20', 'Bishop Paul Lakra', 5, 'Khunti', '2021-03-23 11:56:23', '2021-03-23 11:56:23'),
(4, 2, 1, '2029-12-20', 'Bishop Kandulan', 1, 'Majhatoli', '2021-03-23 11:58:17', '2021-03-23 11:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `formation_stages`
--

DROP TABLE IF EXISTS `formation_stages`;
CREATE TABLE IF NOT EXISTS `formation_stages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `stage_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stage_description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stage_duration` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `formation_stages`
--

INSERT INTO `formation_stages` (`id`, `stage_name`, `stage_description`, `stage_duration`, `created_at`, `updated_at`) VALUES
(1, 'Novitiate', 'Spiritual Foundation. Power House', '2 Years', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(2, 'Juniorate', 'Preparation for college and holistic intigration.', '1 Year', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(3, 'Graduation', 'Time for colllege studies', '3 Years', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(4, 'Philosophy', 'Time to Deepen the understnading of God and life', '2 years', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(5, 'Regency', 'Stage to have a taste of real ministry', '2 Year', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(6, 'Post Graduation', 'Time for Higher Studies', '2 Years', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(7, 'Theology', 'Stage for the preparation of Priesthood', '4 Years', '2021-03-16 05:21:36', '2021-03-23 01:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `formation_transactions`
--

DROP TABLE IF EXISTS `formation_transactions`;
CREATE TABLE IF NOT EXISTS `formation_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `formation_stage_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `concerned_authority` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `community_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `formation_transactions_formation_stage_id_foreign` (`formation_stage_id`),
  KEY `formation_transactions_user_id_foreign` (`user_id`),
  KEY `formation_transactions_community_id_foreign` (`community_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `formation_transactions`
--

INSERT INTO `formation_transactions` (`id`, `formation_stage_id`, `user_id`, `concerned_authority`, `community_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Fr. Alangaram SJ', 3, '2016-06-17', '2019-06-10', '2021-03-16 05:24:36', '2021-03-16 05:39:58'),
(2, 1, 3, 'Fr. Raymon Kerketta', 1, '2015-06-20', '2017-06-20', '2021-03-16 05:30:01', '2021-03-16 05:30:01'),
(3, 2, 3, 'Fr. Deva', 2, '2017-06-20', '2018-06-20', '2021-03-16 05:31:24', '2021-03-16 05:31:24'),
(4, 1, 1, 'Fr. Raymon Kerketta SJ', 1, '2014-06-20', '2016-06-20', '2021-03-16 05:35:41', '2021-03-16 17:27:50'),
(5, 1, 2, 'Fr. Devid', 1, '2013-06-20', '2015-06-20', '2021-03-16 05:50:21', '2021-03-16 05:50:21'),
(6, 2, 4, 'Fr. John', 2, '2018-06-20', '2019-06-20', '2021-03-16 05:54:52', '2021-03-16 05:54:52'),
(7, 3, 3, 'Fr. Ajay Paul SJ', 5, '2018-06-20', '2021-06-10', '2021-03-16 06:10:33', '2021-03-16 12:28:07'),
(8, 5, 3, 'Fr. Ravi Bhushan SJ', 5, '2021-06-01', '2022-06-02', '2021-03-16 12:53:55', '2021-03-16 12:53:55'),
(9, 2, 1, 'Fr. Devadas SJ', 2, '2016-06-20', '2017-06-20', '2021-03-16 18:07:06', '2021-03-16 18:09:14'),
(10, 3, 4, 'Fr. Alangaram SJ', 3, '2019-06-20', '2022-04-10', '2021-03-18 06:27:21', '2021-03-18 06:27:21'),
(11, 2, 2, 'Fr. Dean', 2, '2015-06-20', '2016-06-20', '2021-03-22 11:54:44', '2021-03-22 11:54:44'),
(12, 7, 1, 'Fr. Benedict', 2, '2021-06-20', '2025-06-20', '2021-03-22 12:37:25', '2021-03-22 12:37:25'),
(13, 4, 1, 'Fr. Vinod', 4, '2019-06-20', '2021-06-20', '2021-03-22 12:56:36', '2021-03-22 12:56:36'),
(14, 3, 2, 'Fr. Solomon', 1, '2017-06-20', '2020-04-20', '2021-03-22 12:58:40', '2021-03-22 12:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

DROP TABLE IF EXISTS `institution`;
CREATE TABLE IF NOT EXISTS `institution` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `institution_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution_place` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution_established_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=967 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(943, '2014_10_12_000000_create_users_table', 1),
(944, '2014_10_12_100000_create_password_resets_table', 1),
(945, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(946, '2019_08_19_000000_create_failed_jobs_table', 1),
(947, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(948, '2021_02_01_050106_create_sessions_table', 1),
(949, '2021_02_02_130727_create_parish_table', 1),
(950, '2021_02_03_123059_community_table', 1),
(951, '2021_02_03_164336_ministry_table', 1),
(952, '2021_02_03_194944_institution_table', 1),
(953, '2021_02_04_073707_district_table', 1),
(954, '2021_02_04_100305_state_table', 1),
(955, '2021_02_04_114332_country_table', 1),
(956, '2021_02_04_134256_province_names_table', 1),
(957, '2021_02_18_092341_designation_name_table', 1),
(958, '2021_02_20_134129_create_formation_stages_table', 1),
(959, '2021_02_23_163723_create_roles_table', 1),
(960, '2021_02_23_165048_create_role_user_table', 1),
(961, '2021_03_01_063610_create_personal_details_table', 1),
(962, '2021_03_13_055115_create_formation_transactions_table', 1),
(963, '2021_03_23_054515_create_events_table', 2),
(965, '2021_03_23_075720_create_event_transactions_table', 3),
(966, '2021_03_29_054751_create_appointments_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ministry`
--

DROP TABLE IF EXISTS `ministry`;
CREATE TABLE IF NOT EXISTS `ministry` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ministry_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ministry_ministry_name_unique` (`ministry_name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ministry`
--

INSERT INTO `ministry` (`id`, `ministry_name`, `created_at`, `updated_at`) VALUES
(1, 'Educational Ministry', '2021-03-29 05:52:59', '2021-03-29 05:52:59'),
(2, 'Parish Ministry', '2021-03-29 05:53:11', '2021-03-29 05:53:11'),
(3, 'Social Work', '2021-03-29 05:53:37', '2021-03-29 05:53:37'),
(4, 'Formation Ministry', '2021-03-29 05:53:51', '2021-03-29 05:53:51'),
(5, 'Missionary', '2021-03-29 05:54:27', '2021-03-29 05:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `parish`
--

DROP TABLE IF EXISTS `parish`;
CREATE TABLE IF NOT EXISTS `parish` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parish_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

DROP TABLE IF EXISTS `personal_details`;
CREATE TABLE IF NOT EXISTS `personal_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `father` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siblings` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `village_town_colony` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parish` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dioses` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_office` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_box_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `personal_details_user_id_foreign` (`user_id`),
  KEY `personal_details_district_id_foreign` (`district_id`),
  KEY `personal_details_state_id_foreign` (`state_id`),
  KEY `personal_details_country_id_foreign` (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`id`, `user_id`, `father`, `mother`, `siblings`, `village_town_colony`, `parish`, `dioses`, `district_id`, `pincode`, `post_office`, `post_box_number`, `state_id`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Placidius Minj', 'Nirmala Toppo', 'Pankaj, Priyanka, Sujata', 'Kulmunda', 'Majhatoli', 'Gumla', 2, '835207', 'Silam', '02', 1, 1, '2021-03-16 05:21:36', '2021-03-18 07:49:58'),
(2, 2, 'Walter Minj', 'Miliyani Toppo', 'Pankaj, Kanchan, Prabha', 'Hargada', 'Kapodih', 'Gumla', 1, '835205', 'kapodih', '05', 1, 2, '2021-03-16 05:21:36', '2021-03-18 19:42:30'),
(3, 3, 'Ismail kindo', 'Kiran Kindo', 'Sumit, Nilima, Saban, Sobha', 'Kendapani', 'Rengarih', 'Simdega', 2, '835228', 'Katukona', '08', 1, 1, '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(4, 4, 'Saroj Surin', 'Agatha Kindo', 'Sumit, Nilima, Saban, Sobha', 'Kendapani', 'Katkahi', 'Gumla', 2, '835228', 'katkahi', '08', 1, 1, '2021-03-16 05:21:36', '2021-03-16 05:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
CREATE TABLE IF NOT EXISTS `province` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `province_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_abbreviation` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `province_province_name_unique` (`province_name`),
  UNIQUE KEY `province_province_abbreviation_unique` (`province_abbreviation`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(2, 'Socius', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(3, 'NoviceMaster', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(4, 'User', '2021-03-16 05:21:36', '2021-03-16 05:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  KEY `role_user_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(2, 2, 2, '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(3, 4, 3, '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(7, 4, 4, '2021-03-18 12:57:03', '2021-03-18 12:57:03'),
(5, 2, 1, '2021-03-16 12:19:39', '2021-03-16 12:19:39'),
(6, 4, 1, '2021-03-16 12:19:39', '2021-03-16 12:19:39');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Tnc3GEeJIJov8dgQFHIbUEzIaJw7F0ZMmZhzZigs', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiRkJ5dkFoVmNUTHd0Ump2R3BocGJoTWdNYmZ1cXdJdVljSWZoU2J2ZyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vYXBwb2ludG1lbnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkOTJJWFVOcGtqTzByT1E1YnlNaS5ZZTRvS29FYTNSbzlsbEMvLm9nL2F0Mi51aGVXRy9pZ2kiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJDkySVhVTnBrak8wck9RNWJ5TWkuWWU0b0tvRWEzUm85bGxDLy5vZy9hdDIudWhlV0cvaWdpIjt9', 1617078798),
('cEFrZTaNDbjVCVLIGuQTPus11P2Y3t9oHzAVe9mG', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWW1WbDVIZ25CbFl6R1kyVE5JTG0zcUdUZzVrZ2lLeG40ZlhqMlVRTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9mb3JtYXRpb25UcmFuc2FjdGlvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQ5MklYVU5wa2pPMHJPUTVieU1pLlllNG9Lb0VhM1JvOWxsQy8ub2cvYXQyLnVoZVdHL2lnaSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkOTJJWFVOcGtqTzByT1E1YnlNaS5ZZTRvS29FYTNSbzlsbEMvLm9nL2F0Mi51aGVXRy9pZ2kiO30=', 1617182448),
('AWUwzRrKuKMtbletexbjRh71RKF81dS7fcnmgemI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36 Edg/89.0.774.63', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiakE4amZRaklFTWl1eGtSNEx1Q2RLTVZ3OGNsNzNlUjFKbWpabHFXSCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1617181926);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `state_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `state_state_name_unique` (`state_name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `state_name`, `created_at`, `updated_at`) VALUES
(1, 'Jharkhand', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(2, 'Andhara Pradesh', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(3, 'Tamil Nadu', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(4, 'Kernataka', '2021-03-16 05:21:36', '2021-03-16 05:21:36'),
(5, 'Mumbai', '2021-03-16 05:21:36', '2021-03-16 05:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sur_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `birth_date` date DEFAULT NULL,
  `entry_date_sj` date DEFAULT NULL,
  `mobile_number1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `sur_name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `birth_date`, `entry_date_sj`, `mobile_number1`, `mobile_number2`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Prawin', 'Ajay', 'Minj', 'admin@gmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '1995-04-03', '2015-06-20', '8292075662', '7739613995', NULL, NULL, NULL, NULL, '2021-03-16 06:49:39'),
(2, 'Erencius', 'Ajay', 'Minj', 'user1@gmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '1994-10-11', '2014-06-21', '2380281629', '7680281620', NULL, NULL, NULL, NULL, NULL),
(3, 'Ravi', 'Sushil', 'Kindo', 'user2@gmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '1993-11-25', '2017-06-21', '9980281629', '7780281620', NULL, NULL, NULL, NULL, NULL),
(4, 'Sachin', 'Prabhat', 'Surin', 'user3@gmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, '9980281629', '7780281620', NULL, NULL, NULL, NULL, '2021-03-18 07:20:58');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
