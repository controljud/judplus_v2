/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.14 : Database - db_judplus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_judplus` /*!40100 DEFAULT CHARACTER SET utf8 */;

/*Table structure for table `agenda` */

DROP TABLE IF EXISTS `agenda`;

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `target` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `agenda` */

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cpf_cnpj` varchar(14) DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `clientes` */

insert  into `clientes`(`id`,`name`,`email`,`cpf_cnpj`,`id_empresa`,`created_at`,`updated_at`,`deleted_at`) values (1,'Maria do Rosário','maria@gmail.com','16046540654',2,'2017-08-14 15:02:59','2017-08-14 15:03:01',NULL),(2,'Jamerson Oliveira','jamerson@gmail.com','45654687546',2,'2017-08-14 15:07:56','2017-08-14 15:07:59',NULL);

/*Table structure for table `empresa` */

DROP TABLE IF EXISTS `empresa`;

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `link` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `empresa` */

insert  into `empresa`(`id`,`name`,`link`,`image`,`status`) values (1,'BS Advocacia','bsadvocacia',NULL,1),(2,'Infobase Consultoria','infobase',NULL,1);

/*Table structure for table `endereco` */

DROP TABLE IF EXISTS `endereco`;

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `id_uf` int(11) DEFAULT NULL,
  `id_pais` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `endereco` */

/*Table structure for table `historico` */

DROP TABLE IF EXISTS `historico`;

CREATE TABLE `historico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) DEFAULT NULL,
  `tipo_historico` varchar(10) DEFAULT NULL,
  `acao` varchar(10) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `old_data` text,
  `upt_data` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `historico` */

/*Table structure for table `pais` */

DROP TABLE IF EXISTS `pais`;

CREATE TABLE `pais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` char(3) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pais` */

insert  into `pais`(`id`,`sigla`,`nome`) values (1,'BRA','Brasil');

/*Table structure for table `processos` */

DROP TABLE IF EXISTS `processos`;

CREATE TABLE `processos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `processos` */

/*Table structure for table `telefone` */

DROP TABLE IF EXISTS `telefone`;

CREATE TABLE `telefone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ddd` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `ramal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `telefone` */

/*Table structure for table `tipo_usuario` */

DROP TABLE IF EXISTS `tipo_usuario`;

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tipo_usuario` */

insert  into `tipo_usuario`(`id`,`tipo`) values (1,'Usuário'),(2,'Editor'),(3,'Administrador'),(4,'Super Administrador');

/*Table structure for table `uf` */

DROP TABLE IF EXISTS `uf`;

CREATE TABLE `uf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` char(2) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `id_pais` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_uf_pais` (`id_pais`),
  CONSTRAINT `fk_uf_pais` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `uf` */

insert  into `uf`(`id`,`sigla`,`nome`,`id_pais`) values (1,'AC','Acre',1),(2,'AL','Alagoas',1),(3,'AM','Amazonas',1),(4,'AP','Amapá',1),(5,'BA','Bahia',1),(6,'CE','Ceará',1),(7,'DF','Distrito Federal',1),(8,'ES','Espírito Santo',1),(9,'GO','Goiás',1),(10,'MA','Maranhão',1),(11,'MG','Minas Gerais',1),(12,'MS','Mato Grosso do Sul',1),(13,'MT','Mato Grosso',1),(14,'PA','Pará',1),(15,'PB','Paraíba',1),(16,'PE','Pernambuco',1),(17,'PI','Piauí',1),(18,'PR','Paraná',1),(19,'RJ','Rio de Janeiro',1),(20,'RN','Rio Grande do Norte',1),(21,'RO','Rondônia',1),(22,'RR','Roraima',1),(23,'RS','Rio Grande do Sul',1),(24,'SC','Santa Catarina',1),(25,'SE','Sergipe',1),(26,'SP','São Paulo',1),(27,'TO','Tocantins',1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`id_empresa`),
  KEY `fk_user_empresa` (`id_empresa`),
  CONSTRAINT `fk_user_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`image`,`id_empresa`,`id_tipo_usuario`,`created_at`,`updated_at`,`deleted_at`) values (1,'Isaias Lima dos Santos','isaikki@gmail.com','114fdfefd3d69799f0b6f73ef764d405',NULL,1,4,'2017-08-09 18:47:23','2017-08-09 18:47:28',NULL),(2,'Isaias Lima dos Santos','isaikki@gmail.com','114fdfefd3d69799f0b6f73ef764d405',NULL,2,4,'2017-08-10 14:30:26','2017-08-10 14:30:28',NULL),(3,'Elias Naval Albuquerque','eliakki@gmail.com','a9065c2e681822f3bcd2857c50978745',NULL,1,2,'2017-08-11 19:50:41','2017-08-11 19:50:41',NULL),(4,'Helena Ribeiro','helenaribeiro@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,2,1,'2017-08-14 14:29:03','2017-08-14 14:29:03',NULL),(5,'John dos Santos','john@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,2,2,'2017-08-14 14:29:33','2017-08-14 14:29:33',NULL),(6,'Monica da Silva','monica@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,2,1,'2017-08-14 14:29:55','2017-08-14 14:29:55',NULL),(7,'Hermes dos Montes','hermes@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,2,3,'2017-08-14 14:30:26','2017-08-14 14:30:26',NULL),(8,'Hermes dos Montes','hermes@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,2,3,'2017-08-14 14:31:40','2017-08-14 14:31:40',NULL),(9,'Alana Gomes','alana@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,2,1,'2017-08-14 14:32:06','2017-08-14 14:32:06',NULL),(10,'Beatriz Monteiro','beatriz@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,2,2,'2017-08-14 14:32:32','2017-08-14 14:32:32',NULL),(11,'Jone','jone@gmail.com','114fdfefd3d69799f0b6f73ef764d405',NULL,2,2,'2017-08-17 14:23:44','2017-08-17 14:23:44',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
