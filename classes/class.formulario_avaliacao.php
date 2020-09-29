<?php
      class FormularioAvaliacao
      {
        public $id_formulario_avaliacao;
        public $nome_formulario;
        public $fk_criterio;
        public $valor_maximo;
        public $fk_turma;
        public $data_avaliacao;
        public $nome_turma;
        public $criterio;

        public function getFkTurma(){
          return $this->fk_turma;
        }

        public function getCriterio(){
          return $this->criterio;
        }

        public function setCriterio($criterio){
          $this->criterio = $criterio;
        }

        public function setValorMaximo($valor_maximo){
          $this->valor_maximo = $valor_maximo;
        }

        public function setFkCriterio($fk_criterio){
          $this->fk_criterio = $fk_criterio;
        }

        public function getIdFormularioAvaliacao(){
          return $this->id_formulario_avaliacao;
        }

        public function getNomeFormulario(){
          return $this->nome_formulario;
        }


        public function getNomeTurma(){
          return $this->nome_turma;
        }

        public function setNomeTurma($nome_turma){
          $this->nome_turma = $nome_turma;
        }

        public function adicionar()
        {
          $sql = "INSERT INTO formulario_avaliacao(data_avaliacao) values (:data_avaliacao)";
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($sql);
          $stmt->bindParam(':data_avaliacao',$this->data_avaliacao);
          $stmt->execute();
          $ultimoIdFormulario = $conexao->lastInsertId();
          return $ultimoIdFormulario;
        }

              public function setIdFormularioAvaliacao($id_formulario_avaliacao){
                $this->id_formulario_avaliacao = $id_formulario_avaliacao;
              }

        public function setFkTurma($fk_turma){
          $this->fk_turma = $fk_turma;
        }

        public function setNomeFormulario($nome_formulario){
          $this->nome_formulario = $nome_formulario;
        }

        public function setDataAvaliacao($data_avaliacao){
          $this->data_avaliacao = $data_avaliacao;
        }

        public static function listar(){
          try {
            $query = "SELECT * from formulario_avaliacao";
                        $stmt = DB::conexao()->prepare($query);
                        $stmt->execute();
                        $registros = $stmt->fetchAll();
                        if($registros){
                          foreach($registros as $objeto){
                            $temporario = new FormularioAvaliacao();
                            $temporario->setIdFormularioAvaliacao($objeto['id_formulario_avaliacao']);
                            $temporario->setNomeFormularioAvaliacao($objeto['nome']);
                            $temporario->setDataAvaliacao($objeto['data_avaliacao']);
                            $itens[] = $temporario;
                          }
              return $itens;
          }
        }catch (PDOException $e){
          echo "ERROR".$e->getMessage();
        }
      }

      public function setNomeFormularioAvaliacao($nome_formulario){
        $this->nome_formulario = $nome_formulario;
      }

      public static function detalhe_formulario($id_formulario_avaliacao,$fk_turma){
        try {
          $query = "SELECT
                    turma.nome AS nome_turma,
                    turma.id_turma as id_turma,
                    criterio.nome as criterio,
                    formulario_avaliacao.id_formulario_avaliacao,
                    formulario_avaliacao.data_avaliacao,
                    formulario_avaliacao.fk_turma as fk_turma,
                    ref_formulario_criterio.fk_criterio as fk_criterio,
                    criterio.valor_maximo as valor_maximo
                    from turma
                    join criterio
                    join formulario_avaliacao
                    on turma.id_turma=formulario_avaliacao.fk_turma
                    join ref_formulario_criterio
                    on ref_formulario_criterio.fk_criterio = criterio.id_criterio
                    join projeti
                    where turma.id_turma = $fk_turma";
                      $stmt = DB::conexao()->prepare($query);
                      $stmt->execute();
                      $registros = $stmt->fetchAll();
                      if($registros){
                        foreach($registros as $objeto){
                          $temporario = new FormularioAvaliacao();
                          $temporario->setIdFormularioAvaliacao($objeto['id_formulario_avaliacao']);
                          $temporario->setFkTurma($objeto['fk_turma']);
                          $temporario->setFkCriterio($objeto['fk_criterio']);
                          $temporario->setValorMaximo($objeto['valor_maximo']);
                          $temporario->setDataAvaliacao($objeto['data_avaliacao']);
                          $temporario->setNomeTurma($objeto['nome_turma']);
                          $temporario->setCriterio($objeto['criterio']);
                          $itens[] = $temporario;
                        }
            return $itens;
        }
      }catch (PDOException $e){
        echo "ERROR".$e->getMessage();
      }
    }
      }
  ?>
