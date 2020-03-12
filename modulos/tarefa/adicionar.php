<?php
include_once("classes/class.tarefa.php");
include_once("classes/class.refAlunoTarefa.php");

//include_once("classs/class.etapa.php");
  if(isset($_POST['button']) && $_POST['button'] === 'Salvar'){
    try{
      $tarefa = new TarefaTeste();
      $tarefa->setTitulo($_POST['titulo']);
      $tarefa->setDataInicio($_POST['data_inicio']);
      $tarefa->setDataFim($_POST['data_fim']);
      $tarefa->setDataConclusao($_POST['data_conclusao']);
      $tarefa->setDescricao($_POST['descricao']);
      $tarefa->setDataCadastro($_POST['data_cadastro']);
      $tarefa->setFkProjeti(1);
      $tarefa->setFkStatusTarefa($_POST['fk_status']);
      // if(isset($_POST['status_finalizada'])){ essa lógica de status vai ser util
      //   $turma->setStatusFinalizada(true);
      //  }else{
      //   $turma->setStatusFinalizada(false);
      //  }
      $tarefa->inserirTeste();

      $refAlunoTarefa = new RefAlunoTarefa();
      $refAlunoTarefa->setFkTarefa($ultimaTarefa);
      $refAlunoTarefa->setFkRefAlunoTarefa();
      $refAlunoTarefa->adicionar();

    }catch(PDOException $e){
      echo "ERROR".$e->getMessage();
    }
  }
