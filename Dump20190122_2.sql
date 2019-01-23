CREATE DATABASE  IF NOT EXISTS `cst_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cst_db`;
-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: cst_db
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `experiences`
--

DROP TABLE IF EXISTS `experiences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experiences` (
  `exp_id` int(11) NOT NULL,
  `experience` varchar(10000) DEFAULT NULL,
  `quote_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`exp_id`),
  KEY `experiences_ibfk_1` (`quote_id`),
  CONSTRAINT `experiences_ibfk_1` FOREIGN KEY (`quote_id`) REFERENCES `quotes` (`quote_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experiences`
--

LOCK TABLES `experiences` WRITE;
/*!40000 ALTER TABLE `experiences` DISABLE KEYS */;
INSERT INTO `experiences` VALUES (1,'Today, I learned that not all my students have access to clean water through their faucets. We were learning in Social Studies about different groups of aboriginal people and the struggles they faced in their civilizations. One of the main issues the kids talked about was access to water. Then, one of my students turned to me and said that it is like when they run out of bottled water at home and my mom has to boil all the stuff out of the water. Having clean water is something so basic to me. The fact that these kids live in the same city as I do, but the pipes in their building are so bad that they cannot drink the water shocked me.',1),(2,'I told my boss at the NGO about the pressure perpetrated at elite universities that all students in the College of Science should strive for medical school, and to not strive for medical school is to fail to maximize one’s full potential … To this, my boss gave me the best response. I will paraphrase: There is a HUGE problem with the bigger and better mindset so ingrained in young people these days… Yes, you may be a star student, you may be the top of your high school, college, or med school class, and you may ace the boards and attain the best residency and become the most prestigious type of doctor that exists. But, at one point or another you will be approached by a patient in need of a prescription, a treatment, or a surgery, and you will need to look at that person and ask yourself, “Is this a human who needs my help, or is this just another test that I need to pass?” This final question hit me like a ton of bricks.',2),(3,'Today I went to serve lunch at one of the Project sites. I left my wallet in the office where I normally leave it in my car when I don\'\'t need it and when I got to the site I found that I needed coins to pay for metered street parking. Luckily I had some coins in my car and while I was putting them in the meter I was approached by a homeless man. This man told me that he has made some mistakes in his life but is coming to terms with them and with God and is on his journey to making positive changes in his life. When he was done telling me his story he asked me if I would buy him a coffee/something to eat from Dunkin Donuts. I told him that I was very happy for him that he is going to make changes in his life but that I was sorry but I didn\'\'t have my wallet with me. I then said that I was going to serve lunch at the house once I was done finding enough coins to put in the meter and if he waited a few minutes he could come with me and have lunch with the residents. He said okay. After a few minutes of me scrambling for more dimes to put in the machine this man decided he no longer wanted to wait and he thanked me for the offer and said that he would be on his way. I told him that I was almost ready and he replied that he wasn\'t comfortable being around too many people because he was dirty and he smelled bad and he was ashamed.',3);
/*!40000 ALTER TABLE `experiences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotes`
--

DROP TABLE IF EXISTS `quotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotes` (
  `quote_id` int(11) NOT NULL,
  `quote` varchar(1000) DEFAULT NULL,
  `theme_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`quote_id`),
  KEY `fk_quotes_1` (`theme_id`),
  CONSTRAINT `fk_quotes_1` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`theme_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotes`
--

LOCK TABLES `quotes` WRITE;
/*!40000 ALTER TABLE `quotes` DISABLE KEYS */;
INSERT INTO `quotes` VALUES (1,'One particularly serious problem is the quality of water available to the poor. (Laudato Si, 29)',1),(2,'Individual initiative alone and the interplay of competition will not ensure satisfactory development. (Populorum Progressio, 33)',1),(3,'One of the deepest forms of poverty a person can experience is isolation (Caritas in Veritate, 53)',2);
/*!40000 ALTER TABLE `quotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `themes`
--

DROP TABLE IF EXISTS `themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `themes` (
  `theme_id` int(11) NOT NULL,
  `theme` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`theme_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `themes`
--

LOCK TABLES `themes` WRITE;
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;
INSERT INTO `themes` VALUES (1,'Life and Dignity of the Human Person'),(2,'Call to Family, Community, and Participation'),(3,'Rights and Responsibility'),(4,'Option for the Poor and Vulnerable'),(5,'The Dignity of Work and Rights of Workers'),(6,'Solidarity'),(7,'Care for God\'s Creation');
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','password');
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

-- Dump completed on 2019-01-22 20:58:29
