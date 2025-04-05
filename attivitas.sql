-- MySQL dump 10.13  Distrib 8.0.35, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: calecai1_3
-- ------------------------------------------------------
-- Server version	8.0.35-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `attivitas`
--

DROP TABLE IF EXISTS `attivitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attivitas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tipo_volantino` int DEFAULT NULL,
  `socio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_attivita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_iscrizione` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titolo` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descrizione` longtext COLLATE utf8mb4_unicode_ci,
  `note` text COLLATE utf8mb4_unicode_ci,
  `numerominimo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numeromassimo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cognome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualifica` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specializzazione` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_inizio` date DEFAULT NULL,
  `data_fine` date DEFAULT NULL,
  `calendario` int DEFAULT '0',
  `inizio_iscrizioni` date DEFAULT NULL,
  `fine_iscrizioni` date DEFAULT NULL,
  `luogoritrovo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oraritrovo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipologiatrasporto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `difficolta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lunghezza` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dislivello` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `durata` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quotaminima` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quotamassima` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_spinta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_volantino` text COLLATE utf8mb4_unicode_ci,
  `email_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `presentazione` text COLLATE utf8mb4_unicode_ci,
  `data_presentazione` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contatti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `altro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `altriorganizzatori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `altricosti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkluogo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_modulo_esterno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clic` int DEFAULT '0',
  `order` int DEFAULT NULL,
  `published` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attivitas`
--

LOCK TABLES `attivitas` WRITE;
/*!40000 ALTER TABLE `attivitas` DISABLE KEYS */;
INSERT INTO `attivitas` VALUES (1,0,'0','1','\"3\"','Passeggiata nel bosco',NULL,'In giro in mezzo agli alberi','10','20','Mario','Rossi','3934708659','mario.rossi@example.com',NULL,NULL,'2025-04-11','2025-04-11',0,'2025-04-05','2025-04-10',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'river-sunset-nature-png-5690483.png','I-Borghi-della-Valmarecchia-16-03-2025.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'https://docs.google.com/forms/d/e/1FAIpQLSf8OuKU7BBei4gFignL6Oz8i15P3INxCUJ49WY6qVBaBKJbaA/viewform?usp=dialog','amministratore@example.com',0,NULL,1,'2025-04-04 18:34:30','2025-04-04 18:34:30');
/*!40000 ALTER TABLE `attivitas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-04 18:51:55
