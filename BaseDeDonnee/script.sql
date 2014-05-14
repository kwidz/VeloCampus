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
  PRIMARY KEY (`id_adherent`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Adherent`
--

LOCK TABLES `Adherent` WRITE;
/*!40000 ALTER TABLE `Adherent` DISABLE KEYS */;
INSERT INTO `Adherent` VALUES (1,'Limballe','Pierre','1995-08-04','1 rue gaston defferre Belfort',90000,'0688370492','a@a.fr','1337'),(2,'Glangine','Geoffrey','1994-02-01','3 rue Gaston Defferre',90000,'0677722547','geoffrey.glangine@gmail.com','test'),(3,'a','a','0000-00-00','a',0,'a','a@a.fr','velo'),(4,'test','test','2012-06-06','test',20000,'000','fr@fr.fr','velo'),(5,'atata','atata','0000-00-00','atata',222,'0677722547','ata@ata.fr','velo'),(7,'test','t','0000-00-00','test',222,'0677722547','z@z.fr','098f6bcd4621d373cade4e832627b4f6');
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
INSERT INTO `Admin` VALUES (1,'Admin','21232f297a57a5a743894a0e4a801fc3');
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
INSERT INTO `Cadenas` VALUES (1,1),(4,1),(5,1),(2,2),(6,2),(7,2),(8,2),(3,3),(9,3),(10,3),(11,4),(12,4),(13,4),(14,5),(15,5),(16,5),(17,6),(18,6),(19,6),(20,7),(21,7),(22,7),(23,8),(24,8),(25,8),(26,9),(27,9),(28,9),(29,10),(30,10),(31,10),(32,11),(33,11),(34,11),(35,12),(36,12),(37,12),(38,13),(39,13),(40,13),(41,14),(42,14),(43,14),(44,15),(45,15),(46,15),(47,16),(48,16),(49,16),(50,17),(51,17),(52,17),(53,18),(54,18),(55,18),(56,19),(57,19),(58,19),(59,20),(60,20),(61,20),(62,21),(63,21),(64,21),(65,22),(66,22),(67,22),(68,23),(69,23),(70,23),(71,24),(72,24),(73,24),(74,25),(75,25),(76,25),(77,26),(78,26),(79,26);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cotisation`
--

LOCK TABLES `Cotisation` WRITE;
/*!40000 ALTER TABLE `Cotisation` DISABLE KEYS */;
INSERT INTO `Cotisation` VALUES (3,2),(6,3),(5,4),(4,5);
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
INSERT INTO `Location` VALUES (1,250,'2014-12-12','2014-04-08',1,1,NULL),(2,250,'2014-12-12','2015-06-02',1,1,NULL),(3,250,'2014-12-12',NULL,1,1,NULL),(4,250,'2014-12-12',NULL,1,1,NULL),(5,15,'2024-03-14',NULL,13,2,NULL),(6,15,'2024-03-14',NULL,9,1,NULL);
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
INSERT INTO `Reparation` VALUES (9,'velo en feu',3,150,9),(10,'pneu creve',2,15,13),(11,'extinction du feu',-1,150,9),(12,'cadre pliÃ©',2,NULL,1);
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
INSERT INTO `Velo` VALUES (1,1,1,1),(2,1,1,1),(3,1,1,1),(4,1,1,1),(5,1,1,1),(6,1,1,1),(7,1,1,1),(8,1,3,1),(9,1,2,1),(10,1,3,1),(11,1,2,1),(12,1,3,1),(13,1,2,1),(14,1,3,2),(15,1,2,2),(16,1,3,2),(17,1,3,2),(18,1,2,2),(19,1,3,2),(20,1,3,2),(21,1,3,2),(22,1,3,2),(23,1,3,3),(24,1,3,3),(25,1,2,3),(26,1,2,4);
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
INSERT INTO `_Type` VALUES (1,'VTT'),(2,'VTC'),(3,'Pliable'),(4,'Tandem');
/*!40000 ALTER TABLE `_Type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subit`
--

DROP TABLE IF EXISTS `subit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subit` (
  `id_velo` int(11) NOT NULL,
  `id_reparation` int(11) NOT NULL,
  PRIMARY KEY (`id_velo`,`id_reparation`),
  KEY `FK_subit_id_reparation` (`id_reparation`),
  CONSTRAINT `FK_subit_id_reparation` FOREIGN KEY (`id_reparation`) REFERENCES `Reparation` (`id_reparation`),
  CONSTRAINT `FK_subit_id_velo` FOREIGN KEY (`id_velo`) REFERENCES `Velo` (`id_velo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subit`
--

LOCK TABLES `subit` WRITE;
/*!40000 ALTER TABLE `subit` DISABLE KEYS */;
/*!40000 ALTER TABLE `subit` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-14 16:23:05
