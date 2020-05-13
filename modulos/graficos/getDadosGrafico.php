<?php

// Estrutura basica do grafico em array.
$grafico = array(
    'dados' => array(
        'cols' => array(
            array('type' => 'string', 'label' => 'Responsável'),
            array('type' => 'number', 'label' => 'Quantidade')
        ),  
        'rows' => array()
    ),
    'config' => array(
        'title' => 'Quantidade de tarefas por Responsável',
        'width' => 500,
        'height' => 400
    )
);

// Consultar dados no BD
$pdo = new PDO('mysql:host=localhost;dbname=sisp14', 'root', '');//conexão com o banco se ele existir
$sql = 'SELECT fk_aluno, COUNT(*) as id_tarefa FROM tarefa GROUP BY fk_aluno'; // chamada/listagem dos dados na tabela selecionada. 
$stmt = $pdo->query($sql);
while ($obj = $stmt->fetchObject()) {
    $grafico['dados']['rows'][] = array('c' => array(
        array('v' => $obj->fk_aluno),
        array('v' => (int)$obj->id_tarefa)
    ));
}

// Enviar dados na forma de JSON
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($grafico);
exit(0);