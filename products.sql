CREATE SCHEMA `products` DEFAULT CHARACTER SET utf8 ;


DROP TABLE IF EXISTS `products`.`mas_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products`.`mas_customer` (
  `CustomerCode` varchar(20) NOT NULL,
  `FistName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `IDCrad` bigint(13) DEFAULT NULL,
  `Tel` varchar(20) DEFAULT NULL,
  `IsActive` int(1) DEFAULT '1',
  PRIMARY KEY (`CustomerCode`),
  UNIQUE KEY `CustomerCode_UNIQUE` (`CustomerCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mas_products`
--

DROP TABLE IF EXISTS `products`.`mas_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products`.`mas_products` (
  `ProductCode` varchar(20) NOT NULL,
  `ProductName` varchar(100) DEFAULT NULL,
  `ProductDescription` varchar(100) DEFAULT NULL,
  `IsActive` int(1) DEFAULT '1',
  PRIMARY KEY (`ProductCode`),
  UNIQUE KEY `ProductCode_UNIQUE` (`ProductCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ops_order`
--

DROP TABLE IF EXISTS `products`.`ops_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products`.`ops_order` (
  `OrderCode` varchar(20) NOT NULL,
  `CustomerCode` varchar(20) NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `IsActive` int(1) DEFAULT '1',
  PRIMARY KEY (`OrderCode`),
  UNIQUE KEY `OrderCode_UNIQUE` (`OrderCode`),
  KEY `order_customer_idx` (`CustomerCode`),
  CONSTRAINT `order_customer` FOREIGN KEY (`CustomerCode`) REFERENCES `mas_customer` (`CustomerCode`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ops_orderdetail`
--

DROP TABLE IF EXISTS `products`.`ops_orderdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products`.`ops_orderdetail` (
  `OrderDetailID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderCode` varchar(20) NOT NULL,
  `ProductCode` varchar(20) NOT NULL,
  `QTY` int(11) DEFAULT NULL,
  PRIMARY KEY (`OrderDetailID`),
  KEY `orderdetail_ordercode_idx` (`OrderCode`),
  KEY `orderdetail_productcode_idx` (`ProductCode`),
  CONSTRAINT `orderdetail_ordercode` FOREIGN KEY (`OrderCode`) REFERENCES `ops_order` (`OrderCode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `orderdetail_productcode` FOREIGN KEY (`ProductCode`) REFERENCES `mas_products` (`ProductCode`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `running_number`
--

DROP TABLE IF EXISTS `products`.`running_number`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products`.`running_number` (
  `id` varchar(16) NOT NULL,
  `created_range` int(6) DEFAULT NULL,
  `number` int(4) DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1= mas_customer\n2=mas_products\n3=ops_order',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_running` (`created_range`,`number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Dump completed on 2018-01-27 13:53:14
