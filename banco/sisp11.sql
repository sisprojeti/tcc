-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Fev-2020 às 21:10
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sisp10`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `acao`
--

INSERT INTO `acao` (`id_acao`, `nome`, `diretorio`) VALUES
(1, 'adicionar', 'adicionar'),
(2, 'editar', 'editar'),
(3, 'excluir', 'excluir'),
(4, 'listar', 'listar'),
(5, 'Home Aluno', 'verAluno'),
(6, 'Home Coordenador', 'verCoordenador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `id_administrador` int(11) NOT NULL AUTO_INCREMENT,
  `data_cadastro` date DEFAULT NULL,
  `situacao_adm` tinyint(1) DEFAULT NULL,
  `fk_pessoa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_administrador`),
  KEY `administrador_ibfk_1` (`fk_pessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `data_matricula` date DEFAULT NULL,
  `matricula` varchar(45) DEFAULT NULL,
  `situacao_aluno` tinyint(4) DEFAULT NULL,
  `fk_pessoa` int(11) NOT NULL,
  PRIMARY KEY (`id_aluno`),
  KEY `fk_aluno_pessoa1` (`fk_pessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `data_matricula`, `matricula`, `situacao_aluno`, `fk_pessoa`) VALUES
(1, '2019-12-11', '1258742', 1, 2),
(2, '2019-12-10', '123123', 1, 7),
(3, '2019-12-05', '123123123', 1, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenador`
--

CREATE TABLE IF NOT EXISTS `coordenador` (
  `id_coordenador` int(11) NOT NULL AUTO_INCREMENT,
  `data_cadastro` date DEFAULT NULL,
  `fk_pessoa` int(11) NOT NULL,
  PRIMARY KEY (`id_coordenador`),
  KEY `fk_coordenador_pessoa1` (`fk_pessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `coordenador`
--

INSERT INTO `coordenador` (`id_coordenador`, `data_cadastro`, `fk_pessoa`) VALUES
(1, '2019-12-11', 4),
(2, '2019-12-04', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `sigla` varchar(20) NOT NULL,
  `ano_total` varchar(30) NOT NULL,
  `carga_horaria` varchar(45) NOT NULL,
  `status_curso` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `nome`, `sigla`, `ano_total`, `carga_horaria`, `status_curso`) VALUES
(1, 'SISTEMA PARA INTENET', 'SIS', '2.5', '4000', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `etapa`
--

CREATE TABLE IF NOT EXISTS `etapa` (
  `id_etapa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `ordem` varchar(20) DEFAULT NULL,
  `status_etapa` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_etapa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `etapa`
--

INSERT INTO `etapa` (`id_etapa`, `nome`, `ordem`, `status_etapa`) VALUES
(1, '1 SEMESTRE', '1', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicio`
--

CREATE TABLE IF NOT EXISTS `exercicio` (
  `id_exercicio` int(11) NOT NULL AUTO_INCREMENT,
  `nome_ano` varchar(35) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date DEFAULT NULL,
  PRIMARY KEY (`id_exercicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `exercicio`
--

INSERT INTO `exercicio` (`id_exercicio`, `nome_ano`, `data_inicio`, `data_fim`) VALUES
(1, '2019', '2019-01-01', '2019-12-31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `nome`) VALUES
(1, 'administrador'),
(2, 'aluno'),
(3, 'coordenador'),
(4, 'professor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `diretorio` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `modulo`
--

INSERT INTO `modulo` (`id_modulo`, `nome`, `diretorio`) VALUES
(1, 'aluno', 'aluno'),
(2, 'administrador', 'administrador'),
(3, 'anexos', 'anexos'),
(4, 'coordenador', 'coordenador'),
(5, 'curso', 'curso'),
(6, 'etapa', 'etapa'),
(7, 'exercicio', 'exercicio'),
(8, 'home', 'home'),
(9, 'matricula', 'matricula'),
(10, 'professor', 'professor'),
(11, 'tarefa', 'tarefa'),
(12, 'turma', 'turma'),
(13, 'vinculoAluno', 'vinculoAluno'),
(14, 'vinculoCoordenador', 'vinculoCoordenador'),
(15, 'vinculoProfessor', 'vinculoProfessor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `operacao`
--

CREATE TABLE IF NOT EXISTS `operacao` (
  `id_operacao` int(11) NOT NULL AUTO_INCREMENT,
  `_delete_` char(1) DEFAULT NULL,
  `fk_modulo` int(11) NOT NULL,
  `fk_acao` int(11) NOT NULL,
  `fk_grupo` int(11) NOT NULL,
  PRIMARY KEY (`id_operacao`),
  KEY `fk_operacao_acao1` (`fk_acao`),
  KEY `fk_operacao_grupo1` (`fk_grupo`),
  KEY `fk_operacao_modulo1` (`fk_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `operacao`
--

INSERT INTO `operacao` (`id_operacao`, `_delete_`, `fk_modulo`, `fk_acao`, `fk_grupo`) VALUES
(1, NULL, 1, 1, 1),
(2, NULL, 1, 2, 1),
(3, NULL, 1, 3, 1),
(4, NULL, 1, 4, 1),
(5, NULL, 2, 1, 1),
(6, NULL, 2, 2, 1),
(7, NULL, 2, 3, 1),
(8, NULL, 2, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `id_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_pessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id_pessoa`, `nome`, `email`, `cpf`, `telefone`) VALUES
(1, 'Adiministrador', 'adm@gmail.com', '787.358.902-15', '(96)992072330'),
(2, 'Aluna Teste Gabi', 'gabrielaexposto1@gmail.com', '488.162.470-96', '(68) 79781-564'),
(3, 'PROFESSOR TESTE GABI', 'rafael.proesc@gmail.com', '919.593.450-28', '(96) 99207-2330'),
(4, 'teste coordenador', 'rafael.proesc@gmail.com', '203.636.730-59', '(96) 66666-6666'),
(5, 'ALESSANDRA KARLEN', 'administrador@proesc.com', '911.969.710-48', '(96) 99207-2330'),
(6, 'Gabriela proffff', 'gabriela.proesc@gmail.com', '608.430.220-35', '(68) 79781-564'),
(7, 'DIEGO BARBOSA', 'rafael.proesc@gmail.com', '076.531.910-10', '(68) 79781-564'),
(8, 'marcelo cargodos', 'rafael.proesc@gmail.com', '243.836.040-21', '(96) 99207-2330');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `id_professor` int(11) NOT NULL AUTO_INCREMENT,
  `data_cadastro` date DEFAULT NULL,
  `fk_pessoa` int(11) NOT NULL,
  PRIMARY KEY (`id_professor`),
  KEY `fk_professor_pessoa1` (`fk_pessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id_professor`, `data_cadastro`, `fk_pessoa`) VALUES
(1, '2019-12-11', 3),
(2, '2019-12-28', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeti`
--

CREATE TABLE IF NOT EXISTS `projeti` (
  `id_projeti` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id_projeti`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `projeti`
--

INSERT INTO `projeti` (`id_projeti`, `tema`, `descricao`) VALUES
(1, 'slao tema', 'sdasdad');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ref_aluno_projeti`
--

CREATE TABLE IF NOT EXISTS `ref_aluno_projeti` (
  `id_ref_aluno_projeti` int(11) NOT NULL AUTO_INCREMENT,
  `fk_projeti` int(11) NOT NULL,
  `fk_aluno` int(11) NOT NULL,
  PRIMARY KEY (`id_ref_aluno_projeti`),
  KEY `fk_ref_aluno_projeti_aluno1` (`fk_aluno`),
  KEY `fk_ref_aluno_projeti_projeti1` (`fk_projeti`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `ref_aluno_projeti`
--

INSERT INTO `ref_aluno_projeti` (`id_ref_aluno_projeti`, `fk_projeti`, `fk_aluno`) VALUES
(1, 1, 2),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ref_aluno_turma`
--

CREATE TABLE IF NOT EXISTS `ref_aluno_turma` (
  `id_ref_aluno_turma` int(11) NOT NULL AUTO_INCREMENT,
  `fk_aluno` int(11) NOT NULL,
  `fk_turma` int(11) NOT NULL,
  PRIMARY KEY (`id_ref_aluno_turma`),
  KEY `fk_ref_aluno_turma_aluno1` (`fk_aluno`),
  KEY `fk_ref_aluno_turma_turma1` (`fk_turma`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `ref_aluno_turma`
--

INSERT INTO `ref_aluno_turma` (`id_ref_aluno_turma`, `fk_aluno`, `fk_turma`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ref_coordenador_curso`
--

CREATE TABLE IF NOT EXISTS `ref_coordenador_curso` (
  `id_ref_coordenador_curso` int(11) NOT NULL AUTO_INCREMENT,
  `fk_coordenador` int(11) NOT NULL,
  `fk_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_ref_coordenador_curso`),
  KEY `fk_ref_coordenador_curso_coordenador1` (`fk_coordenador`),
  KEY `fk_ref_coordenador_curso_curso1` (`fk_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `ref_coordenador_curso`
--

INSERT INTO `ref_coordenador_curso` (`id_ref_coordenador_curso`, `fk_coordenador`, `fk_curso`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ref_prof_turma`
--

CREATE TABLE IF NOT EXISTS `ref_prof_turma` (
  `id_ref_prof_turma` int(11) NOT NULL AUTO_INCREMENT,
  `fk_turma` int(11) NOT NULL,
  `fk_professor` int(11) NOT NULL,
  PRIMARY KEY (`id_ref_prof_turma`),
  KEY `fk_ref_prof_turma_professor1` (`fk_professor`),
  KEY `fk_ref_prof_turma_turma1` (`fk_turma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ref_projeti_tarefa`
--

CREATE TABLE IF NOT EXISTS `ref_projeti_tarefa` (
  `id_ref_projeti_tarefa` int(11) NOT NULL AUTO_INCREMENT,
  `fk_tarefa` int(11) NOT NULL,
  `fk_ref_aluno_projeti` int(11) NOT NULL,
  PRIMARY KEY (`id_ref_projeti_tarefa`),
  KEY `fk_ref_projeti_tarefa_ref_aluno_projeti1` (`fk_ref_aluno_projeti`),
  KEY `fk_ref_projeti_tarefa_tarefa1` (`fk_tarefa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ref_usuario_grupo`
--

CREATE TABLE IF NOT EXISTS `ref_usuario_grupo` (
  `id_ref_usuario_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `fk_usuario` int(11) NOT NULL,
  `fk_grupo` int(11) NOT NULL,
  PRIMARY KEY (`id_ref_usuario_grupo`),
  KEY `fk_ref_usuario_grupo_grupo1` (`fk_grupo`),
  KEY `fk_ref_usuario_grupo_usuario1` (`fk_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `ref_usuario_grupo`
--

INSERT INTO `ref_usuario_grupo` (`id_ref_usuario_grupo`, `fk_usuario`, `fk_grupo`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 4, 3),
(4, 5, 2),
(5, 6, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_tarefa`
--

CREATE TABLE IF NOT EXISTS `status_tarefa` (
  `id_status_tarefa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_status_tarefa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `status_tarefa`
--

INSERT INTO `status_tarefa` (`id_status_tarefa`, `nome`) VALUES
(1, 'A FAZER'),
(2, 'FAZENDO'),
(3, 'REVISÃO'),
(4, 'FEITO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefa`
--

CREATE TABLE IF NOT EXISTS `tarefa` (
  `id_tarefa` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `data_conclusao` date DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `fk_projeti` int(11) NOT NULL,
  `fk_status_tarefa` int(11) NOT NULL,
  PRIMARY KEY (`id_tarefa`),
  KEY `fk_tarefa_projeti1` (`fk_projeti`),
  KEY `fk_tarefa_status_tarefa1` (`fk_status_tarefa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE IF NOT EXISTS `turma` (
  `id_turma` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `turno` varchar(45) NOT NULL,
  `lotacao` int(11) NOT NULL,
  `status_finalizada` tinyint(4) DEFAULT NULL,
  `fk_curso` int(11) NOT NULL,
  `fk_etapa` int(11) NOT NULL,
  `fk_exercicio` int(11) NOT NULL,
  PRIMARY KEY (`id_turma`),
  KEY `fk_turma_curso1` (`fk_curso`),
  KEY `fk_turma_etapa1` (`fk_etapa`),
  KEY `fk_turma_exercicio1` (`fk_exercicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `nome`, `turno`, `lotacao`, `status_finalizada`, `fk_curso`, `fk_etapa`, `fk_exercicio`) VALUES
(1, 'SIS 01', 'ManhÃ£', 45, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `senha` varchar(255) DEFAULT NULL,
  `fk_pessoa` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuario_pessoa` (`fk_pessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `senha`, `fk_pessoa`) VALUES
(1, '123456', 1),
(2, '123456', 2),
(3, '123456', 4),
(4, '123456', 5),
(5, '123456', 7),
(6, '123456', 8);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`fk_pessoa`) REFERENCES `pessoa` (`id_pessoa`);

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_aluno_pessoa1` FOREIGN KEY (`fk_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `coordenador`
--
ALTER TABLE `coordenador`
  ADD CONSTRAINT `fk_coordenador_pessoa1` FOREIGN KEY (`fk_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `operacao`
--
ALTER TABLE `operacao`
  ADD CONSTRAINT `fk_operacao_acao1` FOREIGN KEY (`fk_acao`) REFERENCES `acao` (`id_acao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_operacao_grupo1` FOREIGN KEY (`fk_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_operacao_modulo1` FOREIGN KEY (`fk_modulo`) REFERENCES `modulo` (`id_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_professor_pessoa1` FOREIGN KEY (`fk_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ref_aluno_projeti`
--
ALTER TABLE `ref_aluno_projeti`
  ADD CONSTRAINT `fk_ref_aluno_projeti_aluno1` FOREIGN KEY (`fk_aluno`) REFERENCES `aluno` (`id_aluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ref_aluno_projeti_projeti1` FOREIGN KEY (`fk_projeti`) REFERENCES `projeti` (`id_projeti`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ref_aluno_turma`
--
ALTER TABLE `ref_aluno_turma`
  ADD CONSTRAINT `fk_ref_aluno_turma_aluno1` FOREIGN KEY (`fk_aluno`) REFERENCES `aluno` (`id_aluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ref_aluno_turma_turma1` FOREIGN KEY (`fk_turma`) REFERENCES `turma` (`id_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ref_coordenador_curso`
--
ALTER TABLE `ref_coordenador_curso`
  ADD CONSTRAINT `fk_ref_coordenador_curso_coordenador1` FOREIGN KEY (`fk_coordenador`) REFERENCES `coordenador` (`id_coordenador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ref_coordenador_curso_curso1` FOREIGN KEY (`fk_curso`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ref_prof_turma`
--
ALTER TABLE `ref_prof_turma`
  ADD CONSTRAINT `fk_ref_prof_turma_professor1` FOREIGN KEY (`fk_professor`) REFERENCES `professor` (`id_professor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ref_prof_turma_turma1` FOREIGN KEY (`fk_turma`) REFERENCES `turma` (`id_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ref_projeti_tarefa`
--
ALTER TABLE `ref_projeti_tarefa`
  ADD CONSTRAINT `fk_ref_projeti_tarefa_ref_aluno_projeti1` FOREIGN KEY (`fk_ref_aluno_projeti`) REFERENCES `ref_aluno_projeti` (`id_ref_aluno_projeti`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ref_projeti_tarefa_tarefa1` FOREIGN KEY (`fk_tarefa`) REFERENCES `tarefa` (`id_tarefa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ref_usuario_grupo`
--
ALTER TABLE `ref_usuario_grupo`
  ADD CONSTRAINT `fk_ref_usuario_grupo_grupo1` FOREIGN KEY (`fk_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ref_usuario_grupo_usuario1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD CONSTRAINT `fk_tarefa_projeti1` FOREIGN KEY (`fk_projeti`) REFERENCES `projeti` (`id_projeti`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tarefa_status_tarefa1` FOREIGN KEY (`fk_status_tarefa`) REFERENCES `status_tarefa` (`id_status_tarefa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `fk_turma_curso1` FOREIGN KEY (`fk_curso`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turma_etapa1` FOREIGN KEY (`fk_etapa`) REFERENCES `etapa` (`id_etapa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turma_exercicio1` FOREIGN KEY (`fk_exercicio`) REFERENCES `exercicio` (`id_exercicio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_pessoa` FOREIGN KEY (`fk_pessoa`) REFERENCES `pessoa` (`id_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
