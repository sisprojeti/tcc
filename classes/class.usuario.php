<?php
  require('class.db.php');
    /**
     *  Criando uma class com o nome Usuarios
     */
    class Usuario
    {

      public $senha;
      public $login;

      public static function logar($login = false, $senha = false){
        if($login && $senha){
          $sql = "SELECT * FROM usuario where login = :login and senha = :senha";
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':login',$login);
          $stmt->bindParam(':senha',$senha);
          $stmt->execute();
          if(isset($stmt)){
            foreach ($stmt as $obj) {
              $_SESSION['login_usuario'] = $obj['login'];
              $_SESSION['id_usuario'] = $obj['id_usuario'];
            }
          }else{
            header('Location:index.php?msg2=usuario_senha_invalidos');
          }

        }
      }

      public function getNome()
      {
        return $this->nome;
      }

      public function setNome($nome)
      {
        $this->nome = $nome;
      }

      public function getEmail()
      {
        return $this->email;
      }

      public function setEmail($email)
      {
        $this->email = $email;
      }

      public function getSenha()
      {
        return $this->senha;
      }

      public function setSenha($senha)
      {
        $this->senha = $senha;
      }

    }


?>
