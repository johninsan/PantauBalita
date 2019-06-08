-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2019 pada 17.16
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pantaubalita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'oboy', 'oboyoy', '$2y$10$x6g39O6eFB33hocBG.On/umeTozhHV3GPSrlhGZdO0QACwnJEGXYO', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `balitas`
--

CREATE TABLE `balitas` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` datetime NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlfoto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `JK` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1 Laki 2 Perempuan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `balitas`
--

INSERT INTO `balitas` (`id`, `user_id`, `nama`, `pob`, `dob`, `foto`, `urlfoto`, `JK`, `created_at`, `updated_at`) VALUES
(1, 5, 'Aurora', 'Bekasi', '2018-11-16 00:00:00', '499108714.jpg', 'http://localhost:8000/uploads/foto499108714.jpg', '2', '2019-05-11 04:48:40', '2019-05-11 04:48:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Gizi', 'Gizi', '2019-05-03 14:22:15', '2019-05-03 14:22:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_posts`
--

CREATE TABLE `category_posts` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `category_posts`
--

INSERT INTO `category_posts` (`post_id`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 1, '2019-05-18 23:51:01', '2019-05-18 23:51:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_07_16_064023_create_posts_table', 1),
(4, '2017_07_16_065642_create_categories_table', 1),
(5, '2017_07_16_065716_create_tags_table', 1),
(6, '2017_07_16_070309_create_category_posts_table', 1),
(7, '2017_07_16_070600_create_post_tags_table', 1),
(8, '2019_02_25_122928_yajra', 1),
(9, '2019_03_31_051656_create_rw_table', 1),
(10, '2019_03_31_051705_create_posyandus_table', 1),
(11, '2019_04_08_064650_create_balitas_table', 1),
(12, '2018_04_17_125436_pesan', 2),
(13, '2018_04_17_125747_pesan_header', 2),
(14, '2019_05_05_074624_create_tipeusers_table', 3),
(15, '2018_10_02_033210_create_roles_table', 4),
(16, '2018_10_02_033407_create_permissions_table', 4),
(17, '2018_10_04_034733_create_role_user_table', 4),
(18, '2019_05_12_043416_create_admins_table', 5),
(19, '2019_06_08_034805_create_monitors_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitors`
--

CREATE TABLE `monitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `balita_id` int(10) UNSIGNED DEFAULT NULL,
  `kode` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `umur` float DEFAULT NULL,
  `beratbadan` float DEFAULT NULL,
  `hasil` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `urlfoto` text COLLATE utf8mb4_unicode_ci,
  `gb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'gizi buruk',
  `gk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'gizi kurang',
  `s` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'sehat',
  `gl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'gizi lebih',
  `o` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'obesitas',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `monitors`
--

INSERT INTO `monitors` (`id`, `balita_id`, `kode`, `umur`, `beratbadan`, `hasil`, `foto`, `urlfoto`, `gb`, `gk`, `s`, `gl`, `o`, `created_at`, `updated_at`) VALUES
(5, 1, NULL, 4, 7.2, '0.42777777777777776', NULL, NULL, '0', '0', '0', '0', '0', '2019-06-07 21:51:08', '2019-06-07 21:51:08'),
(7, 1, NULL, 4, 7.2, '0.42777777777777776', NULL, NULL, '0', '0', '1', '0', '0', '2019-06-08 03:14:14', '2019-06-08 03:14:14'),
(8, 1, NULL, 29, 11.3, '0.30771367521367526', NULL, NULL, '0', '1', '0', '0', '0', '2019-06-08 03:14:52', '2019-06-08 03:14:52'),
(9, 1, '6YYHwkpb9hhCc45pN9mfsG5UXqzLZP', 30, 15, '0.37840909090909086', NULL, NULL, '0', '1', '0', '0', '0', '2019-06-08 03:24:09', '2019-06-08 03:24:09'),
(10, 1, 'AhL78n2qEFiznmaYrWF8FCUCjRC6KS', 30, 15, '0.45', NULL, NULL, '0', '0', '1', '0', '0', '2019-06-08 03:28:15', '2019-06-08 03:28:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `for` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `for`, `created_at`, `updated_at`) VALUES
(1, 'inbox-petugas', 'pesan', '2019-05-10 00:14:39', '2019-05-10 04:22:32'),
(2, 'category-crud', 'article', '2019-05-10 04:15:22', '2019-05-10 04:15:22'),
(3, 'posyandu-crud', 'others', '2019-05-10 04:15:39', '2019-05-10 04:15:39'),
(4, 'inbox-ortu', 'pesan', '2019-05-10 04:22:48', '2019-05-10 04:22:48'),
(5, 'tag-crud', 'article', '2019-05-10 04:35:22', '2019-05-10 04:35:22'),
(6, 'article-crud', 'article', '2019-05-10 05:37:36', '2019-05-10 05:37:36'),
(7, 'balita-crud', 'others', '2019-05-10 05:38:26', '2019-05-10 05:38:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(2, 4),
(2, 7),
(3, 1),
(3, 2),
(3, 5),
(3, 6),
(3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim_id` int(10) UNSIGNED NOT NULL,
  `penerima_id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `kode`, `pengirim_id`, `penerima_id`, `judul`, `pesan`, `created_at`, `updated_at`) VALUES
(1, '158952', 5, 6, 'hasil monitor', 'Assalamualaikum pak, dari hasil monitor anak saya dinyatakan ada masalah pada gizi apa yang harus saya lakukan?', '2019-05-10 22:02:37', '2019-05-10 22:02:37'),
(3, '158952', 6, 5, 'hasil monitor', 'harap di berikan buah-buahan dan susu lebih untuk anak', '2019-05-13 10:24:18', '2019-05-13 10:24:18'),
(5, '158952', 5, 6, 'hasil monitor', 'baik, terimakasih pak', '2019-05-13 10:27:18', '2019-05-13 10:27:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_header`
--

CREATE TABLE `pesan_header` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesan_header`
--

INSERT INTO `pesan_header` (`id`, `kode`, `created_at`, `updated_at`) VALUES
(2, '158952', '2019-05-10 22:02:37', '2019-05-10 22:02:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `posted_by` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `subtitle`, `slug`, `body`, `status`, `posted_by`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Gizi', 'gizi balita', 'gizi', '<p style=\"text-align:center\"><span style=\"font-size:14px\">Gizi Balita</span></p>\r\n\r\n<p>Kesehatan gizi balita adalah hal yang perlu di perhatikan</p>', 1, NULL, 'public/xVhfs3ynujJ1f1zfPoW7yoOzI19ezSNfe6eYHVV3.jpeg', '2019-05-18 23:51:01', '2019-05-18 23:51:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_tags`
--

CREATE TABLE `post_tags` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `post_tags`
--

INSERT INTO `post_tags` (`post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(2, 1, '2019-05-18 23:51:01', '2019-05-18 23:51:01'),
(2, 2, '2019-05-18 23:51:01', '2019-05-18 23:51:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posyandus`
--

CREATE TABLE `posyandus` (
  `id` int(10) UNSIGNED NOT NULL,
  `rw_id` int(10) UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kesehatanibuanak` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1 iya 0 tidak',
  `KB` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1 iya 0 tidak',
  `imun` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1 iya 0 tidak',
  `gizi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1 iya 0 tidak',
  `diare` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1 iya 0 tidak',
  `sanitasidasar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1 iya 0 tidak',
  `penyediaanobat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1 iya 0 tidak',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posyandus`
--

INSERT INTO `posyandus` (`id`, `rw_id`, `deskripsi`, `tanggal`, `phone`, `kesehatanibuanak`, `KB`, `imun`, `gizi`, `diare`, `sanitasidasar`, `penyediaanobat`, `created_at`, `updated_at`) VALUES
(1, 8, 'kegiatan rutin posyandu', '2019-05-08 00:00:00', '0895346672189', '1', '0', '1', '1', '0', '0', '0', '2019-05-03 14:42:41', '2019-05-18 23:55:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'orangtua', '2019-05-10 05:44:17', '2019-05-10 05:44:17'),
(3, 'petugas', '2019-05-10 05:44:44', '2019-05-10 05:44:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 5, 2, NULL, NULL),
(2, 6, 3, NULL, NULL),
(3, 7, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rw`
--

CREATE TABLE `rw` (
  `id` int(10) UNSIGNED NOT NULL,
  `rw` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rw`
--

INSERT INTO `rw` (`id`, `rw`, `created_at`, `updated_at`) VALUES
(1, '01', '2019-05-01 23:24:19', NULL),
(2, '02', '2019-05-01 23:24:19', NULL),
(3, '03', '2019-05-01 23:24:19', NULL),
(4, '04', '2019-05-01 23:24:19', NULL),
(5, '05', '2019-05-01 23:24:19', NULL),
(6, '06', '2019-05-01 23:24:20', NULL),
(7, '07', '2019-05-01 23:24:20', NULL),
(8, '08', '2019-05-01 23:24:20', NULL),
(9, '09', '2019-05-01 23:24:20', NULL),
(10, '10', '2019-05-01 23:24:20', NULL),
(11, '11', '2019-05-01 23:24:20', NULL),
(12, '12', '2019-05-01 23:24:20', NULL),
(13, '13', '2019-05-01 23:24:20', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Kesehatan', 'Kesehatan', '2019-05-03 14:21:30', '2019-05-03 14:21:30'),
(2, 'Balita', 'Balita', '2019-05-03 14:21:42', '2019-05-03 14:21:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `phone`, `alamat`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'ismaluv', 'isma', '212132323212', 'wlawlpawpa', 'luv@gmail.com', '$2y$10$x6g39O6eFB33hocBG.On/umeTozhHV3GPSrlhGZdO0QACwnJEGXYO', 'zaFB2NnFTiCutaU7SleBgjYuKkS2oK12wXFvbtkrxhxFz2KR7O7NOkALpQGD', '2019-05-10 06:08:54', '2019-05-10 06:08:54'),
(6, 'Insan Hamzah', 'johninsan', '895346672189', 'flamboyan VI', 'johninsan@gmail.com', '$2y$10$fDOAYbZr/TM2ZBABzszxgemqqCUBa8JU5wUG5nH.eqCO5T/V2m4m2', 'U8J9yxwDGhvo2eenLEnEsMjt06TASXBu6aDjVK7C17PRPDljywlWKk3q8Hdl', '2019-05-10 06:54:54', '2019-05-10 06:54:54'),
(7, 'oboy', 'oboyoy', '02191092011', 'ewdwqqwd', 'oboy@gmail.com', '$2y$10$U0wLhpUpabYrPxCAFLTF9u6wx/SUby0ivBfimH21oijD3tIJlo8Ae', NULL, '2019-05-19 00:05:44', '2019-05-19 00:05:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `yajras`
--

CREATE TABLE `yajras` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indeks untuk tabel `balitas`
--
ALTER TABLE `balitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balitas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category_posts`
--
ALTER TABLE `category_posts`
  ADD KEY `category_posts_post_id_index` (`post_id`),
  ADD KEY `category_posts_category_id_index` (`category_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `monitors`
--
ALTER TABLE `monitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `monitors_balita_id_foreign` (`balita_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesan_pengirim_id_foreign` (`pengirim_id`),
  ADD KEY `pesan_penerima_id_foreign` (`penerima_id`);

--
-- Indeks untuk tabel `pesan_header`
--
ALTER TABLE `pesan_header`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `post_tags`
--
ALTER TABLE `post_tags`
  ADD KEY `post_tags_post_id_index` (`post_id`),
  ADD KEY `post_tags_tag_id_index` (`tag_id`);

--
-- Indeks untuk tabel `posyandus`
--
ALTER TABLE `posyandus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posyandus_rw_id_foreign` (`rw_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rw`
--
ALTER TABLE `rw`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `yajras`
--
ALTER TABLE `yajras`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `yajras_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `balitas`
--
ALTER TABLE `balitas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `monitors`
--
ALTER TABLE `monitors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pesan_header`
--
ALTER TABLE `pesan_header`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `posyandus`
--
ALTER TABLE `posyandus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `rw`
--
ALTER TABLE `rw`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `yajras`
--
ALTER TABLE `yajras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `balitas`
--
ALTER TABLE `balitas`
  ADD CONSTRAINT `balitas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `category_posts`
--
ALTER TABLE `category_posts`
  ADD CONSTRAINT `category_posts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `monitors`
--
ALTER TABLE `monitors`
  ADD CONSTRAINT `monitors_balita_id_foreign` FOREIGN KEY (`balita_id`) REFERENCES `balitas` (`id`);

--
-- Ketidakleluasaan untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_penerima_id_foreign` FOREIGN KEY (`penerima_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pesan_pengirim_id_foreign` FOREIGN KEY (`pengirim_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `post_tags_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `posyandus`
--
ALTER TABLE `posyandus`
  ADD CONSTRAINT `posyandus_rw_id_foreign` FOREIGN KEY (`rw_id`) REFERENCES `rw` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
