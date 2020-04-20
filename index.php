<?php
    session_start();
    include_once('classes/class.projeti.php');
    include_once('classes/class.db.php');
    if(isset($_POST['botao']) && $_POST["botao"] == "Sair"){
      session_destroy();
      header('Location:login.php');
    }

    if(!isset($_SESSION['cpf']) || !isset($_SESSION['fk_usuario'])){
      echo "<script>location.href='login.php?msg=erro'</script>";
    } else {

    $id_projeti = Projeti::recuperaIdProjeti($_SESSION['fk_pessoa']);
    print_r($id_projeti);
    if($id_projeti){
      echo "tem projeti";
    }else{
      echo "Você precisa ser cadastrado em algum projeti";
    }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISP - Conteudo Dinamico</title>
  <link rel="stylesheet" type="text/css" href="publico/css/import.css">
  <link rel="shortcut icon" href="publico/img/logos.png">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
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
    <form class="form-inline ml-3" method="post" style="width: 100%; display: flex; justify-content: flex-end;" >
      <div class="input-group input-group-sm">
        <button class="btn btn-danger my-2 my-sm-0" name="botao" value="Sair"> <i class="fas fa-sign-out-alt">  </i> </button>
      </div>
    </form>

  </nav>

  <aside class="main-sidebar elevation-4 sidebar-light-info">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link navbar-orange">
      <img src="publico/img/logobranca.png" alt="SISP Logo" class="brand-image"
           style="opacity: ">
      <span class="brand-text font-weight-light text-white"><?php echo $_SESSION['nome_grupo'];?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="publico/img/user.png" class="img-circle elevation-2" alt="User Image">&emsp;<?php echo $_SESSION['nome_pessoa'];?>
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
                Home Administrador
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
                  <p>Acadêmico</p>
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
              <li class="nav-item">
                <a href="?modulo=administrador&acao=adicionar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Administrador</p>
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
                  <p> Lista de Cursos</p>
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
                  <p>Lista de Turmas</p>
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
                 <a href="?index.php" class="nav-link active">
                 <i class="nav-icon fas fa-tachometer-alt"></i>
                 <p>
                   Home Aluno
                 </p>
               </a>
               </li>
               <!-- <li class="nav-item has-treeview">
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
                 </li> -->
                 <li class="nav-item">
                   <a href="?modulo=tarefa&acao=home" class="nav-link">
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
                 <li class="nav-item">
                   <a href="?modulo=graficos&acao=graficos" class="nav-link">
                     <i class="fas fa-chart-bar nav-icon"></i>
                     <p>Gráficos de Atividade</p>
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

        if(isset($_GET["parametro"])){
          $parametro = $_GET["parametro"];
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
<html>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- AdminLTE App -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="publico/js/adminlte.js"></script>
<script type="text/javascript" src="publico/js/anexos.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="publico/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="publico/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="publico/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="publico/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="publico/plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- jQuery Knob Chart -->
<script src="publico/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="publico/plugins/moment/moment.min.js"></script>
<script src="publico/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="publico/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="publico/plugins/summernote/summernote-bs4.min.js"></script>
<!-- PELO CDN -->
  <!-- Tell the browser to be responsive to screen width -->
  <!-- Font Awesome -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script src="publico/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script>

      function editar(id, txt_tarefa) {

        //criar um form de edição
        let form = document.createElement('form')
        form.action = 'index.php?modulo=tarefa&acao=tarefa_atualizar'
        form.method = 'post'
        form.className = 'row'

        //criar um input para entrada do texto
        let inputTarefa = document.createElement('input')
        inputTarefa.type = 'text'
        inputTarefa.name = 'tarefa'
        inputTarefa.className = 'col-9 form-control'
        inputTarefa.value = txt_tarefa

        //criar um input hidden para guardar o id da tarefa
        let inputId = document.createElement('input')
        inputId.type = 'hidden'
        inputId.name = 'id'
        inputId.value = id

        //criar um button para envio do form
        let button = document.createElement('button')
        button.type = 'submit'
        button.className = 'col-3 btn btn-info'
        button.innerHTML = 'Atualizar'

        //incluir inputTarefa no form
        form.appendChild(inputTarefa)

        //incluir inputId no form
        form.appendChild(inputId)

        //incluir button no form
        form.appendChild(button)

        //teste
        //console.log(form)

        //selecionar a div tarefa
        let tarefa = document.getElementById('tarefa_'+id)

        //limpar o texto da tarefa para inclusão do form
        tarefa.innerHTML = ''

        //incluir form na página
        tarefa.insertBefore(form, tarefa[0])

      }

      function remover(id) {
        location.href = 'todas_tarefas.php?acao=remover&id='+id;
      }

      function marcarRealizada(id) {
        location.href = 'todas_tarefas.php?acao=marcarRealizada&id='+id;
      }
    </script>
</html>
</body>
</html>
<?php } ?>
