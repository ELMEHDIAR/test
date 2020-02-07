-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 22 jan. 2020 à 09:23
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP :  7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tamkineboursedb`
--

-- --------------------------------------------------------

--
-- Structure de la table `arefs`
--

CREATE TABLE `arefs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom_aref` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `arefs`
--

INSERT INTO `arefs` (`id`, `nom_aref`, `created_at`, `updated_at`) VALUES
(1, 'Tanger-Tetouan-Al Hoceima', NULL, NULL),
(2, 'Oriental', NULL, NULL),
(3, 'Fes-Meknes', NULL, NULL),
(4, 'Rabat-Sale-Kenitra', NULL, NULL),
(5, 'Beni Mellal-Khenifra', NULL, NULL),
(6, 'Casablanca-Settat', NULL, NULL),
(7, 'Marrakech-Safi', NULL, NULL),
(8, 'Draa-Tafilalet', NULL, NULL),
(9, 'Souss-Massa', NULL, NULL),
(10, 'Guelmim-Oued Noun', NULL, NULL),
(11, 'Laayoune-Sakia El Hamra', NULL, NULL),
(12, 'Dakhla-Oued Ed-Dahab', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `directionprovinciales`
--

CREATE TABLE `directionprovinciales` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom_direction` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_aref_fk` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `directionprovinciales`
--

INSERT INTO `directionprovinciales` (`id`, `nom_direction`, `id_aref_fk`, `created_at`, `updated_at`) VALUES
(1, 'Direction Provinciale de Tanger-Assilah', 1, NULL, NULL),
(2, 'Direction Provinciale de M\'diq-Fnideq', 1, NULL, NULL),
(3, 'Direction Provinciale de Tetouan', 1, NULL, NULL),
(4, 'Direction Provinciale de Fahs-Anjra', 1, NULL, NULL),
(5, 'Direction Provinciale de Larache', 1, NULL, NULL),
(6, 'Direction Provinciale d\'Al Hoceima', 1, NULL, NULL),
(7, 'Direction Provinciale de Chefchaouen', 1, NULL, NULL),
(8, 'Direction Provincial de Ouezzane', 1, NULL, NULL),
(9, 'Direction Provincial de Nador', 2, NULL, NULL),
(10, 'Direction Provincial de Driouch', 2, NULL, NULL),
(11, 'Direction Provincial de Jerada', 2, NULL, NULL),
(12, 'Direction Provincial de Berkane', 2, NULL, NULL),
(13, 'Direction Provincial de Taourirt', 2, NULL, NULL),
(14, 'Direction Provincial de Guercif', 2, NULL, NULL),
(15, 'Direction Provincial de Figuig', 2, NULL, NULL),
(16, 'Direction Provincial de Fes', 3, NULL, NULL),
(17, 'Direction Provincial de Taza', 3, NULL, NULL),
(18, 'Direction Provincial dEl Hajeb', 3, NULL, NULL),
(19, 'Direction Provincial dIfrane', 3, NULL, NULL),
(20, 'Direction Provincial de Moulay Yaacoub', 3, NULL, NULL),
(21, 'Direction Provincial de Sefrou', 3, NULL, NULL),
(22, 'Direction Provincial de Boulemane', 3, NULL, NULL),
(23, 'Direction Provincial de Taounate', 3, NULL, NULL),
(24, 'Direction Provincial de Rabat', 4, NULL, NULL),
(25, 'Direction Provincial de Sale', 4, NULL, NULL),
(26, 'Direction Provincial de Skhirate-Temara', 4, NULL, NULL),
(27, 'Direction Provincial de Kenitra', 4, NULL, NULL),
(28, 'Direction Provincial de Khemisset', 4, NULL, NULL),
(29, 'Direction Provincial de Sidi Kacem', 4, NULL, NULL),
(30, 'Direction Provincial de Sidi Slimane', 4, NULL, NULL),
(31, 'Direction Provincial de Beni-Mellal', 5, NULL, NULL),
(32, 'Direction Provincial d\'Azilal', 5, NULL, NULL),
(33, 'Direction Provincial de Fquih Ben Salah', 5, NULL, NULL),
(34, 'Direction Provincial de Khenifra', 5, NULL, NULL),
(35, 'Direction Provincial de Khouribga', 5, NULL, NULL),
(36, 'Direction Provincial de Casablanca', 6, NULL, NULL),
(37, 'Direction Provincial de Mohammedia', 6, NULL, NULL),
(38, 'Direction Provincial d\'El Jadida', 6, NULL, NULL),
(39, 'Direction Provincial de Nouaceur', 6, NULL, NULL),
(40, 'Direction Provincial de Mediouna', 6, NULL, NULL),
(41, 'Direction Provincial de Benslimane', 6, NULL, NULL),
(42, 'Direction Provincial de Berrechid', 6, NULL, NULL),
(43, 'Direction Provincial de Settat', 6, NULL, NULL),
(44, 'Direction Provincial de Sidi Bennour', 6, NULL, NULL),
(45, 'Direction Provincial de Marrakech', 7, NULL, NULL),
(46, 'Direction Provincial de Chichaoua', 7, NULL, NULL),
(47, 'Direction Provincial d\'Al Haouz', 7, NULL, NULL),
(48, 'Direction Provincial d\'El Kelaa des Sraghna', 7, NULL, NULL),
(49, 'Direction Provincial d\'Essaouira', 7, NULL, NULL),
(50, 'Direction Provincial de Rehamna', 7, NULL, NULL),
(51, 'Direction Provincial de Safi', 7, NULL, NULL),
(52, 'Direction Provincial de Youssoufia', 7, NULL, NULL),
(53, 'Direction Provincial d\'Errachidia', 8, NULL, NULL),
(54, 'Direction Provincial de Ouarzazate', 8, NULL, NULL),
(55, 'Direction Provincial de Midelt', 8, NULL, NULL),
(56, 'Direction Provincial de Tinghir', 8, NULL, NULL),
(57, 'Direction Provincial de Zagora', 8, NULL, NULL),
(58, 'Direction Provincial d\'Agadir Ida-Outanane', 9, NULL, NULL),
(59, 'Direction Provincial d\'Inezgane-Ait Melloul', 9, NULL, NULL),
(60, 'Direction Provincial de Chtouka-Ait Baha', 9, NULL, NULL),
(61, 'Direction Provincial de Taroudant', 9, NULL, NULL),
(62, 'Direction Provincial de Tiznit', 9, NULL, NULL),
(63, 'Direction Provincial de Tata', 9, NULL, NULL),
(64, 'Direction Provincial de Guelmim ', 10, NULL, NULL),
(65, 'Direction Provincial d\'Assa-Zag', 10, NULL, NULL),
(66, 'Direction Provincial de Tan-Tan', 10, NULL, NULL),
(67, 'Direction Provincial de Sidi Ifni', 10, NULL, NULL),
(68, 'Direction Provincial de Laayoune', 11, NULL, NULL),
(69, 'Direction Provincial de Boujdour', 11, NULL, NULL),
(70, 'Direction Provincial de Tarfaya', 11, NULL, NULL),
(71, 'Direction Provincial d\'Es-Semara', 11, NULL, NULL),
(72, 'Direction Provincial d\'Oued Ed-Dahab', 11, NULL, NULL),
(73, 'Direction Provincial d\'Aousserd', 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `domaines`
--

CREATE TABLE `domaines` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom_domaine` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_universite_fk` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `domaines`
--

INSERT INTO `domaines` (`id`, `nom_domaine`, `id_universite_fk`, `created_at`, `updated_at`) VALUES
(1, 'Business & Management', 1, NULL, NULL),
(2, 'Sciences Sociales Et Juridiques', 1, NULL, NULL),
(3, 'Informatique', 1, NULL, NULL),
(4, 'Ingénierie', 1, NULL, NULL),
(5, 'Medécine', 2, NULL, NULL),
(6, 'Architecture', 2, NULL, NULL),
(7, 'Executive Education', 3, NULL, NULL),
(8, 'École Doctorale', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `filieres`
--

CREATE TABLE `filieres` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom_filiere` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_domaine_fk` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `filieres`
--

INSERT INTO `filieres` (`id`, `nom_filiere`, `id_domaine_fk`, `created_at`, `updated_at`) VALUES
(1, 'Business & Management', 1, NULL, NULL),
(2, 'Sciences Sociales Et Juridiques', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_bourse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_inscription` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etablissement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filiere_bac` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `situation_pere` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `situation_mere` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note_premierbac` double(8,2) NOT NULL,
  `note_examreg` double(8,2) NOT NULL,
  `annee_inscription` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `id_aref_fk` int(10) UNSIGNED DEFAULT NULL,
  `id_direction_fk` int(10) UNSIGNED DEFAULT NULL,
  `id_user_fk` int(10) UNSIGNED NOT NULL,
  `id_universite_fk` int(10) UNSIGNED NOT NULL,
  `id_domaine_fk` int(10) UNSIGNED NOT NULL,
  `id_filiere_fk` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `type_bourse`, `type_inscription`, `cin`, `date_naissance`, `telephone`, `etablissement`, `filiere_bac`, `situation_pere`, `situation_mere`, `note_premierbac`, `note_examreg`, `annee_inscription`, `featured_1`, `featured_2`, `featured_3`, `featured_4`, `pays`, `id_aref_fk`, `id_direction_fk`, `id_user_fk`, `id_universite_fk`, `id_domaine_fk`, `id_filiere_fk`, `created_at`, `updated_at`) VALUES
(14, 'bourse nationale', 'M', 'A3556611', '1996-12-15', '0236541237', 'établissement el fqit tétouani', 'svt', '2', '2', 18.87, 18.57, '2019', 'storage/images/1578471480tamkine-icon.png', 'storage/images/1578471480web site.docx', 'storage/images/1578471480liste_salles_complete.pdf', 'storage/images/1578471480Liaison et Cardinalité.docx', 'None', 12, 73, 18, 1, 2, 2, '2020-01-08 07:18:00', '2020-01-08 07:18:00'),
(15, 'bourse nationale', 'E', 'EE221114', '1996-12-23', '0645589128', 'établissement dakar', 'pc', '3', '3', 17.12, 18.90, '2019', 'storage/images/1578471616DECISION45.pdf', 'storage/images/157847161622492914472_8bf7a0f0c4_o.jpg', 'storage/images/1578471616CentralIngInf.pdf', 'storage/images/1578471616site.doc', 'SENEGALE', NULL, NULL, 19, 1, 1, 1, '2020-01-08 07:20:16', '2020-01-08 07:20:16'),
(16, 'bourse nationale', 'M', 'A121144', '1996-12-23', '0236541236', 'établissement el fqit tétouani', 's.math', '1', '1', 18.87, 18.57, '2019', 'storage/images/1578471763liste_salles_complete.pdf', 'storage/images/1578471763Liaison et Cardinalité.docx', 'storage/images/15784717631563992.jpg', 'storage/images/15784717631563992.jpg', 'None', 1, 7, 20, 1, 2, 2, '2020-01-08 07:22:43', '2020-01-08 07:22:43'),
(17, 'bourse nationale', 'M', 'A123456', '1996-12-03', '0645589127', 'établissement ibn sina', 's.math', '5', '5', 18.87, 18.25, '2019', 'storage/images/1578471999liste_salles_complete.pdf', 'storage/images/1578471999euromed de fes.docx', 'storage/images/1578471999DECISION45.pdf', 'storage/images/1578471999site.doc', 'None', 2, 9, 21, 1, 1, 1, '2020-01-08 07:26:39', '2020-01-08 07:26:39'),
(18, 'bourse nationale', 'M', 'A221144', '1996-12-25', '0236541236', 'établissement el fqit tétouani', 'svt', '2', '3', 18.87, 18.57, '2019', 'storage/images/1578655110Liaison et Cardinalité.docx', 'storage/images/157865511022492914472_8bf7a0f0c4_o.jpg', 'storage/images/1578655110liste_salles_complete.pdf', 'storage/images/1578655110tamkine.jpg', 'None', 11, 68, 30, 1, 2, 2, '2020-01-10 10:18:30', '2020-01-10 10:18:30'),
(20, 'bourse nationale', 'M', 'A355661', '10/12/1990', '0236541212', 'établissement el fqit tétouani', 'svt', '1', '1', 17.12, 18.57, '2020', 'storage/images/157951829022492914472_8bf7a0f0c4_o.jpg', 'storage/images/15795182901563992.jpg', 'storage/images/1579518290DECISION45.pdf', 'storage/images/1579518290Liaison et Cardinalité.docx', 'None', 1, 2, 31, 1, 1, 1, '2020-01-20 10:04:50', '2020-01-20 10:04:50'),
(21, 'bourse nationale', 'E', 'EE221155', '05/10/2000', '0236541285', 'établissement bamako', 'svt', '2', '2', 18.87, 18.90, '2020', 'storage/images/157953095022492914472_8bf7a0f0c4_o.jpg', 'storage/images/1579530950euromed de fes.docx', 'storage/images/1579530950Liaison et Cardinalité.docx', 'storage/images/1579530950CentralIngInf.pdf', 'MALI', NULL, NULL, 32, 1, 1, 1, '2020-01-20 13:35:50', '2020-01-20 13:35:50'),
(22, 'bourse nationale', 'M', 'A221144', '21/02/2005', '0645589128', 'établissement dakar', 'pc', '1', '1', 15.00, 17.58, '2020', 'storage/images/15795336361563992.jpg', 'storage/images/1579533636CentralIngInf.pdf', 'storage/images/1579533636gyr.png', 'storage/images/1579533636gyr.png', 'None', 12, 73, 33, 1, 2, 2, '2020-01-20 14:20:36', '2020-01-20 14:20:36');

-- --------------------------------------------------------

--
-- Structure de la table `inscriptionsuite`
--

CREATE TABLE `inscriptionsuite` (
  `id` int(10) UNSIGNED NOT NULL,
  `note_bac` float NOT NULL,
  `featured_01` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_02` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_inscriptions_fk` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `inscriptionsuite`
--

INSERT INTO `inscriptionsuite` (`id`, `note_bac`, `featured_01`, `featured_02`, `id_inscriptions_fk`, `created_at`, `updated_at`) VALUES
(4, 18, 'storage/suite/1578471508DECISION45.pdf', 'storage/suite/1578471508sss.png', 14, '2020-01-08 07:18:28', '2020-01-08 07:18:28'),
(5, 19, 'storage/suite/1578471651liste_salles_complete.pdf', 'storage/suite/1578471651site.doc', 15, '2020-01-08 07:20:51', '2020-01-08 07:20:51'),
(6, 18.5, 'storage/suite/1578471858Liaison et Cardinalité.docx', 'storage/suite/1578471858liste_salles_complete.pdf', 16, '2020-01-08 07:24:18', '2020-01-08 07:24:18'),
(7, 19, 'storage/suite/1578472017CentralIngInf.pdf', 'storage/suite/1578472017liste_salles_complete.pdf', 17, '2020-01-08 07:26:57', '2020-01-08 07:26:57'),
(8, 19, 'storage/suite/1578655210CentralIngInf.pdf', 'storage/suite/1578655210DECISION45.pdf', 18, '2020-01-10 10:20:10', '2020-01-10 10:20:10'),
(9, 18, 'storage/suite/1579533394gyr.png', 'storage/suite/1579533394gyr.png', 21, '2020-01-20 14:16:34', '2020-01-20 14:16:34');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_11_155107_create_arefs_table', 1),
(4, '2019_12_11_155156_create_directionprovinciales_table', 1),
(5, '2019_12_11_155628_create_universites_table', 1),
(6, '2019_12_11_155730_create_domaines_table', 1),
(7, '2019_12_12_085400_create_filieres_table', 1),
(8, '2019_12_14_171758_create_inscriptioninternes_table', 1),
(9, '2020_01_07_081453_create_inscriptionsuite_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `universites`
--

CREATE TABLE `universites` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom_universite` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `universites`
--

INSERT INTO `universites` (`id`, `nom_universite`, `created_at`, `updated_at`) VALUES
(1, 'Université Internationale de Rabat', NULL, NULL),
(2, 'Université Euro-Méditerranéenne de Fès', NULL, NULL),
(3, 'Université Al Akhawayn', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `prenom`, `nom`, `role`, `email`, `email_verified_at`, `adresse`, `ville`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(18, 'othmane', 'sirajy', NULL, 'sirajy.othmane@gmail.com', NULL, 'rue 18', 'salé', '$2y$10$yBs4vw//PM2OEx0IcFbREeWZzYpu9fa0ZtiTv9xNCLORi48lp/5DK', 'nI84p5C4t3ighcFMRDdbGvEp6jOUJcTiDrRz5jVkSYzRoV8xk4v1ngTMrzKj', '2020-01-08 07:15:24', '2020-01-08 07:15:24'),
(19, 'sadio', 'mane', NULL, 'sadio@gmail.com', NULL, 'rue 17', 'dakar', '$2y$10$X2A69UixeZas5CPT7/71Ge7hEMuNPdlJtZ870tj4NDZXcsA977GJ6', 'ztQvtieeNGM0sKQVaWUbkmqXsatvGbcbBVAwEU3RBQl1x71MS74uYlD4c0pM', '2020-01-08 07:18:57', '2020-01-08 07:18:57'),
(20, 'mohammed', 'yazid', NULL, 'mohammed@gmail.com', NULL, 'rue 17', 'rabat', '$2y$10$NlKSvs4u7mKdM906e4eJWOEw1F23KM9uQS4n.CuRAv2KAJKJ.iZEy', 'mwFU9ZarMVsfUaFl0acgHaqhuBBUoNOoxc0qQKd4a9bxhLJFNtAWb71ZOMYg', '2020-01-08 07:21:22', '2020-01-08 07:21:22'),
(21, 'khadija', 'zoufi', NULL, 'khadija@gmail.com', NULL, 'rue 17', 'salé', '$2y$10$8gV02.1nMkQ1tsMatVvave.a7aBdkjig3igB67C.KJXnbGIUL.uke', 'iNj49ivA3bQZCuOTn4agMDokWjM6rjKeLvzXBBrUrb8Pb2fzQHJNwBtq0ihO', '2020-01-08 07:24:46', '2020-01-08 07:24:46'),
(22, 'admin', 'admin', 'admin', 'admin@gmail.com', NULL, 'rue 18', 'rabat', '$2y$10$9v3IOImDvFWXVcPD1ZamgO4RSP37HynDV33NXjb7pQFLZCSnFAXIK', 'kkhTERa4JzSnDUTcOB6c1QziJuAF1COItVaaTYeEfzEKVPDk7S4NC6wkdMtw', '2020-01-08 07:27:28', '2020-01-08 07:27:28'),
(30, 'abdellah', 'abdellah', NULL, 'abdellah@gmail.com', NULL, 'rue 18', 'rabat', '$2y$10$rCiVAAIVrkGZ2kFlHbUh9Owjl3oNn7znLmGLVJnVzHe9L1k3kzAH2', 'FeCOXvQ1g2Co5lynzn0q4pJijfjhaG3dAN4Uj0wPU88uKH436QmZMJl2CJw3', '2020-01-10 10:14:15', '2020-01-10 10:14:15'),
(31, 'ismail', 'kheir eddine', NULL, 'ismail@gmail.com', NULL, 'rue 18', 'Rabat', '$2y$10$Z7d3y28YyMW3fV4HlmD33.wEpQcuKfur/KzdUGjBFs.JA9FMT8KFy', 'k6VFhg3zIx3QvWzZWrJICSZ9PCFHnAIFX5OF5X1aNx96zBUss3YtEr5yam5Z', '2020-01-14 07:50:01', '2020-01-14 07:50:01'),
(32, 'sido', 'keita', NULL, 'sido@gmail.com', NULL, 'rue 17', 'bamako', '$2y$10$npZTtg9GAvWIUzcQB5u9XO/Ca0aJ0KRenmHCCNIIHVfQ9Q4ayDG2i', 'm6GLDyiwl5rUdaRgkUDXpO82SKWUlG4fVsT4KrH0BOVi3aZEDBkgkuzQGdzT', '2020-01-20 13:34:33', '2020-01-20 13:34:33'),
(33, 'test', 'hghjk', NULL, 'mail@gmail.com', NULL, 'jksdjsk', 'ksdsk', '$2y$10$5JiEn7HYcSOTwj5GnKzFFOSlwJAxXdKP3XcglnOaMhRep6BsY/Rnm', 'ZHy44PRImNOHhWOeFfFTXJlLtxScrj2lPIhaNKYSPXJvrxT30wJjAHplRDzh', '2020-01-20 14:19:28', '2020-01-20 14:19:28');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `arefs`
--
ALTER TABLE `arefs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `directionprovinciales`
--
ALTER TABLE `directionprovinciales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `directionprovinciales_id_aref_fk_foreign` (`id_aref_fk`);

--
-- Index pour la table `domaines`
--
ALTER TABLE `domaines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `domaines_id_universite_fk_foreign` (`id_universite_fk`);

--
-- Index pour la table `filieres`
--
ALTER TABLE `filieres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filieres_id_domaine_fk_foreign` (`id_domaine_fk`);

--
-- Index pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inscriptions_id_aref_fk_foreign` (`id_aref_fk`),
  ADD KEY `inscriptions_id_direction_fk_foreign` (`id_direction_fk`),
  ADD KEY `inscriptions_id_domaine_fk_foreign` (`id_domaine_fk`),
  ADD KEY `inscriptions_id_universite_fk_foreign` (`id_universite_fk`),
  ADD KEY `inscriptions_id_filiere_fk_foreign` (`id_filiere_fk`);

--
-- Index pour la table `inscriptionsuite`
--
ALTER TABLE `inscriptionsuite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inscriptionsuite_id_inscriptions_fk_foreign` (`id_inscriptions_fk`);

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
-- Index pour la table `universites`
--
ALTER TABLE `universites`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT pour la table `arefs`
--
ALTER TABLE `arefs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `directionprovinciales`
--
ALTER TABLE `directionprovinciales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT pour la table `domaines`
--
ALTER TABLE `domaines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `filieres`
--
ALTER TABLE `filieres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `inscriptionsuite`
--
ALTER TABLE `inscriptionsuite`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `universites`
--
ALTER TABLE `universites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `directionprovinciales`
--
ALTER TABLE `directionprovinciales`
  ADD CONSTRAINT `directionprovinciales_id_aref_fk_foreign` FOREIGN KEY (`id_aref_fk`) REFERENCES `arefs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `domaines`
--
ALTER TABLE `domaines`
  ADD CONSTRAINT `domaines_id_universite_fk_foreign` FOREIGN KEY (`id_universite_fk`) REFERENCES `universites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `filieres`
--
ALTER TABLE `filieres`
  ADD CONSTRAINT `filieres_id_domaine_fk_foreign` FOREIGN KEY (`id_domaine_fk`) REFERENCES `domaines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `inscriptions_id_aref_fk_foreign` FOREIGN KEY (`id_aref_fk`) REFERENCES `arefs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscriptions_id_direction_fk_foreign` FOREIGN KEY (`id_direction_fk`) REFERENCES `directionprovinciales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscriptions_id_domaine_fk_foreign` FOREIGN KEY (`id_domaine_fk`) REFERENCES `domaines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscriptions_id_filiere_fk_foreign` FOREIGN KEY (`id_filiere_fk`) REFERENCES `filieres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscriptions_id_universite_fk_foreign` FOREIGN KEY (`id_universite_fk`) REFERENCES `universites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `inscriptionsuite`
--
ALTER TABLE `inscriptionsuite`
  ADD CONSTRAINT `inscriptionsuite_id_inscriptions_fk_foreign` FOREIGN KEY (`id_inscriptions_fk`) REFERENCES `inscriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
