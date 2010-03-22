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

INSERT into venues (name, picture, address, city, state, zip, description, userid) VALUES ('UMW', 'UMW.jpg', '1301 College Ave', 'Fredericksburg', 'Virginia', 22401, 'UMW has The Underground, Dodd Auditorium and the Great Hall in Woodard Campus Center', 1);

CREATE TABLE IF NOT EXISTS `events` ( `eventid` smallint(6) NOT NULL AUTO_INCREMENT, `date` date NOT NULL, `venueid` INT NOT NULL, `bandid` INT NOT NULL, `description` BLOB NOT NULL, PRIMARY KEY (`eventid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `bands` (`bandid` smallint(6) NOT NULL AUTO_INCREMENT, `userid` smallint(6) NOT NULL, `bandname` varchar(50) NOT NULL, `picture` varchar(50) NOT NULL, `city` varchar(30) NOT NULL, `state` varchar(30) NOT NULL, `description` BLOB NOT NULL, PRIMARY KEY (`bandid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Lady Antebellum', '1', 'ladya.jpg', 'Nashville', 'Tennessee', 'country');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Black Eyed Peas', '1', 'blackeyedpeas.jpg', 'Los Angeles', 'California', 'R&B');

CREATE TABLE IF NOT EXISTS `albums` (`albumid` smallint(6) NOT NULL AUTO_INCREMENT, `albumname` varchar(20), `albumyear` smallint(4), `albumband` smallint(6), `albumgenre` varchar(50), `picture` varchar(50) NOT NULL, PRIMARY KEY (`albumid`)) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Lady Antebellum', 2008, '1', 'country', 'tempBand.jpg')

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Need You Now', 2010, '1', 'country', 'tempBand.jpg')

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Behind the Front', 1998, '2', 'R&B', 'tempBand.jpg')

CREATE TABLE IF NOT EXISTS `bandmembers` (`memberid` smallint(6) NOT NULL AUTO_INCREMENT, `membername` varchar(30) NOT NULL, `bandid` smallint(6) NOT NULL, PRIMARY KEY (`memberid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO bandmembers (membername, bandid) VALUES ('Dave Haywood', '1');

INSERT INTO bandmembers (membername, bandid) VALUES ('Charles Kelley', '1');

INSERT INTO bandmembers (membername, bandid) VALUES ('Hillary Scott', '1');

INSERT INTO bandmembers (membername, bandid) VALUES ('will.i.am', '2');

INSERT INTO bandmembers (membername, bandid) VALUES ('Fergie', '2');

INSERT INTO bandmembers (membername, bandid) VALUES ('Taboo', '2');

INSERT INTO bandmembers (membername, bandid) VALUES ('apl.de.ap', '2');

CREATE TABLE IF NOT EXISTS `genre` (`genreid` smallint(6) NOT NULL AUTO_INCREMENT, `genre` varchar(30) NOT NULL, PRIMARY KEY (`genreid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO genre (genre) VALUES ('country');

INSERT INTO genre (genre) VALUES ('R&B');

CREATE TABLE IF NOT EXISTS `bandgenre` (`bandid` smallint(6) NOT NULL, `genreid` smallint(6) NOT NULL) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ;

INSERT INTO bandgenre (bandid, genreid) VALUES ('1', '1');

INSERT INTO bandgenre (bandid, genreid) VALUES ('2', '2');

CREATE TABLE IF NOT EXISTS `comments` (`commentid` smallint(6) NOT NULL AUTO_INCREMENT, `bandid` smallint(6), `name` varchar(30) NOT NULL, `comment` blob, `date` date, PRIMARY KEY (`commentid`)) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;