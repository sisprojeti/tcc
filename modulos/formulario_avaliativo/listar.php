<?php 
  include('classes/class.turma.php');
  include ('classes/class.exercicio.php');
 ?>
<?php

  try {
      $turmas = Turma::listar();
  } catch (Exception $e) {
    echo "ERROR:".$e->getMessage();
   }
?>
<!------------------------------------- MENU ----------------------------------->
<div style="padding: 1%;">
  <p style="font-family: sans-serif;font-size: 1.5em;">Formulário Avaliativo </p>  
</div>
<!------------------------------------- FILTO ----------------------------------->
<form name="FormConsulta" class="form-horizontal" action="" method="post" style="border-bottom: solid 1px #ccc;">
<div style="padding: 0 3%;">

    <div class="controls">
       Exercicío:  
    <select name='exercicio'>
        <option value=""> Todos </option>
        <?php
            $exercicios = Exercicio::listar();
            foreach ($exercicios as $c) {
                echo "<option value= '".$c->getIdExercicio()."'>".$c->getNomeAno()."</option>";
            }
        ?>            
    </select>
    </div>
    <input type="submit" name="btnBuscar" class="btn" value="buscar" style="background: #fd7e14;">
</div>
        
</form>

<?php  
    if(isset($_POST["exercicio"])){
        $exercicio = $_POST['exercicio'];
   }else{
        $exercicio=false;
    }
?>

<!------------------------------------- TABELA ----------------------------------->
<div class="container col-lg-12 navbar-white">
<section class="content navbar-light navbar-white">
<div class="container-fluid navbar-white ">
<div class="row">
<table class="table table-striped"style="margin-top:10px;">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Nome</th>
<th scope="col">Curso</th>
<th scope="col">Etapa</th>
<th scope="col">Turno</th>
<th scope="col">Fomulário</th>
</tr>
</thead>
<tbody>
<?php
  $turmas = Turmas::listar($exercicio);
  foreach($turmas as $turma){ ?>
    <tr>
    <th scope="row"><?php echo $turma->getIdTurma();?></th>
    <td><?php echo $turma->getNomeTurma();?></td>
    <td><?php echo $turma->getCurso();?></td>
    <td><?php echo $turma->getEtapa();?></td>
    <td><?php echo $turma->getTurno();?></td>
    <td width=250>
      <a class="btn btn btn-success" href="?modulo=turma&acao=listagem_alunos_turma&id=<?php echo $turma->getIdTurma();?>">Cria Formulario </a>
      <a class="btn btn-warning" href="?modulo=turma&acao=editar&id=<?php echo $turma->getIdTurma();?>">Editar</a>
  </td>

    </tr>
<?php } ?>
</tbody>
</table>

</div>
 </div><!-- /.container-fluid -->
    </section>
  </div>
