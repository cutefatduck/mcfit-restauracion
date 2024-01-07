-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2024 at 12:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restauracion`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADMINISTRADORES`
--

CREATE TABLE `ADMINISTRADORES` (
  `cliente_id` int(11) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `actions` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ADMINISTRADORES`
--

INSERT INTO `ADMINISTRADORES` (`cliente_id`, `usuario`, `nombre`, `apellidos`, `email`, `actions`) VALUES
(2, 'admin', 'Francisco', 'Gomez', 'a@a', 'master');

-- --------------------------------------------------------

--
-- Table structure for table `CATEGORIAS`
--

CREATE TABLE `CATEGORIAS` (
  `categoria_id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CATEGORIAS`
--

INSERT INTO `CATEGORIAS` (`categoria_id`, `nombre`) VALUES
(1, 'batidos'),
(2, 'completos'),
(3, 'ensaladas'),
(4, 'complementos');

-- --------------------------------------------------------

--
-- Table structure for table `CLIENTES`
--

CREATE TABLE `CLIENTES` (
  `cliente_id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CLIENTES`
--

INSERT INTO `CLIENTES` (`cliente_id`, `usuario`, `email`, `nombre`, `apellidos`, `direccion`, `telefono`) VALUES
(1, 'ale', 'a@a', 'a', 'a', 'a', 1),
(2, 'marc123', 'marc123@gmail.com', '12', '32', '1', 23);

-- --------------------------------------------------------

--
-- Table structure for table `CREDENCIALES`
--

CREATE TABLE `CREDENCIALES` (
  `credenciales_id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `credenciales` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CREDENCIALES`
--

INSERT INTO `CREDENCIALES` (`credenciales_id`, `cliente_id`, `admin_id`, `credenciales`) VALUES
(6, 2, NULL, 'a'),
(7, NULL, 2, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `PEDIDOS`
--

CREATE TABLE `PEDIDOS` (
  `pedido_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `productos` varchar(10000) NOT NULL,
  `precio` float NOT NULL,
  `fecha` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `PEDIDOS`
--

INSERT INTO `PEDIDOS` (`pedido_id`, `cliente_id`, `productos`, `precio`, `fecha`) VALUES
(1, 1, '[{\"producto_id\":1,\"nombre\":\"Batido de fresa\",\"precio\":4.5,\"cantidad\":1},{\"producto_id\":2,\"nombre\":\"Batido de sandia\",\"precio\":4.5,\"cantidad\":1},{\"producto_id\":3,\"nombre\":\"Batido de arandanos\",\"precio\":4.25,\"cantidad\":1}]', 13.25, '202401061230'),
(2, 1, '[{\"producto_id\":5,\"nombre\":\"Salmón con esparragos\",\"precio\":6.75,\"cantidad\":1},{\"producto_id\":6,\"nombre\":\"Wok con arroz integral y gambas\",\"precio\":5.75,\"cantidad\":1},{\"producto_id\":7,\"nombre\":\"Tofu encebollado con verduras\",\"precio\":7,\"cantidad\":1}]', 19.5, '202401061233'),
(3, 2, '[{\"producto_id\":4,\"nombre\":\"Batido de galleta integral\",\"precio\":4.75,\"cantidad\":1},{\"producto_id\":7,\"nombre\":\"Tofu encebollado con verduras\",\"precio\":7,\"cantidad\":1}]', 11.75, '202401061945'),
(4, 2, '[{\"producto_id\":2,\"cantidad\":1},{\"producto_id\":3,\"cantidad\":1}]', 8.75, '202401062234'),
(5, 2, '[{\"producto_id\":2,\"cantidad\":3},{\"producto_id\":3,\"cantidad\":1}]', 17.75, '202401062301'),
(6, 2, '[{\"producto_id\":10,\"cantidad\":2}]', 13.5, '202401062303'),
(7, 2, '[{\"producto_id\":9,\"cantidad\":2},{\"producto_id\":10,\"cantidad\":3}]', 33.25, '202401062303'),
(8, 2, '[{\"producto_id\":2,\"cantidad\":1},{\"producto_id\":8,\"cantidad\":1}]', 12, '202401070006'),
(9, 1, '[{\"producto_id\":2,\"cantidad\":1},{\"producto_id\":3,\"cantidad\":1}]', 8.75, '202401071044'),
(10, 1, '[{\"producto_id\":2,\"cantidad\":1}]', 4.5, '202401071055'),
(11, 1, '[{\"producto_id\":3,\"cantidad\":1},{\"producto_id\":4,\"cantidad\":1},{\"producto_id\":7,\"cantidad\":1},{\"producto_id\":10,\"cantidad\":1},{\"producto_id\":13,\"cantidad\":1}]', 43.75, '202401071056'),
(12, 1, '[{\"producto_id\":3,\"cantidad\":1},{\"producto_id\":2,\"cantidad\":1}]', 8.75, '202401071157');

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCTOS`
--

CREATE TABLE `PRODUCTOS` (
  `producto_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `calorias` int(11) NOT NULL,
  `proteinas` float NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `PRODUCTOS`
--

INSERT INTO `PRODUCTOS` (`producto_id`, `nombre`, `precio`, `calorias`, `proteinas`, `stock`, `imagen`, `categoria_id`) VALUES
(1, 'Batido de fresa', 4.5, 90, 1.3, 4, 'batido_de_fresa.png', 1),
(2, 'Batido de sandia', 4.5, 123, 0.9, 3, 'batido_de_sandia.png', 1),
(3, 'Batido de arandanos', 4.25, 83, 1, 2, 'batido_de_arandanos.png', 1),
(4, 'Batido de galleta integral', 4.75, 20, 1.5, 4, 'batido_de_galleta_integral.png', 1),
(5, 'Salmón con esparragos', 6.75, 612, 3, 4, 'salmon_con_esparragos.png', 2),
(6, 'Wok con arroz integral y gambas', 5.75, 732, 2.3, 2, 'wok_con_arroz_integral.png', 2),
(7, 'Tofu encebollado con verduras', 7, 381, 4, 4, 'tofu_encebollado.png', 2),
(8, 'Pollo con arroz y verduras', 7.5, 543, 7, 2, 'pollo_arroz_verduras.png', 2),
(9, 'Espinacas con zanahoria y pan integral', 6.5, 356, 2.5, 2, 'espinacas_zanahoria.png', 3),
(10, 'Garbanzos con pepinillo y tomate', 6.75, 456, 2.1, 5, 'garbanzos_pepinillo.png', 3),
(11, 'Ensalada de espirales con pollo', 6.5, 689, 5, 7, 'ensalada_espirales.png', 3),
(12, 'Ensalada de pollo con pimientos', 7.25, 341, 5.6, 4, 'ensalada_pollo.png', 3),
(13, 'Proteina', 21, 1345, 225, 20, 'proteina.png', 4),
(14, 'Creatina', 25.95, 0, 0, 13, 'creatina.png', 4),
(15, 'Caseina', 35.5, 1380, 235, 2, 'caseina.png', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ADMINISTRADORES`
--
ALTER TABLE `ADMINISTRADORES`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indexes for table `CATEGORIAS`
--
ALTER TABLE `CATEGORIAS`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indexes for table `CLIENTES`
--
ALTER TABLE `CLIENTES`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indexes for table `CREDENCIALES`
--
ALTER TABLE `CREDENCIALES`
  ADD PRIMARY KEY (`credenciales_id`),
  ADD KEY `clienteid` (`cliente_id`),
  ADD KEY `adminid` (`admin_id`);

--
-- Indexes for table `PEDIDOS`
--
ALTER TABLE `PEDIDOS`
  ADD PRIMARY KEY (`pedido_id`),
  ADD KEY `clienteidP` (`cliente_id`);

--
-- Indexes for table `PRODUCTOS`
--
ALTER TABLE `PRODUCTOS`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `categorias` (`categoria_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ADMINISTRADORES`
--
ALTER TABLE `ADMINISTRADORES`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `CATEGORIAS`
--
ALTER TABLE `CATEGORIAS`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `CLIENTES`
--
ALTER TABLE `CLIENTES`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `CREDENCIALES`
--
ALTER TABLE `CREDENCIALES`
  MODIFY `credenciales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `PEDIDOS`
--
ALTER TABLE `PEDIDOS`
  MODIFY `pedido_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `PRODUCTOS`
--
ALTER TABLE `PRODUCTOS`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CREDENCIALES`
--
ALTER TABLE `CREDENCIALES`
  ADD CONSTRAINT `adminid` FOREIGN KEY (`admin_id`) REFERENCES `ADMINISTRADORES` (`cliente_id`),
  ADD CONSTRAINT `clienteid` FOREIGN KEY (`cliente_id`) REFERENCES `CLIENTES` (`cliente_id`);

--
-- Constraints for table `PEDIDOS`
--
ALTER TABLE `PEDIDOS`
  ADD CONSTRAINT `clienteidP` FOREIGN KEY (`cliente_id`) REFERENCES `CLIENTES` (`cliente_id`);

--
-- Constraints for table `PRODUCTOS`
--
ALTER TABLE `PRODUCTOS`
  ADD CONSTRAINT `categorias` FOREIGN KEY (`categoria_Id`) REFERENCES `CATEGORIAS` (`categoria_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
