-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2020 a las 22:52:46
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdbiokey`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletas`
--

CREATE TABLE `boletas` (
  `ID_BOL` bigint(20) NOT NULL,
  `ID_METPAG` int(11) DEFAULT NULL,
  `RUT_CLI` varchar(12) DEFAULT NULL,
  `TOT_BOL` bigint(20) NOT NULL,
  `FECH_BOL` char(10) NOT NULL,
  `EST_LOG_BOL` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cerraduras`
--

CREATE TABLE `cerraduras` (
  `COD_CERR` bigint(20) NOT NULL,
  `ID_USU` bigint(20) DEFAULT NULL,
  `SERIAL_CERR` char(19) NOT NULL,
  `PASS_CERR` varchar(10) NOT NULL,
  `DATE_CERR` char(16) NOT NULL,
  `EST_CERR` decimal(1,0) DEFAULT NULL,
  `SSID_RED` varchar(30) NOT NULL,
  `PASS_RED` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `ID_CIU` int(11) NOT NULL,
  `NOM_CIU` varchar(40) NOT NULL,
  `EST_LOG_CIU` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `RUT_CLI` varchar(12) NOT NULL,
  `NOM_CLI` varchar(25) NOT NULL,
  `APE_CLI` varchar(25) NOT NULL,
  `CORR_CLI` varchar(40) NOT NULL,
  `EST_LOG_CLI` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `ID_DIR` bigint(20) NOT NULL,
  `ID_BOL` bigint(20) DEFAULT NULL,
  `ID_REGION` int(11) DEFAULT NULL,
  `ID_CIU` int(11) DEFAULT NULL,
  `COMUNA_DIR` varchar(40) DEFAULT NULL,
  `CALL1_DIR` varchar(40) NOT NULL,
  `CALL2_DIR` varchar(40) DEFAULT NULL,
  `NUM_DIR` int(11) NOT NULL,
  `VILLA_DIR` varchar(40) DEFAULT NULL,
  `BLOCK_DIR` int(11) DEFAULT NULL,
  `EST_LOG_DIR` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `ID_METPAG` int(11) NOT NULL,
  `NOM_METPAG` varchar(35) NOT NULL,
  `EST_LOG_METPAG` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `ID_REGION` int(11) NOT NULL,
  `NOM_REGION` varchar(60) NOT NULL,
  `EST_LOG_REG` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_cerr`
--

CREATE TABLE `registros_cerr` (
  `ID_REGIS` bigint(20) NOT NULL,
  `COD_CERR` bigint(20) DEFAULT NULL,
  `ID_TIPREGIS` int(11) DEFAULT NULL,
  `DESC_REGIS` varchar(500) NOT NULL,
  `FECH_REGIS` char(10) NOT NULL,
  `EST_LOG_REGIS` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_solicitudes`
--

CREATE TABLE `registro_solicitudes` (
  `ID_SOLI` bigint(20) NOT NULL,
  `ID_TIPSOLI` int(11) DEFAULT NULL,
  `ID_USU` bigint(20) DEFAULT NULL,
  `DESC_SOLI` varchar(500) DEFAULT NULL,
  `FECH_SOLI` char(10) DEFAULT NULL,
  `EST_LOG_SOLI` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_registro`
--

CREATE TABLE `tipo_registro` (
  `ID_TIPREGIS` int(11) NOT NULL,
  `NOM_TIPREGIS` varchar(20) NOT NULL,
  `EST_LOG_TIPREGIS` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_solicitud`
--

CREATE TABLE `tipo_solicitud` (
  `ID_TIPSOLI` int(11) NOT NULL,
  `NOM_TIPSOLI` varchar(45) NOT NULL,
  `EST_LOG_TIPSOLI` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USU` bigint(20) NOT NULL,
  `CORREO_USU` varchar(50) NOT NULL,
  `ALIAS_USU` varchar(40) NOT NULL,
  `PASS_USU` varchar(255) NOT NULL,
  `NOM_USU` varchar(40) NOT NULL,
  `APE_USU` varchar(40) NOT NULL,
  `TEL_USU` varchar(12) NOT NULL,
  `FECHA_USU` char(10) DEFAULT NULL,
  `EST_USU` decimal(1,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_USU`, `CORREO_USU`, `ALIAS_USU`, `PASS_USU`, `NOM_USU`, `APE_USU`, `TEL_USU`, `FECHA_USU`, `EST_USU`) VALUES
(1, 'bastian@test.cl', 'WataK', '123456', 'Bastian', 'Andrades', '975651942', '27-09-2020', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ID_VENT` bigint(20) NOT NULL,
  `COD_CERR` bigint(20) DEFAULT NULL,
  `ID_BOL` bigint(20) DEFAULT NULL,
  `SUBTOT_VENT` bigint(20) NOT NULL,
  `EST_LOG_VENT` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boletas`
--
ALTER TABLE `boletas`
  ADD PRIMARY KEY (`ID_BOL`),
  ADD KEY `FK_CLIEN_BOL` (`RUT_CLI`),
  ADD KEY `FK_PAG_BOL` (`ID_METPAG`);

--
-- Indices de la tabla `cerraduras`
--
ALTER TABLE `cerraduras`
  ADD PRIMARY KEY (`COD_CERR`),
  ADD KEY `FK_USU_CERR` (`ID_USU`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`ID_CIU`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`RUT_CLI`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`ID_DIR`),
  ADD KEY `FK_BOL_DIR` (`ID_BOL`),
  ADD KEY `FK_DIREC_CIU` (`ID_CIU`),
  ADD KEY `FK_DIREC_REG` (`ID_REGION`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`ID_METPAG`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`ID_REGION`);

--
-- Indices de la tabla `registros_cerr`
--
ALTER TABLE `registros_cerr`
  ADD PRIMARY KEY (`ID_REGIS`),
  ADD KEY `FK_CERR_REG` (`COD_CERR`),
  ADD KEY `FK_REG_TIP` (`ID_TIPREGIS`);

--
-- Indices de la tabla `registro_solicitudes`
--
ALTER TABLE `registro_solicitudes`
  ADD PRIMARY KEY (`ID_SOLI`),
  ADD KEY `FK_RELATIONSHIP_2` (`ID_USU`),
  ADD KEY `FK_SOLI_TIP` (`ID_TIPSOLI`);

--
-- Indices de la tabla `tipo_registro`
--
ALTER TABLE `tipo_registro`
  ADD PRIMARY KEY (`ID_TIPREGIS`);

--
-- Indices de la tabla `tipo_solicitud`
--
ALTER TABLE `tipo_solicitud`
  ADD PRIMARY KEY (`ID_TIPSOLI`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_USU`),
  ADD UNIQUE KEY `ALIAS_USU` (`ALIAS_USU`),
  ADD UNIQUE KEY `CORREO_USU` (`CORREO_USU`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ID_VENT`),
  ADD KEY `FK_VENT_BOL` (`ID_BOL`),
  ADD KEY `FK_VENT_CERR` (`COD_CERR`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boletas`
--
ALTER TABLE `boletas`
  MODIFY `ID_BOL` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `ID_CIU` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `ID_DIR` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `ID_METPAG` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `region`
--
ALTER TABLE `region`
  MODIFY `ID_REGION` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registros_cerr`
--
ALTER TABLE `registros_cerr`
  MODIFY `ID_REGIS` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_solicitudes`
--
ALTER TABLE `registro_solicitudes`
  MODIFY `ID_SOLI` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_registro`
--
ALTER TABLE `tipo_registro`
  MODIFY `ID_TIPREGIS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_solicitud`
--
ALTER TABLE `tipo_solicitud`
  MODIFY `ID_TIPSOLI` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USU` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ID_VENT` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boletas`
--
ALTER TABLE `boletas`
  ADD CONSTRAINT `FK_CLIEN_BOL` FOREIGN KEY (`RUT_CLI`) REFERENCES `clientes` (`RUT_CLI`),
  ADD CONSTRAINT `FK_PAG_BOL` FOREIGN KEY (`ID_METPAG`) REFERENCES `metodo_pago` (`ID_METPAG`);

--
-- Filtros para la tabla `cerraduras`
--
ALTER TABLE `cerraduras`
  ADD CONSTRAINT `FK_USU_CERR` FOREIGN KEY (`ID_USU`) REFERENCES `usuarios` (`ID_USU`);

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `FK_BOL_DIR` FOREIGN KEY (`ID_BOL`) REFERENCES `boletas` (`ID_BOL`),
  ADD CONSTRAINT `FK_DIREC_CIU` FOREIGN KEY (`ID_CIU`) REFERENCES `ciudad` (`ID_CIU`),
  ADD CONSTRAINT `FK_DIREC_REG` FOREIGN KEY (`ID_REGION`) REFERENCES `region` (`ID_REGION`);

--
-- Filtros para la tabla `registros_cerr`
--
ALTER TABLE `registros_cerr`
  ADD CONSTRAINT `FK_CERR_REG` FOREIGN KEY (`COD_CERR`) REFERENCES `cerraduras` (`COD_CERR`),
  ADD CONSTRAINT `FK_REG_TIP` FOREIGN KEY (`ID_TIPREGIS`) REFERENCES `tipo_registro` (`ID_TIPREGIS`);

--
-- Filtros para la tabla `registro_solicitudes`
--
ALTER TABLE `registro_solicitudes`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_USU`) REFERENCES `usuarios` (`ID_USU`),
  ADD CONSTRAINT `FK_SOLI_TIP` FOREIGN KEY (`ID_TIPSOLI`) REFERENCES `tipo_solicitud` (`ID_TIPSOLI`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `FK_VENT_BOL` FOREIGN KEY (`ID_BOL`) REFERENCES `boletas` (`ID_BOL`),
  ADD CONSTRAINT `FK_VENT_CERR` FOREIGN KEY (`COD_CERR`) REFERENCES `cerraduras` (`COD_CERR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
