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
<div class="container">
  <button type="button" class="btn btn btn-success"  data-toggle="modal" data-target="#exampleModal" data-whatever="Mensagem"><i class="far fa-plus-square"></i>   Nova Tarefa</button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nova Tarefa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nome:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Descrição:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>
  <br><br>
  <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item col s3">
        <a class="nav-link" href="#">A Fazer</a>
      </li>
      <li class="nav-item col s3">
        <a class="nav-link active" href="#">Fazendo</a>
      </li>
      <li class="nav-item col s3">
        <a class="nav-link" href="#">Feito</a>
      </li>
      <li class="nav-item col s3">
        <a class="nav-link" href="#">Revisão</a>
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
  <hr>
  <div class="card-body">
    <h5 class="card-title">Fazer Site</h5>
    <p class="card-text">Tarefa tem como objetivo produzir um site de informações sobre a fábrica e o sistema SISP. </p>
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalExemplo">
  Detalhes
</button>

<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Fazer Site</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Aqui vai ficar o conteúdo escrito do site
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
  </div>
  <hr>
</div>

</div>

