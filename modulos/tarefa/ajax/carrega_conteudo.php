<?php
require_once('../../../classes/class.tarefa.php');
require_once('../../../classes/class.db.php');
  //echo $_GET['id'];

  $tarefa = new Tarefa($_GET['id']);

  echo $tarefa->getTituloTarefa();


?>
