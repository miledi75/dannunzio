CREATE DATABASE  IF NOT EXISTS `db_dannunzio` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_dannunzio`;
-- MySQL dump 10.13  Distrib 5.6.23, for Win32 (x86)
--
-- Host: localhost    Database: db_dannunzio
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('2723b9457cbaa10505bff10e66655ba6','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; rv:37.0) Gecko/20100101 Firefox/37.0',1429004654,'a:4:{s:8:\"username\";s:5:\"kriss\";s:5:\"email\";s:13:\"kdeburg@k.com\";s:9:\"logged_in\";b:1;s:4:\"role\";s:5:\"buyer\";}'),('c382bb9c04ebd8c3c2ce4d4e1e4dc077','127.0.0.1','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36',1429016522,'a:6:{s:9:\"user_data\";s:0:\"\";s:8:\"username\";s:6:\"miledi\";s:5:\"email\";s:20:\"mileto1975@gmail.com\";s:7:\"user_id\";s:1:\"1\";s:9:\"logged_in\";b:1;s:4:\"role\";s:5:\"admin\";}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_art_objects`
--

DROP TABLE IF EXISTS `tbl_art_objects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_art_objects` (
  `art_object_id` int(11) NOT NULL AUTO_INCREMENT,
  `price` double DEFAULT NULL,
  `artist_id` int(11) NOT NULL,
  `artefact_type_id` int(11) NOT NULL,
  `art_period_id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `description` mediumtext CHARACTER SET latin1,
  `archived` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`art_object_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_art_objects`
--

LOCK TABLES `tbl_art_objects` WRITE;
/*!40000 ALTER TABLE `tbl_art_objects` DISABLE KEYS */;
INSERT INTO `tbl_art_objects` VALUES (1,654,3,2,3,'test','March 15','lkjlkjlkj',0),(2,654,3,3,3,'test','May 14','added description',0),(3,654,4,2,2,'test','April 13','a very shirt description',0),(4,987,4,1,1,'Sunflowers','February 2015',NULL,1),(5,321,4,2,3,'puppets','2015-03',NULL,0),(6,879,4,1,1,'pupettes two','2015-03','second series oh the pupettes',0),(7,545,4,2,1,'pupetes three','2015-03','',0),(8,654,4,3,4,'pupetes 3','2015-03','Third work in the pupetes plastic doll series',0),(9,654,3,1,1,'treest','2015-03','654654',0);
/*!40000 ALTER TABLE `tbl_art_objects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_art_period`
--

DROP TABLE IF EXISTS `tbl_art_period`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_art_period` (
  `art_period_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_period` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`art_period_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_art_period`
--

LOCK TABLES `tbl_art_period` WRITE;
/*!40000 ALTER TABLE `tbl_art_period` DISABLE KEYS */;
INSERT INTO `tbl_art_period` VALUES (1,'Impressionism'),(2,'Expressionism'),(3,'Postmodern'),(4,'Rural'),(5,'Popart');
/*!40000 ALTER TABLE `tbl_art_period` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_artefact_type`
--

DROP TABLE IF EXISTS `tbl_artefact_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_artefact_type` (
  `artefact_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `artefact_type` varchar(60) DEFAULT NULL,
  `state` varchar(45) DEFAULT '0',
  PRIMARY KEY (`artefact_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_artefact_type`
--

LOCK TABLES `tbl_artefact_type` WRITE;
/*!40000 ALTER TABLE `tbl_artefact_type` DISABLE KEYS */;
INSERT INTO `tbl_artefact_type` VALUES (1,'paintings','1'),(2,'sculptures','1'),(3,'lithos','1'),(4,'pottery','2'),(5,'canvas','2'),(6,'canvas','2'),(7,'canvas','2'),(8,'canvas','2'),(9,NULL,'2'),(10,NULL,'2'),(11,'test','2'),(12,'canvas','2'),(13,'canvas','2'),(14,'canvas','2'),(15,'blabla','2'),(16,'blabla','2'),(17,'gfd','2'),(18,'gfd','2'),(19,'gfd','2'),(20,'tre','2'),(21,'tre','2'),(22,'test','2'),(23,'test','2'),(24,'ter','2'),(25,'erth','2'),(26,'ers','2'),(27,'test','2'),(28,'test','2'),(29,'tert','2'),(30,'tre','2'),(31,'uygt','2'),(32,'iuyiuy','2'),(33,'canvas','2'),(34,'kutje','2'),(35,'ppietje','2'),(36,'ARTE','2'),(37,'AZRA','2'),(38,'SDF','2'),(39,'qsdQS','2'),(40,'SDFSD','2'),(41,'SDFSDF','2'),(42,'AZEAZE','2'),(43,'sqdsq','2'),(44,'sdfds','2'),(45,'qsdqsd','2'),(46,'dfg','2'),(47,'sdgdfg','2'),(48,'cvb','2'),(49,'fghg','2'),(50,'aze','2'),(51,'qsd','2'),(52,'qsdqsdqsd','2'),(53,'sqsdq','2'),(54,'qdqsdqsd','2'),(55,'fgh','2'),(56,'iop','2'),(57,'bnj','2'),(58,'jklo','2'),(59,'jkli','2'),(60,'azs','2'),(61,'xxx','2'),(62,'xxxq','2'),(63,'qwxcqds','2'),(64,'www','2'),(65,'yyy','2'),(66,'kkk','2'),(67,'uuu','2'),(68,'vvv','2'),(69,'uuus','2'),(70,'uuust','2'),(71,'qqq','2'),(72,'xcv','2'),(73,'rtrte','2'),(74,'fghrt','2'),(75,'plk','2'),(76,'cnvxbjh','2'),(77,'cvbdf','2'),(78,'sdfsdfqsdqsd','2'),(79,'mlkp','2'),(80,'poilkj','2'),(81,'aaaaaa','2'),(82,'bbbbbbbb','2'),(83,'dddddd','2'),(84,'rrrrrr','2'),(85,'ttttt','2'),(86,'rtyhg','2'),(87,'test','2'),(88,'Photography','2'),(89,'Photography','1'),(90,'potjes','2'),(91,'ratjes','2'),(92,'test','1'),(93,NULL,NULL);
/*!40000 ALTER TABLE `tbl_artefact_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_events`
--

DROP TABLE IF EXISTS `tbl_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(145) DEFAULT NULL,
  `date` varchar(145) DEFAULT NULL,
  `max_allowed` int(10) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_events`
--

LOCK TABLES `tbl_events` WRITE;
/*!40000 ALTER TABLE `tbl_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_events_registration`
--

DROP TABLE IF EXISTS `tbl_events_registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_events_registration` (
  `registration_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `nr_of_persons` int(10) DEFAULT NULL,
  PRIMARY KEY (`registration_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_events_registration`
--

LOCK TABLES `tbl_events_registration` WRITE;
/*!40000 ALTER TABLE `tbl_events_registration` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_events_registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_images`
--

DROP TABLE IF EXISTS `tbl_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_images` (
  ` image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(200) DEFAULT NULL,
  `binary_image` blob,
  `art_object_id` int(11) DEFAULT NULL,
  `image_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (` image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_images`
--

LOCK TABLES `tbl_images` WRITE;
/*!40000 ALTER TABLE `tbl_images` DISABLE KEYS */;
INSERT INTO `tbl_images` VALUES (1,'C:/Users/miledi/OneDrive/wamp/www/ci/uploads/',NULL,1,'vraag13.JPG'),(2,'C:/Users/miledi/OneDrive/wamp/www/ci/uploads/',NULL,2,'vraag13.JPG'),(3,'C:/Users/miledi/OneDrive/wamp/www/ci/uploads/',NULL,3,'vraag14_b.JPG'),(4,'C:/Users/miledi/OneDrive/wamp/www/ci/uploads/',NULL,4,'vraag14_c.JPG'),(5,'C:/Users/miledi/OneDrive/wamp/www/ci/uploads/',NULL,5,'vraag12.JPG'),(6,'C:/Users/miledi/OneDrive/wamp/www/ci/uploads/',NULL,6,'vraag14_b.JPG'),(7,'C:/Users/miledi/OneDrive/wamp/www/ci/uploads/',NULL,7,'vraag10.JPG'),(8,'C:/Users/miledi/OneDrive/wamp/www/ci/uploads/',NULL,8,'vraag11.JPG'),(9,'C:/Users/miledi/OneDrive/wamp/www/ci/uploads/',NULL,9,'Knipsel.PNG');
/*!40000 ALTER TABLE `tbl_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_messages`
--

DROP TABLE IF EXISTS `tbl_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(145) DEFAULT NULL,
  `title` varchar(145) DEFAULT NULL,
  `body` mediumtext,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `read` int(2) DEFAULT '0',
  PRIMARY KEY (`message_id`),
  UNIQUE KEY `message_id_UNIQUE` (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_messages`
--

LOCK TABLES `tbl_messages` WRITE;
/*!40000 ALTER TABLE `tbl_messages` DISABLE KEYS */;
INSERT INTO `tbl_messages` VALUES (1,'mileto1975@gmail.com','info request','Hello, I would like some info','2015-04-14 14:51:42',0),(2,'kim.maes@howest.be','Question','Hello, I have a quesition','2015-04-14 14:52:30',0);
/*!40000 ALTER TABLE `tbl_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sales`
--

DROP TABLE IF EXISTS `tbl_sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `approved` tinyint(1) DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `art_object_id` int(11) NOT NULL,
  `closed` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sales`
--

LOCK TABLES `tbl_sales` WRITE;
/*!40000 ALTER TABLE `tbl_sales` DISABLE KEYS */;
INSERT INTO `tbl_sales` VALUES (1,0,45,6,0);
/*!40000 ALTER TABLE `tbl_sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_address`
--

DROP TABLE IF EXISTS `tbl_user_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_address` (
  `user_address_id` int(11) NOT NULL AUTO_INCREMENT,
  `street` varchar(45) DEFAULT NULL,
  `number` varchar(45) DEFAULT NULL,
  `postal_code` varchar(45) DEFAULT NULL,
  `town` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_address`
--

LOCK TABLES `tbl_user_address` WRITE;
/*!40000 ALTER TABLE `tbl_user_address` DISABLE KEYS */;
INSERT INTO `tbl_user_address` VALUES (1,'Kikvorsstraat','22','9000','Gent','BE'),(2,'Langestraat','67','8370','Blankenberge','BE'),(3,'Bakkerstraat','65','8000','Brugge','BE'),(4,'Hatfield Road','1','65498','Hatfiled','UK'),(5,'langestraat','69','9000','Ghent','BE'),(6,'langestraat','69','9000','Ghent','BE'),(7,'langestraat','69','9000','Ghent','BE'),(8,'langestraat','69','9000','Ghent','BE'),(9,'langestraat','69','9000','Ghent','BE'),(10,'kikvorsstraat','22','9000','gent','be'),(11,'kikvorsstraat','22','9000','gent','be'),(12,'hoogpoort','15','9000','Ghent','BE'),(13,'kikv','54','9000','gehtn','BE'),(14,'kikvrs','98','8000','Brugge','BE'),(15,'kik','89','9000','gent','BE'),(16,'kik','54','900','gent','BE'),(17,'kikvorsstraat','22','9000','gent','BE'),(18,'Kikvorsstraat 22','2','9000','Gent','Belgium'),(19,'kik','22','9000','Ghent','be'),(20,'kik','22','9000','Ghent','be'),(21,'kik','22','9000','Ghent','be'),(22,'kikvorsstraat','22','9000','Ghent','be'),(23,'kikvorsstraat','22','9000','Ghent','be'),(24,'kikvorsstraat','22','9000','Ghent','BE'),(25,'kikvorsstraat','22','9000','Ghent','BE'),(26,'kik','65','9000','gent','br'),(27,'0','0','0','0','0'),(28,'','','','',''),(29,'kikvorsstraat','22','9000','Ghent','be');
/*!40000 ALTER TABLE `tbl_user_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_data`
--

DROP TABLE IF EXISTS `tbl_user_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_data` (
  `tbl_user_data_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `cell_phone` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `user_address_id` int(11) NOT NULL,
  PRIMARY KEY (`tbl_user_data_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_data`
--

LOCK TABLES `tbl_user_data` WRITE;
/*!40000 ALTER TABLE `tbl_user_data` DISABLE KEYS */;
INSERT INTO `tbl_user_data` VALUES (1,'Mileto','Di Marco','04564987654',1,1),(2,'Kim','Maes','0321654',2,1),(3,'Luca','Di Marco','321654987',3,2),(4,'Mina','Di Marco','321654987',4,3),(5,'Mike','Dandy','32156487',6,4),(6,'Kristof','Cleymans','046986532',19,5),(8,'Kristof','Cleymans','046986532',21,7),(9,'Kristof','Cleymans','046986532',22,8),(10,'Kristof','Cleymans','046986532',23,9),(11,'KKris','cil','321654',24,10),(12,'KKris','cil','321654',25,11),(13,'Nancy','Vanranst','321654987',26,12),(14,'Gert','VH','23165489',27,13),(15,'FLip','Flp','32165498',28,14),(16,'me','me','231654897',29,15),(17,'test','test','654987654',30,16),(18,'test','test','321654897',31,17),(19,'bill','Clinton','654987654',32,18),(20,'mil','mil','321654987',38,19),(21,'mil','mil','321654987',39,20),(22,'mil','mil','321654987',40,21),(23,'mil','dim','56487',41,22),(24,'mil','mil','321654987',42,23),(25,'miledi75','dim','321654',43,24),(26,'kim','maes','321654',44,25),(27,'kim','maes','654987654',45,26),(28,'0','0','0',46,27),(29,'kim','maes','',47,28),(30,'kriss','Deburgh','321654',48,29);
/*!40000 ALTER TABLE `tbl_user_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_roles`
--

DROP TABLE IF EXISTS `tbl_user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_roles` (
  `user_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_roles`
--

LOCK TABLES `tbl_user_roles` WRITE;
/*!40000 ALTER TABLE `tbl_user_roles` DISABLE KEYS */;
INSERT INTO `tbl_user_roles` VALUES (1,'admin'),(2,'subadmin'),(3,'buyer'),(4,'artist');
/*!40000 ALTER TABLE `tbl_user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `user_role_id` int(11) NOT NULL,
  `archived` int(11) DEFAULT '0',
  `approved` int(2) DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES (1,'miledi','772e19ab0ec7b1cbc6697243179090a3','mileto1975@gmail.com',1,0,1),(3,'luca','luca','luca@luca.com',4,0,1),(4,'mina','mina','mina@mina.com',4,0,1),(6,'mike','mike','mike@mike.com',3,0,1),(19,'kriscl','kriscl','kriscl@kris.com',3,0,1),(20,'kriscl','kriscl','kriscl@kris.com',3,0,1),(21,'kriscl','kriscl','kriscl@kris.com',3,0,1),(22,'kris','kris','cil@cil.com',3,0,1),(23,'kris','','cil@cil.com',3,0,1),(24,'kris','kris','cil@cil.com',3,0,1),(25,'kris','lkj','cil@cil.com',3,0,1),(26,'nancy','nancy','nac@nanc.com',3,0,1),(27,'get','get','vh@vh.com',3,0,1),(28,'flip','flip','lk@lkj.com',3,0,1),(29,'mil','mil','me@me.com',3,0,1),(30,'test','test','test@t.com',3,0,1),(31,'tyet','test','t@t.com',3,0,1),(32,'billy','blabla','bill@bill.com',3,0,1),(45,'kim','098f6bcd4621d373cade4e832627b4f6','kim@kim.com',3,0,1),(46,'0','d41d8cd98f00b204e9800998ecf8427e','0',3,0,1),(47,'kimmie','098f6bcd4621d373cade4e832627b4f6','kim@k.com',3,0,1),(48,'kriss','098f6bcd4621d373cade4e832627b4f6','kdeburg@k.com',3,0,0);
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-14 15:23:31
