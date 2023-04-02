-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: clinica
-- ------------------------------------------------------
-- Server version	5.7.20

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
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `dataNasc` date NOT NULL,
  `CPF` varchar(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` VALUES (1,'Augusto Fernandes','2000-08-10','210.298.293','ativo','00:00:00'),(2,'Maria Silva Oliveira','1999-03-21','210.298.293','ativo','00:00:00'),(3,'Alfonse Smikchuz','2002-10-02','210.298.293','ativo','00:00:00'),(4,'Nagela Perreira','1997-05-16','210.298.293','ativo','00:00:00'),(5,'Gustavo Hernanes','2001-07-10','210.298.293','ativo','00:00:00'),(6,'João Paulo Ferreira','1995-06-26','210.298.293','inativo','00:00:00'),(7,'Julio Costa Martins','1980-11-23','210.298.293','ativo','00:00:00'),(8,'Helena Marques','2000-01-11','210.298.293','ativo','00:00:00'),(9,'Zira Silva','2003-02-14','210.298.293','ativo','00:00:00'),(10,'João Bicalho','1993-03-12','210.298.293','inativo','00:00:00'),(11,'Paulina Araujo','2002-08-10','210.298.293','ativo','00:00:00'),(12,'Carolina Rosa Silva','2001-12-24','210.298.293','ativo','00:00:00');
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `procedimentos`
--

DROP TABLE IF EXISTS `procedimentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `procedimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_procedimentos_tipoSolicitacao` (`tipo_id`),
  CONSTRAINT `fk_procedimentos_tipoSolicitacao` FOREIGN KEY (`tipo_id`) REFERENCES `tiposolicitacao` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procedimentos`
--

LOCK TABLES `procedimentos` WRITE;
/*!40000 ALTER TABLE `procedimentos` DISABLE KEYS */;
INSERT INTO `procedimentos` VALUES (1,'Consulta Pediátrica ',1,'ativo'),(2,'Consulta Clínico Geral',1,'ativo'),(3,'Hemograma',2,'ativo'),(4,'Glicemia',2,'ativo'),(5,'Colesterol',2,'ativo'),(6,'Triglicerídeos',2,'ativo');
/*!40000 ALTER TABLE `procedimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profissional`
--

DROP TABLE IF EXISTS `profissional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profissional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profissional`
--

LOCK TABLES `profissional` WRITE;
/*!40000 ALTER TABLE `profissional` DISABLE KEYS */;
INSERT INTO `profissional` VALUES (1,'Orlando Nobrega','ativo'),(2,'Rafaela Tenorio','ativo'),(3,'João Paulo Nobrega','ativo');
/*!40000 ALTER TABLE `profissional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profissionalatende`
--

DROP TABLE IF EXISTS `profissionalatende`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profissionalatende` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `procedimento_id` int(2) NOT NULL,
  `profissional_id` int(2) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_profissionalAtende_procedimento` (`procedimento_id`),
  KEY `fk_profissionalAtende_procedimento_profissional` (`profissional_id`),
  CONSTRAINT `fk_profissionalAtende_procedimento` FOREIGN KEY (`procedimento_id`) REFERENCES `procedimentos` (`id`),
  CONSTRAINT `fk_profissionalAtende_procedimento_profissional` FOREIGN KEY (`profissional_id`) REFERENCES `profissional` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profissionalatende`
--

LOCK TABLES `profissionalatende` WRITE;
/*!40000 ALTER TABLE `profissionalatende` DISABLE KEYS */;
INSERT INTO `profissionalatende` VALUES (1,1,2,'ativo'),(2,2,2,'ativo'),(3,2,3,'ativo'),(4,1,3,'inativo'),(5,3,1,'ativo'),(6,4,1,'ativo'),(7,5,1,'ativo'),(8,6,1,'ativo');
/*!40000 ALTER TABLE `profissionalatende` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiposolicitacao`
--

DROP TABLE IF EXISTS `tiposolicitacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tiposolicitacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiposolicitacao`
--

LOCK TABLES `tiposolicitacao` WRITE;
/*!40000 ALTER TABLE `tiposolicitacao` DISABLE KEYS */;
INSERT INTO `tiposolicitacao` VALUES (1,'Consulta','ativo'),(2,'Exames Laboratoriais','ativo');
/*!40000 ALTER TABLE `tiposolicitacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'clinica'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-02 12:27:10
