<?php
    require_once('class.db.php');
    class Aluno
    {

      public $data_matricula;
      public $situacao_aluno;
      public $matricula;
      public $pessoa_id;

      //---------Provavelmente vamos utilizar esses atributos em outra classe-------
      //public $turma;
      //public $grupo_projeti;
      //---------------------------##########---------------------------------------


    public static function listar()
      {
        try {
          $query = "select aluno.id ,pessoa.nome as nome, aluno.situacao_aluno as situacao_aluno, aluno.matricula as matricula from aluno join pessoa on aluno.pessoa_id = pessoa.id";
                      $stmt = DB::conexao()->prepare($query);
                      $stmt->execute();
                      $registros = $stmt->fetchAll();
                      if($registros){
                        foreach($registros as $objeto){
                          $temporario = new Aluno();
                          $temporario->setIdAluno($objeto['id']);
                          $temporario->setNome($objeto['nome']);
                          $temporario->setSituacaoAluno($objeto['situacao_aluno']);
                          $temporario->setMatricula($objeto['matricula']);
                          $itens[] = $temporario;
                        }
            return $itens;
          }
        } catch (Exception $e) {
            echo "ERROR".$e->getMessage();
        }
      }

      public static function contarAlunos()
        {
          try {
            $query = "select * from aluno";
                        $stmt = DB::conexao()->prepare($query);
                        $stmt->execute();
                        $registros = $stmt->fetchAll();
                        $totalRegistros = count($registros);
              return $totalRegistros;
            }catch(Exception $e){
                echo "ERROR".$e->getMessage();
            }
          }


  //---------########### FINAL DA MELHORIA DO METODO DE LISTAR ############ -------------------

      public function adicionar(){
        try{
                  $sql = "INSERT INTO aluno(pessoa_id,data_matricula,situacao_aluno,matricula) values(:pessoa_id,:data_matricula,:situacao_aluno,:matricula)"; //criando uma variavel $stmt e atribuindo o valor da variavel $pdo e utilizand operador de acesso a objetos pra utilizar o metodo prepare pra preparar o insert no banco de dados
                  $conexao = DB::conexao();
                  $stmt = $conexao->prepare($sql);
                  $stmt->bindParam(':pessoa_id',$this->pessoa_id);
                  $stmt->bindParam(':data_matricula',$this->data_matricula);
                  $stmt->bindParam(':situacao_aluno',$this->situacao_aluno);
                  $stmt->bindParam(':matricula',$this->matricula);
                  $stmt->execute();
                  $ultimoIdAluno = $conexao->lastInsertId(); //RECUPERANDO O ULTIMO ID INSERIDO
                  return $ultimoIdAluno;
        }catch(PDOException $e){
          echo 'ERRO:'.$e->getMessage();
        }
      }

              public function setIdAluno($id){
                $this->id = $id;
              }

              public function getIdAluno(){
                return $this->id;
              }

              public function setPessoaId($ultimoIdPessoa){
                $this->pessoa_id = $ultimoIdPessoa;
              }

              public function getPessoaId($ultimoIdPessoa){
                return $this->pessoa_id;
              }
            /*---------------------------------------------------------------------
              ENCAPSULAMENTO NOME
             ---------------------------------------------------------------------*/
            public function getNome(){
              return $this->nome;
            }

            public function setNome($nome){
              $this->nome = $nome;
            }

            /*---------------------------------------------------------------------
              ENCAPSULAMENTO email
             ---------------------------------------------------------------------*/
            public function getEmail(){
              return $this->email;
            }

            public function setEmail($email){
              $this->email = $email;
            }

          /*---------------------------------------------------------------------
            ENCAPSULAMENTO CPF
           ---------------------------------------------------------------------*/
            public function getCpf()
            {
              return $this->cpf;
            }

            public function setCpf($cpf)
            {
              $this->cpf = $cpf;
            }
          /*---------------------------------------------------------------------
            ENCAPSULAMENTO CPF
           ---------------------------------------------------------------------*/
            public function getTelefone(){
              return $this->telefone;
            }

            public function setTelefone($telefone){
              $this->telefone = $telefone;
            }

            /*---------------------------------------------------------------------
              ENCAPSULAMENTO data_matricula
             ---------------------------------------------------------------------*/
              public function getDataMatricula(){
                return $this->data_matricula;
              }

              public function setDataMatricula($data_matricula){
                $this->data_matricula = $data_matricula;
              }


              /*---------------------------------------------------------------------
                ENCAPSULAMENTO situacao_aluno
               ---------------------------------------------------------------------*/
                public function getSituacaoAluno(){
                  return $this->situacao_aluno;
                }

                public function setSituacaoAluno($situacao_aluno){
                  $this->situacao_aluno = $situacao_aluno;
                }

                /*---------------------------------------------------------------------
                  ENCAPSULAMENTO matricula
                ---------------------------------------------------------------------*/
                public function getMatricula(){
                  return $this->matricula;
                }

                public function setMatricula($matricula){
                  $this->matricula = $matricula;
                }


      //VAMOS UTILIZAR ESSES METODOS EM OUTRA CLASS PROVAVELMENTE NÃO APAGAR
      // public function setTurma($turma){
      //     $this->turma = $turma;
      // }
      //
      // public function getTurma(){
      //     return $this->turma;
      // }
      //
      // public function getGrupoProjeti(){
      //   return $this->grupo_projeti;
      // }
      //
      // public function setGrupoProjeti($grupo_projeti){
      //   $this->grupo_projeto = $grupo_projeti;
      // }



      /*---------------------------------------------------------------------
        ENCAPSULAMENTO SENHA
       ---------------------------------------------------------------------*/
            private function getSenha()
            {
              return $this->senha;
            }

            private function setSenha($senha)
            {
              $this->senha = $senhaPadrao;
            }
          }

?>
