<?php
include_once('classes/class.pessoa.php');
include_once('classes/class.aluno.php');
include_once('classes/class.professor.php');
include_once('classes/class.coordenador.php');
include_once('classes/class.turma.php');
include_once('classes/class.curso.php');
include_once('modulos/tarefa/tarefa.model.php');


try{
  $totalPessoas = Pessoa::contarPessoas();
  $totalAlunos = Aluno::contarAlunos();
  $totalProfessores = Professor::contarProfessores();
  $totalCoordenadores = Coordenador::contarCoordenadores();
  $totalTurmas = Turma::contarTurmas();
  $totalTarefas = Tarefa::contarTarefas();
  $totalCursos = Curso::contarCursos();
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
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>10</h3>

            <p><h4>Grupos Registrados</h4></p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">Relatorios <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
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
          <a href="#" class="small-box-footer"> <span style="color:white;"> More info   <i class="fas fa-arrow-circle-right"></i></span></a>
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
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div> -->
      <!-- ./col -->
    <?php }else if($_SESSION['nome_grupo'] === 'aluno'){ ?>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><i class="fas fa-tasks"></i></h3>

            <p>Lista de Tarefas</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="?modulo=tarefa&acao=home" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-secondary">
          <div class="inner">
          <h4><?php echo $totalTarefas;?></h4>
            <p><h4>Tarefas Cadastradas</h4></p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="?modulo=tarefa&acao=home" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
          <h4><?php echo $totalTarefas;?></h4>
            <p><h4>Tarefas Feitas</h4></p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="?modulo=tarefa&acao=home" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><i class="fas fa-file-upload"></i></h3>

            <p>Documentação</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="Documentação.php" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><i class="far fa-file-alt"></i></h3>

            <p>Modelo de Doc</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="Modelo de Documentação.php" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3 ><i class="fas fa-clipboard"></i></h3>

            <p>Visualizar Notas</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="Visualizar Notas.php" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3 ><i class="fas fa-clipboard"></i></h3>

            <p>Grupo de Projeti</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="Visualizar Notas.php" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    <?php };?>
    </div>

    <!-- /.row -->
    <!-- Main row -->


    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
