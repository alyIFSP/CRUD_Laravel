-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Nov-2023 às 01:48
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetophp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `maternidade`
--

CREATE TABLE `maternidade` (
  `id` int(6) NOT NULL,
  `Nome` varchar(25) NOT NULL,
  `Categoria` varchar(25) NOT NULL,
  `Valor` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `maternidade`
--

INSERT INTO `maternidade` (`id`, `Nome`, `Categoria`, `Valor`) VALUES
(1, 'Hemograma', 'Exames', '150.00'),
(2, 'Teste do pezinho', 'Exames', '350.00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `maternidade`
--
ALTER TABLE `maternidade`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `maternidade`
--
ALTER TABLE `maternidade`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
