<?php
  require_once('classes/class.exercicio.php');
    if(isset($_POST['button']) && $_POST['button'] === 'Salvar'){
      try{
        $exercicio = new Exercicio();
        $exercicio->setNomeAno($_POST['nome_ano']);
        $exercicio->setDataInicio($_POST['data_inicio']);
        $exercicio->setDataFim($_POST['data_fim']);
        $exercicio->adicionar();
      }catch(PDOExeption $e){
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
  <link rel="stylesheet" href="">
</head>
<body>
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cadastro de Exercicio</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cadastro de Exercicio</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header --->

    <!-- Main content -->
    <div class="container col-lg-8">
    <section class="content">
      <div class="container-fluid">

         <form role="form" id="form_exercicio" action="#" method="POST">
                  <div class="form-group">
                    <label>Ano</label>
                    <input type="text" class="form-control"  placeholder="Ex: 2019" name="nome_ano" id="nome_ano" required autofocus>
                  </div>
                  <div class="form-group">
                    <label>Data de Inicio</label>
                    <input type="date" class="form-control" name="data_inicio" id="data_inicio" required>
                  </div>
                  <div class="form-group">
                    <label>Data de Fim</label>
                    <input type="date" class="form-control" name="data_fim" id="data_fim" required>
                  </div>
                <!-- /.card-body -->

                <div class="form-group">
                  <input type="submit" name="button" value="Salvar" class="btn btn-primary" >
                  <button type="reset" class="btn btn-danger ">Limpar</button>
                </div>
              </form>


        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  </div>

  <script>
            $("#form_exercicio").validate({
       rules : {
             nome_ano:{
                    required:true
             },
             data_inicio:{
                    
                    required:true,
             },
             data_fim:{
                    
                    required:true,
             },                                  
       },
       messages:{
            nome_ano:{
                    required:"Por favor, informe o Ano de Exercicio"
             },
             data_inicio:{
                    required:"Por favor, informe a Data de Inicio"
             }, 
             data_fim:{
                    required:"Por favor, informe a Data de Fim"
             },  
       }

});


       </script>

</body>
</html>
