<?php include('classes/class.criterio.php') ?>
<?php

  try {
      $criterios = Criterio::listar();
  } catch (Exception $e) {
    echo "ERROR:".$e->getMessage();
   }
?>
<!------------------------------------- MENU ----------------------------------->
<div class="area_menu">
  <p></p>
   <p class="texto-area">Lista de Critérios Avaliativos </p>
    <div>
      <a href="index.php?modulo=criterios&acao=adicionar" class="btn btn-success">Adicionar</a> 
    </div>
</div>

<!------------------------------------- TABELA ----------------------------------->
<div class="container col-lg-12 navbar-white">
<section class="content navbar-light navbar-white">
<div class="container-fluid navbar-white ">
<div class="row">
<table class="table table-striped"style="margin-top:10px; padding-left: 5%">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Nome</th>
<th scope="col">Valor Maximo</th>
<th scope="col">Ação</th>
</tr>
</thead>
<tbody>
<?php if(isset($criterios)){
  foreach($criterios as $criterio){?>
    <tr>
    <th scope="row"><?php echo $criterio->getIdCriterio();?></th>
    <td><?php echo $criterio->getNome();?></td>
    <td><?php echo $criterio->getValorMaximo();?></td>
    <td>
    <a href="?modulo=Criterio&acao=editar&id=<?php echo $criterio->getNome();?>"><button class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
    <a href="?modulo=Criterio&acao=excluir&id=<?php echo $criterio->getValorMaximo();?>"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a></td>

    </tr>
<?php }}?>
</tbody>
</table>
</div>
 </div><!-- /.container-fluid -->
    </section>
  </div>