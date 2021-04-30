-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: booksdb
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

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
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `book_id` int(4) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (4,'one',40,'2021-04-02 21:49:08','2021-04-02 21:49:08'),(5,'two',40,'2021-04-02 21:49:08','2021-04-02 21:49:08'),(6,'three',40,'2021-04-02 21:49:08','2021-04-02 21:49:08'),(16,'pascal',44,'2021-04-02 23:39:47','2021-04-02 23:39:47'),(17,'paskasmazka',44,'2021-04-02 23:39:47','2021-04-02 23:39:47'),(18,'one',45,'2021-04-03 01:27:47','2021-04-03 01:27:47'),(19,'artem',34,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `year` int(4) NOT NULL,
  `pages` int(4) NOT NULL,
  `description` text NOT NULL,
  `views` int(6) NOT NULL,
  `wants` int(6) NOT NULL,
  `status` int(1) NOT NULL,
  `image_link` varchar(30) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'СИ++ И КОМПЬЮТЕРНАЯ ГРАФИКА',2003,351,'Лекции и практикум по программированию на Си++',3,5,1,'images/22.jpg','2021-04-03 02:10:05','2021-03-13 00:00:00'),(13,'3',3,3,'3333333333333333333331',5,2,1,'images/25.jpg','2021-04-05 20:15:16','2021-03-16 00:00:00'),(15,'5',5,5,'5555555555555555555555555555551',0,2,1,'images/27.jpg','2021-03-22 00:00:00','2021-03-16 00:00:00'),(17,'7',7,7,'77777777777777777771',0,0,1,'images/31.jpg','2021-03-16 00:00:00','2021-03-16 00:00:00'),(19,'9',9,9,'99999999999999999999991',0,0,1,'images/33.jpg','2021-03-16 00:00:00','2021-03-16 00:00:00'),(21,'11',11,11,'11g111g11g1g1g1',2,3,1,'images/38.jpg','2021-03-28 20:45:05','2021-03-18 00:00:00'),(22,'12',12,12,'12lkj21lkj21l2jk',2,2,1,'images/46.jpg','2021-04-07 03:30:33','2021-03-18 00:00:00'),(23,'13',13,13,'13kj31k3j1k3j1k31',1,0,1,'images/45.jpg','2021-03-26 18:05:30','2021-03-18 00:00:00'),(24,'14',14,14,'14nb14mvb14mv14',0,0,1,'images/44.jpg','2021-03-18 00:00:00','2021-03-18 00:00:00'),(25,'15',15,15,'15l15l15l15j15h15g15',0,0,1,'images/42.jpg','2021-03-18 00:00:00','2021-03-18 00:00:00'),(26,'16',16,16,'16o16o16o16ooooo',0,0,1,'images/42.jpg','2021-03-18 00:00:00','2021-03-18 00:00:00'),(27,'17',17,17,'117l17k1l717k1l7k1',2,16,1,'images/40.jpg','2021-04-07 03:31:43','2021-03-18 00:00:00'),(28,'19',19,19,'19iuy19uytre',0,0,1,'images/39.jpg','2021-03-18 00:00:00','2021-03-18 00:00:00'),(29,'20',20,20,'20lalala201',0,0,1,'images/35.jpg','2021-03-18 00:00:00','2021-03-18 00:00:00'),(30,'21',21,21,'21adsfagr21',5,7,1,'images/37.jpg','2021-04-06 14:10:13','2021-03-18 00:00:00'),(31,'22',22,22,'22мвапвап1',0,0,1,'images/48.jpg','2021-03-18 00:00:00','2021-03-18 00:00:00'),(32,'23',23,23,'23232323231',1,0,1,'images/36.jpg','2021-03-26 18:00:18','2021-03-20 00:00:00'),(33,'андрюхина',2021,303,'про то как андрюха уехал1',0,0,1,'images/100.png','2021-03-21 00:00:00','2021-03-21 00:00:00'),(34,'artema kniga',2020,0,'pro matematiku1',1,3,1,'images/image_part_011.png','2021-04-03 02:10:43','2021-03-26 18:03:08'),(40,'python',1987,12,'gjgjgjgjgjgjgkgkgkg gkggik cbcfd gfdd1',1,2,1,'images/44.jpg','2021-04-03 13:23:15','2021-04-02 21:49:08'),(44,'pascal',-300,4,'kodingshmoding1',2,5,1,'images/100.png','2021-04-03 02:10:18','2021-04-02 23:39:47'),(45,'python2',1111,0,'kpd kod kod1',3,1,1,'images/43.jpg','2021-04-03 13:23:25','2021-04-03 01:27:47');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phinxlog`
--

LOCK TABLES `phinxlog` WRITE;
/*!40000 ALTER TABLE `phinxlog` DISABLE KEYS */;
INSERT INTO `phinxlog` VALUES (20210324225542,'CreateTableUsers','2021-03-24 22:25:54','2021-03-24 22:25:54',0),(20210324231506,'CreateTableBooks','2021-03-24 22:25:54','2021-03-24 22:25:54',0),(20210401110143,'CreateTableAuthors','2021-04-01 10:07:32','2021-04-01 10:07:32',0);
/*!40000 ALTER TABLE `phinxlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `hash` varchar(20) NOT NULL,
  `curent_page` int(4) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'igor','Basic aWdvcjo1NTU1',0,'2021-04-07 03:30:16','0000-00-00 00:00:00'),(2,'no_user','no_hash',0,'2021-03-26 18:05:26','2021-03-22 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-07  5:15:49
