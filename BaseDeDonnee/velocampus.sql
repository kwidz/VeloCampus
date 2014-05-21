-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Client: database:3306
-- Généré le: Mer 21 Mai 2014 à 21:53
-- Version du serveur: 1.0.9
-- Version de PHP: 5.4.4-14+deb7u9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `velocampus`
--

-- --------------------------------------------------------

--
-- Structure de la table `Adherent`
--

CREATE TABLE IF NOT EXISTS `Adherent` (
  `id_adherent` int(11) NOT NULL AUTO_INCREMENT,
  `nom_adherent` varchar(50) DEFAULT NULL,
  `prenom_adherent` varchar(50) DEFAULT NULL,
  `date_naissance_adherent` date DEFAULT NULL,
  `adresse_adherent` varchar(150) DEFAULT NULL,
  `code_Postal_Adherent` int(11) DEFAULT NULL,
  `telephone_adherent` varchar(15) DEFAULT NULL,
  `adresse_mail_adherent` varchar(50) DEFAULT NULL,
  `password_adherent` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_adherent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `Adherent`
--



-- --------------------------------------------------------

--
-- Structure de la table `Admin`
--

CREATE TABLE IF NOT EXISTS `Admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo_admin` varchar(50) DEFAULT NULL,
  `password_admin` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `Admin`
--

INSERT INTO `Admin` (`id_admin`, `pseudo_admin`, `password_admin`) VALUES
(2, 'Admin', '09566ed3acd8c475d2396dbe3d4636a4');

-- --------------------------------------------------------

--
-- Structure de la table `Cadenas`
--

CREATE TABLE IF NOT EXISTS `Cadenas` (
  `id_cadenas` int(11) NOT NULL AUTO_INCREMENT,
  `id_velo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cadenas`),
  KEY `FK_Cadenas_id_velo` (`id_velo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

-- --------------------------------------------------------

--
-- Structure de la table `Cotisation`
--

CREATE TABLE IF NOT EXISTS `Cotisation` (
  `id_cotisation` int(11) NOT NULL AUTO_INCREMENT,
  `id_adherent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cotisation`),
  KEY `FK_Cotisation_id_adherent` (`id_adherent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `Cotisation`
--



-- --------------------------------------------------------

--
-- Structure de la table `Etat`
--

CREATE TABLE IF NOT EXISTS `Etat` (
  `id_Etat` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_etat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_Etat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `Etat`
--

INSERT INTO `Etat` (`id_Etat`, `libelle_etat`) VALUES
(1, 'neuf'),
(2, 'bon'),
(3, 'moyen'),
(4, 'degrade');

-- --------------------------------------------------------

--
-- Structure de la table `Location`
--

CREATE TABLE IF NOT EXISTS `Location` (
  `id_location` int(11) NOT NULL AUTO_INCREMENT,
  `prix_location` float DEFAULT NULL,
  `date_location` date DEFAULT NULL,
  `date_retour_location` date DEFAULT NULL,
  `id_velo` int(11) DEFAULT NULL,
  `id_adherent` int(11) DEFAULT NULL,
  `id_Etat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_location`),
  KEY `FK_Location_id_velo` (`id_velo`),
  KEY `FK_Location_id_adherent` (`id_adherent`),
  KEY `FK_Location_id_Etat` (`id_Etat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `Location`
--



-- --------------------------------------------------------

--
-- Structure de la table `Message`
--

CREATE TABLE IF NOT EXISTS `Message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `contenu_message` text,
  `id_adherent` int(11) DEFAULT NULL,
  `id_adherent_Adherent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_message`),
  KEY `FK_Message_id_adherent` (`id_adherent`),
  KEY `FK_Message_id_adherent_Adherent` (`id_adherent_Adherent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Postit`
--

CREATE TABLE IF NOT EXISTS `Postit` (
  `id_postit` int(11) NOT NULL AUTO_INCREMENT,
  `nom_postit` varchar(50) DEFAULT NULL,
  `message_postit` text,
  PRIMARY KEY (`id_postit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `Postit`
--

INSERT INTO `Postit` (`id_postit`, `nom_postit`, `message_postit`) VALUES
(33, 'Pierro', 'Mission pour Velocampus : nous fournir la liste des partenaires '),
(34, 'Pierro', 'Ainsi que des liens youtube ou daylimotion pour intÃ©grer les vidÃ©os'),
(35, 'NoÃ©', 'Je transmet au chargÃ© de partenaires'),
(36, 'Pierro', 'Cool merci !');

-- --------------------------------------------------------

--
-- Structure de la table `Reparation`
--

CREATE TABLE IF NOT EXISTS `Reparation` (
  `id_reparation` int(11) NOT NULL AUTO_INCREMENT,
  `description_reparation` text,
  `urgence` int(11) DEFAULT NULL,
  `prix_reparation` int(11) DEFAULT NULL,
  `id_velo` int(11) NOT NULL,
  PRIMARY KEY (`id_reparation`),
  KEY `id_velo` (`id_velo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Structure de la table `Taille`
--

CREATE TABLE IF NOT EXISTS `Taille` (
  `id_taille` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_taille` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_taille`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `Taille`
--

INSERT INTO `Taille` (`id_taille`, `libelle_taille`) VALUES
(1, 'M'),
(2, 'L'),
(3, 'XL');

-- --------------------------------------------------------

--
-- Structure de la table `Velo`
--

CREATE TABLE IF NOT EXISTS `Velo` (
  `id_velo` int(11) NOT NULL AUTO_INCREMENT,
  `id_Etat` int(11) DEFAULT NULL,
  `id_taille` int(11) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_velo`),
  KEY `FK_Velo_id_Etat` (`id_Etat`),
  KEY `FK_Velo_id_taille` (`id_taille`),
  KEY `FK_Velo_id_type` (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `Velo`
--

INSERT INTO `Velo` (`id_velo`, `id_Etat`, `id_taille`, `id_type`) VALUES
(1, 1, 1, 1),
(2, 3, 1, 1),
(3, 4, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `_Type`
--

CREATE TABLE IF NOT EXISTS `_Type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_type` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `_Type`
--

INSERT INTO `_Type` (`id_type`, `libelle_type`) VALUES
(1, 'VTC');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Cadenas`
--
ALTER TABLE `Cadenas`
  ADD CONSTRAINT `FK_Cadenas_id_velo` FOREIGN KEY (`id_velo`) REFERENCES `Velo` (`id_velo`);

--
-- Contraintes pour la table `Cotisation`
--
ALTER TABLE `Cotisation`
  ADD CONSTRAINT `FK_Cotisation_id_adherent` FOREIGN KEY (`id_adherent`) REFERENCES `Adherent` (`id_adherent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Location`
--
ALTER TABLE `Location`
  ADD CONSTRAINT `FK_Location_id_adherent` FOREIGN KEY (`id_adherent`) REFERENCES `Adherent` (`id_adherent`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_Location_id_Etat` FOREIGN KEY (`id_Etat`) REFERENCES `Etat` (`id_Etat`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_Location_id_velo` FOREIGN KEY (`id_velo`) REFERENCES `Velo` (`id_velo`) ON DELETE NO ACTION;

--
-- Contraintes pour la table `Message`
--
ALTER TABLE `Message`
  ADD CONSTRAINT `FK_Message_id_adherent` FOREIGN KEY (`id_adherent`) REFERENCES `Adherent` (`id_adherent`),
  ADD CONSTRAINT `FK_Message_id_adherent_Adherent` FOREIGN KEY (`id_adherent_Adherent`) REFERENCES `Adherent` (`id_adherent`);

--
-- Contraintes pour la table `Reparation`
--
ALTER TABLE `Reparation`
  ADD CONSTRAINT `fk_id_velo` FOREIGN KEY (`id_velo`) REFERENCES `Velo` (`id_velo`);

--
-- Contraintes pour la table `Velo`
--
ALTER TABLE `Velo`
  ADD CONSTRAINT `FK_Velo_id_Etat` FOREIGN KEY (`id_Etat`) REFERENCES `Etat` (`id_Etat`),
  ADD CONSTRAINT `FK_Velo_id_taille` FOREIGN KEY (`id_taille`) REFERENCES `Taille` (`id_taille`),
  ADD CONSTRAINT `FK_Velo_id_type` FOREIGN KEY (`id_type`) REFERENCES `_Type` (`id_type`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
