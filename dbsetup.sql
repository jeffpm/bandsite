DROP DATABASE band;
CREATE DATABASE IF NOT EXISTS band;
GRANT ALL PRIVILEGES ON band.* to 'banduser'@'localhost' identified by 'band';
--
-- Table structure for table `abduction_reports`
--
USE band;

CREATE TABLE IF NOT EXISTS `accounts` (`userid` smallint(6) NOT NULL AUTO_INCREMENT, `username` varchar(50) NOT NULL, `password` varchar(40) NOT NULL, `firstname` varchar(50) NOT NULL, `lastname` varchar(50) NOT NULL, `email` varchar(50) NOT NULL, PRIMARY KEY (`userid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO accounts (username, password, firstname, lastname, email) VALUES ('admin', SHA('admin'), 'admin', 'admin', 'admin@admin.com');

INSERT INTO accounts (username, password, firstname, lastname, email) VALUES ('test', SHA('password'), 'Jeff', 'McElhannon', 'jeffpm@gmail.com');

INSERT INTO accounts (username, password, firstname, lastname, email) VALUES ('jessica', SHA('jessica'), 'Jessica', 'Zeitz', 'jessica.zeitz@gmail.com');

INSERT INTO accounts (username, password, firstname, lastname, email) VALUES ('zwe', SHA('zwe'), 'Zwe', 'Maung', 'zmaung@mail.umw.edu');

INSERT INTO accounts (username, password, firstname, lastname, email) VALUES ('chris', SHA('chris'), 'Chris', 'Randles', 'crandles@mail.umw.edu');

INSERT INTO accounts (username, password, firstname, lastname, email) VALUES ('john', SHA('john'), 'John', 'Corrigan', 'jcorriga@mail.umw.edu');

INSERT INTO accounts (username, password, firstname, lastname, email) VALUES ('katherine', SHA('katherine'), 'Katherine', 'Beegle', 'kbeegle@mail.umw.edu');

CREATE TABLE IF NOT EXISTS `venues` (`venueid` smallint(6) NOT NULL AUTO_INCREMENT, `name` varchar(50) NOT NULL, INDEX (name), `picture` varchar(50) NOT NULL, `address` varchar(30) NOT NULL, `city` varchar(50) NOT NULL, `state` varchar(50) NOT NULL, `zip` INT NOT NULL, `description` BLOB NOT NULL, `userid` smallint(6) NOT NULL, PRIMARY KEY (`venueid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT into venues (name, picture, address, city, state, zip, description, userid) VALUES ('UMW', 'UMW.jpg', '1301 College Ave', 'Fredericksburg', 'Virginia', 22401, 'UMW has The Underground, Dodd Auditorium and the Great Hall in Woodard Campus Center.', 3);

INSERT into venues (name, picture, address, city, state, zip, description, userid) VALUES ('The Otter House', 'otterhouse.png', '1005 Princess Anne St', 'Fredericksburg', 'Virginia', 22401, 'The Otter House is a full restaurant with an upstairs bar and music venue.', 3);

INSERT into venues (name, picture, address, city, state, zip, description, userid) VALUES ('Nissan Pavillion', 'nissan.jpg', '7800 Cellar Door Dr', 'Bristow', 'Virginia', 20136, 'Nissan Pavillion was built in 1995 and has had many memorable performances including Aerosmith, Steely Dan, and the Village People.', 6);

INSERT into venues (name, picture, address, city, state, zip, description, userid) VALUES ('Wolf Trap', 'wolftrap.jpg', '1645 Trap Road', 'Vienna', 'Virginia', 22182, 'Wolf Trap is an outdoor amphitheater located in Vienna, Virginia. It hosts a variety of shows including concerts and operas', 4);

CREATE TABLE IF NOT EXISTS `events` ( `eventid` smallint(6) NOT NULL AUTO_INCREMENT, `date` date NOT NULL, `venueid` INT NOT NULL, `bandid` INT NOT NULL, `description` BLOB NOT NULL, PRIMARY KEY (`eventid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO events (date, venueid, bandid, description) VALUES ('2010-05-03', '3', '1', "Doors open at 6:00pm. Show starts at 8:00pm.");

INSERT INTO events (date, venueid, bandid, description) VALUES ('2010-05-13', '3', '6', "Doors open at 7:00pm. Show starts at 8:30pm.");

INSERT INTO events (date, venueid, bandid, description) VALUES ('2010-04-09', '1', '4', "Held in the Great Hall. Doors open at 7:15pm. Show starts at 8:00pm.");

INSERT INTO events (date, venueid, bandid, description) VALUES ('2010-06-15', '2', '3', "Show starts at 9:00pm.");

CREATE TABLE IF NOT EXISTS `bands` (`bandid` smallint(6) NOT NULL AUTO_INCREMENT, `userid` smallint(6) NOT NULL, `bandname` varchar(50) NOT NULL, INDEX (bandname), `picture` varchar(50) NOT NULL, `city` varchar(30) NOT NULL, `state` varchar(30) NOT NULL, `description` BLOB NOT NULL, PRIMARY KEY (`bandid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Lady Antebellum', '3', 'ladya.jpg', 'Nashville', 'Tennessee', 'This group was formed in 2006 and has quickly become popular. They newest album is #3 on the Billboard Charts.');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Black Eyed Peas', '4', 'blackeyedpeas.jpg', 'Los Angeles', 'California', 'The Black Eyed Peas have had many members throughout their 15 years. They have won multiple Grammy Awards.');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Zac Brown Band', '3', 'zacbrownband.jpg', 'Atlanta', 'Georgia', 'The band was started in 2000 and has been nominated for multiple awards. They won Best New Artist at the Grammy Awards this year.');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Lifehouse', '7', 'lifehouse.jpg', 'Los Angeles', 'California', 'Their song "Hanging by a Moment" was a hit single in 2001. The have put out five albums.');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Led Zeppelin', '5', 'zeppelin.jpg', 'London', 'England', 'They started in 1968.  The band has sold over 200 million albums worldwide.');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Destiny\'s Child', '2', 'destiny.jpg', 'Houston', 'Texas', 'This American group was formed in 1997 and created multiple albums.');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Taylor Swift', '3', 'taylorswift.jpg', 'Wyomissing', 'Pennsylvania', 'Taylor Swift is a 20 year old artist who has already over 60 awards in the music industry.');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Beyonce', '7', 'beyonce.jpg', 'Houston', 'Texas', 'She is an American R&B singer, songwriter, record producer, actress and model. In 2003, she released her debut solo album Dangerously in Love.');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('The White Stripes', '5', 'whitestripes.jpg', 'Detroit', 'Michigan', 'The White Stripes rose to prominence in 2002, as part of the garage rock revival scene. Their successful albums White Blood Cells and Elephant drew them attention from a large variety of media outlets in the United States and the United Kingdom.');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Hootie & the Blowfish', '6', 'hootie.jpg', 'Columbia', 'South Carolina', 'It is an American rock band that enjoyed widespread popularity in the second half of the 1990s. They were originally formed in 1986 at the University of South Carolina. The band has recorded seven studio albums to date, and has charted sixteen singles on various Billboard singles charts.');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Dave Matthews Band', '2', 'davematthews.jpg', 'Charlottesville', 'Virginia', 'The band is known for their annual summer-long tours of the US and Europe, featuring lengthy improvisational renditions of their songs, accompanied by elaborate video and lighting.');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('The Flaming Lips', '5', 'flaminglips.jpg', 'Oklahoma City', 'Oklahoma', 'The band is known for their lush, multi-layered, psychedelic arrangements, spacey lyrics and bizarre song and album titles. They are also acclaimed for their elaborate live shows, which feature costumes, balloons, puppets, video projections, complex stage light configurations, giant hands, large amounts of confetti, and frontman Wayne Coyne\'s signature man-sized plastic bubble, in which he traverses the audience.');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('The Avett Brothers', '6', 'avett.jpg', 'Concord', 'North Carolina', 'Risen from the ashes of Seth and Scott\'s former rock band Nemo, the Avett Brothers combine bluegrass, country, punk, pop melodies, folk, rock and roll, honky tonk, and ragtime to produce a sound described by the San Francisco Chronicle as having the "heavy sadness of Townes Van Zandt, the light pop concision of Buddy Holly, the tuneful jangle of the Beatles, the raw energy of the Ramones."');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('.38 Special', '2', '38special.jpg', 'Jacksonville', 'Florida', 'By the early 1980s, 38 Special began amalgamating southern rock and arena rock in their music, thereby kicking off a string of successful albums and singles. Their first high-charting song was "Hold On Loosely" (1981); "Caught Up In You" (1982) and "If I\'d Been The One" (1983) both hit #1 on Billboard magazine\'s Album Rock Tracks chart.');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Metallica', '2', 'metallica.jpg', 'Los Angeles', 'California', 'Metallica\'s early releases included fast tempos, instrumentals, and aggressive musicianship that placed them as one of the "big four" of the thrash metal subgenre alongside Slayer, Megadeth, and Anthrax during the genre\'s development into a popular style. The band earned a growing fan base in the underground music community and critical acclaim, with the 1986 release Master of Puppets described as one of the most influential and "heavy" thrash metal albums.');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Boyz II Men', '4', 'boyziimen.jpg', 'Philadelphia', 'Pennsylvania', 'It is an American rhythm and blues group. Based on sales, Boyz II Men is the most successful R&B male vocal group of all time. They recorded five number 1 R&B successes between 1992 and 1997 and have sold more than 60 million albums. Three of its number 1 hits set and exceeded records for the longest period of time a single remained scored at number 1 on the Billboard Hot 100; "One Sweet Day" still holds the record.');

INSERT INTO bands (bandname, userid, picture, city, state, description) VALUES ('Spice Girls', '7', 'spicegirls.jpg', 'London', 'England', 'They consisted of Victoria Beckham who was nicknamed Posh Spice, Melanie Brown nicknamed Scary Spice, Emma Bunton who was Baby Spice, Melanie Chisholm, Sporty Spice, and Geri Halliwell, Ginger Spice. They are the most successful girl group of all time. They were signed to Virgin Records and released their debut single, "Wannabe", in 1996. The song hit number-one in 31 countries and helped establish the group as a "global phenomenon".');

CREATE TABLE IF NOT EXISTS `albums` (`albumid` smallint(6) NOT NULL AUTO_INCREMENT, `albumname` varchar(40), `albumyear` smallint(4), `albumband` smallint(6), `albumgenre` varchar(50), `picture` varchar(50) NOT NULL, PRIMARY KEY (`albumid`)) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Fearless', 2008, '7', 'pop', 'taylorswiftAlbum1.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Dangerously in Love', 2003, '8', 'R&B', 'beyonceAlbum1.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('White Blood Cells', 2001, '9', 'alternative rock', 'whitestripesAlbum1.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Elephant', 2003, '9', 'alternative rock', 'whitestripesAlbum2.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Cracked Rear View', 1994, '10', 'rock', 'hootieAlbum1.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Looking for Lucky', 2005, '10', 'rock', 'hootieAlbum2.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Before These Crowded Streets', 1998, '11', 'alternative rock', 'davematthewsAlbum1.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Busted Stuff', 2002, '11', 'rock', 'davematthewsAlbum2.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Hear It Is', 1986, '12', 'indie', 'flaminglipsAlbum1.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Embryonic', 2009, '12', 'alternative rock', 'flaminglipsAlbum2.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('I and Love and You', 2009, '13', 'indie', 'avettAlbum1.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Special Forces', 1982, '14', 'rock', '38specialAlbum1.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Rock & Roll Strategy', 1988, '14', 'rock', '38specialAlbum2.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Drivetrain', 2004, '14', 'rock', '38specialAlbum3.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Master of Puppets', 1986, '15', 'heavy metal', 'metallicaAlbum1.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Full Circle', 2002, '16', 'R&B', 'boyziimenAlbum1.jpg');

INSERT INTO albums (albumname, albumyear, albumband, albumgenre, picture) VALUES ('Spiceworld', 1997, '17', 'pop', 'spicegirlsAlbum1.jpg');

CREATE TABLE IF NOT EXISTS `songs` (`songid` smallint(6) NOT NULL AUTO_INCREMENT, `songname` varchar(30) NOT NULL, PRIMARY KEY(`songid`)) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO songs (songname) VALUES ('Fearless');

INSERT INTO songs (songname) VALUES ('Fifteen');

INSERT INTO songs (songname) VALUES ('Love Story');

INSERT INTO songs (songname) VALUES ('Hey Stephen');

INSERT INTO songs (songname) VALUES ('White Horse');

INSERT INTO songs (songname) VALUES ('You Belong with Me');

INSERT INTO songs (songname) VALUES ('Breathe');

INSERT INTO songs (songname) VALUES ('Tell Me Why');

INSERT INTO songs (songname) VALUES ('You\'re Not Sorry');

INSERT INTO songs (songname) VALUES ('The Way I Loved You');

INSERT INTO songs (songname) VALUES ('Forever & Always');

INSERT INTO songs (songname) VALUES ('The Best Day');

INSERT INTO songs (songname) VALUES ('Change');

INSERT INTO songs (songname) VALUES ('Love Don\'t Live Here');

INSERT INTO songs (songname) VALUES ('Lookin\' for a Good Time');

INSERT INTO songs (songname) VALUES ('All We\'d Ever Need');

INSERT INTO songs (songname) VALUES ('Long Gone');

INSERT INTO songs (songname) VALUES ('Need You Now');

INSERT INTO songs (songname) VALUES ('Our Kind of Love');

INSERT INTO songs (songname) VALUES ('American Honey');

INSERT INTO songs (songname) VALUES ('Pump It');

INSERT INTO songs (songname) VALUES ('Don\'t Phunk with My Heart');

INSERT INTO songs (songname) VALUES ('My Style');

INSERT INTO songs (songname) VALUES ('Dum Diddly');

INSERT INTO songs (songname) VALUES ('Every Little Bit');

INSERT INTO songs (songname) VALUES ('Whatever It Is');

INSERT INTO songs (songname) VALUES ('Chicken Fried');

INSERT INTO songs (songname) VALUES ('On This Train');

INSERT INTO songs (songname) VALUES ('Better Day');

INSERT INTO songs (songname) VALUES ('Valentines');

INSERT INTO songs (songname) VALUES ('Curse Me');

INSERT INTO songs (songname) VALUES ('Toes');

INSERT INTO songs (songname) VALUES ('Whatever It Is');

INSERT INTO songs (songname) VALUES ('Highway 20 Ride');

INSERT INTO songs (songname) VALUES ('Sic \'Em On A Chicken');

INSERT INTO songs (songname) VALUES ('All In');

INSERT INTO songs (songname) VALUES ('Nerve Damage');

INSERT INTO songs (songname) VALUES ('Had Enough');

INSERT INTO songs (songname) VALUES ('Halfway Gone');

INSERT INTO songs (songname) VALUES ('From Where You Are');

INSERT INTO songs (songname) VALUES ('Hanging By A Moment');

INSERT INTO songs (songname) VALUES ('Good Times Bad Times');

INSERT INTO songs (songname) VALUES ('You Shook Me');

INSERT INTO songs (songname) VALUES ('Whole Lotta Love');

INSERT INTO songs (songname) VALUES ('Friends');

INSERT INTO songs (songname) VALUES ('Black Dog');

INSERT INTO songs (songname) VALUES ('Rock And Roll');

INSERT INTO songs (songname) VALUES ('Stairway To Heaven');

INSERT INTO songs (songname) VALUES ('Independent Woman');

INSERT INTO songs (songname) VALUES ('Crazy In Love');

INSERT INTO songs (songname) VALUES ('Fell in Love with a Girl');

INSERT INTO songs (songname) VALUES ('Little Room');

INSERT INTO songs (songname) VALUES ('Seven Nation Army');

INSERT INTO songs (songname) VALUES ('Hannah Jane');

INSERT INTO songs (songname) VALUES ('Hold My Hand');

INSERT INTO songs (songname) VALUES ('Let Her Cry');

INSERT INTO songs (songname) VALUES ('State Your Peace');

INSERT INTO songs (songname) VALUES ('Get Out of My Mind');

INSERT INTO songs (songname) VALUES ('Rapunzel');

INSERT INTO songs (songname) VALUES ('The Last Stop');

INSERT INTO songs (songname) VALUES ('Crush');

INSERT INTO songs (songname) VALUES ('Grey Street');

INSERT INTO songs (songname) VALUES ('You Never Know');

INSERT INTO songs (songname) VALUES ('With You');

INSERT INTO songs (songname) VALUES ('Convinced of the Hex');

INSERT INTO songs (songname) VALUES ('January Wedding');

INSERT INTO songs (songname) VALUES ('And It Spread');

INSERT INTO songs (songname) VALUES ('The Perfect Space');

INSERT INTO songs (songname) VALUES ('Caught Up In You');

INSERT INTO songs (songname) VALUES ('Second Chance');

INSERT INTO songs (songname) VALUES ('Something I Need');

INSERT INTO songs (songname) VALUES ('Hurts Like Love');

INSERT INTO songs (songname) VALUES ('Jam On');

INSERT INTO songs (songname) VALUES ('Make Some Sense Of It');

INSERT INTO songs (songname) VALUES ('Battery');

INSERT INTO songs (songname) VALUES ('Thing That Should Not Be');

INSERT INTO songs (songname) VALUES ('Disposable Heroes');

INSERT INTO songs (songname) VALUES ('Relax Your Mind');

INSERT INTO songs (songname) VALUES ('The Color Of Love');

INSERT INTO songs (songname) VALUES ('Spice Up Your Life');

CREATE TABLE IF NOT EXISTS `songalbum` (`albumid` smallint(6) NOT NULL, `songid` smallint(6) NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=latin1 ;

INSERT INTO songalbum (albumid, songid) VALUES (13, 1);

INSERT INTO songalbum (albumid, songid) VALUES (13, 2);

INSERT INTO songalbum (albumid, songid) VALUES (13, 3);

INSERT INTO songalbum (albumid, songid) VALUES (13, 4);

INSERT INTO songalbum (albumid, songid) VALUES (13, 5);

INSERT INTO songalbum (albumid, songid) VALUES (13, 6);

INSERT INTO songalbum (albumid, songid) VALUES (13, 7);

INSERT INTO songalbum (albumid, songid) VALUES (13, 8);

INSERT INTO songalbum (albumid, songid) VALUES (13, 9);

INSERT INTO songalbum (albumid, songid) VALUES (13, 10);

INSERT INTO songalbum (albumid, songid) VALUES (13, 11);

INSERT INTO songalbum (albumid, songid) VALUES (13, 12);

INSERT INTO songalbum (albumid, songid) VALUES (13, 13);

INSERT INTO songalbum (albumid, songid) VALUES (1, 14);

INSERT INTO songalbum (albumid, songid) VALUES (1, 15);

INSERT INTO songalbum (albumid, songid) VALUES (1, 16);

INSERT INTO songalbum (albumid, songid) VALUES (1, 17);

INSERT INTO songalbum (albumid, songid) VALUES (2, 18);

INSERT INTO songalbum (albumid, songid) VALUES (2, 19);

INSERT INTO songalbum (albumid, songid) VALUES (2, 20);

INSERT INTO songalbum (albumid, songid) VALUES (3, 21);

INSERT INTO songalbum (albumid, songid) VALUES (3, 22);

INSERT INTO songalbum (albumid, songid) VALUES (3, 23);

INSERT INTO songalbum (albumid, songid) VALUES (3, 24);

INSERT INTO songalbum (albumid, songid) VALUES (4, 25);

INSERT INTO songalbum (albumid, songid) VALUES (4, 26);

INSERT INTO songalbum (albumid, songid) VALUES (4, 27);

INSERT INTO songalbum (albumid, songid) VALUES (4, 28);

INSERT INTO songalbum (albumid, songid) VALUES (4, 29);

INSERT INTO songalbum (albumid, songid) VALUES (4, 30);

INSERT INTO songalbum (albumid, songid) VALUES (4, 31);

INSERT INTO songalbum (albumid, songid) VALUES (5, 32);

INSERT INTO songalbum (albumid, songid) VALUES (5, 33);

INSERT INTO songalbum (albumid, songid) VALUES (5, 34);

INSERT INTO songalbum (albumid, songid) VALUES (5, 35);

INSERT INTO songalbum (albumid, songid) VALUES (6, 41);

INSERT INTO songalbum (albumid, songid) VALUES (7, 36);

INSERT INTO songalbum (albumid, songid) VALUES (7, 37);

INSERT INTO songalbum (albumid, songid) VALUES (7, 38);

INSERT INTO songalbum (albumid, songid) VALUES (7, 39);

INSERT INTO songalbum (albumid, songid) VALUES (7, 40);

INSERT INTO songalbum (albumid, songid) VALUES (8, 42);

INSERT INTO songalbum (albumid, songid) VALUES (8, 43);

INSERT INTO songalbum (albumid, songid) VALUES (9, 44);

INSERT INTO songalbum (albumid, songid) VALUES (10, 45);

INSERT INTO songalbum (albumid, songid) VALUES (11. 46);

INSERT INTO songalbum (albumid, songid) VALUES (11, 47);

INSERT INTO songalbum (albumid, songid) VALUES (11, 48);

INSERT INTO songalbum (albumid, songid) VALUES (12, 49);

INSERT INTO songalbum (albumid, songid) VALUES (14, 50);

INSERT INTO songalbum (albumid, songid) VALUES (15, 51);

INSERT INTO songalbum (albumid, songid) VALUES (15, 52);

INSERT INTO songalbum (albumid, songid) VALUES (16, 53);

INSERT INTO songalbum (albumid, songid) VALUES (17, 54);

INSERT INTO songalbum (albumid, songid) VALUES (17, 55);

INSERT INTO songalbum (albumid, songid) VALUES (17, 56);

INSERT INTO songalbum (albumid, songid) VALUES (18, 57);

INSERT INTO songalbum (albumid, songid) VALUES (18, 58);

INSERT INTO songalbum (albumid, songid) VALUES (19, 59);

INSERT INTO songalbum (albumid, songid) VALUES (19, 60);

INSERT INTO songalbum (albumid, songid) VALUES (19, 61);

INSERT INTO songalbum (albumid, songid) VALUES (20, 62);

INSERT INTO songalbum (albumid, songid) VALUES (20, 63);

INSERT INTO songalbum (albumid, songid) VALUES (21, 64);

INSERT INTO songalbum (albumid, songid) VALUES (22, 65);

INSERT INTO songalbum (albumid, songid) VALUES (23, 66);

INSERT INTO songalbum (albumid, songid) VALUES (23, 67);

INSERT INTO songalbum (albumid, songid) VALUES (23, 68);

INSERT INTO songalbum (albumid, songid) VALUES (24, 69);

INSERT INTO songalbum (albumid, songid) VALUES (25, 70);

INSERT INTO songalbum (albumid, songid) VALUES (26, 71);

INSERT INTO songalbum (albumid, songid) VALUES (26, 72);

INSERT INTO songalbum (albumid, songid) VALUES (26, 73);

INSERT INTO songalbum (albumid, songid) VALUES (26, 74);

INSERT INTO songalbum (albumid, songid) VALUES (27, 75);

INSERT INTO songalbum (albumid, songid) VALUES (27, 76);

INSERT INTO songalbum (albumid, songid) VALUES (27, 77);

INSERT INTO songalbum (albumid, songid) VALUES (28, 78);

INSERT INTO songalbum (albumid, songid) VALUES (28, 79);

INSERT INTO songalbum (albumid, songid) VALUES (29, 80);

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

INSERT INTO bandmembers (membername, bandid) VALUES ('Taylor Swift', '7');

INSERT INTO bandmembers (membername, bandid) VALUES ('Beyonce Knowles', '8');

INSERT INTO bandmembers (membername, bandid) VALUES ('Jack White', '9');

INSERT INTO bandmembers (membername, bandid) VALUES ('Meg White', '9');

INSERT INTO bandmembers (membername, bandid) VALUES ('Darius Rucker', '10');

INSERT INTO bandmembers (membername, bandid) VALUES ('Mark Bryan', '10');

INSERT INTO bandmembers (membername, bandid) VALUES ('Dean Felber', '10');

INSERT INTO bandmembers (membername, bandid) VALUES ('Jim Sonefeld', '10');

INSERT INTO bandmembers (membername, bandid) VALUES ('Dave Matthews', '11');

INSERT INTO bandmembers (membername, bandid) VALUES ('Boyd Tinsley', '11');

INSERT INTO bandmembers (membername, bandid) VALUES ('Carter Beauford', '11');

INSERT INTO bandmembers (membername, bandid) VALUES ('Stefan Lessard', '11');

INSERT INTO bandmembers (membername, bandid) VALUES ('Wayne Coyne', '12');

INSERT INTO bandmembers (membername, bandid) VALUES ('Steven Drozd', '12');

INSERT INTO bandmembers (membername, bandid) VALUES ('Michael Ivins', '12');

INSERT INTO bandmembers (membername, bandid) VALUES ('Kliph Scurlock', '12');

INSERT INTO bandmembers (membername, bandid) VALUES ('Seth Avett', '13');

INSERT INTO bandmembers (membername, bandid) VALUES ('Scott Avett', '13');

INSERT INTO bandmembers (membername, bandid) VALUES ('Joe Kwon', '13');

INSERT INTO bandmembers (membername, bandid) VALUES ('Bob Crawford', '13');

INSERT INTO bandmembers (membername, bandid) VALUES ('Don Barnes', '14');

INSERT INTO bandmembers (membername, bandid) VALUES ('Donnie Van Zant', '14');

INSERT INTO bandmembers (membername, bandid) VALUES ('Danny Chauncey', '14');

INSERT INTO bandmembers (membername, bandid) VALUES ('Larry Junstrom', '14');

INSERT INTO bandmembers (membername, bandid) VALUES ('Bobby Capps', '14');

INSERT INTO bandmembers (membername, bandid) VALUES ('Gary Moffatt', '14');

INSERT INTO bandmembers (membername, bandid) VALUES ('James Hetfield', '15');

INSERT INTO bandmembers (membername, bandid) VALUES ('Lars Ulrich', '15');

INSERT INTO bandmembers (membername, bandid) VALUES ('Kirk Hammett', '15');

INSERT INTO bandmembers (membername, bandid) VALUES ('Robert Trujillo', '15');

INSERT INTO bandmembers (membername, bandid) VALUES ('Nathan Morris', '16');

INSERT INTO bandmembers (membername, bandid) VALUES ('Shawn Stockman', '16');

INSERT INTO bandmembers (membername, bandid) VALUES ('Wayna Morris', '16');

INSERT INTO bandmembers (membername, bandid) VALUES ('Victoria Beckham', '17');

INSERT INTO bandmembers (membername, bandid) VALUES ('Emma Bunton', '17');

INSERT INTO bandmembers (membername, bandid) VALUES ('Melanie Brown', '17');

INSERT INTO bandmembers (membername, bandid) VALUES ('Melanie Chisholm', '17');

INSERT INTO bandmembers (membername, bandid) VALUES ('Geri Halliwell', '17');

CREATE TABLE IF NOT EXISTS `genre` (`genreid` smallint(6) NOT NULL AUTO_INCREMENT, `genre` varchar(30) NOT NULL, PRIMARY KEY (`genreid`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO genre (genre) VALUES ('country');

INSERT INTO genre (genre) VALUES ('hip-hop');

INSERT INTO genre (genre) VALUES ('pop');

INSERT INTO genre (genre) VALUES ('R&B');

INSERT INTO genre (genre) VALUES ('alternative rock');

INSERT INTO genre (genre) VALUES ('hard rock');

INSERT INTO genre (genre) VALUES ('heavy metal');

INSERT INTO genre (genre) VALUES ('garage rock');

INSERT INTO genre (genre) VALUES ('punk blues');

INSERT INTO genre (genre) VALUES ('rock');

INSERT INTO genre (genre) VALUES ('acoustic rock');

INSERT INTO genre (genre) VALUES ('indie');

INSERT INTO genre (genre) VALUES ('folk');

INSERT INTO genre (genre) VALUES ('soul');

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

INSERT INTO bandgenre (bandid, genreid) VALUES ('7', '1');

INSERT INTO bandgenre (bandid, genreid) VALUES ('7', '3');

INSERT INTO bandgenre (bandid, genreid) VALUES ('8', '3');

INSERT INTO bandgenre (bandid, genreid) VALUES ('8', '4');

INSERT INTO bandgenre (bandid, genreid) VALUES ('8', '14');

INSERT INTO bandgenre (bandid, genreid) VALUES ('9', '5');

INSERT INTO bandgenre (bandid, genreid) VALUES ('9', '8');

INSERT INTO bandgenre (bandid, genreid) VALUES ('9', '9');

INSERT INTO bandgenre (bandid, genreid) VALUES ('10', '10');

INSERT INTO bandgenre (bandid, genreid) VALUES ('10', '5');

INSERT INTO bandgenre (bandid, genreid) VALUES ('11', '5');

INSERT INTO bandgenre (bandid, genreid) VALUES ('11', '11');

INSERT INTO bandgenre (bandid, genreid) VALUES ('12', '12');

INSERT INTO bandgenre (bandid, genreid) VALUES ('12', '5');

INSERT INTO bandgenre (bandid, genreid) VALUES ('13', '12');

INSERT INTO bandgenre (bandid, genreid) VALUES ('13', '13');

INSERT INTO bandgenre (bandid, genreid) VALUES ('14', '6');

INSERT INTO bandgenre (bandid, genreid) VALUES ('15', '6');

INSERT INTO bandgenre (bandid, genreid) VALUES ('15', '7');

INSERT INTO bandgenre (bandid, genreid) VALUES ('16', '4');

INSERT INTO bandgenre (bandid, genreid) VALUES ('16', '14');

INSERT INTO bandgenre (bandid, genreid) VALUES ('17', '3');

CREATE TABLE IF NOT EXISTS `comments` (`commentid` smallint(6) NOT NULL AUTO_INCREMENT, `bandid` smallint(6), `name` varchar(30) NOT NULL, `comment` blob, `date` date, PRIMARY KEY (`commentid`)) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO comments (bandid, name, comment, date) VALUES ('3', 'Sarah', 'Awesome sound!', '2010-02-21');

INSERT INTO comments (bandid, name, comment, date) VALUES ('2', 'Tony', 'Awesome sound!', '2009-11-02');

INSERT INTO comments (bandid, name, comment, date) VALUES ('5', 'Adam', 'I still listen to these guys.  Their music is incredible.', '2010-03-15');

INSERT INTO comments (bandid, name, comment, date) VALUES ('4', 'George', 'Can\'t wait for the concert!', '2010-03-24');

INSERT INTO comments (bandid, name, comment, date) VALUES ('4', 'Betty', 'Yea, it\'s gonna be incredible', '2010-03-29');