<?php

if($_GET['tipo'] == 1){
  echo "Tarefas a fazer";
}elseif($_GET['tipo'] == 2){
  echo "Tarefas fazendo";
}else{
  //header('Location:index.php?modulo=tarefas&acao=listar');
}

try{
     $listarTarefas = Tarefa::listar($_GET['tipo']);
 }catch(PDOException $e){
   echo "ERROR".$e->getMessage();
 }

?>
