<?php
require_once("classes/class.professor.php");
require_once("classes/class.pessoa.php");
require_once("classes/class.grupo.php");
require_once("classes/class.usuario.php");
require_once('classes/class.refUsuarioGrupo.php');

$fk_grupo = Grupo::recuperaIdModulo($_REQUEST['modulo'])->getIdGrupo();
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

      $senha = '123456';
       $usuario = new Usuario();
       $usuario->setPessoaUsuarioId($ultimoIdPessoa);
       $usuario->setSenha($senha);
       $ultimoIdUsuario = $usuario->adicionar();

       $novo_ref_usuario_grupo = new RefUsuarioGrupo();
       $novo_ref_usuario_grupo->setIdUsuario($ultimoIdUsuario);
       $novo_ref_usuario_grupo->setIdGrupo($fk_grupo);
       $novo_ref_usuario_grupo->adicionar();
       
    }
  } catch (PDOException $e) {
      echo "ERROR".$e->getMessage();
  }

?>

<!DOCTYPE html>
<html>
<head>
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

       <script type="text/javascript">
  $(document).ready(function(){
    $("#cpf").mask("000.000.000-00");
    $("#celular").mask("(00) 00000-0000");
  });
</script>
</head>
<body>
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

        <form role="form" action="#" id="form_professor" method="POST">
                 <div class="form-group">
                   <label>Nome</label>
                   <input type="text" name="nome" class="form-control"  placeholder="Insira o Nome Completo" required>
                 </div>
                 <div class="form-group">
                   <label>Email</label>
                   <input type="email" class="form-control" name="email" placeholder="Insira o E-mail" required>
                 </div>
                 <div class="form-group">
                   <label>CPF</label>
                   <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Insira o CPF" required>
                 </div>
                 <div class="form-group">
                   <label>Celular</label>
                   <input type="tel" class="form-control" name="telefone" id="celular" placeholder="Insira o Celular" required>
                 </div>
                 <div class="form-group">
                   <label>Data Cadastro</label>
                   <input type="date" class="form-control" name="data_cadastro" required>
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

      <script>
            $("#form_professor").validate({
       rules : {
              nome:{
                    required:true,
                    minlength:10,
                    accept: "[a-zA-Z]+",
             },
             email:{

                    required:true,
                    email: true
             },
             cpf:{
                    cpf: true, //tenho que dar uma olhada nesse campo cpf
                    required:true
             },
             telefone: {
                    required: true,
             },
             data_cadastro: {
                    required: true,
             },

       },
       messages:{
            nome:{
                    required:"Por favor, informe o nome",
                    minlength:"Insira o nome completo",
                    accept: "Cuidado! preencha o nome sem caracteres especiais"
             },
             email:{
                    required:"Por favor, informe o Email",
                    email:"Insira um Email válido."
             },
            cpf:{
                    required:"Por favor, informe um CPF válido"
             },
              telefone:{
                    required:"Por favor, insira o  nº de do celular"
             },
             data_cadastro:{
                    required:"Por favor, insira a data do cadastro"
             },
       }

});

        //NOME
            jQuery.validator.addMethod("accept", function(value, element, param) {
              return value.match(new RegExp("." + param + "$"));
            });

        //SENHA
            $.validator.addMethod("passwordcheck", function(value) {
               return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) //
                   && /[a-z]/.test(value) // letra minúscula
                   && /\d/.test(value) // número
            });

        //EMAIL
           $.validator.addMethod( //Metodo, Filtro de Email Válido. por exemplo: "usuario@admin.state.in.us" ou "nome@site.a"
                  'email',
                  function(value, element){
                      return this.optional(element) || /(^[-!#$%&'*+/=?^_`{}|~0-9A-Z]+(\.[-!#$%&'*+/=?^_`{}|~0-9A-Z]+)*|^"([\001-\010\013\014\016-\037!#-\[\]-\177]|\\[\001-\011\013\014\016-\177])*")@((?:[A-Z0-9](?:[A-Z0-9-]{0,61}[A-Z0-9])?\.)+(?:[A-Z]{2,6}\.?|[A-Z0-9-]{2,}\.?)$)|\[(25[0-5]|2[0-4]\d|[0-1]?\d?\d)(\.(25[0-5]|2[0-4]\d|[0-1]?\d?\d)){3}\]$/i.test(value);
                  },
                  'Insira um Email Válido.'
              );

       jQuery.validator.addMethod("cpf", function(value, element) {
   value = jQuery.trim(value);

  value = value.replace('.','');
  value = value.replace('.','');
  cpf = value.replace('-','');
  while(cpf.length < 11) cpf = "0"+ cpf;
  var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
  var a = [];
  var b = new Number;
  var c = 11;
  for (i=0; i<11; i++){
    a[i] = cpf.charAt(i);
    if (i < 9) b += (a[i] * --c);
  }
  if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
  b = 0;
  c = 11;
  for (y=0; y<10; y++) b += (a[y] * c--);
  if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }

  var retorno = true;
  if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;

  return this.optional(element) || retorno;

}, "Informe um CPF válido");


       </script>
</body>
</html>
