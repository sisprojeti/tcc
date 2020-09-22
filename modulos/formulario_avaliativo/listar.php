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
<div style="padding: 1%;">
  <p style="font-family: sans-serif;font-size: 1.5em;">Formulário Avaliativo </p>
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
    <input type="submit" name="btnBuscar" value="Buscar" class="btn btn-warning" style="margin-left: 5%; width: 10%;">
</div>
<br>
</form>

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
      <a class="btn btn btn-success" style="width: 20%; height: 10%;" href="?modulo=formulario_avaliativo&acao=adicionar&id=<?php echo $turma->getIdTurma();?>"><i class="fas fa-plus"></i> </a>
      <a class="btn btn-warning" style="width: 20%; height: 10%;"href="?modulo=?&acao=?&id=<?php echo $turma->getIdTurma();?>"><i class="fas fa-edit"></i></a>
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
<?php
require_once('classes/class.formulario_avaliacao.php');

try {
    //$formulario_avaliacao = FormularioAvaliacao::listar();
} catch (Exception $e) {
  echo "ERROR:".$e->getMessage();
 }
?>

<style>
       .error{
             color:red
       }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
      <script>
            $("#cad_grupos").validate({
       rules : {
              tema:{
                    required:true,
                    minlength:6,
             },
             descricao:{
                    required:true,
                    minlength:6,
             },
              aluno_um:{
                    required:true,

             },
              aluno_dois:{
                    required:true,
             },
              aluno_tres:{
                    required:true,

             },
       },
       messages:{
            tema:{
                    required:"Por favor, insira o tema do projeti",
                    minlength:"No mínimo 6 letras",
             },
             descricao:{
                    required:"Por favor, informe a descricao",
                    minlength:"No mínimo 6 letras",
             },
             aluno_um:{
                    required:"Por favor, selecione um aluno",

             },
             aluno_dois:{
                    required:"Por favor, selecione um aluno",
             },
             aluno_tres:{
                    required:"Por favor, selecione um aluno",
             },
       }
});

</script>

<style type="text/css">
  .redq{
  font-size: 25em;
}
</style>