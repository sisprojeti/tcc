<?php
  include "classes/class.criterio.php";
  include "classes/class.formulario_avaliacao.php";
  include "classes/class.refFormularioCriterio.php";
?>
<!------------------------------------- MENU ----------------------------------->
<style type="text/css"></style>

<div style="padding: 1%;">
  <p style="font-family: sans-serif;font-size: 1.5em;">Criar Formulário Avaliativo </p>
</div>
<p style="font-family: sans-serif;font-size: 1.3em;"> Turma - SIS01 </p>

<?php
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
    echo "<br>";
    echo "<div class='container col-lg-12 navbar-white'>";
    echo "<div class='container col-lg-8 navbar-white'>";
    echo "<section class='content navbar-light navbar-white'>";
    echo "<div class='container-fluid navbar-white ''>";
    echo "<form action='' method='post'>";
     echo " <div class='form-row'>";
        echo "<div class='form-group col-md-6'>";
          echo "<label for=''>Data de Avaliação</label>";
          echo "<input type='date' class='form-control' name='data_avaliacao'>";
        echo "</div>";
      echo "</div> <br>";
      echo "<label> Selecione os Critérios: </label>";
    foreach ($criterios as $criterio) {

    echo "<div class='form-group'>";
    echo "  <div class=' custom-control custom-checkbox'>";
    echo " <input class='custom-control-input' type='checkbox' id='gridCheck".$criterio->getIdCriterio()."' value='".$criterio->getIdCriterio()."' name='criterio[]'>";
    echo " <label class='custom-control-label style='font-weight: unset;' for='gridCheck".$criterio->getIdCriterio()."'>";
    echo ucfirst($criterio->getNomeCriterio());
    echo "  </label>";
    echo "  </div>";
    echo " </div>";
    }
    echo "<br> <button type='submit' class='btn btn-success' name='cadastra_formulario' value='cadastra_formulario'> Cadastrar Formulário </button>";
    echo " </form>";
    echo " </div>";
    echo "</section>";
    echo " </div>";
    echo "</div>";
  }
?>

