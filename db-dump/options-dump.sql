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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
