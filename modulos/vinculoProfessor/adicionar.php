<?php
include_once('classes/class.refProfTurma.php'); 
include('classes/class.exercicio.php');

    if(isset($_POST['button']) && $_POST['button'] === 'Salvar'){
      try {
        $novaRefProfTurma = new RefProfTurma;
        $novaRefProfTurma->setIdProfessor($_POST['professor_id']);
        $novaRefProfTurma->setIdTurma($_POST['turma_id']);
        $novaRefProfTurma->adicionar();
      } catch (PDOException $e) {
        echo "error".$e->getMessage();
      }
    }

    try{
      include_once('classes/class.professor.php');
      $listarProfessores = Professor::listar();
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
            <h1 class="m-0 text-dark">Enturmar Professor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Enturmar Professor</li>
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
         <form role="form" id="form_vincProfessor" action="#" method="POST">
           <div class="form-group">
             <label>Turma</label>
             <select class="form-control" name="turma_id" id="turma_id" required autofocus>
               <?php 
                $listarTurmas = Turma::listar($exercicio);
                if(isset($listarTurmas)):
                ?>
                 <option value="">Selecione a Turma</option>
                 <?php foreach ($listarTurmas as $linha):?>
                   <option value="<?php echo $linha->getIdTurma();?>"><?php echo $linha->getNomeTurma();?></option>
                 <?php endforeach;?>
               <?php endif;?>
             </select>
           </div>
           <div class="form-group">
             <label>Professor</label>
             <select class="form-control" name="professor_id" id="professor_id" required>

               <?php if(isset($listarProfessores)):?>
                 <option value="">Selecione o Professor</option>
                 <?php foreach($listarProfessores as $professor):?>
                   <option value="<?php echo $professor->getIdProfessor();?>"> <?php echo $professor->getNomeProfessor();?> </option>
                 <?php endforeach;?>
               <?php endif;?>
             </select>
           </div>
                <div class="form-group"> <br>
                  <input type="submit" name="button" value="Salvar" class="btn btn-success" style="width: 20%;">
                </div>
              </form>
      </div>
    </section>
</div>

<script>
            $("#form_vincProfessor").validate({
       rules : {
              turma_id:{
                    required:true
             },
              professor_id:{

                    required:true,
             },
       },
       messages:{
              turma_id:{
                    required:"Por favor, informe a turma"
             },
              professor_id:{
                    required:"Por favor, informe o Professor"
             },
       }

});


       </script>

</body>
</html>
