-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2024 a las 05:03:18
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

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
(1, 'Inspección de Gas: ¿Por qué es Importante?', 'Descubre la importancia de realizar inspecciones regulares de gas para garantizar la seguridad en el hogar.', 'Las inspecciones de gas son fundamentales para asegurar que todos los sistemas de gas en el hogar funcionen de manera segura y eficiente. Un sistema de gas defectuoso puede provocar fugas peligrosas y aumentar el riesgo de incendios. En este artículo, exploraremos los beneficios de las inspecciones regulares y cómo pueden ayudar a prevenir accidentes graves.\n', './images/clean_code_bg.jpg', '2024-06-27 12:39:23', '2024-06-27 15:19:52'),
(4, ' Inspección de Gas', 'Inspección de gas', 'Inspecciones', './images/Captura de pantalla (77).png', '2024-07-08 20:05:59', '2024-07-08 20:05:59'),
(14, 'Liceth', 'Esta es una prueba ', 'hola', './images/WhatsApp Image 2024-07-03 at 8.56.21 AM.jpeg', '2024-07-17 20:29:54', '2024-07-17 20:29:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `id` int(11) NOT NULL,
  `municipio_id` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `mes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calendario`
--

INSERT INTO `calendario` (`id`, `municipio_id`, `dia`, `mes`) VALUES
(1, 1, 3, 8),
(2, 1, 10, 8),
(3, 2, 5, 8),
(4, 3, 15, 8);

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
(3, '22024737', '12345CCCCC', './admin/uploads_certificado/ejemplo.pdf'),
(5, '1027956039', 'kizj0v5965', './admin/uploads_certificado/ejemplo-de-descarga-pdfpdf.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `tipo_documento` varchar(10) NOT NULL,
  `numero_documento` varchar(20) NOT NULL,
  `numero_contrato` varchar(20) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `franja` varchar(20) NOT NULL,
  `dia` int(2) NOT NULL,
  `mes` int(2) NOT NULL,
  `municipio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(4, 'Alejandro', '31055', 'est.lmonsalve824@smart.edu.co', 'Hola necesito ayuda'),
(5, 'DAVID ', '321184332', 'est.lmonsalve824@smart.edu.co', 'Quiero poner una queja'),
(6, 'Liceth', '31055', 'liceth2006valderrama@gmail.com', 'prueba33'),
(9, 'David Andrade', '31055', 'liceth2006valderrama@gmail.com', 'Hola'),
(10, 'ds', 'ds', 'liceth2006valderrama@gmail.com', 'ds');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `franjas_horarias`
--

CREATE TABLE `franjas_horarias` (
  `id` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `municipio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `franjas_horarias`
--

INSERT INTO `franjas_horarias` (`id`, `dia`, `mes`, `hora_inicio`, `hora_fin`, `municipio_id`) VALUES
(1, 3, 8, '09:00:00', '12:00:00', 1),
(2, 3, 8, '12:00:00', '16:00:00', 1),
(3, 10, 8, '13:00:00', '14:00:00', 1),
(5, 15, 8, '15:00:00', '16:00:00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_de_vida`
--

CREATE TABLE `hoja_de_vida` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `numero_documento` varchar(20) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `profesion` varchar(100) NOT NULL,
  `tipo_moto` varchar(50) DEFAULT NULL,
  `modelo_moto` varchar(50) DEFAULT NULL,
  `estado_propiedad` varchar(50) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `archivo_adjunto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hoja_de_vida`
--

INSERT INTO `hoja_de_vida` (`id`, `nombre`, `correo`, `celular`, `tipo_documento`, `numero_documento`, `departamento`, `ciudad`, `profesion`, `tipo_moto`, `modelo_moto`, `estado_propiedad`, `mensaje`, `archivo_adjunto`) VALUES
(1, 'Liceth', 'liceth3@gmail.com', '3107098865', 'cedula', '1027956039', 'Antioquia', 'medellin', 'inspector', 'Deportiva', '2024', 'David andrade', 'PRUEBAAAAAAAAA', 'uploads/Hoja de Vida Administrador Sencillo Blanco y Negro.pdf'),
(2, 'David Andrade', 'liceth3@gmail.com', '3107098865', 'cedula', '1027956039', 'Antioquia', 'medellin', 'inspector', 'Deportiva', '2024', 'David andrade', 'bendito', 'uploads/Hoja de Vida Administrador Sencillo Blanco y Negro.pdf'),
(3, 'Liceth Valderrama', 'liceth3@gmail.com', '3107098865', 'cedula', '1027956039', 'Antioquia', 'medellin', 'contador', '', '', '', 'Eston es una prueba', 'uploads/Hoja de Vida Administrador Sencillo Blanco y Negro.pdf');

-- --------------------------------------------------------

--



-- Estructura de tabla para la tabla `municipios`
--
-- --------------------------------------------------------

-- Estructura de tabla para la tabla `departamentos`
CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcado de datos para la tabla `departamentos`
INSERT INTO `departamentos` (`id`, `nombre`) VALUES
(1, 'Antioquia'),
(2, 'Valle del Cauca'),
(3, 'Atlántico');

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `municipios`
CREATE TABLE `municipios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `departamento_id` (`departamento_id`),
  CONSTRAINT `municipios_ibfk_1` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcado de datos para la tabla `municipios`
INSERT INTO `municipios` (`id`, `nombre`, `departamento_id`) VALUES
(1, 'Medellin', 1),
(2, 'Bello', 1),
(3, 'Cali', 2),
(4, 'Barranquilla', 3);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(12) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasenna` int(30) NOT NULL,
  `rol` enum('admin','usuarios') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasenna`, `rol`) VALUES
(1, 'Liceth Valderrama', 'admin@gmail.com', 1234, 'admin'),
(3, 'Juan Perez', 'juan.perez@example.com', 12, 'admin');

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
(1, 'admin@gmail.com', '1234', 'Liceth V');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_eyc`
--

CREATE TABLE `usuarios_eyc` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nivel` int(11) DEFAULT 1,
  `puntos` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_eyc`
--

INSERT INTO `usuarios_eyc` (`id`, `nombre`, `email`, `nivel`, `puntos`) VALUES
(1, 'Juan Pérez', 'juan.perez@example.com', 1, 10),
(2, 'Ana Gómez', 'ana.gomez@example.com', 2, 20);

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
(1, 'Liceth V', 'admin@gmail.com', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin_blog`
--
ALTER TABLE `admin_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipio_id` (`municipio_id`);

--
-- Indices de la tabla `certificados`
--
ALTER TABLE `certificados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipio_id` (`municipio_id`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `franjas_horarias`
--
ALTER TABLE `franjas_horarias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipio_id` (`municipio_id`);

--
-- Indices de la tabla `hoja_de_vida`
--
ALTER TABLE `hoja_de_vida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
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
-- Indices de la tabla `usuarios_eyc`
--
ALTER TABLE `usuarios_eyc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `calendario`
--
ALTER TABLE `calendario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `certificados`
--
ALTER TABLE `certificados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `franjas_horarias`
--
ALTER TABLE `franjas_horarias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `hoja_de_vida`
--
ALTER TABLE `hoja_de_vida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT de la tabla `usuarios_eyc`
--
ALTER TABLE `usuarios_eyc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD CONSTRAINT `calendario_ibfk_1` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`);

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `franjas_horarias`
--
ALTER TABLE `franjas_horarias`
  ADD CONSTRAINT `franjas_horarias_ibfk_1` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
