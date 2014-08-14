-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-08-2014 a las 19:49:41
-- Versión del servidor: 5.5.36
-- Versión de PHP: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `beta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_groups`
--

CREATE TABLE IF NOT EXISTS `web_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `web_groups`
--

INSERT INTO `web_groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Users', '{"users":1}', '2014-02-03 02:38:16', '2014-02-03 02:38:16'),
(2, 'Admins', '{"admin":1,"users":1}', '2014-02-03 02:38:16', '2014-02-03 02:38:16'),
(3, 'Sponsors', '{"users":1}', '2014-02-03 02:38:16', '2014-02-03 02:38:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_interests_categories`
--

CREATE TABLE IF NOT EXISTS `web_interests_categories` (
  `idinterests` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idinterests`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `web_interests_categories`
--

INSERT INTO `web_interests_categories` (`idinterests`, `name`, `description`, `parent_id`, `created_at`, `update_at`) VALUES
(1, 'Technology', 'Events', NULL, '2014-02-03 02:50:17', '2014-02-03 02:50:17'),
(2, 'PHP', 'Events', 1, '2014-02-03 02:50:17', '2014-02-03 02:50:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_migrations`
--

CREATE TABLE IF NOT EXISTS `web_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `web_migrations`
--

INSERT INTO `web_migrations` (`migration`, `batch`) VALUES
('2012_12_06_225921_migration_cartalyst_sentry_install_users', 1),
('2012_12_06_225929_migration_cartalyst_sentry_install_groups', 1),
('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 1),
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_rel_users_interests`
--

CREATE TABLE IF NOT EXISTS `web_rel_users_interests` (
  `web_users_id` int(10) unsigned NOT NULL,
  `interests_categories_idinterests` int(11) NOT NULL,
  KEY `fk_rel_users_interests_web_users_idx` (`web_users_id`),
  KEY `fk_rel_users_interests_interests_categories1_idx` (`interests_categories_idinterests`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_throttle`
--

CREATE TABLE IF NOT EXISTS `web_throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `web_throttle`
--

INSERT INTO `web_throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 3, NULL, 0, 0, 0, NULL, NULL, NULL),
(2, 7, NULL, 0, 0, 0, NULL, NULL, NULL),
(3, 8, NULL, 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_users`
--

CREATE TABLE IF NOT EXISTS `web_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `web_users`
--

INSERT INTO `web_users` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `company`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', '$2y$10$Kz2WdbdoOJ3z1sYPEEKci.R24ksJWH.svAze2lnMdZ.5z0c1Hhy/S', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2014-02-03 02:38:16', '2014-02-03 02:38:16'),
(2, 'user@user.com', '$2y$10$rcraZvtFQvIzKFhnbmv3YuLWG/cnyLmBb5kxgjS6.xHu610DzAcf6', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2014-02-03 02:38:16', '2014-02-03 02:38:16'),
(3, 'cristiancy96@gmail.com', '$2y$10$yMjya8eAS24TZBrUmGLJseibDM3vyXYTK./eVOpxuVsh7UCM7QRga', NULL, 1, NULL, '2014-02-03 02:50:17', '2014-02-03 02:50:35', '$2y$10$N0BkvajHInrd2RStXjMJoOEkD6Y1noro9ixTlFYx.TD2OCJJIxnKi', NULL, NULL, NULL, '', '2014-02-03 02:40:27', '2014-02-03 02:50:35'),
(4, 'ing.carlosandresrojas@gmail.com', '$2y$10$kgVTXz68Ujqw77I9P/hSQu1Oj5A0YsaloyygV1jI38aqHG9GQVrBi', NULL, 1, NULL, '2014-02-03 02:53:10', NULL, NULL, NULL, NULL, NULL, '', '2014-02-03 02:52:40', '2014-02-03 02:53:10'),
(5, 'cristacho96@yahoo.es', '$2y$10$HdnT4n8BKJ8P..CsuAVhE.r34L8hQzcxzYVL.1sH43Px0AaeDIDuO', NULL, 0, '6xB5sf0dCuQWLUvqATzWhCNoxWZEnfTGS8786hnHf6', NULL, NULL, NULL, NULL, NULL, NULL, '', '2014-02-03 03:44:48', '2014-02-03 03:44:48'),
(6, 'hola@carlosrojasblog.com', '$2y$10$x35evAd.9aOyB9T3NJ4NyePxfhSjvNMPXlHwqcCgofSn8icpWtDzO', NULL, 1, NULL, '2014-02-03 04:28:18', NULL, NULL, NULL, NULL, NULL, '', '2014-02-03 03:52:24', '2014-02-03 04:28:18'),
(7, 'gerencia@americandominios.com', '$2y$10$SBqwhW4OhFiF8or.r8yvp.cQ/xM43gyCEhONQlOjLh5arU2c25kG2', NULL, 1, NULL, '2014-02-24 16:22:50', '2014-02-24 16:24:25', '$2y$10$ACMe3Xsf4vfXxi5CiRh3Qe6OwOUmYZKogREM3Ei/gWwuBi5JrQPRe', NULL, NULL, NULL, '', '2014-02-24 16:22:11', '2014-02-24 16:24:25'),
(8, 'labrabout@gmail.com', '$2y$10$LGZLbp8Tum9Nn96i2vic3.nnebS/A8We4BSBT7mReFfN97fdpfpl2', NULL, 1, NULL, '2014-04-13 18:35:11', '2014-04-13 18:35:51', '$2y$10$C4BrjyUUxdcYJZFckJZVZOtjkq4.PxcTu4NyATQyvabumsj7ofB6u', NULL, NULL, NULL, '', '2014-04-13 18:34:13', '2014-04-13 18:35:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_users_groups`
--

CREATE TABLE IF NOT EXISTS `web_users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `web_users_groups`
--

INSERT INTO `web_users_groups` (`user_id`, `group_id`) VALUES
(1, 1),
(1, 2),
(2, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `web_rel_users_interests`
--
ALTER TABLE `web_rel_users_interests`
  ADD CONSTRAINT `fk_rel_users_interests_interests_categories1` FOREIGN KEY (`interests_categories_idinterests`) REFERENCES `web_interests_categories` (`idinterests`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rel_users_interests_web_users` FOREIGN KEY (`web_users_id`) REFERENCES `web_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
