-- create planets table for ce06 in database slcc

CREATE TABLE `planets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `coordinates` varchar(50) NOT NULL,
  `description` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- reset auto_increment on planets

ALTER TABLE `planets` AUTO_INCREMENT=1

-- create planets table for ce07 in database ce07

CREATE TABLE `planets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `x_coord` int(11) unsigned NOT NULL,
  `y_coord` int(11) unsigned NOT NULL,
  `z_coord` int(11) unsigned NOT NULL,
  `description` varchar(1000) NOT NULL,
  `faction` varchar(20) NOT NULL DEFAULT 'Free Worlds',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;