/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.20-MariaDB : Database - precode_base
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`precode_base` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `precode_base`;

/*Table structure for table `produtos` */

DROP TABLE IF EXISTS `produtos`;

CREATE TABLE `produtos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(60) DEFAULT NULL,
  `Marca` varchar(30) DEFAULT NULL,
  `Quantidade_Atual` int(11) DEFAULT NULL,
  `Valor` decimal(10,2) DEFAULT NULL,
  `Imagem_URL` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `produtos` */

insert  into `produtos`(`ID`,`Descricao`,`Marca`,`Quantidade_Atual`,`Valor`,`Imagem_URL`) values 
(1,'Playstation 5','Sony',100,4800.00,'https://www.casasbahia-imagens.com.br/html/conteudo-produto/336/55010438/imagens/playstation_1_.png'),
(2,'Xbox Series S','Microsoft',50,3000.00,'https://compass-ssl.xbox.com/assets/f7/9c/f79cf7d6-8fe6-407d-817e-441767306365.png?n=XBX_A-BuyBoxBGImage02-D.png'),
(3,'Switch','Nintendo',10,2500.00,'https://www.casasbahia-imagens.com.br/Control/ArquivoExibir.aspx?IdArquivo=1560647351'),
(11,'Pc Gamer','Dell',123,13000.00,'https://www.casanissei.com/media/catalog/product/cache/16a9529cefd63504739dab4fc3414065/6/4/6409409_sd.jpg'),
(14,'PSP','Sony',12333,1200.00,'https://tudosobreprodutos.com.br/img/console-playstation-portatil-psp-010-core-sony_1_.png');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
