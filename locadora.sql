-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: 'localhost'
-- Usuário: 'root'
-- Senha: ''
-- Tempo de Geração: Out 23, 2014 as 09:47 AM
-- Versão do Servidor: 5.1.53
-- Versão do PHP: 5.3.4


SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `locadora`
--

CREATE DATABASE IF NOT EXISTS locadora;

USE locadora;

-- --------------------------------------------------------

--
-- Estrutura da tabela `filme`
--

CREATE TABLE IF NOT EXISTS `filme` (
  `filmeId` smallint(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `valor` float NOT NULL,
  PRIMARY KEY (`filmeId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `filme`
--

INSERT INTO `filme` (`filmeId`, `nome`, `valor`) VALUES
(1, 'Toy Story', 9.50),
(2, 'Missão Impossível', 9.00),
(3, 'Atividade Paranormal', 8.00),
(4, 'Forest Gump', 8.00),
(5, 'Gente Grande 2', 11.50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `copia`
--

CREATE TABLE IF NOT EXISTS `copia` (
  `copiaId` smallint(6) NOT NULL AUTO_INCREMENT,
  `filmeId` smallint(6) NOT NULL,
  PRIMARY KEY (`copiaId`),
  FOREIGN KEY (filmeId) REFERENCES filme(filmeId)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `copia`
--

INSERT INTO `copia` (`copiaId`, `filmeId`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 1),
(7, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `endereco`) VALUES
(1, 'João',   'Rua 1'),
(2, 'Pedro',  'Rua 2'),
(3, 'Sirlei', 'Rua 3'),
(4, 'Bianca', 'Rua 4'),
(5, 'Carlos', 'Rua 5');


-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `pedidoId` smallint(6) NOT NULL AUTO_INCREMENT,
  `clienteId` smallint(6) NOT NULL,
  `situacao` tinyint(1) NOT NULL,
  PRIMARY KEY (`pedidoId`),
  FOREIGN KEY (clienteId) REFERENCES cliente(clienteId)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`pedidoId`, `clienteId`, `situacao`) VALUES
(1, 1, 0),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `alocacao`
--

CREATE TABLE IF NOT EXISTS `alocacao` (
  `alocacaoId` smallint(6) NOT NULL AUTO_INCREMENT,
  `pedidoId` smallint(6) NOT NULL,
  `copiaId` smallint(6) NOT NULL,
  PRIMARY KEY (`alocacaoId`),
  FOREIGN KEY (pedidoId) REFERENCES pedido(pedidoId),
  FOREIGN KEY (copiaId) REFERENCES copia(copiaId)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `alocacao`
--

INSERT INTO `alocacao` (`alocacaoId`, `pedidoId`, `copiaId`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5);

-- --------------------------------------------------------