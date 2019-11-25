<?php
include_once('classes/class.refCoordenadorCurso.php');
include_once('classes/class.coordenador.php');
try {
    $vinculos = RefCoordenadorCurso::listar();
    echo "<pre>";
    var_dump($vinculos);
    echo "</pre>";
} catch (Exception $e) {
  echo "ERROR:".$e->getMessage();
 }
?>
<div class="container col-lg-12 navbar-white">
    <section class="content navbar-light navbar-white">
      <div class="container-fluid navbar-white ">
<div class="row">
    <p>
   <a href="index.php?modulo=curso&acao=adicionar" class="btn btn-success">Adicionar</a>

   Listar Cursos
  </p>
<table class="table table-striped"style="margin-top:10px;">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Nome</th>
<th scope="col">Sigla</th>
</tr>
</thead>
<tbody>
<?php if(isset($vinculos)){
  foreach($vinculos as $vinculo){?>
    <tr>
    <td><?php echo $vinculo->getId();?></td>
    <td><?php echo $vinculo->getNomeCurso();?></td>
    <td><?php echo $vinculo->getNomeCoordenador();?></td>
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
