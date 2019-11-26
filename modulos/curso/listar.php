<?php include('classes/class.curso.php') ?>
<?php

  try {
      $cursos = Curso::listar();
  } catch (Exception $e) {
    echo "ERROR:".$e->getMessage();
   }
?>
<!------------------------------------- MENU ----------------------------------->
<div class="area_menu">
  <p></p>
   <p class="texto-area">Lista de Cursos </p>
    <div><a href="index.php?modulo=curso&acao=adicionar" class="btn btn-success">Adicionar</a> </div>
</div>

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
<th scope="col">Sigla</th>
<th scope="col">Situação</th>
<th scope="col">Ação</th>
</tr>
</thead>
<tbody>
<?php if(isset($cursos)){
  foreach($cursos as $curso){?>
    <tr>
    <th scope="row"><?php echo $curso->getIdCurso();?></th>
    <td><?php echo $curso->getNome();?></td>
    <td><?php echo $curso->getSigla();?></td>
    <td><?php echo $curso->getStatusCurso();?></td>
    <td width=250>
      <a class="btn btn-primary" href="">Info</a>
      <a class="btn btn-warning" href="?modulo=curso&acao=editar&id=<?php echo $curso->getIdcurso();?>">Editar</a>
    <a class="btn btn-danger" href="?modulo=curso&acao=excluir&id=<?php echo $curso->getIdcurso();?>">Excluir</a>
  </td>

    </tr>
<?php }}?>
</tbody>
</table>

</div>
 </div><!-- /.container-fluid -->
    </section>
  </div>
