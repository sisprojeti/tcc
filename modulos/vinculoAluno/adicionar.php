<?php
include_once('classes/class.refAlunoTurma.php');
include('classes/class.exercicio.php');

if(isset($_POST['button']) && $_POST['button'] === 'Salvar'){
  try {
    $novaRefCoordCurso = new RefAlunoTurma;
    $novaRefCoordCurso->setFkAluno($_POST['fk_aluno']);
    $novaRefCoordCurso->setFkTurma($_POST['fk_turma']);
    $novaRefCoordCurso->adicionar();
  } catch (PDOException $e) {
    echo "ERROR".$e->getMessage();
  }
}

try{
    include_once('classes/class.aluno.php');
    $listarAlunos = Aluno::listar();
} catch (PDOException $e) {
    echo "ERROR".$e->getMessage();
}

try {
  include_once('classes/class.turma.php');
  $listarTurmas = Turma::listar();
} catch (PDOExeption $e) {
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
            <h1 class="m-0 text-dark">Enturmar Aluno</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Enturmar Aluno</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
<br>
<!------------------------------------- FILTO ----------------------------------->
<form name="FormConsulta" class="form-horizontal" action="" method="post">
<div style="padding: 0 3%; width: 100%; display:flex; justify-content: center;">
    <div class="controls" style="display:flex; width: 30%; align-content: center; justify-content: space-around;">
       <p> Exercicío: </p>
    <select class="form-control col-md-8"  name='exercicio'>
        <option value=""> Todos </option>
        <?php
            $exercicios = Exercicio::listar();
            foreach ($exercicios as $c) {
              if($_POST['exercicio']==$c->getIdExercicio()){
                echo "<option selected value= '".$c->getIdExercicio()."'>".$c->getNomeAno()."</option>";
              } else {
                 echo "<option value= '".$c->getIdExercicio()."'>".$c->getNomeAno()."</option>";
              }
            }
        ?>
    </select>
    </div>
    <div  class="controls" style="display:flex; width: 25%; justify-content: space-around;">
      <input type="submit" name="btnBuscar" value="Buscar" class="btn btn-warning" style="flex-grow: 0.3;" >
    </div>
</div>
<br>
</form>
<?php
    if(isset($_POST["exercicio"])){
        $exercicio = $_POST['exercicio'];
   }else{
        $exercicio=false;
    }
?>
    <div class="container col-lg-8">
    <section class="content">
      <div class="container-fluid">
         <form role="form" id="form_vincCoordenador" action="#" method="POST">
           <div class="form-group">
             <label>Turma</label>
             <select class="form-control" name="fk_turma" required>
                <option value="">Selecione a Turma</option>
               <?php 
                $listarTurmas = Turma::listar($exercicio);
                if(isset($listarTurmas)):
                ?>
                 <?php foreach($listarTurmas as $turma):?>
                   <option value="<?php echo $turma->getIdTurma();?>"> <?php echo $turma->getNomeTurma();?> </option>
                 <?php endforeach;?>
               <?php endif;?>
             </select>
           </div>
           <div class="form-group">
             <label>Aluno</label>
             <select class="form-control" name="fk_aluno" required autofocus>
              <option value="">Selecione o Aluno</option>
               <?php if(isset($listarAlunos)):?>
                 <?php foreach ($listarAlunos as $aluno):?>
                   <?php //if($aluno->getSituacaoAluno()):?>
                   <option value="<?php echo $aluno->getIdAluno();?>"><?php echo $aluno->getNomeAluno();?></option>
                 <?php// endif;?>
                 <?php endforeach;?>
               <?php endif;?>
             </select>
           </div>
                <div class="form-group"> <br>
                  <input style="width: 20%;" type="submit" name="button" value="Salvar" class="btn btn-success" >
                </div>
              </form>
      </div>
    </section>
</div>
<script>
            $("#form_vincCoordenador").validate({
       rules : {
              fk_coordenador:{
                    required:true
             },
             fk_curso:{

                    required:true,
             },
       },
       messages:{
              fk_coordenador:{
                    required:"Por favor, informe a Coordenador"
             },
              fk_curso:{
                    required:"Por favor, informe o Curso"
             },
       }

});


       </script>
</body>
</html>
