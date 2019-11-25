<?php
include_once('class.db.php');
    /**
     * Criando uma class para armazernar os atributos e metodos da class funcionario
     */
    class Pessoa
    {
      public $id;
      public $nome;
      public $email;
      public $cpf;
      public $telefone;
      //protected $cpf; //verificar como inserir metodo protegido no banco de dados

      //protected $senha; verificar se o campo de senha vai ficar na classe de pessoa e tabela de pessoa, ou na tabela de usuarios na classe de usuarios

      public function adicionar(){
        try{
          $sql = "INSERT INTO pessoa(nome,email,cpf,telefone) values (:nome,:email,:cpf,:telefone)";
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($sql);
          $stmt->bindParam(':nome',$this->nome);
          $stmt->bindParam(':email',$this->email);
          $stmt->bindParam(':cpf',$this->cpf);
          $stmt->bindParam(':telefone',$this->telefone);
          $stmt->execute();
          $ultimoIdPessoa = $conexao->lastInsertId();
          return $ultimoIdPessoa;

        }catch(PDOException $e){
          echo "ERROR".$e->getMessage();
        }
      }

      public function listar(){
        try {
          $sql = "select pessoa.id, pessoa.nome, pessoa.cpf, pessoa.telefone, grupo_pessoa.nome as grupo, pessoa.email from pessoa join grupo_pessoa on pessoa.grupo_pessoa_id = grupo_pessoa.id ";
          $stmt = DB::conexao()->prepare($sql);
          $stmt->execute();
          $registros = $stmt->fetchAll();
          if($registros){
            foreach($registros as $objeto){
              $temporario = new Pessoa();
              $temporario->setIdPessoa($objeto['id']);
              $temporario->setNome($objeto['nome']);
              $temporario->setEmail($objeto['email']);
              $temporario->setCpf($objeto['cpf']);
              $temporario->setTelefone($objeto['telefone']);
              $itens[] = $temporario;
            }
            return $itens;
          }
        } catch (PDOException $e) {
          echo "Deu erro".$e->getMessage();
        }

      }

      public function getIdPessoa()
      {
        return $this->id;
      }

      public function setIdPessoa($id)
      {
        $this->id = $id;
      }

            /*---------------------------------------------------------------------
  ENCAPSULAMENTO NOME
 ---------------------------------------------------------------------*/
            public function getNome()
            {
              return $this->nome;
            }

            public function setNome($nome)
            {
              $this->nome = $nome;
            }

          /*---------------------------------------------------------------------
            ENCAPSULAMENTO EMAIL
           ---------------------------------------------------------------------------------*/
            public function getEmail()
            {
              return $this->email;
            }

            public function setEmail($email)
            {
              $this->email = $email;
            }

/*---------------------------------------------------------------------
            ENCAPSULAMENTO GRUPO
---------------------------------------------------------------------*/
            public function getGrupo()
            {
              return $this->grupo_pessoa_id;
            }

            public function setGrupo($grupo_pessoa_id)
            {
              $this->grupo_pessoa_id = $grupo_pessoa_id;
            }

/*---------------------------------------------------------------------
            ENCAPSULAMENTO SENHA
---------------------------------------------------------------------*/
            public function getSenha(){
              return $this->senha;
            }

            public function setSenha($senha){
              $this->senha = $senha;
            }

/*---------------------------------------------------------------------
            ENCAPSULAMENTO CPF
---------------------------------------------------------------------*/
            public function getCpf(){
              return $this->cpf;
            }

            public function setCpf($cpf){
              $this->cpf = $cpf;
            }

            public function getTelefone(){
              return $this->telefone;
            }

            public function setTelefone($telefone){
              $this->telefone = $telefone;
            }

}


?>
