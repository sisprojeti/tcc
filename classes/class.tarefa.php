<?php

/**
 * Criando uma class com o nome "Tarefa" que será responsável por armazenar as tarefas referentes a cada oportunidade
 */
    class Tarefa
    {
      public $id_tarefa;
      public $fk_status_tarefa;
      public $fk_projeti;
      public $titulo;
      public $descricao;
      public $data_inicio;
      public $data_fim;
      public $responsavel_id;
      public $data_conclusao;
      public $data_cadastro;
      public $nomeStatus;
      public $pessoa_nome;
      public $id_status_tarefa;
      public $fk_ref_aluno_projeti;
      public $status_tarefa;

      public function __construct($id_tarefa=false){
          if($id_tarefa){
            $sql = "select * from tarefa where id_tarefa = :id_tarefa";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->bindParam(":id_tarefa",$id_tarefa,PDO::PARAM_INT);
            $stmt->execute();
            foreach($stmt as $obj){
              print_r($obj);
              $this->setTitulo($obj['titulo']);
            }
          }
        }

      public static function listarStatusTarefa()
        {
          try {
            $query = "select * from status_tarefa";
                        $stmt = DB::conexao()->prepare($query);
                        $stmt->execute();
                        $registros = $stmt->fetchAll();
                        if($registros){
                          foreach($registros as $objeto){
                            $temporario = new Tarefa();
                            $temporario->setIdStatusTarefa($objeto['id_status_tarefa']);
                            $temporario->setNomeStatusTarefa($objeto['nome']);
                            $itens[] = $temporario;
                          }
              return $itens;
            }
          } catch (Exception $e) {
              echo "ERROR".$e->getMessage();
          }
        }

        public function getIdTarefa()
        {
          return $this->id_tarefa;
        }

        // public static function listarTarefas(){
        //   $query = "select * from tarefas";
        //   $stmt = DB::conexao()->prepare($query);
        //   $stmt->execute();
        //   $registros = $stmt->fetchAll();
        //   if($registros){
        //     foreach($registros as $objeto)
        //     {
        //       $temporario = new TarefaTeste();
        //       $temporario->setIdTarefa($objeto['id_tarefa']);
        //       $temporario->setTitulo($objeto['titulo']);
        //       $temporario->setDataInicio($objeto['data_inicio']);
        //       $temporario->setDataFim($objeto['data_fim']);
        //       $temporario->setDataConclusao($objeto['data_conclusao']);
        //       $temporario->setDescricao($objeto['descricao']);
        //       $temporario->setDataCadastro($objeto['data_cadastro']);
        //       $temporario->setStatusTarefa($objeto['status_tarefa']);
        //       $temporario->setFkRefAlunoProjeti($objeto['fk_ref_aluno_projeti']);
        //       $itens[] = $temporario;
        //     }
        //   return $itens;
        //   }
        // }

        public static function listarTarefas()
          {
            try {
              $query = "select * from tarefa";
                          $stmt = DB::conexao()->prepare($query);
                          $stmt->execute();
                          $registros = $stmt->fetchAll();
                          if($registros){
                            foreach($registros as $objeto)
                            {
                              $temporario = new Tarefa();
                              $temporario->setIdTarefa($objeto['id_tarefa']);
                              $temporario->setTitulo($objeto['titulo']);
                              $temporario->setDataInicio($objeto['data_inicio']);
                              $temporario->setDataFim($objeto['data_fim']);
                              $temporario->setDataConclusao($objeto['data_conclusao']);
                              $temporario->setDescricao($objeto['descricao']);
                              $temporario->setDataCadastro($objeto['data_cadastro']);
                              $temporario->setStatusTarefa($objeto['fk_status_tarefa']);
                              $temporario->setFkRefAlunoProjeti($objeto['fk_ref_aluno_projeti']);
                              $itens[] = $temporario;
                            }
                          return $itens;
                          }
            } catch (Exception $e) {
                echo "ERROR".$e->getMessage();
            }
          }

          public static function listar()
            {
              try {
                $query = "select * from tarefa";
                            $stmt = DB::conexao()->prepare($query);
                            $stmt->execute();
                            $registros = $stmt->fetchAll();
                            if($registros){
                              foreach($registros as $objeto){
                                $temporario = new Tarefa();
                                $temporario->setIdTarefa($objeto['id_tarefa']);
                                $temporario->setTitulo($objeto['titulo']);
                                $temporario->setDataInicio($objeto['data_inicio']);
                                $temporario->setDataFim($objeto['data_fim']);
                                $temporario->setDataConclusao($objeto['data_conclusao']);
                                $temporario->setDataCadastro($objeto['data_cadastro']);
                                $temporario->setFkStatusTarefa($objeto['fk_status_tarefa']);
                                $temporario->setFkRefAlunoProjeti($objeto['fk_ref_aluno_projeti']);
                                $itens[] = $temporario;
                              }
                  return $itens;
                }
              } catch (Exception $e) {
                  echo "ERROR".$e->getMessage();
              }
            }


          public function setFkStatusTarefa($fk_status_tarefa){
            $this->fk_status_tarefa = $fk_status_tarefa;
          }

          public function setIdTarefa($id_tarefa)
          {
            $this->id_tarefa = $id_tarefa;
          }

        public static function listarAlunosTarefa()
          {
            try {
              $query = "SELECT pessoa.nome as pessoa_nome,tarefa.fk_ref_aluno_projeti as fk_ref_aluno_projeti from pessoa
              join aluno on pessoa.id_pessoa = aluno.fk_pessoa join
              ref_aluno_projeti on aluno.id_aluno = ref_aluno_projeti.fk_aluno
              join tarefa on tarefa.fk_ref_aluno_projeti = ref_aluno_projeti.fk_aluno";
                          $stmt = DB::conexao()->prepare($query);
                          $stmt->execute();
                          $registros = $stmt->fetchAll();
                          if($registros){
                            foreach($registros as $objeto){
                              $temporario = new Tarefa();
                              //$temporario->setIdResponsavelTarefa($objeto['fk_ref_aluno_projeti']);
                              $temporario->setNomeResponsavelTarefa($objeto['pessoa_nome']);
                              $temporario->setStatusTarefa($objeto['status_tarefa']);
                              $itens[] = $temporario;
                            }
                return $itens;
              }
            } catch (Exception $e) {
                echo "ERROR".$e->getMessage();
            }
          }

          public function setNomeResponsavelTarefa($pessoa_nome){
            return $this->pessoa_nome;
          }

          public function setStatusTarefa($status_tarefa){
            return $this->status_tarefa;
          }

          public static function setIdResponsavelTarefa($fk_ref_aluno_projeti){
            $this->fk_ref_aluno_projeti = $fk_ref_aluno_projeti;
          }

          public function setNomeAlunoTarefa($nome_aluno)
          {
            $this->nomeAluno = $nome_aluno;
          }

          public function getNomeResponsavelTarefa(){
            return $this->pessoa_nome;
          }

        public function adicionar(){
      		$query = 'insert into tarefa(titulo,data_inicio,data_fim,data_conclusao,descricao,data_cadastro,fk_status_tarefa,fk_ref_aluno_projeti) values (:titulo,:data_inicio,:data_fim,:data_conclusao,:descricao,:data_cadastro,:fk_status_tarefa,:fk_ref_aluno_projeti)';
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($query);
      		$stmt->bindValue(':titulo',$this->titulo);
      		$stmt->bindValue(':data_inicio',$this->data_inicio);
      		$stmt->bindValue(':data_fim',$this->data_fim);
      		$stmt->bindValue(':data_conclusao',$this->data_conclusao);
      		$stmt->bindValue(':descricao',$this->descricao);
          $stmt->bindValue(':data_cadastro',$this->data_cadastro);
          $stmt->bindValue(':fk_status_tarefa',$this->fk_status_tarefa);
      		$stmt->bindValue(':fk_ref_aluno_projeti',$this->fk_ref_aluno_projeti);
      		//$stmt->bindValue(':fk_projeti',$this->tarefa->__get('fk_projeti')); // retornar através da sessão do usuário
      		$stmt->execute();
          // $ultimaTarefa = $conexao->lastInsertId();
          // return $ultimaTarefa;
      	}

        public static function contarTarefas()
      	    {
      	      try {
      	        $query = "select * from tarefa";
      	                    $stmt = DB::conexao()->prepare($query);
      	                    $stmt->execute();
      	                    $registros = $stmt->fetchAll();
      	                    $totalTarefas = count($registros);
      	                    return $totalTarefas;
      	        }catch(Exception $e){
      	            echo "ERROR".$e->getMessage();
      	        }
      	      }

        public function setFkRefAlunoProjeti($fk_ref_aluno_projeti)
        {
          $this->fk_ref_aluno_projeti = $fk_ref_aluno_projeti;
        }


        public function setIdStatusTarefa($id_status_tarefa){
          $this->id_status_tarefa = $id_status_tarefa;
        }

        public function getIdStatusTarefa(){
          return $this->id_status_tarefa;
        }

        public function setNomeStatusTarefa($nomeStatus){
          $this->nomeStatus = $nomeStatus;
        }

        public function getNomeStatusTarefa(){
          return $this->nomeStatus;
        }

/*---------------------------------------------------------------------
  DESCRIÇÃO
 ---------------------------------------------------------------------*/
      public function getDescricao(){
        return $this->descricao;
      }

      public function setDescricao($descricao){
        $this->descricao = $descricao;
      }

/*---------------------------------------------------------------------
  DATA INICIO
 ---------------------------------------------------------------------*/
      public function getDataInicio(){
        return $this->$data_inicio;
      }

      public function setDataInicio($data_inicio){
        $this->data_inicio = $data_inicio;
      }

/*---------------------------------------------------------------------
  DATA TERMINO
 ---------------------------------------------------------------------*/

      public function getDataFim(){
        return $this->data_fim;
      }

      public function setDataFim($data_fim){
        $this->data_fim = $data_fim;
      }

      public function setDataConclusao($data_conclusao)
      {
        $this->data_conclusao = $data_conclusao;
      }



/*---------------------------------------------------------------------
  RESPONSAVEL
 ---------------------------------------------------------------------*/

      public function getResponsavel(){
        return $this->responsavel;
      }

      public function setResponsavel(){
        $this->responsavel = $responsavel;
      }

/*---------------------------------------------------------------------
  TITULO
---------------------------------------------------------------------*/

      public function getTituloTarefa(){
        return $this->titulo;
      }

      public function setTitulo($titulo){
        $this->titulo = $titulo;
      }

/*---------------------------------------------------------------------
  DATA CADASTRO
 ---------------------------------------------------------------------*/

      public function getDataCadastro(){
        return $this->data_cadastro;
      }

      public function setDataCadastro($data_cadastro){
        $this->data_cadastro = $data_cadastro;
      }


    }

    // $novaTarefa = new Tarefa("CRUD de usuários","Fazer a lógica do CRUD de usuários","28-09-2019","29-09-2019","Diego Barbosa");
    //
    // var_dump($novaTarefa);

?>
