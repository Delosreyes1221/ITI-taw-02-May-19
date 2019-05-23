-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-05-2019 a las 11:32:11
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tarea4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `basket`
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE IF NOT EXISTS `basket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `posicion` varchar(30) NOT NULL,
  `carrera` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `basket`
--

INSERT INTO `basket` (`id`, `nombre`, `posicion`, `carrera`, `email`) VALUES
(1, 'Jose', 'Defensa', 'ITI', '1630265@upv.edu.mx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `futbol`
--

DROP TABLE IF EXISTS `futbol`;
CREATE TABLE IF NOT EXISTS `futbol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `posicion` varchar(30) NOT NULL,
  `carrera` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `futbol`
--

INSERT INTO `futbol` (`id`, `nombre`, `posicion`, `carrera`, `email`) VALUES
(1, 'Carlos Efren', 'Defensa', 'Meca', '1630258@upv.edu.mx'),
(2, 'Carlos Efren', 'Defensa', 'ITI', '1630258@upv.edu.mx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `Name`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(30) NOT NULL,
  `Pssw` varchar(30) NOT NULL,
  `Satus_id` int(11) NOT NULL,
  `User_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `statusUser` (`Satus_id`),
  KEY `typeUser` (`User_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `Email`, `Pssw`, `Satus_id`, `User_type_id`) VALUES
(1, '1630258@upv.edu.mx', 'Delosreyes1221', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_log`
--

DROP TABLE IF EXISTS `user_log`;
CREATE TABLE IF NOT EXISTS `user_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Date_logged` varchar(30) NOT NULL,
  `User_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `logUser` (`User_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_log`
--

INSERT INTO `user_log` (`id`, `Date_logged`, `User_id`) VALUES
(1, '26-12-1997', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_type`
--

DROP TABLE IF EXISTS `user_type`;
CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_type`
--

INSERT INTO `user_type` (`id`, `Name`) VALUES
(1, 'Desarrollador'),
(5, 'Analista');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `statusUser` FOREIGN KEY (`Satus_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `typeUser` FOREIGN KEY (`User_type_id`) REFERENCES `user_type` (`id`);

--
-- Filtros para la tabla `user_log`
--
ALTER TABLE `user_log`
  ADD CONSTRAINT `logUser` FOREIGN KEY (`User_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
