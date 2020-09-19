<?php include('classes/class.aluno.php') ?>
<?php
  if(isset($_GET['msgsucesso']) && $_GET['msgsucesso'] === 'sucesso_inserir'){
    echo "<script>alert('Usuario cadastrado com sucesso')</script>";
  }
  try {
      $alunos = Aluno::listar();
  } catch (Exception $e) {
    echo "ERROR:".$e->getMessage();
   }
?>
<!------------------------------------- MENU ----------------------------------->
<div class="area_menu">
  <p></p>
   <p class="texto-area">Lista de Alunos </p>
   <p></p>
</div>

<!------------------------------------- FILTO ----------------------------------->
<form name="FormConsulta" class="form-horizontal" action="" method="post" style="border-bottom: solid 1px #ccc;">
<div style="padding: 0 3%; width: 100%; display:flex; justify-content: center;">
    <div class="controls" style="display:flex; width: 100%; align-content: center; justify-content: center;">
    <div class="controls">
        <input size="80" class="form-control" name="busca" type="text" placeholder="Nome">
    </div>
    <div  class="controls">
      <input type="submit" name="btnBuscar" value="Buscar" class="btn btn-warning" style="width: 120%; margin-left: 5px;" > 
    </div>
    </div>

</div>
<br>
</form>
<!------------------------------------- TABELA ----------------------------------->
<?php

    if(isset($_POST["busca"])){
        $busca = $_POST['busca'];
   }else{
        $busca=false;
    }

?>
 <div class="container col-lg-12 navbar-white">
    <section class="content navbar-light navbar-white">
      <div class="container-fluid navbar-white ">
<table class="table table-striped"style="margin-top:10px;">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">NOME</th>
<th scope="col">SITUAÇÃO</th>
<th scope="col">MATRÍCULA</th>
<th scope="col">AÇÃO</th>
</tr>
</thead>
<tbody>
<?php 
  $alunos = Aluno::listar($busca);
  if(isset($alunos)){
  foreach($alunos as $aluno){
?>
    <tr>
    <th scope="row"><?php echo $aluno->getIdAluno();?></th>
    <td><?php echo $aluno->getNomeAluno();?></td>
    <td><?php if(!$aluno->getSituacaoAluno()){
      echo "Inativo";
    }else{
      echo "Ativo";
    };?></td>
    <td><?php echo $aluno->getMatricula();?></td>
    <td>
      <a class="btn btn-info" href=""><i class="fas fa-eye"></i></a>
      <a class="btn btn-warning" href="?modulo=Academico&acao=editar&id=<?php echo $aluno->getIdAluno();?>"><i class="fas fa-edit"></i></a>
    <a class="btn btn-danger" href="?modulo=Academico&acao=excluir&id=<?php echo $aluno->getIdAluno();?>"><i class="fas fa-trash-alt"></i></a>
  </td>

    </tr>
<?php }}?>
</tbody>
</table>
      </div><!-- /.container-fluid -->
    </section>
  </div>
