/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : db_apl_bappenas_tes

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 21/03/2023 23:49:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_jenis_kelamin
-- ----------------------------
DROP TABLE IF EXISTS `m_jenis_kelamin`;
CREATE TABLE `m_jenis_kelamin`  (
  `id_jk` int NOT NULL AUTO_INCREMENT,
  `nama_jk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_jk`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of m_jenis_kelamin
-- ----------------------------
INSERT INTO `m_jenis_kelamin` VALUES (1, 'Laki-Laki');
INSERT INTO `m_jenis_kelamin` VALUES (2, 'Perempuan');

-- ----------------------------
-- Table structure for t_pendaftar
-- ----------------------------
DROP TABLE IF EXISTS `t_pendaftar`;
CREATE TABLE `t_pendaftar`  (
  `id_pendaftar` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tempat_lhr` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_lhr` date NULL DEFAULT NULL,
  `jenis_kelamin` enum('1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_tlp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `path_foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pendaftar`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_pendaftar
-- ----------------------------
INSERT INTO `t_pendaftar` VALUES (1, 'Rahadithia Prayudha', 'Tangerang', '1998-05-19', '1', 'Kp. Kresek Rt.001/010', 'rahadithia@gmail.com', '0895344302474', '1679389591189.png', '2023-03-21 00:00:00', '2023-03-21 04:20:44');

SET FOREIGN_KEY_CHECKS = 1;
