-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-12-2019 a las 20:48:33
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vitalea`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(255) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2019-12-20-222618', 'App\\Database\\Migrations\\Resultado', 'default', 'App', 1576883157, 1),
(2, '2019-12-20-222626', 'App\\Database\\Migrations\\Usuario', 'default', 'App', 1576883157, 1),
(3, '2019-12-20-222634', 'App\\Database\\Migrations\\Respuesta', 'default', 'App', 1576883157, 1),
(4, '2019-12-20-222642', 'App\\Database\\Migrations\\Pregunta', 'default', 'App', 1576883157, 1),
(5, '2019-12-20-222650', 'App\\Database\\Migrations\\Total', 'default', 'App', 1576883157, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pregunta`
--

CREATE TABLE `tbl_pregunta` (
  `PRG_Id_Pregunta` int(20) UNSIGNED NOT NULL,
  `PRG_Nombre_Pregunta` varchar(200) NOT NULL,
  `PRG_Respuesta_A_Id` int(20) UNSIGNED NOT NULL,
  `PRG_Respuesta_B_Id` int(20) UNSIGNED NOT NULL,
  `PRG_Respuesta_No_Favorable_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_pregunta`
--

INSERT INTO `tbl_pregunta` (`PRG_Id_Pregunta`, `PRG_Nombre_Pregunta`, `PRG_Respuesta_A_Id`, `PRG_Respuesta_B_Id`, `PRG_Respuesta_No_Favorable_Id`) VALUES
(1, '¿Te alimentas bien?', 1, 2, 2),
(2, '¿Comes a las horas que son?', 1, 2, 2),
(3, 'Comes cuando:', 3, 4, 3),
(4, 'Sin hacer ejercicio físico, ¿Últimamente has perdido de peso?', 1, 2, 1),
(5, 'Debido a una mala alimentación ¿Ha aumentado tu peso?', 1, 2, 1),
(6, '¿Eres vegetariano o vegano?', 1, 2, 1),
(7, '¿Eliminaste la carne por variedad de frutas y vegetales en todas sus formas y colores?', 1, 2, 1),
(8, '¿Por las mañanas te levantas cansado (a)?', 1, 2, 1),
(9, '¿Has tenido somnolencia o mayor necesidad de dormir?', 1, 2, 1),
(10, '¿Últimamente has sentido molestias digestivas como dolor o ardor abdominal?', 1, 2, 1),
(11, '¿Varias veces a la semana te duele la cabeza o el estómago?', 1, 2, 1),
(12, '¿Te afecta el gluten?', 1, 2, 1),
(13, '¿Te afectan los lácteos?', 1, 2, 1),
(14, '¿Sirve?', 1, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_respuesta`
--

CREATE TABLE `tbl_respuesta` (
  `RTA_Id_Respuesta` int(20) UNSIGNED NOT NULL,
  `RTA_Nombre_Respuesta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_respuesta`
--

INSERT INTO `tbl_respuesta` (`RTA_Id_Respuesta`, `RTA_Nombre_Respuesta`) VALUES
(1, 'Si'),
(2, 'No'),
(3, 'Cuando Tienes Tiempo'),
(4, 'Cuando Prefieres'),
(5, 'Tal vez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_resultado`
--

CREATE TABLE `tbl_resultado` (
  `RST_Id_Resultado` int(20) UNSIGNED NOT NULL,
  `RST_Nombre_Resultado` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_resultado`
--

INSERT INTO `tbl_resultado` (`RST_Id_Resultado`, `RST_Nombre_Resultado`) VALUES
(1, 'Chequeo Nutricional'),
(2, 'Chequeo Vegetariano'),
(3, 'Chequeo Celiaco'),
(4, 'Chequeo Express'),
(5, 'Chequeo General');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_rol`
--

CREATE TABLE `tbl_rol` (
  `RL_Id_Rol` bigint(20) NOT NULL,
  `RL_Nombre_Rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_rol`
--

INSERT INTO `tbl_rol` (`RL_Id_Rol`, `RL_Nombre_Rol`) VALUES
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_total`
--

CREATE TABLE `tbl_total` (
  `TTL_Id_Total` int(20) UNSIGNED NOT NULL,
  `TTL_Usuario_Id` int(20) UNSIGNED NOT NULL,
  `TTL_Pregunta_Id` int(20) UNSIGNED NOT NULL,
  `TTL_Respuesta_Id` bigint(20) NOT NULL,
  `TTL_Resultado_Id` int(20) UNSIGNED NOT NULL,
  `TTL_Resultado_Recomendado_Id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_total`
--

INSERT INTO `tbl_total` (`TTL_Id_Total`, `TTL_Usuario_Id`, `TTL_Pregunta_Id`, `TTL_Respuesta_Id`, `TTL_Resultado_Id`, `TTL_Resultado_Recomendado_Id`) VALUES
(157, 2, 1, 1, 1, 1),
(158, 2, 2, 2, 1, 1),
(159, 2, 3, 3, 1, 1),
(160, 2, 4, 2, 1, 1),
(161, 2, 5, 1, 1, 1),
(162, 2, 6, 2, 2, 1),
(163, 2, 7, 1, 2, 1),
(164, 2, 8, 1, 2, 1),
(165, 2, 9, 2, 2, 1),
(166, 2, 10, 2, 3, 1),
(167, 2, 11, 1, 3, 1),
(168, 2, 12, 2, 3, 1),
(169, 2, 13, 2, 3, 1),
(170, 3, 1, 2, 1, 4),
(171, 3, 2, 1, 1, 4),
(172, 3, 3, 4, 1, 4),
(173, 3, 4, 1, 1, 4),
(174, 3, 5, 2, 1, 4),
(175, 3, 6, 2, 2, 4),
(176, 3, 7, 2, 2, 4),
(177, 3, 8, 2, 2, 4),
(178, 3, 9, 2, 2, 4),
(179, 3, 10, 2, 3, 4),
(180, 3, 11, 2, 3, 4),
(181, 3, 12, 2, 3, 4),
(182, 3, 13, 2, 3, 4),
(183, 3, 14, 2, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `USR_Id_Usuario` int(20) UNSIGNED NOT NULL,
  `USR_Nombres_Usuario` varchar(100) NOT NULL,
  `USR_Correo_Usuario` varchar(255) NOT NULL,
  `USR_Telefono_Usuario` varchar(20) NOT NULL,
  `USR_Nombre_Usuario` varchar(200) NOT NULL,
  `USR_Clave_Usuario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`USR_Id_Usuario`, `USR_Nombres_Usuario`, `USR_Correo_Usuario`, `USR_Telefono_Usuario`, `USR_Nombre_Usuario`, `USR_Clave_Usuario`) VALUES
(1, 'Vitalea', 'algun.correo@gmail.com', '3102468596', 'vitalea', '1234'),
(2, 'alirio mendez', 'alirimendez@hotmail.com', '3108799688', 'alirimendez', 'e9bf6586f348c563b116f45575b0a0ef7e5db08bb1d56517b7f12e875b4c3aff47903b9d053de5b30c29b1e24c66f8f012b273941f7da7b8f98e5902e3418117mlFY+bGdxbmRKwHxBCQFncxWtOGUzh8/b+w/rxmVIcY='),
(3, 'Yonathan', 'yonathan.inkdigital@gmail.com', '3102144993', 'yonathan.inkdigital', 'bfbb017117c0859aaae6a18bc2dca6f770784eab233882377d35d067e960b23362c25300886063650e7e1dc5fd886e1bd2071a606730154c19b20caddd79bfb8LwPP9zqySNeUO1WD+hrZL1i7ArsNADwyoVT+2PC13iWnt6khMmgD70qIcI+gf7+Q');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario_rol`
--

CREATE TABLE `tbl_usuario_rol` (
  `USR_RL_Id` bigint(20) NOT NULL,
  `USR_RL_Usuario_Id` bigint(20) NOT NULL,
  `USR_RL_Rol_Id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuario_rol`
--

INSERT INTO `tbl_usuario_rol` (`USR_RL_Id`, `USR_RL_Usuario_Id`, `USR_RL_Rol_Id`) VALUES
(1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_pregunta`
--
ALTER TABLE `tbl_pregunta`
  ADD PRIMARY KEY (`PRG_Id_Pregunta`),
  ADD KEY `TBL_Pregunta_PRG_Respuesta_A_Id_foreign` (`PRG_Respuesta_A_Id`),
  ADD KEY `TBL_Pregunta_PRG_Respuesta_B_Id_foreign` (`PRG_Respuesta_B_Id`);

--
-- Indices de la tabla `tbl_respuesta`
--
ALTER TABLE `tbl_respuesta`
  ADD PRIMARY KEY (`RTA_Id_Respuesta`);

--
-- Indices de la tabla `tbl_resultado`
--
ALTER TABLE `tbl_resultado`
  ADD PRIMARY KEY (`RST_Id_Resultado`);

--
-- Indices de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  ADD PRIMARY KEY (`RL_Id_Rol`);

--
-- Indices de la tabla `tbl_total`
--
ALTER TABLE `tbl_total`
  ADD PRIMARY KEY (`TTL_Id_Total`),
  ADD KEY `TBL_Total_TTL_Usuario_Id_foreign` (`TTL_Usuario_Id`),
  ADD KEY `TBL_Total_TTL_Pregunta_Id_foreign` (`TTL_Pregunta_Id`),
  ADD KEY `TBL_Total_TTL_Resultado_Id_foreign` (`TTL_Resultado_Id`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`USR_Id_Usuario`);

--
-- Indices de la tabla `tbl_usuario_rol`
--
ALTER TABLE `tbl_usuario_rol`
  ADD PRIMARY KEY (`USR_RL_Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_pregunta`
--
ALTER TABLE `tbl_pregunta`
  MODIFY `PRG_Id_Pregunta` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tbl_respuesta`
--
ALTER TABLE `tbl_respuesta`
  MODIFY `RTA_Id_Respuesta` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_resultado`
--
ALTER TABLE `tbl_resultado`
  MODIFY `RST_Id_Resultado` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  MODIFY `RL_Id_Rol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_total`
--
ALTER TABLE `tbl_total`
  MODIFY `TTL_Id_Total` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `USR_Id_Usuario` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario_rol`
--
ALTER TABLE `tbl_usuario_rol`
  MODIFY `USR_RL_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_pregunta`
--
ALTER TABLE `tbl_pregunta`
  ADD CONSTRAINT `TBL_Pregunta_PRG_Respuesta_A_Id_foreign` FOREIGN KEY (`PRG_Respuesta_A_Id`) REFERENCES `tbl_respuesta` (`RTA_Id_Respuesta`),
  ADD CONSTRAINT `TBL_Pregunta_PRG_Respuesta_B_Id_foreign` FOREIGN KEY (`PRG_Respuesta_B_Id`) REFERENCES `tbl_respuesta` (`RTA_Id_Respuesta`);

--
-- Filtros para la tabla `tbl_total`
--
ALTER TABLE `tbl_total`
  ADD CONSTRAINT `TBL_Total_TTL_Pregunta_Id_foreign` FOREIGN KEY (`TTL_Pregunta_Id`) REFERENCES `tbl_pregunta` (`PRG_Id_Pregunta`),
  ADD CONSTRAINT `TBL_Total_TTL_Resultado_Id_foreign` FOREIGN KEY (`TTL_Resultado_Id`) REFERENCES `tbl_resultado` (`RST_Id_Resultado`),
  ADD CONSTRAINT `TBL_Total_TTL_Usuario_Id_foreign` FOREIGN KEY (`TTL_Usuario_Id`) REFERENCES `tbl_usuario` (`USR_Id_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
