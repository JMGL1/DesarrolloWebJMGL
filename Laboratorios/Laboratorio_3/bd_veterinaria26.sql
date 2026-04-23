-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2026 a las 16:41:00
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
-- Base de datos: `bd_veterinaria26`
--
CREATE DATABASE IF NOT EXISTS `bd_veterinaria26` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_veterinaria26`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especies`
--

CREATE TABLE `especies` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especies`
--

INSERT INTO `especies` (`id`, `nombre`) VALUES
(1, 'Perro'),
(2, 'Gato'),
(3, 'Ave'),
(4, 'Roedor'),
(5, 'Reptil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `id` int(11) NOT NULL,
  `fotografia` varchar(100) DEFAULT NULL,
  `nombre` varchar(40) NOT NULL,
  `raza` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `propietario` varchar(80) DEFAULT NULL,
  `especie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especies`
--
ALTER TABLE `especies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `especie_id` (`especie_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `especies`
--
ALTER TABLE `especies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `mascotas_ibfk_1` FOREIGN KEY (`especie_id`) REFERENCES `especies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
