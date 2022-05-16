-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 16 mai 2022 à 15:02
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetelearningchat`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'backend', 'backend programmation', NULL, NULL),
(2, 'frontend', 'frontend programming languages', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `chapters`
--

CREATE TABLE `chapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateCreation` date DEFAULT NULL,
  `formation_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chapters`
--

INSERT INTO `chapters` (`id`, `title`, `dateCreation`, `formation_id`, `created_at`, `updated_at`) VALUES
(10, 'les basics de laravel 8', '2022-05-04', 7, '2022-05-04 22:05:57', '2022-05-04 22:05:57'),
(11, 'introduction', '2022-05-04', 7, '2022-05-04 22:25:01', '2022-05-04 22:25:01'),
(12, 'introduction javacript', '2022-05-04', 8, '2022-05-04 22:42:13', '2022-05-04 22:42:13'),
(14, 'introduction asp.net', '2022-05-05', 11, '2022-05-05 12:06:54', '2022-05-05 12:06:54');

-- --------------------------------------------------------

--
-- Structure de la table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` bigint(20) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `type`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
(1677115276, 'user', 1, 5, 'hello', NULL, 0, '2022-04-27 10:16:27', '2022-04-27 10:16:27'),
(1728383422, 'user', 12, 5, 'hi', NULL, 0, '2022-05-05 12:25:53', '2022-05-05 12:25:53'),
(1774370394, 'user', 7, 12, 'hi teacher', NULL, 1, '2022-05-05 23:00:25', '2022-05-06 01:19:11'),
(1889883202, 'user', 5, 1, 'hi', NULL, 1, '2022-04-24 11:58:32', '2022-04-27 10:16:08'),
(2308896983, 'user', 7, 12, 'how are you', NULL, 1, '2022-05-05 23:01:11', '2022-05-06 01:19:11'),
(2603992084, 'user', 12, 5, 'how are you?', NULL, 0, '2022-05-05 12:29:42', '2022-05-05 12:29:42');

-- --------------------------------------------------------

--
-- Structure de la table `counters`
--

CREATE TABLE `counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `counters`
--

INSERT INTO `counters` (`id`, `views`, `created_at`, `updated_at`) VALUES
(110, 7, '2022-05-11 00:00:00', '2022-05-11 00:46:13'),
(111, 0, '2022-05-11 00:00:00', '2022-05-11 00:38:28'),
(112, 0, '2022-05-11 00:00:00', '2022-05-11 00:43:15'),
(113, 0, '2022-05-11 00:00:00', '2022-05-11 00:44:07');

-- --------------------------------------------------------

--
-- Structure de la table `courscomplets`
--

CREATE TABLE `courscomplets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscriber_id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `courscomplets`
--

INSERT INTO `courscomplets` (`id`, `subscriber_id`, `lesson_id`, `created_at`, `updated_at`) VALUES
(11, 19, 11, '2022-05-05 22:54:58', '2022-05-05 22:54:58');

-- --------------------------------------------------------

--
-- Structure de la table `ensafiens`
--

CREATE TABLE `ensafiens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `niveau` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statusEtudiant` enum('elimini','normal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ensafiens`
--

INSERT INTO `ensafiens` (`id`, `name`, `email`, `email_verified_at`, `niveau`, `telephone`, `statusEtudiant`, `created_at`, `updated_at`) VALUES
(1, 'hind marach', 'salma.fassi@usmba.ac.ma', NULL, 'cycle ingenieur', '0687654311', 'normal', '2022-04-24 12:04:08', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('course','site') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateCreation` date DEFAULT NULL,
  `formation_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `feedback`
--

INSERT INTO `feedback` (`id`, `type`, `description`, `dateCreation`, `formation_id`, `user_id`, `created_at`, `updated_at`) VALUES
(10, 'site', 'i love this site too much', '2022-05-05', 8, 7, NULL, '2022-05-05 23:03:55'),
(13, 'course', 'merci professeur pour ce cours', '2022-05-05', 11, 7, '2022-05-05 13:08:30', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Vendu','nonVendu') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nonVendu',
  `dateCreation` date NOT NULL,
  `duréeFormation` int(11) NOT NULL,
  `prix` double NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `prerequis` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id`, `title`, `description`, `status`, `dateCreation`, `duréeFormation`, `prix`, `photo`, `created_at`, `updated_at`, `category_id`, `user_id`, `prerequis`) VALUES
(7, 'laravel 8', 'tres utile', 'Vendu', '2022-05-05', 5, 200, '1651788983.jpg', '2022-05-04 20:57:12', '2022-05-05 23:51:50', 1, 12, 'web\r\nphp'),
(8, 'javascript', 'fonctionnement backend', 'nonVendu', '2022-05-04', 2, 200, '1651704010.jpg', '2022-05-04 22:40:10', '2022-05-04 22:40:10', 1, 14, 'web'),
(11, 'asp.net', 'tres utile', 'nonVendu', '2022-05-05', 5, 3000, '1651789185.png', '2022-05-05 11:38:17', '2022-05-05 22:19:45', 1, 12, 'c#');

-- --------------------------------------------------------

--
-- Structure de la table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('video','CoursPdf','exercice') COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fichier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateCreation` date DEFAULT NULL,
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `lessons`
--

INSERT INTO `lessons` (`id`, `type`, `title`, `fichier`, `dateCreation`, `chapter_id`, `created_at`, `updated_at`) VALUES
(11, 'video', 'views', '1651702699.mp4', NULL, 10, '2022-05-04 22:18:19', '2022-05-04 22:18:19'),
(12, 'video', 'c\'est quoi laravel ?', '1651703171.mp4', NULL, 11, '2022-05-04 22:26:11', '2022-05-04 22:26:11'),
(13, 'video', 'c\'est quoi javascript', '1651707723.mp4', NULL, 12, '2022-05-04 23:42:03', '2022-05-04 23:42:03');

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
(26, '2014_10_12_000000_create_users_table', 1),
(27, '2014_10_12_100000_create_password_resets_table', 1),
(28, '2019_08_19_000000_create_failed_jobs_table', 1),
(29, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(30, '2022_02_25_233459_create_etudiants_table', 1),
(31, '2022_02_26_121116_create_profs_table', 1),
(32, '2022_02_26_123726_create_admins_table', 1),
(33, '2022_02_26_134548_create_formations_table', 1),
(34, '2022_02_26_142049_create_categories_table', 1),
(35, '2022_02_26_143031_create_feedback_table', 1),
(36, '2022_02_26_143943_create_chapters_table', 1),
(37, '2022_02_26_160510_create_lessons_table', 1),
(38, '2022_02_26_204342_table_foreignkey_formations_table', 1),
(39, '2022_03_07_222823_table_foreignkey_profformation', 1),
(40, '2022_03_16_210111_table_ajout_prerequis', 1),
(41, '2022_03_28_153605_create_subscribers_table', 1),
(42, '2022_03_29_095345_create_suggestions_table', 1),
(43, '2022_04_04_193557_create_courscomplets_table', 1),
(44, '2022_04_12_999999_add_active_status_to_users', 1),
(45, '2022_04_12_999999_add_avatar_to_users', 1),
(46, '2022_04_12_999999_add_dark_mode_to_users', 1),
(47, '2022_04_12_999999_add_messenger_color_to_users', 1),
(48, '2022_04_12_999999_create_favorites_table', 1),
(49, '2022_04_12_999999_create_messages_table', 1),
(50, '2022_04_18_155738_create_ensafiens_table', 1),
(51, '2022_04_22_201342_create_counters_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('salmafassi72@gmail.com', '$2y$10$PkFHvACc.9GLF9JRUN1sm.LziVkgir./z6SLjbRwXyY4mPr9fh3JC', '2022-04-24 01:22:19');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `profs`
--

CREATE TABLE `profs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `formation_id` bigint(20) UNSIGNED NOT NULL,
  `progress` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `subscribers`
--

INSERT INTO `subscribers` (`id`, `user_id`, `formation_id`, `progress`, `created_at`, `updated_at`) VALUES
(19, 7, 7, 50.00, '2022-05-05 00:00:00', '2022-05-05 22:54:58'),
(21, 5, 7, 0.00, '2022-05-05 00:00:00', '2022-05-05 23:55:39');

-- --------------------------------------------------------

--
-- Structure de la table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateCreation` date DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `suggestions`
--

INSERT INTO `suggestions` (`id`, `description`, `dateCreation`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'je propose de permettre aux étudiants étrangers d\'accéder aux formations gratuitement', '2022-05-04', 14, '2022-05-04 22:46:35', '2022-05-04 22:46:35'),
(5, 'je suis interesse d\'offrir des cours gratuites a tous les etudiants', '2022-05-04', 12, '2022-05-06 00:21:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'placeholder.png',
  `nomUniversity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spécialité` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `niveau` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statusEtudiant` enum('elimini','normal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AppModelsEtudiant',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#2180f3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `nomUniversity`, `spécialité`, `niveau`, `description`, `telephone`, `statusEtudiant`, `type`, `remember_token`, `created_at`, `updated_at`, `active_status`, `avatar`, `dark_mode`, `messenger_color`) VALUES
(5, 'salma fassi', 'salmafassi72@gmail.com', NULL, '$2y$10$nNQ2pJg2lp28FFoM0CmAVu6qa9CKZAiKZi6oWuXBKblep1aAs.hg6', '1650836524.jpg', NULL, NULL, 'GMSA', NULL, '0678999455', 'normal', 'App\\Models\\Etudiant', NULL, '2022-04-24 11:07:17', '2022-04-24 21:56:54', 0, '0ec44c6d-6012-46a5-99da-8df0da07094d.jpg', 0, '#2180f3'),
(7, 'hind marach', 'salma.fassi@usmba.ac.ma', NULL, '$2y$10$7kMdBX/TaWaLb4ugNWdNfuCBPJSgMN15TMShX8OR/.tWu2HEuiGqK', '1651792573.jfif', NULL, NULL, 'GMSA', NULL, '0678999455', 'normal', 'App\\Models\\Etudiant', NULL, '2022-04-24 12:16:07', '2022-05-05 23:16:13', 0, 'avatar.png', 0, '#2180f3'),
(11, 'khawla', 'hajarfarsi59@gmail.com', NULL, '$2y$10$m8yNZJAwQlQCj7lAs/0IBeITVizDAXoSSRBwABLQLz1qVesVUufq6', '1651796795.jpeg', 'Ensaf', NULL, NULL, 'i love my site', '0678999455', 'normal', 'App\\Models\\Admin', NULL, NULL, '2022-05-06 00:26:35', 0, 'avatar.png', 0, '#2180f3'),
(12, 'hassan abdo', 'hassan@gmail.com', NULL, '$2y$10$TD.7xex0lst1JbUno2NBoebvVrC1NuI4pMv521JLm7IOYZLiGmGDO', '1651703466.jfif', NULL, 'informatique', NULL, 'je suis passionné de l\'informatique', '0678999466', 'normal', 'App\\Models\\prof', NULL, '2022-05-04 18:18:47', '2022-05-06 18:10:45', 0, 'avatar.png', 0, '#2180f3'),
(14, 'akram naciri', 'akram@gmail.com', NULL, '$2y$10$zv8B0gV8916.iLW.RJg8DecPcLCkBDN8GXQuu.zhD3EyAAYfVpjLC', '1651703816.webp', NULL, 'mecanique', NULL, 'la mécanique c\'est mon filière', '0699887744', 'normal', 'App\\Models\\prof', NULL, '2022-05-04 22:32:45', '2022-05-04 22:36:56', 0, 'avatar.png', 0, '#2180f3');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapters_formation_id_foreign` (`formation_id`);

--
-- Index pour la table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `courscomplets`
--
ALTER TABLE `courscomplets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courscomplets_subscriber_id_foreign` (`subscriber_id`),
  ADD KEY `courscomplets_lesson_id_foreign` (`lesson_id`);

--
-- Index pour la table `ensafiens`
--
ALTER TABLE `ensafiens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ensafiens_email_unique` (`email`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_formation_id_foreign` (`formation_id`),
  ADD KEY `feedback_user_id_foreign` (`user_id`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formations_category_id_foreign` (`category_id`),
  ADD KEY `formations_user_id_foreign` (`user_id`);

--
-- Index pour la table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_chapter_id_foreign` (`chapter_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `profs`
--
ALTER TABLE `profs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscribers_user_id_foreign` (`user_id`),
  ADD KEY `subscribers_formation_id_foreign` (`formation_id`);

--
-- Index pour la table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suggestions_user_id_foreign` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT pour la table `courscomplets`
--
ALTER TABLE `courscomplets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `ensafiens`
--
ALTER TABLE `ensafiens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT pour la table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profs`
--
ALTER TABLE `profs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_formation_id_foreign` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `courscomplets`
--
ALTER TABLE `courscomplets`
  ADD CONSTRAINT `courscomplets_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courscomplets_subscriber_id_foreign` FOREIGN KEY (`subscriber_id`) REFERENCES `subscribers` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_formation_id_foreign` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedback_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `formations`
--
ALTER TABLE `formations`
  ADD CONSTRAINT `formations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `formations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `subscribers_formation_id_foreign` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscribers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `suggestions`
--
ALTER TABLE `suggestions`
  ADD CONSTRAINT `suggestions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
