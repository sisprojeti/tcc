<?php
  require_once('classes/class.criterio.php');
    if(isset($_POST['button']) && $_POST['button'] === 'Salvar'){
      try{
        $exercicio = new Criterio();
        $exercicio->setNomeCriterio($_POST['nome']);
        $exercicio->setValorMaximo($_POST['valor_maximo']);
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
      <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
      <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

       <script type="text/javascript">
  $(document).ready(function(){
    $("#valor_maximo").mask("0000000000");
  });
</script>
</head>
<body>

  <div class="content-header navbar-white">
          <div class="container-fluid navbar-white">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Adicionar Critérios</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active">Adicionar Critérios</li>
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
       <form role="form" id="form_criterios" action="#" method="POST">
        <br>
      <div class="form-group">
        <label>Nome</label>
        <input type="text" class="form-control"  placeholder="Ex: Critério 1" name="nome" id="nome" required autofocus>
      </div>
      <div class="form-group">
        <label>Valor Máximo</label>
        <input type="text" class="form-control" name="valor_maximo" id="valor_maximo" placeholder="Ex: 1" required>
      </div>
       </div>
        <br>
                <!-- /.card-body -->

                <div class="form-group navbar-white">
                  <input type="submit" name="button" value="Salvar" class="btn btn-success" >
                  <button type="reset" class="btn btn-danger ">Limpar</button>
                </div>
              </form>


        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    </div>
    </div>
    <script>
            $("#form_criterios").validate({
       rules : {
              nome:{
                    required:true,
                    accept: "[a-zA-Z]+",
             },
             valor_maximo:{

                    required:true,
             },
       },
       messages:{
            nome:{
                    required:"Por favor, informe o nome do critério",
                    accept: "Cuidado! preencha o nome sem caracteres especiais"
             },
             valor_maximo:{
                    required:"Por favor, informe o valor máximo"
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
