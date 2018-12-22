-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-12-2018 a las 22:18:26
-- Versión del servidor: 5.7.24-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `spa`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `incertarPersonal` ()  SET @user_usuario = (select MAX(id_usuario) FROM usuarios)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `test` ()  INSERT INTO personal (nombre) VALUES ('test')$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `test2` ()  SET @user_usuario = (select MAX(id_usuario) FROM usuarios)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id_almacen` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `min_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id_almacen`, `id_producto`, `cantidad`, `min_stock`) VALUES
(1, 2, 95, 5);

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
(1, '2018-12-20 00:00:01', '2018-12-19 00:12:00', 00000000002, 2, 11, 5),
(2, '2018-12-20 00:51', '2018-12-20 01:06:00', 00000000002, 2, 11, 5),
(3, '2018-12-20 14:17', '2018-12-20 14:32:00', 00000000002, 2, 11, 5),
(4, '2018-12-22 08:00', '2018-12-22 08:15:00', 00000000002, 2, 11, 2);

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
  `foto` longtext NOT NULL,
  `tipo_cliente` varchar(45) NOT NULL DEFAULT 'regular',
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `a_paterno`, `a_materno`, `direccion`, `fraccionamiento`, `ciudad`, `municipio`, `estado`, `pais`, `tel_f`, `cel_1`, `cel_2`, `tel_o`, `email`, `facebook`, `instagram`, `foto`, `tipo_cliente`, `status`) VALUES
(00000000002, 'Karla2', 'gonzales', 'Saenz', 'luz 112', 'centro', 'ags', 'ags', 'ags', 'Mexico', '4491121345', '4491121345', '4491121345', '4491121345', 'karla@gmail.com', 'karla', 'karla', 'kuasfjkafgkuhcajkfhsah', 'regular', 1);

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
(2, '1', 'sala 1');

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
  `nombre` varchar(70) DEFAULT NULL,
  `a_paterno` varchar(70) DEFAULT NULL,
  `a_materno` varchar(70) DEFAULT NULL,
  `tel` varchar(17) DEFAULT NULL,
  `cel` varchar(17) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `direccion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `nombre`, `a_paterno`, `a_materno`, `tel`, `cel`, `email`, `direccion`) VALUES
(11, 'masajista', 'a_apellido', 'a_materno', '4492014065', '4492014065', 'masajista@masajista.com', 'lago azul # 170 trojes de alonso'),
(12, 'test', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'test', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'test', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `upc` varchar(100) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio` decimal(9,2) NOT NULL,
  `precio_publico` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_proveedor`, `upc`, `nombre`, `descripcion`, `precio`, `precio_publico`) VALUES
(2, 1, 'xxxxxxxxxxxx', 'ACEITE VIGORIZANTE HENNEN 100G', 'ACEITE VIGORIZANTE HENNEN 100G', '100.00', '150.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id_promocion` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `descuento` int(11) NOT NULL,
  `inicia` date NOT NULL,
  `termina` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prove`
--

CREATE TABLE `prove` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `rfc` varchar(15) NOT NULL,
  `domicilio` varchar(250) NOT NULL,
  `tel_1` varchar(10) NOT NULL,
  `tel_2` varchar(10) NOT NULL,
  `contacto` varchar(150) NOT NULL,
  `alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `termino` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prove`
--

INSERT INTO `prove` (`id_proveedor`, `nombre`, `rfc`, `domicilio`, `tel_1`, `tel_2`, `contacto`, `alta`, `termino`, `email`, `status`) VALUES
(1, 'aurrera', '12121212122', 'av constitucion', '1212121212', '1212121212', 'abel', '2018-12-07 18:17:40', '2018-12-07', 'almacen@almacen.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL,
  `id_zona` int(11) NOT NULL,
  `tratamiento` varchar(250) NOT NULL,
  `regular` decimal(7,2) NOT NULL,
  `preferente` decimal(7,2) DEFAULT NULL,
  `intermedia` decimal(7,2) DEFAULT NULL,
  `mas` decimal(7,2) DEFAULT NULL,
  `tiempo` int(11) NOT NULL,
  `notas` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `id_zona`, `tratamiento`, `regular`, `preferente`, `intermedia`, `mas`, `tiempo`, `notas`) VALUES
(1, 1, 'abdomen', '990.00', '880.00', '780.00', '680.00', 15, '');

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
(2, 2, 1),
(3, 3, 1),
(4, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `descripcion` longtext NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `monto` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`id_ticket`, `id_cliente`, `descripcion`, `fecha`, `monto`) VALUES
(1, 2, '<tr onclick=\"remover_fila(this)\" id=\"fila_masajes_l1\" class=\"fila\">\n        <th class=\"text-center\" scope=\"row\"><span class=\"text-danger\"> <i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></th>\n        <td>Cita con fecha del 20/12/2018</td>\n        <td class=\"text-center\">1</td>\n        <td class=\"text-right costo\">$990.00</td>\n        <input type=\"hidden\" value=\"1\">\n      </tr><tr onclick=\"remover_fila(this)\" id=\"fila_2\" class=\"fila\"><th class=\"text-center\" scope=\"row\"><span class=\"text-danger\"> <i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></th><td class=\"upc\">xxxxxxxxxxxx ACEITE VIGORIZANTE HENNEN 100G ACEITE VIGORIZANTE HENNEN 100G</td><td class=\"text-center\">1</td><td class=\"text-right costo\">$150.00</td></tr><tr onclick=\"remover_fila(this)\" id=\"fila_3\" class=\"fila\"><th class=\"text-center\" scope=\"row\"><span class=\"text-danger\"> <i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></th><td>\n      \n              DEPILACIONES\n           abdomen</td><td class=\"text-center\">1</td><td class=\"text-right costo\">$990.00</td></tr>', '2018-12-20 00:34:15', '2130.00'),
(2, 2, '<tr onclick=\"remover_fila(this)\" id=\"fila_1\" class=\"fila\"><th class=\"text-center\" scope=\"row\"><span class=\"text-danger\"> <i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></th><td class=\"upc\">xxxxxxxxxxxx ACEITE VIGORIZANTE HENNEN 100G ACEITE VIGORIZANTE HENNEN 100G</td><td class=\"text-center\">1</td><td class=\"text-right costo\">$150.00</td></tr>', '2018-12-20 00:39:20', '150.00'),
(3, 2, '<tr onclick=\"remover_fila(this)\" id=\"fila_1\" class=\"fila\"><th class=\"text-center\" scope=\"row\"><span class=\"text-danger\"> <i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></th><td class=\"upc\">xxxxxxxxxxxx ACEITE VIGORIZANTE HENNEN 100G ACEITE VIGORIZANTE HENNEN 100G</td><td class=\"text-center\">1</td><td class=\"text-right costo\">$150.00</td></tr>', '2018-12-20 00:50:33', '150.00'),
(4, 2, '<tr onclick=\"remover_fila(this)\" id=\"fila_masajes_l1\" class=\"fila\">\n        <th class=\"text-center\" scope=\"row\"><span class=\"text-danger\"> <i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></th>\n        <td>Cita con fecha del 20/12/2018</td>\n        <td class=\"text-center\">1</td>\n        <td class=\"text-right costo\">$990.00</td>\n        <input type=\"hidden\" value=\"2\">\n      </tr>', '2018-12-20 00:52:38', '990.00'),
(5, 2, '<tr onclick=\"remover_fila(this)\" id=\"fila_1\" class=\"fila\"><th class=\"text-center\" scope=\"row\"><span class=\"text-danger\"> <i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></th><td class=\"upc\">xxxxxxxxxxxx ACEITE VIGORIZANTE HENNEN 100G ACEITE VIGORIZANTE HENNEN 100G</td><td class=\"text-center\">1</td><td class=\"text-right costo\">$150.00</td></tr>', '2018-12-20 14:04:39', '150.00'),
(6, 2, '<tr onclick=\"remover_fila(this)\" id=\"fila_1\" class=\"fila\"><th class=\"text-center\" scope=\"row\"><span class=\"text-danger\"> <i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></th><td class=\"upc\">xxxxxxxxxxxx ACEITE VIGORIZANTE HENNEN 100G ACEITE VIGORIZANTE HENNEN 100G</td><td class=\"text-center\">1</td><td class=\"text-right costo\">$150.00</td></tr>', '2018-12-20 14:12:24', '150.00'),
(7, 2, '<tr onclick=\"remover_fila(this)\" id=\"fila_masajes_l1\" class=\"fila\">\n        <th class=\"text-center\" scope=\"row\"><span class=\"text-danger\"> <i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></th>\n        <td>Cita con fecha del 20/12/2018</td>\n        <td class=\"text-center\">1</td>\n        <td class=\"text-right costo\">$990.00</td>\n        <input type=\"hidden\" value=\"3\">\n      </tr>', '2018-12-20 14:19:59', '990.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nikname` varchar(50) NOT NULL,
  `password` varchar(350) NOT NULL,
  `rol` varchar(8) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `token` varchar(355) DEFAULT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nikname`, `password`, `rol`, `nombre`, `token`, `email`) VALUES
(1, 'alexromo', 'd173050ba79769c2ef9eabf5a921b34705b2a4ce', '10', 'Alejandro Romo', '', 'famromoruiz@gmail.com'),
(9, 'sesparza', '6e1b1de051125f374a00a37d38f9f1eaf408a358', '10', 'sergio', NULL, 'sesparza@gmail.com'),
(10, 'jimena', 'bb3cc0120e44d67abb62b819ffb8e95da3224617', '20', 'jimena', NULL, 'famromoruiz@gmail.com'),
(11, 'alex', '5df864a4de5b1ed47af2d7631c636f1ca52b7a6b', '30', 'alex', NULL, 'famromoruiz@gmail.com'),
(12, 'test', '5aa19be0a43cbcb8ca8261c3d5f631fe28bb1c87', '30', 'test', NULL, 'famromoruiz@gmail.com'),
(13, 'alx_2', '11a14ac19dc509e5ebd6a0832af31f3f40e171e2', '20', 'test', NULL, 'famromoruiz@gmail.com'),
(14, 'alexromo', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '10', 'alexito', NULL, 'famromoruiz@gmail.com'),
(15, 'alx_2', '598686fecb5ab9e68247d78df7ad6471d0691d4e', '10', 'test', NULL, 'famromoruiz@gmail.com');

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `insertar_personal` BEFORE INSERT ON `usuarios` FOR EACH ROW CALL test()
$$
DELIMITER ;

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
(1, 'DEPILACIONES', 'test');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id_almacen`),
  ADD UNIQUE KEY `id_producto` (`id_producto`);

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
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id_promocion`);

--
-- Indices de la tabla `prove`
--
ALTER TABLE `prove`
  ADD PRIMARY KEY (`id_proveedor`);

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
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`);

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
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id_almacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id_habitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `persinal`
--
ALTER TABLE `persinal`
  MODIFY `id_masajista` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id_promocion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prove`
--
ALTER TABLE `prove`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicios_cita`
--
ALTER TABLE `servicios_cita`
  MODIFY `id_servicio_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id_zona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `activar_promo` ON SCHEDULE EVERY '0 1' DAY_HOUR STARTS '2018-12-19 00:00:00' ON COMPLETION PRESERVE ENABLE COMMENT 'test' DO UPDATE promociones pr SET pr.status = 0 WHERE pr.inicia = CURDATE()$$

CREATE DEFINER=`root`@`localhost` EVENT `desactivar_promo` ON SCHEDULE EVERY '0 1' DAY_HOUR STARTS '2018-12-19 00:00:00' ON COMPLETION PRESERVE ENABLE COMMENT 'desactiva promo' DO UPDATE promociones pr SET pr.status = 1 WHERE pr.termina < CURDATE()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
