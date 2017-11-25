-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2017 a las 21:46:05
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
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `numero_cliente` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `dni` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `estado_id`, `numero_cliente`, `nombre`, `apellido`, `dni`, `telefono`, `email`) VALUES
(1, 1, 100, 'Jesica', 'Soria', 34404040, 1233123123, 'jesica_deSoria@gmail.com'),
(2, 2, 101, 'Roberto', 'Poggi', 25449825, 42601212, 'poggi0577@gmail.com'),
(3, 1, 102, 'Kevin', 'Hidalgo', 36548121, 49875656, 'kevinhidalgo@hotmail.com'),
(4, 1, 104, 'Jesica', 'Lopez', 35125550, 42000101, 'lopezjesi@yahoo.com.ar'),
(5, 1, 105, 'Julian', 'Salgado', 37564098, 42016164, 'salgado_xeneize@gmail.com'),
(6, 1, 106, 'Yamila', 'Vergara', 36915226, 2034659745, 'yamilaluciavergara@hotmail.com'),
(7, 1, 107, 'Mariano', 'Martinez', 33121255, 1558022624, 'reysol_marquesi@yahoo.com.ar'),
(8, 1, 108, 'Lorenzo', 'Lamas', 2147483647, 49026487, 'lamas_original@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `nombre`) VALUES
(1, 'Operativo'),
(2, 'Baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulas`
--

CREATE TABLE `formulas` (
  `id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `formulas`
--

INSERT INTO `formulas` (`id`, `estado_id`, `nombre`, `descripcion`) VALUES
(4, 1, 'pan de centeno', '+ 300 g de harina 000\r\n+ 100 g de harina de integral\r\n+ 175 g de harina de centeno\r\n+ 2 cucharaditas de levadura seca\r\n+ 1 cucharadita de sal\r\n+ 3 cucharaditas de semillas lino\r\n+ 1 cucharada de melaza\r\n+ 100 ml de leche\r\n+ 300 ml de agua.'),
(6, 1, 'pan casero', '+ 1kg de Harina 000\r\n+ 100kg de Grasa\r\n+ 50g de Levadura Fresca\r\n+ 500ml de Agua\r\n+ 1 cucharadita de AzÃºcar,\r\n+ 20g de Sal\r\n'),
(7, 1, 'medialuna de manteca', 'Masa: \r\n+ 500g de harina 0000\r\n+ 15g de sal\r\n+ 75g de azÃºcar\r\n+ 1 huevo\r\n+ 200cm3 de leche\r\n+ 10g de levadura seca\r\n+ 1 cucharadita de esencia de vainilla\r\n\r\nEmpaste:\r\n+ 50g de harina 0000\r\n+ 250g de manteca\r\n\r\nAlmÃ­bar:\r\n+ 200cm3 de agua\r\n+ 200gr azÃºcar'),
(8, 1, 'medialuna de grasa', 'Masa:\r\n+ 500g de harina 0000\r\n+ 10g de levadura fresca\r\n+ 20de sal\r\n+ 25g de azÃºcar\r\n+ 250cm2 de agua\r\n\r\nEmpaste:\r\n+ 100g de grasa\r\n+ 100g de margarina\r\n+ 20g de harina 0000'),
(9, 1, 'pan de salvado', '+ 1kg de harina 000\r\n+ 200g de harina de salvado\r\n+ 15g de levadura fresca\r\n+ 375cm2 de leche.\r\n+ 500cm2 de agua.\r\n+ 1 cucharadita de sal.\r\n+ 1 cucharadita de azÃºcar.'),
(10, 1, 'churro', '+ 300g de harina 0000\r\n+ 440ml de agua.\r\n+ 1 cucharadita de sal\r\n+ 3g de azucar\r\n+ 200ml de aceite de maiz'),
(11, 1, 'churro relleno de dulce de leche', 'Masa:\r\n+ 300g de harina 0000\r\n+ 440ml de agua.\r\n+ 1 cucharadita de sal\r\n+ 3g de azucar\r\n+ 200ml de aceite de maiz\r\n\r\nRelleno:\r\n+ 170g de dulce de leche'),
(12, 1, 'churro baÃ±ado de chocolate', 'Masa:\r\n+ 300g de harina 0000\r\n+ 440ml de agua\r\n+ 1 cucharadita de sal\r\n+ 3g de azucar\r\n+ 200ml de aceite de maiz \r\n\r\nCobertura:\r\n\r\n+100g de chocolate para cobertura'),
(13, 1, 'churro baÃ±ado y relleno de dulce de leche', 'Masa:\r\n+ 300g de harina 0000\r\n+ 440ml de agua\r\n+ 1 cucharadita de sal\r\n+ 3g de azucar\r\n+ 200ml de aceite de maiz \r\n\r\nCobertura:\r\n+100g de chocolate para cobertura\r\n\r\nRelleno:\r\n+ 170g de dulce de leche '),
(14, 1, 'bola de fraile de dulce de leche', 'Masa:\r\n+ 750g de harina 0000\r\n+ 50g de levadura fresca\r\n+ 150ml de agua\r\n+ 150ml de leche\r\n+ 350g de azucar\r\n+ 3 cucharadas de aceite de girasol\r\n+ 1 huevo\r\n\r\nRelleno:\r\n+ 500g de dulce de leche'),
(15, 1, 'bola de fraile de crema pastelera', 'Masa:\r\n+ 750g de harina 0000\r\n+ 50g de levadura fresca\r\n+ 150ml de agua\r\n+ 150ml de leche\r\n+ 350g de azucar\r\n+ 3 cucharadas de aceite de girasol\r\n+ 1 huevo\r\n\r\nRelleno:\r\n+ 500g de crema pastelera'),
(16, 1, 'vigilante de crema pastelera', 'Masa:\r\n\r\n+ 750 g harina 0000\r\n+ 500ml de leche\r\n+ 70 g manteca\r\n+ 1 1/2 cucharadita de sal\r\n+ 70g de azÃºcar\r\n+ 16g de levadura seca\r\n+ 1 huevo\r\n\r\nTopping:\r\n+100g de crema pastelera'),
(17, 1, 'librito de grasa', 'Masa:\r\n+ 500g de Harina 0000\r\n+ 250 cm2 de Agua\r\n+ 20g de Sal \r\n+ 15g de AzÃºcar\r\n+ 50g de Grasa\r\n\r\nEmpaste:  \r\n+ 75g de Margarina\r\n+ 75g de Grasa\r\n+ 1 cucharadita de Harina 0000\r\n'),
(18, 1, 'chipa con queso', '+ 500g de harina de mandioca\r\n+ 500g de queso cÃ¡scara colorada\r\n+ 1/2 taza de queso rallado\r\n+ 150g de manteca\r\n+ 4 huevos\r\n+ 1/2 taza leche\r\n+ 1/2 cucharadita de pimienta\r\n+ 1 cucharadita de sal\r\n+ 1 cucharada de polvo de hornear'),
(19, 1, 'flautita', '+ 500g de harina 0000\r\n+ 30g de levadura fresca\r\n+ 100ml aceite de girasol\r\n+ 1 cucharada de sal\r\n+ 1 taza de leche tibia'),
(20, 1, 'flautita sin sal', '+ 500g de harina 0000\r\n+ 30g de levadura fresca\r\n+ 100ml aceite de girasol\r\n+ 1 taza de leche tibia'),
(21, 1, 'mignon', '+ 300g de Harina 000\r\n+ 10g de Levadura fresca\r\n+ 180ml de Agua\r\n+ 1 cucharadita de Sal'),
(22, 2, 'mignon sin sal', '+ 300g de Harina 000\r\n+ 10g de Levadura fresca\r\n+ 180ml de Agua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulas_insumos`
--

CREATE TABLE `formulas_insumos` (
  `id` int(11) NOT NULL,
  `formula_id` int(11) NOT NULL,
  `insumo_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `formulas_insumos`
--

INSERT INTO `formulas_insumos` (`id`, `formula_id`, `insumo_id`, `cantidad`) VALUES
(8, 4, 1, 0),
(9, 4, 4, 0),
(10, 4, 7, 0),
(11, 4, 11, 0),
(12, 4, 12, 0),
(13, 4, 13, 0),
(14, 4, 14, 0),
(15, 4, 15, 0),
(16, 4, 16, 0),
(18, 6, 1, 0),
(19, 6, 3, 0),
(20, 6, 8, 0),
(21, 6, 13, 0),
(22, 6, 16, 0),
(23, 6, 17, 0),
(24, 7, 1, 0),
(25, 7, 2, 0),
(26, 7, 7, 0),
(27, 7, 8, 0),
(28, 7, 12, 0),
(29, 7, 13, 0),
(30, 7, 16, 0),
(31, 7, 18, 0),
(32, 8, 1, 0),
(33, 8, 3, 0),
(34, 8, 8, 0),
(35, 8, 13, 0),
(36, 8, 16, 0),
(37, 8, 17, 0),
(38, 8, 19, 0),
(39, 9, 1, 0),
(40, 9, 6, 0),
(41, 9, 7, 0),
(42, 9, 8, 0),
(43, 9, 13, 0),
(44, 9, 16, 0),
(45, 9, 17, 0),
(46, 10, 5, 0),
(47, 10, 8, 0),
(48, 10, 13, 0),
(49, 10, 16, 0),
(50, 10, 20, 0),
(51, 11, 5, 0),
(52, 11, 8, 0),
(53, 11, 9, 0),
(54, 11, 13, 0),
(55, 11, 16, 0),
(56, 11, 20, 0),
(57, 12, 8, 0),
(58, 12, 13, 0),
(59, 12, 16, 0),
(60, 12, 20, 0),
(61, 12, 22, 0),
(62, 13, 5, 0),
(63, 13, 8, 0),
(64, 13, 9, 0),
(65, 13, 13, 0),
(66, 13, 16, 0),
(67, 13, 22, 0),
(68, 14, 2, 0),
(69, 14, 7, 0),
(70, 14, 8, 0),
(71, 14, 9, 0),
(72, 14, 16, 0),
(73, 14, 17, 0),
(74, 14, 21, 0),
(75, 15, 5, 0),
(76, 15, 8, 0),
(77, 15, 16, 0),
(78, 15, 17, 0),
(79, 15, 21, 0),
(80, 15, 2, 0),
(81, 15, 23, 0),
(82, 16, 2, 0),
(83, 16, 5, 0),
(84, 16, 7, 0),
(85, 16, 12, 0),
(86, 16, 13, 0),
(87, 16, 23, 0),
(88, 16, 25, 0),
(89, 17, 3, 0),
(90, 17, 5, 0),
(91, 17, 8, 0),
(92, 17, 13, 0),
(93, 17, 16, 0),
(94, 17, 19, 0),
(95, 18, 2, 0),
(96, 18, 7, 0),
(97, 18, 13, 0),
(98, 18, 25, 0),
(99, 18, 26, 0),
(100, 18, 27, 0),
(101, 18, 28, 0),
(102, 18, 29, 0),
(103, 18, 30, 0),
(104, 19, 5, 0),
(105, 19, 7, 0),
(106, 19, 13, 0),
(107, 19, 17, 0),
(108, 19, 21, 0),
(109, 20, 5, 0),
(110, 20, 7, 0),
(111, 20, 13, 0),
(112, 20, 21, 0),
(113, 21, 1, 0),
(114, 21, 13, 0),
(115, 21, 16, 0),
(116, 21, 17, 0),
(117, 22, 1, 0),
(118, 22, 16, 0),
(119, 22, 17, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE `insumos` (
  `id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `stock` int(11) NOT NULL,
  `minimo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `insumos`
--

INSERT INTO `insumos` (`id`, `estado_id`, `nombre`, `stock`, `minimo`) VALUES
(1, 1, 'harina 000', 2500, 1000),
(2, 1, 'huevos', 700, 400),
(3, 1, 'grasa', 300, 500),
(4, 1, 'harina de centeno', 35, 500),
(5, 1, 'harina 0000', 5000, 1500),
(6, 1, 'harina de salvado', 1500, 800),
(7, 1, 'leche', 1200, 800),
(8, 1, 'azucar', 1700, 1000),
(9, 1, 'dulce de leche', 800, 400),
(11, 1, 'harina integral', 1200, 800),
(12, 1, 'levadura seca', 1300, 800),
(13, 1, 'sal', 1000, 800),
(14, 1, 'semilla de lino', 600, 400),
(15, 1, 'melaza', 750, 500),
(16, 1, 'agua', 10000, 3000),
(17, 1, 'levadura fresca', 1500, 1000),
(18, 1, 'esencia de vainilla', 500, 200),
(19, 1, 'margarina', 600, 500),
(20, 1, 'aceite de maiz', 700, 500),
(21, 1, 'aceite de girasol', 1200, 800),
(22, 1, 'chocolate para cobertura', 900, 600),
(23, 1, 'crema pastelera', 800, 400),
(24, 1, 'dulce de membrillo', 800, 400),
(25, 1, 'manteca', 900, 700),
(26, 1, 'queso rallado', 600, 400),
(27, 1, 'queso cascara colorada', 500, 200),
(28, 1, 'harina de mandioca', 700, 500),
(29, 1, 'pimienta', 500, 300),
(30, 1, 'polvo de hornear', 1000, 700);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `subestado_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `estado_id`, `subestado_id`, `cliente_id`, `fecha`) VALUES
(4, 1, 1, 1, '2017-11-24'),
(5, 1, 1, 3, '2017-11-24'),
(6, 1, 1, 7, '2017-11-25'),
(7, 1, 1, 5, '2017-11-24'),
(8, 1, 1, 1, '2017-11-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_productos`
--

CREATE TABLE `pedidos_productos` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `pedidos_productos`
--

INSERT INTO `pedidos_productos` (`id`, `pedido_id`, `producto_id`, `cantidad`) VALUES
(7, 4, 5, 50),
(8, 5, 6, 40),
(9, 5, 11, 30),
(10, 5, 16, 40),
(11, 6, 4, 60),
(12, 6, 20, 100),
(13, 7, 5, 70),
(14, 7, 6, 80),
(15, 7, 7, 90),
(16, 8, 18, 50),
(17, 8, 19, 40),
(18, 8, 20, 30),
(20, 6, 6, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `formula_id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `detalle` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `estado_id`, `formula_id`, `nombre`, `detalle`) VALUES
(4, 1, 4, 'pan de centeno', 'receta tradicional'),
(5, 1, 6, 'pan casero', 'receta con grasa'),
(6, 1, 7, 'medialuna de manteca', 'receta tradicional'),
(7, 1, 8, 'medialuna de grasa', 'receta tradicional'),
(8, 1, 9, 'pan de salvado', 'receta original'),
(9, 1, 10, 'churro', 'receta tradicional'),
(10, 1, 11, 'churro relleno', 'receta tradicional - relleno de dulce de leche'),
(11, 1, 12, 'churro baÃ±ado', 'receta tradicional - baÃ±ado en chocolate para cobertura'),
(12, 1, 13, 'churro baÃ±ado relleno', 'receta tradicional - baÃ±ado en chocolate para cobertura y relleno de dulce de leche'),
(13, 1, 14, 'bola de fraile', 'receta original - relleno de dulce de leche'),
(14, 1, 16, 'vigilante', 'receta tradicional con crema pastelera'),
(15, 1, 17, 'librito', 'receta tradicional con grasa'),
(16, 1, 18, 'chipa', 'receta tradicional con queso'),
(17, 1, 19, 'flautita', 'receta tradicional'),
(18, 2, 20, 'flautita', 'receta sin sal'),
(19, 1, 21, 'mignon', 'receta tradicional'),
(20, 1, 22, 'mignon', 'receta sin sal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `tipo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `estado_id`, `tipo`) VALUES
(1, 1, 'Administrador'),
(3, 1, 'Gerente de Produccion'),
(4, 1, 'Encargado de Produccion'),
(5, 1, 'Empleado de Ventas'),
(6, 1, 'Empleado de Produccion'),
(7, 1, 'Super Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subestado`
--

CREATE TABLE `subestado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `estado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subestado`
--

INSERT INTO `subestado` (`id`, `nombre`, `estado_id`) VALUES
(1, 'No Realizado', 1),
(2, 'En Proceso', 1),
(3, 'Realizado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(120) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `dni` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role_id`, `estado_id`, `username`, `password`, `nombre`, `apellido`, `dni`, `telefono`, `email`) VALUES
(4, 3, 1, 'GerenteDeProduccion', '$2a$10$hTc3cSyESWj0ja.gcMvV7uvNW17nIh2afWfJKxlwfEfryP7mxTDxq', 'Marcos', 'Polo', '1111111111', '444444444', 'marcospolo@gmail.com'),
(5, 4, 1, 'EncargadoDeProduccion', '$2a$10$KlAUTdrCoj68ryMMSaDoqeejkbSX/2fLi7m6qExw1hPS.sjR72VMW', 'Andrea', 'Villanova', '121121212', '21321312313', 'villanov@gmail.com'),
(6, 5, 1, 'EmpleadoDeVentas', '$2a$10$rW4OCs85dP6my4SLjkvy1uwMK/XDgCrxy7xF.TAF7oiCd0..0LEjK', 'Camilia', 'Temira', '231231', '213123123', 'temiracami@gmail.com'),
(7, 6, 1, 'EmpleadoDeProduccion', '$2a$10$lbD.78eJ4DraDbZlX4KxweBon62AmaP7FdPpdkbvR0/C/nvtqOoui', 'Armando', 'Barreda', '12121212212', '1212', 'barreda1313@gmail.com'),
(8, 7, 1, 'SuperAdmin', '$2a$10$DeX8w5gzXBgE3V.1WToTX.E9Mwpxyh/qPkEhxxVdKqVkHM7X7oh7u', 'Goku', 'SS3', '12312312', '213213', 'kamehame@yahoo.com.ar'),
(9, 6, 1, 'mabi', '$2a$10$5CcveUJZAXYcPIYWNNr9JuYes3gG19N3VK.zAAyMw78Qv/l7iZrDm', 'Mabel', 'OrduÃ±ez', '15684020', '46055540', 'mabelorduez@gmail.com'),
(10, 1, 2, 'stv02', '$2a$10$9SsBXoGO2pNxXVbF5WxJN.6RpTij8FlhJvSMaMbAxtO2BfgEHTn2u', 'Steven', 'Walker', '32658101', '02536454569', 'walkersinc@gmail.com'),
(11, 7, 1, 'SuperAdmin2', '$2a$10$6r42dqSKidZYhazYWIi8ZeQlp4RUXwW7mEOzGXC4dqVYLlXnVJbaG', 'Vegeta', 'SS2', '202020202', '202020202', 'elprincipe_de_los_saiyajin@hotmail.com'),
(12, 5, 1, 'ventas', '$2a$10$KWuZhF1LClkFT85aoNoX2OL4enRiUWlAU.ypHk4iFG0LSg0gPXJ66', 'Julio', 'Pratto', '26781545', '48256712', 'pratto13julio@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `formulas`
--
ALTER TABLE `formulas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `formulas_insumos`
--
ALTER TABLE `formulas_insumos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subestado`
--
ALTER TABLE `subestado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `formulas`
--
ALTER TABLE `formulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `formulas_insumos`
--
ALTER TABLE `formulas_insumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `subestado`
--
ALTER TABLE `subestado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
