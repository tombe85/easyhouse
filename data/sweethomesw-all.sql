-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-05-2015 a las 19:06:51
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
  `lastcommenttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idboard`),
  KEY `iduser` (`iduser`),
  KEY `idhome` (`idhome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `board`
--

INSERT INTO `board` (`idboard`, `iduser`, `content`, `idhome`, `date`, `data`, `lastcommenttime`) VALUES
(12, 10, 'Viene el del gas', 2, '14.05.2015', 'Ana la marrana fulana', '2015-05-31 17:05:36'),
(13, 4, 'Cena el 24', 2, '14.05.2015', 'Hola mierdas', '2015-05-31 17:05:23'),
(15, 17, 'eso', 7, '22.05.2015', 'eso\r\n', '0000-00-00 00:00:00'),
(16, 2, 'Hoy cenamos fuera', 2, '24.05.2015', 'He aprobado! Os invito a cenar!!', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=81 ;

--
-- Volcado de datos para la tabla `boardcomments`
--

INSERT INTO `boardcomments` (`idcomment`, `idboard`, `iduser`, `comment`, `date`) VALUES
(7, 13, 2, 'hola pringao', '22.05.2015'),
(8, 13, 2, 'si', '22.05.2015'),
(9, 13, 2, 'aham', '22.05.2015'),
(10, 13, 2, 'aham', '22.05.2015'),
(11, 13, 2, 'no actualiza', '22.05.2015'),
(12, 13, 2, 'si si si', '22.05.2015'),
(13, 13, 2, 'a ver', '22.05.2015'),
(14, 13, 2, 'ele', '22.05.2015'),
(15, 13, 2, 'a', '22.05.2015'),
(16, 13, 2, 'ka', '22.05.2015'),
(20, 13, 2, 'greg', '22.05.2015'),
(23, 12, 2, 'aham ', '22.05.2015'),
(24, 12, 2, 'lere', '22.05.2015'),
(25, 12, 2, 'ole', '22.05.2015'),
(26, 12, 2, 'ticki', '22.05.2015'),
(27, 12, 2, 'caca', '22.05.2015'),
(28, 12, 2, 'wow', '22.05.2015'),
(29, 12, 2, 'rakkka', '22.05.2015'),
(30, 12, 2, 'lalalalalal', '22.05.2015'),
(31, 12, 2, 'vavava', '22.05.2015'),
(32, 12, 2, 'cal', '22.05.2015'),
(33, 13, 2, 'pac', '22.05.2015'),
(34, 13, 2, 'caca', '22.05.2015'),
(35, 13, 2, 'a', '22.05.2015'),
(36, 13, 2, 'sdg', '22.05.2015'),
(37, 13, 2, 'efwf', '22.05.2015'),
(38, 13, 2, 'caca', '22.05.2015'),
(39, 13, 2, 'hola', '22.05.2015'),
(40, 13, 2, 'mierda', '22.05.2015'),
(41, 13, 2, 'caca', '22.05.2015'),
(42, 13, 2, 'dddd', '22.05.2015'),
(43, 13, 2, 'dvddse', '22.05.2015'),
(44, 13, 2, 'sisisis', '22.05.2015'),
(45, 13, 2, 'jajaja', '22.05.2015'),
(46, 13, 2, 'add', '22.05.2015'),
(47, 13, 2, 'aaa', '22.05.2015'),
(48, 13, 2, 'aaaaa', '22.05.2015'),
(49, 13, 2, 'aaa', '22.05.2015'),
(57, 13, 2, 'a', '22.05.2015'),
(58, 13, 2, 'si', '22.05.2015'),
(59, 13, 2, 'jajajajjaja', '23.05.2015'),
(60, 13, 2, 'egrege', '23.05.2015'),
(61, 13, 2, 'dthrth', '23.05.2015'),
(62, 13, 2, 'gfht', '23.05.2015'),
(63, 13, 2, 'dj', '23.05.2015'),
(64, 13, 2, 'aha', '23.05.2015'),
(65, 13, 2, 'wef', '23.05.2015'),
(66, 13, 2, 'aa', '23.05.2015'),
(67, 13, 2, 'dddd', '24.05.2015'),
(68, 13, 2, '', '24.05.2015'),
(69, 13, 2, 'ere', '24.05.2015'),
(70, 16, 2, 'Pero sin pasarse, que nos conocemos!', '24.05.2015'),
(71, 16, 2, 'ey ey', '28.05.2015'),
(72, 16, 2, 'qué pasa', '28.05.2015'),
(73, 16, 2, 'eh', '28.05.2015'),
(74, 16, 2, 'ehhhh', '28.05.2015'),
(75, 16, 2, 'eyyyy', '28.05.2015'),
(76, 16, 2, 'ewrfgwe', '28.05.2015'),
(77, 13, 2, 'asa', '28.05.2015'),
(78, 13, 2, 'alalal', '28.05.2015'),
(79, 13, 2, 'aham', '31.05.2015'),
(80, 12, 2, 'claro', '31.05.2015');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `expenses`
--

INSERT INTO `expenses` (`idexpense`, `name`, `idhome`, `users`) VALUES
(5, 'Agua', 2, '10 '),
(6, 'luz', 3, ''),
(7, 'agua', 3, ''),
(8, 'internet', 3, ''),
(9, 'Luz', 2, '4 10 2 ');

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
  `lord` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `lordphone` varchar(25) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `lordmail` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `info` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idhome`),
  UNIQUE KEY `adminmail` (`adminmail`),
  KEY `numusers` (`numusers`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `homes`
--

INSERT INTO `homes` (`idhome`, `name`, `numusers`, `maxscore`, `adminmail`, `lord`, `lordphone`, `lordmail`, `info`) VALUES
(2, 'mi casa', 3, 8, 'mhiguera@easyhouse.me', 'Nombre Apellidos', '612 345 678', 'nombre@easyhouse.me', 'Información extra'),
(3, 'casa de los locos', 1, 0, 'mhtombe85@gmail.com', '', '', '', ''),
(4, 'prueba', 1, 0, 'prueba@p.com', '', '', '', ''),
(5, 'pr', 1, 0, 'prueba@p.com1', '', '', '', ''),
(6, 'iaia', 1, 0, 'iaia@ia.ia', '', '', '', ''),
(7, 'casa', 1, 0, 'miguel@miguel.com', '', '', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=71 ;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`idproduct`, `name`, `idhome`, `added`, `active`) VALUES
(1, 'Leche', 2, 0, 1),
(4, 'cerveza', 2, 1, 1),
(6, 'Galletas', 2, 0, 1),
(7, 'comino', 3, 1, 1),
(8, 'pollo', 3, 1, 1),
(9, 'carne picada', 3, 0, 1),
(10, 'huevos', 3, 0, 1),
(11, 'ajos', 3, 0, 1),
(12, 'Papel higiénico', 2, 0, 1),
(25, 'Batidos', 2, 1, 1),
(26, 'dsrbghaedrgae', 2, 0, 1),
(27, 'dbvrsavs', 2, 1, 1),
(28, 'dvasvasv', 2, 0, 1),
(29, 'dfvzasvwa', 2, 0, 1),
(30, 'dvsdv', 2, 0, 1),
(31, 'sdvsa', 2, 0, 1),
(32, 'fsdvsav', 2, 0, 1),
(33, 'svvsavevwse', 2, 0, 1),
(34, 'fdabbnetshazbhtae', 2, 0, 1),
(36, 'zzzz', 2, 0, 1),
(40, 'zanahorias', 2, 0, 1),
(41, 'patatas', 2, 0, 1),
(42, 'judias', 2, 0, 1),
(45, 'pedo', 2, 0, 1),
(46, 'caca', 2, 0, 1),
(54, 'dds', 2, 1, 1),
(59, 'cacaca', 2, 1, 1),
(64, 'pechuga', 2, 1, 1),
(65, 'pollo', 2, 1, 1),
(66, 'ensalada', 2, 1, 1),
(67, 'folios', 2, 0, 1),
(68, 'aa', 2, 0, 1),
(69, 'baba', 2, 0, 1),
(70, 'bb', 2, 0, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=316 ;

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
(105, 2, 'Ha hecho compra', 2, '18.05.2015', ' 2 4'),
(106, 2, 'Ha añadido el producto: wfewf', 2, '19.05.2015', ' 2'),
(107, 2, 'Ha añadido el producto: wfweefewf', 2, '19.05.2015', ' 2'),
(108, 2, 'Ha añadido el producto: weffwfwf', 2, '19.05.2015', ' 2'),
(109, 2, 'Ha añadido el producto: wefwefewf', 2, '19.05.2015', ' 2'),
(110, 2, 'Ha hecho compra', 2, '19.05.2015', ' 2'),
(111, 2, 'Ha hecho compra', 2, '19.05.2015', ' 2'),
(112, 2, 'Ha hecho compra', 2, '19.05.2015', ' 2'),
(113, 2, 'Ha hecho compra', 2, '19.05.2015', ' 2'),
(114, 2, 'Ha hecho compra', 2, '19.05.2015', ' 2'),
(115, 2, 'Ha hecho compra', 2, '19.05.2015', ' 2'),
(116, 2, 'Ha hecho compra', 2, '19.05.2015', ' 2'),
(117, 2, 'Ha hecho compra', 2, '19.05.2015', ' 2'),
(118, 2, 'Ha realizado: Bajar la basura', 2, '19.05.2015', ' 2'),
(119, 2, 'Ha hecho compra', 2, '19.05.2015', ' 2'),
(120, 2, 'Ha hecho compra', 2, '19.05.2015', ' 2'),
(121, 2, 'Ha hecho compra', 2, '19.05.2015', ' 2'),
(122, 2, 'Ha hecho compra', 2, '19.05.2015', ' 2'),
(123, 2, 'Ha hecho compra', 2, '19.05.2015', ' 2'),
(124, 2, 'Ha hecho compra', 2, '19.05.2015', ' 2'),
(125, 2, 'Ha hecho compra', 2, '19.05.2015', ' 2'),
(126, 2, 'Ha hecho compra', 2, '19.05.2015', ' 2'),
(127, 2, 'Ha hecho compra', 2, '19.05.2015', ' 2'),
(128, 2, 'Ha hecho compra', 2, '19.05.2015', ' 2'),
(129, 2, 'Ha hecho compra', 2, '19.05.2015', ' 2'),
(130, 2, 'Ha añadido la tarea: dfbgasdghdeasg', 2, '19.05.2015', ' 2'),
(131, 2, 'Ha añadido la tarea: sgerfgaew', 2, '19.05.2015', ' 2'),
(132, 2, 'Ha añadido la tarea: sgredfga', 2, '19.05.2015', ' 2'),
(133, 2, 'Ha añadido la tarea: wegethwse', 2, '19.05.2015', ' 2'),
(134, 2, 'Ha añadido la tarea: safdqdwq', 2, '19.05.2015', ' 2'),
(135, 2, 'Ha añadido la tarea: fdhdrhr', 2, '19.05.2015', ' 2'),
(136, 2, 'Ha añadido un mensaje al tablón', 2, '19.05.2015', ' 2'),
(137, 2, 'Ha añadido un mensaje al tablón', 2, '19.05.2015', ' 2'),
(138, 2, 'Ha añadido un mensaje al tablón', 2, '19.05.2015', ' 2'),
(139, 2, 'Ha añadido un mensaje al tablón', 2, '19.05.2015', ' 2'),
(140, 2, 'Ha eliminado: erhtrehrteh', 2, '19.05.2015', ' 2'),
(141, 2, 'Ha eliminado: sghrthe', 2, '19.05.2015', ' 2'),
(142, 2, 'Ha eliminado: rsthrhtrsh', 2, '19.05.2015', ' 2'),
(143, 2, 'Ha eliminado: gshre', 2, '19.05.2015', ' 2'),
(144, 2, 'Ha eliminado la tarea: dfbgasdghdeasg', 2, '19.05.2015', ' 2'),
(145, 2, 'Ha eliminado la tarea: sgerfgaew', 2, '19.05.2015', ' 2'),
(146, 2, 'Ha eliminado la tarea: sgredfga', 2, '19.05.2015', ' 2'),
(147, 2, 'Ha eliminado la tarea: wegethwse', 2, '19.05.2015', ' 2'),
(148, 2, 'Ha eliminado la tarea: safdqdwq', 2, '19.05.2015', ' 2'),
(149, 2, 'Ha eliminado la tarea: fdhdrhr', 2, '19.05.2015', ' 2'),
(150, 2, 'Ha añadido el gasto: hrehtreh', 2, '19.05.2015', ' 2'),
(151, 2, 'Ha eliminado el gasto: hrehtreh', 2, '19.05.2015', ' 2'),
(152, 2, 'Ha añadido el producto: ertberdt', 2, '19.05.2015', ' 2'),
(153, 2, 'Ha eliminado el producto: ertberdt', 2, '19.05.2015', ' 2'),
(154, 2, 'Ha eliminado el producto: weffwfwf', 2, '19.05.2015', ' 2'),
(155, 2, 'Ha eliminado el producto: wefwefewf', 2, '19.05.2015', ' 2'),
(156, 2, 'Ha eliminado el producto: wfewf', 2, '19.05.2015', ' 2'),
(157, 2, 'Ha eliminado el producto: wfweefewf', 2, '19.05.2015', ' 2'),
(158, 14, 'Bienvenidos a prueba', 4, '19.05.2015', ''),
(159, 15, 'Bienvenidos a pr', 5, '19.05.2015', ''),
(160, 16, 'Bienvenidos a iaia', 6, '19.05.2015', ''),
(161, 2, 'Ha añadido el producto: a', 2, '19.05.2015', ' 2'),
(162, 2, 'Ha eliminado el producto: a', 2, '19.05.2015', ' 2'),
(163, 2, 'Ha realizado: Limpiar el baño', 2, '19.05.2015', ' 2'),
(164, 2, 'Ha realizado: Bajar la basura', 2, '19.05.2015', ' 2'),
(165, 2, 'Ha invalidado la tarea realizada por : Bajar la basura', 2, '19.05.2015', ' 2'),
(166, 2, 'Ha invalidado la tarea realizada por : Limpiar el baño', 2, '19.05.2015', ' 2'),
(167, 2, 'Ha invalidado la tarea realizada por : Bajar la basura', 2, '19.05.2015', ' 2'),
(168, 2, 'Ha invalidado la tarea realizada por Miguel: Limpiar el baño', 2, '19.05.2015', ' 2'),
(169, 2, 'Ha hecho compra', 2, '20.05.2015', ' 2'),
(170, 2, 'Ha hecho compra', 2, '20.05.2015', ' 2'),
(171, 2, 'Ha hecho compra', 2, '20.05.2015', ' 2'),
(172, 2, 'Ha hecho compra', 2, '20.05.2015', ' 2'),
(173, 2, 'Ha hecho compra', 2, '20.05.2015', ' 2'),
(174, 2, 'Ha hecho compra', 2, '20.05.2015', ' 2'),
(175, 2, 'Ha hecho compra', 2, '20.05.2015', ' 2'),
(176, 2, 'Ha hecho compra', 2, '20.05.2015', ' 2'),
(177, 2, 'Ha hecho compra', 2, '20.05.2015', ' 2'),
(178, 2, 'Ha hecho compra', 2, '20.05.2015', ' 2'),
(179, 2, 'Ha hecho compra', 2, '20.05.2015', ' 2'),
(180, 2, 'Ha hecho compra', 2, '20.05.2015', ' 2'),
(181, 2, 'Ha hecho compra', 2, '20.05.2015', ' 2'),
(182, 2, 'Ha realizado: Limpiar el baño', 2, '22.05.2015', ' 2'),
(183, 2, 'Ha invalidado la tarea realizada por Miguel: Limpiar el baño', 2, '22.05.2015', ' 2'),
(184, 2, 'Ha añadido la tarea: caca', 2, '22.05.2015', ' 2'),
(185, 2, 'Ha eliminado la tarea: caca', 2, '22.05.2015', ' 2'),
(186, 2, 'Ha eliminado el gasto: Luz', 2, '22.05.2015', ' 2'),
(187, 2, 'Ha añadido el gasto: Luz', 2, '22.05.2015', ' 2'),
(188, 2, 'Ha eliminado el producto: Papel', 2, '22.05.2015', ' 2'),
(189, 2, 'Ha añadido el producto: Papel higiénico', 2, '22.05.2015', ' 2'),
(190, 2, 'Ha hecho compra', 2, '22.05.2015', ' 2'),
(191, 17, 'Bienvenidos a casa', 7, '22.05.2015', ''),
(192, 17, 'Ha añadido un mensaje al tablón', 7, '22.05.2015', ''),
(193, 2, 'Ha realizado: Bajar la basura', 2, '22.05.2015', ' 2'),
(194, 2, 'Ha añadido el producto: dgsr', 2, '23.05.2015', ' 2'),
(195, 2, 'Ha añadido el producto: regaerge', 2, '23.05.2015', ' 2'),
(196, 2, 'Ha añadido el producto: ergaregergr', 2, '23.05.2015', ' 2'),
(197, 2, 'Ha añadido el producto: ergeerge', 2, '23.05.2015', ' 2'),
(198, 2, 'Ha añadido el producto: regeasrhgsethr', 2, '23.05.2015', ' 2'),
(199, 2, 'Ha añadido el producto: ergergreg', 2, '23.05.2015', ' 2'),
(200, 2, 'Ha añadido el producto: kuyky6rk76', 2, '23.05.2015', ' 2'),
(201, 2, 'Ha añadido el producto: sthtrrsghrtgh', 2, '23.05.2015', ' 2'),
(202, 2, 'Ha añadido el producto: hsrthrseh', 2, '23.05.2015', ' 2'),
(203, 2, 'Ha añadido el producto: sdfhsretas', 2, '23.05.2015', ' 2'),
(204, 2, 'Ha añadido el producto: arhaeghe', 2, '23.05.2015', ' 2'),
(205, 2, 'Ha añadido el producto: sthserghe', 2, '23.05.2015', ' 2'),
(206, 2, 'Ha hecho compra', 2, '24.05.2015', ' 2'),
(207, 2, 'Ha hecho compra', 2, '24.05.2015', ' 2'),
(208, 2, 'Ha hecho compra', 2, '24.05.2015', ' 2'),
(209, 2, 'Ha hecho compra', 2, '24.05.2015', ' 2'),
(210, 2, 'Ha hecho compra', 2, '24.05.2015', ' 2'),
(211, 2, 'Ha hecho compra', 2, '24.05.2015', ' 2'),
(212, 2, 'Ha hecho compra', 2, '24.05.2015', ' 2'),
(213, 2, 'Ha hecho compra (4 productos)', 2, '24.05.2015', ' 2'),
(214, 2, 'Ha hecho compra<br> (1 productos)', 2, '24.05.2015', ' 2'),
(215, 2, 'Ha hecho compra<br> (3 productos)', 2, '24.05.2015', ' 2'),
(216, 2, 'Ha hecho compra<br> (4 productos)', 2, '24.05.2015', ' 2'),
(217, 2, 'Ha hecho compra<br> (5 productos)', 2, '24.05.2015', ' 2'),
(218, 2, 'Ha hecho compra<br> (1 producto)', 2, '24.05.2015', ' 2'),
(219, 2, 'Ha hecho compra<br> (3 productos)', 2, '24.05.2015', ' 2'),
(220, 2, 'Ha hecho compra<br> (1 producto)', 2, '24.05.2015', ' 2'),
(221, 2, 'Ha hecho compra<br> (3 productos)', 2, '24.05.2015', ' 2'),
(222, 2, 'Ha hecho compra<br> (4 productos)', 2, '24.05.2015', ' 2'),
(223, 2, 'Ha hecho compra<br> (6 productos)', 2, '24.05.2015', ' 2'),
(224, 2, 'Ha hecho compra<br> (7 productos)', 2, '24.05.2015', ' 2'),
(225, 2, 'Ha hecho compra<br> (2 productos)', 2, '24.05.2015', ' 2'),
(226, 2, 'Ha hecho compra<br> (1 producto)', 2, '24.05.2015', ' 2'),
(227, 2, 'Ha hecho compra<br> (3 productos)', 2, '24.05.2015', ' 2'),
(228, 2, 'Ha realizado: Bajar la basura', 2, '24.05.2015', ' 2'),
(229, 2, 'Ha eliminado el producto: arhaeghe', 2, '24.05.2015', ' 2'),
(230, 2, 'Ha eliminado el producto: dgsr', 2, '24.05.2015', ' 2'),
(231, 2, 'Ha eliminado el producto: ergaregergr', 2, '24.05.2015', ' 2'),
(232, 2, 'Ha eliminado el producto: ergeerge', 2, '24.05.2015', ' 2'),
(233, 2, 'Ha eliminado el producto: ergergreg', 2, '24.05.2015', ' 2'),
(234, 2, 'Ha eliminado el producto: hsrthrseh', 2, '24.05.2015', ' 2'),
(235, 2, 'Ha eliminado el producto: kuyky6rk76', 2, '24.05.2015', ' 2'),
(236, 2, 'Ha eliminado el producto: regaerge', 2, '24.05.2015', ' 2'),
(237, 2, 'Ha eliminado el producto: regeasrhgsethr', 2, '24.05.2015', ' 2'),
(238, 2, 'Ha eliminado el producto: sdfhsretas', 2, '24.05.2015', ' 2'),
(239, 2, 'Ha eliminado el producto: sthserghe', 2, '24.05.2015', ' 2'),
(240, 2, 'Ha eliminado el producto: sthtrrsghrtgh', 2, '24.05.2015', ' 2'),
(241, 2, 'Ha eliminado: cena hoy', 2, '24.05.2015', ' 2'),
(242, 2, 'Ha añadido un mensaje al tablón', 2, '24.05.2015', ' 2'),
(243, 2, 'Ha realizado: Bajar la basura', 2, '24.05.2015', ' 2'),
(244, 2, 'Ha añadido el producto: Batidos', 2, '24.05.2015', ' 2'),
(245, 2, 'Ha hecho compra<br> (2 productos)', 2, '24.05.2015', ' 2'),
(246, 2, 'Ha añadido el producto: dsrbghaedrgae', 2, '26.05.2015', ' 2'),
(247, 2, 'Ha añadido el producto: dbvrsavs', 2, '26.05.2015', ' 2'),
(248, 2, 'Ha añadido el producto: dvasvasv', 2, '26.05.2015', ' 2'),
(249, 2, 'Ha añadido el producto: dfvzasvwa', 2, '26.05.2015', ' 2'),
(250, 2, 'Ha añadido el producto: dvsdv', 2, '26.05.2015', ' 2'),
(251, 2, 'Ha añadido el producto: sdvsa', 2, '26.05.2015', ' 2'),
(252, 2, 'Ha añadido el producto: fsdvsav', 2, '26.05.2015', ' 2'),
(253, 2, 'Ha añadido el producto: svvsavevwse', 2, '26.05.2015', ' 2'),
(254, 2, 'Ha añadido el producto: fdabbnetshazbhtae', 2, '26.05.2015', ' 2'),
(255, 2, 'Ha añadido el producto: adfbsdaesb', 2, '26.05.2015', ' 2'),
(256, 2, 'Ha añadido el producto: zzzz', 2, '26.05.2015', ' 2'),
(257, 2, 'Ha añadido el producto: aaa', 2, '26.05.2015', ' 2'),
(258, 2, 'Ha añadido el producto: aaaa', 2, '26.05.2015', ' 2'),
(259, 2, 'Ha añadido el producto: aa', 2, '26.05.2015', ' 2'),
(260, 2, 'Ha añadido el producto: zanahorias', 2, '26.05.2015', ' 2'),
(261, 2, 'Ha añadido el producto: patatas', 2, '26.05.2015', ' 2'),
(262, 2, 'Ha añadido el producto: judias', 2, '26.05.2015', ' 2'),
(263, 2, 'Ha añadido el producto: aaaaa', 2, '26.05.2015', ' 2'),
(264, 2, 'Ha añadido el producto: a', 2, '26.05.2015', ' 2'),
(265, 2, 'Ha añadido el producto: pedo', 2, '26.05.2015', ' 2'),
(266, 2, 'Ha añadido el producto: caca', 2, '26.05.2015', ' 2'),
(267, 2, 'Ha añadido el producto: ada', 2, '26.05.2015', ' 2'),
(268, 2, 'Ha añadido el producto: a', 2, '26.05.2015', ' 2'),
(269, 2, 'Ha añadido el producto: alaca', 2, '26.05.2015', ' 2'),
(270, 2, 'Ha hecho compra<br> (1 producto)', 2, '26.05.2015', ' 2'),
(271, 2, 'Ha añadido el producto: aa', 2, '26.05.2015', ' 2'),
(272, 2, 'Ha eliminado el producto: a', 2, '26.05.2015', ' 2'),
(273, 2, 'Ha eliminado el producto: a', 2, '26.05.2015', ' 2'),
(274, 2, 'Ha eliminado el producto: aa', 2, '26.05.2015', ' 2'),
(275, 2, 'Ha eliminado el producto: aa', 2, '26.05.2015', ' 2'),
(276, 2, 'Ha eliminado el producto: aaa', 2, '26.05.2015', ' 2'),
(277, 2, 'Ha eliminado el producto: aaaa', 2, '26.05.2015', ' 2'),
(278, 2, 'Ha eliminado el producto: aaaaa', 2, '26.05.2015', ' 2'),
(279, 2, 'Ha eliminado el producto: ada', 2, '26.05.2015', ' 2'),
(280, 2, 'Ha eliminado el producto: adfbsdaesb', 2, '26.05.2015', ' 2'),
(281, 2, 'Ha eliminado el producto: alaca', 2, '26.05.2015', ' 2'),
(282, 2, 'Ha añadido el producto: aaaaaaa', 2, '26.05.2015', ' 2'),
(283, 2, 'Ha añadido el producto: aaaaaa', 2, '26.05.2015', ' 2'),
(284, 2, 'Ha añadido el producto: aaaaa', 2, '26.05.2015', ' 2'),
(285, 2, 'Ha añadido el producto: dds', 2, '26.05.2015', ' 2'),
(286, 2, 'Ha añadido el producto: aaa', 2, '26.05.2015', ' 2'),
(287, 2, 'Ha añadido el producto: aa', 2, '26.05.2015', ' 2'),
(288, 2, 'Ha añadido el producto: a', 2, '26.05.2015', ' 2'),
(289, 2, 'Ha añadido el producto: alala', 2, '26.05.2015', ' 2'),
(290, 2, 'Ha añadido el producto: cacaca', 2, '26.05.2015', ' 2'),
(291, 2, 'Ha eliminado el producto: a', 2, '26.05.2015', ' 2'),
(292, 2, 'Ha eliminado el producto: aa', 2, '26.05.2015', ' 2'),
(293, 2, 'Ha eliminado el producto: aaa', 2, '26.05.2015', ' 2'),
(294, 2, 'Ha eliminado el producto: aaaaa', 2, '26.05.2015', ' 2'),
(295, 2, 'Ha eliminado el producto: aaaaaa', 2, '26.05.2015', ' 2'),
(296, 2, 'Ha eliminado el producto: aaaaaaa', 2, '26.05.2015', ' 2'),
(297, 2, 'Ha eliminado el producto: alala', 2, '26.05.2015', ' 2'),
(298, 2, 'Ha añadido el producto: alalalalalalala', 2, '26.05.2015', ' 2'),
(299, 2, 'Ha añadido el producto: alalalalala', 2, '26.05.2015', ' 2'),
(300, 2, 'Ha añadido el producto: alalala', 2, '26.05.2015', ' 2'),
(301, 2, 'Ha añadido el producto: ala', 2, '26.05.2015', ' 2'),
(302, 2, 'Ha añadido el producto: pechuga', 2, '26.05.2015', ' 2'),
(303, 2, 'Ha añadido el producto: pollo', 2, '26.05.2015', ' 2'),
(304, 2, 'Ha eliminado el producto: ala', 2, '26.05.2015', ' 2'),
(305, 2, 'Ha eliminado el producto: alalala', 2, '26.05.2015', ' 2'),
(306, 2, 'Ha eliminado el producto: alalalalala', 2, '26.05.2015', ' 2'),
(307, 2, 'Ha eliminado el producto: alalalalalalala', 2, '26.05.2015', ' 2'),
(308, 2, 'Ha realizado: Bajar la basura', 2, '26.05.2015', ' 2'),
(309, 2, 'Ha hecho compra<br> (3 productos)', 2, '26.05.2015', ' 2'),
(310, 2, 'Ha añadido el producto: ensalada', 2, '27.05.2015', ' 2'),
(311, 2, 'Ha añadido el producto: folios', 2, '27.05.2015', ' 2'),
(312, 2, 'Ha hecho compra<br> (2 productos)', 2, '27.05.2015', ' 2'),
(313, 2, 'Ha añadido el producto: aa', 2, '30.05.2015', ' 2'),
(314, 2, 'Ha añadido el producto: baba', 2, '31.05.2015', ''),
(315, 2, 'Ha añadido el producto: bb', 2, '31.05.2015', '');

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
(2, 'Limpiar el baño', 3, 2, 1, '22.05.2015', 6, '24.05.2015', 1),
(11, 'Bajar la basura', 1, 2, 1, '26.05.2015', 2, '26.05.2015', 1),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=19 ;

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
(13, 11, 2, '18.05.2015', 0, 2),
(14, 2, 2, '22.05.2015', 0, 2),
(15, 11, 2, '22.05.2015', 0, 2),
(16, 11, 2, '24.05.2015', 0, 2),
(17, 11, 2, '24.05.2015', 0, 2),
(18, 11, 2, '26.05.2015', 0, 2);

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
  `sal` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`iduser`),
  KEY `idhome` (`idhome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`iduser`, `name`, `idhome`, `mail`, `photo`, `passwd`, `admin`, `points`, `sal`) VALUES
(2, 'Miguel', 2, 'mhiguera@easyhouse.me', '/sweethomesw/img/avatares/41.png', '75004f149038473757da0be07ef76dd4a9bdbc8d', 1, 38, ''),
(4, 'juan', 2, 'juan@juan.com', '/sweethomesw/img/avatares/13.png', 'b49a5780a99ea81284fc0746a78f84a30e4d5c73', 0, 2, ''),
(10, 'ana', 2, 'ana@ana.com', '/sweethomesw/img/avatares/6.png', '72019bbac0b3dac88beac9ddfef0ca808919104f', 0, 0, ''),
(13, 'Miguel', 3, 'mhtombe85@gmail.com', '/sweethomesw/img/avatares/10.png', '75004f149038473757da0be07ef76dd4a9bdbc8d', 1, 2, ''),
(14, 'prueba', 4, 'prueba@p.com', '/sweethomesw/img/avatares/0.png', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 1, 0, ''),
(15, 'prueba1', 5, 'prueba@p.com1', '/sweethomesw/img/avatares/0.png', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 1, 0, ''),
(16, 'iaia', 6, 'iaia@ia.ia', '/sweethomesw/img/avatares/0.png', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 1, 0, ''),
(17, 'Miguel', 7, 'miguel@miguel.com', '/sweethomesw/img/avatares/1.png', '81bce1f3bf343c464685d875c626820cdb58e309', 1, 0, '');

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
