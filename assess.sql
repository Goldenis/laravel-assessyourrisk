-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2015 a las 01:51:49
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `assess`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(10) unsigned NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question_option_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `answers`
--

INSERT INTO `answers` (`id`, `quiz_id`, `question_id`, `question_option_id`, `created_at`, `updated_at`) VALUES
(1, 1, 19, 31, '2015-09-09 04:15:41', '2015-09-09 04:15:41'),
(2, 1, 18, 28, '2015-09-09 04:15:41', '2015-09-09 04:15:41'),
(3, 1, 17, 22, '2015-09-09 04:15:41', '2015-09-09 04:15:41'),
(4, 1, 25, 37, '2015-09-09 04:15:41', '2015-09-09 04:15:41'),
(5, 1, 33, 46, '2015-09-09 04:15:41', '2015-09-09 04:15:41'),
(6, 1, 34, 51, '2015-09-09 04:15:41', '2015-09-09 04:15:41'),
(7, 2, 17, 22, '2015-09-09 04:17:25', '2015-09-09 04:17:25'),
(8, 2, 18, 28, '2015-09-09 04:17:25', '2015-09-09 04:17:25'),
(9, 2, 19, 30, '2015-09-09 04:17:25', '2015-09-09 04:17:25'),
(10, 2, 25, 36, '2015-09-09 04:17:25', '2015-09-09 04:17:25'),
(11, 2, 33, 47, '2015-09-09 04:17:25', '2015-09-09 04:17:25'),
(12, 2, 25, 37, '2015-09-09 04:17:25', '2015-09-09 04:17:25'),
(13, 2, 34, 51, '2015-09-09 04:17:25', '2015-09-09 04:17:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `brands`
--

INSERT INTO `brands` (`id`, `title`, `url`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Asses Your Risk', 'url1', 'ayr_logo_bp.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Netflix', 'url2', 'netflix-logo.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'PUERTO', 'IMAGEN DE PRUEBA', 'SsKG_jpg', '2015-08-22 02:46:09', '2015-08-22 03:15:26'),
(27, 'wolf', 'lobo', 't5nm_jpg', '2015-08-22 02:49:30', '2015-08-22 02:49:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `educations`
--

CREATE TABLE IF NOT EXISTS `educations` (
  `id` int(10) unsigned NOT NULL,
  `education_category_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `text` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `video` text COLLATE utf8_unicode_ci,
  `order` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `educations`
--

INSERT INTO `educations` (`id`, `education_category_id`, `title`, `text`, `video`, `order`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Turns out, life affects your life', '<p>Day-to-day decisions directly link to your risk of getting cancer. The stakes are high&mdash;make sure you&rsquo;re doing all you can to make the most of it. Now that&rsquo;s living proactively.</p>\r\n', 'running', 4, 1, '0000-00-00 00:00:00', '2015-08-29 00:54:56'),
(2, 1, 'Get Moving', '<p>Women who get regular exercise may have a lower risk of breast cancer. Breaking a sweat for 30 minutes on most days can help reduce your risk by as much as 10-20 percent.</p>\r\n', 'running', 2, 1, '0000-00-00 00:00:00', '2015-08-27 19:42:05'),
(3, 1, 'Fight Fat', '<p>Maintain a healthy body weight, as there&rsquo;s a clear correlation between obesity and breast cancer. Extra fatty tissue produces extra estrogen, which can increase your risk.</p>\r\n', 'breastAwareness', 3, 1, '0000-00-00 00:00:00', '2015-08-27 19:40:34'),
(4, 2, 'Know What’s Normal For You', '<p>Every body is different. In order to know what&rsquo;s up with yours, you have to be self-aware. It&rsquo;s important to know what&rsquo;s normal for you &mdash; that way, you&rsquo;re equipped to recognize a change over time.</p>\r\n', 'mother', 6, 1, '0000-00-00 00:00:00', '2015-08-31 20:53:25'),
(5, 2, 'You Need to Know the Lay of the Land', '<p>80% of breast cancers in young women are found by young women themselves. Get to know what your breasts feel like. They cover more real estate than you may realize: breast tissue extends up to the collarbone, around to your armpits, and into your breastbone.</p>\r\n', 'mother', 5, 1, '0000-00-00 00:00:00', '2015-08-31 20:53:18'),
(6, 3, 'The Most Important Part of Understanding Risk', 'More than anything else, family and health history have a powerful impact on your risk level; understanding the past can help you be proactive about your future.', '', 1, 1, '0000-00-00 00:00:00', '2015-08-20 02:22:48'),
(11, 3, 'fgsd f', '<p>sd fsd fsd</p>\r\n', '', 2, 1, '2015-08-15 04:51:00', '2015-08-20 02:22:48'),
(12, 3, 'pou', '<p>ipoupiopio&acute;p&oacute;p&oacute;</p>\r\n', '', 3, 1, '2015-08-15 04:52:37', '2015-08-20 02:22:48'),
(21, 1, 'aaa', '<p>aaaa</p>\r\n', 'mother', 1, 1, '2015-08-27 03:39:44', '2015-08-27 19:42:05'),
(22, 2, 'lkj', '<p>ljk</p>\r\n', 'mother', 0, 1, '2015-08-27 20:40:37', '2015-08-31 20:53:05'),
(23, 2, 'ljk', '<p>78uiu &nbsp; ujghjgh kjghg j ghj ghj&nbsp;</p>\r\n', 'mother', 0, 1, '2015-08-27 20:40:58', '2015-08-31 20:53:11'),
(24, 1, 'Women Have Pledged to Improve Their Lifestyles.', '<p>You can join them. By clicking the pledge button below, you&rsquo;ll make that number go higher.</p>\r\n', 'running', 5, 1, '2015-08-29 00:54:46', '2015-08-29 00:55:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `education_categories`
--

CREATE TABLE IF NOT EXISTS `education_categories` (
  `id` int(10) unsigned NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `main_text` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `pleged_title` text COLLATE utf8_unicode_ci NOT NULL,
  `pleged_text` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `video_default` text COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `education_categories`
--

INSERT INTO `education_categories` (`id`, `name`, `main_text`, `pleged_title`, `pleged_text`, `video_default`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Lifestyle', '', 'Women Have Pledged to Improve Their Lifestyles.', '<p>You can join them. By clicking the pledge button below, you&rsquo;ll make that number go higher.</p>\r\n', '', 0, '2015-08-14 05:00:00', '2015-08-20 21:24:56'),
(2, 'Your Normal', '', 'Women Have Pledged to Know Their Normal.', 'You can join them. By clicking the pledge button below, you’ll make that number go higher.', '', 1, '2015-08-14 05:00:00', '0000-00-00 00:00:00'),
(3, 'Family & Health History', '', 'Women Have Pledged to Collect Their Family History.', '<p>You can join them. By clicking the pledge button below, you&rsquo;ll make that number go higher.</p>\r\n', '', 0, '0000-00-00 00:00:00', '2015-08-15 03:11:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intros`
--

CREATE TABLE IF NOT EXISTS `intros` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `button` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `intros`
--

INSERT INTO `intros` (`id`, `title`, `text`, `button`, `created_at`, `updated_at`) VALUES
(1, 'home - ruleta', '<p><strong><span style="color:#cc0066">1 in 8</span> women will develop breast cancer at some point in her lifetime. <span style="color:#cc0066">1 in 67</span> will develop ovarian cancer. </strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Your body. Your life. Don&rsquo;t leave it up to chance.</strong></p>\r\n', 'ASSESS YOUR RISK', '0000-00-00 00:00:00', '2015-08-25 20:16:38'),
(2, 'Assessment', '<h4><strong><a href="http://brightpink.org/">Bright Pink</a>&nbsp;created this tool to help you assess <span style="color:#D7006D">your&nbsp;personal level</span> of risk&nbsp;for breast and ovarian cancer. By looking at your <span style="color:#d7006d">health and family history</span>&nbsp;alongside some of your&nbsp;<span style="color:#d7006d">lifestyle</span> choices, you&rsquo;ll not only learn more about your risk, but also about&nbsp;<span style="color:#d7006d">actions</span>&nbsp;you can take to reduce it.<br />\r\n<br />\r\n<em>You</em>&nbsp;have the power to save your life.</strong></h4>\r\n', 'let´s go ', '0000-00-00 00:00:00', '2015-08-25 20:23:48'),
(3, 'Overlay Male', '<h1>Then <u><span style="color:#FFB4AA">share</span></u> this with someone you care about that does. You just might save her life.</h1>\r\n', '', '0000-00-00 00:00:00', '2015-08-26 02:04:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_08_07_175102_create_quizzes_table', 1),
('2015_08_10_135904_create_questions_table', 1),
('2015_08_10_145249_create_question_types_table', 1),
('2015_08_10_145923_create_results_table', 1),
('2015_08_10_150526_create_result_types_table', 1),
('2015_08_10_150812_create_sent_table', 1),
('2015_08_10_151231_create_sent_types_table', 1),
('2015_08_10_151341_create_intros_table', 1),
('2015_08_10_151509_create_education_categories_table', 1),
('2015_08_10_151703_create_educations_table', 1),
('2015_08_10_152925_create_pledges_table', 1),
('2015_08_11_153651_create_question_options_table', 1),
('2015_08_11_174140_create_answres_table', 1),
('2015_08_19_164304_add_title_to_intros', 2),
('2015_08_19_220246_add_campos_to_questions', 3),
('2015_08_19_223732_add_unique_to_questionoptions', 4),
('2015_08_21_173013_create_brands_table', 5),
('2015_08_21_175154_add_title_to_brands', 6),
('2015_08_23_001247_add_value_to_answers', 7),
('2015_08_23_173025_create_result_levels_table', 7),
('2015_08_28_202722_create_sessions_table', 8),
('2015_09_01_150243_create_result_level_conditions_table', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pledges`
--

CREATE TABLE IF NOT EXISTS `pledges` (
  `id` int(10) unsigned NOT NULL,
  `education_category_id` int(11) NOT NULL,
  `session_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pledges`
--

INSERT INTO `pledges` (`id`, `education_category_id`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 3, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 1, 8, '2015-08-29 04:28:16', '2015-08-29 04:28:16'),
(22, 1, 8, '2015-08-29 04:30:37', '2015-08-29 04:30:37'),
(23, 1, 8, '2015-08-29 04:35:13', '2015-08-29 04:35:13'),
(24, 1, 8, '2015-08-29 04:36:55', '2015-08-29 04:36:55'),
(25, 1, 8, '2015-08-29 04:37:04', '2015-08-29 04:37:04'),
(26, 1, 8, '2015-08-29 04:42:38', '2015-08-29 04:42:38'),
(27, 1, 8, '2015-08-29 04:52:29', '2015-08-29 04:52:29'),
(37, 1, 9, '2015-08-31 20:26:33', '2015-08-31 20:26:33'),
(38, 2, 9, '2015-08-31 20:57:42', '2015-08-31 20:57:42'),
(40, 3, 9, '2015-08-31 21:38:49', '2015-08-31 21:38:49'),
(41, 1, 10, '2015-09-01 04:34:16', '2015-09-01 04:34:16'),
(42, 1, 10, '2015-09-01 04:34:16', '2015-09-01 04:34:16'),
(43, 2, 10, '2015-09-01 04:34:45', '2015-09-01 04:34:45'),
(44, 1, 11, '2015-09-01 04:36:32', '2015-09-01 04:36:32'),
(45, 1, 11, '2015-09-01 04:36:32', '2015-09-01 04:36:32'),
(46, 2, 13, '2015-09-07 20:56:59', '2015-09-07 20:56:59'),
(47, 2, 13, '2015-09-07 20:56:59', '2015-09-07 20:56:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL,
  `question_type_id` int(11) NOT NULL,
  `text` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `text_colum` mediumtext COLLATE utf8_unicode_ci,
  `button_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` tinyint(1) DEFAULT '0',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gif` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `indelible` tinyint(1) DEFAULT '0',
  `order` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `questions`
--

INSERT INTO `questions` (`id`, `question_type_id`, `text`, `text_colum`, `button_text`, `email`, `slug`, `gif`, `indelible`, `order`, `active`, `created_at`, `updated_at`) VALUES
(17, 3, '<p>Do you have breasts and/or ovaries?</p>\r\n', '<p>You and the 52 million other young women in the United States&mdash;are at risk <em>simply because</em> you have breasts and/or ovaries.</p>\r\n', '', NULL, 'breasts', '', 1, 1, 1, '2015-08-25 21:33:51', '2015-09-07 23:08:14'),
(18, 1, '<p>How old are you?</p>\r\n', '<h5>Age is important when it comes to breast and ovarian cancer risk: most breast and ovarian cancers develop when women are in their 50s and 60s, but breast cancer in women with a genetic predisposition often develops much earlier, starting when those women are in their 30s and 40s.</h5>\r\n', 'CONTINUE', 1, 'how_old_are_you', '201509809Calendar.gif', NULL, 2, 1, '2015-08-25 21:56:13', '2015-09-09 01:20:51'),
(19, 1, '<p>Have you ever been diagnosed with either of the following?</p>\r\n', '<p>Certain genetic mutations can cause an increased risk for both breast and ovarian cancers. An ovary may only be the size of an almond, but it&rsquo;s powerful -<strong>2/3 of women diagnosed with ovarian cancer will die from their disease.</strong></p>\r\n', 'CONTINUE', NULL, 'have_you_ever_been_diagnosed_with_either_of_the_following', '', 1, 6, 1, '2015-08-25 22:02:10', '2015-09-09 01:20:50'),
(25, 2, '<p>Have any of&nbsp;<span style="color:#cc0066">your immediate family members</span> (parent, sibling, grandparent, aunt, or uncle) been diagnosed with any of the following?</p>\r\n', '<p>Breast and ovarian cancers can run in some families. Sometimes this is because mutated genes have been passed down to you from your mother or father. These genes dramatically increase the risk of developing cancer. Other times, there may be a strong family history, but no known genetic mutation.</p>\r\n', 'CONTINUE', 1, 'your_immediate_family_members', '', NULL, 5, 1, '2015-08-25 22:44:33', '2015-09-09 01:20:52'),
(33, 4, '<p>Drag drink icon to the average number of drinks per day you have &mdash; don&rsquo;t forget to count the weekends!</p>\r\n', '<h5>Research shows a 10% increase in breast cancer risk for every 10g of alcohol&mdash;that&rsquo;s&nbsp;<em>one</em>&nbsp;standard drink&mdash;consumed each day on average. Limit alcohol to one drink per day or eliminate it entirely.</h5>\r\n', 'CONTINUE', NULL, 'continue', NULL, NULL, 3, 1, '2015-09-08 02:07:35', '2015-09-09 01:20:51'),
(34, 4, '<p>BMI</p>\r\n', '', '', NULL, 'bmi', NULL, 1, 4, 1, '2015-09-08 21:11:04', '2015-09-09 03:45:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question_opcions`
--

CREATE TABLE IF NOT EXISTS `question_opcions` (
  `id` int(10) unsigned NOT NULL,
  `question_id` int(11) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unique` tinyint(1) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `question_opcions`
--

INSERT INTO `question_opcions` (`id`, `question_id`, `text`, `value`, `button_text`, `unique`, `order`, `active`, `created_at`, `updated_at`) VALUES
(22, 17, '', '1', 'yes', NULL, 1, 1, '2015-08-25 21:39:18', '2015-09-09 03:33:15'),
(23, 17, '', '0', 'No', NULL, 2, 1, '2015-08-25 21:39:28', '2015-09-09 03:33:15'),
(24, 18, '<p>&lt; 20</p>\r\n', '1', '', NULL, 0, 1, '2015-08-25 21:57:13', '2015-08-26 02:46:56'),
(25, 18, '<p>20-30</p>\r\n', '2', '', NULL, 0, 1, '2015-08-25 21:57:23', '2015-08-25 21:57:23'),
(26, 18, '<p>31-35</p>\r\n', '3', '', NULL, 0, 1, '2015-08-25 21:57:39', '2015-08-25 21:57:39'),
(27, 18, '<p>36-40</p>\r\n', '4', '', NULL, 0, 1, '2015-08-25 21:57:52', '2015-08-25 21:57:52'),
(28, 18, '<p>40+</p>\r\n', '5', '', NULL, 0, 1, '2015-08-25 21:58:03', '2015-08-25 21:58:03'),
(29, 19, '<p>Breast cancer</p>\r\n', '-1', '', NULL, 0, 1, '2015-08-25 22:46:39', '2015-08-25 22:46:39'),
(30, 19, '<p>Ovarian cancer (epithelial; non-germ cell) or Fallopian tube cancer</p>\r\n', '-1', '', NULL, 0, 1, '2015-08-25 22:46:59', '2015-08-25 22:46:59'),
(31, 19, '<p>Both</p>\r\n', '-1', '', NULL, 0, 1, '2015-08-25 22:47:23', '2015-08-25 22:47:23'),
(32, 19, '<p>Neither</p>\r\n', '0', '', NULL, 0, 1, '2015-08-25 22:48:06', '2015-08-25 22:48:06'),
(33, 25, '<p>Breast cancer diagnosed at age 50 or under</p>\r\n', '-1', '', 0, 0, 1, '2015-08-25 22:52:21', '2015-08-25 22:53:46'),
(34, 25, '<p>Triple negative (ER/PR/her2-) breast cancer</p>\r\n', '-1', '', 1, 0, 1, '2015-08-25 22:52:49', '2015-08-27 02:09:14'),
(35, 25, '<p>More than one breast cancer (cancer in both breasts, or two separate breast cancers in one breast)</p>\r\n', '-1', '', 0, 0, 1, '2015-08-25 22:53:01', '2015-08-25 22:53:46'),
(36, 25, '<p>Male breast cancer</p>\r\n', '-1', '', 0, 0, 1, '2015-08-25 22:53:11', '2015-08-25 22:53:46'),
(37, 25, '<p>Ovarian cancer, primary peritoneal cancer, or fallopian tube cancer</p>\r\n', '-1', '', 0, 0, 1, '2015-08-25 22:53:22', '2015-08-25 22:53:46'),
(38, 25, '<p>Two or more close relatives with breast cancer at any age</p>\r\n', '-1', '', 0, 0, 1, '2015-08-25 22:53:33', '2015-08-25 22:53:47'),
(39, 25, '<p>None of the above</p>\r\n', '0', '', 1, 0, 1, '2015-08-25 22:53:47', '2015-08-25 22:53:47'),
(42, 26, '<p>Example options</p>\r\n', '2', '', NULL, 0, 1, '2015-08-26 03:21:13', '2015-08-26 04:29:47'),
(44, 33, '<p>0</p>\r\n', '0', '0', NULL, 0, 1, '2015-09-09 03:36:01', '2015-09-09 03:36:01'),
(45, 33, '<p>1</p>\r\n', '1', '1', 1, 0, 1, '2015-09-09 03:36:15', '2015-09-09 03:36:15'),
(46, 33, '<p>2</p>\r\n', '2', '2', NULL, 0, 1, '2015-09-09 03:36:23', '2015-09-09 03:36:23'),
(47, 33, '<p>3</p>\r\n', '3', '3', NULL, 0, 1, '2015-09-09 03:36:30', '2015-09-09 03:36:30'),
(48, 33, '<p>4</p>\r\n', '4', '4', NULL, 0, 1, '2015-09-09 03:36:37', '2015-09-09 03:36:37'),
(49, 33, '<p>5</p>\r\n', '5', '5', NULL, 0, 1, '2015-09-09 03:37:18', '2015-09-09 03:37:18'),
(50, 33, '<p>6</p>\r\n', '6', '6', NULL, 0, 1, '2015-09-09 03:37:24', '2015-09-09 03:37:24'),
(51, 34, '<p>Below 18.5 (Underweight)</p>\r\n', '<18.5', '', NULL, 0, 1, '2015-09-09 03:46:37', '2015-09-09 03:46:37'),
(52, 34, '<p>18.5 &ndash; 24.9 Normal</p>\r\n', '', '', NULL, 0, 1, '2015-09-09 03:46:52', '2015-09-09 03:46:52'),
(53, 34, '<p>25.0 &ndash; 29.9 Overweight</p>\r\n', '', '', NULL, 0, 1, '2015-09-09 03:47:01', '2015-09-09 03:47:06'),
(54, 34, '<p>30.0 and Above &nbsp;Obese</p>\r\n', '', '', NULL, 0, NULL, '2015-09-09 03:47:14', '2015-09-09 03:47:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question_types`
--

CREATE TABLE IF NOT EXISTS `question_types` (
  `id` int(10) unsigned NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `question_types`
--

INSERT INTO `question_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'radio button', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'check box', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'button', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Special', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quizzes`
--

CREATE TABLE IF NOT EXISTS `quizzes` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `quizzes`
--

INSERT INTO `quizzes` (`id`, `created_at`, `updated_at`) VALUES
(1, '2015-09-09 04:15:40', '2015-09-09 04:15:40'),
(2, '2015-09-09 04:17:24', '2015-09-09 04:17:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `id` int(10) unsigned NOT NULL,
  `question_id` int(11) NOT NULL,
  `result_type_id` int(11) NOT NULL,
  `result_level_id` int(11) NOT NULL,
  `question_opcion_id` int(6) NOT NULL,
  `subtitle` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `condition` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `result_levels`
--

CREATE TABLE IF NOT EXISTS `result_levels` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text_less` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `text_less_col2` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `text_more` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `text_more_col2` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `result_levels`
--

INSERT INTO `result_levels` (`id`, `name`, `text_less`, `text_less_col2`, `text_more`, `text_more_col2`, `created_at`, `updated_at`) VALUES
(1, 'Average', '<h3 class="column-header">Understanding Your Baseline Risk</h3>\r\n                            <p>Your answers suggest that you are at <a href="http://www.brightpink.org/what-you-need-to-know/understand-risk/" target="_blank">average baseline risk</a> for breast and ovarian cancer, just like the majority of women in the general population.\r\n                                This means you have a 12% chance of getting breast cancer—that’s one in eight women—and a 1.5% chance of getting ovarian cancer.\r\n                                75% of all breast and ovarian cancers are diagnosed in average risk women, so being proactive about <a href="http://www.brightpink.org/what-you-need-to-know/reduce-your-risk/" target="_blank">risk-reduction</a> and <a href="http://www.brightpink.org/what-you-need-to-know/early-detection/" target="_blank">early detection</a> is still important.\r\n                            </p>', '<h3 class="column-header">What To Do Now</h3>\r\n                            <p>\r\n                                First, review the section below to better understand which of your lifestyle choices could be negatively affecting your risk.\r\n                                Gene mutations are funny things—no one really knows what “flips the switch” and causes cancer to develop.\r\n                                The good news is that taking steps to reduce or eliminate modifiable risk factors may help reduce the likelihood of that switch flipping.\r\n                                You can learn more about <a href="http://www.brightpink.org/what-you-need-to-know/reduce-your-risk/" target="_blank">lifestyle risk-reduction</a> strategies on our website.\r\n                            </p>', '<h5 class="column-header pink-text">Since You''ve Been Diagnosed With Breast or Ovarian Cancer:</h5>\r\n                                    <p>\r\n                                        It may seem like being at “average risk” when you’ve already been diagnosed with breast or ovarian cancer seems strange, but as noted above, the majority of breast and ovarian cancers are diagnosed in women with average risk.\r\n                                        The information below may be less relevant to you now, post-diagnosis, but we still recommend bringing it to your doctor to discuss which strategies you should still incorporate (most of these recommendations are good to keep in mind for general health anyway).\r\n                                        <b>And the most important thing we can recommend is talking to your doctor or a genetic counselor about pursing genetic testing, if you haven’t already had it.</b>\r\n                                        This testing will help determine if your cancer was likely the result of a gene mutation.\r\n                                        If it was, your baseline risk is actually higher than average and you will need to discuss enhanced risk management strategies with your doctor.\r\n                                    </p>', '<p>\r\n                                    Being at increased risk means that you have up to a 25% chance of developing breast cancer and up to a 5.5% chance of ovarian cancer at some point in your lifetime.\r\n                                    These percentages mean that your risk for both cancers is more than twice that of women in the general population, which is significant.\r\n                                    It’s a great thing that you’ve identified this risk and are here learning more about the <a href="http://www.brightpink.org/what-you-need-to-know/reduce-your-risk/" target="_blank">risk-reduction</a> and <a href="http://www.brightpink.org/what-you-need-to-know/early-detection/" target="_blank">early detection</a> options that are available to you.\r\n                                    Living a proactive lifestyle is one of the most important things you can do.\r\n                                </p>\r\n\r\n<h5 class="column-header pink-text">Since You''ve Been Diagnosed With Breast or Ovarian Cancer:</h5>\r\n                                    <p>\r\n                                        The recommendation above regarding genetic testing is particularly relevant to you.\r\n                                        <b>If you’ve not yet been tested, it’s important to rule out the involvement of a genetic mutation in your cancer and the potential that your baseline risk may actually be higher.</b>\r\n                                        (It may seem strange to think of yourself as not already at high risk, given your diagnosis, but keep in mind that the majority of breast and ovarian cancers occur in women with an average baseline risk.)\r\n                                        And though some of the risk-reduction and early detection information below may be less relevant to you now, post-diagnosis, we still recommend bringing these results to your doctor to discuss which strategies you may still need to incorporate.\r\n                                    </p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Increased', ' <h3>Understanding Your Baseline Risk</h3>\r\n                            <p>\r\n                                Your answers suggest that you are at <a href="http://www.brightpink.org/what-you-need-to-know/understand-risk/#understanding-increased-risk" target="_blank">increased baseline risk</a> for breast and ovarian cancer,\r\n                                either because of a <a href="http://www.brightpink.org/what-you-need-to-know/collect-your-family-history/" target="_blank">family history</a> of one of these cancers, some significant event in your personal health history,\r\n                                or because you or a family member has been diagnosed with a specific type of gene mutation associated with an increased risk of breast or ovarian cancer.\r\n                                If you have not already pursued genetic testing, we highly recommend that you talk with your doctor or a genetic counselor about whether your personal circumstances warrant it, to <b>confirm that your baseline risk truly is only increased, and not actually high</b>.\r\n                                If you are at high risk, you will need to discuss enhanced risk management strategies with your doctor.\r\n                            </p>', '<h3 class="column-header">What To Do Now</h3>\r\n                            <p>\r\n                                It can be daunting to face the idea of having a higher-than-average risk of breast and ovarian cancer.\r\n                                The good news is that knowledge is power and there are things you can do to take control and reduce your risk!\r\n                            </p>\r\n                            <p>\r\n                                First, review the section below to better understand which of your lifestyle choices could be negatively affecting your risk.\r\n                                Gene mutations are funny things—no one really knows what “flips the switch” and causes cancer to develop.\r\n                                The good news is that taking steps to reduce or eliminate modifiable risk factors may help reduce the likelihood of that switch flipping.\r\n                                You can learn more about <a href="http://www.brightpink.org/what-you-need-to-know/reduce-your-risk/" target="_blank">lifestyle risk-reduction</a> strategies on our website.\r\n                            </p>\r\n                            <p class="more-results">\r\n                                <i class="pink-text">As mentioned above, if you’ve not yet had genetic testing</i>, we suggest you seek input from an OB/GYN or a genetic counselor, to discuss whether you’re a candidate as well as what the process entails.\r\n                                He or she can also talk to you about how to manage and respond to the concerns you might have regarding the testing process and receiving a result.\r\n                                If you need help finding a genetic counselor to talk to in person or on the phone, you can find resources on our website <a href="http://www.brightpink.org/high-risk-support/genetic-counseling/" target="_blank">here</a>.\r\n                                And if you want to dip your toes in the water by asking a question online first, or reading some FAQs, visit our <a href="http://www.brightpink.org/high-risk-support/genetic-counseling/" target="_blank">Ask a Genetic Counselor</a> page.\r\n                            </p>\r\n                            <p class="more-results">\r\n                                Your doctor may also recommend increased <a href="http://www.brightpink.org/what-you-need-to-know/reduce-your-risk/#increased-risk-reduction" target="_blank">risk-reduction</a> and <a href="http://www.brightpink.org/what-you-need-to-know/early-detection/#increased-risk-screening-recommendation" target="_blank">early detection</a> strategies appropriate for women at increased risk, including starting mammograms at a younger age than recommended for women of average risk, or exploring the possibility of pharmaceutical risk-reduction options.\r\n                            </p>\r\n                            <p class="more-results">\r\n                                If you feel like you might benefit from getting support from other women in a similar situation, Bright Pink offers both <a href="http://www.brightpink.org/pinkpal/" target="_blank">1:1</a> and <a href="http://www.brightpink.org/outreach/" target="_blank">group</a> support programs for women at increased and high risk that you may find helpful.\r\n                            </p>\r\n                            <p class="more-results">\r\n                                We also encourage you to print out these results or let us email them to you so that you can take them to your doctor and discuss creating a risk-reduction and early detection strategy together.\r\n                            </p>', ' <p> \r\n                                    Being at increased risk means that you have up to a 25% chance of developing breast cancer and up to a 5.5% chance of ovarian cancer at some point in your lifetime.\r\n                                    These percentages mean that your risk for both cancers is more than twice that of women in the general population, which is significant.\r\n                                    It’s a great thing that you’ve identified this risk and are here learning more about the <a href="http://www.brightpink.org/what-you-need-to-know/reduce-your-risk/" target="_blank">risk-reduction</a> and <a href="http://www.brightpink.org/what-you-need-to-know/early-detection/" target="_blank">early detection</a> options that are available to you.\r\n                                    Living a proactive lifestyle is one of the most important things you can do.\r\n                                </p>\r\n\r\n<h5>Since You''ve Been Diagnosed With Breast or Ovarian Cancer:</h5>\r\n                                    <p>\r\n                                        The recommendation above regarding genetic testing is particularly relevant to you.\r\n                                        <b>If you’ve not yet been tested, it’s important to rule out the involvement of a genetic mutation in your cancer and the potential that your baseline risk may actually be higher.</b>\r\n                                        (It may seem strange to think of yourself as not already at high risk, given your diagnosis, but keep in mind that the majority of breast and ovarian cancers occur in women with an average baseline risk.)\r\n                                        And though some of the risk-reduction and early detection information below may be less relevant to you now, post-diagnosis, we still recommend bringing these results to your doctor to discuss which strategies you may still need to incorporate.\r\n                                    </p>\r\n', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'High', ' <h3 class="column-header">Understanding Your Baseline Risk</h3>\r\n                            <p>Your answers suggest that you are at a <a href="http://www.brightpink.org/what-you-need-to-know/understand-risk/#understanding-high-risk" target="_blank">high baseline risk</a> for breast and ovarian cancer, due either to a diagnosed gene mutation associated with a high risk of one of these cancers or, if you’ve not yet undergone genetic testing yourself, having a 1st degree relative who has been diagnosed with one of these mutations.\r\n                                (If you’ve not yet pursued genetic testing, doing so to confirm your risk level is advisable.)  Being at high-risk means that you have up to an 87% chance of getting breast cancer and up to a 54% chance of getting ovarian cancer.\r\n                                This is significant, so it’s a great thing that you’ve identified this risk and are here learning more about the <a href="http://www.brightpink.org/what-you-need-to-know/reduce-your-risk/#high-risk-reduction" target="_blank">risk-reduction</a> and <a href="http://www.brightpink.org/what-you-need-to-know/early-detection/#high-risk-screening-recommendation" target="_blank">early detection</a> options that are available to you.\r\n                                Living a proactive lifestyle is one of the most important things you can do!\r\n                            </p>', '  <h3 class="column-header">What To Do Now</h3>\r\n                            <p>\r\n                                It can be scary to face the idea of those lifetime risk numbers.\r\n                                The good news is that knowledge is power and there are things you can do to take control and reduce your risk!\r\n                            </p>\r\n                            <p>\r\n                                First, review the section below to better understand which of your lifestyle choices could be negatively affecting your risk.\r\n                                Gene mutations are funny things—no one really knows what “flips the switch” and causes cancer to develop.\r\n                                The good news is that taking steps to reduce or eliminate modifiable risk factors may help reduce the likelihood of that switch flipping.\r\n                                You can learn more about <a href="http://www.brightpink.org/what-you-need-to-know/reduce-your-risk/" target="_blank">lifestyle risk-reduction</a> strategies on our website.\r\n                            </p>', '<h5 class="column-header pink-text">Since You''ve Been Diagnosed With Breast or Ovarian Cancer:</h5>\r\n                                    <p>\r\n                                        Some of the risk-reduction and early detection information below may be less relevant to you now, post-diagnosis.\r\n                                        We still recommend bringing these results to your doctor to discuss which strategies you may still need to incorporate.\r\n                                    </p>', '<p class="more-results"><i class="pink-text">As mentioned above, if you’ve not yet had genetic testing</i>, we suggest you seek input from an OB/GYN or a genetic counselor, to discuss whether you’re a candidate as well as what the process entails.\r\n                                He or she can also talk to you about how to manage and respond to the concerns you might have regarding the testing process and receiving a result.\r\n                                It’s important to note that until you’ve had genetic testing done, you don’t know for sure that you’re high risk.\r\n                                If you need help finding a genetic counselor to talk to in person or on the phone, you can find resources <a href="http://www.brightpink.org/high-risk-support/genetic-counseling/" target="_blank">here</a>.\r\n                                And if you want to dip your toes in the water by asking a question online first, or reading some FAQs, visit our <a href="http://www.brightpink.org/high-risk-support/genetic-counseling/" target="_blank">Ask a Genetic Counselor</a> page.\r\n                            </p>\r\n                            <p class="more-results"><i class="pink-text">If you have a diagnosed gene mutation, but are choosing not to have risk-reducing surgery, or if you haven’t yet had risk-reducing surgeries but plan to later</i>, we encourage you to be in close contact with your OB/GYN or another physician you trust about what kind of increased screening protocol he or she recommends for you.\r\n                                You can learn more about the increased screening typically recommended for high-risk women <a href="http://www.brightpink.org/what-you-need-to-know/early-detection/#high-risk-screening-recommendation" target="_blank">here</a>.\r\n                                And if you want more information about what those risk-reducing surgeries are, you can find it <a href="http://www.brightpink.org/what-you-need-to-know/reduce-your-risk/#high-risk-reduction" target="_blank">here</a>.\r\n                            </p>\r\n                            <p class="more-results"><i class="pink-text">If you have a diagnosed gene mutation and have undergone risk-reducing breast and/or ovarian surgeries</i>, congratulations on crossing a big and important hurdle.\r\n                                We recommend staying in close touch with your physician even though the surgeries are complete or partially complete.\r\n                                He or she should talk to you about what kind of screening is recommended for you now; if you haven’t had that conversation yet, ask for it!\r\n                            </p>\r\n                            <p class="more-results">\r\n                                Regardless of where you are on the testing/screening/surgery spectrum, you may find that you want support from other women in a similar situation, or maybe that you want to lend support and guidance to someone who’s a little further behind you in the process of risk assessment and management.\r\n                                Bright Pink offers both <a href="http://www.brightpink.org/pinkpal/" target="_blank">1:1</a> and <a href="http://www.brightpink.org/outreach/" target="_blank">group</a> support programs that you may find helpful.\r\n                            </p>\r\n                            <p class="more-results">\r\n                                We also encourage you to print out these results or let us email them to you so that you can take them to your doctor and discuss creating a risk-reduction and early detection strategy together.\r\n                            </p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `result_level_conditions`
--

CREATE TABLE IF NOT EXISTS `result_level_conditions` (
  `id` int(10) unsigned NOT NULL,
  `result_level_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question_option_id` int(11) NOT NULL,
  `active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `result_level_conditions`
--

INSERT INTO `result_level_conditions` (`id`, `result_level_id`, `question_id`, `question_option_id`, `active`, `created_at`, `updated_at`) VALUES
(24, 3, 18, 28, 1, '2015-09-08 00:33:55', '2015-09-08 00:33:55'),
(26, 1, 18, 26, 1, '2015-09-08 19:57:14', '2015-09-08 19:57:14'),
(27, 2, 19, 31, 1, '2015-09-09 02:03:27', '2015-09-09 02:03:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `result_types`
--

CREATE TABLE IF NOT EXISTS `result_types` (
  `id` int(10) unsigned NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `result_types`
--

INSERT INTO `result_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Favor', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'No Favor', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sent`
--

CREATE TABLE IF NOT EXISTS `sent` (
  `id` int(10) unsigned NOT NULL,
  `sent_type_id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sent`
--

INSERT INTO `sent` (`id`, `sent_type_id`, `name`, `email`, `quiz_id`, `created_at`, `updated_at`) VALUES
(2, 2, 'dr. pedro', 'paradoctor@mail.com', 1, '2015-08-19 14:00:00', '0000-00-00 00:00:00'),
(4, 1, 'alfonso', 'alfo@as.com', 1, '2015-08-19 13:00:00', '0000-00-00 00:00:00'),
(11, 2, 'lorena', 'lore@das80.com', 5, '2015-08-18 13:05:00', '0000-00-00 00:00:00'),
(12, 1, 'patricio', 'pat_ri@dfsa.com', 4, '2015-08-19 05:00:00', '0000-00-00 00:00:00'),
(13, 2, 'lorena', 'lore@das80.com', 5, '2015-08-18 13:05:00', '0000-00-00 00:00:00'),
(15, 2, 'lorena', 'lore@das80.com', 5, '2015-08-18 13:05:00', '0000-00-00 00:00:00'),
(16, 1, 'patricio', 'pat_ri@dfsa.com', 4, '2015-08-19 05:00:00', '0000-00-00 00:00:00'),
(17, 2, 'lorena', 'lore@das80.com', 5, '2015-08-18 13:05:00', '0000-00-00 00:00:00'),
(18, 1, 'patricio', 'pat_ri@dfsa.com', 4, '2015-08-19 05:00:00', '0000-00-00 00:00:00'),
(19, 2, 'lorena', 'lore@das80.com', 5, '2015-08-18 13:05:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sent_types`
--

CREATE TABLE IF NOT EXISTS `sent_types` (
  `id` int(10) unsigned NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sent_types`
--

INSERT INTO `sent_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Person', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Doctor', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `created_at`, `updated_at`) VALUES
(1, '2015-09-09 01:41:30', '2015-09-09 01:41:30'),
(2, '2015-09-09 01:45:13', '2015-09-09 01:45:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `rol` int(11) NOT NULL,
  `name_role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `rol`, `name_role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jhon Doe', 'admin@admin.com', '$2y$10$5pvTUL9ws7ECqo6ExwYwnejhOCHEwUJ.pnRMEefvP908Nwx/j30Zu', 2, '', 'byUj825XZSFr1ssBh3flczl9uiUnRWvLpdyuhNQbepKj2MqOhUJgOKIv36Cv', '2015-08-13 01:20:52', '2015-09-08 21:32:55');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `education_categories`
--
ALTER TABLE `education_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `intros`
--
ALTER TABLE `intros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `pledges`
--
ALTER TABLE `pledges`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `question_opcions`
--
ALTER TABLE `question_opcions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `question_types`
--
ALTER TABLE `question_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `result_levels`
--
ALTER TABLE `result_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `result_level_conditions`
--
ALTER TABLE `result_level_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `result_types`
--
ALTER TABLE `result_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sent`
--
ALTER TABLE `sent`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sent_types`
--
ALTER TABLE `sent_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `education_categories`
--
ALTER TABLE `education_categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `intros`
--
ALTER TABLE `intros`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pledges`
--
ALTER TABLE `pledges`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT de la tabla `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `question_opcions`
--
ALTER TABLE `question_opcions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT de la tabla `question_types`
--
ALTER TABLE `question_types`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `result_levels`
--
ALTER TABLE `result_levels`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `result_level_conditions`
--
ALTER TABLE `result_level_conditions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `result_types`
--
ALTER TABLE `result_types`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sent`
--
ALTER TABLE `sent`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `sent_types`
--
ALTER TABLE `sent_types`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
