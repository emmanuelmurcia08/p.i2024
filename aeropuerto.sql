-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2024 a las 23:37:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aeropuerto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviones`
--

CREATE TABLE `aviones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `capacidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aviones`
--

INSERT INTO `aviones` (`id`, `nombre`, `modelo`, `capacidad`) VALUES
(1, '', '', 0),
(2, 'TBOING771', '2023', 60),
(3, 'boing767', '2024', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `vuelos_id` int(11) NOT NULL,
  `numero_tarjeta` varchar(16) NOT NULL,
  `cvv` varchar(4) NOT NULL,
  `fecha_expiracion` varchar(5) NOT NULL,
  `fecha_compra` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `vuelo_id` int(11) NOT NULL,
  `numero_tarjeta` varchar(20) NOT NULL,
  `cvv` varchar(5) NOT NULL,
  `fecha_expiracion` varchar(5) NOT NULL,
  `fecha_compra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `vuelo_id`, `numero_tarjeta`, `cvv`, `fecha_expiracion`, `fecha_compra`) VALUES
(1, 1, '265191', '123', '10/25', '0000-00-00'),
(2, 3, '1616516165', '247', '10/26', '0000-00-00'),
(3, 3, '1616516165', '247', '10/26', '0000-00-00'),
(4, 1, '1234646546', '274', '10/26', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pilotos`
--

CREATE TABLE `pilotos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `experiencia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pilotos`
--

INSERT INTO `pilotos` (`id`, `nombre`, `edad`, `experiencia`) VALUES
(1, 'Andres', 35, '3'),
(2, 'Emma', 35, '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(1000) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasena`, `rol`) VALUES
(5, 'bananin', 'bananin123@gmail.com', '0321', 'Pasajero'),
(6, 'Ave', 'alias@gmail.com', '1234', ''),
(7, 'tesorito', 'tesorito@gmail.com', '1234', 'administrador'),
(8, 'lina', 'lamejor@hotmail.com', '1234', ''),
(9, 'profe', 'profe@gmail.com', '0123', ''),
(11, 'litlle', 'little@gmail.com', '$2y$10$GllJPjlE3Rh/yyejnKXH/OvctPmWC1J63v9ggyXSRUjkTEtsPMpny', 'Pasajero'),
(12, 'mia khalifa', 'pornhub@gmail.com', 'agudelo19', ''),
(13, 'Samir Vidal', 'samir@gmail.com', '$2y$10$9d.5u9Aj9Yh4avqAcxTL7.e6hnaXUlXmE5HnkGbgjZsBhQacKvKqm', 'Pasajero'),
(14, 'bananin', 'bananin@gmail.com', '$2y$10$mEGxyTL9pEmueiXhTQDiHOhyXPXHlwLMI5H9vQnKqMULNLhxct9lS', 'Pasajero'),
(15, 'sebasespaña', 'espana@gmail.com', '1234', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos`
--

CREATE TABLE `vuelos` (
  `id` int(50) NOT NULL,
  `numvuelo` varchar(50) NOT NULL,
  `origen` varchar(100) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `horasalida` time NOT NULL,
  `horallegada` time NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vuelos`
--

INSERT INTO `vuelos` (`id`, `numvuelo`, `origen`, `destino`, `horasalida`, `horallegada`, `precio`) VALUES
(1, '002', 'Medellin', 'Pasto', '10:00:00', '11:30:00', 50.00),
(2, '002', 'Medellin', 'Pasto', '10:00:00', '11:30:00', 50.00),
(3, '003', 'Cali', 'Miami', '01:00:00', '09:30:00', 100.00),
(4, '', '', '', '00:00:00', '00:00:00', 0.00),
(5, '', '', '', '00:00:00', '00:00:00', 0.00),
(6, '', '', '', '00:00:00', '00:00:00', 0.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aviones`
--
ALTER TABLE `aviones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vuelo_id` (`vuelos_id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vuelo_id` (`vuelo_id`);

--
-- Indices de la tabla `pilotos`
--
ALTER TABLE `pilotos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aviones`
--
ALTER TABLE `aviones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pilotos`
--
ALTER TABLE `pilotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`vuelos_id`) REFERENCES `vuelos` (`id`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`vuelo_id`) REFERENCES `vuelos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
