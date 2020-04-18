<?php
include_once('Classes/class.usuario.php');
include_once('Classes/class.pessoa.php');
include_once('Classes/class.aluno.php');
include_once('Classes/class.turma.php');
include_once('Classes/class.projeti.php');
include_once('Classes/class.refAlunoProjeti.php');
//print_r($_SESSION);
$usuario = new Usuario($_SESSION['fk_pessoa']);
$pessoa = $usuario->recuperaPessoa();

$aluno_logado = new Aluno($_SESSION['fk_pessoa']);
$aluno = $aluno_logado->recuperaAluno();

//$turma = new Turma($_SESSION['fk_turma']);
$turma_aluno = Turma::recuperaTurmaAluno($_SESSION['fk_pessoa']);
//$aluno_projeti = RefAlunoProjeti::recuperaAlunoProjeti($_SESSION['fk_aluno']); //metodo pra recuperar o id do aluno que está logado




//echo $_SESSION['fk_pessoa'];
//print_r($turma_aluno);
//print_r($turma_aluno);

// echo "<pre>";
//print_r($_SESSION);
// echo "</pre>";
if(isset($_POST['cadastroGrupo']) && $_POST['cadastroGrupo'] === 'Cadastrar Grupo'){
  // $fk_aluno = Aluno::recuperaAluno($_SESSION['fk_pessoa']);
  // print_r($fk_aluno);
  // echo $fk_aluno->getIdAluno();

  $projeti = new Projeti();
  // echo ->getIdAluno();
  //print_r($fk_aluno);
  $projeti->setTema($_POST['tema']);
  $projeti->setDescricao($_POST['descricao']);
  $ultimoIdProjeti = $projeti->adicionar();

  $integranteProjeti_um = new RefAlunoProjeti();
  $integranteProjeti_um->setFkProjeti($ultimoIdProjeti);
  $integranteProjeti_um->setFkAluno($_POST['aluno_um']);//$aluno_projeti->getIdAlunoProjeti();//metodo pra retonar o id do aluno de projeti //não está retornando o id de quem está logado
  $integranteProjeti_um->adicionar();

  $integranteProjeti_dois = new RefAlunoProjeti();
  $integranteProjeti_dois->setFkProjeti($ultimoIdProjeti);
  $integranteProjeti_dois->setFkAluno($_POST['aluno_dois']);
  $integranteProjeti_dois->adicionar();

  $integranteProjeti_tres = new RefAlunoProjeti();
  $integranteProjeti_tres->setFkProjeti($ultimoIdProjeti);
  $integranteProjeti_tres->setFkAluno($_POST['aluno_tres']);
  $integranteProjeti_tres->adicionar();

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
         <label for="inputState">Escolha o Aluno</label>
         <select name="aluno_um" id="aluno_um" class="form-control" data-live-search="true" required>
           <option value="">Selecione o ALuno</option>
           <?php
           $alunos = Aluno::listarAlunosTurma($turma_aluno->getIdTurma());
           foreach($alunos as $aluno){
           ?>
             <option value="<?php echo $aluno->getIdAluno();?>"><?php echo $aluno->recuperaPessoa()->getNome();?></option>
           <?php }?>
         </select>
       </div>
           <!-- <div class="form-group col-md-4">
             <label for="inputCity">Aluno</label>
             <input type="text" class="form-control" id="input_aluno_um">
           </div> -->

           <div class="form-group col-md-12">
             <label for="inputState">Escolha o Aluno</label>
             <select name="aluno_dois" id="aluno_dois" class="form-control" data-live-search="true" required>
               <option value="">Selecione o Aluno</option>
               <?php
               $alunos = Aluno::listarAlunosTurma($turma_aluno->getIdTurma());
               foreach($alunos as $aluno){
               ?>
                 <option value="<?php echo $aluno->getIdAluno();?>"><?php echo $aluno->recuperaPessoa()->getNome();?></option>
               <?php }?>
             </select>
           </div>
           <div class="form-group col-md-12">
             <label for="inputState">Escolha o Aluno</label>
             <select name="aluno_tres" id="aluno_tres" class="form-control" data-live-search="true" required>
               <option value="">Selecione o ALuno</option>
               <?php
               $alunos = Aluno::listarAlunosTurma($turma_aluno->getIdTurma());
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
              projeti:{
                    required:true,
                    minlength:6,
                    accept: "[a-zA-Z]+",

             },
             descricao:{
                    required:true,
                    minlength:6,
                    accept: "[a-zA-Z]+",


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
            projeti:{
                    required:"Por favor, insira o tema do projeti",
                    minlength:"No mínimo 6 letras",
                    accept: "Cuidado! preencha o tema sem caracteres especiais",

             },
             descricao:{
                    required:"Por favor, informe a descricao",
                    minlength:"No mínimo 6 letras",
                    accept: "Cuidado! preencha a descricao sem caracteres especiais",
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
            jQuery.validator.addMethod("accept", function(value, element, param) {
              return value.match(new RegExp("." + param + "$"));
            });

       </script>
