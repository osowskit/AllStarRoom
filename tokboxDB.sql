CREATE DATABASE  IF NOT EXISTS `ajax_demo` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ajax_demo`;
-- MySQL dump 10.13  Distrib 5.1.40, for Win32 (ia32)
--
-- Host: localhost    Database: ajax_demo
-- ------------------------------------------------------
-- Server version	5.5.9

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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(45) DEFAULT NULL,
  `Lastname` varchar(45) DEFAULT NULL,
  `sessionId` varchar(40) DEFAULT NULL,
  `api_key` varchar(45) DEFAULT NULL,
  `api_secret` varchar(45) DEFAULT NULL,
  `permissions` enum('SUBSCRIBER','PUBLISHER','MODERATOR') DEFAULT 'SUBSCRIBER',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Jose','Canseco',NULL,NULL,NULL,'SUBSCRIBER'),(2,'Frank','Thomas',NULL,NULL,NULL,'SUBSCRIBER'),(3,'Nolan','Ryan',NULL,NULL,NULL,'SUBSCRIBER'),(4,'Bo','Jackson',NULL,NULL,NULL,'SUBSCRIBER'),(5,'Wade','Boggs',NULL,NULL,NULL,'SUBSCRIBER'),(7,'Andre','Dawson',NULL,NULL,NULL,'SUBSCRIBER'),(8,'Mark','McGwire',NULL,NULL,NULL,'SUBSCRIBER'),(9,'Don','Mattingly',NULL,NULL,NULL,'SUBSCRIBER');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-05-04 15:38:11
