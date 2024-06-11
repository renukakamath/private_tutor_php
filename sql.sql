/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 5.7.9 : Database - private_tutor
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`private_tutor` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `private_tutor`;

/*Table structure for table `booking` */

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_subject_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `date_time` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `booking` */

insert  into `booking`(`booking_id`,`tutor_subject_id`,`student_id`,`date_time`,`status`) values 
(1,1,1,'2022-08-14 17:18:23','accept');

/*Table structure for table `certificate` */

DROP TABLE IF EXISTS `certificate`;

CREATE TABLE `certificate` (
  `certificate_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `tutor_subject_id` int(11) DEFAULT NULL,
  `certificate_file` varchar(1000) DEFAULT NULL,
  `date_time` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`certificate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `certificate` */

insert  into `certificate`(`certificate_id`,`student_id`,`tutor_subject_id`,`certificate_file`,`date_time`) values 
(1,1,1,'image/image_62f8db0e5d1cf.jpg','2022-08-14 16:52:54');

/*Table structure for table `chat` */

DROP TABLE IF EXISTS `chat`;

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `msg` varchar(100) DEFAULT NULL,
  `date_time` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`chat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `chat` */

insert  into `chat`(`chat_id`,`sender_id`,`receiver_id`,`msg`,`date_time`) values 
(1,2,4,'hai','2022-08-14'),
(2,4,2,'yes','2022-08-14'),
(3,4,2,'hello','2022-08-26');

/*Table structure for table `demo_class` */

DROP TABLE IF EXISTS `demo_class`;

CREATE TABLE `demo_class` (
  `demo_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_subject_id` int(11) DEFAULT NULL,
  `class_title` varchar(100) DEFAULT NULL,
  `video` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`demo_class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `demo_class` */

insert  into `demo_class`(`demo_class_id`,`tutor_subject_id`,`class_title`,`video`) values 
(1,1,'title','image/image_62f8da7db5dd4.mp4');

/*Table structure for table `e_books` */

DROP TABLE IF EXISTS `e_books`;

CREATE TABLE `e_books` (
  `e_book_id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) DEFAULT NULL,
  `tutor_subject_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `book_file` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`e_book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `e_books` */

insert  into `e_books`(`e_book_id`,`tutor_id`,`tutor_subject_id`,`title`,`book_file`) values 
(1,1,1,'title','image/image_62f8e2d3bef9e.jfif'),
(2,1,1,'title','image/image_62f8e394a0fdf.jfif');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`login_id`,`username`,`password`,`usertype`) values 
(1,'admin','admin','admin'),
(2,'student','student','student'),
(3,'student1','student1','block'),
(4,'tutor','tutor','tutor'),
(5,'teacher','teacher','block');

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `amount` decimal(18,0) DEFAULT NULL,
  `date_time` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `payment` */

insert  into `payment`(`payment_id`,`booking_id`,`amount`,`date_time`) values 
(1,1,1000,'2022-08-14');

/*Table structure for table `schedule_class` */

DROP TABLE IF EXISTS `schedule_class`;

CREATE TABLE `schedule_class` (
  `schedule_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`schedule_class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `schedule_class` */

insert  into `schedule_class`(`schedule_class_id`,`booking_id`,`date`,`time`,`status`) values 
(1,1,'2022-08-24','20:24','pending');

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `students` */

insert  into `students`(`student_id`,`login_id`,`first_name`,`last_name`,`place`,`phone`,`email`) values 
(1,2,'student','student','ernakulam','1234567890','student@gmail.com'),
(2,3,'student1','student1','ernakulam','1234567890','student@gmail.com');

/*Table structure for table `subjects` */

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `subjects` */

insert  into `subjects`(`subject_id`,`subject_name`,`description`) values 
(1,'acconutancy','descriptions..........');

/*Table structure for table `tutor` */

DROP TABLE IF EXISTS `tutor`;

CREATE TABLE `tutor` (
  `tutor_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tutor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tutor` */

insert  into `tutor`(`tutor_id`,`login_id`,`first_name`,`last_name`,`place`,`phone`,`email`,`qualification`) values 
(1,4,'tutor','tutor','ernakulam','1234567890','tutor@gmail.com','bca'),
(2,5,'teacher','tutor','ernakulam','1234567890','teacher@gamil.com','mca');

/*Table structure for table `tutor_subject` */

DROP TABLE IF EXISTS `tutor_subject`;

CREATE TABLE `tutor_subject` (
  `tutor_subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tutor_subject_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tutor_subject` */

insert  into `tutor_subject`(`tutor_subject_id`,`tutor_id`,`subject_id`,`amount`) values 
(1,1,1,'1000');

/*Table structure for table `video_class` */

DROP TABLE IF EXISTS `video_class`;

CREATE TABLE `video_class` (
  `video_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor_subject_id` int(11) DEFAULT NULL,
  `class_videos` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`video_class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `video_class` */

insert  into `video_class`(`video_class_id`,`tutor_subject_id`,`class_videos`) values 
(1,1,'image/image_62f8e3ec47e43.mp4');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
