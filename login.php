<?php
    require('Classes/class.usuario.php');
    session_start();
    if(isset($_POST['botao']) && $_POST["botao"] == "Logar"){
      //print_r($_POST);
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	body {
		color: #fff;
		background: #36648B;
	}
	.error{
             color:red
       }
	.form-control {
        min-height: 41px;
		background: #fff;
		box-shadow: none !important;
		border-color: #e3e3e3;
	}
	.form-control:focus {
		border-color: #70c5c0;
	}
    .form-control, .btn {
        border-radius: 2px;
    }
	.login-form {
		width: 350px;
		margin: 0 auto;
		padding: 100px 0 30px;
	}
	.login-form form {
		color: #7a7a7a;
		border-radius: 2px;
    	margin-bottom: 15px;
        font-size: 13px;
        background: #ececec;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
        position: relative;
    }
	.login-form h2 {
		font-size: 22px;
        margin: 35px 0 25px;
    }
	.login-form .avatar {
		position: absolute;
		margin: 0 auto;
		left: 0;
		right: 0;
		top: -50px;
		width: 95px;
		height: 95px;
		border-radius: 50%;
		z-index: 9;
		background: #6CA6CD;
		padding: 15px;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
	.login-form .avatar img {
		width: 100%;
	}
    .login-form input[type="checkbox"] {
        margin-top: 2px;
    }
    .login-form .btn {
        font-size: 16px;
        font-weight: bold;
		background: #EE7600;
		border: none;
		margin-bottom: 20px;
    }
	.login-form .btn:hover, .login-form .btn:focus {
		background: #FF7F24;
        outline: none !important;
	}
	.login-form a {
		color: #fff;
		text-decoration: underline;
	}
	.login-form a:hover {
		text-decoration: none;
	}
	.login-form form a {
		color: #7a7a7a;
		text-decoration: none;
	}
	.login-form form a:hover {
		text-decoration: underline;
	}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

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
			<img src="img/user.png" alt="Avatar" />
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
