-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-12-2023 a las 23:35:20
-- Versión del servidor: 8.0.35
-- Versión de PHP: 8.0.26

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `tb_almacen`
--

INSERT INTO `tb_almacen` (`id_producto`, `codigo`, `nombre`, `descripcion`, `stock`, `stock_minimo`, `stock_maximo`, `precio_compra`, `precio_venta`, `fecha_ingreso`, `imagen`, `id_usuario`, `id_categoria`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(7, 'P-00001', 'Laptop HP 15-DY5008LA', 'Core i7-1255U, 8GB RAM, 256GB SSD, 15.6″ ', 45, 10, 500, '2100', '2500', '2023-12-19', '2023-12-19-06-41-38__main.jpg', 1, 1, '2023-12-19 06:41:38', '2023-12-19 06:41:38'),
(8, 'P-00002', 'Laptop HP 240 G9', 'Core i5-1235U, 8GB RAM, 512GB SSD, 14″ HD', 40, 10, 500, '2400', '2800', '2023-12-19', '2023-12-19-06-42-34__main.jpg', 1, 1, '2023-12-19 06:42:34', '2023-12-19 06:42:34'),
(9, 'P-00003', 'LAPTOP AORUS 5', 'Core i7 12700H + RTX 3070TI + 16GB RAM + 1TB SSD / PANTALLA FULLHD 360HZ', 30, 10, 500, '3100', '3450', '2023-12-19', '2023-12-19-06-43-56__main.jpg', 1, 1, '2023-12-19 06:43:56', '2023-12-19 06:43:56'),
(10, 'P-00004', 'LAPTOP G5 GE GIGABYTE', 'Core i5 12500H + RTX 3050 4GB+ 8GB RAM + 512GB SSD + 17.3” 144HZ', 60, 10, 500, '2800', '3000', '2023-12-19', '2023-12-19-06-44-45__main.jpg', 1, 1, '2023-12-19 06:44:45', '2023-12-19 06:44:45'),
(11, 'P-00005', 'LAPTOP IDEAPAD 3 15ITL6 LENOVO', 'Core i7-1165G7 8GB RAM SSD 512GB IRIS XE GRAPHICS / 15.6”', 30, 10, 500, '2400', '2700', '2023-12-19', '2023-12-19-06-45-42__main.jpg', 1, 1, '2023-12-19 06:45:42', '2023-12-19 06:45:42'),
(12, 'P-00006', 'LAPTOP G5 KE-52LA213SD GIGABYTE', 'Core i5-12500H 16GB RAM SSD 512GB RTX 3060 144HZ', 25, 10, 500, '3500', '4000', '2023-12-19', '2023-12-19-06-46-26__main.jpg', 1, 1, '2023-12-19 06:46:26', '2023-12-19 06:46:26'),
(14, 'P-00007', 'IMPRESORA LASER BROTHER (HL-1202) IMPRIME', 'Resolución de Impresión : 2400 x 600 dpi, \r\nVelocidad de impresión : Hasta 21 ppm', 20, 5, 500, '300', '400', '2023-12-19', '2023-12-19-06-52-42__impresora-laser-brother-hl-1202.jpg', 1, 13, '2023-12-19 06:52:42', '2023-12-19 06:55:26'),
(15, 'P-00008', 'IMPRESORA MULTIFUNCIONAL LASER BROTHER (DCP-1602)', 'Resolución de Impresión : Hasta 2400 x 600 dpi (tecnología HQ1200)\r\nVelocidad de impresión : Hasta 21ppm (carta)', 30, 5, 500, '500', '650', '2023-12-19', '2023-12-19-06-54-42__impresora-multifuncional-laser-brother-dcp-1602.jpg', 1, 13, '2023-12-19 06:54:42', '2023-12-19 06:55:33'),
(16, 'P-00009', 'IMPRESORA MULTIFUNCIONAL BROTHER MFC-T920DW WIRELESS RED DUPLEX', 'Resolución de Impresión : 6000 x 1200 dpi\r\nVelocidad de impresión : hasta 17 ipm en negro y 16 ipm a color\r\nConexion Wifi : Si', 25, 2, 500, '1200', '1400', '2023-12-19', '2023-12-19-06-56-57__impresora-multifuncional-brother-mfc-t920dw-wireless-red-duplex.jpg', 1, 13, '2023-12-19 06:56:57', '2023-12-19 06:58:12'),
(17, 'P-00010', 'IMPRESORA MULTIFUNCIONAL BROTHER DCP-T520W WIRELESS', 'Resolución de Impresión : 6000 x 1200 dpi\r\nVelocidad de impresión : hasta 30 ppm\r\nConexion Wifi : Si', 15, 2, 500, '750', '950', '2023-12-19', '2023-12-19-06-58-05__impresora-multifuncional-brother-dcp-t520w-wireless.jpg', 1, 13, '2023-12-19 06:58:05', '2023-12-19 06:58:05'),
(18, 'P-00011', 'IMPRESORA MULTIFUNCIONAL BROTHER DCP-T420W WIRELESS', 'Velocidad de impresión : 9 ppm, Borrador 11 ppm\r\nConexion Wifi : Si', 15, 2, 500, '700', '850', '2023-12-19', '2023-12-19-07-11-19__impresora-multifuncional-brother-dcp-t420w-wireless.jpg', 1, 13, '2023-12-19 07:11:19', '2023-12-19 07:11:19');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `tb_carrito`
--

INSERT INTO `tb_carrito` (`id_carrito`, `nro_venta`, `id_producto`, `cantidad`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(23, 1, 7, 5, '2023-12-19 07:05:04', '2023-12-19 07:05:04'),
(24, 2, 9, 5, '2023-12-19 07:30:16', '2023-12-19 07:30:16');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `tb_categorias`
--

INSERT INTO `tb_categorias` (`id_categoria`, `nombre_categoria`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'LAPTOPS', '2023-01-24 22:25:10', '2023-12-19 05:14:15'),
(13, 'IMPRESORAS', '2023-12-19 23:50:38', '2023-12-19 23:50:38'),
(14, 'TECLADOS', '2023-12-19 23:53:07', '2023-12-19 23:53:07'),
(15, 'MOUSES', '2023-12-19 23:53:07', '2023-12-19 23:53:07'),
(16, 'AUDIFONOS', '2023-12-19 23:53:19', '2023-12-19 23:53:19'),
(17, 'PANTALLAS', '2023-12-19 23:53:19', '2023-12-19 23:53:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_clientes`
--

DROP TABLE IF EXISTS `tb_clientes`;
CREATE TABLE IF NOT EXISTS `tb_clientes` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(240) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `dni_ce_cliente` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `celular_cliente` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `email_cliente` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
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
(1, 'Lenin Vargas', 'jhoe.lenin125@gmail.com', '$2y$10$a8kY6cr4qCY4XVf4R/ZM2ujgyvqVE2IPRVtwHw8edpMJ7i3r8ptra', '', 1, '2023-01-24 15:16:01', '2023-12-19 07:41:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ventas`
--

DROP TABLE IF EXISTS `tb_ventas`;
CREATE TABLE IF NOT EXISTS `tb_ventas` (
  `id_venta` int NOT NULL AUTO_INCREMENT,
  `nro_venta` int NOT NULL,
  `id_cliente` int NOT NULL,
  `total_pagado` float NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `id_cliente` (`id_cliente`),
  KEY `nro_venta` (`nro_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `tb_ventas`
--

INSERT INTO `tb_ventas` (`id_venta`, `nro_venta`, `id_cliente`, `total_pagado`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(15, 1, 3, 12500, '2023-12-19 07:05:17', '2023-12-19 07:05:17'),
(16, 2, 4, 17250, '2023-12-19 07:30:49', '2023-12-19 07:30:49');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  ADD CONSTRAINT `tb_almacen_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_almacen_ibfk_3` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categorias` (`id_categoria`);

--
-- Filtros para la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  ADD CONSTRAINT `tb_carrito_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tb_almacen` (`id_producto`);

--
-- Filtros para la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  ADD CONSTRAINT `tb_compras_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_compras_ibfk_4` FOREIGN KEY (`id_proveedor`) REFERENCES `tb_proveedores` (`id_proveedor`),
  ADD CONSTRAINT `tb_compras_ibfk_5` FOREIGN KEY (`id_producto`) REFERENCES `tb_almacen` (`id_producto`);

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
