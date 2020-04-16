<?php
require_once('../../../classes/class.tarefa.php');
require_once('../../../classes/class.db.php');
require_once('../../../classes/class.refAlunoProjeti.php');
  //echo $_GET['id'];
  try{
      $listarAlunosProjeti = RefAlunoProjeti::listarAlunosProjeti();
  } catch(PDOException $e){
    echo "ERROR".$e->getMessage();
  }

  try {
    $listarStatus = Tarefa::listarStatusTarefa();
  } catch (PDOException $e) {
    echo "ERRO".$e->getMessage();
  }

  $tarefa = new Tarefa($_GET['id']);
  print_r($tarefa);
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
        <div class="row">
        <div class="col-sm-12">
          <label>Responsável</label>
          <select class="form-control" name="fk_ref_aluno_projeti" required autofocus>
           <option value="<?= $tarefa->getNomeResponsavelTarefa();?>">Selecione o Responsável</option>
            <?php if(isset($listarAlunosProjeti)):?>
              <?php foreach ($listarAlunosProjeti as $alunosProjeti):?>
                <option <?php if($alunosProjeti->getIdFKRefAlunoProjeti() === $tarefa->getFkRefAlunoProjeti()){echo "selected";}?> value="<?php echo $alunosProjeti->getIdRefAlunoProjeti();?>"><?php echo $alunosProjeti->getNomeAlunoProjeti();?></option>
              <?php endforeach;?>
            <?php endif;?>
          </select>
        </div>
        </div>
</div>
