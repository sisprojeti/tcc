<?php
include_once('classes/class.aluno.php');

try{
  $totalAlunos = Aluno::contarAlunos();
  print_r($totalAlunos);
}catch(PDOException $e) {
  echo "ERROR".$e->getMessage();
}

?>
