<?php
    require('Classes/class.usuario.php');
    session_start();
    if(isset($_POST['botao']) && $_POST["botao"] == "Logar"){
      print_r($_POST);
      $u = Usuario::logar($_POST['cpf'], $_POST['senha']);
      //die();
    }

?>
<?php
  if(isset($_SESSION['cpf']) && isset($_SESSION['id_usuario'])){
    echo "<script>location.href='index.php'</script>";
  }

  if(isset($_GET['login_invalido']) && $_GET['login_invalido'] === 'erro'){
    echo "<div class='alert alert-danger' role='alert'> Login ou Senha Inválidos! </div>";
  }

  if(isset($_GET['msg']) && $_GET['msg'] === 'erro'){
   echo "<div class='alert alert-danger' role='alert'> Você precisa estar logado para acessar páginas restritas! </div>";

  }
  //
	// if(isset($_GET['msg']) && $_GET['msg'] === 'usuario_senha_invalidos'){
  //   echo "<span style='color:red'> Usuário ou senha inválidos </span>";
  // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SISP - Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="publico/css/login.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#cpf").mask("000.000.000-00");
  });
</script>
</head>
<body>
<div class="login-form">
    <form action="#" id="form_login" method="post">
		<div class="avatar">
			<img src="publico/img/user.png" alt="Avatar" />
		</div>
        <h2 class="text-center">Login</h2>
        <div class="form-group">
        	<input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="senha" id="senha" placeholder="SENHA" required="required">
        </div>
        <div class="form-group">
            <input type="submit" name="botao" class="btn btn-primary btn-lg btn-block" value="Logar">
        </div>
		<div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox">Lembrar-me</label>
            <a href="#" class="pull-right">Esqueceu sua senha?</a>
        </div>
    </form>
</div>

 <script>
            $("#form_login").validate({
       rules : {
              cpf:{
                    required:true,
                    cpf: true,
             },
             senha:{
                    required:true
             },
       },
       messages:{
            cpf:{
                    required:"Por favor, informe o CPF."
             },
             senha:{
                    required:"Por favor, informe a senha."
             },
       }

});
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
