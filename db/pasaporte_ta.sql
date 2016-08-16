-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-08-2016 a las 12:34:11
-- Versión del servidor: 5.7.9
-- Versión de PHP: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pasaporte_ta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premios`
--

DROP TABLE IF EXISTS `premios`;
CREATE TABLE IF NOT EXISTS `premios` (
  `user_id` int(11) NOT NULL,
  `3v` tinyint(1) NOT NULL,
  `6v` tinyint(1) NOT NULL,
  `10v` tinyint(1) NOT NULL,
  `10v_deluxe` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`),
  KEY `user_id_3` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `premios`
--

REPLACE INTO `premios` (`user_id`, `3v`, `6v`, `10v`, `10v_deluxe`) VALUES
(15, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_login`
--

DROP TABLE IF EXISTS `user_login`;
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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_login`
--

REPLACE INTO `user_login` (`id`, `user_name`, `user_email`, `user_password`, `ta_parrilla`, `ta_gascona`, `ta_aguila`, `ta_poniente`, `ta_aviles`, `fecha_fin`) VALUES
(11, 'alex@alex.com', 'alex@alex.com', NULL, 0, 0, 0, 0, 0, '2017-06-16'),
(10, 'juancar1987@gmail.com', 'juancar1987@gmail.com', NULL, 4, 12, 10, 25, 1, '2016-08-14'),
(9, 'pepe@pepe.com', 'pepe@pepe.com', NULL, 0, 0, 0, 0, 0, '2016-08-16'),
(12, 'hola@hola.com', 'hola@hola.com', NULL, 0, 0, 0, 0, 0, '2017-06-16'),
(13, 'asdasd@adasd.com', 'asdasd@adasd.com', NULL, 0, 0, 0, 0, 0, '2017-06-16'),
(14, 'hola2@hola2.com', 'hola2@hola2.com', NULL, 0, 0, 0, 0, 0, '2017-06-16'),
(15, 'hola3@hola3.com', 'hola3@hola3.com', NULL, 0, 0, 0, 0, 0, '2017-06-16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
