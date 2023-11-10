-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Nov-2023 às 02:12
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `reciclame`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_adm`
--

CREATE TABLE `tb_adm` (
  `idAdm` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tb_adm`
--

INSERT INTO `tb_adm` (`idAdm`, `nome`, `email`, `senha`) VALUES
(1, 'admin', 'admin@reciclame.com.br', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_empresas`
--

CREATE TABLE `tb_empresas` (
  `idEmpresa` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `localizacao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tb_empresas`
--

INSERT INTO `tb_empresas` (`idEmpresa`, `nome`, `cnpj`, `email`, `senha`, `tel`, `latitude`, `longitude`, `localizacao`) VALUES
(4, 'AJCS', '1002003000176', 'ajcs@gmail.com', '123', '35 34434070', 0, 0, ''),
(11, 'Recicla-me', '11234567000198', 'reciclame@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '19 9867 4599', 0, 0, ''),
(12, 'Reciclada', '9999999999999999', 'matheus@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '19 989594797', -22.439123, -46.8154088, 'R. do Cubatão, 404 - Cubatão, Itapira - SP, 13972-330, Brazil');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_lixeiras`
--

CREATE TABLE `tb_lixeiras` (
  `idLixeira` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `peso` float NOT NULL,
  `volume` float NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tb_lixeiras`
--

INSERT INTO `tb_lixeiras` (`idLixeira`, `tipo`, `peso`, `volume`, `latitude`, `longitude`, `nome`) VALUES
(10, 'Vidro', 50, 200, 0, 0, ''),
(11, 'Metal', 50, 50, 0, 0, ''),
(12, 'Plastico', 50, 50, -22.4310436, -46.834593, 'R. Tereza Lera Paoletti, 590 - Bela Vista, Itapira'),
(13, 'Plastico', 50, 50, -22.4255683, -46.8300221, 'rua carlos venturini, itapira');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_adm`
--
ALTER TABLE `tb_adm`
  ADD PRIMARY KEY (`idAdm`);

--
-- Índices para tabela `tb_empresas`
--
ALTER TABLE `tb_empresas`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Índices para tabela `tb_lixeiras`
--
ALTER TABLE `tb_lixeiras`
  ADD PRIMARY KEY (`idLixeira`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_adm`
--
ALTER TABLE `tb_adm`
  MODIFY `idAdm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_empresas`
--
ALTER TABLE `tb_empresas`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_lixeiras`
--
ALTER TABLE `tb_lixeiras`
  MODIFY `idLixeira` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
