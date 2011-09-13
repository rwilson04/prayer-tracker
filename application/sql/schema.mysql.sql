create database tracker;
create user 'tracker'@'localhost' identified by 'igad0427';
grant all privileges on tracker.* to 'tracker'@'localhost' with grant option;


--SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `auth_sources`
-- ----------------------------
DROP TABLE IF EXISTS `auth_sources`;
CREATE TABLE `auth_sources` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `name` varchar(50) NOT NULL,
	  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of auth_sources
-- ----------------------------
INSERT INTO `auth_sources` VALUES ('1', 'Googe');
INSERT INTO `auth_sources` VALUES ('2', 'Yahoo');
INSERT INTO `auth_sources` VALUES ('3', 'Facebook');

-- ----------------------------
-- Table structure for `trackable_types`
-- ----------------------------
DROP TABLE IF EXISTS `trackable_types`;
CREATE TABLE `trackable_types` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `type` varchar(50) NOT NULL,
	  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `name` varchar(50) NOT NULL,
	  `url` varchar(50) NOT NULL,
	  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for `status_states`
-- ----------------------------
DROP TABLE IF EXISTS `status_states`;
CREATE TABLE `status_states` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `state` varchar(50) NOT NULL,
	  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `username` varchar(30) NOT NULL,
	  `auth_source_id` int(11) NOT NULL,
	  `full_name` varchar(50) NOT NULL,
	  `email` varchar(255) DEFAULT NULL,
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `unique auth` (`username`,`auth_source_id`),
	  KEY `user_auth_source_id` (`auth_source_id`),
	  CONSTRAINT `user_auth_source_id` FOREIGN KEY (`auth_source_id`) REFERENCES `auth_sources` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for `trackables`
-- ----------------------------
DROP TABLE IF EXISTS `trackables`;
CREATE TABLE `trackables` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `title` varchar(50) NOT NULL,
	  `trackable_type_id` int(11) NOT NULL,
	  `user_id` int(11) NOT NULL,
	  PRIMARY KEY (`id`),
	  KEY `trackable_types` (`trackable_type_id`),
	  KEY `trackable_user_id` (`user_id`),
	  CONSTRAINT `trackable_types` FOREIGN KEY (`trackable_type_id`) REFERENCES `trackable_types` (`id`) ON UPDATE CASCADE,
	  CONSTRAINT `trackable_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for `trackable_statuses`
-- ----------------------------
DROP TABLE IF EXISTS `trackable_statuses`;
CREATE TABLE `trackable_statuses` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `trackable_id` int(11) NOT NULL,
	  `status` text NOT NULL,
	  `date` datetime NOT NULL,
	  `status_state_id` int(11) NOT NULL DEFAULT '1',
	  PRIMARY KEY (`id`),
	  KEY `status_states` (`status_state_id`),
	  KEY `status_trackable_id` (`trackable_id`),
	  CONSTRAINT `status_states` FOREIGN KEY (`status_state_id`) REFERENCES `status_states` (`id`) ON UPDATE CASCADE,
	  CONSTRAINT `status_trackable_id` FOREIGN KEY (`trackable_id`) REFERENCES `trackables` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for `trackable_groups`
-- ----------------------------
DROP TABLE IF EXISTS `trackable_groups`;
CREATE TABLE `trackable_groups` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `trackable_id` int(11) NOT NULL,
	  `group_id` int(11) NOT NULL,
	  PRIMARY KEY (`id`),
	  KEY `tg_trackable_id` (`trackable_id`),
	  KEY `tg_group_id` (`group_id`),
	  CONSTRAINT `tg_trackable_id` FOREIGN KEY (`trackable_id`) REFERENCES `trackables` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	  CONSTRAINT `tg_group_id` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for `user_groups`
-- ----------------------------
DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE `user_groups` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `user_id` int(11) NOT NULL,
	  `group_id` int(11) NOT NULL,
	  `moderator` enum('0','1') NOT NULL DEFAULT '0',
	  PRIMARY KEY (`id`),
	  KEY `ug_user_id` (`user_id`),
	  KEY `ug_group_id` (`group_id`),
	  CONSTRAINT `ug_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	  CONSTRAINT `ug_group_id` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



