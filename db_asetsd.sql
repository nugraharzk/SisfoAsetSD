/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100130
 Source Host           : localhost:3306
 Source Schema         : db_asetsd

 Target Server Type    : MySQL
 Target Server Version : 100130
 File Encoding         : 65001

 Date: 23/05/2018 02:01:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for kib_a
-- ----------------------------
DROP TABLE IF EXISTS `kib_a`;
CREATE TABLE `kib_a`  (
  `id_barang` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `reg` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_barang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `luas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahun_peroleh` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_hak` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `penggunaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cara_peroleh` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sumber_dana` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_barang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kondisi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `catatan_barang_baik` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `catatan_barang_rusak_ringan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `catatan_barang_rusak_berat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nilai_inventarisasi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `data_diinventarisasi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan_inventarisasi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `korelasi_dapodik` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `asal_sekolah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kib_a
-- ----------------------------
INSERT INTO `kib_a` VALUES ('0101110400257085708', '0003', 'Tanah Bangunan Pendidikan dan Latihan (Sekolah)', '814', '1998', 'Jl. Cigondewah Rahayu Kel/Desa. Cigondewah Rahayu Kec. Bandung Kulon / Wil. Tegallega Kota Bandung', 'Pakai', 'SDN 256 Cigondewah Hilir Bandung', 'Pembelian', '-', 'Inventaris', 'Baik', '412000000\r\n', '412000000\r\n', '-', '-', '412000000\r\n', '1', '-', 'ADA\r\n', 'SDN CIGONDEWAH HILIR\r\n');
INSERT INTO `kib_a` VALUES ('0101110400257085709', '0004', 'Gedung RKB', '500', '2012', 'Jl. Cigondewah Rahayu Kel/Desa. Cigondewah Rahayu Kec. Bandung Kulon / Wil. Tegallega Kota Bandung', 'Pakai', 'Baik', 'Pembelian', '-', 'Inventaris', 'Baik', '412000000\r\n', '412000000\r\n', '-', '-', '412000000\r\n', '1', '-', 'ADA', 'SDN CIGONDEWAH HILIR\r\n');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Administrator', 'admin', 'admin', 'Admin');
INSERT INTO `users` VALUES (2, 'Suwanda, S.Pd, M.M.Pd', 'kepsek', 'kepsek', 'Kepala Sekolah');
INSERT INTO `users` VALUES (3, 'Iis Jubaedah, S.Pd.I', 'bendahara', 'bendahara', 'Bendahara');

SET FOREIGN_KEY_CHECKS = 1;
