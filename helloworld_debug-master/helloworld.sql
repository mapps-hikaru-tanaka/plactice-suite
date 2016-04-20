CREATE DATABASE IF NOT EXISTS `kadai_20141216`
USE `kadai_20141216`;

CREATE TABLE IF NOT EXISTS `master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chara` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `chiled` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `master_id` int(11) NOT NULL,
  `big_chara_flag` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `master_id` (`master_id`),
  CONSTRAINT `chiled_ibfk_1` FOREIGN KEY (`master_id`) REFERENCES `master` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `master` (`id`, `chara`) VALUES
  (1, 'a'),
  (2, 'b'),
  (3, 'c'),
  (4, 'd'),
  (5, 'e'),
  (6, 'f'),
  (7, 'g'),
  (8, 'h'),
  (9, 'i'),
  (10, 'j'),
  (11, 'k'),
  (12, 'l'),
  (13, 'm'),
  (14, 'n'),
  (15, 'o'),
  (16, 'p'),
  (17, 'q'),
  (18, 'r'),
  (19, 's'),
  (20, 't'),
  (21, 'u'),
  (22, 'v'),
  (23, 'w'),
  (24, 'x'),
  (25, 'y'),
  (26, 'z');

INSERT INTO `chiled` (`id`, `master_id`, `big_chara_flag`) VALUES
  (1, 8, 1),
  (2, 5, 0),
  (3, 12, 0),
  (4, 12, 0),
  (5, 15, 0),
  (6, 23, 0),
  (7, 15, 0),
  (8, 18, 0),
  (9, 12, 0),
  (10, 4, 0);
