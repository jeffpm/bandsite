DROP DATABASE band;
CREATE DATABASE IF NOT EXISTS band;
GRANT ALL PRIVILEGES ON band.* to 'banduser'@'localhost' identified by 'band';
--
-- Table structure for table `abduction_reports`
--
USE band;

CREATE TABLE IF NOT EXISTS `accounts` (`userid` smallint(6) NOT NULL AUTO_INCREMENT, `username` varchar(50) NOT NULL, `password` varchar(30) NOT NULL, `firstname` varchar(50) NOT NULL, `lastname` varchar(50) NOT NULL, `email` varchar(50) NOT NULL, PRIMARY KEY (`userid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

INSERT INTO accounts (username, password, firstname, lastname, email) VALUES ('test', 'password', 'Jeff', 'McElhannon', 'jeffpm@gmail.com');

CREATE TABLE IF NOT EXISTS `venues` (`venueid` smallint(6) NOT NULL AUTO_INCREMENT, `name` varchar(50) NOT NULL, `picture` varchar(50) NOT NULL, `address` varchar(30) NOT NULL, `city` varchar(50) NOT NULL, `state` varchar(50) NOT NULL, `zip` INT NOT NULL, `description` BLOB NOT NULL, `userid` smallint(6) NOT NULL, PRIMARY KEY (`venueid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT into venues (name, address, city, state, zip, description, userid) VALUES ('UMW', '1301 College Ave', 'Fredericksburg', 'Virginia', 22401, 'Test', 1);

CREATE TABLE IF NOT EXISTS `events` ( `eventid` smallint(6) NOT NULL AUTO_INCREMENT, `date` date NOT NULL, `venueid` INT NOT NULL, `bandid` INT NOT NULL, `description` BLOB NOT NULL, PRIMARY KEY (`eventid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `bands` (`bandid` smallint(6) NOT NULL AUTO_INCREMENT, `bandname` varchar(50) NOT NULL, `members` varchar(150) NOT NULL, `description` BLOB NOT NULL, PRIMARY KEY (`bandid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO bands (bandname, members, description) VALUES ('Rockers', 'DudeBro McGhee, Johnny Rockstar', 'metal');

CREATE TABLE IF NOT EXISTS `albums` (`albumid` smallint(6) NOT NULL AUTO_INCREMENT, `album_name` varchar(20), `album_year` smallint(4), `album_band` smallint(6), `album_genre` varchar(50), PRIMARY KEY (`albumid`)) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `band_members` (`member_name` varchar(30) NOT NULL,`memberid` smallint(6) INT NOT NULL AUTO_INCREMENT PRIMARY KEY,`bandid` smallint(6) INT NOT NULL, FOREIGN KEY (bandid) REFERENCES bands (bandid) ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
