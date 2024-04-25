-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2024 a las 20:12:23
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
-- Estructura de tabla para la tabla `videojuegos`
--

CREATE TABLE `videojuegos` (
  `id_videojuego` int(3) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `videojuegos`
--

INSERT INTO `videojuegos` (`id_videojuego`, `titulo`, `precio`, `descripcion`, `imagen`) VALUES
(1, 'Zelda Tiers Of The Kingdom', '60.00', 'Sumérgete en un mundo vasto y lleno de magia, donde te embarcarás en una épica aventura para desentr', 'ZeldaTOTK.png'),
(2, 'The Elder Scrolls V: SKYRIM', '45.00', 'Los dragones, largo tiempo olvidados entre los oscuros pasajes de los antiguos pergaminos, han regre', 'Skyrim.png'),
(3, 'Avatar Frontiers of Pandora', '75.00', 'La RDA ha vuelto a Pandora y es mas peligrosa que nunca. Supone ana amenazao para los clanes y los e', 'Avatar.png'),
(4, 'Dragon Ball Xenoverse 2', '25.55', 'Vuela por el tiempo y protege la historia de Dragon Ball', 'DBXenovers.png'),
(5, 'Dragon Ball Fighter Z', '39.95', 'Conserva la esencia de la famosa saga DRAGON BALL con espectaculares combates entre poderosos luchad', 'DBFighter.png'),
(6, 'Dragon Ball Z: Kakarot', '47.65', 'Revive la saga de Dragon Ball Z desde la llegada de Raditz hasta el combate final con Bu.', 'DBKakarot.png'),
(7, 'God of War', '77.95', 'Dejando atras el mundo de los dioses, Kratos se aventura en las salvajes tierras nordicas con su hij', 'GoW.png'),
(8, 'God of War Ragnarok', '80.95', 'Embarcate en una aventura epica y repleta de sensaciones en la que Kratos y Atreus se enfrentan a la', 'GoWRagnaro.png');

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
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `nombre_categoria` (`nombre_categoria`);

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
-- AUTO_INCREMENT de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  MODIFY `id_videojuego` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

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
