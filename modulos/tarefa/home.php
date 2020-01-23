<?php
  require_once('tarefa.model.php');
  require_once('conexao.php');
  require_once('tarefa.service.php');
  $action = 'recuperar';
  // require_once 'tarefa_controller.php';
  $tarefa = new Tarefa();
  $conexao = new Conexao();

  $tarefaService = new TarefaService($conexao, $tarefa);
  $tarefas = $tarefaService->recuperar();
  //
  // echo "<pre>";
  // print_r($tarefas);
  // echo "</pre>";


?>
<nav class="navbar navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">
      <!-- <img src="img/logo.png" width="150" height="100" class="d-inline-block align-center" alt=""> -->
       <h1>Lista de Tarefas</h1>
    </a>
  </div>
</nav>
<br>
<div class="container app">
  <div class="row">
    <div class="col-md-3 menu">
      <ul class="list-group">
        <li class="list-group-item active"><a style="color:#fff;font-size:20px;" href="?modulo=tarefa&acao=home">Tarefas pendentes</a></li>
        <li class="list-group-item"><a href="?modulo=tarefa&acao=nova_tarefa">Nova tarefa</a></li>
        <li class="list-group-item"><a href="?modulo=tarefa&acao=todas_tarefas">Todas tarefas</a></li>
      </ul>
    </div>

    <div class="col-md-9">
      <div class="container pagina">
        <div class="row">
          <div class="col">
            <h4>Tarefas pendentes</h4>
            <hr />

            <? foreach($tarefas as $indice => $tarefa) { ?>
              <div class="row mb-3 d-flex align-items-center tarefa">
                <div class="col-sm-9" id="tarefa_<?= $tarefa->id ?>">
                  <?= $tarefa->tarefa ?> (<?= $tarefa->status ?>)
                </div>
                <div class="col-sm-3 mt-2 d-flex justify-content-between">
                  <i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $tarefa->id ?>)"></i>

                  <? if($tarefa->status == 'pendente') { ?>
                    <i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $tarefa->id ?>, '<?= $tarefa->tarefa ?>')"></i>
                    <i class="fas fa-check-square fa-lg text-success" onclick="marcarRealizada(<?= $tarefa->id ?>)"></i>
                  <? } ?>
                </div>
              </div>

            <? } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
