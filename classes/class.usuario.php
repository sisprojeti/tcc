<?php
include_once('class.db.php');
	class Usuario{
		public $id;
		public $pessoa_id;
		public $senha = 1234;

		public function adicionar(){
		  $sql = "INSERT INTO usuario (pessoa_id,senha) values (:pessoa_id,:senha)";
		  $conexao = DB::conexao();
		  $stmt = $conexao->prepare($sql);
		  $stmt->bindParam(':pessoa_id',$this->pessoa_id);
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
          	$this->pessoa_id = $ultimoIdPessoa;
        }

        public function getPessoaId($ultimoIdPessoa){
            return $this->pessoa_id;
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
