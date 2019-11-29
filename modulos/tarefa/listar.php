<?php include_once 'Classes/Tarefa.php';?>
<?php
try {
    $tarefas = Tarefa::listar();
} catch (PDOException $e) {
    echo "Error".$e->getMessage();
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Tarefas
  </h1>
    <small></small>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <?php if(isset($tarefas)):?>
    <?php foreach ($tarefas as $tarefa):?>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box" style="border:1px solid orange;border-radius:10px;box-shadow:4px 4px 6px #ccc;color:orange;">
        <div class="inner">
          <p style="font-size:22px;"><h2 style="font-size:26px;">Tipo Tarefa</h2><?= $tarefa->getTipoTarefa();?></p>
          <p style="font-size:22px;"><h2 style="font-size:26px;">Assunto</h2><?= $tarefa->getAssunto();?></p>
          <p style="font-size:22px;"><h2 style="font-size:26px;">Data Realização:</h2><?= $tarefa->getDataRealizacao();?></p>
          <p style="font-size:22px;"><h2 style="font-size:26px;">Horario Realização:</h2><?= $tarefa->getHorarioRealizacao();?></p>
          <p style="font-size:22px;"><h2 style="sont-size:26px;">Responsavel</h2><?= $tarefa->getResponsavel();?><p>
        </div>

        <a href="#" class="small-box-footer" style="margin:0px;background-color:#F5770A;border:1px solid #F5770A;border-radius:10px;">Detalhes <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <?php endforeach;?>
    <?php endif;?>
  </div>
</section>
