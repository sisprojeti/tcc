<?php
header('Content-Type: application/json');

include 'classes/class.db.php';
include 'classes/class.tarefa.php';

$tarefa = Tarefa::listarTarefas();

echo "<pre>";
print_r(json_encode($tarefa));
echo "</pre>";

// Decodifica o formato JSON e retorna um Objeto
$json = json_decode($arquivo);

// Loop para percorrer o Objeto
foreach($json as $registro):
    echo 'Código: ' . $registro->codigo . ' - Nome: ' . $registro->nome . ' - Telefone: ' . $registro->telefone . '<br>';
endforeach;


?>
