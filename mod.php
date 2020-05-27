<?php
session_start();
/**
 *
 * @author Marcelo B.
 */
require_once '../config/functions.php';
require_once '../config/config.php';

if (empty($_SESSION['user']['login'])) {
    echo "Voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar a p&aacute;gina!!!</br>";
    echo "<a href ='" . ABSURL . "/index.php'>Home</a>";
} else {

    if ($_POST) {



        try {

            $usuario = new Usuario();
            $usuario->setNome($_POST['nome']);
            $usuario->setLogin($_POST['login']);
            $usuario->setSenha($_POST['senha']);
            $usuario->save();

            $msg = "Cadastrado com Sucesso!";
        } catch (Exception $e) {
            $msg = $e->getMessage();
        }
    }
    



    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Cadastro de Usuário</title>
            <link type="text/css" rel="stylesheet" href="css/style.css" />
        <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
        <script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
        <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
        <link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
        

</head>
        <body>
            <div class="content">
                <h2><font color="#00BFFF" face="arial">Cadastro de Usuário</font></h2>
                <div class="form">
    <?php echo!empty($msg) ? $msg : null; ?>
                    <form action="" method="POST">
                        <label><font face="arial" color="#838B8B">Nome:</font></label><br />
                <span id="sprytextfield1">
                        <input type="text" name="nome" />
                    <span class="textfieldRequiredMsg">Preencha seu Nome.</span></span><br />
                        <label><font face="arial" color="#838B8B">Login:</font></label><br />
                <span id="sprytextfield2">
                        <input type="text" name="login" />
                    <span class="textfieldRequiredMsg">Preencha seu Login.</span></span><br />
                        <label><font face="arial" color="#838B8B">Senha:</font></label><br />
                        <span id="sprypassword1">
                        <input type="password" name="senha" />
                      <span class="passwordRequiredMsg">Preencha seu Senha.</span></span><br />
                        <input class="botao" type="submit" value="Salvar" />
                       
                        <input type=button name="redirect" onClick="location.href='index.php'" value='Voltar'>
      
                    </form>
                    
                </div>
            
                <a href="seleciona_alteracao.php" >ALTERAR</a>
              
            </div>
            <span class="botao3" onClick="window.back(-1)"> </span>
         
        <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none");
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1");
        </script>
        </body>
    </html>
    
    
   <?php 
   
    function redirecionar($url, $tempo) 
{ 
    $url = str_replace('&;', '&', $url); 
         
    if($tempo > 3) 
    { 
        header("Refresh: $tempo; URL=$url"); 
    } 
    else 
    { 
        @ob_flush();
        @ob_end_clean();
        header("Location: index.php"); 
        exit; 
    } 
}
   
   redirecionar('index.php', 3); // Redireciona depois de 10 seg ?>
    
<?php } ?>



