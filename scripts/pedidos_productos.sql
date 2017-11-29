-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2017 a las 07:56:20
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vieja_panificadora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_productos`
--

CREATE TABLE `pedidos_productos` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subestado_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `pedidos_productos`
--

INSERT INTO `pedidos_productos` (`id`, `pedido_id`, `producto_id`, `cantidad`, `subestado_id`) VALUES
(8, 5, 6, 40, 3),
(9, 5, 11, 30, 1),
(10, 5, 16, 40, 1),
(11, 6, 4, 60, 3),
(12, 6, 20, 100, 1),
(13, 7, 5, 70, 3),
(14, 7, 6, 80, 3),
(15, 7, 7, 90, 3),
(16, 8, 18, 50, 1),
(17, 8, 19, 40, 1),
(18, 8, 20, 30, 1),
(20, 6, 6, 12, 3),
(21, 9, 5, 10, 3),
(22, 9, 7, 50, 3),
(23, 9, 11, 35, 1),
(24, 9, 12, 24, 1),
(25, 9, 17, 39, 1),
(26, 9, 19, 40, 1),
(28, 10, 4, 50, 3),
(39, 12, 20, 0, 1),
(40, 13, 18, 0, 1),
(52, 17, 4, 0, 1),
(53, 17, 6, 0, 1),
(54, 17, 20, 0, 1),
(55, 18, 9, 10, 2),
(56, 18, 10, 10, 1),
(57, 18, 11, 10, 1),
(58, 19, 9, 0, 2),
(59, 19, 10, 0, 1),
(60, 19, 11, 0, 1),
(61, 19, 13, 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
