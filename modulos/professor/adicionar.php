<?php
include_once("classes/class.professor.php");
include_once("classes/class.pessoa.php");
    try {
    if(isset($_POST["button"]) && ($_POST["button"] === "Salvar")){
       $pessoa = new Pessoa();
       $pessoa->setNome($_POST['nome']);
       $pessoa->setEmail($_POST['email']);
       $pessoa->setCpf($_POST['cpf']);
       $pessoa->setTelefone($_POST['telefone']);
       $ultimoIdPessoa = $pessoa->adicionar();

       $professor = new Professor();
       $professor->setPessoaId($ultimoIdPessoa);
       $professor->setDataCadastro($_POST['data_cadastro']);
       $professor->adicionar();
    }
  } catch (PDOException $e) {
      echo "ERROR".$e->getMessage();
  }

?>

<div class="content-header navbar-white">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cadastro Professor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cadastro Professor</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header --->
<div class="container col-lg-12 navbar-white">
<div class="container col-lg-8 navbar-white">
    <!-- Main content -->
    <section class="content navbar-white">
      <div class="container-fluid">

        <form role="form" action="#" method="POST">
                 <div class="form-group">
                   <label>Nome</label>
                   <input type="text" name="nome" class="form-control"  placeholder="Insira o Nome Completo">
                 </div>
                 <div class="form-group">
                   <label>Email</label>
                   <input type="email" class="form-control" name="email" placeholder="Insira o E-mail">
                 </div>
                 <div class="form-group">
                   <label>CPF</label>
                   <input type="text" class="form-control" name="cpf" placeholder="Insira o CPF">
                 </div>
                 <div class="form-group">
                   <label>Celular</label>
                   <input type="tel" class="form-control" name="telefone" placeholder="Insira o Celular">
                 </div>
                 <div class="form-group">
                   <label>Data Cadastro</label>
                   <input type="date" class="form-control" name="data_cadastro">
                 </div>
               <!-- /.card-body -->

               <div class="form-group navbar-white">
                 <input type="submit" name="button" value="Salvar" class="btn btn-primary" >
                 <button type="reset" class="btn btn-danger ">Limpar</button>
               </div>
               <br>
             </form>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
</div>