SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for items
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items`  (
  `owner_id` int(11) NULL DEFAULT NULL,
  `object_id` int(11) NOT NULL DEFAULT 0,
  `item_id` int(11) NULL DEFAULT NULL,
  `count` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `enchant_level` int(11) NULL DEFAULT NULL,
  `loc` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `loc_data` int(11) NULL DEFAULT NULL,
  `time_of_use` int(11) NULL DEFAULT NULL,
  `custom_type1` int(11) NULL DEFAULT 0,
  `custom_type2` int(11) NULL DEFAULT 0,
  `mana_left` decimal(5, 0) NOT NULL DEFAULT -1,
  `time` decimal(13, 0) NOT NULL DEFAULT 0,
  PRIMARY KEY (`object_id`) USING BTREE,
  INDEX `owner_id`(`owner_id`) USING BTREE,
  INDEX `item_id`(`item_id`) USING BTREE,
  INDEX `loc`(`loc`) USING BTREE,
  INDEX `time_of_use`(`time_of_use`) USING BTREE,
  INDEX `idx_item_id`(`item_id`) USING BTREE,
  INDEX `idx_object_id`(`object_id`) USING BTREE,
  INDEX `idx_owner_id`(`owner_id`) USING BTREE,
  INDEX `idx_owner_id_loc`(`owner_id`, `loc`) USING BTREE,
  INDEX `idx_owner_id_item_id`(`owner_id`, `item_id`) USING BTREE,
  INDEX `idx_owner_id_loc_locdata`(`owner_id`, `loc`, `loc_data`) USING BTREE,
  INDEX `idx_owner_id_loc_locdata_enchant`(`owner_id`, `loc`, `loc_data`, `enchant_level`, `item_id`, `object_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
