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
          if($stmt){
                    echo '
                    <div id="snoAlertBox" class="alert alert-success" data-alert="alert">Adicionado com sucesso</div>
                    ';
                  }
        } catch (PDOException $e) {
          echo "ERROR:".$e->getMessage();
        }
      }


      public static function listarProjetisVinculados($fk_pessoa,$id_turma)
        {
          try {
            $query = "SELECT * from
                      avaliador_projeti
                      join professor on avaliador_projeti.fk_professor = professor.id_professor
                      join pessoa on professor.fk_pessoa = pessoa.id_pessoa
                      join projeti on projeti.id_projeti = avaliador_projeti.fk_projeti
                      where pessoa.id_pessoa = $fk_pessoa";
                        $stmt = DB::conexao()->prepare($query);
                        $stmt->execute();
                        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        if($registros){
                          foreach($registros as $objeto){
                            $temporario = new Projeti();
                            $temporario->setIdProjeti($objeto['fk_projeti']);
                            $temporario->setTemaProjeti($objeto['tema']);
                            $itens[] = $temporario;
                          }
              return $itens;
            }
          } catch (Exception $e) {
              echo "ERROR".$e->getMessage();
          }
        }

        public function setFkProjeti($fk_projeti){
          $this->fk_projeti = $fk_projeti;
        }

        public function setFkPessoa($fk_pessoa){
          $this->fk_pessoa = $fk_pessoa;
        }


      public static function listar($busca = false)
        {
          try {
            $query = "SELECT
            professor.id_professor as id_professor
            , pessoa.nome as nome_prof
            , pessoa.email as email_prof
            , pessoa.cpf as cpf_prof
            , pessoa.telefone as telefone_prof
            , professor.data_cadastro as data_cadastro_prof
            , professor.fk_pessoa as fk_pessoa
            from pessoa join professor on pessoa.id_pessoa = professor.fk_pessoa";
            if($busca){
              $query.= " and pessoa.nome like '%$busca%'";
            }
                        $stmt = DB::conexao()->prepare($query);
                        $stmt->execute();
                        $registros = $stmt->fetchAll();
                        if($registros){
                          foreach($registros as $objeto){
                            $temporario = new Professor();
                            $temporario->setIdProfessor($objeto['id_professor']);
                            $temporario->setFkPessoa($objeto['fk_pessoa']);
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
        public static function contarProfessores()
          {
            try {
              $query = "select * from professor";
                          $stmt = DB::conexao()->prepare($query);
                          $stmt->execute();
                          $registros = $stmt->fetchAll();
                          $totalProfessores = count($registros);
                          return $totalProfessores;
              }catch(Exception $e){
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


        public function getNomeProfessor(){
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
