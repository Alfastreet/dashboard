-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-09-2022 a las 15:33:36
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alfastreet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accountants`
--

DROP TABLE IF EXISTS `accountants`;
CREATE TABLE IF NOT EXISTS `accountants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `machine_id` int(11) NOT NULL,
  `casino_id` int(11) NOT NULL,
  `day_init` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `day_end` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `month_id` int(11) NOT NULL,
  `year` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cashin` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cashout` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `bet` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `win` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `profit` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `jackpot` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `gamesplayed` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `coljuegos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `admin` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `total` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `alfastreet` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `accountants`
--

INSERT INTO `accountants` (`id`, `machine_id`, `casino_id`, `day_init`, `day_end`, `month_id`, `year`, `cashin`, `cashout`, `bet`, `win`, `profit`, `jackpot`, `gamesplayed`, `coljuegos`, `admin`, `total`, `alfastreet`, `image`) VALUES
(32, 16, 18, '1', '12', 6, '2022', '22519000', '15741540', '52712990', '45935550', '6777460', '0', '78574', '813295.2', '8132.952', '5811616.848', '2324646.7392', '1661173192_logopng.png'),
(33, 16, 18, '1', '12', 7, '2022', '7145000', '6045000', '18374070', '17274000', '1100000', '0', '32893', '132000', '1320', '822265', '328906', '1661173245_logopng.png'),
(35, 17, 18, '1', '12', 6, '2022', '29156000', '24972340', '64708710', '60525050', '4183660', '0', '80648', '502039.2', '5020.392', '3532185.408', '1412874.1632', '1661173369_logopng.png'),
(36, 17, 18, '1', '12', 7, '2022', '9404000', '7387950', '22518650', '20502600', '2016050', '0', '40128', '241926', '2419.26', '1627289.74', '650915.896', '1661173410_logopng.png'),
(37, 4, 18, '1', '12', 6, '2022', '32739000', '19266060', '86710470', '73237530', '13472940', '0', '102964', '1616752.8', '16167.528', '11695604.672', '4678241.8688', '1661290550_depositphotos_6240474-stock-photo-test-word-on-keyboard.jpg'),
(38, 4, 18, '1', '12', 7, '2022', '10716000', '7354300', '30536330', '27174630', '3361700', '0', '40333', '403404', '4034.04', '2809846.96', '1123938.784', '1661290615_depositphotos_6240474-stock-photo-test-word-on-keyboard.jpg'),
(39, 5, 18, '1', '12', 6, '2022', '27006000', '17618490', '65051360', '55663870', '9387510', '0', '108849', '1126501.2', '11265.012', '8105328.788', '3242131.5152', '1661290700_depositphotos_6240474-stock-photo-test-word-on-keyboard.jpg'),
(40, 5, 18, '1', '12', 7, '2022', '9116000', '8937190', '19801980', '19623170', '178810', '0', '20865', '21457.2', '214.572', '12723.228', '5089.2912', '1661290746_07-08-16-thumb.webp'),
(42, 15, 19, '1', '30', 6, '2022', '21462000', '14787160', '50178150', '43503310', '6674840', '0', '72656', '800980.8', '8009.808', '5721434.392', '2288573.7568', '1661291189_07-08-16-thumb.webp'),
(43, 15, 19, '1', '30', 7, '2022', '22519000', '15741540', '52712990', '45935550', '6777460', '0', '78574', '813295.2', '8132.952', '5811616.848', '2324646.7392', '1661291253_07-08-16-thumb.webp'),
(45, 5, 18, '1', '12', 5, '2022', '9116000', '8937190', '19801980', '19623170', '178810', '0', '20865', '21457.2', '214.572', '12723.228', '5089.2912', '1661290746_07-08-16-thumb.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accountantsdetails`
--

DROP TABLE IF EXISTS `accountantsdetails`;
CREATE TABLE IF NOT EXISTS `accountantsdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accountants_id` int(11) NOT NULL,
  `details_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accountantsstatus`
--

DROP TABLE IF EXISTS `accountantsstatus`;
CREATE TABLE IF NOT EXISTS `accountantsstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `business`
--

DROP TABLE IF EXISTS `business`;
CREATE TABLE IF NOT EXISTS `business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nit` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `owner_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `business`
--

INSERT INTO `business` (`id`, `name`, `nit`, `phone`, `address`, `email`, `owner_id`) VALUES
(1, 'QUINTOR-TC GROUP SAS', '9001912371', '6013906922', 'CALLE 148 104 20 LOCAL 2 01', 'correo@example.com', 1),
(2, 'JG LOZANO-BEMSLOT', 'xxxxxx', 'xxxxx', 'AV. LA PLAYA # 3 A 75', 'default@correo.com', 1),
(3, 'OPALSA', '111111111', '111111111', 'CALLE 4 # 10-40', 'correo@correo.com', 1),
(4, 'GAMBLER GROUP.', '9000722751', '6017451932', 'CALLE 52 B 72 B 21', 'correo@correo.com', 1),
(5, 'WILD PLAY ELECT.', '8301291130', '6012733720', 'CARRERA 79 42 03 SUR P 2', 'correo@correo.com', 1),
(6, 'SUPERNUEVOMILENIO', '1111111', '11111111', 'CENTRO COMERCIAL PORTAL 80 LOCAL 004 PISO 3', 'correo@correo.com', 1),
(7, 'FOX TECHNOLOGIES', '8002567451', '6028857458', 'CARRERA 4 10 44 OF 201', 'correo@correo.com', 1),
(8, 'Egasa Colombia Sas', '9005391309', '6016558270', 'CALLE 90 14 26 OF 502', 'correo@correo.com', 1),
(9, 'SUPER ROYAL CARIBE', '11111111', '11111111', '111111111', 'correo@correo.com', 1),
(10, 'INVECOSTA', '111111111', '1111111111', '111111111', 'correo@correo.com', 1),
(11, 'GRUPO DE ENTRETENIMIENTO NAL. GEN S.A.S.', '9004666423', '3102097654', 'CALLE 22 SUR 19 B 23', 'correo@correo.com', 1),
(12, 'Silver Group International sas', '900620140-8', '8852069', 'Calle 1 # 5 45', 'correo@correo.com', 1),
(13, 'Inversiones Madison ', '1111111', '1111111', '111111', 'correo@correo.com', 1),
(14, 'INNOVACIONES TL SAS', '9010066954', '3218554945', 'CALLE 59 2 103', 'correo@correo.com', 1),
(15, 'Inversiones Diamonds', '820004564-5', '3153162121', 'Cra. 16 #14-69', 'correo@correo.com', 1),
(16, 'CASINOS Y NEGOCIOS LA ESTRELLA S.AS', '830090001-3', '2901685', 'CARRERA 97 24 C 51 BODEGA 13', 'correo@correo.com', 1),
(17, 'GI SAN PEDRO', '900424768-2', '3124546057', 'CARRERA 12 97 44', 'correo@correo.com', 1),
(18, 'FAIRPLAY GROUP', '900148555-7', '3204399222', 'Calle. 24b Sur #70b-44', 'correo@correo.com', 1),
(19, 'DIVERSIONES DEL ORIENTE S.A.S', '90058556-6', '3152699819', 'ECOPARQUE NATURA TORRE 3 OFICINA 450', 'CONTACTENOS@DIRVERSIONESDELORIENTE.COM', 1),
(20, 'DORAL GROUP S.A.', '900581479-0', '315 6156536', 'CALLE. 37 #No 14 - 53', 'correo@correo.com', 1),
(21, 'GRUPO DE ENTRETENIMIENTO NACIONAL GEN S.A.S.', '900466642-3', '3213847122', 'CALLE 22 SUR 19 B 23', 'correo@correo.com', 1),
(22, ' SUPER NUEVO MILENIO SA', '1231231321', '3224008100', 'CALLE 90 # 14-26 OF 502', 'analistacompras@viccagroup.co', 3),
(23, 'EGASA COLOMBIA SAS', '1231312312', '123132132', 'CALLE 90 # 14-26 OF 502	', 'analistacompras@viccagroup.co', 3),
(24, 'ASASR SAS', '81104185-5', '3216361263', 'CALLE 49 # 51 - 15', 'casinoparaiso@gmail.com', 1),
(28, 'TC GROUP S.A.S', '900191237-1', '321 4303670', 'Cl. 23g #84-06', 'correo@correo.com', 1),
(29, 'INVERSIONES DIVERWEB SAS', '9000183847', '3137473376', 'CARRERA 51 48 35', 'correo@correo.com', 1),
(30, 'DIVERSIONES JER ', '9011584168', '3132614488', 'Cl. 50a Sur #86a-54', 'correo@correo.com', 1),
(31, 'CONSULTORES INTEGRALES PARA LA PREVENCION DEL RIESGO EN SEGURIDAD S.A.S', '9011011587', '3204735890', 'Cra. 58 #137B-01', 'correo@correo.com', 1),
(33, 'DIVERSIMA S.A.S', '9010369853', '3203063282', 'CARRERA 10 9 82', 'correo@correo.com', 1),
(34, 'CASINO BRASIL 2', '1111111111', '3208451268', 'CALLE 22 SUR 19 B 23', 'correo@correo.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casinos`
--

DROP TABLE IF EXISTS `casinos`;
CREATE TABLE IF NOT EXISTS `casinos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `casinos`
--

INSERT INTO `casinos` (`id`, `name`, `phone`, `address`, `city_id`, `state_id`, `owner_id`, `business_id`, `image`, `token`) VALUES
(1, 'Casino Centro Comercial Gran Estacion', '11111111', 'CALLE 26 # 62-47', 1, 1, 1, 1, '1659037647_07-08-16-thumb.webp', '6328a44f5ae61'),
(2, 'Casino AV La Playa San Andres', '123456', 'AV. LA PLAYA # 3 A 75', 26, 26, 1, 2, '1659037420_07-08-16-thumb.webp', '6328a436bb9c5'),
(3, 'CALLE 4 # 10-40', '1111111', 'CALLE 4 # 10-40', 33, 27, 1, 3, '1659545004_07-08-16-thumb.webp', '63063ae2c326e'),
(4, 'CARRERA 18 # 18-22 SUR', '111111111', 'CARRERA 18 # 18-22 SUR', 1, 1, 1, 4, '1659545060_07-08-16-thumb.webp', '63063ae66b732'),
(5, 'CARRERA 79 # 42-03 SUR', '11111111', 'CARRERA 79 # 42-03 SUR', 1, 1, 1, 5, '1659545084_07-08-16-thumb.webp', '63063ae94bfc2'),
(6, 'Casino C.C Portal 80', '1111111111', 'CENTRO COMERCIAL PORTAL 80 LOCAL 004 PISO 3', 1, 1, 1, 6, '1659545157_07-08-16-thumb.webp', '6328a46256942'),
(7, 'CARRERA 10 # 27-27', '111111111', 'CARRERA 10 # 27-27', 1, 1, 1, 7, '1659545191_07-08-16-thumb.webp', '63063af268fdc'),
(8, 'Egasa Colombia Sas', '111111111', 'CALLE 90 14 26 OF 502', 1, 1, 1, 22, '1659545230_07-08-16-thumb.webp', '63063af6d745a'),
(9, 'Casino CENTRO COMERCIAL BUENA VISTA', '11111111', 'CALLE 98 # 52-05 PISO 4. CENTRO COMERCIAL BUENA VISTA 1 PISO 4 ', 1, 1, 1, 9, '1659545251_07-08-16-thumb.webp', '6328a47565913'),
(10, 'CARRERA 2 # 5-63', '11111111', 'CARRERA 2 # 5-63', 34, 1, 1, 11, '1659552127_07-08-16-thumb.webp', '63063d846193f'),
(11, 'Casino Faca', '1231', '12312', 34, 1, 1, 12, '1659632475_07-08-16-thumb.webp', '63063d900b3f0'),
(12, 'Casino Madison', '121212', 'Calle 50 # 47-12', 3, 3, 1, 13, '1659650630_07-08-16-thumb.webp', '63063d9c267ea'),
(13, 'Casinos TL', '3218554945', 'CALLE 59 2 103', 30, 30, 1, 14, '1659715546_07-08-16-thumb.webp', '63063da7c2e81'),
(14, 'Diamons', '3,153,162,121', 'Cra. 16 #14-69', 35, 7, 1, 15, '1659978240_07-08-16-thumb.webp', '63063dae0d38d'),
(15, 'CANELE S.A.S', '2901685', 'CARRERA 97 24 C 51 BODEGA 13', 1, 1, 1, 16, '1659984675_07-08-16-thumb.webp', '63063db9d2993'),
(16, 'GI SAN PEDRO', '3124546057', 'CARRERA 12 97 44', 1, 1, 1, 17, '1659993408_07-08-16-thumb.webp', '63063df7d4f4c'),
(17, 'DIVERSIONES DEL ORIENTE S.A.S', '3152699819', 'ECOPARQUE NATURA TORRE 3 OFICINA 450', 12, 12, 1, 19, '1660055329_07-08-16-thumb.webp', '63063dfe7e71d'),
(18, 'HIPODROMO DE BUCARAMANGA', '315 6156536', 'CARRERA 15 #36-44', 27, 27, 1, 20, '1660061341_07-08-16-thumb.webp', '6306396883672'),
(19, 'CASINO VERANO', '3213847122', 'CALLE 22 SUR 19 B 23', 34, 1, 1, 21, '1660070514_07-08-16-thumb.webp', '63063e0946773'),
(20, 'SUPER NUEVO MILENIO SA', '6046558270', 'CALLE 90 # 14-26 OF 502', 1, 1, 1, 22, '1661189944_07-08-16-thumb.webp', '63063e170fbaf'),
(21, 'GRAND CASINO RESTREPO', '3204931730', 'CALLE 24B SUR #70B - 44', 1, 1, 1, 18, '1661268498_07-08-16-thumb.webp', ''),
(22, 'Egasa Colombia Sas', '6558270', 'CALLE 90 14 26 OF 502', 1, 1, 3, 23, '1661281336_07-08-16-thumb.webp', ''),
(23, 'TC GROUP S.A.S', '321 4303670', 'Cl. 23g #84-06', 1, 1, 1, 28, '1662409686_07-08-16-thumb.webp', '63165bd60ceca'),
(24, 'INVERSIONES DIVERWEB SAS', '3137473376', 'CARRERA 51 48 35', 37, 3, 1, 29, '1662410706_07-08-16-thumb.webp', '63165fd2ec46c'),
(25, 'DIVERSIONES JER ', '3132614488', 'Cl. 50a Sur #86a-54', 1, 1, 1, 30, '1662471884_07-08-16-thumb.webp', '63174eccbbdcc'),
(26, 'CONSULTORES INTEGRALES PARA LA PREVENCION DEL RIESGO EN SEGURIDAD S.A.S', '3204735890', 'Cra. 58 #137B-01', 1, 1, 1, 31, '1662472092_07-08-16-thumb.webp', '63174f9c208a0'),
(28, 'DIVERSIMA S.A.S', '3203063282', 'CARRERA 10 9 82', 38, 1, 1, 33, '1662479239_07-08-16-thumb.webp', '63176bd50f7fe'),
(29, 'CASINO BRASIL 2', '3208451268', 'CALLE 22 SUR 19 B 23', 1, 1, 1, 34, '1662481132_07-08-16-thumb.webp', '631772ec1d6d4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `city`
--

INSERT INTO `city` (`id`, `name`, `state_id`) VALUES
(1, 'Bogotá', 1),
(2, 'Leticia', 2),
(3, 'Medellin', 3),
(4, 'Arauca', 4),
(5, 'Barranquilla', 5),
(6, 'Cartagena', 6),
(7, 'Tunja', 7),
(8, 'Manizales', 8),
(9, 'Florencia', 9),
(10, 'Yopal', 10),
(11, 'Popayan', 11),
(12, 'Valledupar', 12),
(13, 'Quibdo', 13),
(14, 'Monteria', 14),
(15, 'Inirida', 15),
(16, 'San José del Guaviare', 16),
(17, 'Neiva', 17),
(18, 'Rioacha', 18),
(19, 'Santa Marta', 19),
(20, 'Villavicencio', 20),
(21, 'Pasto', 21),
(22, 'Cucuta', 22),
(23, 'Mocoa', 23),
(24, 'Armenia', 24),
(25, 'Pereira', 25),
(26, 'San Andres', 26),
(27, 'Bucaramanga', 27),
(28, 'Sinselejo', 28),
(29, 'Ibague', 29),
(30, 'Cali', 30),
(31, 'Mitu', 31),
(32, 'Puerto Carreño', 32),
(33, 'Quilichao', 27),
(34, 'Facatativa', 1),
(35, 'Paipa', 7),
(36, 'FLORIDABLANCA', 27),
(37, 'ITAGUI', 3),
(38, 'CHIA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `position_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`id`, `name`, `phone`, `email`, `position_id`, `business_id`, `token`) VALUES
(9, 'Jesus Hernando Castro', '3045924492', 'Castrosilgroup@gmail.com', 3, 12, '62ebf9132f6cd'),
(10, 'Sergio Correa Fierro', '3164466804', 'sacfierro@gmail.com', 1, 13, '62ec428c86dd5'),
(11, 'Amalia Camargo', '3153162121', 'correo@correo.com', 1, 15, '62f1413325cad'),
(12, 'OSCAR RODRIGUEZ', '2901685', 'correo@correo.com', 1, 16, '62f15ab60f55e'),
(13, 'ALEJANDRO SALAZAR', '3124546057', 'correo@correo.com', 1, 17, '62f17d066144b'),
(14, 'JOHN FREDDY BERNAL', '3204931730', 'correo@correo.com', 1, 18, '6304f46065a5e'),
(15, 'ERIKA JOHANA BOLIVAR MEJIA', '3152699819', 'correo@correo.com', 1, 19, '62f26f9023f5f'),
(16, 'ANA MARIA PATIÑO', '315 6156536', 'correo@correo.com', 1, 20, '62f2864f9bc6d'),
(17, 'Jorge Enrique Arbelaez', '3213847122', 'correo@correo.com', 1, 21, '62f2a9c7ea8fe'),
(18, 'ANGIE CATALINA CALDAS', '3224008100', 'analistacompras@viccagroup.co', 2, 22, '6303becee8dd5'),
(19, 'GERARDO RODRIGUEZ', '3204399222', 'correo@correo.com', 1, 18, '63050142356fb'),
(20, 'ANGIE CATALINA CALDAS', '3224008100', 'analistacompras@viccagroup.co', 2, 23, '6305247cb0d02'),
(21, 'Olga Herrera', '321 4303670', 'correo@correo.com', 1, 28, '63165bbb111be'),
(22, 'Juan Henao', '3137473376', 'correo@correo.com', 1, 29, '63165f91de140'),
(23, 'JAIME MORA', '3132614488', 'correo@correo.com', 1, 30, '63174eb7d6ea2'),
(24, 'MARIO QUINTERO', '3204735890', 'correo@correo.com', 1, 31, '63174f8c0a230'),
(33, 'NELSON ALFONSO', '3203063282', 'correo@correo.com', 1, 33, '631771159cbc4'),
(34, 'WILLIAM FERNANDO HERNANDEZ SANCHEZ', '3208451268', 'correo@correo.com', 1, 34, '631772d3a3923');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientposition`
--

DROP TABLE IF EXISTS `clientposition`;
CREATE TABLE IF NOT EXISTS `clientposition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientposition`
--

INSERT INTO `clientposition` (`id`, `position`) VALUES
(1, 'Gerente'),
(2, 'Contadores'),
(3, 'Tecnico\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientscasinos`
--

DROP TABLE IF EXISTS `clientscasinos`;
CREATE TABLE IF NOT EXISTS `clientscasinos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `casino_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientscasinos`
--

INSERT INTO `clientscasinos` (`id`, `client_id`, `casino_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2),
(4, 7, 1),
(5, 7, 10),
(6, 9, 11),
(7, 8, 10),
(8, 10, 12),
(9, 11, 14),
(10, 12, 15),
(11, 12, 15),
(12, 13, 16),
(13, 15, 17),
(14, 16, 18),
(15, 17, 19),
(16, 18, 20),
(17, 18, 8),
(18, 14, 21),
(19, 19, 21),
(20, 18, 22),
(21, 20, 22),
(22, 21, 23),
(23, 22, 24),
(24, 23, 25),
(25, 24, 26),
(26, 25, 27),
(28, 26, 28),
(29, 27, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `business_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`id`, `name`, `phone`, `address`, `email`, `business_id`) VALUES
(1, 'Alfastreet Colombia Sas', '6016055544', 'Carrera 70c #50 -07', 'ingenieria@alfastreet.co', 1),
(2, 'Compañia de ejemplo 2', '31312322', 'Carrera 1# 25a -89', 'compania@example.com', 2),
(3, 'Otra compañia', '123456', 'Carrera 70c #50 -07', 'compana@exp.com', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contract`
--

DROP TABLE IF EXISTS `contract`;
CREATE TABLE IF NOT EXISTS `contract` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typecontract` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contract`
--

INSERT INTO `contract` (`id`, `typecontract`) VALUES
(1, 'venta'),
(2, 'participacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detailsquotes`
--

DROP TABLE IF EXISTS `detailsquotes`;
CREATE TABLE IF NOT EXISTS `detailsquotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_id` int(11) NOT NULL,
  `typeProduct_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(20) NOT NULL,
  `money_id` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=179 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detailsquotes`
--

INSERT INTO `detailsquotes` (`id`, `quote_id`, `typeProduct_id`, `product_id`, `amount`, `money_id`, `value`) VALUES
(176, 730, 1, 25, 25, 2, '40000'),
(177, 731, 1, 34, 1, 3, '50000'),
(178, 732, 1, 25, 1, 2, '1600'),
(175, 729, 1, 34, 10, 3, '500000'),
(174, 728, 1, 34, 1, 3, '50000'),
(173, 727, 1, 11, 1, 3, '290000'),
(172, 726, 1, 25, 10, 2, '16000'),
(171, 725, 1, 11, 10, 3, '2900000'),
(170, 724, 1, 34, 10, 3, '500000'),
(153, 699, 1, 34, 1, 3, '50000'),
(152, 698, 1, 34, 1, 3, '50000'),
(151, 697, 1, 34, 1, 3, '50000'),
(150, 696, 1, 34, 1, 3, '50000'),
(149, 695, 1, 34, 1, 3, '50000'),
(148, 694, 1, 34, 1, 3, '50000'),
(147, 693, 1, 34, 1, 3, '50000'),
(146, 692, 1, 34, 1, 3, '50000'),
(145, 691, 1, 26, 1, 2, '1033'),
(144, 690, 1, 25, 1, 2, '1600'),
(143, 689, 1, 34, 1, 3, '50000'),
(142, 689, 1, 33, 1, 2, '976'),
(141, 688, 1, 32, 1, 3, '80000'),
(140, 688, 1, 11, 1, 3, '290000'),
(139, 687, 1, 29, 1, 2, '952'),
(138, 686, 1, 24, 1, 3, '2290250'),
(137, 685, 1, 30, 1, 2, '2025'),
(135, 684, 1, 25, 1, 2, '1600'),
(134, 683, 1, 24, 1, 3, '2290250'),
(133, 682, 1, 29, 1, 2, '952'),
(132, 681, 1, 28, 1, 2, '626'),
(131, 680, 1, 27, 1, 2, '196'),
(130, 679, 1, 27, 1, 2, '196'),
(129, 678, 1, 25, 1, 2, '1600'),
(128, 677, 1, 23, 1, 3, '1937250'),
(127, 676, 1, 21, 1, 2, '70'),
(126, 675, 1, 12, 1, 3, '30000'),
(125, 675, 1, 11, 1, 3, '290000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidation`
--

DROP TABLE IF EXISTS `liquidation`;
CREATE TABLE IF NOT EXISTS `liquidation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accountants_id` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `accountantsstatus_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `machinepart`
--

DROP TABLE IF EXISTS `machinepart`;
CREATE TABLE IF NOT EXISTS `machinepart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `machine_id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `machinepart`
--

INSERT INTO `machinepart` (`id`, `machine_id`, `part_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `machines`
--

DROP TABLE IF EXISTS `machines`;
CREATE TABLE IF NOT EXISTS `machines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idint` int(11) DEFAULT NULL,
  `serial` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `yearModel` int(10) NOT NULL,
  `model_id` int(11) NOT NULL,
  `maker_id` int(11) NOT NULL,
  `warranty` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `height` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `width` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `display` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `dateInstalling` datetime NOT NULL,
  `casino_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `cheked` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `machines`
--

INSERT INTO `machines` (`id`, `idint`, `serial`, `name`, `yearModel`, `model_id`, `maker_id`, `warranty`, `image`, `height`, `width`, `display`, `dateInstalling`, `casino_id`, `owner_id`, `company_id`, `contract_id`, `cheked`) VALUES
(4, 0, '2013-12-3043', '2013-12-3043', 2014, 1, 1, '2 Años', '123.jpg', '200', '200', '1', '2014-07-27 00:00:00', 18, 1, 1, 2, 0),
(5, 0, '2013-12-3045', '2013-12-3045', 2014, 1, 1, '2 AÑOS', '123.jpg', '200', '400', '2', '2014-05-08 00:00:00', 18, 1, 1, 2, 0),
(6, 0, '2014-02-3059', '2014-02-3059', 2014, 1, 1, '2 Años', '123.jpg', '200', '400', '1', '2014-06-09 00:00:00', 3, 1, 1, 1, 0),
(7, 0, '3314-06-0006', '3314-06-0006', 2019, 9, 1, '2 Años', '123.jpg', '12222', '2222', '2', '2019-02-22 00:00:00', 10, 1, 1, 2, 0),
(8, 0, '2014-10-3110', '2014-10-3110', 2014, 1, 1, '2 Años', '123.jpg', '200', '400', '1', '2022-08-04 12:01:36', 11, 1, 1, 1, 0),
(9, 0, '2017-04-3424', '2017-04-3424', 2017, 1, 1, '2 Años', '123.jpg', '200', '400', '1', '2022-08-04 17:04:10', 12, 1, 1, 1, 0),
(10, NULL, '3819-05-0160', '3819-05-0160', 2020, 6, 1, '2 Años', '123.jpg', '200', '400', '1', '2022-08-08 12:07:41', 14, 1, 1, 1, 0),
(11, NULL, '3819-06-3819', '3819-06-3819', 2022, 6, 1, '2 AÑOS', '123.jpg', '200', '200', '1', '2022-08-08 13:53:34', 15, 1, 1, 1, 0),
(12, NULL, '2014-10-3105', '2014-10-3105', 2014, 1, 1, '2 Años', '200', '200', '200', '1', '2022-08-08 16:17:35', 16, 1, 1, 1, 0),
(13, NULL, '2014-10-3106', '2014-10-3106', 2014, 1, 1, '2 AÑOS', '200', '200', '200', '1', '2022-08-08 16:18:03', 16, 1, 1, 1, 0),
(14, NULL, '3818-06-0168', '3818-06-0168', 2018, 6, 1, '2 Años', '123.jpg', '200', '400', '1', '2019-02-25 09:32:48', 18, 1, 1, 1, 0),
(15, NULL, '3314-06-0006', '3314-06-0006', 2020, 9, 1, '2 Años', '21', '111', '111', '111', '2019-02-22 00:00:00', 19, 1, 1, 2, 0),
(16, NULL, '3416-01-0011', '3416-01-0011', 2020, 8, 1, '2 AÑOS', '123', '123', '123', '123', '2019-08-29 00:00:00', 18, 1, 1, 2, 0),
(17, NULL, '7979-00-0000', ' 7979-00-0000', 2022, 1, 1, '2 Años', '123.jpg', '200', '400', '1', '2022-08-10 11:15:54', 18, 1, 1, 2, 0),
(18, 27, '2014-10-3107', '2014-10-3107', 2014, 1, 1, '2 Años', '123.jpg', '200', '400', '1', '2015-10-15 12:00:00', 21, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maker`
--

DROP TABLE IF EXISTS `maker`;
CREATE TABLE IF NOT EXISTS `maker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `maker`
--

INSERT INTO `maker` (`id`, `name`) VALUES
(1, 'fabricante 1'),
(2, 'fabricante 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model`
--

DROP TABLE IF EXISTS `model`;
CREATE TABLE IF NOT EXISTS `model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `model`
--

INSERT INTO `model` (`id`, `name`) VALUES
(1, 'R8'),
(2, 'SL1M'),
(3, 'HI-JACK'),
(4, 'R5'),
(5, 'R6'),
(6, 'LUCKY 8'),
(7, 'MULTITOUCH'),
(8, 'ROYAL DERBY'),
(9, 'R4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `money`
--

DROP TABLE IF EXISTS `money`;
CREATE TABLE IF NOT EXISTS `money` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `shortcode` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `value` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `urlData` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `money`
--

INSERT INTO `money` (`id`, `name`, `shortcode`, `value`, `urlData`) VALUES
(1, 'Dolar', 'USD', '4313', 'https://www.banrep.gov.co/es/estadisticas/trm'),
(2, 'Euro', 'EUR', '4521', 'https://www.larepublica.co/indicadores-economicos/mercado-cambiario/euro'),
(3, 'Peso Colombiano', 'COP', '1', 'null');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `month`
--

DROP TABLE IF EXISTS `month`;
CREATE TABLE IF NOT EXISTS `month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `month`
--

INSERT INTO `month` (`id`, `month`) VALUES
(1, 'Enero'),
(2, 'Febrero'),
(3, 'Marzo'),
(4, 'Abril'),
(5, 'Mayo'),
(6, 'Junio'),
(7, 'Julio'),
(8, 'Agosto'),
(9, 'Septiembre'),
(10, 'Octubre'),
(11, 'Noviembre'),
(12, 'Diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `months`
--

DROP TABLE IF EXISTS `months`;
CREATE TABLE IF NOT EXISTS `months` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `months`
--

INSERT INTO `months` (`id`, `month`) VALUES
(1, 'January'),
(2, 'february'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'Juny'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `owner`
--

DROP TABLE IF EXISTS `owner`;
CREATE TABLE IF NOT EXISTS `owner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `phone` int(20) NOT NULL,
  `address` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `owner`
--

INSERT INTO `owner` (`id`, `name`, `phone`, `address`, `email`) VALUES
(1, 'Alexander', 31258871, 'Carrera 70c #50 -07', 'owner@example.com'),
(2, 'Nicolas', 123456, 'Carrer5a', 'carrer@exp.co'),
(3, 'Grupo VICCA', 6558270, 'Cl. 90 # 14-26', 'analistacompras@viccagroup.co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ownercompany`
--

DROP TABLE IF EXISTS `ownercompany`;
CREATE TABLE IF NOT EXISTS `ownercompany` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ownercompany`
--

INSERT INTO `ownercompany` (`id`, `owner_id`, `company_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 2),
(4, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parts`
--

DROP TABLE IF EXISTS `parts`;
CREATE TABLE IF NOT EXISTS `parts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `money_id` int(11) NOT NULL,
  `value` int(20) NOT NULL,
  `amount` int(20) NOT NULL,
  `image` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `parts`
--

INSERT INTO `parts` (`id`, `serial`, `name`, `money_id`, `value`, `amount`, `image`) VALUES
(4, '45005', 'Gas Spring para RISL', 2, 42, 133, '1661879681_07-08-16-thumb.webp'),
(5, '1001074', '3 MECHANICAL COUNTERS IN CASE', 2, 165, 50, '1661878297_07-08-16-thumb.webp'),
(6, '190090', 'ALFASTREET WALL DISPLAY ROULETTE JACKPOT', 2, 175, 1100, ''),
(7, '1001075', '6 MECHANICAL COUNTERS IN CASE', 2, 175, 200, ''),
(8, '1000016', 'ADAPTER CABLE RJ45/DB9-M FOR TS', 2, 6, 998, ''),
(10, '9241', 'ARMREST FOR WHEEL SL BLACK ICE', 2, 65, 1000, ''),
(11, 'ST01', 'VISITA CORRECTIVA Y/O PREVENTIVA', 3, 290000, 999999995, ''),
(12, 'MO-30', 'MOV TECNICA', 3, 30000, 999999999, ''),
(13, 'ST02', 'BORRADO CONTADORES', 3, 120000, 10000000, ''),
(14, 'ST03', 'Actualización RNG', 3, 480000, 100000000, ''),
(15, 'st04', 'Actualización Estacion Juego', 3, 480000, 10000000, ''),
(16, 'ST05', 'Actualización Ruleta R8 - LUCKY 8', 3, 4850000, 100000000, ''),
(17, 'ST06', 'Actualización Ruleta R6', 3, 3560000, 10000000, ''),
(18, 'ST07', 'Actualización Ruleta R5', 3, 2940000, 100000000, ''),
(19, 'ST09', 'Actualización Ruleta R4', 3, 2520000, 100000000, ''),
(20, 'ST10', 'Calibración Touch Screen', 3, 90000, 10000000, ''),
(21, '17008', 'Optical Sensor Receiver 30', 2, 70, 99999, ''),
(22, '1000927', 'KEYBOARD CONTROLLER SMD', 2, 61, 10000000, ''),
(23, '191001', 'TOUCH SCREEN GLASS 21.5\" 3M + CONTROLLER REFURBISHED', 3, 1937250, 9999999, ''),
(24, '191003', 'TOUCH SCREEN GLASS 23\" 3M + CONTROLLER REFURBISHED', 3, 2290250, 999998, ''),
(25, '190113', 'UPS APC SMART-UPS 2200VA SMT2200IC ', 2, 1600, 97, ''),
(26, '190107', 'UPS APC SMART-UPS 1500VA SMT 1500IC ', 2, 1033, 9999999, ''),
(27, '97013', 'POWER SUPPLY BEA-740 450W 24V ', 2, 196, 999998, ''),
(28, '193063', 'MONITOR 21,5\" TOUCH REFURBISHED', 2, 626, 99999999, ''),
(29, '193060', ' MONITOR 23\" + TOUCH REFURBISHED', 2, 952, 999998, ''),
(30, '190119', 'UPS APC SMT3000C AVR SMART CONNECT 3000VA 2700W', 2, 2025, 99998, ''),
(32, 'ST011', 'SERVICIO TECNICO ALFASTREET', 3, 80000, 999999, '1662409836_07-08-16-thumb.webp'),
(33, '193128', 'MONITOR+  TOUCH EUROCOIN DE 23,8”.  ', 2, 976, 9, '1662411435_07-08-16-thumb.webp'),
(34, 'BTNCUX', 'BOTON PARA MAQUINA CUBEX', 3, 50000, 9991, '1662411498_07-08-16-thumb.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quotes`
--

DROP TABLE IF EXISTS `quotes`;
CREATE TABLE IF NOT EXISTS `quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `totalUSD` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `totalEUR` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `totalCOP` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estatus_id` int(11) NOT NULL DEFAULT '2',
  `token` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=733 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `quotes`
--

INSERT INTO `quotes` (`id`, `user_id`, `business_id`, `date`, `totalUSD`, `totalEUR`, `totalCOP`, `estatus_id`, `token`) VALUES
(675, 8, 9, '2022-08-04 17:31:10', '0', '1600', '0', 2, NULL),
(676, 8, 10, '2022-08-04 22:05:48', '0', '1600', '0', 2, NULL),
(677, 8, 11, '2022-08-08 17:28:54', '0', '1600', '0', 2, NULL),
(678, 8, 12, '2022-08-08 19:04:12', '0', '1600', '0', 2, NULL),
(679, 8, 15, '2022-08-09 14:38:19', '0', '1600', '0', 2, NULL),
(680, 8, 16, '2022-08-09 16:12:20', '0', '1600', '0', 2, NULL),
(681, 8, 11, '2022-08-10 19:23:43', '0', '1600', '0', 2, NULL),
(682, 8, 18, '2022-08-22 17:47:23', '0', '1600', '0', 2, NULL),
(683, 8, 18, '2022-08-22 20:43:12', '0', '1600', '0', 2, NULL),
(684, 8, 14, '2022-08-23 15:37:39', '0', '1600', '0', 2, NULL),
(685, 8, 19, '2022-08-23 16:33:54', '0', '1600', '0', 2, NULL),
(686, 8, 18, '2022-08-23 19:00:08', '0', '1600', '0', 2, NULL),
(687, 8, 20, '2022-08-23 19:04:45', '0', '1600', '0', 2, NULL),
(688, 8, 21, '2022-09-05 20:31:02', '0', '1600', '0', 2, NULL),
(689, 8, 22, '2022-09-05 20:58:55', '0', '1600', '0', 2, NULL),
(690, 8, 23, '2022-09-06 13:45:36', '0', '1600', '0', 2, NULL),
(691, 8, 24, '2022-09-06 13:49:30', '0', '1600', '0', 2, NULL),
(699, 8, 33, '2022-09-06 19:47:42', '0', '1600', '0', 2, NULL),
(732, 8, 29, '2022-09-20 15:25:08', '0', '1600', '0', 2, NULL),
(731, 8, 29, '2022-09-14 14:23:50', '0', '1600', '0', 2, NULL),
(730, 8, 31, '2022-09-14 14:20:26', '0', '1600', '0', 2, NULL),
(729, 8, 17, '2022-09-14 14:13:10', '0', '1600', '0', 2, NULL),
(728, 8, 15, '2022-09-14 13:50:49', '0', '1600', '0', 2, NULL),
(727, 14, 18, '2022-09-14 13:49:09', '0', '1600', '0', 2, NULL),
(726, 9, 12, '2022-09-14 13:46:45', '0', '1600', '0', 2, NULL),
(725, 24, 31, '2022-09-14 13:45:32', '0', '1600', '0', 2, NULL),
(724, 17, 21, '2022-09-14 13:39:55', '0', '1600', '0', 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `rol` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `rol`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `money_id` int(11) NOT NULL,
  `value` int(20) NOT NULL,
  `description` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `state`
--

INSERT INTO `state` (`id`, `name`) VALUES
(1, 'Cundinamarca'),
(2, 'Amazonas'),
(3, 'Antioquia'),
(4, 'Arauca'),
(5, 'Atlantico'),
(6, 'Bolivar'),
(7, 'Boyaca'),
(8, 'Caldas'),
(9, 'Caqueta'),
(10, 'Casanare'),
(11, 'Cauca'),
(12, 'Cesar'),
(13, 'Choco'),
(14, 'Cordona'),
(15, 'Guainia'),
(16, 'Guaviare'),
(17, 'Huila'),
(18, 'La Guajira'),
(19, 'Magdalena'),
(20, 'Meta'),
(21, 'Nariño'),
(22, 'Norte de Santander'),
(23, 'Putumayo'),
(24, 'Quindio'),
(25, 'Risaralda'),
(26, 'San Andres y Providencia'),
(27, 'Santander'),
(28, 'Sucre'),
(29, 'Tolima'),
(30, 'Valle del Cauca'),
(31, 'Vaupez'),
(32, 'Vichada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Aprobado'),
(2, 'Pendiente'),
(3, 'No aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmpdetailsquote`
--

DROP TABLE IF EXISTS `tmpdetailsquote`;
CREATE TABLE IF NOT EXISTS `tmpdetailsquote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeProduct_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(20) NOT NULL,
  `money_id` int(11) DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=481 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typeproduct`
--

DROP TABLE IF EXISTS `typeproduct`;
CREATE TABLE IF NOT EXISTS `typeproduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `typeproduct`
--

INSERT INTO `typeproduct` (`id`, `type`) VALUES
(1, 'Parte'),
(2, 'Servicio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `identification` int(20) NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `token` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `rol_id` int(11) NOT NULL,
  `checked` int(5) NOT NULL,
  `image` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rol_id` (`rol_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastName`, `address`, `phone`, `identification`, `email`, `password`, `token`, `rol_id`, `checked`, `image`) VALUES
(8, 'Jairo Yoel', 'Blanco', 'Carrera 71Bis#12-30', '3209578043', 80813487, 'jairo.blanco@alfastreet.com', '$2y$10$9zfwsJpRTTaex7O0mMw7jeq2qIYJm.xO7eulUp0Gi87ofY7JOfx0q', '123456', 1, 1, '1659632712_07-08-16-thumb.webp'),
(7, 'Nicolas', 'Cuadros', 'CARRERA 70C # 50-08 ', '311111', 1010020349, 'ingenieria@alfastreet.co', '$2y$10$q3NA5p/AzimBvrv.mRnLZ.sW5gRGyAo1wDpbKCFMVA08o1R5.aE7G', '123456', 1, 1, '1659560655_07-08-16-thumb.webp');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
