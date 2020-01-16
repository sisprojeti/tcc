<?php include('classes/class.aluno.php') ?>
<?php
  if(isset($_GET['msgsucesso']) && $_GET['msgsucesso'] === 'sucesso_inserir'){
    echo "<script>alert('Usuario cadastrado com sucesso')</script>";
  }
  try {
      $alunos = Aluno::listar();
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
<th scope="col">Situação</th>
<th scope="col">Matricula</th>
<th scope="col">Ação</th>
</tr>
</thead>
<tbody>
<?php if(isset($alunos)){
  foreach($alunos as $aluno){?>
    <tr>
    <th scope="row"><?php echo $aluno->getIdAluno();?></th>
    <td><?php echo $aluno->getNomeAluno();?></td>
    <td><?php if(!$aluno->getSituacaoAluno()){
      echo "Inativo";
    }else{
      echo "Ativo";
    };?></td>
    <td><?php echo $aluno->getMatricula();?></td>
    <td>
      <a class="btn btn-primary" href="">Info</a>
      <a class="btn btn-warning" href="?modulo=Academico&acao=editar&id=<?php echo $aluno->getIdAluno();?>">Editar</a>
    <a class="btn btn-danger" href="?modulo=Academico&acao=excluir&id=<?php echo $aluno->getIdAluno();?>">Excluir</a>
  </td>

    </tr>
<?php }}?>
</tbody>
</table>
      </div><!-- /.container-fluid -->
    </section>
  </div>
