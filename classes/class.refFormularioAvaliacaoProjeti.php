<?php

    class RefFormularioAvaliacaoProjeti
    {
      public $id_ref_formulario_avaliacao_projeti;
      public $fk_projeti;
      public $id_formulario_avaliacao;
      public $fk_turma;
      public $data_avaliacao;
      public $pessoa_nome;
      public $nome_turma;
      public $nome_projeti;
      public $id_pessoa;

      public function setPessoaNome($pessoa_nome){
        $this->pessoa_nome = $pessoa_nome;
      }



      public function adicionar()
      {
        $sql = "INSERT INTO ref_formulario_avaliacao_projeti(fk_projeti,
          fk_formulario_avaliacao)
          values (:fk_projeti,:fk_formulario_avaliacao)";
        $conexao = DB::conexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam('fk_projeti',$this->fk_projeti);
        $stmt->bindParam(':fk_formulario_avaliacao',$this->fk_formulario_avaliacao);
        $stmt->execute();
      }

      //

        public static function listarProjeti($fk_projeti){
          try {
            $query = "SELECT pessoa.nome as pessoa_nome,
                      pessoa.id_pessoa as id_pessoa,
                      formulario_avaliacao.id_formulario_avaliacao as id_formulario_avaliacao,
                      formulario_avaliacao.data_avaliacao as data_avaliacao,
                      turma.nome as nome_turma,
                      aluno.id_aluno as id_aluno,
                      criterio.nome as nome_criterio,
                      ref_formulario_avaliacao_turma.fk_turma as fk_turma,
                      projeti.tema as nome_projeti
                      from
                      ref_aluno_projeti
                      join
                      aluno
                      on ref_aluno_projeti.fk_aluno = aluno.id_aluno
                      join pessoa on pessoa.id_pessoa = aluno.fk_pessoa
                      join projeti on ref_aluno_projeti.fk_projeti = projeti.id_projeti
                      join formulario_avaliacao
                      join turma
                      join ref_formulario_avaliacao_turma
                      on ref_formulario_avaliacao_turma.fk_turma = turma.id_turma
                      join criterio
                      where projeti.id_projeti = $fk_projeti group by id_aluno";
                        $stmt = DB::conexao()->prepare($query);
                        $stmt->execute();
                        $registros = $stmt->fetchAll();
                        if($registros){
                          foreach($registros as $objeto){
                            $temporario = new RefFormularioAvaliacaoProjeti();
                            $temporario->setIdFormularioAvaliacaoProjeti($objeto['id_formulario_avaliacao']);
                            $temporario->setFkProjeti($fk_projeti);
                            $temporario->setPessoaNome($objeto['pessoa_nome']);
                            $temporario->setIdAluno($objeto['id_aluno']);
                            $temporario->setDataAvaliacao($objeto['data_avaliacao']);
                            $temporario->setNomeTurma($objeto['nome_turma']);
                            $temporario->setNomeProjeti($objeto['nome_projeti']);
                            $temporario->setFkTurma($objeto['fk_turma']);
                            $itens[] = $temporario;
                          }
              return $itens;
          }
        }catch (PDOException $e){
          echo "ERROR".$e->getMessage();
        }
      }

      public function setNomeTurma($nome_turma){
        $this->nome_turma = $nome_turma;
      }

      public function setIdAluno($id_aluno){
        $this->id_aluno = $id_aluno;
      }


      public function getNomeTurma(){
        return $this->nome_turma;
      }

      public function getIdPessoa(){
        return $this->id_pessoa;
      }


            public function getIdAluno(){
              return $this->id_aluno;
            }

      public function getDataAvaliacao(){
        return $this->data_avaliacao;
      }

      public function setNomeProjeti($nome_projeti){
        $this->nome_projeti = $nome_projeti;
      }

      public function setIdPessoa($id_pessoa){
        $this->id_pessoa = $id_pessoa;
      }

      public function getNomeProjeti(){
        return $this->nome_projeti;
      }



      public function setDataAvaliacao($data_avaliacao){
        $this->data_avaliacao = $data_avaliacao;
      }

      public function setFkTurma($fk_turma){
        $this->fk_turma = $fk_turma;
      }

      public function setIdRefFormularioAvaliacaoProjeti($id_ref_formulario_avaliacao_projeti){
        $this->id_ref_formulario_avaliacao_projeti = $id_ref_formulario_avaliacao_projeti;
      }

      public function setIdFormularioAvaliacaoProjeti($id_formulario_avaliacao){
        $this->id_formulario_avaliacao = $id_formulario_avaliacao;
      }
      public function getIdFormularioAvaliacaoProjeti(){
        return $this->id_formulario_avaliacao;
      }

      public function setFkProjeti($fk_projeti){
        $this->fk_projeti = $fk_projeti;
      }

      public function getNomePessoa(){
        return $this->pessoa_nome;
      }

    //   public static function listar(){
    //     try {
    //       $query = "SELECT criterio.id_criterio,
    //                        criterio.nome,
    //                        criterio.valor_maximo
    //                        from criterio
    //                        join ref_formulario_criterio on criterio.id_criterio = ref_formulario_criterio.fk_criterio";
    //                   $stmt = DB::conexao()->prepare($query);
    //                   $stmt->execute();
    //                   $registros = $stmt->fetchAll();
    //                   if($registros){
    //                     foreach($registros as $objeto){
    //                       $temporario = new RefFormularioCriterio();
    //                       $temporario->setNomeCriterio($objeto['nome']);
    //                       $temporario->setValorMaximoCriterio($objeto['valor_maximo']);
    //                       $itens[] = $temporario;
    //                     }
    //         return $itens;
    //     }
    //   }catch (PDOException $e){
    //     echo "ERROR".$e->getMessage();
    //   }
    // }
    /* SELECT USADO PRA SELECIONAR formularios vinculados a turma
    select criterio.id_criterio, criterio.nome, criterio.valor_maximo,formulario_avaliacao.id_formulario_avaliacao,formulario_avaliacao.fk_turma from criterio join ref_formulario_criterio on criterio.id_criterio = ref_formulario_criterio.fk_criterio join formulario_avaliacao;
    */
  //   public static function listar(){
  //     try {
  //       $query = "SELECT criterio.id_criterio,
  //                        criterio.nome,
  //                        criterio.valor_maximo
  //                        from criterio
  //                        join ref_formulario_criterio on criterio.id_criterio = ref_formulario_criterio.fk_criterio";
  //                   $stmt = DB::conexao()->prepare($query);
  //                   $stmt->execute();
  //                   $registros = $stmt->fetchAll();
  //                   if($registros){
  //                     foreach($registros as $objeto){
  //                       $temporario = new RefFormularioCriterio();
  //                       $temporario->setNomeCriterio($objeto['nome']);
  //                       $temporario->setValorMaximoCriterio($objeto['valor_maximo']);
  //                       $itens[] = $temporario;
  //                     }
  //         return $itens;
  //     }
  //   }catch (PDOException $e){
  //     echo "ERROR".$e->getMessage();
  //   }
  // }
      public function setNomeCriterio($nome_criterio){
        $this->nome_criterio = $nome_criterio;
      }

      public function setValorMaximoCriterio($valor_maximo){
        $this->valor_maximo = $valor_maximo;
      }

      public function setFkFormulario($fk_formulario_avaliacao){
        $this->fk_ref_formulario = $fk_formulario_avaliacao;
      }

      public function setFkCriterio($fk_criterio){
        $this->fk_criterio = $fk_criterio;
      }

    }

?>
