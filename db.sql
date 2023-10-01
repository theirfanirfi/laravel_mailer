-- MySQL dump 10.14  Distrib 5.5.68-MariaDB, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: xtramailer
-- ------------------------------------------------------
-- Server version	5.7.38

-- Create a new database
--CREATE DATABASE IF NOT EXISTS `xtramailer`;

-- Use the new database
-- USE `xtramailer`;


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
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) DEFAULT NULL,
  `data` text,
  `outbox_id` varchar(100) DEFAULT NULL,
  `outbox_item_id` varchar(100) DEFAULT NULL,
  `worker_server_id` int(100) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89240 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outbox_table`
--

DROP TABLE IF EXISTS `outbox_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `outbox_table` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `senderEmail` varchar(100) DEFAULT NULL,
  `senderName` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `messageLetter` text,
  `messageType` varchar(100) DEFAULT NULL,
  `encode` varchar(100) DEFAULT NULL,
  `responses` varchar(100) DEFAULT NULL,
  `error` varchar(100) DEFAULT NULL,
  `started` int(11) DEFAULT NULL,
  `is_successful` int(11) DEFAULT '0',
  `completed` int(11) DEFAULT NULL,
  `sent` int(11) DEFAULT NULL,
  `successful_sent_count` int(11) DEFAULT '0',
  `error_sent_count` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `flag` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4051 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outbox_table`
--

LOCK TABLES `outbox_table` WRITE;
/*!40000 ALTER TABLE `outbox_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `outbox_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_image_table`
--

DROP TABLE IF EXISTS `product_image_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_image_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_image_table`
--

LOCK TABLES `product_image_table` WRITE;
/*!40000 ALTER TABLE `product_image_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_image_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_table`
--

DROP TABLE IF EXISTS `products_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_table` (
  `id` int(22) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) NOT NULL,
  `product_price` double(30,0) NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `cover_image` varchar(200) NOT NULL,
  `description` text,
  `product_ref` varchar(200) NOT NULL,
  `stock` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_table`
--

LOCK TABLES `products_table` WRITE;
/*!40000 ALTER TABLE `products_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `q_app_master`
--

DROP TABLE IF EXISTS `q_app_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `q_app_master` (
  `app_id` int(11) NOT NULL AUTO_INCREMENT,
  `app_ref` varchar(110) DEFAULT NULL,
  `app_name` varchar(100) DEFAULT NULL,
  `cover_image` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `added_date` varchar(20) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `app_image` varchar(100) DEFAULT NULL,
  `language` varchar(20) DEFAULT NULL,
  `flag` tinyint(1) DEFAULT NULL,
  `user_image_x` int(10) DEFAULT '100',
  `user_image_y` int(10) DEFAULT '110',
  `user_name_x` int(10) DEFAULT '400',
  `user_name_y` int(10) DEFAULT '60',
  `user_name_font` varchar(100) DEFAULT 'Action Man Bold.ttf',
  `user_name_color` varchar(10) DEFAULT '#0f00',
  `user_name_align` varchar(10) DEFAULT 'center',
  `user_name_valign` varchar(10) DEFAULT 'top',
  `user_name_angle` int(10) DEFAULT '0',
  `user_name_size` int(10) DEFAULT '34',
  `random_name_x` int(10) DEFAULT '400',
  `random_name_y` int(10) DEFAULT '60',
  `random_name_font` varchar(100) DEFAULT 'Action Man Bold.ttf',
  `random_name_color` varchar(10) DEFAULT '#0f00',
  `random_name_align` varchar(10) DEFAULT 'center',
  `random_name_valign` varchar(10) DEFAULT 'top',
  `random_name_angle` int(10) DEFAULT '0',
  `random_name_size` int(10) DEFAULT '34',
  `is_unisex` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `q_app_master`
--

LOCK TABLES `q_app_master` WRITE;
/*!40000 ALTER TABLE `q_app_master` DISABLE KEYS */;
/*!40000 ALTER TABLE `q_app_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `q_app_random_data`
--

DROP TABLE IF EXISTS `q_app_random_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `q_app_random_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qam_id` int(11) DEFAULT NULL,
  `text` varchar(500) DEFAULT NULL,
  `sex` varchar(7) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `q_app_random_data`
--

LOCK TABLES `q_app_random_data` WRITE;
/*!40000 ALTER TABLE `q_app_random_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `q_app_random_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qapp_contact_us`
--

DROP TABLE IF EXISTS `qapp_contact_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qapp_contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `web` varchar(255) DEFAULT NULL,
  `message` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qapp_contact_us`
--

LOCK TABLES `qapp_contact_us` WRITE;
/*!40000 ALTER TABLE `qapp_contact_us` DISABLE KEYS */;
/*!40000 ALTER TABLE `qapp_contact_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qapp_shared_images`
--

DROP TABLE IF EXISTS `qapp_shared_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qapp_shared_images` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qapp_shared_images`
--

LOCK TABLES `qapp_shared_images` WRITE;
/*!40000 ALTER TABLE `qapp_shared_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `qapp_shared_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `server_status`
--

DROP TABLE IF EXISTS `server_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `server_status` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `php_mail_status` tinyint(4) DEFAULT NULL,
  `sendmail_status` tinyint(4) DEFAULT NULL,
  `memory_usage` double(100,0) DEFAULT NULL,
  `server_load` double(100,0) DEFAULT NULL,
  `server_id` int(100) DEFAULT NULL,
  `server_hash` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=322 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `server_status`
--

LOCK TABLES `server_status` WRITE;
/*!40000 ALTER TABLE `server_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `server_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `server_table`
--

DROP TABLE IF EXISTS `server_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `server_table` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `port` int(6) NOT NULL,
  `server_hash` text,
  `flag` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=255 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `server_table`
--

LOCK TABLES `server_table` WRITE;
/*!40000 ALTER TABLE `server_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `server_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
-- Default email: admin@xtramailr.com password: DefaultXMPW123
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@xtramailr.com','$2y$10$85bw.wgpyG.3W7FGpp9ZtOFECFcrYM1yYOrMFeeKxaLQzsE8qSxzG','5M42xP6ekR1MpJU5uKi1RPAF5CrRT0XKsgyWSHYYFg0cZBbMleUUST2Kgg6Y','2018-08-29 16:43:39','2018-08-29 16:43:45',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-04 16:21:11
