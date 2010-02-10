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