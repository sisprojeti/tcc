<?php include('classes/class.exercicio.php') ?>
<?php

  try {
      $exercicios = Exercicio::listar();
  } catch (Exception $e) {
    echo "ERROR:".$e->getMessage();
   }
?>
<!------------------------------------- MENU ----------------------------------->
<div class="area_menu">
  <p></p>
   <p class="texto-area">Lista de Exercícios </p>
    <div><a href="index.php?modulo=exercicio&acao=adicionar" class="btn btn-success">Adicionar</a> </div>
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
<th scope="col">Ação</th>
</tr>
</thead>
<tbody>
<?php if(isset($exercicios)){
  foreach($exercicios as $exercicio){?>
    <tr>
    <th scope="row"><?php echo $exercicio->getIdExercicio();?></th>
    <td><?php echo $exercicio->getNomeAno();?></td>
    <td width=250>
      <a class="btn btn-primary" href="">Info</a>
      <a class="btn btn-warning" href="?modulo=exercicio&acao=editar&id=<?php echo $exercicio->getIdExercicio();?>">Editar</a>
    <a class="btn btn-danger" href="?modulo=exercicio&acao=excluir&id=<?php echo $exercicio->getIdExercicio();?>">Excluir</a>
  </td>

    </tr>
<?php }}?>
</tbody>
</table>

</div>
 </div><!-- /.container-fluid -->
    </section>
  </div>
