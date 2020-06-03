<?php
include_once('classes/class.refCoordenadorCurso.php');

if(isset($_POST['button']) && $_POST['button'] === 'Salvar'){
  try {
    $novaRefCoordCurso = new RefCoordenadorCurso;
    $novaRefCoordCurso->setIdCursoRefCoordenador($_POST['fk_curso']);
    $novaRefCoordCurso->setIdCoordenadorRefCurso($_POST['fk_coordenador']);
    $novaRefCoordCurso->adicionar();
  } catch (PDOException $e) {
    echo "ERROR".$e->getMessage();
  }
}

try{
    include_once('classes/class.coordenador.php');
    $listarCoordenadores = Coordenador::listar();
} catch (PDOException $e) {
    echo "ERROR".$e->getMessage();
}

try {
  include_once('classes/class.curso.php');
  $listarCursos = Curso::listar();
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
            <h1 class="m-0 text-dark">Vincular Coordenador</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vincular Cordenador</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
<br>
    <div class="container col-lg-8">
    <section class="content">
      <div class="container-fluid">
         <form role="form" id="form_vincCoordenador" action="#" method="POST">
           <div class="form-group">
             <label>Coordenador</label>
             <select class="form-control" name="fk_coordenador" required autofocus>
              <option value="">Selecione a Coordenador</option>
               <?php if(isset($listarCoordenadores)):?>
                 <?php foreach ($listarCoordenadores as $coordenador):?>
                   <option value="<?php echo $coordenador->getIdCoordenador();?>"><?php echo $coordenador->getNome();?></option>
                 <?php endforeach;?>
               <?php endif;?>
             </select>
           </div>
           <div class="form-group">
             <label>Curso</label>
             <select class="form-control" name="fk_curso" required>
                <option value="">Selecione o Curso</option>
               <?php if(isset($listarCursos)):?>
                 <?php foreach($listarCursos as $curso):?>
                   <option value="<?php echo $curso->getIdCurso();?>"> <?php echo $curso->getNomeCurso();?> </option>
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

