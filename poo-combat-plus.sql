-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 16 jan. 2025 à 15:02
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
  `name` varchar(15) NOT NULL COMMENT 'Nom du héros',
  `PV` int NOT NULL DEFAULT '100' COMMENT 'Points de vie du héros',
  `PVMax` int NOT NULL COMMENT 'PV Max de mon personnage',
  `MP` int NOT NULL DEFAULT '50' COMMENT 'Points de mana',
  `PMMax` int NOT NULL COMMENT 'MP max mon personnage',
  `FORCE` int NOT NULL DEFAULT '10' COMMENT 'Force du héros',
  `DEFENSE` int NOT NULL DEFAULT '5' COMMENT 'Défense du héros',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `monstre`
--

DROP TABLE IF EXISTS `monstre`;
CREATE TABLE IF NOT EXISTS `monstre` (
  `id` int UNSIGNED NOT NULL COMMENT 'Identifiant unique	',
  `name` varchar(20) NOT NULL COMMENT 'Nom du héros	',
  `PV` int UNSIGNED NOT NULL COMMENT 'Points de vie du héros	',
  `PVMax` int NOT NULL COMMENT 'PV Max',
  `MP` int UNSIGNED NOT NULL COMMENT 'Points de mana	',
  `MPMax` int NOT NULL COMMENT 'MP Max',
  `FORCE` int UNSIGNED NOT NULL COMMENT 'Force du héros	',
  `DEFENSE` int UNSIGNED NOT NULL COMMENT 'Défense du héros	',
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
