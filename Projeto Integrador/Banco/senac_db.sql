-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/07/2024 às 15:15
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
-- Banco de dados: `senac_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `curriculo`
--

CREATE TABLE `curriculo` (
  `id` int(11) NOT NULL,
  `pdf` varchar(50) DEFAULT NULL,
  `idCpfCandidato` bigint(11) DEFAULT NULL,
  `idVaga` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `experiencias`
--

CREATE TABLE `experiencias` (
  `idExperiencias` bigint(11) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataFim` date NOT NULL,
  `idCpfCandidato` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `formacao`
--

CREATE TABLE `formacao` (
  `idFormacao` bigint(11) NOT NULL,
  `curso` varchar(45) NOT NULL,
  `instituicao` varchar(45) NOT NULL,
  `idCpfCandidato` bigint(11) NOT NULL,
  `situacao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `loginadmin`
--

CREATE TABLE `loginadmin` (
  `id` bigint(11) NOT NULL,
  `user` char(15) NOT NULL,
  `pass` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `loginadmin`
--

INSERT INTO `loginadmin` (`id`, `user`, `pass`) VALUES
(2, 'admin', '1234');

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfilusuario`
--

CREATE TABLE `perfilusuario` (
  `cpf` bigint(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefone` char(14) DEFAULT NULL,
  `senha` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `perfilusuario`
--

INSERT INTO `perfilusuario` (`cpf`, `nome`, `dataNascimento`, `endereco`, `bairro`, `cidade`, `email`, `telefone`, `senha`) VALUES
(7979, '', '0000-00-00', '', '', '', '', '', '1234'),
(8989, 'dwa', '0000-00-00', '', '', '', '', '', '1234');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vaga`
--

CREATE TABLE `vaga` (
  `idVaga` bigint(11) NOT NULL,
  `nomEmpresa` varchar(45) NOT NULL,
  `requisitos` varchar(255) NOT NULL,
  `descAtividades` varchar(255) NOT NULL,
  `turno` varchar(30) NOT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vaga`
--

INSERT INTO `vaga` (`idVaga`, `nomEmpresa`, `requisitos`, `descAtividades`, `turno`, `cargo`, `endereco`, `email`) VALUES
(2, 'senac', 'senac', 'senac', 'Comercial', 'senac', 'senac', 'senac@senac.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `curriculo`
--
ALTER TABLE `curriculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vaga` (`idCpfCandidato`),
  ADD KEY `idVaga` (`idVaga`);

--
-- Índices de tabela `experiencias`
--
ALTER TABLE `experiencias`
  ADD PRIMARY KEY (`idExperiencias`),
  ADD KEY `idCpfCandidato` (`idCpfCandidato`);

--
-- Índices de tabela `formacao`
--
ALTER TABLE `formacao`
  ADD PRIMARY KEY (`idFormacao`),
  ADD KEY `formacao_acad` (`curso`),
  ADD KEY `idCpfCandidato` (`idCpfCandidato`);

--
-- Índices de tabela `loginadmin`
--
ALTER TABLE `loginadmin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `pass` (`pass`);

--
-- Índices de tabela `perfilusuario`
--
ALTER TABLE `perfilusuario`
  ADD PRIMARY KEY (`cpf`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `cpf_candidato` (`cpf`),
  ADD KEY `nome_candidato` (`nome`),
  ADD KEY `idx_senha` (`senha`);

--
-- Índices de tabela `vaga`
--
ALTER TABLE `vaga`
  ADD PRIMARY KEY (`idVaga`),
  ADD UNIQUE KEY `nomEmpresa` (`nomEmpresa`),
  ADD KEY `turno_trab` (`turno`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `experiencias`
--
ALTER TABLE `experiencias`
  MODIFY `idExperiencias` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `formacao`
--
ALTER TABLE `formacao`
  MODIFY `idFormacao` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `loginadmin`
--
ALTER TABLE `loginadmin`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `vaga`
--
ALTER TABLE `vaga`
  MODIFY `idVaga` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `curriculo`
--
ALTER TABLE `curriculo`
  ADD CONSTRAINT `curriculo_ibfk_1` FOREIGN KEY (`idVaga`) REFERENCES `vaga` (`idVaga`),
  ADD CONSTRAINT `fk_candidato_cpf` FOREIGN KEY (`idCpfCandidato`) REFERENCES `perfilusuario` (`cpf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
