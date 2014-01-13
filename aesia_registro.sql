CREATE DATABASE  IF NOT EXISTS `aesia_registro` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `aesia_registro`;
-- MySQL dump 10.14  Distrib 5.5.33a-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: aesia_registro
-- ------------------------------------------------------
-- Server version	5.5.33a-MariaDB-1~wheezy-log

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL COMMENT 'Identificador del tipo o categoria',
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT 'Nombre de la categoria',
  `descripcion` varchar(75) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Breve descripcion de la categoria',
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='categoria o tipo de los participantes del congreso';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL COMMENT 'Identificador del evento',
  `id_congreso` varchar(7) CHARACTER SET latin1 NOT NULL COMMENT 'Identificador del congreso',
  `titulo` varchar(125) CHARACTER SET latin1 NOT NULL COMMENT 'Nombre del evento',
  `tipo` varchar(15) CHARACTER SET latin1 NOT NULL COMMENT 'Tipo de evento',
  `area` varchar(15) CHARACTER SET latin1 NOT NULL COMMENT 'Area o carrera de interes',
  `fecha` date NOT NULL COMMENT 'Dia del evento',
  `hora_inicio` time NOT NULL COMMENT 'Hora de incio del evento',
  `hora_fin` time NOT NULL COMMENT 'Hora de finalización',
  `lugar` varchar(75) CHARACTER SET latin1 NOT NULL COMMENT 'Lugar donde se llevara a cabo el evento',
  `observaciones` varchar(250) CHARACTER SET latin1 DEFAULT NULL COMMENT 'observaciones previas o posteriores a la realizacion del evento',
  PRIMARY KEY (`id_evento`),
  KEY `evento_congreso_FK` (`id_congreso`),
  CONSTRAINT `evento_congreso_FK` FOREIGN KEY (`id_congreso`) REFERENCES `congreso` (`id_congreso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `participante`
--

DROP TABLE IF EXISTS `participante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participante` (
  `id_participante` varchar(7) CHARACTER SET latin1 NOT NULL COMMENT 'Codigo o carnet',
  `nombres` varchar(35) CHARACTER SET latin1 NOT NULL COMMENT 'Nombres',
  `apellidos` varchar(35) CHARACTER SET latin1 NOT NULL COMMENT 'Apellidos',
  `email` varchar(100) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Correo electronico',
  `telefono` varchar(8) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Telefono de contacto',
  `institucion` varchar(100) CHARACTER SET latin1 NOT NULL COMMENT 'Nombre de universidad o institucion a la que pertenece',
  PRIMARY KEY (`id_participante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `participante_categoria`
--

DROP TABLE IF EXISTS `participante_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participante_categoria` (
  `id_participante` varchar(7) NOT NULL COMMENT 'identificador del participante',
  `id_categoria` int(11) NOT NULL COMMENT 'identificador de categoria',
  UNIQUE KEY `participante_categoria_PK` (`id_participante`,`id_categoria`),
  KEY `participante_categoria_categoria_FK` (`id_categoria`),
  CONSTRAINT `participante_categoria_participante_FK` FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id_participante`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `participante_categoria_categoria_FK` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='categoria o tipo de los participantes del congreso';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `login` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nombre` varchar(250) CHARACTER SET latin1 NOT NULL,
  `pass` varchar(75) CHARACTER SET latin1 DEFAULT NULL,
  `id_rol` int(5) DEFAULT NULL,
  `resetPass` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`login`),
  KEY `FK_usuario-rol` (`id_rol`),
  CONSTRAINT `FK_usuario-rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `participante_carrera`
--

DROP TABLE IF EXISTS `participante_carrera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participante_carrera` (
  `id_participante` varchar(7) NOT NULL COMMENT 'Identificador del participante (estudiante)',
  `id_carrera` varchar(6) NOT NULL COMMENT 'Identidicador de la carrera',
  UNIQUE KEY `participante_carrera_PK` (`id_participante`,`id_carrera`),
  KEY `participante_carrera_carrera_FK` (`id_carrera`),
  CONSTRAINT `participante_carrera_participante_FK` FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id_participante`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `participante_carrera_carrera_FK` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id_carrera`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Participantes por carreras';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patrocinador`
--

DROP TABLE IF EXISTS `patrocinador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patrocinador` (
  `id_patrocinador` varchar(12) CHARACTER SET latin1 NOT NULL COMMENT 'Identificador del patrocinador, de preferencia numero de NIT',
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT 'Nombre del patrocinador',
  `email` varchar(100) CHARACTER SET latin1 NOT NULL COMMENT 'Correo electronico de contacto',
  `telefono` int(11) NOT NULL,
  `contacto` varchar(60) CHARACTER SET latin1 NOT NULL COMMENT 'Representante o persona de contacto de la empresa patrocinadora',
  PRIMARY KEY (`id_patrocinador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Información de los patrocinadores del congreso';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asistencia` (
  `id_evento` int(11) NOT NULL COMMENT 'codigo del evento',
  `id_participante` varchar(7) CHARACTER SET latin1 NOT NULL COMMENT 'codigo del participante',
  PRIMARY KEY (`id_evento`,`id_participante`),
  UNIQUE KEY `unique_index` (`id_evento`,`id_participante`),
  KEY `asistencia_participante_FK` (`id_participante`),
  CONSTRAINT `asistencia_participante_FK` FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id_participante`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `asistencia_evento_FK` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla enlace para llevar control de asistencia a los eventos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `carrera`
--

DROP TABLE IF EXISTS `carrera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrera` (
  `id_carrera` varchar(6) CHARACTER SET latin1 NOT NULL COMMENT 'Identidicador de carrera',
  `nombre` varchar(65) CHARACTER SET latin1 NOT NULL COMMENT 'Nombre de la carrera',
  `descripcion` varchar(75) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Breve descripcion de la carrera',
  PRIMARY KEY (`id_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Carreras disponibles';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ponente_evento`
--

DROP TABLE IF EXISTS `ponente_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ponente_evento` (
  `id_evento` int(11) NOT NULL COMMENT 'Identificador del evento',
  `id_participante` varchar(7) NOT NULL COMMENT 'Identificador del participante',
  UNIQUE KEY `ponente_evento_PK` (`id_evento`,`id_participante`),
  KEY `ponente_evento_participante_FK` (`id_participante`),
  CONSTRAINT `ponente_evento_participante_FK` FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id_participante`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ponente_evento_evento_FK` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Ponentes de los eventos del congreso';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `id_rol` int(5) NOT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `descripcion` varchar(75) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `congreso`
--

DROP TABLE IF EXISTS `congreso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `congreso` (
  `id_congreso` varchar(7) CHARACTER SET latin1 NOT NULL COMMENT 'Identificador del congreso (003-2013)',
  `titulo` varchar(15) CHARACTER SET latin1 NOT NULL COMMENT 'Titulo del congreso',
  `slogan` varchar(100) CHARACTER SET latin1 NOT NULL COMMENT 'Slogan del congreso',
  `fecha` date NOT NULL COMMENT 'Fecha en que se realizo el congreso',
  PRIMARY KEY (`id_congreso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='informacion general del congreso';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patrocinador_congreso`
--

DROP TABLE IF EXISTS `patrocinador_congreso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patrocinador_congreso` (
  `id_pratrocinador` varchar(12) NOT NULL COMMENT 'identificador del patrocinador',
  `id_congreso` varchar(7) NOT NULL COMMENT 'identificador del congreso',
  `descripcion` varchar(50) NOT NULL COMMENT 'Descripcion del patrocinio',
  `monto` double NOT NULL COMMENT 'Aportacion monetaria al congreso',
  PRIMARY KEY (`id_pratrocinador`,`id_congreso`),
  KEY `patrocinador_congreso_congreso_FK` (`id_congreso`),
  CONSTRAINT `patrocinador_congreso_patrocinador_FK` FOREIGN KEY (`id_pratrocinador`) REFERENCES `patrocinador` (`id_patrocinador`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `patrocinador_congreso_congreso_FK` FOREIGN KEY (`id_congreso`) REFERENCES `congreso` (`id_congreso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Patrocinadores del congreso';
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-01-13  6:19:00
