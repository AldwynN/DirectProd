-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: localhost    Database: direct_prod
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `advertisements`
--

DROP TABLE IF EXISTS `advertisements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `advertisements` (
  `idAdvertisement` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `organic` tinyint(1) NOT NULL,
  `valid` tinyint(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idAdvertisement`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `advertisements_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertisements`
--

LOCK TABLES `advertisements` WRITE;
/*!40000 ALTER TABLE `advertisements` DISABLE KEYS */;
INSERT INTO `advertisements` VALUES (1,'Je vend mon canard','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce feugiat eu lorem a viverra. Vivamus ornare scelerisque feugiat. Vestibulum a maximus lacus. Sed ac mattis augue, sed pretium tortor. Morbi hendrerit odio non dignissim vulputate. In hac habitasse platea dictumst. Pellentesque posuere eros quis ipsum vestibulum maximus.',1,1,'2019-04-15 13:36:35',1),(3,'Test pour affichage','Danser dans le vide',0,1,'2019-04-15 13:52:17',1),(4,'Deuxième test','Avec des hirondelles',1,1,'2019-04-15 13:58:02',1),(5,'Test pour admin','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu viverra dolor, volutpat rhoncus nunc. Cras at turpis purus. Morbi sit amet nisi erat. Aliquam placerat dapibus mi id tempus. Sed a ante elit. Proin augue dui, lacinia quis libero sed, euismod fringilla eros. Sed id pulvinar quam. Fusce tempor ultricies risus quis vehicula. Proin vestibulum at ligula sed viverra. Pellentesque laoreet, mauris non fringilla consequat, lectus magna fringilla dui, eget maximus sem nulla in lectus. Maecenas maximus dolor sed dolor semper, quis fermentum lorem imperdiet. Pellentesque commodo felis et ex pharetra, vel ullamcorper purus commodo. Proin lacinia, felis non rutrum ultricies, nulla enim eleifend ligula, vitae lobortis tortor ex in lacus. Nunc sit amet gravida mi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent elit lectus, commodo eu consectetur quis, fringilla eget dolor.',1,0,'2019-04-15 12:20:17',5);
/*!40000 ALTER TABLE `advertisements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `pictures` (
  `idPicture` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `idAdvertisement` int(11) NOT NULL,
  PRIMARY KEY (`idPicture`),
  KEY `idAdvertisement` (`idAdvertisement`),
  CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`idAdvertisement`) REFERENCES `advertisements` (`idAdvertisement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pictures`
--

LOCK TABLES `pictures` WRITE;
/*!40000 ALTER TABLE `pictures` DISABLE KEYS */;
/*!40000 ALTER TABLE `pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rate`
--

DROP TABLE IF EXISTS `rate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `rate` (
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL,
  `idUser` int(11) NOT NULL,
  `idAdvertisement` int(11) NOT NULL,
  KEY `idUser` (`idUser`,`idAdvertisement`),
  KEY `idAdvertisement` (`idAdvertisement`),
  CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`),
  CONSTRAINT `rate_ibfk_2` FOREIGN KEY (`idAdvertisement`) REFERENCES `advertisements` (`idAdvertisement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rate`
--

LOCK TABLES `rate` WRITE;
/*!40000 ALTER TABLE `rate` DISABLE KEYS */;
INSERT INTO `rate` VALUES (4,'Magnifique produit','0000-00-00 00:00:00',5,4),(5,'J&#39;adore','0000-00-00 00:00:00',1,4),(5,'test 4','2019-04-16 12:09:00',1,4);
/*!40000 ALTER TABLE `rate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `canton` varchar(50) NOT NULL,
  `postCode` varchar(20) NOT NULL,
  `streetAndNumber` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `salt` varchar(50) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'21995fd0a97ac7a99a687beb9367e80f74e34700','romain.prtt@eduge.ch','Rorobocop','Confignon','Genève','1232','14, Rue Joseph-Berthet',1,'J\'aime faire du scratch parce que grâce à ce programme je me prends pour un vrai informaticien.','11793474565ca36585edea68.65121056'),(5,'9d607b9248f5b501e3dd60d5efbe2a3ef9a71ddf','JDM@gmail.com','Ludovic','Genève','Genève','1215','21 Rue des moines',0,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor mattis dictum. Vestibulum nisl dolor, fermentum vel nisi eu, lacinia viverra nunc. Phasellus fermentum vitae erat in mollis. Fusce condimentum tortor at mauris dignissim blandit. Sed interdum feugiat vehicula. Donec eget sodales mauris. Nunc sit amet tortor vel diam scelerisque.','13329606815cb46ffd2933c1.01668688');
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

-- Dump completed on 2019-04-16 16:38:01
