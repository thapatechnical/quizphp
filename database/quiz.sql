-- MySQL dump 10.13  Distrib 8.3.0, for macos14.2 (arm64)
--
-- Host: 127.0.0.1    Database: db_quiz
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
-- Table structure for table `mst_admin`
--

DROP TABLE IF EXISTS `mst_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mst_admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `loginid` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_admin`
--

LOCK TABLES `mst_admin` WRITE;
/*!40000 ALTER TABLE `mst_admin` DISABLE KEYS */;
INSERT INTO `mst_admin` VALUES (1,'admin','password');
/*!40000 ALTER TABLE `mst_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_question`
--

DROP TABLE IF EXISTS `mst_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mst_question` (
  `que_id` int NOT NULL AUTO_INCREMENT,
  `test_id` int DEFAULT NULL,
  `que_desc` varchar(150) DEFAULT NULL,
  `ans1` varchar(75) DEFAULT NULL,
  `ans2` varchar(75) DEFAULT NULL,
  `ans3` varchar(75) DEFAULT NULL,
  `ans4` varchar(75) DEFAULT NULL,
  `true_ans` int DEFAULT NULL,
  PRIMARY KEY (`que_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_question`
--

LOCK TABLES `mst_question` WRITE;
/*!40000 ALTER TABLE `mst_question` DISABLE KEYS */;
INSERT INTO `mst_question` VALUES (42,12,'Who is father of C Language? ','Bjarne Stroustrup','James A. Gosling','Dennis Ritchie','Dr. E.F. Codd',3),(43,12,'For 16-bit compiler allowable range for integer constants is ?','-3.4e38 to 3.4e38','-32767 to 32768','-32668 to 32667','-32768 to 32767',4),(44,12,'C programs are converted into machine language with the help of','An Editor','A compiler',' An operating system','None of these.',2),(45,12,'C was primarily developed as ','System programming language','General purpose language','Data processing language','None of the above.',1),(46,12,'A C variable cannot start with ','A number','A special symbol other than underscore','Both of the above','An alphabet',3),(49,14,'Sample question 1','test 1','test 2','test 3','test 4',2),(50,14,'sample question 2','sample ans 1','sample ans 2','sample ans 3','sample ans 4',4);
/*!40000 ALTER TABLE `mst_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_result`
--

DROP TABLE IF EXISTS `mst_result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mst_result` (
  `login` varchar(20) DEFAULT NULL,
  `test_id` int DEFAULT NULL,
  `test_date` date DEFAULT NULL,
  `score` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_result`
--

LOCK TABLES `mst_result` WRITE;
/*!40000 ALTER TABLE `mst_result` DISABLE KEYS */;
INSERT INTO `mst_result` VALUES ('abcd',14,'2024-03-28',1),('abcd',12,'2024-03-28',1);
/*!40000 ALTER TABLE `mst_result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_subject`
--

DROP TABLE IF EXISTS `mst_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mst_subject` (
  `sub_id` int NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_subject`
--

LOCK TABLES `mst_subject` WRITE;
/*!40000 ALTER TABLE `mst_subject` DISABLE KEYS */;
INSERT INTO `mst_subject` VALUES (8,'C language'),(9,'Java'),(14,'Python');
/*!40000 ALTER TABLE `mst_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_test`
--

DROP TABLE IF EXISTS `mst_test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mst_test` (
  `test_id` int NOT NULL AUTO_INCREMENT,
  `sub_id` int DEFAULT NULL,
  `test_name` varchar(30) DEFAULT NULL,
  `total_que` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_test`
--

LOCK TABLES `mst_test` WRITE;
/*!40000 ALTER TABLE `mst_test` DISABLE KEYS */;
INSERT INTO `mst_test` VALUES (12,8,'Basic C Test','5'),(14,14,'Basic Test','2');
/*!40000 ALTER TABLE `mst_test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_user`
--

DROP TABLE IF EXISTS `mst_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mst_user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(20) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_user`
--

LOCK TABLES `mst_user` WRITE;
/*!40000 ALTER TABLE `mst_user` DISABLE KEYS */;
INSERT INTO `mst_user` VALUES (20,'abcd','abcd','abcd','abcd','abcd',NULL,'abcd@gmail.com');
/*!40000 ALTER TABLE `mst_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mst_useranswer`
--

DROP TABLE IF EXISTS `mst_useranswer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mst_useranswer` (
  `sess_id` varchar(80) DEFAULT NULL,
  `test_id` int DEFAULT NULL,
  `que_des` varchar(200) DEFAULT NULL,
  `ans1` varchar(50) DEFAULT NULL,
  `ans2` varchar(50) DEFAULT NULL,
  `ans3` varchar(50) DEFAULT NULL,
  `ans4` varchar(50) DEFAULT NULL,
  `true_ans` int DEFAULT NULL,
  `your_ans` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mst_useranswer`
--

LOCK TABLES `mst_useranswer` WRITE;
/*!40000 ALTER TABLE `mst_useranswer` DISABLE KEYS */;
/*!40000 ALTER TABLE `mst_useranswer` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-29  0:33:52
