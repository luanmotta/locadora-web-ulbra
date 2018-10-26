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
-- Estrutura da tabela `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `estadoId` smallint(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(2) NOT NULL,
  PRIMARY KEY (`estadoId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`estadoId`, `nome`) VALUES
(1, 'RS'),
(2, 'SC'),
(3, 'PR'),
(4, 'SP'),
(5, 'RJ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE IF NOT EXISTS `cidade` (
  `cidadeId` smallint(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `estadoId` smallint(6) NOT NULL,
  PRIMARY KEY (`cidadeId`),
  FOREIGN KEY (estadoId) REFERENCES estado(estadoId)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`cidadeId`, `nome`, estadoId) VALUES
(1, 'Porto Alegre', 1),
(2, 'Florionópolis', 2),
(3, 'Curitiba', 3),
(4, 'São Paulo', 4),
(5, 'Rio de Janeiro', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `cursoId` smallint(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `dataAbertura` varchar(11) NOT NULL,
  PRIMARY KEY (`cursoId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`cursoId`, `nome`) VALUES
(1, 'Engenharia Mecânica', '01/01/2001'),
(2, 'Administração', '01/01/2002'),
(3, 'Educação Física', '01/01/2003'),
(4, 'Direito', '01/01/2004'),
(5, 'Ciência da Computação', '01/01/2005');

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
