-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2016 a las 02:12:18
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tallergimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avancepersonal`
--

CREATE TABLE `avancepersonal` (
  `IdAp` int(11) NOT NULL,
  `Peso` double(40,5) NOT NULL,
  `Altura` double(40,5) NOT NULL,
  `Fecha` date NOT NULL,
  `CiSo` int(11) NOT NULL,
  `IMC` double(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `avancepersonal`
--

INSERT INTO `avancepersonal` (`IdAp`, `Peso`, `Altura`, `Fecha`, `CiSo`, `IMC`) VALUES
(39, 60.00000, 160.00000, '2016-06-03', 2, 23),
(41, 44.00000, 160.00000, '2016-06-05', 2, 17),
(42, 51.00000, 155.00000, '2016-06-04', 2, 21),
(45, 85.00000, 180.00000, '2016-06-09', 32, 26),
(46, 70.00000, 180.00000, '2016-07-07', 32, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disciplinas`
--

CREATE TABLE `disciplinas` (
  `IdDisciplina` int(11) NOT NULL,
  `Disciplina` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `disciplinas`
--

INSERT INTO `disciplinas` (`IdDisciplina`, `Disciplina`) VALUES
(1, 'Cardio'),
(2, 'Musculacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disciplinasocio`
--

CREATE TABLE `disciplinasocio` (
  `IdDisciplinaSocio` int(11) NOT NULL,
  `IdDisciplina` int(11) NOT NULL,
  `CiSo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `disciplinasocio`
--

INSERT INTO `disciplinasocio` (`IdDisciplinaSocio`, `IdDisciplina`, `CiSo`) VALUES
(1, 1, 21),
(2, 1, 22),
(3, 2, 21),
(4, 2, 22),
(5, 1, 23),
(6, 2, 23),
(7, 1, 21),
(8, 1, 21),
(9, 1, 21),
(10, 1, 21),
(11, 1, 21),
(12, 1, 21),
(13, 1, 21),
(14, 1, 21),
(15, 1, 21),
(16, 1, 21),
(17, 1, 21),
(18, 1, 21),
(19, 1, 21),
(20, 1, 21),
(21, 1, 21),
(22, 1, 21),
(23, 1, 21),
(24, 1, 21),
(25, 1, 21),
(26, 1, 21),
(27, 1, 21),
(28, 1, 21),
(29, 1, 21),
(30, 1, 21),
(31, 1, 21),
(32, 1, 1),
(33, 2, 22),
(34, 2, 2),
(35, 1, 2),
(36, 1, 2),
(37, 1, 2),
(38, 2, 2),
(39, 1, 2),
(40, 2, 21),
(41, 1, 2),
(42, 1, 2),
(43, 1, 2),
(44, 1, 2),
(45, 1, 2),
(46, 1, 2),
(47, 1, 2),
(48, 1, 2),
(49, 1, 2),
(50, 1, 2),
(51, 1, 2),
(52, 1, 2),
(53, 1, 2),
(54, 1, 2),
(55, 1, 2),
(56, 1, 2),
(57, 1, 2),
(58, 1, 2),
(59, 1, 2),
(60, 1, 2),
(61, 1, 2),
(62, 1, 2),
(63, 1, 2),
(64, 1, 2),
(65, 1, 26),
(66, 1, 27),
(67, 1, 34),
(68, 2, 34),
(69, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `IdEjercicio` int(11) NOT NULL,
  `NombreEjercicio` varchar(30) NOT NULL,
  `PesoLevantado` double(40,5) NOT NULL,
  `NumeroSets` int(11) NOT NULL,
  `NumeroRepeticiones` int(11) NOT NULL,
  `CiSo` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ejercicios`
--

INSERT INTO `ejercicios` (`IdEjercicio`, `NombreEjercicio`, `PesoLevantado`, `NumeroSets`, `NumeroRepeticiones`, `CiSo`, `Fecha`) VALUES
(11, 'press', 50.00000, 3, 12, 2, '2016-06-08'),
(12, 'press', 100.00000, 12, 3, 32, '2016-06-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `IdHorario` int(11) NOT NULL,
  `Horario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`IdHorario`, `Horario`) VALUES
(1, '09:00 - 10:00'),
(2, '10:02 - 11:02'),
(3, '11:00 - 12:00'),
(4, '12:00 - 13:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horariosocio`
--

CREATE TABLE `horariosocio` (
  `IdHorarioSocio` int(11) NOT NULL,
  `CiSo` int(11) NOT NULL,
  `IdHorario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horariosocio`
--

INSERT INTO `horariosocio` (`IdHorarioSocio`, `CiSo`, `IdHorario`) VALUES
(1, 21, 1),
(2, 25, 3),
(3, 2, 1),
(4, 34, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensualidad`
--

CREATE TABLE `mensualidad` (
  `IdMensualidad` int(11) NOT NULL,
  `Mensualidad` double(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensualidad`
--

INSERT INTO `mensualidad` (`IdMensualidad`, `Mensualidad`) VALUES
(1, 140),
(2, 140),
(3, 200),
(4, 200),
(5, 140),
(6, 200),
(7, 200),
(8, 180),
(9, 180),
(10, 180),
(11, 140),
(12, 100),
(13, 262),
(14, 180);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensualidadsocio`
--

CREATE TABLE `mensualidadsocio` (
  `IdMensualidadSocio` int(11) NOT NULL,
  `IdMensualidad` int(11) NOT NULL,
  `CiSo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensualidadsocio`
--

INSERT INTO `mensualidadsocio` (`IdMensualidadSocio`, `IdMensualidad`, `CiSo`) VALUES
(1, 1, 21),
(2, 2, 25),
(3, 13, 22),
(5, 9, 2),
(11, 11, 26),
(14, 14, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `IdMenu` int(4) NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `Destino` varchar(50) NOT NULL,
  `Value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`IdMenu`, `Tipo`, `Destino`, `Value`) VALUES
(1, 'admin', 'menugestion.php', 'Gestion'),
(2, 'atleta', 'menuavance.php', 'Avance'),
(3, 'admin', 'menuasignacion.php', 'Asignacion'),
(4, 'atleta', 'menuguia.php', 'Guia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `IdOfertas` int(11) NOT NULL,
  `Oferta` double(20,2) NOT NULL,
  `NombreOferta` varchar(30) NOT NULL,
  `Duracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`IdOfertas`, `Oferta`, `NombreOferta`, `Duracion`) VALUES
(2, 30.00, 'Inauguracion', 1),
(8, 10.00, 'SanJuan', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertassocio`
--

CREATE TABLE `ofertassocio` (
  `IdOfertas` int(11) NOT NULL,
  `CiSo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `IdPago` int(11) NOT NULL,
  `Pago` double(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`IdPago`, `Pago`) VALUES
(1, 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE `socio` (
  `CiSo` int(11) NOT NULL,
  `Nick` varchar(30) NOT NULL,
  `Pass` varchar(30) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `ApellidoP` varchar(30) NOT NULL,
  `ApellidoM` varchar(30) NOT NULL,
  `Direccion` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Entrenador` varchar(10) NOT NULL,
  `Latencia` varchar(10) DEFAULT NULL,
  `Estado` varchar(10) NOT NULL,
  `Edad` varchar(10) NOT NULL,
  `Genero` varchar(20) NOT NULL,
  `Celular` varchar(30) DEFAULT NULL,
  `Tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`CiSo`, `Nick`, `Pass`, `Nombre`, `ApellidoP`, `ApellidoM`, `Direccion`, `Email`, `Entrenador`, `Latencia`, `Estado`, `Edad`, `Genero`, `Celular`, `Tipo`) VALUES
(1, 'kernel', 'root', 'Admin', 'Ap', 'Am', NULL, NULL, 'no', NULL, 'habilitado', '21', 'masculino', NULL, 'admin'),
(2, 'pepex', '111', 'Pepe', 'Perez', 'Sanchez', '', '', 'no', '', 'habilitado', '23', 'Masculino', '', 'atleta'),
(27, 'victorx', '123', 'Victor', 'Talavera', 'Guzman', 'Sopocachi', 'vicx@gmail.com', 'no', '3', 'habilitado', '43', 'Masculino', '6426486', 'atleta'),
(28, 'martinx', '321', 'Martin', 'Bazan', 'Heredia', 'Obrajes', 'martinx@gmail.com', 'si', '2', 'habilitado', '29', 'Masculino', '6231545', 'atleta'),
(29, 'mariax', '765', 'Maria', 'Soria', 'Calderon', 'San Antonio', 'mariax@gmail.com', 'si', '1', 'habilitado', '30', 'Femenino', '6598489', 'atleta'),
(31, 'verox', '432', 'Veronica', 'Caballo', 'Pintor', 'Miraflores', 'verox@gmail.com', 'si', '2', 'deshabilit', '25', 'Masculino', '769856423', 'atleta'),
(34, 'pruebax', '111', 'prueba', 'prue', 'ba', 'Sopocachi', 'prue@gmail.com', 'no', '2', 'habilitado', '26', 'Masculino', '6598658', 'atleta'),
(35, 'pruebajs', '159', 'prues', 'ba', 'va', 'Mariaca #1534', 'boom@gmail.com', 'si', '1', 'habilitado', '21', 'Masculino', '68975489', 'atleta');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `avancepersonal`
--
ALTER TABLE `avancepersonal`
  ADD PRIMARY KEY (`IdAp`);

--
-- Indices de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`IdDisciplina`);

--
-- Indices de la tabla `disciplinasocio`
--
ALTER TABLE `disciplinasocio`
  ADD PRIMARY KEY (`IdDisciplinaSocio`),
  ADD UNIQUE KEY `IdDisciplina` (`IdDisciplinaSocio`);

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`IdEjercicio`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`IdHorario`);

--
-- Indices de la tabla `horariosocio`
--
ALTER TABLE `horariosocio`
  ADD PRIMARY KEY (`IdHorarioSocio`),
  ADD KEY `IdHorario` (`IdHorario`);

--
-- Indices de la tabla `mensualidad`
--
ALTER TABLE `mensualidad`
  ADD PRIMARY KEY (`IdMensualidad`),
  ADD UNIQUE KEY `IdMensualidad` (`IdMensualidad`);

--
-- Indices de la tabla `mensualidadsocio`
--
ALTER TABLE `mensualidadsocio`
  ADD PRIMARY KEY (`IdMensualidadSocio`),
  ADD UNIQUE KEY `CiSo` (`CiSo`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`IdMenu`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`IdOfertas`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`IdPago`);

--
-- Indices de la tabla `socio`
--
ALTER TABLE `socio`
  ADD PRIMARY KEY (`CiSo`),
  ADD UNIQUE KEY `Nick` (`Nick`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avancepersonal`
--
ALTER TABLE `avancepersonal`
  MODIFY `IdAp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `IdDisciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `disciplinasocio`
--
ALTER TABLE `disciplinasocio`
  MODIFY `IdDisciplinaSocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  MODIFY `IdEjercicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `IdHorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `horariosocio`
--
ALTER TABLE `horariosocio`
  MODIFY `IdHorarioSocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `mensualidad`
--
ALTER TABLE `mensualidad`
  MODIFY `IdMensualidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `mensualidadsocio`
--
ALTER TABLE `mensualidadsocio`
  MODIFY `IdMensualidadSocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `IdMenu` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `IdOfertas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `IdPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `socio`
--
ALTER TABLE `socio`
  MODIFY `CiSo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `horariosocio`
--
ALTER TABLE `horariosocio`
  ADD CONSTRAINT `horariosocio_ibfk_1` FOREIGN KEY (`IdHorario`) REFERENCES `horarios` (`IdHorario`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
