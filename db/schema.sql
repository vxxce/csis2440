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
  `faction` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- randomize faction
UPDATE planets SET faction=ELT(FLOOR(RAND() * 5) + 1, 'alliance', 'free worlds', 'rebels', 'pirates', 'imperial');

-- players table

CREATE TABLE `players` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- example insert into players
INSERT INTO `players` (`fname`, `lname`, `birthdate`, `email`, `password`)
  VALUES ('me', 'me', '1990-01-01', 'me@me.com', 'cdd50ads89234jasf73a8fs9a7s3');

-- add unique key
ALTER TABLE `players` ADD UNIQUE  (`email`);

-- show users
SELECT user from mysql.user;

-- grant permissions to existing user
GRANT [PRIVILEGE | ALL ] ON database.table to 'user'@'host';
FLUSH PRIVILEGES;

-- Create user with permissions
GRANT [PRIVILEGE | ALL ] ON database.table to 'user'@'host' IDENTIFIED BY password;
FLUSH PRIVILEGES;

-- show permissions 
SHOW GRANTS 'user';
