-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 06 oct. 2022 à 23:19
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
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', '$2y$10$oFcMxHWdG9hipXESyiTxD.TH8oTXiCEJYc.vk3ImYNhEhv9i1G10e', 0, NULL, NULL, '2022-09-04 16:04:45');

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
(13, 'aaaaa bbbbbbbb ccccccccccc', 4, 22, '2022-09-29 04:01:47', '2022-09-29 04:01:47'),
(14, 'bbbb', 4, 22, '2022-10-03 03:03:49', '2022-10-03 03:03:49'),
(15, 'vvvvv', 8, 22, '2022-10-05 03:27:32', '2022-10-05 03:27:32');

-- --------------------------------------------------------

--
-- Structure de la table `dons`
--

CREATE TABLE `dons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user` bigint(20) UNSIGNED DEFAULT NULL,
  `missing_products` bigint(20) UNSIGNED NOT NULL,
  `phone` bigint(20) UNSIGNED NOT NULL,
  `Quantity` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `dons`
--

INSERT INTO `dons` (`id`, `created_at`, `updated_at`, `user`, `missing_products`, `phone`, `Quantity`) VALUES
(22, '2022-10-06 16:11:41', '2022-10-06 16:11:41', NULL, 3, 8888888, 88888888);

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
(12, '2022_08_31_113217_create_photos_table', 4),
(13, '2022_10_03_053019_create_missing_products_table', 5),
(14, '2022_10_03_232741_create_dons_table', 6);

-- --------------------------------------------------------

--
-- Structure de la table `missing_products`
--

CREATE TABLE `missing_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `news` bigint(20) UNSIGNED NOT NULL,
  `products` bigint(20) UNSIGNED NOT NULL,
  `Quantity` int(100) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `missing_products`
--

INSERT INTO `missing_products` (`id`, `created_at`, `updated_at`, `news`, `products`, `Quantity`) VALUES
(1, NULL, NULL, 22, 34, 0),
(2, NULL, NULL, 22, 35, 0),
(3, NULL, NULL, 22, 31, 0),
(4, NULL, NULL, 22, 32, 0),
(8, '2022-10-04 19:59:52', '2022-10-04 19:59:52', 22, 34, 56564),
(9, '2022-10-04 19:59:52', '2022-10-04 19:59:52', 22, 35, 54545),
(10, '2022-10-04 20:00:40', '2022-10-04 20:00:40', 22, 34, 56564),
(11, '2022-10-04 20:00:40', '2022-10-04 20:00:40', 22, 35, 54545),
(12, '2022-10-04 20:01:14', '2022-10-04 20:01:14', 22, 34, 56564),
(13, '2022-10-04 20:01:14', '2022-10-04 20:01:14', 22, 35, 54545),
(14, '2022-10-04 20:12:16', '2022-10-04 20:12:16', 22, 31, 1212),
(15, '2022-10-04 20:12:16', '2022-10-04 20:12:16', 22, 31, 2121),
(16, '2022-10-04 20:15:30', '2022-10-04 20:15:30', 22, 34, 654),
(17, '2022-10-04 20:15:30', '2022-10-04 20:15:30', 22, 34, 544),
(18, '2022-10-05 16:35:16', '2022-10-05 16:35:16', 22, 32, 1111111),
(19, '2022-10-05 16:36:24', '2022-10-05 16:36:24', 22, 31, 111);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_zone` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `titre`, `image`, `description`, `id_zone`, `created_at`, `updated_at`) VALUES
(22, 'aaaaaa', '11664430931.jpg', 'ddd dddddddddddddd ssssssssssss dddddddddddddd ssssssssssss vdddddddddddddd ssssssssssss dddddddddddddd sssssss sssss    dddddddddddddd ssssssssssss dddddddddddddd ssssssssssss vdddddddddddddd ssssssssssss dddddddddddddd sssssss sssss    dddddddddddddd ssssssssssss dddddddddddddd ssssssssssss vdddddddddddddd ssssssssssss dddddddddddddd sssssss sssss    dddddddddddddd ssssssssssss dddddddddddddd ssssssssssss vdddddddddddddd ssssssssssss dddddddddddddd sssssss sssss    dddddddddddddd ssssssssssss dddddddddddddd ssssssssssss vdddddddddddddd ssssssssssss dddddddddddddd sssssss sssss   ddddddddddd ssssssssssss dddddddddddddd ssssssssssss vdddddddddddddd ssssssssssss dddddddddddddd sssssss sssss    dddddddddddddd ssssssssssss dddddddddddddd ssssssssssss vdddddddddddddd ssssssssssss dddddddddddddd sssssss sssss', 11, '2022-09-29 03:55:31', '2022-09-29 03:55:31'),
(23, 'zzzz', '11664950470.jpg', '4444444444444444444444 kpkmkj mjml jm ojml pm im pj mk', 11, '2022-10-05 04:14:30', '2022-10-05 04:14:30');

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
(43, '2022-09-29 03:55:32', '2022-09-29 03:55:32', '11664430931.jpg', 22),
(44, '2022-09-29 03:55:32', '2022-09-29 03:55:32', '21664430931.jpg', 22),
(45, '2022-09-29 03:55:32', '2022-09-29 03:55:32', '31664430931.jpg', 22),
(46, '2022-09-29 03:55:32', '2022-09-29 03:55:32', '41664430931.jpg', 22),
(47, '2022-09-29 03:55:32', '2022-09-29 03:55:32', '51664430931.jpg', 22),
(48, '2022-09-29 03:55:32', '2022-09-29 03:55:32', '61664430931.jpg', 22),
(49, '2022-09-29 03:55:32', '2022-09-29 03:55:32', '71664430931.jpg', 22),
(50, '2022-09-29 03:55:32', '2022-09-29 03:55:32', '81664430931.jpg', 22),
(51, '2022-09-29 03:55:32', '2022-09-29 03:55:32', '91664430931.jpg', 22),
(52, '2022-10-05 04:14:30', '2022-10-05 04:14:30', '11664950470.jpg', 23),
(53, '2022-10-05 04:14:30', '2022-10-05 04:14:30', '21664950470.png', 23),
(54, '2022-10-05 04:14:30', '2022-10-05 04:14:30', '31664950470.jpg', 23),
(55, '2022-10-05 04:14:30', '2022-10-05 04:14:30', '41664950470.png', 23),
(56, '2022-10-05 04:14:30', '2022-10-05 04:14:30', '51664950470.png', 23);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `name` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT current_timestamp(),
  `id` bigint(20) UNSIGNED NOT NULL,
  `measruing_unit` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`name`, `category`, `id`, `measruing_unit`, `updated_at`, `created_at`) VALUES
('sucre', 'a', 31, 'KG', NULL, NULL),
('L\'huile végétale', 'a', 32, 'litre', NULL, NULL),
('Le Lait', 'a', 33, 'litre', NULL, NULL),
('couvre', 'b', 34, 'p', NULL, NULL),
('cheminée', 'b', 35, 'p', NULL, NULL),
('qqqqqqqq', 'QQQQQQQQQQQQQQQQq', 36, 'm', '2022-10-04 21:20:35', '2022-10-04 21:20:35');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `p` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '123456789'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sub_admins`
--

INSERT INTO `sub_admins` (`id`, `fname`, `lname`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `p`) VALUES
(9, 'e', 'e', 'e8@gmail.com', 'e', NULL, '$2y$10$oFcMxHWdG9hipXESyiTxD.TH8oTXiCEJYc.vk3ImYNhEhv9i1G10e', NULL, '2022-08-31 20:44:58', '2022-09-04 16:08:34', '123123123'),
(10, 'f', 'f', 'ffff@gmail.com', 'f', NULL, '$2y$10$oFcMxHWdG9hipXESyiTxD.TH8oTXiCEJYc.vk3ImYNhEhv9i1G10e', NULL, '2022-08-31 20:47:04', '2022-08-31 20:47:04', '123456789');

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
(4, 'a', 'a', 'a', 'a@gmial.com', NULL, '$2y$10$oFcMxHWdG9hipXESyiTxD.TH8oTXiCEJYc.vk3ImYNhEhv9i1G10e', NULL, '2022-08-26 06:42:47', '2022-08-31 19:19:19'),
(8, 'karim', 'karim', 'karim', 'karim@gmail.com', NULL, '$2y$10$oFcMxHWdG9hipXESyiTxD.TH8oTXiCEJYc.vk3ImYNhEhv9i1G10e', NULL, '2022-09-26 19:23:31', '2022-09-26 19:23:31');

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
(11, 'a', 9, '2022-09-29 03:51:17', '2022-09-29 03:51:17');

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
  ADD KEY `comments_news_foreign` (`news`),
  ADD KEY `comments_user_foreign` (`user`);

--
-- Index pour la table `dons`
--
ALTER TABLE `dons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dons_user_foreign` (`user`),
  ADD KEY `dons_missing_products_foreign` (`missing_products`);

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
-- Index pour la table `missing_products`
--
ALTER TABLE `missing_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `missing_products_news_foreign` (`news`),
  ADD KEY `missing_products_products_foreign` (`products`);

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
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `dons`
--
ALTER TABLE `dons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `missing_products`
--
ALTER TABLE `missing_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `sub_admins`
--
ALTER TABLE `sub_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_news_foreign` FOREIGN KEY (`news`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `dons`
--
ALTER TABLE `dons`
  ADD CONSTRAINT `dons_missing_products_foreign` FOREIGN KEY (`missing_products`) REFERENCES `missing_products` (`id`),
  ADD CONSTRAINT `dons_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `missing_products`
--
ALTER TABLE `missing_products`
  ADD CONSTRAINT `missing_products_news_foreign` FOREIGN KEY (`news`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `missing_products_products_foreign` FOREIGN KEY (`products`) REFERENCES `product` (`id`);

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_id_zone_foreign` FOREIGN KEY (`id_zone`) REFERENCES `zones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_news_foreign` FOREIGN KEY (`news`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `zones`
--
ALTER TABLE `zones`
  ADD CONSTRAINT `zones_admin_foreign` FOREIGN KEY (`admin`) REFERENCES `sub_admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
