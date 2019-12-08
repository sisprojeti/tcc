<?php include('classes/class.professor.php') ?>
<?php

  try {
      $professores = Professor::listar();
  } catch (Exception $e) {
    echo "ERROR:".$e->getMessage();
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
<?php if(isset($professores)){
  foreach($professores as $professor){?>
    <tr>
    <th scope="row"><?php echo $professor->getIdProfessor();?></th>
    <td><?php echo $professor->getNome();?></td>
    <td><?php echo $professor->getEmail();?></td>
    <td><?php echo $professor->getCpf();?></td>
    <td><?php echo $professor->getTelefone();?>
    <td width=250>
      <a class="btn btn-primary" href="">Info</a>
      <a class="btn btn-warning" href="?modulo=Academico&acao=editar&id=<?php echo $professor->getIdProfessor();?>">Editar</a>
    <a class="btn btn-danger" href="?modulo=Academico&acao=excluir&id=<?php echo $professor->getIdProfessor();?>">Excluir</a>
  </td>

    </tr>
<?php }}?>
</tbody>
</table>
      </div><!-- /.container-fluid -->
    </section>
  </div>
