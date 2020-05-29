<?php
include_once('classes/class.db.php');
include_once('classes/class.pessoa.php');
include_once('classes/class.aluno.php');
include_once('classes/class.professor.php');
include_once('classes/class.coordenador.php');
include_once('classes/class.turma.php');
include_once('classes/class.curso.php');
include_once('classes/class.exercicio.php');
include_once('classes/class.etapa.php');
include_once('classes/class.grupo.php');
include_once('classes/class.tarefa.php');


try{
  $totalPessoas = Pessoa::contarPessoas();
  $totalAlunos = Aluno::contarAlunos();
  $totalProfessores = Professor::contarProfessores();
  $totalCoordenadores = Coordenador::contarCoordenadores();
  $totalTurmas = Turma::contarTurmas();
  $totalTarefasFazer = Tarefa::contarTarefasFazer();
  $totalTarefas = Tarefa::contarTotalTarefas();
  $totalTarefasFazendo = Tarefa::contarTarefasFazendo();
  $totalTarefasRevisao = Tarefa::contarTarefasRevisao();
  $totalTarefasFeito = Tarefa::contarTarefasFeito();
  $totalCursos = Curso::contarCursos();
  $totalExercicios = Exercicio::contarExercicio();
  $totalEtapas = Etapa::contarEtapas();
  $totalGrupos = Grupo::contarGrupos();
  //$totalTarefas = Tarefa::contarTarefas();
}catch(PDOException $e) {
  echo "ERROR".$e->getMessage();
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <title>Gráficos</title>
   <script src="https://www.gstatic.com/charts/loader.js"></script>
  </head>
  <body>
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gráficos de Desempenho</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Gráficos de Desempenho</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <!-- DIV RESPONSÁVEL POR EXIBIR OS GRÁFICOS -->
             <?php include 'primeiroGrafico.php' ?>
          </div>
          <div class="col-md-4">
            <!-- DIV RESPONSÁVEL POR EXIBIR OS GRÁFICOS -->
             <?php include 'segundoGrafico.php' ?>
          </div>
        </div>
        <hr>
        <div class="row">
            <?php 
              //-----SE QUISER QUER O SEGUNDO GRAFICO VENHA PRA BAIXO-----
              //-----APAGAR DA DIV EM CIMA OU COMENTAR E ATIVAR ESSA-----
            
              //php include 'segundoGrafico.php'
             ?>
        </div>
      </div>
    </section>
  </body>
</html>