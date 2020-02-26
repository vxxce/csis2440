-- create planets table

CREATE TABLE `planets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `coordinates` varchar(40) NOT NULL,
  `description` varchar(400) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- reset auto_increment on planets

ALTER TABLE `planets` AUTO_INCREMENT=1