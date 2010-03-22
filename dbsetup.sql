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

INSERT into venues (name, picture, address, city, state, zip, description, userid) VALUES ('UMW', 'UMW.jpg', '1301 College Ave', 'Fredericksburg', 'Virginia', 22401, 'UMW has The Underground, Dodd Auditorium and the Great Hall in Woodard Campus Center.', 1);

INSERT into venues (name, picture, address, city, state, zip, description, userid) VALUES ('The Otter House', 'otterhouse.png', '1005 Princess Anne St', 'Fredericksburg', 'Virginia', 22401, 'The Otter House is a full restaurant with an upstairs bar and music venue.', 1);

INSERT into venues (name, picture, address, city, state, zip, description, userid) VALUES ('Nissan Pavillion', 'nissan.jpg', '7800 Cellar Door Dr', 'Bristow', 'Virginia', 20136, 'Nissan Pavillion was built in 1995 and has had many memorable performances including Aerosmith, Steely Dan, and the Village People.', 1);

CREATE TABLE IF NOT EXISTS `events` ( `eventid` smallint(6) NOT NULL AUTO_INCREMENT, `date` date NOT NULL, `venueid` INT NOT NULL, `bandid` INT NOT NULL, `description` BLOB NOT NULL, PRIMARY KEY (`eventid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO events (date, venueid, bandid, description) VALUES ('2010-05-03', '3', '1', "Doors open at 6:00pm. Show starts at 8:00pm.");

INSERT INTO events (date, venueid, bandid, description) VALUES ('2010-05-13', '3', '6', "Doors open at 7:00pm. Show starts at 8:30pm.");

INSERT INTO events (date, venueid, bandid, description) VALUES ('2010-04-09', '1', '4', "Held in the Great Hall. Doors open at 7:15pm. Show starts at 8:00pm.");

INSERT INTO events (date, venueid, bandid, description) VALUES ('2010-06-15', '2', '3', "Show starts at 9:00pm.");

CREATE TABLE IF NOT EXISTS `bands` (`bandid` smallint(6) NOT NULL AUTO_INCREMENT, `userid` smallint(6) NOT NULL, `bandname` varchar(50) NOT NULL, `picture` varchar(50) NOT NULL, `city` varchar(30) NOT NULL, `state` varchar(30) NOT NULL, `description` BLOB NOT NULL, PRIMARY KEY (`bandid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Lady Antebellum', '1', 'ladya.jpg', 'Nashville', 'Tennessee', 'This group was formed in 2006 and has quickly become popular. They newest album is #3 on the Billboard Charts.');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Black Eyed Peas', '1', 'blackeyedpeas.jpg', 'Los Angeles', 'California', 'The Black Eyed Peas have had many members throughout their 15 years. They have won multiple Grammy Awards.');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Zac Brown Band', '1', 'zacbrownband.jpg', 'Atlanta', 'Georgia', 'The band was started in 2000 and has been nominated for multiple awards. They won Best New Artist at the Grammy Awards this year.');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Lifehouse', '1', 'lifehouse.jpg', 'Los Angeles', 'California', 'Their song "Hanging by a Moment" was a hit single in 2001. The have put out five albums.');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Led Zeppelin', '1', 'zeppelin.jpg', 'London', 'England', 'They started in 1968.  The band has sold over 200 million albums worldwide.');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Destiny\'s Child', '1', 'destiny.jpg', 'Houston', 'Texas', 'This American group was formed in 1997 and created multiple albums.');

CREATE TABLE IF NOT EXISTS `albums` (`albumid` smallint(6) NOT NULL AUTO_INCREMENT, `albumname` varchar(20), `albumyear` smallint(4), `albumband` smallint(6), `albumgenre` varchar(50), `picture` varchar(50) NOT NULL, PRIMARY KEY (`albumid`)) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Lady Antebellum', 2008, '1', 'country', 'ladyaAlbum1.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Need You Now', 2010, '1', 'country', 'ladyaAlbum2.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Monkey Business', 2005, '2', 'R&B', 'blackeyedpeasAlbum1.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Home Grown', 2005, '3', 'country', 'zacAlbum1.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('The Foundation', 2008, '3', 'country', 'zacAlbum2.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('No Name Face', 2000, '4', 'alternative rock', 'lifehouseAlbum1.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Smoke and Mirrors', 2010, '4', 'alternative rock', 'lifehouseAlbum2.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Led Zeppelin', 1969, '5', 'hard rock', 'zeppelinAlbum1.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Led Zeppelin II', 1969, '5', 'hard rock', 'zeppelinAlbum2.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Led Zeppelin III', 1970, '5', 'heavy metal', 'zeppelinAlbum3.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Led Zeppelin IV', 1971, '5', 'heavy metal', 'zeppelinAlbum4.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Survivor', 2001, '6', 'pop', 'destinyAlbum1.jpg');

CREATE TABLE IF NOT EXISTS `bandmembers` (`memberid` smallint(6) NOT NULL AUTO_INCREMENT, `membername` varchar(30) NOT NULL, `bandid` smallint(6) NOT NULL, PRIMARY KEY (`memberid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO bandmembers (membername, bandid) VALUES ('Dave Haywood', '1');

INSERT INTO bandmembers (membername, bandid) VALUES ('Charles Kelley', '1');

INSERT INTO bandmembers (membername, bandid) VALUES ('Hillary Scott', '1');

INSERT INTO bandmembers (membername, bandid) VALUES ('will.i.am', '2');

INSERT INTO bandmembers (membername, bandid) VALUES ('Fergie', '2');

INSERT INTO bandmembers (membername, bandid) VALUES ('Taboo', '2');

INSERT INTO bandmembers (membername, bandid) VALUES ('apl.de.ap', '2');

INSERT INTO bandmembers (membername, bandid) VALUES ('Zac Brown', '3');

INSERT INTO bandmembers (membername, bandid) VALUES ('Clay Cook', '3');

INSERT INTO bandmembers (membername, bandid) VALUES ('Coy Bowles', '3');

INSERT INTO bandmembers (membername, bandid) VALUES ('John Driskell Hopkins', '3');

INSERT INTO bandmembers (membername, bandid) VALUES ('Chris Fryar', '3');

INSERT INTO bandmembers (membername, bandid) VALUES ('Jimmy De Martini', '3');

INSERT INTO bandmembers (membername, bandid) VALUES ('Jason Wade', '4');

INSERT INTO bandmembers (membername, bandid) VALUES ('Rick Woolstenhulme, Jr.', '4');

INSERT INTO bandmembers (membername, bandid) VALUES ('Bryce Soderberg', '4');

INSERT INTO bandmembers (membername, bandid) VALUES ('Ben Carey', '4');

INSERT INTO bandmembers (membername, bandid) VALUES ('Jimmy Page', '5');

INSERT INTO bandmembers (membername, bandid) VALUES ('John Paul Jones', '5');

INSERT INTO bandmembers (membername, bandid) VALUES ('Robert Plant', '5');

INSERT INTO bandmembers (membername, bandid) VALUES ('John Bonham', '5');

INSERT INTO bandmembers (membername, bandid) VALUES ('Beyonce Knowles', '6');

INSERT INTO bandmembers (membername, bandid) VALUES ('Kelly Rowland', '6');

INSERT INTO bandmembers (membername, bandid) VALUES ('Michelle Williams', '6');

CREATE TABLE IF NOT EXISTS `genre` (`genreid` smallint(6) NOT NULL AUTO_INCREMENT, `genre` varchar(30) NOT NULL, PRIMARY KEY (`genreid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO genre (genre) VALUES ('country');

INSERT INTO genre (genre) VALUES ('hip-hop');

INSERT INTO genre (genre) VALUES ('pop');

INSERT INTO genre (genre) VALUES ('R&B');

INSERT INTO genre (genre) VALUES ('alternative rock');

INSERT INTO genre (genre) VALUES ('hard rock');

INSERT INTO genre (genre) VALUE ('heavy metal');

CREATE TABLE IF NOT EXISTS `bandgenre` (`bandid` smallint(6) NOT NULL, `genreid` smallint(6) NOT NULL) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ;

INSERT INTO bandgenre (bandid, genreid) VALUES ('1', '1');

INSERT INTO bandgenre (bandid, genreid) VALUES ('1', '3');

INSERT INTO bandgenre (bandid, genreid) VALUES ('2', '4');

INSERT INTO bandgenre (bandid, genreid) VALUES ('2', '2');

INSERT INTO bandgenre (bandid, genreid) VALUES ('3', '1');

INSERT INTO bandgenre (bandid, genreid) VALUES ('4', '5');

INSERT INTO bandgenre (bandid, genreid) VALUES ('5', '6');

INSERT INTO bandgenre (bandid, genreid) VALUES ('5', '7');

INSERT INTO bandgenre (bandid, genreid) VALUES ('6', '3');

INSERT INTO bandgenre (bandid, genreid) VALUES ('6', '4');

CREATE TABLE IF NOT EXISTS `comments` (`commentid` smallint(6) NOT NULL AUTO_INCREMENT, `bandid` smallint(6), `name` varchar(30) NOT NULL, `comment` blob, `date` date, PRIMARY KEY (`commentid`)) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;