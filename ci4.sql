-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Mar 2023 pada 04.50
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '13c2c07aec4c6ae6e42d98013668d70c', '2023-03-05 11:22:40'),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '856c35795b6bb49bad04fab0938fcf33', '2023-03-05 11:49:41'),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', '829e880c681e5cd75db51020741f364b', '2023-03-06 23:47:37'),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'a37e3db19bc072dc7a0c20fb9b66b650', '2023-03-09 01:30:29'),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '4be95e0abe2a4f1dc621525042092b1a', '2023-03-20 22:54:07'),
(6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '4be95e0abe2a4f1dc621525042092b1a', '2023-03-20 22:54:13'),
(7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '4be95e0abe2a4f1dc621525042092b1a', '2023-03-20 22:55:18'),
(8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '31b661c3e4b8e27e7283d60269dae538', '2023-03-20 22:58:10'),
(9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', '090c046704e4d6872ee1881d2f17d041', '2023-03-24 12:57:26'),
(10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'a6ab4e1ee43ed330f97bb601e77fafe2', '2023-03-28 21:40:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'caturmaldini@gmail.com', 19, '2023-03-05 11:36:51', 1),
(2, '::1', 'caturmaldini@gmail.com', 19, '2023-03-05 11:38:41', 1),
(3, '::1', 'caturmaldini@gmail.com', 19, '2023-03-05 11:42:24', 1),
(4, '::1', 'caturmaldini@gmail.com', 19, '2023-03-05 11:43:14', 1),
(5, '::1', 'caturmaldini@gmail.com', 19, '2023-03-05 11:43:36', 1),
(6, '::1', 'caturmaldini@gmail.com', 19, '2023-03-05 11:45:49', 1),
(7, '::1', 'caturmaldini@gmail.com', 19, '2023-03-05 11:45:57', 1),
(8, '::1', 'caturmaldini@gmail.com', 19, '2023-03-05 11:46:35', 1),
(9, '::1', 'caturmaldini@gmail.com', 19, '2023-03-05 11:47:24', 1),
(10, '::1', 'Coach kepala', 20, '2023-03-05 11:49:26', 0),
(11, '::1', 'caturmaldini@gmail.com', 20, '2023-03-05 11:49:44', 1),
(12, '::1', 'caturmaldini@gmail.com', 20, '2023-03-05 20:26:56', 1),
(13, '::1', 'caturmaldini@gmail.com', 20, '2023-03-05 20:30:02', 1),
(14, '::1', 'caturmaldini@gmail.com', 20, '2023-03-06 04:40:38', 1),
(15, '::1', 'caturmaldini@gmail.com', 20, '2023-03-06 04:49:18', 1),
(16, '::1', 'caturmaldini@gmail.com', 20, '2023-03-06 05:23:44', 1),
(17, '::1', 'Coach kepala', NULL, '2023-03-06 23:45:43', 0),
(18, '::1', 'caturmaldini@gmail.com', 21, '2023-03-06 23:47:53', 1),
(19, '::1', 'caturmaldini@gmail.com', 21, '2023-03-06 23:49:23', 1),
(20, '::1', 'caturmaldini@gmail.com', 21, '2023-03-07 23:58:22', 1),
(21, '::1', 'caturmaldini@gmail.com', 21, '2023-03-08 11:45:07', 1),
(22, '::1', 'caturmaldini@gmail.com', 21, '2023-03-09 01:27:13', 1),
(23, '::1', 'caturmaldini@gmail.com', 22, '2023-03-09 01:30:59', 1),
(24, '::1', 'caturmaldini@gmail.com', 22, '2023-03-09 06:50:58', 1),
(25, '::1', 'CoachMilan', NULL, '2023-03-09 07:42:04', 0),
(26, '::1', 'CoachMilan', NULL, '2023-03-09 07:42:13', 0),
(27, '::1', 'CoachMilan', NULL, '2023-03-09 07:42:33', 0),
(28, '::1', 'caturmaldini@gmail.com', 22, '2023-03-09 07:42:47', 1),
(29, '::1', 'caturmaldini@gmail.com', 22, '2023-03-09 07:45:01', 1),
(30, '::1', 'caturmaldini@gmail.com', 22, '2023-03-09 08:08:42', 1),
(31, '::1', 'caturmaldini@gmail.com', 22, '2023-03-09 08:30:42', 1),
(32, '::1', 'caturmaldini@gmail.com', 22, '2023-03-13 22:50:14', 1),
(33, '::1', 'CoachMilan', NULL, '2023-03-16 11:35:35', 0),
(34, '::1', 'caturmaldini@gmail.com', 22, '2023-03-16 11:35:46', 1),
(35, '::1', 'caturmaldini@gmail.com', 22, '2023-03-16 11:59:44', 1),
(36, '::1', 'caturmaldini@gmail.com', 22, '2023-03-19 20:41:12', 1),
(37, '::1', 'caturmaldini@gmail.com', 22, '2023-03-19 20:50:13', 1),
(38, '::1', 'caturmaldini@gmail.com', 22, '2023-03-19 20:57:49', 1),
(39, '::1', 'caturmaldini@gmail.com', 22, '2023-03-19 21:11:43', 1),
(40, '::1', 'CoachMilan', NULL, '2023-03-20 22:41:28', 0),
(41, '::1', 'CoachMilan', NULL, '2023-03-20 22:41:41', 0),
(42, '::1', 'CoachMilan', NULL, '2023-03-20 22:42:32', 0),
(43, '::1', 'CoachMilan', NULL, '2023-03-20 22:49:13', 0),
(44, '::1', 'admin2', 23, '2023-03-20 22:55:42', 0),
(45, '::1', 'admin2', 23, '2023-03-20 22:56:29', 0),
(46, '::1', 'caturmaldini@gmail.com', 24, '2023-03-20 22:58:20', 1),
(47, '::1', 'CoachMilan', NULL, '2023-03-24 12:55:44', 0),
(48, '::1', 'CoachMilan', NULL, '2023-03-24 12:56:01', 0),
(49, '::1', 'caturmaldini@gmail.com', 25, '2023-03-24 12:57:41', 1),
(50, '::1', 'pelatih', NULL, '2023-03-24 22:56:37', 0),
(51, '::1', 'caturmaldini@gmail.com', 25, '2023-03-24 22:56:56', 1),
(52, '::1', 'caturmaldini@gmail.com', 25, '2023-03-25 01:13:30', 1),
(53, '::1', 'caturmaldini@gmail.com', 25, '2023-03-25 01:29:16', 1),
(54, '::1', 'caturmaldini@gmail.com', 25, '2023-03-25 02:32:08', 1),
(55, '::1', 'caturmaldini@gmail.com', 25, '2023-03-26 03:41:12', 1),
(56, '::1', 'caturmaldini@gmail.com', 25, '2023-03-26 08:10:28', 1),
(57, '::1', 'caturmaldini@gmail.com', 25, '2023-03-26 13:08:39', 1),
(58, '::1', 'caturmaldini@gmail.com', 25, '2023-03-27 00:30:42', 1),
(59, '::1', 'caturmaldini@gmail.com', 25, '2023-03-27 23:17:44', 1),
(60, '::1', 'caturmaldini@gmail.com', 25, '2023-03-28 20:44:13', 1),
(61, '::1', 'pelatih', NULL, '2023-03-28 21:41:02', 0),
(62, '::1', 'caturmaldini@gmail.com', 26, '2023-03-28 21:41:54', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_amf`
--

CREATE TABLE `data_amf` (
  `id` int(15) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_cb`
--

CREATE TABLE `data_cb` (
  `id` int(15) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_cb`
--

INSERT INTO `data_cb` (`id`, `kode`, `slug`, `nama`, `jenis`, `nilai`) VALUES
(4, 'C2', 'c2', 'save', 'benefit', '25'),
(5, 'C2', 'c2', 'SAVE', 'cost', '30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_cf`
--

CREATE TABLE `data_cf` (
  `id` int(15) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_cmf`
--

CREATE TABLE `data_cmf` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_gk`
--

CREATE TABLE `data_gk` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `slug` varchar(500) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_lb`
--

CREATE TABLE `data_lb` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_lwf`
--

CREATE TABLE `data_lwf` (
  `id` int(15) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_lwf`
--

INSERT INTO `data_lwf` (`id`, `kode`, `slug`, `nama`, `jenis`, `nilai`) VALUES
(2, 'sccs4', 'sccs4', 'scsc', 'scsc', 'scsc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_rb`
--

CREATE TABLE `data_rb` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_rwf`
--

CREATE TABLE `data_rwf` (
  `id` int(15) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_user`
--

CREATE TABLE `login_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login_user`
--

INSERT INTO `login_user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, '', 'adac', '', '', 0, 0, 0),
(2, '', 'adac', '', '', 0, 0, 0),
(3, '', 'admin1', '', '', 0, 0, 0),
(4, '', 'admin1', '', '', 0, 0, 0),
(5, '', 'admin1', '', '', 0, 0, 0),
(6, '', 'admin234', '', '', 0, 0, 0),
(7, '', 'admin234', '', '', 0, 0, 0),
(8, '', 'admin12', '', '', 0, 0, 0),
(9, '', 'caturmaldini@gmail.com', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-02-27-165816', 'App\\Database\\Migrations\\Kriteria', 'default', 'App', 1677517793, 1),
(3, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1678030469, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemain`
--

CREATE TABLE `pemain` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `nationaly` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `foot` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `sampul` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemain`
--

INSERT INTO `pemain` (`id`, `nama`, `slug`, `nationaly`, `position`, `foot`, `height`, `number`, `age`, `sampul`, `created_at`, `updated_at`) VALUES
(2, 'Theo Hernandez1', 'theo-hernandez1', 'France', 'LB', 'Left', '189cm', '19', '23', 'theo_1.jpeg', NULL, NULL),
(31, 'judul yang berubah', 'judul-yang-berubah', 'Brazil', 'AMF', 'Right', '187cm', '22', '25', 'zlatan.jpg', NULL, NULL),
(35, 'maldini', 'maldini', 'brazil', 'cb', 'right', '190', '80', '32', 'HD-wallpaper-soccer-carlo-ancelotti-italian-soccer_1.jpg', NULL, NULL),
(49, 'XAD ', 'xad', 'AS', 'A ', 'ASC', 'ASC', 'ASC', 'AD', 'arema_1.jpeg', NULL, NULL),
(51, 'sclmac', 'sclmac', 'xsk', 'scm', 'ms', 'asnmx', 'msnc', 'snc', 'default1.jpg', NULL, NULL),
(52, '', '', '', '', '', '', '', '', 'default1.jpg', NULL, NULL),
(54, 'inzaghi', 'inzaghi', 'italy', 'CF', 'right', '189cm', '9', '20', 'giroud_1.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(26, 'caturmaldini@gmail.com', 'pelatih', '$2y$10$KPzzZIPNStpmK62t6cN3eOxdAxf6sWeEXyNCF5LSaFd2.PnBY0xPe', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-03-28 21:40:22', '2023-03-28 21:40:32', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `data_amf`
--
ALTER TABLE `data_amf`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_cb`
--
ALTER TABLE `data_cb`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_cf`
--
ALTER TABLE `data_cf`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_cmf`
--
ALTER TABLE `data_cmf`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_gk`
--
ALTER TABLE `data_gk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_lb`
--
ALTER TABLE `data_lb`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_lwf`
--
ALTER TABLE `data_lwf`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_rb`
--
ALTER TABLE `data_rb`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_rwf`
--
ALTER TABLE `data_rwf`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemain`
--
ALTER TABLE `pemain`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_amf`
--
ALTER TABLE `data_amf`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_cb`
--
ALTER TABLE `data_cb`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_cf`
--
ALTER TABLE `data_cf`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_cmf`
--
ALTER TABLE `data_cmf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_gk`
--
ALTER TABLE `data_gk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_lb`
--
ALTER TABLE `data_lb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_lwf`
--
ALTER TABLE `data_lwf`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_rb`
--
ALTER TABLE `data_rb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_rwf`
--
ALTER TABLE `data_rwf`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pemain`
--
ALTER TABLE `pemain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
