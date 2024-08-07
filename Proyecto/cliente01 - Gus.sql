-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2022 a las 03:03:51
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cliente01`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `apellidos` varchar(128) NOT NULL,
  `correo` varchar(128) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `rol` int(1) NOT NULL,
  `archivo_n` varchar(255) NOT NULL,
  `archivo` varchar(128) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `eliminado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `apellidos`, `correo`, `pass`, `rol`, `archivo_n`, `archivo`, `status`, `eliminado`) VALUES
(1, 'Gustavo', 'Cardenas', 'guscardenas63@gmail.com', '84a26c4612a7f9958174ee6552625282', 1, 'arctic monkeys.jpg', 'fc636e3129563f4e81b4ab885ca5a78b.jpg', 1, 0),
(2, 'Roberto', 'Lopez', 'robertolopez@gmail.com', 'c1bfc188dba59d2681648aa0e6ca8c8e', 2, 'gorillaz.jpg', '988aaedb96e9eecd31dd04d2f738d112.jpg', 1, 0),
(3, 'Olga', 'Reyes', 'olgareyes@gmail.com', 'e44d46e0bb9691cf448a9bb19391e8ab', 1, 'enjambre.jpg', '28e63d7409c30d4b75d16b5863f44b6c.jpg', 1, 0),
(4, 'Alex', 'Turner', 'alex@udg.mx', '7bccfde7714a1ebadf06c5f4cea752c1', 2, 'odisseo.jpg', 'db531d58cb7b520e613fcfd48c93bd57.jpg', 1, 0),
(9, 'Julian', 'Casablancas', 'julian@gmail.com', '338c23e8eafc19ec9236404deac0bef4', 1, 'vampire weekend.jpg', '69d879353738c84619ba8a353dcdea7b.jpg', 1, 0),
(13, 'Humberto', 'Navejas', 'humberto@gmail.com', '8767bbc52e71900d1f3a50b53196d0e2', 1, 'the voidz.jpg', '96fecd0c911e206cc23ce76f48d5b9a9.jpg', 1, 0),
(30, 'David', 'Rendon', 'salomonrendon@gmail.com', 'a1130064a86cd3d8f4a38a26b5bffcc0', 2, 'the strokes.png', '1d01ab3fcf1be9983142165cb6f66df6.png', 1, 0),
(33, 'Luis', 'Martinez', 'oscarmartinez@gmail.com', '5a12cd71bccc946b5201a94d73343c9b', 1, 'the killers.jpg', 'e3bbd769fe5c9a513bff4766d49dc4db.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `archivo` varchar(64) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `eliminado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `nombre`, `archivo`, `status`, `eliminado`) VALUES
(1, 'Banner PlayStation', '4a9788d6dcb08ad9e4cd7c33a1547ab3.jpg', 1, 0),
(2, 'Banner Xbox', '92cea9d6d69d31cf278665649ff7ff1d.jpg', 1, 0),
(3, 'Banner Nintendo Switch', 'b196018be9e10316e5624819e66ef844.png', 1, 0),
(4, 'Banner Steam', '800e1c7455b7985ce6390891630cd404.jpg', 1, 0),
(5, 'Banner Plataformas', '2082be1d3e293d9392ad82d8b6fbbee7.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `correo` varchar(64) NOT NULL,
  `contraseña` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `correo`, `contraseña`) VALUES
(1, 'Cristiano', 'bichoCR7@gmail.com', 'd15a5720d91c3730c8e8f82994ce5784'),
(2, 'Albert', 'albertHJ@gmail.com', '6c5bc43b443975b806740d8e41146479'),
(3, 'Franco', 'franco_esca@gmail.com', '6dd1411a66159040b7fff30d0097dbe4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `usuario` varchar(32) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `fecha`, `usuario`, `status`) VALUES
(1, '2022-11-28 02:44:36', 'Cristiano', 1),
(2, '2022-11-28 05:35:21', 'Cristiano', 1),
(3, '2022-11-28 05:45:38', 'Cristiano', 1),
(4, '2022-11-28 05:56:22', 'Cristiano', 1),
(5, '2022-11-28 06:57:57', 'Cristiano', 1),
(6, '2022-11-28 07:06:06', 'Cristiano', 1),
(7, '2022-11-28 07:11:43', 'Cristiano', 1),
(8, '2022-11-28 07:14:56', 'Cristiano', 1),
(9, '2022-11-28 07:21:25', 'Cristiano', 1),
(10, '2022-11-28 07:22:05', 'Cristiano', 1),
(11, '2022-11-28 08:50:21', 'Cristiano', 1),
(12, '2022-11-28 18:22:27', 'Cristiano', 1),
(13, '2022-11-28 18:25:12', 'Cristiano', 1),
(14, '2022-11-28 22:36:35', 'Cristiano', 1),
(15, '2022-11-29 03:07:59', 'Cristiano', 1),
(16, '2022-11-29 03:59:44', 'Albert', 1),
(17, '2022-11-29 04:26:51', 'Cristiano', 1),
(18, '2022-11-29 04:34:52', 'Cristiano', 1),
(19, '2022-11-29 04:38:03', 'Cristiano', 1),
(20, '2022-11-29 04:38:41', 'Albert', 1),
(21, '2022-11-29 06:19:02', 'Cristiano', 1),
(22, '2022-11-29 08:08:15', 'Franco', 1),
(23, '2022-11-29 09:06:00', 'Cristiano', 1),
(24, '2022-11-29 09:22:37', 'Albert', 1),
(27, '2022-11-29 10:22:17', 'Franco', 1),
(28, '2022-11-30 14:14:57', 'Albert', 1),
(32, '2022-11-30 18:26:09', 'Albert', 1),
(33, '2022-11-30 18:35:10', 'Albert', 1),
(34, '2022-11-30 18:43:49', 'Franco', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_productos`
--

CREATE TABLE `pedidos_productos` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos_productos`
--

INSERT INTO `pedidos_productos` (`id`, `id_pedido`, `id_producto`, `cantidad`, `precio`) VALUES
(9, 1, 3, 12, 500),
(10, 1, 1, 7, 1300),
(12, 1, 6, 3, 300),
(13, 1, 4, 2, 1000),
(15, 2, 9, 2, 1000),
(16, 3, 5, 1, 800),
(17, 4, 6, 1, 300),
(18, 4, 5, 2, 800),
(19, 4, 3, 10, 500),
(23, 5, 3, 14, 500),
(24, 6, 7, 1, 300),
(25, 7, 8, 12, 500),
(28, 8, 3, 1, 500),
(30, 8, 1, 2, 1300),
(31, 9, 1, 1, 1300),
(32, 10, 4, 1, 1000),
(33, 11, 3, 10, 500),
(34, 11, 2, 4, 1500),
(35, 12, 1, 3, 1300),
(37, 13, 4, 1, 1000),
(38, 13, 6, 4, 300),
(39, 14, 7, 5, 300),
(40, 15, 8, 1, 500),
(42, 16, 2, 2, 1500),
(45, 16, 5, 1, 800),
(46, 17, 6, 3, 300),
(47, 17, 8, 11, 500),
(48, 18, 6, 2, 300),
(50, 18, 10, 2, 800),
(51, 19, 4, 1, 1000),
(52, 20, 3, 1, 500),
(53, 21, 4, 1, 1000),
(55, 22, 6, 9, 300),
(56, 23, 1, 2, 1300),
(57, 23, 2, 5, 1500),
(59, 24, 3, 5, 500),
(63, 27, 9, 2, 1100),
(64, 28, 6, 6, 300),
(66, 28, 5, 2, 800),
(71, 32, 6, 1, 300),
(72, 33, 11, 2, 250),
(73, 34, 10, 1, 1600);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `codigo` varchar(32) NOT NULL,
  `descripcion` text NOT NULL,
  `costo` double NOT NULL,
  `stock` int(11) NOT NULL,
  `archivo_n` varchar(255) NOT NULL,
  `archivo` varchar(128) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `eliminado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `codigo`, `descripcion`, `costo`, `stock`, `archivo_n`, `archivo`, `status`, `eliminado`) VALUES
(1, 'Crash Bandicoot 4', 'PS41025', 'Videojuego de plataformas para PS4', 1300, 40, 'crash bandicoot 4.jpg', '9a58827cb4994cb75a21d134e1b99b41.jpg', 1, 0),
(2, 'Halo 5', 'XBOX2342', 'Videojuego de disparos en primera persona para Xbox One', 1500, 50, 'halo 5.jpg', '3a842b2a3418823c82ea2a701217289a.jpg', 1, 0),
(3, 'Fall Guys', 'NSWITCH3019', 'Videojuego battle royale para Nintendo Switch', 500, 30, 'fall guys.jpg', '2c79ab0bf5efb29265916552fe419f5f.jpg', 1, 0),
(4, 'Cuphead', 'PS42027', 'Videojuego de plataformas para PS4', 1000, 30, 'cuphead.jpg', '1d7b97bbb2c4dee6aad2b9aad2444e53.jpg', 1, 0),
(5, 'The Last Of Us', 'PS31987', 'Videojuego de acción, terror y aventura para PS3', 800, 78, 'the last of us.jpg', 'a16470b9607fc86560999324af7f3fe5.jpg', 1, 0),
(6, 'Ratatouille', 'PS21050', 'Videojuego de acción y aventura para PS2', 300, 83, 'ratatouille.jpg', 'a764e15993bfaaebdf5a59c40469fab1.jpg', 1, 0),
(7, 'TLOZ Breath of the Wild', 'NSWITCH2015', 'Videojuego de acción y aventura para Nintendo Switch', 1700, 50, 'TLOZ breath of the wild.jpg', '2156f03df765d91ffb1099381fdfeae1.jpg', 1, 0),
(8, 'Spyro Reignited Trilogy', 'PS41654', 'Videojuego de plataformas para PS4', 1400, 45, 'spyroRT.jpg', 'd396d4cdd34ea98392601c73e614fcc2.jpg', 1, 0),
(9, 'Hot Wheels Unleashed', 'PS46547', 'Videojuego de carreras para PS4', 1100, 38, 'hot wheels unleashed.jpg', '35ff3b28ca853065fee24b03df3e56c7.jpg', 1, 0),
(10, 'Mario Kart 8 Deluxe', 'NSWITCH2026', 'Videojuego de carreras para Nintendo Switch', 1600, 59, 'mario kart 8 deluxe.jpg', 'a8234fa69baa5059719d1af1028840eb.jpg', 1, 0),
(11, 'Portal', 'STEAM1478', 'Videojuego de lógica en primera persona para Steam ', 250, 73, 'portal.jpg', 'e7381c4a3d3ff1d9a69b7d3c4d7797ff.jpg', 1, 0),
(12, 'Gears of War 4', 'XBOX9645', 'Videojuego de disparos en tercera persona para Xbox One', 1200, 70, 'gears of war 4.jpg', 'c3bbd68006345bb2dbfaeefaecbba014.jpg', 1, 0),
(13, 'Ruben2', 'ps51832', 'Prueba', 12, 56, 'hot wheels unleashed.jpg', '35ff3b28ca853065fee24b03df3e56c7.jpg', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
