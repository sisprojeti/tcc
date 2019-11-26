<?php include('classes/class.etapa.php') ?>
<?php

  try {
      $etapas = Etapa::listar();
  } catch (Exception $e) {
    echo "ERROR:".$e->getMessage();
   }
?>
<!------------------------------------- MENU ----------------------------------->
<div class="area_menu">
  <p></p>
   <p class="texto-area">Lista de Etapas </p>
    <div><a href="index.php?modulo=etapa&acao=adicionar" class="btn btn-success">Adicionar</a> </div>
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
<th scope="col">Ordem</th>
<th scope="col">Situação</th>
<th scope="col">Ação</th>
</tr>
</thead>
<tbody>
<?php if(isset($etapas)){
  foreach($etapas as $etapa){?>
    <tr>
    <th scope="row"><?php echo $etapa->getIdEtapa();?></th>
    <td><?php echo $etapa->getNomeEtapa();?></td>
    <td><?php echo $etapa->getOrdem();?></td>
    <td><?php echo $etapa->getStatusEtapa();?></td>
    <td width=250>
      <a class="btn btn-primary" href="">Info</a>
      <a class="btn btn-warning" href="?modulo=etapa&acao=editar&id=<?php echo $etapa->getIdEtapa();?>">Editar</a>
    <a class="btn btn-danger" href="?modulo=etapa&acao=excluir&id=<?php echo $etapa->getIdEtapa();?>">Excluir</a>
  </td>

    </tr>
<?php }}?>
</tbody>
</table>

</div>
 </div><!-- /.container-fluid -->
    </section>
  </div>
