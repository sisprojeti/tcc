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
