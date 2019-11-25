<div class="container">

  <h2>Editar Perfil do Usuário</h2>

  <form id="editarperfil" class="form">

    <div class="form-row">

      <div class="form-group col-md-12">

        <label for="nomeedit">Nome</label>
        <input type="text" id="nome"  class="form-control" minlength="5" name="nome" placeholder="Nome Completo" required autofocus>

      </div>
      <!-- /form-group -->

    </div>
    <!-- /form-row -->

    <div class="form-group">

      <label for="emailedit">Email</label>
      <input type="email" id="email_address" class="form-control" name="email" placeholder="exemplo@host.com" required autofocus pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">

    </div>
    <!-- /form-group -->

    <div class="form-group">

      <label for="telefone">Telefone: </label>
      <input type="tel" id="telefone" class="form-control" name="telefone" required placeholder="(00) 00000-0000">

    </div>
    <!-- /form-group -->

    <div class="form-row">

      <div class="form-group col-md-6">

      <label for="password">Senha: </label>
      <input type="password" id="senha" class="form-control" name="senha" required placeholder="Sua senha">

      </div>
      <!-- /form-group -->

      <!-- /form-group -->

    </div>
    <!-- /form-row -->

    <div class="form__btns">

      <button id="cancelar" class="btn btn-danger">Cancelar</button>
      <button type="submit" id="atualizar_perfil" class="btn btn-primary">Atualizar Perfil</button>

    </div>
    <!-- /form__btns -->

  </form>

</div>
