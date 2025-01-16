-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 16 jan. 2025 à 21:41
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `poo-combat-plus`
--

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identifiant unique',
  `genre` varchar(10) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Genre du héros (Homme, Femme)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_genre` (`genre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id`, `genre`) VALUES
(2, 'Femme'),
(1, 'Homme');

-- --------------------------------------------------------

--
-- Structure de la table `hero`
--

DROP TABLE IF EXISTS `hero`;
CREATE TABLE IF NOT EXISTS `hero` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identifiant unique',
  `nom` varchar(15) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Nom du héros',
  `nom_perso` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Nom personnalisé du héros par le joueur',
  `PV` int NOT NULL DEFAULT '100' COMMENT 'Points de vie du héros',
  `PVMax` int NOT NULL COMMENT 'PV Max du héros',
  `MP` int NOT NULL DEFAULT '50' COMMENT 'Points de mana',
  `PMMax` int NOT NULL COMMENT 'MP Max du héros',
  `FORCE` int NOT NULL DEFAULT '10' COMMENT 'Force du héros',
  `DEFENSE` int NOT NULL DEFAULT '5' COMMENT 'Défense du héros',
  `sprite` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Image ou sprite du héros',
  `id_hero_classe` int UNSIGNED DEFAULT NULL COMMENT 'Classe du héros (référence à hero_classe)',
  `id_genre` int UNSIGNED DEFAULT NULL COMMENT 'Genre du héros (référence à genre)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_nom_perso` (`nom_perso`),
  KEY `id_hero_classe` (`id_hero_classe`),
  KEY `id_genre` (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hero`
--

INSERT INTO `hero` (`id`, `nom`, `nom_perso`, `PV`, `PVMax`, `MP`, `PMMax`, `FORCE`, `DEFENSE`, `sprite`, `id_hero_classe`, `id_genre`) VALUES
(1, 'Riou', NULL, 100, 100, 50, 50, 10, 5, 'components/images/HERO-Riou-Suikoden.png', 1, 1),
(2, 'Nanami', NULL, 100, 100, 50, 50, 10, 5, 'components/images/HERO-Nanami-Suikoden.png', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `hero_classe`
--

DROP TABLE IF EXISTS `hero_classe`;
CREATE TABLE IF NOT EXISTS `hero_classe` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identifiant unique',
  `classe_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Nom de la classe (Guerrier, Mage, etc.)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_classe_name` (`classe_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hero_classe`
--

INSERT INTO `hero_classe` (`id`, `classe_name`) VALUES
(1, 'Hero');

-- --------------------------------------------------------

--
-- Structure de la table `monstre`
--

DROP TABLE IF EXISTS `monstre`;
CREATE TABLE IF NOT EXISTS `monstre` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identifiant unique',
  `name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Nom du monstre',
  `PV` int UNSIGNED NOT NULL COMMENT 'Points de vie du monstre',
  `PVMax` int NOT NULL COMMENT 'PV Max',
  `MP` int UNSIGNED NOT NULL COMMENT 'Points de mana',
  `MPMax` int NOT NULL COMMENT 'MP Max',
  `FORCE` int UNSIGNED NOT NULL COMMENT 'Force du monstre',
  `DEFENSE` int UNSIGNED NOT NULL COMMENT 'Défense du monstre',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `hero`
--
ALTER TABLE `hero`
  ADD CONSTRAINT `hero_ibfk_1` FOREIGN KEY (`id_hero_classe`) REFERENCES `hero_classe` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `hero_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
