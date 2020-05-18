<?php
require_once('../../../classes/class.tarefa.php');
require_once('../../../classes/class.db.php');
require_once('../../../classes/class.refAlunoProjeti.php');
require_once('../../../classes/class.projeti.php');
  //echo $_GET['id'];
  session_start();
  $id_projeti_aluno = Projeti::recuperaIdProjeti($_SESSION['fk_pessoa']);
  try{
      $listarAlunosProjeti = RefAlunoProjeti::listarAlunosProjetiTeste($id_projeti_aluno->getIdProjeti());
  } catch(PDOException $e){
    echo "ERROR".$e->getMessage();
  }

  if(isset($_POST['Atualizar']) && $_POST['Atualizar'] == "Atualizar"){
    try {
      $tarefa = new Tarefa($id_tarefa); //recuperar o id da tarefa que está selecionada pra editar
      $tarefa->setTitulo($_POST['titulo']);
      $tarefa->setDataInicio($_POST['data_inicio']);
      $tarefa->setDataFim($_POST['data_fim']);
      $tarefa->setDataConclusao($_POST['data_conclusao']);
      $tarefa->setDescricao($_POST['descricao']);
      $tarefa->setDataCadastro($_POST['data_cadastro']);
      $tarefa->setFkStatusTarefa($_POST['fk_status_tarefa']);
      $tarefa->setFkProjeti(1);
      $tarefa->setFkAluno(1);
      $tarefa->AtualizarTarefa();
    } catch (PDOException $e) {
      echo "ERROR".$e->getMessage();
    }
  }

  try {
    $listarStatus = Tarefa::listarStatusTarefa();
  } catch (PDOException $e) {
    echo "ERRO".$e->getMessage();
  }

  $tarefa = new Tarefa($_GET['id']);
  //print_r($tarefa);
  //echo $tarefa->getTituloTarefa();
?>

<div class="modal-body">
  <form action="#" method="post">
    <div class="form-group">
      <label class="col-form-label">Título:</label>
      <input type="text" class="form-control" name="titulo" id="titulo" value="<?= $tarefa->getTituloTarefa();?>">
    </div>
    <div class="form-group">
      <label class="col-form-label">Descrição:</label>
      <textarea class="form-control" id="descricao" name="descricao"><?= $tarefa->getDescricao();?></textarea>
    </div>
     <div class="row">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Data de Ínicio:</label>
                  <input type="date" class="form-control" name="data_inicio" id="data_inicio" value="<?php echo $tarefa->getDataInicio();?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Data de Término:</label>
                  <input type="date" class="form-control" name="data_fim" id="data_fim" value="<?= $tarefa->getDataFim();?>">
                </div>
              </div>
      </div>
      <div class="row">
          <div class="col-sm-6">
                <div class="form-group">
                  <label>Data de Entrega:</label>
                  <input type="date" class="form-control" name="data_conclusao" id="data_entrega" value="<?= $tarefa->getDataConclusao();?>">
                </div>
              </div>
               <!-- select -->

               <div class="col-sm-6">
                 <label>Status Tarefa</label>
                 <select class="form-control" name="fk_status_tarefa" required autofocus>
                  <option value="">Selecione o status</option>
                   <?php if(isset($listarStatus)):?>
                     <?php foreach ($listarStatus as $status):?>
                       <option <?php if($status->getIdStatusTarefa() === $tarefa->getFkStatusTarefa()){echo "selected";}?> value="<?php echo $status->getIdStatusTarefa();?>"><?php echo $status->getNomeStatusTarefa();?></option>
                     <?php endforeach;?>
                   <?php endif;?>
                 </select>
               </div>
        </div>
        <div class="col-sm-6">
          <label>Responsável</label>

          <select class="form-control" name="fk_aluno" required autofocus>
            <?php if(isset($listarAlunosProjeti)):?>
              <?php foreach ($listarAlunosProjeti as $alunosProjeti):?>
                <option <?php if($alunosProjeti->getIdAluno() === $tarefa->getFkAluno()){echo "selected";}?> value="<?php echo $alunosProjeti->getIdAluno();?>"><?php echo $alunosProjeti->getNomeAluno();?></option>
              <?php endforeach;?>
            <?php endif;?>
          </select>
        </div>

        <input type="submit" name="Atualizar" value="Atualizar" class="btn btn-primary" >
</div>
