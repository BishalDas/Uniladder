-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 10:18 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ulconsultancy`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_infos`
--

CREATE TABLE `contact_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `code` varchar(2) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `sprite` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `sprite`) VALUES
(1, 'AF', 'Afghanistan', NULL),
(2, 'AL', 'Albania', NULL),
(3, 'DZ', 'Algeria', NULL),
(4, 'DS', 'American Samoa', NULL),
(5, 'AD', 'Andorra', NULL),
(6, 'AO', 'Angola', NULL),
(7, 'AI', 'Anguilla', NULL),
(8, 'AQ', 'Antarctica', NULL),
(9, 'AG', 'Antigua and Barbuda', NULL),
(10, 'AR', 'Argentina', NULL),
(11, 'AM', 'Armenia', NULL),
(12, 'AW', 'Aruba', NULL),
(13, 'AU', 'Australia', NULL),
(14, 'AT', 'Austria', NULL),
(15, 'AZ', 'Azerbaijan', NULL),
(16, 'BS', 'Bahamas', NULL),
(17, 'BH', 'Bahrain', NULL),
(18, 'BD', 'Bangladesh', NULL),
(19, 'BB', 'Barbados', NULL),
(20, 'BY', 'Belarus', NULL),
(21, 'BE', 'Belgium', NULL),
(22, 'BZ', 'Belize', NULL),
(23, 'BJ', 'Benin', NULL),
(24, 'BM', 'Bermuda', NULL),
(25, 'BT', 'Bhutan', NULL),
(26, 'BO', 'Bolivia', NULL),
(27, 'BA', 'Bosnia and Herzegovina', NULL),
(28, 'BW', 'Botswana', NULL),
(29, 'BV', 'Bouvet Island', NULL),
(30, 'BR', 'Brazil', NULL),
(31, 'IO', 'British Indian Ocean Territory', NULL),
(32, 'BN', 'Brunei Darussalam', NULL),
(33, 'BG', 'Bulgaria', NULL),
(34, 'BF', 'Burkina Faso', NULL),
(35, 'BI', 'Burundi', NULL),
(36, 'KH', 'Cambodia', NULL),
(37, 'CM', 'Cameroon', NULL),
(38, 'CA', 'Canada', NULL),
(39, 'CV', 'Cape Verde', NULL),
(40, 'KY', 'Cayman Islands', NULL),
(41, 'CF', 'Central African Republic', NULL),
(42, 'TD', 'Chad', NULL),
(43, 'CL', 'Chile', NULL),
(44, 'CN', 'China', NULL),
(45, 'CX', 'Christmas Island', NULL),
(46, 'CC', 'Cocos (Keeling) Islands', NULL),
(47, 'CO', 'Colombia', NULL),
(48, 'KM', 'Comoros', NULL),
(49, 'CG', 'Congo', NULL),
(50, 'CK', 'Cook Islands', NULL),
(51, 'CR', 'Costa Rica', NULL),
(52, 'HR', 'Croatia (Hrvatska)', NULL),
(53, 'CU', 'Cuba', NULL),
(54, 'CY', 'Cyprus', NULL),
(55, 'CZ', 'Czech Republic', NULL),
(56, 'DK', 'Denmark', NULL),
(57, 'DJ', 'Djibouti', NULL),
(58, 'DM', 'Dominica', NULL),
(59, 'DO', 'Dominican Republic', NULL),
(60, 'TP', 'East Timor', NULL),
(61, 'EC', 'Ecuador', NULL),
(62, 'EG', 'Egypt', NULL),
(63, 'SV', 'El Salvador', NULL),
(64, 'GQ', 'Equatorial Guinea', NULL),
(65, 'ER', 'Eritrea', NULL),
(66, 'EE', 'Estonia', NULL),
(67, 'ET', 'Ethiopia', NULL),
(68, 'FK', 'Falkland Islands (Malvinas)', NULL),
(69, 'FO', 'Faroe Islands', NULL),
(70, 'FJ', 'Fiji', NULL),
(71, 'FI', 'Finland', NULL),
(72, 'FR', 'France', NULL),
(73, 'FX', 'France, Metropolitan', NULL),
(74, 'GF', 'French Guiana', NULL),
(75, 'PF', 'French Polynesia', NULL),
(76, 'TF', 'French Southern Territories', NULL),
(77, 'GA', 'Gabon', NULL),
(78, 'GM', 'Gambia', NULL),
(79, 'GE', 'Georgia', NULL),
(80, 'DE', 'Germany', NULL),
(81, 'GH', 'Ghana', NULL),
(82, 'GI', 'Gibraltar', NULL),
(83, 'GK', 'Guernsey', NULL),
(84, 'GR', 'Greece', NULL),
(85, 'GL', 'Greenland', NULL),
(86, 'GD', 'Grenada', NULL),
(87, 'GP', 'Guadeloupe', NULL),
(88, 'GU', 'Guam', NULL),
(89, 'GT', 'Guatemala', NULL),
(90, 'GN', 'Guinea', NULL),
(91, 'GW', 'Guinea-Bissau', NULL),
(92, 'GY', 'Guyana', NULL),
(93, 'HT', 'Haiti', NULL),
(94, 'HM', 'Heard and Mc Donald Islands', NULL),
(95, 'HN', 'Honduras', NULL),
(96, 'HK', 'Hong Kong', NULL),
(97, 'HU', 'Hungary', NULL),
(98, 'IS', 'Iceland', NULL),
(99, 'IN', 'India', NULL),
(100, 'IM', 'Isle of Man', NULL),
(101, 'ID', 'Indonesia', NULL),
(102, 'IR', 'Iran (Islamic Republic of)', NULL),
(103, 'IQ', 'Iraq', NULL),
(104, 'IE', 'Ireland', NULL),
(105, 'IL', 'Israel', NULL),
(106, 'IT', 'Italy', NULL),
(107, 'CI', 'Ivory Coast', NULL),
(108, 'JE', 'Jersey', NULL),
(109, 'JM', 'Jamaica', NULL),
(110, 'JP', 'Japan', NULL),
(111, 'JO', 'Jordan', NULL),
(112, 'KZ', 'Kazakhstan', NULL),
(113, 'KE', 'Kenya', NULL),
(114, 'KI', 'Kiribati', NULL),
(115, 'KP', 'Korea, Democratic People\'s Republic of', NULL),
(116, 'KR', 'Korea, Republic of', NULL),
(117, 'XK', 'Kosovo', NULL),
(118, 'KW', 'Kuwait', NULL),
(119, 'KG', 'Kyrgyzstan', NULL),
(120, 'LA', 'Lao People\'s Democratic Republic', NULL),
(121, 'LV', 'Latvia', NULL),
(122, 'LB', 'Lebanon', NULL),
(123, 'LS', 'Lesotho', NULL),
(124, 'LR', 'Liberia', NULL),
(125, 'LY', 'Libyan Arab Jamahiriya', NULL),
(126, 'LI', 'Liechtenstein', NULL),
(127, 'LT', 'Lithuania', NULL),
(128, 'LU', 'Luxembourg', NULL),
(129, 'MO', 'Macau', NULL),
(130, 'MK', 'Macedonia', NULL),
(131, 'MG', 'Madagascar', NULL),
(132, 'MW', 'Malawi', NULL),
(133, 'MY', 'Malaysia', NULL),
(134, 'MV', 'Maldives', NULL),
(135, 'ML', 'Mali', NULL),
(136, 'MT', 'Malta', NULL),
(137, 'MH', 'Marshall Islands', NULL),
(138, 'MQ', 'Martinique', NULL),
(139, 'MR', 'Mauritania', NULL),
(140, 'MU', 'Mauritius', NULL),
(141, 'TY', 'Mayotte', NULL),
(142, 'MX', 'Mexico', NULL),
(143, 'FM', 'Micronesia, Federated States of', NULL),
(144, 'MD', 'Moldova, Republic of', NULL),
(145, 'MC', 'Monaco', NULL),
(146, 'MN', 'Mongolia', NULL),
(147, 'ME', 'Montenegro', NULL),
(148, 'MS', 'Montserrat', NULL),
(149, 'MA', 'Morocco', NULL),
(150, 'MZ', 'Mozambique', NULL),
(151, 'MM', 'Myanmar', NULL),
(152, 'NA', 'Namibia', NULL),
(153, 'NR', 'Nauru', NULL),
(154, 'NP', 'Nepal', NULL),
(155, 'NL', 'Netherlands', NULL),
(156, 'AN', 'Netherlands Antilles', NULL),
(157, 'NC', 'New Caledonia', NULL),
(158, 'NZ', 'New Zealand', NULL),
(159, 'NI', 'Nicaragua', NULL),
(160, 'NE', 'Niger', NULL),
(161, 'NG', 'Nigeria', NULL),
(162, 'NU', 'Niue', NULL),
(163, 'NF', 'Norfolk Island', NULL),
(164, 'MP', 'Northern Mariana Islands', NULL),
(165, 'NO', 'Norway', NULL),
(166, 'OM', 'Oman', NULL),
(167, 'PK', 'Pakistan', NULL),
(168, 'PW', 'Palau', NULL),
(169, 'PS', 'Palestine', NULL),
(170, 'PA', 'Panama', NULL),
(171, 'PG', 'Papua New Guinea', NULL),
(172, 'PY', 'Paraguay', NULL),
(173, 'PE', 'Peru', NULL),
(174, 'PH', 'Philippines', NULL),
(175, 'PN', 'Pitcairn', NULL),
(176, 'PL', 'Poland', NULL),
(177, 'PT', 'Portugal', NULL),
(178, 'PR', 'Puerto Rico', NULL),
(179, 'QA', 'Qatar', NULL),
(180, 'RE', 'Reunion', NULL),
(181, 'RO', 'Romania', NULL),
(182, 'RU', 'Russian Federation', NULL),
(183, 'RW', 'Rwanda', NULL),
(184, 'KN', 'Saint Kitts and Nevis', NULL),
(185, 'LC', 'Saint Lucia', NULL),
(186, 'VC', 'Saint Vincent and the Grenadines', NULL),
(187, 'WS', 'Samoa', NULL),
(188, 'SM', 'San Marino', NULL),
(189, 'ST', 'Sao Tome and Principe', NULL),
(190, 'SA', 'Saudi Arabia', NULL),
(191, 'SN', 'Senegal', NULL),
(192, 'RS', 'Serbia', NULL),
(193, 'SC', 'Seychelles', NULL),
(194, 'SL', 'Sierra Leone', NULL),
(195, 'SG', 'Singapore', NULL),
(196, 'SK', 'Slovakia', NULL),
(197, 'SI', 'Slovenia', NULL),
(198, 'SB', 'Solomon Islands', NULL),
(199, 'SO', 'Somalia', NULL),
(200, 'ZA', 'South Africa', NULL),
(201, 'GS', 'South Georgia South Sandwich Islands', NULL),
(202, 'ES', 'Spain', NULL),
(203, 'LK', 'Sri Lanka', NULL),
(204, 'SH', 'St. Helena', NULL),
(205, 'PM', 'St. Pierre and Miquelon', NULL),
(206, 'SD', 'Sudan', NULL),
(207, 'SR', 'Suriname', NULL),
(208, 'SJ', 'Svalbard and Jan Mayen Islands', NULL),
(209, 'SZ', 'Swaziland', NULL),
(210, 'SE', 'Sweden', NULL),
(211, 'CH', 'Switzerland', NULL),
(212, 'SY', 'Syrian Arab Republic', NULL),
(213, 'TW', 'Taiwan', NULL),
(214, 'TJ', 'Tajikistan', NULL),
(215, 'TZ', 'Tanzania, United Republic of', NULL),
(216, 'TH', 'Thailand', NULL),
(217, 'TG', 'Togo', NULL),
(218, 'TK', 'Tokelau', NULL),
(219, 'TO', 'Tonga', NULL),
(220, 'TT', 'Trinidad and Tobago', NULL),
(221, 'TN', 'Tunisia', NULL),
(222, 'TR', 'Turkey', NULL),
(223, 'TM', 'Turkmenistan', NULL),
(224, 'TC', 'Turks and Caicos Islands', NULL),
(225, 'TV', 'Tuvalu', NULL),
(226, 'UG', 'Uganda', NULL),
(227, 'UA', 'Ukraine', NULL),
(228, 'AE', 'United Arab Emirates', NULL),
(229, 'GB', 'United Kingdom', NULL),
(230, 'US', 'United States', NULL),
(231, 'UM', 'United States minor outlying islands', NULL),
(232, 'UY', 'Uruguay', NULL),
(233, 'UZ', 'Uzbekistan', NULL),
(234, 'VU', 'Vanuatu', NULL),
(235, 'VA', 'Vatican City State', NULL),
(236, 'VE', 'Venezuela', NULL),
(237, 'VN', 'Vietnam', NULL),
(238, 'VG', 'Virgin Islands (British)', NULL),
(239, 'VI', 'Virgin Islands (U.S.)', NULL),
(240, 'WF', 'Wallis and Futuna Islands', NULL),
(241, 'EH', 'Western Sahara', NULL),
(242, 'YE', 'Yemen', NULL),
(243, 'ZR', 'Zaire', NULL),
(244, 'ZM', 'Zambia', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE `labels` (
  `id` int(10) UNSIGNED NOT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `labelid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `page`, `labelid`, `value`, `created_at`, `updated_at`) VALUES
(1, 'home', 'home:welcome_title', 'Welcome to Universal Ladder Consultancy', '2018-10-06 19:18:56', '2019-09-27 02:28:33'),
(3, 'global', 'global:tel_no', '+44 (0) 208 316 1372', '2018-10-27 15:28:06', '2018-10-27 15:28:06'),
(4, 'global', 'global:mobile_no', '+44 7490 511 145', '2018-10-27 15:28:29', '2018-10-27 15:28:29'),
(5, 'global', 'global:email', 'info@ulconsultancy', '2018-10-27 15:28:41', '2019-09-27 02:28:51'),
(6, 'home', 'home:why_choose_sub', 'One Stop Solution for Abroad Study', '2018-12-25 04:33:22', '2019-09-27 03:55:08'),
(11, 'home', 'home:support', '24*7 support', '2018-12-25 04:40:34', '2018-12-25 04:40:34'),
(12, 'home', 'home:support_sub', 'Adipiscing consectetur elit estibulum nibh urna', '2018-12-25 04:41:09', '2018-12-25 04:41:09'),
(15, 'global', 'global:address', 'Woolwich, London', '2018-12-28 09:03:23', '2018-12-28 09:03:23'),
(16, 'home', 'home:admission_assistance', 'Admission Assistance', '2019-09-27 03:56:08', '2019-09-27 03:56:08'),
(17, 'home', 'home:admission_assistance_sub', 'Continuous assistance you from admission stage to the last stage.', '2019-09-27 03:56:40', '2019-09-27 03:56:40'),
(18, 'home', 'home:test_preparation', 'Test Preparation', '2019-09-27 03:57:54', '2019-09-27 03:58:05'),
(19, 'home', 'home:test_preparation_sub', 'Full guidance for test preparation.', '2019-09-27 03:58:13', '2019-09-27 03:58:13'),
(20, 'home', 'home:career_counselling', 'Career Counselling', '2019-09-27 03:58:35', '2019-09-27 03:58:35'),
(21, 'home', 'home:career_counselling_sub', '24×7 counselor guidance at your service.', '2019-09-27 03:58:44', '2019-09-27 03:58:44'),
(22, 'global', 'global:note', 'We serve the public at large who are in need of genuine information concerning their academic career abroad.', '2019-09-27 04:05:07', '2019-09-27 04:05:07'),
(23, 'home', 'home:review_title', 'WHAT STUDENTS SAY ABOUT US', '2019-10-17 01:39:34', '2019-10-17 01:39:34'),
(24, 'home', 'home:scholarship', 'Scholarship', '2019-10-17 02:10:45', '2019-10-17 02:10:45'),
(25, 'home', 'home:scholarship_sub', 'Scholarship opportunity for deserving candidates.', '2019-10-17 02:11:17', '2019-10-17 02:11:36');

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
(1, '2019_10_17_063350_alter_pages_table', 1),
(2, '2019_10_20_084130_create_contact_infos_table', 2),
(3, '2019_10_20_084804_add_status_to_contact_infos_table', 2),
(4, '2019_10_22_052617_add_contact_person_to_contact_infos_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overview` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `order_by` int(11) DEFAULT NULL,
  `menu_order` int(11) DEFAULT NULL,
  `footer_order` int(11) DEFAULT NULL,
  `top_order` int(11) DEFAULT NULL,
  `position` text COLLATE utf8mb4_unicode_ci,
  `meta_title` text COLLATE utf8mb4_unicode_ci,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `parent_id`, `title`, `slug`, `image`, `overview`, `details`, `status`, `order_by`, `menu_order`, `footer_order`, `top_order`, `position`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(6, 0, 'Home', '/', NULL, NULL, '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', 1, NULL, 1, 1, 1, '[\"2\"]', NULL, NULL, NULL, '2018-10-06 19:19:45', '2019-09-27 02:29:18'),
(7, 0, 'About Us', 'about-us', NULL, NULL, '<p>At ARC Facilities, we use the extensive facilities management knowledge we have acquired over the years, especially in building services, maintenance, engineering and project management, towards producing service excellence and satisfied clients experience, through a professional, fast, efficient, high, reliable and personalised service delivery. We engage in partnership that will generate long-term values to our clients, by offering a broad end-to-end mix, from design, personalised made processes and supporting operational efficiency to meet our client&rsquo;s business requirements and strategies.</p>', 1, NULL, 2, NULL, NULL, '[\"2\"]', NULL, NULL, NULL, '2018-10-06 19:21:33', '2018-12-05 18:40:56'),
(8, 0, 'Our Services', 'our-services', NULL, NULL, '<p>Our Services</p>', 1, NULL, 3, NULL, NULL, '[\"2\"]', NULL, NULL, NULL, '2018-10-06 19:23:12', '2019-10-14 04:37:26'),
(11, 8, 'Study in UK', 'study-in-uk', NULL, NULL, '<p>Study in UK</p>', 1, 1, 7, 4, NULL, NULL, NULL, NULL, NULL, '2018-10-06 19:24:14', '2019-10-17 02:48:43'),
(45, 8, 'Study in Germany', 'study-in-germany', NULL, NULL, '<p>Study in Germany</p>', 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-01 22:58:17', '2019-10-17 02:59:10'),
(46, 8, 'Law', 'law', NULL, NULL, '<p>Law</p>', 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-01 22:58:37', '2019-10-17 02:59:10'),
(47, 8, 'Business', 'business', NULL, NULL, '<p>Business</p>', 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-01 22:59:14', '2019-10-17 02:59:10'),
(50, 0, 'Universities', 'universities', NULL, NULL, '<p>Universities</p>', 1, NULL, 7, NULL, NULL, '[\"2\"]', NULL, NULL, NULL, '2019-10-01 23:03:06', '2019-10-01 23:03:06'),
(51, 0, 'Gallery', 'gallery', NULL, NULL, '<p>Gallery</p>', 1, NULL, 7, NULL, NULL, '[\"2\"]', NULL, NULL, NULL, '2019-10-01 23:03:19', '2019-10-01 23:03:19'),
(52, 51, 'Photos', 'photos', NULL, NULL, '<p>Photos</p>', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-01 23:03:43', '2019-10-01 23:05:44'),
(53, 51, 'Videos', 'videos', NULL, NULL, '<p>Videos</p>', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-01 23:03:54', '2019-10-01 23:05:48'),
(54, 0, 'Calendar', 'calendar', NULL, NULL, '<p>Calendar</p>', 1, NULL, 7, NULL, NULL, '[\"2\"]', NULL, NULL, NULL, '2019-10-01 23:04:15', '2019-10-01 23:04:15'),
(55, 0, 'Contact Us', 'contact-us', NULL, NULL, '<p>Suite A, 1 Widcombe Street, Poundbury, Dorchester, England, DT1 3BS&nbsp;<strong>Telephone:</strong>&nbsp;+44 (0)2083161372&nbsp;<br />\r\n<strong>Email :</strong>&nbsp;info@arcfacilities.co.uk</p>', 1, NULL, 7, NULL, NULL, '[\"2\"]', NULL, NULL, NULL, '2019-10-01 23:04:37', '2019-10-01 23:04:37'),
(56, 11, 'Australia', 'australia', NULL, NULL, '<p>Australia</p>', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-13 02:05:04', '2019-10-13 02:50:16'),
(57, 11, 'Canada', 'canada', NULL, NULL, '<p>Canada</p>', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-13 02:38:27', '2019-10-13 02:50:25'),
(61, 8, 'Engineering', 'engineering', NULL, NULL, '<p>Engineering</p>', 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-17 01:45:12', '2019-10-17 02:48:40'),
(62, 8, 'MBA', 'mba', NULL, NULL, '<p>MBA</p>', 1, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-17 01:46:28', '2019-10-17 02:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('kml.pandey77@gmail.com', '$2y$10$VogLeuvmjuUHKjGHkUfI/uNpaX4ag4W5ggxxSJgLTqkDtqaFvn87u', '2018-09-24 00:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`id`, `first_name`, `last_name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Kamal', 'Pandey', 'kml.pandey77@gmail.com', '1233', 'test', '2018-10-22 16:02:40', '2018-10-22 16:02:40'),
(2, 'Kamal', 'Pandey', 'kml.pandey77@gmail.com', '1233', 'test', '2018-10-22 16:03:12', '2018-10-22 16:03:12'),
(3, 'Kamal', 'Pandey', 'kml.pandey77@gmail.com', '1233', 'test', '2018-10-22 16:03:49', '2018-10-22 16:03:49'),
(4, 'Kamal', 'Pandey', 'kml.pandey77@gmail.com', '1233', 'test', '2018-10-22 16:04:27', '2018-10-22 16:04:27'),
(5, 'Kamal', 'Pandey', 'kml.pandey77@gmail.com', '34452', 'test', '2018-10-22 16:06:28', '2018-10-22 16:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(11) DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `package_id`, `title`, `name`, `email`, `country_id`, `image`, `details`, `rating`, `event_date`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'John Frank', NULL, NULL, 'review-1.jpeg', '<p>Nam Cumque nihil impedit quo minuslibero tempore, nihil impedit quo minus id quod possimus, Nam Cumque nihil impedit quo minuslibero tempore, cum soluta nobis est eligendi optio cumque nihil impedit omnis voluptas</p>', NULL, NULL, 1, '2018-10-08 15:02:58', '2019-09-27 02:49:12'),
(2, NULL, NULL, 'John Doe', NULL, NULL, 'review-2.jpeg', '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>', NULL, NULL, 1, '2018-10-08 15:04:13', '2019-09-27 02:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `value`, `created_at`, `updated_at`) VALUES
(1, 'emails', 'info@arcfacilities.co.uk;\r\nkingkunwar_ji@yahoo.com;', '2018-10-06 19:16:33', '2018-12-25 04:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `link` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL,
  `order_by` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `package_id`, `title`, `details`, `image`, `link`, `status`, `order_by`, `created_at`, `updated_at`) VALUES
(2, 0, 'Study Abroad Counselling', NULL, 'officia-dolorum-sunt-2.jpeg', NULL, 1, 2, '2018-01-23 14:48:18', '2019-09-27 02:36:05'),
(3, 0, 'Test Preparation Classes', NULL, 'ex-dolor-quaerat-inv-3.jpeg', NULL, 1, 3, '2018-10-24 15:26:45', '2019-09-27 02:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `title`, `icon`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'facebook', 'https://www.facebook.com/', 1, '2018-04-04 12:53:53', '2019-09-27 04:03:11'),
(2, 'Twitter', 'twitter', 'http://twitter.com/', 1, '2018-10-08 19:52:33', '2019-09-27 04:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `groups` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `groups`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 100, 'admin', 'admin@ulconsultancy', '$2y$12$xhbg1FgakaS50E.YZazf3.nto7LF.1UtkeJUbqKJ3EUOB/ntcyIty', '79mVOrezZPSpL2q1YpYhAIOveyMkTmjSd1cG079y3JXGPxKtgbLdqBOXVXCR', '2018-01-08 14:09:37', '2018-01-23 14:34:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_infos`
--
ALTER TABLE `contact_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`(191)),
  ADD KEY `name_2` (`name`(191));

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_infos`
--
ALTER TABLE `contact_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `labels`
--
ALTER TABLE `labels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
