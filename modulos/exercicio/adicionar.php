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

         <form role="form" action="#" method="POST">
                  <div class="form-group">
                    <label>Ano</label>
                    <input type="text" class="form-control"  placeholder="Ex: 2019" name="nome_ano">
                  </div>
                  <div class="form-group">
                    <label>Data de Inicio</label>
                    <input type="date" class="form-control" name="data_inicio">
                  </div>
                  <div class="form-group">
                    <label>Data de Fim</label>
                    <input type="date" class="form-control" name="data_fim">
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
