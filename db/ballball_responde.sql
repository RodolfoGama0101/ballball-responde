-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 03:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ballball_responde`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternativa`
--

CREATE TABLE `alternativa` (
  `idAlternativa` int(11) NOT NULL,
  `certa` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alternativa`
--

INSERT INTO `alternativa` (`idAlternativa`, `certa`) VALUES
(1, 1),
(2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `idLogin` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`idLogin`, `nome`, `email`, `senha`) VALUES
(1, 'phdarido', 'phdarido@gmail.com', '1'),
(5, 'phdarido1', 'phdarido1@gmail.com', '$2y$10$oVuC74hGbKhMH'),
(6, 'Rodolfo', 'rodolfo.gama2006@gmail.com', 'rodolfo123'),
(7, 'Jubileu Nemeu', 'jubileu.nemeu@gmail.com', 'jubileu123');

-- --------------------------------------------------------

--
-- Table structure for table `materia`
--

CREATE TABLE `materia` (
  `idMateria` int(11) NOT NULL,
  `nomeMateria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materia`
--

INSERT INTO `materia` (`idMateria`, `nomeMateria`) VALUES
(1, 'Matemática'),
(2, 'Português'),
(3, 'História'),
(4, 'Geografia'),
(5, 'Física'),
(6, 'Programação'),
(7, 'Banco de Dados');

-- --------------------------------------------------------

--
-- Table structure for table `pergunta`
--

CREATE TABLE `pergunta` (
  `idPergunta` int(11) NOT NULL,
  `enunciado` mediumtext NOT NULL,
  `idmateria` int(11) NOT NULL,
  `idtipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pergunta`
--

INSERT INTO `pergunta` (`idPergunta`, `enunciado`, `idmateria`, `idtipo`) VALUES
(34, 'Quanto é 30 + 40?', 1, 1),
(35, 'Sobre o romantismo, como foi a literatura da época?', 2, 2),
(36, 'O que é eletromagnetismo?', 5, 2),
(37, 'O que é placa tectônica?', 4, 2),
(38, 'O que é PHP', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resposta`
--

CREATE TABLE `resposta` (
  `idResposta` int(11) NOT NULL,
  `descricao` mediumtext NOT NULL,
  `idalternativa` int(1) NOT NULL,
  `idperg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resposta`
--

INSERT INTO `resposta` (`idResposta`, `descricao`, `idalternativa`, `idperg`) VALUES
(138, '40', 2, 34),
(139, '30', 2, 34),
(140, '50', 2, 34),
(141, '70', 1, 34),
(142, 'Um framework', 2, 38),
(143, 'Um banco de dados', 2, 38),
(144, 'Um automóvel', 2, 38),
(145, 'Uma linguagem de programação', 1, 38);

-- --------------------------------------------------------

--
-- Table structure for table `tiporesposta`
--

CREATE TABLE `tiporesposta` (
  `idTipoResposta` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiporesposta`
--

INSERT INTO `tiporesposta` (`idTipoResposta`, `tipo`) VALUES
(1, 'alternativa'),
(2, 'dissertativa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternativa`
--
ALTER TABLE `alternativa`
  ADD PRIMARY KEY (`idAlternativa`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`);

--
-- Indexes for table `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`idMateria`);

--
-- Indexes for table `pergunta`
--
ALTER TABLE `pergunta`
  ADD PRIMARY KEY (`idPergunta`);

--
-- Indexes for table `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`idResposta`);

--
-- Indexes for table `tiporesposta`
--
ALTER TABLE `tiporesposta`
  ADD PRIMARY KEY (`idTipoResposta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternativa`
--
ALTER TABLE `alternativa`
  MODIFY `idAlternativa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `materia`
--
ALTER TABLE `materia`
  MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `idPergunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `resposta`
--
ALTER TABLE `resposta`
  MODIFY `idResposta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `tiporesposta`
--
ALTER TABLE `tiporesposta`
  MODIFY `idTipoResposta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
