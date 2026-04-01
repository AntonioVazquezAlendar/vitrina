-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 01-04-2026 a las 19:37:10
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vitrina_digital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT '1',
  `fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `descripcion`, `activo`, `fecha_alta`) VALUES
(1, 'Electrónica', NULL, 1, '2026-03-30 21:36:12'),
(2, 'Ropa', NULL, 1, '2026-03-30 21:36:12'),
(3, 'Accesorios', NULL, 1, '2026-03-30 21:36:12'),
(4, 'Electrónica', 'Dispositivos electrónicos', 1, '2026-03-30 21:43:01'),
(5, 'Ropa', 'Ropa para hombre y mujer', 1, '2026-03-30 21:43:01'),
(6, 'Accesorios', 'Complementos y gadgets', 1, '2026-03-30 21:43:01'),
(7, 'Hogar', 'Artículos para casa', 1, '2026-03-30 21:43:01'),
(8, 'Deportes', 'Productos deportivos', 1, '2026-03-30 21:43:01'),
(9, 'Papeleria', 'Papeleria', 1, '2026-04-01 19:06:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id_config` int(11) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `mensaje_default` varchar(255) DEFAULT NULL,
  `fecha_actualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id_config`, `telefono`, `whatsapp`, `mensaje_default`) VALUES
(1, '3510000000', '3510000000', 'Hola, me interesa este producto'),
(2, '3511234567', '3511234567', 'Hola, me interesa el producto: ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `nombre` varchar(200) NOT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `precio` decimal(10,2) DEFAULT '0.00',
  `stock` int(11) DEFAULT '0',
  `id_categoria` int(11) DEFAULT NULL,
  `etiqueta` varchar(50) DEFAULT NULL,
  `visible` tinyint(4) DEFAULT '1',
  `activo` tinyint(4) DEFAULT '1',
  `fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `codigo`, `nombre`, `marca`, `descripcion`, `precio`, `stock`, `id_categoria`, `etiqueta`, `visible`, `activo`, `fecha_alta`) VALUES
(1, 'PROD001', 'Laptop HP', 'HP', 'Laptop para trabajo y gaming', '14500.00', 5, 1, 'Nuevo', 1, 1, '2026-03-30 21:43:27'),
(2, 'PROD002', 'iPhone 13', 'IPHONE', 'Celular Apple de última generación', '18000.00', 8, 1, 'Popular', 1, 1, '2026-03-30 21:43:27'),
(3, 'PROD003', 'Playera Nike', 'NIKE', 'Playera deportiva cómoda', '350.00', 20, 2, 'Oferta', 1, 1, '2026-03-30 21:43:27'),
(4, 'PROD004', 'Tenis Adidas', 'ADIDAS', 'Tenis para correr', '1200.00', 15, 2, 'Nuevo', 1, 1, '2026-03-30 21:43:27'),
(5, 'PROD005', 'Reloj Smartwatch', 'IPHONE', 'Reloj inteligente con sensores', '900.00', 10, 3, 'Popular', 1, 1, '2026-03-30 21:43:27'),
(6, 'PROD006', 'Audífonos Bluetooth', 'IPHONE', 'Sonido envolvente inalámbrico', '600.00', 25, 3, 'Oferta', 1, 1, '2026-03-30 21:43:27'),
(7, 'PROD007', 'Licuadora', 'OSTER', 'Licuadora de alta potencia', '850.00', 7, 4, 'Nuevo', 1, 1, '2026-03-30 21:43:27'),
(8, 'PROD008', 'Silla Gamer', 'GM', 'Silla ergonómica para gaming', '2500.00', 4, 4, 'Popular', 1, 1, '2026-03-30 21:43:27'),
(9, 'PROD009', 'Balón de fútbol', 'MOLTEN', 'Balón profesional', '400.00', 30, 5, 'Oferta', 1, 1, '2026-03-30 21:43:27'),
(10, 'PROD010', 'Mancuernas 10kg', 'WILSON', 'Set de mancuernas', '950.00', 12, 5, 'Nuevo', 1, 1, '2026-03-30 21:43:27'),
(11, 'PROD011', 'Colores Prisma', 'WILSON', '48 Colores prsma color premier', '2230.00', 1, 9, 'Nuevo', 1, 1, '2026-03-30 21:43:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_imagenes`
--

CREATE TABLE `productos_imagenes` (
  `id_imagen` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `url_imagen` varchar(255) DEFAULT NULL,
  `principal` tinyint(4) DEFAULT '0',
  `fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `productos_imagenes`
--

INSERT INTO `productos_imagenes` (`id_imagen`, `id_producto`, `url_imagen`, `principal`, `fecha_alta`) VALUES
(1, 1, '/vitrina/assets/img/laptop.png', 1, '2026-03-30 21:43:38'),
(2, 2, '/vitrina/assets/img/laptop.png', 1, '2026-03-30 21:43:38'),
(3, 3, '/vitrina/assets/img/laptop.png', 1, '2026-03-30 21:43:38'),
(4, 4, '/vitrina/assets/img/laptop.png', 1, '2026-03-30 21:43:38'),
(5, 5, '/vitrina/assets/img/laptop.png', 1, '2026-03-30 21:43:38'),
(6, 6, '/vitrina/assets/img/laptop.png', 1, '2026-03-30 21:43:38'),
(7, 7, '/vitrina/assets/img/laptop.png', 1, '2026-03-30 21:43:38'),
(8, 8, '/vitrina/assets/img/laptop.png', 1, '2026-03-30 21:43:38'),
(9, 9, '/vitrina/assets/img/laptop.png', 1, '2026-03-30 21:43:38'),
(10, 10, '/vitrina/assets/img/laptop.png', 1, '2026-03-30 21:43:38'),
(11, 11, '/vitrina/assets/img/prisma_color.jpg', 1, '2026-04-01 19:09:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT '1',
  `fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password`, `nombre`, `activo`, `fecha_alta`) VALUES
(1, 'admin', '1234', 'Administrador', 1, '2026-03-30 21:45:08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id_config`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD UNIQUE KEY `idx_codigo_unico` (`codigo`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `productos_imagenes`
--
ALTER TABLE `productos_imagenes`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `productos_imagenes`
--
ALTER TABLE `productos_imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `productos_imagenes`
--
ALTER TABLE `productos_imagenes`
  ADD CONSTRAINT `productos_imagenes_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
