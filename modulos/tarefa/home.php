<?php
  //print_r($_REQUEST);
  require_once('classes/class.tarefa.php');
  require_once('classes/class.db.php');
  require_once('classes/class.refAlunoProjeti.php');
  include_once('classes/class.projeti.php');



  $id_projeti_aluno = Projeti::recuperaIdProjeti($_SESSION['fk_pessoa']);

  try{
    $listarStatus = Tarefa::listarStatusTarefa();
  } catch (PDOException $e) {
      echo "ERROR".$e->getMessage();
  }
  try{
      $listarAlunosProjeti = RefAlunoProjeti::listarAlunosProjetiTeste($id_projeti_aluno->getIdProjeti());
  } catch(PDOException $e){
    echo "ERROR".$e->getMessage();
  }
  try{
      if(isset($_GET['status'])){
        $status = $_GET['status'];
      }else{
        $status = 1;
      }

      $listarTarefas = Tarefa::listar($status);

  }catch(PDOException $e){
    echo "ERROR".$e->getMessage();
  }

  //$tarefaTeste = new Tarefa();

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
<div class="modal-dialog modal-lg" id="modal_formulario">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Tarefa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="modulos/tarefa/action_tarefa.php" id="tarefa" method="post">
          <div class="form-group">
            <label class="col-form-label">Título:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
          </div>
          <div class="form-group">
            <label class="col-form-label">Descrição:</label>
            <textarea class="form-control"  id="descricao" name="descricao" required></textarea>
          </div>
           <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Data de Início:</label>
                        <input type="date" class="form-control" id="data_inicio" name="data_inicio" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Data de Entrega:</label>
                        <input type="date" class="form-control" id="data_entrega" name="data_entrega" required>
                      </div>
                    </div>
            </div>
            <div class="row">
              <div class="col-sm-6" >
                      <div class="form-group">
                        <label>Data de Término:</label>
                        <input type="date" class="form-control" id="data_fim"  name="data_fim" required>
                      </div>
                    </div>
                     <!-- select -->

                     <div class="col-sm-6">
                       <label>Status Tarefa</label>
                       <select class="form-control" id="fk_status_tarefa"  name="fk_status_tarefa" required autofocus>
                        <option value="">Selecione o status</option>
                         <?php if(isset($listarStatus)):?>
                           <?php foreach ($listarStatus as $status):?>
                             <?php //if($aluno->getSituacaoAluno()):?>
                             <option value="<?php echo $status->getIdStatusTarefa();?>"><?php echo $status->getNomeStatusTarefa();?></option>
                           <?php endforeach;?>
                         <?php endif;?>
                       </select>
                     </div>
              </div>
              <div class="col-sm-6">
                <label>Responsável</label>
                <select class="form-control" id="fk_aluno" name="fk_aluno" required autofocus>
                 <option value="">Selecione o Responsável</option>
                  <?php if(isset($listarAlunosProjeti)):?>
                    <?php foreach ($listarAlunosProjeti as $alunosProjeti):?>
                      <?php //if($aluno->getSituacaoAluno()):?>
                      <option value="<?php echo $alunosProjeti->getIdAluno();?>"><?php echo $alunosProjeti->getNomeAluno();?></option>
                    <?php endforeach;?>
                  <?php endif;?>
                </select>
              </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="action" id="action" value="Adicionar" class="btn btn-primary" >
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
      </form>
    </div>
  </div>
</div>

 <!------------------------------------------------------------
# MENU DE TAREFAS
--------------------------------------------------------------------------------------------------->
  <br><br>
  <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs">
      <li class="nav-item col s3">
        <div>
          <a class="nav-link <?php if($_GET['status'] == 1){echo "active";}else{echo "";}?>"  href="?modulo=tarefa&acao=home&status=1">A Fazer</a>
        </div>
      </li>
      <li class="nav-item col s3">
        <div>
          <a class="nav-link <?php if($_GET['status'] == 2){echo "active";}else{echo "";}?>" href="?modulo=tarefa&acao=home&status=2">Fazendo</a>
        </div>
      </li>
      <li class="nav-item col s3">
        <div>
        <a class="nav-link <?php if($_GET['status'] == 3){echo "active";}else{echo "";}?>" href="?modulo=tarefa&acao=home&status=3">Revisão</a>
      </div>
      </li>
      <li class="nav-item col s3">
        <div>
          <a class="nav-link <?php if($_GET['status'] == 4){echo "active";}else{echo "";}?>" href="?modulo=tarefa&acao=home&status=4">Feito</a>
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
            //qalert(id_tarefa);
            $("#conteudo_tarefa").load('modulos/tarefa/ajax/carrega_conteudo.php?id='+id_tarefa);
            $("#modal_detalhe").show();
        });
        $(".fechar-detalhe").click(function(){
            $("#modal_detalhe").hide();
        });
      });
  </script>

  <div class="card-body" >

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
              <a href="#" class="btn btn-primary botao-detalhe" id="<?php echo $tarefa->getIdTarefa();?>">Detalhes </a> &nbsp;
              <a href="index.php?modulo=tarefa&acao=excluir&id_tarefa=<?= $tarefa->getIdTarefa()?>" class="btn btn-danger my-2 my-sm-0" id="<?php echo $tarefa->getIdTarefa();?>"> <i class="fas fa-trash-alt"> </i> </a>
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
      
    </div>
  </div>
</div>
  </div>
</div>
</div>
<script>
$(document).ready(function(){
  fetchUser();
    function fetchUser(){
    var action = "Load";
    $.ajax({
      url : "modulos/tarefa/action_tarefa.php",
      method:"POST",
      data:{action:action},
        success:function(data){
        $('#listar').html(data);
        }
      });
    }
/*---------------------------------------------------------
 # RESET DO FORMULARIO
------------------------------------------------------------------------------*/

  $('#nova_tarefa').click(function(){
    $('#modal_formulario').modal('show');
    $('#titulo').val('');
    $('#descricao').val('');
    $('#data_inicio').val('');
    $('#data_entrega').val('');
    $('#data_fim').val('');
    $('#fk_status_tarefa').val('');
    $('#fk_aluno').val('');
    $('.modal-title').text("Adicionar Tarefa");
    $('#action').val('Adicionar');

  });

/*---------------------------------------------------------
 # EXLUIR DADOS
------------------------------------------------------------------------------
 $(document).on('click', '.excluir', function(){
  var id = $(this).attr("id");
  if(confirm("Tem certeza que deseja excluir o cadastro?")){
    var action = "Excluir";
    $.ajax({
    url:"modulos/tarefa/action_tarefa.php",
    method:"POST",
    data:{id:id, action:action},
      success:function(data){
        fetchUser();
        alert(data);
      }
    })
  }
  else
  {
   return false;
  }
 }); */

/*---------------------------------------------------------
 # EDITAR DADOS
------------------------------------------------------------------------------

  $('#action').click(function(){
    var nome = $('#nome').val();
    var idade = $('#idade').val();
    var telefone = $('#telefone').val();
    var id = $('#id').val();
    var action = $('#action').val();

    if(nome != '' && idade != ''&& telefone != ''){
      $.ajax({
      url : "modulos/tarefa/action_tarefa.php",
      method:"POST",
      data:{nome:nome, idade:idade, telefone:telefone, id:id, action:action},
        success:function(data){
          alert(data);
          $('#modal_formulario').modal('hide');
          fetchUser();
        }
      });
    }else{
      alert("PREENCHA TUDO DESGRAÇA! ");
    }
  });

  $(document).on('click', '.editar', function(){
  var id = $(this).attr("id");
  var action = "Select";
    $.ajax({
    url:"modulos/tarefa/action_tarefa.php",
    method:"POST",
    data:{id:id, action:action},
    dataType:"json",
      success:function(data){
        $('#modal_formulario').modal('show');
        $('.modal-title').text("Atualizar Dados");
        $('#action').val("Editar");
        $('#id').val(id);
        $('#nome').val(data.nome);
        $('#idade').val(data.idade);
        $('#telefone').val(data.telefone);
   }
  });
 }); */
});
</script>
