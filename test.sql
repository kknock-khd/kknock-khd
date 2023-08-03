-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: localhost    Database: bbs
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.22.04.2

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
-- Table structure for table `board`
--

DROP TABLE IF EXISTS `board`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `board` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `writer` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `written` date NOT NULL,
  `content` text NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `hit` int unsigned NOT NULL DEFAULT '0',
  `liked` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `board`
--

LOCK TABLES `board` WRITE;
/*!40000 ALTER TABLE `board` DISABLE KEYS */;
INSERT INTO `board` VALUES (1,'1','caca4864','KimHD','2023-08-02','1',NULL,0,0),(2,'2','caca4864','KimHD','2023-08-02','2',NULL,1,0),(3,'3','caca4864','KimHD','2023-08-02','3',NULL,0,0),(4,'4','caca4864','KimHD','2023-08-02','4',NULL,0,0),(5,'5','caca4864','KimHD','2023-08-02','5',NULL,0,0),(6,'6','caca4864','KimHD','2023-08-02','6',NULL,0,0),(7,'7','caca4864','KimHD','2023-08-02','7',NULL,0,0),(8,'8','caca4864','KimHD','2023-08-02','8',NULL,0,0),(9,'9','caca4864','KimHD','2023-08-02','9',NULL,0,0),(10,'10','caca4864','KimHD','2023-08-02','10',NULL,1,0),(11,'11','caca4864','KimHD','2023-08-02','11',NULL,8,0),(12,'test','caca9185','KinYD','2023-08-03','test','',1,0),(13,'test','caca9185','KinYD','2023-08-03','test','',0,0),(14,'12','caca9185','KinYD','2023-08-03','12','',0,0),(15,'15','caca4864','KimHD','2023-08-03','15','',0,0),(16,'16','caca4864','KimHD','2023-08-03','16','',1,0),(17,'17','caca4864','KimHD','2023-08-03','17','',3,0),(18,'bunny123','caca4864','KimHD','2023-08-03','bunny1\r\nbunny2\r\nbunny3','bunny.jpg',9,0);
/*!40000 ALTER TABLE `board` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member` (
  `name` varchar(30) NOT NULL,
  `login_id` varchar(30) NOT NULL,
  `login_pw` varchar(30) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`login_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES ('KimHD','caca4864','4864qq48','2023-08-02'),('KinYD','caca9185','4864qq48','2023-08-03');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-03 22:35:35