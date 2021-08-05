-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2018 at 06:19 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chamados`
--

-- --------------------------------------------------------

--
-- Table structure for table `chamados`
--

CREATE TABLE `chamados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo` int(50) NOT NULL,
  `descr` varchar(200) DEFAULT NULL,
  `loca` int(50) NOT NULL,
  `data_ab` date NOT NULL,
  `data_fe` date DEFAULT NULL,
  `imagem` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chamados`
--

INSERT INTO `chamados` (`id`, `tipo`, `descr`, `loca`, `data_ab`, `data_fe`, `imagem`) VALUES
(1, 1, 'MUITA ÁGUAAAA! HELP!', 2, '2018-09-01', NULL, 1),
(2, 2, 'Vândalos quebraram o meu coração...', 1, '2017-11-22', '2018-09-02', 2),
(3, 3, 'Meu Blastoise não consegue usar o Hydro Pump ;-;', 2, '2016-08-30', NULL, 2),
(4, 4, 'A lâmpada queimou', 1, '2018-09-01', NULL, NULL),
(5, 1, 'A torneira está pingando', 2, '2018-09-01', NULL, NULL),
(6, 2, 'O vaso foi pro saco.', 2, '2018-09-01', NULL, 2),
(12, 2, 'O vaso quebrou, infelizmente.', 1, '2018-09-02', NULL, 2),
(13, 1, '', 1, '2018-09-02', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `imagens`
--

CREATE TABLE `imagens` (
  `id` int(50) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imagens`
--

INSERT INTO `imagens` (`id`, `imagem`) VALUES
(3, './arquivos/foto1.jpg'),
(1, './arquivos/woodyallen1.jpeg'),
(2, './arquivos/woodyallen2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `localidades`
--

CREATE TABLE `localidades` (
  `id` int(50) NOT NULL,
  `loca` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `localidades`
--

INSERT INTO `localidades` (`id`, `loca`) VALUES
(1, 'Banheiro E4'),
(2, 'Banheiro L3');

-- --------------------------------------------------------

--
-- Table structure for table `ocorre`
--

CREATE TABLE `ocorre` (
  `id` int(50) NOT NULL,
  `tipo` int(50) NOT NULL,
  `loca` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ocorre`
--

INSERT INTO `ocorre` (`id`, `tipo`, `loca`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 1, 2),
(6, 2, 2),
(7, 3, 2),
(8, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tipos`
--

CREATE TABLE `tipos` (
  `id` int(50) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipos`
--

INSERT INTO `tipos` (`id`, `tipo`) VALUES
(4, 'Outros'),
(3, 'Problema hidráulico'),
(2, 'Quebra de equipamento'),
(1, 'Vazamento');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`imagem`);

--
-- Indexes for table `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `loca` (`loca`);

--
-- Indexes for table `ocorre`
--
ALTER TABLE `ocorre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo` (`tipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chamados`
--
ALTER TABLE `chamados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ocorre`
--
ALTER TABLE `ocorre`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
