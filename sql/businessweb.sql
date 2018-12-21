-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2018 a las 22:13:53
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `businessweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactuser`
--

CREATE TABLE `contactuser` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phoneNumber` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contactuser`
--

INSERT INTO `contactuser` (`id`, `name`, `phoneNumber`, `email`, `message`) VALUES
(1, 'Alexis Dominguez', '6391665723', 'alexisdominguezsanchez1@gmail.com', 'Mensaje de prueba para ver si todo estÃ¡ funcionando correctamente.'),
(2, 'Alexis Dominguez', '6391665723', 'alexisdominguezsanchez1@gmail.com', 'Mensaje de prueba para ver si todo está funcionando correctamente.'),
(3, 'Susana Sánchez Longoria', '6391202313', 'susanasanchezlongoria@gmail.com', '¡Hola!\r\nAcabo de conocer su servicio y estoy interesada en lo que ofrecen.\r\n¡Espero y se pongan en contacto pronto!\r\n¡Que tengan buen día!'),
(4, 'Susana Sánchez Longoria', '6391202313', 'susanasanchezlongoria@gmail.com', '¡Hola!\r\nAcabo de conocer su servicio y estoy interesada en lo que ofrecen.\r\n¡Espero y se pongan en contacto pronto!\r\n¡Que tengan buen día!'),
(5, 'Alberto Domínguez Durán', '6391982312', 'albertodominguezduran@gmail.com', 'Muy buenas tardes.\r\nEstoy interesado en su servicios.\r\nFavor de ponerse en contacto conmigo.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactuser`
--
ALTER TABLE `contactuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactuser`
--
ALTER TABLE `contactuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
