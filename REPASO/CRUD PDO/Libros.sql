
-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-01-2022 a las 10:01:32
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

--SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
--SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `libros`
--

--DROP DATABASE IF EXISTS `libros`;
--CREATE DATABASE `libros`;
--USE DATABASE `libros`;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(100) AUTO_INCREMENT,
  `isbn` varchar(13) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `stock` smallint(5) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `book`
--

INSERT INTO `book` ( `isbn`, `title`, `author`, `stock`, `price`) VALUES
('9788419108754', 'Libro1', 'Miguel', 20, 25),
('9788465408754', 'Libro2', 'Antonio', 10, 15),
('5364721956847', 'Libro3', 'Juan', 15, 20),
('6321419568476', 'Libro4', 'Pedro', 10, 10),
('6321412864775', 'Libro5', 'Arturo', 25, 5),
('9784419108754', 'Libro6', 'Angel', 24, 23),
('9783465408754', 'Libro7', 'Carmen', 16, 12),
('5364721756847', 'Libro8', 'Alberto', 12, 21),
('6321419968474', 'Libro9', 'Alvaro', 18, 14),
('6321412064773', 'Libro10', 'Fernando', 23, 53),
('9788419378754', 'Libro11', 'Guillermo', 20, 27),
('9128465408754', 'Libro12', 'Pedro', 10, 19),
('8367721956847', 'Libro13', 'Carla', 15, 28),
('3243243432434', 'Libro14', 'Luis', 10, 13),
('2343243243244', 'Libro15', 'Ivan', 24, 9),
('3465789654653', 'Libro16', 'Ana', 22, 21),
('9873268764893', 'Libro17', 'Diego', 11, 11),
('5364321956847', 'Libro18', 'Gonzalo', 18, 22),
('6321419578479', 'Libro19', 'Alba', 16, 17),
('6321412664777', 'Libro20', 'Lucia', 23, 3),
('9788415108754', 'Libro21', 'Maria', 20, 30),
('9788464408754', 'Libro22', 'Sara', 17, 12),
('5364731956847', 'Libro23', 'Tania', 13, 22),
('6321412568475', 'Libro24', 'Angela', 32, 18),
('6321412814770', 'Libro25', 'Paula', 24, 37),
('9788419138754', 'Libro26', 'Elena', 31, 38),
('8932746767833', 'Libro27', 'Rebeca', 30, 32),
('5364741956847', 'Libro28', 'Irene', 5, 22),
('6321423568471', 'Libro29', 'Blanca', 7, 17),
('6321735864770', 'Libro30', 'Pablo', 26, 6),
('8327455786660', 'Libro31', 'Rafa', 14, 15),
('9843756877487', 'Libro32', 'Ruben', 11, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `borrowed_books`
--

CREATE TABLE IF NOT EXISTS `borrowed_books` (
  `costumer_id` int(10) NOT NULL DEFAULT '0',
  `book_id` int(10) NOT NULL DEFAULT '0',
  `empezar` datetime NOT NULL,
  `fin` datetime DEFAULT NULL,
  PRIMARY KEY (`costumer_id`,`book_id`,`empezar`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costumer`
--

CREATE TABLE IF NOT EXISTS `costumer` (
  `id` int(10) NOT NULL DEFAULT '0',
  `firstname` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `type` enum('basic','premium') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `id` int(10) NOT NULL DEFAULT '0',
  `costumer_id` int(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale_book`
--

CREATE TABLE IF NOT EXISTS `sale_book` (
  `book_id` int(10) NOT NULL DEFAULT '0',
  `sale_id` int(10) NOT NULL DEFAULT '0',
  `amount` smallint(5) DEFAULT NULL,
  PRIMARY KEY (`book_id`,`sale_id`),
  KEY `sale_id` (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD CONSTRAINT `borrowed_books_ibfk_1` FOREIGN KEY (`costumer_id`) REFERENCES `costumer` (`id`),
  ADD CONSTRAINT `borrowed_books_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`);

--
-- Filtros para la tabla `sale_book`
--
ALTER TABLE `sale_book`
  ADD CONSTRAINT `sale_book_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `sale_book_ibfk_2` FOREIGN KEY (`sale_id`) REFERENCES `sale` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;





