-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-05-2015 a las 16:16:19
-- Versión del servidor: 5.5.43-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sweethomesw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `board`
--

CREATE TABLE IF NOT EXISTS `board` (
  `idboard` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iduser` int(10) unsigned NOT NULL,
  `content` text COLLATE utf8_spanish_ci NOT NULL,
  `idhome` int(10) unsigned NOT NULL,
  `date` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `data` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idboard`),
  KEY `iduser` (`iduser`),
  KEY `idhome` (`idhome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `board`
--

INSERT INTO `board` (`idboard`, `iduser`, `content`, `idhome`, `date`, `data`) VALUES
(1, 4, 'Viene el de gas', 2, '09.05.2015', 'Viene el del gas el viernes 13 a las 19:00. Alguien tiene que estar en casa para atenderle.'),
(2, 5, 'No funciona internet desde el jueves', 2, '10.05.2015', 'Estoy hasta los cojones de telefonica.'),
(3, 2, 'prueba tablón', 2, '12.05.2015', 'Esto es una prueba cagaos de mierda!'),
(4, 2, 'prueba 2', 2, '12.05.2015', 'Otra prueba cagada de mierda jajaja me aburro y son las 00:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boardcomments`
--

CREATE TABLE IF NOT EXISTS `boardcomments` (
  `idcomment` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idboard` int(11) unsigned NOT NULL,
  `iduser` int(11) unsigned NOT NULL,
  `comment` text COLLATE utf8_spanish_ci NOT NULL,
  `date` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idcomment`),
  KEY `idboard` (`idboard`),
  KEY `iduser` (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `boardcomments`
--

INSERT INTO `boardcomments` (`idcomment`, `idboard`, `iduser`, `comment`, `date`) VALUES
(1, 1, 2, 'Yo no puedo estar. Trabajo hasta tarde.', '05.05.2015'),
(2, 1, 5, 'Yo puedo estar a las 19:00!', '05.05.2015'),
(3, 1, 2, 'Ya puedo!!', '05.05.2015'),
(4, 3, 2, 'comentario de prueba', '12.05.2015'),
(5, 3, 2, 'otro comentario de prueba', '12.05.2015'),
(6, 3, 2, 'otro ya que estamos', '12.05.2015'),
(7, 4, 2, 'jajaja pringao', '12.05.2015'),
(8, 2, 2, 'Te jodes', '12.05.2015');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `idexpense` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_spanish_ci NOT NULL,
  `idhome` int(10) unsigned NOT NULL,
  `users` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idexpense`),
  KEY `idhome` (`idhome`),
  KEY `idhome_2` (`idhome`),
  KEY `idhome_3` (`idhome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `homes`
--

CREATE TABLE IF NOT EXISTS `homes` (
  `idhome` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_spanish_ci NOT NULL,
  `numusers` int(10) unsigned NOT NULL DEFAULT '1',
  `maxscore` int(10) unsigned NOT NULL DEFAULT '0',
  `adminmail` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idhome`),
  UNIQUE KEY `adminmail` (`adminmail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `homes`
--

INSERT INTO `homes` (`idhome`, `name`, `numusers`, `maxscore`, `adminmail`) VALUES
(2, 'casa1', 3, 8, 'mhiguera@easyhouse.me');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invited`
--

CREATE TABLE IF NOT EXISTS `invited` (
  `idinvited` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mail` text COLLATE utf8_spanish_ci NOT NULL,
  `code` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idhome` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idinvited`),
  UNIQUE KEY `code` (`code`),
  KEY `idhome` (`idhome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `idproduct` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_spanish_ci NOT NULL,
  `idhome` int(10) unsigned NOT NULL,
  `added` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`idproduct`),
  KEY `idhome` (`idhome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`idproduct`, `name`, `idhome`, `added`, `active`) VALUES
(1, 'Leche', 2, 1, 1),
(2, 'Galletas digestive', 2, 1, 1),
(3, 'Papel', 2, 0, 1),
(4, 'cerveza', 2, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `idregistro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iduser` int(10) unsigned NOT NULL,
  `content` text COLLATE utf8_spanish_ci NOT NULL,
  `idhome` int(10) unsigned NOT NULL,
  `date` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `usersdeleted` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idregistro`),
  KEY `iduser` (`iduser`),
  KEY `idhome` (`idhome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`idregistro`, `iduser`, `content`, `idhome`, `date`, `usersdeleted`) VALUES
(1, 2, 'Ha bajado la basura', 2, '10.05.2015', ''),
(2, 2, 'Ha añadido un mensaje al tablón', 2, '12.05.2015', '2 4'),
(4, 2, 'Ha realizado: Bajar la basura', 2, '12.05.2015', ''),
(5, 2, 'Ha realizado: Limpiar el baño', 2, '12.05.2015', ''),
(6, 2, 'Ha realizado: Bajar la basura', 2, '12.05.2015', ''),
(7, 2, 'Ha realizado: Limpiar el baño', 2, '12.05.2015', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `idtask` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_spanish_ci NOT NULL,
  `period` int(11) NOT NULL,
  `idhome` int(11) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL,
  `whenisdone` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `points` int(11) NOT NULL,
  `activesince` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `approved` tinyint(1) NOT NULL,
  PRIMARY KEY (`idtask`),
  KEY `idhome` (`idhome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tasks`
--

INSERT INTO `tasks` (`idtask`, `name`, `period`, `idhome`, `active`, `whenisdone`, `points`, `activesince`, `approved`) VALUES
(1, 'Bajar la basura', 1, 2, 1, '12.05.2015', 2, '12.05.2015', 1),
(2, 'Limpiar el baño', 3, 2, 0, '12.05.2015', 6, '08.05.2015', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasksdone`
--

CREATE TABLE IF NOT EXISTS `tasksdone` (
  `idtaskdone` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idtask` int(10) unsigned NOT NULL,
  `iduser` int(10) unsigned NOT NULL,
  `date` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `validated` tinyint(1) NOT NULL DEFAULT '0',
  `idhome` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idtaskdone`),
  KEY `idtask` (`idtask`),
  KEY `iduser` (`iduser`),
  KEY `idhome` (`idhome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tasksdone`
--

INSERT INTO `tasksdone` (`idtaskdone`, `idtask`, `iduser`, `date`, `validated`, `idhome`) VALUES
(4, 1, 2, '12.05.2015', 0, 2),
(5, 2, 2, '12.05.2015', 0, 2),
(6, 1, 2, '12.05.2015', 0, 2),
(7, 2, 2, '12.05.2015', 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `iduser` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_spanish_ci NOT NULL,
  `idhome` int(10) unsigned NOT NULL,
  `mail` text COLLATE utf8_spanish_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '/sweethomesw/img/usuario.png',
  `passwd` text COLLATE utf8_spanish_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `points` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`iduser`),
  KEY `idhome` (`idhome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`iduser`, `name`, `idhome`, `mail`, `photo`, `passwd`, `admin`, `points`) VALUES
(2, 'miguel', 2, 'mhiguera@easyhouse.me', '/sweethomesw/img/usuario.png', '75004f149038473757da0be07ef76dd4a9bdbc8d', 1, 8),
(4, 'juanh', 2, 'juan@juan.com', '/sweethomesw/img/usuario.png', 'b49a5780a99ea81284fc0746a78f84a30e4d5c73', 0, 0),
(5, 'laura', 2, 'laura@laura.com', '/sweethomesw/img/usuario.png', '94745df4bd94de756ea5436584fec066fc7898d5', 0, 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `board`
--
ALTER TABLE `board`
  ADD CONSTRAINT `board_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`),
  ADD CONSTRAINT `board_ibfk_2` FOREIGN KEY (`idhome`) REFERENCES `homes` (`idhome`);

--
-- Filtros para la tabla `boardcomments`
--
ALTER TABLE `boardcomments`
  ADD CONSTRAINT `boardcomments_ibfk_1` FOREIGN KEY (`idboard`) REFERENCES `board` (`idboard`),
  ADD CONSTRAINT `boardcomments_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`);

--
-- Filtros para la tabla `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`idhome`) REFERENCES `homes` (`idhome`);

--
-- Filtros para la tabla `invited`
--
ALTER TABLE `invited`
  ADD CONSTRAINT `invited_ibfk_1` FOREIGN KEY (`idhome`) REFERENCES `homes` (`idhome`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`idhome`) REFERENCES `homes` (`idhome`);

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`),
  ADD CONSTRAINT `registro_ibfk_2` FOREIGN KEY (`idhome`) REFERENCES `homes` (`idhome`);

--
-- Filtros para la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`idhome`) REFERENCES `homes` (`idhome`);

--
-- Filtros para la tabla `tasksdone`
--
ALTER TABLE `tasksdone`
  ADD CONSTRAINT `tasksdone_ibfk_3` FOREIGN KEY (`idhome`) REFERENCES `homes` (`idhome`),
  ADD CONSTRAINT `tasksdone_ibfk_1` FOREIGN KEY (`idtask`) REFERENCES `tasks` (`idtask`),
  ADD CONSTRAINT `tasksdone_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idhome`) REFERENCES `homes` (`idhome`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
