<?php

    class Nota
    {
      public $id_nota;
      public $valor;
      public $data_modificacao;
      public $fk_criterio;
      public $fk_aluno;
      public $fk_professor;
      public $fk_projeti;

      public function adicionar()
      {
        $sql = "INSERT INTO
         nota(valor,data_modificacao,fk_criterio,fk_aluno,fk_professor)
         values (:valor,:data_modificacao,:fk_criterio,:fk_aluno,:fk_professor)";
        $conexao = DB::conexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':valor',$this->valor);
        $stmt->bindParam(':data_modificacao',$this->data_modificacao);
        $stmt->bindParam(':fk_criterio',$this->fk_criterio);
        $stmt->bindParam(':fk_aluno',$this->fk_aluno);
        $stmt->bindParam(':fk_professor',$this->fk_professor);
        $stmt->execute();
      }

      public static function recuperaIdProfessor($fk_pessoa)
      {
        $sql = "SELECT professor.id_professor as id_professor from professor
        join pessoa on pessoa.id_pessoa = professor.fk_pessoa where professor.fk_pessoa = :fk_pessoa";
        $conexao = DB::conexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':fk_pessoa',$fk_pessoa);
        $stmt->execute();
        $rg = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$obj['id_professor'];
        if ($rg) {
            return $rg[0]['id_professor'];
          }
        }

        public static function recuperaIdAluno($fk_pessoa){

          $sql = "SELECT aluno.id_aluno as id_aluno,pessoa.nome as nome_aluno from aluno
          join pessoa on pessoa.id_pessoa = aluno.fk_pessoa where aluno.fk_pessoa = :fk_pessoa";
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($sql);
          $stmt->bindParam(':fk_pessoa',$fk_pessoa);
          $stmt->execute();
          $rg = $stmt->fetchAll(PDO::FETCH_ASSOC);
          //$obj['id_professor'];
          if ($rg) {
              return $rg[0]['id_aluno'];
            }
          }

          public static function recuperaFkProjeti($id_aluno){

            $sql = "SELECT * from ref_aluno_projeti where fk_aluno = $id_aluno";
            $conexao = DB::conexao();
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':id_aluno',$id_aluno);
            $stmt->execute();
            $rg = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //$obj['id_professor'];
            if ($rg) {
                return $rg[0]['fk_projeti'];
              }
            }


        public static function somarNotas(){
          $query = "SELECT sum (valor) from notas where fk_aluno = 2";
          $stmt = DB::conexao()->prepare($query);
          $stmt->execute();
          $registros = $stmt->fetchAll();
          if($registros){
            foreach($registros as $objeto){
              $temporario = new Nota();
              $temporario->setValorTotal($objeto['valor_total']);
              $itens[] = $temporario;
            }
            return $itens;
          }
        }

        public static function listarAvaliadorProjeti($fk_projeti){
          try {
            $query = "SELECT avaliador_projeti.id_avaliador_projeti,
                             pessoa.nome as nome_avaliador from avaliador_projeti
                             join professor
                             on avaliador_projeti.fk_professor = professor.id_professor
                             join pessoa on pessoa.id_pessoa = professor.fk_pessoa
                              where fk_projeti = $fk_projeti";
                        $stmt = DB::conexao()->prepare($query);
                        $stmt->execute();
                        $registros = $stmt->fetchAll();
                        if($registros){
                          foreach($registros as $objeto){
                            $temporario = new Nota();
                            $temporario->setNomeAvaliador($objeto['nome_avaliador']);
                            $itens[] = $temporario;
                          }
              return $itens;
          }
        }catch (PDOException $e){
          echo "ERROR".$e->getMessage();
        }
      }

        public static function listarCriterios(){
          try {
            $query = "SELECT criterio.nome as nome_criterio,criterio.id_criterio as id_criterio from
                      criterio
                      join ref_formulario_criterio
                      on criterio.id_criterio = ref_formulario_criterio.fk_criterio
                       group by nome;";
                        $stmt = DB::conexao()->prepare($query);
                        $stmt->execute();
                        $registros = $stmt->fetchAll();
                        if($registros){
                          foreach($registros as $objeto){
                            $temporario = new Nota();
                            $temporario->setNomeCriterio($objeto['nome_criterio']);
                            $temporario->setIdCriterio($objeto['id_criterio']);
                            $itens[] = $temporario;
                          }
              return $itens;
          }
        }catch (PDOException $e){
          echo "ERROR".$e->getMessage();
        }
      }

      public static function listarNotas($fk_pessoa){
        try {
          $query = "SELECT * from notas";
                      $stmt = DB::conexao()->prepare($query);
                      $stmt->execute();
                      $registros = $stmt->fetchAll();
                      if($registros){
                        foreach($registros as $objeto){
                          $temporario = new Nota();
                          $temporario->setNomeCriterio($objeto['valor']);
                          $itens[] = $temporario;
                        }
            return $itens;
        }
      }catch (PDOException $e){
        echo "ERROR".$e->getMessage();
      }
    }

    public static function pegaNota($fk_aluno,$fk_criterio){
      try {
        $query = "SELECT nota.valor as valor from nota
                  where nota.fk_aluno = $fk_aluno and nota.fk_criterio = $fk_criterio";
                    $stmt = DB::conexao()->prepare($query);
                    $stmt->execute();
                    $registros = $stmt->fetchAll();
                    if($registros){
                      foreach($registros as $objeto){
                        $temporario = new Nota();
                        $temporario->setValor($objeto['valor']);
                        $itens[] = $temporario;
                      }
          return $itens;
      }
    }catch (PDOException $e){
      echo "ERROR".$e->getMessage();
    }
  }

        public static function listar(){
          try {
            $query = "SELECT nota.valor as valor,
            nota.data_modificacao as data_modificacao,
            nota.fk_criterio as fk_criterio,
            nota.fk_aluno as fk_aluno,
            nota.fk_professor as fk_professor,
            professor.id_professor,
            pessoa.id_pessoa as id_pessoa,
            pessoa.nome as nome_avaliador,
            nota.id_nota as id_nota,
            criterio.nome as nome_criterio
            from nota
            join professor
            on nota.fk_professor = professor.id_professor
            join pessoa
            on pessoa.id_pessoa = professor.fk_pessoa
            join criterio on criterio.id_criterio = nota.fk_criterio
            order by id_nota";
                        $stmt = DB::conexao()->prepare($query);
                        $stmt->execute();
                        $registros = $stmt->fetchAll();
                        if($registros){
                          foreach($registros as $objeto){
                            $temporario = new Nota();
                            $temporario->setIdNota($objeto['id_nota']);
                            $temporario->setValor($objeto['valor']);
                            $temporario->setDataModificacao($objeto['data_modificacao']);
                            $temporario->setFkCriterio($objeto['fk_criterio']);
                            $temporario->setFkAluno($objeto['fk_aluno']);
                            $temporario->setFkProfessor($objeto['fk_professor']);
                            $temporario->setNomeAvaliador($objeto['nome_avaliador']);
                            $temporario->setNomeCriterio($objeto['nome_criterio']);
                            $itens[] = $temporario;
                          }
              return $itens;
          }
        }catch (PDOException $e){
          echo "ERROR".$e->getMessage();
        }
      }

      public function setIdNota($id_nota){
        $this->id_nota = $id_nota;
      }

      public function setNomeAvaliador($nome_avaliador){
        $this->nome_avaliador = $nome_avaliador;
      }

      public function getNomeAvaliador(){
        return $this->nome_avaliador;
      }

      public function getNomeCriterio(){
        return $this->nome_criterio;
      }

      public function getIdCriterio(){
        return $this->id_criterio;
      }

      public function setIdCriterio($id_criterio){
        $this->id_criterio = $id_criterio;
      }

      public function setNomeCriterio($nome_criterio){
        $this->nome_criterio = $nome_criterio;
      }

      public function setValorMaximo($valor_maximo){
        $this->valor_maximo = $valor_maximo;
      }

      public function setValor($valor){
        $this->valor = $valor;
      }

      public function setFkProfessor($id_professor){
        $this->fk_professor = $id_professor;
      }


      public function getValor(){
        return $this->valor;
      }

      public function getIdPessoa(){
        return $this->valor;
      }

      public function setDataModificacao($data_modificacao){
        $this->data_modificacao = $data_modificacao;
      }

      public function getDataModificacao(){
        return $this->data_modificao;
      }

      public function setFkCriterio($fk_criterio){
        $this->fk_criterio = $fk_criterio;
      }

      public function getFkCriterio(){
        return $this->fk_criterio;
      }

      public function setFkAluno($fk_aluno){
        $this->fk_aluno = $fk_aluno;
      }

      public function getFkPessoa(){
        return $this->fk_aluno;
      }

      public function getFkProfessor(){
        return $this->fk_professor;
      }


    }

?>
