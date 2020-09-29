<?php

  require_once('classes/class.curso.php');

  if(isset($_POST['button']) && $_POST['button'] === 'Salvar'){
    try{
      $curso = new Curso();
      $curso->setNome($_POST['nome']);
      $curso->setSigla($_POST['sigla']);
      $curso->setAnoTotal($_POST['ano_total']);
      $curso->setCargaHoraria($_POST['carga_horaria']);
      if(isset($_POST['status_curso'])){
        $curso->setStatusCurso(true);
       }else{
        $curso->setStatusCurso(false);
       }
      $curso->adicionar();
    }catch(PDOException $e){
      echo "ERROR".$e->getMessage();
    }
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
       <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

  <link rel="stylesheet" href="">
</head>
<body>
  
<div class="content-header navbar-white">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cadastro de Curso</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cadastro de Curso</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header --->

    <!-- Main content -->
<div class="container col-lg-12 navbar-white">
<div class="container col-lg-8 navbar-white">
<section class="content">
<div class="container-fluid">
<form role="form" id="form_curso" action="#" method="POST">
<div class="form-group">
  <label>Nome</label>
  <input type="text" class="form-control"  placeholder="Nome do Curso" name="nome" id="nome" required autofocus>
</div>
<div class="form-group">
  <label>Sigla</label>
  <input type="text" class="form-control" name="sigla" id="sigla" placeholder="Sigla" required>
</div>
<div class="form-group">
  <label>Ano Total</label>
<div class="input-group mb-2">
<div class="input-group-prepend ">
  <div class="input-group-text">ANO</div>
</div>
  <input type="text" class="form-control col-lg-12" name="ano_total" id="ano_total" placeholder="Ex: 1 " required>
</div>
</div>
<div class="form-group">
  <label>Carga Horária</label>
  <div class="input-group mb-2">
    <div class="input-group-prepend">
      <div class="input-group-text">HORAS</div>
    </div>
  <input type="text" class="form-control col-lg-12" name="carga_horaria" id="carga_horaria"  placeholder="Carga Horária " required>
</div>
</div>
<div class="form-group">
      <label>Situação</label><br>
  <input type="checkbox" name="status_curso" data-toggle="toggle" data-on="Ativo" data-off="Não Ativo" data-onstyle="success" data-offstyle="danger">

 </div>
   <!-- /.card-body -->

                <div class="form-group navbar-white" style="text-align: center;">
                  <br>
                  <input style="width: 20%;" type="submit" name="button" value="Salvar" class="btn btn-success" >
                </div>
              </form>


        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
    </div>

    <script>
            $("#form_curso").validate({
       rules : {
              nome:{
                    required:true,
                    accept: "[a-zA-Z]+",
             },
             sigla:{
                    
                    required:true,
             },
             ano_total: {
                    required: true,
             },
             carga_horaria: {
                    required: true,

             },                                    
       },
       messages:{
            nome:{
                    required:"Por favor, informe o nome do curso",
                    accept: "Cuidado! preencha o nome sem caracteres especiais"
             },
             sigla:{
                    required:"Por favor, informe a Sigla do Curso"
             },
            ano_total:{
                    required:"Por favor, informe o Ano Total"
             },
              carga_horaria:{
                    required:"Por favor, insira a Carga Horária do Curso"
             },    
       }

});

        //NOME
            jQuery.validator.addMethod("accept", function(value, element, param) {
              return value.match(new RegExp("." + param + "$"));
            });

       </script>


</body>
</html>
