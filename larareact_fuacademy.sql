-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2022 at 07:00 PM
-- Server version: 8.0.31-0ubuntu0.20.04.1
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larareact_fuacademy`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint UNSIGNED NOT NULL,
  `opt_id` bigint UNSIGNED DEFAULT NULL,
  `que_id` bigint UNSIGNED DEFAULT NULL,
  `topic_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `opt_id`, `que_id`, `topic_id`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 2, '2022-07-12 23:36:48', '2022-07-13 02:55:38'),
(2, 8, 1, 4, '2022-07-12 23:42:28', '2022-07-12 23:42:28'),
(15, 11, 2, 5, '2022-07-14 05:56:53', '2022-07-14 05:56:53'),
(20, 26, 6, 1, '2022-07-14 07:47:28', '2022-07-14 07:47:28'),
(21, 28, 6, 1, '2022-07-14 07:47:28', '2022-07-14 07:47:28'),
(22, 40, 11, 4, '2022-07-21 04:29:09', '2022-07-25 06:34:22'),
(23, 41, 10, 3, '2022-07-25 06:40:16', '2022-07-25 06:41:23'),
(24, 47, 12, 3, '2022-07-25 07:03:26', '2022-07-25 07:03:26'),
(26, 54, 14, 6, '2022-07-25 07:14:23', '2022-07-25 07:14:23'),
(27, 59, 15, 6, '2022-07-25 07:15:14', '2022-07-25 07:15:14'),
(28, 64, 16, 6, '2022-07-25 07:16:06', '2022-07-25 07:16:06'),
(29, 66, 17, 6, '2022-07-25 07:16:56', '2022-07-25 07:16:56'),
(30, 72, 18, 7, '2022-07-25 07:34:03', '2022-07-25 07:39:43'),
(31, 73, 19, 7, '2022-07-25 07:35:36', '2022-07-25 07:35:36'),
(32, 74, 19, 7, '2022-07-25 07:35:36', '2022-07-25 07:35:36'),
(33, 77, 20, 7, '2022-07-29 07:42:00', '2022-07-29 07:42:14'),
(35, 96, 22, 7, '2022-08-02 01:17:25', '2022-08-04 02:56:58'),
(36, 96, 22, 7, '2022-08-02 01:21:44', '2022-08-04 02:56:58'),
(37, 96, 22, 7, '2022-08-02 04:56:24', '2022-08-04 02:56:58'),
(38, 99, 23, 7, '2022-08-03 02:59:52', '2022-08-03 03:56:17'),
(39, 102, 25, 7, '2022-08-03 03:39:52', '2022-08-03 03:54:08'),
(40, 108, 24, 7, '2022-08-03 03:57:45', '2022-08-04 03:06:35'),
(53, 126, 26, 7, '2022-08-03 07:30:19', '2022-08-03 07:30:19'),
(54, 128, 26, 7, '2022-08-03 07:30:19', '2022-08-03 07:30:19'),
(58, 130, 27, 7, '2022-08-03 07:47:01', '2022-08-03 07:47:01'),
(59, 132, 27, 7, '2022-08-03 07:47:01', '2022-08-03 07:47:01'),
(60, 122, 21, 7, '2022-08-03 08:03:11', '2022-08-03 08:03:11'),
(61, 124, 21, 7, '2022-08-03 08:03:11', '2022-08-03 08:03:11'),
(62, 136, 28, 1, '2022-08-04 05:56:48', '2022-08-04 07:38:33'),
(63, 140, 29, 1, '2022-08-05 08:11:21', '2022-08-05 08:11:37'),
(65, 143, 30, 7, '2022-08-18 01:50:55', '2022-08-18 01:50:55'),
(66, 144, 30, 7, '2022-08-18 01:50:55', '2022-08-18 01:50:55'),
(67, 145, 31, 8, '2022-08-26 08:32:57', '2022-08-26 08:32:57'),
(68, 148, 31, 8, '2022-08-26 08:32:57', '2022-08-26 08:32:57'),
(69, 149, 32, 8, '2022-08-26 08:34:24', '2022-08-26 08:34:24'),
(70, NULL, 33, 8, '2022-08-28 23:00:53', '2022-08-28 23:00:53'),
(71, NULL, 34, 8, '2022-08-28 23:03:42', '2022-08-28 23:03:42'),
(72, 164, 37, 4, '2022-09-21 07:53:29', '2022-09-21 22:33:00'),
(73, 167, 36, 7, '2022-09-21 08:08:30', '2022-09-21 08:08:30'),
(74, 169, 35, 8, '2022-09-21 23:12:21', '2022-09-21 23:12:21'),
(75, 172, 35, 8, '2022-09-21 23:12:21', '2022-09-21 23:12:21'),
(76, 173, 38, 9, '2022-09-22 03:56:24', '2022-09-22 23:20:38'),
(79, 177, NULL, 9, '2022-09-22 23:32:47', '2022-09-22 23:32:47'),
(80, 179, NULL, 9, '2022-09-22 23:32:47', '2022-09-22 23:32:47'),
(81, 177, NULL, 9, '2022-09-22 23:33:24', '2022-09-22 23:33:24'),
(82, 179, NULL, 9, '2022-09-22 23:33:24', '2022-09-22 23:33:24'),
(85, 179, 39, 9, '2022-09-22 23:37:41', '2022-09-22 23:37:41'),
(86, 180, 39, 9, '2022-09-22 23:37:42', '2022-09-22 23:37:42'),
(87, 181, 40, 9, '2022-09-22 23:49:49', '2022-09-22 23:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `comments_likes`
--

CREATE TABLE `comments_likes` (
  `id` bigint UNSIGNED NOT NULL,
  `comment_id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `is_like` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments_likes`
--

INSERT INTO `comments_likes` (`id`, `comment_id`, `post_id`, `user_id`, `is_like`, `created_at`, `updated_at`) VALUES
(1, 1, 14, 7, 1, '2022-09-15 01:20:52', '2022-09-15 01:55:19'),
(2, 4, 14, 7, 1, '2022-09-15 01:53:06', '2022-09-15 01:53:06'),
(3, 5, 14, 7, 1, '2022-09-15 01:56:01', '2022-09-15 02:53:04'),
(4, 6, 14, 7, 1, '2022-09-15 02:45:21', '2022-09-15 02:54:33'),
(5, 2, 13, 7, 1, '2022-09-15 02:54:46', '2022-09-15 02:54:46'),
(6, 4, 14, 1, 1, '2022-09-15 02:55:32', '2022-09-15 02:55:32'),
(7, 1, 14, 1, 1, '2022-09-15 02:55:43', '2022-09-15 02:55:43'),
(8, 15, 18, 7, 1, '2022-09-16 08:34:14', '2022-09-16 08:34:23'),
(9, 16, 17, 7, 1, '2022-09-19 00:14:06', '2022-09-19 00:14:06'),
(10, 17, 17, 7, 1, '2022-09-19 00:14:07', '2022-09-19 00:14:07'),
(11, 15, 18, 9, 1, '2022-09-21 06:37:35', '2022-09-21 06:37:35'),
(12, 17, 17, 9, 1, '2022-09-21 06:38:13', '2022-09-21 06:38:13'),
(13, 11, 16, 7, 1, '2022-09-21 06:44:10', '2022-09-21 06:44:10'),
(14, 18, 18, 7, 0, '2022-09-21 07:11:50', '2022-09-21 07:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `cources`
--

CREATE TABLE `cources` (
  `id` bigint UNSIGNED NOT NULL,
  `course_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `course_video_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_price` double(8,2) DEFAULT NULL,
  `course_sale_price` double(8,2) DEFAULT NULL,
  `expiration` tinyint NOT NULL DEFAULT '0',
  `course_expiration_day` int DEFAULT NULL,
  `cat_id` json DEFAULT NULL,
  `course_subscription` int DEFAULT NULL COMMENT '1 = Master and 2 = Standard and 3 = Basic',
  `Active` tinyint NOT NULL DEFAULT '1',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cources`
--

INSERT INTO `cources` (`id`, `course_name`, `course_content`, `course_video_link`, `course_price`, `course_sale_price`, `expiration`, `course_expiration_day`, `cat_id`, `course_subscription`, `Active`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'sds', NULL, 'fsd', 10.50, NULL, 0, NULL, '[\"3\"]', NULL, 1, NULL, '2022-06-28 04:13:44', '2022-07-15 07:09:10'),
(3, 'Php Core', '<p>This course is for only php beginers</p>', NULL, NULL, NULL, 0, NULL, '[\"2\"]', NULL, 1, NULL, '2022-06-28 04:26:50', '2022-06-28 04:26:50'),
(4, 'cds', '<p>sffs</p>', NULL, 10.00, 8.00, 0, NULL, '[\"3\", \"2\"]', NULL, 1, NULL, '2022-06-28 04:31:23', '2022-06-28 04:31:23'),
(6, 'Updated Reds', '<p>fs</p>', NULL, 20.00, 15.00, 1, 2, '[\"2\"]', NULL, 1, NULL, '2022-06-28 05:17:38', '2022-06-28 06:28:19'),
(7, 'Php Beginners course', '<p>vsdscv</p>', 'https://www.youtube.com/embed/XBj_le81sAc', 10.00, 8.00, 1, 1, '[\"3\"]', NULL, 1, NULL, '2022-06-28 05:22:21', '2022-07-15 07:10:00'),
(9, 'Php Beginners course', '<p>cfdds</p>', 'https://www.youtube.com/embed/XBj_le81sAc', 10.00, 8.00, 1, 1, '[\"4\", \"3\"]', 1, 1, NULL, '2022-06-28 08:01:49', '2022-07-28 23:56:45'),
(10, 'csdcsdc', '<p>csdds</p>', NULL, 10.00, 8.00, 1, 1, '[\"2\"]', 2, 1, NULL, '2022-06-28 08:04:29', '2022-07-28 23:56:20'),
(11, 'Raindrops Course', '<h4 style=\"text-align: center;\">What is Lorem Ipsum?</h4>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'https://www.youtube.com/embed/a7_WFUlFS94', 10.00, 8.00, 1, 1, '[\"4\", \"2\"]', 2, 1, NULL, '2022-06-28 08:13:59', '2022-08-26 08:22:32'),
(12, 'Test', '<p>vdfd</p>', 'https://www.youtube.com/embed/a7_WFUlFS94', 20.00, 8.00, 1, 1, '[\"4\"]', 3, 1, NULL, '2022-07-14 00:45:47', '2022-07-27 03:09:35'),
(13, 'SEO', '<div class=\"udlite-block-list-item-content\">\r\n<ul>\r\n<li>Get a complete understanding of how search engines work</li>\r\n</ul>\r\n</div>\r\n<div class=\"udlite-block-list-item-content\">\r\n<ul>\r\n<li>Keyword research - Learn what your potential customers are searching for</li>\r\n</ul>\r\n</div>\r\n<div class=\"udlite-block-list-item-content\">\r\n<ul>\r\n<li>Competitor Analysis - Know how your competitors are ranking</li>\r\n</ul>\r\n</div>\r\n<div class=\"udlite-block-list-item-content\">\r\n<ul>\r\n<li>Technical SEO - Learn what the search engines look for in your site</li>\r\n</ul>\r\n</div>\r\n<div class=\"udlite-block-list-item-content\">\r\n<ul>\r\n<li>Core web vitals - Learn what your website needs to be healthy</li>\r\n</ul>\r\n</div>\r\n<div class=\"udlite-block-list-item-content\">\r\n<ul>\r\n<li>PageSpeed SEO - Learn how to make your pages load quickly</li>\r\n</ul>\r\n</div>\r\n<div class=\"udlite-block-list-item-content\">\r\n<ul>\r\n<li>Submit your sitemap to Google and make it easier for search engines to crawl and index your site</li>\r\n</ul>\r\n</div>\r\n<div class=\"udlite-block-list-item-content\">\r\n<ul>\r\n<li>Become an SEO expert and learn how to create backlinks and drive traffic to your website</li>\r\n</ul>\r\n</div>\r\n<div class=\"udlite-block-list-item-content\">\r\n<ul>\r\n<li>User Experience SEO - Learn how to improve your website\'s user experience to get better rankings</li>\r\n</ul>\r\n</div>\r\n<div class=\"udlite-block-list-item-content\">\r\n<ul>\r\n<li>Get rid of Negative SEO and stop worrying about your website\'s search result rankings</li>\r\n</ul>\r\n</div>', 'https://www.youtube.com/embed/OYRkIGaP80M', NULL, NULL, 1, 1, '[\"4\", \"2\"]', 3, 1, NULL, '2022-07-15 04:04:18', '2022-07-26 05:40:20'),
(14, 'Today test', '<p>hello</p>', NULL, NULL, NULL, 0, NULL, '[\"2\"]', 2, 1, NULL, '2022-07-15 07:37:59', '2022-07-26 05:40:12'),
(15, 'Course for Basic Package', NULL, NULL, NULL, NULL, 0, NULL, '[\"5\"]', 2, 1, NULL, '2022-07-26 03:49:52', '2022-07-26 04:22:36'),
(16, 'Moyad Course Basic', '<p>This the moyad course</p>', 'https://www.youtube.com/embed/Yvbtno1iWQY', NULL, NULL, 0, NULL, '[\"6\"]', 3, 1, NULL, '2022-08-26 08:21:40', '2022-08-26 08:21:40'),
(17, 'Test course for only master subscription', '<p><strong>This course is for only Master package....</strong></p>', NULL, 500.00, 400.00, 1, 5, '[\"6\", \"4\", \"2\"]', 1, 1, NULL, '2022-09-16 03:57:48', '2022-09-16 07:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `courses_by_categories`
--

CREATE TABLE `courses_by_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `cat_id` bigint UNSIGNED DEFAULT NULL,
  `course_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

CREATE TABLE `course_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `c_c_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`id`, `c_c_name`, `slug`, `parent`, `description`, `created_at`, `updated_at`) VALUES
(2, 'My Category', NULL, 3, NULL, '2022-06-27 23:14:04', '2022-06-28 00:53:11'),
(3, 'New Category', NULL, NULL, NULL, '2022-06-27 23:14:35', '2022-06-27 23:14:35'),
(4, 'Raindrops Test', NULL, NULL, '<p>Test</p>', '2022-06-28 07:29:52', '2022-06-28 07:29:52'),
(5, 'Test today', NULL, NULL, '<p>hello&nbsp;</p>', '2022-07-15 07:36:50', '2022-07-15 07:36:50'),
(6, 'Moyad Courses', NULL, NULL, '<p>Moyad Courses</p>', '2022-08-26 08:18:09', '2022-08-26 08:18:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `total_read` bigint UNSIGNED NOT NULL DEFAULT '0',
  `helpful_yes` bigint UNSIGNED NOT NULL DEFAULT '0',
  `helpful_no` bigint UNSIGNED NOT NULL DEFAULT '0',
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `list_order` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int UNSIGNED DEFAULT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `deleted_by` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `slug`, `answer`, `total_read`, `helpful_yes`, `helpful_no`, `category_id`, `list_order`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(2, 'What does LOREM mean?', NULL, '‘Lorem ipsum dolor sit amet, consectetur adipisici elit…’ (complete text) is dummy text that is not meant to mean anything. It is used as a placeholder in magazine layouts, for example, in order to give an impression of the finished document. The text is intentionally unintelligible so that the viewer is not distracted by the content. The language is not real Latin and even the first word ‘Lorem’ does not exist. It is said that the lorem ipsum text has been common among typesetters since the 16th century. (Source: Wikipedia.com).', 0, 0, 0, NULL, NULL, '2022-08-16 04:56:02', '2022-08-17 04:16:24', NULL, 1, 1, NULL),
(3, 'Where can I subscribe to your newsletter?', NULL, 'We often send out our newsletter with news and great offers. We will never disclose your data to third parties and you can unsubscribe from the newsletter at any time. Subscribe here to our newsletter.', 0, 0, 0, NULL, NULL, '2022-08-16 05:52:12', '2022-08-17 04:17:24', NULL, 1, 1, NULL),
(4, 'Where can in edit my address?', NULL, 'If you created a new account after or while ordering you can edit both addresses (for billing and shipping) in your customer account.', 0, 0, 0, NULL, NULL, '2022-08-17 04:17:45', '2022-08-17 04:17:45', NULL, 1, NULL, NULL),
(5, 'Moyad Disccus', NULL, 'Giving the full system demo', 0, 0, 0, NULL, NULL, '2022-08-26 08:35:32', '2022-08-26 08:35:32', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int UNSIGNED NOT NULL,
  `updated_by` int UNSIGNED DEFAULT NULL,
  `deleted_by` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint UNSIGNED NOT NULL,
  `likeable_id` int UNSIGNED DEFAULT NULL,
  `likeable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `like_type` tinyint NOT NULL DEFAULT '0',
  `post_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `likeable_id`, `likeable_type`, `like_type`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'post', 1, 14, 8, '2022-09-07 22:56:31', '2022-09-07 23:55:53'),
(3, NULL, 'post', 1, 14, 7, '2022-09-07 23:58:47', '2022-09-15 00:14:36'),
(4, NULL, 'post', 1, 13, 7, '2022-09-08 02:03:00', '2022-09-13 07:49:08'),
(5, NULL, 'post', 0, 12, 7, '2022-09-08 07:15:12', '2022-09-14 03:53:16'),
(6, NULL, 'post', 0, 14, 1, '2022-09-15 02:55:29', '2022-09-15 02:55:31'),
(7, NULL, 'post', 1, 18, 7, '2022-09-16 08:33:58', '2022-09-21 06:43:53'),
(8, NULL, 'post', 1, 17, 7, '2022-09-19 00:14:08', '2022-09-19 00:14:08'),
(9, NULL, 'post', 1, 16, 7, '2022-09-19 00:14:12', '2022-09-19 00:14:12'),
(10, NULL, 'post', 1, 18, 9, '2022-09-21 06:37:16', '2022-09-21 06:37:16'),
(11, NULL, 'post', 1, 17, 9, '2022-09-21 06:38:15', '2022-09-21 06:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `meetings_info`
--

CREATE TABLE `meetings_info` (
  `id` bigint UNSIGNED NOT NULL,
  `topic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int NOT NULL,
  `start_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_id` bigint NOT NULL,
  `join_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `host_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meetings_info`
--

INSERT INTO `meetings_info` (`id`, `topic`, `type`, `start_time`, `duration`, `uuid`, `m_id`, `join_url`, `host_id`, `created_at`, `updated_at`) VALUES
(2, '14 jul 2022 testing update', 2, '2022-07-14T09:30:00Z', 15, 'wlv1kpDmSFGcs4ILdv7FZA==', 89932134727, 'https://us05web.zoom.us/j/89932134727?pwd=Y1o5ZGp3Y3dOd2EzbW5nSnVtOGpuZz09', 'QFBWBlLoTQOSAAmXUxysJA', '2022-07-14 00:50:08', '2022-08-03 07:56:01'),
(3, 'New 14 jul 2022', 2, '2022-07-14T11:25:00Z', 10, 'sBTg7l4rTbOWWasZCV+8xg==', 82412898938, 'https://us05web.zoom.us/j/82412898938?pwd=ZVR6Y2hQWERkaGordklYLzBsempwdz09', 'QFBWBlLoTQOSAAmXUxysJA', '2022-07-14 05:50:07', '2022-07-14 05:50:07'),
(4, 'Test meeting', 2, '2022-08-03T06:13:00Z', 10, 'zYPAPTcjSJ2+v00EwE6TvA==', 89180315801, 'https://us05web.zoom.us/j/89180315801?pwd=Ti9xVXVyWE11Rmtua25FdkFuUmVPZz09', 'QFBWBlLoTQOSAAmXUxysJA', '2022-08-03 00:43:39', '2022-08-03 00:43:39'),
(5, 'New Meeting', 2, '2022-08-03T06:20:00Z', 60, 'm71rVgf2SxSi8bg2HoZg9Q==', 88413708413, 'https://us05web.zoom.us/j/88413708413?pwd=UVJKU2FqRi9MbjlHVUkyUWNPcnAwZz09', 'QFBWBlLoTQOSAAmXUxysJA', '2022-08-03 00:47:16', '2022-08-03 00:48:33'),
(6, 'Test', 2, '2022-08-04T12:55:00Z', 60, 'JPTu9kcDRKaz3sMVIWsqxg==', 84008828899, 'https://us05web.zoom.us/j/84008828899?pwd=dlBIczNOMi81Mi9MOHlnYUloY1RSdz09', 'QFBWBlLoTQOSAAmXUxysJA', '2022-08-03 00:49:13', '2022-08-03 05:55:20'),
(7, 'GK', 2, '2022-08-04T14:30:00Z', 15, 'UuD6fT/ZTZKfeF5JbxYIIA==', 86770003944, 'https://us05web.zoom.us/j/86770003944?pwd=ZHR6TlJHbVFXVDB6ZzV6Mm8zUkxCQT09', 'QFBWBlLoTQOSAAmXUxysJA', '2022-08-03 06:30:31', '2022-08-03 22:59:18'),
(8, 'Zoom Meeting', 2, '2022-08-16T18:15:00Z', 60, 'INSKNEZyQKerYoYed6EvPw==', 86022987147, 'https://us05web.zoom.us/j/86022987147?pwd=bUlaZnV3UEZjNWVhODZ4TitSeHc3UT09', 'QFBWBlLoTQOSAAmXUxysJA', '2022-08-17 04:12:35', '2022-08-17 07:57:19'),
(9, 'music instruments learning', 2, '2022-08-18T16:45:00Z', 60, 'qiAdINGfS/umxWnlVn2/0A==', 87190365231, 'https://us05web.zoom.us/j/87190365231?pwd=ellxVnNiRjkydjJVYklZbTRKeHlLUT09', 'QFBWBlLoTQOSAAmXUxysJA', '2022-08-17 23:13:21', '2022-08-18 01:10:02'),
(10, 'Discus with Moayad', 2, '2022-08-27T15:45:00Z', 30, 'JSFTDv6xT6WiAxbxHdbbCg==', 89510788612, 'https://us05web.zoom.us/j/89510788612?pwd=Nlc5Nm8zdXpHZ2w0dDVXRmV5SmNCQT09', 'QFBWBlLoTQOSAAmXUxysJA', '2022-08-26 08:12:39', '2022-08-26 08:12:39'),
(11, 'testing meeting for upcoming meetings', 2, '2022-09-22T04:55:00Z', 30, 'IUezobtzQB698bK7lW9Aag==', 81436590554, 'https://us05web.zoom.us/j/81436590554?pwd=TC9WTW10VGR0SzErTENUa2FPVm5CUT09', 'QFBWBlLoTQOSAAmXUxysJA', '2022-09-20 23:26:18', '2022-09-20 23:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_21_123336_create_permission_tables', 2),
(7, '2022_06_27_102113_create_cources_table', 3),
(9, '2022_06_27_112017_create_users_courses_table', 4),
(10, '2022_06_28_035713_create_course_categories_table', 4),
(11, '2022_06_28_082514_create_courses_by_categories_table', 5),
(12, '2022_06_28_083711_add_course_categories_to_cources_table', 6),
(13, '2022_07_04_061513_create_topics_table', 7),
(14, '2022_07_04_083307_create_questions_table', 8),
(16, '2022_07_05_091633_create_topics_table', 9),
(17, '2022_07_05_094643_create_questions_table', 10),
(18, '2022_07_06_064832_add_settings_to_topics_table', 10),
(19, '2022_07_07_125608_create_options_table', 11),
(20, '2022_07_11_134902_create_answers_table', 12),
(21, '2022_07_14_053204_create_meetings_info_table', 13),
(22, '2022_07_26_071826_add_course_subscription_to_cources_table', 14),
(23, '2022_07_26_095912_add_topic_subscription_to_topics_table', 15),
(24, '2022_07_29_043540_create_user_results_table', 16),
(26, '2017_07_08_094112_create_faq_categories_table', 17),
(27, '2017_07_08_102625_create_faqs_table', 17),
(28, '2022_08_22_050617_create_posts_table', 18),
(29, '2022_08_22_111700_create_video_posts_table', 19),
(30, '2022_09_06_060200_create_likes_table', 20),
(31, '2022_09_12_130043_create_posts_comments_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(4, 'App\\Models\\User', 8),
(5, 'App\\Models\\User', 9),
(4, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint UNSIGNED NOT NULL,
  `option` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_true` tinyint NOT NULL DEFAULT '0',
  `que_id` bigint UNSIGNED DEFAULT NULL,
  `opt_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topic_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `option`, `is_true`, `que_id`, `opt_img`, `topic_id`, `created_at`, `updated_at`) VALUES
(5, 'fggdgf', 0, 1, NULL, 4, '2022-07-12 23:42:28', '2022-07-12 23:42:28'),
(6, 'dgdfgd', 0, 1, NULL, 4, '2022-07-12 23:42:28', '2022-07-12 23:42:28'),
(7, 'fsdsf', 0, 1, NULL, 4, '2022-07-12 23:42:28', '2022-07-12 23:42:28'),
(8, 'cjkdchdjh', 0, 1, NULL, 4, '2022-07-12 23:42:28', '2022-07-12 23:42:28'),
(25, 'vdfvdfgdf', 0, 6, NULL, 1, '2022-07-14 06:56:08', '2022-07-14 07:47:28'),
(26, 'gdgdg', 0, 6, NULL, 1, '2022-07-14 06:56:08', '2022-07-14 07:47:28'),
(27, 'gdgdfg', 0, 6, NULL, 1, '2022-07-14 06:56:08', '2022-07-14 07:47:28'),
(28, 'dggdfgdffg', 0, 6, NULL, 1, '2022-07-14 06:56:08', '2022-07-14 07:47:28'),
(37, 'PHP', 0, 11, NULL, 4, '2022-07-21 04:29:09', '2022-07-25 06:34:22'),
(38, 'Java', 0, 11, NULL, 4, '2022-07-21 04:29:09', '2022-07-25 06:34:22'),
(39, 'Python', 0, 11, NULL, 4, '2022-07-21 04:29:09', '2022-07-25 06:34:22'),
(40, 'C++', 0, 11, NULL, 4, '2022-07-21 04:29:09', '2022-07-25 06:34:22'),
(41, 'A1', 0, 10, NULL, 3, '2022-07-25 06:40:16', '2022-07-25 06:41:23'),
(42, 'A2', 0, 10, NULL, 3, '2022-07-25 06:40:16', '2022-07-25 06:41:23'),
(43, 'A3', 0, 10, NULL, 3, '2022-07-25 06:40:16', '2022-07-25 06:41:23'),
(44, 'A4', 0, 10, NULL, 3, '2022-07-25 06:40:16', '2022-07-25 06:41:23'),
(45, 'Maharashtra', 0, 12, NULL, 3, '2022-07-25 07:03:26', '2022-07-25 07:03:26'),
(46, 'Uttar Pradesh', 0, 12, NULL, 3, '2022-07-25 07:03:26', '2022-07-25 07:03:26'),
(47, 'Delhi', 0, 12, NULL, 3, '2022-07-25 07:03:26', '2022-07-25 07:03:26'),
(48, 'Gujarat', 0, 12, NULL, 3, '2022-07-25 07:03:26', '2022-07-25 07:03:26'),
(53, 'Chennai', 0, 14, NULL, 6, '2022-07-25 07:14:23', '2022-07-25 07:14:23'),
(54, 'Cuttack', 0, 14, NULL, 6, '2022-07-25 07:14:23', '2022-07-25 07:14:23'),
(55, 'Bangalore', 0, 14, NULL, 6, '2022-07-25 07:14:23', '2022-07-25 07:14:23'),
(56, 'Quilon', 0, 14, NULL, 6, '2022-07-25 07:14:23', '2022-07-25 07:14:23'),
(57, 'Kalidasa', 0, 15, NULL, 6, '2022-07-25 07:15:14', '2022-07-25 07:15:14'),
(58, 'Charak', 0, 15, NULL, 6, '2022-07-25 07:15:14', '2022-07-25 07:15:14'),
(59, 'Panini', 0, 15, NULL, 6, '2022-07-25 07:15:14', '2022-07-25 07:15:14'),
(60, 'Aryabhatt', 0, 15, NULL, 6, '2022-07-25 07:15:14', '2022-07-25 07:15:14'),
(61, 'Alaknanda', 0, 16, NULL, 6, '2022-07-25 07:16:06', '2022-07-25 07:16:06'),
(62, 'Pindar', 0, 16, NULL, 6, '2022-07-25 07:16:06', '2022-07-25 07:16:06'),
(63, 'Mandakini', 0, 16, NULL, 6, '2022-07-25 07:16:06', '2022-07-25 07:16:06'),
(64, 'Bhagirathi', 0, 16, NULL, 6, '2022-07-25 07:16:06', '2022-07-25 07:16:06'),
(65, 'Zinc', 0, 17, NULL, 6, '2022-07-25 07:16:56', '2022-07-25 07:16:56'),
(66, 'Silver', 0, 17, NULL, 6, '2022-07-25 07:16:56', '2022-07-25 07:16:56'),
(67, 'Copper', 0, 17, NULL, 6, '2022-07-25 07:16:56', '2022-07-25 07:16:56'),
(68, 'Aluminum', 0, 17, NULL, 6, '2022-07-25 07:16:56', '2022-07-25 07:16:56'),
(69, 'Php 5.2', 0, 18, NULL, 7, '2022-07-25 07:34:03', '2022-07-25 07:39:43'),
(70, 'php 6.2', 0, 18, NULL, 7, '2022-07-25 07:34:03', '2022-07-25 07:39:43'),
(71, 'php 7', 0, 18, NULL, 7, '2022-07-25 07:34:03', '2022-07-25 07:39:43'),
(72, 'php 8', 0, 18, NULL, 7, '2022-07-25 07:34:03', '2022-07-25 07:39:43'),
(73, 'JS', 0, 19, NULL, 7, '2022-07-25 07:35:36', '2022-07-25 07:35:36'),
(74, 'REACT JS', 0, 19, NULL, 7, '2022-07-25 07:35:36', '2022-07-25 07:35:36'),
(75, 'HTML', 0, 19, NULL, 7, '2022-07-25 07:35:36', '2022-07-25 07:35:36'),
(76, 'PHP', 0, 19, NULL, 7, '2022-07-25 07:35:36', '2022-07-25 07:35:36'),
(77, 'is_array()', 0, 20, NULL, 7, '2022-07-29 07:42:00', '2022-07-29 07:42:14'),
(78, 'in_array()', 0, 20, NULL, 7, '2022-07-29 07:42:00', '2022-07-29 07:42:14'),
(79, 'array_push()', 0, 20, NULL, 7, '2022-07-29 07:42:00', '2022-07-29 07:42:14'),
(80, 'array()', 0, 20, NULL, 7, '2022-07-29 07:42:00', '2022-07-29 07:42:14'),
(93, NULL, 0, 22, 'Screenshot from 2022-06-28 12-21-50.png', 7, '2022-08-02 04:56:24', '2022-08-02 04:56:24'),
(94, NULL, 0, 22, 'Screenshot from 2022-06-22 15-38-50.png', 7, '2022-08-02 04:56:24', '2022-08-02 04:56:24'),
(95, NULL, 0, 22, 'Screenshot from 2022-06-15 14-18-22.png', 7, '2022-08-02 04:56:24', '2022-08-02 04:56:24'),
(96, NULL, 0, 22, 'homepage2_04.jpg', 7, '2022-08-02 04:56:24', '2022-08-04 02:56:58'),
(97, NULL, 0, 23, 'Screenshot from 2022-07-12 17-22-09.png', 7, '2022-08-03 02:59:52', '2022-08-03 02:59:52'),
(98, NULL, 0, 23, 'Screenshot from 2022-06-30 14-20-21.png', 7, '2022-08-03 02:59:52', '2022-08-03 02:59:52'),
(99, NULL, 0, 23, 'Screenshot from 2022-06-28 12-21-50.png', 7, '2022-08-03 02:59:52', '2022-08-03 03:57:13'),
(100, NULL, 0, 23, 'Screenshot from 2022-06-28 12-24-26.png', 7, '2022-08-03 02:59:52', '2022-08-03 02:59:52'),
(101, NULL, 0, 25, 'Screenshot from 2022-07-12 17-22-09.png', 7, '2022-08-03 03:39:52', '2022-08-03 03:39:52'),
(102, NULL, 0, 25, 'Screenshot from 2022-06-28 12-12-28.png', 7, '2022-08-03 03:39:52', '2022-08-03 03:39:52'),
(103, NULL, 0, 25, 'Screenshot from 2022-06-24 16-21-10.png', 7, '2022-08-03 03:39:52', '2022-08-03 03:39:52'),
(104, NULL, 0, 25, 'Screenshot from 2022-06-23 11-57-29.png', 7, '2022-08-03 03:39:52', '2022-08-03 03:39:52'),
(105, 'Test 1', 0, 24, 'homepage2_02-1.jpg', 7, '2022-08-03 03:57:45', '2022-08-04 03:06:35'),
(106, 'Test 3', 0, 24, 'homepage2_06-1.jpg', 7, '2022-08-03 03:57:45', '2022-08-04 03:06:35'),
(107, 'Test 5', 0, 24, 'cropped-logo.png', 7, '2022-08-03 03:57:45', '2022-08-04 03:06:35'),
(108, 'Test 7', 0, 24, '6.jpg', 7, '2022-08-03 03:57:45', '2022-08-04 03:06:35'),
(121, NULL, 0, 21, 'homepage2_02-1.jpg', 7, '2022-08-03 06:04:36', '2022-08-03 07:43:57'),
(122, NULL, 0, 21, 'homepage2_04.jpg', 7, '2022-08-03 06:04:36', '2022-08-03 07:43:57'),
(123, NULL, 0, 21, 'homepage2_02.jpg', 7, '2022-08-03 06:04:36', '2022-08-03 07:43:57'),
(124, NULL, 0, 21, 'flip.jpg', 7, '2022-08-03 06:04:36', '2022-08-03 08:03:11'),
(125, NULL, 0, 26, 'homepage2_04.jpg', 7, '2022-08-03 07:29:48', '2022-08-03 07:29:48'),
(126, NULL, 0, 26, 'homepage2_02-1.jpg', 7, '2022-08-03 07:29:48', '2022-08-03 07:29:48'),
(127, NULL, 0, 26, 'flip.jpg', 7, '2022-08-03 07:29:48', '2022-08-03 07:29:48'),
(128, NULL, 0, 26, 'homepage2_10.jpg', 7, '2022-08-03 07:29:48', '2022-08-03 07:29:48'),
(129, 'is_int()', 0, 27, NULL, 7, '2022-08-03 07:46:28', '2022-08-03 07:47:00'),
(130, 'is_integer()', 0, 27, NULL, 7, '2022-08-03 07:46:28', '2022-08-03 07:47:00'),
(131, 'is_long()', 0, 27, NULL, 7, '2022-08-03 07:46:28', '2022-08-03 07:47:00'),
(132, 'is_short()', 0, 27, NULL, 7, '2022-08-03 07:46:28', '2022-08-03 07:47:00'),
(133, 'Q1', 0, 28, NULL, 1, '2022-08-04 05:56:48', '2022-08-04 07:38:33'),
(134, 'Q2', 0, 28, NULL, 1, '2022-08-04 05:56:48', '2022-08-04 07:38:33'),
(135, 'Q3', 0, 28, NULL, 1, '2022-08-04 05:56:48', '2022-08-04 07:38:33'),
(136, 'Q4', 0, 28, NULL, 1, '2022-08-04 05:56:48', '2022-08-04 07:38:33'),
(137, NULL, 0, 29, 'location.png', 1, '2022-08-05 08:11:21', '2022-08-05 08:11:21'),
(138, NULL, 0, 29, 'homepage2_02.jpg', 1, '2022-08-05 08:11:21', '2022-08-05 08:11:21'),
(139, NULL, 0, 29, 'cropped-logo.png', 1, '2022-08-05 08:11:21', '2022-08-05 08:11:21'),
(140, NULL, 0, 29, 'arrow_red.png', 1, '2022-08-05 08:11:21', '2022-08-05 08:11:21'),
(141, 'New', 0, 30, NULL, 7, '2022-08-18 01:50:11', '2022-08-18 01:50:55'),
(142, 'Old', 0, 30, NULL, 7, '2022-08-18 01:50:11', '2022-08-18 01:50:55'),
(143, 'Very old', 0, 30, NULL, 7, '2022-08-18 01:50:11', '2022-08-18 01:50:55'),
(144, 'Very new', 0, 30, NULL, 7, '2022-08-18 01:50:11', '2022-08-18 01:50:55'),
(145, NULL, 0, 31, 'Screenshot_16.png', 8, '2022-08-26 08:32:57', '2022-08-26 08:32:57'),
(146, NULL, 0, 31, 'Screenshot_14.png', 8, '2022-08-26 08:32:57', '2022-08-26 08:32:57'),
(147, NULL, 0, 31, 'Screenshot_18.png', 8, '2022-08-26 08:32:57', '2022-08-26 08:32:57'),
(148, NULL, 0, 31, 'Screenshot_10.png', 8, '2022-08-26 08:32:57', '2022-08-26 08:32:57'),
(149, 'Ireland', 0, 32, NULL, 8, '2022-08-26 08:34:24', '2022-08-26 08:34:24'),
(150, 'India', 0, 32, NULL, 8, '2022-08-26 08:34:24', '2022-08-26 08:34:24'),
(151, 'China', 0, 32, NULL, 8, '2022-08-26 08:34:24', '2022-08-26 08:34:24'),
(152, 'Russia', 0, 32, NULL, 8, '2022-08-26 08:34:24', '2022-08-26 08:34:24'),
(161, NULL, 0, 37, 'Screenshot from 2022-08-23 12-34-56.png', 4, '2022-09-21 07:53:29', '2022-09-21 07:53:29'),
(162, NULL, 0, 37, 'Screenshot from 2022-06-28 12-12-28.png', 4, '2022-09-21 07:53:29', '2022-09-21 07:53:29'),
(163, NULL, 0, 37, 'Screenshot from 2022-06-23 12-41-43.png', 4, '2022-09-21 07:53:29', '2022-09-21 07:53:29'),
(164, NULL, 0, 37, 'Screenshot from 2022-06-23 12-41-43.png', 4, '2022-09-21 07:53:29', '2022-09-21 07:53:29'),
(165, '<p>bdfbgdf</p>', 0, 36, NULL, 7, '2022-09-21 08:08:29', '2022-09-21 08:08:29'),
(166, '<p>bdgbf</p>', 0, 36, NULL, 7, '2022-09-21 08:08:30', '2022-09-21 08:08:30'),
(167, '<p>dsfvsd</p>', 0, 36, NULL, 7, '2022-09-21 08:08:30', '2022-09-21 08:08:30'),
(168, '<p>dsfgvdsfg</p>', 0, 36, NULL, 7, '2022-09-21 08:08:30', '2022-09-21 08:08:30'),
(169, NULL, 0, 35, 'Screenshot from 2022-08-23 12-34-56.png', 8, '2022-09-21 23:12:21', '2022-09-21 23:12:21'),
(170, NULL, 0, 35, 'Screenshot from 2022-06-23 16-21-14.png', 8, '2022-09-21 23:12:21', '2022-09-21 23:12:21'),
(171, NULL, 0, 35, 'Screenshot from 2022-06-21 17-17-13.png', 8, '2022-09-21 23:12:21', '2022-09-21 23:12:21'),
(172, NULL, 0, 35, 'Screenshot from 2022-06-23 11-59-26.png', 8, '2022-09-21 23:12:21', '2022-09-21 23:12:21'),
(173, '<h1>This is a Heading</h1>\r\n<p>1111This is a paragraph.</p>', 0, 38, NULL, 9, '2022-09-22 03:56:24', '2022-09-22 23:20:33'),
(174, '<h2>A basic HTML tableqq</h2>\r\n<table style=\"width: 100%;\">\r\n<tbody>\r\n<tr>\r\n<th>Company</th>\r\n<th>Contact</th>\r\n<th>Country</th>\r\n</tr>\r\n<tr>\r\n<td>Alfreds Futterkiste</td>\r\n<td>Maria Anders</td>\r\n<td>Germany</td>\r\n</tr>\r\n<tr>\r\n<td>Centro comercial Moctezuma</td>\r\n<td>Francisco Chang</td>\r\n<td>Mexico</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>To understand the example better, we have added borders to the table.</p>', 0, 38, NULL, 9, '2022-09-22 03:56:24', '2022-09-22 23:20:38'),
(175, '<table><colgroup> <col style=\"background-color: red;\" span=\"2\"> <col style=\"background-color: yellow;\"> </colgroup>\r\n<tbody>\r\n<tr>\r\n<th>ISBN</th>\r\n<th>Title</th>\r\n<th>Price</th>\r\n</tr>\r\n<tr>\r\n<td>3476896</td>\r\n<td>My first HTML</td>\r\n<td>$53</td>\r\n</tr>\r\n</tbody>\r\n</table>', 0, 38, NULL, 9, '2022-09-22 03:56:24', '2022-09-22 23:20:38'),
(176, '<ul>\r\n<li>Cherry Tomato</li>\r\n<li>Beef Tomato</li>\r\n<li>Snack Tomato</li>\r\n</ul>', 0, 38, NULL, 9, '2022-09-22 03:56:24', '2022-09-22 23:20:38'),
(177, NULL, 0, 39, 'Screenshot from 2022-06-23 12-40-42.png', 9, '2022-09-22 23:27:29', '2022-09-22 23:32:47'),
(178, NULL, 0, 39, 'Screenshot from 2022-06-28 11-39-00.png', 9, '2022-09-22 23:27:29', '2022-09-22 23:27:29'),
(179, NULL, 0, 39, 'Screenshot from 2022-06-23 12-41-43.png', 9, '2022-09-22 23:27:29', '2022-09-22 23:27:29'),
(180, NULL, 0, 39, 'Screenshot from 2022-06-23 11-59-26.png', 9, '2022-09-22 23:27:29', '2022-09-22 23:27:29'),
(181, NULL, 0, 40, 'Screenshot from 2022-06-28 11-39-00.png', 9, '2022-09-22 23:49:48', '2022-09-22 23:49:48'),
(182, NULL, 0, 40, 'Screenshot from 2022-06-23 11-59-26.png', 9, '2022-09-22 23:49:48', '2022-09-22 23:49:48'),
(183, NULL, 0, 40, 'Screenshot from 2022-06-16 11-07-38.png', 9, '2022-09-22 23:49:49', '2022-09-22 23:49:49'),
(184, NULL, 0, 40, 'Screenshot from 2022-06-23 12-40-42.png', 9, '2022-09-22 23:49:49', '2022-09-22 23:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('super_admin@gmail.com', '$2y$10$rS3vmFz51jYd33dHyU4GieFQc0sbtxyEz.txhvSTWZarIavJUvniW', '2022-08-16 07:49:44'),
('signal.user@mail.com', '$2y$10$UHV3OBVTU566EMODlAhWvuGgoxvq61uMTyaWpDwYRSjY9ACxmi.hS', '2022-08-30 07:22:34'),
('testdata@gmail.com', '$2y$10$oqLi2Lug8E3ydlF/pu1EVe4BS9gV4.ccxsjENvuAiEDFZpKj6iP2.', '2022-09-22 23:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2022-06-21 07:19:06', '2022-06-21 07:19:06'),
(2, 'role-create', 'web', '2022-06-21 07:19:06', '2022-06-21 07:19:06'),
(3, 'role-edit', 'web', '2022-06-21 07:19:06', '2022-06-21 07:19:06'),
(4, 'role-delete', 'web', '2022-06-21 07:19:06', '2022-06-21 07:19:06'),
(7, 'quiz-access', 'web', '2022-07-27 01:08:07', '2022-07-27 01:08:07'),
(8, 'course-access', 'web', '2022-07-27 01:08:19', '2022-09-14 05:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `post_author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `youtube_video_link` longtext COLLATE utf8mb4_unicode_ci,
  `post_video_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_author`, `post_title`, `post_content`, `youtube_video_link`, `post_video_name`, `post_image`, `post_type`, `post_status`, `created_at`, `updated_at`) VALUES
(3, '1', 'My Post', '<h2>HTML Table</h2>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<th>Company</th>\r\n<th>Contact</th>\r\n<th>Country</th>\r\n</tr>\r\n<tr>\r\n<td>Alfreds Futterkiste</td>\r\n<td>Maria Anders</td>\r\n<td>Germany</td>\r\n</tr>\r\n<tr>\r\n<td>Centro comercial Moctezuma</td>\r\n<td>Francisco Chang</td>\r\n<td>Mexico</td>\r\n</tr>\r\n<tr>\r\n<td>Ernst Handel</td>\r\n<td>Roland Mendel</td>\r\n<td>Austria</td>\r\n</tr>\r\n<tr>\r\n<td>Island Trading</td>\r\n<td>Helen Bennett</td>\r\n<td>UK</td>\r\n</tr>\r\n<tr>\r\n<td>Laughing Bacchus Winecellars</td>\r\n<td>Yoshi Tannamuri</td>\r\n<td>Canada</td>\r\n</tr>\r\n<tr>\r\n<td>Magazzini Alimentari Riuniti</td>\r\n<td>Giovanni Rovelli</td>\r\n<td>Italy</td>\r\n</tr>\r\n</tbody>\r\n</table>', NULL, NULL, NULL, 'post', 1, '2022-08-22 07:51:23', '2022-08-22 07:51:23'),
(4, '1', 'Running Tests', '<p>Once you have PHPUnit installed and some test cases written, you&rsquo;ll want to run the test cases very frequently. It&rsquo;s a good idea to run tests before committing any changes to help ensure you haven&rsquo;t broken anything.</p>\r\n<p>By using&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">phpunit</span></code>&nbsp;you can run your application tests. To run your application&rsquo;s tests you can simply run:</p>\r\n<div class=\"highlight-console notranslate\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"go\">vendor/bin/phpunit</span>\r\n\r\n<span class=\"go\">php phpunit.phar</span>\r\n</pre>\r\n</div>\r\n</div>\r\n<p>If you have cloned the&nbsp;<a class=\"reference external\" href=\"https://github.com/cakephp/cakephp\">CakePHP source from GitHub</a>&nbsp;and wish to run CakePHP&rsquo;s unit-tests don&rsquo;t forget to execute the following&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">Composer</span></code>&nbsp;command prior to running&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">phpunit</span></code>&nbsp;so that any dependencies are installed:</p>\r\n<div class=\"highlight-console notranslate\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"go\">composer install</span>\r\n</pre>\r\n</div>\r\n</div>\r\n<p>From your application&rsquo;s root directory. To run tests for a plugin that is part of your application source, first&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">cd</span></code>&nbsp;into the plugin directory, then use&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">phpunit</span></code>&nbsp;command that matches how you installed phpunit:</p>\r\n<div class=\"highlight-console notranslate\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"go\">cd plugins</span>\r\n\r\n<span class=\"go\">../vendor/bin/phpunit</span>\r\n\r\n<span class=\"go\">php ../phpunit.phar</span>\r\n</pre>\r\n</div>\r\n</div>\r\n<p>To run tests on a standalone plugin, you should first install the project in a separate directory and install its dependencies:</p>\r\n<div class=\"highlight-console notranslate\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"go\">git clone git://github.com/cakephp/debug_kit.git</span>\r\n<span class=\"go\">cd debug_kit</span>\r\n<span class=\"go\">php ~/composer.phar install</span>\r\n<span class=\"go\">php ~/phpunit.phar</span></pre>\r\n</div>\r\n</div>', NULL, NULL, NULL, 'post', 1, '2022-08-23 00:04:03', '2022-08-23 00:04:03'),
(5, '1', 'Fixtures', '<p>When testing code that depends on models and the database, one can use&nbsp;<strong>fixtures</strong>&nbsp;as a way to create initial state for your application&rsquo;s tests. By using fixture data you can reduce repetitive setup steps in your tests. Fixtures are well suited to data that is common or shared amongst many or all of your tests. Data that is only needed in a subset of tests should be created in tests as needed.</p>\r\n<p>CakePHP uses the connection named&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">test</span></code>&nbsp;in your&nbsp;<strong>config/app.php</strong>&nbsp;configuration file. If this connection is not usable, an exception will be raised and you will not be able to use database fixtures.</p>\r\n<p>CakePHP performs the following during the course of a test run:</p>\r\n<ol class=\"arabic simple\">\r\n<li>\r\n<p>Creates tables for each of the fixtures needed.</p>\r\n</li>\r\n<li>\r\n<p>Populates tables with data.</p>\r\n</li>\r\n<li>\r\n<p>Runs test methods.</p>\r\n</li>\r\n<li>\r\n<p>Empties the fixture tables.</p>\r\n</li>\r\n</ol>\r\n<p>The schema for fixtures is created at the beginning of a test run via migrations or a SQL dump file.</p>', NULL, NULL, NULL, 'post', 1, '2022-08-23 00:05:20', '2022-08-23 00:05:34'),
(6, '1', 'Test Connections', '<p>By default CakePHP will alias each connection in your application. Each connection defined in your application&rsquo;s bootstrap that does not start with&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">test_</span></code>&nbsp;will have a&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">test_</span></code>&nbsp;prefixed alias created. Aliasing connections ensures, you don&rsquo;t accidentally use the wrong connection in test cases. Connection aliasing is transparent to the rest of your application. For example if you use the &lsquo;default&rsquo; connection, instead you will get the&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">test</span></code>&nbsp;connection in test cases. If you use the &lsquo;replica&rsquo; connection, the test suite will attempt to use &lsquo;test_replica&rsquo;.</p>', NULL, NULL, NULL, 'post', 1, '2022-08-23 00:06:11', '2022-08-23 00:06:11'),
(7, '1', 'PHPUnit Configuration', '<p>Before you can use fixtures you should double check that your&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">phpunit.xml</span></code>&nbsp;contains the fixture extension:</p>\r\n<div class=\"highlight-xml notranslate\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"cm\">&lt;!-- in phpunit.xml --&gt;</span>\r\n<span class=\"cm\">&lt;!-- Setup the extension for fixtures --&gt;</span>\r\n<span class=\"nt\">&lt;extensions&gt;</span>\r\n    <span class=\"nt\">&lt;extension</span> <span class=\"na\">class=</span><span class=\"s\">\"\\Cake\\TestSuite\\Fixture\\PHPUnitExtension\"</span> <span class=\"nt\">/&gt;</span>\r\n<span class=\"nt\">&lt;/extensions&gt;</span>\r\n</pre>\r\n</div>\r\n</div>\r\n<p>The extension is included in your application and plugins generated by&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">bake</span></code>&nbsp;by default.</p>\r\n<p>Prior to CakePHP 4.3.0, a PHPUnit listener was used instead of a PHPUnit extension and your&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">phpunit.xml</span></code>&nbsp;file should contain:</p>\r\n<div class=\"highlight-xml notranslate\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"cm\">&lt;!-- in phpunit.xml --&gt;</span>\r\n<span class=\"cm\">&lt;!-- Setup a listener for fixtures --&gt;</span>\r\n<span class=\"nt\">&lt;listeners&gt;</span>\r\n    <span class=\"nt\">&lt;listener</span>\r\n    <span class=\"na\">class=</span><span class=\"s\">\"\\Cake\\TestSuite\\Fixture\\FixtureInjector\"</span><span class=\"nt\">&gt;</span>\r\n        <span class=\"nt\">&lt;arguments&gt;</span>\r\n            <span class=\"nt\">&lt;object</span> <span class=\"na\">class=</span><span class=\"s\">\"\\Cake\\TestSuite\\Fixture\\FixtureManager\"</span> <span class=\"nt\">/&gt;</span>\r\n        <span class=\"nt\">&lt;/arguments&gt;</span>\r\n    <span class=\"nt\">&lt;/listener&gt;</span>\r\n<span class=\"nt\">&lt;/listeners&gt;</span>\r\n</pre>\r\n</div>\r\n</div>\r\n<p>The listener is deprecated and you should&nbsp;<a class=\"reference internal\" href=\"https://book.cakephp.org/4/en/appendices/fixture-upgrade.html\"><span class=\"doc\">update your fixture configuration</span></a></p>', NULL, NULL, NULL, 'post', 1, '2022-08-23 00:06:32', '2022-08-23 00:06:38'),
(8, '1', 'Creating Test Database Schema', '<p>You can generate test database schema either via CakePHP&rsquo;s migrations, loading a SQL dump file or using another external schema management tool. You should create your schema in your application&rsquo;s <code class=\"docutils literal notranslate\"><span class=\"pre\">tests/bootstrap.php</span></code> file.</p>\r\n<p>If you use CakePHP&rsquo;s <cite>migrations plugin &lt;/migrations&gt;</cite> to manage your application&rsquo;s schema, you can reuse those migrations to generate your test database schema as well:</p>\r\n<div class=\"highlight-phpinline notranslate\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"c1\">// in tests/bootstrap.php</span>\r\n<span class=\"k\">use</span> <span class=\"nx\">Migrations\\TestSuite\\Migrator</span><span class=\"p\">;</span>\r\n\r\n<span class=\"nv\">$migrator</span> <span class=\"o\">=</span> <span class=\"k\">new</span> <span class=\"nx\">Migrator</span><span class=\"p\">();</span>\r\n\r\n<span class=\"c1\">// Simple setup for with no plugins</span>\r\n<span class=\"nv\">$migrator</span><span class=\"o\">-&gt;</span><span class=\"na\">run</span><span class=\"p\">();</span>\r\n\r\n<span class=\"c1\">// Run migrations for multiple plugins</span>\r\n<span class=\"nv\">$migrator</span><span class=\"o\">-&gt;</span><span class=\"na\">run</span><span class=\"p\">([</span><span class=\"s1\">\'plugin\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'Contacts\'</span><span class=\"p\">]);</span>\r\n\r\n<span class=\"c1\">// Run the Documents migrations on the test_docs connection.</span>\r\n<span class=\"nv\">$migrator</span><span class=\"o\">-&gt;</span><span class=\"na\">run</span><span class=\"p\">([</span><span class=\"s1\">\'plugin\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'Documents\'</span><span class=\"p\">,</span> <span class=\"s1\">\'connection\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'test_docs\'</span><span class=\"p\">]);</span>\r\n</pre>\r\n</div>\r\n</div>\r\n<p>If you need to run multiple sets of migrations, those can be run as follows:</p>\r\n<div class=\"highlight-phpinline notranslate\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"nv\">$migrator</span><span class=\"o\">-&gt;</span><span class=\"na\">runMany</span><span class=\"p\">([</span>\r\n    <span class=\"c1\">// Run app migrations on test connection.</span>\r\n    <span class=\"p\">[</span><span class=\"s1\">\'connection\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'test\'</span><span class=\"p\">],</span>\r\n    <span class=\"c1\">// Run Contacts migrations on test connection.</span>\r\n    <span class=\"p\">[</span><span class=\"s1\">\'plugin\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'Contacts\'</span><span class=\"p\">],</span>\r\n    <span class=\"c1\">// Run Documents migrations on test_docs connection.</span>\r\n    <span class=\"p\">[</span><span class=\"s1\">\'plugin\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'Documents\'</span><span class=\"p\">,</span> <span class=\"s1\">\'connection\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'test_docs\'</span><span class=\"p\">]</span>\r\n<span class=\"p\">]);</span>\r\n</pre>\r\n</div>\r\n</div>\r\n<p>Using <code class=\"docutils literal notranslate\"><span class=\"pre\">runMany()</span></code> will ensure that plugins that share a database don&rsquo;t drop tables as each set of migrations is run.</p>\r\n<p>The migrations plugin will only run unapplied migrations, and will reset migrations if your current migration head differs from the applied migrations.</p>\r\n<p>You can also configure how migrations should be run in tests in your datasources configuration. See the&nbsp;<a class=\"reference internal\" href=\"https://book.cakephp.org/4/en/migrations.html\"><span class=\"doc\">migrations docs</span></a>&nbsp;for more information.</p>\r\n<p>To load a SQL dump file you can use the following:</p>\r\n<div class=\"highlight-phpinline notranslate\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"c1\">// in tests/bootstrap.php</span>\r\n<span class=\"k\">use</span> <span class=\"nx\">Cake\\TestSuite\\Fixture\\SchemaLoader</span><span class=\"p\">;</span>\r\n\r\n<span class=\"c1\">// Load one or more SQL files.</span>\r\n<span class=\"p\">(</span><span class=\"k\">new</span> <span class=\"nx\">SchemaLoader</span><span class=\"p\">())</span><span class=\"o\">-&gt;</span><span class=\"na\">loadSqlFiles</span><span class=\"p\">(</span><span class=\"s1\">\'path/to/schema.sql\'</span><span class=\"p\">,</span> <span class=\"s1\">\'test\'</span><span class=\"p\">);</span>\r\n</pre>\r\n</div>\r\n</div>\r\n<p>At the beginning of each test run <code class=\"docutils literal notranslate\"><span class=\"pre\">SchemaLoader</span></code> will drop all tables in the connection and rebuild tables based on the provided schema file.</p>\r\n<div class=\"versionadded\">\r\n<p><span class=\"versionmodified added\">New in version 4.3.0: </span>SchemaLoader was added.</p>\r\n</div>', NULL, NULL, NULL, 'post', 1, '2022-08-23 00:11:23', '2022-08-23 00:11:23'),
(9, '1', 'Fixture State Managers', '<p>By default CakePHP resets fixture state at the end of each test by truncating all the tables in the database. This operation can become expensive as your application grows. By using&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">TransactionStrategy</span></code>&nbsp;each test method will be run inside a transaction that is rolled back at the end of the test. This can yield improved performance but requires your tests not heavily rely on static fixture data, as auto-increment values are not reset before each test.</p>\r\n<p>The fixture state management strategy can be defined within the test case:</p>\r\n<div class=\"highlight-phpinline notranslate\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"k\">use</span> <span class=\"nx\">Cake\\TestSuite\\TestCase</span><span class=\"p\">;</span>\r\n<span class=\"k\">use</span> <span class=\"nx\">Cake\\TestSuite\\Fixture\\FixtureStrategyInterface</span><span class=\"p\">;</span>\r\n<span class=\"k\">use</span> <span class=\"nx\">Cake\\TestSuite\\Fixture\\TransactionStrategy</span><span class=\"p\">;</span>\r\n\r\n<span class=\"k\">class</span> <span class=\"nc\">ArticlesTableTest</span> <span class=\"k\">extends</span> <span class=\"nx\">TestCase</span>\r\n<span class=\"p\">{</span>\r\n    <span class=\"sd\">/**</span>\r\n<span class=\"sd\">     * Create the fixtures strategy used for this test case.</span>\r\n<span class=\"sd\">     * You can use a base class/trait to change multiple classes.</span>\r\n<span class=\"sd\">     */</span>\r\n    <span class=\"k\">protected</span> <span class=\"k\">function</span> <span class=\"nf\">getFixtureStrategy</span><span class=\"p\">()</span><span class=\"o\">:</span> <span class=\"nx\">FixtureStrategyInterface</span>\r\n    <span class=\"p\">{</span>\r\n        <span class=\"k\">return</span> <span class=\"k\">new</span> <span class=\"nx\">TransactionStrategy</span><span class=\"p\">();</span>\r\n    <span class=\"p\">}</span>\r\n<span class=\"p\">}</span>\r\n</pre>\r\n</div>\r\n</div>\r\n<div class=\"versionadded\">\r\n<p><span class=\"versionmodified added\">New in version 4.3.0.</span></p>\r\n</div>', NULL, NULL, NULL, 'post', 1, '2022-08-23 00:13:30', '2022-08-23 00:13:30'),
(10, '1', 'Creating Fixtures', '<p>Fixtures defines the records that will be inserted into the test database at the beginning of each test. Let&rsquo;s create our first fixture, that will be used to test our own Article model. Create a file named&nbsp;<strong>ArticlesFixture.php</strong>&nbsp;in your&nbsp;<strong>tests/Fixture</strong>&nbsp;directory, with the following content:</p>\r\n<div class=\"highlight-phpinline notranslate\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"k\">namespace</span> <span class=\"nx\">App\\Test\\Fixture</span><span class=\"p\">;</span>\r\n\r\n<span class=\"k\">use</span> <span class=\"nx\">Cake\\TestSuite\\Fixture\\TestFixture</span><span class=\"p\">;</span>\r\n\r\n<span class=\"k\">class</span> <span class=\"nc\">ArticlesFixture</span> <span class=\"k\">extends</span> <span class=\"nx\">TestFixture</span>\r\n<span class=\"p\">{</span>\r\n      <span class=\"c1\">// Optional. Set this property to load fixtures to a different test datasource</span>\r\n      <span class=\"k\">public</span> <span class=\"nv\">$connection</span> <span class=\"o\">=</span> <span class=\"s1\">\'test\'</span><span class=\"p\">;</span>\r\n\r\n      <span class=\"k\">public</span> <span class=\"nv\">$records</span> <span class=\"o\">=</span> <span class=\"p\">[</span>\r\n          <span class=\"p\">[</span>\r\n              <span class=\"s1\">\'title\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'First Article\'</span><span class=\"p\">,</span>\r\n              <span class=\"s1\">\'body\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'First Article Body\'</span><span class=\"p\">,</span>\r\n              <span class=\"s1\">\'published\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'1\'</span><span class=\"p\">,</span>\r\n              <span class=\"s1\">\'created\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'2007-03-18 10:39:23\'</span><span class=\"p\">,</span>\r\n              <span class=\"s1\">\'modified\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'2007-03-18 10:41:31\'</span>\r\n          <span class=\"p\">],</span>\r\n          <span class=\"p\">[</span>\r\n              <span class=\"s1\">\'title\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'Second Article\'</span><span class=\"p\">,</span>\r\n              <span class=\"s1\">\'body\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'Second Article Body\'</span><span class=\"p\">,</span>\r\n              <span class=\"s1\">\'published\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'1\'</span><span class=\"p\">,</span>\r\n              <span class=\"s1\">\'created\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'2007-03-18 10:41:23\'</span><span class=\"p\">,</span>\r\n              <span class=\"s1\">\'modified\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'2007-03-18 10:43:31\'</span>\r\n          <span class=\"p\">],</span>\r\n          <span class=\"p\">[</span>\r\n              <span class=\"s1\">\'title\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'Third Article\'</span><span class=\"p\">,</span>\r\n              <span class=\"s1\">\'body\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'Third Article Body\'</span><span class=\"p\">,</span>\r\n              <span class=\"s1\">\'published\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'1\'</span><span class=\"p\">,</span>\r\n              <span class=\"s1\">\'created\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'2007-03-18 10:43:23\'</span><span class=\"p\">,</span>\r\n              <span class=\"s1\">\'modified\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'2007-03-18 10:45:31\'</span>\r\n          <span class=\"p\">]</span>\r\n      <span class=\"p\">];</span>\r\n <span class=\"p\">}</span>\r\n</pre>\r\n</div>\r\n</div>\r\n<div class=\"admonition note\">\r\n<p>It is recommended to not manually add values to auto incremental columns, as it interferes with the sequence generation in PostgreSQL and SQLServer.</p>\r\n</div>\r\n<p>The&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">$connection</span></code>&nbsp;property defines the datasource of which the fixture will use. If your application uses multiple datasources, you should make the fixtures match the model&rsquo;s datasources but prefixed with&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">test_</span></code>. For example if your model uses the&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">mydb</span></code>&nbsp;datasource, your fixture should use the&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">test_mydb</span></code>&nbsp;datasource. If the&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">test_mydb</span></code>&nbsp;connection doesn&rsquo;t exist, your models will use the default&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">test</span></code>&nbsp;datasource. Fixture datasources must be prefixed with&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">test</span></code>&nbsp;to reduce the possibility of accidentally truncating all your application&rsquo;s data when running tests.</p>\r\n<p>We can define a set of records that will be populated after the fixture table is created. The format is fairly straight forward,&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">$records</span></code>&nbsp;is an array of records. Each item in&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">$records</span></code>&nbsp;should be a single row. Inside each row, should be an associative array of the columns and values for the row. Just keep in mind that each record in the&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">$records</span></code>&nbsp;array must have the same keys as rows are bulk inserted.</p>\r\n<div class=\"versionchanged\">\r\n<p><span class=\"versionmodified changed\">Changed in version 4.3.0:&nbsp;</span>Prior to 4.3.0 fixtures would also define the table&rsquo;s schema. You can learn more about&nbsp;<a class=\"reference internal\" href=\"https://book.cakephp.org/4/en/appendices/fixture-upgrade.html#fixture-schema\"><span class=\"std std-ref\">Fixture Schema</span></a>&nbsp;if you still need to define schema in your fixtures.</p>\r\n</div>', NULL, NULL, NULL, 'post', 1, '2022-08-23 00:13:59', '2022-08-23 00:13:59'),
(11, '1', 'Dynamic Data', '<p>To use functions or other dynamic data in your fixture records you can define your records in the fixture&rsquo;s&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">init()</span></code>&nbsp;method:</p>\r\n<div class=\"highlight-phpinline notranslate\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"k\">namespace</span> <span class=\"nx\">App\\Test\\Fixture</span><span class=\"p\">;</span>\r\n\r\n<span class=\"k\">use</span> <span class=\"nx\">Cake\\TestSuite\\Fixture\\TestFixture</span><span class=\"p\">;</span>\r\n\r\n<span class=\"k\">class</span> <span class=\"nc\">ArticlesFixture</span> <span class=\"k\">extends</span> <span class=\"nx\">TestFixture</span>\r\n<span class=\"p\">{</span>\r\n    <span class=\"k\">public</span> <span class=\"k\">function</span> <span class=\"nf\">init</span><span class=\"p\">()</span><span class=\"o\">:</span> <span class=\"nx\">void</span>\r\n    <span class=\"p\">{</span>\r\n        <span class=\"nv\">$this</span><span class=\"o\">-&gt;</span><span class=\"na\">records</span> <span class=\"o\">=</span> <span class=\"p\">[</span>\r\n            <span class=\"p\">[</span>\r\n                <span class=\"s1\">\'title\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'First Article\'</span><span class=\"p\">,</span>\r\n                <span class=\"s1\">\'body\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'First Article Body\'</span><span class=\"p\">,</span>\r\n                <span class=\"s1\">\'published\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\">\'1\'</span><span class=\"p\">,</span>\r\n                <span class=\"s1\">\'created\'</span> <span class=\"o\">=&gt;</span> <span class=\"nb\">date</span><span class=\"p\">(</span><span class=\"s1\">\'Y-m-d H:i:s\'</span><span class=\"p\">),</span>\r\n                <span class=\"s1\">\'modified\'</span> <span class=\"o\">=&gt;</span> <span class=\"nb\">date</span><span class=\"p\">(</span><span class=\"s1\">\'Y-m-d H:i:s\'</span><span class=\"p\">),</span>\r\n            <span class=\"p\">],</span>\r\n        <span class=\"p\">];</span>\r\n        <span class=\"k\">parent</span><span class=\"o\">::</span><span class=\"na\">init</span><span class=\"p\">();</span>\r\n    <span class=\"p\">}</span>\r\n<span class=\"p\">}</span>\r\n</pre>\r\n</div>\r\n</div>\r\n<div class=\"admonition note\">\r\n<p>When overriding&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">init()</span></code>&nbsp;remember to always call&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">parent::init()</span></code>.</p>\r\n</div>', NULL, NULL, NULL, 'post', 1, '2022-08-23 00:14:25', '2022-08-23 00:14:25'),
(12, '1', 'Loading Fixtures in your Test Cases', '<p>After you&rsquo;ve created your fixtures, you&rsquo;ll want to use them in your test cases. In each test case you should load the fixtures you will need. You should load a fixture for every model that will have a query run against it. To load fixtures you define the&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">$fixtures</span></code>&nbsp;property in your model:</p>\r\n<div class=\"highlight-phpinline notranslate\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"k\">class</span> <span class=\"nc\">ArticlesTest</span> <span class=\"k\">extends</span> <span class=\"nx\">TestCase</span>\r\n<span class=\"p\">{</span>\r\n    <span class=\"k\">protected</span> <span class=\"nv\">$fixtures</span> <span class=\"o\">=</span> <span class=\"p\">[</span><span class=\"s1\">\'app.Articles\'</span><span class=\"p\">,</span> <span class=\"s1\">\'app.Comments\'</span><span class=\"p\">];</span>\r\n<span class=\"p\">}</span>\r\n</pre>\r\n</div>\r\n</div>\r\n<p>As of 4.1.0 you can use&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">getFixtures()</span></code>&nbsp;to define your fixture list with a method:</p>\r\n<div class=\"highlight-phpinline notranslate\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"k\">public</span> <span class=\"k\">function</span> <span class=\"nf\">getFixtures</span><span class=\"p\">()</span><span class=\"o\">:</span> <span class=\"k\">array</span>\r\n<span class=\"p\">{</span>\r\n    <span class=\"k\">return</span> <span class=\"p\">[</span>\r\n        <span class=\"s1\">\'app.Articles\'</span><span class=\"p\">,</span>\r\n        <span class=\"s1\">\'app.Comments\'</span><span class=\"p\">,</span>\r\n    <span class=\"p\">];</span>\r\n<span class=\"p\">}</span>\r\n</pre>\r\n</div>\r\n</div>\r\n<p>The above will load the Article and Comment fixtures from the application&rsquo;s Fixture directory. You can also load fixtures from CakePHP core, or plugins:</p>\r\n<div class=\"highlight-phpinline notranslate\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"k\">class</span> <span class=\"nc\">ArticlesTest</span> <span class=\"k\">extends</span> <span class=\"nx\">TestCase</span>\r\n<span class=\"p\">{</span>\r\n    <span class=\"k\">protected</span> <span class=\"nv\">$fixtures</span> <span class=\"o\">=</span> <span class=\"p\">[</span>\r\n        <span class=\"s1\">\'plugin.DebugKit.Articles\'</span><span class=\"p\">,</span>\r\n        <span class=\"s1\">\'plugin.MyVendorName/MyPlugin.Messages\'</span><span class=\"p\">,</span>\r\n        <span class=\"s1\">\'core.Comments\'</span>\r\n    <span class=\"p\">];</span>\r\n<span class=\"p\">}</span>\r\n</pre>\r\n</div>\r\n</div>\r\n<p>Using the&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">core</span></code>&nbsp;prefix will load fixtures from CakePHP, and using a plugin name as the prefix, will load the fixture from the named plugin.</p>\r\n<p>You can load fixtures in subdirectories. Using multiple directories can make it easier to organize your fixtures if you have a larger application. To load fixtures in subdirectories, simply include the subdirectory name in the fixture name:</p>\r\n<div class=\"highlight-phpinline notranslate\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"k\">class</span> <span class=\"nc\">ArticlesTest</span> <span class=\"k\">extends</span> <span class=\"nx\">CakeTestCase</span>\r\n<span class=\"p\">{</span>\r\n    <span class=\"k\">protected</span> <span class=\"nv\">$fixtures</span> <span class=\"o\">=</span> <span class=\"p\">[</span><span class=\"s1\">\'app.Blog/Articles\'</span><span class=\"p\">,</span> <span class=\"s1\">\'app.Blog/Comments\'</span><span class=\"p\">];</span>\r\n<span class=\"p\">}</span>\r\n</pre>\r\n</div>\r\n</div>\r\n<p>In the above example, both fixtures would be loaded from&nbsp;<code class=\"docutils literal notranslate\"><span class=\"pre\">tests/Fixture/Blog/</span></code>.</p>', NULL, NULL, NULL, 'post', 1, '2022-08-23 00:14:48', '2022-08-23 00:14:48'),
(13, '1', 'Discus with moyad122', '<p>This is the post for</p>\r\n<p>Discus with moyad</p>', NULL, NULL, 'Discus with moyad_1661521485.jpg', 'post', 1, '2022-08-26 08:14:45', '2022-08-26 08:15:11'),
(14, '1', 'The mind behind Linux', NULL, NULL, 'fu-post-videos/eySkvzpewSGMrAW0x4Yq2GUOp0xZke4A2jiGQEsb.mp4', NULL, 'video_post', 1, '2022-09-06 05:28:59', '2022-09-06 08:21:29'),
(16, '1', 'Happy Engineers Day All Future Er.', '<p>This post is for wishes to all engineers who deserve it.</p>', NULL, NULL, 'Happy Engineers Day All Future Er._1663232694.png', 'post', 1, '2022-09-15 03:30:20', '2022-09-15 03:34:54'),
(17, '1', 'Information Technology: the first 2,500 years', '<p>Information technology is not a new idea. From the use of clay tablets, to papyrus and paper, information technology has existed for millennia. The technologies of ancient civilizations help us to understand the advancements currently being made.</p>\r\n<p>Christopher Blackwell is the Louis G. Forgione University Professor of Classics at Furman University. He has published books and articles on Greek history, ancient manuscripts, and data science. He co-authored articles on historical botany with his wife, Amy Hackney Blackwell, as well as the book \"Mythology for Dummies\", which has been translated into Spanish, German, Dutch, French, and Russian.</p>', 'https://www.youtube.com/embed/V1qHNrQQHZI', NULL, NULL, 'video_post', 1, '2022-09-15 23:36:51', '2022-09-16 00:16:18'),
(18, '1', 'What your casual online behavior reveals to hackers (and what to do about it)', '<p>It seems these days, everybody&rsquo;s getting hacked.</p>\r\n<p>With so much of our most sensitive information stored on servers in some remote part of the world, it seems concerningly easy for malicious hackers to worm their way past secure firewalls and into bank accounts, credit card databases, corporate emails and even&nbsp;<a href=\"https://www.wired.com/story/2017-biggest-hacks-so-far/\">hospital systems</a>.</p>\r\n<p>On a global average, these hacks cost companies about $3.6 million, according to&nbsp;<a href=\"https://www.ibm.com/security/data-breach/\">IBM&rsquo;s annual Cost of Data Breach Study</a>&nbsp;with 2016 being a record-breaking year for&nbsp;<a href=\"https://www.bloomberg.com/news/articles/2017-01-19/data-breaches-hit-record-in-2016-as-dnc-wendy-s-co-hacked\">data breaches in the United States</a>&nbsp;alone &mdash; which is shocking, seeing as&nbsp;<a href=\"https://www.scmagazine.com/more-than-half-of-corporate-breaches-go-unreported-according-to-study/article/542758/\">many breaches still go unreported</a>.</p>', NULL, NULL, 'What your casual online behavior reveals to hackers (and what to do about it)_1663307080.webp', 'post', 1, '2022-09-16 00:14:40', '2022-09-16 00:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `posts_comments`
--

CREATE TABLE `posts_comments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts_comments`
--

INSERT INTO `posts_comments` (`id`, `user_id`, `post_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, '1', '14', 'Awesome work, can you..', '2022-09-12 08:22:47', '2022-09-12 08:22:47'),
(2, '1', '13', 'Hi! I need more information..', '2022-09-12 08:25:07', '2022-09-12 08:25:07'),
(3, '7', '12', 'Numquam recusandae iste modi quibusdam molestiae', '2022-09-12 23:41:24', '2022-09-12 23:41:24'),
(4, '1', '14', 'sit amet consectetur adipisicing elit', '2022-09-13 03:39:57', '2022-09-13 03:39:57'),
(5, '7', '14', 'odit sapiente assumenda aut alias aliquid ipsa', '2022-09-13 03:41:35', '2022-09-13 03:41:35'),
(6, '7', '14', 'Sapiente odit', '2022-09-13 03:44:00', '2022-09-13 03:44:00'),
(7, '7', '9', 'This operation can become expensive as your application grows.', '2022-09-13 06:14:46', '2022-09-13 06:14:46'),
(8, '7', '12', 'My Test', '2022-09-14 03:53:25', '2022-09-14 03:53:25'),
(9, '7', '16', 'Sapiente odit', '2022-09-15 07:16:20', '2022-09-15 07:16:20'),
(10, '7', '16', 'Testing comment', '2022-09-15 07:21:48', '2022-09-15 07:21:48'),
(11, '7', '16', 'This operation can become expensive as your application grows.', '2022-09-15 07:23:46', '2022-09-15 07:23:46'),
(12, '7', '14', 'My testing comment', '2022-09-15 07:25:32', '2022-09-15 07:25:32'),
(13, '7', '13', 'Hi! I need more information..', '2022-09-15 07:27:12', '2022-09-15 07:27:12'),
(14, '7', '13', 'My Testing Comment', '2022-09-15 07:27:34', '2022-09-15 07:27:34'),
(15, '7', '18', 'My testing Comment', '2022-09-16 08:34:12', '2022-09-16 08:34:12'),
(16, '7', '17', 'hey there', '2022-09-19 00:13:58', '2022-09-19 00:13:58'),
(17, '7', '17', 'hey there', '2022-09-19 00:14:01', '2022-09-19 00:14:01'),
(18, '9', '18', 'Awesome post for we....\r\nThanks', '2022-09-21 06:37:32', '2022-09-21 06:37:32'),
(19, '9', '17', 'Yes, I\'m here\r\ndo you need any help from me?', '2022-09-21 06:38:11', '2022-09-21 06:38:11'),
(20, '7', '18', 'This operation can become expensive as your application grows.', '2022-09-21 07:12:18', '2022-09-21 07:12:18'),
(21, '7', '18', 'hry', '2022-09-22 05:57:21', '2022-09-22 05:57:21'),
(22, '7', '16', 'hh', '2022-09-23 07:31:36', '2022-09-23 07:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topic_id` bigint DEFAULT NULL,
  `que_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `que_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'single',
  `opt_img` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `topic_id`, `que_img`, `que_type`, `opt_img`, `created_at`, `updated_at`) VALUES
(1, 'Test Ques', 4, NULL, 'single', 0, '2022-07-07 07:24:03', '2022-07-12 06:39:08'),
(6, 'My Question', 1, NULL, 'multiple', 0, '2022-07-13 06:53:37', '2022-07-13 06:54:28'),
(10, 'Testing newest', 3, NULL, 'single', 0, '2022-07-14 07:38:18', '2022-07-21 04:53:13'),
(11, 'What you learn ?', 4, NULL, 'single', 0, '2022-07-21 04:28:26', '2022-07-21 04:52:31'),
(12, 'Capital of India?', 3, NULL, 'single', 0, '2022-07-25 06:51:38', '2022-07-25 06:51:38'),
(14, 'The Central Rice Research Station is situated in?', 6, NULL, 'single', 0, '2022-07-25 07:13:42', '2022-07-25 07:13:42'),
(15, 'Who among the following wrote Sanskrit grammar?', 6, NULL, 'single', 0, '2022-07-25 07:14:47', '2022-07-25 07:14:47'),
(16, 'Which among the following headstreams meets the Ganges in last?', 6, NULL, 'single', 0, '2022-07-25 07:15:32', '2022-07-25 07:15:32'),
(17, 'The metal whose salts are sensitive to light is?', 6, NULL, 'single', 0, '2022-07-25 07:16:24', '2022-07-25 07:16:24'),
(18, 'Question 1', 7, NULL, 'single', 0, '2022-07-25 07:32:59', '2022-07-25 07:34:10'),
(19, 'Question 2', 7, NULL, 'multiple', 0, '2022-07-25 07:34:44', '2022-07-25 07:34:44'),
(20, 'How to check variable is array or not?', 7, NULL, 'single', 0, '2022-07-29 07:14:53', '2022-07-29 07:14:53'),
(21, 'Select string function______________________', 7, NULL, 'multiple', 1, '2022-07-31 22:22:29', '2022-08-03 07:44:12'),
(22, '<p>Testing pgpvf</p>', 7, NULL, 'single', 1, '2022-08-01 03:31:31', '2022-09-20 04:13:09'),
(23, 'Que and opt with imgs', 7, 'que_1659501748.png', 'single', 1, '2022-08-02 23:12:28', '2022-08-03 02:52:20'),
(24, 'Que and opt without imgs', 7, NULL, 'single', 1, '2022-08-02 23:22:40', '2022-08-03 07:28:39'),
(25, 'New que with image', 7, 'que_1659517774.png', 'multiple', 1, '2022-08-03 03:39:34', '2022-08-03 07:20:57'),
(26, 'Which of the following function is used to check a variable contains an integer number?', 7, NULL, 'multiple', 1, '2022-08-03 06:59:39', '2022-08-03 06:59:39'),
(27, 'Which of the following function is not available in PHP?', 7, NULL, 'single', 0, '2022-08-03 07:45:51', '2022-08-03 07:47:15'),
(28, 'My Question 2', 1, NULL, 'single', 0, '2022-08-04 05:56:23', '2022-08-04 05:56:23'),
(29, 'This is test question with image', 1, 'que_1659706857.jpg', 'single', 1, '2022-08-05 08:10:57', '2022-08-05 08:10:57'),
(30, 'My New question with answer', 7, NULL, 'multiple', 0, '2022-08-18 01:44:12', '2022-08-18 01:50:28'),
(31, 'What is your city?', 8, NULL, 'multiple', 1, '2022-08-26 08:31:20', '2022-08-26 08:32:28'),
(32, 'Where are you from?', 8, NULL, 'single', 0, '2022-08-26 08:33:46', '2022-08-26 08:33:46'),
(35, '<p>Testing question</p>', 8, NULL, 'multiple', 1, '2022-08-28 23:04:29', '2022-09-21 23:06:31'),
(36, '<p>Which of the following is true about php variables?</p>', 7, 'que_1663744939.png', 'single', 0, '2022-08-28 23:15:07', '2022-09-21 01:52:19'),
(37, '<p>What is array??</p>\r\n<ol>\r\n<li style=\"text-align: left;\">hello</li>\r\n</ol>', 4, NULL, 'single', 1, '2022-09-21 02:53:11', '2022-09-22 03:38:27'),
(38, '<p>What does PHP stand for?</p>', 9, NULL, 'single', 0, '2022-09-22 03:48:29', '2022-09-22 03:48:29'),
(39, '<p>test data</p>', 9, NULL, 'multiple', 1, '2022-09-22 04:13:30', '2022-09-22 22:38:48'),
(40, '<p><em><strong>What is class in css</strong></em></p>', 9, NULL, 'single', 1, '2022-09-22 23:49:27', '2022-09-23 00:06:42'),
(41, '<p>my question for option validation</p>', 9, NULL, 'single', 0, '2022-09-23 03:06:01', '2022-09-23 03:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-06-21 07:21:18', '2022-06-21 07:21:18'),
(2, 'User', 'web', '2022-07-26 06:09:30', '2022-07-26 06:09:30'),
(3, 'Basic Package User', 'web', '2022-07-27 00:52:49', '2022-07-27 00:52:49'),
(4, 'Master Package User', 'web', '2022-07-27 00:53:24', '2022-07-27 00:53:24'),
(5, 'Standard Package User', 'web', '2022-07-27 00:53:39', '2022-07-27 00:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(7, 1),
(8, 1),
(7, 3),
(8, 3),
(7, 4),
(8, 4),
(7, 5),
(8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint UNSIGNED NOT NULL,
  `topic_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration_measure` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` double(8,2) DEFAULT NULL,
  `passing_grade` double(8,2) DEFAULT NULL,
  `re_take_cut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topic_subscription` int DEFAULT NULL COMMENT '1 = Master and 2 = Standard and 3 = Basic',
  `course_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `topic_name`, `duration_measure`, `duration`, `passing_grade`, `re_take_cut`, `topic_subscription`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'Test1', 'minutes', 1.00, 50.00, NULL, 3, NULL, '2022-07-05 03:51:03', '2022-08-05 04:50:37'),
(3, 'Raindrops Topic', 'minutes', 10.00, 100.00, NULL, NULL, NULL, '2022-07-06 03:57:26', '2022-07-18 03:26:44'),
(4, 'Test New Topic', 'minutes', 1.00, 100.00, NULL, 1, NULL, '2022-07-06 04:02:06', '2022-07-26 05:40:33'),
(5, 'Test111', 'minutes', 30.00, 50.00, NULL, 2, NULL, '2022-07-06 04:04:59', '2022-07-26 04:47:24'),
(6, 'GK', 'minutes', 30.00, 100.00, '2', 3, NULL, '2022-07-25 07:06:35', '2022-07-26 04:47:19'),
(7, 'PHP', 'minutes', 30.00, 100.00, '2', 3, NULL, '2022-07-25 07:31:56', '2022-07-29 07:43:22'),
(8, 'Moyad Discus Topic', 'minutes', 10.00, NULL, NULL, 3, NULL, '2022-08-26 08:28:45', '2022-08-26 08:28:45'),
(9, 'Testing with design1', 'minutes', 30.00, 30.00, NULL, 3, 16, '2022-09-19 04:58:55', '2022-09-23 08:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_nicename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `portfolio_website_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_nicename`, `display_name`, `email`, `email_verified_at`, `password`, `location`, `details`, `portfolio_website_url`, `remember_token`, `profile_img`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, NULL, 'super_admin@gmail.com', NULL, '$2y$10$ng4bkfbU5YG29PNwpp.mX.t4EGQQZIPXyMnBV6Qm/laEP08xmGB1W', '', '', NULL, 'VnCtwCwagd4dOGsq4JQt7woDrWkVMHX16mKsFGxjTiTtQWjaI259ORKr0GNZ', 'Super_Admin_1661345917.jpg', '2022-06-21 07:21:18', '2022-08-24 07:56:15'),
(3, '1Test', NULL, NULL, 'jethvabhavesh007@gmail.com', NULL, '$2y$10$OlVJzoYhD5q1iZZ8PkHpGe1wSiCT7nnHaUhQw6RWGP0YjZ8EIDHe6', '', '', NULL, NULL, NULL, '2022-07-11 02:03:06', '2022-09-19 00:50:57'),
(4, 'Testing New1', NULL, NULL, 'testing1111@mail.com', NULL, '$2y$10$00I9kyj2XyKuYD1uf9SdP.FgEWedvI5B6.j121Hv1o6yxndeTiqBC', '', '', NULL, NULL, NULL, '2022-07-26 06:46:24', '2022-07-26 06:46:24'),
(5, 'User', NULL, NULL, 'user123@mail.com', NULL, '$2y$10$.NFJIYJmxKO12Bcs8hwYF.H8lCaJsPEDYrYHJlfl6Hair0DF1c982', '', '', NULL, NULL, NULL, '2022-07-26 06:58:15', '2022-07-26 06:58:15'),
(7, 'Signal user', NULL, NULL, 'signal.user@mail.com', NULL, '$2y$10$bnzy0CWH4yZaM/MarVkoteosXAErMY84Z/.Lohf9Nz4DvAfE4A.ry', 'India,State of Gujarat,Ahmadabad', 'hello, i\'m singal user \r\nmy subscription package is Basic Package User', 'https://fuacademy.io/', NULL, 'Signal_user_1661405189.jpg', '2022-07-27 04:30:55', '2022-09-12 06:50:46'),
(8, 'Master user', NULL, NULL, 'master_user@mail.com', NULL, '$2y$10$L.MysvHhxGT4W9ohNLBtM.eROmIMSvRn5bUxQ2taNRID/dK208JMC', '', '', NULL, NULL, NULL, '2022-07-28 23:54:16', '2022-07-28 23:54:16'),
(9, 'Standard user', NULL, NULL, 'standard_user@mail.com', NULL, '$2y$10$NIy2XSVZWR/QRFw3tFJlk.wdMGzALnvq4DlFMFw4WUADo7uimtcz2', '', '', NULL, NULL, NULL, '2022-07-28 23:55:34', '2022-07-28 23:55:34'),
(10, 'TestBasic', NULL, NULL, 'test_basic@mail.com', NULL, '$2y$10$rX0Q.h/Wnkig3k9s9G6B1ey6oLo8MQtHbiZyGDFR0FhcNKhFEzFEq', '', '', NULL, NULL, NULL, '2022-08-18 01:13:54', '2022-08-18 01:13:54'),
(11, 'test data', NULL, NULL, 'testdata@gmail.com', NULL, '$2y$10$K8Ov8JQvFA7h88kuYE7A2.ZgI6Emlbf7j9AZ3LTOpNGF6gO/OouHS', 'India,State of Gujarat,Ahmadabad', 'test data testing', 'https://fuacademy.io/', NULL, 'test_data_1663918076.jpg', '2022-09-19 07:02:08', '2022-09-23 01:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `users_courses`
--

CREATE TABLE `users_courses` (
  `id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `expired_on` datetime DEFAULT NULL,
  `is_expired` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_results`
--

CREATE TABLE `user_results` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `topic_id` bigint UNSIGNED NOT NULL,
  `que_id` bigint UNSIGNED NOT NULL,
  `opt_id` bigint UNSIGNED NOT NULL,
  `submitted_at` time NOT NULL,
  `is_attempts` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_results`
--

INSERT INTO `user_results` (`id`, `user_id`, `topic_id`, `que_id`, `opt_id`, `submitted_at`, `is_attempts`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 10, 44, '00:09:55', 1, '2022-08-08 01:09:32', '2022-08-08 01:09:32'),
(2, 1, 3, 12, 47, '00:09:55', 1, '2022-08-08 01:09:32', '2022-08-08 01:09:32'),
(3, 1, 3, 10, 42, '00:09:57', 2, '2022-08-08 01:09:43', '2022-08-08 01:09:43'),
(4, 1, 3, 12, 47, '00:09:57', 2, '2022-08-08 01:09:43', '2022-08-08 01:09:43'),
(5, 1, 3, 10, 43, '00:09:54', 3, '2022-08-08 01:09:55', '2022-08-08 01:09:55'),
(6, 1, 3, 12, 48, '00:09:54', 3, '2022-08-08 01:09:55', '2022-08-08 01:09:55'),
(7, 1, 3, 10, 41, '00:09:55', 4, '2022-08-08 01:10:05', '2022-08-08 01:10:05'),
(8, 1, 3, 12, 47, '00:09:55', 4, '2022-08-08 01:10:05', '2022-08-08 01:10:05'),
(9, 1, 1, 6, 26, '00:00:52', 1, '2022-08-08 01:10:21', '2022-08-08 01:10:21'),
(10, 1, 1, 6, 28, '00:00:52', 1, '2022-08-08 01:10:21', '2022-08-08 01:10:21'),
(11, 1, 1, 28, 135, '00:00:52', 1, '2022-08-08 01:10:21', '2022-08-08 01:10:21'),
(12, 1, 1, 29, 140, '00:00:52', 1, '2022-08-08 01:10:21', '2022-08-08 01:10:21'),
(13, 1, 1, 6, 27, '00:00:53', 2, '2022-08-08 01:13:32', '2022-08-08 01:13:32'),
(14, 1, 1, 6, 28, '00:00:53', 2, '2022-08-08 01:13:32', '2022-08-08 01:13:32'),
(15, 1, 1, 28, 136, '00:00:53', 2, '2022-08-08 01:13:32', '2022-08-08 01:13:32'),
(16, 1, 1, 29, 137, '00:00:53', 2, '2022-08-08 01:13:32', '2022-08-08 01:13:32'),
(17, 1, 1, 6, 26, '00:00:52', 3, '2022-08-08 01:13:49', '2022-08-08 01:13:49'),
(18, 1, 1, 6, 28, '00:00:52', 3, '2022-08-08 01:13:49', '2022-08-08 01:13:49'),
(19, 1, 1, 28, 136, '00:00:52', 3, '2022-08-08 01:13:49', '2022-08-08 01:13:49'),
(20, 1, 1, 29, 137, '00:00:52', 3, '2022-08-08 01:13:49', '2022-08-08 01:13:49'),
(21, 1, 1, 6, 25, '00:00:52', 4, '2022-08-08 01:14:03', '2022-08-08 01:14:03'),
(22, 1, 1, 6, 27, '00:00:52', 4, '2022-08-08 01:14:03', '2022-08-08 01:14:03'),
(23, 1, 1, 28, 136, '00:00:52', 4, '2022-08-08 01:14:03', '2022-08-08 01:14:03'),
(24, 1, 1, 29, 137, '00:00:52', 4, '2022-08-08 01:14:03', '2022-08-08 01:14:03'),
(25, 1, 1, 6, 26, '00:00:51', 5, '2022-08-15 01:30:23', '2022-08-15 01:30:23'),
(26, 1, 1, 6, 27, '00:00:51', 5, '2022-08-15 01:30:23', '2022-08-15 01:30:23'),
(27, 1, 1, 28, 136, '00:00:51', 5, '2022-08-15 01:30:23', '2022-08-15 01:30:23'),
(28, 1, 1, 29, 140, '00:00:51', 5, '2022-08-15 01:30:23', '2022-08-15 01:30:23'),
(29, 7, 6, 13, 52, '00:29:52', 1, '2022-08-16 07:53:02', '2022-08-16 07:53:02'),
(30, 7, 6, 14, 54, '00:29:52', 1, '2022-08-16 07:53:02', '2022-08-16 07:53:02'),
(31, 7, 6, 15, 58, '00:29:52', 1, '2022-08-16 07:53:02', '2022-08-16 07:53:02'),
(32, 7, 6, 16, 63, '00:29:52', 1, '2022-08-16 07:53:02', '2022-08-16 07:53:02'),
(33, 7, 6, 17, 66, '00:29:52', 1, '2022-08-16 07:53:02', '2022-08-16 07:53:02'),
(34, 7, 8, 31, 146, '00:09:49', 1, '2022-08-26 08:42:14', '2022-08-26 08:42:14'),
(35, 7, 8, 31, 147, '00:09:49', 1, '2022-08-26 08:42:14', '2022-08-26 08:42:14'),
(36, 7, 8, 32, 149, '00:09:49', 1, '2022-08-26 08:42:14', '2022-08-26 08:42:14'),
(37, 7, 6, 13, 49, '00:29:49', 2, '2022-08-26 08:42:42', '2022-08-26 08:42:42'),
(38, 7, 6, 14, 54, '00:29:49', 2, '2022-08-26 08:42:42', '2022-08-26 08:42:42'),
(39, 7, 6, 15, 59, '00:29:49', 2, '2022-08-26 08:42:42', '2022-08-26 08:42:42'),
(40, 7, 6, 16, 62, '00:29:49', 2, '2022-08-26 08:42:42', '2022-08-26 08:42:42'),
(41, 7, 6, 17, 67, '00:29:49', 2, '2022-08-26 08:42:42', '2022-08-26 08:42:42'),
(42, 7, 1, 6, 25, '00:00:50', 1, '2022-08-29 00:54:26', '2022-08-29 00:54:26'),
(43, 7, 1, 6, 28, '00:00:50', 1, '2022-08-29 00:54:26', '2022-08-29 00:54:26'),
(44, 7, 1, 28, 134, '00:00:50', 1, '2022-08-29 00:54:26', '2022-08-29 00:54:26'),
(45, 7, 1, 29, 140, '00:00:50', 1, '2022-08-29 00:54:26', '2022-08-29 00:54:26'),
(46, 7, 1, 6, 26, '00:00:51', 2, '2022-08-29 05:36:29', '2022-08-29 05:36:29'),
(47, 7, 1, 6, 28, '00:00:51', 2, '2022-08-29 05:36:29', '2022-08-29 05:36:29'),
(48, 7, 1, 28, 135, '00:00:51', 2, '2022-08-29 05:36:29', '2022-08-29 05:36:29'),
(49, 7, 1, 29, 139, '00:00:51', 2, '2022-08-29 05:36:29', '2022-08-29 05:36:29'),
(50, 7, 1, 6, 27, '00:00:48', 3, '2022-08-29 06:35:38', '2022-08-29 06:35:38'),
(51, 7, 1, 28, 136, '00:00:48', 3, '2022-08-29 06:35:38', '2022-08-29 06:35:38'),
(52, 7, 1, 29, 140, '00:00:48', 3, '2022-08-29 06:35:38', '2022-08-29 06:35:38'),
(53, 7, 1, 6, 27, '00:00:57', 4, '2022-08-29 08:44:58', '2022-08-29 08:44:58'),
(54, 7, 1, 6, 28, '00:00:57', 4, '2022-08-29 08:44:58', '2022-08-29 08:44:58'),
(55, 7, 1, 28, 136, '00:00:57', 4, '2022-08-29 08:44:58', '2022-08-29 08:44:58'),
(56, 7, 1, 29, 140, '00:00:57', 4, '2022-08-29 08:44:58', '2022-08-29 08:44:58'),
(57, 7, 1, 6, 27, '00:00:22', 5, '2022-08-30 00:41:45', '2022-08-30 00:41:45'),
(58, 7, 1, 6, 28, '00:00:22', 5, '2022-08-30 00:41:45', '2022-08-30 00:41:45'),
(59, 7, 1, 28, 136, '00:00:22', 5, '2022-08-30 00:41:45', '2022-08-30 00:41:45'),
(60, 7, 1, 29, 138, '00:00:22', 5, '2022-08-30 00:41:45', '2022-08-30 00:41:45'),
(61, 7, 1, 6, 26, '00:00:01', 6, '2022-08-30 00:42:54', '2022-08-30 00:42:54'),
(62, 7, 1, 6, 28, '00:00:01', 6, '2022-08-30 00:42:54', '2022-08-30 00:42:54'),
(63, 7, 1, 28, 133, '00:00:01', 6, '2022-08-30 00:42:54', '2022-08-30 00:42:54'),
(64, 7, 1, 29, 137, '00:00:01', 6, '2022-08-30 00:42:54', '2022-08-30 00:42:54'),
(65, 7, 1, 6, 26, '00:00:01', 7, '2022-08-30 00:42:54', '2022-08-30 00:42:54'),
(66, 7, 1, 6, 28, '00:00:01', 7, '2022-08-30 00:42:54', '2022-08-30 00:42:54'),
(67, 7, 1, 28, 133, '00:00:01', 7, '2022-08-30 00:42:54', '2022-08-30 00:42:54'),
(68, 7, 1, 29, 137, '00:00:01', 7, '2022-08-30 00:42:54', '2022-08-30 00:42:54'),
(69, 7, 1, 6, 26, '00:00:37', 8, '2022-08-30 03:13:42', '2022-08-30 03:13:42'),
(70, 7, 1, 6, 28, '00:00:37', 8, '2022-08-30 03:13:42', '2022-08-30 03:13:42'),
(71, 7, 1, 28, 133, '00:00:37', 8, '2022-08-30 03:13:42', '2022-08-30 03:13:42'),
(72, 7, 1, 29, 138, '00:00:37', 8, '2022-08-30 03:13:42', '2022-08-30 03:13:42'),
(73, 7, 1, 6, 27, '00:00:49', 9, '2022-08-30 03:16:59', '2022-08-30 03:16:59'),
(74, 7, 1, 6, 28, '00:00:49', 9, '2022-08-30 03:16:59', '2022-08-30 03:16:59'),
(75, 7, 1, 28, 136, '00:00:49', 9, '2022-08-30 03:16:59', '2022-08-30 03:16:59'),
(76, 7, 1, 29, 138, '00:00:49', 9, '2022-08-30 03:16:59', '2022-08-30 03:16:59'),
(77, 7, 1, 6, 26, '00:00:50', 10, '2022-08-30 05:30:44', '2022-08-30 05:30:44'),
(78, 7, 1, 6, 28, '00:00:50', 10, '2022-08-30 05:30:44', '2022-08-30 05:30:44'),
(79, 7, 1, 28, 133, '00:00:50', 10, '2022-08-30 05:30:44', '2022-08-30 05:30:44'),
(80, 7, 1, 29, 140, '00:00:50', 10, '2022-08-30 05:30:44', '2022-08-30 05:30:44'),
(81, 7, 1, 6, 28, '00:01:00', 11, '2022-08-30 06:22:58', '2022-08-30 06:22:58'),
(82, 7, 1, 28, 136, '00:01:00', 11, '2022-08-30 06:22:58', '2022-08-30 06:22:58'),
(83, 7, 1, 29, 138, '00:01:00', 11, '2022-08-30 06:22:58', '2022-08-30 06:22:58'),
(84, 7, 1, 6, 26, '00:01:00', 12, '2022-08-30 06:23:24', '2022-08-30 06:23:24'),
(85, 7, 1, 6, 28, '00:01:00', 12, '2022-08-30 06:23:24', '2022-08-30 06:23:24'),
(86, 7, 1, 28, 136, '00:01:00', 12, '2022-08-30 06:23:24', '2022-08-30 06:23:24'),
(87, 7, 1, 29, 140, '00:01:00', 12, '2022-08-30 06:23:24', '2022-08-30 06:23:24'),
(88, 7, 1, 6, 26, '00:01:00', 13, '2022-08-30 06:25:00', '2022-08-30 06:25:00'),
(89, 7, 1, 6, 28, '00:01:00', 13, '2022-08-30 06:25:00', '2022-08-30 06:25:00'),
(90, 7, 1, 28, 135, '00:01:00', 13, '2022-08-30 06:25:00', '2022-08-30 06:25:00'),
(91, 7, 1, 29, 140, '00:01:00', 13, '2022-08-30 06:25:00', '2022-08-30 06:25:00'),
(92, 7, 1, 6, 26, '00:01:00', 14, '2022-09-12 23:40:28', '2022-09-12 23:40:28'),
(93, 7, 1, 6, 28, '00:01:00', 14, '2022-09-12 23:40:28', '2022-09-12 23:40:28'),
(94, 7, 1, 28, 134, '00:01:00', 14, '2022-09-12 23:40:28', '2022-09-12 23:40:28'),
(95, 7, 1, 29, 140, '00:01:00', 14, '2022-09-12 23:40:28', '2022-09-12 23:40:28'),
(96, 7, 1, 6, 26, '13:09:40', 15, '2022-09-21 07:39:40', '2022-09-21 07:39:40'),
(97, 7, 1, 6, 28, '13:09:40', 15, '2022-09-21 07:39:44', '2022-09-21 07:39:44'),
(98, 7, 1, 28, 136, '13:09:40', 15, '2022-09-21 07:39:46', '2022-09-21 07:39:46'),
(99, 7, 1, 29, 140, '13:09:40', 15, '2022-09-21 07:39:46', '2022-09-21 07:39:46'),
(100, 7, 1, 6, 26, '13:12:55', 16, '2022-09-21 07:42:57', '2022-09-21 07:42:57'),
(101, 7, 1, 6, 28, '13:12:55', 16, '2022-09-21 07:43:03', '2022-09-21 07:43:03'),
(102, 7, 1, 28, 136, '13:12:55', 16, '2022-09-21 07:43:03', '2022-09-21 07:43:03'),
(103, 7, 1, 29, 137, '13:12:55', 16, '2022-09-21 07:43:03', '2022-09-21 07:43:03'),
(104, 7, 1, 6, 26, '13:14:32', 17, '2022-09-21 07:44:32', '2022-09-21 07:44:32'),
(105, 7, 1, 6, 28, '13:14:32', 17, '2022-09-21 07:44:34', '2022-09-21 07:44:34'),
(106, 7, 1, 28, 136, '13:14:32', 17, '2022-09-21 07:44:34', '2022-09-21 07:44:34'),
(107, 7, 1, 29, 140, '13:14:32', 17, '2022-09-21 07:44:34', '2022-09-21 07:44:34'),
(108, 7, 1, 6, 28, '05:11:55', 18, '2022-09-21 23:41:55', '2022-09-21 23:41:55'),
(109, 7, 1, 28, 136, '05:11:55', 18, '2022-09-21 23:41:55', '2022-09-21 23:41:55'),
(110, 7, 1, 29, 140, '05:11:55', 18, '2022-09-21 23:41:55', '2022-09-21 23:41:55'),
(111, 7, 1, 6, 26, '05:21:53', 19, '2022-09-21 23:51:53', '2022-09-21 23:51:53'),
(112, 7, 1, 6, 28, '05:21:53', 19, '2022-09-21 23:51:53', '2022-09-21 23:51:53'),
(113, 7, 1, 28, 135, '05:21:53', 19, '2022-09-21 23:51:53', '2022-09-21 23:51:53'),
(114, 7, 1, 29, 140, '05:21:53', 19, '2022-09-21 23:51:53', '2022-09-21 23:51:53'),
(115, 7, 1, 6, 26, '05:25:15', 20, '2022-09-21 23:55:15', '2022-09-21 23:55:15'),
(116, 7, 1, 6, 27, '05:25:15', 20, '2022-09-21 23:55:15', '2022-09-21 23:55:15'),
(117, 7, 1, 28, 136, '05:25:15', 20, '2022-09-21 23:55:15', '2022-09-21 23:55:15'),
(118, 7, 1, 29, 140, '05:25:15', 20, '2022-09-21 23:55:15', '2022-09-21 23:55:15'),
(119, 7, 1, 6, 27, '05:34:43', 21, '2022-09-22 00:04:43', '2022-09-22 00:04:43'),
(120, 7, 1, 6, 28, '05:34:43', 21, '2022-09-22 00:04:43', '2022-09-22 00:04:43'),
(121, 7, 1, 28, 136, '05:34:43', 21, '2022-09-22 00:04:43', '2022-09-22 00:04:43'),
(122, 7, 1, 29, 140, '05:34:43', 21, '2022-09-22 00:04:43', '2022-09-22 00:04:43'),
(123, 7, 1, 6, 27, '05:35:50', 22, '2022-09-22 00:05:50', '2022-09-22 00:05:50'),
(124, 7, 1, 6, 28, '05:35:50', 22, '2022-09-22 00:05:50', '2022-09-22 00:05:50'),
(125, 7, 1, 28, 136, '05:35:50', 22, '2022-09-22 00:05:50', '2022-09-22 00:05:50'),
(126, 7, 1, 29, 140, '05:35:50', 22, '2022-09-22 00:05:50', '2022-09-22 00:05:50'),
(127, 7, 1, 6, 25, '00:25:00', 23, '2022-09-22 00:47:28', '2022-09-22 00:47:28'),
(128, 7, 1, 6, 26, '00:25:00', 23, '2022-09-22 00:47:28', '2022-09-22 00:47:28'),
(129, 7, 1, 28, 135, '00:25:00', 23, '2022-09-22 00:47:29', '2022-09-22 00:47:29'),
(130, 7, 1, 29, 138, '00:25:00', 23, '2022-09-22 00:47:30', '2022-09-22 00:47:30'),
(131, 7, 1, 6, 25, '00:48:00', 24, '2022-09-22 00:48:53', '2022-09-22 00:48:53'),
(132, 7, 1, 6, 26, '00:48:00', 24, '2022-09-22 00:48:53', '2022-09-22 00:48:53'),
(133, 7, 1, 29, 139, '00:48:00', 24, '2022-09-22 00:48:53', '2022-09-22 00:48:53'),
(134, 7, 1, 6, 26, '06:20:04', 25, '2022-09-22 00:50:04', '2022-09-22 00:50:04'),
(135, 7, 1, 6, 27, '06:20:04', 25, '2022-09-22 00:50:04', '2022-09-22 00:50:04'),
(136, 7, 1, 28, 133, '06:20:04', 25, '2022-09-22 00:50:04', '2022-09-22 00:50:04'),
(137, 7, 1, 29, 139, '06:20:04', 25, '2022-09-22 00:50:04', '2022-09-22 00:50:04'),
(138, 7, 1, 6, 26, '00:02:00', 26, '2022-09-22 01:02:36', '2022-09-22 01:02:36'),
(139, 7, 1, 6, 26, '00:08:00', 27, '2022-09-22 01:41:30', '2022-09-22 01:41:30'),
(140, 7, 1, 6, 27, '00:08:00', 27, '2022-09-22 01:41:30', '2022-09-22 01:41:30'),
(141, 7, 1, 28, 134, '00:08:00', 27, '2022-09-22 01:41:30', '2022-09-22 01:41:30'),
(142, 7, 1, 29, 140, '00:08:00', 27, '2022-09-22 01:41:30', '2022-09-22 01:41:30'),
(143, 7, 1, 6, 25, '00:52:00', 28, '2022-09-22 01:42:30', '2022-09-22 01:42:30'),
(144, 7, 1, 6, 27, '00:52:00', 28, '2022-09-22 01:42:30', '2022-09-22 01:42:30'),
(145, 7, 1, 28, 134, '00:52:00', 28, '2022-09-22 01:42:30', '2022-09-22 01:42:30'),
(146, 7, 1, 29, 140, '00:52:00', 28, '2022-09-22 01:42:30', '2022-09-22 01:42:30'),
(147, 7, 1, 6, 26, '00:55:00', 29, '2022-09-22 07:12:24', '2022-09-22 07:12:24'),
(148, 7, 1, 6, 28, '00:55:00', 29, '2022-09-22 07:12:24', '2022-09-22 07:12:24'),
(149, 7, 1, 28, 136, '00:55:00', 29, '2022-09-22 07:12:24', '2022-09-22 07:12:24'),
(150, 7, 1, 29, 140, '00:55:00', 29, '2022-09-22 07:12:24', '2022-09-22 07:12:24'),
(151, 7, 8, 31, 146, '09:38:00', 2, '2022-09-22 07:13:03', '2022-09-22 07:13:03'),
(152, 7, 8, 32, 151, '09:38:00', 2, '2022-09-22 07:13:03', '2022-09-22 07:13:03'),
(153, 7, 8, 35, 170, '09:38:00', 2, '2022-09-22 07:13:03', '2022-09-22 07:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `video_posts`
--

CREATE TABLE `video_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `post_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_video_link` longtext COLLATE utf8mb4_unicode_ci,
  `post_video_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_posts`
--

INSERT INTO `video_posts` (`id`, `post_name`, `youtube_video_link`, `post_video_name`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'New Test', 'https://www.youtube.com/embed/1SnPKhCdlsU', NULL, 1, '2022-08-22 08:04:15', '2022-08-22 08:04:15'),
(3, 'vsdffd', NULL, 'fu-post-videos/xdBWaSd48NkBkQDWIc9dKSlLaSDdknBSmec9fEix.mp4', 1, '2022-08-22 23:04:44', '2022-08-22 23:04:44'),
(4, 'vfvds', NULL, 'fu-post-videos/MOPNrD6WLGfjx18dELkS8Nih3gzSSbFZD8DQSXI1.mp4', 1, '2022-08-22 23:18:37', '2022-08-22 23:18:37'),
(5, 'vdvdsffd', 'https://www.youtube.com/embed/1SnPKhCdlsU', NULL, 1, '2022-08-22 23:18:48', '2022-08-22 23:18:48'),
(8, 'Moyad Video Post', 'https://www.youtube.com/embed/Yvbtno1iWQY', NULL, 1, '2022-08-26 08:17:03', '2022-08-26 08:17:03'),
(9, 'Laravel 9 CRUD tutorial in hindi', 'https://www.youtube.com/embed/AeLXx2quncs', NULL, 1, '2022-08-30 05:13:05', '2022-08-30 05:13:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments_likes`
--
ALTER TABLE `comments_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_likes_user_id_foreign` (`user_id`),
  ADD KEY `comments_likes_post_id_foreign` (`post_id`),
  ADD KEY `comments_likes_comment_id_foreign` (`comment_id`);

--
-- Indexes for table `cources`
--
ALTER TABLE `cources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cources_created_by_foreign` (`created_by`);

--
-- Indexes for table `courses_by_categories`
--
ALTER TABLE `courses_by_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_by_categories_cat_id_foreign` (`cat_id`),
  ADD KEY `courses_by_categories_course_id_foreign` (`course_id`);

--
-- Indexes for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faqs_id_unique` (`id`),
  ADD KEY `faqs_question_index` (`question`),
  ADD KEY `faqs_slug_index` (`slug`),
  ADD KEY `faqs_category_id_index` (`category_id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faq_categories_id_unique` (`id`),
  ADD KEY `faq_categories_name_index` (`name`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `meetings_info`
--
ALTER TABLE `meetings_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_que_id_foreign` (`que_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_comments`
--
ALTER TABLE `posts_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_courses`
--
ALTER TABLE `users_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_courses_course_id_foreign` (`course_id`),
  ADD KEY `users_courses_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_results`
--
ALTER TABLE `user_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_posts`
--
ALTER TABLE `video_posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `comments_likes`
--
ALTER TABLE `comments_likes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cources`
--
ALTER TABLE `cources`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `courses_by_categories`
--
ALTER TABLE `courses_by_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `meetings_info`
--
ALTER TABLE `meetings_info`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts_comments`
--
ALTER TABLE `posts_comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_courses`
--
ALTER TABLE `users_courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_results`
--
ALTER TABLE `user_results`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `video_posts`
--
ALTER TABLE `video_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments_likes`
--
ALTER TABLE `comments_likes`
  ADD CONSTRAINT `comments_likes_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `posts_comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cources`
--
ALTER TABLE `cources`
  ADD CONSTRAINT `cources_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses_by_categories`
--
ALTER TABLE `courses_by_categories`
  ADD CONSTRAINT `courses_by_categories_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `course_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_by_categories_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `cources` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_que_id_foreign` FOREIGN KEY (`que_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_courses`
--
ALTER TABLE `users_courses`
  ADD CONSTRAINT `users_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `cources` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
