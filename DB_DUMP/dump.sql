-- MariaDB dump 10.19  Distrib 10.4.34-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: inf_symfony
-- ------------------------------------------------------
-- Server version	10.4.34-MariaDB-1:10.4.34+maria~ubu2004

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `coin_flip`
--

DROP TABLE IF EXISTS `coin_flip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coin_flip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) DEFAULT NULL,
  `result` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A7051F9767B3B43D` (`users_id`),
  CONSTRAINT `FK_A7051F9767B3B43D` FOREIGN KEY (`users_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coin_flip`
--

LOCK TABLES `coin_flip` WRITE;
/*!40000 ALTER TABLE `coin_flip` DISABLE KEYS */;
INSERT INTO `coin_flip` VALUES (1,NULL,'TAILS'),(2,NULL,'HEADS'),(3,NULL,'HEADS'),(4,NULL,'HEADS'),(5,NULL,'HEADS'),(6,NULL,'TAILS'),(7,NULL,'HEADS'),(8,NULL,'HEADS'),(9,NULL,'TAILS'),(10,NULL,'TAILS'),(11,NULL,'TAILS'),(12,NULL,'TAILS'),(13,NULL,'HEADS'),(14,NULL,'TAILS'),(15,NULL,'TAILS'),(16,NULL,'HEADS'),(17,NULL,'HEADS'),(18,NULL,'HEADS'),(19,NULL,'HEADS'),(20,NULL,'HEADS'),(21,NULL,'TAILS'),(22,NULL,'TAILS'),(23,NULL,'HEADS'),(24,NULL,'HEADS'),(25,NULL,'HEADS'),(26,NULL,'TAILS'),(27,NULL,'TAILS'),(28,NULL,'HEADS'),(29,NULL,'HEADS'),(30,NULL,'HEADS'),(31,NULL,'HEADS'),(32,2,'HEADS'),(33,2,'TAILS'),(34,2,'HEADS'),(35,2,'TAILS'),(36,2,'TAILS'),(37,2,'HEADS'),(38,NULL,'TAILS'),(39,NULL,'HEADS'),(40,3,'HEADS'),(41,3,'TAILS'),(42,3,'HEADS'),(43,3,'TAILS'),(44,3,'TAILS'),(45,3,'TAILS'),(46,3,'HEADS'),(47,3,'TAILS'),(48,3,'TAILS'),(49,3,'TAILS'),(50,3,'TAILS'),(51,NULL,'TAILS'),(52,NULL,'TAILS'),(53,NULL,'TAILS'),(54,NULL,'TAILS'),(55,NULL,'TAILS'),(56,NULL,'TAILS'),(57,NULL,'TAILS'),(58,NULL,'TAILS'),(59,NULL,'TAILS'),(60,NULL,'TAILS'),(61,NULL,'TAILS'),(62,NULL,'HEADS'),(63,NULL,'TAILS'),(64,NULL,'HEADS'),(65,NULL,'HEADS'),(66,NULL,'HEADS'),(67,NULL,'HEADS'),(68,NULL,'TAILS'),(69,NULL,'HEADS'),(70,NULL,'HEADS'),(71,6,'TAILS'),(72,6,'HEADS'),(73,6,'HEADS'),(74,6,'TAILS'),(75,6,'HEADS'),(76,6,'HEADS'),(77,6,'HEADS'),(78,6,'HEADS'),(79,NULL,'HEADS'),(80,NULL,'TAILS'),(81,7,'TAILS'),(82,7,'TAILS'),(83,7,'HEADS'),(84,7,'TAILS'),(85,7,'HEADS'),(86,7,'TAILS'),(87,7,'TAILS'),(88,7,'HEADS'),(89,7,'TAILS'),(90,7,'HEADS'),(91,7,'HEADS'),(92,7,'HEADS'),(93,7,'TAILS'),(94,7,'TAILS'),(95,7,'HEADS'),(96,7,'TAILS'),(97,7,'TAILS'),(98,7,'HEADS'),(99,9,'HEADS'),(100,9,'HEADS'),(101,12,'HEADS'),(102,12,'HEADS');
/*!40000 ALTER TABLE `coin_flip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `random_number`
--

DROP TABLE IF EXISTS `random_number`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `random_number` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) DEFAULT NULL,
  `numresult` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_867E6AA867B3B43D` (`users_id`),
  CONSTRAINT `FK_867E6AA867B3B43D` FOREIGN KEY (`users_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `random_number`
--

LOCK TABLES `random_number` WRITE;
/*!40000 ALTER TABLE `random_number` DISABLE KEYS */;
INSERT INTO `random_number` VALUES (1,NULL,8),(2,NULL,65),(3,NULL,24),(4,NULL,93),(5,NULL,41),(6,NULL,28),(7,NULL,77),(8,NULL,79),(9,NULL,75),(10,NULL,56),(11,1,2),(12,1,29),(13,1,27),(14,1,69),(15,1,44),(16,1,6),(17,1,29),(18,1,1),(19,1,76),(20,1,72),(21,1,91),(22,1,94),(23,1,5),(24,1,57),(25,1,87),(26,1,9),(27,1,75),(28,1,69),(29,1,34),(30,1,30),(31,NULL,58),(32,NULL,85),(33,NULL,54),(34,NULL,70),(35,NULL,83),(36,NULL,85),(37,NULL,14),(38,NULL,33),(39,NULL,14),(40,NULL,44),(41,NULL,12),(42,NULL,6),(43,NULL,74),(44,NULL,5),(45,NULL,6),(46,NULL,56),(47,9,45),(48,9,75),(49,9,99),(50,9,9),(51,9,4),(52,12,33),(53,12,58),(54,12,28),(55,12,44),(56,12,39),(57,12,40),(58,12,87);
/*!40000 ALTER TABLE `random_number` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roll_dice`
--

DROP TABLE IF EXISTS `roll_dice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roll_dice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) DEFAULT NULL,
  `roll` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_38BEC10867B3B43D` (`users_id`),
  CONSTRAINT `FK_38BEC10867B3B43D` FOREIGN KEY (`users_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roll_dice`
--

LOCK TABLES `roll_dice` WRITE;
/*!40000 ALTER TABLE `roll_dice` DISABLE KEYS */;
INSERT INTO `roll_dice` VALUES (1,NULL,2),(2,NULL,1),(3,NULL,2),(4,NULL,6),(5,NULL,6),(6,NULL,6),(7,NULL,5),(8,NULL,3),(9,NULL,5),(10,NULL,6),(11,NULL,6),(12,NULL,5),(13,NULL,6),(14,NULL,2),(15,NULL,6),(16,NULL,4),(17,NULL,3),(18,NULL,3),(19,NULL,4),(20,NULL,6),(21,NULL,5),(22,NULL,1),(23,NULL,1),(24,NULL,1),(25,NULL,1),(26,NULL,1),(27,NULL,2),(28,NULL,6),(29,NULL,4),(30,NULL,6),(31,NULL,1),(32,NULL,3),(33,NULL,3),(34,NULL,4),(35,3,2),(36,3,6),(37,3,2),(38,3,5),(39,3,1),(40,3,1),(41,3,4),(42,NULL,4),(43,NULL,1),(44,NULL,2),(45,NULL,2),(46,NULL,5),(47,NULL,5),(48,NULL,1),(49,NULL,4),(50,NULL,5),(51,NULL,6),(52,NULL,3),(53,NULL,4),(54,NULL,4),(55,NULL,2),(56,NULL,5),(57,NULL,5),(58,NULL,2),(59,NULL,6),(60,NULL,1),(61,NULL,4),(62,NULL,5),(63,NULL,2),(64,NULL,4),(65,NULL,3),(66,NULL,4),(67,NULL,2),(68,NULL,2),(69,NULL,5),(70,NULL,4),(71,NULL,4),(72,7,5),(73,7,2),(74,7,5),(75,7,4),(76,7,1),(77,7,3),(78,7,6),(79,7,5),(80,7,6),(81,7,6),(82,7,4),(83,12,3),(84,12,5),(85,12,4),(86,12,2),(87,12,2),(88,12,3);
/*!40000 ALTER TABLE `roll_dice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) NOT NULL,
  `username` varchar(255) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'albarn@gmail.com','albarn','[]','$2y$13$pjIVD.UjbV/bZWQkw7l6Xu/27ADz.CaZJ4IwnW5OEHF4t2BRbxXAW'),(2,'test@gmail.com','test','[]','$2y$13$qrmVmm2aAwBPM3h11.w2QOqz78Z7Hg29i9zMcDXvOjm/5c/zi3JTq'),(3,'test1@gmail.com','test','[]','$2y$13$gx8gVAKbc0FtAmn6CMIDE.gx3tnVUbawTsGe.nigUHOb6A7mB4Cty'),(4,'test2@gmail.com','test','[]','$2y$13$D7kXK.ew6duvf/jEnGmf0eZ.z0zjtz0UpPiic9w18ZRld.IMVRmKW'),(5,'test3@gmail.com','Test2','[]','$2y$13$vCRZPAdZJBhhiSucZVG4f.Epop6Jb3Wbg2rl7izaCpZWKI8ePyIBG'),(6,'test5@gmail.com','test5','[]','$2y$13$eJTgJr/Dawl0yBwcKlw/s.O4XysZWiujbu0e169sO0EdjwsOvfKha'),(7,'arturmakar23@wewf','artur','[]','$2y$13$0yHQX4P.TYCfH.FcRRaNvOGlT6uQeekEO67QY/6Y7ad8r4QZy1wOS'),(9,'admin@example.com','admin','[\"ROLE_ADMIN\"]','$2y$13$ZTb4hgcTZzzxiWgmVelcNOqjSsSNPFj1jPfuiC6KOduK08XZToI3e'),(10,'test7@gmail.com','test','[]','$2y$13$AbowxHC28/pdF.o8EOhtJ.6wifzbtCrqrSGUctfrdL2sSisE3ivGS'),(12,'test10@gmail.com','test','[]','$2y$13$omi6nrwGqF4.vY4oAnPs/ObTjD3w2BtUOB0IRgjhYRg3Z8lLN5RDe');
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

-- Dump completed on 2025-02-16 19:25:29
