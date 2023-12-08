-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2023 a las 05:10:38
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(4, 'Monitores'),
(5, 'Auriculares'),
(6, 'Teclados'),
(7, 'Componentes computadora'),
(8, 'Notebooks'),
(9, 'Almacenamiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_envios`
--

CREATE TABLE `datos_envios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellido` varchar(250) DEFAULT NULL,
  `pais` varchar(250) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `ciudad` varchar(250) DEFAULT NULL,
  `ubicacion` varchar(250) DEFAULT NULL,
  `codigo_postal` varchar(250) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_envios`
--

INSERT INTO `datos_envios` (`id`, `nombre`, `apellido`, `pais`, `direccion`, `ciudad`, `ubicacion`, `codigo_postal`, `telefono`) VALUES
(1, 'Cristian', 'Barrios', 'Argentina', 'ufhirfmoewiodjoewd', 'Formosa', 'Formosa', '3600', 2147483647),
(2, 'Cristian', 'Barrios', 'Argentina', 'ufhirfmoewiodjoewd', 'Formosa', 'Formosa', '3600', 2147483647),
(3, 'Cristian', 'Barrios', 'Argentina', 'ufhirfmoewiodjoewd', 'Formosa', 'Formosa', '3600', 2147483647),
(4, 'Cristian', 'Barrios', 'Estados Unidos', 'ufhirfmoewiodjoewd', 'Formosa', 'Formosa', '3600', 2147483647),
(5, 'Cristian', 'Barrios', 'Mexico', 'ufhirfmoewiodjoewd', 'Formosa', 'Formosa', '3600', 2147483647),
(6, 'Cristian', 'Barrios', 'Argentina', 'ufhirfmoewiodjoewd', 'Formosa', 'Formosa', '3600', 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE `detalles` (
  `id` int(11) NOT NULL,
  `pedido` int(11) DEFAULT NULL,
  `producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalles`
--

INSERT INTO `detalles` (`id`, `pedido`, `producto`, `cantidad`, `total`) VALUES
(1, 2, 12, 1, 850000),
(2, 2, 14, 2, 1340000),
(3, 2, 17, 1, 250000),
(4, 2, 18, 2, 840000),
(5, 3, 12, 1, 850000),
(6, 3, 14, 2, 1340000),
(7, 3, 17, 1, 250000),
(8, 3, 18, 2, 840000),
(9, 4, 16, 1, 500000),
(10, 5, 16, 4, 2000000),
(11, 6, 11, 1, 500000),
(12, 6, 14, 1, 670000),
(13, 6, 17, 1, 250000),
(14, 6, 12, 1, 850000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `datos_envio` int(11) DEFAULT NULL,
  `transporte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `fecha`, `usuario`, `total`, `datos_envio`, `transporte`) VALUES
(1, '2023-12-07', 5, 3864256, 1, 1),
(2, '2023-12-07', 5, 3864256, 2, 1),
(3, '2023-12-07', 5, 3864256, 3, 1),
(4, '2023-12-07', 5, 596777, 4, 2),
(5, '2023-12-07', 5, 2352107, 5, 3),
(6, '2023-12-08', 5, 2678967, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `categoria`) VALUES
(10, 'Monitor 50 pulgadas', 'Monitor OLED de 50 pulgadas', 200000, '/pagina-productos/images/producto5.webp', 4),
(11, 'Cooler Ryzen', 'Cooler ventilacion Ryzen', 500000, '/pagina-productos/images/producto7.webp', 7),
(12, 'Notebook', 'Notebook HP', 850000, '/pagina-productos/images/producto2.webp', 8),
(13, 'Disco solido', 'Disco solido Kingston', 200000, '/pagina-productos/images/producto9.webp', 9),
(14, 'Tarjeta grafica', 'Tarjeta grafica 3000', 670000, '/pagina-productos/images/producto6.webp', 7),
(15, 'Monitor 35 pulgadas', 'Monitor LED 35 pulgadas', 230000, '/pagina-productos/images/producto3.webp', 4),
(16, 'Notebook Lenovo', 'Notebook Lenovo', 500000, '/pagina-productos/images/producto4.webp', 8),
(17, 'Gabinete Gamer', 'Gabinete Gamer hermetico', 250000, '/pagina-productos/images/producto8.webp', 7),
(18, 'Disco solido Toshiba', 'Disco solido marca Toshiba', 420000, '/pagina-productos/images/producto1.webp', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transportes`
--

CREATE TABLE `transportes` (
  `id` int(11) NOT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  `empresa` varchar(250) DEFAULT NULL,
  `tiempo_entrega` varchar(250) DEFAULT NULL,
  `precio_envio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `transportes`
--

INSERT INTO `transportes` (`id`, `imagen`, `empresa`, `tiempo_entrega`, `precio_envio`) VALUES
(1, '/pagina-productos/images/transporte.webp', 'Empresa 01', '24 hs', 15000),
(2, '/pagina-productos/images/transporte.webp', 'Empresa 02', '48 hs', 10000),
(3, '/pagina-productos/images/transporte.webp', 'Empresa 03', '72 hs', 5000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `usuario` varchar(250) DEFAULT NULL,
  `correo` varchar(250) DEFAULT NULL,
  `pass` varchar(250) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `correo`, `pass`, `rol`) VALUES
(4, 'Cristian', 'admin', 'admin@gmail.com', '$2y$10$UNglkANYI5yHaZsl81Gmj.RwsPJUQs/Kwsur8Lk47OwOD0LocMpqu', 1),
(5, 'john wick', 'john', 'john@gmail.com', '$2y$10$EoWpizcPSQt5PgNy8/w1S.ettWX3njJBbSp3QNUhC/8XgZ29CwLaS', 2),
(6, 'john wick', 'john wick', 'johnwick@gmail.com', '$2y$10$NQPcOF0IUO345GIEmxSOFu8JlsrlofMB260dGWWzxuKbkArU8Sd6W', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos_envios`
--
ALTER TABLE `datos_envios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venta` (`pedido`),
  ADD KEY `producto` (`producto`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `fk_pedidos_datos_envios` (`datos_envio`),
  ADD KEY `fk_pedidos_transportes` (`transporte`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transportes`
--
ALTER TABLE `transportes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `datos_envios`
--
ALTER TABLE `datos_envios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalles`
--
ALTER TABLE `detalles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `transportes`
--
ALTER TABLE `transportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD CONSTRAINT `detalles_ibfk_1` FOREIGN KEY (`pedido`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `detalles_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_datos_envios` FOREIGN KEY (`datos_envio`) REFERENCES `datos_envios` (`id`),
  ADD CONSTRAINT `fk_pedidos_transportes` FOREIGN KEY (`transporte`) REFERENCES `transportes` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
