/*
Navicat MySQL Data Transfer

Source Server         : Loca
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : db_evalys

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2020-03-27 10:08:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_end
-- ----------------------------
DROP TABLE IF EXISTS `tb_end`;
CREATE TABLE `tb_end` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `assessor` varchar(255) DEFAULT NULL,
  `acknowledge` varchar(255) DEFAULT NULL,
  `ojt_date` datetime DEFAULT NULL,
  `eval_date` datetime DEFAULT NULL,
  `ex_date` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_end
-- ----------------------------
INSERT INTO `tb_end` VALUES ('1', '123456', '123456', '123456', '2020-03-02 00:00:00', '2020-03-24 00:00:00', '2021-03-24 00:00:00', 'PASSED', 'CNC 01', '2020-03-27 03:57:56');

-- ----------------------------
-- Table structure for tb_eval
-- ----------------------------
DROP TABLE IF EXISTS `tb_eval`;
CREATE TABLE `tb_eval` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quest` varchar(255) DEFAULT NULL,
  `ojt_id` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_eval
-- ----------------------------
INSERT INTO `tb_eval` VALUES ('1', 'test', '1', null);
INSERT INTO `tb_eval` VALUES ('2', 'test', '1', null);
INSERT INTO `tb_eval` VALUES ('3', 'test lgu', '1', null);

-- ----------------------------
-- Table structure for tb_ojt
-- ----------------------------
DROP TABLE IF EXISTS `tb_ojt`;
CREATE TABLE `tb_ojt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `due_date` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_ojt
-- ----------------------------
INSERT INTO `tb_ojt` VALUES ('1', 'K001', 'CNC 01', '1', null);

-- ----------------------------
-- Table structure for tb_telegram
-- ----------------------------
DROP TABLE IF EXISTS `tb_telegram`;
CREATE TABLE `tb_telegram` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_nik` varchar(255) DEFAULT NULL,
  `telegram_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_telegram
-- ----------------------------
INSERT INTO `tb_telegram` VALUES ('1', '12345', '384920975');

-- ----------------------------
-- Table structure for tb_tmpr
-- ----------------------------
DROP TABLE IF EXISTS `tb_tmpr`;
CREATE TABLE `tb_tmpr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `end_id` int(11) DEFAULT NULL,
  `name_FILE` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_tmpr
-- ----------------------------

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('4', '12345', null, null, 'admin', null);
INSERT INTO `tb_user` VALUES ('5', '123456', null, null, 'champion', null);

-- ----------------------------
-- Table structure for tb_value
-- ----------------------------
DROP TABLE IF EXISTS `tb_value`;
CREATE TABLE `tb_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `criteria` text,
  `created_at` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_value
-- ----------------------------
INSERT INTO `tb_value` VALUES ('1', '123456', '1', 'test', 'test', '03:57:56');
INSERT INTO `tb_value` VALUES ('2', '123456', '1', 'test', 'test', '03:57:56');
INSERT INTO `tb_value` VALUES ('3', '123456', '1', 'test', 'test lgu', '03:57:56');
