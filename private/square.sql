-- MySQL dump 10.13  Distrib 5.5.29, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: square
-- ------------------------------------------------------
-- Server version	5.5.29-0ubuntu0.12.04.1

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
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `CountryID` int(11) NOT NULL AUTO_INCREMENT,
  `CountryName` varchar(255) NOT NULL,
  PRIMARY KEY (`CountryID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'United States'),(2,'United Kingdom'),(3,'India'),(4,'Singapore'),(5,'Germany'),(6,'France'),(7,'Italy'),(8,'Spain'),(9,'Hungary');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `family`
--

DROP TABLE IF EXISTS `family`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `family` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `familyname` varchar(255) NOT NULL,
  `code` varchar(60) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `famcat` int(9) DEFAULT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `family`
--

LOCK TABLES `family` WRITE;
/*!40000 ALTER TABLE `family` DISABLE KEYS */;
INSERT INTO `family` VALUES (1,'firstname','CUTiNzmnVk','email',0),(2,'Doug and Jo','Vnk?dc*rLZ','gastromail@gmail.com; joanna.shulman@gmail.com',1),(3,'Tamara and George','t6vu?pVR)w','tgheligman@gmail.com; sliiiiiide@gmail.com',4),(4,'Rob and Ellie','qj7ANVE2k0','rsamuel@consultpoint.com.au; ellie2408@yahoo.co.uk',1),(5,'Jeremy and Ilana','8WTZel3A1l','jeremysamuel@anacacia.com.au; ilanakresner@hotmail.com',1),(6,'Colin  and Michelle','Mv0p5UbnVK','colinsamuel@hotmail.com; michellecsamuel@yahoo.com.au',1),(7,'Gill and Andy','wCch0)qgbD','gillsamuel@hotmail.com; asamuel@optushome.com.au',1),(8,'Anna and Matt','FT&Htps1Nw','annagoulston@hotmail.com; ',1),(9,'Kerry','t7UxQ4GNo1','kerry.goulston@sydney.edu.au',1),(10,'Bar and Tim','XZ7TDyqq71','bar_co@hotmail.com; tcohen1@bigpond.net.au',1),(11,'Jess','sU#YqAq&Nd','jesscohen58@gmail.com',1),(12,'Anna and Russ','4RitMXcT&q','??; ',1),(13,'Sadhana and Asanga','s$ghP#aIf9','sadhana@scoastnet.com.au; ',1),(14,'Sue and Hal and May','iXny)GaLkg','shallenstein@yahoo.com; hhallenstein@yahoo.com.au; ',1),(15,'Joe and Joe\'s girlfriend','qDeIIgXPHa','jhallenstein@gmail.com; ',1),(16,'Ben and Jo','DFGwlNxtoU','bhallenstein@hotmail.com; ',1),(17,'Lucie','zzvKPGDG7X','lhallenstein@gmail.com',1),(18,'Louise and Simon','#Q&d#Pu5W&','pvhyds@iprimus.com.au; ',1),(19,'Oliver and Oliver\'s gf','j2QrD4pXXP','ofrankel@bigpond.net.au; ',1),(20,'Gigi and Shane','Y0dR*PFY$U','ginette@goulston-lincoln.com; ',1),(21,'Wendy and Larry','S#L)&5(#Lr','wendygoulston@gmail.com; heligman@gmail.com',1),(22,'Ben and Ruthie','XL7GtcDYkp','bheligman@gmail.com; rutharkush@gmail.com',1),(23,'Di and Joel','d*swwzUF3h','jayzed@pipeline.com; ',1),(24,'James and Tali','fLvqlwbPwR','james@akazelig.com; tali@robicovsky.net',1),(25,'Molly and Jeff','ip(krRW9yg','mollyrobinson@gmail.com; jmgphd@gmail.com',1),(26,'Amelia',')VwePQnkWT','ameliarobinson@gmail.com',1),(27,'Sam','XOM?P#igD)','samuelmgrobinson@gmail.com',1),(28,'Linda and Barb','fnI$&K7DHx','??; ',1),(29,'Robyn and Scott','5kgyA8Pjvm','    snr711@aol.com; ',1),(30,'Susan and Pete','*uNPZ#2V3D','???; ',1),(31,'Rachel and Ross','pMDQ127G5z','rachelshenker@gmail.com; ',1),(32,'Mitch and Janice','2H$vogZfWU','??; ',1),(33,'Allison','One43wPI8y','allie6390@yahoo.com',1),(34,'Marilyn and Marilyn\'s husband','CPYu)kjw6U','??; ',1),(35,'sue and mike','xz11hE*3dv','sebraham@bigpond.com; ',1),(36,'judy  and geoff','jh5cEXYv8s','jbraham@orange.fr; ',1),(37,'Tamara and Steve','61AIDhJz)g','??; ',1),(38,'','4abQxFOLtd','',0),(39,'James and Denise','kb$PR?u#bd','jdmetzger@gmail.com; denisemmetzger@gmail.com',2),(40,'Julie  and Malcolm','arK7ks6NeR','justyne.desade@gmail.com; ',2),(41,'ian and ian\' wife','L(&bCn4xI(','??; ',2),(42,'sean and christine','H9lLBYPxXw','seanbarrett@bigpond.com; ',2),(43,'kate and justin','RRdpOOFW?W','katie.bartlett@bigpond.com; ',2),(44,'Michal and Avi','#MjQwS0()H','mtparness@gmail.com; ',3),(45,'Adina and David','AMKS7VcL1t','adinaz@gmail.com; ',3),(46,'Maria and Eric','mPk)fGp2FJ','mia296@aol.com; ',3),(47,'Francesca and David','u&n8CZbS4m','cheska7772@aol.com; ',3),(48,'Aliza and Kenny','fBJS5s9ZLC','alizadiana@gmail.com; ',3),(49,'Dina and Dave','Qmxa?4kNzn','dina.m.gordon@gmail.com; ',3),(50,'Jess and Chris','wyjo(f8U$t','jessica.brand@gmail.com; ',3),(51,'Maggie and Trevor','rF6L$JoWwf','mluce@auburnschl.edu; ',3),(52,'Kerry and Kerry\'s bf','QpS1DCi4oo','kerry_salvo@yahoo.com; ',3),(53,'Sharon and Ben','yBVKpB1fxa','sharonweiss@gmail.com; ',3),(54,'Jen ','tb&OvOaJ2e','dean.jen220@gmail.com',3),(55,'Rob and Lisa','2Ekpt$HMnh','hartmanrobert2@gmail.com; ',3),(56,'Brooke  and Andre','v)57t0qQ$G','brookeannrobinson@gmail.com; ',3),(57,'Kai and Ben','F5GM2q?WMd','ktakatsuka@gmail.com; ',3),(58,'Robin and Brad','iDfsUy1vvU','robin.roehrborn@gmail.com; ',3),(59,'Sara and Jeremiah','O9A0zAKRYj','brobstsara@gmail.com; ',3),(60,'Bobbie and Lauren','yATabSwV2K','BLeighton@opportunityalliance.org; rosenblum.lauren@gmail.com',3),(61,'Jon','hMVZiDP54x','',3),(62,'Katie  and partner','BrUvSj0WfQ','kathleenygaffney@gmail.com; ',3),(63,'Jodut and Ben','jLAw?MGu3m','jodut.hashmi@gmail.com; ',3),(64,'Meaghan  and partner','#pl2IB9ZYV','mpatinella@gmail.com; ',3),(65,'darcy and dani','(tK()1Tfau','darcy.york@gmail.com; ',3),(66,'Gill and Nev','WqswFGlix7','gillheydon@hotmail.com; neville.heydon@bigpond.com',4),(67,'Alex and Katrina','Zycz#Sb1MJ','alexheydon@hotmail.com; katrinaheydon@hotmail.com',4),(68,'Nan','9D?Xxv4oZz','',4),(69,'Brian and Jan','re0?58wJdv','bookerbc@bigpond.com; ',4),(70,'Sonia and Craig','X6&guM0dum','twentycats@live.com; ',4),(71,'Dave and partner','&t51etXqPw','davidbbooker@gmail.com; ',4),(72,'Brooklyn and Carolyn','vT6pFEAk3P','suburbanreptile@live.com; ',4),(73,'Maria and Partner','wsEr1WC&fP','marialouise66@bigpond.com; ',4),(74,'Sarah and partner','YibyI3vEjS','; ',4),(75,'Kylie  and Kylie\'s husband','929(W#PP(I','; ',4),(76,'Colin Clayton and Colin\'s wife','1X?Rg#F3pO',' cdclayton@hotmail.com; ',4),(77,'Aunty Shirl and Uncle Ivan','(W5u9mlmt$','; ',4),(78,'Vanessa and scott','MVcWgorZ$x','; ',4),(79,'Cliff  and Aylene',')vO0wLCt?b','; ',4),(80,'Stevo & Nomes and Nomes','p*Z3YkOl71','mrstephenafoster@gmail.com; ',5),(81,'Stef and zaida','G4$H8uY7sq','stefan.giameos@bigpond.com,stefffff@hotmail.com; ',5),(82,'Palmer and Jenna','Lt#fyV2ka)','David.Palmer@bdo.com.au; ',5),(83,'Squiz and Katrin','YIrtWC95TJ','tom.squier@smithsdetection.com; ',5),(84,'Wilcox and Anna','(#lxt2?6At','tomwilcox@tasmarine.com.au; ',5),(85,'hicka and robyn','j466jkmyyr','A.Hickton@waterway.com.au; ',5),(86,'stu and em','&sm9enS&oZ','stuartplasma@gmail.com; ',5),(87,'kizza and anna','E?fGOMBlyY','Kieran.OBrien@utas.edu.au; ',5),(88,'clarkey and partner','?43DEhied8','; ',5),(89,'tom and claire','(DdUVXAkKk','thomasjmorgan@hotmail.com; cdeehan10@hotmail.com',5),(90,'martijn and anita','mXFJSx1RWw','m.vaneijkelenborg@gmail.com; anita.gluyas@gmail.com',5),(91,'brooksy and brookys\'s partner','DPCzePsi6E','; ',5),(92,'chucky d and partner','WEivq(A6V(','charles_donnelly@hotmail.com; ',5),(93,'lehovicz and agata','PdK6eQmaKQ','christopher.lachowicz@gmail.com; ',5),(94,'jez and laura','lYvu5C30y2','jeremy.mcwilliams@vicbar.com.au; ',5),(95,'dave schreuder and kelly','tOm*JdoFoV','david.schreuder@dtf.vic.gov.au; ',5),(96,'pav and maria','jlpams4K2C','pavlidy@gmail.com; ',5),(97,'charlie cameron and virginia','U)EJNHgxuf','charlie1140@hotmail.com; ',5),(98,'tom saunders and paartner','JY)KgGsMS$','thomassaunders@hotmail.com; ',5),(99,'Pat D','?wR*HA)j0t','Patrick.Dixon@justice.tas.gov.au',5);
/*!40000 ALTER TABLE `family` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade`
--

DROP TABLE IF EXISTS `grade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grade` (
  `GradeID` int(11) NOT NULL AUTO_INCREMENT,
  `GradeName` varchar(255) NOT NULL,
  PRIMARY KEY (`GradeID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade`
--

LOCK TABLES `grade` WRITE;
/*!40000 ALTER TABLE `grade` DISABLE KEYS */;
INSERT INTO `grade` VALUES (1,'Very Fine'),(2,'Fine'),(3,'Good'),(4,'Average'),(5,'Poor');
/*!40000 ALTER TABLE `grade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guest`
--

DROP TABLE IF EXISTS `guest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guest` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `rsvp` varchar(255) NOT NULL DEFAULT 'noresponse',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guest`
--

LOCK TABLES `guest` WRITE;
/*!40000 ALTER TABLE `guest` DISABLE KEYS */;
INSERT INTO `guest` VALUES (1,1,'firstname','lastname','noresponse'),(2,2,'Doug','','noresponse'),(3,2,'Jo','','noresponse'),(4,3,'Tamara','Heligman','noresponse'),(5,3,'George','','noresponse'),(6,4,'Rob','','noresponse'),(7,4,'Ellie','','noresponse'),(8,5,'Jeremy','','noresponse'),(9,5,'Ilana','','noresponse'),(10,6,'Colin ','','noresponse'),(11,6,'Michelle','','noresponse'),(12,7,'Gill','','noresponse'),(13,7,'Andy','','noresponse'),(14,8,'Anna','','noresponse'),(15,8,'Matt','','noresponse'),(16,9,'Kerry','','noresponse'),(17,10,'Bar','','noresponse'),(18,10,'Tim','','noresponse'),(19,11,'Jess','','noresponse'),(20,12,'Anna','','noresponse'),(21,12,'Russ','','noresponse'),(22,13,'Sadhana','','noresponse'),(23,13,'Asanga','','noresponse'),(24,14,'Sue','','noresponse'),(25,14,'Hal','','noresponse'),(26,14,'May','','noresponse'),(27,15,'Joe','','noresponse'),(28,15,'Joe\'s girlfriend','','noresponse'),(29,16,'Ben','','noresponse'),(30,16,'Jo','','noresponse'),(31,17,'Lucie','','noresponse'),(32,18,'Louise','','noresponse'),(33,18,'Simon','','noresponse'),(34,19,'Oliver','','noresponse'),(35,19,'Oliver\'s gf','','noresponse'),(36,20,'Gigi','','noresponse'),(37,20,'Shane','','noresponse'),(38,21,'Wendy','','noresponse'),(39,21,'Larry','','noresponse'),(40,22,'Ben','','noresponse'),(41,22,'Ruthie','','noresponse'),(42,23,'Di','','noresponse'),(43,23,'Joel','','noresponse'),(44,24,'James','','noresponse'),(45,24,'Tali','','noresponse'),(46,25,'Molly','','noresponse'),(47,25,'Jeff','','noresponse'),(48,26,'Amelia','','notattending'),(49,27,'Sam','','noresponse'),(50,28,'Linda','','noresponse'),(51,28,'Barb','','noresponse'),(52,29,'Robyn','','noresponse'),(53,29,'Scott','','noresponse'),(54,30,'Susan','','noresponse'),(55,30,'Pete','','noresponse'),(56,31,'Rachel','','noresponse'),(57,31,'Ross','','noresponse'),(58,32,'Mitch','','noresponse'),(59,32,'Janice','','noresponse'),(60,33,'Allison','','noresponse'),(61,34,'Marilyn','','noresponse'),(62,34,'Marilyn\'s husband','','noresponse'),(63,35,'sue','','noresponse'),(64,35,'mike','','noresponse'),(65,36,'judy ','','noresponse'),(66,36,'geoff','','noresponse'),(67,37,'Tamara','','noresponse'),(68,37,'Steve','','noresponse'),(69,38,'','','noresponse'),(70,39,'James','','noresponse'),(71,39,'Denise','','noresponse'),(72,40,'Julie ','','noresponse'),(73,40,'Malcolm','','noresponse'),(74,41,'ian','','noresponse'),(75,41,'ian\' wife','','noresponse'),(76,42,'sean','','noresponse'),(77,42,'christine','','noresponse'),(78,43,'kate','','noresponse'),(79,43,'justin','','noresponse'),(80,44,'Michal','','noresponse'),(81,44,'Avi','','noresponse'),(82,45,'Adina','','noresponse'),(83,45,'David','','noresponse'),(84,46,'Maria','','noresponse'),(85,46,'Eric','','noresponse'),(86,47,'Francesca','','noresponse'),(87,47,'David','','noresponse'),(88,48,'Aliza','','noresponse'),(89,48,'Kenny','','noresponse'),(90,49,'Dina','','noresponse'),(91,49,'Dave','','noresponse'),(92,50,'Jess','','noresponse'),(93,50,'Chris','','noresponse'),(94,51,'Maggie','','noresponse'),(95,51,'Trevor','','noresponse'),(96,52,'Kerry','','noresponse'),(97,52,'Kerry\'s bf','','noresponse'),(98,53,'Sharon','','noresponse'),(99,53,'Ben','','noresponse'),(100,54,'Jen ','','noresponse'),(101,55,'Rob','','noresponse'),(102,55,'Lisa','','noresponse'),(103,56,'Brooke ','','noresponse'),(104,56,'Andre','','noresponse'),(105,57,'Kai','','noresponse'),(106,57,'Ben','','noresponse'),(107,58,'Robin','','noresponse'),(108,58,'Brad','','noresponse'),(109,59,'Sara','','noresponse'),(110,59,'Jeremiah','','noresponse'),(111,60,'Bobbie','','noresponse'),(112,60,'Lauren','','noresponse'),(113,61,'Jon','','noresponse'),(114,62,'Katie ','','noresponse'),(115,62,'partner','','noresponse'),(116,63,'Jodut','','noresponse'),(117,63,'Ben','','noresponse'),(118,64,'Meaghan ','','noresponse'),(119,64,'partner','','noresponse'),(120,65,'darcy','','noresponse'),(121,65,'dani','','noresponse'),(122,66,'Gill','','noresponse'),(123,66,'Nev','','noresponse'),(124,67,'Alex','','noresponse'),(125,67,'Katrina','','noresponse'),(126,68,'Nan','','noresponse'),(127,69,'Brian','','noresponse'),(128,69,'Jan','','noresponse'),(129,70,'Sonia','','noresponse'),(130,70,'Craig','','noresponse'),(131,71,'Dave','','noresponse'),(132,71,'partner','','noresponse'),(133,72,'Brooklyn','','noresponse'),(134,72,'Carolyn','','noresponse'),(135,73,'Maria','','noresponse'),(136,73,'Partner','','noresponse'),(137,74,'Sarah','','noresponse'),(138,74,'partner','','noresponse'),(139,75,'Kylie ','','noresponse'),(140,75,'Kylie\'s husband','','noresponse'),(141,76,'Colin Clayton','','noresponse'),(142,76,'Colin\'s wife','','noresponse'),(143,77,'Aunty Shirl','','noresponse'),(144,77,'Uncle Ivan','','noresponse'),(145,78,'Vanessa','','noresponse'),(146,78,'scott','','noresponse'),(147,79,'Cliff ','','noresponse'),(148,79,'Aylene','','noresponse'),(149,80,'Stevo & Nomes','','noresponse'),(150,80,'Nomes','','noresponse'),(151,81,'Stef','','noresponse'),(152,81,'zaida','','noresponse'),(153,82,'Palmer','','noresponse'),(154,82,'Jenna','','noresponse'),(155,83,'Squiz','','noresponse'),(156,83,'Katrin','','noresponse'),(157,84,'Wilcox','','noresponse'),(158,84,'Anna','','noresponse'),(159,85,'hicka','','noresponse'),(160,85,'robyn','','noresponse'),(161,86,'stu','','noresponse'),(162,86,'em','','noresponse'),(163,87,'kizza','','noresponse'),(164,87,'anna','','noresponse'),(165,88,'clarkey','','noresponse'),(166,88,'partner','','noresponse'),(167,89,'tom','','noresponse'),(168,89,'claire','','noresponse'),(169,90,'martijn','','noresponse'),(170,90,'anita','','noresponse'),(171,91,'brooksy','','noresponse'),(172,91,'brookys\'s partner','','noresponse'),(173,92,'chucky d','','noresponse'),(174,92,'partner','','noresponse'),(175,93,'lehovicz','','noresponse'),(176,93,'agata','','noresponse'),(177,94,'jez','','noresponse'),(178,94,'laura','','noresponse'),(179,95,'dave schreuder','','noresponse'),(180,95,'kelly','','noresponse'),(181,96,'pav','','noresponse'),(182,96,'maria','','noresponse'),(183,97,'charlie cameron','','noresponse'),(184,97,'virginia','','noresponse'),(185,98,'tom saunders','','noresponse'),(186,98,'paartner','','noresponse'),(187,99,'Pat D','','noresponse');
/*!40000 ALTER TABLE `guest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `RecordID` int(11) NOT NULL AUTO_INCREMENT,
  `RecordDate` date NOT NULL,
  `SellerName` varchar(255) NOT NULL,
  `SellerEmail` varchar(255) NOT NULL,
  `SellerTel` varchar(50) DEFAULT NULL,
  `SellerAddress` text,
  `Title` varchar(255) NOT NULL,
  `Year` int(4) NOT NULL,
  `CountryID` int(4) NOT NULL,
  `Denomination` float NOT NULL,
  `TypeID` int(4) NOT NULL,
  `GradeID` int(4) NOT NULL,
  `SalePriceMin` float NOT NULL,
  `SalePriceMax` float NOT NULL,
  `Description` text NOT NULL,
  `DisplayStatus` tinyint(1) NOT NULL,
  `DisplayUntil` date DEFAULT NULL,
  PRIMARY KEY (`RecordID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'2009-12-06','John Doe','john@example.com','+123456789102','12 Green House, Red Road, Blue City','Himalayas - Silver Jubilee',1958,3,5,1,2,10,15,'Silver jubilee issue. Aerial view of snow-capped.  \r\nHimalayan mountains. Horizontal orange stripe across  \r\ntop margin. Excellent condition, no marks.',0,NULL),(2,'2009-10-05','Susan Doe','susan@example.com','+198765432198','1 Tiger Place, Animal City 648392','Britain - WWII Fighter',1966,2,1,1,4,1,2,'WWII Fighter Plane overlaid on blue sky. Cancelled',0,NULL);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `RecordID` int(11) NOT NULL AUTO_INCREMENT,
  `LogMessage` text NOT NULL,
  `LogLevel` varchar(30) NOT NULL,
  `LogTime` varchar(30) NOT NULL,
  `Stack` text,
  `Request` text,
  PRIMARY KEY (`RecordID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type` (
  `TypeID` int(11) NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(255) NOT NULL,
  PRIMARY KEY (`TypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (1,'Commemorative'),(2,'Decorative'),(3,'Definitive'),(4,'Special'),(5,'Other');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `RecordID` int(4) NOT NULL AUTO_INCREMENT,
  `Username` varchar(10) NOT NULL,
  `Password` text NOT NULL,
  PRIMARY KEY (`RecordID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'john','*DACDE7F5744D3CB439B40D938673B8240B824853');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-25 15:39:27
