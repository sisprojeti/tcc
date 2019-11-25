<?php
  require ("class.pessoa.php");
/**
 * Criando uma class com o nome coordenador que esta extendendo a class de pessoas
 */
    class Coordenador
    {
      public $id;
      public $pessoa_id;
      public $data_cadastro;

      public static function listar()
        {
          try {
            $query = "SELECT * from pessoa";
                        $stmt = DB::conexao()->prepare($query);
                        $stmt->execute();
                        $registros = $stmt->fetchAll();
                        if($registros){
                          foreach($registros as $objeto){
                            $temporario = new Coordenador();
                            $temporario->setId($objeto['id']);
                            $temporario->setNome($objeto['nome']);
                            $temporario->setEmail($objeto['email']);
                            $temporario->setCpf($objeto['cpf']);
                            $temporario->setTelefone($objeto['telefone']);
                            $itens[] = $temporario;
                          }
              return $itens;
            }
          } catch (Exception $e) {
              echo "ERROR".$e->getMessage();
          }
        }

      public function adicionar(){
        try {
          $sql = "INSERT INTO coordenador(pessoa_id,data_cadastro) values (:pessoa_id,:data_cadastro)";
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($sql);
          $stmt->bindParam(':pessoa_id',$this->pessoa_id);
          $stmt->bindParam(':data_cadastro',$this->data_cadastro);
          $stmt->execute();

        } catch (PDOException $e) {
          echo "ERROR:".$e->getMessage();
        }

      }

      public function setId($id){
        $this->id = $id;
      }

      public function setNome($nome){
        $this->nome = $nome;
      }

      public function setEmail($email){
        $this->email = $email;
      }

      public function setCpf($cpf){
        $this->cpf = $cpf;
      }

      public function setTelefone($telefone){
        $this->telefone = $telefone;
      }

      public function setPessoaId($ultimoIdPessoa){
        $this->pessoa_id = $ultimoIdPessoa;
      }

      public function getPessoaId($ultimoIdPessoa){
        return $this->pessoa_id;
      }

      public function getIdCoordenador(){
        return $this->id;
      }

      public function setIdCoordenador($id){
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
