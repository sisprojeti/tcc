<?php include_once("classes/class.tarefa.php");?>
<?php include_once("classes/class.db.php");?>
<?php
//print_r($_REQUEST);
if(isset($_GET['acao']) && $_GET['acao'] == "excluir"){
  try {
    $tarefa = new Tarefa();
    $tarefa->Excluir($_GET['id_tarefa']);
 
    echo "<div class='alert alert-danger' role='alert'>
  Um simples alerta danger. Olha só!
	</div>";

	//echo "<meta http-equiv='Refresh' content='10;URL='index.php?modulo=tarefa&acao=home'>";
    echo "<script>window.location.href = 'index.php?modulo=tarefa&acao=home'</script>";

  } catch (PDOException $e) {
    echo "ERROR".$e->getMessage();
  }
}
?>

<div style='animation: hide 2s 2s forwards'></div>

