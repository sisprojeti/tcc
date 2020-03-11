<?php

/**
 * Criando uma class com o nome "Tarefa" que será responsável por armazenar as tarefas referentes a cada oportunidade
 */
    class TarefaTeste
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
      public $id_status_tarefa;

      public static function listarStatusTarefa()
        {
          try {
            $query = "select * from status_tarefa";
                        $stmt = DB::conexao()->prepare($query);
                        $stmt->execute();
                        $registros = $stmt->fetchAll();
                        if($registros){
                          foreach($registros as $objeto){
                            $temporario = new TarefaTeste();
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

        public function inserirTeste(){
      			$query = 'insert into tarefa(titulo,descricao,data_inicio,data_fim,data_conclusao,data_cadastro,status,responsavel) values (:titulo,:descricao,:data_inicio,:data_fim,data_conclusao,:data_cadastro,:status,:responsavel)';
      		$stmt = $this->conexao->prepare($query);
      		$stmt->bindValue(':titulo',$this->tarefa->__get('titulo'));
      		$stmt->bindValue(':data_inicio',$this->tarefa->__get('data_inicio'));
      		$stmt->bindValue(':data_fim',$this->tarefa->__get('data_fim'));
      		$stmt->bindValue(':data_conclusao',$this->tarefa->__get('data_conclusao'));
      		$stmt->bindValue(':descricao',$this->tarefa->__get('descricao'));
      		$stmt->bindValue(':data_cadastro',$this->tarefa->__get('data_cadastro'));
      		$stmt->bindValue(':responsavel',$this->tarefa->__get('responsavel'));
      		$stmt->bindValue(':fk_projeti',$this->tarefa->__get('fk_projeti')); // retornar através da sessão do usuário
      		$stmt->bindValue(':fk_status_tarefa',$this->tarefa->__get('fk_status_tarefa'));
      		$stmt->execute();
          $ultimaTarefa = $conexao->lastInsertId();
          return $ultimaTarefa;
      	}

        public function setIdStatusTarefa($id_status_tarefa){
          $this->id_status_tarefa = $id_status_tarefa;
        }

        public function getIdStatusTarefa(){
          return $this->$id_status_tarefa;
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

      public function getDataTermino(){
        return $this->data_termino;
      }

      public function setDataTermino($data_termino){
        $this->data_termino = $data_termino;
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

      public function getTitulo(){
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
