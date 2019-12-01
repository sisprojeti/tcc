<?php
require_once 'class.db.php';
/**
 * Criando uma class com o nome coordenador que esta extendendo a class de pessoas
 */
    class Coordenador
    {
      public $id_coordenador;
      public $fk_pessoa;
      public $data_cadastro;

      public static function listar()
        {
          try {
            $query = "SELECT coordenador.id_coordenador as id_coordenador,pessoa.nome as nome_coord, pessoa.email as email_coord, pessoa.cpf as cpf_coord, pessoa.telefone as telefone_coord,coordenador.data_cadastro as datacad_coord from pessoa join coordenador on pessoa.id_pessoa = coordenador.fk_pessoa";
                        $stmt = DB::conexao()->prepare($query);
                        $stmt->execute();
                        $registros = $stmt->fetchAll();
                        if($registros){
                          foreach($registros as $objeto){
                            $temporario = new Coordenador();
                            $temporario->setId($objeto['id_coordenador']);
                            $temporario->setNome($objeto['nome_coord']);
                            $temporario->setEmail($objeto['email_coord']);
                            $temporario->setCpf($objeto['cpf_coord']);
                            $temporario->setTelefone($objeto['telefone_coord']);
                            $temporario->setDataCadastro($objeto['datacad_coord']);
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
            $sql = "INSERT INTO coordenador(fk_pessoa,data_cadastro) values (:fk_pessoa,:data_cadastro)";
            $conexao = DB::conexao();
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':fk_pessoa',$this->fk_pessoa);
            $stmt->bindParam(':data_cadastro',$this->data_cadastro);
            $stmt->execute();
          } catch (PDOException $e) {
            echo "ERROR:".$e->getMessage();
          }
        }

        public static function contarCoordenadores()
          {
            try {
              $query = "select * from coordenador";
                          $stmt = DB::conexao()->prepare($query);
                          $stmt->execute();
                          $registros = $stmt->fetchAll();
                          $totalCoordenadores = count($registros);
                          return $totalCoordenadores;
              }catch(Exception $e){
                  echo "ERROR".$e->getMessage();
              }
            }

      public function getId()
      {
        return $this->id_coordenador;
      }

      public function setId($id_coordenador){
        $this->id_coordenador = $id_coordenador;
      }

      public function getNome()
      {
        return $this->nome;
      }

      public function setNome($nome){
        $this->nome = $nome;
      }

      public function getEmail()
      {
        return $this->email;
      }

      public function setEmail($email){
        $this->email = $email;
      }

      public function getCpf()
      {
        return $this->cpf;
      }

      public function getTelefone()
      {
        return $this->telefone;
      }
      public function setCpf($cpf){
        $this->cpf = $cpf;
      }

      public function setTelefone($telefone){
        $this->telefone = $telefone;
      }

      public function setPessoaId($ultimoIdPessoa){
        $this->fk_pessoa = $ultimoIdPessoa;
      }

      public function getPessoaId($ultimoIdPessoa){
        return $this->fk_pessoa;
      }

      public function getIdCoordenador(){
        return $this->id_coordenador;
      }

      public function setIdCoordenador($id_coordenador){
        $this->id_coordenador = $id_coordenador;
      }

      public function getDataCadastro(){
        return $this->data_cadastro;
      }

      public function setDataCadastro($data_cadastro){
        $this->data_cadastro = $data_cadastro;
      }
    }

?>
