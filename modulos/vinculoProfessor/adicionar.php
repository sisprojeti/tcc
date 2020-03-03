<?php
include_once('classes/class.refProfTurma.php');

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
    <div class="container col-lg-8">
    <section class="content">
      <div class="container-fluid">
         <form role="form" id="form_vincProfessor" action="#" method="POST">
           <div class="form-group">
             <label>Turma</label>
             <select class="form-control" name="turma_id" id="turma_id" required autofocus>
               <?php if(isset($listarTurmas)):?>
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
                <div class="form-group">
                  <input type="submit" name="button" value="Salvar" class="btn btn-primary" >
                  <button type="reset" class="btn btn-danger ">Limpar</button>
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
