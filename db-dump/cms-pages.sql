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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
