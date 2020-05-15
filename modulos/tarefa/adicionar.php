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
    


</body>
</html>

</body>
</html>
