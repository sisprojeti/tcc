<?php include('classes/class.coordenador.php') ?>
<?php

  try {
      $coordenadores = Coordenador::listar();
  } catch (Exception $e) {
    echo "ERROR:".$e->getMessage();
   }
?>

<table class="table table-white" style="margin-top:10px;">
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
<?php if(isset($coordenadores)){
  foreach($coordenadores as $coordenador){?>
    <tr>
    <th scope="row"><?php echo $coordenador->getIdCoordenador();?></th>
    <td><?php echo $coordenador->getNome();?></td>
    <td><?php echo $coordenador->getEmail();?></td>
    <td><?php echo $coordenador->getCpf();?></td>
    <td><?php echo $coordenador->getTelefone();?></td>
    <td><a href="?modulo=Academico&acao=editar&id=<?php echo $coordenador->getIdCoordenador();?>"><button class="btn btn-info">Info</button></a>
    <a href="?modulo=Academico&acao=editar&id=<?php echo $coordenador->getIdCoordenador();?>"><button class="btn btn-warning">Editar</button></a>
    <a href="?modulo=Academico&acao=excluir&id=<?php echo $coordenador->getIdCoordenador();?>"><button class="btn btn-danger">Excluir</button></a></td>

    </tr>
<?php }}?>
</tbody>
</table>
