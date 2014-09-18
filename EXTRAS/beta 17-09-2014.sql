-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2014 a las 02:33:35
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `web_events`
--

INSERT INTO `web_events` (`id`, `title`, `location`, `ends`, `organizer`, `logo`, `description`, `type`, `topic`, `created_at`, `updated_at`, `privacy`, `starts`) VALUES
(1, 'Test de Sebas', 'La casa de sebas', '2014-09-13 05:00:00', 39, 'sebas.png', 'Correr por la casa', 1, 1, '2014-09-09 20:32:06', '2014-09-09 20:32:06', 1, '2014-09-10 05:00:00'),
(2, 'Dormir', 'Dormir por la casa', '0000-00-00 00:00:00', 1, '', 'Test', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(10, 'test213', 'teat32', '2014-09-19 05:00:00', 0, '', 'teas', 0, 0, '2014-09-18 05:01:31', '2014-09-18 05:01:31', 0, '2011-01-01 05:00:00'),
(11, 'Sebas', '341243', '2014-09-02 05:00:00', 0, '', 'sdlfajflk', 0, 0, '2014-09-18 05:25:11', '2014-09-18 05:25:11', 0, '2014-09-06 05:00:00'),
(12, 'adsfsdaf', 'sdafsadf', '2014-09-03 05:00:00', 0, '', 'sadfsadf', 0, 0, '2014-09-18 05:25:25', '2014-09-18 05:25:25', 0, '2014-09-05 05:00:00'),
(13, 'sasdsad', 'sadf', '2014-09-09 05:00:00', 0, '', 'sadfasdf', 0, 0, '2014-09-18 05:27:25', '2014-09-18 05:27:25', 0, '2014-09-11 05:00:00'),
(14, 'sdafsad', 'fsdafad', '2014-09-28 05:00:00', 0, '', 'sfasdfsadf', 0, 0, '2014-09-18 05:28:39', '2014-09-18 05:28:39', 0, '2014-09-03 05:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=47 ;

--
-- Volcado de datos para la tabla `web_groups`
--

INSERT INTO `web_groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(44, 'Users', '{"users":1}', '2014-08-20 05:11:44', '2014-08-20 05:11:44'),
(45, 'Admins', '{"admin":1,"users":1,"sponzors":1}', '2014-08-20 05:11:44', '2014-08-20 05:11:44'),
(46, 'Sponzors', '{"sponzors":1}', '2014-09-09 20:27:58', '2014-09-09 20:27:58');

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
-- Estructura de tabla para la tabla `web_rel_peaks`
--

CREATE TABLE IF NOT EXISTS `web_rel_peaks` (
  `id` int(11) NOT NULL DEFAULT '0',
  `kind` varchar(20) NOT NULL,
  `usd` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `web_rel_peaks`
--

INSERT INTO `web_rel_peaks` (`id`, `kind`, `usd`, `quantity`, `id_event`, `updated_at`, `created_at`) VALUES
(0, 'Gold Sponzor', 25000, 1, 1, '2014-09-16 20:35:38', '2014-09-16 20:35:38'),
(1, 'Gold', 6500, 2, 2, '2014-09-16 22:17:45', '0000-00-00 00:00:00');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `web_rel_users_category`
--

INSERT INTO `web_rel_users_category` (`id`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(6, 39, 15, '2014-09-04 06:35:44', '2014-09-04 06:35:44'),
(7, 40, 2, '2014-09-04 06:37:10', '2014-09-04 06:37:10'),
(8, 42, 6, '2014-09-10 02:26:07', '2014-09-10 02:26:07');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `web_rel_users_interests`
--

INSERT INTO `web_rel_users_interests` (`id`, `user_id`, `interests_categories_idinterests`, `created_at`, `updated_at`) VALUES
(9, 39, 0, '2014-09-04 06:35:44', '2014-09-04 06:35:44'),
(10, 40, 14, '2014-09-04 06:37:10', '2014-09-04 06:37:10'),
(11, 42, 62, '2014-09-10 02:26:07', '2014-09-10 02:26:07');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `web_throttle`
--

INSERT INTO `web_throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 3, NULL, 0, 0, 0, NULL, NULL, NULL),
(2, 7, NULL, 0, 0, 0, NULL, NULL, NULL),
(3, 8, NULL, 0, 0, 0, NULL, NULL, NULL),
(4, 2, NULL, 0, 0, 0, NULL, NULL, NULL),
(5, 1, NULL, 0, 0, 0, NULL, NULL, NULL),
(6, 28, NULL, 0, 0, 0, NULL, NULL, NULL),
(7, 29, NULL, 0, 0, 0, NULL, NULL, NULL),
(8, 33, '::1', 0, 0, 0, NULL, NULL, NULL),
(9, 34, '::1', 0, 0, 0, NULL, NULL, NULL),
(10, 39, NULL, 0, 0, 0, NULL, NULL, NULL);

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
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `custom_status` int(1) NOT NULL DEFAULT '0',
  `login_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_valid_until` timestamp NULL DEFAULT NULL,
  `lang` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=43 ;

--
-- Volcado de datos para la tabla `web_users`
--

INSERT INTO `web_users` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `company`, `created_at`, `updated_at`, `name`, `country`, `state`, `city`, `sex`, `age`, `custom_status`, `login_code`, `login_valid_until`, `lang`, `type`) VALUES
(1, 'admin@admin.com', '$2y$10$dqL2bDjyxCx2MDE3lfMUbu7TzB9vTAAJH9pgAvK66WeF.O8IHG.8m', NULL, 1, NULL, NULL, '2014-08-27 00:57:08', '$2y$10$Gk3Zt1OPke9/hfg9E1GC7upvUQO3tNF9g7TArDRGOb4vL8g0MFD5.', NULL, NULL, NULL, '', '2014-08-20 05:11:44', '2014-08-27 00:57:08', '', '', '', '', 0, NULL, 0, NULL, NULL, '', 1),
(2, 'user@user.com', '$2y$10$DbFpCXLQfS6Va1OXqfZ9Hux2V2fgYhbl8mjiiHV5hfE3IGhfSJ2/a', NULL, 1, NULL, NULL, '2014-09-04 02:05:48', '$2y$10$OUaJxuBNjBprAvJaLJUNFOD4gBg32/c/81wMSuFj7T.5xC/Uz58u.', NULL, NULL, NULL, '', '2014-08-20 05:11:45', '2014-09-04 02:06:27', 'Usuario Sisas', 'senegal', 'Choco', 'Quibdo', 1, 100, 0, '84c4f84e6983bc310e7f755c1b848247', '2014-09-05 02:05:48', 'es', 1),
(39, 'seagomezar@gmail.com', '$2y$10$4d66MCTlshWADsHlCLo0getWRTrNk7bXUuAth7oic5PT5XyAnByuO', NULL, 1, NULL, '2014-09-10 01:08:58', '2014-09-18 02:26:53', '$2y$10$pGVlaRglHs43EkFtqYsUh.SjisK0Xqdd4QHuJMCseYeGguMZkuYre', NULL, NULL, NULL, '', '2014-09-04 06:35:18', '2014-09-18 02:26:53', NULL, 'Colombia', 'Antioquia', 'Bello', 1, 18, 2, NULL, NULL, '', 1),
(40, 'seagomezar@outlook.com', '$2y$10$/51o40OWvGSeAFGh.9jUKeMc5gl28aS7ugUTMIG/5xkN7sEGju..6', NULL, 0, 'pyF3WCi2iClbHoKYIpnS9BmBZsb4oZ6hK6plyWXjy1', NULL, NULL, NULL, NULL, NULL, NULL, '', '2014-09-04 06:36:00', '2014-09-04 06:37:10', NULL, 'Afghanistan', 'Badakhshan', 'Baharak', 0, 18, 2, NULL, NULL, '', 1),
(41, 'test@test.com', '$2y$10$XgBNDx0MsAin.xjrDp9sXOHwzruQ.ORHzkoX0q.PTwuyYQV9tpm7.', NULL, 0, 'VhCRwHGcY7Pr4Fz6B7ZQhR7goym5QjtvGbkTwZq4T8', NULL, NULL, NULL, NULL, NULL, NULL, '', '2014-09-09 02:29:34', '2014-09-09 02:29:34', NULL, 'United States', NULL, 'Berkeley', NULL, NULL, 0, NULL, NULL, '', 2),
(42, 'seagomezar@unal.edu.co', '$2y$10$9p.K/rl6Nvu3xyi0jiyhlOGVCg6YyZ6IFZ2rupNgy1JtBQT7VvnYy', NULL, 0, 'WMubp50myp3uXQi5dy4KBlwdn7gdeo0ocA1EynynnY', NULL, NULL, NULL, NULL, NULL, NULL, '', '2014-09-10 02:25:52', '2014-09-10 02:26:07', NULL, 'Afghanistan', 'Badakhshan', 'Baharak', 0, 18, 2, NULL, NULL, '', 1);

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
(1, 44),
(1, 45),
(2, 44);

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
