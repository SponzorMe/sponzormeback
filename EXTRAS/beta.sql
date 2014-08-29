-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-08-2014 a las 10:53:19
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
-- Estructura de tabla para la tabla `web_categories`
--

CREATE TABLE IF NOT EXISTS `web_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `web_categories`
--

INSERT INTO `web_categories` (`id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 'Outdoor', 'All About the Bussines!', '2014-08-20 05:11:45', '2014-08-20 05:11:45'),
(2, 'Art & Culture', 'All About the Bussines!', '2014-08-20 05:11:45', '2014-08-20 05:11:45'),
(3, 'Dancing', 'All About the Bussines!', '2014-08-20 05:11:45', '2014-08-20 05:11:45'),
(4, 'Wellness', 'All About the Bussines!', '2014-08-20 05:11:45', '2014-08-20 05:11:45'),
(5, 'Career & Business', 'All About the Bussines!', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Eat & Foods', 'All About the Bussines!', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Belief', 'All About the Bussines!', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Sports & Fitness', 'All About the Bussines!', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Education', 'All About the Bussines!', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Photography', 'All About the Bussines!', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Languages', 'All About the Bussines!', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Books', 'All About the Bussines!', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Music', 'All About the Bussines!', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Technology', 'All About the Bussines!', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `web_groups`
--

INSERT INTO `web_groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(44, 'Users', '{"users":1}', '2014-08-20 05:11:44', '2014-08-20 05:11:44'),
(45, 'Admins', '{"admin":1,"users":1}', '2014-08-20 05:11:44', '2014-08-20 05:11:44');

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
  PRIMARY KEY (`idinterests`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `web_interests_categories`
--

INSERT INTO `web_interests_categories` (`idinterests`, `name`, `description`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Outdoors', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at magna dolor. Sed commodo feugiat lobortis. Aliquam lacinia sollicitudin porta. Nulla mollis eu enim non feugiat. Mauris convallis purus ut porta elementum. Nunc elementum ligula vel tincidunt luctus. Quisque orci enim, tempus eu fringilla a, semper ac libero. Sed condimentum leo at ipsum fringilla, ut elementum tellus ultrices. Mauris quis tempor urna, sit amet blandit lorem. In ante ante, feugiat non leo ut, molestie commodo purus. Vivamus lacinia sollicitudin urna. Aliquam et sem sed est tincidunt molestie condimentum non ligula. Quisque sed ipsum eu libero dictum pellentesque at et lorem. Morbi cursus faucibus gravida.', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Hiking', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at magna dolor. Sed commodo feugiat lobortis. Aliquam lacinia sollicitudin porta. Nulla mollis eu enim non feugiat. Mauris convallis purus ut porta elementum. Nunc elementum ligula vel tincidunt luctus. Quisque orci enim, tempus eu fringilla a, semper ac libero. Sed condimentum leo at ipsum fringilla, ut elementum tellus ultrices. Mauris quis tempor urna, sit amet blandit lorem. In ante ante, feugiat non leo ut, molestie commodo purus. Vivamus lacinia sollicitudin urna. Aliquam et sem sed est tincidunt molestie condimentum non ligula. Quisque sed ipsum eu libero dictum pellentesque at et lorem. Morbi cursus faucibus gravida.', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Sailing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at magna dolor. Sed commodo feugiat lobortis. Aliquam lacinia sollicitudin porta. Nulla mollis eu enim non feugiat. Mauris convallis purus ut porta elementum. Nunc elementum ligula vel tincidunt luctus. Quisque orci enim, tempus eu fringilla a, semper ac libero. Sed condimentum leo at ipsum fringilla, ut elementum tellus ultrices. Mauris quis tempor urna, sit amet blandit lorem. In ante ante, feugiat non leo ut, molestie commodo purus. Vivamus lacinia sollicitudin urna. Aliquam et sem sed est tincidunt molestie condimentum non ligula. Quisque sed ipsum eu libero dictum pellentesque at et lorem. Morbi cursus faucibus gravida.', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Cruises', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at magna dolor. Sed commodo feugiat lobortis. Aliquam lacinia sollicitudin porta. Nulla mollis eu enim non feugiat. Mauris convallis purus ut porta elementum. Nunc elementum ligula vel tincidunt luctus. Quisque orci enim, tempus eu fringilla a, semper ac libero. Sed condimentum leo at ipsum fringilla, ut elementum tellus ultrices. Mauris quis tempor urna, sit amet blandit lorem. In ante ante, feugiat non leo ut, molestie commodo purus. Vivamus lacinia sollicitudin urna. Aliquam et sem sed est tincidunt molestie condimentum non ligula. Quisque sed ipsum eu libero dictum pellentesque at et lorem. Morbi cursus faucibus gravida.', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Scuba Diving', 'Tutorials About Photoshop', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Trail Running', 'Tutorials About Photoshop', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Sport Bikes', 'Tutorials About Photoshop', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Aviation', 'Tutorials About Photoshop', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Adventure', 'Tutorials About Photoshop', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Camping', 'Tutorials About Photoshop', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Outdoor Adventures', 'Tutorials About Photoshop', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Weekend Adventures', 'Tutorials About Photoshop', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Live Music', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Performing Arts', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Collaboration', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Artists', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Acting', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Theater', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Creativity', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Painting', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Creative Circle', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Arts & Entertainment', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Graphic Design', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Drawing', 'Tutorials About Photoshop', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Ballroom Dancing', 'Tutorials 1', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Dance Lessons', 'Tutorials 2', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Belly Dance Lessons', 'Tutorials', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Dancing', 'Tutorials', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Social Dancing', 'Tutorials', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Salsa', 'Tutorials', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Latin Dance', 'Tutorials', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Dance and Movement', 'Tutorials', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Swing Dancing', 'Tutorials', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Salsa Dance Lessons', 'Tutorials', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Bachata', 'Tutorials', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Tango', 'Tutorials', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'PTSD', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Healthy Living', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'Intimacy', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'Meditation', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'Self-Improvement', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'Cancer Survivors', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'Medical Marijuana', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'Healthy Family', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'Special Needs Families', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'Grief Support', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'ADHD', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'Relationship Building', 'Tutorials', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'Real Estate', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'Asian Professionals', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'Business Strategy', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'Leadership Development', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'Indian Professionals', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'Professional Development', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'Leadership', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'Golf as a Business Tool', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'Fundraising', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'Young Professionals', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'Success', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'Latino/a Professionals', 'Tutorials', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'Dining Out', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'Pubs and Bars', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'Wine', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'Vegan', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'Beer', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'Exploring New Restaurants', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'Living Foods', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'BBQ', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'Healthy Eating', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'Indian Food', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'French Food', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'Raw Food', 'Tutorials', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'Law of Attraction', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'Spirituality', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'Bible Study', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'Self Exploration', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'NLP', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'Catholic Social', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'Freethinker', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'Retreats', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'A Course In Miracles', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'Transformation', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'Progressive Muslim', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'Sensuality', 'Tutorials', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'Fitness', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'Exercise', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'Walking', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'NFL Football', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'Golf', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'Pick-up Tennis', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'Volleyball', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'Water Sports', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'Cycling', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'Roller Skating', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'Recreational Sports', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'Outdoor Fitness', 'Tutorials', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'Science', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'Education & Technology', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'Intellectual Discussion', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'Learning', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'International Relations', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'Sexual Education', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'College Alumni', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'Homeschool Support', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'Evolution', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'Communication Skills', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'Public Speaking', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'Philosophy', 'Tutorials', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'Photography', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'Watching Movies', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'Fashion Photography', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'Film and Video Production', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'Digital Photography', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'Film', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'Photography Classes', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'Movie Nights', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'Portrait Photography', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'Group Photo Shoots', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'Model Photography', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'Nature Photography', 'Tutorials', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'African Americans', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 'French Language', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'Language & Culture', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'Asians', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'Black Women', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 'Multicultural', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'Indian Culture', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'Cultural Diversity', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'Black Identity', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 'Latino Culture', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 'Culture Exchange', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'English Language', 'Tutorials', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'Book Club', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'Creative Writing', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 'Reading', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'Poetry', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'Writing', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'Literature', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'Fiction', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'Readers', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'Writing Workshops', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'Novel Reading', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'Screenwriting', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'Novel Writing', 'Tutorials', 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'Live Music', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'Musicians', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'Singing', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'Shamanic Drumming', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'Christian Music', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'Concerts', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'Latin Music', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'Music', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 'Songwriting', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 'Group Singing', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 'Drum Circle', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 'Choir', 'Tutorials', 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 'Programming', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 'Blogging', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 'Web Technology', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 'Java', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 'Artificial Intelligence', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 'Software Development', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 'Web Development', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 'New Technology', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 'Open Source', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 'Web Design', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 'Mobile Development', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 'Technology Startups', 'Tutorials', 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `web_rel_users_category`
--

INSERT INTO `web_rel_users_category` (`id`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(12, 33, 10, '2014-08-29 15:51:50', '2014-08-29 15:51:50');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Volcado de datos para la tabla `web_rel_users_interests`
--

INSERT INTO `web_rel_users_interests` (`id`, `user_id`, `interests_categories_idinterests`, `created_at`, `updated_at`) VALUES
(55, 33, 110, '2014-08-29 15:51:50', '2014-08-29 15:51:50'),
(56, 33, 113, '2014-08-29 15:51:50', '2014-08-29 15:51:50');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `web_throttle`
--

INSERT INTO `web_throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 3, NULL, 0, 0, 0, NULL, NULL, NULL),
(2, 7, NULL, 0, 0, 0, NULL, NULL, NULL),
(3, 8, NULL, 0, 0, 0, NULL, NULL, NULL),
(4, 2, NULL, 0, 0, 0, NULL, NULL, NULL),
(5, 1, NULL, 0, 0, 0, NULL, NULL, NULL);

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `web_users`
--

INSERT INTO `web_users` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `company`, `created_at`, `updated_at`, `name`, `country`, `state`, `city`, `sex`, `age`, `custom_status`) VALUES
(1, 'admin@admin.com', '$2y$10$dqL2bDjyxCx2MDE3lfMUbu7TzB9vTAAJH9pgAvK66WeF.O8IHG.8m', NULL, 1, NULL, NULL, '2014-08-22 05:17:22', '$2y$10$Luc.VdNv1Wj3LzfpwDFgAentrQoC67X2lERKSEaOAAYm3pZazjjte', NULL, NULL, NULL, '', '2014-08-20 05:11:44', '2014-08-22 05:17:22', '', '', '', '', 0, NULL, 0),
(2, 'user@user.com', '$2y$10$DbFpCXLQfS6Va1OXqfZ9Hux2V2fgYhbl8mjiiHV5hfE3IGhfSJ2/a', NULL, 1, NULL, NULL, '2014-08-22 05:56:16', '$2y$10$4eRbZDUk/QfizOkFBx3w4.wBR3PDXF0mxray0GMRWsoiBN3su0XVu', NULL, NULL, NULL, '', '2014-08-20 05:11:45', '2014-08-22 05:56:16', '', 'Afghanistan', 'Badakhshan', 'Baharak', 0, 18, 0),
(28, 'seagomezar@gmail.com', '$2y$10$lsM1eKs/N0qc.tr2eMrabeZxJ/zhGi6/TgOriSwIZmn.4.bgFRqIS', NULL, 0, 'G4idbhylnP0h0j4lRbVzNS609QVp0jAzt4artf2MxB', NULL, NULL, NULL, NULL, NULL, NULL, '', '2014-08-25 21:50:26', '2014-08-25 21:51:06', NULL, 'Afghanistan', 'Badakhshan', 'Baharak', 0, 18, 2),
(29, 'sebasg@colombia.com', '$2y$10$Qu.INn/4gBvoe4rQ23oGbe5cnchZ60kxS06P0Z101RGV5fkdEIj62', NULL, 0, 'zKWiQGtf3ksO5InGbwEAYNJ52UlwxKolAMEvQfy6DT', NULL, NULL, NULL, NULL, NULL, NULL, '', '2014-08-25 21:51:45', '2014-08-25 21:51:57', NULL, 'Afghanistan', 'Badakhshan', 'Baharak', 0, 18, 1),
(30, 'juan@aol.com', '$2y$10$1kzh1/SW2pJMQD5JpkM1N.1/0E.S80A1CDqhFNfogKEDTdya2.oxy', NULL, 0, 'b4ii2eWJRvsjYNy3frYnZEpPfpSApokaQ1FzPU8eVE', NULL, NULL, NULL, NULL, NULL, NULL, '', '2014-08-28 08:09:41', '2014-08-28 08:09:41', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(31, 'juantopo@algo.com', '$2y$10$8i6ZjyG3fZ9z2IyjJHGMouh2xMXHk18p6ooj/6EFb89CTfJNLZBSe', NULL, 0, 'Kq6vJGNTCqr4Fy60W0ZcfV2srQYIiblLaRkbEzh743', NULL, NULL, NULL, NULL, NULL, NULL, '', '2014-08-28 08:10:44', '2014-08-28 08:11:48', NULL, 'Colombia', 'Bolivar', 'Cartagena', 1, 18, 2),
(32, 'juan@dispostable.com', '$2y$10$Wn3AnQneACGHzG4U4XneGOlFSepJuPQMo0mMKCMTlar/h9nuIyTbq', NULL, 0, 'Bn6SWLsxghMFRBmqVtM6leVQc7rQhTXYkEDi3pddhw', NULL, NULL, NULL, NULL, NULL, NULL, '', '2014-08-29 14:42:00', '2014-08-29 15:09:58', NULL, 'Colombia', 'Choco', 'Atrato', 1, 20, 1),
(33, 'pedro@dispostable.co', '$2y$10$/2RpWQqryyGSkvI32yQU4OIy9BT5aA4E0UzL8H4mgcD5D34lj3cAe', NULL, 0, 'TmFhwV0r6aNdDakis8EBGuspd4Mt1GtgrgmCYcPygF', NULL, NULL, NULL, NULL, NULL, NULL, '', '2014-08-29 15:51:01', '2014-08-29 15:51:50', NULL, 'Colombia', 'Arauca', 'Fortul', 0, 20, 2);

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
