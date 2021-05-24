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
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (4,'one',40,'2021-04-02 21:49:08','2021-04-02 21:49:08'),(5,'two',40,'2021-04-02 21:49:08','2021-04-02 21:49:08'),(6,'three',40,'2021-04-02 21:49:08','2021-04-02 21:49:08'),(16,'pascal',44,'2021-04-02 23:39:47','2021-04-02 23:39:47'),(17,'paskasmazka',44,'2021-04-02 23:39:47','2021-04-02 23:39:47'),(18,'one',45,'2021-04-03 01:27:47','2021-04-03 01:27:47'),(19,'artem',34,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(20,'Доктор слеш',46,'2021-04-10 01:04:00','2021-04-10 01:04:00'),(21,'Доктор кавычка',46,'2021-04-10 01:04:00','2021-04-10 01:04:00'),(22,'омар хаям бабаям',47,'2021-04-10 01:46:45','2021-04-10 01:46:45'),(23,'Эдя',48,'2021-04-12 08:46:29','2021-04-12 08:46:29'),(24,'Игорь помогал',48,'2021-04-12 08:46:29','2021-04-12 08:46:29'),(25,'Жека',48,'2021-04-12 08:46:29','2021-04-12 08:46:29'),(26,'ревьюер',49,'2021-04-29 12:58:59','2021-04-29 12:58:59'),(27,'5левел',49,'2021-04-29 12:58:59','2021-04-29 12:58:59'),(28,'4левел',49,'2021-04-29 12:58:59','2021-04-29 12:58:59'),(29,'my name is author',1,'2021-05-01 01:34:49','2021-05-01 01:34:49'),(30,'tyu',50,'2021-05-07 11:43:28','2021-05-07 11:43:28'),(31,'yui',50,'2021-05-07 11:43:28','2021-05-07 11:43:28'),(32,'uiuiui',50,'2021-05-07 11:43:28','2021-05-07 11:43:28'),(33,'rfrfrf',51,'2021-05-07 11:44:05','2021-05-07 11:44:05'),(34,'ukukuk',51,'2021-05-07 11:44:05','2021-05-07 11:44:05'),(35,'mjmjmjm',51,'2021-05-07 11:44:05','2021-05-07 11:44:05'),(36,'Тим Кедлек',25,'2021-05-10 20:34:40','2021-05-10 20:35:23'),(37,'Тим Кедлек',26,'2021-05-10 20:35:40','2021-05-10 20:35:46'),(40,'Джон Кедлек',25,'2021-05-10 20:44:39','2021-05-10 20:44:39'),(52,'eeeeeh',333,'2021-05-13 03:11:13','2021-05-13 03:11:13'),(56,'piter',54,'2021-05-13 03:43:11','2021-05-13 03:43:11'),(57,'john',54,'2021-05-13 03:43:11','2021-05-13 03:43:11'),(58,'boob',54,'2021-05-13 03:43:11','2021-05-13 03:43:11'),(62,'internet',56,'2021-05-20 01:23:06','2021-05-20 01:23:06'),(63,'',56,'2021-05-20 01:23:06','2021-05-20 01:23:06'),(64,'',56,'2021-05-20 01:23:06','2021-05-20 01:23:06'),(74,'porpororo',61,'2021-05-20 02:44:19','2021-05-20 02:44:19'),(75,'ggggg',61,'2021-05-20 02:44:19','2021-05-20 02:44:19'),(76,'',61,'2021-05-20 02:44:19','2021-05-20 02:44:19');
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
  `year` int(1) NOT NULL,
  `pages` int(1) NOT NULL,
  `description` text NOT NULL,
  `views` int(6) NOT NULL,
  `clicks` int(6) NOT NULL,
  `soft_delete` int(1) NOT NULL,
  `image_link` varchar(30) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'СИ++ И КОМПЬЮТЕРНАЯ ГРАФИКА',2003,351,'Лекции и практикум по программированию на Си++',62,15,1,'images/22.jpg','2021-05-07 11:42:29','2021-03-13 00:00:00'),(13,'3',3,3,'3333333333333333333331',10,2,1,'images/25.jpg','2021-05-05 04:07:23','2021-03-16 00:00:00'),(15,'5',5,5,'5555555555555555555555555555551',6,3,1,'images/27.jpg','2021-04-10 05:26:28','2021-03-16 00:00:00'),(17,'7',7,7,'77777777777777777771',6,0,1,'images/31.jpg','2021-05-05 04:21:05','2021-03-16 00:00:00'),(19,'9',9,9,'99999999999999999999991',2,2,1,'images/33.jpg','2021-03-16 00:00:00','2021-03-16 00:00:00'),(21,'11',11,11,'11g111g11g1g1g1',16,3,1,'images/38.jpg','2021-05-05 04:23:24','2021-03-18 00:00:00'),(22,'12',12,12,'12lkj21lkj21l2jk',8,3,1,'images/46.jpg','2021-04-10 02:31:37','2021-03-18 00:00:00'),(23,'13',13,13,'13kj31k3j1k3j1k31',11,5,1,'images/45.jpg','2021-04-10 04:30:03','2021-03-18 00:00:00'),(24,'14',14,14,'14nb14mvb14mv14',9,3,1,'images/44.jpg','2021-04-30 23:55:59','2021-03-18 00:00:00'),(25,'15',15,15,'15l15l15l15j15h15g15',8,3,1,'images/42.jpg','2021-05-05 04:13:30','2021-03-18 00:00:00'),(26,'16',16,16,'16o16o16o16ooooo',6,1,1,'images/42.jpg','2021-04-29 12:35:02','2021-03-18 00:00:00'),(27,'17',17,17,'117l17k1l717k1l7k1',4,16,1,'images/40.jpg','2021-04-07 03:31:43','2021-03-18 00:00:00'),(28,'19',19,19,'19iuy19uytre',3,0,1,'images/39.jpg','2021-04-10 02:46:40','2021-03-18 00:00:00'),(29,'20',20,20,'20lalala201',5,2,1,'images/35.jpg','2021-04-12 08:48:03','2021-03-18 00:00:00'),(30,'21',21,21,'21adsfagr21',7,7,1,'images/37.jpg','2021-04-06 14:10:13','2021-03-18 00:00:00'),(31,'22',22,22,'22мвапвап1',31,43,1,'images/48.jpg','2021-04-10 05:16:20','2021-03-18 00:00:00'),(32,'23',23,23,'23232323231',4,0,1,'images/36.jpg','2021-04-29 12:35:14','2021-03-20 00:00:00'),(33,'андрюхина',2021,303,'про то как андрюха уехал1',2,0,1,'images/100.png','2021-03-21 00:00:00','2021-03-21 00:00:00'),(34,'artema kniga',2020,0,'pro matematiku1',6,6,1,'images/image_part_011.png','2021-04-03 02:10:43','2021-03-26 18:03:08'),(40,'python',1987,12,'gjgjgjgjgjgjgkgkgkg gkggik cbcfd gfdd1',3,2,1,'images/44.jpg','2021-04-03 13:23:15','2021-04-02 21:49:08'),(44,'pascal',-300,4,'kodingshmoding1',4,5,1,'images/100.png','2021-04-03 02:10:18','2021-04-02 23:39:47'),(45,'python2',1111,0,'kpd kod kod1',10,4,1,'images/43.jpg','2021-05-05 04:21:36','2021-04-03 01:27:47'),(46,'SQL иньекции script',3000,0,'Всякие разные теги. Типа',6,2,1,'images/1.jpg','2021-04-10 04:15:59','2021-04-10 01:04:00'),(47,'Программашка',214748364,6,'87657еенсапчвг658 олнапнева6сасо гнлопа77лопсморс рлап7чцудж жол -078556 вслд ьтолргне 78556 ипрае',6,0,1,'images/статуя.png','2021-04-12 08:44:03','2021-04-10 01:46:45'),(48,'Эдина',2018,48,'Как сделать бур',7,2,1,'images/47.jpg','2021-05-07 11:48:23','2021-04-12 08:46:29'),(49,'ревью кода',2021,0,'как не нужно кодить',11,6,1,'images/голова.png','2021-04-29 12:59:18','2021-04-29 12:58:59'),(50,'tytyty',1987,12,'fffffff           gggggggg ssssss aaaaaa',11,2,1,'images/37.jpg','2021-05-07 11:43:28','2021-05-07 11:43:28'),(51,'rfrfrfrf',1983,8,'qwety qwety qwerty',12,1,1,'images/29.jpg','2021-05-07 11:44:05','2021-05-07 11:44:05'),(54,'teeeest',4444,1234,'about php',4,3,1,'images/26.jpg','2021-05-13 03:43:11','2021-05-13 03:43:11'),(56,'last',9876,45,'stuff and stuffs',0,0,1,'images/39.jpg','2021-05-20 01:23:06','2021-05-20 01:23:06'),(61,'last3',666,17,'tra ta tra ta',1,2,1,'images/33.jpg','2021-05-20 02:44:19','2021-05-20 02:44:19');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'20210520114720_create-table-migration.php');
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
  `pass` varchar(30) NOT NULL,
  `current_page` int(4) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'igor','5555',3,'2021-05-07 11:46:44','0000-00-00 00:00:00'),(2,'cur_page','no_hash',0,'2021-05-07 11:42:18','2021-03-22 00:00:00');
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

-- Dump completed on 2021-05-21  1:54:26
