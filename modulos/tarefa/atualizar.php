<?php include_once("../../classes/class.tarefa.php");?>
<?php include_once("../../classes/class.db.php");?>

<?php
//print_r($_REQUEST);
if(isset($_POST['Atualizar']) && $_POST['Atualizar'] == "Atualizar"){
  try {
    $tarefa = new Tarefa($_POST['id_tarefa']); //recuperar o id da tarefa que está selecionada pra editar
    $tarefa->setTitulo($_POST['titulo']);
    $tarefa->setDataInicio($_POST['data_inicio']);
    $tarefa->setDataFim($_POST['data_fim']);
    $tarefa->setDataConclusao($_POST['data_conclusao']);
    $tarefa->setDescricao($_POST['descricao']);
    $tarefa->setFkStatusTarefa($_POST['fk_status_tarefa']);
    $tarefa->setFkAluno($_POST['fk_aluno']);
    $tarefa->AtualizarTarefa();
  } catch (PDOException $e) {
    echo "ERROR".$e->getMessage();
  }
}
?>
