<?php
  include('classes/class.turma.php');
  include('classes/class.exercicio.php');
  include('classes/class.curso.php');
  include('classes/class.refFormularioCriterio.php');
  include('classes/class.RefFormularioAvaliacaoProjeti.php');
  include('classes/class.formulario_avaliacao.php');
 ?>
<?php
    try {
        $formularios_avaliacao = FormularioAvaliacao::listar();
    } catch (Exception $e) {
      echo "ERROR:".$e->getMessage();
     }

     //CONSULTA DE PROJETIS
     // try {
     //     $projetis = Projeti::listar();
     //     foreach ($projetis as $projeti) {
     //       echo "<pre>";
     //       print_r($projeti);
     //       echo "</pre>";
     //     }
     // } catch (Exception $e) {
     //   echo "ERROR:".$e->getMessage();
     //  }
?>

<!------------------------------------- MENU ----------------------------------->
<div class="area_menu">
  <p></p>
   <p class="texto-area">Formulários Avaliativos Por Turma</p>
    <div><a href="index.php?modulo=turma&acao=adicionar" class="btn btn-success">Adicionar</a> </div>
</div>

<!------------------------------------- TABELA ----------------------------------->
<div class="container col-lg-12 navbar-white">
   <section class="content navbar-light navbar-white">
     <div class="container-fluid navbar-white ">
<table class="table table-striped"style="margin-top:10px;">
<tbody>
  <div class="row">
  <?php if(isset($formularios_avaliacao)):?>
    <?php foreach ($formularios_avaliacao as $formulario_avaliacao){?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h4> <?= $formulario_avaliacao->getNomeTurma();?></h4>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Relatorios <i class="fas fa-arrow-circle-right"></i></a>
              <a href="?modulo=formulario_avaliativo&acao=detalhe_formulario&id_formulario_avaliacao=<?php echo $formulario_avaliacao->getIdFormularioAvaliacao();?>&fk_turma=<?php echo $formulario_avaliacao->getFkTurma();?>" class="small-box-footer">Editar Formulário <i class="fas fa-arrow-circle-right"></i></a>
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
