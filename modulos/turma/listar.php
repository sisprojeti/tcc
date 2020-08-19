<?php 
  include('classes/class.turma.php');
  include('classes/class.exercicio.php');
  include('classes/class.curso.php'); 
?>
<?php

  try {
      $turmas = Turma::listar();
  } catch (Exception $e) {
    echo "ERROR:".$e->getMessage();
   }
?>
<!------------------------------------- MENU ----------------------------------->
<div class="area_menu">
  <p></p>
   <p class="texto-area">Lista de Turmas </p>
   <p></p>
</div>
<!------------------------------------- FILTO ----------------------------------->
<form name="FormConsulta" class="form-horizontal" action="" method="post" style="border-bottom: solid 1px #ccc;">
<div style="padding: 0 3%; width: 100%; display:flex; justify-content: center;">

    <div class="controls" style="display:flex; width: 30%; align-content: center; justify-content: space-around;">
       <p> Exercicío: </p>
    <select class="form-control col-md-8"  name='exercicio'>
        <option value=""> Todos </option>
        <?php
            $exercicios = Exercicio::listar();
            foreach ($exercicios as $c) {
              if($_POST['exercicio']==$c->getIdExercicio()){
                echo "<option selected value= '".$c->getIdExercicio()."'>".$c->getNomeAno()."</option>";
              } else {
                 echo "<option value= '".$c->getIdExercicio()."'>".$c->getNomeAno()."</option>";
              }
            }
        ?>
    </select>
    </div>
    <div class="controls" style="display:flex; width: 33%; align-items: center; justify-content: space-around;" >
       <p> Curso: </p>
    <select class="form-control col-md-10"  name='curso'>
        <option value=""> Todos </option>
        <?php
            $cursos = Curso::listar();
            foreach ($cursos as $c) {
              if($_POST['curso']==$c->getIdCurso()){
                echo "<option selected value= '".$c->getIdCurso()."'>".$c->getNomeCurso()."</option>";
              }else{
                echo "<option value= '".$c->getIdCurso()."'>".$c->getNomeCurso()."</option>";
              }
            }
        ?>
    </select>
    </div>
    <div  class="controls" style="display:flex; width: 25%; justify-content: space-around;">
      <input type="submit" name="btnBuscar" value="Buscar" class="btn btn-warning" style="flex-grow: 0.3;" >
      <a href="index.php?modulo=turma&acao=adicionar" class="btn btn-success" style="flex-grow: 0.2;" >
        Adicionar
      </a> 
    </div>
</div>
<br>
</form>
<!------------------------------------- TABELA ----------------------------------->
<?php
    if(isset($_POST["exercicio"])){
        $exercicio = $_POST['exercicio'];
   }else{
        $exercicio=false;
    }
     if(isset($_POST["curso"])){
        $curso = $_POST['curso'];
   }else{
        $curso=false;
    }

?>
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
<th scope="col">Ação</th>
</tr>
</thead>
<tbody>
<?php 
  $turmas = Turma::listar($exercicio,$curso);
  if($turmas){
  foreach($turmas as $turma){ ?>
    <tr>
    <th scope="row"><?php echo $turma->getIdTurma();?></th>
    <td><?php echo $turma->getNomeTurma();?></td>
    <td><?php echo $turma->getCurso();?></td>
    <td><?php echo $turma->getEtapa();?></td>
    <td><?php echo $turma->getTurno();?></td>
    <td width=250>
      <a class="btn btn-info" href="?modulo=turma&acao=listagem_alunos_turma&id=<?php echo $turma->getIdTurma();?>"><i class="fas fa-eye"></i></a>
      <a class="btn btn-dark" href="?modulo=turma&acao=excluir&id=<?php echo $turma->getIdTurma();?>"><i class="fas fa-users"></i></a>
      <a class="btn btn-warning" href="?modulo=turma&acao=editar&id=<?php echo $turma->getIdTurma();?>"><i class="fas fa-edit"></i></a>
      <a class="btn btn-danger" href="?modulo=turma&acao=excluir&id=<?php echo $turma->getIdTurma();?>"><i class="fas fa-trash-alt"></i></a>
  </td>

    </tr>
<?php }}else{
  echo "<tr> <td colspan=6> Nenhum registro encontrado </td> </tr>";
} ?>
</tbody>
</table>

</div>
 </div><!-- /.container-fluid -->
    </section>
  </div>
