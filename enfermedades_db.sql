-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2025 a las 01:46:10
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
-- Base de datos: `emfermedades_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atencion`
--

CREATE TABLE `atencion` (
  `idatencion` int(11) NOT NULL,
  `idpaciente` int(11) NOT NULL,
  `fechahora` datetime NOT NULL,
  `resultado` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atencion_sintoma`
--

CREATE TABLE `atencion_sintoma` (
  `idatencionsintoma` int(11) NOT NULL,
  `idatencion` int(11) NOT NULL,
  `idsintoma` int(11) NOT NULL,
  `respuesta` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `idmedico` int(11) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `colegiado` varchar(20) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`idmedico`, `apellidos`, `nombres`, `colegiado`, `idusuario`) VALUES
(1, 'Bravo Veintemilla', 'Jorge Alberto', '123456', 1),
(2, 'Peña Chirinos', 'Carlos Joel', '12345', 2),
(3, 'Fernandez Huaman', 'Andre Rafael', '54321', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `idpaciente` int(11) NOT NULL,
  `idmedico` int(11) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `dni` char(8) NOT NULL,
  `fechahora` datetime NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idpaciente`, `idmedico`, `apellidos`, `nombres`, `dni`, `fechahora`, `idusuario`) VALUES
(1, 1, 'diaz', 'carlos', '12345678', '2021-07-18 00:25:10', 2),
(3, 1, 'Bravo Veintemilla', 'Jorge Alberto', '71123093', '2025-06-13 02:51:45', 6),
(5, 1, 'BRAVO', 'ALBERTO', '71123093', '2025-06-13 02:56:30', 8),
(7, 1, 'peña', 'carlos', '12345678', '2025-06-13 17:26:37', 11),
(8, 1, 'moises', 'jose', '12345678', '2025-06-13 17:27:50', 12),
(9, 1, 'torres', 'henry', '12345678', '2025-06-13 17:30:42', 13),
(14, 1, 'herrera', 'hans', '12345678', '2025-06-13 17:36:31', 18),
(15, 1, 'herrera', 'hans', '12345678', '2025-06-13 17:38:03', 19),
(16, 1, 'herrera', 'hans', '12345678', '2025-06-13 17:38:15', 20),
(17, 1, 'caballero', 'diego', '12345678', '2025-06-13 17:38:39', 21),
(18, 1, 'caballero', 'diego', '12345678', '2025-06-13 17:40:20', 22),
(20, 1, 'diego', 'juand', '12345678', '2025-06-13 17:40:46', 24),
(22, 1, 'bravo', 'jose', '12345678', '2025-06-13 17:45:53', 26),
(23, 1, 'calderon', 'jorge', '12345678', '2025-06-13 17:46:34', 27),
(24, 1, 'fernandez', 'luis', '12345678', '2025-06-13 17:46:46', 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sintoma`
--

CREATE TABLE `sintoma` (
  `idsintoma` int(11) NOT NULL,
  `sintoma` varchar(200) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `sintoma`
--

INSERT INTO `sintoma` (`idsintoma`, `sintoma`, `estado`) VALUES
(1, 'Debilidad en un lado del cuerpo', 'a'),
(2, 'Adormecimiento', 'a'),
(3, 'Dificultad al hablar', 'a'),
(4, 'Dificultad para comprender', 'a'),
(5, 'Disminución de la sensibilidad de un lado del cuerpo', 'a'),
(6, 'Visión doble', 'a'),
(7, 'Visión borrosa', 'a'),
(8, 'Inestabilidad para caminar', 'a'),
(9, 'Somnolencia', 'a'),
(10, 'Dolor de cabeza', 'a'),
(11, 'Trastorno de la conciencia', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `rol` char(1) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `clave`, `rol`, `estado`) VALUES
(1, 'jbravo', '$2y$10$7452m7BcyCegJngDKb.cZuHL5.tpKxqu2DVGWU7MOob7SDXTfTjpK', 'm', 'a'),
(2, 'cpena', '$2y$10$uWhjWKr2yH.U45GDkVqXjeYkCXzPZvQ5nfH0nkRK2vd5nS.zKCOja', 'm', 'a'),
(3, 'afernandez', '$2y$10$UWPj3sbk3waDW1zbbxqfQe0.B7fMIeyM/ctwcMCVv964isAE0rn4K', 'm', 'a');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atencion`
--
ALTER TABLE `atencion`
  ADD PRIMARY KEY (`idatencion`);

--
-- Indices de la tabla `atencion_sintoma`
--
ALTER TABLE `atencion_sintoma`
  ADD PRIMARY KEY (`idatencionsintoma`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`idmedico`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idpaciente`);

--
-- Indices de la tabla `sintoma`
--
ALTER TABLE `sintoma`
  ADD PRIMARY KEY (`idsintoma`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atencion`
--
ALTER TABLE `atencion`
  MODIFY `idatencion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `atencion_sintoma`
--
ALTER TABLE `atencion_sintoma`
  MODIFY `idatencionsintoma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `idmedico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `sintoma`
--
ALTER TABLE `sintoma`
  MODIFY `idsintoma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
