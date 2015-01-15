-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-01-2015 a las 23:31:09
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

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
-- Estructura de tabla para la tabla `web_categories`
--

CREATE TABLE IF NOT EXISTS `web_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lang` varchar(4) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `web_categories`
--

INSERT INTO `web_categories` (`id`, `title`, `body`, `created_at`, `updated_at`, `lang`) VALUES
(1, 'Outdoor', 'All About the Bussines!', '2014-08-20 10:11:45', '2014-08-20 10:11:45', 'en'),
(2, 'Art & Culture', 'All About the Bussines!', '2014-08-20 10:11:45', '2014-08-20 10:11:45', 'en'),
(3, 'Dancing', 'All About the Bussines!', '2014-08-20 10:11:45', '2014-08-20 10:11:45', 'en'),
(4, 'Wellness', 'All About the Bussines!', '2014-08-20 10:11:45', '2014-08-20 10:11:45', 'en'),
(5, 'Career & Business', 'All About the Bussines!', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(6, 'Eat & Foods', 'All About the Bussines!', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(7, 'Belief', 'All About the Bussines!', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(8, 'Sports & Fitness', 'All About the Bussines!', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(9, 'Education', 'All About the Bussines!', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(10, 'Photography', 'All About the Bussines!', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(11, 'Languages', 'All About the Bussines!', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(12, 'Books', 'All About the Bussines!', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(13, 'Music', 'All About the Bussines!', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(14, 'Technology', 'All About the Bussines!', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(15, 'Televisión', 'Televisión', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_events`
--

CREATE TABLE IF NOT EXISTS `web_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ends` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `organizer` int(10) NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` int(10) NOT NULL,
  `topic` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `privacy` int(1) NOT NULL,
  `starts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `location_reference` text NOT NULL,
  `state` int(2) NOT NULL,
  `image` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=104 ;

--
-- Volcado de datos para la tabla `web_events`
--

INSERT INTO `web_events` (`id`, `title`, `location`, `ends`, `organizer`, `logo`, `description`, `type`, `topic`, `created_at`, `updated_at`, `privacy`, `starts`, `location_reference`, `state`, `image`) VALUES
(94, 'Asistir a la maraton', 'Medellin - Antioquia, Colombia', '0000-00-00 00:00:00', 9, '', 'Correr la media maraton de medellin', 8, 1, '2014-12-14 09:34:52', '2014-12-14 09:34:54', 0, '0000-00-00 00:00:00', 'CpQBgQAAAMVIvXGA1WpAotjXypi6lunRwADiEJIEHQnXzFMKCTb1dVpTbOHzik6k8CX6xHmVlahNEE3ixw0N7t7HF6co1dO6gWjAv2RoXfrEM4tXdLmZAYNkp2InbUcC5ORIgN1youSgrfjFwnVJkJgFuZo_h9BpDNV9U5JKrJYwunzJkJ4nFUWjo0xz3Kj4BjTP_kSFLhIQJ-_IED9YIxV2tABCWdxRtxoUi0L_7w-g3cPPp5DRPKZCLIjrvls', 0, 'event_94.jpg'),
(96, 'Es un test', 'Minorista - Calle 55, San Benito, Medellín - Antioquia, Colombia', '2012-10-10 05:00:00', 9, '', 'Nose', 10, 0, '2014-12-18 01:18:57', '2014-12-18 01:18:59', 0, '0000-00-00 00:00:00', 'CoQBegAAADG6gzhZRjuHfJO6FLR6MeOK931DSw3lS8Me1uDXKqyBXhsaCY46o8KVMmXnUSSWgMuvkZMQWBldZ4uozLB65zyZG-HM4X1T7ew0N2zn1VLbf5nK4gBt1oAE057P3uZbjHiU0X2TemIQF1iVBLIdb-ItbuF8ejGcFQ2dL6VYvEOIEhCOUatyhKoByBk8I9Sp7TFOGhRoCw7Ti1HrNq-MKI7JAc18hp3jfA', 0, 'event_96.JPG'),
(97, 'otro test', 'Baja California, México', '2012-10-10 05:00:00', 9, '', 'Nose', 1, 0, '2014-12-18 01:20:19', '2014-12-18 01:20:21', 0, '2012-10-10 05:00:00', 'CoQBewAAAPyixMDx4wCXTWQ5YxFjSjgZFotxYJ9PqAHDs7F_ZaF0G6FFItUmwUQaQOljIuR6Xpgt_sfq90hPYP_7lZnafYlrLOjHRRvu365QC-LOghPj86kNodJb8u1WPQ65lTYvB2cv7FHWsTCIzG9WGDQCj2c7SxvEm8MQkg_bbQsU2sM6EhD3-gUlhGUtc28DGQiiuKMxGhRIa_2fHnl-PrKRSlQqHg3Eot3lWQ', 0, 'event_97.JPG'),
(98, 'test 54', 'asdasdasd, Mato Grosso do Sul, Brasil', '2012-11-11 05:00:00', 9, '', 'origin', 4, 0, '2014-12-18 01:25:30', '2014-12-18 01:25:32', 0, '2012-10-10 05:00:00', 'CoQBfgAAAIF9Ap7WkJOJ03BuMnl3gCw3jBkeSpzbq9zyKrk93D3dB6tNxZSDsFqq04x0cky-Oudu5zWHIfvouJpMYlRww56Q8omh6uX5rRxiAUOwy2pmlAMH8AkaaF4c6J4GiZlB7nDfUWBIIluMrPRfNS0WzL2qJwcX4r621dUuENnJmVbLEhAupYYmwpj6G6iCt8NbCSrlGhRXpkIUAdAHKjvJBii6g8DNmuYP9w', 0, 'event_98.JPG'),
(99, 'juan', 'Colegio Divino Salvador - Carrera 20, Medellín - Antioquia, Colombia', '2012-02-10 05:00:00', 9, '', 'Nona', 3, 0, '2014-12-18 01:28:38', '2014-12-18 01:28:40', 0, '2012-10-10 05:00:00', 'CoQBcQAAABs-XMdjyI7OS4UnJDuyUw9MK7ty2ilP_CQquUg5WbStFo3fmnVwJn-i_4kQdOt9kMH3uQ7oNCJ5eAKBqzjFT8L-Q1u8NtwKzzRDpMEnA0SGRKt35CxJ65JuoSazRi3KS_R3jOfL7hk5QXw4l5MByoNHyzOMGvhZcJFEglqBZeJyEhCJHubL4puANWVm-Q1zO4QKGhSohyEPINt1L9HyaKQcVaXIayH7vQ', 0, 'event_99.JPG'),
(100, 'asdfsd', 'sadfasd', '0000-00-00 00:00:00', 9, '', 'sadfsadf', 4, 0, '2014-12-18 01:33:23', '2014-12-18 01:33:25', 0, '0000-00-00 00:00:00', '', 0, 'event_100.JPG'),
(101, 'sisas', 'Sisaski, Tallinn, Tallinna linn, Eesti Vabariik', '2010-10-10 05:00:00', 9, '', 'Nose', 0, 0, '2014-12-18 01:36:32', '2014-12-18 01:36:34', 0, '2010-10-10 05:00:00', 'CoQBfAAAAGZWzb49cWYuwMxzNH8TMeWtWlfYl-6QW6bZach4GFx08EsOS5nrsX4EDKQ95mi6d-Qx7LqKuiD5I0Pzf-wl1es1ymq2dn9VBkhCRMbL5XkOKpbHmPt_CWeXG_ioKmSsBHnW2pSAN9YRPZ2AMfJoXf1spDSuiajxVL-pMuU5jf_lEhA148gK6sdgB8k7qcYouzEkGhTNpl1_tiTUjkhr2a_yVy9it0Gwpg', 0, 'event_101.JPG'),
(102, 'sesas', 'South Africa', '2010-10-10 05:00:00', 9, '', 'fasdfasdf', 3, 0, '2014-12-18 22:08:24', '2014-12-18 22:08:26', 0, '2010-10-10 05:00:00', 'CnRtAAAADO-pceTtEx8ZwZHWuCtsLNVi1hD-urwjNVDHRQgT9Rmr2KrTvzyLcgpRSTMQN8iwRpk7jhsHC-HR3ceVO57wnnI2HglYBVt69T8P6UAJgzacvF5CTTJVR5jlnUbHCALNro6w7mUIqdXPmTVa-2kWnBIQomXnPGReNQkUjmOnaQnVQRoU5rQ9OejoFNkUh_4iV3VWeFFUoaI', 0, 'event_102.jpg'),
(103, 'Test', 'Bello - Antioquia, Colombia', '2015-10-10 05:00:00', 1234, '', 'No hay', 7, 0, '2014-12-30 06:11:15', '2014-12-30 06:11:17', 0, '2013-10-10 05:00:00', 'CoQBfQAAABWGVMNuEXGtnbcL3Lsr91HJH1z577UNVGQLzFKb1KLA-YO5yWkqUB9yMHZuxz1J8VEm2q-5-9x5iaZZXtxnCFsz4Jx5Ug0Jl97zVYNAxPUJgYwYmeSX6-CTcuL8SzeVqp4JrdumRq8_2CbrWU-n_Gmnj614liZeFbQSU_12qiU-EhByAUpxAAVxOmbtwMmehqAGGhQVCqKddvRvFuOf4cJ5jXr8mJahlw', 0, 'event_103.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_event_type`
--

CREATE TABLE IF NOT EXISTS `web_event_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lang` varchar(4) NOT NULL DEFAULT 'en',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `web_event_type`
--

INSERT INTO `web_event_type` (`id`, `name`, `description`, `updated_at`, `created_at`, `lang`) VALUES
(1, 'Charity', 'Give us your money', '2014-09-18 19:00:00', '0000-00-00 00:00:00', 'en'),
(2, 'recruitment', 'recruitment', '2014-09-18 19:00:17', '0000-00-00 00:00:00', 'en');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `web_groups`
--

INSERT INTO `web_groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(4, 'Admins', '{"admin":1,"users":1,"sponsors":1}', '2014-10-08 07:17:33', '2014-10-08 07:17:33'),
(5, 'Users', '{"users":1}', '2014-10-08 07:17:34', '2014-10-08 07:17:34'),
(6, 'Sponsors', '{"sponsors":1}', '2014-10-08 07:17:34', '2014-10-08 07:17:34');

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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lang` varchar(4) NOT NULL DEFAULT 'en',
  PRIMARY KEY (`idinterests`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `web_interests_categories`
--

INSERT INTO `web_interests_categories` (`idinterests`, `name`, `description`, `parent_id`, `created_at`, `updated_at`, `lang`) VALUES
(0, 'Novelas', 'Novelas', 15, '2014-09-04 00:54:02', '0000-00-00 00:00:00', 'es'),
(1, 'Outdoors', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at magna dolor. Sed commodo feugiat lobortis. Aliquam lacinia sollicitudin porta. Nulla mollis eu enim non feugiat. Mauris convallis purus ut porta elementum. Nunc elementum ligula vel tincidunt luctus. Quisque orci enim, tempus eu fringilla a, semper ac libero. Sed condimentum leo at ipsum fringilla, ut elementum tellus ultrices. Mauris quis tempor urna, sit amet blandit lorem. In ante ante, feugiat non leo ut, molestie commodo purus. Vivamus lacinia sollicitudin urna. Aliquam et sem sed est tincidunt molestie condimentum non ligula. Quisque sed ipsum eu libero dictum pellentesque at et lorem. Morbi cursus faucibus gravida.', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(2, 'Hiking', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at magna dolor. Sed commodo feugiat lobortis. Aliquam lacinia sollicitudin porta. Nulla mollis eu enim non feugiat. Mauris convallis purus ut porta elementum. Nunc elementum ligula vel tincidunt luctus. Quisque orci enim, tempus eu fringilla a, semper ac libero. Sed condimentum leo at ipsum fringilla, ut elementum tellus ultrices. Mauris quis tempor urna, sit amet blandit lorem. In ante ante, feugiat non leo ut, molestie commodo purus. Vivamus lacinia sollicitudin urna. Aliquam et sem sed est tincidunt molestie condimentum non ligula. Quisque sed ipsum eu libero dictum pellentesque at et lorem. Morbi cursus faucibus gravida.', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(3, 'Sailing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at magna dolor. Sed commodo feugiat lobortis. Aliquam lacinia sollicitudin porta. Nulla mollis eu enim non feugiat. Mauris convallis purus ut porta elementum. Nunc elementum ligula vel tincidunt luctus. Quisque orci enim, tempus eu fringilla a, semper ac libero. Sed condimentum leo at ipsum fringilla, ut elementum tellus ultrices. Mauris quis tempor urna, sit amet blandit lorem. In ante ante, feugiat non leo ut, molestie commodo purus. Vivamus lacinia sollicitudin urna. Aliquam et sem sed est tincidunt molestie condimentum non ligula. Quisque sed ipsum eu libero dictum pellentesque at et lorem. Morbi cursus faucibus gravida.', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(4, 'Cruises', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at magna dolor. Sed commodo feugiat lobortis. Aliquam lacinia sollicitudin porta. Nulla mollis eu enim non feugiat. Mauris convallis purus ut porta elementum. Nunc elementum ligula vel tincidunt luctus. Quisque orci enim, tempus eu fringilla a, semper ac libero. Sed condimentum leo at ipsum fringilla, ut elementum tellus ultrices. Mauris quis tempor urna, sit amet blandit lorem. In ante ante, feugiat non leo ut, molestie commodo purus. Vivamus lacinia sollicitudin urna. Aliquam et sem sed est tincidunt molestie condimentum non ligula. Quisque sed ipsum eu libero dictum pellentesque at et lorem. Morbi cursus faucibus gravida.', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(5, 'Scuba Diving', 'Tutorials About Photoshop', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(6, 'Trail Running', 'Tutorials About Photoshop', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(7, 'Sport Bikes', 'Tutorials About Photoshop', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(8, 'Aviation', 'Tutorials About Photoshop', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(9, 'Adventure', 'Tutorials About Photoshop', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(10, 'Camping', 'Tutorials About Photoshop', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(11, 'Outdoor Adventures', 'Tutorials About Photoshop', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(12, 'Weekend Adventures', 'Tutorials About Photoshop', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(13, 'Live Music', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(14, 'Performing Arts', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(15, 'Collaboration', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(16, 'Artists', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(17, 'Acting', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(18, 'Theater', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(19, 'Creativity', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(20, 'Painting', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(21, 'Creative Circle', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(22, 'Arts & Entertainment', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(23, 'Graphic Design', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(24, 'Drawing', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(25, 'Ballroom Dancing', 'Tutorials 1', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(26, 'Dance Lessons', 'Tutorials 2', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(27, 'Belly Dance Lessons', 'Tutorials', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(28, 'Dancing', 'Tutorials', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(29, 'Social Dancing', 'Tutorials', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(30, 'Salsa', 'Tutorials', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(31, 'Latin Dance', 'Tutorials', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(32, 'Dance and Movement', 'Tutorials', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(33, 'Swing Dancing', 'Tutorials', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(34, 'Salsa Dance Lessons', 'Tutorials', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(35, 'Bachata', 'Tutorials', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(36, 'Tango', 'Tutorials', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(37, 'PTSD', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(38, 'Healthy Living', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(39, 'Intimacy', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(40, 'Meditation', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(41, 'Self-Improvement', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(42, 'Cancer Survivors', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(43, 'Medical Marijuana', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(44, 'Healthy Family', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(45, 'Special Needs Families', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(46, 'Grief Support', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(47, 'ADHD', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(48, 'Relationship Building', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(49, 'Real Estate', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(50, 'Asian Professionals', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(51, 'Business Strategy', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(52, 'Leadership Development', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(53, 'Indian Professionals', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(54, 'Professional Development', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(55, 'Leadership', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(56, 'Golf as a Business Tool', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(57, 'Fundraising', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(58, 'Young Professionals', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(59, 'Success', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(60, 'Latino/a Professionals', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(61, 'Dining Out', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(62, 'Pubs and Bars', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(63, 'Wine', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(64, 'Vegan', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(65, 'Beer', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(66, 'Exploring New Restaurants', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(67, 'Living Foods', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(68, 'BBQ', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(69, 'Healthy Eating', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(70, 'Indian Food', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(71, 'French Food', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(72, 'Raw Food', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(73, 'Law of Attraction', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(74, 'Spirituality', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(75, 'Bible Study', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(76, 'Self Exploration', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(77, 'NLP', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(78, 'Catholic Social', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(79, 'Freethinker', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(80, 'Retreats', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(81, 'A Course In Miracles', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(82, 'Transformation', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(83, 'Progressive Muslim', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(84, 'Sensuality', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(85, 'Fitness', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(86, 'Exercise', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(87, 'Walking', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(88, 'NFL Football', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(89, 'Golf', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(90, 'Pick-up Tennis', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(91, 'Volleyball', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(92, 'Water Sports', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(93, 'Cycling', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(94, 'Roller Skating', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(95, 'Recreational Sports', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(96, 'Outdoor Fitness', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(97, 'Science', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(98, 'Education & Technology', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(99, 'Intellectual Discussion', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(100, 'Learning', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(101, 'International Relations', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(102, 'Sexual Education', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(103, 'College Alumni', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(104, 'Homeschool Support', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(105, 'Evolution', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(106, 'Communication Skills', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(107, 'Public Speaking', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(108, 'Philosophy', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(109, 'Photography', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(110, 'Watching Movies', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(111, 'Fashion Photography', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(112, 'Film and Video Production', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(113, 'Digital Photography', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(114, 'Film', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(115, 'Photography Classes', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(116, 'Movie Nights', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(117, 'Portrait Photography', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(118, 'Group Photo Shoots', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(119, 'Model Photography', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(120, 'Nature Photography', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(121, 'African Americans', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(122, 'French Language', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(123, 'Language & Culture', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(124, 'Asians', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(125, 'Black Women', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(126, 'Multicultural', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(127, 'Indian Culture', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(128, 'Cultural Diversity', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(129, 'Black Identity', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(130, 'Latino Culture', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(131, 'Culture Exchange', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(132, 'English Language', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(133, 'Book Club', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(134, 'Creative Writing', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(135, 'Reading', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(136, 'Poetry', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(137, 'Writing', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(138, 'Literature', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(139, 'Fiction', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(140, 'Readers', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(141, 'Writing Workshops', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(142, 'Novel Reading', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(143, 'Screenwriting', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(144, 'Novel Writing', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(145, 'Live Music', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(146, 'Musicians', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(147, 'Singing', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(148, 'Shamanic Drumming', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(149, 'Christian Music', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(150, 'Concerts', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(151, 'Latin Music', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(152, 'Music', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(153, 'Songwriting', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(154, 'Group Singing', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(155, 'Drum Circle', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(156, 'Choir', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(157, 'Programming', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(158, 'Blogging', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(159, 'Web Technology', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(160, 'Java', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(161, 'Artificial Intelligence', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(162, 'Software Development', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(163, 'Web Development', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(164, 'New Technology', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(165, 'Open Source', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(166, 'Web Design', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(167, 'Mobile Development', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en'),
(168, 'Technology Startups', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'en');

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
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 1),
('2014_08_19_185847_create_comments_table', 2),
('2014_06_05_031923_create_categories_table', 3),
('2014_08_19_222718_create_rel_users_category_table', 4),
('2014_08_19_230048_create_categories_table', 5),
('2014_08_19_235412_add_name_and_location_to_the_user', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_peak_task`
--

CREATE TABLE IF NOT EXISTS `web_peak_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `type` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(1) NOT NULL,
  `peak_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `web_peak_task`
--

INSERT INTO `web_peak_task` (`id`, `user_id`, `title`, `description`, `type`, `created_at`, `updated_at`, `status`, `peak_id`, `event_id`) VALUES
(13, 9, 'ewrqwe', 'ffff', 0, '2015-01-08 07:56:36', '2015-01-08 07:56:36', 0, 53, 94),
(15, 9, 'Navegar', 'Navegar', 0, '2015-01-09 02:25:21', '2015-01-09 02:25:21', 0, 56, 97),
(16, 9, 'Cantar una canción con el nombre del sponzor', 'Nose', 0, '2015-01-09 02:28:44', '2015-01-09 02:28:44', 0, 61, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_rel_peaks`
--

CREATE TABLE IF NOT EXISTS `web_rel_peaks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kind` varchar(20) NOT NULL,
  `usd` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Volcado de datos para la tabla `web_rel_peaks`
--

INSERT INTO `web_rel_peaks` (`id`, `kind`, `usd`, `quantity`, `id_event`, `updated_at`, `created_at`) VALUES
(53, 'Gold', 8500, 1, 94, '2014-12-14 09:34:52', '2014-12-14 09:34:52'),
(55, 'A', 0, 1, 96, '2014-12-18 01:18:57', '2014-12-18 01:18:57'),
(56, 'FD', 0, 1, 97, '2014-12-18 01:20:19', '2014-12-18 01:20:19'),
(57, 'A', 0, 1, 98, '2014-12-18 01:25:30', '2014-12-18 01:25:30'),
(58, 'C', 0, 1, 98, '2014-12-18 01:25:30', '2014-12-18 01:25:30'),
(59, 'D', 0, 1, 98, '2014-12-18 01:25:30', '2014-12-18 01:25:30'),
(60, 'BV', 0, 1, 99, '2014-12-18 01:28:38', '2014-12-18 01:28:38'),
(61, 'A', 0, 1, 100, '2014-12-18 01:33:23', '2014-12-18 01:33:23'),
(62, 'AC', 0, 1, 101, '2014-12-18 01:36:33', '2014-12-18 01:36:33'),
(63, 'A', 0, 1, 102, '2014-12-18 22:08:24', '2014-12-18 22:08:24'),
(64, 'Premium', 35, 11, 103, '2014-12-30 06:11:15', '2014-12-30 06:11:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_rel_sponzors_events`
--

CREATE TABLE IF NOT EXISTS `web_rel_sponzors_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idsponzor` int(10) unsigned NOT NULL,
  `idevent` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `state` int(11) NOT NULL,
  `rel_peak` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `web_rel_sponzors_events`
--

INSERT INTO `web_rel_sponzors_events` (`id`, `idsponzor`, `idevent`, `created_at`, `updated_at`, `state`, `rel_peak`) VALUES
(12, 11, 53, '2015-01-03 09:43:01', '2015-01-03 09:43:01', 0, 53),
(13, 11, 53, '2015-01-03 09:45:06', '2015-01-03 09:45:06', 0, 53),
(14, 11, 53, '2015-01-03 09:47:18', '2015-01-03 09:47:18', 0, 53),
(15, 11, 53, '2015-01-03 09:48:26', '2015-01-03 09:48:26', 0, 53),
(16, 11, 53, '2015-01-03 09:49:17', '2015-01-03 09:49:17', 0, 53),
(17, 11, 53, '2015-01-03 09:50:17', '2015-01-03 09:50:17', 0, 53),
(18, 11, 53, '2015-01-03 09:50:38', '2015-01-03 09:50:38', 0, 53),
(19, 11, 53, '2015-01-03 09:50:55', '2015-01-03 09:50:55', 0, 53),
(20, 11, 53, '2015-01-03 09:51:41', '2015-01-03 09:51:41', 0, 53),
(21, 11, 53, '2015-01-03 09:52:39', '2015-01-03 09:52:39', 0, 53),
(22, 11, 53, '2015-01-03 09:52:53', '2015-01-03 09:52:53', 0, 53),
(23, 11, 53, '2015-01-03 09:53:25', '2015-01-03 09:53:25', 0, 53),
(24, 11, 53, '2015-01-03 09:54:41', '2015-01-03 09:54:41', 0, 53),
(25, 11, 53, '2015-01-03 09:55:41', '2015-01-03 09:55:41', 0, 53),
(26, 11, 53, '2015-01-03 09:56:58', '2015-01-03 09:56:58', 0, 53),
(27, 11, 53, '2015-01-03 09:58:08', '2015-01-03 09:58:08', 0, 53),
(28, 11, 53, '2015-01-03 09:58:29', '2015-01-03 09:58:29', 0, 53),
(29, 11, 53, '2015-01-03 10:00:23', '2015-01-03 10:00:23', 0, 53),
(30, 11, 55, '2015-01-03 10:01:24', '2015-01-03 10:01:24', 0, 55),
(31, 11, 61, '2015-01-08 00:15:04', '2015-01-08 00:15:04', 0, 61),
(32, 11, 61, '2015-01-08 00:15:08', '2015-01-08 00:15:08', 0, 61),
(33, 11, 61, '2015-01-08 00:15:54', '2015-01-08 00:15:54', 0, 61),
(34, 11, 61, '2015-01-08 00:16:50', '2015-01-08 00:16:50', 0, 61),
(35, 11, 61, '2015-01-08 00:17:41', '2015-01-08 00:17:41', 0, 61);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_rel_users_category`
--

CREATE TABLE IF NOT EXISTS `web_rel_users_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `rel_users_category_user_id_foreign` (`user_id`),
  KEY `rel_users_category_category_id_foreign` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `web_rel_users_category`
--

INSERT INTO `web_rel_users_category` (`id`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(8, 9, 6, '2014-10-15 01:16:11', '2014-10-15 01:16:11'),
(10, 11, 14, '2014-10-15 01:47:45', '2014-10-15 01:47:45'),
(11, 12, 1, '2014-12-03 04:03:42', '2014-12-03 04:03:42'),
(12, 13, 10, '2014-12-05 07:59:37', '2014-12-05 07:59:37'),
(13, 14, 10, '2014-12-06 03:31:54', '2014-12-06 03:31:54'),
(14, 18, 1, '2014-12-10 02:16:41', '2014-12-10 02:16:41'),
(15, 18, 5, '2014-12-10 02:16:41', '2014-12-10 02:16:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_rel_users_interests`
--

CREATE TABLE IF NOT EXISTS `web_rel_users_interests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `interests_categories_idinterests` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `fk_rel_users_interests_web_users_idx` (`user_id`),
  KEY `fk_rel_users_interests_interests_categories1_idx` (`interests_categories_idinterests`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `web_rel_users_interests`
--

INSERT INTO `web_rel_users_interests` (`id`, `user_id`, `interests_categories_idinterests`, `created_at`, `updated_at`) VALUES
(9, 9, 62, '2014-10-15 01:16:11', '2014-10-15 01:16:11'),
(14, 11, 158, '2014-10-15 01:47:45', '2014-10-15 01:47:45'),
(15, 12, 1, '2014-12-03 04:03:43', '2014-12-03 04:03:43'),
(16, 13, 113, '2014-12-05 07:59:37', '2014-12-05 07:59:37'),
(17, 14, 113, '2014-12-06 03:31:54', '2014-12-06 03:31:54'),
(18, 18, 1, '2014-12-10 02:16:41', '2014-12-10 02:16:41'),
(19, 18, 53, '2014-12-10 02:16:41', '2014-12-10 02:16:41'),
(20, 18, 50, '2014-12-10 02:16:42', '2014-12-10 02:16:42'),
(21, 18, 51, '2014-12-10 02:16:42', '2014-12-10 02:16:42'),
(22, 18, 54, '2014-12-10 02:16:42', '2014-12-10 02:16:42'),
(23, 18, 58, '2014-12-10 02:16:42', '2014-12-10 02:16:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_task_by_sponzor`
--

CREATE TABLE IF NOT EXISTS `web_task_by_sponzor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `peak_id` int(11) NOT NULL,
  `sponzor_id` int(11) NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `event_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `web_throttle`
--

INSERT INTO `web_throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(22, 9, '::1', 0, 0, 0, NULL, NULL, NULL),
(23, 11, NULL, 0, 0, 0, NULL, NULL, NULL);

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
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `custom_status` int(1) NOT NULL DEFAULT '0',
  `login_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_valid_until` timestamp NULL DEFAULT NULL,
  `lang` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eventbriteKey` text COLLATE utf8_unicode_ci,
  `meetupRefreshKey` text COLLATE utf8_unicode_ci,
  `comunity_size` int(11) NOT NULL DEFAULT '0',
  `location` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `location_reference` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `web_users`
--

INSERT INTO `web_users` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `company`, `created_at`, `updated_at`, `name`, `sex`, `age`, `custom_status`, `login_code`, `login_valid_until`, `lang`, `image`, `description`, `eventbriteKey`, `meetupRefreshKey`, `comunity_size`, `location`, `location_reference`) VALUES
(9, 'seagomezar@gmail.com', '$2y$10$EoYFwjxMB141zc04JvGTfefF8wk0Abm6sTYGzQzj9KHbgn9D6i4Rq', NULL, 1, NULL, '2014-10-15 01:15:15', '2015-01-09 02:12:50', '$2y$10$.LYai2aWKN3/qzidRry3UulPcmBEOYKjueic5SC7fnf0v6FSSX1WO', NULL, 'SponzorMe', '2014-10-15 00:37:45', '2015-01-09 02:12:50', 'Sebastian Alonso Gomez Arias', 1, 23, 2, '466d5f0558282134b13c5a0beeb09fc3', '2015-01-04 20:40:36', '', '', 'Backend Developer', 'QLSXBLX57AWJ4EHE7QTT', '', 0, 'Antwerpen, België', 'CoQBdAAAAGEodQYQCbM5U6hhXJNQ5DtZJPod1aJpW_IbQ1dtE8J734QvzMLQfJisRotrd_CLJqkEEpOJqjwpYvN5KmoISTiG1P6LyT3txw9AvjJ-GQ4A-sXeFdHv895LqA28wVNFDSxfI4lC5yf3tZ8m8cMJ7ZZY4Dt9_YEE2WKp84JyNe8nEhAPN_NI5yxAXyUGD3LF7sgnGhSNSM3ZmSZkA4qwO1kfIGn5LaXP2w'),
(11, 'sebastian.gomez@sponzor.me', '$2y$10$woZ/ImDxNUzU/An9fsCFq.nsGmf6QqN34eTXBmA87Mu2bMEXiKUI2', NULL, 1, NULL, '2014-10-15 01:50:01', '2015-01-08 00:07:02', '$2y$10$VlqEpU6mLXyTjjdusTr4peUvRhrVQWWPOZIdcWHMhItcnMCgH2gYi', NULL, 'Sponzorme', '2014-10-15 01:46:53', '2015-01-08 00:07:02', 'Sebastian Gomez', 1, 23, 2, NULL, NULL, '', '', 'Admin of Sponzorme', '', '', 0, '', ''),
(12, 'seagomezar@unal.edu.co', '$2y$10$2/6vhxrClqE4mAklFY2vX.h.E3gmntFbVqr5iBuAnC7J26fpmjePC', NULL, 0, 'tYax4vFoNXkZVwAj3i1BjD6xHI8Bkh8I1vbAI9CVhn', NULL, NULL, NULL, NULL, '', '2014-12-03 03:49:08', '2014-12-03 04:03:43', NULL, 0, 33, 2, NULL, NULL, '', '', '', NULL, '', 0, '', ''),
(13, 'juan@juan.com', '$2y$10$JsuqtCUzEG1SZ2E34cK/L.DaAQOpOyl7fFt/R3/lEoDFzMiMhuGPW', NULL, 0, '9fkxyKURLMnuyQEUXcY8vp3R4jRwSCmSP2rajrsPEP', NULL, NULL, NULL, NULL, '', '2014-12-05 07:59:21', '2014-12-05 07:59:37', NULL, 0, 18, 2, NULL, NULL, '', '', '', NULL, '', 0, '', ''),
(14, 'seagomezar@outlook.com', '$2y$10$QVAK/w6TSy37VZccZvAIhe08D2qzJOL5GJ9Tdw3doOEWypADLtGHe', NULL, 0, 'McWccCzYcx3QQNXgocmPnB8VdEw7uTOvkVGSAsrPAz', NULL, NULL, NULL, NULL, '', '2014-12-06 03:24:30', '2014-12-06 03:31:54', NULL, 0, 120, 2, NULL, NULL, '', '', '', NULL, NULL, 0, 'Auckland, New Zealand', 'CoQBegAAALDG_SEWEEmzRy4JBJpzZze8zDEcKil9HimUdRwIzYYLEho4Po9AQAOT87tQIWFR8-IEPSZj4z0kNl3mKGc2pvNSqPD6cPDyuB0l7b_vrA6kxbnI_7jGstwycioIfScRSBe9SBfPWCWWUMNKOgcR02zncoKcKAYFMw79A_gNMk1XEhCuRy5vW31sYz7t5tBKfbo8GhTEnhoxuv-_1ZniaUG0388mPrnICw'),
(15, 'seagomezar@fdsf.com', '$2y$10$6hPfJXZzzIP8MOW8efaQFuT2pYCkTpWbyUCoMdbvb.TL.ZZ10W5LG', NULL, 0, 'd7bDuFzJhGW9SryEEcOi5tFDPfixNzIZV0hVWNupr6', NULL, NULL, NULL, NULL, '', '2014-12-06 19:50:28', '2014-12-06 19:50:28', NULL, NULL, NULL, 0, NULL, NULL, '', '', '', NULL, NULL, 0, '', ''),
(16, 'seagomezar@123.com', '$2y$10$RdVCDttlzvgj87sqWSLixeX/MBhE3djXtdYQv0suC.Rei6xu5ZprC', NULL, 0, 'XyJ9mYrvICvqeYqsqOjJHnY5WXPyhH0t2sala4mfsv', NULL, NULL, NULL, NULL, '', '2014-12-10 00:48:10', '2014-12-10 00:48:10', NULL, NULL, NULL, 0, NULL, NULL, '', '', '', NULL, NULL, 0, '', ''),
(17, 'seagomezar@unal.edu.co2', '$2y$10$/ktmM83CAb6VL0w7bqKAAewraZ5hlo9ImhIB3ShVq4ePBGh6Pz1ny', NULL, 0, 'b6tezesooW83r5Lfjwn2LqiEN8NVyQlBYM8GZwmlho', NULL, NULL, NULL, NULL, '', '2014-12-10 00:50:39', '2014-12-10 00:50:39', NULL, NULL, NULL, 0, NULL, NULL, '', '', '', NULL, NULL, 0, '', ''),
(18, 'seagomezar@fdsf.com1', '$2y$10$763fwSQRBp2Y92KToPWfpuhw7PZOL/GxcukLxQJwWlJ2RSESaJ0Au', NULL, 0, '23mfjuiVibs0aURZkFVSnW9deMX3mnrVmSN4wM5Dv1', NULL, NULL, NULL, NULL, '', '2014-12-10 02:15:53', '2014-12-10 02:16:43', NULL, 1, 88, 2, NULL, NULL, '', '', '', NULL, NULL, 0, 'Polonia, WI, United States', 'CpQBhAAAAJzGbf6OX0-AXMs_Q1CeuJvkwtRmk0dk33tazZPeh1pkKAtEcRy2aqGgSzjyCAG6DJQJUhHb2YEoGfJzB35rEHZF7d1Skf3BORCOjdFZOhJlntaik73Q80o-t7D47bSE-5nAoc0ssPjw9j2dBrpB8KhU16omO-2XirW4e4MVZ0SUp9kLIEpXsIqsopfvu2XQChIQgG17686RHmzc_Sy1Te-_tRoUzESmmhkdJGBJjXsJFU65l28juZM'),
(19, 'seagomezar@fds1f.com', '$2y$10$HIY01OFBIyele0.e6593y.3a.rr9e5uzcjGM1luOzjRMxiE6WxVMa', NULL, 0, 'Jhjlw93s0lgUI433XkbMFyYO6xdKJVQn8Yr5PeBoNS', NULL, NULL, NULL, NULL, '', '2014-12-10 02:41:48', '2014-12-10 02:41:48', NULL, NULL, NULL, 0, NULL, NULL, '', '', '', NULL, NULL, 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_users_groups`
--

CREATE TABLE IF NOT EXISTS `web_users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `web_users_groups`
--

INSERT INTO `web_users_groups` (`user_id`, `group_id`, `updated_at`, `created_at`) VALUES
(9, 5, '2014-10-15 00:37:50', '2014-10-15 00:37:50'),
(11, 6, '2014-10-15 01:46:55', '2014-10-15 01:46:55'),
(12, 5, '2014-12-03 03:49:12', '2014-12-03 03:49:12'),
(13, 5, '2014-12-05 07:59:24', '2014-12-05 07:59:24'),
(14, 5, '2014-12-06 03:24:34', '2014-12-06 03:24:34'),
(15, 5, '2014-12-06 19:50:31', '2014-12-06 19:50:31'),
(16, 6, '2014-12-10 00:48:14', '2014-12-10 00:48:14'),
(17, 6, '2014-12-10 00:50:42', '2014-12-10 00:50:42'),
(18, 5, '2014-12-10 02:15:58', '2014-12-10 02:15:58'),
(19, 5, '2014-12-10 02:41:50', '2014-12-10 02:41:50');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `web_rel_users_category`
--
ALTER TABLE `web_rel_users_category`
  ADD CONSTRAINT `rel_users_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `web_categories` (`id`),
  ADD CONSTRAINT `rel_users_category_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `web_users` (`id`);

--
-- Filtros para la tabla `web_rel_users_interests`
--
ALTER TABLE `web_rel_users_interests`
  ADD CONSTRAINT `fk_rel_users_interests_interests_categories1` FOREIGN KEY (`interests_categories_idinterests`) REFERENCES `web_interests_categories` (`idinterests`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rel_users_interests_web_users` FOREIGN KEY (`user_id`) REFERENCES `web_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
