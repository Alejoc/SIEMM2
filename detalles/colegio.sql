-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2014 a las 13:00:03
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE IF NOT EXISTS `asistencias` (
  `cod_asistencia` varchar(5) NOT NULL,
  `fecha_asistencia` date NOT NULL,
  PRIMARY KEY (`cod_asistencia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`cod_asistencia`, `fecha_asistencia`) VALUES
('AS001', '2014-10-15'),
('AS002', '2014-10-15'),
('AS003', '2014-10-19'),
('AS004', '2014-10-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_asistencias`
--

CREATE TABLE IF NOT EXISTS `detalle_asistencias` (
  `cod_asistencia` varchar(5) NOT NULL,
  `estudiante` varchar(100) NOT NULL,
  KEY `cod_asistencia` (`cod_asistencia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_asistencias`
--

INSERT INTO `detalle_asistencias` (`cod_asistencia`, `estudiante`) VALUES
('AS001', 'Kevin Rodrigo Avalos Cama'),
('AS001', 'Jose Jorge Avalos Cama'),
('AS001', 'Mary Luz Cama Farfan'),
('AS002', 'Edgar Alvarez'),
('AS002', 'Luis Huanchi'),
('AS002', 'Einar Carbajal'),
('AS003', 'Javier Benavidez'),
('AS003', 'Jose Maria Fernandez'),
('AS003', 'Miguel Grau'),
('AS004', 'Gerardo Guitierrez'),
('AS004', 'Gilberto Mamey');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_asistencias`
--
ALTER TABLE `detalle_asistencias`
  ADD CONSTRAINT `detalle_asistencias_ibfk_1` FOREIGN KEY (`cod_asistencia`) REFERENCES `asistencias` (`cod_asistencia`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
