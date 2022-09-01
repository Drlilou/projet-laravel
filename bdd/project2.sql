-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 01 sep. 2022 à 11:23
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `project2`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `fname`, `lname`, `email`, `username`, `password`, `is_super`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', '$2y$10$FiD3SItDUS3KXW3/.MccPOvIJ5fIkkq4rXM8bAQHhcxIevMK8v7MC', 0, NULL, NULL, '2022-08-31 20:20:26');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL,
  `news` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `user`, `news`, `created_at`, `updated_at`) VALUES
(4, 'qkfhqs snkqlfnhlezs fhslegjqleqrj lnsqkdgnme', 4, 2, '2022-08-30 21:33:39', '2022-08-30 21:33:39'),
(10, 'sssssssssssssss', 4, 2, '2022-08-31 16:42:58', '2022-08-31 16:42:58'),
(11, 'atyaztyzhdt', 4, 10, '2022-09-01 07:03:05', '2022-09-01 07:03:05'),
(12, 'fgzdgzsqjhu', 4, 20, '2022-09-01 07:13:57', '2022-09-01 07:13:57');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_sp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_take_pfe` tinyint(1) NOT NULL,
  `binom` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2022_04_29_111644_create_admins_table', 1),
(4, '2022_05_05_074855_create_etudiants_table', 1),
(5, '2022_05_06_132704_create_sub_admins_table', 1),
(6, '2022_05_07_130201_create_zones_table', 1),
(7, '2022_08_17_230309_create_news_table', 1),
(9, '2014_10_12_000000_create_users_table', 2),
(11, '2022_08_30_225112_create_comments_table', 3),
(12, '2022_08_31_113217_create_photos_table', 4);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_zone` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `titre`, `image`, `description`, `id_zone`, `created_at`, `updated_at`) VALUES
(2, '654465465447', '1661964828.jpg', '654654', 2, '2022-08-22 12:04:43', '2022-08-31 14:54:47'),
(3, '+6qishfkqjzeshflk skjfjhflskg', '1661177191.jpg', '654654', 2, '2022-08-22 12:06:31', '2022-08-23 15:29:22'),
(4, '324654', '1661192637.jpg', 'zsf', 2, '2022-08-22 16:23:57', '2022-08-22 16:23:57'),
(7, 'zzzej c', '1661810959.jpg', '86974d56sd4fk5454   skgfcksue lhfshflzheili  c zeKFZAE FQ S. F z fKLQSJFLHzaebx', 2, '2022-08-29 20:09:19', '2022-08-29 20:09:19'),
(8, 'zzzej c', '1661811038.jpg', '86974d56sd4fk5454   skgfcksue lhfshflzheili  c zeKFZAE FQ S. F z fKLQSJFLHzaebx', 2, '2022-08-29 20:10:38', '2022-08-29 20:10:38'),
(9, 'zzzej c', '1661811080.jpg', '86974d56sd4fk5454   skgfcksue lhfshflzheili  c zeKFZAE FQ S. F z fKLQSJFLHzaebx', 2, '2022-08-29 20:11:20', '2022-08-29 20:11:20'),
(10, 'zzzej c', '1661811113.jpg', '86974d56sd4fk5454   skgfcksue lhfshflzheili  c zeKFZAE FQ S. F z fKLQSJFLHzaebx', 2, '2022-08-29 20:11:53', '2022-08-29 20:11:53'),
(11, 'zzzej c', '1661811119.jpg', '86974d56sd4fk5454   skgfcksue lhfshflzheili  c zeKFZAE FQ S. F z fKLQSJFLHzaebx', 2, '2022-08-29 20:11:59', '2022-08-29 20:11:59'),
(12, 'AAA', '1661951868.png', 'AAAAAA', 2, '2022-08-31 11:17:48', '2022-08-31 11:17:48'),
(13, 'aZ', '1661952741.jpg', 'zzzzzz', 2, '2022-08-31 11:32:21', '2022-08-31 11:32:21'),
(14, '7777777777', '11661953001.jpg', '8888888888888', 2, '2022-08-31 11:36:41', '2022-08-31 11:36:41'),
(15, 'aaaaaaaaa', '11661953099.jpg', 'aaaaaaaaaa', 2, '2022-08-31 11:38:19', '2022-08-31 11:38:19'),
(16, 'aaaaaaaaa', '11661953155.jpg', 'aaaaaaaaaa', 2, '2022-08-31 11:39:15', '2022-08-31 11:39:15'),
(17, 'aaaaaaaaaaaaa²', '11661959758.jpg', 'zsfdosfdj7\r\n7gsdwjhdffs\r\nwg\r\nsd\r\nhsùd\r\nfhùs', 2, '2022-08-31 13:29:18', '2022-08-31 13:29:18'),
(18, '545454', '11661959843.jpg', 'kjhkh\r\ndsfghjklmqsdfghjklmù\r\ndgfhjklmù', 2, '2022-08-31 13:30:43', '2022-08-31 13:30:43'),
(19, '65446545', '11661964308.jpg', '578444444444', 2, '2022-08-31 14:45:08', '2022-08-31 14:45:08'),
(20, 'zzzzzzzzzzzzz', '11662023530.jpg', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 2, '2022-09-01 07:12:10', '2022-09-01 07:12:10');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`id`, `created_at`, `updated_at`, `img`, `news`) VALUES
(1, '2022-08-31 11:36:41', '2022-08-31 11:36:41', '11661953001.jpg', 14),
(2, '2022-08-31 11:39:15', '2022-08-31 11:39:15', '11661953155.jpg', 16),
(3, '2022-08-31 11:39:15', '2022-08-31 11:39:15', '21661953155.jpg', 16),
(4, '2022-08-31 11:39:15', '2022-08-31 11:39:15', '31661953155.jpg', 16),
(5, '2022-08-31 11:39:15', '2022-08-31 11:39:15', '41661953155.png', 16),
(6, '2022-08-31 11:39:15', '2022-08-31 11:39:15', '51661953155.png', 16),
(7, '2022-08-31 11:39:15', '2022-08-31 11:39:15', '61661953155.png', 16),
(8, '2022-08-31 11:39:15', '2022-08-31 11:39:15', '71661953155.jpg', 16),
(9, '2022-08-31 11:39:15', '2022-08-31 11:39:15', '81661953155.jpg', 16),
(10, '2022-08-31 11:39:15', '2022-08-31 11:39:15', '91661953155.jpg', 16),
(11, '2022-08-31 11:39:15', '2022-08-31 11:39:15', '101661953155.jpg', 16),
(12, '2022-08-31 11:39:15', '2022-08-31 11:39:15', '111661953155.png', 16),
(13, '2022-08-31 11:39:15', '2022-08-31 11:39:15', '121661953155.png', 16),
(14, '2022-08-31 13:29:18', '2022-08-31 13:29:18', '11661959758.jpg', 17),
(15, '2022-08-31 13:29:18', '2022-08-31 13:29:18', '21661959758.jpg', 17),
(16, '2022-08-31 13:29:18', '2022-08-31 13:29:18', '31661959758.jpg', 17),
(17, '2022-08-31 13:30:43', '2022-08-31 13:30:43', '11661959843.jpg', 18),
(18, '2022-08-31 13:30:43', '2022-08-31 13:30:43', '21661959843.jpg', 18),
(19, '2022-08-31 13:30:43', '2022-08-31 13:30:43', '31661959843.jpg', 18),
(20, '2022-08-31 14:45:08', '2022-08-31 14:45:08', '11661964308.jpg', 19),
(21, '2022-08-31 14:45:08', '2022-08-31 14:45:08', '21661964308.jpg', 19),
(22, '2022-08-31 14:45:08', '2022-08-31 14:45:08', '31661964308.jpg', 19),
(23, '2022-09-01 07:12:10', '2022-09-01 07:12:10', '11662023530.jpg', 20),
(24, '2022-09-01 07:12:10', '2022-09-01 07:12:10', '21662023530.jpg', 20),
(25, '2022-09-01 07:12:10', '2022-09-01 07:12:10', '31662023530.jpg', 20),
(26, '2022-09-01 07:12:10', '2022-09-01 07:12:10', '41662023530.jpg', 20),
(27, '2022-09-01 07:12:10', '2022-09-01 07:12:10', '51662023530.jpg', 20),
(28, '2022-09-01 07:12:10', '2022-09-01 07:12:10', '61662023530.jpg', 20),
(29, '2022-09-01 07:12:10', '2022-09-01 07:12:10', '71662023530.jpg', 20),
(30, '2022-09-01 07:12:10', '2022-09-01 07:12:10', '81662023530.jpg', 20),
(31, '2022-09-01 07:12:10', '2022-09-01 07:12:10', '91662023530.jpg', 20),
(32, '2022-09-01 07:12:10', '2022-09-01 07:12:10', '101662023530.jpg', 20),
(33, '2022-09-01 07:12:10', '2022-09-01 07:12:10', '111662023530.jpg', 20);

-- --------------------------------------------------------

--
-- Structure de la table `sub_admins`
--

CREATE TABLE `sub_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sub_admins`
--

INSERT INTO `sub_admins` (`id`, `fname`, `lname`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, '8987987', '6857468746', '6545465@gmail.com', '854655', NULL, '$2y$10$Ls3h3o7JUXQqDelze10FPeJ1.dhce8DHwaYrfgqdDtrjQfRZrs2HG', NULL, '2022-08-18 21:17:14', '2022-08-18 21:17:14'),
(8, '8987987', '6857468746', 'a@gmail.com', 'a', NULL, '$2y$10$kedytJReTysRYSLLB.YtkOT8NrsUOU4hwESwUGWxayFc0PAeTBu4.', NULL, '2022-08-18 21:22:27', '2022-08-31 18:42:46'),
(9, 'e', 'e', 'e8@gmail.com', 'e', NULL, '$2y$10$cC9UNrr9it/oLT5l/xN14OqnBOZ.VZRr540nzcp5xpjfgZkx2ixqm', NULL, '2022-08-31 20:44:58', '2022-08-31 20:44:58'),
(10, 'f', 'f', 'ffff@gmail.com', 'f', NULL, '$2y$10$iMIOmB.GkaDdQV.iBegloO4yAOZLW8vgKpmz8ML2eRTTqZn1iR1QO', NULL, '2022-08-31 20:47:04', '2022-08-31 20:47:04');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'amine', 'amine', 'amine', 'amine@gmial.com', NULL, '$2y$10$Z43jmWeWvhaLhQADj.E2UeHUEyfT5XxEwghZ.MvILZC/Hef/Wn2zS', NULL, '2022-08-26 06:38:27', '2022-08-26 06:38:27'),
(4, 'a', 'a', 'a', 'a@gmial.com', NULL, '$2y$10$MoLKshn9bDKvG4QyzvG.7usbXVOU616pmEMoXJM2GaIdd8u6TxAo2', NULL, '2022-08-26 06:42:47', '2022-08-31 19:19:19'),
(5, 'a', 'a', 'b', 'b@gmial.com', NULL, '$2y$10$KX.VSFuT892im9OxvOYyx.bXStychmfRgtTT2Im7QWiO1.R9OzvSG', NULL, '2022-08-26 06:43:56', '2022-08-26 06:43:56'),
(6, 'c', 'c', 'c', 'cccc@gmail.com', NULL, '$2y$10$0j12DU59/tMPLs.mdLX7p.dj5cb3n1ppht2P0bVGh0C2sPdy1Y9yG', NULL, '2022-08-31 08:23:35', '2022-08-31 08:23:35'),
(7, 'f', 'f', 'f', 'nacim@gmail.com', NULL, '$2y$10$HjzZl41/SCBMNLqEaC5pOeqpFxKEeKz8xR4N7pDTAlmEAQpfb7TeK', NULL, '2022-09-01 06:49:23', '2022-09-01 06:49:23');

-- --------------------------------------------------------

--
-- Structure de la table `zones`
--

CREATE TABLE `zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `zones`
--

INSERT INTO `zones` (`id`, `nom`, `admin`, `created_at`, `updated_at`) VALUES
(1, '4658465846', 7, '2022-08-18 21:21:12', '2022-08-18 21:21:12'),
(2, '4658465846', 8, '2022-08-18 21:22:27', '2022-08-18 21:22:27'),
(3, 'e', 9, '2022-08-31 20:44:58', '2022-08-31 20:44:58'),
(4, 'f', 10, '2022-08-31 20:47:04', '2022-08-31 20:47:04');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_foreign` (`user`),
  ADD KEY `comments_news_foreign` (`news`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `etudiants_email_unique` (`email`),
  ADD UNIQUE KEY `etudiants_username_unique` (`username`),
  ADD KEY `etudiants_binom_foreign` (`binom`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id_zone_foreign` (`id_zone`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_news_foreign` (`news`);

--
-- Index pour la table `sub_admins`
--
ALTER TABLE `sub_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_admins_email_unique` (`email`),
  ADD UNIQUE KEY `sub_admins_username_unique` (`username`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zones_admin_foreign` (`admin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `sub_admins`
--
ALTER TABLE `sub_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_news_foreign` FOREIGN KEY (`news`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `comments_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants_binom_foreign` FOREIGN KEY (`binom`) REFERENCES `etudiants` (`id`);

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_id_zone_foreign` FOREIGN KEY (`id_zone`) REFERENCES `zones` (`id`);

--
-- Contraintes pour la table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_news_foreign` FOREIGN KEY (`news`) REFERENCES `news` (`id`);

--
-- Contraintes pour la table `zones`
--
ALTER TABLE `zones`
  ADD CONSTRAINT `zones_admin_foreign` FOREIGN KEY (`admin`) REFERENCES `sub_admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;