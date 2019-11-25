-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Nov-2019 às 15:07
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sisp06`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acao`
--

CREATE TABLE IF NOT EXISTS `acao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `diretorio` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(11) NOT NULL,
  `data_matricula` date DEFAULT NULL,
  `situacao_aluno` tinyint(1) DEFAULT NULL,
  `matricula` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aluno_FKIndex2` (`pessoa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenador`
--

CREATE TABLE IF NOT EXISTS `coordenador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(11) NOT NULL,
  `data_cadastro` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `coordenador_FKIndex1` (`pessoa_id`)
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `sigla` varchar(20) DEFAULT NULL,
  `ano_total` varchar(30) DEFAULT NULL,
  `carga_horaria` varchar(20) DEFAULT NULL,
  `status_curso` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `status_etapa` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicio`
--

CREATE TABLE IF NOT EXISTS `exercicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_ano` varchar(10) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`id`, `nome`) VALUES
(1, 'aluno'),
(2, 'professor'),
(3, 'coordenador'),
(4, 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

CREATE TABLE IF NOT EXISTS `matricula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `turma_id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ref_aluno_turma_FKIndex1` (`aluno_id`),
  KEY `ref_aluno_turma_FKIndex2` (`turma_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `diretorio` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `operacao`
--

CREATE TABLE IF NOT EXISTS `operacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) NOT NULL,
  `acao_id` int(11) NOT NULL,
  `modulo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `modulo_id` (`modulo_id`),
  KEY `acao_id` (`acao_id`),
  KEY `grupo_id` (`grupo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(11) NOT NULL,
  `data_cadastro` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `professor_FKIndex1` (`pessoa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeti`
--

CREATE TABLE IF NOT EXISTS `projeti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(200) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeti_has_documento`
--

CREATE TABLE IF NOT EXISTS `projeti_has_documento` (
  `projeti_id` int(11) NOT NULL,
  `documento_id` int(11) NOT NULL,
  PRIMARY KEY (`projeti_id`,`documento_id`),
  KEY `projeti_has_documento_FKIndex1` (`projeti_id`),
  KEY `projeti_has_documento_FKIndex2` (`documento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ref_aluno_projeti`
--

CREATE TABLE IF NOT EXISTS `ref_aluno_projeti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula_id` int(11) NOT NULL,
  `projeti_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `projeti_id` (`projeti_id`),
  KEY `matricula_id` (`matricula_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ref_coordenador_curso`
--

CREATE TABLE IF NOT EXISTS `ref_coordenador_curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso_id` int(11) NOT NULL,
  `coordenador_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ref_coordenador_curso_FKIndex1` (`coordenador_id`),
  KEY `ref_coordenador_curso_FKIndex2` (`curso_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ref_prof_turma`
--

CREATE TABLE IF NOT EXISTS `ref_prof_turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professor_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ref_professor_turma_FKIndex2` (`turma_id`),
  KEY `ref_prof_turma_FKIndex2` (`professor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ref_usuario_grupo`
--

CREATE TABLE IF NOT EXISTS `ref_usuario_grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ref_usuario_grupo_FKIndex1` (`usuario_id`),
  KEY `ref_usuario_grupo_FKIndex2` (`grupo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_tarefa`
--

CREATE TABLE IF NOT EXISTS `status_tarefa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefa`
--

CREATE TABLE IF NOT EXISTS `tarefa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projeti_id` int(11) NOT NULL,
  `status_tarefa_id` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `descricao` text,
  `data_cadastro` date DEFAULT NULL,
  `responsavel_id` int(11) DEFAULT NULL,
  `data_conclusao` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tarefas_FKIndex1` (`status_tarefa_id`),
  KEY `tarefas_FKIndex2` (`projeti_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE IF NOT EXISTS `turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exercicio_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `etapa_id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `turno` varchar(30) DEFAULT NULL,
  `lotacao` int(11) DEFAULT NULL,
  `status_finalizada` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turmas_FKIndex2` (`etapa_id`),
  KEY `turma_FKIndex2` (`curso_id`),
  KEY `turma_FKIndex3` (`exercicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(11) NOT NULL,
  `senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_FKIndex1` (`pessoa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`);

--
-- Limitadores para a tabela `coordenador`
--
ALTER TABLE `coordenador`
  ADD CONSTRAINT `coordenador_ibfk_1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`);

--
-- Limitadores para a tabela `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`),
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`);

--
-- Limitadores para a tabela `operacao`
--
ALTER TABLE `operacao`
  ADD CONSTRAINT `operacao_ibfk_1` FOREIGN KEY (`modulo_id`) REFERENCES `modulo` (`id`),
  ADD CONSTRAINT `operacao_ibfk_2` FOREIGN KEY (`acao_id`) REFERENCES `acao` (`id`),
  ADD CONSTRAINT `operacao_ibfk_3` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`);

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`);

--
-- Limitadores para a tabela `projeti_has_documento`
--
ALTER TABLE `projeti_has_documento`
  ADD CONSTRAINT `projeti_has_documento_ibfk_1` FOREIGN KEY (`projeti_id`) REFERENCES `projeti` (`id`),
  ADD CONSTRAINT `projeti_has_documento_ibfk_2` FOREIGN KEY (`documento_id`) REFERENCES `documento` (`id`);

--
-- Limitadores para a tabela `ref_aluno_projeti`
--
ALTER TABLE `ref_aluno_projeti`
  ADD CONSTRAINT `ref_aluno_projeti_ibfk_1` FOREIGN KEY (`projeti_id`) REFERENCES `projeti` (`id`),
  ADD CONSTRAINT `ref_aluno_projeti_ibfk_2` FOREIGN KEY (`matricula_id`) REFERENCES `matricula` (`id`);

--
-- Limitadores para a tabela `ref_coordenador_curso`
--
ALTER TABLE `ref_coordenador_curso`
  ADD CONSTRAINT `ref_coordenador_curso_ibfk_1` FOREIGN KEY (`coordenador_id`) REFERENCES `coordenador` (`id`),
  ADD CONSTRAINT `ref_coordenador_curso_ibfk_2` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`);

--
-- Limitadores para a tabela `ref_prof_turma`
--
ALTER TABLE `ref_prof_turma`
  ADD CONSTRAINT `ref_prof_turma_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`),
  ADD CONSTRAINT `ref_prof_turma_ibfk_2` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`);

--
-- Limitadores para a tabela `ref_usuario_grupo`
--
ALTER TABLE `ref_usuario_grupo`
  ADD CONSTRAINT `ref_usuario_grupo_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `ref_usuario_grupo_ibfk_2` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`);

--
-- Limitadores para a tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD CONSTRAINT `tarefa_ibfk_1` FOREIGN KEY (`status_tarefa_id`) REFERENCES `status_tarefa` (`id`),
  ADD CONSTRAINT `tarefa_ibfk_2` FOREIGN KEY (`projeti_id`) REFERENCES `projeti` (`id`);

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`etapa_id`) REFERENCES `etapa` (`id`),
  ADD CONSTRAINT `turma_ibfk_2` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`),
  ADD CONSTRAINT `turma_ibfk_3` FOREIGN KEY (`exercicio_id`) REFERENCES `exercicio` (`id`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
