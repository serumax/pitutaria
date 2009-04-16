/*
SQLyog Community Edition- MySQL GUI v7.14 
MySQL - 5.0.67-community-nt : Database - pitutaria
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`pitutaria` /*!40100 DEFAULT CHARACTER SET utf8 */;

/*Data for the table `accounts` */

insert  into `accounts`(`id`,`user_id`,`type_id`,`username`,`password`,`active`,`created`,`modified`) values (3,1,3,'pviojo','dab3ec6f3d89cafba25699762e7e6e5574e4e9cc',1,'2009-01-05 23:17:09','2009-01-05 23:17:09'),(2,1,1,'pviojo@gmail.com','dab3ec6f3d89cafba25699762e7e6e5574e4e9cc',1,'2009-01-05 23:17:09','2009-01-05 23:17:09');

/*Data for the table `languages` */

insert  into `languages`(`id`,`language`,`code`) values (1,'English','en'),(2,'Spanish','spa');

/*Data for the table `translations` */

insert  into `translations`(`id`,`language_id`,`key`,`value`) values (1,1,'hello','Hello!'),(2,2,'hello','Hola!'),(3,1,'bye','Goodbye!'),(4,2,'bye','Adiós!');

/*Data for the table `types` */

insert  into `types`(`id`,`type`,`description`,`created`,`modified`) values (1,'EMAIL','Email access','2009-01-05 21:47:12','2009-01-05 21:47:12'),(2,'TWITTER','Twitter access','2009-01-05 21:47:12','2009-01-05 21:47:12');

/*Data for the table `users` */

insert  into `users`(`id`,`active`,`created`,`modified`,`name`,`last_name`,`avatar`,`nickname`) values (1,0,'2009-01-05 23:17:09','2009-01-07 14:47:08','Pablo','Viojo','http://test_skadi.s3.amazonaws.com/me.jpg','pviojo');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
