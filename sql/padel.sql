-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 02-11-2022 a las 15:14:11
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `padel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PERSONA`
--

CREATE TABLE `PERSONA` (
  `DNI` varchar(9) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDOS` varchar(50) NOT NULL,
  `CORREOELECTRONICO` varchar(255) NOT NULL,
  `CONTRASENYA` varchar(255) NOT NULL,
  `TELEFONO` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `PERSONA`
--
ALTER TABLE `PERSONA`
  ADD PRIMARY KEY (`DNI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
