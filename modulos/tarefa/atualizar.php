<?php include_once("Classes/class.empresa_cliente.php");?>
<?php
if(isset($_POST['Atualizar']) && $_POST['Atualizar'] == "Atualizar"){
  try {
    $tarefa = new Tarefa($id_tarefa); //recuperar o id da tarefa que está selecionada pra editar
    $tarefa->setTitulo($_POST['titulo']);
    $tarefa->setDataInicio($_POST['titulo']);
    $tarefa->atualizar();
  } catch (PDOException $e) {
    echo "ERROR".$e->getMessage();
  }
}
?>
<?php
        if(isset($_GET["id"]) && is_numeric($_GET["id"])){
          $empresa_cliente = new Empresa_Cliente($_GET["id"]);
?>
  <div class="container">
    <form action="#" method="post">
        <input type="hidden" name="cod_empresa_cliente" value="<?php echo $empresa_cliente->getCodEmpresaCliente();?>">
        <div class="form-group">
          <label for="exampleFormControlInput1">Nome da Empresa/Cliente</label>
          <input type="text" name="nome_empresa_cliente" class="form-control" id="exampleFormControlInput1" value="<?php echo $empresa_cliente->getNomeEmpresaCliente();?>">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Email </label>
          <input type="text" class="form-control" value="<?php echo $empresa_cliente->getEmailEmpresaCliente();?>"  id="" name="email_empresa_cliente">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Contato</label>
          <input type="text" class="form-control" value="<?php echo $empresa_cliente->getContatoEmpresaCliente();?>"  id="" name="contato_empresa_cliente">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Cnpj Empresa/Cliente</label>
          <input type="number" class="form-control" value="<?php echo $empresa_cliente->getCnpjEmpresaCliente();?>"  id="" name="cnpj_empresa_cliente">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Responsavel Empresa/Cliente</label>
          <input type="text" class="form-control" value="<?php echo $empresa_cliente->getResponsavelEmpresaCliente();?>"  id="" name="responsavel_empresa_cliente">
        </div>
        <button type="submit" name="botao" value="Salvar" class="btn btn-primary">Atualizar</button>
      </form>
  </div>
<?php }?>
