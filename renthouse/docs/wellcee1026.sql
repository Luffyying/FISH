/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50621
 Source Host           : localhost
 Source Database       : wellcee

 Target Server Type    : MySQL
 Target Server Version : 50621
 File Encoding         : utf-8

 Date: 10/26/2016 09:58:06 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `t_admin`
-- ----------------------------
DROP TABLE IF EXISTS `t_admin`;
CREATE TABLE `t_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `pwd` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_super_admin` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT '0' COMMENT '0:正常／1:禁用／2:删除',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_city`
-- ----------------------------
DROP TABLE IF EXISTS `t_city`;
CREATE TABLE `t_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_city`
-- ----------------------------
BEGIN;
INSERT INTO `t_city` VALUES ('1', '巴黎', '0'), ('2', '马赛', '0'), ('3', '里昂', '0'), ('4', '街区1', '1'), ('5', '街区2', '1'), ('6', '街区3', '2'), ('7', '街区4', '3'), ('8', '道路1', '4'), ('9', '道路2', '5'), ('10', '道路3', '6'), ('11', '道路4', '7');
COMMIT;

-- ----------------------------
--  Table structure for `t_collect`
-- ----------------------------
DROP TABLE IF EXISTS `t_collect`;
CREATE TABLE `t_collect` (
  `collect_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `house_id` int(11) DEFAULT NULL,
  `collect_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_delete` int(1) DEFAULT '0' COMMENT '0:正常／1:删除',
  PRIMARY KEY (`collect_id`),
  KEY `fk_user_collect` (`user_id`),
  KEY `fk_house_collect` (`house_id`),
  CONSTRAINT `fk_house_collect` FOREIGN KEY (`house_id`) REFERENCES `t_house` (`house_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_user_collect` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_comment_house`
-- ----------------------------
DROP TABLE IF EXISTS `t_comment_house`;
CREATE TABLE `t_comment_house` (
  `comment_house_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `content` varchar(255) DEFAULT NULL,
  `score` int(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `house_id` int(11) DEFAULT NULL,
  `img_first` varchar(255) DEFAULT NULL,
  `img_second` varchar(255) DEFAULT NULL,
  `img_third` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`comment_house_id`),
  KEY `user_id` (`user_id`),
  KEY `house_id` (`house_id`),
  CONSTRAINT `fk_house_comment_house` FOREIGN KEY (`house_id`) REFERENCES `t_user` (`user_id`),
  CONSTRAINT `fk_user_comment_house` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_comment_house`
-- ----------------------------
BEGIN;
INSERT INTO `t_comment_house` VALUES ('1', '2016-10-25 22:12:31', '', '0', null, '1', 'upload/20161025161231_553422_imgOne.png', 'upload/20161025161231_553422_imgTwo.png', 'upload/20161025161231_553422_imgThree.png'), ('2', '2016-10-25 22:21:03', 'dsf', '0', null, '1', 'upload/20161025162102_574772_imgOne.png', 'upload/20161025162102_574772_imgTwo.png', 'upload/20161025162102_574772_imgThree.png'), ('3', '2016-10-25 22:21:20', '', '0', null, '1', 'upload/20161025162120_517372_imgOne.png', 'upload/20161025162120_517372_imgTwo.png', 'upload/20161025162120_517372_imgThree.png'), ('4', '2016-10-25 22:22:02', 'fsdf', '3', null, '1', 'upload/20161025162202_955822_imgOne.png', 'upload/20161025162202_955822_imgTwo.png', 'upload/20161025162202_955822_imgThree.png'), ('5', '2016-10-25 23:08:40', '', '0', null, '1', 'upload/20161025170840_41606_imgOne', 'upload/20161025170840_41606_imgTwo', 'upload/20161025170840_41606_imgThree'), ('6', '2016-10-25 23:08:42', '', '0', null, '1', 'upload/20161025170842_54381_imgOne', 'upload/20161025170842_54381_imgTwo', 'upload/20161025170842_54381_imgThree'), ('7', '2016-10-25 23:09:19', '', '0', null, '1', 'upload/20161025170919_49036_imgOne', 'upload/20161025170919_49036_imgTwo', 'upload/20161025170919_49036_imgThree'), ('8', '2016-10-25 23:09:21', '', '0', null, '1', 'upload/20161025170921_97975_imgOne', 'upload/20161025170921_97975_imgTwo', 'upload/20161025170921_97975_imgThree'), ('9', '2016-10-25 23:10:31', '', '0', null, '1', 'upload/20161025171031_84776_imgOne', 'upload/20161025171031_84776_imgTwo', 'upload/20161025171031_84776_imgThree'), ('10', '2016-10-25 23:12:54', '', '0', null, '1', 'upload/20161025171254_38286_imgOne', 'upload/20161025171254_38286_imgTwo', 'upload/20161025171254_38286_imgThree'), ('11', '2016-10-25 23:13:15', '', '0', null, '1', 'upload/20161025171315_76715_imgOne', 'upload/20161025171315_76715_imgTwo', 'upload/20161025171315_76715_imgThree'), ('12', '2016-10-25 23:14:33', '', '0', null, '1', 'upload/20161025171433_62688_imgOne', 'upload/20161025171433_62688_imgTwo', 'upload/20161025171433_62688_imgThree'), ('13', '2016-10-25 23:16:50', '', '0', null, '1', 'upload/20161025171650_68870_imgOne', 'upload/20161025171650_68870_imgTwo', 'upload/20161025171650_68870_imgThree'), ('14', '2016-10-26 00:04:48', '&nbsp;s', '0', null, '5', 'upload/20161025180448_84533_imgOne', 'upload/20161025180448_84533_imgTwo', 'upload/20161025180448_84533_imgThree'), ('15', '2016-10-26 00:05:37', '&nbsp;s', '0', null, '5', 'upload/20161025180537_74369_imgOne', 'upload/20161025180537_74369_imgTwo', 'upload/20161025180537_74369_imgThree'), ('16', '2016-10-26 00:05:38', '&nbsp;s', '0', null, '5', 'upload/20161025180538_69856_imgOne', 'upload/20161025180538_69856_imgTwo', 'upload/20161025180538_69856_imgThree'), ('17', '2016-10-26 00:06:07', '&nbsp;s', '0', null, '5', 'upload/20161025180607_64865_imgOne', 'upload/20161025180607_64865_imgTwo', 'upload/20161025180607_64865_imgThree'), ('18', '2016-10-26 00:06:21', '&nbsp;s', '0', null, '5', 'upload/20161025180621_84169_imgOne', 'upload/20161025180621_84169_imgTwo', 'upload/20161025180621_84169_imgThree'), ('19', '2016-10-26 00:06:40', '&nbsp;s', '0', null, '5', 'upload/20161025180640_57049_imgOne', 'upload/20161025180640_57049_imgTwo', 'upload/20161025180640_57049_imgThree'), ('20', '2016-10-26 00:06:41', '&nbsp;s', '0', null, '5', 'upload/20161025180641_60654_imgOne', 'upload/20161025180641_60654_imgTwo', 'upload/20161025180641_60654_imgThree'), ('21', '2016-10-26 00:08:06', '&nbsp;s', '0', null, '5', 'upload/20161025180806_36825_imgOne', 'upload/20161025180806_36825_imgTwo', 'upload/20161025180806_36825_imgThree'), ('22', '2016-10-26 00:08:07', '&nbsp;s', '0', null, '5', 'upload/20161025180807_23357_imgOne', 'upload/20161025180807_23357_imgTwo', 'upload/20161025180807_23357_imgThree'), ('23', '2016-10-26 00:09:40', 'sg', '0', null, '5', 'upload/20161025180940_64187_imgOne', 'upload/20161025180940_64187_imgTwo', 'upload/20161025180940_64187_imgThree'), ('24', '2016-10-26 00:10:45', '', '0', null, '5', 'upload/20161025181045_45634_imgOne', 'upload/20161025181045_45634_imgTwo', 'upload/20161025181045_45634_imgThree'), ('25', '2016-10-26 00:10:58', '', '0', null, '5', 'upload/20161025181058_59180_imgOne', 'upload/20161025181058_59180_imgTwo', 'upload/20161025181058_59180_imgThree'), ('26', '2016-10-26 00:11:29', '', '0', null, '5', 'upload/20161025181129_37415_imgOne', 'upload/20161025181129_37415_imgTwo', 'upload/20161025181129_37415_imgThree'), ('27', '2016-10-26 01:15:49', 'reg', '0', null, '5', 'upload/20161025191549_69026_imgOne', 'upload/20161025191549_69026_imgTwo', 'upload/20161025191549_69026_imgThree');
COMMIT;

-- ----------------------------
--  Table structure for `t_comment_owner`
-- ----------------------------
DROP TABLE IF EXISTS `t_comment_owner`;
CREATE TABLE `t_comment_owner` (
  `comment_owner_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `content` varchar(255) DEFAULT NULL,
  `score` int(1) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_delete` int(1) DEFAULT '0' COMMENT '0:正常／1:删除',
  PRIMARY KEY (`comment_owner_id`),
  KEY `user_id` (`user_id`),
  KEY `owner_id` (`owner_id`),
  CONSTRAINT `fk_owner_comment_owner` FOREIGN KEY (`owner_id`) REFERENCES `t_owner` (`user_id`),
  CONSTRAINT `fk_user_comment_owner` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_comment_owner`
-- ----------------------------
BEGIN;
INSERT INTO `t_comment_owner` VALUES ('1', '2016-10-25 22:12:31', '', '0', null, null, '0'), ('2', '2016-10-25 22:21:03', 'f', '0', null, null, '0'), ('3', '2016-10-25 22:21:20', '', '0', null, null, '0'), ('4', '2016-10-25 22:22:02', 'ewgr', '5', null, null, '0'), ('5', '2016-10-25 23:08:40', '', '0', null, null, '0'), ('6', '2016-10-25 23:08:42', '', '0', null, null, '0'), ('7', '2016-10-25 23:09:19', '', '0', null, null, '0'), ('8', '2016-10-25 23:09:21', '', '0', null, null, '0'), ('9', '2016-10-25 23:10:31', '', '0', null, null, '0'), ('10', '2016-10-25 23:12:54', '', '0', null, null, '0'), ('11', '2016-10-25 23:13:15', '', '0', null, null, '0'), ('12', '2016-10-25 23:14:33', '', '0', null, null, '0'), ('13', '2016-10-25 23:16:50', '', '0', null, null, '0'), ('14', '2016-10-26 00:04:48', 'd', '0', null, null, '0'), ('15', '2016-10-26 00:05:37', 'd', '0', null, null, '0'), ('16', '2016-10-26 00:05:38', 'd', '0', null, null, '0'), ('17', '2016-10-26 00:06:07', 'd', '0', null, null, '0'), ('18', '2016-10-26 00:06:21', 'd', '0', null, null, '0'), ('19', '2016-10-26 00:06:40', 'd', '0', null, null, '0'), ('20', '2016-10-26 00:06:41', 'd', '0', null, null, '0'), ('21', '2016-10-26 00:08:06', 'd', '0', null, null, '0'), ('22', '2016-10-26 00:08:07', 'd', '0', null, null, '0'), ('23', '2016-10-26 00:09:40', 'gg', '0', null, null, '0'), ('24', '2016-10-26 00:10:45', '', '0', null, null, '0'), ('25', '2016-10-26 00:10:58', '', '0', null, null, '0'), ('26', '2016-10-26 00:11:29', '', '0', null, null, '0'), ('27', '2016-10-26 01:15:49', '<div style=\"text-align:center;\">\n	weggew\n</div>', '0', null, null, '0');
COMMIT;

-- ----------------------------
--  Table structure for `t_comment_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_comment_user`;
CREATE TABLE `t_comment_user` (
  `comment_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `content` varchar(255) DEFAULT NULL,
  `score` int(1) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_delete` int(1) DEFAULT '0' COMMENT '0:正常／1:删除',
  PRIMARY KEY (`comment_user_id`),
  KEY `owner_id` (`owner_id`),
  KEY `owner_id_2` (`owner_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `fk_owner_comment_user` FOREIGN KEY (`owner_id`) REFERENCES `t_user` (`user_id`),
  CONSTRAINT `fk_user_comment_user` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_comment_user`
-- ----------------------------
BEGIN;
INSERT INTO `t_comment_user` VALUES ('1', '2016-09-29 17:00:43', null, null, '1', '2', '0');
COMMIT;

-- ----------------------------
--  Table structure for `t_convenience`
-- ----------------------------
DROP TABLE IF EXISTS `t_convenience`;
CREATE TABLE `t_convenience` (
  `convenience_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`convenience_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_convenience`
-- ----------------------------
BEGIN;
INSERT INTO `t_convenience` VALUES ('1', '无线网', '&#xe600'), ('2', '热水器', '&#xe60c'), ('3', '空调', '&#xe613'), ('4', '电视', '&#xe61f'), ('5', '电脑', '&#xe606'), ('6', '工作区', '&#xe61e'), ('7', '厨房', '&#xe617'), ('8', '洗衣机', '&#xe612'), ('9', '门锁', '&#xe615'), ('10', '电梯', '&#xe619'), ('11', '停车位', '&#xe609'), ('12', '吹风机', '&#xe616'), ('13', '烘干机', '&#xe60d'), ('14', '熨烫机', '&#xe61d'), ('15', '暖气', '&#xe60e'), ('16', '壁炉', '&#xe61c');
COMMIT;

-- ----------------------------
--  Table structure for `t_feedback`
-- ----------------------------
DROP TABLE IF EXISTS `t_feedback`;
CREATE TABLE `t_feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `feedback_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `content` varchar(255) DEFAULT NULL,
  `is_delete` int(1) DEFAULT '0' COMMENT '0:正常／1:删除',
  PRIMARY KEY (`feedback_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `fk_feedback_user` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_hobby`
-- ----------------------------
DROP TABLE IF EXISTS `t_hobby`;
CREATE TABLE `t_hobby` (
  `hobby_id` int(11) NOT NULL AUTO_INCREMENT,
  `hobby_name` varchar(255) DEFAULT NULL,
  `hobby_icon` varchar(255) DEFAULT NULL,
  `hobby_class` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`hobby_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_hobby`
-- ----------------------------
BEGIN;
INSERT INTO `t_hobby` VALUES ('1', '旅行', '&#xe606;', 'icon-lvxing'), ('2', '音乐', '&#xe607;', 'icon-iconfontbiaozhunmoban01'), ('3', '电影', '&#xe609;', 'icon-dianying'), ('4', '美食', '&#xe608;', 'icon-meishi'), ('5', '宠物', '&#xe60a;', 'icon-chongwu'), ('6', '摄影', '&#xe600;', 'icon-sheying'), ('7', '绘画', '&#xe60b;', 'icon-huahua'), ('8', '运动', '&#xe605;', 'icon-yundongwushu'), ('9', '阅读', '&#xe60d;', 'icon-shu'), ('10', '游戏', '&#xe604;', 'icon-youxi'), ('11', '购物', '&#xe60c;', 'icon-gouwu'), ('12', '家务', '&#xe603;', 'icon-jiazhengfuwu'), ('13', '舞蹈', '&#xe602;', 'icon-wudao'), ('14', '插花', '&#xe601;', 'icon-huahua1');
COMMIT;

-- ----------------------------
--  Table structure for `t_house`
-- ----------------------------
DROP TABLE IF EXISTS `t_house`;
CREATE TABLE `t_house` (
  `house_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '0' COMMENT '0:正常 1:禁用 2:删除',
  `city` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `road` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `rent_type_id` int(11) DEFAULT NULL,
  `bedroom_num` varchar(2) DEFAULT NULL,
  `washroom_num` varchar(2) DEFAULT NULL,
  `bed_num` varchar(2) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `rules` text,
  `post_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `hold_num` int(11) DEFAULT NULL,
  `intro` varchar(255) DEFAULT NULL,
  `score` varchar(255) DEFAULT NULL,
  `map` varchar(255) DEFAULT NULL,
  `collect_num` int(11) DEFAULT NULL,
  PRIMARY KEY (`house_id`),
  KEY `fk_renttype_house` (`rent_type_id`),
  KEY `fk_type_house` (`type_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `fk_renttype_house` FOREIGN KEY (`rent_type_id`) REFERENCES `t_house_rent_type` (`rent_type_id`) ON DELETE SET NULL,
  CONSTRAINT `fk_type_house` FOREIGN KEY (`type_id`) REFERENCES `t_house_type` (`type_id`) ON DELETE SET NULL,
  CONSTRAINT `fk_user_house` FOREIGN KEY (`user_id`) REFERENCES `t_owner` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_house`
-- ----------------------------
BEGIN;
INSERT INTO `t_house` VALUES ('1', '1', '0', null, null, null, null, null, null, null, null, null, null, null, null, null, '2016-10-19 15:26:36', null, null, null, null, null), ('4', '1', '1', '1', '2', '3', '1', '2', null, null, null, '345', null, 'house产量为恶奴不嗯日产量为恶奴不嗯日产量为恶奴不嗯日产量为恶奴不嗯日产量为恶奴不嗯日产量为恶奴不嗯日产量为恶', '4', null, '2016-09-28 16:27:09', null, '房源描述4', '4', null, null), ('5', '1', '2', 'ct', 'str', 'rd', '1', '1', null, null, null, '768', null, 'house产量为恶奴', 'ad产量为恶奴不嗯日产量为恶奴不嗯日产量为恶奴不嗯日产量为恶奴不嗯日产量为恶奴不嗯日产量为恶奴不嗯日产量为恶', null, '2016-10-03 20:50:13', null, '房源描述5', '5', null, null), ('6', '1', '2', null, null, null, null, null, null, null, null, null, null, 'house3456', null, null, '2016-10-04 17:17:09', null, '房源描述6', '6', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `t_house_convenience`
-- ----------------------------
DROP TABLE IF EXISTS `t_house_convenience`;
CREATE TABLE `t_house_convenience` (
  `house_id` int(11) NOT NULL,
  `convenience_id` int(11) NOT NULL,
  PRIMARY KEY (`house_id`,`convenience_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_house_convenience`
-- ----------------------------
BEGIN;
INSERT INTO `t_house_convenience` VALUES ('1', '2'), ('1', '3'), ('1', '4'), ('2', '2');
COMMIT;

-- ----------------------------
--  Table structure for `t_house_img`
-- ----------------------------
DROP TABLE IF EXISTS `t_house_img`;
CREATE TABLE `t_house_img` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) DEFAULT NULL,
  `is_main` int(1) DEFAULT '0' COMMENT '0: 非主图／1:主图',
  `thumb_path` varchar(255) DEFAULT NULL,
  `house_id` int(11) DEFAULT NULL,
  `describe` varchar(25) DEFAULT NULL,
  `is_delete` int(1) DEFAULT '0' COMMENT '0:正常／1:删除',
  PRIMARY KEY (`img_id`),
  KEY `fk_house_img` (`house_id`),
  CONSTRAINT `fk_house_img` FOREIGN KEY (`house_id`) REFERENCES `t_house` (`house_id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_house_img`
-- ----------------------------
BEGIN;
INSERT INTO `t_house_img` VALUES ('1', null, '1', 'img/booklist/house_img.jpg', '4', null, '0'), ('2', null, '1', 'img/share_picshow.png', '5', null, '0'), ('3', null, '1', 'img/booklist/house_img.jpg', '6', null, '0');
COMMIT;

-- ----------------------------
--  Table structure for `t_house_rent_type`
-- ----------------------------
DROP TABLE IF EXISTS `t_house_rent_type`;
CREATE TABLE `t_house_rent_type` (
  `rent_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rent_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_house_rent_type`
-- ----------------------------
BEGIN;
INSERT INTO `t_house_rent_type` VALUES ('1', '整租'), ('2', '床位'), ('3', '合租');
COMMIT;

-- ----------------------------
--  Table structure for `t_house_type`
-- ----------------------------
DROP TABLE IF EXISTS `t_house_type`;
CREATE TABLE `t_house_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_house_type`
-- ----------------------------
BEGIN;
INSERT INTO `t_house_type` VALUES ('1', '公寓'), ('2', '别墅'), ('3', '海景房');
COMMIT;

-- ----------------------------
--  Table structure for `t_mail`
-- ----------------------------
DROP TABLE IF EXISTS `t_mail`;
CREATE TABLE `t_mail` (
  `mail_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `mail_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `is_from_admin` int(1) DEFAULT NULL COMMENT '1: from admin',
  `is_delete` int(1) DEFAULT '0' COMMENT '0:正常／1:删除',
  `receiver_group` int(1) DEFAULT NULL COMMENT '0:房客／1:房东',
  PRIMARY KEY (`mail_id`),
  KEY `sender_id` (`sender_id`),
  KEY `receiver_id` (`receiver_id`),
  CONSTRAINT `fk_receive_mail` FOREIGN KEY (`receiver_id`) REFERENCES `t_user` (`user_id`),
  CONSTRAINT `fk_send_mail` FOREIGN KEY (`sender_id`) REFERENCES `t_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_mail`
-- ----------------------------
BEGIN;
INSERT INTO `t_mail` VALUES ('1', 'fds', '2016-10-18 12:55:36', null, null, null, '0', '1'), ('2', 'rrr', '2016-10-18 12:56:40', null, '1', null, '0', null);
COMMIT;

-- ----------------------------
--  Table structure for `t_order`
-- ----------------------------
DROP TABLE IF EXISTS `t_order`;
CREATE TABLE `t_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_status` int(1) DEFAULT '1' COMMENT '0:全部/1:待付款(默认)/2:房东处理中/3:进行中 31:确认入住 申诉 32:申诉中 33:入住中/4:已完成 41:评价 分享 42:已评价 分享 43:评价 已分享 44:已评价 已分享／5:申请未成功',
  `owner_status` int(1) DEFAULT '-1' COMMENT '-1:未付款(默认)／0:全部／1:待处理／2:进行中 21:待房客入住 22:房客入住中／3:成功交易 31:评价房客 32:已评价／4: 无效',
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `house_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `service_price` decimal(10,0) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `is_appeal` int(1) DEFAULT '0',
  `message` text,
  `check_num` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `fk_house_order` (`house_id`),
  KEY `fk_user_order` (`user_id`),
  CONSTRAINT `fk_house_order` FOREIGN KEY (`house_id`) REFERENCES `t_house` (`house_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_user_order` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_order`
-- ----------------------------
BEGIN;
INSERT INTO `t_order` VALUES ('1', '5', '23', '2016-10-25 13:35:11', '4', '1', '1244', null, '2016-10-17 13:43:09', '2016-10-25 13:43:09', '0', null, null), ('2', '32', '23', '2016-10-12 13:40:41', '4', '1', null, null, '2016-10-17 17:21:41', '2016-11-04 17:21:41', '0', null, null), ('3', '31', '222', '2016-10-12 13:40:49', '6', '1', null, null, '2016-10-17 18:11:24', '2016-10-28 18:11:24', '0', null, null), ('4', '32', '23', '2016-10-12 13:41:00', '6', '1', null, null, '2016-10-21 16:28:12', '2016-10-17 16:28:12', '0', null, null), ('5', '5', '4', '2016-10-12 13:41:07', '6', '1', null, null, '2016-10-17 17:21:41', '2016-10-17 17:21:41', '0', null, null), ('6', '32', '23', '2016-10-12 15:46:52', '5', '1', null, null, '2016-10-17 16:28:27', '2016-10-17 16:28:27', '0', null, null), ('7', '41', '42', '2016-10-12 20:08:25', '5', '1', null, null, '2016-10-17 16:28:29', '2016-10-17 16:28:29', '0', null, null), ('8', '5', '42', '2016-10-17 16:27:44', '4', '1', null, null, '2016-10-17 16:42:02', '2016-10-17 16:42:02', '0', null, null), ('9', '5', '42', '2016-10-17 16:27:50', '4', '1', null, null, '2016-10-17 16:42:03', '2016-10-17 16:42:03', '0', null, null), ('10', '5', '42', '2016-10-17 16:27:57', '5', '1', null, null, '2016-10-17 16:42:04', '2016-10-17 16:42:04', '0', null, null), ('11', '42', '42', '2016-10-12 20:08:25', '5', '1', null, null, '2016-10-17 16:28:29', '2016-10-17 16:28:29', '0', null, null), ('12', '44', '42', '2016-10-12 20:08:25', '5', '1', null, null, '2016-10-17 16:28:29', '2016-10-17 16:28:29', '0', null, null), ('13', '44', '42', '2016-10-12 20:08:25', '5', '1', null, null, '2016-10-17 16:28:29', '2016-10-17 16:28:29', '0', null, null), ('14', '44', '41', '2016-10-12 20:08:25', '5', '1', null, null, '2016-10-17 16:28:29', '2016-10-17 16:28:29', '0', null, null), ('15', '44', '41', '2016-10-12 20:08:25', '5', '1', null, null, '2016-10-17 16:28:29', '2016-10-17 16:28:29', '0', null, null), ('16', '44', '41', '2016-10-12 20:08:25', '5', '1', null, null, '2016-10-17 16:28:29', '2016-10-17 16:28:29', '0', null, null), ('17', '44', '42', '2016-10-12 20:08:25', '5', '1', null, null, '2016-10-17 16:28:29', '2016-10-17 16:28:29', '0', null, null), ('18', '42', '42', '2016-10-12 20:08:25', '5', '1', null, null, '2016-10-17 16:28:29', '2016-10-17 16:28:29', '0', null, null), ('19', '31', '-1', '2016-10-25 18:45:53', null, '1', null, null, null, null, '0', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `t_order_appeal`
-- ----------------------------
DROP TABLE IF EXISTS `t_order_appeal`;
CREATE TABLE `t_order_appeal` (
  `appeal_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `appeal_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(255) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `is_reply` int(1) DEFAULT '0' COMMENT '0:未回复／1:已回复',
  PRIMARY KEY (`appeal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_order_appeal`
-- ----------------------------
BEGIN;
INSERT INTO `t_order_appeal` VALUES ('8', 'cgfht', null, '2016-10-20 14:54:00', null, '6', '0'), ('9', 'fdsdgdfg', null, '2016-10-20 14:55:09', null, '6', '0'), ('10', '54yyrt', null, '2016-10-20 14:57:47', null, '1', '0'), ('11', 'fsgqegr', null, '2016-10-20 15:00:02', null, '1', '0'), ('12', '给社团个粉丝', null, '2016-10-24 17:38:16', null, '4', '0'), ('13', '史蒂夫果然高', null, '2016-10-24 18:09:53', null, '1', '0'), ('107', 'asdf', null, '2016-10-24 19:27:54', null, '1', '0'), ('108', 'sadfe', null, '2016-10-24 19:28:11', null, '6', '0'), ('109', 'sadfe', null, '2016-10-24 19:28:11', null, '6', '0'), ('163', '繁华的奇迹', null, '2016-10-25 17:11:49', null, '1', '0'), ('164', '多福多寿', null, '2016-10-25 17:12:35', null, '1', '0'), ('165', '啊啊', null, '2016-10-25 17:12:44', null, '1', '0'), ('166', '啊啊呜呜', null, '2016-10-25 17:13:05', null, '1', '0'), ('167', '是否', null, '2016-10-25 17:14:18', null, '1', '0'), ('168', '申诉', null, '2016-10-25 17:14:31', null, '1', '0'), ('169', 'aa', null, '2016-10-25 17:25:22', null, '1', '0'), ('170', 'dd', null, '2016-10-25 17:25:30', null, '1', '0'), ('171', 'dd', null, '2016-10-25 17:25:30', null, '1', '0'), ('172', 'aa', null, '2016-10-25 17:35:06', null, '1', '0'), ('173', 'ss', null, '2016-10-25 17:35:13', null, '1', '0'), ('174', 'sadf', null, '2016-10-25 18:49:01', null, '1', '0'), ('175', '非人非', null, '2016-10-25 18:49:12', null, '2', '0'), ('176', '非人非', null, '2016-10-25 18:49:12', null, '2', '0');
COMMIT;

-- ----------------------------
--  Table structure for `t_owner`
-- ----------------------------
DROP TABLE IF EXISTS `t_owner`;
CREATE TABLE `t_owner` (
  `user_id` int(11) NOT NULL,
  `room_num` int(255) DEFAULT NULL,
  `owner_pwd` varchar(255) DEFAULT NULL,
  `bank_card` varchar(255) DEFAULT NULL,
  `intro` varchar(255) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `income` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT '0' COMMENT '0:正常/1:禁用／2:删除',
  `identity` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_owner`
-- ----------------------------
BEGIN;
INSERT INTO `t_owner` VALUES ('1', null, null, null, null, '2016-09-28 16:28:19', null, '0', null), ('4', null, null, null, null, '2016-10-15 16:48:53', null, '0', null);
COMMIT;

-- ----------------------------
--  Table structure for `t_share`
-- ----------------------------
DROP TABLE IF EXISTS `t_share`;
CREATE TABLE `t_share` (
  `share_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `house_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`share_id`),
  KEY `house_id` (`house_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `fk_share_house` FOREIGN KEY (`house_id`) REFERENCES `t_house` (`house_id`),
  CONSTRAINT `fk_share_user` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_share`
-- ----------------------------
BEGIN;
INSERT INTO `t_share` VALUES ('1', '赛艇', '5', '1'), ('2', '撒房东', '5', '1'), ('3', '撒房东', '5', '1'), ('4', '撒房东', '5', '1'), ('5', '撒风', '5', '1'), ('6', '撒风', '5', '1'), ('7', '撒风', '5', '1'), ('8', '撒风', '5', '1'), ('9', 'ag', '5', '1'), ('10', 'dsag', '5', '1'), ('11', 'sdg', '5', '1'), ('12', 'sdg', '5', '1');
COMMIT;

-- ----------------------------
--  Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `nick_name` varchar(20) DEFAULT NULL,
  `tel` varchar(12) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `birth_year` int(4) DEFAULT NULL,
  `birth_month` int(2) DEFAULT NULL,
  `birth_day` int(2) DEFAULT NULL,
  `is_owner` int(1) DEFAULT NULL,
  `pwd` varchar(10) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `intro` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `thumb_img` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT '0' COMMENT '0:正常/1:禁用／2:删除',
  `address` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_user`
-- ----------------------------
BEGIN;
INSERT INTO `t_user` VALUES ('1', 'li', 'yi', 'fg', '13212344321', 'gr', '45', null, null, '1', '321', null, '2016-09-28 16:25:30', null, null, null, 'img/booklist/user_img.png', '0', null, null), ('2', 'wang', 'er', null, 'erwt', null, null, null, null, null, null, null, '2016-09-29 16:38:42', null, null, null, 'img/booklist/user_img.png', '0', null, null), ('3', '已', '4', null, '45364', null, null, null, null, null, null, null, '2016-10-11 12:58:37', null, null, null, 'img/booklist/user_img.png', '0', null, null), ('4', '房', '东', null, '343565', null, null, null, null, null, null, null, '2016-10-15 16:46:59', null, null, null, null, '0', null, null), ('5', null, null, null, '123', null, null, null, null, null, '321', null, '2016-10-19 15:40:38', null, null, null, null, '0', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `t_user_hobby`
-- ----------------------------
DROP TABLE IF EXISTS `t_user_hobby`;
CREATE TABLE `t_user_hobby` (
  `user_id` int(11) NOT NULL,
  `hobby_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`hobby_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_user_hobby`
-- ----------------------------
BEGIN;
INSERT INTO `t_user_hobby` VALUES ('1', '1'), ('1', '2'), ('1', '7'), ('2', '8'), ('2', '9'), ('2', '13'), ('3', '2'), ('3', '3'), ('3', '5'), ('3', '11'), ('4', '1'), ('4', '2');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
