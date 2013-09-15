-- MySQL dump 10.11
--
-- Host: db424454320.db.1and1.com    Database: db424454320
-- ------------------------------------------------------
-- Server version	5.0.91-log

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL auto_increment,
  `nom_categoria` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Altres productes / Aliaj produktoj'),(2,'Diccionaris / Vortaroj'),(4,'Lectures per a estudiants / Facilaj legolibroj'),(5,'Literatura (poesia) / Literaturo (poezio)'),(6,'Literatura (prosa) / Literaturo (prozo)'),(7,'Llibres de text / Lernolibroj'),(8,'Música - Muziko');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL auto_increment,
  `nom_client` varchar(80) default NULL,
  `adreca_client` varchar(80) default NULL,
  `ciutat_client` varchar(60) default NULL,
  `cp_client` varchar(12) default NULL,
  `pais_client` varchar(60) default NULL,
  `correu_client` varchar(60) default NULL,
  `banc_client` varchar(50) default NULL,
  `compra_client` text,
  `data_client` date default NULL,
  `finalitzat_client` int(1) default NULL,
  PRIMARY KEY  (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Joan Català','Passeig Pérez Bayer','Benicàssim','12550','País Valencià','joan@riseup.net','123123123123123Bar','Nom = Joan Català <br />Direccio = Passeig Pèrez Bayer<br />Ciutat = Benicàssim<br />CP = 12550<br />Pais = PaÃ­s ValenciÃ <br />Correu = joan@riseup.net<br />Banc = 123123123123123Bar<br />Producte1 =  2a disko<br />Quantitat1 = 1<br />ProducteTotal1 = 10.00<br />Producte2 =  1a disko<br />Quantitat2 = 1<br />ProducteTotal2 = 11.00<br />Producte3 = Amb l`esperanto a la motxilla<br />Quantitat3 = 1<br />ProducteTotal3 = 12.00<br />Producte4 = Amb l`esperanto a la motxilla<br />Quantitat4 = 1<br />ProducteTotal4 = 12.00<br />Total = 45.00<br />','2005-10-20',1),(2,'Joan Català','Passeig Pérez Bayer','Benicàssim','12550','País Valencià','joan@riseup.net','123123123123123Bar','Nom = Joan CatalÃ <br />Direccio = Passeig PÃ¨rez Bayer<br />Ciutat = BenicÃ ssim<br />CP = 12550<br />Pais = PaÃ­s ValenciÃ <br />Correu = joan@riseup.net<br />Banc = 123123123123123Bar<br />Producte1 =  2a disko<br />Quantitat1 = 1<br />ProducteTotal1 = 10.00<br />Producte2 =  1a disko<br />Quantitat2 = 1<br />ProducteTotal2 = 11.00<br />Producte3 = Amb l`esperanto a la motxilla<br />Quantitat3 = 1<br />ProducteTotal3 = 12.00<br />Producte4 = Amb l`esperanto a la motxilla<br />Quantitat4 = 1<br />ProducteTotal4 = 12.00<br />Total = 45.00<br />','2005-10-20',1),(3,'Jhonny vinilo',NULL,NULL,NULL,NULL,'joan@riseup.net',NULL,'Nom = Jhonny vinilo<br />Correu = joan@riseup.net<br />Producte1 =  2a disko<br />Quantitat1 = 1<br />ProducteTotal1 = 10.00<br />Producte2 =  1a disko<br />Quantitat2 = 1<br />ProducteTotal2 = 11.00<br />Producte3 = Amb l`esperanto a la motxilla<br />Quantitat3 = 1<br />ProducteTotal3 = 12.00<br />Producte4 = Amb l`esperanto a la motxilla<br />Quantitat4 = 1<br />ProducteTotal4 = 12.00<br />Total = 45.00<br />','2005-10-20',1),(4,'Joan CatalÃ ','Passeig PÃ¨rez Bayer','BenicÃ ssim','12550','PaÃ­s ValenciÃ ','joan@riseup.net','123123123-CCSSX-1','Nom = Joan CatalÃ <br />Direccio = Passeig PÃ¨rez Bayer<br />Ciutat = BenicÃ ssim<br />CP = 12550<br />Pais = PaÃ­s ValenciÃ <br />Correu = joan@riseup.net<br />Banc = 123123123-CCSSX-1<br />Producte1 = El moviment esperantista a Mallorca<br />Quantitat1 = 3<br />ProducteTotal1 = 36.00<br />Total = 36.00<br />','2005-10-20',1),(5,'joan catal','Passeig P?rez Bayer','Benic?ssim','12550','Pa?s Valenci','joan@riseup.net','123123123-CCSSX-1','Nom = joan catal?<br />Direccio = Passeig P?rez Bayer<br />Ciutat = Benic?ssim<br />CP = 12550<br />Pais = Pa?s Valenci?<br />Correu = joan@riseup.net<br />Banc = 123123123-CCSSX-1<br />Producte1 = Amb l`esperanto a la motxilla<br />Quantitat1 = 1<br />ProducteTotal1 = 12.00<br />Producte2 = Amb l`esperanto a la motxilla<br />Quantitat2 = 1<br />ProducteTotal2 = 12.00<br />Producte3 =  2a disko<br />Quantitat3 = 1<br />ProducteTotal3 = 10.00<br />Producte4 =  1a disko<br />Quantitat4 = 4<br />ProducteTotal4 = 44.00<br />Producte5 =  2a disko<br />Quantitat5 = 1<br />ProducteTotal5 = 10.00<br />Producte6 =  1a disko<br />Quantitat6 = 1<br />ProducteTotal6 = 11.00<br />Total = 99.00<br />','2009-10-20',1),(6,'Joan Catal','Passeig P?rez Bayer','Benic?ssim','12550','Pa?s Valenci','joan@riseup.net','23','Nom = Joan Catal?<br />Direccio = Passeig P?rez Bayer<br />Ciutat = Benic?ssim<br />CP = 12550<br />Pais = Pa?s Valenci?<br />Correu = joan@riseup.net<br />Banc = 23<br />Producte1 = Amb l`esperanto a la motxilla<br />Quantitat1 = 1<br />ProducteTotal1 = 12.00<br />Producte2 = Amb l`esperanto a la motxilla<br />Quantitat2 = 1<br />ProducteTotal2 = 12.00<br />Producte3 =  2a disko<br />Quantitat3 = 1<br />ProducteTotal3 = 10.00<br />Producte4 =  1a disko<br />Quantitat4 = 4<br />ProducteTotal4 = 44.00<br />Producte5 =  2a disko<br />Quantitat5 = 1<br />ProducteTotal5 = 10.00<br />Producte6 =  1a disko<br />Quantitat6 = 1<br />ProducteTotal6 = 11.00<br />Total = 99.00<br />','2009-10-20',1),(7,'Joan Catal','Passeig P?rez Bayer','Benic?ssim','12550','Pa?s Valenci','joan@riseup.net','asdf','Nom = Joan Catal?<br />Direccio = Passeig P?rez Bayer<br />Ciutat = Benic?ssim<br />CP = 12550<br />Pais = Pa?s Valenci?<br />Correu = joan@riseup.net<br />Banc = asdf<br />Producte1 = Amb l`esperanto a la motxilla<br />Quantitat1 = 1<br />ProducteTotal1 = 12.00<br />Producte2 = Amb l`esperanto a la motxilla<br />Quantitat2 = 1<br />ProducteTotal2 = 12.00<br />Producte3 =  2a disko<br />Quantitat3 = 1<br />ProducteTotal3 = 10.00<br />Producte4 =  1a disko<br />Quantitat4 = 4<br />ProducteTotal4 = 44.00<br />Producte5 =  2a disko<br />Quantitat5 = 1<br />ProducteTotal5 = 10.00<br />Producte6 =  1a disko<br />Quantitat6 = 1<br />ProducteTotal6 = 11.00<br />Total = 99.00<br />','2009-10-20',1),(8,'Joan CatalÃ ','Passeig PÃ¨rez Bayer','BenicÃ ssim','12560','PaÃ­s ValenciÃ ','joan@riseup.net','asdf','Nom = Joan CatalÃ <br />Direccio = Passeig PÃ¨rez Bayer<br />Ciutat = BenicÃ ssim<br />CP = 12560<br />Pais = PaÃ­s ValenciÃ <br />Correu = joan@riseup.net<br />Banc = asdf<br />Producte1 = Amb l`esperanto a la motxilla<br />Quantitat1 = 1<br />ProducteTotal1 = 12.00<br />Producte2 = Amb l`esperanto a la motxilla<br />Quantitat2 = 1<br />ProducteTotal2 = 12.00<br />Producte3 =  2a disko<br />Quantitat3 = 1<br />ProducteTotal3 = 10.00<br />Producte4 =  1a disko<br />Quantitat4 = 4<br />ProducteTotal4 = 44.00<br />Producte5 =  2a disko<br />Quantitat5 = 1<br />ProducteTotal5 = 10.00<br />Producte6 =  1a disko<br />Quantitat6 = 1<br />ProducteTotal6 = 11.00<br />Total = 99.00<br />','2009-10-20',1),(9,'joan','joan','joan','123','joan','joan@riseup.net','asdfasdfasd','Nom = joan<br />Direccio = joan<br />Ciutat = joan<br />CP = 123<br />Pais = joan<br />Correu = joan@riseup.net<br />Banc = asdfasdfasd<br />Producte1 = <br />Quantitat1 = 8<br />ProducteTotal1 = 0.00<br />Producte2 =  2a disko<br />Quantitat2 = 8<br />ProducteTotal2 = 80.00<br />Total = 80.00<br />','0000-00-00',1);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentaris`
--

DROP TABLE IF EXISTS `comentaris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentaris` (
  `id` int(11) NOT NULL auto_increment,
  `titol` varchar(60) default NULL,
  `comentari` text,
  `id_dades` int(11) default NULL,
  `data` varchar(10) default NULL,
  `nom_usuari` varchar(25) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentaris`
--

LOCK TABLES `comentaris` WRITE;
/*!40000 ALTER TABLE `comentaris` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentaris` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuracions`
--

DROP TABLE IF EXISTS `configuracions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configuracions` (
  `id` int(11) NOT NULL auto_increment,
  `camps` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuracions`
--

LOCK TABLES `configuracions` WRITE;
/*!40000 ALTER TABLE `configuracions` DISABLE KEYS */;
INSERT INTO `configuracions` VALUES (1,'<table border=\"0\" width=\"100%\">\r\n<tr><td valign=\"top\">\r\n<p><font color=\"black\"><font size=\"4\"><strong>Benvinguts, Welcome, Bonvenon, Zapraszamy!!</strong></font><br />El progrmari e-vendejo està desenvolupat amb PHP, XHTML, CSS i una base de dades MySQL, tot tecnologia lliure i de codi obert. Està fet, principalment, per a colectius i associacions que vullguen una xicoteta botiga on-line bilingüe o trilingüe (encara que la pots ampliar). És molt fàcil el seu funcionament i si saps programar pots millorar-la fàcilment.</font></p></td>\r\n<td valign=\"top\">\r\n<img src=\"http://e-vendejo.kreanto.com/demo/imatges/novetat1.png\" alt=\"\" align=\"right\">\r\n</td></tr></table>');
/*!40000 ALTER TABLE `configuracions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dades`
--

DROP TABLE IF EXISTS `dades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dades` (
  `iddades` int(11) NOT NULL auto_increment,
  `nom` varchar(80) default NULL,
  `descripcio` text,
  `preu` int(5) default NULL,
  `id_categoria` int(2) default NULL,
  `imatge` varchar(50) default NULL,
  `autor` varchar(80) default NULL,
  PRIMARY KEY  (`iddades`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dades`
--

LOCK TABLES `dades` WRITE;
/*!40000 ALTER TABLE `dades` DISABLE KEYS */;
INSERT INTO `dades` VALUES (1,'El moviment esperantista a Mallorca','Obra escrita per l\'historiador Xavier Margais fent un profund recorregut en una hist?ria nostra molt recent on relata la situaci? de l\'associacionisme a Mallorca.',12,3,'moviment_esperantista_mallorca.jpg','Xavier Margais'),(5,'Kaj Tiel Plu, 1a disko','Unua Kompakt-diskon el la kataluna bando Kaj Tiel Plu, ni gxin energie rekomendas al vi.',11,8,'ktp_disc1.jpg',''),(10,'Kaj Tiel Plu, 2a disko','Kaj jen nun la dua laboro de Kaj Tiel Plu kun la cxiama sono sed splorante aliaj specoj da popolaj kantoj.',10,8,'ktp_disc2.jpg',''),(17,'Coliflores y esperanto','La lengua internacional Esperanto es una gran desconocida para la mayoría de personas, sin embargo es digna de reconocimiento y debería ser tratada y estudiada al menos un año en todos los colegios.',10,0,'portada_i_pestanya.jpg','Joan Catala');
/*!40000 ALTER TABLE `dades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuaris`
--

DROP TABLE IF EXISTS `usuaris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuaris` (
  `id` int(11) NOT NULL auto_increment,
  `usr_login` varchar(20) default NULL,
  `usr_pass` varchar(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuaris`
--

LOCK TABLES `usuaris` WRITE;
/*!40000 ALTER TABLE `usuaris` DISABLE KEYS */;
INSERT INTO `usuaris` VALUES (1,'joan','123');
/*!40000 ALTER TABLE `usuaris` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-07-23 22:17:52
