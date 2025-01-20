-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 20 jan. 2025 à 10:39
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
-- Structure de la table `hero`
--

DROP TABLE IF EXISTS `hero`;
CREATE TABLE IF NOT EXISTS `hero` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identifiant unique',
  `nom` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Nom du héros',
  `genre` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Genre du héros',
  `PV` int NOT NULL DEFAULT '100' COMMENT 'Points de vie du héros',
  `PVMax` int NOT NULL COMMENT 'PV Max du héros',
  `MP` int NOT NULL DEFAULT '50' COMMENT 'Points de mana',
  `PMMax` int NOT NULL COMMENT 'MP Max du héros',
  `FORCE` int NOT NULL DEFAULT '10' COMMENT 'Force du héros',
  `DEFENSE` int NOT NULL DEFAULT '5' COMMENT 'Défense du héros',
  `id_hero_classe` int UNSIGNED DEFAULT NULL COMMENT 'Classe du héros (référence à hero_classe)',
  PRIMARY KEY (`id`),
  KEY `id_hero_classe` (`id_hero_classe`),
  KEY `id_genre` (`genre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hero`
--

INSERT INTO `hero` (`id`, `nom`, `genre`, `PV`, `PVMax`, `MP`, `PMMax`, `FORCE`, `DEFENSE`, `id_hero_classe`) VALUES
(1, 'Riou', '1', 100, 100, 50, 50, 10, 5, 1),
(2, 'Nanami', '2', 100, 100, 50, 50, 10, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `hero_classe`
--

DROP TABLE IF EXISTS `hero_classe`;
CREATE TABLE IF NOT EXISTS `hero_classe` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identifiant unique',
  `classe_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Nom de la classe (Guerrier, Mage, etc.)',
  `boost_pvmax` int DEFAULT '0',
  `malus_pvmax` int DEFAULT NULL,
  `boost_mpmax` int DEFAULT NULL,
  `malus_mpmax` int DEFAULT '0',
  `boost_force` int DEFAULT '0',
  `malus_force` int DEFAULT '0',
  `boost_defense` int DEFAULT '0',
  `malus_defense` int DEFAULT '0',
  `description` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_classe_name` (`classe_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hero_classe`
--

INSERT INTO `hero_classe` (`id`, `classe_name`, `boost_pvmax`, `malus_pvmax`, `boost_mpmax`, `malus_mpmax`, `boost_force`, `malus_force`, `boost_defense`, `malus_defense`, `description`) VALUES
(1, 'HERO', 100, 0, 50, 0, 7, 0, 7, 0, 'Classe de base avec des boosts équilibrés sur toutes les stats.'),
(2, 'MAGE', 50, NULL, NULL, 100, -5, 0, 2, 0, 'Spécialisation dans les sorts avec un boost de mana mais une faible force.'),
(3, 'GUERRIER', 70, NULL, NULL, -50, 10, 0, 0, -2, 'Spécialisation dans les attaques physiques avec beaucoup de force mais un mana réduit.');

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `id` int NOT NULL,
  `nom` varchar(15) NOT NULL COMMENT 'Nom du joueur'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `monstre`
--

DROP TABLE IF EXISTS `monstre`;
CREATE TABLE IF NOT EXISTS `monstre` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identifiant unique',
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Nom du monstre',
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
  ADD CONSTRAINT `hero_ibfk_1` FOREIGN KEY (`id_hero_classe`) REFERENCES `hero_classe` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
