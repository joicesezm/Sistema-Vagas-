-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/06/2024 às 16:42
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
-- Estrutura para tabela `cadastrocandidato`
--

CREATE TABLE `cadastrocandidato` (
  `cpf` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefone` char(14) DEFAULT NULL,
  `senha` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `cadastrocandidato`:
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargos`
--

CREATE TABLE `cargos` (
  `idCargos` int(11) NOT NULL,
  `cargo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `cargos`:
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `experiencias`
--

CREATE TABLE `experiencias` (
  `idExperiencias` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `dataInicio` date DEFAULT NULL,
  `dataFim` date DEFAULT NULL,
  `idCpfCandidato` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `experiencias`:
--   `idCpfCandidato`
--       `cadastrocandidato` -> `cpf`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `formacao`
--

CREATE TABLE `formacao` (
  `idFormacao` int(11) NOT NULL,
  `curso` varchar(45) DEFAULT NULL,
  `dataInicio` date DEFAULT NULL,
  `instituicao` varchar(45) DEFAULT NULL,
  `dataFim` date DEFAULT NULL,
  `idCpfCandidato` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `formacao`:
--   `idCpfCandidato`
--       `cadastrocandidato` -> `cpf`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `habilidades`
--

CREATE TABLE `habilidades` (
  `idHabilidades` int(11) NOT NULL,
  `descricaoHab` varchar(45) DEFAULT NULL,
  `idCpfCandidato` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `habilidades`:
--   `idCpfCandidato`
--       `cadastrocandidato` -> `cpf`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `loginadmin`
--

CREATE TABLE `loginadmin` (
  `id` int(11) NOT NULL,
  `user` char(15) DEFAULT NULL,
  `pass` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `loginadmin`:
--

--
-- Despejando dados para a tabela `loginadmin`
--

INSERT INTO `loginadmin` (`id`, `user`, `pass`) VALUES
(2, 'admin', '1234');

-- --------------------------------------------------------

--
-- Estrutura para tabela `logincandidato`
--

CREATE TABLE `logincandidato` (
  `cpf` int(11) NOT NULL,
  `senha` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `logincandidato`:
--   `cpf`
--       `cadastrocandidato` -> `cpf`
--   `senha`
--       `cadastrocandidato` -> `senha`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `vaga`
--

CREATE TABLE `vaga` (
  `idVaga` int(11) NOT NULL,
  `nomEmpresa` varchar(45) DEFAULT NULL,
  `requisitos` varchar(255) DEFAULT NULL,
  `descAtividades` varchar(255) DEFAULT NULL,
  `horarioInicio` time DEFAULT NULL,
  `horarioFim` time DEFAULT NULL,
  `turno` varchar(30) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `salario` float DEFAULT NULL,
  `dataInicio` date DEFAULT NULL,
  `dataFim` date DEFAULT NULL,
  `idCargo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONAMENTOS PARA TABELAS `vaga`:
--   `idCargo`
--       `cargos` -> `idCargos`
--

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cadastrocandidato`
--
ALTER TABLE `cadastrocandidato`
  ADD PRIMARY KEY (`cpf`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `telefone` (`telefone`),
  ADD KEY `cpf_candidato` (`cpf`),
  ADD KEY `nome_candidato` (`nome`),
  ADD KEY `idx_senha` (`senha`);

--
-- Índices de tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`idCargos`),
  ADD KEY `cargo_candidato` (`cargo`);

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
-- Índices de tabela `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`idHabilidades`),
  ADD KEY `hab_candidato` (`descricaoHab`),
  ADD KEY `idCpfCandidato` (`idCpfCandidato`);

--
-- Índices de tabela `loginadmin`
--
ALTER TABLE `loginadmin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `pass` (`pass`);

--
-- Índices de tabela `logincandidato`
--
ALTER TABLE `logincandidato`
  ADD PRIMARY KEY (`cpf`),
  ADD KEY `idx_senha` (`senha`);

--
-- Índices de tabela `vaga`
--
ALTER TABLE `vaga`
  ADD PRIMARY KEY (`idVaga`),
  ADD UNIQUE KEY `nomEmpresa` (`nomEmpresa`),
  ADD KEY `turno_trab` (`turno`),
  ADD KEY `idCargo` (`idCargo`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `idCargos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `experiencias`
--
ALTER TABLE `experiencias`
  MODIFY `idExperiencias` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `formacao`
--
ALTER TABLE `formacao`
  MODIFY `idFormacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `habilidades`
--
ALTER TABLE `habilidades`
  MODIFY `idHabilidades` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `loginadmin`
--
ALTER TABLE `loginadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `vaga`
--
ALTER TABLE `vaga`
  MODIFY `idVaga` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `experiencias`
--
ALTER TABLE `experiencias`
  ADD CONSTRAINT `experiencias_ibfk_1` FOREIGN KEY (`idCpfCandidato`) REFERENCES `cadastrocandidato` (`cpf`);

--
-- Restrições para tabelas `formacao`
--
ALTER TABLE `formacao`
  ADD CONSTRAINT `formacao_ibfk_1` FOREIGN KEY (`idCpfCandidato`) REFERENCES `cadastrocandidato` (`cpf`);

--
-- Restrições para tabelas `habilidades`
--
ALTER TABLE `habilidades`
  ADD CONSTRAINT `habilidades_ibfk_1` FOREIGN KEY (`idCpfCandidato`) REFERENCES `cadastrocandidato` (`cpf`);

--
-- Restrições para tabelas `logincandidato`
--
ALTER TABLE `logincandidato`
  ADD CONSTRAINT `logincandidato_ibfk_1` FOREIGN KEY (`cpf`) REFERENCES `cadastrocandidato` (`cpf`),
  ADD CONSTRAINT `logincandidato_ibfk_2` FOREIGN KEY (`senha`) REFERENCES `cadastrocandidato` (`senha`);

--
-- Restrições para tabelas `vaga`
--
ALTER TABLE `vaga`
  ADD CONSTRAINT `vaga_ibfk_1` FOREIGN KEY (`idCargo`) REFERENCES `cargos` (`idCargos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
