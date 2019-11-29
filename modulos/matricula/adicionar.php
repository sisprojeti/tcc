<?php
include_once('classes/class.matricula.php');

    if(isset($_POST['button']) && $_POST['button'] === 'Salvar'){
      try {
        $matricula = new Matricula;
        $matricula->setTurmaId($_POST['fk_turma']);
        $matricula->setAlunoId($_POST['fk_aluno']);
        $matricula->adicionar();
      } catch (PDOException $e) {
        echo "error".$e->getMessage();
      }
    }

    try{
      include_once('classes/class.aluno.php');
      $listarAlunos = Aluno::listar();
    }catch(PDOException $e){
      echo "ERROR".$e->getMessage();
    }

    try{
      include_once('classes/class.turma.php');
      $listarTurmas = Turma::listar();
    }catch(PDOException $e){
      echo "ERROR".$e->getMessage();
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <style>
       .error{
             color:red
       }
</style>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <link rel="stylesheet" href="">
</head>
<body>
  
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Matricula</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cadastro Acadêmicos</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
<br>
      <div class="container col-lg-12 navbar-white">
      <div class="container col-lg-8 navbar-white">
    <section class="content">
      <div class="container-fluid">
         <form role="form" id="form_matricula" action="#" method="POST">
           <div class="form-group">
             <label>Turma</label>
             <select class="form-control" name="fk_turma" id="fk_turma">
               <option value="">Selecione o Exercicio da Turma</option>
               <?php if(isset($listarTurmas)):?>
                 <?php foreach ($listarTurmas as $linha):?>
                     <option value="<?php echo $linha->getIdTurma();?>"><?php echo $linha->getNomeTurma();?></option>
                 <?php endforeach;?>
               <?php endif;?>
             </select>
           </div>
           <div class="form-group">
             <label>Aluno</label>
             <select class="form-control" name="fk_aluno" id="fk_aluno">
               <option value="">Selecione o Aluno</option>
               <?php if(isset($listarAlunos)):?>
                 <?php foreach ($listarAlunos as $aluno):?>
                     <option value="<?php echo $aluno->getIdAluno();?>"><?php echo $aluno->getNomeAluno();?></option>
                 <?php endforeach;?>
               <?php endif;?>
             </select>
           </div>

                <div class="form-group">
                  <input type="submit" name="button" value="Salvar" class="btn btn-primary" >
                  <button type="reset" class="btn btn-danger ">Limpar</button>
                </div>
              </form>
      </div>
    </section>
  </div>
</div>

<script>
            $("#form_matricula").validate({
       rules : {
              fk_turma:{
                    required:true
             },
             fk_aluno:{
                    
                    required:true,
             },                                  
       },
       messages:{
              fk_turma:{
                    required:"Por favor, informe a turma"
             },
              fk_aluno:{
                    required:"Por favor, informe o Aluno"
             },  
       }

});


       </script>
</body>
</html>

