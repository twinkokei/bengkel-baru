/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.21 : Database - bengkel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bengkel` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bengkel`;

/*Table structure for table `asuransi` */

DROP TABLE IF EXISTS `asuransi`;

CREATE TABLE `asuransi` (
  `asuransi_id` int(11) NOT NULL AUTO_INCREMENT,
  `asuransi_name` varchar(200) NOT NULL,
  `asuransi_address` text NOT NULL,
  `asuransi_phone` varchar(100) NOT NULL,
  `asuransi_city` varchar(100) NOT NULL,
  `asuransi_email` varchar(200) NOT NULL,
  `asuransi_desc` text NOT NULL,
  PRIMARY KEY (`asuransi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `asuransi` */

insert  into `asuransi`(`asuransi_id`,`asuransi_name`,`asuransi_address`,`asuransi_phone`,`asuransi_city`,`asuransi_email`,`asuransi_desc`) values (4,'ASURANSI','JL. Asuransi','08123456789','Surabaya','asuransi@gmail.com','Tentang Asuransi');

/*Table structure for table `banks` */

DROP TABLE IF EXISTS `banks`;

CREATE TABLE `banks` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(100) NOT NULL,
  `bank_account_number` varchar(100) NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `banks` */

insert  into `banks`(`bank_id`,`bank_name`,`bank_account_number`) values (1,'BCA','46624246');

/*Table structure for table `branches` */

DROP TABLE IF EXISTS `branches`;

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(200) NOT NULL,
  `branch_img` text NOT NULL,
  `branch_desc` text NOT NULL,
  `branch_address` text NOT NULL,
  `branch_phone` varchar(100) NOT NULL,
  `branch_city` varchar(100) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `branches` */

insert  into `branches`(`branch_id`,`branch_name`,`branch_img`,`branch_desc`,`branch_address`,`branch_phone`,`branch_city`) values (3,'CABANG 1','','','','0989906','SURABAYA'),(4,'CABANG 2','','','','',''),(5,'asas','1485753450_ionic.PNG','','','',''),(6,'1212','','qwqwqw','qwqw','qwqw','wqwq'),(7,'12345678','','12345678','12345678','123456789','123456789');

/*Table structure for table `bulan` */

DROP TABLE IF EXISTS `bulan`;

CREATE TABLE `bulan` (
  `bulan_id` int(11) NOT NULL AUTO_INCREMENT,
  `bulan_name` varchar(200) NOT NULL,
  PRIMARY KEY (`bulan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `bulan` */

insert  into `bulan`(`bulan_id`,`bulan_name`) values (1,'Januari'),(2,'Februari'),(3,'Maret'),(4,'April'),(5,'Mei'),(6,'Juni'),(7,'Juli'),(8,'Agustus'),(9,'September'),(10,'Oktober'),(11,'November'),(12,'Desember');

/*Table structure for table `color` */

DROP TABLE IF EXISTS `color`;

CREATE TABLE `color` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(200) NOT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;

/*Data for the table `color` */

insert  into `color`(`color_id`,`color_name`) values (1,'MERAH'),(2,'PUTIH'),(3,'BIRU'),(4,'KUNING'),(5,'HITAM'),(6,'ABU-ABU'),(137,'PINK'),(138,'UNGU');

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_no_ktp` varchar(100) NOT NULL,
  `customer_phone` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `customers` */

insert  into `customers`(`customer_id`,`customer_name`,`customer_no_ktp`,`customer_phone`,`customer_email`,`customer_address`) values (0,'asdas','123','123','asd@asd','asdasd');

/*Table structure for table `item_stocks` */

DROP TABLE IF EXISTS `item_stocks`;

CREATE TABLE `item_stocks` (
  `item_stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `kategori_item` int(11) NOT NULL,
  `item_stock_qty` float NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`item_stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `item_stocks` */

insert  into `item_stocks`(`item_stock_id`,`item_id`,`kategori_item`,`item_stock_qty`,`branch_id`) values (1,2,0,200,3);

/*Table structure for table `items` */

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(200) NOT NULL,
  `item_kategori` varchar(200) NOT NULL,
  `item_limit` int(11) NOT NULL,
  `item_hpp_price` bigint(20) NOT NULL,
  `item_price` bigint(20) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `items` */

insert  into `items`(`item_id`,`item_name`,`item_kategori`,`item_limit`,`item_hpp_price`,`item_price`) values (2,'asdasd','4',15,200000,800000),(3,'testing','3',12,12000,1200000);

/*Table structure for table `journal_types` */

DROP TABLE IF EXISTS `journal_types`;

CREATE TABLE `journal_types` (
  `journal_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `journal_type_name` varchar(200) NOT NULL,
  PRIMARY KEY (`journal_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `journal_types` */

insert  into `journal_types`(`journal_type_id`,`journal_type_name`) values (1,'PEMASUKAN'),(2,'PENGELUARAN'),(3,'PENGELUARAN LAINNYA'),(4,'PEMASUKKAN LAINNYA'),(5,'PENGANGSURAN HUTANG'),(6,'PENGANGSURAN PIUTANG');

/*Table structure for table `journals` */

DROP TABLE IF EXISTS `journals`;

CREATE TABLE `journals` (
  `journal_id` int(11) NOT NULL AUTO_INCREMENT,
  `journal_type_id` int(11) NOT NULL,
  `data_id` int(11) NOT NULL,
  `data_url` text NOT NULL,
  `journal_debit` int(11) NOT NULL,
  `journal_credit` int(11) NOT NULL,
  `journal_piutang` int(11) NOT NULL,
  `journal_hutang` int(11) NOT NULL,
  `journal_desc` text NOT NULL,
  `journal_date` date NOT NULL,
  `payment_method` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `bank_account` int(11) NOT NULL,
  `bank_id_to` int(11) NOT NULL,
  `bank_account_to` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`journal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

/*Data for the table `journals` */

insert  into `journals`(`journal_id`,`journal_type_id`,`data_id`,`data_url`,`journal_debit`,`journal_credit`,`journal_piutang`,`journal_hutang`,`journal_desc`,`journal_date`,`payment_method`,`bank_id`,`bank_account`,`bank_id_to`,`bank_account_to`,`user_id`,`branch_id`) values (1,1,1486180304,'transaction_new.php?page=save(lunas)',160000,0,0,0,'','2017-02-04',1,0,0,0,0,1,3),(2,1,1486183597,'transaction_new.php?page=save(lunas)',480000,0,0,0,'','2017-02-04',1,0,0,0,0,1,3),(3,1,1486184265,'transaction_new.php?page=save(hutang)',120000,0,40000,0,'','2017-02-04',5,0,0,0,0,1,3),(4,2,1486184875,'purchases.php?page=save_payment(Belum lunas)',0,300000,0,300000,'','2017-02-04',5,1,1332414,1,46624246,1,3),(5,1,1486368485,'transaction_new.php?page=save(hutang)',12000,0,148000,0,'','2017-02-06',5,0,0,0,0,1,3),(6,1,1486373012,'transaction_new.php?page=save(hutang)',21000,0,139000,0,'','2017-02-06',5,0,0,0,0,1,3),(7,1,1486394594,'transaction_new.php?page=save(lunas)',148000,0,0,0,'','2017-02-06',1,0,0,0,0,1,3),(8,1,1486394663,'transaction_new.php?page=save(lunas)',148000,0,0,0,'','2017-02-06',1,0,0,0,0,1,3),(9,1,1486394693,'transaction_new.php?page=save(lunas)',148000,0,0,0,'','2017-02-06',1,0,0,0,0,1,3),(10,2,1486397218,'purchases.php?page=save_payment(Belum lunas)',0,0,0,0,'','2017-02-06',5,0,0,0,0,1,3),(11,1,1486398169,'transaction_new.php?page=save(lunas)',318000,0,0,0,'','2017-02-06',1,0,0,0,0,1,3),(12,1,1486434666,'transaction_new.php?page=save(hutang)',25000,0,135000,0,'','2017-02-07',5,0,0,0,0,1,3),(13,1,1486434666,'transaction_new.php?page=save(lunas)',160000,0,0,0,'','2017-02-07',5,0,0,0,0,1,3),(14,1,1486435450,'transaction_new.php?page=save(hutang)',25000,0,135000,0,'','2017-02-07',5,0,0,0,0,1,3),(15,1,1486435450,'transaction_new.php?page=save(lunas)',160000,0,0,0,'','2017-02-07',5,0,0,0,0,1,3),(16,1,1486436233,'transaction_new.php?page=save(hutang)',2000000,0,23000000,0,'','2017-02-07',5,0,0,0,0,1,3),(17,1,1486436362,'transaction_new.php?page=save(hutang)',56000,0,104000,0,'','2017-02-07',5,0,0,0,0,1,3),(18,2,1486462836,'purchases.php?page=save_payment(lunas)',0,120000,0,0,'','2017-02-07',1,0,0,0,0,1,3),(19,7,1486481910,'retur.php?page=pay_retur',0,0,0,0,'','2017-02-07',1,0,0,0,0,1,0),(20,7,1486486233,'retur.php?page=pay_retur',0,0,0,0,'','2017-02-07',1,0,0,0,0,1,0),(21,1,1486694436,'transaction_new.php?page=save(hutang)',1250000,0,23750000,0,'','2017-02-10',5,0,0,0,0,1,3),(22,1,1487810521,'transaction_new.php?page=save(hutang)',340000,0,24660000,0,'','2017-02-23',5,0,0,0,0,1,3),(23,1,1487815553,'transaction_new.php?page=save(hutang)',50000,0,190000,0,'','2017-02-23',5,0,0,0,0,1,3),(24,1,1487825674,'transaction_new.php?page=save(hutang)',1200000,0,23800000,0,'','2017-02-23',5,0,0,0,0,1,3),(25,2,1487826325,'purchases.php?page=save_payment(lunas)',0,3200000,0,0,'','2017-02-23',1,0,0,0,0,1,3),(26,7,1487826573,'retur.php?page=pay_retur',0,0,0,0,'','2017-02-23',1,0,0,0,0,1,0),(28,3,28,'jurnal_umum.php?page=form&id=',12000000,0,0,0,'','2017-02-23',0,0,0,0,0,1,3),(29,2,1487995460,'purchases.php?page=save_payment(lunas)',0,2400000,0,0,'','2017-02-25',1,0,0,0,0,1,3),(30,2,1487996150,'purchases.php?page=save_payment(lunas)',0,20000000,0,0,'','2017-02-25',1,0,0,0,0,1,3),(31,2,1487996189,'purchases.php?page=save_payment(lunas)',0,4600000,0,0,'','2017-02-25',1,0,0,0,0,1,3),(32,2,1487996829,'purchases.php?page=save_payment(lunas)',0,3600000,0,0,'','2017-02-25',1,0,0,0,0,1,3),(33,2,1487997111,'purchases.php?page=save_payment(lunas)',0,4600000,0,0,'','2017-02-25',1,0,0,0,0,1,3),(34,2,1487997155,'purchases.php?page=save_payment(lunas)',0,2300000,0,0,'','2017-02-25',1,0,0,0,0,1,3),(35,2,1487997182,'purchases.php?page=save_payment(lunas)',0,2400000,0,0,'','2017-02-25',1,0,0,0,0,1,3),(36,2,1487997511,'purchases.php?page=save_payment(lunas)',0,4800000,0,0,'','2017-02-25',1,0,0,0,0,1,3),(37,2,1487997579,'purchases.php?page=save_payment(lunas)',0,2400000,0,0,'','2017-02-25',1,0,0,0,0,1,3),(38,2,1488025623,'purchases.php?page=save_payment(lunas)',0,9600000,0,0,'','2017-02-25',1,0,0,0,0,1,3),(39,2,1488025717,'purchases.php?page=save_payment(lunas)',0,7200000,0,0,'','2017-02-25',1,0,0,0,0,1,3),(40,2,1488026249,'purchases.php?page=save_payment(lunas)',0,9600000,0,0,'','2017-02-25',1,0,0,0,0,1,3),(41,2,1488029551,'purchases.php?page=save_payment(lunas)',0,2400000,0,0,'','2017-02-25',1,0,0,0,0,1,3),(42,2,1488030024,'purchases.php?page=save_payment(lunas)',0,0,0,0,'','2017-02-25',1,0,0,0,0,1,3),(43,2,1488030110,'purchases.php?page=save_payment(lunas)',0,1200000,0,0,'','2017-02-25',1,0,0,0,0,1,3),(44,2,1488030345,'purchases.php?page=save_payment(lunas)',0,2400000,0,0,'','2017-02-25',1,0,0,0,0,1,3),(45,2,1488030817,'purchases.php?page=save_payment(lunas)',0,2400000,0,0,'','2017-02-25',1,0,0,0,0,1,3),(46,2,1488030919,'purchases.php?page=save_payment(lunas)',0,2400000,0,0,'','2017-02-25',1,0,0,0,0,1,3),(47,2,1488032632,'purchases.php?page=save_payment(lunas)',0,4800000,0,0,'','2017-02-25',1,0,0,0,0,1,3),(48,2,1488113216,'purchases.php?page=save_payment(lunas)',0,6000000,0,0,'','2017-02-26',1,0,0,0,0,1,3),(49,2,1488113362,'purchases.php?page=save_payment(lunas)',0,3600000,0,0,'','2017-02-26',1,0,0,0,0,1,3),(50,2,1488113475,'purchases.php?page=save_payment(lunas)',0,4800000,0,0,'','2017-02-26',1,0,0,0,0,1,3),(51,2,1488113741,'purchases.php?page=save_payment(lunas)',0,360000,0,0,'','2017-02-26',1,0,0,0,0,1,3),(52,1,1488208252,'transaction_new.php?page=save(lunas)',160000,0,0,0,'','2017-02-27',1,0,0,0,0,1,3),(53,1,1488208365,'transaction_new.php?page=save(lunas)',160000,0,0,0,'','2017-02-27',1,0,0,0,0,1,3),(54,1,1488208497,'transaction_new.php?page=save(lunas)',160000,0,0,0,'','2017-02-27',1,0,0,0,0,1,3),(55,1,1488208593,'transaction_new.php?page=save(lunas)',160000,0,0,0,'','2017-02-27',1,0,0,0,0,1,3),(56,1,1488208603,'transaction_new.php?page=save(lunas)',160000,0,0,0,'','2017-02-27',1,0,0,0,0,1,3),(57,2,1488208670,'purchases.php?page=save_payment(lunas)',0,1200000,0,0,'','2017-02-27',1,0,0,0,0,1,3),(58,2,1488214357,'purchases.php?page=save_payment(lunas)',0,3600000,0,0,'','2017-02-27',1,0,0,0,0,1,3),(59,2,1488214766,'purchases.php?page=save_payment(lunas)',0,9600000,0,0,'','2017-02-27',1,0,0,0,0,1,3),(60,1,1488219269,'transaction_new.php?page=save(lunas)',1400000,0,0,0,'','2017-02-27',1,0,0,0,0,1,3),(61,1,1488220926,'transaction_new.php?page=save(lunas)',1400000,0,0,0,'','2017-02-27',1,0,0,0,0,1,3),(62,2,1488481743,'purchases.php?page=save_payment(lunas)',0,7380000,0,0,'','2017-03-02',1,0,0,0,0,1,3),(63,2,1488481878,'purchases.php?page=save_payment(lunas)',0,3690000,0,0,'','2017-03-02',1,0,0,0,0,1,3),(64,1,1488549397,'transaction_new.php?page=save(lunas)',1400000,0,0,0,'','2017-03-03',1,0,0,0,0,1,3),(65,1,1488549644,'transaction_new.php?page=save(lunas)',1400000,0,0,0,'','2017-03-03',1,0,0,0,0,1,3),(66,1,1488549694,'transaction_new.php?page=save(lunas)',1400000,0,0,0,'','2017-03-03',1,0,0,0,0,1,3),(67,1,1488550810,'transaction_new.php?page=save(lunas)',1400000,0,0,0,'','2017-03-03',1,0,0,0,0,1,3),(68,1,1488598296,'transaction_new.php?page=save(lunas)',1400000,0,0,0,'','2017-03-04',1,0,0,0,0,1,3),(69,1,1488598740,'transaction_new.php?page=save(lunas)',1400000,0,0,0,'','2017-03-04',1,0,0,0,0,1,3),(70,1,1488599228,'transaction_new.php?page=save(lunas)',1400000,0,0,0,'','2017-03-04',1,0,0,0,0,1,3),(71,7,1488610888,'retur.php?page=pay_retur',0,0,0,0,'','0000-00-00',1,0,0,0,0,1,0),(72,7,1488611018,'retur.php?page=pay_retur',0,0,0,0,'','0000-00-00',1,0,0,0,0,1,0),(73,7,1488611105,'retur.php?page=pay_retur',0,0,0,0,'','0000-00-00',1,0,0,0,0,1,0),(74,7,1488611182,'retur.php?page=pay_retur',0,0,0,0,'','0000-00-00',1,0,0,0,0,1,0),(75,7,1488611218,'retur.php?page=pay_retur',0,0,0,0,'','0000-00-00',1,0,0,0,0,1,0),(76,7,1488611327,'retur.php?page=pay_retur',0,0,0,0,'','0000-00-00',1,0,0,0,0,1,0),(77,7,1488611370,'retur.php?page=pay_retur',0,0,0,0,'','0000-00-00',1,0,0,0,0,1,0),(78,7,1488611416,'retur.php?page=pay_retur',0,0,0,0,'','0000-00-00',1,0,0,0,0,1,0),(79,1,1488611519,'transaction_new.php?page=save(lunas)',1400000,0,0,0,'','2017-03-04',1,0,0,0,0,1,3),(80,7,1488611560,'retur.php?page=pay_retur',0,0,0,0,'','0000-00-00',1,0,0,0,0,1,0),(81,2,1488620226,'purchases.php?page=save_payment(lunas)',0,1200000,0,0,'','2017-03-04',1,0,0,0,0,1,3),(82,7,1488720538,'retur_pembelian.php?page=pay_retur',0,0,0,0,'','0000-00-00',1,0,0,0,0,1,0);

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`kategori_id`,`kategori_name`) values (2,'Lampu'),(3,'Kaca'),(4,'Spare Part');

/*Table structure for table `kerusakan_tambahan` */

DROP TABLE IF EXISTS `kerusakan_tambahan`;

CREATE TABLE `kerusakan_tambahan` (
  `tambahan_id` int(11) NOT NULL,
  `work_order_id` int(11) NOT NULL,
  `kerusakan` varchar(300) NOT NULL,
  PRIMARY KEY (`tambahan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kerusakan_tambahan` */

insert  into `kerusakan_tambahan`(`tambahan_id`,`work_order_id`,`kerusakan`) values (0,0,'');

/*Table structure for table `merk` */

DROP TABLE IF EXISTS `merk`;

CREATE TABLE `merk` (
  `merk_id` int(11) NOT NULL AUTO_INCREMENT,
  `merk_name` varchar(100) NOT NULL,
  PRIMARY KEY (`merk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `merk` */

insert  into `merk`(`merk_id`,`merk_name`) values (1,'FORD'),(2,'TOYOTA'),(3,'HONDA'),(4,'KIJANG'),(12,'RUSH'),(13,'MAZDA'),(14,'FORTUNER'),(15,'COBALT');

/*Table structure for table `office` */

DROP TABLE IF EXISTS `office`;

CREATE TABLE `office` (
  `office_id` int(11) NOT NULL,
  `office_name` varchar(200) NOT NULL,
  `office_img` text NOT NULL,
  `office_desc` text NOT NULL,
  `office_address` text NOT NULL,
  `office_phone` varchar(100) NOT NULL,
  `office_email` varchar(300) NOT NULL,
  `office_city` varchar(100) NOT NULL,
  `office_owner` varchar(100) NOT NULL,
  `office_owner_phone` varchar(100) NOT NULL,
  `office_owner_address` varchar(100) NOT NULL,
  `office_owner_email` varchar(100) NOT NULL,
  PRIMARY KEY (`office_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `office` */

insert  into `office`(`office_id`,`office_name`,`office_img`,`office_desc`,`office_address`,`office_phone`,`office_email`,`office_city`,`office_owner`,`office_owner_phone`,`office_owner_address`,`office_owner_email`) values (1,'BENGKEL','1488787175_test.png','','																																																																																																																					JL. RAYA LONTAR 226 SURABAYA																																																																																																																								','(031)-04408-0-02','twoinone@gmail.com','SURABAYA','Danu Ariska','0856-343-423','Surabaya','danuariksa@gmail.com');

/*Table structure for table `payment_methods` */

DROP TABLE IF EXISTS `payment_methods`;

CREATE TABLE `payment_methods` (
  `payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method_name` varchar(100) NOT NULL,
  PRIMARY KEY (`payment_method_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `payment_methods` */

insert  into `payment_methods`(`payment_method_id`,`payment_method_name`) values (1,'CASH'),(2,'DEBIT'),(3,'TRANSFER'),(4,'KREDIT'),(5,'ANGSURAN');

/*Table structure for table `pengecekan` */

DROP TABLE IF EXISTS `pengecekan`;

CREATE TABLE `pengecekan` (
  `pengecekan_id` int(11) NOT NULL,
  `pengecekan_date` date NOT NULL,
  `work_order_id` int(11) NOT NULL,
  `work_order_detail_id` int(11) NOT NULL,
  `tambahan_id` int(11) NOT NULL,
  PRIMARY KEY (`pengecekan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengecekan` */

/*Table structure for table `permits` */

DROP TABLE IF EXISTS `permits`;

CREATE TABLE `permits` (
  `permit_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) NOT NULL,
  `side_menu_id` int(11) NOT NULL,
  `permit_acces` varchar(10) NOT NULL,
  PRIMARY KEY (`permit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2677 DEFAULT CHARSET=latin1;

/*Data for the table `permits` */

insert  into `permits`(`permit_id`,`user_type_id`,`side_menu_id`,`permit_acces`) values (409,28,1,'0'),(410,28,2,''),(411,28,3,'0'),(412,28,4,'0'),(413,28,5,'0'),(414,28,6,'0'),(415,28,7,'c,d'),(416,28,8,'r,d'),(417,28,9,'c,r,u,d'),(418,28,10,'r,d'),(419,28,11,'c,r,u,d'),(420,28,12,'r,d'),(421,28,13,'c,r,u,d'),(422,28,14,'r,d'),(423,28,15,'r,d'),(424,28,16,'r,d'),(425,28,17,'c,r,d'),(426,28,18,'r'),(427,28,19,'r,d'),(428,28,20,'r,d'),(429,28,21,'r,u'),(430,28,22,'r,d'),(431,28,23,'r,u'),(432,28,24,'c,r,u,d'),(481,2,1,'0'),(482,2,2,'c,r,u,d'),(483,2,3,'0'),(484,2,4,'0'),(485,2,5,'0'),(486,2,6,'0'),(487,2,7,'c,r,u,d'),(488,2,8,'c,r,u,d'),(489,2,9,'c,r,u,d'),(490,2,10,'c,r,u,d'),(491,2,11,'c,r,u,d'),(492,2,12,'c,r,u,d'),(493,2,13,'c,r,u,d'),(494,2,14,'c,r,u,d'),(495,2,15,'c,r,u,d'),(496,2,16,'c,r,u,d'),(497,2,17,'c,r,u,d'),(498,2,18,'c,r,u,d'),(499,2,19,'c,r,u,d'),(500,2,20,'c,r,u,d'),(501,2,21,'c,r,u,d'),(502,2,22,'c,r,u,d'),(503,2,23,'c,r,u,d'),(504,2,24,'c,r,u,d'),(505,4,1,'0'),(506,4,2,'c,r,u,d'),(507,4,3,'0'),(508,4,4,'0'),(509,4,5,'0'),(510,4,6,'0'),(511,4,7,''),(512,4,8,''),(513,4,9,''),(514,4,10,''),(515,4,11,''),(516,4,12,''),(517,4,13,''),(518,4,14,''),(519,4,15,'r'),(520,4,16,''),(521,4,17,''),(522,4,18,''),(523,4,19,''),(524,4,20,''),(525,4,21,''),(526,4,22,''),(527,4,23,''),(528,4,24,''),(2652,1,1,'0'),(2653,1,2,'c,r,u,d'),(2654,1,3,'c,r,u,d'),(2655,1,4,'0'),(2656,1,5,'0'),(2657,1,6,'0'),(2658,1,7,'0'),(2659,1,8,'0'),(2660,1,9,'c,r,u,d'),(2661,1,10,'c,r,u,d'),(2662,1,11,'c,r,u,d'),(2663,1,13,'c,r,u,d'),(2664,1,14,'c,r,u,d'),(2665,1,15,'c,r,u,d'),(2666,1,16,'c,r,u,d'),(2667,1,17,'c,r,u,d'),(2668,1,18,'c,r,u,d'),(2669,1,19,'c,r,u,d'),(2670,1,20,'c,r,u,d'),(2671,1,21,'0'),(2672,1,22,'0'),(2673,1,23,'c,r,u,d'),(2674,1,24,'c,r,u,d'),(2675,1,25,'c,r,u,d'),(2676,1,26,'c,r,u,d');

/*Table structure for table `purchases` */

DROP TABLE IF EXISTS `purchases`;

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_date` date NOT NULL,
  `purchase_code` varchar(200) NOT NULL,
  `item_id` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `purchase_qty` int(11) NOT NULL,
  `purchase_total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `purchases` */

/*Table structure for table `side_menus` */

DROP TABLE IF EXISTS `side_menus`;

CREATE TABLE `side_menus` (
  `side_menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `side_menu_name` varchar(100) NOT NULL,
  `side_menu_url` varchar(100) NOT NULL,
  `side_menu_parent` int(11) NOT NULL,
  `side_menu_icon` varchar(100) NOT NULL,
  `side_menu_level` int(11) NOT NULL,
  `side_menu_type_parent` int(11) NOT NULL,
  PRIMARY KEY (`side_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `side_menus` */

insert  into `side_menus`(`side_menu_id`,`side_menu_name`,`side_menu_url`,`side_menu_parent`,`side_menu_icon`,`side_menu_level`,`side_menu_type_parent`) values (1,'Master','#',0,'fa fa-edit',1,0),(2,'Work Order','work_order.php',0,'fa fa-car',1,1),(3,'Pembelian','purchase.php',1,'',2,1),(4,'Transaksi','#',0,'fa fa-shopping-cart',0,0),(5,'Accounting','#',0,'fa fa-list-alt',1,0),(6,'Laporan','#',0,'fa fa-book',1,0),(7,'Setting','#',0,'fa fa-cog',1,0),(8,'gudang','gudang.php',0,'',0,0),(9,'Cabang','branch.php',1,'',2,1),(10,'KATEGORI ITEM','kategori.php',1,'',2,1),(11,'Bank','bank.php',1,'',2,1),(13,'Arus Kas','arus_kas.php',5,'',2,1),(14,'Pemasukan Dan Pengeluaran Lainnya','jurnal_umum.php',5,'',2,1),(15,'Laporan Detail','report_detail.php',6,'',2,1),(16,'Laporan Piutang','piutang.php',6,'',2,1),(17,'Laporan hutang','utang.php',6,'',2,1),(18,'Profil','office.php',7,'',2,1),(19,'User','user.php',7,'',2,1),(20,'Type User','user_type.php',7,'',2,1),(21,'Laporan Uang Kasir','report_uang_kasir.php',0,'',0,0),(22,'Laporan Hapus Transaksi','report_edit_transaksi.php',0,'',0,0),(23,'Stock Item','stock_master.php',1,'',2,1),(24,'Asuransi','asuransi.php',1,'',2,1),(25,'Supplier','supplier.php',1,'',2,1),(26,'Customer','customer.php',1,'',2,1);

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(100) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `status` */

insert  into `status`(`status_id`,`status_name`) values (1,'Klaim Asuransi'),(2,'Klaim Bengkel'),(3,'Pengecekan '),(4,'Sudah Disetujui');

/*Table structure for table `suppliers` */

DROP TABLE IF EXISTS `suppliers`;

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_phone` varchar(13) NOT NULL,
  `supplier_email` varchar(100) NOT NULL,
  `supplier_addres` varchar(100) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `suppliers` */

insert  into `suppliers`(`supplier_id`,`supplier_name`,`supplier_phone`,`supplier_email`,`supplier_addres`) values (1,'Supplier','081234567890','supplier@gmail.com','Tentang Supplier');

/*Table structure for table `user_types` */

DROP TABLE IF EXISTS `user_types`;

CREATE TABLE `user_types` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_name` varchar(200) NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `user_types` */

insert  into `user_types`(`user_type_id`,`user_type_name`) values (1,'Administrator'),(2,'Owner'),(3,'Manager'),(4,'Cashier'),(5,'Waitress');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) NOT NULL,
  `user_login` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_code` varchar(100) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `user_img` text NOT NULL,
  `user_active_status` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `user_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`user_id`,`user_type_id`,`user_login`,`user_password`,`user_name`,`user_code`,`user_phone`,`user_img`,`user_active_status`,`branch_id`,`user_desc`) values (1,1,'admin','fe01ce2a7fbac8fafaed7c982a04e229','admin','','747473773673','',1,3,''),(2,1,'admin2','21232f297a57a5a743894a0e4a801fc3','admin2','','1212','',1,3,'');

/*Table structure for table `work_order` */

DROP TABLE IF EXISTS `work_order`;

CREATE TABLE `work_order` (
  `work_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `cabang` varchar(200) NOT NULL,
  `asuransi_id` int(11) NOT NULL,
  `no_polis` varchar(200) NOT NULL,
  `date_asuransi` date NOT NULL,
  `merk_id` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `no_polisi` varchar(200) NOT NULL,
  `no_mesin` varchar(200) NOT NULL,
  `no_rangka` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`work_order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

/*Data for the table `work_order` */

insert  into `work_order`(`work_order_id`,`date`,`cabang`,`asuransi_id`,`no_polis`,`date_asuransi`,`merk_id`,`tahun`,`color_id`,`no_polisi`,`no_mesin`,`no_rangka`,`user_id`,`status_id`) values (49,'2017-03-15','3',4,'BMW123','2017-03-15',14,2017,3,'BMW123','BMW123','BMW123',1,1),(50,'2017-03-15','3',4,'BMW123','2017-03-15',15,2017,3,'BMW123','BMW123','BMW123',2,1),(51,'2017-03-15','3',4,'ASD123','2017-03-15',1,2100,4,'ASD123','ASD123','ASD123',2,1),(52,'2017-03-15','3',4,'QWE123','2017-03-15',12,2111,2,'QWE123','QWE123','QWE123',2,2),(53,'2017-03-15','3',4,'QWE123','2017-03-15',12,2111,2,'QWE123','QWE123','QWE123',2,2),(54,'2017-03-15','3',4,'QWE123','2017-03-15',12,2111,2,'QWE123','QWE123','QWE123',2,2),(55,'2017-03-15','3',0,'ZXC123','2017-03-15',4,2330,5,'ZXC123','ZXC123','ZXC123',2,2),(56,'2017-03-15','3',0,'BMW123','2017-03-15',1,1211,3,'BMW123','BMW123','BMW123',2,0),(57,'2017-03-15','3',4,'BMW123','2017-03-15',3,121,1,'BMW123','BMW123','BMW123',2,2);

/*Table structure for table `work_order_details` */

DROP TABLE IF EXISTS `work_order_details`;

CREATE TABLE `work_order_details` (
  `work_order_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `work_order_id` int(11) NOT NULL,
  `kerusakan` text NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`work_order_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `work_order_details` */

insert  into `work_order_details`(`work_order_detail_id`,`work_order_id`,`kerusakan`,`status_id`) values (14,49,'Lampu Depan',1),(15,49,'Lampu Belakang',1),(16,50,'Filter',0),(17,51,'Tangki',0),(18,52,'Kabel',0),(19,53,'Kabel',0),(20,54,'Kabel',0),(21,55,'AC',0),(22,56,'BMW123',0),(23,57,'BMW123',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
