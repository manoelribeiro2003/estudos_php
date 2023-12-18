-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Dez-2023 às 06:44
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `upload`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivos`
--

CREATE TABLE `arquivos` (
  `id` int(11) NOT NULL,
  `path` varchar(100) NOT NULL,
  `data_upload` datetime NOT NULL DEFAULT current_timestamp(),
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `arquivos`
--

INSERT INTO `arquivos` (`id`, `path`, `data_upload`, `nome`) VALUES
(1, 'arquivos/657f996edd491.jpg', '2023-12-17 21:59:26', 'cactus.jpg'),
(2, 'arquivos/657f99b2961e4.jpg', '2023-12-17 22:00:34', 'fotoDePerfil.jpg'),
(3, 'arquivos/657f99e08d1b1.jpg', '2023-12-17 22:01:20', 'e019ba9cf1629052917caeca9ebf4a66.jpg'),
(4, 'arquivos/657f9d453b39d.jpg', '2023-12-17 22:15:49', 'e019ba9cf1629052917caeca9ebf4a66.jpg'),
(5, 'arquivos/657f9d6d9ba98.jpg', '2023-12-17 22:16:29', 'cactus.jpg'),
(6, 'arquivos/657f9d7265dd9.jpg', '2023-12-17 22:16:34', 'cactus.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
