<?php
include_once 'class.db.php';
    class Professor
    {

      public $id_professor;
      public $fk_pessoa;
      public $data_cadastro;

      public function adicionar(){
        try {
          $sql = "INSERT INTO professor(fk_pessoa,data_cadastro) values (:fk_pessoa,:data_cadastro)";
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($sql);
          $stmt->bindParam(':fk_pessoa',$this->fk_pessoa);
          $stmt->bindParam(':data_cadastro',$this->data_cadastro);
          $stmt->execute();
        } catch (PDOException $e) {
          echo "ERROR:".$e->getMessage();
        }
      }

      public static function listar()
        {
          try {
            $query = "SELECT professor.id_professor as id_professor , pessoa.nome as nome_prof, pessoa.email as email_prof, pessoa.cpf as cpf_prof, pessoa.telefone as telefone_prof, professor.data_cadastro as data_cadastro_prof from pessoa join professor on pessoa.id_pessoa = professor.fk_pessoa";
                        $stmt = DB::conexao()->prepare($query);
                        $stmt->execute();
                        $registros = $stmt->fetchAll();
                        if($registros){
                          foreach($registros as $objeto){
                            $temporario = new Professor();
                            $temporario->setIdProfessor($objeto['id_professor']);
                            $temporario->setNome($objeto['nome_prof']);
                            $temporario->setEmail($objeto['email_prof']);
                            $temporario->setCpf($objeto['cpf_prof']);
                            $temporario->setTelefone($objeto['telefone_prof']);
                            $temporario->setDataCadastro($objeto['data_cadastro_prof']);
                            $itens[] = $temporario;
                          }
              return $itens;
            }
          } catch (Exception $e) {
              echo "ERROR".$e->getMessage();
          }
        }

        public function getEmail()
        {
          return $this->email;
        }

        public function setEmail($email)
        {
          $this->email = $email;
        }

        public function getCpf()
        {
          return $this->cpf;
        }

        public function setCpf($cpf)
        {
          $this->cpf = $cpf;
        }

        public function getTelefone()
        {
          return $this->telefone;
        }

        public function setTelefone($telefone)
        {
          $this->telefone = $telefone;
        }


        public function getNome(){
          return $this->nome;
        }

        public function setNome($nome){
          $this->nome = $nome;
        }


      public function setPessoaId($ultimoIdPessoa){
        $this->fk_pessoa = $ultimoIdPessoa;
      }

      public function getPessoaId($ultimoIdPessoa){
        return $this->fk_pessoa;
      }

      public function getIdProfessor(){
        return $this->id_professor;
      }

      public function setIdProfessor($id_professor){
        $this->id_professor = $id_professor;
      }

      public function getDataCadastro(){
        return $this->data_cadastro;
      }

      public function setDataCadastro($data_cadastro){
        $this->data_cadastro = $data_cadastro;
      }


    }

?>
