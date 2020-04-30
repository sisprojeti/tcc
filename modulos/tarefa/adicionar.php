<?php
  require_once('classes/class.tarefa.php');
  require_once('classes/class.db.php');
  require_once('classes/class.refAlunoProjeti.php');
  include_once('classes/class.projeti.php');
  //include_once("classs/class.etapa.php");
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
      $listarTarefas = Tarefa::listar();
  }catch(PDOException $e){
    echo "ERROR".$e->getMessage();
  }
// if(isset($_POST["button"]) && ($_POST["button"] === "Detalhes")){
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
      $tarefa->setDataConclusao($_POST['data_fim']);
      $tarefa->setDescricao($_POST['descricao']);
      $tarefa->setDataCadastro($data_cadastro);
      $tarefa->setFkStatusTarefa($_POST['fk_status_tarefa']);
      $tarefa->setFkProjeti($id_projeti_aluno->getIdProjeti());
      $tarefa->setFkAluno($_POST['fk_aluno']);
      $tarefa->adicionar();
      //print_r($tarefa);
      // if(isset($_POST['status_finalizada'])){ essa lógica de status vai ser util
      //   $turma->setStatusFinalizada(true);
      //  }else{
      //   $turma->setStatusFinalizada(false);
      //  }

    }catch(PDOException $e){
      echo "ERROR".$e->getMessage();
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <style>
       .error{
             color:red
       }
</style>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
      <script>
        function ValidarDatas() {
              var data1 = $("#data_inicio").val();
              var data2 = $("#data_fim").val();
              
              var dataInicial = ConverteParaData(data1);
              var dataFinal   = ConverteParaData(data2);
              
              
              if (dataInicial > dataFinal) {
                  console.log("Data inválida!");
              }else{
                  console.log("Data válida!");
              }
          }

          function ConverteParaData(data){
            var dataArray = data.split('/');
            var novaData = new Date(dataArray[2], dataArray[1], dataArray[0]);
            
            return novaData;
          }
      </script>
</head>
<body>
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nova Tarefa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" id="tarefa" method="post">
          <div class="form-group">
            <label class="col-form-label">Título:</label>
            <input type="text" class="form-control" name="titulo" required>
          </div>
          <div class="form-group">
            <label class="col-form-label">Descrição:</label>
            <textarea class="form-control"  name="descricao" required></textarea>
          </div>
           <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Data de Ínicio:</label>
                        <input type="date" class="form-control" name="data_inicio" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Data de Término:</label>
                        <input type="date" class="form-control" name="data_fim" required>
                      </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                      <div class="form-group">
                        <label>Data de Entrega:</label>
                        <input type="date" class="form-control" name="data_entrega" required>
                      </div>
                    </div>
                     <!-- select -->

                     <div class="col-sm-6">
                       <label>Status Tarefa</label>
                       <select class="form-control" name="fk_status_tarefa" required autofocus>
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

                <select class="form-control" name="fk_aluno" required autofocus>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <input type="submit" name="button" value="Salvar" class="btn btn-primary" onclick="ValidarDatas()">
      </div>
      </form>
    </div>
  </div>
</div>
      <script>
            $("#tarefa").validate({
       rules : {
             titulo:{
                    required:true,
                    minlength:6,
             },
             descricao:{
                    required:true,
                    minlength:6,
             },
              data_inicio:{
                    required:true,

             },
              data_fim:{
                    required:true,
             },
              data_entrega:{
                    required:true,

             },
             fk_status_tarefa:{
                    required:true,
             },
             fk_aluno:{
                    required:true,
             }
       },
       messages:{
            titulo:{
                    required:"Por favor, insira o título da tarefa",
                    minlength:"No mínimo 6 letras",
             },
             descricao:{
                    required:"Por favor, informe a descricao",
                    minlength:"No mínimo 6 letras",
             },
             data_inicio:{
                    required:"Por favor, informe a data de inicio",

             },
              data_fim:{
                    required:"Por favor, informe a data de fim",
             },
             data_entrega:{
                    required:"Por favor, informe a data de entrega",
             },
             fk_status_tarefa:{
                    required:" Informe o status da tarefa!",
             },
             fk_aluno:{
                    required:"Selecione um Responsável",
             }
       }
});

</script>
</body>
</html>
