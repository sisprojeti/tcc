<?php
  include('class.pessoa.php');
    class Professor
    {

      public $id;
      public $pessoa_id;
      public $data_cadastro;

      public function adicionar(){
        try {
          $sql = "INSERT INTO professor(pessoa_id,data_cadastro) values (:pessoa_id,:data_cadastro)";
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($sql);
          $stmt->bindParam(':pessoa_id',$this->pessoa_id);
          $stmt->bindParam(':data_cadastro',$this->data_cadastro);
          $stmt->execute();
        } catch (PDOException $e) {
          echo "ERROR:".$e->getMessage();
        }
      }

      public static function listar()
        {
          try {
            $query = "SELECT pessoa.nome,professor.id from pessoa join professor on pessoa.id = professor.pessoa_id";
                        $stmt = DB::conexao()->prepare($query);
                        $stmt->execute();
                        $registros = $stmt->fetchAll();
                        if($registros){
                          foreach($registros as $objeto){
                            $temporario = new Professor();
                            $temporario->setIdProfessor($objeto['id']);
                            $temporario->setNome($objeto['nome']);
                            $itens[] = $temporario;
                          }
              return $itens;
            }
          } catch (Exception $e) {
              echo "ERROR".$e->getMessage();
          }
        }

        public function getNome(){
          return $this->nome;
        }

        public function setNome($nome){
          $this->nome = $nome;
        }


      public function setPessoaId($ultimoIdPessoa){
        $this->pessoa_id = $ultimoIdPessoa;
      }

      public function getPessoaId($ultimoIdPessoa){
        return $this->pessoa_id;
      }

      public function getIdProfessor(){
        return $this->id;
      }

      public function setIdProfessor($id){
        $this->id = $id;
      }

      public function getDataCadastro(){
        return $this->data_cadastro;
      }

      public function setDataCadastro($data_cadastro){
        $this->data_cadastro = $data_cadastro;
      }


    }

?>
