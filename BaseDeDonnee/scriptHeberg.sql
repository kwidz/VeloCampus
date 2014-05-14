-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Client: database:3306
-- Généré le: Jeu 15 Mai 2014 à 00:11
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `Adherent`
--

INSERT INTO `Adherent` (`id_adherent`, `nom_adherent`, `prenom_adherent`, `date_naissance_adherent`, `adresse_adherent`, `code_Postal_Adherent`, `telephone_adherent`, `adresse_mail_adherent`, `password_adherent`) VALUES
(4, 'ata', 'ata', '0000-00-00', 'ata', 90000, '0677722547', 'ata@ata.fr', 'velocampus90'),
(5, 'test', 'test', '0001-01-01', 'test', 0, '000', 'test@test.fr', '098f6bcd4621d373cade4e832627b4f6'),
(7, 'Limballe', 'Pierre', '0001-01-01', '1 rue Gaston Defferre', 90000, '3688370492', 'p@p.fr', '83878c91171338902e0fe0fb97a8c47a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
