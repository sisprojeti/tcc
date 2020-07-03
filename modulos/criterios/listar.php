<?php include('classes/class.criterio.php') ?>
<?php

  try {
      $criterios = Criterio::listar();
  } catch (Exception $e) {
    echo "ERROR:".$e->getMessage();
   }
?>

<table class="table table-white" style="margin-top:10px;">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Nome</th>
<th scope="col">Valor Maximo</th>
</tr>
</thead>
<tbody>
<?php if(isset($criterios)){
  foreach($criterios as $criterio){?>
    <tr>
    <th scope="row"><?php echo $criterio->getIdCriterio();?></th>
    <td><?php echo $criterio->getNome();?></td>
    <td><?php echo $criterio->getValorMaximo();?></td>
    <td><a href="?modulo=Criterio&acao=editar&id=<?php echo $criterio->getIdCriterio();?>"><button class="btn btn-info">Info</button></a>
    <a href="?modulo=Criterio&acao=editar&id=<?php echo $criterio->getNome();?>"><button class="btn btn-warning">Editar</button></a>
    <a href="?modulo=Criterio&acao=excluir&id=<?php echo $criterio->getValorMaximo();?>"><button class="btn btn-danger">Excluir</button></a></td>

    </tr>
<?php }}?>
</tbody>
</table>
