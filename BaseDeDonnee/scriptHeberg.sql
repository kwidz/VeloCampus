-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: velo
-- ------------------------------------------------------
-- Server version	5.5.37-0ubuntu0.13.10.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Adherent`
--

DROP TABLE IF EXISTS `Adherent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Adherent` (
  `id_adherent` int(11) NOT NULL AUTO_INCREMENT,
  `nom_adherent` varchar(50) DEFAULT NULL,
  `prenom_adherent` varchar(50) DEFAULT NULL,
  `date_naissance_adherent` date DEFAULT NULL,
  `adresse_adherent` varchar(150) DEFAULT NULL,
  `code_Postal_Adherent` int(11) DEFAULT NULL,
  `telephone_adherent` varchar(15) DEFAULT NULL,
  `adresse_mail_adherent` varchar(50) DEFAULT NULL,
  `password_adherent` varchar(100) DEFAULT NULL,
  `photo_adherent` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_adherent`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Adherent`
--

LOCK TABLES `Adherent` WRITE;
/*!40000 ALTER TABLE `Adherent` DISABLE KEYS */;
/*!40000 ALTER TABLE `Adherent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Admin`
--

DROP TABLE IF EXISTS `Admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo_admin` varchar(50) DEFAULT NULL,
  `password_admin` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Admin`
--

LOCK TABLES `Admin` WRITE;
/*!40000 ALTER TABLE `Admin` DISABLE KEYS */;
INSERT INTO `Admin` VALUES (1,'Admin','Admin');
/*!40000 ALTER TABLE `Admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cadenas`
--

DROP TABLE IF EXISTS `Cadenas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cadenas` (
  `id_cadenas` int(11) NOT NULL AUTO_INCREMENT,
  `id_velo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cadenas`),
  KEY `FK_Cadenas_id_velo` (`id_velo`),
  CONSTRAINT `FK_Cadenas_id_velo` FOREIGN KEY (`id_velo`) REFERENCES `Velo` (`id_velo`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cadenas`
--

LOCK TABLES `Cadenas` WRITE;
/*!40000 ALTER TABLE `Cadenas` DISABLE KEYS */;
/*!40000 ALTER TABLE `Cadenas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cotisation`
--

DROP TABLE IF EXISTS `Cotisation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cotisation` (
  `id_cotisation` int(11) NOT NULL AUTO_INCREMENT,
  `id_adherent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cotisation`),
  KEY `FK_Cotisation_id_adherent` (`id_adherent`),
  CONSTRAINT `FK_Cotisation_id_adherent` FOREIGN KEY (`id_adherent`) REFERENCES `Adherent` (`id_adherent`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cotisation`
--

LOCK TABLES `Cotisation` WRITE;
/*!40000 ALTER TABLE `Cotisation` DISABLE KEYS */;
/*!40000 ALTER TABLE `Cotisation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Etat`
--

DROP TABLE IF EXISTS `Etat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Etat` (
  `id_Etat` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_etat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_Etat`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Etat`
--

LOCK TABLES `Etat` WRITE;
/*!40000 ALTER TABLE `Etat` DISABLE KEYS */;
INSERT INTO `Etat` VALUES (1,'neuf'),(2,'bon'),(3,'moyen'),(4,'dégradé');
/*!40000 ALTER TABLE `Etat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Location`
--

DROP TABLE IF EXISTS `Location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Location` (
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
  KEY `FK_Location_id_Etat` (`id_Etat`),
  CONSTRAINT `FK_Location_id_adherent` FOREIGN KEY (`id_adherent`) REFERENCES `Adherent` (`id_adherent`) ON DELETE NO ACTION,
  CONSTRAINT `FK_Location_id_Etat` FOREIGN KEY (`id_Etat`) REFERENCES `Etat` (`id_Etat`) ON DELETE NO ACTION,
  CONSTRAINT `FK_Location_id_velo` FOREIGN KEY (`id_velo`) REFERENCES `Velo` (`id_velo`) ON DELETE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Location`
--

LOCK TABLES `Location` WRITE;
/*!40000 ALTER TABLE `Location` DISABLE KEYS */;
/*!40000 ALTER TABLE `Location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Message`
--

DROP TABLE IF EXISTS `Message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `contenu_message` text,
  `id_adherent` int(11) DEFAULT NULL,
  `id_adherent_Adherent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_message`),
  KEY `FK_Message_id_adherent` (`id_adherent`),
  KEY `FK_Message_id_adherent_Adherent` (`id_adherent_Adherent`),
  CONSTRAINT `FK_Message_id_adherent` FOREIGN KEY (`id_adherent`) REFERENCES `Adherent` (`id_adherent`),
  CONSTRAINT `FK_Message_id_adherent_Adherent` FOREIGN KEY (`id_adherent_Adherent`) REFERENCES `Adherent` (`id_adherent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Message`
--

LOCK TABLES `Message` WRITE;
/*!40000 ALTER TABLE `Message` DISABLE KEYS */;
/*!40000 ALTER TABLE `Message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Postit`
--

DROP TABLE IF EXISTS `Postit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Postit` (
  `id_postit` int(11) NOT NULL AUTO_INCREMENT,
  `nom_postit` varchar(50) DEFAULT NULL,
  `message_postit` text,
  PRIMARY KEY (`id_postit`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Postit`
--

LOCK TABLES `Postit` WRITE;
/*!40000 ALTER TABLE `Postit` DISABLE KEYS */;
INSERT INTO `Postit` VALUES (4,'geoffrey','je viens de finir les locations, j\'ai fait la gestion de mailling List'),(5,'pierre','faire les foreign key dans la bdd pour les réparations'),(6,'Morgane','le lien \"plus d\'info \" marche :) \r\n'),(7,'geoffrey','cool :)'),(9,'Ã©toilr','Ã©Ã©Ã©Ã©Ã©'),(10,'geoffrééé','tééést');
/*!40000 ALTER TABLE `Postit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Reparation`
--

DROP TABLE IF EXISTS `Reparation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Reparation` (
  `id_reparation` int(11) NOT NULL AUTO_INCREMENT,
  `description_reparation` text,
  `urgence` int(11) DEFAULT NULL,
  `prix_reparation` int(11) DEFAULT NULL,
  `id_velo` int(11) NOT NULL,
  PRIMARY KEY (`id_reparation`),
  KEY `id_velo` (`id_velo`),
  CONSTRAINT `fk_id_velo` FOREIGN KEY (`id_velo`) REFERENCES `Velo` (`id_velo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Reparation`
--

LOCK TABLES `Reparation` WRITE;
/*!40000 ALTER TABLE `Reparation` DISABLE KEYS */;
/*!40000 ALTER TABLE `Reparation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Taille`
--

DROP TABLE IF EXISTS `Taille`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Taille` (
  `id_taille` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_taille` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_taille`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Taille`
--

LOCK TABLES `Taille` WRITE;
/*!40000 ALTER TABLE `Taille` DISABLE KEYS */;
INSERT INTO `Taille` VALUES (1,'M'),(2,'L'),(3,'XL');
/*!40000 ALTER TABLE `Taille` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Velo`
--

DROP TABLE IF EXISTS `Velo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Velo` (
  `id_velo` int(11) NOT NULL AUTO_INCREMENT,
  `id_Etat` int(11) DEFAULT NULL,
  `id_taille` int(11) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_velo`),
  KEY `FK_Velo_id_Etat` (`id_Etat`),
  KEY `FK_Velo_id_taille` (`id_taille`),
  KEY `FK_Velo_id_type` (`id_type`),
  CONSTRAINT `FK_Velo_id_Etat` FOREIGN KEY (`id_Etat`) REFERENCES `Etat` (`id_Etat`),
  CONSTRAINT `FK_Velo_id_taille` FOREIGN KEY (`id_taille`) REFERENCES `Taille` (`id_taille`),
  CONSTRAINT `FK_Velo_id_type` FOREIGN KEY (`id_type`) REFERENCES `_Type` (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Velo`
--

LOCK TABLES `Velo` WRITE;
/*!40000 ALTER TABLE `Velo` DISABLE KEYS */;
/*!40000 ALTER TABLE `Velo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_Type`
--

DROP TABLE IF EXISTS `_Type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_Type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_type` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_Type`
--

LOCK TABLES `_Type` WRITE;
/*!40000 ALTER TABLE `_Type` DISABLE KEYS */;
/*!40000 ALTER TABLE `_Type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subit`
--


/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subit`
--


/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-12 17:37:47
