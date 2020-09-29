<?php 
  include('classes/class.turma.php');
  include('classes/class.aluno.php');?>
<?php

  try {
      $alunosTurma = Turma::listarAlunosTurma($_GET['id']);
  } catch (Exception $e) {
    echo "ERROR:".$e->getMessage();
   }
?>
<!------------------------------------- MENU ----------------------------------->
<div class="area_menu">
  <p></p>
   <p class="texto-area"> 
    Turma - <?php echo "<b>".Turma::recuperaNomeTurma($_GET['id'])."</b>"; ?> 
 </p>
  <a href="index.php?modulo=turma&acao=listar" style="height: 60%;" class="btn btn-secondary">Voltar</a>
</div>

<!------------------------------------- TABELA ----------------------------------->
<div class="container col-lg-12 navbar-white">
   <section class="content navbar-light navbar-white">
     <div class="container-fluid navbar-white ">
<table class="table table-striped"style="margin-top:10px;">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Nome</th>
<th scope="col">Situação</th>
<th scope="col">Contato</th>
<th scope="col">Status</th>
</tr>
</thead>
<tbody>
<?php if(isset($alunosTurma)){
 foreach($alunosTurma as $aluno){?>
   <tr>
   <th scope="row"><?php echo $aluno->getIdAluno();?></th>
   <td><?php echo $aluno->getNomeAluno();?></td>
   <td><?php if(!$aluno->getSituacaoAluno()){
     echo "Inativo";
   }else{
     echo "Ativo";
   };?></td>
   <td><?php echo $aluno->getTelefone();?></td>
   <td>
     <?php 
     if (Turma::verificaAlunoGrupo($aluno->getIdAluno())) {
       echo "<span style='width:110px; font-size: 0.9em;' class='badge badge-info'> COM GRUPO </span>";
     }else{
      echo "<span style='width:110px; font-size: 0.9em;' class='badge badge-danger'> SEM GRUPO </span> ";
     }
      ?>
 </td>
   </tr>
<?php }}?>
</tbody>
</table>
     </div>
   </section>
 </div>


