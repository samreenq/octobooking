/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.4.11-MariaDB : Database - octobooking
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`octobooking` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `octobooking`;

/*Table structure for table `booking_items` */

DROP TABLE IF EXISTS `booking_items`;

CREATE TABLE `booking_items` (
  `id` double NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `venue_id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `addons` varchar(255) NOT NULL,
  `eventdate` date NOT NULL,
  `price_per_unit` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `venue_name` varchar(255) DEFAULT NULL,
  `package_name` varchar(255) DEFAULT NULL,
  `price_unit` varchar(100) DEFAULT NULL,
  `event_time_from` time DEFAULT NULL,
  `event_time_to` time DEFAULT NULL,
  `latitude` varchar(125) DEFAULT NULL,
  `longitude` varchar(125) DEFAULT NULL,
  `total_seats` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `booking_items` */

insert  into `booking_items`(`id`,`booking_id`,`venue_id`,`vendor_id`,`addons`,`eventdate`,`price_per_unit`,`subtotal`,`total`,`service_id`,`package_id`,`type`,`venue_name`,`package_name`,`price_unit`,`event_time_from`,`event_time_to`,`latitude`,`longitude`,`total_seats`,`created_at`,`modified_at`,`status`) values 
(1,2,21,2,'[\"Event on: 2020-04-30\"]','2020-04-30',150.00,150.00,150.00,NULL,32,'service','Design Test','Package 2','',NULL,NULL,'24.8043485','67.0576612',0,'2020-04-09 02:42:15','2020-04-07 23:30:50',0),
(2,2,54,53,'[\"Event on: 2020-04-30\",\"No of Seats: 1\",\"Event on: 2020-04-30\"]','2020-04-30',12000.00,12000.00,12000.00,NULL,0,'venue','Shadi Mubarak','','perseat',NULL,NULL,'24.8741328','67.0993881',1,'2020-04-09 02:42:08','2020-04-07 23:30:50',0),
(3,2,55,53,'[\"Event on: 2020-04-30\",\"No of Seats: 1\",\"Event on: 2020-04-30\",\"No of Seats: 1\",\"Event on: 2020-04-30\"]','2020-04-30',500.00,500.00,500.00,NULL,63,'service','Best Food ','First Package','',NULL,NULL,'24.8741328','67.0993881',1,'2020-04-09 02:42:11','2020-04-07 23:30:50',0),
(4,3,41,17,'[\"Event on: 2020-04-25\"]','2020-04-25',200.00,200.00,200.00,NULL,45,'service','test photography service','My Package 1','',NULL,NULL,'24.9180271','67.0970916',0,'2020-04-08 23:58:00','2020-04-08 23:58:00',0),
(5,4,35,14,'[\"No of Seats: 1\",\"Event on: 2020-04-30\"]','2020-04-30',200.00,200.00,200.00,NULL,0,'venue','Hill top','','perseat',NULL,NULL,'24.8607','67.0011',1,'2020-04-23 17:25:26','2020-04-23 17:25:26',0),
(6,4,50,7,'[\"No of Seats: 1\",\"Event on: 2020-04-30\",\"No of Seats: 1\",\"Event on: 2020-04-30\"]','2020-04-30',25.00,25.00,25.00,NULL,58,'service','اختبار الديكور','First Package','',NULL,NULL,'24.8607','67.0011',1,'2020-04-23 17:25:26','2020-04-23 17:25:26',0),
(7,5,54,53,'[\"No of Seats: 1\",\"Event on: 2020-05-21\"]','2020-05-21',12000.00,12000.00,12000.00,NULL,0,'venue','Shadi Mubarak','','',NULL,NULL,'24.8741328','67.0993881',1,'2020-05-13 03:16:49','2020-05-13 03:16:49',0),
(8,6,54,53,'[\"No of Seats: 1\",\"Event on: 2020-05-21\"]','2020-05-21',12000.00,12000.00,12000.00,NULL,0,'venue','Shadi Mubarak','','',NULL,NULL,'24.8741328','67.0993881',1,'2020-05-13 03:17:52','2020-05-13 03:17:52',0),
(9,7,54,53,'[\"No of Seats: 1\",\"Event on: 2020-05-21\"]','2020-05-21',12000.00,12000.00,12000.00,NULL,0,'venue','Shadi Mubarak','','',NULL,NULL,'24.8741328','67.0993881',1,'2020-05-13 03:18:58','2020-05-13 03:18:58',0),
(10,8,53,53,'[\"Event on: 2020-05-28\"]','2020-05-28',55.00,55.00,55.00,NULL,20,'service','Birthday decoration','B Package 2','',NULL,NULL,'24.8607343','67.0011364',0,'2020-05-13 03:26:25','2020-05-13 03:26:25',0),
(11,8,56,53,'[\"Event on: 2020-05-28\",\"No of Seats: 6\",\"Event on: 2020-05-28\"]','2020-05-28',400.00,2400.00,2400.00,NULL,0,'venue','Test April 2020','','perseat',NULL,NULL,'31.51293009999999','74.2889905',6,'2020-05-13 03:26:25','2020-05-13 03:26:25',0);

/*Table structure for table `bookings` */

DROP TABLE IF EXISTS `bookings`;

CREATE TABLE `bookings` (
  `id` double NOT NULL AUTO_INCREMENT,
  `booking_no` varchar(125) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `event_name` varchar(125) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `bookings` */

insert  into `bookings`(`id`,`booking_no`,`user_id`,`fullname`,`email`,`phone`,`event_name`,`description`,`total`,`created_at`,`modified_at`,`status`) values 
(2,'521586295050',52,'Sami','samreenquyyum@gmail.com','031-092-5620','Brother wedding','testing notes for order',12650.00,'2020-04-07 23:30:50','2020-04-07 23:30:50',0),
(3,'521586383080',52,'Sami','samreenquyyum@gmail.com','031-092-5620','test event','testing notes',200.00,'2020-04-08 23:58:00','2020-04-08 23:58:00',0),
(4,'521587655526',52,'Sami','samreenquyyum@gmail.com','031-092-5620','test event','testing notes',225.00,'2020-04-23 17:25:26','2020-04-23 17:25:26',0),
(5,'831589332609',83,'Aliza','aliza.test18@abc.com','030-092-5988','meri shadi','testing shadi notes',12000.00,'2020-05-13 03:16:49','2020-05-13 03:16:49',0),
(6,'831589332672',83,'Aliza','aliza.test18@abc.com','030-092-5988','meri shadi','testing shadi notes',12000.00,'2020-05-13 03:17:52','2020-05-13 03:17:52',0),
(7,'831589332738',83,'Aliza','aliza.test18@abc.com','030-092-5988','meri shadi','testing shadi notes',12000.00,'2020-05-13 03:18:58','2020-05-13 03:18:58',0),
(8,'831589333185',83,'Aliza','aliza.test18@abc.com','030-092-5988','bro wedding','testing notes',2455.00,'2020-05-13 03:26:25','2020-05-13 03:26:25',0);

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cat_name_ar` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'category',
  `cat_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`cat_name`,`cat_name_ar`,`type`,`cat_image`,`is_featured`,`status`) values 
(8,'decoration','زخرفة','category','decoration.jpg',1,1),
(7,'catering','تقديم الطعام','category','catering.png',1,1),
(6,'cakes','كيك','category','cakes.png',1,1),
(9,'photography','التصوير','category','photography.png',0,1),
(10,'flourish','تزدهر','category','flourish.png',1,1),
(11,'boutique','متجر','category','boutique.png',1,1),
(12,'event planner','مخطط الاحداث','category','event-planner.png',1,1),
(13,'designing','تصميم','category','designing.png',1,2),
(14,'weddings','حفلات الزفاف','suitables','wedding.png',0,1),
(15,'birthday','عيد الميلاد','suitables','birthday.png',0,1),
(16,'corporate','الشركات','suitables','corporate.png',0,1),
(17,'buffet','بوفيه','amenity','buffet.png',0,1),
(18,'car','سيارة','amenity','car.jpg',0,2),
(19,'wifi','واي فاي','amenity','wifi.jpg',0,1),
(20,'Makkah','مكه','suitables','makkah.png',0,1),
(21,'adinah','أديناه','suitables','madinah.png',0,1),
(22,'riyadh','مدينة الرياض','location','riyadh.png',0,2),
(23,'muscat','مسقط','location','muscat.png',0,2),
(24,'kuwait','الكويت','location','kuwait.png',0,1),
(25,'buraidahh','بريدة','location','buraidah.png',0,1),
(26,'test','اختبار','suitables','test.jpg',0,2),
(27,'tst','اختبار','amenity','tst.jpg',0,2),
(28,'test','اختبار','category','test1.jpg',0,2),
(29,'tst','اختبار','category','tst1.jpg',0,2),
(30,'T1','اختبار','category','t1.png',0,2),
(31,'birthday bash','اختبار','suitables','birthday-bash.png',0,1),
(32,'test','اختبار','suitables','',0,2),
(33,'test','اختبار','amenity','',0,2);

/*Table structure for table `ci_sessions` */

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  PRIMARY KEY (`id`,`ip_address`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ci_sessions` */

insert  into `ci_sessions`(`id`,`ip_address`,`timestamp`,`data`) values 
('h64nldkdrqqf1d2shu89qqi1ddhr5t95','::1',1589326964,'__ci_last_regenerate|i:1589326964;'),
('e3jgtvrp31t949cr4olrgp00639ddaa0','::1',1589926949,'user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"53\";s:8:\"fullname\";s:5:\"Waqas\";s:5:\"email\";s:18:\"waqas.test@abc.com\";s:5:\"phone\";s:12:\"300-345-8765\";s:9:\"user_type\";s:1:\"2\";s:8:\"user_img\";s:23:\"waqas-53-1588542728.jpg\";s:7:\"package\";s:1:\"2\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 16:13:07\";s:11:\"modified_at\";s:19:\"2020-05-04 12:19:45\";}__ci_last_regenerate|i:1589926949;site_lang|s:2:\"en\";user_id|s:2:\"53\";role|s:1:\"2\";name|s:5:\"Waqas\";platform_type|s:6:\"custom\";'),
('3bnlm00ht03rkjd6skhb7lq76ekiftb0','::1',1589926949,'user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"53\";s:8:\"fullname\";s:5:\"Waqas\";s:5:\"email\";s:18:\"waqas.test@abc.com\";s:5:\"phone\";s:12:\"300-345-8765\";s:9:\"user_type\";s:1:\"2\";s:8:\"user_img\";s:23:\"waqas-53-1588542728.jpg\";s:7:\"package\";s:1:\"2\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 16:13:07\";s:11:\"modified_at\";s:19:\"2020-05-04 12:19:45\";}__ci_last_regenerate|i:1589926949;site_lang|s:2:\"en\";user_id|s:2:\"53\";role|s:1:\"2\";name|s:5:\"Waqas\";platform_type|s:6:\"custom\";'),
('66mra4i8se6h1j4mkp02f5n3fs7r8nv9','::1',1589926514,'user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"53\";s:8:\"fullname\";s:5:\"Waqas\";s:5:\"email\";s:18:\"waqas.test@abc.com\";s:5:\"phone\";s:12:\"300-345-8765\";s:9:\"user_type\";s:1:\"2\";s:8:\"user_img\";s:23:\"waqas-53-1588542728.jpg\";s:7:\"package\";s:1:\"2\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 16:13:07\";s:11:\"modified_at\";s:19:\"2020-05-04 12:19:45\";}__ci_last_regenerate|i:1589926514;site_lang|s:2:\"en\";user_id|s:2:\"53\";role|s:1:\"2\";name|s:5:\"Waqas\";platform_type|s:6:\"custom\";'),
('qdk2nd9i45ipln17ek7pbusad7sdbo1o','::1',1589419558,'__ci_last_regenerate|i:1589419558;site_lang|s:2:\"en\";'),
('o96l290k4oumtg5ede3ruqum94mlmjg7','::1',1589419659,'__ci_last_regenerate|i:1589419558;site_lang|s:2:\"en\";'),
('ts406igo55qpnp3v0knhf466ofualkan','::1',1589486829,'__ci_last_regenerate|i:1589486829;'),
('385ehe9m3o3k4e8kqoklun8mi7rmonu9','::1',1589490755,'__ci_last_regenerate|i:1589490755;'),
('pgor2k6nkn1pdnv46697mimjmkr042h4','::1',1589490756,'__ci_last_regenerate|i:1589490755;'),
('arhfutvo6ione5jco7pckbmv0b00kmpl','::1',1589500511,'__ci_last_regenerate|i:1589500511;'),
('fnomhover9qpdua1fsmvvn7rc6s2kstp','::1',1589502565,'__ci_last_regenerate|i:1589502565;site_lang|s:2:\"en\";'),
('frgvs0c6o19h2a66u8tv35fvm7qu2dij','::1',1589502565,'__ci_last_regenerate|i:1589502565;site_lang|s:2:\"en\";'),
('gb8gac2scd4h2fg5r8689u4utdkgs1di','::1',1589578050,'__ci_last_regenerate|i:1589578050;'),
('g1b5idgjtlj21amohv1uobgvokrnb1qr','::1',1589578639,'__ci_last_regenerate|i:1589578639;site_lang|s:2:\"en\";'),
('lld5b8e0u6aul2sgamv9gk186qoicu9m','::1',1589579769,'__ci_last_regenerate|i:1589579769;site_lang|s:2:\"en\";'),
('r2f23l5jp9tivt1amn9fit6nti6lr13d','::1',1589579897,'__ci_last_regenerate|i:1589579769;site_lang|s:2:\"en\";'),
('98bn2o667cqfqinvi03b6ceddviknqtm','::1',1589661391,'__ci_last_regenerate|i:1589661391;'),
('eqgu9i3db0nljm82eo61kunok27a1aq9','::1',1589754128,'__ci_last_regenerate|i:1589753988;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"53\";s:8:\"fullname\";s:5:\"Waqas\";s:5:\"email\";s:18:\"waqas.test@abc.com\";s:5:\"phone\";s:12:\"300-345-8765\";s:9:\"user_type\";s:1:\"2\";s:8:\"user_img\";s:23:\"waqas-53-1588542728.jpg\";s:7:\"package\";s:1:\"2\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 16:13:07\";s:11:\"modified_at\";s:19:\"2020-05-04 12:19:45\";}user_id|s:2:\"53\";role|s:1:\"2\";name|s:5:\"Waqas\";platform_type|s:6:\"custom\";'),
('q5pjqsirism86ddaq4gtgn2chinm14ni','::1',1589760526,'__ci_last_regenerate|i:1589760502;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"53\";s:8:\"fullname\";s:5:\"Waqas\";s:5:\"email\";s:18:\"waqas.test@abc.com\";s:5:\"phone\";s:12:\"300-345-8765\";s:9:\"user_type\";s:1:\"2\";s:8:\"user_img\";s:23:\"waqas-53-1588542728.jpg\";s:7:\"package\";s:1:\"2\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 16:13:07\";s:11:\"modified_at\";s:19:\"2020-05-04 12:19:45\";}user_id|s:2:\"53\";role|s:1:\"2\";name|s:5:\"Waqas\";platform_type|s:6:\"custom\";'),
('f3aeddpekfgn43843dslsthqufu45m2l','::1',1589761276,'__ci_last_regenerate|i:1589761272;site_lang|s:2:\"ar\";'),
('s9l7hpuoe597eoermaeom7i4skfs4tfe','::1',1589916070,'__ci_last_regenerate|i:1589916070;'),
('guestm7gnp8m68t5jhpujoq720r4rcnp','::1',1589919149,'user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"53\";s:8:\"fullname\";s:5:\"Waqas\";s:5:\"email\";s:18:\"waqas.test@abc.com\";s:5:\"phone\";s:12:\"300-345-8765\";s:9:\"user_type\";s:1:\"2\";s:8:\"user_img\";s:23:\"waqas-53-1588542728.jpg\";s:7:\"package\";s:1:\"2\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 16:13:07\";s:11:\"modified_at\";s:19:\"2020-05-04 12:19:45\";}user_id|s:2:\"53\";role|s:1:\"2\";name|s:5:\"Waqas\";platform_type|s:6:\"custom\";__ci_last_regenerate|i:1589919149;'),
('3lkpcq5o5mca0fnpa247k966fh257c25','::1',1589919454,'user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"53\";s:8:\"fullname\";s:5:\"Waqas\";s:5:\"email\";s:18:\"waqas.test@abc.com\";s:5:\"phone\";s:12:\"300-345-8765\";s:9:\"user_type\";s:1:\"2\";s:8:\"user_img\";s:23:\"waqas-53-1588542728.jpg\";s:7:\"package\";s:1:\"2\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 16:13:07\";s:11:\"modified_at\";s:19:\"2020-05-04 12:19:45\";}user_id|s:2:\"53\";role|s:1:\"2\";name|s:5:\"Waqas\";platform_type|s:6:\"custom\";__ci_last_regenerate|i:1589919454;site_lang|s:2:\"en\";'),
('90q74p29luckh3dsn6km75q0018ekm3q','::1',1589920022,'user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"53\";s:8:\"fullname\";s:5:\"Waqas\";s:5:\"email\";s:18:\"waqas.test@abc.com\";s:5:\"phone\";s:12:\"300-345-8765\";s:9:\"user_type\";s:1:\"2\";s:8:\"user_img\";s:23:\"waqas-53-1588542728.jpg\";s:7:\"package\";s:1:\"2\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 16:13:07\";s:11:\"modified_at\";s:19:\"2020-05-04 12:19:45\";}user_id|s:2:\"53\";role|s:1:\"2\";name|s:5:\"Waqas\";platform_type|s:6:\"custom\";__ci_last_regenerate|i:1589920022;site_lang|s:2:\"en\";'),
('3uup33vvt4vm0dmb4s0gfgurv9oj9nqj','::1',1589922197,'user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"53\";s:8:\"fullname\";s:5:\"Waqas\";s:5:\"email\";s:18:\"waqas.test@abc.com\";s:5:\"phone\";s:12:\"300-345-8765\";s:9:\"user_type\";s:1:\"2\";s:8:\"user_img\";s:23:\"waqas-53-1588542728.jpg\";s:7:\"package\";s:1:\"2\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 16:13:07\";s:11:\"modified_at\";s:19:\"2020-05-04 12:19:45\";}user_id|s:2:\"53\";role|s:1:\"2\";name|s:5:\"Waqas\";platform_type|s:6:\"custom\";__ci_last_regenerate|i:1589922197;site_lang|s:2:\"en\";'),
('cr37d6svcbmkt9h61vlviojhua68km00','::1',1589922549,'user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"53\";s:8:\"fullname\";s:5:\"Waqas\";s:5:\"email\";s:18:\"waqas.test@abc.com\";s:5:\"phone\";s:12:\"300-345-8765\";s:9:\"user_type\";s:1:\"2\";s:8:\"user_img\";s:23:\"waqas-53-1588542728.jpg\";s:7:\"package\";s:1:\"2\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 16:13:07\";s:11:\"modified_at\";s:19:\"2020-05-04 12:19:45\";}user_id|s:2:\"53\";role|s:1:\"2\";name|s:5:\"Waqas\";platform_type|s:6:\"custom\";__ci_last_regenerate|i:1589922549;site_lang|s:2:\"en\";'),
('i47l61t929m79fqthpu2d384poddkqm0','::1',1589923317,'user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"53\";s:8:\"fullname\";s:5:\"Waqas\";s:5:\"email\";s:18:\"waqas.test@abc.com\";s:5:\"phone\";s:12:\"300-345-8765\";s:9:\"user_type\";s:1:\"2\";s:8:\"user_img\";s:23:\"waqas-53-1588542728.jpg\";s:7:\"package\";s:1:\"2\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 16:13:07\";s:11:\"modified_at\";s:19:\"2020-05-04 12:19:45\";}user_id|s:2:\"53\";role|s:1:\"2\";name|s:5:\"Waqas\";platform_type|s:6:\"custom\";__ci_last_regenerate|i:1589923317;site_lang|s:2:\"en\";'),
('h2u1qmed66mdtt4ind4rurngg2c6nepg','::1',1589925505,'user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"53\";s:8:\"fullname\";s:5:\"Waqas\";s:5:\"email\";s:18:\"waqas.test@abc.com\";s:5:\"phone\";s:12:\"300-345-8765\";s:9:\"user_type\";s:1:\"2\";s:8:\"user_img\";s:23:\"waqas-53-1588542728.jpg\";s:7:\"package\";s:1:\"2\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 16:13:07\";s:11:\"modified_at\";s:19:\"2020-05-04 12:19:45\";}__ci_last_regenerate|i:1589925505;site_lang|s:2:\"en\";user_id|s:2:\"53\";role|s:1:\"2\";name|s:5:\"Waqas\";platform_type|s:6:\"custom\";'),
('3vg57p7rh6focmugi950nli7d5ij83kq','::1',1589925940,'user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"53\";s:8:\"fullname\";s:5:\"Waqas\";s:5:\"email\";s:18:\"waqas.test@abc.com\";s:5:\"phone\";s:12:\"300-345-8765\";s:9:\"user_type\";s:1:\"2\";s:8:\"user_img\";s:23:\"waqas-53-1588542728.jpg\";s:7:\"package\";s:1:\"2\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 16:13:07\";s:11:\"modified_at\";s:19:\"2020-05-04 12:19:45\";}__ci_last_regenerate|i:1589925940;site_lang|s:2:\"en\";user_id|s:2:\"53\";role|s:1:\"2\";name|s:5:\"Waqas\";platform_type|s:6:\"custom\";'),
('d51nbu16kl25o7dmfiqc753ud4b1072b','::1',1589336372,'__ci_last_regenerate|i:1589336372;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"83\";s:8:\"fullname\";s:5:\"Aliza\";s:5:\"email\";s:20:\"aliza.test18@abc.com\";s:5:\"phone\";s:12:\"030-092-5988\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:10:\"pr-im2.png\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"0\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";s:0:\"\";s:10:\"created_at\";s:19:\"2020-05-13 02:15:55\";s:11:\"modified_at\";s:19:\"0000-00-00 00:00:00\";}'),
('r1o0h39eqseirf24rqsnr70lnht44mr8','::1',1589400927,'__ci_last_regenerate|i:1589400926;'),
('e4020d33e01n8a6c52gg545m8ptrhtlp','::1',1589402788,'__ci_last_regenerate|i:1589402788;'),
('8s11j15g55b7h33j1pu6mf765fo0br1t','::1',1589405271,'__ci_last_regenerate|i:1589405271;'),
('cu152u50k9eet72l7r42eoi6kd1oa0ma','::1',1589405594,'__ci_last_regenerate|i:1589405594;'),
('0uu2l032mv9ec21afqjl2e3v50f9oq6d','::1',1589406083,'__ci_last_regenerate|i:1589406083;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"80\";s:8:\"fullname\";s:5:\"Aliza\";s:5:\"email\";s:20:\"aliza.test17@abc.com\";s:5:\"phone\";s:12:\"030-092-5988\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:10:\"pr-im2.png\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"0\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";s:0:\"\";s:10:\"created_at\";s:19:\"2020-05-13 02:12:24\";s:11:\"modified_at\";s:19:\"0000-00-00 00:00:00\";}user_id|s:2:\"80\";platform_type|s:6:\"custom\";role|s:1:\"1\";name|s:5:\"Aliza\";'),
('vj7tekrb6vhrdq4d5qt388u3dvr4olue','::1',1589406083,'__ci_last_regenerate|i:1589406083;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"80\";s:8:\"fullname\";s:5:\"Aliza\";s:5:\"email\";s:20:\"aliza.test17@abc.com\";s:5:\"phone\";s:12:\"030-092-5988\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:10:\"pr-im2.png\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"0\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";s:0:\"\";s:10:\"created_at\";s:19:\"2020-05-13 02:12:24\";s:11:\"modified_at\";s:19:\"0000-00-00 00:00:00\";}user_id|s:2:\"80\";platform_type|s:6:\"custom\";role|s:1:\"1\";name|s:5:\"Aliza\";'),
('76ljl7i57k4ro6fvvul6mlar53touafp','127.0.0.1',1589413510,'__ci_last_regenerate|i:1589413509;'),
('bbv6a01ec8oe2ckvgo3e1pq5c4lbi1an','::1',1589418781,'__ci_last_regenerate|i:1589418781;'),
('madvcoh33p816utkop4ig94ufd74ug8r','::1',1589336372,'__ci_last_regenerate|i:1589336372;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"83\";s:8:\"fullname\";s:5:\"Aliza\";s:5:\"email\";s:20:\"aliza.test18@abc.com\";s:5:\"phone\";s:12:\"030-092-5988\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:10:\"pr-im2.png\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"0\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";s:0:\"\";s:10:\"created_at\";s:19:\"2020-05-13 02:15:55\";s:11:\"modified_at\";s:19:\"0000-00-00 00:00:00\";}'),
('bbnfohab3s48sjbeb3rqrqhhim81iff8','::1',1589419086,'__ci_last_regenerate|i:1589419086;site_lang|s:2:\"en\";'),
('qh4rn3ltq5qm7a4s2o4chkkg4eq3pmhi','::1',1589334309,'__ci_last_regenerate|i:1589334309;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"83\";s:8:\"fullname\";s:5:\"Aliza\";s:5:\"email\";s:20:\"aliza.test18@abc.com\";s:5:\"phone\";s:12:\"030-092-5988\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:10:\"pr-im2.png\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"0\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";s:0:\"\";s:10:\"created_at\";s:19:\"2020-05-13 02:15:55\";s:11:\"modified_at\";s:19:\"0000-00-00 00:00:00\";}user_id|s:2:\"83\";platform_type|s:6:\"custom\";role|s:1:\"1\";name|s:5:\"Aliza\";cart_contents|a:4:{s:10:\"cart_total\";d:2455;s:11:\"total_items\";d:2;s:32:\"a32ab74e4b2eaa33b729aaf1e9ba1316\";a:23:{s:2:\"id\";s:2:\"20\";s:3:\"qty\";d:1;s:10:\"price_unit\";s:0:\"\";s:14:\"price_per_unit\";s:5:\"55.00\";s:5:\"price\";d:55;s:11:\"total_price\";s:5:\"55.00\";s:8:\"venue_id\";s:2:\"53\";s:9:\"vendor_id\";s:2:\"53\";s:10:\"package_id\";s:2:\"20\";s:4:\"name\";s:19:\"Birthday decoration\";s:10:\"venue_name\";s:19:\"Birthday decoration\";s:13:\"venue_name_ar\";s:30:\"وسام عيد الميلاد\";s:12:\"package_name\";s:11:\"B Package 2\";s:15:\"package_name_ar\";s:21:\"المجموعة ب 2\";s:4:\"type\";s:7:\"service\";s:9:\"eventdate\";s:10:\"2020-05-28\";s:11:\"total_seats\";s:0:\"\";s:8:\"latitude\";s:10:\"24.8607343\";s:9:\"longitude\";s:10:\"67.0011364\";s:7:\"options\";a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:10:\"2020-05-28\";i:3;s:7:\"service\";}s:5:\"image\";s:0:\"\";s:5:\"rowid\";s:32:\"a32ab74e4b2eaa33b729aaf1e9ba1316\";s:8:\"subtotal\";d:55;}s:32:\"2bb9934080045c99efc1f1a9bcae35e5\";a:23:{s:2:\"id\";s:2:\"56\";s:3:\"qty\";d:1;s:10:\"price_unit\";s:7:\"perseat\";s:14:\"price_per_unit\";s:6:\"400.00\";s:5:\"price\";d:2400;s:11:\"total_price\";d:2400;s:8:\"venue_id\";s:2:\"56\";s:9:\"vendor_id\";s:2:\"53\";s:10:\"package_id\";s:0:\"\";s:4:\"name\";s:15:\"Test April 2020\";s:10:\"venue_name\";s:15:\"Test April 2020\";s:13:\"venue_name_ar\";s:15:\"Test April 2020\";s:12:\"package_name\";s:0:\"\";s:15:\"package_name_ar\";s:0:\"\";s:4:\"type\";s:5:\"venue\";s:9:\"eventdate\";s:10:\"2020-05-28\";s:11:\"total_seats\";s:1:\"6\";s:8:\"latitude\";s:17:\"31.51293009999999\";s:9:\"longitude\";s:10:\"74.2889905\";s:7:\"options\";a:4:{i:0;s:0:\"\";i:1;s:1:\"6\";i:2;s:10:\"2020-05-28\";i:3;s:5:\"venue\";}s:5:\"image\";s:28:\"test-april-2020_screen-4.jpg\";s:5:\"rowid\";s:32:\"2bb9934080045c99efc1f1a9bcae35e5\";s:8:\"subtotal\";d:2400;}}'),
('v9n9bhef7art3fh2de4s7ekc2h2f054g','::1',1589333185,'__ci_last_regenerate|i:1589333185;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"83\";s:8:\"fullname\";s:5:\"Aliza\";s:5:\"email\";s:20:\"aliza.test18@abc.com\";s:5:\"phone\";s:12:\"030-092-5988\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:10:\"pr-im2.png\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"0\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";s:0:\"\";s:10:\"created_at\";s:19:\"2020-05-13 02:15:55\";s:11:\"modified_at\";s:19:\"0000-00-00 00:00:00\";}user_id|s:2:\"83\";platform_type|s:6:\"custom\";role|s:1:\"1\";name|s:5:\"Aliza\";cart_contents|a:4:{s:10:\"cart_total\";d:2455;s:11:\"total_items\";d:2;s:32:\"a32ab74e4b2eaa33b729aaf1e9ba1316\";a:23:{s:2:\"id\";s:2:\"20\";s:3:\"qty\";d:1;s:10:\"price_unit\";s:0:\"\";s:14:\"price_per_unit\";s:5:\"55.00\";s:5:\"price\";d:55;s:11:\"total_price\";s:5:\"55.00\";s:8:\"venue_id\";s:2:\"53\";s:9:\"vendor_id\";s:2:\"53\";s:10:\"package_id\";s:2:\"20\";s:4:\"name\";s:19:\"Birthday decoration\";s:10:\"venue_name\";s:19:\"Birthday decoration\";s:13:\"venue_name_ar\";s:30:\"وسام عيد الميلاد\";s:12:\"package_name\";s:11:\"B Package 2\";s:15:\"package_name_ar\";s:21:\"المجموعة ب 2\";s:4:\"type\";s:7:\"service\";s:9:\"eventdate\";s:10:\"2020-05-28\";s:11:\"total_seats\";s:0:\"\";s:8:\"latitude\";s:10:\"24.8607343\";s:9:\"longitude\";s:10:\"67.0011364\";s:7:\"options\";a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:10:\"2020-05-28\";i:3;s:7:\"service\";}s:5:\"image\";s:0:\"\";s:5:\"rowid\";s:32:\"a32ab74e4b2eaa33b729aaf1e9ba1316\";s:8:\"subtotal\";d:55;}s:32:\"2bb9934080045c99efc1f1a9bcae35e5\";a:23:{s:2:\"id\";s:2:\"56\";s:3:\"qty\";d:1;s:10:\"price_unit\";s:7:\"perseat\";s:14:\"price_per_unit\";s:6:\"400.00\";s:5:\"price\";d:2400;s:11:\"total_price\";d:2400;s:8:\"venue_id\";s:2:\"56\";s:9:\"vendor_id\";s:2:\"53\";s:10:\"package_id\";s:0:\"\";s:4:\"name\";s:15:\"Test April 2020\";s:10:\"venue_name\";s:15:\"Test April 2020\";s:13:\"venue_name_ar\";s:15:\"Test April 2020\";s:12:\"package_name\";s:0:\"\";s:15:\"package_name_ar\";s:0:\"\";s:4:\"type\";s:5:\"venue\";s:9:\"eventdate\";s:10:\"2020-05-28\";s:11:\"total_seats\";s:1:\"6\";s:8:\"latitude\";s:17:\"31.51293009999999\";s:9:\"longitude\";s:10:\"74.2889905\";s:7:\"options\";a:4:{i:0;s:0:\"\";i:1;s:1:\"6\";i:2;s:10:\"2020-05-28\";i:3;s:5:\"venue\";}s:5:\"image\";s:28:\"test-april-2020_screen-4.jpg\";s:5:\"rowid\";s:32:\"2bb9934080045c99efc1f1a9bcae35e5\";s:8:\"subtotal\";d:2400;}}'),
('sdijlgls0ecvhk888flk0a3v293n4dpo','::1',1589332574,'__ci_last_regenerate|i:1589332574;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"83\";s:8:\"fullname\";s:5:\"Aliza\";s:5:\"email\";s:20:\"aliza.test18@abc.com\";s:5:\"phone\";s:12:\"030-092-5988\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:10:\"pr-im2.png\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"0\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";s:0:\"\";s:10:\"created_at\";s:19:\"2020-05-13 02:15:55\";s:11:\"modified_at\";s:19:\"0000-00-00 00:00:00\";}user_id|s:2:\"83\";platform_type|s:6:\"custom\";role|s:1:\"1\";name|s:5:\"Aliza\";'),
('d71ssepgu4rjotqpejl9goalu3hpn2cf','::1',1589332876,'__ci_last_regenerate|i:1589332876;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"83\";s:8:\"fullname\";s:5:\"Aliza\";s:5:\"email\";s:20:\"aliza.test18@abc.com\";s:5:\"phone\";s:12:\"030-092-5988\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:10:\"pr-im2.png\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"0\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";s:0:\"\";s:10:\"created_at\";s:19:\"2020-05-13 02:15:55\";s:11:\"modified_at\";s:19:\"0000-00-00 00:00:00\";}user_id|s:2:\"83\";platform_type|s:6:\"custom\";role|s:1:\"1\";name|s:5:\"Aliza\";cart_contents|a:3:{s:10:\"cart_total\";d:55;s:11:\"total_items\";d:1;s:32:\"a32ab74e4b2eaa33b729aaf1e9ba1316\";a:23:{s:2:\"id\";s:2:\"20\";s:3:\"qty\";d:1;s:10:\"price_unit\";s:0:\"\";s:14:\"price_per_unit\";s:5:\"55.00\";s:5:\"price\";d:55;s:11:\"total_price\";s:5:\"55.00\";s:8:\"venue_id\";s:2:\"53\";s:9:\"vendor_id\";s:2:\"53\";s:10:\"package_id\";s:2:\"20\";s:4:\"name\";s:19:\"Birthday decoration\";s:10:\"venue_name\";s:19:\"Birthday decoration\";s:13:\"venue_name_ar\";s:30:\"وسام عيد الميلاد\";s:12:\"package_name\";s:11:\"B Package 2\";s:15:\"package_name_ar\";s:21:\"المجموعة ب 2\";s:4:\"type\";s:7:\"service\";s:9:\"eventdate\";s:10:\"2020-05-28\";s:11:\"total_seats\";s:0:\"\";s:8:\"latitude\";s:10:\"24.8607343\";s:9:\"longitude\";s:10:\"67.0011364\";s:7:\"options\";a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:10:\"2020-05-28\";i:3;s:7:\"service\";}s:5:\"image\";s:0:\"\";s:5:\"rowid\";s:32:\"a32ab74e4b2eaa33b729aaf1e9ba1316\";s:8:\"subtotal\";d:55;}}'),
('kn79mclb123qnskh5pnhg8nptq3vti6b','::1',1589327417,'__ci_last_regenerate|i:1589327417;'),
('fkd6f4gi164mmafmckuk1pebcse72ldi','::1',1589328846,'__ci_last_regenerate|i:1589328846;'),
('m8snqlmus61un6hf7csk5im8rntjmono','::1',1589330936,'__ci_last_regenerate|i:1589330936;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"83\";s:8:\"fullname\";s:5:\"Aliza\";s:5:\"email\";s:20:\"aliza.test18@abc.com\";s:5:\"phone\";s:12:\"030-092-5988\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:10:\"pr-im2.png\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"0\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";s:0:\"\";s:10:\"created_at\";s:19:\"2020-05-13 02:15:55\";s:11:\"modified_at\";s:19:\"0000-00-00 00:00:00\";}user_id|s:2:\"83\";platform_type|s:6:\"custom\";role|s:1:\"1\";name|s:5:\"Aliza\";'),
('3ha2iaus47ldaf8bjd91aj9f6fak8fnu','::1',1589993979,'__ci_last_regenerate|i:1589993979;'),
('gd1an65igjjbv7j9826iifs3s2trj8n7','::1',1589994315,'__ci_last_regenerate|i:1589994315;'),
('ssv52vgpp5bi6at5c8b49nlc3d4itgbc','::1',1589996519,'__ci_last_regenerate|i:1589996519;'),
('lg388km8js75tlm44ied0do7brkorakj','::1',1589996879,'__ci_last_regenerate|i:1589996879;'),
('kk64813fn0qb4d8a6cf28uo574bopbo5','::1',1589997531,'__ci_last_regenerate|i:1589997531;'),
('vm7fff67hscmt2ltk6c5h402dkfqrgkr','::1',1590003099,'__ci_last_regenerate|i:1590003099;'),
('tesbq0dp75sbjnno0qs4eck8j1vd5p8j','::1',1590003621,'__ci_last_regenerate|i:1590003621;'),
('sq0ecvluv537gisjk1pnrfnmk5ri23kf','::1',1590004307,'__ci_last_regenerate|i:1590004307;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"52\";s:8:\"fullname\";s:4:\"Sami\";s:5:\"email\";s:23:\"samreenquyyum@gmail.com\";s:5:\"phone\";s:12:\"031-092-5620\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:22:\"sami-52-1586008001.jpg\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";s:0:\"\";s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 14:59:24\";s:11:\"modified_at\";s:19:\"2020-04-02 04:42:34\";}user_id|s:2:\"52\";role|s:1:\"1\";name|s:4:\"Sami\";platform_type|s:6:\"custom\";'),
('hvi6rnhrgmc72a2rfbhtat43dron5uok','::1',1590004823,'__ci_last_regenerate|i:1590004823;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"52\";s:8:\"fullname\";s:4:\"Sami\";s:5:\"email\";s:23:\"samreenquyyum@gmail.com\";s:5:\"phone\";s:12:\"031-092-5620\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:22:\"sami-52-1586008001.jpg\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";s:0:\"\";s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 14:59:24\";s:11:\"modified_at\";s:19:\"2020-04-02 04:42:34\";}user_id|s:2:\"52\";role|s:1:\"1\";name|s:4:\"Sami\";platform_type|s:6:\"custom\";'),
('cff3tc5iqt5r9b6728c561t4sq96ka96','::1',1590005305,'__ci_last_regenerate|i:1590005305;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"52\";s:8:\"fullname\";s:4:\"Sami\";s:5:\"email\";s:23:\"samreenquyyum@gmail.com\";s:5:\"phone\";s:12:\"031-092-5620\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:22:\"sami-52-1586008001.jpg\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";s:0:\"\";s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 14:59:24\";s:11:\"modified_at\";s:19:\"2020-04-02 04:42:34\";}user_id|s:2:\"52\";role|s:1:\"1\";name|s:4:\"Sami\";platform_type|s:6:\"custom\";'),
('4blm0tspm8b6t3a0qj6a79n9jca3deaf','::1',1590006259,'__ci_last_regenerate|i:1590006259;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"52\";s:8:\"fullname\";s:4:\"Sami\";s:5:\"email\";s:23:\"samreenquyyum@gmail.com\";s:5:\"phone\";s:12:\"031-092-5620\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:22:\"sami-52-1586008001.jpg\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";s:0:\"\";s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 14:59:24\";s:11:\"modified_at\";s:19:\"2020-04-02 04:42:34\";}user_id|s:2:\"52\";role|s:1:\"1\";name|s:4:\"Sami\";platform_type|s:6:\"custom\";'),
('2ep69l3ea491fiop61s535ot7cc587d3','::1',1590006707,'__ci_last_regenerate|i:1590006707;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"52\";s:8:\"fullname\";s:4:\"Sami\";s:5:\"email\";s:23:\"samreenquyyum@gmail.com\";s:5:\"phone\";s:12:\"031-092-5620\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:22:\"sami-52-1586008001.jpg\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";s:0:\"\";s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 14:59:24\";s:11:\"modified_at\";s:19:\"2020-04-02 04:42:34\";}user_id|s:2:\"52\";role|s:1:\"1\";name|s:4:\"Sami\";platform_type|s:6:\"custom\";'),
('3os0lq1v2hkau5aujpjmkituesia6v22','::1',1590006707,'__ci_last_regenerate|i:1590006707;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"52\";s:8:\"fullname\";s:4:\"Sami\";s:5:\"email\";s:23:\"samreenquyyum@gmail.com\";s:5:\"phone\";s:12:\"031-092-5620\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:22:\"sami-52-1586008001.jpg\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";s:0:\"\";s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 14:59:24\";s:11:\"modified_at\";s:19:\"2020-04-02 04:42:34\";}user_id|s:2:\"52\";role|s:1:\"1\";name|s:4:\"Sami\";platform_type|s:6:\"custom\";'),
('srsgrtep9eut2kjs8p7p8kn5noe0s2aq','::1',1590181570,'__ci_last_regenerate|i:1590181570;'),
('gjf9u91qqldr99pv6dbhli6bemidt4uu','::1',1590181875,'__ci_last_regenerate|i:1590181875;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"52\";s:8:\"fullname\";s:4:\"Sami\";s:5:\"email\";s:23:\"samreenquyyum@gmail.com\";s:5:\"phone\";s:12:\"031-092-5620\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:22:\"sami-52-1586008001.jpg\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";s:0:\"\";s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 14:59:24\";s:11:\"modified_at\";s:19:\"2020-04-02 04:42:34\";}user_id|s:2:\"52\";role|s:1:\"1\";name|s:4:\"Sami\";platform_type|s:6:\"custom\";'),
('rsb341ilp1qvc1gun0kh9j0st98q367p','::1',1590182346,'__ci_last_regenerate|i:1590182346;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"52\";s:8:\"fullname\";s:4:\"Sami\";s:5:\"email\";s:23:\"samreenquyyum@gmail.com\";s:5:\"phone\";s:12:\"031-092-5620\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:22:\"sami-52-1586008001.jpg\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";s:0:\"\";s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 14:59:24\";s:11:\"modified_at\";s:19:\"2020-04-02 04:42:34\";}user_id|s:2:\"52\";role|s:1:\"1\";name|s:4:\"Sami\";platform_type|s:6:\"custom\";'),
('3tqo2k6odio940rnvpmd4vum6fv6k30q','::1',1590182676,'__ci_last_regenerate|i:1590182676;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"52\";s:8:\"fullname\";s:4:\"Sami\";s:5:\"email\";s:23:\"samreenquyyum@gmail.com\";s:5:\"phone\";s:12:\"031-092-5620\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:22:\"sami-52-1586008001.jpg\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";s:0:\"\";s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 14:59:24\";s:11:\"modified_at\";s:19:\"2020-04-02 04:42:34\";}user_id|s:2:\"52\";role|s:1:\"1\";name|s:4:\"Sami\";platform_type|s:6:\"custom\";'),
('nlgegv4hsgm774vjr7pe3jcbr2p6cggb','::1',1590184322,'__ci_last_regenerate|i:1590184322;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"52\";s:8:\"fullname\";s:4:\"Sami\";s:5:\"email\";s:23:\"samreenquyyum@gmail.com\";s:5:\"phone\";s:12:\"031-092-5620\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:22:\"sami-52-1586008001.jpg\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";s:0:\"\";s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 14:59:24\";s:11:\"modified_at\";s:19:\"2020-04-02 04:42:34\";}user_id|s:2:\"52\";role|s:1:\"1\";name|s:4:\"Sami\";platform_type|s:6:\"custom\";'),
('884gsrblpmspcfhdjtqdhc5dbha9ivt5','::1',1590184624,'__ci_last_regenerate|i:1590184624;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"52\";s:8:\"fullname\";s:4:\"Sami\";s:5:\"email\";s:23:\"samreenquyyum@gmail.com\";s:5:\"phone\";s:12:\"031-092-5620\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:22:\"sami-52-1586008001.jpg\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";s:0:\"\";s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 14:59:24\";s:11:\"modified_at\";s:19:\"2020-04-02 04:42:34\";}user_id|s:2:\"52\";role|s:1:\"1\";name|s:4:\"Sami\";platform_type|s:6:\"custom\";'),
('53jjbl300slu3lpmt0tb5toqfau8shq7','::1',1590185355,'__ci_last_regenerate|i:1590185355;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"52\";s:8:\"fullname\";s:4:\"Sami\";s:5:\"email\";s:23:\"samreenquyyum@gmail.com\";s:5:\"phone\";s:12:\"031-092-5620\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:22:\"sami-52-1586008001.jpg\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";s:0:\"\";s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 14:59:24\";s:11:\"modified_at\";s:19:\"2020-04-02 04:42:34\";}user_id|s:2:\"52\";role|s:1:\"1\";name|s:4:\"Sami\";platform_type|s:6:\"custom\";'),
('95if6bkqrit0imcmnv6lvj7sbkp5dhm5','::1',1590189827,'__ci_last_regenerate|i:1590189827;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"53\";s:8:\"fullname\";s:5:\"Waqas\";s:5:\"email\";s:18:\"waqas.test@abc.com\";s:5:\"phone\";s:12:\"300-345-8765\";s:9:\"user_type\";s:1:\"2\";s:8:\"user_img\";s:23:\"waqas-53-1588542728.jpg\";s:7:\"package\";s:1:\"2\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 16:13:07\";s:11:\"modified_at\";s:19:\"2020-05-04 12:19:45\";}user_id|s:2:\"53\";role|s:1:\"2\";name|s:5:\"Waqas\";platform_type|s:6:\"custom\";'),
('99n4ulj6c00giu6igddbp9h1arg0kaji','::1',1590192066,'__ci_last_regenerate|i:1590192066;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"53\";s:8:\"fullname\";s:5:\"Waqas\";s:5:\"email\";s:18:\"waqas.test@abc.com\";s:5:\"phone\";s:12:\"300-345-8765\";s:9:\"user_type\";s:1:\"2\";s:8:\"user_img\";s:23:\"waqas-53-1588542728.jpg\";s:7:\"package\";s:1:\"2\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 16:13:07\";s:11:\"modified_at\";s:19:\"2020-05-04 12:19:45\";}user_id|s:2:\"53\";role|s:1:\"2\";name|s:5:\"Waqas\";platform_type|s:6:\"custom\";'),
('bh1m8h1bj3lm94hgo24abcsker2batmc','::1',1590193271,'__ci_last_regenerate|i:1590193271;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"53\";s:8:\"fullname\";s:5:\"Waqas\";s:5:\"email\";s:18:\"waqas.test@abc.com\";s:5:\"phone\";s:12:\"300-345-8765\";s:9:\"user_type\";s:1:\"2\";s:8:\"user_img\";s:23:\"waqas-53-1588542728.jpg\";s:7:\"package\";s:1:\"2\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 16:13:07\";s:11:\"modified_at\";s:19:\"2020-05-04 12:19:45\";}user_id|s:2:\"53\";role|s:1:\"2\";name|s:5:\"Waqas\";platform_type|s:6:\"custom\";'),
('cv7nufocm1bi3vhbjb1qrsrvm2t8o2bn','::1',1590193703,'__ci_last_regenerate|i:1590193703;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"53\";s:8:\"fullname\";s:5:\"Waqas\";s:5:\"email\";s:18:\"waqas.test@abc.com\";s:5:\"phone\";s:12:\"300-345-8765\";s:9:\"user_type\";s:1:\"2\";s:8:\"user_img\";s:23:\"waqas-53-1588542728.jpg\";s:7:\"package\";s:1:\"2\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 16:13:07\";s:11:\"modified_at\";s:19:\"2020-05-04 12:19:45\";}user_id|s:2:\"53\";role|s:1:\"2\";name|s:5:\"Waqas\";platform_type|s:6:\"custom\";'),
('7nta4dhreg3t1ed9ljsq8lkg7lk5cbv5','::1',1590195044,'__ci_last_regenerate|i:1590195044;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"53\";s:8:\"fullname\";s:5:\"Waqas\";s:5:\"email\";s:18:\"waqas.test@abc.com\";s:5:\"phone\";s:12:\"300-345-8765\";s:9:\"user_type\";s:1:\"2\";s:8:\"user_img\";s:23:\"waqas-53-1588542728.jpg\";s:7:\"package\";s:1:\"2\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 16:13:07\";s:11:\"modified_at\";s:19:\"2020-05-04 12:19:45\";}user_id|s:2:\"53\";role|s:1:\"2\";name|s:5:\"Waqas\";platform_type|s:6:\"custom\";'),
('da7nhtqaflt69vlgi7vdsoh987rhr00l','::1',1590195550,'__ci_last_regenerate|i:1590195550;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"53\";s:8:\"fullname\";s:5:\"Waqas\";s:5:\"email\";s:18:\"waqas.test@abc.com\";s:5:\"phone\";s:12:\"300-345-8765\";s:9:\"user_type\";s:1:\"2\";s:8:\"user_img\";s:23:\"waqas-53-1588542728.jpg\";s:7:\"package\";s:1:\"2\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 16:13:07\";s:11:\"modified_at\";s:19:\"2020-05-04 12:19:45\";}user_id|s:2:\"53\";role|s:1:\"2\";name|s:5:\"Waqas\";platform_type|s:6:\"custom\";site_lang|s:2:\"en\";'),
('5hor1geqg461cu6irgsmti6utr3i0hgv','::1',1590195965,'__ci_last_regenerate|i:1590195965;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"53\";s:8:\"fullname\";s:5:\"Waqas\";s:5:\"email\";s:18:\"waqas.test@abc.com\";s:5:\"phone\";s:12:\"300-345-8765\";s:9:\"user_type\";s:1:\"2\";s:8:\"user_img\";s:23:\"waqas-53-1588542728.jpg\";s:7:\"package\";s:1:\"2\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 16:13:07\";s:11:\"modified_at\";s:19:\"2020-05-04 12:19:45\";}user_id|s:2:\"53\";role|s:1:\"2\";name|s:5:\"Waqas\";platform_type|s:6:\"custom\";site_lang|s:2:\"en\";'),
('u4eqt96bto1cbvt3rmqg7givkep6jbtj','::1',1590196589,'__ci_last_regenerate|i:1590196589;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"53\";s:8:\"fullname\";s:5:\"Waqas\";s:5:\"email\";s:18:\"waqas.test@abc.com\";s:5:\"phone\";s:12:\"300-345-8765\";s:9:\"user_type\";s:1:\"2\";s:8:\"user_img\";s:23:\"waqas-53-1588542728.jpg\";s:7:\"package\";s:1:\"2\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";N;s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 16:13:07\";s:11:\"modified_at\";s:19:\"2020-05-04 12:19:45\";}user_id|s:2:\"53\";role|s:1:\"2\";name|s:5:\"Waqas\";platform_type|s:6:\"custom\";site_lang|s:2:\"en\";'),
('6p37mf3dgnrgu5d8ope3k0brggneipg3','::1',1590196891,'__ci_last_regenerate|i:1590196891;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"52\";s:8:\"fullname\";s:4:\"Sami\";s:5:\"email\";s:23:\"samreenquyyum@gmail.com\";s:5:\"phone\";s:12:\"031-092-5620\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:22:\"sami-52-1586008001.jpg\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";s:0:\"\";s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 14:59:24\";s:11:\"modified_at\";s:19:\"2020-04-02 04:42:34\";}site_lang|s:2:\"ar\";user_id|s:2:\"52\";role|s:1:\"1\";name|s:4:\"Sami\";platform_type|s:6:\"custom\";'),
('1ikvftmdehe0l7sokou6vvhrbagevulp','::1',1590197308,'__ci_last_regenerate|i:1590197308;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"52\";s:8:\"fullname\";s:4:\"Sami\";s:5:\"email\";s:23:\"samreenquyyum@gmail.com\";s:5:\"phone\";s:12:\"031-092-5620\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:22:\"sami-52-1586008001.jpg\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";s:0:\"\";s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 14:59:24\";s:11:\"modified_at\";s:19:\"2020-04-02 04:42:34\";}site_lang|s:2:\"ar\";user_id|s:2:\"52\";role|s:1:\"1\";name|s:4:\"Sami\";platform_type|s:6:\"custom\";'),
('t01sifff5o2bs00qu4ee9hpn594eek8u','::1',1590198114,'__ci_last_regenerate|i:1590198114;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"52\";s:8:\"fullname\";s:4:\"Sami\";s:5:\"email\";s:23:\"samreenquyyum@gmail.com\";s:5:\"phone\";s:12:\"031-092-5620\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:22:\"sami-52-1586008001.jpg\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";s:0:\"\";s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 14:59:24\";s:11:\"modified_at\";s:19:\"2020-04-02 04:42:34\";}site_lang|s:2:\"en\";'),
('c4nj2uh26eiva3724boa9ktstm5jfc6d','::1',1590198114,'__ci_last_regenerate|i:1590198114;user|O:8:\"stdClass\":14:{s:2:\"id\";s:2:\"52\";s:8:\"fullname\";s:4:\"Sami\";s:5:\"email\";s:23:\"samreenquyyum@gmail.com\";s:5:\"phone\";s:12:\"031-092-5620\";s:9:\"user_type\";s:1:\"1\";s:8:\"user_img\";s:22:\"sami-52-1586008001.jpg\";s:7:\"package\";s:1:\"1\";s:6:\"status\";s:1:\"1\";s:13:\"platform_type\";s:6:\"custom\";s:11:\"platform_id\";N;s:16:\"forget_pass_code\";s:0:\"\";s:15:\"activation_code\";N;s:10:\"created_at\";s:19:\"2020-03-12 14:59:24\";s:11:\"modified_at\";s:19:\"2020-04-02 04:42:34\";}site_lang|s:2:\"en\";'),
('qtupinegekt8s4lbq79lt4363lnh2ral','::1',1590701762,'__ci_last_regenerate|i:1590701489;cart_contents|a:3:{s:10:\"cart_total\";d:0;s:11:\"total_items\";d:1;s:32:\"8b4431483223da7e642c628ed4a5541c\";a:23:{s:2:\"id\";s:2:\"54\";s:3:\"qty\";d:1;s:10:\"price_unit\";s:0:\"\";s:14:\"price_per_unit\";s:0:\"\";s:5:\"price\";d:0;s:11:\"total_price\";s:0:\"\";s:8:\"venue_id\";s:2:\"54\";s:9:\"vendor_id\";s:2:\"53\";s:10:\"package_id\";s:0:\"\";s:4:\"name\";s:13:\"Shadi Mubarak\";s:10:\"venue_name\";s:13:\"Shadi Mubarak\";s:13:\"venue_name_ar\";s:19:\"شادي مبارك\";s:12:\"package_name\";s:0:\"\";s:15:\"package_name_ar\";s:0:\"\";s:4:\"type\";s:5:\"venue\";s:9:\"eventdate\";s:10:\"2020-05-25\";s:11:\"total_seats\";s:1:\"1\";s:8:\"latitude\";s:10:\"24.8741328\";s:9:\"longitude\";s:10:\"67.0993881\";s:7:\"options\";a:4:{i:0;s:0:\"\";i:1;s:1:\"1\";i:2;s:10:\"2020-05-25\";i:3;s:5:\"venue\";}s:5:\"image\";s:37:\"shadi-mubarak_716IOaeXW6L__SY355_.jpg\";s:5:\"rowid\";s:32:\"8b4431483223da7e642c628ed4a5541c\";s:8:\"subtotal\";d:0;}}'),
('7k8l2ikdmsgm0bfuc1dsbitbqp13flh3','::1',1590704177,'__ci_last_regenerate|i:1590704166;site_lang|s:2:\"ar\";'),
('hnc1iso9t6sg8v24864lhujsbbsi9r84','::1',1590880468,'__ci_last_regenerate|i:1590880468;'),
('tbdd9hs78eo4s9333e8pbrl64cj7kt2s','::1',1590881469,'__ci_last_regenerate|i:1590881469;'),
('f5ia87ub12deejmqp29iiscrr6spcjql','::1',1590882204,'__ci_last_regenerate|i:1590882204;cart_contents|a:3:{s:10:\"cart_total\";d:-200;s:11:\"total_items\";d:1;s:32:\"360ae1623a4ac6eb194b95181bf60f96\";a:23:{s:2:\"id\";s:2:\"35\";s:3:\"qty\";d:1;s:10:\"price_unit\";s:7:\"perseat\";s:14:\"price_per_unit\";s:6:\"200.00\";s:5:\"price\";d:-200;s:11:\"total_price\";d:-200;s:8:\"venue_id\";s:2:\"35\";s:9:\"vendor_id\";s:2:\"14\";s:10:\"package_id\";s:0:\"\";s:4:\"name\";s:8:\"Hill top\";s:10:\"venue_name\";s:8:\"Hill top\";s:13:\"venue_name_ar\";s:17:\"أعلى التل\";s:12:\"package_name\";s:0:\"\";s:15:\"package_name_ar\";s:0:\"\";s:4:\"type\";s:5:\"venue\";s:9:\"eventdate\";s:10:\"2020-06-03\";s:11:\"total_seats\";s:2:\"-1\";s:8:\"latitude\";s:7:\"24.8607\";s:9:\"longitude\";s:7:\"67.0011\";s:7:\"options\";a:4:{i:0;s:0:\"\";i:1;s:2:\"-1\";i:2;s:10:\"2020-06-03\";i:3;s:5:\"venue\";}s:5:\"image\";s:23:\"hill-top_decoration.png\";s:5:\"rowid\";s:32:\"360ae1623a4ac6eb194b95181bf60f96\";s:8:\"subtotal\";d:-200;}}'),
('239vf8jti3b5ed2jmc4bqd8h7k9i6n4o','::1',1590882545,'__ci_last_regenerate|i:1590882545;cart_contents|a:3:{s:10:\"cart_total\";d:10000;s:11:\"total_items\";d:1;s:32:\"b196bee756aea91b99e26033158a2934\";a:23:{s:2:\"id\";s:2:\"35\";s:3:\"qty\";d:1;s:10:\"price_unit\";s:7:\"perseat\";s:14:\"price_per_unit\";s:6:\"200.00\";s:5:\"price\";d:10000;s:11:\"total_price\";d:10000;s:8:\"venue_id\";s:2:\"35\";s:9:\"vendor_id\";s:2:\"14\";s:10:\"package_id\";s:0:\"\";s:4:\"name\";s:8:\"Hill top\";s:10:\"venue_name\";s:8:\"Hill top\";s:13:\"venue_name_ar\";s:17:\"أعلى التل\";s:12:\"package_name\";s:0:\"\";s:15:\"package_name_ar\";s:0:\"\";s:4:\"type\";s:5:\"venue\";s:9:\"eventdate\";s:10:\"2020-06-05\";s:11:\"total_seats\";s:2:\"50\";s:8:\"latitude\";s:7:\"24.8607\";s:9:\"longitude\";s:7:\"67.0011\";s:7:\"options\";a:4:{i:0;s:0:\"\";i:1;s:2:\"50\";i:2;s:10:\"2020-06-05\";i:3;s:5:\"venue\";}s:5:\"image\";s:23:\"hill-top_decoration.png\";s:5:\"rowid\";s:32:\"b196bee756aea91b99e26033158a2934\";s:8:\"subtotal\";d:10000;}}'),
('7u8vg7e8on657qmjmifllbik4o5n6b2f','::1',1590882975,'__ci_last_regenerate|i:1590882975;cart_contents|a:3:{s:10:\"cart_total\";d:120000;s:11:\"total_items\";d:1;s:32:\"9867104310bcfa5f114cc76d83c6ab6f\";a:23:{s:2:\"id\";s:1:\"7\";s:3:\"qty\";d:1;s:10:\"price_unit\";s:6:\"perday\";s:14:\"price_per_unit\";s:9:\"120000.00\";s:5:\"price\";d:120000;s:11:\"total_price\";s:9:\"120000.00\";s:8:\"venue_id\";s:1:\"7\";s:9:\"vendor_id\";s:1:\"2\";s:10:\"package_id\";s:0:\"\";s:4:\"name\";s:16:\"First Venue here\";s:10:\"venue_name\";s:16:\"First Venue here\";s:13:\"venue_name_ar\";s:30:\"المكان الأول هنا\";s:12:\"package_name\";s:0:\"\";s:15:\"package_name_ar\";s:0:\"\";s:4:\"type\";s:5:\"venue\";s:9:\"eventdate\";s:10:\"2020-06-03\";s:11:\"total_seats\";s:1:\"1\";s:8:\"latitude\";s:7:\"24.8607\";s:9:\"longitude\";s:7:\"67.0011\";s:7:\"options\";a:4:{i:0;s:0:\"\";i:1;s:1:\"1\";i:2;s:10:\"2020-06-03\";i:3;s:5:\"venue\";}s:5:\"image\";s:12:\"aaa_img1.png\";s:5:\"rowid\";s:32:\"9867104310bcfa5f114cc76d83c6ab6f\";s:8:\"subtotal\";d:120000;}}'),
('sp8dakt9e31v53mcf0lrqbrm8ipqieha','::1',1590883046,'__ci_last_regenerate|i:1590882975;cart_contents|a:4:{s:10:\"cart_total\";d:124000;s:11:\"total_items\";d:2;s:32:\"9867104310bcfa5f114cc76d83c6ab6f\";a:23:{s:2:\"id\";s:1:\"7\";s:3:\"qty\";d:1;s:10:\"price_unit\";s:6:\"perday\";s:14:\"price_per_unit\";s:9:\"120000.00\";s:5:\"price\";d:120000;s:11:\"total_price\";s:9:\"120000.00\";s:8:\"venue_id\";s:1:\"7\";s:9:\"vendor_id\";s:1:\"2\";s:10:\"package_id\";s:0:\"\";s:4:\"name\";s:16:\"First Venue here\";s:10:\"venue_name\";s:16:\"First Venue here\";s:13:\"venue_name_ar\";s:30:\"المكان الأول هنا\";s:12:\"package_name\";s:0:\"\";s:15:\"package_name_ar\";s:0:\"\";s:4:\"type\";s:5:\"venue\";s:9:\"eventdate\";s:10:\"2020-06-03\";s:11:\"total_seats\";s:1:\"1\";s:8:\"latitude\";s:7:\"24.8607\";s:9:\"longitude\";s:7:\"67.0011\";s:7:\"options\";a:4:{i:0;s:0:\"\";i:1;s:1:\"1\";i:2;s:10:\"2020-06-03\";i:3;s:5:\"venue\";}s:5:\"image\";s:12:\"aaa_img1.png\";s:5:\"rowid\";s:32:\"9867104310bcfa5f114cc76d83c6ab6f\";s:8:\"subtotal\";d:120000;}s:32:\"5dda551deea8ea532dc47938331cbdf6\";a:23:{s:2:\"id\";s:2:\"35\";s:3:\"qty\";d:1;s:10:\"price_unit\";s:7:\"perseat\";s:14:\"price_per_unit\";s:6:\"200.00\";s:5:\"price\";d:4000;s:11:\"total_price\";d:4000;s:8:\"venue_id\";s:2:\"35\";s:9:\"vendor_id\";s:2:\"14\";s:10:\"package_id\";s:0:\"\";s:4:\"name\";s:8:\"Hill top\";s:10:\"venue_name\";s:8:\"Hill top\";s:13:\"venue_name_ar\";s:17:\"أعلى التل\";s:12:\"package_name\";s:0:\"\";s:15:\"package_name_ar\";s:0:\"\";s:4:\"type\";s:5:\"venue\";s:9:\"eventdate\";s:10:\"2020-06-06\";s:11:\"total_seats\";s:2:\"20\";s:8:\"latitude\";s:7:\"24.8607\";s:9:\"longitude\";s:7:\"67.0011\";s:7:\"options\";a:4:{i:0;s:0:\"\";i:1;s:2:\"20\";i:2;s:10:\"2020-06-06\";i:3;s:5:\"venue\";}s:5:\"image\";s:23:\"hill-top_decoration.png\";s:5:\"rowid\";s:32:\"5dda551deea8ea532dc47938331cbdf6\";s:8:\"subtotal\";d:4000;}}');

/*Table structure for table `cms_pages` */

DROP TABLE IF EXISTS `cms_pages`;

CREATE TABLE `cms_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(50) DEFAULT NULL,
  `title` varchar(125) DEFAULT NULL,
  `title_ar` varchar(225) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `description_ar` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `cms_pages` */

insert  into `cms_pages`(`id`,`slug`,`title`,`title_ar`,`description`,`description_ar`,`status`,`created_at`,`modified_at`) values 
(1,'about-us','About Us','معلومات عنا','<p>We have only admin login through this we can only view the details as it shows a dashboard\r\nthere is a menu icon at top right that is showing an option to manage user\r\nthrough which a user can be added or edited to system..</p>','<p> لدينا فقط تسجيل دخول المسؤول من خلال هذا يمكننا فقط عرض التفاصيل لأنها تعرض لوحة تحكم\r\nيوجد رمز قائمة في أعلى اليمين يعرض خيارًا لإدارة المستخدم\r\nمن خلالها يمكن إضافة المستخدم أو تحريره إلى النظام .. </p>',1,'2020-03-26 17:55:00','2020-05-29 00:06:10'),
(2,'privacy-policy','Privacy Policy','سياسة الخصوصية','<p>We have only admin login through this we can only view the details as it shows a dashboard\r\nthere is a menu icon at top right that is showing an option to manage user\r\nthrough which a user can be added or edited to system..</p>\r\n\r\n<p>We have only admin login through this we can only view the details as it shows a dashboard\r\nthere is a menu icon at top right that is showing an option to manage user\r\nthrough which a user can be added or edited to system..</p>\r\n\r\n<p>We have only admin login through this we can only view the details as it shows a dashboard\r\nthere is a menu icon at top right that is showing an option to manage user\r\nthrough which a user can be added or edited to system..</p>\r\n\r\n<p>We have only admin login through this we can only view the details as it shows a dashboard\r\nthere is a menu icon at top right that is showing an option to manage user\r\nthrough which a user can be added or edited to system..</p>','<p> لدينا فقط تسجيل دخول المسؤول من خلال هذا يمكننا فقط عرض التفاصيل لأنها تعرض لوحة تحكم\r\nيوجد رمز قائمة في أعلى اليمين يعرض خيارًا لإدارة المستخدم\r\nمن خلالها يمكن إضافة المستخدم أو تحريره إلى النظام .. </p>\r\n\r\n<p> لدينا فقط تسجيل دخول المسؤول من خلال هذا يمكننا فقط عرض التفاصيل لأنها تعرض لوحة تحكم\r\nيوجد رمز قائمة في أعلى اليمين يعرض خيارًا لإدارة المستخدم\r\nمن خلالها يمكن إضافة المستخدم أو تحريره إلى النظام .. </p>\r\n\r\n<p> لدينا فقط تسجيل دخول المسؤول من خلال هذا يمكننا فقط عرض التفاصيل لأنها تعرض لوحة تحكم\r\nيوجد رمز قائمة في أعلى اليمين يعرض خيارًا لإدارة المستخدم\r\nمن خلالها يمكن إضافة المستخدم أو تحريره إلى النظام .. </p>\r\n\r\n<p> لدينا فقط تسجيل دخول المسؤول من خلال هذا يمكننا فقط عرض التفاصيل لأنها تعرض لوحة تحكم\r\nيوجد رمز قائمة في أعلى اليمين يعرض خيارًا لإدارة المستخدم\r\nمن خلالها يمكن إضافة المستخدم أو تحريره إلى النظام .. </p>',1,'2020-03-26 18:55:00',NULL),
(3,'terms-condition','Terms & Condition','الشروط والاحكام','<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five \r\ncenturies, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five \r\ncenturies, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five \r\ncenturies, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five \r\ncenturies, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n\r\n\r\n','<p> لدينا فقط تسجيل دخول المسؤول من خلال هذا يمكننا فقط عرض التفاصيل لأنها تعرض لوحة تحكم\r\nيوجد رمز قائمة في أعلى اليمين يعرض خيارًا لإدارة المستخدم\r\nمن خلالها يمكن إضافة المستخدم أو تحريره إلى النظام .. </p>\r\n\r\n<p> لدينا فقط تسجيل دخول المسؤول من خلال هذا يمكننا فقط عرض التفاصيل لأنها تعرض لوحة تحكم\r\nيوجد رمز قائمة في أعلى اليمين يعرض خيارًا لإدارة المستخدم\r\nمن خلالها يمكن إضافة المستخدم أو تحريره إلى النظام .. </p>\r\n\r\n<p> لدينا فقط تسجيل دخول المسؤول من خلال هذا يمكننا فقط عرض التفاصيل لأنها تعرض لوحة تحكم\r\nيوجد رمز قائمة في أعلى اليمين يعرض خيارًا لإدارة المستخدم\r\nمن خلالها يمكن إضافة المستخدم أو تحريره إلى النظام .. </p>\r\n\r\n<p> لدينا فقط تسجيل دخول المسؤول من خلال هذا يمكننا فقط عرض التفاصيل لأنها تعرض لوحة تحكم\r\nيوجد رمز قائمة في أعلى اليمين يعرض خيارًا لإدارة المستخدم\r\nمن خلالها يمكن إضافة المستخدم أو تحريره إلى النظام .. </p>',1,'2020-03-26 20:55:00',NULL);

/*Table structure for table `contact_us` */

DROP TABLE IF EXISTS `contact_us`;

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(125) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `subject` varchar(225) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `contact_us` */

insert  into `contact_us`(`id`,`full_name`,`email`,`subject`,`message`,`status`,`created_at`,`modified_at`) values 
(1,'Kubra',NULL,'Hi! I am testing','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley ',NULL,NULL,NULL),
(2,'Sultan',NULL,'Hi! I am testing','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley ',1,'2020-03-30 11:09:41',NULL);

/*Table structure for table `gallery` */

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `venue_id` double NOT NULL,
  `pkg_id` int(11) NOT NULL DEFAULT 0,
  `image_name` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

/*Data for the table `gallery` */

insert  into `gallery`(`id`,`venue_id`,`pkg_id`,`image_name`,`create_at`) values 
(8,7,0,'aaa_img1.png','2020-01-28 05:22:21'),
(9,7,0,'aaa_IMG-20190425-WA0015.jpg','2020-01-28 05:22:21'),
(10,7,0,'aaa_IMG-20190425-WA0016.jpg','2020-01-28 05:22:21'),
(11,15,12,'5e5109197cd23Package_1.png','2020-02-22 15:57:29'),
(12,15,0,'5e510bdb6f074_Image_64.png','2020-02-22 16:09:15'),
(13,15,0,'5e510bdb6f074_Image_66.png','2020-02-22 16:09:15'),
(14,18,17,'5e513c55eb1fcpackage_me_1.png','2020-02-22 19:36:05'),
(15,18,0,'5e513c82c8d0a_Image_51.png','2020-02-22 19:36:50'),
(16,18,0,'5e513c82c8d0a_Image_52.png','2020-02-22 19:36:50'),
(17,18,0,'5e513c82c8d0a_Image_60.png','2020-02-22 19:36:50'),
(18,19,20,'5e53a7fbd592fDesgin_pkg_1.png','2020-02-24 15:39:55'),
(19,19,0,'5e53a80dac564_Group_204@2x.png','2020-02-24 15:40:13'),
(20,20,23,'5e56a9c40490cpackage_1.jpg','2020-02-26 22:24:20'),
(21,21,25,'5e56dca75b3a3Pkg1.png','2020-02-27 02:01:27'),
(24,21,28,'5e5700fe750a5Package_1.png','2020-02-27 04:36:30'),
(25,21,32,'5e5702c24e8b6Package_2.png','2020-02-27 04:44:02'),
(27,21,0,'5e572ad900bfc_Image_58.png','2020-02-27 07:35:05'),
(29,23,35,'5e57b45801226pack_1.jpg','2020-02-27 17:21:44'),
(30,30,0,'absdbj_IMG-20200226-WA0007.jpg','2020-02-27 17:38:35'),
(31,31,0,'test4_Group_204@2x.png','2020-02-27 17:38:58'),
(32,32,0,'the-candles_9c01f50987a59c007d04c0a768fd6ebd.jpg','2020-02-27 17:46:48'),
(33,34,0,'test-5_Group_204.png','2020-02-27 18:45:28'),
(34,34,0,'test-5_Group_204@2x.png','2020-02-27 18:45:28'),
(35,34,0,'test-5_ic_profile@2x.png','2020-02-27 18:45:28'),
(36,33,39,'5e57d5d4cbb70package_1.jpg','2020-02-27 19:44:36'),
(37,35,0,'hill-top_decoration.png','2020-02-27 19:48:54'),
(38,21,0,'5e5d7eaac037a_Image_65.png','2020-03-03 02:46:18'),
(39,21,0,'5e5d7eaac037a_Image_66.png','2020-03-03 02:46:18'),
(40,21,0,'5e5d7eaac037a_shutterstock_317683823.png','2020-03-03 02:46:18'),
(41,21,0,'5e5d7eaac037a_shutterstock_1152832184.png','2020-03-03 02:46:18'),
(42,36,0,'abctesrhdj_IMG-20200228-WA0008.jpg','2020-03-05 13:37:24'),
(43,36,0,'abctesrhdj_IMG-20200228-WA0007.jpg','2020-03-05 13:37:24'),
(44,36,0,'abctesrhdj_IMG-20200228-WA0009.jpg','2020-03-05 13:37:24'),
(45,37,40,'5e60c5c0647edPen.jpg','2020-03-05 14:26:24'),
(46,37,0,'5e60c5dd0febf_IMG-20200228-WA0013.jpg','2020-03-05 14:26:53'),
(47,37,0,'5e60c5dd0febf_IMG-20200228-WA0012.jpg','2020-03-05 14:26:53'),
(48,37,0,'5e60c5dd0febf_IMG-20200228-WA0011.jpg','2020-03-05 14:26:53'),
(49,39,0,'test-log_Memowa-logo-presentation_-_logo_1.png','2020-03-06 18:39:38'),
(50,40,0,'test-venue-first_Image_51.png','2020-03-07 19:55:18'),
(52,40,0,'test-venue-first_Image_57.png','2020-03-07 19:55:18'),
(53,40,0,'test-venue-first_Image_58.png','2020-03-07 19:55:18'),
(54,40,0,'test-venue-first_Image_59.png','2020-03-07 19:55:18'),
(55,40,0,'test-venue-first_Image_62.png','2020-03-07 19:55:18'),
(56,41,45,'5e63b89c9df93My_Package_1.png','2020-03-07 20:07:08'),
(57,41,0,'5e63b91e05325_Image_52.png','2020-03-07 20:09:18'),
(58,41,0,'5e63b91e05325_Image_53.png','2020-03-07 20:09:18'),
(59,41,0,'5e63b91e05325_Image_54.png','2020-03-07 20:09:18'),
(60,41,0,'5e63b91e05325_Image_57.png','2020-03-07 20:09:18'),
(61,41,0,'5e63b91e05325_Image_58.png','2020-03-07 20:09:18'),
(62,42,0,'5e63d26d75e88_Image_57.png','2020-03-07 21:57:17'),
(63,42,0,'5e63d2ce30ce0_image-57.png','2020-03-07 21:58:54'),
(64,43,48,'5e64cacdc6e78catering_1.jpg','2020-03-08 15:37:01'),
(65,44,0,'zeeshans-venue_dubai-creek-paddle.jpg','2020-03-08 15:38:23'),
(66,45,50,'5e665e0e31a9earabic_buffet.jpg','2020-03-09 20:17:34'),
(67,45,0,'5e665e25e2d90_istockphoto-948597796-612x612.jpg','2020-03-09 20:17:57'),
(68,46,0,'saads-buffet_world-buffet-at-bolton.jpg','2020-03-09 20:23:33'),
(69,47,0,'saads-buffet-palace-2_istockphoto-948597796-612x612.jpg','2020-03-09 20:56:13'),
(70,48,0,'5e66a7bdb0b67_Image_60.png','2020-03-10 01:31:57'),
(71,48,0,'5e66a7bdb0b67_Image_61.png','2020-03-10 01:31:57'),
(72,48,0,'5e66a7bdb0b67_Image_62.png','2020-03-10 01:31:57'),
(73,48,53,'5e66a7e43ae22service_1_.png','2020-03-10 01:32:36'),
(74,48,56,'5e66a8041bbbdservice2.png','2020-03-10 01:33:08'),
(75,49,0,'test-venue-now_Image_51.png','2020-03-10 02:11:07'),
(76,21,57,'5e67073471367test.png','2020-03-10 08:19:16'),
(77,50,58,'5e6a4b5407819First_Package.jpeg','2020-03-12 15:46:44'),
(78,50,0,'5e6a4b782070a_1498223398-IMG-20170623-WA0015.jpg','2020-03-12 15:47:20'),
(79,50,0,'5e6a4b782070a_716IOaeXW6L__SY355_.jpg','2020-03-12 15:47:20'),
(80,51,59,'5e6a5255e0ef4First_2020_Package.jpg','2020-03-12 16:16:38'),
(81,51,60,'5e6a52806f6deSecond_2020_Package.jpg','2020-03-12 16:17:20'),
(82,51,0,'5e6a52d694e2b_super-mario-theme-entrance-decoration.jpg','2020-03-12 16:18:46'),
(83,52,0,'decoration-event_super-mario-theme-entrance-decoration.jpg','2020-03-12 17:11:17'),
(84,53,61,'5e6accdba1bbeBirthday_Package_1.jpg','2020-03-13 00:59:23'),
(85,53,62,'5e6acd132056fB_Package_2.jpg','2020-03-13 01:00:19'),
(86,53,0,'5e6acd5c3cab4_birthday_decoration_combo_kit_-_black_golden.jpg','2020-03-13 01:01:32'),
(87,53,0,'5e6acd5c3cab4_decoration-ideas-for-birthday-with-balloons-1.jpg','2020-03-13 01:01:32'),
(88,54,0,'shadi-mubarak_716IOaeXW6L__SY355_.jpg','2020-03-21 23:18:29'),
(89,55,63,'5e769324e9452First_Package.jpg','2020-03-21 23:20:20'),
(90,56,0,'test-april-2020_screen-4.jpg','2020-04-04 15:51:38'),
(91,56,0,'test-april-2020_1498223398-IMG-20170623-WA0015.jpg','2020-04-04 15:51:38'),
(92,58,64,'5e8f517f1a23fPackage_Silver.jpg','2020-04-09 18:46:55'),
(93,59,65,'5e8fa39031372Rocky_Project_Online.jpeg','2020-04-10 00:37:04'),
(94,52,0,'decoration-event_1440by350bannerImage3.jpg','2020-04-21 14:50:58'),
(95,52,0,'decoration-event_1440by350bannerImage4.jpg','2020-04-21 14:50:58'),
(96,51,67,'5eaf46089e8feTest_May_Package.jpg','2020-05-04 00:30:32'),
(97,51,69,'','2020-05-07 23:27:26'),
(98,51,70,'5eb5d60012adfmay_test_package.jpg','2020-05-08 23:58:24'),
(99,51,71,'5eb5d63eb3b76test_may_package.jpg','2020-05-08 23:59:26'),
(100,51,72,'5eb5f094dccceDilkhushan_Package.jpg','2020-05-09 01:51:48'),
(101,53,73,'5ec43af77ad98B_Package_3.jpg','2020-05-19 22:00:55');

/*Table structure for table `options` */

DROP TABLE IF EXISTS `options`;

CREATE TABLE `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(50) DEFAULT NULL,
  `option_name` varchar(125) DEFAULT NULL,
  `option_value` text DEFAULT NULL,
  `option_value_ar` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

/*Data for the table `options` */

insert  into `options`(`id`,`page`,`option_name`,`option_value`,`option_value_ar`,`created_at`,`modified_at`) values 
(1,'home','banner_title','Direct Venue Booking','الحجز المباشر للمكان','2020-05-14 02:43:55','2020-05-14 03:05:50'),
(2,'home','section1_title','Discover in our venues types','اكتشف في أنواع أماكننا','2020-05-14 02:46:37','2020-05-14 03:05:50'),
(3,'home','section1_description','Contrary to popular belief, Lorem isn\'t simply random text. It has roots in a of classical Latin<br>\r\nliterature from 45 BC, making it over 2000 years old.','خلافا للاعتقاد الشائع ، لوريم ليس مجرد نص عشوائي. لها جذور لاتينية كلاسيكية <br>\r\nالأدب من 45 قبل الميلاد ، مما يجعلها أكثر من 2000 سنة.','2020-05-14 02:46:42','2020-05-14 03:05:50'),
(4,'home','section2_title','Discover venues in event type','اكتشف الأماكن في نوع الحدث','2020-05-14 02:48:54','2020-05-14 03:05:50'),
(5,'home','section2_description','Contrary to popular belief, Lorem isn\'t simply random text. It has roots in a of classical Latin<br>\r\nliterature from 45 BC, making it over 2000 years old.','خلافا للاعتقاد الشائع ، لوريم ليس مجرد نص عشوائي. لها جذور لاتينية كلاسيكية <br>\r\nالأدب من 45 قبل الميلاد ، مما يجعلها أكثر من 2000 سنة.','2020-05-14 02:50:40','2020-05-14 03:05:50'),
(6,'home','section3_title','Most Popular','الأكثر شعبية','2020-05-14 02:48:54','2020-05-14 03:05:50'),
(7,'home','section3_description','Contrary to popular belief, Lorem isn\'t simply random text. It has roots in a of classical Latin<br>\r\nliterature from 45 BC, making it over 2000 years old.','خلافا للاعتقاد الشائع ، لوريم ليس مجرد نص عشوائي. لها جذور لاتينية كلاسيكية <br>\r\nالأدب من 45 قبل الميلاد ، مما يجعلها أكثر من 2000 سنة.','2020-05-14 02:50:40','2020-05-14 03:05:50'),
(8,'home','section4_title','Services','خدمات','2020-05-14 02:48:54','2020-05-14 03:05:50'),
(9,'home','section4_description','Contrary to popular belief, Lorem isn\'t simply random text. It has roots in a of classical Latin<br>\r\nliterature from 45 BC, making it over 2000 years old.','خلافا للاعتقاد الشائع ، لوريم ليس مجرد نص عشوائي. لها جذور لاتينية كلاسيكية <br>\r\nالأدب من 45 قبل الميلاد ، مما يجعلها أكثر من 2000 سنة.','2020-05-14 02:50:40','2020-05-14 03:05:50'),
(10,'home','section5_title','Testimonials','الشهادات - التوصيات','2020-05-14 02:48:54','2020-05-14 03:05:18'),
(11,'home','section5_description','Contrary to popular belief, Lorem isn\'t simply random text. It has roots in a of classical Latin<br>\r\nliterature from 45 BC, making it over 2000 years old.','خلافا للاعتقاد الشائع ، لوريم ليس مجرد نص عشوائي. لها جذور لاتينية كلاسيكية <br>\r\nالأدب من 45 قبل الميلاد ، مما يجعلها أكثر من 2000 سنة.','2020-05-14 02:50:40','2020-05-14 03:05:18'),
(12,'become-vendor','section1_title','OctoBooking For Every Business','OctoBooking لكل الأعمال','2020-05-15 02:17:06','2020-05-15 02:20:26'),
(13,'become-vendor','section1_description','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum','خلافا للاعتقاد الشائع ، الأدب من 45 قبل الميلاد ، مما يجعلها أكثر من 2000 سنة.','2020-05-15 02:17:12','2020-05-15 02:20:26'),
(14,'become-vendor','section2_title','OctoBooking For Every Business','OctoBooking لكل الأعمال','2020-05-15 02:25:55','2020-05-15 02:20:26'),
(15,'become-vendor','section2_description','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum','خلافا للاعتقاد الشائع ، الأدب من 45 قبل الميلاد ، مما يجعلها أكثر من 2000 سنة.','2020-05-15 02:17:12','2020-05-15 02:20:26'),
(16,'become-vendor','section3_title','Grow your business<br>with OctoBooking','ينمو عملك <br> مع OctoBooking','2020-05-15 02:25:55','2020-05-15 02:20:26'),
(17,'become-vendor','section3_description','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum','خلافا للاعتقاد الشائع ، الأدب من 45 قبل الميلاد ، مما يجعلها أكثر من 2000 سنة.','2020-05-15 02:17:12','2020-05-15 02:20:26'),
(18,'become-vendor','section4_title','Launch your first','إطلاق أول ما لديك','2020-05-15 02:25:55','2020-05-15 02:20:26'),
(19,'become-vendor','section4_description','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum','خلافا للاعتقاد الشائع ، الأدب من 45 قبل الميلاد ، مما يجعلها أكثر من 2000 سنة.','2020-05-15 02:17:12','2020-05-15 02:20:26'),
(20,'become-vendor','section5_title','Pricing Plan','خطة التسعير','2020-05-15 02:25:55','2020-05-15 02:20:26'),
(21,'become-vendor','section5_description','Contrary to popular belief, Lorem isn’t simply random text. It has roots in a of classical Latin literature from 45 BC, making it over 2000 years old.','خلافا للاعتقاد الشائع ، لوريم ليس مجرد نص عشوائي. لها جذور في اللاتينية الكلاسيكية\r\nالأدب من 45 قبل الميلاد ، مما يجعلها أكثر من 2000 سنة.','2020-05-15 02:17:12','2020-05-15 02:20:26'),
(22,'become-vendor','section6_title','Make passive visitors into <br>active participants','اجعل الزوار السلبيين في <br> مشاركين نشطين','2020-05-15 02:25:55','2020-05-15 02:20:26'),
(23,'become-vendor','section6_description','It is a long established fact that a reader will be distracted by the readable content of a page when\r\nlooking at its layout. The point of using Lorem Ipsum is that it','خلافا للاعتقاد الشائع ، الأدب من 45 قبل الميلاد ، مما يجعلها أكثر من 2000 سنة.','2020-05-15 02:17:12','2020-05-15 02:20:26'),
(24,'become-vendor','section2_sub1_title','Attendee<br> Networking','أحد الحضور <br> شبكة',NULL,'2020-05-15 02:20:26'),
(25,'become-vendor','section2_sub1_description','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum','خلافا للاعتقاد الشائع ، الأدب من 45 قبل الميلاد ، مما يجعلها أكثر من 2000 سنة.','2020-05-15 02:17:12','2020-05-15 02:20:26'),
(26,'become-vendor','section2_sub2_title','Keep Everyone <br> Updated','تحديث الجميع <br>',NULL,'2020-05-15 02:20:26'),
(27,'become-vendor','section2_sub2_description','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum','خلافا للاعتقاد الشائع ، الأدب من 45 قبل الميلاد ، مما يجعلها أكثر من 2000 سنة.','2020-05-15 02:17:12','2020-05-15 02:20:26'),
(28,'become-vendor','section2_sub3_title','Get Real<br>time Feedback','احصل على تعليقات في الوقت الحقيقي',NULL,'2020-05-15 02:20:26'),
(29,'become-vendor','section2_sub3_description','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum','خلافا للاعتقاد الشائع ، الأدب من 45 قبل الميلاد ، مما يجعلها أكثر من 2000 سنة.','2020-05-15 02:17:12','2020-05-15 02:20:26'),
(30,'become-vendor','section2_sub4_title','Click based<br>Management ','انقر فوق إدارة <br> القائمة',NULL,'2020-05-15 02:20:26'),
(31,'become-vendor','section2_sub4_description','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum','خلافا للاعتقاد الشائع ، الأدب من 45 قبل الميلاد ، مما يجعلها أكثر من 2000 سنة.','2020-05-15 02:17:12','2020-05-15 02:20:26'),
(32,'become-vendor','section6_sub1_title','Successful event With Real Time Analytics','حدث ناجح مع تحليلات الوقت الحقيقي',NULL,'2020-05-15 02:20:26'),
(33,'become-vendor','section6_sub1_description','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum','خلافا للاعتقاد الشائع ، الأدب من 45 قبل الميلاد ، مما يجعلها أكثر من 2000 سنة.','2020-05-15 02:17:12','2020-05-15 02:20:26'),
(34,'become-vendor','section6_sub2_title','Progress for The Next Event','التقدم للحدث التالي',NULL,'2020-05-15 02:20:26'),
(35,'become-vendor','section6_sub2_description','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum','خلافا للاعتقاد الشائع ، الأدب من 45 قبل الميلاد ، مما يجعلها أكثر من 2000 سنة.','2020-05-15 02:17:12','2020-05-15 02:20:26'),
(36,'become-vendor','section6_sub3_title','Determine Actual Event ROI','تحديد عائد الاستثمار الفعلي للحدث',NULL,'2020-05-15 02:20:26'),
(37,'become-vendor','section6_sub3_description','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum','خلافا للاعتقاد الشائع ، الأدب من 45 قبل الميلاد ، مما يجعلها أكثر من 2000 سنة.','2020-05-15 02:17:12','2020-05-15 02:20:26'),
(38,'become-vendor','section6_sub4_title','OctoBooking For Every Business','OctoBooking لكل الأعمال',NULL,'2020-05-15 02:15:57'),
(39,'become-vendor','section6_sub4_description','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum','خلافا للاعتقاد الشائع ، الأدب من 45 قبل الميلاد ، مما يجعلها أكثر من 2000 سنة.','2020-05-15 02:17:12','2020-05-15 02:15:57');

/*Table structure for table `packages` */

DROP TABLE IF EXISTS `packages`;

CREATE TABLE `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `descr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_venue` int(11) DEFAULT NULL,
  `total_service` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `packages` */

insert  into `packages`(`id`,`name`,`price`,`descr`,`total_venue`,`total_service`,`status`) values 
(1,'basic',100.00,'<ul>\r\n                <li>2 Venues</li>\r\n                <li>4 Services</li>\r\n              </ul>',10,12,1),
(2,'standard',299.99,'<ul>\r\n                <li>4 Venues</li>\r\n                <li>6 Services</li>\r\n              </ul>',14,16,1),
(3,'Premium',499.00,'<ul>\r\n                <li>8 Venues</li>\r\n                <li>12 Services</li>\r\n              </ul>',18,24,1);

/*Table structure for table `rating_reviews` */

DROP TABLE IF EXISTS `rating_reviews`;

CREATE TABLE `rating_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `venue_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `rating_reviews` */

insert  into `rating_reviews`(`id`,`user_id`,`venue_id`,`rating`,`review`,`created_at`) values 
(1,52,35,4,'On his third studio album, Rocky is more experimental and personal. But for music that relies on the New York rapper’s artful intuitions, it’s unfortunate his intuitions are often very basic.','2020-05-28 00:58:28'),
(2,52,35,3,'On his third studio album, Rocky is more experimental and personal. But for music that relies on the New York rapper’s artful intuitions, it’s unfortunate his intuitions are often very basic.','2020-05-20 09:55:26'),
(3,52,35,4,'On his third studio album, Rocky is more experimental and personal. But for music that relies on the New York rapper’s artful intuitions, it’s unfortunate his intuitions are often very basic.','2020-05-20 09:56:09');

/*Table structure for table `reviews` */

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `reviews` */

insert  into `reviews`(`id`,`name`,`title`,`review`,`image`,`status`) values 
(1,'basic','test','Contrary to popular belief, Lorem isn\'t simply random text. It has roots in a of classical Latin<br>\r\nliterature from 45 BC, making it over 2000 years old.','mike-jake.jpg',1),
(2,'standard','test 1','Contrary to popular belief, Lorem isn\'t simply random text. It has roots in a of classical Latin<br>\r\nliterature from 45 BC, making it over 2000 years old.','mike-jake.jpg',1),
(3,'Premium','test 2','Contrary to popular belief, Lorem isn\'t simply random text. It has roots in a of classical Latin<br>\r\nliterature from 45 BC, making it over 2000 years old.','test2.jpg',1);

/*Table structure for table `service_includes` */

DROP TABLE IF EXISTS `service_includes`;

CREATE TABLE `service_includes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_desc` text DEFAULT NULL,
  `service_desc_ar` text DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4;

/*Data for the table `service_includes` */

insert  into `service_includes`(`id`,`service_desc`,`service_desc_ar`,`service_id`,`created_at`,`modified_at`) values 
(1,'pi 1','اختبار خدمة اختبار مكتب خدمة الاختبار',1,NULL,NULL),
(2,'pi 2','اختبار خدمة اختبار مكتب خدمة الاختبار',1,NULL,NULL),
(3,'pi 3','اختبار خدمة اختبار مكتب خدمة الاختبار',1,NULL,NULL),
(4,'p1','اختبار خدمة اختبار مكتب خدمة الاختبار',2,NULL,NULL),
(5,'p2','اختبار خدمة اختبار مكتب خدمة الاختبار',2,NULL,NULL),
(6,'p3','اختبار خدمة اختبار مكتب خدمة الاختبار',2,NULL,NULL),
(7,'p4','اختبار خدمة اختبار مكتب خدمة الاختبار',2,NULL,NULL),
(8,'option 1','اختبار خدمة اختبار مكتب خدمة الاختبار',3,NULL,NULL),
(9,'option 2','اختبار خدمة اختبار مكتب خدمة الاختبار',3,NULL,NULL),
(10,'option 3','اختبار خدمة اختبار مكتب خدمة الاختبار',3,NULL,NULL),
(11,'abc options','اختبار خدمة اختبار مكتب خدمة الاختبار',4,NULL,NULL),
(12,'option 3','اختبار خدمة اختبار مكتب خدمة الاختبار',4,NULL,NULL),
(13,'anc3','اختبار خدمة اختبار مكتب خدمة الاختبار',5,NULL,NULL),
(14,'anc3','اختبار خدمة اختبار مكتب خدمة الاختبار',5,NULL,NULL),
(15,'Ten','اختبار خدمة اختبار مكتب خدمة الاختبار',6,NULL,NULL),
(16,'test 1','اختبار خدمة اختبار مكتب خدمة الاختبار',6,NULL,NULL),
(17,'test 2','اختبار خدمة اختبار مكتب خدمة الاختبار',6,NULL,NULL),
(18,'test 3','اختبار خدمة اختبار مكتب خدمة الاختبار',6,NULL,NULL),
(19,'test 4','اختبار خدمة اختبار مكتب خدمة الاختبار',6,NULL,NULL),
(20,'test 5','اختبار خدمة اختبار مكتب خدمة الاختبار',6,NULL,NULL),
(21,'breakfast','اختبار خدمة اختبار مكتب خدمة الاختبار',7,NULL,NULL),
(22,'lunch','اختبار خدمة اختبار مكتب خدمة الاختبار',7,NULL,NULL),
(23,'dinner','اختبار خدمة اختبار مكتب خدمة الاختبار',7,NULL,NULL),
(24,'Manakeesh','اختبار خدمة اختبار مكتب خدمة الاختبار',8,NULL,NULL),
(25,'Falafel','اختبار خدمة اختبار مكتب خدمة الاختبار',8,NULL,NULL),
(26,'p1','اختبار خدمة اختبار مكتب خدمة الاختبار',9,NULL,NULL),
(27,'p2','اختبار خدمة اختبار مكتب خدمة الاختبار',9,NULL,NULL),
(28,'p3','اختبار خدمة اختبار مكتب خدمة الاختبار',9,NULL,NULL),
(29,'abc','اختبار خدمة اختبار مكتب خدمة الاختبار',10,NULL,NULL),
(30,'xyz','اختبار خدمة اختبار مكتب خدمة الاختبار',10,NULL,NULL),
(31,'pqr','اختبار خدمة اختبار مكتب خدمة الاختبار',10,NULL,NULL),
(32,'p1','اختبار خدمة اختبار مكتب خدمة الاختبار',10,NULL,NULL),
(33,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ','اختبار خدمة اختبار مكتب خدمة الاختبار',11,NULL,NULL),
(34,'Lorem ipsum dolor sit amet, consectetur','اختبار خدمة اختبار مكتب خدمة الاختبار',11,NULL,NULL),
(35,'Lorem ipsum dolor sit amet, consectetur','اختبار خدمة اختبار مكتب خدمة الاختبار',12,NULL,NULL),
(36,'Lorem ipsum dolor sit amet.','اختبار خدمة اختبار مكتب خدمة الاختبار',12,NULL,NULL),
(37,'Lorem ipsum dolor sit amet, consectetur','اختبار خدمة اختبار مكتب خدمة الاختبار',13,NULL,NULL),
(38,'Lorem ipsum dolor sit amet, consectetur','اختبار خدمة اختبار مكتب خدمة الاختبار',13,NULL,NULL),
(39,'Lorem ipsum dolor sit amet, consectetur','اختبار خدمة اختبار مكتب خدمة الاختبار',14,NULL,NULL),
(40,'Lorem ipsum dolor sit amet, consectetur','اختبار خدمة اختبار مكتب خدمة الاختبار',21,NULL,NULL),
(41,'Kill a Mockingbird','Kill a Mockingbird',15,NULL,NULL),
(42,'Kill a another star','Kill a another star',15,NULL,NULL),
(43,'test desc 1','test desc 1',16,NULL,NULL),
(44,'test desc 2','test desc 2',16,NULL,NULL),
(45,'test desc 1','test desc 1',17,NULL,NULL),
(46,'test desc 2','test desc 2',17,NULL,NULL),
(67,'test desc 1','test desc 1',18,NULL,NULL),
(68,'test desc 2','test desc 2',18,NULL,NULL),
(69,'Kill a Mockingbird','Kill a Mockingbird',19,NULL,NULL),
(70,'Kill a another star','Kill a another star',19,NULL,NULL),
(71,'pi 1','اختبار خدمة اختبار مكتب خدمة الاختبار',1,NULL,NULL),
(72,'Kill a Mockingbird','Kill a Mockingbird',20,NULL,NULL),
(73,'Kill a another star','Kill a another star',20,NULL,NULL),
(74,'Lorem ipsum dolor sit amet, consectetur','اختبار خدمة اختبار مكتب خدمة الاختبار',14,NULL,NULL),
(75,'Lorem ipsum dolor sit amet, consectetur','اختبار خدمة اختبار مكتب خدمة الاختبار',21,NULL,NULL),
(76,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ','اختبار خدمة اختبار مكتب خدمة الاختبار',22,NULL,NULL),
(77,'Lorem ipsum dolor sit amet, consectetur','اختبار خدمة اختبار مكتب خدمة الاختبار',23,NULL,NULL),
(78,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ','اختبار خدمة اختبار مكتب خدمة الاختبار',22,NULL,NULL),
(79,'Lorem ipsum dolor sit amet, consectetur','اختبار خدمة اختبار مكتب خدمة الاختبار',23,NULL,NULL),
(80,'test include','test include',70,NULL,NULL),
(81,'test include 1','test include 1',70,NULL,NULL),
(82,'test include 1','test include ar 1',71,NULL,NULL),
(83,'test include 2','test include ar 2',71,NULL,NULL),
(84,'dilkhushan include','dilkhushan include ar',72,'2020-05-09 01:51:48',NULL),
(85,'dilkhushan include 1','dilkhushan include 1',72,'2020-05-09 01:51:48',NULL),
(86,'test include','يشمل الاختبار',73,'2020-05-19 22:00:55',NULL),
(87,'test include 1','يشمل الاختبار 1',73,'2020-05-19 22:00:55',NULL);

/*Table structure for table `services` */

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `venue_id` double NOT NULL,
  `pkgid` int(11) NOT NULL DEFAULT 0,
  `service_name` varchar(255) NOT NULL,
  `service_name_ar` varchar(255) DEFAULT NULL,
  `service_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

/*Data for the table `services` */

insert  into `services`(`id`,`venue_id`,`pkgid`,`service_name`,`service_name_ar`,`service_price`) values 
(1,21,0,'Package 1','الباقة الأولى',200.00),
(2,21,0,'Package 11','الباقة الأولى',200.00),
(3,21,0,'Package 13','الباقة الأولى',200.00),
(4,21,0,'Package 22','الباقة الأولى',150.00),
(5,21,0,'Package 24','الباقة الأولى',150.00),
(6,21,0,'Package 25','الباقة الأولى',150.00),
(7,21,0,'Package 26','الباقة الأولى',150.00),
(8,23,0,'pack 1','الباقة الأولى',12.00),
(9,37,0,'Pen','الباقة الأولى',200.00),
(10,41,0,'My Package 1','الباقة الأولى',200.00),
(11,43,0,'catering 1','الباقة الأولى',100.00),
(12,45,0,'arabic buffet','الباقة الأولى',200.00),
(13,48,0,'service 1 ','الباقة الأولى',200.00),
(14,48,0,'service2','الباقة الأولى',300.00),
(15,21,0,'test','الباقة الأولى',210.00),
(16,50,0,'First Package','الباقة الأولى',25.00),
(17,51,0,'First 2020 Package','باقة 2020 الأولى',40.00),
(18,51,0,'Second 2020 Package','باقة 2020 الثانية',50.00),
(19,53,0,'Birthday Package 1','باقة عيد الميلاد',45.00),
(20,53,0,'B Package 2','المجموعة ب 2',55.00),
(21,58,0,'Package Silver','رزمة فضية',500.00),
(22,59,0,'Rocky Project Online','مشروع روكي أون لاين',500.00),
(23,51,0,'Test May Package','Test May Package',230.00),
(69,21,0,'Package 1','الباقة الأولى',200.00),
(70,51,0,'may test package','may test package ar',200.00),
(71,51,0,'test may package','test may package ar',220.00),
(72,51,0,'Dilkhushan Package','dilkhushan package',220.00),
(73,53,0,'B Package 3','حزمة الاختبار',65.00);

/*Table structure for table `subscribers` */

DROP TABLE IF EXISTS `subscribers`;

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `subscribers` */

insert  into `subscribers`(`id`,`email`,`status`,`created_at`,`modified_at`) values 
(1,'sana@abc.com',1,'2020-03-26 06:49:11',NULL),
(3,'sami@abc.com',1,'2020-03-26 06:53:06',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_img` varchar(255) NOT NULL DEFAULT 'pr-im2.png',
  `package` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `platform_type` varchar(50) DEFAULT 'custom',
  `platform_id` varchar(125) DEFAULT NULL,
  `forget_pass_code` varchar(50) DEFAULT NULL,
  `activation_code` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`fullname`,`email`,`password`,`phone`,`user_type`,`user_img`,`package`,`status`,`platform_type`,`platform_id`,`forget_pass_code`,`activation_code`,`created_at`,`modified_at`) values 
(1,'test','test@smstest.com','cc03e747a6afbbcbf8be7668acfebee5','123123',1,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-01-17 21:44:48','0000-00-00 00:00:00'),
(2,'vendor','vendor2@gmail.com','cc03e747a6afbbcbf8be7668acfebee5','12312312',2,'vendor.png',0,1,'custom',NULL,NULL,NULL,'2020-01-17 21:54:33','0000-00-00 00:00:00'),
(4,'Octo Admin','admin@octobooking.com','4297f44b13955235245b2497399d7a93','9711233222',3,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-01-20 07:02:59','2020-01-20 02:02:59'),
(5,'Hammad Haider','hammadqa24@gmail.com','d41d8cd98f00b204e9800998ecf8427e','2332453344',1,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-03-09 18:23:12','0000-00-00 00:00:00'),
(6,'sds','sdfsd','84d9cfc2f395ce883a41d7ffc1bbcf4e','sdfdf',1,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-02-10 10:55:23','0000-00-00 00:00:00'),
(7,'john alan','hammadqa12@gmail.com','eb67f5104665ac9f7dab0ac74cf1b40e','3344546656',2,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-02-10 11:00:34','0000-00-00 00:00:00'),
(8,'test admin','admin2@mail.com','cc03e747a6afbbcbf8be7668acfebee5','12312312',4,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-02-19 03:11:31','0000-00-00 00:00:00'),
(9,'test2','aa@aa.aa','0b4e7a0e5fe84ad35fb5f95b9ceeac79','123456789',1,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-02-19 21:53:07','0000-00-00 00:00:00'),
(10,'test3','cc@cc.cc','d9e0fe56fdaf459440981bc655dd8fc0','0572345543',1,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-02-26 20:57:00','0000-00-00 00:00:00'),
(11,'Mukarram Shehzad','mukarram.shehzad@silicongraphics.ae','25d55ad283aa400af464c76d713c07ad','12345678901',2,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-02-26 22:22:12','0000-00-00 00:00:00'),
(12,'Hamza Hasan','dd@dd.dd','0e3adad7c10e14f6c84ec974e7d4fd78','1234567890',1,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-02-27 01:43:36','0000-00-00 00:00:00'),
(13,'Mukarram Shehzad','mukarram.shehzad@silicongraphics.ae','fefaaf410f9c8a838e3f8ff84a9bd28c','12345678901',2,'placeholder_user_img.png',0,2,'custom',NULL,NULL,NULL,'2020-02-27 17:14:28','0000-00-00 00:00:00'),
(14,'john doe','john@doe.com','6a6c19fea4a3676970167ce51f39e6ee','12345678901',2,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-02-27 18:05:29','0000-00-00 00:00:00'),
(15,'rania','rania@yopmail.com','3d22a0faf961dbb67c44c4b8407e100d','12345678901',1,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-02-27 19:49:50','0000-00-00 00:00:00'),
(16,'Mukarram Shehzad','mukarram.shehzad@silicongraphics.aee','25d55ad283aa400af464c76d713c07ad','123455678898',2,'placeholder_user_img.png',0,2,'custom',NULL,NULL,NULL,'2020-03-06 18:45:13','0000-00-00 00:00:00'),
(17,'Vendor test','vendor@test.com','cc03e747a6afbbcbf8be7668acfebee5','922332233223',2,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-03-07 19:40:52','0000-00-00 00:00:00'),
(18,'john doe','o@yopmail.com','25d55ad283aa400af464c76d713c07ad','12345678901',2,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-03-08 11:57:40','0000-00-00 00:00:00'),
(19,'Mukarram Shehzad','i@yopmail.com','25d55ad283aa400af464c76d713c07ad','12345678911',2,'placeholder_user_img.png',0,0,'custom',NULL,NULL,NULL,'2020-03-08 11:59:09','0000-00-00 00:00:00'),
(20,'Mukarram Shehzad','we@yopmail.com','25f9e794323b453885f5181f1b624d0b','21312312312',1,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-03-08 12:01:51','0000-00-00 00:00:00'),
(21,'hamza hassan','hamza@yopmail.com','25d55ad283aa400af464c76d713c07ad','03472914091',2,'placeholder_user_img.png',0,0,'custom',NULL,NULL,NULL,'2020-03-08 13:15:11','0000-00-00 00:00:00'),
(22,'hamza hasan','hamza.user@yopmail.com','572d8ce0bc033782eac5713a1d830e4d','1234567999',1,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-03-08 13:17:31','0000-00-00 00:00:00'),
(23,'taha','mo@yopmail.com','f5f091a697cd91c4170cda38e81f4b1a','12345678911',2,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-03-08 13:28:50','0000-00-00 00:00:00'),
(24,'junani','junani@yopmail.com','25d55ad283aa400af464c76d713c07ad','03343704501',2,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-03-08 13:32:05','0000-00-00 00:00:00'),
(25,'junani','junani@yopmail.com','25d55ad283aa400af464c76d713c07ad','03342129552',1,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-03-08 13:33:53','0000-00-00 00:00:00'),
(26,'Mukarram Shehzad','junani@yopmail.com','25f9e794323b453885f5181f1b624d0b','12345678901',1,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-03-08 14:21:31','0000-00-00 00:00:00'),
(27,'mukarrum','hammadqa24@gmail.com','25d55ad283aa400af464c76d713c07ad','12345678901',1,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-03-08 14:22:02','0000-00-00 00:00:00'),
(28,'john','john@doe.com','25f9e794323b453885f5181f1b624d0b','9900112233',2,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-03-08 15:05:32','0000-00-00 00:00:00'),
(29,'venus','john@doe.com','25f9e794323b453885f5181f1b624d0b','992233445566',2,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-03-08 15:06:31','0000-00-00 00:00:00'),
(30,'zeeshan','zee@yopmail.com','25d55ad283aa400af464c76d713c07ad','112211331144',2,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-03-08 15:33:16','0000-00-00 00:00:00'),
(31,'sameer','sameer@yopmail.com','25d55ad283aa400af464c76d713c07ad','12323232323',1,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-03-08 15:50:14','0000-00-00 00:00:00'),
(32,'Kermit Casey','ahson.junani@silicongraphics.ae','1846bf80169d1cb70966833ae161c689','1234567890',1,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-03-08 19:04:53','0000-00-00 00:00:00'),
(33,'asd','asd@asd.ccc2','4297f44b13955235245b2497399d7a93','1120202123',2,'placeholder_user_img.png',0,0,'custom',NULL,NULL,NULL,'2020-03-09 13:46:38','0000-00-00 00:00:00'),
(34,'asd','info@232.com','a8f5f167f44f4964e6c998dee827110c','23123123123',2,'placeholder_user_img.png',0,0,'custom',NULL,NULL,NULL,'2020-03-09 13:47:20','0000-00-00 00:00:00'),
(35,'Teshdk','shxhw@nwjf.con','4297f44b13955235245b2497399d7a93','183647291746',1,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-03-09 13:48:39','0000-00-00 00:00:00'),
(36,'asdasd','shxhw@nwjf.con21','4297f44b13955235245b2497399d7a93','12312312323',2,'placeholder_user_img.png',0,0,'custom',NULL,NULL,NULL,'2020-03-09 13:50:45','0000-00-00 00:00:00'),
(37,'asd','vorono1710@adramsail.com','4297f44b13955235245b2497399d7a93','123123123123',2,'placeholder_user_img.png',0,0,'custom',NULL,NULL,NULL,'2020-03-09 13:51:42','0000-00-00 00:00:00'),
(38,'asd','vorono1710@adramsail.com','4297f44b13955235245b2497399d7a93','123123123123',2,'placeholder_user_img.png',0,0,'custom',NULL,NULL,NULL,'2020-03-09 13:54:52','0000-00-00 00:00:00'),
(39,'asd','asd@asd.ccc332','4297f44b13955235245b2497399d7a93','123123123123',2,'placeholder_user_img.png',0,0,'custom',NULL,NULL,NULL,'2020-03-09 13:55:05','0000-00-00 00:00:00'),
(40,'asd','asd@asd.ccc232','4297f44b13955235245b2497399d7a93','123123123123',2,'placeholder_user_img.png',0,0,'custom',NULL,NULL,NULL,'2020-03-09 13:55:22','0000-00-00 00:00:00'),
(41,'asdasd','asd@asd.ccc2321','4297f44b13955235245b2497399d7a93','123123123123',2,'placeholder_user_img.png',0,0,'custom',NULL,NULL,NULL,'2020-03-09 13:56:19','0000-00-00 00:00:00'),
(42,'asdasd','asd@asd.ccc2321','4297f44b13955235245b2497399d7a93','123123123123',2,'placeholder_user_img.png',0,0,'custom',NULL,NULL,NULL,'2020-03-09 13:56:52','0000-00-00 00:00:00'),
(43,'asdasd','asd@asd.ccc2321','4297f44b13955235245b2497399d7a93','123123123123',2,'placeholder_user_img.png',0,0,'custom',NULL,NULL,NULL,'2020-03-09 13:56:54','0000-00-00 00:00:00'),
(44,'asdasd','asd@asd.ccc2321','4297f44b13955235245b2497399d7a93','123123123123',2,'placeholder_user_img.png',0,0,'custom',NULL,NULL,NULL,'2020-03-09 13:57:21','0000-00-00 00:00:00'),
(45,'asdasd','asd@asd.ccc2321','4297f44b13955235245b2497399d7a93','123123123123',2,'placeholder_user_img.png',0,0,'custom',NULL,NULL,NULL,'2020-03-09 13:57:24','0000-00-00 00:00:00'),
(46,'asdas','v2orono1710@adramail.com','4297f44b13955235245b2497399d7a93','123123123123',2,'placeholder_user_img.png',0,0,'custom',NULL,NULL,NULL,'2020-03-09 14:14:00','0000-00-00 00:00:00'),
(47,'asd','asd@asd.ccc2323','4297f44b13955235245b2497399d7a93','123123123123',2,'placeholder_user_img.png',0,0,'custom',NULL,NULL,NULL,'2020-03-09 14:17:51','0000-00-00 00:00:00'),
(48,'asdasd','asd@asd.ccc23232','4297f44b13955235245b2497399d7a93','1231312312312',2,'placeholder_user_img.png',0,0,'custom',NULL,NULL,NULL,'2020-03-09 14:18:26','0000-00-00 00:00:00'),
(49,'saad','saad@yopmail.com','25d55ad283aa400af464c76d713c07ad','1231231231231',2,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-03-09 19:48:41','0000-00-00 00:00:00'),
(50,'shuaibbb','shuaib@yopmail.comm','25d55ad283aa400af464c76d713c07ad','111122223337',1,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-03-09 20:58:56','0000-00-00 00:00:00'),
(51,'vendorrr','vendrr2@gmail.com','cc03e747a6afbbcbf8be7668acfebee5','12312312312',2,'placeholder_user_img.png',0,1,'custom',NULL,NULL,NULL,'2020-03-10 01:30:44','0000-00-00 00:00:00'),
(52,'Sami','samreenquyyum@gmail.com','25d55ad283aa400af464c76d713c07ad','031-092-5620',1,'sami-52-1586008001.jpg',1,1,'custom',NULL,'',NULL,'2020-03-12 14:59:24','2020-04-02 04:42:34'),
(53,'Waqas','waqas.test@abc.com','e10adc3949ba59abbe56e057f20f883e','300-345-8765',2,'waqas-53-1588542728.jpg',2,1,'custom',NULL,NULL,NULL,'2020-03-12 16:13:07','2020-05-04 12:19:45'),
(54,'sania','sania11@gmail.com','25d55ad283aa400af464c76d713c07ad','03009256400',1,'pr-im2.png',1,1,'custom',NULL,NULL,NULL,'2020-03-19 16:05:18','0000-00-00 00:00:00'),
(55,'sana','sana@gmail.com','25d55ad283aa400af464c76d713c07ad','03009256400',1,'pr-im2.png',1,1,'custom',NULL,NULL,NULL,'2020-03-19 16:10:05','0000-00-00 00:00:00'),
(59,'Samreen Quyyum','samreenquyyum17@gmail.com','','',1,'pr-im2.png',0,1,'facebook','3427638653932232',NULL,NULL,'2020-03-23 21:30:14','0000-00-00 00:00:00'),
(65,'Samia','samia@gmail.com','25d55ad283aa400af464c76d713c07ad','234-112-4450',1,'pr-im2.png',1,1,'custom',NULL,NULL,NULL,'2020-04-01 23:31:47','0000-00-00 00:00:00'),
(66,'Sonia','sonia@gmail.com','25d55ad283aa400af464c76d713c07ad','030-092-56203',1,'pr-im2.png',1,0,'custom',NULL,NULL,'3jL5Vif61n','2020-04-02 17:07:33','0000-00-00 00:00:00'),
(67,'Sonia','sonia@gmail.com','25d55ad283aa400af464c76d713c07ad','030-092-56203',1,'pr-im2.png',1,1,'custom',NULL,NULL,'','2020-04-02 17:07:40','2020-04-02 05:23:27'),
(68,'vicks','vicks@gmail.com','25d55ad283aa400af464c76d713c07ad','030-092-56408',1,'pr-im2.png',1,0,'custom',NULL,NULL,'DTESzpFUWf','2020-04-02 17:32:15','0000-00-00 00:00:00'),
(69,'Salena','salena.test@abc.com','25d55ad283aa400af464c76d713c07ad','030-092-5990',1,'pr-im2.png',1,0,'custom',NULL,NULL,'F73L95m0Pu','2020-05-13 01:44:19','0000-00-00 00:00:00'),
(70,'Aliza','aliza.test@abc.com','25d55ad283aa400af464c76d713c07ad','030-092-5988',1,'pr-im2.png',1,0,'custom',NULL,NULL,'3uSh7If2E9','2020-05-13 01:51:39','0000-00-00 00:00:00'),
(71,'Aliza','aliza.test11@abc.com','25d55ad283aa400af464c76d713c07ad','030-092-5988',1,'pr-im2.png',1,0,'custom',NULL,NULL,'IOTmkeVjHK','2020-05-13 01:52:18','0000-00-00 00:00:00'),
(72,'Aliza','aliza.test12@abc.com','25d55ad283aa400af464c76d713c07ad','030-092-5988',1,'pr-im2.png',1,0,'custom',NULL,NULL,'D1vzRXY7tl','2020-05-13 01:53:21','0000-00-00 00:00:00'),
(73,'Aliza','aliza.test13@abc.com','25d55ad283aa400af464c76d713c07ad','030-092-5988',1,'pr-im2.png',1,0,'custom',NULL,NULL,'LZlnj5qHvO','2020-05-13 01:54:37','0000-00-00 00:00:00'),
(74,'Aliza','aliza.test14@abc.com','25d55ad283aa400af464c76d713c07ad','030-092-5988',1,'pr-im2.png',1,0,'custom',NULL,NULL,'qzOBC9i1aY','2020-05-13 01:58:22','0000-00-00 00:00:00'),
(75,'Aliza','aliza.test15@abc.com','25d55ad283aa400af464c76d713c07ad','030-092-5988',1,'pr-im2.png',1,0,'custom',NULL,NULL,'Q0dCYuRi2s','2020-05-13 02:00:12','0000-00-00 00:00:00'),
(76,'Aliza','aliza.test16@abc.com','25d55ad283aa400af464c76d713c07ad','030-092-5988',1,'pr-im2.png',1,0,'custom',NULL,NULL,'2VnGfz5OjC','2020-05-13 02:01:33','0000-00-00 00:00:00'),
(77,'Aliza','aliza.test16@abc.com','25d55ad283aa400af464c76d713c07ad','030-092-5988',1,'pr-im2.png',1,0,'custom',NULL,NULL,'G5M2nJkYcB','2020-05-13 02:05:20','0000-00-00 00:00:00'),
(78,'Aliza','aliza.test16@abc.com','25d55ad283aa400af464c76d713c07ad','030-092-5988',1,'pr-im2.png',1,0,'custom',NULL,NULL,'gP1YvWtCHA','2020-05-13 02:09:00','0000-00-00 00:00:00'),
(79,'Aliza','aliza.test17@abc.com','25d55ad283aa400af464c76d713c07ad','030-092-5988',1,'pr-im2.png',1,0,'custom',NULL,NULL,'ysHd4C0UNO','2020-05-13 02:11:20','0000-00-00 00:00:00'),
(80,'Aliza','aliza.test17@abc.com','25d55ad283aa400af464c76d713c07ad','030-092-5988',1,'pr-im2.png',1,1,'custom',NULL,NULL,'','2020-05-13 02:12:24','2020-05-13 11:33:19'),
(81,'Aliza','aliza.test17@abc.com','25d55ad283aa400af464c76d713c07ad','030-092-5988',1,'pr-im2.png',1,1,'custom',NULL,NULL,'','2020-05-13 02:13:21','2020-05-13 02:15:29'),
(82,'Aliza','aliza.test17@abc.com','25d55ad283aa400af464c76d713c07ad','030-092-5988',1,'pr-im2.png',1,1,'custom',NULL,NULL,'','2020-05-13 02:13:51','2020-05-13 02:14:06'),
(83,'Aliza','aliza.test18@abc.com','25d55ad283aa400af464c76d713c07ad','030-092-5988',1,'pr-im2.png',1,1,'custom',NULL,'75iYjTNQ','','2020-05-13 02:15:55','2020-05-13 03:47:12');

/*Table structure for table `venues` */

DROP TABLE IF EXISTS `venues`;

CREATE TABLE `venues` (
  `id` double NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL DEFAULT 'venue',
  `cat_id` int(11) NOT NULL,
  `venue_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `amenities` varchar(255) NOT NULL,
  `venue_name_ar` varchar(255) DEFAULT NULL,
  `description_ar` text DEFAULT NULL,
  `suitable` varchar(255) NOT NULL,
  `capacity_from` int(11) NOT NULL,
  `capacity_to` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `unit_price` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  `venue_services` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_at` datetime NOT NULL,
  `venue_type` varchar(255) NOT NULL,
  `venue_status` int(10) NOT NULL DEFAULT 1,
  `day_prices` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

/*Data for the table `venues` */

insert  into `venues`(`id`,`vendor_id`,`type`,`cat_id`,`venue_name`,`description`,`amenities`,`venue_name_ar`,`description_ar`,`suitable`,`capacity_from`,`capacity_to`,`price`,`unit_price`,`location`,`venue_services`,`longitude`,`latitude`,`created_at`,`modified_at`,`venue_type`,`venue_status`,`day_prices`) values 
(7,2,'venue',0,'First Venue here','In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.','wifi,car,buffet','المكان الأول هنا','Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','wedding,corporate',400,450,120000.00,'perday','Makkah','21','67.0011','24.8607','2020-04-21 03:09:23','0000-00-00 00:00:00','event',1,NULL),
(21,2,'service',6,'Design Test','Desc','','اختبار التصميم','Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','',0,0,0.00,'','',NULL,'','','2020-04-21 03:33:26','0000-00-00 00:00:00','',1,NULL),
(22,13,'venue',0,'five','this is a test venue','buffet,car,wifi','خدمة الاختبار','Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','wedding',1,100,25.00,'perseat','makkah','','67.0011','24.8607','2020-04-21 03:33:32','0000-00-00 00:00:00','event',1,NULL),
(23,13,'service',8,'test service','this is a test service','','خدمة الاختبار','Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','',0,0,0.00,'','',NULL,'','','2020-04-21 03:33:33','0000-00-00 00:00:00','',1,NULL),
(24,13,'venue',0,'test event','test venue','buffet,car,wifi','خدمة الاختبار','Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','birthday,corporate',1,100,12.00,'perseat','makkah','23','67.0011','24.8607','2020-04-21 03:33:36','0000-00-00 00:00:00','event',1,NULL),
(26,2,'venue',0,'Test4','Test4 desc','buffet,car','خدمة الاختبار','Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','birthday',12,100,255.00,'perday','madinah','21','67.0011','24.8607','2020-04-21 03:33:41','0000-00-00 00:00:00','event',1,NULL),
(29,2,'venue',0,'Test4','Test4 desc','buffet,car','خدمة الاختبار','Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','birthday',12,100,255.00,'perday','madinah','21','67.0011','24.8607','2020-04-21 03:33:42','0000-00-00 00:00:00','event',1,NULL),
(31,2,'venue',0,'Test4','Test4 desc','buffet,car','خدمة الاختبار','Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','birthday',10,100,255.00,'perday','madinah','21','67.0011','24.8607','2020-04-21 03:33:44','0000-00-00 00:00:00','event',1,NULL),
(32,13,'venue',0,'the candles','this is a test venue','buffet,wifi','الشمعة','Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','wedding',1,100,12.00,'perseat','makkah','23','67.0011','24.8607','2020-04-21 03:09:23','0000-00-00 00:00:00','event',1,NULL),
(33,14,'service',8,'test service','this a test service','',NULL,'Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','',0,0,0.00,'','',NULL,'','','2020-04-21 03:09:23','0000-00-00 00:00:00','',1,NULL),
(34,2,'venue',0,'Test 5','Test 5 desc','buffet,wifi','خدمة الاختبار','Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','birthday,corporate',10,100,265.00,'perseat','makkah','21','67.0011','24.8607','2020-04-21 03:33:47','0000-00-00 00:00:00','event',1,NULL),
(35,14,'venue',0,'Hill top','this venue is for weddings','wifi','أعلى التل','Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','weddings,birthday',1,100,200.00,'perseat','kuwait','50','67.0011','24.8607','2020-05-20 02:05:09','0000-00-00 00:00:00','event',1,NULL),
(36,2,'venue',0,'Abctesrhdj','Jdhf eud ','buffet,car',NULL,'Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','birthday,corporate',200,400,60000.00,'perday','makkah','21','67.0011','24.8607','2020-04-21 03:09:23','0000-00-00 00:00:00','event',1,NULL),
(38,11,'service',8,'decor','this is a decor service','',NULL,'Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','',0,0,0.00,'','',NULL,'','','2020-04-21 03:09:23','0000-00-00 00:00:00','',1,NULL),
(39,11,'venue',0,'test log','this test is on friday','buffet,car',NULL,'Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','birthday,corporate',1,100,25.00,'perseat','makkah','','67.0011','24.8607','2020-04-21 03:09:23','0000-00-00 00:00:00','event',1,NULL),
(40,17,'venue',0,'test venue first','test venue first test venue first test venue first test venue first test venue first test venue first test venue first test venue first test venue first ','buffet',NULL,'Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','wedding',300,400,80000.00,'perday','kuwait','','67.0011','24.8607','2020-04-21 03:09:23','0000-00-00 00:00:00','event',1,NULL),
(41,17,'service',9,'test photography service','test photography service test photography service test photography service test photography service test photography service test photography service test photography service test photography service test photography service test photography service test photography service ','',NULL,'Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','',0,0,0.00,'','',NULL,'','','2020-04-21 03:09:23','0000-00-00 00:00:00','',1,NULL),
(43,30,'service',7,'zeeshan catering','we offer catering in 3 packages','',NULL,'Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','',0,0,0.00,'','',NULL,'','','2020-04-21 03:09:23','0000-00-00 00:00:00','',1,NULL),
(44,30,'venue',0,'zeeshan\'s venue','this is zeeshan\'s venue','buffet,wifi','مكان زيشان','هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','birthday',1,100,12.00,'perday','kuwait','','1','1','2020-05-18 03:30:00','0000-00-00 00:00:00','event',1,NULL),
(45,49,'service',7,'buffet services','we are all kind of Arabic dishes in town','',NULL,'Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','',0,0,0.00,'','',NULL,'','','2020-04-21 03:09:23','0000-00-00 00:00:00','',1,NULL),
(46,49,'venue',0,'saad\'s buffet palace','this is a test buffet palace','buffet,wifi',NULL,'Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','wedding,birthday',1,100,1000.00,'perseat','buraidah','45','67.0011','24.8607','2020-04-21 03:09:23','0000-00-00 00:00:00','event',1,NULL),
(47,0,'venue',0,'saad\'s buffet palace 2','this my 2nd buffet','buffet,wifi',NULL,'Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','corporate',200,200,12.00,'perseat','kuwait','','67.0011','24.8607','2020-04-21 03:09:23','0000-00-00 00:00:00','event',2,NULL),
(48,51,'service',7,'test vendor service','test vendor service','',NULL,'Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','',0,0,0.00,'','',NULL,'','','2020-04-21 03:09:23','0000-00-00 00:00:00','',1,NULL),
(49,51,'venue',0,'test venue now','test venue now','buffet,wifi',NULL,'Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','weddings,corporate,adinah',240,300,40000.00,'perday','kuwait','48','67.0011','24.8607','2020-04-21 03:09:23','0000-00-00 00:00:00','event',1,NULL),
(50,7,'service',8,'Test Decoration','test decoration','','اختبار الديكور','Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','',0,0,0.00,'','',NULL,'','','2020-04-23 20:22:19','0000-00-00 00:00:00','',1,NULL),
(51,53,'service',8,'2020 Decoration','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam','','sasddsdsdsd','Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','',0,0,0.00,'','',NULL,'','','2020-04-21 03:09:23','0000-00-00 00:00:00','',1,NULL),
(52,53,'venue',0,'Decoration Event    ','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam','buffet,wifi','Decoration Event  ','Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','weddings,birthday',50,500,5000.00,'perseat','kuwait','51','1','1','2020-05-09 21:43:50','2020-03-27 10:47:14','event',2,'[{\"day\":\"monday\",\"price\":\"250\",\"price_unit\":\"perday\"},{\"day\":\"tuesday\",\"price\":\"300\",\"price_unit\":\"perday\"},{\"day\":\"wednesday\",\"price\":\"300\",\"price_unit\":\"perday\"},{\"day\":\"thursday\",\"price\":\"300\",\"price_unit\":\"perday\"},{\"day\":\"friday\",\"price\":\"400\",\"price_unit\":\"perseat\"},{\"day\":\"saturday\",\"price\":\"500\",\"price_unit\":\"perseat\"},{\"day\":\"sunday\",\"price\":\"500\",\"price_unit\":\"perseat\"}]'),
(53,53,'service',6,'Birthday decoration','Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups. ','','وسام عيد الميلاد','Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','',0,0,0.00,'','','','','','2020-04-21 03:34:50','0000-00-00 00:00:00','',1,NULL),
(54,53,'venue',0,'Shadi Mubarak','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s','buffet,wifi','شادي مبارك','Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','weddings,birthday,adinah',250,500,12000.00,'perseat','kuwait','','67.0993881','24.8741328','2020-05-09 04:53:37','0000-00-00 00:00:00','event',1,'[{\"day\":\"monday\",\"price\":\"\",\"price_unit\":\"perseat\"}]'),
(55,53,'service',7,'Best Food','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s','','Best Food','Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','',0,0,0.00,'','',NULL,'','','2020-04-21 03:09:23','0000-00-00 00:00:00','',1,NULL),
(56,53,'venue',0,'Test April 2020','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book','buffet,wifi','Test April 2020','Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','weddings,birthday,corporate',200,300,400.00,'perseat','kuwait','','74.2889905','31.51293009999999','2020-04-21 03:09:23','0000-00-00 00:00:00','event',1,NULL),
(57,53,'service',7,'Spcial Bar b Q','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s','','Special Bar b Q','Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','',0,0,0.00,'','',NULL,'','','2020-04-21 03:09:23','0000-00-00 00:00:00','',1,NULL),
(58,53,'service',7,'Spcial Bar b Q','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s','','Special Bar b Q','Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','',0,0,0.00,'','',NULL,'','','2020-04-21 03:09:23','0000-00-00 00:00:00','',1,NULL),
(59,53,'service',8,'test abc','test desc','','test abc','Lorem Ipsum هو ببساطة نص وهمي لصناعة الطباعة والتنضيد. كان لوريم إيبسوم النص الوهمي القياسي للصناعة منذ القرن الخامس عشر','',0,0,0.00,'','',NULL,'','','2020-04-21 03:09:23','0000-00-00 00:00:00','',1,NULL),
(60,53,'service',7,'test service 2020','test description','','خدمة تجريبية 2020','وصف الاختبار','',0,0,0.00,'','',NULL,'','','2020-05-01 02:18:27','0000-00-00 00:00:00','',1,NULL);

/*Table structure for table `walking_bookings` */

DROP TABLE IF EXISTS `walking_bookings`;

CREATE TABLE `walking_bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) DEFAULT NULL,
  `venue_id` int(11) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `walking_bookings` */

insert  into `walking_bookings`(`id`,`vendor_id`,`venue_id`,`event_date`,`created_at`,`modified_at`) values 
(1,53,54,'2020-05-25','2020-05-23 02:29:13',NULL),
(2,53,56,'2020-05-30','2020-05-23 03:01:12',NULL);

/*Table structure for table `wishlist` */

DROP TABLE IF EXISTS `wishlist`;

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `venue_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `wishlist` */

insert  into `wishlist`(`id`,`user_id`,`venue_id`,`status`,`created_at`,`modified_at`) values 
(1,52,32,NULL,'2020-03-26 04:34:14',NULL),
(4,52,49,NULL,'2020-03-26 04:34:24',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
