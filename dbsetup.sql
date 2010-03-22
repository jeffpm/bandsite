DROP DATABASE band;
CREATE DATABASE IF NOT EXISTS band;
GRANT ALL PRIVILEGES ON band.* to 'banduser'@'localhost' identified by 'band';
--
-- Table structure for table `abduction_reports`
--
USE band;

CREATE TABLE IF NOT EXISTS `accounts` (`userid` smallint(6) NOT NULL AUTO_INCREMENT, `username` varchar(50) NOT NULL, `password` varchar(40) NOT NULL, `firstname` varchar(50) NOT NULL, `lastname` varchar(50) NOT NULL, `email` varchar(50) NOT NULL, PRIMARY KEY (`userid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO accounts (username, password, firstname, lastname, email) VALUES ('test', SHA('password'), 'Jeff', 'McElhannon', 'jeffpm@gmail.com');

CREATE TABLE IF NOT EXISTS `venues` (`venueid` smallint(6) NOT NULL AUTO_INCREMENT, `name` varchar(50) NOT NULL, `picture` varchar(50) NOT NULL, `address` varchar(30) NOT NULL, `city` varchar(50) NOT NULL, `state` varchar(50) NOT NULL, `zip` INT NOT NULL, `description` BLOB NOT NULL, `userid` smallint(6) NOT NULL, PRIMARY KEY (`venueid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT into venues (name, picture, address, city, state, zip, description, userid) VALUES ('UMW', 'tempVenue.jpg', '1301 College Ave', 'Fredericksburg', 'Virginia', 22401, 'Test', 1);

CREATE TABLE IF NOT EXISTS `events` ( `eventid` smallint(6) NOT NULL AUTO_INCREMENT, `date` date NOT NULL, `venueid` INT NOT NULL, `bandid` INT NOT NULL, `description` BLOB NOT NULL, PRIMARY KEY (`eventid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `bands` (`bandid` smallint(6) NOT NULL AUTO_INCREMENT, `userid` smallint(6) NOT NULL, `bandname` varchar(50) NOT NULL, `picture` varchar(50) NOT NULL, `city` varchar(30) NOT NULL, `state` varchar(30) NOT NULL, `description` BLOB NOT NULL, PRIMARY KEY (`bandid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Rockers', '1', 'tempBand.jpg', 'Cleveland', 'Ohio', 'metal');

CREATE TABLE IF NOT EXISTS `albums` (`albumid` smallint(6) NOT NULL AUTO_INCREMENT, `albumname` varchar(20), `albumyear` smallint(4), `albumband` smallint(6), `albumgenre` varchar(50), `picture` varchar(50) NOT NULL, PRIMARY KEY (`albumid`)) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `bandmembers` (`memberid` smallint(6) NOT NULL AUTO_INCREMENT, `membername` varchar(30) NOT NULL, `bandid` smallint(6) NOT NULL, PRIMARY KEY (`memberid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `genre` (`genreid` smallint(6) NOT NULL AUTO_INCREMENT, `genre` varchar(30) NOT NULL, PRIMARY KEY (`genreid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `bandgenre` (`bandid` smallint(6) NOT NULL, `genreid` smallint(6) NOT NULL) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ;

CREATE TABLE IF NOT EXISTS `comments` (`commentid` smallint(6) NOT NULL AUTO_INCREMENT, `bandid` smallint(6), `name` varchar(30) NOT NULL, `comment` blob, `date` date, PRIMARY KEY (`commentid`)) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;