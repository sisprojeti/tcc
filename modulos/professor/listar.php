<?php include('classes/class.professor.php') ?>
<?php

  try {
      $professores = Professor::listar();
  } catch (Exception $e) {
    echo "ERROR:".$e->getMessage();
   }
?>
<!------------------------------------- MENU ----------------------------------->
<div class="area_menu">
  <p></p>
   <p class="texto-area" style="width: 300px;">Lista de Professores </p>
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
<th scope="col">Nome</th>
<th scope="col">Email</th>
<th scope="col">Cpf</th>
<th scope="col">Telefone</th>
<th scope="col">Ação</th>
</tr>
</thead>
<tbody>
<?php 
  $professores = Professor::listar($busca);
  if(isset($professores)){
  foreach($professores as $professor){?>
    <tr>
    <th scope="row"><?php echo $professor->getIdProfessor();?></th>
    <td><?php echo $professor->getNomeProfessor();?></td>
    <td><?php echo $professor->getEmail();?></td>
    <td><?php echo $professor->getCpf();?></td>
    <td><?php echo $professor->getTelefone();?>
    <td width=250>
      <a class="btn btn-info" href=""><i class="fas fa-eye"></i></a>
      <a class="btn btn-warning" href="?modulo=Academico&acao=editar&id=<?php echo $professor->getIdProfessor();?>"><i class="fas fa-edit"></i></a>
    <a class="btn btn-danger" href="?modulo=Academico&acao=excluir&id=<?php echo $professor->getIdProfessor();?>"><i class="fas fa-trash-alt"></i></a>
  </td>

    </tr>
<?php }}?>
</tbody>
</table>
      </div><!-- /.container-fluid -->
    </section>
  </div>
