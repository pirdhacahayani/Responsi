/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.14-MariaDB : Database - toko_jam
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`toko_jam` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `toko_jam`;

/*Table structure for table `detail_bayar` */

DROP TABLE IF EXISTS `detail_bayar`;

CREATE TABLE `detail_bayar` (
  `id_detail` int(3) NOT NULL AUTO_INCREMENT,
  `id_jam` int(3) DEFAULT NULL,
  `jumlah_beli` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_bayar` */

insert  into `detail_bayar`(`id_detail`,`id_jam`,`jumlah_beli`) values 
(1,1,3),
(2,2,2),
(3,3,1),
(4,4,2);

/*Table structure for table `header_bayar` */

DROP TABLE IF EXISTS `header_bayar`;

CREATE TABLE `header_bayar` (
  `no_nota` int(3) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `id_detail` int(3) DEFAULT NULL,
  `total_pembelian` int(12) DEFAULT NULL,
  `bayar` int(12) DEFAULT NULL,
  `sisa_bayar` int(12) DEFAULT NULL,
  PRIMARY KEY (`no_nota`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `header_bayar` */

insert  into `header_bayar`(`no_nota`,`tanggal`,`id_detail`,`total_pembelian`,`bayar`,`sisa_bayar`) values 
(1,'2021-05-05',1,16020000,16020000,0),
(2,'2021-05-06',2,2734000,2800000,66000),
(3,'2021-05-07',3,1350000,1350000,0),
(4,'2021-05-08',4,422000000,500000000,78000000);

/*Table structure for table `jam` */

DROP TABLE IF EXISTS `jam`;

CREATE TABLE `jam` (
  `id_jam` int(3) NOT NULL AUTO_INCREMENT,
  `id_merk` int(3) DEFAULT NULL,
  `ukuran` varchar(5) DEFAULT NULL,
  `warna` varchar(10) DEFAULT NULL,
  `harga` int(12) DEFAULT NULL,
  `stok` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_jam`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `jam` */

insert  into `jam`(`id_jam`,`id_merk`,`ukuran`,`warna`,`harga`,`stok`) values 
(1,1,'44 mm','Space Grey',5340000,5),
(2,2,'33 mm','Rosegold',1367000,10),
(3,3,'32 mm','Melrose',1350000,15),
(4,4,'44mm','Gold',422000000,10);

/*Table structure for table `merk` */

DROP TABLE IF EXISTS `merk`;

CREATE TABLE `merk` (
  `id_merk` int(3) NOT NULL AUTO_INCREMENT,
  `nama_merk` varchar(50) DEFAULT NULL,
  `model_jam` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_merk`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `merk` */

insert  into `merk`(`id_merk`,`nama_merk`,`model_jam`) values 
(1,'Apple Watch','Series 6'),
(2,'Alexandre Christie','8420'),
(3,'Daniel Wellington','Strap Pasir'),
(4,'Rolex','Datejust 36');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
