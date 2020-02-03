/*
SQLyog Professional v12.4.1 (64 bit)
MySQL - 10.1.34-MariaDB : Database - broto
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`broto` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `broto`;

/*Table structure for table `akun` */

DROP TABLE IF EXISTS `akun`;

CREATE TABLE `akun` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_pegawai` char(8) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `id_pegawai` (`id_pegawai`),
  CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `akun` */

insert  into `akun`(`username`,`password`,`id_pegawai`) values 
('cs','qqqq1234','peg5'),
('kasir','qqqq1234','peg3'),
('koki','qqqq1234','peg2'),
('pantry','qqqq1234','peg4'),
('pelayan','qqqq1234','peg1');

/*Table structure for table `bahan` */

DROP TABLE IF EXISTS `bahan`;

CREATE TABLE `bahan` (
  `id_bahan` char(8) NOT NULL,
  `id_resep` char(8) NOT NULL,
  `nama_bahan` varchar(20) NOT NULL,
  `jumlah` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_bahan`),
  KEY `id_resep` (`id_resep`),
  CONSTRAINT `bahan_ibfk_1` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id_resep`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bahan` */

insert  into `bahan`(`id_bahan`,`id_resep`,`nama_bahan`,`jumlah`) values 
('b1','r1','ayam',20),
('b2','r1','Telor',20),
('b3','r2','Teh',20),
('b4','r2','Gula',15),
('b5','r1','Beras',10),
('b6','r1','kol',10);

/*Table structure for table `detail_pesanan` */

DROP TABLE IF EXISTS `detail_pesanan`;

CREATE TABLE `detail_pesanan` (
  `id_transaksi` char(8) NOT NULL,
  `id_menu` char(8) NOT NULL,
  `jumlah_pesanan` smallint(6) NOT NULL,
  `subtotal` int(11) NOT NULL,
  KEY `id_transaksi` (`id_transaksi`),
  KEY `id_menu` (`id_menu`),
  CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `pesanan` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detail_pesanan` */

insert  into `detail_pesanan`(`id_transaksi`,`id_menu`,`jumlah_pesanan`,`subtotal`) values 
('pes36','m3',2,40000),
('pes36','m4',2,16000),
('pes17','m4',4,32000),
('pes17','m1',4,60000),
('pes89','m1',4,60000),
('pes89','m2',4,16000),
('pes28','m1',3,45000),
('pes28','m2',2,8000),
('pes96','m2',3,12000),
('pes96','m1',2,30000),
('pes58','m3',2,40000),
('pes58','m3',2,40000),
('pes68','m2',3,12000),
('pes68','m1',3,45000),
('pes23','m1',100,1500000),
('pes46','m1',2,30000),
('pes46','m2',3,12000);

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` char(8) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nama_kategori`) values 
('k1','makanan'),
('k2','minuman');

/*Table structure for table `kuisioner` */

DROP TABLE IF EXISTS `kuisioner`;

CREATE TABLE `kuisioner` (
  `id_kuisioner` int(11) NOT NULL,
  `saran` varchar(300) NOT NULL,
  `id_pelanggan` char(8) NOT NULL,
  PRIMARY KEY (`id_kuisioner`),
  KEY `id_pelanggan` (`id_pelanggan`),
  CONSTRAINT `kuisioner_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kuisioner` */

insert  into `kuisioner`(`id_kuisioner`,`saran`,`id_pelanggan`) values 
(1,'dimurahin dong','pel1'),
(2,' lebih ramah lagi dong','pel1'),
(3,' Mantap','pel7');

/*Table structure for table `meja` */

DROP TABLE IF EXISTS `meja`;

CREATE TABLE `meja` (
  `no_meja` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `kuota` int(11) NOT NULL,
  PRIMARY KEY (`no_meja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `meja` */

insert  into `meja`(`no_meja`,`status`,`kuota`) values 
(1,'ada',2),
(2,'ada',2),
(3,'ada',4),
(4,'ada',8),
(5,'ada',2),
(6,'isi',2),
(7,'isi',4),
(8,'isi',8);

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id_menu` char(8) NOT NULL,
  `id_resep` char(8) NOT NULL,
  `id_kategori` char(8) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `menu_ibfk_1` (`id_kategori`),
  KEY `id_resep` (`id_resep`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id_resep`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`id_menu`,`id_resep`,`id_kategori`,`nama_menu`,`harga`,`foto`) values 
('m1','r1','k1','nasi goreng',15000,'nasigoreng.jpg'),
('m2','r2','k2','teh manis',4000,'tehmanis.jpg'),
('m3','r3','k1','nasi lemak',20000,'nasilemak.jpg'),
('m4','r2','k2','Teh Lemon',8000,'tehlemon.jpg');

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `id_pegawai` char(8) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pegawai` */

insert  into `pegawai`(`id_pegawai`,`nama_lengkap`,`alamat`,`jabatan`) values 
('peg1','Alfi Cahya','Jl.Tubagus Ismail','Pelayan'),
('peg2','Rizky','jl.kemana','koki'),
('peg3','fauzi','jl.bagus','Kasir'),
('peg4','saha','jl.kemana','pantry'),
('peg5','mana','jl.tahu','Cs');

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id_pelanggan` char(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`id_pelanggan`,`nama`,`no_telp`) values 
('pel1','bahaya','087845632123'),
('pel2','Muhidin','0392833183'),
('pel3','rizky','232536464'),
('pel4','Buku','087823125014'),
('pel6','Pensil','087823125014'),
('pel7','Bejo','087823125014');

/*Table structure for table `pesanan` */

DROP TABLE IF EXISTS `pesanan`;

CREATE TABLE `pesanan` (
  `id_transaksi` char(8) NOT NULL,
  `id_pelanggan` char(8) DEFAULT NULL,
  `id_pegawai` char(8) NOT NULL,
  `tanggal` date NOT NULL,
  `no_meja` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) DEFAULT NULL,
  `kembali` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `pesanan_ibfk_1` (`id_pegawai`),
  KEY `id_pelanggan` (`id_pelanggan`),
  KEY `no_meja` (`no_meja`),
  CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pesanan_ibfk_4` FOREIGN KEY (`no_meja`) REFERENCES `meja` (`no_meja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pesanan` */

insert  into `pesanan`(`id_transaksi`,`id_pelanggan`,`id_pegawai`,`tanggal`,`no_meja`,`total`,`bayar`,`kembali`) values 
('pes17','pel2','peg3','2018-08-03',4,92000,100000,8000),
('pes23','pel3','peg3','2018-08-04',4,1500000,2000000,500000),
('pes28','pel3','peg3','2018-08-03',1,53000,100000,47000),
('pes36','pel3','peg3','2018-08-03',6,56000,70000,14000),
('pes46','pel3','peg3','2018-12-20',3,42000,0,0),
('pes58','pel2','peg3','2018-08-04',1,70000,100000,30000),
('pes68','pel7','peg3','2018-08-04',4,57000,70000,13000),
('pes89','pel4','peg3','2018-08-03',3,76000,100000,24000),
('pes96','pel3','peg3','2018-08-04',3,42000,60000,18000);

/*Table structure for table `resep` */

DROP TABLE IF EXISTS `resep`;

CREATE TABLE `resep` (
  `id_resep` char(8) NOT NULL,
  `nama_resep` varchar(20) NOT NULL,
  PRIMARY KEY (`id_resep`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `resep` */

insert  into `resep`(`id_resep`,`nama_resep`) values 
('r1','resep surabi asin'),
('r2','resep jus buah'),
('r3','surabi manis'),
('r4','resep teh'),


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
