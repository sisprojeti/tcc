<?php

require "tarefa.model.php";
require "tarefa.service.php";
require "conexao.php";

	//$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

	//if($acao == 'inserir' ) {
		$tarefa = new Tarefa();
		$tarefa->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->inserir();
		echo "<script>location.href='index.php?modulo=tarefa&acao=home'</script>";
		// header('Location: nova_tarefa.php?inclusao=1');

	// } else if($acao == 'recuperar') {
	//
	// 		$tarefa = new Tarefa();
	// 	$conexao = new Conexao();
	//
	// 	$tarefaService = new TarefaService($conexao, $tarefa);
	// 	$tarefas = $tarefaService->recuperar();
	//
	// } else if($acao == 'atualizar') {
	//
	// 	
	//
	//
	// } else if($acao == 'remover') {
	//
	// 	$tarefa = new Tarefa();
	// 	$tarefa->__set('id', $_GET['id']);
	//
	// 	$conexao = new Conexao();
	//
	// 	$tarefaService = new TarefaService($conexao, $tarefa);
	// 	$tarefaService->remover();
	//
	// 	header('location: todas_tarefas.php');
	//
	// } else if($acao == 'marcarRealizada') {
	//
	// 	$tarefa = new Tarefa();
	// 	$tarefa->__set('id', $_GET['id'])->__set('id_status', 2);
	//
	// 	$conexao = new Conexao();
	//
	// 	$tarefaService = new TarefaService($conexao, $tarefa);
	// 	$tarefaService->marcarRealizada();
	//
	// 	header('location: todas_tarefas.php');
	// }

?>
