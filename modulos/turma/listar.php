<?php include('classes/class.turma.php') ?>
<?php

  try {
      $turmas = Turma::listar();
  } catch (Exception $e) {
    echo "ERROR:".$e->getMessage();
   }
?>
<!------------------------------------- MENU ----------------------------------->
<div class="area_menu">
  <p></p>
   <p class="texto-area">Lista de Turma </p>
    <div><a href="index.php?modulo=turma&acao=adicionar" class="btn btn-success">Adicionar</a> </div>
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
<th scope="col">Curso</th>
<th scope="col">Professor<th>
<th scope="col">Etapa</th>
<th scope="col">Turno</th>
<th scope="col">Ação</th>
</tr>
</thead>
<tbody>
<?php if(isset($turmas)){
  foreach($turmas as $turma){?>
    <tr>
    <th scope="row"><?php echo $turma->getIdTurma();?></th>
    <td><?php echo $turma->getNomeTurma();?></td>
    <td><?php echo $turma->getCurso();?></td>
    <td>TRAZER DINÂMICO DO BANCO DE DADOS O PROFESSOR VICULADO A ESSA TURMA</td>
    <td><?php echo $turma->getEtapa();?></td>
    <td><?php echo $turma->getTurno();?></td>
    <td width=250>
      <a class="btn btn-primary" href="">Info</a>
      <a class="btn btn-warning" href="?modulo=turma&acao=editar&id=<?php echo $turma->getIdTurma();?>">Editar</a>
    <a class="btn btn-danger" href="?modulo=turma&acao=excluir&id=<?php echo $turma->getIdTurma();?>">Excluir</a>
  </td>

    </tr>
<?php }}?>
</tbody>
</table>

</div>
 </div><!-- /.container-fluid -->
    </section>
  </div>
