<?php
  require_once('tarefa.model.php');
  require_once('conexao.php');
  //require_once('tarefa.service.php');
  require_once('classes/class.tarefa.php');
  require_once('classes/class.db.php');
  require_once('classes/class.refAlunoProjeti.php');

  $action = 'recuperar';
  // require_once 'tarefa_controller.php';
  $tarefa = new Tarefa();
  $tarefaTeste = new TarefaTeste();
  $conexao = new Conexao();

  //$tarefaService = new TarefaService($conexao, $tarefa);
  //$tarefas = $tarefaService->recuperar();
  try{
    $listarStatus = TarefaTeste::listarStatusTarefa();
  } catch (PDOException $e) {
      echo "ERROR".$e->getMessage();
  }
  try{
      $listarAlunosProjeti = RefAlunoProjeti::listarAlunosProjeti();
  } catch(PDOException $e){
    echo "ERROR".$e->getMessage();
  }
  //
  // echo "<pre>";
  // print_r($tarefas);
  // echo "</pre>";
  if(isset($_POST["button"]) && ($_POST["button"] === "Salvar")){
    try{
      $data_cadastro = date("d/m/Y");
      $tarefa = new TarefaTeste();
      $tarefa->setTitulo($_POST['titulo']);
      $tarefa->setDataInicio($_POST['data_inicio']);
      $tarefa->setDataFim($_POST['data_fim']);
      $tarefa->setDataConclusao($_POST['data_conclusao']);
      $tarefa->setDescricao($_POST['descricao']);
      $tarefa->setDataCadastro($data_cadastro);
      $tarefa->setFkStatusTarefa($_POST['fk_status_tarefa']);
      $tarefa->setFkRefAlunoProjeti($_POST['fk_ref_aluno_projeti']);
      $tarefa->adicionar();
      // if(isset($_POST['status_finalizada'])){ essa lógica de status vai ser util
      //   $turma->setStatusFinalizada(true);
      //  }else{
      //   $turma->setStatusFinalizada(false);
      //  }


      // $refAlunoTarefa = new RefAlunoTarefa();
      // $refAlunoTarefa->setFkTarefa($ultimaTarefa);
      // $refAlunoTarefa->setFkRefAlunoTarefa();
      // $refAlunoTarefa->adicionar();

    }catch(PDOException $e){
      echo "ERROR".$e->getMessage();
    }
  }
  echo "<br>";

?>

<nav class="navbar navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">
      <!-- <img src="img/logo.png" width="150" height="100" class="d-inline-block align-center" alt=""> -->
       <h2>Lista de Tarefas</h2>
    </a>
  </div>
</nav>
<br>
<div class="container">
  <!------------------------------------------------------------
#INICIO BOTÃO DE NOVA TAREFA
--------------------------------------------------------------------------------------------------->
   <button style="float: right;" id="nova_tarefa" type="button" class="btn btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="far fa-plus-square"></i>   Nova Tarefa</button>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <!------------------------------------------------------------
#MODAL BOTÃO DE NOVA TAREFA
--------------------------------------------------------------------------------------------------->

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
                <select class="form-control" name="fk_ref_aluno_projeti" required autofocus>
                 <option value="">Selecione o Responsável</option>
                  <?php if(isset($listarAlunosProjeti)):?>
                    <?php foreach ($listarAlunosProjeti as $alunosProjeti):?>
                      <?php //if($aluno->getSituacaoAluno()):?>
                      <option value="<?php echo $alunosProjeti->getIdRefAlunoProjeti();?>"><?php echo $alunosProjeti->getNomeAlunoProjeti();?></option>
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

 <!------------------------------------------------------------
# FIM MODAL BOTÃO DE NOVA TAREFA
--------------------------------------------------------------------------------------------------->
  <br><br>
  <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs">
      <li class="nav-item col s3">
        <a class="nav-link active" href="#">A Fazer</a>
      </li>
      <li class="nav-item col s3">
        <a class="nav-link" href="#">Fazendo</a>
      </li>
      <li class="nav-item col s3">
        <a class="nav-link" href="#">Revisão</a>
      </li>
      <li class="nav-item col s3">
        <a class="nav-link" href="#">Feito</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title">Montar Logo</h5>
    <p class="card-text">Tarefa tem como objetivo produzir uma logo em vetor para usabilidade no sistema e demais.</p>
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalLogo">
  Detalhes
</button>

<!-- Modal LOGO-->
<div class="modal fade" id="modalLogo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Montar Logo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Aqui vai ficar os detalhes da logo
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
  </div>

</div>

</div>
