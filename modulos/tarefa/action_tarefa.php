<?php
  session_start();
  require_once('../../classes/class.db.php');
  require_once('../../classes/class.tarefa.php');
  require_once('../../classes/class.refAlunoProjeti.php');
  include_once('../../classes/class.projeti.php');

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

  if(isset($_POST["action"])){

  /*if($_POST["action"] == "Load"){
  $statement = $connection->prepare("SELECT * FROM pessoa");
  $statement->execute();
  $listar = $statement->fetchAll();
  $output = '';
  $output .= '
    <table class="table table-bordered">
    <tr>
      <th width="5%">ID</th>
      <th width="50%">Nome</th>
      <th width="5%">Idade</th>
      <th width="20%">Celular</th>
      <th width="5%">Editar</th>
      <th width="5%">Apagar</th>
    </tr>
  ';
  
  if($statement->rowCount() > 0){
    foreach($listar as $row){
    $output .= '
  <tr>
    <td>'.$row["id"].'</td>
    <td>'.$row["nome"].'</td>
    <td>'.$row["idade"].'</td>
    <td>'.$row["telefone"].'</td>
    <td><button type="button" id="'.$row["id"].'" class="btn btn-warning btn-xs editar">
    <img src="edit-tools.png">
    </button></td>
    <td><button type="button" id="'.$row["id"].'" class="btn btn-danger btn-xs excluir"> <img src= "rubbish-can.png"> </button></td>
  </tr>
    ';
   }
  }else{
   $output .= '
    <tr> 
    <td align="center">Dado não encontrado</td>
    </tr>
   ';
  }$output .= '</table>';
  echo $output;
 }*/

/*---------------------------------------------------------
 # ADICIONAR DADOS
------------------------------------------------------------------------------*/
  if($_POST["action"] == "Adicionar"){
      $data_cadastro = date("Y-m-d");
      $tarefa = new Tarefa();
      $tarefa->setTitulo($_POST['titulo']);
      $tarefa->setDataInicio($_POST['data_inicio']);
      $tarefa->setDataEntrega($_POST['data_entrega']);
      $tarefa->setDescricao($_POST['descricao']);
      $tarefa->setDataCadastro($data_cadastro);
      $tarefa->setFkStatusTarefa($_POST['fk_status_tarefa']);
      $tarefa->setFkProjeti($id_projeti_aluno->getIdProjeti());
      $tarefa->setFkAluno($_POST['fk_aluno']);
      $tarefa->adicionar();
/*
<div class="alert alert-success" role="alert">
  Um simples alerta success. Olha só!
</div>
*/
      
      header('Location: ../../index.php?modulo=tarefa&acao=home');

      if(isset($tarefa)){
          echo 'Cadastro Inserida!';
          }
 }

 /*---------------------------------------------------------
 # FILTRAR DADOS
------------------------------------------------------------------------------*/
  if($_POST["action"] == "Select"){
  $output = array();
  $statement = $connection->prepare( "SELECT * FROM tarefa WHERE id = '".$_POST["id"]."' LIMIT 1");
  $statement->execute();
  $listar = $statement->fetchAll();
    foreach($listar as $row){
    $output ["titulo"] = $row["titulo"];
    $output ["descricao"] = $row["descricao"];
    $output ["data_inicio"] = $row["data_inicio"];
    $output ["data_entrega"] = $row["data_entrega"];
    $output ["fk_status_tarefa"] = $row["fk_status_tarefa"];
    $output ["fk_projeti"] = $row["fk_projeti"];
    $output ["fk_aluno"] = $row["fk_aluno"];
    }echo json_encode($output);
  }

 /*---------------------------------------------------------
 # EXCLUIR DADOS
------------------------------------------------------------------------------*/
  if($_POST["action"] == "Excluir"){
  $statement = $connection->prepare("DELETE FROM pessoa WHERE id = :id");
  $listar = $statement->execute(
   array(
    ':id' => $_POST["id"])
  );
  if(!empty($listar)){
   echo 'Cadastro Apagado!';
  }
 }
}

?>
 
