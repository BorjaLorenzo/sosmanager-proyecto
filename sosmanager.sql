-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2021 a las 21:13:55
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sosmanager`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asuntos_propios`
--

CREATE TABLE `asuntos_propios` (
  `dni` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desde` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasta` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_users`
--

CREATE TABLE `detalles_users` (
  `dni` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grupo` int(11) NOT NULL,
  `asuntos_propios` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalles_users`
--

INSERT INTO `detalles_users` (`dni`, `nombre`, `apellidos`, `grupo`, `asuntos_propios`) VALUES
('12345678L', 'ruben', '-', 0, 'N'),
('12345678M', 'PEPE', '-', 1, 'S'),
('2342342f', 'pepe', '-', 0, 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partes_servicio`
--

CREATE TABLE `partes_servicio` (
  `id` int(11) NOT NULL,
  `nombre_trabajador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni_trabajador` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_incidencia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `puesto` int(11) NOT NULL,
  `nombre_victima` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `patologia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `procedencia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ambulancia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `partes_servicio`
--

INSERT INTO `partes_servicio` (`id`, `nombre_trabajador`, `dni_trabajador`, `fecha`, `hora`, `descripcion`, `tipo_incidencia`, `puesto`, `nombre_victima`, `patologia`, `procedencia`, `ambulancia`, `activo`) VALUES
(2, 'pepe', '12345678M', '2021-11-19', '20:16:47', 'corte + betadine', 'CURA', 3, 'farrukito diaz', 'corte en el pie izquierdo', 'sevilla', 'NO', 'S'),
(3, 'ruben', '12345678L', '2021-11-08', '10:45:47', 'pez arana + agua caliente', 'CURA', 1, 'Angela miranda', 'pez arana', 'almonte', 'NO', 'S'),
(4, 'borja', '44243198F', '2021-10-12', '17:20:28', 'desmayo por subida de tension', 'AYUDA', 7, 'Alfonso perez', 'subida de tension', 'madrid', 'SI', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `rol`, `dni`, `activo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'borja', 'borjalb98@gmail.com', 'A', '44243198F', 'S', NULL, '$2y$10$akCpg8JUx9VcCWwlmojGgukW/GifPTJYYw/DRckXVZ0RJtYctPFWO', NULL, '2021-10-22 14:23:58', '2021-10-22 14:23:58'),
(5, 'PEPE', 'elsuyo@gmail.com', 'P', '12345678M', 'S', NULL, '$2y$10$4/OTmueze7fmqDoSkcEzsew2Vsf5o8vhuyh8GOFGlKNZZLixYzo3.', NULL, '2021-11-07 13:35:55', '2021-11-07 13:35:55'),
(6, 'ruben', 'nadie@gmail.com', 'P', '12345678L', 'S', NULL, '$2y$10$KjnXocxeoUik4llKYL/QB.BrTBlTpNfLyGgMIlRXCe/h3aoog/6nS', NULL, '2021-11-07 16:00:15', '2021-11-07 16:00:15');

--
-- Disparadores `users`
--
DELIMITER $$
CREATE TRIGGER `insert_detalles` AFTER INSERT ON `users` FOR EACH ROW BEGIN
DECLARE nombre_old text;
DECLARE dni_old text;

SET nombre_old=(SELECT name FROM users WHERE id = (SELECT MAX(users.id) FROM users));
SET dni_old=(SELECT dni FROM users WHERE id = (SELECT MAX(users.id) FROM users));


INSERT INTO `detalles_users`(`dni`, `nombre`, `apellidos`, `grupo`, `asuntos_propios`) VALUES (dni_old,nombre_old,'-','-','S');
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalles_users`
--
ALTER TABLE `detalles_users`
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `partes_servicio`
--
ALTER TABLE `partes_servicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `dni_unico` (`dni`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `partes_servicio`
--
ALTER TABLE `partes_servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
