CREATE DATABASE IF NOT EXISTS band;
GRANT ALL PRIVILEGES ON band.* to 'banduser'@'localhost' identified by 'band';
--
-- Table structure for table `abduction_reports`
--
USE band;



CREATE TABLE IF NOT EXISTS `accounts` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

INSERT INTO accounts (username, password, firstname, lastname, email) VALUES ('test', 'password', 'Jeff', 'McElhannon', 'jeffpm@gmail.com');

CREATE TABLE IF NOT EXISTS `venues` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` varchar(30) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` INT NOT NULL,
  `description` BLOB NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT into venues (name, address, city, state, zip, description, username) VALUES ('UMW', '1301 College Ave', 'Fredericksburg', 'Virginia', 22401, 'Test', 'Test');
CREATE TABLE IF NOT EXISTS `events` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `venueid` INT NOT NULL,
  `bandid` INT NOT NULL,
  `description` BLOB NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `bands` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `bandname` varchar(50) NOT NULL,
  `members` varchar(150) NOT NULL,
  `description` BLOB NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `albums` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `album_name` varchar(20),
  `album_year` smallint(4),
  `album_band` smallint(6),
  `album_genre` varchar(50),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
