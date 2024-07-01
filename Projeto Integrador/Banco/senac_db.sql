-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Jul-2024 às 14:43
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

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
-- Estrutura da tabela `cadastrocandidato`
--

CREATE TABLE `cadastrocandidato` (
  `cpf` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `dataNascimento` date NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` char(14) NOT NULL,
  `senha` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `idCargos` int(11) NOT NULL,
  `cargo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `experiencias`
--

CREATE TABLE `experiencias` (
  `idExperiencias` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataFim` date NOT NULL,
  `idCpfCandidato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formacao`
--

CREATE TABLE `formacao` (
  `idFormacao` int(11) NOT NULL,
  `curso` varchar(45) NOT NULL,
  `dataInicio` date NOT NULL,
  `instituicao` varchar(45) NOT NULL,
  `dataFim` date NOT NULL,
  `idCpfCandidato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `habilidades`
--

CREATE TABLE `habilidades` (
  `idHabilidades` int(11) NOT NULL,
  `descricaoHab` varchar(45) NOT NULL,
  `idCpfCandidato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `loginadmin`
--

CREATE TABLE `loginadmin` (
  `id` int(11) NOT NULL,
  `user` char(15) NOT NULL,
  `pass` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `loginadmin`
--

INSERT INTO `loginadmin` (`id`, `user`, `pass`) VALUES
(2, 'admin', '1234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logincandidato`
--

CREATE TABLE `logincandidato` (
  `cpf` int(11) NOT NULL,
  `senha` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vaga`
--

CREATE TABLE `vaga` (
  `idVaga` int(11) NOT NULL,
  `nomEmpresa` varchar(45) NOT NULL,
  `requisitos` varchar(255) NOT NULL,
  `descAtividades` varchar(255) NOT NULL,
  `turno` varchar(30) NOT NULL,
  `idCargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastrocandidato`
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
-- Índices para tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`idCargos`),
  ADD KEY `cargo_candidato` (`cargo`);

--
-- Índices para tabela `experiencias`
--
ALTER TABLE `experiencias`
  ADD PRIMARY KEY (`idExperiencias`),
  ADD KEY `idCpfCandidato` (`idCpfCandidato`);

--
-- Índices para tabela `formacao`
--
ALTER TABLE `formacao`
  ADD PRIMARY KEY (`idFormacao`),
  ADD KEY `formacao_acad` (`curso`),
  ADD KEY `idCpfCandidato` (`idCpfCandidato`);

--
-- Índices para tabela `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`idHabilidades`),
  ADD KEY `hab_candidato` (`descricaoHab`),
  ADD KEY `idCpfCandidato` (`idCpfCandidato`);

--
-- Índices para tabela `loginadmin`
--
ALTER TABLE `loginadmin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `pass` (`pass`);

--
-- Índices para tabela `logincandidato`
--
ALTER TABLE `logincandidato`
  ADD PRIMARY KEY (`cpf`),
  ADD KEY `idx_senha` (`senha`);

--
-- Índices para tabela `vaga`
--
ALTER TABLE `vaga`
  ADD PRIMARY KEY (`idVaga`),
  ADD UNIQUE KEY `nomEmpresa` (`nomEmpresa`),
  ADD KEY `turno_trab` (`turno`),
  ADD KEY `idCargo` (`idCargo`);

--
-- AUTO_INCREMENT de tabelas despejadas
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
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `experiencias`
--
ALTER TABLE `experiencias`
  ADD CONSTRAINT `experiencias_ibfk_1` FOREIGN KEY (`idCpfCandidato`) REFERENCES `cadastrocandidato` (`cpf`);

--
-- Limitadores para a tabela `formacao`
--
ALTER TABLE `formacao`
  ADD CONSTRAINT `formacao_ibfk_1` FOREIGN KEY (`idCpfCandidato`) REFERENCES `cadastrocandidato` (`cpf`);

--
-- Limitadores para a tabela `habilidades`
--
ALTER TABLE `habilidades`
  ADD CONSTRAINT `habilidades_ibfk_1` FOREIGN KEY (`idCpfCandidato`) REFERENCES `cadastrocandidato` (`cpf`);

--
-- Limitadores para a tabela `logincandidato`
--
ALTER TABLE `logincandidato`
  ADD CONSTRAINT `logincandidato_ibfk_1` FOREIGN KEY (`cpf`) REFERENCES `cadastrocandidato` (`cpf`),
  ADD CONSTRAINT `logincandidato_ibfk_2` FOREIGN KEY (`senha`) REFERENCES `cadastrocandidato` (`senha`);

--
-- Limitadores para a tabela `vaga`
--
ALTER TABLE `vaga`
  ADD CONSTRAINT `vaga_ibfk_1` FOREIGN KEY (`idCargo`) REFERENCES `cargos` (`idCargos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
