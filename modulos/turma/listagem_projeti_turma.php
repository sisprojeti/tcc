<?php
include('classes/class.turma.php');
include('classes/class.aluno.php');
include('classes/class.pessoa.php');
include('classes/class.professor.php');
?>
<?php
  try {
        $projetisTurma = Turma::listarProjetiTurma($_GET['id']);
        mostrar($projetisTurma);
  } catch (Exception $e) {
    echo "ERROR:".$e->getMessage();
   }

   try {
       $alunosProjeti = Turma::alunosProjeti($_GET['id']);
   } catch (Exception $e) {
     echo "ERROR:".$e->getMessage();
    }

    try {
        $professorAvaForm = Professor::listarProjetisVinculados($_SESSION['fk_pessoa'],$_GET['id']);
    } catch (Exception $e) {
      echo "ERROR:".$e->getMessage();
     }
?>
<!------------------------------------- MENU ----------------------------------->
<div class="area_menu">
  <p></p>
   <p class="texto-area">Grupos da Turma - SIS01 </p>
    <div><a href="index.php?modulo=turma&acao=listar" class="btn btn-secondary">Voltar</a> </div>
</div>

<!------------------------------------- TABELA ----------------------------------->

<style type="text/css">


.topoturma{
  background: #fd7e14;
  border-radius: 10px 10px 0px 0px;
  height: 4%;
  font-size: 1.3em;
  color: #f4f4f4;
  padding: 2px 0px;
}
.corpo{
  margin: auto;
  width: 96%;
  border-radius: 10px 10px 10px 10px;
  box-shadow: 7px 7px 7px  rgba(0, 0, 0, 0.15), -7px -7px 7px rgba(0, 0, 0, 0.15);

}
.flex{
  display: flex;
  justify-content: space-between;
  padding: 0px 1%;
  font-size: 1em;
}
.rodapeturma{
  background: #f4f4f4;
  border-radius: 10px;
  border-radius: 0px 0px 10px 10px;
  height: 4%;
  font-size: 1.3em;
  color: #000;
  padding: 2px 0px;
}

</style>
<!------------------------------------- TEXTO ----------------------------------->
<div class="area_menu">
  <p class="texto-area">Lançar Notas</p>
   <p> </p>
   <p></p>
</div>
<!------------ APRESENTAÇÃO --------------->
<div class="controls corpo">
  <p class="topoturma"> NOME DA TURMA</p>
<div class="controls flex">
<!------------ AVALIADORES ---------------->
  <div>
    <p><b>Avaliadores:</b></p>
    <ul>
      <li> aaa</li>
      <li> aaa</li>
      <li> aaa</li>
    </ul>
  </div>
<!--------------- DATA --------------------->
  <div>
    <p> <b>Data: 30/08/2020 </b></p>
  </div>
</div>
<p class="rodapeturma"> NOME DO TEMA</p>
</div>
<br>
<!------------------------------------- NOTAS ----------------------------------->
<div class="controls corpo " >
  <p class="topoturma"> NOTAS</p>
<div class="controls flex ">
<!-------------- TABELA ---------------->
<table class="table table-bordered">
<thead>
  <tr>
  <th width=35% scope="col">Critérios</th>
  <th scope="col">Aluno 1</th>
  <th scope="col">Aluno 2</th>
  <th scope="col">Aluno 3</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>Critério 1</td>
    <td>Nota = Aluno 1</td>
    <td>Nota = Aluno 2</td>
    <td>Nota = Aluno 3</td>
  </tr>
 <tr>
    <td>Critério 2</td>
    <td>Nota = Aluno 1</td>
    <td>Nota = Aluno 2</td>
    <td>Nota = Aluno 3</td>
  </tr>
  <tr>
    <td>Critério 3</td>
    <td>Nota = Aluno 1</td>
    <td>Nota = Aluno 2</td>
    <td>Nota = Aluno 3</td>
  </tr>
</tbody>
<tfoot>
  <td style="text-align: right;"> <b> Nota </b></td>
  <td>Média Total</td>
  <tr></tr>
  <th></th>
  <th></th>
  <th></th>
  <td style="text-align: right;"><button type="button" class="btn btn-success">Salvar</button></td>
</tfoot>
  
</table>
</div>
</div>


<div class="container col-lg-12 navbar-white">
   <section class="content navbar-light navbar-white">
     <div class="container-fluid navbar-white ">
<table class="table table-striped"style="margin-top:10px;">
<tbody>
  <div class="row">
      <?php if(isset($professorAvaForm)):?>
        <?php foreach ($professorAvaForm as $projetis){?>
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-light">
                  <div class="inner">
                    <h4><b> <?= $projetis->getTemaProjeti();?> </b></h4>
                    <?php if(isset($projetis)):?>
                      <?php $alunosProjeti = Turma::alunosProjeti($projetis->getIdProjeti());
                      foreach ($alunosProjeti as $alunoProjeti) {
                        echo "<br>";
                        echo strtoupper($alunoProjeti->getNome())."<br>";
                      }
                      ?>
                    <?php endif;?>
                  </div>
                  <div class="icon">
                    <i class="icon ion-ios-people"></i>
                  </div>
                  <a href="?modulo=aplicar_formulario_projeti&acao=adicionar&fk_projeti=<?php echo $projetis->getIdProjeti()?>" class="small-box-footer"> Aplicar Formulário <i class="fas fa-play-circle"></i></a>
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
