-- MySQL dump 10.13  Distrib 5.6.15, for Win64 (x86_64)
--
-- Host: localhost    Database: swapdeal
-- ------------------------------------------------------
-- Server version	5.6.15

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
-- Current Database: `swapdeal`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `swapdeal` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `swapdeal`;

--
-- Table structure for table `swapitemregister`
--

DROP TABLE IF EXISTS `swapitemregister`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `swapitemregister` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(45) DEFAULT NULL,
  `itemid` varchar(45) DEFAULT NULL,
  `customername` varchar(45) DEFAULT NULL,
  `customeremail` varchar(45) DEFAULT NULL,
  `customermobile` varchar(45) DEFAULT NULL,
  `customernote` varchar(45) DEFAULT NULL,
  `customerrate` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `swapitemregister`
--

LOCK TABLES `swapitemregister` WRITE;
/*!40000 ALTER TABLE `swapitemregister` DISABLE KEYS */;
INSERT INTO `swapitemregister` VALUES (1,'sreeji.gopal@in.ibm.com','7','sreeji','sreeji.gopal@in.ibm.com','9673331239','test','100'),(2,'sreeji.gopal@in.ibm.com','1','sreeji','sreeji.gopal@in.ibm.com','9673331239','please','100'),(3,'sreeji.gopal@in.ibm.com',NULL,'sreejoi','sreeji.gopal@in.ibm.com','9673331239',NULL,NULL),(4,'sreeji.gopal@in.ibm.com','1','sreejoi','sreeji.gopal@in.ibm.com','9673331239',NULL,NULL),(5,'sreeji.gopal@in.ibm.com','1','sreejoi','sreeji.gopal@in.ibm.com','9673331239','please','100'),(6,'sreeji.gopal@in.ibm.com','1','sreejoi','sreeji.gopal@in.ibm.com','9673331239','please','100'),(7,'sreeji.gopal@in.ibm.com','1','sreejoi','sreeji.gopal@in.ibm.com','9673331239','please','100'),(8,'sreeji.gopal@in.ibm.com','1','sreejoi','sreeji.gopal@in.ibm.com','9673331239','please','100'),(9,'sreeji.gopal@in.ibm.com','1','sreejoi','sreeji.gopal@in.ibm.com','9673331239','please','100'),(10,'sreeji.gopal@in.ibm.com','1','sreejoi','sreeji.gopal@in.ibm.com','9673331239','please','100'),(11,'sreeji.gopal@in.ibm.com','1','sreejoi','sreeji.gopal@in.ibm.com','9673331239','please','100'),(12,'sreeji.gopal@in.ibm.com','1','sreejoi','sreeji.gopal@in.ibm.com','9673331239','please','100'),(13,'sreeji.gopal@in.ibm.com','1','sreejoi','sreeji.gopal@in.ibm.com','9673331239','please','100'),(14,'sreeji.gopal@in.ibm.com','1','sreejoi','sreeji.gopal@in.ibm.com','9673331239','please','100'),(15,'sreeji.gopal@in.ibm.com','1','sreejoi','sreeji.gopal@in.ibm.com','9673331239','please','100'),(16,'sreeji.gopal@in.ibm.com','1','sreejoi','sreeji.gopal@in.ibm.com','9673331239','please','100'),(17,'sreeji.gopal@in.ibm.com','1','sreejoi','sreeji.gopal@in.ibm.com','9673331239','please','100'),(18,'sreeji.gopal@in.ibm.com','1','sreejoi','sreeji.gopal@in.ibm.com','9673331239','please','100'),(19,'krishna.balu@in.ibm.com','1','Krishna','krishna.balu@in.ibm.com','9823777260','please','100'),(20,'sreeji.gopal@in.ibm.com','2','Sreeji','sreeji.gopal@in.ibm.com','9673331239','please','100'),(21,'sreeji.gopal@in.ibm.com','2','Sreeji','sreeji.gopal@in.ibm.com','9673331239','[object Object]','[object Object]'),(22,'sreeji.gopal@in.ibm.com','3','Sreeji','sreeji.gopal@in.ibm.com','9673331239','please sell it','20000'),(23,'krishna.balu@in.ibm.com','48','krishna','krishna.balu@in.ibm.com','9823777260','please check','19000'),(24,'sweetymsharma@yahoo.com','59','sweety','sweetymsharma@yahoo.com','9561334556','to self','41000'),(25,'sweetymsharma@yahoo.com','59','Sweety','sweetymsharma@yahoo.com','9561334556','sample','45000');
/*!40000 ALTER TABLE `swapitemregister` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `swapitems`
--

DROP TABLE IF EXISTS `swapitems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `swapitems` (
  `itemID` int(11) NOT NULL AUTO_INCREMENT,
  `itemName` varchar(45) DEFAULT NULL,
  `itemCategory` varchar(45) DEFAULT NULL,
  `itemSubCategory` varchar(45) DEFAULT NULL,
  `itemPicLoc` varchar(45) DEFAULT NULL,
  `itemPrice` varchar(45) DEFAULT NULL,
  `itemContactId` varchar(45) DEFAULT NULL,
  `itemMobile` varchar(45) DEFAULT NULL,
  `itemAddress` varchar(45) DEFAULT NULL,
  `itemAgent` varchar(45) DEFAULT NULL,
  `itemRegDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `itemUpdateDate` datetime DEFAULT NULL,
  `itemCloseDate` datetime DEFAULT NULL,
  `itemDesc` varchar(250) DEFAULT NULL,
  `itemUsed` int(11) DEFAULT '0',
  `itemSwap` int(11) DEFAULT '1',
  `itemContactType` int(11) DEFAULT '1',
  PRIMARY KEY (`itemID`),
  UNIQUE KEY `itemID_UNIQUE` (`itemID`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `swapitems`
--

LOCK TABLES `swapitems` WRITE;
/*!40000 ALTER TABLE `swapitems` DISABLE KEYS */;
INSERT INTO `swapitems` VALUES (1,'Sony TV 1','Household','Electronic','1.jpg,2.jpg,3.jpg,4.jpg','22000','75','9673331239',NULL,'0',NULL,NULL,NULL,'Sony 1 television - 29\" inches, excellent working condition, 2006 - 2007 model. Call me at: 9766330109.',0,0,1),(2,'Sony TV 2','Household','Electronic','1.jpg,2.jpg,3.jpg,4.jpg',NULL,'75','9673331239',NULL,'0',NULL,NULL,NULL,'Sony 2  television - 29\" inches, excellent working condition, 2006 - 2007 model. Call me at: 9766330109.',0,0,1),(3,'Sony TV 3','Household','Electronic',NULL,NULL,'75','9673331239',NULL,'1','2013-11-28 12:01:00',NULL,NULL,'Sony 3  television - 29\" inches, excellent working condition, 2006 - 2007 model. Call me at: 9766330109.',0,0,1),(4,'Sony TV 4','Household','Electronic',NULL,NULL,'75','9673331239',NULL,'1','2013-11-28 12:01:05',NULL,NULL,'Sony 4  television - 29\" inches, excellent working condition, 2006 - 2007 model. Call me at: 9766330109.',0,1,1),(5,'Sony TV 5','Household','Electronic',NULL,'22000','1','9673331239',NULL,'0','2013-11-28 12:01:08',NULL,NULL,'Sony television - 29\" inches, excellent working condition, 2006 - 2007 model. Call me at: 9766330109.',0,1,1),(6,'Sony TV 6','Household','Electronic',NULL,'22000','1','9673331239',NULL,'0','2013-11-28 12:07:45',NULL,NULL,'Sony television - 29\" inches, excellent working condition, 2006 - 2007 model. Call me at: 9766330109.',0,1,1),(16,'','Mobile Phones','LED',NULL,'','1','','','individual','2014-01-21 14:51:44',NULL,NULL,'',1,1,1),(20,'','Mobile Phones','LED',NULL,'','1','','','individual','2014-01-21 15:48:28',NULL,NULL,'',1,1,1),(21,'','Mobile Phones','LED',NULL,'','82','9673331239','sreeji.gopal@gmail.com','individual','2014-01-21 18:18:50',NULL,NULL,'',1,1,1),(23,'Sony TV new','Electronics & Technology','LCD',NULL,'18000','82','9673331239','sreeji.gopal@gmail.com','individual','2014-01-21 18:21:25',NULL,NULL,'Good tv but black in colour',1,1,1),(24,'TV 21 inch','Electronics & Technology','LED',NULL,'1888','82','9673331239','sreeji.gopal@gmail.com','individual','2014-01-21 18:24:04',NULL,NULL,'sfdasfda',1,1,1),(47,'Sony TV','Mobile Phones','LED','1.jpg,2.jpg','','93','9673331239','sreeji.gopal@in.ibm.com','individual','2014-01-22 15:35:55',NULL,NULL,'',1,1,1),(48,'Sony TV 22 inch','Electronics & Technology','LED','1.JPG,2.JPG','','94','9673331239','sreeji.gopal@in.ibm.com','individual','2014-01-22 15:40:41',NULL,NULL,'',1,1,1),(50,'TV holder','Mobile Phones','Others',NULL,'1500','95','9673331239','sreeji.gopal@in.ibm.com','individual','2014-01-22 16:24:42',NULL,NULL,'No idea',1,1,1),(51,'TV stand','Electronics & Technology','Others','1.JPG,2.JPG','1800','95','9673331239','sreeji.gopal@in.ibm.com','individual','2014-01-22 16:26:36',NULL,NULL,'no idea',1,1,1),(52,'buy blackberry','Mobile Phones','Others',NULL,'18000','95','9673331239','sreeji.gopal@in.ibm.com','individual','2014-01-22 16:50:27',NULL,NULL,'',1,1,1),(53,'Iphone Buy','Mobile Phones','Others',NULL,'21000','95,Existing','9673331239','sreeji.gopal@in.ibm.com','individual','2014-01-22 16:56:55',NULL,NULL,'want to buy iphone',1,1,1),(54,'TV sony','Electronics & Technology','LED',NULL,'29000','95','9673331239','sreeji.gopal@in.ibm.com','individual','2014-01-22 17:03:48',NULL,NULL,'',1,1,1),(55,'table','Home & Lifestyle','LED','1.JPG,2.JPG','','95','9673331239','sreeji.gopal@in.ibm.com','individual','2014-01-22 17:07:26',NULL,NULL,'',1,1,0),(56,'','Mobile Phones','LED',NULL,'','96','','','individual','2014-01-22 17:40:47',NULL,NULL,'',1,1,1),(57,'','Mobile Phones','LED',NULL,'','96','','','individual','2014-01-22 17:41:43',NULL,NULL,'',1,1,1),(58,'sampler','Cars & Bikes','LED','1.JPG,2.jpg','','95','9673331239','sreeji.gopal@in.ibm.com','individual','2014-01-22 18:06:48',NULL,NULL,'',1,1,1),(59,'Iphone 5','Mobile Phones','LED','1.jpg,2.jpg','51000','95','9673331239','sreeji.gopal@in.ibm.com','individual','2014-01-22 18:19:06',NULL,NULL,'iphone 5 for testing',1,1,1),(60,'HTC Desire C','Mobile Phones','Others','1.png,2.jpg','9000','97','9561334556','sweetymsharma@yahoo.com','individual','2014-01-25 12:42:13',NULL,NULL,'This is the best phone i had, selling for money only, I wan to buy Iphone',1,1,1);
/*!40000 ALTER TABLE `swapitems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `swapuser`
--

DROP TABLE IF EXISTS `swapuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `swapuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `secret_question` varchar(45) DEFAULT NULL,
  `secret_answer` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `swapuser`
--

LOCK TABLES `swapuser` WRITE;
/*!40000 ALTER TABLE `swapuser` DISABLE KEYS */;
INSERT INTO `swapuser` VALUES (1,'swapadmin','admin','how are you','fine',NULL,NULL,NULL),(2,'swapuser','admin','how are you','fine',NULL,NULL,NULL),(3,'swaproot','admin','how are you','fine',NULL,NULL,NULL),(33,'rekhasreeji@gmail.com','sreeji',NULL,NULL,'rekhasreeji@gmail.com','8237181956',NULL),(75,'krishna.balu@in.ibm.com','krishna',NULL,NULL,'krishna.balu@in.ibm.com','9823777260','Krishna'),(79,'vibvidya@in.ibm.com','vibesh',NULL,NULL,'vibvidya@in.ibm.com','9545555002','Vibesh'),(82,'sreeji.gopal@gmail.com',NULL,NULL,NULL,NULL,NULL,'sreeji'),(85,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(95,'sreeji.gopal@in.ibm.com','O2hfNpr5',NULL,NULL,'sreeji.gopal@in.ibm.com','9673331239','Sreeji'),(96,'','bvfsVxWp',NULL,NULL,'','',''),(97,'sweetymsharma@yahoo.com','sweety',NULL,NULL,'sweetymsharma@yahoo.com','9561334556','Sweety');
/*!40000 ALTER TABLE `swapuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tempswapitems`
--

DROP TABLE IF EXISTS `tempswapitems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tempswapitems` (
  `sessionid` varchar(30) DEFAULT NULL,
  `pic1` varchar(45) DEFAULT NULL,
  `pic2` varchar(45) DEFAULT NULL,
  `pic3` varchar(45) DEFAULT NULL,
  `pic4` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tempswapitems`
--

LOCK TABLES `tempswapitems` WRITE;
/*!40000 ALTER TABLE `tempswapitems` DISABLE KEYS */;
/*!40000 ALTER TABLE `tempswapitems` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-01-27  9:16:23
