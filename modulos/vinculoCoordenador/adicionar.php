<h1>Apenas retornando registros, falta fazer o select de coordenador = pessoa e colocar o formulário de cadastro</h1>
<?php
include_once('classes/class.refCoordenadorCurso.php');

try {
  $novaRefCoordCurso = new RefCoordenadorCurso;
  $novaRefCoordCurso->setIdCurso($_POST['curso_id']);
  $novaRefCoordCurso->setIdCoordenador($_POST['coordenador_id']);
  $novaRefCoordCurso->adicionar();
} catch (PDOException $e) {
  echo "ERROR".$e->getMessage();
}

try{
    include_once('classes/class.coordenador.php');
    $listarCoordenador = Coordenador::listar();
    echo "<pre>";
    var_dump($listarCoordenador);
    echo "</pre>";
} catch (PDOException $e) {
    echo "ERROR".$e->getMessage();
}

try {
  include_once('classes/class.curso.php');
  $listarCursos = Curso::listar();
  var_dump($listarCursos);
} catch (PDOExeption $e) {
  echo "ERROR".$e->getMessage();
}

?>
