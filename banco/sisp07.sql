-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14-Nov-2019 às 21:12
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sisp07`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acao`
--

CREATE TABLE IF NOT EXISTS `acao` (
  `id_acao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `diretorio` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_acao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pessoa` int(11) NOT NULL,
  `data_matricula` date DEFAULT NULL,
  `situacao_aluno` tinyint(1) DEFAULT NULL,
  `matricula` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_aluno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenador`
--

CREATE TABLE IF NOT EXISTS `coordenador` (
  `id_coordenador` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pessoa` int(11) NOT NULL,
  `data_cadastro` date DEFAULT NULL,
  PRIMARY KEY (`id_coordenador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `criterio`
--

CREATE TABLE IF NOT EXISTS `criterio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `valor_min` float DEFAULT NULL,
  `valor_max` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `sigla` varchar(20) DEFAULT NULL,
  `ano_total` varchar(30) DEFAULT NULL,
  `carga_horaria` varchar(20) DEFAULT NULL,
  `status_curso` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `documento`
--

CREATE TABLE IF NOT EXISTS `documento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_resgistro` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `etapa`
--

CREATE TABLE IF NOT EXISTS `etapa` (
  `id_etapa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `status_etapa` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_etapa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicio`
--

CREATE TABLE IF NOT EXISTS `exercicio` (
  `id_exercicio` int(11) NOT NULL AUTO_INCREMENT,
  `nome_ano` varchar(10) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  PRIMARY KEY (`id_exercicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `nome`) VALUES
(1, 'aluno'),
(2, 'professor'),
(3, 'coordenador'),
(4, 'adm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

CREATE TABLE IF NOT EXISTS `matricula` (
  `id_matricula` int(11) NOT NULL AUTO_INCREMENT,
  `fk_turma` int(11) NOT NULL,
  `aluno_id_aluno` int(11) NOT NULL,
  PRIMARY KEY (`id_matricula`),
  KEY `ref_aluno_turma_FKIndex1` (`aluno_id_aluno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `diretorio` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `operacao`
--

CREATE TABLE IF NOT EXISTS `operacao` (
  `id_operacao` int(11) NOT NULL AUTO_INCREMENT,
  `fk_grupo` int(11) NOT NULL,
  `fk_acao` int(11) NOT NULL,
  `fk_modulo` int(11) NOT NULL,
  PRIMARY KEY (`id_operacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `id_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_pessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `id_professor` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pessoa` int(11) NOT NULL,
  `data_cadastro` date DEFAULT NULL,
  PRIMARY KEY (`id_professor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeti`
--

CREATE TABLE IF NOT EXISTS `projeti` (
  `id_projeti` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(200) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_projeti`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeti_has_documento`
--

CREATE TABLE IF NOT EXISTS `projeti_has_documento` (
  `fk_projeti` int(11) NOT NULL,
  `fk_documento` int(11) NOT NULL,
  PRIMARY KEY (`fk_projeti`,`fk_documento`),
  KEY `projeti_has_documento_FKIndex2` (`fk_documento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ref_aluno_projeti`
--

CREATE TABLE IF NOT EXISTS `ref_aluno_projeti` (
  `id_ref_aluno_projeti` int(11) NOT NULL AUTO_INCREMENT,
  `fk_projeti` int(11) NOT NULL,
  `fk_matricula` int(11) NOT NULL,
  PRIMARY KEY (`id_ref_aluno_projeti`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ref_coordenador_curso`
--

CREATE TABLE IF NOT EXISTS `ref_coordenador_curso` (
  `id_ref_coordenador_curso` int(11) NOT NULL AUTO_INCREMENT,
  `fk_curso` int(11) NOT NULL,
  `fk_coordenador` int(11) NOT NULL,
  PRIMARY KEY (`id_ref_coordenador_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ref_prof_turma`
--

CREATE TABLE IF NOT EXISTS `ref_prof_turma` (
  `id_ref_prof_turma` int(11) NOT NULL AUTO_INCREMENT,
  `fk_turma` int(11) NOT NULL,
  `professor_id_professor` int(11) NOT NULL,
  PRIMARY KEY (`id_ref_prof_turma`),
  KEY `ref_prof_turma_FKIndex2` (`professor_id_professor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ref_usuario_grupo`
--

CREATE TABLE IF NOT EXISTS `ref_usuario_grupo` (
  `id_ref_usuario_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `fk_usuario` int(11) NOT NULL,
  `fk_grupo` int(11) NOT NULL,
  PRIMARY KEY (`id_ref_usuario_grupo`),
  KEY `ref_usuario_grupo_FKIndex1` (`fk_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_tarefa`
--

CREATE TABLE IF NOT EXISTS `status_tarefa` (
  `id_status_tarefa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_status_tarefa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefa`
--

CREATE TABLE IF NOT EXISTS `tarefa` (
  `id_tarefa` int(11) NOT NULL AUTO_INCREMENT,
  `fk_status_tarefa` int(11) NOT NULL,
  `fk_projeti` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `descricao` text,
  `data_cadastro` date DEFAULT NULL,
  `responsavel_id` int(11) DEFAULT NULL,
  `data_conclusao` date DEFAULT NULL,
  PRIMARY KEY (`id_tarefa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE IF NOT EXISTS `turma` (
  `id_turma` int(11) NOT NULL AUTO_INCREMENT,
  `fk_exercicio` int(11) NOT NULL,
  `fk_etapa` int(11) NOT NULL,
  `fk_curso` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `turno` varchar(30) DEFAULT NULL,
  `lotacao` int(11) DEFAULT NULL,
  `status_finalizada` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_turma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pessoa` int(11) NOT NULL,
  `senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`aluno_id_aluno`) REFERENCES `aluno` (`id_aluno`);

--
-- Limitadores para a tabela `projeti_has_documento`
--
ALTER TABLE `projeti_has_documento`
  ADD CONSTRAINT `projeti_has_documento_ibfk_1` FOREIGN KEY (`fk_documento`) REFERENCES `documento` (`id`);

--
-- Limitadores para a tabela `ref_prof_turma`
--
ALTER TABLE `ref_prof_turma`
  ADD CONSTRAINT `ref_prof_turma_ibfk_1` FOREIGN KEY (`professor_id_professor`) REFERENCES `professor` (`id_professor`);

--
-- Limitadores para a tabela `ref_usuario_grupo`
--
ALTER TABLE `ref_usuario_grupo`
  ADD CONSTRAINT `ref_usuario_grupo_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
