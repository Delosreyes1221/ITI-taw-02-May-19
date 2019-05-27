-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 27, 2019 at 02:02 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `email`, `telefono`) VALUES
(1, 'Carlos', 'eadad@gmail.com', '8341182264'),
(2, 'Cristian', '1630258@upv.edu.mx', '8341156645');

-- --------------------------------------------------------

--
-- Table structure for table `habitaciones`
--

DROP TABLE IF EXISTS `habitaciones`;
CREATE TABLE IF NOT EXISTS `habitaciones` (
  `id_habitacion` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) NOT NULL,
  `precio` int(10) NOT NULL,
  PRIMARY KEY (`id_habitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `habitaciones`
--

INSERT INTO `habitaciones` (`id_habitacion`, `tipo`, `precio`) VALUES
(1, 'Simple', 500),
(2, 'Doble', 1000),
(3, 'Matrimonial', 2000),
(4, 'Doble', 1350),
(5, 'Matrimonial', 3000),
(6, 'Simple', 1100),
(9, '3', 4555),
(10, '3', 4555);

-- --------------------------------------------------------

--
-- Table structure for table `reservaciones`
--

DROP TABLE IF EXISTS `reservaciones`;
CREATE TABLE IF NOT EXISTS `reservaciones` (
  `id_reservacion` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_habitacion` varchar(30) NOT NULL,
  `noches` varchar(30) NOT NULL,
  PRIMARY KEY (`id_reservacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservaciones`
--

INSERT INTO `reservaciones` (`id_reservacion`, `tipo_habitacion`, `noches`) VALUES
(1, '1', '2'),
(2, '3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `reservahabitacion`
--

DROP TABLE IF EXISTS `reservahabitacion`;
CREATE TABLE IF NOT EXISTS `reservahabitacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_habitacion` int(11) NOT NULL,
  `nombre_cliente` int(11) NOT NULL,
  `numero_reservacion` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservahabitacion`
--

INSERT INTO `reservahabitacion` (`id`, `numero_habitacion`, `nombre_cliente`, `numero_reservacion`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(1, 'admin', 'delosreyes'),
(2, 'gerente', 'delosreyes');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
