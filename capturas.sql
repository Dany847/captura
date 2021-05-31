-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2021 a las 04:15:06
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `capturas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id_actividad` int(11) NOT NULL,
  `tipo` varchar(40) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `a_facebook` varchar(40) DEFAULT NULL,
  `a_twitter` varchar(40) DEFAULT NULL,
  `fecha` int(10) NOT NULL,
  `cumplimiento` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_actividad`, `tipo`, `nombre`, `a_facebook`, `a_twitter`, `fecha`, `cumplimiento`) VALUES
(1, 'Video', 'Visita de Nibardo a Olomatlán', 'Nibardo.js/visita-olomatlán', '', 2021, 'si'),
(2, 'Video', 'visita de Nibardo a Hahuatempan', 'Nibardo.js/visita-a-hahuatempan', '', 2021, '200'),
(3, 'Video', 'Acerca del colapso de la linea 12 del me', 'https://fb.watch/5uOPha_hXX/', 'Aquile_/5uOPha_hXX/', 2021, '250'),
(4, 'Articulo', 'EL COLAPSO DEL METRO VS. EL DE LA SALUD', 'facebook.com%2FAquilesCordovaOficial%2Fp', 'Twittte/AquilesCordovaOficial%2Fposts%2F', 2021, '250'),
(5, 'GDFGDF', 'SDGSDG', 'SDGSDG', 'DSGSDGSD', 2021, 'DGSDG'),
(6, 'Publicación Juan Celis', 'Articulo de aquilez', 'Juan Celiz', 'hfdjvgjrvfc', 275760, 'si'),
(7, 'video de Araceli', 'Articulo de Juan celis', 'Araceli Garcia', 'chelita', 124, 'si'),
(8, 'articulo de juan celiz', 'Video de Jusnm celis', 'Aquiles Cordova', 'Aquiles', 1234, 'si'),
(9, 'VIDEO MTRA. HERSILIA CORDOVA MORAN', 'EL COLAPSO DEL METRO VS. EL DE LA SALUD', 'Herselia', 'her', 2004, '250'),
(10, ' #ProtestaPorTragediaEnMetro', 'Video de Jusnm celis', 'Sixta', 'Sixtin', 3542, '200'),
(11, ' #MéxicoDefiendeAlINE 20-04-21', 'Acerca del colapso de la linea 12', 'Yosvani', 'Yosvis', 1999, '120'),
(12, ' #50MilTabasqueñosAPalacio', 'EL COLAPSO DEL METRO VS. EL DE LA SALUD', 'Álvaro Fernández', 'Álvaro', 2002, '120'),
(13, '#MorenaSolapaAbusadores ', 'Acerca del colapso de la linea 12 del me', 'Concepcion', 'Conchita', 1995, 'si'),
(14, '#NoMásMuertesEnElMetro', 'EL COLAPSO DEL METRO VS. EL DE LA SALUD', 'Herendida Gonzalez', 'Herendida', 1993, '250'),
(15, 'Videl', 'visita de Nibardo a Tecomatlan', 'sdasdf', 'asfasf', 2021, '120'),
(16, 'Video', 'Visita de Nibardo a Olomatlán', 'Nibardo.js/visita-olomatlán', '', 2021, 'si'),
(17, 'Video', 'visita de Nibardo a Hahuatempan', 'Nibardo.js/visita-a-hahuatempan', '', 2021, '200'),
(18, 'Video', 'Acerca del colapso de la linea 12 del me', 'https://fb.watch/5uOPha_hXX/', 'Aquile_/5uOPha_hXX/', 2021, '250'),
(19, 'Articulo', 'EL COLAPSO DEL METRO VS. EL DE LA SALUD', 'facebook.com%2FAquilesCordovaOficial%2Fp', 'Twittte/AquilesCordovaOficial%2Fposts%2F', 2021, '250'),
(20, 'GDFGDF', 'SDGSDG', 'SDGSDG', 'DSGSDGSD', 2021, 'DGSDG'),
(21, 'Publicación Juan Celis', 'Articulo de aquilez', 'Juan Celiz', 'hfdjvgjrvfc', 275760, 'si'),
(22, 'video de Araceli', 'Articulo de Juan celis', 'Araceli Garcia', 'chelita', 124, 'si'),
(23, 'articulo de juan celiz', 'Video de Jusnm celis', 'Aquiles Cordova', 'Aquiles', 1234, 'si'),
(24, 'VIDEO MTRA. HERSILIA CORDOVA MORAN', 'EL COLAPSO DEL METRO VS. EL DE LA SALUD', 'Herselia', 'her', 2004, '250');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `captura`
--

CREATE TABLE `captura` (
  `id_captura` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `idmiembros` int(11) NOT NULL,
  `c_facebook` varchar(20) NOT NULL,
  `c_twitter` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembro`
--

CREATE TABLE `miembro` (
  `idmiembros` int(11) NOT NULL,
  `id_organismo` int(11) NOT NULL,
  `nombremiembro` varchar(40) NOT NULL,
  `c_facebook` varchar(50) NOT NULL,
  `c_twitter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `miembro`
--

INSERT INTO `miembro` (`idmiembros`, `id_organismo`, `nombremiembro`, `c_facebook`, `c_twitter`) VALUES
(1, 3, 'Angela', 'jazz.jas', 'jasss.tw'),
(2, 1, 'Yazmin', 'angelacastro', 'angelitha.com'),
(3, 3, 'Glorieta Reyes', 'wqeqweqw', 'wqeqweqw'),
(4, 3, 'Yuseli jimenez', 'werwer', 'werwerew'),
(5, 1, 'Sixta', 'dfgdfg', 'dfgdfg'),
(6, 1, 'Yosvani Peres', 'dfgdfgdf', 'dfgdfg'),
(7, 4, 'Calachuid', 'dgsdfg', 'sdfsf'),
(8, 1, 'Olivia', 'dfgdfg', 'dfgdfgdf'),
(9, 1, 'Noemi', 'gfhfghf', 'dfghdfg'),
(10, 2, 'Fabiola', 'fhfdhf', 'dfhgdfghdf'),
(11, 1, 'Fidel', 'fdgdfg', 'sdgsdgf'),
(12, 1, 'Eliel', 'dfghdfghdf', 'dfgdfg'),
(13, 3, 'Gloria', 'sdtgfsdf', 'sdfsdf'),
(14, 1, 'Gloriosa', 'gfhgfh', 'fghgfhgf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organismo`
--

CREATE TABLE `organismo` (
  `id_organismo` int(11) NOT NULL,
  `id_zona` int(11) NOT NULL,
  `nombre_org` varchar(30) NOT NULL,
  `responsable` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `organismo`
--

INSERT INTO `organismo` (`id_organismo`, `id_zona`, `nombre_org`, `responsable`) VALUES
(1, 1, 'Sector 1', 'Juan Toribio'),
(2, 1, 'Sector 2', 'Olivia Garcia'),
(3, 2, 'Cabecera', 'Gloria'),
(4, 2, 'Yazmin', 'Pleno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id_zona` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `responsable` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id_zona`, `nombre`, `responsable`) VALUES
(1, 'Zona 1', 'Veliz Jimenez'),
(2, 'Zona 2', 'Yuseli'),
(3, 'Zona 3', 'Everardo cabrero'),
(4, 'Zona 4', 'Mauricio Jimenez');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `captura`
--
ALTER TABLE `captura`
  ADD PRIMARY KEY (`id_captura`);

--
-- Indices de la tabla `miembro`
--
ALTER TABLE `miembro`
  ADD PRIMARY KEY (`idmiembros`);

--
-- Indices de la tabla `organismo`
--
ALTER TABLE `organismo`
  ADD PRIMARY KEY (`id_organismo`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id_zona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `captura`
--
ALTER TABLE `captura`
  MODIFY `id_captura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `miembro`
--
ALTER TABLE `miembro`
  MODIFY `idmiembros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `organismo`
--
ALTER TABLE `organismo`
  MODIFY `id_organismo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id_zona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
