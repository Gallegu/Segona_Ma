-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2015 a las 16:08:11
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE IF NOT EXISTS `anuncios` (
`id_anuncio` int(11) NOT NULL,
  `Titulo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `Precio` decimal(10,0) NOT NULL,
  `Imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  `usuario` int(11) NOT NULL,
  `Vendido` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id_anuncio`, `Titulo`, `Descripcion`, `Precio`, `Imagen`, `Fecha`, `usuario`, `Vendido`) VALUES
(1, 'kk', 'hh', '1', 'kk', '2015-05-06', 1, 'Vendido'),
(2, 'kk2', 'kk2', '2', 'kk2', '2015-05-07', 1, ''),
(19, 'zarcer', 'serg', '66', 'serg', '2015-05-08', 2, ''),
(20, 'e', 'e', '4', 'e', '2015-05-08', 2, ' '),
(21, 'callaros', 'callaros', '53', 'callros', '2015-05-08', 2, ' '),
(22, 'nene', 'nene', '33', 'nene', '2015-05-08', 2, ' '),
(23, 'lolo', 'lolo', '9', 'lolo', '2015-05-08', 2, ' '),
(24, 'kkkk', 'kk', '8', 'kk', '2015-05-10', 5, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id_user` int(11) NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Rol` int(11) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `Nombre`, `Apellidos`, `Email`, `Usuario`, `Password`, `Rol`, `Estado`) VALUES
(5, 'admin', 'kk', 'admin@gmail.com', 'admin', 'kk', 1, 1),
(7, 'a', 'a', 'a@gmail.com', 'a', 'kk', 1, 1),
(8, 'e', 'e', 'e@gmail.com', 'e', 'kk', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
 ADD PRIMARY KEY (`id_anuncio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `Usuario` (`Usuario`), ADD UNIQUE KEY `email` (`Email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
MODIFY `id_anuncio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
