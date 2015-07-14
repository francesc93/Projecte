-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-07-2015 a las 12:58:30
-- Versión del servidor: 5.5.43-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `NPANEL`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ACTUALITAT`
--

CREATE TABLE IF NOT EXISTS `ACTUALITAT` (
  `ID_BLOG` int(11) NOT NULL AUTO_INCREMENT,
  `TITOL` varchar(200) DEFAULT NULL,
  `DATA_PUBLICACIO` date DEFAULT NULL,
  `COMENTARI` varchar(1000) DEFAULT NULL,
  `FOTO` blob,
  PRIMARY KEY (`ID_BLOG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `ACTUALITAT`
--

INSERT INTO `ACTUALITAT` (`ID_BLOG`, `TITOL`, `DATA_PUBLICACIO`, `COMENTARI`, `FOTO`) VALUES
(1, NULL, NULL, NULL, NULL),
(2, '7', NULL, '8oo', 0x687474703a2f2f6c6f63616c686f73742f70726f6a656374652f61637475616c697461742f4c696f6e2d57616c6c70617065722d4844322e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CATEGORIES`
--

CREATE TABLE IF NOT EXISTS `CATEGORIES` (
  `ID_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT,
  `CATEGORIA` varchar(200) DEFAULT NULL,
  `PREFIX` varchar(200) DEFAULT NULL,
  `DATA_INICI` date DEFAULT NULL,
  `DATA_FI` date DEFAULT NULL,
  `ID_ESTAT` int(11) DEFAULT NULL,
  `SEXE` enum('Masculí','Femení') DEFAULT NULL,
  PRIMARY KEY (`ID_CATEGORIA`),
  KEY `ID_ESTAT` (`ID_ESTAT`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `CATEGORIES`
--

INSERT INTO `CATEGORIES` (`ID_CATEGORIA`, `CATEGORIA`, `PREFIX`, `DATA_INICI`, `DATA_FI`, `ID_ESTAT`, `SEXE`) VALUES
(1, 'Prebenjami', 'PB', '2007-01-01', '2008-12-31', 1, NULL),
(2, 'Benjami', 'B', '2005-01-01', '2006-12-31', 1, NULL),
(3, 'Alevi', 'ALE', '2003-01-01', '2004-12-31', 1, NULL),
(4, 'Infantil', 'INF', '2001-01-01', '2002-12-31', 1, NULL),
(5, 'Juvenil', 'JUV', '1999-01-01', '2000-12-31', 1, NULL),
(6, 'Cadet', 'CAD', '1980-01-01', '1998-12-31', 1, NULL),
(7, 'Prebenjami', 'PB', '2007-01-01', '2007-12-31', 2, 'Masculí'),
(8, 'Benjami', 'B', '2004-01-01', '2006-12-31', 2, 'Masculí'),
(9, 'Alevi', 'ALE', '2002-01-01', '2003-12-31', 2, 'Masculí'),
(10, 'Infantil', 'INF', '1999-01-01', '2001-12-31', 2, 'Masculí'),
(11, 'Juvenil', 'JUV', '1997-01-01', '1998-12-31', 2, 'Masculí'),
(12, 'Absolutjove', 'ABJ', '1995-01-01', '1996-12-31', 2, 'Masculí'),
(13, 'Absolut', 'ABS', '1980-01-01', '1994-12-31', 2, 'Masculí'),
(14, 'Prebenjami', 'PB', '2007-01-01', '2007-12-31', 2, 'Femení'),
(15, 'Benjami', 'B', '2005-01-01', '2006-12-31', 2, 'Femení'),
(16, 'Alevi', 'ALE', '2003-01-01', '2004-12-31', 2, 'Femení'),
(17, 'Infantil', 'INF', '2001-01-01', '2002-12-31', 2, 'Femení'),
(18, 'Juvenil', 'JUV', '1999-01-01', '2000-12-31', 2, 'Femení'),
(19, 'Absolutjove', 'ABJ', '1997-01-01', '1998-12-31', 2, 'Femení'),
(20, 'Absolut', 'ABS', '1980-01-01', '1996-12-31', 2, 'Femení'),
(21, 'MASTER', 'MS', NULL, NULL, 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `COMPETICIONS`
--

CREATE TABLE IF NOT EXISTS `COMPETICIONS` (
  `ID_COMPETICIO` int(11) NOT NULL AUTO_INCREMENT,
  `COMPETICIO` varchar(200) DEFAULT NULL,
  `DATA_HORA_1` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DATA_HORA_2` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `LLOC` varchar(200) DEFAULT NULL,
  `RESULTATS` varchar(200) DEFAULT NULL,
  `ID_CALENDARI` varchar(100) DEFAULT NULL,
  `ID_ESTAT` int(11) NOT NULL DEFAULT '0',
  `ID_CATEGORIA` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_COMPETICIO`,`ID_ESTAT`,`ID_CATEGORIA`),
  KEY `ID_ESTAT` (`ID_ESTAT`),
  KEY `ID_CATEGORIA` (`ID_CATEGORIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DOCUMENTS`
--

CREATE TABLE IF NOT EXISTS `DOCUMENTS` (
  `ID_DOCUMENT` int(11) NOT NULL AUTO_INCREMENT,
  `TITUL` varchar(200) DEFAULT NULL,
  `DOCUMENT` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID_DOCUMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ESTATS`
--

CREATE TABLE IF NOT EXISTS `ESTATS` (
  `ID_ESTAT` int(11) NOT NULL AUTO_INCREMENT,
  `ESTAT` varchar(200) DEFAULT NULL,
  `DETALLS` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID_ESTAT`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `ESTATS`
--

INSERT INTO `ESTATS` (`ID_ESTAT`, `ESTAT`, `DETALLS`) VALUES
(1, 'ESCOLAR', 'De 8 a 16 anys'),
(2, 'FEDERAT', 'De 8 a 20 anys (Masculí) i de 8 a 18 anys (Femení) '),
(3, 'MASTER', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FOTOS`
--

CREATE TABLE IF NOT EXISTS `FOTOS` (
  `ID_FOTO` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(200) DEFAULT NULL,
  `URL` varchar(300) DEFAULT NULL,
  `ID_GALERIA` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_FOTO`,`ID_GALERIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `GALERIES`
--

CREATE TABLE IF NOT EXISTS `GALERIES` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(200) DEFAULT NULL,
  `URL` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HIST_ACTUALITAT`
--

CREATE TABLE IF NOT EXISTS `HIST_ACTUALITAT` (
  `HIST_ACTUALITAT` int(11) NOT NULL,
  `ID_USUARI` int(11) DEFAULT NULL,
  `ID_BLOG` int(11) DEFAULT NULL,
  `DATA_PUBLICACIO` date DEFAULT NULL,
  `ACCIO` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`HIST_ACTUALITAT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `HIST_ACTUALITAT`
--

INSERT INTO `HIST_ACTUALITAT` (`HIST_ACTUALITAT`, `ID_USUARI`, `ID_BLOG`, `DATA_PUBLICACIO`, `ACCIO`) VALUES
(0, NULL, NULL, '0000-00-00', NULL),
(1, 1, 1, '2015-07-01', 'inserta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HIST_CATEGORIES`
--

CREATE TABLE IF NOT EXISTS `HIST_CATEGORIES` (
  `HIST_CATEGORIES` int(11) NOT NULL,
  `ID_USUARI` int(11) DEFAULT NULL,
  `DATA_PUBLICACIO` date DEFAULT NULL,
  `ACCIO` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`HIST_CATEGORIES`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HIST_COMPETICIONS`
--

CREATE TABLE IF NOT EXISTS `HIST_COMPETICIONS` (
  `HIST_COMPETICIONS` int(11) NOT NULL,
  `ID_USUARI` int(11) DEFAULT NULL,
  `DATA_PUBLICACIO` date DEFAULT NULL,
  `ACCIO` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`HIST_COMPETICIONS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HIST_DOCUMENTS`
--

CREATE TABLE IF NOT EXISTS `HIST_DOCUMENTS` (
  `HIST_DOCUMENTS` int(11) NOT NULL,
  `ID_USUARI` int(11) DEFAULT NULL,
  `DATA_PUBLICACIO` date DEFAULT NULL,
  `ACCIO` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`HIST_DOCUMENTS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HIST_ESTATS`
--

CREATE TABLE IF NOT EXISTS `HIST_ESTATS` (
  `HIST_ESTATS` int(11) NOT NULL,
  `ID_USUARI` int(11) DEFAULT NULL,
  `DATA_PUBLICACIO` date DEFAULT NULL,
  `ACCIO` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`HIST_ESTATS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HIST_GALERIES`
--

CREATE TABLE IF NOT EXISTS `HIST_GALERIES` (
  `HIST_GALERIES` int(11) NOT NULL,
  `ID_USUARI` int(11) DEFAULT NULL,
  `DATA_PUBLICACIO` date DEFAULT NULL,
  `ACCIO` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`HIST_GALERIES`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HIST_URLS`
--

CREATE TABLE IF NOT EXISTS `HIST_URLS` (
  `HIST_URLS` int(11) NOT NULL,
  `ID_USUARI` int(11) DEFAULT NULL,
  `DATA_PUBLICACIO` date DEFAULT NULL,
  `ACCIO` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`HIST_URLS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HIST_USUARIS`
--

CREATE TABLE IF NOT EXISTS `HIST_USUARIS` (
  `HIST_USUARIS` int(11) NOT NULL,
  `ID_USUARI` int(11) DEFAULT NULL,
  `DATA_PUBLICACIO` date DEFAULT NULL,
  `ACCIO` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`HIST_USUARIS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PARTICIPACIONS`
--

CREATE TABLE IF NOT EXISTS `PARTICIPACIONS` (
  `ID_USUARI` int(11) NOT NULL DEFAULT '0',
  `ID_COMPETICIO` int(11) NOT NULL DEFAULT '0',
  `ID_ESTAT` int(11) NOT NULL DEFAULT '0',
  `ID_CATEGORIA` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_USUARI`,`ID_COMPETICIO`,`ID_ESTAT`,`ID_CATEGORIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `URLS`
--

CREATE TABLE IF NOT EXISTS `URLS` (
  `ID_ENLLAS` int(11) NOT NULL AUTO_INCREMENT,
  `TITUL` varchar(200) DEFAULT NULL,
  `URL` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID_ENLLAS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIS`
--

CREATE TABLE IF NOT EXISTS `USUARIS` (
  `ID_USUARI` int(11) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(200) DEFAULT NULL,
  `CONTRASENYA` varchar(200) DEFAULT NULL,
  `NOM` varchar(200) DEFAULT NULL,
  `COGNOMS` varchar(200) DEFAULT NULL,
  `FOTO` blob,
  `SEXE` enum('Masculí','Femení') DEFAULT NULL,
  `DATA_NAIXEMENT` date DEFAULT NULL,
  `ROL` enum('NEDADOR','ENTRENADOR','ADMINISTRADOR') DEFAULT NULL,
  `VALIDAT` enum('SI','NO') DEFAULT NULL,
  `ID_ESTAT` int(11) DEFAULT NULL,
  `ID_CATEGORIA` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARI`),
  KEY `ID_ESTAT` (`ID_ESTAT`),
  KEY `ID_CATEGORIA` (`ID_CATEGORIA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `USUARIS`
--

INSERT INTO `USUARIS` (`ID_USUARI`, `EMAIL`, `CONTRASENYA`, `NOM`, `COGNOMS`, `FOTO`, `SEXE`, `DATA_NAIXEMENT`, `ROL`, `VALIDAT`, `ID_ESTAT`, `ID_CATEGORIA`) VALUES
(1, 'ffores93@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Francesc', 'Forés Campos', NULL, 'Masculí', '1993-07-27', 'ADMINISTRADOR', 'SI', 2, 13);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `CATEGORIES`
--
ALTER TABLE `CATEGORIES`
  ADD CONSTRAINT `CATEGORIES_ibfk_1` FOREIGN KEY (`ID_ESTAT`) REFERENCES `ESTATS` (`ID_ESTAT`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `COMPETICIONS`
--
ALTER TABLE `COMPETICIONS`
  ADD CONSTRAINT `COMPETICIONS_ibfk_1` FOREIGN KEY (`ID_ESTAT`) REFERENCES `ESTATS` (`ID_ESTAT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `COMPETICIONS_ibfk_2` FOREIGN KEY (`ID_CATEGORIA`) REFERENCES `CATEGORIES` (`ID_CATEGORIA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `USUARIS`
--
ALTER TABLE `USUARIS`
  ADD CONSTRAINT `USUARIS_ibfk_1` FOREIGN KEY (`ID_ESTAT`) REFERENCES `ESTATS` (`ID_ESTAT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `USUARIS_ibfk_2` FOREIGN KEY (`ID_CATEGORIA`) REFERENCES `CATEGORIES` (`ID_CATEGORIA`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
