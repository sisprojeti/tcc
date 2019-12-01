<?php
  require_once('class.db.php');
    /**
     *  Criando uma class com o nome Usuarios
     */
    class Usuario
    {
      public $id_usuario;
      public $fk_pessoa;
      public $senha;
      public $login;

      public function __construct($id_usuario=false){
          if($id_usuario){
            $sql = "SELECT * FROM usuario where id_usuario = :id_usuario";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->bindParam(":id_usuario",$id_usuario,PDO::PARAM_INT);
            $stmt->execute();
            foreach($stmt as $obj){
              $this->setIdUsuario($obj['id_usuario']);
              $this->setFkPessoa($obj['fk_pessoa']);
            }
          }
        }

        public function recuperaPessoa()
        {
          return new Pessoa($this->fk_pessoa);
        }

      public function adicionar()
      {
        $sql = "INSERT INTO usuario (senha,fk_pessoa,login) values (:senha,:fk_pessoa,:login)";
        $conexao = DB::conexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':senha',$this->senha);
        $stmt->bindParam(':fk_pessoa',$this->fk_pessoa);
        $stmt->bindParam(':login',$this->login);
        $stmt->execute();
        $ultimoIdUsuario = $conexao->lastInsertId();
        return $ultimoIdUsuario;
      }

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

      public function setFkPessoa($fk_pessoa){
        $this->fk_pessoa = $fk_pessoa;
      }

      public function getFkPessoa()
      {
        return $this->fk_pessoa;
      }

      public function setIdUsuario($id_usuario){
        $this->id_usuario = $id_usuario;
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

      public function setPessoaUsuarioId($ultimoIdPessoa)
      {
        $this->fk_pessoa = $ultimoIdPessoa;
      }

    }


?>
