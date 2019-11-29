<?php
include_once('class.db.php');
	class Usuario{
		public $id_usuario;
		public $fk_pessoa;
    public $login;
		public $senha;

      public static function logar($login = false, $senha = false){
        if($login && $senha){
          $sql = "SELECT * FROM usuario where login = :login and senha = :senha";
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':login',$login);
          $stmt->bindParam(':senha',$senha);
          $stmt->execute();
          if(isset($stmt)){
            foreach ($stmt as $obj) {
              $_SESSION['usuario'] = $obj['login'];
              $_SESSION['id_usuario'] = $obj['id_usuario'];
            }
          }

        }
      }

		public function adicionar(){
		  $sql = "INSERT INTO usuario (fk_pessoa,senha) values (:fk_pessoa,:senha)";
		  $conexao = DB::conexao();
		  $stmt = $conexao->prepare($sql);
		  $stmt->bindParam(':fk_pessoa',$this->fk_pessoa);
		  $stmt->bindParam(':senha',$this->senha);
		  $stmt->execute();
    }

		/*------------------------------------/*
       ENCAPSULAMENTOS DO ID
       /*------------------------------------*/

       	public function getId(){
         	return $this->id;
       	}

       public function setId($id){
         $this->id = $id;
       }

       /*------------------------------------/*
       ENCAPSULAMENTOS DO PESSOA_ID
       /*------------------------------------*/

        public function setPessoaUsuarioId($ultimoIdPessoa){
          	$this->fk_pessoa = $ultimoIdPessoa;
        }

        public function getPessoaId($ultimoIdPessoa){
            return $this->fk_pessoa;
        }

        /*------------------------------------/*
       ENCAPSULAMENTOS DO PESSOA_ID
       /*------------------------------------*/

        public function setSenha($senha){
          	$this->senha = $senha;
        }

        public function getSenha(){
            return $this->senha;
        }
	}

?>
