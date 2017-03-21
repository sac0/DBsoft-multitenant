CREATE TABLE IF NOT EXISTS `login`.`userd` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci ,
  `user_dob` date COLLATE utf8_unicode_ci  ,
  `user_g` varchar(64) COLLATE utf8_unicode_ci  ,
  `user_n` varchar(64) COLLATE utf8_unicode_ci ,
  `user_co` varchar(64) COLLATE utf8_unicode_ci ,
  `user_spc` varchar(64) COLLATE utf8_unicode_ci ,
   `user_ba` varchar(64) COLLATE utf8_unicode_ci ,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) 