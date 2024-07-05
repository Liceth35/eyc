-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2024 a las 02:09:15
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

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
-- Estructura de tabla para la tabla `admin_blog`
--

CREATE TABLE `admin_blog` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `resumen` text NOT NULL,
  `contenido` text NOT NULL,
  `url_imagen` varchar(255) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin_blog`
--

INSERT INTO `admin_blog` (`id`, `titulo`, `resumen`, `contenido`, `url_imagen`, `fecha_creacion`, `fecha_actualizacion`) VALUES
(1, 'Inspección de Gas: ¿Por qué es Importante?', 'Descubre la importancia de realizar inspecciones regulares de gas para garantizar la seguridad en el hogar.', 'Las inspecciones de gas son fundamentales para asegurar que todos los sistemas de gas en el hogar funcionen de manera segura y eficiente. Un sistema de gas defectuoso puede provocar fugas peligrosas y aumentar el riesgo de incendios. En este artículo, exploraremos los beneficios de las inspecciones regulares y cómo pueden ayudar a prevenir accidentes graves.\n', './images/clean_code_bg.jpg', '2024-06-27 12:39:23', '2024-06-27 15:19:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificados`
--

CREATE TABLE `certificados` (
  `id` int(11) NOT NULL,
  `numero_cedula` varchar(100) NOT NULL,
  `codigo_verificacion` varchar(50) NOT NULL,
  `ubicacion_certificado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `certificados`
--

INSERT INTO `certificados` (`id`, `numero_cedula`, `codigo_verificacion`, `ubicacion_certificado`) VALUES
(1, '1027956039', '1234565ABC', './admin/uploads_certificado/ejemplo.pdf'),
(3, '22024737', '12345CCC', './admin/uploads_certificado/ejemplo.pdf');

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
(1, 'Liceth', '31055', 'liceth2006valderrama@gmail.com', 'HOLA'),
(2, 'Liceth', '31055', 'liceth2006valderrama@gmail.com', 'Hola'),
(3, 'David Andrade', '310555', 'est.lmonsalve824@smart.edu.co', 'Buenos dias, me gustaria comunicarme con ustedes para una inspecion de gas'),
(4, 'Alejandro', '31055', 'est.lmonsalve824@smart.edu.co', 'Hola necesito ayuda'),
(5, 'DAVID ', '321184332', 'est.lmonsalve824@smart.edu.co', 'Quiero poner una queja'),
(6, 'Liceth', '31055', 'liceth2006valderrama@gmail.com', 'prueba33');

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
  `mensaje` text NOT NULL,
  `archivo_adjunto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hoja_de_vida`
--

INSERT INTO `hoja_de_vida` (`id`, `nombre`, `correo`, `celular`, `tipo_documento`, `numero_documento`, `departamento`, `ciudad`, `profesion`, `mensaje`, `archivo_adjunto`) VALUES
(1, 'David Andrade', 'david@gmail.com', '3107098865', 'cedula', '1027956039', 'Antioquia', 'medellin', 'desarrollador', 'PRUEBA20', 'uploads/Ejemplo-de-descarga-pdf.pdf'),
(2, 'Kelly meneses', 'kelly20@gmail.com', '3125556632', 'cedula', '1029659880', 'Antioquia', 'Apartado', 'Contadora', 'Buenos dias, esta es mu cv', 'uploads/Hoja de vida profesional azul.pdf'),
(3, 'henry vargas', 'henry@gmail.com', '32235', 'cedula_extranjeria', '58487', 'Antioquia', 'medellin', 'desarrollador', 'prueba50', 'uploads/Hoja de vida profesional azul.pdf'),
(8, 'Kevin Montoya', 'kevin@gmail.com', '312835269898', 'cedula', '21165656', 'Antioquia', 'Medellin', 'Diseñador grafico', 'ESTO ES UNA PRUEBA', 'uploads/Hoja de Vida Administrador Sencillo Blanco y Negro.pdf');

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
(3, 'Juan Perez', 'juan.perez@example.com', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_blog`
--

CREATE TABLE `usuarios_blog` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasenna` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_blog`
--

INSERT INTO `usuarios_blog` (`id`, `nombre`, `correo`, `contrasenna`) VALUES
(1, 'Liceth V', 'Liceth3@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_cert`
--

CREATE TABLE `usuarios_cert` (
  `id` int(11) NOT NULL,
  `cedula` varchar(20) DEFAULT NULL,
  `contrasenna` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_cert`
--

INSERT INTO `usuarios_cert` (`id`, `cedula`, `contrasenna`, `nombre`) VALUES
(1, '1027956039', '1234', 'Liceth V');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_citas`
--

CREATE TABLE `usuarios_citas` (
  `id` int(11) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `contrasenna` varchar(255) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_citas`
--

INSERT INTO `usuarios_citas` (`id`, `cedula`, `contrasenna`, `nombre`) VALUES
(1, '1027956039', '1234', 'Liceth V');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_pqrs`
--

CREATE TABLE `usuarios_pqrs` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `contrasenna` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_pqrs`
--

INSERT INTO `usuarios_pqrs` (`id`, `nombre`, `cedula`, `contrasenna`) VALUES
(1, 'Liceth V', '1027956039', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_rh`
--

CREATE TABLE `usuarios_rh` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `contrasenna` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_rh`
--

INSERT INTO `usuarios_rh` (`id`, `nombre`, `cedula`, `contrasenna`) VALUES
(1, 'Liceth V', '1027956039', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin_blog`
--
ALTER TABLE `admin_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `certificados`
--
ALTER TABLE `certificados`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `usuarios_blog`
--
ALTER TABLE `usuarios_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_cert`
--
ALTER TABLE `usuarios_cert`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_citas`
--
ALTER TABLE `usuarios_citas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indices de la tabla `usuarios_pqrs`
--
ALTER TABLE `usuarios_pqrs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_rh`
--
ALTER TABLE `usuarios_rh`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin_blog`
--
ALTER TABLE `admin_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `certificados`
--
ALTER TABLE `certificados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `hoja_de_vida`
--
ALTER TABLE `hoja_de_vida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios_blog`
--
ALTER TABLE `usuarios_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios_cert`
--
ALTER TABLE `usuarios_cert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios_citas`
--
ALTER TABLE `usuarios_citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios_pqrs`
--
ALTER TABLE `usuarios_pqrs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios_rh`
--
ALTER TABLE `usuarios_rh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
