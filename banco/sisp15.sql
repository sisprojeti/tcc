-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/05/2020 às 17:00
-- Versão do servidor: 5.6.17
-- Versão do PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `sisp14`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `acao`
--

CREATE TABLE IF NOT EXISTS `acao` (
  `id_acao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `diretorio` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_acao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Fazendo dump de dados para tabela `acao`
--

INSERT INTO `acao` (`id_acao`, `nome`, `diretorio`) VALUES
(1, 'adicionar', 'adicionar'),
(2, 'editar', 'editar'),
(3, 'excluir', 'excluir'),
(4, 'listar', 'listar'),
(5, 'Home Aluno', 'verAluno'),
(6, 'Home Coordenador', 'verCoordenador'),
(7, 'ver', 'ver'),
(8, 'Vinculo Professor', 'verTelaVinculoProfessor');

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `id_administrador` int(11) NOT NULL AUTO_INCREMENT,
  `data_cadastro` date DEFAULT NULL,
  `situacao_adm` tinyint(4) DEFAULT NULL,
  `fk_pessoa` int(11) NOT NULL,
  PRIMARY KEY (`id_administrador`),
  KEY `fk_administrador_pessoa1` (`fk_pessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `data_matricula` date DEFAULT NULL,
  `situacao_aluno` tinyint(4) DEFAULT NULL,
  `fk_pessoa` int(11) NOT NULL,
  `matricula` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_aluno`),
  KEY `fk_aluno_pessoa1` (`fk_pessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Fazendo dump de dados para tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `data_matricula`, `situacao_aluno`, `fk_pessoa`, `matricula`) VALUES
(1, '2019-12-11', 1, 2, '1258742'),
(2, '2019-12-10', 1, 7, '123123'),
(3, '2019-12-05', 1, 8, '123123123'),
(4, '2020-04-10', 1, 9, '2020'),
(5, '2020-04-20', 1, 10, '3030'),
(6, '2020-04-17', 1, 11, '4040');

-- --------------------------------------------------------

--
-- Estrutura para tabela `boletim`
--

CREATE TABLE IF NOT EXISTS `boletim` (
  `id_boletim` int(11) NOT NULL AUTO_INCREMENT,
  `nota_final` double DEFAULT NULL,
  PRIMARY KEY (`id_boletim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `coordenador`
--

CREATE TABLE IF NOT EXISTS `coordenador` (
  `id_coordenador` int(11) NOT NULL AUTO_INCREMENT,
  `data_cadastro` date DEFAULT NULL,
  `fk_pessoa` int(11) NOT NULL,
  PRIMARY KEY (`id_coordenador`),
  KEY `fk_coordenador_pessoa1` (`fk_pessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `coordenador`
--

INSERT INTO `coordenador` (`id_coordenador`, `data_cadastro`, `fk_pessoa`) VALUES
(1, '2019-12-11', 4),
(2, '2019-12-04', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `criterio`
--

CREATE TABLE IF NOT EXISTS `criterio` (
  `id_criterio` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `valor_maximo` double DEFAULT NULL,
  PRIMARY KEY (`id_criterio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `sigla` varchar(20) NOT NULL,
  `ano_total` varchar(30) NOT NULL,
  `carga_horaria` varchar(45) NOT NULL,
  `status_curso` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `nome`, `sigla`, `ano_total`, `carga_horaria`, `status_curso`) VALUES
(1, 'SISTEMA PARA INTENET', 'SIS', '2.5', '4000', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `etapa`
--

CREATE TABLE IF NOT EXISTS `etapa` (
  `id_etapa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `ordem` varchar(20) DEFAULT NULL,
  `status_etapa` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_etapa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `etapa`
--

INSERT INTO `etapa` (`id_etapa`, `nome`, `ordem`, `status_etapa`) VALUES
(1, '1 SEMESTRE', '1', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `exercicio`
--

CREATE TABLE IF NOT EXISTS `exercicio` (
  `id_exercicio` int(11) NOT NULL AUTO_INCREMENT,
  `nome_ano` varchar(35) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date DEFAULT NULL,
  PRIMARY KEY (`id_exercicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `exercicio`
--

INSERT INTO `exercicio` (`id_exercicio`, `nome_ano`, `data_inicio`, `data_fim`) VALUES
(1, '2019', '2019-01-01', '2019-12-31');

-- --------------------------------------------------------

--
-- Estrutura para tabela `formulario`
--

CREATE TABLE IF NOT EXISTS `formulario` (
  `id_formulario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `data_moficacao` date DEFAULT NULL,
  PRIMARY KEY (`id_formulario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `nome`) VALUES
(1, 'administrador'),
(2, 'aluno'),
(3, 'coordenador'),
(4, 'professor');

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `diretorio` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Fazendo dump de dados para tabela `modulo`
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
(15, 'vinculoProfessor', 'vinculoProfessor'),
(16, 'graficos', 'graficos'),
(17, 'grupo projeti', 'grupo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `valor` double NOT NULL,
  `data_modificacao` date NOT NULL,
  `fk_ref_criterio_formulario` int(11) NOT NULL,
  PRIMARY KEY (`id_nota`),
  KEY `fk_nota_ref_criterio_formulario1` (`fk_ref_criterio_formulario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `operacao`
--

CREATE TABLE IF NOT EXISTS `operacao` (
  `id_operacao` int(11) NOT NULL AUTO_INCREMENT,
  `_delete_` char(1) DEFAULT NULL,
  `fk_modulo` int(11) NOT NULL,
  `fk_acao` int(11) NOT NULL,
  `fk_grupo` int(11) NOT NULL,
  PRIMARY KEY (`id_operacao`),
  KEY `fk_operacao_modulo1` (`fk_modulo`),
  KEY `fk_operacao_acao1` (`fk_acao`),
  KEY `fk_operacao_grupo1` (`fk_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Fazendo dump de dados para tabela `operacao`
--

INSERT INTO `operacao` (`id_operacao`, `_delete_`, `fk_modulo`, `fk_acao`, `fk_grupo`) VALUES
(1, NULL, 1, 1, 1),
(2, NULL, 1, 2, 1),
(3, NULL, 1, 3, 1),
(4, NULL, 1, 4, 1),
(5, NULL, 2, 1, 1),
(6, NULL, 2, 2, 1),
(7, NULL, 2, 3, 1),
(8, NULL, 2, 4, 1),
(9, NULL, 4, 1, 1),
(10, NULL, 4, 2, 1),
(11, NULL, 4, 3, 1),
(12, NULL, 4, 4, 1),
(13, NULL, 4, 8, 1),
(14, NULL, 5, 1, 1),
(15, NULL, 5, 2, 1),
(16, NULL, 5, 3, 1),
(17, NULL, 5, 4, 1),
(18, NULL, 6, 1, 1),
(19, NULL, 6, 2, 1),
(20, NULL, 6, 3, 1),
(21, NULL, 6, 4, 1),
(22, NULL, 7, 1, 1),
(23, NULL, 7, 2, 1),
(24, NULL, 7, 3, 1),
(25, NULL, 7, 4, 1),
(26, NULL, 9, 1, 1),
(27, NULL, 9, 2, 1),
(28, NULL, 9, 3, 1),
(29, NULL, 9, 4, 1),
(30, NULL, 10, 1, 1),
(31, NULL, 10, 2, 1),
(32, NULL, 10, 3, 1),
(33, NULL, 10, 4, 1),
(34, NULL, 13, 1, 1),
(35, NULL, 13, 2, 1),
(36, NULL, 13, 3, 1),
(37, NULL, 13, 4, 1),
(38, NULL, 14, 1, 1),
(39, NULL, 14, 2, 1),
(40, NULL, 14, 3, 1),
(41, NULL, 14, 4, 1),
(42, NULL, 15, 1, 1),
(43, NULL, 15, 2, 1),
(44, NULL, 15, 3, 1),
(45, NULL, 15, 4, 1),
(46, NULL, 8, 5, 2),
(47, NULL, 17, 1, 2),
(48, NULL, 17, 2, 2),
(49, NULL, 17, 3, 2),
(50, NULL, 17, 4, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `id_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_pessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Fazendo dump de dados para tabela `pessoa`
--

INSERT INTO `pessoa` (`id_pessoa`, `nome`, `email`, `cpf`, `telefone`) VALUES
(1, 'Adiministrador', 'adm@gmail.com', '787.358.902-15', '(96)992072330'),
(2, 'Aluna Teste Gabi', 'gabrielaexposto1@gmail.com', '488.162.470-96', '(68) 79781-564'),
(3, 'PROFESSOR TESTE GABI', 'rafael.proesc@gmail.com', '919.593.450-28', '(96) 99207-2330'),
(4, 'teste coordenador', 'rafael.proesc@gmail.com', '203.636.730-59', '(96) 66666-6666'),
(5, 'ALESSANDRA KARLEN', 'administrador@proesc.com', '911.969.710-48', '(96) 99207-2330'),
(6, 'Gabriela proffff', 'gabriela.proesc@gmail.com', '608.430.220-35', '(68) 79781-564'),
(7, 'DIEGO BARBOSA', 'rafael.proesc@gmail.com', '076.531.910-10', '(68) 79781-564'),
(8, 'marcelo cargodos', 'rafael.proesc@gmail.com', '243.836.040-21', '(96) 99207-2330'),
(9, 'amerson', 'rafael.proesc@gmail.com', '660.454.890-20', '(68) 79781-5643'),
(10, 'aluno 2', 'gabrielaexposto1@gmail.com', '815.724.450-17', '(68) 79781-5643'),
(11, 'batata', 'rafael.proesc@gmail.com', '053.458.610-48', '(68) 79781-5643');

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `id_professor` int(11) NOT NULL AUTO_INCREMENT,
  `data_cadastro` date DEFAULT NULL,
  `fk_pessoa` int(11) NOT NULL,
  PRIMARY KEY (`id_professor`),
  KEY `fk_professor_pessoa1` (`fk_pessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `professor`
--

INSERT INTO `professor` (`id_professor`, `data_cadastro`, `fk_pessoa`) VALUES
(1, '2019-12-11', 3),
(2, '2019-12-28', 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `projeti`
--

CREATE TABLE IF NOT EXISTS `projeti` (
  `id_projeti` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id_projeti`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `projeti`
--

INSERT INTO `projeti` (`id_projeti`, `tema`, `descricao`) VALUES
(1, 'tema 1', 'sla a descriÃ§Ã£o'),
(4, 'tema 2', 'uma ai');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ref_aluno_projeti`
--

CREATE TABLE IF NOT EXISTS `ref_aluno_projeti` (
  `id_ref_aluno_projeti` int(11) NOT NULL AUTO_INCREMENT,
  `fk_projeti` int(11) NOT NULL,
  `fk_aluno` int(11) NOT NULL,
  PRIMARY KEY (`id_ref_aluno_projeti`),
  KEY `fk_ref_aluno_projeti_projeti1` (`fk_projeti`),
  KEY `fk_ref_aluno_projeti_aluno1` (`fk_aluno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Fazendo dump de dados para tabela `ref_aluno_projeti`
--

INSERT INTO `ref_aluno_projeti` (`id_ref_aluno_projeti`, `fk_projeti`, `fk_aluno`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(10, 4, 6),
(11, 4, 4),
(12, 4, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ref_aluno_turma`
--

CREATE TABLE IF NOT EXISTS `ref_aluno_turma` (
  `id_ref_aluno_turma` int(11) NOT NULL AUTO_INCREMENT,
  `fk_aluno` int(11) NOT NULL,
  `fk_turma` int(11) NOT NULL,
  PRIMARY KEY (`id_ref_aluno_turma`),
  KEY `fk_ref_aluno_turma_aluno1` (`fk_aluno`),
  KEY `fk_ref_aluno_turma_turma1` (`fk_turma`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Fazendo dump de dados para tabela `ref_aluno_turma`
--

INSERT INTO `ref_aluno_turma` (`id_ref_aluno_turma`, `fk_aluno`, `fk_turma`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ref_coordenador_curso`
--

CREATE TABLE IF NOT EXISTS `ref_coordenador_curso` (
  `id_ref_coordenador_curso` int(11) NOT NULL AUTO_INCREMENT,
  `fk_coordenador` int(11) NOT NULL,
  `fk_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_ref_coordenador_curso`),
  KEY `fk_ref_coordenador_curso_coordenador1` (`fk_coordenador`),
  KEY `fk_ref_coordenador_curso_curso1` (`fk_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `ref_coordenador_curso`
--

INSERT INTO `ref_coordenador_curso` (`id_ref_coordenador_curso`, `fk_coordenador`, `fk_curso`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ref_criterio_formulario`
--

CREATE TABLE IF NOT EXISTS `ref_criterio_formulario` (
  `id_ref_criterio_formulario` int(11) NOT NULL AUTO_INCREMENT,
  `fk_formulario` int(11) NOT NULL,
  `fk_criterio` int(11) NOT NULL,
  PRIMARY KEY (`id_ref_criterio_formulario`),
  KEY `fk_ref_criterio_formulario_formulario1` (`fk_formulario`),
  KEY `fk_ref_criterio_formulario_criterio1` (`fk_criterio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ref_prof_turma`
--

CREATE TABLE IF NOT EXISTS `ref_prof_turma` (
  `id_ref_prof_turma` int(11) NOT NULL AUTO_INCREMENT,
  `fk_turma` int(11) NOT NULL,
  `fk_professor` int(11) NOT NULL,
  PRIMARY KEY (`id_ref_prof_turma`),
  KEY `fk_ref_prof_turma_turma1` (`fk_turma`),
  KEY `fk_ref_prof_turma_professor1` (`fk_professor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ref_usuario_grupo`
--

CREATE TABLE IF NOT EXISTS `ref_usuario_grupo` (
  `id_ref_usuario_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `fk_usuario` int(11) NOT NULL,
  `fk_grupo` int(11) NOT NULL,
  PRIMARY KEY (`id_ref_usuario_grupo`),
  KEY `fk_ref_usuario_grupo_usuario1` (`fk_usuario`),
  KEY `fk_ref_usuario_grupo_grupo1` (`fk_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Fazendo dump de dados para tabela `ref_usuario_grupo`
--

INSERT INTO `ref_usuario_grupo` (`id_ref_usuario_grupo`, `fk_usuario`, `fk_grupo`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 4, 3),
(4, 5, 2),
(5, 6, 2),
(6, 7, 2),
(7, 8, 2),
(8, 9, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `status_tarefa`
--

CREATE TABLE IF NOT EXISTS `status_tarefa` (
  `id_status_tarefa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_status_tarefa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `status_tarefa`
--

INSERT INTO `status_tarefa` (`id_status_tarefa`, `nome`) VALUES
(1, 'A FAZER'),
(2, 'FAZENDO'),
(3, 'REVISÃO'),
(4, 'FEITO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefa`
--

CREATE TABLE IF NOT EXISTS `tarefa` (
  `id_tarefa` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_entrega` date NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `fk_status_tarefa` int(11) NOT NULL,
  `fk_projeti` int(11) NOT NULL,
  `fk_aluno` int(11) NOT NULL,
  PRIMARY KEY (`id_tarefa`),
  KEY `fk_tarefa_status_tarefa1` (`fk_status_tarefa`),
  KEY `fk_tarefa_projeti1` (`fk_projeti`),
  KEY `fk_tarefa_aluno1` (`fk_aluno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Fazendo dump de dados para tabela `tarefa`
--

INSERT INTO `tarefa` (`id_tarefa`, `titulo`, `data_inicio`, `data_entrega`, `descricao`, `data_cadastro`, `fk_status_tarefa`, `fk_projeti`, `fk_aluno`) VALUES
(6, ' Cadastrar Tarefa 1', '2020-05-14', '2020-05-20', ' Cadastrar Tarefa 1 Cadastrar Tarefa 1', '2020-05-15', 2, 1, 1),
(9, 'teste 4', '2020-05-27', '2020-05-31', 'teste 4teste 4teste 4', '2020-05-20', 4, 1, 3),
(10, 'teste tarefa ', '2020-05-18', '2020-05-21', 'teste tarefa teste5555 ', '2020-05-20', 1, 1, 1),
(11, ' Cadastrar Tarefa 2', '2020-05-17', '2020-05-27', 'asdasdasda', '2020-05-20', 3, 1, 2),
(12, 'teste tarefa ', '2020-05-20', '2020-05-21', 'adsfasda', '2020-05-20', 1, 1, 1),
(17, ' TAREFA NOTIFICAÃ‡ÃƒO', '2020-05-21', '2020-05-27', 'BBBBBBB', '2020-05-20', 1, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `nome`, `turno`, `lotacao`, `status_finalizada`, `fk_curso`, `fk_etapa`, `fk_exercicio`) VALUES
(1, 'SIS 01', 'ManhÃ£', 45, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `senha` varchar(255) DEFAULT NULL,
  `fk_pessoa` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuario_pessoa` (`fk_pessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `senha`, `fk_pessoa`) VALUES
(1, '123456', 1),
(2, '123456', 2),
(3, '123456', 4),
(4, '123456', 5),
(5, '123456', 7),
(6, '123456', 8),
(7, '123456', 9),
(8, '123456', 10),
(9, '123456', 11);

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_administrador_pessoa1` FOREIGN KEY (`fk_pessoa`) REFERENCES `pessoa` (`id_pessoa`);

--
-- Restrições para tabelas `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_aluno_pessoa1` FOREIGN KEY (`fk_pessoa`) REFERENCES `pessoa` (`id_pessoa`);

--
-- Restrições para tabelas `coordenador`
--
ALTER TABLE `coordenador`
  ADD CONSTRAINT `fk_coordenador_pessoa1` FOREIGN KEY (`fk_pessoa`) REFERENCES `pessoa` (`id_pessoa`);

--
-- Restrições para tabelas `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `fk_nota_ref_criterio_formulario1` FOREIGN KEY (`fk_ref_criterio_formulario`) REFERENCES `ref_criterio_formulario` (`id_ref_criterio_formulario`);

--
-- Restrições para tabelas `operacao`
--
ALTER TABLE `operacao`
  ADD CONSTRAINT `fk_operacao_acao1` FOREIGN KEY (`fk_acao`) REFERENCES `acao` (`id_acao`),
  ADD CONSTRAINT `fk_operacao_grupo1` FOREIGN KEY (`fk_grupo`) REFERENCES `grupo` (`id_grupo`),
  ADD CONSTRAINT `fk_operacao_modulo1` FOREIGN KEY (`fk_modulo`) REFERENCES `modulo` (`id_modulo`);

--
-- Restrições para tabelas `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_professor_pessoa1` FOREIGN KEY (`fk_pessoa`) REFERENCES `pessoa` (`id_pessoa`);

--
-- Restrições para tabelas `ref_aluno_projeti`
--
ALTER TABLE `ref_aluno_projeti`
  ADD CONSTRAINT `fk_ref_aluno_projeti_aluno1` FOREIGN KEY (`fk_aluno`) REFERENCES `aluno` (`id_aluno`),
  ADD CONSTRAINT `fk_ref_aluno_projeti_projeti1` FOREIGN KEY (`fk_projeti`) REFERENCES `projeti` (`id_projeti`);

--
-- Restrições para tabelas `ref_aluno_turma`
--
ALTER TABLE `ref_aluno_turma`
  ADD CONSTRAINT `fk_ref_aluno_turma_aluno1` FOREIGN KEY (`fk_aluno`) REFERENCES `aluno` (`id_aluno`),
  ADD CONSTRAINT `fk_ref_aluno_turma_turma1` FOREIGN KEY (`fk_turma`) REFERENCES `turma` (`id_turma`);

--
-- Restrições para tabelas `ref_coordenador_curso`
--
ALTER TABLE `ref_coordenador_curso`
  ADD CONSTRAINT `fk_ref_coordenador_curso_coordenador1` FOREIGN KEY (`fk_coordenador`) REFERENCES `coordenador` (`id_coordenador`),
  ADD CONSTRAINT `fk_ref_coordenador_curso_curso1` FOREIGN KEY (`fk_curso`) REFERENCES `curso` (`id_curso`);

--
-- Restrições para tabelas `ref_criterio_formulario`
--
ALTER TABLE `ref_criterio_formulario`
  ADD CONSTRAINT `fk_ref_criterio_formulario_criterio1` FOREIGN KEY (`fk_criterio`) REFERENCES `criterio` (`id_criterio`),
  ADD CONSTRAINT `fk_ref_criterio_formulario_formulario1` FOREIGN KEY (`fk_formulario`) REFERENCES `formulario` (`id_formulario`);

--
-- Restrições para tabelas `ref_prof_turma`
--
ALTER TABLE `ref_prof_turma`
  ADD CONSTRAINT `fk_ref_prof_turma_professor1` FOREIGN KEY (`fk_professor`) REFERENCES `professor` (`id_professor`),
  ADD CONSTRAINT `fk_ref_prof_turma_turma1` FOREIGN KEY (`fk_turma`) REFERENCES `turma` (`id_turma`);

--
-- Restrições para tabelas `ref_usuario_grupo`
--
ALTER TABLE `ref_usuario_grupo`
  ADD CONSTRAINT `fk_ref_usuario_grupo_grupo1` FOREIGN KEY (`fk_grupo`) REFERENCES `grupo` (`id_grupo`),
  ADD CONSTRAINT `fk_ref_usuario_grupo_usuario1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Restrições para tabelas `tarefa`
--
ALTER TABLE `tarefa`
  ADD CONSTRAINT `fk_tarefa_aluno1` FOREIGN KEY (`fk_aluno`) REFERENCES `aluno` (`id_aluno`),
  ADD CONSTRAINT `fk_tarefa_projeti1` FOREIGN KEY (`fk_projeti`) REFERENCES `projeti` (`id_projeti`),
  ADD CONSTRAINT `fk_tarefa_status_tarefa1` FOREIGN KEY (`fk_status_tarefa`) REFERENCES `status_tarefa` (`id_status_tarefa`);

--
-- Restrições para tabelas `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `fk_turma_curso1` FOREIGN KEY (`fk_curso`) REFERENCES `curso` (`id_curso`),
  ADD CONSTRAINT `fk_turma_etapa1` FOREIGN KEY (`fk_etapa`) REFERENCES `etapa` (`id_etapa`),
  ADD CONSTRAINT `fk_turma_exercicio1` FOREIGN KEY (`fk_exercicio`) REFERENCES `exercicio` (`id_exercicio`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_pessoa` FOREIGN KEY (`fk_pessoa`) REFERENCES `pessoa` (`id_pessoa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
