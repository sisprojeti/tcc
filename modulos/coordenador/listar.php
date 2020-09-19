<?php include('classes/class.coordenador.php') ?>
<?php

  try {
      $coordenadores = Coordenador::listar();
  } catch (Exception $e) {
    echo "ERROR:".$e->getMessage();
   }
?>
<!------------------------------------- MENU ----------------------------------->
<div class="area_menu">
  <p></p>
   <p class="texto-area" style="width: 300px;">Lista de Coordenadores </p>
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
<table class="table table-white" style="margin-top:10px;">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">NOME</th>
<th scope="col">E-MAIL</th>
<th scope="col">CPF</th>
<th scope="col">TELEFONE</th>
<th scope="col">AÇÃO</th>
</tr>
</thead>
<tbody>
<?php 
  $coordenadores = Coordenador::listar($busca);
  if(isset($coordenadores)){
  foreach($coordenadores as $coordenador){?>
    <tr>
    <th scope="row"><?php echo $coordenador->getIdCoordenador();?></th>
    <td><?php echo $coordenador->getNome();?></td>
    <td><?php echo $coordenador->getEmail();?></td>
    <td><?php echo $coordenador->getCpf();?></td>
    <td><?php echo $coordenador->getTelefone();?></td>
    <td><a class="btn btn-info" href=""><i class="fas fa-eye"></i></a>
    <a href="?modulo=Academico&acao=editar&id=<?php echo $coordenador->getIdCoordenador();?>"><button class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
    <a href="?modulo=Academico&acao=excluir&id=<?php echo $coordenador->getIdCoordenador();?>"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a></td>

    </tr>
<?php }}?>
</tbody>
</table>
