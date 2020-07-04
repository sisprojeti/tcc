<?php
  include "classes/class.criterio.php";
  include "classes/class.formulario_avaliacao.php";
  include "classes/class.refFormularioCriterio.php";
  if(isset($_POST['cadastra_formulario']) == 'cadastra_formulario'){
    //print_r($_POST['criterio']);
    if(isset($_POST['criterio'])){
      $formulario = new FormularioAvaliacao();
      $formulario->setFkTurma($_GET['id']);
      $formulario->setDataAvaliacao($_POST['data_avaliacao']);
      $id_formulario = $formulario->adicionar();
      foreach($_POST['criterio'] as $criterio) {
        $c = new RefFormularioCriterio();
        $c->setFkFormulario($id_formulario);
        $c->setFkCriterio($criterio);
        $c->adicionar();
      }
    }
  }; //criar teste se o botão for precionado
  $criterios = Criterio::listar();
  if($criterios){
    echo "<form action='' method='post'>";
    echo "<input class='form-control' type='date' name='data_avaliacao'>";
    foreach ($criterios as $criterio) {

      echo $criterio->getNome();
      echo "<input type='checkbox' value='".$criterio->getIdCriterio()."' name='criterio[]'>";
      echo "<br>";
    }
    echo "<button type='submit' name='cadastra_formulario' value='cadastra_formulario'> Cadastrar Formulário </button>";
    echo "</form>";
  }
?>
