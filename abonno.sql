-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 25 mai 2021 à 17:43
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `abonno`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnementciviles`
--

CREATE TABLE `abonnementciviles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` int(11) DEFAULT NULL,
  `datenaissance` date DEFAULT NULL,
  `stationdebut` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stationfin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prixtotale` double(8,2) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `cartereference` int(11) DEFAULT NULL,
  `profileimage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `companie_id` bigint(20) UNSIGNED DEFAULT NULL,
  `region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `municipalite_id` bigint(20) UNSIGNED DEFAULT NULL,
  `typedepaiement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ligne_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periodeabonnement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `annee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `station_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `abonnementscolaires`
--

CREATE TABLE `abonnementscolaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenomabonne` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomparent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenomparent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datenaissance` date DEFAULT NULL,
  `stationdebut` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stationfin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prixtotale` double(8,2) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `cartereference` int(11) DEFAULT NULL,
  `profileimage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etudiant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `municipalite_id` bigint(20) UNSIGNED DEFAULT NULL,
  `niveauscolaire_id` bigint(20) UNSIGNED DEFAULT NULL,
  `classe_id` bigint(20) UNSIGNED DEFAULT NULL,
  `etablissement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `typedepaiement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `societe_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ligne_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periodeabonnement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `annee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `station_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `abonnementsociales`
--

CREATE TABLE `abonnementsociales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomparent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenomparent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` int(11) DEFAULT NULL,
  `datenaissance` date DEFAULT NULL,
  `prixtotale` double(8,2) DEFAULT NULL,
  `stationdebut` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stationfin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `cartereference` int(11) DEFAULT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profileimage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etudiant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `municipalite_id` bigint(20) UNSIGNED DEFAULT NULL,
  `niveauscolaire_id` bigint(20) UNSIGNED DEFAULT NULL,
  `classe_id` bigint(20) UNSIGNED DEFAULT NULL,
  `etablissement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `typedepaiement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ligne_id` bigint(20) UNSIGNED DEFAULT NULL,
  `periodeabonnement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `annee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `station_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'user', 'you have  created user', 'App\\User', 1, NULL, NULL, '{\"attributes\":{\"name\":\"admin\",\"email\":\"admin@gmail.com\",\"password\":\"$2y$10$qgWSLUMTWJ9x00.bv\\/qsWetJz0yDTa.uP6FznJS.qzDMuRw4cMWem\"}}', '2021-05-20 15:26:42', '2021-05-20 15:26:42'),
(2, 'user', 'you have  created user', 'App\\User', 2, NULL, NULL, '{\"attributes\":{\"name\":\"superviseur\",\"email\":\"superviseur@gmail.com\",\"password\":\"$2y$10$WsXTUcgr0nFG.AQkC07COOD.ENb4gR5q3x4kouGhJVsPyIc1ZD5Ny\"}}', '2021-05-20 15:26:42', '2021-05-20 15:26:42'),
(3, 'user', 'you have  created user', 'App\\User', 3, NULL, NULL, '{\"attributes\":{\"name\":\"utilisateur\",\"email\":\"utilisateur@utilisateur.com\",\"password\":\"$2y$10$Me0rdvoOKRH2lfnB\\/r\\/X.e9wfiDWjqpYsWdqC0xscmUFPnFoL5hfa\"}}', '2021-05-20 15:26:42', '2021-05-20 15:26:42'),
(4, 'user', 'you have  created user', 'App\\User', 4, NULL, NULL, '{\"attributes\":{\"name\":\"superadmin\",\"email\":\"superadmin@gmail.com\",\"password\":\"$2y$10$CXawsWoCgN5Maj27csBE7uOXUKu1dHl5cr06wpU.0K2aJARxj.eCi\"}}', '2021-05-20 15:26:42', '2021-05-20 15:26:42');

-- --------------------------------------------------------

--
-- Structure de la table `agences`
--

CREATE TABLE `agences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_fr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `municipalite_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `agences`
--

INSERT INTO `agences` (`id`, `nom_fr`, `nom_ar`, `code`, `adresse`, `latitude`, `longitude`, `municipalite_id`, `created_at`, `updated_at`) VALUES
(1, 'admin a admin', 'admin a admin', 2147483647, 'ben arous', '37.11816878088743', '1222', 1, '2021-05-25 08:12:25', '2021-05-25 08:12:25');

-- --------------------------------------------------------

--
-- Structure de la table `annees`
--

CREATE TABLE `annees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annees`
--

INSERT INTO `annees` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, '2021/2022', '2021-05-24 12:04:51', '2021-05-24 12:04:51');

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marque` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_circulation` date DEFAULT NULL,
  `place_number` int(11) DEFAULT NULL,
  `condition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ligne_id` bigint(20) UNSIGNED DEFAULT NULL,
  `etat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`id`, `nom`, `marque`, `date_circulation`, `place_number`, `condition`, `comment`, `ligne_id`, `etat_id`, `created_at`, `updated_at`) VALUES
(1, 'admin a admin', 'vww', '1990-01-12', 5, 'aaaaaaaaaaaa', 'med', NULL, 1, '2021-05-24 08:56:26', '2021-05-24 08:56:26');

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'secondaire', '2021-05-24 08:18:20', '2021-05-24 08:18:20'),
(2, 'admin a admin', '2021-05-25 07:03:45', '2021-05-25 07:03:45');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomabonne` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenomabonne` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profileimage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomparent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenomparent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prixtotale` int(11) DEFAULT NULL,
  `clientstype_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ligne_id` bigint(20) UNSIGNED DEFAULT NULL,
  `classe_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `clientstypes`
--

CREATE TABLE `clientstypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_fr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clientstypes`
--

INSERT INTO `clientstypes` (`id`, `nom_fr`, `nom_ar`, `created_at`, `updated_at`) VALUES
(1, 'aaaa', 'aaaa', '2021-05-24 08:18:43', '2021-05-24 08:18:43');

-- --------------------------------------------------------

--
-- Structure de la table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_fr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etablissements`
--

CREATE TABLE `etablissements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_fr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typesetablissement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `municipalite_id` bigint(20) UNSIGNED DEFAULT NULL,
  `niveauscolaire_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etablissements`
--

INSERT INTO `etablissements` (`id`, `nom_fr`, `nom_ar`, `adresse`, `typesetablissement_id`, `municipalite_id`, `niveauscolaire_id`, `created_at`, `updated_at`) VALUES
(1, 'admin a admin', 'admin a admin', 'ben arous', 1, 1, 1, '2021-05-24 09:53:20', '2021-05-24 09:53:20');

-- --------------------------------------------------------

--
-- Structure de la table `etats`
--

CREATE TABLE `etats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etats`
--

INSERT INTO `etats` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'marche', '2021-05-24 08:55:23', '2021-05-24 08:55:23'),
(2, 'panne', '2021-05-24 08:55:31', '2021-05-24 08:55:31');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'admin a admin', '2021-05-25 06:46:05', '2021-05-25 06:46:05');

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
-- Structure de la table `holograms`
--

CREATE TABLE `holograms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `stockalert` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lignes`
--

CREATE TABLE `lignes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_fr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double(8,2) DEFAULT NULL,
  `lignedebut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lignefin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `lignes`
--

INSERT INTO `lignes` (`id`, `nom_fr`, `nom_ar`, `num`, `distance`, `prix`, `lignedebut`, `lignefin`, `created_at`, `updated_at`) VALUES
(9, 'admin a admin', 'admin a admin', '5', '1111', 11.11, 'kkkk', 'aaaa', '2021-05-25 10:32:53', '2021-05-25 10:32:53');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_station`
--

CREATE TABLE `ligne_station` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ligne_id` bigint(20) UNSIGNED DEFAULT NULL,
  `station_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ligne_station`
--

INSERT INTO `ligne_station` (`id`, `ligne_id`, `station_id`, `created_at`, `updated_at`) VALUES
(9, 9, 10, '2021-05-25 10:32:53', '2021-05-25 10:32:53');

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_type` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `causer_type` bigint(20) UNSIGNED NOT NULL,
  `causer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_03_05_112639_create_classes_table', 1),
(4, '2021_03_08_101256_create_lignes_table', 1),
(5, '2021_03_09_074139_create_logs_table', 1),
(6, '2021_03_09_080928_create_stock__responses_table', 1),
(7, '2021_03_09_083448_create_stock_requests_table', 1),
(8, '2021_03_09_090222_create_stock_agencies_table', 1),
(9, '2021_03_09_091320_create_stock_returns_table', 1),
(10, '2021_03_10_072346_create_stock_cards_table', 1),
(11, '2021_03_10_074347_create_stock_holograms_table', 1),
(12, '2021_03_10_075628_create_stockreturn_holograms_table', 1),
(13, '2021_03_10_080212_create_stockreturn_cards_table', 1),
(14, '2021_03_10_080922_create_stockrequest_holograms_table', 1),
(15, '2021_03_10_082326_create_stockrequest_cards_table', 1),
(16, '2021_03_10_083811_create_returnreasonholograms_table', 1),
(17, '2021_03_10_085841_create_returnreasoncards_table', 1),
(18, '2021_03_10_090150_create_stockresponsecards_table', 1),
(19, '2021_03_10_090659_create_stockresponseholograms_table', 1),
(20, '2021_03_12_065709_create_regions_table', 1),
(21, '2021_03_12_105648_create_niveauscolaires_table', 1),
(22, '2021_03_12_133300_create_holograms_table', 1),
(23, '2021_03_12_145154_createtypesetablissements__table', 1),
(24, '2021_03_13_190709_create_levels_table', 1),
(25, '2021_03_13_195414_create_clientstypes_table', 1),
(26, '2021_03_14_085237_create_etats_table', 1),
(27, '2021_03_15_072201_create_companies_table', 1),
(28, '2021_03_15_082839_create_typedepaiements_table', 1),
(29, '2021_03_15_104809_create_municipalites_table', 1),
(30, '2021_03_17_062531_create_periodeabonnements_table', 1),
(31, '2021_03_17_075621_create_etablissements_table', 1),
(32, '2021_03_17_111456_create_subscriptiontypes_table', 1),
(33, '2021_03_18_080628_create_clients_table', 1),
(34, '2021_03_18_150702_create_cars_table', 1),
(35, '2021_03_19_212832_create_annees_table', 1),
(36, '2021_03_21_102123_create_studydetails_table', 1),
(37, '2021_03_23_133359_create_socials_table', 1),
(38, '2021_03_25_093947_create_roles_table', 1),
(39, '2021_03_25_094804_create_role_user_table', 1),
(40, '2021_04_01_101201_create_agences_table', 1),
(41, '2021_04_02_072139_create_users_table', 1),
(42, '2021_04_03_105755_create_stations_table', 1),
(43, '2021_04_05_102502_create_etudiants_table', 1),
(44, '2021_04_05_134239_create_societes_table', 1),
(45, '2021_04_06_105626_create_abonnementscolaires_table', 1),
(46, '2021_04_08_140739_create_abonnementciviles_table', 1),
(47, '2021_04_09_082334_create_abonnementsociales_table', 1),
(48, '2021_05_02_094112_create_ligne_station_table', 1),
(49, '2021_05_16_092356_create_activity_log_table', 1),
(50, '2021_05_19_125521_create_outlets_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `municipalites`
--

CREATE TABLE `municipalites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_fr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `municipalites`
--

INSERT INTO `municipalites` (`id`, `nom_fr`, `nom_ar`, `adresse`, `region_id`, `created_at`, `updated_at`) VALUES
(1, 'admin a admin', 'admin a admin', 'ben arous', 1, '2021-05-24 09:50:00', '2021-05-24 09:50:00'),
(2, 'admin a admin', 'admin a admin', 'ben arous', 1, '2021-05-24 13:49:46', '2021-05-24 13:49:46');

-- --------------------------------------------------------

--
-- Structure de la table `niveauscolaires`
--

CREATE TABLE `niveauscolaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_fr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `niveauscolaires`
--

INSERT INTO `niveauscolaires` (`id`, `nom_fr`, `nom_ar`, `created_at`, `updated_at`) VALUES
(1, 'admin a admin', 'admin a admin', '2021-05-24 09:49:48', '2021-05-24 09:49:48');

-- --------------------------------------------------------

--
-- Structure de la table `outlets`
--

CREATE TABLE `outlets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Structure de la table `periodeabonnements`
--

CREATE TABLE `periodeabonnements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `datedebut` date DEFAULT NULL,
  `datefin` date DEFAULT NULL,
  `periode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `periodeabonnements`
--

INSERT INTO `periodeabonnements` (`id`, `datedebut`, `datefin`, `periode`, `created_at`, `updated_at`) VALUES
(1, '1990-01-12', '1992-02-12', 'aaa', '2021-05-24 13:05:53', '2021-05-24 13:05:53'),
(2, '1992-01-12', '1995-02-12', 'ssss', '2021-05-24 13:17:20', '2021-05-24 13:23:47');

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_fr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `nom_fr`, `nom_ar`, `created_at`, `updated_at`) VALUES
(1, 'admin a admin', 'admin a admin', '2021-05-24 09:49:36', '2021-05-24 09:49:36');

-- --------------------------------------------------------

--
-- Structure de la table `returnreasoncards`
--

CREATE TABLE `returnreasoncards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_fr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `returnreasonholograms`
--

CREATE TABLE `returnreasonholograms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_fr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-05-20 15:26:40', '2021-05-20 15:26:40'),
(2, 'superviseur', '2021-05-20 15:26:40', '2021-05-20 15:26:40'),
(3, 'superadmin', '2021-05-20 15:26:40', '2021-05-20 15:26:40'),
(4, 'utilisateur', '2021-05-20 15:26:40', '2021-05-20 15:26:40');

-- --------------------------------------------------------

--
-- Structure de la table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 3, NULL, NULL),
(4, 4, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomparent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenomparent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomabonne` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenomabonne` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cin` int(11) NOT NULL,
  `nombrenfants` int(11) DEFAULT NULL,
  `nomenfant1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomenfant2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomenfant3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomenfant4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomenfant5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomenfant6` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomenfant7` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ligne_id` bigint(20) UNSIGNED DEFAULT NULL,
  `classe_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `societes`
--

CREATE TABLE `societes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stations`
--

CREATE TABLE `stations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_fr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ligne_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stations`
--

INSERT INTO `stations` (`id`, `nombre`, `nom_fr`, `nom_ar`, `adresse`, `latitude`, `longitude`, `ligne_id`, `created_at`, `updated_at`) VALUES
(10, '3', 'mohamed haouali', 'mohamed haouali', 'ben arous', '36.775604992173825', '9.756314720530924', NULL, '2021-05-25 10:08:36', '2021-05-25 10:08:36');

-- --------------------------------------------------------

--
-- Structure de la table `stockrequest_cards`
--

CREATE TABLE `stockrequest_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numeroordre` int(11) DEFAULT NULL,
  `numerocommande` int(11) NOT NULL,
  `cards_id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `agencies_id` bigint(20) UNSIGNED NOT NULL,
  `deliverydate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stockrequest_holograms`
--

CREATE TABLE `stockrequest_holograms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numeroordre` int(11) DEFAULT NULL,
  `numerocommande` int(11) NOT NULL,
  `agencies_id` bigint(20) UNSIGNED NOT NULL,
  `holograms_id` bigint(20) UNSIGNED NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `deliverydate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stockresponsecards`
--

CREATE TABLE `stockresponsecards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stockrequest_cards_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beginnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliverydate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stockresponseholograms`
--

CREATE TABLE `stockresponseholograms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stockrequest_holograms_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beginnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliverydate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stockreturn_cards`
--

CREATE TABLE `stockreturn_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agencies_id` bigint(20) UNSIGNED NOT NULL,
  `cards_id` bigint(20) UNSIGNED NOT NULL,
  `returnreasoncards_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stockreturn_holograms`
--

CREATE TABLE `stockreturn_holograms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agencies_id` bigint(20) UNSIGNED NOT NULL,
  `holograms_id` bigint(20) UNSIGNED NOT NULL,
  `returnreasonholograms_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stock_agencies`
--

CREATE TABLE `stock_agencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) DEFAULT NULL,
  `stock_alert` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `agencies_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stock_cards`
--

CREATE TABLE `stock_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agencies_id` bigint(20) UNSIGNED NOT NULL,
  `numeroordre` int(11) DEFAULT NULL,
  `card_id` bigint(20) UNSIGNED NOT NULL,
  `stockreturncard_id` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `begin_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stock_holograms`
--

CREATE TABLE `stock_holograms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agencies_id` bigint(20) UNSIGNED NOT NULL,
  `numeroordre` int(11) DEFAULT NULL,
  `holograms_id` bigint(20) UNSIGNED NOT NULL,
  `stockreturholgrams_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stock_requests`
--

CREATE TABLE `stock_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stock_responses`
--

CREATE TABLE `stock_responses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `begin_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `stock_request_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stock_returns`
--

CREATE TABLE `stock_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` int(11) DEFAULT NULL,
  `return_reason_id` bigint(20) UNSIGNED NOT NULL,
  `cards_id` bigint(20) UNSIGNED NOT NULL,
  `agencies_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `studydetails`
--

CREATE TABLE `studydetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_id` bigint(20) UNSIGNED DEFAULT NULL,
  `etablissement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `subscriptiontypes`
--

CREATE TABLE `subscriptiontypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_fr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `typedepaiements`
--

CREATE TABLE `typedepaiements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_fr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `typedepaiements`
--

INSERT INTO `typedepaiements` (`id`, `nom_fr`, `nom_ar`, `created_at`, `updated_at`) VALUES
(1, 'admin a admin', 'admin a admin', '2021-05-24 12:48:42', '2021-05-24 12:48:42');

-- --------------------------------------------------------

--
-- Structure de la table `typesetablissements`
--

CREATE TABLE `typesetablissements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_fr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `typesetablissements`
--

INSERT INTO `typesetablissements` (`id`, `nom_fr`, `nom_ar`, `created_at`, `updated_at`) VALUES
(1, 'admin a admin', 'admin a admin', '2021-05-24 09:53:10', '2021-05-24 09:53:10'),
(2, 'admin a admin', 'admin a admin', '2021-05-25 07:34:13', '2021-05-25 07:34:13');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agence_id` bigint(20) UNSIGNED DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `agence_id`, `last_seen`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$qgWSLUMTWJ9x00.bv/qsWetJz0yDTa.uP6FznJS.qzDMuRw4cMWem', 1, NULL, 'user.png', NULL, '2021-05-20 15:26:42', '2021-05-20 15:26:42'),
(2, 'superviseur', 'superviseur@gmail.com', NULL, '$2y$10$WsXTUcgr0nFG.AQkC07COOD.ENb4gR5q3x4kouGhJVsPyIc1ZD5Ny', 1, NULL, 'user.png', NULL, '2021-05-20 15:26:42', '2021-05-20 15:26:42'),
(3, 'utilisateur', 'utilisateur@utilisateur.com', NULL, '$2y$10$Me0rdvoOKRH2lfnB/r/X.e9wfiDWjqpYsWdqC0xscmUFPnFoL5hfa', 1, NULL, 'user.png', NULL, '2021-05-20 15:26:42', '2021-05-20 15:26:42'),
(4, 'superadmin', 'superadmin@gmail.com', NULL, '$2y$10$CXawsWoCgN5Maj27csBE7uOXUKu1dHl5cr06wpU.0K2aJARxj.eCi', 1, NULL, 'user.png', NULL, '2021-05-20 15:26:42', '2021-05-20 15:26:42');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnementciviles`
--
ALTER TABLE `abonnementciviles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abonnementciviles_companie_id_foreign` (`companie_id`),
  ADD KEY `abonnementciviles_region_id_foreign` (`region_id`),
  ADD KEY `abonnementciviles_municipalite_id_foreign` (`municipalite_id`),
  ADD KEY `abonnementciviles_typedepaiement_id_foreign` (`typedepaiement_id`),
  ADD KEY `abonnementciviles_ligne_id_foreign` (`ligne_id`),
  ADD KEY `abonnementciviles_periodeabonnement_id_foreign` (`periodeabonnement_id`),
  ADD KEY `abonnementciviles_annee_id_foreign` (`annee_id`),
  ADD KEY `abonnementciviles_station_id_foreign` (`station_id`);

--
-- Index pour la table `abonnementscolaires`
--
ALTER TABLE `abonnementscolaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abonnementscolaires_etudiant_id_foreign` (`etudiant_id`),
  ADD KEY `abonnementscolaires_region_id_foreign` (`region_id`),
  ADD KEY `abonnementscolaires_municipalite_id_foreign` (`municipalite_id`),
  ADD KEY `abonnementscolaires_niveauscolaire_id_foreign` (`niveauscolaire_id`),
  ADD KEY `abonnementscolaires_classe_id_foreign` (`classe_id`),
  ADD KEY `abonnementscolaires_etablissement_id_foreign` (`etablissement_id`),
  ADD KEY `abonnementscolaires_typedepaiement_id_foreign` (`typedepaiement_id`),
  ADD KEY `abonnementscolaires_societe_id_foreign` (`societe_id`),
  ADD KEY `abonnementscolaires_ligne_id_foreign` (`ligne_id`),
  ADD KEY `abonnementscolaires_periodeabonnement_id_foreign` (`periodeabonnement_id`),
  ADD KEY `abonnementscolaires_annee_id_foreign` (`annee_id`),
  ADD KEY `abonnementscolaires_station_id_foreign` (`station_id`);

--
-- Index pour la table `abonnementsociales`
--
ALTER TABLE `abonnementsociales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abonnementsociales_etudiant_id_foreign` (`etudiant_id`),
  ADD KEY `abonnementsociales_region_id_foreign` (`region_id`),
  ADD KEY `abonnementsociales_municipalite_id_foreign` (`municipalite_id`),
  ADD KEY `abonnementsociales_niveauscolaire_id_foreign` (`niveauscolaire_id`),
  ADD KEY `abonnementsociales_classe_id_foreign` (`classe_id`),
  ADD KEY `abonnementsociales_etablissement_id_foreign` (`etablissement_id`),
  ADD KEY `abonnementsociales_typedepaiement_id_foreign` (`typedepaiement_id`),
  ADD KEY `abonnementsociales_ligne_id_foreign` (`ligne_id`),
  ADD KEY `abonnementsociales_periodeabonnement_id_foreign` (`periodeabonnement_id`),
  ADD KEY `abonnementsociales_annee_id_foreign` (`annee_id`),
  ADD KEY `abonnementsociales_station_id_foreign` (`station_id`);

--
-- Index pour la table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Index pour la table `agences`
--
ALTER TABLE `agences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agences_municipalite_id_foreign` (`municipalite_id`);

--
-- Index pour la table `annees`
--
ALTER TABLE `annees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cars_nom_unique` (`nom`),
  ADD KEY `cars_ligne_id_foreign` (`ligne_id`),
  ADD KEY `cars_etat_id_foreign` (`etat_id`);

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_clientstype_id_foreign` (`clientstype_id`),
  ADD KEY `clients_ligne_id_foreign` (`ligne_id`),
  ADD KEY `clients_classe_id_foreign` (`classe_id`);

--
-- Index pour la table `clientstypes`
--
ALTER TABLE `clientstypes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_nom_fr_unique` (`nom_fr`),
  ADD UNIQUE KEY `companies_nom_ar_unique` (`nom_ar`);

--
-- Index pour la table `etablissements`
--
ALTER TABLE `etablissements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etablissements_typesetablissement_id_foreign` (`typesetablissement_id`),
  ADD KEY `etablissements_municipalite_id_foreign` (`municipalite_id`),
  ADD KEY `etablissements_niveauscolaire_id_foreign` (`niveauscolaire_id`);

--
-- Index pour la table `etats`
--
ALTER TABLE `etats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `holograms`
--
ALTER TABLE `holograms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lignes`
--
ALTER TABLE `lignes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ligne_station`
--
ALTER TABLE `ligne_station`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ligne_station_ligne_id_foreign` (`ligne_id`),
  ADD KEY `ligne_station_station_id_foreign` (`station_id`);

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `municipalites`
--
ALTER TABLE `municipalites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipalites_region_id_foreign` (`region_id`);

--
-- Index pour la table `niveauscolaires`
--
ALTER TABLE `niveauscolaires`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `niveauscolaires_nom_fr_unique` (`nom_fr`),
  ADD UNIQUE KEY `niveauscolaires_nom_ar_unique` (`nom_ar`);

--
-- Index pour la table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outlets_creator_id_foreign` (`creator_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `periodeabonnements`
--
ALTER TABLE `periodeabonnements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `returnreasoncards`
--
ALTER TABLE `returnreasoncards`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `returnreasonholograms`
--
ALTER TABLE `returnreasonholograms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `socials_ligne_id_foreign` (`ligne_id`),
  ADD KEY `socials_classe_id_foreign` (`classe_id`);

--
-- Index pour la table `societes`
--
ALTER TABLE `societes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stations_ligne_id_foreign` (`ligne_id`);

--
-- Index pour la table `stockrequest_cards`
--
ALTER TABLE `stockrequest_cards`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stockrequest_holograms`
--
ALTER TABLE `stockrequest_holograms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stockresponsecards`
--
ALTER TABLE `stockresponsecards`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stockresponseholograms`
--
ALTER TABLE `stockresponseholograms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stockreturn_cards`
--
ALTER TABLE `stockreturn_cards`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stockreturn_holograms`
--
ALTER TABLE `stockreturn_holograms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stock_agencies`
--
ALTER TABLE `stock_agencies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stock_cards`
--
ALTER TABLE `stock_cards`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stock_holograms`
--
ALTER TABLE `stock_holograms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stock_requests`
--
ALTER TABLE `stock_requests`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stock_responses`
--
ALTER TABLE `stock_responses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stock_returns`
--
ALTER TABLE `stock_returns`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `studydetails`
--
ALTER TABLE `studydetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studydetails_level_id_foreign` (`level_id`),
  ADD KEY `studydetails_etablissement_id_foreign` (`etablissement_id`);

--
-- Index pour la table `subscriptiontypes`
--
ALTER TABLE `subscriptiontypes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `typedepaiements`
--
ALTER TABLE `typedepaiements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `typesetablissements`
--
ALTER TABLE `typesetablissements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_agence_id_foreign` (`agence_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnementciviles`
--
ALTER TABLE `abonnementciviles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `abonnementscolaires`
--
ALTER TABLE `abonnementscolaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `abonnementsociales`
--
ALTER TABLE `abonnementsociales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `agences`
--
ALTER TABLE `agences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `annees`
--
ALTER TABLE `annees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `clientstypes`
--
ALTER TABLE `clientstypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etablissements`
--
ALTER TABLE `etablissements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `etats`
--
ALTER TABLE `etats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `holograms`
--
ALTER TABLE `holograms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lignes`
--
ALTER TABLE `lignes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `ligne_station`
--
ALTER TABLE `ligne_station`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `municipalites`
--
ALTER TABLE `municipalites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `niveauscolaires`
--
ALTER TABLE `niveauscolaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `periodeabonnements`
--
ALTER TABLE `periodeabonnements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `returnreasoncards`
--
ALTER TABLE `returnreasoncards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `returnreasonholograms`
--
ALTER TABLE `returnreasonholograms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `societes`
--
ALTER TABLE `societes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `stockrequest_cards`
--
ALTER TABLE `stockrequest_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stockrequest_holograms`
--
ALTER TABLE `stockrequest_holograms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stockresponsecards`
--
ALTER TABLE `stockresponsecards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stockresponseholograms`
--
ALTER TABLE `stockresponseholograms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stockreturn_cards`
--
ALTER TABLE `stockreturn_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stockreturn_holograms`
--
ALTER TABLE `stockreturn_holograms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stock_agencies`
--
ALTER TABLE `stock_agencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stock_cards`
--
ALTER TABLE `stock_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stock_holograms`
--
ALTER TABLE `stock_holograms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stock_requests`
--
ALTER TABLE `stock_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stock_responses`
--
ALTER TABLE `stock_responses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stock_returns`
--
ALTER TABLE `stock_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `studydetails`
--
ALTER TABLE `studydetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `subscriptiontypes`
--
ALTER TABLE `subscriptiontypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `typedepaiements`
--
ALTER TABLE `typedepaiements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `typesetablissements`
--
ALTER TABLE `typesetablissements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `abonnementciviles`
--
ALTER TABLE `abonnementciviles`
  ADD CONSTRAINT `abonnementciviles_annee_id_foreign` FOREIGN KEY (`annee_id`) REFERENCES `annees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementciviles_companie_id_foreign` FOREIGN KEY (`companie_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementciviles_ligne_id_foreign` FOREIGN KEY (`ligne_id`) REFERENCES `lignes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementciviles_municipalite_id_foreign` FOREIGN KEY (`municipalite_id`) REFERENCES `municipalites` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementciviles_periodeabonnement_id_foreign` FOREIGN KEY (`periodeabonnement_id`) REFERENCES `periodeabonnements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementciviles_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementciviles_station_id_foreign` FOREIGN KEY (`station_id`) REFERENCES `stations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementciviles_typedepaiement_id_foreign` FOREIGN KEY (`typedepaiement_id`) REFERENCES `typedepaiements` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `abonnementscolaires`
--
ALTER TABLE `abonnementscolaires`
  ADD CONSTRAINT `abonnementscolaires_annee_id_foreign` FOREIGN KEY (`annee_id`) REFERENCES `annees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementscolaires_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementscolaires_etablissement_id_foreign` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementscolaires_etudiant_id_foreign` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementscolaires_ligne_id_foreign` FOREIGN KEY (`ligne_id`) REFERENCES `lignes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementscolaires_municipalite_id_foreign` FOREIGN KEY (`municipalite_id`) REFERENCES `municipalites` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementscolaires_niveauscolaire_id_foreign` FOREIGN KEY (`niveauscolaire_id`) REFERENCES `niveauscolaires` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementscolaires_periodeabonnement_id_foreign` FOREIGN KEY (`periodeabonnement_id`) REFERENCES `periodeabonnements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementscolaires_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementscolaires_societe_id_foreign` FOREIGN KEY (`societe_id`) REFERENCES `societes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementscolaires_station_id_foreign` FOREIGN KEY (`station_id`) REFERENCES `stations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementscolaires_typedepaiement_id_foreign` FOREIGN KEY (`typedepaiement_id`) REFERENCES `typedepaiements` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `abonnementsociales`
--
ALTER TABLE `abonnementsociales`
  ADD CONSTRAINT `abonnementsociales_annee_id_foreign` FOREIGN KEY (`annee_id`) REFERENCES `annees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementsociales_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementsociales_etablissement_id_foreign` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementsociales_etudiant_id_foreign` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementsociales_ligne_id_foreign` FOREIGN KEY (`ligne_id`) REFERENCES `lignes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementsociales_municipalite_id_foreign` FOREIGN KEY (`municipalite_id`) REFERENCES `municipalites` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementsociales_niveauscolaire_id_foreign` FOREIGN KEY (`niveauscolaire_id`) REFERENCES `niveauscolaires` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementsociales_periodeabonnement_id_foreign` FOREIGN KEY (`periodeabonnement_id`) REFERENCES `periodeabonnements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementsociales_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementsociales_station_id_foreign` FOREIGN KEY (`station_id`) REFERENCES `stations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnementsociales_typedepaiement_id_foreign` FOREIGN KEY (`typedepaiement_id`) REFERENCES `typedepaiements` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `agences`
--
ALTER TABLE `agences`
  ADD CONSTRAINT `agences_municipalite_id_foreign` FOREIGN KEY (`municipalite_id`) REFERENCES `municipalites` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_etat_id_foreign` FOREIGN KEY (`etat_id`) REFERENCES `etats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cars_ligne_id_foreign` FOREIGN KEY (`ligne_id`) REFERENCES `lignes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clients_clientstype_id_foreign` FOREIGN KEY (`clientstype_id`) REFERENCES `clientstypes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clients_ligne_id_foreign` FOREIGN KEY (`ligne_id`) REFERENCES `lignes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `etablissements`
--
ALTER TABLE `etablissements`
  ADD CONSTRAINT `etablissements_municipalite_id_foreign` FOREIGN KEY (`municipalite_id`) REFERENCES `municipalites` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `etablissements_niveauscolaire_id_foreign` FOREIGN KEY (`niveauscolaire_id`) REFERENCES `niveauscolaires` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `etablissements_typesetablissement_id_foreign` FOREIGN KEY (`typesetablissement_id`) REFERENCES `typesetablissements` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ligne_station`
--
ALTER TABLE `ligne_station`
  ADD CONSTRAINT `ligne_station_ligne_id_foreign` FOREIGN KEY (`ligne_id`) REFERENCES `lignes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ligne_station_station_id_foreign` FOREIGN KEY (`station_id`) REFERENCES `stations` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `municipalites`
--
ALTER TABLE `municipalites`
  ADD CONSTRAINT `municipalites_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `outlets`
--
ALTER TABLE `outlets`
  ADD CONSTRAINT `outlets_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `socials`
--
ALTER TABLE `socials`
  ADD CONSTRAINT `socials_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `socials_ligne_id_foreign` FOREIGN KEY (`ligne_id`) REFERENCES `lignes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `stations`
--
ALTER TABLE `stations`
  ADD CONSTRAINT `stations_ligne_id_foreign` FOREIGN KEY (`ligne_id`) REFERENCES `lignes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `studydetails`
--
ALTER TABLE `studydetails`
  ADD CONSTRAINT `studydetails_etablissement_id_foreign` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `studydetails_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_agence_id_foreign` FOREIGN KEY (`agence_id`) REFERENCES `agences` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
