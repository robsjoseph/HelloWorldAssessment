/*
Navicat MySQL Data Transfer

Source Server         : MCASQL01
Source Server Version : 50529
Source Host           : 209.142.242.83:3306
Source Database       : userregistration

Target Server Type    : MYSQL
Target Server Version : 50529
File Encoding         : 65001

Date: 2014-07-22 11:54:17
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(60) DEFAULT NULL,
  `LastName` varchar(60) DEFAULT NULL,
  `Address1` varchar(100) DEFAULT NULL,
  `Address2` varchar(100) DEFAULT NULL,
  `City` text,
  `State` text,
  `Zip` varchar(10) DEFAULT NULL,
  `Country` text,
  `Timestamp` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
