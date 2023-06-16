-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-06-2023 a las 04:24:42
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chuzo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `cate_id` int(11) NOT NULL,
  `cate_nombre` varchar(30) NOT NULL,
  `cate_descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`cate_id`, `cate_nombre`, `cate_descripcion`) VALUES
(1, 'Panaderia', 'Su elaboración se hace exclusivamente con harina , agua y sal marina sin aportar levaduras panarias, ni antimohos en el proceso de panificación.'),
(2, 'Verduraz', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '),
(3, 'Frutas', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '),
(4, 'Limpieza', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '),
(5, 'Herramienticas', 'lol'),
(8, 'Ropa', 'Seccion de ropa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_producto`
--

CREATE TABLE `ordenes_producto` (
  `ord_id` int(11) NOT NULL,
  `ord_pro_id` int(11) DEFAULT NULL,
  `ord_usu_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `ord_fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ordenes_producto`
--

INSERT INTO `ordenes_producto` (`ord_id`, `ord_pro_id`, `ord_usu_id`, `cantidad`, `ord_fecha`) VALUES
(1, 8, 2, 8, '2023-05-17'),
(2, 14, 1, 1, '2023-05-03'),
(3, 8, 2, 8, '2023-05-17'),
(4, 14, 1, 1, '2023-05-03'),
(5, 10, 10, 29, '2023-05-17'),
(6, 10, 10, 29, '2023-05-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `prod_id` int(11) NOT NULL,
  `prod_cate_id` int(11) DEFAULT NULL,
  `prod_nombre` varchar(30) NOT NULL,
  `prod_precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`prod_id`, `prod_cate_id`, `prod_nombre`, `prod_precio`) VALUES
(2, 3, 'Manzana', 2900),
(3, 1, 'Pan Ballena', 4000),
(5, 1, 'Pan Extra', 5000),
(6, 2, 'Cilantro', 200),
(7, 1, 'Rinde Pan', 1200),
(8, 2, 'Cebolla', 600),
(9, 1, 'Pan delfin', 2500),
(10, 2, 'Papa criolla', 1500),
(11, 3, 'Manzana', 3050),
(12, 4, 'Cloro', 1500),
(14, 4, 'FAB', 6000),
(16, 4, 'DERSA', 4000),
(18, 8, 'Camisa', 5000),
(19, 8, 'Sudadera', 9000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL,
  `usu_documento` varchar(12) NOT NULL,
  `usu_nombre` varchar(30) DEFAULT NULL,
  `usu_apellido` varchar(30) DEFAULT NULL,
  `usu_email` varchar(30) NOT NULL,
  `usu_contrasenia` varchar(8) NOT NULL,
  `usu_admin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_documento`, `usu_nombre`, `usu_apellido`, `usu_email`, `usu_contrasenia`, `usu_admin`) VALUES
(1, '1002652451', 'Rodrigo', 'Perez', 'roger@gmail.com', 'r12345', 1),
(2, '1002652452', 'Thomas', 'Giraldo', 'tgiraldo@gmail.com', 't12345', 1),
(3, '1002652453', 'Valeria', 'Garcia', 'valeria85@gmail.com', 'vg12345', 0),
(4, '1002652454', 'Ximena', 'Giraldo', 'xgiraldo22@gmail.com', 'x12345', 0),
(5, '1002652455', 'Sergio', 'Parra', 'aleparra23@gmail.com', 's12345', 0),
(6, '1002652456', 'Juan', 'Vera', 'jj2juan@gmail.com', 'jv12345', 0),
(7, '1002652457', 'Manuel', 'Felipe', 'pipiBueno44@gmail.com', 'pipe123', 0),
(8, '1002652458', 'Maria Alejandra', 'Gonzales', 'gonzales55@gmail.com', 'maria22', 0),
(9, '1002652459', 'Santiago', 'Quintero', 'SQ10@gmail.com', 'lol88', 0),
(10, '1002652460', 'Ricardo', 'Ospina', 'richi767@gmail.com', 'opsdr', 0),
(11, '20026352452', 'Sandra', 'Salazar', 'ssl123@gmail.com', 's1234', 0),
(12, '213213123', 'julian', 'GG', 'tontin@gmail.com', '123', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indices de la tabla `ordenes_producto`
--
ALTER TABLE `ordenes_producto`
  ADD PRIMARY KEY (`ord_id`),
  ADD KEY `ord_pro_id` (`ord_pro_id`),
  ADD KEY `ord_usu_id` (`ord_usu_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `prod_cate_id` (`prod_cate_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ordenes_producto`
--
ALTER TABLE `ordenes_producto`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ordenes_producto`
--
ALTER TABLE `ordenes_producto`
  ADD CONSTRAINT `ordenes_producto_ibfk_1` FOREIGN KEY (`ord_pro_id`) REFERENCES `productos` (`prod_id`),
  ADD CONSTRAINT `ordenes_producto_ibfk_2` FOREIGN KEY (`ord_usu_id`) REFERENCES `usuarios` (`usu_id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`prod_cate_id`) REFERENCES `categorias` (`cate_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
