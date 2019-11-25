<?php
include_once("classes/class.etapa.php");
    try {
    if(isset($_POST["button"]) && ($_POST["button"] === "Salvar")){

       $etapa = new Etapa();
       $etapa->setNome($_POST['nome']);
       $etapa->setOrdem($_POST['ordem']);
       $etapa->setStatusEtapa($_POST['status_etapa']);
       $etapa->adicionar();
    }
  } catch (PDOException $e) {
      echo "ERROR".$e->getMessage();
  }
?>
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

         <form role="form" action="#" method="POST">
          <br>
                  <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control"  placeholder="Ex: 1 SEMESTRE" name="nome">
                  </div>
                  <div class="form-group">
                    <label>Ordem</label>
                    <input type="text" class="form-control" name="ordem" placeholder="Ex: 1">
                  </div>
                  <div class="form-group">
                    <label>Ativo: </label>
                   <input type="checkbox" name="status_etapa" value="true" id="ativo">
                  </div> <br>
                <!-- /.card-body -->

                <div class="form-group navbar-white">
                  <input type="submit" name="button" value="Salvar" class="btn btn-primary" >
                  <button type="reset" class="btn btn-danger ">Limpar</button>
                </div>
              </form>


        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    </div>
    </div>
