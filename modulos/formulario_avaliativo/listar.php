<<<<<<< HEAD
<?php 
  include('classes/class.turma.php');
  include ('classes/class.exercicio.php');
 ?>
<?php

  try {
      $turmas = Turma::listar();
  } catch (Exception $e) {
    echo "ERROR:".$e->getMessage();
   }
?>
<!------------------------------------- MENU ----------------------------------->
<div style="padding: 1%;">
  <p style="font-family: sans-serif;font-size: 1.5em;">Formulário Avaliativo </p>  
</div>
<!------------------------------------- FILTO ----------------------------------->
<form name="FormConsulta" class="form-horizontal" action="" method="post" style="border-bottom: solid 1px #ccc;">
<div style="padding: 0 3%;">

    <div class="controls">
       Exercicío:  
    <select name='exercicio'>
        <option value=""> Todos </option>
        <?php
            $exercicios = Exercicio::listar();
            foreach ($exercicios as $c) {
                echo "<option value= '".$c->getIdExercicio()."'>".$c->getNomeAno()."</option>";
            }
        ?>            
    </select>
    </div>
    <input type="submit" name="btnBuscar" class="btn" value="buscar" style="background: #fd7e14;">
</div>
        
</form>

<?php  
    if(isset($_POST["exercicio"])){
        $exercicio = $_POST['exercicio'];
   }else{
        $exercicio=false;
    }
?>

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
<th scope="col">Etapa</th>
<th scope="col">Turno</th>
<th scope="col">Fomulário</th>
</tr>
</thead>
<tbody>
<?php
  $turmas = Turmas::listar($exercicio);
  foreach($turmas as $turma){ ?>
    <tr>
    <th scope="row"><?php echo $turma->getIdTurma();?></th>
    <td><?php echo $turma->getNomeTurma();?></td>
    <td><?php echo $turma->getCurso();?></td>
    <td><?php echo $turma->getEtapa();?></td>
    <td><?php echo $turma->getTurno();?></td>
    <td width=250>
      <a class="btn btn btn-success" href="?modulo=turma&acao=listagem_alunos_turma&id=<?php echo $turma->getIdTurma();?>">Cria Formulario </a>
      <a class="btn btn-warning" href="?modulo=turma&acao=editar&id=<?php echo $turma->getIdTurma();?>">Editar</a>
  </td>

    </tr>
<?php } ?>
</tbody>
</table>

</div>
 </div><!-- /.container-fluid -->
    </section>
  </div>
=======
<?php
require_once('classes/class.formulario_avaliacao.php');

try {
    $formulario_avaliacao = FormularioAvaliacao::listar();
} catch (Exception $e) {
  echo "ERROR:".$e->getMessage();
 }
?>

<style>
       .error{
             color:red
       }
</style>

<div>
  <br>
  <p> CADASTRAR GRUPO</p>
</div>
<br>
<div class="container col-lg-8">
 <div class="row">
<div class="col-sm">
</div>
<div class="col-sm-12">
  <form action="#" id="cad_grupos" method="POST">
    <div class="form-row">
      <div class="form-group col-lg-12">
      <div class="form-group">
      <label for="inputState">Turma</label>
      <input class="form-control" disabled value="<?php echo $turma_aluno->getNomeTurma();?>" type="text" name="turma" placeholder="trazer de forma autormatica">
      </div>
      <label for="inputEmail4">Tema do Projeti</label>
      <input type="text" class="form-control" id="projeti" placeholder="Insira o tema do projeti" name="tema" required>
     </div>
      <div class="form-group col-md-12">
        <label for="inputPassword4">Descrição</label>
        <textarea name="descricao" type="text" class="form-control" id="descricao" placeholder="Digite uma breve descrição do seu projeti" required></textarea>
      </div>
    </div>


     <div class="form-row">
       <div class="form-group col-md-12">
         <label for="inputState">Integrante 1</label>
         <select name="aluno_um" id="aluno_um" class="form-control" data-live-search="true" required>
           <?php $aluno_um = Aluno::recuperaIdAluno($_SESSION['fk_pessoa']);
           echo "<option value='".$aluno_um->getIdAluno()."'>".$aluno_um->getNomeAluno()."</option>";
           ?>
         </select>
       </div>
           <!-- <div class="form-group col-md-4">
             <label for="inputCity">Aluno</label>
             <input type="text" class="form-control" id="input_aluno_um">
           </div> -->

           <div class="form-group col-md-12">
             <label for="inputState">Integrante 2</label>
             <select name="aluno_dois" id="aluno_dois" class="form-control" data-live-search="true" required>
               <option value="">Selecione o Aluno</option>
               <?php
               $alunos = Aluno::listarAlunosTurma($turma_aluno->getIdTurma(),true);
               foreach($alunos as $aluno){
               ?>
                 <option value="<?php echo $aluno->getIdAluno();?>"><?php echo $aluno->recuperaPessoa()->getNome();?></option>
               <?php }?>
             </select>
           </div>
           <div class="form-group col-md-12">
             <label for="inputState">Integrante 3</label>
             <select name="aluno_tres" id="aluno_tres" class="form-control" data-live-search="true" required>
               <option value="">Selecione o ALuno</option>
               <?php
               $alunos = Aluno::listarAlunosTurma($turma_aluno->getIdTurma(),true);
               foreach($alunos as $aluno){
               ?>
                 <option value="<?php echo $aluno->getIdAluno();?>"><?php echo $aluno->recuperaPessoa()->getNome();?></option>
               <?php }?>
             </select>
           </div>
     </div>
<input type="submit" class="btn btn-primary" value="Cadastrar Grupo" name="cadastroGrupo">
 <input type="reset" class="btn btn-danger" value="Limpar">
  </form>
    </div>
    <div class="col-sm">
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
      <script>
            $("#cad_grupos").validate({
       rules : {
              tema:{
                    required:true,
                    minlength:6,
             },
             descricao:{
                    required:true,
                    minlength:6,
             },
              aluno_um:{
                    required:true,

             },
              aluno_dois:{
                    required:true,
             },
              aluno_tres:{
                    required:true,

             },
       },
       messages:{
            tema:{
                    required:"Por favor, insira o tema do projeti",
                    minlength:"No mínimo 6 letras",
             },
             descricao:{
                    required:"Por favor, informe a descricao",
                    minlength:"No mínimo 6 letras",
             },
             aluno_um:{
                    required:"Por favor, selecione um aluno",

             },
             aluno_dois:{
                    required:"Por favor, selecione um aluno",
             },
             aluno_tres:{
                    required:"Por favor, selecione um aluno",
             },
       }
});

</script>
>>>>>>> ae7b5d2c3d5d0c17bc3431c6ace23112989aa599
