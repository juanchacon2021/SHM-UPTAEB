-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2024 a las 01:51:06
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
-- Base de datos: `shm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `cod_consulta` int(11) NOT NULL,
  `fechadeconsulta` varchar(10) NOT NULL,
  `consulta` varchar(300) DEFAULT NULL,
  `cedulac` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emergencias`
--

CREATE TABLE `emergencias` (
  `cod_emergencia` int(11) NOT NULL,
  `fechadeingreso` varchar(10) NOT NULL,
  `horaingreso` varchar(7) NOT NULL,
  `motingreso` varchar(300) NOT NULL,
  `cedulae` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ex_fisico_r`
--

CREATE TABLE `ex_fisico_r` (
  `ex_fisico_r` int(11) NOT NULL,
  `boca_abierta` varchar(100) DEFAULT NULL,
  `boca_cerrada` varchar(100) DEFAULT NULL,
  `oidos` varchar(100) DEFAULT NULL,
  `cabeza_craneo` varchar(100) DEFAULT NULL,
  `estremidad` varchar(100) DEFAULT NULL,
  `ojos` varchar(100) DEFAULT NULL,
  `naris` varchar(100) DEFAULT NULL,
  `tiroides` varchar(100) DEFAULT NULL,
  `cod_historiar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ex_fisico_s`
--

CREATE TABLE `ex_fisico_s` (
  `ex_fisico_s` int(11) NOT NULL,
  `cardiovascular` varchar(100) DEFAULT NULL,
  `respiratorio` varchar(100) DEFAULT NULL,
  `abdomen` varchar(100) DEFAULT NULL,
  `exremidades` varchar(100) DEFAULT NULL,
  `recomendaciones` varchar(100) DEFAULT NULL,
  `neurologicos` varchar(100) DEFAULT NULL,
  `resparaclinicos` varchar(100) DEFAULT NULL,
  `tratamientos` varchar(100) DEFAULT NULL,
  `paraclinicosind` varchar(100) DEFAULT NULL,
  `cod_historias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historias`
--

CREATE TABLE `historias` (
  `cod_historia` int(11) NOT NULL,
  `hea` varchar(100) DEFAULT NULL,
  `antecmadre` varchar(100) DEFAULT NULL,
  `antecpadre` varchar(100) DEFAULT NULL,
  `antechermano` varchar(100) DEFAULT NULL,
  `antecpersonal` varchar(100) DEFAULT NULL,
  `alergias` varchar(100) DEFAULT NULL,
  `quirurgico` varchar(100) DEFAULT NULL,
  `transsanguineo` varchar(100) DEFAULT NULL,
  `cedulapa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `cedula` varchar(10) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `fechanac` date DEFAULT NULL,
  `edad` int(11) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `ocupacion` varchar(30) DEFAULT NULL,
  `estadocivil` int(11) DEFAULT NULL,
  `habtoxico` varchar(30) DEFAULT NULL,
  `cedulape` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `cedulap` varchar(10) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `rol` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol` varchar(10) NOT NULL,
  `cargo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`cod_consulta`),
  ADD KEY `cedulac` (`cedulac`);

--
-- Indices de la tabla `emergencias`
--
ALTER TABLE `emergencias`
  ADD PRIMARY KEY (`cod_emergencia`),
  ADD KEY `cedulae` (`cedulae`);

--
-- Indices de la tabla `ex_fisico_r`
--
ALTER TABLE `ex_fisico_r`
  ADD PRIMARY KEY (`ex_fisico_r`),
  ADD KEY `cod_historiar` (`cod_historiar`);

--
-- Indices de la tabla `ex_fisico_s`
--
ALTER TABLE `ex_fisico_s`
  ADD PRIMARY KEY (`ex_fisico_s`),
  ADD KEY `cod_historias` (`cod_historias`);

--
-- Indices de la tabla `historias`
--
ALTER TABLE `historias`
  ADD PRIMARY KEY (`cod_historia`),
  ADD KEY `cedulapa` (`cedulapa`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `cedulape` (`cedulape`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`cedulap`),
  ADD KEY `rol` (`rol`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `cod_consulta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `emergencias`
--
ALTER TABLE `emergencias`
  MODIFY `cod_emergencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ex_fisico_r`
--
ALTER TABLE `ex_fisico_r`
  MODIFY `ex_fisico_r` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ex_fisico_s`
--
ALTER TABLE `ex_fisico_s`
  MODIFY `ex_fisico_s` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historias`
--
ALTER TABLE `historias`
  MODIFY `cod_historia` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`cedulac`) REFERENCES `pacientes` (`cedula`);

--
-- Filtros para la tabla `emergencias`
--
ALTER TABLE `emergencias`
  ADD CONSTRAINT `emergencias_ibfk_1` FOREIGN KEY (`cedulae`) REFERENCES `pacientes` (`cedula`);

--
-- Filtros para la tabla `ex_fisico_r`
--
ALTER TABLE `ex_fisico_r`
  ADD CONSTRAINT `ex_fisico_r_ibfk_1` FOREIGN KEY (`cod_historiar`) REFERENCES `historias` (`cod_historia`);

--
-- Filtros para la tabla `ex_fisico_s`
--
ALTER TABLE `ex_fisico_s`
  ADD CONSTRAINT `ex_fisico_s_ibfk_1` FOREIGN KEY (`cod_historias`) REFERENCES `historias` (`cod_historia`);

--
-- Filtros para la tabla `historias`
--
ALTER TABLE `historias`
  ADD CONSTRAINT `historias_ibfk_1` FOREIGN KEY (`cedulapa`) REFERENCES `pacientes` (`cedula`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`cedulape`) REFERENCES `personal` (`cedulap`);

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
