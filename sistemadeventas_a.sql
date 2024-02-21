-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-12-2023 a las 00:38:05
-- Versión del servidor: 8.0.35
-- Versión de PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemadeventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_almacen`
--

DROP TABLE IF EXISTS `tb_almacen`;
CREATE TABLE IF NOT EXISTS `tb_almacen` (
  `id_producto` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci,
  `stock` int NOT NULL,
  `stock_minimo` int DEFAULT NULL,
  `stock_maximo` int DEFAULT NULL,
  `precio_compra` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `precio_venta` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `imagen` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci,
  `id_usuario` int NOT NULL,
  `id_categoria` int NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `tb_almacen`
--

INSERT INTO `tb_almacen` (`id_producto`, `codigo`, `nombre`, `descripcion`, `stock`, `stock_minimo`, `stock_maximo`, `precio_compra`, `precio_venta`, `fecha_ingreso`, `imagen`, `id_usuario`, `id_categoria`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'P-00001', 'COCA QUINA', 'de 2 litros', 175, 20, 500, '9.00', '12.00', '2023-02-12', '2023-02-12-06-26-25__6020052-1000x1000.jpg', 1, 1, '2023-02-12 18:26:25', '2023-12-17 01:12:16'),
(3, 'P-00003', 'VINO TINTO', 'VINO TINTO BLANCO DE 300 ml', 537, 10, 200, '50.00', '85.50', '2023-02-13', '2023-02-13-02-35-15__vino.JPG', 1, 1, '2023-02-13 14:35:15', '2023-12-17 01:12:06'),
(5, 'P-00004', 'laptop 2', 'es nuevo y viejo', 213, 15, 500, '2500.00', '3250.00', '2023-12-16', '2023-12-16-07-08-31__2023-12-16-07-37-27__logo-no-background.png', 1, 1, '2023-12-16 07:08:31', '2023-12-17 02:09:18'),
(6, 'P-00004', 'laptop 3', 'Es viejo y nuevo', 28, 10, 250, '3000.00', '3500.00', '2023-12-17', '2023-12-17-01-11-28__2023-12-16-07-40-12__2023-12-16-07-27-54__logo-black.png', 1, 1, '2023-12-17 01:11:28', '2023-12-17 02:09:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_carrito`
--

DROP TABLE IF EXISTS `tb_carrito`;
CREATE TABLE IF NOT EXISTS `tb_carrito` (
  `id_carrito` int NOT NULL AUTO_INCREMENT,
  `nro_venta` int NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad` int NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id_carrito`),
  KEY `id_venta` (`nro_venta`,`id_producto`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `tb_carrito`
--

INSERT INTO `tb_carrito` (`id_carrito`, `nro_venta`, `id_producto`, `cantidad`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(2, 1, 5, 3, '2023-12-17 12:33:31', '2023-12-17 12:33:31'),
(7, 1, 6, 10, '2023-12-18 10:53:55', '2023-12-18 10:53:55'),
(8, 2, 6, 2, '2023-12-18 04:56:43', '2023-12-18 04:56:43'),
(9, 2, 5, 1, '2023-12-18 04:56:48', '2023-12-18 04:56:48'),
(12, 4, 3, 4, '2023-12-18 07:13:13', '2023-12-18 07:13:13'),
(13, 5, 3, 5, '2023-12-18 07:15:49', '2023-12-18 07:15:49'),
(14, 6, 3, 4, '2023-12-18 07:19:14', '2023-12-18 07:19:14'),
(15, 7, 3, 2, '2023-12-18 07:24:37', '2023-12-18 07:24:37'),
(16, 8, 3, 1, '2023-12-18 07:32:28', '2023-12-18 07:32:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categorias`
--

DROP TABLE IF EXISTS `tb_categorias`;
CREATE TABLE IF NOT EXISTS `tb_categorias` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `tb_categorias`
--

INSERT INTO `tb_categorias` (`id_categoria`, `nombre_categoria`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'LIQUIDOS', '2023-01-24 22:25:10', '2023-01-24 22:25:10'),
(2, 'FRUTAS', '2023-01-25 14:39:50', '2023-01-25 15:09:07'),
(3, 'COMIDAS', '2023-01-25 14:40:27', '0000-00-00 00:00:00'),
(4, 'ELECTRODOMESTICOS', '2023-01-25 14:41:14', '0000-00-00 00:00:00'),
(5, 'VERDURAS', '2023-01-25 14:43:06', '0000-00-00 00:00:00'),
(6, 'MEDICAMENTOS Y COMIDAS', '2023-01-25 14:44:51', '2023-01-25 15:09:22'),
(8, 'algo2', '2023-01-25 17:49:21', '2023-01-25 17:54:25'),
(9, 'algo3', '2023-01-25 17:54:06', '2023-01-25 17:57:31'),
(11, 'ELECTRONICOS', '2023-01-29 23:01:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_clientes`
--

DROP TABLE IF EXISTS `tb_clientes`;
CREATE TABLE IF NOT EXISTS `tb_clientes` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(240) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `dni_ce_cliente` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `celular_cliente` varchar(20) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `email_cliente` varchar(200) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `tb_clientes`
--

INSERT INTO `tb_clientes` (`id_cliente`, `nombre_cliente`, `dni_ce_cliente`, `celular_cliente`, `email_cliente`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'RAQUEL MARICELA MAMANI CHACON', '72145685', '915198876', 'raquel@gmail.com', '2023-12-17 19:58:21', '2023-12-17 19:58:21'),
(2, 'EDWARD ALBERTO FLORES CACERES', '75684222', '937127154', 'edward@gmail.com', '2023-12-17 20:01:33', '2023-12-17 20:01:33'),
(3, 'ALEX NOEL QUEA VARGAS', '73249168', '931356002', 'alex@gmail.com', '2023-12-17 08:24:50', '2023-12-17 08:24:50'),
(4, 'ANIBAL HUMBERTO BURRO BURRO', '72145895', '935741526', 'burro@gmail.com', '2023-12-17 08:25:52', '2023-12-17 08:25:52'),
(5, 'LUZ ERIKA LANZA CHOQUEMALLCO', '72107302', '984840055', 'luz@gmail.com', '2023-12-17 10:13:14', '2023-12-17 10:13:14'),
(6, 'VILMA MAMANI SARMIENTO', '71425120', '951224595', 'vilma@gmail.com', '2023-12-18 10:52:43', '2023-12-18 10:52:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_compras`
--

DROP TABLE IF EXISTS `tb_compras`;
CREATE TABLE IF NOT EXISTS `tb_compras` (
  `id_compra` int NOT NULL AUTO_INCREMENT,
  `id_producto` int NOT NULL,
  `nro_compra` int NOT NULL,
  `fecha_compra` date NOT NULL,
  `id_proveedor` int NOT NULL,
  `comprobante` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `id_usuario` int NOT NULL,
  `precio_compra` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `cantidad` int NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id_compra`),
  KEY `id_producto` (`id_producto`),
  KEY `id_proveedor` (`id_proveedor`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `tb_compras`
--

INSERT INTO `tb_compras` (`id_compra`, `id_producto`, `nro_compra`, `fecha_compra`, `id_proveedor`, `comprobante`, `id_usuario`, `precio_compra`, `cantidad`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 3, 1, '2023-02-12', 10, 'FACTURA', 1, '200', 50, '2023-02-12 23:37:24', '2023-12-16 18:00:09'),
(2, 3, 2, '2023-02-17', 10, 'FACTURA NRO 120', 1, '5000', 50, '2023-02-17 22:35:24', '0000-00-00 00:00:00'),
(3, 1, 3, '2023-02-17', 10, 'NOTA DE VENTA NRO 523', 1, '250', 100, '2023-02-17 22:37:33', '0000-00-00 00:00:00'),
(8, 3, 6, '2023-12-16', 10, 'FACTURA', 1, '50', 500, '2023-12-16 07:11:19', '2023-12-16 07:11:19'),
(9, 1, 5, '2023-12-16', 10, 'FACTURA', 1, '9', 250, '2023-12-16 09:10:31', '2023-12-16 09:10:31'),
(10, 1, 6, '2023-12-17', 10, 'FACTURA', 1, '9', 25, '2023-12-17 08:41:19', '2023-12-17 08:41:19'),
(11, 3, 7, '2023-12-18', 10, 'BOLETA', 1, '50', 14, '2023-12-18 07:17:02', '2023-12-18 07:17:02'),
(12, 3, 8, '2023-12-18', 13, 'FACTURA', 1, '50', 6, '2023-12-18 07:29:07', '2023-12-18 07:29:07'),
(13, 3, 9, '2023-12-18', 10, 'FACTURA', 1, '50', 88, '2023-12-18 07:31:39', '2023-12-18 07:31:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_proveedores`
--

DROP TABLE IF EXISTS `tb_proveedores`;
CREATE TABLE IF NOT EXISTS `tb_proveedores` (
  `id_proveedor` int NOT NULL AUTO_INCREMENT,
  `nombre_proveedor` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `celular` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `telefono` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `empresa` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `tb_proveedores`
--

INSERT INTO `tb_proveedores` (`id_proveedor`, `nombre_proveedor`, `celular`, `telefono`, `empresa`, `email`, `direccion`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(10, 'Camiela', '75657007', '27736632', 'WILCOM', 'micaela125@gmail.com', 'Av. del Maestro S/No', '2023-02-12 18:27:10', '2023-12-18 10:37:19'),
(13, 'Carlos', '626200', '2621616', 'MIHABA', 'example@gmail.com', 'aeaea', '2023-12-16 07:59:53', '2023-12-16 07:59:53'),
(14, 'juanca', '12312412', '123124123', 'los gatos', 'example1@gmail.com', 'jr los pumas', '2023-12-16 07:05:18', '2023-12-16 07:05:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_roles`
--

DROP TABLE IF EXISTS `tb_roles`;
CREATE TABLE IF NOT EXISTS `tb_roles` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `rol` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `tb_roles`
--

INSERT INTO `tb_roles` (`id_rol`, `rol`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'ADMINISTRADOR', '2023-01-23 23:15:19', '2023-12-16 17:59:07'),
(3, 'VENDEDOR', '2023-01-23 19:11:28', '2023-01-23 20:13:35'),
(4, 'CONTADOR', '2023-01-23 21:09:54', '0000-00-00 00:00:00'),
(5, 'ALMACEN', '2023-01-24 08:28:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

DROP TABLE IF EXISTS `tb_usuarios`;
CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `password_user` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `token` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `id_rol` int NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `nombres`, `email`, `password_user`, `token`, `id_rol`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'Lenin Quea', 'jhoe.lenin125@gmail.com', '$2y$10$a8kY6cr4qCY4XVf4R/ZM2ujgyvqVE2IPRVtwHw8edpMJ7i3r8ptra', '', 1, '2023-01-24 15:16:01', '2023-12-16 08:46:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ventas`
--

DROP TABLE IF EXISTS `tb_ventas`;
CREATE TABLE IF NOT EXISTS `tb_ventas` (
  `id_venta` int NOT NULL AUTO_INCREMENT,
  `nro_venta` int NOT NULL,
  `id_cliente` int NOT NULL,
  `total_pagado` int NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `id_cliente` (`id_cliente`),
  KEY `nro_venta` (`nro_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `tb_ventas`
--

INSERT INTO `tb_ventas` (`id_venta`, `nro_venta`, `id_cliente`, `total_pagado`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 1, 1, 44750, '2023-12-18 04:42:46', '2023-12-18 04:42:46'),
(2, 2, 4, 10250, '2023-12-18 04:56:54', '2023-12-18 04:56:54'),
(3, 2, 1, 10250, '2023-12-18 04:58:01', '2023-12-18 04:58:01'),
(4, 4, 5, 342, '2023-12-18 07:13:23', '2023-12-18 07:13:23'),
(5, 5, 2, 428, '2023-12-18 07:16:02', '2023-12-18 07:16:02'),
(6, 6, 3, 342, '2023-12-18 07:19:25', '2023-12-18 07:19:25'),
(7, 7, 4, 171, '2023-12-18 07:24:43', '2023-12-18 07:24:43'),
(8, 8, 3, 86, '2023-12-18 07:32:35', '2023-12-18 07:32:35');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  ADD CONSTRAINT `tb_almacen_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categorias` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_almacen_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  ADD CONSTRAINT `tb_carrito_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tb_almacen` (`id_producto`);

--
-- Filtros para la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  ADD CONSTRAINT `tb_compras_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `tb_almacen` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_compras_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_compras_ibfk_4` FOREIGN KEY (`id_proveedor`) REFERENCES `tb_proveedores` (`id_proveedor`);

--
-- Filtros para la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `tb_usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `tb_roles` (`id_rol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_ventas`
--
ALTER TABLE `tb_ventas`
  ADD CONSTRAINT `tb_ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tb_clientes` (`id_cliente`),
  ADD CONSTRAINT `tb_ventas_ibfk_2` FOREIGN KEY (`nro_venta`) REFERENCES `tb_carrito` (`nro_venta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
