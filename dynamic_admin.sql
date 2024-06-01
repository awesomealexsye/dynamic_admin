-- MySQL dump 10.13  Distrib 8.3.0, for macos14.2 (arm64)
--
-- Host: localhost    Database: dynamic_admin
-- ------------------------------------------------------
-- Server version	8.3.0

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'arbaz@gmail.com','arbaz@123',1,'2024-05-29 08:27:34');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `all_table_records`
--

DROP TABLE IF EXISTS `all_table_records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `all_table_records` (
  `id` int NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) NOT NULL,
  `is_editable` tinyint(1) DEFAULT '0',
  `is_deletable` tinyint(1) DEFAULT '0',
  `status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `all_table_records`
--

LOCK TABLES `all_table_records` WRITE;
/*!40000 ALTER TABLE `all_table_records` DISABLE KEYS */;
INSERT INTO `all_table_records` VALUES (1,'contact_us',0,0,1,'2024-05-29 07:03:43'),(2,'subscribe_nor',0,0,1,'2024-05-29 07:06:42'),(3,'subscribe_now',0,0,1,'2024-05-29 07:07:07'),(4,'vendor_registration',0,0,1,'2024-05-29 07:15:42'),(5,'new_table',0,0,1,'2024-05-29 09:00:26'),(6,'tester',0,0,1,'2024-05-29 09:03:24');
/*!40000 ALTER TABLE `all_table_records` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_us` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `message` text,
  `status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_us`
--

LOCK TABLES `contact_us` WRITE;
/*!40000 ALTER TABLE `contact_us` DISABLE KEYS */;
INSERT INTO `contact_us` VALUES (1,'Arbaz khan','ak.khanarbaz777@gmail.com','09625442725','as','this is test message',1,'2024-05-29 07:05:03'),(2,'Arbaz moh','ak.khanarbaz777@gmail.com','09625442725','as','this is test message, another',1,'2024-05-29 07:05:23'),(3,'Arbaz khan','ak.khanarbaz@gmail.com','9625442725','Test subject','this is test mail message',1,'2024-06-01 11:56:05');
/*!40000 ALTER TABLE `contact_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `new_table`
--

DROP TABLE IF EXISTS `new_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `new_table` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tester` varchar(122) DEFAULT NULL,
  `status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `new_table`
--

LOCK TABLES `new_table` WRITE;
/*!40000 ALTER TABLE `new_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `new_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscribe_nor`
--

DROP TABLE IF EXISTS `subscribe_nor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscribe_nor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(250) DEFAULT NULL,
  `status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribe_nor`
--

LOCK TABLES `subscribe_nor` WRITE;
/*!40000 ALTER TABLE `subscribe_nor` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscribe_nor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscribe_now`
--

DROP TABLE IF EXISTS `subscribe_now`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscribe_now` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(250) DEFAULT NULL,
  `status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribe_now`
--

LOCK TABLES `subscribe_now` WRITE;
/*!40000 ALTER TABLE `subscribe_now` DISABLE KEYS */;
INSERT INTO `subscribe_now` VALUES (1,'ak.khanarbaz777@gmail.com',1,'2024-05-29 07:11:09');
/*!40000 ALTER TABLE `subscribe_now` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tester`
--

DROP TABLE IF EXISTS `tester`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tester` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tert` int DEFAULT NULL,
  `status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tester`
--

LOCK TABLES `tester` WRITE;
/*!40000 ALTER TABLE `tester` DISABLE KEYS */;
/*!40000 ALTER TABLE `tester` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendor_registration`
--

DROP TABLE IF EXISTS `vendor_registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendor_registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `dob` varchar(250) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `aadhaar_number` varchar(250) DEFAULT NULL,
  `pan_number` varchar(250) DEFAULT NULL,
  `address_permanent` varchar(250) DEFAULT NULL,
  `address_present` varchar(250) DEFAULT NULL,
  `aadhar_image` varchar(250) DEFAULT NULL,
  `pan_image` varchar(250) DEFAULT NULL,
  `poc_police_verification_image` varchar(250) DEFAULT NULL,
  `photo_passport_image` varchar(250) DEFAULT NULL,
  `vendorship_agreement_image` varchar(250) DEFAULT NULL,
  `status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendor_registration`
--

LOCK TABLES `vendor_registration` WRITE;
/*!40000 ALTER TABLE `vendor_registration` DISABLE KEYS */;
INSERT INTO `vendor_registration` VALUES (1,'Arbaz','khan','2024-05-16','Male','ak.khanarbaz777@gmail.com','09625442725','642546277815','123ewqs','123ew','asdf','5566-1716969406.png','3788-1716969406.jpg','1975-1716969406.jpg','7030-1716969406.jpg','3681-1716969406.jpg',1,'2024-05-29 07:56:46');
/*!40000 ALTER TABLE `vendor_registration` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-01 17:28:22
