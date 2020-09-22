<?php include('classes/class.turma.php');
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
   <p class="texto-area"> Turma - <b> SIS01 <b> </p>
  <a href="index.php?modulo=turma&acao=listar" class="btn btn-secondary">Voltar</a>
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
     
 </td>

   </tr>
<?php }}?>
</tbody>
</table>
     </div><!-- SELECT aluno.id_aluno  FROM aluno
join ref_aluno_turma on aluno.id_aluno = ref_aluno_turma.fk_aluno
join turma on ref_aluno_turma.fk_turma = turma.id_turma
 where turma.id_turma = 1 and NOT EXISTS (SELECT * FROM ref_aluno_projeti
              WHERE ref_aluno_projeti.fk_aluno = aluno.id_aluno) ; -->
   </section>
 </div>

