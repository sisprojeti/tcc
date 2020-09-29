<?php
include_once('classes/class.refAvaFormulario.php');
include('classes/class.exercicio.php');

if(isset($_POST['button']) && $_POST['button'] === 'Salvar'){
  try {
    $novaRefAvaliadorProjeti = new RefAvaFormulario;
    $novaRefAvaliadorProjeti->setFkProfessor($_POST['fk_professor']);
    $novaRefAvaliadorProjeti->setFkProjeti($_POST['fk_projeti']);
    $novaRefAvaliadorProjeti->setFkFormularioAvaliacao($_POST['fk_formulario_avaliacao']);
    $novaRefAvaliadorProjeti->adicionar();
  } catch (PDOException $e) {
    echo "ERROR".$e->getMessage();
  }
}

try{
  include_once('classes/class.turma.php');
    $listarTurmas = Turma::listar();
} catch (PDOException $e) {
    echo "ERROR".$e->getMessage();
}

try {
  include_once('classes/class.formulario_avaliacao.php');
  $listarFormularios = FormularioAvaliacao::listar();
} catch (PDOExeption $e) {
  echo "ERROR".$e->getMessage();
}

try {
    include('classes/class.professor.php');
    $professores = Professor::listar();
} catch (Exception $e) {
  echo "ERROR:".$e->getMessage();
 }

 try {
     $projetis = Projeti::listar();
 } catch (Exception $e) {
   echo "ERROR:".$e->getMessage();
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
            <h1 class="m-0 text-dark">Vincular Avaliador ao Formulário Avaliativo</h1>
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
             <label>Professor</label>
             <select class="form-control" name="fk_professor" required>
                <option value="">Selecione o Professor</option>
               <?php
                if(isset($professores)):
                ?>
                 <?php foreach($professores as $professor):?>
                   <option value="<?php echo $professor->getIdProfessor();?>"> <?php echo $professor->getNomeProfessor();?> </option>
                 <?php endforeach;?>
               <?php endif;?>
             </select>
           </div>
           <div class="form-group">
             <label>Projete</label>
             <select class="form-control" name="fk_projeti" required>
                <option value="">Selecione o Projete</option>
               <?php
                if(isset($projetis)):
                ?>
                 <?php foreach($projetis as $projeti):?>
                   <option value="<?php echo $projeti->getIdProjeti();?>"> <?php echo $projeti->getTemaProjeti();?> </option>
                 <?php endforeach;?>
               <?php endif;?>
             </select>
           </div>
           <div class="form-group">
             <label>Formulário</label>
             <select class="form-control" name="fk_formulario_avaliacao" required autofocus>
              <option value="">Selecione o Formulário</option>
               <?php if(isset($listarFormularios)):?>
                 <?php foreach ($listarFormularios as $formulario):?>
                   <?php //if($aluno->getSituacaoAluno()):?>
                   <option value="<?php echo $formulario->getIdFormularioAvaliacao();?>"><?php echo $formulario->getNomeFormulario();?></option>
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
