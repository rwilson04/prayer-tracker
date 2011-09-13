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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of auth_sources
-- ----------------------------
INSERT INTO `auth_sources` VALUES ('1', 'Googe');
INSERT INTO `auth_sources` VALUES ('2', 'Yahoo');
INSERT INTO `auth_sources` VALUES ('3', 'Facebook');

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
	  KEY `fk_auth_source_id` (`auth_source_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

