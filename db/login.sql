CREATE DATABASE IF NOT EXISTS `Donation` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `Donation`;

CREATE TABLE `user` (
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` VALUES
('kiet_chung', '52200140@student.tdtu.edu.vn', '123456');

ALTER TABLE `user`
  ADD PRIMARY KEY (`name`);