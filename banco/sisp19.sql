-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Set-2020 às 22:43
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisp19`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acao`
--

CREATE TABLE `acao` (
  `id_acao` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `diretorio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `acao`
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
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `data_cadastro` date DEFAULT NULL,
  `situacao_adm` tinyint(4) DEFAULT NULL,
  `fk_pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id_aluno` int(11) NOT NULL,
  `data_matricula` date DEFAULT NULL,
  `situacao_aluno` tinyint(4) DEFAULT NULL,
  `fk_pessoa` int(11) NOT NULL,
  `matricula` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `data_matricula`, `situacao_aluno`, `fk_pessoa`, `matricula`) VALUES
(1, '2019-12-11', 1, 2, '1258742'),
(2, '2019-12-10', 1, 7, '123123'),
(3, '2019-12-05', 1, 8, '123123123'),
(4, '2020-04-10', 1, 9, '2020'),
(5, '2020-04-20', 1, 10, '3030'),
(6, '2020-04-17', 1, 11, '4040'),
(7, '2020-09-29', 1, 15, '2020'),
(8, '2020-09-29', 1, 16, '2112'),
(9, '2020-09-29', 1, 17, '2021');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliador_projeti`
--

CREATE TABLE `avaliador_projeti` (
  `id_avaliador_projeti` int(11) NOT NULL,
  `fk_professor` int(11) NOT NULL,
  `fk_projeti` int(11) NOT NULL,
  `fk_formulario_avaliacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `avaliador_projeti`
--

INSERT INTO `avaliador_projeti` (`id_avaliador_projeti`, `fk_professor`, `fk_projeti`, `fk_formulario_avaliacao`) VALUES
(1, 1, 3, 1),
(2, 2, 3, 1),
(3, 3, 3, 1),
(4, 3, 4, 2),
(5, 3, 5, 2),
(6, 4, 5, 2),
(7, 5, 5, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenador`
--

CREATE TABLE `coordenador` (
  `id_coordenador` int(11) NOT NULL,
  `data_cadastro` date DEFAULT NULL,
  `fk_pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `coordenador`
--

INSERT INTO `coordenador` (`id_coordenador`, `data_cadastro`, `fk_pessoa`) VALUES
(1, '2019-12-11', 4),
(2, '2019-12-04', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `criterio`
--

CREATE TABLE `criterio` (
  `id_criterio` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valor_maximo` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `criterio`
--

INSERT INTO `criterio` (`id_criterio`, `nome`, `valor_maximo`) VALUES
(1, 'Fala tecnica', 10),
(2, 'Apresentacao', 5),
(3, 'teste', 1),
(4, '20 MEGA ABAETETUBA', 15),
(5, 'HB20 R SPEC', 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sigla` varchar(20) NOT NULL,
  `ano_total` varchar(30) NOT NULL,
  `carga_horaria` varchar(45) NOT NULL,
  `status_curso` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `nome`, `sigla`, `ano_total`, `carga_horaria`, `status_curso`) VALUES
(1, 'SISTEMA PARA INTENET', 'SIS', '2.5', '4000', 1),
(2, 'Redes', 'RED', '2', '3000', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `etapa`
--

CREATE TABLE `etapa` (
  `id_etapa` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `ordem` varchar(20) DEFAULT NULL,
  `status_etapa` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `etapa`
--

INSERT INTO `etapa` (`id_etapa`, `nome`, `ordem`, `status_etapa`) VALUES
(1, '1 SEMESTRE', '1', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicio`
--

CREATE TABLE `exercicio` (
  `id_exercicio` int(11) NOT NULL,
  `nome_ano` varchar(35) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `exercicio`
--

INSERT INTO `exercicio` (`id_exercicio`, `nome_ano`, `data_inicio`, `data_fim`) VALUES
(1, '2019', '2019-01-01', '2019-12-31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `formulario_avaliacao`
--

CREATE TABLE `formulario_avaliacao` (
  `id_formulario_avaliacao` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `data_avaliacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `formulario_avaliacao`
--

INSERT INTO `formulario_avaliacao` (`id_formulario_avaliacao`, `nome`, `data_avaliacao`) VALUES
(1, 'Formulário de Sistemas', '2020-09-20'),
(2, 'Formulário de Redes', '2020-09-17'),
(3, NULL, '2020-09-30'),
(4, NULL, '2020-09-30'),
(5, NULL, '2020-09-30'),
(6, NULL, '2020-09-30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `diretorio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(15, 'vinculoProfessor', 'vinculoProfessor'),
(16, 'graficos', 'graficos'),
(17, 'grupo projeti', 'grupo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `valor` double NOT NULL,
  `data_modificacao` date NOT NULL,
  `fk_criterio` int(11) NOT NULL,
  `fk_aluno` int(11) NOT NULL,
  `fk_professor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `nota`
--

INSERT INTO `nota` (`id_nota`, `valor`, `data_modificacao`, `fk_criterio`, `fk_aluno`, `fk_professor`) VALUES
(1, 10, '2020-09-29', 1, 7, 3),
(2, 5, '2020-09-29', 2, 7, 3),
(3, 1, '2020-09-29', 3, 7, 3),
(4, 15, '2020-09-29', 4, 7, 3),
(5, 15, '2020-09-29', 5, 7, 3),
(6, 10, '2020-09-29', 1, 8, 3),
(7, 5, '2020-09-29', 2, 8, 3),
(8, 1, '2020-09-29', 3, 8, 3),
(9, 15, '2020-09-29', 4, 8, 3),
(10, 15, '2020-09-29', 5, 8, 3),
(11, 10, '2020-09-29', 1, 9, 3),
(12, 5, '2020-09-29', 2, 9, 3),
(13, 1, '2020-09-29', 3, 9, 3),
(14, 15, '2020-09-29', 4, 9, 3),
(15, 15, '2020-09-29', 5, 9, 3),
(16, 10, '2020-09-29', 1, 7, 4),
(17, 5, '2020-09-29', 2, 7, 4),
(18, 1, '2020-09-29', 3, 7, 4),
(19, 15, '2020-09-29', 4, 7, 4),
(20, 15, '2020-09-29', 5, 7, 4),
(21, 10, '2020-09-29', 1, 8, 4),
(22, 5, '2020-09-29', 2, 8, 4),
(23, 1, '2020-09-29', 3, 8, 4),
(24, 15, '2020-09-29', 4, 8, 4),
(25, 15, '2020-09-29', 5, 8, 4),
(26, 10, '2020-09-29', 1, 9, 4),
(27, 5, '2020-09-29', 2, 9, 4),
(28, 1, '2020-09-29', 3, 9, 4),
(29, 15, '2020-09-29', 4, 9, 4),
(30, 15, '2020-09-29', 5, 9, 4),
(31, 10, '2020-09-29', 1, 7, 5),
(32, 5, '2020-09-29', 2, 7, 5),
(33, 1, '2020-09-29', 3, 7, 5),
(34, 15, '2020-09-29', 4, 7, 5),
(35, 15, '2020-09-29', 5, 7, 5),
(36, 10, '2020-09-29', 1, 8, 5),
(37, 5, '2020-09-29', 2, 8, 5),
(38, 1, '2020-09-29', 3, 8, 5),
(39, 15, '2020-09-29', 4, 8, 5),
(40, 15, '2020-09-29', 5, 8, 5),
(41, 10, '2020-09-29', 1, 9, 5),
(42, 5, '2020-09-29', 2, 9, 5),
(43, 1, '2020-09-29', 3, 9, 5),
(44, 15, '2020-09-29', 4, 9, 5),
(45, 15, '2020-09-29', 5, 9, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `operacao`
--

CREATE TABLE `operacao` (
  `id_operacao` int(11) NOT NULL,
  `_delete_` char(1) DEFAULT NULL,
  `fk_modulo` int(11) NOT NULL,
  `fk_acao` int(11) NOT NULL,
  `fk_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id_pessoa` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(8, 'marcelo cargodos', 'rafael.proesc@gmail.com', '243.836.040-21', '(96) 99207-2330'),
(9, 'amerson', 'rafael.proesc@gmail.com', '660.454.890-20', '(68) 79781-5643'),
(10, 'aluno 2', 'gabrielaexposto1@gmail.com', '815.724.450-17', '(68) 79781-5643'),
(11, 'batata', 'rafael.proesc@gmail.com', '053.458.610-48', '(68) 79781-5643'),
(12, 'Diego professor', 'diego_barbosa_souza@hotmail.com', '032.475.442-67', '(96) 99160-9500'),
(13, 'Amerson Chagas Mestre', 'amerson@email.com', '111.820.830-72', '(12) 34567'),
(14, 'Allan Cunha', 'allan@meta.edu.com.bt', '471.795.710-59', '(12) 3'),
(15, 'mario kart', 'MARIO@GMAIL.COM', '795.951.360-00', '(12) 31231-2312'),
(16, 'SONIC FAST', 'SONICFAST@GMAIL.COM', '255.115.630-05', '(96) 99142-9380'),
(17, 'naruto fat', 'naturo@gmail.com', '764.925.820-39', '(96) 99142-9380');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id_professor` int(11) NOT NULL,
  `data_cadastro` date DEFAULT NULL,
  `fk_pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id_professor`, `data_cadastro`, `fk_pessoa`) VALUES
(1, '2019-12-11', 3),
(2, '2019-12-28', 6),
(3, '2020-09-19', 12),
(4, '2020-09-29', 13),
(5, '2020-09-29', 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeti`
--

CREATE TABLE `projeti` (
  `id_projeti` int(11) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `projeti`
--

INSERT INTO `projeti` (`id_projeti`, `tema`, `descricao`) VALUES
(3, 'Gerenciador de Tarefas', 'alguma descriÃ§Ã£o'),
(4, 'TEMA 2', 'alguma descriÃ§Ã£o'),
(5, 'Cube Code', 'cube academy'),
(6, 'Cube Code', '          cube academy        '),
(7, 'Cube Code', '                    cube academy                '),
(8, 'Gerenciador de Tarefas', '          alguma descriÃ§Ã£o        ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ref_aluno_projeti`
--

CREATE TABLE `ref_aluno_projeti` (
  `id_ref_aluno_projeti` int(11) NOT NULL,
  `fk_projeti` int(11) NOT NULL,
  `fk_aluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ref_aluno_projeti`
--

INSERT INTO `ref_aluno_projeti` (`id_ref_aluno_projeti`, `fk_projeti`, `fk_aluno`) VALUES
(4, 3, 1),
(5, 3, 2),
(6, 3, 3),
(7, 4, 4),
(8, 4, 5),
(9, 4, 6),
(10, 5, 7),
(11, 5, 8),
(12, 5, 9),
(13, 6, 9),
(14, 7, 9),
(15, 8, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ref_aluno_turma`
--

CREATE TABLE `ref_aluno_turma` (
  `id_ref_aluno_turma` int(11) NOT NULL,
  `fk_aluno` int(11) NOT NULL,
  `fk_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ref_aluno_turma`
--

INSERT INTO `ref_aluno_turma` (`id_ref_aluno_turma`, `fk_aluno`, `fk_turma`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 3),
(8, 8, 3),
(9, 9, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ref_coordenador_curso`
--

CREATE TABLE `ref_coordenador_curso` (
  `id_ref_coordenador_curso` int(11) NOT NULL,
  `fk_coordenador` int(11) NOT NULL,
  `fk_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ref_coordenador_curso`
--

INSERT INTO `ref_coordenador_curso` (`id_ref_coordenador_curso`, `fk_coordenador`, `fk_curso`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ref_formulario_avaliacao_turma`
--

CREATE TABLE `ref_formulario_avaliacao_turma` (
  `id_ref_formulario_turma` int(11) NOT NULL,
  `fk_turma` int(11) DEFAULT NULL,
  `fk_formulario_avaliacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ref_formulario_avaliacao_turma`
--

INSERT INTO `ref_formulario_avaliacao_turma` (`id_ref_formulario_turma`, `fk_turma`, `fk_formulario_avaliacao`) VALUES
(1, 1, NULL),
(2, 1, 1),
(3, 2, 2),
(4, NULL, 2),
(5, 3, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ref_formulario_criterio`
--

CREATE TABLE `ref_formulario_criterio` (
  `id_ref_formulario_criterio` int(11) NOT NULL,
  `fk_formulario_avaliacao` int(11) NOT NULL,
  `fk_criterio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ref_formulario_criterio`
--

INSERT INTO `ref_formulario_criterio` (`id_ref_formulario_criterio`, `fk_formulario_avaliacao`, `fk_criterio`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 3, 1),
(7, 3, 2),
(8, 3, 3),
(9, 4, 1),
(10, 4, 2),
(11, 4, 3),
(12, 5, 1),
(13, 5, 2),
(14, 5, 3),
(15, 6, 1),
(16, 6, 2),
(17, 6, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ref_prof_turma`
--

CREATE TABLE `ref_prof_turma` (
  `id_ref_prof_turma` int(11) NOT NULL,
  `fk_turma` int(11) NOT NULL,
  `fk_professor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ref_prof_turma`
--

INSERT INTO `ref_prof_turma` (`id_ref_prof_turma`, `fk_turma`, `fk_professor`) VALUES
(1, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ref_usuario_grupo`
--

CREATE TABLE `ref_usuario_grupo` (
  `id_ref_usuario_grupo` int(11) NOT NULL,
  `fk_usuario` int(11) NOT NULL,
  `fk_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ref_usuario_grupo`
--

INSERT INTO `ref_usuario_grupo` (`id_ref_usuario_grupo`, `fk_usuario`, `fk_grupo`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 4, 3),
(4, 5, 2),
(5, 6, 2),
(6, 7, 2),
(7, 8, 2),
(8, 9, 2),
(9, 10, 4),
(10, 11, 4),
(11, 12, 4),
(12, 13, 2),
(13, 14, 2),
(14, 15, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_tarefa`
--

CREATE TABLE `status_tarefa` (
  `id_status_tarefa` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tarefa` (
  `id_tarefa` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_entrega` date NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `fk_status_tarefa` int(11) NOT NULL,
  `fk_projeti` int(11) NOT NULL,
  `fk_aluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id_turma` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `turno` varchar(45) NOT NULL,
  `lotacao` int(11) NOT NULL,
  `status_finalizada` tinyint(4) DEFAULT NULL,
  `fk_curso` int(11) NOT NULL,
  `fk_etapa` int(11) NOT NULL,
  `fk_exercicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `nome`, `turno`, `lotacao`, `status_finalizada`, `fk_curso`, `fk_etapa`, `fk_exercicio`) VALUES
(1, 'SIS 01', 'ManhÃ£', 45, 1, 1, 1, 1),
(2, 'sis - 2020', 'ManhÃ£', 3, 1, 1, 1, 1),
(3, 'REDES ', 'MANHÃƒ', 30, 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `fk_pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
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
(9, '123456', 11),
(10, '123456', 12),
(11, '123456', 13),
(12, '123456', 14),
(13, '123456', 15),
(14, '123456', 16),
(15, '123456', 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acao`
--
ALTER TABLE `acao`
  ADD PRIMARY KEY (`id_acao`);

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`),
  ADD KEY `fk_administrador_pessoa1` (`fk_pessoa`);

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id_aluno`),
  ADD KEY `fk_aluno_pessoa1` (`fk_pessoa`);

--
-- Indexes for table `avaliador_projeti`
--
ALTER TABLE `avaliador_projeti`
  ADD PRIMARY KEY (`id_avaliador_projeti`),
  ADD KEY `fk_avaliador_projeti_professor1` (`fk_professor`),
  ADD KEY `fk_avaliador_projeti_projeti1` (`fk_projeti`),
  ADD KEY `fk_formulario_avaliacao` (`fk_formulario_avaliacao`);

--
-- Indexes for table `coordenador`
--
ALTER TABLE `coordenador`
  ADD PRIMARY KEY (`id_coordenador`),
  ADD KEY `fk_coordenador_pessoa1` (`fk_pessoa`);

--
-- Indexes for table `criterio`
--
ALTER TABLE `criterio`
  ADD PRIMARY KEY (`id_criterio`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indexes for table `etapa`
--
ALTER TABLE `etapa`
  ADD PRIMARY KEY (`id_etapa`);

--
-- Indexes for table `exercicio`
--
ALTER TABLE `exercicio`
  ADD PRIMARY KEY (`id_exercicio`);

--
-- Indexes for table `formulario_avaliacao`
--
ALTER TABLE `formulario_avaliacao`
  ADD PRIMARY KEY (`id_formulario_avaliacao`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indexes for table `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `fk_nota_criterio1` (`fk_criterio`),
  ADD KEY `fk_nota_aluno1` (`fk_aluno`),
  ADD KEY `fk_nota_professor1` (`fk_professor`);

--
-- Indexes for table `operacao`
--
ALTER TABLE `operacao`
  ADD PRIMARY KEY (`id_operacao`),
  ADD KEY `fk_operacao_modulo1` (`fk_modulo`),
  ADD KEY `fk_operacao_acao1` (`fk_acao`),
  ADD KEY `fk_operacao_grupo1` (`fk_grupo`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id_pessoa`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id_professor`),
  ADD KEY `fk_professor_pessoa1` (`fk_pessoa`);

--
-- Indexes for table `projeti`
--
ALTER TABLE `projeti`
  ADD PRIMARY KEY (`id_projeti`);

--
-- Indexes for table `ref_aluno_projeti`
--
ALTER TABLE `ref_aluno_projeti`
  ADD PRIMARY KEY (`id_ref_aluno_projeti`),
  ADD KEY `fk_ref_aluno_projeti_projeti1` (`fk_projeti`),
  ADD KEY `fk_ref_aluno_projeti_aluno1` (`fk_aluno`);

--
-- Indexes for table `ref_aluno_turma`
--
ALTER TABLE `ref_aluno_turma`
  ADD PRIMARY KEY (`id_ref_aluno_turma`),
  ADD KEY `fk_ref_aluno_turma_aluno1` (`fk_aluno`),
  ADD KEY `fk_ref_aluno_turma_turma1` (`fk_turma`);

--
-- Indexes for table `ref_coordenador_curso`
--
ALTER TABLE `ref_coordenador_curso`
  ADD PRIMARY KEY (`id_ref_coordenador_curso`),
  ADD KEY `fk_ref_coordenador_curso_coordenador1` (`fk_coordenador`),
  ADD KEY `fk_ref_coordenador_curso_curso1` (`fk_curso`);

--
-- Indexes for table `ref_formulario_avaliacao_turma`
--
ALTER TABLE `ref_formulario_avaliacao_turma`
  ADD PRIMARY KEY (`id_ref_formulario_turma`),
  ADD KEY `fk_turma` (`fk_turma`),
  ADD KEY `fk_formulario_avaliacao` (`fk_formulario_avaliacao`);

--
-- Indexes for table `ref_formulario_criterio`
--
ALTER TABLE `ref_formulario_criterio`
  ADD PRIMARY KEY (`id_ref_formulario_criterio`),
  ADD KEY `fk_ref_formulario_criterio_formulario_avaliacao1` (`fk_formulario_avaliacao`),
  ADD KEY `fk_ref_formulario_criterio_criterio1` (`fk_criterio`);

--
-- Indexes for table `ref_prof_turma`
--
ALTER TABLE `ref_prof_turma`
  ADD PRIMARY KEY (`id_ref_prof_turma`),
  ADD KEY `fk_ref_prof_turma_turma1` (`fk_turma`),
  ADD KEY `fk_ref_prof_turma_professor1` (`fk_professor`);

--
-- Indexes for table `ref_usuario_grupo`
--
ALTER TABLE `ref_usuario_grupo`
  ADD PRIMARY KEY (`id_ref_usuario_grupo`),
  ADD KEY `fk_ref_usuario_grupo_usuario1` (`fk_usuario`),
  ADD KEY `fk_ref_usuario_grupo_grupo1` (`fk_grupo`);

--
-- Indexes for table `status_tarefa`
--
ALTER TABLE `status_tarefa`
  ADD PRIMARY KEY (`id_status_tarefa`);

--
-- Indexes for table `tarefa`
--
ALTER TABLE `tarefa`
  ADD PRIMARY KEY (`id_tarefa`),
  ADD KEY `fk_tarefa_status_tarefa1` (`fk_status_tarefa`),
  ADD KEY `fk_tarefa_projeti1` (`fk_projeti`),
  ADD KEY `fk_tarefa_aluno1` (`fk_aluno`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `fk_turma_curso1` (`fk_curso`),
  ADD KEY `fk_turma_etapa1` (`fk_etapa`),
  ADD KEY `fk_turma_exercicio1` (`fk_exercicio`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuario_pessoa` (`fk_pessoa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acao`
--
ALTER TABLE `acao`
  MODIFY `id_acao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `avaliador_projeti`
--
ALTER TABLE `avaliador_projeti`
  MODIFY `id_avaliador_projeti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coordenador`
--
ALTER TABLE `coordenador`
  MODIFY `id_coordenador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `criterio`
--
ALTER TABLE `criterio`
  MODIFY `id_criterio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `etapa`
--
ALTER TABLE `etapa`
  MODIFY `id_etapa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exercicio`
--
ALTER TABLE `exercicio`
  MODIFY `id_exercicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `formulario_avaliacao`
--
ALTER TABLE `formulario_avaliacao`
  MODIFY `id_formulario_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `operacao`
--
ALTER TABLE `operacao`
  MODIFY `id_operacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projeti`
--
ALTER TABLE `projeti`
  MODIFY `id_projeti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ref_aluno_projeti`
--
ALTER TABLE `ref_aluno_projeti`
  MODIFY `id_ref_aluno_projeti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ref_aluno_turma`
--
ALTER TABLE `ref_aluno_turma`
  MODIFY `id_ref_aluno_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ref_coordenador_curso`
--
ALTER TABLE `ref_coordenador_curso`
  MODIFY `id_ref_coordenador_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ref_formulario_avaliacao_turma`
--
ALTER TABLE `ref_formulario_avaliacao_turma`
  MODIFY `id_ref_formulario_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ref_formulario_criterio`
--
ALTER TABLE `ref_formulario_criterio`
  MODIFY `id_ref_formulario_criterio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ref_prof_turma`
--
ALTER TABLE `ref_prof_turma`
  MODIFY `id_ref_prof_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ref_usuario_grupo`
--
ALTER TABLE `ref_usuario_grupo`
  MODIFY `id_ref_usuario_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `status_tarefa`
--
ALTER TABLE `status_tarefa`
  MODIFY `id_status_tarefa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tarefa`
--
ALTER TABLE `tarefa`
  MODIFY `id_tarefa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_administrador_pessoa1` FOREIGN KEY (`fk_pessoa`) REFERENCES `pessoa` (`id_pessoa`);

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_aluno_pessoa1` FOREIGN KEY (`fk_pessoa`) REFERENCES `pessoa` (`id_pessoa`);

--
-- Limitadores para a tabela `avaliador_projeti`
--
ALTER TABLE `avaliador_projeti`
  ADD CONSTRAINT `avaliador_projeti_ibfk_1` FOREIGN KEY (`fk_formulario_avaliacao`) REFERENCES `formulario_avaliacao` (`id_formulario_avaliacao`),
  ADD CONSTRAINT `fk_avaliador_projeti_professor1` FOREIGN KEY (`fk_professor`) REFERENCES `professor` (`id_professor`),
  ADD CONSTRAINT `fk_avaliador_projeti_projeti1` FOREIGN KEY (`fk_projeti`) REFERENCES `projeti` (`id_projeti`);

--
-- Limitadores para a tabela `coordenador`
--
ALTER TABLE `coordenador`
  ADD CONSTRAINT `fk_coordenador_pessoa1` FOREIGN KEY (`fk_pessoa`) REFERENCES `pessoa` (`id_pessoa`);

--
-- Limitadores para a tabela `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `fk_nota_aluno1` FOREIGN KEY (`fk_aluno`) REFERENCES `aluno` (`id_aluno`),
  ADD CONSTRAINT `fk_nota_criterio1` FOREIGN KEY (`fk_criterio`) REFERENCES `criterio` (`id_criterio`),
  ADD CONSTRAINT `fk_nota_professor1` FOREIGN KEY (`fk_professor`) REFERENCES `professor` (`id_professor`);

--
-- Limitadores para a tabela `operacao`
--
ALTER TABLE `operacao`
  ADD CONSTRAINT `fk_operacao_acao1` FOREIGN KEY (`fk_acao`) REFERENCES `acao` (`id_acao`),
  ADD CONSTRAINT `fk_operacao_grupo1` FOREIGN KEY (`fk_grupo`) REFERENCES `grupo` (`id_grupo`),
  ADD CONSTRAINT `fk_operacao_modulo1` FOREIGN KEY (`fk_modulo`) REFERENCES `modulo` (`id_modulo`);

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_professor_pessoa1` FOREIGN KEY (`fk_pessoa`) REFERENCES `pessoa` (`id_pessoa`);

--
-- Limitadores para a tabela `ref_aluno_projeti`
--
ALTER TABLE `ref_aluno_projeti`
  ADD CONSTRAINT `fk_ref_aluno_projeti_aluno1` FOREIGN KEY (`fk_aluno`) REFERENCES `aluno` (`id_aluno`),
  ADD CONSTRAINT `fk_ref_aluno_projeti_projeti1` FOREIGN KEY (`fk_projeti`) REFERENCES `projeti` (`id_projeti`);

--
-- Limitadores para a tabela `ref_aluno_turma`
--
ALTER TABLE `ref_aluno_turma`
  ADD CONSTRAINT `fk_ref_aluno_turma_aluno1` FOREIGN KEY (`fk_aluno`) REFERENCES `aluno` (`id_aluno`),
  ADD CONSTRAINT `fk_ref_aluno_turma_turma1` FOREIGN KEY (`fk_turma`) REFERENCES `turma` (`id_turma`);

--
-- Limitadores para a tabela `ref_coordenador_curso`
--
ALTER TABLE `ref_coordenador_curso`
  ADD CONSTRAINT `fk_ref_coordenador_curso_coordenador1` FOREIGN KEY (`fk_coordenador`) REFERENCES `coordenador` (`id_coordenador`),
  ADD CONSTRAINT `fk_ref_coordenador_curso_curso1` FOREIGN KEY (`fk_curso`) REFERENCES `curso` (`id_curso`);

--
-- Limitadores para a tabela `ref_formulario_avaliacao_turma`
--
ALTER TABLE `ref_formulario_avaliacao_turma`
  ADD CONSTRAINT `ref_formulario_avaliacao_turma_ibfk_1` FOREIGN KEY (`fk_turma`) REFERENCES `turma` (`id_turma`),
  ADD CONSTRAINT `ref_formulario_avaliacao_turma_ibfk_2` FOREIGN KEY (`fk_formulario_avaliacao`) REFERENCES `formulario_avaliacao` (`id_formulario_avaliacao`);

--
-- Limitadores para a tabela `ref_formulario_criterio`
--
ALTER TABLE `ref_formulario_criterio`
  ADD CONSTRAINT `fk_ref_formulario_criterio_criterio1` FOREIGN KEY (`fk_criterio`) REFERENCES `criterio` (`id_criterio`),
  ADD CONSTRAINT `fk_ref_formulario_criterio_formulario_avaliacao1` FOREIGN KEY (`fk_formulario_avaliacao`) REFERENCES `formulario_avaliacao` (`id_formulario_avaliacao`);

--
-- Limitadores para a tabela `ref_prof_turma`
--
ALTER TABLE `ref_prof_turma`
  ADD CONSTRAINT `fk_ref_prof_turma_professor1` FOREIGN KEY (`fk_professor`) REFERENCES `professor` (`id_professor`),
  ADD CONSTRAINT `fk_ref_prof_turma_turma1` FOREIGN KEY (`fk_turma`) REFERENCES `turma` (`id_turma`);

--
-- Limitadores para a tabela `ref_usuario_grupo`
--
ALTER TABLE `ref_usuario_grupo`
  ADD CONSTRAINT `fk_ref_usuario_grupo_grupo1` FOREIGN KEY (`fk_grupo`) REFERENCES `grupo` (`id_grupo`),
  ADD CONSTRAINT `fk_ref_usuario_grupo_usuario1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD CONSTRAINT `fk_tarefa_aluno1` FOREIGN KEY (`fk_aluno`) REFERENCES `aluno` (`id_aluno`),
  ADD CONSTRAINT `fk_tarefa_projeti1` FOREIGN KEY (`fk_projeti`) REFERENCES `projeti` (`id_projeti`),
  ADD CONSTRAINT `fk_tarefa_status_tarefa1` FOREIGN KEY (`fk_status_tarefa`) REFERENCES `status_tarefa` (`id_status_tarefa`);

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `fk_turma_curso1` FOREIGN KEY (`fk_curso`) REFERENCES `curso` (`id_curso`),
  ADD CONSTRAINT `fk_turma_etapa1` FOREIGN KEY (`fk_etapa`) REFERENCES `etapa` (`id_etapa`),
  ADD CONSTRAINT `fk_turma_exercicio1` FOREIGN KEY (`fk_exercicio`) REFERENCES `exercicio` (`id_exercicio`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_pessoa` FOREIGN KEY (`fk_pessoa`) REFERENCES `pessoa` (`id_pessoa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
