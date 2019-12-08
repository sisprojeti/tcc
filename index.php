<?php
    session_start();
    if(!isset($_SESSION['cpf']) || !isset($_SESSION['fk_usuario'])){
      echo "<script>location.href='login.php?msg=erro'</script>";
    }

    if(isset($_POST['botao']) && $_POST["botao"] == "Sair"){
      session_destroy();
      header('Location:login.php');
    }
    print_r($_SESSION);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISP - Conteudo Dinamico</title>
  <link rel="shortcut icon" href="img/logos.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="pluginOs/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS customizados para essa página de CADASTRO -->
  <link rel="stylesheet" type="text/css" href="css/anexos.css">
  <!-- Logo do Sistema -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"> </script>
    <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/formularios.css">
</head>
<!--<body class="hold-transition sidebar-mini layout-fixed"> -->
<body class="sidebar-mini skin-yellow-light" style="height: auto; min-height: 100%;">
<div class="wrapper">


  <nav class="main-header navbar navbar-expand navbar-light navbar-orange">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <form class="form-inline ml-3" method="post" style="width: 100%; display: flex; justify-content: space-between;" >
      <div class="input-group input-group-sm">
        <input style="width: 300px;"class="form-control form-control-navbar" type="search" placeholder="Pesquisar" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
      <div class="input-group input-group-sm">
        <input style="width: 100px; border: 1px solid #F4A460;" class="btn btn-danger my-2 my-sm-0" type="submit" name="botao" value="Sair">
      </div>
    </form>
  </nav>

  <aside class="main-sidebar elevation-4 sidebar-light-info">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link navbar-orange">
      <img src="img/logobranca.png" alt="SISP Logo" class="brand-image"
           style="opacity: ">
      <span class="brand-text font-weight-light text-white">Conteúdo Dinâmico</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<!----------------------------------------------------------------------------
---------- MENU DO COORDENADOR
---------------------------------------------------------------------------->
<?php
    if(
        $_SESSION['nome_grupo'] === 'administrador'
      ){?>
          <li class="nav-item has-treeview menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home Coordenador
              </p>
            </a>
          </li>
<!----------------------------------------------------------------------------
---------- CADASTROS DE PESSOAS
---------------------------------------------------------------------------->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Cadastros
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?modulo=aluno&acao=adicionar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Acadêmicos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?modulo=professor&acao=adicionar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Professor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?modulo=coordenador&acao=adicionar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Coordenador</p>
                </a>
              </li>
            </ul>
          </li>
<!----------------------------------------------------------------------------
---------- CURSOS
---------------------------------------------------------------------------->
<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Cursos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?modulo=curso&acao=listar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Curso</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?modulo=exercicio&acao=listar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Exercicio</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?modulo=etapa&acao=listar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Etapa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?modulo=vinculoCoordenador&acao=adicionar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vicular Coordenador</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?modulo=criterio&acao=adicionar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Critérios Avaliativos</p>
                </a>
              </li>
            </ul>
          </li>
<!----------------------------------------------------------------------------
---------- RELATORIOS
---------------------------------------------------------------------------->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Relatórios
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?modulo=professor&acao=listar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Professores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?modulo=aluno&acao=listar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alunos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?modulo=coordenador&acao=listar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Coordenador</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?modulo=anexos&acao=ver" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Anexos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?modulo=criteriosAvaliativos&acao=ver" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Critérios Avaliativos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Turmas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
<!----------------------------------------------------------------------------
---------- TURMAS
---------------------------------------------------------------------------->
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?modulo=turma&acao=listar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Turma</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?modulo=vinculoProfessor&acao=adicionar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vincular Professor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?modulo=vinculoAluno&acao=adicionar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vicular Aluno a Turma</p>
                </a>
              </li>
            </ul>
          <?php }else{?>
            <li class="nav-item has-treeview menu-open">
               <ul class="nav nav-treeview">
                <li class="nav-item has-treeview menu-open">
                 <a href="ambienteAluno.php" class="nav-link active">
                 <i class="nav-icon fas fa-tachometer-alt"></i>
                 <p>
                   Home Aluno
                 </p>
               </a>
               </li>
               <li class="nav-item has-treeview">
                 <a href="#" class="nav-link">
                   <i class="nav-icon fas fa-edit"></i>
                   <p>
                     Cadastros
                     <i class="fas fa-angle-left right"></i>
                   </p>
                 </a>
                 <ul class="nav nav-treeview">
                   <li class="nav-item">
                     <a href="?modulo=tarefa&acao=adicionar" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                       <p>Tarefas</p>
                     </a>
                   </li>
                 </ul>
                 </li>
                 <li class="nav-item">
                   <a href="?modulo=tarefa&acao=listar" class="nav-link">
                     <i class="fas fa-tasks nav-icon"></i>
                     <p>Lista de Tarefas</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="?modulo=anexos&acao=adicionar" class="nav-link">
                     <i class="fas fa-file-upload nav-icon"></i>
                     <p>Documentação</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="Modelo_Documentacao.php" class="nav-link">
                     <i class="fas fa-file-alt nav-icon"></i>
                     <p>Modelo de Doc</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="Visualizar_Notas.php" class="nav-link">
                     <i class="fas fa-clipboard nav-icon"></i>
                     <p>Visualizar Notas</p>
                   </a>
                 </li>
               </ul> </li>
             <li class="nav-item has-treeview">
               <a href="#" class="nav-link">
                 <i class="fas fa-users nav-icon"> </i>
                 <p>
                    Área de Grupos
                   <i class="right fas fa-angle-left"></i>
                 </p>
               </a>
               <ul class="nav nav-treeview">
                 <li class="nav-item">
                   <a href="?modulo=grupo&acao=adicionar" class="nav-link">
                     <i class="fas fa-users-cog nav-icon"></i>
                     <p>Montar Grupo<span class="right badge badge-danger">New</span></p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="#" class="nav-link">
                     <i class="far fa-edit nav-icon"></i>
                     <p>Visualizar Grupo<span class="right badge badge-primary">Edit</span></p>
                   </a>
                 </li>
               </ul>
          </li>
          <?php };?>
            <!-- Inicio ambiente aluno-->
         <!-- <li class="nav-item has-treeview menu-open">
            <ul class="nav nav-treeview">
             <li class="nav-item has-treeview menu-open">
              <a href="modulo=home&acao=verAluno.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home Aluno
              </p>
            </a>
          </li>
              <li class="nav-item">
                <a href="Lista_Tarefas.php" class="nav-link">
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Lista de Tarefas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?modulo=anexos&acao=adicionar" class="nav-link">
                  <i class="fas fa-file-upload nav-icon"></i>
                  <p>Documentação</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Modelo_Documentacao.php" class="nav-link">
                  <i class="fas fa-file-alt nav-icon"></i>
                  <p>Modelo de Doc</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Visualizar_Notas.php" class="nav-link">
                  <i class="fas fa-clipboard nav-icon"></i>
                  <p>Visualizar Notas</p>
                </a>
              </li>
            </ul> </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-users nav-icon"> </i>
              <p>
                 Área de Grupos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?modulo=grupo&acao=adicionar" class="nav-link">
                  <i class="fas fa-users-cog nav-icon"></i>
                  <p>Montar Grupo<span class="right badge badge-danger">New</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-edit nav-icon"></i>
                  <p>Visualizar Grupo<span class="right badge badge-primary">Edit</span></p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
        </ul> -->
          <!-- final ambiente aluno-->
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper navbar-white">
    <?php
        if(isset($_GET["modulo"])){
          $modulo = $_GET["modulo"];
        }else{
          $modulo = false;
        }

        if(isset($_GET["acao"])){
          $acao = $_GET["acao"];
        }else{
          $acao = "listar";
        }

        if($modulo){
          if(file_exists("modulos/".$modulo."/".$acao.".php")){
            include("modulos/".$modulo."/".$acao.".php");
          }
          }else{
              include("modulos/home/verCoordenador.php");
          }
    ?>
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      SISP
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="https://solutiondevempresa.wixsite.com/corp">SolutionDev</a>.</strong> Todos os Direitos Reservados.
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/anexos.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script><!-- PELO CDN -->

</body>
</html>
