-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2024 at 08:44 AM
-- Server version: 10.6.17-MariaDB-cll-lve
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigw5555_sig`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `user_id` int(12) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `used_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount`, `user_id`, `product_id`, `used_at`, `created_at`, `updated_at`) VALUES
(1, 'ShariaInvestorGeneration', 245000.00, 10, NULL, '2024-06-01 16:44:34', NULL, '2024-06-01 08:03:16'),
(2, 'Syariahsaham', 245000.00, NULL, NULL, '2024-06-01 16:44:43', NULL, NULL),
(3, 'InvestorSahamPemula', 245000.00, 29, NULL, '2024-06-01 16:44:51', NULL, '2024-03-04 07:25:32'),
(6, 'VoucherB2', 200000.00, NULL, NULL, NULL, '2024-06-01 09:46:37', '2024-06-04 06:48:11'),
(7, 'VoucherB3', 200000.00, NULL, NULL, NULL, '2024-06-01 09:46:47', '2024-06-04 06:48:20'),
(8, 'VoucherA1', 200000.00, NULL, NULL, NULL, '2024-06-01 10:11:40', '2024-06-01 10:11:40'),
(9, 'VoucherC1', 50000.00, NULL, NULL, NULL, '2024-06-04 06:47:20', '2024-06-04 06:47:20'),
(10, 'VoucherC2', 50000.00, NULL, NULL, NULL, '2024-06-04 06:47:45', '2024-06-04 06:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_12_08_092433_create_sessions_table', 1),
(7, '2023_12_12_114001_create_products_table', 1),
(9, '2023_12_20_140723_create_coupons_table', 1),
(10, '2014_10_12_000000_create_users_table', 2),
(11, '2023_12_12_120731_create_orders_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) DEFAULT 'Unpaid',
  `payment_type` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `va_number` varchar(255) DEFAULT NULL,
  `diskon` varchar(255) DEFAULT NULL,
  `total_harga` int(12) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `user_id`, `status`, `payment_type`, `bank`, `va_number`, `diskon`, `total_harga`, `created_at`, `updated_at`) VALUES
(29231126, 2, 10, 'Paid', 'qris', NULL, NULL, NULL, 10000, '2024-01-12 06:51:56', '2024-01-12 06:56:01'),
(34092497, 1, 24, 'Paid', 'qris', NULL, NULL, '245000', 4655000, '2024-03-01 06:29:01', '2024-03-01 06:30:04'),
(78348601, 3, 49, 'Kadaluarsa', 'bank_transfer', 'bni', '8578455369527442', '0', 450000, '2024-05-12 23:02:49', '2024-05-13 23:04:14'),
(101780039, 3, 48, 'Kadaluarsa', 'echannel', NULL, NULL, '0', 450000, '2024-05-12 19:36:25', '2024-05-13 19:37:44'),
(121089566, 3, 56, 'Kadaluarsa', 'qris', NULL, NULL, '0', 450000, '2024-05-29 23:40:34', '2024-05-29 23:56:50'),
(250146598, 3, 32, 'Unpaid', NULL, NULL, NULL, '0', 450000, '2024-05-18 06:06:44', '2024-05-18 06:06:44'),
(253979948, 3, 43, 'Unpaid', NULL, NULL, NULL, '0', 450000, '2024-05-06 06:20:22', '2024-05-06 06:20:22'),
(306697569, 1, 20, 'Unpaid', NULL, NULL, NULL, '245000', 4655000, '2024-02-29 19:04:56', '2024-02-29 19:04:56'),
(316767398, 1, 17, 'Kadaluarsa', 'qris', NULL, NULL, '245000', 4655000, '2024-02-25 07:17:07', '2024-02-25 07:33:46'),
(333660841, 3, 56, 'Kadaluarsa', 'echannel', NULL, NULL, '0', 450000, '2024-05-29 23:53:32', '2024-05-30 23:54:48'),
(386535122, 3, 10, 'Kadaluarsa', 'qris', NULL, NULL, '0', 450000, '2024-05-12 23:56:07', '2024-05-13 00:12:19'),
(438103956, 1, 17, 'Unpaid', NULL, NULL, NULL, '245000', 4655000, '2024-02-25 08:09:28', '2024-02-25 08:09:28'),
(439611513, 3, 10, 'Kadaluarsa', 'qris', NULL, NULL, '0', 450000, '2024-05-12 23:52:03', '2024-05-13 00:08:19'),
(535001095, 3, 46, 'Paid', 'bank_transfer', 'bri', '124127446044440833', '0', 20000, '2024-05-06 06:56:49', '2024-05-06 06:59:23'),
(535701438, 1, 24, 'Kadaluarsa', 'qris', NULL, NULL, '245000', 4655000, '2024-03-01 02:20:02', '2024-03-01 02:36:25'),
(702812002, 2, 19, 'Kadaluarsa', 'echannel', NULL, NULL, '145000', 2755000, '2024-03-04 23:15:20', '2024-03-05 23:16:56'),
(704273234, 3, 46, 'Unpaid', NULL, NULL, NULL, '0', 450000, '2024-05-06 06:55:14', '2024-05-06 06:55:14'),
(717266751, 3, 32, 'Kadaluarsa', 'bank_transfer', 'bni', '8578712105208856', '0', 450000, '2024-05-29 23:49:25', '2024-05-30 23:50:50'),
(718543957, 1, 17, 'Unpaid', NULL, NULL, NULL, '245000', 4655000, '2024-02-25 07:13:18', '2024-02-25 07:13:18'),
(722249686, 3, 52, 'Paid', 'bank_transfer', 'bni', '8578178894820217', '0', 450000, '2024-05-23 04:08:26', '2024-05-23 04:10:17'),
(728567859, 2, 21, 'Unpaid', NULL, NULL, NULL, '145000', 2755000, '2024-02-28 21:12:18', '2024-02-28 21:12:18'),
(729632447, 2, 21, 'Paid', 'qris', NULL, NULL, '145000', 2755000, '2024-02-29 02:27:48', '2024-02-29 02:30:39'),
(767340380, 1, 23, 'Unpaid', NULL, NULL, NULL, '0', 4900000, '2024-03-03 18:41:53', '2024-03-03 18:41:53'),
(800313560, 3, 56, 'Kadaluarsa', 'bank_transfer', 'bni', '8578024146610359', '0', 450000, '2024-05-29 23:42:14', '2024-05-30 23:47:25'),
(809306734, 3, 43, 'Paid', 'echannel', NULL, NULL, '0', 20000, '2024-04-25 09:58:28', '2024-04-25 10:00:15'),
(863167439, 1, 20, 'Paid', 'echannel', NULL, NULL, '245000', 4655000, '2024-03-05 03:01:32', '2024-03-05 03:03:18'),
(919140451, 1, 33, 'Unpaid', NULL, NULL, NULL, '245000', 4655000, '2024-03-06 06:15:07', '2024-03-06 06:15:07'),
(938867195, 3, 53, 'Paid', 'echannel', NULL, NULL, '0', 450000, '2024-05-26 21:19:34', '2024-05-26 21:22:34'),
(944585135, 3, 56, 'Unpaid', NULL, NULL, NULL, '0', 450000, '2024-05-30 00:07:39', '2024-05-30 00:07:39'),
(954290581, 3, 58, 'Paid', 'qris', NULL, NULL, '0', 450000, '2024-06-01 03:53:35', '2024-06-01 03:54:18'),
(999746478, 3, 58, 'Kadaluarsa', 'qris', NULL, NULL, '0', 450000, '2024-06-01 03:51:57', '2024-06-01 04:08:13'),
(1053635792, 3, 55, 'Paid', 'qris', NULL, NULL, '0', 450000, '2024-05-29 01:30:11', '2024-05-29 02:12:09'),
(1076280926, 1, 20, 'Unpaid', NULL, NULL, NULL, '245000', 4655000, '2024-02-28 21:08:39', '2024-02-28 21:08:39'),
(1116638117, 2, 33, 'Kadaluarsa', 'bank_transfer', 'bni', '8578038459715966', '145000', 2755000, '2024-03-09 00:30:24', '2024-03-10 00:31:37'),
(1159854859, 1, 24, 'Kadaluarsa', 'bank_transfer', 'bni', '8578783328354441', '245000', 4655000, '2024-03-01 02:14:58', '2024-03-02 02:16:21'),
(1518959268, 3, 51, 'Paid', 'qris', NULL, NULL, '0', 450000, '2024-05-27 00:27:52', '2024-05-27 00:28:46'),
(1524333036, 1, 23, 'Paid', 'echannel', NULL, NULL, '0', 4900000, '2024-03-05 20:23:16', '2024-03-05 20:24:51'),
(1540465507, 3, 58, 'Unpaid', NULL, NULL, NULL, '0', 450000, '2024-06-01 03:42:40', '2024-06-01 03:42:40'),
(1653147237, 2, 19, 'Paid', 'echannel', NULL, NULL, '145000', 2755000, '2024-03-05 18:05:30', '2024-03-05 18:07:35'),
(1654894621, 1, 24, 'Kadaluarsa', 'bank_transfer', 'bni', '8578938118030948', '245000', 4655000, '2024-03-01 02:21:54', '2024-03-02 02:24:21'),
(1693664284, 3, 32, 'Kadaluarsa', 'bank_transfer', 'bni', '8578775253773024', '0', 450000, '2024-05-29 23:45:17', '2024-05-30 23:47:04'),
(1705135354, 2, 10, 'Paid', 'bank_transfer', 'bri', '124127441914348535', NULL, 20000, '2024-01-13 07:39:15', '2024-01-13 07:40:39'),
(1732405710, 3, 49, 'Paid', 'bank_transfer', 'bri', '124124011952072575', '0', 450000, '2024-05-12 23:11:37', '2024-05-12 23:12:24'),
(1768379404, 2, 33, 'Unpaid', NULL, NULL, NULL, '145000', 2755000, '2024-03-08 23:04:00', '2024-03-08 23:04:00'),
(1793193089, 2, 19, 'Kadaluarsa', 'echannel', NULL, NULL, '145000', 2755000, '2024-02-29 00:34:32', '2024-03-01 00:50:45'),
(1819417824, 3, 10, 'Unpaid', NULL, NULL, NULL, '100000', 500000, '2024-06-01 10:19:45', '2024-06-01 10:19:45'),
(1955208705, 3, 56, 'Paid', 'bank_transfer', 'bni', '8578873480172238', '0', 450000, '2024-05-29 23:38:14', '2024-05-30 00:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('aliciasundari4@gmail.com', '$2y$10$60UiS44kSg7wu3Kx.cBIfOT.PzEqkD6aA1IBkP06bC3xsekrGHnHe', '2024-04-25 09:23:43'),
('fachriamtriani@gmail.com', '$2y$10$w7TiRoZxMa/rbVmCx0Shi.KbmycNNA1OMYTAr9VLgnnwsmnh3ynva', '2024-04-25 03:13:20'),
('fadilanurjanah56@gmail.com', '$2y$10$YWtRClFJKI0HLdpBIZLtc.ZNT28DDlX.38kbXoTBZCi8wvGENUwES', '2024-06-01 03:34:20'),
('nurwaidahh@gmail.com', '$2y$10$BEwlTZ9xG9ZyZVUR/dOlReu2C5mdA5JRXrckenG23NogAHCBwiGBC', '2024-04-27 16:47:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_desc`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'WPPE', 'Wakil Perantara Pedagang Efek (yang selanjutnya disingkat WPPE) adalah perseorangan yang bertindak mewakili kepentingan Perusahaan Efek yang melakukan kegiatan usaha sebagai Perantara Pedagang Efek', 4900000, NULL, NULL),
(2, 'WPPE-P', 'Wakil Perantara Pedagang Efek Pemasaran (WPPE-P) adalah perseorangan yang bertindak mewakili kepentingan Perusahaan Efek yang melakukan kegiatan usaha sebagai Perantara Pedagang Efek khusus kegiatan pemasaran. ', 2900000, NULL, NULL),
(3, 'Special Class', '-', 600000, '2024-01-26 00:42:28', '2024-01-26 00:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8BTjWy1x7edhXFuY76D8MNyxNTiS9ukEiNdc7vxo', NULL, '172.85.102.54', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.5112.79 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRVhKZWRUaXZnS0hFOFpQU01LUDZOM0ZVSUtHcEdqalpncWdsOHIzMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9zaWctZ3JvdXAuY28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718994929),
('Cek5uyNMLjLnEvpYNaLvlRvipi0cSvMe2rdxmwy5', NULL, '198.235.24.219', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customers&#39; presences on the Internet. If you would like to be excluded from our scans, please send IP addresses/domains to: scaninfo@paloaltonetworks.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUTlWUW5uclpzb1htRWlRdjlMRXE1eVlCTW9LWUtOanBNbnk3MXAxaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9zaWctZ3JvdXAuY28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718928246),
('CflpWT9BBj6qQlx6JOoHEb3KwZxG6W8yU3It87gC', NULL, '66.249.79.32', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.6422.175 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQmlBTEdScVg0YW9Tb3VTSWZVRHBMbXFmT0NJZjZaVmVkaDBXYmZhcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LnNpZy1ncm91cC5jby5pZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718940151),
('EUEoJXKvS8IcKX3w49cLzNRtPvVsa9eVsiSMrC2K', NULL, '199.34.87.13', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMzlEMXRvcGNVNHpiMzdnTWJDbTBzczdPTWdpUGp2MHd4NVZ4NHVXSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lnLWdyb3VwLmNvLmlkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1718988693),
('fPm6OFJAVi3MoqhnAoVEKyD9r4Xn25pILRP0JdN8', NULL, '2a03:2880:ff:6::face:b00c', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUURtVVQ1WGkxSUZsYzIwVFY4d3pIellBRkF5b3owMGtxcnd5V0RHbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lnLWdyb3VwLmNvLmlkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1718864184),
('gG2JBvMTcnzbhgwzA3Zru1oJNd383dsC3U38JTMG', NULL, '54.88.179.33', 'Mozilla/5.0 \\(Windows NT 10.0\\; Win64\\; x64\\) AppleWebKit/537.36 \\(KHTML, like Gecko\\) Chrome/100.0.4896.60 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUHR2RllGNHNrQklYN1RoNVhJemlONE1DcTFSYUgwTUs5eWJDVE9LcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LnNpZy1ncm91cC5jby5pZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1719017780),
('hEEfArvLC5PB5C4WHefCVa59OIaFzJkga4a1Ex0v', NULL, '87.236.176.214', 'Mozilla/5.0 (compatible; InternetMeasurement/1.0; +https://internet-measurement.com/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZEZVZkJHY1M2VWQxbDRCUm1kRFR4ZzB3RmpRQVNxcGwzV0FhMG1DTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9zaWctZ3JvdXAuY28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718994442),
('i3JEBWnDSBKP1RWjURAfZgmbER5xmzvNJs5nn9Z0', NULL, '31.13.115.4', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidlFzcHVsdHpFTVNRUHJWdHE0c3EwTHc5RzR6TkZNQlAzdUVCdjVVNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lnLWdyb3VwLmNvLmlkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1718849186),
('i9tNcRwfmXXRvkvb9GHUkf8N96mRasDqDxT39Yhn', NULL, '2a03:b0c0:2:d0::1576:8001', 'Mozilla/5.0 (compatible; InternetMeasurement/1.0; +https://internet-measurement.com/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaUI5cVVtZFo2RnFNeXFRSjM5c0Y3RW1tVmhRc0p3bXI3dHB3U3RyUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9bMjAwMTpkZjA6MjdiOjI6Ojg6NDI3ZF0iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718968051),
('IvqDjP6oyOohWf3iU1k7qF34ecdnxRl6tCa1jyDz', NULL, '103.247.9.9', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTloUnFYV012a0ttTHBDMEV5U1lVU2hvenRRUm9XNjlDb25Ibjk1TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9zaWctZ3JvdXAuY28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718934553),
('j2B6akULTwmU6C7kKpARmVHSuOCK6cYduVEzQ0eK', NULL, '66.249.65.160', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.6422.175 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZWlZVWlhMTROMG8wZEJrRVFzajRxb1Z6SXE4dWRCMk40MnFHUmRIeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly93d3cuc2lnLWdyb3VwLmNvLmlkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1718866899),
('JgsIZFookqAhgLpNecQkx0aSOHXvVNUSAVsgvUKj', NULL, '146.190.23.114', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiREFBR1JxeEtseW04eHNyd2RUVnFtRjZSVlRPZ2pwbFpONnBzME81TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9zaWctZ3JvdXAuY28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718981047),
('NjoVQU8H8stclAZAwyvmmMf3mUZey51EqDqEdafT', NULL, '140.213.219.174', 'Mozilla/5.0 (Linux; Android 11; CPH2239 Build/RP1A.200720.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/125.0.6422.165 Mobile Safari/537.36 Instagram 330.0.0.40.92 Android (30/11; 272dpi; 720x1453; OPPO; CPH2239; OP4F2F; mt6765; in_ID; 596227461)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOGd6dFhzUnNScXU4ZjZ3UUZHMVIyR0VldndjU3ZOTGhWRUhJaDJQSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTUwOiJodHRwOi8vc2lnLWdyb3VwLmNvLmlkL1NwZWNpYWxDbGFzc1NJRz9mYmNsaWQ9UEFaWGgwYmdOaFpXMENNVEVBQWFZbGxTNlM4a3lsS0RDaUVRNmxWSmNRdXliUld3MHUzNVFjSzBUdUgtazVmb2FNNUJCaTRSV3lKVVVfYWVtX3JwcHRYZzMxY1kwcENvTWc0bUFXcEEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1719011808),
('NzbVw6fgTVAJTKoSr6coG5cmguHWhgkdj9Gvdhji', NULL, '103.247.9.9', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNjVvWG16MjVHbE1VMUVOVjNlMlhpRnpQTHV0aG1oUmk5Wk9xMVpneSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9zaWctZ3JvdXAuY28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718845682),
('oYUKHGOd7N2RWCk4jebmxyFCvESN5pTo4dA8CLkw', NULL, '35.171.144.152', 'Mozilla/5.0 \\(Windows NT 10.0\\; Win64\\; x64\\) AppleWebKit/537.36 \\(KHTML, like Gecko\\) Chrome/100.0.4896.60 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY2daeDJibldRNUl0bnZDT0RsQ1Z3V1FKTU1tc3YxZ25qN214UlZtdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lnLWdyb3VwLmNvLmlkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1719017778),
('pF1A3Pt0q2GiOQ3of0VxyWyOXSBvHNVEaSs09MtE', NULL, '3.137.210.126', 'python-requests/2.32.3', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiVG83NVV5cWxid3J6N0pqc2pmWUk3OFd3ZzJOeVBEVmJLazRuOFVveiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1718980617),
('PytYOrsfnFVkkgMqoWEj1LwNFAsEBfen8IxYeXtH', NULL, '2a00:6800:3:7bc::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36 Edg/91.0.864.54', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXg0Zm56RXZxRWxDMFFIZUlMQ3MzVGRrT3BINHR2eE1aQ2ZUT3JVYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9zaWctZ3JvdXAuY28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718869094),
('QdYfR2yLVRnXCXE5WRaAgMS7dcaALd7T9bMXuKqM', NULL, '54.189.51.153', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.4 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTGNpbThQQUNialVNZmZZc0dCeXRxekpaenhYZW9tUDZSWDBOdXlyTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9zaWctZ3JvdXAuY28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718875960),
('qKEsdLUwnwfyFs7jk0BhtDBwfffFmqgFSCRvgswj', NULL, '114.5.209.40', 'Mozilla/5.0 (Linux; Android 8.1.0; CPH1803 Build/OPM1.171019.026; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/113.0.5672.76 Mobile Safari/537.36 Instagram 334.0.0.42.95 Android (27/8.1.0; 320dpi; 720x1424; OPPO; CPH1803; CPH1803; qcom; in_ID; 606558529)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieGxweW85SEpBZENudVdNTjVua3hnNEZFaDdCWk8xcmw3ODRtcW5OZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTUwOiJodHRwOi8vc2lnLWdyb3VwLmNvLmlkL1NwZWNpYWxDbGFzc1NJRz9mYmNsaWQ9UEFaWGgwYmdOaFpXMENNVEVBQWFZMDhYQ1ZTaXNIajlLQUpQNUhIQ3l5RTVweVJ1bVRFZDYxVDJxOXM4ank1bnpLQV9EQ0QwM0J1M2tfYWVtX1ptRnJaV1IxYlcxNU1UWmllWFJsY3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718981421),
('rhdPbYxYNHmJCC64kgdyw9VFYEeHVLfkg2WB8Gvt', NULL, '54.88.179.33', 'Mozilla/5.0 \\(Windows NT 10.0\\; Win64\\; x64\\) AppleWebKit/537.36 \\(KHTML, like Gecko\\) Chrome/100.0.4896.60 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibEVNbHZ1NVdjenhRMERZa2RjRk1NRjFla2hBYVpZa20zUzRRV0l3ViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9zaWctZ3JvdXAuY28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1719017782),
('rsMbXZRLh2SJvXa1jl8vWBxglkPXHIPK35B04dqY', NULL, '103.136.57.149', 'Mozilla/5.0 (Linux; Android 12; SM-A025F Build/SP1A.210812.016; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/125.0.6422.165 Mobile Safari/537.36 Instagram 336.0.0.35.90 Android (31/12; 280dpi; 720x1471; samsung; SM-A025F; a02q; qcom; in_ID; 612068881)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR3hteWlxaVZLcmFUTGhyU1YxbzdhVnN2YWpNak9xaVBjUzU1RTBmRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9zaWctZ3JvdXAuY28uaWQiO319', 1718967204),
('s7o078UwVFdwDft1o00KLZH5jo9ovbeeE8OJPtfT', NULL, '103.247.9.9', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNkt3MXVsTmJaRlBkUDZkeUhmSVM0aGpWczF5TlRmNEFaRGVaTENXcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9zaWctZ3JvdXAuY28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1719019660),
('SbknpmsqIUeztlsVdXKRtEgTkhXGv1mPSQnWwQwj', NULL, '198.235.24.198', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customers&#39; presences on the Internet. If you would like to be excluded from our scans, please send IP addresses/domains to: scaninfo@paloaltonetworks.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQzRVbmFIWnpRb2NIZ2NrbVRMdG41SDR5SmRXMHg4elo0SExORW1KdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly93d3cuc2lnLWdyb3VwLmNvLmlkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1718999443),
('t0GVC4NSU3akaLNpRA8XMeuVkaiDwVc3QWTguFhs', NULL, '31.13.115.9', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTDB6WjJpbW5vb0h2aHFkU1ZDWmN0MzNNTFE3QkhmTVdVS0xBeTAxWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lnLWdyb3VwLmNvLmlkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1718849188),
('UZh4Zh3kaStsuc1Vwypi4KojYT7TRT7h5w7UqS2g', NULL, '168.91.11.10', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieU4wSndhNUdScHZQYUFOV3VCM0hxem11S0dlU3VseWkzc0xNTkMxUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lnLWdyb3VwLmNvLmlkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1718912889),
('V8B5pJZlhe7fJdj2oPWR6LMWuXuIpylwAwaOnHEM', NULL, '52.200.211.223', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMWdNSDR3M083OFNjMkwzQ3ZIMk1TUGo0UzF4Z0twendaTzZuRjZidSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1718877726),
('w9SDBO26xDPzsr9lKxEMXZtaEh8YdTzxjNxQDgor', NULL, '198.235.24.225', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customers&#39; presences on the Internet. If you would like to be excluded from our scans, please send IP addresses/domains to: scaninfo@paloaltonetworks.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTnQ0OE45cktaWWQyRWN6RlZjTTRCYzFMV3JrTVJLSHl3UUxmV2FkSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lnLWdyb3VwLmNvLmlkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1719005873),
('Wntai5bNq0UJBu1TjBiVtt6EAkgXN9ks8y19tfsR', NULL, '170.82.0.38', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.5112.79 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNnpRWGxNRFFJYXFBTHp5MEpOUThVdnBuZUtTNDFyYjJEdWdJc0RabiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9zaWctZ3JvdXAuY28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718901860),
('XVqWrkURPGFlZtZ67VGdXAqtGkGExQgaBRKVlS3w', 56, '103.136.57.137', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Mobile Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoianJjcWtWa3hjNVhTdmFzZGpqWHFjYVZ3eHJpdzVKU3JneXpYY21YYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vd3d3LnNpZy1ncm91cC5jby5pZC9TcGVjaWFsQ2xhc3NTSUciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTY7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkbFpUdlk2MkFKektSTDN2and1Y3EvLk03RS5hb2JOemJuclhkNEE4a2VFSFlmVGVBdklzL0MiO30=', 1718967305),
('YK6yEiDE145biPvnXH0qLTlXrjPizP9HtBwWlGzS', NULL, '146.190.23.114', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY3BrVTlTc1Ftb1I4c3A3WW5CRmMzMERmYWlUZ0pCYnNHZE9VcU83UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vc2lnLWdyb3VwLmNvLmlkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1718981051),
('ZoF9V72Ze0Xb7lnYpQNCmlDN8sCLUHDfgqRkbxMX', NULL, '54.69.56.27', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.4 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYzltWE5hSUpTNGJkV3hkU2tlOFM3Q3AwZzJQOXBqMUpRcnhFNUMxUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9zaWctZ3JvdXAuY28uaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718877917);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `utype` varchar(255) NOT NULL DEFAULT 'USR',
  `used_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `alamat`, `utype`, `used_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(10, 'Muhamad Fachrizal', 'zalzlucile@gmail.com', '2024-01-07 06:22:36', '$2y$10$dOVTS3VMJ5E7vrBQjsJRiu53dawsrRXczqklijf.H002Ss5n.xMjW', '085155192230', 'Jln.Karang Tineung Indah no 28', 'ADM', NULL, 'yvMbukoZqj8AxwR8grlJwuEdY9RoIeTj3lrRE9xGLljkaef98BdlOaVNEhpd', NULL, NULL, '2024-01-07 06:22:03', '2024-04-25 09:14:36'),
(11, 'Marsal Muhamad Dejan', 'mmuhamaddejan@gmail.com', '2024-01-09 03:32:51', '$2y$10$cDRhg9gAWnVfO8VaAKGrpe9Otr4UXaqvhEb6CL2lbITjor7buq10y', '0871817155566', 'Cibubur', 'ADM', NULL, NULL, NULL, NULL, '2024-01-09 03:31:42', '2024-01-09 03:32:51'),
(13, 'Yudhistira Pramana Andaka', 'yudhis.andaka@gmail.com', NULL, '$2y$10$RQ6PjS8z/gdOi6JHRsi2Z.sT2PvoMgLLYX6e.PEo.hlrNZ7KSsgXO', '085225444088', 'Jln. Krakatau no.1 RT.001 RW.008, Kel. Kabupaten, Kec. Klaten Tengah, Jawa Tengah', 'USR', NULL, NULL, NULL, NULL, '2024-02-07 06:21:39', '2024-02-07 06:21:39'),
(14, 'Muhammad Yafis', 'myafis131001@gmail.com', '2024-02-07 23:37:41', '$2y$10$1bBHAYqF.DqM7P96TAg7j.bYseyO1OujWoTHgWHRTewtoRZC8V5Ie', '082376869660', 'Jl babakan Dangdeur', 'USR', NULL, NULL, NULL, NULL, '2024-02-07 23:37:18', '2024-02-07 23:37:41'),
(15, 'Hisyam Naufal', 'hisyamnfl5@gmail.com', NULL, '$2y$10$4eKEn3DQMF1lXyEdm85ZOuuWZ9HP6KbH0bWDloyyQ2RAVu1hPgiVS', '081313626577', 'Jl Teguh VII', 'USR', NULL, NULL, NULL, NULL, '2024-02-08 10:30:41', '2024-02-08 10:30:41'),
(16, 'Aji Nuryana', 'ajinuryana47@gmail.com', '2024-02-23 23:14:24', '$2y$10$ZjW0cSYhfoxZPUZtWPem0.SnWzlMPuVoKF5q9V6EMKUvRegnTZfKC', '085695328171', 'Jl. Cirapuhan Dago Atas No. 54 RT. 07/01 Kel. Dago Kec. Coblong Kota Bandung', 'USR', NULL, NULL, NULL, NULL, '2024-02-16 23:34:24', '2024-02-23 23:14:24'),
(17, 'Nita Apriliani', 'nitabeneran@gmail.com', '2024-02-25 07:10:24', '$2y$10$RsSjM1erHYq5jZo64LePnu6ApDKZaWlEsoM8e61C0reoIUExICGNS', '082127151648', 'bandung', 'USR', NULL, NULL, NULL, NULL, '2024-02-25 07:09:24', '2024-02-25 07:10:24'),
(18, 'Nayopaya Destha', 'nayoopa@gmail.com', '2024-02-27 20:48:28', '$2y$10$4sLt2Q5wli79RYYCxOcJyeaoJuyvIny2w.yDDO.uxYpXLGC2.Xr5y', '085155085151', 'Jl. Gegerkalong No. 4', 'USR', NULL, NULL, NULL, NULL, '2024-02-27 20:48:11', '2024-02-27 20:48:28'),
(19, 'Muhammad Denay Pramudya', 'denaypramudya2@gmail.com', '2024-02-28 08:07:05', '$2y$10$TVL2IM0SmSCfoTQLtJ.9t.8K7jqCLtzKCK.HW6BACXLW6OAfos8Yu', '082246039858', 'Jl Raya Kembangan No 73', 'USR', NULL, NULL, NULL, NULL, '2024-02-28 08:05:45', '2024-02-28 08:07:05'),
(20, 'Agus Supriadi', 'agoess40@gmail.com', '2024-02-28 21:05:28', '$2y$10$R4GAoTFn4uUbuNIKJUhWKOfOe6Qj4/Z8Z/mquDXKAPJo4SUhOfgX.', '081321030537', 'Perumahan Gramapuri Tamansari Blok G7/6 RT. 006/037 Kel. Wanasari Kec. Cibitung, Kab. Bekasi 17520', 'USR', NULL, NULL, NULL, NULL, '2024-02-28 20:34:36', '2024-02-28 21:05:28'),
(21, 'della Kartikasari', 'dellakartikas10@gmail.com', '2024-02-28 20:39:34', '$2y$10$J0mFqDZpfzaYedUnreE2OOQK7YnMnYGxSQcv.ZIX5US.gF8rPCfVa', '082135360547', 'apartemen Puri Park View, Jakarta Barat', 'USR', NULL, NULL, NULL, NULL, '2024-02-28 20:38:34', '2024-02-28 20:39:34'),
(22, 'Junianti Endah Sari', 'junianty02@gmail.com', '2024-02-28 20:59:14', '$2y$10$zGiH7YM/kdrrjXy4ppy2TeiqSTuF7.LW5PU.HRlA2nK3UwgpivFSi', '085281145774', 'jL. H yamin RT003/001 no 77 Kel. Petukangan Utara Kec. Pesanggrahan Jakarta Selatan 12260', 'USR', NULL, NULL, NULL, NULL, '2024-02-28 20:57:24', '2024-02-28 20:59:14'),
(23, 'NAUFAL QOIS', 'naufalqois7@gmail.com', '2024-02-29 00:41:32', '$2y$10$7ZGvPJzhoxgifpYISz1lvuiY.pVwuQgE5ghQfGvyJu4iX3jVoE5ea', '085921777367', 'Jl kecubung', 'USR', NULL, NULL, NULL, NULL, '2024-02-29 00:41:12', '2024-02-29 00:41:32'),
(24, 'Isep Bambang Kurniawan', 'isepbambangkurniawan@gmail.com', '2024-03-01 02:10:21', '$2y$10$2AfkRPZ.UHJo6QYpZgqbDOqo/gDm4eFrewHEJ2qeY2/ApCRBBeWQm', '085846437417', 'Tasikmalaya', 'USR', NULL, NULL, NULL, NULL, '2024-03-01 01:13:04', '2024-03-01 02:10:21'),
(27, 'Muhammad Zumar', 'zumarketum17@gmail.com', '2024-03-01 09:55:51', '$2y$10$m5GKpAr1WKIRxAeFiZ0Jk.L/0OZSihEp7awVcDW6OB1116CtIpJme', '085157044735', 'Blok Kemped RT 02 RW 04 Desa Wirakanan Kec. Kandanghaur Kab. Indramayu 45254', 'USR', NULL, NULL, NULL, NULL, '2024-03-01 09:53:30', '2024-03-01 09:55:51'),
(28, 'Nicholas Aditya', 'nicho.aditya@gmail.com', '2024-03-02 21:31:03', '$2y$10$7ODB5QOl83iU6FettETDieq4lLuWiwcMDMtC2JUS/G/RyqVPURxs6', '085320040979', 'Jalan setrasari 6 nomor 2e bandung', 'USR', NULL, NULL, NULL, NULL, '2024-03-02 21:30:08', '2024-03-02 21:31:03'),
(29, 'Fradha Albyansyah', 'fradhaalby@gmail.com', '2024-03-04 07:25:12', '$2y$10$7ZygDEod9BMchaidw0IT/uMZMLkGKljP3nai8tkx.Wl3NsLT5kWPS', '082164870033', 'Bandung', 'USR', NULL, NULL, NULL, NULL, '2024-03-04 07:23:47', '2024-03-04 07:25:12'),
(30, 'Mahadir Arif', 'arifmahadir0@gmail.com', NULL, '$2y$10$9WV4I.W2gdbeSsUMbU50k.CiXwo8Vv2ciMPxt6Bit9rCzALlUhaaK', '082165008500', 'Medan Polonia', 'USR', NULL, NULL, NULL, NULL, '2024-03-04 07:34:23', '2024-03-04 07:34:23'),
(32, 'Nur Waidah', 'nurwaidahh@gmail.com', '2024-03-05 21:54:36', '$2y$10$A7GM3BKh.PeuDKu6ehUN4u40fE1agsupO/pIM1Q4uqGICSvcAoWDu', '+628984498109', 'Bekasi', 'ADM', NULL, NULL, NULL, NULL, '2024-03-05 21:53:29', '2024-03-05 21:54:36'),
(33, 'Irwanda Anggara Putra', 'irwandaanggara@gmail.com', '2024-03-06 04:28:14', '$2y$10$xI3IG2Cf8YePju3jUIi2qO6eRof5yAp6e20MhUrfPBawgrq.Zyyhq', '089606093327', 'Perum Karawang Jaya', 'USR', NULL, NULL, NULL, NULL, '2024-03-06 04:25:31', '2024-03-06 04:28:14'),
(34, 'midtrans', 'hd722875@gmail.com', NULL, '$2y$10$oM1TcnytME8kTzDQWYHR3uAFkTuvDkvZBvnwe2aTnEq3nqpEIVBPm', '085162987101', 'JAKARTA', 'USR', NULL, NULL, NULL, NULL, '2024-03-08 02:06:20', '2024-03-08 02:06:20'),
(35, 'Imam Syafi\'i', 'imamsyafiigo@gmail.com', NULL, '$2y$10$LtA9VL/H15FOUZ8p7AH3Ue2O1SKoXZftlrzWjkMzVGfHHIzQ1VfiC', '08567553430', 'Dukuh kawakan desa cendono rt01 rw09 dawe kudus', 'USR', NULL, NULL, NULL, NULL, '2024-03-23 03:01:00', '2024-03-23 03:01:00'),
(42, 'Alis', 'aliciasundari4@gmail.com', NULL, '$2y$10$41BF5OB0Nz6LeFslMMXmYeAX/ywusl5rxpu6/8tfnACaTdYfsVCQm', '08123', 'bbb', 'USR', NULL, NULL, NULL, NULL, '2024-04-25 07:29:05', '2024-04-25 07:29:05'),
(43, 'Giki', 'anggunggigih@gmail.com', '2024-04-25 09:33:04', '$2y$10$xh.XjKG8.ZHRZfWvzKoibOsKWuWUEw3DubEcLxVh4MRWznSkd3JYy', '081802065427', 'Jakarta', 'ADM', NULL, '5Tqou1sGmYLhkY3sJoPMvP9lYzIXDovFb7LoTjEuJBANkQfx2aJOyDYl2q5g', NULL, NULL, '2024-04-25 09:32:42', '2024-05-05 08:14:34'),
(46, 'Cahiyono', 'cahiyonocr7@gmail.com', '2024-05-01 06:13:59', '$2y$10$XHbnh3/5cbO.6VbWCsw1JurGzKR3exbEP7IllULKOJ41VfydCwlJu', '1234', '12345', 'USR', NULL, NULL, NULL, NULL, '2024-05-06 06:49:53', '2024-05-06 06:49:53'),
(47, 'Ahmad Fauzan Sirait', 'ahmadfauzansirait17@gmail.com', '2024-05-06 07:32:27', '$2y$10$wSy8L0ZVttCDerpge2t8tuFrF.vcoaOM8GLtX.BeKM9lm3mYOXdPa', '087815433710', 'Jl. Amal Luhur Gg. Kuini No.7 Medan', 'USR', NULL, NULL, NULL, NULL, '2024-05-06 07:32:03', '2024-05-06 07:32:27'),
(48, 'Melly Siti Maryam', 'msitimaryam24@gmail.com', '2024-05-12 19:34:40', '$2y$10$5bLTPRafsFohOKtFOxg0Me6gBQbyj2LlNAyWRTWMNKO1mgnMkMl.u', '081312803063', 'Bandung', 'ADM', NULL, NULL, NULL, NULL, '2024-05-12 19:33:47', '2024-05-12 19:34:40'),
(49, 'Muhammad Raihan Alwany', 'raihanalwany11@gmail.com', '2024-05-12 23:02:31', '$2y$10$oZPa.26hGKbf44qLOFO3XuXa0QMsdpJ46gxbobvkQBU8Un.oeVSBG', '081227926279', 'Cirebon, Jawa Barat', 'USR', NULL, NULL, NULL, NULL, '2024-05-12 23:00:52', '2024-05-12 23:02:31'),
(50, 'Marhali', 'sahammarhali@gmail.com', '2024-05-13 01:24:33', '$2y$10$/aO/23lMQF2WaW978vulB.xHJoaoJxJO1ltwIKaxj9WzD/HqmGTwi', '0811945175', 'Jl. Masjid Jami Al Akhyar No 54 RT 40 RW 02 Kelurahan Gandul Kecamatan Cinere Kota Depok', 'USR', NULL, NULL, NULL, NULL, '2024-05-13 01:22:00', '2024-05-13 01:24:33'),
(51, 'Siti Fatiyah Zahirah', 'fatiyahzahirah99@gmail.com', '2024-05-20 01:23:45', '$2y$10$Ju5XlzuoYr2HUuafPf5VXuc.tpNg2pIAzTbe1hg03d2l/7JkB7ILq', '085738492785', 'Jatinangor', 'USR', NULL, NULL, NULL, NULL, '2024-05-20 01:23:22', '2024-05-20 01:23:45'),
(52, 'Muhammad rizky Dhypo prabowo', 'rizkydhypo@gmail.com', '2024-05-23 04:07:29', '$2y$10$Cl9JFLtvWMYo4qGc4410RemM1crFifP/2BYdJGMFWXcZtt1/JZW06', '085624022072', 'Jalan bungursari IV no 96', 'USR', NULL, NULL, NULL, NULL, '2024-05-23 04:05:21', '2024-05-23 04:07:29'),
(53, 'Abdul Latif Khair Damanik', 'abdullatifkhair@gmail.com', '2024-05-26 21:18:58', '$2y$10$/ZcWIFGjBsncayOin.hI7OuVmY1.gglHCYEdyPu0ocaUe3MJchXgW', '081265960347', 'Antapani, Kota Bandung', 'USR', NULL, NULL, NULL, NULL, '2024-05-26 21:18:03', '2024-05-26 21:18:58'),
(54, 'IKBAR SHAFAR ROBBANI', 'ikbarshafarrobbani@gmail.com', NULL, '$2y$10$H0ICbL.JX7IhYAd.IqDsHeknM2V8NHvzt8gmMdKA/caM8axZpxYr.', '085793751707', 'GG PA OMO NO. 37 RT02/02 Desa Lembang, Kec. Lembang, Bandung Barat (40391)', 'USR', NULL, NULL, NULL, NULL, '2024-05-28 04:40:29', '2024-05-28 04:40:29'),
(55, 'Aldira Alexis', 'aldiraalexis3749@gmail.com', '2024-05-29 01:26:38', '$2y$10$XxZ7CRVi5MgXNVUYXk8v0uY8Jv2O7zc.pBAtHK978Hq8VQfuPKqCK', '089666803804', 'cibiru', 'USR', NULL, NULL, NULL, NULL, '2024-05-29 01:26:08', '2024-05-29 01:26:38'),
(56, 'Muhammad Lutfan kamil Sidiq', 'lutfan.kamil@gmail.com', '2024-05-29 23:31:42', '$2y$10$lZTvY62AJzKRL3vjwucq/.M7E.aobNzbnrXd4A8keEHYfTeAvIs/C', '081217177296', 'Jl.Pancoran Barat 4 B No 40', 'USR', NULL, NULL, NULL, NULL, '2024-05-29 23:30:39', '2024-05-29 23:31:42'),
(57, 'Fadila Nurjanah', 'fadilanurjanah56@gmail.com', '2024-05-31 05:34:30', '$2y$10$RwHNpq.rJH7qO9GnafB59uBIVjADNsLME6NbGrI0m2vDjfnmXmqf2', '089627386307', 'Garut', 'USR', NULL, NULL, NULL, NULL, '2024-05-31 05:34:07', '2024-05-31 05:34:30'),
(58, 'fadila nurjanah', 'fadilanurjanah5@gmail.com', '2024-06-01 03:40:28', '$2y$10$bCtb1sqaKquEbT9eDK1sSOVHdB96U34JfMqqHr3IrOT9LE/x3KmOO', '089627386307', 'Garut', 'USR', NULL, NULL, NULL, NULL, '2024-06-01 03:40:02', '2024-06-01 03:40:28'),
(59, 'Virly Kania Puteri', 'virlykania1@gmail.com', NULL, '$2y$10$U0vuBut1Ui9GCjEQ3L3DGuGBWT8wyQIf/yXqOL4ZYDH9pNF5FC3Py', '081291650275', 'Kp.tegal danas', 'USR', NULL, NULL, NULL, NULL, '2024-06-10 04:50:35', '2024-06-10 04:50:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_product_id_foreign` (`product_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2116704850;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
