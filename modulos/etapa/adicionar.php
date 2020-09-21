<?php
include_once("classes/class.etapa.php");
    try {
    if(isset($_POST["button"]) && ($_POST["button"] === "Salvar")){

       $etapa = new Etapa();
       $etapa->setNome($_POST['nome']);
       $etapa->setOrdem($_POST['ordem']);
       if(isset($_POST['status_etapa'])){
        $etapa->setStatusEtapa(true);
       }else{
        $etapa->setStatusEtapa(false);
       }
       $etapa->adicionar();
    }
  } catch (PDOException $e) {
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
       <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>
<body>
  
  <div class="content-header navbar-white">
          <div class="container-fluid navbar-white">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Cadastro Etapa</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Cadastro Etapa</li>
                </ol>
              </div>
            </div>
          </div>
    </div>
    <!-- Main content -->
<div class="container col-lg-12 navbar-white">
<div class="container col-lg-8 navbar-white">
<section class="content navbar-white">
<div class="container-fluid navbar-white">
 <form role="form" id="form_etapa" action="#" method="POST">
  <br>
<div class="form-group">
  <label>Nome</label>
  <input type="text" class="form-control"  placeholder="Ex: 1 SEMESTRE" name="nome" id="nome" required autofocus>
</div>
<div class="form-group">
  <label>Ordem</label>
  <input type="text" class="form-control" name="ordem" id="ordem" placeholder="Ex: 1" required> 
</div>
<div class="form-group">
    <label>Situação</label><br>
    <input type="checkbox" name="status_etapa" data-toggle="toggle" data-on="Ativo" data-off="Não Ativo" data-onstyle="success" data-offstyle="danger">
    
</div>
 </div>
<br>
                <!-- /.card-body -->

                <div class="form-group navbar-white"  style="text-align: center;">
                  <input style="width: 20%;" type="submit" name="button" value="Salvar" class="btn btn-success" >
                </div>
              </form>


        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    </div>
    </div>
    <script>
            $("#form_etapa").validate({
       rules : {
              nome:{
                    required:true,
                    accept: "[a-zA-Z]+",
             },
             ordem:{
                    
                    required:true,
             },
             status_etapa:{
                    
                    required:true,
             },                                  
       },
       messages:{
            nome:{
                    required:"Por favor, informe o nome da etapa",
                    accept: "Cuidado! preencha o nome sem caracteres especiais"
             },
             ordem:{
                    required:"Por favor, informe a ordem"
             }, 
             status_etapa:{
                    required:"Por favor, informe o status"
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
    