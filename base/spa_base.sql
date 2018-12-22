-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: spa
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
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL AUTO_INCREMENT,
  `inicio` varchar(50) NOT NULL,
  `fin` varchar(50) NOT NULL,
  `id_cliente` int(11) unsigned zerofill NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `id_masajista` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_cita`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
INSERT INTO `citas` VALUES (1,'2018-11-24 13:07','2018-11-24 13:07',00000000001,1,1,4),(2,'2018-11-24 15:01','2018-11-24 15:01',00000000002,1,1,4),(3,'2018-11-24 18:59','2018-11-24 18:59',00000000001,1,1,4),(4,'2018-11-26 13:59','2018-11-26 13:59',00000000003,1,1,1),(5,'2018-11-25 21:36','2018-11-25 21:36',00000000002,1,1,1),(6,'2018-11-25 12:17','2018-11-25 12:17',00000000001,1,1,4);
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id_cliente` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `a_paterno` varchar(60) NOT NULL,
  `a_materno` varchar(80) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `fraccionamiento` varchar(200) NOT NULL,
  `ciudad` varchar(200) NOT NULL,
  `municipio` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `pais` varchar(200) NOT NULL,
  `tel_f` varchar(20) NOT NULL,
  `cel_1` varchar(20) NOT NULL,
  `cel_2` varchar(20) NOT NULL,
  `tel_o` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `instagram` varchar(200) NOT NULL,
  `foto` bigint(20) NOT NULL,
  `tipo_cliente` varchar(45) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (00000000001,'ANA','CERADILLA','ORTIZ','lago aul 101','trojes del cobano','aguascalientes','Aguascalientes','Aguascalientes','Mexico','2422985','4492014093','4492014093','4492014093','alejandro@alejandro.com','alejandro','alejandro',9223372036854775807,'regular',1),(00000000002,'VIRGINIA','GONZALEZ','ESTRADA','SINAI 122','CENTRO','AGS','AGS','AGS','MX','4493314534323','54543533','5532432442','234345325','vgon@gmail.com','facebook/virginia','instagram/virginia_gonzalez',12132,'intermedia',1),(00000000003,'ESTHELA','MENDOZA','GARCIA','LIMA 122','AMERICAS','AGS','AGS','AGS','MX','434523432','53456435345','5435634','5643654','ESTH@GMAIL.COM','FACEBOOK.COM/ESTHELA','INSTAGR/ESTHELA',5435435,'mas',1);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `habitaciones`
--

DROP TABLE IF EXISTS `habitaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `habitaciones` (
  `id_habitacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id_habitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `habitaciones`
--

LOCK TABLES `habitaciones` WRITE;
/*!40000 ALTER TABLE `habitaciones` DISABLE KEYS */;
INSERT INTO `habitaciones` VALUES (1,'sala a','depilaciones');
/*!40000 ALTER TABLE `habitaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persinal`
--

DROP TABLE IF EXISTS `persinal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persinal` (
  `id_masajista` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) NOT NULL,
  `a_paterno` varchar(50) NOT NULL,
  `a_materno` varchar(50) NOT NULL,
  `tel` varchar(17) NOT NULL,
  `cel` varchar(17) NOT NULL,
  `email` int(150) NOT NULL,
  `dirrecion` varchar(500) NOT NULL,
  PRIMARY KEY (`id_masajista`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persinal`
--

LOCK TABLES `persinal` WRITE;
/*!40000 ALTER TABLE `persinal` DISABLE KEYS */;
/*!40000 ALTER TABLE `persinal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) NOT NULL,
  `a_paterno` varchar(70) NOT NULL,
  `a_materno` varchar(70) NOT NULL,
  `tel` varchar(17) NOT NULL,
  `cel` varchar(17) NOT NULL,
  `email` varchar(250) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  PRIMARY KEY (`id_personal`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (1,'masajista','a_apellido','a_materno','4492014065','4492014065','masajista@masajista.com','lago azul # 170 trojes de alonso');
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `upc` varchar(100) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio` decimal(9,2) NOT NULL,
  `precio_publico` decimal(9,2) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'xxxxxxxxxx','Shampho','Shampho',100.00,150.50),(2,'501058617866','DEPILACIONES','CREMA HUMECTANTE SEBASTIAN 100G',100.00,122.00),(3,'432452523','CORPORAL','ACEITE VIGORIZANTE HENNEN 100G',170.00,210.00),(4,'754654645645','DEPILACIONES','MAQUILLAJE LIQUIDO SEBASTIAN 0711 100G',80.00,140.00),(5,'4354354543','SPA','ACEITE DEPILATORIO KARMIN 100G',120.00,180.00);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios`
--

DROP TABLE IF EXISTS `servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `id_zona` int(11) NOT NULL,
  `tratamiento` varchar(250) NOT NULL,
  `regular` decimal(7,2) NOT NULL,
  `preferente` decimal(7,2) NOT NULL,
  `intermedia` decimal(7,2) NOT NULL,
  `mas` decimal(7,2) NOT NULL,
  `tiempo` int(11) NOT NULL,
  `notas` varchar(300) NOT NULL,
  PRIMARY KEY (`id_servicio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` VALUES (1,1,'abdomen',990.00,880.00,780.00,680.00,15,''),(2,1,'axila',360.00,329.00,280.00,249.00,15,'');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios_cita`
--

DROP TABLE IF EXISTS `servicios_cita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicios_cita` (
  `id_servicio_cita` int(11) NOT NULL AUTO_INCREMENT,
  `id_cita` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  PRIMARY KEY (`id_servicio_cita`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios_cita`
--

LOCK TABLES `servicios_cita` WRITE;
/*!40000 ALTER TABLE `servicios_cita` DISABLE KEYS */;
INSERT INTO `servicios_cita` VALUES (1,1,1),(2,1,2),(3,2,1),(4,2,2),(5,3,1),(6,4,2),(7,5,1),(8,6,2);
/*!40000 ALTER TABLE `servicios_cita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nikname` varchar(50) NOT NULL,
  `password` varchar(350) NOT NULL,
  `rol` varchar(8) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'palc','8cb2237d0679ca88db6464eac60da96345513964','10','Pedro Lopez');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zonas`
--

DROP TABLE IF EXISTS `zonas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zonas` (
  `id_zona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id_zona`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zonas`
--

LOCK TABLES `zonas` WRITE;
/*!40000 ALTER TABLE `zonas` DISABLE KEYS */;
INSERT INTO `zonas` VALUES (1,'depilaciones','');
/*!40000 ALTER TABLE `zonas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-25 17:38:04
