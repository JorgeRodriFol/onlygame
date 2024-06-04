-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2024 a las 19:03:08
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `onlygames`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_videojuego` int(3) NOT NULL,
  `usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_videojuego`, `usuario`) VALUES
(1, 'pacosuarez77@gmail.com'),
(3, 'pacosuarez77@gmail.com'),
(4, 'pacosuarez77@gmail.com'),
(5, 'pacosuarez77@gmail.com'),
(6, 'pacosuarez77@gmail.com'),
(8, 'pacosuarez77@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(2) NOT NULL,
  `nombre_categoria` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(4, 'accion'),
(2, 'aventuras'),
(6, 'fantasia'),
(8, 'lucha'),
(3, 'rpg'),
(7, 'sandbox'),
(5, 'supervivencia'),
(1, 'terror');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(3) NOT NULL,
  `fecha_compra` date NOT NULL,
  `usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_videojuegos`
--

CREATE TABLE `compras_videojuegos` (
  `id_compra` int(3) NOT NULL,
  `id_videojuego` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `correo` varchar(50) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `imagen` varchar(50) DEFAULT 'sin_img.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`correo`, `nombre`, `clave`, `imagen`) VALUES
('jorge@gmail.com', 'Jorge', 'jorge123', 'sin_img.png'),
('pacosuarez77@gmail.com', 'Paco', 'pacosuarez77', 'sin_img.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videojuegos`
--

CREATE TABLE `videojuegos` (
  `id_videojuego` int(3) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `saga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `videojuegos`
--

INSERT INTO `videojuegos` (`id_videojuego`, `titulo`, `precio`, `descripcion`, `imagen`, `saga`) VALUES
(1, 'Zelda Tiers Of The Kingdom', '60.00', 'Sumérgete en un mundo vasto y lleno de magia, donde te embarcarás en una épica aventura para desentr', 'ZeldaTOTK.png', 'zelda'),
(2, 'The Elder Scrolls V: SKYRIM', '45.00', 'Los dragones, largo tiempo olvidados entre los oscuros pasajes de los antiguos pergaminos, han regre', 'Skyrim.png', 'elderscrolls'),
(3, 'Avatar Frontiers of Pandora', '75.00', 'La RDA ha vuelto a Pandora y es mas peligrosa que nunca. Supone una amenaza para los clanes y los e', 'Avatar.png', 'avatar'),
(4, 'Dragon Ball Xenoverse 2', '25.55', 'Vuela por el tiempo y protege la historia de Dragon Ball', 'DBXenovers.png', 'dragonball'),
(5, 'Dragon Ball Fighter Z', '39.95', 'Conserva la esencia de la famosa saga DRAGON BALL con espectaculares combates entre poderosos luchad', 'DBFighter.png', 'dragonball'),
(6, 'Dragon Ball Z: Kakarot', '47.65', 'Revive la saga de Dragon Ball Z desde la llegada de Raditz hasta el combate final con Bu.', 'DBKakarot.png', 'dragonball'),
(7, 'God of War', '77.95', 'Dejando atras el mundo de los dioses, Kratos se aventura en las salvajes tierras nordicas con su hij', 'GoW.png', 'godofwar'),
(8, 'God of War Ragnarok', '80.95', 'Embarcate en una aventura epica y repleta de sensaciones en la que Kratos y Atreus se enfrentan a la', 'GoWRagnaro.png', 'godofwar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videojuegos_categorias`
--

CREATE TABLE `videojuegos_categorias` (
  `id_videojuego` int(3) NOT NULL,
  `id_categoria` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `videojuegos_categorias`
--

INSERT INTO `videojuegos_categorias` (`id_videojuego`, `id_categoria`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 6),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 2),
(3, 4),
(3, 5),
(4, 4),
(4, 8),
(5, 4),
(5, 8),
(6, 4),
(6, 8),
(7, 2),
(7, 4),
(7, 6),
(8, 2),
(8, 4),
(8, 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_videojuego`,`usuario`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `nombre_categoria` (`nombre_categoria`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `fk_usuario` (`usuario`);

--
-- Indices de la tabla `compras_videojuegos`
--
ALTER TABLE `compras_videojuegos`
  ADD PRIMARY KEY (`id_compra`,`id_videojuego`),
  ADD KEY `id_videojuego` (`id_videojuego`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`correo`);

--
-- Indices de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  ADD PRIMARY KEY (`id_videojuego`);

--
-- Indices de la tabla `videojuegos_categorias`
--
ALTER TABLE `videojuegos_categorias`
  ADD PRIMARY KEY (`id_videojuego`,`id_categoria`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  MODIFY `id_videojuego` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_videojuego`) REFERENCES `videojuegos` (`id_videojuego`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`correo`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`correo`);

--
-- Filtros para la tabla `compras_videojuegos`
--
ALTER TABLE `compras_videojuegos`
  ADD CONSTRAINT `compras_videojuegos_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`),
  ADD CONSTRAINT `compras_videojuegos_ibfk_2` FOREIGN KEY (`id_videojuego`) REFERENCES `videojuegos` (`id_videojuego`);

--
-- Filtros para la tabla `videojuegos_categorias`
--
ALTER TABLE `videojuegos_categorias`
  ADD CONSTRAINT `videojuegos_categorias_ibfk_1` FOREIGN KEY (`id_videojuego`) REFERENCES `videojuegos` (`id_videojuego`),
  ADD CONSTRAINT `videojuegos_categorias_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
