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
         <form role="form" action="#" method="POST">
           <div class="form-group">
             <label>Turma</label>
             <select class="form-control" name="fk_turma">
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
             <select class="form-control" name="fk_aluno">
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
