-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-11-2018 a las 12:23:55
-- Versión del servidor: 5.7.24-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `spa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `inicio` varchar(50) NOT NULL,
  `fin` varchar(50) NOT NULL,
  `id_cliente` int(11) UNSIGNED ZEROFILL NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `id_masajista` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `inicio`, `fin`, `id_cliente`, `id_habitacion`, `id_masajista`, `status`) VALUES
(1, '2018-11-24 13:07', '2018-11-24 13:07', 00000000001, 1, 1, 4),
(2, '2018-11-24 15:01', '2018-11-24 15:01', 00000000002, 1, 1, 4),
(3, '2018-11-24 18:59', '2018-11-24 18:59', 00000000001, 1, 1, 4),
(4, '2018-11-26 13:59', '2018-11-26 13:59', 00000000003, 1, 1, 1),
(5, '2018-11-25 21:36', '2018-11-25 21:36', 00000000002, 1, 1, 1),
(6, '2018-11-25 12:17', '2018-11-25 12:17', 00000000001, 1, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) UNSIGNED ZEROFILL NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `a_paterno` varchar(60) NOT NULL,
  `a_materno` varchar(80) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `fraccionamiento` varchar(200) NOT NULL,
  `ciudad` varchar(200) NOT NULL,
  `municipio` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `pais` varchar(200) NOT NULL,
  `tel_f` varchar(20) NOT NULL,
  `cel_1` varchar(20) NOT NULL,
  `cel_2` varchar(20) NOT NULL,
  `tel_o` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `instagram` varchar(200) NOT NULL,
  `foto` bigint(20) NOT NULL,
  `tipo_cliente` varchar(45) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `a_paterno`, `a_materno`, `direccion`, `fraccionamiento`, `ciudad`, `municipio`, `estado`, `pais`, `tel_f`, `cel_1`, `cel_2`, `tel_o`, `email`, `facebook`, `instagram`, `foto`, `tipo_cliente`, `status`) VALUES
(00000000001, 'alejandro', 'romo', 'ortiz', 'lago aul 101', 'trojes del cobano', 'aguascalientes', 'Aguascalientes', 'Aguascalientes', 'Mexico', '2422985', '4492014093', '4492014093', '4492014093', 'alejandro@alejandro.com', 'alejandro', 'alejandro', 9223372036854775807, 'regular', 1),
(00000000002, 'VIRGINIA', 'GONZALEZ', 'ESTRADA', 'SINAI 122', 'CENTRO', 'AGS', 'AGS', 'AGS', 'MX', '4493314534323', '54543533', '5532432442', '234345325', 'vgon@gmail.com', 'facebook/virginia', 'instagram/virginia_gonzalez', 12132, 'intermedia', 1),
(00000000003, 'ESTHELA', 'MENDOZA', 'GARCIA', 'LIMA 122', 'AMERICAS', 'AGS', 'AGS', 'AGS', 'MX', '434523432', '53456435345', '5435634', '5643654', 'ESTH@GMAIL.COM', 'FACEBOOK.COM/ESTHELA', 'INSTAGR/ESTHELA', 5435435, 'mas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id_habitacion` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id_habitacion`, `nombre`, `descripcion`) VALUES
(1, 'sala a', 'depilaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persinal`
--

CREATE TABLE `persinal` (
  `id_masajista` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `a_paterno` varchar(50) NOT NULL,
  `a_materno` varchar(50) NOT NULL,
  `tel` varchar(17) NOT NULL,
  `cel` varchar(17) NOT NULL,
  `email` int(150) NOT NULL,
  `dirrecion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `a_paterno` varchar(70) NOT NULL,
  `a_materno` varchar(70) NOT NULL,
  `tel` varchar(17) NOT NULL,
  `cel` varchar(17) NOT NULL,
  `email` varchar(250) NOT NULL,
  `direccion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `nombre`, `a_paterno`, `a_materno`, `tel`, `cel`, `email`, `direccion`) VALUES
(1, 'masajista', 'a_apellido', 'a_materno', '4492014065', '4492014065', 'masajista@masajista.com', 'lago azul # 170 trojes de alonso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `upc` varchar(100) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio` decimal(9,2) NOT NULL,
  `precio_publico` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `upc`, `nombre`, `descripcion`, `precio`, `precio_publico`) VALUES
(1, 'xxxxxxxxxx', 'Shampho', 'Shampho', '100.00', '150.50'),
(2, '501058617866', 'DEPILACIONES', 'CREMA HUMECTANTE SEBASTIAN 100G', '100.00', '122.00'),
(3, '432452523', 'CORPORAL', 'ACEITE VIGORIZANTE HENNEN 100G', '170.00', '210.00'),
(4, '754654645645', 'DEPILACIONES', 'MAQUILLAJE LIQUIDO SEBASTIAN 0711 100G', '80.00', '140.00'),
(5, '4354354543', 'SPA', 'ACEITE DEPILATORIO KARMIN 100G', '120.00', '180.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL,
  `id_zona` int(11) NOT NULL,
  `tratamiento` varchar(250) NOT NULL,
  `regular` decimal(7,2) NOT NULL,
  `preferente` decimal(7,2) NOT NULL,
  `intermedia` decimal(7,2) NOT NULL,
  `mas` decimal(7,2) NOT NULL,
  `tiempo` int(11) NOT NULL,
  `notas` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `id_zona`, `tratamiento`, `regular`, `preferente`, `intermedia`, `mas`, `tiempo`, `notas`) VALUES
(1, 1, 'abdomen', '990.00', '880.00', '780.00', '680.00', 15, ''),
(2, 1, 'axila', '360.00', '329.00', '280.00', '249.00', 15, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_cita`
--

CREATE TABLE `servicios_cita` (
  `id_servicio_cita` int(11) NOT NULL,
  `id_cita` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios_cita`
--

INSERT INTO `servicios_cita` (`id_servicio_cita`, `id_cita`, `id_servicio`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 3, 1),
(6, 4, 2),
(7, 5, 1),
(8, 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nikname` varchar(50) NOT NULL,
  `password` varchar(350) NOT NULL,
  `rol` varchar(8) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nikname`, `password`, `rol`, `nombre`) VALUES
(1, 'alexromo', 'd173050ba79769c2ef9eabf5a921b34705b2a4ce', '10', 'Alejandro Romo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id_zona` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id_zona`, `nombre`, `descripcion`) VALUES
(1, 'depilaciones', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`id_habitacion`);

--
-- Indices de la tabla `persinal`
--
ALTER TABLE `persinal`
  ADD PRIMARY KEY (`id_masajista`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `servicios_cita`
--
ALTER TABLE `servicios_cita`
  ADD PRIMARY KEY (`id_servicio_cita`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id_zona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id_habitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `persinal`
--
ALTER TABLE `persinal`
  MODIFY `id_masajista` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `servicios_cita`
--
ALTER TABLE `servicios_cita`
  MODIFY `id_servicio_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id_zona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
