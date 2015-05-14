-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-05-2015 a las 17:57:47
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `board`
--

INSERT INTO `board` (`idboard`, `iduser`, `content`, `idhome`, `date`, `data`) VALUES
(3, 2, 'prueba tablón', 2, '12.05.2015', 'Esto es una prueba cagaos de mierda!'),
(12, 10, 'Ana ha llegado', 2, '14.05.2015', 'Ana la marrana fulana'),
(13, 4, 'mi mensaje para todos', 2, '14.05.2015', 'Hola mierdas');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `boardcomments`
--

INSERT INTO `boardcomments` (`idcomment`, `idboard`, `iduser`, `comment`, `date`) VALUES
(4, 3, 2, 'comentario de prueba', '12.05.2015'),
(5, 3, 2, 'otro comentario de prueba', '12.05.2015'),
(6, 3, 2, 'otro ya que estamos', '12.05.2015'),
(9, 3, 2, 'otro', '12.05.2015'),
(17, 3, 10, 'para ya gilipollas', '14.05.2015');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `expenses`
--

INSERT INTO `expenses` (`idexpense`, `name`, `idhome`, `users`) VALUES
(1, 'Luz', 2, '4 2');

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
  UNIQUE KEY `adminmail` (`adminmail`),
  KEY `numusers` (`numusers`)
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
(1, 'Leche', 2, 0, 1),
(2, 'Galletas digestive', 2, 0, 1),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`idregistro`, `iduser`, `content`, `idhome`, `date`, `usersdeleted`) VALUES
(1, 2, 'Ha bajado la basura', 2, '10.05.2015', '  2 4 10'),
(2, 2, 'Ha añadido un mensaje al tablón', 2, '12.05.2015', '2 4 10'),
(4, 2, 'Ha realizado: Bajar la basura', 2, '12.05.2015', ' 2 4 10'),
(5, 2, 'Ha realizado: Limpiar el baño', 2, '12.05.2015', ' 2 4 10'),
(6, 2, 'Ha realizado: Bajar la basura', 2, '12.05.2015', ' 2 4 10'),
(7, 2, 'Ha realizado: Limpiar el baño', 2, '12.05.2015', ' 2 4 10'),
(8, 2, 'Ha añadido un mensaje al tablón', 2, '12.05.2015', ' 2 4 10'),
(9, 2, 'Ha añadido un mensaje al tablón', 2, '12.05.2015', ' 2 4 10'),
(10, 2, 'Ha añadido un mensaje al tablón', 2, '12.05.2015', ' 2 4 10'),
(11, 2, 'Ha añadido un mensaje al tablón', 2, '12.05.2015', ' 2 4 10'),
(12, 2, 'Ha añadido un mensaje al tablón', 2, '12.05.2015', ' 2 4 10'),
(13, 2, 'Ha añadido un mensaje al tablón', 2, '12.05.2015', ' 2 4 10'),
(14, 2, 'Ha añadido un mensaje al tablón', 2, '12.05.2015', ' 2 4 10'),
(15, 2, 'Ha añadido un mensaje al tablón', 2, '12.05.2015', ' 2 4 10'),
(16, 4, 'Ha añadido un mensaje al tablón', 2, '13.05.2015', ' 4 2 10'),
(17, 4, 'Ha añadido un mensaje al tablón', 2, '13.05.2015', ' 4 2 10'),
(18, 2, 'Ha añadido un mensaje al tablón', 2, '13.05.2015', ' 2 4 10'),
(19, 2, 'Ha eliminado: caca', 2, '13.05.2015', ' 2 4 10'),
(20, 2, 'Ha añadido un mensaje al tablón', 2, '13.05.2015', ' 2 4 10'),
(21, 2, 'Ha eliminado: mensaje', 2, '13.05.2015', ' 2 4 10'),
(22, 2, 'Ha eliminado: prueba 2', 2, '13.05.2015', ' 2 4 10'),
(23, 4, 'Ha eliminado: Viene el de gas', 2, '13.05.2015', ' 2 10 4'),
(28, 10, 'Ha añadido un mensaje al tablón', 2, '14.05.2015', ' 2 4'),
(29, 4, 'Ha realizado: Bajar la basura', 2, '14.05.2015', ' 4 2'),
(30, 4, 'Ha añadido un mensaje al tablón', 2, '14.05.2015', ' 4 2'),
(31, 4, 'Ha añadido un mensaje al tablón', 2, '14.05.2015', ' 4 2'),
(32, 4, 'Ha añadido un mensaje al tablón', 2, '14.05.2015', ' 4 2'),
(33, 4, 'Ha añadido un mensaje al tablón', 2, '14.05.2015', ' 4 2'),
(34, 4, 'Ha añadido un mensaje al tablón', 2, '14.05.2015', ' 4 2'),
(35, 4, 'Ha eliminado: wefqawfewefver', 2, '14.05.2015', ' 4 2'),
(36, 4, 'Ha eliminado: ewfqwffwqf', 2, '14.05.2015', ' 4 2'),
(37, 4, 'Ha eliminado: wefqwfgwf', 2, '14.05.2015', ' 4 2'),
(38, 4, 'Ha eliminado: ewqfwqef', 2, '14.05.2015', ' 4 2');

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
(1, 'Bajar la basura', 1, 2, 0, '14.05.2015', 2, '12.05.2015', 1),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tasksdone`
--

INSERT INTO `tasksdone` (`idtaskdone`, `idtask`, `iduser`, `date`, `validated`, `idhome`) VALUES
(4, 1, 2, '12.05.2015', 0, 2),
(5, 2, 2, '12.05.2015', 0, 2),
(6, 1, 2, '12.05.2015', 0, 2),
(7, 2, 2, '12.05.2015', 0, 2),
(8, 1, 4, '14.05.2015', 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `iduser` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_spanish_ci NOT NULL,
  `idhome` int(10) unsigned NOT NULL,
  `mail` text COLLATE utf8_spanish_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '/sweethomesw/img/avatares/1.png',
  `passwd` text COLLATE utf8_spanish_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `points` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`iduser`),
  KEY `idhome` (`idhome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`iduser`, `name`, `idhome`, `mail`, `photo`, `passwd`, `admin`, `points`) VALUES
(2, 'miguel', 2, 'mhiguera@easyhouse.me', '/sweethomesw/img/avatares/12.png', '75004f149038473757da0be07ef76dd4a9bdbc8d', 1, 8),
(4, 'juan', 2, 'juan@juan.com', '/sweethomesw/img/avatares/4.png', 'b49a5780a99ea81284fc0746a78f84a30e4d5c73', 0, 2),
(10, 'ana', 2, 'ana@ana.com', '/sweethomesw/img/avatares/6.png', '72019bbac0b3dac88beac9ddfef0ca808919104f', 0, 0),
(11, 'caca', 2, 'mierda@caca.es', '/sweethomesw/img/avatares/1.png', 'nopuede', 0, 0),
(12, 'caca2', 2, 'caca2@c.c', '/sweethomesw/img/avatares/1.png', 'aaa', 0, 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `board`
--
ALTER TABLE `board`
  ADD CONSTRAINT `board_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE CASCADE,
  ADD CONSTRAINT `board_ibfk_2` FOREIGN KEY (`idhome`) REFERENCES `homes` (`idhome`) ON DELETE CASCADE;

--
-- Filtros para la tabla `boardcomments`
--
ALTER TABLE `boardcomments`
  ADD CONSTRAINT `boardcomments_ibfk_1` FOREIGN KEY (`idboard`) REFERENCES `board` (`idboard`) ON DELETE CASCADE,
  ADD CONSTRAINT `boardcomments_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE CASCADE;

--
-- Filtros para la tabla `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`idhome`) REFERENCES `homes` (`idhome`) ON DELETE CASCADE;

--
-- Filtros para la tabla `invited`
--
ALTER TABLE `invited`
  ADD CONSTRAINT `invited_ibfk_1` FOREIGN KEY (`idhome`) REFERENCES `homes` (`idhome`) ON DELETE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`idhome`) REFERENCES `homes` (`idhome`) ON DELETE CASCADE;

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE CASCADE,
  ADD CONSTRAINT `registro_ibfk_2` FOREIGN KEY (`idhome`) REFERENCES `homes` (`idhome`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`idhome`) REFERENCES `homes` (`idhome`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tasksdone`
--
ALTER TABLE `tasksdone`
  ADD CONSTRAINT `tasksdone_ibfk_1` FOREIGN KEY (`idtask`) REFERENCES `tasks` (`idtask`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasksdone_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasksdone_ibfk_3` FOREIGN KEY (`idhome`) REFERENCES `homes` (`idhome`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idhome`) REFERENCES `homes` (`idhome`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
