<?php

  require_once('classes/class.curso.php');

  if(isset($_POST['button']) && $_POST['button'] === 'Salvar'){
    try{
      $curso = new Curso();
      $curso->setNome($_POST['nome']);
      $curso->setSigla($_POST['sigla']);
      $curso->setAnoTotal($_POST['ano_total']);
      $curso->setCargaHoraria($_POST['carga_horaria']);
      $curso->setStatusCurso($_POST['status_curso']);
      $curso->adicionar();
    }catch(PDOException $e){
      echo "ERROR".$e->getMessage();
    }
  }

?>
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

         <form role="form" action="#" method="POST">
                  <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control"  placeholder="Nome do Curso" name="nome">
                  </div>
                  <div class="form-group">
                    <label>Sigla</label>
                    <input type="text" class="form-control" name="sigla"  placeholder="Sigla">
                  </div>
                  <div class="form-group">
                    <label>Ano Total</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">ANO</div>
                      </div>
                      <input type="text" class="form-control" name="ano_total"  placeholder="Ex: 1 ">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Carga Horária</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">HORAS</div>
                      </div>
                      <input type="text" class="form-control" name="carga_horaria"  placeholder="Carga Horária ">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Status Curso: </label> </br>
                    Ativo: <input type="checkbox" name="status_curso" value="true" id="ativo">
                  </div>
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
