
-- -----------------------------------------------------
-- Schema sisp09
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sisp09` DEFAULT CHARACTER SET utf8 ;
USE `sisp09` ;

-- -----------------------------------------------------
-- Table `sisp09`.`pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`pessoa` (
  `id_pessoa` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NULL,
  `cpf` VARCHAR(14) NULL,
  `telefone` VARCHAR(30) NULL,
  PRIMARY KEY (`id_pessoa`));


-- -----------------------------------------------------
-- Table `sisp09`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `senha` VARCHAR(255) NULL,
  `fk_pessoa` INT NOT NULL,
  PRIMARY KEY (`id_usuario`),
  CONSTRAINT `fk_usuario_pessoa`
    FOREIGN KEY (`fk_pessoa`)
    REFERENCES `sisp09`.`pessoa` (`id_pessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `sisp09`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`aluno` (
  `id_aluno` INT NOT NULL AUTO_INCREMENT,
  `data_matricula` DATE NULL,
  `matricula` VARCHAR(45) NULL,
  `situacao_aluno` TINYINT NULL,
  `fk_pessoa` INT NOT NULL,
  PRIMARY KEY (`id_aluno`),
  CONSTRAINT `fk_aluno_pessoa1`
    FOREIGN KEY (`fk_pessoa`)
    REFERENCES `sisp09`.`pessoa` (`id_pessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `sisp09`.`coordenador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`coordenador` (
  `id_coordenador` INT NOT NULL AUTO_INCREMENT,
  `data_cadastro` DATE NULL,
  `fk_pessoa` INT NOT NULL,
  PRIMARY KEY (`id_coordenador`),
  CONSTRAINT `fk_coordenador_pessoa1`
    FOREIGN KEY (`fk_pessoa`)
    REFERENCES `sisp09`.`pessoa` (`id_pessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `sisp09`.`professor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`professor` (
  `id_professor` INT NOT NULL AUTO_INCREMENT,
  `data_cadastro` DATE NULL,
  `fk_pessoa` INT NOT NULL,
  PRIMARY KEY (`id_professor`),
  CONSTRAINT `fk_professor_pessoa1`
    FOREIGN KEY (`fk_pessoa`)
    REFERENCES `sisp09`.`pessoa` (`id_pessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `sisp09`.`grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`grupo` (
  `id_grupo` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL,
  PRIMARY KEY (`id_grupo`));


-- -----------------------------------------------------
-- Table `sisp09`.`ref_usuario_grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`ref_usuario_grupo` (
  `id_ref_usuario_grupo` INT NOT NULL AUTO_INCREMENT,
  `fk_usuario` INT NOT NULL,
  `fk_grupo` INT NOT NULL,
  PRIMARY KEY (`id_ref_usuario_grupo`),
  CONSTRAINT `fk_ref_usuario_grupo_usuario1`
    FOREIGN KEY (`fk_usuario`)
    REFERENCES `sisp09`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ref_usuario_grupo_grupo1`
    FOREIGN KEY (`fk_grupo`)
    REFERENCES `sisp09`.`grupo` (`id_grupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `sisp09`.`modulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`modulo` (
  `id_modulo` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NULL,
  `diretorio` VARCHAR(255) NULL,
  PRIMARY KEY (`id_modulo`));


-- -----------------------------------------------------
-- Table `sisp09`.`acao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`acao` (
  `id_acao` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NULL,
  `diretorio` VARCHAR(255) NULL,
  PRIMARY KEY (`id_acao`));


-- -----------------------------------------------------
-- Table `sisp09`.`operacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`operacao` (
  `id_operacao` INT NOT NULL AUTO_INCREMENT,
  `_delete_` CHAR(1) NULL,
  `fk_modulo` INT NOT NULL,
  `fk_acao` INT NOT NULL,
  `fk_grupo` INT NOT NULL,
  PRIMARY KEY (`id_operacao`),
  CONSTRAINT `fk_operacao_modulo1`
    FOREIGN KEY (`fk_modulo`)
    REFERENCES `sisp09`.`modulo` (`id_modulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_operacao_acao1`
    FOREIGN KEY (`fk_acao`)
    REFERENCES `sisp09`.`acao` (`id_acao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_operacao_grupo1`
    FOREIGN KEY (`fk_grupo`)
    REFERENCES `sisp09`.`grupo` (`id_grupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `sisp09`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`curso` (
  `id_curso` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `sigla` VARCHAR(20) NOT NULL,
  `ano_total` VARCHAR(30) NOT NULL,
  `carga_horaria` VARCHAR(45) NOT NULL,
  `status_curso` TINYINT NULL,
  PRIMARY KEY (`id_curso`));


-- -----------------------------------------------------
-- Table `sisp09`.`etapa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`etapa` (
  `id_etapa` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `ordem` VARCHAR(20) NULL,
  `status_etapa` TINYINT NULL,
  PRIMARY KEY (`id_etapa`));


-- -----------------------------------------------------
-- Table `sisp09`.`exercicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`exercicio` (
  `id_exercicio` INT NOT NULL AUTO_INCREMENT,
  `nome_ano` VARCHAR(35) NOT NULL,
  `data_inicio` DATE NOT NULL,
  `data_fim` DATE NULL,
  PRIMARY KEY (`id_exercicio`));


-- -----------------------------------------------------
-- Table `sisp09`.`turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`turma` (
  `id_turma` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `turno` VARCHAR(45) NOT NULL,
  `lotacao` INT NOT NULL,
  `status_finalizada` TINYINT NULL,
  `fk_curso` INT NOT NULL,
  `fk_etapa` INT NOT NULL,
  `fk_exercicio` INT NOT NULL,
  PRIMARY KEY (`id_turma`),
  CONSTRAINT `fk_turma_curso1`
    FOREIGN KEY (`fk_curso`)
    REFERENCES `sisp09`.`curso` (`id_curso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_etapa1`
    FOREIGN KEY (`fk_etapa`)
    REFERENCES `sisp09`.`etapa` (`id_etapa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_exercicio1`
    FOREIGN KEY (`fk_exercicio`)
    REFERENCES `sisp09`.`exercicio` (`id_exercicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `sisp09`.`ref_prof_turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`ref_prof_turma` (
  `id_ref_prof_turma` INT NOT NULL AUTO_INCREMENT,
  `fk_turma` INT NOT NULL,
  `fk_professor` INT NOT NULL,
  PRIMARY KEY (`id_ref_prof_turma`),
  CONSTRAINT `fk_ref_prof_turma_turma1`
    FOREIGN KEY (`fk_turma`)
    REFERENCES `sisp09`.`turma` (`id_turma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ref_prof_turma_professor1`
    FOREIGN KEY (`fk_professor`)
    REFERENCES `sisp09`.`professor` (`id_professor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `sisp09`.`ref_coordenador_curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`ref_coordenador_curso` (
  `id_ref_coordenador_curso` INT NOT NULL AUTO_INCREMENT,
  `fk_coordenador` INT NOT NULL,
  `fk_curso` INT NOT NULL,
  PRIMARY KEY (`id_ref_coordenador_curso`),
  CONSTRAINT `fk_ref_coordenador_curso_coordenador1`
    FOREIGN KEY (`fk_coordenador`)
    REFERENCES `sisp09`.`coordenador` (`id_coordenador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ref_coordenador_curso_curso1`
    FOREIGN KEY (`fk_curso`)
    REFERENCES `sisp09`.`curso` (`id_curso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `sisp09`.`ref_aluno_turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`ref_aluno_turma` (
  `id_ref_aluno_turma` INT NOT NULL AUTO_INCREMENT,
  `fk_aluno` INT NOT NULL,
  `fk_turma` INT NOT NULL,
  PRIMARY KEY (`id_ref_aluno_turma`),
  CONSTRAINT `fk_ref_aluno_turma_aluno1`
    FOREIGN KEY (`fk_aluno`)
    REFERENCES `sisp09`.`aluno` (`id_aluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ref_aluno_turma_turma1`
    FOREIGN KEY (`fk_turma`)
    REFERENCES `sisp09`.`turma` (`id_turma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `sisp09`.`projeti`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`projeti` (
  `id_projeti` INT NOT NULL AUTO_INCREMENT,
  `tema` VARCHAR(255) NOT NULL,
  `decricao` TEXT NOT NULL,
  PRIMARY KEY (`id_projeti`));


-- -----------------------------------------------------
-- Table `sisp09`.`ref_aluno_projeti`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`ref_aluno_projeti` (
  `id_ref_aluno_projeti` INT NOT NULL AUTO_INCREMENT,
  `fk_projeti` INT NOT NULL,
  `fk_aluno` INT NOT NULL,
  PRIMARY KEY (`id_ref_aluno_projeti`),
  CONSTRAINT `fk_ref_aluno_projeti_projeti1`
    FOREIGN KEY (`fk_projeti`)
    REFERENCES `sisp09`.`projeti` (`id_projeti`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ref_aluno_projeti_aluno1`
    FOREIGN KEY (`fk_aluno`)
    REFERENCES `sisp09`.`aluno` (`id_aluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `sisp09`.`status_tarefa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`status_tarefa` (
  `id_status_tarefa` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  PRIMARY KEY (`id_status_tarefa`));


-- -----------------------------------------------------
-- Table `sisp09`.`tarefa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`tarefa` (
  `id_tarefa` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  `data_inicio` DATE NOT NULL,
  `data_fim` DATE NOT NULL,
  `data_conclusao` DATE NULL,
  `descricao` VARCHAR(255) NULL,
  `data_cadastro` DATE NULL,
  `fk_projeti` INT NOT NULL,
  `fk_status_tarefa` INT NOT NULL,
  PRIMARY KEY (`id_tarefa`),
    CONSTRAINT `fk_tarefa_projeti1`
    FOREIGN KEY (`fk_projeti`)
    REFERENCES `sisp09`.`projeti` (`id_projeti`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tarefa_status_tarefa1`
    FOREIGN KEY (`fk_status_tarefa`)
    REFERENCES `sisp09`.`status_tarefa` (`id_status_tarefa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `sisp09`.`ref_projeti_tarefa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisp09`.`ref_projeti_tarefa` (
  `id_ref_projeti_tarefa` INT NOT NULL AUTO_INCREMENT,
  `fk_tarefa` INT NOT NULL,
  `fk_ref_aluno_projeti` INT NOT NULL,
  PRIMARY KEY (`id_ref_projeti_tarefa`),
  CONSTRAINT `fk_ref_projeti_tarefa_tarefa1`
    FOREIGN KEY (`fk_tarefa`)
    REFERENCES `sisp09`.`tarefa` (`id_tarefa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ref_projeti_tarefa_ref_aluno_projeti1`
    FOREIGN KEY (`fk_ref_aluno_projeti`)
    REFERENCES `sisp09`.`ref_aluno_projeti` (`id_ref_aluno_projeti`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


