-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: carrito
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB

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
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `nombre` varchar(90) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `direccion` varchar(90) DEFAULT NULL,
  `pago` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
INSERT INTO `carrito` VALUES (1,'mendozac800@gmail.com','2017-11-27 00:10:18','Daniel Mendoza ','941085678','Mz E2 Lt24 Jardines de Chillon ','Pago Pago Contra Entrega'),(2,'charliec600@gmail.com','2017-11-27 00:11:03','Charlie Cieza','9410678541','Av.Cordialidad 674','Pago Pago Contra Entrega'),(3,'alejandromen17@gmail.com','2017-11-27 00:11:44','Alejandro Mendoza','Mendoza','Av.Proceres 647','Pago Pago Contra Entrega');
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito_servicio`
--

DROP TABLE IF EXISTS `carrito_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrito_servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servicio_id` int(11) NOT NULL,
  `cantidad` float DEFAULT NULL,
  `carrito_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `carrito_id_idx` (`carrito_id`),
  KEY `_idx` (`servicio_id`,`carrito_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito_servicio`
--

LOCK TABLES `carrito_servicio` WRITE;
/*!40000 ALTER TABLE `carrito_servicio` DISABLE KEYS */;
INSERT INTO `carrito_servicio` VALUES (1,60,1,1),(2,61,1,1),(3,65,1,2),(4,66,1,2),(5,61,1,3);
/*!40000 ALTER TABLE `carrito_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `condicion` int(11) NOT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'ADMINISTRADOR','',1),(2,'USUARIO NIVEL 1','',1),(3,'USUARIO NIVEL 2','',1),(4,'USUARIO NIVEL 3','',1);
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio`
--

DROP TABLE IF EXISTS `servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `precio` varchar(40) DEFAULT NULL,
  `fecha_reg` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio`
--

LOCK TABLES `servicio` WRITE;
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
INSERT INTO `servicio` VALUES (60,'Help Desk Empresarial','El soporte técnico empresarial que ofrece GRUSOTEC está enfocado en generar valor dentro de cualquier empresa o entidad de gobierno, a través de la óptima e inmediata resolución de cualquier incidencia de hardware o software.','300','2017-11-13'),(61,'Diseño y Marketing Publicitario','En nuestra labor como diseñadores gráficos GRUSOTEC les ofrece encontrar la solución que mejor se ajuste a tus necesidades de comunicación visual. Ya sea para un folleto promocional, o para diseñar toda la imagen corporativa de tu empresa o entidad, trabajamos con absoluta dedicación y siempre buscando el diseño más profesional.','300','2017-11-13'),(62,'Desarrollo Web/Movil','Los sistemas web a medida automatizan los procesos operativos de su negocio, suministran una plataforma web de información en internet / intranet necesaria para la toma de decisiones y su implantación logrará ventajas competitivas.\r\nLos proyectos de sistemas web a medida se planifican y luego se ejecutan con el control y seguimiento respectivo para garantizar un correcto desarrollo; por ello contamos con especialistas para cada etapa del desarrollo de este tipo de proyectos.','350','2017-11-13'),(63,'Cableado Estructurado','El servicio de cableado estructurado de red consiste en la arquitectura de forma estándar del cableado de las comunicaciones de tu empresa, asegurando la interoperabilidad. Al soportar diversos dispositivos de telecomunicaciones, el cableado estructurado puede ser instalado o modificado sin necesidad de tener conocimiento previo sobre los productos que se utilizarán sobre él.','400','2017-11-13'),(64,'Camaras de Seguridad','Comenzamos realizando un  estudio de campo en sitio para establecer  las pautas de seguridad requeridas por el cliente y se elabora un proyecto  a medida.En este proceso se cubren las pautas establecidas en el proyecto, se instalan y configuran las cámaras que el cliente desea, al igual que el software dedicado. Se instala en la máquina del cliente el tutorial de uso avanzado, mismo que sirve como herramienta de consulta constante.','350','2017-11-13'),(65,'Infraestructura Tecnologica','La planificación estratégica de infraestructura de TI consiste en alinear la planificación de la tecnología en conjunto con las áreas y los objetivos del negocio, en un marco de Gobierno de TI.Ya sea que tu empresa requiera construir una nueva ubicación o desea actualizar su infraestructura existente, el equipo de GST analiza sus objetivos estratégicos para alinearlos a los requerimientos de TI.','400','2017-11-13'),(66,'Capacitaciones Informaticas','Ante la necesidad de las empresas para ser competitivas en el mercado en el cual se desenvuelven, es necesario que sus ejecutivos conozcan las herramientas ofimáticas básicas y el manejo de Internet que les permitirá mejorar sus comunicaciones y administrar la información a través de recursos visuales, ordenados y de fácil interpretación.','500','2017-11-13');
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `apaterno` varchar(60) NOT NULL,
  `amaterno` varchar(60) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `ocupacion` varchar(60) NOT NULL,
  `area` varchar(60) NOT NULL,
  `login` varchar(60) NOT NULL,
  `clave` varchar(64) NOT NULL,
  `rol` int(11) DEFAULT NULL,
  `condicion` tinyint(4) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `rol` (`rol`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Daniel','Mendoza','Santos','admin@gmail.com','Administrador de TI','Sistemas','admin','admin',1,1),(2,'Charlie','Palma','Cieza','cieza@gmail.com','Administrador','Sistemas','admin1','admin1',1,1),(5,'Jeffrey','Maslucan','Vega','jeffrey@gmail.com','Administrador','Sistemas','admin2','admin2',1,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `v_reporte`
--

DROP TABLE IF EXISTS `v_reporte`;
/*!50001 DROP VIEW IF EXISTS `v_reporte`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_reporte` AS SELECT 
 1 AS `carrito_id`,
 1 AS `nombre`,
 1 AS `cantidad`,
 1 AS `servicio`,
 1 AS `precio`,
 1 AS `total`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_reporte`
--

/*!50001 DROP VIEW IF EXISTS `v_reporte`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_reporte` AS select `cs`.`carrito_id` AS `carrito_id`,`c`.`nombre` AS `nombre`,`cs`.`cantidad` AS `cantidad`,`s`.`nombre` AS `servicio`,`s`.`precio` AS `precio`,(`s`.`precio` * `cs`.`cantidad`) AS `total` from ((`carrito_servicio` `cs` join `carrito` `c` on((`cs`.`carrito_id` = `c`.`id`))) join `servicio` `s` on((`cs`.`servicio_id` = `s`.`id`))) where (`cs`.`carrito_id` <> 0) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-27  0:14:44
