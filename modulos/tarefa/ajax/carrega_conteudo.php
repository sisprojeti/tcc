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

  try {
    $listarStatus = Tarefa::listarStatusTarefa();
  } catch (PDOException $e) {
    echo "ERRO".$e->getMessage();
  }

  $tarefa = new Tarefa($_GET['id']);
  //print_r($tarefa);
  //echo $tarefa->getTituloTarefa();
?>

<script type="text/javascript">
            jQuery(function($){
                $('#edita_tarefa').submit(function(){
                    $.post('modulos/tarefa/atualizar.php', $('#edita_tarefa .input'), function(retorno){
                        alert('Tarefa atualizada com sucesso');
                        window.location.reload();
                    }, 'html');
                    return false;
                });
            });
</script>

<div class="modal-body">
  <form method="post" id="edita_tarefa">
    <input type="hidden" class="form-control input" name="id_tarefa" id="id_tarefa" value="<?= $tarefa->getIdTarefa();?>">
    <div class="form-group">
      <label class="col-form-label">Título:</label>
      <input type="text" class="form-control input" name="titulo" id="titulo" value="<?= $tarefa->getTituloTarefa();?>">
    </div>
    <div class="form-group">
      <label class="col-form-label">Descrição:</label>
      <textarea class="form-control input" id="descricao" name="descricao"><?= $tarefa->getDescricao();?></textarea>
    </div>
     <div class="row">
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>Data de Início:</label>
                  <input type="date" class="form-control input" name="data_inicio" id="data_inicio" value="<?php echo $tarefa->getDataInicio();?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Data de Entrega:</label>
                  <input type="date" class="form-control input" name="data_entrega" id="data_entrega" value="<?= $tarefa->getDataEntrega();?>">
                </div>
              </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <label>Responsável</label>
          <select class="form-control input" name="fk_aluno" required autofocus>
            <?php if(isset($listarAlunosProjeti)):?>
              <?php foreach ($listarAlunosProjeti as $alunosProjeti):?>
                <option <?php if($alunosProjeti->getIdAluno() === $tarefa->getFkAluno()){echo "selected";}?> value="<?php echo $alunosProjeti->getIdAluno();?>"><?php echo $alunosProjeti->getNomeAluno();?></option>
              <?php endforeach;?>
            <?php endif;?>
          </select>
        </div>
      </div>
        <br>
      <div class="row">
               <div class="col-sm-6">
                 <label>Status Tarefa</label>
                 <select class="form-control input" name="fk_status_tarefa" required autofocus>
                  <option value="">Selecione o status</option>
                   <?php if(isset($listarStatus)):?>
                     <?php foreach ($listarStatus as $status):?>
                       <option <?php if($status->getIdStatusTarefa() === $tarefa->getFkStatusTarefa()){echo "selected";}?> value="<?php echo $status->getIdStatusTarefa();?>"><?php echo $status->getNomeStatusTarefa();?></option>
                     <?php endforeach;?>
                   <?php endif;?>
                 </select>
               </div>
        </div><br>
      <div class="modal-footer"> <br>
           <input type="submit" name="Atualizar" value="Atualizar" class="btn btn-success input">
      </div>
</div>
