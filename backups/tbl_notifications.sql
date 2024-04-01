/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3307
 Source Server Type    : MySQL
 Source Server Version : 100420
 Source Host           : localhost:3307
 Source Schema         : enrollmentlp

 Target Server Type    : MySQL
 Target Server Version : 100420
 File Encoding         : 65001

 Date: 14/12/2021 16:28:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_notifications
-- ----------------------------
DROP TABLE IF EXISTS `tbl_notifications`;
CREATE TABLE `tbl_notifications`  (
  `notif_id` int NOT NULL AUTO_INCREMENT,
  `sy_id` int NULL DEFAULT NULL,
  `notif_status` int NOT NULL,
  PRIMARY KEY (`notif_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
