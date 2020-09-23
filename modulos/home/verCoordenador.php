<?php
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
include_once('classes/class.projeti.php');
include_once('classes/class.refAlunoProjeti.php');


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
  $totalProjetis = Projeti::contarProjeti();
  //$totalTarefas = Tarefa::contarTarefas();
}catch(PDOException $e) {
  echo "ERROR".$e->getMessage();
}

?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">SISP - Conteúdo Dinâmico</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">SISP - Conteúdo Dinâmico</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <?php
          if(
              $_SESSION['nome_grupo'] === 'administrador'
            ){?>
      <!-- ./col -->
      <!-- <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>20</h3>

            <p><h4>Tarefas Cadastradas</h4></p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div> -->
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3 style="color:white;"><?= $totalPessoas;?></h3>
            <p><h4 style="color:white;">Usuários Registrados</h4></p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <span class="small-box-footer" style="color:white;"> Total  </span>
        </div>
      </div>
      <!-- ./col -->
      <!-- <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">
          <div class="inner">
            <h3>65</h3>

            <p><h4>Visitas no Site</h4></p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div> -->

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3><?= $totalAlunos ;?></h3>
            <p><h4>Acadêmicos</h4></p>
          </div>
          <div class="icon">
            <i class="icon ion-ios-person"></i>
          </div>
          <a href="?modulo=aluno&acao=listar" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?= $totalProfessores;?></h3>
            <p><h4>Professores</h4></p>
          </div>
          <div class="icon">
           <i class="icon ion-ios-person-outline"></i>
          </div>
          <a href="?modulo=professor&acao=listar" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
          <h3>  <?= $totalCoordenadores;?></h3>
            <p><h4>Coordenadores</h4></p>
          </div>
          <div class="icon">
            <i class="icon ion-ios-people"></i>
          </div>
          <a href="?modulo=coordenador&acao=listar" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
           <h3> <?= $totalTurmas;?></h3>
            <p><h4>Turmas</h4></p>
          </div>
          <div class="icon">
            <i class="icon ion-compose"></i>
          </div>
          <a href="?modulo=turma&acao=listar" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">
          <div class="inner">

            <p><h4>Coordenadores Vinculados a turma</h4></p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div> -->

      <div class="col-lg-3 col-6">
        <div class="small-box bg-green">
          <div class="inner">
                      <h3 style="color:white;"><?= $totalCursos;?></h3>
              <p><h4>Cursos</h4></p>
          </div>
          <div class="icon">
            <i class="icon ion-clipboard"></i>
          </div>
          <a href="?modulo=curso&acao=listar" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
          <div class="inner">
                      <h3 style="color:white;"><?= $totalExercicios;?></h3>
              <p><h4>Exercícios</h4></p>
          </div>
          <div class="icon">
            <i class="icon ion-checkmark-round"></i>
          </div>
          <a href="?modulo=exercicio&acao=listar" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
                      <h3 style="color:white;"><?= $totalEtapas;?></h3>
              <p><h4>Etapas</h4></p>
          </div>
          <div class="icon">
            <i class="icon ion-forward"></i>
          </div>
          <a href="?modulo=etapa&acao=listar" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
     
      <!-- ./col -->
    <?php }else if($_SESSION['nome_grupo'] === 'aluno'){ ?>
      <!--fazer verificação se o usuário faz parte de algum grupo se não fizer não mostrar o menu de tarefa-->
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><i class="fas fa-file-upload"></i></h3>
            <h4>Documentação</h4> 
          </div>
          <div class="icon">
            <i class="fas fa-file-signature"></i>
          </div>
          <a href="?modulo=anexos&acao=adicionar" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><i class="fas fa-bookmark"></i></h3>

            <h4>Modelo de Doc</h4>
          </div>
          <div class="icon">
            <i class="far fa-file-alt"></i>
          </div>
          <a href="?modulo=documentacao&acao=modelo_documentacao" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3 ><i class="fas fa-clipboard"></i></h3>

            <h4>Visualizar Notas</>
          </div>
          <div class="icon">
            <i class="fas fa-graduation-cap"></i>
          </div>
          <a href="?modulo=notas&acao=visualizar_notas" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-secondary">
          <div class="inner">
          <h4><?php echo $totalTarefas;?></h4>
            <p><h4>Total de Tarefas</h4></p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="?modulo=tarefa&acao=home" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
          <h4><?php echo $totalTarefasFazer;?></h4>
            <p><h4>A Fazer</h4></p>
          </div>
          <div class="icon">
            <i class="fas fa-exclamation-triangle"></i>
          </div>
          <a href="?modulo=tarefa&acao=home&status=1" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box" style="background:#ff851b; color: #fff;">
          <div class="inner">
          <h4><?php echo $totalTarefasFazendo;?></h4>
            <p><h4>Fazendo</h4></p>
          </div>
          <div class="icon">
            <i class="fas fa-running"></i>
          </div>
          <a href="?modulo=tarefa&acao=home&status=2" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box" style="background:#3c8dbc; color: #fff;">
          <div class="inner">
          <h4><?php echo $totalTarefasRevisao;?></h4>
            <p><h4>Revisão</h4></p>
          </div>
          <div class="icon">
            <i class="fas fa-search"></i>
          </div>
          <a href="?modulo=tarefa&acao=home&status=3" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
          <h4><?php echo $totalTarefasFeito;?></h4>
            <p><h4>Feitas</h4></p>
          </div>
          <div class="icon">
            <i class="fas fa-check"></i>
          </div>
          <a href="?modulo=tarefa&acao=home&status=4" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    <?php };?>
    </div>

    <!-- /.row -->
    <!-- Main row -->


    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
