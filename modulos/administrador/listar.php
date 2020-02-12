<?php include('classes/class.administrador.php') ?>
<?php
  if(isset($_GET['msgsucesso']) && $_GET['msgsucesso'] === 'sucesso_inserir'){
    echo "<script>alert('Usuario cadastrado com sucesso')</script>";
  }
  try {
      $administradores = Administrador::listar();
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
<th scope="col">Ação</th>
</tr>
</thead>
<tbody>
<?php if(isset($administradores)){
  foreach($administradores as $administrador){?>
    <tr>
    <th scope="row"><?php echo $administrador->getIdAdministrador();?></th>
    <td><?php echo $administrador->getNomeAdministrador();?></td>
    <td><?php echo $administrador->getEmailAdministrador();?></td>
    <td>
      <a class="btn btn-primary" href="">Info</a>
      <a class="btn btn-warning" href="?modulo=administrador&acao=editar&id=<?php echo $administrador->getIdAdministrador();?>">Editar</a>
    <a class="btn btn-danger" href="?modulo=administrador&acao=excluir&id=<?php echo $administrador->getIdAdministrador();?>">Excluir</a>
  </td>

    </tr>
<?php }}?>
</tbody>
</table>
      </div><!-- /.container-fluid -->
    </section>
  </div>
