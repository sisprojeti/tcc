<?php
include_once("classes/class.aluno.php");
include_once("classes/class.pessoa.php");
include_once("classes/class.usuario.php");
    try {
    if(isset($_POST["button"]) && ($_POST["button"] === "Salvar")){
       $pessoa = new Pessoa();
       $pessoa->setNome($_POST['nome']);
       $pessoa->setEmail($_POST['email']);
       $pessoa->setCpf($_POST['cpf']);
       $pessoa->setTelefone($_POST['telefone']);
       $ultimoIdPessoa = $pessoa->adicionar();

       $aluno = new Aluno();
       $aluno->setPessoaId($ultimoIdPessoa);
       $aluno->setDataMatricula($_POST['data_matricula']);
       $aluno->setSituacaoAluno($_POST['situacao_aluno']);
       $aluno->setMatricula($_POST['matricula']);
       $aluno->adicionar();

      // erro de procedencia de execução não tem como o adicionar usuario inserindo registros na tabela de usuario utilizando a mesma chave de $ultimoIdPessoa
       $usuario = new Usuario();
       $usuario->setPessoaUsuarioId($ultimoIdPessoa);
       $usuario->adicionar();
    }
  } catch (PDOException $e) {
      echo "ERROR".$e->getMessage();
  }

?>
<div class="content-header navbar-white">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cadastro Acadêmicos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cadastro Acadêmicos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header --->

    <!-- Main content -->
    <div class="container col-lg-12 navbar-white">
      <div class="container col-lg-8 navbar-white">

    <section class="content navbar-light navbar-white">
      <div class="container-fluid navbar-white ">

         <form role="form" action="#" method="POST">
                  <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control"  placeholder="Insira o Nome Completo" name="nome">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control"  placeholder="Insira o E-mail" name="email">
                  </div>
                  <div class="form-group">
                    <label>CPF</label>
                    <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Insira o CPF">
                  </div>
                  <div class="form-group">
                    <label>Telefone</label>
                    <input type="tel" class="form-control" name="telefone" id="celular" placeholder="Insira o Celular">
                  </div>
                  <div class="form-group">
                    <label>Data Matricula</label>
                    <input type="date" class="form-control" name="data_matricula" id="matricul" placeholder="Insira a Matricula no Aluno">
                  </div>
                  <div class="form-group">
                    <label>Matricula</label>
                    <input type="text" class="form-control" name="matricula" id="matricul" placeholder="Insira a Matricula no Aluno">
                  </div>
                  <div class="form-group">
                    <label>Situacao Aluno: </label>
                    Ativo <input type="checkbox" name="situacao_aluno" value="true" id="ativo">
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
