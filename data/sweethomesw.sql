-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-05-2015 a las 22:28:03
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `board`
--

INSERT INTO `board` (`idboard`, `iduser`, `content`, `idhome`, `date`, `data`) VALUES
(12, 10, 'Ana ha llegado', 2, '14.05.2015', 'Ana la marrana fulana'),
(13, 4, 'mi mensaje para todos', 2, '14.05.2015', 'Hola mierdas'),
(14, 2, 'cena hoy', 2, '14.05.2015', 'Quedamos a las 9?');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `boardcomments`
--

INSERT INTO `boardcomments` (`idcomment`, `idboard`, `iduser`, `comment`, `date`) VALUES
(3, 14, 2, 'no', '17.05.2015');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `expenses`
--

INSERT INTO `expenses` (`idexpense`, `name`, `idhome`, `users`) VALUES
(1, 'Luz', 2, '10 2 '),
(5, 'Agua', 2, '2 '),
(6, 'luz', 3, ''),
(7, 'agua', 3, ''),
(8, 'internet', 3, '');

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
  `lord` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `lordphone` varchar(15) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `lordmail` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `info` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idhome`),
  UNIQUE KEY `adminmail` (`adminmail`),
  KEY `numusers` (`numusers`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `homes`
--

INSERT INTO `homes` (`idhome`, `name`, `numusers`, `maxscore`, `adminmail`, `lord`, `lordphone`, `lordmail`, `info`) VALUES
(2, 'mi casa', 3, 8, 'mhiguera@easyhouse.me', 'Juan Antonio Recio', '666 666 666', 'juananrec@jar.com', 'Esooo'),
(3, 'casa de los locos', 1, 0, 'mhtombe85@gmail.com', '', '', '', ''),
(4, 'casa de los locoso', 1, 0, 'lolo@lolo.com', '', '', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`idproduct`, `name`, `idhome`, `added`, `active`) VALUES
(1, 'Leche', 2, 1, 1),
(3, 'Papel', 2, 0, 1),
(4, 'cerveza', 2, 0, 1),
(6, 'Galletas', 2, 0, 1),
(7, 'comino', 3, 1, 1),
(8, 'pollo', 3, 1, 1),
(9, 'carne picada', 3, 0, 1),
(10, 'huevos', 3, 0, 1),
(11, 'ajos', 3, 0, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=106 ;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`idregistro`, `iduser`, `content`, `idhome`, `date`, `usersdeleted`) VALUES
(1, 2, 'Ha bajado la basura', 2, '10.05.2015', '  2 4 10 12 12'),
(2, 2, 'Ha añadido un mensaje al tablón', 2, '12.05.2015', '2 4 10 12 12'),
(4, 2, 'Ha realizado: Bajar la basura', 2, '12.05.2015', ' 2 4 10 12 12'),
(5, 2, 'Ha realizado: Limpiar el baño', 2, '12.05.2015', ' 2 4 10 12 12'),
(6, 2, 'Ha realizado: Bajar la basura', 2, '12.05.2015', ' 2 4 10 12 12'),
(7, 2, 'Ha realizado: Limpiar el baño', 2, '12.05.2015', ' 2 4 10 12 12'),
(8, 2, 'Ha añadido un mensaje al tablón', 2, '12.05.2015', ' 2 4 10 12 12'),
(9, 2, 'Ha añadido un mensaje al tablón', 2, '12.05.2015', ' 2 4 10 12 12'),
(10, 2, 'Ha añadido un mensaje al tablón', 2, '12.05.2015', ' 2 4 10 12 12'),
(11, 2, 'Ha añadido un mensaje al tablón', 2, '12.05.2015', ' 2 4 10 12 12'),
(12, 2, 'Ha añadido un mensaje al tablón', 2, '12.05.2015', ' 2 4 10 12 12'),
(13, 2, 'Ha añadido un mensaje al tablón', 2, '12.05.2015', ' 2 4 10 12 12'),
(14, 2, 'Ha añadido un mensaje al tablón', 2, '12.05.2015', ' 2 4 10 12 12'),
(15, 2, 'Ha añadido un mensaje al tablón', 2, '12.05.2015', ' 2 4 10 12 12'),
(16, 4, 'Ha añadido un mensaje al tablón', 2, '13.05.2015', ' 4 2 10 12 12'),
(17, 4, 'Ha añadido un mensaje al tablón', 2, '13.05.2015', ' 4 2 10 12 12'),
(18, 2, 'Ha añadido un mensaje al tablón', 2, '13.05.2015', ' 2 4 10 12 12'),
(19, 2, 'Ha eliminado: caca', 2, '13.05.2015', ' 2 4 10 12 12'),
(20, 2, 'Ha añadido un mensaje al tablón', 2, '13.05.2015', ' 2 4 10 12 12'),
(21, 2, 'Ha eliminado: mensaje', 2, '13.05.2015', ' 2 4 10 12 12'),
(22, 2, 'Ha eliminado: prueba 2', 2, '13.05.2015', ' 2 4 10 12 12'),
(23, 4, 'Ha eliminado: Viene el de gas', 2, '13.05.2015', ' 2 10 4 12 12'),
(28, 10, 'Ha añadido un mensaje al tablón', 2, '14.05.2015', ' 2 4 12 12'),
(29, 4, 'Ha realizado: Bajar la basura', 2, '14.05.2015', ' 4 2 12 12'),
(30, 4, 'Ha añadido un mensaje al tablón', 2, '14.05.2015', ' 4 2 12 12'),
(31, 4, 'Ha añadido un mensaje al tablón', 2, '14.05.2015', ' 4 2 12 12'),
(32, 4, 'Ha añadido un mensaje al tablón', 2, '14.05.2015', ' 4 2 12 12'),
(33, 4, 'Ha añadido un mensaje al tablón', 2, '14.05.2015', ' 4 2 12 12'),
(34, 4, 'Ha añadido un mensaje al tablón', 2, '14.05.2015', ' 4 2 12 12'),
(35, 4, 'Ha eliminado: wefqawfewefver', 2, '14.05.2015', ' 4 2 12 12'),
(36, 4, 'Ha eliminado: ewfqwffwqf', 2, '14.05.2015', ' 4 2 12 12'),
(37, 4, 'Ha eliminado: wefqwfgwf', 2, '14.05.2015', ' 4 2 12 12'),
(38, 4, 'Ha eliminado: ewqfwqef', 2, '14.05.2015', ' 4 2 12 12'),
(39, 2, 'Ha eliminado la tarea: Bajar la basura', 2, '14.05.2015', ' 2 4 12 12'),
(40, 2, 'Ha añadido la tarea: cagar', 2, '14.05.2015', ' 2 4 12 12'),
(41, 2, 'Ha añadido la tarea: fornicar', 2, '14.05.2015', ' 2 4 12 12'),
(42, 2, 'Ha añadido la tarea: prueba', 2, '14.05.2015', ' 2 4 12 12'),
(43, 2, 'Ha eliminado la tarea: prueba', 2, '14.05.2015', ' 2 4 12 12'),
(44, 2, 'Ha eliminado la tarea: cagar', 2, '14.05.2015', ' 2 4 12 12'),
(45, 2, 'Ha eliminado la tarea: fornicar', 2, '14.05.2015', ' 2 4 12 12'),
(46, 2, 'Ha añadido la tarea: Bajar la basura', 2, '14.05.2015', ' 2 4 12 12'),
(47, 2, 'Ha añadido un mensaje al tablón', 2, '14.05.2015', ' 2 4 12 12'),
(48, 2, 'Ha realizado: Bajar la basura', 2, '14.05.2015', ' 2 4 12 12'),
(49, 2, 'Ha eliminado: prueba tablón', 2, '14.05.2015', ' 4 2 12 12'),
(50, 2, 'Ha añadido un mensaje al tablón', 2, '14.05.2015', ' 2 12 12 4'),
(51, 2, 'Ha eliminado: caca', 2, '14.05.2015', ' 2 12 12 4'),
(52, 2, 'Ha eliminado el producto: Galletas digestive', 2, '14.05.2015', ' 2 12 12 4'),
(53, 2, 'Ha añadido el producto: Galletas', 2, '14.05.2015', ' 2 12 12 4'),
(54, 4, 'Ha eliminado el producto: Galletas', 2, '14.05.2015', ' 2 12 12 4'),
(55, 4, 'Ha añadido el producto: Galletas', 2, '14.05.2015', ' 2 12 12 4'),
(56, 2, 'Ha añadido la tarea: mierda', 2, '15.05.2015', ' 2 12 12 4'),
(57, 2, 'Ha eliminado la tarea: mierda', 2, '15.05.2015', ' 2 12 12 4'),
(58, 2, 'Ha añadido el gasto: Calefacción', 2, '15.05.2015', ' 2 12 12 4'),
(59, 2, 'Ha eliminado el gasto: Calefacción', 2, '15.05.2015', ' 2 12 12 4'),
(60, 2, 'Ha añadido el gasto: Agua', 2, '17.05.2015', ' 12 12 4'),
(61, 2, 'Ha realizado: Limpiar el baño', 2, '17.05.2015', ' 12 12 4'),
(62, 2, 'Ha añadido el producto: prueba', 2, '17.05.2015', ' 2 4'),
(63, 2, 'Ha eliminado el producto: prueba', 2, '17.05.2015', ' 2 4'),
(64, 2, 'Ha añadido la tarea: mierda', 2, '17.05.2015', ' 2 4'),
(65, 2, 'Ha eliminado la tarea: mierda', 2, '17.05.2015', ' 2 4'),
(66, 2, 'Ha añadido el gasto: perra', 2, '17.05.2015', ' 2 4'),
(67, 2, 'Ha eliminado el gasto: perra', 2, '17.05.2015', ' 2 4'),
(68, 2, 'Ha añadido el producto: ehgasg', 2, '17.05.2015', ' 2 4'),
(69, 2, 'Ha eliminado el producto: ehgasg', 2, '17.05.2015', ' 2 4'),
(70, 2, 'Ha eliminado el gasto: Agua', 2, '17.05.2015', ' 2 4'),
(71, 2, 'Ha añadido el gasto: agua', 2, '17.05.2015', ' 2 4'),
(72, 2, 'Ha eliminado el gasto: agua', 2, '17.05.2015', ' 2 4'),
(73, 2, 'Ha añadido el gasto: Agua', 2, '17.05.2015', ' 2 4'),
(74, 2, 'Ha añadido la tarea: egewg', 2, '17.05.2015', ' 2 4'),
(75, 2, 'Ha eliminado la tarea: egewg', 2, '17.05.2015', ' 2 4'),
(76, 2, 'Ha añadido un mensaje al tablón', 2, '17.05.2015', ' 2 4'),
(77, 2, 'Ha realizado: Limpiar el baño', 2, '17.05.2015', ' 2 4'),
(78, 2, 'Ha eliminado: siii siisis', 2, '17.05.2015', ' 2 4'),
(79, 13, 'Ha añadido la tarea: limpiar cocina', 3, '17.05.2015', ' 13'),
(80, 13, 'Ha añadido la tarea: bajar basura', 3, '17.05.2015', ' 13'),
(81, 13, 'Ha añadido la tarea: limpiar baño', 3, '17.05.2015', ' 13'),
(82, 13, 'Ha añadido el gasto: luz', 3, '17.05.2015', ' 13'),
(83, 13, 'Ha añadido el gasto: agua', 3, '17.05.2015', ' 13'),
(84, 13, 'Ha añadido el gasto: internet', 3, '17.05.2015', ' 13'),
(85, 13, 'Ha añadido el producto: comino', 3, '17.05.2015', ' 13'),
(86, 13, 'Ha añadido el producto: pollo', 3, '17.05.2015', ' 13'),
(87, 13, 'Ha añadido el producto: carne picada', 3, '17.05.2015', ' 13'),
(88, 13, 'Ha añadido el producto: huevos', 3, '17.05.2015', ' 13'),
(89, 13, 'Ha añadido el producto: ajos', 3, '17.05.2015', ' 13'),
(90, 13, 'Ha realizado: bajar basura', 3, '17.05.2015', ' 13'),
(91, 14, '', 4, '17.05.2015', ' 14'),
(92, 13, 'Ha añadido un mensaje al tablón', 3, '17.05.2015', ''),
(93, 13, 'Ha eliminado: mensaje de prueba', 3, '17.05.2015', ''),
(94, 2, 'Ha añadido un mensaje al tablón', 2, '18.05.2015', ' 2 4'),
(95, 2, 'Ha añadido un mensaje al tablón', 2, '18.05.2015', ' 2 4'),
(96, 2, 'Ha añadido un mensaje al tablón', 2, '18.05.2015', ' 2 4'),
(97, 2, 'Ha realizado: Limpiar el baño', 2, '18.05.2015', ' 2 4'),
(98, 2, 'Ha eliminado: s', 2, '18.05.2015', ' 2 4'),
(99, 2, 'Ha eliminado: s', 2, '18.05.2015', ' 2 4'),
(100, 2, 'Ha eliminado: s', 2, '18.05.2015', ' 2 4'),
(101, 2, 'Ha añadido un mensaje al tablón', 2, '18.05.2015', ' 2 4'),
(102, 2, 'Ha eliminado: gfbf', 2, '18.05.2015', ' 2 4'),
(103, 2, 'Ha realizado: Bajar la basura', 2, '18.05.2015', ' 2 4'),
(104, 2, 'Ha realizado: Limpiar el baño', 2, '18.05.2015', ' 2 4'),
(105, 2, 'Ha hecho compra', 2, '18.05.2015', ' 2 4');

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
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idtask`),
  KEY `idhome` (`idhome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `tasks`
--

INSERT INTO `tasks` (`idtask`, `name`, `period`, `idhome`, `active`, `whenisdone`, `points`, `activesince`, `approved`) VALUES
(2, 'Limpiar el baño', 3, 2, 0, '18.05.2015', 6, '18.05.2015', 1),
(11, 'Bajar la basura', 1, 2, 0, '18.05.2015', 2, '17.05.2015', 1),
(12, 'limpiar cocina', 2, 3, 1, '', 5, '17.05.2015', 1),
(13, 'bajar basura', 1, 3, 0, '17.05.2015', 2, '17.05.2015', 1),
(14, 'limpiar baño', 2, 3, 1, '', 5, '17.05.2015', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `tasksdone`
--

INSERT INTO `tasksdone` (`idtaskdone`, `idtask`, `iduser`, `date`, `validated`, `idhome`) VALUES
(5, 2, 2, '12.05.2015', 0, 2),
(7, 2, 2, '12.05.2015', 0, 2),
(8, 11, 2, '14.05.2015', 0, 2),
(9, 2, 2, '17.05.2015', 0, 2),
(10, 2, 2, '17.05.2015', 0, 2),
(11, 13, 13, '17.05.2015', 0, 3),
(12, 2, 2, '18.05.2015', 0, 2),
(13, 11, 2, '18.05.2015', 0, 2),
(14, 2, 2, '18.05.2015', 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `iduser` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_spanish_ci NOT NULL,
  `idhome` int(10) unsigned NOT NULL,
  `mail` text COLLATE utf8_spanish_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '/sweethomesw/img/avatares/0.png',
  `passwd` text COLLATE utf8_spanish_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `points` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`iduser`),
  KEY `idhome` (`idhome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`iduser`, `name`, `idhome`, `mail`, `photo`, `passwd`, `admin`, `points`) VALUES
(2, 'Miguel', 2, 'mhiguera@easyhouse.me', '/sweethomesw/img/avatares/1.png', '75004f149038473757da0be07ef76dd4a9bdbc8d', 1, 36),
(4, 'juan', 2, 'juan@juan.com', '/sweethomesw/img/avatares/13.png', 'b49a5780a99ea81284fc0746a78f84a30e4d5c73', 0, 2),
(10, 'ana', 2, 'ana@ana.com', '/sweethomesw/img/avatares/6.png', '72019bbac0b3dac88beac9ddfef0ca808919104f', 0, 0),
(13, 'Miguel', 3, 'mhtombe85@gmail.com', '/sweethomesw/img/avatares/10.png', '75004f149038473757da0be07ef76dd4a9bdbc8d', 1, 2),
(14, 'lolo', 4, 'lolo@lolo.com', '/sweethomesw/img/avatares/2.png', '8aa40001b9b39cb257fe646a561a80840c806c55', 1, 0);

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
