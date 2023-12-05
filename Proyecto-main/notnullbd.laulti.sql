-- MariaDB dump 10.19  Distrib 10.11.5-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: login
-- ------------------------------------------------------
-- Server version	10.11.5-MariaDB-3

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
-- Table structure for table `enunciados`
--

DROP TABLE IF EXISTS `enunciados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enunciados` (
  `id_enunciado` int(11) NOT NULL AUTO_INCREMENT,
  `texto_enunciado` text DEFAULT NULL,
  `creado_fecha` timestamp NULL DEFAULT current_timestamp(),
  `lenguaje` varchar(255) DEFAULT NULL,
  `dificultad` int(11) DEFAULT NULL CHECK (`dificultad` between 1 and 5),
  `tema` varchar(255) DEFAULT NULL,
  `correccion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_enunciado`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enunciados`
--

LOCK TABLES `enunciados` WRITE;
/*!40000 ALTER TABLE `enunciados` DISABLE KEYS */;
INSERT INTO `enunciados` VALUES
(22,'aaaaa','2023-11-23 14:57:55','1',1,'1','aaaa');
/*!40000 ALTER TABLE `enunciados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enunciados_completar`
--

DROP TABLE IF EXISTS `enunciados_completar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enunciados_completar` (
  `id_enunciado_completar` int(11) NOT NULL AUTO_INCREMENT,
  `texto_enunciado_completar` text DEFAULT NULL,
  `creado_fecha_completar` timestamp NULL DEFAULT current_timestamp(),
  `lenguaje_completar` varchar(255) DEFAULT NULL,
  `dificultad_completar` int(11) DEFAULT NULL,
  `tema_completar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_enunciado_completar`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enunciados_completar`
--

LOCK TABLES `enunciados_completar` WRITE;
/*!40000 ALTER TABLE `enunciados_completar` DISABLE KEYS */;
INSERT INTO `enunciados_completar` VALUES
(1,'PEDRO','2023-11-17 22:56:26','4',2,NULL),
(2,'coronamos','2023-11-17 23:02:19','2',5,NULL),
(3,'asdasd','2023-11-17 23:19:53','2',5,NULL),
(4,'XASD','2023-11-17 23:26:50','4',2,NULL),
(5,'Asdasdasdas','2023-11-17 23:33:10','3',2,NULL),
(6,'pedraa','2023-11-17 23:38:29','4',1,NULL),
(7,'VIVA PSOEEEE','2023-11-17 23:43:53','2',2,NULL),
(8,'Porque pedro es el mejor presidente','2023-11-18 00:02:58','2',4,NULL),
(9,'Porque pedro es el mejor presidente','2023-11-18 00:04:33','2',4,NULL),
(10,'wqewqeqwewqewqe','2023-11-18 00:05:37','3',2,NULL),
(11,'QWEWEQWQ','2023-11-18 00:23:10','2',2,NULL),
(12,'QWEWEQWQ','2023-11-18 00:24:53','2',2,NULL),
(13,'FFFFFFFFFFFFFFF','2023-11-18 12:13:08','2',4,NULL),
(14,'op','2023-11-18 18:40:04','2',5,'1'),
(15,'op','2023-11-18 18:40:35','2',2,'1'),
(16,'op','2023-11-18 18:40:56','2',2,'1'),
(17,'buenaaaas','2023-11-18 18:49:54','4',3,'1'),
(18,'buenaaaas','2023-11-18 18:50:13','4',3,'1'),
(19,'Buenas','2023-11-18 18:52:40','4',1,'1'),
(20,'333 DIOS','2023-11-18 19:05:10','3',4,'3'),
(21,'PORFAVOR','2023-11-21 21:52:16','1',3,'1'),
(22,'AVASCAL','2023-11-22 11:09:58','1',2,'1');
/*!40000 ALTER TABLE `enunciados_completar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enunciados_escribir`
--

DROP TABLE IF EXISTS `enunciados_escribir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enunciados_escribir` (
  `id_enunciado_escribir` int(11) NOT NULL AUTO_INCREMENT,
  `texto_enunciado_escribir` varchar(100) DEFAULT NULL,
  `creado_fecha_escribir` timestamp NULL DEFAULT NULL,
  `lenguaje_escribir` varchar(255) DEFAULT NULL,
  `dificultad_escribir` int(11) DEFAULT NULL,
  `tema_escribir` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_enunciado_escribir`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enunciados_escribir`
--

LOCK TABLES `enunciados_escribir` WRITE;
/*!40000 ALTER TABLE `enunciados_escribir` DISABLE KEYS */;
INSERT INTO `enunciados_escribir` VALUES
(1,'DGDFFGHJFG',NULL,'2',5,NULL),
(2,'asdasdasdasdasdasd',NULL,'1',1,NULL),
(3,'Porfaaaa',NULL,'4',4,'1'),
(4,'Porfaaaa',NULL,'4',4,'1'),
(5,'funsiona',NULL,'4',3,'1'),
(6,'CORRECTASAAA',NULL,'1',3,'1');
/*!40000 ALTER TABLE `enunciados_escribir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuestas` (
  `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `enunciado_id` int(11) DEFAULT NULL,
  `texto_pregunta` text DEFAULT NULL,
  `grado_dificultad` int(11) DEFAULT NULL,
  `creado_fecha` timestamp NULL DEFAULT current_timestamp(),
  `correcta` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id_pregunta`),
  KEY `enunciado_id` (`enunciado_id`),
  CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`enunciado_id`) REFERENCES `enunciados` (`id_enunciado`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuestas`
--

LOCK TABLES `respuestas` WRITE;
/*!40000 ALTER TABLE `respuestas` DISABLE KEYS */;
INSERT INTO `respuestas` VALUES
(69,22,'a',1,'2023-11-23 14:57:55',1),
(70,22,'a',1,'2023-11-23 14:57:55',0),
(71,22,'a',1,'2023-11-23 14:57:55',0),
(72,22,'a',1,'2023-11-23 14:57:55',0);
/*!40000 ALTER TABLE `respuestas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuestas_completar`
--

DROP TABLE IF EXISTS `respuestas_completar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuestas_completar` (
  `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `enunciado_id` int(11) DEFAULT NULL,
  `texto_pregunta` text DEFAULT NULL,
  `grado_dificultad` int(11) DEFAULT NULL,
  `creado_fecha` timestamp NULL DEFAULT current_timestamp(),
  `correcta` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id_pregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuestas_completar`
--

LOCK TABLES `respuestas_completar` WRITE;
/*!40000 ALTER TABLE `respuestas_completar` DISABLE KEYS */;
INSERT INTO `respuestas_completar` VALUES
(1,4,NULL,2,NULL,1),
(2,7,'VIVAAAAAAAAAAAAAAAAA',2,'2023-11-17 23:43:53',1),
(3,8,'Si',4,'2023-11-18 00:02:58',1),
(4,9,'Si',4,'2023-11-18 00:04:33',1),
(5,10,'opopopopo',2,'2023-11-18 00:05:37',1),
(6,11,'WERWR34EEYTR',2,'2023-11-18 00:23:10',1),
(7,12,'WERWR34EEYTR',2,'2023-11-18 00:24:53',1),
(8,13,'FFFFFFFFFFFFFFFFFFF',4,'2023-11-18 12:13:08',1),
(9,14,'ere',5,'2023-11-18 18:40:04',1),
(10,15,'ere',2,'2023-11-18 18:40:35',1),
(11,16,'ere',2,'2023-11-18 18:40:56',1),
(12,17,'45454545',3,'2023-11-18 18:49:54',1),
(13,18,'45454545',3,'2023-11-18 18:50:13',1),
(14,19,'rtrt',1,'2023-11-18 18:52:40',1),
(15,20,'amen',4,'2023-11-18 19:05:10',1),
(16,21,'CHROIZO',3,'2023-11-21 21:52:16',1),
(17,22,'FAXA',2,'2023-11-22 11:09:58',1);
/*!40000 ALTER TABLE `respuestas_completar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuestas_escribir`
--

DROP TABLE IF EXISTS `respuestas_escribir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuestas_escribir` (
  `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `enunciado_id` int(11) DEFAULT NULL,
  `texto_pregunta` text DEFAULT NULL,
  `grado_dificultad` int(11) DEFAULT NULL,
  `creado_fecha` timestamp NULL DEFAULT current_timestamp(),
  `correcta` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id_pregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuestas_escribir`
--

LOCK TABLES `respuestas_escribir` WRITE;
/*!40000 ALTER TABLE `respuestas_escribir` DISABLE KEYS */;
INSERT INTO `respuestas_escribir` VALUES
(1,1,'XDMAS',5,'2023-11-18 00:29:34',1),
(2,2,'sddddddddddddddddddddddd',1,'2023-11-18 12:17:09',1),
(3,3,'VIVA DIOS',4,'2023-11-18 18:29:29',1),
(4,4,'VIVA DIOS',4,'2023-11-18 18:29:55',1),
(5,5,'uuu',3,'2023-11-18 18:36:38',1),
(6,6,'YEAHHH',3,'2023-11-22 10:52:48',1);
/*!40000 ALTER TABLE `respuestas_escribir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(255) DEFAULT NULL,
  `contraseña` varchar(255) NOT NULL,
  `Correo` varchar(60) DEFAULT NULL,
  `Notificaciones` tinyint(1) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_correo` (`Correo`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES
(28,'mnko','1234','mnko@gmail.com',0,1),
(29,'ejemplo','1234','ejemplo@gmail.com',0,NULL),
(30,'poronga@gorla.com','assasssss','estupid',1,NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-23 18:01:57
