-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-12-2020 a las 04:08:20
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `IDPago` int(11) NOT NULL,
  `ClvTranscc` varchar(250) NOT NULL,
  `IDUsuario` int(11) NOT NULL,
  `Direccion` varchar(250) NOT NULL,
  `Ciudad` varchar(250) NOT NULL,
  `Estado` varchar(250) NOT NULL,
  `Pais` varchar(250) NOT NULL,
  `CP` varchar(250) NOT NULL,
  `NumTel` varchar(250) NOT NULL,
  `FormaPago` varchar(100) NOT NULL,
  `TotalOriginal` float NOT NULL,
  `TotalFinal` float NOT NULL,
  `Impuesto` float NOT NULL,
  `Cupones` varchar(255) NOT NULL,
  `Digitos` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`IDPago`, `ClvTranscc`, `IDUsuario`, `Direccion`, `Ciudad`, `Estado`, `Pais`, `CP`, `NumTel`, `FormaPago`, `TotalOriginal`, `TotalFinal`, `Impuesto`, `Cupones`, `Digitos`) VALUES
(1, '', 1, 'Caldero chorreante #209', 'Aguascalientes', 'Aguascalientes', '', '20030', '449-414-4851', 'OXXO', 450, 0, 0, '', ''),
(2, '', 2, 'Caldero chorreante #209', 'Aguascalientes', 'Aguascalientes', '', '20030', '449-414-4851', 'Santander', 450, 0, 0, '', ''),
(3, 'jcpbdflp6fo78abnu49cl6bfg2', 3, 'Privada Norberto Gómez Hornedo #105 Col. Gremial', 'Aguascalientes', 'Aguascalientes', '', '20030', '449-554-1891', 'BBVA Bancomer', 0, 0, 0, '', ''),
(4, 'jcpbdflp6fo78abnu49cl6bfg2', 4, 'Privada Norberto Gómez Hornedo #105 Col. Gremial', 'Aguascalientes', 'Aguascalientes', '', '20030', '449-554-1891', 'BBVA Bancomer', 0, 0, 0, '', ''),
(5, '', 5, 'Privada Norberto Gómez Hornedo #105 Col. Gremial', 'Aguascalientes', 'Select Your State or Province', '', '20030', '449-554-1891', 'Santander', 0, 0, 0, '', ''),
(6, '', 6, 'Privada Norberto Gómez Hornedo #105 Col. Gremial', 'Aguascalientes', 'Select Your State or Province', '', '20030', '449-554-1891', 'Santander', 0, 0, 0, '', ''),
(7, 'jcpbdflp6fo78abnu49cl6bfg2', 5, 'Privada Norberto Gómez Hornedo #105 Col. Gremial', 'Aguascalientes', 'Select Your State or Province', '', '20030', '449-554-1891', 'BBVA Bancomer', 587, 0, 0, '', ''),
(8, 'jcpbdflp6fo78abnu49cl6bfg2', 5, 'Privada Norberto Gómez Hornedo #105 Col. Gremial', 'Aguascalientes', 'ags', '', '20030', '449-554-1891', 'BBVA Bancomer', 587, 0, 0, '', ''),
(9, 'jcpbdflp6fo78abnu49cl6bfg2', 5, 'Privada Norberto Gómez Hornedo #105 Col. Gremial', 'Aguascalientes', 'Aguascalientes', '', '20030', '449-554-1891', 'OXXO', 587, 0, 0, '', ''),
(10, 'jcpbdflp6fo78abnu49cl6bfg2', 5, 'Privada Norberto Gómez Hornedo #105 Col. Gremial', 'Aguascalientes', 'Aguascalientes', '', '20030', '449-554-1891', 'OXXO', 587, 0, 0, '', ''),
(11, 'jcpbdflp6fo78abnu49cl6bfg2', 5, 'Privada Norberto Gómez Hornedo #105 Col. Gremial', 'Aguascalientes', 'Aguascalientes', '', '20030', '449-554-1891', 'OXXO', 587, 0, 0, '', ''),
(12, 'jcpbdflp6fo78abnu49cl6bfg2', 5, 'Privada Norberto Gómez Hornedo #105 Col. Gremial', 'Aguascalientes', 'Aguascalientes', '', '20030', '449-554-1891', 'OXXO', 587, 0, 0, '', ''),
(13, 'jcpbdflp6fo78abnu49cl6bfg2', 5, 'Privada Norberto Gómez Hornedo #105 Col. Gremial', 'Aguascalientes', 'Aguascalientes', '', '20030', '449-554-1891', 'OXXO', 587, 0, 0, '', ''),
(14, 'jcpbdflp6fo78abnu49cl6bfg2', 5, 'Privada Norberto Gómez Hornedo #105 Col. Gremial', 'Aguascalientes', 'Aguascalientes', '', '20030', '449-554-1891', 'OXXO', 587, 0, 0, '', ''),
(15, 'jcpbdflp6fo78abnu49cl6bfg2', 5, 'Privada Norberto Gómez Hornedo #105 Col. Gremial', 'Aguascalientes', 'Aguascalientes', '', '20030', '449-554-1891', 'OXXO', 587, 0, 0, '', ''),
(16, '8vmb1vk7h0vmrjvmeh1stg2s7c', 20, 'Campana de la Libertada #115', 'Aguascalientes', 'Aguascalientes', 'MX', '20060', '123-456-7891', 'BBVA Bancomer', 0, 0, 0, '', ''),
(17, 'nqcejr55hu1527s7hblnvebd4m', 20, 'Campana de la Libertada #115', 'Aguascalientes', 'Aguascalientes', 'MX', '20060', '123-456-7891', 'BBVA Bancomer', 480, 628, 48, '-10% de descuento del total de la compra [$63.36] \'\n\'Cervezas al 2x1 \'\n\'', ''),
(18, 'in23e0rvk2n8eevn13p0quend0', 21, 'Lomas turbas #69', 'TeloEnsancho', 'León', 'MX', '4500', '111-444-8979', 'Santander', 960, 1056, 96, '-10% de descuento del total de la compra [$90.72] \'\n\'Cervezas al 2x1 \'\n\'', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`IDPago`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `IDPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
