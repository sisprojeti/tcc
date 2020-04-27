<?php
  require_once('classes/class.tarefa.php');
  require_once('classes/class.db.php');
  require_once('classes/class.refAlunoProjeti.php');
  include_once('classes/class.projeti.php');
  //include_once("classs/class.etapa.php");
  $id_projeti_aluno = Projeti::recuperaIdProjeti($_SESSION['fk_pessoa']);
  try{
    $listarStatus = Tarefa::listarStatusTarefa();
  } catch (PDOException $e) {
      echo "ERROR".$e->getMessage();
  }
  try{
      $listarAlunosProjeti = RefAlunoProjeti::listarAlunosProjetiTeste($id_projeti_aluno->getIdProjeti());
  } catch(PDOException $e){
    echo "ERROR".$e->getMessage();
  }
  try{
      $listarTarefas = Tarefa::listar();
  }catch(PDOException $e){
    echo "ERROR".$e->getMessage();
  }
// if(isset($_POST["button"]) && ($_POST["button"] === "Detalhes")){
//   try {
//       $tarefas = Tarefa::listarAlunosTarefa();
//       foreach ($tarefas as $tarefa) {
//         print_r($tarefa);
//       }
//   } catch (Exception $e) {
//     echo "ERROR:".$e->getMessage();
//    }
// }

  if(isset($_POST["button"]) && ($_POST["button"] === "Salvar")){
    try{
      $data_cadastro = date("Y-m-d");
      $tarefa = new Tarefa();
      $tarefa->setTitulo($_POST['titulo']);
      $tarefa->setDataInicio($_POST['data_inicio']);
      $tarefa->setDataFim($_POST['data_fim']);
      $tarefa->setDataConclusao($_POST['data_conclusao']);
      $tarefa->setDescricao($_POST['descricao']);
      $tarefa->setDataCadastro($data_cadastro);
      $tarefa->setFkStatusTarefa($_POST['fk_status_tarefa']);
      $tarefa->setFkProjeti($id_projeti_aluno->getIdProjeti());
      $tarefa->setFkAluno($_POST['fk_aluno']);
      $tarefa->adicionar();
      //print_r($tarefa);
      // if(isset($_POST['status_finalizada'])){ essa lógica de status vai ser util
      //   $turma->setStatusFinalizada(true);
      //  }else{
      //   $turma->setStatusFinalizada(false);
      //  }

    }catch(PDOException $e){
      echo "ERROR".$e->getMessage();
    }
  }
?>

  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nova Tarefa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post">
          <div class="form-group">
            <label class="col-form-label">Título:</label>
            <input type="text" class="form-control" name="titulo" id="titulo">
          </div>
          <div class="form-group">
            <label class="col-form-label">Descrição:</label>
            <textarea class="form-control" id="descricao" name="descricao"></textarea>
          </div>
           <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Data de Ínicio:</label>
                        <input type="date" class="form-control" name="data_inicio" id="data_inicio" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Data de Término:</label>
                        <input type="date" class="form-control" name="data_fim" id="data_fim">
                      </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                      <div class="form-group">
                        <label>Data de Entrega:</label>
                        <input type="date" class="form-control" name="data_conclusao" id="data_entrega">
                      </div>
                    </div>
                     <!-- select -->

                     <div class="col-sm-6">
                       <label>Status Tarefa</label>
                       <select class="form-control" name="fk_status_tarefa" required autofocus>
                        <option value="">Selecione o status</option>
                         <?php if(isset($listarStatus)):?>
                           <?php foreach ($listarStatus as $status):?>
                             <?php //if($aluno->getSituacaoAluno()):?>
                             <option value="<?php echo $status->getIdStatusTarefa();?>"><?php echo $status->getNomeStatusTarefa();?></option>
                           <?php endforeach;?>
                         <?php endif;?>
                       </select>
                     </div>
              </div>

              <div class="col-sm-6">
                <label>Responsável</label>

                <select class="form-control" name="fk_aluno" required autofocus>
                 <option value="">Selecione o Responsável</option>
                  <?php if(isset($listarAlunosProjeti)):?>
                    <?php foreach ($listarAlunosProjeti as $alunosProjeti):?>
                      <?php //if($aluno->getSituacaoAluno()):?>
                      <option value="<?php echo $alunosProjeti->getIdAluno();?>"><?php echo $alunosProjeti->getNomeAluno();?></option>
                    <?php endforeach;?>
                  <?php endif;?>
                </select>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <input type="submit" name="button" value="Salvar" class="btn btn-primary" >
      </div>
      </form>
    </div>
  </div>
</div>
