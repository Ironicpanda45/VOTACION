-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: fdb1034.awardspace.net
-- Generation Time: Sep 01, 2025 at 04:01 PM
-- Server version: 8.0.32
-- PHP Version: 8.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4667275_votacion`
--

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `correo` varchar(40) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `correo`, `contrasena`, `fecha_registro`) VALUES
(8, 'Zahiragarcia@gmail.com', '$2y$10$j7mm46Cf3uKoBaz.VNC8UOYlklCxM.8su0B6AXJAlsadzEVAGKb.2', '2025-09-01 15:37:47'),
(9, 'brayan@gomail.com', '$2y$10$Mk8NwF5Cq40/5.PW3Vhz..BKx05mLzHbTcvOntZZYEc.mr7Ru5GZq', '2025-09-01 15:37:52'),
(10, 'f.palacios@gmail.com', '$2y$10$ePwAEJPqBO2HzttUfUaf1.mqPmuem9URYacPgpCPpNpt5XtSUo34O', '2025-09-01 15:37:57'),
(11, 'janeth@holi.com', '$2y$10$.9emgIRFxRbg2Jefwsf2JefoAvMV2wwcpQOsiQeRmkbp2q3Ame3nu', '2025-09-01 15:38:20'),
(12, 'alain.ac@gmail.com', '$2y$10$TIpRnYvwjk5fNvltMGeGNOCMaAWqBxxryEWFOYVLe4jzvPzzmoapa', '2025-09-01 15:38:44'),
(13, 'itzel123@gmail.com', '$2y$10$inrAurI6NwzFSaS8UVpc0.xT3vrcc.iNosDB/46QOEOIMwE0//aH.', '2025-09-01 15:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `votos`
--

CREATE TABLE `votos` (
  `id` int NOT NULL,
  `universidad` varchar(50) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `fecha_voto` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `votos`
--

INSERT INTO `votos` (`id`, `universidad`, `correo`, `fecha_voto`) VALUES
(5, 'uacj', 'brayan@gomail.com', '0000-00-00 00:00:00'),
(6, 'urn', 'f.palacios@gmail.com', '0000-00-00 00:00:00'),
(7, 'urn', 'janeth@holi.com', '0000-00-00 00:00:00'),
(8, 'uach', 'alain.ac@gmail.com', '0000-00-00 00:00:00'),
(9, 'uacj', 'Zahiragarcia@gmail.com', '0000-00-00 00:00:00'),
(10, 'uacj', 'itzel123@gmail.com', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votos`
--
ALTER TABLE `votos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_voto` (`correo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `votos`
--
ALTER TABLE `votos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
