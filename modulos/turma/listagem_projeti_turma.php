<?php
include('classes/class.turma.php');
include('classes/class.aluno.php');
include('classes/class.pessoa.php');
?>
<?php
  try {
      $projetisTurma = Turma::listarProjetiTurma($_GET['id']);
  } catch (Exception $e) {
    echo "ERROR:".$e->getMessage();
   }

   try {
       $alunosProjeti = Turma::alunosProjeti($_GET['id']);
   } catch (Exception $e) {
     echo "ERROR:".$e->getMessage();
    }
?>
<!------------------------------------- MENU ----------------------------------->
<div class="area_menu">
  <p></p>
   <p class="texto-area">Projetis da Turma</p>
    <div><a href="index.php?modulo=turma&acao=adicionar" class="btn btn-success">Adicionar</a> </div>
</div>

<!------------------------------------- TABELA ----------------------------------->
<div class="container col-lg-12 navbar-white">
   <section class="content navbar-light navbar-white">
     <div class="container-fluid navbar-white ">
<table class="table table-striped"style="margin-top:10px;">
<tbody>
  <div class="row">
  <?php if(isset($projetisTurma)):?>
    <?php foreach ($projetisTurma as $projetis){?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h4> <?= $projetis->getTemaProjeti();?> </h4>
                <?php if(isset($projetis)):?>
                  <?php $alunosProjeti = Turma::alunosProjeti($projetis->getIdProjeti());
                  foreach ($alunosProjeti as $alunoProjeti) {
                    echo "<br>";
                    echo $alunoProjeti->getNome()."<br>";
                  }
                  ?>
                <?php endif;?>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Relatorios <i class="fas fa-arrow-circle-right"></i></a>
              <a href="?modulo=aplicar_formulario_projeti&acao=adicionar&fk_projeti=<?php echo $projetis->getIdProjeti()?>" class="small-box-footer">Aplicar Formulário Avaliativo <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php
    };?>
  <?php endif;?>
</div>
</tbody>
</table>
     </div><!-- /.container-fluid -->
   </section>
 </div>
