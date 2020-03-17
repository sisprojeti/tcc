<?php
include_once('Classes/class.usuario.php');
include_once('Classes/class.pessoa.php');
include_once('Classes/class.aluno.php');
include_once('Classes/class.turma.php');
include_once('Classes/class.projeti.php');
include_once('Classes/class.refAlunoProjeti.php');
//print_r($_SESSION);
$usuario = new Usuario($_SESSION['fk_pessoa']);
//$turma = new Turma($_SESSION['fk_turma']);
$turma_aluno = Turma::recuperaTurmaAluno($_SESSION['fk_pessoa']);
//$aluno_projeti = RefAlunoProjeti::recuperaAlunoProjeti($_SESSION['fk_aluno']);

//echo $_SESSION['fk_pessoa'];
//print_r($turma_aluno);
//print_r($turma_aluno);
$pessoa = $usuario->recuperaPessoa();
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
  $integranteProjeti_um->setFkAluno($pessoa->getIdPessoa()); //não está retornando o id de quem está logado
  $integranteProjeti_um->adicionar();

  $integranteProjeti_dois = new RefAlunoProjeti();
  $integranteProjeti_dois->setFkProjeti($ultimoIdProjeti);
  $integranteProjeti_dois->setFkAluno($_POST['aluno_um']);
  $integranteProjeti_dois->adicionar();

  $integranteProjeti_tres = new RefAlunoProjeti();
  $integranteProjeti_tres->setFkProjeti($ultimoIdProjeti);
  $integranteProjeti_tres->setFkAluno($_POST['aluno_dois']);
  $integranteProjeti_tres->adicionar();

}


?>
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
  <form action="#" method="POST">
    <div class="form-row">
      <div class="form-group col-lg-12">
      <div class="form-group">
      <label for="inputState">Turma</label>
      <input class="form-control" disabled value="<?php echo $turma_aluno->getNomeTurma();?>" type="text" name="turma" placeholder="trazer de forma autormatica">
      </div>
      <label for="inputEmail4">Tema do Projeti</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Insira o tema do projeti" name="tema">
     </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Descrição</label>
        <input name="descricao" type="text" class="form-control" id="inputPassword4" placeholder="Digite uma breve descrição do seu projeti">
      </div>
    </div>

    <div class="form-group">
        <label for="inputAddress2">Nome Integrante</label>
        <input type="text" disabled class="form-control" value="<?php echo $pessoa->getNome();?>" id="inputAddress2" placeholder="Digite o nome do integrante do grupo">
     </div>
     <div class="form-row">
           <!-- <div class="form-group col-md-4">
             <label for="inputCity">Aluno</label>
             <input type="text" class="form-control" id="input_aluno_um">
           </div> -->

           <div class="form-group col-md-12">
             <label for="inputState">Escolha o Aluno</label>
             <select name="aluno_um" id="aluno_um" class="form-control" data-live-search="true">
               <option value="">Selecione o ALuno</option>
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
             <select name="aluno_dois" id="aluno_dois" class="form-control" data-live-search="true">
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
