-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 16 avr. 2022 à 06:46
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sacoges`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `NomCategorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `societe` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `GSM` text,
  `mail` text,
  `PourcentageBenifice` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `societe`, `adresse`, `GSM`, `mail`, `PourcentageBenifice`) VALUES
(21, 'dflksdjn kammmou', 'vkjmsvjdkfvjd kammoun', '(564) ___-____', 'mohamedotail.marzouk@esprit.tn', 56),
(22, 'sacoges', 'sasa', '(895) ___-____', 'sacoges@gmail.com', 7),
(23, 'dflksdjn', 'vkjmsvjdkfvjd', '(564) 684-6464', 'mohamedotail.marzouk@esprit.tn', 55),
(24, 'ggf', '56hg', '(656) 626-5652', 'otailotail8@gmail.com', 55);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `idcategorie` int(255) NOT NULL,
  `tva` float NOT NULL,
  `PrixDinar` float NOT NULL,
  `PrixDollar` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idcategorie` (`idcategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `proformat`
--

DROP TABLE IF EXISTS `proformat`;
CREATE TABLE IF NOT EXISTS `proformat` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idClient` int(255) NOT NULL,
  `Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `PrixTotale` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idClient` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `proformatproduits`
--

DROP TABLE IF EXISTS `proformatproduits`;
CREATE TABLE IF NOT EXISTS `proformatproduits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProduit` int(255) NOT NULL,
  `idProformat` int(255) NOT NULL,
  `PrixDollar` float NOT NULL,
  `PrixDinar` float NOT NULL,
  `quantite` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idProduit` (`idProduit`),
  KEY `idProformat` (`idProformat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `proformat`
--
ALTER TABLE `proformat`
  ADD CONSTRAINT `proformat_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `proformatproduits`
--
ALTER TABLE `proformatproduits`
  ADD CONSTRAINT `proformatproduits_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `proformatproduits_ibfk_2` FOREIGN KEY (`idProformat`) REFERENCES `proformat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
