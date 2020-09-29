<?php

print_r();

?>

<div class="container">
  <form class="form-signin" action="config/login.php" method="POST">

        <img class="mb-4" src="img/logo.png" alt="" width="150" >
        <h1 class="h3 mb-3 font-weight-normal">Entre na sua conta </h1>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="text" id="cpf" class="form-control" placeholder="CPF" name="cpf" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>

        <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required name="senha">
        <div class="text-right" style="font-style: normal;">
          <label>
            <a href="#" style="color:#ef2323 ;">Esqueceu sua senha?</a>
          </label>
        </div>

        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Acessar" name="Acessar">
        <br>
        <a class="navbar-brand btn btn-lg btn-primary btn-block" href="sisp_help_desk">

         SISP Help Desk
        </a>
        Ainda não tem uma conta? <a href="view/cadastro.html" >Cadastre-se</a>

        <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
      </form>
</div>
