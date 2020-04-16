<?php
  require_once('classes/class.tarefa.php');
  require_once('classes/class.db.php');
  require_once('classes/class.refAlunoProjeti.php');
  $tarefaTeste = new Tarefa();

  try{
    $listarStatus = Tarefa::listarStatusTarefa();
  } catch (PDOException $e) {
      echo "ERROR".$e->getMessage();
  }
  try{
      $listarAlunosProjeti = RefAlunoProjeti::listarAlunosProjeti();
  } catch(PDOException $e){
    echo "ERROR".$e->getMessage();
  }

 try{
      $listarTarefas = Tarefa::listar();
  }catch(PDOException $e){
    echo "ERROR".$e->getMessage();
  }

/*// if(isset($_POST["button"]) && ($_POST["button"] === "Detalhes")){
//   try {
//       $tarefas = Tarefa::listarAlunosTarefa();
//       foreach ($tarefas as $tarefa) {
//         print_r($tarefa);
//       }
//   } catch (Exception $e) {
//     echo "ERROR:".$e->getMessage();
//    }
// }

  if(isset($_POST["button"]) && ($_POST["button"] === "Salvar")){
    try{
      $data_cadastro = date("Y-m-d");
      $tarefa = new Tarefa();
      $tarefa->setTitulo($_POST['titulo']);
      $tarefa->setDataInicio($_POST['data_inicio']);
      $tarefa->setDataFim($_POST['data_fim']);
      $tarefa->setDataConclusao($_POST['data_conclusao']);
      $tarefa->setDescricao($_POST['descricao']);
      $tarefa->setDataCadastro($data_cadastro);
      $tarefa->setFkStatusTarefa($_POST['fk_status_tarefa']);
      $tarefa->setFkRefAlunoProjeti($_POST['fk_ref_aluno_projeti']);
      $tarefa->adicionar();
      // if(isset($_POST['status_finalizada'])){ essa lógica de status vai ser util
      //   $turma->setStatusFinalizada(true);
      //  }else{
      //   $turma->setStatusFinalizada(false);
      //  }

    }catch(PDOException $e){
      echo "ERROR".$e->getMessage();
    }
  }
*/?>
<nav class="navbar navbar-light navbar-white">
  <div class="container">
    <a class="navbar-brand" href="#">
      <!-- <img src="img/logo.png" width="150" height="100" class="d-inline-block align-center" alt=""> -->
       <h2>Lista de Tarefas</h2>
    </a>
  </div>
</nav>
<div class="container">
  <!------------------------------------------------------------
#INICIO BOTÃO DE NOVA TAREFA
--------------------------------------------------------------------------------------------------->
   <button style="float: right;" id="nova_tarefa" type="button" class="btn btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="far fa-plus-square"></i>   Nova Tarefa</button>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <!------------------------------------------------------------
#MODAL BOTÃO DE NOVA TAREFA
--------------------------------------------------------------------------------------------------->
<?php 
  include "adicionar.php";
?>

 <!------------------------------------------------------------
# FIM MODAL BOTÃO DE NOVA TAREFA
--------------------------------------------------------------------------------------------------->
 <!------------------------------------------------------------
# MENU DE TAREFAS
--------------------------------------------------------------------------------------------------->
  <br><br>
  <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs">
      <li class="nav-item col s3">
        <div>
          <a class="nav-link active" href="#">A Fazer</a>
        </div>
      </li>
      <li class="nav-item col s3">
        <div>
          <a class="nav-link" href="#">Fazendo</a>
        </div>
      </li>
      <li class="nav-item col s3">
        <div>
        <a class="nav-link" href="#">Revisão</a>
      </div>
      </li>
      <li class="nav-item col s3">
        <div>
          <a class="nav-link" href="#">Feito</a>
        </div>
      </li>
    </ul>
  </div>

 <!------------------------------------------------------------
# FIM MENU DE TAREFAS
--------------------------------------------------------------------------------------------------->
  <script type="text/javascript">
      $(document).ready(function(){
        $(".botao-detalhe").click(function(){
            var id_tarefa = $(this).attr("id");
            $("#conteudo_tarefa").load('modulos/tarefa/ajax/carrega_conteudo.php?id='+id_tarefa);
            $("#modal_detalhe").fadeIn();
        });
        $(".fechar-detalhe").click(function(){
            $("#modal_detalhe").fadeOut();
        });
      });
  </script>

  <div class="card-body">

   <!------------------------------------------------------------
# LISTAR TAREFAS
--------------------------------------------------------------------------------------------------->
    <?php if(isset($listarTarefas)){?>
      <?php foreach ($listarTarefas as $tarefa){?>
      <div class="card">
          <div class="card-body">
            <div class="container">
          <div class="row">
            <div class="col-sm" >
              Titulo: <?= $tarefa->getTituloTarefa();?>
            </div>
            <div class="col-sm">
              Detalhes:
            <?= $tarefa->getDescricao();?>
            </div>
            <div class="col-sm">
              Responsável:
            <?= $tarefa->getNomeResponsavelTarefa();?>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm">
              Data de Início:
              <?= $tarefa->getDataCadastro();?>
            </div>
            <div class="col-sm">
              Data de Conclusão:
              <?= $tarefa->getDataConclusao();?>
            </div>
            <div class="col-sm">
              <a href="#" class="btn btn-primary botao-detalhe" id="<?php echo $tarefa->getIdTarefa()?>">Detalhes </a> &nbsp;
              <a href="#" class="btn btn-danger my-2 my-sm-0"> <i class="fas fa-trash-alt"> </i> </a>
            </div>
          </div>
        </div>
          </div>
      </div>
      <?php }?>
    <?php }?>

<!------------------------------------------------------------
# MODAL DETALHES
--------------------------------------------------------------------------------------------------->
<div class="modal" style="display:none;" id="modal_detalhe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="text-align: left">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalhes da tarefa</h5>
        <button type="button" class="close fechar-detalhe" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<!------------------------------------------------------------
# ARRAY PARA RETORNAR
--------------------------------------------------------------------------------------------------->
      <div class="container col-lg-12 navbar-white">
         <section class="content navbar-light navbar-white">

           <div class="container-fluid navbar-white" id="conteudo_tarefa">

           </div><!-- /.container-fluid -->
         </section>
       </div>
<!-------------- FIM ARRAY----------------------------------------------
# INICIO DO FORMULARIO DE EDIÇÃO
--------------------------------------------------------------------------------------------------->

<!------------------------------------------------------------
# FIM DO FORMULARIO DE EDIÇÃO
--------------------------------------------------------------------------------------------------->
      <div class="modal-footer">
        <input type="submit" name="button" value="Salvar" class="btn btn-primary" >
      </div>
    </div>
  </div>
</div>

  </div>

</div>

</div>
