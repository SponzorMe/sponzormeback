-- phpMyAdmin SQL Dump
-- version 4.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-07-2013 a las 23:57:25
-- Versión del servidor: 5.1.68-community
-- Versión de PHP: 5.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sponsorme`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `element`
--

CREATE TABLE IF NOT EXISTS `element` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `type` enum('text','image','video','sound') NOT NULL DEFAULT 'text' COMMENT 'enum(''text'',''image'',''video'',''sound'')',
  `usr_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_element_1` (`usr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typeof`
--

CREATE TABLE IF NOT EXISTS `typeof` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `typeof`
--

INSERT INTO `typeof` (`id`, `name`) VALUES
(1, 'Deportista'),
(2, 'Organizador de Eventos'),
(3, 'Fundación'),
(4, 'Patrocinador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usr`
--

CREATE TABLE IF NOT EXISTS `usr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  `headline` text,
  `location` varchar(255) DEFAULT NULL,
  `typeof_id` int(11) DEFAULT NULL,
  `like_count` int(11) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_usr_1` (`typeof_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `usr`
--

INSERT INTO `usr` (`id`, `fullname`, `password`, `email`, `admin`, `headline`, `location`, `typeof_id`, `like_count`, `profile_picture`, `featured`) VALUES
(1, 'dvidsilva', '87b2e5eee2c751b0594320b0d9ab44e9', 'contacto@dvidsilva.com', 0, '', '', 1, 0, NULL, 0),
(2, 'arnoldg92', '14a58dc6d1a8ca6f78f96ca664b17390', 'argonzalezc92@gmail.com', 0, 'el deporte es salud', 'Bogota', 1, 0, NULL, 0),
(4, 'Juan Topo', 'f2625fd0e905d11ee88b93ec3244295d', 'juan@dispostable.com', 0, 'Hola', 'bogota', 1, 0, NULL, 0),
(5, 'Carlos Rojas', '07956ac590035ebd3f79b10dc495937b', 'carlkant', 0, 'jelou', 'bogota', 1, 1, NULL, 0),
(6, 'carlosrojas', '07956ac590035ebd3f79b10dc495937b', 'carl@dispostable.com', 0, 'hola', 'bogota', 1, 0, NULL, 0),
(7, 'jose4125', '36fdb3cbba1fc8e2af5fc77be647e7a2', 'jos4125', 0, 'no me jodan', 'que le importa', 1, 0, NULL, 0),
(8, 'Jose', '102b4fe641956db45a46824a192f1c48', 'sponzorme@jetogonzalez.co', 0, 'Get Lucky', 'Bogota', 4, 0, NULL, 0),
(9, 'Bournes', '4b2dbeef2a41acf748562e6e9ca79678', 'Alfonsosegura123@hotmail.com', 0, 'ProFTW', 'Bogotá ', 1, 0, NULL, 0),
(10, 'malu_hernandez', 'ead62944668fbb7c3033c569af20d118', 'malu15_24@hotmail.com', 0, 'Malu', 'Bogotá', 1, 0, NULL, 0),
(11, 'MASTER', '8b00d07deaa9ffc877c9d936fbaabbe0', 'fabred2@yahoo.com.ar', 0, 'ninguno', 'ninguna', 1, 0, NULL, 0),
(12, 'Adriana', '4aec69fa1a1489136741737a9850a94e', 'andymar11@hotmail.com', 0, 'Marge', 'Bogotá', 1, NULL, NULL, 0),
(13, 'ale', '78d91ffe75d52835425b23e1b609d4d1', 'alejaf79@hotmail.com', 0, 'diseño grafico', 'bogota', 1, NULL, NULL, 0),
(14, 'Diana Salazar', '095106f9b5b09faafcb7d5af7e15015a', 'dv.dianasalazar@gmail.com', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'Bogotá', 3, NULL, 'http://sponzor.me/images/fotos/m_3.jpg', 1),
(15, 'Naye Rey', 'dc8dda8dfa7b84eae8fd809418a37163', 'nayerey@gmail.com', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'o', 2, NULL, 'http://sponzor.me/images/fotos/m_6.png', 1),
(16, 'Patricia Peña', '738e1ae42c1c5cf608a884732dea182a', 'patricia.pulido@taxa.com.co', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'bogota', 1, NULL, 'http://sponzor.me/images/fotos/m_5.png', 1),
(17, 'Alejita Maldonado', '4f05f338efc494dfcb05a974c002cfc2', 'maleja249@hotmail.com', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'Bogotá', 2, NULL, 'http://sponzor.me/images/fotos/m_1.jpg', 1),
(18, 'fjroldan', 'fcea920f7412b5da7be0cf42b8c93759', 'fjroldan09@gmail.com', 0, 'Aja', 'Bogota', 1, NULL, 'http://t3.gstatic.com/images?q=tbn:ANd9GcRFqpzReidFVgRk2B6O3Epmw_bWquzDmx-LBV7QuYRJPg6afQA7ww', 0),
(19, 'Alexander Gomez', 'ea5c1690554a44616d583ff3993003df', 'alexander.gomez.higuita@gmail.com', 0, 'DreamTales', 'Colombia', 3, NULL, NULL, 0),
(20, 'p_jaro', '680f007608a1d36cda3f284217435af7', 'p_jaro@yahoo.com', 0, 'Runcho', 'Bogotá ', 1, NULL, NULL, 0),
(21, 'marioyfranco', '7e77bb08abef04eb83b7a0290a2fa499', 'marioyfranco@gmail.com', 0, 'No hay slogan', 'Bogotá', 1, NULL, NULL, 0),
(22, '0', 'cfcd208495d565ef66e7dff9f98764da', '0', 0, '0', '0', 1, NULL, NULL, 0),
(23, '0', 'cfcd208495d565ef66e7dff9f98764da', '0', 0, '0', '0', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usr_details`
--

CREATE TABLE IF NOT EXISTS `usr_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_id` int(11) NOT NULL,
  `k` varchar(255) NOT NULL,
  `v` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usr_details_1` (`usr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `element`
--
ALTER TABLE `element`
  ADD CONSTRAINT `fk_element_1` FOREIGN KEY (`usr_id`) REFERENCES `usr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usr`
--
ALTER TABLE `usr`
  ADD CONSTRAINT `fk_usr_1` FOREIGN KEY (`typeof_id`) REFERENCES `typeof` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usr_details`
--
ALTER TABLE `usr_details`
  ADD CONSTRAINT `fk_usr_details_1` FOREIGN KEY (`usr_id`) REFERENCES `usr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
