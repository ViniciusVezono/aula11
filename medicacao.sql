-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/11/2024 às 02:47
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `medicacao`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `receitas`
--

CREATE TABLE `receitas` (
  `id` int(11) NOT NULL,
  `nome_paciente` varchar(250) NOT NULL,
  `nome_medicamento` varchar(250) NOT NULL,
  `data_admnistracao` date NOT NULL,
  `hora_admnistracao` time NOT NULL,
  `dose` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `receitas`
--

INSERT INTO `receitas` (`id`, `nome_paciente`, `nome_medicamento`, `data_admnistracao`, `hora_admnistracao`, `dose`) VALUES
(1, 'rebeca', 'ibuprofeno', '2020-04-12', '04:22:00', '2mg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblenfermeiro`
--

CREATE TABLE `tblenfermeiro` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `coren` varchar(250) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `data_criada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblenfermeiro`
--

INSERT INTO `tblenfermeiro` (`id`, `nome`, `coren`, `usuario`, `senha`, `data_criada`) VALUES
(1, 'henrique', 'asld12', 'hen1', '$2y$10$qsbx/vlNAvjZspQdDyjHZu3oKpBVya4DcwyCB.TV95nvympOMT7V2', 2024);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblmedicos`
--

CREATE TABLE `tblmedicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `especialidade` varchar(250) NOT NULL,
  `crm` varchar(250) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `data_criada` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblmedicos`
--

INSERT INTO `tblmedicos` (`id`, `nome`, `especialidade`, `crm`, `usuario`, `senha`, `data_criada`) VALUES
(1, 'Pedro', 'cardiologista', '213as-2', 'pdr', '$2y$10$k3QUvRvW41cZr9LOl61H5OxzCx6b3b1dFVaSb9uOnBi3w/2PjE1pq', '2024-11-05 21:47:37');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblpaciente`
--

CREATE TABLE `tblpaciente` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `leito` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblpaciente`
--

INSERT INTO `tblpaciente` (`id`, `nome`, `leito`) VALUES
(1, 'Luis', 'Grave'),
(2, 'rebeca', 'suave');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tblenfermeiro`
--
ALTER TABLE `tblenfermeiro`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tblmedicos`
--
ALTER TABLE `tblmedicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tblpaciente`
--
ALTER TABLE `tblpaciente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `receitas`
--
ALTER TABLE `receitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tblenfermeiro`
--
ALTER TABLE `tblenfermeiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tblmedicos`
--
ALTER TABLE `tblmedicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tblpaciente`
--
ALTER TABLE `tblpaciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
