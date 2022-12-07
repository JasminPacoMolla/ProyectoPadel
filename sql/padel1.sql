-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 07-12-2022 a las 15:33:31
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
-- Estructura de tabla para la tabla `horarioDiario`
--

CREATE TABLE `horarioDiario` (
  `id` int NOT NULL,
  `fecha` date DEFAULT NULL,
  `horaApertura` float DEFAULT NULL,
  `horaCierre` float DEFAULT NULL,
  `duracionIntervalo` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarioMensual`
--

CREATE TABLE `horarioMensual` (
  `id` int NOT NULL,
  `mes` int DEFAULT NULL,
  `hora` int DEFAULT NULL,
  `idHorarioDiario` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intervaloDia`
--

CREATE TABLE `intervaloDia` (
  `id` int NOT NULL,
  `inicioIntervalo` int DEFAULT NULL,
  `finIntervalo` int DEFAULT NULL,
  `idHorario` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
-- Volcado de datos para la tabla `PERSONA`
--

INSERT INTO `PERSONA` (`DNI`, `NOMBRE`, `APELLIDOS`, `CORREOELECTRONICO`, `CONTRASENYA`, `TELEFONO`) VALUES
('000000', 'jasmin', 'MOUSSAOUI', '1234@gmail.com', '1234', '0638668146'),
('000001', 'jasmin', 'Msw', 'ymoussaou@gmail.com', '00000000000', ''),
('000002', 'jasmin', 'Msw', 'moussaou@gmail.com', '00000000000', NULL),
('000003', 'jasmin', 'Msw', 'moussaoui@gmail.com', '00000000000', NULL),
('000004', 'jasmin', 'Msw', 'msw@gmail.com', '00000000000', NULL),
('000005', 'jasmin', 'msw msw', 'ymoussaoui11@gmail.com', '00000000000', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PISTA`
--

CREATE TABLE `PISTA` (
  `idPista` int NOT NULL,
  `precio` float DEFAULT NULL,
  `luz` varchar(20) DEFAULT NULL,
  `precioLuz` float DEFAULT NULL,
  `cubierta` varchar(20) DEFAULT NULL,
  `tipoPista` varchar(20) DEFAULT NULL,
  `reservaPistaMensual` int DEFAULT NULL,
  `disponible` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `horarioDiario`
--
ALTER TABLE `horarioDiario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horarioMensual`
--
ALTER TABLE `horarioMensual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idHorarioDiario` (`idHorarioDiario`);

--
-- Indices de la tabla `intervaloDia`
--
ALTER TABLE `intervaloDia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idHorario` (`idHorario`);

--
-- Indices de la tabla `PERSONA`
--
ALTER TABLE `PERSONA`
  ADD PRIMARY KEY (`DNI`),
  ADD UNIQUE KEY `CORREOELECTRONICO` (`CORREOELECTRONICO`);

--
-- Indices de la tabla `PISTA`
--
ALTER TABLE `PISTA`
  ADD PRIMARY KEY (`idPista`),
  ADD KEY `reservaPistaMensual` (`reservaPistaMensual`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `horarioDiario`
--
ALTER TABLE `horarioDiario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horarioMensual`
--
ALTER TABLE `horarioMensual`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `intervaloDia`
--
ALTER TABLE `intervaloDia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `horarioMensual`
--
ALTER TABLE `horarioMensual`
  ADD CONSTRAINT `horarioMensual_ibfk_1` FOREIGN KEY (`idHorarioDiario`) REFERENCES `horarioDiario` (`id`);

--
-- Filtros para la tabla `intervaloDia`
--
ALTER TABLE `intervaloDia`
  ADD CONSTRAINT `intervaloDia_ibfk_1` FOREIGN KEY (`idHorario`) REFERENCES `horarioDiario` (`id`);

--
-- Filtros para la tabla `PISTA`
--
ALTER TABLE `PISTA`
  ADD CONSTRAINT `PISTA_ibfk_1` FOREIGN KEY (`reservaPistaMensual`) REFERENCES `horarioMensual` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
