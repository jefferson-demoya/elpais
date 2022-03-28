-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-03-2022 a las 20:17:39
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_el_pais`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones`
--

CREATE TABLE `acciones` (
  `id` int(6) NOT NULL,
  `id_tarea` int(6) NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `accion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` int(12) NOT NULL,
  `estado` varchar(10) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `acciones`
--

INSERT INTO `acciones` (`id`, `id_tarea`, `correo`, `accion`, `fecha`, `estado`) VALUES
(19, 19, 'admin@hotmail.com', 'Nueva tarea', 2022, 'Por hacer'),
(20, 19, 'admin@hotmail.com', 'Tarea 2', 2022, 'Realizado'),
(21, 19, 'admin@hotmail.com', 'Tarea 3', 2022, 'proceso'),
(23, 20, 'admin@hotmail.com', 'tarea titulo 2', 2022, 'Por hacer'),
(24, 20, 'admin@hotmail.com', 'tarea para segunda lista', 2022, 'Realizado'),
(25, 21, 'user@hotmail.com', 'nuevos datos de lista usuario', 2022, 'Por hacer'),
(26, 21, 'user@hotmail.com', 'realizar la compra', 2022, 'Por hacer'),
(27, 21, 'user@hotmail.com', 'ver todo', 2022, 'Por hacer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(4) NOT NULL,
  `creador` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `titulo` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `creador`, `titulo`, `fecha`, `estado`, `descripcion`) VALUES
(2, 'user@hotmail.com', 'tarea 2', '2022-03-27', 'terminada', '2'),
(4, 'user@hotmail.com', 'Tarea 4', '2022-03-23', 'Terminado', 'descripcion 4'),
(19, 'admin@hotmail.com', 'Titulo de lista 1', '2022-03-28', 'Nuevo', 'Descripcion de lista 1'),
(20, 'admin@hotmail.com', 'titulo 2', '2022-03-28', 'Nuevo', 'descripcion 2'),
(21, 'user@hotmail.com', 'lista de usuario', '2022-03-28', 'Nuevo', 'texto de prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(5) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `correo`, `cargo`, `password`) VALUES
(1, 'Jefferson', 'De moya', 'admin@hotmail.com', '1', '$2y$15$ELnajwgjM0Rn0Npfr3zB5u.FbbjJ.ICdUieKiqsCPdUG1K33Aik4W'),
(2, 'John', 'Doe', 'user@hotmail.com', '2', '$2y$15$ZI/msy.V/x9vzYiBGIsuzuNX/zSQxHAfJ/QfvDSEDRSa/wGC3fFn2'),
(14, 'Juana', 'Rosas', 'user2@hotmail.com', '2', '$2y$15$0LniFkdzvwHeEadZExPOBeQHDhT4hKp.oAKrxAfc7mw9GYI/XNTKa'),
(15, 'Ellionor', 'Gutts', 'user3@hotmail.com', '2', '$2y$15$GE7g/bAmXp8/4KpjLTycjua8UP.XQR8rIueflekXz3kxaFTMM7wpS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acciones`
--
ALTER TABLE `acciones`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
