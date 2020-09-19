<?php
      include('classes/class.formulario_avaliacao.php');
?>

<?php

  try {
      $formularios_detalhes = FormularioAvaliacao::detalhe_formulario($_GET['id_formulario_avaliacao'],$_GET['fk_turma']);
      foreach ($formularios_detalhes as $formulario_detalhe) {
        echo "<pre>";
        print_r($formulario_detalhe->getNomeTurma());
        echo "<div class='form-check'>";
        echo "<input type='text'>";
        echo "<br>";
        echo "<input type='checkbox' class='form-check-input' id='exampleCheck1'>";
        echo $formulario_detalhe->getCriterio(); //deixar como valor do input
        echo "<label class='form-check-label' for='exampleCheck1'></label";
        echo "</div>";

        echo "</pre>";
      }
  } catch (Exception $e) {
      echo "ERROR:".$e->getMessage();
  }


?>
