-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2026 a las 02:08:56
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
-- Base de datos: `pagina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('77de68daecd823babbb58edb1c8e14d7106e83bb', 'i:1;', 1780247208),
('77de68daecd823babbb58edb1c8e14d7106e83bb:timer', 'i:1780247208;', 1780247208),
('livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6', 'i:1;', 1780341429),
('livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6:timer', 'i:1780341429;', 1780341429);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas_servicio`
--

CREATE TABLE `consultas_servicio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `servicio_id` bigint(20) UNSIGNED DEFAULT NULL,
  `servicio_nombre` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `vehiculo` varchar(255) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `estado` enum('nuevo','en_revision','respondido') NOT NULL DEFAULT 'nuevo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `asunto` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `estado` enum('nuevo','leido','respondido') NOT NULL DEFAULT 'nuevo',
  `ip` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales`
--

CREATE TABLE `locales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `whatsapp` varchar(30) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `horario` varchar(255) DEFAULT NULL,
  `mapa_embed` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `locales`
--

INSERT INTO `locales` (`id`, `nombre`, `ciudad`, `direccion`, `telefono`, `whatsapp`, `email`, `horario`, `mapa_embed`, `imagen`, `activo`, `orden`, `created_at`, `updated_at`) VALUES
(2, 'Sucursal Baños del Inca', 'Cajamarca', 'Carretera Baños del Inca km 3.5', '(076) 789-012', NULL, NULL, 'Lun–Vie: 8:00-18:00, Sáb: 8:00-13:00', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3814.3374242017444!2d-78.479863725175!3d-7.164819792839886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91b25b278684cc45%3A0x16d51b77045f9ccb!2sMSA%20Automotriz%20-%20Ba%C3%B1os%20del%20Inca!5e1!3m2!1ses-419!2spe!4v1780358524850!5m2!1ses-419!2spe\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'img/locales/baños.jfif', 1, 2, NULL, '2026-06-02 05:02:22'),
(3, 'MSA Jesús María', 'Lima', 'Av. Fco. Javier Mariátegui #789, Jesús María', '(076) 340 000', NULL, 'contacto@msaautomotriz.com', NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3759.2732731800447!2d-77.0457402251098!3d-12.076783088162315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8f0439ab81b%3A0xa7f941ebb2e0fd47!2sMSA%20Automotriz%20-%20Lima!5e1!3m2!1ses-419!2spe!4v1780358615018!5m2!1ses-419!2spe\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL, 1, 1, '2026-06-01 20:50:26', '2026-06-02 05:04:01'),
(4, 'MSA Cajamarca', 'Cajamarca', 'Av. Vía de Evitamiento Norte 334', '(076) 340 000', NULL, 'contacto@msaautomotriz.com', NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3814.506173747464!2d-78.51251339999999!3d-7.144626799999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91b25af304711173%3A0x9a12d6bed91d82b1!2sMSA%20Automotriz!5e1!3m2!1ses-419!2spe!4v1780358568630!5m2!1ses-419!2spe\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'img/locales/cajamarca.jfif', 1, 2, '2026-06-01 20:50:26', '2026-06-02 05:03:08'),
(5, 'MSA Piura', 'Piura', 'Av. Sanchez Cerro Mza 224 - Lote 2A y 2B, Zona Industrial', '(076) 340 000', NULL, 'contacto@msaautomotriz.com', NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3828.609173072782!2d-80.64258282519202!3d-5.187682394789837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x904a1a9b39fc521d%3A0xc47583208090e18c!2sMsa%20Automotriz%20Piura!5e1!3m2!1ses-419!2spe!4v1780358478871!5m2!1ses-419!2spe\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'img/locales/piura.jfif', 1, 3, '2026-06-01 20:50:26', '2026-06-02 05:01:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `imagen_hero` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `slug`, `descripcion`, `imagen`, `imagen_hero`, `activo`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'BAIC', 'baic', 'SUVs modernos al mejor precio', 'img/baic/baic_logo.jfif', 'img/baic/baner.jfif', 1, 1, NULL, '2026-06-02 02:25:56'),
(2, 'Chevrolet', 'chevrolet', 'Autos y camionetas de confianza', 'img/chevrolet/chevrolet_logo.jfif', 'img/chevrolet/baner.jfif', 1, 2, NULL, '2026-06-02 02:01:52'),
(3, 'Dongfeng', 'dongfeng', 'Tecnología y modernidad en pick-ups', 'img/dongfeng/dongfeng_logo.jfif', 'img/dongfeng/baner.jfif', 1, 3, NULL, '2026-06-02 02:40:52'),
(4, 'Forland', 'forland', 'Camiones ligeros y furgones confiables', 'img/forland/forland_logo.jfif', NULL, 1, 4, NULL, '2026-05-31 20:28:07'),
(5, 'Foton', 'foton', 'Vehículos comerciales y de carga', 'img/foton/foton_logo.jfif', NULL, 1, 5, NULL, '2026-05-31 20:28:53'),
(6, 'Honda Autos', 'honda-autos', 'Autos y camionetas Honda', 'img/honda_autos/hondaau_logo.jfif', NULL, 1, 6, NULL, '2026-05-31 20:29:28'),
(7, 'Honda Motos', 'honda-motos', 'Motos Honda', 'img/honda_motos/hondamo_logo.jfif', NULL, 1, 7, NULL, '2026-05-31 20:30:25'),
(8, 'Isuzu Camiones', 'isuzu-camiones', 'Camiones Isuzu', 'img/isuzu_camiones/isuzuca_logo.jfif', NULL, 1, 8, NULL, '2026-05-31 20:31:01'),
(9, 'Isuzu Pick-Ups', 'isuzu-pick-ups', 'Pick-Ups Isuzu', 'img/isuzu_pick_ups/isuzupic_logo.jfif', NULL, 1, 9, NULL, '2026-05-31 20:37:38'),
(10, 'Omoda & Jaecoo', 'omoda-jaecoo', 'Innovación y diseño', 'img/omoda_jaecoo/omoda_logo.jfif', NULL, 1, 10, NULL, '2026-05-31 20:36:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_05_26_101514_create_marcas_table', 1),
(5, '2026_05_26_101515_create_modelos_table', 1),
(6, '2026_05_26_101516_create_contactos_table', 1),
(7, '2026_05_26_101517_create_reclamacions_table', 1),
(8, '2026_05_26_200000_update_reclamaciones_add_fields', 1),
(9, '2026_05_26_210000_create_servicios_table', 1),
(10, '2026_05_26_210001_create_locales_table', 1),
(11, '2026_05_26_224133_create_consultas_servicio_table', 1),
(12, '2026_05_27_223718_create_transporte_renting_table', 1),
(13, '2026_05_28_000001_add_precio_dolares_to_modelos_table', 1),
(14, '2026_05_28_000002_add_tipo_to_modelos_table', 1),
(15, '2026_05_29_000001_create_versiones_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE `modelos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marca_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `precio` decimal(12,2) DEFAULT NULL,
  `precio_dolares` decimal(12,2) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `destacado` tinyint(1) NOT NULL DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`id`, `marca_id`, `nombre`, `slug`, `descripcion`, `imagen`, `precio`, `precio_dolares`, `tipo`, `destacado`, `activo`, `orden`, `created_at`, `updated_at`) VALUES
(1, 2, 'Captiva EV', 'captiva-ev', NULL, 'img/chevrolet/captiva_cv.jfif', 122063.00, 32990.00, 'Eléctrico', 0, 1, 1, '2026-05-31 22:08:58', '2026-05-31 23:03:53'),
(2, 2, 'Spark EUV', 'spark-euv-electrico', NULL, 'img/chevrolet/spark_euv.jfif', 92463.00, 24990.00, 'Eléctrico', 1, 1, 2, '2026-05-31 22:08:58', '2026-05-31 23:04:04'),
(3, 2, 'Captiva Híbrida', 'captiva-phev', NULL, 'img/chevrolet/captiva_hibrida.jfif', 114663.00, 30990.00, 'Híbrido', 1, 1, 1, '2026-05-31 22:08:58', '2026-05-31 23:04:16'),
(5, 2, 'Sail Sedán', 'sail-sedan', NULL, 'img/chevrolet/sail_sedan.jfif', 48063.00, 12990.00, 'Auto', 0, 1, 1, '2026-05-31 22:11:05', '2026-05-31 23:04:26'),
(6, 2, 'Groove', 'groove-suv-deportivo', NULL, 'img/chevrolet/groove.jfif', 57313.00, 15490.00, 'Camioneta', 0, 1, 1, '2026-05-31 22:11:05', '2026-05-31 22:43:01'),
(7, 2, 'Tracker', 'tracker-turbo-suv', NULL, 'img/chevrolet/tracker.jfif', 79513.00, 21490.00, 'Camioneta', 0, 1, 2, '2026-05-31 22:11:05', '2026-05-31 22:43:09'),
(8, 2, 'Captiva XL', 'captiva-camioneta-suv', NULL, 'img/chevrolet/captiva_xl.jfif', 65823.00, 17790.00, 'Camioneta', 0, 1, 3, '2026-05-31 22:11:05', '2026-05-31 22:44:37'),
(9, 2, 'Traverse', 'traverse-suv', NULL, 'img/chevrolet/traverse.jfif', 207163.00, 55990.00, 'Camioneta', 0, 1, 4, '2026-05-31 22:11:05', '2026-05-31 22:49:48'),
(10, 2, 'Tahoe', 'tahoe-camioneta', NULL, 'img/chevrolet/tahoe.jfif', 321863.00, 86990.00, 'Camioneta', 0, 1, 5, '2026-05-31 22:11:05', '2026-05-31 23:01:52'),
(11, 2, 'Suburban', 'suburban-suv', NULL, 'img/chevrolet/suburban.jfif', 351463.00, 94990.00, 'Camioneta', 0, 1, 6, '2026-05-31 22:11:05', '2026-05-31 23:03:15'),
(12, 2, 'Montana', 'montana', NULL, 'img/chevrolet/montana.jfif', 95423.00, 25790.00, 'Pickup', 0, 1, 1, '2026-05-31 22:11:05', '2026-05-31 23:05:47'),
(13, 2, 'Colorado', 'colorado', NULL, 'img/chevrolet/colorado.jfif', 140563.00, 37990.00, 'Pickup', 0, 1, 2, '2026-05-31 22:11:05', '2026-05-31 23:11:32'),
(14, 2, 'Silverado', 'silverado-4x4', NULL, 'img/chevrolet/silverado.jfif', 236763.00, 63990.00, 'Pickup', 0, 1, 3, '2026-05-31 22:11:05', '2026-05-31 23:34:11'),
(15, 2, 'N400 Max', 'n400-max-van', NULL, 'img/chevrolet/n400_max.jfif', 48433.00, 13090.00, 'Van', 0, 1, 1, '2026-05-31 22:11:05', '2026-05-31 23:37:14'),
(16, 2, 'N400 Move', 'n400-move', NULL, 'img/chevrolet/n400_move.jfif', 49173.00, 13290.00, 'Van', 0, 1, 0, '2026-05-31 22:11:05', '2026-05-31 23:37:32'),
(17, 6, 'WR-V', 'wr-v', NULL, 'img/honda_autos/wr_v.jfif', 89666.00, 25990.00, 'SUV', 1, 1, 1, NULL, '2026-06-01 00:03:59'),
(18, 6, 'HR-V 2026', 'hr-v-2026', NULL, 'img/honda_autos/hr_v.jfif', 103466.00, 29990.00, 'SUV', 0, 1, 2, NULL, '2026-05-31 23:52:11'),
(19, 6, 'New BR-V SEVEN', 'brv-seven', NULL, 'img/honda_autos/br_v.jfif', 103466.00, 29990.00, 'SUV', 0, 1, 3, NULL, '2026-06-01 00:03:33'),
(20, 6, 'ZR-V', 'zr-v', NULL, 'img/honda_autos/zr_v.jfif', 110366.00, 31990.00, 'SUV', 0, 1, 4, NULL, '2026-05-31 23:56:22'),
(21, 6, 'CR-V 2026', 'cr-v-2026', NULL, 'img/honda_autos/cr_v.jfif', 141416.00, 40990.00, 'SUV', 0, 1, 5, NULL, '2026-05-31 23:56:09'),
(22, 6, 'CR-V HYBRID', 'cr-v-hybrid', NULL, 'img/honda_autos/cr_v_ah.jfif', 172466.00, 49990.00, 'SUV', 0, 1, 6, NULL, '2026-05-31 23:57:31'),
(23, 6, 'PILOT 2025', 'pilot-2025', NULL, 'img/honda_autos/pilot.jfif', 200066.00, 57990.00, 'SUV', 0, 1, 7, NULL, '2026-05-31 23:58:06'),
(29, 9, 'Isuzu Pickup Force', 'isuzu-pickup-force', NULL, 'img/isuzu_pick_ups/force.jfif', NULL, NULL, 'Pickup', 0, 1, 1, NULL, '2026-06-01 00:12:16'),
(30, 9, 'Isuzu Pickup Power', 'isuzu-pickup-power', NULL, 'img/isuzu_pick_ups/power.jfif', NULL, NULL, 'Pickup', 0, 1, 2, NULL, '2026-06-01 00:12:46'),
(31, 9, 'Isuzu Pickup Adventure', 'isuzu-pickup-adventure', NULL, 'img/isuzu_pick_ups/adventure.jfif', NULL, NULL, 'Pickup', 0, 1, 3, NULL, '2026-06-01 00:13:02'),
(32, 9, 'Isuzu Pickup Adventure Limited', 'isuzu-pickup-adventure-limited', NULL, 'img/isuzu_pick_ups/adventure_limited.jfif', NULL, NULL, 'Pickup', 0, 1, 4, NULL, '2026-06-01 00:13:23'),
(33, 10, 'OMODA C5', 'omoda-c5', NULL, 'img/omoda_jaecoo/c5.jfif', 47215.00, 13490.00, 'SUV', 0, 1, 1, NULL, '2026-06-01 01:21:56'),
(34, 10, 'OMODA C5 SHS', 'omoda-c5-shs', NULL, 'img/omoda_jaecoo/c5_shs.jfif', 76265.00, 21790.00, 'SUV', 0, 1, 2, NULL, '2026-06-01 01:21:46'),
(35, 10, 'OMODA C7', 'omoda-c7', NULL, 'img/omoda_jaecoo/c7.jfif', 76265.00, 21790.00, 'SUV', 0, 1, 3, NULL, '2026-06-01 01:21:37'),
(36, 10, 'OMODA C7 SHS', 'omoda-c7-shs', NULL, 'img/omoda_jaecoo/c7_shs.jfif', 103215.00, 29490.00, 'SUV', 0, 1, 4, NULL, '2026-06-01 01:21:25'),
(37, 10, 'JAECOO 5', 'jaecoo-5', NULL, 'img/omoda_jaecoo/jae_5.jfif', 55965.00, 15990.00, 'SUV', 0, 1, 5, NULL, '2026-06-01 01:21:10'),
(38, 10, 'JAECOO 5 EV', 'jaecoo-5-ev', NULL, 'img/omoda_jaecoo/jae_5_ev.jfif', 89915.00, 25690.00, 'SUV', 0, 1, 6, NULL, '2026-06-01 01:20:42'),
(39, 10, 'JAECOO 8 SHS', 'jaecoo-8-shs', NULL, 'img/omoda_jaecoo/jae_8_shs.jfif', 136990.00, 39140.00, 'SUV', 0, 1, 7, NULL, '2026-06-01 01:20:33'),
(40, 8, 'NLR 3 TON', 'nlr-3-ton', NULL, 'img/isuzu_camiones/nlr_3_ton.jfif', NULL, NULL, 'SERIE-N', 0, 1, 1, NULL, '2026-06-01 01:34:07'),
(41, 8, 'NPR 4 TON', 'npr-4-ton', NULL, 'img/isuzu_camiones/npr4_ton.jfif', NULL, NULL, 'SERIE-N', 0, 1, 2, NULL, '2026-06-01 01:35:32'),
(42, 8, 'NPS 4x4', 'nps-4x4', NULL, 'img/isuzu_camiones/nps4_4.jfif', NULL, NULL, 'SERIE-N', 0, 1, 3, NULL, '2026-06-01 01:35:42'),
(43, 8, 'NPR 5 TON', 'npr-5-ton', NULL, 'img/isuzu_camiones/npr5_ton.jfif', NULL, NULL, 'SERIE-N', 0, 1, 4, NULL, '2026-06-01 01:36:07'),
(44, 8, 'NPR DC (Doble Cabina)', 'npr-dc-doble-cabina', NULL, 'img/isuzu_camiones/npr_cdoble.jfif', NULL, NULL, 'SERIE-N', 0, 1, 5, NULL, '2026-06-01 01:36:41'),
(45, 8, 'NQR 6.5 TON', 'nqr-6-5-ton', NULL, 'img/isuzu_camiones/nqr65_ton.jfif', NULL, NULL, 'SERIE-N', 0, 1, 6, NULL, '2026-06-01 01:37:19'),
(46, 8, 'FRR CL (Cabina Litera)', 'frr-cl-cabina-litera', NULL, 'img/isuzu_camiones/frr_cl.jfif', NULL, NULL, 'SERIE-F', 0, 1, 1, NULL, '2026-06-01 01:40:02'),
(47, 8, 'FTR 10 TON', 'ftr-10-ton', NULL, 'img/isuzu_camiones/ftr10_ton.jfif', NULL, NULL, 'SERIE-F', 0, 1, 2, NULL, '2026-06-01 01:38:14'),
(48, 8, 'FVR 13 TON', 'fvr-13-ton', NULL, 'img/isuzu_camiones/fvr13_ton.jfif', NULL, NULL, 'SERIE-F', 0, 1, 3, NULL, '2026-06-01 01:38:58'),
(49, 8, 'FVZ 20 TON', 'fvz-20-ton', NULL, 'img/isuzu_camiones/fvz20_ton.jfif', NULL, NULL, 'SERIE-F', 0, 1, 3, NULL, '2026-06-01 01:39:24'),
(50, 7, 'Wave 110S', 'wave-110s', NULL, 'img/honda_motos/paseo/1.jfif', NULL, NULL, 'Paseo', 0, 1, 1, NULL, '2026-06-01 03:04:14'),
(51, 7, 'Wave 110S CD', 'wave-110s-cd', NULL, 'img/honda_motos/paseo/2.jfif', NULL, NULL, 'Paseo', 0, 1, 2, NULL, '2026-06-01 03:07:55'),
(52, 7, 'Dio 110', 'dio-110', NULL, 'img/honda_motos/paseo/3.jfif', NULL, NULL, 'Paseo', 0, 1, 3, NULL, '2026-06-01 03:08:07'),
(53, 7, 'Navi', 'navi', NULL, 'img/honda_motos/paseo/4.jfif', NULL, NULL, 'Paseo', 0, 1, 4, NULL, '2026-06-01 03:08:23'),
(54, 7, 'Elite 125', 'elite-125', NULL, 'img/honda_motos/paseo/5.jfif', NULL, NULL, 'Paseo', 0, 1, 5, NULL, '2026-06-01 03:08:41'),
(55, 7, 'PCX 160', 'pcx-160', NULL, 'img/honda_motos/paseo/6.jfif', NULL, NULL, 'Paseo', 0, 1, 6, NULL, '2026-06-01 03:08:52'),
(56, 7, 'CB125F Hornet', 'cb125f-hornet', NULL, 'img/honda_motos/pistera/1.jfif', NULL, NULL, 'Pistera', 0, 1, 1, NULL, '2026-06-01 03:14:27'),
(57, 7, 'CB100', 'cb100', NULL, 'img/honda_motos/pistera/2.jfif', NULL, NULL, 'Pistera', 0, 1, 2, NULL, '2026-06-01 03:17:11'),
(58, 7, 'GL125 E3', 'gl125-e3', NULL, 'img/honda_motos/pistera/3.jfif', NULL, NULL, 'Pistera', 0, 1, 3, NULL, '2026-06-01 03:17:21'),
(59, 7, 'CB125F Twister', 'cb125f-twister', NULL, 'img/honda_motos/pistera/4.jfif', NULL, NULL, 'Pistera', 0, 1, 4, NULL, '2026-06-01 03:17:32'),
(60, 7, 'GLH150', 'glh150', NULL, 'img/honda_motos/pistera/5.jfif', NULL, NULL, 'Pistera', 0, 1, 5, NULL, '2026-06-01 03:17:59'),
(61, 7, 'X-Blade 160', 'x-blade-160', NULL, 'img/honda_motos/pistera/6.jfif', NULL, NULL, 'Pistera', 0, 1, 6, NULL, '2026-06-01 03:18:10'),
(62, 7, 'CB190R 2.0', 'cb190r-2-0', NULL, 'img/honda_motos/pistera/7.jfif', NULL, NULL, 'Pistera', 0, 1, 7, NULL, '2026-06-01 03:18:21'),
(63, 7, 'XR150L', 'xr150l', NULL, 'img/honda_motos/todo_terreno/1.jfif', NULL, NULL, 'Todo Terreno', 0, 1, 1, NULL, '2026-06-01 03:24:24'),
(64, 7, 'XR190CT', 'xr190ct', NULL, 'img/honda_motos/todo_terreno/2.jfif', NULL, NULL, 'Todo Terreno', 0, 1, 2, NULL, '2026-06-01 03:25:02'),
(65, 7, 'XR190L', 'xr190l', NULL, 'img/honda_motos/todo_terreno/3.jfif', NULL, NULL, 'Todo Terreno', 0, 1, 3, NULL, '2026-06-01 03:25:15'),
(66, 7, 'NX190', 'nx190', NULL, 'img/honda_motos/todo_terreno/4.jfif', NULL, NULL, 'Todo Terreno', 0, 1, 4, NULL, '2026-06-01 03:25:25'),
(67, 7, 'CRF250R', 'crf250r', NULL, 'img/honda_motos/crf/1.jfif', NULL, NULL, 'CRF', 0, 1, 1, NULL, '2026-06-01 03:29:56'),
(68, 7, 'CRF300F', 'crf300f', NULL, 'img/honda_motos/crf/2.jfif', NULL, NULL, 'CRF', 0, 1, 2, NULL, '2026-06-01 03:30:12'),
(69, 7, 'CRF300L', 'crf300l', NULL, 'img/honda_motos/crf/3.jfif', NULL, NULL, 'CRF', 0, 1, 3, NULL, '2026-06-01 03:30:22'),
(70, 7, 'CRF450R', 'crf450r', NULL, 'img/honda_motos/crf/4.jfif', NULL, NULL, 'CRF', 0, 1, 4, NULL, '2026-06-01 03:30:34'),
(71, 7, 'CB300 Twister', 'cb300-twister', NULL, 'img/honda_motos/fun_bikes/1.jfif', NULL, NULL, 'Fun Bikes', 0, 1, 1, NULL, '2026-06-01 03:36:14'),
(72, 7, 'XRE300 Sahara', 'xre300-sahara', NULL, 'img/honda_motos/fun_bikes/2.jfif', NULL, NULL, 'Fun Bikes', 0, 1, 2, NULL, '2026-06-01 03:37:01'),
(73, 7, 'CB650', 'cb650', NULL, 'img/honda_motos/fun_bikes/3.jfif', NULL, NULL, 'Fun Bikes', 0, 1, 3, NULL, '2026-06-01 03:37:10'),
(74, 7, 'CBR600R', 'cbr600r', NULL, 'img/honda_motos/fun_bikes/4.jfif', NULL, NULL, 'Fun Bikes', 0, 1, 4, NULL, '2026-06-01 03:37:20'),
(75, 7, 'CMX500', 'cmx500', NULL, 'img/honda_motos/fun_bikes/5.jfif', NULL, NULL, 'Fun Bikes', 0, 1, 5, NULL, '2026-06-01 03:37:32'),
(76, 7, 'CL500', 'cl500', NULL, 'img/honda_motos/fun_bikes/6.jfif', NULL, NULL, 'Fun Bikes', 0, 1, 6, NULL, '2026-06-01 03:37:42'),
(77, 7, 'NX500', 'nx500', NULL, 'img/honda_motos/fun_bikes/7.jfif', NULL, NULL, 'Fun Bikes', 0, 1, 7, NULL, '2026-06-01 03:38:45'),
(78, 7, 'XL750', 'xl750', NULL, 'img/honda_motos/fun_bikes/8.jfif', NULL, NULL, 'Fun Bikes', 0, 1, 8, NULL, '2026-06-01 03:38:34'),
(79, 7, 'Africa Twin ADV Sports', 'africa-twin-adv-sports', NULL, 'img/honda_motos/fun_bikes/9.jfif', NULL, NULL, 'Fun Bikes', 0, 1, 9, NULL, '2026-06-01 03:38:04'),
(80, 7, 'TRX250', 'trx250', NULL, 'img/honda_motos/atv/1.jfif', NULL, NULL, 'ATV', 0, 1, 1, NULL, '2026-06-01 03:40:39'),
(81, 7, 'TRX420', 'trx420', NULL, 'img/honda_motos/atv/1.jfif', NULL, NULL, 'ATV', 0, 1, 2, NULL, '2026-06-01 03:40:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reclamaciones`
--

CREATE TABLE `reclamaciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo_persona` enum('natural','juridica') NOT NULL DEFAULT 'natural',
  `tipo_documento` varchar(20) NOT NULL,
  `nro_documento` varchar(20) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `ap_paterno` varchar(255) NOT NULL,
  `ap_materno` varchar(255) DEFAULT NULL,
  `placa` varchar(20) DEFAULT NULL,
  `tipo_respuesta` varchar(20) NOT NULL DEFAULT 'email',
  `direccion` varchar(255) DEFAULT NULL,
  `departamento` varchar(255) DEFAULT NULL,
  `provincia` varchar(255) DEFAULT NULL,
  `distrito` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `tienda` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `tipo_bien` varchar(20) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `tipo_reclamo` enum('reclamo','queja') NOT NULL DEFAULT 'reclamo',
  `detalle_reclamo` text DEFAULT NULL,
  `pedido` text DEFAULT NULL,
  `menor_de_edad` tinyint(1) NOT NULL DEFAULT 0,
  `apoderado_tipo_documento` varchar(20) DEFAULT NULL,
  `apoderado_nro_documento` varchar(20) DEFAULT NULL,
  `apoderado_nombre` varchar(100) DEFAULT NULL,
  `apoderado_ap_paterno` varchar(80) DEFAULT NULL,
  `apoderado_ap_materno` varchar(80) DEFAULT NULL,
  `apoderado_telefono` varchar(20) DEFAULT NULL,
  `apoderado_email` varchar(120) DEFAULT NULL,
  `nro_reclamo` varchar(30) DEFAULT NULL,
  `estado` enum('pendiente','en_proceso','resuelto') NOT NULL DEFAULT 'pendiente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `icono` varchar(60) DEFAULT NULL COMMENT 'Nombre de icono Heroicon u otro',
  `imagen` varchar(255) DEFAULT NULL COMMENT 'Ruta relativa, ej: img/servicios/mantenimiento.jpg',
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`, `slug`, `descripcion`, `icono`, `imagen`, `activo`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'Promociones', 'promociones', 'Descubre nuestras promociones especiales en servicios de mantenimiento, repuestos, accesorios y más. Aprovecha descuentos exclusivos y beneficios diseñados para ayudarte a cuidar tu vehículo mientras ahorras.', NULL, 'img/posventa/promociones.jfif', 1, 1, NULL, '2026-06-02 01:24:29'),
(2, 'Accesorios', 'accesorios', 'Encuentra una amplia variedad de accesorios originales para personalizar tu vehículo y mejorar su comodidad, seguridad y apariencia. Todos nuestros productos están diseñados para adaptarse perfectamente a tu modelo.', NULL, 'img/posventa/accesorios.jfif', 1, 2, NULL, '2026-06-02 00:56:08'),
(3, 'Mantenimiento', 'mantenimiento', 'Mantén tu vehículo en las mejores condiciones con nuestros servicios de mantenimiento preventivo y correctivo. Nuestro equipo técnico especializado utiliza herramientas y procedimientos certificados para garantizar un rendimiento óptimo.', NULL, 'img/posventa/mantenimiento.jfif', 1, 3, NULL, '2026-06-02 00:46:47'),
(4, 'Repuestos', 'repuestos', 'Disponemos de repuestos originales y certificados que cumplen con los más altos estándares de calidad. Asegura el correcto funcionamiento de tu vehículo con piezas diseñadas específicamente para cada modelo.', NULL, 'img/posventa/repuestos.jfif', 1, 4, NULL, '2026-06-02 00:50:02'),
(5, 'Carrocería y Pintura', 'carroceria-pintura', 'Recupera la apariencia y el valor de tu vehículo con nuestros servicios de reparación de carrocería y pintura profesional. Utilizamos materiales de alta calidad y técnicas especializadas para lograr acabados impecables.', NULL, 'img/posventa/planchado.jfif', 1, 5, NULL, '2026-06-02 01:03:47'),
(6, 'Seguros', 'seguros', 'Contamos con opciones de seguros vehiculares que brindan protección y tranquilidad en todo momento. Recibe asesoría personalizada para encontrar la cobertura que mejor se adapte a tus necesidades.', NULL, 'img/posventa/seguros.jfif', 1, 6, NULL, '2026-06-02 01:05:34'),
(7, 'Agenda tu Cita', 'agenda-cita', 'Programa tu cita de manera rápida y sencilla para mantenimiento, reparación o cualquier otro servicio. Nuestro equipo estará listo para atenderte con la calidad y confianza que tu vehículo merece.', NULL, 'img/posventa/cita.jfif', 1, 7, NULL, '2026-06-02 01:08:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ReEpgqe8BRtuWf18JJQBLQk8aAuFArY5PHyjocgG', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'eyJfdG9rZW4iOiJ6RHZUUjNHc2lwNXVnQzdhSVltVjZQdWxxQUx4RlJBMFFsRDBmUUVSIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwidXJsIjpbXSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjMsInBhc3N3b3JkX2hhc2hfd2ViIjoiMzI1MThiYTBmZWI2NDJkYzZhYjc2Y2I4MjM2MDUxYTQ2NDY5NTA3MThjOWI5Y2QxMDRjNWZiYWMxYThjNTY4ZiIsInRhYmxlcyI6eyIzNDdiMWY5NWNhYjdhMjJiNjRkMjk4MDYzNGI1OTdlZl9jb2x1bW5zIjpbeyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Im5vbWJyZSIsImxhYmVsIjoiTm9tYnJlIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InNsdWciLCJsYWJlbCI6IlNsdWciLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6ZmFsc2UsImlzVG9nZ2xlYWJsZSI6dHJ1ZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0Ijp0cnVlfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiZGVzY3JpcGNpb24iLCJsYWJlbCI6IkRlc2NyaXBjaW9uIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOmZhbHNlLCJpc1RvZ2dsZWFibGUiOnRydWUsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6dHJ1ZX0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Imljb25vIiwibGFiZWwiOiJJY29ubyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjpmYWxzZSwiaXNUb2dnbGVhYmxlIjp0cnVlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOnRydWV9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJhY3Rpdm8iLCJsYWJlbCI6IkFjdGl2byIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJvcmRlbiIsImxhYmVsIjoiT3JkZW4iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiY3JlYXRlZF9hdCIsImxhYmVsIjoiQ3JlYXRlZCBhdCIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjpmYWxzZSwiaXNUb2dnbGVhYmxlIjp0cnVlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOnRydWV9XSwiMzM4ZGY1MmIwNGU2YTYyYjZmODY4NDUwZDA2YzJmNjJfY29sdW1ucyI6W3sidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJtYXJjYS5ub21icmUiLCJsYWJlbCI6Ik1hcmNhIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Im5vbWJyZSIsImxhYmVsIjoiTm9tYnJlIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InNsdWciLCJsYWJlbCI6IlNsdWciLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6ZmFsc2UsImlzVG9nZ2xlYWJsZSI6dHJ1ZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0Ijp0cnVlfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiaW1hZ2VuIiwibGFiZWwiOiJJbWFnZW4iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6ZmFsc2UsImlzVG9nZ2xlYWJsZSI6dHJ1ZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0Ijp0cnVlfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoicHJlY2lvIiwibGFiZWwiOiJQcmVjaW8gU1wvIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InByZWNpb19kb2xhcmVzIiwibGFiZWwiOiJQcmVjaW8gJCIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjpmYWxzZSwiaXNUb2dnbGVhYmxlIjp0cnVlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOnRydWV9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJ0aXBvIiwibGFiZWwiOiJUaXBvIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImRlc3RhY2FkbyIsImxhYmVsIjoiRGVzdGFjYWRvIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImFjdGl2byIsImxhYmVsIjoiQWN0aXZvIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Im9yZGVuIiwibGFiZWwiOiJPcmRlbiIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJjcmVhdGVkX2F0IiwibGFiZWwiOiJDcmVhdGVkIGF0IiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOmZhbHNlLCJpc1RvZ2dsZWFibGUiOnRydWUsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6dHJ1ZX0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InVwZGF0ZWRfYXQiLCJsYWJlbCI6IlVwZGF0ZWQgYXQiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6ZmFsc2UsImlzVG9nZ2xlYWJsZSI6dHJ1ZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0Ijp0cnVlfV0sIjA4NzgxMzc3NDQ3MjU1NzlhYzEzNmE4MWQxM2U0MTFjX2NvbHVtbnMiOlt7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoibm9tYnJlIiwibGFiZWwiOiJOb21icmUiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoic2x1ZyIsImxhYmVsIjoiU2x1ZyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJkZXNjcmlwY2lvbiIsImxhYmVsIjoiRGVzY3JpcGNpb24iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6ZmFsc2UsImlzVG9nZ2xlYWJsZSI6dHJ1ZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0Ijp0cnVlfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiaW1hZ2VuIiwibGFiZWwiOiJJbWFnZW4iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6ZmFsc2UsImlzVG9nZ2xlYWJsZSI6dHJ1ZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0Ijp0cnVlfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiaW1hZ2VuX2hlcm8iLCJsYWJlbCI6IkltYWdlbiBoZXJvIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOmZhbHNlLCJpc1RvZ2dsZWFibGUiOnRydWUsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6dHJ1ZX0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImFjdGl2byIsImxhYmVsIjoiQWN0aXZvIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Im9yZGVuIiwibGFiZWwiOiJPcmRlbiIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJjcmVhdGVkX2F0IiwibGFiZWwiOiJDcmVhdGVkIGF0IiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOmZhbHNlLCJpc1RvZ2dsZWFibGUiOnRydWUsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6dHJ1ZX0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InVwZGF0ZWRfYXQiLCJsYWJlbCI6IlVwZGF0ZWQgYXQiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6ZmFsc2UsImlzVG9nZ2xlYWJsZSI6dHJ1ZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0Ijp0cnVlfV0sIjg0OGRlODY5YWQ0NTQwNTIwOTdmM2MyYWQxNWY1MTM5X2NvbHVtbnMiOlt7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoibm9tYnJlIiwibGFiZWwiOiJOb21icmUiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiY2l1ZGFkIiwibGFiZWwiOiJDaXVkYWQiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiZGlyZWNjaW9uIiwibGFiZWwiOiJEaXJlY2Npb24iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6ZmFsc2UsImlzVG9nZ2xlYWJsZSI6dHJ1ZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0Ijp0cnVlfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoidGVsZWZvbm8iLCJsYWJlbCI6IlRlbGVmb25vIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOmZhbHNlLCJpc1RvZ2dsZWFibGUiOnRydWUsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6dHJ1ZX0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6IndoYXRzYXBwIiwibGFiZWwiOiJXaGF0c2FwcCIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJob3JhcmlvIiwibGFiZWwiOiJIb3JhcmlvIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOmZhbHNlLCJpc1RvZ2dsZWFibGUiOnRydWUsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6dHJ1ZX0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImFjdGl2byIsImxhYmVsIjoiQWN0aXZvIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Im9yZGVuIiwibGFiZWwiOiJPcmRlbiIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9XSwiNDkyZjYwNDM2ODlkM2EzYzlmZmJjYjk5MWE4OGRjODBfY29sdW1ucyI6W3sidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJub21icmUiLCJsYWJlbCI6Ik5vbWJyZSIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJkZXNjcmlwY2lvbiIsImxhYmVsIjoiRGVzY3JpcGNpb24iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6ZmFsc2UsImlzVG9nZ2xlYWJsZSI6dHJ1ZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0Ijp0cnVlfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiaW1hZ2VuIiwibGFiZWwiOiJJbWFnZW4iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6ZmFsc2UsImlzVG9nZ2xlYWJsZSI6dHJ1ZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0Ijp0cnVlfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiYWN0aXZvIiwibGFiZWwiOiJBY3Rpdm8iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoib3JkZW4iLCJsYWJlbCI6Ik9yZGVuIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImNyZWF0ZWRfYXQiLCJsYWJlbCI6IkNyZWF0ZWQgYXQiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6ZmFsc2UsImlzVG9nZ2xlYWJsZSI6dHJ1ZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0Ijp0cnVlfV0sIjhjN2RlZTlhZjcyZDk3ZGJiMTBhMWI2YTJlYzU0MzM0X2NvbHVtbnMiOlt7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoibm9tYnJlIiwibGFiZWwiOiJOb21icmUiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiZW1haWwiLCJsYWJlbCI6IkVtYWlsIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InRlbGVmb25vIiwibGFiZWwiOiJUZWxlZm9ubyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjpmYWxzZSwiaXNUb2dnbGVhYmxlIjp0cnVlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOnRydWV9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJtYXJjYSIsImxhYmVsIjoiTWFyY2EiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiYXN1bnRvIiwibGFiZWwiOiJBc3VudG8iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiZXN0YWRvIiwibGFiZWwiOiJFc3RhZG8iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiY3JlYXRlZF9hdCIsImxhYmVsIjoiRmVjaGEiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiaXAiLCJsYWJlbCI6IklwIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOmZhbHNlLCJpc1RvZ2dsZWFibGUiOnRydWUsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6dHJ1ZX1dfSwiZmlsYW1lbnQiOltdfQ==', 1780358823);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte_renting`
--

CREATE TABLE `transporte_renting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `transporte_renting`
--

INSERT INTO `transporte_renting` (`id`, `nombre`, `slug`, `descripcion`, `imagen`, `activo`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'Transporte', 'transporte', 'Servicio especializado en el traslado de vehículos. Garantizamos cobertura regional, puntualidad operativa y monitoreo de rutas en tiempo real para una logística segura y eficiente.', 'img/transporte.jfif', 1, 1, '2026-06-01 21:57:33', '2026-06-02 03:59:03'),
(2, 'Renting', 'renting', 'Servicio de renting vehicular para empresas y proyectos, con planes flexibles, mantenimiento incluido y soporte integral para optimizar costos y disponibilidad de flota.', 'img/renting.jfif', 1, 2, '2026-06-01 21:57:33', '2026-06-02 03:57:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2026-05-30 23:05:02', '$2y$12$LNMKWlhGAqiPtiFl.4X4VOJ6TOsPPjBkxDJ46qlwxzV0X2B1BjUXu', 'G5I0KcGbxV', '2026-05-30 23:05:03', '2026-05-30 23:05:03'),
(2, 'Admin', 'admin@msa.com', NULL, '$2y$12$wH6QwQwQwQwQwQwQwQwQOeQwQwQwQwQwQwQwQwQwQwQwQwQwQw', NULL, '2026-05-31 15:03:46', '2026-05-31 15:03:46'),
(3, 'Admin', 'admin@admin.com', NULL, '$2y$12$rKx1aL4NPhE66/DbYmsLbuC9LJ3n2pjBMdeIeF7jU7pzEmd1eBCge', 'd54htkw8bcYHCL7H0j8zcsyPqYBGmOfcuOHTophIIjYNoRaAnk2fKm6HEKJO', '2026-05-31 20:17:47', '2026-05-31 20:17:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `versiones`
--

CREATE TABLE `versiones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `modelo_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `precio` decimal(12,2) DEFAULT NULL,
  `precio_dolares` decimal(12,2) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `versiones`
--

INSERT INTO `versiones` (`id`, `modelo_id`, `nombre`, `descripcion`, `imagen`, `precio`, `precio_dolares`, `activo`, `orden`, `created_at`, `updated_at`) VALUES
(1, 6, 'RS MT', NULL, 'img/chevrolet/groove_rsmt.jfif', NULL, NULL, 1, 0, '2026-05-31 22:30:12', '2026-05-31 22:30:12'),
(2, 6, 'RS CVT TURBO', NULL, 'img/chevrolet/groove_rscv.jfif', NULL, NULL, 1, 1, '2026-05-31 22:32:03', '2026-05-31 22:32:09'),
(3, 7, 'LTZ AT', NULL, 'img/chevrolet/tracker_ltz.jfif', NULL, NULL, 1, 1, '2026-05-31 22:45:19', '2026-05-31 22:46:45'),
(4, 7, 'RS AT', NULL, 'img/chevrolet/tracker_rs.jfif', NULL, NULL, 1, 2, '2026-05-31 22:46:12', '2026-05-31 22:47:58'),
(5, 9, 'Z71', NULL, 'img/chevrolet/traverse_z71.jfif', NULL, NULL, 1, 1, '2026-05-31 22:50:32', '2026-05-31 22:53:10'),
(6, 9, 'MIDNIGHT', NULL, 'img/chevrolet/traverse_mid.jfif', NULL, NULL, 1, 2, '2026-05-31 22:51:57', '2026-05-31 22:52:31'),
(7, 13, 'WT MT', NULL, 'img/chevrolet/colorado_wtmt.jfif', NULL, NULL, 1, 1, '2026-05-31 23:07:19', '2026-05-31 23:07:26'),
(8, 13, 'Z71', NULL, 'img/chevrolet/colorado_z71.jfif', NULL, NULL, 1, 2, '2026-05-31 23:07:55', '2026-05-31 23:08:05'),
(9, 33, 'Omoda C5 Style', NULL, 'img/omoda_jaecoo/c5_style.jfif', 47215.00, 13490.00, 1, 1, '2026-06-01 01:07:06', '2026-06-01 01:22:03'),
(10, 33, 'Omoda C5 Lux', NULL, 'img/omoda_jaecoo/c5_lux.jfif', 57715.00, 16490.00, 1, 2, '2026-06-01 01:07:45', '2026-06-01 01:22:08'),
(11, 37, 'Jaecoo 5 Essence', NULL, 'img/omoda_jaecoo/jae_5_essence.jfif', 59465.00, 15990.00, 1, 1, '2026-06-01 01:14:28', '2026-06-01 01:20:59'),
(12, 37, 'Jaecoo 5 Prime', NULL, 'img/omoda_jaecoo/jae_5_prime.jfif', 61215.00, 17490.00, 1, 2, '2026-06-01 01:16:17', '2026-06-01 01:21:05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indices de la tabla `consultas_servicio`
--
ALTER TABLE `consultas_servicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultas_servicio_servicio_id_foreign` (`servicio_id`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `marcas_slug_unique` (`slug`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modelos_marca_id_foreign` (`marca_id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `reclamaciones`
--
ALTER TABLE `reclamaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `servicios_slug_unique` (`slug`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `transporte_renting`
--
ALTER TABLE `transporte_renting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transporte_renting_slug_unique` (`slug`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `versiones`
--
ALTER TABLE `versiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `versiones_modelo_id_foreign` (`modelo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas_servicio`
--
ALTER TABLE `consultas_servicio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `locales`
--
ALTER TABLE `locales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `reclamaciones`
--
ALTER TABLE `reclamaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `transporte_renting`
--
ALTER TABLE `transporte_renting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `versiones`
--
ALTER TABLE `versiones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consultas_servicio`
--
ALTER TABLE `consultas_servicio`
  ADD CONSTRAINT `consultas_servicio_servicio_id_foreign` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD CONSTRAINT `modelos_marca_id_foreign` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `versiones`
--
ALTER TABLE `versiones`
  ADD CONSTRAINT `versiones_modelo_id_foreign` FOREIGN KEY (`modelo_id`) REFERENCES `modelos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
