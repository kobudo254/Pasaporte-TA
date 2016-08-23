SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `premios` (
  `user_id` int(11) NOT NULL,
  `tres_visitas` tinyint(1) DEFAULT NULL,
  `seis_visitas` tinyint(1) DEFAULT NULL,
  `diez_visitas` tinyint(1) DEFAULT NULL,
  `deluxe` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`),
  KEY `user_id_3` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `user_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `ta_parrilla` int(11) DEFAULT '0',
  `ta_gascona` int(11) DEFAULT '0',
  `ta_aguila` int(11) DEFAULT '0',
  `ta_poniente` int(11) DEFAULT '0',
  `ta_aviles` int(11) DEFAULT '0',
  `fecha_fin` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;
SET FOREIGN_KEY_CHECKS=1;