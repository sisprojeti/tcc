<?php
require "tarefa.model.php";
require "tarefa.service.php";
require "conexao.php";

$tarefa = new Tarefa();
	$tarefa->__set('id', $_POST['id'])
		->__set('tarefa', $_POST['tarefa']);

	$conexao = new Conexao();

	$tarefaService = new TarefaService($conexao, $tarefa);
	if($tarefaService->atualizar()) {
		echo "<script>location.href='index.php?modulo=tarefa&acao=home'</script>";
	}

?>
