-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2024 a las 23:02:40
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eyc_proyecto_pagina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(12) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `mensaje` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `nombre`, `telefono`, `correo`, `mensaje`) VALUES
(1, 'Liceth', '31055', 'liceth2006valderrama@gmail.com', 'HOLA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_de_vida`
--

CREATE TABLE `hoja_de_vida` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `celular` varchar(30) NOT NULL,
  `tipo_documento` varchar(50) NOT NULL,
  `numero_documento` varchar(30) NOT NULL,
  `departamento` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `profesion` varchar(100) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hoja_de_vida`
--

INSERT INTO `hoja_de_vida` (`id`, `nombre`, `correo`, `celular`, `tipo_documento`, `numero_documento`, `departamento`, `ciudad`, `profesion`, `mensaje`) VALUES
(1, 'Liceth', 'liceth@gmail.com', '3107098865', 'cedula', '1027956039', 'Antioquia', 'medellin', 'desarrollador', 'buenos dias'),
(3, 'Alejandro', 'alejo123@gmail.com', '3128321655', 'cedula', '102473788', 'Caldas', 'Norcasia', 'Inspector', 'Buenos dias,SMLV');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(12) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasenna` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasenna`) VALUES
(1, 'Liceth Valderrama', 'liceth3@gmail.com', 1234),
(2, 'Madison', 'Madi@gmail.com', 123);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hoja_de_vida`
--
ALTER TABLE `hoja_de_vida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `hoja_de_vida`
--
ALTER TABLE `hoja_de_vida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
